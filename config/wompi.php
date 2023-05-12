<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Environment Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you can specify which of the environments you want
    | to use as your default connection.
    |
    */

    'default' => env('WOMPI_ENVIRONMENT', 'sandbox'),

    /*
    |--------------------------------------------------------------------------
    | Environments
    |--------------------------------------------------------------------------
    |
    | Here are the different environments that you can use according
    | to your need.
    |
    */

    'environments' => [

        'sandbox' => [
            'url' => env('WOMPI_URL_SANDBOX', 'https://sandbox.wompi.co/v1/'),
            'keys' => [
                'public' => env('WOMPI_PUBLIC_KEY_SANDBOX'),
                'private' => env('WOMPI_PRIVATE_KEY_SANDBOX'),
            ],
        ],

        'production' => [
            'url' => env('WOMPI_URL', 'https://production.wompi.co/v1/'),
            'keys' => [
                'public' => env('WOMPI_PUBLIC_KEY'),
                'private' => env('WOMPI_PRIVATE_KEY'),
            ],
        ],
    ],
];
