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
            Route::group(['prefix' => 'book', 'namespace' => 'Product'], function () {
                /**s*/
                Route::group(['prefix' => 'catgory'], function () {

                    Route::get('/', 'CategoryController@get')->name('adminpanel.book.catgory.show');

                    Route::get('add', 'CategoryController@add')->name('adminpanel.book.catgory.add');

                    Route::post('create', 'CategoryController@create')->name('adminpanel.book.catgory.create');

                    Route::get('edit/{id}', 'CategoryController@getbyid');

                    Route::post('update/{id}', 'CategoryController@update')->name('adminpanel.book.catgory.update');

                    Route::get('delete/{id}', 'CategoryController@delete');
                });
                /**e*/
                ####
                /**s*/
                Route::resource('publisher', 'PublisherController')->only([
                    'index', 'create', 'store', 'edit', 'update', 'destroy'
                ]);
                /**e*/
                ####
                /**s*/
                Route::resource('author', 'AuthorController')->only([
                    'index', 'create', 'store', 'edit', 'update', 'destroy'
                ]);
                /**e*/
            });
            /*-------------------------
                 * End Product management 
                 *--------------------------
                 */
        });
    }
);
