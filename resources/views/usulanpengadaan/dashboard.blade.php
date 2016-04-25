@extends('sidebar')

@section('sidebar_dashboard', 'active')

@section('konten')
<div class="subsection">
	<h5>Daftar Permohonan Usulan Pengadaan</h5>
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
		        <div class="col s5">Pengusulan Pengadaan AC</div>            
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
    			<a href="#barang-usulan" class="modal-trigger btn waves-light waves-effect">
                    LIHAT SEMUA USULAN BARANG
                </a>

                <div id="barang-usulan" class="modal">
                	<div class="modal-content">	
                		<h4>AC</h4>
                		 <div class="row">
                            
                            <div class="col s4">
                                <b>Jenis Barang :</b><br>
                                AC
                            </div>
                            <div class="col s4">
                                <b>Kategori Barang :</b><br>
                                Elektronik
                            </div>
                            <div class="col s4">
                                <b>Kondisi Barang :</b><br>
                                Baru
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s4">
                                <b>Penanggung Jawab :</b><br>
                                Zahra Zuluthfa
                            </div>
                            <div class="col s4">
                            	<b>Link Anggaran :</b><br>
                            	bit.ly/LinkAnggaran
                            </div>
                        </div>
                        <div class="row">                            
                            <div class="col s4">
                                <b>Spesifikasi Barang : </b><br>
                                1/2 pk, merk panasonic
                            </div>
                            <div class="col s4">
                                <b>Keterangan Barang</b><br>
                                tidak ada
                            </div>
                        </div><hr>
                	</div>
                	<div class="modal-footer">
                        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">TUTUP</a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col s12">
                        <b>Catatan Staf Fasilitas & Infrastruktur:</b><br>
                        <i>Oleh Budi Santoso</i><br>
                        <p>asidhoiahdiaslnlasnla</p>
                       
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
    		</div>
    	</li>
    		<li>
    		<div class="collapsible-header active">

    			<div class="col s1">1</div>
		        <div class="col s5">Pengusulan Pengadaan AC</div>            
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
    			<a href="#barang-usulan" class="modal-trigger btn waves-light waves-effect">
                    LIHAT SEMUA USULAN BARANG
                </a>

                <div id="barang-usulan" class="modal">
                	<div class="modal-content">	
                		<h4>AC</h4>
                		 <div class="row">
                            
                            <div class="col s4">
                                <b>Jenis Barang :</b><br>
                                AC
                            </div>
                            <div class="col s4">
                                <b>Kategori Barang :</b><br>
                                Elektronik
                            </div>
                            <div class="col s4">
                                <b>Kondisi Barang :</b><br>
                                Baru
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s4">
                                <b>Penanggung Jawab :</b><br>
                                Zahra Zuluthfa
                            </div>
                            <div class="col s4">
                            	<b>Link Anggaran :</b><br>
                            	bit.ly/LinkAnggaran
                            </div>
                        </div>
                        <div class="row">                            
                            <div class="col s4">
                                <b>Spesifikasi Barang : </b><br>
                                1/2 pk, merk panasonic
                            </div>
                            <div class="col s4">
                                <b>Keterangan Barang</b><br>
                                tidak ada
                            </div>
                        </div><hr>
                	</div>
                	<div class="modal-footer">
                        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">TUTUP</a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col s12">
                        <b>Catatan Staf Fasilitas & Infrastruktur:</b><br>
                        <i>Oleh Budi Santoso</i><br>
                        <p>asidhoiahdiaslnlasnla</p>
                       
                    </div>
                </div>
               <!-- <div class="row">
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
                </div> -->
                <div class="row">
                <form action="" method="POST">
          
                        <div class="col s12">                                               
                            {!! csrf_field() !!}
                            <input type="hidden" name="hashPermohonan" value=""><br>
                            Catatan Manajer Fasilitas & Infrastruktur: <br>
                            <textarea placeholder="Jika tidak ada catatan tulis 'Tidak ada'" class="materialize-textarea" class="validate" name="catatan_txtarea" cols="30" rows="30" required></textarea>
                            <input type="submit" value="TOLAK" name="tolak" class="waves-effect waves-red btn red right"/>
                            <input type="submit" value="SETUJU" name="setuju" class="btn waves-effect waves-light teal white-text right"/>
                        </div>
                </form>
                </div>
    		</div>
    	</li>
    		<li>
    		<div class="collapsible-header active">

    			<div class="col s1">1</div>
		        <div class="col s5">Pengusulan Pengadaan AC</div>            
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
    			<a href="#barang-usulan" class="modal-trigger btn waves-light waves-effect">
                    LIHAT SEMUA USULAN BARANG
                </a>

                <div id="barang-usulan" class="modal">
                	<div class="modal-content">	
                		<h4>AC</h4>
                		 <div class="row">
                            
                            <div class="col s4">
                                <b>Jenis Barang :</b><br>
                                AC
                            </div>
                            <div class="col s4">
                                <b>Kategori Barang :</b><br>
                                Elektronik
                            </div>
                            <div class="col s4">
                                <b>Kondisi Barang :</b><br>
                                Baru
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s4">
                                <b>Penanggung Jawab :</b><br>
                                Zahra Zuluthfa
                            </div>
                            <div class="col s4">
                            	<b>Link Anggaran :</b><br>
                            	bit.ly/LinkAnggaran
                            </div>
                        </div>
                        <div class="row">                            
                            <div class="col s4">
                                <b>Spesifikasi Barang : </b><br>
                                1/2 pk, merk panasonic
                            </div>
                            <div class="col s4">
                                <b>Keterangan Barang</b><br>
                                tidak ada
                            </div>
                        </div><hr>
                	</div>
                	<div class="modal-footer">
                        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">TUTUP</a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col s12">
                        <b>Catatan Staf Fasilitas & Infrastruktur:</b><br>
                        <i>Oleh Budi Santoso</i><br>
                        <p>asidhoiahdiaslnlasnla</p>
                       
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
    		</div>
    	</li>
    </ul>

</div>
@stop