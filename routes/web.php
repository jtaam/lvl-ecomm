<?php

Route::get('/', 'FrontController@index')->name('home');
Route::get('/shirts', 'FrontController@shirts')->name('shirts');
Route::get('/shirt', 'FrontController@shirt')->name('shirt');

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    // dashboard
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.index');
    // product
    Route::resource('product', 'ProductsController');
    // category
    Route::resource('category', 'CategoriesController');
});
