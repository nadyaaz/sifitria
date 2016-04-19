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
    /**
     * Get Jadwal view
     * @return jadwal view
     */
    public function getJadwal()
    {
        // check if user permitted        
        if (!($this->isPermitted('jadwal'))) return redirect('/');    

        // get all gedung 
    	$allgedung = Gedung::all();

        // get all ruangan
    	$allruangan = DB::select(
            DB::raw(
                'SELECT *
                FROM ruangan r, gedung g
                WHERE r.IdGed = g.IdGedung'
            )
        );

        // return jadwal view
    	return $this->render('pinjamruang.jadwal',
    		[
    			'title' => 'Jadwal Ruangan',
    			'allgedung' => $allgedung,
    			'allruangan' => $allruangan,
    		]
    	);
    }

    /**
     * Get create jadwal view
     * @return buatjadwal view
     */
    public function getCreateJadwal()
    {
        // check if user permitted        
        if (!($this->isPermitted('buatjadwal'))) return redirect('/');    

        // return buatjadwal view
    	return $this->render('pinjamruang.buatjadwal',
    		[
    			'title' => 'Buat Jadwal Ruangan',
    		]
    	);
    }
    
    /**
     * Get jadwal AJAX to feed fullCalendar object
     * @param  Request $request Request object
     * @return JSON             JSON Objetc to feed fullCalendar
     */
    public function getJadwalAJAX(Request $request)
    {
    	// check if request is AJAX, if it's not ignore
    	if ($request->ajax()) {

            // default query
            $query = 
                'SELECT * 
                FROM jadwal j, ruangan r, gedung g 
                WHERE 
                    j.IdRuangan = r.IdRuangan AND
                    j.IdGedung = r.IdGed AND
                    r.IdGed = g.IdGedung';
    		
            $params;
            $jadwalarr = array();

            // get query string parameters
            $qstring = parse_str($_SERVER['QUERY_STRING'], $params);

            // check if parameters jenis ruang is available
            if (isset($params['jenisruang'])) {
                // append query JenisRuangan to default query
                $query = $query.' AND r.JenisRuangan = "'.$params['jenisruang'].'"';
            }

            // check if parameters nomorruang is available
            if(isset($params['nomorruang'])) {
                // append query NomorRuangan to default query
                if($params['nomorruang'] != '') $query = $query.' AND r.NomorRuangan = "'.$params['nomorruang'].'"';
            }

            // get jadwal data
            $alljadwal = DB::select(DB::raw($query));

            // push all jadwal to array
            foreach ($alljadwal as $jadwal) {
                $jsonarr = [
                    'title' => $jadwal->KeperluanPeminjaman.' ('.str_replace('Gedung ', '', $jadwal->Nama).$jadwal->NomorRuangan.')',
                    'start' => str_replace(' ', 'T', $jadwal->WaktuMulai),
                    'end'   => str_replace(' ', 'T', $jadwal->WaktuSelesai),
                    'tooltip' => $jadwal->KeperluanPeminjaman.' ('.str_replace('Gedung ', '', $jadwal->Nama).$jadwal->NomorRuangan.')'
                ];

                // push
                array_push($jadwalarr, $jsonarr);                
            }
            
    		// return jadwal JSON object from jadwal array
    		return json_encode($jadwalarr);
    	}    	
    }
}
