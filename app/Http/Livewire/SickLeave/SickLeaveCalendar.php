<?php

namespace App\Http\Livewire\SickLeave;

use App\Models\SickLeaveDate;
use Asantibanez\LivewireCalendar\LivewireCalendar;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;

class SickLeaveCalendar extends LivewireCalendar
{
    public $employee;
    public $sickLeaveDates;

    protected $listeners = ['updateSickLeaveCalendar' => 'events'];

    public function events(): Collection
    {
        $this->employee ? $user = $this->employee : $user = auth()->user();

        $dates = SickLeaveDate::whereHas('sickLeave')->get();

        if ($user->hasAnyRole([Config::get('constants.roles.ADMIN_ROLE'), Config::get('constants.roles.MANAGER_ROLE')])) {
            return $dates
                ->map(function (SickLeaveDate $sickLeaveDate) {
                    return [
                        'id' => $sickLeaveDate->id,
                        'title' => $sickLeaveDate->sickLeave->user->name,
                        'description' => $sickLeaveDate->sickLeave->comment,
                        'date' => $sickLeaveDate->date,
                        'color' => $sickLeaveDate->color,
                    ];
                });
        }

        $authUserDates = [];
        foreach ($user->sickLeaveDates as $leaveDate) {
            $authUserDates[] = [
                'id' => $leaveDate->id,
                'title' => $leaveDate->sickLeave->user->name,
                'description' => $leaveDate->sickLeave->comment,
                'date' => $leaveDate->date,
                'color' => $leaveDate->color,
            ];
        }

        return collect($authUserDates);
    }
}
