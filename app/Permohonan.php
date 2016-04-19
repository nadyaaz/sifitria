<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Permohonan extends Model
{   
    protected $table = 'PERMOHONAN';

    /**
     * [createPermohonan description]
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public static function createPermohonan($data)
    {
        // create permohonan record on database
        DB::table('permohonan')->insert($data);
    }

    /**
     * [updatePermohonan description]
     * @param  [type] $hash [description]
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public static function updatePermohonan($hash, $data)
    {
        // update permohonan record given the hash
        DB::table('permohonan')->where('hashPermohonan', $hash)->update($data);
    }

    /**
     * [getPeminjaman description]
     * @return [type] [description]
     */
    public static function getPeminjaman()
    {
        // get all permohonan peminjaman ruangan
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

        // get all catatan
        $allcatatan = DB::select(
        	DB::raw(
        		'SELECT * 
        		FROM permohonan p, catatan c, users u 
        		WHERE  
        			p.IdPermohonan = c.IdPermohonan AND 
        			c.NomorIndukPenulis = u.NomorInduk'
        	)
        );

        // return the array
        return array(
        	'allpermohonan' => $allpermohonan,
        	'allcatatan' => $allcatatan
        );
    }

    /**
     * [getPeminjaman description]
     * @return [type] [description]
     */
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

        // return the array
		return array(
			'allregistrasi' => $allregistrasi,
            'allkandidat' => $allkandidat,
			'allcatatan' => $allcatatan,
		);
    }

    /**
     * [updateStatus description]
     * @param  [type] $id          [description]
     * @param  [type] $persetujuan [description]
     * @return [type]              [description]
     */
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

    /**
     * [deletePermohonan description]
     * @param  [type] $hash [description]
     * @return [type]       [description]
     */
	public static function deletePermohonan($hash) 
    {
		// set deleted status permohonan given the hash    
        DB::table('permohonan')->where('hashPermohonan', $hash)->update(['deleted' => 1]);
	}
}
