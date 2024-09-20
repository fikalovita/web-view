<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(true);
$routes->get('/', 'Auth::index');
$routes->get('detail_ranap/(:num)', 'Detail_ranap::index/$1');
