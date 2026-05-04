<script type="text/javascript">
//$(function () {
//        "use strict";
//var lastsel2
//jQuery("#rowed5").jqGrid({
//	datatype: "local",
//	height: 250,
//   	colNames:['ID Number','Name', 'Stock', 'Ship via','Notes'],
//   	colModel:[
//   		{name:'id',index:'id', width:90, sorttype:"int", editable: true},
//   		{name:'name',index:'name', width:150,editable: true,editoptions:{size:"20",maxlength:"30"}},
//   		{name:'stock',index:'stock', width:60, editable: true,edittype:"checkbox",editoptions: {value:"Yes:No"}},
//   		//{name:'ship',index:'ship', width:90, editable: true,edittype:"select",editoptions:{value:'FE:FedEx;IN:InTime;TN:TNT;AR:ARAMEX'}},	
//        {name:'ship',index:'ship', width:90, editable: true,edittype:"select",editoptions:{value:"FE:FedEx;IN:InTime;TN:TNT;AR:ARAMEX"}},			
//		{name:'note',index:'note', width:200, sortable:false,editable: true,edittype:"textarea", editoptions:{rows:"2",cols:"10"}}		
//   	],
//	onSelectRow: function(id){
//		if(id && id!==lastsel2){
//			jQuery('#rowed5').jqGrid('restoreRow',lastsel2);
//			jQuery('#rowed5').jqGrid('editRow',id,true);
//			lastsel2=id;
//		}
//	},
//	editurl: "server.php",
//	caption: "Input Types"
//
//  });
//
//var mydata2 = [
//		{id:"12345",name:"Desktop Computer",note:"note",stock:"Yes",ship:"FedEx"},
//		{id:"23456",name:"Laptop",note:"Long text ",stock:"Yes",ship:"InTime"},
//		{id:"34567",name:"LCD Monitor",note:"note3",stock:"Yes",ship:"TNT"},
//		{id:"45678",name:"Speakers",note:"note",stock:"No",ship:"ARAMEX"},
//		{id:"56789",name:"Laser Printer",note:"note2",stock:"Yes",ship:"FedEx"},
//		{id:"67890",name:"Play Station",note:"note3",stock:"No", ship:"FedEx"},
//		{id:"76543",name:"Mobile Telephone",note:"note",stock:"Yes",ship:"ARAMEX"},
//		{id:"87654",name:"Server",note:"note2",stock:"Yes",ship:"TNT"},
//		{id:"98765",name:"Matrix Printer",note:"note3",stock:"No", ship:"FedEx"}
//		];
//for(var i=0;i < mydata2.length;i++){
// jQuery("#rowed5").jqGrid('addRowData',mydata2[i].id,mydata2[i]);
//};
//
//});

	var new_grn = 1;
	var grn_id = 0;
	var grn_lock_data = 0;
	var grn_type_id = 1;
	var grn_partner_id = 0;
	var grn_bc_in_header_id = null;
	var grn_purchase_order_id = null;
	
	$(".form_tab_<?php echo $methodid ?>").on("click", "a", function (e) {
        e.preventDefault();
		setTimeout(function(){ 
			$("#table_<?php echo $methodid ?>_detail").trigger('reloadGrid');
			$("#table_<?php echo $methodid ?>_detail").setGridWidth($('.grid_container_<?php echo $methodid; ?>_detail').width() - 20,true).trigger('resize');
			
			$("#table_<?php echo $methodid ?>_purchase").trigger('reloadGrid');
			$("#table_<?php echo $methodid ?>_purchase").setGridWidth($('.grid_container_<?php echo $methodid; ?>_purchase').width() - 20,true).trigger('resize');
						
			$("#table_<?php echo $methodid ?>_custom").trigger('reloadGrid');
			$("#table_<?php echo $methodid ?>_custom").setGridWidth($('.grid_container_<?php echo $methodid; ?>_custom').width() - 20,true).trigger('resize');
						
			$('.tab_scrollbar').getNiceScroll().resize(); 
		}, 1000);
    });
	
	$('#form_<?php echo $methodid ?>_partner_id').on('change', function (event, clickedIndex, newValue, oldValue) {
		$('#form_<?php echo $methodid ?>_bc_in_header_id').html('');
		$('#form_<?php echo $methodid ?>_bc_in_header_id').selectpicker('refresh');
		
		$('#form_<?php echo $methodid ?>_purchase_order_id').html('');
		$('#form_<?php echo $methodid ?>_purchase_order_id').selectpicker('refresh');
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
	
	function edit_<?php echo $methodid ?>(id){
		$.ajax({
			url: baseurl+'loader',
			data: {
				'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'
				,param: 'data_grn'
				,id : id
			},
			dataType: 'json',
			method: 'post',
			success: function(data){
				$("#tab_<?php echo $methodid; ?>_detail").attr("data-toggle","tab");
				$("#tab_<?php echo $methodid; ?>_detail").removeClass( "tab_disabled");
				
				new_grn = 0;
				grn_id = id;
				grn_lock_data = data[0].lock_data;
				grn_bc_in_header_id = data[0].bc_in_header_id;
				grn_purchase_order_id = data[0].purchase_order_id;
				grn_partner_id = data[0].partner_id;
				grn_type_id = data[0].grn_type_id;
				
				$('#form_<?php echo $methodid ?>_grn_id').val(data[0].grn_id);
				$('#form_<?php echo $methodid ?>_grn_type_id').val(data[0].grn_type_id);
				$('#form_<?php echo $methodid ?>_grn_no').val(data[0].grn_no);
				$('#form_<?php echo $methodid ?>_grn_date').val(data[0].grn_date);
				$('#form_<?php echo $methodid ?>_no_surat_jalan').val(data[0].delivery_no);
				$('#form_<?php echo $methodid ?>_tgl_surat_jalan').val(data[0].delivery_date);
				
				$('#form_<?php echo $methodid ?>_detail_grn_id').val(data[0].grn_id);
				$('#form_<?php echo $methodid ?>_detail_grn_detail_id').val('');
				$('#form_<?php echo $methodid ?>_detail_partner_id').val(grn_partner_id);
				$('#form_<?php echo $methodid ?>_detail_purchase_order_id').val(grn_purchase_order_id);
				$('#form_<?php echo $methodid ?>_detail_bc_in_header_id').val(grn_bc_in_header_id);
				
				change_form_<?php echo $methodid ?>_partner_id(data[0].partner_id);
				
				if(grn_type_id == 1){
					$('.panel_<?php echo $methodid ?>_panel_custom_order').hide();
					$('.panel_<?php echo $methodid ?>_panel_purchase_order').show();
					$('.select_<?php echo $methodid ?>_from_purchase').show();
					$('.select_<?php echo $methodid ?>_from_custom').hide();
					setTimeout(function(){ 
						change_form_<?php echo $methodid ?>_purchase_order_id(data[0].purchase_order_id);
						
						$('.tab_scrollbar').getNiceScroll().resize(); 
					}, 500);
				} else {
					$('.panel_<?php echo $methodid ?>_panel_custom_order').show();
					$('.panel_<?php echo $methodid ?>_panel_purchase_order').hide();
					$('.select_<?php echo $methodid ?>_from_purchase').hide();
					$('.select_<?php echo $methodid ?>_from_custom').show();
					
					setTimeout(function(){ 
						change_form_<?php echo $methodid ?>_bc_in_header_id(data[0].bc_in_header_id);
						
						$('.tab_scrollbar').getNiceScroll().resize(); 
					}, 500);
				}				
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
						
						new_grn = data.new_grn;
						grn_id = data.grn_id;
						//grn_lock_data = data.lock_data;
						grn_bc_in_header_id = data.bc_in_header_id;
						grn_purchase_order_id = data.purchase_order_id;
						grn_partner_id = data.partner_id;
						grn_type_id = data.grn_type_id;
						
						grn_warehouse_id = data.grn_warehouse_id;
						fabric_shipment_id= data.fabric_shipment_id;
						
						if(new_grn == 1){
							new_grn = 0;
							$("#tab_<?php echo $methodid; ?>_detail").attr("data-toggle","tab");
							$("#tab_<?php echo $methodid; ?>_detail").removeClass( "tab_disabled");
							$("#tab_<?php echo $methodid; ?>_detail").click();
							
							
							$('#form_<?php echo $methodid ?>_grn_id').val(grn_id);
							$('#form_<?php echo $methodid ?>_detail_grn_id').val(grn_id);
							$('#form_<?php echo $methodid ?>_detail_partner_id').val(data.partner_id);
							$('#form_<?php echo $methodid ?>_detail_purchase_order_id').val(data.purchase_order_id);
							$('#form_<?php echo $methodid ?>_detail_bc_in_header_id').val(data.bc_in_header_id);
							$('#form_<?php echo $methodid ?>_detail_grn_detail_id').val('');
							
							$('#form_<?php echo $methodid ?>_grn_warehouse_id').val(grn_warehouse_id);
							$('#form_<?php echo $methodid ?>_detail_grn_warehouse_id').val(grn_warehouse_id);
							$('#form_<?php echo $methodid ?>_detail_fabric_shipment_id').val(fabric_shipment_id);
								
							if(grn_type_id == 1){
								$('.panel_<?php echo $methodid ?>_panel_custom_order').hide();
								$('.panel_<?php echo $methodid ?>_panel_purchase_order').show();
								
								setTimeout(function(){ 
									$("#table_<?php echo $methodid ?>_purchase").trigger('reloadGrid');
									$("#table_<?php echo $methodid ?>_purchase").setGridWidth($('.grid_container_<?php echo $methodid; ?>_detail').width() - 20,true).trigger('resize');
									$('.tab_scrollbar').getNiceScroll().resize(); 
								}, 500);
							} else {
								$('.panel_<?php echo $methodid ?>_panel_custom_order').show();
								$('.panel_<?php echo $methodid ?>_panel_purchase_order').hide();
								
								setTimeout(function(){ 
									$("#table_<?php echo $methodid ?>_custom").trigger('reloadGrid');
									$("#table_<?php echo $methodid ?>_custom").setGridWidth($('.grid_container_<?php echo $methodid; ?>_detail').width() - 20,true).trigger('resize');
									$('.tab_scrollbar').getNiceScroll().resize(); 
								}, 500);
							}
						} else {
							new_grn = 1;
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

	function edit_detail_<?php echo $methodid ?>(grn_detail_id){
		page_loading("show",'<?php echo $page_title ?>','Please Wait...');
		$.ajax({
			url: baseurl+'loader',
			data: {
				'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'
				,param: 'data_grn_detail'
				,id : grn_detail_id
			},
			dataType: 'json',
			method: 'post',
			success: function(data){
				page_loading("hide");
				$('#form_<?php echo $methodid ?>_detail_grn_detail_id').val(data[0].grn_detail_id);
					
				$("#table_<?php echo $methodid ?>_purchase").trigger('reloadGrid');
				$("#table_<?php echo $methodid ?>_custom").trigger('reloadGrid');
			}
		});
	}
	
	function delete_detail_<?php echo $methodid ?>(grn_detail_id){
		//alert (grn_detail_id);
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
						data: {'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>',grn_detail_id:grn_detail_id},
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
		$('#form_<?php echo $methodid ?>_detail_grn_detail_id').val('');
						
		$("#table_<?php echo $methodid ?>_purchase").trigger('reloadGrid');
		$("#table_<?php echo $methodid ?>_custom").trigger('reloadGrid');
	}	
	/* End Detail Function */
	
	var beforeclick_<?php echo $methodid ?>_custom = function (rowid, e) {
		$("#table_<?php echo $methodid ?>_custom").jqGrid('resetSelection');
		return(true);
	}
	
	var beforeclick_<?php echo $methodid ?>_purchase = function (rowid, e) {
		$("#table_<?php echo $methodid ?>_purchase").jqGrid('resetSelection');
		return(true);
	}
	
	
	var check_submit = 0;
	function add_list_<?php echo $methodid ?>(rh_id){
		page_loading("show",'<?php echo $page_title ?> Detail','Please Wait...');
		setTimeout(function(){ 
			if(grn_type_id == 1){
				var id = jQuery("#table_<?php echo $methodid ?>_purchase").jqGrid('getGridParam','selrow');
				if (id) {
					var row = jQuery("#table_<?php echo $methodid ?>_purchase").jqGrid('getRowData',id);   
					
					grn_id = $('#form_<?php echo $methodid ?>_grn_id').val();
					grn_detail_id = rh_id;
					purchase_order_detail_id = parseInt(unwrap_cell_value(row.r1).replace(/,/g, ''));
					quantity_received = parseFloat(unwrap_cell_value(row.r9).replace(/,/g, ''));
					//alert(parseInt(unwrap_cell_value(row.r19).replace(/,/g, '')));
					
					$.ajax({
						url: baseurl+'<?php echo $class_uri ?>/post_add_edit_detail',
						data: {
							'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'
							,grn_id:grn_id
							,grn_detail_id:grn_detail_id
							,purchase_order_detail_id :purchase_order_detail_id
							,quantity_received :quantity_received
						},
						dataType: 'json',
						method: 'post',
						success: function(data){
							
							page_loading("hide");
							check_submit = 0;
							if(data.valid){
								show_success("show",'<?php echo $page_title ?> Detail',data.message);	
								cancel_detail_<?php echo $methodid ?>();
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
			} else {
				var id = jQuery("#table_<?php echo $methodid ?>_custom").jqGrid('getGridParam','selrow');
				if (id) {
					var row = jQuery("#table_<?php echo $methodid ?>_custom").jqGrid('getRowData',id);   
					//console.log(row);
					grn_id = $('#form_<?php echo $methodid ?>_grn_id').val();
					grn_detail_id = rh_id;
					bc_in_barang_id = parseInt(unwrap_cell_value(row.r1).replace(/,/g, ''));
					quantity_received = parseFloat(unwrap_cell_value(row.r9).replace(/,/g, ''));
					item_fabric_code = unwrap_cell_value(row.r18).replace(/,/g, '');
									
					$.ajax({
						url: baseurl+'<?php echo $class_uri ?>/post_add_edit_detail',
						data: {
							'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'
							,grn_id:grn_id
							,grn_detail_id:grn_detail_id
							,bc_in_barang_id :bc_in_barang_id
							,quantity_received :quantity_received
						},
						dataType: 'json',
						method: 'post',
						success: function(data){
							
							page_loading("hide");
							check_submit = 0;
							if(data.valid){
								show_success("show",'<?php echo $page_title ?> Detail',data.message);	
								cancel_detail_<?php echo $methodid ?>();
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
			}
		}, 500);	
		
	}
</script>