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
    $this->app->bind('App\Contracts\Dao\TodolistDaoInterface', 'App\Dao\TodolistDao');
    $this->app->bind('App\Contracts\Services\TodolistServiceInterface', 'App\Services\TodolistService');
    

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
