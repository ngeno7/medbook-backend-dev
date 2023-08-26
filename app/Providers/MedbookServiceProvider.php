<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Medbook\Patient\PatientRecordInterface;
use Medbook\Patient\PatientRecordRepo;

class MedbookServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PatientRecordInterface::class, PatientRecordRepo::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        
    }
}
