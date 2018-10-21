<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Table\TableService;
use App\Services\Table\TableServiceContract;
use App\Services\Drinks\DrinksService;
use App\Services\Drinks\DrinksServiceContract;
use App\Services\Areas\AreasService;
use App\Services\Areas\AreasServiceContract;
use App\Services\Bill\BillService;
use App\Services\Bill\BillServiceContract;
use App\Services\Detailbill\DetailbillService;
use App\Services\Detailbill\DetailbillServiceContract;

class ManagerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TableServiceContract::class, TableService::class);
        $this->app->bind(DrinksServiceContract::class, DrinksService::class);
        $this->app->bind(AreasServiceContract::class, AreasService::class);
        $this->app->bind(BillServiceContract::class, BillService::class);
        $this->app->bind(DetailbillServiceContract::class, DetailbillService::class);
    }
}
