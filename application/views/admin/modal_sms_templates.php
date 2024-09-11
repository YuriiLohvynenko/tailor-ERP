<?php
$edit_data=$this->db->get_where('smstemplate' , array('id' => $param3) )->result_array();
foreach ( $edit_data as $r):
$row = $r;
endforeach;
if($param2=="edit_sms_template")
{
	$formAction = "do_update/".$param3;
}
else
{
	$formAction = "add_sms_template/";
}
?>
<div class="box border green" id="formWizard">
                        <div class="box-title">
                            <h4><i class="fa fa-bars"></i><?php echo get_phrase('sms')?> <?php echo get_phrase('template')?> </h4>
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
           
<?php echo form_open('admin/sms_templates/'.$formAction , array('id' => 'smsTempForm', 'class' => 'form-horizontal'));?>
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('title');?> <span class="required">*</span></label>
                                           <div class="col-md-7">
                                              <input type="text" class="form-control" name="title" value="<?php echo $row['title']; ?>"/>
                                              
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                         <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('content');?> <span class="required">*</span></label>
                                           <div class="col-md-7">
                                              <textarea rows="10" cols="8" class="form-control" name="content"><?php echo $row['content']; ?></textarea>                                        
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                        
                               <div class="form-actions clearfix">
                                  <div class="row">
                                     <div class="col-md-12">
                                        <div class="col-md-offset-3 col-md-9">
                                           
                                         <button type="submit" class="btn btn-primary"> <?php echo get_phrase('save');?> <i class="fa fa-save"></i></button>
                                        </div>
                                     </div>
                                  </div>
                               </div>
							
						 
						 
						 <?php echo form_close();?>
						 <table class="table table-bordered">
							<thead>
							  <tr>
								<th><?php echo get_phrase('type') ?></th>
								<th><?php echo get_phrase('legend') ?></th>
								<th><?php echo get_phrase('type') ?></th>
								<th><?php echo get_phrase('legend') ?></th>
							  </tr>
							</thead>
							<tbody>
								<tr>
								<th><?php echo get_phrase('current') ?> <?php echo get_phrase('year') ?></th>
								<td>{CURRENT_YEAR}</td>
								<th><?php echo get_phrase('today') ?> <?php echo get_phrase('date') ?></th>
								<td>{DATE}</td>
							  </tr>	
							  <tr>
								<th><?php echo get_phrase('system') ?> <?php echo get_phrase('name') ?></th>
								<td>{systemName}</td>
								<th><?php echo get_phrase('system') ?> <?php echo get_phrase('url') ?></th>
								<td>{systemUrl}</td>
							  </tr>	
							 <tr>
								<th><?php echo get_phrase('system') ?> <?php echo get_phrase('email') ?></th>
								<td>{systemEmail}</td>
								<th><?php echo get_phrase('system') ?> <?php echo get_phrase('address') ?></th>
								<td>{systemAddress}</td>
							  </tr>	
							  <tr>
								<th><?php echo get_phrase('user') ?> <?php echo get_phrase('name') ?></th>
								<td>{userName}</td>
								<th><?php echo get_phrase('user') ?> <?php echo get_phrase('email') ?></th>
								<td>{userEmail}</td>
							  </tr>
							  <tr>
								<th><?php echo get_phrase('user') ?> <?php echo get_phrase('password') ?></th>
								<td>{password}</td>
								<th><?php echo get_phrase('sms') ?> <?php echo get_phrase('title') ?></th>
								<td>{smsTitle}</td>
							  </tr>
							  <tr>
								<th><?php echo get_phrase('order') ?> <?php echo get_phrase('no') ?></th>
								<td>{orderNo}</td>
								<th><?php echo get_phrase('ref_no') ?> </th>
								<td>{refNo}</td>
							  </tr>
							  <tr>
								<th><?php echo get_phrase('no') ?> <?php echo get_phrase('of') ?> <?php echo get_phrase('sub') ?> <?php echo get_phrase('order') ?></th>
								<td>{noofsuborder}</td>
								<th><?php echo get_phrase('item') ?> <?php echo get_phrase('name') ?></th>
								<td>{itemName}</td>
							  </tr>
							  <tr>
								<th><?php echo get_phrase('total') ?> (<?php echo get_phrase('without') ?> <?php echo get_phrase('tax') ?>/<?php echo get_phrase('discount') ?>)</th>
								<td>{total}</td>
								<th><?php echo get_phrase('total') ?> (<?php echo get_phrase('with') ?> <?php echo get_phrase('tax') ?>/<?php echo get_phrase('discount') ?>)</th>
								<td>{totalPay}</td>
							  </tr>
							  <tr>
								<th><?php echo get_phrase('paid') ?> <?php echo get_phrase('amount') ?></th>
								<td>{paidAmount}</td>
								<th><?php echo get_phrase('due') ?> <?php echo get_phrase('amount') ?></th>
								<td>{dueAmount}</td>
							  </tr>
							  <tr>
								<th><?php echo get_phrase('tax') ?> </th>
								<td>{tax}</td>
								<th><?php echo get_phrase('discount') ?> </th>
								<td>{discount}</td>
							  </tr>
							  <tr>
								<th><?php echo get_phrase('payment') ?> <?php echo get_phrase('type') ?></th>
								<td>{paymentType}</td>
								<th>&nbsp;</th>
								<td>&nbsp;</td>
							  </tr>
							  
							</tbody>
						  </table>
                        </div>
                    </div>

<script type="text/javascript">
$(document).ready(function() {
	
$('#smsTempForm').validate(
             {
              rules: {
                title: {
                  required: true
                },
				content: {
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