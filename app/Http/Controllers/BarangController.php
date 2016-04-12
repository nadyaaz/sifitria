<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Barang;
use DB;
use Validator;

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

        $this->validate($request, 
            [
                'namabarang.*' => 'required|max:100',                
                'tanggalbeli.*' => 'required',
                'penanggungjawab.*' => 'required|max:100',
                'kategoribarang.*' => 'required|max:100',
                'jenisbarang.*' => 'required|max:100',
                'kondisibarang.*' => 'required|max:100',
                'spesifikasibarang.*' => 'required',
                'keteranganbarang.*' => 'required',                                
                'kerusakanbarang.*' => 'required',
            ]
        );

        $input = $request->all();

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
