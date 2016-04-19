<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Jadwal;
use App\Gedung;
use DB;
use Input;

class JadwalController extends MasterController
{       
    public function getJadwal()
    {
    	$allgedung = Gedung::all();
    	$allruangan = DB::select(
            DB::raw(
                'SELECT *
                FROM ruangan r, gedung g
                WHERE r.IdGed = g.IdGedung'
            )
        );

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
            $query = 
                'SELECT * 
                FROM jadwal j, ruangan r, gedung g 
                WHERE 
                    j.IdRuangan = r.IdRuangan AND
                    j.IdGedung = r.IdGed AND
                    r.IdGed = g.IdGedung';
    		
            $params;
            $qstring = parse_str($_SERVER['QUERY_STRING'], $params);

            $jadwalarr = array();

            if (isset($params['jenisruang'])) {
                $query = $query.' AND r.JenisRuangan = "'.$params['jenisruang'].'"';
            }

            if(isset($params['nomorruang'])) {
                if($params['nomorruang'] != '') $query = $query.' AND r.NomorRuangan = "'.$params['nomorruang'].'"';
            }

            // get jadwal data
            $alljadwal = DB::select(DB::raw($query));

            foreach ($alljadwal as $jadwal) {
                $jsonarr = [
                    'title' => $jadwal->KeperluanPeminjaman.' ('.str_replace('Gedung ', '', $jadwal->Nama).$jadwal->NomorRuangan.')',
                    'start' => str_replace(' ', 'T', $jadwal->WaktuMulai),
                    'end'   => str_replace(' ', 'T', $jadwal->WaktuSelesai),
                    'tooltip' => $jadwal->KeperluanPeminjaman.' ('.str_replace('Gedung ', '', $jadwal->Nama).$jadwal->NomorRuangan.')'
                ];

                array_push($jadwalarr, $jsonarr);                
            }
            
    		// return jadwal JSON object
    		return json_encode($jadwalarr);
    	}    	
    }
}
