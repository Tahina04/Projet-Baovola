<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');

$routes->group('api', ['filter' => 'cors'], function($routes) {
    $routes->post('register', 'AuthController::register');
    $routes->post('login', 'AuthController::login');
    $routes->post('logout', 'AuthController::logout');
});
