<?php

foreach ($edit_data as $r):
$row = $r;
endforeach;
if($edit_data[0])
{
	$formAction = "do_update/".$row['id'];
}
else
{
	$formAction = "create/";
}?>
<div class="container">
    <div class="row">
        <div id="content" class="col-lg-12">
            <!-- PAGE HEADER-->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-header">
                        <!-- STYLER -->
                        
                        <!-- /STYLER -->
                        <!-- BREADCRUMBS -->
                        <ul class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>
                                <a href="<?php echo base_url();?>"><?php echo get_phrase('home');?></a>
                            </li>
                            <li>
                                <a href=""><?php echo get_phrase('attendance');?></a>
                            </li>
                            <li><?php echo get_phrase($page_title)?></li>
                        </ul>
                        <!-- /BREADCRUMBS -->
                        <div class="clearfix">
                            <h3 class="content-title pull-left"><?=ucwords($page_title)?></h3>
                        </div>
                       <!-- <div class="description"><?php echo get_phrase('all_lists_shows_here')?></div>-->
                    </div>
                </div>
            </div>
            <!-- /PAGE HEADER -->
            <!-- EXPORT TABLE -->
            <div class="row">
                <div class="col-md-12">
                 <?php if($this->session->flashdata('flash_message')){ ?>
                <div class="alert alert-block alert-success fade in">
                <a class="close" data-dismiss="alert" href="#" aria-hidden="true">×</a>
                <h4><i class="fa fa-heart"></i> <?php echo $this->session->flashdata('flash_message'); ?></h4>
                </div>
                
                <? }?>
								<!-- FORMS -->
						<div class="row">
                        
                        <div class="col-md-12">
                    <!-- BOX -->
                    <div class="box border red" id="formWizard">
                        <div class="box-title">
                            <h4><i class="fa fa-bars"></i><?=ucwords($page_title)?></h4>
                            <div class="tools hidden-xs">
                                
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
           
                        <?php echo form_open('owner/attendances/'.$formAction , array('id' => 'attendanceForm', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data'));?>
                        	
                            <div class="form-group">
                               <label class="control-label col-md-3"><?php echo get_phrase('select');?> <?php echo get_phrase('employee');?><span class="required">*</span></label>
                               <div class="col-md-4">
                                  <select id="employee" name="employee" class="col-md-12 select2-offscreen">
                                  <option value=""></option>
                        <?php
                            
                            foreach ($employees as $employee)
                            {
                                ?>
                                <option value="<?php echo $employee['id'];?>"
                                    <?php if ($employee['id'] == $row['emp_id'])echo 'selected';?>> <?php echo ucwords($employee['fname']." ".$employee['lname']);?> </option>
                                <?php
                            }
                            ?>
               </select>
                                  <span class="error-span"></span>
                               </div>
                            </div>
                        	
                            <div class="form-group">
                               <label class="control-label col-md-3"><?php echo get_phrase('date');?> <?php echo get_phrase('from');?><span class="required">*</span></label>
                               <div class="input-group date attdate col-md-4" data-date="" data-date-format="dd MM yyyy" data-link-field="att_date" data-link-format="yyyy-mm-dd" style="padding-left:15px !important;">
                               <input class="form-control" type="text" name="attdate" value="<?php if($row['att_date'])echo date("d M Y",strtotime($row['att_date'])); ?>" placeholder="<?php echo get_phrase('date');?>">
                               <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                               <span class="error-span"></span>
                                </div>
                                <input type="hidden" name="att_date" id="att_date" value="<?php if($row['att_date']) echo date("Y-m-d",strtotime($row['att_date'])); ?>" />
                                
                            </div>
                            
                            <div class="form-group">
                               <label class="control-label col-md-3"><?php echo get_phrase('date');?> <?php echo get_phrase('to');?><!--<span class="required">*</span>--></label>
                               <div class="input-group date attdateto col-md-4" data-date="" data-date-format="dd MM yyyy" data-link-field="att_date_to" data-link-format="yyyy-mm-dd" style="padding-left:15px !important;">
                               <input class="form-control" type="text" name="attdateto" value="<?php if($row['date_to'])echo date("d M Y",strtotime($row['date_to'])); ?>" placeholder="<?php echo get_phrase('date');?>">
                               <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                               <span class="error-span"></span>
                                </div>
                                <input type="hidden" name="att_date_to" id="att_date_to" value="<?php if($row['date_to']) echo date("Y-m-d",strtotime($row['date_to'])); ?>" />
                                
                            </div>
                            
                            <div class="form-group">
                               <label class="control-label col-md-3"><?php echo get_phrase('time');?> <?php echo get_phrase('in');?><span class="required">*</span></label>
                               <div class="input-group date time_in col-md-4" data-date="" data-date-format="hh:ii" data-link-field="time_in" data-link-format="hh:ii" style="padding-left:15px !important;">
                                        <input class="form-control" type="text" value="<?php if($row['time_in'])echo $row['time_in']; ?>" name="timein" id="timein">
                                        <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                        <span class="error-span"></span>
                                    </div>
                               <input type="hidden" name="time_in" id="time_in" value="<?php if($row['time_in']) echo $row['time_in']; ?>" />
                               <span class="error-span"></span>
                            </div>
                            
                            
                            
                            <div class="form-group">
                               <label class="control-label col-md-3"><?php echo get_phrase('time');?> <?php echo get_phrase('out');?><span class="required">*</span></label>
                               <div class="input-group date time_out col-md-4" data-date="" data-date-format="hh:ii" data-link-field="time_out" data-link-format="hh:ii" style="padding-left:15px !important; padding-right:0 !important;">
                                        <input name="timeout" id="timeout" class="form-control" type="text" value="<?php if($row['time_out']) echo $row['time_out']; ?>">
                                        <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                    </div>
                 <input type="hidden" name="time_out" id="time_out" value="<?php if($row['time_out']) echo $row['time_out']; ?>" />
                 		<span class="error-span"></span>
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
                    <!-- /BOX -->
                </div>
                        
					
            </div>
            <!-- /EXPORT TABLE -->
            <div class="footer-tools">
                <span class="go-top">
                    <i class="fa fa-chevron-up"></i> <?php echo get_phrase('top');?>
                </span>
            </div>
        </div><!-- /CONTENT-->
    </div>
</div>
<script type="text/javascript">
<?php $holydays = $this->crud_model->get_Holiday_List(date('Y-m-01'),date('Y-m-t')); 
$alldays = $this->crud_model->date_range($holydays[0]['start_date'],$holydays[0]['end_date']);
?>
var disabledays = <?php echo json_encode($alldays); ?>;

</script>