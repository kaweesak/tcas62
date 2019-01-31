<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Faculty</a>
        </li>
        <li class="breadcrumb-item active">List All</li>
      </ol>

      <div class="box_general padding_bottom">
			  <div class="header_box version_2">
				  <h2><i class="fa fa-bar-chart"></i>คณะ/โรงเรียน</h2>
			  </div>
         <button class="btn btn-success" onclick="add_faculty()"><i class="ti-plus"></i> เพิ่มข้อมูลคณะ</button>
        <button class="btn btn-default" onclick="reload_table()"><i class="ti-reload"></i> Reload</button>
        <br />
        <br />

            <table class="table table-bordered" id="fac_table" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Name TH</th>
                   <th>Name EN</th>

                  <th>action</th>
                </tr>
              </thead>
                <tbody>
              </tbody>

            </table>

		  </div>


		  <div class="box_general padding_bottom">
			  <div class="header_box version_2">
				  <h2><i class="fa fa-bar-chart"></i>คณะ/โรงเรียน</h2>
			  </div>

		  </div>


  </div>
	<!-- /.container-fluid-->
</div>
<!-- /.container-wrapper-->
<!-- Modal -->
<div class="modal fade" id="modal_form_faculty" tabindex="-1" role="dialog" aria-labelledby="faculty_modal_formLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="faculty_modal_formLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form action="#" id="form" class="form-horizontal">
          <input type="hidden" value="" name="id"/>
  <div class="form-group">
    <label for="inputFacultyTH">ชื่อคณะ</label>
    <input type="text" class="form-control" id="inputFacultyTH" name="inputFacultyTH"  placeholder="ระบุชื่อคณะ">
<span class="help-block"></span>
  </div>
  <div class="form-group">
    <label for="inputFacultyEN">ชื่อคณะ(English)</label>
    <input type="text" class="form-control" id="inputFacultyEN" name="inputFacultyEN"  placeholder="ระบุชื่อคณะ(English)">
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
