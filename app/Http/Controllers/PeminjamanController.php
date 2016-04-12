<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Permohonan;

class PeminjamanController extends MasterController
{
    public function dashboard()
    {
		// get permohonan peminjaman ruangan data
        $peminjaman = Permohonan::getPeminjaman();

		// render peminjaman ruangan dashboard
    	return $this->render('pinjamruang.dashboard',
    		[
    			'title' => 'Dashboard Peminjaman Ruangan',
    			'allpermohonan' => $peminjaman['allpermohonan'],
    			'allcatatan' => $peminjaman['allcatatan'],
    		]
    	);	
    }

    public function getCreatePeminjaman()
    {
        return $this->render('pinjamruang.buat1',
            [
                'title' => 'Buat Permohonan Peminjaman Ruangan',
            ]
        );
    }

    public function removePeminjaman(Request $request)
    {
    	// get session peminjaman yang mau dibatalkan
        $input = $request->all();
        $inputs = $input['Id'];

    	// ganti status peminjaman pada database
        Permohonan::removePeminjaman($inputs);
    	
		// redirect back to peminjaman dashboard
        return back();
    }
}
