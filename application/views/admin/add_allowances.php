<?php
$edit_data=$this->db->get_where('allowances' , array('id' => $param3) )->result_array();
foreach ( $edit_data as $r):
$row = $r;
endforeach;
if($param2=="edit_allowances")
{
	$formAction = "do_update/".$param3;
}
else
{
	$formAction = "add_allowances/";
}
?>
<div class="box border green" id="formWizard">
                        <div class="box-title">
                            <h4><i class="fa fa-bars"></i> <?php echo get_phrase('allowance')?> </h4>
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
           
<?php echo form_open('owner/allowances/'.$formAction , array('id' => 'allowancesForm', 'class' => 'form-horizontal'));?>
										 
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('title');?> <span class="required">*</span></label>
                                           <div class="col-md-6">
                                              <input type="text" class="form-control" name="title" value="<?php echo $row['title']; ?>"/>
                                              
                                              
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('type');?> </label>
                                           <div class="col-md-9" id="themes">
                                              <span class="btn-group" data-toggle="buttons">
												<label class="btn btn-default <?php if($row['type']=='fixed_amount'){echo 'active';} ?>"><span class="tick"></span><input type="radio" name="type" value="fixed_amount" <?php if($row['type']=='fixed_amount'){echo 'checked';} ?>><?php echo get_phrase('fixed');?> <?php echo get_phrase('amount');?></label>
												<label class="btn btn-default <?php if($row['type']=='basic_salary'){echo 'active';} ?>"><span class="tick"></span><input type="radio" name="type" value="basic_salary" <?php if($row['type']=='basic_salary'){echo 'checked';} ?>><?php echo get_phrase('basic');?> <?php echo get_phrase('salary');?> (%)</label>
												<label class="btn btn-default <?php if($row['type']=='gross_salary'){echo 'active';} ?>"><span class="tick"></span><input type="radio" name="type" value="gross_salary" <?php if($row['type']=='gross_salary'){echo 'checked';} ?>><?php echo get_phrase('gross');?> <?php echo get_phrase('salary');?> (%)</label>
											</span>
                                              
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('amount');?> <span class="required">*</span></label>
                                           <div class="col-md-6">
                                              <input type="text" class="form-control" name="amount" value="<?php echo $row['amount']; ?>"/>
                                              
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('sequence');?><span class="required">*</span> </label>
                                           <div class="col-md-6">
                                              <input type="text" class="form-control" name="sequence" value="<?php echo $row['sequence']; ?>"/>
                                              
                                           <span class="error-span"></span>  
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('taxable');?></label>
                                           <div class="col-md-9" id="themes">
                                              <span class="btn-group" data-toggle="buttons">
												<label class="btn btn-default <?php if($row['taxable']=='yes'){echo 'active';} ?>"><span class="tick"></span><input type="checkbox" name="taxable" value="yes" <?php if($row['taxable']=='yes'){echo 'checked';} ?>> <?php echo get_phrase('taxable');?></label>
											</span>
                                            
                                           </div>
                                        </div>
                                        
                                      	<div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('against');?> </label>
                                           <div class="col-md-9" id="themes">
                                              <span class="btn-group" data-toggle="buttons">
												<label class="btn btn-default <?php if($row['against']=='normal'){echo 'active';} ?>"><span class="tick"></span><input type="radio" name="against" value="normal" <?php if($row['against']=='normal'){echo 'checked';} ?>> <?php echo get_phrase('normal');?></label>
												<label class="btn btn-default <?php if($row['against']=='shifts'){echo 'active';} ?>"><span class="tick"></span><input type="radio" name="against" value="shifts" <?php if($row['against']=='shifts'){echo 'checked';} ?>> <?php echo get_phrase('shifts');?> </label>
											</span>
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

$('#allowancesForm').validate(
             {
              rules: {
               
				title: {
                  required: true
                },
				amount: {
                  required: true,
				  digits: true
                },
				sequence: {
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