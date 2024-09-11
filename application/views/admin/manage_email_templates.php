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
                 <?php if($this->session->flashdata('flash_message')){ ?>
                <div class="alert alert-block alert-success fade in">
                <a class="close" data-dismiss="alert" href="#" aria-hidden="true">×</a>
                <h4><i class="fa fa-heart"></i> <?php echo $this->session->flashdata('flash_message'); ?></h4>
                </div>
                
                <?php }?>
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
										<table class="table table-bordered">
						                   <tbody><tr>
						                                    <td>                                   
						                                        <a href="<?php echo base_url()?><?php echo $roles; ?>/new_template" class="btn btn-info"><i class="fa fa-plus"></i> <?php echo get_phrase('add').' '.get_phrase('new').' '.get_phrase('template'); ?></a>
						                                    </td>
						                                </tr>
						            </tbody></table>
                                    <table id="datatable2" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th><?php echo get_phrase('s_no');?></th>
													<th><?php echo get_phrase('name');?></th>
													<th class="hidden-xs"><?php echo get_phrase('for');?></th>
													
													<!--<th class="hidden-xs"><?php echo get_phrase('email');?></th>-->
                                                    <th class="hidden-xs"><?php echo get_phrase('status');?></th>
                                              		<th class="hidden-xs"><?php echo get_phrase('action');?></th>      
												</tr>
											</thead>
											<tbody>
                                            <?php 
											$i=1;
											foreach($templates as $template):?>
												<tr class="gradeX">
													<td><?php echo $i ?></td>
													<td><?php echo $template['title'] ?></td>
													<td class="hidden-xs"><?php echo $template['type']; ?></td>
													<!--<td class="center hidden-xs"><?php echo $template['email'] ?></td>-->
                                                    <td class="center hidden-xs">
                                                    <?php if($template['status']=='active'){$class='success';$icon = 'unlock';}else{$class='danger';$icon = 'lock';} ?>
                                                    <span class="label label-<?php echo $class;?> arrow-in arrow-in-right"><i class="fa fa-<?php echo $icon;?>"></i> <?php echo ucwords($template['status']); ?></span></td>
                                                    <td class="center hidden-xs">
                                                    <div class="btn-group dropdown" style="margin-bottom:5px">
											<button class="btn btn-primary">Action</button>
											<button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
											<span class="caret"></span>
											</button>
											<ul class="dropdown-menu" style="margin-left: -75px;">
											<li>
											<a href="<?php echo base_url().$this->session->userdata('roles').'/manage_email_templates/edit_email_templates/'.$template['id'];?>"><i class="fa fa-edit"></i> <?php echo get_phrase('edit')?> </a>
											</li>
											<li>
                                            <?php if($template['status']=='active'){?>
											<a href="javascript:;" onclick="confirm_bootbox('<?=base_url().$this->session->userdata('roles')?>/manage_email_templates/inactive_email_templates/<?php echo $template['id'];?>');"><i class="fa fa-lock"></i>  <?php echo get_phrase('inactive');?> </a>
                                            <?php }else{?>
                                            <a href="javascript:;" onclick="confirm_bootbox('<?=base_url().$this->session->userdata('roles')?>/manage_email_templates/active_email_templates/<?php echo $template['id'];?>');"><i class="fa fa-unlock"></i>  <?php echo get_phrase('active');?> </a>
                                            <?php }?>
											</li>
											</ul>
											</div></td>
												</tr>
											<?php $i++;
											endforeach;?>	
											</tbody>
											<tfoot>
												<tr>
													<th><?php echo get_phrase('s_no');?></th>
													<th><?php echo get_phrase('name');?></th>
													<th class="hidden-xs"><?php echo get_phrase('for');?></th>
													
													<!--<th class="hidden-xs"><?php echo get_phrase('email');?></th>-->
                                                    <th class="hidden-xs"><?php echo get_phrase('status');?></th>
                                              		<th class="hidden-xs"><?php echo get_phrase('action');?></th>      
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