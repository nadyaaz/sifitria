<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Permohonan;
use App\Barang;
use App\Master;
use App\Catatan;

class MaintenanceController extends MasterController
{
	/**
	 * [getMaintenance description]
	 * @return [type] [description]
	 */
    public function getMaintenance()
    {
    	$maintenance = Permohonan::getMaintenance(session('user_sess')->role, session('user_sess')->npm);

        return $this->render('maintenancebarang.dashboard',
            [
                'title' => 'Dashboard Usulan Pengadaan',
                'allpermohonan' => $maintenance['allpermohonan'],
                'allcatatan' => $maintenance['allcatatan'],
                'allbarang' => $maintenance['allbarang']
            ]
        );
    }

    /**
     * Get buat registrasi page
     * @param  Request $request Request object
     * @return buatregistrasi.blade.php
     */
    public function getCreateMaintenance(Request $request)
    {
        // check if user permitted        
        // if (!($this->isPermitted('registrasibarang'))) return redirect('registrasibarang');    
        // 
        $data = [
            'title' => 'Buat Permohonan Maintenance Barang',
            'barang' => '',
        ];

        if ($request->isMethod('POST')) {
            $barang = Barang::where([['NomorBarcode', $request->input('barcode')]])->get();

            if (count($barang) == 0) {
                $request->session()->flash('barangnotfound', 'Barang dengan barcode'.$request->input('barcode').' tidak ditemukan');
                return redirect('maintenancebarang/buat');
            }

            $data['barang'] = $barang;

            // dd($barang);
        }

        return $this->render('maintenancebarang.buatmaintenance', $data);    
    }

    /**
     * [createMaintenance description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function createMaintenance(Request $request)
    {
    	// Memvalidasi isian form registrasi barang
        $this->validate ($request, [
            'subjek'=> 'required|max:100',
            'catatanpemohon' => 'required',            
            'kerusakanbarang' => 'required',
        ]);

        $input = $request->all();

        // Auto Increment IdPermohonan
        $lastId = Master::getLastId('permohonan', 'IdPermohonan');
        $IdPermohonan = $lastId + 1;        

        // Memasukkan data dari form registrasi barang ke table permohonan
        Permohonan::createPermohonan([
            'IdPermohonan' => $IdPermohonan,             
            'SubjekPermohonan' => $input['subjek'], 
            'JenisPermohonan' => 4, 
            'IdPemohon' => session('user_sess')->npm,
            'hashPermohonan' => md5($IdPermohonan.$input['subjek']),
        ]);

        // create catatan record for this permohonan
        Catatan::createCatatan(
            $IdPermohonan, // Id Permohonan terkait 
            0, // tahap catatan
            $input['catatanpemohon'], // deskripsi catatan dari pemohon
            session('user_sess')->npm, // nomor induk pemohon
            md5($IdPermohonan.'0'.session('user_sess')->npm) // hash catatan
        );

        // Mengembalikan ke halaman list daftar maintenance barang             
        return redirect('maintenancebarang');
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

    public function updateStatusMaintenance(Request $request)
    {
        // validate request
        $this->validate($request, [
            'nomorsurat' => 'required',
            'catatan_txtarea' => 'required',
        ]);

        $input = $request->all();
        $newStatus = 0;        
        $newTahap = 1;

        $lastTahap = Master::getLastId('permohonan', 'TahapPermohonan', [
            ['hashPermohonan', '=', $input['hashPermohonan']]
        ]);    

        $lastStatus = Master::getLastId('permohonan', 'StatusPermohonan', [
            ['hashPermohonan', '=', $input['hashPermohonan']]
        ]);


        // check update, TOLAK / SETUJU
        if (array_key_exists('setuju', $input))
            $newStatus = 2;
        else if (array_key_exists('tolak', $input))          
            $newStatus = 1;


        // increment new tahap
        if($lastStatus == 2) 
            $newTahap = $lastTahap + 1;        


        // update permohonan array
        $updatePermohonanArray = [
            'NomorSurat' => $input['nomorsurat'],
            'StatusPermohonan' => $newStatus,
        ];

        // if tahap change, push TahapPermohonan to updatePermohonanArray
        if ($lastTahap != $newTahap) 
            $updatePermohonanArray['TahapPermohonan'] = $newTahap;


        // update permohonan registrasi barang
        Permohonan::updatePermohonan($input['hashPermohonan'], $updatePermohonanArray);            

        $permohonan = Permohonan::where([['hashPermohonan', $input['hashPermohonan']]])->first();

        // last tahap catatan 
        $lastTahapCatatan = Master::getLastId('catatan', 'TahapCatatan', [
            ['IdPermohonan', '=', $permohonan->IdPermohonan],
        ]);        

        // new tahap catatan
        $tahapCatatan = $lastTahapCatatan + 1;

        // create catatan
        Catatan::createCatatan(
            $permohonan->IdPermohonan, 
            $tahapCatatan,
            $input['catatan_txtarea'],
            session('user_sess')->npm,
            md5($permohonan->IdPermohonan.$tahapCatatan.session('user_sess')->npm)
        );

        // redirect to registrasi barang page
        return redirect('maintenancebarang');
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
