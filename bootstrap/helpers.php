<?php

if (!function_exists('app')) {
    function app() {
        return $GLOBALS['WASF_APP'] ?? null;
    }
}

if (!function_exists('config')) {
    function config(string $key, $default = null) {
        return \Wasf\Support\Config::get($key, $default);
    }
}

if (!function_exists('env')) {
    function env(string $key, $default = null) {
        $v = getenv($key);
        return $v === false ? $default : $v;
    }
}

if (!function_exists('base_path')) {
    function base_path(string $path = '') {
        $root = app()->basePath();
        return $path ? $root . '/' . ltrim($path, '/') : $root;
    }
}

if (!function_exists('view')) {
    function view(string $v, array $data = []) {
        return Blade::render($v, $data);
    }
}
