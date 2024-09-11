<?php
		foreach($monthly_sales as $month_sale) {
		$months[] = date('M-Y', strtotime($month_sale->month));
		$sales[] = $month_sale->orders;
		$tax1[] = $month_sale->tax1;
		$tax2[] = $month_sale->tax2;
		$purchases[] = $month_sale->purchases;
		$tax3[] = $month_sale->ptax;
		
		}
		/*-----------------YEARLY PROFIT REPORTS/AVERAGE INVOICES----------------*/
		 foreach($yearly_profit as $k => $year_profit) {
		$years[] = $year_profit->year;
		$yorders[] = $year_profit->orders;
		$ypurchases[] = $year_profit->purchases;
		$yprofits[] = $year_profit->orders-$year_profit->purchases;
		}
		 
		 /*-----------------AVERAGE INVOICES----------------*/
		 foreach($averageInvoice as $ai) {
		$aiyears[] = $ai->year;
		$aiorders[] = $ai->orders;
		$aiorder_items[] = $ai->order_items;
		
		$ai->order_items/$ai->orders;
		$ainvoices[] =  round($ai->order_items/$ai->orders);
		}
		
?>   
<style>
.table th { text-align:center; }
.table td { text-align:center; }
.table a:hover { text-decoration: none; }
.cl_wday { text-align: center; font-weight:bold; }
.cl_equal { width: 14%; }
.day { width: 14%; }
.day_num { width: 100%; text-align:left; margin: -8px; padding:8px; } 
.content { width: 100%;text-align:left; color: #2FA4E7; margin-top:10px; }
.highlight { color: #0088CC; font-weight:bold; }
#eann { display:inline-block; }
</style>
<script type="text/javascript">
$(function () {
		
		Highcharts.setOptions({
		  colors: ['#F38630', '#A696CE', '#D9534F', '#A8BC7B','#70AFC4','#F0AD4E','#D4E5DE','#5E87B0']
		});
		
		
		$('#chart').highcharts({
            chart: {
            },
			credits: {
			  	enabled: false
			},
            title: {
                text: '<?php echo get_phrase("monthly_sales_purchases"); ?>'
            },
            xAxis: {
                categories: [<?php foreach($months as $month) {
					 echo "'".$month."', ";
				 }
				?>]
            },
			yAxis: {
                min: 0,
                title: ""
            },
			tooltip: {
				shared: true,
				headerFormat: '<span style="font-size:14px">{point.key}</span><table>',
                pointFormat: '<tr style="border-bottom: 1px dotted {series.color};"><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="color:{series.color};padding:0;text-align:right;"><?php echo CURRENCY; ?> <b>{point.y}</b></td></tr>',
                footerFormat: '</table>',
                useHTML: true,
				valueDecimals: 2,
				style: {
					fontSize: '13px',
					padding: '10px',
					fontWeight: 'bold',
					color: '#000000'
				}
            },
            series: [{
                type: 'column',
                name: '<?php echo get_phrase("sold"); ?> <?php echo get_phrase("product"); ?> <?php echo get_phrase("tax"); ?>',
                data: [<?php 
				echo implode(', ', $tax1);
				?>]
            },
			{
                type: 'column',
                name: '<?php echo get_phrase("invoice"); ?> <?php echo get_phrase("tax"); ?>',
                data: [<?php 
				echo implode(', ', $tax2);
				?>]
            },
			{
                type: 'column',
                name: '<?php echo get_phrase("sales"); ?>',
                data: [<?php 
				echo implode(', ', $sales);
				?>]
            },  {
                type: 'spline',
                name: '<?php echo get_phrase("purchases"); ?>',
                data: [<?php 
				echo implode(', ', $purchases);
				?>],
                marker: {
                	 lineWidth: 2,
                    states: {
                        hover: {
                            lineWidth: 4
                        }
                    },
                	lineColor: Highcharts.getOptions().colors[3],
                	fillColor: 'white'
                }
            },  {
                type: 'spline',
                name: '<?php echo get_phrase("purchase"); ?> <?php echo get_phrase("product"); ?> <?php echo get_phrase("tax"); ?>',
                data: [<?php 
				echo implode(', ', $tax3);
				?>],
                marker: {
                	 lineWidth: 2,
                    states: {
                        hover: {
                            lineWidth: 4
                        }
                    },
                	lineColor: Highcharts.getOptions().colors[3],
                	fillColor: 'white'
                }
            }, {
                type: 'pie',
                name: '<?php echo get_phrase("stock"); ?> <?php echo get_phrase("value"); ?>',
                data: [
				['',   0],
				['',   0],
                    ['<?php echo get_phrase("by"); ?> <?php echo get_phrase("price"); ?>',   <?php echo $stock->stock_by_price; ?>],
                    ['<?php echo get_phrase("by"); ?> <?php echo get_phrase("cost"); ?>',   <?php echo $stock->stock_by_cost; ?>],
                ],
                center: [20, 0],
                size: 80,
                showInLegend: false,
                dataLabels: {
                    enabled: false
                }
            }]
        });
    });

/*--------------YEARLY PROFIT-----------*/
$(function () {		
		$('#yearlychart').highcharts({
            chart: {
            },
			credits: {
			  	enabled: false
			},
            title: {
                text: '<?php echo get_phrase("yearly"); ?> <?php echo get_phrase("profit"); ?>'
            },
            xAxis: {
                categories: [<?php foreach($years as $year) {
					 echo "'".$year."', ";
				 }
				?>]
            },
			yAxis: {
                min: 0,
                title: ""
            },
           
			tooltip: {
				shared: true,
				headerFormat: '<span style="font-size:14px">{point.key}</span><table>',
                pointFormat: '<tr style="border-bottom: 1px dotted {series.color};"><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="color:{series.color};padding:0;text-align:right;"><?php echo CURRENCY; ?> <b>{point.y}</b></td></tr>',
                footerFormat: '</table>',
                useHTML: true,
				valueDecimals: 2,
				style: {
					fontSize: '13px',
					padding: '10px',
					fontWeight: 'bold',
					color: '#000000'
				}
            },
            series: [{
                type: 'column',
                name: '<?php echo get_phrase("total"); ?> <?php echo get_phrase("sales"); ?>',
                data: [<?php 
				echo implode(', ', $yorders);
				?>]
            },
			{
                type: 'column',
                name: '<?php echo get_phrase("total"); ?> <?php echo get_phrase("purchases"); ?>',
                data: [<?php 
				echo implode(', ', $ypurchases);
				?>]
            },
			{
                type: 'column',
                name: '<?php echo get_phrase("profit"); ?>',
                data: [<?php 
				echo implode(', ', $yprofits);
				?>]
            }]
        });
    });

/*--------------YEARLY AVARAGE INVOICE -----------*/
$(function () {		
		$('#yearlyAvaragechart').highcharts({
            chart: {
            },
			credits: {
			  	enabled: false
			},
            title: {
                text: '<?php echo get_phrase("yearly"); ?> <?php echo get_phrase("avarage"); ?> <?php echo get_phrase("invoice"); ?>'
            },
            xAxis: {
                categories: [<?php foreach($aiyears as $aiyear) {
					 echo "'".$aiyear."', ";
				 }
				?>]
            },
			yAxis: {
                min: 0,
                title: ""
            },
			tooltip: {
				shared: true,
				headerFormat: '<span style="font-size:14px">{point.key}</span><table>',
                pointFormat: '<tr style="border-bottom: 1px dotted {series.color};"><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="color:{series.color};padding:0;text-align:right;"> <b>{point.y}</b></td></tr>',
                footerFormat: '</table>',
                useHTML: true,
				style: {
					fontSize: '13px',
					padding: '10px',
					fontWeight: 'bold',
					color: '#000000'
				}
            },
            series: [{
                type: 'column',
                name: '<?php echo get_phrase("total"); ?> <?php echo get_phrase("invoices"); ?>',
                data: [<?php 
				echo implode(', ', $aiorders);
				?>]
            },
			{
                type: 'column',
                name: '<?php echo get_phrase("total"); ?> <?php echo get_phrase("sold"); ?> <?php echo get_phrase("items"); ?>',
                data: [<?php 
				echo implode(', ', $aiorder_items);
				?>]
            },
            {
                type: 'column',
                name: '<?php echo get_phrase("avarage"); ?> <?php echo get_phrase("invoice"); ?>',
                data: [<?php 
				echo implode(', ', $ainvoices);
				?>]
            }]
        });
    });


/*--------------------------STOCK OVER SEA CHART------------------------*/
$(function () {
    	
		function currencyFormate(x) {
					var parts = x.toString().split(".");
				   return  parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",")+(parts[1] ? "." + ((parts[1].length == 1) ? parts[1]+'0' : parts[1]) : ".00");
					 
				}
				
		$('#profitChart').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
           plotShadow: false
        },
        title: {
                text: '<?php echo get_phrase("stock"); ?> <?php echo get_phrase("value"); ?> <?php echo get_phrase("overseas"); ?>'
            },
		credits: {
			  	enabled: false
			},
		tooltip: {
				shared: true,
				backgroundColor: '#FFF',
				headerFormat: '<span style="font-size:15px background-color: #FFF;">{point.key}</span><br>',
                pointFormat: '<span style="color:{series.color};padding:0;text-align:right;"><?php echo CURRENCY; ?> <b>{point.y}</b> ({point.percentage:.2f}%)</span>',
                footerFormat: '',
                useHTML: true,
				valueDecimals: 2,
				style: {
					fontSize: '13px',
					padding: '10px',
					color: '#000000'
				}
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false,
                    },
                    showInLegend: true
                }
            },			
        series: [{
            type: 'pie',
            name: '<?php echo get_phrase("stock"); ?> <?php echo get_phrase("value"); ?>',
            data: [
                    ['<?php echo get_phrase("stock"); ?> <?php echo get_phrase("value"); ?> <?php echo get_phrase("by"); ?> <?php echo get_phrase("price"); ?>',   <?php echo $stock->stock_by_price; ?>],
                    ['<?php echo get_phrase("stock"); ?> <?php echo get_phrase("value"); ?> <?php echo get_phrase("by"); ?> <?php echo get_phrase("cost"); ?>',   <?php echo $stock->stock_by_cost; ?>],
					['<?php echo get_phrase("profit"); ?> <?php echo get_phrase("estimate"); ?>',   <?php echo ($stock->stock_by_price - $stock->stock_by_cost); ?>],	
                ]
		
        }]
    });
	
    });

/*--------------------------ORDER CHART------------------------*/
$(function () {
    				
		$('#orderChart').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
           plotShadow: false
        },
        title: {
                text: ''
            },
		credits: {
			  	enabled: false
			},
		tooltip: {
				shared: true,
				backgroundColor: '#FFF',
				headerFormat: '<span style="font-size:15px background-color: #FFF;">{point.key}</span><br>',
                pointFormat: '<span style="color:{series.color};padding:0;text-align:right;"><b>{point.y}</b> ({point.percentage:.2f}%)</span>',
                footerFormat: '',
                useHTML: true,
				style: {
					fontSize: '13px',
					padding: '10px',
					color: '#000000'
				}
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false,
                    },
                    showInLegend: true
                }
            },			
        series: [{
            type: 'pie',
            name: '<?php echo get_phrase("stock"); ?> <?php echo get_phrase("value"); ?> ',
            data: [
                    ['<?php echo get_phrase("today_ready_order"); ?>',   <?php echo count($todayReadyOrders); ?>],
                    ['<?php echo get_phrase("today_not_ready_order"); ?>',   <?php echo count($todayNotReadyOrders); ?>],
					['<?php echo get_phrase("today_new_order"); ?>',   <?php echo count($todaysOrders); ?>],
					['<?php echo get_phrase("events"); ?>',   <?php echo count($getEvents); ?>],
					['<?php echo get_phrase("worker").' '.get_phrase("status"); ?>',   <?php echo count($workerOrders); ?>],
					['<?php echo get_phrase("new").' '.get_phrase("customers"); ?>',   <?php echo count($newCustomer); ?>],
					['<?php echo get_phrase("active").' '.get_phrase("customers"); ?>',   <?php echo count($activeCustomer); ?>],
                ]
		
        }]
    });
	
    });

</script>
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
						<!-- DASHBOARD CONTENT -->
						<div class="row">
							<!-- COLUMN 1 -->
							<div class="col-md-12">
								<div class="box border purple">
									<div class="box-title">
										<h4><i class="fa fa-dollar"></i><?php echo get_phrase("monthly_sales_purchases"); ?></h4>
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
										
										<div id="chart" class="chart"></div>
										
									</div>
								</div>							
															
							</div>
							
							<!-- /COLUMN 1 -->
						</div>
					   <!-- /DASHBOARD CONTENT -->
					   <div class="row">
					   	
					   		<div class="col-md-6">
								<div class="box border red">
									<div class="box-title">
										<h4><i class="fa fa-money"></i><?php echo get_phrase("yearly"); ?> <?php echo get_phrase("profit"); ?></h4>
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
										
										<div id="yearlychart" class="chart"></div>
										
									</div>
								</div>							
															
							</div>
							
							<div class="col-md-6">
								<div class="box border blue">
									<div class="box-title">
										<h4><i class="fa fa-money"></i><?php echo get_phrase("yearly"); ?> <?php echo get_phrase("avarage"); ?> <?php echo get_phrase("invoice"); ?></h4>
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
										
										<div id="yearlyAvaragechart" class="chart"></div>
										
									</div>
								</div>							
															
							</div>
					   	
					   </div>
					   <div class="row">
							<!-- CALENDAR -->
							<div class="col-md-6">
								<div class="box border primary">
									<div class="box-title">
										<h4><i class="fa fa-bar-chart-o"></i><?php echo get_phrase('stock'); ?> <?php echo get_phrase('overseas'); ?></h4>
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
										<div id='profitChart'></div>
									</div>
								</div>
							</div>
							<!-- /CALENDAR -->
							<!-- CHAT -->
							<div class="col-md-6">
								<!-- BOX -->
								<div class="box border green">
									<div class="box-title">
										<h4><i class="fa fa-bar-chart-o"></i> <?php echo get_phrase('chart'); ?></h4>
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
										<div id='orderChart'></div>
										
									</div>
								</div>
								<!-- /BOX -->
							</div>
							<!-- CHAT -->
						</div>
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
													<?php echo get_phrase('working'); ?> <?php echo get_phrase('on'); ?> <?php echo get_phrase('suborders'); ?>
													<br/>												
													<a class="user" href="<?php echo base_url(); ?><?php echo $roles; ?>/report/track_worker_report/<?php echo $workerOrder->empId; ?>"> <?php echo get_phrase('view'); ?> </a>
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
										                          <th><?php echo get_phrase('no'); ?> <?php echo get_phrase('of'); ?> <?php echo get_phrase('suborder'); ?></th>
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
										                          <td><span class="label label-success arrow-in-right"><i class="fa fa-check"></i> <?php echo get_phrase('ready'); ?> <?php echo get_phrase('to'); ?> <?php echo get_phrase('deliver'); ?></span></td>
										                         </tr>
										                          <?php endforeach; ?>                      
										                        </tbody>
										                      <tfoot>
										                        <tr>
										                          <th><?php echo get_phrase('ref_no'); ?></th>
										                          <th><?php echo get_phrase('customer'); ?></th>
																  <th><?php echo get_phrase('delivery'); ?> <?php echo get_phrase('date'); ?></th>
										                          <th><?php echo get_phrase('no'); ?> <?php echo get_phrase('of'); ?> <?php echo get_phrase('suborder'); ?></th>
										                          <th><?php echo get_phrase('status'); ?></th>
										                         </tr>
										                      </tfoot>
										                    </table>
														<div class="col-sm-12 center">													  
														<a href="<?php echo base_url(); ?><?php echo $roles; ?>/today_ready_order" class="btn btn-success btn-sm"><?php echo get_phrase('view'); ?> <?php echo get_phrase('all'); ?></a>
														<div>&nbsp;</div>
														</div>
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
										                          <th><?php echo get_phrase('no'); ?> <?php echo get_phrase('of'); ?> <?php echo get_phrase('suborder'); ?></th>
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
										                          <th><?php echo get_phrase('no'); ?> <?php echo get_phrase('of'); ?> <?php echo get_phrase('suborder'); ?></th>
										                          <th><?php echo get_phrase('status'); ?></th>
										                         </tr>
										                      </tfoot>
										                    </table>
														<div class="col-sm-12 center">													  
														<a href="<?php echo base_url(); ?><?php echo $roles; ?>/date_today_not_ready" class="btn btn-success btn-sm"><?php echo get_phrase('view'); ?> <?php echo get_phrase('all'); ?></a>
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
								<div class="box border red">
									<div class="box-title">
										<h4><i class="fa fa-barcode"></i><?php echo get_phrase('product'); ?> <?php echo get_phrase('alert'); ?></h4>
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
										<table id="datatable3" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
										                      <thead>
										                        <tr>
										                          <th><?php echo get_phrase('style'); ?></th>
										                          <th><?php echo get_phrase('type'); ?></th>
																  <th><?php echo get_phrase('qty'); ?> </th>
										                          <th><?php echo get_phrase('alert'); ?> <?php echo get_phrase('qty'); ?></th>
										                          <th><?php echo get_phrase('image'); ?></th>
										                         </tr>
										                      </thead>
										                      <tbody>
										                      	<?php foreach($cDOP as $cdop):  ?>
										                           <tr class="gradeX">
										                          <td><?php echo $this->crud_model->get_rowValue_by_CustomField('cloth_styles','id',$cdop->cloth_style_id)->title;?></td>
										                          <td><?php echo  $this->crud_model->get_rowValue_by_CustomField('cloth_types','id',$cdop->cloth_type_id)->title;?></td>
																  <td><?php echo $cdop->quantity; ?></td>
										                          <td><?php echo $cdop->alert_quantity; ?></td>
										                          <td><span ><img class="media-object roundicon" height="40" width="40" src="<?php echo base_url();?>uploads/products/<?php echo $cdop->image;?>" alt="" /></span></td>
										                         </tr>
										                          <?php endforeach; ?>                      
										                        </tbody>
										                      <tfoot>
										                        <tr>
										                          <th><?php echo get_phrase('style'); ?></th>
										                          <th><?php echo get_phrase('type'); ?></th>
																  <th><?php echo get_phrase('qty'); ?> </th>
										                          <th><?php echo get_phrase('alert'); ?> <?php echo get_phrase('qty'); ?></th>
										                          <th><?php echo get_phrase('image'); ?></th>
										                         </tr>
										                      </tfoot>
										                    </table>
										<div class="divide-20"></div>
										
									</div>
								</div>
								<!-- /BOX -->
							</div>
							<!-- CHAT -->
						</div>
						<!-- /CALENDAR & CHAT -->
						<div class="footer-tools">
							<span class="go-top">
								<i class="fa fa-chevron-up"></i> <?php echo get_phrase('top'); ?>
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
			selectable: true,
			selectHelper: true,
			//disableDragging: true,
			select: function(start, end, allDay) {
				bootbox.prompt('<?php echo get_phrase('events') ?> <?php echo get_phrase('title') ?>:',function(gotit){
				if (gotit) {
					 $.ajax({
                         type: "post",
                                 async: false,
                                 url: "<?php echo base_url();?><?php echo $roles; ?>/addEvents",
                                 data: {  'title':gotit, 'start':start, 'end':end },
                                 success: function(data) {
                                     calendar.fullCalendar('renderEvent',
										{
											title: gotit,
											start: start,
											end: end,
											allDay: allDay
										},
										true // make the event "stick"
									);
                                 },                       
                         });
			}});
				calendar.fullCalendar('unselect');
			},
			eventMouseover: function(event, jsEvent, view) {
	                $(jsEvent.target).attr('title', event.title);
	                $('.fc-event').css('cursor', 'pointer');  
        	},
			eventClick: function(calEvent, jsEvent, view)
	        {
	             bootbox.confirm("<?php echo get_phrase('are_you_sure_to_delete') ?> " + calEvent.title, function(got){
	             	if (got)
		              {
		              	$.ajax({
                         type: "post",
                                 async: false,
                                 url: "<?php echo base_url();?><?php echo $roles; ?>/deleteEvents",
                                 data: {  'id':calEvent._id},
                                 success: function(data) {
                                 	if(data){
                                      $('#calendarDash').fullCalendar('removeEvents', calEvent._id);                                     
                                     }
                                 },                       
                         });		          
		              }
	             });
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
