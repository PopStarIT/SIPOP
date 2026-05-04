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
															<?php
															$this->ecc_library->form2('select_pop_line', 'Specification Category :', "form_" . $methodid, 'item_group', '', '', 'get_list_spec_group', '6');
															// $this->ecc_library->form2('select_pop_line','Specification Category :',"form_".$methodid,'item_group','','','model_spec','6');
															//$this->ecc_library->form2('select_pop_line','Style',"form_".$methodid,'list_style','','','get_list_style','6');
															?>
														</div>
														<div class="form-group row" id="form_new_category">
															<div class="col-sm-2">
																<label for="absen_id" class="control-label" style="text-align:right;">Category</label>
															</div>
															<div class="col-sm-8">
																<input type="text" id="form_<?php echo $methodid ?>_new_style" name="new_style" class="form-control">
															</div>
															<div class="col-sm-2">
																<button type="button" class="btn btn-success" onclick="javascript:simpan_<?php echo $methodid ?>_group_category();">
																	<i class="fa fa-save"></i> Save
																</button>
															</div>
														</div>
													</div>

												</form>
												<div id="form_goup_button">
													<button type="button" class="btn btn-success" onclick="javascript:add_<?php echo $methodid ?>_spec_category_detail();">
														<i class="fa fa-plus"></i> Add
													</button>
													<button type="button" class="btn btn-info" onclick="javascript:edit_<?php echo $methodid ?>_spec_category();">
														<i class="fa fa-pencil"></i> Edit
													</button>
													<button type="button" class="btn btn-danger" onclick="javascript:delete_<?php echo $methodid ?>_spec_category;">
														<i class="fa fa-trash-o"></i> Delete
													</button>

													<!-- <div id="panel_content_<?php //echo $methodid 
																				?>">
										<?php //$this->load->view($path_template.'/library/content/dashboard_table2'); 
										?>
									    </div> -->
												</div>
											</div>
										</div>
									</div>





									<div class="row mb-10 ml-10">
										<div class="col-xl-12">
											<?php
											$extra_field = array();

											$extra_field[] = array('field' => 'template_detail_model_id', 'form_id' => 'form_' . $methodid . '_item_group');
											$extra_param = array('methodid' => $methodid, 'extra_param' => $extra_field);
											$this->ecc_library->jqgrid($methodid . "_spec_category", $dashboard_table['field_spec_category'], $dashboard_table['field_spec_category_loaddata'], $extra_param);
											?>
										</div>
									</div>
									<br>
									<br>

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

<div class="modal fade" id="m_new_category" tabindex="-1" role="dialog" aria-labelledby="dailyModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="dailyModalLabel">Add Detail Category</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form class="ui grid ecc_form" id="form_<?php echo $methodid ?>_template_spec" action="javascript:new_template_<?php echo $methodid ?>()">
				<div class="modal-body">
					<?php
					$this->ecc_library->form('hidden', '', "form_" . $methodid, $this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
					?>
					<input type="hidden" id="form_<?php echo $methodid ?>_kode_category_spec" name="kode_category_spec" class="form-control">
					<input type="hidden" id="form_<?php echo $methodid ?>_template_detail_id" name="template_detail_id" class="form-control">
					<div class="col-xl-10">
						<div class="form-group row">
							<div class="col-sm-4">
								<label for="absen_id" class="control-label">Name Specification</label>
							</div>
							<div class="col-sm-6">
								<input type="text" id="form_<?php echo $methodid ?>_name_spec" name="name_spec" class="form-control">
							</div>
						</div>
					</div>

					<div class="col-xl-10">
						<div class="form-group row">
							<div class="col-sm-4">
								<label for="absen_id" class="control-label">Formula S</label>
							</div>
							<div class="col-sm-2">
								<input type="text" id="form_<?php echo $methodid ?>_formula_s" name="formula_s" class="form-control">
							</div>

							<div class="col-sm-4" style="text-align:right;">
								<label for="absen_id" class="control-label">Formula Pattern S</label>
							</div>
							<div class="col-sm-2">
								<input type="text" id="form_<?php echo $methodid ?>_formula_pattern_s" name="formula_pattern_s" class="form-control">
							</div>
						</div>
					</div>

					<div class="col-xl-10">
						<div class="form-group row">
							<div class="col-sm-4">
								<label for="absen_id" class="control-label">Formula XS</label>
							</div>
							<div class="col-sm-2">
								<input type="text" id="form_<?php echo $methodid ?>_formula_xs" name="formula_xs" class="form-control">
							</div>
							<div class="col-sm-4" style="text-align:right;">
								<label for="absen_id" class="control-label">Formula Pattern XS</label>
							</div>
							<div class="col-sm-2">
								<input type="text" id="form_<?php echo $methodid ?>_formula_pattern_xs" name="formula_pattern_xs" class="form-control">
							</div>
						</div>
					</div>

					<div class="col-xl-10">
						<div class="form-group row">
							<div class="col-sm-4">
								<label for="absen_id" class="control-label">Formula M</label>
							</div>
							<div class="col-sm-2">
								<input type="text" id="form_<?php echo $methodid ?>_formula_m" name="formula_m" class="form-control">
							</div>
							<div class="col-sm-4" style="text-align:right;">
								<label for="absen_id" class="control-label">Formula Pattern M</label>
							</div>
							<div class="col-sm-2">
								<input type="text" id="form_<?php echo $methodid ?>_formula_pattern_m" name="formula_pattern_m" class="form-control">
							</div>
						</div>
					</div>

					<div class="col-xl-10">
						<div class="form-group row">
							<div class="col-sm-4">
								<label for="absen_id" class="control-label">Formula L</label>
							</div>
							<div class="col-sm-2">
								<input type="text" id="form_<?php echo $methodid ?>_formula_l" name="formula_l" class="form-control">
							</div>
							<div class="col-sm-4" style="text-align:right;">
								<label for="absen_id" class="control-label">Formula Pattern L</label>
							</div>
							<div class="col-sm-2">
								<input type="text" id="form_<?php echo $methodid ?>_formula_pattern_l" name="formula_pattern_l" class="form-control">
							</div>
						</div>
					</div>

					<div class="col-xl-10">
						<div class="form-group row">
							<div class="col-sm-4">
								<label for="absen_id" class="control-label">Formula XL</label>
							</div>
							<div class="col-sm-2">
								<input type="text" id="form_<?php echo $methodid ?>_formula_xl" name="formula_xl" class="form-control">
							</div>
							<div class="col-sm-4" style="text-align:right;">
								<label for="absen_id" class="control-label">Formula Pattern XL</label>
							</div>
							<div class="col-sm-2">
								<input type="text" id="form_<?php echo $methodid ?>_formula_pattern_xl" name="formula_pattern_xl" class="form-control">
							</div>
						</div>
					</div>

					<div class="col-xl-10">
						<div class="form-group row">
							<div class="col-sm-4">
								<label for="absen_id" class="control-label">Formula XXL</label>
							</div>
							<div class="col-sm-2">
								<input type="text" id="form_<?php echo $methodid ?>_formula_xxl" name="formula_xxl" class="form-control">
							</div>
							<div class="col-sm-4" style="text-align:right;">
								<label for="absen_id" class="control-label">Formula Pattern XXL</label>
							</div>
							<div class="col-sm-2">
								<input type="text" id="form_<?php echo $methodid ?>_formula_pattern_xxl" name="formula_pattern_xxl" class="form-control">
							</div>
						</div>
					</div>

					<div class="col-xl-10">
						<div class="form-group row">
							<div class="col-sm-12">
								<button type="button" class="btn btn-success" onclick="javascript:post_<?php echo $methodid ?>_edit();">
									<i class="fa fa-save"></i> Add
								</button>
								<button type="button" class="btn btn-danger" onclick="javascript:cancel_modal<?php echo $methodid ?>_spec_category();">
									<i class="fa fa-pencil"></i> Cancel
								</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<label for="absen_id" class="control-label"><i>* Gunakan tanda titik untuk bilangan desimal</i></label>
							</div>
						</div>
					</div>

				</div>
			</form


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