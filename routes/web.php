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

Route::get('/','webController@index');
Route::get('/admin',function(){
    return view('Admin.layout');
});
Route::get('/dashboard',function(){
    return view('Admin.dashboard');
});
//Route::get('test','testcontroller');
Route::resource('member','MemberController');
Route::post('viewMembers','MemberController@viewMembers');
Route::resource('login','testcontroller');
Route::resource('partner','MemberController');
Route::resource('product','ProductController');
Route::post('product/{id}','ProductController@update');



