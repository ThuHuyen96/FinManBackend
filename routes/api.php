<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//Table

Route::get('table',            'TableController@index');
Route::put('table/{id}',       'TableController@update');
Route::post('table',           'TableController@store');
Route::get('table/{id}',       'TableController@show');

//Drinks

Route::get('drinks',                'DrinksController@index');
Route::put('drinks/{id}',           'DrinksController@update');
Route::put('drinks/status/{id}',    'DrinksController@updateStatus');
Route::post('drinks',               'DrinksController@store');
Route::get('drinks/{id}',           'DrinksController@show');
Route::put('drinks/image/{id}',     'DrinksController@updateImage');
Route::get('drinks/image/{id}',     'DrinksController@getImage');

//Area

Route::get('area',            'AreasController@index');
Route::put('area/{id}',       'AreasController@update');
Route::post('area',           'AreasController@store');
Route::get('area/{id}',       'AreasController@show');

//Bill

Route::get('bill',            'BillController@index');
Route::put('bill/{id}',       'BillController@update');
Route::post('bill',           'BillController@store');
Route::get('bill/{id}',       'BillController@show');

//DetailBill

Route::get('detailbill',                  'DetailbillController@index');
Route::put('detailbill/{id}',             'DetailbillController@update');
Route::post('detailbill',                 'DetailbillController@store');
Route::get('detailbill/{id}',             'DetailbillController@show');
Route::get('detailbill/get/{id}',       'DetailbillController@getBill');
