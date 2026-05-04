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
							<a class="nav-link" id="tab_<?php echo $methodid; ?>_detail" data-toggle="tab" href="#content_<?php echo $methodid; ?>_detail" role="tab" aria-controls="content_<?php echo $methodid; ?>_detail" aria-selected="true">
								Detail
							</a>	
						</li>
						<!--
						<li class="nav-item">
							<a class="nav-link" id="tab_<?php echo $methodid; ?>_custom_import_document" data-toggle="tab" href="#content_<?php echo $methodid; ?>_custom_import_document" role="tab" aria-controls="content_<?php echo $methodid; ?>_custom_import_document" aria-selected="true">
								<i class="fa fa-cog"></i> Document
							</a>	
						</li>
						
						<li class="nav-item">
							<a class="nav-link" id="tab_<?php echo $methodid; ?>_custom_import_container" data-toggle="tab" href="#content_<?php echo $methodid; ?>_custom_import_container" role="tab" aria-controls="content_<?php echo $methodid; ?>_custom_import_container" aria-selected="true">
								<i class="fa fa-cog"></i> Container
							</a>	
						</li>
						!-->
					</ul>
					
					<div class="tab-content">
						<div class="tab_custom_ecc tab-pane fade active show" id="content_<?php echo $methodid; ?>_header" role="tabpanel" aria-labelledby="tab_<?php echo $methodid; ?>_header">
							<div class="row">
								<div class="col-xl-12 mb-10 ml-10">
									<form class="ui grid ecc_form" id="form_<?php echo $methodid ?>" action="javascript:post_<?php echo $methodid ?>()">
										<?php 
											$this->ecc_library->form('hidden','',"form_".$methodid,$this->security->get_csrf_token_name(),$this->security->get_csrf_hash());
											$this->ecc_library->form('hidden','',"form_".$methodid,'bc_in_header_id','');						
											$this->ecc_library->form('hidden','',"form_".$methodid,'custom_type_id','');
											$this->ecc_library->form('hidden','',"form_".$methodid,'bc_in_type_id','');
										?>
										
										<div class="row">
											<div class="col-xl-6">
												<div class="row">
													<div class="col-xl-12">
														<?php 
															$this->ecc_library->form('text','Car',"form_".$methodid,'car','','','');
														?>
													</div>
												</div>
												
												<div class="row">
													<div class="col-xl-6">
														<?php 
															$this->ecc_library->form('text','Register No',"form_".$methodid,'bc_no','','','');																	
														?>
													</div>
													<div class="col-xl-6">
														<?php 
															$this->ecc_library->form('date','Register Date',"form_".$methodid,'bc_date','','','');																	
														?>
														
													</div>															
												</div>
											</div>
											
											<div class="col-xl-5">
												<?php 
													$this->ecc_library->form('select','Supplier',"form_".$methodid,'partner_id','','','supplier');																		
													$this->ecc_library->form('select','Shipper',"form_".$methodid,'vendor_partner_id','','','supplier');																		
													$this->ecc_library->form('select','Currencies',"form_".$methodid,'currencies_id','','','currencies');							
												?>
											</div>
										</div>
										<br>
										<div class="row">
											<div class="col-xl-6">
												<div class="row">
													<div class="col-xl-6">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_2">
															<?php $this->ecc_library->form('select','Pel. Bongkar',"form_".$methodid,'bongkar_port_id','','','port'); ?>
														</div>
													</div>
													
													<div class="col-xl-6">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_2">
															<?php $this->ecc_library->form('select','KPPBC. Bongkar',"form_".$methodid,'bongkar_kppbc_id','','','kppbc'); ?>
														</div>
													</div>
												</div>
												
												<div class="row">
													<div class="col-xl-12">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_2">
															<?php $this->ecc_library->form('select','Tujuan TPB',"form_".$methodid,'tujuan_tpb_id','','','tujuan_tpb'); ?>
														</div>
													</div>
												</div>
												
												<div class="row">
													<div class="col-xl-12">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_5">
															<?php $this->ecc_library->form('select','Jenis TPB',"form_".$methodid,'jenis_tpb_id','','','jenis_tpb'); ?>
														</div>
													</div>
												</div>
												
												<div class="row">
													<div class="col-xl-12">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_5">
															<?php $this->ecc_library->form('select','Tujuan Pengiriman',"form_".$methodid,'tujuan_pengiriman_id','','','tujuan_pengiriman'); ?>
															
														</div>
													</div>
												</div>
												
												<div class="row">
													<div class="col-xl-12">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_3 input_header_<?php echo $methodid ?>_4">
															<?php $this->ecc_library->form('select','Tujuan Pemasukan',"form_".$methodid,'tujuan_pemasukan_id','','','tujuan_pemasukan'); ?>
														</div>
													</div>
												</div>
												
												<div class="row">
													<div class="col-xl-12">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_2">
															<?php $this->ecc_library->form('select','From KB / PJT',"form_".$methodid,'pjt_status_id','','','pjt_status'); ?>
														</div>
													</div>
												</div>
												
												<div class="row">
													<div class="col-xl-12">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_2 input_header_<?php echo $methodid ?>_3 input_header_<?php echo $methodid ?>_4">
															<?php $this->ecc_library->form('select','Cara Pengangkutan',"form_".$methodid,'cara_angkut_id','','','cara_angkut'); ?>
														</div>
													</div>
												</div>
												
												<div class="row">
													<div class="col-xl-12">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_2 input_header_<?php echo $methodid ?>_4">
															<?php $this->ecc_library->form('text','Sarana Pengangkut',"form_".$methodid,'nama_pengangkut','','',''); ?>
														</div>
													</div>
												</div>
												
												<div class="row">
													<div class="col-xl-6">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_2">
															<?php $this->ecc_library->form('text','VOY / Fligth',"form_".$methodid,'nomor_voy_flight','','',''); ?>
														</div>
													</div>
													
													<div class="col-xl-6">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_2">
															<?php $this->ecc_library->form('select','Kode Bendera',"form_".$methodid,'kode_bendera','','','country'); ?>
														</div>
													</div>
												</div>
												
												
												<div class="row">
													<div class="col-xl-6">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_5">
															<?php $this->ecc_library->form('text','Jenis Pengangkut Darat',"form_".$methodid,'nama_pengangkut2','','',''); ?>
														</div>
													</div>
													
													<div class="col-xl-6">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_5">
															<?php $this->ecc_library->form('text','No Polisi',"form_".$methodid,'nomor_polisi','','',''); ?>
														</div>
													</div>
												</div>
											</div>
											
											<div class="col-xl-5">
												<div class="row">
													<div class="col-xl-12">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_1  input_header_<?php echo $methodid ?>_2 input_header_<?php echo $methodid ?>_3 input_header_<?php echo $methodid ?>_4">
															<?php $this->ecc_library->form('text','Rate',"form_".$methodid,'ndpbm','','',''); ?>
														</div>
													</div>
												</div>
												
												<div class="row">
													<div class="col-xl-12">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_2">
															<?php $this->ecc_library->form('select','Price Type',"form_".$methodid,'price_type_id','','','price_type'); ?>
														</div>
													</div>
												</div>
												
												<div class="row">
													<div class="col-xl-12">
														<div class="">
															<?php $this->ecc_library->form('text','Value',"form_".$methodid,'amount_origin','','',''); ?>
														</div>
													</div>
												</div>
												
												<div class="row">
													<div class="col-xl-12">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_2">
															<?php $this->ecc_library->form('text','Value Added',"form_".$methodid,'value_additional','','',''); ?>
														</div>
													</div>
												</div>
												
												<div class="row">
													<div class="col-xl-12">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_2">
															<?php $this->ecc_library->form('text','Discount',"form_".$methodid,'discount','','',''); ?>
														</div>
													</div>
												</div>
												
												<div class="row">
													<div class="col-xl-6">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_2">
															<?php $this->ecc_library->form('select','Insurance Type',"form_".$methodid,'insurance_type_id','','','insurance_type'); ?>
														</div>
													</div>
													
													<div class="col-xl-6">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_2">
															<?php $this->ecc_library->form('text','Insurance Value',"form_".$methodid,'amount_insurance','','',''); ?>
														</div>
													</div>
												</div>
																											
												<div class="row">
													<div class="col-xl-12">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_2">
															<?php $this->ecc_library->form('text','Freight',"form_".$methodid,'amount_freight','','',''); ?>
														</div>
													</div>
												</div>
																								
												<div class="row">
													<div class="col-xl-12">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_3 input_header_<?php echo $methodid ?>_4">
															<?php $this->ecc_library->form('text','Nilai Jasa',"form_".$methodid,'maklon','','',''); ?>
														</div>
													</div>
												</div>
												
												<div class="row">
													<div class="col-xl-12">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_2">
															<?php $this->ecc_library->form('select','Tempat Penimbunan',"form_".$methodid,'tps_id','','','tps'); ?>
														</div>
													</div>
												</div>
												
												<div class="row">
													<div class="col-xl-6">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_2">
															<?php $this->ecc_library->form('select','Pel Muat',"form_".$methodid,'muat_port_id','','','port'); ?>
														</div>
													</div>
													
													<div class="col-xl-6">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_2">
															<?php $this->ecc_library->form('select','Pel Transit',"form_".$methodid,'transit_port_id','','','port'); ?>
														</div>
													</div>
												</div>
											</div>
										</div>	
									</form>
									
									<div class="row mb-10" id="panel_<?php echo $methodid ?>_2">
										<div class="col-xl-12 grid_container_<?php echo $methodid ?>_purchase_performa">
											<table id="table_<?php echo $methodid ?>_purchase_performa"></table>
											<div id="ptable_<?php echo $methodid ?>_purchase_performa"></div>                                                     
										</div>
									</div>

									<div class="row mb-10" id="panel_<?php echo $methodid ?>_4">
										<div class="col-xl-12 grid_container_<?php echo $methodid ?>_contract_subcon">
											<table id="table_<?php echo $methodid ?>_contract_subcon"></table>
											<div id="ptable_<?php echo $methodid ?>_contract_subcon"></div>                                                     
										</div>
									</div>

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
									<form class="ui grid ecc_form" id="form_<?php echo $methodid ?>_detail" action="javascript:add_<?php echo $methodid ?>()">
										<?php 
											$this->ecc_library->form('hidden','',"form_".$methodid."_detail",$this->security->get_csrf_token_name(),$this->security->get_csrf_hash());
											$this->ecc_library->form('hidden','',"form_".$methodid."_detail",'bc_in_header_id','');						
											$this->ecc_library->form('hidden','',"form_".$methodid."_detail",'bc_in_barang_id','');			
										?>	
										<div class="row">
											<div class="col-xl-6">
												<div class="row">
													<div class="col-xl-12">
														<?php $this->ecc_library->form('text','Seri',"form_".$methodid."_detail",'seri','','',''); ?>
													</div>
													
													<div class="col-xl-12">
														<?php $this->ecc_library->form('select','Kode Barang',"form_".$methodid."_detail",'item_id','','','item_detail');	?>
													</div>	
													
													<div class="col-xl-12">
														<?php $this->ecc_library->form('select','HS Code',"form_".$methodid."_detail",'hs_id','','','hs_code');	?>
													</div>
													
													<div class="col-xl-12">
														<?php $this->ecc_library->form('select','Kategori Barang',"form_".$methodid."_detail",'kategori_barang_id','','','kategori_barang');	?>
													</div>	
																													
													<div class="col-xl-4">
														<?php $this->ecc_library->form('text','Qty',"form_".$methodid."_detail",'quantity_custom','','',''); ?>
													</div>
													
													<div class="col-xl-4">
														<?php $this->ecc_library->form('select','Unit',"form_".$methodid."_detail",'uom_id','','','uom'); ?>
													</div>	
													
													<div class="col-xl-4">
														<?php $this->ecc_library->form('text','Conversion',"form_".$methodid."_detail",'conversion','','',''); ?>
													</div>	
													
													<div class="col-xl-12">
														<?php $this->ecc_library->form('text','Unit Price',"form_".$methodid."_detail",'unit_price','','',''); ?>
													</div>	
												</div>
											</div>
											
											<div class="col-xl-5">
												<div class="row">
													<div class="col-xl-6">
														<?php $this->ecc_library->form('text','Merk',"form_".$methodid."_detail",'merk','','',''); ?>
													</div>
													
													<div class="col-xl-6">
														<?php $this->ecc_library->form('text','Tipe',"form_".$methodid."_detail",'tipe','','',''); ?>
													</div>
													
													<div class="col-xl-6">
														<?php $this->ecc_library->form('text','Ukuran',"form_".$methodid."_detail",'ukuran','','',''); ?>
													</div>
													
													<div class="col-xl-6">
														<?php $this->ecc_library->form('text','Volume',"form_".$methodid."_detail",'volume','','',''); ?>
													</div>
													
													<div class="col-xl-12">
														<?php $this->ecc_library->form('text','Spf. Lain',"form_".$methodid."_detail",'spesifikasi_lain','','',''); ?>
													</div>
													
													<div class="col-xl-6">
														<?php $this->ecc_library->form('text','Bruto',"form_".$methodid."_detail",'bruto','','',''); ?>
													</div>	
													
													<div class="col-xl-6">
														<?php $this->ecc_library->form('text','Netto',"form_".$methodid."_detail",'netto','','',''); ?>
													</div>	
													
													<div class="col-xl-6">
														<?php $this->ecc_library->form('text','Qty Package',"form_".$methodid."_detail",'quantity_package','','',''); ?>
													</div>
													
													<div class="col-xl-6">
														<?php $this->ecc_library->form('select','Package',"form_".$methodid."_detail",'package_id','','','package'); ?>
													</div>	
													
													<div class="col-xl-12">
														<?php $this->ecc_library->form('select','Negara Asal Barang',"form_".$methodid."_detail",'origin_country_id','','','country'); ?>
													</div>	
													
													<div class="col-xl-12">
														<?php $this->ecc_library->form('text','Note',"form_".$methodid."_detail",'note','','',''); ?>
													</div>
												</div>
												
											</div>
											
											<div class="col-xl-6"> 
												<div class="row">
													<div class="col-xl-6">
														<?php $this->ecc_library->form('select','Fasilitas',"form_".$methodid."_detail",'fasilitas_id','','','fasilitas'); ?>
													</div>	
													
													<div class="col-xl-6">
														<?php $this->ecc_library->form('select','Skema Tarif',"form_".$methodid."_detail",'skema_tarif_id','','','skema_tarif'); ?>
													</div>	
												</div>
											</div>
											
											<div class="col-xl-5">
												<div class="row">
												
												</div>
											</div>
										</div>
										
										<div class="row input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_2">		
											<div class="col-xl-6">
												<div class="row">
													<div class="col-xl-12">
														<div class="row">
															<div class="col-xl-4">
																<?php 
																	$this->ecc_library->form('select','Bea Masuk',"form_".$methodid."_detail",'bm_jenis_tarif_id','','','jenis_tarif');						
																?>
															</div>
															<div class="col-xl-4">
																<?php 
																	$this->ecc_library->form('text','BM Tarif (%)',"form_".$methodid."_detail",'bm_tarif','','','');						
																?>
															</div>
															<div class="col-xl-4">
																<?php 
																	$this->ecc_library->form('select','BM Unit',"form_".$methodid."_detail",'bm_uom_id','','','uom');										
																?>
															</div>
														</div>
													</div>
													
													<div class="col-xl-12">
														<div class="row">
															<div class="col-xl-4">
																<?php 
																	$this->ecc_library->form('select','Cukai',"form_".$methodid."_detail",'cukai_jenis_tarif_id','','','jenis_tarif');						
																?>
															</div>
															<div class="col-xl-4">
																<?php 
																	$this->ecc_library->form('text','Cukai Tarif (%)',"form_".$methodid."_detail",'cukai_tarif','','','');						
																?>
															</div>
															<div class="col-xl-4">
																<?php 
																	$this->ecc_library->form('select','Cukai Unit',"form_".$methodid."_detail",'cukai_uom_id','','','uom');										
																?>
															</div>
														</div>
													</div>
												</div>
											</div>
											
											<div class="col-xl-5">
												<div class="row">
													<div class="col-xl-12">
														<div class="row">
															<div class="col-xl-2"></div>
															<div class="col-xl-4">
																<?php 
																	$this->ecc_library->form('text','PPN (%)',"form_".$methodid."_detail",'ppn_tarif','','','');						
																?>
															</div>
															<div class="col-xl-4">
																<?php 
																	$this->ecc_library->form('text','PPH (%)',"form_".$methodid."_detail",'pph_tarif','','','');						
																?>
															</div>
														</div>
													</div>
													
													<div class="col-xl-12">
														<div class="row">
															<div class="col-xl-2"></div>
															<div class="col-xl-4">
																<?php 
																	$this->ecc_library->form('text','PPNBM (%)',"form_".$methodid."_detail",'ppnbm_tarif','','','');						
																?>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-xl-12">
											<label> &nbsp </label>
											<div class="input-group">
												<div class="button_<?php echo $methodid ?>_detail_new" style="display:none">
													<button type="submit" class="btn btn-success">
														<i class="fa fa-plus"></i> ADD
													</button>
												</div>
												
												<div class="button_<?php echo $methodid ?>_detail_edit" style="display:none">
													<button type="submit" class="btn btn-success">
														<i class="fa fa-check"></i> SAVE
													</button>
													
													<a class="btn btn-danger" onclick="javascript:cancel_detail_<?php echo $methodid ?>()">
														<i class="fa fa-times"></i> CANCEL
													</a>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
							<br>
							<br>
							<div class="row">
								<div class="col-xl-12">
									<?php 
										$extra_param = array('methodid'=> $methodid,'extra_param' => array(0 => array('field' => 'bc_in_header_id','form_id' => 'form_'. $methodid .'_detail_bc_in_header_id')));
										$this->ecc_library->jqgrid($methodid."_detail", $dashboard_table['field_detail'], $dashboard_table['field_detail_loaddata'],$extra_param); 
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