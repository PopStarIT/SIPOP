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