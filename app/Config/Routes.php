<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Frontend Routes
//$routes->get('/', 'Frontend\Home::index', ['as' => 'frontend_home']);
$routes->addRedirect('/', 'admin/products');
// Admin Routes
$routes->group('admin', function($routes) {
    $routes->add('login', 'Admin\Auth::login', ['as' => 'admin_login']);
    $routes->add('logout', 'Admin\Auth::logout', ['as' => 'admin_logout']);

    $routes->add('products', 'Admin\Products::index', ['as' => 'admin_products', 'filter' => 'adminauth']);
    $routes->add('products/create', 'Admin\Products::create', ['as' => 'admin_products_create', 'filter' => 'adminauth']);
    $routes->add('products/store', 'Admin\Products::store', ['as' => 'admin_products_store', 'filter' => 'adminauth']);
    $routes->add('products/(:num)/edit', 'Admin\Products::edit/$1', ['as' => 'admin_products_edit', 'filter' => 'adminauth']);
    $routes->add('products/(:num)/delete', 'Admin\Products::delete/$1', ['as' => 'admin_products_delete', 'filter' => 'adminauth']);
    $routes->add('products/(:num)/update', 'Admin\Products::update/$1', ['as' => 'admin_products_update', 'filter' => 'adminauth']);

    $routes->addRedirect('/', 'admin_products');

    // Admin/Blog
    $routes->group('blog', function($routes) {
        $routes->add('insert/(:any)', 'Admin\Blog::insert/$1', [
            'as' => 'admin_blog_insert',
            'filter' => 'adminauth',
        ]);

        $routes->add('update', 'Admin\Blog::update', [
            'as' => 'admin_blog_update',
            'filter' => 'adminauth',
        ]);

        $routes->add('delete', 'Admin\Blog::delete', [
            'as' => 'admin_blog_delete',
            'filter' => 'adminauth',
        ]);
    });

    // Users
    $routes->add('users', 'Admin\Users::index', ['as' => 'admin_users']);

});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
