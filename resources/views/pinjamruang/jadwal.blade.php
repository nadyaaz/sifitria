@extends('sidebar')

@section('sidebar_jadwal', 'active')

@section('fullcalendar')
<script type="text/javascript" src="{{ url('js/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ url('js/fullcalendar.min.js') }}"></script>	    
@endsection

@section('konten')
	<div class="subsection">
		<div class="row">
			<div class="col s12">			
				Pilih Jenis Ruangan :	 		
			</div><br>
			<div class="col s12">		 					
				<div class="col s3">
					<input name="jenisruang" type="radio" id="RuangRapatBesar" value="RuangRapatBesar"/>
				    <label for="RuangRapatBesar">Ruang Rapat Besar</label>				    
				</div>

				<div class="col s3">
					<input name="jenisruang" type="radio" id="RuangRapatKecil" value="RuangRapatKecil"/>
				    <label for="RuangRapatKecil">Ruang Rapat Kecil</label>				    
				</div>

				<div class="col s3">
				    <input name="jenisruang" type="radio" id="Auditorium" value="Auditorium"/>
				    <label for="Auditorium">Ruang Auditorium</label>							
				</div>	

				<div class="col s3">
					<input name="jenisruang" type="radio" id="Kelas" value="Kelas"/>
				    <label for="Kelas">Ruang Kelas</label>			 					
				</div>	
			</div>
		</div>

		<div class="row">			
			<div id="ruangkelas-select" class="input-field col s12">
				Pilih Ruangan
			    <select id="jenisruang" name="jenisruang">
			    	@foreach ($data['allgedung'] as $gedung)
				    <optgroup label="{{ $gedung->Nama }}">

					@foreach ($data['allruangan'] as $ruangan)

					@if($ruangan->IdGedung == $gedung->IdGedung)
				        <option value="{{ str_replace('Gedung ','',$gedung->Nama).$ruangan->NomorRuangan }}" selected>{{ str_replace('Gedung ','',$gedung->Nama).$ruangan->NomorRuangan }}</option>
				    @endif

					@endforeach

			      	</optgroup>
			    	@endforeach			        	
			    </select>
			</div>
		</div>
		
		<div class="row">
			<div class="col s12">
				<a class="btn" id="get-jadwal">
					LIHAT JADWAL
					<i class="material-icons right">send</i>
				</a>									
			</div>
		</div><hr>

		<div class="row">
			<div id="calendar"></div>
		</div>		
	</div>
</div>
@stop

@section('ajax_calling')
<script>
	$(document).ready(function() {	
		$('.tooltipped').tooltip({delay: 50});
		
		var type = 'POST';

		var sources = {
			rapatbesar: {
				url: 'jadwal/get?jenisruang=RuangRapatBesar',
	            type: type,		            
	            success: function(result) { alert(result); },
	            error: function() { alert('Terjadi error ketika mencoba mengambil jadwal'); },
	            color: '#F44336'
			},
			rapatkecil: {
				url: 'jadwal/get?jenisruang=RuangRapatKecil',
	            type: type,		            
	            success: function(result) { alert(result); },
	            error: function() { alert('Terjadi error ketika mencoba mengambil jadwal'); },
	            color: '#3F51B5'
			},
			auditorium: {
				url: 'jadwal/get?jenisruang=Auditorium',
	            type: type,		            
	            success: function(result) { alert(result); },
	            error: function() { alert('Terjadi error ketika mencoba mengambil jadwal'); },
	            color: '#4CAF50'
			},
			kelas: {
				url: 'jadwal/get?jenisruang=Kelas',
	            type: type,		            
	            success: function(result) { alert(result); },
	            error: function() { alert('Terjadi error ketika mencoba mengambil jadwal'); },
	            color: '#FFC107'
			}
		};

		$.ajaxSetup({
			headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
		});			

		$('#calendar').fullCalendar({
	        header: {
	        	left: '',
				right: 'prev,next today',
				center: 'title',			
			},
			defaultView: 'agendaWeek', 
			columnFormat: {
	    		week: 'ddd' 
			},
			minTime: '08:00:00', 
	    	maxTime: '20:00:00', 
			displayEventTime: true, 
			editable: false,
			eventLimit: true,
			views: {
				agendaWeek: {
					eventLimit: 2,
				},
			},
			eventSources: [		        
		        sources.rapatbesar, sources.rapatkecil, sources.auditorium, sources.kelas		        
		    ],
		    eventRender: function(event, element) {
		        element.attr('title', event.tooltip);
		    }
	    });

	    $('#get-jadwal').click(function(){	    	
	    	$('#calendar').fullCalendar('refetchEvents');
	    });
	});
</script>
@endsection
