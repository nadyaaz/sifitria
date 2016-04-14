<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Barang;
use App\Permohonan;
use DB;
use validator;

class BarangController extends MasterController
{
	//Melihat list barang terdaftar
	public function getBarang()
	{	
		//get list registrasi
		$allbarang = Barang::all();
  
		//render view melihat list barang terdaftar
		return $this->render('registbarang.barang', 
			[
				'title' => 'Daftar Barang',
				'allbarang' => $allbarang,
			]
		);

	}
	
	//Membuat barang 
	public function CreateBarang (Request $databarang)
	{
		$input = $databarang -> all();
		$IdBarang = $input['id'];
		$NamaBarang = $input['nama'];
		$KategoriBarang = $input['kategori'];
		$KondisiBarang = $input ['kondisi'];
		$SpesifikasiBarang= $input ['spesifikasi'];
		$Penanggungjawab = $input ['pj'];
		$KeteranganBarang = $input ['ket'];
		$KerusakanBarang = $input ['rusak'];
   
   //Memvalidasi isian form membuat barang
	$this->validate ($databarang,          
			['nama'=>'required|max:100',
			'kategori' => 'required|max:100',
			'kondisi' => 'required|max:100',
			'spesifikasi' => 'required',
			'pj' => 'required|max:100',
			'ket'=>'required',
			]
		 );
	
	//Memasukkan data dari form pembuatan barang ke table barang
	DB::insert(
		DB::raw( "INSERT INTO barang (IdBarang, NamaBarang, KategoriBarang, KondisiBarang, SpesifikasiBarang, Penanggungjawab, KeteranganBarang, KerusakanBarang) VALUES (' $IdBarang','$NamaBarang', '$KategoriBarang', '$KondisiBarang', '$SpesifikasiBarang','$Penanggungjawab', '$KeteranganBarang', '$KerusakanBarang')"
			)
		); 
	//Mengembalikan ke halaman sebelumnya
	return back();
	}

	//Menampilkan halaman untuk membuat barang
	public function getCreateBarang (Request $databarang)
	{
		// render view melihat halaman pembuatan barang
		return $this->render('registbarang.buatbarang', 
			[
				'title' => 'Buat Barang',
			]
		);
	}
}
