<?php
foreach ($edit_data as $r):
$row = $r;
endforeach;
$cond = ($patterns->gender) ? $patterns->gender : $row['gender'];
$cond_item = ($patterns->item) ? $patterns->item : $row['item'];
$cond_pattern = ($patterns->pattern) ? $patterns->pattern : $row['pattern'];

if($edit_data[0])
{
	$formAction = "do_update/".$row['id'];
}
else
{
	$formAction = "insert/";
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
		   <?php if($this->session->flashdata('flash_message')){ echo "<div class=\"alert alert-block alert-success fade in\"><a class=\"close\" data-dismiss=\"alert\" href=\"#\" aria-hidden=\"true\">×</a><h4><i class=\"fa fa-heart\"></i>". $this->session->flashdata('flash_message')."</h4></div>";
             }?>
            <?php if(!$showpt):?>
            <?php if($message) { echo "<div class=\"alert alert-block alert-danger fade in\"><a href=\"#\" class=\"close\" aria-hidden=\"true\" data-dismiss=\"alert\">×</a><h4><i class=\"fa fa-times\"></i> ". get_phrase('oh_snap_error')."</h4><p>" . $message . "</p></div>"; } ?>
            <div class="row">
                <div class="col-md-12">
                    <!-- BOX -->
                    <div class="box border red" id="formWizard">
                        <div class="box-title">
                            <h4><i class="fa fa-bars"></i><?php echo get_phrase('add');?> <?=ucwords($page_title)?></h4>
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
           
           
<?php echo form_open('admin/style/'.$formAction , array('id' => 'styleForm', 'class' => 'form-horizontal'));?>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('gender');?> <span class="required">*</span></label>
                                           	<div class="col-md-9" id="themes">
                                              <span class="btn-group" data-toggle="buttons">
												<label class="btn btn-default <?php if($cond=='male'){echo "active";}; ?>" disabled><span class="tick"></span><input type="radio" name="gender" value="male" <?php if($cond=='male'){echo "checked";}; ?>><?php echo get_phrase('male');?> </label>
                                                <label class="btn btn-default <?php if($cond=='female'){echo "active";}; ?> disabled"><span class="tick"></span><input type="radio" name="gender" value="female" <?php if($cond=='female'){echo "checked";}; ?>><?php echo get_phrase('female');?> </label>
											</span>
                                             <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"> <?php echo get_phrase('item');?> <span class="required">*</span></label>
                                           <div class="col-md-3">
                                              <input type="text" class="form-control input-sm" name="item" value="<?php echo $cond_item; ?>" readonly/>
                                              
                                              <span class="error-span"></span>
                                              
                                           </div>
                                           <button type="button" onclick="showAjaxModal('<?php echo base_url().'modal/popup/add_stitching';?>','<?php echo get_phrase('add')?> <?php echo get_phrase('stitching')?>');" rel="tooltip" class="btn btn-success btn-xs tip config" data-placement="top" data-original-title="<?php echo get_phrase('add')?> <?php echo get_phrase('item')?>" ><i class="fa fa-plus"></i> <?php echo get_phrase('add')?> <?php echo get_phrase('item')?></button>
                                        </div>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"> <?php echo get_phrase('pattern');?> <span class="required">*</span></label>
                                           <div class="col-md-3">
                                              <input type="text" class="form-control input-sm" name="pattern" value="<?php echo $cond_pattern; ?>" readonly/>
                                              
                                              <span class="error-span"></span>
                                              
                                           </div>
                                           <a href="<?php echo base_url().$this->session->userdata('roles').'/pattern/add/'.$patterns->item_id;?>" rel="tooltip" class="btn btn-success btn-xs tip config" data-placement="top" data-original-title="<?php echo get_phrase('add')?> <?php echo get_phrase('pattern')?>" ><i class="fa fa-plus"></i> <?php echo get_phrase('add')?> <?php echo get_phrase('pattern')?></a>
                                        </div>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"> <?php echo get_phrase('style');?> <span class="required">*</span></label>
                                           <div class="col-md-3">
                                              <input type="text" class="form-control" name="style" value="<?php echo $row['style']; ?>" />
                                              
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                        
                                        
                               <div class="form-actions clearfix">
                                  <div class="row">
                                     <div class="col-md-12">
                                        <div class="col-md-offset-3 col-md-9">
                                         <button type="submit" class="btn btn-primary"> <?php echo get_phrase('save');?> <i class="fa fa-save"></i></button>
                                         <input type="hidden" name="item_id" value="<?php echo $patterns->item_id; ?>" />
                                         <input type="hidden" name="pattern_id" value="<?php echo $patterns->id; ?>" />
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
            <?php endif;?>
            <!-- EXPORT TABLE -->
            <div class="row">
                <div class="col-md-12">
								<!-- BOX -->
								<div class="box border purple">
									<div class="box-title">
										<h4><i class="fa fa-table"></i><?php echo get_phrase($page_title)?></h4>
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
									<div class="box-body">
										<table id="datatable2" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th><?php echo get_phrase('s_no');?></th>
													<th><?php echo get_phrase('gender');?></th>
													<th><?php echo get_phrase('item');?></th>
                                                    <th><?php echo get_phrase('pattern');?></th>
                                                    <th><?php echo get_phrase('style');?></th>
                                                    <th><?php echo get_phrase('status');?></th>
                                              		<th><?php echo get_phrase('action');?></th>      
												</tr>
											</thead>
											<tbody>
                                            <?php 
											$i=1;
											//echo "<pre>";
											//print_r($patterns);
											foreach($styles as $style):?>
												<tr class="gradeX">
													<td><?php echo $i ?></td>
													<td><?php echo ucwords($style['gender']); ?></td>
													<td><?php echo $style['item'] ?></td>
                                                    <td><?php echo $style['pattern'] ?></td>
                                                    <td><?php echo $style['style'] ?></td>
                                                    <td><span class="label label-<?php if($style['status']=='active'){$class = 'success';$icon = 'unlock';$btn='';}else{$class = 'danger';$icon = 'lock';$btn='disabled';}echo $class;?> arrow-in arrow-in-right"><i class="fa fa-<?php echo $icon; ?>"></i> <?php echo ucwords($style['status']); ?></span></td>
                                                    <td>
                                                    <div class="btn-group dropdown">
											<button class="btn btn-primary">Action</button>
											<button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
											<span class="caret"></span>
											</button>
											<ul class="dropdown-menu">
											<li>
											<a href="<?php echo base_url().$this->session->userdata('roles').'/style/edit/'.$style['pattern_id'].'/'.$style['id'];?>"><i class="fa fa-edit"></i> <?php echo get_phrase('edit')?> </a>
											</li>
                                            <li>
                                            <?php if($style['status']=='active'){?>
											<a href="javascript:;" onclick="confirm_bootbox('<?=base_url().$this->session->userdata('roles')?>/style/inactive_style/<?php echo $style['id'];?>');"><i class="fa fa-lock"></i>  <?php echo get_phrase('inactive');?> </a>
                                            <?php }else{?>
                                            <a href="javascript:;" onclick="confirm_bootbox('<?=base_url().$this->session->userdata('roles')?>/style/active_style/<?php echo $style['id'];?>');"><i class="fa fa-unlock"></i>  <?php echo get_phrase('active');?> </a>
                                            <?php }?>
											</li>
											<!--<li>
											<a href="javascript:;" onclick="confirm_modal('<?=base_url().$this->session->userdata('roles')?>/patterns/delete_patterns/<?php echo $pattern['id'];?>');"><i class="fa fa-trash-o"></i>  <?php echo get_phrase('delete');?> </a>
											</li>-->
											</ul>
                                            
											</div>
                                            		<a href="javascript:;" <?php echo $btn;?> onclick="confirm_bootbox('<?php echo base_url().$this->session->userdata('roles')?>/measurement/add/<?php echo $style['id'];?>');" rel="tooltip" data-placement="top" data-original-title="<?php echo get_phrase('add')?> <?php echo get_phrase('measurement')?>" class="tip btn btn-success"><i class="fa fa-plus"></i> <?php echo get_phrase('add')?> <?php echo get_phrase('measurement')?></a>
                                            		</td>
												</tr>
											<?php $i++;
											endforeach;?>	
											</tbody>
											<tfoot>
												<tr>
													<th><?php echo get_phrase('s_no');?></th>
													<th><?php echo get_phrase('gender');?></th>
													<th><?php echo get_phrase('item');?></th>
                                                    <th><?php echo get_phrase('pattern');?></th>
                                                    <th><?php echo get_phrase('style');?></th>
                                                    <th><?php echo get_phrase('status');?></th>
                                              		<th><?php echo get_phrase('action');?></th> 
												</tr>
											</tfoot>
										</table>
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
$(document).ready(function() {
$('#styleForm').validate(
             {
              rules: {
                gender: {
                  required: true},
				item: {
                  required: true
                },
				pattern: {
                  required: true,
				  minlength: 3
                },
				style: {
                  required: true,
				  minlength: 3
                },
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