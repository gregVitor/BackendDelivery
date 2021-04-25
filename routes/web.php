<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
 */

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api/v1'], function () use ($router) {

    $router->post('register', 'Auth\AuthController@registerUser');

    $router->post('login', 'Auth\AuthController@login');

    $router->group(['middleware' => 'auth'], function () use ($router) {
        $router->group(['prefix' => 'delivery'], function () use ($router) {
            $router->post('create', 'Delivery\DeliveryController@create');
            $router->get('deliveries', 'Delivery\DeliveryController@getDeliveries');
            $router->get('delivery', 'Delivery\DeliveryController@getDelivery');
        });

    });
});
