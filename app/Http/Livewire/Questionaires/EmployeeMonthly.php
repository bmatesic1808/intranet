<?php

namespace App\Http\Livewire\Questionaires;

use App\Models\MonthlyQuestion;
use App\Models\User;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Livewire\Component;

class EmployeeMonthly extends Component
{
    public $showDataLabels = true;
    public $firstRun = true;
    public $monthlyQuestions;

    public function mount(?User $user): void
    {
        $this->user = $user;
    }

    public function render()
    {
        $this->monthlyQuestions = $this->user->monthlyQuestions;

        $employeeMonthlyScoresChart = $this->monthlyQuestions->reduce(function ($employeeMonthlyScoresChartModel, $data) {
            return $employeeMonthlyScoresChartModel->addPoint($data->created_at->format('m/Y'), number_format($data->last_month_score, 2));
        }, LivewireCharts::lineChartModel()
            ->setAnimated($this->firstRun)
            ->setSmoothCurve()
            ->setXAxisVisible(false)
            ->setYAxisVisible(true)
            ->setDataLabelsEnabled($this->showDataLabels)
        );

        $this->firstRun = false;

        return view('livewire.questionaires.employee-monthly', compact('employeeMonthlyScoresChart'));
    }
}
