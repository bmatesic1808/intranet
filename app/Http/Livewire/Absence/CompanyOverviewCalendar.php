<?php

namespace App\Http\Livewire\Absence;

use App\Models\AbsenceDate;
use Asantibanez\LivewireCalendar\LivewireCalendar;
use Illuminate\Support\Collection;


class CompanyOverviewCalendar extends LivewireCalendar
{
    public function events(): Collection
    {
        $dates = AbsenceDate::whereHas('absence', function ($query) {
            return $query->where('approved', '=', true);
        })->get();

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
}
