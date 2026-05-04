<script type="text/javascript"> 
	
	setTimeout(function(){ 
		$("#table_<?php echo $methodid ?>_asset").trigger('reloadGrid');
		$("#table_<?php echo $methodid ?>_asset").setGridWidth($('.grid_container_<?php echo $methodid; ?>_asset').width() - 20,true).trigger('resize');
	}, 1000);
	
	$(".form_tab_<?php echo $methodid ?>").on("click", "a", function (e) {
        e.preventDefault();
		setTimeout(function(){ 
			$("#table_<?php echo $methodid ?>_asset").trigger('reloadGrid');
			$("#table_<?php echo $methodid ?>_asset").setGridWidth($('.grid_container_<?php echo $methodid; ?>_asset').width() - 20,true).trigger('resize');
			
			$("#table_<?php echo $methodid ?>_incoming").trigger('reloadGrid');
			$("#table_<?php echo $methodid ?>_incoming").setGridWidth($('.grid_container_<?php echo $methodid; ?>_incoming').width() - 20,true).trigger('resize');
						
			$("#table_<?php echo $methodid ?>_outgoing").trigger('reloadGrid');
			$("#table_<?php echo $methodid ?>_outgoing").setGridWidth($('.grid_container_<?php echo $methodid; ?>_outgoing').width() - 20,true).trigger('resize');
						
			$('.tab_scrollbar').getNiceScroll().resize(); 
		}, 1000);
    });
	
	$('#form_<?php echo $methodid ?>_item_category_id').on('change', function (event, clickedIndex, newValue, oldValue) {
		$("#table_<?php echo $methodid ?>_asset").trigger('reloadGrid');
	});
	
	$('#form_<?php echo $methodid ?>_item_id_incoming').on('change', function (event, clickedIndex, newValue, oldValue) {
		$("#table_<?php echo $methodid ?>_incoming").trigger('reloadGrid');
	});
	
	$('#form_<?php echo $methodid ?>_item_id_outgoing').on('change', function (event, clickedIndex, newValue, oldValue) {
		$("#table_<?php echo $methodid ?>_outgoing").trigger('reloadGrid');
	});
	
	function print_<?php echo $methodid ?>_asset(format){
      item_category_id = $('#form_<?php echo $methodid ?>_item_category_id').val();
      var data_send={
         '<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>'
         ,item_category_id:item_category_id
         ,format:format
         ,print:1
      }; 
	  
      $.ajax({
         type: "POST",
         url:baseurl + '<?php echo $class_uri ?>/print_assets',
         data: data_send,
         dataType : 'json',
         complete: function(){
         },
         success: function(msg){
            if (!msg.valid){  
               show_error('show','error',msg.des);
               return false;
            }else{
               download_file('<?php echo $methodid ?>',msg.xfile,msg.namafile,'<?php echo $this->security->get_csrf_token_name() ?>','<?php echo $this->security->get_csrf_hash() ?>'); 
               return false; 
            } 
         }
      }) ;   
	}
	
	function print_<?php echo $methodid ?>_incoming(format){
      item_id = $('#form_<?php echo $methodid ?>_item_id_incoming').val();
       // if(item_id == 0){
		  // show_error("show",'Error','Please select item');
	  // } else {
		   var data_send={
			 '<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>'
			 ,item_id:item_id
			 ,format:format
			 ,print:1
		  }; 
		  
		  $.ajax({
			 type: "POST",
			 url:baseurl + '<?php echo $class_uri ?>/print_incoming',
			 data: data_send,
			 dataType : 'json',
			 complete: function(){
			 },
			 success: function(msg){
				if (!msg.valid){  
				   show_error('show','error',msg.des);
				   return false;
				}else{
				   download_file('<?php echo $methodid ?>',msg.xfile,msg.namafile,'<?php echo $this->security->get_csrf_token_name() ?>','<?php echo $this->security->get_csrf_hash() ?>'); 
				   return false; 
				} 
			 }
		  }) ;  
	  // }
	}
	
	function print_<?php echo $methodid ?>_outgoing(format){
      item_id = $('#form_<?php echo $methodid ?>_item_id_outgoing').val();
      
	  // if(item_id == 0){
		  // show_error("show",'Error','Please select item');
	  // } else {
		  var data_send={
			 '<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>'
			 ,item_id:item_id
			 ,format:format
			 ,print:1
		  }; 
		  
		  $.ajax({
			 type: "POST",
			 url:baseurl + '<?php echo $class_uri ?>/print_outgoing',
			 data: data_send,
			 dataType : 'json',
			 complete: function(){
			 },
			 success: function(msg){
				if (!msg.valid){  
				   show_error('show','error',msg.des);
				   return false;
				}else{
				   download_file('<?php echo $methodid ?>',msg.xfile,msg.namafile,'<?php echo $this->security->get_csrf_token_name() ?>','<?php echo $this->security->get_csrf_hash() ?>'); 
				   return false; 
				} 
			 }
		  }) ;  
	  // }
	   
	}
	
	
</script>