<div class="container-fluid">
	<div class="row">
		<div class="col-xl-12">
			<div class="card card-statistics">
				<div class="card-body">
					<div class="row">
						<div class="col-xl-12">
							<div id="accordion">
								<div class="card">
									<!--	<div class="card-header" id="headingOne">
										<h5 class="mb-0">
											<?php //echo $page_title 
											?>
										</h5>
									</div> -->

									<div id="panel_content_<?php echo $methodid ?>">

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="return_barcode">Barcode Scan Return</label>
													<div class="input-group">
														<div class="input-group-prepend">
															<span class="input-group-text"><i class="fa fa-barcode"></i></span>
														</div>
														<input type="text"
															class="form-control return_barcode"
															id="form_return_<?php echo $methodid ?>_return_barcode"
															name="return_barcode"
															autocomplete="off"
															autofocus />
													</div>
												</div>


											</div>
											<div class="col-md-6">
												<div class="twelve wide column">
													<button type="button" class="btn btn-info mt-4" onclick="reset_<?php echo $methodid ?>()">
														<i class="fa fa-refresh"></i> Reset </button>
												</div>
											</div>

										</div>
										<div class="row">
											<div class="col-md-6">
												Data Return Material
												<?php
												$extra_param_return = array(
													'methodid' => $methodid,
													'onclick' => 'click_disposisi_' . $methodid,
													'extra_param' => array(
														0 => array(
															// Kita simpan row_id (work_order_return_detail_id) ke input hidden ini
															'field' => 'work_order_return_detail_id',
															'form_id' => 'form_disposisi_' . $methodid . '_work_order_return_detail_id'
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
											</div>

											<div class="col-md-6">
												Data Disposisi Material
												<?php
												$extra_param_disposisi = array(
													'methodid' => $methodid,
													'extra_param' => array(
														0 => array(
															// Jqgrid akan mengambil value dari form_id ini saat reload
															'field' => 'work_order_return_detail_id',
															'form_id' => 'form_disposisi_' . $methodid . '_work_order_return_detail_id'
														)
													)
												);

												$this->ecc_library->jqgrid2(
													$methodid . "_disposisi",
													$dashboard_table['field_disposisi'],
													$dashboard_table['field_disposisi_loaddata'],
													$extra_param_disposisi
												);
												?>
												<input type="hidden" id="form_disposisi_<?php echo $methodid ?>_work_order_return_detail_id" value="">
											</div>
										</div>


									</div>

									<div id="panel_content_form_<?php echo $methodid ?>" style="display:none">
										<?php
										if (isset($view_load_form)) {
											$this->load->view('content/' . $view_load_form);
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

</div>


<div class="modal fade" id="detailResult" tabindex="-1" role="dialog" aria-labelledby="detailResultLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="detailResultLabel">Disposisi Material</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="ui grid ecc_form" id="form_return_<?php echo $methodid ?>" action="javascript:post_<?php echo $methodid ?>()">
					<?php
					$this->ecc_library->form('hidden', '', "form_return_" . $methodid, $this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
					$this->ecc_library->form('hidden', 'Work Order Return Detail ID', "form_return_" . $methodid, 'disposition_id', '', '', '');
					$this->ecc_library->form('hidden', 'Work Order Return Detail ID', "form_return_" . $methodid, 'work_order_return_detail_id', '', '', '');

					?>
					<div class="row">
						<div class="col-md-6">
							<?php $this->ecc_library->form('readonly', 'Item Code', "form_return_" . $methodid, 'item_code', '', '', 'readonly');  ?>
						</div>
						<div class="col-md-6">
							<?php $this->ecc_library->form('readonly', 'Item Name', "form_return_" . $methodid, 'item_name', '', '', 'readonly');  ?>
						</div>

					</div>
					<div class="row">
						<div class="col-md-6">
							<?php $this->ecc_library->form('readonly', 'Return Request', "form_return_" . $methodid, 'return_request', '', '', '');  ?>
						</div>
						<div class="col-md-6">
							<?php $this->ecc_library->form('readonly', 'Uom Code', "form_return_" . $methodid, 'uom_code', '', '', 'readonly');  ?>
						</div>

					</div>
					<?php

					$this->ecc_library->form('text', 'No Disposisi', "form_return_" . $methodid, 'disposition_no', '', '', '');
					$this->ecc_library->form('number', 'Actual Quantity', "form_return_" . $methodid, 'actual_quantity', '', '', '');
					?>
					<div class="row">
						<div class="col-md-6">
							<?php
							echo '<div class="form-group">';
							echo '<label for="disposition_action' . $methodid . '">Aksi Disposisi</label>';
							echo '<select class="form-control" id="disposition_action' . $methodid . '" name="disposition_action">';
							echo '<option value="">-- Select Action --</option>';
							echo '<option value="REUSABLE">REUSABLE</option>';
							echo '<option value="REPAIR">REPAIR</option>';
							echo '<option value="SCRAP">SCRAP</option>';
							echo '<option value="QUARANTINE">QUARANTINE</option>';
							echo '</select>';
							echo '</div>';
							?>
						</div>
						<div class="col-md-6">
							<?php
							echo '<div class="form-group">';
							echo '<label for="quality_grade' . $methodid . '">Quality Grade</label>';
							echo '<select class="form-control" id="quality_grade' . $methodid . '" name="quality_grade">';
							echo '<option value="">-- Select Grade --</option>';
							echo '<option value="BAIK">BAIK</option>';
							echo '<option value="CUKUP BAIK">CUKUP BAIK</option>';
							echo '<option value="BS">BS</option>';

							echo '</select>';
							echo '</div>';
							?>
						</div>

					</div>


					<?php
					$this->ecc_library->form('text', 'Notes', "form_return_" . $methodid, 'notes_disposition', '', '', '');


					?>




				</form>
				<div class="ui grid form">
					<div class="row field">
						<div class="twelve wide column">
							<button type="button" class="btn btn-success" onclick="save_disposisi_<?php echo $methodid ?>()">
								<i class="fa fa-save"></i> Save
							</button>

							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						</div>


					</div>
				</div>
			</div>

		</div>
	</div>
</div>