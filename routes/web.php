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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => 'auth'], function() {
    Route::get('/' , [
        'uses' => 'FrontEndController@index',
        'as' => 'index'
    ]);
    Route::get('/product/{id}' , [
        'uses' => 'FrontEndController@singale',
        'as' => 'singale'
    ]);
    
    
    Route::post('/cart/add', [
        'uses' => 'ShoppingConroller@add_to_cart',
        'as' => 'cart.add'
    ]);
    
    Route::get('/cart', [
        'uses' => 'ShoppingConroller@cart',
        'as' => 'cart'
    ]);
    
    Route::get('cart/delete/{id}', [
        'uses' => 'ShoppingConroller@delete_cart',
        'as' => 'cart.delete'
    ]);
    
    Route::get('/cart/ncr/{id}/{qty}', [
        'uses' => 'ShoppingConroller@ncr',
        'as' => 'cart.ncr'
    ]);
    Route::get('/cart/dcr/{id}/{qty}', [
        'uses' => 'ShoppingConroller@dcr',
        'as' => 'cart.dcr'
    ]);
    
    
    Route::get('/cart/rap/add/{id}', [
        'uses' => 'ShoppingConroller@rap_add',
        'as' => 'rap.add'
    ]);
    
    Route::get('/cart/checkout', [
        'uses' => 'CheckoutController@index',
        'as' => 'cart.checkout'
    ]);
    Route::post('/cart/checkout', [
        'uses' => 'CheckoutController@pay',
        'as' => 'cart.checkout'
    ]);
    
    Route::resource('products', 'ProductController');
});



