<div class="box border green" id="formWizard">
                        <div class="box-title">
                            <h4><i class="fa fa-bars"></i><?php echo get_phrase('add_phrase');?></h4>
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
           
            			<?php echo form_open('admin/manage_languages/add_phrase/' , array('id' => 'phraseForm', 'class' => 'form-horizontal'));?>
                        
                        <div class="wizard-form">
                               <div class="wizard-content">
                                  <div class="tab-content">
                                    <div class="tab-pane active" id="account">
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('phrase');?> <span class="required">*</span></label>
                                           <div class="col-md-6">
                                              <input type="text" class="form-control" name="phrase" />
                                              
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                               <div class="form-actions clearfix">
                                  <div class="row">
                                     <div class="col-md-12">
                                        <div class="col-md-offset-3 col-md-9">
                                           
                                         <button type="submit" class="btn btn-primary"> <?php echo get_phrase('add_phrase');?> <i class="fa fa-save"></i></button>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
							
						 
						 
						 <?php echo form_close();?>
                        </div>
                    </div>
<script type="text/javascript">
$(document).ready(function() {
$('#phraseForm').validate(
             {
              rules: {
                phrase: {
                  required: true
                }
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