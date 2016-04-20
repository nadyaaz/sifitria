<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Barang;
use App\Master;
use DB;
use Validator;

class BarangController extends MasterController
{
    /**
     * Get all barang and display it
     * @param  Request $request Request object
     * @return View
     */
    public function getBarang(Request $request)
    {	
        // check if user permitted        
        if (!($this->isPermitted('barang'))) return redirect('/');

        // check if request method is post
        if(!$request->isMethod('POST')) {
            // get all barang
        	$allbarang = Barang::all();
            
            // return barang page
        	return $this->render('registbarang.barang', 
        		[
        			'title' => 'Daftar Barang',
        			'allbarang' => $allbarang,
        		]
        	);
        } else {
            // get barang selected
            $barang = Barang::where('hashBarang', $request->input('hash'))->get();

            // set barang session
            session()->flash('barang', $barang);

            // redirect with barang data
            return redirect('registrasibarang/barang/ubah');
        }
    }

    /**
     * Get create barang page
     * @param  Request $request Request object
     * @return buatbarang.blade.php
     */
    public function getCreateBarang(Request $request)
    {
        // check if user permitted        
        if (!($this->isPermitted('buatbarang'))) return redirect('/');

        // reset the session
        session()->forget('jmlform');
        
        // check if request method is post, if yes get jmlform input and create session 
        if ($request->isMethod('POST')) 
            session()->flash('jmlform', $request->input('jmlbarang'));

        // render buat barang page with jmlform data
        return $this->render('registbarang.buatbarang',
            [
                'title' => 'Buat Barang',
            ]
        );
    }  
    
    /**
     * Create barang and input it to database
     * @param  Request $request Request object
     * @return redirect to barang.blade.php
     */
    public function createBarang(Request $request)
    {
        // check if user permitted        
        if (!($this->isPermitted('buatbarang'))) return redirect('/');

        // get number of form submitted
        $nform = count($request->input('namabarang')); 

        // set session for jmlform
        session()->flash('jmlform', $nform);

        // validate request
        $this->validate($request, 
            [
                'namabarang.*' => 'required|max:100',                
                'tanggalbeli.*' => 'required',
                'penanggungjawab.*' => 'required|max:100',
                'kategoribarang.*' => 'required|max:100',
                'jenisbarang.*' => 'required|max:100',
                'kondisibarang.*' => 'required|max:100',
                'spesifikasibarang.*' => 'required',
                'keteranganbarang.*' => 'required',                                
                'kerusakanbarang.*' => 'required',
            ]
        );

        // get all input
        $input = $request->all();
                
        // insert barang for every barang submitted
        for ($i=1; $i <= $nform; $i++) { 
            // get last object Barang           
            $lastObj = Master::getLast('barang', 'IdBarang');       

            // check if lastObj is null
            if($lastObj == null) $IdBarang = 1;
            else $IdBarang = $lastObj->IdBarang + 1;

            $namabarang = $input['namabarang'][$i];
            $jenisbarang = $input['jenisbarang'][$i];
            $kategoribarang = $input['kategoribarang'][$i];

            // insert to database
            Barang::createBarang([
                'IdBarang' => $IdBarang,
                'NamaBarang' => $namabarang,
                'JenisBarang' => $jenisbarang,
                'SpesifikasiBarang' => $input['spesifikasibarang'][$i],
                'TanggalBeli' => date('Y-m-d H:i:s', strtotime($input['tanggalbeli'][$i])),
                'PenanggungJawab' => $input['penanggungjawab'][$i],
                'KategoriBarang' => $kategoribarang,
                'KondisiBarang' => $input['kondisibarang'][$i],
                'KeteranganBarang' => $input['keteranganbarang'][$i],
                'WaktuRegistrasi' => date('Y-m-d H:i:s', time()),
                'KerusakanBarang' => $input['kerusakanbarang'][$i],
                'NomorBarcode' => $IdBarang,
                'hashBarang' => md5($IdBarang.$namabarang.$jenisbarang.$kategoribarang),
            ]);
        }

        // destroy session
        session()->forget('jmlform');

        // insert success, redirect to registrasi barang
        return redirect('registrasibarang/barang');
    }  

    /**
     * Get update barang view
     * @param  Request $request Request object
     * @return updatebarang.blade.php
     */
    public function getUpdateBarang(Request $request)
    {
        // check if user permitted        
        if (!($this->isPermitted('buatbarang'))) return redirect('/');

        // if session barang not found, redirect to barang page
        if (!session()->has('barang')) return redirect('registrasibarang/barang');

        // get barang selected
        $barang = session('barang');

        // return update barang page
        return $this->render('registbarang.updatebarang', 
            [
                'title' => 'Update Barang',
                'barang' => $barang,
            ]
        );
    }

    /**
     * Update selected barang
     * @param  Request $request Request object
     * @return void
     */
    public function updateBarang(Request $request)
    {
        // check if user permitted        
        if (!($this->isPermitted('buatbarang'))) return redirect('/');
        
        // form validation
        $this->validate($request, 
            [
                'namabarang' => 'required|max:100',                
                'tanggalbeli' => 'required',
                'penanggungjawab' => 'required|max:100',
                'kategoribarang' => 'required|max:100',
                'jenisbarang' => 'required|max:100',
                'kondisibarang' => 'required|max:100',
                'spesifikasibarang' => 'required',
                'keteranganbarang' => 'required',                                
                'kerusakanbarang' => 'required',
            ]
        );        

        // input data to database
        Barang::updateBarang($request->input('hash'), [
            'NamaBarang' => $request->input('namabarang'),
            'TanggalBeli' => date('Y-m-d H:i:s', strtotime($request->input('tanggalbeli'))),
            'Penanggungjawab' => $request->input('penanggungjawab'),
            'KategoriBarang' => $request->input('kategoribarang'),
            'JenisBarang' => $request->input('jenisbarang'),
            'KondisiBarang' => $request->input('kondisibarang'),
            'SpesifikasiBarang' => $request->input('spesifikasibarang'),
            'KeteranganBarang' => $request->input('keteranganbarang'),
            'KerusakanBarang' => $request->input('kerusakanbarang'),
        ]);        

        // redirect to barang page
        return redirect('registrasibarang/barang');        
    }
}