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

Route::group(['middleware' => ['web']], function() {
	Route::get('/welcome', function () {
	    return view('master');
	});

	Route::get('list', 'BarangController@DaftarBarang');

	Route::get('daftarbarang', 'BarangController@DaftarBarang');

	// Unit test page
	//Route::get('/unittest', 'UnitTestController@unit');

	Route::get('/', 'HomeController@index');
	Route::get('SSO', 'SSOController@index');
	Route::post('logout', 'SSOController@out');
	Route::get('dashboard', 'SSOController@dashboard');

	Route::get('pinjamruang', 'PeminjamanController@dashboard');
	Route::get('registrasibarang', 'RegistrasiController@dashboard');
	Route::get('pinjamruang/ruangan', 'RuanganController@getRuangan');
	Route::get('registrasibarang/barang', 'BarangController@getBarang');

	Route::get('pinjamruang/buat', 'PeminjamanController@getCreatePeminjaman');
	Route::post('pinjamruang/buat', 'PeminjamanController@createPeminjaman');

	Route::get('registrasibarang/buat', 'RegistrasiController@getCreateRegistrasi');
	Route::post('registrasibarang/buat', 'RegistrasiController@createRegistrasi');

	Route::get('pinjamruang/ruangan/buat', 'RuanganController@getCreateRuangan');
	Route::post('pinjamruang/ruangan/buat', 'RuanganController@createRuangan');
	
	Route::get('registrasibarang/barang/buat', 'BarangController@getCreateBarang');
	Route::post('registrasibarang/barang/buat', 'BarangController@createBarang');

	Route::get('pinjamruang/ruangan/buatjadwal', 'JadwalController@getCreateJadwal');
	Route::post('pinjamruang/ruangan/buatjadwal', 'JadwalController@createJadwal');

	Route::get('registrasibarang/barang/update', 'BarangController@getUpdateBarang');
	Route::post('registrasibarang/barang/update', 'BarangController@updateBarang');

	Route::get('pinjamruang/ruangan/update', 'RuanganController@getUpdateRuangan');
	Route::post('pinjamruang/ruangan/update', 'RuanganController@updateRuangan');	

	Route::get('registrasibarang/update', 'RegistrasiController@getUpdateRegistrasi');
	Route::post('registrasibarang/update', 'RegistrasiController@updateRegistrasi');

	Route::delete('pinjamruang/ruangan/hapus', 'RuanganController@deleteRuangan');	
	Route::delete('pinjamruang/ruangan/hapusjadwal', 'JadwalController@deleteJadwal');	

	Route::delete('pinjamruang/batal', 'PeminjamanController@cancelPeminjaman');	
	Route::delete('registrasibarang/batal', 'RegistrasiController@cancelRegistrasi');	
});