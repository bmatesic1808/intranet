<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Overtime;
use App\Models\OvertimeActivity;
use App\Models\User;
use Carbon\Carbon;

class AbsenceController extends Controller
{
    public function index()
    {
        $absences = Absence::with('user')->get();
        return view('absence.index', compact('absences'));
    }

    public function show($id)
    {
        $employee = User::findOrFail($id);
        return view('absence.show', compact('employee'));
    }

    public function companyOverview()
    {
        $absences = Absence::with('user')
            ->whereYear('date_to', date('Y'))
            ->whereBetween('date_to', [
                Carbon::now()->startOfYear(),
                Carbon::now()->endOfDecade(),
            ])
            ->orderByDesc('created_at')
            ->get();

        return view('absence.company-overview', compact('absences'));
    }

    public function approveAbsenceRequest($reference_code): string
    {
        $absence = Absence::where('reference_code', $reference_code)->firstOrFail();
        if ($absence->approved === NULL) {
            $absence->approved = true;
            $absence->update();

            if ($absence->overtime === true) {
                $this->deleteOvertimeHoursAndCreateRecord($absence);
            }

            return 'Absence approved';
        }

        return 'This absence request has already been answered!';
    }

    public function rejectAbsenceRequest($reference_code): string
    {
        $absence = Absence::where('reference_code', $reference_code)->firstOrFail();
        if ($absence->approved === NULL) {
            $absence->approved = false;
            $absence->update();

            return 'Absence rejected';
        }

        return 'This absence request has already been answered!';
    }

    private function deleteOvertimeHoursAndCreateRecord(Absence $absence): void
    {
        $daysCount = $absence->absenceDates->count();
        $hoursCount = $daysCount * 7.5;

        $overtimeRecord = Overtime::where('user_id', $absence->user->id)->first();
        $overtimeRecord->hours -= $hoursCount;
        $overtimeRecord->update();

        OvertimeActivity::create([
            'overtime_id' => $overtimeRecord->id,
            'hours' => $hoursCount,
            'comments' => 'Zamjena ' . $hoursCount . ' sati za godišnji odmor.',
        ]);
    }
}
