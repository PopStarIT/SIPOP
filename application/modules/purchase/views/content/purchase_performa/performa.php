?><div class="row">
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
					</ul>
					
					<div class="tab-content">
						<div class="tab_custom_ecc tab-pane fade active show" id="content_<?php echo $methodid; ?>_header" role="tabpanel" aria-labelledby="tab_<?php echo $methodid; ?>_header">
							<div class="row">
								<div class="col-xl-12 mb-10 ml-10">
									<form class="ui grid ecc_form" id="form_<?php echo $methodid ?>" action="javascript:post_<?php echo $methodid ?>()">
										<?php 
											$this->ecc_library->form('hidden','',"form_".$methodid,$this->security->get_csrf_token_name(),$this->security->get_csrf_hash());
											$this->ecc_library->form('hidden','',"form_".$methodid,'purchase_performa_id','');
											
										?>
										
										<div class="row">
											<div class="col-xl-4">
												<?php 
													$this->ecc_library->form('text','Purchase Proforma No',"form_".$methodid,'purchase_performa_no','','','');
													$this->ecc_library->form('date','Purchase Proforma Date',"form_".$methodid,'purchase_performa_date','','','');
											
												?>
											</div>
											
											<div class="col-xl-4">
												<?php 
													$this->ecc_library->form('select','Supplier',"form_".$methodid,'partner_id','','','supplier');
													$this->ecc_library->form('select','Currencies',"form_".$methodid,'currencies_id','','','currencies');						
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
							<?php
								$this->ecc_library->form('hidden','',"form_".$methodid."_detail",'purchase_performa_id','','','');
								$this->ecc_library->form('hidden','',"form_".$methodid."_detail",'purchase_performa_detail_id','','','');
								$this->ecc_library->form('hidden','',"form_".$methodid."_detail",'partner_id','','','');
								$this->ecc_library->form('hidden','',"form_".$methodid."_detail",'currencies_id','','','');
							?>
							<div class="row panel_<?php echo $methodid ?>_panel_purchase_order mb-10" >
								<div class="col-xl-12">
									<?php 
										$extra_field = array();
										$extra_field[] = array('field' => 'partner_id','form_id' => 'form_'. $methodid .'_detail_partner_id');
										$extra_field[] = array('field' => 'currencies_id','form_id' => 'form_'. $methodid .'_detail_currencies_id');
										$extra_field[] = array('field' => 'purchase_performa_detail_id','form_id' => 'form_'. $methodid .'_detail_purchase_performa_detail_id');
										$extra_param = array('methodid'=> $methodid,'beforeclick'=> 'beforeclick_'.$methodid."_purchase_order",'extra_param' => $extra_field);
										$this->ecc_library->jqgrid($methodid."_purchase_order", $dashboard_table['field_purchase_order'], $dashboard_table['field_purchase_order_loaddata'],$extra_param); 
									?>
								</div>
							</div> 
							
							<div class="row">
								<div class="col-xl-12">
									<?php 
										$extra_param = array('methodid'=> $methodid,'extra_param' => array(0 => array('field' => 'purchase_performa_id','form_id' => 'form_'. $methodid .'_detail_purchase_performa_id')));
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