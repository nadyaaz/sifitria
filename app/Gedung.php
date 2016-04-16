<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Gedung;

class Gedung extends Model
{
    protected $table = 'GEDUNG';

    /**
     * Get all gedung object when deleted equals to 0
     * @return Gedung
     */
    public static function getAll()
    {
    	return Gedung::where('deleted', '=', 0)->get();
    }    
}
