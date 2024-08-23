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
    Route::get('/rewards/customers-referal-list/{agent_id}', 'RewardsController@getCustomerReferalNetwork')->name('rewards-customers-referal-list.show-customers-referal');

    // Rewards Payment
    Route::get('/agent-payments', 'AgentPaymentsController@getAgentPayment')->name('agent-payments.index');

    // Prospek Customer
    Route::resource('customers', 'CustomersController');

    // Customers Network
    Route::get('/rewards/umroh-customers', 'RewardsController@getUmrohCustomers')->name('umroh-customers.data');
    Route::get('/rewards/hajj-customers', 'RewardsController@getHajjCustomers')->name('hajj-customers.data');
    Route::get('/saving/umroh-customers', 'RewardsController@getUmrohSavingCustomers')->name('umroh-saving-customers.data');
    Route::get('/saving/hajj-customers', 'RewardsController@getHajjSavingCustomers')->name('hajj-saving-customers.data');

    Route::post('/mark-umroh-customer/{customer_id}', 'RewardsController@markUmrohCustomer')->name('mark-umroh-customer.update');
    Route::post('/mark-hajj-customer/{customer_id}', 'RewardsController@markHajjCustomer')->name('mark-hajj-customer.update');

    // Customers Potential
    Route::get('/potential/umroh-customers', 'RewardsController@getPotentialUmrohCustomers')->name('potential-umroh-customers.data');
    Route::get('/potential/edit-umroh-customer/{customer_id}', 'RewardsController@editPotentialUmrohCustomer')->name('edit-potential-umroh-customer.edit');
    Route::post('/potential/umroh-customer/{customer_id}', 'RewardsController@postPoinUmrohCustomer')->name('umroh-customer.update');


});
