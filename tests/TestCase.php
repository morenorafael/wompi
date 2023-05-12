<?php

namespace Morenorafael\Wompi\Tests;

use Illuminate\Contracts\Config\Repository;
use Morenorafael\Wompi\Facades\Wompi;
use Morenorafael\Wompi\Providers\WompiServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            WompiServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'Wompi' => Wompi::class,
        ];
    }

    protected function defineEnvironment($app)
    {
        tap($app->make('config'), function (Repository $config) {
            $config->set('wompi.default', 'sandbox');
            $config->set('wompi.environments.sandbox', [
                'url' => 'https://sandbox.wompi.co/v1/',
                'keys' => [
                    'public' => 'pub_test_M9fXbD0MU57v2wxUotF8IuMjFgx19mMl',
                    'private' => 'prv_test_s9viR10rz6lGxbzwyGdqrpvsjHI1pfje',
                ],
            ]);
        });
    }
}
