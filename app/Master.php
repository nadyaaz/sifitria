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
	 * @param  String $orderby column name
	 * @param  array  $where   where clause array
	 * @return $table          table last single row
	 */
    public static function getLast($table, $orderby, $where = [])
    {    	
    	if (count($where) > 0) {
    		return DB::table($table)->where($where)->orderby($orderby, 'desc')->first();            
        } else {
    		return DB::table($table)->orderby($orderby, 'desc')->first();            
        }
    }

    /**
	 * Get last element on table and filter specified
	 * @param  String $table   table name
	 * @param  String $orderby column name
	 * @param  array  $where   where clause array
	 * @return Integer         table last Id
	 */
    public static function getLastId($table, $orderby, $where = [])
    {   
    	$lastObj;
    	if (count($where) > 0)
    		$lastObj = DB::table($table)->where($where)->orderby($orderby, 'desc')->first();            
        else
    		$lastObj = DB::table($table)->orderby($orderby, 'desc')->first();            
        
        if ($lastObj == null)
        	return 0;
        else
        	return $lastObj->$orderby;
    }
}
