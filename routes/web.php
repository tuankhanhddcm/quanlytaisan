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
Route::post('/taisan/in_the','TaisanController@in_theTSCD');
Route::get('/taisan/in_the/{id}','TaisanController@in_theTSCD_id')->name('inthe_id');
Route::post('/taisan/update/{id}','TaisanController@update')->name('taisan.update');
Route::post('/taisan/modal_chitiet/{id}','TaisanController@modal_chitiet');
Route::post('taisan/excel', 'TaisanController@export');
Route::post('taisan/delete', 'TaisanController@destroy');
Route::post('taisan/update_delete', 'TaisanController@update_delete');

// Mẫu báo cáo
Route::get('/maubaocao','MaubaocaoController@index');
Route::get('/word_export/{id}','MaubaocaoController@word_export');
Route::get('/maubaocao/{id}/view','MaubaocaoController@file_view');
Route::post('/maubaocao/store','MaubaocaoController@store');
Route::post('/maubaocao/search','MaubaocaoController@search');

// phòng ban
Route::resource('/phongban','PhongbanController');
Route::post('/phongban/{id}/edit','PhongbanController@edit');
Route::post('/phongban/update/{id}','PhongbanController@update');
Route::post('/phongban/search','PhongbanController@search_phong');

// nhân viên
Route::resource('/nhanvien','NhanvienController');
Route::post('/nhanvien/{id}/edit','NhanvienController@edit');
Route::post('/nhanvien/update/{id}','NhanvienController@update');
Route::post('/nhanvien/search','NhanvienController@search');

// chitiettaisan
Route::resource('/chitiettaisan','ChitiettaisanController');
Route::post('/chitiettaisan/search','ChitiettaisanController@search_chitiet');
Route::post('/chitiettaisan/edit/{id}','ChitiettaisanController@edit')->name('chitiettaisan.edit');
Route::post('/chitiettaisan/update/{id}','ChitiettaisanController@update')->name('chitiettaisan.update');
Route::post('/chitiettaisan/loc_nv','ChitiettaisanController@loc_nvOfphong');
Route::post('/chitiettaisan/delete/{id}','ChitiettaisanController@destroy');
//Nhà cung cấp
Route::resource('/nhacungcap','NhacungcapController');
Route::post('/nhacungcap/{id}/edit','NhacungcapController@edit');
Route::post('/nhacungcap/update/{id}','NhacungcapController@update');

Route::post('/nhacungcap/search','NhacungcapController@search_nhacungcap');
// Loại tài sản
Route::resource('/loaits','LoaitaisanController');
Route::post('/loaits/search','LoaitaisanController@search_loai');
// Loại tài sản cố định
Route::resource('/loaiTSCD','LoaiTSCDController');
Route::post('/loaiTSCD/update/{id}','LoaiTSCDController@update');
Route::post('/loaiTSCD/search','LoaiTSCDController@search_loai');
//  user
Route::resource('/user','UserController');
Route::get('/login','UserController@login')->name('login');
Route::post('/login','UserController@postlogin');
Route::get('/logout','UserController@logout_user');
Route::post('/check','UserController@checklogin');

// tiêu hao
Route::resource('/tieuhao','TieuhaoController');
Route::post('/tieuhao/search','TieuhaoController@search_tieuhao');
Route::post('/tieuhao/find','TieuhaoController@find_tieuhao');
// bàn giao
Route::resource('/bangiao','BangiaoController');
Route::post('/bangiao/loc_nv','BangiaoController@loc_nv');
Route::post('/bangiao/loc_ts','BangiaoController@loc_ts');
Route::post('/bangiao/loc_chitiet','BangiaoController@loc_chitiet');
Route::post('/bangiao/more_ts','BangiaoController@more_ts');
Route::get('/bangiao/phieu/{id}','BangiaoController@show_phieu');
Route::post('/bangiao/search','BangiaoController@search');
Route::post('/bangiao/update/{id}','BangiaoController@update')->name('bangiao.update');
Route::post('/bangiao/destroy/{id}','BangiaoController@destroy');
Route::get('/bangiao/in_phieu/{id}','BangiaoController@in_phieu');

// kiểm kê
Route::resource('/kiemke','KiemkeController');
Route::post('/kiemke/list_taisan','KiemkeController@list_taisan');
Route::post('/kiemke/loc_cv','KiemkeController@loc_nv');
Route::get('/kiemke/export/{id}','KiemkeController@export')->name('kiemke.export');
Route::get('/kiemke/export_ds/{id}','KiemkeController@export_ds')->name('kiemke.export_ds');
Route::post('/kiemke/search','KiemkeController@search_kiemke');
Route::post('/kiemke/tinh_haomon','KiemkeController@tinh_haomon');

// hợp đồng
Route::resource('/hopdong','HopdongController');
Route::post('/hopdong/search','HopdongController@search_hopdong');

// thanh lý
Route::resource('/thanhly','ThanhlyController');
Route::post('/thanhly/more_ts','ThanhlyController@more_ts');
Route::get('/thanhly/in_phieu/{id}','ThanhlyController@in_phieu');
Route::get('/thanhly/phieu/{id}','ThanhlyController@show_phieu');
Route::post('/thanhly/update/{id}','ThanhlyController@update')->name('thanhly.update');