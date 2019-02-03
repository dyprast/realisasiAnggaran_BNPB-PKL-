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
    return redirect(url('home'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('kegiatan')->group(function(){
	Route::get('/', 'Data\Kegiatan\KegiatanController@index');
	Route::get('/addData', 'Data\Kegiatan\KegiatanController@addData');
	Route::post('/simpanData', 'Data\Kegiatan\KegiatanController@saveData')->name('simpanDataKegiatan');
	Route::get('/editData/{id}', 'Data\Kegiatan\KegiatanController@editData');
	Route::post('/prosesEditData/{id}', 'Data\Kegiatan\KegiatanController@prosesEditData');
	Route::get('/hapusData/{id}', 'Data\Kegiatan\KegiatanController@hapusData');
	Route::get('/xlsx', 'Data\Cetak\CetakController@KegiatanXLSX');
});
Route::prefix('subKegiatan')->group(function(){
	Route::get('/', 'Data\SubKegiatan\SubKegiatanController@index');
	Route::get('/addData', 'Data\SubKegiatan\SubKegiatanController@addData');
	Route::post('/simpanData', 'Data\SubKegiatan\SubKegiatanController@saveData')->name('simpanDataSubKegiatan');
	Route::get('/editData/{id}', 'Data\SubKegiatan\SubKegiatanController@editData');
	Route::post('/prosesEditData/{id}', 'Data\SubKegiatan\SubKegiatanController@prosesEditData');
	Route::get('/hapusData/{id}', 'Data\SubKegiatan\SubKegiatanController@hapusData');
	Route::get('/xlsx', 'Data\Cetak\CetakController@SubKegiatanXLSX');

	Route::prefix('paket')->group(function(){
		Route::get('/{id_subKegiatan}', 'Data\Paket\PaketController@index');
		Route::get('/addData/{id_subKegiatan}', 'Data\Paket\PaketController@addData');
		Route::post('/simpanData/{id_subKegiatan}', 'Data\Paket\PaketController@saveData')->name('simpanDataPaket');
		Route::get('/editData/{id_subKegiatan}/{id}', 'Data\Paket\PaketController@editData');
		Route::post('/prosesEditData/{id_subKegiatan}/{id}', 'Data\Paket\PaketController@prosesEditData');
		Route::get('/hapusData/{id_subKegiatan}/{id}', 'Data\Paket\PaketController@hapusData');
	});
});
Route::prefix('MAK')->group(function(){
	Route::get('/', 'Data\MAK\MAKController@index');
	Route::get('/addData/{id_subKegiatan}', 'Data\MAK\MAKController@getKSK');
	Route::get('/addData', 'Data\MAK\MAKController@addData');
	Route::post('/simpanData', 'Data\MAK\MAKController@saveData')->name('simpanDataMAK');
	Route::get('/editData/{id}', 'Data\MAK\MAKController@editData');
	Route::post('/prosesEditData/{id}', 'Data\MAK\MAKController@prosesEditData');
	Route::get('/hapusData/{id}', 'Data\MAK\MAKController@hapusData');
	Route::get('/xlsx', 'Data\Cetak\CetakController@MAKXLSX');
});
Route::prefix('penyerapanKeuangan')->group(function(){
	Route::get('/', 'Data\PenyerapanKeuangan\PenyerapanKeuanganController@index');
	Route::get('/addData/getSubKegiatan', 'Data\PenyerapanKeuangan\PenyerapanKeuanganController@addDataGetSubKegiatan');
	Route::get('/addData', 'Data\PenyerapanKeuangan\PenyerapanKeuanganController@addData');
	Route::post('/simpanData', 'Data\PenyerapanKeuangan\PenyerapanKeuanganController@saveData')->name('simpanDataPenyerapanKeuangan');
	Route::get('/editData/{id}', 'Data\PenyerapanKeuangan\PenyerapanKeuanganController@editData');
	Route::post('/prosesEditData/{id}', 'Data\PenyerapanKeuangan\PenyerapanKeuanganController@prosesEditData');
	Route::get('/hapusData/{id}', 'Data\PenyerapanKeuangan\PenyerapanKeuanganController@hapusData');
	Route::get('/xlsx', 'Data\Cetak\CetakController@PenyerapanKeuanganXLSX');
});
Route::prefix('realisasiAnggaranBNPB')->group(function(){
	Route::get('/cetakData', 'Data\Cetak\CetakController@export');
	Route::get('/cetakData/XLSX', 'Data\Cetak\CetakController@XLSX');
	Route::get('/cetakData/PDF', 'Data\Cetak\CetakController@PDF');
});



