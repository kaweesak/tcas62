<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="TCAS 62">
    <meta name="author" content="TCAS 62">

    
	<title><?php echo (!isset($title) || $title == '' ? 'มหาวิทยาลัยสวนดุสิต' : $title . '| มหาวิทยาลัยสวนดุสิต');   ?></title>

	<!-- Favicons-->
    <link rel="shortcut icon" href="http://www.dusit.ac.th/wp-content/uploads/2014/01/logo-ico.png" type="image/x-icon" />
	
    <!-- BASE CSS -->
    <link href="<?php echo base_url('public/frontend/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('public/frontend/css/style.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('public/frontend/css/vendors.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('public/frontend/css/icon_fonts/css/all_icons.min.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('public/frontend/fonts/maledpan/font.css');?>" rel="stylesheet">
	<link href="<?php //echo base_url('public/frontend/css/color-sdu-blue.css');?>" rel="stylesheet">
	
    <?php if(isset($css_scripts)) foreach ($css_scripts as $css_script):?>
    <link href="<?php echo base_url("public/frontend/$css_script.css")?>" rel="stylesheet">
    <?php endforeach;?>
    <!-- YOUR CUSTOM CSS -->
    <link href="<?php echo base_url('public/frontend/css/custom.css');?>" rel="stylesheet">	
    <script>
        var base_url = '<?php echo base_url(); ?>';
    </script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-7497655-18"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-7497655-18');
</script>

</head>

<body>
    <div id="page">
	
	<header class="header menu_fixed">
		<div id="logo">
		<a href="<?php echo base_url();?>" title="TCAS - Suan Dusit University">
				<img src="<?php echo base_url();?>uploads/img/logo.png" width="150" height="36" data-retina="true" alt="" class="logo_normal">
				<img src="<?php echo base_url();?>uploads/img/logo_sticky.png" width="150" height="36" data-retina="true" alt="" class="logo_sticky">
			</a>		
		</div>
		<ul id="top_menu">
			<li><a href="0#" class="btn_add">สมัครเรียน</a></li>
			<!--<li><a href="0#" id="sign-in" class="login" title="Sign In">Sign In</a></li>
			<li><a href="0#" class="wishlist_bt_top" title="Your wishlist">Your wishlist</a></li>-->
		</ul>
		<!-- /top_menu -->
		<a href="#menu" class="btn_mobile">
			<div class="hamburger hamburger--spin" id="hamburger">
				<div class="hamburger-box">
					<div class="hamburger-inner"></div>
				</div>
			</div>
		</a>
		<nav id="menu" class="main-menu">
			<ul>
				<li><span><a href="<?php echo base_url();?>">หน้าแรก</a></span></li>
				<li><span><a href="#0">สมัครเรียน</a></span>
					<ul>
						<li><span><a href="#0">การรับสมัครระบบ TCAS</a></span>
							<ul class="third_level_left">
								<li><a href="<?php echo site_url('page/portfolio')?>">การรับด้วย Portfolio</a></li>
								<li><a href="<?php echo site_url('page/qouta')?>">การรับแบบโควตา</a></li>
								<li><a href="<?php echo site_url('page/codirect')?>">การรับตรงร่วมกัน</a></li>
								<li><a href="<?php echo site_url('page/admission')?>">การรับแบบ Admission</a></li>
								<li><a href="<?php echo site_url('page/direct')?>">การรับตรงอิสระ</a></li>	
							</ul>
						</li>
						<li><a href="<?php echo site_url('faculty');?>">หลักสูตรที่เปิดรับ</a></li>
						<li><a href="<?php echo base_url();?>uploads/files/disabled_students62.pdf" target="_blank">การรับนักศึกษาพิการ</a></li>
						<li><a href="<?php echo base_url();?>uploads/files/2017-10-30-14-39-00.pdf" target="_blank">ค่าเทอม</a></li>
						<li><a href="#0">ทุนการศึกษา</a></li>											
					</ul>
				</li>
				<li><span><a href="#0">คณะและโรงเรียน</a></span>
					<ul>
						<li><a href="http://education.dusit.ac.th/">คณะครุศาสตร์</a></li>
						<li><a href="http://nurse.dusit.ac.th/">คณะพยาบาลศาสตร์</a></li>
						<li><a href="http://human.dusit.ac.th/">คณะมนุษยศาสตร์และสังคมศาสตร์</a></li>
						<li><a href="http://manage.dusit.ac.th/">คณะวิทยาการจัดการ</a></li>
						<li><a href="http://scitech.dusit.ac.th/">คณะวิทยาศาสตร์และเทคโนโลยี</a></li>
						<li><a href="#0">โรงเรียนกฎหมายและการเมือง</a></li>
						<li><a href="http://thmdusit.dusit.ac.th/">โรงเรียนการท่องเที่ยวและการบริการ</a></li>
						<li><a href="http://food.dusit.ac.th/">โรงเรียนการเรือน</a></li>						
					</ul>
				</li>
				<li><span><a href="#0">หอพัก</a></span>
					<ul>
						<li><a href="#0">หอพักศูนย์สิรินทรณ์</a></li>
						<li><a href="#0">หอพักวิทยาเขตสุพรรณบุรี</a></li>
						<li><a href="#0">หอพักศูนย์หัวหิน</a></li>
						<li><a href="#0">หอพักศูนย์นครนายก</a></li>
						<li><a href="#0">หอพักศูนย์ลำปาง</a></li>
						<li><a href="#0">หอพักศูนย์ตรัง</a></li>						
					</ul>
				</li>
				
				<li><span><a href="#0">การเดินทาง</a></span>
					<!--<ul>
						<li><a href="about.html">About</a></li>
						<li><a href="media-gallery.html">Media gallery</a></li>
						<li><a href="help.html">Help Section</a></li>
						<li><a href="faq.html">Faq Section</a></li>
						<li><a href="wishlist.html">Wishlist page</a></li>
						<li><a href="contacts.html">Contacts</a></li>
						<li><a href="login.html">Login</a></li>
						<li><a href="register.html">Register</a></li>
						<li><a href="blog.html">Blog</a></li>
					</ul> -->
				</li>
				
				<!--<li><span><a href="#0">Buy template</a></span></li>-->
			</ul>
		</nav>
	</header>
	<!-- /header -->