var save_method; //for save method string
var degree_table;

// Call the dataTables jQuery plugin
$(document).ready(function() {
    var tid = $('#tid').val();
    degree_table = $('#degree_table').DataTable({
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": admin_url + 'degree/degree_list/' + tid,
            "type": "POST",
            /*"data": function(data) {
                data.cid = $('#teacher_id').val();
                //data.FirstName = $('#FirstName').val();
                //data.LastName = $('#LastName').val();
                //data.address = $('#address').val();

            }*/
        },

        //Set column definition initialisation properties.
        "columnDefs": [{
                "targets": [-1], //last column
                "orderable": false, //set not orderable
            },

        ],

    });

});

function add_degree() {
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('เพิ่มข้อมูล'); // Set Title to Bootstrap modal title

}

function edit_degree(id) {
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url: admin_url + 'degree/ajax_edit/' + id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {

            $('[name="id"]').val(data.degree_id);
            $('[name="inputDegree"]').val(data.degree_name);
            $('[name="inputYear"]').val(data.complete_date);
            $('[name="inputDegreeShot"]').val(data.degree_shot);
            $('[name="inputBranch"]').val(data.branch_success);
            $('[name="inputUniversity"]').val(data.university);
            //$('[name="dob"]').datepicker('update', data.dob);

            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('แก้ไขข้อมูล(' + id + ')'); // Set title to Bootstrap modal title

        },
        error: function(jqXHR, textStatus, errorThrown) {
            //alert('Error get data from ajax');
            toastr.error('Error get data from ajax');
        }
    });
}

function reload_table() {
    degree_table.ajax.reload(null, false); //reload datatable ajax
}

function save() {
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled', true); //set button disable 
    var url;

    if (save_method == 'add') {
        url = admin_url + 'degree/ajax_add';
    } else {
        url = admin_url + 'degree/ajax_update';
    }

    // ajax adding data to database
    var formData = new FormData($('#form')[0]);
    $.ajax({
        url: url,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data) {

            if (data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                reload_table();
                toastr.success('Save & Update data successfully');
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
        error: function(jqXHR, textStatus, errorThrown) {
            //alert('Error adding / update data');
            toastr.error('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled', false); //set button enable 

        }
    });
}

function delete_degree(id) {
    if (confirm('Are you sure delete this data?')) {
        // ajax delete data to database
        $.ajax({
            url: admin_url + 'degree/ajax_delete/' + id,
            type: "POST",
            dataType: "JSON",
            success: function(data) {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
                toastr.success('Deleted data successfully');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                //alert('Error deleting data');
                toastr.error('Error deleting data');
            }
        });

    }
}