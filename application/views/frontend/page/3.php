<div class="sub_header_in sticky_header">
		<div class="container">
        <h3><?php echo $title; ?></h3>
		</div>
		<!-- /container -->
	</div>
	<!-- /sub_header -->

<main>
<div class="container margin_60_35">
		<div class="row">
            <div class="col-lg-8">
						<section id="description">
							<h4>รายละเอียด</h4>
                            <img class="img-fluid" src="<?php echo base_url();?>uploads/tcas62/tcas3.jpg" alt="co-direct" style="padding-bottom:20px">
						<!-- 	<div class="row">
                                <div class="col-xs-12 col-md-6">
<div class="video-responsive">
                            <iframe id="vid_frame" src="http://www.youtube.com/embed/NeUQNVkirC8?rel=0&showinfo=0&autohide=1" frameborder="0" width="390" height="220"></iframe>
                        </div>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                     <div class="video-responsive">
                            <iframe id="vid_frame" src="http://www.youtube.com/embed/5InoxzInFaU?rel=0&showinfo=0&autohide=1" frameborder="0" width="390" height="220"></iframe>
                        </div>
                                </div>
                            </div> -->
                            <br>
                             <a href="<?php echo base_url();?>uploads/files/codirect.pdf" class="btn_1 full-width outline wishlist" target="_blank">หลักเกณฑ์การรับสมัครบุคคลเข้าศึกษา และหลักสูตรที่เปิดรับ</a>
                       
                       
							<hr>

							<h4>ตารางกิจกรรม </h4>
							<!--    <div class="text-danger text-center">-- รอประกาศจากมหาวิทยาลัย --</div> -->
                            <div class="row">
        <div class="col-md-12">
        <table  align="center" border="1" cellpadding="0" cellspacing="0" 
            class="table table-bordered table-hover table-striped text-center"  style="font-size:0.8em; ">
        <thead>
            <tr>
                <td></td>
                <td><strong>กิจกรรม</strong></td>
                <td style="width:25%"><strong>วัน - เวลา</strong></td>
                <td style="width:25%"><strong>รายละเอียด</strong></td>
            </tr>		
        </thead>
        <tbody>
            <?php foreach ($events as $key => $e){     ?>
                <tr>
                <td><?php echo $e->event_order; ?></td>
                <td align="left"><?php echo $e->event_desc; ?></td>
                <td><?php echo $e->event_date; ?></td>
                <td align="left"><?php echo $e->note; ?></td>                   
                </tr>
            <?php } ?>
            
        </tbody>
    </table>
                </div>
                </div>
                            
	 <div class="row">
        <div class="col-md-12">
                      
            <h4>หลักสูตรที่เปิดรับ </h4>
     
    <div role="tablist" class="add_bottom_45 accordion_2" id="tips">
    <?php 
     $facid = '';
        foreach ($tcass as $key => $r){ 
       
        ?>

        <?php if($facid == $r->fac_id){	?>
            
      <?php  } else {?>   
                 <div class="card">      
                    <div class="card-header" role="tab">
                        <h5 class="mb-0">
                            <a class="collapsed" data-toggle="collapse" href="#collapse_<?php echo $r->fac_id; ?>" aria-expanded="false">
                            <em class="indicator ti-angle-down"></em><?php echo $r->fac_name; ?>
                            </a>
                        </h5>
                    </div>
                    
                    <div id="collapse_<?php echo $r->fac_id; ?>" class="collapse" role="tabpanel" data-parent="#tips">
                        <div class="card-body">
                           <?php foreach ($tcass as $key => $r2){ 
                               if($r2->fac_id == $r->fac_id){ ?>                               	
			
			                        <a  href="<?php echo base_url('uploads/tcas62/3/0'.$r2->fac_id .'/'. $r2->c_id.'.pdf');?>" target="_blank"> <?php echo $r2->c_name . (!isset($r2->loc) || $r2->loc=='' ? '':'('.$r2->loc.')'); ?> </a><span class="badge badge-success float-right"><?php echo $r2->t_q3; ?></span><br>
           
                             <?php   }} ?>  
                             <br>                                   
                        </div>
                    </div>
                   
            </div>
            <!-- /card -->
        <?php   } ?> 
    	<?php  
         $facid = $r->fac_id;
        }  ?>    
           
    </div>
                            
        </div>
    
    </div> <!-- /row -->					
							
							
						</section>
						<!-- /section -->				
						
					</div>
					<!-- /col -->
					
					<aside class="col-lg-4" id="sidebar">
						<div class="box_detail2 booking">
                        <div id="tcas_box">
                        <ul>
                        <li id="r1"><a <?php if($this->uri->segment(2)=="portfolio"){echo 'class="active"';}?> href="<?php echo site_url('page/portfolio')?>"><img src="<?php echo base_url();?>uploads/img/number/one.svg" width="32px" alt="การรับด้วย Portfolio"> การรับด้วย Portfolio</a> </li>
                        <li id="r2"><a <?php if($this->uri->segment(2)=="qouta"){echo 'class="active"';}?> href="<?php echo site_url('page/qouta')?>"><img src="<?php echo base_url();?>uploads/img/number/two.svg" width="32px" alt="การรับแบบโควตา"> การรับแบบโควตา</a> </li>
                        <li id="r3"><a <?php if($this->uri->segment(2)=="codirect"){echo 'class="active"';}?> href="<?php echo site_url('page/codirect')?>"><img src="<?php echo base_url();?>uploads/img/number/three.svg" width="32px" alt="การรับตรงร่วมกัน"> การรับตรงร่วมกัน</a></li>
						<li id="r4"><a <?php if($this->uri->segment(2)=="admission"){echo 'class="active"';}?> href="<?php echo site_url('page/admission')?>"><img src="<?php echo base_url();?>uploads/img/number/four.svg" width="32px" alt="การรับแบบ Admission"> การรับแบบ Admission</a> </li>
                        <li id="r5"><a <?php if($this->uri->segment(2)=="direct"){echo 'class="active"';}?> href="<?php echo site_url('page/direct')?>"><img src="<?php echo base_url();?>uploads/img/number/five.svg" width="32px" alt="การรับตรงอิสระ"> การรับตรงอิสระ</a>  </li>
					</ul>
                      
                </div>
						</div>
                        <!-- Go to www.addthis.com/dashboard to customize your tools --> <div class="addthis_inline_share_toolbox"></div>
						<!--<ul class="share-buttons">
							<li><a class="fb-share" href="#0"><i class="social_facebook"></i> Share</a></li>
							<li><a class="twitter-share" href="#0"><i class="social_twitter"></i> Tweet</a></li>
							<li><a class="gplus-share" href="#0"><i class="social_googleplus"></i> Share</a></li>
                        </ul>-->
                        
					</aside>
            
    	</div>
    </div>
   

</main>
