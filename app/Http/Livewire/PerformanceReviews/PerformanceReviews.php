<?php

namespace App\Http\Livewire\PerformanceReviews;

use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use App\Models\PerformanceReview;
use App\Models\User;
use Livewire\Component;

class PerformanceReviews extends Component
{
    public $user;
    public $comment;
    public $rating;
    public $date;
    public $performanceRating = 0;
    public $averageRating = 0;
    public $reviews;
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
        $this->reviews = PerformanceReview::where('user_id', $this->user->id)->get();

        if(count($this->reviews)) {
            $this->averageRating = $this->reviews->pipe(function ($collection) {
                return round($collection->sum('rating') / count($this->reviews), 1);
            });
        }

        $performanceChart = $this->reviews->reduce(function ($lineChartModel, $data) {
                return $lineChartModel->addPoint($data->date->format('d/m/y'), $data->rating);
            }, LivewireCharts::lineChartModel()
                ->setAnimated($this->firstRun)
                ->setSmoothCurve()
                ->setXAxisVisible(false)
                ->setYAxisVisible(true)
                ->setDataLabelsEnabled($this->showDataLabels)
            );

        $this->firstRun = false;

        return view('livewire.performance-reviews.performance-reviews', [
            'lineChartModel' => $performanceChart,
            'reviews' => $this->reviews,
            'averageRating' => $this->averageRating
        ]);
    }

    public function addNewPerformanceReview(): void
    {
        $this->validate();

        PerformanceReview::create($this->getFormInputData());

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
