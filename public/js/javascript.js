$(document).ready(
	function() { 	
		// initialize datepicker
	 	$('.datepicker').pickadate({	
			min: 6,
		    editable: false,
		    today: ''
		 });

	 	// initialize material select
	 	$('select').material_select();		
	}
);