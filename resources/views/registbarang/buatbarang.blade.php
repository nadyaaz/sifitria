@extends('sidebar')

@section('sidebar_buatbarang', 'active')

@section('konten')
<div class="subsection">
	<h5>Buat Barang</h5>
    <div class="divider"></div><br>
    
    <form action="{{ url('registrasibarang/barang/buat') }}" method="POST">    	
	    <div id="barang-multiform">	    		   
		    <div id="barang-form1">
		    	<div class="valign-wrapper">		    		
		    		<span id="judul1" class="valign judul-add-barang">Barang</span>&nbsp;&nbsp;
		    	</div>
			    <div class="row form-row">
			    	<div class="col s6 input-field">
			    		Nama Barang <br>
			    		<span class="error red-text">{{ $errors->first('namabarang.1') }}</span><br>
						<input id="namabarang1" type="text" name="namabarang[1]" length="100" value="{{ old('namabarang.1') }}">			
			    	</div>

					<div class="col s2 input-field">
			    		Tanggal Beli <br>
			    		<span class="error red-text">{{ $errors->first('tanggalbeli.1') }}</span><br>    				
						<input id="tanggalbeli1" type="date" name="tanggalbeli[1]" value="{{ old('tanggalbeli.1') }}" class="datepicker">			
			    	</div>

			    	<div class="col s4 input-field">
			    		Penanggung Jawab <br> 
			    		<span class="error red-text">{{ $errors->first('penanggungjawab.1') }}</span><br>   				
						<input id="penanggungjawab1" type="text" name="penanggungjawab[1]" length="100" value="{{ old('penanggungjawab.1') }}" class="">			
			    	</div>    	
			    </div>   

			    <div class="row form-row">
			    	<div class="col s2 input-field">
			    		Kategori Barang <br>
			    		<span class="error red-text">{{ $errors->first('kategoribarang.1') }}</span><br>    				
						<select id="kategoribarang1" name="kategoribarang[1]">
							<option value="" disabled selected>Kategori Barang</option>
							<option value="Elektronik">Elektronik</option>
							<option value="Furnitur">Furnitur</option>
							<option value="Kategori A">Kategori A</option>
							<option value="Kategori B">Kategori B</option>
							<option value="Kategori C">Kategori C</option>
							<option value="Lainnya">Lainnya</option>
						</select>			
			    	</div>

			    	<div class="col s4 input-field">
			    		Jenis Barang <br>
			    		<span class="error red-text">{{ $errors->first('jenisbarang.1') }}</span><br>    				
						<input id="jenisbarang1" type="text" name="jenisbarang[1]" value="{{ old('jenisbarang.1') }}" length="100" class="">			
			    	</div>    		
			    	<div class="col s6 input-field">
			    		Kondisi Barang <br>
			    		<span class="error red-text">{{ $errors->first('kondisibarang.1') }}</span><br>    				
						<input id="kondisibarang1" type="text" name="kondisibarang[1]" value="{{ old('kondisibarang.1') }}" length="100" class="">			
			    	</div>
			    </div>

			    <div class="row form-row">   
			    	<div class="col s4 input-field">
			    		Kerusakan Barang <br>
			    		<span class="error red-text">{{ $errors->first('kerusakanbarang.1') }}</span><br>    				
						<textarea id="kerusakanbarang1" name="kerusakanbarang[1]" value="{{ old('kerusakanbarang.1') }}" class="materialize-textarea" cols="30" rows="10"></textarea>
			    	</div>  

			    	<div class="col s4 input-field">
			    		Spesifikasi Barang <br>
			    		<span class="error red-text">{{ $errors->first('spesifikasibarang.1') }}</span><br>    				
						<textarea id="spesifikasibarang1" name="spesifikasibarang[1]" value="{{ old('spesifikasibarang.1') }}" class="materialize-textarea" cols="30" rows="10"></textarea>
			    	</div>

			    	<div class="col s4 input-field">
			    		Keterangan Barang <br>
			    		<span class="error red-text">{{ $errors->first('keteranganbarang.1') }}</span><br>    				
						<textarea id="keteranganbarang1" name="keteranganbarang[1]" value="{{ old('keteranganbarang.1') }}" class="materialize-textarea" cols="30" rows="10"></textarea>
			    	</div>    
			    </div><hr>
		    </div>		
		</div>

		<div class="row">
			<div class="col s4 offset-s4 valign-wrapper">
				<div class="valign">			
					{!! csrf_field() !!}									
					<button class="btn waves-light waves-effect teal">
						BUAT SEMUA BARANG
						<i class="material-icons right">send</i>
					</button>&nbsp;&nbsp;									
				</div>
			</div>
			<div class="col s4">				
				<a id="add-new-form" class="btn-floating tooltipped waves-effect waves-light right red" 
					data-position="left" 
					data-delay="10" 
					data-tooltip="TAMBAH BARANG">
					<i class="material-icons">add</i>
				</a>
			</div>
		</div>
    </form>   
</div>
@stop