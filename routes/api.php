<?php

use Illuminate\Http\Request;
use App\User;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::resource('users', 'UserController');
Route::resource('businesses.stores', 'BusinessStoreController');
Route::resource('businesses', 'BusinessController');
Route::resource('stores', 'StoreController');
// Route::resource('product-categories', 'ProductCategoryController');
// Route::resource('offer-types', 'OfferTypeController');
Route::resource('products', 'ProductController');
Route::resource('offers', 'OfferController');
Route::resource('users.purchases', 'PurchaseController');

Route::get('search','StoreController@googling');