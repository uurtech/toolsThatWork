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

Route::get('/', 'HomeController@index');
Route::get('/tool/raffle','ToolsController@raffle');
Route::get('/tool/passwordGenerator','ToolsController@password');
Route::get('/About','HomeController@About');
Route::get('/Service','HomeController@Service');
Route::get('/Request','HomeController@Request');
Route::get('/tool/encode/','ToolsController@encode');
Route::get('/tool/encode/{type}','ToolsController@encodeType');

Route::post('/tool/raffle','ToolsController@raffle');
Route::post('/tool/passwordGenerator','ToolsController@password');
Route::post('/tool/encode/{type?}/{request?}', 'ToolsController@encodeType');