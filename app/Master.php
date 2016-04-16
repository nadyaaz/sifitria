<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Master extends Model
{
	protected $table = '';

	/**
	 * Get last element on table and filter specified
	 * @param  String $table   table name
	 * @param  array  $where   where clause array
	 * @param  String $orderby column name
	 * @return $table          table last single row
	 */
    public static function getLast($table, $orderby, $where = [])
    {
    	// $where = [ 'nama', '=', 'Jundi' ]    	
    	
    	if (count($where) > 0) 
    		return DB::table($table)->where($where)->orderby($orderby, 'desc')->first();
    	else
    		return DB::table($table)->orderby($orderby, 'desc')->first();
    }
}
