$(document).ready(
	function() { 	
	 	// side bar
	 	$('#sidebar-content').pushpin({ top: $('#sidebar-content').offset().top });

		// initialize datepicker
	 	$('.tanggalbeli').pickadate({	
			max: true,
			editable: false,
			today: ''
		});

	 	$('.pilihtanggalpinjam').pickadate({	
			min:6,
			editable:false,
			today: ''
		});

	 	// initialize material select
	 	$('select').material_select();

	 	// initialize modal
	 	$('.modal-trigger').leanModal();
	}
);