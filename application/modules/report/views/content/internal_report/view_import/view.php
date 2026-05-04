<div class="container-fluid">
	<div id="panel_content_<?php echo $methodid ?>">
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

										<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
											<div class="card-body">
												<form class="form" id="form_<?php echo $methodid ?>">
												 <div class="col-xl-8">
												<div class="form-inline mb-4" >
												   <div class="form-group">
												      <label for="inputPassword6" >Periode : &nbsp </label>
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="fa fa-calendar"></i></span>
															</div>
															<input class="form-control" id="form_<?php echo $methodid ?>_date_start"  name="date_start" type="text" value="<?php echo date("Y-m-d", strtotime( date( "Y-m-d", strtotime( date("Y-m-d") ) ) . "-1 month" ) ) ?>" />
														</div>
														
														 &nbsp S / D &nbsp 
														
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="fa fa-calendar"></i></span>
															</div>
															<input class="form-control" id="form_<?php echo $methodid ?>_date_end"  name="date_end" type="text" value="<?php echo date("Y-m-d") ?>" />
														</div>
												   </div>
												 </div>
												 </div> 
												 
												 <div class="col-xl-4 mb-4">
												  <?php 
					                                  // $this->ecc_library->form2('select_pop_custom','Dokumen',"form_".$methodid,'item_kode_barang','','','get_item_detail','4');	
													   $this->ecc_library->form2('select_pop_custom','Dokumen',"form_".$methodid,'type_bc_id','','','get_custom_in','4');	
			                                      ?>							  
												 </div>	
												
													<div class="form-group">
													   	  &nbsp &nbsp
														<button type="button" class="btn btn-default" onclick="javascript:search_<?php echo $methodid ?>();">
															<i class="fa fa-search"></i> Search
														</button> 
														
														&nbsp &nbsp
													<!--	<button type="button" class="btn btn-default" onclick="javascript:print_<?php //echo $methodid ?>('xlsx');">
															<i class="fa fa-search"></i> Print Xlsx
														</button> -->
													</div>									
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-xl-12">
								<table id="table_<?php echo $methodid ?>_view_import"></table>
								<div id="ptable_<?php echo $methodid ?>_view_import"></div>                                                     
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
		<input type="hidden" id="form_<?php echo $methodid ?>_print_date_start" name="date_start" value="" />
		<input type="hidden" id="form_<?php echo $methodid ?>_print_date_end" name="date_end" value="" />
		<input type="hidden" id="form_<?php echo $methodid ?>_print_format" name="format" value="" />
		<input type="hidden" id="form_<?php echo $methodid ?>_print_print" name="print" value="1" />
	</form>
</div>