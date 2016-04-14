

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
<!-- <form action="#" method="POST"> -->
	{!! csrf_field() !!}
	<div class="subsection">
		
			<div class="row">
				
					<div class="col s6">

					 	<p>
							Pilih Jenis Ruangan :
				 		</p>
						<p>
							<input name="jenisRuangan" type="radio" id="test1" value="Ruang Kelas" />
						    <label for="test1">Ruang Kelas</label>
						 	
						</p>
						<p>
						    <input name="jenisRuangan" type="radio" id="test2" value="Auditorium" />
						    <label for="test2">Ruang Auditorium</label>
						</p>
						<p>
						    <input name="jenisRuangan" type="radio" id="test3" value="Ruang Rapat Besar" />
						    <label for="test3">Ruang Rapat Besar</label>
						</p>
						<p>
						    <input name="jenisRuangan" type="radio" id="test4" value="Ruang Rapat Kecil" />
							Pilih Tanggal Peminjaman :
							<input name="tanggal" type="date" class="datepicker">
						</div>
			</div>

			<div class="row">
						<div class="col s12">
							Isi Waktu Peminjaman : <br>
						</div>	

						<div class="col s2">
							<input name="waktuMulai" value="waktuAwal" type="text" id="waktuMulai" class="validate">
						</div>
						<div class="col s2">
							 <h6 style="text-align: center">s.d.</h6>
						</div>
						<div class="col s2">
							<input name="waktuSelesai" value="waktuAkhir" type="text" id="waktuSelesai" class="validate">
						</div>

			</div>		
	
		</div>
			<div class="row" id="xyz">
				<div class="col s12">
					<button class="btn waves-effect waves-light" id="jadwaljson" name="Next Page">	Next
			    	<i class="material-icons right">navigate_next</i>
	  				</button>
	  			</div>

			</div>
		<!-- </form> -->
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

	<script type="text/javascript">
	//<![CDATA[
			$(document).ready(function() {
				$.ajaxSetup({
					headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
				});

				
				
			});
			//]]>
		</script>


  	


@stop
