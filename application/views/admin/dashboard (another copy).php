<!-- SAMPLE BOX CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="box-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					  <h4 class="modal-title">Box Settings</h4>
					</div>
					<div class="modal-body">
					  Here goes box setting content.
					</div>
					<div class="modal-footer">
					  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					  <button type="button" class="btn btn-primary">Save changes</button>
					</div>
				  </div>
				</div>
			  </div>
			<!-- /SAMPLE BOX CONFIGURATION MODAL FORM-->
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
									<ul class="breadcrumb">
										<li>
											<i class="fa fa-home"></i>
											<a href="<?php echo base_url();?>"><?php echo get_phrase('home');?></a>
										</li>
										<li><?=ucwords($page_title)?></li>
									</ul>
									<!-- /BREADCRUMBS -->
									<div class="clearfix">
										<h3 class="content-title pull-left"><?=ucwords($page_title)?></h3>
										<!-- DATE RANGE PICKER -->
										<span class="date-range pull-right">
											<div class="btn-group">
												<a class="js_update btn btn-default" href="#">Today</a>
												<a class="js_update btn btn-default" href="#">Last 7 Days</a>
												<a class="js_update btn btn-default hidden-xs" href="#">Last month</a>
												
												<a id="reportrange" class="btn reportrange">
													<i class="fa fa-calendar"></i>
													<span></span>
													<i class="fa fa-angle-down"></i>
												</a>
											</div>
										</span>
										<!-- /DATE RANGE PICKER -->
									</div>
									<div class="description">Overview, Statistics and more</div>
								</div>
							</div>
						</div>
						<!-- /PAGE HEADER -->
						<!-- DASHBOARD CONTENT -->
						<div class="row">
							<!-- COLUMN 1 -->
							<div class="col-md-6">
								<div class="row">
								  <div class="col-lg-6">
									 <div class="dashbox panel panel-default">
										<div class="panel-body">
										   <div class="panel-left red">
												<i class="fa fa-users fa-3x"></i>
										   </div>
										   <div class="panel-right">
												<div class="number">5</div>
												<div class="title">Employess</div>
												<span class="label label-success">
													26% <i class="fa fa-arrow-up"></i>
												</span>
										   </div>
										</div>
									 </div>
								  </div>
								  <div class="col-lg-6">
									 <div class="dashbox panel panel-default">
										<div class="panel-body">
										   <div class="panel-left blue">
												<i class="fa fa-users fa-3x"></i>
										   </div>
										   <div class="panel-right">
												<div class="number">4</div>
												<div class="title">Group</div>
												<span class="label label-warning">
													5% <i class="fa fa-arrow-down"></i>
												</span>
										   </div>
										</div>
									 </div>
								  </div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="quick-pie panel panel-default">
											<div class="panel-body">
												<div class="col-md-4 text-center">
													<div id="dash_pie_1" class="piechart" data-percent="59">
														<span class="percent"></span>
													</div>
													<a href="#" class="title">New Visitors <i class="fa fa-angle-right"></i></a>
												</div>
												<div class="col-md-4 text-center">
													<div id="dash_pie_2" class="piechart" data-percent="73">
														<span class="percent"></span>
													</div>
													<a href="#" class="title">Bounce Rate <i class="fa fa-angle-right"></i></a>
												</div>
												<div class="col-md-4 text-center">
													<div id="dash_pie_3" class="piechart" data-percent="90">
														<span class="percent"></span>
													</div>
													<a href="#" class="title">Brand Popularity <i class="fa fa-angle-right"></i></a>
												</div>
											</div>
										</div>
									</div>
							   </div>
							</div>
							<!-- /COLUMN 1 -->
							
							<!-- COLUMN 2 -->
							<div class="col-md-6">
								<div class="box solid grey">
									<div class="box-title">
										<h4><i class="fa fa-dollar"></i>Revenue</h4>
										<div class="tools">
											<span class="label label-danger">
												20% <i class="fa fa-arrow-up"></i>
											</span>
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
										<div id="chart-revenue" style="height:240px"></div>
									</div>
								</div>
							</div>
							<!-- /COLUMN 2 -->
						</div>
					   <!-- /DASHBOARD CONTENT -->
					   <!-- HERO GRAPH -->
						<div class="row">
							<div class="col-md-12">
								<!-- BOX -->
								<div class="box border green">
									<div class="box-title">
										<h4><i class="fa fa-bars"></i> <span class="hidden-inline-mobile">Traffic & Sales</span></h4>
									</div>
									<div class="box-body">
										<div class="tabbable header-tabs">
											<ul class="nav nav-tabs">
												 <li><a href="#box_tab2" data-toggle="tab"><i class="fa fa-search-plus"></i> <span class="hidden-inline-mobile">Select & Zoom Sales Chart</span></a></li>
												 <li class="active"><a href="#box_tab1" data-toggle="tab"><i class="fa fa-bar-chart-o"></i> <span class="hidden-inline-mobile">Traffic Statistics</span></a></li>
											 </ul>
											 <div class="tab-content">
												 <div class="tab-pane fade in active" id="box_tab1">
													<!-- TAB 1 -->
													<div id="chart-dash" class="chart"></div>
													<hr class="margin-bottom-0">
												   <!-- /TAB 1 -->
												 </div>
												 <div class="tab-pane fade" id="box_tab2">
													<div class="row">
														<div class="col-md-8">
															<div class="demo-container">
																<div id="placeholder" class="demo-placeholder"></div>
															</div>
														</div>
														<div class="col-md-4">
															<div class="demo-container" style="height:100px;">
																<div id="overview" class="demo-placeholder"></div>
															</div>
															<div class="well well-bottom">
																<h4>Month over Month Analysis</h4>
																<ol>
																	<li>Selection support makes it easy to construct flexible zooming schemes.</li>
																	<li>With a few lines of code, the small overview plot to the right has been connected to the large plot.</li>
																	<li>Try selecting a rectangle on either of them.</li>
																</ol>
															</div>
														</div>
													</div>
												</div>
											 </div>
										</div>
									</div>
								</div>
								<!-- /BOX -->
							</div>
						</div>
						<!-- /HERO GRAPH -->
						<!-- NEW ORDERS & STATISTICS -->
						<div class="row">
							<!-- NEW ORDERS -->
							<div class="col-md-6">
								<div class="box border">
									<div class="box-title">
										<h4><i class="fa fa-tasks"></i> <span class="hidden-inline-mobile"><?php echo get_phrase('orders');?> <?php echo get_phrase('work');?></span></h4>
									</div>
									<div class="box-body">
								<div class="tabbable header-tabs">
									<ul class="nav nav-tabs">
									   <li class="active"><a href="#newOrders" data-toggle="tab"><i class="fa fa-list"></i> <span class="hidden-inline-mobile"><?php echo get_phrase('new');?> <?php echo get_phrase('orders');?></span></a></li>
									   <li><a href="#workerOrder" data-toggle="tab"><i class="fa fa-user"></i> <span class="hidden-inline-mobile"><?php echo get_phrase('worker');?> <?php echo get_phrase('orders');?></span></a></li>
									</ul>
									<div class="tab-content">
									   <div class="tab-pane active" id="newOrders">
										  <div class="panel panel-default">
											  <div class="panel-body orders no-opaque">
												<div class="scroller" data-height="450px" data-always-visible="1" data-rail-visible="1">
													<ul class="list-unstyled">
														<?php foreach($todaysOrders as $td): 
															switch ($td->status) {
															    case "inprocess":
															        $valuenow = '40';
																	$label = 'warning';
															        break;
															    case "completed":
															        $valuenow = '80';
																	$label = 'primary';
															        break;
															    case "to_deliver":
															        $valuenow = '100';
																	$label = 'success';
															        break;
																case "delivered":
															        $valuenow = '100';
																	$label = 'info';
															        break;
															    default:
															        $valuenow = '10';
															        $label = 'info';
															}
															    ?>
														<li class="clearfix">
															<div class="pull-left">
																<p>
																	<h5><strong>#<?php echo get_phrase('sub');?> <?php echo get_phrase('order'); ?> <?php echo $td->sbId;?> (<?php echo $td->ref ?> )</strong> <?php echo $td->customer;?></h5>
																</p>
																<p><i class="fa fa-clock-o"></i> <abbr class="timeago" title="<?php echo date("M d, Y",strtotime($td->date));?>" ><?php echo date("M d, Y",strtotime($td->date));?></abbr></p>
																																
															</div>
															<div class="text-right pull-right">
																<h4 class="cost"><?php echo $td->total;?></h4>
																<p>
																	<span class="label label-<?php echo $label; ?> arrow-in-right"><i class="fa fa-check"></i> <?php if($td->status=='to_deliver'){echo get_phrase('ready_to_deliver');}else{echo ucwords($td->status);}?></span>
																</p>
															</div>
															<div class="clearfix"></div>
															<div class="progress progress-sm">
															  <div class="progress-bar progress-bar-<?php echo $label; ?>" role="progressbar" aria-valuenow="<?php echo $valuenow; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $valuenow; ?>%;">
																<span class="sr-only"><?php echo $valuenow; ?>% <?php echo get_phrase('complete');?></span>
															  </div>
															</div>
														</li>
													<?php endforeach; ?>
													</ul>
												</div>
											  </div>
											   <!--<div class='text-center'>
												<ul class='pagination'>
												  <li class='disabled'>
													<a href='#'>
													  <i class='fa fa-angle-left'></i>
													</a>
												  </li>
												  <li class='active'>
													<a href='#'>
													  1
													</a>
												  </li>
												  <li>
													<a href='#'>2</a>
												  </li>
												  <li>
													<a href='#'>3</a>
												  </li>
												  <li>
													<a href='#'>4</a>
												  </li>
												  <li>
													<a href='#'>5</a>
												  </li>
												  <li>
													<a href='#'>
													  <i class='fa fa-angle-right'></i>
													</a>
												  </li>
												</ul>
											  </div>-->
											</div>
									   </div>
									   <div class="tab-pane" id="workerOrder">
										  <div class="scroller" data-height="450px" data-always-visible="1" data-rail-visible="1">
										  	<?php //print_r($workerOrders);die;
											foreach($workerOrders as $workerOrder){?>
											  <div class="feed-activity clearfix">
												<div>
													<span><img class="pull-left roundicon" alt="" src="<?php echo $this->crud_model->get_image_url('users',$workerOrder->pic);?>"></span>
													<a class="user" href="<?php echo base_url(); ?><?php echo $roles; ?>/employees/edit_employees/<?php echo $workerOrder->eid; ?>"> <?php echo ucwords($workerOrder->empname); ?> </a>
													<?php echo get_phrase('working_on_suborders'); ?>
													<br/>												
													<a class="user" href="<?php echo base_url(); ?><?php echo $roles; ?>/report/track_worker_report/<?php echo $workerOrder->eid; ?>"> <?php echo get_phrase('view'); ?> </a>
												</div>
												<div class="time">
													<i class="fa fa-tasks"></i>
													<?php echo $workerOrder->cEOId; ?>
												</div>
											  </div>
											  <?php } ?>
											  
											 
										  </div>
									   </div>
									</div>
								</div>
									</div>
								</div>
							</div>
							<!-- /NEW ORDERS -->
							<!-- STATISTICS -->
							<div class="col-md-6">
								<div class="box border">
									<div class="box-title">
										<h4><i class="fa fa-tasks"></i> <span class="hidden-inline-mobile"><?php echo get_phrase('today');?> <?php echo get_phrase('orders');?> </span></h4>
									</div>
									<div class="box-body">
								<div class="tabbable header-tabs">
									<ul class="nav nav-tabs">
										
										<li><a href="#notReady" data-toggle="tab"><i class="fa fa-times-circle-o"></i> <span class="hidden-inline-mobile"><?php echo get_phrase('not');?> <?php echo get_phrase('ready');?></span></a></li>
									   <li class="active"><a href="#ready" data-toggle="tab"><i class="fa fa-check-circle-o"></i> <span class="hidden-inline-mobile"><?php echo get_phrase('ready');?></span></a></li>
									   
									</ul>
									<div class="tab-content">
									   <div class="tab-pane active" id="ready">
										  <div class="panel panel-default">
											  <div class="panel-body orders no-opaque">
												
													<table id="datatable2" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
										                      <thead>
										                        <tr>
										                          <th><?php echo get_phrase('ref_no'); ?></th>
										                          <th><?php echo get_phrase('customer'); ?></th>
																  <th><?php echo get_phrase('delivery'); ?> <?php echo get_phrase('date'); ?></th>
										                          <th><?php echo get_phrase('no_of_suborder'); ?></th>
										                          <th><?php echo get_phrase('status'); ?></th>
										                         </tr>
										                      </thead>
										                      <tbody>
										                      	<?php foreach($todayReadyOrders as $tro):  ?>
										                           <tr class="gradeX">
										                          <td><?php echo $tro->ref; ?></td>
										                          <td><?php echo $tro->customer; ?></td>
																  <td><?php echo $tro->dd; ?></td>
										                          <td><?php echo $tro->ord_Itms_Id; ?></td>
										                          <td><span class="label label-success arrow-in-right"><i class="fa fa-check"></i> <?php echo get_phrase('ready_to_deliver'); ?></span></td>
										                         </tr>
										                          <?php endforeach; ?>                      
										                        </tbody>
										                      <tfoot>
										                        <tr>
										                          <th><?php echo get_phrase('ref_no'); ?></th>
										                          <th><?php echo get_phrase('customer'); ?></th>
																  <th><?php echo get_phrase('delivery'); ?> <?php echo get_phrase('date'); ?></th>
										                          <th><?php echo get_phrase('no_of_suborder'); ?></th>
										                          <th><?php echo get_phrase('status'); ?></th>
										                         </tr>
										                      </tfoot>
										                    </table>
														<div class="col-sm-12 center">													  
														<a href="<?php echo base_url(); ?><?php echo $roles; ?>/today_ready_order" class="btn btn-success btn-sm"><?php echo get_phrase('view_all'); ?></a>
														<div>&nbsp;</div>
														</div>
											  </div>
											   
											</div>
									   </div>
									   <div class="tab-pane" id="notReady">
									   	<div class="panel panel-default">
											  <div class="panel-body orders no-opaque">
										   			<table id="datatable2" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
										                      <thead>
										                        <tr>
										                          <th><?php echo get_phrase('ref_no'); ?></th>
										                          <th><?php echo get_phrase('customer'); ?></th>
																  <th><?php echo get_phrase('delivery'); ?> <?php echo get_phrase('date'); ?></th>
										                          <th><?php echo get_phrase('no_of_suborder'); ?></th>
										                          <th><?php echo get_phrase('status'); ?></th>
										                         </tr>
										                      </thead>
										                      <tbody>
										                      	<?php foreach($todayNotReadyOrders as $tnro):  ?>
										                           <tr class="gradeX">
										                          <td><?php echo $tnro->ref; ?></td>
										                          <td><?php echo $tnro->customer; ?></td>
																  <td><?php echo $tnro->dd; ?></td>
										                          <td><?php echo $tnro->ord_Itms_Id; ?></td>
										                          <td><span class="label label-warning arrow-in-right"><i class="fa fa-warning"></i> <?php echo get_phrase('not_ready'); ?></span></td>
										                         </tr>
										                          <?php endforeach; ?>                      
										                        </tbody>
										                      <tfoot>
										                        <tr>
										                          <th><?php echo get_phrase('ref_no'); ?></th>
										                          <th><?php echo get_phrase('customer'); ?></th>
																  <th><?php echo get_phrase('delivery'); ?> <?php echo get_phrase('date'); ?></th>
										                          <th><?php echo get_phrase('no_of_suborder'); ?></th>
										                          <th><?php echo get_phrase('status'); ?></th>
										                         </tr>
										                      </tfoot>
										                    </table>
														<div class="col-sm-12 center">													  
														<a href="<?php echo base_url(); ?><?php echo $roles; ?>/date_today_not_ready" class="btn btn-success btn-sm"><?php echo get_phrase('view_all'); ?></a>
														<div>&nbsp;</div>
														</div>
											</div>
											</div>
									   </div>
									</div>
								</div>
									</div>
								</div>
							</div>
							<!-- /STATISTICS -->
							
						</div>
						<!-- /NEW ORDERS & STATISTICS -->
						<!-- CALENDAR & CHAT -->
						<div class="row">
							<!-- CALENDAR -->
							<div class="col-md-6">
								<div class="box border primary">
									<div class="box-title">
										<h4><i class="fa fa-calendar"></i>Calendar</h4>
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
										<div id='calendarDash'></div>
									</div>
								</div>
							</div>
							<!-- /CALENDAR -->
							<!-- CHAT -->
							<div class="col-md-6">
								<!-- BOX -->
								<div class="box border red chat-window">
									<div class="box-title">
										<h4><i class="fa fa-comments"></i>Chat Window</h4>
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
									<div class="box-body big">
										<div class="scroller" data-height="402px" data-always-visible="1" data-rail-visible="1">
											<ul class="media-list chat-list">
												<li class="media">
												  <a class="pull-left" href="#">
													<img class="media-object" alt="Generic placeholder image" src="<?php echo base_url();?>assets/img/chat/headshot1.jpg">
												  </a>
												  <div class="media-body chat-pop">
													<h4 class="media-heading">John Doe <span class="pull-right"><i class="fa fa-clock-o"></i> <abbr class="timeago" title="Oct 9, 2013" >Oct 9, 2013</abbr> </span></h4>
													<p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
													
												  </div>
												</li>
												<li class="media">
												  <a class="pull-right" href="#">
													<img class="media-object"  alt="Generic placeholder image" src="<?php echo base_url();?>assets/img/chat/headshot2.jpg">
												  </a>
												  <div class="pull-right media-body chat-pop mod">
													<h4 class="media-heading">You <span class="pull-left"><abbr class="timeago" title="Oct 10, 2013" >Oct 10, 2013</abbr> <i class="fa fa-clock-o"></i></span></h4></h4>
													Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
												  </div>
												</li>
												<li class="media">
												  <a class="pull-left" href="#">
													<img class="media-object"  alt="Generic placeholder image" src="<?php echo base_url();?>assets/img/chat/headshot3.jpg">
												  </a>
												  <div class="media-body chat-pop">
													<h4 class="media-heading">Tim Row <span class="pull-right"><i class="fa fa-clock-o"></i> <abbr class="timeago" title="Oct 10, 2013" >Oct 10, 2013</abbr> </span></h4></h4>
													<p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
												  </div>
												</li>
												<li class="media">
												  <a class="pull-left" href="#">
													<img class="media-object"  alt="Generic placeholder image" src="<?php echo base_url();?>assets/img/chat/headshot5.jpg">
												  </a>
												  <div class="media-body chat-pop">
													<h4 class="media-heading">Jenny Doe <span class="pull-right"><i class="fa fa-clock-o"></i> <abbr class="timeago" title="Oct 10, 2013" >Oct 10, 2013</abbr> </span></h4></h4>
													<p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
												  </div>
												</li>
												<li class="media">
												  <a class="pull-right" href="#">
													<img class="media-object"  alt="Generic placeholder image" src="<?php echo base_url();?>assets/img/chat/headshot2.jpg">
												  </a>
												  <div class="pull-right media-body chat-pop mod">
													<h4 class="media-heading">You <span class="pull-left"><abbr class="timeago" title="Oct 11, 2013" >Oct 11, 2013</abbr> <i class="fa fa-clock-o"></i></span></h4></h4>
													Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
												  </div>
												</li>
												<li class="media">
												  <a class="pull-left" href="#">
													<img class="media-object"  alt="Generic placeholder image" src="<?php echo base_url();?>assets/img/chat/headshot4.jpg">
												  </a>
												  <div class="media-body chat-pop">
													<h4 class="media-heading">Jess Doe <span class="pull-right"><i class="fa fa-clock-o"></i> <abbr class="timeago" title="Oct 12, 2013" >Oct 12, 2013</abbr> </span></h4></h4>
													<p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
												  </div>
												</li>
												<li class="media">
												  <a class="pull-right" href="#">
													<img class="media-object"  alt="Generic placeholder image" src="<?php echo base_url();?>assets/img/chat/headshot2.jpg">
												  </a>
												  <div class="pull-right media-body chat-pop mod">
													<h4 class="media-heading">You <span class="pull-left"><abbr class="timeago" title="Oct 12, 2013" >Oct 12, 2013</abbr> <i class="fa fa-clock-o"></i></span></h4></h4>
													Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
												  </div>
												</li>
											</ul>
										</div>
										<div class="divide-20"></div>
										<div class="chat-form">
											<div class="input-group"> 
												<input type="text" class="form-control" placeholder="Type something...really, it works"> 
												<span class="input-group-btn"> <button class="btn btn-primary" type="button"><i class="fa fa-check"></i></button> </span> 
											</div>
										</div>
									</div>
								</div>
								<!-- /BOX -->
							</div>
							<!-- CHAT -->
						</div>
						<!-- /CALENDAR & CHAT -->
						<div class="footer-tools">
							<span class="go-top">
								<i class="fa fa-chevron-up"></i> Top
							</span>
						</div>
					</div><!-- /CONTENT-->
				</div>
			</div>
<script type="text/javascript">
	$(function(){
		/* initialize the calendar
		-----------------------------------------------------------------*/
		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();
		
		var calendar = $('#calendarDash').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			events: [
			<?php $i=1; foreach($getEvents as $gE){if($i%2=='0'){$color = 'red';}else{$color='green';}?>
				{
					title: '<?php echo $this->crud_model->clear_tags($gE->data); ?>',
					//start: new Date(y, m, d+1, 19, 0),
					start: new Date('<?php echo $gE->date; ?>'),
					end: new Date('<?php echo $gE->date; ?>'),
					//end: new Date(y, m, d+1, 22, 30),
					allDay: true,
					backgroundColor: Theme.colors.<?php echo $color; ?>,
				},
				<?php $i++;}?>
			]
		});
		
	});
	
</script>