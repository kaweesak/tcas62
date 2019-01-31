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
						<a href="<?php echo site_url('page/tcas62'); ?>">
							<em class="pe-7s-id"></em>
							<h3>แผนรับนักศึกษา 62</h3>
						</a>
					</li>
					<li>
						<a href="<?php echo site_url('faculty'); ?>">
							<em class="pe-7s-study"></em>
							<h3>หลักสูตรที่เปิดรับ</h3>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url(); ?>uploads/files/disabled_students62.pdf" target="_blank">
							<em class="pe-7s-global"></em>
							<h3>การรับนักศึกษาพิการ</h3>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url(); ?>uploads/files/2017-10-30-14-39-00.pdf" target="_blank">
							<em class="pe-7s-cash"></em>
							<h3>ค่าธรรมเนียมการศึกษา</h3>
						</a>
					</li>
					<li>
						<a href="<?php echo site_url('page/map'); ?>">
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
			<div class="col-md-8 ">
				<div class="main_title_2">
				<!--	<span><em></em></span>-->
				<h3>NEWS &amp; ACTIVITIES</h3>
				<p></p>
				</div>

				<!-- banner 800x400-->
                <div class="owl-carousel owl-theme">
					<?php foreach ($slides as $rec) {?>
						<?php if ($rec->s_url == '') {?>
							<div class="item img-fluid"><img src="<?php echo base_url('uploads/slide/' . $rec->s_name); ?>" alt="banner"></div>
                        <?php } else {?>
                            <a href="<?php echo $rec->s_url; ?>" target="_blank">  <div class="item img-fluid"><img src="<?php echo base_url('uploads/slide/' . $rec->s_name); ?>" alt="banner"></div></a>
                         <?php }?>

					<?php }?>

                </div>
				<!-- news section-->
				<h4>ข่าวล่าสุด</h4>
			<ul class="timeline">
			<?php foreach ($posts as $r) {?>
				<li>
					<a href="<?php echo site_url("blog/post/$r->n_id") ?>"><em class="ti-arrow-circle-right"></em> <?php echo $r->n_subject ?></a>
					<span class="badge badge-danger float-right"><?php echo thai_date_full_month($r->n_date_create); ?></span>
				</li>
			<?php }?>

			</ul>

			<p class="float-right nopadding">
				<a href="<?php echo site_url('blog') ?>" class="link_normal"></i>ข่าวทั้งหมด </a>
			</p>

			</div>
			<div class="col-md-4 " >
				<div class="main_title_2">
					<h3>ปฏิทินการรับสมัครด้วยระบบ TCAS</h3>
					<p></p>
					<!--<a href="grid-listings-filterscol.html">See all</a> -->
				</div>
				<div id="tcas_plan">
				<ul>
                        <li class="tcas_plan_c1">
							<a href="<?php echo site_url('page/portfolio') ?>">
								<img src="<?php echo base_url(); ?>uploads/img/number/one.svg" width="32px" alt="การรับด้วย Portfolio"><strong>การรับด้วย Portfolio</strong>รับสมัคร :1 - 15 ธันวาคม 2561
							</a>
						</li>
                        <li class="tcas_plan_c2">
							<a href="<?php echo site_url('page/qouta') ?>">
								<img src="<?php echo base_url(); ?>uploads/img/number/two.svg" width="32px" alt="การรับแบบโควตา"><strong>การรับแบบโควตา</strong>รับสมัคร :4 กุมภาพันธ์ - 23 มีนาคม 2562
							</a>
						</li>
						<li class="tcas_plan_c3">
							<a href="<?php echo site_url('page/codirect') ?>">
								<img src="<?php echo base_url(); ?>uploads/img/number/three.svg" width="32px" alt="การรับตรงร่วมกัน"><strong>การรับตรงร่วมกัน</strong>รับสมัคร :17 - 29 เมษายน 2562
							</a>
						</li>
						<li class="tcas_plan_c4">
							<a href="<?php echo site_url('page/admission') ?>">
								<img src="<?php echo base_url(); ?>uploads/img/number/four.svg" width="32px" alt="การรับแบบ Admission"><strong>การรับแบบ Admission</strong>รับสมัคร :9 - 19 พฤษภาคม 2562
							</a>
						</li>
						<li class="tcas_plan_c5">
							<a href="<?php echo site_url('page/direct') ?>">
								<img src="<?php echo base_url(); ?>uploads/img/number/five.svg" width="32px" alt="การรับตรงอิสระ"><strong>การรับตรงอิสระ</strong>รับสมัคร :30 พฤษภาคม - 10 มิถุนายน 2562
							</a>
						</li>
					</ul>
					<div class="text-center">
					    <a href="<?php echo base_url(); ?>uploads/tcas62/tcas62man_student.pdf" target="_blank" class="btn_1 full-width cart">คู่มือระบบ TCAS </a>
						<a href="<?php echo site_url('page/tcas_step'); ?>"  class="btn_1 full-width cart">การเตรียมตัวสมัคร TCAS </a>
                    </div>
					<div class="text-center">
						<a href="javascript:goto_link(1)" ><img class="hvr-bob" src="<?php echo base_url(); ?>uploads/img/register_1.jpg" alt="การรับสมัคร"></a>
					</div>
				</div>


			</div>
		</div>
			<!-- /row -->



		</div>
		<!-- /container -->


		<div class="container margin_60_35">
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
		<div class="bg_color_1">
		<div class="container margin_60_35">
		<div class="row justify-content-center">

            <ul class="client_gallery text-center">
                <li><a href="http://mytcas.com/" target="_blank">
				<img class="rounded" src="<?php echo base_url(); ?>uploads/img/clients/mytcas.jpg" height="84px" alt="client">
          </a>
        </li>
        <li> <a href="http://www.cupt.net/" target="_blank">
		<img class="rounded" src="<?php echo base_url(); ?>uploads/img/clients/acupt.jpg" height="84px" alt="client">
          </a>
        </li>
        <li> <a href="http://www.niets.or.th/th/" target="_blank">
		<img class="rounded" src="<?php echo base_url(); ?>uploads/img/clients/niets.jpg" height="84px" alt="client">
          </a>
        </li>

    </ul>
        </div>
			<!-- /row -->
		</div>
	</div>
		<!-- Test session login-->
		<?php //print_r($this->session->all_userdata());?>

	</main>
	<!-- /main -->