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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
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
	Route::post('/login', 'Admin\Auth\LoginController@login')->name('admin.login');
	Route::post('/logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');
	Route::get('/dashboard', 'Admin\DashboardController@index')->name('admin.dashboard');

	// Password Reset Routes...
    Route::get('password/reset', 'Admin\Auth\ForgotPasswordController@showLinkRequestForm')
    ->name('admin.password.request');    
    Route::post('password/email', 'Admin\Auth\ForgotPasswordController@sendResetLinkEmail')
    ->name('admin.password.email');
    Route::get('password/reset/{token}', 'Admin\Auth\ResetPasswordController@showResetForm')
    ->name('admin.password.reset');
    Route::post('password/reset', 'Admin\Auth\ResetPasswordController@reset')
    ->name('admin.password.update');

    // Password Change Routes...
    Route::get('password/change', 'Admin\Auth\ChangePasswordController@index')
    ->name('admin.change.password');
    Route::post('password/change', 'Admin\Auth\ChangePasswordController@store')
    ->name('admin.password.change');

    // Student Routes
    Route::resource('student', 'Admin\StudentController');
});
