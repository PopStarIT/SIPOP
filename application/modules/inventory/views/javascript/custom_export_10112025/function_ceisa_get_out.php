<script type="text/javascript"> 
	
	function nav_button_<?php echo $function ?>()
	{	
		$('#modal_<?php echo $methodid ?>_data_ceisa').modal();
		
		setTimeout(function(){ 
			$('.tab_scrollbar').getNiceScroll().resize(); 
			$("#table_<?php echo $methodid ?>_header").trigger("reloadGrid"); 
			var form_data = {
				//'q':'1','tipe':'1','date_start':'<?php echo date("Y-m-d", strtotime( date( "Y-m-d", strtotime( date("Y-m-d") ) ) . "-1 month" ) ) ?>','date_end':'<?php echo date("Y-m-d") ?>','<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>'				
				'q':'1','tipe':'<?php  echo $KODE_DOKUMEN_PABEAN; ?>','date_start':$('#form_<?php echo $methodid ?>_date_start').val(),'date_end':$('#form_<?php echo $methodid ?>_date_end').val(),'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>'	
			}	
			
			$.post(baseurl+'<?php echo $class_uri ?>/cek_count_ceisa',
			form_data
			,
			function(data, status){
				$("#info_ceisa_<?php echo $methodid ?>").html(data);
				
			});
			 
		}, 100);
	}
</script>