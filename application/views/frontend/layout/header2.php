<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="NADT สมาคมคนหูหนวกแห่งประเทศไทย">
    <meta name="author" content="NADT">
    <title>NADT| สมาคมคนหูหนวกแห่งประเทศไทย</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="<?php echo base_url('assets/frontend/img/favicon.ico');?>" type="image/x-icon">

    <!-- BASE CSS -->
    <link href="<?php echo base_url('assets/frontend/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/frontend/css/style.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/frontend/css/vendors.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/frontend/css/icon_fonts/css/all_icons.min.css');?>" rel="stylesheet">
    <?php if(isset($css_scripts)) foreach ($css_scripts as $css_script):?>
    <link href="<?php echo base_url("assets/frontend/$css_script.css")?>" rel="stylesheet">
    <?php endforeach;?>
    <!-- YOUR CUSTOM CSS -->
    <link href="<?php echo base_url('assets/frontend/css/custom.css');?>" rel="stylesheet">
    <script>
        var base_url = '<?php echo base_url(); ?>';
    </script>
</head>

<body>
    <div id="page">

    <header class="header menu_fixed">
        <div id="preloader"><div data-loader="circle-side"></div></div><!-- /Page Preload -->
        <div id="logo">
            <a href="<?php echo base_url();?>">
                <img src="<?php echo base_url()?>uploads/img/logo36-150.png" width="150" height="36" data-retina="true" alt="" class="logo_normal">
                <img src="<?php echo base_url()?>uploads/img/logo36-150.png" width="150" height="36" data-retina="true" alt="" class="logo_sticky">
            </a>
        </div>
        <ul id="top_menu">
			<li></li>
            <?php if($this->ion_auth->logged_in()) { ?>
            <li>
				<div class="dropdown dropdown-user">
					<a href="#0" class="logged" data-toggle="dropdown" title="Logged"><img src="<?php echo base_url()?>uploads/img/avatar.jpg" alt=""></a>
					<div class="dropdown-menu">
						<ul>							
							<li><?php echo anchor("auth/edit_user/".$this->ion_auth->user()->row()->id, 'Edit profile') ;?></li>
                            <li><a href="<?php echo base_url('auth/change_password')?>">Change Password</a></li>
                            <li><a href="<?php echo base_url('auth/logout')?>">Logout</a></li>
						</ul>
					</div>
				</div>
			</li>
            <?php } ?>
            <!-- <li><a href="#sign-in-dialog" id="sign-in" class="login" title="Sign In">Sign In</a></li>-->
            <!--			<li><a href="wishlist.html" class="wishlist_bt_top" title="Your wishlist">Your wishlist</a></li>-->
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
                <?php if($this->ion_auth->logged_in() && !$this->ion_auth->is_admin() && $this->ion_auth->in_group(2)) { ?>
            	<li><span><a href="<?php echo base_url('home/member'); ?>">Home</a></span>

                </li>
		<li><span><a href="#">บริการข้อความเป็นภาษามือ</a></span>
                            <ul>
                                    <li><a href="<?php echo base_url('page/service11'); ?>">อัพโหลด ข้อความ</a></li>
                                    <li><a href="<?php echo base_url('page/service12'); ?>">อัพโหลด รูปภาพ</a></li>
                                    <li><a href="<?php echo base_url('page/service13'); ?>">อัพโหลด URL</a></li>
                                    <li><a href="<?php echo base_url('page/service14'); ?>">อัพโหลด ไฟล์</a></li>
                                   
                            </ul>
                    </li>
                   <li><span><a href="#0">บริการภาษามือเป็นข้อความ</a></span>
                            <ul>
                                    <li><a href="<?php echo base_url('page/service21'); ?>">อัพโหลด URL</a></li>
                                    <li><a href="<?php echo base_url('page/service22'); ?>">อัพโหลด ไฟล์วีดีโอ</a></li>
                                   
                            </ul>
                    </li>
                    <li><span><a href="#0">บริการรูปแบบเสียงเป็นภาษามือ</a></span>
                            <ul>
                                    <li><a href="<?php echo base_url('page/service31'); ?>">อัพโหลด URL</a></li>
                                    <li><a href="<?php echo base_url('page/service32'); ?>">อัพโหลด ไฟล์เสียง</a></li>
                                   
                            </ul>
                    </li>
                    <li><span><a href="#0">บริการรูปแบบเสียงเป็นข้อความ</a></span>
                            <ul>
                                   <li><a href="<?php echo base_url('page/service41'); ?>">อัพโหลด URL</a></li>
                                   <li><a href="<?php echo base_url('page/service42'); ?>">อัพโหลด ไฟล์เสียง</a></li>
                                   
                            </ul>
                    </li>
                <?php } elseif($this->ion_auth->logged_in() && !$this->ion_auth->is_admin() && $this->ion_auth->in_group(3)){?>
                    <li><span><a href="<?php echo base_url('home/translator'); ?>">Home</a></span></li>
                    <li><span><a href="#0">Project</a></span>
                        <ul>
                            <li><a href="<?php echo base_url('project/index'); ?>">All Project</a></li>
                            <li><a href="<?php echo base_url('project/create_project'); ?>">Create Project</a></li>
                            <li><a href="<?php echo base_url('auth/create_group'); ?>">Create Group</a></li>
                        </ul>
                    </li>
                <?php } else { ?>
                    <li><span><a href="<?php echo base_url('home'); ?>">Home</a></span></li>
                    <li><span><a href="#0">Project</a></span>
                        <ul>
                            <li><a href="<?php echo base_url('project/index'); ?>">All Project</a></li>
                            <li><a href="<?php echo base_url('project/create_project'); ?>">Create Project</a></li>
                            <li><a href="<?php echo base_url('auth/create_group'); ?>">Create Group</a></li>
                        </ul>
                    </li>
                    <li><span><a href="#0">Manage Account</a></span>
                        <ul>
                            <li><a href="<?php echo base_url('auth/index'); ?>">All Users</a></li>
                            <li><a href="<?php echo base_url('auth/create_user'); ?>">Create User</a></li>
                            <li><a href="<?php echo base_url('auth/user_group'); ?>">User Group</a></li>
                        </ul>
                    </li>
                <?php } ?>
            </ul>

        </nav>

    </header>
    <!-- /header -->