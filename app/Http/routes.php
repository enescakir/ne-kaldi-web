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






Route::group(['prefix' => 'api'], function () {
    Route::get('/exams', array('as' => 'api.exams', 'uses' => 'ApiController@exams'));
    Route::post('/visit', array('as' => 'api.visit', 'uses' => 'ApiController@visit'));
    Route::post('/name/update', array('as' => 'api.name.update', 'uses' => 'ApiController@updateName'));
});

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
Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        return view('welcome');
    });

    Route::auth();
    Route::resource('exams', 'ExamController');
    Route::resource('visits', 'VisitController');
    Route::resource('visitors', 'VisitorController');

});
