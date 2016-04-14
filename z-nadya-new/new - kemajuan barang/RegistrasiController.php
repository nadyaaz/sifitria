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
	// Melihat list permohonan registrasibarang 
	public function dashboard()
	{  
		// get list barang
		$registrasi = Permohonan::getRegistrasi();

		// render view melihat list barang permohonan registrasi barang
		return $this->render('registbarang.dashboard',
			[
				'title' => 'Dashboard Registrasi Barang',
				'daftarregis' => $registrasi['daftarregis'],
				'regiscatatan' => $registrasi['regiscatatan'],
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

	//Menampilkan halaman untuk membuat permohonan registasi
	 public function getCreateRegistrasi (Request $regbarang)
	{
		// render view melihat halaman pembuatan permohonan registrasi barang
		return $this->render('registbarang.buatregistrasi', 
			[
				'title' => 'Buat Registrasi Barang',
			]
		);
	}

	//Menghapus permohonan registrasi barang
	 public function removePeminjaman(Request $request)
	{
		// get session peminjaman yang mau dibatalkan
		$input = $request->all();
		$inputs = $input['Id'];

		// ganti status peminjaman pada database
		DB::update(
			DB::raw(
				"UPDATE PERMOHONAN 
				SET deleted = 1 
				WHERE IdPermohonan = $inputs"
			)
		);
		
		return back();
	}
}

	// public function setuju(Request $request)
	// {       
	//     // get session peminjaman yang mau dibatalkan
	//     $input = $request->all();

	//     // get all data
	//     $id = $input['Id'];
	//     $catatan = $input['catatan_txtarea'];
	//     $user_id = $input['UserId'];
	//     $persetujuan = $input['persetujuan'];

	//     // determining tahap_catatan
	//     $catatan_terakhir = Catatan::getCatatanTerakhir();
	//     $tahap_catatan = $catatan_terakhir->TahapCatatan + 1;

	//     if($catatan != ''){
	//         DB::insert(
	//             DB::raw(
	//                 "INSERT INTO catatan (IdPermohonan, TahapCatatan, DeskripsiCatatan, NomorIndukPenulis) 
	//                 VALUES ($id, $tahap_catatan, '$catatan', '$user_id')"
	//             )
	//         );
	//     }

	//     if($persetujuan == 'setuju'){
	//         $persetujuan = 2;
	//     }
	//     else{
	//         $persetujuan = 1;
	//     }

	//     DB::update(
	//         DB::raw(
	//             "UPDATE PERMOHONAN 
	//             SET StatusPermohonan = $persetujuan
	//             WHERE IdPermohonan = $id"
	//         )
	//     );
		
	//     return back();
	// }
