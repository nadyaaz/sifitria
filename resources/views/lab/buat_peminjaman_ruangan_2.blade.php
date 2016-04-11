@extends('form')

@section('modul')
    Peminjaman Ruangan
@stop

@section('title')
    Buat Permohonan Peminjaman Ruangan
@stop

@section('sidebar1')
  Dashboard
@stop

@section('sidebar2')
   Buat Permohonan Peminjaman Ruangan
@stop

@section('content')
	<p>
    	<div class="input-field col s6">
    		Ruangan :
      		<input disabled value="M1102" id="first_name2" type="text" class="validate">		
    	</div>
  		
	</p>
	<p>
	
    	<div class="input-field col s6">
    			
    			
    		Tanggal Peminjaman :
      		<input disabled value="9 April 2016" type="text">
      			
    	</div>

	</p>
	<p>
    	<div class="input-field col s12">
    		Waktu Peminjaman :

    	</div>
    	<div class="input-field col s6">
			<div class="col s4">
			 	<input disabled value="waktu awal" type="text" class="validate">
			</div>
			<div class="col s4">
			 	<h5 style="text-align: center">s.d.</h5>
			</div>
			<div class="col s4">
			 	<input disabled value="waktu akhir" type="text" class="validate">
			 </div>	 		
		</div>
	</p>
	<p>

		<div class="input-field col s12">
			Keperluan Peminjaman :
            <textarea id="textarea1" class="materialize-textarea" length="240"></textarea>
          
		</div>
	</p>
	<p>
		<div class="input-field col s12">
			Catatan Peminjam :
            <textarea id="textarea1" class="materialize-textarea" length="240"></textarea>
 
		</div>

	</p>
	<p>
		<div class="col s12">
			<div class="row">
			
				<button class="btn waves-effect waves-light" type="submit" name="Next Page">Submit & Simpan Permohonan
    			<i class="material-icons right">submit</i>
  				</button>
  			</div>

  		</div>

  		<div class="row">
      		<div class="col s12"></div>
    	</div>
    	<div id=class="row">
    	<hr>
    	</div>
  		<ul class="pagination">
			<div class = "row">
				<div id="langkah1"class="col s6">
					<li class="waves-effect"><h6 class="right-align">Langkah 1</h6></li>
				</div>
		    	<div id="langkah2"class="col s6">
					<li class="active"><h6 class="left-align">Langkah 2</h6s></li>
				</div>
		    	
		    </div>
		</ul>
	</p>

	 
@stop
