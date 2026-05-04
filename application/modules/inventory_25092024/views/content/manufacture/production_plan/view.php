<div class="container-fluid">
	<div class="row">
		<div class="col-xl-12">
			<div class="card card-statistics"> 
				<div class="card-body">
					<div class="row">
						<div class="col-xl-12">
							<div id="accordion">
								<div class="card">
									<div class="card-header" id="headingOne">
										<h5 class="mb-0">
											<?php echo $page_title ?>
										</h5>
									</div>
									
									<div id="panel_content_<?php echo $methodid ?>">
										<?php $this->load->view($path_template.'/library/content/dashboard_table2'); ?>
									</div>
									
									<div id="panel_content_form_<?php echo $methodid ?>" style="display:none">
										<?php
											if(isset($view_load_form)){
												$this->load->view('content/'.$view_load_form);
											}
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div id="panel_print_<?php echo $methodid ?>" style="display:none"></div>
	
	<form id="form_<?php echo $methodid ?>_print" action="<?php echo base_url() . $class_uri ?>/loaddata" method="POST" target="panel_print_<?php echo $methodid ?>" style="display:none">
		<input type="hidden" id="form_<?php echo $methodid ?>_print_csrf" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>" />
		<input type="hidden" id="form_<?php echo $methodid ?>_print_format" name="format" value="" />
		<input type="hidden" id="form_<?php echo $methodid ?>_print_print" name="print" value="1" />
	</form>
</div>

<div class="modal fade" id="mdl_monitoring" tabindex="-1" role="dialog" aria-labelledby="dailyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
       <div class="modal-content">
	      <div class="modal-header">
            <h5 class="modal-title" id="dailyModalLabel">Monitoring Production Plan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
              <span aria-hidden="true">&times;</span>
            </button>
		  </div>
		  
		  <div id="panel_content_<?php echo $methodid ?>">
		 	<?php $this->load->view($path_template.'/library/content/dashboard_table2'); ?>
		 </div>
	  </div>>
    </div>
 </div>