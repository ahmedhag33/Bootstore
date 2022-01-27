<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| admin Routes 
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

        Route::view('adminpanel/', 'adminpanel/main');

        Route::group(['prefix' => 'adminpanel'], function () {

            /*-------------------------
                 * Start Product management 
                 *--------------------------
                 */
            Route::group(['prefix' => 'product', 'namespace' => 'Product'], function () {
                /*-------------------------
                 * Start Product Category management 
                 *--------------------------
                 */
                Route::group(['prefix' => 'product_catgory'], function () {

                    Route::get('/', 'ProductCatgoryController@get')->name('adminpanel.product.product_catgory.show');

                    Route::get('add', 'ProductCatgoryController@add')->name('adminpanel.product.product_catgory.add');

                    Route::post('create', 'ProductCatgoryController@create')->name('adminpanel.product.product_catgory.create');

                    Route::get('edit/{id}', 'ProductCatgoryController@getbyid');

                    Route::post('update/{id}', 'ProductCatgoryController@update')->name('adminpanel.product.product_catgory.update');

                    Route::get('delete/{id}', 'ProductCatgoryController@delete');
                });
                /*-------------------------
                 * End Product Category management 
                 *--------------------------
                 */
            });
            /*-------------------------
                 * End Product management 
                 *--------------------------
                 */
        });
    }
);
