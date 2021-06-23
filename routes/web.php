<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

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
    return view('layout.trangchu');
})->middleware('login');
// tài sản
Route::resource('/taisan','TaisanController');
Route::post('/taisan/search','TaisanController@search_ts');

// Mẫu báo cáo
Route::get('/maubaocao','MaubaocaoController@index');
Route::get('/word_export/{id}','MaubaocaoController@word_export');
Route::get('/maubaocao/{id}/view','MaubaocaoController@file_view');
Route::post('/maubaocao/store','MaubaocaoController@store');
Route::post('/maubaocao/search','MaubaocaoController@search');

// phòng ban
Route::resource('/phongban','PhongbanController');

// nhân viên
Route::resource('/nhanvien','NhanvienController');

// chitiettaisan
Route::resource('/chitiettaisan','ChitiettaisanController');

//Nhà cung cấp
Route::resource('/nhacungcap','NhacungcapController');

// Loại tài sản
Route::resource('/loaits','LoaitaisanController');

//  user
Route::resource('/user','UserController');
Route::get('/login','UserController@login')->name('login');
Route::post('/login','UserController@postlogin');
Route::get('/logout','UserController@logout_user');
Route::post('/check','UserController@checklogin');
