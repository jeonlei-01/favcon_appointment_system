<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\UrlGenerator;


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
public function boot(UrlGenerator $url)
{
    if (env('APP_ENV') == 'production') {
      $url->forceScheme('https');
    }
    Validator::extend('in_current_or_next_month', function ($attribute, $value, $parameters, $validator) {
        $selectedDate = new \DateTime($value);

        // Get the current month and year
        $currentMonth = date('n'); // Numeric representation of the current month
        $currentYear = date('Y'); // Current year

        // Get the month and year of the selected date
        $selectedMonth = $selectedDate->format('n');
        $selectedYear = $selectedDate->format('Y');

        // Check if the selected date is within the current or next month
        if (($selectedYear == $currentYear && $selectedMonth == $currentMonth) || ($selectedYear == $currentYear && $selectedMonth == $currentMonth + 1)) {
            return true;
        }

        return false;

    });
}


    
}
