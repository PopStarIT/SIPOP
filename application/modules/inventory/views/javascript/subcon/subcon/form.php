<script type="text/javascript">  
	var jvalidate = $("#form_<?php echo $methodid ?>").validate({
		ignore: [],
		rules: {                                            
			gl_account_group: {
				required: true
			}
		} 
	});
	
	//$("#table_<?php echo $methodid ?>_monitor_contract_subcon").trigger('reloadGrid');
	//$("#table_<?php echo $methodid ?>_monitor_contract_subcon").setGridWidth($('.grid_container_<?php echo $methodid; ?>_monitor_contract_subcon').width() - 20,true).trigger('resize');
	
	function edit_<?php echo $methodid ?>(id){
		$.ajax({
			url: baseurl+'loader',
			data: {
				'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'
				,param: 'data_contract_subcon'
				,id : id
			},
			dataType: 'json',
			method: 'post',
			success: function(data){
				$('#form_<?php echo $methodid ?>_contract_subcon_id').val(data[0].contract_subcon_id);
				$('#form_<?php echo $methodid ?>_contract_subcon_no').val(data[0].contract_subcon_no);
				$('#form_<?php echo $methodid ?>_contract_subcon_date_start').val(data[0].contract_subcon_date_start);
				
				change_form_<?php echo $methodid ?>_partner_id(data[0].partner_id);
				change_form_<?php echo $methodid ?>_inv_gl_account_id(data[0].inv_gl_account_id);
				
				setTimeout(function(){ 
					$('.tab_scrollbar').getNiceScroll().resize(); 
				}, 100);
			}
		});
	}
	
	function cancel_<?php echo $methodid ?>(){
		$('#panel_content_<?php echo $methodid ?>').show();
		$('#panel_content_form_<?php echo $methodid ?>').hide();
	}
	
	function save_<?php echo $methodid ?>(){
		$('#form_<?php echo $methodid ?>').submit();
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
	
	 $(function() {
		"use strict";
	
		$("#table_<?php echo $methodid ?>_monitor_contract_subcon").jqGrid({
			url: baseurl + '<?php echo $class_uri ?>/loaddata_monitor_contract',
			datatype: "json",
			mtype: "post",
			postData: {
				'q': '1',
				'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
				work_order_contract_id: 0
			},
			colNames: ['SUBCON ID','CONTRACT SUBCON NO','SUBCON OUT NO','SUBCON OUT DATE','PARTNER CODE','PARTNER NAME','ITEM CODE','ITEM NAME','QTY SUBCON','UNIT'],
		    colModel: [{name: 'r1',hidden: true,index: 'r1',align: 'center'},
					{name: 'r2',hidden: true,width:160,index: 'r2'},
					{name: 'r3',width:200,index:'r3'},
					{name: 'r4',width:100,index: 'r4'},
					{name: 'r5',hidden: true,width:100,index: 'r5'},
					{name: 'r6',width:250,index: 'r6'},
					{name: 'r7',width:100,index: 'r7'},
					{name: 'r8',width:250,index: 'r8'},
					{name: 'r9',width:120,index: 'r9'},
					{name: 'r10',width:80,index: 'r10',align:'center'}],
			iconSet: "fontAwesome",
            caption:".:: MONITORING CONTRACT SUBCON ::.",
            rownumbers: true,
			rowNum:10,
			rowList:[10,20,30],
			pager: '#ptable_<?php echo $methodid ?>_monitor_contract_subcon',
            sortname: "r1",
            sortorder: "asc",
			shrinkToFit:false,
			autowidth: true,
			height: 250,
            jsonReader: { repeatitems : false },
			viewrecords : true,
			gridview:true,
			footerrow: true,
			userDataOnFooter: true
			
			
		});
		$("#table_<?php echo $methodid ?>_monitor_contract_subcon").jqGrid("setColProp", "rn", {
			hidedlg: false
		});

		$("#table_<?php echo $methodid ?>_monitor_contract_subcon").jqGrid('navGrid', '#ptable_<?php echo $methodid ?>_monitor_contract_subcon', {
			edit: false,
			add: false,
			del: false,
			view: false,
			search: false
		});

		$("#table_<?php echo $methodid ?>_monitor_contract_subcon").jqGrid('filterToolbar', {
			stringResult: true,
			searchOnEnter: false,
			defaultSearch: 'cn',
			ignoreCase: false
		});
		
		
	  // $("#table_<?php echo $methodid ?>_monitor_contract_subcon").trigger('reloadGrid');
	 
	});
	
	//=============== Table untuk per item  tidak digunakan ================
		
	 $(function() {
		"use strict";
	
		$("#table_<?php echo $methodid ?>_monitor_subcon_per_item").jqGrid({
			url: baseurl + '<?php echo $class_uri ?>/loaddata_monitor_jml_per_item',
			datatype: "json",
			mtype: "post",
			postData: {
				'q': '1',
				'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
				work_order_contract_id: 0
			},
			colNames: ['SUBCON ID','ITEM_ID','CONTRACT NO','ITEM CODE','ITEM NAME','QTY TOTAL','UNIT'],
		    colModel: [{name: 'r1',hidden: true,index: 'r1',align: 'center'},
					{name: 'r2',hidden: true,index: 'r2'},
					{name: 'r3',hidden: true,index:'r3'},
					{name: 'r4',width:100,index: 'r4'},
					{name: 'r5',width:250,index: 'r5'},
					{name: 'r6',width:150,index: 'r6'},
					{name: 'r7',width:80,index: 'r7',align:'center'}],
			iconSet: "fontAwesome",
            caption:"Total Quantity Per Item",
            rownumbers: true,
			rowNum:10,
			rowList:[10,20,30],
			pager: '#ptable_<?php echo $methodid ?>_monitor_subcon_per_item',
            sortname: "r1",
            sortorder: "asc",
			shrinkToFit:false,
			autowidth: true,
			height: 200,
            jsonReader: { repeatitems : false },
			viewrecords : true,
			gridview:true,
			
			
		});
		$("#table_<?php echo $methodid ?>_monitor_subcon_per_item").jqGrid("setColProp", "rn", {
			hidedlg: false
		});

		$("#table_<?php echo $methodid ?>_monitor_subcon_per_item").jqGrid('navGrid', '#ptable_<?php echo $methodid ?>_monitor_subcon_per_item', {
			edit: false,
			add: false,
			del: false,
			view: false,
			search: false
		});

		$("#table_<?php echo $methodid ?>_monitor_subcon_per_item").jqGrid('filterToolbar', {
			stringResult: true,
			searchOnEnter: false,
			defaultSearch: 'cn',
			ignoreCase: false
		});
		
		
	  // $("#table_<?php echo $methodid ?>_monitor_contract_subcon").trigger('reloadGrid');
	 
	});
</script>