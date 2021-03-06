<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Permohonan;

class PengadaanController extends MasterController
{
	/**
	 * [getPengadaan description]
	 * @return [type] [description]
	 */
    public function getPengadaan()
    {
    	# code...

        $pengadaan = Permohonan::getPengadaan(session('user_sess')->role, session('user_sess')->npm);


        return $this->render('usulanpengadaan.dashboard',
            [
                'title' => 'Dashboard Usulan Pengadaan',
                'allpermohonan' => $pengadaan['allpermohonan'],
                 'allcatatan' => $pengadaan['allcatatan'],
                'allkandidat' => $pengadaan['allkandidat']
            ]
        );  

        // return $pengadaan['allpermohonan'];
    }

    /**
     * [createPengadaan description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function createPengadaan(Request $request)
    {
    	# code...
    }

    /**
     * [updatePengadaan description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function updatePengadaan(Request $request)
    {
    	# code...
    }

    /**
     * [removePengadaan description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function removePengadaan(Request $request)
    {
    	# code...
    }
}
