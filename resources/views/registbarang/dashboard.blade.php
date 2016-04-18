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
        @for($i=0; $i < count($data['allregistrasi']); $i++)
        
        <li>
            <div class="collapsible-header active">                                                        
                <div class="col s1">{{ $data['allregistrasi'][$i]->IdPermohonan }}</div>
                <div class="col s5" style="word-wrap: normal">{{ $data['allregistrasi'][$i]->SubjekPermohonan }}</div>                                          			
                <div class="col s3">
                	@if($data['allregistrasi'][$i]->TahapPermohonan == 1)
                		@if($data['allregistrasi'][$i]->StatusPermohonan == 0 )
                			{{'Ditinjau ke Lapangan'}}
                		@elseif($data['allregistrasi'][$i]->StatusPermohonan == 1 )
                			{{'Ditolak pada proses verifikasi'}}
                		@elseif($data['allregistrasi'][$i]->StatusPermohonan == 2 )
            				{{'Sudah diverifikasi'}}
            			@endif
            		@else
            			@if($data['allregistrasi'][$i]->StatusPermohonan == 1 )
                			{{'Ditolak'}}
                		@elseif($data['allregistrasi'][$i]->StatusPermohonan == 2 )
                			{{'Diterima'}}
            			@endif
            		@endif
                </div>
                <div class="col s3">{{ $data['allregistrasi'][$i]->Nama }}</div>

                @if($data['allregistrasi'][$i]->TahapPermohonan == 1 && $data['allregistrasi'][$i]->StatusPermohonan == 0 )                
                                       
                @endif                     
            </div>

            <div class="collapsible-body">                                        
                <div class="row">
                    <div class="col s4">
                        <b>Nomor Surat :</b><br>
                        {{ $data['allregistrasi'][$i]->NomorSurat }}
                    </div>
                    <div class="col s4">
                        <b>Waktu Permohonan :</b><br>
                        {{ $data['allregistrasi'][$i]->created_at }}
                    </div>                        
                </div>
                
                
                <a href="#kandidat-barang{{$i}}" class="modal-trigger btn waves-light waves-effect">
                    LIHAT SEMUA BARANG
                </a>

                <!-- Modal Structure -->
                <div id="kandidat-barang{{$i}}" class="modal">
                    <div class="modal-content">
                        @foreach($data['allkandidat'] as $kandidat)

                        @if($kandidat->IdPermohonan == $data['allregistrasi'][$i]->IdPermohonan)
                        <h4>{{$kandidat->NamaBarang}}</h4>
                        <div class="row">
                            <div class="col s3">{{$kandidat->TanggalBeli}}</div>
                            <div class="col s3">{{$kandidat->JenisBarang}}</div>
                            <div class="col s3">{{$kandidat->KategoriBarang}}</div>
                            <div class="col s3">{{$kandidat->KondisiBarang}}</div>
                        </div>
                        <div class="row">
                            <div class="col s12">{{$kandidat->Penanggungjawab}}</div><br>
                            <div class="col s12">{{$kandidat->SpesifikasiBarang}}</div><br>
                            <div class="col s12">{{$kandidat->KeteranganBarang}}</div>
                        </div>
                        @endif

                        @endforeach
                    </div>

                    <div class="modal-footer">
                        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">TUTUP</a>
                    </div>
                </div>

                @for($j=0; $j < count($data['allcatatan']); $j++)
                
                @if($data['allcatatan'][$j]->IdPermohonan == $data['allregistrasi'][$i]->IdPermohonan)
                <hr>
                <div class="row">
                    <div class="col s12">
                        <b>Catatan {{ $data['allcatatan'][$j]->Role }}:</b><br>
                        <i>Oleh {{ $data['allcatatan'][$j]->Nama }}</i><br>
                        <p>{{ $data['allcatatan'][$j]->DeskripsiCatatan }}</p>
                        <input type="hidden" name="hashCatatan[{{$j+1}}]" value="{{ $data['allcatatan'][$j]->hashCatatan }}">
                    </div>
                </div>   
                @endif                    

                @endfor
                <!-- end foreach regiscatatan -->
                
                <div class="row">                    
                    <div class="col s12">
                        <form action="" method="POST">
                            {!! csrf_field() !!}
                            <input type="hidden" name="Id" value="{{ $data['allregistrasi'][$i]->IdPermohonan }}"/>
                            Catatan: <br>
                            <textarea class="materialize-textarea" name="catatan_txtarea" cols="30" rows="30"></textarea>
                            <button class="btn waves-effect waves-light teal white-text right">
                                SETUJU
                                <i class="material-icons white-text right">done</i>
                            </button>
                        </form>
                        <form action="{{ url('registregistrasi/batal') }}" method="POST" class="left">
                            {!! csrf_field() !!}
                            <input type="hidden" name="Id" value="{{ $data['allregistrasi'][$i]->IdPermohonan }}">
                            <button class="waves-effect waves-red btn red">                                    
                                TOLAK
                                <i class="material-icons white-text right">clear</i>
                            </button>
                        </form>                                                                                        
                    </div>
                </div>

                <div class="row">
                    <div class="col s12 ">                            
                        <form action="{{ url('registrasiregistrasi') }}" method="POST" class="right">
                            {!! csrf_field() !!}
                            <input type="hidden" name="hashPermohonan" value="{{ $data['allregistrasi'][$i]->hashPermohonan }}"/>                            
                            <button class="btn waves-effect waves-light teal white-text">
                                UBAH
                                <i class="material-icons right">edit</i>
                            </button>
                        </form> 
                    </div>
                </div>
            </div>         
        </li> 

    	@endfor
        <!-- foreach allregistrasi -->
    </ul>
</div>

<script>
    $(document).ready(function(){
        $('.modal-trigger').leanModal({
            dismissible: true, 
            opacity: .3, 
            in_duration: 148, 
            out_duration: 148,
        });
    });
</script>
@stop
<!-- stop section konten -->