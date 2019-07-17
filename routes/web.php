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
     * questionnaires
     */
    $router->get('questionnaires', ['as' => 'questionnaire.index', 'uses' => 'Admin\QuestionnaireController@index']);
    $router->get('questionnaires/edit/{id}', ['as' => 'questionnaire.edit', 'uses' => 'Admin\QuestionnaireController@edit']);
    $router->get('questionnaires/delete/{id}', ['as' => 'questionnaire.delete', 'uses' => 'Admin\QuestionnaireController@delete']);

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