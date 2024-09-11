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
					<!-- BEGIN NOTIFICATION DROPDOWN -->
					<?php  if($roles=='admin'): $cP = $this->order_model->productAlertsNotifications('cloth_products');
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
								$name = ($ap->name) ? $ap->name : $ap->cloth_name;
								if($ap->title){$label = 'danger';}
								else{$label = 'warning';}
								?>
							<li>
								<a href="<?php echo base_url();?><?php echo $roles;?>/product_alert">
									<span class="label label-<?php echo $label; ?>"><i class="fa fa-exclamation-triangle"></i></span>
									<span class="body">
										<span class="message"><?php echo ucwords($name);?>.</span>
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
					<?php }endif;?>
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
								<a href="<?php echo base_url();?><?php echo $roles;?>/calendar">
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
								<a href="<?php echo base_url();?><?php echo $roles;?>/calendar"> &nbsp;<i class="fa fa-arrow-circle-right"></i></a>
							</li>
						</ul>
					</li>
					
					<?php }?>
					<!-- END INBOX DROPDOWN -->
					<!-- BEGIN TODO DROPDOWN -->
					<?php if($roles=='admin'):$progressData = $this->order_model->getSubOrderProgress();
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
					<?php }endif;?>
					<!-- END TODO DROPDOWN -->
                   <!-- BEGIN SITE CONFIGURATION DROPDOWN --> 
                    <?php if($roles=='admin'):?>
                    	<li class="dropdown hidden-xs">
						<a href="<?=base_url();?>admin/calendar"  class="dropdown-toggle">
                        <i class="fa fa-calendar"></i>
                        <span class="name"><?php echo get_phrase('calendar');?></span>
						</a>
					</li>
                    <li class="dropdown" id="header-user">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<i class="fa fa-cogs"></i>		
					<span class="username"><?php echo get_phrase('configuration');?></span>
							<i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu">
                            <li><a href="<?=base_url();?><?=$roles?>/manage_languages"><i class="fa fa-flag"></i> <?php echo get_phrase('manage_languages');?></a></li>
							<li><a  href="<?=base_url();?><?=$roles?>/system_settings"><i class="fa fa-cog"></i> <?php echo get_phrase('site_configuration');?></a></li>
						</ul>
					</li>
                    <?php endif;?>
                    
                    <!-- END SITE CONFIGURATION DROPDOWN -->
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<li class="dropdown user" id="header-user">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img alt="" src="<?php echo $this->crud_model->get_image_url('users',$userdata->image);?>" />
					<span class="username"><?php echo ucwords($userdata->name)?></span>
							<i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu">
							<li><a href="<?=base_url();?><?=$roles?>/logs"><i class="fa fa-sign-in"></i> <?php echo get_phrase('log');?> <?php echo get_phrase('history');?></a></li>
							<li><a href="<?=base_url();?><?=$roles?>/change_password"><i class="fa fa-cog"></i> <?php echo get_phrase('change_password');?></a></li>
							<li><a href="<?php echo base_url()?>home/logout"><i class="fa fa-power-off"></i> <?php echo get_phrase('log_out');?></a></li>
						</ul>
					</li>
					
					<!-- END USER LOGIN DROPDOWN -->
				</ul>
				<!-- END TOP NAVIGATION MENU -->
		</div>
		<!-- TEAM STATUS -->
		<!--<div class="container team-status" id="team-status">
		  <div id="scrollbar">
			<div class="handle">
			</div>
		  </div>
		  <div id="teamslider">
			  <ul class="team-list">
				<li class="current">
				  <a href="javascript:void(0);">
				  <span class="image">
					  <img src="assets/img/avatars/avatar3.jpg" alt="" />
				  </span>
				  <span class="title">
					You
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
					<span class="status">
						<div class="field">
							<span class="badge badge-green">6</span> completed
							<span class="pull-right fa fa-check"></span>
						</div>
						<div class="field">
							<span class="badge badge-orange">3</span> in-progress
							<span class="pull-right fa fa-adjust"></span>
						</div>
						<div class="field">
							<span class="badge badge-red">1</span> pending
							<span class="pull-right fa fa-list-ul"></span>
						</div>
				    </span>
				  </a>
				</li>
				<li>
				  <a href="javascript:void(0);">
				  <span class="image">
					  <img src="assets/img/avatars/avatar1.jpg" alt="" />
				  </span>
				  <span class="title">
					Max Doe
				  </span>
					<div class="progress">
					  <div class="progress-bar progress-bar-success" style="width: 15%">
						<span class="sr-only">35% Complete (success)</span>
					  </div>
					  <div class="progress-bar progress-bar-warning" style="width: 40%">
						<span class="sr-only">20% Complete (warning)</span>
					  </div>
					  <div class="progress-bar progress-bar-danger" style="width: 20%">
						<span class="sr-only">10% Complete (danger)</span>
					  </div>
					</div>
					<span class="status">
						<div class="field">
							<span class="badge badge-green">2</span> completed
							<span class="pull-right fa fa-check"></span>
						</div>
						<div class="field">
							<span class="badge badge-orange">8</span> in-progress
							<span class="pull-right fa fa-adjust"></span>
						</div>
						<div class="field">
							<span class="badge badge-red">4</span> pending
							<span class="pull-right fa fa-list-ul"></span>
						</div>
				    </span>
				  </a>
				</li>
				<li>
				  <a href="javascript:void(0);">
				  <span class="image">
					  <img src="assets/img/avatars/avatar2.jpg" alt="" />
				  </span>
				  <span class="title">
					Jane Doe
				  </span>
					<div class="progress">
					  <div class="progress-bar progress-bar-success" style="width: 65%">
						<span class="sr-only">35% Complete (success)</span>
					  </div>
					  <div class="progress-bar progress-bar-warning" style="width: 10%">
						<span class="sr-only">20% Complete (warning)</span>
					  </div>
					  <div class="progress-bar progress-bar-danger" style="width: 15%">
						<span class="sr-only">10% Complete (danger)</span>
					  </div>
					</div>
					<span class="status">
						<div class="field">
							<span class="badge badge-green">10</span> completed
							<span class="pull-right fa fa-check"></span>
						</div>
						<div class="field">
							<span class="badge badge-orange">3</span> in-progress
							<span class="pull-right fa fa-adjust"></span>
						</div>
						<div class="field">
							<span class="badge badge-red">4</span> pending
							<span class="pull-right fa fa-list-ul"></span>
						</div>
				    </span>
				  </a>
				</li>
				<li>
				  <a href="javascript:void(0);">
				  <span class="image">
					  <img src="assets/img/avatars/avatar4.jpg" alt="" />
				  </span>
				  <span class="title">
					Ellie Doe
				  </span>
					<div class="progress">
					  <div class="progress-bar progress-bar-success" style="width: 5%">
						<span class="sr-only">35% Complete (success)</span>
					  </div>
					  <div class="progress-bar progress-bar-warning" style="width: 48%">
						<span class="sr-only">20% Complete (warning)</span>
					  </div>
					  <div class="progress-bar progress-bar-danger" style="width: 27%">
						<span class="sr-only">10% Complete (danger)</span>
					  </div>
					</div>
					<span class="status">
						<div class="field">
							<span class="badge badge-green">1</span> completed
							<span class="pull-right fa fa-check"></span>
						</div>
						<div class="field">
							<span class="badge badge-orange">6</span> in-progress
							<span class="pull-right fa fa-adjust"></span>
						</div>
						<div class="field">
							<span class="badge badge-red">2</span> pending
							<span class="pull-right fa fa-list-ul"></span>
						</div>
				    </span>
				  </a>
				</li>
				<li>
				  <a href="javascript:void(0);">
				  <span class="image">
					  <img src="assets/img/avatars/avatar5.jpg" alt="" />
				  </span>
				  <span class="title">
					Lisa Doe
				  </span>
					<div class="progress">
					  <div class="progress-bar progress-bar-success" style="width: 21%">
						<span class="sr-only">35% Complete (success)</span>
					  </div>
					  <div class="progress-bar progress-bar-warning" style="width: 20%">
						<span class="sr-only">20% Complete (warning)</span>
					  </div>
					  <div class="progress-bar progress-bar-danger" style="width: 40%">
						<span class="sr-only">10% Complete (danger)</span>
					  </div>
					</div>
					<span class="status">
						<div class="field">
							<span class="badge badge-green">4</span> completed
							<span class="pull-right fa fa-check"></span>
						</div>
						<div class="field">
							<span class="badge badge-orange">5</span> in-progress
							<span class="pull-right fa fa-adjust"></span>
						</div>
						<div class="field">
							<span class="badge badge-red">9</span> pending
							<span class="pull-right fa fa-list-ul"></span>
						</div>
				    </span>
				  </a>
				</li>
				<li>
				  <a href="javascript:void(0);">
				  <span class="image">
					  <img src="assets/img/avatars/avatar6.jpg" alt="" />
				  </span>
				  <span class="title">
					Kelly Doe
				  </span>
					<div class="progress">
					  <div class="progress-bar progress-bar-success" style="width: 45%">
						<span class="sr-only">35% Complete (success)</span>
					  </div>
					  <div class="progress-bar progress-bar-warning" style="width: 21%">
						<span class="sr-only">20% Complete (warning)</span>
					  </div>
					  <div class="progress-bar progress-bar-danger" style="width: 10%">
						<span class="sr-only">10% Complete (danger)</span>
					  </div>
					</div>
					<span class="status">
						<div class="field">
							<span class="badge badge-green">6</span> completed
							<span class="pull-right fa fa-check"></span>
						</div>
						<div class="field">
							<span class="badge badge-orange">3</span> in-progress
							<span class="pull-right fa fa-adjust"></span>
						</div>
						<div class="field">
							<span class="badge badge-red">1</span> pending
							<span class="pull-right fa fa-list-ul"></span>
						</div>
				    </span>
				  </a>
				</li>
				<li>
				  <a href="javascript:void(0);">
				  <span class="image">
					  <img src="assets/img/avatars/avatar7.jpg" alt="" />
				  </span>
				  <span class="title">
					Jessy Doe
				  </span>
					<div class="progress">
					  <div class="progress-bar progress-bar-success" style="width: 7%">
						<span class="sr-only">35% Complete (success)</span>
					  </div>
					  <div class="progress-bar progress-bar-warning" style="width: 30%">
						<span class="sr-only">20% Complete (warning)</span>
					  </div>
					  <div class="progress-bar progress-bar-danger" style="width: 10%">
						<span class="sr-only">10% Complete (danger)</span>
					  </div>
					</div>
					<span class="status">
						<div class="field">
							<span class="badge badge-green">1</span> completed
							<span class="pull-right fa fa-check"></span>
						</div>
						<div class="field">
							<span class="badge badge-orange">6</span> in-progress
							<span class="pull-right fa fa-adjust"></span>
						</div>
						<div class="field">
							<span class="badge badge-red">2</span> pending
							<span class="pull-right fa fa-list-ul"></span>
						</div>
				    </span>
				  </a>
				</li>
				<li>
				  <a href="javascript:void(0);">
				  <span class="image">
					  <img src="assets/img/avatars/avatar8.jpg" alt="" />
				  </span>
				  <span class="title">
					Debby Doe
				  </span>
					<div class="progress">
					  <div class="progress-bar progress-bar-success" style="width: 70%">
						<span class="sr-only">35% Complete (success)</span>
					  </div>
					  <div class="progress-bar progress-bar-warning" style="width: 20%">
						<span class="sr-only">20% Complete (warning)</span>
					  </div>
					  <div class="progress-bar progress-bar-danger" style="width: 5%">
						<span class="sr-only">10% Complete (danger)</span>
					  </div>
					</div>
					<span class="status">
						<div class="field">
							<span class="badge badge-green">13</span> completed
							<span class="pull-right fa fa-check"></span>
						</div>
						<div class="field">
							<span class="badge badge-orange">7</span> in-progress
							<span class="pull-right fa fa-adjust"></span>
						</div>
						<div class="field">
							<span class="badge badge-red">1</span> pending
							<span class="pull-right fa fa-list-ul"></span>
						</div>
				    </span>
				  </a>
				</li>
			  </ul>
			</div>
		  </div>-->
		<!-- /TEAM STATUS -->
	</header>
    <?php
    /*echo "<pre>";
print_r($this->session->userdata);*/
?>
