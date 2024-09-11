<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title><?php echo $page_title;?> | <?php echo SYSTEM_TITLE;?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
	<meta name="description" content="<?php echo SYSTEM_TITLE;?>">
	<meta name="author" content="kumar jitendra">
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/cloud-admin.css" >
	
	<link href="<?php echo base_url();?>/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- DATE RANGE PICKER -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
	<!-- UNIFORM -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/js/uniform/css/uniform.default.min.css" />
	<!-- ANIMATE -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/css/animatecss/animate.min.css" />
	<!-- FONTS -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>

</head>
<body class="login">	
	<!-- PAGE -->
	<section id="page">
			<!-- HEADER -->
			<header>
				<!-- NAV-BAR -->
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-md-offset-4">
							<div id="logo">
								<a href="<?php echo base_url();?>"><img src="<?php echo $this->crud_model->get_image_url('',SYSTEM_LOGO);?>" height="40" alt="<?php echo SYSTEM_NAME; ?>" /></a>
							</div>
						</div>
					</div>
				</div>
				<!--/NAV-BAR -->
			</header>
			<!--/HEADER -->
			<!-- LOGIN -->
			<section id="login_bg" class="visible">
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-md-offset-4">
							<div class="login-box">
								<h2 class="bigintro"><?php echo get_phrase('login');?></h2>
                                <?php if($this->session->flashdata('flash_message')){ ?>
                                
                                <div class="alert alert-block alert-danger fade in">
                                <a class="close" data-dismiss="alert" href="#" aria-hidden="true">×</a>
                                <h4><i class="fa fa-times"></i> <?php echo get_phrase('oh_snap_error');?></h4>
                                <p><?php echo $this->session->flashdata('flash_message'); ?></p>
                                </div>
                                
                                <? }?>
								<div class="divide-40"></div>
								<form method="post" action="<?php echo base_url()?>home/login" id="loginForm">
								  <div class="form-group">
									<label for="email"><?php echo get_phrase('email');?> <span class="required">*</span></label>
									<i class="fa fa-envelope"></i>
									<input type="email" class="form-control" id="password" name="email" >
                                    <span class="error-span"></span>
								  </div>
								  <div class="form-group"> 
									<label for="password"><?php echo get_phrase('password');?> <span class="required">*</span></label>
									<i class="fa fa-lock"></i>
									<input type="password" class="form-control" name="password" id="password" />
                                    <span class="error-span"></span>
								  </div>
								  <div>
									<!--<label class="checkbox"> <input type="checkbox" class="uniform" value=""> <?php echo get_phrase('remember_me');?></label>-->
									<button type="submit" class="btn btn-danger"><?php echo get_phrase('submit');?></button>
								  </div>
								</form>
								<!-- SOCIAL LOGIN -->
								<!--<div class="divide-20"></div>
								<div class="center">
									<strong>Or login using your social account</strong>
								</div>
								<div class="divide-20"></div>
								<div class="social-login center">
									<a class="btn btn-primary btn-lg">
										<i class="fa fa-facebook"></i>
									</a>
									<a class="btn btn-info btn-lg">
										<i class="fa fa-twitter"></i>
									</a>
									<a class="btn btn-danger btn-lg">
										<i class="fa fa-google-plus"></i>
									</a>
								</div>-->
								<!-- /SOCIAL LOGIN -->
								<div class="login-helpers">
									<a href="#" onclick="swapScreen('forgot_bg');return false;"><?php echo get_phrase('forget_password');?></a> <br>
									<!--Don't have an account with us? <a href="#" onclick="swapScreen('register_bg');return false;">Register
										now!</a>-->
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--/LOGIN -->
			<!-- REGISTER -->
			<section id="register_bg" class="font-400">
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-md-offset-4">
							<div class="login-box">
								<h2 class="bigintro">Register</h2>
								<div class="divide-40"></div>
								<form role="form">
								  <div class="form-group">
									<label for="exampleInputName">Full Name</label>
									<i class="fa fa-font"></i>
									<input type="text" class="form-control" id="exampleInputName" >
								  </div>
								  <div class="form-group">
									<label for="exampleInputUsername">Username</label>
									<i class="fa fa-user"></i>
									<input type="text" class="form-control" id="exampleInputUsername" >
								  </div>
								  <div class="form-group">
									<label for="exampleInputEmail1">Email address</label>
									<i class="fa fa-envelope"></i>
									<input type="email" class="form-control" id="exampleInputEmail1" >
								  </div>
								  <div class="form-group"> 
									<label for="exampleInputPassword1">Password</label>
									<i class="fa fa-lock"></i>
									<input type="password" class="form-control" id="exampleInputPassword1" >
								  </div>
								  <div class="form-group"> 
									<label for="exampleInputPassword2">Repeat Password</label>
									<i class="fa fa-check-square-o"></i>
									<input type="password" class="form-control" id="exampleInputPassword2" >
								  </div>
								  <div>
									<label class="checkbox"> <input type="checkbox" class="uniform" value=""> I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a></label>
									<button type="submit" class="btn btn-success">Sign Up</button>
								  </div>
								</form>
								<!-- SOCIAL REGISTER -->
								<div class="divide-20"></div>
								<div class="center">
									<strong>Or register using your social account</strong>
								</div>
								<div class="divide-20"></div>
								<div class="social-login center">
									<a class="btn btn-primary btn-lg">
										<i class="fa fa-facebook"></i>
									</a>
									<a class="btn btn-info btn-lg">
										<i class="fa fa-twitter"></i>
									</a>
									<a class="btn btn-danger btn-lg">
										<i class="fa fa-google-plus"></i>
									</a>
								</div>
								<!-- /SOCIAL REGISTER -->
								<div class="login-helpers">
									<a href="#" onclick="swapScreen('login_bg');return false;"> Back to Login</a> <br>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--/REGISTER -->
			<!-- FORGOT PASSWORD -->
			<section id="forgot_bg">
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-md-offset-4">
							<div class="login-box">
								<h2 class="bigintro"><?php echo get_phrase('reset_password');?></h2>
								<div class="divide-40"></div>
								<form role="form" id="resetFrom">
								  <div class="form-group">
									<label for="exampleInputEmail1"><?php echo get_phrase('enter_your_email');?></label>
									<i class="fa fa-envelope"></i>
									<input type="email" class="form-control" id="email" >
								  </div>
								  <div>
									<button type="submit" class="btn btn-info"><?php echo get_phrase('send_me_reset_instruction');?></button>
								  </div>
								</form>
								<div class="login-helpers">
									<a href="#" onclick="swapScreen('login_bg');return false;"><?php echo get_phrase('back_to_login');?></a> <br>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- FORGOT PASSWORD -->
	</section>
	<!--/PAGE -->
	<!-- JAVASCRIPTS -->
	<!-- Placed at the end of the document so the pages load faster -->
	<!-- JQUERY -->
	<script src="<?php echo base_url();?>/assets/js/jquery/jquery-2.0.3.min.js"></script>
	<!-- JQUERY UI-->
	<script src="<?php echo base_url();?>/assets/js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
	<!-- BOOTSTRAP -->
	<script src="<?php echo base_url();?>/assets/bootstrap-dist/js/bootstrap.min.js"></script>
	
	
	<!-- UNIFORM -->
	<script type="text/javascript" src="<?php echo base_url();?>/assets/js/uniform/jquery.uniform.min.js"></script>
	<!-- BACKSTRETCH -->
	<script type="text/javascript" src="<?php echo base_url();?>/assets/js/backstretch/jquery.backstretch.min.js"></script>
    
    <!-- COOKIE -->
	<script type="text/javascript" src="<?php echo base_url();?>/assets/js/jQuery-Cookie/jquery.cookie.min.js"></script>
    
    <script src="<?php echo base_url();?>/assets/js/jquery-validate/jquery.validate.min.js"></script>
	<script src="<?php echo base_url();?>/assets/js/jquery-validate/additional-methods.min.js"></script>
    
	<!-- CUSTOM SCRIPT -->
    <input type="hidden" id="baseurl" value="<?php echo base_url();?>" />
	<script src="<?php echo base_url();?>/assets/js/script.js"></script>
	<script>
		jQuery(document).ready(function() {		
			App.setPage("login");  //Set current page
			App.init(); //Initialise plugins and elements
			
			$('#loginForm').validate(
             {
              rules: {
                email: {
				  email: true,
                  required: true
                },
				 password: {
                  required: true
                }
              },
              highlight: function(element) {
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
              },
              success: function(element) {
                element
                .text('Valid!').addClass('valid')
                .closest('.form-group').removeClass('has-error').addClass('has-success');
              }
             });
		});
	</script>
	<script type="text/javascript">
		function swapScreen(id) {
			jQuery('.visible').removeClass('visible animated fadeInUp');
			jQuery('#'+id).addClass('visible animated fadeInUp');
		}
	</script>
	<!-- /JAVASCRIPTS -->
</body>

</html>