<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['prefix' => 'api'], function () {
    Route::get('/exams', array('as' => 'api.exams', 'uses' => 'ApiController@exams'));
});

Route::group(['middleware' => ['web']], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::resource('exams', 'ExamController');

        Route::get('/', array('as' => 'admin.login', 'uses' => 'Auth\AuthController@getLogin'));
        Route::post('/register', array('as' => 'admin.register','uses' => 'Auth\AuthController@postRegister'));
        Route::post('/login', array('as' => 'admin.postLogin', 'uses' => 'Auth\AuthController@postLogin'));
        Route::get('/logout', array('as' => 'admin.logout', 'uses' => 'Auth\AuthController@getLogout'));
    });
});
