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
	// Route::get('SSO', 'SSOController@index');
	Route::match(['get', 'post'], 'login', 'LoginController@index');
	// Route::post('logout', 'SSOController@out');
	Route::post('logout', 'LoginController@logout');	

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
	Route::match(['get', 'post'], 'pinjamruang/jadwal/buat', 'JadwalController@createJadwal');	
	Route::post('pinjamruang/jadwal/get', 'JadwalController@getJadwalAJAX');
	Route::post('pinjamruang/jadwal/getruangan', 'PeminjamanController@getRuanganAvailableAJAX');
	Route::post('pinjamruang/jadwal/hapus', 'JadwalController@removeJadwal');	

	Route::get('pinjamruang/gedung', 'GedungController@getGedung');	
	Route::match(['get', 'post'], 'pinjamruang/gedung/buat', 'GedungController@createGedung');
	Route::match(['get', 'post'], 'pinjamruang/gedung/ubah/{hash?}', 'GedungController@updateGedung');
	Route::post('pinjamruang/gedung/hapus', 'GedungController@removeGedung');

	// registrasi barang
	Route::match(['get', 'post'], 'registrasibarang', 'RegistrasiController@dashboard');
	Route::match(['get', 'post'], 'registrasibarang/buat', 'RegistrasiController@getCreateRegistrasi');	
	Route::post('registrasibarang/insert', 'RegistrasiController@createRegistrasi');
	Route::match(['get', 'post'], 'registrasibarang/ubah/{hash?}', 'RegistrasiController@updateRegistrasi');
	Route::post('registrasibarang/ubahstatus', 'RegistrasiController@updateStatusRegistrasi');
	Route::post('registrasibarang/batal', 'RegistrasiController@removeRegistrasi');	
	
	Route::match(['get', 'post'], 'registrasibarang/barang', 'BarangController@getBarang');
	Route::match(['get', 'post'], 'registrasibarang/barang/buat', 'BarangController@getCreateBarang');
	Route::post('registrasibarang/barang/insert', 'BarangController@createBarang');	
	Route::match(['get', 'post'], 'registrasibarang/barang/ubah/{hash?}', 'BarangController@updateBarang');

	//usulan pengadaan
	Route::get('usulanpengadaan', 'PengadaanController@getPengadaan');
	Route::match(['get', 'post'], 'usulanpengadaan/buat', 'PengadaanController@getCreatePengadaan');
	Route::match(['get', 'post'], 'usulanpengadaan/ubah/{hashPermohonan?}', 'PengadaanController@updatePengadaan');
	Route::post('usulanpengadaan/insert', 'PengadaanController@createPengadaan');
	Route::post('usulanpengadaan/ubahstatus', 'PengadaanController@updateStatusPengadaan');
	Route::post('usulanpengadaan/batal', 'PengadaanController@removePengadaan');	

	//maintenance  barang
	Route::get('maintenancebarang', 'MaintenanceController@getMaintenance');
	Route::match(['get', 'post'], 'maintenancebarang/buat', 'MaintenanceController@getCreateMaintenance');
	Route::match(['get', 'post'], 'maintenancebarang/ubah/{hash?}', 'MaintenanceController@updateMaintenance');
	Route::post('maintenancebarang/insert', 'MaintenanceController@createMaintenance');
	Route::post('maintenancebarang/ubahstatus', 'MaintenanceController@updateStatusMaintenance');
	Route::post('maintenancebarang/batal', 'MaintenanceController@removeMaintenance');
});