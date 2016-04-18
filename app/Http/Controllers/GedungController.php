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
    public function getGedung(Request $request)
    {
        // check if user permitted        
        if (!($this->isPermitted('gedung'))) return redirect('/');        

    	// check if request method is post or not
    	if(!$request->isMethod('POST')) {    		
    		// get gedung object from database
			$allgedung = Gedung::getAllGedung();

			// render gedung page
			return $this->render('pinjamruang.gedung',
				[
					'title' => 'Daftar Gedung',
					'allgedung' => $allgedung
				]
			);
    	} else {
    		// get gedung selected
    		$gedung = Gedung::where('hash', $request->input('hash'))->get();

    		// set gedung session
    		session(['gedung' => $gedung]);

    		// redirect with data
    		return redirect('pinjamruang/gedung/ubah');
    	}
    }

    /**
     * Render create gedung page
     * @return view create gedung
     */
    public function getCreateGedung()
    {
        // check if user permitted        
        if (!($this->isPermitted('buatgedung'))) return redirect('/');  

    	// render buatgedung page
    	return $this->render('pinjamruang.buatgedung',
    		[
    			'title' => 'Buat Gedung',    			
    		]
    	);
    }    

    /**
     * Render update gedung page
     * @return view update gedung
     */
    public function getUpdateGedung()
    {
        // check if user permitted        
        if (!($this->isPermitted('buatgedung'))) return redirect('/');  

    	// if session gedung not found redirect to gedung
    	if (!session()->has('gedung')) return redirect('pinjamruang/gedung');

    	// get gedung selected
    	$gedung = session('gedung');

    	// render update gedung page
    	return $this->render('pinjamruang.updategedung',
    		[
    			'title' => 'Update Gedung',
    			'gedung' => $gedung,
    		]
    	);
    }

    /**
     * Create gedung object and input to database
     * @param  Request $request request object
     * @return redirect to gedung page
     */
    public function createGedung(Request $request)
    {
        // check if user permitted        
        if (!($this->isPermitted('buatgedung'))) return redirect('/');  

    	// form validation
    	$this->validate($request, [
    		'namagedung' => 'required|max:25'
    	]);

    	// get last object Gedung    	    
    	$lastObj = Master::getLast('gedung', 'IdGedung');    	

    	if($lastObj == null) $IdGedung = 1;
        else $IdGedung = $lastObj->IdGedung + 1;

    	$namagedung = $request->input('namagedung');

    	// input data to database
    	Gedung::createGedung([
    		'IdGedung' => $IdGedung,
    		'Nama' => $namagedung,
    		'hash' => md5($IdGedung.$namagedung) // create hash
    	]);

    	// redirect to daftar gedung
    	return redirect('pinjamruang/gedung');
    }

    /**
     * Update gedung object in database
     * @param  Request $request request object
     * @return redirect to gedung page
     */
    public function updateGedung(Request $request)
    {
        // check if user permitted        
        if (!($this->isPermitted('buatgedung'))) return redirect('/');  

    	// form validation
    	$this->validate($request, [
    		'namagedung' => 'required|max:25'
    	]);    	

    	// input data to database
    	Gedung::updateGedung($request->input('hash'), [    		
    		'Nama' => $request->input('namagedung')
    	]);    	

    	// redirect to daftar gedung
    	return redirect('pinjamruang/gedung');
    }

    /**
     * Remove, actually soft-remove, gedung object from database
     * @param  Request $request request object
     * @return redirect to gedung page
     */
    public function removeGedung(Request $request)
    {
        // check if user permitted        
        if (!($this->isPermitted('gedung'))) return redirect('/');  

    	// set gedung to deleted
    	Gedung::removeGedung($request->input('hash'));

    	// return to gedung list
    	return redirect('pinjamruang/gedung');
    }
}