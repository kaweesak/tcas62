<div class="sub_header_in">
		<div class="container">
			<h1>หลักสูตรที่เปิดรับ</h1>
		</div>
		<!-- /container -->
	</div>
	<!-- /sub_header -->

<main>
    <div class="container margin_60_35">
		<div class="row">
			<div class="col-lg-12">
				<?php 
$facid = '';
$fac = '';  
$first = 'in'; 
$pcolor1 = '';
$pcolor2 = ''; 
$pcolor3 = ''; 
$pcolor4 = ''; 
$pcolor5 = '';
?>

<?php foreach ($courses as $key => $r){
	if($facid != $r->fac_id){
		if($key !=0){
			$first = '';
		}
		$fac = $r->c_fac;
		?>
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">
					<a class="" role="button" data-toggle="collapse" href="#<?php echo $fac ?>" >
						<?php echo $fac ?>
					</a>
				</h3>
			</div>
		</div>

		<?php } ?>
		<div class="collapse <?php echo $first ?>" id="<?php echo $fac ?>">
			<?php if($r->c_status == '1' ){	?>
			<p style="padding-top:0px">	
			<?php 
				if(substr($r->c_tcas,0,1) =='1'){ 
					$pcolor1 = '<div class="circle-badge-yellow-15" data-toggle="tooltip" title="การรับด้วย Portfolio"></div>';
				}else{
					$pcolor1 = '<div class="circle-badge-white-15"></div>';
				}
				if(substr($r->c_tcas,1,1) =='1'){ 
					$pcolor2 = '<div class="circle-badge-pink-15" data-toggle="tooltip" title="การรับแบบโควตา"></div>';
				}else{
					$pcolor2 = '<div class="circle-badge-white-15"></div>';
				}
				if(substr($r->c_tcas,2,1) =='1'){ 
					$pcolor3 = '<div class="circle-badge-gray-15" data-toggle="tooltip" title="การรับตรงร่วมกัน"></div>';
				}else{
					$pcolor3 = '<div class="circle-badge-white-15"></div>';
				}
				if(substr($r->c_tcas,3,1) =='1'){ 
					$pcolor4 = '<div class="circle-badge-green-15" data-toggle="tooltip" title="การรับแบบ Admission"></div>';
				}else{
					$pcolor4 = '<div class="circle-badge-white-15"></div>';
				}
				if(substr($r->c_tcas,4,1) =='1'){ 
					$pcolor4 = '<div class="circle-badge-purple-15" data-toggle="tooltip" title="การรับตรงอิสระ"></div>';
				}else{
					$pcolor4 = '<div class="circle-badge-white-15"></div>';
				}
				echo $pcolor1 . $pcolor2 . $pcolor3 . $pcolor4 . $pcolor5; 
			?>
			<a  href="<?php echo site_url('course/detail/'.$r->c_id) ?>"> <?php echo $r->c_name ?> <?php echo $r->place ?> </a>
			</p>
			<?php }else{ ?>
			<p style="padding-left:15px"><?php echo $r->c_name ?> <?php echo $r->place ?></p>
			<?php  }  ?>
		</div>

<?php } ?>
						

			</div>
    	</div>
	</div>

</main>