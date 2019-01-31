<div class="sub_header_in sticky_header">
	<div class="container">
		<h1><?php echo $title; ?></h1>
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
                $pcolor1 = '';
                $pcolor2 = ''; 
                $pcolor3 = ''; 
                $pcolor4 = ''; 
                $pcolor5 = '';
            ?>


    <div role="tablist" class="add_bottom_45 accordion_2" id="tips">
    <?php foreach ($courses as $key => $r){ 
       
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
                           <?php foreach ($courses as $key => $r2){ 
							   if($r2->fac_id == $r->fac_id){ ?>
							                                	
			<?php 
				if(substr($r2->tcas_accept,0,1) =='1'){ 
					$link_r1 = base_url('uploads/tcas62/1/0'.$r2->fac_id .'/'. $r2->c_id.'.pdf');
					$pcolor1 = '<a  href="'.$link_r1 .'" target="_blank"><div class="circle-badge-r1-15" data-toggle="tooltip" title="1.การรับด้วย Portfolio">1</div></a>';
				}else{
					$pcolor1 = '<div class="circle-badge-white-15"></div>';
				}
				if(substr($r2->tcas_accept,1,1) =='1'){ 
					$link_r2 = base_url('uploads/tcas62/2/0'.$r2->fac_id .'/'. $r2->c_id.'.pdf');
					$pcolor2 = '<a  href="'.$link_r2 .'" target="_blank"><div class="circle-badge-r2-15" data-toggle="tooltip" title="2.การรับแบบโควตา">2</div></a>';
				}else{
					$pcolor2 = '<div class="circle-badge-white-15"></div>';
				}
				if(substr($r2->tcas_accept,2,1) =='1'){ 
					$link_r3 = base_url('uploads/tcas62/3/0'.$r2->fac_id .'/'. $r2->c_id.'.pdf');
					$pcolor3 = '<a  href="'.$link_r3 .'" target="_blank"><div class="circle-badge-r3-15" data-toggle="tooltip" title="3.การรับตรงร่วมกัน">3</div></a>';
				}else{
					$pcolor3 = '<div class="circle-badge-white-15"></div>';
				}
				if(substr($r2->tcas_accept,3,1) =='1'){ 
					$link_r4 = base_url('uploads/tcas62/4/0'.$r2->fac_id .'/'. $r2->c_id.'.pdf');
					$pcolor4 = '<a  href="'.$link_r4 .'" target="_blank"><div class="circle-badge-r4-15" data-toggle="tooltip" title="4.การรับแบบ Admission">4</div></a>';
				}else{
					$pcolor4 = '<div class="circle-badge-white-15"></div>';
				}
				if(substr($r2->tcas_accept,4,1) =='1'){ 
					$link_r5 = base_url('uploads/tcas62/5/0'.$r2->fac_id .'/'. $r2->c_id.'.pdf');
					$pcolor5 = '<a  href="'.$link_r5 .'" target="_blank"><div class="circle-badge-r5-15" data-toggle="tooltip" title="5.การรับตรงอิสระ">5</div></a>';
				}else{
					$pcolor5 = '<div class="circle-badge-white-15"></div>';
				}
				echo $pcolor1 . $pcolor2 . $pcolor3 . $pcolor4 . $pcolor5; 
			?>
			                        <a  href="<?php echo site_url('course/detail/'.$r2->c_id) ?>"> <?php echo $r2->c_name . (!isset($r2->loc) || $r2->loc=='' ? '':'('.$r2->loc.')'); ?> </a><br>
           
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
    	</div>
	</div> 
</main>