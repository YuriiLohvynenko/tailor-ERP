<?php
$edit_data=$this->db->get_where('taxslots' , array('id' => $param3) )->result_array();
foreach ( $edit_data as $r):
$row = $r;
endforeach;
if($param2=="edit_taxslots")
{
	$formAction = "do_update/".$param3;
}
else
{
	$formAction = "add_taxslots/";
}
?>
<div class="box border green" id="formWizard">
                        <div class="box-title">
                            <h4><i class="fa fa-bars"></i> <?php echo get_phrase('taxslot')?> </h4>
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
           
<?php echo form_open('owner/taxslots/'.$formAction , array('id' => 'taxslotsForm', 'class' => 'form-horizontal'));?>

										<div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('tax');?> <span class="required">*</span></label>
                                           <div class="col-md-6">
                                             <?php 
												$taxList = $this->crud_model->get_All_table_List('taxes');
												?>
                                           <select id="taxes" name="taxes" class="col-md-12 select2-offscreen">
                                           <option value=""></option>
                                           
											<?php foreach($taxList as $tl) { ?>
                                            <option <?php if($row['tax_id']==$tl["id"]){echo "selected";} ?> value="<?php echo $tl["id"] ?>">
											<?php echo $tl["title"]; ?></option>
                                            <?php } ?>
                                            </select>
                                              
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
										 
                                        <!--<div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('title');?> <span class="required">*</span></label>
                                           <div class="col-md-6">
                                              <input type="text" class="form-control" name="title" value="<?php echo $row['title']; ?>"/>
                                              
                                              <span class="error-span"></span>
                                           </div>
                                        </div>-->
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('start');?> <span class="required">*</span></label>
                                           <div class="col-md-6">
                                              <input type="text" class="form-control" name="start" value="<?php echo $row['start']; ?>"/>
                                              
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('end');?> <span class="required">*</span></label>
                                           <div class="col-md-6">
                                              <input type="text" class="form-control" name="end" value="<?php echo $row['end']; ?>"/>
                                              
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('type');?></label>
                                           	  <div class="col-md-6" id="themes">
                                              <span class="btn-group" data-toggle="buttons">
												<label class="taxType btn btn-default <?php if($row['tax_type']=='percentage'){echo "active";}; ?>"><span class="tick"></span><input type="radio" class="rdb" name="tax_type" value="percentage" <?php if($row['tax_type']=='percentage'){echo "checked";}; ?>><?php echo get_phrase('percentage');?></label>
                                                <label class="taxType btn btn-default <?php if($row['tax_type']=='fixed'){echo "active";}; ?>"><span class="tick"></span><input type="radio" class="rdb" name="tax_type" value="fixed" <?php if($row['tax_type']=='fixed'){echo "checked";}; ?>><?php echo get_phrase('fixed');?></label>
											</span>
                                             
                                           </div>
                                              </div>
                                            
                                        <div class="form-group" id="percent" <?php if($row['tax_type']=='percentage'){echo 'style="display:block;"';}else{echo 'style="display:none;"'; }?>>
                                           <label class="control-label col-md-3"><?php echo get_phrase('percent');?> <?php echo get_phrase('value');?> (%)<span class="required">*</span></label>
                                           <div class="col-md-6">
                                              <input type="text" class="form-control" placeholder="<?php echo get_phrase('percent');?> <?php echo get_phrase('value');?> (%)" name="percentage" value="<?php if($row['tax_type']=='percentage') echo $row['tax_value']; ?>"/>
                                              
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                        <div class="form-group" id="fixed" <?php if($row['tax_type']=='fixed'){echo 'style="display:block;"';}else{echo 'style="display:none;"'; }?>>
                                           <label class="control-label col-md-3"><?php echo get_phrase('fixed');?> <?php echo get_phrase('value');?> <span class="required">*</span></label>
                                           <div class="col-md-6">
                                              <input type="text" class="form-control" placeholder="<?php echo get_phrase('fixed');?> <?php echo get_phrase('value');?>" name="fixed" value="<?php if($row['tax_type']=='fixed') echo $row['tax_value']; ?>"/>
                                              
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
$("#taxes").select2({
	placeholder: "Select tax"
});

$('.taxType').click(function(){
	var r = $(this).children('.rdb').val();
	//alert(r);
	if(r=="percentage"){
	$("#percent").show();
	$("#fixed").hide();}
	else if(r=="fixed"){
	$("#fixed").show();
	$("#percent").hide();}
});

$(document).ready(function() {

$('#taxslotsForm').validate(
             {
              rules: {
                taxes: {
                  required: true
                },
				title: {
                  required: true
                },
				
				start: {
                  required: true,
				  digits: true
                },
				end: {
                  required: true,
				  digits: true
                },
				tax_type: {
                  required: true
                },
				tax_value: {
                  required: true,
				  digits: true
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