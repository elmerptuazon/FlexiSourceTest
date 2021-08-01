<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Importer\ImportService;
use App\Services\Importer\IImportService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IImportService::class, ImportService::class);
    }
}
