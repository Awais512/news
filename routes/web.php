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

    //Permissions Backend Routes
    Route::get('/permission/create', ['uses' => 'Admin\PermissionsController@create', 'as' => 'admin.permission.create', 'middleware' => 'permission:Permission List|All']);
    Route::post('/permission/store', ['uses' => 'Admin\PermissionsController@store', 'as' => 'admin.permission.store', 'middleware' => 'permission:Permission List|All']);
    Route::get('/permission', ['uses' => 'Admin\PermissionsController@index', 'as' => 'admin.permission.index', 'middleware' => 'permission:Permission List|All']);
    Route::get('/permission/edit/{id}', ['uses' => 'Admin\PermissionsController@edit', 'as' => 'admin.permission.edit', 'middleware' => 'permission:Permission List|All']);
    Route::put('/permission/update/{id}', ['uses' => 'Admin\PermissionsController@update', 'as' => 'admin.permission.update', 'middleware' => 'permission:Permission List|All']);
    Route::delete('/permission/delete/{id}', ['uses' => 'Admin\PermissionsController@destroy', 'as' => 'admin.permission.delete', 'middleware' => 'permission:Permission List|All']);

    //Roles Backend Routes
    Route::get('/role', 'Admin\RoleController@index')->name('admin.role.list');
    Route::get('/role/create', 'Admin\RoleController@create')->name('admin.role.create');
    Route::post('/role/store', 'Admin\RoleController@store')->name('admin.role.store');
    Route::get('/role/edit/{id}', 'Admin\RoleController@edit')->name('admin.role.edit');
    Route::put('/role/update/{id}', 'Admin\RoleController@update')->name('admin.role.update');
    Route::delete('/role/delete/{id}', 'Admin\RoleController@destroy')->name('admin.role.delete');

    //Authors Backend Routes
    Route::get('/author', 'Admin\AuthorController@index')->name('author.index');
    Route::get('/author/create', 'Admin\AuthorController@create')->name('author.create');
    Route::post('/author/store', 'Admin\AuthorController@store')->name('author.store');
    Route::get('/author/edit/{id}', 'Admin\AuthorController@edit')->name('author.edit');
    Route::put('/author/update/{id}', 'Admin\AuthorController@update')->name('author.update');
    Route::delete('/author/destroy/{id}', 'Admin\AuthorController@destroy')->name('author.delete');

    //Categories backend Routes
    Route::get('/category', ['uses' => 'Admin\CategoryController@index', 'as' => 'admin.category.list', 'middleware' => 'permission:Category List|All']);
    Route::get('/category/create', ['uses' => 'Admin\CategoryController@create', 'as' => 'admin.category.create', 'middleware' => 'permission:Category Create|All']);
    Route::post('/category/store', ['uses' => 'Admin\CategoryController@store', 'as' => 'admin.category.store', 'middleware' => 'permission:Category Store|All']);
    Route::get('/category/edit/{id}', ['uses' => 'Admin\CategoryController@edit', 'as' => 'admin.category.edit', 'middleware' => 'permission:Category Edit|All']);
    Route::put('/category/update/{id}', ['uses' => 'Admin\CategoryController@update', 'as' => 'admin.category.update', 'middleware' => 'permission:Category Update|All']);
    Route::delete('/category/destroy/{id}', ['uses' => 'Admin\CategoryController@destroy', 'as' => 'admin.category.destroy', 'middleware' => 'permission:Category Delete|All']);
    Route::put('/category/status/{id}', ['uses' => 'Admin\CategoryController@status', 'as' => 'admin.category.status', 'middleware' => 'permission:Category Store|All']);
});
//->name('admin.edit.role') ->name('admin.create.role')

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
