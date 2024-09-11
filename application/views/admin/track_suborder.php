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
                <div class="alert alert-block alert-danger fade in">
                <a class="close" data-dismiss="alert" href="#" aria-hidden="true">×</a>
                <h4><i class="fa fa-times"></i> <?php echo $this->session->flashdata('flash_message'); ?></h4>
                </div>
                <?php }?>
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
													<th><?php echo get_phrase('sub');?> <?php echo get_phrase('order');?> <?php echo get_phrase('no.');?></th>
													<th ><?php echo get_phrase('customer');?> <?php echo get_phrase('name');?></th>
                                                    <th ><?php echo get_phrase('item');?> <?php echo get_phrase('name');?></th>
                                                    <th ><?php echo get_phrase('order');?> <?php echo get_phrase('date');?></th>
                                                    <th ><?php echo get_phrase('deliver');?> <?php echo get_phrase('date');?></th>
                                 					<th ><?php echo get_phrase('trial');?> <?php echo get_phrase('date');?></th>
												
                                                    
													<th ><?php echo get_phrase('status');?> </th>
			                                        
                                              		<th ><?php echo get_phrase('action');?></th>
												</tr>
											</thead>
											<tbody>
                                            <?php 
											$i=1;
											
											foreach($suborders as $order):?>
												<tr class="gradeX">
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $order['id'];?></td>
                                                <td><?php echo $orders->customer_name; ?></td>
                                                <td><?php echo ucwords($orders->item_name); ?></td>
                                                <td><?php echo ucwords($orders->date); ?></td>
												<td><?php echo ucwords($orders->delivery_date); ?></td>
                                                <td><?php echo ucwords($orders->trial_date); ?></td>
                                                <td>
												<?php if($order['status']=='assigned'){?>
											<a href="javascript:;" onclick="confirm_bootbox('<?=base_url().$this->session->userdata('roles')?>/track_order/inprocess_status/<?php echo $order['id'];?>/<?php echo $order['order_id'];?>/<?php echo $orders->customer_id; ?>');"><?php echo get_phrase('assigned');?></a>
                                            <?php }elseif($order['status']=='inprocess'){?>
                                            <a href="javascript:;" onclick="confirm_bootbox('<?=base_url().$this->session->userdata('roles')?>/track_order/completed_status/<?php echo $order['id'];?>/<?php echo $order['order_id'];?>/<?php echo $orders->customer_id; ?>');"> <?php echo get_phrase('proceed');?> <?php echo get_phrase('for');?> <?php echo get_phrase('stitch');?></a>
                                            <?php }elseif($order['status']=='completed'){?>
                                            <a href="javascript:;" onclick="confirm_bootbox('<?=base_url().$this->session->userdata('roles')?>/track_order/to_deliver/<?php echo $order['id'];?>/<?php echo $order['order_id'];?>/<?php echo $orders->customer_id; ?>');"> <?php echo get_phrase('ready');?> <?php echo get_phrase('from');?> <?php echo get_phrase('worker');?> </a>
											 <?php }elseif($order['status']=='to_deliver'){?>
                                            <a href="javascript:;" onclick="confirm_bootbox('<?=base_url().$this->session->userdata('roles')?>/track_order/delivered_status/<?php echo $order['id'];?>/<?php echo $order['order_id'];?>/<?php echo $orders->customer_id; ?>');"> <?php echo get_phrase('ready');?> <?php echo get_phrase('to');?> <?php echo get_phrase('deliver');?> </a>
											<?php }else{
												?>
			<span class="label label-<?php $class = 'success'; $status = 'delivered'; echo  $class; ?> arrow-in arrow-in-right"><i class="fa fa-star"></i> <?php echo ucwords(get_phrase($status)); ?></span>
											<?php } ?>
											
											</td>
												 
                                             <td >
											 <a onclick="showAjaxModal('<?php echo base_url().'modal/popup/modal_suborder/suborder_detail/'.$order['id']?>','<?php echo get_phrase('detail');?>');"  class="btn btn-success"><?php echo get_phrase('details');?></a>
											 
										</td>
												</tr>
											<?php $i++;
											endforeach;?>	
											</tbody>
                                            <tfoot>
											<tr>
													<th><?php echo get_phrase('s_no');?></th>
													<th><?php echo get_phrase('sub');?> <?php echo get_phrase('order');?> <?php echo get_phrase('no.');?></th>
													<th ><?php echo get_phrase('customer');?> <?php echo get_phrase('name');?></th>
                                                    <th ><?php echo get_phrase('item');?> <?php echo get_phrase('name');?></th>
                                                    <th ><?php echo get_phrase('order');?> <?php echo get_phrase('date');?></th>
                                                    <th ><?php echo get_phrase('deliver');?> <?php echo get_phrase('date');?></th>
                                 					<th ><?php echo get_phrase('trial');?> <?php echo get_phrase('date');?></th>
													<th ><?php echo get_phrase('status');?> </th>
                                              		<th ><?php echo get_phrase('action');?></th>
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

