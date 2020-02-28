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

Route::get('/', [
'uses'=>'FrontEndController@index',
'as'=>'index'
]);

Route::get('/single-product/{product}', [
    'uses'=>'FrontEndController@singleProduct',
    'as'=>'product.single'
    ]);
Route::get('/cart', [
    'uses'=>'ShoppingController@cart',
    'as'=>'cart'
    ]);
    
Route::post('/cart/add', [
        'uses'=>'ShoppingController@add_to_cart',
        'as'=>'cart.add'
        ]);
        
Route::get('/cart/rapid/add/{id}', [
        'uses'=>'ShoppingController@rapid_add',
        'as'=>'rapid.cart.add'
         ]);     
         
         
Route::get('/cart/incr/{id}/{qty}', [
            'uses'=>'ShoppingController@incr',
            'as'=>'cart.incr'
             ]);        

Route::get('/cart/decr/{id}/{qty}', [
                'uses'=>'ShoppingController@decr',
                'as'=>'cart.decr'
                 ]);  

Route::get('cart/delete/{id}', [
    'uses'=>'ShoppingController@cart_delete',
    'as'=>'cart.delete'
     ]);  

Route::get('/cart/checkout', [
        'uses'=>'CheckoutController@index',
        'as'=>'cart.checkout'
        ]);
Route::post('/cart/checkout', [
     'uses'=>'CheckoutController@payment',
     'as'=>'cart.checkout'
     ]);           

        
            
        


Route::resource('product','ProductController');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


