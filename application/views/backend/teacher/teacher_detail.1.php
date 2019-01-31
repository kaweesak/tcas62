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
				  <h2><i class="fa fa-bar-chart"></i>(<?php echo $teacher->teacher_id; ?>)<?php echo $teacher->fullname; ?></h2>

			  </div>
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
                  <button class="btn btn-success" onclick="save()"><i class="ti-plus"></i> เพิ่มวุฒิการศึกษา</button>
                </form>
<br>
<hr>
                        <div class="row">
                                    <div class="col-md-12">

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
	<!-- /.container-fluid-->
</div>
<!-- /.container-wrapper-->