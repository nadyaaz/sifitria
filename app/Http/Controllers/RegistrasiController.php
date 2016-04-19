<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Permohonan;
use App\KandidatBarang;
use App\catatan;
use App\Master;
use DB;
use validator;


class RegistrasiController extends MasterController
{
    /**
     * Get all permohonan registrasi and display it
     * @return dashboard.blade.php
     */
    public function dashboard(Request $request)
    {   
        // check if user permitted        
        if (!($this->isPermitted('registrasibarang'))) return redirect('/');    

        if (!$request->isMethod('POST')) {
    		// get permohonan registrasi barang data
    		$registrasi = Permohonan::getRegistrasi();

    		// render registrasi barang dashboard
    		return $this->render('registbarang.dashboard',
    			[
    				'title' => 'Dashboard Registrasi Barang',
    				'allregistrasi' => $registrasi['allregistrasi'],
                    'allkandidat' => $registrasi['allkandidat'],
    				'allcatatan' => $registrasi['allcatatan'],
    			]
    		);            
        } else {
            $input = $request->all();

            // get registrasi selected
            $registrasi = Permohonan::where('hashPermohonan', $input['hashPermohonan'])->get();
            $allkandidat = KandidatBarang::where('IdPermohonan', $registrasi[0]['IdPermohonan'])->get();
            $catatan = Catatan::where([
                ['IdPermohonan', '=', $registrasi[0]['IdPermohonan']],
                ['TahapCatatan', '=', 0]
            ])->get();

            // set registrasi and nform session
            session([
                'registrasi' => $registrasi,
                'allkandidat' => $allkandidat,
                'catatan' => $catatan,
            ]);

            // redirect to update registrasi page
            return redirect('registrasibarang/ubah');
        }        
    }

    /**
     * Get buat registrasi page
     * @param  Request $request Request object
     * @return buatregistrasi.blade.php
     */
    public function getCreateRegistrasi(Request $request)
    {
        // check if user permitted        
        if (!($this->isPermitted('buatregistrasi'))) return redirect('/');    

        if ($request->isMethod('POST')) 
            session()->flash('jmlform', $request->input('jmlform'));

    	return $this->render('registbarang.buatregistrasi',
    		[
    			'title' => 'Buat Permohonan Registrasi Barang',
    		]
    	);
    }

    /**
     * Create registrasi object and input it to database
     * @param  Request $regbarang Request object
     * @return redirect to dashboard.blade.php
     */
    public function createRegistrasi(Request $regbarang)
    {
        // get number of form submitted
        $nform = count($regbarang->input('namabarang')); 

        // set session for jmlform
        session()->flash('jmlform', $nform);

        // Memvalidasi isian form registrasi barang
        $this->validate ($regbarang, [
            'subjek'=> 'required|max:100',
            'catatanpemohon' => 'required',
            'namabarang.*' => 'required|max:100',                
            'tanggalbeli.*' => 'required',
            'penanggungjawab.*' => 'required|max:100',
            'kategoribarang.*' => 'required|max:100',
            'jenisbarang.*' => 'required|max:100',
            'kondisibarang.*' => 'required|max:100',
            'spesifikasibarang.*' => 'required',
            'keteranganbarang.*' => 'required',                                
            'kerusakanbarang.*' => 'required',
        ]);

        $input = $regbarang->all();

        // Auto Increment IdPermohonan
        $lastId = Master::getLastId('permohonan', 'IdPermohonan');
        $IdPermohonan = $lastId + 1;        

        // Memasukkan data dari form registrasi barang ke table permohonan
        Permohonan::createPermohonan([
            'IdPermohonan' => $IdPermohonan,             
            'SubjekPermohonan' => $input['subjek'], 
            'JenisPermohonan' => 2, 
            'IdPemohon' => session('user_sess')->npm,
            'hashPermohonan' => md5($IdPermohonan.$input['subjek']),
        ]);           
        
        // get last object Barang           
        $lastKandidatId = Master::getLastId('kandidat_barang', 'IdKandidatBarang');

        // Memasukkan data dari form registrasi barang ke table kandidat_barang        
        for ($i=1; $i <= $nform; $i++, $lastKandidatId++) { 

            $IdBarang = $lastKandidatId + 1;            
            $namabarang = $input['namabarang'][$i];
            $jenisbarang = $input['jenisbarang'][$i];
            $kategoribarang = $input['kategoribarang'][$i];

            // insert to database
            KandidatBarang::createKandidatBarang([
                'IdKandidatBarang' => $IdBarang,
                'NamaBarang' => $namabarang,
                'JenisBarang' => $jenisbarang,
                'KategoriBarang' => $kategoribarang,
                'KeteranganBarang' => $input['keteranganbarang'][$i],
                'KondisiBarang' => $input['kondisibarang'][$i],
                'PenanggungJawab' => $input['penanggungjawab'][$i],
                'TanggalBeli' => date('Y-m-d H:i:s', strtotime($input['tanggalbeli'][$i])),
                'SpesifikasiBarang' => $input['spesifikasibarang'][$i],
                'IdPermohonan' => $IdPermohonan,
                'hashKandidat' => md5($IdBarang.$namabarang.$jenisbarang.$kategoribarang),
            ]);            
        }

        // create catatan record for this permohonan
        Catatan::createCatatan(
            $IdPermohonan, // Id Permohonan terkait 
            0, // tahap catatan
            $input['catatanpemohon'], // deskripsi catatan dari pemohon
            session('user_sess')->npm, // nomor induk pemohon
            md5($IdPermohonan.'1'.session('user_sess')->npm) // hash catatan
        );

        // destroy jmlform session
        session()->forget('jmlform');

        // Mengembalikan ke halaman list daftar registrasi barang             
        return redirect('registrasibarang');
    }

    /**
     * [getUpdateBarang description]
     * @param  string $value [description]
     * @return [type]        [description]
     */
    public function getUpdateRegistrasi(Request $request)
    {
        // if session registrasi not found, redirect to registrasi page
        if (!session()->has('registrasi')) return redirect('registrasibarang');

        // get registrasi selected
        $registrasi = session('registrasi');
        $allkandidat = session('allkandidat');
        $catatan = session('catatan');

        // return update registrasi page
        return $this->render('registbarang.updateregistrasi', 
            [
                'title' => 'Update Permohonan Regsitrasi Barang',
                'registrasi' => $registrasi,
                'allkandidat' => $allkandidat,
                'catatan' => $catatan,
            ]
        );
    }

    /**
     * [updateBarang description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function updateRegistrasi(Request $request)
    {
        // Memvalidasi isian form registrasi barang
        $this->validate ($request, [
            'subjek'=> 'required|max:100',
            'catatanpemohon' => 'required',
            'namabarang.*' => 'required|max:100',                
            'tanggalbeli.*' => 'required',
            'penanggungjawab.*' => 'required|max:100',
            'kategoribarang.*' => 'required|max:100',
            'jenisbarang.*' => 'required|max:100',
            'kondisibarang.*' => 'required|max:100',
            'spesifikasibarang.*' => 'required',
            'keteranganbarang.*' => 'required',                                
            'kerusakanbarang.*' => 'required',
        ]);

        $input = $request->all();        

        // update data dari form registrasi barang ke table permohonan
        Permohonan::updatePermohonan($input['hashPermohonan'], [
            'SubjekPermohonan' => $input['subjek'],
        ]);

        // update kandidat barang
        for ($i=1; $i <= count($input['namabarang']); $i++) { 
            KandidatBarang::updateKandidatBarang($input['hashKandidat'][$i], [
                'NamaBarang' => $input['namabarang'][$i],
                'JenisBarang' => $input['jenisbarang'][$i],
                'KategoriBarang' => $input['kategoribarang'][$i],
                'KeteranganBarang' => $input['keteranganbarang'][$i],
                'KondisiBarang' => $input['kondisibarang'][$i],
                'Penanggungjawab' => $input['penanggungjawab'][$i],
                'TanggalBeli' => date('Y-m-d H:i:s', strtotime($input['tanggalbeli'][$i])),
                'SpesifikasiBarang' => $input['spesifikasibarang'][$i],
            ]);            
        }

        // update catatan
        Catatan::updateCatatan($input['hashCatatan'], $input['catatanpemohon']);

        // forget session        
        session()->forget('registrasi');
        session()->forget('allkandidat');
        session()->forget('catatan');

        // Mengembalikan ke halaman list daftar registrasi barang             
        return redirect('registrasibarang');
    }

    /**
     * Soft-remove permohonan registrasi in database
     * @param  Request $request Request object
     * @return redirect to dashboard.blade.php
     */
    public function removeRegistrasi(Request $request)
    {       
        // ganti status peminjaman pada database        
        Permohonan::deletePermohonan($request->input('hashPermohonan'));
        
        // redirect to registrasi barang dashboard
        return redirect('registrasibarang');
    }
}
