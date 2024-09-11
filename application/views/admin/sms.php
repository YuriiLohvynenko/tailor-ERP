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
                            <li><?=ucwords($page_title)?></li>
                        </ul>
                        <!-- /BREADCRUMBS -->
                        <div class="clearfix">
                            <h3 class="content-title pull-left"><?=ucwords($page_title)?></h3>
                        </div>
                        <div class="description"><?php echo get_phrase('sms');?></div>
                    </div>
                </div>
            </div>
            <!-- /PAGE HEADER -->
            <!-- SAMPLE -->
            <div class="row">
                <div class="col-md-12">
                <?php if($this->session->flashdata('message')){ ?>
                <div class="alert alert-block alert-danger fade in">
                <a class="close" data-dismiss="alert" href="#" aria-hidden="true">×</a>
                <h4><i class="fa fa-heart"></i> <?php echo $this->session->flashdata('message'); ?></h4>
                </div>
                
                <? }?>
                 <?php if($this->session->flashdata('flash_message')){ ?>
                <div class="alert alert-block alert-success fade in">
                <a class="close" data-dismiss="alert" href="#" aria-hidden="true">×</a>
                <h4><i class="fa fa-heart"></i> <?php echo $this->session->flashdata('flash_message'); ?></h4>
                </div>
                
                <? }?>
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
           
            <form method="post" action="<?php echo base_url()?><?=$roles?>/send_sms" class="form-horizontal validate" enctype="multipart/form-data" id="sms">
                            <div class="wizard-form">
                               <div class="wizard-content">
                                  <div class="tab-content">
                                     <div class="tab-pane active" id="account">
                                     <div class="form-group col-md-offset-1 col-md-11">
                                     <!--<h3><?php echo get_phrase('email');?></h3> -->
                                     </div>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-2"><?php echo get_phrase('numbers');?> <span class="required">*</span></label>
                                           <div class="col-md-4">
                                              <input type="text" class="form-control" name="number" />
                                             <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                       
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-2"><?php echo get_phrase('message');?> <span class="required">*</span></label>
                                           <div class="col-md-4">
                                           	
                                             <textarea class="form-control" rows="5" cols="3" name="message" '> </textarea>
                                           <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                       
                                        
                                     </div>
                                  </div>
                               </div>
                               <div class="form-actions clearfix">
                                  <div class="row">
                                     <div class="col-md-12">
                                        <div class="col-md-offset-1 col-md-10">
                                         <button type="submit" class="btn btn-primary"> <?php echo get_phrase('send');?> <i class="fa fa-envelope-o"></i></button>
                                         
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                         </form>
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
<script>
/* With Placeholders */
$(function(){
	
	$('#sms').validate(
             {
              rules: {
                number: {
                  required: true           
                },
				message: {
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