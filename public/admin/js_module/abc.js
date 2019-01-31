'use strict';

$(document).ready(function() {
    var a = $('#xin_table').dataTable({
        "bDestroy": true,
        "ajax": {
            url: base_url + "/department_list/",
            type: "GET",
        },
        "fnDrawCallback": function(b) {
            $('[data-toggle="tooltip"]').tooltip();
        }
    });
    $('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
    $('[data-plugin="select_hrm"]').select2({
        width: "100%"
    });

    $('#delete_record').submit(function(d) {
        d.preventDefault();
        var f = $(this);
        var c = f.attr('name');
        $.ajax({
            type: "POST",
            url: d.target.action,
            data: f.serialize() + "&is_ajax=2&form=" + c,
            cache: false,
            success: function(g) {
                if (g.error != "") {
                    toastr.error(g.error);
                } else {
                    $('.delete-modal').modal(toggle);
                    a.api().ajax.reload(function() {
                        toastr.success(g.result);
                    }, true);
                }
            }
        });
    });

    $('.edit-modal-data').on('show.bs.modal', function(j) {
        var h = $(j.relatedTarget);
        var i = h.data('department_id');
        var k = $(this);
        $.ajax({
            url: base_url + "/read/",
            type: "GET",
            data: "jd=1&is_ajax=1&mode=modal&data=department&department_id=" + i,
            success: function(l) {
                if (l) {
                    $('#ajax_modal').html(l);
                }
            }
        });
    });

    $('#xin-form').submit(function(d) {
        d.preventDefault();
        var f = $(this);
        var c = f.attr('name');
        $('.save').prop('disabled', true);
        $('.icon-spinner3').show();
        $.ajax({
            type: "POST",
            url: base_url + "/add_department/",
            data: f$jscomp$2.serialize() + "&is_ajax=1&add_type=department&form=" + c,
            cache: false,
            success: function(g) {
                if (g.error != "") {
                    toastr.error(g.error);
                    $('.save').prop('disabled', false);
                    $('.icon-spinner3').hide();
                } else {
                    a.api().ajax.reload(function() {
                        toastr.success(g.result);
                    }, true);

                    $('.icon-spinner3').hide();
                    $('#xin-form')[0].reset();
                    $('.save').prop('disabled', false);
                }
            }
        });
    });

});

$(document).on('click', '.delete', function() {
    $('input[name=_token]').val($(this).data('record-id'));
    $('#delete_record').attr('action', base_url + "/delete/" + $(this).data('record-id'));
});