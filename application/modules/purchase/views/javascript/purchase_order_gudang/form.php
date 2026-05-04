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
			
			//$("#table_<?php echo $methodid ?>_mdl_po_detail_rincian").trigger('reloadGrid');
		   // $("#table_<?php echo $methodid ?>_mdl_po_detail_rincian").setGridWidth($('.grid_container_<?php echo $methodid; ?>_mdl_po_detail_rincian').width() - 20,true).trigger('resize');
		
		//	$("#table_<?php echo $methodid ?>_purchase_request").trigger('reloadGrid');
		//	$("#table_<?php echo $methodid ?>_purchase_request").setGridWidth($('.grid_container_<?php echo $methodid; ?>_purchase_request').width() - 20,true).trigger('resize');
		//	
		//	$("#table_<?php echo $methodid ?>_proforma").trigger('reloadGrid');
		//	$("#table_<?php echo $methodid ?>_proforma").setGridWidth($('.grid_container_<?php echo $methodid; ?>_proforma').width() - 20,true).trigger('resize');
						
			$('.tab_scrollbar').getNiceScroll().resize(); 
		}, 1000);
    });
	
	$('#form_<?php echo $methodid ?>_detail_item_id,#form_<?php echo $methodid ?>_partner_id,#form_<?php echo $methodid ?>_currencies_id,#form_<?php echo $methodid ?>_purchase_order_date ').on('change', function (event, clickedIndex, newValue, oldValue) {
	//	alert(baseurl+'loader');
	//	purchase_order_get_purchase_data();
	});
	
	$('#form_<?php echo $methodid ?>_detail_item_id').on('change',function (event, clickedIndex, newValue, oldValue) {
		  let selectedValue = this.value;
        //  let selectedText = this.options[this.selectedIndex].text;
         //  console.log("Nilai:", selectedValue);
		   $.ajax({
			   url: baseurl+'loader',
			   data: {
					'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'
					,param: 'get_item_base_gudang'
					,item_id : selectedValue
				},
				dataType: 'json',
				method: 'post',
				success: function(data){
					// console.log(data);
					$('#form_<?php echo $methodid ?>_detail_item_base_code').val(data.item_base_code);
					$('#form_<?php echo $methodid ?>_detail_item_base_id').val(data.item_base_id);
					
					setTimeout(function(){ 
						$('.tab_scrollbar').getNiceScroll().resize(); 
					}, 100);
				}
		   });
	});
	
	 $('#form_<?php echo $methodid ?>_mdl_po_rincian_fabric_code').on('change', function(){
		   const  item_id= $("#form_<?php echo $methodid ?>_mdl_po_rincian_fabric_code").val();
			//alert('value '+ item_id); 
			 $("#form_new_fabric").hide();
			 	if (item_id == -99){
		      	//	alert('value '+ style); 
		      		  $("#form_new_fabric").show()
		      		  $("#form_<?php echo $methodid ?>_item_info").val('new');
		      	      $('#form_<?php echo $methodid ?>_mdl_po_rincian_item_fabric_name').val('');
		      	} else {
					 $("#form_new_fabric").hide()
			    $.ajax({
			          url: baseurl+'loader',
			          data: {
					    '<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'
					    ,param: 'get_mst_item_fabric'
					    ,item_id : item_id
				      },
				      dataType: 'json',
				      method: 'post',
				      success: function(data){
					     $('#form_<?php echo $methodid ?>_mdl_po_rincian_item_fabric_name').val(data.item_fabric_name);
					
		             }
		         });
			}
		
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
	
	function save_<?php echo $methodid ?>_proforma(){
		$('#form_<?php echo $methodid ?>_proforma').submit();
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
		//alert(id+'loader');
		$.ajax({
			url: baseurl+'loader',
			data: {
				'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'
				,param: 'data_purchase_order_warehouse'
				,param_pop:'db_pop'
				,id : id
			},
			dataType: 'json',
			method: 'post',
			success: function(data){
				page_loading("hide");
				$('.button_<?php echo $methodid ?>_detail_edit').hide();
				$('.button_<?php echo $methodid ?>_detail_new').show();		
				//alert(data[0].item_fabric_id);
				new_purchase_order = 1;
				purchase_order_id = data[0].purchase_order_id;
				purchase_type_id = 1;
				purchase_order_this_memo = '';
				purchase_order_lock_data = 1;
				purchase_order_open_form = 1;
				
				
				//purchase_order_id = data[0].purchase_order_id;
				//purchase_type_id = data[0].purchase_type_id;
				//purchase_order_this_memo = data[0].this_memo;
				//purchase_order_lock_data = data[0].lock_data;
				//purchase_order_open_form = 1;
								
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
				
				
				$('#form_<?php echo $methodid ?>_fabric_weight').val(data[0].fabric_weight);
				change_form_<?php echo $methodid ?>_unit_weight(data[0].unit_weight);
				$('#form_<?php echo $methodid ?>_fabric_width').val(data[0].fabric_width);
				change_form_<?php echo $methodid ?>_unit_width(data[0].unit_width);
				$('#form_<?php echo $methodid ?>_shipping_sample').val(data[0].shipping_sample);
				$('#form_<?php echo $methodid ?>_requested_ETD').val(data[0].requested_etd);
				$('#form_<?php echo $methodid ?>_other_instructions').val(data[0].other_instructions);
				$('#form_<?php echo $methodid ?>_packing_instructions').val(data[0].packing_instructions);
				$('#form_<?php echo $methodid ?>_date_etd').val(data[0].date_etd);
				$('#form_<?php echo $methodid ?>_date_eta').val(data[0].date_eta);
				$('#form_<?php echo $methodid ?>_date_in').val(data[0].date_in);
				
				$('#form_<?php echo $methodid ?>_detail_fabric_code_header').val(data[0].fabric_code);
								
				$('#form_<?php echo $methodid ?>_detail_purchase_order_warehouse_id').val(data[0].purchase_order_warehouse_id);
				$('#form_<?php echo $methodid ?>_detail_fabric_code_header_id').val(data[0].item_fabric_id);
				$('#form_<?php echo $methodid ?>_detail_conversion').val(1);
				$('#form_<?php echo $methodid ?>_detail_unit_price').val(1);
				$('#form_<?php echo $methodid ?>_detail_quantity_ordered').val(1);
				
				$('#form_<?php echo $methodid ?>_fabric_content').val(data[0].fabric_content);
												
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
		//	new_purchase_order = 1;
		//purchase_order_id = 0;
		//purchase_type_id = 1;
			
			$.ajax({
				url: baseurl+'<?php echo $class_uri ?>/post_add_edit',
				data: data,
				dataType: 'json',
				method: 'post',
				success: function(data){
					page_loading("hide");
					check_submit = 0;
					//alert(data.fabric_code);
					if(data.valid){
						show_success("show",'<?php echo $page_title ?>',data.message);	
						//fabric_code_header_id
						if(new_purchase_order == 1){
							new_purchase_order = 0;
							$("#tab_<?php echo $methodid; ?>_detail").attr("data-toggle","tab");
							$("#tab_<?php echo $methodid; ?>_detail").removeClass( "tab_disabled");
							$("#tab_<?php echo $methodid; ?>_detail").click();
							purchase_order_id = data.purchase_order_id;
							
							$('#form_<?php echo $methodid ?>').val(purchase_order_id);
							$('#form_<?php echo $methodid ?>_detail_purchase_order_id').val(purchase_order_id);
							$('#form_<?php echo $methodid ?>_detail_fabric_code_header').val(data.fabric_code);
							$('#form_<?php echo $methodid ?>_detail_fabric_code_header_id').val(data.fabric_id);
							$('#form_<?php echo $methodid ?>_detail_purchase_order_warehouse_id').val(data.purchase_order_warehouse_id);
								
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
	
	
	function post_detil_rincian_<?php echo $methodid ?>(){
		if(check_submit == 0) {
			check_submit = 1;
			page_loading("show",'Save <?php echo $page_title ?>','Please Wait...');
			var data = $("#form_<?php echo $methodid ?>_mdl_rincian_add").serialize();
			
			$.ajax({
				url: baseurl+'<?php echo $class_uri ?>/post_add_edit_detail_rincian',
				data: data,
				dataType: 'json',
				method: 'post',
				success: function(data){
					page_loading("hide");
					check_submit = 0;
					if(data.valid){
						$('#form_<?php echo $methodid ?>_mdl_po_rincian_item_fabric_code').val('');
						$('#form_<?php echo $methodid ?>_mdl_po_rincian_item_fabric_name').val('');
						$('#form_<?php echo $methodid ?>_mdl_po_rincian_quantity').val(0);
						$('#form_<?php echo $methodid ?>_mdl_po_rincian_unit_price').val('');
						$('#form_<?php echo $methodid ?>_mdl_po_rincian_note').val('');
						
						show_success("show",'<?php echo $page_title ?>',data.message);	
					}else{
						show_error("show",'Error',data.message);
					}
				},
				error: function(xhr,error){
					show_error("show",xhr.status.toString() + ' ' + xhr.statusText,'Please try again');
					check_submit = 0;
				}
			})
		}
	}
	function post_<?php echo $methodid ?>_proforma(){
		if(check_submit == 0) {
			check_submit = 1;
			page_loading("show",'Save <?php echo $page_title ?>','Please Wait...');
			var data = $("#form_<?php echo $methodid ?>_proforma").serialize();
						
			$.ajax({
				url: baseurl+'<?php echo $class_uri ?>/post_add_edit',
				data: data,
				dataType: 'json',
				method: 'post',
				success: function(data){
					page_loading("hide");
					check_submit = 0;
					alert(data.purchase_order_id);
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
							$('#form_<?php echo $methodid ?>_proforma_performa_id').val(data.sales_performa_id);
							$('#form_<?php echo $methodid ?>_proforma_purchase_order_id').val('');
								
							setTimeout(function(){ 
								$("#table_<?php echo $methodid ?>_detail").trigger('reloadGrid');
								$("#table_<?php echo $methodid ?>_detail").setGridWidth($('.grid_container_<?php echo $methodid; ?>_detail').width() - 20,true).trigger('resize');
								$('.tab_scrollbar').getNiceScroll().resize(); 
							}, 500);
							
							$('.panel_<?php echo $methodid ?>_proforma_invoice').show();
							$('.panel_<?php echo $methodid ?>_panel_detail').hide();
							$('.panel_<?php echo $methodid ?>_panel_purchase_request').hide();
						//	if(purchase_type_id == 1){
						//		$('.panel_<?php echo $methodid ?>_panel_detail').show();
						//		$('.panel_<?php echo $methodid ?>_panel_purchase_request').hide();
						//	} else {
						//		$('.panel_<?php echo $methodid ?>_panel_detail').hide();
						//		$('.panel_<?php echo $methodid ?>_panel_purchase_request').show();
						//								
						//	}
							
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
	
	var beforeclick_<?php echo $methodid ?>_proforma = function (rowid, e) {
		$("#table_<?php echo $methodid ?>_proforma").jqGrid('resetSelection');
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
		//alert(baseurl+'loader');
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
				//console.log(data[0]);
				$('#form_<?php echo $methodid ?>_detail_purchase_order_detail_id').val(data[0].purchase_order_detail_id);
				$('#form_<?php echo $methodid ?>_detail_quantity_ordered').val(data[0].quantity_ordered);
				$('#form_<?php echo $methodid ?>_detail_order_delivery_date').val(data[0].order_delivery_date);
				$('#form_<?php echo $methodid ?>_detail_conversion').val(data[0].conversion);
				$('#form_<?php echo $methodid ?>_detail_unit_price').val(data[0].unit_price);
				$('#form_<?php echo $methodid ?>_detail_purchase_order_detail_memo').val(data[0].purchase_order_detail_memo);
				$('#form_<?php echo $methodid ?>_detail_purchase_order_detail_Style').val(data[0].po_style);
				$('#form_<?php echo $methodid ?>_detail_purchase_order_detail_composition').val(data[0].po_composition);
				$('#form_<?php echo $methodid ?>_detail_purchase_order_detail_intruction').val(data[0].po_intruction);
				$('#form_<?php echo $methodid ?>_detail_colour').val(data[0].colour);
				$('#form_<?php echo $methodid ?>_detail_style').val(data[0].model);
				$('#form_<?php echo $methodid ?>_detail_purchase_order_warehouse_detail_id').val(data[0].purchase_order_warehouse_detail);
				$('#form_<?php echo $methodid ?>_detail_po_content').val(data[0].fabric_content);
								
				if(purchase_type_id == 1){
					$('.button_<?php echo $methodid ?>_detail_edit').show();
					$('.button_<?php echo $methodid ?>_detail_new').hide();	
					
					change_form_<?php echo $methodid ?>_detail_item_id(data[0].item_id);
					change_form_<?php echo $methodid ?>_detail_uom_id(data[0].uom_id);
					//change_form_<?php echo $methodid ?>_detail_fabric_code_detail(data[0].item_fabric_id);
				} else {
					$("#table_<?php echo $methodid ?>_purchase_request").trigger('reloadGrid');
				}		
			}
		});
	}
	
	function edit_detail_rincian_<?php echo $methodid ?>(po_detail_rincian_id){
		//page_loading("show",'<?php echo $page_title ?>','Please Wait...');
		$('.form_<?php echo $methodid ?>_rincian_add').show();
		$('.form_<?php echo $methodid ?>_rincian_button').hide();
		var id = jQuery("#table_<?php echo $methodid ?>_mdl_po_detail_rincian").jqGrid('getGridParam','selrow');
		if (id) {
		  var row = jQuery("#table_<?php echo $methodid ?>_mdl_po_detail_rincian").jqGrid('getRowData',id);
		  po_detail_rincian_id = parseInt(unwrap_cell_value(row.r1).replace(/,/g, ''));
		  fabric_code_id = parseInt(unwrap_cell_value(row.r4).replace(/,/g, ''));
		  qty_order = parseFloat(unwrap_cell_value(row.r9).replace(/,/g, ''));
		  unit_price = parseFloat(unwrap_cell_value(row.r10).replace(/,/g, ''));
		  note = unwrap_cell_value(row.r12);
		
		  $('#form_<?php echo $methodid ?>_mdl_po_rincian_po_detail_rincian_id').val(fabric_code_id);
		  change_form_<?php echo $methodid ?>_mdl_po_rincian_fabric_code(fabric_code_id);
		  $('#form_<?php echo $methodid ?>_mdl_po_rincian_quantity').val(qty_order);
		  $('#form_<?php echo $methodid ?>_mdl_po_rincian_unit_price').val(unit_price);
		   $('#form_<?php echo $methodid ?>_mdl_po_rincian_note').val(note);
		} else {
				show_error("show",'Error','Please select row');
	    }	
		//$.ajax({
		//	url: baseurl+'loader',
		//	data: {
		//		'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'
		//		,param: 'data_purchase_order_detail'
		//		,id : purchase_order_detail_id
		//	},
		//	dataType: 'json',
		//	method: 'post',
		//	success: function(data){
		//		page_loading("hide");
		//		//console.log(data[0]);
		//	//	$('#form_<?php echo $methodid ?>_detail_purchase_order_detail_id').val(data[0].purchase_order_detail_id);
		//	//	$('#form_<?php echo $methodid ?>_detail_quantity_ordered').val(data[0].quantity_ordered);
		//	//	$('#form_<?php echo $methodid ?>_detail_order_delivery_date').val(data[0].order_delivery_date);
		//	//	$('#form_<?php echo $methodid ?>_detail_conversion').val(data[0].conversion);
		//	//	$('#form_<?php echo $methodid ?>_detail_unit_price').val(data[0].unit_price);
		//	//	$('#form_<?php echo $methodid ?>_detail_purchase_order_detail_memo').val(data[0].purchase_order_detail_memo);
		//	//	$('#form_<?php echo $methodid ?>_detail_purchase_order_detail_Style').val(data[0].po_style);
		//	//	$('#form_<?php echo $methodid ?>_detail_purchase_order_detail_composition').val(data[0].po_composition);
		//	//	$('#form_<?php echo $methodid ?>_detail_purchase_order_detail_intruction').val(data[0].po_intruction);
		//	//	$('#form_<?php echo $methodid ?>_detail_colour').val(data[0].colour);
		//	//	$('#form_<?php echo $methodid ?>_detail_style').val(data[0].model);
		//	//	$('#form_<?php echo $methodid ?>_detail_purchase_order_warehouse_detail_id').val(data[0].purchase_order_warehouse_detail);
		//	//	$('#form_<?php echo $methodid ?>_detail_po_content').val(data[0].fabric_content);
		//		
		//		$('.form_<?php echo $methodid ?>_rincian_add').show();
		//        $('.form_<?php echo $methodid ?>_rincian_button').hide();
		//			
		//	}
		//});
	}
	
	function view_detail_po_<?php echo $methodid ?>(purchase_order_warehouse_detail_id){
		 //alert(purchase_order_warehouse_detail_id)
		 $('.form_<?php echo $methodid ?>_rincian_add').hide();
		 $('.form_<?php echo $methodid ?>_rincian_button').show();
		 $("#form_new_fabric").hide();
		
		 var id = jQuery("#table_<?php echo $methodid ?>_detail").jqGrid('getGridParam','selrow');
		if (id) {
		  var row = jQuery("#table_<?php echo $methodid ?>_detail").jqGrid('getRowData',id); 
   
		  item_id = parseInt(unwrap_cell_value(row.r15).replace(/,/g, ''));
		  item_code = unwrap_cell_value(row.r6); 
		  purchase_order_warehouse_detail_id = parseInt(unwrap_cell_value(row.r20).replace(/,/g, ''));
		  purchase_order_warehouse_id = parseInt(unwrap_cell_value(row.r24).replace(/,/g, ''));
          	
          $('#form_<?php echo $methodid ?>_mdl_po_rincian_item_id').val(item_id);	
          $('#form_<?php echo $methodid ?>_mdl_po_rincian_purchase_order_warehouse_id').val(purchase_order_warehouse_id);
          $('#form_<?php echo $methodid ?>_mdl_po_rincian_purchase_order_warehouse_detail_id').val(purchase_order_warehouse_detail_id);		  
		
		 $("#table_<?php echo $methodid ?>_mdl_po_detail_rincian").trigger('reloadGrid');
		 $("#table_<?php echo $methodid ?>_mdl_po_detail_rincian").setGridWidth($('.grid_container_<?php echo $methodid; ?>_mdl_po_detail_rincian').width(1)-20,true).trigger('resize');
				
	     $('#modal_purchase_order_detail_rincian').modal('show');
		 
		 $('#form_<?php echo $methodid ?>_mdl_po_rincian_fabric_code').html('');
		 $('#form_<?php echo $methodid ?>_mdl_po_rincian_fabric_code').selectpicker('refresh');
		} else {
				show_error("show",'Error','Please select row');
	    }	
		
		
	}
	
	function add_detail_rincian_<?php echo $methodid ?>(){
	
		$('.form_<?php echo $methodid ?>_rincian_add').show();
		$('.form_<?php echo $methodid ?>_rincian_button').hide();
		
		$('#form_<?php echo $methodid ?>_mdl_po_rincian_fabric_code').html('');
		$('#form_<?php echo $methodid ?>_mdl_po_rincian_fabric_code').selectpicker('refresh');
		$('#form_<?php echo $methodid ?>_mdl_po_rincian_item_fabric_code').val('');
		$('#form_<?php echo $methodid ?>_mdl_po_rincian_item_fabric_name').val('');
		$('#form_<?php echo $methodid ?>_mdl_po_rincian_po_detail_rincian_id').val('');
	
		//$("#form_<?php echo $methodid ?>_mdl_po_rincian_fabric_code").val();
		//change_form_<?php echo $methodid ?>_mdl_po_rincian_fabric_code(null);
		$("#form_new_fabric").hide();
		
		//const  item_id= $("#form_<?php echo $methodid ?>_mdl_po_rincian_fabric_code").val();
		//alert (item_id);
	}
	
	function cancel_detail_rincian_<?php echo $methodid ?>(){
	    $('.form_<?php echo $methodid ?>_rincian_add').hide();
		//$('.form_<?php echo $methodid ?>_detail_update').show();	
		$('.form_<?php echo $methodid ?>_rincian_button').show();
		//$('#form_<?php echo $methodid ?>_mdl_po_rincian_fabric_code').val();
		
		//$("#form_new_fabric").hide();
	//$('.form_<?php echo $methodid ?>_shipment_upload_file').hide();
		
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
		$('#form_<?php echo $methodid ?>_detail_purchase_order_warehouse_detail_id').val('');
		$('#form_<?php echo $methodid ?>_detail_po_content').val('');
		$('#form_<?php echo $methodid ?>_detail_colour').val('');
		
		$('#form_<?php echo $methodid ?>_detail_item_id').html('');
		$('#form_<?php echo $methodid ?>_detail_item_id').selectpicker('refresh');
		
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