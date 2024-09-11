<?php
foreach ($edit_data as $r):
$row = $r;
endforeach;
if($edit_data[0])
{
	$formAction = "edit_purchases/".$row['id'];
	$pr_value = sizeof($inv_products);
	$cno = $pr_value + 1;
}
else
{
	$formAction = "create/";
	$cno = 1;
}?>

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
                                <a href=""><?php echo get_phrase('purchases');?></a>
                            </li>
                            <li><?=ucwords($page_title)?></li>
                        </ul>
                        <!-- /BREADCRUMBS -->
                        <div class="clearfix">
                            <h3 class="content-title pull-left"><?=ucwords($page_title)?></h3>
                        </div>
                        <!--<div class="description"><?php echo get_phrase('manage_system_settings');?></div>-->
                    </div>
                </div>
            </div>
            <!-- /PAGE HEADER -->
            <!-- SAMPLE -->
            <div class="row">
                <div class="col-md-12">
                    <!-- BOX -->
                    <div class="box border red" id="formWizard">
                        <div class="box-title">
                            <h4><i class="fa fa-bars"></i><?=ucwords($page_title)?></h4>
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
                        <div class="box-body form">
           <?php if($message) { echo "<div class=\"alert alert-block alert-danger fade in\"><a href=\"#\" class=\"close\" aria-hidden=\"true\" data-dismiss=\"alert\">×</a><h4><i class=\"fa fa-times\"></i> ". get_phrase('oh_snap_error')."</h4><p>" . $message . "</p></div>"; } ?>
           
<?php $attrib = array('class' => 'form-horizontal validate','id' => 'purchaseForm'); echo form_open_multipart(base_url().$roles.'/purchases/'.$formAction, $attrib); ?>
                            <div class="wizard-form">
                               <div class="wizard-content">
                                  <div class="tab-content">
                                     <div class="tab-pane active" id="account">
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('date');?> <span class="required">*</span></label>
                                           <div class="col-md-4">
                                              <?php echo form_input('date', (isset($_POST['date']) ? $_POST['date'] : date(PHP_DATE, strtotime($row['date']))), 'class="form-control tip-right" data-original-title="'. get_phrase('date') .'" id="date" required="required" data-error="' . get_phrase("date") . ' ' . get_phrase("is_required") . '"'); ?>
                                              
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('ref_no');?> <span class="required">*</span></label>
                                           <div class="col-md-4">
                                              <?php echo form_input('reference_no', (isset($_POST['reference_no']) ? $_POST['reference_no'] : $rnumber), 'class="form-control tip-right" id="reference_no" data-original-title="'. get_phrase('ref_no') .'" required="required" data-error="' . get_phrase('ref_no') . ' ' . get_phrase("is_required") . '"'); ?>
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                        
                                           <label class="control-label col-md-3" id="supplier_l"><?php echo get_phrase('supplier');?><span class="required">*</span></label>
                                           <div class="col-md-4">
                                              
										   <?php
                                            $sp[""] = "";
                                            foreach ($suppliers as $supplier) {
                                                if ($supplier['company'] == "-" || !$supplier['company']) {
                                                    $sp[$supplier['id']] = $supplier['name'];
                                                } else {
                                                    $sp[$supplier['id']] = $supplier['company'];
                                                }
                                            }
                                            echo form_dropdown('supplier', $sp, (isset($_POST['supplier']) ? $_POST['supplier'] : $row['supplier_id']), 'id="select4" class="col-md-12 select2-offscreen" required="required" data-error="' . get_phrase("supplier") . ' ' . get_phrase("is_required") . '"');
                                            ?>
                                              <span class="error-span"></span>
                                              <span id="loading"></span>
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                        <label class="control-label col-md-3">&nbsp;</label>
                                        <div class="col-md-4 box-container">
                                        <div class="box border blue">
                                            <div class="box-title">
                                                <h4><i class="fa fa-arrows"></i> <?php echo get_phrase('draggable');?></h4>
                                            </div>
                                            <div class="box-body">
                                            <div class="panel panel-default">
												<div class="panel-body">
													 <div class="tabbable">
														<ul class="nav nav-tabs">
														   <li class="active"><a href="#tab_1_1" data-toggle="tab"><i class="fa fa-home"></i> <?php echo get_phrase('code');?></a></li>
														   <li><a href="#tab_1_2" data-toggle="tab"><i class="fa fa-envelope"></i> <?php echo get_phrase('name');?></a></li>
														</ul>
														<div class="tab-content">
														   <div class="tab-pane fade in active" id="tab_1_1">
															  <div class="divide-10"></div>
															  <p> <?php echo form_input('codes', '', 'class="form-control tip" id="codes" data-placement="top" data-trigger="focus" placeholder="' . get_phrase("product").' '.get_phrase("code") . '" title="' . get_phrase("type2charcode_segg_get") . '"'); ?> </p>
														   </div>
														   <div class="tab-pane fade" id="tab_1_2">
																<div class="divide-10"></div>
															  <p> <?php echo form_input('name', '', 'class="form-control tip" id="name" data-placement="top" data-trigger="focus" placeholder="' . get_phrase("product").' '.get_phrase("name") . '" title="' . get_phrase("type2charname_segg_get") . '"'); ?> </p>
														   </div>
														   
														</div>
													 </div>
												 </div>
											 </div>
                                            </div>
                                        	</div>
                                        </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-md-3"><?php echo get_phrase("inventory").' '.get_phrase("items"); ?></label>
                                            <div class="col-md-9">
                                                <table id="dyTable" class="table items table-striped table-bordered table-condensed table-hover">
                                                    <thead>
                                                    <th class="span5"><?php echo get_phrase("product").' '.get_phrase("name") . " (" . get_phrase("product").' '.get_phrase("code") . ")"; ?></th>
                                        <?php
                                        if (TAX1) {
                                            echo '<th class="span2">' . get_phrase("tax").' '. get_phrase("rate") . '</th>';
                                        }
                                        ?>
                                                    <th class="span2"><?php echo get_phrase("qty"); ?></th>
                                                    <th class="span2"><?php echo get_phrase("unit").' '.get_phrase("cost"); ?></th>
                                                    <th style="width: 20px;">
                                                    <i class="fa fa-trash-o" style="opacity:0.9; filter:alpha(opacity=50);"></i></th>
                                                    </thead>
                                                    <tbody>
                                                     <?php
													 /*echo "<pre>";
													 print_r($inv_products);*/
													 if(!empty($inv_products)):
														$r = 1;
														foreach ($inv_products as $prod) {
										
															echo '<tr id="row_' . $r . '"><td><input name="product' . $r . '" type="hidden" value="' . $prod['product_code'] . '"><input class="form-control input-sm tran" style="text-align:left;" name="item' . $r . '" type="text" value="' . $prod['product_name'] . ' (' . $prod['product_code'] . ')"></td>';
															if (TAX1) {
																echo '<td><select class="form-control input-sm" name="tax_rate' . $r . '" id="tax_rate-' . $r . '">';
																foreach ($tax_rates as $tax) {
																	echo "<option value=" . $tax['id'];
																	if ($tax['id'] == $prod['tax_rate_id']) {
																		echo ' selected="selected"';
																	}
																	echo ">" . $tax['name'] . "</option>";
																}
																echo '</select></td>';
															}
															echo '<td><input class="form-control input-sm text-center" name="quantity' . $r . '" type="text" value="' . $prod['quantity'] . '"></td><td><input class="form-control input-sm tran" style="text-align:right;" name="unit_cost' . $r . '" type="text" value="' . $prod['unit_price'] . '"></td><td><i class="fa fa-trash-o tip del" id="' . $r . '" title="'. get_phrase('delete') .'" style="cursor:pointer;" data-placement="right"></i></td></tr>';
															$r++;
														}
														endif;
														?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div> 
                                        
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('note');?> </label>
                                           <div class="col-md-8">
                                              <?php echo form_textarea('note', (isset($_POST['note']) ? $_POST['note'] : html_entity_decode($row['note'])), 'rows="3" cols="5" class="countable form-control" data-limit="140"'); ?> <p class="help-block">You have <span id="counter"></span> characters left.</p> 
                                             
                                           </div>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                               <div class="form-actions clearfix">
                                  <div class="row">
                                     <div class="col-md-12">
                                        <div class="col-md-offset-3 col-md-9">
                                           
                                         <button type="submit" class="btn btn-primary"> <?php echo get_phrase('save');?> <i class="fa fa-save"></i></button>
                                         <input type="hidden" name="act" value="setting_update"  />
                                                                      
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                         <?php echo form_close();?> 
                        </div>
                    </div>
                    <!-- /BOX -->
                </div>
            </div>
            <!-- /SAMPLE -->
            <div class="footer-tools">
                <span class="go-top">
                    <i class="fa fa-chevron-up"></i> <?php echo get_phrase('top');?>
                </span>
            </div>
        </div><!-- /CONTENT-->
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
		
        $("#date").datetimepicker({
            format: "<?php echo JS_DATE; ?>",
            autoclose: true,
			weekStart: 1,
			todayBtn:  1,
			autoclose: 1,
			todayHighlight: 1,
			startView: 2,
			minView: 2,
			forceParse: 0,
			pickerPosition: "bottom-left"
        });
        $("#date").datetimepicker("setDate", new Date());
        

        var count = <?php echo $cno; ?>;
        var an = <?php echo $cno; ?>;
        var tax_rates = <?php echo json_encode($tax_rates); ?>;
        var DT = <?php echo DEFAULT_TAX; ?>;
        

        $("#dyTable").on("click", '.del', function() {

            var delID = $(this).attr('id');

            row_id = $("#row_" + delID);
            row_id.remove();

            an--;

        });

		<?php
		if ($this->input->post('submit')) {
			echo "$('.item_name').hide();";
		}
		?>
        $(".show_hide").slideDown('slow');

        $('.show_hide').click(function() {
            $(".item_name").slideToggle();
        });

        $("#name").autocomplete({
            source: function(request, response) {
                $.ajax({url: "<?php echo base_url().$roles.'/uiNameSuggestions'; ?>",
                    data: {term: $("#name").val()},
                    dataType: "json",
                    type: "get",
                    success: function(data) {
                        response(data);
                    },
                    error: function(result) {
                        bootbox.alert('<?php echo get_phrase('no_suggestions'); ?>');
                        $('.ui-autocomplete-input').removeClass("ui-autocomplete-loading");
                        $('#name').val('');
                        return false;
                    }
                });
            },
            minLength: 2,
            select: function(event, ui) {
            $(this).removeClass('ui-autocomplete-loading');

                if (an >=<?php echo TOTAL_ROWS; ?>) {
                    bootbox.alert("<?php echo get_phrase('max_item_limit'); ?>");
                    return false;
                }
                if (count >= 200) {
                    bootbox.alert("<?php echo get_phrase('max_item_limit'); ?>");
                    return false;
                }
                var item_code;
                var item_cost;
                var pr_tax;
                var item_name = ui.item.label;

                $.ajax({
                    type: "get",
                    async: false,
                    url: "<?php echo base_url().$roles.'/add_item'; ?>",
                    data: {name: item_name},
                    dataType: "json",
                    success: function(data) {

                        item_code = data.code;
                        item_cost = data.cost;
                        pr_tax = data.tax_rate;

                    },
                    error: function() {
                        bootbox.alert('<?php echo get_phrase('code_error'); ?>');
                        $('.ui-autocomplete-loading').removeClass("ui-autocomplete-loading");
                        item_name = false;
                    }

                });

                if (item_name == false) {
                    $(this).val('');
                    return false;
                }
                var taxes = '';
                $.each(tax_rates, function() {
                    if (pr_tax) {
                        if (this.id == pr_tax.id) {
                            taxes += '<option value="' + this.id + '" selected="selected">' + this.name + '</option>';
                        } else {
                            taxes += '<option value="' + this.id + '">' + this.name + '</option>';
                        }
                    } else {
                        if (this.id == DT) {
                            taxes += '<option value="' + this.id + '" selected="selected">' + this.name + '</option>';
                        } else {
                            taxes += '<option value="' + this.id + '">' + this.name + '</option>';
                        }
                    }
                });

                var newTr = $('<tr id="row_' + count + '"></tr>');
                newTr.html('<td><input name="product' + count + '" type="hidden" value="' + item_code + '"><input class="form-control tran" style="text-align:left;" name="item' + count + '" type="text" value="' + item_name + ' (' + item_code + ')"></td><?php if (TAX1) { ?><td><select class="form-control pt" name="tax_rate' + count + '" id="tax_rate-' + count + '">' + taxes + '</select></td><?php } ?><td><input class="form-control text-center" name="quantity' + count + '" type="text" value="1" onClick="this.select();"></td><td><input class="form-control tran" style="text-align:right;" name="unit_cost' + count + '" type="text" value="' + item_cost + '"></td><td><i class="fa fa-trash-o tip del" id="' + count + '" title="<?php echo get_phrase('delete'); ?>" style="cursor:pointer;" data-placement="right"></i></td>');
                newTr.prependTo("#dyTable");
                count++;
                an++;
            },
            close: function() {
                $('#name').val('');
            }
        });

        $("#codes").autocomplete({
            source: function(request, response) {
                $.ajax({url: "<?php echo base_url().$roles.'/uiCodeSuggestions'; ?>",
                    data: {term: $("#codes").val()},
                    dataType: "json",
                    type: "get",
                    success: function(data) {
                        response(data);
                    },
                    error: function(result) {
                        bootbox.alert('<?php echo get_phrase('no_suggestions'); ?>');
                        $('.ui-autocomplete-input').removeClass("ui-autocomplete-loading");
                        $('#codes').val('');
                        return false;
                    }
                });
            },
            minLength: 2,
            select: function(event, ui) {
            $(this).removeClass('ui-autocomplete-loading');

                if (an >=<?php echo TOTAL_ROWS; ?>) {
                    bootbox.alert("<?php echo get_phrase('max_item_limit'); ?>");
                    return false;
                }
                if (count >= 200) {
                    bootbox.alert("<?php echo get_phrase('max_item_limit'); ?>");
                    return false;
                }
                var item_cost;
                var pr_tax;
                var item_code = ui.item.label;

                $.ajax({
                    type: "get",
                    async: false,
                    url: "<?php echo base_url().$roles.'/scan_item'; ?>",
                    data: {code: item_code},
                    dataType: "json",
                    success: function(data) {

                        item_cost = data.cost;
                        item_name = data.name;
                        pr_tax = data.tax_rate;

                    },
                    error: function() {
                        bootbox.alert('<?php echo get_phrase('code_error'); ?>');
                        item_name = false;
                    }

                });

                if (item_name == false) {
                    $(this).val('');
                    return false;
                }
                var taxes = '';
                $.each(tax_rates, function() {
                    if (pr_tax) {
                        if (this.id == pr_tax.id) {
                            taxes += '<option value="' + this.id + '" selected="selected">' + this.name + '</option>';
                        } else {
                            taxes += '<option value="' + this.id + '">' + this.name + '</option>';
                        }
                    } else {
                        if (this.id == DT) {
                            taxes += '<option value="' + this.id + '" selected="selected">' + this.name + '</option>';
                        } else {
                            taxes += '<option value="' + this.id + '">' + this.name + '</option>';
                        }
                    }
                });

                var newTr = $('<tr id="row_' + count + '"></tr>');
                newTr.html('<td><input name="product' + count + '" type="hidden" value="' + item_code + '"><input class="form-control input-sm tran" style="text-align:left;" name="item' + count + '" type="text" value="' + item_name + ' (' + item_code + ')"></td><?php if (TAX1) { ?><td><select class="form-control pt" name="tax_rate' + count + '" id="tax_rate-' + count + '">' + taxes + '</select></td><?php } ?><td><input class="form-control input-sm text-center" name="quantity' + count + '" type="text" value="1" onClick="this.select();"></td><td><input class="form-control input-sm tran" style="text-align:right;" name="unit_cost' + count + '" type="text" value="' + item_cost + '"></td><td><i class="fa fa-trash-o tip del" id="' + count + '" title="<?php echo get_phrase('delete'); ?>" style="cursor:pointer;" data-placement="right"></i></td>');
                newTr.prependTo("#dyTable");

                count++;
                an++;
               },
            close: function() {
                $('#codes').val('');
            }
        });

        $(".ui-autocomplete ").addClass('box border inverse');
        $('#item_name').bind('keypress', function(e)
        {
            if (e.keyCode == 13)
            {
                e.preventDefault();
                return false;
            }
        });
        $("form").submit(function() {
            if (an <= 1) {
                bootbox.alert("<?php echo get_phrase('no_invoice_item'); ?>");
                return false;
            }
        });

        $('.box-container').draggable({
		   		cursor: "move",
				cursorAt: { 
					top: 5, left: 5 
				},
				containment: "#account",
				scroll: false,
				refreshPositions: true
		});

    });
</script>