'use strict';
$(document).ready(function() {
    var v_table = $('#post_table').dataTable({
        "bDestroy": true,
        "ajax": {
            url: admin_url + 'post/post_list',
            type: "GET",
        },
        "fnDrawCallback": function(b) {
            $('[data-toggle="tooltip"]').tooltip();
        }
    });
});