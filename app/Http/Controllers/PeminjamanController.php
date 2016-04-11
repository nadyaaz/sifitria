<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Permohonan;

class PeminjamanController extends MasterController
{
    public function dashboard()
    {    	
        $peminjaman = Permohonan::getPeminjaman();

    	return $this->render('pinjamruang.dashboard',
    		[
    			'title' => 'Dashboard Peminjaman Ruangan',
    			'allpermohonan' => $peminjaman['allpermohonan'],
    			'allcatatan' => $peminjaman['allcatatan'],
    		]
    	);	
    }

    public function removePeminjaman(Request $request)
    {
    	// get session peminjaman yang mau dibatalkan
        $input = $request->all();
        $inputs = $input['Id'];

    	// ganti status peminjaman pada database
        DB::update(
        	DB::raw(
        		"UPDATE PERMOHONAN 
        		SET deleted = 1 
        		WHERE IdPermohonan = $inputs"
        	)
        );
    	
        return back();
    }
}
