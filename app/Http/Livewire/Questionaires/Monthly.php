<?php

namespace App\Http\Livewire\Questionaires;

use App\Models\MonthlyScore;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Livewire\Component;

class Monthly extends Component
{
    public $firstRun = true;
    public $scores;

    public function render()
    {
        $this->scores = MonthlyScore::all();

        $averageScoresChart = $this->scores->reduce(function ($averageScoresChartModel, $data) {
            return $averageScoresChartModel->addPoint($data->month . '/' . $data->year, number_format($data->score / $data->times_rated, 2));
        }, LivewireCharts::lineChartModel()
            ->setAnimated($this->firstRun)
            ->setSmoothCurve()
            ->setXAxisVisible(false)
            ->setYAxisVisible(true)
            ->setDataLabelsEnabled(true)
        );

        $this->firstRun = false;

        return view('livewire.questionaires.monthly', compact('averageScoresChart'));
    }
}
