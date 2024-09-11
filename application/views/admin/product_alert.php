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
										<h4><i class="fa fa-table"></i><?php echo get_phrase('cloth_alert')?></h4>
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
										<table id="datatable3" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
										  <thead>
											<tr>
											<th><?php echo ucwords(get_phrase('cloth'));?> <?php echo ucwords(get_phrase('name'));?></th>
											  <th><?php echo ucwords(get_phrase('cloth'));?> <?php echo ucwords(get_phrase('style'));?></th>
											  <th> <?php echo ucwords(get_phrase('cloth'));?> <?php echo ucwords(get_phrase('type'));?></th>
											  <th> <?php echo ucwords(get_phrase('cloth'));?> <?php echo ucwords(get_phrase('unit'));?></th>
											  <th> <?php echo ucwords(get_phrase('cloth'));?> <?php echo ucwords(get_phrase('price'));?></th>
											  <th> <?php echo ucwords(get_phrase('quantity'));?></th>
											  <th> <?php echo ucwords(get_phrase('alert'));?> <?php echo ucwords(get_phrase('quantity'));?></th>
											</tr>
										  </thead>
										  <tbody>
											<?php foreach($cloth_product as $cloth): 
												if($cloth['quantity']<=$cloth['alert_quantity']){?>
											<tr>
												<td><?php echo ucwords($cloth['cloth_name']);?></td>
												<td><?php echo ucwords($this->crud_model->get_rowValue_by_CustomField('cloth_styles','id',$cloth['cloth_style_id'])->title);?></td>
												<td><?php echo  ucwords($this->crud_model->get_rowValue_by_CustomField('cloth_types','id',$cloth['cloth_type_id'])->title);?></td>
												<td><?php echo $cloth['unit'];?></td>
												<td><?php echo $cloth['price'];?></td>
												<td><?php echo $cloth['quantity'];?></td>
												<td><?php echo $cloth['alert_quantity'];?></td>
											</tr>
											<?php }endforeach; ?>
										  </tbody>
										  <tfoot>
											<tr>
											  <th><?php echo ucwords(get_phrase('cloth'));?> <?php echo ucwords(get_phrase('name'));?></th>
											  <th><?php echo ucwords(get_phrase('cloth'));?> <?php echo ucwords(get_phrase('style'));?></th>
											  <th> <?php echo ucwords(get_phrase('cloth'));?> <?php echo ucwords(get_phrase('type'));?></th>
											  <th> <?php echo ucwords(get_phrase('cloth'));?> <?php echo ucwords(get_phrase('unit'));?></th>
											  <th> <?php echo ucwords(get_phrase('cloth'));?> <?php echo ucwords(get_phrase('price'));?></th>
											  <th> <?php echo ucwords(get_phrase('quantity'));?></th>
											  <th> <?php echo ucwords(get_phrase('alert'));?> <?php echo ucwords(get_phrase('quantity'));?></th>
											</tr>
										  </tfoot>
										</table>
										
									</div>
								</div>
								<div class="box border blue">
									<div class="box-title">
										<h4><i class="fa fa-table"></i><?php echo get_phrase('other_product_alert')?></h4>
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
                                      <th><?php echo ucwords(get_phrase('product'));?> <?php echo ucwords(get_phrase('code'));?></th>
                                      <th> <?php echo ucwords(get_phrase('product'));?> <?php echo ucwords(get_phrase('name'));?></th>
                                      <th> <?php echo ucwords(get_phrase('product'));?> <?php echo ucwords(get_phrase('unit'));?></th>
                                      <th> <?php echo ucwords(get_phrase('product'));?> <?php echo ucwords(get_phrase('price'));?></th>
                                      <th> <?php echo ucwords(get_phrase('quantity'));?></th>
									  <th> <?php echo ucwords(get_phrase('alert'));?> <?php echo ucwords(get_phrase('quantity'));?></th>
                                    </tr>
                                  </thead>
								  <tbody>
								  	<?php foreach($product as $pro): 
										if($pro['quantity']<=$pro['alert_quantity']){?>
								  	<tr>
										<td><?php echo $pro['code'];?></td>
										<td><?php echo $pro['name'];?></td>
										<td><?php echo $pro['unit'];?></td>
										<td><?php echo $pro['price']?></td>
										<td><?php echo $pro['quantity'];?></td>
										<td><?php echo $pro['alert_quantity'];?></td>
									</tr>
									<?php } endforeach; ?>
								  </tbody>
								   <tfoot>
                                    <tr>
                                      <th><?php echo ucwords(get_phrase('product'));?> <?php echo ucwords(get_phrase('code'));?></th>
                                      <th> <?php echo ucwords(get_phrase('product'));?> <?php echo ucwords(get_phrase('name'));?></th>
                                      <th> <?php echo ucwords(get_phrase('product'));?> <?php echo ucwords(get_phrase('unit'));?></th>
                                      <th> <?php echo ucwords(get_phrase('product'));?> <?php echo ucwords(get_phrase('price'));?></th>
                                      <th> <?php echo ucwords(get_phrase('quantity'));?></th>
									  <th> <?php echo ucwords(get_phrase('alert'));?> <?php echo ucwords(get_phrase('quantity'));?></th>
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
