<script type="text/javascript">  
	function nav_button_<?php echo $function ?>(){
		//new_purchase_order = 1;
		//purchase_order_id = 0;
		//purchase_type_id = 1;
		//purchase_order_this_memo = 0;
		//purchase_order_lock_data = 0;
		//purchase_order_open_form = 1;
		
		new_receive = 1;
		fabric_receive_id = 0;
		grn_warehouse_type_id = 2;
				
		//alert(<?php echo $methodid ?>);
		
		$('.form_title_<?php echo $methodid ?>').html('New <?php echo $page_title ?>');
		
		page_loading("show",'New <?php echo $page_title ?>','Please Wait...');
		
		//$("#tab_<?php echo $methodid; ?>_detail").removeAttr("data-toggle");
		//$("#tab_<?php echo $methodid; ?>_detail").addClass( "tab_disabled");
		
		$("#tab_<?php echo $methodid; ?>_detail_scan").removeAttr("data-toggle");
		$("#tab_<?php echo $methodid; ?>_detail_scan").addClass( "tab_disabled");
		
		$('#panel_content_<?php echo $methodid ?>').hide();
		$('#panel_content_form_<?php echo $methodid ?>').show();
		
		$('#form_<?php echo $methodid ?>_fabric_warehouse_receive_type_id').val(grn_warehouse_type_id);
				
		getnexttransno(506, 'form_<?php echo $methodid ?>_fabric_warehouse_receive_no');
		$('#form_<?php echo $methodid ?>_fabric_warehouse_receive_date').val('<?php echo date('Y-m-d') ?>');
		$('#form_<?php echo $methodid ?>_fabric_warehouse_receive_id').val(null);
		//$('#form_<?php echo $methodid ?>_bc_in_header_id').val(null);
		//$('#form_<?php echo $methodid ?>_warehouse_id').val(null);
		$('#form_<?php echo $methodid ?>_fabric_shipment_id').val(null);
		//.val('<?php echo date('Y-m-d') ?>');
							
		$('.button_<?php echo $methodid ?>_detail_edit').hide();
		$('.button_<?php echo $methodid ?>_detail_new').show();
		
		$('.panel_<?php echo $methodid ?>_panel_detail').show();
		//$('.panel_<?php echo $methodid ?>_panel_purchase_request').hide();
		
		$('.select_<?php echo $methodid ?>_from_shipment').hide();
		$('.select_<?php echo $methodid ?>_from_custom').show();
		
	//	$('.panel_<?php echo $methodid ?>_form_proforma').hide();
	//	$('.panel_<?php echo $methodid ?>_panel_header').show();
	//	$('.panel_<?php echo $methodid ?>_proforma_invoice').hide();
		$("#table_<?php echo $methodid ?>_detail").trigger('reloadGrid');
		
		// change_mat_item(-1);
		
		setTimeout(function(){ 
			//purchase_order_get_purchase_data();
			$('.tab_scrollbar').getNiceScroll().resize(); 
		}, 100);
	}
</script>