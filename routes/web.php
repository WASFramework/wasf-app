<?php
$router->get('/', 'WelcomeController@index')->name('welcome');

// single route with alias middleware
$router->get('/dashboard', 'DashboardController@index')->middleware('auth')->name('dashboard');

// group with middleware group
$router->group(['prefix'=>'admin', 'middleware' => ['auth','web']], function($r){
    $r->get('/dashboard', 'AdminController@index')->name('admin.dashboard');
});

// global middleware will run for all routes
$router->get('/user/{id}', 'UserController@show')->name('user.show');

$router->get('/test', function() {
    dd([
        'app_name' => config('app.name'),
        'version' => config('app.version'),
        'env' => config('app.env'),
        'debug' => config('app.debug'),
    ]);
});

$router->get('/test-helper', function () {
    echo rupiah(25000) . "<br>";
    echo limit("Lorem ipsum dolor sit amet", 10);
});