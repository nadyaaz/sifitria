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
        @foreach($data['allpermohonan'] as $maintenance)
    	<li>
    		<div class="collapsible-header active">

    			<div class="col s1">{{ $maintenance ->IdPermohonan}}</div>
		        <div class="col s5">{{ $maintenance ->SubjekPermohonan }}</div>            
		        <div class="col s3">
                    @if($maintenance->StatusPermohonan === 0)
                                    {{ 'Ditinjau ke Lapangan' }}                   
                    @elseif($maintenance->StatusPermohonan === 1)
                                    {{ 'Diverifikasi' }}                    
                                
                    @elseif($maintenance->StatusPermohonan === 2)
                                    {{ 'Ditolak' }}                    
                    @elseif($maintenance-> StatusPermohonan === 3)
                                    {{
                                        'Dalam Proses Perbaikan'
                                    }}
                    @elseif($maintenance-> StatusPermohonan === 4)
                                    {{
                                        'Permohonan Selesai'
                                    }}    
                    @endif
                </div>
		        <div class="col s3">Zahra Zuluthfa</div>
    		</div>
    		<div class="collapsible-body">
    			<div class="row">
    				<div class="col s4">
    					 @if ($maintenance->NomorSurat != null)
                                        <b>Nomor Surat:</b><br>
                                        {{ $maintenance->NomorSurat }}
                                        @else
                                        <b>Nomor Surat:</b><br>
                                        <span class="grey-text"><i>Belum ada nomor surat</i></span>
                        @endif
    				</div>
    				<div class="col s4">
    					<b>Waktu Permohonan:</b><br>
    					{{ date('j F Y, H:i', strtotime($maintenance->created_at)) }}
    				</div>
    			</div>
    			<div class="row">
    				<div class="col s4">
    					<b>Nama Barang :</b><br>
    					AC
    				</div>
    				<div class="col s4">
    					<b>Jenis Barang :</b><br>
    					AC
    				</div>
    				<div class="col s4">
    					<b>Kategori Barang :</b><br>
                        Elektronik
    				</div>
    			</div>
    	
                <div class="row">
                   <!--  -->
                </div>
                <div class="row"> 
                                @if ($data['user_sess']->role == 'Manager Fasilitas & Infrastruktur' || $data['user_sess']->role == 'Staf Fasilitas & Infrastruktur')
                                
                                @if (
                                    ($maintenance->TahapPermohonan == 1 && $maintenance->StatusPermohonan == 0) ||
                                    ($maintenance->TahapPermohonan == 1 && $maintenance->StatusPermohonan == 2 && $data['user_sess']->role == 'Manager Fasilitas & Infrastruktur') 
                                )
                                <form action="{{ url('registrasibarang/ubahstatus') }}" method="POST">
                                    <div class="col s6">
                                        <b>Setujui/Tolak Permohonan</b><br>
                                        @if ($maintenance->NomorSurat == null)
                                        Nomor Surat <br>
                                        <input type="text" name="nomorsurat" required/>
                                        @endif                        
                                    </div>
                                    <div class="col s12">                                               
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="hashPermohonan" value="{{ $maintenance->hashPermohonan }}"><br>
                                        Catatan: <br>
                                        <textarea class="materialize-textarea" class="validate" name="catatan_txtarea" cols="30" rows="30" required>Jika tidak ada catatan tulis "Tidak ada"</textarea>
                                        <input type="submit" value="TOLAK" name="tolak" class="waves-effect waves-red btn red right"/>
                                        <input type="submit" value="SETUJU" name="setuju" class="btn waves-effect waves-light teal white-text right"/>
                                    </div>
                                </form>
                                @endif

                                @endif
                            </div>
                            
                            @if ($data['user_sess']->role != 'Manager Fasilitas & Infrastruktur' && $data['user_sess']->role != 'Staf Fasilitas & Infrastruktur')
                            <div class="row">
                                <div class="col s11">
                                    <form action="" method="POST" class="right">
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="hashPermohonan" value="{{ $maintenance->hashPermohonan }}"/>                            
                                        <button class="btn waves-effect waves-light teal white-text">
                                            UBAH
                                            <i class="material-icons right">edit</i>
                                        </button>
                                    </form> 
                                </div>
                                <div class="col s1">                        
                                    <form action="" method="POST" class="right">
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="hashPermohonan" value="{{ $maintenance->hashPermohonan }}"/>                            
                                        <button class="btn waves-effect waves-light red white-text">                                
                                            <i class="material-icons">delete</i>
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