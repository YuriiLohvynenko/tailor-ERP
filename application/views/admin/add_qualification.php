<?php
$edit_data=$this->db->get_where('qualifications' , array('id' => $param3) )->result_array();
foreach ( $edit_data as $r):
$row = $r;
endforeach;
if($param2=="edit_qualification")
{
	$formAction = "do_update/".$param3;
}
else
{
	$formAction = "add_qualification/";
}
?>
<div class="box border green" id="formWizard">
                        <div class="box-title">
                            <h4><i class="fa fa-bars"></i><?php echo get_phrase('qualification')?></h4>
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
           
        <?php echo form_open('owner/qualifications/'.$formAction , array('id' => 'qualiForm', 'class' => 'form-horizontal'));?>
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('qualification');?> <?php echo get_phrase('code');?><span class="required">*</span></label>
                                           <div class="col-md-6">
                                              <input type="text" class="form-control" name="qcode" value="<?php echo $row['q_code']; ?>"/>
                                              
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('qualification');?> <?php echo get_phrase('title');?> <span class="required">*</span></label>
                                           <div class="col-md-6">
                                              <input type="text" class="form-control" name="qtitle" value="<?php echo $row['title']; ?>"/>
                                              
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('type');?> <span class="required">*</span></label>
                                           <div class="col-md-6">
											  <label class="radio-inline">
													  <input type="radio" name="qtype" <?php if($row['q_type']=='degree'){echo 'checked';} ?> value="degree"> <?php echo get_phrase('degree');?>
													</label>
													<label class="radio-inline">
													  <input type="radio" name="qtype" <?php if($row['q_type']=='diploma'){echo 'checked';} ?> value="diploma"><?php echo get_phrase('diploma');?>
													</label>
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('description');?> <span class="required">*</span></label>
                                           <div class="col-md-6">
                                              <textarea rows="3" cols="5" name="description" class="autosize form-control"><?php echo $row['description']; ?></textarea>
                                              
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                               <div class="form-actions clearfix">
                                  <div class="row">
                                     <div class="col-md-12">
                                        <div class="col-md-offset-3 col-md-9">
                                           
                                         <button type="submit" class="btn btn-primary"> <?php echo get_phrase('add_qualification');?> <i class="fa fa-save"></i></button>
                                        </div>
                                     </div>
                                  </div>
                               </div>
							
						 
						 
						 <?php echo form_close();?>
                        </div>
                    </div>

<script type="text/javascript">
$(document).ready(function() {
$('#qualiForm').validate(
             {
              rules: {
                qcode: {
                  required: true
                },
				qtitle: {
                  required: true
                },
				qtype: {
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