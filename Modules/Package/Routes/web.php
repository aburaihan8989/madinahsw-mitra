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

    Route::resource('packages', 'PackagesController');
    Route::resource('products', 'ProductsController');

    Route::get('manifests/{id}', 'ManifestsController@index')->name('manifests.index');
    Route::get('manifests/create/{id}', 'ManifestsController@create')->name('manifests.create');
    Route::post('manifests/create', 'ManifestsController@store')->name('manifests.store');
    Route::get('manifests/edit/{id}', 'ManifestsController@edit')->name('manifests.edit');
    Route::patch('manifests/edit', 'ManifestsController@update')->name('manifests.update');
    Route::get('manifests/show/{id}', 'ManifestsController@show')->name('manifests.show');

});
