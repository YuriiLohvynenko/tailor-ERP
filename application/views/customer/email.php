<div class="container">
<?php $datavalue=""; ?>
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
                        <div class="description"><?php echo get_phrase('email');?></div>
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
           
            <form method="post" action="<?php echo base_url()?><?=$roles?>/send_bulk_email" class="form-horizontal validate" enctype="multipart/form-data" id="email">
                            <div class="wizard-form">
                               <div class="wizard-content">
                                  <div class="tab-content">
                                     <div class="tab-pane active" id="account">
                                     <div class="form-group col-md-offset-1 col-md-11">
                                     <!--<h3><?php echo get_phrase('email');?></h3> -->
                                     </div>
                                        <div class="form-group">
                                           <label class="control-label col-md-2"><?php echo get_phrase('select_template');?><span class="required">*</span></label>
                                           <div class="col-md-4">
                                              <select id="select2" name="template" class="col-md-12 select2-offscreen" onchange="selectTemp()">
                                              	<option></option>
                                              <?php foreach($this->crud_model->get_emailTemp_Type_List() as $opt):?>
                                              <optgroup label="<?php echo ucwords($opt['type'])?>">
                                                <?php foreach($this->crud_model->get_emailTemp_Title_List($opt['type']) as $cl): ?>
                                                <option <?php if($row['id']==$cl["id"]){echo "selected";} ?> value="<?php echo $cl["id"] ?>"><?php echo $cl["title"]; ?></option>
												<?php  endforeach; ?>
                                                </optgroup>
                                                <?php  endforeach; ?>
                                                </select>
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                             
                                             <div class="form-group">
											 <label class="col-md-2 control-label" for="e4"><?php echo get_phrase('email');?> </label> 
											<div class="col-md-4">
                                                <select multiple name="email[]" class="col-md-12 e4">
												   <option></option>
                                                   <?php foreach($emails as $email){?>
                          <option  value="<?php echo $email->email; ?>"><?php echo $email->name; ?>  [<?php echo $email->email;?>] </option>
                          <?php }?>
						</select>	
                                                </div>	
                                                 <span class="error-span"></span>										
											 </div>

                                        <div class="form-group">
                                           <label class="control-label col-md-2"><?php echo get_phrase('BCC');?></label>
                                           <div class="col-md-4">
                                              <input type="text" class="form-control" name="bcc" />
                                             
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-2"><?php echo get_phrase('subject');?></label>
                                           <div class="col-md-4">
                                              <input type="text" class="form-control" name="subject" />
                                           
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-2"><?php echo get_phrase('attachment');?></label>
                                           <div class="col-md-4">                                        
                                           <input type="file" class="form-control" name="attachment[]" id="attachment"   multiple/>                                            
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-2"><?php echo get_phrase('message');?></label>
                                           <div class="col-md-9">
                                             <textarea class="ckeditor" name="editor1" id='abc'>
                                             
                                             </textarea>
                                           </div>
                                        </div>
                                        
                                       
                                        
                                     </div>
                                  </div>
                               </div>
                               <div class="form-actions clearfix">
                                  <div class="row">
                                     <div class="col-md-12">
                                        <div class="col-md-offset-1 col-md-10">
                                         <button type="submit" class="btn btn-primary"> <?php echo get_phrase('send_email');?> <i class="fa fa-envelope"></i></button>
                                         
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
	$(".e4").select2({
			 placeholder: "Select",
			minimumInputLength: 2
	});
	$('#email').validate(
             {
              rules: {
                template: {
                  required: true
                },
				email: {
                  required: true
               },
                subject: {
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
		
function selectTemp()
{
	var id=$( "#select2 option:selected" ).val();
	 $.ajax({
                            type:'POST',
                            url:"<?php echo base_url()?><?=$roles?>/getTemplate",
                            data: {id: id},
                            success: function(data){
								//console.log(data);
                            CKEDITOR.instances.abc.setData( data );
                              },
                              error: function(){
                                alert("error");
                              }
                        });
}
</script>