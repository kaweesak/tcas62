<div class="container">
<div class="row">
<form>
    <input type="hidden" name="pid" id="pid" value="<?php echo $pid; ?>"/>
    <input type="hidden" name="uid" id="uid" value=""/>
    <input type="hidden" name="ip" id="ip" />
    <p>
        <input type="text" id="name" class="form-control" placeholder="Your Name"/>
    </p>
     <p>
        <input type="email" id="email" class="form-control" placeholder="Your Email"/>
    </p>
     <p>
        <input type="url" id="website" class="form-control" placeholder="Your URL Website"/>
    </p>
     <p>
        <textarea type="text" id="content" class="form-control" row="10" placeholder="Your Comment Message"></textarea>
    </p>
     <p>
        <button type="button" onclick="addData()" class="btn btn-primary">Post Comment</button>
    </p>
</form>
<ul id="allcomment" class="w3-ul w3-border"></ul>
</div>
<script src="<?php echo base_url('assets/js/jquery.min.js')?>"></script>
<script>
function viewData(){
    $.get("<?php echo base_url('comment/index/'.$pid)?>",function(data){
        $('#allcomment').html(data);
    })
}
viewData();
function addData(){
    var postid = $('#pid').val();
    var userid = $('#uid').val();
    var ip = $('#ip').val();
    var name = $('#name').val();
    var email = $('#email').val();
    var website = $('#website').val();
    var content = $('#content').val();
    $.post("<?php echo base_url('comment/save')?>",{pid:postid,uid:userid,ip:ip},function(data){
        viewData();
        clearData();
    })
}
function editData(id){
    var comment = $('#comment-'+id).text();
    $('.w3-bar-item span#comment-'+id).replaceWith('<form id="comment2-' + id +'"><textarea id="ccontent-'+ id +'"');
}
function hideEditData(id){
    var comment2 = $('#ccontent-'+id).val();
     $('.w3-bar-item form#comment2-'+id).replaceWith('<span id="comment-' + id +'">' + comment2 + '</span>');
}
function updateData(id){
    var content = $('#content-'+id).val();
    $.post("<?php echo base_url('comment/update')?>",{id:id,content:content},function(data){
        viewData();
        hideEditData();
    })
}
function dateteData(id){
    $.post("<?php echo base_url('comment/trash')?>",{id:id},function(data){
        viewData();      
    })
}
function clearData(i){  
   $('#name').val('');
   $('#email').val('');
   $('#website').val('');
   $('#content').val('');
}
function viewReply(id){
     $('#viewreply-'+id).show();
     $('#viewreply-'+id).html('<form style="padding:0 0 0 80px;margin-top:15px;"><input type="hidden" id=""')
}
function hideReply(id){
    $('#viewreply-'+id).hide();
}
function addReply(id){
    var postid = "<?php echo $pid; ?>";
    var userid = "1";
    var ip = $('#ip').val();
    var name ="abc";
    var email = "a@a.com";
    var website = "http://abc.com";
    var content = $('#replycontent-' +id).val();
    var parent = $('#parentid-'+id).val();
    $.post("<?php echo base_url('comment/reply')?>",{parentid:parent,pid:postid,uid:userid,ip:ip},function(data){
        viewData();
        viewReply(id);
    })
}
</script>
</div>
