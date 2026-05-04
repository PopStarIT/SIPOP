<script type="text/javascript">  
	function nav_button_<?php echo $function ?>(){
		new_grn = 1;
		grn_lock_data = 0;
		grn_type_id = 2;
		grn_warehouse_type_id = 4;
		
		$('.form_title_<?php echo $methodid ?>').html('New <?php echo $page_title ?>');
		
		page_loading("show",'New <?php echo $page_title ?>','Please Wait...');
		
		$("#tab_<?php echo $methodid; ?>_detail_scan").removeAttr("data-toggle");
		$("#tab_<?php echo $methodid; ?>_detail_scan").addClass( "tab_disabled");
		
		$('#panel_content_<?php echo $methodid ?>').hide();
		$('#panel_content_form_<?php echo $methodid ?>').show();
		
		//$('#form_<?php echo $methodid ?>_bc_in_header_id').html('');
		//$('#form_<?php echo $methodid ?>_bc_in_header_id').selectpicker('refresh');
		//
		//$('#form_<?php echo $methodid ?>_purchase_order_id').html('');
		//$('#form_<?php echo $methodid ?>_purchase_order_id').selectpicker('refresh');
		//
		//$('#form_<?php echo $methodid ?>_grn_id').val('');
		//$('#form_<?php echo $methodid ?>_grn_type_id').val(grn_type_id);
		$('#form_<?php echo $methodid ?>_fabric_warehouse_receive_type_id').val(grn_warehouse_type_id);
		
        getnexttransno(506, 'form_<?php echo $methodid ?>_fabric_warehouse_receive_no');
		$('#form_<?php echo $methodid ?>_fabric_warehouse_receive_date').val('<?php echo date('Y-m-d') ?>');
		$('#form_<?php echo $methodid ?>_fabric_warehouse_receive_id').val(null);
		//.val('<?php echo date('Y-m-d') ?>');
							
		$('.button_<?php echo $methodid ?>_detail_edit').hide();
		$('.button_<?php echo $methodid ?>_detail_new').show();
		
		$('.panel_<?php echo $methodid ?>_panel_detail').show();
				
		$('.select_<?php echo $methodid ?>_from_shipment').show();
		$('.select_<?php echo $methodid ?>_from_custom').show();
		
		$("#table_<?php echo $methodid ?>_detail").trigger('reloadGrid');
		
	//	getnexttransno(10, 'form_<?php echo $methodid ?>_grn_no');
	//	$('#form_<?php echo $methodid ?>_grn_date').val('<?php echo date('Y-m-d') ?>');
	//	$('#form_<?php echo $methodid ?>_delivery_no').val('');
	//	$('#form_<?php echo $methodid ?>_delivery_date').val('');
	//	
	//	$('.select_<?php echo $methodid ?>_from_shipment').show();
	//	$('.select_<?php echo $methodid ?>_from_custom').show();
	//	$('.select_<?php echo $methodid ?>_from_purchase').hide();
	//			
	//	$('.panel_<?php echo $methodid ?>_from_purchase').hide();
	//	$('.panel_<?php echo $methodid ?>_from_custom').hide();
		
		setTimeout(function(){ 
			$('.tab_scrollbar').getNiceScroll().resize(); 
		}, 100);
	}
</script>