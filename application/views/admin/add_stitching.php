<?php
if($param2=="edit_stitchings")
{
	$formAction = "do_update/".$param3;
	$edit_data=$this->db->get_where('stitching' , array('id' => $param3) )->result_array();
	foreach ( $edit_data as $r):
	$row = $r;
	endforeach;
}
else
{
	$formAction = "insert/";
	$row = array();
}
?>
<div class="box border green" id="formWizard">
                        <div class="box-title">
                            <h4><i class="fa fa-bars"></i><?php echo get_phrase('stitching')?></h4>
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
           
<?php echo form_open('admin/stitching/'.$formAction , array('id' => 'stitchingForm', 'class' => 'form-horizontal'));?>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('gender');?> <span class="required">*</span></label>
                                           	<div class="col-md-9" id="themes">
                                              <span class="btn-group" data-toggle="buttons">
												<label class="btn btn-default <?php if($row['gender']=='male'){echo "active";}; ?>"><span class="tick"></span><input type="radio" name="gender" value="male" <?php if($row['gender']=='male'){echo "checked";}; ?>><?php echo get_phrase('male');?> </label>
                                                <label class="btn btn-default <?php if($row['gender']=='female'){echo "active";}; ?>"><span class="tick"></span><input type="radio" name="gender" value="female" <?php if($row['gender']=='female'){echo "checked";}; ?>><?php echo get_phrase('female');?> </label>
											</span>
                                             <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"> <?php echo get_phrase('item');?> <span class="required">*</span></label>
                                           <div class="col-md-6">
                                              <input type="text" class="form-control" name="item" value="<?php echo $row['item']; ?>"/>
                                              
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
$('#stitchingForm').validate(
             {
              rules: {
                gender: {
                  required: true},
				item: {
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