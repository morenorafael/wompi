<?php

namespace Morenorafael\Wompi\Providers;

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;
use Morenorafael\Wompi\WompiManager;

class WompiServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton('morenorafael.wompi', function (Application $app) {
            $config = $app['config']['wompi'];
            $default = $config['default'];
            $environment = $config['environments'][$default];

            $client = Http::withOptions([
                'base_uri' => $environment['url'],
                'timeout' => 10,
                'connect_timeout' => 2,
            ]);

            return new WompiManager($client, $environment);
        });


        $this->mergeConfigFrom(
            __DIR__.'/../../config/wompi.php', 'wompi'
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../../config/wompi.php' => config_path('wompi.php'),
        ], 'wompi-config');
    }
}
