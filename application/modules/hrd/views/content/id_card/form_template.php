<div class="row">
	<div class="col-xl-12">     
		<div class="card card-statistics h-100"> 
			<div class="card-body" style="padding: 1.25rem !important">
				<h5 class="card-title form_title_<?php echo $methodid ?>"><?php echo "Setting" ?></h5>
					                 
								<div class="col-xl-12 mb-10 ml-10" id="content_form_<?php echo $methodid; ?>_template">
									<form class="ui grid ecc_form" id="form_<?php echo $methodid ?>" action="javascript:post_<?php echo $methodid ?>()" enctype="multipart/form-data" method="post">
										<?php 
											$this->ecc_library->form('hidden','',"form_".$methodid,$this->security->get_csrf_token_name(),$this->security->get_csrf_hash());
											$this->ecc_library->form('hidden','',"form_".$methodid,'nama_karyawan','');
											$this->ecc_library->form('hidden','',"form_".$methodid,'card_id','');
											$this->ecc_library->form('hidden','',"form_".$methodid,'card_id_edit','');
											//$this->ecc_library->form('hidden','',"form_".$methodid,'badgenumber','');
										?>
										
										<div class="row">
											<div class="col-xl-4">
											  <div class="row">
											   <div class="col-xl-12">
											     <div class="form-group">
					                              <label for="template_idcard">Template</label>
					                               <select class="form-control" id="form_template_idcard_id" name="form_template_idcard">
												    <option value="template_karyawan">karyawan</option>
                                                    <option value="template_harian_lepas">Harian Lepas</option>
                                                    <option value="template_kontrak">Kontrak</option>
													<option value="template_visitor">Visitor</option>
					                               </select>
				                                </div>
												<div class="col-xl-12">
												<div class="row">
												 <div class="col-xl-4">
											        <button type="button" class="btn btn-default" onclick="bg_depan_idcard()">
													  <i class="fa fa-id-card"></i> Bg Depan
												    </button>
											     </div>
												 <div class="col-xl-4">
											     <button type="button" class="btn btn-default" onclick="cancel_<?php echo $methodid ?>_temp_idcard()">
													<i class="fa fa-arrow-left"></i> Bg Belakang
												  </button>
											     </div>
												  <div class="col-xl-2">
											     <button type="button" class="btn btn-default" onclick="cancel_<?php echo $methodid ?>_temp_idcard()">
													<i class="fa fa-arrow-left"></i> Back
												  </button>
											     </div>
												 </div>
												</div>
												<br />
												<div class="col-xl-12" >
												  <div class="row">
												   <div class="col-xl-4">
											        <button type="button" class="btn btn-default" onclick="cancel_<?php echo $methodid ?>_temp_idcard()">
													<i class="fa fa-arrow-left"></i> Background Depan
												  </button>
											     </div>
												  </div>
												</div>
												<br />
												 <!-- ======================= Bagian Panel ================== -->
												
												<div class="card col-xl-12" id="panel_background_depan" style="display:none">
												   <div class="row">
												    <div class="form-group col-md-2">
													 <div class="form-check">
										              <input class="form-check-input miring_kiri" type="checkbox" name="miring_kiri" value="1">
									                    <label class="form-check-label" for="gridCheck">-90</label>
								                     </div>
													</div>
							                       </div>
											   </div>
											   
											   <!-- ======================= Akhir Bagian Panel ================== -->
											   
												<?php 
													//$this->ecc_library->form('select_pop','template',"form_".$methodid,'template_idcard_id','','','plh_template_idcard');
																										
												?>
												</div>
												
											
											  </div>
											</div>
											
											<div class="col-xl-8">
												<div class="row">
												
												<div class="col-xl-12">
												  <div class="card" id="template_1" style='display:none;'>
													  <figure class="figure">
													  <?php
									                  // var_dump($selected);
													  $this->load->view($this->data['path_template']."/temp/karyawan_template"); 
                                                      ?>
												     <!-- <figcaption class="figure-caption text-end">A caption for the above image.</figcaption> -->
                                                     </figure>
												  </div>
													
													<div class="card" id="template_2" style='display:none;'>
													<figure class="figure">
													 <?php 
													 $this->load->view($this->data['path_template']."/temp/harian_lepas_template"); 
													 ?>
  <!-- <figcaption class="figure-caption text-end">A caption for the above image.</figcaption> -->
                                                   </figure>
															
													<div class="card" id="template_3" style='display:none;'>
													<figure class="figure">
													  <img src="<?php echo base_url('assets/img/profile/default.jpeg'); ?>" alt="" height="170px" width="150px" class="rouded-circle img-thumbnail mt-2 gbrphoto"  id="gambar">
				
  <!-- <figcaption class="figure-caption text-end">A caption for the above image.</figcaption> -->
                                                   </figure>	
												
														
													</div>
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
												
												<button type="button" class="btn btn-info" onclick="cancel_<?php echo $methodid ?>_temp_idcard()">
													<i class="fa fa-arrow-left"></i> Back
												</button>
											</div>
										</div>
									</div>
								</div>
										          
															
		
		</div>   
	</div>
</div>