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
	
	<div class="modal fade" id="modal_<?php echo $methodid ?>_upload" tabIndex="-1" role="dialog" aria-hidden="true" data-toggle="modal" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<div class="modal-title" id="exampleModalLabel">
			   <div class="mb-30">
				<h6>incoming UPLOAD</h6>
				<p></p>
			  </div>
			</div>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<form method="post" action="javascript:post_<?php echo $methodid ?>_upload();" id="form_<?php echo $methodid ?>_upload" enctype="multipart/form-data" >
			  <?php														
				$this->ecc_library->form('hidden','',"form_".$methodid."_detail",$this->security->get_csrf_token_name(),$this->security->get_csrf_hash());
			  ?>	
			  <label for="userfile_<?php echo $methodid ?>_bom">select file: </label>
			  <input type="file" name="userfile_<?php echo $methodid ?>_incoming_inventory" id="userfile_<?php echo $methodid ?>_incoming_inventory" size="40" />
			  <input type="submit" name="submit" id="submit" value="UPLOAD" />
			  
			 
		   </form>
		   
		   <hr>
		   <div id="files" style="font-weight:bold;font-size:17px;"></div>
		   
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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