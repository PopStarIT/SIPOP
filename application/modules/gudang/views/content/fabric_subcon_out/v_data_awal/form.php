<style>
 .fabric_barcode {
    height: 40px;
    font-size: 1rem; /* Sebaiknya imbangi dengan ukuran font agar proporsional */
 }
 
  #reader {
		width: 100%;
		border-radius: 15px;
		/*  overflow: hidden; */
		border: none !important;
	}





	/* 3. Percantik Tombol Stop/Start agar terlihat modern di Tablet */
	#reader button {
		background-color: #ff4d4d;
		/* Warna merah untuk Stop */
		color: white;
		border: none;
		padding: 12px 24px;
		border-radius: 8px;
		font-weight: bold;
		cursor: pointer;
		margin-top: 20px;
		transition: background 0.3s;
	}

	#reader button:hover {
		background-color: #cc0000;
	}

	/* 4. Pastikan video feed berbentuk kotak di tengah (Tablet Friendly) */
	#reader video {
		border-radius: 15px;
		object-fit: cover;
	}

 
 </style>

<div class="row">
	<div class="col-xl-12">
		<div class="card card-statistics h-100">
			<div class="card-body" style="padding: 1.25rem !exportant">
				<h5 class="card-title form_title_<?php echo $methodid ?>"><?php echo $page_title ?></h5>
				<div class="tab tab-border">
					<ul class="nav nav-tabs form_tab_<?php echo $methodid ?>" role="tablist">
						<li class="nav-item">
							<a class="nav-link active show" id="tab_<?php echo $methodid; ?>_header" data-toggle="tab" href="#content_<?php echo $methodid; ?>_header" role="tab" aria-controls="content_<?php echo $methodid; ?>_header" aria-selected="true">
								Header
							</a>
						</li>

						<li class="nav-item">
							<a class="nav-link" id="tab_<?php echo $methodid; ?>_detail" data-toggle="tab" href="#content_<?php echo $methodid; ?>_detail" role="tab" aria-controls="content_<?php echo $methodid; ?>_detail" aria-selected="true">
								Detail
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="tab_<?php echo $methodid; ?>_supply" data-toggle="tab" href="#content_<?php echo $methodid; ?>_supply" role="tab" aria-controls="content_<?php echo $methodid; ?>_supply" aria-selected="true">
								Supply
							</a>
						</li>
					</ul>

					<div class="tab-content">
						<div class="tab_custom_ecc tab-pane fade active show" id="content_<?php echo $methodid; ?>_header" role="tabpanel" aria-labelledby="tab_<?php echo $methodid; ?>_header">
							<div class="row">
								<div class="col-xl-12 mb-10 ml-10">
									<form class="ui grid ecc_form" id="form_<?php echo $methodid ?>" action="javascript:post_<?php echo $methodid ?>()">
										<?php
										$this->ecc_library->form('hidden', '', "form_" . $methodid, $this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
										$this->ecc_library->form('hidden', '',"form_".$methodid,'fabric_subcon_out_id','','','');
										//$this->ecc_library->form('hidden', '', "form_" . $methodid, 'fabric_subcon_out_edit', '');
										?>
                                     <div class="row">
										<div class="col-xl-4">
										  <?php
											$this->ecc_library->form('text', 'Subcon no', "form_" . $methodid, 'subcon_out_no', '', '', '');
										  ?>
									    </div>
										<div class="col-xl-3">
										  <?php
											$this->ecc_library->form('date', 'Subcon date', "form_" . $methodid, 'subcon_out_date', '', '', '');
										  ?>
									    </div>
										<div class="col-xl-4">
										  <?php
										    $this->ecc_library->form('select', 'Supplier', "form_" . $methodid, 'partner_id', '', '', 'partner');
											//$this->ecc_library->form('select', 'Supplier', "form_" . $methodid, 'partner_id', '', '', 'partner');
										  ?>
									    </div>
								 	</div>
									
									 <div class="row">
										<div class="col-xl-4">
										  <?php
											$this->ecc_library->form('text', 'Subcon style', "form_" . $methodid, 'style', '', '', '');
										  ?>
									    </div>
										<div class="col-xl-3">
										  <?php
											$this->ecc_library->form('text', 'Subcon purchase order', "form_" . $methodid, 'no_po', '', '', '');
										  ?>
									    </div>
										<div class="col-xl-4">
										  <?php
											 $this->ecc_library->form('select','Contract No',"form_".$methodid,'contract_subcon_id','','','get_contract_subcon',array('extra_param' => array(0 => array('field' => 'partner_id' ))));
										  ?>
									    </div>
								 	</div>
									
									</form>

									
									<br>
									<br>
									<div class="ui grid form">
										<div class="row field">
											<div class="twelve wide column">
												<button type="button" class="btn btn-success" onclick="save_<?php echo $methodid ?>()">
													<i class="fa fa-save"></i> Save
												</button>

												<button type="button" class="btn btn-info" onclick="cancel_<?php echo $methodid ?>()">
													<i class="fa fa-arrow-left"></i> Back
												</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab_custom_ecc tab-pane fade" id="content_<?php echo $methodid; ?>_detail" role="tabpanel" aria-labelledby="tab_<?php echo $methodid; ?>_detail">
						    <div class="col-xl-12">
							 <form class="ui grid ecc_form" id="form_<?php echo $methodid ?>_detail" action="javascript:add_<?php echo $methodid ?>()">
							   <div class="row">
							      <div class="col-xl-9">
								   <div class="row">
								   	<div class="col-xl-11">
										<?php
											$this->ecc_library->form('hidden','',"form_".$methodid."_detail",$this->security->get_csrf_token_name(),$this->security->get_csrf_hash());
											$this->ecc_library->form('hidden','',"form_".$methodid."_detail",'fabric_subcon_out_id','','','');
											$this->ecc_library->form('hidden','',"form_".$methodid."_detail",'fabric_subcon_out_detail_id','','','');
											//$this->ecc_library->form('text','',"form_".$methodid."_detail",'contract_subcon_id','','','');
											$this->ecc_library->form('select','Item Code',"form_".$methodid."_detail",'item_id','','','item_detail');
										?>
									</div>
									<div class="col-xl-4">
										<?php
										  $this->ecc_library->form('text','Qty',"form_".$methodid."_detail",'quantity_subcon','','','');
										?>
									</div>
													
									  <div class="col-xl-3 ">
										<?php
											$this->ecc_library->form('select','Unit',"form_".$methodid."_detail",'uom_id','','','uom');
										?>
									  </div>
									  
									  <div class="col-xl-2">
								 		<?php
								 			$this->ecc_library->form('text','Conversion',"form_".$methodid."_detail",'conversion','','','');
								 		?>
								 	 </div>
								 		
								 	 <div class="col-xl-3">
								 		<?php
								 			$this->ecc_library->form('text','Unit Price',"form_".$methodid."_detail",'unit_price','','','');
								 		?>
								 	 </div>
								   </div>
								 </div>
								 
								 	<div class="col-xl-3">
										<label> &nbsp </label>
										<div class="input-group">
											<div class="button_<?php echo $methodid ?>_detail_new" style="display:none">
												<button type="submit" class="btn btn-success">
													<i class="fa fa-plus"></i> ADD
												</button>
											</div> 
											
											<div class="button_<?php echo $methodid ?>_detail_edit" style="display:none">
												<button type="submit" class="btn btn-success">
													<i class="fa fa-check"></i> SAVE
												</button>
												
												<a class="btn btn-danger" onclick="javascript:cancel_detail_<?php echo $methodid ?>()">
													<i class="fa fa-times"></i> CANCEL
												</a>
											</div>
										</div>
									</div>
							   </div>
							  </form>
							</div>
							<div class="row">
								<div class="col-xl-12">
									<?php 
									  										
										$extra_param = array('methodid'=> $methodid,'extra_param' => array(0 => array('field' => 'fabric_subcon_out_id','form_id' => 'form_'. $methodid .'_detail_fabric_subcon_out_id')));
										$this->ecc_library->jqgrid($methodid."_detail", $dashboard_table['field_fabric_subcon_out_detail'], $dashboard_table['field_fabric_subcon_out_detail_loaddata'],$extra_param); 
									?>
								</div>
							</div>
							
							<br>
							<div class="ui grid form">
								<div class="row field">
									<div class="twelve wide column">
										<button type="button" class="btn btn-info" onclick="cancel_<?php echo $methodid ?>()">
											<i class="fa fa-arrow-left"></i> Back
										</button>
																				
									</div>
								</div>
							</div>
						</div>

						<div class="tab_custom_ecc tab-pane fade" id="content_<?php echo $methodid; ?>_supply" role="tabpanel" aria-labelledby="tab_<?php echo $methodid; ?>_supply">
							<div class="row panel_<?php echo $methodid ?>_panel_supply">
						      <div class="col-xl-12">
									<div class="form_<?php echo $methodid ?>_back" style="display:none">
										<div class="d-flex justify-content-center align-items-center vh-100">
											<div class="col-xl-6">
												<div class="form-group">
													<div class="card shadow-sm mb-4 scanner-container">
														<div class="card-body">
															<div id="reader"></div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-xl-12 d-flex justify-content-end">
											<button type="button" class="btn btn-info" onclick="javascript:back_<?php echo $methodid ?>()">
												<i class="fa fa-undo"></i> back
											</button>
										</div>
									</div>
								</div>
                               
								<div class="col-xl-12">
								    <div class="row">
									   <div class="col-xl-6" >
									  	<?php
										  $this->ecc_library->form('hidden', '', "form_" . $methodid."_supply", 'fabric_subcon_out_id', '');
										  $this->ecc_library->form('hidden', '', "form_" . $methodid."_supply", 'fabric_subcon_out_detail_id', '');
										?>
										<div class="form-group">
												<label for="fabric_barcode">Barcode Scan</label>
												<div class="input-group">
													<div class="input-group-prepend">
														<span class="input-group-text"><i class="fa fa-barcode"></i></span>
													</div>
													<input type="text" class="form-control fabric_barcode" id="form_<?php echo $methodid ?>_subcon_out_barcode" name="subcon_out_barcode" placeholder="Scan.." autofocus />
													
													&nbsp;
															<div class="form_<?php echo $methodid ?>_scan_mobile">
																<button type="button" class="btn btn-info " onclick="javascript:scan_mobile_<?php echo $methodid ?>()">
																	<i class="fa fa-mobile"></i> Mobile
																</button>
															</div>
												</div>
										</div>
									  </div>
                                   </div> 
								   
								    <div class="row">
									   <div class="col-xl-6" >
									    <?php
								 			$this->ecc_library->form('text','No PO',"form_".$methodid."_supply",'no_po','','','');
								 		?>
								      </div>
									
								    </div>
									
								   	<div class="row">
									  <div class="col-xl-12 mb-30">
									   <?php 
									  										
								//		$extra_param = array('methodid'=> $methodid,'onclick' => 'click_transfer_' . $methodid,'extra_param' => array(0 => array('field' => 'fabric_subcon_out_id','form_id' => 'form_'. $methodid .'_supply_fabric_subcon_out_id')));
								//		$this->ecc_library->jqgrid($methodid. "_detail_supply", $dashboard_table['field_fabric_subcon_out_detail_supply'], $dashboard_table['field_fabric_subcon_out_detail_supply_loaddata'],$extra_param); 
									    ?>
								      </div>
								     
							        </div>
								   
								   
									<div class="row">
									
										<div class="col-xl-12 mb-30">
										  
										  <div class="row">
										   <div class="col-xl-12">	
											<?php
											$extra_param = array('methodid' => $methodid, 'extra_param' => array(0 => array('field' => 'fabric_subcon_out_id', 'form_id' => 'form_' . $methodid . '_supply_fabric_subcon_out_id')));
											$this->ecc_library->jqgrid($methodid . "_supply", $dashboard_table['field_detail_supply'], $dashboard_table['field_detail_supply_loaddata'], $extra_param);
											?>
										  </div>
										 </div>
										</div>
									 </div>
								
									<br>
									<div class="ui grid form">
										<div class="row field">
											<div class="twelve wide column">
												<button type="button" class="btn btn-info" onclick="cancel_<?php echo $methodid ?>()">
													<i class="fa fa-arrow-left"></i> Back
												</button>
																						
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

<div class="tab_custom_ecc modal fade" id="modal_available_stock" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Fabric Supply</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<div class="row">
					<div class="col-xl-12 ">
						<?php
						$this->ecc_library->form('hidden', '', "form_" . $methodid . "_mdl_supply", $this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
						$this->ecc_library->form('hidden', '', "form_" . $methodid . "_mdl_supply", 'stock_move_sipop_id', '');
						//$this->ecc_library->form('hidden', '', "form_" . $methodid . "_modal_supply", 'fabric_transfer_detail_id', '');
						$this->ecc_library->form('hidden', '', "form_" . $methodid . "_mdl_supply", 'item_id', '');

						?>

					</div>
				</div>
				<!-- <div class="row table-responsive"> -->
				<div class="row table-responsive">
					<div class="col-xl-12 ">
						<?php
						$extra_param = array('methodid' => $methodid, 'footer_data' => true, 'extra_param' => array(0 => array('field' => 'item_id', 'form_id' => 'form_' . $methodid . '_mdl_supply_item_id')));
						//$this->ecc_library->jqgrid($methodid . "_mdl_stock", $dashboard_table['field_available_transfer'], $dashboard_table['field_available_loaddata'], $extra_param);
					//	$this->ecc_library->jqgrid_gudang_transfer($methodid . "_mdl_stock", $dashboard_table['field_available_transfer'], $dashboard_table['field_available_loaddata'], $extra_param);
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="tab_custom_ecc modal fade" id="modal_fabric_supply_detail" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Fabric Supply</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<div class="row">
					<div class="col-xl-12 ">
						<form class="ui grid ecc_form" id="form_<?php echo $methodid ?>_mdl_supply" action="javascript:post_modal_manual_supply_<?php echo $methodid ?>()" method="post">
							<div class="row">
								<div class="col-xl-4">
									<?php
									$this->ecc_library->form('hidden', '', "form_" . $methodid . "_modal_supply", $this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
									$this->ecc_library->form('hidden', '', "form_" . $methodid . "_modal_supply", 'stock_move_sipop_id', '');
									$this->ecc_library->form('hidden', '', "form_" . $methodid . "_modal_supply", 'fabric_transfer_detail_id', '');
									$this->ecc_library->form('hidden', '', "form_" . $methodid . "_modal_supply", 'item_id', '');
									$this->ecc_library->form('text', 'From Dok', "form_" . $methodid . "_modal_supply", 'fabric_from_dok', '', '', '');
									$this->ecc_library->form('text', 'Qty Supply', "form_" . $methodid . "_modal_supply", 'qty_supply', '', '', '');

									?>
								</div>
								<div class="col-xl-4">
									<?php
									$this->ecc_library->form('text', 'Receive No', "form_" . $methodid . "_modal_supply", 'fabric_transfer_no', '', '', '');
									
									?>

									<label> &nbsp </label>
									<div class="input-group2">
										<button type="submit" class="btn btn-success">
											<i class="fa fa-check"></i> Supply
										</button>
									</div>
								</div>
								<div class="col-xl-4">
									<?php
									$this->ecc_library->form('text', 'Receive Date', "form_" . $methodid . "_modal_supply", 'fabric_transfer_date', '', '', '');
									?>

								</div>

							</div>
						</form>
						<?php
						//	print_r($dashboard_table);
						//$extra_param = array('methodid'=> $methodid,'extra_param' => array(0 => array('field' => 'fabric_transfer_detail_id','form_id' => 'form_'. $methodid .'_modal_supply_fabric_transfer_detail_id')));
						//$this->ecc_library->jqgrid($methodid."_mdl_manual_transfer", $dashboard_table['field_manual_transfer'], $dashboard_table['field_manual_loaddata'],$extra_param); 
						?>
					</div>
				</div>
				<!-- <div class="row table-responsive"> -->
				<div class="row table-responsive">
					<div class="col-xl-12 ">
						<?php
						//$extra_param = array('methodid' => $methodid, 'onclick' => 'click_supply_' . $methodid, 'footer_data' => true, 'extra_param' => array(0 => array('field' => 'fabric_transfer_detail_id', 'form_id' => 'form_' . $methodid . '_modal_supply_fabric_transfer_detail_id')));
						$extra_param = array('methodid' => $methodid, 'onclick' => 'click_supply_' . $methodid, 'footer_data' => true, 'extra_param' => array(0 => array('field' => 'item_id', 'form_id' => 'form_' . $methodid . '_modal_supply_item_id')));
				//		$this->ecc_library->jqgrid($methodid . "_mdl_manual_transfer", $dashboard_table['field_manual_transfer'], $dashboard_table['field_manual_loaddata'], $extra_param);
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>