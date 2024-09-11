<?php
$edit_data=$this->db->get_where('leaves' , array('id' => $param3) )->result_array();
foreach ( $edit_data as $r):
$row = $r;
endforeach;
if($param2=="edit_leaves")
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
                            <h4><i class="fa fa-bars"></i> <?php echo get_phrase('leave')?> </h4>
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
           
<?php echo form_open('owner/leaves/'.$formAction , array('id' => 'leavesForm', 'class' => 'form-horizontal'));?>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('leave');?> <?php echo get_phrase('title');?> <span class="required">*</span></label>
                                           <div class="col-md-6">
                                              <input type="text" class="form-control" name="title" value="<?php echo $row['title']; ?>"/>
                                              
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('quota');?> <span class="required">*</span></label>
                                           <div class="col-md-6">
                                              <input type="text" class="form-control" name="quota" value="<?php echo $row['quota']; ?>"/>
                                              
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('for');?> <?php echo get_phrase('period');?><span class="required">*</span></label>
                                           <div class="col-md-6">
                                              <input type="text" class="form-control" name="for_period" value="<?php echo $row['for_period']; ?>"/>
                                              
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('period');?> <?php echo get_phrase('start');?> <span class="required">*</span></label>
                                           <div class="col-md-6">
                                              <input type="text" class="form-control" name="start_period" value="<?php echo $row['start_period']; ?>"/>
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('leave');?> <?php echo get_phrase('adjustment');?> </label>
                                           <div class="col-md-9" id="themes">
                                              <span class="btn-group" data-toggle="buttons">
												<label  class="btn btn-default <?php if($row['leave_adjustment']=='yes'){echo "active";}; ?>"><span class="tick"></span><input type="checkbox" name="leave_adjustment" value="yes" <?php if($row['leave_adjustment']=='yes'){echo "checked";}; ?>><?php echo get_phrase('yes');?></label>
												
											</span>
                                             
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"> <?php echo get_phrase('compensatable');?> </label>
                                           <div class="col-md-9" id="themes">
                                              <span class="btn-group" data-toggle="buttons">
												<label class="btn btn-default <?php if($row['compensatable']=='yes'){echo "active";}; ?>"><span class="tick"></span><input type="checkbox" name="compensatable" value="yes" <?php if($row['compensatable']=='yes'){echo "checked";}; ?>><?php echo get_phrase('yes');?></label>
												
											</span>
                                             
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('exceed');?> <?php echo get_phrase('quota');?> </label>
                                           <div class="col-md-9" id="themes">
                                              <span class="btn-group" data-toggle="buttons">
												<label class="btn btn-default <?php if($row['exceed_quota']=='yes'){echo "active";}; ?>"><span class="tick"></span><input type="checkbox" name="exceed_quota" value="yes" <?php if($row['exceed_quota']=='yes'){echo "checked";}; ?>><?php echo get_phrase('yes');?></label>
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


$('#leavesForm').validate(
             {
              rules: {
                title: {
                  required: true
                },
				quota: {
                  required: true,
				  digits:true
                },
				for_period: {
                  required: true
                },
				start_period: {
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