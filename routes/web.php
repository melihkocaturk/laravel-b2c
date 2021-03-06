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

Route::get('/', 'HomeController@index')->name('home');

// Products
Route::get('/products', 'ProductController@index')->name('product.index');
Route::get('/product/{slug}', 'ProductController@show')->name('product.show');
Route::get('/search', 'ProductController@search')->name('product.search');

Route::middleware('product.quantity')->group(function () {
    // Cart
    Route::get('/cart', 'CartController@index')->name('cart.index');
    Route::post('/cart', 'CartController@store')->name('cart.store');
    Route::delete('/cart/{id}', 'CartController@destroy')->name('cart.destroy');
    Route::put('/cart/{id}', 'CartController@update')->name('cart.update');

    // Checkout
    Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');
    Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');
});

// Coupon
Route::post('/coupon', 'CouponController@store')->name('coupon.store');
Route::delete('/coupon', 'CouponController@destroy')->name('coupon.destroy');

// Pages
Route::view('/about', 'pages.about')->name('pages.about');
Route::view('/contact', 'pages.contact')->name('pages.contact');

// Comments
Route::post('/comment', 'CommentController@store')->name('comment.store');

// Voyager
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

// Authentication
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');
