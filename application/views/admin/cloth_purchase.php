<?php
foreach ($edit_data as $r):
$row = $r;
endforeach;
if($edit_data[0])
{
	$formAction = "edit_purchases/".$row['id'];
	$pr_value = sizeof($inv_products);
	$cno = $pr_value + 1;
}
else
{
	$formAction = "create/";
	$cno = 1;
}?>

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
                                <a href=""><?php echo get_phrase('purchases');?></a>
                            </li>
                            <li><?=ucwords($page_title)?></li>
                        </ul>
                        <!-- /BREADCRUMBS -->
                        <div class="clearfix">
                            <h3 class="content-title pull-left"><?=ucwords($page_title)?></h3>
                        </div>
                        <!--<div class="description"><?php echo get_phrase('manage_system_settings');?></div>-->
                    </div>
                </div>
            </div>
            <!-- /PAGE HEADER -->
            <?php if($formshow=='formshow'):?>
            <!-- SAMPLE FORM OF PURCHASE-->
            <div class="row">
                <div class="col-md-12">
                    <!-- BOX -->
                    <div class="box border red" id="formWizard">
                        <div class="box-title">
                            <h4><i class="fa fa-bars"></i><?=ucwords($page_title)?></h4>
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
           <?php if($message) { echo "<div class=\"alert alert-block alert-danger fade in\"><a href=\"#\" class=\"close\" aria-hidden=\"true\" data-dismiss=\"alert\">×</a><h4><i class=\"fa fa-times\"></i> ". get_phrase('oh_snap_error')."</h4><p>" . $message . "</p></div>"; } ?>
           
<?php $attrib = array('class' => 'form-horizontal validate','id' => 'clothPurchaseForm'); echo form_open_multipart(base_url().$roles.'/cloth_purchase/'.$formAction, $attrib); ?>
                            <div class="wizard-form">
                               <div class="wizard-content">
                                  <div class="tab-content">
                                     <div class="tab-pane active" id="account">
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('date');?> <span class="required">*</span></label>
                                           <div class="col-md-4">
                                              <?php echo form_input('date', (isset($_POST['date']) ? $_POST['date'] : date(PHP_DATE, strtotime($row['date']))), 'class="form-control tip-right" data-original-title="'. get_phrase('date') .'" id="date" required="required" data-error="' . get_phrase("date") . ' ' . get_phrase("is_required") . '"'); ?>
                                              
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('ref_no');?> <span class="required">*</span></label>
                                           <div class="col-md-4">
                                              <?php echo form_input('reference_no', (isset($_POST['reference_no']) ? $_POST['reference_no'] : $rnumber), 'class="form-control tip-right" id="reference_no" data-original-title="'. get_phrase('ref_no') .'" required="required" data-error="' . get_phrase('ref_no') . ' ' . get_phrase("is_required") . '"'); ?>
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                        
                                           <label class="control-label col-md-3" id="supplier_l"><?php echo get_phrase('supplier');?><span class="required">*</span></label>
                                           <div class="col-md-4">
                                              
										   <?php
                                            $sp[""] = "";
                                            foreach ($suppliers as $supplier) {
                                                if ($supplier['company'] == "-" || !$supplier['company']) {
                                                    $sp[$supplier['id']] = $supplier['name'];
                                                } else {
                                                    $sp[$supplier['id']] = $supplier['company'];
                                                }
                                            }
                                            echo form_dropdown('supplier', $sp, (isset($_POST['supplier']) ? $_POST['supplier'] : $row['supplier_id']), 'id="select4" class="col-md-12 select2-offscreen" required="required" data-error="' . get_phrase("supplier") . ' ' . get_phrase("is_required") . '"');
                                            ?>
                                              <span class="error-span"></span>
                                              <span id="loading"></span>
                                           </div>
                                        </div>
                                        
                                         <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('qty');?> <span class="required">*</span></label>
                                           <div class="col-md-4">
                                              <?php echo form_input('quantity', (isset($_POST['quantity']) ? $_POST['quantity'] : 1), 'class="form-control tip-right" id="qty" data-original-title="'. get_phrase('qty') .'" required="required" data-error="' . get_phrase('qty') . ' ' . get_phrase("is_required") . '"'); ?>
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                        <?php
                                        if (TAX1) {
										echo '<div class="form-group">
                                           <label class="control-label col-md-3">'. get_phrase('tax') .'<span class="required">*</span></label>
                                           <div class="col-md-4">';
                                        	$txs[""] = "";
                                            foreach ($taxes as $tax) {
                                             $txs[$tax['id']] = $tax['name'];
                                            }
                                            echo form_dropdown('tax_rate', $txs, (isset($_POST['tax_rate']) ? $_POST['tax_rate'] : DEFAULT_TAX), 'id="select3" class="col-md-12 select2-offscreen" required="required" data-error="' . get_phrase("tax") . ' ' . get_phrase("is_required") . '"');
											echo '<span class="error-span"></span>
                                           </div>
                                        </div>';
                                     }?>    
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('unit').' '.get_phrase('price');?> </label>
                                           <div class="col-md-4">
                                              <?php echo form_input('unit_cost', (isset($_POST['unit_cost']) ? $_POST['unit_cost'] : $clothProducts->price), 'class="form-control tip-right" id="unit_cost" data-original-title="'. get_phrase('unit').' '.get_phrase('price') .'" READONLY '); ?>
                                           </div>
                                        </div>
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('note');?> </label>
                                           <div class="col-md-8">
                                              <?php echo form_textarea('note', (isset($_POST['note']) ? $_POST['note'] : html_entity_decode($row['note'])), 'rows="3" cols="5" class="countable form-control" data-limit="140"'); ?> <!--<p class="help-block">You have <span id="counter"></span> characters left.</p> -->
                                             
                                           </div>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                               <div class="form-actions clearfix">
                                  <div class="row">
                                     <div class="col-md-12">
                                        <div class="col-md-offset-3 col-md-9">
                                           
                                         <button type="submit" class="btn btn-primary"> <?php echo get_phrase('save');?> <i class="fa fa-save"></i></button>
                                         <input type="hidden" name="pur_type" value="cloth"  />
                                         <input type="hidden" name="product" value="<?php echo $clothProducts->id;?>"  />
                                                                      
                                        </div>
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
            <!-- /SAMPLE FORM OF PURCHASE-->
            <?php endif;?>
            <!-- EXPORT TABLE -->
            <div class="row">
                <div class="col-md-12">
								<!-- BOX -->
								<div class="box border purple">
									<div class="box-title">
										<h4><i class="fa fa-table"></i><?php echo get_phrase($page_title)?></h4>
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
													<th><?php echo get_phrase('date');?></th>
                                 					<th ><?php echo get_phrase('ref_no');?> </th>
                                                    <th ><?php echo get_phrase('supplier');?></th>
                                                    <th ><?php echo get_phrase('total');?> </th>
													<th ><?php echo get_phrase('product');?> <?php echo get_phrase('tax');?></th>
                                                    <th ><?php echo get_phrase('grand');?> <?php echo get_phrase('total');?></th>
                                              		<th ><?php echo get_phrase('action');?></th>      
												</tr>
											</thead>
											<tbody>
                                            <?php 
											$i=1;
											//echo "<pre>";
											//print_r($purchases);
											foreach($purchases as $purchase):?>
												<tr class="gradeX">
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $purchase['date']?></td>
                                                <td><?php echo $purchase['reference_no']; ?></td>
      											<td><?php echo $purchase['supplier_name']; ?></td>
                                                <td><?php echo $purchase['inv_total']; ?></td>
                                                <td><?php echo $purchase['total_tax']; ?></td>
                                                <td><?php echo $purchase['total'] ?></td>
                                                <td class="center hidden-xs">
                                                <div class="btn-group dropdown" style="margin-bottom:5px">
                                        <button class="btn btn-primary">Action</button>
                                        <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                        <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" style="margin-left: -75px;">
                                        <li>
                                        <a href='#' onClick="MyWindow=window.open('<?php echo base_url().$roles.'/cloth_purchase/view_purchase/'.$purchase['id'];?>', 'MyWindow','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=1000,height=600'); return false;" title='<?php echo get_phrase('view')?> <?php echo get_phrase('purchase')?>'><i class='fa fa-arrows-alt'></i> <?php echo get_phrase('view')?> <?php echo get_phrase('purchase')?></a>
                                        </li>
                                        
                                        <li>
                                        <a href='<?php echo base_url().$roles.'/cloth_purchase/pdf/'.$purchase['id'];?>'><i class='fa fa-file'></i> <?php echo get_phrase('download')?> <?php echo get_phrase('pdf')?></a>
                                        </li>
                                        
                                        <!--<li>
                                        <a href="<?php echo base_url().$this->session->userdata('roles').'/purchases/edit_purchases/'.$purchase['id'];?>"><i class="fa fa-edit"></i> <?php echo get_phrase('edit')?> </a>
                                        </li>
                                        <li>
                                        <a href="javascript:;" onclick="confirm_modal('<?=base_url().$this->session->userdata('roles')?>/cloth_purchase/delete_purchases/<?php echo $purchase['id'];?>');"><i class="fa fa-trash-o"></i>  <?php echo get_phrase('delete');?> </a>-->
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
													<th><?php echo get_phrase('date');?></th>
                                 					<th ><?php echo get_phrase('ref_no');?> </th>
                                                    <th ><?php echo get_phrase('supplier');?></th>
                                                    <th ><?php echo get_phrase('total');?> </th>
													<th ><?php echo get_phrase('product');?> <?php echo get_phrase('tax');?></th>
                                                    <th ><?php echo get_phrase('grand');?> <?php echo get_phrase('total');?></th>
                                              		<th ><?php echo get_phrase('action');?></th>      
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
    $(document).ready(function() {
		
        $("#date").datetimepicker({
            format: "<?php echo JS_DATE; ?>",
            autoclose: true,
			weekStart: 1,
			todayBtn:  1,
			autoclose: 1,
			todayHighlight: 1,
			startView: 2,
			minView: 2,
			forceParse: 0,
			pickerPosition: "bottom-left"
        });
        $("#date").datetimepicker("setDate", new Date());
		
		$('#clothPurchaseForm').validate(
		 {
		  rules: {
			date: {
			  required: true
			},
			reference_no: {
			  required: true
			},
			supplier: {
			  required: true
			},
			quantity: {
			  required: true,
			  digits:true
			},
			unit_cost: {
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