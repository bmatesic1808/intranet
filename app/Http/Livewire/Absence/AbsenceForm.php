<?php

namespace App\Http\Livewire\Absence;

use App\Models\Absence;
use App\Models\AbsenceDate;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;
use Livewire\Component;

class AbsenceForm extends Component
{
    public $startDate;
    public $endDate;
    public $comment;
    public $period;
    public $employee;
    public $isDestroyModalVisible = false;
    public $absenceId;
    public $overtimeHoursChecked = false;
    public $test;

    protected $rules = [
        'startDate' => 'date|required',
        'endDate' => 'date|required',
        'comment' => 'required|string'
    ];

    protected $listeners = ['updateAbsenceList' => 'render'];

    public function render()
    {
        $this->employee ? $user = $this->employee : $user = User::find(auth()->id());

        if ($this->employee === null && $user->hasAnyRole([Config::get('constants.roles.ADMIN_ROLE'), Config::get('constants.roles.MANAGER_ROLE')])) {
            $absences = Absence::orderBy('created_at', 'DESC')->with('user')->take(50)->get();
        } else {
            $absences = Absence::orderBy('created_at', 'DESC')->with('user')->where('user_id', $user->id)->take(50)->get();
        }

        $availableFreeDays = $this->calculateAvailableAbsenceDays($user);
        $availableOvertimeDays = $this->calculateAvailableOvertimeDays($user);
        $availableOvertimeHours = $this->calculateAvailableOvertimeHours($user);

        return view('livewire.absence.absence-form', compact(
            'absences',
            'availableFreeDays',
            'availableOvertimeDays',
            'availableOvertimeHours',
            'user'
        ));
    }

    public function createAbsence(): void
    {
        $this->validate();
        $this->employee ? $user = $this->employee : $user = auth()->user();

        if ($this->overtimeHoursChecked === false) {
            $availableDays = $this->calculateAvailableAbsenceDays($user);
        } else {
            $availableDays = $this->calculateAvailableOvertimeDays($user);
        }

        $start = Carbon::parse($this->startDate);
        $end = Carbon::parse($this->endDate);

        if (!$this->validateDatesRange($start, $end)) {
            $this->dispatchBrowserEvent('banner-message',  [
                'show' => true,
                'message' => 'Error! End date is lower than the start date. Please check your dates!',
                'style' => 'danger'
            ]);

            return;
        }

        $period = count($this->generateDateRange($start, $end));

        if (!($availableDays - $period < 0)) {
            $absence = Absence::create([
                'user_id' => $user->id,
                'date_from' => $this->startDate,
                'date_to' => $this->endDate,
                'comment' => $this->comment,
                'overtime' => $this->overtimeHoursChecked,
                'reference_code' => Str::random(32)
            ]);

            $this->spreadAbsenceDates($absence);

            $this->emit('saved');
            $this->emit('updateAbsenceCalendar');
            $this->resetInputFields();

            $this->dispatchBrowserEvent('banner-message',  [
                'show' => true,
                'message' => 'Success! New absence has been sent for approval.',
                'style' => 'success'
            ]);

            return;
        }

        if ($user->hasRole(Config::get('constants.roles.ADMIN_ROLE'))) {
            $this->dispatchBrowserEvent('banner-message',  [
                'show' => true,
                'message' => 'Error! CEO does not have any free days! 😃',
                'style' => 'danger'
            ]);
        }

        if (!$user->hasRole(Config::get('constants.roles.ADMIN_ROLE'))) {
            $this->dispatchBrowserEvent('banner-message',  [
                'show' => true,
                'message' => "Warning! Not enough free days remaing. You have $availableDays available days.",
                'style' => 'danger'
            ]);
        }
    }

    public function spreadAbsenceDates(Absence $absence): void
    {
        $period = CarbonPeriod::create($absence->date_from, $absence->date_to);
        $periodColor = $this->pickAbsencePeriodColor();

        foreach ($period as $item) {
            if ($item->dayOfWeek !== Carbon::SATURDAY && $item->dayOfWeek !== Carbon::SUNDAY && Carbon::parse($item)->isBusinessDay()) {
                AbsenceDate::create([
                   'absence_id' => $absence->id,
                   'date' => $item,
                   'color' => $periodColor,
                ]);
            }
        }
    }

    public function showDestroyModal($id): void
    {
        $this->isDestroyModalVisible = true;
        $this->absenceId = $id;
    }

    public function deleteAbsencePeriod(): void
    {
        Absence::destroy($this->absenceId);

        $this->isDestroyModalVisible = false;

        $this->emit('updateAbsenceCalendar');
        $this->emit('updateAbsenceList');

        $this->dispatchBrowserEvent('banner-message',  [
            'show' => true,
            'message' => 'Success! Absence period has been deleted.',
            'style' => 'success'
        ]);
    }

    public function resetInputFields(): void
    {
        $this->startDate = null;
        $this->endDate = null;
        $this->comment = null;
    }

    public function pickAbsencePeriodColor(): string
    {
        $colors = [
            'bg-blue-500',
            'bg-indigo-500',
            'bg-green-500',
            'bg-gray-500',
            'bg-pink-500',
            'bg-yellow-500',
            'bg-purple-500',
        ];

        return Arr::random($colors);
    }

    // make sure this method is idempotent
    public function calculateAvailableAbsenceDays(User $user): int
    {
        $remaining = $user->allowedAbsences->sum('days');

        foreach ($user->allowedAbsences as $allowedAbsence) {
            if (!$user->absences) {
               return $remaining;
            }

            foreach ($user->absences as $absence) {
                if ($absence->overtime === false) {
                    if (!$absence->absenceDates) {
                        return $remaining;
                    }

                    if ($absence->approved === true) {
                        foreach ($absence->absenceDates as $absenceDate) {
                            if ($allowedAbsence->year === $absenceDate->date->year) {
                                --$remaining;
                            }
                        }
                    }
                }
            }
        }

        return $remaining;
    }

    public function generateDateRange(Carbon $start_date, Carbon $end_date): array
    {
        $dates = [];
        for($date = $start_date; $date->lte($end_date); $date->addDay()) {
            if ($date->isBusinessDay()) {
                $dates[] = $date;
            }
        }

        return $dates;
    }

    // make sure this method is idempotent
    public function calculateAvailableOvertimeDays(User $user): int
    {
        if (!$user->overtime) {
            return 0;
        }

        return floor($user->overtime->hours / 7.5);
    }

    public function calculateAvailableOvertimeHours(User $user)
    {
        return $user->overtime->hours ?? 0;
    }

    public function validateDatesRange($start, $end) {
        if ($start > $end) {
            return false;
        }
        return true;
    }
}
