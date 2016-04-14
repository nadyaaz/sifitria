<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Jadwal;
use DB;
use FullCal;

class JadwalController extends MasterController
{       
    public function getJadwal()
    {
    	$allgedung = DB::table('ruangan')->select('Gedung')->distinct()->get();
    	$allruangan = DB::table('ruangan')->select('Gedung', 'NomorRuangan')->get();

    	return $this->render('pinjamruang.jadwal',
    		[
    			'title' => 'Jadwal Ruangan',
    			'allgedung' => $allgedung,
    			'allruangan' => $allruangan,
    		]
    	);
    }

    public function getCreateJadwal()
    {
    	return $this->render('pinjamruang.buatjadwal',
    		[
    			'title' => 'Buat Jadwal Ruangan',
    		]
    	);
    }
    
    public function getJadwalAJAX(Request $request)
    {
    	// check if request is AJAX, if it's not ignore
    	if ($request->ajax()) {
    		$queryrequest = $request->fullUrl();

    		$jadwalarr = array();

    		// get jadwal data
    		$alljadwal = DB::select(DB::raw(
    			'SELECT *
    			FROM jadwal j, ruangan r 
    			WHERE
    				j.IdRuangan = r.IdRuangan'
    		));

    		foreach ($alljadwal as $jadwal) {
    			$jsonarr = [
    				'title' => $jadwal->KeperluanPeminjaman.' ('.$jadwal->Gedung.$jadwal->NomorRuangan.')',
		            'start' => str_replace(' ', 'T', $jadwal->WaktuMulai),
		            'end'	=> str_replace(' ', 'T', $jadwal->WaktuSelesai),
		            'color'	=> '#673AB7',
    			];

    			array_push($jadwalarr, $jsonarr);
    		}

            array_push($jadwalarr, $request->input('name'));
            array_push($jadwalarr, $request->input('major'));

    		// return jadwal JSON object
    		return json_encode($jadwalarr);
    	}    	
    }
}
