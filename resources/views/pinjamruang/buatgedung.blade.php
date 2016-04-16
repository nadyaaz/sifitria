@extends('sidebar')

@section('sidebar_buatgedung', 'active')

@section('konten')
<div class="subsection">
	<h5>Buat Gedung</h5>
	<div class="divider"></div><br>

	<div class="row">
		<div class="col s6 push-s3">
			<form action="{{ url('/pinjamruang/gedung/buat') }}" method="POST">
				{!! csrf_field() !!}

				<div class="input-field">
					<b>Nama Gedung</b><br>
					<span class="error red-text">{{ $errors->first('namagedung') }}</span><br>
					<input type="text" name="namagedung" value="{{ old('namagedung') }}" placeholder="contoh: Gedung C, Gedung Seminar">
				</div><br>

				<div class="input-field center">
					<button class="btn teal waves-light waves-effect">
						BUAT GEDUNG
						<i class="material-icons right">send</i>
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
@stop