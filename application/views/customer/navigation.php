<div id="sidebar" class="sidebar">
					<div class="sidebar-menu nav-collapse">
						<div class="divide-20"></div>
						<!-- SEARCH BAR -->
						<div id="search-bar">
							<input class="search" type="text" placeholder="Search"><i class="fa fa-search search-icon"></i>
						</div>
						<!-- /SEARCH BAR -->
						
						<!-- SIDEBAR QUICK-LAUNCH -->
						<!-- <div id="quicklaunch">
						<!-- /SIDEBAR QUICK-LAUNCH -->
						
						<!-- SIDEBAR MENU -->
						<ul>
							<li class="<?php if($page_name == 'dashboard')echo 'active';?>">
								<a href="<?php echo base_url().$roles;?>/dashboard">
								<i class="fa fa-tachometer fa-fw"></i> <span class="menu-text"><?php echo get_phrase('dashboard');?></span>
								<span class="<?php if($page_name == 'dashboard')echo 'selected';?>"></span>
								</a>					
							</li>
                            <li class="has-sub <?php if($page_name == 'orders' || 
														$page_name == 'completed_orders')echo 'active';?>">
								<a href="javascript:;" class=""><i class="fa fa-tasks fa-fw"></i> <span class="menu-text"><?php echo get_phrase('orders');?></span><span class="arrow"></span></a>
                                
								<ul class="sub">
																		
									<li class="<?php if($page_name=='orders')echo 'current';?>"><a  href="<?php echo base_url();?><?php echo $roles;?>/orders"><span class="sub-menu-text"><i class="fa fa-bars fa-fw"></i> <?php echo get_phrase('inprocess');?> <?php echo get_phrase('orders');?></span></a></li>
                                    
                                    <li class="<?php if($page_name=='completed_orders')echo 'current';?>"><a href="<?php echo base_url();?><?php echo $roles;?>/completed_orders"><span class="sub-menu-text"><i class="fa fa-tasks fa-fw"></i> <?php echo get_phrase('completed');?> <?php echo get_phrase('orders');?></span></a></li>
								</ul>
							</li>
														
							
							<li class="<?php if($page_name == 'email')echo 'active';?>">
								<a href="<?php echo base_url().$roles;?>/email">
								<i class="fa fa-envelope fa-fw"></i> <span class="menu-text"><?php echo get_phrase('email');?></span>
								</a>					
							</li>
							
							<li class="<?php if($page_name == 'calendar')echo 'active';?>">
								<a href="<?php echo base_url().$roles;?>/calendar">
								<i class="fa fa-calendar fa-fw"></i> <span class="menu-text"><?php echo get_phrase('calendar');?></span>
								</a>					
							</li>
                            
                            <li class="<?php if($page_name == 'change_password')echo 'active';?>">
								<a href="<?php echo base_url().$roles;?>/change_password">
								<i class="fa fa-cog fa-fw"></i> <span class="menu-text"><?php echo get_phrase('change_password');?></span>
								</a>					
							</li>
                            
                            <li>
								<a href="<?php echo base_url();?>home/logout">
								<i class="fa fa-power-off fa-fw"></i> <span class="menu-text"><?php echo get_phrase('log_out');?></span>
								<span class=""></span>
								</a>					
							</li>
                            
                            
							
							<!--<li class="has-sub <?php if($page_name == 'system_settings')echo 'active';?>">
								<a href="javascript:;" class="">
								<i class="fa fa-cogs fa-fw"></i> <span class="menu-text">Settings<span class="badge pull-right">1</span></span>
								<span class="arrow"></span>
								</a>
								<ul class="sub">
									<li><a class="" href="<?php echo base_url();?>index.php?admin/system_settings"><span class="sub-menu-text <?php if($page_name=='system_settings')echo 'selected';?>">General Settings</span></a></li>
								</ul>
							</li>-->
						</ul>
						<!-- /SIDEBAR MENU -->
					</div>
				</div>