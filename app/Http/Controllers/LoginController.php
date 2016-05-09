<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;

class LoginController extends MasterController
{
	public function index(Request $request)
	{
		if (session()->has('user_sess')) return redirect('/');

		if ($request->isMethod('POST')) {
			return $this->login($request);
		} else {
			return $this->render('login', [
				'title' => 'Login SIFITRIA',
			]);			
		}
	}

    public function login(Request $request)
    {
    	$input = $request->all();

        $this->validate($request, [
            'user' => 'required',
            'pass' => 'required'
        ]);

        $request->session()->flash('login_error', '');

    	if ($user = User::isUserExist($input['user'], md5($input['pass']))) 
    	{
    		$request->session()->put('user_sess', $user);
            return redirect('/');    	
        }
        else 
        {
            $request->session()->flash('login_error', 'Username atau Password salah');
            return back();
        }

    }

    public function logout(Request $request)
    {
    	$request->session()->forget('user_sess');

    	return redirect('/');
    }
}
