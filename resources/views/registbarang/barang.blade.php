@extends('sidebar')

@section('table_head')
	<div id="tableHead" class="row">
		<div class="col s1">Id</div>
		<div class="col s3">Nama Barang</div>
		<div class="col s2">Kategori</div>
		<div class="col s2">Jenis</div>
		<div class="col s1">Kondisi</div>
		<div class="col s3">Penanggung Jawab</div>
	</div>
@endsection

@section('sidebar_barang', 'active')

@section('konten')
<div class="subsection">
	<h5>Barang Terdaftar</h5>
	<div class="divider"></div>
	
	<div class="row">
		<div class="col s12">
			<ul class="tabs">
				<li class="tab col s2"><a class="active"href="#test1">Elektronik</a></li>
				<li class="tab col s2"><a href="#test2">Furnitur</a></li>
				<li class="tab col s2"><a href="#test3">Kategori A</a></li>
				<li class="tab col s2"><a href="#test4">Kategori B</a></li>
				<li class="tab col s2"><a href="#test5">Kategori C</a></li>
			</ul>
		</div>			

		<!-- barang2 kategori Elektronik -->			
	   
	   	@for($i = 1; $i < 6; $i++)
		<div id="test{{ $i }}" class="col s12">
			<br>
			@yield('table_head')

			<ul class="collapsible" data-collapsible="accordion">
				@foreach($data['allbarang'] as $detbarang)					

				@if(
					($detbarang->KategoriBarang == 'Elektronik' && $i == 1) ||
					($detbarang->KategoriBarang == 'Furnitur' && $i == 2) ||
					($detbarang->KategoriBarang == 'kategori A' && $i == 3) ||
					($detbarang->KategoriBarang == 'kategori B' && $i == 4) ||
					($detbarang->KategoriBarang == 'kategori C' && $i == 5)
				)
				<li>													
					<div class="collapsible-header">
						<div class="col s1">{{ $detbarang->IdBarang }}</div>
						<div class="col s3">{{ $detbarang->NamaBarang }}</div>
						<div class="col s2">{{ $detbarang->KategoriBarang }}</div>
						<div class="col s2">{{ $detbarang->JenisBarang }}</div>
						<div class="col s1">{{ $detbarang->KondisiBarang }}</div>
						<div class="col s3">{{ $detbarang->Penanggungjawab }}</div>
					</div>					

					<div class="collapsible-body">
						<div class = "row">
							<div class="col s4">
								<div class="namaBarang-default">
									<b>Nama Barang :</b><br>
									{{ $detbarang->NamaBarang }}
								</div>
								
								<!-- <div class="namaBarang-edit">
									Nama Barang :<br>
									<input value="{{ $detbarang->NamaBarang}}" type="text" class="validate">						
								</div> -->
							</div>

							<div class="col s4">
								<div class="tanggalBeli-default">
									<b>Tanggal Beli :</b><br>
									{{ $detbarang->TanggalBeli}}
								</div>
								<!-- <div class="tanggalBeli-edit">
									Tanggal Beli :<br>
									<input type="date" class="datepicker">
								</div> -->								
							</div>								

							<div class="col s4">
								<div class="tanggalBeli-default">
									<b>Waktu Registrasi :</b><br>
									{{ $detbarang->WaktuRegistrasi}}
								</div>
								<!-- <div class="tanggalBeli-edit">
									Tanggal Beli :<br>
									<input type="date" class="datepicker">
								</div> -->								
							</div>								
						</div>						
					   	
					   	<div class="row">
							<div class="col s6">
								<div class="keterangan-default">	
									<b>Keterangan :</b><br>
									{{ $detbarang->KeteranganBarang}}
								</div>

								<!-- <div class="keterangan-edit">
									Keterangan : <br>
									<input value="{{ $detbarang->KeteranganBarang}}" type="text" class="validate">
								</div> -->									
							</div>

							<div class="col s6">
								<div class="spesifikasi-default">
									<b>Spesifikasi :</b><br>
									{{ $detbarang->SpesifikasiBarang}}
								</div>

								<!-- <div class="spesifikasi-edit">
									Spesifikasi :<br>
									<input value="{{ $detbarang->SpesifikasiBarang}}" type="text" class="validate">
								</div> -->																	
							</div>
					   	</div>

					   	<div class="row">
							<div class="col s6">
								<div class="spesifikasi-default">
									<b>KerusakanBarang :</b><br>
									{{ $detbarang->KerusakanBarang }}
								</div>

								<!-- <div class="spesifikasi-edit">
									Spesifikasi :<br>
									<input value="{{ $detbarang->SpesifikasiBarang}}" type="text" class="validate">
								</div> -->																	
							</div>
					   	</div>

					   	<div class="row">
							<div class="col s12">
								<form action="" method="POST" class="right">
									<a class="btn teal waves-effect waves-light">UBAH</a>
									<button class="btn teal waves-effect waves-light disabled">SIMPAN</button>
								</form>
							</div>
					   	</div>						   	
					</div>
				</li>      
				@endif

				@endforeach
			</ul>			
		</div>
		@endfor
		
	</div>
</div>
@stop