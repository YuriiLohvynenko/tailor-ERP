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
                                <a href=""><?php echo get_phrase('payroll');?></a>
                            </li>
                            <li><?php echo get_phrase($page_title)?></li>
                        </ul>
                        <!-- /BREADCRUMBS -->
                        <div class="clearfix">
                            <h3 class="content-title pull-left"><?=ucwords($page_title)?></h3>
                        </div>
                        <!--<div class="description"><?php echo get_phrase('all_lists_shows_here')?></div>-->
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
								<!-- FORMS owner/employees/'.$formAction-->
						<div class="row">
							<div class="col-md-12">
<!-- *********     Employee Search Panel ***************** -->
						<?php echo form_open('owner/manage_salary_details/search' , array('id' => 'empSearchForm', 'class' => 'form-horizontal'));?>
                            	<div class="row">
									<div class="col-md-12">
										<div class="box border green">
											<div class="box-title">
												<h4><i class="fa fa-search"></i><?php echo get_phrase('manage');?> <?php echo get_phrase('salary');?> <?php echo get_phrase('details');?> </h4>
												<div class="tools hidden-xs">
													<a href="#box-config" data-toggle="modal" class="config">
														<i class="fa fa-cog"></i>
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
											<div class="box-body big">
												  <div class="form-group">
													<label class="col-sm-3 control-label"><?php echo get_phrase('employee');?> <span class="required">*</span></label>
													<div class="col-sm-6">
													  <select id="employee" name="employee" class="col-md-12 select2-offscreen">
                          <option value=""></option>
                            <?php foreach($employees as $c => $employee){?>
                            <option <?php if($emp_id==$employee['id']){echo "selected";} ?> value="<?php echo $employee['id']; ?>"><?php echo $employee['fname']; ?> <?php echo $employee['lname']; ?></option>
                            <?php }?>
                            </select>
													</div>
												  </div>
                                                  
                                                  <div class="form-group">
													<label class="col-sm-3 control-label">&nbsp;</label>
													<div class="col-sm-6">
													  <button type="submit" class="btn btn-block btn-info"> <?php echo get_phrase('go');?> <i class="fa fa-arrow-circle-right"></i></button>
													</div>
												  </div>
											</div>
										</div>
									</div>
								</div>
                             
                        <?php echo form_close();?>
<!-- *********     Employee Search Panel Ends***************** -->
                             
								<div class="separator"></div>
<!-- ********************** Salary Details Panel **************-->
                        <?php 
						if($employeeDetails):
						foreach($employeeDetails as $employeeDetail):
						//echo "<pre>";
						//print_r($employeeDetails);
						echo form_open('owner/manage_salary_details/'.$formAction , array('id' => 'empSalarydetailForm', 'class' => 'form-horizontal'));?>
								<div class="row">
									<div class="col-md-12">
										<div class="box border blue">
											<div class="box-title">
												<h4><i class="fa fa-usd"></i> <?php echo get_phrase('salary');?> <?php echo get_phrase('details');?> </h4>
												<div class="tools hidden-xs">
													<a href="#box-config" data-toggle="modal" class="config">
														<i class="fa fa-cog"></i>
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
											<div class="box-body big">
												<div class="form-group">
													<label class="col-sm-3 control-label"><?php echo get_phrase('employement');?> <?php echo get_phrase('type');?> <!--<span class="required">*</span>--></label>
													<div class="col-sm-6">
													  <select id="emp_type" name="emp_type" class="col-md-12 select2-offscreen">
                          <option value=""></option>
                            
                            <option <?php if($employeeDetail['emp_type']=='temporary'){echo "selected";} ?> value="temporary"><?php echo get_phrase('temporary');?></option>
                            <option <?php if($employeeDetail['emp_type']=='permanent'){echo "selected";} ?> value="permanent"><?php echo get_phrase('permanent');?></option>
                           
                            </select>
													</div>
												  </div>
                                                  
                                                <div class="form-group">
													<label class="col-sm-3 control-label"><?php echo get_phrase('salary');?></label>
													<div class="col-sm-6">
														<input type="text" class="salary form-control" name="salary" readonly="readonly" id="salary" placeholder="<?php echo get_phrase('salary');?>" value="<?php echo $employeeDetail['salary']; ?>" >														
													</div>
												  </div>
											</div>
										</div>
									</div>
								</div>
								<div class="separator"></div>
								<!-- SAMPLE -->
								<div class="row">
									<div class="col-md-6">
										<!-- BOX -->
                                        <div class="box border orange">
											<div class="box-title">
												<h4><i class="fa fa-plus-circle"></i><?php echo get_phrase('allowances');?> </h4>
												<div class="tools">
													<a href="#box-config" data-toggle="modal" class="config">
														<i class="fa fa-cog"></i>
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
											<div class="box-body">
                                <?php foreach($allowances as $allowance):?>
                                             <div class="form-group">
                                           <label class="control-label col-md-4"><?php echo $allowance['title'];?></label>
                                           <div class="col-md-8">
                                              <input type="text" class="salary form-control" name="allowances[]"  placeholder="<?php echo $allowance['title'];?>"/>
                                              <input type="hidden" name="allowance_ids[]" value="<?php echo $allowance['id'];?>" />
                                             <span class="error-span"></span>  
                                           </div>
                                        </div>
                                <?php endforeach;?>
										</div>
										</div>
										<!-- /BOX -->
									</div>
                                    <div class="col-md-6">
										<!-- BOX -->
										<div class="box border red">
											<div class="box-title">
												<h4><i class="fa fa-minus-circle"></i><?php echo get_phrase('deductions');?> </h4>
												<div class="tools">
													<a href="#box-config" data-toggle="modal" class="config">
														<i class="fa fa-cog"></i>
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
											<div class="box-body">
                                            <?php  if(!$row['id']){?>
                                             <div class="form-group">
                                           <label class="control-label col-md-4"><?php echo get_phrase('epf');?> <!--<span class="required">*</span>--></label>
                                           <div class="col-md-8">
                                              <input type="text" class="deduction form-control" name="provident_fund"  placeholder="<?php echo get_phrase('provident_fund');?>"/>
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        	 
                                             <div class="form-group">
                                           <label class="control-label col-md-4"><?php echo get_phrase('tax');?><!--<span class="required">*</span>--></label>
                                           <div class="col-md-8">
                                           <select name="tax" id="tax" class="col-md-12 select2-offscreen">
                                           <option></option>
											<?php foreach($taxes as $tax):?>
                              				<option value="<?php echo $tax['id'];?>"><?php echo $tax['title']; ?></option>
                                            <?php endforeach;?>
						                   </select>
                                           <span id="loading"></span>
                                           <input type="hidden" name="taxvalue" id="taxvalue" class="deduction" value="0"/>
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        <? }?>
                                        	 <div class="form-group">
                                           <label class="control-label col-md-4"><?php echo get_phrase('other');?> <!--<span class="required">*</span>--></label>
                                           <div class="col-md-8">
                                           <input type="text" class="deduction form-control" name="otherdeduction" placeholder="<?php echo get_phrase('other');?> <?php echo get_phrase('deduction');?>"/>
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                       	  
											</div>
										</div>
										<!-- /BOX -->
									</div>
                                    
                                    <div class="col-md-6">
										<!-- BOX -->
										<div class="box border pink">
											<div class="box-title">
												<h4><i class="fa fa-money"></i><?php echo get_phrase('total');?> <?php echo get_phrase('salary');?> <?php echo get_phrase('details');?></h4>
												<div class="tools">
													<a href="#box-config" data-toggle="modal" class="config">
														<i class="fa fa-cog"></i>
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
											<div class="box-body">
                                            <?php  if(!$row['id']){?>
                                             <div class="form-group">
                                           <label class="control-label col-md-4"><?php echo get_phrase('gross');?> </label>
                                           <div class="col-md-8">
                                              <input type="text" class="form-control" name="grosssalary" id="grosssalary" readonly="readonly" placeholder="<?php echo get_phrase('gross');?> <?php echo get_phrase('salary');?>" value="<?php echo $employeeDetail['salary']; ?>"/>
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        	 
                                             <div class="form-group">
                                           <label class="control-label col-md-4"><?php echo get_phrase('total');?> <?php echo get_phrase('deduction');?></label>
                                           <div class="col-md-8">
                                             <input type="text" class="form-control" name="totaldeduction" id="totaldeduction" readonly placeholder="<?php echo get_phrase('total');?> <?php echo get_phrase('deduction');?>"/>
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        <? }?>
                                        	 <div class="form-group">
                                           <label class="control-label col-md-4"><?php echo get_phrase('net');?> <?php echo get_phrase('salary');?></label>
                                           <div class="col-md-8">
                                             <input type="text" class="form-control" readonly name="netsalary" id="netsalary" placeholder="<?php echo get_phrase('net');?> <?php echo get_phrase('salary');?>" value="<?php echo $employeeDetail['salary'];?>"/>
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                       	  
											</div>
										</div>
										<!-- /BOX -->
									</div>
								</div>
								<!-- /SAMPLE -->
                                
							</div>
                            
                            <div class="form-actions clearfix">
                                  <div class="row">
                                     <div class="col-md-12">
                                     <input type="hidden" name="emp_id" value="<?php echo $emp_id; ?>" />
                                     <input type="hidden" name="branch_id" value="<?php echo $employeeDetails['branch_id']; ?>" />
                                        <button type="submit" class="btn btn-block btn-info"> <?php echo get_phrase('save');?> <i class="fa fa-save"></i></button>
                                     </div>
                                  </div>
                               </div>
                        <?php echo form_close();
						endforeach;
						endif;
						?>
<!-- ****************** Salary Details Panel ENDS *************-->
						</div>
						<!-- /FORMS -->
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