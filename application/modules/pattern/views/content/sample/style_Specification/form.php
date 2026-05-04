<div class="row">
	<div class="col-xl-12">
		<div class="card card-statistics h-100">
			<div class="card-body" style="padding: 1.25rem !important">
				<h5 class="card-title form_title_<?php echo $methodid ?>"><?php echo $page_title ?></h5>
				<?php
				//print_r($methodid);
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
										$this->ecc_library->form('hidden', '', "form_" . $methodid, 'style_spec_header_id', '');
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
															// $this->ecc_library->form('text','ket',"form_".$methodid."_detail",'keterangan_spec','');
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
															<i class="fa fa-plus"></i> Add
														</button>

													</div>
												</div>
												<div class="text-left" style="margin-top: 10px;">
													<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newModal">
														<i class="fa fa-plus"></i> Add Point Of Measure
													</button>
												</div>
											</div>

										</div>



										<?php
										//  echo $this->mainconfig->decimalToFraction(11.25) ;
										//  echo "test";
										//
										// print_r($_POST);
										?>

										<div class="row" style="margin-top:8px;">
											<div class="col-xl-12 grid_container_<?php echo $methodid ?>_detail_spec">
												<table id="table_<?php echo $methodid ?>_detail_spec" max-width="5000"></table>
												<div id="ptable_<?php echo $methodid ?>_detail_spec"></div>

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
								<form class="ui grid ecc_form" id="form_detail_<?php echo $methodid ?>_trims" action="javascript:post_edit_<?php echo $methodid ?>_trims()">
									<div class="row">
										<div class="col-xl-4">
											<div class="row">
												<div class="col-xl-12">
													<?php
													$this->ecc_library->form('hidden', '', "form_detail_" . $methodid . "_trims", $this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
													$this->ecc_library->form('hidden', '', "form_detail_" . $methodid . "_trims", 'style_spec_header_id', '', '', '');
													$this->ecc_library->form('hidden', '', "form_detail_" . $methodid . "_trims", 'style_spec_trims_id', '', '', '');
													$this->ecc_library->form('text', 'Trims', "form_detail_" . $methodid . "_trims", 'style_spec_trims_description', '', '', '');
													$this->ecc_library->form('hidden', '', "form_detail_" . $methodid . "_trims", 'style_spec_trims_note', '', '', '');
													?>
												</div>
											</div>
										</div>
								</form>
								<div class="col-xl-3">
									<label> &nbsp </label>
									<div class="input-group simpan_trims">

										<div class="button_<?php echo $methodid ?>_trims_save" onclick="javascript:save_<?php echo $methodid ?>_trims()">
											<button type="submit" class="btn btn-success">
												<i class="fa fa-check"></i> SAVE
											</button>
										</div>
									</div>
									<div class="input-group update_trims" style="display: none;">

										<div class="button_<?php echo $methodid ?>_trims_save" onclick="javascript:save_<?php echo $methodid ?>_trims()">
											<button type="submit" class="btn btn-warning">
												<i class="fa fa-check"></i> UPDATE
											</button>
										</div>

									</div>
									<div class="input-group cancel_trims" style="display: none;">

										<div class="button_cancel_<?php echo $methodid ?>" onclick="javascript:cancel_trims_<?php echo $methodid ?>_trims()">
											<button type="button" class="btn btn-danger">
												<i class="fa fa-check"></i> CANCEL
											</button>
										</div>

									</div>
								</div>
							</div>
							<div class="row" style="margin-top:8px;">
								<div class="col-xl-12">
									<?php
									$extra_param = array('methodid' => $methodid, 'extra_param' => array(0 => array('field' => 'style_spec_header_id', 'form_id' => 'form_detail_' . $methodid . '_trims_style_spec_header_id')));
									$this->ecc_library->jqgrid($methodid . "_detail_trims", $dashboard_table['field_detail_trims'], $dashboard_table['field_trims_loaddata'], $extra_param);
									?>
								</div>

							</div>


						</div>
					</div>
				</div>







				<div class="tab_custom_ecc tab-pane fade" id="content_<?php echo $methodid; ?>_audit" role="tabpanel" aria-labelledby="tab_<?php echo $methodid; ?>_audit">
					<div class="row panel_<?php echo $methodid ?>_audit">
						<div class="col-xl-12">






							<h3> List History</h3>
							<div class="row" style="margin-top:8px;">
								<div class="col-xl-12">

									<?php
									//		$extra_param = array('methodid'=> $methodid,'onclick'=> 'click_transfer_'.$methodid,'extra_param' => array(0 => array('field' => 'work_order_request_id','form_id' => 'form_'. $methodid .'_supply_work_order_request_id')));
									//		$this->ecc_library->jqgrid($methodid."_supply", $dashboard_table['field_detail_supply'], $dashboard_table['field_detail_supply_loaddata'],$extra_param); 
									?>

									<?php
									//	print_r($dashboard_table);
									//  $extra_param = array('methodid'=> $methodid,'extra_param' => array(0 => array('field' => 'style_spec_header_id','form_id' => 'form_'. $methodid .'_detail_history_id')));
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




















				<div class="tab_custom_ecc tab-pane fade" id="content_<?php echo $methodid; ?>_picture" role="tabpanel" aria-labelledby="tab_<?php echo $methodid; ?>_picture">
					<div class="row panel_<?php echo $methodid ?>_panel_dokumen">
						<div class="col-xl-12">
							<form class="ui grid ecc_form" id="form_picture_<?php echo $methodid ?>_picture" action="javascript:post_<?php echo $methodid ?>_picture()">
								<div class="row">
									<div class="col-xl-9">
										<div class="row">
											<div class="col-xl-5">
												<?php

												$this->ecc_library->form('hidden', '', "form_picture_" . $methodid . "_picture", $this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
												$this->ecc_library->form('hidden', '', "form_picture_" . $methodid . "_picture", 'style_spec_header_id', '', '', '');
												$this->ecc_library->form('hidden', '', "form_picture_" . $methodid . "_picture", 'id_image_pattern', '', '', '');
												$this->ecc_library->form('file_photo', 'Cari Picture', "form_picture_" . $methodid, 'name_image_pattern', '', '', '');

												?>
											</div>

											<div class="col-xl-6">
												<?php
												$this->ecc_library->form('text', 'Description', "form_picture_" . $methodid . "_picture", 'image_description', '', '', '');
												?>
											</div>




										</div>
									</div>

									<div class="col-xl-3">
										<label> &nbsp </label>
										<div class="input-group">


										</div>
									</div>
								</div>
							</form>
							<div class="col-xl-3">
								<label> &nbsp </label>
								<div class="input-group simpan_picture">

									<div class="button_<?php echo $methodid ?>_picture_save" onclick="javascript:save_<?php echo $methodid ?>_picture()">
										<button type="submit" class="btn btn-success">
											<i class="fa fa-check"></i> SAVE
										</button>
									</div>
								</div>
								<div class="input-group update_picture" style="display: none;">

									<div class="button_<?php echo $methodid ?>_picture_save" onclick="javascript:save_<?php echo $methodid ?>_picture()">
										<button type="submit" class="btn btn-warning">
											<i class="fa fa-check"></i> UPDATE
										</button>
									</div>

								</div>
								<div class="input-group cancel_picture" style="display: none;">

									<div class="button_cancel_<?php echo $methodid ?>" onclick="javascript:cancel_picture_<?php echo $methodid ?>_picture()">
										<button type="button" class="btn btn-danger">
											<i class="fa fa-check"></i> CANCEL
										</button>
									</div>

								</div>
							</div>
						</div>
					</div>

					<div class="row" style="margin-top:8px;">
						<div class="col-xl-12">
							<?php
							$extra_param = array('methodid' => $methodid, 'extra_param' => array(0 => array('field' => 'style_spec_header_id', 'form_id' => 'form_detail_' . $methodid . '_picture_style_spec_header_id')));
							$this->ecc_library->jqgrid($methodid . "_detail_picture", $dashboard_table['field_picture'], $dashboard_table['field_picture_loaddata'], $extra_param);
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






<div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newModalLabel">Add New Point Of Measure</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="ui grid ecc_form" id="form_<?php echo $methodid ?>_post_add" action="javascript:post_add_<?php echo $methodid ?>_post_add()" enctype="multipart/form-data" method="post">
					<?php
					$this->ecc_library->form('hidden', '', "form_" . $methodid, $this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
					$this->ecc_library->form('hidden', '', "form_" . $methodid, 'style_spec_detail_id', '');

					?>
					<div class="form-group">



						<!-- 
						<?php
						$this->ecc_library->form('select_pop', 'Point Of Measure', "form_" . $methodid, 'style_spec_detail_measure', '', '', 'style_spec_detail');
						?> -->






						<label for="">Jika pilihan tidak ada, maka klik tombol dibawah!</label>
						<button type="button" id="add-new-measure" class="btn btn-secondary">Click Here!</button>
					</div>
					<div class="form-group" id="new-measure-group" style="display:none;">




						<table>

							<tbody>
								<tr>
									<td> <input type="text" class="form-control" id="style_spec_detail_measure" name="style_spec_detail_measure" required placeholder="New Point Of Measure" style="border: 10px;"></td>
									<td><button type="button" id="remove-measure" class="btn btn-danger btn-sm fa fa-trash" style="margin-left: 10px;"></button></td>
								</tr>
							</tbody>
						</table>



					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" onclick="save_<?php echo $methodid ?>_post_add()">
					<i class="fa fa-save"></i> Save Header
				</button>

				<button type="button" class="btn btn-info" onclick="cancel_<?php echo $methodid ?>_post_add()">
					<i class="fa fa-arrow-left"></i> Back
				</button>
			</div>
		</div>
	</div>
</div>



<script>
	document.getElementById('add-new-measure').addEventListener('click', function() {
		// Tampilkan inputan baru
		document.getElementById('new-measure-group').style.display = 'block';
	});

	document.getElementById('remove-measure').addEventListener('click', function() {
		// Sembunyikan inputan dan tombol remove
		document.getElementById('new-measure-group').style.display = 'none';
		// Reset value input jika diperlukan
		document.getElementById('style_spec_detail_measure').value = '';
	});
</script>