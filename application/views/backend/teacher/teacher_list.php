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
                        <h4 class="text-themecolor">ข้อมูลอาจารย์</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">ข้อมูลอาจารย์</li>
                            </ol>
                            <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button>
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
							  <h4 class="card-title">ข้อมูลอาจารย์</h4>
                              <h6 class="card-subtitle"></h6>
                            
                            <form id="form-filter" class="form-horizontal">
  <div class="form-row align-items-center">
    <div class="col-auto my-1">
     <!-- <label class="mr-sm-2" for="inputBranch">หลักสูตร</label> -->
      <select id="inputBranch" class="form-control">

                                    <option value="">--เลือกหลักสูตร--</option>
                                    <?php $query = $this->db->order_by('c_id', 'asc')->get_where('_course', array('c_status' => '1'));?>
                                    <?php foreach ($query->result() as $r) {?>
                                    <option value="<?php echo $r->c_id; ?>">(<?php echo $r->c_id; ?>)<?php echo $r->c_name; ?></option>
                                    <?php }?>
           </select>

    </div>
  
    <div class="col-auto my-1">
      <button type="button" id="btn-filter" class="btn btn-primary">Filter</button>
       <button type="button" id="btn-reset" class="btn btn-default">Reset</button>
    </div>
  </div>


                </form>
                             <br>
                            <button class="btn btn-success" onclick="add_teacher()"><i class="ti-plus"></i> เพิ่มข้อมูลอาจารย์</button>
                            <button class="btn btn-default" onclick="reload_table()"><i class="ti-reload"></i> Reload</button>
                            <br/>
                            <br/>
                                <table class="display nowrap table table-hover table-striped table-bordered" id="teacher_table" width="100%" >
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
                                    <tbody></tbody>
                                </table>

                         </div> <!--end card body-->
                        </div>
                    </div>
                </div>
              
              
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
</div>


<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
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
    <input type="hidden" value="" name="id"/>


    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label for="inputBranch">หลักสูตร</label>
                <select name="inputBranch" class="form-control">
                    <option value="">--เลือกหลักสูตร--</option>
                    <?php $query = $this->db->order_by('c_id', 'asc')->get_where('_course', array('c_status' => '1'));?>
                    <?php foreach ($query->result() as $r) {?>
                        <option value="<?php echo $r->c_id; ?>">(<?php echo $r->c_id; ?>)<?php echo $r->c_name; ?></option>
                    <?php }?>
                </select>

                <span class="help-block"></span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="inputPosition">ตำแหน่ง</label>
                <select name="inputPosition" class="form-control">
                    <option value="">--เลือกตำแหน่ง--</option>
                    <option value="อาจารย์">อาจารย์</option>
                    <option value="ผู้ช่วยศาสตราจารย์">ผู้ช่วยศาสตราจารย์</option>
                    <option value="รองศาสตราจารย์">รองศาสตราจารย์</option>
                    <option value="ศาสตราจารย์">ศาสตราจารย์</option>
                </select>

                <span class="help-block"></span>
            </div>
        </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label for="inputPrefix">คำนำหน้า(ดร.)</label>
            <input type="text"  id="inputPrefix" name="inputPrefix"  placeholder="ระบุคำนำหน้า เช่น ดร." width="80px" class="form-control">
            <span class="help-block"></span>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <label for="inputFullname">ชื่อ - นามสกุล</label>
            <input type="text" class="form-control" id="inputFullname" name="inputFullname"  placeholder="ระบุชื่อ - นามสกุล">
            <span class="help-block"></span>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <label for="inputDetail">ความเชี่ยวชาญ</label>
            <textarea id="inputDetail" name="inputDetail" class="form-control"></textarea>
            <span class="help-block"></span>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
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
