<div class="sub_header_in sticky_header">
	<div class="container">
		<h1><?php echo $course->c_name; ?></h1>
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
      <a class="nav-link active" data-toggle="tab" href="#tab_1">จุดเด่น</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#tab_2">คณาจารย์</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#tab_3">อาชีพที่สามารถประกอบได้</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#tab_4">เกณฑ์การรับสมัคร</a>
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
    <?php if ($course->c_id == '32') {?>
<div class="row">
<img src="<?php echo base_url();?>uploads/course/32/dBizCom02.jpg" class="img-fluid" alt="picture">
</div>
<?php }?>
    <div class="row">
        <?php
if (!empty($teachers)) {
    foreach ($teachers as $t) {
        //<img src="http://personnel.dusit.ac.th/eprofile/main/files/bio_data_file/2010004445.jpg" >
       
        ?>
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="card agent">
            <div class="agent-avatar text-center">
                <a href="#0">
                <?php if (empty($t->p_photo)) {?>
                <?php 
                $t_img = 'http://personnel.dusit.ac.th/eprofile/main/files/bio_data_file/'. $t->p_code .'.jpg';
                    if(!is_url_exist($t_img) ){
                        echo '<img src="'. base_url() .'uploads/img/avatar.png" class="img-fluid " style="margin-top: 10px;" alt="">';
                    }else{
                        echo '<img src="'. $t_img  .'" class="img-fluid" style="margin-top: 10px;width:200px" alt="">';
                    }
                ?>
                
                <?php } else {?>
                    <img src="<?php echo base_url(); ?>uploads/teacher/<?php echo $t->course_id; ?>/<?php echo $t->p_photo; ?>" class="img-fluid " style="margin-top: 10px;" alt="">
                <?php }?>
            	</a>
           	</div>
            <div class="agent-content">
                <div class="agent-name">
                    <span><?php echo $t->position; ?></span>
                    <h4><a href="#0"><?php echo $t->prefix; ?> <?php echo $t->fullname; ?></a></h4>
                    <?php echo $t->p_detail; ?>
                </div>
                <?php $query = $this->db->order_by('s_order', 'ASC')->get_where('tbl_tcas_degree', array('teacher_id' => $t->teacher_id));?>
                 <div class="agent-contact-details">
                 <?php foreach ($query->result() as $r) {?>
                    <span><?php echo '<strong>' . $r->degree_name . '</strong>: <br>' . $r->degree_shot . ' ' . $r->branch_success . '<br>' . $r->university; ?></span><br>
                   <?php }?>
                </div>

            </div>
        </div>
    </div>
    <?php }}?>

</div>

    </div>
    <div id="tab_3" class="container tab-pane fade"><br>
       	<?php echo $course->job; ?>

    </div>
     <div id="tab_4" class="container tab-pane fade"><br>
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
    $ptab1 = '<li><a href="#menu1"><strong>การรับด้วย Portfolio</strong><br>รับสมัคร : 1 - 15 ธันวาคม 2561</a></li>';
    $dtab1 = '<div id="menu1" class="tab-contents">' . $course->c_q1 . '</div>';
}
if (substr($course->c_tcas, 1, 1) == '1') {
    $ptab2 = '<li><a href="#menu2"><strong>การรับแบบโควตา</strong><br>รับสมัคร : 4 กุมภาพันธ์ - 23 มีนาคม 2562</a></li>';
    $dtab2 = '<div id="menu2" class="tab-contents">' . $course->c_q2 . '</div>';
}
if (substr($course->c_tcas, 2, 1) == '1') {
    $ptab3 = '<li><a href="#menu3"><strong>การรับตรงร่วมกัน</strong><br>รับสมัคร : 17 - 29 เมษายน 2562</a></li>';
    $dtab3 = '<div id="menu3" class="tab-contents">' . $course->c_q3 . '</div>';
}
if (substr($course->c_tcas, 3, 1) == '1') {
    $ptab4 = '<li><a href="#menu4"><strong>การรับแบบ Admission</strong><br>รับสมัคร : 9 - 19 พฤษภาคม 2562</a></li>';
    $dtab4 = '<div id="menu4" class="tab-contents">' . $course->c_q4 . '</div>';
}
if (substr($course->c_tcas, 4, 1) == '1') {
    $ptab5 = '<li><a href="#menu5"><strong>การรับตรงอิสระ</strong><br>รับสมัคร : 30 พฤษภาคม - 10 มิถุนายน 2562</a></li>';
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
    </div>
  </div>


						<!--	<h3 class="h-padding-10">เกณฑ์การรับสมัคร</h3> -->




                            <h3 class="h-padding-10">สถานที่จัดการเรียนการสอน</h3>
                           <p> <?php echo $course->place; ?> </p>
<br>
<br>

							<img src="<?php echo base_url(); ?>uploads/img/course/<?php echo $course->c_picture_footer; ?>" class="img-fluid" alt="footer banner">


						</section>
						<!-- /section -->



					</div>
					<!-- /col -->

					<aside class="col-lg-4" id="sidebar">
						<div class="box_general faculty_info">


							<?php if ($course->c_youtube != '') {?>
						<div class="video-responsive">
                            <iframe id="vid_frame" src="http://www.youtube.com/embed/<?php echo $course->c_youtube; ?>?rel=0&showinfo=0&autohide=1" frameborder="0" width="390" height="220"></iframe>
                        </div>
							<?php }?>
                <?php if ($course->c_youtube_2 != '') {?>
                     <div class="div-1"></div>
						<div class="video-responsive">
                            <iframe id="vid_frame" src="http://www.youtube.com/embed/<?php echo $course->c_youtube_2; ?>?rel=0&showinfo=0&autohide=1" frameborder="0" width="390" height="220"></iframe>
                        </div>
                            <?php }?>

                        <div class="div-1"></div>


                        <p><strong>เว็บไซต์:</strong><br><a  href="<?php echo $course->c_link; ?>" target="_blank"><?php echo $course->c_link; ?></a></p>
                        <p><strong>สอบถามเพิ่มเติมเกี่ยวกับหลักสูตรได้ที่:</strong><br><?php echo $course->c_name; ?><br><?php echo $course->c_tel; ?></p>

						</div>
                         <!-- Go to www.addthis.com/dashboard to customize your tools -->
                         <div class="addthis_inline_share_toolbox"></div>
					</aside>
            </div>
    	</div>
	</div>

</main>