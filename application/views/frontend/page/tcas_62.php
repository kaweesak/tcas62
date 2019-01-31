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

    <h4 class="nomargin_top">คณะและโรงเรียน</h4>
    <div role="tablist" class="add_bottom_45 accordion_2" id="tips">
    <?php
$facid = '';

foreach ($tcass as $key => $r) {

    ?>

        <?php if ($facid == $r->fac_id) {?>

        <?php } else {?>
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
                        <table id="table<?php echo $r->fac_id; ?>" align="left" border="1" cellpadding="0" cellspacing="0" class="table table-bordered text-center"  style="font-size:1em; width:98%">
                    <thead>
                    <tr class="">
                        <th>ลำดับ</th><th>หลักสูตร/สาขาวิชา</th><th>รอบที่ 1 <br>Portfolio</th><th>รอบที่ 2<br>Quota</th><th>รอบที่ 3<br>รับตรงร่วมกัน</th><th>รอบที่ 4 <br>Admission </th><th>รอบที่ 5<br>รับตรงอิสระ</th>
                    </tr>
                    </thead>
                    <tbody>
                           <?php
$i = 1;
        $sq1 = 0;
        $sq2 = 0;
        $sq3 = 0;
        $sq4 = 0;
        $sq5 = 0;
        foreach ($tcass as $key => $r2) {
            if ($r2->fac_id == $r->fac_id) {?>
                               	 <tr>
                        <td><?php echo $i; ?></td>
                        <td class="text-left"><a  href="<?php echo site_url('course/detail/' . $r2->c_id) ?>"> <?php echo $r2->c_name . (!isset($r2->loc) || $r2->loc == '' ? '' : '(' . $r2->loc . ')'); ?> </a></td>
                        <td><a  href="<?php echo base_url('uploads/tcas62/1/0' . $r2->fac_id . '/' . $r2->c_id . '.pdf'); ?>" target="_blank"><?php echo $r2->t_q1; ?></a></td>
                        <td><a  href="<?php echo base_url('uploads/tcas62/2/0' . $r2->fac_id . '/' . $r2->c_id . '.pdf'); ?>" target="_blank"><?php echo $r2->t_q2; ?></a></td>
                        <td><a  href="<?php echo base_url('uploads/tcas62/3/0' . $r2->fac_id . '/' . $r2->c_id . '.pdf'); ?>" target="_blank"><?php echo $r2->t_q3; ?></a></td>
                        <td><a  href="<?php echo base_url('uploads/tcas62/4/0' . $r2->fac_id . '/' . $r2->c_id . '.pdf'); ?>" target="_blank"><?php echo $r2->t_q4; ?></a></td>
                        <td><a  href="<?php echo base_url('uploads/tcas62/5/0' . $r2->fac_id . '/' . $r2->c_id . '.pdf'); ?>" target="_blank"><?php echo $r2->t_q5; ?></a></td>
                        </tr>

                             <?php
$i = $i + 1;
                $sq1 = $sq1 + (int) $r2->t_q1;
                $sq2 = $sq2 + (int) $r2->t_q2;
                $sq3 = $sq3 + (int) $r2->t_q3;
                $sq4 = $sq4 + (int) $r2->t_q4;
                $sq5 = $sq5 + (int) $r2->t_q5;
            }?>

                            <?php }?>
                               <tr>
                             <th colspan="2">รวมจำนวน</th>
                             <th><?php echo (!isset($sq1) || $sq1 == 0 ? '' : $sq1); ?></th>
                             <th><?php echo (!isset($sq2) || $sq2 == 0 ? '' : $sq2); ?></th>
                             <th><?php echo (!isset($sq3) || $sq3 == 0 ? '' : $sq3); ?></th>
                             <th><?php echo (!isset($sq4) || $sq4 == 0 ? '' : $sq4); ?></th>
                             <th><?php echo (!isset($sq5) || $sq5 == 0 ? '' : $sq5); ?></th>
                           </tr>
                       </tbody>
                </table>
                        </div>
                    </div>

            </div>
            <!-- /card -->
        <?php }?>
    	<?php
$facid = $r->fac_id;
}?>

    </div>


			</div>
    	</div>
	</div>
</main>