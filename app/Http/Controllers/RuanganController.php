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
    public function getRuangan(Request $request)
    {
        if(!$request->isMethod('POST')) {
            // get list gedung dan ruangan pada database
            $allgedung = Gedung::getAllGedung();
        	$allruangan = Ruangan::getAllRuangan();        

    		// render ruangan view
        	return $this->render('pinjamruang.ruangan',
        		[
        			'title' => 'Daftar Ruangan',
        			'allruangan' => $allruangan,
        			'allgedung' => $allgedung
        		]
        	);
        } else {
            // get ruangan selected
            $ruangan = Ruangan::where('hashRuang', $request->input('hash'))->get();

            //set session
            session(['ruangan' => $ruangan]);

            // redirect with data
            return redirect('pinjamruang/ruangan/ubah');
        }
    }

    public function getCreateRuangan()
    {
        // get all gedung object
        $allgedung = Gedung::getAllGedung();

        // render buat ruangan view
        return $this->render('pinjamruang.buatruangan',
            [
                'title' => 'Buat Ruangan',
                'allgedung' => $allgedung,
            ]
        );  
    }

    public function getUpdateRuangan()
    {  
        // get all gedung object
        $allgedung = Gedung::getAllGedung();

        // get ruangan selected
        $ruangan = session('ruangan');

        // render buat ruangan view
        return $this->render('pinjamruang.updateruangan',
            [
                'title' => 'Buat Ruangan',
                'allgedung' => $allgedung,
                'ruangan' => $ruangan
            ]
        );  
    }

    public function updateRuangan(Request $request)
    {
        // form validation
        $this->validate($request,
            [
                'nomorruangan' => 'required|min:4|max:4',
                'jenisruangan' => 'required',                
                'kapasitasruangan' => 'required|numeric'
            ]
        );            

        // insert data to table
        Ruangan::updateRuangan($request->input('hash'),
            [                
                'JenisRuangan' => $request->input('jenisruangan'),                
                'NomorRuangan' => $request->input('nomorruangan'),
                'KapasitasRuangan' => $request->input('kapasitasruangan'),                
            ]
        );

        // redirect to ruangan view
        return redirect('pinjamruang/ruangan');
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

        // get all request
        $input = $request->all();        

        // get gedung object selected
        $gedung = Gedung::where('hash', '=', $input['gedungruangan'])->first();
        
        // get ruangan last object
        $lastObj = Master::getLast('ruangan', 'IdRuangan', [['IdGed', '=', $gedung->IdGedung]]);
        
        // check if last object is null or not
        if($lastObj == null) $IdRuangan = 1;
        else $IdRuangan = $lastObj->IdRuangan + 1;

        $NomorRuangan = $input['nomorruangan'];
        $JenisRuangan = $input['jenisruangan'];

        // insert data to table
        Ruangan::createRuangan(
            [
                'IdGed' => $gedung->IdGedung,
                'IdRuangan' => $IdRuangan,
                'NomorRuangan' => $NomorRuangan,
                'KapasitasRuangan' => $input['kapasitasruangan'],
                'JenisRuangan' => $JenisRuangan,
                'hashRuang' => md5($IdRuangan.$NomorRuangan.$JenisRuangan),
            ]
        );

        return redirect('pinjamruang/ruangan');
    }

    public function removeRuangan(Request $request)
    {
        // set ruangan to deleted
        Ruangan::removeRuangan($request->input('hash'));

        // return to gedung list
        return redirect('pinjamruang/ruangan');
    }
}
