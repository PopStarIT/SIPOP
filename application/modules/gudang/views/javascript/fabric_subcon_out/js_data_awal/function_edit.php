<script type="text/javascript">  
	function nav_button_<?php echo $function ?>()
	{	
		var id = jQuery("#table_<?php echo $methodid ?>").jqGrid('getGridParam','selrow');
		if (id) { 
			var row = jQuery("#table_<?php echo $methodid ?>").jqGrid('getRowData',id);   

			$('#panel_content_<?php echo $methodid ?>').hide();
			$('#panel_content_form_<?php echo $methodid ?>').show();
			
			//$("#tab_<?php //echo $methodid; ?>_supply").removeAttr("data-toggle");
		    //$("#tab_<?php //echo $methodid; ?>_supply").addClass("tab_disabled");
			
			$('.form_title_<?php echo $methodid ?>').html('Edit <?php echo $page_title ?>');
			
			edit_<?php echo $methodid?>(row.r1);
			supply_<?php echo $methodid?>(row.r1);
			
		} else {
			show_error("show",'Error','Please select row');
		}
		
		setTimeout(function(){ 
			$('.tab_scrollbar').getNiceScroll().resize(); 
		}, 100);
	}
</script>