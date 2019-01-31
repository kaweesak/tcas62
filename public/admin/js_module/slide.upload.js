Dropzone.options.myAwesomeDropzone = {
    autoProcessQueue: true,
    uploadMultiple: true,
    maxFiles: 10,
    maxFilesize: 250,
    timeout: 180000,
    parallelUploads: 100,
    acceptedFiles: ".png,.jpg,.gif",

    init: function() {
        // config
        list_files();
        this.options.addRemoveLinks = true;
        this.options.dictRemoveFile = "ลบไฟล์";
        this.on("maxfilesexceeded", function(file) {
            this.removeAllFiles();
            this.addFile(file);
        });
        this.on("success", function(file, response) {
            toastr.success('Upload file successfully.');
            list_files();
            this.removeAllFiles();
        });
        this.on('error', function(file, response) {
            $(file.previewElement).find('.dz-error-message').text(response);
            $('.final-info').text(response);
        });

    }
};

function list_files() {
    //var cid = document.getElementById('request_id').value;	
    $.ajax({
        url: admin_url + "slide/list_files/",
        method: "POST",
        //data:{cid:cid},
        dataType: "json",
        success: function(data) {
            //console.log(data);
            show_items(data);
        }
    });
}

function show_items(data) {
    var filetype = ['.png', '.jpg', '.gif'];
    var rows = '';
    $.each(data, function(key, value) {
        var a = filetype.indexOf(value.file_ext);
        rows = rows + '<tr>';
        rows = rows + '<td><img src="'+ base_url+ 'uploads/slide/' + value.s_name + '" width="100px"></td>';
        if (a) {
            rows = rows + '<td><input type="text" id="s_subject_' + value.id + '" name="s_subject_' + value.id + '" value="' + value.s_subject + '" onblur="update_file_data(' + value.id + ')" class="form-control"></td>';
            rows = rows + '<td><input type="text" id="s_url_' + value.id + '" name="s_url_' + value.id + '" value="' + value.s_url + '" onblur="update_file_data(' + value.id + ')" class="form-control"></td>';
            rows = rows + '<td>' + value.s_status + '</td>';
        } else {
            rows = rows + '<td></td>';
        }
        rows = rows + '<td data-id="' + value.id + '">';
        rows = rows + '<a href="#" class="remove-item"><i class="icon-trash"></i> ลบ</a>';
        rows = rows + '</td>';
        rows = rows + '</tr>';
    });

    $('#slide_table').find('tbody').html(rows);
}

function update_file_data(e) {
    var t = {};
    t.id = e, t.s_subject = $('#s_subject_' + e).val(), t.s_url = $('#s_url_' + e).val(), $.post(admin_url + "slide/update_file_data/", t);
    //console.log(t.duration);
}


function change_slide_status(e, f) {
    var t = {};
    t.id = e, t.s_status = f, $.post(admin_url + "slide/change_slide_status/", t);
    //console.log(e + '****' + f)
    toastr.success('Status change successfully.');
}

/* Remove Item */
$("body").on("click", ".remove-item", function() {
    var id = $(this).parent("td").data('id');
    var c_obj = $(this).parents("tr");
    //console.log('delete_id: ' + id);
    $.ajax({
        dataType: 'json',
        //type: 'delete',
        url: admin_url + "slide/remove_file/" + id,
    }).done(function(data) {
        c_obj.remove();
        list_files();
        toastr.success('Delete file successfully.');
    });

});

function change_state_status(e) {
    if (e == 'request') {
        $('.status_change.dropdown-toggle').html($(this).find('a').html())
        $('span.badge').addClass('badge-danger');
    } else if (e == 'assign') {
        $('.status_change.dropdown-toggle').html($(this).find('a').html())
        $('span.badge').addClass('badge-primary');
    } else if (e == 'inprogress') {
        $('.status_change.dropdown-toggle').html($(this).find('a').html())
        $('span.badge').addClass('badge-warning');
    } else if (e == 'finish') {
        $('.status_change.dropdown-toggle').html($(this).find('a').html())
        $('span.badge').removeClass("btn-warning").addClass("btn-info").addClass('badge-success');
    }
}

$('.status_change.dropdown-menu li').click(function() {
    $('.status_change.dropdown-toggle').html($(this).find('a').html())
        //$('span.badge').addClass($("#test").attr("data-id"));
        //console.log($(this).parent("a").data("id"))
});