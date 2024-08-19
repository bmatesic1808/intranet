<?php

namespace App\Providers;

use App\Models\Absence;
use App\Observers\AbsenceObserver;
use Illuminate\Support\ServiceProvider;
use Cmixin\BusinessDay;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Absence::observe(AbsenceObserver::class);

        $additional_holidays = [
            'dan_drzavnosti' => '05-30',
            'tijelovo' => '06-03',
            '2nd-sunday-of-may' => null,
            'easter-47' => null,
            'easter-60' => null,
            '06-25' => null,
            '10-08' => null,
            'sjecanje-na-domovinski-rat' => '11-18',
        ];

        BusinessDay::enable(\Illuminate\Support\Carbon::class, 'hr', $additional_holidays);
    }
}
