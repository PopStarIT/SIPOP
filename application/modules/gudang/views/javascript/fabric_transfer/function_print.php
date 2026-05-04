<script type="text/javascript">  
function nav_button_<?php echo $function ?>(){
   var id = jQuery("#table_<?php echo $methodid ?>").jqGrid('getGridParam','selrow');
		if (id) { 
			var row = jQuery("#table_<?php echo $methodid ?>").jqGrid('getRowData',id);
		    var fabric_transfer_id = row.r1;
		   window.open(baseurl + '<?php echo $class_uri ?>/print_fabric_transfer?' + 'fabric_transfer_id=' + fabric_transfer_id, '_BLANK');
		} else {
			show_error("show",'Error','Please select row');
		}
	}
</script>