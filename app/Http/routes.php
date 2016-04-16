<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => 'web'], function() {

	Route::get('/json', function() {
		return view('json');
	});

	Route::get('json/ruangan', 'PeminjamanController@getBuat');
	Route::post('json/ruangan', 'PeminjamanController@getRuanganAvailable');
	Route::get('/json/get', 'JadwalController@getJadwalAJAX');

	// general
	Route::get('/', 'HomeController@index');
	Route::get('SSO', 'SSOController@index');
	Route::post('logout', 'SSOController@out');	

	// pinjam ruang	
	Route::get('pinjamruang', 'PeminjamanController@dashboard');
	Route::get('pinjamruang/buat', 'PeminjamanController@getCreatePeminjaman');
	Route::post('pinjamruang/buat', 'PeminjamanController@createPeminjaman');
	Route::post('pinjamruang/batal', 'PeminjamanController@cancelPeminjaman');	

	Route::get('pinjamruang/ruangan', 'RuanganController@getRuangan');
	Route::get('pinjamruang/ruangan/buat', 'RuanganController@getCreateRuangan');	
	Route::post('pinjamruang/ruangan/buat', 'RuanganController@createRuangan');
	Route::get('pinjamruang/ruangan/update', 'RuanganController@getUpdateRuangan');
	Route::post('pinjamruang/ruangan/update', 'RuanganController@updateRuangan');	
	Route::post('pinjamruang/ruangan/hapus', 'RuanganController@deleteRuangan');	
	
	Route::get('pinjamruang/jadwal', 'JadwalController@getJadwal');
	Route::get('pinjamruang/jadwal/buat', 'JadwalController@getCreateJadwal');	
	Route::post('pinjamruang/jadwal/get', 'JadwalController@getJadwalAJAX');
	Route::post('pinjamruang/jadwal/buat', 'JadwalController@createJadwal');	
	Route::post('pinjamruang/jadwal/hapus', 'JadwalController@deleteJadwal');	

	Route::get('pinjamruang/gedung', 'GedungController@getGedung');
	Route::post('pinjamruang/gedung', 'GedungController@getGedung');
	Route::get('pinjamruang/gedung/buat', 'GedungController@getCreateGedung');
	Route::post('pinjamruang/gedung/buat', 'GedungController@createGedung');	
	Route::get('pinjamruang/gedung/ubah', 'GedungController@getUpdateGedung');
	Route::post('pinjamruang/gedung/ubah', 'GedungController@updateGedung');
	Route::post('pinjamruang/gedung/hapus', 'GedungController@removeGedung');

	// registrasi barang
	Route::get('registrasibarang', 'RegistrasiController@dashboard');
	Route::get('registrasibarang/buat', 'RegistrasiController@getCreateRegistrasi');
	Route::post('registrasibarang/buat', 'RegistrasiController@createRegistrasi');
	Route::get('registrasibarang/update', 'RegistrasiController@getUpdateRegistrasi');
	Route::post('registrasibarang/update', 'RegistrasiController@updateRegistrasi');
	Route::post('registrasibarang/batal', 'RegistrasiController@cancelRegistrasi');	
	
	Route::get('registrasibarang/barang', 'BarangController@getBarang');
	Route::get('registrasibarang/barang/buat', 'BarangController@getCreateBarang');
	Route::post('registrasibarang/barang/buat', 'BarangController@createBarang');
	Route::get('registrasibarang/barang/update', 'BarangController@getUpdateBarang');
	Route::post('registrasibarang/barang/update', 'BarangController@updateBarang');
});