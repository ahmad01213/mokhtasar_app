<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//auth routes
Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');

//orders routes
Route::post('useraddorder', 'API\Orders@store')->middleware('auth:api');
Route::post('getuserpoints', 'API\UserController@getuserpoints')->middleware('auth:api');
Route::post('userorders', 'API\Orders@userorders')->middleware('auth:api');
Route::post('addtofavorites', 'API\Favorites@store')->middleware('auth:api');
Route::post('user/favorites', 'API\Favorites@showUserFavorites')->middleware('auth:api');
Route::post('rates/add','API\Rates@store')->middleware('auth:api');;
Route::post('rates/getproductrates','API\Rates@getRatesForProduct');
Route::post('products','BackEnd\Products@getProductsResponse');
Route::post('contactus','API\Rates@contactus');
Route::post('messages','BackEnd\Messages@store')->name('rates.store')->middleware('auth:api');

Route::post('usernotifications','BackEnd\NotificationsController@usernotifications')->name('usernotifications')->middleware('auth:api');
Route::get('deleteNotificationByUser', 'BackEnd\NotificationsController@deleteNotificationByUser')->middleware('auth:api');


Route::post('mazads/addbid', 'BackEnd\Mazads@addbid')->middleware('auth:api');
Route::get('mazads/{id}/getbidsresponse', 'BackEnd\Mazads@getbidsresponse');






