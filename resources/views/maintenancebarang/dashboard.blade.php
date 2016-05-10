@extends('sidebar')

@section('sidebar_dashboard', 'active white-text')

@section('konten')
<div class="subsection">
    <h5>Daftar Permohonan Maintenance Barang</h5>
    <div class="divider"></div><br>

    <div id="tableHead" class="row">
        <div class="col s1">Id</div>
        <div class="col s5">Subjek</div>            
        <div class="col s6">Status</div>
    </div>

    <ul class="collapsible" data-collapsible="accordion">
        
        @for($i=0; $i < count($data['allpermohonan']); $i++)
        <li>
            <div class="collapsible-header active">

                <div class="col s1">{{ $data['allpermohonan'][$i] ->IdPermohonan}}</div>
                <div class="col s5">{{ $data['allpermohonan'][$i] ->SubjekPermohonan }}</div>            
                <div class="col s6">

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

            </div>

            <div class="collapsible-body">
                <div class="row no-row">
                    <div class="col s12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-title">
                                    Detail Surat
                                </div>

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
                            </div>
                        </div>                        
                    </div>
                </div>
                <!-- <hr> -->

                <div class="row">
                    @foreach($data['allbarang'] as $barang)

                    @if($barang->IdPermohonan == $data['allpermohonan'][$i]->IdPermohonan)
                    
                    <div class="col s12">
                        <div class="card">                            
                            <div class="card-content">
                                <div class="card-title">
                                    Barang yang rusak
                                </div><br>

                                <div class="row">
                                    <div class="col s12">
                                        <h5>{{$barang->NamaBarang}}</h5>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col s4">
                                        <b>Jenis Barang :</b><br>
                                        <span class="wrap-text">
                                            {{$barang->JenisBarang}}
                                        </span>
                                    </div>
                                    <div class="col s4">
                                        <b>Kategori Barang :</b><br>
                                        <span class="wrap-text">
                                            {{$barang->KategoriBarang}}
                                        </span>
                                    </div>
                                    <div class="col s4">
                                        <b>Kondisi Barang :</b><br>
                                        <span class="wrap-text">
                                            {{$barang->KondisiBarang}}
                                        </span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col s4">
                                        <b>Penanggung Jawab :</b><br>
                                        <span class="wrap-text">
                                            {{$barang->Penanggungjawab}}
                                        </span>
                                    </div>
                                    <div class="col s4">
                                        <b>Spesifikasi Barang :</b><br>
                                        <span class="wrap-text">
                                            {{$barang->SpesifikasiBarang}}
                                        </span>
                                    </div>
                                    <div class="col s4">
                                        <b>Keterangan Barang :</b><br>
                                        <span class="wrap-text">
                                            {{$barang->KeteranganBarang}}
                                        </span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col s4">
                                        <b>Kuantitas :</b><br>
                                        {{$barang->Kuantitas}}

                                    </div>
                                    <div class="col s4">
                                        <b>Keterangan :</b><br>
                                        <span class="wrap-text">
                                            {{$barang->KeteranganBarang}}
                                        </span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    @endif

                    @endforeach
                </div>


                <!-- <hr> -->
                <div class="row">
                    <div class="col s12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-title">
                                    Catatan
                                </div><br>
                                <ul class="collection">
                                    <li class="collection-item">
                                        @foreach($data['allcatatan'] as $catatan)
                                            
                                        @if($catatan->IdPermohonan == $data['allpermohonan'][$i]->IdPermohonan)

                                        <b>Catatan {{ $catatan->Role }}:</b><br>
                                        <i>Oleh {{ $catatan->Nama }}</i><br>
                                        <p>{{ $catatan->DeskripsiCatatan }}</p>                            

                                        @endif

                                        @endforeach
                                    </li>
                                </ul>                                
                            </div>
                        </div>
                    </div>
                </div>     

             
                @if ($data['user_sess']->Role == 'Manager Fasilitas & Infrastruktur' || $data['user_sess']->Role == 'Staf Fasilitas & Infrastruktur' || $data['user_sess']->Role == 'Wakil Dekan')
                <div class="row"> 
                    <div class="col s12">
                        <div class="card">
                            <form action="{{ url('maintenancebarang/ubahstatus') }}" method="POST">
                                {!! csrf_field() !!}
                                <input type="hidden" name="hashPermohonan" value="{{ $data['allpermohonan'][$i]->hashPermohonan }}">

                                <div class="card-content">
                                    <div class="card-title">
                                        Persetujuan
                                    </div><br>
                                    
                                    <div class="row">
                                        <div class="col s12">
                                            @if (
                                                ($data['allpermohonan'][$i]->TahapPermohonan == 1 && $data['allpermohonan'][$i] -> StatusPermohonan== 0) ||
                                                ($data['allpermohonan'][$i]->TahapPermohonan == 1 && $data['allpermohonan'][$i] -> StatusPermohonan== 2) ||
                                                ($data['allpermohonan'][$i]->TahapPermohonan == 2 && $data['allpermohonan'][$i] -> StatusPermohonan== 2) 
                                            )
                                            
                                            @if ($data['allpermohonan'][$i]->NomorSurat == null)

                                            Nomor Surat <br>
                                            <input type="text" name="nomorsurat" required/><br>

                                            @endif                        

                                            Catatan: <br>
                                            <textarea class="materialize-textarea" class="validate" name="catatan_txtarea" cols="30" rows="30"placeholder="Jika tidak ada catatan tulis 'Tidak ada'" required></textarea>                                    

                                            @endif                                                                            
                                        </div>
                                    </div>                                
                                </div>    

                                <div class="card-action">
                                    <div class="row no-row">
                                        <div class="col s12">
                                            <button type="submit" value="SETUJU" name="setuju" class="btn waves-effect waves-light teal white-text right" style="margin-left: 12px">SETUJU</button>
                                            <button type="submit" value="TOLAK" name="tolak" class="waves-effect waves-red btn red right">TOLAK</button>                                            
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endif
                            
                @if ($data['user_sess']->Role != 'Manager Fasilitas & Infrastruktur' && $data['user_sess']->Role != 'Staf Fasilitas & Infrastruktur' && $data['user_sess']->Role != 'Wakil Dekan')
                <div class="row">                    
                    <div class="col s12">
                        <form action="" method="POST" class="right">
                            {!! csrf_field() !!}
                            <input type="hidden" name="hashPermohonan" value="{{ $data['allpermohonan'][$i]->hashPermohonan }}"/>                            
                            <a href="{{ url('maintenancebarang/ubah/'.$data['allpermohonan'][$i]->hashPermohonan) }}" class="btn waves-effect waves-light teal white-text">
                                UBAH
                                <i class="material-icons right">edit</i>
                            </a>
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