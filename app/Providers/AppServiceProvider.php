<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\ErrorLogHandler;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // $handler = new StreamHandler('php://stdout');
        $handler = new ErrorLogHandler();
        \Log::getMonolog()->pushHandler($handler);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (env('APP_ENV') == 'local')
        {
            $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
        }
    }
}
