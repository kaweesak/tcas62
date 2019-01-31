<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(isset($_GET['jd']) && isset($_GET['video_id']) && $_GET['data']=='video'){
?>

<div class="modal-header">
	<h4 class="modal-title" id="edit-modal-data">Edit</h4>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span>
	</button>

</div>
<form action="<?php echo base_url(" admin/video/update").'/'.$vid; ?>" method="post" name="edit_video" id="edit_video">
	<input type="hidden" name="_method" value="EDIT">
	<input type="hidden" name="_token" value="<?php echo $vid;?>">
	<input type="hidden" name="ext_name" value="<?php echo $title;?>">
	<div class="modal-body">
		<div class="form-group">
			<label for="inputTitle" class="form-control-label">Title:</label>
			<input type="text" class="form-control" name="inputTitle" value="<?php echo $title;?>">
		</div>
		<div class="form-group">
			<label for="inputYoutube" class="form-control-label">Youtube:</label>
			<input type="text" class="form-control" name="inputYoutube" value="<?php echo $yt_code;?>">
		</div>

	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary">Update</button>
	</div>
</form>
<link rel="stylesheet" href="<?php echo base_url();?>skin/vendor/select2/dist/css/select2.min.css">
<script type="text/javascript" src="<?php echo base_url();?>skin/vendor/select2/dist/js/select2.min.js"></script>
<script type="text/javascript">
	$(document).ready(function () {

		// On page load: datatable
		var v_table = $('#video_table').dataTable({
			"bDestroy": true,
			"ajax": {
				url: admin_url + "video/video_list",
				type: 'GET'
			},
			"fnDrawCallback": function (settings) {
				$('[data-toggle="tooltip"]').tooltip();
			}
		});

		//$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
		//$('[data-plugin="select_hrm"]').select2({ width:'100%' });	 

		/* Edit data */
		$("#edit_video").submit(function (e) {
			e.preventDefault();
			var obj = $(this),
				action = obj.attr('name');
			$('.save').prop('disabled', true);

			$.ajax({
				type: "POST",
				url: e.target.action,
				data: obj.serialize() + "&is_ajax=1&edit_type=video&form=" + action,
				cache: false,
				success: function (JSON) {
					if (JSON.error != '') {
						toastr.error(JSON.error);
						$('.save').prop('disabled', false);
					} else {
						v_table.api().ajax.reload(function () {
							toastr.success(JSON.result);
						}, true);
						$('.edit-modal-data').modal('toggle');
						$('.save').prop('disabled', false);
					}
				}
			});
		});
	});

</script>
<?php }
?>
