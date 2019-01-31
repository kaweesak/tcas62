$('.tablex').dataTable();
viweData();
CKEDITOR.replace('inputDesc');
$('#update').prop('disabled', true);

function viweData() {
    $.get(base_url + 'faculty/view', function(data) {
        $('tbody').html(data);
    })
}

function saveData() {
    var id = $('#id').val();
    var name = $('#nm').val();
    var email = $('#em').val();
    var phone = $('#hp').val();
    var address = $('#ad').val();
    $.post(base_url + 'faculty/add', {
        id: id,
        name: name,
        email: email,
        phone: phone,
        address: address
    }, function(data) {
        viweData();
        $('#id').val('');
        $('#nm').val('');
        $('#em').val('');
        $('#hp').val('');
        $('#ad').val('');
    });
}

function editData(id, nm, em, hp, ad) {
    $('#id').val(id);
    $('#nm').val(nm);
    $('#em').val(em);
    $('#hp').val(hp);
    $('#ad').val(ad);
    $('#id').prop('readonly', true);
    $('#save').prop('disabled', false);
    $('#update').prop('disabled', true);
}

function updateData() {
    var id = $('#id').val();
    var name = $('#nm').val();
    var email = $('#em').val();
    var phone = $('#hp').val();
    var address = $('#ad').val();
    $.post(base_url + 'faculty/update', {
        id: id,
        nm: name,
        em: email,
        hp: phone,
        ad: address
    }, function(data) {
        viweData();
        $('#id').val('');
        $('#nm').val('');
        $('#em').val('');
        $('#hp').val('');
        $('#ad').val('');
        $('#id').prop('readonly', true);
        $('#save').prop('disabled', false);
        $('#update').prop('disabled', true);
    });
}

function deleteData(id) {
    $.post(base_url + 'faculty/delete', {
        id: id
    }, function(data) {
        viweData();
    });
}

function removeConfrim(id) {
    var con = confirm('Are you sure, want to delete the data!');
    if (con == '1') {
        deleteData(id);
    }
}