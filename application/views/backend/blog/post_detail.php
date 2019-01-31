<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">News</a>
        </li>
        <li class="breadcrumb-item active">Detail</li>
      </ol>
	  
      <div class="box_general padding_bottom">
			  <div class="header_box version_2">
				  <h2><i class="fa fa-bar-chart"></i>แก้ไขข่าว(<?php echo $n_id;?>)</h2>
			  </div>
        <form id="post-form" action="<?php echo site_url('admin/post/update');?>" method="post">
          <input type="hidden" id="nid" name="nid" value="<?php echo $n_id;?>">
           <div class="form-group">
            <label for="inputTitle">Title</label>
            <input type="text" class="form-control" id="inputTitle" name="inputTitle" value="<?php echo $title;?>" placeholder="ระบุชื่อเรื่อง">
            <span class="help-block"></span>
          </div>
          <div class="form-group">
            <label for="inputDetail">Detail</label>
            <textarea class="form-control" id="editor" name="inputDetail" rows="6"><?php echo $detail;?></textarea>
            
            <span class="help-block"></span>
          </div>
         
        
          <button type="submit" class="btn btn-primary save" >Save</button>
        </form>
		  </div>

		<!--
		  <div class="box_general padding_bottom">
			  <div class="header_box version_2">
				  <h2><i class="fa fa-bar-chart"></i>คณะ/โรงเรียน</h2>
			  </div>
		
		  </div> -->
	 
   
  </div>
	<!-- /.container-fluid-->
</div>
<!-- /.container-wrapper-->