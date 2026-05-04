<script type="text/javascript">  
	function nav_button_<?php echo $function ?>(){
		var id = jQuery("#table_<?php echo $methodid ?>").jqGrid('getGridParam','selrow');
		if (id) { 
		var row = jQuery("#table_<?php echo $methodid ?>").jqGrid('getRowData',id);  
			$('#mdl_logsceisa_<?php echo $methodid ?>').modal();

		} else {
			show_error("show",'Error','Please select row');
		}
	}
</script>