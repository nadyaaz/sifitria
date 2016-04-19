<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Permohonan extends Model
{
    protected $table = 'PERMOHONAN';

    public static function createPermohonan($data)
    {
        DB::table('permohonan')->insert($data);
    }

    public static function updatePermohonan($hash, $data)
    {
        DB::table('permohonan')->where('hashPermohonan', $hash)->update($data);
    }

    public static function getPeminjaman()
    {
    	$allpermohonan = DB::select(
    		DB::raw(
    			'SELECT * 
    			FROM permohonan p, jadwal j, ruangan r, users u
    			WHERE  
    				p.JenisPermohonan = 1 AND 
    				p.IdRuangan = j.IdRuangan AND 
    				j.IdRuangan = r.IdRuangan AND
                    p.IdGedung = j.IdGedung AND
                    j.IdGedung = r.IdGed AND
                    p.IdJadwal = j.IdJadwal AND 
                    p.IdPemohon = u.NomorInduk AND
                    p.deleted = 0'
    		)
    	);

        $allcatatan = DB::select(
        	DB::raw(
        		'SELECT * 
        		FROM permohonan p, catatan c, users u 
        		WHERE  
        			p.IdPermohonan = c.IdPermohonan AND 
        			c.NomorIndukPenulis = u.NomorInduk'
        	)
        );

        return array(
        	'allpermohonan' => $allpermohonan,
        	'allcatatan' => $allcatatan
        );
    }

    public static function getRegistrasi()
    {
    	// get list registrasi barang
		$allregistrasi = DB::select(DB::raw(
			'SELECT * 
			FROM permohonan p, users u 
			WHERE
				p.JenisPermohonan = 2 AND 
				p.IdPemohon = u.NomorInduk AND
				p.deleted= 0'
		));   

        // get list kandidat barang
        $allkandidat = KandidatBarang::all();

		// get list catatan
		$allcatatan = DB ::select(DB::raw(
			'SELECT *
			FROM catatan c, users u 
			WHERE c.NomorIndukPenulis = u.NomorInduk'
		));

		return array(
			'allregistrasi' => $allregistrasi,
            'allkandidat' => $allkandidat,
			'allcatatan' => $allcatatan,
		);
    }

    public static function updateStatus($id, $persetujuan) 
    {
        if($persetujuan == 'setuju')
            $persetujuan = 2;        
        else
            $persetujuan = 1;        

        DB::update(
            DB::raw(
                "UPDATE PERMOHONAN 
                SET StatusPermohonan = $persetujuan
                WHERE IdPermohonan = $id"
            )
        );
    }

	public static function deletePermohonan($hash) 
    {
		// ganti status peminjaman pada database        
        DB::table('permohonan')->where('hashPermohonan', $hash)->update(['deleted' => 1]);
	}
}
