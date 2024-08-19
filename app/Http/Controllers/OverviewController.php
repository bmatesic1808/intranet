<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\PersonalInformation;
use App\Models\User;
use Carbon\Carbon;

class OverviewController extends Controller
{
    public function index()
    {
        $users = User::with('personalInformation')->get();

        return view('overview.index', [
            'profiles' => PersonalInformation::whereRaw('MONTH(birthday) = MONTH(NOW())')->with('user')->get(),
            'workAnniversaries' => PersonalInformation::whereRaw('MONTH(employment_date) = MONTH(NOW())')->with('user')->get(),
            'users' => $users,
            'absences' => Absence::whereRaw('MONTH(date_from) = MONTH(NOW())')->whereRaw('YEAR(date_from) = YEAR(NOW())')->where('approved', true)->with('user')->get()
        ]);
    }
    
    public function getBirthdays()
    {
        $users = User::with('personalInformation')->get();
        

        return view('overview.birthdays', [
            'users' => $users
        ]);
    }

    public function seeManagementAbsenceOverview() {
        $currentYear = Carbon::now()->year;

        $users = User::with(['absences' => function ($query) use ($currentYear) {
            $query->where('approved', true)->orderBy('date_to', 'desc');
            $query->whereBetween('date_from', [Carbon::createFromDate($currentYear - 1, 1, 1), Carbon::createFromDate($currentYear, 12, 31)]);
        }])->withCount(['absences' => function ($query) {
            $query->where('approved', true);
        }])->orderBy('absences_count', 'desc')->get();

        return view('overview.absence-list', compact('users'));
    }

    public function seeManagementSickLeaveOverview() {
        $users = User::withCount('sickleaves')->orderBy('sickleaves_count', 'desc')->get();

        return view('overview.sickleave-list', compact('users'));
    }
}
