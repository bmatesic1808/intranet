<?php

namespace App\Http\Livewire\Meetings;

use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use App\Models\Meeting;
use Livewire\Component;
use App\Models\User;

class Meetings extends Component
{
    public $user;
    public $comment;
    public $rating;
    public $date;
    public $meetingRating = 0;
    public $averageRating = 0;
    public $meetings;
    public $showDataLabels = true;
    public $firstRun = true;

    protected $rules = [
        'comment' => 'string|required',
        'rating' => 'string|required',
        'date' => 'required'
    ];

    public function mount(User $user): void
    {
        $this->user = $user;
    }

    public function render()
    {
        $this->meetings = Meeting::where('user_id', $this->user->id)->get();

        if(count($this->meetings)) {
            $this->averageRating = $this->meetings->pipe(function ($collection) {
                return round($collection->sum('rating') / count($this->meetings), 1);
            });
        }

        $meetingsChart = $this->meetings->reduce(function ($lineChartModel, $data) {
            return $lineChartModel->addPoint($data->date->format('d/m/y'), $data->rating);
        }, LivewireCharts::lineChartModel()
            ->setAnimated($this->firstRun)
            ->setSmoothCurve()
            ->setXAxisVisible(false)
            ->setYAxisVisible(true)
            ->setDataLabelsEnabled($this->showDataLabels)
        );

        $this->firstRun = false;

        return view('livewire.meetings.meetings', [
            'lineChartModel' => $meetingsChart,
            'meetings' => $this->meetings,
            'averageRating' => $this->averageRating
        ]);
    }

    public function addNewMeeting(): void
    {
        $this->validate();

        Meeting::create($this->getFormInputData());

        $this->emit('saved');
        $this->resetInput();
    }

    public function getFormInputData(): array
    {
        return [
            'user_id' => $this->user->id,
            'comment' => $this->comment,
            'rating' => $this->rating,
            'date' => $this->date,
        ];
    }

    public function resetInput(): void
    {
        $this->comment = null;
        $this->rating = null;
        $this->date = null;
    }
}
