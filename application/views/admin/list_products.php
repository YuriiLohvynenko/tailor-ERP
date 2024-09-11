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
                                <a href=""><?php echo get_phrase('products');?></a>
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
								<div class="box border purple">
									<div class="box-title">
										<h4><i class="fa fa-table"></i><?php echo get_phrase($page_title)?></h4>
										<div class="tools hidden-xs">
											<!--<a onclick="showAjaxModal('<?php echo base_url().'modal/popup/';?>','<?php echo get_phrase('add')?> <?php echo get_phrase('product')?>');" rel="tooltip" data-placement="top" data-original-title="<?php echo get_phrase('add')?> <?php echo get_phrase('product')?>" class="tip config"><i class="fa fa-plus"></i></a>-->
												
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
													<th><?php echo get_phrase('code');?></th>
                                 					<th ><?php echo get_phrase('name');?> </th>
                                                    <th ><?php echo get_phrase('category');?></th>
                                                    <th ><?php echo get_phrase('qty');?> </th>
													
													<th ><?php echo get_phrase('unit');?></th>
                                                    <th ><?php echo get_phrase('cost');?></th>
                                                    <th ><?php echo get_phrase('price');?></th>
                                                    <th ><?php echo get_phrase('alert');?></th>
                                              		<th ><?php echo get_phrase('action');?></th>      
												</tr>
											</thead>
											<tbody>
                                            <?php 
											$i=1;
											//echo "<pre>";
											//print_r($products);
											foreach($products as $product):?>
												<tr class="gradeX">
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $product['code']?></td>
                                                <td><?php echo $product['name']; ?></td>
      											<td><?php echo $this->crud_model->get_value_by_id('categories',$product['category_id'],$field='name'); ?></td>
                                                <td><?php echo ($product['quantity']) ?$product['quantity'] : 0; ?></td>
                                                <td><?php echo $product['unit']; ?></td>
                                                <td><?php echo $product['cost'] ?></td>
                                                <td><?php echo $product['price'] ?></td>
                                                <td><?php echo $product['alert_quantity'] ?></td>
                                                <td class="center hidden-xs">
                                                <div class="btn-group dropdown" style="margin-bottom:5px">
                                        <button class="btn btn-primary">Action</button>
                                        <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                        <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" style="margin-left: -75px;">
                                        <li>
                                        <a onclick="showAjaxModal('<?php echo base_url().'modal/popup/modal_product/view_product/'.$product['id'];?>','<?php echo get_phrase('view')?> <?php echo get_phrase('product')?>');" class="config"><i class="fa fa-arrows-alt"></i> <?php echo get_phrase('view')?> <?php echo get_phrase('product')?></a>
                                        </li>
                                        
                                        <li>
                                        <a onclick="showAjaxModal('<?php echo base_url().'modal/popup/modal_product/product_image/'.$product['id'];?>','<?php echo get_phrase('product')?> <?php echo get_phrase('image')?>');" class="config"><i class="fa fa-picture-o"></i> <?php echo get_phrase('view')?> <?php echo get_phrase('image')?></a>
                                        </li>
                                        
                                        <li>
                                        <a href="<?php echo base_url().$this->session->userdata('roles').'/products/edit_products/'.$product['id'];?>"><i class="fa fa-edit"></i> <?php echo get_phrase('edit')?> </a>
                                        </li>
                                        <li>
                                        <a href="javascript:;" onclick="confirm_modal('<?=base_url().$this->session->userdata('roles')?>/products/delete_products/<?php echo $product['id'];?>');"><i class="fa fa-trash-o"></i>  <?php echo get_phrase('delete');?> </a>
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
													<th><?php echo get_phrase('code');?></th>
                                 					<th ><?php echo get_phrase('name');?> </th>
                                                    <th ><?php echo get_phrase('category');?></th>
                                                    <th ><?php echo get_phrase('qty');?> </th>
													
													<th ><?php echo get_phrase('unit');?></th>
                                                    <th ><?php echo get_phrase('cost');?></th>
                                                    <th ><?php echo get_phrase('price');?></th>
                                                    <th ><?php echo get_phrase('alert');?></th>
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