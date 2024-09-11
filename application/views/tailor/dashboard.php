


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
										<!--
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
																				</span>-->
										
										<!-- /DATE RANGE PICKER -->
									</div>
									<div class="description"><?php echo get_phrase("overview"); ?>, <?php echo get_phrase("statistics"); ?>  <?php echo get_phrase("and"); ?> <?php echo get_phrase("more"); ?>  </div>
								</div>
							</div>
						</div>
						<!-- /PAGE HEADER -->
					
						<!-- NEW ORDERS & STATISTICS -->
						<div class="row">
							<!-- NEW ORDERS -->
							<div class="col-md-6">
								<div class="box border orange">
									<div class="box-title">
										<h4><i class="fa fa-tasks"></i> <span class="hidden-inline-mobile"><?php echo get_phrase('orders');?> <?php echo get_phrase('work');?></span></h4>
									</div>
									<div class="box-body">
								<div class="tabbable header-tabs">
									<ul class="nav nav-tabs">
									   <li class="active"><a href="#newOrders" data-toggle="tab"><i class="fa fa-list"></i> <span class="hidden-inline-mobile"><?php echo get_phrase('orders');?></span></a></li>
									   <li><a href="#workerOrder" data-toggle="tab"><i class="fa fa-user"></i> <span class="hidden-inline-mobile"><?php echo get_phrase('comleted');?> <?php echo get_phrase('orders');?></span></a></li>
									</ul>
									<div class="tab-content">
									   <div class="tab-pane active" id="newOrders">
										  <div class="panel panel-default">
											  <div class="panel-body orders no-opaque">
												<div class="scroller" data-height="450px" data-always-visible="1" data-rail-visible="1">
													<ul class="list-unstyled">
														<?php foreach($workerOrders as $td): 
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
																	<h5><strong>#<?php echo get_phrase('sub');?> <?php echo get_phrase('order'); ?> <?php echo $td->oid;?> (<?php echo $td->reference_no ?> )</strong> <?php echo $td->customer_name;?></h5>
																</p>
																<p><i class="fa fa-clock-o"></i> <abbr class="timeago" title="<?php echo date("M d, Y",strtotime($td->date));?>" ><?php echo date("M d, Y",strtotime($td->date));?></abbr></p>
																																
															</div>
															<div class="text-right pull-right">
																<h4 class="cost"><?php echo CURRENCY;?> <?php echo $td->sub_order_price;?></h4>
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
											 
											</div>
									   </div>
									   <div class="tab-pane" id="workerOrder">
									   	<div class="panel panel-default">
											  <div class="panel-body orders no-opaque">
										  		<div class="scroller" data-height="450px" data-always-visible="1" data-rail-visible="1">
										  	
											  <ul class="list-unstyled">
														<?php foreach($completeOrders as $cO): 
															switch ($cO->status) {
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
																	<h5><strong>#<?php echo get_phrase('sub');?> <?php echo get_phrase('order'); ?> <?php echo $cO->oid;?> (<?php echo $cO->reference_no ?> )</strong> <?php echo $cO->customer_name;?></h5>
																</p>
																<p><i class="fa fa-clock-o"></i> <abbr class="timeago" title="<?php echo date("M d, Y",strtotime($cO->date));?>" ><?php echo date("M d, Y",strtotime($cO->date));?></abbr></p>
																																
															</div>
															<div class="text-right pull-right">
																<h4 class="cost"><?php echo CURRENCY;?> <?php echo $cO->sub_order_price;?></h4>
																<p>
																	<span class="label label-<?php echo $label; ?> arrow-in-right"><i class="fa fa-check"></i> <?php if($cO->status=='to_deliver'){echo get_phrase('ready_to_deliver');}else{echo ucwords($cO->status);}?></span>
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
								<div class="box border blue">
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
												
													<table id="datatable4" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
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
														
											  </div>
											   
											</div>
									   </div>
									   <div class="tab-pane" id="notReady">
									   	<div class="panel panel-default">
											  <div class="panel-body orders no-opaque">
										   			<table id="datatable1" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
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
										<h4><i class="fa fa-calendar"></i><?php echo get_phrase('calendar'); ?></h4>
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
								<div class="box border purple">
									
									<div class="box-title">
										<h4><i class="fa fa-user"></i><?php echo get_phrase('total')?> <?php echo get_phrase('sub')?> <?php echo get_phrase('order')?> <?php echo get_phrase('report'); ?></h4>
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
										<table id="datatable3" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover" width="100%">
											<thead>
												<tr>
													<th><?php echo get_phrase('s_no');?></th>
													<th><?php echo get_phrase('sub_order');?> <?php echo get_phrase('no.');?></th>
                                                    <th ><?php echo get_phrase('item');?> <?php echo get_phrase('name');?></th>
													<th ><?php echo get_phrase('worker');?> <?php echo get_phrase('name');?></th>
                                                    <th ><?php echo get_phrase('order');?> <?php echo get_phrase('date');?></th>
                                                    <th ><?php echo get_phrase('trial');?> <?php echo get_phrase('date');?></th>
                                 					<th ><?php echo get_phrase('deliver');?> <?php echo get_phrase('date');?></th>
													
												</tr>
											</thead>
											<tbody>
                                            <?php 
											$i=1;
											
											
								
										foreach($delivers as $deliver):
												
													
													?>
												<tr class="gradeX">
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $deliver['id'];?></td>
                                                <td><?php echo $deliver['itemName']; ?></td>
                                                <td><?php echo $deliver['worker_name']; ?></td>
                                                <td><?php echo $deliver['date']; ?></td>
												<td><?php echo $deliver['trialDate']; ?></td>
                                                <td><?php echo $deliver['deliveryDate']; ?></td>
                                              
												</tr>
											<?php $i++;
											endforeach;?>	
											</tbody>
											<tfoot>
												<tr>
													<th><?php echo get_phrase('s_no');?></th>
													<th><?php echo get_phrase('sub_order');?> <?php echo get_phrase('no.');?></th>
                                                    <th ><?php echo get_phrase('item');?> <?php echo get_phrase('name');?></th>
													<th ><?php echo get_phrase('worker');?> <?php echo get_phrase('name');?></th>
                                                    <th ><?php echo get_phrase('order');?> <?php echo get_phrase('date');?></th>
                                                    <th ><?php echo get_phrase('trial');?> <?php echo get_phrase('date');?></th>
                                 					<th ><?php echo get_phrase('deliver');?> <?php echo get_phrase('date');?></th>
												</tr>
										</tfoot>
										</table>
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
<script>
$(function () {
		
	
		/* initialize the calendar
		-----------------------------------------------------------------*/
		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();
		
		var calendar = $('#calendarDash').fullCalendar({
			//theme: true,
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
	        //droppable: false,
	        editable: false,
			events: [
				<?php $i=1; foreach($getEvents as $gE){if($i%2=='0'){$color = 'blue';}else{$color='green';}?>
				{
					id: <?php echo $gE->id; ?>,
					title: '<?php echo html_entity_decode($gE->data); ?>',
					start: new Date('<?php echo $gE->date; ?>'),
					end: new Date('<?php echo $gE->end; ?>'),
					allDay: true,
					backgroundColor: Theme.colors.<?php echo $color; ?>,
				},
				<?php $i++;}?>
			]
		});
		
});
</script>