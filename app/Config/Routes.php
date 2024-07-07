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
$routes->get('/productlist', 'ProductList::index');
$routes->get('/productlist/getProducts', 'ProductList::getProducts');
$routes->get('/productlist/getProduct/(:num)', 'ProductList::getProduct/$1');
$routes->post('/productlist/save', 'ProductList::save');
$routes->post('/productlist/update', 'ProductList::update');
$routes->post('/productlist/delete', 'ProductList::delete');
$routes->get('/promotion', 'PromotionList::index');
$routes->get('/promotionlist/getPromotions', 'PromotionList::getPromotions');
$routes->get('/promotionlist/getPromotion/(:num)', 'PromotionList::getPromotion/$1');
$routes->post('/promotionlist/save', 'PromotionList::save');
$routes->post('/promotionlist/update', 'PromotionList::update');
$routes->post('/promotionlist/delete', 'promotionlist::delete');
$routes->get('/subcription', 'SubcriptionList::index');
$routes->get('/subcriptionlist/getUser', 'SubcriptionList::getUser');
$routes->post('/subcriptionlist/deleteUser', 'SubcriptionList::deleteUser');
$routes->get('/auth', 'Auth::index');

