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
                                <a href=""><?php echo get_phrase('order');?></a>
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
                            <h4><i class="fa fa-bars"></i><?php echo get_phrase('order');?> <?php echo get_phrase('detail');?></h4>
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
           
           
<?php echo form_open('admin/orders/search' , array('id' => 'searchFrom', 'class' => 'form-horizontal'));?>
                                        
                                        
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"> <?php echo get_phrase('from');?> <?php echo get_phrase('oder');?> <?php echo get_phrase('date');?>  <span class="required">*</span></label>
                                           <div class="col-md-3">
<!--                                              <input type="text" class="form-control input-sm" name="item" value="<?php echo $cond_item; ?>" readonly/>
-->                                           <?php echo form_input('from_date', (isset($_POST['from_date']) ? $_POST['from_date'] : ''), 'class="form-control tip-right date" data-original-title="'.get_phrase('order').' '.get_phrase('date') .'" id="from_date" required="required" data-error="' .get_phrase('order').' '. get_phrase("date") . ' ' . get_phrase("is_required") . '"'); ?>
                                                 
                                              <span class="error-span"></span>
                                              
                                           </div>
                                           
                                        </div>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"> <?php echo get_phrase('to');?> <?php echo get_phrase('oder');?> <?php echo get_phrase('date');?> <span class="required">*</span></label>
                                           <div class="col-md-3">
<!--                                              <input type="text" class="form-control" name="pattern" value="<?php echo $row['pattern']; ?>" />
-->                                            
											<?php echo form_input('to_date', (isset($_POST['to_date']) ? $_POST['to_date'] : ''), 'class="form-control
tip-right date" data-original-title="'.get_phrase('order').' '.get_phrase('date') .'" id="to_date" required="required" data-error="' .get_phrase('order').' '.get_phrase('date') . ' ' . get_phrase("is_required") . '"'); ?>  
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                        
                                        
                               <div class="form-actions clearfix">
                                  <div class="row">
                                     <div class="col-md-12">
                                        <div class="col-md-offset-3 col-md-9">
                                         <button type="submit" class="btn btn-primary"> <i class="fa fa-search"></i> <?php echo get_phrase('search');?> </button>
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
                <div class="col-md-12">
								<!-- BOX -->
								<div class="box border purple">
									
									<div class="box-title">
										<h4><i class="fa fa-table"></i><?php echo get_phrase('orders')?> <?php echo get_phrase('detail'); ?></h4>
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
										<table id="datatable2" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th><?php echo get_phrase('s_no');?></th>
													<th><?php echo get_phrase('order');?> <?php echo get_phrase('no');?></th>
													<th><?php echo get_phrase('customer');?> <?php echo get_phrase('name');?></th>
                                                    <th><?php echo get_phrase('order');?> <?php echo get_phrase('date');?></th>
                                                    <th><?php echo get_phrase('deliver');?> <?php echo get_phrase('date');?></th>
													<th><?php echo get_phrase('trial');?> <?php echo get_phrase('date');?></th>
<!--													<th><?php echo get_phrase('ready');?> <?php echo get_phrase('date');?></th>
-->													<th><?php echo get_phrase('suborder');?></th>
													<th><?php echo get_phrase('total');?></th>
													<th><?php echo get_phrase('paid');?></th>
													<th><?php echo get_phrase('remaining');?></th>
                                                    <th><?php echo get_phrase('status');?></th>
                                             		<th><?php echo get_phrase('action');?></th>      
												</tr>
											</thead>
											<tbody>
                                            <?php 
											$i=1;
											//echo "<pre>";
											//print_r($patterns);
											foreach($orders as $order):
											$paymentData= array();
											foreach($this->crud_model->get_All_List('payment','order_id',$order['id']) as $payment){$paymentData[] = $payment['amount'];}
											?>
												<tr class="gradeX">
													<td><?php echo $i ?></td>
													<td><?php echo $order['reference_no']; ?></td>
													<td><?php echo $order['customer_name']; ?></td>
                                                    <td><?php echo $order['date']; ?></td>
													<td><?php echo $order['delivery_date']; ?></td>
													<td><?php echo $order['trial_date']; ?></td>
<!--                                                    <td><?php echo $order['']; ?></td>
-->													<td><?php echo $order['no_of_suborder']; ?></td>
													<td><?php echo $order['total']; ?></td>
                                                    <td><?php echo $this->crud_model->formatMoney(array_sum($paymentData)); ?></td>
													<td><?php echo $remaining = $this->crud_model->formatMoney($order['total']-array_sum($paymentData)); ?></td>
                                                    <td><span class="label label-<?php if($remaining=='0.00'){$class = 'success';$icon = 'star';$status='paid';}else{$class = 'info';$icon = 'star-half-o';$status='unpaid';}echo $class;?> arrow-in arrow-in-right"><i class="fa fa-<?php echo $icon; ?>"></i> <?php echo ucwords($status); ?></span></td>
														 
                                             <td class="center hidden-xs">
                                                 <div class="btn-group dropdown" style="margin-bottom:5px">
                                        <button class="btn btn-primary"><?php echo get_phrase('action');?></button>
                                        <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                        <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" style="margin-left: -75px;">
                                       	 <li>
                                         <a href="<?php echo base_url().$roles.'/orders/view_suborder/'.$order['id'];?>" class="config"><i class="fa fa-list"></i> <?php echo get_phrase('suborder')?> <?php echo get_phrase('detail')?></a>
                                        </li>
                                       
                                        <li>
                                        <a href="<?php echo base_url().$roles.'/orders/view_invoice/'.$order['id'];?>" class="config"><i class="fa fa-eye"></i> <?php echo get_phrase('view')?> <?php echo get_phrase('invoice')?></a>
                                        </li>
										</ul>
                                        </div>
										
											
										</td>
                                                    
												</tr>
											<?php $i++;
											endforeach;
											
											?>	
											</tbody>
											
											<tfoot>
												<tr>
													<th><?php echo get_phrase('s_no');?></th>
													<th><?php echo get_phrase('order');?> <?php echo get_phrase('no');?></th>
													<th><?php echo get_phrase('customer');?> <?php echo get_phrase('name');?></th>
                                                    <th><?php echo get_phrase('order');?> <?php echo get_phrase('date');?></th>
                                                    <th><?php echo get_phrase('deliver');?> <?php echo get_phrase('date');?></th>
													<th><?php echo get_phrase('trial');?> <?php echo get_phrase('date');?></th>
<!--												<th><?php echo get_phrase('ready');?> <?php echo get_phrase('date');?></th>
-->												 <th><?php echo get_phrase('suborder');?></th>
													<th><?php echo get_phrase('total');?></th>
													<th><?php echo get_phrase('paid');?></th>
													<th><?php echo get_phrase('remaining');?></th>
                                                    <th><?php echo get_phrase('status');?></th>
                                              		<th><?php echo get_phrase('action');?></th>  
												</tr>
											</tfoot>
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
    $( "#from_date" ).datepicker({
      defaultDate: "<?php echo date("m/d/Y")?>",
      changeMonth: true,
      numberOfMonths: 1,
      
    });
  $( "#to_date" ).datepicker({
      defaultDate: "<?php echo date("m/d/Y")?>",
      changeMonth: true,
      numberOfMonths: 1,
	  
  });
  
  $('#searchFrom').validate(
   {
              rules: {
                from_date: {
                  required: true
                },
				to_date: {
                  required: true
                }
              },
              highlight: function(element) {
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
              },
              success: function(element) {
                element
                .text('Valid!').addClass('valid')
                .closest('.form-group').removeClass('has-error').addClass('has-success');
              }
             });
 });
</script>