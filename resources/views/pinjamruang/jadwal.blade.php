@extends('sidebar')

@section('tanggal-Senin')
	25-03-2016
@stop

@section('tanggal-Selasa')
	26-03-2016
@stop

@section('tanggal-Rabu')
	27-03-2016
@stop
@section('tanggal-Kamis')
	28-03-2016
@stop
@section('tanggal-Jumat')
	29-03-2016
@stop
@section('tanggal-Sabtu')
	30-03-2016
@stop
@section('tanggal-Minggu')
	31-03-2016
@stop

@section('sidebar_jadwal', 'active')

@section('konten')
	<div class="subsection">
		<div class="row">
			<div class="col s12">			
				Pilih Jenis Ruangan :	 		
			</div><br>
			<div class="col s9">		 					
				<div class="col s3">
					<input name="group1" type="radio" id="test3"  />
				    <label for="test3">Ruang Rapat Besar</label>				    
				</div>

				<div class="col s3">
					<input name="group1" type="radio" id="test3"  />
				    <label for="test3">Ruang Rapat Kecil</label>				    
				</div>

				<div class="col s3">
				    <input name="group1" type="radio" id="test2" />
				    <label for="test2">Ruang Auditorium</label>							
				</div>	

				<div class="col s3">
					<input name="group1" type="radio" id="test1" />
				    <label for="test1">Ruang Kelas</label>			 					
				</div>	
			</div>
		</div>
	
		<div class="row">
			<div class="input-field col s6">
				Pilih Ruangan
			    <select disabled>
			      	<optgroup label="Gedung M">
			        	<option value="M1102">M1102</option>
			        	<option value="M1103">M1103</option>
			      	</optgroup>
			      	<optgroup label="Gedung G">
			        	<option value="G1102">G1102</option>
			        	<option value="G1103">G1103</option>
			      	</optgroup>
			    </select>
			  </div>
		</div>

		<div id="jadwal-table" class="row">
		    <div id="previous-week"class="col s12 m4 l2">
		    	<a class="tooltipped btn-floating btn-large waves-effect waves-light red" data-position="bottom" data-delay="10" data-tooltip="Minggu Sebelumnya"><i class="material-icons" >skip_previous</i></a>
		    </div>
    		<div class="col s12 m4 l8">
    			<h5 class="center-align">Jadwal dari @yield('tanggal-Senin') s.d. @yield('tanggal-Minggu')</h5>
    		</div>
    		<div id="next-week"class="col s12 m4 l2">

    			<a id="next-jadwal"class=" tooltipped btn-floating btn-large waves-effect waves-light red" data-position="bottom" data-delay="10" data-tooltip="Minggu Selanjutnya"><i class="material-icons">skip_next</i></a>
    		</div>		
		</div>
		
		<div class="row" >		
			<div class="col s12"><p></p></div>
			<div class="col s12 m4 l2"><p></p></div>
			<div class="col s12 m4 l8"><hr></hr></div>
			<div class="col s12 m4 l2"><p></p></div>
		</div>

		<div class="row" style="margin-left: 25%;">
			<div class="col s2">
				<h6 class="center-align">Minggu-1</h6>
			</div>
			<div id="ruanganSelected"class="col s2">
				<h6 class="center-align">Minggu-2</h6>
			</div>
			<div class="col s2">
				<h6 class="center-align">Minggu-3</h6>
			</div>
			<div class="col s2">
				<h6 class="center-align">Minggu-4</h6>
			</div>
		</div>

		<hr>	 	
			
		<!-- nampilin query jadwal -->
		<div class="jadwal">
			<div class="row">
				<div class="col s2nanggung">
					<h6 class="center-align">Senin</h6>
					<h6 class="center-align">@yield('tanggal-Senin')</h6>
				</div>

				<div class="col s2nanggung">
					<h6 class="center-align">Selasa</h6>
					<h6 class="center-align">@yield('tanggal-Selasa')</h6>
				</div>
				<div class="col s2nanggung">
					<h6 class="center-align">Rabu</h6>
					<h6 class="center-align">@yield('tanggal-Rabu')</h6>
				</div>
				<div class="col s2nanggung">
					<h6 class="center-align">Kamis</h6>
					<h6 class="center-align">@yield('tanggal-Kamis')</h6>
				</div>
				<div class="col s2nanggung">
					<h6 class="center-align">Jumat</h6>
					<h6 class="center-align">@yield('tanggal-Jumat')</h6>
				</div>
				<div class="col s2nanggung">
					<h6 class="center-align">Sabtu</h6>
					<h6 class="center-align">@yield('tanggal-Sabtu')</h6>
				</div>
				<div class="col s2nanggung">
					<h6 class="center-align">Minggu</h6>
					<h6 class="center-align">@yield('tanggal-Minggu')</h6>
				</div>
			</div>

			<div class="row">
				<!-- Jadwal Hari Senin -->
				<div class="hari">
					<div class="col jadwal" style="">
						<h6 class="left-align">08:00</h6><br>
						<h6 class="center-align">Kelas</h6><br>
						<h6 class="left-align">09:00</h6>
					</div>
					<div class="col jadwal" style="">
						<h6 class="left-align">08:00</h6><br>
						<h6 class="center-align">Kelas</h6><br>
						<h6 class="left-align">09:00</h6>
					</div>
					<div class="col jadwal" style="">
						<h6 class="left-align">08:00</h6><br>
						<h6 class="center-align">Kelas</h6><br>
						<h6 class="left-align">09:00</h6>
					</div>
					<div class="col jadwal" style="">
						<h6 class="left-align">08:00</h6><br>
						<h6 class="center-align">Kelas</h6><br>
						<h6 class="left-align">09:00</h6>
					</div>
				</div>

				<!-- Jadwal Hari Selasa -->
				<div class="hari">
					<div class="col jadwal" style="">
						<h6 class="left-align">08:00</h6><br>
						<h6 class="center-align">Kelas</h6><br>
						<h6 class="left-align">09:00</h6>
					</div>				
				</div>

				<!-- Jadwal Hari Rabu -->
				<div class="hari">
					<div class="col jadwal" style="">
						<h6 class="left-align">08:00</h6><br>
						<h6 class="center-align">Kelas</h6><br>
						<h6 class="left-align">09:00</h6>
					</div>				
				</div>

				<!-- Jadwal Hari Kamis -->
				<div class="hari">
					<div class="col jadwal" style="">
						<h6 class="left-align">08:00</h6><br>
						<h6 class="center-align">Kelas</h6><br>
						<h6 class="left-align">09:00</h6>
					</div>				
				</div>

				<!-- Jadwal Hari Jumat -->
				<div class="hari">
					<div class="col jadwal" style="">
						<h6 class="left-align">08:00</h6><br>
						<h6 class="center-align">Kelas</h6><br>
						<h6 class="left-align">09:00</h6>
					</div>				
				</div>

				<!-- Jadwal Hari Sabtu -->
				<div class="hari">
					<div class="col jadwal" style="">
						<h6 class="left-align">08:00</h6><br>
						<h6 class="center-align">Kelas</h6><br>
						<h6 class="left-align">09:00</h6>
					</div>				
				</div>

				<!-- Jadwal Hari Minggu -->
				<div class="hari">
					<div class="col jadwal" style="">
						<h6 class="left-align">08:00</h6><br>
						<h6 class="center-align">Kelas</h6><br>
						<h6 class="left-align">09:00</h6>
					</div>				
				</div>
			</div>
		</div>
	</div>
</div>
@stop
