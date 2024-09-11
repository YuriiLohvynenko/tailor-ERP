<script type="text/javascript">
	function showAjaxModal(url,param2)
	{
		if(param2)
		{
			$('.hdmt').html(param2);	
		}
		// SHOWING AJAX PRELOADER IMAGE
		$('#modal_ajax .modal-body').html('<div style="text-align:center;"><img src="<?php echo base_url();?>assets/img/loaders/3.gif" /></div>');
		// LOADING THE AJAX MODAL
		$('#modal_ajax').modal('show', {backdrop: 'true'});
		// SHOW AJAX RESPONSE ON REQUEST SUCCESS 
		$.ajax({
			url: url,
			success: function(response)
			{
				jQuery('#modal_ajax .modal-body').html(response);
			}
		});
	}
</script>			
            <!-- SAMPLE BOX CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="modal_ajax" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					  <h4 class="modal-title hdmt"><?php echo get_phrase('model_box') ?></h4>
					</div>
					<div class="modal-body">
					  
                      
					</div>
					<div class="modal-footer">
					  <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo get_phrase('close');?></button>
					  <!--<button type="button" class="btn btn-primary">Save changes</button>-->
					</div>
				  </div>
				</div>
			  </div>
			<!-- /SAMPLE BOX CONFIGURATION MODAL FORM-->
<script type="text/javascript">
	function confirm_modal(delete_url)
	{
		$('#modal_delete').modal('show', {backdrop: 'static'});
		document.getElementById('delete_link').setAttribute('href' , delete_url);
	}
</script>
			
       		<div class="modal fade" id="modal_delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					  <h4 class="modal-title"><?php echo get_phrase('are_you_sure_to_delete') ?> ?</h4>
					</div>
					<!--<div class="modal-body">
					  
                      
					</div>-->
					<div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
					  <button type="button" class="btn btn-info" data-dismiss="modal"><?php echo get_phrase('close');?></button>
					  <a href="javascript:;" class="btn btn-danger" id="delete_link"><?php echo get_phrase('delete');?></a>
					</div>
				  </div>
				</div>
			  </div>
              
              
<!-- SAMPLE BOX CONFIRM MODAL FORM-->
<script type="text/javascript">
	function confirm_bootbox(url)
	{
		$('#modal_bootbox').modal('show', {backdrop: 'static'});
		document.getElementById('link').setAttribute('href' , url);
	}
</script>
			
       		<div class="modal fade" id="modal_bootbox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					  <h4 class="modal-title"><?php echo get_phrase('are_you_sure_about_this');?></h4>
					</div>
					<!--<div class="modal-body">
					  
                      
					</div>-->
					<div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
					  <button type="button" class="btn btn-info" data-dismiss="modal"><?php echo get_phrase('close');?></button>
					  <a href="javascript:;" class="btn btn-success" id="link"><?php echo get_phrase('ok');?></a>
					</div>
				  </div>
				</div>
			  </div>
