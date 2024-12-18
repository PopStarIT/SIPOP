<div class="row">
	<div class="col-xl-12">
		<div class="card card-statistics h-100">
			<div class="card-body" style="padding: 1.25rem !important">
				<h5 class="card-title form_title_<?php echo $methodid ?>"><?php echo $page_title ?></h5>
				<?php

				?>
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
							<a class="nav-link" id="tab_<?php echo $methodid; ?>_trims" data-toggle="tab" href="#content_<?php echo $methodid; ?>_trims" role="tab" aria-controls="content_<?php echo $methodid; ?>_trims" aria-selected="true">
								Trims
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="tab_<?php echo $methodid; ?>_picture" data-toggle="tab" href="#content_<?php echo $methodid; ?>_picture" role="tab" aria-controls="content_<?php echo $methodid; ?>_picture" aria-selected="true">
								Image
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="tab_<?php echo $methodid; ?>_audit" data-toggle="tab" href="#content_<?php echo $methodid; ?>_audit" role="tab" aria-controls="content_<?php echo $methodid; ?>_audit" aria-selected="true">
								Audit Trail
							</a>
						</li>

					</ul>

					<div class="tab-content">

						<div class="tab_custom_ecc tab-pane fade active show" id="content_<?php echo $methodid; ?>_header" role="tabpanel" aria-labelledby="tab_<?php echo $methodid; ?>_header">
							<div class="row">
								<div class="col-xl-12 mb-10 ml-10">
									<form class="ui grid ecc_form" id="form_<?php echo $methodid ?>" action="javascript:post_<?php echo $methodid ?>()" enctype="multipart/form-data" method="post">
										<?php
										$this->ecc_library->form('hidden', '', "form_" . $methodid, $this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
										$this->ecc_library->form('text', '', "form_" . $methodid, 'style_spec_header_id', '');

										?>

										<div class="row">
											<div class="col-xl-4">
												<div class="row">
													<div class="col-xl-12">
														<?php
														$this->ecc_library->form('text', 'Nomor', "form_" . $methodid, 'style_spec_nomor', '', '', '');

														?>
													</div>
													<div class="col-xl-8">
														<?php
														$this->ecc_library->form('date', 'Date', "form_" . $methodid, 'style_spec_date', '', '', '');
														$this->ecc_library->form('text', 'Fabric', "form_" . $methodid, 'style_spec_pabric', '', '', '');
														$this->ecc_library->form('text', 'Style sub', "form_" . $methodid, 'style_spec_sub', '', '', '');

														?>
													</div>
												</div>
											</div>

											<div class="col-xl-4">
												<div class="row">
													<div class="col-xl-8">
														<?php
														$this->ecc_library->form('select_pop', 'Style', "form_" . $methodid, 'item_id', '', '', 'item_detail');
														?>
													</div>

													<div class="col-xl-12">
														<div class="row">
															<div class="col-xl-6">
																<?php

																$this->ecc_library->form('text', 'Pattern', "form_" . $methodid, 'style_spec_pattern', '', '', '');

																$this->ecc_library->form('text', 'Alown susut', "form_" . $methodid, 'susut', '', '', '');


																?>

															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="col-xl-3">
												<?php

												$this->ecc_library->form('text', 'Buyer', "form_" . $methodid, 'buyer', '', '', '');
												$this->ecc_library->form('text', 'PO', "form_" . $methodid, 'po', '', '', '');
												$this->ecc_library->form('text', 'Note', "form_" . $methodid, 'note', '', '', '');

												?>
											</div>
										</div>
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
								</div>
							</div>
						</div>



						<div class="tab_custom_ecc tab-pane fade" id="content_<?php echo $methodid; ?>_detail" role="tabpanel" aria-labelledby="tab_<?php echo $methodid; ?>_detail">
							<div class="row panel_<?php echo $methodid ?>_panel_detail">
								<div class="col-xl-12">

									<div class="row" style="margin-top:8px;">
										<div class="col-xl-12">
											<div class="row">
												<div class="col-xl-8">
													<form class="ui grid ecc_form" id="form_<?php echo $methodid ?>_detail">
														<div class="row">
															<?php
															$this->ecc_library->form('hidden', '', "form_" . $methodid . "_detail", $this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
															$this->ecc_library->form('hidden', '', "form_" . $methodid . "_detail", 'style_spec_header_id', '', '', '');
															$this->ecc_library->form('hidden', '', "form_" . $methodid . "_detail", 'style_spec_detail_id', '');
															$this->ecc_library->form('hidden', '', "form_" . $methodid . "_detail", 'info_spec', '');

															?>
															<div class="col-xl-4">
																<?php

																$this->ecc_library->form('select_pop', 'Spec Template', "form_" . $methodid . "_detail", 'style_spec_detail_model_id', '', '', 'model_spec');
																?>
															</div>
															<div class="col-xl-3">
																<?php
																$this->ecc_library->form('select_pop', 'Basic', "form_" . $methodid . "_detail", 'basic_id', '', '', 'size');
																?>
															</div>
													</form>
													<div class="twelve wide column col-xl-3" style="margin-top:24px;">
														<button type="button" class="btn btn-success" onclick="copy_<?php echo $methodid ?>_spec_detail()">
															<i class="fa fa-plus"></i> Add hehe
														</button>

													</div>
												</div>

											</div>

										</div>



										<?php

										?>

										<div class="row" style="margin-top:8px;">
											<div class="col-xl-12 grid_container_<?php echo $methodid ?>_detail_spec">
												<table id="table_<?php echo $methodid ?>_detail_spec" max-width="5000"></table>
												<div id="ptable_<?php echo $methodid ?>_detail_spec"></div>





												<div class="text-left" style="margin-top: 10px;">
													<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newModal">
														<i class="fa fa-plus"></i> Add Point Of Measure
													</button>
												</div>






												<div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title" id="newModalLabel">Add New Item</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																<form class="ui grid ecc_form" id="form_new_item" action="javascript:add_new_item()">
																	<?php
																	// CSRF Token
																	$this->ecc_library->form('hidden', '', "form_new_item", $this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
																	?>
																	<div class="form-group">
																		<label for="style_spec_detail_measure">Style Spec Detail Measure</label>
																		<input type="text" class="form-control" id="style_spec_detail_measure" name="style_spec_detail_measure" required>
																	</div>
																	<div class="form-group">
																		<select id="style_spec_detail" name="style_spec_detail" class="form-control">
																			<option value="">-- Select --</option>
																			<?php if (!empty($style_spec_details)): ?>
																				<?php foreach ($style_spec_details as $detail): ?>
																					<option value="<?php echo $detail['style_spec_detail_id']; ?>">
																						<?php echo $detail['style_spec_detail_measure']; // Ganti 'detail' dengan nama kolom yang sesuai 
																						?>
																					</option>
																				<?php endforeach; ?>
																			<?php else: ?>
																				<option value="">No data available</option>
																			<?php endif; ?>
																		</select>
																	</div>
																	<!-- Add more fields as needed -->
																</form>
															</div>
															<div class="modal-footer">
																<div class="modal-footer">
																	<button type="button" class="btn btn-success" onclick="handleDropdownSelection()">Save</button>
																	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<br />




									</div>

								</div>
								<br />
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

					<div class="tab_custom_ecc tab-pane fade" id="content_<?php echo $methodid; ?>_trims" role="tabpanel" aria-labelledby="tab_<?php echo $methodid; ?>_trims">
						<div class="row panel_<?php echo $methodid ?>_panel_keluarga">
							<div class="col-xl-12">
								<form class="ui grid ecc_form" id="form_<?php echo $methodid ?>_trims" action="javascript:add_<?php echo $methodid ?>_trims()">
									<div class="row">
										<div class="col-xl-9">
											<div class="row">
												<div class="col-xl-5">
													<?php
													$this->ecc_library->form('hidden', '', "form_" . $methodid . "_trims", $this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
													$this->ecc_library->form('hidden', '', "form_" . $methodid . "_trims", 'style_spec_header_id', '', '', '');
													$this->ecc_library->form('hidden', '', "form_" . $methodid . "_trims", 'style_Spec_trim_id', '', '', '');
													$this->ecc_library->form('text', 'Description', "form_" . $methodid . "_trims", 'style_Spec_trim_description', '', '', '');
													?>
												</div>

												<div class="col-xl-4">
													<?php
													$this->ecc_library->form('text', 'Value', "form_" . $methodid . "_trims", 'style_Spec_trim_nilai', '', '', '');
													?>
												</div>


												<div class="col-xl-3">
													<?php
													$this->ecc_library->form('text', 'Note', "form_" . $methodid . "_trims", 'style_Spec_trim_note', '', '', '');
													?>
												</div>



											</div>
										</div>

										<div class="col-xl-3">
											<label> &nbsp </label>
											<div class="input-group">
												<div class="button_<?php echo $methodid ?>_keluarga_new" style="display:none">
													<button type="submit" class="btn btn-success">
														<i class="fa fa-plus"></i> ADD
													</button>
												</div>

												<div class="button_<?php echo $methodid ?>_keluarga_edit" style="display:none">
													<button type="submit" class="btn btn-success">
														<i class="fa fa-check"></i> SAVE
													</button>

													<a class="btn btn-danger" onclick="javascript:cancel_keluarga_<?php echo $methodid ?>()">
														<i class="fa fa-times"></i> CANCEL
													</a>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>

						<div class="row panel_<?php echo $methodid ?>_panel_purchase_request mb-10">
							<div class="col-xl-12">
								<?php

								?>
							</div>
						</div>

						<div class="row">
							<div class="col-xl-12">
								<?php

								?>
							</div>
						</div>
					</div>








					<div class="tab_custom_ecc tab-pane fade" id="content_<?php echo $methodid; ?>_audit" role="tabpanel" aria-labelledby="tab_<?php echo $methodid; ?>_audit">
						<div class="row panel_<?php echo $methodid ?>_panel_keluarga">
							<div class="col-xl-12">






								<h3> List History hehehe</h3>
								<div class="row" style="margin-top:8px;">
									<div class="col-xl-12">

										<?php

										?>

										<?php

										$extra_param = array('methodid' => $methodid, 'extra_param' => array(0 => array('field' => 'spec_history_header_id', 'form_id' => 'form_' . $methodid . '_detail_style_spec_header_id')));
										$this->ecc_library->jqgrid($methodid . "_detail_history", $dashboard_table['field_detail_history'], $dashboard_table['field_history_loaddata'], $extra_param);
										?>
									</div>

								</div>










							</div>
						</div>

						<div class="row panel_<?php echo $methodid ?>_panel_purchase_request mb-10">
							<div class="col-xl-12">
								<?php

								?>
							</div>
						</div>

						<div class="row">
							<div class="col-xl-12">
								<?php

								?>
							</div>
						</div>
					</div>




















					<div class="tab_custom_ecc tab-pane fade" id="content_<?php echo $methodid; ?>_picture" role="tabpanel" aria-labelledby="tab_<?php echo $methodid; ?>_dokumen">
						<div class="row panel_<?php echo $methodid ?>_panel_dokumen">
							<div class="col-xl-12">
								<form class="ui grid ecc_form" id="form_<?php echo $methodid ?>_dokumen" action="javascript:add_<?php echo $methodid ?>_dokumen()">
									<div class="row">
										<div class="col-xl-9">
											<div class="row">
												<div class="col-xl-5">
													<?php
													$this->ecc_library->form('hidden', '', "form_" . $methodid . "_karyawan_dokumen", $this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
													$this->ecc_library->form('hidden', '', "form_" . $methodid . "_dokumen", 'karyawan_id', '', '', '');
													$this->ecc_library->form('hidden', '', "form_" . $methodid, 'dokumen_id', '', '', '');
													$this->ecc_library->form('hidden', '', "form_" . $methodid, 'alamat_dok', '', '', '');
													$this->ecc_library->form('select_pop', 'Nama Dokumen', "form_" . $methodid, 'nama_dokumen', '', '', 'plh_dokumen');
													?>
												</div>

												<div class="col-xl-6">
													<?php
													$this->ecc_library->form('file', 'Cari Dokumen', "form_" . $methodid, 'lokasi_dokumen', '', '', '');
													?>
												</div>


												<div class="col-xl-3">
													<?php
													$this->ecc_library->form('text', 'Keterangan', "form_" . $methodid . "_dokumen", 'keterangan_dokumen', '', '', '');

													?>
												</div>

											</div>
										</div>

										<div class="col-xl-3">
											<label> &nbsp </label>
											<div class="input-group">
												<div class="button_<?php echo $methodid ?>_dokumen_new" style="display:none">
													<button type="submit" class="btn btn-success">
														<i class="fa fa-plus"></i> ADD
													</button>
												</div>

												<div class="button_<?php echo $methodid ?>_dokumen_edit" style="display:none">
													<button type="submit" class="btn btn-success">
														<i class="fa fa-check"></i> SAVE
													</button>

													<a class="btn btn-danger" onclick="javascript:cancel_dokumen_<?php echo $methodid ?>()">
														<i class="fa fa-times"></i> CANCEL
													</a>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>


						<div class="row">
							<div class="col-xl-12">
								<?php

								?>
							</div>
						</div>
					</div>
				</div>

				<div class="modal fade" id="gbr_dokumen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog modal-xl" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title" id="myModalLabel">Preview Image</h4>
							</div>
							<div class="modal-body">

								<img src="./assets/img/profile/ekonomi Bulolo/dokumen/072917_Dokumen Lain_20220221-020355.jpg" class="img-fluid">

							</div>
						</div>
					</div>
				</div>



			</div>
		</div>
	</div>
</div>
</div>

<div class="modal fade" id="view_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog " role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Formula</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="ui grid ecc_form" id="form_<?php echo $methodid ?>_modal_formula" action="javascript:addx_<?php echo $methodid ?>_absen()">
					<?php
					$this->ecc_library->form('hidden', '', "form_" . $methodid . "_formula", 'detail_Spec_id', '', '', '');
					$this->ecc_library->form('hidden', '', "form_" . $methodid . "_formula", 'nama_formula', '', '', '');
					$this->ecc_library->form('hidden', '', "form_" . $methodid . "_formula", 'size', '', '', '');
					$this->ecc_library->form('hidden', '', "form_" . $methodid . "_formula", 'uraian', '', '', '');
					$this->ecc_library->form('hidden', '', "form_" . $methodid . "_formula", 'info', '', '', '');
					$this->ecc_library->form('hidden', '', "form_" . $methodid . "_formula", 'nilai_awal', '', '', '');
					$this->ecc_library->form('hidden', '', "form_" . $methodid . "_formula", 'nilai_info', '', '', '');
					?>
					<div class="form-group row">
						<div class="col-sm-4">
							<label for="absen_id" class="control-label">Formula</label>
						</div>
						<div class="col-sm-6">
							<input type="text" id="form_<?php echo $methodid ?>_formula" name="formula" class="form-control">
						</div>
					</div>
				</form>


			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" data-dismiss="modal" onclick="save_<?php echo $methodid ?>_spec_formula()">Save</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<script>
	function add_new_item() {
		var formData = new FormData(document.getElementById('form_new_item'));

		$.ajax({
			url: 'Style_specification/add_item',
			type: 'POST',
			data: formData,
			contentType: false,
			processData: false,
			success: function(response) {

				console.log(response);
				$('#newModal').modal('hide');
			},
			error: function(xhr, status, error) {

				console.error(error);
			}
		});
	}

	function handleDropdownSelection() {
		let selectedDetailId = $('#style_spec_detail').val();
		let styleSpecDetailMeasure = $('#item_name').val(); // Get the value from style_spec_detail_measure
		let userId = <?php echo $this->session->userdata('user_id'); ?>;

		$.ajax({
			url: '<?php echo site_url('Style_specification/store_detail'); ?>', // Ganti dengan URL controller Anda
			type: 'POST',
			data: {
				style_spec_detail_id: selectedDetailId,
				style_spec_detail_measure: styleSpecDetailMeasure,
				user_id: userId,
				<?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>' // Token CSRF
			},
			success: function(response) {
				let result = JSON.parse(response);

				if (result.valid) {
					// Tampilkan pesan konfirmasi
					alert(result.message);
				} else {
					// Tampilkan pesan error
					alert(result.message);
				}
			},
			error: function() {
				alert('Terjadi kesalahan dalam menyimpan data.');
			}
		});
	}

	// Panggil fungsi handleDropdownSelection saat dropdown berubah
	$('#style_spec_detail').change(handleDropdownSelection);
</script>