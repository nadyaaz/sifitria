@extends('sidebar')

@section('sidebar_barang', 'active white-text')

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
				@foreach($data['allbarang'] as $barang)					

				@if(
					($barang->KategoriBarang == 'Elektronik' && $i == 1) ||
					($barang->KategoriBarang == 'Furnitur' && $i == 2) ||
					($barang->KategoriBarang == 'kategori A' && $i == 3) ||
					($barang->KategoriBarang == 'kategori B' && $i == 4) ||
					($barang->KategoriBarang == 'kategori C' && $i == 5)
				)
				<li>													
					<div class="collapsible-header">
						<div class="col s1">{{ $barang->IdBarang }}</div>
						<div class="col s3">{{ $barang->NamaBarang }}</div>
						<div class="col s2">{{ $barang->KategoriBarang }}</div>
						<div class="col s2">{{ $barang->JenisBarang }}</div>
						<div class="col s1">{{ $barang->KondisiBarang }}</div>
						<div class="col s3">{{ $barang->Penanggungjawab }}</div>
					</div>					

					<div class="collapsible-body">
						<div class = "row">
							<div class="col s4">
								<div class="namaBarang-default">
									<b>Nama Barang :</b><br>
									{{ $barang->NamaBarang }}
								</div>
							</div>

							<div class="col s4">
								<div class="tanggalBeli-default">
									<b>Tanggal Beli :</b><br>
									{{ $barang->TanggalBeli}}
								</div>							
							</div>								

							<div class="col s4">
								<div class="tanggalBeli-default">
									<b>Waktu Registrasi :</b><br>
									{{ $barang->WaktuRegistrasi}}
								</div>							
							</div>								
						</div>						
					   	
					   	<div class="row">
							<div class="col s6">
								<div class="keterangan-default">	
									<b>Keterangan :</b><br>
									{{ $barang->KeteranganBarang}}
								</div>							
							</div>

							<div class="col s6">
								<div class="spesifikasi-default">
									<b>Spesifikasi :</b><br>
									{{ $barang->SpesifikasiBarang}}
								</div>																	
							</div>
					   	</div>

					   	<div class="row">
							<div class="col s6">
								<div class="spesifikasi-default">
									<b>KerusakanBarang :</b><br>
									{{ $barang->KerusakanBarang }}
								</div>																
							</div>
					   	</div>

					   	<div class="row">
							<div class="col s12">
								<a href="{{ url('registrasibarang/barang/ubah/'.$barang->hashBarang) }}" class="btn teal waves-effect waves-light right">
									UBAH
									<i class="material-icons right">edit</i>
								</a>
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