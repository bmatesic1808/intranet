<?php

namespace App\Http\Livewire\SickLeave;

use App\Models\SickLeave;
use App\Models\SickLeaveDate;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;
use Livewire\Component;

class SickLeaveForm extends Component
{
    public $startDate;
    public $endDate;
    public $comment;
    public $employee;
    public $isDestroyModalVisible = false;
    public $sickLeaveId;

    protected $rules = [
        'startDate' => 'date|required',
        'endDate' => 'date|required',
        'comment' => 'required|string'
    ];

    protected $listeners = ['updateSickLeaveList' => 'render'];

    public function render()
    {
        $this->employee ? $user = $this->employee : $user = User::find(auth()->id());

        if ($this->employee === null && $user->hasAnyRole([Config::get('constants.roles.ADMIN_ROLE'), Config::get('constants.roles.MANAGER_ROLE')])) {
            $sickLeaves = SickLeave::orderBy('created_at', 'DESC')->with('user')->take(50)->get();
        } else {
            $sickLeaves = SickLeave::orderBy('created_at', 'DESC')->with('user')->where('user_id', $user->id)->take(50)->get();
        }

        return view('livewire.sick-leave.sick-leave-form', compact(
            'sickLeaves',
            'user'
        ));
    }

    public function createSickLeave(): void
    {
        $this->validate();
        $this->employee ? $user = $this->employee : $user = auth()->user();

        $sickLeave = SickLeave::create([
            'user_id' => $user->id,
            'date_from' => $this->startDate,
            'date_to' => $this->endDate,
            'comment' => $this->comment
        ]);

        $this->spreadSickLeaveDates($sickLeave);

        $this->emit('saved');
        $this->emit('updateSickLeaveCalendar');
        $this->resetInputFields();

        $this->dispatchBrowserEvent('banner-message',  [
            'show' => true,
            'message' => 'Success! New sick leave period has been created!.',
            'style' => 'success'
        ]);
    }

    public function spreadSickLeaveDates(SickLeave $sickLeave): void
    {
        $period = CarbonPeriod::create($sickLeave->date_from, $sickLeave->date_to);
        $periodColor = $this->pickSickLeavePeriodColor();

        foreach ($period as $item) {
            if ($item->dayOfWeek !== Carbon::SATURDAY && $item->dayOfWeek !== Carbon::SUNDAY && Carbon::parse($item)->isBusinessDay()) {
                SickLeaveDate::create([
                    'sick_leave_id' => $sickLeave->id,
                    'date' => $item,
                    'color' => $periodColor,
                ]);
            }
        }
    }

    public function showDestroyModal($id): void
    {
        $this->isDestroyModalVisible = true;
        $this->sickLeaveId = $id;
    }

    public function deleteSickLeavePeriod(): void
    {
        SickLeave::destroy($this->sickLeaveId);

        $this->isDestroyModalVisible = false;

        $this->emit('updateSickLeaveCalendar');
        $this->emit('updateSickLeaveList');

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

    public function pickSickLeavePeriodColor(): string
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
}
