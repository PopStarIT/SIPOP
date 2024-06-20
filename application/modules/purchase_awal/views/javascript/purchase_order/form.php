<script type="text/javascript">
	var new_purchase_order = 1;
	var purchase_order_id = 0;
	var purchase_type_id = 1;
	var purchase_order_this_memo = 0;
	var purchase_order_lock_data = 0;
	var purchase_order_open_form = 0;
	
	$(".form_tab_<?php echo $methodid ?>").on("click", "a", function (e) {
        e.preventDefault();
		setTimeout(function(){ 
			$("#table_<?php echo $methodid ?>_detail").trigger('reloadGrid');
			$("#table_<?php echo $methodid ?>_detail").setGridWidth($('.grid_container_<?php echo $methodid; ?>_detail').width() - 20,true).trigger('resize');
			
			$("#table_<?php echo $methodid ?>_purchase_request").trigger('reloadGrid');
			$("#table_<?php echo $methodid ?>_purchase_request").setGridWidth($('.grid_container_<?php echo $methodid; ?>_purchase_request').width() - 20,true).trigger('resize');
						
			$('.tab_scrollbar').getNiceScroll().resize(); 
		}, 1000);
    });
	
	$('#form_<?php echo $methodid ?>_detail_item_id,#form_<?php echo $methodid ?>_partner_id,#form_<?php echo $methodid ?>_currencies_id,#form_<?php echo $methodid ?>_purchase_order_date ').on('change', function (event, clickedIndex, newValue, oldValue) {
		purchase_order_get_purchase_data();
	});
		
	function purchase_order_get_purchase_data(){
		if(purchase_order_open_form == 1){
			partner_id = $('#form_<?php echo $methodid ?>_partner_id').val();
			currencies_id = $('#form_<?php echo $methodid ?>_currencies_id').val();
			item_id = $('#form_<?php echo $methodid ?>_detail_item_id').val();
			date = $('#form_<?php echo $methodid ?>_purchase_order_date').val();
			
			$.ajax({
				url: baseurl+'loader',
				data: {
					'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'
					,param: 'get_purchase_data'
					,partner_id : partner_id
					,currencies_id : currencies_id
					,item_id : item_id
					,date : date
				},
				dataType: 'json',
				method: 'post',
				success: function(data){
					
					$('#form_<?php echo $methodid ?>_detail_conversion').val(data[0].conversion);
					// $('#form_<?php echo $methodid ?>_purchase_order_detail_unit_price').val(data[0].unit_price);
					
					if(purchase_order_lock_data == 0){
						$('#form_<?php echo $methodid ?>_rate').val(data[0].rate);
					}
					
					change_form_<?php echo $methodid ?>_detail_uom_id(data[0].partner_uom_id);
													
					setTimeout(function(){ 
						$('.tab_scrollbar').getNiceScroll().resize(); 
					}, 100);
				}
			});
		}		
	}
	
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
		page_loading("show",'<?php echo $page_title ?>','Please Wait...');
		$.ajax({
			url: baseurl+'loader',
			data: {
				'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'
				,param: 'data_purchase_order'
				,id : id
			},
			dataType: 'json',
			method: 'post',
			success: function(data){
				page_loading("hide");
				$('.button_<?php echo $methodid ?>_detail_edit').hide();
				$('.button_<?php echo $methodid ?>_detail_new').show();		
				
				new_purchase_order = 0;
				purchase_order_id = data[0].purchase_order_id;
				purchase_type_id = data[0].purchase_type_id;
				purchase_order_this_memo = data[0].this_memo;
				purchase_order_lock_data = data[0].lock_data;
				purchase_order_open_form = 1;
								
				$('#form_<?php echo $methodid ?>_purchase_order_id').val(data[0].purchase_order_id);
				$('#form_<?php echo $methodid ?>_purchase_type_id').val(data[0].purchase_type_id);
				$('#form_<?php echo $methodid ?>_this_memo').val(data[0].this_memo);
				$('#form_<?php echo $methodid ?>_detail_purchase_order_id').val(data[0].purchase_order_id);
				$('#form_<?php echo $methodid ?>_purchase_order_no').val(data[0].purchase_order_no);
				$('#form_<?php echo $methodid ?>_purchase_order_date').val(data[0].purchase_order_date);
				$('#form_<?php echo $methodid ?>_purchase_order_memo').val(data[0].purchase_order_memo);
				$('#form_<?php echo $methodid ?>_rate').val(data[0].rate);
				
				change_form_<?php echo $methodid ?>_partner_id(data[0].partner_id);
				change_form_<?php echo $methodid ?>_currencies_id(data[0].currencies_id);
				change_form_<?php echo $methodid ?>_purchase_order_type_id(data[0].purchase_order_type_id);
				
				$("#tab_<?php echo $methodid; ?>_detail").attr("data-toggle","tab");
				$("#tab_<?php echo $methodid; ?>_detail").removeClass( "tab_disabled");
				
				if(data[0].purchase_type_id == 1){
					$('.panel_<?php echo $methodid ?>_panel_detail').show();
					$('.panel_<?php echo $methodid ?>_panel_purchase_request').hide();
				} else {
					$('.panel_<?php echo $methodid ?>_panel_detail').hide();
					$('.panel_<?php echo $methodid ?>_panel_purchase_request').show();
					
				}
				setTimeout(function(){ 
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
						show_success("show",'<?php echo $page_title ?>',data.message);	
						
						if(new_purchase_order == 1){
							new_purchase_order = 0;
							$("#tab_<?php echo $methodid; ?>_detail").attr("data-toggle","tab");
							$("#tab_<?php echo $methodid; ?>_detail").removeClass( "tab_disabled");
							$("#tab_<?php echo $methodid; ?>_detail").click();
							purchase_order_id = data.purchase_order_id;
							$('#form_<?php echo $methodid ?>_purchase_order_id').val(purchase_order_id);
							$('#form_<?php echo $methodid ?>_detail_purchase_order_id').val(purchase_order_id);
								
							setTimeout(function(){ 
								$("#table_<?php echo $methodid ?>_detail").trigger('reloadGrid');
								$("#table_<?php echo $methodid ?>_detail").setGridWidth($('.grid_container_<?php echo $methodid; ?>_detail').width() - 20,true).trigger('resize');
								$('.tab_scrollbar').getNiceScroll().resize(); 
							}, 500);
							
							if(purchase_type_id == 1){
								$('.panel_<?php echo $methodid ?>_panel_detail').show();
								$('.panel_<?php echo $methodid ?>_panel_purchase_request').hide();
							} else {
								$('.panel_<?php echo $methodid ?>_panel_detail').hide();
								$('.panel_<?php echo $methodid ?>_panel_purchase_request').show();
								
							}
							
						} else {
							new_purchase_order = 1;
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
	
	var beforeclick_<?php echo $methodid ?>_purchase_request = function (rowid, e) {
		$("#table_<?php echo $methodid ?>_purchase_request").jqGrid('resetSelection');
		return(true);
	}
	
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
		new_purchase_order = 0;
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
	
	function edit_detail_<?php echo $methodid ?>(purchase_order_detail_id){
		page_loading("show",'<?php echo $page_title ?>','Please Wait...');
		$.ajax({
			url: baseurl+'loader',
			data: {
				'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'
				,param: 'data_purchase_order_detail'
				,id : purchase_order_detail_id
			},
			dataType: 'json',
			method: 'post',
			success: function(data){
				page_loading("hide");
				$('#form_<?php echo $methodid ?>_detail_purchase_order_detail_id').val(data[0].purchase_order_detail_id);
				$('#form_<?php echo $methodid ?>_detail_quantity_ordered').val(data[0].quantity_ordered);
				$('#form_<?php echo $methodid ?>_detail_order_delivery_date').val(data[0].order_delivery_date);
				$('#form_<?php echo $methodid ?>_detail_conversion').val(data[0].conversion);
				$('#form_<?php echo $methodid ?>_detail_unit_price').val(data[0].unit_price);
				$('#form_<?php echo $methodid ?>_detail_purchase_order_detail_memo').val(data[0].purchase_order_detail_memo);
				
				
				if(purchase_type_id == 1){
					$('.button_<?php echo $methodid ?>_detail_edit').show();
					$('.button_<?php echo $methodid ?>_detail_new').hide();	
					
					change_form_<?php echo $methodid ?>_detail_item_id(data[0].item_id);
					change_form_<?php echo $methodid ?>_detail_uom_id(data[0].uom_id);
				} else {
					$("#table_<?php echo $methodid ?>_purchase_request").trigger('reloadGrid');
				}		
			}
		});
	}
	
	function delete_detail_<?php echo $methodid ?>(purchase_order_detail_id){
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
						data: {'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>',purchase_order_detail_id:purchase_order_detail_id},
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
		$('#form_<?php echo $methodid ?>_detail_purchase_order_detail_id').val('');
		$('#form_<?php echo $methodid ?>_detail_quantity_ordered').val(0);
		$('#form_<?php echo $methodid ?>_detail_conversion').val(1);
		$('#form_<?php echo $methodid ?>_detail_unit_price').val(0);
		$('#form_<?php echo $methodid ?>_detail_purchase_order_detail_memo').val('');
		$('#form_<?php echo $methodid ?>_detail_order_delivery_date').val('');
		
		$('.button_<?php echo $methodid ?>_detail_edit').hide();
		$('.button_<?php echo $methodid ?>_detail_new').show();	
		
		$("#table_<?php echo $methodid ?>_purchase_request").trigger('reloadGrid');
	}	
	/* End Detail Function */
	
	var check_submit = 0;
	function add_list_<?php echo $methodid ?>(rh_id){
		page_loading("show",'<?php echo $page_title ?> Detail','Please Wait...');
		setTimeout(function(){ 
			var id = jQuery("#table_<?php echo $methodid ?>_purchase_request").jqGrid('getGridParam','selrow');
			if (id) {
				var row = jQuery("#table_<?php echo $methodid ?>_purchase_request").jqGrid('getRowData',id);   
				
				purchase_order_id = $('#form_<?php echo $methodid ?>_purchase_order_id').val();
				purchase_order_detail_id = rh_id;
				purchase_request_detail_id = parseInt(unwrap_cell_value(row.r1).replace(/,/g, ''));
				item_id = parseInt(unwrap_cell_value(row.r19).replace(/,/g, ''));
				quantity_ordered = parseFloat(unwrap_cell_value(row.r12).replace(/,/g, ''));
				uom_id = parseInt(unwrap_cell_value(row.r13).replace(/,/g, ''));
				conversion = parseFloat(unwrap_cell_value(row.r14).replace(/,/g, ''));
				unit_price = parseFloat(unwrap_cell_value(row.r15).replace(/,/g, ''));
				order_delivery_date = unwrap_cell_value(row.r16);
				purchase_order_detail_memo = unwrap_cell_value(row.r17);
				
				$.ajax({
				url: baseurl+'<?php echo $class_uri ?>/post_add_edit_detail',
				data: {
					'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'
					,purchase_order_detail_id:purchase_order_detail_id
					,purchase_request_detail_id :purchase_request_detail_id
					,purchase_order_id :purchase_order_id
					,item_id :item_id
					,quantity_ordered :quantity_ordered
					,uom_id :uom_id
					,conversion :conversion
					,unit_price :unit_price
					,order_delivery_date :order_delivery_date
					,purchase_order_detail_memo :purchase_order_detail_memo
					,trans_type :2
				},
				dataType: 'json',
				method: 'post',
				success: function(data){
					
					page_loading("hide");
					check_submit = 0;
					if(data.valid){
						show_success("show",'<?php echo $page_title ?> Detail',data.message);	
						cancel_detail_<?php echo $methodid ?>();
						$("#table_<?php echo $methodid ?>_purchase_request").trigger('reloadGrid');
						$("#table_<?php echo $methodid ?>_detail").trigger('reloadGrid');
						page_loading("hide");			
					} else {
						show_error("show",'Error',data.message);
					}
				},
				error: function(xhr,error){
					show_error("show",xhr.status.toString() + ' ' + xhr.statusText,'Please try again');
					check_submit = 0;
				}
			});
				
				
			} else {
				show_error("show",'Error','Please select row');
			}
			
		}, 500);	
		
	}
	
	
</script>