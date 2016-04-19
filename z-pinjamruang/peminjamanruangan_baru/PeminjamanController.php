<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use App\Permohonan;
use App\Ruangan;
use App\Jadwal;
use Input;
use Carbon\Carbon;

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
        $params;
        $qstring = parse_str($_SERVER['QUERY_STRING'], $params);
        
            $jenisRuangan= $params['jenisRuangan'];
            $tanggal = $params['tanggal'];
            $waktuMulai = $params['waktuMulai'];
            $waktuSelesai = $params['waktuSelesai'];

            $waktuMulainya = strtotime($tanggal.$waktuMulai);
            $timestampWaktuMulai =date('Y\-m\-d  H:i:s', $waktuMulainya);
            
            $waktuSelesainya = strtotime($tanggal.$waktuSelesai);
            $timestampWaktuSelesai = date('Y\-m\-d  H:i:s', $waktuSelesainya);

                $semuaRuangan = DB::select(
                    DB::raw( "SELECT * 
                                FROM Ruangan a, Gedung c
                                WHERE a.JenisRuangan='$jenisRuangan' AND c.IdGedung=a.IdGedung"    
                                     )
                                    );
                
                $ruangantersedia = array();

                foreach($semuaRuangan as $ruangan ) {
                    
                    $IdGedung=$ruangan->IdGedung;
                    $IdRuangan=$ruangan->IdRuangan;

                    $jadwalRuangan = DB::select(DB::raw("SELECT * 
                                                         FROM jadwal
                                                         WHERE IdGedung = '$IdGedung' AND
                                                                IdRuangan = '$IdRuangan' "));

                        if ($jadwalRuangan == null){
                            array_push($ruangantersedia, $ruangan);
                        }

                        else{

                            foreach($jadwalRuangan as $jadwal){
                                
                                $datawaktumulai=strtotime($jadwal->WaktuMulai);

                                $datawaktuselesai = strtotime($jadwal->WaktuSelesai);

                                $current_time = Carbon::now();

                                $waktusekarang = strtotime($current_time);

                                //Kalau waktu mulai jadwal yang udah ada lebih lama dari waktu sekarang 
                                if( !($datawaktumulai  < $waktusekarang && $datawaktuselesai < $waktusekarang))
                                {
                                    if( ($waktuMulainya > $datawaktuselesai || $waktuMulainya < $datawaktumulai) && ($waktuSelesainya > $datawaktuselesai || $waktuSelesainya < $datawaktumulai) )
                                    {
                                        array_push($ruangantersedia, $ruangan); 
                                    }
                                }   
                            }

                            
                            
                        }   
                         
                    }

                return json_encode($ruangantersedia); 

                     


                // if($ruanganAvailable==null){
                   

                //     return json_encode($semuaRuangan);


                // }
                    
                // else{
                //     f
                // }
     
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
        $ruangan = $input['ruangandipilih'];
        $user = $input['pemohon'];
        $subjek = $input['subjek'];
        $keperluan = $input['keperluan'];
        $catatan = $input['catatan'];
        $tanggal = $input['tanggal'];
            $waktuMulai = $input['waktuMulai'];
            $waktuSelesai = $input['waktuSelesai'];

            $waktuMulainya = strtotime($tanggal.$waktuMulai);
            $timestampWaktuMulai =date('Y\-m\-d  H:i:s', $waktuMulainya);
            
            $waktuSelesainya = strtotime($tanggal.$waktuSelesai);
            $timestampWaktuSelesai = date('Y\-m\-d  H:i:s', $waktuSelesainya);

            $arrayruangan=explode(".", $ruangan);
             $IdGedung=$arrayruangan[0];
            $IdRuangan=$arrayruangan[1];

            $permohonanTerakhir = DB::table('permohonan')->orderBy('IdPermohonan', 'desc')->first();
            $IdPermohonan = $permohonanTerakhir->IdPermohonan + 1;

            $jadwalTerakhir = DB::table('jadwal')->where('IdGedung', $IdGedung)->where('IdRuangan', $IdRuangan)->orderBy('IdJadwal', 'desc')->first();

            if($jadwalTerakhir ==  null){
                $IdJadwal = 1;
            }
            else{
                $IdJadwal = $jadwalTerakhir->IdJadwal + 1;
            }


DB::insert(
        DB::raw( "INSERT INTO jadwal (IdGedung, IdRuangan, IdJadwal, WaktuMulai, waktuSelesai, keperluanPeminjaman) VALUES ('$IdGedung','$IdRuangan', '$IdJadwal', '$timestampWaktuMulai', '$timestampWaktuSelesai', '$keperluan')"
            )
        ); 


    DB::insert(
        DB::raw( "INSERT INTO permohonan (IdPermohonan, SubjekPermohonan, IdPemohon, IdGedung, IdRuangan, IdJadwal, JenisPermohonan) VALUES ('$IdPermohonan','$subjek', '$user', '$IdGedung', '$IdRuangan','$IdJadwal',1)"
            )
        ); 

       DB::insert(
        DB::raw( "INSERT INTO catatan (IdPermohonan, TahapCatatan, DeskripsiCatatan, NomorIndukPenulis) VALUES ('$IdPermohonan', 1, '$catatan', '$user')"
            )
        ); 

       return redirect('pinjamruang');
    }
}





