<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use SSO\SSO;
use Session;

class SSOController extends Controller
{
    public function index(Request $request)
    {   
        // check if user is authenticated
        // if is not, authenticate
    	if (!SSO::check()) SSO::authenticate();

        // get SSO user data and store user data if it's not exist
    	$user_sess = SSO::getUser();        

        // redirect to home portal
    	return redirect('/');
    }

    public function out(Request $request)    
    {	
        // SSO logout    	
        // redirect to home portal
    	SSO::logout();    	    	
    }
}
