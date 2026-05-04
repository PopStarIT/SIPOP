<script type="text/javascript">  
	function nav_button_<?php echo $function ?>(){
		new_delivery = 1;
		delivery_lock_data = 0;
		delivery_type_id = 2;
		
		$('.form_title_<?php echo $methodid ?>').html('New <?php echo $page_title ?>');
		
		page_loading("show",'New <?php echo $page_title ?>','Please Wait...');
		
		$("#tab_<?php echo $methodid; ?>_detail").removeAttr("data-toggle");
		$("#tab_<?php echo $methodid; ?>_detail").addClass( "tab_disabled");
		
		$('#panel_content_<?php echo $methodid ?>').hide();
		$('#panel_content_form_<?php echo $methodid ?>').show();
		
		$('#form_<?php echo $methodid ?>_bc_out_header_id').html('');
		$('#form_<?php echo $methodid ?>_bc_out_header_id').selectpicker('refresh');
		
		$('#form_<?php echo $methodid ?>_sales_order_transfer_id').html('');
		$('#form_<?php echo $methodid ?>_sales_order_transfer_id').selectpicker('refresh');
		
		$('#form_<?php echo $methodid ?>_subcon_out_id').html('');
		$('#form_<?php echo $methodid ?>_subcon_out_id').selectpicker('refresh');
		
		$('#form_<?php echo $methodid ?>_delivery_id').val('');
		$('#form_<?php echo $methodid ?>_delivery_type_id').val(delivery_type_id);
		getnexttransno(39, 'form_<?php echo $methodid ?>_delivery_no');
		$('#form_<?php echo $methodid ?>_delivery_date').val('<?php echo date('Y-m-d') ?>');
		
		$('.select_<?php echo $methodid ?>_from_sales').hide();
		$('.select_<?php echo $methodid ?>_from_custom').show();
		$('.select_<?php echo $methodid ?>_from_contract').hide();
		$('.panel_<?php echo $methodid ?>_from_sales').hide();
		$('.panel_<?php echo $methodid ?>_from_custom').show();
		$('.panel_<?php echo $methodid ?>_from_contract').hide();
		
		setTimeout(function(){ 
			$('.tab_scrollbar').getNiceScroll().resize(); 
		}, 100);
	}
</script>