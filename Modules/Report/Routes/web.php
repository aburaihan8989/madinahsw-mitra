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
    //Route kelas mengaji anak tk
    Route::resource('report1', 'Report1TasksController');
    Route::resource('report1result', 'Report1ResultsController');

    Route::get('report12', 'Report1TasksController@riwayat')->name('report12.riwayat');

    Route::get('/result1-pagi/{id}', 'Report1ResultsController@pagi_create')->name('report1result.pagi_create');
    Route::post('/result1-pagi/{id}', 'Report1ResultsController@pagi_store')->name('report1result.pagi_store');

    Route::get('/result1-siang/{id}', 'Report1ResultsController@siang_create')->name('report1result.siang_create');
    Route::post('/result1-siang/{id}', 'Report1ResultsController@siang_store')->name('report1result.siang_store');

    //Route kelas mengaji anak sd
    Route::resource('kelas2-task', 'Kelas2TasksController');
    Route::resource('kelas2-result', 'Kelas2ResultsController');

    Route::get('kelas2-riwayat', 'Kelas2TasksController@riwayat')->name('kelas2-task.riwayat');

    Route::get('/kelas2-pagi/{id}', 'Kelas2ResultsController@pagi_create')->name('kelas2-result.pagi_create');
    Route::post('/kelas2-pagi/{id}', 'Kelas2ResultsController@pagi_store')->name('kelas2-result.pagi_store');

    Route::get('/kelas2-siang/{id}', 'Kelas2ResultsController@siang_create')->name('kelas2-result.siang_create');
    Route::post('/kelas2-siang/{id}', 'Kelas2ResultsController@siang_store')->name('kelas2-result.siang_store');

    Route::get('/kelas2-sore/{id}', 'Kelas2ResultsController@sore_create')->name('kelas2-result.sore_create');
    Route::post('/kelas2-sore/{id}', 'Kelas2ResultsController@sore_store')->name('kelas2-result.sore_store');

    //Route kelas mengaji al quran
    Route::resource('kelas3-task', 'Kelas3TasksController');
    Route::resource('kelas3-result', 'Kelas3ResultsController');

    Route::get('kelas3-riwayat', 'Kelas3TasksController@riwayat')->name('kelas3-task.riwayat');

    Route::get('/kelas3-pagi/{id}', 'Kelas3ResultsController@pagi_create')->name('kelas3-result.pagi_create');
    Route::post('/kelas3-pagi/{id}', 'Kelas3ResultsController@pagi_store')->name('kelas3-result.pagi_store');

    Route::get('/kelas3-siang/{id}', 'Kelas3ResultsController@siang_create')->name('kelas3-result.siang_create');
    Route::post('/kelas3-siang/{id}', 'Kelas3ResultsController@siang_store')->name('kelas3-result.siang_store');

    Route::get('/kelas3-sore/{id}', 'Kelas3ResultsController@sore_create')->name('kelas3-result.sore_create');
    Route::post('/kelas3-sore/{id}', 'Kelas3ResultsController@sore_store')->name('kelas3-result.sore_store');

});
