<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Permohonan extends Model
{
    protected $table = 'PERMOHONAN';

    public static function getPeminjaman()
    {
    	$allpermohonan = DB::select(
    		DB::raw(
    			"SELECT * 
    			FROM permohonan p, jadwal j, ruangan r, users u
    			WHERE  
    				p.JenisPermohonan = 1 AND 
    				p.IdRuangan = j.IdRuangan AND 
    				j.IdRuangan = r.IdRuangan AND
                    p.IdGedung = j.IdGedung AND
                    j.IdGedung = r.IdGedung AND
                    p.IdJadwal = j.IdJadwal AND 
                    p.deleted = 0 AND 
    				p.IdPemohon = u.NomorInduk"
    		)
    	);

        $allcatatan = DB::select(
        	DB::raw(
        		"SELECT * 
        		FROM permohonan p, catatan c, users u 
        		WHERE  
        			p.IdPermohonan = c.IdPermohonan AND 
        			c.NomorIndukPenulis = u.NomorInduk"
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
		$daftarregis = DB ::select(
			DB::raw(
				"SELECT * 
				from permohonan p, kandidat_barang kb, users u 
				where 
					p.JenisPermohonan = 2 AND 
					p.IdPermohonan = kb.IdPermohonan AND 
					p.IdPemohon = u.NomorInduk AND
					p.deleted= 0 "
			)
		);

		// get list catatan
		$regiscatatan = DB ::select(
			DB::raw(
				"SELECT * 
				from permohonan p, catatan c, users u 
				where 
					p.IdPermohonan = c.IdPermohonan AND 
					c.NomorIndukPenulis = u.NomorInduk"
			)
		);

		return array(
			'daftarregis' => $daftarregis,
			'regiscatatan' => $regiscatatan
		);
    }

    public static function updateStatus($id, $persetujuan) {
 
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

	public static function deletePermohonan($hash) {
		// ganti status peminjaman pada database
        DB::update(
        	DB::raw(
        		"UPDATE PERMOHONAN
        		SET deleted = 1
        		WHERE IdPermohonan = $hash"
        	)
        );
	}
}
