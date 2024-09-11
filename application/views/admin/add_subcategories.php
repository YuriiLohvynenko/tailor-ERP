<?php
$edit_data=$this->db->get_where('subcategories' , array('id' => $param3) )->result_array();
foreach ( $edit_data as $r):
$row = $r;
endforeach;
if($param2=="edit_subcategories")
{
	$formAction = "do_update/".$param3;
}
else
{
	$formAction = "create/";
}
?>
<div class="box border green" id="formWizard">
                        <div class="box-title">
                            <h4><i class="fa fa-bars"></i> <?php echo get_phrase('subcategory')?> <?php echo get_phrase('list')?></h4>
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
           
<?php echo form_open('admin/subcategories/'.$formAction , array('id' => 'subcategoriesForm', 'class' => 'form-horizontal'));?>
                                        
                                       
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('category');?> <span class="required">*</span></label>
                                           <div class="col-md-6">
                                             
                            				 <?php 
												$categories = $this->crud_model->get_All_table_List('categories');
												?>
                                           <select id="category" name="category" class="col-md-12 select2-offscreen">
                                           <option value="">-<?php echo get_phrase('select');?>-</option>
											<?php foreach($categories as $bl) { ?>
                                            <option <?php if($row['category_id']==$bl["id"]){echo "selected";} ?> value="<?php echo $bl["id"] ?>"><?php echo $bl["name"]; ?></option>
                                            <?php } ?>
                                            </select>
                                              
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('code');?> <span class="required">*</span></label>
                                           <div class="col-md-6">
                                              <input type="text" class="form-control" name="code" value="<?php echo $row['code']; ?>"/>
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"> <?php echo get_phrase('name');?> <span class="required">*</span></label>
                                           <div class="col-md-6">
                                              <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>"/>
                                              
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                               <div class="form-actions clearfix">
                                  <div class="row">
                                     <div class="col-md-12">
                                        <div class="col-md-offset-3 col-md-9">
                                           
                                         <button type="submit" class="btn btn-primary"> <?php echo get_phrase('save');?> <i class="fa fa-save"></i></button>
                                        </div>
                                     </div>
                                  </div>
                               </div>
							
						 
						 
						 <?php echo form_close();?>
                        </div>
                    </div>

<script type="text/javascript">
$(document).ready(function() {
$("#category").select2({
	placeholder: "Select your Category"
});


$('#subcategoriesForm').validate(
             {
              rules: {
                category: {
                  required: true
                },
				code: {
                  required: true
                },
				name: {
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