<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Permohonan;
use App\Master;
use App\Catatan;
use App\User;
use DB;

class MaintenanceController extends MasterController
{
	/**
	 * [getMaintenance description]
	 * @return [type] [description]
	 */
    public function getMaintenance()
    {
    	# code...

      $maintenance = Permohonan::getMaintenance();

        return $this->render('maintenancebarang.dashboard',
            [
                'title' => 'Dashboard Usulan Pengadaan',
                'allpermohonan' => $maintenance['allpermohonan'],
                'allcatatan' => $maintenance['allcatatan'],
            ]
        );  

        // return $maintenance['allpermohonan'];
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
    	// check if user permitted        
        // if (!($this->isPermitted('buatpinjam'))) return redirect('/');
        
        // validate request
        $this->validate($request, [
            'nomorsurat' => 'required',
            'catatan_txtarea' => 'required',
        ]);

        $input = $request->all();
        $status = 0;

        // check update, TOLAK / SETUJU
        if (array_key_exists('setuju', $input))
            $status = 2;
        else if (array_key_exists('tolak', $input))          
            $status = 1;

        $nomorinduk = $input['nomorindukverifikator'];
        $user = User::all()->where('NomorInduk', $nomorinduk)->first();
        $userrole = $user->Role;

        if ($userrole == 'Staf Fasilitas & Infrastruktur'){
            if (array_key_exists('setuju', $input))
                $status = 2;
            else if (array_key_exists('tolak', $input))          
                $status = 1;
        }
        else if ($userrole == 'Manajer Fasilitas & Infrastruktur'){
            if (array_key_exists('setuju', $input))
                $status = 2;
            else if (array_key_exists('tolak', $input)) 
            {         
                $status = 1;
                $tahap = 2;
            }
        }
        else if ($userrole == 'Wakil Dekan'){
            if (array_key_exists('setuju', $input))
                $status = 2;
            else if (array_key_exists('tolak', $input)) 
            {         
                $status = 1;
                $tahap = 3;
            }
        }

        // update permohonan
        Permohonan::updatePermohonan($input['hashPermohonan'], [
            'NomorSurat' => $input['nomorsurat'],
            'StatusPermohonan' => $status,
        ]);

        // get permohonan object
        $permohonan = Permohonan::where('hashPermohonan', $input['hashPermohonan'])->get();

        // last tahap catatan 
        $lastTahapCatatan = Master::getLastId('catatan', 'TahapCatatan', [
            ['IdPermohonan', '=', $permohonan[0]->IdPermohonan],
        ]);

        // new tahap catatan
        $tahapCatatan = $lastTahapCatatan + 1;

        // create catatan
        Catatan::createCatatan(
            $permohonan[0]->IdPermohonan, 
            $tahapCatatan,
            $input['catatan_txtarea'],
            session('user_sess')->npm,
            md5($permohonan[0]->IdPermohonan.$tahapCatatan.session('user_sess')->npm)
        );

        // return to pinjamruang dashboard
        return redirect('maintenancebarang');
    }

    /**
     * [removeMaintenance description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function removeMaintenance(Request $request)
    {
    	// ganti status peminjaman pada database        
        Permohonan::deletePermohonan($request->input('hashPermohonan'));
        
        // redirect to registrasi barang dashboard
        return redirect('maintenancebarang');
    }
}
