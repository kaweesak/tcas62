var save_method; //for save method string
var tea_table;
// Call the dataTables jQuery plugin
$(document).ready(function() {
    tea_table = $('#teacher_table').DataTable({
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": admin_url + 'teacher/teacher_list',
            "type": "POST",
            "data": function(data) {
                data.cid = $('#inputBranch').val();
                //data.FirstName = $('#FirstName').val();
                //data.LastName = $('#LastName').val();
                //data.address = $('#address').val();

            }
        },

        //Set column definition initialisation properties.
        "columnDefs": [{
                "targets": [-1], //last column
                "orderable": false, //set not orderable
            },
            {
                "targets": [-2], //2 last column (photo)
                "orderable": false, //set not orderable
            },
        ],

    });

    $('#btn-filter').click(function() { //button filter event click
        tea_table.ajax.reload(); //just reload table
    });
    $('#btn-reset').click(function() { //button reset event click
        $('#form-filter')[0].reset();
        tea_table.ajax.reload(); //just reload table
    });




});
CKEDITOR.replace('inputDetail');

function add_teacher() {
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('เพิ่มข้อมูล'); // Set Title to Bootstrap modal title
    $('#photo-preview').hide(); // hide photo preview modal

    $('#label-photo').text('Upload Photo'); // label photo upload
}

function edit_teacher(id) {
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url: admin_url + 'teacher/ajax_edit/' + id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {

            $('[name="id"]').val(data.teacher_id);
            $('[name="inputPosition"]').val(data.position);
            $('[name="inputBranch"]').val(data.course_id);
            $('[name="inputPrefix"]').val(data.prefix);
            $('[name="inputFullname"]').val(data.fullname);
            CKEDITOR.instances.inputDetail.setData(data.p_detail);
            //$('[name="inputDetail"]').val(data.p_detail);


            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('แก้ไขข้อมูล(' + id + ')'); // Set title to Bootstrap modal title

            $('#photo-preview').show(); // show photo preview modal

            if (data.p_photo) {
                $('#label-photo').text('Change Photo'); // label photo upload
                $('#photo-preview div').html('<img src="' + base_url + 'uploads/teacher/' + data.course_id + '/' + data.p_photo + '" class="img-fluid">'); // show photo
                $('#photo-preview div').append('<input type="checkbox" name="remove_photo" value="' + data.p_photo + '"/> Remove photo when saving'); // remove photo

            } else {
                $('#label-photo').text('Upload Photo'); // label photo upload
                $('#photo-preview div').text('(No photo)');
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            //alert('Error get data from ajax');
            toastr.error('Error get data from ajax');
        }
    });
}

function reload_table() {
    tea_table.ajax.reload(null, false); //reload datatable ajax
}

function save() {
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled', true); //set button disable 
    var url;

    if (save_method == 'add') {
        url = admin_url + 'teacher/ajax_add';
    } else {
        url = admin_url + 'teacher/ajax_update';
    }

    // ajax adding data to database
    var formData = new FormData($('#form')[0]);
    formData.append('inputDetail', CKEDITOR.instances['inputDetail'].getData());
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

function delete_teacher(id) {
    if (confirm('Are you sure delete this data?')) {
        // ajax delete data to database
        $.ajax({
            url: admin_url + 'teacher/ajax_delete/' + id,
            type: "POST",
            dataType: "JSON",
            success: function(data) {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
                toastr.success('Deleted data succesfully');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                //alert('Error deleting data');
                toastr.error('Error deleting data');
            }
        });

    }
}