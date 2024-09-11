<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/print.css" media="print"/>

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
				
						<!-- BOX -->
				
				 <?php echo form_open(base_url().$roles.'/orders/save/'.$orders->id , array('id' => 'Expdate', 'class' => 'form-horizontal'));?>
				 <?php for($i=0;$i<$orders->no_of_suborder;$i++){
				  $suborders = $this->crud_model->get_rowValue_by_CustomField('order_items','id',$subIds[$i]);
				  if(!$suborders->expected_date)
				  {
				  	
				  }?>
				 <div class="form-group">
				   <label class="control-label col-md-3"> <?php echo get_phrase('expected_date_of_completion');?>
				   <span class="required"></span></label>
				   <div class="col-md-3">
				   
				  <?php echo form_input('expected_date[]', $suborders->expected_date, 'class="form-control tip-right exdate"'); ?>
					  <span class="error-span"></span>
				   </div>
				</div>
											
					<div class="box border blue">
						<div class="box-title">
							<h4><i class="fa fa-table"></i><?php echo get_phrase('suborder')?> <?php echo get_phrase('information')?>-<?php echo $i+1;?></h4>
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
										<th><?php echo get_phrase('order');?> <?php echo get_phrase('no');?></th>
										<th><?php echo get_phrase('suborder');?> <?php echo get_phrase('no');?></th>
										<th><?php echo get_phrase('order');?> <?php echo get_phrase('date');?></th>
										<th><?php echo get_phrase('trial');?> <?php echo get_phrase('date');?></th>
										<th><?php echo get_phrase('deliver');?> <?php echo get_phrase('date');?></th>
										<th><?php echo get_phrase('expected');?> <?php echo get_phrase('date');?></th>
										<th><?php echo get_phrase('item');?> <?php echo get_phrase('information');?></th>
									</tr>
								</thead>
								<tbody>
									
									<tr class="gradeX">
									<td><?php echo $orders->id; ?></td>
									<td><?php echo $suborders->id;?></td>
									<td><?php echo $orders->date ; ?></td>
									<td><?php echo $orders->trial_date; ?></td>
									<td><?php echo $orders->delivery_date; ?></td>
									<td><?php echo $suborders->expected_date;?></td>
									<td><?php echo get_phrase('item');?> : <?php echo $orders->item_name;?><br><?php echo get_phrase('pattern');?> : <?php echo $orders->pattern_name;?><br /><?php echo get_phrase('style');?> : <?php echo $orders->style_name;?></td>
									</tr>												
								
								</tbody>
								
							</table>
							<!-----------------CLOTH INFORMATION------>
							<div class="box border red">
				<div class="box-title">
							<h4><i class="fa fa-table"></i><?php echo get_phrase('cloth')?> <?php echo get_phrase('information');?></h4>
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
										<th><?php echo get_phrase('cloth');?> <?php echo get_phrase('name');?></th>
										<th><?php echo get_phrase('cloth');?> <?php echo get_phrase('style');?></th>
										<th><?php echo get_phrase('cloth');?> <?php echo get_phrase('type');?></th>
										<th><?php echo get_phrase('cloth');?> <?php echo get_phrase('length');?></th>
										<th><?php echo get_phrase('image');?></th>
										</tr>
								</thead>
								<tbody>
									
									<tr class="gradeX">
									<td><?php echo ($suborders->cloth_id) ? ucwords($this->crud_model->get_value_by_id('cloth_products',$suborders->cloth_id,'cloth_name')) : get_phrase('NA'); ?></td>
									<td><?php echo ($suborders->cloth_style) ? $suborders->cloth_style : get_phrase('NA'); ?></td>
									<td><?php echo ($suborders->cloth_type) ? $suborders->cloth_type : get_phrase('NA');?></td>
									<td><?php echo $suborders->cloth_length; ?> <?php echo get_phrase('mtr') ?></td>
									<td>
										<?php if($suborders->cloth_id){?>
										<img class="media-object" height="30" width="50" src="<?php echo base_url(); ?>/uploads/products/<?php echo $this->crud_model->get_value_by_id('cloth_products',$suborders->cloth_id,'image');?>" alt="">
										<?php }else{?>
											<img class="media-object" height="30" width="50" src="<?php echo base_url(); ?>/uploads/img_not_found.gif" alt="">
										<?php }?>
										</td>
									</tr>												
								
								</tbody>
								
							</table>
							
						</div>
						</div>
						<!-----------------MEASUREMENT------>
						<div class="box border purple">
				<div class="box-title">
							<h4><i class="fa fa-table"></i><?php echo get_phrase('measurement');?></h4>
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
						<!-- <?php if($this->session->flashdata('message')){ ?>
                <div class="alert alert-block alert-danger fade in">
                <a class="close" data-dismiss="alert" href="#" aria-hidden="true">�</a>
                <h4><i class="fa fa-times"></i> <?php echo $this->session->flashdata('message'); ?>
				</h4>
                </div>
                <?php }?>-->
			<div class="box-body">
			<?php // echo $this->session->flashdata('message'); ?>
							<table id="datatable2" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
								<tbody><?php
							
							
							$var=json_decode($suborders->measurement);
							foreach($var as $k => $v):
							
						?>
                          <tr>
                            <th><?php echo $this->crud_model->get_value_by_id('measurement',$k,'measurement_title') ?></th>
							<td><?php echo ucwords($this->crud_model->get_value_by_id('measurement',$k,'measurement_unit') ); ?></td>
                            <td><?php echo $v;?> </td>
                          </tr>
						<?php endforeach; ?> 
                         </tbody>
								
							</table>
							
						</div>
						
						</div>
						</div>
					</div>
					<!-- /BOX -->
				<input type="hidden" name="suborderId[]" value="<?php echo $suborders->id ?>" />
				<?php } ?>
				
					<div class="form-actions clearfix">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="col-md-offset-3">
						 <button type="submit" class="btn btn-primary"> <?php echo get_phrase('save');?> <i class="fa fa-save"></i></button>
                         <a class="btn btn-md btn-primary" onclick="window.print();"><i class="fa fa-print"></i><?php echo ucwords(get_phrase('generate')); ?> <?php echo ucwords(get_phrase('work')); ?> <?php echo ucwords(get_phrase('order')); ?></a>
                          

                        </div>
                      </div>
                    </div>
                  </div>	
				  <?php echo form_close(); ?>	
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
</div>
<script type="text/javascript">
$(function(){
	$(".exdate").datepicker({
	defaultDate:"<?php echo date('m/d/y');?>"
	//changeMonth:true,
	//numberOfMonths: 1,
	});
});
</script>
