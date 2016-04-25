<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Gedung;
use App\Master;
use Validator;
use DB;

class GedungController extends MasterController
{
	/**
	 * Render gedung page or
	 * when request method is post, get the selected 'UBAH' gedung
	 * @param  Request $request Request object
	 * @return view gedung
	 */
    public function getGedung()
    {
        // check if user permitted        
        // if (!($this->isPermitted('gedung'))) return redirect('/');        
		
		// get gedung object from database
		$allgedung = Gedung::getAllGedung();

		// render gedung page
		return $this->render('pinjamruang.gedung',
			[
				'title' => 'Daftar Gedung',
				'allgedung' => $allgedung
			]
		);
    }

    /**
     * Create gedung object and input to database
     * or get create gedung form
     * @param  Request $request request object
     * @return redirect to gedung page
     */
    public function createGedung(Request $request)
    {
        // check if user permitted        
        // if (!($this->isPermitted('buatgedung'))) return redirect('/');  

        if ($request->isMethod('POST')) {
            // request method is post
            
            // form validation
            $this->validate($request, [
                'namagedung' => 'required|max:25'
            ]);

            // get last ID Gedung           
            $lastId = Master::getLastId('gedung', 'IdGedung');       
            $IdGedung = $lastId + 1;

            $namagedung = $request->input('namagedung');

            // input data to database
            Gedung::createGedung([
                'IdGedung' => $IdGedung,
                'NamaGedung' => $namagedung,
                'hash' => md5($IdGedung.$namagedung) // create hash
            ]);

            // redirect to daftar gedung
            return redirect('pinjamruang/gedung');

        } else {
            // request method is get
            
            // render buatgedung page
            return $this->render('pinjamruang.buatgedung',
                [
                    'title' => 'Buat Gedung',
                ]
            );
        }
        
    }   

    /**
     * Update gedung object in database
     * or get update gedung UI
     * @param  Request $request request object
     * @return redirect to gedung page
     */
    public function updateGedung(Request $request, $hash = '')
    {
        // check if user permitted        
        // if (!($this->isPermitted('buatgedung'))) return redirect('/');  
        
        // check if hash parameter is empty
        if($hash == '') return redirect('pinjamruang/gedung');

        // check the request method
        if ($request->isMethod('POST')) {
            // request method is post
            
            // form validation
            $this->validate($request, [
                'namagedung' => 'required|max:25'
            ]);     

            // input data to database
            Gedung::updateGedung($hash, [         
                'NamaGedung' => $request->input('namagedung'),
            ]);     

            // redirect to daftar gedung
            return redirect('pinjamruang/gedung');

        } else {                        
            // request method is get
            
            // get gedung object
            $gedung = Gedung::where('hash', $hash)->get();
            
            // render the update page form
            return $this->render('pinjamruang.updategedung', [
                'title' => 'Update Gedung',
                'gedung' => $gedung,
            ]);
        }
    }

    /**
     * Remove, actually soft-remove, gedung object from database
     * @param  Request $request request object
     * @return redirect to gedung page
     */
    public function removeGedung(Request $request)
    {
        // check if user permitted        
        // if (!($this->isPermitted('gedung'))) return redirect('/');  

    	// set gedung to deleted
    	Gedung::removeGedung($request->input('hash'));

    	// return to gedung list
    	return redirect('pinjamruang/gedung');
    }
}