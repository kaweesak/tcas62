<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="มหาวิทยาลัยสวนดุสิต, TCAS 62, entrance ,สมัครเรียนมหาวิทยาลัยสวนดุสิต">
    <meta name="author" content="Suan dusit university">

   
    <meta property="og:title" content="<?php echo (!isset($title) || $title == '' ? 'มหาวิทยาลัยสวนดุสิต' : $title . '| มหาวิทยาลัยสวนดุสิต');  ?>"/>
    <meta property="og:type"  content="website"/>
    <meta property="og:url"   content="<?php echo site_url(uri_string());?>"/>
    <meta property="og:image"  content="<?php echo base_url();?>uploads/img/image.jpg"/>
    <meta property="og:site_name"  content="http://entrance.dusit.ac.th"/>	
    <meta property="og:description"  content="<?php echo (!isset($title) || $title == '' ? 'มหาวิทยาลัยสวนดุสิต' : $title );  ?>, TCAS 62,สมัครเรียนมหาวิทยาลัยสวนดุสิต"/>
    
	<title><?php echo (!isset($title) || $title == '' ? 'มหาวิทยาลัยสวนดุสิต' : $title . '| มหาวิทยาลัยสวนดุสิต');   ?></title>

	<!-- Favicons-->
    <link rel="shortcut icon" href="http://www.dusit.ac.th/wp-content/uploads/2014/01/logo-ico.png" type="image/x-icon" />
	
    <!-- BASE CSS -->
    <link href="<?php echo base_url('public/frontend/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('public/frontend/css/style.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('public/frontend/css/vendors.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('public/frontend/css/icon_fonts/css/all_icons.min.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('public/frontend/fonts/maledpan/font.css');?>" rel="stylesheet">
			
    <?php if(isset($css_scripts)) foreach ($css_scripts as $css_script):?>
    <link href="<?php echo base_url("public/frontend/$css_script.css")?>" rel="stylesheet">
    <?php endforeach;?>
    <!-- YOUR CUSTOM CSS -->
    <link href="<?php echo base_url('public/frontend/css/custom.css');?>" rel="stylesheet">
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5bca9d2c0ee97d8d"></script>
	
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
	
	<header class="header_in is_sticky menu_fixed">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-12">
					<div id="logo">
						<a href="<?php echo base_url();?>">							
							<img src="<?php echo base_url();?>uploads/img/logo_sticky.png" width="150" height="36" data-retina="true" alt="มหาวิทยาลัยสวนดุสิต" class="logo_sticky">
						</a>						
					</div>
				</div>
				<div class="col-lg-9 col-12">
					<ul id="top_menu">
						<li><a href="<?php echo site_url('page/register')?>" class="btn_add">สมัครเรียน</a></li>
						<!--<li><a href="account.html" class="btn_add">Add Listing</a></li>
						<li><a href="#sign-in-dialog" id="sign-in" class="login" title="Sign In">Sign In</a></li>
						<li><a href="wishlist.html" class="wishlist_bt_top" title="Your wishlist">Your wishlist</a></li>-->
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
				<li><span><a href="#0">ข้อมูลการสมัครเรียน</a></span>
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
						<li><a href="<?php echo base_url();?>uploads/files/2017-10-30-14-39-00.pdf" target="_blank">ค่าธรรมเนียมการศึกษา</a></li>
						<li><a href="http://guidance.dusit.ac.th/WEB/" target="_blank">กองทุนเงินให้กู้ยืมเพื่อการศึกษา</a></li>											
					</ul>
				</li>
				<li><span><a href="#0">คณะและโรงเรียน</a></span>
					<ul>
					<li><a href="http://education.dusit.ac.th/">คณะครุศาสตร์</a></li>
						<li><a href="http://nurse.dusit.ac.th/">คณะพยาบาลศาสตร์</a></li>
						<li><a href="http://human.dusit.ac.th/">คณะมนุษยศาสตร์และสังคมศาสตร์</a></li>
						<li><a href="http://manage.dusit.ac.th/">คณะวิทยาการจัดการ</a></li>
						<li><a href="http://scitech.dusit.ac.th/">คณะวิทยาศาสตร์และเทคโนโลยี</a></li>
						<li><a href="http://slp.dusit.ac.th/">โรงเรียนกฎหมายและการเมือง</a></li>
						<li><a href="http://thmdusit.dusit.ac.th/">โรงเรียนการท่องเที่ยวและการบริการ</a></li>
						<li><a href="http://food.dusit.ac.th/">โรงเรียนการเรือน</a></li>					
					</ul>
				</li>
				<li><span><a href="#0">ศูนย์การศึกษา</a></span>
					<ul>
					<li><a href="http://suphanburicampus.dusit.ac.th/new/" target="_blank">วิทยาเขตสุพรรณบุรี</a></li>
                   <li><a href="http://lampang.dusit.ac.th/w2017/" target="_blank">ศูนย์การศึกษานอกที่ตั้งลำปาง</a></li>
                    <li><a href="http://nakhonnayok.dusit.ac.th/" target="_blank">ศูนย์การศึกษานอกที่ตั้งนครนายก</a></li>
                    <li><a href="http://huahin.dusit.ac.th/" target="_blank">ศูนย์การศึกษานอกที่ตั้งหัวหิน</a></li>
                    <li><a href="http://www.dusittrang.com/" target="_blank">ศูนย์การศึกษานอกที่ตั้งตรัง</a></li>												
					</ul>
				</li>
				
				<li><span><a href="<?php echo site_url('page/map');?>">การเดินทาง</a></span></li>
				
				<!--<li><span><a href="#0">Buy template</a></span></li>-->
			</ul>
                    </nav>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->		
	</header>
	<!-- /header -->