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


					</ul>

					<div class="tab-content">
						<div class="tab_custom_ecc tab-pane fade active show" id="content_<?php echo $methodid; ?>_header" role="tabpanel" aria-labelledby="tab_<?php echo $methodid; ?>_header">
							<div class="row panel_<?php echo $methodid ?>_panel_header">
								<div class="col-xl-12 mb-10 ml-10">
									<form class="ui grid ecc_form" id="form_<?php echo $methodid ?>" action="javascript:post_<?php echo $methodid ?>()">
										<?php
										$this->ecc_library->form('hidden', '', "form_" . $methodid, $this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
										$this->ecc_library->form('hidden', '', "form_" . $methodid, 'work_order_return_id', '');
										$this->ecc_library->form('hidden', '', "form_" . $methodid, 'work_order_request_id', '');

										?>

										<div class="row">
											<div class="col-xl-4">
												<?php
												// $this->ecc_library->form('select', 'Work Process', "form_" . $methodid, 'work_process_id', '', '', 'work_process_user');
												$this->ecc_library->form('hidden', 'Work Process', "form_" . $methodid, 'work_process_id', '', '', '');
												$this->ecc_library->form('select_pop', 'Work Order Plan No', "form_" . $methodid, 'work_order_plan_id', '', '', 'data_fabric_transfer_return_select');

												$this->ecc_library->form('date', 'Tanggal Request', "form_" . $methodid, 'work_order_return_date', '', '', '');
												$this->ecc_library->form('text', 'Return No', "form_" . $methodid, 'work_order_return_no', '', 'readonly', '');


												// $this->ecc_library->form('select_pop', 'Return ECC', "form_" . $methodid, 'work_order_return_ecc_id', '', '', 'data_fabric_return_ecc');
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
									<br />
									<br />
									<br />
								</div>
							</div>

						</div>

						<div class="tab_custom_ecc tab-pane fade" id="content_<?php echo $methodid; ?>_detail_scan" role="tabpanel" aria-labelledby="tab_<?php echo $methodid; ?>_detail_scan">
							<div class="row panel_<?php echo $methodid ?>_panel_detail_scan">
								<div class="col-xl-12">

									<?php

									$this->ecc_library->form('hidden', 'work order return show', "form_detail_return_" . $methodid, 'work_order_return_id', '');
									$this->ecc_library->form('hidden', 'fabric transfer', "form_detail_return_" . $methodid, 'fabric_transfer_id', '');


									?>


									<div class="col-xl-6 mb-30">
										<div class="form-group">
											<label for="fabric_barcode">Barcode Scan transfer</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text"><i class="fa fa-barcode"></i></span>
												</div>
												<input type="text"
													class="form-control fabric_barcode"
													id="form_<?php echo $methodid ?>_supply_fabric_barcode"
													name="fabric_barcode"
													autocomplete="off"
													autofocus />
											</div>
											<div class="form_<?php echo $methodid ?>_scan_mobile">
												<div class="col-xl-12 d-flex justify-content-end">
													<button type="button" class="btn btn-info" onclick="javascript:scan_mobile_location_<?php echo $methodid ?>()">
														<i class="fa fa-mobile"></i> Mobile
													</button>
												</div>
											</div>

											<div class="form_<?php echo $methodid ?>_back" style="display:none">
												<div class="d-flex justify-content-center align-items-center vh-100">
													<div class="col-xl-6">
														<div class="form-group">
															<div class="card shadow-sm mb-4">
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
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="panel panel-default" style="border: 1px solid #ddd; padding: 10px;">
												<div class="panel-body">
													<h5 class="card-title">Fabric Transfer Supply</h5>

													<input type="hidden"
														id="form_cek_supply_<?php echo $methodid ?>_fabric_transfer_id"
														name="fabric_transfer_id"
														value="" />

													<?php
													$extra_param_cek = array(
														'methodid' => $methodid,
														'onclick' => 'click_cek_supply_' . $methodid, // Fungsi saat baris diklik
														'extra_param' => array(
															0 => array(
																'field' => 'fabric_transfer_id',
																'form_id' => 'form_cek_' . $methodid . '_fabric_transfer_id'
															)
														)
													);

													$this->ecc_library->jqgrid2(
														$methodid . "_cek_supply",
														$dashboard_table['field_cek_supply'],
														$dashboard_table['field_cek_supply_loaddata'],
														$extra_param_cek
													);
													?>

													<input type="hidden" id="form_cek_<?php echo $methodid ?>_fabric_transfer_id" value="">
												</div>
											</div>
										</div>

										<div class="col-md-6">
											<div class="panel panel-default" style="border: 1px solid #ddd; padding: 10px;">
												<div class="panel-body">
													<h5 class="card-title">Item Return Result</h5>

													<?php
													$extra_param_return = array(
														'methodid' => $methodid,
														'extra_param' => array(
															0 => array(
																'field' => 'fabric_transfer_supply_id',
																'form_id' => 'form_cek_supply_' . $methodid . '_fabric_transfer_supply_id'
															)
														)
													);

													$this->ecc_library->jqgrid2(
														$methodid . "_return",
														$dashboard_table['field_return'],
														$dashboard_table['field_return_loaddata'],
														$extra_param_return
													);
													?>

													<input type="hidden" id="form_cek_supply_<?php echo $methodid ?>_fabric_transfer_supply_id" value="">
												</div>
											</div>
										</div>
									</div>

									<div class="row ">
										<div class="col-xl-12">
											<form class="ui grid ecc_form" id="form_<?php echo $methodid ?>_detail" action="javascript:post_<?php echo $methodid ?>()">
												<?php
												$this->ecc_library->form('hidden', '', "form_detail_" . $methodid, '', $this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
												$this->ecc_library->form('hidden', '', "form_detail_" . $methodid, 'work_order_return_id', '', '', '');
												$this->ecc_library->form('hidden', '', "form_detail_" . $methodid, 'work_order_request_id', '', '', '');
												$this->ecc_library->form('hidden', '', "form_detail_" . $methodid, 'work_order_plan_id', '', '', '');
												?>
											</form>


											<div class="row">
												<!-- Grid Kiri -->
												<!-- <div class="col-md-6">
													<h3>Data Transfer</h3>
													<?php
													$extra_param = array(
														'methodid' => $methodid,
														'onclick' => 'click_cek_' . $methodid, // Memanggil fungsi JS di atas
														'extra_param' => array(
															0 => array(
																'field' => 'work_order_plan_id',
																'form_id' => 'form_detail_' . $methodid . '_work_order_plan_id'
															)
														)
													);
													$this->ecc_library->jqgrid2($methodid . "_detail", $dashboard_table['field_detail'], $dashboard_table['field_detail_loaddata'], $extra_param);
													?>
												</div> -->

												<!-- Grid Kanan -->
												<!-- <div class="col-md-6">
													<h3>Data Item Cek</h3>
													<?php
													$extra_param_cek = array(
														'methodid' => $methodid,
														'onclick' => 'click_return_' . $methodid,
														'extra_param' => array(
															0 => array(
																'field' => 'fabric_transfer_id', // Nama parameter yang dikirim ke Controller
																'form_id' => 'form_detail_' . $methodid . '_fabric_transfer_id' // ID elemen input penampung
															)
														)
													);
													$this->ecc_library->jqgrid2($methodid . "_cek", $dashboard_table['field_cek'], $dashboard_table['field_cek_loaddata'], $extra_param_cek);
													?>
												</div> -->
											</div>


											<input type="hidden" id="form_detail_<?php echo $methodid ?>_fabric_transfer_id" value="">






										</div>
									</div>
								</div>
							</div>

							<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="detailModalLabel">Detail</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<form class="ui grid ecc_form" id="form_return_<?php echo $methodid ?>" action="javascript:post_return_<?php echo $methodid ?>()">
												<?php
												$this->ecc_library->form('hidden', '', "form_return_" . $methodid, $this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
												$this->ecc_library->form('hidden', 'Work Order Return Detail Id', "form_return_" . $methodid, 'work_order_return_detail_id', '', '', '');

												$this->ecc_library->form('hidden', 'Work Order Return Id', "form_return_" . $methodid, 'work_order_return_id', '', '', '');
												$this->ecc_library->form('hidden', 'Fabric Transfer Supply Id', "form_return_" . $methodid, 'fabric_transfer_supply_id', '', '', '');

												$this->ecc_library->form('readonly', 'Quantity Tersedia', "form_return_" . $methodid, 'quantity_available', '', '', 'readonly');
												$this->ecc_library->form('readonly', 'Return Dummy', "form_return_" . $methodid, 'return_dummy', '', '', 'readonly');

												$this->ecc_library->form('hidden', 'Barcode', "form_return_" . $methodid, 'barcode_return', '', '', 'readonly');


												$this->ecc_library->form('number', 'Return Request', "form_return_" . $methodid, 'return_request', '', '', '');
												//$this->ecc_library->form('hidden','',"form_".$methodid,'this_memo','');
												?>

											</form>
											<div class="ui grid form">
												<div class="row field">
													<div class="twelve wide column">
														<button type="button" id="btn_save_return_<?php echo $methodid ?>" class="btn btn-success" onclick="save_return_<?php echo $methodid ?>()">
															<i class="fa fa-save"></i> Save
														</button>

														<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
													</div>

													<div id="error_msg_<?php echo $methodid ?>" style="color: red; margin-top: 10px; display: none;">
														<i class="fa fa-warning"></i> Quantity request melebihi quantity yang tersedia!
													</div>
												</div>
											</div>
										</div>

									</div>
								</div>
							</div>
							<br>

						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
</div>