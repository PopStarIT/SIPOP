<script type="text/javascript">  
	function nav_button_<?php echo $function ?>(){
		new_warehouse_return = 1;
		warehouse_return_plan_id = 0;
		warehouse_return_work_process_id = 0;
		warehouse_return_id = 0;
		
		page_loading("show",'New <?php echo $page_title ?>','Please Wait...');		
		$('.form_title_<?php echo $methodid ?>').html('New <?php echo $page_title ?>');
		
		$("#tab_<?php echo $methodid; ?>_detail").removeAttr("data-toggle");
		$("#tab_<?php echo $methodid; ?>_detail").addClass( "tab_disabled");
		
		$("#tab_<?php echo $methodid; ?>_supply").removeAttr("data-toggle");
		$("#tab_<?php echo $methodid; ?>_supply").addClass( "tab_disabled");
		
		$("#tab_<?php echo $methodid; ?>_header").attr("data-toggle","tab");
		$("#tab_<?php echo $methodid; ?>_header").removeClass( "tab_disabled");
		$("#tab_<?php echo $methodid; ?>_header").click();
		
		$('#panel_content_<?php echo $methodid ?>').hide();
		$('#panel_content_form_<?php echo $methodid ?>').show();
		
		$('#form_<?php echo $methodid ?>_warehouse_return_id').val('');
		getnexttransno(80, 'form_<?php echo $methodid ?>_warehouse_return_no');
		$('#form_<?php echo $methodid ?>_warehouse_return_date').val('<?php echo date('Y-m-d') ?>');
		
		$('#form_<?php echo $methodid ?>_detail_warehouse_return_id').val('');
				
		setTimeout(function(){
			$('.tab_scrollbar').getNiceScroll().resize(); 
		}, 500);
	}
</script>