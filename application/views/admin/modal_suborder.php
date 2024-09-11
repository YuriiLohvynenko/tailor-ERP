
<div class="box border green" id="formWizard">
                        <div class="box-title">
                            <h4><i class="fa fa-bars"></i><?php echo get_phrase($param2)?></h4>
                            <div class="tools hidden-xs">
                                <a href="#box-config" data-toggle="modal" class="config">
                                    <i class="fa fa-plus"></i>
                                </a>
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
                        <div class="box-body form">
						
           				<?php 
						
						if($param2=='view_measurement')
						{
						?>
                        <table class="table table-bordered table-hover">
                        <tbody><?php
							$edit_data=$this->db->get_where('order_items' , array('id' => $param3) )->result_array();
							foreach ( $edit_data as $r):
							$vars = $r;
							
							$var=json_decode($vars['measurement']);
							foreach($var as $k => $v):
							
						?>
                          <tr>
                            <th><?php echo $this->crud_model->get_value_by_id('measurement',$k,'measurement_title') ?></th>
                            <td><?php echo $v;?> <?php echo ucwords($this->crud_model->get_value_by_id('measurement',$k,'measurement_unit') ); ?></td>
                          </tr>
						<?php endforeach;endforeach;?> 
                         </tbody>
                        </table>
						<?php } 
						elseif($param2=='suborder_detail')
						{
							$subOrd = $this->crud_model->get_rowValue_by_id('order_items' , $param3);
							$ord 	= $this->crud_model->get_rowValue_by_id('orders' , $subOrd->order_id);
						?>
						<table class="table table-bordered table-hover">
                        <tbody>
                          <tr>
                            <th><?php echo get_phrase('suborder')?> <?php echo get_phrase('no')?></th>
                            <td><?php echo $subOrd->id;?></td>
                          </tr>
                           <tr>
                            <th><?php echo get_phrase('item')?><?php echo get_phrase('name')?> </th>
                            <td><?php echo $ord->item_name; ?></td>
                          </tr>
                          <tr>
                            <th><?php echo get_phrase('style')?> </th>
                            <td><?php echo $ord->style_name; ?></td>
                          </tr>
						   <tr>
                            <th><?php echo get_phrase('pattern')?> </th>
                            <td><?php echo $ord->pattern_name; ?></td>
                          </tr>
                          <?php if($subOrd->cloth_id!='0'){?>
                         <tr>
                            <th><?php echo get_phrase('cloth')?> <?php echo get_phrase('name')?> </th>
                            <td><?php echo ($subOrd->cloth_id) ? ucwords($this->crud_model->get_value_by_id('cloth_products',$subOrd->cloth_id,'cloth_name')) : 'NA';?></td>
                          </tr>
                          <?php }if($subOrd->cloth_style){?>
                          <tr>
                            <th><?php echo get_phrase('cloth')?> <?php echo get_phrase('style')?> </th>
                            <td><?php echo $subOrd->cloth_style;?></td>
                          </tr>
                          <?php }if($subOrd->cloth_type){?>
                          <tr>
                            <th><?php echo get_phrase('cloth')?> <?php echo get_phrase('type')?> </th>
                            <td><?php echo $subOrd->cloth_type;?></td>
                          </tr>
                          <?php }?>
                          <tr>
                            <th><?php echo get_phrase('cloth')?> <?php echo get_phrase('length')?> </th>
                            <td><?php echo $subOrd->cloth_length;?> <?php echo ucwords($subOrd->cloth_unit);?></td>
                          </tr>
                          
                           <tr>
                            <th><?php echo get_phrase('unit')?> <?php echo get_phrase('price')?> <?php echo get_phrase('price')?></th>
                            <td><?php echo $subOrd->cloth_unit_price;?> <?php echo CURRENCY; ?></td>
                          </tr>
                           <tr>
                            <th><?php echo get_phrase('amount')?> </th>
                            <td><?php echo $subOrd->amount;?> <?php echo CURRENCY; ?></td>
                          </tr>
                          <tr>
                            <th><?php echo get_phrase('total')?> </th>
                            <td><?php echo $subOrd->sub_order_price;?> <?php echo CURRENCY; ?></td>
                          </tr>
                           <tr>
                            <th><?php echo get_phrase('worker')?> <?php echo get_phrase('name')?></th>
                            <td><?php echo $subOrd->worker_name; ?></td>
                          </tr>
                          
						  
						   <tr>
                            <th><?php echo get_phrase('remark')?> </th>
                            <td><?php echo $ord->note;?></td>
                          </tr>
						   
                        </tbody>
                        </table>
						<?php }?>

                        </div>
                    </div>
