@extends('master')

@section('modul')
    Peminjaman Ruangan
@stop

@section('user-role')
    Jundi Ahmad Alwan (mahasiswa)
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

@section('sidebar2_active')
	active
@stop

@section('konten')
	<div class="subsection">

		<div class="row">
			
			<div class="col s6">

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
			</div>
		</div>
		<div class="row">
			<div class="input-field col s6">

				Pilih Tanggal Peminjaman :
				<input type="date" class="datepicker">
			</div>
		</div>

		<div class="row">
			<div class="col s12">
				Isi Waktu Peminjaman : <br>
			</div>	
			<div class="col s2">
				<input value="waktu awal" type="text" class="validate">
			</div>
			<div class="col s2">
				 <h6 style="text-align: center">s.d.</h6>
			</div>
			<div class="col s2">
				<input value="waktu akhir" type="text" class="validate">
			</div>

		</div>		
		<div class="row">
			<div class="col s12">
				Ruangan Tersedia :
			</div>
			<div class="col s8">
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
			</div>
		</div>
		<div class="row">
			<div class="col s12">
				<button class="btn waves-effect waves-light" type="submit" name="Next Page">	Next
		    	<i class="material-icons right">navigate_next</i>
  				</button>
  			</div>

		</div>
		<div class="row">
		
				<div class="col s12"><p></p></div>
				<div class="col s12 m4 l2"><p></p></div>
				<div class="col s12 m4 l8"><hr></hr></div>
				<div class="col s12 m4 l2"><p></p></div>

				<div class="col s12 m6 l3"><p></p></div>
				<div id="ruanganSelected" class="col s12 m6 l3"><p ><h6 class="center-align">Langkah 1</h6></p></div>
				<div  class="col s12 m6 l3"><p ><h6 class="center-align">Langkah 2</h6></p></div>
				<div class="col s12 m6 l3"><p></p></div>
			
		</div>
	</div>


  	


@stop
