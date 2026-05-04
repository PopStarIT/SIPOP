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
												<?php 
													$this->ecc_library->form('select_pop','template',"form_".$methodid,'template_idcard_id','','','plh_template_idcard');
																										
												?>
												</div>
											
											  </div>
											</div>
											
											<div class="col-xl-8">
												<div class="row">
												
												<div class="col-xl-12">
												<div class="card">
													<figure class="figure">
													<?php
									               //  var_dump($view_load_form_template);
													 $view_form='template_karyawan';
													 $this->load->view('content/'.$view_form);
												   //  if(isset($view_load_form_template)){
												   //     $this->load->view('content/'.$view_load_form_template);
											       //  }
										            ?>
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