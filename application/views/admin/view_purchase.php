<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title><?php echo $page_title." ".get_phrase("no")." ".$inv->id;?> | <?php echo SYSTEM_TITLE;?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
	<meta name="description" content="<?php echo SYSTEM_NAME;?>">
	<meta name="author" content="Kumar Jitendra">
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/cloud-admin.css" >
	<link rel="stylesheet" type="text/css"  href="<?php echo base_url();?>assets/css/themes/<?php echo THEME;?>.css" >
	<link rel="stylesheet" type="text/css"  href="<?php echo base_url();?>assets/css/responsive.css" >
	<!-- PRINT -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/print.css" media="print"/>
	<link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- FONTS -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
</head>
<body>
	<!-- PAGE -->
	<section id="page">
        <div class="container">
				<div class="row">
					<div id="content" class="col-lg-12">
						<!-- INVOICE -->
						<div class="row">
							<div class="col-md-12">
								<!-- BOX -->
								<div class="box">
									<div class="box-title"><!--<h4><i class="fa fa-shopping-cart"></i>Invoice</h4>-->&nbsp;</div>
									<div class="box-body">
										<div class="panel panel-default">
										  <div class="panel-body">
											<div class='row'>
												<div class='col-md-12'>
													<div class="invoice-header clearfix">
														<h3 class='pull-left'>
														  <i class='fa fa-money'></i>
														  <span><?php echo get_phrase('purchase');?> <?php echo get_phrase('order');?></span>
														  <span class='text-muted'>#<?php echo $inv->id;?></span>
														</h3>
														<div class='pull-right'>
														  <!--<div class='btn-group'>-->
															<img src="<?php echo $this->crud_model->get_image_url('',SYSTEM_LOGO);?>" alt="<?php echo SYSTEM_TITLE;?>" class="img-responsive" height="30" width="120">
														  <!--</div>-->
														</div>
													</div>
												</div>
											</div>
											<hr>
											<div class='row'>
												<div class='col-md-4 seller'>
												  <div class='invoice-title'><?php echo SYSTEM_TITLE;?></div>
												  <i class='fa fa-female'></i>
												  <address>
													<strong><?php echo SYSTEM_NAME;?></strong>
													<br>
													<?php echo ADDRESS;?>
													<br>
													 <small><?php echo SYSTEM_EMAIL;?></small>
													<br>
													<small></i> <?php echo PHONE;?></small>
												  </address>
												</div>
												<div class='col-md-4 buyer'>
												  <div class='invoice-title'><?php if($supplier->company != "-") { echo $supplier->company; } else { echo $supplier->fname.' '.$supplier->lname; } ?></div>
												  <i class='fa fa-male'></i>
												  <address>
													<strong><?php if($supplier->company != "-") { echo $supplier->fname.' '.$supplier->lname; } ?>
                                                    </strong>
                                                    <br/>
                                                    <?php echo $supplier->address.",<br />".$supplier->city.", ".$this->crud_model->get_value_by_id('states',$supplier->state,$field='name').", ".$supplier->postal_code.",<br />".$this->crud_model->get_value_by_id('countries',$supplier->country,$field='name');  
echo '<br/><small>'.$supplier->email.' </small><br/>';
	echo "<small>". $supplier->mobile."</small>"; 
	?>
												  </address>
												</div>
												<div class='col-md-4 payment-info'>
												  <div class='invoice-title text-muted'><?php echo get_phrase('purchase');?> <?php echo get_phrase('details');?></div>
												  <div class="well">
													  <strong><?php echo get_phrase('purchase');?> <?php echo get_phrase('date');?>: </strong> <?php echo date(PHP_DATE, strtotime($inv->date)); ?>
													  <br>
													  <strong><?php echo get_phrase('ref_no');?>: </strong> <?php echo $inv->reference_no; ?>
													  <br>
													  <strong><?php echo get_phrase('requistioner');?>: </strong> 
													  <br>
													  <strong><?php echo get_phrase('fob');?> <?php echo get_phrase('points');?>: </strong> <!--153462792SHFD-->
													  <br>
													  <strong><?php echo get_phrase('terms');?>: </strong> <!--37464-FDRE-AHF65-->
												  </div>
												</div>
											  </div>
										  </div>
										  <!-- COST TABLE -->
							<table class="table table-striped table-hover font-400 font-14">
											<thead>
											  <tr>
												<th><?php echo get_phrase('no');?></th>
												<th><?php echo get_phrase('description');?> (<?php echo get_phrase('code');?>)</th>
												<th>
												  <div class='text-center'><?php echo get_phrase('qty');?></div>
												</th>
												<th>
												  <div class='text-right'><?php echo get_phrase('unit');?> <?php echo get_phrase('cost');?></div>
												</th>
                                                <?php if(TAX1) {?>
                                                 <th>
												  <div class='text-right'><?php echo get_phrase('tax');?></div>
												</th>
                                                <?php }?>
												<th>
												  <div class='text-right'><?php echo get_phrase('total');?> <?php echo get_phrase('price');?></div>
												</th>
											  </tr>
											</thead>
											<tbody>
											  <?php $r = 1; 
											  foreach ($rows as $row):?>
                                                <tr>
                                                    <td><?php echo $r; ?></td>
                                                    <td>
                                                   
													<?php echo $row['product_name']." (".$row['product_code'].")"; ?>
                                                    
                                                    </td>
                                                    <td><div class='text-center'><?php echo $row['quantity']; ?></div></td>
                                                    <td>
                                                    <div class='text-right'>
													<?php echo $this->crud_model->formatMoney($row['unit_price']); ?>
                                                    </div>
                                                    </td>
                                                    <?php if(TAX1) { echo '<td>
													<div class="text-right"><!--<small>('.$row['tax'].')</small>--> '.$row['val_tax'].'</div></td>'; } ?>
                                                    <td>
                                                    <div class='text-right'>
													<?php echo $this->crud_model->formatMoney($row['gross_total']); ?>
                                                    </div>
                                                    </td> 
                                                </tr> 
											<?php 
                                                $r++; 
                                                endforeach;
                                            ?>
											  
                                              
											<?php $col = 4; if(TAX1) { $col += 1; } ?>
                                            <?php if(TAX1) { ?>
                                            <tr>
                                            <td colspan="<?php echo $col; ?>" style="text-align:right; padding-right:10px;">
                                            <?php echo get_phrase("total"); ?> (<?php echo CURRENCY; ?>)</td>
                                            <td style="text-align:right; padding-right:10px;">
                                            <?php echo $this->crud_model->formatMoney($inv->inv_total); ?></td>
                                            </tr>
                                            <?php echo '<tr><td colspan="'.$col.'" style="text-align:right; padding-right:10px;;">'.get_phrase("product").' '.get_phrase("tax").' ('. CURRENCY.')</td>
                                            <td style="text-align:right; padding-right:10px;">'.$this->crud_model->formatMoney($inv->total_tax).'</td>
                                            </tr>'; } ?>
                                            <tr>
                                            <td colspan="<?php echo $col; ?>" style="text-align:right; padding-right:10px; font-weight:bold;">
                                            <?php echo get_phrase("total").' '.get_phrase("amount"); ?> (<?php echo CURRENCY; ?>)</td>
                                            <td class='text-right'>
                                            <strong><?php echo $this->crud_model->formatMoney($inv->total); ?></strong>
                                            </td>
                                            </tr>
											</tbody>
										  </table>
										  <!-- /COST TABLE -->
										  <!-- FOOTER -->
										  <hr>
										  <div class="panel-body">
											  <div class='row'>
                                                <div class='col-sm-12'>
                                                  <div class='text-right font-400 font-14'>
													<h2 class="amount"><?php echo get_phrase("total").' '.get_phrase("amount"); ?> : <?php echo CURRENCY.' '.$this->crud_model->formatMoney($inv->total); ?></h2>
												  <br/>
												  <div class='btn-group hidden-xs pull-right invoice-btn-group'>
													  <a class="btn btn-lg btn-default" onclick="javascript:window.print();"><i class="fa fa-print"></i> <?php echo get_phrase("print"); ?></a>
													  <!--<a class="btn btn-lg btn-info">Submit Your Invoice <i class="fa fa-external-link-square"></i></a>-->
												  </div>
												  <div class='btn-group visible-xs pull-right invoice-btn-group'>
													  <a class="btn btn-default" onclick="javascript:window.print();"><i class="fa fa-print"></i> <?php echo get_phrase("print"); ?></a>
													  <!--<a class="btn btn-primary">Submit Your Invoice <i class="fa fa-external-link-square"></i></a>-->
												  </div>
												  </div>
												</div>
												<div class='col-sm-12'>
                                                 <div class='col-sm-6'>
												  <div class='text-left font-400 font-14'>
													<h4><?php echo get_phrase("order").' '.get_phrase("by"); ?> : <?php echo $inv->user; ?></h4>
                                                    <div style="border-bottom: 1px solid #666;">&nbsp;</div>
                                                    <p><?php echo get_phrase("signature")." &amp; ".get_phrase("stamp");?></p>
												  </div>
                                                  </div>
												  <div class='col-sm-6'>
                                                  <div class='text-right font-400 font-14'>
													 <?php if($inv->note || $inv->note != "") { ?>
	<p>&nbsp;</p>
	<p><span style="font-weight:bold; font-size:14px; margin-bottom:5px;"><?php echo get_phrase("note"); ?>:</span></p>
	<p><?php echo html_entity_decode($inv->note); ?></p>
	
    <?php } ?>
												  </div>
                                                  </div>
												</div>
											  </div>
										  </div>
										  <!-- /FOOTER -->
										  <hr>
										  <div class="divide-100"></div>
										</div>
									</div>
								</div>
								<!-- /BOX -->
							</div>
						</div>
						<!-- /INVOICE -->
					</div><!-- /CONTENT-->
				</div>
			</div>
	</section>
	<!--/PAGE -->
	<!-- JAVASCRIPTS -->
	<!-- JQUERY -->
	<script src="<?php echo base_url();?>assets/js/jquery/jquery-2.0.3.min.js"></script>
	<!-- JQUERY UI-->
	<script src="<?php echo base_url();?>assets/js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
	<!-- BOOTSTRAP -->
	<script src="<?php echo base_url();?>assets/bootstrap-dist/js/bootstrap.min.js"></script>
	<!-- SLIMSCROLL -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.min.js"></script>
	
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jQuery-slimScroll-1.3.0/slimScrollHorizontal.min.js"></script>
	<!-- /JAVASCRIPTS -->
</body>
</html>