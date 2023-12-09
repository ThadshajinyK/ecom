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

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/','WelcomeController@index')->name('/');

//Auth::routes();

//For User............................. 
Route::get('/login','Auth\User\LoginController@ShowLoginForm')->name('login');
Route::post('/login','Auth\User\LoginController@Login')->name('login');
Route::get('/register','Auth\User\RegisterController@ShowRegisterForm')->name('register');
Route::post('/register','Auth\User\RegisterController@Register')->name('register');
Route::post('/logout','Auth\User\LoginController@logout')->name('logout');

//For Admin
Route::get('/login/admin','Auth\Admin\LoginController@ShowLoginForm')->name('login.admin');
Route::post('/login/admin','Auth\Admin\LoginController@Login')->name('login.admin');
//Route::get('/register/admin','Auth\Admin\RegisterController@ShowRegisterForm')->name('register.admin');
//Route::post('/register/admin','Auth\Admin\RegisterController@Register')->name('register.admin');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminController@index')->name('admin');

//Backend..................................................................
//For Product
Route::resource('product','Backend\ProductController');
//For Categary
Route::resource('categary','Backend\CategaryController');
//For Order
Route::resource('order','Backend\OrderController');
//For Shipping
Route::resource('shipping','Backend\ShippingController');
//for Customer
Route::resource('customer','Backend\CustomerController');

//For Frontend..................................................................
//for Product
Route::get('item/view/{id}','Frontend\ProductController@index')->name('item.view');
//shipping
Route::get('shippingproduct','Frontend\ShippingController@create')->name('shippingproduct.create');
Route::post('shippingproduct.store','Frontend\ShippingController@store')->name('shippingproduct.store');
Route::get('shippingproduct.update/{id}','Frontend\ShippingController@update')->name('shippingproduct.update');
//For Order
Route::post('order.confirm','Frontend\ShippingController@orderconform')->name('order.confirm');