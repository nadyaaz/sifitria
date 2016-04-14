<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Catatan extends Model
{
    protected $table = 'CATATAN';

    public static function getCatatanTerakhir (){

    	return DB::table('catatan')	->where('IdPermohonan', 1)->orderBy('TahapCatatan', 'desc')->first();
    }

    public static function getIncrementedTahapCatatan () {

    	$catatan_terakhir = Catatan::getCatatanTerakhir();
        
        if ($catatan_terakhir == null){
            return 1;
        }
        else{
            return $catatan_terakhir->TahapCatatan + 1;
        }

    }

    public static function createCatatan ($id, $tahap_catatan, $catatan, $user_id){

    	if($catatan != ''){
            DB::insert(
                DB::raw(
                    "INSERT INTO catatan (IdPermohonan, TahapCatatan, DeskripsiCatatan, NomorIndukPenulis) 
                    VALUES ($id, $tahap_catatan, '$catatan', '$user_id')"
                )
            );
        }
    }

}
