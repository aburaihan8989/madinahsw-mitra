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

    Route::get('/result1-pagi/{id}', 'Report1ResultsController@pagi_create')->name('report1result.pagi_create');
    Route::post('/result1-pagi/{id}', 'Report1ResultsController@pagi_store')->name('report1result.pagi_store');

    Route::get('/result1-sore/{id}', 'Report1ResultsController@sore_create')->name('report1result.sore_create');
    Route::post('/result1-sore/{id}', 'Report1ResultsController@sore_store')->name('report1result.sore_store');

    // Route::get('/umroh-manifest-customers/{umroh_manifest_id}/create', 'UmrohManifestCustomerController@create')->name('umroh-manifest-customers.create');
    // Route::post('/umroh-manifest-customers/store/{umroh_manifest_id}', 'UmrohManifestCustomerController@store')->name('umroh-manifest-customers.store');
    // Route::delete('/umroh-manifest-customers/destroy/{umroh_manifest_customer_id}', 'UmrohManifestCustomerController@destroy')->name('umroh-manifest-customers.destroy');
    // Route::get('/umroh-manifest-customers/{umroh_manifest_customer_id}/edit', 'UmrohManifestCustomerController@edit')->name('umroh-manifest-customers.edit');
    // Route::patch('/umroh-manifest-customers/update/{umroh_manifest_customer_id}', 'UmrohManifestCustomerController@update')->name('umroh-manifest-customers.update');
    // Route::get('/umroh-manifest-customers/{umroh_manifest_customer_id}', 'UmrohManifestCustomerController@show')->name('umroh-manifest-customers.show');


});
