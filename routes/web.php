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

// Sales Routes
Route::get('sales', 'SalesController@index')->name('salesList');
Route::get('sales/new', 'SalesController@create')->name('newSales');

// Expenses Routes
Route::get('expenses', 'ExpensesController@index')->name('expenseList');
Route::get('expenses/new', 'ExpensesController@create')->name('newExpense');

// Services Routes
Route::get('services', 'ServicesController@index')->name('serviceList');
Route::get('services/new', 'ServicesController@create')->name('newService');

// Report Routes
Route::get('reports/customers', 'ReportsController@customers')->name('customerReport');
Route::get('reports/sales', 'ReportsController@sales')->name('salesReport');
Route::get('reports/expenses', 'ReportsController@expenses')->name('expenseReport');
