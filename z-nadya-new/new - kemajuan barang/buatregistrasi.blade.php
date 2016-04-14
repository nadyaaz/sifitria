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
        <form action="{{url('registrasibarang/buat') }}" method="POST" >
        {!! csrf_field() !!}
        
        <input type ="hidden" name="UserId" value="{{$data['user_sess']->npm}}"/>
        
        <div class="col s12">
          Nomor Surat : <br>
          <span class ="text-red input-error">
            {{$errors->first('surat')}}<br>
          </span>
            <input name="surat" type="text" value="{{old('surat')}}">
          </span>
      </div>

      <div class="col s12">
        Subjek Permohonan : <br>
        <span class ="text-red input-error">
          {{$errors->first('subjek')}}<br>
        </span>
          <input name="subjek" type="text" value="{{old('subjek')}}">
      </div>
      
      <div class="col s12">
        Id Kandidat Barang : <br>
        <span class ="text-red input-error">
          {{$errors->first('kandidatid')}}<br>
        </span>
          <input name="kandidatid" type="text" value="{{old('kandidatid')}}">
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
        Penanggung Jawab: <br>
         <span class ="text-red input-error">
          {{$errors->first('pj')}}<br>
        </span>
          <input name="pj" type="text" value="{{old('pj')}}">
      </div>
      
      <div class="col s12">
        Jenis Barang: <br>
         <span class ="text-red input-error">
          {{$errors->first('jenis')}}<br>
        </span>
          <input name="jenis" type="text">
      </div>
      
      <div class="col s12">
        Keterangan : <br>
         <span class ="text-red input-error">
          {{$errors->first('keterangan')}}<br>
        </span>
          <input name= "keterangan" type="text" value="{{old('keterangan')}}">
      </div>
          
      <div class="row">
        <div class="col s12">
          <button class="btn waves-effect waves-light" type="submit" name="Submit"> Submit
          </button>
        </div>
      </div>
    </form>
  </div>    
</div>
@stop
