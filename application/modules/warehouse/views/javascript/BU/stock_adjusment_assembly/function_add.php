<script type="text/javascript">  
	function nav_button_<?php echo $function ?>(){
		new_stock_adjusment_assembly = 1;
		stock_adjusment_assembly_id = 0;
		
		$('.form_title_<?php echo $methodid ?>').html('New <?php echo $page_title ?>');
		page_loading("show",'New <?php echo $page_title ?>','Please Wait...');
		
		$("#tab_<?php echo $methodid; ?>_detail").removeAttr("data-toggle");
		$("#tab_<?php echo $methodid; ?>_detail").addClass( "tab_disabled");
		
		$('#panel_content_<?php echo $methodid ?>').hide();
		$('#panel_content_form_<?php echo $methodid ?>').show();
		
		$('#form_<?php echo $methodid ?>_stock_adjusment_assembly_id').val('');		
		getnexttransno(77, 'form_<?php echo $methodid ?>_stock_adjusment_assembly_no');
		$('#form_<?php echo $methodid ?>_stock_adjusment_assembly_date').val('<?php echo date('Y-m-d') ?>');
		$('#form_<?php echo $methodid ?>_stock_adjusment_assembly_memo').val('');
		
		$('#form_<?php echo $methodid ?>_detail_stock_adjusment_assembly_id').val('');
		$('#form_<?php echo $methodid ?>_detail_stock_adjusment_assembly_detail_id').val('');
		$('#form_<?php echo $methodid ?>_detail_quantity_valid').val(0);
		
		
		$('.button_<?php echo $methodid ?>_detail_edit').hide();
		$('.button_<?php echo $methodid ?>_detail_new').show();
		
		$("#table_<?php echo $methodid ?>_detail").trigger('reloadGrid');
		
		setTimeout(function(){
			change_form_<?php echo $methodid ?>_work_process_id();
			$('.tab_scrollbar').getNiceScroll().resize(); 
		}, 100);
	}
</script>