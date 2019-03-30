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
Route::get('/muathem/{id}','HomeController@mua');
Route::get('/minus/{id}','HomeController@minus');
Route::post('/cart','HomeController@cart');
Route::get('/order','BillController@index');

Route::get('/bill','BillController@getData');
Route::get('/bill/{id}','BillController@show');
Route::delete('/bill/{id}','BillController@destroy');
Route::put('/bill/{id}','BillController@edit');

Route::get('/reports','ReportController@index');
Route::get('/reports/statistical','ReportController@getData');
Route::get('/reports/month','ReportController@month');
Route::get('/reports/users','ReportController@ship');
Route::get('/reports/users/search','ReportController@search');
Route::post('/live_search', 'HomeController@action');
Route::get('reports/customer','ReportController@getCustomer');

Route::get('/export','ReportController@excel');
Route::get('/export/customer','ReportController@excelCustomer');


