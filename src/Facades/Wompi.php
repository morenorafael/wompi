<?php

namespace Morenorafael\Wompi\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Morenorafael\Wompi\WompiManager generateAcceptanceToken()
 * @method static \Morenorafael\Wompi\Tokens\Card card()
 * @method static \Morenorafael\Wompi\Tokens\Nequi nequi()
 */
class Wompi extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'morenorafael.wompi';
    }
}
