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

Route::group(['middlewareGroups' => 'web'], function() {

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
	Route::post('pinjamruang/ubah', 'PeminjamanController@updateStatusPeminjaman');
	Route::post('pinjamruang/getruangan', 'PeminjamanController@getRuanganAvailableAJAX');
	Route::post('pinjamruang/batal', 'PeminjamanController@removePeminjaman');	

	Route::match(['get', 'post'], 'pinjamruang/ruangan', 'RuanganController@getRuangan');
	Route::get('pinjamruang/ruangan/buat', 'RuanganController@getCreateRuangan');	
	Route::post('pinjamruang/ruangan/buat', 'RuanganController@createRuangan');	
	Route::match(['get', 'post'], 'pinjamruang/ruangan/ubah/{hashRuang?}', 'RuanganController@updateRuangan');	
	Route::post('pinjamruang/ruangan/hapus', 'RuanganController@removeRuangan');	
	
	Route::get('pinjamruang/jadwal', 'JadwalController@getJadwal');
	Route::get('pinjamruang/jadwal/buat', 'JadwalController@getCreateJadwal');	
	Route::post('pinjamruang/jadwal/get', 'JadwalController@getJadwalAJAX');
	Route::post('pinjamruang/jadwal/getruangan', 'PeminjamanController@getRuanganAvailableAJAX');
	Route::post('pinjamruang/jadwal/buat', 'JadwalController@createJadwal');	
	Route::post('pinjamruang/jadwal/hapus', 'JadwalController@removeJadwal');	

	Route::get('pinjamruang/gedung', 'GedungController@getGedung');	
	Route::match(['get', 'post'], 'pinjamruang/gedung/buat', 'GedungController@createGedung');
	Route::match(['get', 'post'], 'pinjamruang/gedung/ubah/{hash?}', 'GedungController@updateGedung');
	Route::post('pinjamruang/gedung/hapus', 'GedungController@removeGedung');

	// registrasi barang
	Route::match(['get', 'post'], 'registrasibarang', 'RegistrasiController@dashboard');
	Route::match(['get', 'post'], 'registrasibarang/buat', 'RegistrasiController@getCreateRegistrasi');	
	Route::post('registrasibarang/insert', 'RegistrasiController@createRegistrasi');
	Route::get('registrasibarang/ubah', 'RegistrasiController@getUpdateRegistrasi');
	Route::post('registrasibarang/ubah', 'RegistrasiController@updateRegistrasi');
	Route::post('registrasibarang/ubahstatus', 'RegistrasiController@updateStatusRegistrasi');
	Route::post('registrasibarang/batal', 'RegistrasiController@removeRegistrasi');	
	
	Route::match(['get', 'post'], 'registrasibarang/barang', 'BarangController@getBarang');
	Route::match(['get', 'post'], 'registrasibarang/barang/buat', 'BarangController@getCreateBarang');
	Route::post('registrasibarang/barang/insert', 'BarangController@createBarang');
	Route::get('registrasibarang/barang/ubah', 'BarangController@getUpdateBarang');
	Route::post('registrasibarang/barang/ubah', 'BarangController@updateBarang');

	//pengadaan barang
	Route::match(['get', 'post'], 'pengadaanbarang', 'PengadaanController@dashboard');
	Route::match(['get', 'post'], 'pengadaanbarang/buat', 'PengadaanController@getCreatePengadaan');	
	Route::post('pengadaanbarang/insert', 'PengadaanController@createPengadaan');

	//maintenance  barang
	Route::get('maintenancebarang', 'MaintenanceController@getMaintenance');
	Route::get('maintenancebarang/buat','MaintenanceController@getCreateMaintenance');
	Route::post('maintenancebarang/ubah', 'MaintenanceController@updateMaintenance');
	Route::post('maintenancebarang/batal', 'MaintenanceController@removeMaintenance');

});