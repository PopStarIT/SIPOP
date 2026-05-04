<style>
	.modal-ku {
	  width: 700px;
	  margin: auto;
	}
	
	.modal-log {
	  width: 1500px;
	  margin: auto;
	  height: 50;
	}
</style>
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
									<input type="hidden"id="txt_<?php echo $methodid ?>_header"  value="0" />
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

<div class="modal modal-ku fade" id="mdl_pengoloran_<?php echo $methodid ?>" role="dialog" aria-hidden="true" data-toggle="modal" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			 <div class="modal-header">
				 <div class="">
					<h6>Login Ceisa40</h6>
				  </div>
			 </div>
			<div class="modal-body">
				
				<div class="form-group">
					<div class="col-xl-8">
						<div class="row"  >
							<label for="inputPassword6">Username : &nbsp </label>
							<div class="input-group">
								<input class="form-control" type="text" name="username_<?php echo $methodid ?>" id="username_<?php echo $methodid ?>" value="eximpopstar" />
							</div>
						</div>
					</div>
					<div class="col-xl-8">
						<div class="row"  >
							<label for="inputPassword6">Password : &nbsp </label>
							<div class="input-group">
								<input class="form-control" type="password" name="password_<?php echo $methodid ?>" id="password_<?php echo $methodid ?>" value="P0pnanjung99" />
							</div>
						</div>
					</div>	
				</div>
				
			</div>
			<div class="modal-footer">
				
				<div class="btn-group">
					<button class="btn btn-sm btn-primary" id="btnproseslogin_<?php echo $methodid ?>"><i class="fa fa fa-unlock"></i> Login</button>
				</div>
				<div class="btn-group">
					<button class="btn btn-sm btn-danger" id="btnclose_login_<?php echo $methodid ?>"><i class="fa fa-exclamation"></i> Close</button>
				</div>
			</div>
		</div>
	</div>	
</div>

<!-- modar log respon -->
<!----- modal -->
<div class="modal modal-log fade" id="mdl_log_respon_<?php echo $methodid ?>" tabIndex="-1" role="dialog" aria-hidden="true" data-toggle="modal" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-lg  modal-dialog-centered" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			 <div class="">
				<h6>RESPONSE LOGS CEISA40</h6>
			  </div>
		  </div>
		  <div class="modal-body">
			<div class="tab-content">
				<div class="tab-pane fade active show" id="tabheader_<?php echo $methodid ?>" >
					<div class="row">
						<div class="form-inline" id="form_<?php echo $methodid ?>">
							<div class="form-group" >
								&nbsp &nbsp
								&nbsp &nbsp
								<button class="btn btn-sm btn-default" id="btnprint_log_<?php echo $methodid ?>">
									<i class="fa fa fa-print"></i> Print
								</button>
								&nbsp &nbsp
								<!--
								<button class="btn btn-sm btn-default" id="btndel_log_<?php echo $methodid ?>">
									<i class="fa fa fa-trash-o"></i> Delete
								</button>
								-->
								&nbsp &nbsp
								
								&nbsp &nbsp
							</div>	
						</div>
					</div>
					<br />
					<div class="row"  >
						<div class="col-xl-12 grid_container_<?php echo $methodid ?>_responlogs" >
							<table id="table_<?php echo $methodid ?>_responlogs"></table>
							<div id="ptable_<?php echo $methodid ?>_responlogs"></div>                                        
						</div>
					</div>
				</div>
			</div> 
		  </div>
		  
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  
		</div>
	</div>
</div>
<!----  -->


