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
                <form method="post" action="<?php echo base_url()?><?=$roles?>/clear_logs" class="form-horizontal validate">
                	<div class="form-group">
                       <label class="control-label">&nbsp;</label>
                       <div class="col-md-4">
                          <button class="btn btn-danger" type="submit"><i class="fa fa-trash-o"></i> <?php echo get_phrase("clear") ?> <?php echo get_phrase("logs"); ?></button>
                       </div>
                    </div>
                	
                </form>
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
													<th><?php echo get_phrase('date');?></th>
                                 					<th ><?php echo get_phrase('name');?> </th>
                                                    <th ><?php echo get_phrase('ip');?></th>
                                                    <th ><?php echo get_phrase('location');?> </th>
													<th ><?php echo get_phrase('browser');?> </th>
                                                    <th ><?php echo get_phrase('os');?> <?php echo get_phrase('plateform');?></th>                                          
												</tr>
											</thead>
											<tbody>
                                            <?php 
											$i=1;
											//echo "<pre>";
											//print_r($purchases);
											foreach($logs as $log):?>
												<tr class="gradeX">
                                                <td><?php echo $i ?></td>
                                                <td><?php echo date("d M Y h:i:s A",$log->timestamp);?></td>
                                                <td><?php echo ucwords($this->crud_model->value_by_id("users","user_id",$log->user_id,"name")); ?></td>
      											<td><?php echo $log->ip; ?></td>
                                                <td><?php echo $log->location; ?></td>
                                                <td><?php echo $log->user_agent; ?></td>
                                                <td><?php echo $log->os_plateform; ?></td>
                                                
												</tr>
											<?php $i++;
											endforeach;?>	
											</tbody>
                                            <tfoot>
											<tr>
													<tr>
													<th><?php echo get_phrase('s_no');?></th>
													<th><?php echo get_phrase('date');?></th>
                                 					<th ><?php echo get_phrase('name');?> </th>
                                                    <th ><?php echo get_phrase('ip');?></th>
                                                    <th ><?php echo get_phrase('location');?> </th>
													<th ><?php echo get_phrase('browser');?> </th>
                                                    <th ><?php echo get_phrase('os');?> <?php echo get_phrase('plateform');?></th>                                          
												</tr>    
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
