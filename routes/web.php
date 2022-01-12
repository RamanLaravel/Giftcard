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

$router->get('/card-types','TypeController@index');
$router->post('/add-card-types','TypeController@add');
$router->post('/update-card-types/{id}','TypeController@update');
$router->get('/delete-card-types/{id}','TypeController@delete');

$router->get('/giftcard','CardController@index');
$router->post('/add-giftcard','CardController@add');
$router->post('/update-giftcard/{id}','CardController@update');
$router->get('/delete-giftcard/{id}','CardController@delete');

$router->post('/payment','PaymentController@discount');