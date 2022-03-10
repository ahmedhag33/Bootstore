<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| site Routes 
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(
    ['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],
    function () {
        Route::get('/', 'WelcomeController@index')->name('welcome');

        Route::post('add-cart', 'WelcomeController@AddCart')->name('add.cart');

        Auth::routes();

        Route::get('/home', 'HomeController@index')->name('home');

        Route::group(['prefix' => 'cart', 'namespace' => 'Cart'], function () {

            Route::get('/', 'CartController@cart')->name('cart.index');

            Route::patch('update-cart', 'CartController@update')->name('update.cart');

            Route::delete('remove-from-cart', 'CartController@remove')->name('remove.from.cart');
        });
    }
);
