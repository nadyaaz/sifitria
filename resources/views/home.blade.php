@extends('sidebar')

@section('konten')
<div class="subsection">
    <h5>Pilih Jenis Layanan</h5>
    <div class="divider"></div><br>

    @if (!$data['isLoggedIn']) 
        Harap Melakukan login SSO terlebih dahulu
    @else
    <div class="row">
        <div class="col s3">
            <a href="{{ url('pinjamruang') }}">
                <div class="card-panel white center hoverable">
                    <i class="medium material-icons purple-text text-darken-4">home</i><br>
                    <h6 class="center-align">Peminjaman Ruangan</h6>
                </div>                    
            </a>
        </div>
        <div class="col s3">
            <a href="{{ url('registrasibarang') }}">                    
                <div class="card-panel white center hoverable">
                    <i class="medium material-icons purple-text text-darken-4">view_stream</i><br>
                    <h6 class="center-align">Registrasi Barang</h6>
                </div>
            </a>
        </div>
        <div class="col s3">
            <a href="{{ url('usulanpengadaan') }}">                    
                <div class="card-panel white center hoverable">
                    <i class="medium material-icons purple-text text-darken-4">shopping_cart</i><br>
                    <h6 class="center-align">Pengadaan Barang</h6>
                </div>
            </a>
        </div>
        <div class="col s3">
            <a href="{{ url('maintenancebarang') }}">                    
                <div class="card-panel white center hoverable">
                    <i class="medium material-icons purple-text text-darken-4">build</i><br>
                    <h6 class="center-align">Maintenance Barang</h6>
                </div>
            </a>
        </div>
    </div>
    @endif
</div>
@stop