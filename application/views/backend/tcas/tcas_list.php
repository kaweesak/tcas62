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
                        <h4 class="text-themecolor">TCAS</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">TCAS</li>
                            </ol>
                            <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button>
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
                <?php
                //Columns must be a factor of 12 (1,2,3,4,6,12)
                  $numOfCols = 4;
                  $rowCount = 0;
                  $bootstrapColWidth = 12 / $numOfCols;
                  ?>
                  <div class="row">
                  <?php
                  foreach ($rows as $row){
                  ?>  
                          <div class="col-md-<?php echo $bootstrapColWidth; ?>">
                             <img class="img-responsive" alt="user" src="<?php echo base_url();?>public/admin/images/big/c2.jpg">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row->title; ?></h5>
                                <div class="m-b-20">
                                    <a class="link list-icons" href="#">
                                        <i class="ti-alarm-clock"></i> ปี <?php echo $row->tcas_year; ?>
                                    </a>
                                  <!--  <a class="link list-icons m-l-10 m-r-10" href="#">
                                        <i class="fa fa-heart-o"></i> 38
                                    </a>
                                    <a class="link list-icons m-l-10 m-r-10" href="#">
                                        <i class="fa fa-usd"></i> 50
                                    </a> -->
                                </div>
                                <div class="d-flex no-block align-items-center">
                                    <span><i class="ti-alarm-clock"></i> Duration: <?php echo $row->tcas_duration; ?></span>
                                </div>
                               <!-- <div class="d-flex no-block align-items-center p-t-10">
                                    <span><i class="ti-user"></i> Professor: Jane Doe</span>
                                </div>
                                <div class="d-flex no-block align-items-center p-t-10">
                                    <span><i class="fa fa-graduation-cap"></i> Students: 200+</span></span>
                                </div> -->
                               <!-- <button class="btn btn-success btn-rounded waves-effect waves-light m-t-30">More Details</button> -->
                            </div>
                        </div>
                          </div>
                  <?php
                                       $rowCount++;
                      if($rowCount % $numOfCols == 0) echo '</div><div class="row">';
                  }
                  ?>
                  </div>
      
                
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
               
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
