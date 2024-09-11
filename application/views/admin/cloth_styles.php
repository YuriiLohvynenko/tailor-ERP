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
                        <div class="description"><?php echo get_phrase('all_lists_shows_here')?></div>
                    </div>
                </div>
            </div>
            <!-- /PAGE HEADER -->
            <!-- EXPORT TABLE -->
            <div class="row">
                <div class="col-md-12">
               
                <?php if($message) { echo "<div class=\"alert alert-block alert-danger fade in\"><a href=\"#\" class=\"close\" aria-hidden=\"true\" data-dismiss=\"alert\">×</a><h4><i class=\"fa fa-times\"></i> ". get_phrase('oh_snap_error')."</h4><p>" . $message . "</p></div>"; } ?>
               <?php if($this->session->flashdata('flash_message')){ echo "<div class=\"alert alert-block alert-success fade in\"><a class=\"close\" data-dismiss=\"alert\" href=\"#\" aria-hidden=\"true\">×</a><h4><i class=\"fa fa-heart\"></i>". $this->session->flashdata('flash_message')."</h4></div>";
                 }?>
								<!-- BOX -->
								<div class="box border purple">
									<div class="box-title">
										<h4><i class="fa fa-table"></i><?php echo get_phrase($page_title)?></h4>
										<div class="tools hidden-xs">
	<a onclick="showAjaxModal('<?php echo base_url().'modal/popup/modal_cloth_styles';?>','<?php echo get_phrase('add')?> <?php echo get_phrase('cloth')?> <?php echo get_phrase('styles')?>');" rel="tooltip" data-placement="top" data-original-title="<?php echo get_phrase('add')?> <?php echo get_phrase('cloth')?> <?php echo get_phrase('styles')?>" class="tip config"><i class="fa fa-plus"></i></a>
												
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
                                    <table class="table table-bordered">
                                		<tbody>
                                         <tr>
                                    		<td>
                                        <a href="javascript:;" onclick="showAjaxModal('<?php echo base_url().'modal/popup/modal_cloth_styles';?>','<?php echo get_phrase('add')?> <?php echo get_phrase('cloth')?> <?php echo get_phrase('styles')?>');" rel="tooltip" data-placement="top" data-original-title="<?php echo get_phrase('add')?> <?php echo get_phrase('cloth')?> <?php echo get_phrase('styles')?>" class="tip btn btn-success"><i class="fa fa-pencil"></i> <?php echo get_phrase('add')?> <?php echo get_phrase('cloth')?> <?php echo get_phrase('styles')?></a>
                                    		</td>
                                		</tr>
        								</tbody>
                                        </table>
                                        
                                        
										<table id="datatable2" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th><?php echo get_phrase('s_no');?></th>
													<th><?php echo get_phrase('cloth');?> <?php echo get_phrase('style');?></th>
                                                    <th><?php echo get_phrase('status');?></th>
                                              		<th><?php echo get_phrase('action');?></th>      
												</tr>
											</thead>
											<tbody>
                                            <?php 
											$i=1;
											foreach($cloth_styles as $cloth_style):?>
												<tr class="gradeX">
													<td><?php echo $i ?></td>
													<td><?php echo $cloth_style['title'] ?></td>
                                                    <td><span class="label label-<?php if($cloth_style['status']=='active'){$class = 'success';$icon = 'unlock';$btn='';}else{$class = 'danger';$icon = 'lock';$btn='disabled';}echo $class;?> arrow-in arrow-in-right"><i class="fa fa-<?php echo $icon; ?>"></i> <?php echo ucwords($cloth_style['status']); ?></span></td>
                                                    <td>
                                                    <div class="btn-group dropdown">
											<button class="btn btn-primary">Action</button>
											<button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
											<span class="caret"></span>
											</button>
											<ul class="dropdown-menu">
											<li>
											<a href="javascript:;" onclick="showAjaxModal('<?php echo base_url().'modal/popup/modal_cloth_styles/edit_cloth_styles/'.$cloth_style['id'];?>','<?php echo get_phrase('edit')?> <?php echo get_phrase('cloth_style')?>');"><i class="fa fa-edit"></i> <?php echo get_phrase('edit')?> </a>
											</li>
                                            <li>
                                            <?php if($cloth_style['status']=='active'){?>
											<a href="javascript:;" onclick="confirm_bootbox('<?=base_url().$this->session->userdata('roles')?>/cloth_styles/inactive_cloth_styles/<?php echo $cloth_style['id'];?>');"><i class="fa fa-lock"></i>  <?php echo get_phrase('inactive');?> </a>
                                            <?php }else{?>
                                            <a href="javascript:;" onclick="confirm_bootbox('<?=base_url().$this->session->userdata('roles')?>/cloth_styles/active_cloth_styles/<?php echo $cloth_style['id'];?>');"><i class="fa fa-unlock"></i>  <?php echo get_phrase('active');?> </a>
                                            <?php }?>
											</li>
											<li>
											<a href="javascript:;" onclick="confirm_modal('<?=base_url().$this->session->userdata('roles')?>/cloth_styles/delete_cloth_styles/<?php echo $cloth_style['id'];?>');"><i class="fa fa-trash-o"></i>  <?php echo get_phrase('delete');?> </a>
											</li>
											</ul>
                                            
											</div>
                                            </td>
											</tr>
											<?php $i++;
											endforeach;?>	
											</tbody>
											<tfoot>
												<tr>
													<th><?php echo get_phrase('s_no');?></th>
													<th><?php echo get_phrase('cloth');?> <?php echo get_phrase('style');?></th>
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