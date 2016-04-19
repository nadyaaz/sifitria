<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Permohonan;
use App\Catatan;
use DB;

class PeminjamanController extends MasterController
{
    /**
     * [dashboard description]
     * @return [type] [description]
     */
    public function dashboard()
    {
        // check if user permitted        
        if (!($this->isPermitted('pinjamruang'))) return redirect('/');    

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

    /**
     * [getCreatePeminjaman description]
     * @return [type] [description]
     */
    public function getCreatePeminjaman()
    {
        // check if user permitted        
        if (!($this->isPermitted('buatpinjam'))) return redirect('/');    

        return $this->render('pinjamruang.buat1',
            [
                'title' => 'Buat Permohonan Peminjaman Ruangan',
            ]
        );
    }

    /**
     * [removePeminjaman description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function removePeminjaman(Request $request)
    {
    	// get session peminjaman yang mau dibatalkan
        $input = $request->all();
        $hash = $input['Id'];

    	// ganti status peminjaman pada database
        Permohonan::deletePermohonan($hash);
    	
		// redirect back to peminjaman dashboard
        return back();
    }

    /**
     * [setuju description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
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
}
