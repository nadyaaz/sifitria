@extends('sidebar')

@section('sidebar_buatpinjam', 'active')

@section('konten')
<div class="subsection">
	<h5>Buat Permohonan Usulan Pengadaan</h5>
    <div class="divider"></div><br>

    @if (!(session()->has('jmlform')))
    
    Tentukan jumlah barang yang ingin diadakan, contoh: 3 (minimal 1 barang, maksimal 5 barang)<br><br>
    <div class="row valign-wrapper">
        <div class="col s12">           
            <form action="{{ url('pengadaanbarang/buat') }}" method="POST">         
                <div class="col s3">
                    <input type="number" name="jmlform" min="1" max="5" step="1" value="1">           
                </div>
                <div class="col s3">
                    {!! csrf_field() !!}
                    <button class="btn waves-light waves-effect valign buat-form">
                        BUAT FORM
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>
        </div>
    </div><hr>

    @else

    <div id="multiform" class="row">
    	<form action="{{ url('pengadaanbarang/insert') }}" method="POST">
            <div class="row form-row">
                <div class="col s6">
                    <b>Subjek</b><br>
                    <input name="subjek" placeholder="Contoh: Permohonan Pengadaan Barang BEM" id="subject" type="text" class="validate" value="">
                </div><br>

                <div class="col s12">
                    <b>Catatan Pemohon</b> <br>
                    <textarea name="catatanpemohon" class="materialize-textarea" length="240" placeholder="Contoh: Tidak ada" ></textarea>
                </div>

                <div class="col s12">
                    <b>Link Anggaran</b><br>
                    <span class="error red-text"></span><br>
                    <input type="text" name="linkanggaran" length="100" value="">
                </div>
            </div><br><hr>

           	<div id="barang-multiform">
                @for($i=1; $i <= session('jmlform'); $i++)

           		<div id="barang-form">
           			  <div class="valign-wrapper">                    
                        <span class="valign judul-add-barang">Barang ke-{{ $i }}</span>&nbsp;&nbsp;
                    </div>
                    <div class="row form-row">
                        <div class="col s6 input-field">
                            Nama Barang :<br>
                            <span class="error red-text"></span><br>
                            <input type="text" name="namabarang[{{$i}}]" length="100" value="">                          
                        </div>

                        <div class="col s6 input-field">
                            Penanggung Jawab :<br> 
                            <span class="error red-text"></span><br>                 
                            <input type="text" name="penanggungjawab[{{$i}}]" length="100" value="" class="">           
                        </div>      
                    </div>  
                    <div class="row form-row">
                    	<div class="col s4 input-field">
                    		Jenis Barang :<br>
                    		<span class="error red-text"></span><br>
                            <input type="text" name="jenisbarang[{{$i}}]" length="100" value="">
                    	</div>
                    	<div class="col s4 input-field">
                    		Kategori Barang : <br>
                    		<span class="error red-text"></span><br>
                    		 <select name="kategoribarang[{{$i}}]">

                                <option disabled selected>Kategori Barang</option>
                                <option value="Elektronik">Elektronik</option>
                                <option value="Furnitur">Furnitur</option>
                                <option value="Kategori A">Kategori A</option>
                                <option value="Kategori B">Kategori B</option>
                                <option value="Kategori C">Kategori C</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>      
                    	</div>
                    	<div class="col s4 input-field">
                    		Kondisi Barang :<br>
                    		<span class="error red-text"></span><br>
                    		<select name="kondisibarang[{{$i}}]">
                                <option disabled selected>Kondisi Barang</option>
                                <option value="Baru">Baru</option>
                                <option value="Bekas">Bekas</option>
                                <option value="Rusak">Rusak</option>                                
                            </select>
                    	</div>
                    </div>
                    <div class="row form-row">
                    	<div class="col s6 input-field">
                    		Spesifikasi Barang :<br>
                    		<span class="error red-text"></span><br>                 
                            <textarea name="spesifikasibarang[{{$i}}]" class="materialize-textarea" cols="30" rows="10"></textarea>
                    	</div>
                    	<div class="col s6 input-field">
                    		Keterangan Barang :<br>
                    		<span class="error red-text"></span><br>                 
                            <textarea name="keteranganbarang[{{$i}}]" class="materialize-textarea" cols="30" rows="10"></textarea>
                    	</div>
                    </div>
           		</div>
                @endfor
	        </div>
	        <br>
    		<div class="row">
                <div class="col s4 offset-s4 valign-wrapper">
                    <div class="valign">    
                        <form action="" method="POST"> 
                            {!! csrf_field() !!}                    
                            <button class="btn waves-light waves-effect teal">
                                REGISTRASI SEMUA BARANG
                                <i class="material-icons right">send</i>
                            </button>&nbsp;&nbsp;               
                        </form>             
                    </div>
                </div>        
            </div>
        </form>
    </div>

    @endif

</div>
@stop