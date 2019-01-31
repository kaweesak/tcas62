<main > <!--class="pattern"-->
		<section class="hero_single version_2">
			<div class="wrapper">
				<div class="container">
					<!--<h3>Suan Dusit University</h3> -->
					<h3>มหาวิทยาลัยสวนดุสิต</h3>
					<p>เปิดรับสมัครนักศึกษา ระดับปริญญาตรี ภาคปกติ <br>ประจำปีการศึกษา 2562</p>
				
				</div>
			</div>
		</section>
		<!-- /hero_single -->
		
		<div class="main_categories">
			<div class="container">
				<ul class="clearfix">
					<li>
						<a href="<?php echo site_url('page/tcas62');?>">
							<em class="pe-7s-id"></em>
							<h3>แผนรับนักศึกษา 62</h3>
						</a>
					</li>
					<li>
						<a href="<?php echo site_url('faculty');?>">
							<em class="pe-7s-study"></em>
							<h3>หลักสูตรที่เปิดรับ</h3>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url();?>uploads/files/disabled_students62.pdf" target="_blank">
							<em class="pe-7s-global"></em>
							<h3>การรับนักศึกษาพิการ</h3>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url();?>uploads/files/2017-10-30-14-39-00.pdf" target="_blank">
							<em class="pe-7s-cash"></em>
							<h3>ค่าธรรมเนียมการศึกษา</h3>
						</a>
					</li>					
					<li>
						<a href="<?php echo site_url('page/map');?>">
							<em class="pe-7s-map"></em>
							<h3>การเดินทาง</h3>
						</a>
					</li>
				</ul>
			</div>
			<!-- /container -->
		</div>
		<!-- /main_categories -->
		
		<div class="container margin_60_35">
		
		<div class="row">
			<div class="col-md-8">
				<div class="main_title_2">
				<!--	<span><em></em></span>-->
				<h3>NEWS &amp; ACTIVITIES</h3>
				<p></p>
				</div>				
				
				<!-- banner 800x400-->
                <div class="owl-carousel owl-theme">
					<?php foreach($slides as $rec){	?>
						<?php if($rec->s_url==''){?>
							<div class="item img-fluid"><img src="<?php echo base_url('assets/img/' . $rec->s_name); ?>" alt="banner"></div>                            
                        <?php } else{?>
                            <a href="<?php echo $rec->s_url; ?>" target="_blank">  <div class="item img-fluid"><img src="<?php echo base_url('assets/img/' . $rec->s_name); ?>" alt="banner"></div></a>
                         <?php }?>
                   
					<?php } ?>                                                                                                           
                   
                </div>
				<!-- news section-->
				<h4>ข่าวล่าสุด</h4>
			<ul class="timeline">
			<?php foreach($posts as $r){	?>
				<li>
					<a href="<?php echo site_url("blog/post/$r->n_id") ?>"><em class="ti-arrow-circle-right"></em> <?php echo $r->n_subject ?></a>
					<span class="badge badge-danger float-right"><?php echo thai_date_full_month($r->n_date_create);?></span>					
				</li>
			<?php } ?>   
				
			</ul>
			<p class="float-right nopadding">
				<a href="<?php echo site_url('blog')?>" class="link_normal"></i>ข่าวทั้งหมด </a>
			</p>
			
			</div>
			<div class="col-md-4" >
				<div class="main_title_2">						
					<h3>ปฏิทินการรับสมัครด้วยระบบ TCAS</h3>
					<p></p>
					<!--<a href="grid-listings-filterscol.html">See all</a> -->
				</div>

				<div id="tcas_box">
                    <ul>
                        <li><a href="<?php echo site_url('page/portfolio')?>"><img src="<?php echo base_url();?>uploads/img/number/one.svg" width="32px" alt="การรับด้วย Portfolio"> การรับด้วย Portfolio</a> </li>
                        <li><a href="<?php echo site_url('page/qouta')?>"><img src="<?php echo base_url();?>uploads/img/number/two.svg" width="32px" alt="การรับแบบโควตา"> การรับแบบโควตา</a> </li>
                        <li><a href="<?php echo site_url('page/codirect')?>"><img src="<?php echo base_url();?>uploads/img/number/three.svg" width="32px" alt="การรับตรงร่วมกัน"> การรับตรงร่วมกัน</a></li>
						<li><a href="<?php echo site_url('page/admission')?>"><img src="<?php echo base_url();?>uploads/img/number/four.svg" width="32px" alt="การรับแบบ Admission"> การรับแบบ Admission</a> </li>
                        <li><a href="<?php echo site_url('page/direct')?>"><img src="<?php echo base_url();?>uploads/img/number/five.svg" width="32px" alt="การรับตรงอิสระ"> การรับตรงอิสระ</a>  </li>
					</ul>
                       <!-- <small><a href="#0">*Read more details</a></small>-->
                    <div class="text-center">
					    <a href="<?php echo base_url();?>uploads/tcas62/tcas62man_student.pdf" target="_blank" class="btn_1 full-width cart">คู่มือระบบ TCAS </a>
						<a href="<?php echo site_url('page/tcas_step');?>"  class="btn_1 full-width cart">การเตรียมตัวสมัคร TCAS </a>
                    </div>
                </div>
				
							
			</div>
		</div>			
			<!-- /row -->
			
		<!--	<div class="main_title_3">
				<span></span>
				<h2>Popular Hotels</h2>
				<p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
				<a href="grid-listings-filterscol.html">See all</a>
			</div>
			<div class="row add_bottom_30">
				
			</div>-->
			<!-- /row -->
			
			
		</div>
		<!-- /container -->
		
		<div class="call_section d-none d-sm-block">
			<div class="wrapper">
				<div class="container margin_80_55">
					<div class="main_title_2">
				
				<h2>CAMPUS</h2>
				<p></p>
				
			</div>
			<div class="row ">
				<div class="col-lg-4 col-sm-6">
					<a href="http://suphanburicampus.dusit.ac.th/new/" class="grid_item small">
						<figure>
							<img src="<?php echo base_url();?>uploads/img/campus/Suphan.png" alt="วิทยาเขตสุพรรณบุรี">
							<div class="info">
								<h3>วิทยาเขตสุพรรณบุรี</h3>
							</div>
						</figure>
					</a>
				</div>
				
				<div class="col-lg-4 col-sm-6">
					<a href="http://lampang.dusit.ac.th/w2017/" class="grid_item small">
						<figure>
							<img src="<?php echo base_url();?>uploads/img/campus/Lampang.png" alt="ศูนย์การศึกษานอกที่ตั้งลำปาง">
							<div class="info">
								<h3>ศูนย์ลำปาง</h3>
							</div>
						</figure>
					</a>
				</div>
				<div class="col-lg-4 col-sm-6">
					<a href="http://nakhonnayok.dusit.ac.th/" class="grid_item small">
						<figure>
							<img src="<?php echo base_url();?>uploads/img/campus/Nakhonnayok.png" alt="ศูนย์การศึกษานอกที่ตั้งนครนายก">
							<div class="info">
								<h3>ศูนย์นครนายก</h3>
							</div>
						</figure>
					</a>
				</div>
			</div>
			<!-- /row -->
			<div class="row ">
				<div class="col-lg-4 col-sm-6">
					<a href="http://huahin.dusit.ac.th/" class="grid_item small">
						<figure>
							<img src="<?php echo base_url();?>uploads/img/campus/Huahin.png" alt="ศูนย์การศึกษานอกที่ตั้งหัวหิน">
							<div class="info">
								<h3>ศูนย์หัวหิน</h3>
							</div>
						</figure>
					</a>
				</div>
				<div class="col-lg-4 col-sm-6">
					<a href="http://www.dusittrang.com/" class="grid_item small">
						<figure>
							<img src="<?php echo base_url();?>uploads/img/campus/Trang.png" alt="ศูนย์การศึกษานอกที่ตั้งตรัง">
							<div class="info">
								<h3>ศูนย์ตรัง</h3>
							</div>
						</figure>
					</a>
				</div>
				
			</div>
			<!-- /row -->
					
				</div>
				<canvas id="hero-canvas" width="1920" height="1080"></canvas>
			</div>
			<!-- /wrapper -->
		</div>
		<!--/call_section-->
		
		<div class="container margin_80_55">
			<div class="main_title_2">
				<!--<span><em></em></span>-->
				<h2>SDU Channel</h2>
				<p></p>
			</div>
										
			<div class="grid-gallery d-none d-sm-block">
					<ul class="magnific-gallery">
						<li>
							<figure>
								<img src="https://img.youtube.com/vi/2tcjehkSJV0/mqdefault.jpg" alt="คลิกแสดงวีดีโอ">
								<figcaption>
								<div class="caption-content">
									<a href="https://www.youtube.com/watch?v=2tcjehkSJV0" class="video" title="Video">
										<em class="pe-7s-film"></em>
										<p></p>
								</a>
								</div>
								</figcaption>
							</figure>
						</li>
				
						<li>
							<figure>
								<img src="https://img.youtube.com/vi/u7Zte3Gzu6Q/mqdefault.jpg" alt="คลิกแสดงวีดีโอ">
								<figcaption>
								<div class="caption-content">
									 <a href="https://www.youtube.com/watch?v=u7Zte3Gzu6Q" class="video" title="Video Youtube">
										<em class="pe-7s-film"></em>
										<p></p>
									</a>
								</div>
								</figcaption>
							</figure>
						</li>
						<li>
							<figure>
								<img src="https://img.youtube.com/vi/Bxc_u_dipn8/mqdefault.jpg" alt="คลิกแสดงวีดีโอ">
								<figcaption>
								<div class="caption-content">
									<a href="https://www.youtube.com/watch?v=Bxc_u_dipn8" class="video" title="Video ">
										<em class="pe-7s-film"></em>
										<p></p>
									</a>
								</div>
								</figcaption>
							</figure>
						</li>
						<li>
							<figure>
								<img src="https://img.youtube.com/vi/fP5j0vU5jvw/mqdefault.jpg" alt="คลิกแสดงวีดีโอ">
								<figcaption>
								<div class="caption-content">
									<a href="https://www.youtube.com/watch?v=fP5j0vU5jvw" class="video" title="Video ">
										<em class="pe-7s-film"></em>
										<p></p>
									</a>
								</div>
								</figcaption>
							</figure>
						</li>
					</ul>
				</div>
					<!-- slide Mobile-->
				<div class="video_list_1">
				<div class="owl-carousel owl-theme d-block d-sm-none" id="owl-carousel-mobile">
					<div class="item">
                                                 
							<figure>
								<img src="https://img.youtube.com/vi/2tcjehkSJV0/mqdefault.jpg" alt="คลิกแสดงวีดีโอ">
								<figcaption>
								<div class="caption-content">
									<a href="https://www.youtube.com/watch?v=2tcjehkSJV0" class="video" title="Video">
										<em class="pe-7s-film"></em>
										<p></p>
								</a>
								</div>
								</figcaption>
							</figure>
                        
                     </div>
					 <div class="item">
                                               
						<figure>
								<img src="https://img.youtube.com/vi/u7Zte3Gzu6Q/mqdefault.jpg" alt="คลิกแสดงวีดีโอ">
								<figcaption>
								<div class="caption-content">
									 <a href="https://www.youtube.com/watch?v=u7Zte3Gzu6Q" class="video" title="Video Youtube">
										<em class="pe-7s-film"></em>
										<p></p>
									</a>
								</div>
								</figcaption>
							</figure>
                        
                     </div>                    
					 <div class="item">
                                                  
						<figure>
								<img src="https://img.youtube.com/vi/Bxc_u_dipn8/mqdefault.jpg" alt="คลิกแสดงวีดีโอ">
								<figcaption>
								<div class="caption-content">
									<a href="https://www.youtube.com/watch?v=Bxc_u_dipn8" class="video" title="Video ">
										<em class="pe-7s-film"></em>
										<p></p>
									</a>
								</div>
								</figcaption>
							</figure>
                        
                     </div>                    
					 <div class="item">
                                                
						<figure>
								<img src="https://img.youtube.com/vi/fP5j0vU5jvw/mqdefault.jpg" alt="คลิกแสดงวีดีโอ">
								<figcaption>
								<div class="caption-content">
									<a href="https://www.youtube.com/watch?v=fP5j0vU5jvw" class="video" title="Video ">
										<em class="pe-7s-film"></em>
										<p></p>
									</a>
								</div>
								</figcaption>
							</figure>
                       
                     </div>                                                                                                                        
                   
                </div>

			</div>
				<!-- /grid -->
		
		</div>
		<!-- /container -->
	</main>
	<!-- /main -->