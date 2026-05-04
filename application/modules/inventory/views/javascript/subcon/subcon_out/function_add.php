<script type="text/javascript">  
	function nav_button_<?php echo $function ?>(){
		new_subcon_out = 1;
		subcon_out_id = 0;
		subcon_out_lock_data = 0;
		subcon_out_open_form = 1;
		
		$('.form_title_<?php echo $methodid ?>').html('New <?php echo $page_title ?>');
		
		page_loading("show",'New <?php echo $page_title ?>','Please Wait...');
		
		$("#tab_<?php echo $methodid; ?>_detail").removeAttr("data-toggle");
		$("#tab_<?php echo $methodid; ?>_detail").addClass( "tab_disabled");
		
		$('#panel_content_<?php echo $methodid ?>').hide();
		$('#panel_content_form_<?php echo $methodid ?>').show();
		
		$('#form_<?php echo $methodid ?>_subcon_out_id').val('');
		getnexttransno(48, 'form_<?php echo $methodid ?>_subcon_out_no');
		$('#form_<?php echo $methodid ?>_subcon_out_date').val('<?php echo date('Y-m-d') ?>');
		$('#form_<?php echo $methodid ?>_subcon_out_memo').val('');
		
		$('#form_<?php echo $methodid ?>_detail_subcon_out_id').val('');
		$('#form_<?php echo $methodid ?>_detail_subcon_out_detail_id').val('');
		$('#form_<?php echo $methodid ?>_detail_quantity_subcon').val(0);
		$('#form_<?php echo $methodid ?>_detail_conversion').val(1);
		$('#form_<?php echo $methodid ?>_detail_unit_price').val(0);
		$('#form_<?php echo $methodid ?>_detail_subcon_price').val(0);
				
		$('.button_<?php echo $methodid ?>_detail_edit').hide();
		$('.button_<?php echo $methodid ?>_detail_new').show();
		
		$('.panel_<?php echo $methodid ?>_panel_detail').show();
		$('.panel_<?php echo $methodid ?>_panel_receiver').hide();
		$("#table_<?php echo $methodid ?>_detail").trigger('reloadGrid');
		
		// change_mat_item(-1);
		
		setTimeout(function(){ 
			subcon_out_get_purchase_data();
			change_form_<?php echo $methodid ?>_contract_subcon_id(-1);
			$('.tab_scrollbar').getNiceScroll().resize(); 
		}, 100);
	}
</script>