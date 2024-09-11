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
													<th ><?php echo get_phrase('customer');?></th>
                                                    <th ><?php echo get_phrase('item');?></th>
                                                    <th ><?php echo get_phrase('pattern');?></th>
                                                    <th ><?php echo get_phrase('style');?> </th>
                                 					<th ><?php echo get_phrase('cloth');?> <?php echo get_phrase('style');?></th>
													<th ><?php echo get_phrase('cloth');?> <?php echo get_phrase('type');?></th>
                                                    <th ><?php echo get_phrase('unit');?> <?php echo get_phrase('price');?></th>
                                                    <th > <?php echo get_phrase('amount');?></th>
                                                    <th ><?php echo get_phrase('total');?> </th>
                                                    
													<th ><?php echo get_phrase('status');?> </th>
			                                        
												</tr>
											</thead>
											<tbody>
											
                                           <?php
										   /*-----NEW WORK-------*/
											$i=1;
											foreach($orders as $order):
												?>
												<tr class="gradeX">
                                                <td><?php echo "$i"; ?></td>
                                                <td><?php echo $order['reference_no']?></td>
                                                <td><?php echo $order['customer_name']; ?></td>
                                                <td><?php echo $order['item_name']; ?></td>
                                                <td><?php echo $order['pattern_name']; ?></td>
                                                <td><?php echo $order['style_name']; ?></td>
                                                <td><?php echo $order['cloth_style']; ?></td>
      											<td><?php echo $order['cloth_type']; ?></td>
                                                <td><?php echo $order['cloth_unit_price']; ?></td>
                                                <td><?php echo $order['amount']; ?></td>
                                                <td><?php echo $order['sub_order_price']; ?> </td>
                                                
                                                <td><span class="label label-<?php if($order['status']=='inprocess'){$class = 'primary';}echo $class;?> arrow-in arrow-in-right"><i class="fa fa-<?php echo $icon; ?>"></i> <?php echo ucwords($order['status']); ?></span></td>												 
												</tr>
											<?php $i++;
											/*-----NEW WORK-------*/
											endforeach;?>	
											</tbody>
                                            <tfoot>
											<tr>
											<th><?php echo get_phrase('s_no');?></th>
                                            <th><?php echo get_phrase('ref_no');?></th>
                                            <th ><?php echo get_phrase('customer');?> </th>
                                            <th ><?php echo get_phrase('item');?></th>
                                            <th ><?php echo get_phrase('pattern');?></th>
                                            <th ><?php echo get_phrase('style');?> </th>
                                            <th ><?php echo get_phrase('cloth');?> <?php echo get_phrase('style');?></th>
                                            <th ><?php echo get_phrase('cloth');?> <?php echo get_phrase('type');?></th>
                                            <th ><?php echo get_phrase('unit');?> <?php echo get_phrase('price');?></th>
                                            <th > <?php echo get_phrase('amount');?></th>
                                            <th ><?php echo get_phrase('total');?></th>
                                            
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
