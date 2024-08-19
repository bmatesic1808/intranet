<?php

namespace App\Http\Livewire\Absence;

use App\Models\AbsenceDate;
use Asantibanez\LivewireCalendar\LivewireCalendar;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;

class AbsenceCalendar extends LivewireCalendar
{
    public $employee;
    public $absenceDates;

    protected $listeners = ['updateAbsenceCalendar' => 'events'];

    public function events(): Collection
    {
        $this->employee ? $user = $this->employee : $user = auth()->user();

        $dates = AbsenceDate::whereHas('absence', function ($query) {
            return $query->where('approved', '=', true);
        })->get();

        if ($user->hasAnyRole([Config::get('constants.roles.ADMIN_ROLE'), Config::get('constants.roles.MANAGER_ROLE')])) {
            return $dates
                ->map(function (AbsenceDate $absenceDate) {
                    return [
                        'id' => $absenceDate->id,
                        'title' => $absenceDate->absence->user->name,
                        'description' => $absenceDate->absence->comment,
                        'date' => $absenceDate->date,
                        'color' => $absenceDate->color,
                    ];
                });
        }

        $authUserDates = [];
        foreach ($user->absenceDates as $absenceDate) {
            if ($absenceDate->absence->approved === true) {
                $authUserDates[] = [
                    'id' => $absenceDate->id,
                    'title' => $absenceDate->absence->user->name,
                    'description' => $absenceDate->absence->comment,
                    'date' => $absenceDate->date,
                    'color' => $absenceDate->color,
                ];
            }
        }

        return collect($authUserDates);
    }
}
