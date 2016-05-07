<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Master;
use App\Permohonan;
use App\KandidatBarang;
use App\Catatan;
use DB;

class PengadaanController extends MasterController
{
    /**
     * [getPengadaan description]
     * @return [type] [description]
     */
    public function dashboard()
    {
        $pengadaan = DB::select(DB::raw('SELECT * FROM Permohonan p, Kandidat_barang k WHERE p.IdPermohonan = k.IdPermohonan AND JenisPermohonan = 3'));

        return $pengadaan;
    }

    /**
	 * [getPengadaan description]
	 * @return [type] [description]
	 */
    public function getCreatePengadaan(Request $request)
    {
    	// check if user permitted        
        //if (!($this->isPermitted('pengadaan'))) return redirect('registrasibarang');    

        // reset the session
        session()->forget('jmlform');

        if ($request->isMethod('POST')) 
            session()->flash('jmlform', $request->input('jmlform'));

        return $this->render('usulanpengadaan.buatusulan',
            [
                'title' => 'Buat Permohonan Registrasi Barang',
            ]
        );
    }

    /**
     * [createPengadaan description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function createPengadaan(Request $pengadaan)
    {
    	$nform = count($pengadaan->input('namabarang')); 

        // set session for jmlform
        session()->flash('jmlform', $nform);

        // Memvalidasi isian form registrasi barang
        $this->validate ($pengadaan, [
            'subjek'=> 'required|max:100',
            'catatanpemohon' => 'required',
            'namabarang.*' => 'required|max:100',                
            'penanggungjawab.*' => 'required|max:100',
            'kategoribarang.*' => 'required|max:100',
            'jenisbarang.*' => 'required|max:100',
            'kondisibarang.*' => 'required|max:100',
            'spesifikasibarang.*' => 'required',
            'keteranganbarang.*' => 'required',                                
            //'kerusakanbarang.*' => 'required',
        ]);

        $input = $pengadaan->all();

        // Auto Increment IdPermohonan
        $lastId = Master::getLastId('permohonan', 'IdPermohonan');
        $IdPermohonan = $lastId + 1;        

        // Memasukkan data dari form registrasi barang ke table permohonan
        Permohonan::createPermohonan([
            'IdPermohonan' => $IdPermohonan,             
            'SubjekPermohonan' => $input['subjek'], 
            'JenisPermohonan' => 3, 
            'IdPemohon' => session('user_sess')->npm,
            'LinkAnggaran' => $input['linkanggaran'],
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
                //'TanggalBeli' => date('Y-m-d H:i:s', strtotime($input['tanggalbeli']//[$i])),
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
            md5($IdPermohonan.'0'.session('user_sess')->npm) // hash catatan
        );

        // destroy jmlform session
        session()->forget('jmlform');

        // Mengembalikan ke halaman list daftar registrasi barang             
        return redirect('pengadaanbarang');
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
