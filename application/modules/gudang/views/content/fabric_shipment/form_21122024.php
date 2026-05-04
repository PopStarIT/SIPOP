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
						
						<li class="nav-item">
							<a class="nav-link" id="tab_<?php echo $methodid; ?>_shipment_receive" data-toggle="tab" href="#content_<?php echo $methodid; ?>_shipment_receive" role="tab" aria-controls="content_<?php echo $methodid; ?>_shipment_receive" aria-selected="true">
								Shipment Receive 
							</a>	
						</li>
					
					</ul>
					
					<div class="tab-content">
						<div class="tab_custom_ecc tab-pane fade active show" id="content_<?php echo $methodid; ?>_header" role="tabpanel" aria-labelledby="tab_<?php echo $methodid; ?>_header">
							<div class="row panel_<?php echo $methodid ?>_panel_header">
								<div class="col-xl-12 mb-10 ml-10">
									<form class="ui grid ecc_form" id="form_<?php echo $methodid ?>" action="javascript:post_<?php echo $methodid ?>()" >
										<?php 
											$this->ecc_library->form('hidden','',"form_".$methodid,$this->security->get_csrf_token_name(),$this->security->get_csrf_hash());
											$this->ecc_library->form('hidden','',"form_".$methodid,'fabric_shipment_id','');
											//$this->ecc_library->form('hidden','',"form_".$methodid,'purchase_type_id','');
											//$this->ecc_library->form('hidden','',"form_".$methodid,'this_memo','');
										?>
										
										<div class="row">
											<div class="col-xl-4">
												<?php 
													$this->ecc_library->form('text','Shipment No',"form_".$methodid,'fabric_shipment_no','','','');
													$this->ecc_library->form('date','Shipment Date',"form_".$methodid,'fabric_shipment_date','','','');
													$this->ecc_library->form('text','Shipment Note',"form_".$methodid,'fabric_shipment_note','','','');
												?>
												
											</div>
										</div>
										
										<hr style="margin-right:30px;"/>
										
										
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
									<br/>
									<br/>
									<br/>
								</div>
							</div>
							
						</div>
						
						<div class="tab_custom_ecc tab-pane fade" id="content_<?php echo $methodid; ?>_detail" role="tabpanel" aria-labelledby="tab_<?php echo $methodid; ?>_detail">
							<div class="row panel_<?php echo $methodid ?>_panel_detail">
								<div class="col-xl-12">
									<form class="ui grid ecc_form" id="form_<?php echo $methodid ?>_detail" action="javascript:add_<?php echo $methodid ?>()" enctype="multipart/form-data" method="post">
										<div class="row">
										 <div class="col-xl-12">
										  <div class="row">
										    <div class="col-xl-4">
											   <?php
											     $this->ecc_library->form('hidden','',"form_".$methodid."_detail",$this->security->get_csrf_token_name(),$this->security->get_csrf_hash());
												  $this->ecc_library->form('hidden','',"form_".$methodid."_detail",'fabric_shipment_id','','','');
												  $this->ecc_library->form('hidden','',"form_".$methodid."_detail",'fabric_shipment_detail_id','','','');
												  $this->ecc_library->form2('select_pop','Purchase Order No:',"form_".$methodid."_detail",'purchase_order_warehouse_id','','','data_list_po_warehouse','6');
											   ?>
											 </div>
											 <div class="col-xl-3">
												<?php
													$this->ecc_library->form2('select_pop','Code Fabric:',"form_".$methodid."_detail",'item_fabric_id','','','get_list_item_fabric','6',array('extra_param' => array(0 => array('field' => 'purchase_order_warehouse_id' ))));
												?>
											</div>
											<div class="col-xl-3">
											 <?php
											   $this->ecc_library->form2('text','Invoice No',"form_".$methodid."_detail",'fabric_shipment_detail_invoice_number','','','');
										     ?>
											</div>
										
										   </div>
										 </div>
										 <div class="col-xl-12">
										  <div class="row">
										    <div class="col-xl-4">
											<?php
											  $this->ecc_library->form('select','Unit Weight',"form_".$methodid."_detail",'fabric_shipment_detail_unit_weight','','','uom');
											?>
											</div>
											 <div class="col-xl-3">
											<?php
											  $this->ecc_library->form('select','Unit Quantity',"form_".$methodid."_detail",'fabric_shipment_detail_unit_qty','','','uom');
											?>
											</div>
											  <div class="col-xl-4">
											<?php
											  $this->ecc_library->form2('text','colour',"form_".$methodid."_detail",'fabric_shipment_detail_colour','','','');
											?>
											</div>
										  </div>
										 </div>
										 <div class="col-xl-12">
										  <div class="row">
										    <div class="col-xl-3">
											<?php
											 $this->ecc_library->form2('text','Made In',"form_".$methodid."_detail",'fabric_shipment_detail_made_in','china','','');
											?>
											</div>
											<div class="col-xl-3">
											 <?php
											   $this->ecc_library->form2('text','Note',"form_".$methodid."_detail",'fabric_shipment_detail_note','','','');
										     ?>
											</div>
											 <div class="col-xl-3">
											 <?php
											   $this->ecc_library->form2('text','Bale',"form_".$methodid."_detail",'fabric_shipment_detail_bale','0','','');
										     ?>
											</div>
										  </div>
										 </div>
										 <div class="col-xl-12">
										  <div class="row">
										    <div class="col-xl-4">
											<?php
											  $this->ecc_library->form('file_Excel','File Excel import (*.xlsx/*.xls)',"form_".$methodid."_detail",'fabric_file_excel','','','');
											//  $this->ecc_library->form('file_Excel','File Excel',"form_excel_".$methodid,'excel_karyawan','','','');
											?>
											  <button class="btn btn-copy btn-circle" onclick="template_<?php echo $methodid ?>_detail_shipment()">
                                                 <span class="fa fa-download"></span>Download excel format
                                              </button>
											</div>
																				
										  </div>
										 </div>
										  <div class="col-xl-12">
										     <div class="row">
											   <div class="col-xl-4">
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
										   </div>
										</div>
									</form>
								</div>
							</div>
						   <br />
							<br />
							<div class="row">
								<div class="col-xl-12">
									<?php 
								//	print_r($dashboard_table);
										$extra_param = array('methodid'=> $methodid,'extra_param' => array(0 => array('field' => 'fabric_shipment_id','form_id' => 'form_'. $methodid .'_detail_fabric_shipment_id')));
										$this->ecc_library->jqgrid($methodid."_detail", $dashboard_table['field_detail'], $dashboard_table['field_detail_loaddata'],$extra_param); 
									?>
								</div>
							</div>
						</div>
						
						<div class="tab_custom_ecc tab-pane fade" id="content_<?php echo $methodid; ?>_import_excel_shipment" role="tabpanel" aria-labelledby="tab_<?php echo $methodid; ?>_import_excel_shipment">
							<div class="row panel_<?php echo $methodid ?>_import_excel_shipment">
								<div class="col-xl-12">
								 <form class="ui grid ecc_form" id="form_<?php echo $methodid ?>_import_excel_shipment" action="javascript:add_<?php echo $methodid ?>()" enctype="multipart/form-data" method="post">
								  <div class="row">
								    <div class="col-xl-12">
								      <div class="row">
								         <div class="col-xl-3">
							          		<?php
							          	     $this->ecc_library->form2('select_pop','Detail shipment :',"form_".$methodid."_detailx",'purchase_order_warehouse_idx','','','data_list_po_warehousex','6');
							        		?>
							        	</div>
							          	 <div class="col-xl-3">
							          		<?php
							          		// $this->ecc_library->form('file_Excel','File Excel import (*.xlsx/*.xls)',"form_".$methodid."_detail",'fabric_file_excel','','','');
											
											 $this->ecc_library->form2('select_pop','Item Code',"form_".$methodid."_detail",'item_id','','','get_list_item_barang','4',array('extra_param' => array(0 => array('field' => 'purchase_order_warehouse_id' ),1 => array('field' => 'item_fabric_id' ))));
							          		 ?>
							          		
							          	 </div>
							          	 <div class="col-xl-3">
							          		  <label> &nbsp </label>
							          		  <div class="input-group2">
							          		      <div class="button_<?php echo $methodid ?>_import_shipment_new" >
														<button type="submit" class="btn btn-success">
															<i class="fa fa-plus"></i> Update
														</button>
													</div>
							          		  </div>
							          	</div>
								      </div>
									</div>
								    
								   </div>
								 </form>
								</div>
							</div>
					  </div>
					</div>
				</div>
			</div>
		</div>   
	</div>
</div>

<div class="tab_custom_ecc modal fade" id="modal_fabric_shipment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
       <div class="modal-content">
	     <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Fabric Shipment</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
		  <div class="modal-body">
		  <div class="col-xl-12">
		  <div clss="row">
		    <div class="col-xl-3">
			    <form class="ui grid ecc_form" id="form_<?php echo $methodid ?>_mdl_barcode" action="javascript:generate_barcode_<?php echo $methodid ?>()" >
			       <div class="button_<?php echo $methodid ?>_generate_barcode" >
					  <button type="submit" class="btn btn-success">
					  	<i class="fa fa-plus"></i> Generate Barcode
					  </button>
					</div>
				</form>
			  </div>
		  </div>
		  <br />
		  <form class="ui grid ecc_form" id="form_<?php echo $methodid ?>_mdl_shipment" action="javascript:post_detil_shipment<?php echo $methodid ?>()" >
		  <div class="form_<?php echo $methodid ?>_detail_update">
		   <div class="row">
		    <?php 
			   $this->ecc_library->form('hidden','',"form_".$methodid."_mdl_shipment",$this->security->get_csrf_token_name(),$this->security->get_csrf_hash());
		       $this->ecc_library->form('hidden','Shipment Detail',"form_".$methodid."_mdl_shipment",'fabric_shipment_detail_id','','','');
			   $this->ecc_library->form('hidden','warehouse_PO',"form_".$methodid."_mdl_shipment",'po_warehouse_id','','','');
			   $this->ecc_library->form('hidden','warehouse_PO_detail',"form_".$methodid."_mdl_shipment",'po_detail_id','','','');
			   $this->ecc_library->form('hidden','warehouse_PO_detail',"form_".$methodid."_mdl_shipment",'po_warehouse_detail_id','','','');
		     ?>
			   
			 
		    <div class="col-xl-3">
				<?php
		// $this->ecc_library->form2('select_pop','Detail shipment :',"form_".$methodid."_mdl_shipment",'detil_shipment','','','get_list_detil_shipment','4',array('extra_param' => array(0 => array('field' => 'fabric_shipment_detail_id' ))));
		         $this->ecc_library->form('text','Colour shipment ',"form_".$methodid."_mdl_shipment",'detil_shipment','','','');
			    ?>
			</div>
			<div class="col-xl-3">
			   <?php
				$this->ecc_library->form2('select_pop_shipment','Item Code',"form_".$methodid."_mdl_shipment",'item_id_shipment','','','get_list_item_barang_shipment','4',array('extra_param' => array(0 => array('field' => 'fabric_shipment_detail_id' ))));
			    ?>
			</div>
			 <div class="col-xl-3">
				<label> &nbsp </label> 
				<div class="input-group2">
					<div class="button_<?php echo $methodid ?>_update_detil_shipment" >
					  <button type="submit" class="btn btn-success">
					  	<i class="fa fa-plus"></i> Update
					  </button>
					</div>
				</div>
			</div>
		    </div>
		  </div>
		 </form>
		 
		 <div class="form_<?php echo $methodid ?>_shipment_edit" style="display:none">
			 <form class="ui grid ecc_form" id="form_<?php echo $methodid ?>_mdl_shipment_edit_excel" action="javascript:post_detil_shipment_excel<?php echo $methodid ?>()" >
			 <div class="row">
			  <div class="col-xl-3">
			   <?php
			    $this->ecc_library->form('hidden','',"form_".$methodid."_mdl_shipment_edit_excel",$this->security->get_csrf_token_name(),$this->security->get_csrf_hash());
				$this->ecc_library->form('hidden','Shipment Detail',"form_".$methodid."_mdl_shipment_edit_excel",'shipment_list_id','','','');
				$this->ecc_library->form('hidden','Shipment Detail',"form_".$methodid."_mdl_shipment_edit_excel",'fabric_shipment_detail_id','','','');
				//mdl_shipment_detail
			    ?>
			  </div>
			   <div class="col-xl-12">
				<div class="row">
				   <div class="col-xl-3">
				   <?php
				     $this->ecc_library->form2('text','colour',"form_".$methodid."_mdl_shipment_edit_excel",'list_colour','','','');
				   ?>
				   </div>
				    <div class="col-xl-3">
				   <?php
				     $this->ecc_library->form2('text','Lot',"form_".$methodid."_mdl_shipment_edit_excel",'list_lot','','','');
				   ?>
				   </div>
				    <div class="col-xl-3">
				   <?php
				     $this->ecc_library->form2('text','Bale',"form_".$methodid."_mdl_shipment_edit_excel",'list_bale','','','');
				   ?>
				   </div>
				    <div class="col-xl-3">
				   <?php
				     $this->ecc_library->form2('text','Roll',"form_".$methodid."_mdl_shipment_edit_excel",'list_roll','','','');
				   ?>
				   </div>
			    </div>
			  </div>
			   <div class="col-xl-12">
				<div class="row">
				   <div class="col-xl-3">
				   <?php
				     $this->ecc_library->form2('text','Weight',"form_".$methodid."_mdl_shipment_edit_excel",'list_weight','','','');
				   ?>
				   </div>
				    <div class="col-xl-3">
				   <?php
				     $this->ecc_library->form2('text','Quantity',"form_".$methodid."_mdl_shipment_edit_excel",'list_qty','','','');
				   ?>
				   </div>
				    <div class="col-xl-3">
				   <?php
				    $this->ecc_library->form2('text','Shipment_code',"form_".$methodid."_mdl_shipment_edit_excel",'list_Shipment_code','','','');
				   ?>
				   </div>
				    <div class="col-xl-3">
				   <?php
				      $this->ecc_library->form2('text','Note',"form_".$methodid."_mdl_shipment_edit_excel",'list_note','','','');
				   ?>
				   </div>
			    </div>
			  </div>
			   <div class="col-xl-12">
				<div class="row">
				  <div class="col-xl-3">
				   <?php
				   // $this->ecc_library->form2('text','Item_code',"form_".$methodid."_mdl_shipment_edit_excel",'list_item_code','','','');
					$this->ecc_library->form2('select_pop','Item Code ECC',"form_".$methodid."_mdl_shipment_edit_excel",'list_item_code','','','get_list_item_barang_shipment','4',array('extra_param' => array(0 => array('field' => 'fabric_shipment_detail_id' ))));
				   ?>
				   </div>
			      <div class="col-xl-3">
			    <label> &nbsp </label>
			  	<div class="input-group2">
			    <button type="submit" class="btn btn-success">
						<i class="fa fa-check"></i> SAVE
				</button>
			    <a class="btn btn-danger" onclick="javascript:cancel_detail_excel_<?php echo $methodid ?>()">
					<i class="fa fa-times"></i> CANCEL
				</a>
				 </div>
				 </div>
				 </div>
			  </div>
			  </div>
			  </form>
			
		 </div>
		 
		  </div>
		<!--   <div class="row">
		    <div class="col-xl-12">
			    <table id="table_<?php //echo $methodid ?>_mdl_shipment_detail"></table>
	            <div id="ptable_<?php //echo $methodid ?>_mdl_shipment_detail"></div>   
		       <?php
		       // $extra_param = array('methodid'=> $methodid,'extra_param' => array(0 => array('field' => 'fabric_shipment_detail_id','form_id' => 'form_'. $methodid .'_mdl_shipment_fabric_shipment_detail_id')));
			   //  $this->ecc_library->jqgrid($methodid."_mdl_shipment", $dashboard_table['field_detail_list'], $dashboard_table['field_detail_loaddata_list'],$extra_param); 
		       ?>
		    </div>
		   </div> -->
			<br /><br />
		  <div class="row">
			<div class="col-xl-12">
			 <?php 
				//	print_r($dashboard_table);
				$extra_param = array('methodid'=> $methodid,'extra_param' => array(0 => array('field' => 'fabric_shipment_detail_id','form_id' => 'form_'. $methodid .'_mdl_shipment_fabric_shipment_detail_id')));
				$this->ecc_library->jqgrid($methodid."_mdl_detail", $dashboard_table['field_detail_list'], $dashboard_table['field_detail_loaddata_list'],$extra_param); 
			?>
			</div>
		   </div>
		   <!-- <div class="col-xl-12">
                 <table id="table_<?php //echo $methodid ?>_report_absen_keterangan"></table>
                 <div id="ptable_<?php //echo $methodid ?>_report_absen_keterangan"></div>                                                     
           </div> -->
		  </div>
	   </div>
	</div>
</div>

<script type="text/javascript">
   //  $('#form_<?php echo $methodid ?>_fabric_code').on('change', function(){
	//	   const  item_id= $("#form_<?php echo $methodid ?>_fabric_code").val();
	//		//alert('value '+ item_id); 
	//		 $("#form_<?php echo $methodid ?>_item_info").val('old');
	//	     $("#form_new_fabric").hide();
	//		
	//	//	 $("#form_goup_button").show();
	//		
	//		//$("p").html("nilai yang di pilih adalah " + style); 
	//		if (item_id == -99){
	//		//	alert('value '+ style); 
	//			  $("#form_new_fabric").show()
	//			  $("#form_<?php echo $methodid ?>_item_info").val('new');
	//		//	  $("#form_goup_button").hide();
	//		}
   //    });
		
//	 $('#form_<?php echo $methodid ?>_detail_purchase_order_warehouse_id').on('change', function(){
//		
//	     const  po_id= $("#form_<?php echo $methodid ?>_detail_purchase_order_warehouse_id").val();
//		  // alert(po_id);
//	       if (po_id != -99){
//	          $("#form_<?php echo $methodid ?>_detail_purchase_order_ecc_id").val(po_id);
//	        }
//     });
   
  </script> 