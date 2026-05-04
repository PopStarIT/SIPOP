<script type="text/javascript">
	var new_warehouse_return = 1;
	var warehouse_return_id = 0;
	var warehouse_return_bom_id = 0;
	var warehouse_return_quantity = 0;
	var warehouse_return_detail_id = 0;
	var warehouse_return_supply_id = 0;
	
	var idsOfSelectedRows_<?php echo $methodid ?>_material = [],
	updateIdsOfSelectedRows_<?php echo $methodid ?>_material = function (id, isSelected) {
		var index = $.inArray(id, idsOfSelectedRows_<?php echo $methodid ?>_material);
		var rowData = $("#table_<?php echo $methodid ?>_material").jqGrid('getRowData', id);
		if (!isSelected && index >= 0) {
			idsOfSelectedRows_<?php echo $methodid ?>_material.splice(index, 1); // remove id from the list
			rowData.r7 = 0;
			rowData.selected_row = 0;
		} else if (index < 0) {
			idsOfSelectedRows_<?php echo $methodid ?>_material.push(id);
			rowData.r7 = 1;
			rowData.selected_row = 1;
		}
		$("#table_<?php echo $methodid ?>_material").jqGrid('setRowData', id, rowData);
	};
	
	$(".form_tab_<?php echo $methodid ?>").on("click", "a", function (e) {
        if(this == '<?php echo base_url() ?>#content_<?php echo $methodid; ?>_detail'){
			e.preventDefault();
			page_loading("show",'Loading Item Detail','Please Wait...');
			
			idsOfSelectedRows_<?php echo $methodid ?>_material = [];
			
			$("#table_<?php echo $methodid ?>_material").trigger('clearToolbar');
			$("#table_<?php echo $methodid ?>_material").trigger("reloadGrid", { fromServer: true, page: 1 });
			
			setTimeout(function(){ 
				$("#table_<?php echo $methodid ?>_material").setGridWidth($('.grid_container_<?php echo $methodid; ?>_material').width() - 20,true).trigger('resize');
			}, 500);
		}
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
				,param: 'data_warehouse_return'
				,id : id
			},
			dataType: 'json',
			method: 'post',
			success: function(data){
				warehouse_return_id = data[0].warehouse_return_id;
				new_warehouse_return = 0;
									
				$('#form_<?php echo $methodid ?>_detail_quantity_return').val(0);
				
				$('#form_<?php echo $methodid ?>_warehouse_return_id').val(warehouse_return_id);
				$('#form_<?php echo $methodid ?>_warehouse_return_no').val(data[0].warehouse_return_no);
				$('#form_<?php echo $methodid ?>_warehouse_return_date').val(data[0].warehouse_return_date);
				
				$('#form_<?php echo $methodid ?>_detail_warehouse_return_id').val(warehouse_return_id);
				$('#form_<?php echo $methodid ?>_detail_warehouse_return_date').val(data[0].warehouse_return_date);
				
				$("#tab_<?php echo $methodid; ?>_detail").attr("data-toggle","tab");
				$("#tab_<?php echo $methodid; ?>_detail").removeClass( "tab_disabled");
			
												
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
						warehouse_return_date = $('#form_<?php echo $methodid ?>_warehouse_return_date').val();
									
						if(new_warehouse_return == 1){
							new_warehouse_return = 0;
							warehouse_return_id = data.warehouse_return_id;
							$('#form_<?php echo $methodid ?>_warehouse_return_id').val(warehouse_return_id);
							$('#form_<?php echo $methodid ?>_detail_warehouse_return_id').val(warehouse_return_id);
							$('#form_<?php echo $methodid ?>_detail_warehouse_return_date').val(warehouse_return_date);
								
								
							$("#tab_<?php echo $methodid; ?>_detail").attr("data-toggle","tab");
							$("#tab_<?php echo $methodid; ?>_detail").removeClass( "tab_disabled");
							$("#tab_<?php echo $methodid; ?>_detail").click();
							
							
													
							setTimeout(function(){ 
								$("#table_<?php echo $methodid ?>_material").trigger("reloadGrid", { fromServer: true, page: 1 });
								$("#table_<?php echo $methodid ?>_material").setGridWidth($('.grid_container_<?php echo $methodid; ?>_material').width() - 20,true).trigger('resize');
								$('.tab_scrollbar').getNiceScroll().resize(); 
							}, 500);													
						} else {
							new_warehouse_return = 1;
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
	
	$(function () {
		'use strict';
		$("#table_<?php echo $methodid ?>_material").jqGrid({
			datatype: "json",
			url: baseurl+'<?php echo $class_uri ?>/loaddata_material',
			mtype : "post",
			postData:{
				'q':'1'
				,'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>'
				, warehouse_return_date : function (){
						return $('#form_<?php echo $methodid ?>_detail_warehouse_return_date').val();	
					}
				, warehouse_return_id : function (){
						return $('#form_<?php echo $methodid ?>_detail_warehouse_return_id').val();	
					}
			},
			colNames:['item_id', 'Item Code', 'Item Name', 'Qauntity Available', 'Qauntity Material', 'Unit', 'r7', 'selected_row', 'Selected'],
			colModel:[
				{
					"name":"r1"
					,"index":"r1"
					,"width":120
					,"searchoptions":{"clearSearch":false}
					,"key":true
					,"title":"bom_detail_id"
					,"align":"right"
					,"hidden":true
				},
				{
					"name":"r2"
					,"index":"r2"
					,"width":120
					,"searchoptions":{"clearSearch":false}
					,"title":"item_code"
					,"align":"left"
					,"hidden":false
				},
				{
					"name":"r3"
					,"index":"r3"
					,"width":120
					,"searchoptions":{"clearSearch":false}
					,"title":"item_name"
					,"align":"left"
					,"hidden":false
				},
				{
					"name":"r4"
					,"index":"r4"
					,"width":120
					,"searchoptions":{"clearSearch":false}
					,"title":"quantity_available"
					,"align":"right"
				},
				{
					"name":"r5"
					,"index":"r5"
					,"width":120
					,"searchoptions":{"clearSearch":false}
					,"title":"quantity_material"
					,"align":"right"
					,editable: true
				},
				{
					"name":"r6"
					,"index":"r6"
					,"width":120
					,"searchoptions":{"clearSearch":false}
					,"title":"unit"
					,"align":"left"
					,"hidden":false
				},
				{
					"name":"r7"
					,"index":"r7"
					,"width":120
					,"searchoptions":{"clearSearch":false}
					,"title":"selected"
					,"align":"left"
					,"hidden":true
				},
				{
					"name":"selected_row"
					,"index":"selected_row"
					,"width":120
					,"searchoptions":{"clearSearch":false}
					,"title":"selected"
					,"align":"left"
					,"hidden":true
				},
				{
					"name":"selected"
					,"index":"selected"
					,"width":120
					,"searchoptions":{"clearSearch":false}
					,"title":"selected"
					,"align":"left"
					,"hidden":false
					,"formatter":"formatSelected"
				}
			],

			multiselect: true,
			sortname: 'r1',
			viewrecords: true,
			sortorder: "asc",
			height: 250,	
			shrinkToFit:false,
			jsonReader: { repeatitems : false },
			forceFit:true,
			cellEdit:true,
			loadonce : true,
			cellsubmit: 'clientArray',
			rownumbers: true,
			rowNum: 99999,
			pager: '#ptable_<?php echo $methodid ?>_material',
			onSelectRow: updateIdsOfSelectedRows_<?php echo $methodid ?>_material,
			onSelectAll: function (aRowids, isSelected) {
				var i, count, id;
				for (i = 0, count = aRowids.length; i < count; i++) {
					id = aRowids[i];
					updateIdsOfSelectedRows_<?php echo $methodid ?>_material(id, isSelected);
				}
			},
			loadComplete: function (data) {
				var rowData = $("#table_<?php echo $methodid ?>_material").getRowData();
				if(rowData.length==0){
					// alert(rowData.length);
					// page_loading("hide");
				} else {
					page_loading("hide");
					// page_loading("show",'Loading Item Detail','Please Wait...');
					for (var i = 0; i < rowData.length; i++) {
						if(rowData[i].r7 != 0 ){
							$(this).jqGrid('setSelection', rowData[i].r1, true);
							rowData.r7 = 1;
						}
						
						// if(i == rowData.length){
							// page_loading("hide");
						// }
					}
				}
				
				
				// alert(i);
				// alert(rowData.length);
				// $(this).jqGrid('setRowData', rowData[i].r1, rowData);	
				
				$('.tab_scrollbar').getNiceScroll().resize(); 
			}
		});
		
		$("#table_<?php echo $methodid ?>_material").jqGrid("setColProp", "rn", {hidedlg: false});
						
		$("#table_<?php echo $methodid ?>_material").jqGrid('navGrid','#ptable_<?php echo $methodid ?>_material',{edit:false,add:false,del:false,view:false, search: false});  
		$("#table_<?php echo $methodid ?>_material").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false, defaultSearch: 'cn', ignoreCase: false});  
		
	});
	
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
		$("#table_<?php echo $methodid ?>_material").trigger('clearToolbar');
		
		new_sales_order = 0;
		if(check_submit == 0) {
			check_submit = 1;
			
			var check_error = 0;
			var error_msg = '';
			
			var myArray = [];
			var rowsData = idsOfSelectedRows_<?php echo $methodid ?>_material;
			
			for (var i = 0; i < rowsData.length; i++) {
				
				var rowId = rowsData[i];
				var row = $('#table_<?php echo $methodid ?>_material').jqGrid ('getRowData', rowId);
				
				var item_code = unwrap_cell_value(row.r2).replace(/,/g, '');
				var quantity_material = parseFloat(unwrap_cell_value(row.r5).replace(/,/g, ''));
				var quantity_available = parseFloat(unwrap_cell_value(row.r4).replace(/,/g, ''));
				var idnya = parseFloat(unwrap_cell_value(row.r1).replace(/,/g, ''));
				
				if(quantity_available < quantity_material){
					check_error = 1;
					error_msg = 'Item Code : ' + item_code + ' Quantity insufficient';
				} 
				
				if (quantity_material > 0) {	
					myArray.push({'item_id':idnya,'quantity_material':quantity_material}); 
				} 
			}
			
			if (myArray.length == 0 ){
				show_error("show",'Error','Please select material');
				check_submit = 0;
			} else if (check_error != 0) {
				show_error("show",'Error',error_msg);
				check_submit = 0;
			} else {
				page_loading("show",'<?php echo $page_title ?> Detail','Please Wait...');
				var form_data = $("#form_<?php echo $methodid ?>_detail").serializeArray();
				var data = {
					'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>',                             
					material_list : myArray
				}
				
				for (var i = 0; i < form_data.length; i++){
					data[form_data[i]['name']] = form_data[i]['value'];
				}
				
				$.ajax({
					url: baseurl+'<?php echo $class_uri ?>/post_add_edit_detail',
					data: data,
					dataType: 'json',
					method: 'post',
					success: function(data){
						page_loading("hide");
						check_submit = 0;
						if(data.valid){
							show_success("show",'<?php echo $page_title ?>',data.message);	
							idsOfSelectedRows_<?php echo $methodid ?>_detail = [];
							
							$('#panel_content_<?php echo $methodid ?>').show();
							$('#panel_content_form_<?php echo $methodid ?>').hide();
							$("#table_<?php echo $methodid ?>").trigger('reloadGrid');
										
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
	}
	/* End Detail Function */
	
	var click_transfer_<?php echo $methodid ?> = function (id, isSelected) {
		$('#form_<?php echo $methodid ?>_supply_item_stock_move_id').val('');
		$('#form_<?php echo $methodid ?>_supply_warehouse_return_supply_id').val('');
		$('#form_<?php echo $methodid ?>_supply_quantity_supply').val(0);
		$('#form_<?php echo $methodid ?>_supply_from').val('');
		$('#form_<?php echo $methodid ?>_supply_receive_date').val('');
		$('#form_<?php echo $methodid ?>_supply_receive_no').val('');
		
		if (!isSelected) {
			$('#form_<?php echo $methodid ?>_supply_warehouse_return_detail_id').val('');
		} else {
			var row = jQuery("#table_<?php echo $methodid ?>_supply").jqGrid('getRowData',id);
			warehouse_return_detail_id = parseInt(unwrap_cell_value(row.r1).replace(/,/g, ''));
			$('#form_<?php echo $methodid ?>_supply_warehouse_return_detail_id').val(warehouse_return_detail_id);
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
			$('#form_<?php echo $methodid ?>_supply_warehouse_return_supply_id').val('');
			$('#form_<?php echo $methodid ?>_supply_quantity_supply').val(0);
			$('#form_<?php echo $methodid ?>_supply_from').val('');
			$('#form_<?php echo $methodid ?>_supply_receive_date').val('');
			$('#form_<?php echo $methodid ?>_supply_receive_no').val('');
		} else {
			var row = $("#table_<?php echo $methodid ?>_available").jqGrid('getRowData',id);
			stock_move_id = parseInt(unwrap_cell_value(row.r1).replace(/,/g, ''));
			from = unwrap_cell_value(row.r2);
			receive_date = unwrap_cell_value(row.r3);
			receive_no = unwrap_cell_value(row.r4);
			quantity_supply = parseFloat(unwrap_cell_value(row.r7).replace(/,/g, ''));
			warehouse_return_supply_id = '';
			
			var row_supply = $("#table_<?php echo $methodid ?>_list_transfer").jqGrid('getRowData',id);
			if(unwrap_cell_value(row_supply.r1) == id){
				warehouse_return_supply_id = parseInt(unwrap_cell_value(row_supply.r13).replace(/,/g, ''));
				quantity_supply = parseFloat(unwrap_cell_value(row_supply.r7).replace(/,/g, ''));
				
				var table_available = $("#table_<?php echo $methodid ?>_list_transfer").jqGrid('getGridParam','selrow');
				if(table_available != id){
					$('#table_<?php echo $methodid ?>_list_transfer').jqGrid('setSelection',id);
				}
			} else {
				$("#table_<?php echo $methodid ?>_list_transfer").jqGrid("resetSelection");
			}
			
			
			$('#form_<?php echo $methodid ?>_supply_stock_move_id').val(stock_move_id);
			$('#form_<?php echo $methodid ?>_supply_warehouse_return_supply_id').val(warehouse_return_supply_id);
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
			$('#form_<?php echo $methodid ?>_supply_warehouse_return_supply_id').val('');
			$('#form_<?php echo $methodid ?>_supply_quantity_supply').val(0);
			$('#form_<?php echo $methodid ?>_supply_from').val('');
			$('#form_<?php echo $methodid ?>_supply_receive_date').val('');
			$('#form_<?php echo $methodid ?>_supply_receive_no').val('');
		} else {
			var row = $("#table_<?php echo $methodid ?>_list_transfer").jqGrid('getRowData',id);
			stock_move_id = parseInt(unwrap_cell_value(row.r1).replace(/,/g, ''));
			from = unwrap_cell_value(row.r2);
			receive_date = unwrap_cell_value(row.r3);
			receive_no = unwrap_cell_value(row.r4);
			warehouse_return_supply_id = parseInt(unwrap_cell_value(row.r13).replace(/,/g, ''));
			quantity_supply = parseFloat(unwrap_cell_value(row.r7).replace(/,/g, ''));
			
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
			$('#form_<?php echo $methodid ?>_supply_warehouse_return_supply_id').val(warehouse_return_supply_id);
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
				,param: 'data_warehouse_return'
				,id : id
			},
			dataType: 'json',
			method: 'post',
			success: function(data){
				warehouse_return_id = data[0].warehouse_return_id;
				
				$('#form_<?php echo $methodid ?>_supply_warehouse_return_id').val(warehouse_return_id);
				$('#form_<?php echo $methodid ?>_supply_warehouse_return_detail_id').val('');
				$('#form_<?php echo $methodid ?>_supply_warehouse_return_no').val(data[0].warehouse_return_no);
				$('#form_<?php echo $methodid ?>_supply_warehouse_return_date').val(data[0].warehouse_return_date);

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
						data: {'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>',warehouse_return_id:warehouse_return_id},
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
						data: {'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>',warehouse_return_id:warehouse_return_id},
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