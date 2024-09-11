<style>
legend a {
  color: inherit;
}
legend.legendStyle {
padding-left: 5px;
padding-right: 5px;
}
fieldset.fsStyle {
font-family: Verdana, Arial, sans-serif;
font-size: small;
font-weight: normal;
border: 1px solid #999999;
padding: 4px;
margin: 5px;
}
legend {
width: auto;
border-bottom: 0px;
}

	#loading{
		/*height: 100%;
		width: 100%;*/
		position: fixed;
		top: 50%;
		left: 50%;
	}
#rotate {
     -moz-transform: rotate(-90.0deg);  /* FF3.5+ */
       -o-transform: rotate(-90.0deg);  /* Opera 10.5 */
  -webkit-transform: rotate(-90.0deg);  /* Saf3.1+, Chrome */
             filter:  progid:DXImageTransform.Microsoft.BasicImage(rotation=0.083);  /* IE6,IE7 */
         -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=0.083)"; /* IE8 */

		 background-color: grey;
                color: white;
                text-align: center;
                vertical-align: bottom;
}
</style>
<?php preg_replace("/\xEF\xBB\xBF/", "", "&#65279"); ?>
<div class="modal fade" id="modal_fabric" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					  <h4 class="modal-title hdmt"><?php echo get_phrase('choose')?> <?php echo get_phrase('cloth')?></h4>
					</div>
					<div class="modal-body">
					  <div class="box border green" id="formWizard">
                        <div class="box-title">
                            <h4><i class="fa fa-bars"></i> <?php echo get_phrase('cloth')?> </h4>
                            <div class="tools hidden-xs">
                                <a href="#box-config" data-toggle="modal" class="config">
                                    <i class="fa fa-plus"></i>
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
                        <div class="box-body form">
							<div class="row">
                            <?php $i=1;foreach($clothes as $clothe):
							if($i%4==0){?>
                            <div class="col-md-3 category_1 item">
                                <div class="hover-content" style="border: 1px solid #dddddd;border-top-right-radius: 4px;">
                                    <img src="<?php echo base_url(); ?>uploads/products/<?php echo $clothe['image']; ?>" id="<?php echo $clothe['id'];?>" alt="<?php echo $clothe['cloth_type_id']; ?>" class="img-responsive" title="<?php echo ucwords($clothe['cloth_name']); ?>"/>
                                    <h5 class="center"><?php echo ucwords($clothe['cloth_name']); ?></h5>
                                </div>
                            </div>
							<?php }else{?>
							<div class="col-md-3 category_1 item">
                                <div class="hover-content" style="border: 1px solid #dddddd;border-top-right-radius: 4px;">
                                    <img src="<?php echo base_url(); ?>uploads/products/<?php echo $clothe['image']; ?>" id="<?php echo $clothe['id'];?>" alt="<?php echo $clothe['cloth_type_id']; ?>" class="img-responsive" title="<?php echo ucwords($clothe['cloth_name']); ?>"/>
                                    <h5 class="center"><?php echo ucwords($clothe['cloth_name']); ?></h5>
                                </div>
                            </div>
							<?php }$i++;endforeach;?>				
											
							</div>
                        </div>
                    </div>
                      
					</div>
					<div class="modal-footer">
					  <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo get_phrase('close')?></button>
					  <!--<button type="button" class="btn btn-primary"><?php echo get_phrase('select')?></button>-->
					</div>
				  </div>
				</div>
			  </div>
<!-- PRINT -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/' ?>css/print.css" media="print"/><div class="container">
                     <?php if($this->session->flashdata('flash_message')){ ?>
                <div class="alert alert-block alert-success fade in">
                <a class="close" data-dismiss="alert" href="#" aria-hidden="true">×</a>
                <h4><i class="fa fa-heart"></i> <?php echo $this->session->flashdata('flash_message'); ?></h4>
                </div>
                <?php }?>

				<div class="row">
					<div id="content" class="col-lg-12">
						<!-- PAGE HEADER-->
						<div class="row">
							<div class="col-sm-12">
							<div class="page-header">
									<!-- BREADCRUMBS -->
                                <ul class="breadcrumb">
                                    <li>
                                    	<a href="<?php echo base_url();?>"> <i class="fa fa-home"></i> <?php echo get_phrase('home');?></a>
                                    </li>
                                    <li>
                                    	<a href="<?php echo base_url();?>"> <i class="fa fa-tasks"></i> <?php echo get_phrase('order');?></a>
                                    </li>
                                    <li>
                                    	<i class="fa fa-plus"></i> <?php echo get_phrase('new');?> <?php echo get_phrase('order');?>
                                    </li>
                                </ul>
									<!-- /BREADCRUMBS -->
								</div>
									
							</div>
						</div>
						<!-- /PAGE HEADER -->
						<!-- INVOICE -->
						<div class="row">
							<div class="col-md-7">
								<!-- BOX -->
                                <form method="post" action="<?php echo base_url().$this->session->userdata('roles').'/payment/do_payment/'.$edit_data['id'];?>" name="frm"  id="frm">
								<div class="box border blue">
									<div class="box-title">
									<h4><?php echo get_phrase('payment')." ".get_phrase('details')?></h4>
										<div class="tools hidden-xs">
										</div>
									</div>
									<div class="box-body">
                                    	 <div class="form-group readonly">
                                    	 <div class="row">
                                   			 <div class="col-sm-12">
                        						<label class="col-sm-2 control-label">
													<?php echo get_phrase('ref_no');?>
                           			 			</label>
                        					 	
                          							<div class="col-sm-4">
                          							<?php echo form_input('reference_no', (isset($edit_data['reference_no']) ? $edit_data['reference_no'] : $rnumber), 'class="form-control tip-right" id="reference_no" data-original-title="'. get_phrase('ref_no') .'" required="required" readonly data-error="' . get_phrase('ref_no') . ' ' . get_phrase("is_required") . '"'); ?>
                       	    				 		</div>	
                                                    
                          							 <label class="col-sm-2 control-label" style="margin-left:-9px;">
                                        <strong><?php echo get_phrase('order')." ".get_phrase('date');?></strong>	
                                       				 </label>
                                     			<div clss="col-sm-3">
                                        <?php
										$dis=isset($edit_data['date']) ? "readonly" : ""; 
										 echo form_input('order_date', (isset($edit_data['date']) ? $edit_data['date'] : ''), ''.$dis.'  style="width:32%;" class="form-control tip-right date " data-original-title="'. get_phrase('date') .'" id="order_date" required="required" data-error="' . get_phrase("date") . ' ' . get_phrase("is_required") . '"'); ?>
                                       	</div>
                           					</div>
                           				 </div>
                                    	</div>
                                         <div class="form-group readonly">
                                    		<div class="row">
                                   			 <div class="col-sm-12">
                        						<label class="col-sm-2 control-label">
													<?php echo get_phrase('party')." ".get_phrase('name');?>
                           			 			</label>
                        					 	<div class="col-sm-10">
                          							   <?php
                                            $cs[""] = "";
                                            foreach ($customers as $customer) {
                                                if ($customer['company'] == "-" || !$customer['company']) {
                                                    $cs[$customer['id']] = $customer['company'];
                                                } else {
                                                    
													$cs[$customer['id']] = $customer['fname'].' '.$customer['lname'];
                                                }
                                            }
											$dis=isset($edit_data['customer_id']) ? "readonly" : ""; 
                                            echo form_dropdown('customer', $cs, (isset($edit_data['customer_id']) ? $edit_data['customer_id'] : DCUSTOMER), 'id="select4" '.$dis.' class="col-md-12 select2-offscreen" required="required" data-error="' . get_phrase("customer") . ' ' . get_phrase("is_required") . '"');
                                            ?>
                       	    				 	</div>
                           					 </div>
                           					</div>
                     					</div> 
                                       	 <div class="form-group">
                                    		<div class="row">
                                   			 <div class="col-sm-12">
                        						<label class="col-sm-2 control-label">
													<?php echo get_phrase('address')." & ".get_phrase('contact');?>
                           			 			</label>
                        					 	<div class="col-sm-10">
                                                <div class="well" id="ritu">
                          							<address>
                                                  <h4><strong><?php echo get_phrase('name');?></strong>: <?php echo $cust_add[0]['fname'].' '.$cust_add[0]['lname']; ?></h4>
                                                  <?php echo "<h4><strong>".get_phrase('address')."</strong>:" . $cust_add[0]['address'].", ".$cust_add[0]['city'].", ".$this->crud_model->get_value_by_id('states',$cust_add[0]['state'],$field='name')."-".$cust_add[0]['postal_code']." (".$this->crud_model->get_value_by_id('countries',$cust_add[0]['country'],$field='name').")</h4>";  
echo "<h4><strong>".get_phrase('email')."</strong>:". $cust_add[0]['email'].' </h4>'; echo "<h4><strong>".get_phrase('phone')."</strong>:". $cust_add[0]['mobile']."</h4"; ?>
                                                  </address>
                                                </div>
                       	    				 	</div>
                           					 </div>
                           					</div>
                     					</div> 
                                       	 <div class="form-group readonly">
                                    	 <div class="row">
                                   			 <div class="col-sm-12">
                        						<label class="col-sm-2 control-label">
													<?php echo get_phrase('trial')." ".get_phrase('date');?>
                           			 			</label>
                        					 	
                          							<div class="col-sm-4">
                          							 <?php echo form_input('trial_date', (isset($edit_data['trial_date']) ? $edit_data['trial_date'] : ''), 'class="form-control tip-right date" data-original-title="'.get_phrase('trial').' '.get_phrase('date') .'" id="trial_date" required="required" data-error="' .get_phrase('trial').' '. get_phrase("date") . ' ' . get_phrase("is_required") . '"'); ?>
                       	    				 		</div>	
                                                    
                          							 <label class="col-sm-2 control-label" style="margin-left:-9px;">
                                        <strong><?php echo get_phrase('delivery')." ".get_phrase('date');?></strong>	
                                       				 </label>
                                     			<div clss="col-sm-3">
                                       <?php echo form_input('delivery_date', (isset($edit_data['delivery_date']) ? $edit_data['delivery_date'] : ''), 'style="width:32%;" class="form-control tip-right" id="delivery_date" data-original-title="'. get_phrase('delivery').' '.get_phrase('date') .'" required="required" data-error="' .get_phrase('delivery').' '.get_phrase("date") . ' ' . get_phrase("is_required") . '"'); ?>
                                       	</div>
                           					</div>
                           				 </div>
                                    	</div>
                                         <div class="form-group">
                                         <hr>
                                         <div class="box-title">
									<h4><?php echo get_phrase('sub').' '.get_phrase('order')." ".get_phrase('details')." (".$edit_data['no_of_suborder'].") ";?> </h4>
                                    </div>
                                         <div class="box">
                                        <div class="box-body">
                                            <div class="scroller" id=""  data-always-visible="2" data-rail-visible="2" data-height="100px">
                                             <table id="example-paper" class="table table-paper table-striped">
											<thead>
											  <tr>
												<th>#</th>
												<th><?php echo get_phrase('sub');?><?php echo get_phrase('order');?></th>
												<th><?php echo get_phrase('cloth');?></th>
												<th><?php echo get_phrase('cloth');?> <?php echo get_phrase('length');?></th>
												<th><?php echo get_phrase('payment');?></th>
												<th><?php echo get_phrase('order_allot_to');?></th>
											  </tr>
											</thead>
											<tbody>
                                            <?php  if(!isset($edit_data['id'])){ ?>
											  <tr>
                                              <td></td>
												<td colspan="5" class="center"><?php echo get_phrase('no_record');?></td>
                                                
											  </tr>
                                              <?php } else {  $i=1;
											  foreach($sub_order as $sub){ ?>
                                              <tr>
                                              <td><?php echo $i++;?></td>
                                              <td><?php echo 'No '.$sub['id'];?></td>
                                              <td><?php echo ($sub['cloth_id']!=0)? get_phrase('Used'): get_phrase('given') ?></td>
                                              <td><?php echo $sub['cloth_length'].' '.ucwords($sub['cloth_unit']);?></td>
                                              <td><?php echo $sub['sub_order_price'];?></td>
                                              <td><?php echo $sub['worker_name'];?></td>
                                              </tr>
											  <?php } } ?> 
											</tbody>
										  </table>   
                                            </div>
                                        </div>
                                    </div>
                                         </div>
                                         <div class="form-group">
                                         <div class="box">
                                          <div class="box-title">
								<h4><?php echo get_phrase('bill')." ".get_phrase('details')?></h4>
                                    </div>
                                        <div class="box-body">
                                             <table class="table">
											<thead>
											  <tr>
												<th class="col-sm-2"><?php echo get_phrase('total');?></th>
												<th class="col-sm-2"><?php echo get_phrase('discount');?></th>
                                                <th class="col-sm-2"><?php echo get_phrase('tax');?></th>
												<th class="col-sm-2"><?php echo get_phrase('bill');?> <?php echo get_phrase('amount');?></th>
												<th class="col-sm-2"><?php echo get_phrase('recieved');?></th>
												<th class="col-sm-2"><?php echo get_phrase('due');?></th>
											  </tr>
											</thead>
											<tbody>
                                             <?php  if(isset($edit_data['id'])){ ?>
											  <tr>
												<td><?php echo $edit_data['inv_total'];?></td>
                                            <?php if(!isset($edit_data['discount_id'])  && !isset($edit_data['tax_rate2_id'])){
												if(DISCOUNT_OPTION == 1) { ?>
                                                <td><?php
                                                        foreach ($discounts as $discount) {
                                                    
                                                            $ds[$discount->id] = $discount->name;
                                                            //print_r($ds); die;
                                                        }
                                                        echo form_dropdown('discount', $ds, DEFAULT_DISCOUNT, 'class="col-md-12 select2-offscreen tip" id="select5" data-placeholder="' . get_phrase("select") . ' ' . get_phrase("default") . ' ' . get_phrase("discount") . '" required="required" data-error="' . get_phrase("discount") . ' get_phrase("type") ' . ' ' . get_phrase("is_required") . '"');
                                                        ?></td>
                                                <?php }
												if(TAX2 == 1) { ?>
                                                <td><select id="select3" name="tax" class="col-md-12 select2-offscreen" required>
                                                 <option <?php if(DEFAULT_TAX==0)echo selected;?> value="0"><?php echo get_phrase('disable'); ?></option>
                                                  <?php 
                                                  //$taxe = $this->db->get('tax_rates')->result_array();
                                                  foreach($taxes as $tax){
                                                  ?>                      
                                                  <option <?php if(DEFAULT_TAX==$tax['id'])echo selected;?> value="<?php echo $tax['id']; ?>"><?php echo $tax['name']; ?></option>
                                                  <?php }?>
                                               
                                                </select>
                                                  <span class="error-span"></span>
                                                </td>
                                                <? }} else { ?>
                                                <td><?php echo $edit_data['inv_discount']; ?></td>
                                                <td><?php echo $edit_data['total_tax2']; ?></td>
                                                <?php } ?>
                                                <td><?php echo $edit_data['total'];?></td>
                                                <td><?php echo $edit_data['paid'];?></td>
                                                <td><?php echo $edit_data['total']-$edit_data['paid'];?></td>
											  </tr>
                                             <?php } else { ?>
                                              <tr><td colspan="7" class="center"><?php echo get_phrase('no_record'); ?></td></tr>
											<?php } ?>
                                            </tbody>
										  </table>   
                                        </div>
                                    	</div>
                                         </div>
                                         <div class="form-group">
                                         <div class="box border">
                                         <div class="box-title">
									<h4><?php echo get_phrase('make')." ".get_phrase('payment').":"?></h4>
										<div class="tools hidden-xs">
										</div>
									</div>
                                         <div class="box-body">
                                           <?php if($this->session->flashdata('message')) { echo "<div class=\"alert alert-block alert-danger fade in\"><a href=\"#\" class=\"close\" aria-hidden=\"true\" data-dismiss=\"alert\">×</a><h4><i class=\"fa fa-times\"></i> ". get_phrase('oh_snap_error')."</h4><p>" .$this->session->flashdata('message') . "</p></div>"; } ?>
                                             <table class="table">
											<thead>
											  <tr>
												<th> <label class="control-label" for="payment_date"><?php echo get_phrase('date');?></label></th>
												<th><label class="control-label"><?php echo get_phrase('payment');?> <?php echo get_phrase('type');?></label></th>
												<th><label class="control-label"><?php echo get_phrase('amount');?></label></th>
												<th><label class="control-label"><?php echo get_phrase('remark');?></label></th>
											  	<th></th>
                                              </tr>
											</thead>
											<tbody>
                                             <?php  if(isset($edit_data['id'])){ ?>
											  <tr>
												<td>
                                                <?php echo form_input('payment_date', date("m/d/Y"), 'class="form-control tip-right date" data-original-title="'.get_phrase('payment').' '.get_phrase('date') .'" id="payment_date" required="required" data-error="' .get_phrase('payment').' '. get_phrase("date") . ' ' . get_phrase("is_required") . '"'); ?>
                                         		</td>
                                                <td><select id="payment_type" name="payment_type" class="col-md-12 select2-offscreen" required>
                                                <option value=""></option>
                                                <option value="cash"><?php echo get_phrase('cash') ?></option>
                                                <option value="cheque"><?php echo get_phrase('cheque') ?></option>
                                                <option value="credit"><?php echo get_phrase('credit') ?></option>
                                                </select>
                                                  <span class="error-span"></span></td>
                                                <td><input type="text" class="form-control" name="amount" required/></td>  <span class="error-span"></span>
                                                <td>
												<input type="text" class="form-control" name="payment_description" />  <span class="error-span"></span>
												</td>
                                                <td><button type="submit" class="btn btn-primary"> <?php echo get_phrase('pay');?> <i class="fa fa-save"></i></button></td>
											  </tr>
                                              <?php } else { ?>
                                              <tr><td colspan="5" class="center"><?php echo get_phrase('not');?> <?php echo get_phrase('allowed');?></td></tr>
                                              <?php } ?>
											</tbody>
										  </table>   
                                        </div>
                                    	</div>
                                         </div>
									</div>
								</div>
                                </form>
								<!-- /BOX -->
							</div>
                            <div class="col-md-5">
								<!-- BOX -->
								<div class="box border green readonly" id="rituverma">
									<div class="box-title">
									<h4><?php echo get_phrase('order')." ".get_phrase('details')?></h4>
										<div class="tools hidden-xs">
										</div>
									</div>
									<div class="box-body">
                                    <div class="form-group readonly">
                                        <table cellpadding="4px" width="100%">
											<thead>
											  <tr>
												<th class="col-sm-4"><?php echo get_phrase('product');?></th>
												<th class="col-sm-4"><?php echo get_phrase('pattarn');?></th>
												<th class="col-sm-4"><?php echo get_phrase('style');?></th>
												</tr>
											</thead>
											<tbody>
											  <tr>
												<td ><select id="product_sel" class="col-md-12 select2-offscreen" required name="product" onChange="showPattern();">
                                                <option value=""> </option>
                                                 <?php foreach($products as $p) {?>
                                                <option value="<?php echo $p['id']; ?>" <?php if($edit_data['item_id']==$p['id']) echo "selected"; ?> ><?php echo $p['item'];?>
                                                </option>
                                                <?php } ?> 
                                                </select></td>
                                                <td><select id="pattarn_sel" class="col-md-12 select2-offscreen" required name="pattarn" onChange="showStyle();">
                                                <?php if(isset($edit_data['pattern_id'])){?>
                                                <option value="<?php echo $edit_data['pattern_id'];?>"> 
												<?php echo $edit_data['pattern_name'];?>
                                                </option>
												<?php }  else { ?>
                                                <option value=""> </option>
                                                <option value="">style</option>
                                                <?php } ?>
                                                </select></td>
                                                <td><select id="style_sel" class="col-md-12 select2-offscreen" required name="style" onChange="showOrderFunct();">
                                                 <?php if(isset($edit_data['style_id'])){?>
                                                <option value="<?php echo $edit_data['style_id'];?>"> 
												<?php echo $edit_data['style_name'];?>
                                                </option>
												<?php }  else { ?>
                                                <option value=""> </option>
                                                <option value=""><?php echo get_phrase("select"); ?> <?php echo get_phrase("pattern"); ?></option>
                                                <?php } ?>
                                                </select></td>
											  </tr>
											</tbody>
										  </table>
                                         </div>
                                    <div id="orderfunct">
                                 	<div class="box border purple" >
									<div class="box-title">
										<h4><i class="fa fa-wrench"></i><span class="hidden-inline-mobile"><?php echo get_phrase("measurement"); ?></span></h4>
									</div>
									<div class="box-body readonly">
										<div class="tabbable header-tabs">
										  <ul class="nav nav-tabs">
											<li ><a href="#no_of_order" data-toggle="tab"><i class="fa fa-tasks"></i> <span class="hidden-inline-mobile"><?php echo get_phrase("orders"); ?></span></a></li>
                                            <li class="active"><a href="#take_measurement" data-toggle="tab"><i class="fa fa-pencil"></i> <span class="hidden-inline-mobile"><?php echo get_phrase("take"); ?> <?php echo get_phrase("measurement"); ?></span></a></li>
										  </ul>
										  <div class="tab-content">
											 <div class="tab-pane active" id="take_measurement">
                                                <p><?php echo get_phrase('take'); ?> <?php echo get_phrase('measurement'); ?></p>
                                                <p id="measurements">
                                               <?php if(isset($edit_data['id'])) {
												$me_arr=json_decode($sub_order[0]['measurement']);
											    foreach($me_arr as $k=>$sub){ 
											 	$unit=$this->crud_model->get_value_by_id('measurement',$k,'measurement_unit');
											   	$title=$this->crud_model->get_value_by_id('measurement',$k,'measurement_title');
											   echo '<div class="form-group"> <div class="input-group"><span class="input-group-addon" style="width:30%"><strong>'.$title.' </strong></span><input type="text" name="'.$k.'" class="form-control text-center input-sm" placeholder="'.$title.'" value="'.$sub.'" /><span class="input-group-addon">'.$unit.'</span></div></div>' ; 
												}} ?>
                                                </p>
                                                <p><textarea class="form-control" rows="2" id="remark" placeholder="<?php echo get_phrase('remark'); ?>"><?php isset($edit_data['note']) ? $edit_data['note'] : ''; ?></textarea>
                                                </p>
                                                   

											 </div>
                                             <div class="tab-pane" id="no_of_order" >
                                                <p><?php echo get_phrase('no'); ?> <?php echo get_phrase('of'); ?> <?php echo get_phrase('order'); ?> <?php echo get_phrase('in'); ?> <?php echo get_phrase('same'); ?> <?php echo get_phrase('measurement'); ?></p>
                                                <p><div class="input-group"><span><strong><?php echo get_phrase('both'); ?> <?php echo get_phrase('sides'); ?></strong></span><span class="input-group-addon data-dwn"><button class="btn btn-danger btn-xs" id="orderSub" type="button" data-dir="dwn"><i class="fa fa-minus"></i></button></span><input type="text" name="orderNumber" id="orderNumber" readonly class="form-control text-center" value="<?php echo isset($edit_data['no_of_suborder']) ? $edit_data['no_of_suborder'] : '1'; ?>" min="1" max="<?php echo ORDER_LIMIT;?>" /><span class="input-group-addon data-up"><button class="btn btn-pink btn-xs" type="button" id="orderAdd" data-dir="up"><i class="fa fa-plus"></i></button></span></div></p>
											 </div>
										  </div>
									   </div>
									</div>
								  </div>
							<div class="form-group">
								<div class="box">
								<?php if(isset($edit_data['id'])){?>
									<form action="<?php echo base_url().'order/change_tailor/'.$edit_data['id']?>" method="post">
									<?php }?>
								  <div class="box-title">
									<h4><i class="fa fa-Plus"></i> <?php echo get_phrase('list')?> <?php echo get_phrase('of')?> <?php echo get_phrase('sub')?> <?php echo get_phrase('orders')?> </h4>
									<div class="tools hidden-xs">
									</div>
								  </div>
									
                                    <div class="box-body scroller" id="takeFabric" data-height="450px">
									<?php if(isset($edit_data['id'])) { $i=1;
										foreach($sub_order as $sub){ ?>  
										 <table class="table table-paper" id="febric1">
                                            <thead>
                                            <tr>
                                            <th colspan="2">
                                            <i class="fa fa-tasks"></i> <?php echo get_phrase('order')." ".$i; ?> 
                                            </th>
                                            </tr>
                                            </thead>
                                            <tbody>
											  <tr>
												<td class="col-sm-10">
                                                <div class="form-group">
                                    		<div class="row">
                                   			 <div class="col-sm-12">
                        						<label class="col-sm-3 control-label">
												<?php echo get_phrase('cloth')." ".get_phrase('length');?>
                           			 			</label>
                        					 	<div class="col-sm-9">
                          					<div class="input-group"><input type="text" id="febricQty<?php echo $i;?>"  class="form-control text-center input-sm" placeholder="<?php echo get_phrase('cloth'); ?> <?php echo get_phrase('length');?>"  value="<?php echo $sub['cloth_length']; ?>"/><span class="input-group-addon"><?php echo get_phrase('mtr'); ?></span></div>
                       	    				 	</div>
                           					 </div>
                           					</div>
                     					</div>
                                       			<div class="form-group">
                                    		<div class="row">
                                   			 <div class="col-sm-12">
                        						<label class="col-sm-3 control-label">
												<?php echo get_phrase('define'); ?> <?php echo get_phrase('payment'); ?>
                           			 			</label>
                        					 	<div class="col-sm-9">
                          					<div class="input-group"><input type="text" id="febricPayment<?php echo $i;?>" class="form-control text-center input-sm" placeholder="<?php echo get_phrase('define'); ?> <?php echo get_phrase('payment'); ?>" value="<?php echo $sub['amount']; ?>" /><span class="input-group-addon"><?php echo CURRENCY; ?></span></div></div>
                           					 </div>
                           					</div>
                     					</div>
                                                <div class="form-group">
                                    		<div class="row">
                                   			 <div class="col-sm-12">
                        						<label class="col-sm-3 control-label">
												<?php echo get_phrase('order_allot_to'); ?> 
                           			 			</label>
                        					 	<div class="col-sm-9">
                                                <select class="form-control" id="workerId<?php echo $i;?>" name="workerId1[]" placeholder="<?php echo get_phrase('order_allot_to'); ?> ">
                                                 <option value=""> </option>
                                                  <?php
                                                     $employees = $this->crud_model->get_All_List('employees','status', 'active');
                                                      foreach ($employees as $employee)
                                                      {?>
                                                    <option value="<?php echo $employee['emp_id']; ?>" <?php if($sub['worker_id']==$employee['emp_id']) echo 'selected';?>><?php echo ucwords($employee['fname']).' '.ucwords($employee['lname']);?></option>
                                                    <?php }?>
                          						</select>
                          						<input type="hidden" name="subOrderSingleId[]" value="<?php echo $sub['id']; ?>"
                       	    				 	</div>
                           					 </div>
                           					</div>
                     					</div>
                                        		</td>
                                                <td class="col-sm-2" id="rotate1">
                                               <?php if($sub['cloth_id']==0){?>
                                               <img src="<?php echo base_url().'uploads/clothgiven.jpg'?>" height="200px" width="50px">
											   <?php } else {
												$img_name=$this->crud_model->get_value_by_id('cloth_products',$sub['cloth_id'],'image');
												$cloth_name=$this->crud_model->get_value_by_id('cloth_products',$sub['cloth_id'],'cloth_name');
												?>
                                               
                                               <img alt="<?php echo $cloth_name;?>" title="<?php echo $cloth_name;?>" src="<?php echo base_url().'uploads/products/'.$img_name?>" height="200px" width="100px">
                                               <h5><?php echo $cloth_name;?></h5>
											   <?php } ?>
                                                </td>
                                                </tr>
                                            </tbody>
										  </table>
										<?php $i++; }} else { ?>
										<table class="table table-paper" id="febric1">
										<thead>
										<tr>
										<th colspan="2">
										<i class="fa fa-tasks"></i> <?php echo get_phrase('order'); ?> 1
										</th>
										</tr>
										</thead>
										<tbody>
											  <tr>
												<td class="col-sm-10">
                                                <div class="form-group">
                                    		<div class="row">
                                   			 <div class="col-sm-12">
                        						<label class="col-sm-3 control-label">
												<?php echo get_phrase('cloth'); ?> <?php echo get_phrase('length');?>
                           			 			</label>
                        					 	<div class="col-sm-9">
                          					<div class="input-group"><input type="text" id="febricQty1"  class="form-control text-center input-sm" placeholder="<?php echo get_phrase('cloth'); ?> <?php echo get_phrase('length');?>" /><span class="input-group-addon"><?php echo get_phrase('mtr'); ?></span></div>
                       	    				 	</div>
                           					 </div>
                           					</div>
                     					</div>
                                       			<div class="form-group">
                                    		<div class="row">
                                   			 <div class="col-sm-12">
                        						<label class="col-sm-3 control-label">
												<?php echo get_phrase('define'); ?> <?php echo get_phrase('payment'); ?>
                           			 			</label>
                        					 	<div class="col-sm-9">
                          					<div class="input-group"><input type="text" id="febricPayment1" class="form-control text-center input-sm" placeholder="<?php echo get_phrase('define'); ?> <?php echo get_phrase('payment'); ?>" /><span class="input-group-addon"><?php echo CURRENCY; ?></span></div></div>
                           					 </div>
                           					</div>
                     					</div>
                                                <div class="form-group">
                                    		<div class="row">
                                   			 <div class="col-sm-12">
                        						<label class="col-sm-3 control-label">
												<?php echo get_phrase('order_allot_to'); ?>
                           			 			</label>
                        					 	<div class="col-sm-9">
                                                <select class="form-control" id="workerId1" name="workerId1" placeholder="<?php echo get_phrase('order_allot_to'); ?>">
                                                 <option value=""> </option>
                                                  <?php
                                                     $employees = $this->crud_model->get_All_List('employees','status', 'active');
                                                      foreach ($employees as $employee)
                                                      {?>
                                                    <option value="<?php echo $employee['emp_id']; ?>"><?php echo ucwords($employee['fname']).' '.ucwords($employee['lname']);?></option>
                                                    <?php }?>
                          						</select>
                       	    				 	</div>
                           					 </div>
                           					</div>
                     					</div>
                                        		<div class="form-group">
                                    		<div class="row">
                                   			 <div class="col-sm-12">
                        					<div class="col-sm-4">
                                                <button type="button" id="browse1" onclick="browseCloth(1);" class="btn btn-xs btn-warning"><i class="fa fa-folder-open-o"></i> <?php echo get_phrase('browse'); ?> <?php echo get_phrase('cloth'); ?></button>
                       	    				 	</div>	
                                            <div class="col-sm-4"><button id="confirm1" onclick="confirmSubOrder(this)" class="btn btn-xs btn-info" data-complete-text="<?php echo get_phrase('confirmed'); ?>" data-loading-text="<?php echo get_phrase('confirming'); ?>..." type="button"><i class="fa fa-thumbs-o-up"></i>  <?php echo get_phrase('confirm')."  "; ?>   </button><input type="hidden" id="febricId1" value="">
                                                </div>
                        					 	
                           					 </div>
                           					</div>
                     					</div>
                                        		</td>
                                                <td class="col-sm-2" id="rotate1">
                                               
                                                </td>
                                                </tr>
                                            </tbody>
										  </table>
                                            <?php } ?>
                                          
									</div>
								
                                     <?php if(!isset($edit_data['id'])) { ?>
                                    <div class="form-group">
                                    			<div class="row">
                        					 	<div class="col-sm-12">
                          							<button class="btn btn-primary" id="submit_order" disabled><i class="fa fa-plus fa-lg" style="color:#45BB0D" ></i> <?php echo get_phrase('add').' '.get_phrase('item');?> </button>
                       	    				 	</div>
                           						</div>
                     							</div>
                                     <?php }else{ ?>
									 <div class="form-group">
                                    			<div class="row">
                        					 	<div class="col-sm-12">
                          							<button type="submit" id="changeTailor" class="btn btn-primary"><i class="fa fa-edit fa-lg"></i> <?php echo get_phrase('change').' '.get_phrase('tailor');?> </button>
                       	    				 	</div>
                           						</div>
                     							</div> 
								    
								     <?php }?>
								     
                                    </div>
                                    </div>
									</div>
								</div>
								<!-- /BOX -->
							</div>
						</div>
                       	<?php if(!empty($payments)){
							?>	 
                	<div class='row'>
                    <div class='col-md-12 box-container'>
                	<div class="box border red">
                  <div class="box-title">
                    <h4><i class="fa fa-table"></i><?php echo get_phrase('payment')?> <?php echo get_phrase('details')?></h4>
                  </div>
				 <div class="box-body">
                    <table id="datatable2" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
                      <thead>
                        <tr>
                          <th><?php echo get_phrase('s_no');?></th>
                          <th><?php echo get_phrase('paid');?></th>
						  <th><?php echo get_phrase('rest');?></th>
                          <th ><?php echo get_phrase('date');?></th>
                         </tr>
                      </thead>
                      <tbody>
                        <?php 
						$i=1;
						foreach($payments as $pay) {
						if($edit_data['id']==$pay['order_id']){?>
                        <tr class="gradeX">
                          <td><?php echo $i ?></td>
                          <td><?php echo $pay['amount'];?></td>
						  <td><?php echo $pay['rest_amt'];?></td>
                          <td><?php echo $pay['pay_date']; ?></td>
                         </tr>
                        <?php $i++;}}?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th><?php echo get_phrase('s_no');?></th>
                          <th><?php echo get_phrase('paid');?></th>
						  <th><?php echo get_phrase('rest');?></th>
                          <th ><?php echo get_phrase('date');?></th>
                          </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>	
                  </div>
                  </div>
             			<?php }?>
                
                        <div class="row">
                        <div class="col-sm-12">
                        <div class="box border purple">
									<div class="box-body">
                                         <div class="box">
                                       		<div class="box-body">
                                            <div class="wizard-form">
                            <div class="row">
                              <div class="col-md-7">
                                <div class="row">
                                  <div class="col-md-6">
                                  <table class="table table-bordered table-hover">
                                      <tbody>
                                        <tr>
                                          <th> <?php echo get_phrase('billed');?> <?php echo get_phrase('to');?> </th>
                                          <td><?php echo $cust_add[0]['fname'];?> <?php echo $cust_add[0]['lname'];?></td>
                                        </tr>
                                        <tr>
                                          <th> <?php echo get_phrase('name');?> </th>
                                          <td> <?php echo $cust_add[0]['fname'];?></td>
                                        </tr>
                                        <tr>
                                          <th> <?php echo get_phrase('address');?> </th>
                                          <td><?php echo $cust_add[0]['address'];?></td>
                                        </tr>
                                        <tr>
                                          <th> <?php echo get_phrase('phone');?> </th>
                                          <td><?php echo $cust_add[0]['mobile'];?></td>
                                        </tr>
                                      </tbody>
                                    </table>
                                    
                                  </div>
                                  <div class="col-md-6">
                                     <table class="table table-bordered table-hover">
                                      <tbody>
                                        <tr>
                                          <th> <?php echo get_phrase('remit');?> <?php echo get_phrase('to');?> </th>
                                          <td><?php echo SYSTEM_TITLE;?></td>
                                        </tr>
                                        <tr>
                                          <th> <?php echo get_phrase('company');?> </th>
                                          <td> <?php echo SYSTEM_NAME;?></td>
                                        </tr>
                                        <tr>
                                          <th> <?php echo get_phrase('address');?> </th>
                                          <td><?php echo ADDRESS;?></td>
                                        </tr>
                                        <tr>
                                          <th> <?php echo get_phrase('phone');?> </th>
                                          <td><?php echo PHONE;?></td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                              </div>
                              <!--LOGO TABLE-->
                              <div class="col-md-5">
                                <table class="table table-bordered table-hover">
                                  <tbody>
                                    <tr>
                                      <th> <?php echo ucwords(get_phrase('invoice'));?> <?php echo ucwords(get_phrase('date'));?> </th>
                                      <td width="40%"><?php echo date(PHP_DATE, strtotime($inv->date)); ?></td>
                                    </tr>
                                    <tr>
                                      <th> <?php echo ucwords(get_phrase('ref_no'));?> </th>
                                      <td> <?php echo INVOICE_PREFIX.'-'.date('Y').$inv->id; ?></td>
                                    </tr>
                                    <tr>
                                      <th> <?php echo ucwords(get_phrase('due'));?> <?php echo ucwords(get_phrase('date'));?> </th>
                                      <td><?php echo $inv->delivery_date;?>
                                        <?php //echo $inv->reference_no; ?></td>
                                    </tr>
                                    <tr>
                                      <th> <?php echo ucwords(get_phrase('amount'));?> <?php echo ucwords(get_phrase('due'));?> </th>
                                      <td><?php echo ($pay['rest_amt']) ? $pay['rest_amt'] : $inv->inv_total; ?></td>
                                    </tr>
                                    <tr>
                                      <th> <?php echo ucwords(get_phrase('amount'));?> <?php echo ucwords(get_phrase('enclosed'));?> </th>
                                      <td><?php echo $inv->total; ?></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                              <!--/LOGO TABLE--> 
                              
                            </div>
                         
                      <div class="form-actions clearfix">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="col-md-offset-3">
                              <a href="<?php echo base_url().$roles.'/view_invoice/'.$edit_data['id'];?>" class="btn btn-primary" <?php if(!isset($edit_data['id'])) { ?> disabled <?php } ?> ><?php echo ucwords(get_phrase('generate')); ?> <?php echo ucwords(get_phrase('invoice')); ?></a>
                              <!-- <input type="hidden" name="act" value="setting_update"  />-->
                             <a href="<?php echo base_url().$roles.'/orders/work_order/'.$edit_data['id'];?>" class="btn btn-primary" <?php if(!isset($edit_data['id'])) { ?> disabled <?php } ?> ><?php echo get_phrase('work');?> <?php echo get_phrase('orders');?></a>
                            </div>
                          </div>
                        </div>
                      </div>
                     
                      </div>
											</div>
                                        </div>
                                    </div>
                        </div>
								</div>
                                </div>
					</div>
                                
						<!-- /INVOICE -->
						<div class="footer-tools">
							<span class="go-top">
								<i class="fa fa-chevron-up"></i> Top
							</span>
						</div>
					</div><!-- /CONTENT-->
				</div>
			</div>
    <div id="loading" style="display: none;">
        <div class="gmailLoader"> <img src="<?php echo base_url(); ?>assets/img/loaders/11.gif" alt="<?php echo get_phrase('loading'); ?>" /> <?php echo get_phrase('loading'); ?> 
        </div>
    </div>
   
<script type="text/javascript">
	
	$(function() {
	<?php if($edit_data['id']!=''){ ?>
	$('.readonly').find('input,button,select,textarea').attr('disabled','disabled');
	$('.readonly').find('select[name="workerId1[]"]').removeAttr('disabled');
	$('.readonly').find('button[id="changeTailor"]').removeAttr('disabled');
	$('.readonly').find('input[name="subOrderSingleId[]"]').removeAttr('disabled');
	<?php } ?>
    $( "#payment_date" ).datepicker({
      defaultDate: "<?php echo date("m/d/Y")?>",
      changeMonth: true,
      numberOfMonths: 1,
    });
	});

		var workerId = '';
	 	var workerName = '';
		var suborderArray = {};
		
		<!-----------------SELECT CUSTOMER ADDRESS------------->
		$('#select4').on('change', function(){
	var id= $('#select4 option:selected').val();
			$.ajax({
				type: "post",
				url: "<?php echo base_url();?>admin/cust_add",
				data: {'id': id},
				dataType: "html",
				beforeSend: function(){
					$('#loading').show();
				},
				success: function(data) {
					  $('#loading').hide();
					  $('#ritu').html(data);
				}
			});
	});

		<!----------------- BROWSE CLOTH FOR STITCHING ------------->
		function browseCloth(ind){
			var index = ind;
			$("#modal_fabric").modal('show');
			$(".hover-content img").css('cursor','pointer');
			$(".hover-content img").click( function(){
			$("#cloth"+index).show();
		$('#rotate'+index).html('<div class="col-md-3 category_1 item"><div class="hover-content"><img src="'+this.src+'" height="200px" width="100px" id="cloth'+index+'" title="'+this.title+'" /><h5 class="center">'+this.title+'</h5></div></div>');				
			//$("#cloth"+index).attr('src',this.src);
			$("#febricId"+index).val($(this).attr('id'));
			$("#modal_fabric").modal('hide');
			index = '';
			});
		}
		
		function confirmSubOrder(obj)
		{
			Id = obj.id.split('confirm')[1];
			clothId = $("#febricId"+Id).val();
			clothLength = $("#febricQty"+Id).val();
			workerId =$("#workerId"+Id).val();
			workerName =$('#workerId'+Id+' option:selected').text();
			payment = $("#febricPayment"+Id).val();
			var flag=0;
			
			var tepMeasurement = {};			
			$('#measurements input[type=text]').each(function (){
				if($(this).val()=='')
				{
				flag=1;
				}
				else
				{
				tepMeasurement[$(this).attr('name')] = $(this).val();
				}
			});
			var ref_no 		= $("#reference_no").val();
			var trialData 	= $("#trial_date").val();
			var deliverDate = $("#delivery_date").val();
			var orderDate 	= $("#order_date").val();
			var remark 		= $('#remark').val();
			var cust_id		= $('#select4').val();
			var item_id 	= $('#product_sel option:selected').val();
			var item_name 	= $('#product_sel option:selected').text();
			var pattern_id 	= $('#pattarn_sel option:selected').val();
			var pattern_name= $('#pattarn_sel option:selected').text();
			var style_id 	= $('#style_sel option:selected').val();
			var style_name 	= $('#style_sel option:selected').text();
			var cust_name 	= $('#select4 option:selected').text();

			if (orderDate==''){
				bootbox.alert("<?php echo get_phrase("please"); ?> <?php echo get_phrase("select"); ?> <?php echo get_phrase("order"); ?> <?php echo get_phrase("date"); ?>");
				return false;
			}

			if (trialData==''){
				bootbox.alert("<?php echo get_phrase("please"); ?> <?php echo get_phrase("select"); ?> <?php echo get_phrase("trail"); ?> <?php echo get_phrase("date"); ?>");
				return false;
			}

			if (deliverDate==''){
				bootbox.alert("<?php echo get_phrase("please"); ?> <?php echo get_phrase("select"); ?> <?php echo get_phrase("delivery"); ?> <?php echo get_phrase("date"); ?>");
				return false;
			}

			if (cust_id==''){
				bootbox.alert("<?php echo get_phrase("please"); ?> <?php echo get_phrase("select"); ?> <?php echo get_phrase("customer"); ?>");
				return false;
			}

			if (item_id==''){
				bootbox.alert("<?php echo get_phrase("please"); ?> <?php echo get_phrase("select"); ?> <?php echo get_phrase("product"); ?>");
				return false;
			}

			if (pattern_id==''){
				bootbox.alert("<?php echo get_phrase("please"); ?> <?php echo get_phrase("select"); ?> <?php echo get_phrase("pattarn"); ?>");
				return false;
			}

			if (style_id==''){
				bootbox.alert("<?php echo get_phrase("please"); ?> <?php echo get_phrase("select"); ?> <?php echo get_phrase("style"); ?>");
				return false;
			}
			 
			if(flag==1)
			{
			bootbox.alert("<?php echo get_phrase("please"); ?> <?php echo get_phrase("enter"); ?> <?php echo get_phrase("measurements"); ?>");
			tepMeasurement='';	
			return false;
			}

			if (clothLength==''){
				bootbox.alert("<?php echo get_phrase("please"); ?> <?php echo get_phrase("enter"); ?> <?php echo get_phrase("cloth"); ?> <?php echo get_phrase("length"); ?>");
				return false;
			}
			
			if (payment==''){
				bootbox.alert("<?php echo get_phrase("please"); ?> <?php echo get_phrase("enter"); ?> <?php echo get_phrase("payment"); ?>");
				return false;
			}
			
			if (workerId==''){
				bootbox.alert("<?php echo get_phrase("please"); ?> <?php echo get_phrase("choose"); ?> <?php echo get_phrase("tailor"); ?>");
				return false;
			}
			
			
			if (clothId==''){
				bootbox.confirm("<?php echo get_phrase("is_cloth_given"); ?>", function(gotit){
				    if (gotit){
						$('#rotate'+Id).html(' <img src="<?php echo base_url();?>uploads/clothgiven.jpg" height="200px" width="50px">');
						$("#febricId"+Id).val('0');
						return true;
					}
		   			else{
						$('#bootbox-modal').hide();
						$('#browse'+Id).trigger('click');
					}
				   });
				   return false;	
			}
			 var subOrderDict = {};
			 subOrderDict['remark'] 		= remark 		|| '';
			 subOrderDict['cloth_id'] 		= clothId 		|| '0';
			 subOrderDict['cloth_length'] 	= clothLength 	|| '0';
			 subOrderDict['worker_id'] 		= workerId;
			 subOrderDict['worker_name'] 	= workerName;
			 subOrderDict['measurement']	= tepMeasurement;
			 subOrderDict['payment']		= payment 		|| '0';
			 subOrderDict['order_date'] 	= orderDate;
			 subOrderDict['trial_date'] 	= trialData;
			 subOrderDict['deliver_date'] 	= deliverDate;
			 subOrderDict['reference_no'] 	= ref_no;
			 subOrderDict['customer_id'] 	= cust_id;
			 subOrderDict['customer_name'] 	= cust_name;
			 subOrderDict['item_id'] 		= item_id;
			 subOrderDict['item_name'] 		= item_name;
			 subOrderDict['pattern_id'] 	= pattern_id;
			 subOrderDict['pattern_name'] 	= pattern_name;
			 subOrderDict['style_id'] 		= style_id;
			 subOrderDict['style_name'] 	= style_name;
			 
			// console.log(subOrderDict);
			 suborderArray[Id] = subOrderDict;
			// console.log(suborderArray);	 
			 if($.isEmptyObject(suborderArray)==false){
			 	$("#febric"+Id).css('opacity', '0.8');
			 	$("#"+obj.id).val('Confirmed').text('Confirmed');
				$("#febric"+Id).find('input,button,select').attr('disabled','disabled');
				$('#submit_order').removeAttr('disabled');
			 	return true;
			 }
			 else
			 {
				return false;	 
			 }
		}
		
		<!------------------PATTERN SHOWING--------------------->
		function showPattern(){
			var prdID = $('#product_sel').val();
			$.ajax({
				type: "post",
				url: "<?php echo base_url();?>order/ajaxpatterns_all",
				data: {'itemId': prdID},
				dataType: "json",
				beforeSend: function(){
					$('#loading').show();
				},
				success: function(data) {
				  if(data!='no'){
					$("#pattarn_sel").select2("val", "");
					$("#pattarn_sel").empty();
					$('#loading').hide();
					$("#pattarn_sel").append($('<option>', { 
						value: -1,
						text : '' 
					}));
					$.each(data,function(index,value){
					$("#pattarn_sel").append($('<option>', { 
						value: value['id'],
						text : value['pattern'] 
					}));
					});
				  }else{
					  bootbox.alert("<?php echo get_phrase("no_pattern_found"); ?>");
						$("#pattarn_sel").select2("val", "");
						$("#pattarn_sel").empty();
						$('#loading').hide();
					  return false;
				  }
				}
			});
		}
		
		<!------------------STYLE SHOWING--------------------->
		function showStyle(){
			var patternID = $('#pattarn_sel').val();
			$.ajax({
				type: "post",
				url: "<?php echo base_url();?>order/ajaxstyles_all",
				data: {'patternID': patternID},
				dataType: "json",
				beforeSend: function(){
					$('#loading').show();
				},
				success: function(data) {
				  if(data!='no'){
					$("#style_sel").select2("val", "");
					$("#style_sel").empty();
					$("#style_sel").append($('<option>', { 
						value: -1,
						text : '' 
					}));
					$('#loading').hide();
					$.each(data,function(index,value){
					$("#style_sel").append($('<option>', { 
						value: value['id'],
						text : value['style'] 
					}));
					});
				  }else{
					  bootbox.alert("<?php echo get_phrase("no_style_found"); ?>");
						$("#style_sel").select2("val", "");
						$("#style_sel").empty();
						$('#loading').hide();
					  return false;
				  }
				}
			})
		}

		<!------------------ORDER FUNCTIONALITY SHOWING--------------------->
		function showOrderFunct(){
			var styleID = $('#style_sel').val();
			var patternID = $('#pattarn_sel').val();
			var prdID = $('#product_sel').val();
			var cust_id		= $('#select4').val();
			$.ajax({
				type: "post",
				url: "<?php echo base_url();?>order/ajaxmeasurement",
				data: {'styleID': styleID,'cust_id':cust_id,'prdID':prdID,'patternID':patternID,},
				dataType: "json",
				beforeSend: function(){
					$('#loading').show();
				},
				success: function(data) {
				//	$('#orderfunct').show();
					$('#measurements').empty();
					console.log(data);
					$.each(data,function(index,value){
						var cmval = '';
						if(value["cust_measurement"]){cmval= value["cust_measurement"];}
						
						var newDiv = '<div class="form-group"> <div class="input-group"><span class="input-group-addon" style="width:30%"><strong>'+value["measurement_title"]+' </strong></span><input type="text" name="'+value["id"]+'" class="form-control text-center input-sm" placeholder="'+value["measurement_title"]+'" value="'+cmval+'" /><span class="input-group-addon">'+value["measurement_unit"]+'</span></div></div>';
						$("#measurements").append(newDiv);
					});
					$('#loading').hide();
				}
			});
		}
		
		<!----------------- INCREASE NUMBER OF ORDER ------------->
	    $('#orderAdd').click(function(){
		 $('#orderSub').prop("disabled", false);
          input = $('#orderNumber');
		  if ( input.attr('max') == undefined || parseInt(input.val()) < parseInt(input.attr('max')) ) {
				input.val(parseInt(input.val())+1);
				orderFebric();
			}else{
				$(this).prop("disabled", true);
			}
	     });
		 
		/*--------------- DECREASE NUMBER OF ORDER -----------*/		 
     	$('#orderSub').click(function(){
		  $('#orderAdd').prop("disabled", false);
          input = $('#orderNumber');
		   if ( input.attr('min') == undefined || parseInt(input.val()) > parseInt(input.attr('min')) ) {
				input.val(parseInt(input.val())-1);
				orderFebricRemove();
			}else{
				$(this).prop("disabled", true);
			}
	     });
			
	    <!----------------- ADD NUMBER OF ORDER IN SAME MEASUREMENT ------------->
		function orderFebric(){
			var ordHtml = '';
			var counter = Number($('#orderNumber').val());
			var ordHtml = '<table class="table table-paper" id="febric'+counter+'"><thead><tr><th colspan="2"><i class="fa fa-tasks"></i><?php echo get_phrase('order'); ?> '+counter+'</th></tr></thead><tbody><tr><td class="col-sm-10"><div class="form-group"><div class="row"><div class="col-sm-12"><label class="col-sm-3 control-label"><?php echo get_phrase('cloth')." ".get_phrase('length');?></label><div class="col-sm-9"><div class="input-group"><input type="text" id="febricQty'+counter+'"  class="form-control text-center input-sm" placeholder="<?php echo get_phrase('cloth'); ?> <?php echo get_phrase('length'); ?>" /><span class="input-group-addon"><?php echo get_phrase('mtr'); ?></span></div></div></div></div></div><div class="form-group"><div class="row"><div class="col-sm-12"><label class="col-sm-3 control-label"><?php echo get_phrase('define'); ?> <?php echo get_phrase('payment'); ?></label><div class="col-sm-9"><div class="input-group"><input type="text" id="febricPayment'+counter+'" class="form-control text-center input-sm" placeholder="<?php echo get_phrase('define'); ?> <?php echo get_phrase('payment'); ?>" /><span class="input-group-addon"><?php echo CURRENCY; ?></span></div></div></div></div></div><div class="form-group"><div class="row"><div class="col-sm-12"><label class="col-sm-3 control-label"><?php echo get_phrase('order_allot_to'); ?> </label><div class="col-sm-9"><select class="form-control" id="workerId'+counter+'" name="workerId'+counter+'" placeholder="<?php echo get_phrase('order_allot_to'); ?> "><option value=""> </option><?php $employees = $this->crud_model->get_All_List('employees','status', 'active');foreach ($employees as $employee){?><option value="<?php echo $employee['emp_id']; ?>"><?php echo ucwords($employee['fname']).' '.ucwords($employee['lname']);?></option><?php }?></select></div></div></div></div><div class="form-group"><div class="row"><div class="col-sm-12"><div class="col-sm-4"><button type="button" id="browse'+counter+'" onclick="browseCloth('+counter+');" class="btn btn-xs btn-warning"><i class="fa fa-folder-open-o"></i> <?php echo get_phrase('browse'); ?> <?php echo get_phrase('cloth'); ?></button></div><div class="col-sm-4"><button id="confirm'+counter+'" onclick="confirmSubOrder(this)" class="btn btn-xs btn-info" data-complete-text="<?php echo get_phrase('confirmed'); ?>" data-loading-text="<?php echo get_phrase('confirming'); ?>..." type="button"><i class="fa fa-thumbs-o-up"></i>  <?php echo get_phrase('confirm')."  "; ?>   </button><input type="hidden" id="febricId'+counter+'" value=""></div></div></div></div></td><td class="col-sm-2" id="rotate'+counter+'"></td></tr></tbody></table>';
			$("#takeFabric").append(ordHtml);
		}
		
 		<!-----------------REMOVE NUMBER OF ORDER IN SAME MEASUREMENT ------------->
		function orderFebricRemove(){
			var orderHtml = '';
			var counter = Number($('#orderNumber').val()) ;
			$("#febric"+(counter + 1)).remove();
		}
	
		<!--------- for various dates in form---------->
 		$(function() {
    $( "#order_date" ).datepicker({
     <?php if(isset($edit_data['date'])) {?>
	  defaultDate: "<?php echo date("m/d/Y",$edit_data['date'])?>",
     <?php } else { ?>
	  defaultDate: "<?php echo date("m/d/Y")?>",
	 <?php } ?>
	  changeMonth: true,
      numberOfMonths: 1,
      onClose: function( selectedDate,defaultDate ) {
          console.log(defaultDate);
         
        $( "#trial_date" ).datepicker( "option", "minDate", selectedDate );
        //$( "#deliver_date" ).datepicker( "option", "minDate", selectedDate );
      }
    });
   $("#order_date").datepicker("setDate", new Date());
   var currentDate = "<?php echo date("m/d/Y")?>";
   console.log(currentDate);
    $( "#trial_date" ).datepicker({ minDate: currentDate,
    
    onClose: function( selectedDate ) {       
        $( "#delivery_date" ).datepicker( "option", "minDate", selectedDate );
      }
  });
    
     $( "#delivery_date" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 1,
      onClose: function( selectedDate ) {
        $( "#order_date" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
  });
   
		<!--------- Validation--------->
		$(document).ready(function() {
		<!------NEW ORDER FORM VALIDATION------> 
		$('#frm').validate({
              rules: {
			<?php if(DISCOUNT_OPTION == 1) { ?>
                discount: {
                  required: true
                },
		    <?php }?>
			<?php if(TAX2 == 1) { ?>
                tax: {
                  required: true
                },
		    <?php }?>
				payment_type: {
                  required: true
                },
				amount: {
                  required: true,
				  digits:true
                },
				payment_date: {
                  required: true
                },
                order_date: {
                  required: true
				},
                trial_date: {
                  required: true
				},
				reference_no: {
                  required: true
                },
                delivery_date: {
                  required: true
				},
				customer: {
                  required: true
                },
              },
              highlight: function(element) {
                $(element).closest('.form-control').removeClass('has-success').addClass('has-error');
              },
              success: function(element) {
                element
                .addClass('valid')
                .closest('.form-control').removeClass('has-error').addClass('has-success');
              }
             }); 
	});

		<!--------- various button click--------->
		$(".cancel").on("click", function(){
		window.location.href="<?php echo base_url();?>admin/new_order";	
		});


		<!--------- Add item/order--------->
		$("#submit_order").click(function (){
			//console.log(suborderArray);
			//console.log($.isEmptyObject(suborderArray));
			if($.isEmptyObject(suborderArray)==true){
				bootbox.alert("<?php echo get_phrase("confirm_atleast_one_order"); ?>");
				$("#submit_order").removeAttr('data-loading-text','<?php echo get_phrase('submitting'); ?>...');
				return false;	
			}
			else{
				$.ajax({
					dataType: 'json',
					type: "post",
					url: "<?php echo base_url();?>order/add",
					data: {'data': JSON.stringify(suborderArray),'page':"tailor"},
					beforeSend: function(){
						$('#loading').show();
						$("#submit_order").attr('id','btn-load-complete').attr('data-loading-text','<?php echo get_phrase('submitting'); ?>...');
						
					},
					success: function(data) {
						window.location.href = "<?php echo base_url().$this->session->userdata('roles')."/tailor/";?>"+data;
						gritter_show('<?php echo get_phrase('order');?>','<?php echo get_phrase('added_successfully');?>');
						$("#rituverma").find('input,button,select,textarea').attr('disabled','disabled');
						$('#loading').hide();
						$("#submit_order").attr('disabled', 'disabled');
						$("#order_date").attr('disabled', 'disabled');
						$("#select4").attr('disabled', 'disabled');
					}
				});
			}
		});
	function gritter_show(title, msg)
	{
		setTimeout(function () {
                var unique_id = $.gritter.add({
                    title:title,
                    text: msg,
                    image: '<?php echo base_url();?>assets/img/gritter/buy.png',
                    sticky: true,
                    time: '',
                    class_name: 'my-sticky-class'
                });
                setTimeout(function () {
                    $.gritter.remove(unique_id, {
                        fade: true,
                        speed: 'slow'
                    });
                }, 12000);
            }, 2000);	
	}

</script>
