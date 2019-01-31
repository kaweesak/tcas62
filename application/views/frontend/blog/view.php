<div class="sub_header_in sticky_header">
	<div class="container">
		<h1>ข่าว</h1>
	</div>
		<!-- /container -->
</div>
	<!-- /sub_header -->

<main>
    <div class="container margin_60_35">
		<div class="row">
            <div class="col-md-12">
                <div class="singlepost">
                <h5 ><?php echo $post->n_subject ?></h5>
                <div class="postmeta">
							<ul>
								<li><a href="#"><i class="ti-folder"></i> ข่าวประชาสัมพันธ์</a></li>
								<li><a href="#"><i class="ti-calendar"></i> <?php echo thai_date_full_month_time($post->n_date_create); ?></a></li>
								<li><a href="#"><i class="ti-user"></i> Admin</a></li>								
							</ul>
						</div>
						<!-- /post meta -->
                   
                <div class="post-content">
                    <?php echo $post->n_detail ?>
                </div>
                <!-- /post -->
                
                </div>
         <!-- /single-post -->
          <!-- Go to www.addthis.com/dashboard to customize your tools --> 
          <div class="addthis_inline_share_toolbox"></div>
            </div>
        </div>
    </div>


</main>

