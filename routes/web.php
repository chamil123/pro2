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

//Route::get('/', function () {
//    return view('Web.product_body');
//});

Route::get('/', 'webController@index');
Route::get('/admin', function() {
    return view('Admin.layout');
});
Route::get('/dashboard', function() {
    return view('Admin.dashboard');
});
//Route::get('test','testcontroller');

Route::group(['middleware' => 'auth'], function () {

    // All my routes that needs a logged in user


    Route::resource('member', 'MemberController');
    Route::post('viewMembers', 'MemberController@viewMembers');
    Route::resource('login', 'testcontroller');
    Route::resource('partner', 'MemberController');
    Route::resource('product', 'ProductController');
    Route::post('product/{id}', 'ProductController@update');
    Route::post('member/{id}', 'MemberController@update');

    Route::get('cart', 'cartController@index');
    Route::get('cart/add/{id}', 'cartController@addItem');
    Route::get('cart/remove/{id}', 'cartController@removeItem');
    Route::get('cart/update', 'cartController@update');
});

//Route::get('/add-t--cart/{id}',[
//    'uses'=>'ProductController@getAddToCart',
//    'as'=>'product.addToCart'
//]);
//
//Route::get('/shopping-cart',[
//    'uses'=>'ProductController@getCart',
//    'as'=>'product.shoppingCart'
//]);

Route::get('/product-details/{id}', 'ProductController@productDetails');





Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test', function (){
    return App\User::with('orders')->get();
});


Auth::routes();


