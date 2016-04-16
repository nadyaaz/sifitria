@extends('sidebar')

@section('sidebar_dashboard', 'active')

@section('konten')
<div class="subsection">
    <h5>Daftar Permohonan Registrasi Barang</h5>
    <div class="divider"></div><br>

    <div id="tableHead" class="row">
        <div class="col s1">Id</div>
        <div class="col s5">Subjek</div>            
        <div class="col s3">Status</div>
        <div class="col s3">Pemohon</div>
    </div>

    <ul class="collapsible" data-collapsible="accordion">
        @foreach($data['daftarregis'] as $barang)
        
        <li>
            <div class="collapsible-header active">                                                        
                <div class="col s1">{{ $barang->IdPermohonan }}</div>
                <div class="col s5" style="word-wrap: normal">{{ $barang->SubjekPermohonan }}</div>                                          			
                <div class="col s3">
                	@if($barang->TahapPermohonan == 1)
                		@if($barang->StatusPermohonan == 0 )
                			{{'Ditinjau ke Lapangan'}}
                		@elseif($barang->StatusPermohonan == 1 )
                			{{'Ditolak pada proses verifikasi'}}
                		@elseif($barang->StatusPermohonan == 2 )
            				{{'Sudah diverifikasi'}}
            			@endif
            		@else
            			@if($barang->StatusPermohonan == 1 )
                			{{'Ditolak'}}
                		@elseif($barang->StatusPermohonan == 2 )
                			{{'Diterima'}}
            			@endif
            		@endif
                </div>
                <div class="col s3">{{ $barang->Nama }}</div>

                @if($barang->TahapPermohonan == 1 && $barang->StatusPermohonan == 0 )                
                                       
                @endif                     
            </div>

            <div class="collapsible-body">                                        
                <div class="row">
                    <div class="col s4">
                        <b>Nomor Surat :</b><br>
                        {{ $barang->NomorSurat }}
                    </div>
                    <div class="col s4">
                        <b>Waktu Permohonan :</b><br>
                        {{ $barang->created_at }}
                    </div>                        
                </div>
                <div class="row">
                    <div class="col s4">
                       	<b>Nama Barang :</b><br>
                       	{{ $barang->NamaBarang}}
                    </div>
                    <div class="col s4">
                    	<b>Penanggung Jawab :</b><br>
                    	{{ $barang->Penanggungjawab}}
                    </div>
                    <div class="col s4">
                        <b>Tanggal Beli :</b><br>
                        {{ $barang->TanggalBeli }}
                    </div>
                </div>
                <div class="row">
                    <div class="col s4">
                        <b>Kategori :</b> <br>
                        {{ $barang->KategoriBarang}}
                    </div>
                    <div class="col s4">
                        <b>Jenis :</b> <br>
                        {{ $barang->JenisBarang }}
                    </div>
                    <div class="col s4">
                        <b>Kondisi :</b> <br>
                        {{ $barang->KondisiBarang}}
                    </div>
                </div>                    
                <div class="row">                        
                    <div class="col s6">
                        <b>Spesifikasi :</b><br>
                        {{ $barang->SpesifikasiBarang }}
                    </div>
                    <div class="col s6">
                        <b>Keterangan :</b><br>
                        {{ $barang->KeteranganBarang }}
                    </div>
                </div>
                
                @foreach($data['regiscatatan'] as $catatan)
                
                @if($catatan->IdPermohonan == $barang->IdPermohonan)
                <hr>
                <div class="row">
                    <div class="col s12">
                        <b>Catatan {{ $catatan->Role }}:</b><br>
                        <i>Oleh {{ $catatan->Nama }}</i><br>
                        <p>{{ $catatan->DeskripsiCatatan }}</p>
                    </div>
                </div>   
                @endif                    

                @endforeach
                <!-- end foreach regiscatatan -->
                
                <div class="row">                    
                    <div class="col s12">
                        <form action="" method="POST">
                            {!! csrf_field() !!}
                            <input type="hidden" name="Id" value="{{ $barang->IdPermohonan }}"/>
                            Catatan: <br>
                            <textarea class="materialize-textarea" name="catatan_txtarea" cols="30" rows="30"></textarea>
                            <button class="btn waves-effect waves-light teal white-text right">
                                SETUJU
                                <i class="material-icons white-text right">done</i>
                            </button>
                        </form>
                        <form action="{{ url('registbarang/batal') }}" method="POST" class="left">
                            {!! csrf_field() !!}
                            <input type="hidden" name="Id" value="{{ $barang->IdPermohonan }}">
                            <button class="waves-effect waves-red btn red">                                    
                                TOLAK
                                <i class="material-icons white-text right">clear</i>
                            </button>
                        </form>                                                                                        
                    </div>
                </div>

                <div class="row">
                    <div class="col s12 ">                            
                        <form action="" class="right">
                            {!! csrf_field() !!}
                            <input type="hidden" name="Id" value="{{ $barang->IdPermohonan }}"/>
                            <a class="btn waves-effect waves-light teal white-text left">
                                UBAH                                
                            </a>&nbsp;
                            <button class="btn waves-effect waves-light teal white-text disabled">
                                SIMPAN                                    
                            </button>
                        </form> 
                    </div>
                </div>
            </div>
         
        </li> 

    	@endforeach
        <!-- foreach daftarregis -->
    </ul>
</div>

@stop
<!-- stop section konten -->