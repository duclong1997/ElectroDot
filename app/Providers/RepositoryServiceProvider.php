<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(\App\Repositories\LoginRepository::class, \App\Repositories\LoginRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\HomepageRepository::class, \App\Repositories\HomepageRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\SignupRepository::class, \App\Repositories\SignupRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ProfileRepository::class, \App\Repositories\ProfileRepositoryEloquent::class);
        //:end-bindings:
    }
}
