'use strict';
$(document).ready(function () {
	var v_table = $('#blog_table').dataTable({
		"bDestroy": true,
		"ajax": {
			url: admin_url + 'blog/blog_list',
			type: "GET",
		},
		"fnDrawCallback": function (b) {
			$('[data-toggle="tooltip"]').tooltip();
		}
	});
});
