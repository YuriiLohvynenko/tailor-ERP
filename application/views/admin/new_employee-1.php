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
                                <a href=""><?php echo get_phrase('employees');?></a>
                            </li>
                            <li><?php echo get_phrase($page_title)?></li>
                        </ul>
                        <!-- /BREADCRUMBS -->
                        <div class="clearfix">
                            <h3 class="content-title pull-left"><?=ucwords($page_title)?></h3>
                        </div>
                        <div class="description"><?php echo get_phrase('all_lists_shows_here')?></div>
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
								<!-- BOX -->
								<div class="box border red">
									<div class="box-title">
										<h4><i class="fa fa-columns"></i><span class="hidden-inline-mobile"><?php echo get_phrase('registration');?></span></h4>
									</div>
									<div class="box-body">
										<div class="tabbable header-tabs">
										  <ul class="nav nav-tabs">
											 <li class=""><a href="#user_role" data-toggle="tab"><i class="fa fa-user"></i> <span class="hidden-inline-mobile"><?php echo get_phrase('user');?> <?php echo get_phrase('role');?></span></a></li>
											 <li class=""><a href="#official_info" data-toggle="tab"><i class="fa fa-laptop"></i> <span class="hidden-inline-mobile"><?php echo get_phrase('official');?> <?php echo get_phrase('info');?></span></a></li>
											 <li class="active"><a href="#basic_info" data-toggle="tab"><i class="fa fa-info"></i> <span class="hidden-inline-mobile"><?php echo get_phrase('basic');?> <?php echo get_phrase('info');?></span></a></li>
										  </ul>
										  <div class="tab-content">
                                          
                                     <!---------BASIC INFO TAB------->
                                     
							<div class="tab-pane fade active in" id="basic_info">
												<!--<p>Content #1</p>
												<p> There were flying cantaloupes, rainbows and songs of happiness near by, I mean I was a little frightened by the flying fruit but I'll take this any day over prison inmates. </p>-->
            
           			 <?php echo form_open('owner/employees/'.$formAction , array('id' => 'employeeForm', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data'));?>
            
                        <div class="box border green">
                        <div class="box-title">
                            <h4><i class="fa fa-bars"></i> <?php echo get_phrase('basic_info')?> </h4>
                            <!--<div class="tools hidden-xs">
                               
                                <a href="javascript:;" class="reload">
                                    <i class="fa fa-refresh"></i>
                                </a>
                                <a href="javascript:;" class="collapse">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a href="javascript:;" class="remove">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>-->
                        </div>
                        
                        <div class="box-body big">
                        <!--BASIC INFO-->
                        <div class="form-group">
                        <div class="row">
                        <label class="col-md-2"><?php echo get_phrase('branch');?> </label>
                          <div class="col-xs-4">
                            <select id="branch" name="branch" class="col-md-8 select2-offscreen">
                           <option value=""></option>
                            <?php foreach($branches as $branch){?>
                            <option <?php if($row['branch_id']==$branch['id']){echo "selected";} ?> value="<?php echo $branch['id']; ?>"><?php echo $branch['title']; ?></option>
                            <?php }?>
                            </select>
                          </div>
                          
                          <div class="col-xs-4">
                            <select id="dept_id" name="dept_id" class="col-md-8 select2-offscreen">
                           <option value=""></option>
                            <?php foreach($departments as $department){?>
                            <option <?php if($row['dept_id']==$department['id']){echo "selected";} ?> value="<?php echo $department['id']; ?>"><?php echo $department['title']; ?></option>
                            <?php }?>
                            </select>
                          </div>
                        </div>
                        </div>
                        
                        <div class="separator"></div>
                         
                        <div class="form-group">
                        <div class="row">
                        <label class="col-md-2"><?php echo get_phrase('name');?> </label>
                          <div class="col-xs-3">
                            <select id="title" name="title" class="col-md-8 select2-offscreen">
                            <option value=""></option>
                            <option <?php if($row['title']=='mr'){echo "selected";} ?> value="mr">Mr.</option>
                            <option <?php if($row['title']=='miss'){echo "selected";} ?> value="miss">Miss</option>
                             <option <?php if($row['title']=='mrs'){echo "selected";} ?> value="mrs">Mrs</option>
                            </select>
                          </div>
                          <div class="col-xs-3">
                            <input type="text" class="form-control" placeholder="<?php echo get_phrase('first');?>" name="fname" value="<?php echo $row['fname']; ?>" />
                          </div>
                          <div class="col-xs-2">
                            <input type="text" class="form-control" placeholder="<?php echo get_phrase('middle');?>" name="mname" value="<?php echo $row['mname']; ?>" />
                          </div>
                          
                          <div class="col-xs-2">
                            <input type="text" class="form-control" placeholder="<?php echo get_phrase('last');?>" name="lname" value="<?php echo $row['lname']; ?>" />
                          </div>
                        </div>
                        </div>
                        
                        <div class="separator"></div>
                        
                        <div class="form-group">
                        <div class="row">
                        <label class="col-md-2"><?php echo get_phrase('guardian');?> <?php echo get_phrase('name');?> </label>
                          <div class="col-xs-5">
						  <select id="gaurdian_option" name="gaurdian_option" class="col-md-8 select2-offscreen">
                          <option value=""></option>
                            <option <?php if($row['gaurdian']=='father'){echo "selected";} ?> value="father"><?php echo get_phrase('father');?></option>
                            <option <?php if($row['gaurdian']=='husband'){echo "selected";} ?> value="husband"><?php echo get_phrase('husband');?></option>
                            </select>
                          </div>
                          
                          <div class="col-xs-4">
                            <input type="text" class="form-control" placeholder="<?php echo get_phrase('father');?>/<?php echo get_phrase('husband');?> <?php echo get_phrase('name');?>" name="gaurdian_name" value="<?php echo $row['gaurdian_name']; ?>" />
                          </div>
                        </div>
                        </div>
                        
                        <div class="separator"></div>
                        
                        
                        <div class="form-group">
                        <div class="row">
                        <label class="col-md-2"><?php echo get_phrase('details');?> </label>
                          <div class="col-xs-3">
						  <select id="sex" name="sex" class="col-md-8 select2-offscreen">
                          <option value=""></option>
                            <option <?php if($row['gender']=='male'){echo "selected";} ?> value="male"><?php echo get_phrase('male');?></option>
                            <option <?php if($row['gender']=='female'){echo "selected";} ?> value="female"><?php echo get_phrase('female');?></option>
                            </select>
                          </div>
                          
                          <div class="col-xs-4">
						  <select id="religion" name="religion" class="col-md-8 select2-offscreen">
                          <option value=""></option>
                            <option <?php if($row['religion']=='muslim'){echo "selected";} ?> value="muslim"><?php echo get_phrase('muslim');?></option>
                            <option <?php if($row['religion']=='non-muslim'){echo "selected";} ?> value="non-muslim"><?php echo get_phrase('non-muslim');?></option>
                            </select>
                          </div>
                          
                          <div class="col-xs-3">
						  <select id="marital" name="marital" class="col-md-8 select2-offscreen">
                          <option value=""></option>
                            <option <?php if($row['martial_status']=='single'){echo "selected";} ?> value="single"><?php echo get_phrase('single');?></option>
                            <option <?php if($row['martial_status']=='married'){echo "selected";} ?> value="married"><?php echo get_phrase('married');?></option>
                            </select>
                          </div>
                        </div>
                        </div>
                        
                        <div class="form-group">
                        <div class="row">
                        <label class="col-md-2">&nbsp;</label>
                          <div class="col-xs-3">
						  <input  class="form-control datepicker" type="text" name="dob" value="<?php echo $row['dob']; ?>" placeholder="<?php echo get_phrase('dob');?>">
                          </div>
                          
                          <div class="col-xs-4">
						  <input type="text" class="form-control" data-mask="99999/9999999/9" name="cnic_no" value="<?php echo $row['cnicno']; ?>" placeholder="<?php echo get_phrase('cnic');?> <?php echo get_phrase('no');?>">
                          </div>
                          
                          <div class="col-xs-3">
						  <input  class="form-control datepicker" type="text" name="cnic_expiry" value="<?php echo $row['cnic_expiry']; ?>"  placeholder="<?php echo get_phrase('cnic');?> <?php echo get_phrase('expiry');?> <?php echo get_phrase('date');?>">
                          </div>
                        </div>
                        </div>
                        
                        <div class="form-group">
                        <div class="row">
                        <label class="col-md-2">&nbsp;</label>
                          <div class="col-xs-5">
						  <input  class="form-control" type="text" name="passport" value="<?php echo $row['passport_no']; ?>" placeholder="<?php echo get_phrase('passport');?> <?php echo get_phrase('no');?>">
                          </div>
                          
                          <div class="col-xs-5">
						 <input  class="form-control datepicker" type="text" name="passport_expiry" value="<?php echo $row['passport_expiry']; ?>" placeholder="<?php echo get_phrase('passport');?> <?php echo get_phrase('expiry');?> <?php echo get_phrase('date');?>">
                          </div>
                          
                          
                        </div>
                        </div>
                        
                        <div class="form-group">
                        <div class="row">
                        <label class="col-md-2">&nbsp;</label>
                          <div class="col-xs-5">
						  <input  class="form-control" type="text" name="dlno" placeholder="<?php echo get_phrase('driving_licence');?> <?php echo get_phrase('no');?>" value="<?php echo $row['dl_no']; ?>" />
                          </div>
                          
                          <div class="col-xs-5">
						 <input  class="form-control datepicker" type="text" name="dl_expiry" value="<?php echo $row['dl_expiry']; ?>" placeholder="<?php echo get_phrase('driving_licence');?> <?php echo get_phrase('expiry');?> <?php echo get_phrase('date');?>">
                          </div>
                          
                          
                        </div>
                        </div>
                        
                        <div class="separator"></div>
                      
                        <div class="form-group">
                        <div class="row">
                        <label class="col-md-2"><?php echo get_phrase('address');?></label>
                          <div class="col-xs-3">
						  <select id="country" name="country" class="col-md-8 select2-offscreen">
                            <option value=""></option>
                            <?php foreach($countries as $c => $country){?>
                            <option <?php if($row['country']==$country['id']){echo "selected";} ?> value="<?php echo $country['id']; ?>"><?php echo $country['name']; ?></option>
                            <?php }?>
                           
                            </select>
                            <span id="loading"></span>
                           
                          </div>
                          
                          <div class="col-xs-4" id="state">
						  <select id="province" name="province" class="col-md-8 select2-offscreen">
                            <?php $states = $this->crud_model->get_State_List($row['country']); ?>
                            <?php foreach($states as $c => $state){?>
                            <option <?php if($row['state']==$state['id']){echo "selected";} ?> value="<?php echo $state['id']; ?>"><?php echo $state['name']; ?></option>
                            <?php }?>
                            
                            </select>
                          </div>
                          
                          <div class="col-xs-3">
						  <input  class="form-control" type="text" name="city" value="<?php echo $row['city']; ?>" placeholder="<?php echo get_phrase('city');?> ">
                          </div>
                        </div>
                        </div>
                        
                        <div class="form-group">
                        <div class="row">
                        <label class="col-md-2">&nbsp;</label>
                          <div class="col-xs-3">
						  <input  class="form-control" type="text" name="nationality" value="<?php echo $row['nationality']; ?>" placeholder="<?php echo get_phrase('nationality');?> ">
                          </div>
                          
                          <div class="col-xs-3">
						 <input  class="form-control" type="text" name="postal" placeholder="<?php echo get_phrase('postal');?> <?php echo get_phrase('code');?> " value="<?php echo $row['postal_code']; ?>">
                          </div>
                          
                          <div class="col-xs-4">
						 <textarea  class="form-control" name="address" placeholder="<?php echo get_phrase('address');?>"><?php echo $row['address']; ?></textarea>
                          </div>
                          
                          
                        </div>
                        </div>
                        
                       <!--/BASIC INFO--> 
                        
                       
                        </div>
                        </div>
                        
                      <!--ATTACHMENT INFO--> 
                        <div class="box border purple">
                        <div class="box-title">
                            <h4><i class="fa fa-bars"></i><?php echo get_phrase('attachments');?></h4>
                        </div>
                        <div class="box-body big">
                            <div class="row">
                            <label class="col-md-3"><?php echo get_phrase('attach');?> <?php echo get_phrase('suppoting');?> <?php echo get_phrase('doc');?></label>
                            <div class="col-xs-6">
                            <select id="doctype" name="doctype" class="col-md-8 select2-offscreen">
                            <option value="photo"><?php echo get_phrase('photo');?></option>
                            <option value="cnic_front"><?php echo get_phrase('cnic');?> <?php echo get_phrase('front');?></option>
                            <option value="cnic_back"><?php echo get_phrase('cnic');?> <?php echo get_phrase('back');?></option>
                            <option value="cv"><?php echo get_phrase('cv');?></option>
                            <option value="others"><?php echo get_phrase('others');?> </option>
                            <option value="passport"><?php echo get_phrase('passport');?></option>
                             
                         	<option value="driving_licence"><?php echo get_phrase('driving_licence');?></option>    
                             
                             
                            </select>
                              </div>
                              <div class="col-md-2">
								<input type="file" class="form-control" name="docs" id="docs" style="display:none;"/>
                                              <a href="javascript:;" class="btn btn-primary start" onclick="document.getElementById('docs').click();"><i class="fa fa-arrow-circle-o-up"></i><span> <?php echo get_phrase('choose');?></span></a>				
							  </div>
                            </div>
                            
                            <div class="separator"></div>
                            
                            <div class="row">
                            <table class="table table-bordered display-grid multiple-files" id="tblData">
                            <thead>
                                <tr>
                                    <th><?php echo get_phrase('attachment');?> <?php echo get_phrase('title');?></th>
                                    <th><?php echo get_phrase('file');?> <?php echo get_phrase('name');?></th>
                                    <th class="primary-td"><?php echo get_phrase('action');?></th>
                                </tr>
                            </thead>
                            <tbody>
				<?php
                $docs = $this->crud_model->get_All_List('employee_attachments','emp_id',$row['id']);
				
				foreach($docs as $doc){
                ?>
				<tr>
                    <td><?php echo ucwords($doc['doctype']);?> </td>
                    <td><a target="_blank" href="<?php echo base_url();?>emp_doc/uploads/<?php echo $doc['doc_name'];?>"><?php echo $doc['doc_name'];?></a></td>
                    <td class="primary-td"><a href='javascript:;' onclick='deleteRow(this)' class='btn btn-danger'><i class='fa fa-times-circle'></i></a></td>
                </tr>
                <? }?>
                            </tbody>								
                        </table>
                            </div>
                        </div>
                      </div>
                      <!--/ATTACHMENT INFO-->
                      
                      <!--CONTACT INFO-->
                      
                      	<div class="box border blue">
                        <div class="box-title">
                            <h4><i class="fa fa-bars"></i><?php echo get_phrase('contact');?> <?php echo get_phrase('info');?></h4>
                        </div>
                        <div class="box-body big">
                            <div class="row">
                            <label class="col-md-2"><?php echo get_phrase('contact');?> <?php echo get_phrase('info');?></label>
                              <div class="col-xs-5">
                             <select id="contactinfo" name="contactinfo" class="col-md-8 select2-offscreen">
                            <option value="email"><?php echo get_phrase('email');?></option>
                            <option value="cell"><?php echo get_phrase('cell');?></option>
                             <option value="landline"><?php echo get_phrase('landline');?></option>
                                
                            </select>
                              </div>
                              <div class="col-md-3">
							<input type="text" class="form-control" id="contactdata" />
                            </div>
                            <div class="col-md-2">
                            <a href="javascript:;" id="addContactInfo" class="btn btn-purple tip" title="" data-original-title="<?php echo get_phrase('add');?> <?php echo get_phrase('contact');?>"><i class="fa fa-plus-circle"></i></a>
                            </div>
                            </div>
                            
                            <div class="separator"></div>
                            
                            <div class="row">
                            <table id="contactTable" class="table table-bordered display-grid multiple-files">
                            <thead>
                            <tr>
                                <th><?php echo get_phrase('contact');?></th>
                                <th><?php echo get_phrase('primary');?></th>
                                <th class="primary-td"><?php echo get_phrase('action');?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
							$contacts = $this->crud_model->get_All_List('employee_contacts','emp_id',$row['id']);
							
							foreach($contacts as $contact){
							?>
							<tr>
								<td><?php echo $contact['email'];?><br/>
                                <?php echo $contact['cell'];?><br/>
                                <?php echo $contact['landline'];?>
                                </td>
								<td><?php echo $contact['doc_name'];?></td>
								<td class="primary-td"><a href='javascript:;' onclick='deleteRow(this)' class='btn btn-danger'><i class='fa fa-times-circle'></i></a></td>
							</tr>
							<? }?>
                            </tbody>								
                        </table>
                            </div>
                        </div>
                      </div>
                        
                       <!--/CONTACT INFO-->
                       
                        <div class="form-actions clearfix">
                                  <div class="row">
                                     <div class="col-md-12">
                                        <div class="col-md-offset-3 col-md-9">
                                         <button type="button" class="btn btn-info"> <?php echo get_phrase('back');?> <i class="fa fa-arrow-circle-o-left"></i></button>
                                         <button type="button" class="btn btn-warning"> <?php echo get_phrase('reset');?> <i class="fa fa-refresh"></i></button>  
                                         <button type="submit" class="btn btn-primary"> <?php echo get_phrase('add');?> <i class="fa fa-plus"></i></button>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                        
            <?php echo form_close();?>
                     </div>
                                             
                                      <!--------/BASIC INFO TAB------->
                                      
                                              
                                    <!-----------OFFICIAL INFO TAB------>   
                                             
											 <div class="tab-pane fade" id="official_info">
												
                                                
                                           <div class="box border purple">
											<div class="box-title">
												<h4><i class="fa fa-bars"></i>Column sizing</h4>
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
												<div class="row">
                                                <label class="control-label col-md-3"><?php echo get_phrase('parent');?> <?php echo get_phrase('department');?><span class="required">*</span></label>
												  <div class="col-xs-2">
													<input type="text" class="form-control" placeholder=".col-xs-2">
												  </div>
												  <div class="col-xs-3">
													<input type="text" class="form-control" placeholder=".col-xs-3">
												  </div>
												  <div class="col-xs-4">
													<input type="text" class="form-control" placeholder=".col-xs-4">
												  </div>
												</div>
											</div>
										</div>
											 </div>
                                             
                                    <!---------/OFFICIAL INFO TAB------->
                                    
                                    
                                             
      								<!-----------USER ROLE TAB----------> 
                                       
											 <div class="tab-pane fade in" id="user_role">
												<div class="box border green" id="formWizard">
                        <div class="box-title">
                            <h4><i class="fa fa-bars"></i> <?php echo get_phrase('user')?> <?php echo get_phrase('role')?></h4>
                            
                        </div>
                        <div class="box-body form">
           
<?php echo form_open($roles.'/userroles/'.$formAction , array('id' => 'userRoleForm', 'class' => 'form-horizontal'));?>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('password');?> <span class="required">*</span></label>
                                           <div class="col-md-6">
                                              <input type="password" class="form-control tip" data-original-title="<?php echo get_phrase('password');?>" name="password" id="password" rel/>
                                              
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('confirm');?> <?php echo get_phrase('password');?> <span class="required">*</span></label>
                                           <div class="col-md-6">
                                              <input type="password" class="form-control" name="cnpassword" />
                                              
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('roles');?> <span class="required">*</span></label>
                                           <div class="col-md-6" id="themes">
                          			<span class="btn-group" data-toggle="buttons"> 
                            <?php
							$roles = $this->crud_model->getRolesList();
							$srole = $this->crud_model->value_by_id('users','email',$row['email'],'role');
							
							 foreach($roles as $role){
							?>
							<label class="btn btn-default <?php if($role['id']==$srole){echo "active";} ?>">
                            <span class="tick"></span>
                            <input type="radio" name="roles" value="<?php echo $role['id'];?>" class="form-control">
							<?php echo ucwords($role['name']);?></label>
							<?php }?>
                           </span>
                                              
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
											 </div>
                                             
                                    <!-----------/USER ROLE TAB---------->   
										  </div>
									   </div>
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