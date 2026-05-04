<style>
  /* CSS untuk mengatur ukuran tombol */
  .custom-button {
    height: 29px;
	width: 100px;
	margin-top:31px;
  }
  
  /* CSS untuk mengatur ukuran tombol */
  .custom-buttonx {
    height: 28px;
	width: 85px;
	margin-top:-79px;
	margin-left:285px;
  }
  
  /* CSS untuk mengatur ukuran tombol */
  .custom-combo {
    height: 28px;
	width: 80px;
	margin-top:32px;
	/* margin-left:450px; */
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
								<i class="fa fa-archive"></i>Header
							</a>	
						</li>
						
						<li class="nav-item">
							<a class="nav-link" id="tab_<?php echo $methodid; ?>_detail" data-toggle="tab" href="#content_<?php echo $methodid; ?>_detail" role="tab" aria-controls="content_<?php echo $methodid; ?>_detail" aria-selected="true">
								<i class="fa fa-puzzle-piece"></i>Detail
							</a>	
						</li>
						
						<li class="nav-item">
							<a class="nav-link" id="tab_<?php echo $methodid; ?>_document" data-toggle="tab" href="#content_<?php echo $methodid; ?>_document" role="tab" aria-controls="content_<?php echo $methodid; ?>_document" aria-selected="true">
								<i class="fa fa-folder"></i> Document
							</a>	
						</li>
						<li class="nav-item">
							<a class="nav-link" id="tab_<?php echo $methodid; ?>_packaging" data-toggle="tab" href="#content_<?php echo $methodid; ?>_packaging" role="tab" aria-controls="content_<?php echo $methodid; ?>_packaging" aria-selected="true">
								<i class="fa fa-umbrella"></i> Jaminan
							</a>	
						</li>
						<li class="nav-item">
							<a class="nav-link" id="tab_<?php echo $methodid; ?>_container" data-toggle="tab" href="#content_<?php echo $methodid; ?>_container" role="tab" aria-controls="content_<?php echo $methodid; ?>_container" aria-selected="true">
								<i class="fa fa-truck"></i> Petikemas
							</a>	
						</li>
						
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
													<div class="col-xl-10">
														<?php 
															$this->ecc_library->form('text','Car',"form_".$methodid,'car','','','');
														?>
													</div>
													<button type="button" class="btn custom-combo btn-default" onclick="generate_car_<?php echo $methodid ?>()">
														<i class="fa fa-flash"></i> Get Car
													</button>
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

													<div class="col-xl-12">
														<div class="">
															<?php $this->ecc_library->form('select','kode KPPBC',"form_".$methodid,'bongkar_kppbc_id','','','kppbc'); ?>
														</div>
													</div>
													<div class="col-xl-12">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_2 input_header_<?php echo $methodid ?>_1">
															<?php $this->ecc_library->form('select','Pel. Bongkar',"form_".$methodid,'bongkar_port_id','','','port'); ?>
														</div>
													</div>
													<div class="col-xl-6">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_1 input_header_<?php echo $methodid ?>_2">
															<?php $this->ecc_library->form('select','Pel Muat',"form_".$methodid,'muat_port_id','','','port'); ?>
														</div>
													</div>
													
													<div class="col-xl-6">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_1 input_header_<?php echo $methodid ?>_2">
															<?php $this->ecc_library->form('select','Pel Transit',"form_".$methodid,'transit_port_id','','','port'); ?>
														</div>
													</div>
													<div class="col-xl-12">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_2">
															<?php $this->ecc_library->form('select','Tujuan TPB',"form_".$methodid,'tujuan_tpb_id','','','tujuan_tpb'); ?>
														</div>
													</div>
													<div class="col-xl-12">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_5">
															<?php $this->ecc_library->form('select','Jenis TPB',"form_".$methodid,'jenis_tpb_id','','','jenis_tpb'); ?>
														</div>
													</div>
													<div class="col-xl-12">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_5">
															<?php $this->ecc_library->form('select','Tujuan Pengiriman',"form_".$methodid,'tujuan_pengiriman_id','','','tujuan_pengiriman'); ?>
															
														</div>
													</div>
														
													<div class="col-xl-12">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_3 input_header_<?php echo $methodid ?>_4">
															<?php $this->ecc_library->form('select','Tujuan Pemasukan',"form_".$methodid,'tujuan_pemasukan_id','','','tujuan_pemasukan'); ?>
														</div>
													</div>
													
													<div class="col-xl-12">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_1 input_header_<?php echo $methodid ?>_2">
															<?php $this->ecc_library->form('select','Tempat Penimbunan',"form_".$methodid,'tps_id','','','tps'); ?>
														</div>
													</div>
													<!--
													<div class="col-xl-6">
															<?php $this->ecc_library->form('select','Cara Pembayaran',"form_".$methodid,'cara_pembayaran_id','','','cara_pembayaran_peb'); ?>
													</div>
													-->
													<div class="col-xl-6">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_2 input_header_<?php echo $methodid ?>_1">
															<?php $this->ecc_library->form('select','From KB / PJT',"form_".$methodid,'pjt_status_id','','','pjt_status'); ?>
														</div>
													</div>
	
													<div class="col-xl-6">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_1 input_header_<?php echo $methodid ?>_2 input_header_<?php echo $methodid ?>_3 input_header_<?php echo $methodid ?>_4">
															<?php $this->ecc_library->form('select','Cara Pengangkutan',"form_".$methodid,'cara_angkut_id','','','cara_angkut'); ?>
														</div>
													</div>
													<div class="col-xl-12">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_1 input_header_<?php echo $methodid ?>_2">
															<?php $this->ecc_library->form('text','Sarana Pengangkut',"form_".$methodid,'nama_pengangkut','','',''); ?>
														</div>
													</div>
													<div class="col-xl-6">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_1 input_header_<?php echo $methodid ?>_2">
															<?php $this->ecc_library->form('text','VOY / Fligth',"form_".$methodid,'nomor_voy_flight','','',''); ?>
														</div>
													</div>
													
													<div class="col-xl-6">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_1 input_header_<?php echo $methodid ?>_2">
															<?php $this->ecc_library->form('select','Kode Bendera',"form_".$methodid,'kode_bendera','','','country'); ?>
														</div>
													</div>
													<div class="col-xl-6">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_1 input_header_<?php echo $methodid ?>_2">
															<?php 
																$this->ecc_library->form('date','Tanggal Tiba',"form_".$methodid,'tgl_perkiraan_tiba','','','');																	
															?>	
														</div>
													</div>
													<div class="col-xl-6">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_1 input_header_<?php echo $methodid ?>_2">
															<?php $this->ecc_library->form('select','Tutup PU',"form_".$methodid,'kode_tutup_pu','','','ceisa_tutup_pu'); ?>
														</div>
													</div>
													<div class="col-xl-6">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_1 input_header_<?php echo $methodid ?>_2">
															<?php $this->ecc_library->form('text','Nomor BC 1.1',"form_".$methodid,'nomor_bc11','','',''); ?>
														</div>
													</div>
													
													<div class="col-xl-6">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_1 input_header_<?php echo $methodid ?>_2">
															<?php 
																$this->ecc_library->form('date','Tanggal BC.1.1',"form_".$methodid,'tgl_bc11','','','');																	
															?>	
														</div>
													</div>
													<div class="col-xl-6">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_1 input_header_<?php echo $methodid ?>_2">
															<?php $this->ecc_library->form('text','Nomor POS',"form_".$methodid,'pos_bc11','','',''); ?>
														</div>
													</div>
													
													<div class="col-xl-6">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_1 input_header_<?php echo $methodid ?>_2">
															<?php $this->ecc_library->form('text','Sub POS',"form_".$methodid,'subpos_bc11','','',''); ?>
														</div>
													</div>
													<div class="col-xl-6">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_3 input_header_<?php echo $methodid ?>_4 input_header_<?php echo $methodid ?>_5">
															<?php $this->ecc_library->form('text','Jenis Pengangkut Darat',"form_".$methodid,'nama_pengangkut','','',''); ?>
														</div>
													</div>
													
													<div class="col-xl-6">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_3 input_header_<?php echo $methodid ?>_4 input_header_<?php echo $methodid ?>_5">
															<?php $this->ecc_library->form('text','No Polisi',"form_".$methodid,'nomor_polisi','','',''); ?>
														</div>
													</div>
												
													
													<div class="col-xl-6">
														<?php $this->ecc_library->form('text','Nama Penanda Tangan',"form_".$methodid,'nama_ttd','','',''); ?>
													</div>
													<div class="col-xl-6">
														<?php $this->ecc_library->form('text','Jabatan Penanda Tangan',"form_".$methodid,'jabatan_ttd','','',''); ?>	
													</div>

													<div class="col-xl-6">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_3 input_header_<?php echo $methodid ?>_4 input_header_<?php echo $methodid ?>_5">
															<?php $this->ecc_library->form('date','Tanggal Tanda Tangan',"form_".$methodid,'tgl_ttd','','',''); ?>
														</div>
													</div>
													
													<div class="col-xl-6">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_3 input_header_<?php echo $methodid ?>_4 input_header_<?php echo $methodid ?>_5">
															<?php $this->ecc_library->form('text','Kota',"form_".$methodid,'kota_ttd','','',''); ?>
														</div>
													</div>
													<div class="col-xl-12">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_1">
															<?php $this->ecc_library->form('text','Kota Tanda Tangan',"form_".$methodid,'kota_ttd','','',''); ?>
														</div>
													</div>
												</div>
											</div>
											
											<div class="col-xl-5">
												<?php 
													$this->ecc_library->form('select','Supplier',"form_".$methodid,'partner_id','','','supplier');																		
													$this->ecc_library->form('select','Shipper',"form_".$methodid,'vendor_partner_id','','','supplier');																		
												?>
												<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_1 input_header_<?php echo $methodid ?>_2 input_header_<?php echo $methodid ?>_3 input_header_<?php echo $methodid ?>_5">
													<?php $this->ecc_library->form('select','Owner',"form_".$methodid,'pemilik_id','','','supplier');?>
												</div>
												<?php
													$this->ecc_library->form('select','Currencies',"form_".$methodid,'currencies_id','','','currencies');							
												?>
												
												
												<div class="row">
													<div class="col-xl-9">
														<?php $this->ecc_library->form('text','Rate',"form_".$methodid,'ndpbm','','',''); ?>
													</div>
													<button type="button" class="btn custom-button btn-default" onclick="generate_kurs_<?php echo $methodid ?>()">
														<i class="fa fa-flash"></i> Get Kurs
													</button>
													<div class="col-xl-12">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_1 input_header_<?php echo $methodid ?>_2">
															<?php $this->ecc_library->form('select','Price Type',"form_".$methodid,'price_type_id','','','price_type'); ?>
														</div>
													</div>
													<div class="col-xl-12">
														<div class="">
															<?php $this->ecc_library->form('text','Value',"form_".$methodid,'amount_origin','','',''); ?>
														</div>
													</div>
												
												<!--<div class="col-xl-6">
														<div class="">
															<?php $this->ecc_library->form('text','Value (Rp)',"form_".$methodid,'amount_origin','','',''); ?>
														</div>
													</div> -->
													<div class="col-xl-12">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_1 input_header_<?php echo $methodid ?>_2 input_header_<?php echo $methodid ?>_4 input_header_<?php echo $methodid ?>_5">
															<?php $this->ecc_library->form('text','Value Added',"form_".$methodid,'value_additional','','',''); ?>	
														</div>
													</div>
													
													<div class="col-xl-12">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_1 input_header_<?php echo $methodid ?>_2">
															<?php $this->ecc_library->form('text','Discount',"form_".$methodid,'discount','','',''); ?>
														</div>
													</div>
												
													<div class="col-xl-12">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_1 input_header_<?php echo $methodid ?>_2">
															<?php $this->ecc_library->form('text','Freight',"form_".$methodid,'amount_freight','','',''); ?>
														</div>
													</div>

													<div class="col-xl-6">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_1 input_header_<?php echo $methodid ?>_2">
															<?php $this->ecc_library->form('select','Insurance Type',"form_".$methodid,'insurance_type_id','','','insurance_type'); ?>
														</div>
													</div>
													
													<div class="col-xl-6">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_1 input_header_<?php echo $methodid ?>_2">
															<?php $this->ecc_library->form('text','Insurance Value',"form_".$methodid,'amount_insurance','','',''); ?>
														</div>
													</div>

													<div class="col-xl-12">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_3 input_header_<?php echo $methodid ?>_4">
															<?php $this->ecc_library->form('text','Nilai Jasa',"form_".$methodid,'maklon','','',''); ?>
														</div>
													</div>
													<div class="col-xl-12">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_2 input_header_<?php echo $methodid ?>_1">
															<?php $this->ecc_library->form('select','Kena Pajak',"form_".$methodid,'kode_kena_pajak','','','ceisa_kena_pajak'); ?>
														</div>
													</div>
													<div class="col-xl-12">
														<div class="">
															<?php $this->ecc_library->form('text','Bruto',"form_".$methodid,'bruto','','',''); ?>
														</div>
													</div>
													<div class="col-xl-6">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_2">
															<?php $this->ecc_library->form('text','Kota',"form_".$methodid,'kota_ttd','','',''); ?>
														</div>
													</div>
													<div class="col-xl-6">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_2">
															<?php $this->ecc_library->form('date','Tanggal Tanda Tangan',"form_".$methodid,'tgl_ttd','','',''); ?>
														</div>
													</div>
													<div class="col-xl-12">
														<div class="input_header_<?php echo $methodid ?> input_header_<?php echo $methodid ?>_1">
															<?php $this->ecc_library->form('date','Tanggal Tanda Tangan',"form_".$methodid,'tgl_ttd','','',''); ?>
														</div>
													</div>
														
												</div>	
											</div>	
										</div>
										
										<div class="row">
											<div class="col-xl-5">
												
												
													
												
												
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
													<!--
													<div class="col-xl-12">
														<?php $this->ecc_library->form('text','Seri',"form_".$methodid."_detail",'seri','','',''); ?>
													</div>
													-->
													<div class="col-xl-12">
														<?php $this->ecc_library->form('select','Kode Barang',"form_".$methodid."_detail",'item_id','','','item_detail');	?>
													</div>	
													
													<div class="col-xl-12">
														<?php $this->ecc_library->form('select','HS Code',"form_".$methodid."_detail",'hs_id','','','hs_code');	?>
													</div>
													
													<div class="col-xl-12">
														<?php $this->ecc_library->form('select','Kategori Barang',"form_".$methodid."_detail",'kategori_barang_id','','','kategori_barang');	?>
													</div>	
													
													<div class="col-xl-12 input_header_<?php echo $methodid ?>  input_header_<?php echo $methodid ?>_1  input_header_<?php echo $methodid ?>_2 input_header_<?php echo $methodid ?>_3  input_header_<?php echo $methodid ?>_4  input_header_<?php echo $methodid ?>_5">
														<?php $this->ecc_library->form('select','Asal Bahan Baku',"form_".$methodid."_detail",'kode_asal_bahan_baku','','','ceisa_asal_bahanbaku');	?>
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
													<!--
													<div class="col-xl-12">
														<?php $this->ecc_library->form('text','Unit Price',"form_".$methodid."_detail",'unit_price','','',''); ?>
													</div>	
													-->
													<div class="col-xl-12">
														<?php $this->ecc_library->form('text','Amount',"form_".$methodid."_detail",'cif','','',''); ?>
													</div>
													<div class="col-xl-12">
														<?php $this->ecc_library->form('text','Subcon Price',"form_".$methodid."_detail",'subcon_price','','',''); ?>
													</div>	
													<!--
													<div class="col-xl-8">
														<?php $this->ecc_library->form('text','Kode Asal Barang',"form_".$methodid."_detail",'kode_asal_barang','','',''); ?>
													</div>
													
													<div class="col-xl-8">
														<?php $this->ecc_library->form('text','Qty Perkemasan',"form_".$methodid."_detail",'isi_perkemasan','','',''); ?>
													</div>
													
													<div class="col-xl-4">
														<?php $this->ecc_library->form('text','Asuransi',"form_".$methodid."_detail",'asuransi','','',''); ?>
													</div>
													
													<div class="col-xl-12">
														<?php $this->ecc_library->form('select','Fasilitas',"form_".$methodid."_detail",'fasilitas_id','','','fasilitas'); ?>
													</div>	-->
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
													<!--
													<div class="col-xl-6">
														<?php $this->ecc_library->form('select','Cara Perhitungan',"form_".$methodid."_detail",'kode_perhitungan','','','ceisa_cara_perhitungan'); ?>
													</div>
													-->
													<div class="col-xl-12">
														<?php $this->ecc_library->form('text','Note (Merk Kemasan)',"form_".$methodid."_detail",'note','','',''); ?>
													</div>
													<!--
													<div class="col-xl-12">
														<?php $this->ecc_library->form('select','Skema Tarif',"form_".$methodid."_detail",'skema_tarif_id','','','skema_tarif'); ?>
													</div>
													-->
												</div>
												
											</div>
											<!--
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
											-->
											<div class="col-xl-5">
												<div class="row">
												
												</div>
											</div>
										</div>
										
										<!--
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
										-->
										
										<div class="col-xl-12">
											<label>   </label>
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
						
			<!--CEISA40-->
						<div class="tab_custom_ecc tab-pane fade" id="content_<?php echo $methodid; ?>_document" role="tabpanel" aria-labelledby="tab_<?php echo $methodid; ?>_document">
							<div class="row panel_<?php echo $methodid ?>_panel_document">
								<div class="col-xl-12">
									<form class="ui grid ecc_form" id="form_<?php echo $methodid ?>_document" action="javascript:add_doc_<?php echo $methodid ?>()">
										<?php 
											$this->ecc_library->form('hidden','',"form_".$methodid."_document",$this->security->get_csrf_token_name(),$this->security->get_csrf_hash());
											$this->ecc_library->form('hidden','',"form_".$methodid."_document",'bc_in_header_id','');						
											$this->ecc_library->form('hidden','',"form_".$methodid."_document",'custom_type_id','');						
											$this->ecc_library->form('hidden','',"form_".$methodid."_document",'id_dokumen','');
										?>
										
										<div class="row">
											<div class="col-xl-6">
												<div class="row">
													<div class="col-xl-12">
														<?php 
															$this->ecc_library->form('text','Seri Dokumen',"form_".$methodid."_document",'seri_dokumen','1','','');
															$this->ecc_library->form('select','Kode Fasilitas',"form_".$methodid."_document",'kode_fasilitas','','','ceisa_fasilitas');	
														?>
													</div>
												</div>
												<div class="row">
													<div class="col-xl-6">
														<?php 						
															$this->ecc_library->form('select','kode Dokumen',"form_".$methodid."_document",'kode_dokumen','','','ceisa_document');																	
														?>
													</div>	
													<div class="col-xl-6">
														<?php 
															$this->ecc_library->form('text','No. Dokumen',"form_".$methodid."_document",'nomor_dokumen','','','');																	
														?>	
													</div>
													<div class="col-xl-12">
														<?php 
															$this->ecc_library->form('date','Tanggal Dokumen',"form_".$methodid."_document",'tanggal_dokumen','','','');																	
														?>	
													</div>
													<div class="col-xl-12">
														<?php $this->ecc_library->form('text','Note',"form_".$methodid."_document",'memo','','',''); ?>
													</div>	
												</div>
											</div>			
										</div>
										<div class="ui grid form">
										<br>
											<div class="col-xl-12">
											<label>   </label>
											<div class="input-group">
												<div class="button_<?php echo $methodid ?>_document_new" style="display:none">
													<button type="submit" class="btn btn-success">
														<i class="fa fa-plus"></i> ADD
													</button>
												</div>
												
												<div class="button_<?php echo $methodid ?>_document_edit" style="display:none">
													<button type="submit" class="btn btn-success">
														<i class="fa fa-check"></i> SAVE
													</button>
													
													<a class="btn btn-danger" onclick="javascript:cancel_document_<?php echo $methodid ?>()">
														<i class="fa fa-times"></i> CANCEL
													</a>
												</div>
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
										$extra_param = array('methodid'=> $methodid,'extra_param' => array(0 => array('field' => 'bc_in_header_id','form_id' => 'form_'. $methodid .'_document_bc_in_header_id')));
										$this->ecc_library->jqgrid($methodid."_document", $dashboard_table['field_document'], $dashboard_table['field_document_loaddata'],$extra_param); 
									?>
								</div>
							</div>
						</div>
						
						<div class="tab_custom_ecc tab-pane fade" id="content_<?php echo $methodid; ?>_packaging" role="tabpanel" aria-labelledby="tab_<?php echo $methodid; ?>_packaging">
							<div class="row panel_<?php echo $methodid ?>_panel_packaging">
								<div class="col-xl-12">
									<form class="ui grid ecc_form" id="form_<?php echo $methodid ?>_packaging" action="javascript:add_kemasan_<?php echo $methodid ?>()">
										<?php 
											$this->ecc_library->form('hidden','',"form_".$methodid."_packaging",$this->security->get_csrf_token_name(),$this->security->get_csrf_hash());
											$this->ecc_library->form('hidden','',"form_".$methodid."_packaging",'bc_in_header_id','');						
											$this->ecc_library->form('hidden','',"form_".$methodid."_packaging",'custom_type_id','');						
											$this->ecc_library->form('hidden','',"form_".$methodid."_packaging",'idJaminan','');
										?>
										
										<div class="row">
											<div class="col-xl-6">
												<div class="row">
													<!--
													<div class="col-xl-12">
														<?php 
															$this->ecc_library->form('text','Seri Jaminan',"form_".$methodid."_packaging",'seriDokumen_jaminan','','','');
														?>
													</div>
													-->
													<div class="col-xl-6">
														<?php 
															$this->ecc_library->form('text','Nomor BPJ',"form_".$methodid."_packaging",'nomorBpj','','','');																	
														?>	
													</div>
													<div class="col-xl-6">
														<?php 
															$this->ecc_library->form('date','Tanggal BPJ',"form_".$methodid."_packaging",'tanggalBpj','','','');																	
														?>	
													</div>
													<div class="col-xl-6">
														<?php
															$this->ecc_library->form('select','Jenis Jaminan',"form_".$methodid."_packaging",'kodeJenisJaminan','','','jenis_jaminan_ceisa');
														?>
													</div>
													<div class="col-xl-6">
														<?php 
															$this->ecc_library->form('text','Nomor Jaminan',"form_".$methodid."_packaging",'nomorJaminan','','','');	
														?>
													</div>
													<div class="col-xl-6">
														<?php 
															$this->ecc_library->form('date','Tanggal Jaminan',"form_".$methodid."_packaging",'tanggalJaminan','','','');																	
														?>	
													</div>
													<div class="col-xl-6">
														<?php 
															$this->ecc_library->form('date','Tanggal Jatuh Tempo',"form_".$methodid."_packaging",'tanggalJatuhTempo','','','');																	
														?>	
													</div>
													<div class="col-xl-12">
														<?php 
															$this->ecc_library->form('text','Penjamin',"form_".$methodid."_packaging",'penjamin','','','');	
														
															$this->ecc_library->form('text','Nilai Jaminan',"form_".$methodid."_packaging",'nilaiJaminan','','','');	
														?>
													</div>
												</div>	
											</div>
										</div>			
										<div class="ui grid form">
					
											<div class="col-xl-12">
											<label>   </label>
											<div class="input-group">
												<div class="button_<?php echo $methodid ?>_kemasan_new" style="display:none">
													<button type="submit" class="btn btn-success">
														<i class="fa fa-plus"></i> ADD
													</button>
												</div>
												
												<div class="button_<?php echo $methodid ?>_kemasan_edit" style="display:none">
													<button type="submit" class="btn btn-success">
														<i class="fa fa-check"></i> SAVE
													</button>
													
													<a class="btn btn-danger" onclick="javascript:cancel_kemasan_<?php echo $methodid ?>()">
														<i class="fa fa-times"></i> CANCEL
													</a>
												</div>
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
										$extra_param = array('methodid'=> $methodid,'extra_param' => array(0 => array('field' => 'bc_in_header_id','form_id' => 'form_'. $methodid .'_packaging_bc_in_header_id')));
										$this->ecc_library->jqgrid($methodid."_packaging", $dashboard_table['field_packaging'], $dashboard_table['field_packaging_loaddata'],$extra_param); 
									?>
								</div>
							</div>
						</div>
						
						<div class="tab_custom_ecc tab-pane fade" id="content_<?php echo $methodid; ?>_container" role="tabpanel" aria-labelledby="tab_<?php echo $methodid; ?>_container">
							<div class="row panel_<?php echo $methodid ?>_panel_container">
								<div class="col-xl-12">
									<form class="ui grid ecc_form" id="form_<?php echo $methodid ?>_container" action="javascript:add_kontainer_<?php echo $methodid ?>()">
										<?php 
											$this->ecc_library->form('hidden','',"form_".$methodid."_container",$this->security->get_csrf_token_name(),$this->security->get_csrf_hash());
											$this->ecc_library->form('hidden','',"form_".$methodid."_container",'bc_in_header_id','');						
											$this->ecc_library->form('hidden','',"form_".$methodid."_container",'custom_type_id','');						
											$this->ecc_library->form('hidden','',"form_".$methodid."_container",'id_kontainer','');
										?>
										
										<div class="row">
											<div class="col-xl-6">
												<div class="row">
													<div class="col-xl-12">
														<?php 
															$this->ecc_library->form('text','Seri Kontainer',"form_".$methodid."_container",'seri_kontainer','','','');
															?>
													</div>
													<div class="col-xl-6">
														<?php 
															$this->ecc_library->form('select','Tipe Kontainer',"form_".$methodid."_container",'kode_tipe_kontainer','','','ceisa_tipe_kontainer');	
															?>
													</div>
													<div class="col-xl-6">
														<?php 
															$this->ecc_library->form('select','Jenis Kontainer',"form_".$methodid."_container",'kode_jenis_kontainer','','','ceisa_jenis_kontainer');		
															?>
													</div>
													<div class="col-xl-6">
														<?php 
															$this->ecc_library->form('select','Ukuran Kontainer',"form_".$methodid."_container",'kode_ukuran_kontainer','','','ceisa_ukuran_kontainer');		
															?>
													</div>
													<div class="col-xl-6">
														<?php 
															$this->ecc_library->form('text','No. Kontainer',"form_".$methodid."_container",'nomor_kontainer','','','');
															?>
													</div>
													<div class="col-xl-12">
														<?php 
															$this->ecc_library->form('text','Note',"form_".$methodid."_container",'memo','','','');
														?>
													</div>
														
														
												</div>	
											</div>
										</div>			
										<div class="ui grid form">
										<br>
										<br>
											<div class="col-xl-12">
											<label>   </label>
											<div class="input-group">
												<div class="button_<?php echo $methodid ?>_kontainer_new" style="display:none">
													<button type="submit" class="btn btn-success">
														<i class="fa fa-plus"></i> ADD
													</button>
												</div>
												
												<div class="button_<?php echo $methodid ?>_kontainer_edit" style="display:none">
													<button type="submit" class="btn btn-success">
														<i class="fa fa-check"></i> SAVE
													</button>
													
													<a class="btn btn-danger" onclick="javascript:cancel_kontainer_<?php echo $methodid ?>()">
														<i class="fa fa-times"></i> CANCEL
													</a>
												</div>
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
										$extra_param = array('methodid'=> $methodid,'extra_param' => array(0 => array('field' => 'bc_in_header_id','form_id' => 'form_'. $methodid .'_container_bc_in_header_id')));
										$this->ecc_library->jqgrid($methodid."_container", $dashboard_table['field_contanier'], $dashboard_table['field_container_loaddata'],$extra_param); 
									?>
								</div>
							</div>
						</div> 
						
						<div class="tab_custom_ecc tab-pane fade" id="content_<?php echo $methodid; ?>_packaging" role="tabpanel" aria-labelledby="tab_<?php echo $methodid; ?>_packaging">
							<div class="row panel_<?php echo $methodid ?>_panel_packaging">
								<div class="col-xl-12">
									<form class="ui grid ecc_form" id="form_<?php echo $methodid ?>" action="javascript:post_<?php echo $methodid ?>()">
										<?php 
											$this->ecc_library->form('hidden','',"form_".$methodid."_packaging",$this->security->get_csrf_token_name(),$this->security->get_csrf_hash());
											$this->ecc_library->form('hidden','',"form_".$methodid."_packaging",'bc_in_header_id','');						
											$this->ecc_library->form('hidden','',"form_".$methodid."_packaging",'custom_type_id','');						
											$this->ecc_library->form('hidden','',"form_".$methodid."_packaging",'id_jaminan','');
										?>
										
										<div class="row">
											<div class="col-xl-12">
												<div class="row">
													<div class="col-xl-6">
														<?php 
															$this->ecc_library->form('hidden','Seri Kemasan',"form_".$methodid."_packaging",'seriDokumen_jaminan','','','');
															$this->ecc_library->form('text','Nomor PBJ',"form_".$methodid."_packaging",'nomorBpj','','','');
															$this->ecc_library->form('date','Tanggal BPJ',"form_".$methodid."_packaging",'tanggalBpj','','','');
															$this->ecc_library->form('select','Jenis Jaminan',"form_".$methodid."_packaging",'kodeJenisJaminan','','','jenis_jaminan_ceisa');
															$this->ecc_library->form('text','Nomor Jaminan',"form_".$methodid."_packaging",'nomorJaminan','','','');	
														?>	
													</div>
													<div class="col-xl-5">
														<?php 
															$this->ecc_library->form('date','Tanggal Jaminan',"form_".$methodid."_packaging",'tanggalJaminan','','','');	
															$this->ecc_library->form('date','Tanggal Jatuh Tempo',"form_".$methodid."_packaging",'tanggalJatuhTempo','','','');	
															$this->ecc_library->form('text','Penjamin',"form_".$methodid."_packaging",'penjamin','','','');	
															$this->ecc_library->form('text','Nilai Jaminan',"form_".$methodid."_packaging",'nilaiJaminan','','','');							
															
														?>
													</div>
													
													<div class="col-xl-11">
														<?php 
															$this->ecc_library->form('text','Note',"form_".$methodid."_packaging",'keterangan','','','');	
													
														?>
														
													</div>
	
												</div>	
											</div>
										</div>			
										<div class="ui grid form">
										<br>
											<div class="col-xl-12">
											<label>   </label>
											<div class="input-group">
												<div class="button_<?php echo $methodid ?>_kemasan_new" style="display:none">
													<button type="submit" class="btn btn-success">
														<i class="fa fa-plus"></i> ADD
													</button>
												</div>
												
												<div class="button_<?php echo $methodid ?>_kemasan_edit" style="display:none">
													<button type="submit" class="btn btn-success">
														<i class="fa fa-check"></i> SAVE
													</button>
													
													<a class="btn btn-danger" onclick="javascript:cancel_document_<?php echo $methodid ?>()">
														<i class="fa fa-times"></i> CANCEL
													</a>
												</div>
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
										$extra_param = array('methodid'=> $methodid,'extra_param' => array(0 => array('field' => 'bc_in_header_id','form_id' => 'form_'. $methodid .'_kemasan_bc_in_header_id')));
										$this->ecc_library->jqgrid($methodid."_packaging", $dashboard_table['field_packaging'], $dashboard_table['field_packaging_loaddata'],$extra_param); 
									?>
								</div>
							</div>
						</div>
						
						
						
		<!--BATAS_CEISA40-->	
					</div>
				</div>
			</div>
		</div>   
	</div>
</div>