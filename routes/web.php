<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('vehicles','VehicleController');
    Route::resource('routes','RouteController');
    Route::resource('businesses','BusinessController');
    Route::resource('kat33s','Kat33Controller');
    Route::resource('feedbacks','FeedbackController');
    Route::resource('users','UserController');
    Route::get('users/reset/{id}', ['uses' => 'UserController@reset']);
    Route::put('users/{id}/resetp', ['uses' => 'UserController@resetPassword', 'as' => 'users.resetp']);
});

