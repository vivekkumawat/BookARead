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


Route::get('/', 'ShopController@index')->name('shop.index');
Route::get('/search','ShopController@search')->name('shop.search');
Route::get('/debug-sentry', function () {
    throw new Exception('My first Sentry error!');
});

// Shop Routes
Route::prefix('shop')->group(function () {
    Route::get('/checkout', 'CheckoutController@index')->name('cart.checkout');
    Route::post('/checkout', 'CheckoutController@store')->name('cart.checkout.store');
    Route::get('/order-confirmation', 'OrderConfirmationController@index')->name('cart.checkout.confirm');
    Route::get('/cart', 'CartController@index')->name('cart.index');
    Route::post('/cart', 'CartController@store')->name('cart.store');
    Route::get('/plans', 'PlanController@index')->name('plans.index');
    Route::get('category/', 'CategoryController@index')->name('categories.index');
    Route::get('/{product}', 'ShopController@product')->name('shop.product');
});


// Auth required routes
Route::group(['middleware' => 'auth'], function(){
    Route::get('/plan/{plan}', 'PlanController@show')->name('plans.show');
    Route::post('/payment', 'PlanController@pay')->name('plans.pay');
    Route::get('empty', function (){
       Cart::destroy();
    });
    Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');
    Route::post('/coupon', 'CouponController@store')->name('coupon.store');
    Route::delete('/coupon', 'CouponController@destroy')->name('coupon.destroy');

    Route::prefix('account')->group(function () {
        Route::get('/', 'AccountController@index')->name('account.index');
        Route::get('/orders', 'AccountController@orders')->name('account.orders');
        Route::get('/settings', 'AccountController@settings')->name('account.settings');
        Route::get('/addresses', 'AccountController@addresses')->name('account.addresses');
        Route::get('/subscription', 'AccountController@subscription')->name('account.subscription');
    });
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
