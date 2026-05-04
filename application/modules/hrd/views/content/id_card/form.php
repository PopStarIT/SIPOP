<div class="row">
	<div class="col-xl-12">     
		<div class="card card-statistics h-100"> 
			<div class="card-body" style="padding: 1.25rem !important">
				<h5 class="card-title form_title_<?php echo $methodid ?>"><?php echo $page_title ?></h5>
					                 
								<div class="col-xl-12 mb-10 ml-10" id="content_form_<?php echo $methodid; ?>_add">
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
												<?php 
													//$this->ecc_library->form('text','Nama Karyawan',"form_".$methodid,'nama_karyawan','','','');
													$this->ecc_library->form('select_pop','Cari Karyawan',"form_".$methodid,'cari_karyawan','','','plh_karyawan');
													//$this->ecc_library->form('text','Departemen',"form_".$methodid,'departemen','','','');
													$this->ecc_library->form('select_pop','Departemen',"form_".$methodid,'departemen_id','','','plh_departement');
													
												?>
												</div>
												 <div class="col-xl-12">
												   <?php 
												  	$this->ecc_library->form('text','Link Photo',"form_".$methodid,'link_photo_karyawan','');
													$this->ecc_library->form('file_photo','Browse Photo',"form_".$methodid,'link_photo','','','');
													//$this->ecc_library->form('text','nmficture',"form_".$methodid,'nmficture','','','');
													?>
												 </div>
											  </div>
											</div>
											
											<div class="col-xl-4">
												<div class="row">
													<div class="col-xl-8">
														<?php 
														 $this->ecc_library->form('text','NIK',"form_".$methodid,'nik','','','');
														 $this->ecc_library->form('select_pop','Divisi',"form_".$methodid,'divisi_id','','','plh_divisi');
														?>
													</div>
													
													<div class="col-xl-12">
														<div class="row">
															<div class="col-xl-6 gbrphoto2">
													
														<img src="<?php echo base_url('assets/img/profile/default.jpeg'); ?>" alt="" height="170px" width="150px" class="rouded-circle img-thumbnail mt-2 gbrphoto"  id="gambar">
															</div>
														
												
														</div>
													</div>
												</div>
											</div>
											
											<div class="col-xl-4">
												<div class="row">
													<div class="col-xl-8">
														<?php 
														$this->ecc_library->form('select_pop','Status Karyawan',"form_".$methodid,'status_id','','','plh_status');
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
							
			          
								<div class="col-xl-12 mb-10 ml-10" id="content_form_<?php echo $methodid; ?>_edit">
									<form class="ui grid ecc_form" id="form_<?php echo $methodid ?>_edit" action="javascript:post_<?php echo $methodid ?>_edit()" enctype="multipart/form-data" method="post">
										<?php 
											$this->ecc_library->form('hidden','',"form_".$methodid,$this->security->get_csrf_token_name(),$this->security->get_csrf_hash());
											$this->ecc_library->form('hidden','',"form_".$methodid."_edit",'nama_karyawan_edit','');
											$this->ecc_library->form('hidden','',"form_".$methodid."_edit",'card_id_edit','');
											//$this->ecc_library->form('hidden','',"form_".$methodid,'badgenumber','');
										?>
										
										<div class="row">
											<div class="col-xl-4">
											  <div class="row">
											   <div class="col-xl-12">
												<?php 
													$this->ecc_library->form('text','Nama Karyawan',"form_".$methodid."_edit",'nama_karyawan','','','');
													//$this->ecc_library->form('select_pop','Cari Karyawan EDIT',"form_".$methodid,'cari_karyawan_edit','','','plh_karyawan');
													//$this->ecc_library->form('text','Departemen',"form_".$methodid,'departemen','','','');
													//$this->ecc_library->form('text','Departemen',"form_".$methodid."_edit",'departemen','','','');
													$this->ecc_library->form('select_pop','Departemen',"form_".$methodid."_edit",'departemen_edit','','','plh_departement');
													
												?>
												</div>
												 <div class="col-xl-12">
												   <?php 
												  	$this->ecc_library->form('text','Link Photo',"form_".$methodid."_edit",'link_photo_karyawan_edit','');
													$this->ecc_library->form('file_photo_edit','Browse Photo',"form_".$methodid."_edit",'link_photo_edit','','','');
													//$this->ecc_library->form('text','nmficture',"form_".$methodid,'nmficture','','','');
													?>
												 </div>
											  </div>
											</div>
											
											<div class="col-xl-4">
												<div class="row">
													<div class="col-xl-8">
														<?php 
														 $this->ecc_library->form('text','NIK',"form_".$methodid."_edit",'nik_edit','','','');
														// $this->ecc_library->form('text','Divisi',"form_".$methodid."_edit",'divisi_id_edit','','','');
														 $this->ecc_library->form('select_pop','Divisi',"form_".$methodid."_edit",'divisi_id_edit','','','plh_divisi');
														?>
													</div>
													
													<div class="col-xl-12">
														<div class="row">
															<div class="col-xl-6 gbrphoto2">
													
														<img src="<?php echo base_url('assets/img/profile/default.jpeg'); ?>" alt="" height="170px" width="150px" class="rouded-circle img-thumbnail mt-2 gbrphoto_edit"  id="gambar_edit">
															</div>
														
												
														</div>
													</div>
												</div>
											</div>
											
											<div class="col-xl-4">
												<div class="row">
													<div class="col-xl-8">
														<?php 
														$this->ecc_library->form('select_pop','Status Karyawan',"form_".$methodid."_edit",'status_id_edit','','','plh_status');
														?>
													</div>
																					
												</div>
											</div>
											
									
										</div>
									</form>
									
									<div class="ui grid form">
										<div class="row field">
											<div class="twelve wide column">
												<button type="button" class="btn btn-success" onclick="save_<?php echo $methodid ?>_edit()">
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