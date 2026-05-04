<script type="text/javascript">
	var new_work_order_plan = 1;
	var work_order_plan_type_id = 1;
	var work_order_plan_id = 1;
	
	var idsOfSelectedRows_<?php echo $methodid ?>_forecast = [],
	updateIdsOfSelectedRows_<?php echo $methodid ?>_forecast = function (id, isSelected) {
		var index = $.inArray(id, idsOfSelectedRows_<?php echo $methodid ?>_forecast);
		if (!isSelected && index >= 0) {
			idsOfSelectedRows_<?php echo $methodid ?>_forecast.splice(index, 1); // remove id from the list
		} else if (index < 0) {
			idsOfSelectedRows_<?php echo $methodid ?>_forecast.push(id);
		}
	};
	
	
	$(".form_tab_<?php echo $methodid ?>").on("click", "a", function (e) {
        e.preventDefault();
		setTimeout(function(){ 
			$("#table_<?php echo $methodid ?>_detail").trigger('reloadGrid');
			$("#table_<?php echo $methodid ?>_detail").setGridWidth($('.grid_container_<?php echo $methodid; ?>_detail').width() - 20,true).trigger('resize');
			$("#table_<?php echo $methodid ?>_material").trigger('reloadGrid');
			$("#table_<?php echo $methodid ?>_material").setGridWidth($('.grid_container_<?php echo $methodid; ?>_material').width() - 20,true).trigger('resize');
			$("#table_<?php echo $methodid ?>_forecast").trigger('reloadGrid');
			$("#table_<?php echo $methodid ?>_forecast").setGridWidth($('.grid_container_<?php echo $methodid; ?>_forecast').width() - 20,true).trigger('resize');
			
			$('.tab_scrollbar').getNiceScroll().resize(); 
		}, 500);
    });
	
	$('#form_<?php echo $methodid ?>_work_order_plan_type_id ').on('change', function (event, clickedIndex, newValue, oldValue) {
		work_order_plan_type_id = $('#form_<?php echo $methodid ?>_work_order_plan_type_id').val();;
		if(work_order_plan_type_id == 1){
			$('.production_plan_type_sales').show();
			$('.production_plan_type_subcon').hide();
		} else {
			$('.production_plan_type_sales').hide();
			$('.production_plan_type_subcon').show();
		}
		// purchase_order_get_purchase_data();
	});
	
	$('#form_<?php echo $methodid ?>_detail_item_id').on('change', function (event, clickedIndex, newValue, oldValue) {
		$('#form_<?php echo $methodid ?>_detail_bom_process_id').html('');
		$('#form_<?php echo $methodid ?>_detail_bom_process_id').selectpicker('refresh');
		change_form_<?php echo $methodid ?>_detail_bom_process_id();
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
			purchase_request_no: {
				required: true
			},
			purchase_request_date:{
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
				,param: 'data_work_order_plan'
				,id : id
			},
			dataType: 'json',
			method: 'post',
			success: function(data){
				page_loading("hide");
				$('.button_<?php echo $methodid ?>_detail_edit').hide();
				$('.button_<?php echo $methodid ?>_detail_new').show();		
				
				new_work_order_plan = 0;
				work_order_plan_id = data[0].work_order_plan_id;
				
				$("#tab_<?php echo $methodid; ?>_header").attr("data-toggle","tab");
				$("#tab_<?php echo $methodid; ?>_header").removeClass( "tab_disabled");
				
				$("#tab_<?php echo $methodid; ?>_detail").attr("data-toggle","tab");
				$("#tab_<?php echo $methodid; ?>_detail").removeClass( "tab_disabled");
				
				$("#tab_<?php echo $methodid; ?>_material").removeAttr("data-toggle");
				$("#tab_<?php echo $methodid; ?>_material").addClass( "tab_disabled");
		
				$("#tab_<?php echo $methodid; ?>_forecast").removeAttr("data-toggle");
				$("#tab_<?php echo $methodid; ?>_forecast").addClass( "tab_disabled");
		
				$('#form_<?php echo $methodid ?>_work_order_plan_id').val(data[0].work_order_plan_id);
				$('#form_<?php echo $methodid ?>_work_order_plan_detail_work_order_plan_id').val(data[0].work_order_plan_id);
				$('#form_<?php echo $methodid ?>_work_order_plan_no').val(data[0].work_order_plan_no);
				$('#form_<?php echo $methodid ?>_work_order_plan_date').val(data[0].work_order_plan_date);
				$('#form_<?php echo $methodid ?>_work_order_required_date').val(data[0].work_order_required_date);
				
				change_form_<?php echo $methodid ?>_work_order_plan_type_id(data[0].work_order_plan_type_id);
				change_form_<?php echo $methodid ?>_sales_order_id(data[0].sales_order_id);
				change_form_<?php echo $methodid ?>_contract_subcon_id(data[0].contract_subcon_id);
				
				$('#form_<?php echo $methodid ?>_detail_work_order_plan_id').val(data[0].work_order_plan_id);
				$("#tab_<?php echo $methodid; ?>_header").click();
			}
		});
	}
	
	function material_<?php echo $methodid?>(id){
		page_loading("show",'<?php echo $page_title ?>','Please Wait...');
		$.ajax({
			url: baseurl+'loader',
			data: {
				'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'
				,param: 'data_work_order_plan'
				,id : id
			},
			dataType: 'json',
			method: 'post',
			success: function(data){
				page_loading("hide");
				$('.button_<?php echo $methodid ?>_detail_edit').hide();
				$('.button_<?php echo $methodid ?>_detail_new').show();		
				
				new_work_order_plan = 0;
				work_order_plan_id = data[0].work_order_plan_id;
				
				$("#tab_<?php echo $methodid; ?>_material").attr("data-toggle","tab");
				$("#tab_<?php echo $methodid; ?>_material").removeClass( "tab_disabled");
				
				$("#tab_<?php echo $methodid; ?>_header").removeAttr("data-toggle");
				$("#tab_<?php echo $methodid; ?>_header").addClass( "tab_disabled");
		
				$("#tab_<?php echo $methodid; ?>_detail").removeAttr("data-toggle");
				$("#tab_<?php echo $methodid; ?>_detail").addClass( "tab_disabled");
		
				$("#tab_<?php echo $methodid; ?>_forecast").removeAttr("data-toggle");
				$("#tab_<?php echo $methodid; ?>_forecast").addClass( "tab_disabled");
		
				$('#form_<?php echo $methodid ?>_material_work_order_plan_id').val(data[0].work_order_plan_id);
				$('#form_<?php echo $methodid ?>_material_work_order_plan_no').val(data[0].work_order_plan_no);
				$('#form_<?php echo $methodid ?>_material_work_order_plan_date').val(data[0].work_order_plan_date);
				$('#form_<?php echo $methodid ?>_material_work_order_required_date').val(data[0].work_order_required_date);
				$('#form_<?php echo $methodid ?>_material_work_order_plan_type').val(data[0].type);
				$('#form_<?php echo $methodid ?>_material_contract_subcon_no').val(data[0].contract_subcon_no);
				
				$("#tab_<?php echo $methodid; ?>_material").click();
			}
		});
	}
		
	function forecast_<?php echo $methodid?>(id){
		page_loading("show",'<?php echo $page_title ?>','Please Wait...');
		$.ajax({
			url: baseurl+'loader',
			data: {
				'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'
				,param: 'data_work_order_plan'
				,id : id
			},
			dataType: 'json',
			method: 'post',
			success: function(data){
				page_loading("hide");
				$('.button_<?php echo $methodid ?>_detail_edit').hide();
				$('.button_<?php echo $methodid ?>_detail_new').show();		
				
				new_work_order_plan = 0;
				work_order_plan_id = data[0].work_order_plan_id;
				
				$("#tab_<?php echo $methodid; ?>_forecast").attr("data-toggle","tab");
				$("#tab_<?php echo $methodid; ?>_forecast").removeClass( "tab_disabled");
				
				$("#tab_<?php echo $methodid; ?>_header").removeAttr("data-toggle");
				$("#tab_<?php echo $methodid; ?>_header").addClass( "tab_disabled");
		
				$("#tab_<?php echo $methodid; ?>_detail").removeAttr("data-toggle");
				$("#tab_<?php echo $methodid; ?>_detail").addClass( "tab_disabled");
		
				$("#tab_<?php echo $methodid; ?>_material").removeAttr("data-toggle");
				$("#tab_<?php echo $methodid; ?>_material").addClass( "tab_disabled");
		
				$('#form_<?php echo $methodid ?>_forecast_work_order_plan_id').val(data[0].work_order_plan_id);
				$('#form_<?php echo $methodid ?>_forecast_work_order_plan_no').val(data[0].work_order_plan_no);
				$('#form_<?php echo $methodid ?>_forecast_work_order_plan_date').val(data[0].work_order_plan_date);
				$('#form_<?php echo $methodid ?>_forecast_work_order_required_date').val(data[0].work_order_required_date);
				$('#form_<?php echo $methodid ?>_forecast_work_order_plan_type').val(data[0].type);
				$('#form_<?php echo $methodid ?>_forecast_contract_subcon_no').val(data[0].contract_subcon_no);
				
				$("#table_<?php echo $methodid ?>_forecast").trigger("reloadGrid", { fromServer: true, page: 1 });
				idsOfSelectedRows_<?php echo $methodid ?>_forecast = [];
			
				$("#tab_<?php echo $methodid; ?>_forecast").click();
			}
		});
	}
		
	var check_submit = 0;
	function post_<?php echo $methodid ?>(){
		if(check_submit == 0) {
			check_submit = 1;
			page_loading("show",'<?php echo $page_title ?>','Please Wait...');
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
						
						if(new_work_order_plan == 1){
							new_work_order_plan = 0;
							$("#tab_<?php echo $methodid; ?>_detail").attr("data-toggle","tab");
							$("#tab_<?php echo $methodid; ?>_detail").removeClass( "tab_disabled");
							$("#tab_<?php echo $methodid; ?>_detail").click();
							work_order_plan_id = data.work_order_plan_id;
							$('#form_<?php echo $methodid ?>_work_order_plan_id').val(work_order_plan_id);
							$('#form_<?php echo $methodid ?>_detail_work_order_plan_id').val(work_order_plan_id);
								
							setTimeout(function(){ 
								$("#table_<?php echo $methodid ?>_detail").trigger('reloadGrid');
								$("#table_<?php echo $methodid ?>_detail").setGridWidth($('.grid_container_<?php echo $methodid; ?>_detail').width() - 20,true).trigger('resize');
								$('.tab_scrollbar').getNiceScroll().resize(); 
							}, 500);
							

						} else {
							new_work_order_plan = 1;
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
	
	var jvalidate2 = $("#form_<?php echo $methodid ?>_work_order_plan_detail").validate({
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
		new_purchase_request = 0;
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
	
	function edit_detail_<?php echo $methodid ?>(work_order_id){
		page_loading("show",'<?php echo $page_title ?>','Please Wait...');
		$.ajax({
			url: baseurl+'loader',
			data: {
				'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'
				,param: 'data_work_order'
				,id : work_order_id
			},
			dataType: 'json',
			method: 'post',
			success: function(data){
				page_loading("hide");
				$('.button_<?php echo $methodid ?>_detail_edit').show();
				$('.button_<?php echo $methodid ?>_detail_new').hide();		
				
				$('#form_<?php echo $methodid ?>_detail_work_order_plan_id').val(data[0].work_order_plan_id);
				$('#form_<?php echo $methodid ?>_detail_work_order_id').val(data[0].work_order_id);
				$('#form_<?php echo $methodid ?>_detail_quantity_plan').val(data[0].quantity_plan);
				$('#form_<?php echo $methodid ?>_detail_mark_up_material').val(data[0].mark_up_material);

				change_form_<?php echo $methodid ?>_detail_item_id(data[0].item_id);
				change_form_<?php echo $methodid ?>_detail_bom_process_id(data[0].bom_process_id);
							
			}
		});
	}
	
	function delete_detail_<?php echo $methodid ?>(work_order_id){
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
						data: {'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>',work_order_id:work_order_id},
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
		$('#form_<?php echo $methodid ?>_detail_work_order_id').val('');
		$('#form_<?php echo $methodid ?>_detail_quantity_plan').val(0);
		$('#form_<?php echo $methodid ?>_detail_mark_up_material').val(0);
				
		$('.button_<?php echo $methodid ?>_detail_edit').hide();
		$('.button_<?php echo $methodid ?>_detail_new').show();				
	}
	
	$(function () {
		'use strict';
		$("#table_<?php echo $methodid ?>_forecast").jqGrid({
			datatype: "json",
			url: baseurl+'<?php echo $class_uri ?>/loaddata_forecast_material',
			mtype : "post",
			postData:{
					'q':'1'
					,'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>'
					, work_order_plan_id : function (){
							return $('#form_<?php echo $methodid ?>_forecast_work_order_plan_id').val();	
						}
					
			},
			colNames:['item_id','work_order_plan_id', 'Item Code', 'Item Name' , 'Available', 'Required', 'Less', 'Unit'],
			colModel:[
				{
					"name":"r1"
					,"index":"r1"
					,"width":120
					,"searchoptions":{"clearSearch":false}
					,"key":true
					,"title":"item_id"
					,"align":"right"
					,"hidden":true
				},
				{
					"name":"r2"
					,"index":"r2"
					,"width":120
					,"searchoptions":{"clearSearch":false}
					,"title":"work_order_plan_id"
					,"align":"right"
					,"hidden":true
				},
				{
					"name":"r3"
					,"index":"r3"
					,"width":120
					,"searchoptions":{"clearSearch":false}
					,"title":"item_code"
					,"align":"right"
					,"hidden":false
				},
				{
					"name":"r4"
					,"index":"r4"
					,"width":120
					,"searchoptions":{"clearSearch":false}
					,"title":"item_name"
					,"align":"right"
					,"hidden":false
				},
				{
					"name":"r5"
					,"index":"r5"
					,"width":120
					,"searchoptions":{"clearSearch":false}
					,"title":"available"
					,"align":"right"
				},
				{
					"name":"r6"
					,"index":"r6"
					,"width":120
					,"searchoptions":{"clearSearch":false}
					,"title":"required"
					,"align":"right"
					,"hidden":false
				},
				{
					"name":"r7"
					,"index":"r7"
					,"width":120
					,"searchoptions":{"clearSearch":false}
					,"title":"less"
					,"align":"right"
					,"hidden":false
					,editable: true
				},
				{
					"name":"r8"
					,"index":"r8"
					,"width":120
					,"searchoptions":{"clearSearch":false}
					,"title":"uom_code"
					,"align":"left"
					,"hidden":false
				}
			],
			rowNum:-1,
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
			pager: '#ptable_<?php echo $methodid ?>_forecast',
			onSelectRow: updateIdsOfSelectedRows_<?php echo $methodid ?>_forecast,
			onSelectAll: function (aRowids, isSelected) {
				var i, count, id;
				for (i = 0, count = aRowids.length; i < count; i++) {
					id = aRowids[i];
					updateIdsOfSelectedRows_<?php echo $methodid ?>_forecast(id, isSelected);
				}
			},
			loadComplete: function () {
				var $this = $(this), i, count;
				for (i = 0, count = idsOfSelectedRows_<?php echo $methodid ?>_forecast.length; i < count; i++) {
					$this.jqGrid('setSelection', idsOfSelectedRows_<?php echo $methodid ?>_forecast[i], false);
				}
			}
		});
		
		$("#table_<?php echo $methodid ?>_forecast").jqGrid("setColProp", "rn", {hidedlg: false});
						
		$("#table_<?php echo $methodid ?>_forecast").jqGrid('navGrid','#ptable_<?php echo $methodid ?>_forecast',{edit:false,add:false,del:false,view:false, search: false});  
		$("#table_<?php echo $methodid ?>_forecast").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false, defaultSearch: 'cn', ignoreCase: false});  
		
	});
	
	
	
	var check_submit = 0;
	function add_<?php echo $methodid ?>_forecast(){
		new_purchase_request = 0;
		if(check_submit == 0) {
			check_submit = 1;
			
			var myArray = [];
			var rowsData = idsOfSelectedRows_<?php echo $methodid ?>_forecast;
			for (var i = 0; i < rowsData.length; i++) {
				
				var rowId = rowsData[i];
				var row = $('#table_<?php echo $methodid ?>_forecast').jqGrid ('getRowData', rowId);
				
				var qty_mat = parseFloat(unwrap_cell_value(row.r7).replace(/,/g, ''));
				var idnya = parseFloat(unwrap_cell_value(row.r1).replace(/,/g, ''));
				
				if (qty_mat > 0) {	
					myArray.push({'item_id':idnya,'quantity_request':qty_mat}) ; 
				} 
			}

			if (myArray.length == 0 ){
				show_error("show",'Error','Please select material');
				check_submit = 0;
			} else {
				page_loading("show",'<?php echo $page_title ?> Forecast','Please Wait...');
				var data = {
					'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>',                             
					request_list : myArray,
					work_order_plan_id : $('#form_<?php echo $methodid ?>_forecast_work_order_plan_id').val()					
				}
				
				$.ajax({
					url: baseurl+'<?php echo $class_uri ?>/post_forecast_to_purchase',
					data: data,
					dataType: 'json',
					method: 'post',
					success: function(data){
						page_loading("hide");
						check_submit = 0;
						if(data.valid){
							show_success("show",'<?php echo $page_title ?> Forecast',data.message);	
							
							idsOfSelectedRows_<?php echo $methodid ?>_forecast = [];
							
							cancel_<?php echo $methodid ?>();
							
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
	
</script>