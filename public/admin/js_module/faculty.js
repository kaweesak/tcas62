'use strict';
$(document).ready(function () {
	//datatables
	var v_table = $('#faculty_table').dataTable({
		"bDestroy": true,
		"ajax": {
			url: admin_url + 'faculty/faculty_list',
			type: "GET",
		},
		"fnDrawCallback": function (b) {
			$('[data-toggle="tooltip"]').tooltip();
		}
	});

	CKEDITOR.replace('inputDesc');
});

function add_faculty() {
	save_method = 'add';
	$('#form')[0].reset(); // reset form on modals
	$('.form-group').removeClass('has-error'); // clear error class
	$('.help-block').empty(); // clear error string
	$('#modal_form_faculty').modal('show'); // show bootstrap modal
	$('.modal-title').text('เพิ่มข้อมูล'); // Set Title to Bootstrap modal title
}

function edit_faculty(id) {
	save_method = 'update';
	$('#form')[0].reset(); // reset form on modals
	$('.form-group').removeClass('has-error'); // clear error class
	$('.help-block').empty(); // clear error string

	//Ajax Load data from ajax
	$.ajax({
		url: admin_url + 'faculty/ajax_edit/' + id,
		type: "GET",
		dataType: "JSON",
		success: function (data) {

			$('[name="id"]').val(data.fac_id);
			$('[name="inputFacultyTH"]').val(data.fac_name_th);
			$('[name="inputFacultyEN"]').val(data.fac_name_en);
			// $('[name="gender"]').val(data.gender);
			//$('[name="address"]').val(data.address);
			//$('[name="dob"]').datepicker('update', data.dob);
			$('#modal_form_faculty').modal('show'); // show bootstrap modal when complete loaded
			$('.modal-title').text('แก้ไขข้อมูล'); // Set title to Bootstrap modal title

		},
		error: function (jqXHR, textStatus, errorThrown) {
			//alert('Error get data from ajax');
			toastr.error('Error get data from ajax');
		}
	});
}

function reload_table() {
	v_table.ajax.reload(null, false); //reload datatable ajax 
}

function save() {
	$('#btnSave').text('saving...'); //change button text
	$('#btnSave').attr('disabled', true); //set button disable 
	var url;

	if (save_method == 'add') {
		url = admin_url + 'faculty/ajax_add';
	} else {
		url = admin_url + 'faculty/ajax_update';
	}

	// ajax adding data to database
	$.ajax({
		url: url,
		type: "POST",
		data: $('#form').serialize(),
		dataType: "JSON",
		success: function (data) {

			if (data.status) //if success close modal and reload ajax table
			{
				$('#modal_form_faculty').modal('hide');
				reload_table();
				toastr.success('Save & Update data successfuly');
			} else {
				for (var i = 0; i < data.inputerror.length; i++) {
					$('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
					$('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string
					toastr.error(data.error_string[i]);
				}
			}
			$('#btnSave').text('save'); //change button text
			$('#btnSave').attr('disabled', false); //set button enable 


		},
		error: function (jqXHR, textStatus, errorThrown) {
			//alert('Error adding / update data');
			toastr.error('Error adding / update data');
			$('#btnSave').text('save'); //change button text
			$('#btnSave').attr('disabled', false); //set button enable 

		}
	});
}

function delete_faculty(id) {
	if (confirm('Are you sure delete this data?')) {
		// ajax delete data to database
		$.ajax({
			url: admin_url + 'faculty/ajax_delete/' + id,
			type: "POST",
			dataType: "JSON",
			success: function (data) {
				//if success reload ajax table
				$('#modal_form').modal('hide');
				reload_table();
				toastr.success('Deleted data successfuly');
			},
			error: function (jqXHR, textStatus, errorThrown) {
				//alert('Error deleting data');
				toastr.error('Error deleting data');
			}
		});

	}
}
