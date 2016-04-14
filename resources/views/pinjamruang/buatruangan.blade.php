@extends('sidebar')

@section('sidebar_buatruangan', 'active')

@section('konten')
<div class="subsection">
	<h5>Buat Ruangan</h5>
	<div class="divider"></div><br>

	<form action="{{ url('pinjamruang/ruangan/buat') }}" method="POST">	
		<div class="row form-row">
			<div class="input-field col s6">
				<b>Nomor Ruangan </b><br>
				<span class="error red-text">{{ $errors->first('nomorruangan') }}</span><br>
				<input placeholder="3 karakter maksimal, contoh: 102" id="subject" name="nomorruangan" type="text" class="validate">
			</div>
		</div>
		<div class="row form-row">
			<div class="input-field col s6">
				<b>Gedung</b><br>
				<span class="error red-text">{{ $errors->first('gedungruangan') }}</span><br>
			    <select id="gedungruangan" name="gedungruangan">
			    	<option disabled selected>Pilih Gedung Ruangan</option>
					@foreach ($data['allgedung'] as $gedung)				   
				   	<option value="{{ $gedung->Gedung}}">Gedung {{ $gedung->Gedung }}</option>   	
			    	@endforeach	
			    </select>
			</div>
		</div>
		<div class="row form-row">
			<div class="input-field col s3">
				<b>Jenis Ruangan</b><br>
				<span class="error red-text">{{ $errors->first('jenisruangan') }}</span><br>
				<select name="jenisruangan">
					<option disabled>Pilih Jenis Ruangan</option>
	                <option value="RuangKelas">Ruang Kelas</option>
	                <option value="RuangRapat">Ruang Rapat</option>
	                <option value="Auditorium">Auditorium</option>
				</select>
			</div>
			<div class="input-field col s3">
				<b>Kapasitas (orang)</b><br>
				<span class="error red-text">{{ $errors->first('kapasitasruangan') }}</span><br>
				<input placeholder="contoh : 50" name="kapasitasruangan" id="subject" type="number" min="1" class="validate">
			</div>
		</div>
		<div class="row form-row">
			<div class="col s6">
		 		{!! csrf_field() !!}
		 		<button class="btn">
		 			BUAT RUANGAN
		 			<i class="material-icons right">send</i>
		 		</button>
			 </div>
		</div>
	</form>
</div>
@stop