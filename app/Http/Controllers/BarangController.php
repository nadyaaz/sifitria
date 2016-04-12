<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Barang;
use DB;

class BarangController extends MasterController
{
    public function getBarang()
    {	
    	$allbarang = Barang::all();
  
    	return $this->render('registbarang.barang', 
    		[
    			'title' => 'Daftar Barang',
    			'allbarang' => $allbarang,
    		]
    	);
    }

    public function getCreateBarang()
    {
        return $this->render('registbarang.buatbarang',
            [
                'title' => 'Buat Barang',
            ]
        );  
    }  
    
    public function createBarang(Request $request)
    {
        $input = $request->all();

        $this->validate($request, 
            [
                'namabarang1' => 'required|max:100',                
                'tanggalbeli1' => 'required',
                'penanggungjawab1' => 'required|max:100',
                'kategoribarang1' => 'required|max:100',
                'jenisbarang1' => 'required|max:100',
                'kondisibarang1' => 'required|max:100',
                'spesifikasibarang1' => 'required',
                'keteranganbarang1' => 'required',                                
                'kerusakanbarang1' => 'required',
            ]
        );

        DB::table('barang')->insert(
            [
                'NamaBarang' => $input['namabarang1'],
                'JenisBarang' => $input['jenisbarang1'],
                'SpesifikasiBarang' => $input['spesifikasibarang1'],
                'TanggalBeli' => date('Y-m-d H:i:s', strtotime($input['tanggalbeli2'])),
                'PenanggungJawab' => $input['penanggungjawab1'],
                'KategoriBarang' => $input['kategoribarang1'],
                'KeteranganBarang' => $input['keteranganbarang1'],                
                'WaktuRegistrasi' => data('Y-m-d H:i:s', time()),
                'KerusakanBarang' => $input['kerusakanbarang1'],                
            ]
        );

        return redirect('registrasibarang/barang');
    }  
}
