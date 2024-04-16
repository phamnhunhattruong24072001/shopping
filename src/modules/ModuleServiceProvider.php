<?php

namespace Modules;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $directories = array_map('basename', File::directories(__DIR__));
        foreach ($directories as $moduleName) {
            $this->registerModule($moduleName);
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        // configs
        $configFile = [
            'category' => __DIR__.'/Categories/configs/category.php',
        ];
        foreach ($configFile as $alias => $path) {
            $this->mergeConfigFrom($path, $alias);
        }

        // Middlewares
//        $middlewares = [
//            'demo' => '\modules\Categories\src\Http\Controllers\Middlewares\DemoMiddleware',
//        ];
//        foreach ($middlewares as $key => $value) {
//            $this->app['router']->pushMiddlewareToGroup($key, $value);
//        }

        // Commands
//        $this->commands([
//            '\modules\Categories\src\Http\Commands\DemoCommand'
//        ]);
    }

    private function registerModule($moduleName): void
    {
        $modulePath = __DIR__ . "/$moduleName/";

        // Routes
        if (File::exists($modulePath . "routes/index.php")) {
            $this->loadRoutesFrom($modulePath . "routes/index.php");
        }

        // Migrations
        if (File::exists($modulePath . "migrations")) {
            $this->loadMigrationsFrom($modulePath . "migrations");
        }

        // Languages
        if (File::exists($modulePath . "resources/lang")) {
            // Use file with php resources/lang/en/general.php : @lang('Demo::general.hello')
            $this->loadTranslationsFrom($modulePath . "resources/lang", $moduleName);
            // Use file with json
            $this->loadJSONTranslationsFrom($modulePath . 'resources/lang');
        }

        // Use view('Demo::index'), @extends('Demo::index'), @include('Demo::index')
        if (File::exists($modulePath . "resources/views")) {
            $this->loadViewsFrom($modulePath . "resources/views", $moduleName);
        }

        // Helpers
        if (File::exists($modulePath . "helpers")) {
            $helper_dir = File::allFiles($modulePath . "helpers");

            foreach ($helper_dir as $key => $value) {
                $file = $value->getPathName();
                require $file;
            }
        }
    }
}
