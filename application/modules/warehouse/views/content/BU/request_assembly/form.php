<div class="row">
	<div class="col-xl-12">     
		<div class="card card-statistics h-100"> 
			<div class="card-body" style="padding: 1.25rem !exportant">
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
						
						
					</ul>
					
					<div class="tab-content">
						<div class="tab_custom_ecc tab-pane fade active show" id="content_<?php echo $methodid; ?>_header" role="tabpanel" aria-labelledby="tab_<?php echo $methodid; ?>_header">
							<div class="row">
								<div class="col-xl-12 mb-10 ml-10">
									<form class="ui grid ecc_form" id="form_<?php echo $methodid ?>" action="javascript:post_<?php echo $methodid ?>()">
										<?php 
											$this->ecc_library->form('hidden','',"form_".$methodid,$this->security->get_csrf_token_name(),$this->security->get_csrf_hash());
											$this->ecc_library->form('hidden','',"form_".$methodid,'request_id','');
										?>
										
										<div class="row">
											<div class="col-xl-6">
												<?php 
													$this->ecc_library->form('text','Request Cutting & Finishing No',"form_".$methodid,'request_no','','','');
													$this->ecc_library->form('date','Request Cutting & Finishing Date',"form_".$methodid,'request_date','','','');	
													$this->ecc_library->form('text','Keterangan',"form_".$methodid,'info','','','');												
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
							<div class="row">
								<div class="col-xl-12">
									<form class="ui grid ecc_form" id="form_<?php echo $methodid ?>_detail" action="javascript:add_<?php echo $methodid ?>()">
										<div class="row">
											<div class="col-xl-9">
												<div class="row">
													<div class="col-xl-4">
														<?php
															$this->ecc_library->form('hidden','',"form_".$methodid."_detail",$this->security->get_csrf_token_name(),$this->security->get_csrf_hash());
															$this->ecc_library->form('hidden','',"form_".$methodid."_detail",'request_id','','','');
															$this->ecc_library->form('hidden','',"form_".$methodid."_detail",'request_detail_id','','','');
															$this->ecc_library->form('hidden','',"form_".$methodid."_detail",'request_index','','','');
															$this->ecc_library->form('select','Item Code',"form_".$methodid."_detail",'item_id','','','item_detail');
														?>
													</div>
													
													<div class="col-xl-4 ">
														<?php
															$this->ecc_library->form('text','Qty Request',"form_".$methodid."_detail",'quantity_request','','','');
														?>
													</div>
													
													
												</div>
											</div>
											<div class="col-xl-3 ">
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
										</div>
									</form>
								</div>
							</div>
							<br>
							<br>
							<div class="row">
								<div class="col-xl-12">
									<?php 
										$extra_param = array('methodid'=> $methodid,'extra_param' => array(0 => array('field' => 'request_id','form_id' => 'form_'. $methodid .'_detail_request_id')));
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