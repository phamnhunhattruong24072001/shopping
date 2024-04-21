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
        $this->app->singleton(\App\Repositories\Interfaces\CategoryRepositoryInterface::class, \App\Repositories\Entities\CategoryRepository::class);
        $this->app->singleton(\App\Repositories\Interfaces\AdminRepositoryInterface::class, \App\Repositories\Entities\AdminRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
