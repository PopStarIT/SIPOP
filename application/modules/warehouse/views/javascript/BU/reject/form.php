<script type="text/javascript">
	var new_reject = 1;
	var reject_id = 0;
	var reject_quantity = 0;
	var reject_detail_id = 0;
	var reject_supply_id = 0;
	
	$(".form_tab_<?php echo $methodid ?>").on("click", "a", function (e) {
        e.preventDefault();
		setTimeout(function(){ 
			
			$("#table_<?php echo $methodid ?>_detail").trigger('reloadGrid');
			$("#table_<?php echo $methodid ?>_detail").setGridWidth($('.grid_container_<?php echo $methodid; ?>_detail').width() - 20,true).trigger('resize');
			
			$('.tab_scrollbar').getNiceScroll().resize(); 
		}, 1000);
    });
	
	function cancel_<?php echo $methodid ?>(){
		$('#panel_content_<?php echo $methodid ?>').show();
		$('#panel_content_form_<?php echo $methodid ?>').hide();
		$("#table_<?php echo $methodid ?>").trigger('reloadGrid');
	}
	
	function save_<?php echo $methodid ?>(){
		$('#form_<?php echo $methodid ?>').submit();
	}
	
	var jvalidate = $("#form_<?php echo $methodid ?>").validate({
		ignore: [],
		rules: {                                            
			gl_account_group: {
				required: true
			}
		} 
	});
	
	function edit_<?php echo $methodid?>(id){
		$.ajax({
			url: baseurl+'loader',
			data: {
				'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'
				,param: 'data_reject'
				,id : id
			},
			dataType: 'json',
			method: 'post',
			success: function(data){
				reject_id = data[0].reject_id;
				new_reject = 0;				
								
				$('.label_form_<?php echo $methodid ?>_detail_quantity_reject').html('Quantity Reject');
			
				$('#form_<?php echo $methodid ?>_detail_quantity_reject').val(0);
				
				$('#form_<?php echo $methodid ?>_reject_id').val(reject_id);
				$('#form_<?php echo $methodid ?>_reject_no').val(data[0].reject_no);
				$('#form_<?php echo $methodid ?>_reject_date').val(data[0].reject_date);
				$('#form_<?php echo $methodid ?>_reject_info').val(data[0].reject_info);
				
				$('#form_<?php echo $methodid ?>_detail_reject_id').val(reject_id);
				
				$("#tab_<?php echo $methodid; ?>_detail").attr("data-toggle","tab");
				$("#tab_<?php echo $methodid; ?>_detail").removeClass( "tab_disabled");
			
				$('.button_<?php echo $methodid ?>_detail_edit').hide();
				$('.button_<?php echo $methodid ?>_detail_new').show();	
							
				setTimeout(function(){ 
					$("#tab_<?php echo $methodid; ?>_supply").removeAttr("data-toggle");
					$("#tab_<?php echo $methodid; ?>_supply").addClass( "tab_disabled");
			
					$("#tab_<?php echo $methodid; ?>_detail").attr("data-toggle","tab");
					$("#tab_<?php echo $methodid; ?>_detail").removeClass( "tab_disabled");
					
					$("#tab_<?php echo $methodid; ?>_header").attr("data-toggle","tab");
					$("#tab_<?php echo $methodid; ?>_header").removeClass( "tab_disabled");
					$("#tab_<?php echo $methodid; ?>_header").click();
					
					$('.tab_scrollbar').getNiceScroll().resize(); 
				}, 100);
			}
		});
	}
		
	var check_submit = 0;
	function post_<?php echo $methodid ?>(){
		if(check_submit == 0) {
			check_submit = 1;
			page_loading("show",'Save <?php echo $page_title ?>','Please Wait...');
			var data = $("#form_<?php echo $methodid ?>").serialize();
			
			$.ajax({
				url: baseurl+'<?php echo $class_uri ?>/post_add_edit',
				data: data,
				dataType: 'json',
				method: 'post',
				success: function(data){
					page_loading("hide");
					check_submit = 0;
					if(data.valid){
						show_success("show",'<?php echo $page_title ?> Header',data.message);	
											
						if(new_reject == 1){
							new_reject = 0;
							$("#tab_<?php echo $methodid; ?>_detail").attr("data-toggle","tab");
							$("#tab_<?php echo $methodid; ?>_detail").removeClass( "tab_disabled");
							$("#tab_<?php echo $methodid; ?>_detail").click();
							reject_id = data.reject_id;
							$('#form_<?php echo $methodid ?>_reject_id').val(reject_id);
							$('#form_<?php echo $methodid ?>_detail_reject_id').val(reject_id);
											
							setTimeout(function(){ 
								$("#table_<?php echo $methodid ?>_detail").trigger('reloadGrid');
								$("#table_<?php echo $methodid ?>_detail").setGridWidth($('.grid_container_<?php echo $methodid; ?>_detail').width() - 20,true).trigger('resize');
								$('.tab_scrollbar').getNiceScroll().resize(); 
							}, 500);													
						} else {
							new_reject = 1;
							$('#panel_content_<?php echo $methodid ?>').show();
							$('#panel_content_form_<?php echo $methodid ?>').hide();
							$("#table_<?php echo $methodid ?>").trigger('reloadGrid');
						}
					} else {
						show_error("show",'Error',data.message);
					}
				},
				error: function(xhr,error){
					show_error("show",xhr.status.toString() + ' ' + xhr.statusText,'Please try again');
					check_submit = 0;
				}
			});
		}
	}
	
	/* Detail Function */
	var jvalidate2 = $("#form_<?php echo $methodid ?>_detail").validate({
		ignore: [],
		rules: {                                            
			item_id: {
				required: true
			},
			'quantity_ordered': {
				min: 0
			}
		} 
	});
	
	var check_submit = 0;
	function add_<?php echo $methodid ?>(){
		new_sales_order = 0;
		if(check_submit == 0) {
			check_submit = 1;
			page_loading("show",'<?php echo $page_title ?> Detail','Please Wait...');
			var data = $("#form_<?php echo $methodid ?>_detail").serialize();
			$.ajax({
				url: baseurl+'<?php echo $class_uri ?>/post_add_edit_detail',
				data: data,
				dataType: 'json',
				method: 'post',
				success: function(data){
					page_loading("hide");
					check_submit = 0;
					if(data.valid){
						show_success("show",'<?php echo $page_title ?> Detail',data.message);	
						
						$("#table_<?php echo $methodid ?>_detail").trigger('reloadGrid');
						cancel_detail_<?php echo $methodid ?>();
						$("#table_<?php echo $methodid ?>_detail").setGridWidth($('.grid_container_<?php echo $methodid; ?>_detail').width() - 20,true).trigger('resize');
									
					} else {
						show_error("show",'Error',data.message);
					}
				},
				error: function(xhr,error){
					show_error("show",xhr.status.toString() + ' ' + xhr.statusText,'Please try again');
					check_submit = 0;
				}
			});
		}
	}
		
	function edit_detail_<?php echo $methodid ?>(id){
		page_loading("show",'<?php echo $page_title ?>','Please Wait...');
		$.ajax({
			url: baseurl+'loader',
			data: {
				'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'
				,param: 'data_reject_detail'
				,id : id
			},
			dataType: 'json',
			method: 'post',
			success: function(data){
				page_loading("hide");
				
				$('.button_<?php echo $methodid ?>_detail_edit').show();
				$('.button_<?php echo $methodid ?>_detail_new').hide();	
				
				$('#form_<?php echo $methodid ?>_detail_reject_detail_id').val(data[0].reject_detail_id);
				$('#form_<?php echo $methodid ?>_detail_quantity_reject').val(data[0].quantity_reject);
				
				change_form_<?php echo $methodid ?>_detail_item_id(data[0].item_id);
			}
		});
	}
	
	function delete_detail_<?php echo $methodid ?>(id){
		if(check_submit == 0) {
			swal({
				title: "Confirm Delete <?php echo $page_title ?> Detail ?",
				type: "question",
				dangerMode: true,
				showCancelButton: !0,
				confirmButtonClass: "btn btn-danger m-1",
				cancelButtonClass: "btn btn-secondary m-1",
				confirmButtonText: "Confirm",
				cancelButtonText: "Cancel",
				backdrop: true,
				allowOutsideClick : false,
			}).then((result) => {
				if (result.value) {
					page_loading("show",'Delete <?php echo $page_title ?> Detail','Please Wait...');
					$.ajax({
						url: baseurl+'<?php echo $class_uri ?>/delete_detail',								
						data: {'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'
						,reject_detail_id:id},
						dataType: 'json',
						method: 'post',
						success: function(data){
							page_loading("hide");
							check_submit = 0;
							if(data.valid){
								show_success("show",'Delete <?php echo $page_title ?> Detail',data.message);			
								$("#table_<?php echo $methodid ?>_detail").trigger('reloadGrid');
								cancel_detail_<?php echo $methodid ?>();
								
								setTimeout(function(){ 
									$('.tab_scrollbar').getNiceScroll().resize(); 
								}, 100);
							} else {
								show_error("show",'Error',data.message);
							}
						},
						error: function(xhr,error){
							show_error("show",xhr.status.toString() + ' ' + xhr.statusText,'Please try again');
							check_submit = 0;
						}
					});
				} else if (result.dismiss === swal.DismissReason.cancel) {
					swal.closeModal();	
					check_submit = 0;
				}
			});
		}
	}
	
	function cancel_detail_<?php echo $methodid ?>(){
		$('#form_<?php echo $methodid ?>_detail_reject_detail_id').val('');
		$('#form_<?php echo $methodid ?>_detail_quantity_reject').val(0);
		
		$('.button_<?php echo $methodid ?>_detail_edit').hide();
		$('.button_<?php echo $methodid ?>_detail_new').show();	
		
	}	
	/* End Detail Function */
	
	var click_transfer_<?php echo $methodid ?> = function (id, isSelected) {
		$('#form_<?php echo $methodid ?>_supply_item_stock_move_id').val('');
		$('#form_<?php echo $methodid ?>_supply_reject_supply_id').val('');
		$('#form_<?php echo $methodid ?>_supply_quantity_supply').val(0);
		$('#form_<?php echo $methodid ?>_supply_from').val('');
		$('#form_<?php echo $methodid ?>_supply_receive_date').val('');
		$('#form_<?php echo $methodid ?>_supply_receive_no').val('');
		
		if (!isSelected) {
			$('#form_<?php echo $methodid ?>_supply_reject_detail_id').val('');
		} else {
			var row = jQuery("#table_<?php echo $methodid ?>_supply").jqGrid('getRowData',id);
			reject_detail_id = parseInt(unwrap_cell_value(row.r1).replace(/,/g, ''));
			$('#form_<?php echo $methodid ?>_supply_reject_detail_id').val(reject_detail_id);
		}
		
		$("#table_<?php echo $methodid ?>_available").trigger('reloadGrid');	
		$("#table_<?php echo $methodid ?>_list_transfer").trigger('reloadGrid');	
	}
	
	var click_item_<?php echo $methodid ?> = function (id, isSelected) {	
		if (!isSelected) {
			var row_supply = $("#table_<?php echo $methodid ?>_list_transfer").jqGrid('getRowData',id);
			if(unwrap_cell_value(row_supply.r1) == id){
				var table_available = $("#table_<?php echo $methodid ?>_list_transfer").jqGrid('getGridParam','selrow');
				if(table_available == id){
					$("#table_<?php echo $methodid ?>_list_transfer").jqGrid("resetSelection");
				}
			}
			
			$('#form_<?php echo $methodid ?>_supply_stock_move_id').val('');
			$('#form_<?php echo $methodid ?>_supply_reject_supply_id').val('');
			$('#form_<?php echo $methodid ?>_supply_quantity_supply').val(0);
			$('#form_<?php echo $methodid ?>_supply_from').val('');
			$('#form_<?php echo $methodid ?>_supply_receive_date').val('');
			$('#form_<?php echo $methodid ?>_supply_receive_no').val('');
		} else {
			var row = $("#table_<?php echo $methodid ?>_available").jqGrid('getRowData',id);
			stock_move_id = parseInt(unwrap_cell_value(row.r1).replace(/,/g, ''));
			from = unwrap_cell_value(row.r3);
			receive_date = unwrap_cell_value(row.r4);
			receive_no = unwrap_cell_value(row.r5);
			quantity_supply = parseFloat(unwrap_cell_value(row.r8).replace(/,/g, ''));
			reject_supply_id = '';
			
			var row_supply = $("#table_<?php echo $methodid ?>_list_transfer").jqGrid('getRowData',id);
			if(unwrap_cell_value(row_supply.r1) == id){
				reject_supply_id = parseInt(unwrap_cell_value(row_supply.r3).replace(/,/g, ''));
				quantity_supply = parseFloat(unwrap_cell_value(row_supply.r9).replace(/,/g, ''));
				
				var table_available = $("#table_<?php echo $methodid ?>_list_transfer").jqGrid('getGridParam','selrow');
				if(table_available != id){
					$('#table_<?php echo $methodid ?>_list_transfer').jqGrid('setSelection',id);
				}
			} else {
				$("#table_<?php echo $methodid ?>_list_transfer").jqGrid("resetSelection");
			}
			
			
			$('#form_<?php echo $methodid ?>_supply_stock_move_id').val(stock_move_id);
			$('#form_<?php echo $methodid ?>_supply_reject_supply_id').val(reject_supply_id);
			$('#form_<?php echo $methodid ?>_supply_quantity_supply').val(quantity_supply);
			$('#form_<?php echo $methodid ?>_supply_from').val(from);
			$('#form_<?php echo $methodid ?>_supply_receive_date').val(receive_date);
			$('#form_<?php echo $methodid ?>_supply_receive_no').val(receive_no);
			
		}
	}
	
	var click_supply_<?php echo $methodid ?> = function (id, isSelected) {
		if (!isSelected) {	
			var row_available = $("#table_<?php echo $methodid ?>_available").jqGrid('getRowData',id);
			if(unwrap_cell_value(row_available.r1) == id){
				var table_available = $("#table_<?php echo $methodid ?>_available").jqGrid('getGridParam','selrow');
				if(table_available == id){
					$("#table_<?php echo $methodid ?>_available").jqGrid("resetSelection");
				}
			}
			
			$('#form_<?php echo $methodid ?>_supply_stock_move_id').val('');
			$('#form_<?php echo $methodid ?>_supply_reject_supply_id').val('');
			$('#form_<?php echo $methodid ?>_supply_quantity_supply').val(0);
			$('#form_<?php echo $methodid ?>_supply_from').val('');
			$('#form_<?php echo $methodid ?>_supply_receive_date').val('');
			$('#form_<?php echo $methodid ?>_supply_receive_no').val('');
		} else {
			var row = $("#table_<?php echo $methodid ?>_list_transfer").jqGrid('getRowData',id);
			stock_move_id = parseInt(unwrap_cell_value(row.r1).replace(/,/g, ''));
			from = unwrap_cell_value(row.r4);
			receive_date = unwrap_cell_value(row.r5);
			receive_no = unwrap_cell_value(row.r6);
			quantity_supply = parseFloat(unwrap_cell_value(row.r9).replace(/,/g, ''));
			reject_supply_id = parseInt(unwrap_cell_value(row.r3).replace(/,/g, ''));
			quantity_supply = parseFloat(unwrap_cell_value(row.r9).replace(/,/g, ''));
			
			var row_available = $("#table_<?php echo $methodid ?>_available").jqGrid('getRowData',id);
			if(unwrap_cell_value(row_available.r1) == id){
				var table_available = $("#table_<?php echo $methodid ?>_available").jqGrid('getGridParam','selrow');
				if(table_available != id){
					$('#table_<?php echo $methodid ?>_available').jqGrid('setSelection',id);
				}
			} else {
				$("#table_<?php echo $methodid ?>_available").jqGrid("resetSelection");
			}
			
			$('#form_<?php echo $methodid ?>_supply_stock_move_id').val(stock_move_id);
			$('#form_<?php echo $methodid ?>_supply_reject_supply_id').val(reject_supply_id);
			$('#form_<?php echo $methodid ?>_supply_quantity_supply').val(quantity_supply);
			$('#form_<?php echo $methodid ?>_supply_from').val(from);
			$('#form_<?php echo $methodid ?>_supply_receive_date').val(receive_date);
			$('#form_<?php echo $methodid ?>_supply_receive_no').val(receive_no);
		}
	}
	
	function supply_<?php echo $methodid?>(id){
		$.ajax({
			url: baseurl+'loader',
			data: {
				'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'
				,param: 'data_reject'
				,id : id
			},
			dataType: 'json',
			method: 'post',
			success: function(data){
				reject_id = data[0].reject_id;
				
				$('#form_<?php echo $methodid ?>_supply_reject_id').val(reject_id);
				$('#form_<?php echo $methodid ?>_supply_reject_detail_id').val('');
				$('#form_<?php echo $methodid ?>_supply_reject_no').val(data[0].reject_no);
				$('#form_<?php echo $methodid ?>_supply_reject_date').val(data[0].reject_date);
				$('#form_<?php echo $methodid ?>_supply_reject_info').val(data[0].reject_info);
				
				setTimeout(function(){ 
					$("#table_<?php echo $methodid ?>_supply").trigger('reloadGrid');
					$("#table_<?php echo $methodid ?>_supply").setGridWidth($('.grid_container_<?php echo $methodid; ?>_supply').width() - 20,true).trigger('resize');
					
					$("#table_<?php echo $methodid ?>_available").trigger('reloadGrid');
					$("#table_<?php echo $methodid ?>_available").setGridWidth($('.grid_container_<?php echo $methodid; ?>_available').width() - 20,true).trigger('resize');
						
					$("#table_<?php echo $methodid ?>_list_transfer").trigger('reloadGrid');
					$("#table_<?php echo $methodid ?>_list_transfer").setGridWidth($('.grid_container_<?php echo $methodid; ?>_list_transfer').width() - 20,true).trigger('resize');
											
					$('.tab_scrollbar').getNiceScroll().resize(); 
				}, 500);
			}
		});
	}
	
	var check_submit = 0;
	function post_<?php echo $methodid ?>_supply(){
		new_work_order_transfer = 0;
		if(check_submit == 0) {
			check_submit = 1;
			page_loading("show",'Supply','Please Wait...');
			var data = $("#form_<?php echo $methodid ?>_supply").serialize();
			$.ajax({
				url: baseurl+'<?php echo $class_uri ?>/post_add_edit_supply',
				data: data,
				dataType: 'json',
				method: 'post',
				success: function(data){
					page_loading("hide");
					check_submit = 0;
					if(data.valid){
						show_success("show",'Supply',data.message);	
						$("#table_<?php echo $methodid ?>_supply").trigger('reloadGrid');
						$("#table_<?php echo $methodid ?>_supply").setGridWidth($('.grid_container_<?php echo $methodid; ?>_supply').width() - 20,true).trigger('resize');
						
						$("#table_<?php echo $methodid ?>_available").trigger('reloadGrid');
						$("#table_<?php echo $methodid ?>_available").setGridWidth($('.grid_container_<?php echo $methodid; ?>_available').width() - 20,true).trigger('resize');
						
						$("#table_<?php echo $methodid ?>_list_transfer").trigger('reloadGrid');
						$("#table_<?php echo $methodid ?>_list_transfer").setGridWidth($('.grid_container_<?php echo $methodid; ?>_list_transfer').width() - 20,true).trigger('resize');
							
						setTimeout(function(){ 
							$('.tab_scrollbar').getNiceScroll().resize(); 
						}, 100);
					} else {
						show_error("show",'Error',data.message);
					}
				},
				error: function(xhr,error){
					show_error("show",xhr.status.toString() + ' ' + xhr.statusText,'Please try again');
					check_submit = 0;
				}
			});
		}
	}
	
	function supply_fifo_<?php echo $methodid ?>(){
		if(check_submit == 0) {
			swal({
				title: "Auto Supply FIFO ?",
				type: "question",
				dangerMode: true,
				showCancelButton: !0,
				confirmButtonClass: "btn btn-danger m-1",
				cancelButtonClass: "btn btn-secondary m-1",
				confirmButtonText: "Confirm",
				cancelButtonText: "Cancel",
				backdrop: true,
				allowOutsideClick : false,
			}).then((result) => {
				if (result.value) {
					page_loading("show",'Auto Supply FIFO','Please Wait...');
					$.ajax({
						url: baseurl+'<?php echo $class_uri ?>/auto_supply_fifo',								
						data: {'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>',reject_id:reject_id},
						dataType: 'json',
						method: 'post',
						success: function(data){
							page_loading("hide");
							check_submit = 0;
							if(data.valid){
								show_success("show",'Auto Supply FIFO',data.message);			
								$("#table_<?php echo $methodid ?>_supply").trigger('reloadGrid');
								$("#table_<?php echo $methodid ?>_supply").setGridWidth($('.grid_container_<?php echo $methodid; ?>_supply').width() - 20,true).trigger('resize');
							
								$("#table_<?php echo $methodid ?>_available").trigger('reloadGrid');
								$("#table_<?php echo $methodid ?>_available").setGridWidth($('.grid_container_<?php echo $methodid; ?>_available').width() - 20,true).trigger('resize');
											
								$("#table_<?php echo $methodid ?>_list_transfer").trigger('reloadGrid');
								$("#table_<?php echo $methodid ?>_list_transfer").setGridWidth($('.grid_container_<?php echo $methodid; ?>_list_transfer').width() - 20,true).trigger('resize');
									
								setTimeout(function(){ 
									$('.tab_scrollbar').getNiceScroll().resize(); 
								}, 100);
							} else {
								show_error("show",'Error',data.message);
							}
						},
						error: function(xhr,error){
							show_error("show",xhr.status.toString() + ' ' + xhr.statusText,'Please try again');
							check_submit = 0;
						}
					});
				} else if (result.dismiss === swal.DismissReason.cancel) {
					swal.closeModal();	
					check_submit = 0;
				}
			});
		}
	}
	
	function supply_lifo_<?php echo $methodid ?>(){
		if(check_submit == 0) {
			swal({
				title: "Auto Supply LIFO ?",
				type: "question",
				dangerMode: true,
				showCancelButton: !0,
				confirmButtonClass: "btn btn-danger m-1",
				cancelButtonClass: "btn btn-secondary m-1",
				confirmButtonText: "Confirm",
				cancelButtonText: "Cancel",
				backdrop: true,
				allowOutsideClick : false,
			}).then((result) => {
				if (result.value) {
					page_loading("show",'Auto Supply LIFO','Please Wait...');
					$.ajax({
						url: baseurl+'<?php echo $class_uri ?>/auto_supply_lifo',								
						data: {'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>',reject_id:reject_id},
						dataType: 'json',
						method: 'post',
						success: function(data){
							page_loading("hide");
							check_submit = 0;
							if(data.valid){
								show_success("show",'Auto Supply LIFO',data.message);			
								$("#table_<?php echo $methodid ?>_supply").trigger('reloadGrid');
								$("#table_<?php echo $methodid ?>_supply").setGridWidth($('.grid_container_<?php echo $methodid; ?>_supply').width() - 20,true).trigger('resize');
							
								$("#table_<?php echo $methodid ?>_available").trigger('reloadGrid');
								$("#table_<?php echo $methodid ?>_available").setGridWidth($('.grid_container_<?php echo $methodid; ?>_available').width() - 20,true).trigger('resize');
											
								$("#table_<?php echo $methodid ?>_list_transfer").trigger('reloadGrid');
								$("#table_<?php echo $methodid ?>_list_transfer").setGridWidth($('.grid_container_<?php echo $methodid; ?>_list_transfer').width() - 20,true).trigger('resize');
							
							setTimeout(function(){ 
									$('.tab_scrollbar').getNiceScroll().resize(); 
								}, 100);
							} else {
								show_error("show",'Error',data.message);
							}
						},
						error: function(xhr,error){
							show_error("show",xhr.status.toString() + ' ' + xhr.statusText,'Please try again');
							check_submit = 0;
						}
					});
				} else if (result.dismiss === swal.DismissReason.cancel) {
					swal.closeModal();	
					check_submit = 0;
				}
			});
		}
	}
</script>