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
                                <a href=""><?php echo get_phrase('customers');?></a>
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
                        <?php echo form_open($roles.'/customers/'.$formAction , array('id' => 'employeesForm', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data'));?>
							<div class="col-md-12">
								<div class="row">
									
									<div class="col-md-6">
										
										<div class="box border primary">
											<div class="box-title">
												<h4><i class="fa fa-user"></i><?php echo get_phrase('personal');?> <?php echo get_phrase('details');?> </h4>
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
													<label class="col-sm-4 control-label"><?php echo get_phrase('first');?> <?php echo get_phrase('name');?><span class="required">*</span></label>
													<div class="col-sm-8">
													  <input class="form-control" name="fname" type="text" value="<?php echo $row['fname']; ?>" placeholder="<?php echo get_phrase('first');?> <?php echo get_phrase('name');?>">
													</div>
												  </div>
                                                  
												  <div class="form-group">
													<label class="col-sm-4 control-label"><?php echo get_phrase('last');?> <?php echo get_phrase('name');?><span class="required">*</span></label>
													<div class="col-sm-8">
													  <input class="form-control" name="lname" type="text" value="<?php echo $row['lname']; ?>" placeholder="<?php echo get_phrase('last');?> <?php echo get_phrase('name');?>">
													</div>
												  </div>
                                                  
                                                 <div class="form-group">
                                                 <label class="col-md-4 control-label"><?php echo get_phrase('gender');?> <span class="required">*</span></label> 
                                                 <div class="col-md-8"> 
                                                     <label class="radio-inline"> <input type="radio" class="uniform" name="gender" <?php if($row['gender']=='male'){echo 'checked';}; ?> value="male"> <?php echo get_phrase('male');?> </label> 
                                                     <label class="radio-inline"> <input type="radio" class="uniform" name="gender" <?php if($row['gender']=='female'){echo 'checked';}; ?> value="female"> <?php echo get_phrase('female');?> </label>
                                                     <span class="error-span"></span>
                                                 </div>
                                              </div>
                                                  
                                                  <div class="form-group">
													<label class="col-sm-4 control-label"><?php echo get_phrase('company');?> <?php echo get_phrase('name');?><span class="required">*</span></label>
													<div class="col-sm-8">
													  <input class="form-control" name="company" type="text" value="<?php echo $row['company']; ?>" placeholder="<?php echo get_phrase('company');?> <?php echo get_phrase('name');?>">
													</div>
												  </div>
                                                  
												 
                                                  <div class="form-group">
													<label class="col-sm-4 control-label"><?php echo get_phrase('photo');?> </label>
													<div class="col-sm-8">
													  <div class="list-group">
														  
                                                          <li class="list-group-item zero-padding">
                                                          <?php if($row['image']){$img = $row['image'];}else{$img = "user.png";} ?>
															<img alt="" class="img-responsive" src="<?php echo base_url();?>uploads/users_image/<?php echo $img;?>">
														  </li>
                                                          <li class="list-group-item">
															<input type="file" name="userpic" />
														  </li>
														 
														</div>
													</div>
												  </div>
											</div>
										</div>
									</div>
                                    <div class="col-md-6">
                                        <div class="box border pink">
											<div class="box-title">
												<h4><i class="fa fa-phone"></i><?php echo get_phrase('contact');?> <?php echo get_phrase('details');?></h4>
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
													<label class="col-sm-3 control-label"><?php echo get_phrase('address');?><span class="required">*</span></label>
													<div class="col-sm-9">
													  <textarea  class="form-control" name="address" placeholder="<?php echo get_phrase('address');?>"><?php echo $row['address']; ?></textarea>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-3 control-label"><?php echo get_phrase('city');?><span class="required">*</span></label>
													<div class="col-sm-9">
														<input  class="form-control" type="text" name="city" value="<?php echo $row['city']; ?>" placeholder="<?php echo get_phrase('city');?> ">
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-3 control-label"><?php echo get_phrase('country');?><span class="required">*</span></label>
													<div class="col-sm-9">
														<select id="country" name="country" class="col-md-12 select2-offscreen">
                            <option value=""></option>
                            <?php foreach($countries as $c => $country){?>
                            <option <?php if($row['country']==$country['id']){echo "selected";} ?> value="<?php echo $country['id']; ?>"><?php echo $country['name']; ?></option>
                            <?php }?>
                           
                            </select>
                            						<span id="loading"></span>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-3 control-label"><?php echo get_phrase('state');?><span class="required">*</span></label>
													<div class="col-sm-9" id="state">
														<select id="province" name="province" class="col-md-12 select2-offscreen">
                            <?php $states = $this->crud_model->get_State_List($row['country']); ?>
                            <?php foreach($states as $c => $state){?>
                            <option <?php if($row['state']==$state['id']){echo "selected";} ?> value="<?php echo $state['id']; ?>"><?php echo $state['name']; ?></option>
                            <?php }?>
                            
                            </select>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-3 control-label"><?php echo get_phrase('postal');?> <?php echo get_phrase('code');?><span class="required">*</span></label>
													<div class="col-sm-9">
														<input  class="form-control" type="text" name="postal" maxlength="6" placeholder="<?php echo get_phrase('postal');?> <?php echo get_phrase('code');?> " value="<?php echo $row['postal_code']; ?>">														
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-3 control-label"><?php echo get_phrase('mobile');?><span class="required">*</span></label>
													<div class="col-sm-9">
														<input type="text" class="form-control" name="mobile" placeholder="<?php echo get_phrase('mobile');?>" value="<?php echo $row['mobile']; ?>" >														
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-3 control-label"><?php echo get_phrase('phone');?></label>
													<div class="col-sm-9">
														<input type="text" class="form-control" name="phone" placeholder="<?php echo get_phrase('phone');?>" value="<?php echo $row['phone']; ?>" >														
													</div>
												  </div>
                                                  
                                                  <div class="form-group">
													<label class="col-sm-3 control-label"><?php echo get_phrase('email');?><span class="required">*</span></label>
													<div class="col-sm-9">
														<input type="text" class="form-control" name="email" placeholder="<?php echo get_phrase('email');?>" value="<?php echo $row['email']; ?>" >														
													</div>
												  </div>
                                                  
                                                  <div class="form-group">
													<label class="col-sm-3 control-label"><?php echo get_phrase('password');?><!--<span class="required">*</span>--></label>
													<div class="col-sm-9">
														<input type="password" class="form-control" name="password" placeholder="<?php echo get_phrase('password');?>"  />														
													</div>
												  </div>
											</div>
										</div>
									</div>
								</div>
								
							</div>
                            
                            <div class="form-actions clearfix">
                                  <div class="row">
                                     <div class="col-md-12">
                                        <button type="submit" class="btn btn-block btn-info"> <?php echo get_phrase('save');?> <i class="fa fa-save"></i></button>
                                     </div>
                                  </div>
                               </div>
                        <?php echo form_close();?>
						</div>
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