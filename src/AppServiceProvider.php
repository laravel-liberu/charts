<?php

namespace LaravelLiberu\Charts;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/charts.php', 'liberu.charts');

        $this->publishes([
            __DIR__.'/../config' => config_path('liberu'),
        ], ['charts-config', 'liberu-config']);
    }
}
