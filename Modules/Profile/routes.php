<?php

// HMVC Module: Profile

use Wasf\Routing\Router;

$router->group(['middleware' => ['web', 'auth']], function () use ($router) {

    $router->get('/profile', 'ProfileController@index');
    $router->get('/profile/edit', 'ProfileController@edit');
    $router->post('/profile/edit', 'ProfileController@update');

});