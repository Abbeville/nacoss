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

Route::get('/test', function (){
	return view('welcome');
});

Route::get('/', 'Auth\LoginController@showLoginForm');

Route::post('/pay', 'Lib\RaveController@initialize')->name('pay');
Route::post('/rave/callback', 'Lib\RaveController@callback')->name('callback');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'Dashboard\HomeController@index')->middleware(['check.manual'])->name('dashboard.home');
Route::get('/profile', 'Profile\HomeController@index')->middleware(['check.payment'])->name('dashboard.profile');
Route::post('/profile', 'Profile\HomeController@update')->middleware(['check.manual']);
Route::get('/transactions', 'TransactionController@index')->name('dashboard.transactions');
Route::prefix('/')->group(function(){
	Route::get('payment-page', 'PaymentController@index')->name('payment.home');
});
Route::prefix('/members')->group(function(){
	Route::get('/all', 'Admin\UserController@index')->name('member.all');
	Route::get('/paid', 'Admin\UserController@paid')->name('member.paid');
	Route::get('/verified-profile', 'Admin\UserController@verified')->name('member.verified');
	Route::get('/verify/{user}', 'Admin\UserController@markAsPrinted')->name('verify.member');
	Route::get('/download/{user}', 'ImageController@download')->name('download.image');
});

Route::get('/verify', 'Admin\UserController@verification')->name('student.verify');
Route::post('/verify', 'Admin\UserController@verify')->name('student.verify');