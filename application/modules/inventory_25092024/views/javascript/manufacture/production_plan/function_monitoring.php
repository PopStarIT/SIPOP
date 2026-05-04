<script type="text/javascript">  
   function nav_button_<?php echo $function ?>()
	{
		var id = jQuery("#table_<?php echo $methodid ?>").jqGrid('getGridParam','selrow');
		if (id) { 
	
			var row = jQuery("#table_<?php echo $methodid ?>").jqGrid('getRowData',id);  
	   // alert(id + ' dan ' + row.r2);
		//	$('#panel_content_<?php echo $methodid ?>').hide();
		//	$('#panel_content_form_<?php echo $methodid ?>').show();
		//	
		//	$('.form_title_<?php echo $methodid ?>').html('Edit <?php echo $page_title ?>');

			//edit_<?php echo $methodid?>(row.r1);
			$('#mdl_monitoring').modal('show');
			

		} else {
			show_error("show",'Error','Please select row');
		};	  
	} 
   
</script>