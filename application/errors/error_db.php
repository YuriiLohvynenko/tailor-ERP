<?php 
//$system_title	=	$this->db->get_where('settings' , array('type'=>'system_title'))->row()->description;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title>Database Error</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/cloud-admin.css" >
	<link rel="stylesheet" type="text/css"  href="<?php echo base_url();?>assets/css/responsive.css" >
	
	<link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- FONTS -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
</head>
<body>	
	<!-- PAGE -->
	<section id="">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="divide-100"></div>
				</div>
			</div>
            <?php 
			$find = "Unable to connect to your database server using the provided settings.";
			$tailor = strpos($message, $find);
			if ($tailor !== false) {
			?>
			<div class="row">
				<div class="col-md-12 not-found text-center">
				   <div class="error-500">
					  DB ERROR!
				   </div>
				</div>
				<div class="col-md-4 col-md-offset-4 not-found text-center">
				   <div class="content">
					  <h3><?php echo $heading; ?></h3>
					  <p>
						<?php echo $message; ?><br>First Time?
					  </p>
					  <div class="btn-group">
                      <a href="install/" class="btn btn-primary"> <i class="icon-cog"></i> Let's Install <?php echo $system_title;?></a>
						<a href="<?=base_url();?><?=$this->session->userdata('roles')?>/dashboard" class="btn btn-default">Dashboard</a>
					  </div>
				   </div>
				</div>
			 </div>
         	<?php } else { ?>
            <div class="row">
				<div class="col-md-12 not-found text-center">
				   <div class="error">
					  DB ERROR!
				   </div>
				</div>
				<div class="col-md-4 col-md-offset-4 not-found">
				   <div class="content">
					  <h3 class="text-danger"><?php echo $heading; ?></h3>
					  <p>
						<h4 class="text-success"><b><?php echo $message; ?></b></h4>
					  </p>
					  <div class="btn-group">
                      <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="btn btn-danger"><i class="fa fa-chevron-left"></i> Go Back</a>
						<a href="<?=base_url();?>" class="btn btn-default">Dashboard</a>
					  </div>
				   </div>
				</div>
			 </div>
            <?php } ?>
		</div>
	</section>
	<!--/PAGE -->
	<!-- JAVASCRIPTS -->
	<!-- Placed at the end of the document so the pages load faster -->
	<!-- JQUERY -->
	<script src="<?php echo base_url();?>assets/js/jquery/jquery-2.0.3.min.js"></script>
	<!-- JQUERY UI-->
	<script src="<?php echo base_url();?>assets/js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
	<!-- BOOTSTRAP -->
	<script src="<?php echo base_url();?>assets/bootstrap-dist/js/bootstrap.min.js"></script>
	<!-- SLIMSCROLL -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.min.js"></script><script type="text/javascript" src="<?php echo base_url();?>assets/js/jQuery-slimScroll-1.3.0/slimScrollHorizontal.min.js"></script>
    <!-- COOKIE -->
	<script type="text/javascript" src="<?php echo base_url();?>/assets/js/jQuery-Cookie/jquery.cookie.min.js"></script>
	<!-- CUSTOM SCRIPT -->
	<script src="<?php echo base_url();?>assets/js/script.js"></script>
	<script>
		jQuery(document).ready(function() {		
			App.setPage("widgets_box");  //Set current page
			App.init(); //Initialise plugins and elements
		});
	</script>
	<!-- /JAVASCRIPTS -->
</body>
</html>