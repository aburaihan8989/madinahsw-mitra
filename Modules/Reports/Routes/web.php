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

Route::group(['middleware' => 'auth'], function () {
    //Activity Report
    Route::resource('activity', 'ActivityController');
    Route::get('/schedule', 'ActivityController@schedule')->name('activity.schedule');
    Route::get('/show-schedule/{id_activity}', 'ActivityController@show_schedule')->name('activity.show-schedule');
});
