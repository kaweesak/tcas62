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
                        <h4 class="text-themecolor">Blog</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Blog</li>
                            </ol>
                            <a href="<?php echo site_url('admin/blog/blog_add')?>" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</a>
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
							  <h4 class="card-title">Blog</h4>
                              <h6 class="card-subtitle">List of blog opend by customers</h6>

                               <table class="display nowrap table table-hover table-striped table-bordered" id="blog_table" width="100%">
				                <thead>
					                <tr>
					<!--	<th>ID</th>-->
						                <th>Title</th>						                
                                        <th>Created By</th>
                                        <th>Status</th>                        
						                <th>Date Created</th>					
						                <th style="text-align:center">Action</th>
					                </tr>
				                </thead>
				                <tbody> </tbody>
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