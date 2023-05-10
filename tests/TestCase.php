<?php

namespace Tests;

use Morenorafael\Wompi\Facades\Wompi;
use Morenorafael\Wompi\Providers\WompiServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
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
}
