@extends('sidebar')

@section('sidebar_dashboard', 'active')

@section('konten')
<div class="subsection">
    <h5>Daftar Permohonan Peminjaman Ruangan</h5>
    <div class="divider"></div><br>
    
    <div id="tableHead" class="row">
        <div class="col s1">Id</div>
        <div class="col s2">Ruangan</div>
        <div class="col s2">Tanggal Pinjam</div>
        <div class="col s2">Waktu Pinjam</div>
        <div class="col s2">Pemohon</div>
        <div class="col s2">Status</div>        
    </div>

    <ul class="collapsible" data-collapsible="accordion">        
        @foreach($data['allpermohonan'] as $peminjaman)                
        <li>            
            <div class="collapsible-header active">                              
                <div class="col s1"> {{ $peminjaman->IdPermohonan }} </div>
                <div class="col s2"> {{ $peminjaman->JenisRuangan }} </div>
                <div class="col s2"> {{ date('j F Y', strtotime($peminjaman->WaktuMulai)) }} </div>
                <div class="col s2"> {{ date('H:i', strtotime($peminjaman->WaktuMulai)) }} - {{ date('H:i', strtotime($peminjaman->WaktuSelesai)) }} </div>
                <div class="col s2"> {{ $peminjaman->Nama }} </div>
                <div class="col s2">                         
                    @if($peminjaman->StatusPermohonan === 0)
                        {{ 'Sedang Menunggu Persetujuan' }}                   
                    @elseif($peminjaman->StatusPermohonan === 1)
                        {{ 'Ditolak' }}                    
                    @elseif($peminjaman->StatusPermohonan === 2)
                        {{ 'Disetujui' }}                    
                    @endif
                </div>            
            </div>

            <div class="collapsible-body">
                
                <div class = "row">
                    <div class="col s6">
                        
                        @if ($data['user_sess']->role == 'Staf PPAA' || $data['user_sess']->role == 'Staf Sekretariat')

                            @if ($peminjaman->NomorSurat != null)                            
                            <b>Nomor Surat:</b><br>
                            {{ $peminjaman->NomorSurat }}
                            @else
                            <b>Nomor Surat:</b><br>
                            <span class="grey-text"><i>Belum ada nomor surat</i></span>
                            @endif

                        @else

                            @if ($peminjaman->NomorSurat != null)
                            <b>Nomor Surat:</b><br>
                            {{ $peminjaman->NomorSurat }}
                            @else
                            <b>Nomor Surat:</b><br>
                            <span class="grey-text"><i>Belum ada nomor surat</i></span>
                            @endif

                        @endif
                    </div>
                    <div class="col s6">
                        <b>Waktu Permohonan:</b><br>
                        {{ date('j F Y, H:i', strtotime($peminjaman->created_at)) }}
                    </div>                    
                </div>
                
                <div class="row">
                    <div class="col s6">
                        <b>Subjek Permohonan:</b><br>
                        {{ $peminjaman->SubjekPermohonan }}
                    </div>
                    <div class="col s6">
                        <b>Keperluan Peminjaman:</b><br>
                        {{ $peminjaman->KeperluanPeminjaman }}
                    </div>
                </div>

                <div class="row">
                    <div class="col s6">
                        <b>Gedung:</b><br>
                        {{ $peminjaman->NamaGedung }}
                    </div>
                    <div class="col s6">
                        <b>Ruangan:</b><br>
                        {{ $peminjaman->NomorRuangan }}
                    </div>
                </div>
                
                @foreach($data['allcatatan'] as $catatan)

                @if($catatan->IdPermohonan == $peminjaman->IdPermohonan)
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
                <hr>
                <div class="row"> 
                    @if ($data['user_sess']->role == 'Staf PPAA' || $data['user_sess']->role == 'Staf Sekretariat')
                    
                    @if ($peminjaman->StatusPermohonan == 0)
                    <form action="{{ url('pinjamruang/ubah') }}" method="POST">
                        <div class="col s6">
                            <b>Setujui/Tolak Permohonan</b><br>
                            @if ($peminjaman->NomorSurat == null)
                            Nomor Surat <br>
                            <input type="text" name="nomorsurat" required/>
                            @endif                        
                        </div>
                        <div class="col s12">                                               
                            {!! csrf_field() !!}
                            <input type="hidden" name="hashPermohonan" value="{{ $peminjaman->hashPermohonan }}"><br>
                            Catatan: <br>
                            <textarea class="materialize-textarea" class="validate" name="catatan_txtarea" cols="30" rows="30" required>Jika tidak ada catatan tulis "Tidak ada"</textarea>
                            <input type="submit" value="TOLAK" name="tolak" class="waves-effect waves-red btn red right"/>
                            <input type="submit" value="SETUJU" name="setuju" class="btn waves-effect waves-light teal white-text right"/>
                        </div>
                    </form>
                    @endif

                    @endif
                </div>

                <div class="row">
                    @if (!($data['user_sess']->role == 'Staf PPAA') && !($data['user_sess']->role == 'Staf Sekretariat'))

                    @if($peminjaman->StatusPermohonan == 0)
                    <div class="col s1 right">                        
                        <form name="userbatal" action="{{ url('pinjamruang/batal') }}" method="POST" class="right">
                            {!! csrf_field() !!}
                            <input type="hidden" name="hashPermohonan" value="{{ $peminjaman->hashPermohonan }}"/>                            
                            <button class="btn waves-effect waves-light red white-text">                                
                                <i class="material-icons">delete</i>
                            </button>
                        </form> 
                    </div>
                    @endif

                    @endif
                </div>
            </div>         
        </li>        
        @endforeach
    </ul>
</div>                    
@stop