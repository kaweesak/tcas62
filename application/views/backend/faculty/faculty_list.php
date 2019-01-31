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
                        <h4 class="text-themecolor">คณะ/โรงเรียน</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">คณะ/โรงเรียน</li>
                            </ol>
                            <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button>
                        </div>
                    </div>
                </div>
             
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                 <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                              <h4 class="card-title">คณะ/โรงเรียน</h4>
                              <h6 class="card-subtitle"></h6>

                              <form id="sidebar">
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
                                  <div class="form-group">
                                    <label for="inputDesc">รายละเอียด</label>
                                    <textarea id="inputDesc" name="inputDesc" class="form-control"></textarea>
                                    <span class="help-block"></span>
                                </div>
                                  <button type="button" id="save" class="btn btn-primary" onclick="saveData()">Save</button>
                                   <button type="button" id="update" class="btn btn-warning" onclick="updateData()">Update</button>
                                </form>

                            </div>                           
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                           <div class="card-body">
                              <button class="btn btn-success" onclick="add_faculty()"><i class="ti-plus"></i> เพิ่มข้อมูลคณะ</button>
                             <button class="btn btn-default" onclick="reload_table()"><i class="ti-reload"></i> Reload</button>
                            <br />
                            <br />

                             <table class="table table-bordered" id="faculty_table" width="100%" cellspacing="0">
                               <thead>
                                 <tr>
                                   <th>No.</th>
                                   <th>Name TH</th>
                                    <th>Name EN</th>                    
                                   <th>Action</th>
                                 </tr>
                               </thead>
                                 <tbody>  </tbody>

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