<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\CoreContext\Users\Domain\Entities\UserRepository', 'App\CoreContext\Users\Infrastructure\Repositories\EloquentUserRepository');
        $this->app->bind('App\CoreContext\Companies\Domain\Entities\CompanyRepository', 'App\CoreContext\Companies\Infrastructure\Repositories\EloquentCompanyRepository');
        $this->app->bind('App\CoreContext\Season\Domain\Entities\SeasonRepository', 'App\CoreContext\Season\Infrastructure\Repositories\EloquentSeasonRepository');

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
