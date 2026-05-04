<div class="row">
	<div class="col-xl-12">
		<div class="card card-statistics h-100">
			<div class="card-body" style="padding: 1.25rem !important;">
				<h5 class="card-title form_title_<?php echo $methodid ?>"><?php echo $page_title ?></h5>

				<ul class="nav nav-tabs form_tab_<?php echo $methodid ?>" id=" myTab" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" id="header-tab" data-toggle="tab" href="#header" role="tab" aria-controls="header" aria-selected="true">Header</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="detail-tab" data-toggle="tab" href="#detail" role="tab" aria-controls="detail" aria-selected="false">Detail</a>
					</li>
				</ul>
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="header" role="tabpanel" aria-labelledby="header-tab">
						<div class="col-xl-12 mb-10 ml-10">
							<form class="ui grid ecc_form" id="form_<?php echo $methodid ?>" action="javascript:post_<?php echo $methodid ?>()" enctype="multipart/form-data" method="post">
								<?php
								$this->ecc_library->form('hidden', '', "form_" . $methodid, $this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
								$this->ecc_library->form('hidden', '', "form_" . $methodid, 'spec_category_id', '');
								//$this->ecc_library->form('hidden','',"form_".$methodid,'badgenumber','');
								?>

								<div class="row">
									<div class="col-xl-4">
										<div class="row">
											<div class="col-xl-12">
												<?php
												$this->ecc_library->form('text', 'uraian', "form_" . $methodid, 'spec_category_uraian', '', '', '');
												$this->ecc_library->form('text', 'note', "form_" . $methodid, 'spec_category_note', '', '', '');
												?>
											</div>
										</div>
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
					<div class="tab-pane fade" id="detail" role="tabpanel" aria-labelledby="detail-tab">
						<div class="col-xl-12">
							<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
								<div class="card-body">

















									<div id="form_goup_button">
										<button type="button" class="btn btn-success" onclick="javascript:add_<?php echo $methodid ?>_spec_category_detail();">
											<i class="fa fa-plus"></i> Add
										</button>
										<button type="button" class="btn btn-info" onclick="javascript:edit_modal_<?php echo $methodid ?>_spec_category();">
											<i class="fa fa-pencil"></i> Edit
										</button>
										<button type="button" class="btn btn-danger" onclick="javascript:delete_<?php echo $methodid ?>_spec_category();">
											<i class="fa fa-trash-o"></i> Delete
										</button>


									</div>
								</div>
							</div>
						</div>





						<div class="row mb-10 ml-10">
							<div class="col-xl-12">
								<?php
								$extra_field = array();

								$extra_field[] = array('field' => 'template_detail_model_id', 'form_id' => 'form_' . $methodid . '_spec_category_id');
								$extra_param = array('methodid' => $methodid, 'extra_param' => $extra_field);
								$this->ecc_library->jqgrid($methodid . "_spec_category", $dashboard_table['field_spec_category'], $dashboard_table['field_spec_category_loaddata'], $extra_param);
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
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
								<button type="button" class="btn btn-success" onclick="javascript:post_modal_<?php echo $methodid ?>_edit();">
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
	<script>
		// Function to validate input and display error messages
		function validateInput(inputField, errorMessage) {
			const inputValue = inputField.val();
			const isValid = /^[0-9.,]+$/.test(inputValue); // Regular expression to allow numbers, periods, and commas only

			const errorSpan = inputField.next('span.error'); // Find the error span (if it exists)
			if (!isValid) {
				if (errorSpan.length === 0) {
					// Create a new error span if it doesn't exist
					inputField.after('<span class="error" style="color:red;">' + errorMessage + '</span>');
				} else {
					// If the span exists, show the error message
					errorSpan.text(errorMessage);
					errorSpan.show();
				}
			} else {
				// If the input is valid, hide the error span
				if (errorSpan.length > 0) {
					errorSpan.hide();
				}
			}
		}

		// Attach event listeners to each input field
		$('#m_new_category').on('shown.bs.modal', function() { // Use shown.bs.modal event to ensure that the modal is fully loaded
			$('input[name="formula_s"], input[name="formula_pattern_s"], input[name="formula_xs"], input[name="formula_pattern_xs"], input[name="formula_m"], input[name="formula_pattern_m"], input[name="formula_l"], input[name="formula_pattern_l"], input[name="formula_xl"], input[name="formula_pattern_xl"], input[name="formula_xxl"], input[name="formula_pattern_xxl"]').each(function() {
				$(this).on('input', function() {
					validateInput($(this), 'Hanya angka, titik, dan koma yang diizinkan');
				});
			});
		});
	</script>