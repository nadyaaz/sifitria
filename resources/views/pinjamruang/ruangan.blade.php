@extends('sidebar')

@section('sidebar_ruangan', 'active')

@section('table_head')
<div id="tableHead" class="row">
    <div class="col s2">No. Ruangan</div>
    <div class="col s2">Gedung</div>
    <div class="col s2">Jenis Ruangan</div>
    <div class="col s2">Kapasitas</div>
</div>
@endsection

@section('konten')
<div class="subsection">
    <h5>Daftar Ruangan</h5>
    <div class="divider"></div><br>

    <div class="row">
        <div class="col s12">
            <ul class="tabs">
                <li class="tab col s2"><a class="active" href="#test1">Gedung G</a></li>
                <li class="tab col s2"><a href="#test2">Gedung M</a></li>
            </ul>
        </div>

        @for ($i = 1; $i < 3; $i++)
        <div id="test{{ $i }}" class="col s12">      
            <br>
            @yield('table_head')

            <ul class="collapsible" data-collapsible="accordion">
                @foreach ($data['allruangan'] as $ruangan)
                                
                @if ( ($ruangan->Gedung == 'G' && $i == 1) || ($ruangan->Gedung == 'M' && $i == 2) )                
                <li>
                    <div class="collapsible-header active">                        
                        <div class="col s2"> {{ $ruangan->IdRuangan }} </div>
                        <div class="col s2"> {{ $ruangan->Gedung }} </div>
                        <div class="col s2"> {{ $ruangan-> NomorRuangan }} </div>
                        <div class="col s2"> {{ $ruangan-> NomorRuangan }} </div>                    
                    </div>

                    <div class="collapsible-body">
                        <div class = "row">
                            <div class="col s6">
                                <b>Gedung</b><br>
                                {{ $ruangan->Gedung }}
                            </div>

                            <div class="col s6">
                                <b>Nomor Ruangan</b><br>
                                {{ $ruangan-> NomorRuangan }}
                            </div>
                        </div> 

                        <div class = "row">
                            <div class="col s6">
                                <b>Jenis Ruangan</b><br>
                                {{ $ruangan-> JenisRuangan }}
                            </div>

                            <div class="col s6">
                                <b>Kapasitas Ruangan</b><br>
                                {{ $ruangan-> KapasitasRuangan.' orang' }}
                            </div>
                        </div> 
                    </div>                 
                </li>
                @endif
                <!-- end if check ruangan -->

                @endforeach
                <!-- end foreach allruangan -->
            </ul>
        </div>
        @endfor

    </div>    
</div>
                    
@stop  
<!-- stop section  -->                       