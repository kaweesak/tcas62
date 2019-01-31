<div class="sub_header_in sticky_header">
		<div class="container">
			<h1><?php echo $title;?></h1>
		</div>
		<!-- /container -->
	</div>
	<!-- /sub_header -->

<main>
<div class="container margin_60_35">
		<div class="row">
            <div class="col-md-12">
            <?php if(isset($posts)) { ?>
            <ul>
            <?php foreach ($posts as $r) { ?>
                <li>
                    <a href="<?php echo site_url("blog/post/$r->n_id") ?>"><em class="ti-arrow-circle-right"></em> <?php echo $r->n_subject ?></a>
                    <small>(<?php echo thai_date_full_month($r->n_date_create); ?>)</small>
                </li>
            <?php } ?>
            </ul>
            <?php } else { ?>
                <div>No news found.</div>
            <?php } ?>
            <p><?php echo $links; ?></p>
            </div>
        </div>
</div> 
 
</main> 