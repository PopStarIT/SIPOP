<script type="text/javascript">  
	function nav_button_<?php echo $function ?>(){
		new_work_order_request = 1;
				
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
		
		$('#form_<?php echo $methodid ?>_work_order_request_id').val('');
		getnexttransno(21, 'form_<?php echo $methodid ?>_work_order_request_no');
		$('#form_<?php echo $methodid ?>_work_order_request_date').val('<?php echo date('Y-m-d') ?>');
		$('#form_<?php echo $methodid ?>_work_order_request_info').val('');
		
		$('#form_<?php echo $methodid ?>_detail_work_order_request_id').val('');
		$('#form_<?php echo $methodid ?>_detail_work_order_request_detail_id').val('');
		$('#form_<?php echo $methodid ?>_detail_quantity_work_order_request').val(0);
		
		$('.button_<?php echo $methodid ?>_detail_edit').hide();
		$('.button_<?php echo $methodid ?>_detail_new').show();
		
		setTimeout(function(){ 
			$('.tab_scrollbar').getNiceScroll().resize(); 
		}, 500);
	}
</script>