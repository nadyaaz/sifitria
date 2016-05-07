@extends('sidebar')

@section('sidebar_dashboard', 'active')

@section('konten')
<div class="subsection">
    <h5>Daftar Permohonan Maintenance Barang</h5>
    <div class="divider"></div><br>

    <div id="tableHead" class="row">
        <div class="col s1">Id</div>
        <div class="col s5">Subjek</div>            
        <div class="col s3">Status</div>
        <div class="col s3">Pemohon</div>
    </div>

    <ul class="collapsible" data-collapsible="accordion">
        
        @for($i=0; $i < count($data['allpermohonan']); $i++)
        <li>
            <div class="collapsible-header active">

                <div class="col s1">{{ $data['allpermohonan'][$i] ->IdPermohonan}}</div>
                <div class="col s5">{{ $data['allpermohonan'][$i] ->SubjekPermohonan }}</div>            
                <div class="col s3">

                     @if($data['allpermohonan'][$i] -> TahapPermohonan === 1)
                                    
                        @if($data['allpermohonan'][$i] -> StatusPermohonan === 0)
                            {{ 'Ditinjau ke lapangan' }}
                        @elseif($data['allpermohonan'][$i] -> StatusPermohonan === 1)
                            {{'Ditolak oleh Staf Fasilitas & Infrastruktur'}} 
                        @elseif($data['allpermohonan'][$i] -> StatusPermohonan === 2)
                            {{'Disetujui oleh Staf Fasilitas & Infrastruktur'}}    
                        @endif

                    @elseif($data['allpermohonan'][$i] -> TahapPermohonan === 2)
                                   
                        @if($data['allpermohonan'][$i] -> StatusPermohonan === 1)
                            {{'Ditolak oleh Manajer Fasilitas & Infrastruktur'}}
                        @elseif($data['allpermohonan'][$i] -> StatusPermohonan === 2)
                            {{'Disetujui oleh Staf Fasilitas & Infrastruktur'}}
                        @endif

                    @elseif($data['allpermohonan'][$i] -> TahapPermohonan ===3)
                                    
                        @if($data['allpermohonan'][$i] -> StatusPermohonan === 1)
                            {{'Ditolak oleh Wakil Dekan'}} 
                        @elseif($data['allpermohonan'][$i] -> StatusPermohonan === 2)
                            {{'Disetujui oleh Staf Fasilitas & Infrastruktur'}}    
                        @endif

                    @endif

                </div>

                <div class="col s3">{{$data['allpermohonan'][$i]->Nama}}</div>

            </div>

            <div class="collapsible-body">
                <div class="row">
                    <div class="col s4">
                        @if ($data['allpermohonan'][$i]->NomorSurat != null)

                        <b>Nomor Surat:</b><br>
                        {{ $data['allpermohonan'][$i]->NomorSurat }}

                        @else

                        <b>Nomor Surat:</b><br>
                        <span class="grey-text"><i>Belum ada nomor surat</i></span>

                        @endif
                    </div>

                    <div class="col s4">
                        <b>Waktu Permohonan:</b><br>
                        {{ date('j F Y, H:i', strtotime($data['allpermohonan'][$i]->created_at)) }}
                    </div>

                </div>
                <hr>

                <div class="row">
                    @foreach($data['allbarang'] as $barang)

                    @if($barang->IdPermohonan == $data['allpermohonan'][$i]->IdPermohonan)
                    <div class="row">
                        <div class="col s12">
                            <h4>{{$barang->NamaBarang}}</h4>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col s4">
                            <b>Jenis Barang :</b><br>
                            {{$barang->JenisBarang}}
                        </div>
                        <div class="col s4">
                            <b>Kategori Barang :</b><br>
                            {{$barang->KategoriBarang}}
                        </div>
                        <div class="col s4">
                            <b>Kondisi Barang :</b><br>
                            {{$barang->KondisiBarang}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s4">
                            <b>Penanggung Jawab :</b><br>
                            {{$barang->Penanggungjawab}}
                        </div>
                        <div class="col s4">
                            <b>Spesifikasi Barang :</b><br>
                            {{$barang->SpesifikasiBarang}}
                        </div>
                        <div class="col s4">
                            <b>Keterangan Barang :</b><br>
                            {{$barang->KeteranganBarang}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s4">
                            <b>Kuantitas :</b><br>
                            {{$barang->Kuantitas}}
                        </div>
                        <div class="col s4">
                            <b>Keterangan :</b><br>
                            {{$barang->KeteranganBarang}}

                        </div>
                    </div>

                    @endif

                    @endforeach
                </div>

                <hr>

                @foreach($data['allcatatan'] as $catatan)

                @if($catatan->IdPermohonan == $data['allpermohonan'][$i]->IdPermohonan)
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
             
                @if ($data['user_sess']->role == 'Manager Fasilitas & Infrastruktur' || $data['user_sess']->role == 'Staf Fasilitas & Infrastruktur' || $data['user_sess']->role == 'Wakil Dekan')
                <div class="row"> 

                    @if (
                        ($data['allpermohonan'][$i]->TahapPermohonan == 1 && $data['allpermohonan'][$i] -> StatusPermohonan== 0) ||
                        ($data['allpermohonan'][$i]->TahapPermohonan == 1 && $data['allpermohonan'][$i] -> StatusPermohonan== 2) ||
                        ($data['allpermohonan'][$i]->TahapPermohonan == 2 && $data['allpermohonan'][$i] -> StatusPermohonan== 2) 
                    )
                    <form action="{{ url('maintenancebarang/ubahstatus') }}" method="POST">
                        <div class="col s6">
                            <b>Setujui/Tolak Permohonan</b><br>
                            @if ($data['allpermohonan'][$i]->NomorSurat == null)
                            Nomor Surat <br>
                            <input type="text" name="nomorsurat" required/>
                            @endif                        
                        </div>
                        <div class="col s12">                                               
                            {!! csrf_field() !!}
                            <input type="hidden" name="hashPermohonan" value="{{ $data['allpermohonan'][$i]->hashPermohonan }}"><br>
                            Catatan: <br>
                            <textarea class="materialize-textarea" class="validate" name="catatan_txtarea" cols="30" rows="30" required>Jika tidak ada catatan tulis "Tidak ada"</textarea>
                            <input type="submit" value="TOLAK" name="tolak" class="waves-effect waves-red btn red right"/>
                            <input type="submit" value="SETUJU" name="setuju" class="btn waves-effect waves-light teal white-text right"/>
                        </div>
                    </form>
                    @endif


                </div>
                @endif
                            
                @if ($data['user_sess']->role != 'Manager Fasilitas & Infrastruktur' && $data['user_sess']->role != 'Staf Fasilitas & Infrastruktur' && $data['user_sess']->role != 'Wakil Dekan')
                <div class="row">
                    <div class="col s11">
                        <form action="" method="POST" class="right">
                            {!! csrf_field() !!}
                            <input type="hidden" name="hashPermohonan" value="{{ $data['allpermohonan'][$i]->hashPermohonan }}"/>                            
                            <button class="btn waves-effect waves-light teal white-text">
                                UBAH
                                <i class="material-icons right">edit</i>
                            </button>
                        </form> 
                    </div>
                    <div class="col s1">                        
                        <form action="" method="POST" class="right">
                            {!! csrf_field() !!}
                            <input type="hidden" name="hashPermohonan" value="{{ $data['allpermohonan'][$i]->hashPermohonan }}"/>                            
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
    </ul>
</div>
@stop