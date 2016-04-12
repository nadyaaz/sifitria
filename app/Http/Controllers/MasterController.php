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
		// get input data provided by user
    	$data = $input_data;

		// check user credentials
    	if ($view == 'home' && !(SSO::check())) {
			// user not logged in
    		$data['isLoggedIn'] = false;			    		
    	} else {
			// check SSO login, if is not logged authenticate the user
	    	if (!SSO::check()) SSO::authenticate();
	    	
			// set global user data
			$data['isLoggedIn'] = SSO::check();
			$data['user_sess'] = SSO::getUser();            
    	}
    	
		// return view file
		return view($view, compact('data'));
    }
}
