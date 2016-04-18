@extends('sidebar')

@section('sidebar_buatregis', 'active')

@section('konten')
<div class="subsection">
    <h5>Buat Permohonan Registrasi Barang</h5>
    <div class="divider"></div><br>

    <div id="multiform" class="row">
        <form action="{{ url('registrasibarang/ubah') }}" method="POST">
            <div class="row form-row">
                <div class="col s6">
                    <b>Subjek</b><br>
                    <input type="hidden" name="hashPermohonan" value="{{ $registrasi[0]['hashPermohonan'] }}">
                    <input name="subjek" placeholder="Permohonan Registrasi Barang BEM" id="subject" type="text" class="validate" value="{{ (isset($data['registrasi'])) ? ($data['registrasi'][0]['SubjekPermohonan']) : old('subjek') }}">
                </div><br>

                <div class="col s12">
                    <b>Catatan Pemohon</b> <br> 
                    <input type="hidden" name="hashCatatan" value="{{ $data['catatan'][0]['hashCatatan'] }}">
                    <textarea name="catatanpemohon" class="materialize-textarea" length="240">{{ (isset($data['catatan'][0])) ? ($data['catatan'][0]['DesksripsiCatatan']) : old('catatanpemohon') }}</textarea>
                </div>
            </div><br><hr>

            <div id="barang-multiform">             
                @for($i=1; $i <= count($data['allkandidat']); $i++)
                <div id="barang-form[{{$i}}]">
                    <input type="hidden" name="hashKandidat[{{$i}}]" value="{{ $data[$i]['hashKandidat'] }}">
                    <div class="valign-wrapper">                    
                        <span class="valign judul-add-barang">Barang</span>&nbsp;&nbsp;
                    </div>
                    <div class="row form-row">
                        <div class="col s6 input-field">
                            Nama Barang <br>
                            <span class="error red-text">{{ $errors->first('namabarang.'.$i) }}</span><br>
                            <input type="text" name="namabarang[{{$i}}]" length="100" value="{{ (isset($data['allkandidat'])) ? ($data['allkandidat'][$i-1]['NamaBarang']) : old('namabarang.'.$i) }}">                          
                        </div>

                        <div class="col s2 input-field">
                            Tanggal Beli <br>
                            <span class="error red-text">{{ $errors->first('tanggalbeli.'.$i) }}</span><br>                 
                            <input type="date" name="tanggalbeli[{{$i}}]" value="{{ (isset($data['allkandidat'])) ? (date('d M Y', strtotime($data['allkandidat'][$i-1]['TanggalBeli']))) : old('tanggalbeli.'.$i) }}" class="datepicker">          
                        </div>

                        <div class="col s4 input-field">
                            Penanggung Jawab <br> 
                            <span class="error red-text">{{ $errors->first('penanggungjawab.'.$i) }}</span><br>                 
                            <input type="text" name="penanggungjawab[{{$i}}]" length="100" value="{{ (isset($data['allkandidat'])) ? ($data['allkandidat'][$i-1]['Penanggungjawab']) : old('penanggungjawab.'.$i) }}" class="">           
                        </div>      
                    </div>   

                    <div class="row form-row">
                        <div class="col s2 input-field">
                            Kategori Barang <br>
                            <span class="error red-text">{{ $errors->first('kategoribarang.'.$i) }}</span><br>                  
                            <select name="kategoribarang[{{$i}}]">
                                <option disabled selected>Kategori Barang</option>
                                <option value="Elektronik">Elektronik</option>
                                <option value="Furnitur">Furnitur</option>
                                <option value="Kategori A">Kategori A</option>
                                <option value="Kategori B">Kategori B</option>
                                <option value="Kategori C">Kategori C</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>           
                        </div>

                        <div class="col s4 input-field">
                            Jenis Barang <br>
                            <span class="error red-text">{{ $errors->first('jenisbarang.'.$i) }}</span><br>                 
                            <input id="jenisbarang1" type="text" name="jenisbarang[{{$i}}]" value="{{ (isset($data['allkandidat'])) ? ($data['allkandidat'][$i-1]['JenisBarang']) : old('jenisbarang.'.$i) }}" length="100" class="">         
                        </div>          

                        <div class="col s6 input-field">
                            Kondisi Barang <br>
                            <span class="error red-text">{{ $errors->first('kondisibarang.'.$i) }}</span><br>                   
                            <select name="kondisibarang[{{$i}}]">
                                <option disabled selected>Kondisi Barang</option>
                                <option value="Baru">Baru</option>
                                <option value="Bekas">Bekas</option>
                                <option value="Rusak">Rusak</option>                                
                            </select>
                        </div>
                    </div>

                    <div class="row form-row">                           
                        <div class="col s4 input-field">
                            Spesifikasi Barang <br>
                            <span class="error red-text">{{ $errors->first('spesifikasibarang.'.$i) }}</span><br>                   
                            <textarea name="spesifikasibarang[{{$i}}]" class="materialize-textarea" cols="30" rows="10">{{ (isset($data['allkandidat'])) ? ($data['allkandidat'][$i-1]['SpesifikasiBarang']) : old('spesifikasibarang.'.$i) }}</textarea>
                        </div>

                        <div class="col s4 input-field">
                            Keterangan Barang <br>
                            <span class="error red-text">{{ $errors->first('keteranganbarang.'.$i) }}</span><br>                    
                            <textarea name="keteranganbarang[{{$i}}]" class="materialize-textarea" cols="30" rows="10">{{ (isset($data['allkandidat'])) ? ($data['allkandidat'][$i-1]['KeteranganBarang']) : old('keteranganbarang.'.$i) }}</textarea>
                        </div>    
                    </div><hr>
                </div>      
                @endfor
            </div>
            
            <div class="row">
                <div class="col s4 offset-s4 valign-wrapper">
                    <div class="valign">    
                        {!! csrf_field() !!}                    
                        <button class="btn waves-light waves-effect teal">
                            UBAH REGISTRASI BARANG
                            <i class="material-icons right">send</i>
                        </button>&nbsp;&nbsp;               
                    </div>
                </div>        
            </div>
        </form>
    </div>
</div>
@stop