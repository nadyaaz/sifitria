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
    	<li>
    		<div class="collapsible-header active">

    			<div class="col s1">1</div>
		        <div class="col s5">Maintenance AC Kelas 2102</div>            
		        <div class="col s3">Dalam Proses Persetujuan</div>
		        <div class="col s3">Zahra Zuluthfa</div>
    		</div>
    		<div class="collapsible-body">
    			<div class="row">
    				<div class="col s4">
    					<b>Nomor Surat:</b><br>
    					SIFITRIA/UP/21/04
    				</div>
    				<div class="col s4">
    					<b>Waktu Permohonan:</b><br>
    					Kamis, 21 April 2016, 10:03
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
                    <div class="col s12">
                        <b>Keterangan Kerusakan :</b><br>
                        <p>askudksaoasn oiasud oaiofa oifhoias hfoashfoash fpoahfoia hfoahfoahsa</p>
                       
                    </div>
                </div>
               <div class="row">
                    <div class="col s11">
                        <form action="" method="POST" class="right">
                            {!! csrf_field() !!}
                            <input type="hidden" name="hashPermohonan" value=""/>                            
                            <button class="btn waves-effect waves-light teal white-text">
                                UBAH
                                <i class="material-icons right">edit</i>
                            </button>
                        </form> 
                    </div>
                    <div class="col s1">                        
                        <form action="" method="POST" class="right">
                            {!! csrf_field() !!}
                            <input type="hidden" name="hashPermohonan" value=""/>                            
                            <button class="btn waves-effect waves-light red white-text">                                
                                <i class="material-icons">delete</i>
                            </button>
                        </form> 
                    </div>
                </div>
               <!--  <div class="row">
                <form action="" method="POST">
          
                        <div class="col s12">                                               
                            {!! csrf_field() !!}
                            <input type="hidden" name="hashPermohonan" value=""><br>
                            <b>Catatan Staf Fasilitas & Infrastruktur: </b><br>
                            <textarea placeholder="Jika tidak ada catatan tulis 'Tidak ada'" class="materialize-textarea" class="validate" name="catatan_txtarea" cols="30" rows="30" required></textarea>
                            <input type="submit" value="TOLAK" name="tolak" class="waves-effect waves-red btn red right"/>
                            <input type="submit" value="SETUJU" name="setuju" class="btn waves-effect waves-light teal white-text right"/>
                        </div>
                </form>
                </div> -->
    		</div>
    	</li>
    </ul>
</div>
@stop