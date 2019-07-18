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
$router->get('login', ['as' => 'login', 'uses' => 'Admin\UserController@showLoginForm']);

$router->post('login', ['as' => 'check_login', 'uses' => 'Admin\UserController@login']);

$router->group(['prefix' => 'admin', 'middleware' => 'auth_web'], function () use ($router) {

    $router->get('/', ['as' => 'dashboard', function ()    {
        return view('admin.index');
    }]);
    
});

$router->group(['prefix' => 'auth', 'middleware' => 'auth_web'], function () use ($router) {

    $router->get('/', ['as' => 'dashboard', function () {
        return view('admin.index');
    }]);

    $router->get('logout', ['as' => 'logout', 'uses' => 'Admin\UserController@logout']);

    /**
     * questioners
     */
    $router->get('questioners', ['as' => 'questioners.index', 'uses' => 'Admin\QuestionerController@index']);
    $router->get('questioner/{id}', ['as' => 'questioners.show', 'uses' => 'Admin\QuestionerController@show']);
    $router->get('questioners/create', ['as' => 'questioners.create', 'uses' => 'Admin\QuestionerController@create']);
    $router->post('questioners/store', ['as' => 'questioners.store', 'uses' => 'Admin\QuestionerController@store']);
    $router->get('questioners/edit/{id}', ['as' => 'questioners.edit', 'uses' => 'Admin\QuestionerController@edit']);
    $router->post('questioners/update/{id}', ['as' => 'questioners.update', 'uses' => 'Admin\QuestionerController@update']);
    $router->get('questioners/delete/{id}', ['as' => 'questioners.delete', 'uses' => 'Admin\QuestionerController@delete']);
    $router->get('questioners/check/{id}', ['as' => 'questioners.check', 'uses' => 'Admin\QuestionerController@check']);

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