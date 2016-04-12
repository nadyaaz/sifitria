$(document).ready(
	function() { 	

	 	var formNumber = 1;
	  	
		var cloneSource = $('#barang-form1');
		var appendTarget = $('#barang-multiform');	

		// initialize datepicker
	 	$('.datepicker').pickadate({	
			min: 6,
		    editable: false,
		    today: ''
		 });

	 	// initialize material select
	 	$('select').material_select();

	 	$('#add-new-form').click(function() {
			// clone the main form
			var newForm = cloneSource.clone(true);

			// increment the formNumber
			formNumber++;

			// modify it's ID and name			
			newForm.attr('id', 'barang-form'+formNumber);

			newForm.find('#judul1')
				.attr('id', 'judul'+formNumber);

			newForm.find('.valign-wrapper')
				.append(
					'<a id="removebarang'+formNumber+'"onclick="removeBarang(this)" class="remove-barang-btn btn-flat waves-effect waves-light red"><i class="material-icons white-text">clear</i></a>'
				);

			newForm.find('#namabarang1')
				.attr('id', 'namabarang'+formNumber)
				.attr('name', 'namabarang['+formNumber+']');
			
			newForm.find('#tanggalbeli1')
				.attr('id', 'tanggalbeli'+formNumber)
				.attr('name', 'tanggalbeli['+formNumber+']');

			newForm.find('#penanggungjawab1')
				.attr('id', 'penanggungjawab'+formNumber)
				.attr('name', 'penanggungjawab['+formNumber+']');

			newForm.find('#kategoribarang1')
				.attr('id', 'kategoribarang'+formNumber)
				.attr('name', 'kategoribarang['+formNumber+']');

			newForm.find('#jenisbarang1')
				.attr('id', 'jenisbarang'+formNumber)
				.attr('name', 'jenisbarang['+formNumber+']');

			newForm.find('#kondisibarang1')
				.attr('id', 'kondisibarang'+formNumber)
				.attr('name', 'kondisibarang['+formNumber+']');

			newForm.find('#kerusakanbarang1')
				.attr('id', 'kerusakanbarang'+formNumber)
				.attr('name', 'kerusakanbarang['+formNumber+']');

			newForm.find('#spesifikasibarang1')
				.attr('id', 'spesifikasibarang'+formNumber)
				.attr('name', 'spesifikasibarang['+formNumber+']');

			newForm.find('#keteranganbarang1')
				.attr('id', 'keteranganbarang'+formNumber)
				.attr('name', 'keteranganbarang['+formNumber+']');

			// append modified newForm
			appendTarget.append(newForm);			
	 	});
	}
);

function removeBarang(obj)  {
	// get id
	var id = (obj.id).split('removebarang')[1];		

	// get element then delete it
	(document.getElementById('barang-form'+id)).remove();
}
