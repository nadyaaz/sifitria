<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class JadwalController extends MasterController
{
    public function getJadwal()
    {
    	return $this->render('pinjamruang.jadwal',
    		[
    			'title' => 'Jadwal Ruangan',
    		]
    	);
    }
}
