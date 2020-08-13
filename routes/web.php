<?php

use Illuminate\Support\Facades\Route;

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
// Route::get('/', 'HomeController@admin');

Auth::routes();
Route::get('admin/main/home', 'HomeController@home')->name('main');
Route::get('seller/sellermain/home', 'HomeController@sellermain')->name('sellermain');
Route::post('/loginadmin', 'Auth\LoginController@loginadmin')->name('loginadmin');
Route::get('/logoutadmin', 'Auth\LoginController@getLogout')->name('logoutadmin');
Route::middleware(['admin'])->prefix('admin')->namespace('BackEnd')->group(function () {

    Route::resource('users', 'Users');
    Route::resource('parteners', 'Parteners');
    Route::resource('products', 'Products')->except('show');
    Route::resource('mazads', 'Mazads')->except('show');

    Route::post("mazads/destroybid/{bid}", "Mazads@destroybid")->name('mazads.destroybid');
    Route::get("mazads/{id}", "Mazads@getMazadBids")->name('mazads.bids');


//    Route::get("products/addmoresize", "Products@addMoreSize");
//    Route::post("products/addmoresize", "Products@addMorePostSize");
//
//    Route::get("products/addmorecut", "Products@addMoreCut");
//    Route::post("products/addmorecut", "Products@addMorePostCut");

    Route::resource('offers', 'Offers')->except('show');
    Route::get('messages', 'Messages@index')->name('messages.index');
    Route::delete('messages/{message}/delete', 'Messages@destroy')->name('messages.destroy');
    Route::get('contacts', 'Contacts@index')->name('contacts.index');
    Route::delete('contacts/{contact}/delete', 'Contacts@destroy')->name('contacts.destroy');

    Route::post('notifyuser', 'Users@notifusers')->name('notif');
    Route::post('notifyallusers', 'Users@notifyallusers')->name('notifyall');
    Route::get('notifications/create', 'Users@createNotification')->name('notifications.create');
    Route::get('settings/edit', 'Configrationss@editSettings')->name('settings.edite');
    Route::post('settings/update', 'Configrationss@updateSettings')->name('settings.update');

    Route::get('settings/edit', 'Configrationss@editSettings')->name('settings.edite');
    Route::post('settings/update', 'Configrationss@updateSettings')->name('settings.update');

    Route::resource('sliders', 'Configrationss');
    Route::resource('notifications', 'NotificationsController')->except('show');
});

//seller routes
Route::middleware(['seller'])->prefix('seller')->namespace('BackEnd')->group(function () {
    Route::resource('sellerproducts', 'SellerProducts')->except('show');
    Route::get('/sellerorders', 'SellerOrders@index')->name('sellerorders.index');
    Route::get('sellerorders/orderdetails/{order}', 'SellerOrders@orderdetails')->name('sellerorders.edit');
    Route::get('sellersettings/edit', 'SellerSettings@editSettings')->name('sellersettings.edite');
    Route::post('sellersettings/update', 'SellerSettings@updateSettings')->name('sellersettings.update');
});



Route::get('admin/orders', 'API\Orders@index')->name('orders.index');
Route::get('admin/orders/orderdetails/{order}', 'API\Orders@orderdetails')->name('orders.edit');
Route::resource('admin/favorites', 'API\Favorites');
Route::delete('admin/rates/{rate}', 'API\Rates@destroy')->name('rates.destroy');
Route::get('admin/rates', 'API\Rates@index')->name('rates.index');











