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
    Route::resource('report1', 'Report1TasksController');
    Route::resource('report1result', 'Report1ResultsController');

    Route::get('report12', 'Report1TasksController@riwayat')->name('report12.riwayat');

    Route::get('/result1-pagi/{id}', 'Report1ResultsController@pagi_create')->name('report1result.pagi_create');
    Route::post('/result1-pagi/{id}', 'Report1ResultsController@pagi_store')->name('report1result.pagi_store');

    Route::get('/result1-siang/{id}', 'Report1ResultsController@siang_create')->name('report1result.siang_create');
    Route::post('/result1-siang/{id}', 'Report1ResultsController@siang_store')->name('report1result.siang_store');


});
