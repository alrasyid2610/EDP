<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\View\Components\ComDataShipDoc;
use App\View\Components\ComBreadcrumb;
use App\View\Components\ComBreadcrumbTechDoc;
use App\View\Components\ComTableComputers;
use App\View\Components\ComBreadcrumbGoodCome;
use App\View\Components\forms\ComFormKeyboard;
use App\View\Components\forms\ComFormMsOffice;
use App\View\Components\forms\ComFormOS;

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
        Blade::component('data-ship-doc', ComDataShipDoc::class);
        Blade::component('breadcrumb', ComBreadcrumb::class);
        Blade::component('breadcrumb2', ComBreadcrumbTechDoc::class);
        Blade::component('breadcrumb3', ComBreadcrumbGoodCome::class);
        Blade::component('table-computer', ComTableComputers::class);
        Blade::component('form-keyboard', ComFormKeyboard::class);
        Blade::component('form-os', ComFormOS::class);
        Blade::component('form-office', ComFormMsOffice::class);
        // Blade::component('table-computer', ComTableComputers::class);
    }
}
