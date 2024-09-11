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
                            <!--<li>
                                <a href=""><?php echo get_phrase('customers');?></a>
                            </li>-->
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
            <!-- EXPORT TABLE -->
            	<?php if($this->session->flashdata('message')) { echo "<div class=\"alert alert-block alert-danger fade in\"><a href=\"#\" class=\"close\" aria-hidden=\"true\" data-dismiss=\"alert\">×</a><h4><i class=\"fa fa-times\"></i> ". get_phrase('oh_snap_error')."</h4><p>" . $this->session->flashdata('message') . "</p></div>"; } ?>
                 <?php if($this->session->flashdata('flash_message')){ ?>
                <div class="alert alert-block alert-success fade in">
                <a class="close" data-dismiss="alert" href="#" aria-hidden="true">×</a>
                <h4><i class="fa fa-heart"></i> <?php echo $this->session->flashdata('flash_message'); ?></h4>
                </div>
                <? }?>
				<div class="row">
    <div class="col-md-12">
        <!-- BOX -->
        <div class="box border">
            <div class="box-title">
                <h4><i class="fa fa-calendar"></i>Calendar</h4>
                <div class="tools">
                    <a href="#box-config" data-toggle="modal" class="config">
                        <i class="fa fa-cog"></i>
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
                <div class="row">
                    <div class="col-md-12">
                        <div id='calendar'></div>
                    </div>
                </div>
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
<script>
$(function () {
		
	
		/* initialize the calendar
		-----------------------------------------------------------------*/
		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();
		
		var calendar = $('#calendar').fullCalendar({
			//theme: true,
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			selectable: true,
			selectHelper: true,
			//disableDragging: true,
			select: function(start, end, allDay) {
				bootbox.prompt('<?php echo get_phrase('event') ?> <?php echo get_phrase('title') ?>:',function(gotit){
				if (gotit) {
					 $.ajax({
                         type: "post",
                                 async: false,
                                 url: "<?php echo base_url();?><?php echo $roles; ?>/addEvents",
                                 data: {  'title':gotit, 'start':start, 'end':end },
                                 success: function(data) {
                                     calendar.fullCalendar('renderEvent',
										{
											title: gotit,
											start: start,
											end: end,
											allDay: allDay
										},
										true // make the event "stick"
									);
                                 },                       
                         });
			}});
				calendar.fullCalendar('unselect');
			},
			eventMouseover: function(event, jsEvent, view) {
	                $(jsEvent.target).attr('title', event.title);
	                $('.fc-event').css('cursor', 'pointer');  
        	},
			eventClick: function(calEvent, jsEvent, view)
	        {
	             bootbox.confirm("<?php echo get_phrase('are_you_sure_to_delete') ?> " + calEvent.title, function(got){
	             	if (got)
		              {
		              	$.ajax({
                         type: "post",
                                 async: false,
                                 url: "<?php echo base_url();?><?php echo $roles; ?>/deleteEvents",
                                 data: {  'id':calEvent._id},
                                 success: function(data) {
                                 	if(data){
                                      $('#calendar').fullCalendar('removeEvents', calEvent._id);                                     
                                     }
                                 },                       
                         });		          
		              }
	             });
	        },
	        //droppable: false,
	        editable: false,
			events: [
				<?php $i=1; foreach($cal_data as $gE){if($i%2=='0'){$color = 'blue';}else{$color='green';}?>
				{
					id: <?php echo $gE->id; ?>,
					title: '<?php echo html_entity_decode($gE->data); ?>',
					start: new Date('<?php echo $gE->date; ?>'),
					end: new Date('<?php echo $gE->end; ?>'),
					allDay: true,
					backgroundColor: Theme.colors.<?php echo $color; ?>,
				},
				<?php $i++;}?>
			]
		});
		
});
</script>