<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title>Cloud Admin | Error 404</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- STYLESHEETS -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/cloud-admin.css" >
    <link rel="stylesheet" type="text/css"  href="<?php echo base_url();?>assets/css/themes/<?php echo THEME;?>.css" id="skin-switcher" >
	<link rel="stylesheet" type="text/css"  href="<?php echo base_url();?>assets/css/responsive.css" >
	
	<link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- DATE RANGE PICKER -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
    <!-- BOOTSTRAP SWITCH -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/bootstrap-switch/bootstrap-switch.min.css" />
	<!-- FONTS -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
</head>
<body>
	<header class="navbar clearfix" id="header">
		<div class="container">
				<div class="navbar-brand">
					<!-- COMPANY LOGO -->
					<a href="<?php echo base_url();?>">
						<img src="<?php echo $this->crud_model->get_image_url('',SYSTEM_LOGO);?>" alt="<?php echo SYSTEM_TITLE;?>" class="img-responsive" height="30" width="120">
					</a>
					<!-- /COMPANY LOGO -->
					<!-- TEAM STATUS FOR MOBILE -->
					<!--<div class="visible-xs">
						<a href="#" class="team-status-toggle switcher btn dropdown-toggle">
							<i class="fa fa-users"></i>
						</a>
					</div>-->
					<!-- /TEAM STATUS FOR MOBILE -->
					<!-- SIDEBAR COLLAPSE -->
					<div id="sidebar-collapse" class="sidebar-collapse btn">
						<i class="fa fa-bars" 
							data-icon1="fa fa-bars" 
							data-icon2="fa fa-bars" ></i>
					</div>
					<!-- /SIDEBAR COLLAPSE -->
				</div>
				<!-- NAVBAR LEFT -->
				<ul class="nav navbar-nav pull-left hidden-xs" id="navbar-lefts">
					<!--<li class="dropdown">
						<a href="#" class="team-status-toggle dropdown-toggle tip-bottom" data-toggle="tooltip" title="Toggle Team View">
							<i class="fa fa-users"></i>
							<span class="name">Team Status</span>
							<i class="fa fa-angle-down"></i>
						</a>
					</li>-->
                    
                    <li class="dropdown">
						<a href="#" class="dropdown-toggle tip-bottom" data-toggle="dropdown" title="<?php echo get_phrase('select_language');?>">
							<i class="fa fa-cog"></i>
							<span class="name"><?php echo get_phrase('select_language');?></span>
							<i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu">
							 <?php
                            $fields = $this->db->list_fields('language');
                            foreach ($fields as $field)
                            {
                                if($field == 'phrase_id' || $field == 'phrase')continue;
                                ?>
                                    <li><a href="<?php echo base_url();?>multilanguage/select_language/<?php echo $field;?>"><?php echo ucwords($field);?>
                                            <!--//selecting current language-->
											<?php if($this->session->userdata('current_language') == $field):?><i class="fa fa-check"></i><?php endif;?>
                                        </a>
                                    </li>
                                <?php
                            }
                            ?>
						 </ul>
					</li>
                    
                    <li class="dropdown">
						<a href="javascript:;"  class="dropdown-toggle">
							<i class="fa fa-clock-o"></i>
							<span class="name"><?php echo date('l, j F Y'); ?></span>
						</a>
					</li>
				</ul>
				<!-- /NAVBAR LEFT -->
				<!-- BEGIN TOP NAVIGATION MENU -->					
				<ul class="nav navbar-nav pull-right">
                	<!--<li class="dropdown">
						<a href="<?=base_url();?>home/calendar"  class="dropdown-toggle">
                        <i class="fa fa-calendar"></i>
                        <span class="name"><?php echo get_phrase('calendar');?></span>
						</a>
					</li>-->
					<!-- BEGIN NOTIFICATION DROPDOWN -->	
					<li class="dropdown" id="header-notification">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-bell"></i>
							<span class="badge">7</span>
						</a>
						<ul class="dropdown-menu notification">
							<li class="dropdown-title">
								<span><i class="fa fa-bell"></i> 7 Notifications</span>
							</li>
							<li>
								<a href="#">
									<span class="label label-success"><i class="fa fa-user"></i></span>
									<span class="body">
										<span class="message">5 users online. </span>
										<span class="time">
											<i class="fa fa-clock-o"></i>
											<span>Just now</span>
										</span>
									</span>
								</a>
							</li>
							<li>
								<a href="#">
									<span class="label label-primary"><i class="fa fa-comment"></i></span>
									<span class="body">
										<span class="message">Martin commented.</span>
										<span class="time">
											<i class="fa fa-clock-o"></i>
											<span>19 mins</span>
										</span>
									</span>
								</a>
							</li>
							<li>
								<a href="#">
									<span class="label label-warning"><i class="fa fa-lock"></i></span>
									<span class="body">
										<span class="message">DW1 server locked.</span>
										<span class="time">
											<i class="fa fa-clock-o"></i>
											<span>32 mins</span>
										</span>
									</span>
								</a>
							</li>
							<li>
								<a href="#">
									<span class="label label-info"><i class="fa fa-twitter"></i></span>
									<span class="body">
										<span class="message">Twitter connected.</span>
										<span class="time">
											<i class="fa fa-clock-o"></i>
											<span>55 mins</span>
										</span>
									</span>
								</a>
							</li>
							<li>
								<a href="#">
									<span class="label label-danger"><i class="fa fa-heart"></i></span>
									<span class="body">
										<span class="message">Jane liked. </span>
										<span class="time">
											<i class="fa fa-clock-o"></i>
											<span>2 hrs</span>
										</span>
									</span>
								</a>
							</li>
							<li>
								<a href="#">
									<span class="label label-warning"><i class="fa fa-exclamation-triangle"></i></span>
									<span class="body">
										<span class="message">Database overload.</span>
										<span class="time">
											<i class="fa fa-clock-o"></i>
											<span>6 hrs</span>
										</span>
									</span>
								</a>
							</li>
							<li class="footer">
								<a href="#">See all notifications <i class="fa fa-arrow-circle-right"></i></a>
							</li>
						</ul>
					</li>
					<!-- END NOTIFICATION DROPDOWN -->
					<!-- BEGIN INBOX DROPDOWN -->
					<li class="dropdown" id="header-message">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-envelope"></i>
						<span class="badge">3</span>
						</a>
						<ul class="dropdown-menu inbox">
							<li class="dropdown-title">
								<span><i class="fa fa-envelope-o"></i> 3 Messages</span>
								<span class="compose pull-right tip-right" title="Compose message"><i class="fa fa-pencil-square-o"></i></span>
							</li>
							<li>
								<a href="#">
									<img src="<?php echo base_url();?>assets/img/avatars/avatar2.jpg" alt="" />
									<span class="body">
										<span class="from">Jane Doe</span>
										<span class="message">
										Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse mole ...
										</span> 
										<span class="time">
											<i class="fa fa-clock-o"></i>
											<span>Just Now</span>
										</span>
									</span>
									 
								</a>
							</li>
							<li>
								<a href="#">
									<img src="<?php echo base_url();?>assets/img/avatars/avatar1.jpg" alt="" />
									<span class="body">
										<span class="from">Vince Pelt</span>
										<span class="message">
										Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse mole ...
										</span> 
										<span class="time">
											<i class="fa fa-clock-o"></i>
											<span>15 min ago</span>
										</span>
									</span>
									 
								</a>
							</li>
							<li>
								<a href="#">
									<img src="<?php echo base_url();?>assets/img/avatars/avatar8.jpg" alt="" />
									<span class="body">
										<span class="from">Debby Doe</span>
										<span class="message">
										Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse mole ...
										</span> 
										<span class="time">
											<i class="fa fa-clock-o"></i>
											<span>2 hours ago</span>
										</span>
									</span>
									 
								</a>
							</li>
							<li class="footer">
								<a href="#">See all messages <i class="fa fa-arrow-circle-right"></i></a>
							</li>
						</ul>
					</li>
					<!-- END INBOX DROPDOWN -->
					<!-- BEGIN TODO DROPDOWN -->
					<li class="dropdown" id="header-tasks">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-tasks"></i>
						<span class="badge">3</span>
						</a>
						<ul class="dropdown-menu tasks">
							<li class="dropdown-title">
								<span><i class="fa fa-check"></i> 6 tasks in progress</span>
							</li>
							<li>
								<a href="#">
									<span class="header clearfix">
										<span class="pull-left">Software Update</span>
										<span class="pull-right">60%</span>
									</span>
									<div class="progress">
									  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
										<span class="sr-only">60% Complete</span>
									  </div>
									</div>
								</a>
							</li>
							<li>
								<a href="#">
									<span class="header clearfix">
										<span class="pull-left">Software Update</span>
										<span class="pull-right">25%</span>
									</span>
									<div class="progress">
									  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
										<span class="sr-only">25% Complete</span>
									  </div>
									</div>
								</a>
							</li>
							<li>
								<a href="#">
									<span class="header clearfix">
										<span class="pull-left">Software Update</span>
										<span class="pull-right">40%</span>
									</span>
									<div class="progress progress-striped">
									  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
										<span class="sr-only">40% Complete</span>
									  </div>
									</div>
								</a>
							</li>
							<li>
								<a href="#">
									<span class="header clearfix">
										<span class="pull-left">Software Update</span>
										<span class="pull-right">70%</span>
									</span>
									<div class="progress progress-striped active">
									  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;">
										<span class="sr-only">70% Complete</span>
									  </div>
									</div>
								</a>
							</li>
							<li>
								<a href="#">
									<span class="header clearfix">
										<span class="pull-left">Software Update</span>
										<span class="pull-right">65%</span>
									</span>
									<div class="progress">
									  <div class="progress-bar progress-bar-success" style="width: 35%">
										<span class="sr-only">35% Complete (success)</span>
									  </div>
									  <div class="progress-bar progress-bar-warning" style="width: 20%">
										<span class="sr-only">20% Complete (warning)</span>
									  </div>
									  <div class="progress-bar progress-bar-danger" style="width: 10%">
										<span class="sr-only">10% Complete (danger)</span>
									  </div>
									</div>
								</a>
							</li>
							<li class="footer">
								<a href="#">See all tasks <i class="fa fa-arrow-circle-right"></i></a>
							</li>
						</ul>
					</li>
					<!-- END TODO DROPDOWN -->
                   <!-- BEGIN SITE CONFIGURATION DROPDOWN --> 
                    <?php if($this->session->userdata('roles')=='admin'):?>
					</li>
                    <li class="dropdown" id="header-user">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<i class="fa fa-cogs"></i>		
					<span class="username"><?php echo get_phrase('configuration');?></span>
							<i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu">
                            <!--<li><a href="<?=base_url();?><?=$roles?>/manage_languages"><i class="fa fa-flag"></i> <?php echo get_phrase('manage_languages');?></a></li>-->
							<li><a  href="<?=base_url();?><?=$roles?>/order_settings"><i class="fa fa-cog"></i> <?php echo get_phrase('order');?> <?php echo get_phrase('configuration');?></a></li>
						</ul>
					</li>
                    <?php endif;?>
                    <!-- END SITE CONFIGURATION DROPDOWN -->
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<li class="dropdown user" id="header-user">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php if($this->session->userdata('image')){?>
							<img alt="" src="<?php echo base_url();?>uploads/users_image/<?php echo $this->session->userdata('image'); ?>" />
                         <?php }else{?>
                         	<img alt="" src="<?php echo base_url();?>uploads/users_image/user.png" />
                         <?php }?>
					<span class="username"><?php echo ucwords($this->session->userdata('name'))?></span>
							<i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu">
							<li><a href="<?=base_url();?><?=$roles?>/change_password"><i class="fa fa-cog"></i> <?php echo get_phrase('change_password');?></a></li>
							<li><a href="<?php echo base_url()?>home/logout"><i class="fa fa-power-off"></i> <?php echo get_phrase('log_out');?></a></li>
						</ul>
					</li>
					<!-- END USER LOGIN DROPDOWN -->
				</ul>
				<!-- END TOP NAVIGATION MENU -->
		</div>
	</header>
	<div class="overlay"></div>
	<!-- PAGE -->
	<section id="page">
		<div class="container">
				<div class="row">
					<div id="" class="col-lg-12">
						<!-- PAGE HEADER-->
						<div class="row">
							<div class="col-sm-12">
								<div class="page-header">
									<!-- BREADCRUMBS -->
									
                                    <div class="clearfix">
										<h5 class="content-title pull-left">
                                        <a href="<?php echo base_url();?>"> <i class="fa fa-home"></i> <?php echo get_phrase('home');?></a> &nbsp;<i class="fa fa-angle-right"></i>&nbsp; 
                                        <a href="<?php echo base_url();?>"> <i class="fa fa-tasks"></i> <?php echo get_phrase('order');?></a> &nbsp;<i class="fa fa-angle-right"></i>&nbsp; 
                                        <i class="fa fa-plus"></i> <?php echo get_phrase('new');?> <?php echo get_phrase('order');?></h5>
									</div>
									<!-- /BREADCRUMBS -->
									
								</div>
							</div>
						</div>
						<!-- /PAGE HEADER -->
						<!-- PAGE MAIN CONTENT -->
						<div class="row">
							
							<div class="col-md-4 box-container">
								<!-- BOX BORDER-->
								<div class="box border">
									<div class="box-title">
										<h4><i class="fa fa-bars"></i>Box Border</h4>
										<div class="tools">
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
									<div class="box-body">
										Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.
									</div>
								</div>
								<!-- /BOX BORDER -->
							</div>
							<div class="col-md-4 box-container">
								<!-- BOX BORDER SLIMSCROLL -->
								<div class="box border orange">
									<div class="box-title">
										<h4><i class="fa fa-bars"></i>On-Hover Scrollbar</h4>
										<div class="tools">
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
									<div class="box-body">
										<div class="scroller" data-height="165px">
										Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.
									consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.
										</div>
									</div>
								</div>
								<!-- /BOX BORDER SLIMSCROLL -->
							</div>
						</div>
						<div class="separator"></div>
						<!-- BOX TABS -->
						<div class="row">
							<div class="col-md-4 box-container">
								<!-- BOX -->
								<div class="box">
									<div class="box-title">
										<h4><i class="fa fa-bars"></i>Box with light body</h4>
										<div class="tools">
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
									<div class="box-body bg">
										<p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.
										Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. est non commodo luctus, nisi erat porttitor ligula. </p>
									</div>
								</div>
								<!-- /BOX -->
							</div>
							<div class="col-md-4 box-container">
							<!-- BOX -->
							<div class="box border red">
								<div class="box-title">
									<h4><i class="fa fa-bars"></i>Nested Boxes</h4>
									<div class="tools">
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
								<div class="box-body">
									This is an example of nested box. Below is a child box.
									<div class="divide-20"></div>
									<!-- SAMPLE -->
									<div class="row">
										<div class="col-md-8">
											<div class="panel panel-primary">
											  <div class="panel-heading">
												<h3 class="panel-title">Box title</h3>
											  </div>
											  <div class="panel-body">
												ur purus sit amet fermentum. est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus
											  </div>
											</div>
										</div>
									</div>
									<!-- /SAMPLE -->
									
									<!-- extra -->
									<div class="row">
										<div class="col-md-10">
											<div class="box border orange">
												<div class="box-title">
													<h4><i class="fa fa-bars"></i>2nd Level Box</h4>													
												</div>
												<div class="box-body">
													guide you home because why is there a typewriter in your shoes and the world I knew is broken.
													<br>
													<br>
													<!-- THIRD LEVEL BOX -->
													<div class="box border inverse">
														<div class="box-title">
															<h4><i class="fa fa-bars"></i>3rd Level Box</h4>													
														</div>
														<div class="box-body">
														</div>
													</div>
													<!-- /THIRD LEVEL BOX -->
												</div>
											</div>
										</div>
									</div>
									<!-- /extra -->
								</div>
							</div>
							<!-- /BOX -->
							</div>
							<div class="col-md-4 box-container">
								<!-- BOX -->
								<div class="box border">
									<div class="box-title">
										<h4><i class="fa fa-bars"></i><span class="hidden-inline-mobile">Box with tabs</span></h4>
									</div>
									<div class="box-body">
										<div class="tabbable header-tabs">
										  <ul class="nav nav-tabs">
											 <li><a href="#box_tab2" data-toggle="tab"><i class="fa fa-user"></i> <span class="hidden-inline-mobile">Profile</span></a></li>
											 <li class="active"><a href="#box_tab1" data-toggle="tab"><i class="fa fa-home"></i> <span class="hidden-inline-mobile">Home</span></a></li>
										  </ul>
										  <div class="tab-content">
											 <div class="tab-pane active" id="box_tab1">
												<p>Content #1</p>
												<p> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent. </p>
											 </div>
											 <div class="tab-pane" id="box_tab2">
												<p>Content #2</p>o
												<p> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent.Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent. </p>
											 </div>
										  </div>
									   </div>
									</div>
								</div>
								<!-- /BOX -->
							</div>
						</div>
						<!-- BOX TABS -->
						<div class="separator"></div>
						<div class="row">
							<div class="col-md-5 box-container">
								<!-- BOX WITH TOOLBOX-->
								<div class="box border green">
									<div class="box-title">
										<h4><i class="fa fa-bars"></i>With Toolbox</h4>
										<div class="items">
											<div class="progress progress-striped active">
												<div class="progress-bar progress-bar-danger" style="width: 70%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" role="progressbar">
												<span class="sr-only">70% Complete</span>
												</div>
											</div>
										</div>
									</div>
									<div class="toolbox">
										<div class="btn-group">
										  <button type="button" class="btn btn-default"><i class="fa fa-bold"></i></button>
										  <button type="button" class="btn btn-default"><i class="fa fa-italic"></i></button>
										  <button type="button" class="btn btn-default"><i class="fa fa-file"></i></button>
										  <button type="button" class="btn btn-default"><i class="fa fa-align-right"></i></button>
										  <button type="button" class="btn btn-default"><i class="fa fa-align-justify"></i></button>
										  <button type="button" class="btn btn-default"><i class="fa fa-align-left"></i></button>
										  <button type="button" class="btn btn-default"><i class="fa fa-cloud-download"></i></button>
										</div>
									</div>
									<div class="box-body">
										<div class="scroller" data-height="165px" data-always-visible="1" data-rail-visible="1">
										<p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p> <p>Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.
									consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.</p>
										</div>
									</div>
								</div>
								<!-- /BOX WITH TOOLBOX-->
							</div>
							<div class="col-md-5 col-md-offset-1 box-container">
								<!-- BOX WITH TOOLBOX-->
								<div class="box border blue">
									<div class="box-title">
										<h4><i class="fa fa-youtube-play"></i>Bottom Toolbox</h4>
										<div class="pull-right">
											<div class="make-switch switch-mini" data-on="warning" data-off="danger">
												<input type="checkbox">
											</div>
										</div>
									</div>
									<div class="box-body">
										<div class="scroller" data-height="165px" data-always-visible="1" data-rail-visible="1">
										<p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis</p><p> consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.</p>
									<p>consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.</p>
										</div>
									</div>
									<div class="toolbox bottom">
										<div class="btn-group">
										  <button type="button" class="btn btn-default"><i class="fa fa-step-backward"></i></button>
										  <button type="button" class="btn btn-default"><i class="fa fa-backward"></i></button>
										  <button type="button" class="btn btn-default"><i class="fa fa-pause"></i></button>
										  <button type="button" class="btn btn-default"><i class="fa fa-play"></i></button>
										  <button type="button" class="btn btn-default"><i class="fa fa-forward"></i></button>
										  <button type="button" class="btn btn-default"><i class="fa fa-step-forward"></i></button>
										  <button type="button" class="btn btn-default"><i class="fa fa-arrows-alt"></i></button>
										</div>
										<div class="btn-group pull-right hidden-xs">
										  <button type="button" class="btn btn-default"><i class="fa fa-arrow-left"></i> Prev</button>
										  <button type="button" class="btn btn-info"><i class="fa fa-arrow-right"></i> Next</button>
										</div>
									</div>
								</div>
								<!-- /BOX WITH TOOLBOX-->
							</div>
						</div>
						<div class="separator"></div>
						<div class="row">
							<div class="col-md-3 box-container">
								<!-- BOX COLLAPSED-->
								<div class="box border red">
									<div class="box-title">
										<h4><i class="fa fa-bars"></i>Collapsed</h4>
										<div class="tools">
											<a href="#box-config" data-toggle="modal" class="config">
												<i class="fa fa-cog"></i>
											</a>
											<a href="javascript:;" class="reload">
												<i class="fa fa-refresh"></i>
											</a>
											<a href="javascript:;" class="expand">
												<i class="fa fa-chevron-down"></i>
											</a>
											<a href="javascript:;" class="remove">
												<i class="fa fa-times"></i>
											</a>
										</div>
									</div>
									<div class="box-body" style="display:none">
										Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.
									</div>
								</div>
								<!-- /BOX COLLAPSED-->
							</div>
							<div class="col-md-4 box-container">
								<!-- BOX WITH SMALL HEADER-->
								<div class="box border purple">
									<div class="box-title small">
										<h4><i class="fa fa-rocket"></i> Small Header</h4>
										<div class="tools">
											<a href="#box-config" data-toggle="modal" class="config">
												<i class="fa fa-cog"></i>
											</a>
											<a href="javascript:;" class="reload">
												<i class="fa fa-refresh"></i>
											</a>
											<a href="javascript:;" class="collapse">
												<i class="fa fa-chevron-down"></i>
											</a>
											<a href="javascript:;" class="remove">
												<i class="fa fa-times"></i>
											</a>
										</div>
									</div>
									<div class="box-body">
										Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.
									</div>
								</div>
								<!-- /BOX WITH SMALL HEADER-->
							</div>
							<div class="col-md-3 box-container">
								<!-- BOX WITH BIG HEADER-->
								<div class="box border primary">
									<div class="box-title big">
										<h4><i class="fa fa-home"></i> Big Header</h4>
										<div class="tools">
											<a href="#box-config" data-toggle="modal" class="config">
												<i class="fa fa-cog"></i>
											</a>
											<a href="javascript:;" class="reload">
												<i class="fa fa-refresh"></i>
											</a>
											<a href="javascript:;" class="collapse">
												<i class="fa fa-chevron-down"></i>
											</a>
											<a href="javascript:;" class="remove">
												<i class="fa fa-times"></i>
											</a>
										</div>
									</div>
									<div class="box-body">
										Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.
									</div>
								</div>
								<!-- /BOX WITH BIG HEADER-->
							</div>
						</div>
						<div class="separator"></div>
						<div class="row">
							<div class="col-md-6 box-container">
								<!-- BOX SOLID-->
								<div class="box solid blue">
									<div class="box-title">
										<h4><i class="fa fa-retweet"></i>Box Solid Blue</h4>
										<div class="tools">
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
									<div class="box-body">
										<div class="scroller" data-height="165px" data-always-visible="1" data-rail-visible="1">
										<p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis</p><p> consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.</p>
									<p>consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.</p><p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis</p><p> consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.</p>
									<p>consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.</p>
										</div>
									</div>
								</div>
								<!-- /BOX SOLID -->
							</div>
							<div class="col-md-6 box-container">
								<!-- BOX SOLID-->
								<div class="box solid grey">
									<div class="box-title">
										<h4><i class="fa fa-bars"></i>Box Solid Grey</h4>
										<div class="tools hidden-xs">
											<span class="badge badge-blue">25</span>
											<span class="label label-warning">
												Favorite <i class="fa fa-star"></i>
											</span>
											<a href="javascript:;" class="collapse">
												<i class="fa fa-chevron-up"></i>
											</a>
											<a href="javascript:;" class="remove">
												<i class="fa fa-times"></i>
											</a>
										</div>
									</div>
									<div class="box-body">
										<div class="scroller" data-height="165px" data-rail-visible="1">
										<p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis</p>
									<p>consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.</p><p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis</p><p> consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.</p>
									<p>consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.</p>
										</div>
									</div>
								</div>
								<!-- /BOX SOLID -->
							</div>
						</div>
						<div class="separator"></div>
						<div class="row">
							<div class="col-md-3 box-container">
								<!-- BOX WITHOUT ICONS-->
								<div class="box border inverse">
									<div class="box-title">
										<h4>Without Icon & Lite</h4>
										<div class="tools">
											<a href="#box-config" data-toggle="modal" class="config">
												<i class="fa fa-cog"></i>
											</a>
											<a href="javascript:;" class="reload">
												<i class="fa fa-refresh"></i>
											</a>
											<a href="javascript:;" class="collapse">
												<i class="fa fa-chevron-down"></i>
											</a>
											<a href="javascript:;" class="remove">
												<i class="fa fa-times"></i>
											</a>
										</div>
									</div>
									<div class="box-body">
										Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.
									</div>
								</div>
								<!-- /BOX WITHOUT ICONS-->
							</div>
							<div class="col-md-5 box-container">
								<!-- BOX WITH SPACE-->
								<div class="box border pink">
									<div class="box-title">
										<h4><i class="fa fa-trello"></i> Wide Box</h4>
										<div class="pull-right">
											<div class="make-switch switch-mini" data-on="info" data-off="success" data-on-label="<i class='fa fa-check icon-white'></i>" data-off-label="<i class='fa fa-times'></i>">
												<input type="checkbox">
											</div>
										</div>
									</div>
									<div class="box-body big">
										<div class="alert alert-success">Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis cons</div> ectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.ectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.
									</div>
								</div>
								<!-- /BOX WITH SPACE-->
							</div>
							<div class="col-md-3 col-md-offset-1 box-container">
								<!-- BOX WITH BADGES-->
								<div class="box border">
									<div class="box-title">
										<h4><i class="fa fa-map-marker"></i> With badges</h4>
										<div class="tools">
											<span class="badge badge-red">Warning</span>
										</div>
									</div>
									<div class="box-body">
										<div class="alert alert-info">Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis cons</div> ectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.
									</div>
								</div>
								<!-- /BOX WITH BADGES-->
							</div>
						</div>
						<div class="separator"></div>
						<div class="row">
							<div class="col-md-4 box-container">
								<!-- BOX BORDER-->
								<div class="box border blue">
									<div class="box-title">
										<h4><i class="fa fa-bars"></i>Always visible Scrollbar</h4>
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
									<div class="box-body">
										<div class="scroller" data-height="165px" data-always-visible="1">
										Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.
									consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.
										</div>
									</div>
								</div>
								<!-- /BOX BORDER -->
							</div>
							<div class="col-md-4 box-container">
								<!-- BOX BORDER-->
								<div class="box border orange">
									<div class="box-title">
										<h4><i class="fa fa-bars"></i>Always visible Scroll & Rail</h4>
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
									<div class="box-body">
										<div class="scroller" data-height="165px" data-always-visible="1" data-rail-visible="1">
										<div class="alert alert-info">Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, </div><div class="alert alert-success">eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.
									consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.</div>
										</div>
									</div>
								</div>
								<!-- /BOX BORDER -->
							</div>
							<div class="col-md-4 box-container">
								<!-- BOX BORDER-->
								<div class="box border red">
									<div class="box-title">
										<h4><i class="fa fa-bars"></i>With Label</h4>
										<div class="tools">
											<span class="label label-success">
												20% <i class="fa fa-arrow-up"></i>
											</span>
											<a href="javascript:;" class="remove">
												<i class="fa fa-times"></i>
											</a>
										</div>
									</div>
									<div class="box-body">
										<div class="scroller" data-height="165px" data-always-visible="1" data-rail-visible="1">
										Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.
									consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.
										</div>
									</div>
								</div>
								<!-- /BOX BORDER -->
							</div>
						</div>
						<!-- /PAGE MAIN CONTENT -->
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
	<script src="<?php echo base_url();?>assets/js/jquery/jquery-2.0.3.min.js"></script>
	<!-- JQUERY UI-->
	<script src="<?php echo base_url();?>assets/js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
	<!-- BOOTSTRAP -->
	<script src="<?php echo base_url();?>assets/bootstrap-dist/js/bootstrap.min.js"></script>
	
		
	<!-- DATE RANGE PICKER -->
	<script src="<?php echo base_url();?>assets/js/bootstrap-daterangepicker/moment.min.js"></script>
	
	<script src="<?php echo base_url();?>assets/js/bootstrap-daterangepicker/daterangepicker.min.js"></script>
	<!-- SLIMSCROLL -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jQuery-slimScroll-1.3.0/slimScrollHorizontal.min.js"></script>
    <!-- BLOCK UI -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jQuery-BlockUI/jquery.blockUI.min.js"></script>
	<!-- BOOTSTRAP SWITCH -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap-switch/bootstrap-switch.min.js"></script>
	<!-- COOKIE -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jQuery-Cookie/jquery.cookie.min.js"></script>
	<!-- CUSTOM SCRIPT -->
	<script src="<?php echo base_url();?>assets/js/script.js"></script>
	<script>
		jQuery(document).ready(function() {		
			App.setPage("<?php echo $page_name;?>");  //Set current page
			App.init(); //Initialise plugins and elements
		});
	</script>
	<!-- /JAVASCRIPTS -->
</body>
</html>