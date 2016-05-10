@extends('sidebar')

@section('sidebar_dashboard', 'active white-text')

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
            				{{'Sudah diverifikasi Staf'}}
            			@endif
            		@elseif($data['allregistrasi'][$i]->TahapPermohonan == 2)
            			@if($data['allregistrasi'][$i]->StatusPermohonan == 1 )
                			{{'Ditolak'}}
                		@elseif($data['allregistrasi'][$i]->StatusPermohonan == 2 )
                			{{'Diterima'}}
            			@endif
            		@endif
                </div>
                <div class="col s3">{{ $data['allregistrasi'][$i]->Nama }}</div>                   
            </div>

            <div class="collapsible-body">                                        
                <div class="row">
                    <div class="col s4">
                        @if ($data['user_sess']->Role == 'Manager Fasilitas & Infrastruktur' || $data['user_sess']->Role == 'Staf Fasilitas & Infrastruktur')

                            @if ($data['allregistrasi'][$i]->NomorSurat != null)                            
                            <b>Nomor Surat:</b><br>
                            {{ $data['allregistrasi'][$i]->NomorSurat }}
                            @else
                            <b>Nomor Surat:</b><br>
                            <span class="grey-text"><i>Belum ada nomor surat</i></span>
                            @endif

                        @else

                            @if ($data['allregistrasi'][$i]->NomorSurat != null)
                            <b>Nomor Surat:</b><br>
                            {{ $data['allregistrasi'][$i]->NomorSurat }}
                            @else
                            <b>Nomor Surat:</b><br>
                            <span class="grey-text"><i>Belum ada nomor surat</i></span>
                            @endif

                        @endif
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
                            <div class="col s3">
                                <b>Tanggal Beli</b><br>
                                {{date('d F Y', strtotime($kandidat->TanggalBeli))}}
                            </div>
                            <div class="col s3">
                                <b>Jenis Barang</b><br>
                                {{$kandidat->JenisBarang}}
                            </div>
                            <div class="col s3">
                                <b>Kategori Barang</b><br>
                                {{$kandidat->KategoriBarang}}
                            </div>
                            <div class="col s3">
                                <b>Kondisi Barang</b><br>
                                {{$kandidat->KondisiBarang}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <b>Penanggung Jawab</b><br>
                                {{$kandidat->Penanggungjawab}}
                            </div><br>
                        </div>
                        <div class="row">                            
                            <div class="col s6">
                                <b>Spesifikasi Barang</b><br>
                                {{$kandidat->SpesifikasiBarang}}
                            </div>
                            <div class="col s6">
                                <b>Keterangan Barang</b><br>
                                {{$kandidat->KeteranganBarang}}
                            </div>
                        </div><hr>
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
                
                <hr>
                <div class="row"> 
                    @if ($data['user_sess']->Role == 'Manager Fasilitas & Infrastruktur' || $data['user_sess']->Role == 'Staf Fasilitas & Infrastruktur')
                    
                    @if (
                        ($data['allregistrasi'][$i]->TahapPermohonan == 1 && $data['allregistrasi'][$i]->StatusPermohonan == 0) ||
                        ($data['allregistrasi'][$i]->TahapPermohonan == 1 && $data['allregistrasi'][$i]->StatusPermohonan == 2 && $data['user_sess']->Role == 'Manager Fasilitas & Infrastruktur') 
                    )
                    <form action="{{ url('registrasibarang/ubahstatus') }}" method="POST">
                        <div class="col s6">
                            <b>Setujui/Tolak Permohonan</b><br>
                            @if ($data['allregistrasi'][$i]->NomorSurat == null)
                            Nomor Surat <br>
                            <input type="text" name="nomorsurat" required/>
                            @endif                        
                        </div>
                        <div class="col s12">                                               
                            {!! csrf_field() !!}
                            <input type="hidden" name="hashPermohonan" value="{{ $data['allregistrasi'][$i]->hashPermohonan }}"><br>
                            Catatan: <br>
                            <textarea class="materialize-textarea" class="validate" name="catatan_txtarea" cols="30" rows="30" required>Jika tidak ada catatan tulis "Tidak ada"</textarea>
                            <input type="submit" value="TOLAK" name="tolak" class="waves-effect waves-red btn red right"/>
                            <input type="submit" value="SETUJU" name="setuju" class="btn waves-effect waves-light teal white-text right"/>
                        </div>
                    </form>
                    @endif

                    @endif
                </div>
                
                @if ($data['user_sess']->Role != 'Manajer Fasilitas & Infrastruktur' && $data['user_sess']->Role != 'Staf Fasilitas & Infrastruktur')
                <div class="row">                    
                    <div class="col s12">                        
                        <form action="{{ url('registrasibarang/batal') }}" method="POST" class="right">
                            {!! csrf_field() !!}
                            <a href="{{ url('registrasibarang/ubah/'.$data['allregistrasi'][$i]->hashPermohonan) }}" class="btn waves-effect waves-light teal white-text">
                                UBAH
                                <i class="material-icons right">edit</i>
                            </a>
                            <input type="hidden" name="hashPermohonan" value="{{ $data['allregistrasi'][$i]->hashPermohonan }}"/>                            
                            <button class="btn waves-effect waves-light red white-text">                                
                                <i class="material-icons">delete</i>
                            </button>
                        </form> 
                    </div>
                </div>
                @endif
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