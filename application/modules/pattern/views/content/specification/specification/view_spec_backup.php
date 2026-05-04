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
										<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
											<div class="card-body">
												<form class="ui grid ecc_form" id="form_<?php echo $methodid ?>_group_spec">

													<div class="form-group row">
														<div class="col-xl-6">

															<div class="form-group row" id="form_new_category">
																<div class="col-sm-2">
																	<label for="absen_id" class="control-label" style="text-align:right;">Tambah Category</label>
																</div>
																<div class="col-sm-8">
																	<input type="text" id="form_<?php echo $methodid ?>_new_style" name="new_style" placeholder="Tambah Category" class="form-control">

																</div>
																<div class="col-sm-2">
																	<button type="button" class="btn btn-success" onclick="javascript:simpan_<?php echo $methodid ?>_group_category();">
																		<i class="fa fa-save"></i> Save
																	</button>
																</div>
															</div>
														</div>

												</form>

											</div>
										</div>
									</div>

									<div id="panel_content_<?php echo $methodid ?>">
										<?php $this->load->view($path_template . '/library/content/dashboard_table2'); ?>
									</div>


									<div class="row mb-10 ml-10">
										<div id="panel_content_form_<?php echo $methodid ?>" style="display:none">
											<?php
											if (isset($view_load_form)) {
												$this->load->view('content/' . $view_load_form);
											}
											?>
										</div>
									</div>
									<br>
									<br>

									<!-- <div id="panel_content_form_<?php echo $methodid ?>" style="display:none">
										<?php
										if (isset($view_load_form)) {
											$this->load->view('content/' . $view_load_form);
										}
										?>
									</div> -->
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

<div class="modal fade" id="m_new_category" tabindex="-1" role="dialog" aria-labelledby="dailyModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="dailyModalLabel">Add Detail Category</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>


		</div>
	</div>
</div>
<script type="text/javascript">
	$('#form_<?php echo $methodid ?>_item_group').on('change', function() {
		const style = $("#form_<?php echo $methodid ?>_item_group").val();
		//	alert('value '+ style); 
		$("#form_new_category").hide();
		$("#form_goup_button").show();

		//$("p").html("nilai yang di pilih adalah " + style); 
		if (style == -99) {
			//	alert('value '+ style); 
			$("#form_new_category").show()
			$("#form_goup_button").hide();
		}
	});
</script>