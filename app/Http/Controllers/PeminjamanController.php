<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Permohonan;
use App\Catatan;
use DB;
use Carbon\Carbon;

class PeminjamanController extends MasterController
{
    /**
     * Get dashoard permohonan peminjaman ruangan view
     * @return dashboard page
     */
    public function dashboard()
    {
        // check if user permitted        
        if (!($this->isPermitted('pinjamruang'))) return redirect('/');    

		// get permohonan peminjaman ruangan data
        $peminjaman = Permohonan::getPeminjaman();

		// render peminjaman ruangan dashboard
    	return $this->render('pinjamruang.dashboard',
    		[
    			'title' => 'Dashboard Peminjaman Ruangan',
    			'allpermohonan' => $peminjaman['allpermohonan'],
    			'allcatatan' => $peminjaman['allcatatan'],
    		]
    	);	
    }

    /**
     * Get create permohonan peminjaman ruangan page
     * @return buatpinjam page
     */
    public function getCreatePeminjaman()
    {
        // check if user permitted        
        // if (!($this->isPermitted('buatpinjam'))) return redirect('/');    

        return $this->render('pinjamruang.buatpeminjaman',
            [
                'title' => 'Buat Permohonan Peminjaman Ruangan',
            ]
        );
    }

    /**
     * Get ruangan available through AJAX request
     * @param  Request $request Request object
     * @return JSON
     */
    public function getRuanganAvailableAJAX(Request $request)
    {
        $params;

        // get all query string variable passed
        $qstring = parse_str($_SERVER['QUERY_STRING'], $params);

        $jenisRuangan= $params['jenisRuangan'];
        $tanggal = $params['tanggal'];
        $waktuMulai = $params['waktuMulai'];
        $waktuSelesai = $params['waktuSelesai'];
        $waktuMulainya = strtotime($tanggal.$waktuMulai);
        $timestampWaktuMulai = date('Y\-m\-d  H:i:s', $waktuMulainya);
        $waktuSelesainya = strtotime($tanggal.$waktuSelesai);
        $timestampWaktuSelesai = date('Y\-m\-d  H:i:s', $waktuSelesainya);

        $allruangan = DB::select(DB::raw(
            'SELECT * 
            FROM Ruangan r, Gedung g
            WHERE 
                r.JenisRuangan="'.$jenisRuangan.'" AND 
                r.IdGed=g.IdGedung'
        ));

        
        $ruangantersedia = array();

        foreach($allruangan as $ruangan) {
            
            $IdGedung = $ruangan->IdGedung;
            $IdRuangan = $ruangan->IdRuangan;

            $jadwalRuangan = DB::select(DB::raw(
                'SELECT * 
                FROM jadwal
                WHERE 
                    IdGedung = "'.$IdGedung.'" AND
                    IdRuangan = "'.$IdRuangan.'"'
            ));


            if ($jadwalRuangan == null) {
                array_push($ruangantersedia, $ruangan);
            } else {

                foreach($jadwalRuangan as $jadwal){
                    
                    $datawaktumulai = strtotime($jadwal->WaktuMulai);
                    $datawaktuselesai = strtotime($jadwal->WaktuSelesai);
                    $waktusekarang = strtotime(Carbon::now());
                    // dd($waktusekarang);

                    //Kalau waktu mulai jadwal yang udah ada lebih lama dari waktu sekarang 
                    if( !($datawaktumulai < $waktusekarang && $datawaktuselesai < $waktusekarang) )
                    {
                        if( ($waktuMulainya > $datawaktuselesai || $waktuMulainya < $datawaktumulai) && 
                            ($waktuSelesainya > $datawaktuselesai || $waktuSelesainya < $datawaktumulai)
                        ) 
                        {
                            array_push($ruangantersedia, $ruangan); 
                        }
                    }   
                }
            }                    
        }

        return json_encode($ruangantersedia); 
    }

    /**
     * Soft-delete permohonan peminjaman ruangan
     * set 'deleted' column to
     * @param  Request $request Request object
     * @return redirect to pinjamruang
     */
    public function removePeminjaman(Request $request)
    {
    	// ganti status peminjaman pada database
        Permohonan::deletePermohonan($request->input('hashPermohonan'));
    	
		// redirect back to peminjaman dashboard
        return redirect('pinjamruang');
    }

    /**
     * [setuju description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function setuju(Request $request)
    {
        // get session peminjaman yang mau dibatalkan
        $input = $request->all();

        // get all data
        $id = $input['Id'];
        $catatan = $input['catatan_txtarea'];
        $user_id = $input['UserId'];
        $persetujuan = $input['persetujuan'];

        // incrementing Id
        $tahap_catatan = Catatan::getIncrementedTahapCatatan();

        // insert new record to database
        Catatan::createCatatan($id, $tahap_catatan, $catatan, $user_id);

        // update record's status
        Permohonan::updateStatus($id, $persetujuan);
        
        return back();
    }  
}
