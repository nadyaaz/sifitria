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
					<input name="jenisruang" type="radio" id="rapatbesar" value="rapatbesar"/>
				    <label for="rapatbesar">Ruang Rapat Besar</label>				    
				</div>

				<div class="col s3">
					<input name="jenisruang" type="radio" id="rapatkecil" value="rapatkecil"/>
				    <label for="rapatkecil">Ruang Rapat Kecil</label>				    
				</div>

				<div class="col s3">
				    <input name="jenisruang" type="radio" id="audit" value="audit"/>
				    <label for="audit">Ruang Auditorium</label>							
				</div>	

				<div class="col s3">
					<input name="jenisruang" type="radio" id="kelas" value="kelas"/>
				    <label for="kelas">Ruang Kelas</label>			 					
				</div>	
			</div>
		</div>

		<div class="row">			
			<div id="ruangkelas-select" class="input-field col s12">
				Pilih Ruangan
			    <select id="ruangkelas" name="ruangkelas">
			    	@foreach ($data['allgedung'] as $gedung)
				    <optgroup label="Gedung {{ $gedung->Gedung.'' }}">

					@foreach ($data['allruangan'] as $ruangan)

					@if($ruangan->Gedung == $gedung->Gedung)
				        <option value="{{ $gedung->Gedung.''.$ruangan->NomorRuangan}}">{{ $gedung->Gedung.''.$ruangan->NomorRuangan }}</option>					
				    @endif

					@endforeach

			      	</optgroup>
			    	@endforeach			        	
			    </select>
			</div>
		</div>
		
		<div class="row">
			<div class="col s12">
				<a class="btn">
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
		$.ajaxSetup({
			headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
		});	

		$('#calendar').fullCalendar({
	        header: {
	        	left: '',
				right: 'prev,next today',
				center: 'title',			
			},
			defaultView: 'agendaWeek', // default view, only
			columnFormat: {
	    		week: 'ddd' // ONLY show day of the week names
			},
			minTime: '07:30:00', // Start time for the calendar
	    	maxTime: '21:00:00', // End time for the calendar
			displayEventTime: true, // Display event time
			editable: false,
			eventLimit: true,
			views: {
				agenda: {
					eventLimit: 5,
				},
			},
			events: {
				url: 'jadwal/get',				
			},					
	    })
	});
</script>
@endsection
