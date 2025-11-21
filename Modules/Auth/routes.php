<?php

// HMVC Module: Auth

use Wasf\Routing\Router;

$router->group(['middleware' => ['guest']], function($r){
    $r->get('/login', 'AuthController@showLogin');
    $r->post('/login', 'AuthController@login');

    $r->get('/register', 'AuthController@showRegister');
    $r->post('/register', 'AuthController@register');
});

$router->get('/logout', 'AuthController@logout');