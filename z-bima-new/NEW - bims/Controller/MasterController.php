<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use SSO\SSO;
use DB;

class MasterController extends Controller
{
    public function render($view, $input_data = [])    
    {	
    	$data = $input_data;

    	if ($view == 'home' && !(SSO::check())) {
    		$data['isLoggedIn'] = false;			    		
    	} else {
	    	if (!SSO::check()) SSO::authenticate();
	    	
			$data['isLoggedIn'] = SSO::check();
			$data['user_sess'] = SSO::getUser();	    	
    	}
    	
		return view($view, compact('data'));
    }
}
