@extends('sidebar')

@section('sidebar_buatpinjam', 'active')

@section('konten')
	<div class="subsection">
		<h5>Buat Permohonan Peminjaman Ruangan</h5>
		<div class="divider"></div><br>

		<div class="row">
	    	<div class="input-field col s6">
	    		Ruangan :<br>
	      		<input disabled value="M1102" id="first_name2" type="text" class="validate">		
	    	</div>
					
			
		</div>
		<div class="row">
			<div class="input-field col s6">
				Tanggal Peminjaman :<br>
	      		<input disabled value="11 Juli 2016" id="first_name2" type="text" class="validate"/>
			</div>
		</div>
		
		<div class="row">
			<div class="col s12">
				Isi Waktu Peminjaman : <br>
			</div>	
			<div class="col s2">
				<input disabled value="11:00" type="text" class="validate"/>
			</div>
			<div class="col s2">
				 <h6 style="text-align: center">s.d.</h6>
			</div>
			<div class="col s2">
				<input disabled value="12:00" type="text" class="validate"/>
			</div> 
		</div>		
		<div class="row">
			<div class="input-field col s12">
				Keperluan Peminjaman :<br>
            	<textarea id="textarea1" class="materialize-textarea" length="240"></textarea>
			</div>		
		</div>
		<div class="row">
			<div class="input-field col s12">
				Catatan Peminjam :<br>
	            <textarea id="textarea1" class="materialize-textarea" length="240"></textarea>
	          
			</div>
		</div>
		<div class="row">
		    <div class="col s6 offset-s3">		    
			    <button id="submitPermohonan" class="btn waves-effect waves-light" style="width: 100%" type="submit" name="Next Page">
			    	Submit &amp; Simpan Permohonan
			    	<i class="material-icons right">send</i>
  				</button>  					
		    </div>
		</div>
		<div class="row">
			
			<div class="col s12"><p></p></div>
			<div class="col s12 m4 l2"><p></p></div>
			<div class="col s12 m4 l8"><hr></hr></div>
			<div class="col s12 m4 l2"><p></p></div>

			<div class="col s12 m6 l3"><p></p></div>
			<div class="col s12 m6 l3"><p ><h6 class="center-align">Langkah 1</h6></p></div>
			<div   id="ruanganSelected"class="col s12 m6 l3"><p ><h6 class="center-align">Langkah 2</h6></p></div>
			<div class="col s12 m6 l3"><p></p></div>
				
		</div>		
	</div>

	 
@stop
