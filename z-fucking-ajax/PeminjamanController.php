<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use App\Permohonan;
use App\Ruangan;
use App\Jadwal;
use Input;

class PeminjamanController extends MasterController
{
    public function dashboard()
    {    	
        $peminjaman = Permohonan::getPeminjaman();

    	return $this->render('pinjamruang.dashboard',
    		[
    			'title' => 'Dashboard Peminjaman Ruangan',
    			'allpermohonan' => $peminjaman['allpermohonan'],
    			'allcatatan' => $peminjaman['allcatatan'],
    		]
    	);	
    }

    public function removePeminjaman(Request $request)
    {
    	// get session peminjaman yang mau dibatalkan
        $input = $request->all();
        $inputs = $input['Id'];

    	// ganti status peminjaman pada database
        DB::update(
        	DB::raw(
        		"UPDATE PERMOHONAN 
        		SET deleted = 1 
        		WHERE IdPermohonan = $inputs"
        	)
        );
    	
        return back();
    }

    public function getPeminjamanRuangan()
    {
        return $this->render('pinjamruang.buat_peminjaman_ruangan',
            [
                'title' => '',
            ]
        );
    }

    public function buatPeminjamanRuanganPost(Request $request)
    {
               

        if($request->ajax()) {
            $input = $request->all();

            
            $jenisRuangan = $request->input('jenisRuangan');
            $tanggal = $request->input('tanggal');
            $waktuMulai = $request->input('waktuMulai');
            $waktuSelesai = $request->input('waktuSelesai');

            $waktuMulainya = strtotime("$tanggal.$waktuMulai");
            $timestampWaktuMulai =date(' Y\-m\-d  H:i:s', $waktuMulainya);
            
            $waktuSelesainya = strtotime("$tanggal.$waktuSelesai");
            $timestampWaktuSelesai = date(' Y\-m\-d  H:i:s', $waktuSelesainya);

            $ruanganAvailable = DB::select(
                DB::raw( "SELECT * 
                                             FROM Ruangan a, Jadwal b 
                                             WHERE a.JenisRuangan='$jenisRuangan' AND a.IdRuangan=b.IdRuangan                                         "
                                             )
                                            );

            // foreach($ruanganAvailable['waktuMulai'] as $waktu ) {
            // //     foreach($allRuanganAvailable['waktuSelesai'] as $waktu2) {
            // //         // $datawaktumulai = strtotime($waktu);
            // //         // $datawaktuselesai = strtotime($waktu2);

            // //         // $date = new DateTime();

            // //         // $waktusekarang = strtotime($date);
            // //         // $ruangantersedia = array();

            // //         //Kalau waktu mulai jadwal yang udah ada lebih lama dari waktu sekarang 
            // //         // if( !($datawaktumulai  < $waktusekarang) ){
            // //         //     //diambil datanya
            // //         //     array_push($ruangantersedia, $ruanganAvailable);
            // //         // }
            // //     }
            // }

            // return json_encode($ruangantersedia);
        }

       

        return json_encode($jenisRuangan);



        // $allRuanganAvailable = DB::select( "SELECT * 
        //                                  FROM Ruangan a, Jadwal b 
        //                                  WHERE a.JenisRuangan='$jenisRuangan' AND a.IdRuangan=b.IdRuangan AND b.waktuMulai NOT BETWEEN '$timestampWaktuMulai' AND '$timestampWaktuSelesai' AND b.waktuSelesai NOT BETWEEN'$timestampWaktuMulai' AND '$timestampWaktuSelesai'
        //                                  "
        //                                 );
        

        // $ruangan = Ruangan::all()->where('jenisRuangan',$jenisRuangan);
        // $jadwalAvailable = Jadwal::all()
        //                         ->where('waktuMulai',$timestampWaktuMulai)
        //                         ->andWhere('waktuSelesai', $timestampWaktuSelesai)
        //                         ->andWhere('idRuangan',$ruangan->idRuangan)
        //                         ->get();

        // $allRuanganAvailable = Ruangan::all()->where('idRuangan',$jadwalAvailable->idRuangan);


        
        // $data = [ 'ruangan' => $ruangan, 'tanggal' => $tanggal, 'waktuMulai' => $waktuMulai, 'waktuSelesai' => $waktuSelesai, 'allRuanganAvailable' => $allRuanganAvailable];

        

   
        
        // return $this->render('pinjamruang.buat_peminjaman_ruangan_2',
        //     [
        //         'title' => '',
        //         'allRuanganAvailable' => $allRuanganAvailable,
        //     ]
        //     );
           
            
    }

    public function getFormDetailPeminjamanRuangan()
    {
        return $this->render('pinjamruang.buat_peminjaman_ruangan_2',
            [
                'title' => '',
                'allRuanganAvailable' => $allRuanganAvailable,
            ]
        );
    }

      public function buatPeminjamanRuangan2Post(Request $request)
    {

        $input = $request->all();


        $subjek = $input['subjek'];
        $keperluan = $input['keperluan'];
        $catatan = $input['catatan'];

       //  Permohonan::createPermohonan($subjek,$ruangan,$jadwal);
       //  Jadwal::createJadwal($keperluan);
       //  Catatan::createCatatan($catatan);

    DB::insert(
        DB::raw( "INSERT INTO barang (WaktuPermohonan, SubjekPermohonan, IdPemohon, IdRuangan, IdJadwal, TahapPermohonan, StatusPermohonan) VALUES (','$subjek', '$', '$', '$','0', '0')"
            )
        ); 



       //  $data = [ 'name' => $subjek, 'email' => $keperluan, 'gender' => $catatan ];

       // return View::make('buat_peminjaman_ruangan');


        return back();
    }



}





