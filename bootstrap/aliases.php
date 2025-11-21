<?php

if (!class_exists('Blade')) {
    class_alias(\Wasf\View\Blade::class, 'Blade');
}

if (!class_exists('Router')) {
    class_alias(\Wasf\Routing\Router::class, 'Router');
}

if (!class_exists('DB')) {
    class_alias(\Wasf\Database\DB::class, 'DB');
}

if (!class_exists('Request')) {
    class_alias(\Wasf\Http\Request::class, 'Request');
}

if (!class_exists('Response')) {
    class_alias(\Wasf\Http\Response::class, 'Response');
}

if (!class_exists('Config')) {
    class_alias(\Wasf\Support\Config::class, 'Config');
}

if (!class_exists('Session')) {
    class_alias(\Wasf\Session\Session::class, 'Session');
}
