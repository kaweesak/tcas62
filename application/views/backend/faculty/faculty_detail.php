<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo base_url('admin/faculty'); ?>">ข้อมูลหลักสูตรสาขา</a>
        </li>
        <li class="breadcrumb-item active">List All</li>
      </ol>

      <div class="box_general padding_bottom">
			  <div class="header_box version_2">
				  <h2><i class="fa fa-bar-chart"></i>(<?php echo $faculty->fac_id; ?>)<?php echo $faculty->fac_name_th; ?></h2>

			  </div>
                 <button class="btn btn-success" onclick="add_degree()"><i class="ti-plus"></i> เพิ่มหลักสูตร</button>
 <button class="btn btn-default" onclick="reload_table()"><i class="ti-reload"></i> Reload</button>
        <br>
         <br>
                        <div class="row">
                                    <div class="col-md-12">

                                 <table class="table" id="degree_table" width="100%" >

                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>ชื่อหลักสูตร</th>

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
               <input type="hidden" id="teacher_id" value="<?php echo $faculty->fac_id; ?>" name="teacher_id"/>
               <input type="hidden" value="" name="id"/>
                 <div class="row">
                                    <div class="col-md-4">
  <div class="form-group">
    <label for="inputDegree">ระดับที่สำเร็จการศึกษา</label>
     <select name="inputDegree" class="form-control">
                                    <option value="">--เลือกระดับที่สำเร็จการศึกษา--</option>
                                    <option value="ประกาศนียบัตร">ประกาศนียบัตร</option>
                                    <option value="ประกาศนียบัตรบัณฑิต">ประกาศนียบัตรบัณฑิต</option>
                                    <option value="ปริญญาตรี">ปริญญาตรี</option>
                                    <option value="ปริญญาโท">ปริญญาโท</option>
                                    <option value="ปริญญาเอก">ปริญญาเอก</option>
                                </select>
<span class="help-block"></span>
  </div>

                                    </div>
                                     <div class="col-md-4">
                                       <div class="form-group">
    <label for="inputYear">ปีที่สำเร็จการศึกษา</label>
    <input type="text" class="form-control" id="inputYear" name="inputYear"  placeholder="ระบุปีที่สำเร็จการศึกษา">
    <span class="help-block"></span>
  </div>
                                     </div>
                                     <div class="col-md-4">
                                       <div class="form-group">
    <label for="inputDegreeShot">ชื่อย่อ ปริญญา</label>
    <input type="text" class="form-control" id="inputDegreeShot" name="inputDegreeShot"  placeholder="ระบุชื่อย่อ ปริญญาบัตร">
    <span class="help-block"></span>
  </div>
                                     </div>
                </div>
                <div class="row">
                                    <div class="col-md-6">
  <div class="form-group">
    <label for="inputBranch">สาขาที่สำเร็จการศึกษา</label>
    <input type="text" class="form-control" id="inputBranch" name="inputBranch"  placeholder="สาขาที่สำเร็จการศึกษา">
<span class="help-block"></span>
  </div>

                                    </div>
                                     <div class="col-md-6">
                                       <div class="form-group">
    <label for="inputUniversity">มหาวิทยาลัยที่สำเร็จการศึกษา</label>
    <input type="text" class="form-control" id="inputUniversity" name="inputUniversity"  placeholder="ระบุมหาวิทยาลัยที่สำเร็จการศึกษา">
    <span class="help-block"></span>
  </div>
                                     </div>
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