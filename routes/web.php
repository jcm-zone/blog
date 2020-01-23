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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "Admin" middleware group. Now create something great!
|
*/
Route::group(['prefix' => 'admin'], function () {

	Route::get('/', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
	Route::get('/login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
	Route::POST('/login', 'Admin\Auth\LoginController@login')->name('admin.login');
	Route::get('/logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');
	Route::get('/dashboard', 'HomeController@index')->name('admin.dashboard');
	
});
