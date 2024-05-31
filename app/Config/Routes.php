<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/about', 'About::index');
$routes->get('/gallery', 'Gallery::index');
$routes->get('/product', 'Product::index');
$routes->get('/admin', 'Admin::index');