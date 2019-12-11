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

Route::get('/', 'HomePageController@index')->name('users.home');
Route::get('/listing', 'ListingPageController@index')->name('users.listing');
Route::get('/details', 'DetailsPageController@index')->name('users.details');

Route::group(['prefix' => 'back'], function () {
    Route::get('/', 'Admin\DashboardController@index')->name('admin.dashboard');
    Route::get('/category', 'Admin\CategoryController@index')->name('admin.category');
    Route::get('/category/create', 'Admin\CategoryController@create')->name('admin.createCategory');
    Route::get('/category/edit', 'Admin\CategoryController@edit')->name('admin.editCategory');
});
