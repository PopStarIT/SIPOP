
<style>

   /* Khusus Tablet & HP */
     @media (max-width: 991.98px) {
    /* Aktifkan scroll horizontal pada tabel */
    .ui-jqgrid .ui-jqgrid-bdiv {
        overflow-x: auto !important;
        -webkit-overflow-scrolling: touch;
    }

    /* Perbesar ukuran baris agar mudah di-tap jari */
    .ui-jqgrid tr.jqgrow td {
        height: 30px !important;
        font-size: 12px !important;
    }

    /* Percantik tampilan header tabel saat scroll */
    .ui-jqgrid .ui-jqgrid-hdiv {
        background-color: #f8f9fa;
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
	
	.fabric_list {
       max-width: 100% !important;
       width: 100% !important;
       overflow-x: hidden; /* Mencegah pecah layout saat transisi resize */
    }
	
	
	/* Memperjelas scrollbar untuk pengguna layar sentuh */
.ui-jqgrid .ui-jqgrid-bdiv::-webkit-scrollbar {
    height: 10px; /* Membuat scrollbar horizontal lebih tinggi */
}

.ui-jqgrid .ui-jqgrid-bdiv::-webkit-scrollbar-thumb {
    background: #ccc; 
    border-radius: 10px;
}

.ui-jqgrid .ui-jqgrid-bdiv::-webkit-scrollbar-track {
    background: #f1f1f1;
}
	
}
</style>

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
						<li class="nav-item">
							<a class="nav-link" id="tab_<?php echo $methodid; ?>_other_scan" data-toggle="tab" href="#content_<?php echo $methodid; ?>_other_scan" role="tab" aria-controls="content_<?php echo $methodid; ?>_other_scan" aria-selected="true">
								Other
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
										$this->ecc_library->form('hidden', '', "form_" . $methodid, 'fabric_warehouse_receive_id', '');
										$this->ecc_library->form('hidden', 'sd', "form_" . $methodid, 'fabric_warehouse_receive_type_id', '');

										//$this->ecc_library->form('hidden','',"form_".$methodid,'this_memo','');
										?>

										<div class="row">
											<div class="col-xl-4">
												<?php
												$this->ecc_library->form('text', 'Receive No', "form_" . $methodid, 'fabric_warehouse_receive_no', '', '', '');
												$this->ecc_library->form('date', 'Receive Date', "form_" . $methodid, 'fabric_warehouse_receive_date', '', '', '');
												$this->ecc_library->form('text', 'Delivery No', "form_" . $methodid, 'fabric_warehouse_receive_delivery_no', '', '', '');


												?>

											</div>


											<div class="col-xl-3">
												<?php
												$this->ecc_library->form('select', 'Supplier', "form_" . $methodid, 'partner_id', '', '', 'supplier');
                                                $this->ecc_library->form('select', 'From Doc', "form_" . $methodid, 'bc_in_header_id', '', '', 'get_grn_custom', array('extra_param' => array(0 => array('field' => 'partner_id'))));
												$this->ecc_library->form('date', 'Delivery Date', "form_" . $methodid, 'fabric_warehouse_receive_delivery_date', '', '', '');
												//  $this->ecc_library->form('select_pop','Lokasi',"form_".$methodid,'warehouse_id_old','','','warehouse_old');													
												?>


										
											</div>

											<div class="col-xl-3">
												<div class="select_<?php echo $methodid ?>_from_shipment" style="display:none">
													<?php
												$this->ecc_library->form2('select_pop','Shipment No:',"form_" . $methodid,'fabric_shipment_id','','','data_list_fabric_receive','6');

													// $this->ecc_library->form('select','Warehouse',"form_".$methodid,'warehouse_id','','','warehouse');
													?>
												</div>

												<?php
												$this->ecc_library->form('select', 'Warehouse', "form_" . $methodid, 'warehouse_id', '', '', 'warehouse');
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

									<!-- <form class="ui grid ecc_form" id="form_<?php echo $methodid ?>_detil_scan" action="javascript:addx_<?php echo $methodid ?>()" enctype="multipart/form-data" method="post"> -->
									<div class="row">
										<div class="col-xl-12">
											<div class="row">
												<div class="col-xl-4">
													<?php
													$this->ecc_library->form('hidden', '', "form_" . $methodid . "_detail_scan", $this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
													$this->ecc_library->form('hidden', 'shipment_id', "form_" . $methodid . "_detail_scan", 'fabric_shipment_id', '', '', '');
													$this->ecc_library->form('hidden', 'fabric_shipment_list_id', "form_" . $methodid . "_detail_scan", 'fabric_shipment_list_id', '', '', '');
													$this->ecc_library->form('hidden', 'receive', "form_" . $methodid . "_detail_scan", 'fabric_warehouse_receive_id', '', '', '');
													$this->ecc_library->form('hidden', 'receive_detail', "form_" . $methodid . "_detail_scan", 'fabric_warehouse_receive_detail_id', '', '', '');
													$this->ecc_library->form('hidden', '', "form_" . $methodid . "_detail_scan", 'fabric_shipment_list_lot', '', '', '');
													$this->ecc_library->form('hidden', '', "form_" . $methodid . "_detail_scan", 'bc_in_header_id', '', '', '');
													$this->ecc_library->form('hidden', '', "form_" . $methodid . "_detail_scan", 'bc_in_barang_id', '', '', '');
													$this->ecc_library->form('hidden', '', "form_" . $methodid . "_detail_scan", 'warehouse_id', '', '', '');
													$this->ecc_library->form('hidden', '', "form_" . $methodid . "_detail_scan", 'purchase_performa_id', '', '', '');
													$this->ecc_library->form('hidden', 'partner', "form_" . $methodid . "_detail_scan", 'partner_id', '', '', '');
													// $this->ecc_library->form2('select_pop','Purchase Order No:',"form_".$methodid."_detil_scan",'purchase_order_warehouse_id','','','data_list_po_warehouse','6');
													?>
													<div class="form-group">
														<label for="fabric_barcode">Barcode Scan (Min 10 digit)</label>
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="fa fa-barcode"></i></span>
															</div>
															
	<input type="text" class="form-control fabric_barcode" id="form_<?php echo $methodid ?>_detail_scan_fabric_barcode" name="fabric_barcode" autocomplete='off'  autofocus/>
	&nbsp;
	 <button type="button" class="btn btn-info" onclick="javascript:scan_mobile_<?php echo $methodid ?>()">
		<i class="fa fa-mobile"></i> Mobile
	</button>
														</div>
													</div>
												</div>
												<div class="col-xl-3">
													<?php
													$this->ecc_library->form2('readonly', 'Total Lot', "form_" . $methodid . "_detail_scan", 'total_lot', '', '', '');
													
													?>
												</div>
												<div class="col-xl-3">
													<?php
													$this->ecc_library->form2('readonly', 'Total Roll', "form_" . $methodid . "_detail_scan", 'total_roll', '', '', '');
													
													?>
												</div>

											</div>
										</div>
									<!--	<div class="col-xl-12">
											<div class="row">
												<div class="col-xl-3">
													<label id="label_message"></label> <br>
												</div>
											</div>
										</div> -->



									</div>

									
                                   
									<!-- <div class="row panel_<?php //echo $methodid ?>_panel_fabric_shipment mb-10"> -->
									<div class="row panel_<?php echo $methodid ?>_panel_fabric_shipment mb-10 ">
									  <div  id="col_kedua_<?php echo $methodid ?>" class="col-12 col-lg-12 d-none d-lg-block">
										<div class="col-xl-10 fabric_list_<?php echo $methodid ?>">
											<?php
											$extra_param = array('methodid' => $methodid, 'extra_param' => array(0 => array('field' => 'fabric_shipment_id', 'form_id' => 'form_' . $methodid . '_detail_scan_fabric_shipment_id'), 1 => array('field' => 'bc_in_header_id', 'form_id' => 'form_' . $methodid . '_detail_scan_bc_in_header_id')));
											
											$this->ecc_library->jqgrid($methodid . "_fabric_list", $dashboard_table['field_fabric_list_recive'], $dashboard_table['field_loaddata_list_recive'], $extra_param);
											?>
										</div>
									  </div>
									</div>

								
									<div class="row panel_<?php echo $methodid ?>_panel_receive_detail mb-10">
									   <div  id="col_utama_<?php echo $methodid ?>" class="col-lg-12">
										<div class="col-xl-10 receive_scan_<?php echo $methodid ?>">
											<?php
											$extra_field = array();
											$extra_param = array('methodid' => $methodid, 'extra_param' => array(0 => array('field' => 'fabric_warehouse_receive_id', 'form_id' => 'form_' . $methodid . '_detail_scan_fabric_warehouse_receive_id')));
											$this->ecc_library->jqgrid($methodid . "_receive_scan", $dashboard_table['field_receive_scan'], $dashboard_table['field_loaddata_scan'], $extra_param);
											?>
										</div>
									  </div>
									</div>


								</div>
							</div>
							<br />

							<!--	</form> -->
                            <!-- 
							 <div class="ui grid form">
								<div class="row field">
									<div class="twelve wide column">
										<button type="button" class="btn btn-info" onclick="cancel_<?php //echo $methodid ?>()">
											<i class="fa fa-arrow-left"></i> Back
										</button>
									</div>
								</div>
							</div>
                           -->

						</div>



						<div class="tab_custom_ecc tab-pane fade" id="content_<?php echo $methodid; ?>_other_scan" role="tabpanel" aria-labelledby="tab_<?php echo $methodid; ?>_other_scan">
							<div class="row panel_<?php echo $methodid ?>_panel_other_scan">
								<div class="col-xl-12">

									<!-- <form class="ui grid ecc_form" id="form_<?php echo $methodid ?>_detil_scan" action="javascript:addx_<?php echo $methodid ?>()" enctype="multipart/form-data" method="post"> -->
									<div class="row">
										<div class="col-xl-12">
											<div class="row">
												<div class="col-xl-4">
													<?php
													$this->ecc_library->form('hidden', '', "form_" . $methodid . "_other_scan", $this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
													$this->ecc_library->form('hidden', 'shipment_id', "form_" . $methodid . "_other_scan", 'fabric_shipment_id', '', '', '');
													$this->ecc_library->form('hidden', 'fabric_shipment_list_id', "form_" . $methodid . "_other_scan", 'fabric_shipment_list_id', '', '', '');
													$this->ecc_library->form('hidden', 'receive', "form_" . $methodid . "_other_scan", 'fabric_warehouse_receive_id', '', '', '');
													$this->ecc_library->form('hidden', 'receive_detail', "form_" . $methodid . "_other_scan", 'fabric_warehouse_receive_detail_id', '', '', '');
													$this->ecc_library->form('hidden', '', "form_" . $methodid . "_other_scan", 'fabric_shipment_list_lot', '', '', '');
													$this->ecc_library->form('hidden', 'bc', "form_" . $methodid . "_other_scan", 'bc_in_header_id', '', '', '');
													$this->ecc_library->form('hidden', 'bc', "form_" . $methodid . "_other_scan", 'bc_in_barang_id', '', '', '');
													$this->ecc_library->form('hidden', '', "form_" . $methodid . "_other_scan", 'warehouse_id', '', '', '');
													$this->ecc_library->form('hidden', '', "form_" . $methodid . "_other_scan", 'purchase_performa_id', '', '', '');
													$this->ecc_library->form('hidden', 'partner', "form_" . $methodid . "_other_scan", 'partner_id', '', '', '');
													// $this->ecc_library->form2('select_pop','Purchase Order No:',"form_".$methodid."_detil_scan",'purchase_order_warehouse_id','','','data_list_po_warehouse','6');
													?>
												<!--	<div class="form-group">
														<label for="fabric_barcode">Barcode Scan</label>
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="fa fa-barcode"></i></span>
															</div>
															<input type="text" class="form-control fabric_barcode" id="form_<?php //echo $methodid ?>_other_scan_fabric_barcode" name="fabric_barcode" onkeypress="scan_receive_other_<?php //echo $methodid ?>(event)" autocomplete='off' />
															
														</div>
													</div> -->
												</div>
												<div class="col-xl-3">
													<?php
													$this->ecc_library->form2('hidden', 'Total Lot', "form_" . $methodid . "_other_scan", 'total_lot', '', '', '');
													
													?>
												</div>
												<div class="col-xl-3">
													<?php
													$this->ecc_library->form2('hidden', 'Total Roll', "form_" . $methodid . "_other_scan", 'total_roll', '', '', '');
													
													?>
												</div>

											</div>
										</div>
										<div class="col-xl-12">
											<div class="row">
												<div class="col-xl-3">
													<label id="label_message"></label> <br>
												</div>
											</div>
										</div>



									</div>


									<div class="row panel_<?php echo $methodid ?>_panel_fabric_shipment_other mb-10">
										<div class="col-xl-10">
											<?php
											$extra_param = array('methodid' => $methodid, 'extra_param' => array(0 => array('field' => 'fabric_shipment_id', 'form_id' => 'form_' . $methodid . '_other_scan_fabric_shipment_id'), 1 => array('field' => 'bc_in_header_id', 'form_id' => 'form_' . $methodid . '_other_scan_bc_in_header_id')));
											//$extra_param = array('methodid' => $methodid, 'extra_param' => array(0 => array('field' => 'fabric_shipment_id', 'form_id' => 'form_' . $methodid . '_other_scan_fabric_shipment_id')));

											$this->ecc_library->jqgrid($methodid . "_other_list", $dashboard_table['field_fabric_list_other_recive'], $dashboard_table['field_loaddata_list_other_recive'], $extra_param);
											?>




										</div>
									</div>

									<div class="row panel_<?php echo $methodid ?>_panel_receive_detail_other mb-10">
										<div class="col-xl-10">
											<?php
											$extra_field = array();
											$extra_param = array('methodid' => $methodid, 'extra_param' => array(0 => array('field' => 'fabric_shipment_id', 'form_id' => 'form_' . $methodid . '_other_scan_fabric_shipment_id')));
											$this->ecc_library->jqgrid2($methodid . "_other_receive_scan", $dashboard_table['field_other_receive_scan'], $dashboard_table['field_loaddata_other_scan'], $extra_param);
											?>
										</div>
									</div>

								</div>
							</div>
							<br />

							<!--	</form> -->
							<!--
                           <div class="ui grid form">
								<div class="row field">
									<div class="twelve wide column">
										<button type="button" class="btn btn-info" onclick="cancel_<?php //echo $methodid ?>()">
											<i class="fa fa-arrow-left"></i> Back
										</button>
									</div>
								</div>
						  </div>
						  -->
						</div>

					</div>

				</div>
			</div>
		</div>
	</div>
</div>
</div>

<script>
 //---scrip membuat autofokus
  //  $(document).ready(function() {
        // Pastikan kursor selalu di input barcode meskipun user klik di luar
  //      $(document).click(function() {
  //          $("#form_<?php echo $methodid ?>_detail_scan_fabric_barcode").focus();
  //      });
  //	});
//const inputBarcode = document.getElementById('form_<?php echo $methodid ?>_detail_scan_fabric_barcodexx');
//_detail_scan_insert_barcode

//inputBarcode.addEventListener('keydown', (e) => {
//  if (e.key === 'Enter') {
//	//  alert('masuk');
// 	  var fabric_barcode = $('#form_<?php echo $methodid ?>_detail_scan_fabric_barcodexx').val();
//	  scan_barcode_<?php echo $methodid ?>(fabric_barcode);
//     // console.log('Barcode Terdeteksi:', e.target.value);
//    //e.target.value = ''; // Reset untuk pemindaian berikutnya
//  }
//});
</script>