@extends('sidebar')


@section('modul')
    Registrasi Barang
@stop

@section('title')
    Dashboard Registrasi Barnang
@stop


@section('tableTitle')
    List Permohonan Registrasi Barang
@stop

@section('sidebar1')
   Dashboard
@stop

@section('sidebar2')
   Buat Permohonan Registrasi Barang
@stop

@section('sidebar1_active')
    active
@stop

@section('thead1')
	Id Permohonan
@stop

@section('thead2')
	Subjek
@stop

@section('thead3')
	Waktu Permohonan	
@stop

@section('thead4')
	Status
@stop

@section('thead5')
	<p></p>
@stop

@section('konten')
            <div class="subsection">
                <h6>@yield('tableTitle')</h6>
                <div class="divider"></div>
                    <div id="tableHead" class="row">
                        <div class="col s2">@yield('thead1')</div>
                        <div class="col s2">@yield('thead2')</div>
                        <div class="col s2">@yield('thead3')</div>
                        <div class="col s2">@yield('thead4')</div>
                        <div class="col s2">@yield('thead5')</div>
                    </div>

                    <ul class="collapsible" data-collapsible="accordion">
                        @foreach($data['daftarregis'] as $barang)
                        
                        <li>
                            <div class="collapsible-header">
                          
                                <div id="tableRow" class="row">

                                    <div class="col s2">{{ $barang->IdPermohonan}}</div>
                                    <div class="col s2">{{ $barang->SubjekPermohonan}}</div>
                                    <div class="col s2">{{ $barang->created_at }}</div>
                              			
                                    <div class="col s2">
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
                                     @if($barang->TahapPermohonan == 1 && $barang->StatusPermohonan == 0 )
                                    <div class="col s1">
                                    	<a href=""  class="tooltipped white-text waves-effect waves-light btn-flat" data-position="bottom" data-delay="10" data-tooltip="Edit Permohonan" >
                                    		<i id="edit-button"class="tiny material-icons">edit</i>
                                    		<p>
                                    		</p>
                                    	</a>
   
                                    	
                                    </div>
                                    
                                    <form action="{{ url('registbarang/batal') }}" method="POST">
	                                    <div class="col s1">
	                                    	{!! csrf_field() !!}
	                                    	<input type="hidden" name="Id" value="{{ $barang->IdPermohonan }}"/>
	                                    	<button id="cancel-button" class="tooltipped white-text waves-effect waves-light btn-flat" data-position="bottom" data-delay="10" data-tooltip="Batalkan Permohonan" >
	                                    		<i id="edit-button" class="tiny material-icons">cancel</i>
	                                    	</button>

	                                    </div>
                                    </form>
                                     @endif
                                </div>
                    
                            </div>
                            <div class="collapsible-body">
                                <div class = "row">
                                    <div class="col s6">
                                        Nomor Surat :<br>
                                        {{ $barang->NomorSurat }}
                                    </div>
                                    <div class="col s6">
                                        Tanggal Beli :<br>
                                        {{ $barang->TanggalBeli }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s6">
                                       	Nama Barang :<br>
                                       	{{ $barang->NamaBarang}}
                                    </div>
                                    <div class="col s6">
                                    	Penanggung Jawab :<br>
                                    	{{ $barang->Penanggungjawab}}
                                    </div>
                               </div>
                               <div class="row">
                               		<div class="col s6">
                               			Kategori : <br>
                               			{{ $barang->KategoriBarang}}
                               		</div>
                               		<div class="col s6">
                               			Kondisi : <br>
                               			{{ $barang->KondisiBarang}}
                               		</div>
                               </div>
                               <div class="row">
                               		<div class="col s6">
                               			Jenis :<br>
                               			{{ $barang->JenisBarang }}
                               		</div>
                               </div>
                               <div class="row">
                              		<div class="col s12">
                              			Keterangan :<br>
                              			{{ $barang->KeteranganBarang }}
                              		</div>
                               </div>
                               <div class="row">
                              		<div class="col s12">
                              			Spesifikasi :<br>
                              			{{ $barang->SpesifikasiBarang }}
                              		</div>
                               </div>
                               @foreach($data['regiscatatan'] as $catatan)
                                @if($catatan->IdPermohonan == $barang->IdPermohonan)
                                    <div class="row">
                                        <div class="col s12">
                                            Catatan {{ $catatan->Role }}:<br>
                                            {{ $catatan->DeskripsiCatatan }}
                                        </div>
                                    </div>     
                                @endif
                            @endforeach

                            </div>
                         
                        </li>      
                    	@endforeach
                    </ul>
             </div>
@stop

