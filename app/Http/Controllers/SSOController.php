<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use SSO\SSO;

class SSOController extends Controller
{
    /**
     * SSO Login
     * @param  Request $request request parameter
     * @return redirect('/')    redirect to home portal
     */
    public function index(Request $request)
    {   
        // check if user is authenticated
        // if is not, authenticate
    	if (!SSO::check()) SSO::authenticate();

        // get SSO user data and store user data if it's not exist
    	$user_sess = SSO::getUser();
        session(['user_sess' => $user_sess]);

        // redirect to home portal
    	return redirect('/');
    }

    /**
     * Logout with SSO Logout method
     * @param  Request $request request parameter
     * @return void
     */
    public function out(Request $request)    
    {	          	
        // destroy session
        session()->forget('user_sess');
        
        // logout, then redirect to home portal
    	SSO::logout();    	    	
    }
}
