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

									<div id="panel_content_<?php echo $methodid ?>">
										<div class="row">

											<div class="col-md-12">

												<div class="col-12 col-md-12">
													<div class="form_<?php echo $methodid ?>_button_location">
														<div class="form-group d-flex flex-wrap gap-2">
															<button type="button" class="btn btn-outline-success" onclick="javascript:add_<?php echo $methodid ?>();">
																<i class="fa fa-plus"></i> Add
															</button>


															<button type="button" class="btn btn-outline-warning ml-3" onclick="javascript:handleEdit_<?php echo $methodid ?>();">
																<i class="fa fa-edit"></i> Edit
															</button>

															<button type="button" class="btn btn-outline-danger ml-3" onclick="javascript:delete_<?php echo $methodid ?>();">
																<i class="fa fa-trash"></i> Delete
															</button>
														</div>
													</div>
												</div>
												<?php
												$extra_param = array(
													'methodid' => $methodid,
													// 'onclick' => 'click_location_' . $methodid,
													'extra_param' => array(
														0 => array(
															// Kita simpan row_id (work_order_return_detail_id) ke input hidden ini
															'field' => 'location_id',
															'form_id' => 'form_location_' . $methodid . '_location_id'
														)
													)
												);

												$this->ecc_library->jqgrid2(
													$methodid . "",
													$dashboard_table['field'],
													$dashboard_table['field_loaddata'],
													$extra_param
												);
												?>
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