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
			    		<span class="error red-text">{{ $errors->first('namabarang1') }}</span><br>
						<input id="namabarang1" type="text" name="namabarang1" length="100" class="">			
			    	</div>

					<div class="col s2 input-field">
			    		Tanggal Beli <br>
			    		<span class="error red-text">{{ $errors->first('tanggalbeli1') }}</span><br>    				
						<input id="tanggalbeli1" type="date" name="tanggalbeli1" class="datepicker">			
			    	</div>

			    	<div class="col s4 input-field">
			    		Penanggung Jawab <br> 
			    		<span class="error red-text">{{ $errors->first('penanggungjawab1') }}</span><br>   				
						<input id="penanggungjawab1" type="text" name="penanggungjawab1" length="100" class="">			
			    	</div>    	
			    </div>   

			    <div class="row form-row">
			    	<div class="col s2 input-field">
			    		Kategori Barang <br>
			    		<span class="error red-text">{{ $errors->first('kategoribarang1') }}</span><br>    				
						<select id="kategoribarang1" name="kategoribarang1">
							<option value="" disabled selected>Kategori Barang</option>
							<option value="Elektronik">Elektronik</option>
							<option value="Furnitur">Furnitur</option>
							<option value="Kategori A">Kategori A</option>
							<option value="Kategori B">Kategori B</option>
							<option value="Kategori C">Kategori C</option>
						</select>			
			    	</div>

			    	<div class="col s4 input-field">
			    		Jenis Barang <br>
			    		<span class="error red-text">{{ $errors->first('jenisbarang1') }}</span><br>    				
						<input id="jenisbarang1" type="text" name="jenisbarang1" length="100" class="">			
			    	</div>    		
			    	<div class="col s6 input-field">
			    		Kondisi Barang <br>
			    		<span class="error red-text">{{ $errors->first('kondisibarang1') }}</span><br>    				
						<input id="kondisibarang1" type="text" name="kondisibarang1" length="100" class="">			
			    	</div>
			    </div>

			    <div class="row form-row">   
			    	<div class="col s4 input-field">
			    		Kerusakan Barang <br>
			    		<span class="error red-text">{{ $errors->first('kerusakanbarang1') }}</span><br>    				
						<textarea id="kerusakanbarang1" name="kerusakanbarang1" class="materialize-textarea" cols="30" rows="10"></textarea>
			    	</div>  

			    	<div class="col s4 input-field">
			    		Spesifikasi Barang <br>
			    		<span class="error red-text">{{ $errors->first('spesifikasibarang1') }}</span><br>    				
						<textarea id="spesifikasibarang1" name="spesifikasibarang1" class="materialize-textarea" cols="30" rows="10"></textarea>
			    	</div>

			    	<div class="col s4 input-field">
			    		Keterangan Barang <br>
			    		<span class="error red-text">{{ $errors->first('keteranganbarang1') }}</span><br>    				
						<textarea id="keteranganbarang1" name="keteranganbarang1" class="materialize-textarea" cols="30" rows="10"></textarea>
			    	</div>    
			    </div><hr>
		    </div>		
		</div>

		<div class="row">
			<div class="col s4 offset-s4 valign-wrapper">
				<div class="valign">	
					<form action="{{ url('registrasibarang/barang/buat') }}" method="POST">	
						{!! csrf_field() !!}					
						<button class="btn waves-light waves-effect teal">
							BUAT SEMUA BARANG
							<i class="material-icons right">send</i>
						</button>&nbsp;&nbsp;				
					</form>				
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