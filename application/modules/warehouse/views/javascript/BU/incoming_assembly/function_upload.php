<script type="text/javascript"> 
	
	function nav_button_<?php echo $function ?>()
	{	
		$('#modal_<?php echo $methodid ?>_upload').modal();
		setTimeout(function(){ 
			$('.tab_scrollbar').getNiceScroll().resize(); 
		}, 100);
	}
</script>