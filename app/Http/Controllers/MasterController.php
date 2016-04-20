<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use SSO\SSO;
use DB;

/**
 * Kelas MasterController
 * 
 * Merupakan class yang HARUS di-extends oleh semua controller
 * karena memiliki method render yang harus dipanggil
 * oleh semua request view halaman
 */
class MasterController extends Controller
{
	/**
	 * Method ini HARUS SELALU digunakan jika ingin 
	 * render page. Method ini berfungsi untuk menambahkan 
	 * data user dan cek login kedalam passing data yang 
	 * akan diberikan kepada View
	 * 
	 * @param  String $view       Halaman blade yang ingin di render
	 * @param  array  $input_data passing data dari controller
	 * @return View               Halaman yang di-render
	 */
    public function render($view, $input_data = [])    
    {	
		// ambil input data dari controller yang memanggil method render
    	$data = $input_data;

		// cek apakah view yang ingin di render adalah home dan user belum terautentikasi
    	if ($view == 'home' && !(SSO::check())) {
			// user belum terautentikasi, 			
    		$data['isLoggedIn'] = false;	// set passing data 'isLoggedIn' false			    		
    	} else {
			// cek autentikasi user dengan SSO Check, 			
	    	if (!SSO::check() && !(session()->has('user_sess'))) SSO::authenticate();
	    	
			// tambahkan passing data					
			$data['isLoggedIn'] = SSO::check();		// isLoggedIn berisi boolean cek autentikasi
			$data['user_sess'] = SSO::getUser();	// user_sess berisi detail data user
    	}
    	
		// kembalikan view yang sudah dirender kepada user
		return view($view, compact('data'));
    }

    /**
     * Check if user permitted to see given page
     * @param  String  $page Page the user want to check
     * @return boolean       Is user permitted to see the page given
     */
    public function isPermitted($page)
    {
    	// check user authentication
    	if(!SSO::check()) SSO::authenticate();

    	// permitted user rules
    	$userrule = [
    		'Manager Fasilitas & Infrastruktur' =>
                ['registrasibarang', 'barang', 'buatbarang'],
    		'Staf Fasilitas & Infrastruktur' =>
                ['registrasibarang', 'barang', 'buatbarang'],
    		'Staf PPAA' =>
                ['pinjamruang', 'buatpinjam', 'ruangan', 'buatruangan', 'jadwal', 'buatjadwal', 'gedung', 'buatgedung'],
    		'Staf Sekretariat' =>
                ['pinjamruang', 'buatpinjam', 'ruangan', 'buatruangan', 'jadwal', 'buatjadwal', 'gedung', 'buatgedung'],
    		'Staf' =>
                ['registrasibarang', 'buatregistrasi', 'pinjamruang', 'buatpeminjaman'],
    		'HM' =>
                ['registrasibarang', 'buatregistrasi', 'pinjamruang', 'buatpeminjaman'],
    		'Mahasiswa' =>
                ['pinjamruang', 'buatpeminjaman'],
    	];

    	// get user type
    	$usertype = SSO::getUser()->role;

        
        
    	// check if user permittes
    	if (array_key_exists($usertype, $userrule)) {
    		if (in_array($page, $userrule[$usertype], true)) return true;
    		else return false;
    	} else return false;    	
    }
}