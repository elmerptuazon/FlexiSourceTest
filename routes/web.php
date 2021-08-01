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

$router->post( '/login', 'AuthController@login');
$router->post( '/register', 'AuthController@register' );


$router->group(['middleware'=>'auth'], function( $router ) {
        $router->post( '/logout', 'AuthController@logout' );
	    $router->post( '/refresh', 'AuthController@refresh' );

        $router->group(['prefix' => 'customers'], function () use ($router) {
            $router->get( '/', 'CustomerController@getAll' );
            $router->get( '/{customer}', 'CustomerController@getOne' );
        });
});