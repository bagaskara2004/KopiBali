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
$routes->get('/cproduct', 'CProduct::index');
$routes->get('/cproduct/getCategories', 'CProduct::getCategories');
$routes->get('/cproduct/getCategory/(:num)', 'CProduct::getCategory/$1');
$routes->post('/cproduct/save', 'CProduct::save');
$routes->post('/cproduct/update', 'CProduct::update');
$routes->post('/cproduct/delete', 'CProduct::delete');
$routes->get('/shoplist', 'ShopList::index');
$routes->get('/shoplist/getShops', 'ShopList::getShops');
$routes->post('/shoplist/save', 'ShopList::save');
$routes->post('/user', 'Home::user');

$routes->get('/auth', 'Auth::index');
