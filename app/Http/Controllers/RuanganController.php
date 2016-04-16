<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Ruangan;
use App\Gedung;
use App\Master;
use Validator;
use DB;

class RuanganController extends MasterController
{
    public function getRuangan()
    {
        // get list ruangan dan jadwal pada database
        $allgedung = Gedung::all();
    	$allruangan = DB::select(
            DB::raw(
                'SELECT *
                FROM ruangan r, gedung g 
                WHERE r.IdGed = g.IdGedung'
            )
        );        

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
        // get all gedung object
        $allgedung = Gedung::getAll();

        // render buat ruangan view
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
                'nomorruangan' => 'required|min:4|max:4',
                'gedungruangan' => 'required',
                'jenisruangan' => 'required',
                'kapasitasruangan' => 'required|numeric'
            ]
        );

        $input = $request->all();        
        $lastId = Master::getLast('ruangan', 'IdRuangan', ['IdGed' => $input['gedungruangan']])->IdRuangan;
        $IdRuangan = $lastId + 1;
        $NomorRuangan = $input['nomorruangan'];
        $JenisRuangan = $input['jenisruangan'];

        DB::table('ruangan')->insert(
            [
                'IdGed' => $input['gedungruangan'],
                'IdRuangan' => $IdRuangan,
                'NomorRuangan' => $NomorRuangan,
                'KapasitasRuangan' => $input['kapasitasruangan'],
                'JenisRuangan' => $JenisRuangan,
                'hashRuang' => md5($IdRuangan.$NomorRuangan.$JenisRuangan),
            ]
        );
    }
}
