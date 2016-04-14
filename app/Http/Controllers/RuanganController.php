<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Ruangan;
use App\Jadwal;
use Validator;
use DB;

class RuanganController extends MasterController
{
    public function getRuangan()
    {
        // get list ruangan dan jadwal pada database
        $allgedung = DB::table('ruangan')->select('Gedung')->distinct()->get();
    	$allruangan = Ruangan::all()->where('deleted',0);        

		// render ruangan view
    	return $this->render('pinjamruang.ruangan',
    		[
    			'title' => 'Daftar Ruangan',
    			'allruangan' => $allruangan,
    			'allgedung' => $allgedung
    		]
    	);
    }

    public function getCreateRuangan()
    {
        $allgedung = DB::table('ruangan')->select('Gedung')->distinct()->get();
        return $this->render('pinjamruang.buatruangan',
            [
                'title' => 'Buat Ruangan',
                'allgedung' => $allgedung,
            ]
        );  
    }

    public function createRuangan(Request $request)
    {
        $this->validate($request,
            [
                'nomorruangan' => 'required|max:3',
                'gedungruangan' => 'required|max:1',
                'jenisruangan' => 'required',
                'kapasitasruangan' => 'required|numeric'
            ]
        );

        $input = $request->all();

        DB::table('ruangan')->insert(
            [
                'Gedung' => $input['gedungruangan'],
                'NomorRuangan' => $input['nomorruangan'],
                'KapasitasRuangan' => $input['kapasitasruangan'],
                'JenisRuangan' => $input['jenisruangan'],                
            ]
        );
    }
}
