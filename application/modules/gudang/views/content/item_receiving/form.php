<!--    #reader__dashboard_section_csr button {
           padding: 10px 20px;
           background-color: #007bff;
           color: white;
           border: none;
           border-radius: 5px;
           cursor: pointer;
           margin-top: 10px;
       }
       
       /* Responsif untuk Tablet */
       @media (min-width: 768px) {
           .scanner-container {
               max-width: 500px; /* Sedikit lebih ramping di tablet agar tidak bulky */
           }
       } -->
<style>
	body {
		overflow: auto !important;
		height: auto !important;
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
			<div class="card-body" style="padding: 1.25rem !important">
				<h5 class="card-title form_title_<?php echo $methodid ?>"><?php echo $page_title ?></h5>
				<div class="tab tab-border">
					<ul class="nav nav-tabs form_tab_<?php echo $methodid ?>" role="tablist">
						<li class="nav-item">
							<a class="nav-link active show" id="tab_<?php echo $methodid; ?>_header" data-toggle="tab" href="#content_<?php echo $methodid; ?>_header" role="tab" aria-controls="content_<?php echo $methodid; ?>_header" aria-selected="true">
								Header
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="tab_<?php echo $methodid; ?>_detail_scan" data-toggle="tab" href="#content_<?php echo $methodid; ?>_detail_scan" role="tab" aria-controls="content_<?php echo $methodid; ?>_detail_scan" aria-selected="true">
								Detail
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="tab_<?php echo $methodid; ?>_other_scan" data-toggle="tab" href="#content_<?php echo $methodid; ?>_other_scan" role="tab" aria-controls="content_<?php echo $methodid; ?>_other_scan" aria-selected="true">
								Other
							</a>
						</li>


					</ul>

					<div class="tab-content">
						<div class="tab_custom_ecc tab-pane fade active show" id="content_<?php echo $methodid; ?>_header" role="tabpanel" aria-labelledby="tab_<?php echo $methodid; ?>_header">
							<div class="row panel_<?php echo $methodid ?>_panel_header">
								<div class="col-xl-12 mb-10 ml-10">
									<form class="ui grid ecc_form" id="form_<?php echo $methodid ?>" action="javascript:post_<?php echo $methodid ?>()">
										<?php
										$this->ecc_library->form('hidden', '', "form_" . $methodid, $this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
										$this->ecc_library->form('hidden', '', "form_" . $methodid, 'fabric_warehouse_receive_id', '');
										$this->ecc_library->form('hidden', '', "form_" . $methodid, 'fabric_warehouse_receive_type_id', '');
										$this->ecc_library->form('hidden', 'type_ecc', "form_" . $methodid, 'grn_type_id_ecc', '');
										$this->ecc_library->form('hidden', '', "form_" . $methodid, 'grn_id', '');
										//$this->ecc_library->form('hidden','',"form_".$methodid,'this_memo','');
										?>

										<div class="row">
											<div class="col-xl-4">
												<?php
												$this->ecc_library->form('text', 'GRN ECC No', "form_" . $methodid, 'grn_no', '', '', '');
												$this->ecc_library->form('text', 'Receive No', "form_" . $methodid, 'fabric_warehouse_receive_no', '', '', '');
												$this->ecc_library->form('date', 'Receive Date', "form_" . $methodid, 'fabric_warehouse_receive_date', '', '', '');

												?>

											</div>


											<div class="col-xl-3">
												<?php
												$this->ecc_library->form('select', 'Supplier', "form_" . $methodid, 'partner_id', '', '', 'supplier');
												$this->ecc_library->form('select', 'From Doc', "form_" . $methodid, 'bc_in_header_id', '', '', 'get_grn_custom', array('extra_param' => array(0 => array('field' => 'partner_id'))));
												$this->ecc_library->form('text', 'Delivery No', "form_" . $methodid, 'fabric_warehouse_receive_delivery_no', '', '', '');
																					
												?>


											</div>

											<div class="col-xl-3">
												<div class="select_<?php echo $methodid ?>_from_shipment" style="display:none">
													<?php
													$this->ecc_library->form2('select_pop', 'Shipment No:', "form_" . $methodid, 'fabric_shipment_id', '', '', 'data_list_fabric_receive', '6');

													?>
												</div>

												<?php
												$this->ecc_library->form('select', 'Warehouse', "form_" . $methodid, 'warehouse_id', '', '', 'warehouse');
												$this->ecc_library->form('date', 'Delivery Date', "form_" . $methodid, 'fabric_warehouse_receive_delivery_date', '', '', '');
												?>
											</div>
										</div>

										<hr style="margin-right:30px;" />


									</form>

									<div class="ui grid form">
										<div class="row field">
											<div class="twelve wide column">
												<button type="button" class="btn btn-success" onclick="save_<?php echo $methodid ?>()">
													<i class="fa fa-save"></i> Save Header
												</button>

												<button type="button" class="btn btn-info" onclick="cancel_<?php echo $methodid ?>()">
													<i class="fa fa-arrow-left"></i> Back
												</button>
											</div>
										</div>
									</div>

									<!--<div id="status_container" style="margin: 10px 0; padding: 10px; border: 1px solid #3c8dbc; background: #f0f9ff;">	 -->
									<div id="status_<?php echo $methodid ?>_container" style="display:none; margin: 10px 0; padding: 10px; border: 1px solid #3c8dbc; background: #f0f9ff;">
										<span id="loader_icon"><i class="fa fa-spinner fa-spin"></i></span>
										<strong id="status_pesan">Menyiapkan data...</strong>
									</div>
									<br />
									<br />
									<br />
								</div>
							</div>

						</div>

						<div class="tab_custom_ecc tab-pane fade" id="content_<?php echo $methodid; ?>_detail_scan" role="tabpanel" aria-labelledby="tab_<?php echo $methodid; ?>_detail_scan">
							<div class="row panel_<?php echo $methodid ?>_panel_detail_scan">
								<?php
								$this->ecc_library->form('hidden', '', "form_" . $methodid . "_detail_scan", $this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
								$this->ecc_library->form('hidden', 'shipment_id', "form_" . $methodid . "_detail_scan", 'fabric_shipment_id', '', '', '');
								$this->ecc_library->form('hidden', 'fabric_shipment_list_id', "form_" . $methodid . "_detail_scan", 'fabric_shipment_list_id', '', '', '');
								$this->ecc_library->form('hidden', 'receive', "form_" . $methodid . "_detail_scan", 'fabric_warehouse_receive_id', '', '', '');
								$this->ecc_library->form('hidden', 'receive_detail', "form_" . $methodid . "_detail_scan", 'fabric_warehouse_receive_detail_id', '', '', '');
								$this->ecc_library->form('hidden', '', "form_" . $methodid . "_detail_scan", 'fabric_shipment_list_lot', '', '', '');
								$this->ecc_library->form('hidden', '', "form_" . $methodid . "_detail_scan", 'bc_in_header_id', '', '', '');
								$this->ecc_library->form('hidden', '', "form_" . $methodid . "_detail_scan", 'bc_in_barang_id', '', '', '');
								$this->ecc_library->form('hidden', '', "form_" . $methodid . "_detail_scan", 'warehouse_id', '', '', '');
								$this->ecc_library->form('hidden', '', "form_" . $methodid . "_detail_scan", 'purchase_performa_id', '', '', '');
								$this->ecc_library->form('hidden', 'partner', "form_" . $methodid . "_detail_scan", 'partner_id', '', '', '');
								$this->ecc_library->form('hidden', 'grn_id', "form_" . $methodid . "_detail_scan", 'grn_id', '', '', '');
								$this->ecc_library->form('hidden', '', "form_" . $methodid . "_detail_scan", 'kode_barcode', '', '', '');
								$this->ecc_library->form('hidden', 'limit', "form_" . $methodid . "_detail_scan", 'limit', '', '', '');
								// $this->ecc_library->form2('select_pop','Purchase Order No:',"form_".$methodid."_detil_scan",'purchase_order_warehouse_id','','','data_list_po_warehouse','6');
								?>

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
									<div class="row container-fluid">
										<div class="col-xl-12">
											<div class="row mb-4">
												<div class="col-md-8">
													<div class="form-group">
														<label for="fabric_barcode">Barcode Scan</label>
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="fa fa-barcode"></i></span>
															</div>
															<input type="text" class="form-control fabric_barcode" id="form_<?php echo $methodid ?>_detail_scan_fabric_barcode" name="fabric_barcode" autocomplete='off' autofocus />
															<!-- inputmode="none"  -->
															&nbsp;
															<div class="form_<?php echo $methodid ?>_save_receive" style="display:none">
																<button type="button" class="btn btn-success " onclick="javascript:save_receive_<?php echo $methodid ?>()">
																	<i class="fa fa-save"></i> Save
																</button>
															</div>
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

											<div class="row g-3">
												<div class="col-12 col-md-4">
													<div class="card text-center border-danger">
														<div class="card-header bg-danger text-white">Quantity</div>
														<div class="card-body">
															<h4 class="card-title mb-0" id="lot_quantity_<?php echo $methodid ?>">0</h2>
														</div>
													</div>
												</div>
												<div class="col-12 col-md-4">
													<div class="card text-center border-primary">
														<div class="card-header bg-primary text-white">Lot Number</div>
														<div class="card-body">
															<h4 class="card-title mb-0" id="lot_number_<?php echo $methodid ?>">0</h2>
														</div>
													</div>
												</div>
												<div class="col-12 col-md-4">
													<div class="card text-center border-success">
														<div class="card-header bg-success text-white">PO Number</div>
														<div class="card-body">
															<h4 class="card-title mb-0" id="po_number_<?php echo $methodid ?>">0</h4>
															<!--  <h2 class="card-title mb-0" id="totalRol_<?php //echo $methodid 
																											?>">0</h2> -->
														</div>
													</div>
												</div>
												<div class="col-12 col-md-4">
													<div class="card text-center border-warning">
														<div class="card-header bg-warning text-white">Total</div>
														<div class="card-body">
															<h4 class="card-title mb-0" id="po_total_<?php echo $methodid ?>">0</h4>
															<!--  <h2 class="card-title mb-0" id="totalRol_<?php //echo $methodid 
																											?>">0</h2> -->
														</div>
													</div>
												</div>
											</div>
											<br>
											<!--
											<div class="row g-3">
												<div class="col-12 col-md-4">
											 <?php
												//$this->ecc_library->form('text', 'Kode Kontainer', "form_" . $methodid . "_detail_scan", 'note', '', '', '');
											 ?>
												</div>
											</div> -->
											
										<div class="col-xl-12">
								              <div class="row">
									            <div class="col-xl-4" id="plh_kontainer_db">
									            	<?php
																									
													$this->ecc_library->form2('select_pop', 'Kode Kontainer', "form_" . $methodid . "_detail_scan", 'no_kontainer1', '', '', 'get_no_kontainer', '4', array('extra_param' => array(0 => array('field' => 'fabric_warehouse_receive_id'))));
												   	?>
									            </div>
												<div class="col-xl-4">
												   <div class="form-group" id="plh_kontainer" style="display:none" >
				                                    <label for="kode_kontainer">Kode Kontainer</label>
													<!--  <select class="form-control" id="form_" .<?php $methodid ?>. "_detail_scan" name="alphabet">  -->
				                                     <select class="form-control" id="kode_kontainer" name="alphabet">
													   <option value="AZ">--</option>
												         <?php 
                                                            $alphabet = range('A', 'P');
                                                
                                                              foreach ($alphabet as $char): 
                                                             // $selected = ($current_filter == $char) ? 'selected' : '';
                                                           ?>
                                                             <option value="<?= $char ?>" >
                                                                KONTAINER <?= $char; ?>
                                                         </option>
                                                           <?php endforeach; ?>
				                                     </select>
			                                       </div>
												</div>
												
												 <div class="col-xl-4" id="plh_kontainer_db">
									            	<?php
																									
												$this->ecc_library->form('hidden', '', "form_" . $methodid . "_detail_scan", 'frm_nomor_kontainer', '', '', '');
												   	?>
									            </div>
												
											   </div>
							               </div>
										   <div class="col-xl-12">
								              <div class="row">
											   <div class="col-xl-4">
									            	<button type="button" class="btn btn-warning" onclick="javascript:add_kontainer_<?php echo $methodid ?>()">add kontainer</button>
												</div>
											 </div>
							               </div>
										

											<hr class="mt-4">
											<div class="row align-items-center mb-4">
												<div class="col">
													<label class="form-label fw-bold mb-0"></label>
												</div>

												<div class="col-auto d-flex gap-2">
													<button type="button" class="btn btn-info" onclick="javascript:modal_view_<?php echo $methodid ?>()">View Data</button>&nbsp;
													<button type="button" class="btn btn-success" onclick="javascript:modal_report_receive_<?php echo $methodid 
																																				?>()">Report</button>
													<!--  <button type="button" class="btn btn-success" onclick="javascript:modal_add_receive_<?php //echo $methodid 
																																				?>()">Add</button> -->
												</div>
											</div>

										</div>
									</div>

									<div class="col-xl-12">
										<div class="form-check mb-10 ">
											<input class="form-check-input" type="checkbox" value="" id="chk_add_directly">
											<label class="form-check-label" for="flexCheckDefault"> Add directly ::. </label>
											<?php
											$this->ecc_library->form('hidden', '', "form_" . $methodid . "_detail_scan", $this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
											?>
											&nbsp;&nbsp;&nbsp;
										
										</div>
									</div>

									<div class="row panel_<?php echo $methodid ?>_panel_receive_detail mb-10">
										<div id="col_utama_<?php echo $methodid ?>" class="col-lg-12">
											<div class="col-xl-12 receive_scan_<?php echo $methodid ?>">
												<?php
												$extra_field = array();
												//$extra_param = array('methodid' => $methodid, 'extra_param' => array(0 => array('field' => 'fabric_shipment_id', 'form_id' => 'form_' . $methodid . '_detail_scan_fabric_shipment_id'), 1 => array('field' => 'bc_in_header_id', 'form_id' => 'form_' . $methodid . '_detail_scan_bc_in_header_id')));
												
												//$extra_param = array('methodid' => $methodid, 'extra_param' => array(0 => array('field' => 'fabric_warehouse_receive_id', 'form_id' => 'form_' . $methodid . '_detail_scan_fabric_warehouse_receive_id')));
												
												$extra_param = array('methodid' => $methodid, 'extra_param' => array(0 => array('field' => 'fabric_warehouse_receive_id', 'form_id' => 'form_' . $methodid . '_detail_scan_fabric_warehouse_receive_id'),1=>array('field' => 'kode_kontainer', 'form_id' => 'form_' . $methodid . '_detail_scan_frm_nomor_kontainer')));
												
												$this->ecc_library->jqgrid_scan_receive($methodid . "_receive_scan", $dashboard_table['field_receive_scan'], $dashboard_table['field_loaddata_scan'], $extra_param);
												?>
											</div>
										</div>
									</div>
									
									 <!-- Audio Berhasil -->
                                     <audio id="sound-yes" src="<?= base_url('assets/sounds/yes1.mp3'); ?>" preload="auto"></audio>
                                    <!-- Audio Gagal -->
                                      <audio id="sound-no" src="<?= base_url('assets/sounds/no.mp3'); ?>" preload="auto"></audio>
                                    <!-- Audio Peringatan -->
                                      <audio id="sound-error" src="<?= base_url('assets/sounds/error.mp3'); ?>" preload="auto"></audio>
									<!--
									<div class="col-xl-12">
									 <div class="form-group">
                                         <label>
                                             <input type="checkbox" id="check_limit_all" value="1"> 
                                             Tampilkan semua data di table
                                         </label>
                                     </div>
                                     <button type="button" id="btn_search" class="btn btn-primary">Cari Data</button>
									</div> -->

								</div>
							</div>
							<br />


						</div>



						<div class="tab_custom_ecc tab-pane fade" id="content_<?php echo $methodid; ?>_other_scan" role="tabpanel" aria-labelledby="tab_<?php echo $methodid; ?>_other_scan">
							<div class="row panel_<?php echo $methodid ?>_panel_other_scan">
								<div class="col-xl-12">

									<!-- <form class="ui grid ecc_form" id="form_<?php echo $methodid ?>_detil_scan" action="javascript:addx_<?php echo $methodid ?>()" enctype="multipart/form-data" method="post"> -->
									<div class="row">
										<div class="col-xl-12">
											<div class="row">
												<div class="col-xl-4">
													<?php
													$this->ecc_library->form('hidden', '', "form_" . $methodid . "_other_scan", $this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
													$this->ecc_library->form('hidden', 'shipment_id', "form_" . $methodid . "_other_scan", 'fabric_shipment_id', '', '', '');
													$this->ecc_library->form('hidden', 'fabric_shipment_list_id', "form_" . $methodid . "_other_scan", 'fabric_shipment_list_id', '', '', '');
													$this->ecc_library->form('hidden', 'receive', "form_" . $methodid . "_other_scan", 'fabric_warehouse_receive_id', '', '', '');
													$this->ecc_library->form('hidden', 'receive_detail', "form_" . $methodid . "_other_scan", 'fabric_warehouse_receive_detail_id', '', '', '');
													$this->ecc_library->form('hidden', '', "form_" . $methodid . "_other_scan", 'fabric_shipment_list_lot', '', '', '');
													$this->ecc_library->form('hidden', 'bc', "form_" . $methodid . "_other_scan", 'bc_in_header_id', '', '', '');
													$this->ecc_library->form('hidden', 'bc', "form_" . $methodid . "_other_scan", 'bc_in_barang_id', '', '', '');
													$this->ecc_library->form('hidden', '', "form_" . $methodid . "_other_scan", 'warehouse_id', '', '', '');
													$this->ecc_library->form('hidden', '', "form_" . $methodid . "_other_scan", 'purchase_performa_id', '', '', '');
													$this->ecc_library->form('hidden', 'partner', "form_" . $methodid . "_other_scan", 'partner_id', '', '', '');
													?>
												</div>
												<div class="col-xl-3">
													<?php
													$this->ecc_library->form2('hidden', 'Total Lot', "form_" . $methodid . "_other_scan", 'total_lot', '', '', '');

													?>
												</div>
												<div class="col-xl-3">
													<?php
													$this->ecc_library->form2('hidden', 'Total Roll', "form_" . $methodid . "_other_scan", 'total_roll', '', '', '');

													?>
												</div>

											</div>
										</div>
										<div class="col-xl-12">
											<div class="row">
												<div class="col-xl-3">
													<label id="label_message"></label><br>
												</div>
											</div>
										</div>



									</div>


									<div class="row panel_<?php echo $methodid ?>_panel_fabric_shipment_other mb-10">
										<div class="col-xl-10">
											<?php
											$extra_param = array('methodid' => $methodid, 'extra_param' => array(0 => array('field' => 'fabric_shipment_id', 'form_id' => 'form_' . $methodid . '_other_scan_fabric_shipment_id'), 1 => array('field' => 'bc_in_header_id', 'form_id' => 'form_' . $methodid . '_other_scan_bc_in_header_id')));
											//$extra_param = array('methodid' => $methodid, 'extra_param' => array(0 => array('field' => 'fabric_shipment_id', 'form_id' => 'form_' . $methodid . '_other_scan_fabric_shipment_id')));

											$this->ecc_library->jqgrid($methodid . "_other_list", $dashboard_table['field_fabric_list_other_recive'], $dashboard_table['field_loaddata_list_other_recive'], $extra_param);
											?>

										</div>
									</div>

									<div class="row panel_<?php echo $methodid ?>_panel_receive_detail_other mb-10">
										<div class="col-xl-10">
											<?php
											$extra_field = array();
											$extra_param = array('methodid' => $methodid, 'extra_param' => array(0 => array('field' => 'fabric_shipment_id', 'form_id' => 'form_' . $methodid . '_other_scan_fabric_shipment_id')));
											$this->ecc_library->jqgrid2($methodid . "_other_receive_scan", $dashboard_table['field_other_receive_scan'], $dashboard_table['field_loaddata_other_scan'], $extra_param);
											?>
										</div>
									</div>

								</div>
							</div>
							<br />

						</div>

					</div>

				</div>
			</div>
		</div>
	</div>
</div>
</div>

<div class="tab_custom_ecc modal fade" id="modal_view_receive" role="dialog" aria-labelledby="exampleModalLabel" tabindex="-1">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">.:: View Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="col-xl-12">
					<div class="form_<?php echo $methodid ?>_add_receive_new" style="display:none">
						<form class="ui grid ecc_form" id="form_<?php echo $methodid ?>_mdl_add_receive" action="javascript:post_add_receive_<?php echo $methodid ?>()" method="post">
							<?php
							$this->ecc_library->form('hidden', '', "form_" . $methodid, $this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
							$this->ecc_library->form2('hidden', '', "form_" . $methodid . "_mdl_add_receive", 'fabric_shipment_id', '', '', '');
							$this->ecc_library->form2('hidden', '', "form_" . $methodid . "_mdl_add_receive", 'fabric_shipment_detail_id', '', '', '');
							$this->ecc_library->form2('hidden', '', "form_" . $methodid . "_mdl_add_receive", 'po_detail_id', '', '', '');
							$this->ecc_library->form2('hidden', '', "form_" . $methodid . "_mdl_add_receive", 'item_id', '', '', '');
							$this->ecc_library->form2('hidden', '', "form_" . $methodid . "_mdl_add_receive", 'fabric_shipment_list_id', '', '', '');
							?>
							<div class="col-xl-12 mb-2 form_<?php echo $methodid ?>_option_add_receive_item" style="display:none">
								<div class="row">
									<div class="col-xl-6">
										<?php
										$this->ecc_library->form2('readonly', 'item_code', "form_" . $methodid . "_mdl_add_receive", 'shipment_item_code', '', '', '');

										?>
									</div>
								</div>
							</div>
							<div class="col-xl-12">
								<div class="row">
									<div class="col-xl-6">
										<?php
										$this->ecc_library->form2('text', 'Barcode', "form_" . $methodid . "_mdl_add_receive", 'barcode', '', '', '');
										?>
									</div>
									<div class="col-xl-6">
										<?php
										$this->ecc_library->form2('text', 'Colour', "form_" . $methodid . "_mdl_add_receive", 'colour', '', '', '');
										?>
									</div>
								</div>
							</div>
							<div class="col-xl-12 mb-2 form_<?php echo $methodid ?>_option_add_receive">
								<div class="row">
									<div class="col-xl-6">
										<?php
										$this->ecc_library->form2('select_pop', 'Purchase Order No:', "form_" . $methodid . "_mdl_add_receive", 'po_no', '', '', 'get_po_add_receive', '6', array('extra_param' => array(0 => array('field' => 'fabric_shipment_id'))));

										?>
									</div>
									<div class="col-xl-6">
										<?php
										$this->ecc_library->form2('select_pop', 'Item Code', "form_" . $methodid . "_mdl_add_receive", 'mdl_shipment_code', '', '', 'get_receive_code', '4', array('extra_param' => array(0 => array('field' => 'po_no'))));

										?>
									</div>
								</div>
							</div>

							<div class="col-xl-12 mb-2">
								<div class="row">
									<div class="col-xl-3">
										<?php
										$this->ecc_library->form2('text', 'Quantity', "form_" . $methodid . "_mdl_add_receive", 'list_quantity', '', '', '');
										?>
									</div>

									<div class="col-xl-3">
										<?php
										$this->ecc_library->form2('text', 'Weight', "form_" . $methodid . "_mdl_add_receive", 'list_weight', '', '', '');
										?>
									</div>
									<div class="col-xl-3">
										<?php
										$this->ecc_library->form2('text', 'Lot', "form_" . $methodid . "_mdl_add_receive", 'list_lot', '', '', '');
										?>
									</div>
									<div class="col-xl-3">
										<?php
										$this->ecc_library->form2('text', 'Roll', "form_" . $methodid . "_mdl_add_receive", 'list_roll', '', '', '');
										?>
									</div>
								</div>
							</div>

							<div class="col-xl-12 mb-2">
								<div class="row">
									<div class="col-xl-3">
										<?php
										$this->ecc_library->form2('text', 'Bale', "form_" . $methodid . "_mdl_add_receive", 'list_bale', '', '', '');
										?>
									</div>


								</div>
							</div>

							<div class="col-xl-12 mb-2">
								<div class="row">
									<div class="input-group2">
										<button type="submit" class="btn btn-success">
											<i class="fa fa-check"></i> SAVE
										</button>
										<a class="btn btn-danger" onclick="javascript:cancel_add_receive_<?php echo $methodid ?>()">
											<i class="fa fa-times"></i> CANCEL
										</a>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="col-xl-12 mb-2 form_<?php echo $methodid ?>_add_receive_button">
					<div class="form-group">
						&nbsp
						<button type="button" class="btn btn-success" onclick="javascript:_add_receive_new_<?php echo $methodid ?>();">
							<i class="fa fa-plus"></i> Add
						</button>
					</div>
				</div>

				<div class="col-xl-12">
					<div class="row">
						<div class="col-xl-12 table-responsive">
							<?php
							$extra_param = array('methodid' => $methodid, 'extra_param' => array(0 => array('field' => 'fabric_shipment_id', 'form_id' => 'form_' . $methodid . '_detail_scan_fabric_shipment_id'), 1 => array('field' => 'bc_in_header_id', 'form_id' => 'form_' . $methodid . '_detail_scan_bc_in_header_id')));

							$this->ecc_library->jqgrid($methodid . "_fabric_list", $dashboard_table['field_fabric_list_recive'], $dashboard_table['field_loaddata_list_recive'], $extra_param);
							?>
						</div>
					</div>
				</div>
				<br>
				<!-- UNTUK PROSES INPUT ALL BELUM BERFUNGSI KARENA HARUS MEMIKIRKAN BAGAIMANA UNTUK PROSES INSERT KE GOOD RECEIVE ECC  -->
                <div class="col-xl-12">
			     <div class="row">
			      <div class="col-xl-12 d-flex gap-2">
          		    <button type="button" class="btn btn-info" onclick="javascript:add_all_receive_<?php echo $methodid ?>();">
					<i class="fa fa-plus"></i> receive All
				    </button> 
					&nbsp;
				    <div class="col-xl-4" id="status_<?php echo $methodid ?>_receive_all" style="display:none; margin: 2px 0; padding: 2px; border: 1px solid #3c8dbc; background: #f0f9ff;">
					  <span id="loader_icon_all"><i class="fa fa-spinner fa-spin"></i></span>
					   <strong id="status_pesan_all">Menyiapkan data...</strong>
				    </div>
				  </div>
				 </div>
               </div> 

			</div>
		</div>
	</div>
</div>

<div class="tab_custom_ecc modal fade" id="modal_report_receive" role="dialog" aria-labelledby="exampleModalLabel" tabindex="-1">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">.:: Report Receive</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="col-xl-12">
					<div class="row">
						<div class="col-xl-12 table-responsive">
							<?php
							$extra_param = array('methodid' => $methodid, 'extra_param' => array(0 => array('field' => 'fabric_warehouse_receive_id', 'form_id' => 'form_' . $methodid . '_detail_scan_fabric_warehouse_receive_id')));
							$this->ecc_library->jqgrid($methodid . "_mdl_rpt_receive", $dashboard_table['field_report_receive_table'], $dashboard_table['field_loaddata_report_receive_table'], $extra_param);
							?>
						</div>
					</div>
				</div>
				<br>
				<!-- UNTUK PROSES INPUT ALL BELUM BERFUNGSI KARENA HARUS MEMIKIRKAN BAGAIMANA UNTUK PROSES INSERT KE GOOD RECEIVE ECC -->

				<!--   <div class="form-check mb-10">
          		  <button type="button" class="btn btn-info" onclick="javascript:add_all_receive_<?php //echo $methodid 
																									?>();">
					<i class="fa fa-plus"></i> receive All
				  </button>
               </div> -->

			</div>
		</div>
	</div>
</div>



<script>
	//---scrip membuat autofokus
	//  $(document).ready(function() {
	// Pastikan kursor selalu di input barcode meskipun user klik di luar
	//      $(document).click(function() {
	//          $("#form_<?php //echo $methodid 
							?>_detail_scan_fabric_barcode").focus();
	//      });
	//	});
	//const inputBarcode = document.getElementById('form_<?php //echo $methodid 
															?>_detail_scan_fabric_barcodexx');
	//_detail_scan_insert_barcode

	//inputBarcode.addEventListener('keydown', (e) => {
	//  if (e.key === 'Enter') {
	//	//  alert('masuk');
	// 	  var fabric_barcode = $('#form_<?php //echo $methodid 	
											?>_detail_scan_fabric_barcodexx').val();
	//	  scan_barcode_<?php //echo $methodid 
							?>(fabric_barcode);
	//     // console.log('Barcode Terdeteksi:', e.target.value);
	//    //e.target.value = ''; // Reset untuk pemindaian berikutnya
	//  }
	//});
</script>