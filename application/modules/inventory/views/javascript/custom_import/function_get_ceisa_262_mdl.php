<script type="text/javascript"> 
	
	function nav_button_<?php echo $function ?>()
	{	
		$('#modal262_<?php echo $methodid ?>_data_ceisa').modal();
		
		setTimeout(function(){ 
			$('.tab_scrollbar').getNiceScroll().resize(); 
			$("#table_<?php echo $methodid ?>_header262").trigger("reloadGrid"); 
			var form_data = {
				'q':'1','tipe':'<?php  echo $KODE_DOKUMEN_PABEAN; ?>','_date_start_262':$('#form_<?php echo $methodid ?>_date_start_262').val(),'_date_end_262':$('#form_<?php echo $methodid ?>_date_end_262').val(),'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>'	
			}	
			
			$.post(baseurl+'<?php echo $class_uri ?>/cek_count_ceisa_262',
			form_data
			,
			function(data, status){
				$("#info_ceisa_262<?php echo $methodid ?>").html(data);
				
			});
			 
		}, 100);
	}
</script>