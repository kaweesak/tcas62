//ck 4
CKEDITOR.replace('inputDetail', {
    filebrowserBrowseUrl: base_url + 'public/admin/vendor/ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl: base_url + 'public/admin/vendor/ckfinder/ckfinder.html?type=Images',
    filebrowserUploadUrl: base_url + 'public/admin/vendor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl: base_url + 'public/admin/vendor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
});
//ck 5
/*ClassicEditor
    .create(document.querySelector('#editor'), {
        ckfinder: {
            uploadUrl: base_url + 'public/admin/vendor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
        }
    })
    .then()
    .catch();*/