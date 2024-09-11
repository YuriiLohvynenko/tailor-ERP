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
                                <a href=""><?php echo get_phrase('order');?></a>
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
								<div class="box border blue">
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
													<th><?php echo get_phrase('ref_no');?></th>
                                 					<th ><?php echo get_phrase('customer');?> </th>
                                                    <th ><?php echo get_phrase('item');?> </th>
                                                    <th ><?php echo get_phrase('pattern');?> </th>
                                                    <th ><?php echo get_phrase('style');?> </th>
                                                    <th ><?php echo get_phrase('date');?></th>
                                                    <th ><?php echo get_phrase('trial');?> </th>
													<th ><?php echo get_phrase('delivery');?> </th>
													<th ><?php echo get_phrase('status');?> </th>
                                              	
												</tr>
											</thead>
											<tbody>
                                            <?php 
											$i=1;
											
											foreach($suborders as $suborder):
											
											?>
												<tr class="gradeX">
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $suborder->reference_no?></td>
                                                <td><?php echo $suborder->customer_name; ?></td>
                                                <td><?php echo ucwords($suborder->item_name); ?></td>
                                                 <td><?php echo ucwords($suborder->pattern_name); ?></td>
                                                 <td><?php echo ucwords($suborder->style_name); ?></td>
      											<td><?php echo $suborder->date; ?></td>
                                                <td><?php echo $suborder->trial_date; ?></td>
                                                <td><?php echo $suborder->delivery_date; ?></td>
                                                <td><?php if($suborder->status=='to_deliver'){?>
                                            <span class="label label-info"> <?php echo get_phrase('ready');?> <?php echo get_phrase('to');?> <?php echo get_phrase('deliver');?> </span>
											<?php }	?></td>
                                             
												</tr>
											<?php $i++;
											endforeach;?>	
											</tbody>
                                            <tfoot>
											<tr>
													<th><?php echo get_phrase('s_no');?></th>
													<th><?php echo get_phrase('ref_no');?></th>
                                 					<th ><?php echo get_phrase('customer');?> </th>
                                                    <th ><?php echo get_phrase('item');?> </th>
                                                    <th ><?php echo get_phrase('pattern');?> </th>
                                                    <th ><?php echo get_phrase('style');?> </th>
                                                    <th ><?php echo get_phrase('date');?></th>
                                                    <th ><?php echo get_phrase('trial');?> </th>
													<th ><?php echo get_phrase('delivery');?> </th>
														<th ><?php echo get_phrase('status');?> </th>
                                              		
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
