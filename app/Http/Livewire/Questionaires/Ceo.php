<?php

namespace App\Http\Livewire\Questionaires;

use App\Models\CeoScore;
use Livewire\Component;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;

class Ceo extends Component
{
    public $showDataLabels = true;
    public $firstRun = true;
    public $scores;

    public function render()
    {
        $this->scores = CeoScore::all();

        $understandingChart = $this->scores->reduce(function ($understandingChartModel, $data) {
            return $understandingChartModel->addPoint($data->year, number_format($data->understanding / $data->times_rated, 2));
        }, LivewireCharts::lineChartModel()
            ->setAnimated($this->firstRun)
            ->setSmoothCurve()
            ->setXAxisVisible(false)
            ->setYAxisVisible(true)
            ->setDataLabelsEnabled($this->showDataLabels)
        );

        $rightTimeInfoChart = $this->scores->reduce(function ($rightTimeInfoChartModel, $data) {
            return $rightTimeInfoChartModel->addPoint($data->year, number_format($data->right_time_info / $data->times_rated, 2));
        }, LivewireCharts::lineChartModel()
            ->setAnimated($this->firstRun)
            ->setSmoothCurve()
            ->setXAxisVisible(false)
            ->setYAxisVisible(true)
            ->setDataLabelsEnabled($this->showDataLabels)
        );

        $companyInfoSharingChart = $this->scores->reduce(function ($companyInfoSharingChartModel, $data) {
            return $companyInfoSharingChartModel->addPoint($data->year, number_format($data->company_info_sharing / $data->times_rated, 2));
        }, LivewireCharts::lineChartModel()
            ->setAnimated($this->firstRun)
            ->setSmoothCurve()
            ->setXAxisVisible(false)
            ->setYAxisVisible(true)
            ->setDataLabelsEnabled($this->showDataLabels)
        );

        $decisionsChart = $this->scores->reduce(function ($decisionsChartModel, $data) {
            return $decisionsChartModel->addPoint($data->year, number_format($data->decisions / $data->times_rated, 2));
        }, LivewireCharts::lineChartModel()
            ->setAnimated($this->firstRun)
            ->setSmoothCurve()
            ->setXAxisVisible(false)
            ->setYAxisVisible(true)
            ->setDataLabelsEnabled($this->showDataLabels)
        );

        $communicationChart = $this->scores->reduce(function ($communicationChartModel, $data) {
            return $communicationChartModel->addPoint($data->year, number_format($data->communication / $data->times_rated, 2));
        }, LivewireCharts::lineChartModel()
            ->setAnimated($this->firstRun)
            ->setSmoothCurve()
            ->setXAxisVisible(false)
            ->setYAxisVisible(true)
            ->setDataLabelsEnabled($this->showDataLabels)
        );

        $focusChart = $this->scores->reduce(function ($focusChartModel, $data) {
            return $focusChartModel->addPoint($data->year, number_format($data->focus / $data->times_rated, 2));
        }, LivewireCharts::lineChartModel()
            ->setAnimated($this->firstRun)
            ->setSmoothCurve()
            ->setXAxisVisible(false)
            ->setYAxisVisible(true)
            ->setDataLabelsEnabled($this->showDataLabels)
        );

        $timeManagementChart = $this->scores->reduce(function ($timeManagementChartModel, $data) {
            return $timeManagementChartModel->addPoint($data->year, number_format($data->time_management / $data->times_rated, 2));
        }, LivewireCharts::lineChartModel()
            ->setAnimated($this->firstRun)
            ->setSmoothCurve()
            ->setXAxisVisible(false)
            ->setYAxisVisible(true)
            ->setDataLabelsEnabled($this->showDataLabels)
        );

        $reviewsChart = $this->scores->reduce(function ($reviewsChartModel, $data) {
            return $reviewsChartModel->addPoint($data->year, number_format($data->reviews / $data->times_rated, 2));
        }, LivewireCharts::lineChartModel()
            ->setAnimated($this->firstRun)
            ->setSmoothCurve()
            ->setXAxisVisible(false)
            ->setYAxisVisible(true)
            ->setDataLabelsEnabled($this->showDataLabels)
        );

        $employeeAutonomyChart = $this->scores->reduce(function ($employeeAutonomyChartModel, $data) {
            return $employeeAutonomyChartModel->addPoint($data->year, number_format($data->employee_autonomy / $data->times_rated, 2));
        }, LivewireCharts::lineChartModel()
            ->setAnimated($this->firstRun)
            ->setSmoothCurve()
            ->setXAxisVisible(false)
            ->setYAxisVisible(true)
            ->setDataLabelsEnabled($this->showDataLabels)
        );

        $careerChart = $this->scores->reduce(function ($careerChartModel, $data) {
            return $careerChartModel->addPoint($data->year, number_format($data->career / $data->times_rated, 2));
        }, LivewireCharts::lineChartModel()
            ->setAnimated($this->firstRun)
            ->setSmoothCurve()
            ->setXAxisVisible(false)
            ->setYAxisVisible(true)
            ->setDataLabelsEnabled($this->showDataLabels)
        );

        $employeeIdeasChart = $this->scores->reduce(function ($employeeIdeasChartModel, $data) {
            return $employeeIdeasChartModel->addPoint($data->year, number_format($data->employe_ideas / $data->times_rated, 2));
        }, LivewireCharts::lineChartModel()
            ->setAnimated($this->firstRun)
            ->setSmoothCurve()
            ->setXAxisVisible(false)
            ->setYAxisVisible(true)
            ->setDataLabelsEnabled($this->showDataLabels)
        );

        $knowledgeChart = $this->scores->reduce(function ($knowledgeChartModel, $data) {
            return $knowledgeChartModel->addPoint($data->year, number_format($data->knowledge / $data->times_rated, 2));
        }, LivewireCharts::lineChartModel()
            ->setAnimated($this->firstRun)
            ->setSmoothCurve()
            ->setXAxisVisible(false)
            ->setYAxisVisible(true)
            ->setDataLabelsEnabled($this->showDataLabels)
        );

        $careChart = $this->scores->reduce(function ($careChartModel, $data) {
            return $careChartModel->addPoint($data->year, number_format($data->care / $data->times_rated, 2));
        }, LivewireCharts::lineChartModel()
            ->setAnimated($this->firstRun)
            ->setSmoothCurve()
            ->setXAxisVisible(false)
            ->setYAxisVisible(true)
            ->setDataLabelsEnabled($this->showDataLabels)
        );

        $this->firstRun = false;

        return view('livewire.questionaires.ceo', compact(
            'understandingChart',
            'rightTimeInfoChart',
            'companyInfoSharingChart',
            'decisionsChart',
            'communicationChart',
            'focusChart',
            'timeManagementChart',
            'reviewsChart',
            'employeeAutonomyChart',
            'careerChart',
            'employeeIdeasChart',
            'knowledgeChart',
            'careChart',
        ));
    }
}
