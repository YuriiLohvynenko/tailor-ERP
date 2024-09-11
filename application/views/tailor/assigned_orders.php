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
                                              		<th ><?php echo get_phrase('action');?></th>
												</tr>
											</thead>
											<tbody>
                                            <?php 
											$i=1;
											//echo "<pre>";
											//print_r($purchases);
											foreach($suborders as $suborder):
											$order=$this->crud_model->get_rowValue_by_id('orders',$suborder['order_id']);
											?>
												<tr class="gradeX">
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $order->reference_no?></td>
                                                <td><?php echo $order->customer_name; ?></td>
                                                <td><?php echo ucwords($order->item_name); ?></td>
                                                 <td><?php echo ucwords($order->pattern_name); ?></td>
                                                 <td><?php echo ucwords($order->style_name); ?></td>
      											<td><?php echo $order->date; ?></td>
                                                <td><?php echo $order->trial_date; ?></td>
                                                <td><?php echo $order->delivery_date; ?></td>
                                             <td class="center hidden-xs">
                                                 <div class="btn-group dropdown" style="margin-bottom:5px">
                                        <button class="btn btn-primary"><?php echo get_phrase('action')?></button>
                                        <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                        <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" style="margin-left: -75px;">
                                        <li>
                                         <a onclick="showAjaxModal('<?php echo base_url().'modal/popup/modal_suborder/suborder_detail/'.$suborder['id'];?>',' <?php echo get_phrase('suborder')?> <?php echo get_phrase('detail')?>');" class="config"><i class="fa fa-eye"></i> <?php echo get_phrase('suborder')?> <?php echo get_phrase('detail')?></a>
                                        </li>
                                       
                                        <li>
                                        <a onclick="showAjaxModal('<?php echo base_url().'modal/popup/modal_suborder/view_measurement/'.$suborder['id'];?>','<?php echo get_phrase('view')?> <?php echo get_phrase('measurement')?>');" class="config"><i class="fa fa-eye"></i> <?php echo get_phrase('view')?> <?php echo get_phrase('measurement')?></a>
                                        </li>
                                       
                                        </ul>
                                        </div>
										<!--<a href="<?php echo base_url().$roles.'/orders/view_suborder/'.$suborder['id'];?>" class="btn btn-success"><?php echo get_phrase('sub');?> <?php echo get_phrase('orders');?></a>-->
										</td>
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
