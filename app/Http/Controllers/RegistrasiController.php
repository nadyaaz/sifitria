<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Permohonan;
use App\catatan;
use DB;
use validator;


class RegistrasiController extends MasterController
{
    public function dashboard()
    {  
		// get permohonan registrasi barang data
		$registrasi = Permohonan::getRegistrasi();

		// render registrasi barang dashboard
		return $this->render('registbarang.dashboard',
			[
				'title' => 'Dashboard Registrasi Barang',
				'daftarregis' => $registrasi['daftarregis'],
				'regiscatatan' => $registrasi['regiscatatan'],
			]
		);
    }

    /**
     * Get buat registrasi page
     * @param  Request $request Request object
     * @return buatregistrasi.blade.php
     */
    public function getCreateRegistrasi(Request $request)
    {
        if ($request->isMethod('POST')) 
            session()->flash('jmlform', $request->input('jmlform'));

    	return $this->render('registbarang.buatregistrasi',
    		[
    			'title' => 'Buat Permohonan Registrasi Barang',
    		]
    	);
        
    }

    //Membuat permohonan registrasi barang
    public function createRegistrasi(Request $regbarang)
    {
        $input = $regbarang -> all();
        $NomorSurat = $input['surat'];
        $IdKandidatBarang = $input['kandidatid'];
        $SubjekPermohonan = $input ['subjek'];
        $NamaBarang = $input['nama'];
        $KategoriBarang = $input['kategori'];
        $SpesifikasiBarang= $input ['spesifikasi'];
        $Penanggungjawab = $input ['pj'];
        $KondisiBarang = $input ['kondisi'];
        $JenisBarang = $input ['jenis'];
        $UserId = $input['UserId'];
        $KeteranganBarang = $input['keterangan'];

         //Auto Increment Id Permohonan
         $Permohonan = Permohonan::getPermohonanTerakhir();
         $IdPermohonan = $Permohonan-> IdPermohonan + 1;

         //Memvalidasi isian form registrasi barang
         $this->validate ($regbarang,
            ['surat'=>'required|max:100',
            'kandidatid' => 'required|numeric|max:11',
            'subjek'=> 'required|max:100',
            'nama'=>'required|max:100',
            'kategori' => 'required|max:100',
            'kondisi' => 'required|max:100',
            'spesifikasi' => 'required',
            'jenis' => 'required|max:100',
            'pj' => 'required|max:100',
            'keterangan'=>'required',
            ]
        );

        //Memasukkan data dari form registrasi barang ke table permohonan
        DB::insert(
            DB::raw( "INSERT INTO permohonan ( IdPermohonan, NomorSurat, SubjekPermohonan, JenisPermohonan, IdPemohon, StatusPermohonan, TahapPermohonan) VALUES ('$IdPermohonan','$NomorSurat','$SubjekPermohonan',1, '$UserId', 0, 1)"
                )
             );
        
        //Memasukkan data dari form registrasi barang ke table kandidat_barang
        DB::insert(
            DB::raw( "INSERT INTO kandidat_barang(IdKandidatBarang, NamaBarang, KategoriBarang, KondisiBarang, SpesifikasiBarang, Penanggungjawab, JenisBarang, IdPermohonan, KeteranganBarang) VALUES ('$IdKandidatBarang','$NamaBarang', '$KategoriBarang', '$KondisiBarang', '$SpesifikasiBarang','$Penanggungjawab', '$JenisBarang', '$IdPermohonan','$KeteranganBarang')"
                ) 
            );

        //Mengembalikan ke halaman list daftar registrasi barang             
        return redirect('/registrasibarang');
    }

    public function removeRegistrasi(Request $request)
    {
        // get session peminjaman yang mau dibatalkan
        $input = $request->all();
        $hash = $input['Id'];

        // ganti status peminjaman pada database        
        Permohonan::deletePermohonan($hash);
        
        return back();
    }
}
