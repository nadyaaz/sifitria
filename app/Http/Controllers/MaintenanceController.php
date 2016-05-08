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

            // jika barang tidak ada, barcode barang salah
            if (count($barang) == 0) {
                $request->session()->flash('error_get_barang', 'Barang dengan barcode'.$request->input('barcode').' tidak ditemukan');
                return redirect('maintenancebarang/buat');
            }

            // jika barang sudah dimohonkan maintenance nya, tidak bisa dimohonkan lagi
            if ($barang->IdPermohonan != null) {
                $request->session()->flash('error_get_barang', 'Barang dengan barcode'.$request->input('barcode').' sudah dimohonkan untuk maintenance');
                return redirect('maintenancebarang/buat');
            }
            
            $data['barang'] = $barang;
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

        // update IdPermohonan pada barang
        Barang::updateBarang($input['hashBarang'], [
            'IdPermohonan' => $IdPermohonan,
            'KerusakanBarang' => $input['kerusakanbarang'],
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
    public function updateMaintenance(Request $request, $hash = '')
    {
    	// check if user permitted        
        // if (!($this->isPermitted('registrasibarang'))) return redirect('/');
        
        // redirect to dashboard if hash is null
        if ($hash == '') return redirect('maintenancebarang');

        // redirect to dashboard if permohonan is deleted
        $permohonan = Permohonan::where('hashPermohonan', $hash)->first();
        if ($permohonan->deleted == 1) return redirect('maintenancebarang');

        // check request method
        if ($request->isMethod('POST')) {
            // request method is post
            
            // Memvalidasi isian form registrasi barang
            $this->validate ($request, [
                'subjek'=> 'required|max:100',
                'catatanpemohon' => 'required',                                            
                'kerusakanbarang' => 'required',
            ]);

            $input = $request->all();

            // update data dari form registrasi barang ke table permohonan
            Permohonan::updatePermohonan($hash, ['SubjekPermohonan' => $input['subjek']]);
            
            // update barang
            Barang::updateBarang($input['hashBarang'], ['KerusakanBarang' => $input['kerusakanbarang']]);

            // update catatan
            Catatan::updateCatatan($input['hashCatatan'], $input['catatanpemohon']);

            // Mengembalikan ke halaman list daftar registrasi barang             
            return redirect('maintenancebarang');

        } else {
            // request method is get
            
            // get maintenance selected
            $maintenance = Permohonan::where('hashPermohonan', $hash)->first();

            if (count($maintenance) == 0) return redirect('maintenancebarang');
            
            $barang = Barang::where('IdPermohonan', $maintenance['IdPermohonan'])->first();

            $catatan = Catatan::where([
                ['IdPermohonan', '=', $maintenance['IdPermohonan']],
                ['TahapCatatan', '=', 0]
            ])->first();


            // return update maintenance page
            return $this->render('maintenancebarang.updateMaintenance', 
                [
                    'title' => 'Update Permohonan Maintenance Barang',
                    'permohonan' => $maintenance,
                    'barang' => $barang,
                    'catatan' => $catatan,
                ]
            );
        }   
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

        // if status == 1 (ditolak) || maintenance telah selesai, set IdPermohonan barang to null
        if ($newStatus == 1 || ($newStatus == 2 && $newTahap == 3))
            Barang::updateBarang($input['hashBarang'], ['IdPermohonan' => $IdPermohonan]);
        
        // update permohonan registrasi barang
        Permohonan::updatePermohonan($input['hashPermohonan'], $updatePermohonanArray);            

        $permohonan = Permohonan::where('hashPermohonan', $input['hashPermohonan'])->first();

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
    	// ganti status peminjaman pada database        
        Permohonan::deletePermohonan($request->input('hashPermohonan'));
        
        // redirect to registrasi barang dashboard
        return redirect('maintenancebarang');
    }
}
