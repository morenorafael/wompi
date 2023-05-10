<?php

namespace Morenorafael\Wompi\Facades;

use Illuminate\Support\Facades\Facade;

class Wompi extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'morenorafael.wompi';
    }
}
