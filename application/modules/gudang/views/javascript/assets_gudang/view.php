<script type="text/javascript">

    var Dok_no = 0;
	var item_code = '';
	var stock_move_id = -1;
	
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
	
	var click_item_<?php echo $methodid ?> = function (id, isSelected) {
		//alert ("masuk");
		if (!isSelected) {
			$('#form_<?php echo $methodid ?>_outgoing_item_code').val('0');
		} else {
			var row = jQuery("#table_<?php echo $methodid ?>_outgoing").jqGrid('getRowData',id);
			Dok_no = unwrap_cell_value(row.r5);
			Dok_tgl = unwrap_cell_value(row.r6);
			item_code = unwrap_cell_value(row.r2);
			stock_move_id = parseInt(unwrap_cell_value(row.r1).replace(/,/g, ''));
			item_id = parseInt(unwrap_cell_value(row.r13).replace(/,/g, ''));
			Dok_to = unwrap_cell_value(row.r4);
			
			
			$('#form_<?php echo $methodid ?>_outgoing_item_code').val(item_code);
			$('#form_<?php echo $methodid ?>_outgoing_no_dokumen').val(Dok_no);
			$('#form_<?php echo $methodid ?>_outgoing_tgl_dokumen').val(Dok_tgl);
			$('#form_<?php echo $methodid ?>_outgoing_stock_move_id').val(stock_move_id);
			$('#form_<?php echo $methodid ?>_outgoing_item_id').val(item_id);
			$('#form_<?php echo $methodid ?>_outgoing_dok_to').val(Dok_to);
			
			//work_order_request_list_id = parseInt(unwrap_cell_value(row.r1).replace(/,/g, ''));
			//$('#form_<?php echo $methodid ?>_supply_work_order_request_list_id').val(work_order_request_list_id);
			//alert (unwrap_cell_value(row.r2));
			//alert (unwrap_cell_value(row.r5));
			//$('#form_<?php echo $methodid ?>_supply_work_order_request_list_id').val(work_order_request_list_id);
			
		}
	  $("#table_<?php echo $methodid ?>_outgoing_transfer").trigger('reloadGrid');
	}
	
	var click_item_incoming_<?php echo $methodid ?> = function (id, isSelected) {
		//alert ("masuk");
		if (!isSelected) {
			$('#form_<?php echo $methodid ?>_incoming_item_code').val('0');
		} else {
			var row = jQuery("#table_<?php echo $methodid ?>_incoming").jqGrid('getRowData',id);
			Dok_no = unwrap_cell_value(row.r5);
			Dok_tgl = unwrap_cell_value(row.r6);
			item_code = unwrap_cell_value(row.r2);
			stock_move_id = parseInt(unwrap_cell_value(row.r1).replace(/,/g, ''));
			item_id = parseInt(unwrap_cell_value(row.r15).replace(/,/g, ''));
			Dok_to = unwrap_cell_value(row.r4);
			
			//alert (stock_move_id);
			$('#form_<?php echo $methodid ?>_incoming_item_code').val(item_code);
			//$('#form_<?php echo $methodid ?>_outgoing_no_dokumen').val(Dok_no);
			//$('#form_<?php echo $methodid ?>_outgoing_tgl_dokumen').val(Dok_tgl);
			$('#form_<?php echo $methodid ?>_incoming_stock_move_id').val(stock_move_id);
			$('#form_<?php echo $methodid ?>_incoming_item_id').val(item_id);
			//$('#form_<?php echo $methodid ?>_outgoing_dok_to').val(Dok_to);
			
			$('#form_<?php echo $methodid ?>_download_excel_incoming_detail_item_code').val(item_code);
			$('#form_<?php echo $methodid ?>_download_excel_incoming_detail_stock_move_id').val(stock_move_id);
			$('#form_<?php echo $methodid ?>_download_excel_incoming_detail_item_id').val(item_id);
			
			//work_order_request_list_id = parseInt(unwrap_cell_value(row.r1).replace(/,/g, ''));
			//$('#form_<?php echo $methodid ?>_supply_work_order_request_list_id').val(work_order_request_list_id);
			//alert (unwrap_cell_value(row.r2));
			//alert (unwrap_cell_value(row.r5));
			//$('#form_<?php echo $methodid ?>_supply_work_order_request_list_id').val(work_order_request_list_id);
			
		}
	  $("#table_<?php echo $methodid ?>_incoming_transfer").trigger('reloadGrid');
	}
	
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
	
	function download_<?php echo $methodid ?>_excel_incoming_detail(){
		stock_move_id = $('#form_<?php echo $methodid ?>_download_excel_incoming_detail_stock_move_id').val();
		item_code = $('#form_<?php echo $methodid ?>_download_excel_incoming_detail_item_code').val();
		item_id = $('#form_<?php echo $methodid ?>_download_excel_incoming_detail_item_id').val();
		format ='xlsx';
	//alert (item_code);
	      window.open(baseurl+'<?php echo $class_uri ?>/print_excel_incoming_detail?'+'stock_move_id=' +stock_move_id+ '&item_id='+item_id+'&item_code='+item_code+ '&format='+format, '_BLANK');
	
              
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