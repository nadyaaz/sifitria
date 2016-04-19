@extends('sidebar')

@section('konten')	
<div class="subsection">
	<form action="{{ url('pinjamruang/buat_formdetail/proses') }}" method="POST">			
		<div class="row">			
			<div class="col s6">

			 	<p>
					Pilih Jenis Ruangan :
		 		</p>
				<p>
					<input name="jenisRuangan" type="radio" id="test1" value="Kelas"/>
				    <label for="test1">Ruang Kelas</label>
				 	
				</p>
				<p>
				    <input name="jenisRuangan" type="radio" id="test2" value="Auditorium"/>
				    <label for="test2">Ruang Auditorium</label>
				</p>
				<p>
				    <input name="jenisRuangan" type="radio" id="test3" value="RuangRapatBesar"/>
				    <label for="test3">Ruang Rapat Besar</label>
				</p>
				<p>
				    <input name="jenisRuangan" type="radio" id="test4" value="RuangRapatKecil"/>
				    <label for="test4">Ruang Rapat Kecil</label>
				</p>
			
				   
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

		<div class="row" id="xyz">
			<div class="col s12">
				<a class="btn waves-effect waves-light" id="jadwaljson" name="Next Page">	CARI RUANGAN TERSEDIA
		    	<i class="material-icons right">navigate_next</i>
  				</a>
  			</div>
		</div>

		<div id="tabelRuangan">
			<div class="row">
				<div class="col s12">
					Ruangan Tersedia :
				</div>
			
				<div id="tableHead" class="row">
		    		<div class="col s6">Ruangan</div>
		    		<div class="col s6">Kapasitas</div>	
		    	</div>						
			</div>
		</div>

		<div class="subsection">				
			<div class="row">
				<div class="col s12">
					Subjek: <br>
				</div>	

				<div class="col s6">
					<input name="subjek" type="text" id="subjek" class="validate" required>
				</div>
			</div>	
			<div class="row">
				<div class="col s12">
					Keperluan Penggunaan: <br>
				</div>	

				<div class="col s6">
					<input name="keperluan" type="text" id="keperluan" class="validate" required>
				</div>
			</div>	
			<div class="row">
				<div class="col s12">
					Catatan Pemohon: <br>
				</div>	

				<div class="col s6">
					<input name="catatan" type="text" id="catatan" class="validate" required>
				</div>
			</div>
			<div class="row" id="xyz">
				<div class="col s12">
					{!! csrf_field() !!}
					<input type="hidden" name = "pemohon" value = "{{$data['user_sess']->npm}}">
					<button class="btn waves-effect waves-light" id="formruangan" name="Next Page">	Submit dan Simpan Permohonan
			    	
	  				</button>
	  				</div>
				</div>		
			</form>
		</div>

		<div class="row">		
			<div class="col s12"><p></p></div>
			<div class="col s12 m4 l2"><p></p></div>
			<div class="col s12 m4 l8"><hr></hr></div>
			<div class="col s12 m4 l2"><p></p></div>
			<div class="col s12 m6 l3"><p></p></div>			
			<div class="col s12 m6 l3"><p></p></div>			
		</div>
	</form>
</div>

<script type="text/javascript">
//<![CDATA[
$(document).ready(function() {
	$.ajaxSetup({
		headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
	});

	$('#jadwaljson').click(function(){
		var kategori = $('input[type="radio"][name="jenisRuangan"]:checked').val();
		var tanggal = $('.datepicker').val();
		var waktumulai = $('#waktuMulai').val();
		var waktuselesai = $('#waktuSelesai').val();
			
		
		$.ajax({
			url: 'buat/getruangan?jenisRuangan='+kategori+'&tanggal='+tanggal+'&waktuMulai='+waktumulai+'&waktuSelesai='+waktuselesai,
			type: 'POST',				
			processData:false,
				
			success: function(data){				
				var myElementToAppendTo = $("#tabelRuangan");
				$('.pilihan').html('');
		       	$.each($.parseJSON(data), function(idx, obj) {		     		
		           myElementToAppendTo.append("<ul class='collection'><li class='collection-item'><div class='row'><div class='col s6 pilihan'><input type='radio' name='ruangandipilih' id='radio"+obj.IdRuangan+"' value='"+obj.IdGedung+"."+obj.IdRuangan+"'/><label for='radio"+obj.IdRuangan+"'>"+obj.Nama+obj.NomorRuangan+"</label></div><div class='col s6'>"+obj.KapasitasRuangan+"</div></div></div></li></ul>");
				});
			},
			error: function(xhr, status, error){
				alert(status+' '+error);
			}
		})					
	}); 
});		
//]]>
</script>


  	


@stop
