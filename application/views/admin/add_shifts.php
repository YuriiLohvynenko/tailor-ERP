<?php
$edit_data=$this->db->get_where('shifts' , array('id' => $param3) )->result_array();
foreach ( $edit_data as $r):
$row = $r;
endforeach;
if($param2=="edit_shifts")
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
           
<?php echo form_open('owner/shifts/'.$formAction , array('id' => 'shiftsForm', 'class' => 'form-horizontal'));?>
										
                                       <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('branch');?> <span class="required">*</span></label>
                                           <div class="col-md-6">
                                             <?php 
												$branchList = $this->crud_model->fetchBranchTree();
												?>
                                           <select id="branch" name="branch" class="col-md-12 select2-offscreen">
                                           <option value="">-<?php echo get_phrase('select');?>-</option>
											<?php foreach($branchList as $bl) { ?>
                                            <option <?php if($row['branch_id']==$bl["id"]){echo "selected";} ?> value="<?php echo $bl["id"] ?>">
											<?php echo $bl["title"]; ?></option>
                                            <?php } ?>
                                            </select>
                                              
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('shift');?> <?php echo get_phrase('title');?> <span class="required">*</span></label>
                                           <div class="col-md-6">
                                              <input type="text" class="form-control" name="title" value="<?php echo $row['title']; ?>"/>
                                              
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('shift');?> <?php echo get_phrase('type');?> <!--<span class="required">*</span>--></label>
                                           <div class="col-md-9" id="themes">
                                              <span class="btn-group" data-toggle="buttons">
												<label class="btn btn-default <?php if($row['shift_type']=='normal'){echo "active";}; ?>"><span class="tick"></span><input type="radio" name="shift_type" value="normal" <?php if($row['shift_type']=='normal'){echo "checked";}; ?>><?php echo get_phrase('normal');?></label>
												<label class="btn btn-default <?php if($row['shift_type']=='mid'){echo "active";}; ?>"><span class="tick"></span><input type="radio" <?php if($row['shift_type']=='mid'){echo "checked";}; ?> name="shift_type" value="mid"><?php echo get_phrase('mid');?></label>
												
											</span>
                                             
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                         <label class="control-label col-md-3">Start Time: <span class="required">*</span></label> 
                                         <div class="input-group date start_time col-md-6" data-date="" data-date-format="hh:ii" data-link-field="start_time" data-link-format="hh:ii" style="padding-left:15px !important; padding-right:0 !important;">
                                        <input name="sttime" id="sttime" class="form-control" type="text" value="<?php if($row['start_time']) echo $row['start_time']; ?>">
                                        <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                    </div>
                 <input type="hidden" name="start_time" id="start_time" value="<?php if($row['start_time']) echo $row['start_time']; ?>" />
                                      </div>
                                      
                                      	<div class="form-group">
                                         <label class="control-label col-md-3">End Time: <span class="required">*</span></label> 
                                         <div class="input-group date end_time col-md-6" data-date="" data-date-format="hh:ii" data-link-field="end_time" data-link-format="hh:ii" style="padding-left:15px !important;">
                                        <input class="form-control" type="text" value="<?php if($row['end_time'])echo $row['end_time']; ?>" name="endtime" id="endtime">
                                        <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                    </div>
                                    	<input type="hidden" name="end_time" id="end_time" value="<?php if($row['end_time']) echo $row['end_time']; ?>" />
                                        <span class="error-span"></span>
                                      </div>
                                      
                                      <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('total');?> <?php echo get_phrase('time');?> </label>
                                           <div class="col-md-6">
                                              <input type="text" class="form-control" name="total_time" value="<?php echo $row['total_time'];?>" id="total_time" readonly="readonly"/>
                                             
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('working');?> <?php echo get_phrase('days');?> </label>
                                           <div class="col-md-9" id="themes">
                                              <span class="btn-group" data-toggle="buttons">
                                              <?php
											  $days = array("sun","mon","tue","wed","thu","fri","sat");
											   $w=explode(",",$row['working_days']); 
											   foreach($days as $d => $day){?>
												<label class="btn btn-default <?php if(in_array($day,$w)){echo "active";}; ?>"><span class="tick"></span><input type="checkbox" <?php if(in_array($day,$w)){echo "checked";}; ?> name="working_days[]" value="<?php echo $day;?>"><?php echo get_phrase($day);?></label>
                                                
                                                <?php }?>
											</span>
                                             
                                           </div>
                                        </div>
                                        
                                        <!--<div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('total');?> <?php echo get_phrase('working');?> <?php echo get_phrase('days');?><span class="required">*</span></label>
                                           <div class="col-md-6">
                                              <input type="text" class="form-control" name="total_days" readonly="readonly"/>
                                              
                                              <span class="error-span"></span>
                                           </div>
                                        </div>-->
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('allowance');?> </label>
                                           <div class="col-md-9">
                                              <select multiple name="allowance[]" id="allowance" class="col-md-9">
												   <option></option>
                                              <?php $allownaces = $this->crud_model->get_All_table_List('allowances');
											  if($row['allowance'])
											  {$al = explode(',',$row['allowance']);} 
											  foreach($allownaces as $k => $allownace){?>
												   <option <?php if(in_array($allownace['id'],$al)){echo 'selected';} ?> value="<?php echo $allownace['id']; ?>"><?php echo $allownace['title']; ?></option>
                                              <?php }?>
												   
												</select>
                                              
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

	$('.start_time').datetimepicker({
        language:  'en',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 1,
		minView: 0,
		maxView: 1,
		forceParse: 0,
		pickerPosition: "bottom-left"
    });
	
	$('.end_time').datetimepicker({
        language:  'en',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 1,
		minView: 0,
		maxView: 1,
		forceParse: 0,
		pickerPosition: "bottom-left"
    });
/*--------JAVASCRIPT STR_PAD FUNCTION-----------*/	
function str_Pad(length, input, string) {
    string = string || '0'; input = input + '';
    return input.length >= length ? input : new Array(length - input.length + 1).join(string) + input;
}
/*--------/JAVASCRIPT STR_PAD FUNCTION-----------*/
</script>
<script type="text/javascript">
$(document).ready(function() {
/*--------BRANCH SELECT-----------*/
$("#branch").select2({
	placeholder: "Select your Branch"
});
/*--------ALLOWNACE SELECT-----------*/	
$("#allowance").select2({
	placeholder: "Select your Allowance"
});
/*--------JQUERY TIME DIFFERENCE FUNCTION-----------*/
$(".start_time,.end_time").change(function(){
	
	var diff =0;
	var hours=0;
	var mins =0;
	var t1   =0;
	var t2   =0;
	
	if($("#start_time").val()){
		t1 = $("#start_time").val();
	}
	if($("#end_time").val()){
		t2 = $("#end_time").val();
	}
	 
	hours = parseInt(t1.split(':')[0],10) - parseInt(t2.split(':')[0],10);
	mins  = parseInt(t1.split(':')[1],10) - parseInt(t2.split(':')[1],10);
	diff  = str_Pad('2',Math.abs(hours),'0')+":"+str_Pad('2',Math.abs(mins),'0'); 
	$("#total_time").val(diff);
});
/*--------/JQUERY TIME DIFFERENCE FUNCTION-----------*/

/*--------JQUERY VALIDATION-----------*/

$('#shiftsForm').validate(
             {
              rules: {
                branch: {
                  required: true
                },
				title: {
                  required: true
                },
				shift_type: {
                  required: true
                },
				sttime: {
                  required: true
                },
				endtime: {
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