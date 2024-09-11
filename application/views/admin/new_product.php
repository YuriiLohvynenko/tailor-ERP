<?php
foreach ($edit_data as $r):
$row = $r;
endforeach;
if($edit_data[0])
{
	$formAction = "do_update/".$row['id'];
}
else
{
	$formAction = "create/";
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
                                <a href=""><?php echo get_phrase('products');?></a>
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
            <!-- SAMPLE -->
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
           
<?php $attrib = array('class' => 'form-horizontal validate','id' => 'productForm'); echo form_open_multipart(base_url().$roles.'/products/'.$formAction, $attrib); ?>
                            <div class="wizard-form">
                               <div class="wizard-content">
                                  <div class="tab-content">
                                     <div class="tab-pane active" id="account">
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('product');?> <?php echo get_phrase('code');?><span class="required">*</span></label>
                                           <div class="col-md-4">
                                              <input type="text" class="form-control tip-right" data-original-title="<?php echo get_phrase('unique_product_code');?>" name="product_code" value="<?php echo $row['code']; ?>" />
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('product');?> <?php echo get_phrase('name');?><span class="required">*</span></label>
                                           <div class="col-md-4">
                                              <input type="text" class="form-control tip-right" name="product_name" value="<?php echo $row['name']; ?>" data-original-title="<?php echo get_phrase('product_name');?>"/>
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        <div class="form-group">
                                        
                                           <label class="control-label col-md-3"><?php echo get_phrase('category');?><span class="required">*</span></label>
                                           <div class="col-md-4">
                                              <select id="category" name="category" class="col-md-12 select2-offscreen">
												<?php
                                                  foreach ($categories as $category)
                                                  {?>
                                                  <option value="<?php echo $category['id'];?>"
													<?php if ($row['category_id'] == $category['id'])echo 'selected';?>> <?php echo $category['name'];?> </option>
                                                <?php }?>
                                       			</select>
                                              <span class="error-span"></span>
                                              <span id="loading"></span>
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('sub');?> <?php echo get_phrase('category');?></label>
                                           <div class="col-md-4" id="subcat">
                                              <select id="select3" name="subcategory" class="col-md-12 select2-offscreen">
												<?php
                                                  foreach ($subcats as $subcat)
                                                  {?>
                                                  <option value="<?php echo $subcat['id'];?>"
													<?php if ($row['subcatgory_id'] == $subcat['id'])echo 'selected';?>> <?php echo $subcat['name'];?> </option>
                                                <?php }?>
                                       </select>
                                             
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('product');?> <?php echo get_phrase('unit');?><span class="required">*</span></label>
                                           <div class="col-md-4">
                                              <input type="text" class="form-control" name="product_unit" value="<?php echo $row['unit']; ?>"/>
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('size');?></label>
                                           <div class="col-md-4">
                                              <select id="select4" name="size" class="col-md-12 select2-offscreen">
                                              <option value="">-<?php echo get_phrase('select');?>-</option>
												<?php
                                                  foreach ($sizes as $size)
                                                  {?>
                                                  
                                                  <option value="<?php echo $size['id'];?>"
													<?php if ($row['size_id'] == $size['id'])echo 'selected';?>> <?php echo $size['name'];?> </option>
                                                <?php }?>
                                       </select>
                                              
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('product');?> <?php echo get_phrase('cost');?><span class="required">*</span></label>
                                           <div class="col-md-4">
                                              <input type="text" class="form-control" name="product_cost" value="<?php echo $row['cost']; ?>"/>
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('product');?> <?php echo get_phrase('price');?><span class="required">*</span></label>
                                           <div class="col-md-4">
                                              <input type="text" class="form-control" name="product_price" value="<?php echo $row['price']; ?>"/>
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('alert');?> <?php echo get_phrase('qty');?></label>
                                           <div class="col-md-4">
                                              <div class="input-group">
                                                  <span class="input-group-addon">
                                                    <input type="checkbox" value="1" checked="checked" name="track_quantity">
                                                  </span>
                                                  <input type="text" class="form-control" name="alert_quantity" value="<?php echo $row['alert_quantity']; ?>" required="required">
                                                  <span class="error-span"></span>
                                                </div>
                                             
                                           </div>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('image');?></label>
                                           <div class="col-md-4">
                                              <input type="file" class="form-control" name="image" id="image"  style="display:none;"/>
                                              <a href="javascript:;" class="btn btn-default start" onclick="document.getElementById('image').click();"><i class="fa fa-arrow-circle-o-up"></i><span> <?php echo get_phrase('choose_image');?></span></a>
                                             <span id="image_att"></span>
                                            <?php if($row['image']){ ?>
                                            <img src="<?php echo base_url();?>uploads/products/<?php echo $row['image'];?>" alt="" />
                                            <input type="hidden" name="primg" value="<?php echo $row['image']; ?>" />
                                            <?php }?>
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('custom_field_1');?> </label>
                                           <div class="col-md-4">
                                              <input type="text" class="form-control" name="cf1" value="<?php echo $row['cf1']; ?>"/>
                                             
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('custom_field_2');?> </label>
                                           <div class="col-md-4">
                                              <input type="text" class="form-control" name="cf2" value="<?php echo $row['cf2']; ?>"/>
                                              
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('product_detail_for_invoice');?> </label>
                                           <div class="col-md-6">
                                              <textarea rows="3" cols="5" name="product_detail" class="countable form-control" data-limit="100"><?php echo $row['details']; ?></textarea> <p class="help-block">You have <span id="counter"></span> characters left.</p> 
                                             
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
                                         <input type="hidden" name="act" value="setting_update"  />
                                                                      
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
            <!-- /SAMPLE -->
            <div class="footer-tools">
                <span class="go-top">
                    <i class="fa fa-chevron-up"></i> <?php echo get_phrase('top');?>
                </span>
            </div>
        </div><!-- /CONTENT-->
    </div>
</div>