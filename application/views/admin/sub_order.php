<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title><?php echo $page_title;?> | <?php echo SYSTEM_TITLE;?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
	<meta name="description" content="<?php echo SYSTEM_TITLE;?>">
	<meta name="author" content="Kumar Jitendra">
	<!-- STYLESHEETS -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/cloud-admin.css" >
    <link rel="stylesheet" type="text/css"  href="<?php echo base_url();?>assets/css/themes/<?php echo THEME;?>.css">
	<link rel="stylesheet" type="text/css"  href="<?php echo base_url();?>assets/css/responsive.css" >
	
	<link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- UNIFORM -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/uniform/css/uniform.default.min.css" />
    <!-- SELECT2 -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/select2/select2.min.css" />
	<!-- DATE RANGE PICKER -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
    <!-- BOOTSTRAP SWITCH -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/bootstrap-switch/bootstrap-switch.min.css" />
    <!-- GRITTER -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/gritter/css/jquery.gritter.css" />
	<!-- FONTS -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
    <style>
	#loading{
		/*height: 100%;
		width: 100%;*/
		position: fixed;
		top: 50%;
		left: 50%;
	}
	
    </style>
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
                    <?php if (DTIME == "yes") { ?>
                    <li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle hdate">
							<i class="fa fa-clock-o"></i>
							<span class="name" id="theTime"></span>
						</a>
					</li>
                    <?php }?>
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
					<?php 
					$cP = $this->order_model->productAlertsNotifications('cloth_products');
					$oP = $this->order_model->productAlertsNotifications('products');					
					$cOP = array_merge($cP,$oP);					
					$countAp = count($cOP);
					if($countAp>0){
					?>	
					<li class="dropdown" id="header-notification">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-bell"></i>
							<span class="badge"><?php echo $countAp;?></span>
						</a>
						<ul class="dropdown-menu notification">
							<li class="dropdown-title">
								<span><i class="fa fa-bell"></i> <?php echo $countAp;?> <?php echo get_phrase('product_alert'); ?></span>
							</li>
							<?php foreach($cOP as $ap){
								$name = ($ap->name) ? $ap->name : $ap->title;
								if($ap->title){$label = 'danger';}
								else{$label = 'warning';}
								?>
							<li>
								<a href="<?php echo base_url();?><?php echo $roles;?>/product_alert">
									<span class="label label-<?php echo $label; ?>"><i class="fa fa-exclamation-triangle"></i></span>
									<span class="body">
										<span class="message"><?php echo $name;?>.</span>
										<span class="time">
											<i class="fa fa-star-o"></i>
											<span><?php echo $ap->quantity;?> <?php echo get_phrase('qty'); ?></span>
										</span>
									</span>
								</a>
							</li>
							<?php }?>
							<li class="footer">
								<a href="<?php echo base_url();?><?php echo $roles;?>/product_alert"><?php echo get_phrase('see_all'); ?> <i class="fa fa-arrow-circle-right"></i></a>
							</li>
						</ul>
					</li>
					<?php }?>
					<!-- END NOTIFICATION DROPDOWN -->
					<!-- BEGIN INBOX DROPDOWN -->
					<?php $calData = $this->crud_model->getEvents();					
					$countCal = count($calData);
					if($countCal>0){?>
					<li class="dropdown" id="header-message">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-calendar"></i>
						<span class="badge"><?php echo $countCal; ?></span>
						</a>
						<ul class="dropdown-menu inbox">
							<li class="dropdown-title">
								<span><i class="fa fa-calendar-o"></i> <?php echo $countCal;?> <?php echo get_phrase('events');?></span>
								<!--<span class="compose pull-right tip-right" title="Compose message"><i class="fa fa-pencil-square-o"></i></span>-->
							</li>
							<li>
							<?php foreach($calData as $event){?>
							<li>
								<a href="#">
									<!--<img src="<?php echo base_url();?>assets/img/avatars/avatar8.jpg" alt="" />-->
									<span class="body">
										<span class="from"><?php echo $event->date; ?></span>
										<span class="message">
										<?php echo $event->data; ?>
										</span> 
										<!--<span class="time">
											<i class="fa fa-clock-o"></i>
											<span>2 hours ago</span>
										</span>-->
									</span>
									 
								</a>
							</li>
							<?php }?>
							<li class="footer">
								<a href="#"> &nbsp;<i class="fa fa-arrow-circle-right"></i></a>
							</li>
						</ul>
					</li>
					<?php }?>
					<!-- END INBOX DROPDOWN -->
					<!-- BEGIN TODO DROPDOWN -->
					<?php $progressData = $this->order_model->getSubOrderProgress();
					$countProgress = count($progressData);
					if($countProgress>0){?>
					<li class="dropdown" id="header-tasks">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-tasks"></i>
						<span class="badge"><?php echo $countProgress; ?></span>
						</a>
						<ul class="dropdown-menu tasks">
							<li class="dropdown-title">
								<span><i class="fa fa-check"></i> <?php echo $countProgress; ?> <?php echo get_phrase('suborder_in_progress')?></span>
							</li>
							<?php foreach($progressData as $progress){							
							switch ($progress->status) {
							    case "inprocess":
							        $valuenow = '40';
							        break;
							    case "completed":
							        $valuenow = '80';
							        break;
							    case "to_deliver":
							        $valuenow = '100';
							        break;
							    default:
							        $valuenow = '10';
							}?>
							<li>
								<a href="<?php echo base_url();?><?php echo $roles;?>/track_order/track_suborder/<?php echo $progress->order_id;?>">
									<span class="header clearfix">
										<span class="pull-left"><?php echo $progress->item.'-('.$progress->customer.')';?></span>
										<span class="pull-right"><?php echo $valuenow; ?>%</span>
									</span>
									<div class="progress">
									  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo $valuenow;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $valuenow;?>%;">
										<span class="sr-only"><?php echo $valuenow;?>% <?php echo get_phrase('complete'); ?></span>
									  </div>
									</div>
								</a>
							</li>
							<?php }?>
							<li class="footer">
								<a href="<?php echo base_url();?><?php echo $roles;?>/track_order/search_orders"><?php echo get_phrase('see_all') ?> <i class="fa fa-arrow-circle-right"></i></a>
							</li>
						</ul>
					</li>
					<?php }?>
					<!-- END NOTIFICATION DROPDOWN -->
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
							<li><a target="_blank"  href="<?=base_url();?><?php echo $this->session->userdata('roles')?>/order_settings"><i class="fa fa-cog"></i> <?php echo get_phrase('order');?> <?php echo get_phrase('configuration');?></a></li>
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
    <!-- FABRIC MODAL -->
    <div class="modal fade" id="modal_fabric" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					  <h4 class="modal-title hdmt"><?php echo get_phrase('choose')?> <?php echo get_phrase('cloth')?></h4>
					</div>
					<div class="modal-body">
					  <div class="box border green" id="formWizard">
                        <div class="box-title">
                            <h4><i class="fa fa-bars"></i> <?php echo get_phrase('cloths')?> </h4>
                            <div class="tools hidden-xs">
                                <a href="#box-config" data-toggle="modal" class="config">
                                    <i class="fa fa-plus"></i>
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
							<div class="row">
                            <?php $i=1;foreach($clothes as $clothe):
							if($i%4==0){?>
                            <div class="col-md-3 category_1 item">
                                <div class="hover-content">
                                    <img src="<?php echo base_url(); ?>uploads/products/<?php echo $clothe['image']; ?>" id="<?php echo $clothe['id'];?>" alt="<?php echo $clothe['cloth_type_id']; ?>" class="img-responsive" />
                                </div>
                            </div>
							<?php }else{?>
							<div class="col-md-3 category_1 item">
                                <div class="hover-content">
                                    <img src="<?php echo base_url(); ?>uploads/products/<?php echo $clothe['image']; ?>" id="<?php echo $clothe['id'];?>" alt="<?php echo $clothe['cloth_type_id']; ?>" class="img-responsive" />
                                </div>
                            </div>
							<?php }$i++;endforeach;?>				
											
							</div>
                        </div>
                    </div>
                      
					</div>
					<div class="modal-footer">
					  <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo get_phrase('close')?></button>
					  <!--<button type="button" class="btn btn-primary"><?php echo get_phrase('select')?></button>-->
					</div>
				  </div>
				</div>
			  </div>
	<!-- PAGE -->
	<section id="page1">
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
							<div class="col-md-5 box-container">
								<!-- BOX WITH TOOLBOX-->
								<div class="box border green">
									<div class="box-title">
										<h4><i class="fa fa-tasks"></i><?php echo get_phrase('order');?> <?php echo get_phrase('details');?></h4>
									</div>
									<div class="box-body">
                                      	  <h4><strong><?php echo get_phrase('ref_no');?></strong> :  <span id="rno"><?php echo $reference_no; ?></span></h4>
                                          <h4><strong><?php echo get_phrase('trail');?> <?php echo get_phrase('date');?>:</strong>  <?php echo $trial_date; ?></h4>
                                          <h4><strong><?php echo get_phrase('delivery');?> <?php echo get_phrase('date');?>:</strong>  <?php echo $delivery_date; ?> </h4>
                                          <h4><strong><?php echo get_phrase('order');?> <?php echo get_phrase('date');?>:</strong>  <?php echo $order_date; ?> </h4>
									 </div>
								</div>
								<!-- /BOX WITH TOOLBOX-->
							</div>
							<div class="col-md-5 col-md-offset-1 box-container">
								<!-- BOX WITH CUSTOMER-->
								<div class="box border blue">
									<div class="box-title">
										<h4><i class="fa fa-user"></i><?php echo get_phrase('customer');?> <?php echo get_phrase('details');?></h4>
										
									</div>
									<div class="box-body">
                                    <?php 
									foreach($customers as $customer):?>
                                      <address>
                                        <h4><strong><?php echo get_phrase('name');?></strong>:   <?php echo $customer['fname'].' '.$customer['lname']; ?></h4>
                                       <?php echo "<h4><strong>".get_phrase('address')."</strong>:" . $customer['address'].", ".$customer['city'].", ".$this->crud_model->get_value_by_id('states',$customer['state'],$field='name')."-".$customer['postal_code']." (".$this->crud_model->get_value_by_id('countries',$customer['country'],$field='name').")</h4>";  
echo "<h4><strong>".get_phrase('email')."</strong>:". $customer['email'].' </h4>'; echo "<h4><strong>".get_phrase('phone')."</strong>:". $customer['mobile']."</h4"; ?>
                                      </address>
                                     <input type="hidden" id="gender" value="<?php echo $customer['gender']; ?>"  />
                                      <?php endforeach; ?>
									</div>
								</div>
								<!-- /BOX WITH TOOLBOX-->
							</div>
						</div>
                        
                        <!------ ORDER LIST FOR THE SELECTED USERS------->
                        <div class="separator" id="ordSeperator" style="display:none;"></div>
                        <div class="row" id="orderDetails" style="display:none;">
							<div class="col-md-12 box-container">
								<!-- BOX BORDER-->
								<div class="box border purple">
									<div class="box-title">
										<h4><i class="fa fa-tasks"></i><?php echo get_phrase('orders');?></h4>
										
									</div>
									<div class="box-body">
										<div class="row" id="ordData">
											
										</div>
									</div>
								</div>
								<!-- /BOX BORDER -->
							</div>
							
						</div>
                        <!------ /ORDER LIST FOR THE SELECTED USERS------->
                        <div class="separator"></div>
<!--------------------------------- PRODUCTS LISTING -------------------------------->
						
						<div class="row" id="proajax" style="display:none;">
							<div class="col-md-12 box-container">
								<!-- BOX BORDER-->
								<div class="box border orange">
									<div class="box-title">
										<h4><i class="fa fa-bars"></i><?php echo get_phrase('products');?></h4>
										<div class="pull-right">
										<button class="btn btn-xs btn-info cancel" type="button"><?php echo get_phrase('cancel');?></button>
											
										</div>
									</div>
									<div class="box-body">
										<div class="row" id="products">
											
										
										</div>
									</div>
								</div>
								<!-- /BOX BORDER -->
							</div>
							
						</div>
                        
<!--------------------------------- /PRODUCTS LISTING ------------------------------->
						
<!--------------------------------- PATTERN LISTING -------------------------------->
						
                        <div class="row" id="patternajax" style="display:none;">
							<div class="col-md-12 box-container">
								<!-- BOX BORDER-->
								<div class="box border orange">
									<div class="box-title">
										<h4><i class="fa fa-bars"></i><?php echo get_phrase('patterns');?></h4>
										<div class="pull-right">
										<button class="btn btn-xs btn-info cancel" type="button"><?php echo get_phrase('cancel');?></button>
											
										</div>
									</div>
									<div class="box-body">
										<div class="row" id="patterns">
											
										
										</div>
									</div>
								</div>
								<!-- /BOX BORDER -->
							</div>
							
						</div>
    					
    
<!--------------------------------- /PATTERN LISTING ------------------------------->

<!--------------------------------- STYLE LISTING -------------------------------->
						
                        <div class="row" id="styleajax" style="display:none;">
							<div class="col-md-12 box-container">
								<!-- BOX BORDER-->
								<div class="box border orange">
									<div class="box-title">
										<h4><i class="fa fa-bars"></i><?php echo get_phrase('styles');?></h4>
										<div class="pull-right">
                                        <!--<button class="btn btn-xs btn-pink" onClick="showPattern();" type="button"> <i class="fa fa-plus"></i><?php echo get_phrase('back');?></button>-->
										<button class="btn btn-xs btn-info cancel" type="button"><i class="fa fa-times"></i> <?php echo get_phrase('cancel');?></button>
											
										</div>
									</div>
									<div class="box-body">
										<div class="row" id="styles">
											
										
										</div>
									</div>
								</div>
								<!-- /BOX BORDER -->
							</div>
						</div>
    					

<!--------------------------------- /STYLE LISTING --------------------------------> 
   
<!--------------------------------- ORDER FUNCTIONALITY -------------------------------->
    					
						<div class="row" id="orderfunct" style="display:none;">
                        	<div id="" class="col-lg-12">
                            <!-- Products -->
                            <form class="form-horizontal" role="form">
                            <div class="row">
     <!--------------------------- /TAKE FABRIC CONTENT---------------------->
                                <div class="col-md-4">
                                    <div class="col-md-12 box-container">
                                    <!-- BOX BORDER-->
                                    <div class="box border orange">
                                        <div class="box-title">
                                            <h4><i class="fa fa-bars"></i><?php echo get_phrase('take_fabric'); ?></h4>
                                        </div>
                                        <div class="box-body">
                                            
                                            <div class="scroller" id="takeFabric" data-height="480px" data-always-visible="2" data-rail-visible="2">
                                            
                                                
                                            
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /BOX BORDER -->
                                </div>
                                </div>
                                
     <!-------------------------- /ORDER MEASUREMENT CONTENT ---------------->   
                                <div class="col-md-4 box-container">
                                    <!-- BOX -->
                                    <div class="box border purple">
                                        <div class="box-title">
                                            <h4><i class="fa fa-wrench"></i><span class="hidden-inline-mobile"><?php echo get_phrase("measurement"); ?></span></h4>
                                        </div>
                                        <div class="box-body">
                                            <div class="tabbable header-tabs">
                                              <ul class="nav nav-tabs">
                                                <li><a href="#take_measurement" data-toggle="tab"><i class="fa fa-pencil"></i> <span class="hidden-inline-mobile"><?php echo get_phrase("take"); ?> <?php echo get_phrase("measurement"); ?></span></a></li>
                                                 <li class="active"><a href="#no_of_order" data-toggle="tab"><i class="fa fa-tasks"></i> <span class="hidden-inline-mobile"><?php echo get_phrase("no_of_order"); ?></span></a></li>
                                                 
                                              </ul>
                                              <div class="tab-content">
                                                 <div class="tab-pane active" id="no_of_order">
                                                    <p><?php echo get_phrase('no_of_order_in_same_measurement'); ?></p>
                                                    <div class="form-group number-spinner">
                                                    <label class="col-sm-3 control-label">Both sides</label>
                                                    <div class="col-sm-9">
                                                      <div class="input-group">
                                                          <span class="input-group-addon data-dwn"><button class="btn btn-danger btn-xs" id="orderSub" type="button" data-dir="dwn"><i class="fa fa-minus"></i></button></span>
                                                          <input type="text" name="orderNumber" id="orderNumber" readonly class="form-control text-center" value="1" min="1" max="<?php echo ORDER_LIMIT;?>" />
                                                          <span class="input-group-addon data-up"><button class="btn btn-pink btn-xs" type="button" id="orderAdd" data-dir="up"><i class="fa fa-plus"></i></button></span>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    
                                                      
                                                      <!--<div class="form-group">
                                                        <label class="col-sm-3 control-label">&nbsp;</label>
                                                        <div class="col-sm-9">
                                                          <button id="btn-load-complete" class="btn btn-info submit_order" type="button"><?php echo get_phrase('submit'); ?></button>
                                                        </div>
                                                      </div>-->
                                                 </div>
                                                 
                                                 <div class="tab-pane" id="take_measurement">
                                                    <p><?php echo get_phrase('take'); ?> <?php echo get_phrase('measurement'); ?></p>
                                                    
                                                    <p id="measurements">
                                                     
                                                    </p>
                                                    
                                                    
                                                    <div class="form-group">
                                                    <label class="col-sm-3 control-label"><?php echo get_phrase('note'); ?> </label>
                                                    <div class="col-sm-9">
                                                     <textarea class="form-control" rows="3" id="remark"></textarea>
                                                    </div>
                                                   </div>
                                                   
                                                      
                                                 </div>
                                              </div>
                                           </div>
                                        </div>
                                    </div>
                                    <!-- /BOX -->
                                </div>
                                
     <!-------------------------- /SCALE SPECIALIST CONTENT ----------------->   
                                <div class="col-md-4 box-container">
                                    <!-- BOX -->
                                    <div class="box border green">
                                        <div class="box-title ">
                                            <h4><i class="fa fa-cogs"></i><span class="hidden-inline-mobile"><?php echo get_phrase("measurement"); ?> <?php echo get_phrase("tools"); ?></span></h4>
                                        </div>
                                        <div class="box-body">
                                            <div class="tabbable header-tabs">
                                              <ul class="nav nav-tabs">
                                                
                                                 <li><a href="#specialist" data-toggle="tab"><i class="fa fa-users"></i> <span class="hidden-inline-mobile"><?php echo get_phrase("specialist"); ?></span></a></li>
                                                 
                                                  <li class="active"><a href="#scale" data-toggle="tab"><i class="fa fa-wrench"></i> <span class="hidden-inline-mobile"><?php echo get_phrase("scale"); ?></span></a></li>
                                              </ul>
                                              <div class="tab-content">
                                                 <div class="tab-pane active" id="scale">
                                                    <!--<p>Content #1</p>-->
                                                    <div id="meterTap" align="center">
    <button id="tapUp" class="btn btn-info tapButton" style="width:20%;" type="button"><i class="fa fa-chevron-up"></i></button>
    <div id="tapValue" class="tapButton">
    <table align="center" class="table table-bordered" style="width:20% !important;" id="tapValueTable">
    
    </table>											
    </div>
    <button id="tapDown" class="btn btn-purple tapButton" type="button" style="width:20%; margin-top:-23px;"><i class="fa fa-chevron-down"></i></button>
    </div>
                                                        
                                                 </div>
                                                 <div class="tab-pane" id="specialist">
                                                    <p><?php echo get_phrase("select");?> <?php echo get_phrase('specialist'); ?></p>
                                                    <p>
                                                    <table id="workerList" align="center" class="table  table-striped table-bordered" >
                                                    <tbody>
                                                    <?php
                                                     $employees = $this->crud_model->get_All_List('employees','status', 'active');
                                                      foreach ($employees as $employee)
                                                      {?>
                                                    <tr><td id="worker<?php echo $employee['emp_id']; ?>" value="<?php echo $employee['emp_id']; ?>"><?php echo ucwords($employee['fname']).' '.ucwords($employee['lname']);?></td></tr>
                                                    <?php }?>
                                                    </tbody></table>
                                                    </p>
                                                   
                                                 </div>
                                              </div>
                                           </div>
                                        </div>
                                    </div>
                                    <!-- /BOX -->
                                </div>
                            </div>
                            </form>
                            <input type="hidden" id="ref_no" value="<?php echo $reference_no; ?>" />
                            <input type="hidden" id="trial_date" value="<?php echo $trial_date; ?>" />
                            <input type="hidden" id="delivery_date" value="<?php echo $delivery_date; ?>" />
                            <input type="hidden" id="order_date" value="<?php echo $order_date; ?>" />
                            <input type="hidden" id="customer_id" value="<?php echo $customer['id']; ?>" />
                            <input type="hidden" id="customer_name" value="<?php echo $customer['fname'].' '.$customer['lname']; ?>" />
                            <input type="hidden" id="item_id" value="" />
                            <input type="hidden" id="item_name" value="" />
                            <input type="hidden" id="pattern_id" value="" />
                            <input type="hidden" id="pattern_name" value="" />
                            <input type="hidden" id="style_id" value="" />
                            <input type="hidden" id="style_name" value="" />
                            <!-- /PAGE MAIN CONTENT -->
                            
                        </div><!-- /CONTENT-->
						</div>
    
<!--------------------------------- /ORDER FUNCTIONALITY ------------------------------->
						<div class="separator"></div>						
						<div class="row" id="btnGroup">
							<div class="col-md-12 box-container">
								<!-- BOX BORDER-->
								<div class="box border orange">
									<div class="box-title">
										<h4><i class="fa fa-bars"></i><?php echo get_phrase('action');?></h4>
										
									</div>
									<div class="box-body">
										<div class="row">
											<div class="col-md-3" id="btnAdd">
												<a class="btn btn-pink btn-icon input-block-level add" href="javascript:void(0);">
													<i class="fa fa-plus fa-4x"></i>
													<div><?php echo get_phrase('add');?></div>
													
												</a>
											</div>
											<div class="col-md-3">
												<a class="btn btn-primary btn-icon input-block-level pay" href="javascript:void(0);" disabled>
													<i class="fa fa-money fa-4x"></i>
													<div><?php echo get_phrase('pay');?></div>
													
												</a>
											</div>
											<div class="col-md-3">
												<a class="btn btn-danger btn-icon input-block-level cancel" href="javascript:void(0);">
													<i class="fa fa-times fa-4x"></i>
													<div><?php echo get_phrase('cancel');?></div>
													
												</a>
											</div>
											<div class="col-md-3">
												<a class="btn btn-success btn-icon input-block-level submit_order" href="javascript:void(0);" disabled>
													<i class="fa fa-save fa-4x"></i>
													<div><?php echo get_phrase('save');?></div>
													
												</a>
											</div>
										</div>
									</div>
								</div>
								<!-- /BOX BORDER -->
							</div>
							
						</div>
                        
						<!-- /PAGE MAIN CONTENT -->
						<div class="footer-tools">
							<span class="go-top">
								<i class="fa fa-chevron-up"></i> <?php echo get_phrase('top'); ?>
							</span>
						</div>
					</div><!-- /CONTENT-->
				</div>
			</div>
	</section>
    
    <div id="loading" style="display: none;">
        <div class="gmailLoader"> <img src="<?php echo base_url(); ?>assets/img/loaders/11.gif" alt="Loading ..." /> <?php echo get_phrase('loading'); ?> 
        </div>
    </div>
    
    
    
	
    <!-- UNI<!--/PAGE -->
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
    <!-- UNIFORM -->
	<script type="text/javascript" src="<?php echo base_url();?>/assets/js/uniform/jquery.uniform.min.js"></script>
    <!-- SELECT2 -->
	<script type="text/javascript" src="<?php echo base_url();?>/assets/js/select2/select2.min.js"></script>
    <!-- BOOTBOX -->
	<script type="text/javascript" src="<?php echo base_url();?>/assets/js/bootbox/bootbox.min.js"></script>
	<!-- CUSTOM SCRIPT -->
    <!-- GRITTER -->
	<script type="text/javascript" src="<?php echo base_url();?>/assets/js/gritter/js/jquery.gritter.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/script.js"></script>
	<script>
		jQuery(document).ready(function() {		
			App.setPage("<?php echo $page_name;?>");  //Set current page
			App.init(); //Initialise plugins and elements
		});
		var febricId = 1;
		var msFlVal = '';
		var workerId = '';
	 	var workerName = '';
		var suborderArray = {};
		var crtStyle = '';
		var crtOrder = '';
		<!------------------throughValue FUNCTION--------------------->
		function scaleValue(obj) {
		   var firstVal = (''+obj.id+"").replace('td', '')
		   var preVal = firstVal.slice(0, -1) || '0';
		   var nextVal = firstVal[(firstVal.length-1)];
		   var nowVal = preVal + "." + nextVal;
		   msFlVal = nowVal;
		}
		
		function callTools(obj){
	    	obj.value = msFlVal;
	    }
		
		function callWorker(obj){
			parent =($(obj).parent().parent().parent());
			obj.id = workerId + "_" + parent[0].id;
			obj.value = workerName;
	    }
		
		<!----------------- BROWSE CLOTH FOR STITCHING ------------->
		function browseCloth(ind){
			var index = ind;
			$("#modal_fabric").modal('show');
			$(".hover-content img").css('cursor','pointer');
			$(".hover-content img").click( function(){
				$("#cloth"+index).css('background-image','url('+this.src+')').css('background-size','100%').css('background-repeat','no-repeat');
				$("#febricId"+index).val($(this).attr('id'));
				$("#modal_fabric").modal('hide');
				index = '';
			});
		}
		
		function confirmSubOrder(obj)
		{
			Id = obj.id.split('confirm')[1];
			
			clothId = $("#febricId"+Id).val();
			clothLength = $("#febricQty"+Id).val();
			workersId =(($($($("#cloth"+Id)).find('input[name="workerId"]'))[0]).id).split('_')[0].split('worker')[1];
			workersName =(($($($("#cloth"+Id)).find('input[name="workerId"]'))[0]).value);
			payment = $("#febricPayment"+Id).val();
	
			var tepMeasurement = {};			
			$('#measurements input[type=text]').each(function (){
			  tepMeasurement[$(this).attr('name')] = $(this).val();
			});
			
			var ref_no 		= $("#ref_no").val();
			var trialData 	= $("#trial_date").val();
			var deliverDate = $("#delivery_date").val();
			var orderDate 	= $("#order_date").val();
			var remark 		= $('#remark').val();
			 
			if (clothLength==''){
				bootbox.alert("<?php echo get_phrase("please_enter_length"); ?>");
				return false;
			}
			
			if (payment==''){
				bootbox.alert("<?php echo get_phrase("please_enter_payment"); ?>");
				return false;
			}
			
			if (workerId==''){
				bootbox.alert("<?php echo get_phrase("please_choose_tailor"); ?>");
				return false;
			}
			
			
			if (clothId==''){
				bootbox.confirm("<?php echo get_phrase("is_cloth_given"); ?>", function(gotit){
				    if (gotit){
						$("#febricId"+Id).val('0');
						return true;
					}
		   			else{
						$('#bootbox-modal').hide();
						$('#browse'+Id).trigger('click');
					}
				   });
				   return false;	
			}
			
			 var subOrderDict = {};
			 subOrderDict['remark'] = remark || '';
			 subOrderDict['cloth_id'] = clothId || '0';
			 subOrderDict['cloth_length'] = clothLength || '0';
			 subOrderDict['worker_id'] = workersId || workerId;
			 subOrderDict['worker_name'] = workersName || workerName;
			 subOrderDict['measurement'] = tepMeasurement;
			 subOrderDict['payment'] = payment || '0';
			 subOrderDict['order_date'] = orderDate;
			 subOrderDict['trial_date'] = trialData;
			 subOrderDict['deliver_date'] = deliverDate;
			 subOrderDict['reference_no'] = $('#ref_no').val();
			 subOrderDict['customer_id'] = $('#customer_id').val();
			 subOrderDict['customer_name'] = $('#customer_name').val();
			 subOrderDict['item_id'] = $('#item_id').val();
			 subOrderDict['item_name'] = $('#item_name').val();
			 subOrderDict['pattern_id'] = $('#pattern_id').val();
			 subOrderDict['pattern_name'] = $('#pattern_name').val();
			 subOrderDict['style_id'] = $('#style_id').val();
			 subOrderDict['style_name'] = $('#style_name').val();
			 
			 // console.log(subOrderDict);
			 suborderArray[Id] = subOrderDict;
			 if($.isEmptyObject(suborderArray)==false){
			 	$("#febric"+Id).css('opacity', '0.8');
			 	$("#"+obj.id).val('Confirmed').text('Confirmed');
				$("#febric"+Id).find('input,button').attr('disabled','disabled');
				$('.submit_order').removeAttr('disabled');
			 	return true;
			 }
			 else
			 {
				return false;	 
			 }
			// console.log(suborderArray);	 
		}
		
		
		$(".submit_order").click(function (){
			//console.log(suborderArray);
			//console.log($.isEmptyObject(suborderArray));
			if($.isEmptyObject(suborderArray)==true){
				bootbox.alert("<?php echo get_phrase("confirm_atleast_one_order"); ?>");
				$(".submit_order").removeAttr('data-loading-text','<?php echo get_phrase('submitting'); ?>...');
				return false;	
			}
			else{
				$.ajax({
					dataType: 'json',
					type: "post",
					url: "<?php echo base_url();?>order/add",
					data: {'data': JSON.stringify(suborderArray)},
					beforeSend: function(){
						$('#loading').show();
						$(".submit_order").attr('id','btn-load-complete').attr('data-loading-text','<?php echo get_phrase('submitting'); ?>...');
						
					},
					success: function(data) {//return false;
						$("#ordSeperator").hide();
						gritter_show('<?php echo get_phrase('order');?>','<?php echo get_phrase('added_successfully');?>');
						$('#orderfunct').hide();
						$("#page").show();
						$('#loading').hide();
						$("#ordSeperator").show();
						$("#orderDetails").show();
						$("#rno").text(data[2]);
						$("#ref_no").val(data[2]);
						var ordval = '';
						ordval = '<div class="col-md-3"><div class="dashbox panel panel-default"><div class="panel-body"><div class="panel-left" style="color: black !important;"><div class="number">'+data[0]+'</div><div class="title"><?php echo get_phrase('total');?> <?php echo get_phrase('suborders');?></div></div><div class="panel-right"><div class="number">'+data[1]+'</div><div class="title"><?php echo get_phrase('total');?> <?php echo get_phrase('payment');?></div><span class="label label-warning"><input type="checkbox" id="schkid" value="'+data[3]+'" onclick="payInvoice('+data[3]+')"></span></div></div></div></div>';
						$("#ordData").append(ordval);
						subOrderDict= {};
						suborderArray={};
						$(".submit_order").attr('disabled', 'disabled');
						$('.add').removeAttr('disabled');
					}
				});
			}
		});
	function payInvoice(sid)
	{
		if(sid!='')
		{
			$(".add").attr('disabled', 'disabled');
			$('.pay').removeAttr('disabled');
			$('.pay').click(function (){
				window.location.href = '<?php echo base_url();?>admin/orders/view_invoice/'+sid;
			});
		}
	}
	function gritter_show(title, msg)
	{
		setTimeout(function () {
                var unique_id = $.gritter.add({
                    title:title,
                    text: msg,
                    image: '<?php echo base_url();?>assets/img/gritter/buy.png',
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
	}
	
	</script>
    <script type="text/javascript">
    $(document).ready(function() {
		var initVal = 0;
		showPattern();
		showStyle();
		showOrderFunct();
		putVal(0);
		//scaleValue();
		//increaseOrder();
		<!------------------CANCEL CLICK--------------------->
        $(".cancel").on("click", function(){
		window.location.href="<?php echo base_url();?>admin/new_order";	
		});
       
       
        $("form").submit(function() {
            if (an <= 1) {
                bootbox.alert("<?php echo get_phrase('no_sub_order'); ?>");
                return false;
            }
        });
		<!------------------PRODUCTS SHOWING-------------------->
		$(".add").click( function(){
			$('#takeFabric').empty();
			$('#orderDetails').hide();
			$('#ordSeperator').hide();
			$('#orderNumber').val('1');
			gender = $('#gender').val();
			$.ajax({
				type: "post",
				url: "<?php echo base_url();?>order/ajaxproducts",
				data: {'gender': gender, 'per_page': 'n'},
				dataType: "html",
				beforeSend: function(){
					$('#loading').show();
				},
				success: function(data) {
				  if(data!='no'){
					$('.add').attr('disabled','disabled');
					$('#page').hide();
					$('#proajax').show();
					$('#products').empty();
					$("#products").html(data);
					$('#loading').hide();
					
				  }else{
					  bootbox.alert("<?php echo get_phrase("no_item_found"); ?>");
					  $('#loading').hide();
					  return false;
				  }
				}
			}).done(function() {
				showPattern();
			});
		});
		
		<!------------------PATTERN SHOWING--------------------->
		function showPattern(){
		$('button[id^="prodbtn"]').click( function(){
			var prdID = $(this).val();
			var prdName = $(this).html();
			$.ajax({
				type: "post",
				url: "<?php echo base_url();?>order/ajaxpatterns",
				data: {'itemId': prdID},
				dataType: "html",
				beforeSend: function(){
					$('#loading').show();
				},
				success: function(data) {
				  if(data!='no'){
					$('#proajax').hide();
					$('#patternajax').show();
					$('#patterns').empty();
					$("#patterns").html(data);
					$('#loading').hide();
					$("#item_id").val(prdID);
					$("#item_name").val(prdName);
				  }else{
					  bootbox.alert("<?php echo get_phrase("no_pattern_found"); ?>");
					  $('#loading').hide();
					  return false;
				  }
				}
			}).done(function(){
				showStyle();
			});
			
		});}
		
		<!------------------STYLE SHOWING--------------------->
		function showStyle(){
		$('button[id^="patternbtn"]').click( function(){
			var patternID = $(this).val();
			var patternName = $(this).html();
			$.ajax({
				type: "post",
				url: "<?php echo base_url();?>order/ajaxstyles",
				data: {'patternID': patternID},
				dataType: "html",
				beforeSend: function(){
					$('#loading').show();
				},
				success: function(data) {
				  if(data!='no'){
					$('#patternajax').hide();//'slide',{direction:'right'},500
					$('#styleajax').show();
					$('#styles').empty();
					$("#styles").html(data);
					$('#loading').hide();
					$("#pattern_id").val(patternID);
					$("#pattern_name").val(patternName);
				  }else{
					  bootbox.alert("<?php echo get_phrase("no_style_found"); ?>");
					  $('#loading').hide();
					  return false;
				  }
				}
			}).done(function(){
				showOrderFunct();
			});
		});}
		
		<!------------------ORDER FUNCTIONALITY SHOWING--------------------->
		function showOrderFunct(){
		$('button[id^="stylebtn"]').click( function(){
			var styleID = $(this).val();
			var styleName = $(this).html();
			$.ajax({
				type: "post",
				url: "<?php echo base_url();?>order/ajaxmeasurement",
				data: {'styleID': styleID},
				dataType: "json",
				beforeSend: function(){
					$('#loading').show();
				},
				success: function(data) {
					$('#styleajax').hide();
					$('#orderfunct').show();
					$('#measurements').empty();
					$("#style_id").val(styleID);
					$("#style_name").val(styleName);
					//console.log(data);
					$.each(data,function(index,value){
						var newDiv = '<div class="form-group"><label class="col-sm-3 control-label">'+value["measurement_title"]+' </label><div class="col-sm-9"><div class="input-group"><input type="text" name="'+value["id"]+'" onclick="callTools(this)" class="form-control text-center input-sm" placeholder="'+value["measurement_title"]+'" value="" /><span class="input-group-addon">'+value["measurement_unit"]+'</span></div></div></div>';
						$("#measurements").append(newDiv);
					});
					$('#loading').hide();
				}
			}).done(function (){
			orderFebric();
		  });
		});}
		
		<!----------------- INCREASE NUMBER OF ORDER ------------->
	    $('#orderAdd').click(function(){
		 $('#orderSub').prop("disabled", false);
          input = $('#orderNumber');
		  if ( input.attr('max') == undefined || parseInt(input.val()) < parseInt(input.attr('max')) ) {
				input.val(parseInt(input.val())+1);
				orderFebric();
			}else{
				$(this).prop("disabled", true);
			}
	     });
		 
		<!----------------- DECREASE NUMBER OF ORDER ------------->		 
     	$('#orderSub').click(function(){
		  $('#orderAdd').prop("disabled", false);
          input = $('#orderNumber');
		   if ( input.attr('min') == undefined || parseInt(input.val()) > parseInt(input.attr('min')) ) {
				input.val(parseInt(input.val())-1);
				orderFebricRemove();
			}else{
				$(this).prop("disabled", true);
			}
	     });
		
	    <!----------------- ADD NUMBER OF ORDER IN SAME MEASUREMENT ------------->
		function orderFebric(){
			var ordHtml = '';
			var counter = Number($('#orderNumber').val());
			var ordHtml = '<div class="box border blue" id="febric'+counter+'"><div class="box-title"><h4><i class="fa fa-tasks"></i><?php echo get_phrase('order'); ?> '+counter+'</h4> <div class="tools hidden-xs"><a href="javascript:;" class="reload"><button type="button" id="browse'+counter+'" onclick="browseCloth('+counter+');" class="btn btn-xs btn-warning"><i class="fa fa-folder-open-o"></i> <?php echo get_phrase('browse'); ?> <?php echo get_phrase('cloth'); ?></button></a></div></div><div class="box-body"><div id="cloth'+counter+'" class="well well-sm"><div class="form-group"><label class="col-sm-3 control-label"><?php echo get_phrase('use'); ?> <?php echo get_phrase('in'); ?> <?php echo get_phrase('stitch'); ?></label><div class="col-sm-9"><div class="input-group"><input type="text" id="febricQty'+counter+'" onclick="callTools(this)" readonly class="form-control text-center input-sm" placeholder="<?php echo get_phrase('use'); ?> <?php echo get_phrase('in'); ?> <?php echo get_phrase('stitch'); ?>" /><span class="input-group-addon"><?php echo get_phrase('mtr'); ?></span></div></div></div><div class="form-group"><label class="col-sm-3 control-label"><?php echo get_phrase('define'); ?> <?php echo get_phrase('payment'); ?></label><div class="col-sm-9"><div class="input-group"><input type="text" id="febricPayment'+counter+'" class="form-control text-center input-sm" placeholder="<?php echo get_phrase('define'); ?> <?php echo get_phrase('payment'); ?>" /><span class="input-group-addon"><?php echo CURRENCY; ?></span></div></div></div><div class="form-group"><label class="col-sm-3 control-label"><?php echo get_phrase('order'); ?> <?php echo get_phrase('allot'); ?> <?php echo get_phrase('to'); ?></label><div class="col-sm-9"> <input class="form-control input-sm" id="worker" type="text" onclick="callWorker(this)" name="workerId" readonly placeholder="<?php echo get_phrase('order'); ?> <?php echo get_phrase('allot'); ?> <?php echo get_phrase('to'); ?>"></div></div><div class="form-group"><label class="col-sm-3 control-label">&nbsp;</label><div class="col-sm-9"><button id="confirm'+counter+'" onclick="confirmSubOrder(this)" class="btn btn-xs btn-info" data-complete-text="<?php echo get_phrase('confirmed'); ?>" data-loading-text="<?php echo get_phrase('confirming'); ?>..." type="button"><?php echo get_phrase('confirm'); ?></button><input type="hidden" id="febricId'+counter+'" value=""></div></div></div></div></div>';
			
			$("#takeFabric").append(ordHtml);
	
		}
		
 		<!-----------------REMOVE NUMBER OF ORDER IN SAME MEASUREMENT ------------->
		function orderFebricRemove(){
			var orderHtml = '';
			var counter = Number($('#orderNumber').val()) ;
			$("#febric"+(counter + 1)).remove();
		}
		
		<!-----------------ON CLICK WORKER LIST TABLE  -------------> 
		$("#workerList td").click(function(){
	         workerName = $("#"+this.id).html();
			 workerId = this.id;
		});
		<!-----------------SCALE METER -------------> 
		
		function putVal(inValue){
			var ht = '';
			if(inValue < 0){inValue = 0;initVal = 0;}
			
			ht += "<tr><td style='font-size:15px' id='td"+inValue/10+"' onclick='scaleValue(this)'>----"+inValue/10+"</td></tr>";
			
			for(i=inValue+1;i<=inValue + 10;i++)
			{
				var temp = i-inValue;
				if(i%5 == 0)
				{
					if(i%10 == 0)
					{
						ht += '<tr><td id="td'+i+'" onclick="scaleValue(this)">----'+i/10+'</td></tr>';
					}
					else
					{
						ht += '<tr><td id="td'+i+'" onclick="scaleValue(this)">--'+5+'</td></tr>';
					}
				}
				else
				{
					ht += '<tr><td id="td'+i+'" onclick="scaleValue(this)">'+(''+temp)[0]+'</td></tr>';
				}
			}
				
			
			$("#tapValueTable").html(ht);
			
			<!---------changing of hover effect on table rows-------------->
			$("#tapValueTable tr").mouseenter(function(){$(this).css('background', '#dddddd')});
			$("#tapValueTable tr").mouseleave(function(){$(this).css('background', 'none')});
			
			}
		
			
			
		   <!---------- following function for increase and decrease  tap value ------------->	
		   $("#tapUp").click(function(event){initVal += 10;putVal(initVal);});
		   $("#tapDown").click(function(){initVal -= 10;putVal(initVal);});	
		   /**************************************************************/

    });
	
	

<?php if (DTIME == "yes") { ?>
 function jeettime() {
	now = new Date();
	var month_names = new Array( );
	month_names[month_names.length] = "January";
	month_names[month_names.length] = "February";
	month_names[month_names.length] = "March";
	month_names[month_names.length] = "April";
	month_names[month_names.length] = "May";
	month_names[month_names.length] = "June";
	month_names[month_names.length] = "July";
	month_names[month_names.length] = "August";
	month_names[month_names.length] = "September";
	month_names[month_names.length] = "October";
	month_names[month_names.length] = "November";
	month_names[month_names.length] = "December";
	var day_names = new Array( );
	day_names[day_names.length] = "Sunday";
	day_names[day_names.length] = "Monday";
	day_names[day_names.length] = "Tuesday";
	day_names[day_names.length] = "Wednesday";
	day_names[day_names.length] = "Thursday";
	day_names[day_names.length] = "Friday";
	day_names[day_names.length] = "Saturday";
	hour = now.getHours();
	min = now.getMinutes();
	sec = now.getSeconds();
	if (min <= 9) {
		min = "0" + min;
	}
	if (sec <= 9) {
		sec = "0" + sec;
	}
	if (hour > 12) {
		hour = hour - 12;
		add = "PM";
	}
	else {
		hour = hour;
		add = "AM";
	}
	if (hour == 12) {
		add = "PM";
	}
	time = day_names[now.getDay()] + ", " + now.getDate() + " " + month_names[now.getMonth()] + " " + now.getFullYear() + ", " + ((hour <= 9) ? "0" + hour : hour) + ":" + min + ":" + sec + " " + add;
	if (document.getElementById) {
		document.getElementById('theTime').innerHTML = time;
	}
	else if (document.layers) {
		document.layers.theTime.document.write(time);
		document.layers.theTime.document.close();
	}
	setTimeout("jeettime()", 1000);
}
 window.onload = jeettime;
<?php } ?>
</script>
	<!-- /JAVASCRIPTS -->
</body>
</html>