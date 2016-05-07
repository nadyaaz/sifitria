<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Permohonan;

class MaintenanceController extends MasterController
{
	/**
	 * [getMaintenance description]
	 * @return [type] [description]
	 */
    public function getMaintenance()
    {
    	# code...

      $maintenance = Permohonan::getMaintenance(session('user_sess')->role, session('user_sess')->npm);

        return $this->render('maintenancebarang.dashboard',
            [
                'title' => 'Dashboard Usulan Pengadaan',
                'allpermohonan' => $maintenance['allpermohonan'],
                 // 'allcatatan' => $pengadaan['allcatatan'],
            ]
        );  
    }

    /**
     * [createMaintenance description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function createMaintenance(Request $request)
    {
    	# code...
    }

    /**
     * [updateMaintenance description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function updateMaintenance(Request $request)
    {
    	# code...
    }

    /**
     * [removeMaintenance description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function removeMaintenance(Request $request)
    {
    	# code...
    }
}
