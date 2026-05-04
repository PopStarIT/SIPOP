<script type="text/javascript">  
	function nav_button_<?php echo $function ?>(){
		new_work_order_plan = 1;
		work_order_plan_id = 1;
		
		$('.form_title_<?php echo $methodid ?>').html('New <?php echo $page_title ?>');
		
		page_loading("show",'New <?php echo $page_title ?>','Please Wait...');
		
		$("#tab_<?php echo $methodid; ?>_detail").removeAttr("data-toggle");
		$("#tab_<?php echo $methodid; ?>_detail").addClass( "tab_disabled");
		
		$("#tab_<?php echo $methodid; ?>_material").removeAttr("data-toggle");
		$("#tab_<?php echo $methodid; ?>_material").addClass( "tab_disabled");
		
		$("#tab_<?php echo $methodid; ?>_forecast").removeAttr("data-toggle");
		$("#tab_<?php echo $methodid; ?>_forecast").addClass( "tab_disabled");
		
		$("#tab_<?php echo $methodid; ?>_header").click();
		
		$('#panel_content_<?php echo $methodid ?>').hide();
		$('#panel_content_form_<?php echo $methodid ?>').show();
		
		$('#form_<?php echo $methodid ?>_work_order_plan_id').val('');
		getnexttransno(20, 'form_<?php echo $methodid ?>_work_order_plan_no');
		$('#form_<?php echo $methodid ?>_work_order_plan_date').val('<?php echo date('Y-m-d') ?>');
		$('#form_<?php echo $methodid ?>_work_order_required_date').val('<?php echo date('Y-m-d') ?>');
		
		$('#form_<?php echo $methodid ?>_detail_work_order_plan_id').val('');
		$('#form_<?php echo $methodid ?>_detail_work_order_id').val('');
		$('#form_<?php echo $methodid ?>_detail_quantity_plan').val(0);
		
		$("#table_<?php echo $methodid ?>_detail").trigger('reloadGrid');
		
		$('.button_<?php echo $methodid ?>_detail_edit').hide();
		$('.button_<?php echo $methodid ?>_detail_new').show();
		
		setTimeout(function(){ 
			//change_form_<?php echo $methodid ?>_detail_bom_process_id(-1);
			$('.tab_scrollbar').getNiceScroll().resize(); 
		}, 500);
	}
</script>