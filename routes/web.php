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

Route::group(['prefix' => 'back', 'middleware' => 'auth'], function () {
    Route::get('/', 'Admin\DashboardController@index')->name('admin.dashboard');
    Route::get('/category', 'Admin\CategoryController@index')->name('admin.category');
    Route::get('/category/create', 'Admin\CategoryController@create')->name('admin.createCategory');
    Route::get('/category/edit', 'Admin\CategoryController@edit')->name('admin.editCategory');
    Route::get('/permission/create', 'Admin\PermissionsController@create')->name('admin.permission.create');
    Route::post('/permission/store', 'Admin\PermissionsController@store')->name('admin.permission.store');
    Route::get('/permission', 'Admin\PermissionsController@index')->name('admin.permission.index');
    Route::get('/permission/edit/{id}', 'Admin\PermissionsController@edit')->name('admin.permission.edit');
    Route::put('/permission/update/{id}', 'Admin\PermissionsController@update')->name('admin.permission.update');
    Route::delete('/permission/delete/{id}', 'Admin\PermissionsController@destroy')->name('admin.permission.delete');
    Route::get('/role', 'Admin\RoleController@index')->name('admin.role.list');
    Route::get('/role/create', 'Admin\RoleController@create')->name('admin.role.create');
    Route::post('/role/store', 'Admin\RoleController@store')->name('admin.role.store');
});
//->name('admin.edit.role') ->name('admin.create.role')

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
