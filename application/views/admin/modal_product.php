<?php
$edit_data=$this->db->get_where('products' , array('id' => $param3) )->result_array();
foreach ( $edit_data as $r):
$row = $r;
endforeach;

?>
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
						if($param2=='product_image'){
						 echo "<div align=\"center\"><img class=\"img-responsive\" src=".base_url()."uploads/products/".$row['image']." /></div>";
						}
						elseif($param2=='view_product')
						{?>
						<table class="table table-bordered table-hover">
                        <tbody>
                          <tr>
                            <th><?php echo get_phrase('product')?> <?php echo get_phrase('code')?></th>
                            <td><?php echo $row['code'];?></td>
                          </tr>
                          <tr>
                            <th><?php echo get_phrase('product')?> <?php echo get_phrase('name')?></th>
                            <td><?php echo $row['name'];?></td>
                          </tr>
                          <tr>
                            <th><?php echo get_phrase('category')?> </th>
                            <td><?php echo $this->crud_model->get_value_by_id('categories',$row['category_id'],$field='name'); ?></td>
                          </tr>
                          <tr>
                            <th><?php echo get_phrase('product')?> <?php echo get_phrase('unit')?></th>
                            <td><?php echo $row['unit'];?></td>
                          </tr>
                          <tr>
                            <th><?php echo get_phrase('product')?> <?php echo get_phrase('size')?></th>
                            <td><?php echo $this->crud_model->get_value_by_id('sizes',$row['size_id'],$field='name'); ?></td>
                          </tr>
                          <tr>
                            <th><?php echo get_phrase('product')?> <?php echo get_phrase('cost')?></th>
                            <td><?php echo $row['cost'];?></td>
                          </tr>
                          <tr>
                            <th><?php echo get_phrase('product')?> <?php echo get_phrase('price')?></th>
                            <td><?php echo $row['price'];?></td>
                          </tr>
                          <tr>
                            <th><?php echo get_phrase('alert')?> <?php echo get_phrase('qty')?></th>
                            <td><?php echo $row['alert_quantity'];?></td>
                          </tr>
                        </tbody>
                        </table>
						<?php }
						?>

                        </div>
                    </div>