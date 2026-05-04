<div class="row">
	<div class="col-xl-12">
		<div class="card card-statistics h-100">
			<div class="card-body" style="padding: 1.25rem !important">
				<h5 class="card-title form_title_<?php echo $methodid ?>"><?php echo $page_title ?></h5>
				<?php
				//print_r($methodid);
				?>
						<div class="tab_custom_ecc tab-pane fade active show" id="content_<?php echo $methodid; ?>_header" role="tabpanel" aria-labelledby="tab_<?php echo $methodid; ?>_header">
							<div class="row">
								<div class="col-xl-12 mb-10 ml-10">
									<form class="ui grid ecc_form" id="form_<?php echo $methodid ?>" action="javascript:post_<?php echo $methodid ?>()" enctype="multipart/form-data" method="post">
										<?php
										$this->ecc_library->form('hidden', '', "form_" . $methodid, $this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
										$this->ecc_library->form('text', '', "form_" . $methodid, 'style_spec_header_id', '');
										//$this->ecc_library->form('hidden','',"form_".$methodid,'badgenumber','');
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
														//$this->ecc_library->form('select_pop','Style sub',"form_".$methodid,'status_id','','','sub_style');
														//$this->ecc_library->form('file_photo','Browse Photo',"form_".$methodid,'link_photo','','','');
														//$this->ecc_library->form('text','nmficture',"form_".$methodid,'nmficture','','','');
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
																//$this->ecc_library->form('select','Currencies',"form_".$methodid,'currencies_id','','','currencies');	
																$this->ecc_library->form('text', 'Pattern', "form_" . $methodid, 'style_spec_pattern', '', '', '');
																//$this->ecc_library->form('select_pop','Pattern',"form_".$methodid,'divisi_id','','','plh_divisi');
																$this->ecc_library->form('text', 'Alown susut', "form_" . $methodid, 'susut', '', '', '');
																//$this->ecc_library->form('date','Tanggal Keluar',"form_".$methodid,'date_out','','','');
																//echo base_url();

																?>

															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="col-xl-3">
												<?php
												//$this->ecc_library->form('select','Order Type',"form_".$methodid,'purchase_order_type_id','','','purchase_order_type_purchase');
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
					$this->ecc_library->form('text', '', "form_" . $methodid . "_formula", 'detail_Spec_id', '', '', '');
					$this->ecc_library->form('text', '', "form_" . $methodid . "_formula", 'nama_formula', '', '', '');
					$this->ecc_library->form('hidden', '', "form_" . $methodid . "_formula", 'size', '', '', '');
					$this->ecc_library->form('hidden', '', "form_" . $methodid . "_formula", 'uraian', '', '', '');
					$this->ecc_library->form('text', '', "form_" . $methodid . "_formula", 'info', '', '', '');
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