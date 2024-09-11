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
                                <a href=""><?php echo get_phrase('settings');?></a>
                            </li>
                            <li><?php echo get_phrase($page_title)?></li>
                        </ul>
                        <!-- /BREADCRUMBS -->
                        <div class="clearfix">
                            <h3 class="content-title pull-left"><?=ucwords($page_title)?></h3>
                        </div>
                        <!--<div class="description"><?php echo get_phrase('all_lists_shows_here')?></div>-->
                    </div>
                </div>
            </div>
            <!-- /PAGE HEADER -->
		   <?php if($this->session->flashdata('flash_message')){ echo "<div class=\"alert alert-block alert-success fade in\"><a class=\"close\" data-dismiss=\"alert\" href=\"#\" aria-hidden=\"true\">×</a><h4><i class=\"fa fa-heart\"></i>". $this->session->flashdata('flash_message')."</h4></div>";
             }?>
            
            <?php if($message) { echo "<div class=\"alert alert-block alert-danger fade in\"><a href=\"#\" class=\"close\" aria-hidden=\"true\" data-dismiss=\"alert\">×</a><h4><i class=\"fa fa-times\"></i> ". get_phrase('oh_snap_error')."</h4><p>" . $message . "</p></div>"; } ?>
            <div class="row">
                <div class="col-md-12">
                    <!-- BOX -->
                    <div class="box border red" id="formWizard">
                        <div class="box-title">
                            <h4><i class="fa fa-bars"></i><?php echo get_phrase('add');?> <?=ucwords($page_title)?></h4>
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
           
           
<?php echo form_open(base_url().'order' , array('id' => 'newOrdForm', 'class' => 'form-horizontal'));?>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('order');?> <?php echo get_phrase('date');?> <span class="required">*</span></label>
                                           <div class="col-md-4">
                                              <?php echo form_input('order_date', (isset($_POST['order_date']) ? $_POST['order_date'] : ''), 'class="form-control tip-right date" data-original-title="'. get_phrase('date') .'" id="order_date" required="required" data-error="' . get_phrase("date") . ' ' . get_phrase("is_required") . '"'); ?>
                                              
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
                                        
                                           <label class="control-label col-md-3" id="supplier_l"><?php echo get_phrase('customer');?> <span class="required">*</span></label>
                                           <div class="col-md-4">
                                              
										   <?php
                                            $cs[""] = "";
                                            foreach ($customers as $customer) {
                                                if ($customer['company'] == "-" || !$customer['company']) {
                                                    $cs[$customer['id']] = $customer['company'];
                                                } else {
                                                    
													$cs[$customer['id']] = $customer['fname'].' '.$customer['lname'];
                                                }
                                            }
                                            echo form_dropdown('customer', $cs, (isset($_POST['customer']) ? $_POST['customer'] : DCUSTOMER), 'id="select4" class="col-md-12 select2-offscreen" required="required" data-error="' . get_phrase("customer") . ' ' . get_phrase("is_required") . '"');
                                            ?>
                                              <span class="error-span"></span>
                                              <span id="loading"></span>
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('trial');?> <?php echo get_phrase('date');?> <span class="required">*</span></label>
                                           <div class="col-md-4">
                                              <?php echo form_input('trial_date', (isset($_POST['trial_date']) ? $_POST['trial_date'] : ''), 'class="form-control tip-right date" data-original-title="'.get_phrase('trial').' '.get_phrase('date') .'" id="trial_date" required="required" data-error="' .get_phrase('trial').' '. get_phrase("date") . ' ' . get_phrase("is_required") . '"'); ?>
                                              
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('delivery');?> <?php echo get_phrase('date');?> <span class="required">*</span></label>
                                           <div class="col-md-4">
                                              <?php echo form_input('delivery_date', (isset($_POST['delivery_date']) ? $_POST['delivery_date'] : ''), 'class="form-control tip-right" id="delivery_date" data-original-title="'. get_phrase('delivery').' '.get_phrase('date') .'" required="required" data-error="' .get_phrase('delivery').' '.get_phrase("date") . ' ' . get_phrase("is_required") . '"'); ?>
                                              
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                        
                                        
                               <div class="form-actions clearfix">
                                  <div class="row">
                                     <div class="col-md-12">
                                        <div class="col-md-offset-3 col-md-9">
                                         <button type="submit" class="btn btn-primary" > <?php echo get_phrase('save');?> <i class="fa fa-save"></i></button>
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
            <div class="footer-tools">
                <span class="go-top">
                    <i class="fa fa-chevron-up"></i> <?php echo get_phrase('top');?>
                </span>
            </div>
        </div><!-- /CONTENT-->
    </div>
</div>
<script type="text/javascript">
  $(function() {
    $( "#order_date" ).datepicker({
      defaultDate: "<?php echo date("m/d/Y")?>",
      changeMonth: true,
      numberOfMonths: 1,
      onClose: function( selectedDate,defaultDate ) {
          console.log(defaultDate);
         
        $( "#trial_date" ).datepicker( "option", "minDate", selectedDate );
        //$( "#deliver_date" ).datepicker( "option", "minDate", selectedDate );
      }
    });
   $("#order_date").datepicker("setDate", new Date());
   var currentDate = "<?php echo date("m/d/Y")?>";
   console.log(currentDate);
    $( "#trial_date" ).datepicker({ minDate: currentDate,
    
    onClose: function( selectedDate ) {       
        $( "#delivery_date" ).datepicker( "option", "minDate", selectedDate );
      }
  });
    
     $( "#delivery_date" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 1,
      onClose: function( selectedDate ) {
        $( "#order_date" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
  });
   
   
$(document).ready(function() {
		<!------NEW ORDER FORM VALIDATION------> 
		$('#newOrdForm').validate({
              rules: {
                order_date: {
                  required: true
				},
				reference_no: {
                  required: true
                },
				customer: {
                  required: true
                },
				trial_date: {
                  required: true
                },
				delivery_date: {
                  required: true
                },
              },
              highlight: function(element) {
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
              },
              success: function(element) {
                element
                .text('Valid!').addClass('valid')
                .closest('.form-group').removeClass('has-error').addClass('has-success');
              }
             }); 
});

</script>