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
								<a href="<?=base_url();?>index.php?admin/dashboard">
								<i class="fa fa-tachometer fa-fw"></i> <span class="menu-text">Dashboard</span>
								<span class="<?php if($page_name == 'dashboard')echo 'selected';?>"></span>
								</a>					
							</li>
                            
                            <li class="has-sub <?php if($page_name == 'new_employee' || $page_name == 'employees_information')echo 'active';?>">
								<a href="javascript:;" class="">
								<i class="fa fa-users fa-fw"></i> <span class="menu-text">Employees<span class="badge pull-right">1</span></span>
								<span class="arrow"></span>
								</a>
								<ul class="sub">
									<li><a class="" href="<?php echo base_url();?>index.php?admin/new_employee"><span class="sub-menu-text <?php if($page_name=='new_employee')echo 'selected';?>">New Employee</span></a></li>
                                    
                                    <li><a class="" href="<?php echo base_url();?>index.php?admin/employees_information"><span class="sub-menu-text <?php if($page_name=='employees_information')echo 'selected';?>">Employees Information</span></a></li>
								</ul>
							</li>
							
							<li class="has-sub <?php if($page_name == 'system_settings')echo 'active';?>">
								<a href="javascript:;" class="">
								<i class="fa fa-cogs fa-fw"></i> <span class="menu-text">Settings<span class="badge pull-right">1</span></span>
								<span class="arrow"></span>
								</a>
								<ul class="sub">
									<li><a class="" href="<?php echo base_url();?>index.php?admin/system_settings"><span class="sub-menu-text <?php if($page_name=='system_settings')echo 'selected';?>">General Settings</span></a></li>
								</ul>
							</li>
						</ul>
						<!-- /SIDEBAR MENU -->
					</div>
				</div>