'use strict';
$(document).ready(function() {
    var v_table = $('#course_table').dataTable({
        "bDestroy": true,
        "ajax": {
            url: admin_url + 'tcas/course_list',
            type: "GET",
        },
        "fnDrawCallback": function(b) {
            $('[data-toggle="tooltip"]').tooltip();
        }
    });
});