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
			<div id="jenisruang-select" class="input-field col s12">
				Pilih Ruangan
			    <select id="nomorruang" name="nomorruang">
			    	@foreach ($data['allgedung'] as $gedung)
				    <optgroup label="{{ $gedung->Nama }}">

					@foreach ($data['allruangan'] as $ruangan)

					@if($ruangan->IdGedung == $gedung->IdGedung)
				        <option value="{{ $ruangan->NomorRuangan }}">{{ $ruangan->NomorRuangan }}</option>
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
		// tooltip settings
		$('.tooltipped').tooltip({delay: 50});

		// fullCalendar sources
		var sources = {
			RuangRapatBesar: {
				url: 'jadwal/get?jenisruang=RuangRapatBesar',
	            color: '#F44336'
			},
			RuangRapatKecil: {
				url: 'jadwal/get?jenisruang=RuangRapatKecil',
	            color: '#3F51B5'
			},
			Auditorium: {
				url: 'jadwal/get?jenisruang=Auditorium',
	            color: '#4CAF50'
			},
			Kelas: {
				url: 'jadwal/get?jenisruang=Kelas&nomorruang=',
	            color: '#FFC107'
			}
		};		

		// AJAX setup, set headers attribut ' X-CSRF-Token' to validate the laravel POST request method
		$.ajaxSetup({
			headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
		});

		// enabled ruang kelas selection
		$('input[type=radio][name=jenisruang]').change(function(){						
			$value = $(this).val();			

			if ($value == 'Kelas') {
				$('#jenisruang-select').show();
			} else {
				$('#jenisruang-select').hide();
			}
		});		

		var current = '';

		// initiate and set the fullCalendar object
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
			type: 'POST'	
	        error: function() { alert('Terjadi error ketika mencoba mengambil jadwal. Silakan refresh kembali. Tekan F5.'); },
			eventSources: [		        
		        sources.RuangRapatBesar, sources.RuangRapatKecil, sources.Auditorium, sources.Kelas		        
		    ],
		    eventRender: function(event, element) {
		        element.attr('title', event.tooltip);
		    }
	    });

		// get jadwal when button clicked
	    $('#get-jadwal').click(function(){	    	
	    	if (current == 'RuangRapatBesar') {
	    		$('#calendar').fullCalendar('removeEventSource', sources.RuangRapatBesar);
	    	} else if (current == 'RuangRapatKecil') {
	    		$('#calendar').fullCalendar('removeEventSource', sources.RuangRapatKecil);	
	    	} else if (current == 'Auditorium') {
	    		$('#calendar').fullCalendar('removeEventSource', sources.Auditorium);
	    	} else if (current == 'Kelas') {
	    		$('#calendar').fullCalendar('removeEventSource', sources.Kelas);
	    		sources.Kelas.url = 'jadwal/get?jenisruang=Kelas&nomorruang=';
	    	} else {
	    		$('#calendar').fullCalendar('removeEventSource', sources.RuangRapatBesar);
	    		$('#calendar').fullCalendar('removeEventSource', sources.RuangRapatKecil);	
	    		$('#calendar').fullCalendar('removeEventSource', sources.Auditorium);
	    		$('#calendar').fullCalendar('removeEventSource', sources.Kelas);
	    	}

	    	var selected = $('input[type=radio][name=jenisruang]:checked').val();
	    	current = selected;

	    	if (selected == 'RuangRapatBesar') {
	    		$('#calendar').fullCalendar('addEventSource', sources.RuangRapatBesar);
	    	} else if (selected == 'RuangRapatKecil') {
	    		$('#calendar').fullCalendar('addEventSource', sources.RuangRapatKecil);		    		
	    	} else if (selected == 'Auditorium') {
	    		$('#calendar').fullCalendar('addEventSource', sources.Auditorium);
	    	} else if (selected == 'Kelas') {
	    		var ruangan = $('select[name=nomorruang]').val();
	    		sources.Kelas.url += ruangan;
	    		alert(sources.Kelas.url);
	    		$('#calendar').fullCalendar('addEventSource', sources.Kelas);
	    	}

	    	$('#calendar').fullCalendar('refetchEvents');	    		    
	    });
	});
</script>
@endsection
