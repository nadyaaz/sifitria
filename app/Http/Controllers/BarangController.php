<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Barang;
use App\Permohonan;

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
}
