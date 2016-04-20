<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

/**
 * Kelas Master
 *
 * Model Master merupakan model yang memiliki fungsi sebagai
 * Master model yang memiliki method general yang dapat langsung diakses
 * pada semua controller
 */
class Master extends Model
{
	protected $table = '';

	/**
	 * Get last element on table and filter specified
	 * @param  String $table   table name
	 * @param  String $orderby column name
	 * @param  array  $where   where clause array
	 * @return $table          table last single row
	 */
    public static function getLast($table, $orderby, $where = [])
    {    	
        // check if there is addition of filter given by user
    	if (count($where) > 0) {
    		return DB::table($table)->where($where)->orderby($orderby, 'desc')->first();            
        } else {
    		return DB::table($table)->orderby($orderby, 'desc')->first();            
        }
    }

    /**
	 * Get last ID on table and filter specified
	 * @param  String $table   table name
	 * @param  String $orderby column name
	 * @param  array  $where   where clause array
	 * @return Integer         table last Id
	 */
    public static function getLastId($table, $orderby, $where = [])
    {   
    	$lastObj;

        // check if there is addition of filter gien by user
    	if (count($where) > 0)
    		$lastObj = DB::table($table)->where($where)->orderby($orderby, 'desc')->first();            
        else
    		$lastObj = DB::table($table)->orderby($orderby, 'desc')->first();            
        
        // chekc if lastObj is null
        if ($lastObj == null)
            // lastObj null, there are no object exist specified
        	return 0;
        else
            // get lastObj Id
        	return $lastObj->$orderby;
    }
}
