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

        Route::get('adminpanel/login', 'AdminController@getlogin')->name('adminpanel.login');

        Route::post('adminpanel/login', 'AdminController@postlogin')->name('adminloginpost');

        Route::get('admin/logout', 'AdminController@logout')->name('adminLogout');

        Route::group(['prefix' => 'adminpanel', 'middleware' => 'adminauth'], function () {

            Route::get('/', 'DashboardController@index')->name('adminpanel.main');
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
                ####
                /**s*/
                Route::group(['prefix' => 'books'], function () {
                    Route::get('/', 'BookController@index')->name('adminpanel.book.books.index');

                    Route::get('create/{type}', 'BookController@create')->name('adminpanel.book.books.create');

                    Route::post('store', 'BookController@store')->name('adminpanel.book.books.store');

                    Route::get('edit/{id}', 'BookController@edit');

                    Route::post('update/{id}', 'BookController@update')->name('adminpanel.book.books.update');

                    Route::delete('/{id}', 'BookController@destroy')->name('adminpanel.book.books.destroy');
                });
                /**d*/
            });
            /*-------------------------
                 * End Product management 
                 *--------------------------
                 */
        });
    }
);
