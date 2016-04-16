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
    	// check if request method is post or not
    	if(!$request->isMethod('POST')) {    		
    		// get gedung object from database
			$allgedung = Gedung::getAll();

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

    		// redirect with data
    		return redirect('pinjamruang/gedung/ubah')->with('gedung', $gedung);
    	}
    }

    /**
     * Render create gedung page
     * @return view create gedung
     */
    public function getCreateGedung()
    {
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
    	// form validation
    	$this->validate($request, [
    		'namagedung' => 'required|max:25'
    	]);

    	// get last IdGedung    	    
    	$lastId = Master::getLast('gedung', 'IdGedung')->IdGedung;
    	$namagedung = $request->input('namagedung');

    	// input data to database
    	DB::table('gedung')->insert([
    		'IdGedung' => $lastId + 1,
    		'Nama' => $namagedung,
    		'hash' => md5(($lastId+1).$namagedung) // create hash
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
    	// form validation
    	$this->validate($request, [
    		'namagedung' => 'required|max:25'
    	]);    	

    	// input data to database
    	DB::table('gedung')->where('hash', $request->input('hash'))->update([    		
    		'Nama' => $request->input('namagedung')
    	]);

    	// redirect to daftar gedung
    	return redirect('pinjamruang/gedung');
    }

    /**
     * Remove, actually soft-delete, gedung object in database
     * @param  Request $request request object
     * @return redirect to gedung page
     */
    public function removeGedung(Request $request)
    {
    	// set gedung to deleted
    	DB::table('gedung')->where('hash', $request->input('hash'))->update(['deleted' => 1]);

    	// return to gedung list
    	return redirect('pinjamruang/gedung');
    }
}