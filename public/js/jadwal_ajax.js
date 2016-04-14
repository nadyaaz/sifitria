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
		events: {
			url: 'pinjamruang/jadwal/get',
		},					
    })
});