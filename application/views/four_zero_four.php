<?php 
$system_title	=	$this->db->get_where('settings' , array('type'=>'system_title'))->row()->description;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title><?php echo $title;?> | <?php echo SYSTEM_TITLE;?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
	<meta name="description" content="<?php echo SYSTEM_TITLE;?>">
	<meta name="author" content="Kumar Jitendra">
	<?php include 'includes_top.php';?>
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
			<div class="row">
				<div class="col-md-12 not-found text-center">
				   <div class="error-500">
					  404
				   </div>
				</div>
				<div class="col-md-4 col-md-offset-4 not-found text-center">
				   <div class="content">
					  <h3>PAGE NOT FOUND</h3>
					  <p>
						Sorry, but the page you're looking for has not been found
Try checking the URL for errors, goto.
					  </p>
					  <div class="btn-group">
						<a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="btn btn-danger"><i class="fa fa-chevron-left"></i> Go Back</a>
						<a href="<?=base_url();?><?=$this->session->userdata('roles')?>/dashboard" class="btn btn-default">Dashboard</a>
					  </div>
				   </div>
				</div>
			 </div>
		</div>
	</section>
	<!--/PAGE -->
	<?php include 'includes_bottom.php';?>
	<script>
		jQuery(document).ready(function() {		
			App.setPage("widgets_box");  //Set current page
			App.init(); //Initialise plugins and elements
		});
	</script>
	<!-- /JAVASCRIPTS -->
</body>
</html>