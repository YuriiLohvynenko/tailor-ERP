<?php
$edit_data=$this->db->get_where('holidays' , array('id' => $param3) )->result_array();
foreach ( $edit_data as $r):
$row = $r;
endforeach;
if($param2=="edit_holidays")
{
	$formAction = "do_update/".$param3;
}
else
{
	$formAction = "add_holidays/";
}
?>
<div class="box border green" id="formWizard">
                        <div class="box-title">
                            <h4><i class="fa fa-bars"></i> <?php echo get_phrase('holiday')?> </h4>
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
           
<?php echo form_open('owner/holidays/'.$formAction , array('id' => 'holidaysForm', 'class' => 'form-horizontal'));?>
										
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
                                           <label class="control-label col-md-3"><?php echo get_phrase('holiday');?> <?php echo get_phrase('title');?> <span class="required">*</span></label>
                                           <div class="col-md-6">
                                              <input type="text" class="form-control" name="title" value="<?php echo $row['title']; ?>"/>
                                              
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                         <label class="control-label col-md-3">Start Date:</label> 
                                         <div class="input-group date start_date col-md-6" data-date="" data-date-format="dd MM yyyy" data-link-field="start_date" data-link-format="yyyy-mm-dd" style="padding-left:15px !important; padding-right:0 !important;">
                                        <input class="form-control" type="text" value="<?php if($row['start_date'])echo date("d M Y",strtotime($row['start_date'])); ?>">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    </div>
                                    	<input type="hidden" name="start_date" id="start_date" value="<?php if($row['start_date'])echo date("Y-m-d",strtotime($row['start_date'])); ?>" />
                                      </div>
                                      
                                      	<div class="form-group">
                                         <label class="control-label col-md-3">End Date:</label> 
                                         <div class="input-group date end_date col-md-6" data-date="" data-date-format="dd MM yyyy" data-link-field="end_date" data-link-format="yyyy-mm-dd" style="padding-left:15px !important;">
                                        <input class="form-control" type="text" value="<?php if($row['end_date'])echo date("d M Y",strtotime($row['end_date'])); ?>">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    </div>
                                    	<input type="hidden" name="end_date" id="end_date" value="<?php if($row['end_date']) echo date("Y-m-d",strtotime($row['end_date'])); ?>" />
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
    /*$('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
    });*/
	$('.start_date').datetimepicker({
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
	$('.end_date').datetimepicker({
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
	/*$('.form_time').datetimepicker({
        language:  'en',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 1,
		minView: 0,
		maxView: 1,
		forceParse: 0
    });*/
</script>
<script type="text/javascript">
$(document).ready(function() {
	
$("#branch").select2({
	placeholder: "Select your Branch"
});



$('#holidaysForm').validate(
             {
              rules: {
                title: {
                  required: true
                },
				branch: {
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