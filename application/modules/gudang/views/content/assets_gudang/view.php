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
										
										<div class="tab tab-border">
											<ul class="nav nav-tabs form_tab_<?php echo $methodid ?>" role="tablist">
												<li class="nav-item">
													<a class="nav-link active show" id="tab_<?php echo $methodid; ?>_stock" data-toggle="tab" href="#content_<?php echo $methodid; ?>_stock" role="tab" aria-controls="content_<?php echo $methodid; ?>_stock" aria-selected="true">
														<i class="fa fa-cog"></i> Stock
													</a>	
												</li>
												
												<li class="nav-item">
													<a class="nav-link" id="tab_<?php echo $methodid; ?>_incoming" data-toggle="tab" href="#content_<?php echo $methodid; ?>_incoming" role="tab" aria-controls="content_<?php echo $methodid; ?>_incoming" aria-selected="true">
														<i class="fa fa-cog"></i> Incoming
													</a>	
												</li>

												<li class="nav-item">
													<a class="nav-link" id="tab_<?php echo $methodid; ?>_outgoing" data-toggle="tab" href="#content_<?php echo $methodid; ?>_outgoing" role="tab" aria-controls="content_<?php echo $methodid; ?>_outgoing" aria-selected="true">
														<i class="fa fa-cog"></i> Outgoing
													</a>	
												</li>
											</ul>
										</div>
										
										<div class="tab-content">
											<div class="tab-pane fade active show" id="content_<?php echo $methodid; ?>_stock" role="tabpanel" aria-labelledby="tab_<?php echo $methodid; ?>_stock">
												<div class="row">
													<div class="col-xl-12">
														<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
															<div class="card-body">
																<form class="ui grid ecc_form" id="form_<?php echo $methodid ?>_assets">
																	<div class="form-group">
																		<div class="col-xl-12">
																			<?php 	
																				$this->ecc_library->form('select','Item Category :',"form_".$methodid,'item_category_id','','','item_category');	
																			?>
																		</div>
																	</div>  
																</form>
															    <button type="button" class="btn btn-default" onclick="javascript:print_<?php echo $methodid ?>_asset('xlsx');">
																	<i class="fa fa-search"></i> Print Xlsx
																</button>
															</div>
														</div>
													</div>
												</div>
												
												<div class="row mb-10 ml-10">
													<div class="col-xl-12">
														<?php 
															$extra_field = array();
															$extra_field[] = array('field' => 'item_category_id','form_id' => 'form_'. $methodid .'_item_category_id');
															$extra_param = array('methodid'=> $methodid,'extra_param' => $extra_field);
															$this->ecc_library->jqgrid($methodid."_asset", $dashboard_table['field_asset'], $dashboard_table['field_asset_loaddata'],$extra_param); 
														?>
													</div>
												</div>
											</div>
											
											<div class="tab-pane fade" id="content_<?php echo $methodid; ?>_incoming" role="tabpanel" aria-labelledby="tab_<?php echo $methodid; ?>_incoming">
												<div class="row">
												   <div class="col-xl-12">
													  <form class="ui grid ecc_form" id="form_<?php echo $methodid ?>_incoming">
														 <div class="form-group">
															<div class="col-xl-12">
															   <?php 	
																  $this->ecc_library->form('select','Item :',"form_".$methodid,'item_id_incoming','','','get_item_detail');	
																  $this->ecc_library->form('hidden','',"form_".$methodid."_incoming",$this->security->get_csrf_token_name(),$this->security->get_csrf_hash());	
																  $this->ecc_library->form('hidden','',"form_".$methodid."_incoming",'item_code','');
																  $this->ecc_library->form('hidden','',"form_".$methodid."_incoming",'stock_move_id','');
																  $this->ecc_library->form('hidden','',"form_".$methodid."_incoming",'item_id','');
															   ?>
															</div>
														 </div>  
													  </form>
													  <button type="button" class="btn btn-default" onclick="javascript:print_<?php echo $methodid ?>_incoming('xlsx');">
														<i class="fa fa-search"></i> Print Xlsx
													  </button>
												   </div>
												</div>
												
												<div class="row mb-10 ml-10">
													<div class="col-xl-12">
														<?php 
															$extra_field = array();
															$extra_field[] = array('field' => 'item_id','form_id' => 'form_'. $methodid .'_item_id_incoming');
															$extra_param = array('methodid'=> $methodid,'footer_data'=> true,'onclick'=> 'click_item_incoming_'.$methodid,'extra_param' => $extra_field);
															$this->ecc_library->jqgrid($methodid."_incoming", $dashboard_table['field_incoming'], $dashboard_table['field_incoming_loaddata'],$extra_param); 
														?>
													</div>
												</div>
												
												<div class="row mb-10 ml-10">
													<div class="col-xl-10">
													<?php 
												//		$extra_field = array();
												//		$extra_field[] = array('field' => 'item_code','form_id' => 'form_'. $methodid .'_incoming_item_code');
												//		$extra_field[] = array('field' => 'stock_move_id','form_id' => 'form_'. $methodid .'_incoming_stock_move_id');
												//		$extra_field[] = array('field' => 'item_id','form_id' => 'form_'. $methodid .'_incoming_item_id');
												//		$extra_param = array('methodid'=> $methodid,'footer_data'=> true,'extra_param' => $extra_field);
												//		$this->ecc_library->jqgrid($methodid."_incoming_transfer", $dashboard_table['field_incoming_transfer'], $dashboard_table['field_incoming_transfer_loaddata'],$extra_param); 
													?>
													
													</div>
													
												</div>
												<div class="row ml-10">
										          <div class="col-xl-8 mb-30 ">
												     <div class="row">
												      <div class="col-xl-12">
													   <?php 
														$extra_field = array();
														$extra_field[] = array('field' => 'item_code','form_id' => 'form_'. $methodid .'_incoming_item_code');
														$extra_field[] = array('field' => 'stock_move_id','form_id' => 'form_'. $methodid .'_incoming_stock_move_id');
														$extra_field[] = array('field' => 'item_id','form_id' => 'form_'. $methodid .'_incoming_item_id');
														$extra_param = array('methodid'=> $methodid,'footer_data'=> true,'extra_param' => $extra_field);
													//	$this->ecc_library->jqgrid($methodid."_incoming_transfer", $dashboard_table['field_incoming_transfer'], $dashboard_table['field_incoming_transfer_loaddata'],$extra_param); 
														?>
													  </div>
												    </div>
												  </div>
												  <div class="col-xl-4 mb-30">
												   <div class="col-xl-12">
												   <form class="ui grid ecc_form" id="form_<?php echo $methodid ?>_download_excel_incoming_detail" action="javascript:download_<?php echo $methodid ?>_excel_incoming_detail()">
												    <?php
													 $this->ecc_library->form('hidden','',"form_".$methodid."_download_excel_incoming_detail",'item_code','');
													 $this->ecc_library->form('hidden','',"form_".$methodid."_download_excel_incoming_detail",'stock_move_id','');
													 $this->ecc_library->form('hidden','',"form_".$methodid."_download_excel_incoming_detail",'item_id','');
													?>
													<!--<div class="input-group ">
													 <button type="submit" class="btn btn-success">
														<i class="fa fa-print"></i> Download excel detail
													 </button> -->
												    </div> 
												   </form>
												    </div>
												  </div>
												</div>
											 
											 
											 <div class="tab-pane fade" id="content_<?php echo $methodid; ?>_outgoing" role="tabpanel" aria-labelledby="tab_<?php echo $methodid; ?>_outgoing">
												<div class="row">
												   <div class="col-xl-12">
													  <form class="ui grid ecc_form" id="form_<?php echo $methodid ?>_outgoing">
														 <div class="form-group">
															<div class="col-xl-12">
															   <?php 	
															      $this->ecc_library->form('hidden','',"form_".$methodid."_outgoing",$this->security->get_csrf_token_name(),$this->security->get_csrf_hash());	
																  $this->ecc_library->form('select','Item :',"form_".$methodid,'item_id_outgoing','','','get_item_detail');	
																  $this->ecc_library->form('hidden','',"form_".$methodid."_outgoing",'item_code','');
																  $this->ecc_library->form('hidden','',"form_".$methodid."_outgoing",'no_dokumen','');
																  $this->ecc_library->form('hidden','',"form_".$methodid."_outgoing",'tgl_dokumen','');
																  $this->ecc_library->form('hidden','',"form_".$methodid."_outgoing",'stock_move_id','');
																  $this->ecc_library->form('hidden','',"form_".$methodid."_outgoing",'item_id','');
																  $this->ecc_library->form('hidden','',"form_".$methodid."_outgoing",'dok_to','');
															   ?>
															</div>
														 </div>  
													  </form>
													 <button type="button" class="btn btn-default" onclick="javascript:print_<?php echo $methodid ?>_outgoing('xlsx');">
														<i class="fa fa-search"></i> Print Xlsx
													  </button>
												   </div>
												</div>
												
												<div class="row mb-10 ml-10">
													<div class="col-xl-12">
														<?php 
															$extra_field = array();
															$extra_field[] = array('field' => 'item_id','form_id' => 'form_'. $methodid .'_item_id_outgoing');
															$extra_param = array('methodid'=> $methodid,'footer_data'=> true,'onclick'=> 'click_item_'.$methodid,'extra_param' => $extra_field);
															$this->ecc_library->jqgrid($methodid."_outgoing", $dashboard_table['field_outgoing'], $dashboard_table['field_outgoing_loaddata'],$extra_param); 
															
															//$extra_param = array('methodid'=> $methodid,'onclick'=> 'click_transfer_'.$methodid,'extra_param' => array(0 => array('field' => 'work_order_request_id','form_id' => 'form_'. $methodid .'_supply_work_order_request_id')));
														//$this->ecc_library->jqgrid($methodid."_supply", $dashboard_table['field_detail_supply'], $dashboard_table['field_detail_supply_loaddata'],$extra_param); 
														?>
													</div>
												</div>
												
												<div class="row mb-10 ml-10">
													<div class="col-xl-12">
												<?php 
											//			$extra_field = array();
											//			$extra_field[] = array('field' => 'item_code','form_id' => 'form_'. $methodid .'_outgoing_item_code');
											//			$extra_field[] = array('field' => 'doc_no','form_id' => 'form_'. $methodid .'_outgoing_no_dokumen');
											//			$extra_field[] = array('field' => 'doc_date','form_id' => 'form_'. $methodid .'_outgoing_tgl_dokumen');
											//			$extra_field[] = array('field' => 'stock_move_id','form_id' => 'form_'. $methodid .'_outgoing_stock_move_id');
											//			$extra_field[] = array('field' => 'item_id','form_id' => 'form_'. $methodid .'_outgoing_item_id');
											//			$extra_field[] = array('field' => 'dok_to','form_id' => 'form_'. $methodid .'_outgoing_dok_to');
											//			$extra_param = array('methodid'=> $methodid,'footer_data'=> true,'extra_param' => $extra_field);
											//			$this->ecc_library->jqgrid($methodid."_outgoing_transfer", $dashboard_table['field_outgoing_supply'], $dashboard_table['field_outgoing_supply_loaddata'],$extra_param); 
											//		?>
													
													</div>
												</div>
												
											 </div>
											 
											</div> 
										</div>
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
		<input type="hidden" id="form_<?php echo $methodid ?>_print_date_start" name="date_start" value="" />
		<input type="hidden" id="form_<?php echo $methodid ?>_print_date_end" name="date_end" value="" />
		<input type="hidden" id="form_<?php echo $methodid ?>_print_format" name="format" value="" />
		<input type="hidden" id="form_<?php echo $methodid ?>_print_print" name="print" value="1" />
	</form>
</div>
