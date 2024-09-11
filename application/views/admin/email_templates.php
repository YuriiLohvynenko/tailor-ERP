  <?php foreach($edit_data as $rows):
  $row = $rows;
   endforeach;
   if($edit_data[0])
	{
	 $formAction = "do_update/".$row['id'];
	}
	else
	{
	 $formAction = "create/";
	}
   ?>
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
                                <a href=""><?php echo get_phrase('settings');?></a>
                            </li>
                            <li><?=ucwords($page_title)?></li>
                        </ul>
                        <!-- /BREADCRUMBS -->
                        <div class="clearfix">
                            <h3 class="content-title pull-left"><?=ucwords($page_title)?></h3>
                        </div>
                        <div class="description"><?php echo get_phrase('manage');?> <?=ucwords($page_title)?></div>
                    </div>
                </div>
            </div>
            <!-- /PAGE HEADER -->
            <!-- SAMPLE -->
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
           
            <form method="post" action="<?php echo base_url()?><?=$roles?>/manage_email_templates/<?php echo $formAction; ?>" class="form-horizontal validate" id="emailTemplates">
                            <div class="wizard-form">
                               <div class="wizard-content">
                                  <div class="tab-content">
                                     <div class="tab-pane active" id="account">
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('template');?><span class="required">*</span></label>
                                           <div class="col-md-4">
                                           
                                            <?php if($edit_data){?>
                                              <select id="select2" name="template" class="col-md-12 select2-offscreen">
                                              <?php foreach($this->crud_model->get_emailTemp_Type_List() as $opt):?>
                                              <optgroup label="<?php echo ucwords($opt['type'])?>">
                                                <?php foreach($this->crud_model->get_emailTemp_Title_List($opt['type']) as $cl): ?>
                                                <option <?php if($row['id']==$cl["id"]){echo "selected";} ?> value="<?php echo $cl["id"] ?>"><?php echo $cl["title"]; ?></option>
												<?php  endforeach; ?>
                                                </optgroup>
                                                <?php  endforeach; ?>
                                                </select>
                                                <?php }else{?>
                                                	<select id="select2" name="type" class="col-md-12 select2-offscreen">
		                                              <?php foreach($this->crud_model->get_emailTemp_Type_List() as $opt):?>
		                                              <option vale="<?php echo $opt['type']?>"><?php echo ucwords($opt['type'])?></option>
		                                                <?php  endforeach; ?>
		                                                </select>
                                                <?php }?>
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        <?php if(!$edit_data){?>
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('title');?> <span class="required">*</span></label>
                                           <div class="col-md-4">
                                              <input type="text" class="form-control" required name="title" value=""/>
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        <?php }?>
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('subject');?><span class="required">*</span></label>
                                           <div class="col-md-4">
                                              <input type="text" class="form-control" name="subject" value="<?php if($row['subject']){echo $row['subject'];}else{?>{siteName}!<?php }?>" />
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('status');?></label>
                                           <div class="col-md-4">
                                              <select id="status" name="status" class="col-md-12 select2-offscreen">
                             <option <?php if($row['status']=="active"){echo "selected";} ?> value="active">Active</option>
                                                <option <?php if($row['status']=="inactive"){echo "selected";} ?> value="inactive">Inactive</option>
                                               
                                                </select>
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                        <div class="box-body">
										<textarea class="ckeditor" name="editor1"><?php if($row['content']){echo stripslashes($row['content']);}else{;?>
											<table align="center" border="1" cellpadding="0" cellspacing="0" id="bodyTable">
													<tbody>
														<tr>
															<td><!-- BEGIN TEMPLATE // -->
															<table id="templateContainer">
																<tbody>
																	<tr>
																		<td><!-- BEGIN PREHEADER // -->
																		<table border="0" cellpadding="0" cellspacing="0" id="templatePreheader">
																			<tbody>
																				<tr>
																					<td>
																					<h3>{emailTitle}</h3>
																					</td>
																					<!-- *|IFNOT:ARCHIVE_PAGE|* -->
																					<td>
																					<h1 style="margin-left:480px; text-align:right">{systemLogo}</h1>
																					</td>
																					<!-- *|END:IF|* -->
																				</tr>
																			</tbody>
																		</table>
																		<!-- // END PREHEADER --></td>
																	</tr>
																	<tr>
																		<td><img id="headerImage" src="http://gallery.mailchimp.com/2425ea8ad3/images/header_placeholder_600px.png" /></td>
																	</tr>
																	<tr>
																		<td><!-- BEGIN BODY // -->
																		<table border="0" cellpadding="0" cellspacing="0" id="templateBody">
																			<tbody>
																				<tr>
																					<td>
																					<h1>Dear, {userName}</h1>
												
																					<h3>Below is the login information:</h3>
												
																					<div style="background:#c8ebf1; padding:5px;">UserEmail: {userEmail}<br />
																					Password: {password}.</div>
																					&nbsp;
												
																					<h2>Email Description</h2>
												
																					<h4>This notification has been sent to the email address associated with your account. For information on {systemName} privacy policy, This email message was auto-generated. Please do not respond.</h4>
																					</td>
																				</tr>
																			</tbody>
																		</table>
																		<!-- // END BODY --></td>
																	</tr>
																	<tr>
																		<td><!-- BEGIN FOOTER // -->
																		<table border="0" cellpadding="0" cellspacing="0" id="templateFooter">
																			<tbody>
																				<tr>
																					<td><a href="*|TWITTER:PROFILEURL|*">Follow on Twitter</a>&nbsp;&nbsp;&nbsp;<a href="*|FACEBOOK:PROFILEURL|*">Friend on Facebook</a>&nbsp;&nbsp;&nbsp;<a href="*|FORWARD|*">Forward to Friend</a>&nbsp;</td>
																				</tr>
																				<tr>
																					<td><em>&copy; {CURRENT_YEAR} {systemName}, All rights reserved.</em><br />
																					<br />
																					<strong>Our mailing address is:&nbsp;</strong>{systemEmail}</td>
																				</tr>
																				<tr>
																					<td><a href="*|UNSUB|*">unsubscribe from this list</a>&nbsp;&nbsp;&nbsp;<a href="*|UPDATE_PROFILE|*">update subscription preferences</a>&nbsp;</td>
																				</tr>
																			</tbody>
																		</table>
																		<!-- // END FOOTER --></td>
																	</tr>
																</tbody>
															</table>
															<!-- // END TEMPLATE --></td>
														</tr>
													</tbody>
												</table>
												<?php }?>
											
										</textarea>
									</div>
                                        
                                     </div>
                                  </div>
                               </div>
                             <table class="table table-bordered table-striped">
							<thead>
							  <tr>
								<th><?php echo get_phrase('type') ?></th>
								<th><?php echo get_phrase('legend') ?></th>
								<th><?php echo get_phrase('type') ?></th>
								<th><?php echo get_phrase('legend') ?></th>
								<th><?php echo get_phrase('type') ?></th>
								<th><?php echo get_phrase('legend') ?></th>
								<th><?php echo get_phrase('type') ?></th>
								<th><?php echo get_phrase('legend') ?></th>
							  </tr>
							</thead>
							<tbody>
								<tr>
								<th><?php echo get_phrase('current') ?> <?php echo get_phrase('year') ?></th>
								<td>{CURRENT_YEAR}</td>
								<th><?php echo get_phrase('today') ?> <?php echo get_phrase('date') ?></th>
								<td>{DATE}</td>
							  
								<th><?php echo get_phrase('system') ?> <?php echo get_phrase('name') ?></th>
								<td>{systemName}</td>
								<th><?php echo get_phrase('system') ?> <?php echo get_phrase('url') ?></th>
								<td>{systemUrl}</td>
							  </tr>	
							 <tr>
								<th><?php echo get_phrase('system') ?> <?php echo get_phrase('email') ?></th>
								<td>{systemEmail}</td>
								<th><?php echo get_phrase('system') ?> <?php echo get_phrase('address') ?></th>
								<td>{systemAddress}</td>
							  
								<th><?php echo get_phrase('user') ?> <?php echo get_phrase('name') ?></th>
								<td>{userName}</td>
								<th><?php echo get_phrase('user') ?> <?php echo get_phrase('email') ?></th>
								<td>{userEmail}</td>
							  </tr>
							  <tr>
								<th><?php echo get_phrase('user') ?> <?php echo get_phrase('password') ?></th>
								<td>{password}</td>
								<th><?php echo get_phrase('email') ?> <?php echo get_phrase('title') ?></th>
								<td>{emailTitle}</td>
							
								<th><?php echo get_phrase('Sub') ?> <?php echo get_phrase('order') ?> <?php echo get_phrase('no') ?></th>
								<td>{subOrderNo}</td>
								<th><?php echo get_phrase('ref_no') ?> </th>
								<td>{refNo}</td>
							  </tr>
							  <tr>
								<th><?php echo get_phrase('no') ?> <?php echo get_phrase('of') ?> <?php echo get_phrase('sub') ?> <?php echo get_phrase('order') ?></th>
								<td>{noofsuborder}</td>
								<th><?php echo get_phrase('item') ?> <?php echo get_phrase('name') ?></th>
								<td>{itemName}</td>
							  
								<th><?php echo get_phrase('total') ?> (<?php echo get_phrase('without') ?> <?php echo get_phrase('tax') ?>/<?php echo get_phrase('discount') ?>)</th>
								<td>{total}</td>
								<th><?php echo get_phrase('total') ?> (<?php echo get_phrase('with') ?> <?php echo get_phrase('tax') ?>/<?php echo get_phrase('discount') ?>)</th>
								<td>{totalPay}</td>
							  </tr>
							  <tr>
								<th><?php echo get_phrase('paid') ?> <?php echo get_phrase('amount') ?></th>
								<td>{paidAmount}</td>
								<th><?php echo get_phrase('due') ?> <?php echo get_phrase('amount') ?></th>
								<td>{dueAmount}</td>
							  
								<th><?php echo get_phrase('tax') ?> </th>
								<td>{tax}</td>
								<th><?php echo get_phrase('discount') ?> </th>
								<td>{discount}</td>
							  </tr>
							  <tr>
								<th><?php echo get_phrase('payment') ?> <?php echo get_phrase('type') ?></th>
								<td>{paymentType}</td>
								<th><?php echo get_phrase('ip') ?> <?php echo get_phrase('address') ?></th>
								<td>{ipAddress}</td>
								<th><?php echo get_phrase('login') ?> <?php echo get_phrase('location') ?></th>
								<td>{loginLocation}</td>
								<th><?php echo get_phrase('browser') ?></th>
								<td>{browser}</td>
							  </tr>
							  <tr>
								<th><?php echo get_phrase('os') ?> <?php echo get_phrase('plateform') ?></th>
								<td>{osPlateform}</td>
								<th><?php echo get_phrase('time') ?> <?php echo get_phrase('stamp') ?></th>
								<td>{timeStamp}</td>
								<th>&nbsp;</th>
								<td>&nbsp;</td>
								<th>&nbsp;</th>
								<td>&nbsp;</td>
							  </tr>
							  
							</tbody>
						  </table>
                               <div class="form-actions clearfix">
                                  <div class="row">
                                     <div class="col-md-12">
                                        <div class="col-md-offset-3 col-md-9">
                                           
                                         <button type="submit" class="btn btn-primary"> <?php echo get_phrase('save');?> <i class="fa fa-save"></i></button>
                                         <input type="hidden" name="act" value="smtp_update"  />
                                                                      
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                         </form>
                        </div>
                    </div>
                    
                    <!-- /BOX -->
                </div>
            </div>
            <!-- /SAMPLE -->
            <div class="footer-tools">
                <span class="go-top">
                    <i class="fa fa-chevron-up"></i> <?php echo get_phrase('top');?>
                </span>
            </div>
        </div><!-- /CONTENT-->
    </div>
</div>
