'use strict';
$(document).ready(function() {
    var v_table = $('#video_table').dataTable({
        "bDestroy": true,
        "ajax": {
            url: admin_url + 'video/video_list',
            type: "GET",
        },
        "fnDrawCallback": function(b) {
            $('[data-toggle="tooltip"]').tooltip();
        }
    });

    $('#delete_record').submit(function(d) {
        d.preventDefault();
        var obj = $(this),
            action = obj.attr('name');
        $.ajax({
            type: "POST",
            url: d.target.action,
            data: obj.serialize() + "&is_ajax=2&form=" + action,
            cache: false,
            success: function(g) {
                if (g.error != "") {
                    toastr.error(g.error);
                } else {
                    $('.delete-modal').modal('toggle');
                    v_table.api().ajax.reload(function() {
                        toastr.success(g.result);
                    }, true);
                }
            }
        });
    });

    $('#video-form').on("submit", function(e) {
        e.preventDefault();
        var obj = $(this),
            action = obj.attr('name');
        $('.save').prop('disabled', true);

        $.ajax({
            type: "POST",
            url: admin_url + "video/add_video/",
            data: obj.serialize() + "&is_ajax=1&add_type=video&form=" + action,
            cache: false,
            success: function(JSON) {
                if (JSON.error != '') {
                    toastr.error(JSON.error);
                    $('.save').prop('disabled', false);
                } else {
                    v_table.api().ajax.reload(function() {
                        toastr.success(JSON.result);
                    }, true);
                    //$('.edit-modal-data').modal('toggle');
                    $('#video-form')[0].reset();
                    $('.save').prop('disabled', false);
                }
            }
        });

    });

    $('.edit-modal-data').on('show.bs.modal', function(e) {
        var modal_a = $(e.relatedTarget);
        var id = modal_a.data('video_id');
        //var k = $(this);

        $.ajax({
            url: admin_url + "video/read/",
            type: "GET",
            data: "jd=1&is_ajax=1&mode=modal&data=video&video_id=" + id,
            success: function(l) {
                if (l) {
                    $('#ajax_modal').html(l);
                }
            }
        });
    });

});

$(document).on('click', '.delete', function() {
    $('input[name=_token]').val($(this).data('record-id'));
    $('#delete_record').attr('action', admin_url + "video/delete/" + $(this).data('record-id'));
});

function set_status(id) {
    // ajax set status data to database
    $.ajax({
        url: admin_url + 'video/ajax_set/' + id,
        type: "POST",
        dataType: "JSON",
        success: function(data) {
            //if success reload ajax table
            //$('#modal_form').modal('hide');
            reload_table();
            toastr.success('Updating status successfully.');
        },
        error: function(jqXHR, textStatus, errorThrown) {
            // alert('Error updating data');
            toastr.error('Error updating data');
        }
    });

}

function delete_video(id) {
    if (confirm('Are you sure delete this data?')) {
        // ajax delete data to database
        $.ajax({
            url: admin_url + 'video/ajax_delete/' + id,
            type: "POST",
            dataType: "JSON",
            success: function(data) {
                //if success reload ajax table
                //$('#modal_form').modal('hide');
                reload_table();
                toastr.success('Deleted successfully.');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                //alert('Error deleting data');
                toastr.error('Error deleting data');
            }
        });
    }
}