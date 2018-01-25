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

Route::get('/','AdminController@index');
Route::get('administrator/add', 'AdminController@showAdd');
Route::post('administrator/add', 'AdminController@postAdd');
Route::get('/administrator','AdminController@index');
Route::get('administrator/edit/{id}', 'AdminController@showEdit');
Route::post('administrator/edit', 'AdminController@postEdit');
Route::post('changestatus','AdminController@actionUpdate');
Route::get('cms/add', 'CMSController@showAdd');
Route::post('cms/add', 'CMSController@postAdd');
Route::get('/cms','CMSController@index');
Route::get('cms/edit/{id}', 'CMSController@showEdit');
Route::post('cms/edit', 'CMSController@postEdit');
Route::post('cms/actionUpdate','CMSController@actionUpdate');

