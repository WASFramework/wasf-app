<?php

return [
    'version' => env('APP_VERSION', '1.1.0'),
    'name' => env('APP_NAME', 'WasFramework'),
    'env'  => env('APP_ENV', 'development'),
    'debug' => env('APP_DEBUG', true),
    'url' => env('APP_URL', 'http://localhost'),
    'timezone' => env('TIME_ZONE', 'Asia/Jakarta'),
    'locale' => 'id',
    'fallback_locale' => 'en',
    'faker_locale' => 'id_ID',

    'aliases' => [
        'Blade'     => Wasf\Support\Facades\Blade::class,
        'Config'    => Wasf\Support\Facades\Config::class,
        'Router'    => Wasf\Support\Facades\Router::class,
        'DB'        => Wasf\Support\Facades\DB::class,
        'Request'   => Wasf\Http\Request::class,
        'Response'  => Wasf\Http\Response::class,
        'Sessions'  => Wasf\Session\Session::class,
        'Schema'    => Wasf\Database\Schema::class,
    ],
];