<style>
	.fabric_barcodexxx {
		height: 50px;
		font-size: 1.2rem;
		/* Sebaiknya imbangi dengan ukuran font agar proporsional */
	}

	/* Standar untuk HP */
	#reader {
		width: 100% !important;
		max-width: 400px;
		/* Default lebar maksimal */
		margin: 20px auto;
		border: 2px solid #ddd !important;
		border-radius: 12px;
		overflow: hidden;
		background: #f8f9fa;
	}

	/* Khusus untuk Tablet (lebar layar 600px - 1024px) */
	@media only screen and (min-width: 600px) and (max-width: 1024px) {
		#reader {
			max-width: 450px !important;
			/* Batasi lebar agar tidak terlalu besar di layar tablet */
		}
	}

	/* Khusus untuk Desktop (> 1024px) */
	@media only screen and (min-width: 1025px) {
		#reader {
			max-width: 350px !important;
		}
	}

	#reader video {
		width: 100% !important;
		height: auto !important;
		object-fit: cover;
	}
</style>
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
												<div class="col-xl-12">

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
													<div class="form_<?php echo $methodid ?>_barcode">
														<div class="col-xl-6">
															<div class="form-group">
																<label for="fabric_barcode">Barcode Scan</label>

																<div class="input-group">
																	<div class="input-group-prepend">
																		<span class="input-group-text"><i class="fa fa-barcode"></i></span>
																	</div>
																	<input
																		type="text"
																		class="form-control fabric_barcode"
																		id="form_<?php echo $methodid ?>_location_barcode"
																		name="subcon_out_barcode"
																		placeholder="Scan Barcode / Location Blok (LB...) / Location Code (LD...) /Fabric Shipment Barcode"
																		autofocus />

																	<div class="input-group-append">
																		<button
																			class="btn btn-danger"
																			type="button"
																			id="btn_reset_barcode_<?php echo $methodid ?>"
																			title="Reset Filter Barcode">
																			<i class="fa fa-refresh"></i> Reset
																		</button>
																	</div>
																</div>

																<small class="text-muted">
																	<i class="fa fa-info-circle"></i>
																	Prefix otomatis:
																	<strong class="text-success">LB...</strong> = Location Blok &nbsp;|&nbsp;
																	<strong class="text-primary">LD...</strong> = Location Code &nbsp;|&nbsp;
																	<strong class="text-warning">Lainnya</strong> = Fabric Shipment Barcode
																</small>
															</div>

														</div>
													</div>
												</div>

												<div class=" row ml-3">

													<div class="button-function col-12 mb-2">
														<div class="form_<?php echo $methodid ?>_button_location">
															<div class="d-flex flex-wrap gap-2">

																<button type="button"
																	class="btn btn-outline-info"
																	onclick="javascript:add_<?php echo $methodid ?>();"
																	style="min-width: 148px;">
																	<i class="fa fa-plus"></i> Add
																</button>

																<button type="button"
																	class="btn btn-outline-primary"
																	onclick="javascript:add_shipment_<?php echo $methodid ?>();"
																	style="min-width: 148px;">
																	<i class="fa fa-plus"></i> Add Shipment
																</button>

																<button type="button"
																	class="btn btn-outline-warning"
																	style="min-width: 148px;"
																	onclick="javascript:edit_<?php echo $methodid ?>();">
																	<i class="fa fa-edit"></i> Edit /
																	<span style="color: red;">Pindahkan</span>
																</button>

																<button type="button"
																	class="btn btn-outline-danger"
																	style="min-width: 148px;"
																	onclick="javascript:shipment_list_code_<?php echo $methodid ?>();">
																	<i class="fa fa-print"></i> Cetak Barcode
																</button>

																<button type="button"
																	class="btn btn-outline-success"
																	style="min-width: 170px;"
																	onclick="javascript:receive_other_split_<?php echo $methodid ?>();">
																	<i class="fa fa-code-fork"></i> Other Receive Split
																</button>

															</div>
														</div>
													</div>
													<div class="filter-function col-12 col-lg-5 mb-3">
														<div class=" border rounded p-2 shadow-sm" style="border-color:#ccc !important;">

															<div class="mb-2">
																<strong class="d-block d-sm-inline">Search by:</strong>
																<label class="mr-2">
																	<input type="radio" name="search_type" value="block" checked> Block
																</label>
																<label>
																	<input type="radio" name="search_type" value="location"> Location
																</label>
															</div>

															<div id="block_form" style="width: 90%;">
																<?php
																$this->ecc_library->form2('select_pop', 'Block', "form_" . $methodid, 'location_base_id', '', '', 'get_location_base_id', 4);
																?>
															</div>

															<div id="location_form" style="display: none; width: 90%;">
																<?php
																$this->ecc_library->form2('select_pop', 'location', "form_cari_" . $methodid, 'add_location_id', '', '', 'get_fabric_location', 4);
																?>
															</div>

														</div>
													</div>

												</div>
												<div class="form-add form_update_new_<?php echo $methodid ?>" style="display:none">

													<form class="ui grid ecc_form" id="form_update_new_<?php echo $methodid ?>" action="javascript:item_new_location_<?php echo $methodid ?>()">
														<?php
														$this->ecc_library->form('hidden', '', "form_update_new_" . $methodid, $this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
														$this->ecc_library->form2('hidden', 'Quantity', "stock_move_sipop_id" . $methodid, 'stock_move_sipop_id', '', '', '');
														$this->ecc_library->form('hidden', '', "form_update_new_" . $methodid, 'fabric_shipment_list_code', '', '', '');
														$this->ecc_library->form('hidden', '', "form_update_new_" . $methodid, 'fabric_shipment_id', '', '', '');
														$this->ecc_library->form2('hidden', 'Receive date', "form_update_new_" . $methodid, 'fabric_warehouse_receive_date', '', '');
														$this->ecc_library->form2('hidden', 'Stock Date', "form_update_new_" . $methodid, 'stock_move_date', '', '', '');
														?>

														<!-- Barcode Display Info -->
														<div id="display_barcode_input_<?php echo $methodid ?>"
															style="display:none; margin-top:10px; padding:10px 14px; background:#f0f8ff; border-left:4px solid #007bff; border-radius:3px; font-size:14px;">
															<i class="fa fa-barcode" style="color:#007bff; margin-right:6px;"></i>
															<strong>Barcode:</strong>
															<span id="display_barcode_value_<?php echo $methodid ?>" style="color:#007bff; font-weight:bold;"></span>
															&nbsp;|&nbsp;
															<strong>Tipe:</strong>
															<span id="display_barcode_type_<?php echo $methodid ?>" style="color:#555;"></span>
														</div>

														<!-- PERUBAHAN: tambah justify-content-start agar kedua kolom rata kiri -->
														<div class="row justify-content-start mt-3">

															<!-- KOLOM KIRI -->
															<div class="col-12 col-md-5">
																<div class="card">
																	<div class="card-body">
																		<?php $this->ecc_library->form2('text', 'Shipment No', "form_update_new_" . $methodid, 'fabric_shipment_no', '', ''); ?>
																		<?php $this->ecc_library->form2('text', 'Colour', "form_update_new_" . $methodid, 'fabric_shipment_colour', '', '', ''); ?>
																		<?php $this->ecc_library->form2('text', 'Lot', "form_update_new_" . $methodid, 'fabric_shipment_lot', '', '', ''); ?>
																		<?php $this->ecc_library->form2('number', 'Weight', "form_update_new_" . $methodid, 'fabric_shipment_weight', '', '', ''); ?>
																		<?php $this->ecc_library->form2('select_pop', 'Uom Code', "form_update_new_" . $methodid, 'uom_id', '', '', 'view_uom_fabric_location', 4); ?>
																		<?php $this->ecc_library->form2('select_pop', 'Location', "form_update_new_" . $methodid, 'location_id_tes', 'location_id', '', 'get_fabric_location_update_new', 4); ?>
																	</div>
																</div>
															</div>

															<!-- KOLOM KANAN -->
															<div class="col-12 col-md-5">
																<div class="card">
																	<div class="card-body">
																		<?php $this->ecc_library->form2('select_pop', 'Purchase Order No', "form_update_new_" . $methodid, 'purchase_order_warehouse_id', '', '', 'data_list_po_warehouse_fabric_location', '6'); ?>
																		<?php $this->ecc_library->form2('select_pop', 'Item Code', "form_update_new_" . $methodid, 'item_id', '', '', 'get_shipment_code_fabric_location', 4); ?>
																		<?php $this->ecc_library->form2('number', 'Bale', "form_update_new_" . $methodid, 'fabric_shipment_bale', '', '', ''); ?>
																		<?php $this->ecc_library->form2('number', 'Roll', "form_update_new_" . $methodid, 'fabric_shipment_roll', '', '', ''); ?>
																		<?php $this->ecc_library->form2('number', 'Quantity', "form_update_new_" . $methodid, 'quantity', '', '', ''); ?>

																		<!-- Tombol di bawah kolom kanan -->
																		<div class="mt-3">
																			<button type="submit" class="btn btn-outline-success">
																				<i class="fa fa-save"></i> Save
																			</button>
																			&nbsp;
																			<button type="button" class="btn btn-outline-secondary" onclick="javascript:clear_<?php echo $methodid ?>();">
																				<i class="fa fa-undo"></i> Clear
																			</button>
																		</div>
																	</div>
																</div>
															</div>

														</div><!-- End row -->

													</form>
												</div>
												<div class="form_<?php echo $methodid ?>_update_location" style="display:none">
													<form class="form" id="form_<?php echo $methodid ?>">
														<div class="col-xl-12">
															<div class="row">

																<div class="col-xl-4 mb-4">
																	<?php
																	$this->ecc_library->form2('select_pop_custom', 'location', "form_" . $methodid, 'add_location_id', '', '', 'get_fabric_location_update_location', 4);

																	?>

																</div>
															</div>
														</div>

														<div class="form-group">

															&nbsp &nbsp
															<button type="button" class="btn btn-default" onclick="javascript:update_location<?php echo $methodid ?>();">
																<i class="fa fa-save"></i> Update
															</button>

															&nbsp &nbsp
															<button type="button" class="btn btn-default" onclick="javascript:clear_<?php echo $methodid ?>();">
																<i class="fa fa-undo"></i> clear
															</button>

														</div>
													</form>
												</div>

												<div class="form_shipment_<?php echo $methodid ?>_add_shipment" style="display:none">

													<form class="ui grid ecc_form"
														id="form_shipment_<?php echo $methodid ?>"
														action="javascript:item_shipment_location_<?php echo $methodid ?>()">

														<?php
														// CSRF
														$this->ecc_library->form(
															'hidden',
															'',
															"form_shipment_" . $methodid,
															$this->security->get_csrf_token_name(),
															$this->security->get_csrf_hash()
														);

														// Hidden: stock_move_sipop_id
														$this->ecc_library->form2(
															'hidden',
															'',
															"form_shipment_" . $methodid,
															'stock_move_sipop_id',
															'',
															'',
															''
														);

														// Hidden: fabric_warehouse_receive_id
														$this->ecc_library->form2(
															'hidden',
															'',
															"form_shipment_" . $methodid,
															'fabric_warehouse_receive_id',
															'',
															'',
															''
														);

														// Hidden: fabric_warehouse_receive_detail_ids (CSV dari view_shipment_po)
														$this->ecc_library->form2(
															'hidden',
															'',
															"form_shipment_" . $methodid,
															'fabric_warehouse_receive_detail_ids',
															'',
															'',
															''
														);
														?>

														<div class="table-responsive mt-2 col-md-7">
															<table class="table">
																<tbody>

																	<tr>
																		<td>
																			<?php
																			$this->ecc_library->form2(
																				// 'select_pop_custom',
																				'select_pop',
																				'Shipment No',
																				"form_shipment_" . $methodid,
																				'purchase_order_detail_id_tes',
																				'',
																				'',
																				'data_list_po_warehouse_fix',
																				'4'
																			);
																			?>
																		</td>


																		<td>

																			<?php
																			$this->ecc_library->form2(
																				'select_pop',
																				'Item Code',
																				"form_shipment_" . $methodid,
																				'item_id',
																				'',
																				'',
																				'get_shipment_code_fix',
																				'4',
																				array('extra_param' => array(
																					0 => array('field' => 'purchase_order_detail_id_tes')
																				))
																			);
																			?>

																		</td>
																	<tr>
																		<td>
																			<?php
																			$this->ecc_library->form2(
																				'select_pop',
																				'Location',
																				"form_shipment_" . $methodid,
																				'location_id',
																				'',
																				'',
																				'get_fabric_location_shipment',
																				4
																			);
																			?>
																		</td>
																		<td>
																			<div class="form-group">
																				&nbsp;&nbsp;
																				<button type="submit" class="btn btn-success">
																					<i class="fa fa-save"></i> Save
																				</button>
																				&nbsp;&nbsp;
																				<button type="button" class="btn btn-danger"
																					onclick="javascript:clear_shipment_<?php echo $methodid ?>();">
																					<i class="fa fa-undo"></i> Cancel
																				</button>
																			</div>
																		</td>
																	</tr>
																	</tr>
																</tbody>
															</table>
														</div>

														<br>

													</form>
												</div>
												<br>
												<div class="row">
													<div class="col-12 col-xl-12 table-responsive w-100">
														<div class="grid_container_<?php echo $methodid ?>">
															<table
																id="table_<?php echo $methodid ?>"
																data-form-id="form_sub_<?php echo $methodid ?>_stock_move_sipop_id_sub">
															</table>
															<div id="ptable_<?php echo $methodid ?>"></div>
														</div>
													</div>
													<!-- <div class="col-xl-12 table-responsive mt-2">
								<div class="grid_container_<?php echo $methodid ?>">
									<h6>Data Fabric Location Sub</h6>
									<?php
									$extra_param = array(
										'methodid' => $methodid,
										'extra_param' => array(
											0 => array(

												'field' => 'stock_move_sipop_id',
												'form_id' => 'form_sub_' . $methodid . '_stock_move_sipop_id_sub'
											)
										)
									);

									$this->ecc_library->jqgrid2(
										$methodid . "_sub",
										$dashboard_table['field_sub'],
										$dashboard_table['field_sub_loaddata'],
										$extra_param
									);
									?>
									<input type="hidden" id="form_sub_<?php echo $methodid ?>_stock_move_sipop_id_sub" value="">
								</div>

								<br>
							</div> -->
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
<div class="modal fade" id="modal_update_lokasi_<?php echo $methodid ?>" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Update Lokasi Item</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="alert alert-warning">
					<strong>Informasi Item:</strong><br>
					Barcode: <span id="display_barcode_<?php echo $methodid ?>"></span><br>
					Item Code: <span id="display_item_code_<?php echo $methodid ?>"></span><br>
					Item Name: <span id="display_item_name_<?php echo $methodid ?>"></span><br>

				</div>

				<form class="ui grid ecc_form" id="form_update_<?php echo $methodid ?>" action="javascript:update_location_<?php echo $methodid ?>()">
					<?php

					$this->ecc_library->form('hidden', '', "form_update_" . $methodid, $this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
					$this->ecc_library->form('hidden', '', "form_update_" . $methodid, 'stock_move_sipop_id', '');
					?>

					<div class="form-group">
						<label>Pilih Lokasi Baru:</label>
					</div>
					<div class="form-group ml-3">
						<?php
						$this->ecc_library->form2('select_pop_custom', 'location', "form_update_" . $methodid, 'location_id_tes', 'location_id', '', 'get_fabric_location_update', 4);
						?>

						<!-- <?php
								$this->ecc_library->form2(
									'select_pop_custom',
									'Rak',
									"form_update_" . $methodid,
									'location_detail_id',
									'',
									'',
									'get_location_detail_code',
									'4',
									array('extra_param' => array(
										0 => array('field' => 'location_id_tes')
									))
								);
								?> -->


					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-primary">Simpan Perubahan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- ✅ Modal View More -->
<div class="modal fade" id="modal_view_more" tabindex="-1" role="dialog"
	aria-labelledby="modal_view_more_label" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">

			<div class="modal-header" style="background-color:#17a2b8; color:#fff;">
				<h5 class="modal-title" id="modal_view_more_label">
					<i class="fa fa-eye"></i> Detail Lokasi Fabric
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"
					style="color:#fff;">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body" id="modal_view_more_body">
				<!-- Konten diisi oleh JavaScript -->
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">
					<i class="fa fa-times"></i> Tutup
				</button>
			</div>

		</div>
	</div>
</div>

<div class="modal fade" id="modal_receive_other_split_<?php echo $methodid ?>" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Split Item Receive</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="alert alert-warning">
					<strong>Informasi Item:</strong><br>
					Barcode Induk: <span id="display_barcode_split_<?php echo $methodid ?>"></span><br>
					Item Code: <span id="display_item_code_split_<?php echo $methodid ?>"></span><br>
					Item Name: <span id="display_item_name_split_<?php echo $methodid ?>"></span><br>
					Quantity: <span id="display_quantity_split_<?php echo $methodid ?>"></span><br>

				</div>

				<form class="ui grid ecc_form" id="form_split_<?php echo $methodid ?>" action="javascript:receive_other_split_post_<?php echo $methodid ?>()">
					<?php

					$this->ecc_library->form('hidden', '', "form_split_" . $methodid, $this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
					$this->ecc_library->form('hidden', '', "form_split_" . $methodid, 'stock_move_sipop_id', '');
					?>

					<div class="form-group">
						<label>Pilih Lokasi Baru:</label>
					</div>
					<div class="form-group ml-3">
						<?php
						$this->ecc_library->form2('hidden', 'stock move sipop id', "form_split_" . $methodid, 'parent_id', '', '', '');
						$this->ecc_library->form2('hidden', 'Item ID', "form_split_" . $methodid, 'item_id', '', '', '');
						$this->ecc_library->form2('text', 'Fabric Shipment List Code', "form_split_" . $methodid, 'fabric_shipment_list_code', '', '', '');
						$this->ecc_library->form2('number', 'Quantity', "form_split_" . $methodid, 'quantity', '', '', '');

						$this->ecc_library->form2('select_pop', 'location', "form_split_" . $methodid, 'location_id', '', '', 'get_fabric_location_update_split', 4);
						?>




					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-primary">Simpan Split</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>