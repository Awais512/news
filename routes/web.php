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
    Route::get('/permission/create', ['uses' => 'Admin\PermissionsController@create', 'as' => 'admin.permission.create', 'middleware' => 'permission:Permission List|All']);
    Route::post('/permission/store', ['uses' => 'Admin\PermissionsController@store', 'as' => 'admin.permission.store', 'middleware' => 'permission:Permission List|All']);
    Route::get('/permission', ['uses' => 'Admin\PermissionsController@index', 'as' => 'admin.permission.index', 'middleware' => 'permission:Permission List|All']);
    Route::get('/permission/edit/{id}', ['uses' => 'Admin\PermissionsController@edit', 'as' => 'admin.permission.edit', 'middleware' => 'permission:Permission List|All']);
    Route::put('/permission/update/{id}', ['uses' => 'Admin\PermissionsController@update', 'as' => 'admin.permission.update', 'middleware' => 'permission:Permission List|All']);
    Route::delete('/permission/delete/{id}', ['uses' => 'Admin\PermissionsController@destroy', 'as' => 'admin.permission.delete', 'middleware' => 'permission:Permission List|All']);
    Route::get('/role', 'Admin\RoleController@index')->name('admin.role.list');
    Route::get('/role/create', 'Admin\RoleController@create')->name('admin.role.create');
    Route::post('/role/store', 'Admin\RoleController@store')->name('admin.role.store');
    Route::get('/role/edit/{id}', 'Admin\RoleController@edit')->name('admin.role.edit');
    Route::put('/role/update/{id}', 'Admin\RoleController@update')->name('admin.role.update');
    Route::delete('/role/delete/{id}', 'Admin\RoleController@destroy')->name('admin.role.delete');
    Route::get('/author', 'Admin\AuthorController@index')->name('author.index');
    Route::get('/author/create', 'Admin\AuthorController@create')->name('author.create');
    Route::post('/author/store', 'Admin\AuthorController@store')->name('author.store');
    Route::get('/author/edit/{id}', 'Admin\AuthorController@edit')->name('author.edit');
    Route::put('/author/update/{id}', 'Admin\AuthorController@update')->name('author.update');
    Route::delete('/author/destroy/{id}', 'Admin\AuthorController@destroy')->name('author.delete');
});
//->name('admin.edit.role') ->name('admin.create.role')

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
