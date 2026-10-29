<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->get('/', 'Pages::index');
$routes->get('about', 'Pages::about');

$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::authenticate');
$routes->post('logout', 'Auth::logout');

$routes->group(
    'customers',
    ['filter' => 'auth'],
    static function ($routes) {
        $routes->get('', 'Customers::index');
        $routes->get('new', 'Customers::new');
        $routes->post('create', 'Customers::create');
        $routes->get('edit/(:num)', 'Customers::edit/$1');
        $routes->post('update/(:num)', 'Customers::update/$1');
    }
);

$routes->group(
    'users',
    ['filter' => 'auth'],
    static function ($routes) {
        $routes->get('', 'Users::index');
        $routes->get('new', 'Users::new');
        $routes->post('create', 'Users::create');
        $routes->get('edit/(:num)', 'Users::edit/$1');
        $routes->post('update/(:num)', 'Users::update/$1');
    }
);