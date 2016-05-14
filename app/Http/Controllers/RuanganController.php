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
        // check if user permitted        
        if (!($this->isPermitted('ruangan'))) return redirect('pinjamruang');

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
    }

    public function getCreateRuangan()
    {
        // check if user permitted        
        if (!($this->isPermitted('buatruangan'))) return redirect('pinjamruang/ruangan');

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

    public function updateRuangan(Request $request, $hashRuang ='')
    {
        // check if user permitted        
        if (!($this->isPermitted('updateruangan'))) return redirect('pinjamruang/ruangan');

        if ($hashRuang == '') return redirect('pinjamruang/ruangan');

        if ($request->isMethod('POST')) {
            // form validation
            $this->validate($request,
                [
                    'nomorruangan' => 'required|min:4|max:4',
                    'jenisruangan' => 'required',                
                    'kapasitasruangan' => 'required|numeric'
                ]
            );

            $ruangan = Ruangan::where('hashRuang', $hashRuang)->first();
            $gedungruangan = Gedung::where('IdGedung', $ruangan->IdGed)->first();
            $allruangan = Ruangan::where('IdGed', $gedungruangan->IdGedung)->get();

            // check if NamaGedung is exist in selected gedung
            foreach($allruangan as $ruangan) {                
                if (strtolower($ruangan->NomorRuangan) == strtolower($request->input('nomorruangan'))) {
                    $request->session()->flash('error_ruangan', 'Nama ruangan sudah ada pada gedung yang sama. Silakan ganti dengan nama lain.');
                    return back();
                }
            }            

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
        } else {            

            // get all gedung object
            $allgedung = Gedung::getAllGedung();

            // get ruangan selected
            $ruangan = Ruangan::where('hashRuang', $hashRuang)->get();

            // render buat ruangan view
            return $this->render('pinjamruang.updateruangan',
                [
                    'title' => 'Buat Ruangan',
                    'allgedung' => $allgedung,
                    'ruangan' => $ruangan
                ]
            ); 
        }
    }

    public function createRuangan(Request $request)
    {
        // check if user permitted        
        if (!($this->isPermitted('buatruangan'))) return redirect('pinjamruang/ruangan');

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
        $gedung = Gedung::where([
            ['hash', $input['gedungruangan']],
            ['deleted', 0],
        ])->first();

        $allruangan = Ruangan::where('IdGed', $gedung->IdGedung)->get();
        
        // check if NamaGedung is exist
        foreach($allruangan as $ruangan) {
            if (strtolower($ruangan->NomorRuangan) == strtolower($request->input('nomorruangan'))) {
                $request->session()->flash('error_ruangan', 'Nomor ruangan sudah ada. Silakan ganti dengan nama lain.');
                return back();
            }
        }
        
        // get ruangan last object
        $lastObjId = Master::getLastId('ruangan', 'IdRuangan', [['IdGed', '=', $gedung->IdGedung]]);
        $IdRuangan = $lastObjId + 1;

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
        // check if user permitted        
        if (!($this->isPermitted('updateruangan'))) return redirect('pinjamruang/ruangan');

        // set ruangan to deleted
        Ruangan::removeRuangan($request->input('hash'));

        // return to gedung list
        return redirect('pinjamruang/ruangan');
    }
}
