<?php

//$edit_data=$this->db->get_where('employees_shift' , array('id' => $param3) )->result_array();
//foreach ( $edit_data as $r):
//$row = $r;
//endforeach;
if($param2=="edit_assign_shifts")
{
	$formAction = "update_assign_shifts/".$param3;
}
else
{
	$formAction = "create_assign_shifts/".$param3;
}
?>
<div class="box border green" id="formWizard">
                        <div class="box-title">
                            <h4><i class="fa fa-bars"></i> <?php echo get_phrase('shift')?> </h4>
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
           
<?php echo form_open('owner/employees/'.$formAction , array('id' => 'assignshiftsForm', 'class' => 'form-horizontal'));?>
										
                                       <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('shift');?> <span class="required">*</span></label> <?php
                                                $employee_branch = $this->crud_model->get_value_by_id('employees',$param3,'branch_id');//echo "<pre>";print_r($employee);?>
                                           <div class="col-md-6">
                                             <select id="shift" name="shift" class="col-md-8 select2-offscreen">
                                               <option value=""></option>
                                                <?php
                                                $shifts = $this->crud_model->get_All_List('shifts','branch_id',$employee_branch);
                                                 foreach($shifts as $shift){?>
                                                <option <?php if($shift['id']==$row['shift_id']){echo "selected";} ?> value="<?php echo $shift['id']; ?>"><?php echo $shift['title']; ?></option>
                                                <?php }?>
                                                </select>
                                              
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                         <label class="control-label col-md-3"><?php echo get_phrase('assigned');?> <?php echo get_phrase('from');?><span class="required">*</span></label> 
                                         <div class="input-group date assigned_from col-md-6" data-date="" data-date-format="dd MM yyyy" data-link-field="assigned_from" data-link-format="yyyy-mm-dd" style="padding-left:15px !important; padding-right:0 !important;">
                                        <input name="assignedfrom" id="assignedfrom" class="form-control" type="text" value="<?php if($row['assigned_from']) echo $row['assigned_from']; ?>">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    </div>
                 <input type="hidden" name="assigned_from" id="assigned_from" value="<?php if($row['assigned_from']) echo $row['assigned_from']; ?>" />
                                      </div>
                                      
                                      	<div class="form-group">
                                         <label class="control-label col-md-3"><?php echo get_phrase('assigned');?> <?php echo get_phrase('to');?> <span class="required">*</span></label> 
                                         <div class="input-group date assigned_to col-md-6" data-date="" data-date-format="dd MM yyyy" data-link-field="assigned_to" data-link-format="yyyy-mm-dd" style="padding-left:15px !important;">
                                        <input class="form-control" type="text" value="<?php if($row['assigned_to'])echo $row['assigned_to']; ?>" name="assignedto" id="assignedto">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    </div>
                                    	<input type="hidden" name="assigned_to" id="assigned_to" value="<?php if($row['assigned_to']) echo $row['assigned_to']; ?>" />
                                        <span class="error-span"></span>
                                      </div>
                                      
                                      <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('remark');?> </label>
                                           <div class="col-md-6">
                                              <textarea type="text" class="form-control" name="remark"><?php echo $row['remark'];?></textarea>
                                             
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

	$('.assigned_from').datetimepicker({
        language:  'en',
		weekStart: 1,
		todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0,
		pickerPosition: "bottom-left"
    });
	
	$('.assigned_to').datetimepicker({
        language:  'en',
		weekStart: 1,
		todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0,
		pickerPosition: "bottom-left"
    });

</script>
<script type="text/javascript">
$(document).ready(function() {
/*--------BRANCH SELECT-----------*/
$("#shift").select2({
	placeholder: "Select shift"
});

/*--------JQUERY VALIDATION-----------*/

$('#assignshiftsForm').validate(
             {
              rules: {
                shift: {
                  required: true
                },
				assignedfrom: {
                  required: true
                },
				assignedto: {
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