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
            <div class="collapsible-header">                              
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
                    
                    @else
                        {{ 'Disetujui' }}
                    
                    @endif
                </div>

                @if($peminjaman->StatusPermohonan === 0)                        
                    
                @endif
            
            </div>

            <div class="collapsible-body">
                
                <div class = "row">
                    <div class="col s4">
                        <b>Nomor Surat:</b><br>
                        {{ $peminjaman->NomorSurat }}
                    </div>
                    <div class="col s4">
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

                @if($peminjaman->StatusPermohonan == 0)
                <div class="row">                    
                    <div class="col s12">
                        <form action="{{ url('pinjamruang/setuju') }}" method="POST">
                            {!! csrf_field() !!}
                            <input type="hidden" name="Id" value="{{ $peminjaman->IdPermohonan }}"/>
                            <input type="hidden" name="UserId" value="{{ $data['user_sess']->npm }}"/>
                            Catatan: <br>
                            <textarea name="catatan_txtarea" cols="30" rows="30"></textarea>
                            <button name="persetujuan" value = "setuju" class="btn waves-effect waves-light teal white-text right">
                                SETUJU
                                <i class="material-icons white-text right">done</i>
                            </button>
                            <button name="persetujuan" value = "tolak" class="btn waves-effect waves-light red white-text left">                       
                                TOLAK
                                <i class="material-icons white-text right">clear</i>
                            </button>  
                        </form>                                                              
                    </div>
                </div>

                <div class="row">
                    <div class="col s12 ">                            
                        <form action="{{ url('pinjamruang/batal') }}" method="POST" class="right">
                            {!! csrf_field() !!}
                            <input type="hidden" name="Id" value="{{ $peminjaman->IdPermohonan }}"/>
                            <button class="btn waves-effect waves-light teal white-text left">
                                BATAL                                
                            </button>
                        </form> 
                    </div>
                </div>
                @endif

            </div>         
        </li>

        @endforeach
    </ul>
</div>                    
@stop