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
	return 'Hello World!';
});

Route::get('admin/login', 'Auth\AdminController@showLoginForm');
Route::post('admin/login','Auth\AdminController@login');
Route::post('admin/logout','Auth\AdminController@logout');


Route::get('franchisee/login', 'Auth\FranchiseeController@showLoginForm');
Route::post('franchisee/login', 'Auth\FranchiseeController@login');
Route::post('franchisee/logout','Auth\FranchiseeController@logout');



Route::middleware('admin')->namespace('Admin')->prefix('admin')->group(function() {

	Route::get('dashboard', function () {
		$active = 'dashboard';
		return view('modules.admin.dashboard',compact('active'));
	});
	
	Route::get('franchisees/{id}/create','admin.franchisees.FranchiseeController@createuser');
	Route::resource('brands','Brands\BrandController')->except('destroy');
	Route::resource('categories','Categories\CategoryController')->except('destroy');
	Route::resource('products','Products\ProductController')->except('destroy');
	Route::resource('unit-capacities','UnitCapacities\UnitCapacityController')->except('destroy');
	Route::resource('items','Items\ItemController')->except('destroy');
	Route::resource('franchisees','Franchisees\FranchiseeController')->except('destroy');
	Route::get('franchisees/{id}/create','Users\UserController@create');
	Route::post('franchisees/{id}/store','Users\UserController@store');
	Route::get('franchisees/{id}/editUser','Users\UserController@edit');
	Route::post('franchisees/{id}/userUpdate','Users\UserController@update');
	Route::post('franchisees/userChangePassword','Users\UserController@changePassword');

});
Route::middleware('franchisee')->namespace('Franchisee')->prefix('franchisee')->group(function() {

	Route::get('dashboard', function () {
		$active = 'dashboard';
		return view('modules.franchisee.dashboard',compact('active'));
	});
	Route::resource('/customers','Customers\CustomerController');
	Route::get('/purchases','PurchaseOrders\PurchaseOrderController@index');
	Route::resource('/quotations','Quotations\QuotationController');
});







