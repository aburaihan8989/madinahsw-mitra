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

    // Agent Network
    Route::get('/rewards/agents-list', 'RewardsController@getAgentNetwork')->name('rewards-agents-list.show-agents');
    Route::get('/rewards/customers-list', 'RewardsController@getCustomerNetwork')->name('rewards-customers-list.show-customers');

    Route::get('/rewards/customers-referal-list/{agent_id}', 'RewardsController@show_customers_referal')->name('rewards-customers-referal-list.show-customers');

    // Rewards Payment
    Route::get('/agent-payments', 'AgentPaymentsController@getAgentPayment')->name('agent-payments.index');

});
