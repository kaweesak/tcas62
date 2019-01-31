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
                        <h4 class="text-themecolor">Video</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Video</li>
                            </ol>
                            
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- row -->
               <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                              <h4 class="card-title">Video</h4>
                              <h6 class="card-subtitle"></h6>

                              <form  method="post" action="<?php echo site_url("admin/video/add_video"); ?>" name="add_video" id="video-form">
                                <div class="form-group">
                                 <label for="inputTitle">Title</label>
                                 <input type="text" class="form-control" id="inputTitle" name="inputTitle"  placeholder="ระบุชื่อเรื่อง">
                                 <span class="help-block"></span>
                                </div>
                                <div class="form-group">
                                  <label for="inputYoutube">Youtube</label>
                                  <input type="text" class="form-control" id="inputYoutube" name="inputYoutube"  placeholder="ระบุ youtube code">
                                  <span class="help-block"></span>
                                </div>
         
        
                                <button type="submit" class="btn btn-primary save" >Save</button>
                              <!--  <button type="button" id="update" class="btn btn-warning" onclick="updateData()">Update</button> -->
                              </form>

                            </div>                           
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                           <div class="card-body">
                             <!-- <button class="btn btn-success" onclick="add_faculty()"><i class="ti-plus"></i> เพิ่มข้อมูลคณะ</button>
                              <button class="btn btn-default" onclick="reload_table()"><i class="ti-reload"></i> Reload</button>
                              <br />
                              <br /> -->

                                  <table class="display nowrap table table-hover table-striped table-bordered" id="video_table" width="100%" cellspacing="0">
                                    <thead>
                                     <tr>
                                        <th>No.</th>
                                        <th>Youtube</th>
                                        <th>Title</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                      <tbody>  </tbody>

                                  </table>
                              </div>    
                             </div>
                         </div>

                   </div>   
      
               
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>