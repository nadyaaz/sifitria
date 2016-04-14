<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Permohonan;
use App\Catatan;
use DB;

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

    public function setuju(Request $request)
    {       
        // get session peminjaman yang mau dibatalkan
        $input = $request->all();

        // get all data
        $id = $input['Id'];
        $catatan = $input['catatan_txtarea'];
        $user_id = $input['UserId'];
        $persetujuan = $input['persetujuan'];

        // incrementing Id
        $tahap_catatan = Catatan::getIncrementedTahapCatatan();

        // insert new record to database
        Catatan::createCatatan($id, $tahap_catatan, $catatan, $user_id);

        // update record's status
        Permohonan::updateStatus($id, $persetujuan);
        
        return back();
    }

    public function removePeminjaman(Request $request)
    {
    	// get session peminjaman yang mau dibatalkan
        $input = $request->all();
        $id = $input['Id'];

    	// menghapus peminjaman (update attribute deleted pada database)
        Permohonan::deletePermohonan($id);
    	
        return back();
    }
}