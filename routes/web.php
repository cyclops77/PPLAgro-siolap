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

Route::get('/', 'OutletMapController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/postregister','RegisterController@create');

/*
 * Outlets Routes
 */
Route::get('/our_outlets', 'OutletMapController@index')->name('outlet_map.index');
Route::resource('outlets', 'OutletController');

Route::get('/info-saya/{id}','HomeController@infoSaya');


Route::group(['middleware' => ['auth','checkRole:petani']], function(){

Route::get('/produk','ProdukController@index');

Route::get('/pasarkan-produk','ProdukController@create');

Route::post('/pasarkan-barang-saya','ProdukController@insert');

Route::get('/produk/{id}/edit','ProdukController@edit');

Route::post('/edit-barang-saya','ProdukController@update');

Route::get('/rekomendasi-tanam','HitungRekomendasiController@getCuaca');

Route::get('/index-rekom','RekomendasiController@getCuaca');

Route::post('/hitung-rekomendasi-penanaman','HitungRekomendasiController@perhitungan');

});	

Route::group(['middleware' => ['auth','checkRole:admin']], function(){

Route::get('/akun-petani','PetaniController@list');

Route::get('/verif-harga','HargaController@index');

Route::post('/verifikasi-barang-ini','HargaController@verifNow');

Route::get('/verif-transaksi','PembayaranController@LinkAcc');

Route::post('/verif-bukti-tf-barang','PembayaranController@AccUploadBukti');

Route::get('/kirim-barang','PengirimanController@index');

Route::get('/riwayat-pembelian','PengirimanController@riwayat');

Route::get('/sedang-mengirim','PengirimanController@sedangkirim');

Route::post('/kirim-barang-ini-ini','PengirimanController@kirimBarang');

});		

Route::group(['middleware' => ['auth','checkRole:mitra']], function(){

Route::get('/barang','BarangController@index');

Route::get('/barang/{id}/beli','BarangController@beli');

Route::post('/request-beli-barang','BarangController@statusBaruBeli');

Route::get('/status-barang','PembayaranController@index');

Route::get('/pembayaran','PembayaranController@GakLunas');

Route::get('/pembayaran/{id}/bukti','PembayaranController@LinkUploadBukti');

Route::post('/upload-bukti-tf-barang','PembayaranController@UploadBukti');

Route::get('/info-saya','MitraController@show');

Route::get('/sedang-dikirim','PengirimanController@sedangDiKirim');

Route::post('/acc-barang-sudah-masuk', 'PengirimanController@barangSampe');

});	
