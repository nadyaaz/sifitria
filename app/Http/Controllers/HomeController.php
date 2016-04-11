<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use SSO\SSO;

class HomeController extends MasterController
{        
    public function index()
    {                   
        return $this->render('home', 
            [
                'title' => 'Beranda',
            ]
        );
    }
}
