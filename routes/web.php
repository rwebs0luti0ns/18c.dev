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



Route::middleware('admin')->group(function() {

	Route::get('admin/dashboard', function () {
		$active = 'dashboard';
		return view('modules.admin.dashboard',compact('active'));
	});

});


Route::middleware('franchisee')->group(function() {

	Route::get('franchisee/dashboard', function () {
		$active = 'dashboard';
		return view('modules.franchisee.dashboard',compact('active'));
	});

});







