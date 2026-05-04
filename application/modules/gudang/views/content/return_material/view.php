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
									<!--	<div class="card-header" id="headingOne">
										<h5 class="mb-0">
											<?php //echo $page_title 
											?>
										</h5>
									</div> -->
									
									<div id="panel_content_<?php echo $methodid ?>" style="width:50%">
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