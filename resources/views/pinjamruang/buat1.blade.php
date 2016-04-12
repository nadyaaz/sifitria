@extends('sidebar')

@section('sidebar_buatpinjam', 'active')

@section('konten')
<div class="subsection">
	<h5>Buat Permohonan Peminjaman Ruangan</h5>
	<div class="divider"></div><br>

	<div class="row">		
		<div class="col s12">			
			Pilih Jenis Ruangan :	 		
		</div><br>
		<div class="col s7">		 	
			<div class="col s4">
				<input name="group1" type="radio" id="test1" />
			    <label for="test1">Ruang Kelas</label>			 					
			</div>

			<div class="col s4">
				<input name="group1" type="radio" id="test3"  />
			    <label for="test3">Ruang Rapat</label>				    
			</div>
			<div class="col s4">
			    <input name="group1" type="radio" id="test2" />
			    <label for="test2">Ruang Auditorium</label>							
			</div>		
		</div>
	</div>

	<div class="row">
		<div class="input-field col s4">
			Pilih Tanggal Peminjaman : &nbsp;
			<input type="date" class="datepicker">
		</div>
	</div>

	<div class="row">
		<div class="col s12">
			Isi Waktu Peminjaman : <br>
		</div><br>	
		<div class="col s1">
			<input type="number" min="00" max="23" step="1" value="07" class="validate">:
		</div>
		<div class="col s1">
			<input type="number" min="00" max="23" step="30" value="00" class="validate">
		</div>
		<div class="col s1">
			 <h6 style="text-align: center">s.d.</h6>
		</div>
		<div class="col s1">
			<input type="number" min="00" max="30" step="1" value="07" class="validate">:
		</div>
		<div class="col s1">
			<input type="number" min="00" max="30" step="30" value="00" class="validate">
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
