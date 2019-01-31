<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">รายละเอียดข้อมูลอาจารย์ </h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">รายละเอียดข้อมูลอาจารย์</li>
                            </ol>
                            <button type="button" class="btn btn-info d-none d-lg-block m-l-15" onclick="add_degree()"><i class="fa fa-plus-circle"></i> เพิ่มวุฒิการศึกษา</button>
                        </div>
                    </div>
                </div>
             
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
							              <h4 class="card-title">(<?php echo $teacher->teacher_id; ?>)<?php echo $teacher->fullname; ?></h4>
                              <h6 class="card-subtitle"></h6>
                               <input type="hidden" name="tid" id="tid"  value="<?php echo $teacher->teacher_id; ?>">
           
                                 <?php if (empty($teacher->p_photo)) {?>
                <?php
            $t_img = 'http://personnel.dusit.ac.th/eprofile/main/files/bio_data_file/' . $teacher->p_code . '.jpg';
    if (!is_url_exist($t_img)) {
        echo '<img src="' . base_url() . 'uploads/img/avatar.png" class="img-fluid " style="margin-top: 10px;" alt="">';
    } else {
        echo '<img src="' . $t_img . '" class="img-fluid" style="margin-top: 10px;width:200px" alt="">';
    }
    ?>

                <?php } else {?>
                    <img src="<?php echo base_url(); ?>uploads/teacher/<?php echo $teacher->course_id; ?>/<?php echo $teacher->p_photo; ?>" class="img-fluid " style="margin-top: 10px;" alt="">
                <?php }?>
                <br/> <br/>
                 <!--<button class="btn btn-success" onclick="add_degree()"><i class="ti-plus"></i> เพิ่มวุฒิการศึกษา</button> -->
                                <table class="table" id="degree_table" width="100%" >

                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>degree_name</th>
                                        <th>complete date</th>
                                        <th>degree shot</th>
                                        <th>branch </th>
                                        <th>university</th>
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
              
              
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
</div>


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
               <input type="hidden" id="teacher_id" value="<?php echo $teacher->teacher_id; ?>" name="teacher_id"/>
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