<script type="text/javascript">
	var new_stock_adjusment_assembly = 1;
	var stock_adjusment_assembly_id = 0;
	
	var stock_adjusment_assembly_quantity = 0;
	
	var idsOfSelectedRows_<?php echo $methodid ?>_detail = [],
	updateIdsOfSelectedRows_<?php echo $methodid ?>_detail = function (id, isSelected) {
		var index = $.inArray(id, idsOfSelectedRows_<?php echo $methodid ?>_detail);
		if (!isSelected && index >= 0) {
			idsOfSelectedRows_<?php echo $methodid ?>_detail.splice(index, 1); // remove id from the list
		} else if (index < 0) {
			idsOfSelectedRows_<?php echo $methodid ?>_detail.push(id);
		}
	};
	
	$(".form_tab_<?php echo $methodid ?>").on("click", "a", function (e) {
        e.preventDefault();
		idsOfSelectedRows_<?php echo $methodid ?>_detail = [];
		setTimeout(function(){ 
			
			$("#table_<?php echo $methodid ?>_detail").trigger("reloadGrid", { fromServer: true, page: 1 });
			$("#table_<?php echo $methodid ?>_detail").setGridWidth($('.grid_container_<?php echo $methodid; ?>_detail').width() - 20,true).trigger('resize');
			
			$("#table_<?php echo $methodid ?>_list").trigger('reloadGrid');
			$("#table_<?php echo $methodid ?>_list").setGridWidth($('.grid_container_<?php echo $methodid; ?>_list').width() - 20,true).trigger('resize');
			
			$('.tab_scrollbar').getNiceScroll().resize(); 
		}, 500);
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
				,param: 'data_stock_adjusment_assembly'
				,id : id
			},
			dataType: 'json',
			method: 'post',
			success: function(data){
				page_loading("hide");
				$('.button_<?php echo $methodid ?>_detail_edit').hide();
				$('.button_<?php echo $methodid ?>_detail_new').show();		
				
				new_stock_adjusment_assembly = 0;
				stock_adjusment_assembly_id = data[0].stock_adjusment_assembly_id;
								
				$('#form_<?php echo $methodid ?>_stock_adjusment_assembly_id').val(data[0].stock_adjusment_assembly_id);
				$('#form_<?php echo $methodid ?>_stock_adjusment_assembly_no').val(data[0].stock_adjusment_assembly_no);
				$('#form_<?php echo $methodid ?>_stock_adjusment_assembly_date').val(data[0].stock_adjusment_assembly_date);
				$('#form_<?php echo $methodid ?>_stock_adjusment_assembly_memo').val(data[0].stock_adjusment_assembly_memo);
				
				$('#form_<?php echo $methodid ?>_detail_stock_adjusment_assembly_id').val(data[0].stock_adjusment_assembly_id);
				$('#form_<?php echo $methodid ?>_detail_stock_adjusment_assembly_date').val(data[0].stock_adjusment_assembly_date);
				
				$("#tab_<?php echo $methodid; ?>_detail").attr("data-toggle","tab");
				$("#tab_<?php echo $methodid; ?>_detail").removeClass( "tab_disabled");
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
						
						stock_adjusment_assembly_plan_id = $('#form_<?php echo $methodid ?>_work_order_plan_id').val();
						stock_adjusment_assembly_work_process_id = $('#form_<?php echo $methodid ?>_work_process_id').val();
						
						if(new_stock_adjusment_assembly == 1){
							new_stock_adjusment_assembly = 0;
							$("#tab_<?php echo $methodid; ?>_detail").attr("data-toggle","tab");
							$("#tab_<?php echo $methodid; ?>_detail").removeClass( "tab_disabled");
							$("#tab_<?php echo $methodid; ?>_detail").click();
							stock_adjusment_assembly_id = data.stock_adjusment_assembly_id;
							
							$('#form_<?php echo $methodid ?>_stock_adjusment_assembly_id').val(stock_adjusment_assembly_id);
							$('#form_<?php echo $methodid ?>_detail_stock_adjusment_assembly_id').val(stock_adjusment_assembly_id);
							$('#form_<?php echo $methodid ?>_detail_work_order_plan_id').val(stock_adjusment_assembly_plan_id);
							$('#form_<?php echo $methodid ?>_detail_work_process_id').val(stock_adjusment_assembly_work_process_id);
								
							setTimeout(function(){ 
								$("#table_<?php echo $methodid ?>_detail").trigger('reloadGrid');
								$("#table_<?php echo $methodid ?>_detail").setGridWidth($('.grid_container_<?php echo $methodid; ?>_detail').width() - 20,true).trigger('resize');
								
								$("#table_<?php echo $methodid ?>_list").trigger('reloadGrid');
								$("#table_<?php echo $methodid ?>_list").setGridWidth($('.grid_container_<?php echo $methodid; ?>_list').width() - 20,true).trigger('resize');
								
								$('.tab_scrollbar').getNiceScroll().resize(); 
							}, 500);
							
						} else {
							new_stock_adjusment_assembly = 1;
							$('#panel_content_<?php echo $methodid ?>').show();
							$('#panel_content_form_<?php echo $methodid ?>').hide();
							$("#table_<?php echo $methodid ?>").trigger('reloadGrid');
						}
						
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
		
	/* Detail Function */	
		
	$(function () {
		'use strict';
		$("#table_<?php echo $methodid ?>_detail").jqGrid({
			datatype: "json",
			url: baseurl+'<?php echo $class_uri ?>/loaddata_item',
			mtype : "post",
			postData:{
					'q':'1'
					,'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>'
					, stock_adjusment_assembly_date : function (){
						return $('#form_<?php echo $methodid ?>_detail_stock_adjusment_assembly_date').val();	
					}
					, stock_adjusment_assembly_id : function (){
						return $('#form_<?php echo $methodid ?>_detail_stock_adjusment_assembly_id').val();	
					}
					
			},
			colNames:['item_id', 'Item Code', 'Item Name', 'Qauntity Existing', 'Unit', 'Quantity Valid', 'Info'],
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
					,"title":"item_code"
					,"align":"right"
					,"hidden":false
				},
				{
					"name":"r3"
					,"index":"r3"
					,"width":120
					,"searchoptions":{"clearSearch":false}
					,"title":"item_name"
					,"align":"right"
					,"hidden":false
				},
				{
					"name":"r4"
					,"index":"r4"
					,"width":120
					,"searchoptions":{"clearSearch":false}
					,"title":"quantity_available"
					,"align":"right"
					,"hidden":false
				},
				{
					"name":"r6"
					,"index":"r6"
					,"width":120
					,"searchoptions":{"clearSearch":false}
					,"title":"uom_code"
					,"align":"left"
				},
				{
					"name":"r5"
					,"index":"r5"
					,"width":120
					,"searchoptions":{"clearSearch":false}
					,"title":"quantity_valid"
					,"align":"right"
					,"hidden":false
					,editable: true
				},
				{
					"name":"r7"
					,"index":"r7"
					,"width":120
					,"searchoptions":{"clearSearch":false}
					,"title":"memo"
					,"align":"left"
					,"hidden":false
					,editable: true
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
			pager: '#ptable_<?php echo $methodid ?>_detail',
			onSelectRow: updateIdsOfSelectedRows_<?php echo $methodid ?>_detail,
			onSelectAll: function (aRowids, isSelected) {
				var i, count, id;
				for (i = 0, count = aRowids.length; i < count; i++) {
					id = aRowids[i];
					updateIdsOfSelectedRows_<?php echo $methodid ?>_detail(id, isSelected);
				}
			},
			loadComplete: function () {
				var $this = $(this), i, count;
				for (i = 0, count = idsOfSelectedRows_<?php echo $methodid ?>_detail.length; i < count; i++) {
					$this.jqGrid('setSelection', idsOfSelectedRows_<?php echo $methodid ?>_detail[i], false);
				}
			}
		});
		
		$("#table_<?php echo $methodid ?>_detail").jqGrid("setColProp", "rn", {hidedlg: false});
						
		$("#table_<?php echo $methodid ?>_detail").jqGrid('navGrid','#ptable_<?php echo $methodid ?>_detail',{edit:false,add:false,del:false,view:false, search: false});  
		$("#table_<?php echo $methodid ?>_detail").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false, defaultSearch: 'cn', ignoreCase: false});  
		
	});
	
	var jvalidate2 = $("#form_<?php echo $methodid ?>_detail").validate({
		ignore: [],
		rules: {                                            
			item_id: {
				required: true
			},
			'quantity_requested': {
				min: 0
			},
			'request_delivery_date': {
				required: true
			}
		} 
	});
	
	var check_submit = 0;
	function add_<?php echo $methodid ?>(){
		new_purchase_request = 0;
		if(check_submit == 0) {
			check_submit = 1;
			
			var myArray = [];
			var rowsData = idsOfSelectedRows_<?php echo $methodid ?>_detail;
			for (var i = 0; i < rowsData.length; i++) {
				
				var rowId = rowsData[i];
				var row = $('#table_<?php echo $methodid ?>_detail').jqGrid ('getRowData', rowId);
				
				var quantity_existing = parseFloat(unwrap_cell_value(row.r4).replace(/,/g, ''));
				var quantity_valid = parseFloat(unwrap_cell_value(row.r5).replace(/,/g, ''));
				var item_id = parseFloat(unwrap_cell_value(row.r1).replace(/,/g, ''));
				var info = unwrap_cell_value(row.r7).replace(/,/g, '');
				
				myArray.push({'item_id':item_id,'quantity_existing':quantity_existing,'quantity_valid':quantity_valid,'info':info}) ; 
				
			}

			if (myArray.length == 0 ){
				show_error("show",'Error','Please select item');
				check_submit = 0;
			} else {
				page_loading("show",'<?php echo $page_title ?> Detail','Please Wait...');
				var data = {
					'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>',                             
					stock_adjusment_assembly_list : myArray,
					stock_adjusment_assembly_id : $('#form_<?php echo $methodid ?>_detail_stock_adjusment_assembly_id').val()
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
							show_success("show",'<?php echo $page_title ?> Detail',data.message);	
							
							idsOfSelectedRows_<?php echo $methodid ?>_detail = [];
							
							$("#table_<?php echo $methodid ?>_detail").trigger("reloadGrid", { fromServer: true, page: 1 });
							$("#table_<?php echo $methodid ?>_list").trigger('reloadGrid');
							
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
</script>