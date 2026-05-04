<script type="text/javascript">  
   function nav_button_<?php echo $function ?>()
	{
		var id = jQuery("#table_<?php echo $methodid ?>").jqGrid('getGridParam','selrow');
		if (id) { 
	     
		var row = jQuery("#table_<?php echo $methodid ?>").jqGrid('getRowData',id);  
		
		 $('.form_title_<?php echo $methodid ?>').html('Monitoring <?php echo $page_title ?>');
		 
		   $("#table_<?php echo $methodid ?>_monitor_request").jqGrid('setGridParam',{
			   postData: {
			           	'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
			           	 work_order_plan_id:row.r1
			           } 
		    });
			
		$("#table_<?php echo $methodid ?>_monitor_transfer").jqGrid('setGridParam',{
			   postData: {
			           	'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
			           	 work_order_plan_id:row.r1
			           } 
		    });
			
		$("#table_<?php echo $methodid ?>_monitor_production").jqGrid('setGridParam',{
			   postData: {
			           	'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
			           	 work_order_plan_id:row.r1
			           } 
		 });
		 
		 $("#table_<?php echo $methodid ?>_monitor_scrap").jqGrid('setGridParam',{
			   postData: {
			           	'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
			           	 work_order_plan_id:row.r1
			           } 
		 });
		 
		  $("#table_<?php echo $methodid ?>_monitor_return").jqGrid('setGridParam',{
			   postData: {
			           	'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
			           	 work_order_plan_id:row.r1
			           } 
		 });
	
		
		$("#tab_<?php echo $methodid; ?>_production_request").click();
		
		$('#panel_content_<?php echo $methodid ?>').hide();
		$('#panel_content_form_<?php echo $methodid ?>').hide();
		$('#panel_content_form_<?php echo $methodid ?>_monitoring').show();
		
	
		  $("#table_<?php echo $methodid ?>_monitor_request").trigger('reloadGrid');
		  $("#table_<?php echo $methodid ?>_monitor_request").setGridWidth($('.grid_container_<?php echo $methodid; ?>_monitor_request').width() - 20,true).trigger('resize');
		  
		  $("#table_<?php echo $methodid ?>_monitor_transfer").trigger('reloadGrid');
		  $("#table_<?php echo $methodid ?>_monitor_production").trigger('reloadGrid');
		  $("#table_<?php echo $methodid ?>_monitor_scrap").trigger('reloadGrid');
		  $("#table_<?php echo $methodid ?>_monitor_return").trigger('reloadGrid');
	

		} else {
			show_error("show",'Error','Please select row');
		};	  
	} 
   
</script>