<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Ruangan;
use App\Jadwal;

class RuanganController extends MasterController
{
    public function getRuangan()
    {
        // get list ruangan pada database
    	$allruangan = Ruangan::all()->where('deleted',0);
        $alljadwal = Jadwal::all();

    	return $this->render('pinjamruang.ruangan',
    		[
    			'title' => 'Daftar Ruangan',
    			'allruangan' => $allruangan,
    			'alljadwal' =>$alljadwal
    		]
    	);
    }
}
