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
                                <a href=""><?php echo get_phrase('settings');?></a>
                            </li>
                            <li><?=ucwords($page_title)?></li>
                        </ul>
                        <!-- /BREADCRUMBS -->
                        <div class="clearfix">
                            <h3 class="content-title pull-left"><?=ucwords($page_title)?></h3>
                        </div>
                        <div class="description"><?php echo get_phrase('manage_system_settings');?></div>
                    </div>
                </div>
            </div>
            <!-- /PAGE HEADER -->
            <!-- SAMPLE -->
            <div class="row">
                <div class="col-md-12">
                <?php if($this->session->flashdata('flash_message')){ ?>
                <div class="alert alert-block alert-success fade in">
                <a class="close" data-dismiss="alert" href="#" aria-hidden="true">×</a>
                <h4><i class="fa fa-heart"></i> <?php echo $this->session->flashdata('flash_message'); ?></h4>
                </div>
                <? }?>
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
           
            			<form method="post" action="<?php echo base_url()?><?=$roles?>/system_settings" class="form-horizontal validate" enctype="multipart/form-data" id="settings">
                        
                               <div class="tab-pane" id="account">
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('system_name');?><span class="required">*</span></label>
                                           <div class="col-md-4">
                                              <input type="text" class="form-control" name="system_name" value="<?php echo $this->db->get_where('settings' , array('type' =>'system_name'))->row()->description;?>" />
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('system_title');?><span class="required">*</span></label>
                                           <div class="col-md-4">
                                              <input type="text" class="form-control" name="system_title" value="<?php echo $this->db->get_where('settings' , array('type' =>'system_title'))->row()->description;?>"/>
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('system_logo');?> <span class="required">*</span></label>
                                           <div class="col-md-4">
                                              <input type="file" class="form-control" name="site_logo" id="sitelogo"  style="display:none;"/>
                                              <a href="javascript:;" class="btn btn-primary start" onclick="document.getElementById('sitelogo').click();"><i class="fa fa-arrow-circle-o-up"></i><span> <?php echo get_phrase('choose_image');?></span></a>
                                              
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('address');?><span class="required">*</span></label>
                                           <div class="col-md-4">
                                              <input type="text" class="form-control" name="address" value="<?php echo $this->db->get_where('settings' , array('type' =>'address'))->row()->description;?>" />
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('phone');?><span class="required">*</span></label>
                                           <div class="col-md-4">
                                              <input type="text" class="form-control" name="phone" value="<?php echo $this->db->get_where('settings' , array('type' =>'phone'))->row()->description;?>"/>
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('email');?><span class="required">*</span></label>
                                           <div class="col-md-4">
                                              <input type="text" class="form-control" name="system_email" value="<?php echo $this->db->get_where('settings' , array('type' =>'system_email'))->row()->description;?>"/>
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('currency');?><span class="required">*</span></label>
                                           <div class="col-md-4">
                                              <input type="text" class="form-control" name="currency" value="<?php echo $this->db->get_where('settings' , array('type' =>'currency'))->row()->description;?>" />
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('theme');?><span class="required">*</span></label>
                                           <div class="col-md-4">
                                             <select id="select2" name="theme" class="col-md-12 select2-offscreen">
											  <?php $theme = $this->db->get_where('settings' , array('type' =>'theme'))->row()->description;?>                      
                                              <option <?php if($theme=='default')echo selected;?> value="default"><?php echo get_phrase('default');?></option>
                                              <option <?php if($theme=='night')echo selected;?> value="night"><?php echo get_phrase('night');?></option>
                                              <option <?php if($theme=='earth')echo selected;?> value="earth"><?php echo get_phrase('erath');?></option>
                                              <option <?php if($theme=='graphite')echo selected;?> value="graphite"><?php echo get_phrase('graphite');?></option>
                                              <option <?php if($theme=='nature')echo selected;?> value="nature"><?php echo get_phrase('nature');?></option>
                                              <option <?php if($theme=='utopia')echo selected;?> value="utopia"><?php echo get_phrase('utopia');?></option>
                                           
                           					</select>
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('date');?> <?php echo get_phrase('format');?><span class="required">*</span></label>
                                           <div class="col-md-4">
                                           
                                             <select id="select5" name="dateformat" class="col-md-12 select2-offscreen">
                                             
											  <?php 
											  $dformats = $this->db->get('date_format')->result_array();
											  foreach($dformats as $dformat){
											  ?>                      
                                              <option <?php if($this->db->get_where('settings' , array('type' =>'dateformat'))->row()->description==$dformat['id'])echo selected;?> value="<?php echo $dformat['id']; ?>"><?php echo $dformat['js']; ?></option>
                                              <?php }?>
                                           
                           					</select>
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('language');?><span class="required">*</span></label>
                                           <div class="col-md-4">
                                              <select id="language" name="language" class="col-md-12 select2-offscreen">
                                    <?php
										$fields = $this->db->list_fields('language');
										foreach ($fields as $field)
										{
											if ($field == 'phrase_id' || $field == 'phrase')continue;
											
											$current_default_language	=	$this->db->get_where('settings' , array('type'=>'language'))->row()->description;
											?>
                                    		<option value="<?php echo $field;?>"
                                            	<?php if ($current_default_language == $field)echo 'selected';?>> <?php echo ucwords($field);?> </option>
                                            <?php
										}
										?>
                           </select>
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('purchase');?> <?php echo get_phrase('ref_prefix');?> <span class="required">*</span></label>
                                           <div class="col-md-4">
                                              <input type="text" class="form-control" name="purchase_prefix" value="<?php echo $this->db->get_where('settings' , array('type' =>'purchase_prefix'))->row()->description;?>" />
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('order');?> <?php echo get_phrase('ref_prefix');?> <span class="required">*</span></label>
                                           <div class="col-md-4">
                                              <input type="text" class="form-control" name="order_prefix" value="<?php echo $this->db->get_where('settings' , array('type' =>'order_prefix'))->row()->description;?>" />
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('invoice');?> <?php echo get_phrase('ref_prefix');?> <span class="required">*</span></label>
                                           <div class="col-md-4">
                                              <input type="text" class="form-control" name="invoice_prefix" value="<?php echo $this->db->get_where('settings' , array('type' =>'invoice_prefix'))->row()->description;?>" />
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                     
                                     	<div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('product');?> <?php echo get_phrase('tax');?><span class="required">*</span></label>
                                           <div class="col-md-4">
                                             <select id="select3" name="tax_rate" class="col-md-12 select2-offscreen">
                                             <option <?php if($this->db->get_where('settings' , array('type' =>'default_tax_rate'))->row()->description==0)echo selected;?> value="0"><?php echo get_phrase('disable'); ?></option>
											  <?php 
											  $taxe = $this->db->get('tax_rates')->result_array();
											  foreach($taxe as $tax){
											  ?>                      
                                              <option <?php if($this->db->get_where('settings' , array('type' =>'default_tax_rate'))->row()->description==$tax['id'])echo selected;?> value="<?php echo $tax['id']; ?>"><?php echo $tax['name']; ?></option>
                                              <?php }?>
                                           
                           					</select>
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                     	<div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('invoice');?> <?php echo get_phrase('tax');?><span class="required">*</span></label>
                                           <div class="col-md-4">
                                             <select id="select4" name="tax_rate2" class="col-md-12 select2-offscreen">
                                             <option <?php if($this->db->get_where('settings' , array('type' =>'default_tax_rate'))->row()->description==0)echo selected;?> value="0"><?php echo get_phrase('disable'); ?></option>
											  <?php 
											  $taxes = $this->db->get('tax_rates')->result_array();
											  foreach($taxes as $tax){
											  ?>                      
                                              <option <?php if($this->db->get_where('settings' , array('type' =>'default_tax_rate2'))->row()->description==$tax['id'])echo selected;?> value="<?php echo $tax['id']; ?>"><?php echo $tax['name']; ?></option>
                                              <?php }?>
                                           
                           					</select>
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                               <label class="control-label col-md-3"><?php echo get_phrase('discount');?> <?php echo get_phrase('options');?><span class="required">*</span></label>
                                               <div class="col-md-4">
                                                <?php
                                                $do = array('0' => get_phrase("disable") . " " . get_phrase("discount"), '1' => get_phrase("apply_on_invoice_total"));
                                                echo form_dropdown('discount_option', $do, $this->db->get_where('settings' , array('type' =>'discount_option'))->row()->description, 'class="col-md-12 select2-offscreen" id="select6" data-placeholder="' . get_phrase("select") . ' ' . get_phrase("discount_option") . '" required="required" data-error="' . get_phrase("discount_option") . ' ' . get_phrase("is_required") . '"');
                                                ?>
                                                  <span class="error-span"></span>
                                               </div>
                                            </div>
                                            
                                        <div class="form-group">
                                               <label class="control-label col-md-3"><?php echo get_phrase('discount');?> <?php echo get_phrase('method');?><span class="required">*</span></label>
                                               <div class="col-md-4">
                                                <?php
													$dm = array('1' => get_phrase("apply_before_tax"), '2' => get_phrase("apply_after_tax"));
													echo form_dropdown('discount_method', $dm, $this->db->get_where('settings' , array('type' =>'discount_method'))->row()->description, 'class="col-md-12 select2-offscreen tip" id="select7" data-placeholder="' . get_phrase("select") . ' ' . get_phrase("discount") . ' '. get_phrase("method") . '" required="required" data-error="' . get_phrase("discount") . ' ' . get_phrase("method") . ' ' . get_phrase("is_required") . '"');
													?>
                                                  <span class="error-span"></span>
                                               </div>
                                            </div>
                                       
                                        <div class="form-group">
                                               <label class="control-label col-md-3"><?php echo get_phrase('default');?> <?php echo get_phrase('discount');?><span class="required">*</span></label>
                                               <div class="col-md-4">
                                                <?php
													foreach ($discounts as $discount) {
														$ds[$discount->id] = $discount->name;
													}
													echo form_dropdown('default_discount', $ds, $this->db->get_where('settings' , array('type' =>'default_discount'))->row()->description, 'class="col-md-12 select2-offscreen tip" id="select8" data-placeholder="' . get_phrase("select") . ' ' . get_phrase("default") . ' ' . get_phrase("discount") . '" required="required" data-error="' . get_phrase("default") . ' get_phrase("discount") ' . ' ' . get_phrase("is_required") . '"');
													?>
                                                  <span class="error-span"></span>
                                               </div>
                                            </div>
                                            
                                            <div class="form-group">
                                               <label class="control-label col-md-3"><?php echo get_phrase('default');?> <?php echo get_phrase('bonus');?><span class="required">*</span></label>
                                               <div class="col-md-4">
                                                <?php
													foreach ($bonuses as $bonus) {
														$bs[$bonus->id] = $bonus->name;
													}
													echo form_dropdown('default_bonus', $bs, $this->db->get_where('settings' , array('type' =>'default_bonus'))->row()->description, 'class="col-md-12 select2-offscreen tip" id="select9" data-placeholder="' . get_phrase("select") . ' ' . get_phrase("default") . ' ' . get_phrase("bonus") . '" required="required" data-error="' . get_phrase("default") . ' get_phrase("bonus") ' . ' ' . get_phrase("is_required") . '"');
													?>
                                                  <span class="error-span"></span>
                                               </div>
                                            </div>    
                                 	 		
                                    	<div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('total');?> <?php echo get_phrase('rows');?> <span class="required">*</span></label>
                                           <div class="col-md-4">
                                              <input type="text" class="form-control" name="total_rows" value="<?php echo $this->db->get_where('settings' , array('type' =>'total_rows'))->row()->description;?>" />
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                    </div>    
                               <div class="form-actions clearfix">
                                  <div class="row">
                                     <div class="col-md-12">
                                        <div class="col-md-offset-3 col-md-9">
                                           
                                         <button type="submit" class="btn btn-primary"> <?php echo get_phrase('save');?> <i class="fa fa-save"></i></button>
                                         <input type="hidden" name="act" value="setting_update"  />
                                                                      
                                        </div>
                                     </div>
                                  </div>
                               </div>
                         </form>
                         
                        </div>
                    </div>
                    <!-- /BOX -->
                </div>
            </div>
            <!-- /SAMPLE -->
            <div class="footer-tools">
                <span class="go-top">
                    <i class="fa fa-chevron-up"></i> <?php echo get_phrase('top');?>
                </span>
            </div>
        </div><!-- /CONTENT-->
    </div>
</div>