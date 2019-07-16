<?php

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

//$router->get('/', function () use ($router) {
//    return $router->app->version();
//});


/************
*   Web
************/
$router->group(['prefix' => 'admin'], function () use ($router) {
    $router->get('login', ['as' => 'login', function () {
        return view('auth.login');
    }]);
    
    $router->post('login', ['as' => 'check_login', 'uses' => 'Admin\UserController@login']);
});

$router->group(['prefix' => 'auth', 'middleware' => 'auth_web'], function () use ($router) {

    $router->get('/', ['as' => 'dashboard', function () {
        return view('admin.index');
    }]);

    $router->get('logout', ['as' => 'logout', 'Admin\UserController@logout']);
    $router->get('test', 'Admin\UserController@test');
});

/************
*   API
************/
$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('entrance_verification', 'UserController@verifyEntrance');
    $router->post('login', 'API\UserController@login');
    
    $router->group(['middleware' => 'auth_api'], function () use ($router) {
        $router->post('test', 'API\QuestionnaireController@store');

    });
});