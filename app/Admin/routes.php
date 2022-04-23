<?php


use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('/products',AdminProductController::class);
    $router->resource('/users',AdminUserController::class);
    $router->resource('/orders',OrderController::class);
    $router->resource('/carts',CartController::class);

});
