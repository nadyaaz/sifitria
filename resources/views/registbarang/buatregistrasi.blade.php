@extends('sidebar')

@section('sidebar_buatregis', 'active')

@section('konten')
<div class="subsection">
    <h5>Buat Permohonan Registrasi Barang</h5>
    <div class="divider"></div><br>

    <div class="row">
        <div class="col s6">
            <b>Subjek</b><br>
            <input  placeholder="Permohonan Registrasi Barang BEM" id="subject" type="text" class="validate">
        </div><br>

        <div class="col s12">
            <b>Catatan Pemohon</b> <br>
            <textarea class="materialize-textarea" length="240"></textarea>
        </div>
    </div><br>      
    
    <div class="barang-multiform">
        <div class="barang-form1">
            <hr><br><br>

            <div class="row">
                <div class="col s6">
                    <b>Nama Barang</b><br>
                    <input placeholder="contoh: Laptop Asus 23"  id="subject" type="text" class="validate">
                </div>
                <div class="col s6">
                    <b>Spesifikasi</b><br>
                    <input placeholder="contoh : RAM 4GB, 11 inch" id="spesifikasi" type="text" class="validate">           
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6" style="margin-top: 0px;">
                    <b>Kategori</b><br>
                    <select>
                        <option value="" disabled selected>Pilih Kategori</option>
                        <option value="Elektronik">Elektronik</option>
                        <option value="Furnitur">Furnitur</option>
                        <option value="Kategori A">Kategori A</option>
                        <option value="Kategori B">Kategori B</option>
                        <option value="Kategori C">Kategori C</option>
                        <option value="Kategori C">Lainnya</option>
                    </select>
                </div>

                <div class="col s6">
                    <b>Tanggal Beli</b><br>
                    <input type="date" id="tanggalbeli"class="datepicker">
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6" style="margin-top: 0px;">
                    <b>Kondisi</b><br>
                    <select>
                        <option value="" disabled selected>Pilih Kondisi</option>
                        <option value="Baru">Baru</option>
                        <option value="Bekas">Bekas</option>
                        <option value="Bekas">Rusak</option>
                    </select>
                </div>

                <div class="col s6">
                    <b>Jenis</b><br>
                    <input placeholder="contoh : Laptop" id="jenis" type="text" class="validate">
                </div>
            </div>

            <div class="row">
                <div class="col s12">
                    <b>Keperluan</b><br>
                    <input placeholder="contoh: untuk inventaris BEM" id="jenis" type="text" class="validate">
                </div>
            </div>

            <div class="col s12">
                <b>Kerusakan Barang</b><br>
                <input placeholder="contoh: lecet sedikit, namun masih berfungsi dengan baik" id="jenis" type="text" class="validate">
            </div><hr>
        </div>
    </div>

    <div class="row">
        <div class="col s4 offset-s4 valign-wrapper">
            <div class="valign">    
                <form action="{{ url('registrasibarang/buat') }}" method="POST"> 
                    {!! csrf_field() !!}                    
                    <button class="btn waves-light waves-effect teal">
                        BUAT SEMUA BARANG
                        <i class="material-icons right">send</i>
                    </button>&nbsp;&nbsp;               
                </form>             
            </div>
        </div>
        <div class="col s4">                
            <a id="add-new-form" class="btn-floating tooltipped waves-effect waves-light right red" 
                data-position="left" 
                data-delay="10" 
                data-tooltip="TAMBAH BARANG">
                <i class="material-icons">add</i>
            </a>
        </div>
    </div>
</div>
@stop