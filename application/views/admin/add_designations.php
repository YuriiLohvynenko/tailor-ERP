<?php
$edit_data=$this->db->get_where('designations' , array('id' => $param3) )->result_array();
foreach ( $edit_data as $r):
$row = $r;
endforeach;
if($param2=="edit_designations")
{
	$formAction = "do_update/".$param3;
}
else
{
	$formAction = "add_designations/";
}
?>
<div class="box border green" id="formWizard">
                        <div class="box-title">
                            <h4><i class="fa fa-bars"></i><?php echo get_phrase('designations')?></h4>
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
           
<?php echo form_open('owner/designations/'.$formAction , array('id' => 'designationsForm', 'class' => 'form-horizontal'));?>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('designations');?> <?php echo get_phrase('title');?> <span class="required">*</span></label>
                                           <div class="col-md-6">
                                              <input type="text" class="form-control" name="title" value="<?php echo $row['title']; ?>"/>
                                              
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
$('#designationsForm').validate(
             {
              rules: {
                title: {
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