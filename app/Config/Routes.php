<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(true);
$routes->get('/', 'Auth::index');
$routes->get('detail_ranap/(:num)/(:num)', 'Detail_ranap::index/$1/$2');
// $routes->get('detail_ranap/tampilKunjungan', 'Detail_ranap::tampilKunjungan');
