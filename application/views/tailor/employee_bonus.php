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
                                <a href=""><?php echo get_phrase($page_title)?></a>
                            </li>
                            <li><?php echo get_phrase('search');?> <?php echo get_phrase('bonus');?></li>
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
                <a class="close" data-dismiss="alert" href="#" aria-hidden="true">�</a>
                <h4><i class="fa fa-heart"></i> <?php echo $this->session->flashdata('flash_message'); ?></h4>
                </div>
                <? }?>
								<!-- BOX -->
								<div class="box border blue">
									<div class="box-title">
										<h4><i class="fa fa-list"></i> <?php echo get_phrase('bonus')?></h4>
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
                      
                       
                        <?php $attrib = array('class' => 'form-horizontal validate','id' => 'empBonusForm'); echo form_open(base_url().$roles.'/bonus/search', $attrib); ?>
                        
                        <div class="wizard-form">
                          <div class="wizard-content">
                            <div class="tab-content">
							 
                  								 
                                             <div class="form-group">
                                                <label class="control-label col-md-3"><?php echo get_phrase('month');?><span class="required"></span></label>
                                                <div class="col-md-4">
												<?php echo form_input('month', (isset($_POST['month']) ? $_POST['month'] :  ''), 'class="form-control tip-right date" data-original-title="'.get_phrase('end').' '.get_phrase('date') .'" id="monthYear" '); ?>
                                               
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
                                <button type="submit" name="sub" class="btn btn-primary"> <?php echo get_phrase('submit');?> <i class="fa fa-save"></i></button>
                                <!--<input type="hidden" name="act" value="setting_update"  />--> 
                                
                              </div>
                            </div>
                          </div>
                        </div>
                       <?php echo form_close();?> 
                      </div>
								</div>
								
								<div class="box border purple">
									<div class="box-title">
										<h4><i class="fa fa-list"></i><?php echo get_phrase('bonus')?></h4>
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
                                      <th><?php echo ucwords(get_phrase('s_no'));?> </th>                                  
                                      <th> <?php echo ucwords(get_phrase('ref_no'));?> </th>
                                       <th> <?php echo get_phrase('sub');?> <?php echo get_phrase('order');?>  <?php echo get_phrase('no');?></th>
                                      <th> <?php echo ucwords(get_phrase('employee'));?> <?php echo get_phrase('name'); ?></th>
                                      <th> <?php echo get_phrase('sub');?> <?php echo get_phrase('order');?>  <?php echo get_phrase('price');?></th>
									  <th> <?php echo ucwords(get_phrase('bonus'));?></th>
                                    </tr>
                                  </thead>
								  <tbody>
								  	
									<?php 
									$i=1;
									 	foreach($bonus as $bons){?>
								  	<tr>
										<td><?php echo $i;?></td>
										<td><?php echo $bons->reference_no;?></td>		
										<td><?php echo $bons->sid;?></td>									
										<td><?php echo $bons->workerName;?></td>															
										<td><?php echo $bons->subOrdPrice;?></td>
										<td><?php echo $bons->workerbonus;?></td>
												
									</tr>
									<?php $i++;} ?>
								  </tbody>
								  <tfoot>
                                    <tr>
                                      <th><?php echo ucwords(get_phrase('s_no'));?> </th>                                  
                                      <th> <?php echo ucwords(get_phrase('ref_no'));?> </th>
                                       <th> <?php echo get_phrase('sub');?> <?php echo get_phrase('order');?>  <?php echo get_phrase('no');?></th>
                                      <th> <?php echo ucwords(get_phrase('employee'));?> <?php echo get_phrase('name'); ?></th>
                                      <th> <?php echo get_phrase('sub');?> <?php echo get_phrase('order');?>  <?php echo get_phrase('price');?></th>
									  <th> <?php echo ucwords(get_phrase('bonus'));?></th>
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
<script type="text/javascript">
$(function() {
  
	$( "#monthYear" ).datepicker({
      changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'mm/yy',
        onClose: function(dateText, inst) { 
            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            $(this).datepicker('setDate', new Date(year, month, 1));
        }
    });
	
	$('.print').click(function() {
		$('#formDiv').hide();
        window.print();
		$('#formDiv').show();
    });
 });
 </script>