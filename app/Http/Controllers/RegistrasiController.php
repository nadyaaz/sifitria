<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Permohonan;

class RegistrasiController extends MasterController
{
    public function dashboard()
    {  
		// get permohonan registrasi barang data
		$registrasi = Permohonan::getRegistrasi();

		// render registrasi barang dashboard
		return $this->render('registbarang.dashboard',
			[
				'title' => 'Dashboard Registrasi Barang',
				'daftarregis' => $registrasi['daftarregis'],
				'regiscatatan' => $registrasi['regiscatatan'],
			]
		);
    }
}
