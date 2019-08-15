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

use Gloudemans\Shoppingcart\Facades\Cart;

// Default auth routes
Auth::routes();


Route::get('/plans', 'PlanController@index')->name('plans.index');
Route::get('/', 'ShopController@index')->name('shop.index');

// Shop Routes
Route::prefix('shop')->group(function () {
    Route::get('{product}', 'ShopController@show')->name('shop.show');
});


// Auth required routes
Route::group(['middleware' => 'auth'], function(){
    Route::get('/plan/{plan}', 'PlanController@show')->name('plans.show');
    Route::post('/payment', 'PlanController@pay')->name('plans.pay');
    Route::get('/cart', 'CartController@index')->name('cart.index');
    Route::post('/cart', 'CartController@store')->name('cart.store');
    Route::get('empty', function (){
       Cart::destroy();
    });
    Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');
    Route::get('/account', 'AccountController@index')->name('account.index');
});
