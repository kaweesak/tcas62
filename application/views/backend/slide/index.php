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
                        <h4 class="text-themecolor">Slide</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">slide</li>
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
							  <h4 class="card-title">Slide</h4>
                              <h6 class="card-subtitle">อัพโหลด(ขนาดไฟล์สูงสุด: 3MB)</h6>
                            <div class="row">
                            <div class="col-md-12">
                                <form action="<?php echo base_url() ?>admin/slide/handle_file_upload" method="post" enctype="multipart/form-data" class="dropzone" id="myAwesomeDropzone">

                                </form>

                                <div class="final-info"></div>
                            </div>
                        </div>

                        <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive" >
                                <table class="table" id="slide_table" width="100%" >

                                    <thead>
                                    <tr>
                                        <th>Picture</th>
                                        <th>Title </th>
                                        <th>Url </th>
                                        <th width="90px">Status </th>
                                        <th width="90px" style="text-align:center">จัดการ</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    </tbody>

                                </table>
                                    </div>
                                <div id="slide_data"></div>
                            </div>
                        </div>


                         </div> <!--end card body-->
                        </div>
                    </div>
                </div>
              
              
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
</div>