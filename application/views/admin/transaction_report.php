
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
                            <li>
                                <a href=""><?php echo get_phrase('report');?></a>
                            </li>
                            <li><?php echo get_phrase($page_title)?></li>
                        </ul>
                        <!-- /BREADCRUMBS -->
                        <div class="clearfix">
                            <h3 class="content-title pull-left"><?=ucwords($page_title)?></h3>
                        </div>
                        <!--<div class="description"><?php echo get_phrase('all_lists_shows_here')?></div>-->
                    </div>
                </div>
            </div>
            <!-- /PAGE HEADER -->
		   <?php if($this->session->flashdata('flash_message')){ echo "<div class=\"alert alert-block alert-success fade in\"><a class=\"close\" data-dismiss=\"alert\" href=\"#\" aria-hidden=\"true\">×</a><h4><i class=\"fa fa-heart\"></i>". $this->session->flashdata('flash_message')."</h4></div>";
             }?>
            <?php if(!$showpt):?>
            <?php if($message) { echo "<div class=\"alert alert-block alert-danger fade in\"><a href=\"#\" class=\"close\" aria-hidden=\"true\" data-dismiss=\"alert\">×</a><h4><i class=\"fa fa-times\"></i> ". get_phrase('oh_snap_error')."</h4><p>" . $message . "</p></div>"; } ?>
            <div class="row">
                <div class="col-md-12">
                    <!-- BOX -->
                    <div class="box border red" id="formWizard">
                        <div class="box-title">
                            <h4><i class="fa fa-search"></i><?php echo get_phrase('transaction');?> <?php echo get_phrase('report');?></h4>
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
                        
                        <div class="box-body form">
                            <div class="clearfix">
                                <h6 class="content-title pull-left"></h6>
                            </div>
           
           <p>
<?php echo form_open('admin/report/transaction_detail' , array('id' => 'searchFrom', 'class' => 'form-horizontal'));?>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"> <?php echo get_phrase('from');?>  <span class="required"></span></label>
                                           <div class="col-md-3">
<!--                                              <input type="text" class="form-control input-sm" name="item" value="<?php echo $cond_item; ?>" readonly/>
-->                                           <?php echo form_input('from_date', date('d-m-Y'), 'class="form-control tip-right date" id="from_date" '); ?>
                                                 
                                              <span class="error-span"></span>
                                              
                                           </div>
                                           
                                        </div>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"> <?php echo get_phrase('to');?> <span class="required"></span></label>
                                           <div class="col-md-3">
<!--                                              <input type="text" class="form-control" name="pattern" value="<?php echo $row['pattern']; ?>" />
-->                                            
											<?php echo form_input('to_date',date('d-m-Y'), 'class="form-control
tip-right date" id="to_date" required="required" '); ?>  
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                        
                               <div class="form-actions clearfix">
                                  <div class="row">
                                     <div class="col-md-12">
                                        <div class="col-md-offset-3 col-md-9">
                                         <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> <?php echo get_phrase('search');?> </button>
                                        </div>
                                     </div>
                                  </div>
                               </div>
							
						 
						 
						 <?php echo form_close();?>
                        </div>
                    </div>
                    <!-- /BOX -->
                </div>
            </div>
            <?php endif;?>
          
            <div class="row">
                <div class="col-md-6">
								<!-- BOX -->
								<div class="box border purple">
									
									<div class="box-title">
										<h4><i class="fa fa-user"></i><?php echo get_phrase('debit')?> <?php echo get_phrase('report'); ?></h4>
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
													<th><?php echo get_phrase('date');?></th>
													<th><?php echo get_phrase('particular');?></th>
                                                    <th><?php echo get_phrase('amount');?></th>
                                                     
												</tr>
											</thead>
											<tbody>
                                            <?php 
											$i=1;
											$total = 0;
											foreach($debit_amounts as $debit_amount):
											
											?>
												<tr class="gradeX">
													<td><?php echo $i ?></td>
													<td><?php echo $debit_amount['date']; ?></td>
													<td><?php echo $debit_amount['supplier_name']; ?></td>
                                                    <td><?php echo $debit_amount['total']; ?></td>
                                                    <?php $tot=$debit_amount['total']; $total = $total + $tot; ?>
												</tr>
											<?php $i++;
											endforeach;
											
											?>	
											</tbody>
											
											<tfoot>
												<tr>
													<th><?php echo get_phrase('s_no');?></th>
													<th><?php echo get_phrase('date');?></th>
													<th><?php echo get_phrase('particular');?></th>
                                                    <th><?php echo get_phrase('amount');?></th>
                                                     
												</tr>
											</tfoot>
											<table>
										<tr align="right">
										<strong><?php echo get_phrase('total_amount:')?></strong> <?php echo CURRENCY.' '.$total; ?>
										</tr>
								
										</table>
										</table>
									</div>
								</div>
								
								
								<!-- /BOX -->
							</div>
                            
                <div class="col-md-6">
								<!-- BOX -->
								<div class="box border purple">
									
									<div class="box-title">
										<h4><i class="fa fa-user"></i><?php echo get_phrase('credit')?> <?php echo get_phrase('report'); ?></h4>
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
										<table id="datatable4" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover" width="100%">
											<thead>
												<tr>
													<th><?php echo get_phrase('s_no');?></th>
													<th><?php echo get_phrase('date');?></th>
													<th><?php echo get_phrase('particular');?></th>
                                                    <th><?php echo get_phrase('amount');?></th>
                                                     
												</tr>
											</thead>
											<tbody>
                                            	<?php 
											$i=1;
											$tot = 0;
											foreach($payments as $payment):
											
											?>
												<tr class="gradeX">
											
													<td><?php echo $i ?></td>
													<td><?php echo $payment['pay_date']; ?></td>
													<td><?php echo $payment['customer_name']; ?></td>
                                                    <td><?php echo $payment['amount']; ?></td>
													<?php $total=$payment['amount'];
													 		$tot= $tot + $total;
															?>
															
												</tr>
											<?php $i++;
											endforeach;
											
											?>	
											</tbody>
											<tfoot>
												<tr>
													<th><?php echo get_phrase('s_no');?></th>
													<th><?php echo get_phrase('date');?></th>
													<th><?php echo get_phrase('particular');?></th>
                                                    <th><?php echo get_phrase('amount');?></th>
												</tr>
												
											</tfoot>
										<table align="right">
										<tr>
										<strong><?php echo get_phrase('total_amount:')?></strong> <?php echo CURRENCY.' '.$tot; ?>
										</tr>
										</table>
										</table>
										
									</div>
									
								</div>
								
								
								<!-- /BOX -->
							</div>
            </div>
            
            
            <!-- /EXPORT TABLE -->
            <div class="footer-tools">
                <span class="go-top">
                    <i class="fa fa-chevron-up"></i> <?php echo get_phrase('top');?>
                </span>
            </div>
        </div><!-- /CONTENT-->
    </div>
</div>
<script type="text/javascript">
$(function() {
    $( "#from_date" ).datepicker();
  $( "#to_date" ).datepicker();
});
</script>