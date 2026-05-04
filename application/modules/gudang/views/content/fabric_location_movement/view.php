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
														<input type="text"
															class="form-control fabric_shipment_list_code"
															id="form_<?php echo $methodid ?>_fabric_shipment_list_code"
															name="fabric_shipment_list_code"
															autocomplete="off"
															autofocus />
														<div class="input-group-append">
															<button type="button" class="btn btn-danger" onclick="reset_<?php echo $methodid ?>()">
																<i class="fa fa-refresh"></i> Reset </button>

														</div>
													</div>

												</div>

											</div>
										</div>
									</div>
									<div id="panel_content_<?php echo $methodid ?>">
										<?php $this->load->view($path_template . '/library/content/dashboard_table2'); ?>
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

	<div id="panel_print_<?php echo $methodid ?>" style="display:none"></div>

	<form id="form_<?php echo $methodid ?>_print" action="<?php echo base_url() . $class_uri ?>/loaddata" method="POST" target="panel_print_<?php echo $methodid ?>" style="display:none">
		<input type="hidden" id="form_<?php echo $methodid ?>_print_csrf" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>" />
		<input type="hidden" id="form_<?php echo $methodid ?>_print_format" name="format" value="" />
		<input type="hidden" id="form_<?php echo $methodid ?>_print_print" name="print" value="1" />
	</form>
</div>