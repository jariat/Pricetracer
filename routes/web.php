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

Route::get('/', 'HomeController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/products/create', 'ProductController@store');
Route::get('/products/index', 'ProductController@index');
Route::get('/products/{product}/edit', 'ProductController@edit');
Route::post('/products/{product}', 'ProductController@update');
Route::get('/users/index', 'UserController@index');
Route::get('/categories/index', 'CategoryController@index');
Route::post('/categories/create', 'CategoryController@store');
Route::post('/home/add-user', 'HomeController@addUser');
Route::get('/home/edit-user/{user}', 'HomeController@editUser')->name('edit.user');
Route::post('/users/{user}', 'UserController@update');
Route::get('/notifications/star{notification}', 'NotificationController@star')->name('notifications.star');
Route::get('/notifications/un-star{notification}', 'NotificationController@unStar')->name('notifications.unstar');
Route::get('/notifications/trash{notification}', 'NotificationController@trash')->name('notifications.trash');
Route::get('/notifications/un-trash{notification}', 'NotificationController@unTrash')->name('notifications.untrash');
Route::get('/notificatiuons/trashed', 'NotificationController@trashed')->name('notifications.trashed');
Route::get('/notificatiuons/starred', 'NotificationController@starred')->name('notifications.starred');
Route::get('/api/monthly-wholesalers', 'ApiController@monthlyWholesalers')->name('monthly.wholesalers');
Route::get('/api/monthly-retailers', 'ApiController@monthlyRetailers')->name('monthly.retailers');
Route::get('/api/monthly-products', 'ApiController@monthlyProducts')->name('monthly.products');
Route::get('/api/monthly-followers', 'ApiController@monthlyFollowers')->name('monthly.products');
Route::get('/my-followers', 'FollowController@index')->name('my.followers');
Route::resource('categories', 'CategoryController');
Route::resource('users', 'UserController');
Route::resource('products', 'ProductController');
Route::resource('notifications', 'NotificationController');
Route::resource('follows', 'FollowController');


//api Calls
Route::get('api/getWholeSalers','ApiController@getWholeSalers');
Route::get('api/getNewWholeSalers','ApiController@getNewWholeSalers');
Route::post('api/login','ApiController@post_login');
