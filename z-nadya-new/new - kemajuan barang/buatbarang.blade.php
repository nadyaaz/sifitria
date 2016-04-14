@extends('master')

@section('modul')
    Peminjaman Ruangan
@stop

@section('user-role')
    Jundi Ahmad Alwan (mahasiswa)
@stop

@section('title')
    Buat Permohonan Registrasi Barang
@stop

@section('sidebar1')
  Dashboard
@stop

@section('sidebar2')
   Buat Permohonan Registrasi Barang
@stop

@section('sidebar2_active')
    active
@stop

@section('konten')
    <div class="subsection">
    <div class="row">
        <form action="{{url('registrasibarang/barang/buat') }}" method="POST" >
            {!! csrf_field() !!}
          
            <div class="col s12">
                Id Barang : <br><input name="id" type="text">
            </div>
          
            <div class="col s12">
                Nama Barang : <br>
                <span class ="text-red input-error">
                    {{$errors->first('nama')}}<br>
                </span>
                    <input name="nama" type="text" value="{{old('nama')}}">
            </div>  
            
            <div class="col s12">
                Kategori : <br>
                <span class ="text-red input-error">
                    {{$errors->first('kategori')}}<br>
                 </span>
                    <input name= "kategori" type="text" value="{{old('kategori')}}">
            </div>  
            
            <div class="col s12">
                Kondisi : <br>
                  <span class ="text-red input-error">
                    {{$errors->first('kondisi')}}<br>
                </span>
                    <input name= "kondisi" type="text" value="{{old('kondisi')}}">
            </div>  

            <div class="col s12">
                Spesifikasi : <br> 
                <span class ="text-red input-error">
                    {{$errors->first('spesifikasi')}}<br>
                </span>
                    <input name= "spesifikasi" type="text" value="{{old('spesifikasi')}}">
            </div>
            
            <div class="col s12">
                Penanggungjawab: <br>
                <span class ="text-red input-error">
                    {{$errors->first('pj')}}<br>
                </span>
                    <input name="pj" type="text" value="{{old('pj')}}">
            </div>
            
            <div class="col s12">
                Keterangan : <br>
                 <span class ="text-red input-error">
                    {{$errors->first('ket')}}<br>
                </span>
                    <input name= "ket" type="text" value="{{old('ket')}}">
            </div>
           
            <div class="col s12">
                Kerusakan Barang : <br><input name="rusak" type="text">
            </div>
            
            <div class="row">
                <div class="col s12">
                    <button class="btn waves-effect waves-light" type="submit" name="Submit">   Submit
                    </button>
                </div>
            </div>
        </form>
    </div>      
</div>
@stop
