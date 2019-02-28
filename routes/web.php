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

// Route::get('/', function () {
//     return view('food.index');
// });
Route::resource('/','HomeController');
Route::delete('/{id}','HomeController@destroy');
Route::get('/menu/{id}','HomeController@menu');
Route::get('/plus/{id}','HomeController@pay');
Route::get('/minus/{id}','HomeController@minus');
Route::post('/cart','HomeController@cart');
Route::get('/order','BillController@index');
Route::get('/bill','BillController@getData');
Route::get('/bill/{id}','BillController@show');


