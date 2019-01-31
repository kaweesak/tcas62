<?php
/*
if(!isset($course) || (empty($course))) {
redirect('page404');
}*/
?>

<div class="sub_header_in sticky_header">
	<div class="container">
		<h1><?php echo $title; ?> : <?php echo $course->c_name; ?></h1>
	</div>
		<!-- /container -->
</div>
	<!-- /sub_header -->

<main>
    <div class="container margin_60_35">
		<div class="row">

			<div class="col-lg-8">
						<section id="description">
							<img src="<?php echo base_url(); ?>assets/img/<?php echo $course->c_picture; ?>" class="img-fluid" alt="header banner">

							<h2>รายละเอียด</h2>
							<?php echo $course->philosophy; ?>





     <!-- Nav tabs -->
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#tab_1">จุดเด่นของสาขา</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#tab_2">คณาจารย์</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#tab_3">อาชีพที่สามารถประกอบได้</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="tab_1" class="container tab-pane active"><br>
        <?php if ($course->detail != '') {
    echo $course->detail;
}?>
    </div>
    <div id="tab_2" class="container tab-pane fade"><br>

    <!-- วุฒิการศึกษา :
ปริญญาเอก: ศษ.ด. (หลักสูตรและการสอน) มหาวิทยาลัยเกษตรศาสตร์

ปริญญาโท: กศ.ม. (ภาษาอังกฤษ) มหาวิทยาลัยศรีนครินทรวิโรฒ ประสานมิตร

ปริญาตรี: กศ.บ. (ภาษาอังกฤษ) มหาวิทยาลัยศรีนครินทรวิโรฒ ประสานมิตร
-->
    <div class="row">
        <?php 
        if(isset($teachers)) {
        foreach ($teachers as $t) {

    ?>
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="card agent">
            <div class="agent-avatar">
                <a href="agent-profile.html">
                	<img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="img-fluid avatar" style="margin-top: 10px;" alt="">
            	</a>
           	</div>
            <div class="agent-content">
                <div class="agent-name">
                    <span><?php echo $t->prefix; ?></span>
                    <h4><a href="agent-profile.html"><?php echo $t->personnel_name; ?></a></h4>
                </div>
                <?php $query = $this->db->get_where('tbl_tcas_degree', array('teacher_id' => $t->teacher_id));?>
                 <div class="agent-contact-details">
                 <?php foreach ($query->result() as $r) {?>
                    <span><?php echo $r->degree_name . ':' .$r->degree_shot . ' ' . $r->branche_success . '<br>'.$r->university; ?></span><br>
                   <?php }?>
                </div>
                <ul class="agent-contact-details">
                    <?php foreach ($query->result() as $r) {?>
                    <li><?php echo $r->degree_name; ?></li>
                   <?php }?>
                </ul>
              <!--  <ul class="social-icons">
                    <li><a class="facebook" href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                    <li><a class="twitter" href="#"><i class="zmdi zmdi-twitter"></i></a></li>
                    <li><a class="gplus" href="#"><i class="zmdi zmdi-google-plus"></i></a></li>
                    <li><a class="linkedin" href="#"><i class="zmdi zmdi-linkedin"></i></a></li>
                </ul> -->
            </div>
        </div>
    </div>
    <?php }}?>

</div>

    </div>
    <div id="tab_3" class="container tab-pane fade"><br>
       	<?php echo $course->job; ?>

    </div>
  </div>


							<h3 class="h-padding-10">เกณฑ์การรับสมัคร</h3>

						<div class="tabs">
            <div class="tab-button-outer">
    <ul id="tab-button">
  <?php
$ptab1 = '';
$ptab2 = '';
$ptab3 = '';
$ptab4 = '';
$ptab5 = '';
$dtab1 = '';
$dtab2 = '';
$dtab3 = '';
$dtab4 = '';
$dtab5 = '';
if (substr($course->c_tcas, 0, 1) == '1') {
    $ptab1 = '<li><a href="#menu1">การรับด้วย Portfolio</a></li>';
    $dtab1 = '<div id="menu1" class="tab-contents">' . $course->c_q1 . '</div>';
}
if (substr($course->c_tcas, 1, 1) == '1') {
    $ptab2 = '<li><a href="#menu2">การรับแบบโควตา</a></li>';
    $dtab2 = '<div id="menu2" class="tab-contents">' . $course->c_q2 . '</div>';
}
if (substr($course->c_tcas, 2, 1) == '1') {
    $ptab3 = '<li><a href="#menu3">การรับตรงร่วมกัน</a></li>';
    $dtab3 = '<div id="menu3" class="tab-contents">' . $course->c_q3 . '</div>';
}
if (substr($course->c_tcas, 3, 1) == '1') {
    $ptab4 = '<li><a href="#menu4">การรับแบบ Admission</a></li>';
    $dtab4 = '<div id="menu4" class="tab-contents">' . $course->c_q4 . '</div>';
}
if (substr($course->c_tcas, 4, 1) == '1') {
    $ptab5 = '<li><a href="#menu5">การรับตรงอิสระ</a></li>';
    $dtab5 = '<div id="menu5" class="tab-contents">' . $course->c_q5 . '</div>';
}
echo $ptab1 . $ptab2 . $ptab3 . $ptab4 . $ptab5;
?>

</ul>
  </div>
  <div class="tab-select-outer">
  <label for="tab-select">รอบการเปิดรับ:</label>
    <select id="tab-select" class="form-control-sm">
      <?php
if (substr($course->c_tcas, 0, 1) == '1') {
    echo '<option value="#menu1">การรับด้วย Portfolio</option>';
}
if (substr($course->c_tcas, 1, 1) == '1') {
    echo '<option value="#menu2">การรับแบบโควตา</option>';
}
if (substr($course->c_tcas, 2, 1) == '1') {
    echo '<option value="#menu3">การรับตรงร่วมกัน</option>';
}
if (substr($course->c_tcas, 3, 1) == '1') {
    echo '<option value="#menu4">การรับแบบ Admission</option>';
}
if (substr($course->c_tcas, 4, 1) == '1') {
    echo '<option value="#menu5">การรับตรงอิสระ</option>';
}
?>
    </select>
  </div>

    <?php
echo $dtab1 . $dtab2 . $dtab3 . $dtab4 . $dtab5;
?>

  </div>


                            <h3 class="h-padding-10">สถานที่จัดการเรียนการสอน</h3>
                            <?php echo $course->place; ?>

							<h3 class="h-padding-10">สอบถามเพิ่มเติมเกี่ยวกับหลักสูตรได้ที่ :</h3>
							<?php echo $course->c_name; ?><br>
							<?php echo $course->c_tel; ?>



							<img src="<?php echo base_url(); ?>assets/img/<?php echo $course->c_picture_footer; ?>" class="img-fluid" alt="footer banner">





						</section>
						<!-- /section -->



					</div>
					<!-- /col -->

					<aside class="col-lg-4" id="sidebar">
						<div class="box_detail booking">


							<?php if ($course->c_youtube != '') {?>
						<div class="video-responsive">
                            <iframe id="vid_frame" src="http://www.youtube.com/embed/<?php echo $course->c_youtube; ?>?rel=0&showinfo=0&autohide=1" frameborder="0" width="390" height="220"></iframe>
                        </div>
							<?php }?>
            	<?php if ($course->c_youtube_2 != '') {?>
						<div class="video-responsive">
                            <iframe id="vid_frame" src="http://www.youtube.com/embed/<?php echo $course->c_youtube_2; ?>?rel=0&showinfo=0&autohide=1" frameborder="0" width="390" height="220"></iframe>
                        </div>
							<?php }?>
            <?php if ($course->c_link != '') {?>
              <div class="price"></div>
							<a class="btn_1 full-width outline wishlist" href="<?php echo $course->c_link; ?>" target="_blank">เว็บไซต์หลักสูตร</a>
						<?php }?>
						</div>
                         <!-- Go to www.addthis.com/dashboard to customize your tools -->
                         <div class="addthis_inline_share_toolbox"></div>
					</aside>
            </div>
    	</div>
	</div>

</main>