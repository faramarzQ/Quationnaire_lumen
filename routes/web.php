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
$router->group(['prefix' => 'admin'], function () use ($router) {
    $router->get('/', function ()    {
        return view('admin.index');
    });
    $router->get('login', function ()    {
        return view('auth.login');
    });
});

/************
*   Web
************/
$router->post('login', 'Admin\UserController@login');

$router->group(['prefix' => 'auth', 'middleware' => 'auth_web'], function () use ($router) {
    $router->get('logout', 'Admin\UserController@logout');
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