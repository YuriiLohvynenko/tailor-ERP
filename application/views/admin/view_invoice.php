<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/print.css" media="print"/>
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
              <div class="panel panel-default" id="printDiv">
                <div class="panel-body">
                  <div class='row'>
                    <div class='col-md-12'>
                      <div class="invoice-header clearfix">
                        <h3 class='pull-left'> <i class='fa fa-list'></i> <span><?php echo get_phrase('invoice');?></span> <span class='text-muted'>#<?php echo $inv->id;?></span> </h3>
                      </div>
                      <div>
                        <div class='pull-left'> 
                          <!--<div class='btn-group'>--> 
                          <img src="<?php echo $this->crud_model->get_image_url('',SYSTEM_LOGO);?>" alt="<?php echo SYSTEM_TITLE;?>" class="img-responsive" height="30" width="120"> 
                          <!--</div>--> 
                        </div>
                        <div class="pull-center">
                          <h3><?php echo SYSTEM_TITLE;?></h3>
                        </div>
                        <div class="pull-right" align="right">
                          <address>
                          <strong><?php echo SYSTEM_NAME;?></strong> <br>
                          <?php echo ADDRESS;?> <br>
                          <strong><?php echo get_phrase('Name:')?></strong> <?php echo SYSTEM_NAME;?> <br>
                          <strong><?php echo get_phrase('Email:')?></strong> <?php echo SYSTEM_EMAIL;?> <br>
                          <strong><?php echo get_phrase('Mob_No.')?></strong> <small></i> <?php echo PHONE;?></small>
                          </address>
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class='row'>
                    <div class='col-md-4 seller'>
                      <div class='invoice-title'><?php echo get_phrase('Billed_To')?></div>
                      <address>
                      <strong><?php echo get_phrase('customer')?> <?php echo get_phrase('Name:')?></strong> <strong><?php echo $customers->fname;?> <?php echo $customers->lname;?></strong> <br>
                      <strong><?php echo get_phrase('Address:')?></strong> <?php echo $customers->address;?> <br>
                      <strong><?php echo get_phrase('Mob_No.:')?></strong> <small></i> <?php echo $customers->mobile;?></small> <br>
                      <strong><?php echo get_phrase('Email:')?></strong><small><?php echo $customers->email;?></small>
                      </address>
                    </div>
                    <div class="col-md-4 buyer"> </div>
                    <div class='col-md-4 payment-info' align="right">
                      <div class='invoice-title text-muted'><?php echo get_phrase('invoice');?> <?php echo get_phrase('details');?></div>
                      <div class="well"> <strong><?php echo get_phrase('invoice');?> <?php echo get_phrase('date');?>: </strong> <?php echo date(PHP_DATE, strtotime($inv->date)); ?> <br>
                        <strong><?php echo get_phrase('ref_no');?>: </strong> <?php echo INVOICE_PREFIX.'-'.date('Y').$inv->id; ?> <br>
                        <!--37464-FDRE-AHF65--> 
                      </div>
                    </div>
                  </div>
                </div>
                <!-- COST TABLE -->
                 <div class="panel-body">
                	<div class='row'>
                    <div class='col-md-12 box-container'>
                   		 <div class="box border purple">
                      <div class="box-title">
                        <h4><i class="fa fa-table"></i><?php echo get_phrase('suborders')?></h4>
                        <div class="tools hidden-xs"> <a href="javascript:;" class="reload"> <i class="fa fa-refresh"></i> </a> <a href="javascript:;" class="collapse"> <i class="fa fa-chevron-up"></i> </a> <a href="javascript:;" class="remove"> <i class="fa fa-times"></i> </a> </div>
                      </div>
                      <div class="box-body">
                        <table id="datatable2" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
                          <thead>
                            <tr>
                              <th><?php echo get_phrase('s_no');?></th>
                              <th><?php echo get_phrase('suborder');?> <?php echo get_phrase('no');?></th>
                              <th ><?php echo get_phrase('delivery');?> <?php echo get_phrase('date');?></th>
                              <th ><?php echo get_phrase('description');?></th>
                              <th ><?php echo get_phrase('cloth');?> <?php echo get_phrase('name');?></th>
                              <th ><?php echo get_phrase('cloth');?> <?php echo get_phrase('picture');?></th>
                              <th ><?php echo get_phrase('cloth');?> <?php echo get_phrase('price');?></th>
                              <th ><?php echo get_phrase('amount');?></th>
                              <th ><?php echo get_phrase('total');?></th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                            $i=1;
                            foreach($orders as $order):?>
                            <tr class="gradeX">
                              <td><?php echo $i ?></td>
                              <td><?php echo $order['id']?></td>
                              <td><?php echo $inv->delivery_date; ?></td>
                              <td>
                              	<strong><?php echo get_phrase('item:');?></strong> <?php  echo ucwords($inv->item_name)."<br>"; ?>
                              	<strong><?php echo get_phrase('pattern:');?></strong> <?php echo ucwords($inv->pattern_name)."<br>"; ?>
							    <strong><?php echo get_phrase('style:');?></strong> <?php  echo ucwords($inv->style_name); ?></td>
							    <td><?php if($order['cloth_id']!='0'){
									echo ucwords($this->crud_model->get_value_by_id('cloth_products',$order['cloth_id'],'cloth_name'));
									}else{echo get_phrase('NA');}?></td>
                              <td>
                              	<?php if($order['cloth_id']!='0'){?>
                              	<img class="media-object" height="40" width="40" src="<?php echo base_url(); ?>/uploads/products/<?php echo $this->crud_model->get_value_by_id('cloth_products',$order['cloth_id'],'image');?>" alt="<?php echo ucwords($this->crud_model->get_value_by_id('cloth_products',$order['cloth_id'],'cloth_name'));?>" title="<?php echo ucwords($this->crud_model->get_value_by_id('cloth_products',$order['cloth_id'],'cloth_name'));?>">
                              	<strong><?php echo ucwords($this->crud_model->get_value_by_id('cloth_products',$order['cloth_id'],'cloth_name'));?></strong>
                              	<?php }else{echo get_phrase('NA');}?>
                              	</td>
                              <td><?php echo $order['cloth_unit_price'] ? $order['cloth_unit_price'] : 'NA'; ?></td>
                              <td><?php echo $order['amount']; ?></td>
                              <td><?php echo $order['sub_order_price']; ?></td>
                            </tr>
                            <?php $i++;endforeach;?>
                          </tbody>
                          <tfoot>
                            <tr>
                              <th><?php echo get_phrase('s_no');?></th>
                              <th><?php echo get_phrase('suborder');?> <?php echo get_phrase('no');?></th>
                              <th ><?php echo get_phrase('delivery');?> <?php echo get_phrase('date');?></th>
                              <th ><?php echo get_phrase('description');?></th>
                              <th ><?php echo get_phrase('cloth');?> <?php echo get_phrase('name');?></th>
                              <th ><?php echo get_phrase('cloth');?> <?php echo get_phrase('picture');?></th>
                              <th ><?php echo get_phrase('cloth');?> <?php echo get_phrase('price');?></th>
                              <th ><?php echo get_phrase('amount');?></th>
                              <th ><?php echo get_phrase('total');?></th>
                            </tr>
                          </tfoot>
                        </table>
                      </div>
                    </div>
                    </div>
                </div>
                </div>
                <!-- /COST TABLE --> 
                <!-- FOOTER -->
                <!--<div class="separator"></div>-->
                <div class="panel-body">
                  <div class='row'>
                    <div class='col-sm-12'>
                      <div class='text-right font-400 font-14'>
                      <h5 class="amount"><?php echo get_phrase("sub").' '.get_phrase("total"); ?> : <?php echo CURRENCY.' '.$this->crud_model->formatMoney($inv->inv_total); ?></h5>
                      <h5 class="amount"><?php echo get_phrase("total").' '.get_phrase("tax"); ?> : <?php echo CURRENCY.' '.$this->crud_model->formatMoney($inv->total_tax); ?></h5>
                      <h5 class="amount"><?php echo get_phrase("discount"); ?> : <?php echo CURRENCY.' '.$this->crud_model->formatMoney($inv->inv_discount); ?></h5>
                        <h4 class="amount"><?php echo get_phrase("total").' '.get_phrase("amount"); ?> : <?php echo CURRENCY.' '.$this->crud_model->formatMoney($inv->total); ?></h4>
                        <h4 class="amount"><?php echo get_phrase("total").' '.get_phrase("suborder"); ?> : <?php echo $inv->no_of_suborder; ?></h4>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /FOOTER -->
            <!------------PAYMENT FORM---------------------->
            <?php if(!empty($payments)){
					$total_paid_arr = array();
					foreach($payments as $payment)
					{
						$total_paid_arr[] = $payment['amount'];	
					}
				  }
				  if(!empty($total_paid_arr)){$total_paid=array_sum($total_paid_arr);}
				  else{$total_paid=0;}
				  
				  if($inv->total>$total_paid){?>
                <div class="panel-body" id="formDiv">
                	<div class='row'>
                    <div class='col-md-12 box-container'>
                	 <div class="box border blue" >
                      <div class="box-title">
                        <h4><i class="fa fa-money"></i><?php echo get_phrase('payment');?></h4>
                        <div class="tools hidden-xs"> <a href="javascript:;" class="reload"> <i class="fa fa-refresh"></i> </a> <a href="javascript:;" class="collapse"> <i class="fa fa-chevron-up"></i> </a> <a href="javascript:;" class="remove"> <i class="fa fa-times"></i> </a> </div>
                      </div>
                      <div class="box-body form">
                      
                        <?php if($this->session->flashdata('message')) { echo "<div class=\"alert alert-block alert-danger fade in\"><a href=\"#\" class=\"close\" aria-hidden=\"true\" data-dismiss=\"alert\">×</a><h4><i class=\"fa fa-times\"></i> ". get_phrase('oh_snap_error')."</h4><p>" .$this->session->flashdata('message') . "</p></div>"; } ?>
                        <?php $attrib = array('class' => 'form-horizontal validate','id' => 'payForm'); echo form_open(base_url().$roles.'/payment/do_payment/'.$inv->id, $attrib); ?>
                        
                        <div class="wizard-form">
                          <div class="wizard-content">
                            <div class="tab-content">
                              <div class="tab-pane active" id="account">
                               <?php if($this->crud_model->formatMoney($inv->total_tax)==0.00  && $this->crud_model->formatMoney($inv->inv_discount)==0.00){?> 
                                  <?php if(DISCOUNT_OPTION == 1) { ?>
                                  <div class="form-group">
                                                   <label class="control-label col-md-3"><?php echo get_phrase('discount');?> <span class="required">*</span></label>
                                                   <div class="col-md-4">
                                                    <?php
                                                        foreach ($discounts as $discount) {
                                                    
                                                            $ds[$discount->id] = $discount->name;
                                                            //print_r($ds); die;
                                                        }
                                                        echo form_dropdown('discount', $ds, DEFAULT_DISCOUNT, 'class="col-md-12 select2-offscreen tip" id="select5" data-placeholder="' . get_phrase("select") . ' ' . get_phrase("default") . ' ' . get_phrase("discount") . '" required="required" data-error="' . get_phrase("discount") . ' get_phrase("type") ' . ' ' . get_phrase("is_required") . '"');
                                                        ?>
                                                      <span class="error-span"></span>
                                                   </div>
                                                </div>
                                             </div>	
                                                <?php }?>
                                                
                                                
    									 <?php if(TAX2 == 1) { ?>
                                            <div class="form-group">
                                               <label class="control-label col-md-3"> <?php echo get_phrase('tax');?><span class="required">*</span></label>
                                               <div class="col-md-4">
                                                 <select id="select3" name="tax" class="col-md-12 select2-offscreen">
                                                 <option <?php if(DEFAULT_TAX==0)echo selected;?> value="0"><?php echo get_phrase('disable'); ?></option>
                                                  <?php 
                                                  //$taxe = $this->db->get('tax_rates')->result_array();
                                                  foreach($taxes as $tax){
                                                  ?>                      
                                                  <option <?php if(DEFAULT_TAX==$tax['id'])echo selected;?> value="<?php echo $tax['id']; ?>"><?php echo $tax['name']; ?></option>
                                                  <?php }?>
                                               
                                                </select>
                                                
                                                  <span class="error-span"></span>
                                               </div>
                                            </div>
                                            <?php }}?>
                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><?php echo get_phrase('payment');?> <?php echo get_phrase('type');?><span class="required">*</span></label>
                                                <div class="col-md-4">
                                                <select id="select4" name="payment_type" class="col-md-12 select2-offscreen">
                                                <option value=""></option>
                                                <option value="cash"><?php echo get_phrase('cash') ?></option>
                                                <option value="cheque"><?php echo get_phrase('cheque') ?></option>
                                                <option value="credit"><?php echo get_phrase('credit') ?></option>
                                                </select>
                                                <span class="error-span"></span>
                                                </div>
                                            </div>
                              
                                <?php //if($amount['total_pay']!=$amount['amount']+$amount['rest_amount']) {?>
                              <div class="form-group">
                                <label class="control-label col-md-3"><?php echo ucwords(get_phrase('amount'));?><span class="required">*</span></label>
                                <div class="col-md-4">
                                
                                  <input type="text" class="form-control" name="amount"/>
                                 
                                  <span class="error-span"></span> </div>
                              </div>
                               <?php //} ?>
                              <div class="form-group">
                                <label class="control-label col-md-3"><?php echo ucwords(get_phrase('payment'));?> <?php echo ucwords(get_phrase('description'));?> </label>
                                <div class="col-md-4">
                                    <?php echo form_textarea('payment_description', (isset($_POST['payment_description']) ? $_POST['note'] : html_entity_decode($data['pay_description'])), 'rows="3" cols="5" class="countable form-control" data-limit="140"'); ?>
                                  
                                </div>
                              </div>
                              <div class="form-group">
                                               <label class="control-label col-md-3"> <?php echo get_phrase('payment');?> <?php echo get_phrase('date');?>  <span class="required">*</span></label>
                                               <div class="col-md-4">
                                              <?php echo form_input('payment_date', (isset($_POST['payment_date']) ? $_POST['payment_date'] : ''), 'class="form-control tip-right date" data-original-title="'.get_phrase('payment').' '.get_phrase('date') .'" id="payment_date" required="required" data-error="' .get_phrase('payment').' '. get_phrase("date") . ' ' . get_phrase("is_required") . '"'); ?>
                                                     
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
                                <button type="submit" class="btn btn-primary"> <?php echo get_phrase('pay');?> <i class="fa fa-save"></i></button>
                                <!--<input type="hidden" name="act" value="setting_update"  />--> 
                                
                              </div>
                            </div>
                          </div>
                        </div>
                       <?php echo form_close();?> 
                      </div>
                   
                  </div>
                  </div>
                  </div>
                </div>
                <?php }?>
			<!------------PAYMENT DETAILS---------------------->
            <?php if(!empty($payments)){?>	 
                <div class="panel-body">
                	<div class='row'>
                    <div class='col-md-12 box-container'>
                	<div class="box border purple">
                  <div class="box-title">
                    <h4><i class="fa fa-table"></i><?php echo get_phrase('payment')?> <?php echo get_phrase('details')?></h4>
                    <div class="tools hidden-xs"> <a href="javascript:;" class="reload"> <i class="fa fa-refresh"></i> </a> <a href="javascript:;" class="collapse"> <i class="fa fa-chevron-up"></i> </a> <a href="javascript:;" class="remove"> <i class="fa fa-times"></i> </a> </div>
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
						if($inv->id==$pay['order_id']){?>
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
                </div> 
             <?php }?>
                
            <!------------RECIPT DETAILS---------------------->	
            <div class="separator"></div>    
                <div class="panel-body">
                	<div class='row'>
                    <div class='col-md-12 box-container'>
                	<div class="panel-body">
                    <div class='row'>
                      <div class='col-sm-7 pull-right'>
                     <?php if($inv->total>$total_paid){?>
                        <div class='text-right font-400 font-14'>
                          <h4 class="amount"><?php echo $tax->rate; echo get_phrase("total").' '.get_phrase("amount").' '.get_phrase("due"); ?> : <?php echo CURRENCY.' '.$this->crud_model->formatMoney(($pay['rest_amt']) ? $pay['rest_amt'] : $inv->inv_total); ?></h4>
                          <h4 class="amount"><?php echo get_phrase("due").' '.get_phrase("date:"); ?><?php echo $inv->delivery_date;?></h4>
                        </div>
                      <?php }else{?>
                      <div class='text-right font-400 font-14'>
                      <a class="btn btn-lg btn-info"><?php echo get_phrase('paid');?> <i class="fa fa-external-link-square"></i></a>
                      </div>
                      <?php }?>
                      </div>
                      <div class="divide-100"></div>
                    </div>
               
                
                    <div class="wizard-form">
                            <div class="row">
                              <div class="col-md-7">
                               <!-- <div class="row">
                                  <div class="col-md-5">
                                    <div class="form-group">
                                      <label class="control-label col-md-3"><?php echo get_phrase('phone');?> </label>
                                      <div class="col-md-9">
                                        <input type="text" class="form-control tip-right" name="product_code" value="<?php echo $customers->mobile; ?>" />
                                        <span class="error-span"></span> </div>
                                    </div>
                                  </div>
                                  <div class="col-md-5">
                                    <div class="form-group">
                                      <label class="control-label col-md-3"><?php echo get_phrase('email');?> </label>
                                      <div class="col-md-9">
                                        <input type="text" class="form-control tip-right" name="product_name" value="<?php echo $customers->email; ?>"/>
                                        <span class="error-span"></span> </div>
                                    </div>
                                  </div>
                                 
                                </div>
                                <div class="row">
                                  <div class="col-md-5">
                                    <div class="form-group">
                                      <label class="control-label col-md-3"><?php echo get_phrase('city');?></label>
                                      <div class="col-md-9">
                                        <input type="text" class="form-control" name="city" value="<?php echo $customers->city; ?>"/>
                                        <span class="error-span"></span> </div>
                                    </div>
                                  </div>
                                  <div class="col-md-5">
                                    <div class="form-group">
                                      <label class="control-label col-md-3"><?php echo get_phrase('state');?> </label>
                                      <div class="col-md-9">
                                        <input type="text" class="form-control" name="state" value="<?php echo $customers->state; ?>"/>
                                        <span class="error-span"></span> </div>
                                    </div>
                                  </div>
                                  <div class="col-md-2"></div>
                                </div>
                                <div class="row">
                                  <div class="col-md-5">
                                    <div class="form-group">
                                      <label class="control-label col-md-3"><?php echo get_phrase('zip');?> </label>
                                      <div class="col-md-9">
                                        <input type="text" class="form-control" name="sip" value="<?php echo $customers->postal_code; ?>"/>
                                        <span class="error-span"></span> </div>
                                    </div>
                                  </div>
                                  <div class="col-md-5">
                                    <div class="form-group">
                                      <label class="control-label col-md-3"><?php echo get_phrase('address');?> </label>
                                      <div class="col-md-9">
                                        <textarea rows="3" cols="5" name="address" class="countable form-control" data-limit="100"><?php echo $customers->address; ?></textarea>
                                        
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-2"></div>
                                </div>-->
                                <div class="row">
                                  <div class="col-md-6">
                                  <table class="table table-bordered table-hover">
                                      <tbody>
                                        <tr>
                                          <th> <?php echo get_phrase('billed');?> <?php echo get_phrase('to');?> </th>
                                          <td><?php echo $customers->fname;?> <?php echo $customers->lname;?></td>
                                        </tr>
                                        <tr>
                                          <th> <?php echo get_phrase('name');?> </th>
                                          <td> <?php echo $customers->fname;?></td>
                                        </tr>
                                        <tr>
                                          <th> <?php echo get_phrase('address');?> </th>
                                          <td><?php echo $customers->address;?></td>
                                        </tr>
                                        <tr>
                                          <th> <?php echo get_phrase('phone');?> </th>
                                          <td><?php echo $customers->mobile;?></td>
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
                                      <th> <?php echo ucwords(get_phrase('amount'));?> <?php echo ucwords(get_phrase('eNCLOSED'));?> </th>
                                      <td><?php echo $inv->total; ?></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                              <!--/LOGO TABLE--> 
                              <div class="row">
                                  <div class="col-md-4">
                                    <div class='pull-left'> 
                                      <!--<div class='btn-group'>--> 
                                      <img src="<?php echo $this->crud_model->get_image_url('',SYSTEM_LOGO);?>" alt="<?php echo SYSTEM_TITLE;?>" class="img-responsive" height="15" width="70"> 
                                      <!--</div>--> 
                                    </div>
                                  </div>
                                </div>
                            </div>
                         
                      <div class="form-actions clearfix">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="col-md-offset-3">
                              <a href="javascript:;" class="btn btn-primary print"><?php echo ucwords(get_phrase('generate_invoice')); ?></a>
                              <!-- <input type="hidden" name="act" value="setting_update"  />-->
                             <a href="<?php echo base_url().$roles.'/orders/work_order/'.$inv->id;?>" id="btnWrkOrd" class="btn btn-primary"><?php echo get_phrase('work');?> <?php echo get_phrase('orders');?></a>
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
            <!-- /BOX --> 
          </div>
        </div>
        <!-- /INVOICE --> 
      </div>
      <div class="footer-tools">
                <span class="go-top">
                    <i class="fa fa-chevron-up"></i> <?php echo get_phrase('top');?>
                </span>
            </div>
      <!-- /CONTENT--> 
    </div>
    
  </div>
</div>
</div>
<script type="text/javascript">
$(function() {
    $( "#payment_date" ).datepicker({
      defaultDate: "<?php echo date("m/d/Y")?>",
      changeMonth: true,
      numberOfMonths: 1,
    });
	
	$('.print').click(function() {
		$('#formDiv').hide();
		$('#btnWrkOrd').hide();
        window.print();
		$('#formDiv').show();
		$('#btnWrkOrd').show();
    });
  
  
  $('#payForm').validate(
   {
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
				 /* digits:true*/
                },
				payment_date: {
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
