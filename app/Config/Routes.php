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
$routes->get('/productlist/getProductById/(:num)', 'ProductList::getProductById/$1');
$routes->post('/productlist/saveProduct', 'ProductList::saveProduct');
$routes->post('/productlist/updateProduct/(:num)', 'ProductList::updateProduct/$1');
$routes->post('/productlist/deleteProduct', 'ProductList::delete');
$routes->get('/productlist/getCategories', 'ProductList::getCategories');
$routes->get('/productlist/getShops', 'ProductList::getShops');
$routes->post('/productlist/updateRecomended/(:num)', 'ProductList::updateRecomended/$1');
$routes->get('/promotion', 'PromotionList::index');
$routes->get('/promotionlist/getPromotions', 'PromotionList::getPromotions');
$routes->get('/promotionlist/getPromotion/(:num)', 'PromotionList::getPromotion/$1');
$routes->post('/promotionlist/save', 'PromotionList::save');
$routes->post('/promotionlist/update', 'PromotionList::update');
$routes->post('/promotionlist/delete', 'Promotionlist::delete');
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
$routes->get('/product/(:any)', 'Product::detailProduct/$1');
$routes->get('/promotion/(:any)', 'Home::detailPromotion/$1');
$routes->get('/userlist', 'UserList::index');
$routes->post('/userlist/delete', 'UserList::delete');
$routes->post('/userlist/updatePostStatus', 'UserList::updatePostStatus');
$routes->get('/userlist/getComment', 'UserList::getComment');
$routes->get('/shoplist', 'ShopList::index');
$routes->get('/shoplist/edit/(:num)', 'ShopList::edit/$1');
$routes->post('/shoplist/update/(:num)', 'ShopList::update/$1');
$routes->get('/medialist', 'MediaList::index');
$routes->get('/medialist/getMedia', 'MediaList::getMedia');
$routes->get('getMediaById/(:num)', 'MediaList::getMediaById/$1');
$routes->post('/medialist/saveMedia', 'MediaList::saveMedia');
$routes->post('/updateMedia', 'MediaList::updateMedia');
$routes->post('/deleteMedia', 'MediaList::deleteMedia');
$routes->get('/overview', 'OverView::index');


$routes->get('/auth', 'Auth::index');
$routes->post('/auth', 'Auth::login');
$routes->get('/logout', 'Auth::logout');
