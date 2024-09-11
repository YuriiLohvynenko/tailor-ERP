<?php
	$userdata = $this->db->get_where('users' , array('user_id'=>$this->session->userdata('user_id')))->row();
	$roles = $this->session->userdata('roles');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="content-type" Content="application/javascript charset=UTF-8">
	<meta charset="utf-8">
	<title><?php echo $page_title;?> | <?php echo SYSTEM_TITLE;?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
	<meta name="description" content="<?php echo SYSTEM_TITLE;?>">
	<meta name="author" content="Kumar Jitendra">
	<?php include_once 'includes_top.php';?>
</head>
<body>
	<!-- HEADER -->
	<?php include_once 'header.php';?>
	<!--/HEADER -->
	
	<!-- PAGE -->
	<section id="page">
				<!-- SIDEBAR -->
				<?php include_once $roles.'/navigation.php';?>
				<!-- /SIDEBAR -->
		<div id="main-content">
        	
			<?php include_once $roles.'/'.$page_name.'.php'; ?>
		</div>
	</section>
	<!--/PAGE -->
	<input type="hidden" id="baseurl" value="<?php echo base_url();?>" />
    <?php include_once 'includes_bottom.php';?>
    <?php include_once 'modal.php';?>
    
	<script>
		jQuery(document).ready(function() {		
			App.setPage('<?php echo $page_name;?>');  //Set current page
			App.init(); //Initialise plugins and elements
			
			<?php if($this->session->flashdata('login_message')):?>
			setTimeout(function () {
                var unique_id = $.gritter.add({
                    title:'<?php echo get_phrase('welcome_back');?> <?php echo ucwords($this->session->userdata('name'));?>',
                    text: '<?php echo get_phrase('dashboard_message');?>',
                    image: '<?php echo base_url();?>assets/img/gritter/cloud.png',
                    sticky: true,
                    time: '',
                    class_name: 'my-sticky-class'
                });
                setTimeout(function () {
                    $.gritter.remove(unique_id, {
                        fade: true,
                        speed: 'slow'
                    });
                }, 12000);
            }, 2000);
			<?php endif;?>
			
		});
	</script>
	<!-- /JAVASCRIPTS -->
    <script src="<?php echo base_url();?>/assets/js/jquery-validation.js"></script>
    
</body>
</html>
