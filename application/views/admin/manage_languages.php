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
                        <div class="description"><?=$breadcrumbs?></div>
                    </div>
                </div>
            </div>
            <!-- /PAGE HEADER -->
            <!-- SAMPLE -->
            <div class="row">
                <div class="col-md-12">
                	<?php if (!isset($edit_profile)):?>
                    <!-- BOX -->
                    <div class="box border inverse">
                        <div class="box-title">
                            <h4><i class="fa fa-table"></i> <?php echo get_phrase('language_list');?></h4>
                            <div class="tools">
                                <a href="javascript:;" onclick="showAjaxModal('<?php echo base_url().'modal/popup/add_language';?>','<?php echo get_phrase('add_language');?>');" rel="tooltip" data-placement="top" data-original-title="<?php echo get_phrase('add_language');?>" class="tip config">
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
                        <div class="box-body">
                        	<table class="table table-bordered">
                                <tr>
                                    <td>
                                        <a href="javascript:;" onclick="showAjaxModal('<?php echo base_url().'modal/popup/add_phrase';?>','<?php echo get_phrase('add_phrase');?>');" rel="tooltip" data-placement="top" data-original-title="<?php echo get_phrase('add_phrase');?>" class="tip btn btn-success"><i class="fa fa-pencil"></i> <?php echo get_phrase('new_phrase');?></a>
                                        
                                        
                                        <a href="javascript:;" onclick="showAjaxModal('<?php echo base_url().'modal/popup/add_language';?>','<?php echo get_phrase('add_language');?>');" rel="tooltip" data-placement="top" data-original-title="<?php echo get_phrase('add_language');?>" class="tip btn btn-info"><i class="fa fa-plus"></i> <?php echo get_phrase('new_language');?></a>
                                    </td>
                                </tr>
           
       
        				</table>
                              
                              
                            <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th><?php echo get_phrase('s_no');?></th>
                                    <th><?php echo get_phrase('language');?></th>
                                    <th><?php echo get_phrase('action');?></th>
                                  </tr>
                                </thead>
                                <tbody>
            <?php
                    $fields = $this->db->list_fields('language');
                    $i=1;
                    foreach($fields as $field)
                    {
                         if($field == 'phrase_id' || $field == 'phrase')continue;
                        ?>
            <tr>
                <td><?php echo $i;?></td>
                <td><?php echo ucwords($field);?></td>
                <td>
                	<a href="javascript:;" onclick="showAjaxModal('<?php echo base_url().'modal/popup/add_phrase';?>','<?php echo get_phrase('add_phrase');?>');" rel="tooltip" data-placement="top" data-original-title="<?php echo get_phrase('add_phrase');?>" class="tip btn btn-success"><i class="fa fa-pencil"></i></a>
                    
                    <a href="<?=base_url().$this->session->userdata('roles')?>/manage_languages/edit_phrase/<?php echo $field;?>" class="btn btn-info tip" title="" data-original-title="<?php echo get_phrase('edit_phrase');?>"><i class="fa fa-edit"></i></a>
                    <a href="javascript:;" onclick="confirm_modal('<?=base_url().$this->session->userdata('roles')?>/manage_languages/delete_language/<?php echo $field;?>');" class="btn btn-danger tip" title="" data-original-title="<?php echo get_phrase('delete_language');?>"><i class="fa fa-trash-o"></i></a>
                    
                </td>
            </tr>
            <?php
            $i++;}
            ?>
        </tbody>
                              </table>
                        </div>
                    </div>			
                    <!-- /BOX -->
             		<?php endif;?> 
                          
                    <?php if (isset($edit_profile)):?>
                    
                    <!-- BOX -->
                    <div class="box border red" id="formWizard">
                        <div class="box-title">
                            <h4><i class="fa fa-bars"></i><?=ucwords($page_title)?></h4>
                            <div class="tools hidden-xs">
                                <a href="javascript:;" onclick="showAjaxModal('<?php echo base_url().'modal/popup/add_phrase';?>','<?php echo get_phrase('add_phrase');?>');" rel="tooltip" data-placement="top" data-original-title="<?php echo get_phrase('add_phrase');?>" class="tip config"><i class="fa fa-plus"></i></a>
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
           
            			<?php $current_editing_language	=	$edit_profile;
						echo form_open($roles.'/manage_languages/update_phrase/'.$current_editing_language  , array('id' => 'phrase_form','class' => 'form-horizontal'));?>
                        
                        
                        <div class="wizard-form">
                               <div class="wizard-content">
                                  <div class="tab-content">
                                  <div class="tab-pane active" id="account">
                                     <?
									 $count = 1;
						$language_phrases	=	$this->db->query("SELECT `phrase_id` , `phrase` , `$current_editing_language` FROM `language`")->result_array();
						
						foreach($language_phrases as $row)
						{
							$phrase_id = $row['phrase_id'];					//id number of phrase
							$phrase = $row['phrase'];						//basic phrase text
							$phrase_language = $row[$current_editing_language];	//phrase of current editing language
							$color = "green";
							if($count%2==0){
								$color = "blue";
							}
						
?>
                                     
                       <div class="col-md-4">
                        <!-- PAGERS -->
                        <div class="box border <?php echo $color; ?>">
                            <div class="box-title">
                                <h4><i class="fa fa-table"></i><?php echo $count++;?>. <?php echo $row['phrase'];?></h4>
                                
                            </div>
                            <div class="box-body">              
                        <div class="form-group">
                           <div class="col-md-12">
                              <input class="form-control" type="text" name="phrase<?php echo $row['phrase_id'];?>" value="<?php echo $phrase_language;?>" >
                           </div>
                        </div>
                        </div>
                        </div>
                        <!-- /PAGERS -->
                    </div>               
                                       
                        <?php  } ?>        
                                 </div>    
                                  </div>
                               </div>
                               <div class=" clearfix">
                                  <div class="row">
                                     <div class="col-md-12">
                                        <div class="col-md-offset-3 col-md-9">
                                           
                                         <button type="submit" class="btn btn-primary" onClick="document.getElementById('phrase_form').submit();"> <?php echo get_phrase('save');?> <i class="fa fa-save"></i></button>
                                         <input type="hidden" name="total_phrase" value="<?php echo $count;?>" />
                        
                                                                      
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
							
						 
						 
						 <?php echo form_close();?>
                        </div>
                    </div>
                    <!-- /BOX -->
                     
                     <?php endif;?>
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