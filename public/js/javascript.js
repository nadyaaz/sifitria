$(document).ready(
	function() { 	
	 	// side bar
	 	$('#sidebar-content').pushpin({ 
	 		top: $('#sidebar-content').offset().top 
	 	});

		// initialize datepicker
	 	$('.tanggalbeli').pickadate({	
			max: true,
			editable: false,
			today: ''
		});

	 	$('.pilihtanggalpinjam').pickadate({	
			min:6,
			editable:false,
			formatSubmit: 'yyyy-mm-dd',
			today: ''
		});

	 	// initialize material select
	 	$('select').material_select();

	 	// initialize modal
	 	$('.modal-trigger').leanModal({
            dismissible: true, 
            opacity: .3, 
            in_duration: 148, 
            out_duration: 148,
        });
	}
);