<script type="text/javascript">  
	function nav_button_<?php echo $function ?>(){
		work_order_request_id = $('#form_<?php echo $methodid ?>_work_order_request_id').val();
				
		page_loading("show",'New <?php echo $page_title ?>','Please Wait...');		
		$('.form_title_<?php echo $methodid ?>').html('New <?php echo $page_title ?>');
		
		$("#tab_<?php echo $methodid; ?>_supply").removeAttr("data-toggle");
		$("#tab_<?php echo $methodid; ?>_supply").addClass( "tab_disabled");
		
		$("#tab_<?php echo $methodid; ?>_header").attr("data-toggle","tab");
		$("#tab_<?php echo $methodid; ?>_header").removeClass( "tab_disabled");
		$("#tab_<?php echo $methodid; ?>_header").click();
		
		$('#panel_content_<?php echo $methodid ?>').hide();
		$('#panel_content_form_<?php echo $methodid ?>').show();
		
		
		$('#form_<?php echo $methodid ?>_work_order_transfer_id').val('');
		getnexttransno(22, 'form_<?php echo $methodid ?>_work_order_transfer_no');
		$('#form_<?php echo $methodid ?>_work_order_transfer_date').val('<?php echo date('Y-m-d') ?>');
				
		new_work_order_transfer = 1;
				
		$('#form_<?php echo $methodid ?>_work_order_request_id').html('');
		$('#form_<?php echo $methodid ?>_work_order_request_id').selectpicker('refresh');
		change_form_<?php echo $methodid ?>_work_order_request_id();
				
		
		// change_mat_item(-1);
		
		setTimeout(function(){ 
			$("#table_<?php echo $methodid ?>_detail").trigger('reloadGrid');
			$("#table_<?php echo $methodid ?>_detail").setGridWidth($('.grid_container_<?php echo $methodid; ?>_detail').width() - 20,true).trigger('resize');
			
			$('.tab_scrollbar').getNiceScroll().resize(); 
		}, 500);
	}
</script>