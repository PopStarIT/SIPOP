<script type="text/javascript">  
	function nav_button_<?php echo $function ?>(){
		new_purchase_order = 1;
		purchase_order_id = 0;
		purchase_type_id = 1;
		purchase_order_this_memo = 0;
		purchase_order_lock_data = 0;
		purchase_order_open_form = 1;
		
		let group_user = '<?php echo $this->session->userdata("user_group") ?>';
		
		$('.form_title_<?php echo $methodid ?>').html('.:: New <?php echo $page_title ?> ::.');
		
		page_loading("show",'New <?php echo $page_title ?>','Please Wait...');
		
		$("#tab_<?php echo $methodid; ?>_detail").removeAttr("data-toggle");
		$("#tab_<?php echo $methodid; ?>_detail").addClass( "tab_disabled");
		
		$('#panel_content_<?php echo $methodid ?>').hide();
		$('#panel_content_form_<?php echo $methodid ?>').show();
		
		
		$('#form_<?php echo $methodid ?>_purchase_order_id').val('');
		$('#form_<?php echo $methodid ?>_purchase_type_id').val(purchase_type_id);
		$('#form_<?php echo $methodid ?>_this_memo').val(purchase_order_this_memo);
		if(group_user == 5){
			 getnexttransno_fabric(510, 'form_<?php echo $methodid ?>_purchase_order_no');
		} else {
		  getnexttransno(2, 'form_<?php echo $methodid ?>_purchase_order_no');
		}
		$('#form_<?php echo $methodid ?>_purchase_order_date').val('<?php echo date('Y-m-d') ?>');
		$('#form_<?php echo $methodid ?>_purchase_order_memo').val('');
		$('#form_<?php echo $methodid ?>_payment_term').val('0 DAYS');
		$('#form_<?php echo $methodid ?>_ppn').val(0);
		
		
		$('#form_<?php echo $methodid ?>_detail_purchase_order_id').val('');
		$('#form_<?php echo $methodid ?>_detail_purchase_order_detail_id').val('');
		$('#form_<?php echo $methodid ?>_detail_quantity_ordered').val(0);
		$('#form_<?php echo $methodid ?>_detail_conversion').val(1);
		$('#form_<?php echo $methodid ?>_detail_unit_price').val(1);
		
		
		//change_form_<?php echo $methodid ?>_fabric_code(data[0].item_fabric_id);
		$('#form_<?php echo $methodid ?>_fabric_weight').val(0);
		//change_form_<?php echo $methodid ?>_unit_weight(data[0].unit_weight);
		$('#form_<?php echo $methodid ?>_fabric_width').val(0);
		//change_form_<?php echo $methodid ?>_unit_width(data[0].unit_width);
		$('#form_<?php echo $methodid ?>_shipping_sample').val('');
		$('#form_<?php echo $methodid ?>_requested_ETD').val('');
		$('#form_<?php echo $methodid ?>_other_instructions').val('');
		$('#form_<?php echo $methodid ?>_packing_instructions').val('');
		
				
		$('.button_<?php echo $methodid ?>_detail_edit').hide();
		$('.button_<?php echo $methodid ?>_detail_new').show();
		
		$('.panel_<?php echo $methodid ?>_panel_detail').show();
		$('.panel_<?php echo $methodid ?>_panel_purchase_request').hide();
		
		$('.panel_<?php echo $methodid ?>_form_proforma').hide();
		$('.panel_<?php echo $methodid ?>_panel_header').show();
	//	$('.panel_<?php echo $methodid ?>_proforma_invoice').hide();
		$("#table_<?php echo $methodid ?>_detail").trigger('reloadGrid');
		
		// change_mat_item(-1);
		
		setTimeout(function(){ 
			purchase_order_get_purchase_data();
			$('.tab_scrollbar').getNiceScroll().resize(); 
		}, 100);
	}
</script>