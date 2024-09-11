<div id="sidebar" class="sidebar">
					<div class="sidebar-menu nav-collapse">
						<div class="divide-20"></div>
						<!-- SEARCH BAR -->
						<div id="search-bar">
							<input class="search" type="text" placeholder="<?php echo get_phrase('search');?>"><i class="fa fa-search search-icon"></i>
						</div>
						<!-- /SEARCH BAR -->
						
						<!-- SIDEBAR QUICK-LAUNCH -->
						<!-- <div id="quicklaunch">
						<!-- /SIDEBAR QUICK-LAUNCH -->
						
						<!-- SIDEBAR MENU -->
						<ul>
							<li class="<?php if($page_name == 'dashboard')echo 'active';?>">
								<a href="<?=base_url();?><?=$roles?>/dashboard">
								<i class="fa fa-tachometer fa-fw"></i> <span class="menu-text"><?php echo get_phrase('dashboard');?></span>
								<span class="<?php if($page_name == 'dashboard')echo 'selected';?>"></span>
								</a>					
							</li>
                            
                            <li class="has-sub <?php if($page_name == 'new_product' || $page_name == 'list_products' || $page_name == 'new_cloth_product' || $page_name == 'list_cloth_products')echo 'active';?>">
								<a href="javascript:;" class="">
								<i class="fa fa-barcode fa-fw"></i> <span class="menu-text"><?php echo get_phrase('products');?><!--<span class="badge pull-right">1</span>--></span>
								<span class="arrow"></span>
								</a>
								<ul class="sub">
									<li class="<?php if($page_name=='new_product')echo 'current';?>"><a  href="<?=base_url();?><?=$roles?>/new_product"><span class="sub-menu-text"><?php echo get_phrase('new');?> <?php echo get_phrase('product');?></span></a></li>
                                    
                                    <li class="<?php if($page_name=='list_products')echo 'current';?>"><a  href="<?=base_url();?><?=$roles?>/list_products"><span class="sub-menu-text"><?php echo get_phrase('list');?> <?php echo get_phrase('products');?></span></a></li>
                                    
                                    <li class="<?php if($page_name=='new_cloth_product')echo 'current';?>"><a  href="<?=base_url();?><?=$roles?>/new_cloth_product"><span class="sub-menu-text"><?php echo get_phrase('new');?> <?php echo get_phrase('cloth');?> <?php echo get_phrase('product');?></span></a></li>
                                    
                                    <li class="<?php if($page_name=='list_cloth_products')echo 'current';?>"><a  href="<?=base_url();?><?=$roles?>/list_cloth_products"><span class="sub-menu-text"><?php echo get_phrase('list');?> <?php echo get_phrase('cloth');?> <?php echo get_phrase('products');?></span></a></li>
								</ul>
							</li>
                            
                            
                            
                            <li class="has-sub <?php if($page_name == 'new_order' || 
												$page_name == 'list_orders'		||
												$page_name == 'view_suborder' ||
												$page_name == 'order_payment' ||
												$page_name == 'view_invoice' ||
												$page_name == 'show_invoice' ||
												$page_name == 'work_order' ||
												$page_name == 'track_suborder' ||
												$page_name == 'search_orders' ||$page_name == 'tailor' || $page_name == 'delivered_orders' ||
											   $page_name == 'track_delivered_suborder')echo 'active';?>">
								<a href="javascript:;" class="">
								<i class="fa fa-tasks fa-fw"></i> <span class="menu-text"><?php echo get_phrase('order');?><!--<span class="badge pull-right">1</span>--></span>
								<span class="arrow"></span>
								</a>
								<ul class="sub">
                                <!--<li class="has-sub-sub <?php if($page_name=='tailor') echo 'current';?>">
									
									<a href="javascript:;" class=""><i class="fa fa-thumbs-o-up fa-fw"></i><span class="sub-menu-text"><?php echo get_phrase('all_in_one_order');?></span>
                                    <span class="arrow"></span></a>
									
									<ul class="sub-sub" style="display: none;">
                                        <li><a href="<?=base_url();?><?=$roles?>/tailor">
                                        <span class="sub-menu-text"> <?php echo get_phrase('new');?> <?php echo get_phrase('order');?></span></a></li>
                                        <li><a href="<?=base_url();?><?=$roles?>/tailor">
                                        <span class="sub-menu-text"> <?php echo get_phrase('edit');?> <?php echo get_phrase('order');?></span></a></li>  
                                     </ul>
                              
                              		</li>
									<li class="<?php if($page_name == 'tailor')echo 'active';?>">
								<a href="<?=base_url();?><?=$roles?>/tailor">
								<i class="fa fa-thumbs-o-up fa-fw"></i> <span class="menu-text"><?php echo get_phrase('all_in_one_order');?></span>
								<span class="<?php if($page_name == 'tailor')echo 'selected';?>"></span>
								</a>					
							</li>-->
                            		<li class="<?php if($page_name=='tailor')echo 'current';?>"><a  href="<?=base_url();?><?=$roles?>/tailor" ><i class="fa fa-plus fa-fw"></i><span class="sub-menu-text"><?php echo get_phrase('new');?> <?php echo get_phrase('order');?></span></a></li>
                                    
                                    <li class="<?php if($page_name=='list_orders' || $page_name=='view_suborder')echo 'current';?>"><a  href="<?=base_url();?><?=$roles?>/list_orders"><i class="fa fa-list fa-fw"></i> <span class="sub-menu-text"><?php echo get_phrase('list');?> <?php echo get_phrase('orders');?></span></a></li>
                                   
                                  <!--  <li class="<?php if($page_name=='track_order')echo 'current';?>"><a  href="<?=base_url();?><?=$roles?>/track_order"><i class="fa fa-eye fa-fw"></i> <span class="sub-menu-text"><?php echo get_phrase('track');?> <?php echo get_phrase('order');?></span></a></li>-->
                                    
                                    <li class="has-sub-sub<?php if($page_name=='search_orders_details' || $page_name=='track_order'||
													$page_name=='view_suborder_details')echo 'current';?>">
									
									<a href="javascript:;" class=""><i class="fa fa-list-alt fa-fw"></i><span class="sub-menu-text"><?php echo get_phrase('track');?> <?php echo get_phrase('order');?></span>
                                    <span class="arrow"></span></a>
									
									<ul class="sub-sub" style="display: none;">
                                        <li><a class="" href="<?=base_url();?><?=$roles?>/track_order/search_orders"><span class="sub-menu-text"> <?php echo get_phrase('search');?> <?php echo get_phrase('orders');?></span></a></li>
                                        <li><a class="" href="<?=base_url();?><?=$roles?>/track_order/delivered_orders"><span class="sub-sub-menu-text"> <?php echo get_phrase('delivered');?> <?php echo get_phrase('orders');?></span></a>
                              			</li>     
                                     </ul>
                              
                              		</li>
                                    
                                    <!--<li class="<?php if($page_name=='return_order')echo 'current';?>"><a  href="<?=base_url();?><?=$roles?>/return_order"><i class="fa fa-list-alt fa-fw"></i> <span class="sub-menu-text"><?php echo get_phrase('return');?> <?php echo get_phrase('order');?></span></a></li>-->
                                    
                                    <li class="<?php if($page_name=='order_payment' || $page_name == 'view_invoice' || $page_name == 'work_order')echo 'current';?>"><a  href="<?=base_url();?><?=$roles?>/order_payment"><i class="fa fa-money fa-fw"></i> <span class="sub-menu-text"><?php echo get_phrase('order');?> <?php echo get_phrase('payment');?></span></a></li>
                                    
                                    <li class="<?php if($page_name=='order_settings')echo 'current';?>"><a  href="<?=base_url();?><?=$roles?>/order_settings"><i class="fa fa-cog fa-fw"></i> <span class="sub-menu-text"><?php echo get_phrase('order');?> <?php echo get_phrase('configuration');?></span></a></li>
								</ul>
							</li>
                            
                            <li class="has-sub <?php if($page_name == 'new_purchase' || $page_name == 'list_purchases')echo 'active';?>">
								<a href="javascript:;" class="">
								<i class="fa fa-star fa-fw"></i> <span class="menu-text"><?php echo get_phrase('purchases');?><!--<span class="badge pull-right">1</span>--></span>
								<span class="arrow"></span>
								</a>
								<ul class="sub">
									<li class="<?php if($page_name=='new_product')echo 'current';?>"><a  href="<?=base_url();?><?=$roles?>/purchases/create"><span class="sub-menu-text"><?php echo get_phrase('new');?> <?php echo get_phrase('purchases');?></span></a></li>
                                    
                                    <li class="<?php if($page_name=='list_purchases')echo 'current';?>"><a  href="<?=base_url();?><?=$roles?>/list_purchases"><span class="sub-menu-text"><?php echo get_phrase('list');?> <?php echo get_phrase('purchases');?></span></a></li>
                                    
                                    <li class="<?php if($page_name=='cloth_purchase')echo 'current';?>"><a  href="<?=base_url();?><?=$roles?>/cloth_purchase"><span class="sub-menu-text"><?php echo get_phrase('cloth');?> <?php echo get_phrase('purchases');?></span></a></li>
                                    
                                    
								</ul>
							</li>
                            
                            <li class="has-sub <?php 
								if($page_name == 'new_customer' ||
								$page_name == 'customers_information' ||
								$page_name == 'new_employee' || 
								$page_name == 'employees_information' ||
								$page_name == 'employees_bonus' ||
								$page_name == 'new_supplier' || 
								$page_name == 'suppliers_information')echo 'active';?>">
								<a href="javascript:;" class="">
								<i class="fa fa-users fa-fw"></i> <span class="menu-text"><?php echo get_phrase('peoples');?><!--<span class="badge pull-right">1</span>--></span>
								<span class="arrow"></span>
								</a>
								<ul class="sub">
									<li class="has-sub-sub <?php 
									if($page_name=='new_employee' ||
									   $page_name=='employees_information' ||
									   $page_name == 'employees_bonus')
									   echo 'current';?>">
                                    <a href="javascript:;" class=""><span class="sub-menu-text"><?php echo get_phrase('employees');?></span>
                                    <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-sub" style="display: none;">
                                        <li><a class="" href="<?=base_url();?><?=$roles?>/employees_information"><span class="sub-sub-menu-text"> <?php echo get_phrase('employees_information');?></span></a></li>
                                        <li><a class="" href="<?=base_url();?><?=$roles?>/new_employee"><span class="sub-sub-menu-text"> <?php echo get_phrase('new');?> <?php echo get_phrase('employee');?></span></a></li>
                                         <li><a class="" href="<?=base_url();?><?=$roles?>/employees_bonus"><span class="sub-sub-menu-text"> <?php echo get_phrase('employee');?> <?php echo get_phrase('bonus');?></span></a></li>
                                        
                                    </ul>
                                    </li>
                                    
                                    <li class="has-sub-sub <?php 
									if($page_name=='new_customer' ||
									   $page_name=='customers_information')
									   echo 'current';?>">
                                    <a href="javascript:;" class=""><span class="sub-menu-text"><?php echo get_phrase('customers');?></span>
                                    <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-sub" style="display: none;">
                                        <li><a class="" href="<?=base_url();?><?=$roles?>/customers_information"><span class="sub-sub-menu-text"> <?php echo get_phrase('customers_information');?></span></a></li>
                                        <li><a class="" href="<?=base_url();?><?=$roles?>/new_customer"><span class="sub-sub-menu-text"> <?php echo get_phrase('new');?> <?php echo get_phrase('customer');?></span></a></li>
                                    </ul>
                                    </li>
                                    
                                    <li class="has-sub-sub <?php 
									if($page_name=='new_supplier' ||
									   $page_name=='suppliers')
									   echo 'current';?>">
                                    <a href="javascript:;" class=""><span class="sub-menu-text"><?php echo get_phrase('suppliers');?></span>
                                    <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-sub" style="display: none;">
                                        <li><a class="" href="<?=base_url();?><?=$roles?>/suppliers_information"><span class="sub-sub-menu-text"> <?php echo get_phrase('suppliers_information');?></span></a></li>
                                        <li><a class="" href="<?=base_url();?><?=$roles?>/new_supplier"><span class="sub-sub-menu-text"> <?php echo get_phrase('new');?> <?php echo get_phrase('suppliers');?></span></a></li>
                                    </ul>
                                    </li>
								</ul>
							</li>
                            
                            <li class="has-sub <?php 
							if($page_name == 'order_report' || $page_name == 'worker_report' || 
								$page_name == 'transaction_report'|| $page_name == 'ready_on_time' ||
								$page_name == 'ready_after_time' || $page_name=="product_alert" ||
								$page_name == 'not_ready_till_time' || $page_name == 'new_in_process' ||
								$page_name == 'today_new_order' || $page_name == "today_ready_order" || 
								$page_name == 'date_today_not_ready' || $page_name == 'purchase_reports')
							echo 'active';?>">
								<a href="javascript:;" class="">
								<i class="fa fa-barcode fa-fw"></i> <span class="menu-text"><?php echo get_phrase('report');?><!--<span class="badge pull-right">1</span>--></span>
								<span class="arrow"></span>
								</a>
								<ul class="sub">
									<li class="has-sub-sub <?php 
									if($page_name=='ready_on_time' ||
									   $page_name=='ready_after_time' ||
									   $page_name=='not_ready_till_time' ||
									   $page_name=='new_in_process' ||
									   $page_name == 'today_new_order' ||
									   $page_name=="today_ready_order" ||
									   $page_name=="date_today_not_ready")
									   echo 'current';?>">
                                    <a href="javascript:;" class=""><i class="fa fa-tasks fa-fw"></i><span class="sub-menu-text"><?php echo get_phrase('order');?> <?php echo get_phrase('report');?></span>
                                    <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-sub" style="display: none;">
                                        <li><a class="" href="<?=base_url();?><?=$roles?>/ready_on_time"><span class="sub-sub-menu-text"> <?php echo get_phrase('ready_on_time');?></span></a></li>
                                        <li><a class="" href="<?=base_url();?><?=$roles?>/ready_after_time"><span class="sub-sub-menu-text"> <?php echo get_phrase('ready_after_time');?></span></a></li>
										<li><a class="" href="<?=base_url();?><?=$roles?>/not_ready_till_time"><span class="sub-sub-menu-text"> <?php echo get_phrase('not_ready_till_time');?></span></a></li>
										<li><a class="" href="<?=base_url();?><?=$roles?>/new_in_process"><span class="sub-sub-menu-text"> <?php echo get_phrase('new_in_process');?></span></a></li>
										<li><a class="" href="<?=base_url();?><?=$roles?>/today_new_order"><span class="sub-sub-menu-text"> <?php echo get_phrase('today_new_order');?></span></a></li>
										<li><a class="" href="<?=base_url();?><?=$roles?>/today_ready_order"><span class="sub-sub-menu-text"> <?php echo get_phrase("today_ready_order");?></span></a></li>
										<li><a class="" href="<?=base_url();?><?=$roles?>/date_today_not_ready"><span class="sub-sub-menu-text"> <?php echo get_phrase('date_today_not_ready');?></span></a></li>
                                    </ul>
                                    </li>
                                    
									<li class="<?php if($page_name=='product_alert')echo 'current';?>"><a  href="<?=base_url();?><?=$roles?>/product_alert"><span class="sub-menu-text"><i class="fa fa-exclamation-triangle"></i> <?php echo get_phrase('product');?> <?php echo get_phrase('alert');?> </span></a></li>
									
									<li class="<?php if($page_name=='purchase_reports')echo 'current';?>"><a  href="<?=base_url();?><?=$roles?>/purchase_reports"><span class="sub-menu-text"><i class="fa fa-file"></i> <?php echo get_phrase('purchase');?> <?php echo get_phrase('report');?> </span></a></li>
									
                                    <li class="<?php if($page_name=='worker_report')echo 'current';?>"><a  href="<?=base_url();?><?=$roles?>/worker_report"><i class="fa fa-user"></i><span class="sub-menu-text"><?php echo get_phrase('worker');?> <?php echo get_phrase('report');?></span></a></li>
                                    <li class="<?php if($page_name=='transaction_report')echo 'current';?>"><a  href="<?=base_url();?><?=$roles?>/transaction_report"><i class="fa fa-money"></i><span class="sub-menu-text"><?php echo get_phrase('transaction');?> <?php echo get_phrase('report');?></span></a></li>
                                    
								</ul>
							</li>
							
							<li class="has-sub <?php 
							if($page_name == 'email' || $page_name == 'sms')
							echo 'active';?>">
								<a href="javascript:;" class="">
								<i class="fa fa-envelope fa-fw"></i> <span class="menu-text"><?php echo get_phrase('email');?> / <?php echo get_phrase('sms');?><!--<span class="badge pull-right">1</span>--></span>
								<span class="arrow"></span>
								</a>
								<ul class="sub">								                                    
									<li class="<?php if($page_name=='email')echo 'current';?>"><a  href="<?=base_url();?><?=$roles?>/email"><span class="sub-menu-text"><i class="fa fa-envelope"></i> <?php echo get_phrase('send');?> <?php echo get_phrase('email');?> </span></a></li>
									
									<li class="<?php if($page_name=='purchase_reports')echo 'current';?>"><a  href="<?=base_url();?><?=$roles?>/sms"><span class="sub-menu-text"><i class="fa fa-envelope-o"></i> <?php echo get_phrase('send');?> <?php echo get_phrase('sms');?> </span></a></li>								                                   
                                    
								</ul>
							</li>
                            
							<li class="has-sub <?php 
							if($page_name == 'system_settings'  ||
							   $page_name == 'manage_languages' ||
							   $page_name == 'manage_email_templates' ||
							   $page_name == 'email_templates' ||
							   $page_name == 'smtp_configuration' ||
							   $page_name == 'sms_templates' ||
							   $page_name == 'manage_sender' ||
							   $page_name == 'categories' ||
							   $page_name == 'subcategories' ||
							   $page_name == 'sizes'	|| $page_name=='discounts' ||
							   $page_name == 'taxes' || $page_name=='stitching' ||
							   $page_name == 'cloth_types' || $page_name=='cloth_styles' ||$page_name=='bonus')
							   echo 'active';?>">
								<a href="javascript:;" class="">
								<i class="fa fa-cogs fa-fw"></i> <span class="menu-text"><?php echo get_phrase('settings');?><!--<span class="badge pull-right">1</span>--></span>
								<span class="arrow"></span>
								</a>
								<ul class="sub">
                                	<li class="has-sub-sub <?php 
									if($page_name=='categories' ||
									   $page_name=='subcategories')
									   echo 'current';?>">
                                    <a href="javascript:;" class=""><span class="sub-menu-text"><?php echo get_phrase('categories');?></span>
                                    <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-sub" style="display: none;">
                                        <li><a class="" href="<?=base_url();?><?=$roles?>/categories"><span class="sub-sub-menu-text"> <?php echo get_phrase('categories');?></span></a></li>
                                        <li><a class="" href="<?=base_url();?><?=$roles?>/subcategories"><span class="sub-sub-menu-text"> <?php echo get_phrase('subcategories');?></span></a></li>
                                    </ul>
                                    </li>
                                    
                                    <li class="has-sub-sub <?php 
									if($page_name=='cloth_types' ||
									   $page_name=='cloth_styles')
									   echo 'current';?>">
                                    <a href="javascript:;" class=""><span class="sub-menu-text"><?php echo get_phrase('cloth');?></span>
                                    <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-sub" style="display: none;">
                                        <li><a class="" href="<?=base_url();?><?=$roles?>/cloth_types"><span class="sub-sub-menu-text"><?php echo get_phrase('cloth');?> <?php echo get_phrase('type');?></span></a></li>
                                        <li><a class="" href="<?=base_url();?><?=$roles?>/cloth_styles"><span class="sub-sub-menu-text"><?php echo get_phrase('cloth');?> <?php echo get_phrase('style');?></span></a></li>
                                    </ul>
                                    </li>
                                    
                                    <li class="<?php if($page_name=='stitching')echo 'current';?>"><a  href="<?=base_url();?><?=$roles?>/stitching"><span class="sub-menu-text"><?php echo get_phrase('stitching');?> <?php echo get_phrase('items');?></span></a></li>
                                    
                                	<li class="<?php if($page_name=='sizes')echo 'current';?>"><a  href="<?=base_url();?><?=$roles?>/sizes"><span class="sub-menu-text"><?php echo get_phrase('product');?> <?php echo get_phrase('sizes');?></span></a></li>
                                    
                                    <li class="<?php if($page_name=='taxes')echo 'current';?>"><a  href="<?=base_url();?><?=$roles?>/taxes"><span class="sub-menu-text"><?php echo get_phrase('tax');?> <?php echo get_phrase('rates');?></span></a></li>
                                    
                                    <li class="<?php if($page_name=='discounts')echo 'current';?>"><a  href="<?=base_url();?><?=$roles?>/discounts"><span class="sub-menu-text"><?php echo get_phrase('discounts');?></span></a></li>
                                    
                                    <li class="<?php if($page_name=='bonus')echo 'current';?>"><a  href="<?=base_url();?><?=$roles?>/bonus"><span class="sub-menu-text"><?php echo get_phrase('bonus');?></span></a></li>
                                    
                                    <li class="has-sub-sub <?php 
									if($page_name=='manage_sender' ||
									   $page_name=='sms_templates' )
									   echo 'current';?>">
                                    <a href="javascript:;" class=""><span class="sub-menu-text"><?php echo get_phrase('sms');?> <?php echo get_phrase('configuration');?></span>
                                    <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-sub" style="display: none;">
                                        <li><a class="" href="<?=base_url();?><?=$roles?>/manage_sender"><span class="sub-sub-menu-text"><?php echo get_phrase('manage');?> <?php echo get_phrase('sender');?> <?php echo get_phrase('id');?></span></a></li>
                                        <li><a class="" href="<?=base_url();?><?=$roles?>/sms_templates"><span class="sub-sub-menu-text"><?php echo get_phrase('sms');?> <?php echo get_phrase('templates');?></span></a></li>
                                    </ul>
                                    </li>
                                    
                                    <li class="has-sub-sub <?php 
									if($page_name=='smtp_configuration' ||
									   $page_name=='email_templates' ||
									   $page_name=='manage_email_templates')
									   echo 'current';?>">
                                    <a href="javascript:;" class=""><span class="sub-menu-text"><?php echo get_phrase('email_configuration');?></span>
                                    <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-sub" style="display: none;">
                                        <li><a class="" href="<?=base_url();?><?=$roles?>/smtp_configuration"><span class="sub-sub-menu-text"><?php echo get_phrase('smtp_configuration');?></span></a></li>
                                        <li><a class="" href="<?=base_url();?><?=$roles?>/email_templates"><span class="sub-sub-menu-text"><?php echo get_phrase('email_templates');?></span></a></li>
                                    </ul>
                                    </li>
                                    
									<li class="<?php if($page_name=='system_settings')echo 'current';?>"><a  href="<?=base_url();?><?=$roles?>/system_settings"><span class="sub-menu-text"><?php echo get_phrase('site_configuration');?></span></a></li>
                                    
                                    
                                    <li class="<?php if($page_name=='manage_languages')echo 'current';?>"><a class="" href="<?=base_url();?><?=$roles?>/manage_languages"><span class="sub-menu-text"><?php echo get_phrase('manage_language');?></span></a></li>
                                   
								</ul>
							</li>
                            
						</ul>
						<!-- /SIDEBAR MENU -->
					</div>
				</div>
