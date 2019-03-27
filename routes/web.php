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

Route::get('/', function () {
    return view('index');
});

Auth::routes();


Route::get('/matakuliah', 'AdminController@tambah_matakuliah');
Route::post('/matakuliah/save', 'AdminController@save_matakuliah');
Route::get('/matakuliah/delete/{id}', 'AdminController@delete_matakuliah');
Route::get('/matakuliah/edit/{id}', 'AdminController@edit_matakuliah');
Route::post('/matakuliah/update/', 'AdminController@update_matakuliah');

Route::get('/', 'UserController@index');
Route::get('/user/delete/{id}', 'UserController@delete_user');

Route::get('upload', 'UserController@upload');
Route::post('upload/save', 'UserController@upload_save');

Route::group(['middleware' => 'admin'], function(){
	Route::get('/home', 'HomeController@index')->name('home');
});

Route::get('/data/{id}', 'UserController@data');
Route::get('/download/{id}', 'UserController@download');
Route::get('/upload/delete/{id}', 'UserController@upload_delete');