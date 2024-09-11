<div class="container">
	<div class="row">
        <div id="content" class="col-lg-12">

            <!-- PAGE HEADER-->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-header">
                         <!--STYLER--> 
                        
                        <!-- /STYLER 
                         BREADCRUMBS -->
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
                         <!--/BREADCRUMBS -->
                        <div class="clearfix">
                            <h3 class="content-title pull-left"><?php echo ucwords($page_title)?></h3>
                        </div>
                        <div class="description"><?php echo get_phrase('all_lists_shows_here')?></div>
                    </div>
                </div>
            </div>
             <!--/PAGE HEADER 
             EXPORT TABLE -->
            <div class="row">
                <div class="col-md-12">
                 <?php if($this->session->flashdata('flash_message')){ ?>
                <div class="alert alert-block alert-success fade in">
                <a class="close" data-dismiss="alert" href="#" aria-hidden="true">�</a>
                <h4><i class="fa fa-heart"></i> <?php echo $this->session->flashdata('flash_message'); ?></h4>
                </div>
                <?php }?>
								<!-- BOX -->
								<div class="box border blue">
									<div class="box-title">
										<h4><i class="fa fa-table"></i><?php echo get_phrase("today's");?> <?php echo get_phrase('delivery')?> <?php echo get_phrase('date'); ?> <?php echo get_phrase('but');?> <?php echo get_phrase('not');?> <?php echo get_phrase('ready');?></h4>
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
													<th ><?php echo get_phrase('customer_name');?></th>
                                                    <th ><?php echo get_phrase('order');?> <?php echo get_phrase('date');?></th>
                                                    <th ><?php echo get_phrase('trial');?> <?php echo get_phrase('date');?></th>
                                 					<th ><?php echo get_phrase('deliver');?> <?php echo get_phrase('date');?></th>
													 <th ><?php echo get_phrase('total');?> <?php echo get_phrase('order');?></th>
													<th ><?php echo get_phrase('action');?></th>
												</tr>
											</thead>
											<tbody>
                                            <?php 
											$i=1;
											foreach($orders as $order):
										
											?>
												<tr class="gradeX">
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $order->ref?></td>
                                                <td><?php echo $order->customer; ?></td>
                                                <td><?php echo $order->od?></td>
                                                <td><?php echo $order->td; ?></td>
												<td><?php echo $order->dd; ?></td>										
                                                <td><?php echo $order->ord_Itms_Id; ?></td>
												<td class="center hidden-xs"><a href="<?php echo base_url().$roles.'/orders/view_suborder/'.$order->oid;?>" class="btn btn-success"><?php echo get_phrase('sub');?> <?php echo get_phrase('orders');?></a></td>
                                            </tr>
											<?php $i++;
											
											endforeach;?>	
											</tbody>
											<tfoot>
												<tr>
													<th><?php echo get_phrase('s_no');?></th>
													<th><?php echo get_phrase('ref_no');?></th>
													<th ><?php echo get_phrase('customer_name');?></th>
                                                    <th ><?php echo get_phrase('order');?> <?php echo get_phrase('date');?></th>
                                                    <th ><?php echo get_phrase('trial');?> <?php echo get_phrase('date');?></th>
                                 					<th ><?php echo get_phrase('deliver');?> <?php echo get_phrase('date');?></th>
													 <th ><?php echo get_phrase('total');?> <?php echo get_phrase('order');?></th>
													<th ><?php echo get_phrase('action');?></th>
												</tr>
											</tfoot>
										</table>
									</div>
								</div>
								<!-- /BOX--> 
							</div>
            </div>
             <!--/EXPORT TABLE--> 
            <div class="footer-tools">
                <span class="go-top">
                    <i class="fa fa-chevron-up"></i> <?php echo get_phrase('top');?>
                </span>
            </div>
        </div> <!--/CONTENT-->
    </div>
</div>