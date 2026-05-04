<script type="text/javascript">  
	function nav_button_<?php echo $function ?>(){
		var grid_data_<?php echo $methodid ?> = $('#table_<?php echo $methodid ?>').getGridParam('postData');
		
		var url = baseurl+'<?php echo $class_uri ?>/print_grid';
		
		window.open(url,'_blank');
		return false;
		// $.ajax({
			// type: "POST",
			// url:baseurl + '<?php echo $class_uri ?>/download_excel',
			// data: grid_data_<?php echo $methodid ?>,
			// dataType : 'html',
			// success: function(msg){
				// var w_<?php echo $methodid ?> = window.open('about:blank');
				// w_<?php echo $methodid ?>.document.open();
				// w_<?php echo $methodid ?>.document.write(data);
				// w_<?php echo $methodid ?>.document.close();
			// }
		// }) ; 
	}
</script>