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
    Route::group(['prefix' => 'v1'], function () {
        Route::get('/exams', array('as' => 'api.exams', 'uses' => 'ApiController@exams'));
        Route::post('/subscribe', array('as' => 'api.subscribe', 'uses' => 'ApiController@subscribe'));
        Route::post('/unsubscribe', array('as' => 'api.unsubscribe', 'uses' => 'ApiController@unsubscribe'));
        Route::post('/visit', array('as' => 'api.visit', 'uses' => 'ApiController@visit'));
        Route::post('/favorite', array('as' => 'api.favorite', 'uses' => 'ApiController@favorite'));
    });
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

Route::get('/', 'FrontController@home')->name('home');

Route::auth();
Route::post('/exams/{id}/activate', array('as' => 'exams.activate', 'uses' => 'ExamController@activate'));

Route::resource('exams', 'ExamController');
Route::resource('visits', 'VisitController');
Route::resource('favorites', 'FavoriteController');

Route::get('visitors/statistics', 'VisitorController@statistics')->name('visitors.statistics');
Route::get('/visitors/data', array('as' => 'visitors.index.data', 'uses' => 'VisitorController@indexData'));
Route::resource('visitors', 'VisitorController');

Route::resource('notification', 'NotificationController');
Route::post('notification/{id}/send', 'NotificationController@send')->name('notification.send');

Route::group([ 'prefix' => 'logs'], function() {
    Route::get('/', [ 'as'    => 'log-viewer::dashboard',  'uses'  => 'LogController@index',]);
    Route::get('/lists', [ 'as'    => 'log-viewer::logs.list',  'uses'  => 'LogController@listLogs',]);
    Route::delete('delete', ['as'    => 'log-viewer::logs.delete', 'uses'  => 'LogController@delete',]);
    Route::group([ 'prefix'    => '{date}',], function() {
        Route::get('/', ['as'    => 'log-viewer::logs.show', 'uses'  => 'LogController@show',]);
        Route::get('download', ['as'    => 'log-viewer::logs.download', 'uses'  => 'LogController@download',]);
        Route::get('{level}', ['as'    => 'log-viewer::logs.filter', 'uses'  => 'LogController@showByLevel',]);
    });
});
