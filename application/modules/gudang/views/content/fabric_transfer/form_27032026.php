<style>
   /* Pastikan tabel footer tidak meluap dari containernya */
   .ui-jqgrid .ui-jqgrid-sdiv {
       width: 100% !important;
   }
   .ui-jqgrid .ui-jqgrid-ftable {
       width: 100% !important;
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
										$this->ecc_library->form('hidden', '', "form_" . $methodid, 'fabric_transfer_id', '');
										$this->ecc_library->form('hidden', '', "form_" . $methodid, 'fabric_transfer_edit', '');
										?>

										<div class="row">
											<div class="col-xl-4">
												<?php
												$this->ecc_library->form('text', 'Production Transfer No', "form_" . $methodid, 'fabric_transfer_no', '', '', '');
												?>
											</div>

											<div class="col-xl-3">
												<?php

												$this->ecc_library->form('date', 'Production Transfer Date', "form_" . $methodid, 'fabric_transfer_date', '', '', '');
												?>
											</div>

											<div class="col-xl-4">
												<?php
												$this->ecc_library->form('select', 'Production Request', "form_" . $methodid, 'fabric_request_id', '', '', 'work_order_request');
												?>
											</div>
										</div>
									</form>

									<div class="row ">
										<div class="col-xl-12">
											<?php
											$extra_param = array('methodid' => $methodid, 'extra_param' => array(0 => array('field' => 'work_order_request_id', 'form_id' => 'form_' . $methodid . '_fabric_request_id')));
											$this->ecc_library->jqgrid($methodid . "_detail", $dashboard_table['field_detail'], $dashboard_table['field_detail_loaddata'], $extra_param);
											?>
										</div>
									</div>
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

						<div class="tab_custom_ecc tab-pane fade" id="content_<?php echo $methodid; ?>_supply" role="tabpanel" aria-labelledby="tab_<?php echo $methodid; ?>_supply">
							<div class="row panel_<?php echo $methodid ?>_panel_supply">
								<div class="col-xl-12">
									<div class="row">
										<div class="col-xl-4">
											<?php
											$this->ecc_library->form('readonly', 'Production Transfer No', "form_" . $methodid . "_supply", 'fabric_transfer_no', '', '', '');
											$this->ecc_library->form('hidden', '', "form_" . $methodid . "_supply", 'stock_move_sipop_id', '');
											?>
										</div>

										<div class="col-xl-4">
											<?php
											$this->ecc_library->form('readonly', 'Production Transfer Date', "form_" . $methodid . "_supply", 'fabric_transfer_date', '', '', '');
											?>
										</div>

										<div class="col-xl-4">
											<?php
											$this->ecc_library->form('readonly', 'Production Request', "form_" . $methodid . "_supply", 'work_order_request_no', '', '', '');
											?>
										</div>
									</div>

									<div class="row">
										<div class="col-xl-12 mb-30">
											<div class="form-group">
												<label for="fabric_barcode">Barcode Scan</label>
												<div class="input-group">
													<div class="input-group-prepend">
														<span class="input-group-text"><i class="fa fa-barcode"></i></span>
													</div>

													<!-- onfocus="this.value=''"  dan  autofocus="autofocus"/> -->
													<input type="text" class="form-control fabric_barcode" id="form_<?php echo $methodid ?>_supply_fabric_barcode" name="fabric_barcode" autofocus />

												</div>
											</div>

											<div class="row">
												<div class="col-xl-12">

													<?php
													//	$extra_param = array('methodid'=> $methodid,'onclick'=> 'click_transfer_'.$methodid,'extra_param' => array(0 => array('field' => 'work_order_request_id','form_id' => 'form_'. $methodid .'_supply_work_order_request_id')));
													$extra_param = array('methodid' => $methodid, 'onclick' => 'click_transfer_' . $methodid, 'extra_param' => array(0 => array('field' => 'fabric_transfer_id', 'form_id' => 'form_' . $methodid . '_supply_fabric_transfer_id')));
													$this->ecc_library->jqgrid($methodid . "_supply", $dashboard_table['field_detail_supply'], $dashboard_table['field_detail_supply_loaddata'], $extra_param);
													?>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-xl-12 mb-30">
											<div class="col-xl-12">

												<?php
												//$extra_field = array();
												//$extra_param = array('methodid'=> $methodid,'extra_param' => array(0 => array('field' => 'fabric_transfer_id','form_id' => 'form_'. $methodid .'_supply_fabric_transfer_id')));
												$extra_param = array('methodid' => $methodid, 'extra_param' => array(0 => array('field' => 'fabric_transfer_detail_id', 'form_id' => 'form_' . $methodid . '_supply_fabric_transfer_detail_id')));
												$this->ecc_library->jqgrid($methodid . "_list_transfer", $dashboard_table['field_transfer_supply'], $dashboard_table['field_transfer_supply_loaddata'], $extra_param);
												?>
											</div>
										</div>
									</div>
									<?php
									$this->ecc_library->form('hidden', '', "form_" . $methodid . "_supply", 'fabric_transfer_id', '');
									$this->ecc_library->form('hidden', '', "form_" . $methodid . "_supply", 'fabric_transfer_detail_id', '');

									$this->ecc_library->form('hidden', '', "form_" . $methodid . "_supply", 'work_order_transfer_id', '');
									$this->ecc_library->form('hidden', '', "form_" . $methodid . "_supply", 'work_order_request_id', '');
									$this->ecc_library->form('hidden', '', "form_" . $methodid . "_supply", 'work_order_request_list_id', '');
									$this->ecc_library->form('hidden', '', "form_" . $methodid . "_supply", 'work_order_transfer_detail_id', '');

									?>



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

<!-- sebelumnya menggunakan aria-hidden="true" dan tabindex="-1"  ini bisa menyebabkan autocomplete colour tidak bisa diimput -->
<!-- <div class="tab_custom_ecc modal fade" id="modal_fabric_supply_detail"  role="dialog" aria-labelledby="exampleModalLabel" tabindex="-1" aria-hidden="true"> -->
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
				<div class="row ">
					<div class="col-xl-12 table-responsive">
						<?php
						$extra_param = array('methodid' => $methodid, 'footer_data' => true, 'extra_param' => array(0 => array('field' => 'item_id', 'form_id' => 'form_' . $methodid . '_mdl_supply_item_id')));
						//$this->ecc_library->jqgrid($methodid . "_mdl_stock", $dashboard_table['field_available_transfer'], $dashboard_table['field_available_loaddata'], $extra_param);
						$this->ecc_library->jqgrid_gudang_transfer($methodid . "_mdl_stock", $dashboard_table['field_available_transfer'], $dashboard_table['field_available_loaddata'], $extra_param);
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
						$this->ecc_library->jqgrid($methodid . "_mdl_manual_transfer", $dashboard_table['field_manual_transfer'], $dashboard_table['field_manual_loaddata'], $extra_param);
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>