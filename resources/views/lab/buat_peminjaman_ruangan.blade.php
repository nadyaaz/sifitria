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
			Pilih Jenis Ruangan :
 		</p>
		<p>
			<input name="group1" type="radio" id="test1" />
		    <label for="test1">Ruang Kelas</label>
		 	
		</p>
		<p>
		    <input name="group1" type="radio" id="test2" />
		    <label for="test2">Ruang Auditorium</label>
		</p>
		<p>
		    <input name="group1" type="radio" id="test3"  />
		    <label for="test3">Ruang Rapat</label>
		</p>

		<p>
		<div class="input-field col s6">
			Pilih Tanggal :
		
			<input type="date" class="datepicker">
		</p>
		<p>
		
			Pilih Waktu :
			 	<div class="row">
			 		<div class="col s4">
			 			<input value="waktu awal" type="text" class="validate">
			 		</div>
			 		<div class="col s4">
			 			<h5 style="text-align: center">s.d.</h5>
			 		</div>
			 		<div class="col s4">
			 			<input value="waktu akhir" type="text" class="validate">
			 		</div>
			 		
			 	</div>
		</p>
		<div class="input-field col s12">
			

				Ruangan Tersedia :
		
			<div id="tableHead" class="row">
	    		<div class="col s6">Ruangan</div>
	    		<div class="col s6">Kapasitas</div>
	    		
	    	</div>
			<p>
				 <ul class="collection">
			    	<li class="collection-item">
			    		<div class="row">
			    			<div class="col s6">G1102</div>
			    			<div class="col s6">20</div>
			    		</div>
			    	</li>
			      	<li class="collection-item">
			      		<div class="row">
			    			<div class="col s6">G1102</div>
			    			<div class="col s6">20</div>
			    		</div>
			      	</li>
			    </ul>
			</p>
			</div>
		<div class="col s12">
		<button class="btn waves-effect waves-light" type="submit" name="Next Page">	Next
    		<i class="material-icons right">navigate_next</i>
  		</button>
  		</div>

  		<div class="row">
      		<div class="col s12"></div>
    	</div>
    	<div id=class="row">
    	<hr>
    	</div>
  		<ul class="pagination">
			<div class = "row">
				<div id="langkah1"class="col 6">
					<li class="active"><h6 class="right-align">Langkah 1</h6></li>
				</div>
		    	<div id="langkah2"class="col s6">
					<li class="waves-effect"><h6 class="left-align">Langkah 2</h6s></li>
				</div>
		    	
		    </div>
		</ul>

@stop
