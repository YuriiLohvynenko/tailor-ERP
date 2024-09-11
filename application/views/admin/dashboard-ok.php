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
											<a href="<?php echo base_url();?>">Home</a>
										</li>
										<li><?php echo ucwords($page_title)?></li>
									</ul>
									<!-- /BREADCRUMBS -->
									<div class="clearfix">
										<h3 class="content-title pull-left"><?php echo ucwords($page_title)?></h3>
										<!-- DATE RANGE PICKER -->
										<!--<span class="date-range pull-right">
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
										</span>-->
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
				<?php if($this->session->flashdata('flash_message')){ ?>
                    <div class="alert alert-block alert-success fade in">
                    <a class="close" data-dismiss="alert" href="#" aria-hidden="true">×</a>
                    <h4><i class="fa fa-heart"></i> <?php echo $this->session->flashdata('flash_message'); ?></h4>
                    </div>
                    
                    <? }?>
							<div class="col-md-6">
								<div class="row">
								  <div class="col-lg-6">
									 <div class="dashbox panel panel-default">
										<div class="panel-body">
										   <div class="panel-left red">
												<i class="fa fa-users fa-3x"></i>
										   </div>
										   <div class="panel-right">
												<div class="number"><?php echo $this->crud_model->count_all_record('employees'); ?></div>
												<div class="title"><?php echo get_phrase('employees');?></div>
												<!--<span class="label label-success">
													26% <i class="fa fa-arrow-up"></i>
												</span>-->
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
												<div class="number"><?php echo $this->crud_model->count_all_record('roles'); ?></div>
												<div class="title"><?php echo get_phrase('users');?> <?php echo get_phrase('roles');?></div>
												<!--<span class="label label-warning">
													5% <i class="fa fa-arrow-down"></i>
												</span>-->
										   </div>
										</div>
									 </div>
								  </div>
								</div>
								<!--<div class="row">
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
							   </div>-->
							</div>
							<!-- /COLUMN 1 -->
							
							<!-- COLUMN 2 -->
							<!--<div class="col-md-6">
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
							</div>-->
							<!-- /COLUMN 2 -->
						</div>
					   <!-- /DASHBOARD CONTENT -->
					   <!-- HERO GRAPH -->
						<!--<div class="row">
							<div class="col-md-12">
								<!-- BOX -->
								<!--<div class="box border green">
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
													<!-- TAB 1 --
													<div id="chart-dash" class="chart"></div>
													<hr class="margin-bottom-0">
												   <!-- /TAB 1 --
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
								</div>-->
								<!-- /BOX --
							</div>
						</div>-->
						<!-- /HERO GRAPH -->
						<!-- NEW ORDERS & STATISTICS -->
						<div class="row">
							<!-- NEW ORDERS -->
							<!--<div class="col-md-6">
								<div class="box border">
									<div class="box-title">
										<h4><i class="fa fa-columns"></i> <span class="hidden-inline-mobile">Sales Tab</span></h4>
									</div>
									<div class="box-body">
								<div class="tabbable header-tabs">
									<ul class="nav nav-tabs">
									   <li class="active"><a href="#sales" data-toggle="tab"><i class="fa fa-bookmark"></i> <span class="hidden-inline-mobile">New Orders</span></a></li>
									   <li><a href="#feed" data-toggle="tab"><i class="fa fa-rss"></i> <span class="hidden-inline-mobile">Recent Activities</span></a></li>
									</ul>
									<div class="tab-content">
									   <div class="tab-pane active" id="sales">
										  <div class="panel panel-default">
											  <div class="panel-body orders no-opaque">
												<div class="scroller" data-height="450px" data-always-visible="1" data-rail-visible="1">
													<ul class="list-unstyled">
														<li class="clearfix">
															<div class="pull-left">
																<p>
																	<h5><strong>#A14</strong> Rikki S. Stover</h5>
																</p>
																<p><i class="fa fa-clock-o"></i> <abbr class="timeago" title="Oct 9, 2013" >Oct 9, 2013</abbr></p>
																																
															</div>
															<div class="text-right pull-right">
																<h4 class="cost">$124.00</h4>
																<p>
																	<span class="label label-success arrow-in-right"><i class="fa fa-check"></i> Complete</span>
																</p>
															</div>
															<div class="clearfix"></div>
															<div class="progress progress-sm">
															  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%;">
																<span class="sr-only">85% Complete</span>
															  </div>
															</div>
														</li>
														<li class="clearfix">
															<div class="pull-left">
																<p>
																	<h5><strong>#A15</strong> Scott Allen</h5>
																</p>
																<p><i class="fa fa-clock-o"></i> <abbr class="timeago" title="Oct 10, 2013" >Oct 10, 2013</abbr></p>
																
															</div>
															<div class="text-right pull-right">
																<h4 class="cost">$235.00</h4>
																<p>
																	<span class="label label-warning arrow-in-right"><i class="fa fa-cog"></i> In Progress</span>
																</p>
															</div>
															<div class="clearfix"></div>
															<div class="progress progress-sm">
															  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
																<span class="sr-only">30% Complete</span>
															  </div>
															</div>
														</li>
														<li class="clearfix">
															<div class="pull-left">
																<p>
																	<h5><strong>#A16</strong> Larry Wright</h5>
																</p>
																<p><i class="fa fa-clock-o"></i> <abbr class="timeago" title="Oct 11, 2013" >Oct 11, 2013</abbr></p>
																
															</div>
															<div class="text-right pull-right">
																<h4 class="cost">$77.00</h4>
																<p>
																	<span class="label label-primary arrow-in-right"><i class="fa fa-archive"></i> Archived</span>
																</p>
															</div>
															<div class="clearfix"></div>
															<div class="progress progress-sm">
															  <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="97" aria-valuemin="0" aria-valuemax="100" style="width: 97%;">
																<span class="sr-only">97% Complete</span>
															  </div>
															</div>
														</li>
														<li class="clearfix">
															<div class="pull-left">
																<p>
																	<h5><strong>#A17</strong> John Dale</h5>
																</p>
																<p><i class="fa fa-clock-o"></i> <abbr class="timeago" title="Oct 10, 2013" >Oct 10, 2013</abbr></p>
																
															</div>
															<div class="text-right pull-right">
																<h4 class="cost">$174.00</h4>
																<p>
																	<span class="label label-danger arrow-in-right"><i class="fa fa-star"></i> New</span>
																</p>
															</div>
															<div class="clearfix"></div>
															<div class="progress progress-sm">
															  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 10%;">
																<span class="sr-only">10% Complete</span>
															  </div>
															</div>
														</li>
														<li class="clearfix">
															<div class="pull-left">
																<p>
																	<h5><strong>#A18</strong> MJ Perkins</h5>
																</p>
																<p><i class="fa fa-clock-o"></i> <abbr class="timeago" title="Oct 11, 2013" >Oct 11, 2013</abbr></p>
																
															</div>
															<div class="text-right pull-right">
																<h4 class="cost">$68.00</h4>
																<p>
																	<span class="label label-info arrow-in-right"><i class="fa fa-truck"></i> In Transit</span>
																</p>
															</div>
															<div class="clearfix"></div>
															<div class="progress progress-sm">
															  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
																<span class="sr-only">50% Complete</span>
															  </div>
															</div>
														</li>
														<li class="clearfix">
															<div class="pull-left">
																<p>
																	<h5><strong>#A19</strong> Stephen Stover</h5>
																</p>
																<p><i class="fa fa-clock-o"></i> <abbr class="timeago" title="Oct 9, 2013" >Oct 9, 2013</abbr></p>
																																
															</div>
															<div class="text-right pull-right">
																<h4 class="cost">$124.00</h4>
																<p>
																	<span class="label label-success arrow-in-right"><i class="fa fa-check"></i> Complete</span>
																</p>
															</div>
															<div class="clearfix"></div>
															<div class="progress progress-sm">
															  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
																<span class="sr-only">80% Complete</span>
															  </div>
															</div>
														</li>
														<li class="clearfix">
															<div class="pull-left">
																<p>
																	<h5><strong>#A20</strong> Edward Lus</h5>
																</p>
																<p><i class="fa fa-clock-o"></i> <abbr class="timeago" title="Oct 11, 2013" >Oct 11, 2013</abbr></p>
																
															</div>
															<div class="text-right pull-right">
																<h4 class="cost">$52.00</h4>
																<p>
																	<span class="label label-danger arrow-in-right"><i class="fa fa-star"></i> New</span>
																</p>
															</div>
															<div class="clearfix"></div>
															<div class="progress progress-sm">
															  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;">
																<span class="sr-only">20% Complete</span>
															  </div>
															</div>
														</li>
														<li class="clearfix">
															<div class="pull-left">
																<p>
																	<h5><strong>#A21</strong> Alice Mangrum</h5>
																</p>
																<p><i class="fa fa-clock-o"></i> <abbr class="timeago" title="Oct 11, 2013" >Oct 11, 2013</abbr></p>
																
															</div>
															<div class="text-right pull-right">
																<h4 class="cost">$14.00</h4>
																<p>
																	<span class="label label-info arrow-in-right"><i class="fa fa-truck"></i> In Transit</span>
																</p>
															</div>
															<div class="clearfix"></div>
															<div class="progress progress-sm">
															  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" style="width: 65%;">
																<span class="sr-only">65% Complete</span>
															  </div>
															</div>
														</li>
														<li class="clearfix">
															<div class="pull-left">
																<p>
																	<h5><strong>#A22</strong> Tamika Owens</h5>
																</p>
																<p><i class="fa fa-clock-o"></i> <abbr class="timeago" title="Oct 11, 2013" >Oct 11, 2013</abbr></p>
																
															</div>
															<div class="text-right pull-right">
																<h4 class="cost">$604.00</h4>
																<p>
																	<span class="label label-warning arrow-in-right"><i class="fa fa-cog"></i> In Progress</span>
																</p>
															</div>
															<div class="clearfix"></div>
															<div class="progress progress-sm">
															  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;">
																<span class="sr-only">75% Complete</span>
															  </div>
															</div>
														</li>
													</ul>
												</div>
											  </div>
											   <div class='text-center'>
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
											  </div>
											</div>
									   </div>
									   <div class="tab-pane" id="feed">
										  <div class="scroller" data-height="450px" data-always-visible="1" data-rail-visible="1">
											  <div class="feed-activity clearfix">
												<div>
													<i class="pull-left roundicon fa fa-check btn btn-info"></i>
													<a class="user" href="#"> John Doe </a>
													accepted your connection request.
													<br>
													<a href="#">View profile</a>
													
												</div>
												<div class="time">
													<i class="fa fa-clock-o"></i>
													5 hours ago
												</div>
											  </div>
											  <div class="feed-activity clearfix">
												<div>
													<i class="pull-left roundicon fa fa-picture-o btn btn-danger"></i>
													<a class="user" href="#"> Jack Doe </a>
													uploaded a new photo.
													<br>
													<a href="#">Take a look</a>
													
												</div>
												<div class="time">
													<i class="fa fa-clock-o"></i>
													5 hours ago
												</div>
											  </div>
											  <div class="feed-activity clearfix">
												<div>
													<i class="pull-left roundicon fa fa-edit btn btn-pink"></i>
													<a class="user" href="#"> Jess Doe </a>
													edited their skills.
													<br>
													<a href="#">Endorse them</a>
													
												</div>
												<div class="time">
													<i class="fa fa-clock-o"></i>
													5 hours ago
												</div>
											  </div>
											  <div class="feed-activity clearfix">
												<div>
													<i class="pull-left roundicon fa fa-bitcoin btn btn-yellow"></i>
													<a class="user" href="#"> Divine Doe </a>
													made a bitcoin payment.
													<br>
													<a href="#">Check your financials</a>
													
												</div>
												<div class="time">
													<i class="fa fa-clock-o"></i>
													6 hours ago
												</div>
											  </div>
											  <div class="feed-activity clearfix">
												<div>
													<i class="pull-left roundicon fa fa-dropbox btn btn-primary"></i>
													<a class="user" href="#"> Lisbon Doe </a>
													saved a new document to Dropbox.
													<br>
													<a href="#">Download</a>
													
												</div>
												<div class="time">
													<i class="fa fa-clock-o"></i>
													1 day ago
												</div>
											  </div>
											  <div class="feed-activity clearfix">
												<div>
													<i class="pull-left roundicon fa fa-pinterest btn btn-inverse"></i>
													<a class="user" href="#"> Bob Doe </a>
													pinned a new photo to Pinterest.
													<br>
													<a href="#">Take a look</a>
													
												</div>
												<div class="time">
													<i class="fa fa-clock-o"></i>
													2 days ago
												</div>
											  </div>
											  <div class="feed-activity clearfix">
												<div>
													<i class="pull-left roundicon fa fa-clock-o btn btn-success"></i>
													<a class="user" href="#"> John Doe </a>
													accepted your connection request.
													<br>
													<a href="#">View profile</a>
													
												</div>
												<div class="time">
													<i class="fa fa-clock-o"></i>
													5 hours ago
												</div>
											  </div>
											  <div class="feed-activity clearfix">
												<div>
													<i class="pull-left roundicon fa fa-heart btn btn-purple"></i>
													<a class="user" href="#"> Jack Doe </a>
													uploaded a new photo.
													<br>
													<a href="#">Take a look</a>
													
												</div>
												<div class="time">
													<i class="fa fa-clock-o"></i>
													5 hours ago
												</div>
											  </div>
											  <div class="feed-activity clearfix">
												<div>
													<i class="pull-left roundicon fa fa-gift btn btn-pink"></i>
													<a class="user" href="#"> Jess Doe </a>
													edited their skills.
													<br>
													<a href="#">Endorse them</a>
													
												</div>
												<div class="time">
													<i class="fa fa-clock-o"></i>
													5 hours ago
												</div>
											  </div>
											  <div class="feed-activity clearfix">
												<div>
													<i class="pull-left roundicon fa fa-random btn btn-yellow"></i>
													<a class="user" href="#"> Divine Doe </a>
													made a bitcoin payment.
													<br>
													<a href="#">Check your financials</a>
													
												</div>
												<div class="time">
													<i class="fa fa-clock-o"></i>
													6 hours ago
												</div>
											  </div>
										  </div>
									   </div>
									</div>
								</div>
									</div>
								</div>
							</div>-->
							<!-- /NEW ORDERS -->
							<!-- STATISTICS -->
							<!--<div class="col-md-6">
								<div class="row">
									<div class="col-md-6">
										<div class="box border inverse">
											<div class="box-title">
												<h4><i class="fa fa-money"></i>Sales Summary</h4>
												<div class="tools">												
													<a href="javascript:;" class="reload">
														<i class="fa fa-refresh"></i>
													</a>
													<a href="javascript:;" class="remove">
														<i class="fa fa-times"></i>
													</a>
												</div>
											</div>
											<div class="box-body">
												  <div class="sparkline-row">
													<span class="title">Total sales</span>
													<span class="value">$78,273</span>
													<span class="sparkline big" data-color="blue">16,7,23,13,12,11,15,4,19,18,4,24</span>
												  </div>
												  <div class="sparkline-row">
													<span class="title">Profit</span>
													<span class="value">$6,543</span>
													<span class="sparkline big" data-color="red">6,3,24,25,27,29,14,26,20,8,12,20</span>
												  </div>
												  <div class="sparkline-row">
													<span class="title">Orders</span>
													<span class="value">985</span>
													<span class="sparkline big" data-color="green">11,19,20,20,5,18,11,6,16,20,26,11</span>
												  </div>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="box border purple">
											<div class="box-title">
												<h4><i class="fa fa-adjust"></i>Distribution Index</h4>
												<div class="tools">
													<a href="javascript:;" class="reload">
														<i class="fa fa-refresh"></i>
													</a>
													<a href="javascript:;" class="remove">
														<i class="fa fa-times"></i>
													</a>
												</div>
											</div>
											<div class="box-body">									
												  <div class="sparkline-row">
													<span class="title">Revenue distribution</span>
													<span class="value"><i class="fa fa-usd"></i> 25674</span>
													<span class="sparklinepie">16,7,23</span>
												  </div>
												  <div class="sparkline-row">
													<span class="title">Sales</span>
													<span class="value"><i class="fa fa-money"></i> 19 999,99</span>
													<span class="sparklinepie">6,3,24,25</span>
												  </div>
												  <div class="sparkline-row">
													<span class="title">Employee/ Dept</span>
													<span class="value"><i class="fa fa-user"></i> 645783</span>
													<span class="sparklinepie">11,19,20</span>
												  </div>
											</div>
										</div>
									</div>
								</div>
							</div>-->
							<!-- /STATISTICS -->
							<!--<div class="col-md-6">
								<div class="box border red">
                                <div class="box-title">
										<h4><i class="fa fa-users"></i>User Roles</h4>
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
									<div class="panel-body">
										<table class="table table-striped table-bordered table-hover">
										 <thead>
											<tr>
											   <th><i class="fa fa-user"></i> Name</th>
											   <th class="hidden-xs"><i class="fa fa-quote-left"></i> Description</th>
											   
											   
											</tr>
										 </thead>
										 <tbody>
											<tr>
											   <td><a href="#">Owner</a></td>
											   <td class="hidden-xs">All Access</td>
											   
											</tr>
											
										 </tbody>
									</table>
									</div>
								</div>
							</div>-->
						</div>
                        <div class="row">
                        <div class="col-md-12">
                         
								<!-- BOX -->
								<div class="box border purple">
									<div class="box-title">
										<h4><i class="fa fa-pencil-square"></i><?php echo get_phrase('approve_attendance')?> </h4>
										<div class="tools hidden-xs">
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
										<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th><?php echo get_phrase('s_no');?></th>
													<th class="hidden-xs"><?php echo get_phrase('employee');?></th>
                                                    <!--<th class="hidden-xs"><?php echo get_phrase('shift');?></th>-->
                                                    <th class="hidden-xs"><?php echo get_phrase('date');?></th>
                                                    <th class="hidden-xs"><?php echo get_phrase('time');?> <?php echo get_phrase('in');?></th>
													
													<th class="hidden-xs"><?php echo get_phrase('time');?> <?php echo get_phrase('out');?></th>
                                                   <!-- <th class="hidden-xs"><?php echo get_phrase('overtime');?> </th>-->
                                                    <th class="hidden-xs"><?php echo get_phrase('status');?></th>
                                              		<th class="hidden-xs"><?php echo get_phrase('action');?></th>      
												</tr>
											</thead>
											<tbody>
                                            <?php 
											$i=1;
											if($this->session->userdata('current_branch'))
											{
												$attendances = $this->crud_model->get_All_List_orderBy('attendance','status,att_date,branch_id','notapproved,'.date("Y-m-d").','.$this->session->userdata('current_branch').'','att_date','DESC','10');
										}
										else{
												$attendances = $this->crud_model->get_All_List_orderBy('attendance','status,att_date','notapproved,'.date("Y-m-d").'','att_date','DESC','10');
										}


											foreach($attendances as $attendace):?>
												<tr class="gradeX">
													<td><?php echo $i ?></td>
													
													<td class="hidden-xs"><?php echo ucwords($this->crud_model->get_value_by_id('employees',$attendace['emp_id'],'fname')." ".$this->crud_model->get_value_by_id('employees',$attendace['emp_id'],'lname')); ?>
                                                    <!--<td class="hidden-xs"></td>-->
                                                    <td class="hidden-xs"><?php echo $attendace['att_date']; ?>
													</td>
                                                    <td class="hidden-xs"><?php echo $attendace['time_in']; ?></td>
													<td class="center hidden-xs"><?php echo $attendace['time_out'] ?></td>
                                                    <!--<td class="center hidden-xs"><?php echo date("h:i",strtotime(strtotime($attendace['time_out'])-strtotime($attendace['time_in']))) ?></td>-->
                                                    <td class="center hidden-xs"><?php if($attendace['status']=="approved"){$class = "success";}
													else{$class="danger";} ?><span class="label label-<?php echo $class; ?> arrow-in arrow-in-right"><?php echo ucwords($attendace['status']); ?></span></td>
                                                    <td class="center hidden-xs">
                                                    <div class="btn-group dropdown" style="margin-bottom:5px">
											<button class="btn btn-primary">Action</button>
											<button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
											<span class="caret"></span>
											</button>
											<ul class="dropdown-menu pull-right" >
                                            <li>
                                            <?php if($attendace['status']!="approved"){?>
											<a href="javascript:;" onclick="confirm_bootbox('<?=base_url().$this->session->userdata('roles')?>/attendances/approve_attendance/<?php echo $attendace['id'];?>');"><i class="fa fa-legal"></i> <?php echo get_phrase('approve')?> </a>
                                            <?php }else{?>
                                            <a href="javascript:;" onclick="confirm_bootbox('<?=base_url().$this->session->userdata('roles')?>/attendances/unapprove_attendance/<?php echo $attendace['id'];?>');"><i class="fa fa-legal"></i> <?php echo get_phrase('unapprove')?> </a>
                                            <?php }?>
											</li>
											<!--<li>
											<a href="<?php echo base_url().$this->session->userdata('roles').'/attendances/edit_attendance/'.$attendace['id'];?>"><i class="fa fa-edit"></i> <?php echo get_phrase('edit')?> </a>
											</li>
											<li>
											<a href="javascript:;" onclick="confirm_modal('<?=base_url().$this->session->userdata('roles')?>/attendances/delete_attendance/<?php echo $attendace['id'];?>');"><i class="fa fa-trash-o"></i>  <?php echo get_phrase('delete');?> </a>
											</li>-->
											</ul>
											</div></td>
												</tr>
											<?php $i++;
											endforeach;?>	
											</tbody>
											<tfoot>
												<tr>
													<th><?php echo get_phrase('s_no');?></th>
													<th class="hidden-xs"><?php echo get_phrase('employee');?></th>
                                                    <!--<th class="hidden-xs"><?php echo get_phrase('shift');?></th>-->
                                                    <th class="hidden-xs"><?php echo get_phrase('date');?></th>
                                                    <th class="hidden-xs"><?php echo get_phrase('time');?> <?php echo get_phrase('in');?></th>
													
													<th class="hidden-xs"><?php echo get_phrase('time');?> <?php echo get_phrase('out');?></th>
                                                    <!--<th class="hidden-xs"><?php echo get_phrase('overtime');?></th>-->
                                                    
                                                    <th class="hidden-xs"><?php echo get_phrase('status');?></th>
                                              		<th class="hidden-xs"><?php echo get_phrase('action');?></th>  
												</tr>
											</tfoot>
										</table>
									</div>
								</div>
								<!-- /BOX -->
							</div>
                            
                        
            			</div>
                        <div class="row">
                        <div class="col-md-12">
                         
								<!-- BOX -->
								<div class="box border pink">
									<div class="box-title">
										<h4><i class="fa fa-rocket"></i><?php echo get_phrase('all')?> <?php echo get_phrase('applications')?></h4>
										<div class="tools hidden-xs">
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
                                        
										<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th><?php echo get_phrase('s_no');?></th>
                                                    <th class="hidden-xs"><?php echo get_phrase('type');?> </th>
													<th class="hidden-xs"><?php echo get_phrase('employee');?></th>
                                                    <th class="hidden-xs"><?php echo get_phrase('applied');?> <?php echo get_phrase('on');?></th>
                                                    <th class="hidden-xs"><?php echo get_phrase('from');?> </th>
													<th class="hidden-xs"><?php echo get_phrase('to');?> </th>
                                                    <th class="hidden-xs"><?php echo get_phrase('status');?></th>
                                              		<th class="hidden-xs"><?php echo get_phrase('action');?></th>      
												</tr>
											</thead>
											<tbody>
                                            <?php 
											$i=1;
											if($this->session->userdata('current_branch'))
											{
												$applications = $this->crud_model->get_All_List_orderBy('applications','status,applied_on,branch_id','pending,'.date("Y-m-d").','.$this->session->userdata('current_branch').'','applied_on','DESC','10');
											}
											else{
													$applications = $this->crud_model->get_All_List_orderBy('applications','status,applied_on','pending,'.date("Y-m-d").'','applied_on','DESC','10');
											}
											foreach($applications as $application):?>
												<tr class="gradeA">
													<td><?php echo $i ?></td>
                                                    <td class="hidden-xs"><?php echo $this->crud_model->get_value_by_id('leaves',$application['leave_id'],'title'); ?>
													</td>
                                                    <td class="hidden-xs"><?php echo ucwords($this->crud_model->get_value_by_id('employees',$application['emp_id'],'fname')." ".$this->crud_model->get_value_by_id('employees',$application['emp_id'],'lname')); ?>
                                                    </td>
                                                    <td class="hidden-xs"><?php echo $application['applied_on']; ?></td>
													<td class="center hidden-xs"><?php echo $application['leave_from'] ?></td>
                                                    <td class="center hidden-xs"><?php echo $application['leave_to']; ?></td>
                                                    <td class="center hidden-xs"><?php if($application['status']=="approved"){$class = "success";}
													elseif($application['status']=="pending"){$class = "info";}
													else{$class="danger";} ?><span class="label label-<?php echo $class; ?> arrow-in arrow-in-right"><?php echo ucwords($application['status']); ?></span></td>
                                                    <td class="center hidden-xs">
                                                    <div class="btn-group dropdown" style="margin-bottom:5px">
											<button class="btn btn-primary">Action</button>
											<button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
											<span class="caret"></span>
											</button>
											<ul class="dropdown-menu pull-right" >
                                            <li>
											<a href="javascript:;" onclick="confirm_bootbox('<?=base_url().$this->session->userdata('roles')?>/applications/approve_application/<?php echo $application['id'];?>');"><i class="fa fa-legal"></i> <?php echo get_phrase('approve');?> </a>
                                            </li>
                                            <li>
                                            <a href="javascript:;" onclick="confirm_bootbox('<?=base_url().$this->session->userdata('roles')?>/applications/reject_application/<?php echo $application['id'];?>');"><i class="fa fa-exclamation-triangle"></i> <?php echo get_phrase('rejected')?>
                                             </a>
											</li>
											
											</ul>
											</div></td>
												</tr>
											<?php $i++;
											endforeach;?>	
											</tbody>
											<tfoot>
												<tr>
													<th><?php echo get_phrase('s_no');?></th>
                                                    <th class="hidden-xs"><?php echo get_phrase('type');?> </th>
													<th class="hidden-xs"><?php echo get_phrase('employee');?></th>
                                                    <th class="hidden-xs"><?php echo get_phrase('applied');?> <?php echo get_phrase('on');?></th>
                                                    <th class="hidden-xs"><?php echo get_phrase('from');?> </th>
													<th class="hidden-xs"><?php echo get_phrase('to');?> </th>
                                                    <th class="hidden-xs"><?php echo get_phrase('status');?></th>
                                              		<th class="hidden-xs"><?php echo get_phrase('action');?></th>  
												</tr>
											</tfoot>
										</table>
                                        
                                        
									</div>
								</div>
								<!-- /BOX -->
							</div>
                        </div>
						<!-- /NEW ORDERS & STATISTICS -->
						<!-- CALENDAR & CHAT --
						<div class="row">
							<!-- CALENDAR -->
							<!--<div class="col-md-6">
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
										<div id='calendar'></div>
									</div>
								</div>
							</div>-->
							<!-- /CALENDAR -->
							<!-- CHAT -->
							<!--<div class="col-md-6">
								<!-- BOX --
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
													<img class="media-object" alt="Generic placeholder image" src="assets/img/chat/headshot1.jpg">
												  </a>
												  <div class="media-body chat-pop">
													<h4 class="media-heading">John Doe <span class="pull-right"><i class="fa fa-clock-o"></i> <abbr class="timeago" title="Oct 9, 2013" >Oct 9, 2013</abbr> </span></h4>
													<p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
													
												  </div>
												</li>
												<li class="media">
												  <a class="pull-right" href="#">
													<img class="media-object"  alt="Generic placeholder image" src="assets/img/chat/headshot2.jpg">
												  </a>
												  <div class="pull-right media-body chat-pop mod">
													<h4 class="media-heading">You <span class="pull-left"><abbr class="timeago" title="Oct 10, 2013" >Oct 10, 2013</abbr> <i class="fa fa-clock-o"></i></span></h4></h4>
													Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
												  </div>
												</li>
												<li class="media">
												  <a class="pull-left" href="#">
													<img class="media-object"  alt="Generic placeholder image" src="assets/img/chat/headshot3.jpg">
												  </a>
												  <div class="media-body chat-pop">
													<h4 class="media-heading">Tim Row <span class="pull-right"><i class="fa fa-clock-o"></i> <abbr class="timeago" title="Oct 10, 2013" >Oct 10, 2013</abbr> </span></h4></h4>
													<p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
												  </div>
												</li>
												<li class="media">
												  <a class="pull-left" href="#">
													<img class="media-object"  alt="Generic placeholder image" src="assets/img/chat/headshot5.jpg">
												  </a>
												  <div class="media-body chat-pop">
													<h4 class="media-heading">Jenny Doe <span class="pull-right"><i class="fa fa-clock-o"></i> <abbr class="timeago" title="Oct 10, 2013" >Oct 10, 2013</abbr> </span></h4></h4>
													<p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
												  </div>
												</li>
												<li class="media">
												  <a class="pull-right" href="#">
													<img class="media-object"  alt="Generic placeholder image" src="assets/img/chat/headshot2.jpg">
												  </a>
												  <div class="pull-right media-body chat-pop mod">
													<h4 class="media-heading">You <span class="pull-left"><abbr class="timeago" title="Oct 11, 2013" >Oct 11, 2013</abbr> <i class="fa fa-clock-o"></i></span></h4></h4>
													Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
												  </div>
												</li>
												<li class="media">
												  <a class="pull-left" href="#">
													<img class="media-object"  alt="Generic placeholder image" src="assets/img/chat/headshot4.jpg">
												  </a>
												  <div class="media-body chat-pop">
													<h4 class="media-heading">Jess Doe <span class="pull-right"><i class="fa fa-clock-o"></i> <abbr class="timeago" title="Oct 12, 2013" >Oct 12, 2013</abbr> </span></h4></h4>
													<p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
												  </div>
												</li>
												<li class="media">
												  <a class="pull-right" href="#">
													<img class="media-object"  alt="Generic placeholder image" src="assets/img/chat/headshot2.jpg">
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
								<!-- /BOX --
							</div>
							<!-- CHAT --
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