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
Route::get('/cetakdisposisi/{id}','DisposisiController@cetakdisposisi');
Route::get('/','AdminController@login');
Route::post('/doLogin','AdminController@doLogin');
Route::get('/logout','AdminController@logout');
//admin
	Route::get('/index','AdminController@index');
	Route::get('/inputclient','AdminController@inputclient');
	Route::post('/inputclient','ClientController@input_client');
	Route::get('/inputdivisi','AdminController@inputdivisi');
	Route::post('/inputdivisi','DivisiController@input_divisi');
	Route::get('/inputinstansi','AdminController@inputinstansi');
	Route::get('/inputkaryawan','AdminController@inputkaryawan');
	Route::post('/inputkaryawan','KaryawanController@input_karyawan');
	Route::get('/inputkota','AdminController@inputkota');
	Route::post('/inputkota','KotaController@input_kota');
	Route::get('/inputprovinsi','AdminController@inputprovinsi');
	Route::post('/inputprovinsi','ProvinsiController@input_provinsi');
	Route::get('/inputuser','AdminController@inputuser');
	Route::post('/inputuser','UserController@input_user');
	Route::get('/lihatclient','ClientController@lihatclient');
	Route::post('/inputinstansi','InstansiController@input_instansi');
	Route::get('/lihatdivisi','DivisiController@lihatdivisi');
	Route::get('/lihatinstansi','InstansiController@lihatinstansi');
	Route::get('/lihatkaryawan','AdminController@lihatkaryawan');
	Route::get('lihatkota','KotaController@lihatkota');
	Route::get('/lihatprovinsi','ProvinsiController@lihatprovinsi');
	Route::get('/lihatuser','UserController@lihatuser');
	Route::get('/ubahkaryawan/{id}','KaryawanController@ubahkaryawan');
	Route::post('/ubahkaryawan','KaryawanController@ubah_karyawan');
	Route::get('/deletekaryawan/{id}','KaryawanController@delete_karyawan');
	Route::get('/deleteclient/{id}','AdminController@delete_client');
	Route::get('/ubahclient/{id}','AdminController@ubahclient');
	Route::post('/ubahclient','AdminController@ubah_client');
	Route::get('/deletedivisi/{id}','AdminController@delete_divisi');
	Route::get('/ubahdivisi/{id}','AdminController@ubahdivisi');
	Route::post('/ubahdivisi','AdminController@ubah_divisi');
	Route::get('/deletekota/{id}','AdminController@delete_kota');
	Route::get('/ubahkota/{id}','AdminController@ubahkota');
	Route::post('/ubahkota','AdminController@ubah_kota');
	Route::get('/deleteprovinsi/{id}','AdminController@delete_provinsi');
	Route::get('/ubahprovinsi/{id}','AdminController@ubahprovinsi');
	Route::post('/ubahprovinsi','AdminController@ubah_provinsi');
	Route::get('/deleteuser/{id}','UserController@delete_user');
	Route::get('/ubahuser/{id}','UserController@ubahuser');
	Route::post('/ubahuser','UserController@ubah_user');
	Route::get('/inputroles','AdminController@inputroles');
	Route::post('/inputroles','AdminController@input_roles');
	Route::get('/menupermission','AdminController@menupermission');
	Route::get('/usermanagement','AdminController@usermanagement');
	Route::get('/inputmenu','AdminController@inputmenu');
	Route::post('/inputmenu','AdminController@input_menu');
	Route::get('/menupermission','AdminController@menupermission');
	Route::post('/menupermission','AdminController@menu_permission');
	Route::get('/daftarmenu','AdminController@daftarmenu');
	Route::get('/ubahmenu/{id}','AdminController@ubahmenu');
	Route::post('/ubahmenu','AdminController@ubah_menu');
	Route::get('/hapusmenu/{id}','AdminController@deletemenu');
	Route::get('/daftarrole','AdminController@daftarrole');
	Route::get('/ubahroles/{id}', 'AdminController@ubahrole');
	Route::get('/ubahinstansi/{id}','InstansiController@ubahinstansi');
//BAGIAN UMUM
	Route::get('/inputsuratmasuk','SuratmasukController@inputsuratmasuk');
	Route::post('/inputsuratmasuk','SuratmasukController@input_surat_masuk');
	Route::get('/inputsuratkeluar','SuratkeluarController@inputsuratkeluar');
	Route::post('/inputsuratkeluar','SuratkeluarController@input_surat_keluar');
	Route::post('/changemasuk','SuratmasukController@changeSuratMasuk');
	Route::get('/lihatsuratkeluar','SuratkeluarController@lihatsuratkeluar');
	Route::get('/lihatsuratmasuk','SuratmasukController@lihatsuratmasuk');
	Route::get('/showsuratmasuk/{filename}','SuratmasukController@show_suratmasuk');
	Route::get('/showsuratkeluar/{filename}','SuratkeluarController@show_suratkeluar');
	Route::get('/deleteSuratMasuk/{id}','SuratmasukController@deleteSuratMasuk');
	Route::get('/deleteSuratKeluar/{id}','SuratkeluarController@deleteSuratKeluar');
	Route::get('/laporansurat/{bfr?}/{aft?}','SuratmasukController@laporansurat_bagianumum');
	Route::get('/detailsuratmasuk/{bfr?}/{aft?}/{id?}','SuratmasukController@detailsuratmasuk_bagianumum');
	Route::get('/detailsuratkeluar/{bfr?}/{aft?}/{id?}','SuratkeluarController@detailsuratkeluar_bagianumum');
	Route::get('/ubahsuratmasuk/{id}','SuratmasukController@ubahsuratmasuk');
	Route::post('/ubahsuratmasuk','SuratmasukController@ubah_suratmasuk');
	Route::get('/ubahdisposisi/{id}','DisposisiController@ubahdisposisi');
	Route::post('ubahdisposisi','DisposisiController@ubah_disposisi');

//karyawan
	Route::get('/lihatdisposisi_karyawan','DisposisiController@lihatdisposisi_karyawan');
//direktur
	Route::get('/inputdisposisi/{id}','DisposisiController@inputdisposisi');
	Route::get('/inputdisposisi','DisposisiController@input_disposisi');
	Route::post('/inputdisposisi','DisposisiController@input_disposisi');
	Route::get('/rekapsuratmasuk/{bfr?}/{aft?}','KaryawanController@lihatsuratmasuk');
	Route::get('/detailsuratmasuk/{bfr?}/{aft?}/{id?}','KaryawanController@detailsuratmasuk');
	Route::get('/detailsuratkeluar/{bfr?}/{aft?}/{id?}','KaryawanController@detailsuratkeluar');
	Route::get('/lihatdisposisi/{bfr?}/{aft?}/{divisi?}','DisposisiController@lihatdisposisi_direktur');
	Route::get('/tindaklanjutisurat','DisposisiController@tindaklanjutisurat');
	Route::get('/carisurat/{start?}/{end?}/{jenis?}/{tag?}','SuratmasukController@carisurat');
