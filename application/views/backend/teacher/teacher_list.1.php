<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">ข้อมูลอาจารย์</a>
        </li>
        <li class="breadcrumb-item active">List All</li>
      </ol>

      <div class="box_general padding_bottom">
			  <div class="header_box version_2">
				  <h2><i class="fa fa-bar-chart"></i>ข้อมูลอาจารย์</h2>

			  </div>

                        <div class="row">
                                    <div class="col-md-12">
        <button class="btn btn-success" onclick="add_teacher()"><i class="ti-plus"></i> เพิ่มข้อมูลอาจารย์</button>
        <button class="btn btn-default" onclick="reload_table()"><i class="ti-reload"></i> Reload</button>
        <br>
         <br>
                                <table class="table" id="teacher_table" width="100%" >

                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Position</th>
                                        <th>Prefix </th>
                                        <th>Name</th>
                                        <th>Status </th>
                                        <th>Photo </th>
                                        <th style="text-align:center">จัดการ</th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    </tbody>

                                </table>
                    </div>

                    </div>
    </div>

  </div>
	<!-- /.container-fluid-->
</div>
<!-- /.container-wrapper-->
<!-- Modal -->
<div class="modal fade" id="modal_form" tabindex="-1" role="dialog" aria-labelledby="modal_formLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_formLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form action="#" id="form" class="form-horizontal">
          <input type="hidden" value="" name="id"/>
           <div class="form-group">
    <label for="inputPosition">ตำแหน่ง</label>
     <select name="inputPosition" class="form-control">
                                    <option value="">--เลือกตำแหน่ง--</option>
                                    <option value="อาจารย์">อาจารย์</option>
                                    <option value="ผู้ช่วยศาสตราจารย์">ผู้ช่วยศาสตราจารย์</option>
                                    <option value="ศาสตราจารย์">ศาสตราจารย์</option>
                                </select>
    
    <span class="help-block"></span>
  </div>
  <div class="form-group">
    <label for="inputBranch">หลักสูตร</label>
     <select name="inputBranch" class="form-control">
                                    <option value="">--เลือกหลักสูตร--</option>
                                    <?php $query = $this->db->order_by('c_id','asc')->get_where('_course',array('c_status'=>'1'));?>
                                    <?php foreach($query->result() as $r){?>
                                    <option value="<?php echo $r->c_id;?>">(<?php echo $r->c_id;?>)<?php echo $r->c_name;?></option>
                                    <?php } ?>                                   
                                </select>
    
    <span class="help-block"></span>
  </div>
  <div class="form-group">
    <label for="inputPrefix">คำนำหน้า(ดร.)</label>
    <input type="text" class="form-control" id="inputPrefix" name="inputPrefix"  placeholder="ระบุคำนำหน้า เช่น ดร.">
<span class="help-block"></span>
  </div>
  <div class="form-group">
    <label for="inputFullname">ชื่อ - นามสกุล</label>
    <input type="text" class="form-control" id="inputFullname" name="inputFullname"  placeholder="ระบุชื่อ - นามสกุล">
    <span class="help-block"></span>
  </div>
<div class="form-group" id="photo-preview">
                            <label for="imgshow">Photo</label>
                            <div id="imgshow">
                                (No photo)
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="imgupload"  id="label-photo">Upload Photo </label>
                            
                                <input id="imgupload" name="photo" type="file">
                                <span class="help-block"></span>
                            
                        </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" id="btnSave" onclick="save()" class="btn btn-primary"><i class="ti-save"></i> Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="ti-close"></i> Cancel</button>
      </div>
    </div>
  </div>
</div>