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
                        <div class="description"><?php echo get_phrase('all_lists_shows_here')?></div>
                    </div>
                </div>
            </div>
            <!-- /PAGE HEADER -->
            <!-- EXPORT TABLE -->
            <div class="row">
                <div class="col-md-12">
                 <?php if($this->session->flashdata('flash_message')){ ?>
                <div class="alert alert-block alert-success fade in">
                <a class="close" data-dismiss="alert" href="#" aria-hidden="true">�</a>
                <h4><i class="fa fa-heart"></i> <?php echo $this->session->flashdata('flash_message'); ?></h4>
                </div>
                <? }?>
								<!-- BOX -->
								<div class="box border blue">
									<div class="box-title">
										<h4><i class="fa fa-list"></i><?php echo get_phrase('purchase_report')?></h4>
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
                      
                       
                        <?php $attrib = array('class' => 'form-horizontal validate','id' => 'purchForm'); echo form_open(base_url().$roles.'/getPurchases/'.$inv->id, $attrib); ?>
                        
                        <div class="wizard-form">
                          <div class="wizard-content">
                            <div class="tab-content">
							 <div class="form-group">
                                <label class="control-label col-md-3"><?php echo ucwords(get_phrase('ref_no'));?><span class="required"></span></label>
                                <div class="col-md-4">
                               
                                  <?php  echo form_input('reference_no', (isset($_POST['reference_no']) ? $_POST['reference_no'] : ''), 'class="form-control tip-right date" data-original-title="'.get_phrase('ref_no').'" id="reference_no" '); ?>
                                 
                                  <span class="error-span"></span> </div>
                              </div>
                  								 
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><?php echo get_phrase('supplier');?><span class="required"></span></label>
                                                <div class="col-md-4">
												<?php
                                            $sp[""] = "";
                                            foreach ($suppliers as $supplier) {
                                               $sp[$supplier['id']] = $supplier['fname'].' '.$supplier['lname'];                                              
                                            }
                                            echo form_dropdown('supplier', $sp, (isset($_POST['supplier']) ? $_POST['supplier'] : $row['supplier_id']), 'id="select4" class="col-md-12 select2-offscreen"');
                                            ?>
                                               
                                                <span class="error-span"></span>
                                                </div>
                                            </div>
											
											<div class="form-group">
                                               <label class="control-label col-md-3"> <?php echo get_phrase('start');?> <?php echo get_phrase('date');?>  <span class="required"></span></label>
                                               <div class="col-md-4">
                                              <?php  echo form_input('start_date', (isset($_POST['start_date']) ? $_POST['start_date'] : ''), 'class="form-control tip-right date" data-original-title="'.get_phrase('start').' '.get_phrase('date') .'" id="start_date" '); ?>
                                                     
                                                  <span class="error-span"></span>
                                                  
                                               </div>
                                               
                                            </div>
                                		 <div class="form-group">
                                               <label class="control-label col-md-3"> <?php echo get_phrase('end');?> <?php echo get_phrase('date');?>  <span class="required"></span></label>
                                               <div class="col-md-4">
                                              <?php echo form_input('end_date', (isset($_POST['end_date']) ? $_POST['end_date'] :  date('m/d/Y')), 'class="form-control tip-right date" data-original-title="'.get_phrase('end').' '.get_phrase('date') .'" id="end_date" '); ?>
                                                     
                                                  <span class="error-span"></span>
                                                  
                                               </div>
                                               
                                            </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-actions clearfix">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="col-md-offset-3 col-md-9">
                                <button type="submit" name="sub" class="btn btn-primary"> <?php echo get_phrase('submit');?> <i class="fa fa-save"></i></button>
                                <!--<input type="hidden" name="act" value="setting_update"  />--> 
                                
                              </div>
                            </div>
                          </div>
                        </div>
                       <?php echo form_close();?> 
                      </div>
								</div>
								<div class="box border blue">
									<div class="box-title">
										<h4><i class="fa fa-list"></i><?php echo get_phrase('')?></h4>
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
                                      <th><?php echo ucwords(get_phrase('date'));?> </th>
                                      <th> <?php echo ucwords(get_phrase('ref_no'));?> </th>
                                      <th> <?php echo ucwords(get_phrase('supplier'));?></th>
                                      <th> <?php echo ucwords(get_phrase('product'));?> <?php echo ucwords(get_phrase('(QTY)'));?> </th>
									  <th> <?php echo ucwords(get_phrase('total'));?></th>
									  <th> <?php echo ucwords(get_phrase('product'));?> <?php echo ucwords(get_phrase('tax'));?></th>
									  <th> <?php echo ucwords(get_phrase('grand'));?> <?php echo ucwords(get_phrase('total'));?></th>
                                    </tr>
                                  </thead>
								  <tbody>
								  	
									<?php 
									 	foreach($purchases as $purchase){?>
								  	<tr>
										<td><?php echo $purchase->date;?></td>
										<td><?php echo $purchase->reference_no;?></td>
										<td><?php echo $purchase->supplier_name;?></td>
										<td><?php echo $purchase->iname;?></td>
										<td><?php echo $purchase->invTotal;?></td>
										<td><?php echo $purchase->totalTax;?></td>
										<td><?php echo $purchase->total;?></td>
									</tr>
									<?php } ?>
								  </tbody>
								  <tfoot>
                                    <tr>
                                      <th><?php echo ucwords(get_phrase('date'));?> </th>
                                      <th> <?php echo ucwords(get_phrase('ref_no'));?> </th>
                                      <th> <?php echo ucwords(get_phrase('supplier'));?></th>
                                      <th> <?php echo ucwords(get_phrase('product'));?> <?php echo ucwords(get_phrase('(QTY)'));?> </th>
									  <th> <?php echo ucwords(get_phrase('total'));?></th>
									  <th> <?php echo ucwords(get_phrase('product'));?> <?php echo ucwords(get_phrase('tax'));?></th>
									  <th> <?php echo ucwords(get_phrase('grand'));?> <?php echo ucwords(get_phrase('total'));?></th>
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
    $( "#end_date" ).datepicker({
      changeMonth: true,
      numberOfMonths: 1,
    });
	$( "#start_date" ).datepicker({
      changeMonth: true,
      numberOfMonths: 1,
    });
	
	$('.print').click(function() {
		$('#formDiv').hide();
        window.print();
		$('#formDiv').show();
    });
 });
 </script>