'use strict';
$(document).ready(function() {
    var v_table = $('#event_table').dataTable({
        "bDestroy": true,
        "ajax": {
            url: admin_url + 'tcas/event_list',
            type: "GET",
        },
        "fnDrawCallback": function(b) {
            $('[data-toggle="tooltip"]').tooltip();
        }
    });
});