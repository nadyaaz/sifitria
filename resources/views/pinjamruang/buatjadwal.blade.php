@extends('sidebar')

@section('sidebar_buatjadwal', 'active')

@section('konten')
	<div class="subsection">
		<h5>Buat Jadwal</h5>
		<div class="divider"></div><br>
		<div class="row">
			
			<div class="col s6">

			
				Pilih Jenis Ruangan :<br>
					<input name="group1" type="radio" id="test1" />
				    <label for="test1">Ruang Kelas</label>
				 	<br>
				
				    <input name="group1" type="radio" id="test2" />
				    <label for="test2">Ruang Auditorium</label>
					<br>
				    <input name="group1" type="radio" id="test3"  />
				    <label for="test3">Ruang Rapat</label>
				
			</div>
		</div>
	
		<div class="row">
			<div class="input-field col s6">
				Pilih Ruangan
			    <select >
			      	<optgroup label="Gedung M">
			        	<option value="M1102">M1102</option>
			        	<option value="M1103">M1103</option>
			      	</optgroup>
			      	<optgroup label="Gedung G">
			        	<option value="G1102">G1102</option>
			        	<option value="G1103">G1103</option>
			      	</optgroup>
			    </select>
			  </div>
		</div>

		<div class="row">
		
	        	<b>Periode Jadwal</b><br>
	        		<div class="col s2">
	        			<input type="date" id="periodeawal" class="datepicker">
	          		</div>
	          		<div class="col s1">
	          			<h5>s.d.</h5>
	          		</div>
	          		<div class="col s2">
	          			<input type="date" id="periodeakhir" class="datepicker">
	          		</div>
	      
	       
        </div>
		<div class="row">
			<div class="col s12">
				<ul class="tabs">
					<li class="tab col s2"><a class="active"href="#test1">Senin</a></li>
					<li class="tab col s2"><a href="#test2">Selasa</a></li>
					<li class="tab col s2"><a href="#test3">Rabu</a></li>
					<li class="tab col s2"><a href="#test4">Kamis</a></li>
					<li class="tab col s2"><a href="#test5">Jumat</a></li>
					<li class="tab col s2"><a href="#test6">Sabtu</a></li>
					<li class="tab col s2"><a href="#test6">Minggu</a></li>

				</ul>
			</div>	
		</div>

		<div class="row">
		    <div id="tableHead" class="row">
		        <div class="col s1">No</div>
		        <div class="col s2">Waktu Awal</div>
		        <div class="col s2">Waktu Akhir</div>
		        <div class="col s4">Keperluan</div>
		        <div class="col s3">Pengulangan</div>
		                
		    </div>
		                
			<hr>
		</div>


		<div class="row-jadwal">
			<div class="col s1">
				<h5>1</h5>
			</div>
			<div class="col s2">
				<input id="waktuawal" type="number" class="validate">
			</div>
			<div class="col s2">
				<input id="waktuakhir" type="number" class="validate">
			</div>
			<div class="col s4">
				<input placeholder="contoh: Kelas"  id="subject" type="text" class="validate">
			</div>
			<div class="col s1">
				<input id="pengulangan" type="number" class="validate"> kali/minggu
			</div>
		</div>
		<div class="row">
	      	<div class="col s4"><p></p></div>
	      	<div class="col s4">
	       	 	<a id="submit"style="width:100%;"class="waves-effect waves-light btn"><i class="material-icons left">add</i>Tambahkan Jadwal</a>
	    	</div>
    	</div>
    	<hr>
	    <div class="row">
	      	<div class="col s12 m4 12"><p></p></div>
	      	<div class="col s12 m4 18">
	        	<a id="submit"style="width:100%;"class="waves-effect waves-light btn-large">Submit & Simpan Jadwal</a>
	      	</div>
	      	<div class="col s12 m4 12"><p></p></div>
	    </div>
	</div>
@stop