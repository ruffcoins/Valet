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
Route::get('home', 'PagesController@index')->name('home');

// Customer Routes
Route::get('customers', 'CustomerController@index')->name('customerList');
Route::get('customer/new', 'CustomerController@create')->name('newCustomer');
Route::post('customer/new', 'CustomerController@store')->name('createCustomer');
Route::get('customer/{customer}/edit', 'CustomerController@edit')->name('editCustomer');
Route::patch('customer/{customer}/edit', 'CustomerController@update')->name('updateCustomer');
Route::patch('customer/{customer}/delete', 'CustomerController@destroy')->name('deleteCustomer');
Route::get('customer/{customer}/show', 'CustomerController@show')->name('showCustomer');

// Sales Routes
Route::get('sales', 'SaleController@index')->name('salesList');
Route::get('sale/new', 'SaleController@create')->name('newSale');
Route::post('sale/new', 'SaleController@store')->name('createSale');

// Expenses Routes
Route::get('expenses', 'ExpenseController@index')->name('expenseList');
Route::get('expense/new', 'ExpenseController@create')->name('newExpense');
Route::post('expense/new', 'ExpenseController@store')->name('createExpense');

// Services Routes
Route::get('services', 'ServiceController@index')->name('serviceList');
Route::get('service/new', 'ServiceController@create')->name('newService');
Route::post('service/new', 'ServiceController@store')->name('createService');
Route::get('service/{service}/edit', 'ServiceController@edit')->name('editService');
Route::patch('service/{service}/edit', 'ServiceController@update')->name('updateService');
Route::patch('service/{service}/delete', 'ServiceController@destroy')->name('deleteService');

// Report Routes
Route::get('reports/customers', 'ReportsController@customers')->name('customerReport');
Route::get('reports/sales', 'ReportsController@sales')->name('salesReport');
Route::get('reports/expenses', 'ReportsController@expenses')->name('expenseReport');
