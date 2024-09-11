<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title>Stitch Application for Tailors | Installation Wizard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- STYLESHEETS --><!--[if lt IE 9]><script src="js/flot/excanvas.min.js"></script><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script><![endif]-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/cloud-admin.css" >
	<link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>assets/css/themes/default.css" id="skin-switcher" >
	<link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>assets/css/responsive.css" >
	
	<link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- DATE RANGE PICKER -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
	<!-- SELECT2 -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/select2/select2.min.css" />
	<!-- UNIFORM -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/uniform/css/uniform.default.min.css" />
	<!-- WIZARD -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/bootstrap-wizard/wizard.css" />
	<!-- FONTS -->
	<!--<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>-->
</head>
<body>
	<!-- PAGE -->
	<section id="page">
			<div class="container">
				<div class="row">
					<div id="content" class="col-lg-12">
						<!-- PAGE HEADER-->
						<div class="row">
							<div class="col-sm-12">
								<div class="page-header">
									<!-- STYLER -->
									
									<!-- /STYLER -->
									<!-- BREADCRUMBS -->
									
									<!-- /BREADCRUMBS -->
									<div class="clearfix">
										<h3 class="content-title pull-left">Welcome to web installer</h3>
									</div>
									<div class="description"> Install the script in few clicks  and run the installer. It's easy !</div>
								</div>
							</div>
						</div>
						<!-- /PAGE HEADER -->
						<!-- SAMPLE -->
						<div class="row">
							<div class="col-md-12">
								<?php if( $this->session->flashdata('installation_result') == 'failed'):?>					   
					            	<div class="alert alert-block alert-danger fade in"><a href="#" class="close" aria-hidden="true" data-dismiss="alert">×</a><h4><i class="fa fa-times"></i>Oh snap ! you got an error</h4><p>Installation failed due to invalid settings</p></div>
					            <?php endif;?>
					            
					        	<?php if($this->session->flashdata('flash_message')){ ?>
					                <div class="alert alert-block alert-success fade in">
					                <a class="close" data-dismiss="alert" href="#" aria-hidden="true">×</a>
					                <h4><i class="fa fa-heart"></i> <?php echo $this->session->flashdata('flash_message'); ?></h4>
					                </div>
					                <? }?>
								<!-- BOX -->
								<div class="box border red" id="formWizard">
									<div class="box-title">
										<h4><i class="fa fa-bars"></i>Installation Wizard- <span class="stepHeader">Step 1 of 3</h4>
										<div class="tools hidden-xs">
											<a href="#box-config" data-toggle="modal" class="config">
												<i class="fa fa-cog"></i>
											</a>
											<a href="javascript:;" class="reload">
												<i class="fa fa-refresh"></i>
											</a>
											<a href="javascript:;" class="collapse">
												<i class="fa fa-chevron-up"></i>
											</a>
											<a href="javascript:;" class="remove">
												<i class="fa fa-times"></i>
											</a>
										</div>
									</div>
									<div class="box-body form">
										<form id="wizForm" action="<?php echo base_url(); ?>install/do_install" class="form-horizontal" method="post">
										<div class="wizard-form">
										   <div class="wizard-content">
											  <ul class="nav nav-pills nav-justified steps">
											  	 <li>
													<a href="#required" data-toggle="tab" class="wiz-step">
													<span class="step-number">1</span>
													<span class="step-name"><i class="fa fa-check"></i> Requirements</span>   
													</a>
												 </li>
												 <li>
													<a href="#account" data-toggle="tab" class="wiz-step">
													<span class="step-number">2</span>
													<span class="step-name"><i class="fa fa-check"></i> Database Settings </span>   
													</a>
												 </li>

												 <li>
													<a href="#payment" data-toggle="tab" class="wiz-step active">
													<span class="step-number">3</span>
													<span class="step-name"><i class="fa fa-check"></i> Settings</span>   
													</a>
												 </li>
											  </ul>
											  <div id="bar" class="progress progress-striped progress-sm active" role="progressbar">
												 <div class="progress-bar progress-bar-warning"></div>
											  </div>
											  <div class="tab-content">
												 <div class="alert alert-danger display-none">
													<a class="close" aria-hidden="true" href="#" data-dismiss="alert">×</a>
													Your form has errors. Please correct them to proceed.
												 </div>
												 <div class="alert alert-success display-none">
													<a class="close" aria-hidden="true" href="#" data-dismiss="alert">×</a>
													Your form validation is successful!
												 </div>
												 <div class="tab-pane active" id="required">
													<div class="form-group">
													   <label class="control-label col-md-5"><span style="color:#900;font-weight:bold;">Required</span> - 
                                    	application/config/database.php to be <span class="required">[writtable]</span></label>
													   <div class="col-md-4">
														  <?php
																// Checking whether db config file is writtable
					                                        	if (is_writable('./application/config/database.php')):?>
					                                            	<img src="<?php echo base_url();?>assets/img/tick.png" title="writtable" style="vertical-align:middle;"/>
					                                            	<input type="hidden"  name="dbfile" value="yes"/>
					                                        <?php
																else:?>
					                                            	<img src="<?php echo base_url();?>assets/img/cross.png" title="not writtable" style="vertical-align:middle;"/>
					                                            	<input type="hidden" name="dbfile" value=""/>
					                                        <?php endif;?>
					                                         <span class="error-span"></span>
													   </div>
													</div>
													<div class="form-group">
													   <label class="control-label col-md-5"><span style="color:#900;font-weight:bold;">Required</span> - 
                                    	application/config/routes.php to be <span class="required">[writtable]</span></label>
													   <div class="col-md-4">
													   	<?php
															// Checking whether routing config file is writtable
				                                        	if (is_writable('./application/config/routes.php')):?>
				                                            	<img src="<?php echo base_url();?>assets/img/tick.png" title="writtable" style="vertical-align:middle;"/>
				                                            	 <input type="hidden" name="route" value="yes"/>
				                                        <?php
															else:?>
				                                            	<img src="<?php echo base_url();?>assets/img/cross.png" title="not writtable" style="vertical-align:middle;"/>
				                                            	 <input type="hidden" name="route" />
				                                        <?php endif;?>
														 
														  <span class="error-span"></span>
													   </div>
													</div>	
													
													<div class="form-group">
													   <label class="control-label col-md-5"><span style="color:#900;font-weight:bold;">Required</span> - 
                                    	application/config/autoload.php to be <span class="required">[writtable]</span></label>
													   <div class="col-md-4">
													   	<?php
															// Checking whether routing config file is writtable
				                                        	if (is_writable('./application/config/autoload.php')):?>
				                                            	<img src="<?php echo base_url();?>assets/img/tick.png" title="writtable" style="vertical-align:middle;"/>
				                                            	 <input type="hidden" name="autoload" value="yes"/>
				                                        <?php
															else:?>
				                                            	<img src="<?php echo base_url();?>assets/img/cross.png" title="not writtable" style="vertical-align:middle;"/>
				                                            	 <input type="hidden" name="autoload" />
				                                        <?php endif;?>
														 
														  <span class="error-span"></span>
													   </div>
													</div>									
													
												 </div>
												 <div class="tab-pane" id="account">
													<div class="form-group">
													   <label class="control-label col-md-3">Database Name<span class="required">*</span></label>
													   <div class="col-md-4">
														  <input type="text" class="form-control" name="db_name" placeholder="Please provide database name" autocomplete="off"/>
														  <span class="error-span"></span>
													   </div>
													</div>
													<div class="form-group">
													   <label class="control-label col-md-3">User name<span class="required">*</span></label>
													   <div class="col-md-4">
														  <input type="text" class="form-control" name="db_uname" placeholder="Please provide User name"/>
														  <span class="error-span"></span>
													   </div>
													</div>
													<div class="form-group">
													   <label class="control-label col-md-3">Password</label>
													   <div class="col-md-4">
														  <input type="text" class="form-control" name="db_password" placeholder="Please provide password" autocomplete="off"/>
														 
													   </div>
													</div>
													
													<div class="form-group">
													   <label class="control-label col-md-3">Host Name<span class="required">*</span></label>
													   <div class="col-md-4">
														  <input type="text" class="form-control" name="db_hname" placeholder="Please provide host (localhost)" autocomplete="off"/>
														  <span class="error-span"></span>
													   </div>
													</div>
													
												 </div>
												 <div class="tab-pane" id="payment">
													<div class="form-group">
													   <label class="control-label col-md-3">System Name<span class="required">*</span></label>
													   <div class="col-md-4">
														  <input type="text" class="form-control" name="system_name" placeholder="Please provide system name" autocomplete="off"/>
														  <span class="error-span"></span>
													   </div>
													</div>
													<div class="form-group">
													   <label class="control-label col-md-3">Admin email<span class="required">*</span></label>
													   <div class="col-md-4">
														  <input type="text" placeholder="Please provide admin email address" class="form-control" name="email" autocomplete="off"/>
														  <span class="error-span"></span>
													   </div>
													</div>
													<div class="form-group">
													   <label class="control-label col-md-3">Login password<span class="required">*</span></label>
													   <div class="col-md-4">
														  <input type="password" placeholder="Please provide login password" class="form-control" name="password" autocomplete="off"/>
														  <span class="error-span"></span>
													   </div>
													</div>												 
													<div class="form-group">
													   <label class="control-label col-md-3">Confirm </label>
													   <div class="col-md-4">
														  Everything in the form was correctly filled 
															if all the steps have a green checkmark icon.
															A red checkmark icon indicates that some field 
															is missing or filled out with invalid data.
													   </div>
													</div>													
												 </div>
												 
											  </div>
										   </div>
										   <div class="wizard-buttons">
											  <div class="row">
												 <div class="col-md-12">
													<div class="col-md-offset-3 col-md-9">
													   <a href="javascript:;" class="btn btn-default prevBtn">
														<i class="fa fa-arrow-circle-left"></i> Back 
													   </a>
													   <a href="javascript:;" class="btn btn-primary nextBtn">
														Continue <i class="fa fa-arrow-circle-right"></i>
													   </a>
													   <a href="javascript:;" class="btn btn-success submitBtn">
														Submit <i class="fa fa-arrow-circle-right"></i>
													   </a>                            
													</div>
												 </div>
											  </div>
										   </div>
										</div>
									 </form>
									</div>
								</div>
								<!-- /BOX -->
							</div>
						</div>
						<!-- /SAMPLE -->
						<div class="footer-tools">
							<span class="go-top">
								<i class="fa fa-chevron-up"></i> Top
							</span>
						</div>
					</div><!-- /CONTENT-->
				</div>
			</div>
	</section>
	<!--/PAGE -->
	<!-- JAVASCRIPTS -->
	<!-- Placed at the end of the document so the pages load faster -->
	<!-- JQUERY -->
	<script src="<?php echo base_url(); ?>assets/js/jquery/jquery-2.0.3.min.js"></script>
	<!-- JQUERY UI-->
	<script src="<?php echo base_url(); ?>assets/js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
	<!-- BOOTSTRAP -->
	<script src="<?php echo base_url(); ?>assets/bootstrap-dist/js/bootstrap.min.js"></script>
	<!-- SLIMSCROLL -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.min.js"></script><script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jQuery-slimScroll-1.3.0/slimScrollHorizontal.min.js"></script>
	<!-- BLOCK UI -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jQuery-BlockUI/jquery.blockUI.min.js"></script>
	<!-- UNIFORM -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/uniform/jquery.uniform.min.js"></script>
	<!-- WIZARD -->
	<script src="<?php echo base_url(); ?>assets/js/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
	<!-- WIZARD -->
	<script src="<?php echo base_url(); ?>assets/js/jquery-validate/jquery.validate.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery-validate/additional-methods.min.js"></script>
	<!-- BOOTBOX -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootbox/bootbox.min.js"></script>
	<!-- COOKIE -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jQuery-Cookie/jquery.cookie.min.js"></script>
	<!-- CUSTOM SCRIPT -->
	<script src="<?php echo base_url(); ?>assets/js/script.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap-wizard/form-wizard.js"></script>
	<script>
		jQuery(document).ready(function() {		
			App.setPage("index");  //Set current page
			App.init(); //Initialise plugins and elements
			FormWizard.init();
		});
	</script>
	<!-- /JAVASCRIPTS -->
</body>
</html>