<?php

Route::get('/', 'FrontController@index')->name('home');
Route::get('/shirts', 'FrontController@shirts')->name('shirts');
Route::get('/shirt', 'FrontController@shirt')->name('shirt');

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index');

// cart
Route::resource('/cart','CartController');

Route::group(['prefix' => 'admin', 'middleware' => ['auth','admin']], function () {
    // dashboard
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.index');
    // product
    Route::resource('product', 'ProductsController');
    // category
    Route::resource('category', 'CategoriesController');
});

Route::get('checkout','CheckoutController@step1')->name('checkoutStep1');
Route::get('shipping-info','CheckoutController@shipping')->name('checkout.shipping');
