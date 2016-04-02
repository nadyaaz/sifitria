<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class UnitTestController extends Controller
{
    public function unit()
    {    	
    	$data = [];
    	return view('welcome', compact('data'));
    }
}
