<script type="text/javascript">
	var new_warehouse_transfer = 1;
	var warehouse_transfer_id = 0;
	var request_id = 0;
	var request_list_id = 0;
	var warehouse_transfer_detail_id = 0;
	var stock_move_id = 0;
	var quantity_supply = 0;
	var lock_data = 0;

	$('#form_<?php echo $methodid ?>_supply_add_quantity_supply').on('keyup change', function (event, clickedIndex, newValue, oldValue) {
		already_quantity_supply = $('#form_<?php echo $methodid ?>_supply_already_quantity_supply').val();
		add_quantity_supply = $('#form_<?php echo $methodid ?>_supply_add_quantity_supply').val();
		quantity_supply = parseFloat(already_quantity_supply) + parseFloat(add_quantity_supply);
		
		$('#form_<?php echo $methodid ?>_supply_quantity_supply').val(quantity_supply);
	});
	
	$(".form_tab_<?php echo $methodid ?>").on("click", "a", function (e) {
        e.preventDefault();
		setTimeout(function(){ 
			$("#table_<?php echo $methodid ?>_detail").trigger('reloadGrid');
			$("#table_<?php echo $methodid ?>_detail").setGridWidth($('.grid_container_<?php echo $methodid; ?>_detail').width() - 20,true).trigger('resize');
			
			$('.tab_scrollbar').getNiceScroll().resize(); 
		}, 1000);
    });
	
	var click_transfer_<?php echo $methodid ?> = function (id, isSelected) {
		$('#form_<?php echo $methodid ?>_supply_stock_move_id').val('');
		$('#form_<?php echo $methodid ?>_supply_warehouse_transfer_detail_id').val('');
		$('#form_<?php echo $methodid ?>_supply_already_quantity_supply').val(0);
		$('#form_<?php echo $methodid ?>_supply_quantity_supply').val(0);
		$('#form_<?php echo $methodid ?>_supply_add_quantity_supply').val(0);
		$('#form_<?php echo $methodid ?>_supply_from').val('');
		$('#form_<?php echo $methodid ?>_supply_receive_date').val('');
		$('#form_<?php echo $methodid ?>_supply_receive_no').val('');
		
		if (!isSelected) {
			$('#form_<?php echo $methodid ?>_supply_item_request_list_id').val('');
		} else {
			var row = jQuery("#table_<?php echo $methodid ?>_supply").jqGrid('getRowData',id);
			request_list_id = parseInt(unwrap_cell_value(row.r1).replace(/,/g, ''));
			$('#form_<?php echo $methodid ?>_supply_request_list_id').val(request_list_id);
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
					$("#table_<?php echo $methodid ?>_supply").jqGrid("resetSelection");
				}
			}
			
			$('#form_<?php echo $methodid ?>_supply_stock_move_id').val('');
			$('#form_<?php echo $methodid ?>_supply_warehouse_transfer_detail_id').val('');
			$('#form_<?php echo $methodid ?>_supply_quantity_supply').val(0);
			$('#form_<?php echo $methodid ?>_supply_add_quantity_supply').val(0);
			$('#form_<?php echo $methodid ?>_supply_already_quantity_supply').val(0);
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
			warehouse_transfer_detail_id = '';
			already_quantity_supply = 0;
			add_quantity_supply = quantity_supply;
			
			var row_supply = $("#table_<?php echo $methodid ?>_list_transfer").jqGrid('getRowData',id);
			if(unwrap_cell_value(row_supply.r1) == id){
				warehouse_transfer_detail_id = parseInt(unwrap_cell_value(row_supply.r13).replace(/,/g, ''));
				quantity_supply = parseFloat(unwrap_cell_value(row_supply.r8).replace(/,/g, ''));
				already_quantity_supply = quantity_supply;
				add_quantity_supply = 0;
				var table_available = $("#table_<?php echo $methodid ?>_list_transfer").jqGrid('getGridParam','selrow');
				if(table_available != id){
					$('#table_<?php echo $methodid ?>_list_transfer').jqGrid('setSelection',id);
				}
			} else {
				$("#table_<?php echo $methodid ?>_list_transfer").jqGrid("resetSelection");
			}
			
			
			$('#form_<?php echo $methodid ?>_supply_stock_move_id').val(stock_move_id);
			$('#form_<?php echo $methodid ?>_supply_warehouse_transfer_detail_id').val(warehouse_transfer_detail_id);
			$('#form_<?php echo $methodid ?>_supply_already_quantity_supply').val(already_quantity_supply);
			$('#form_<?php echo $methodid ?>_supply_add_quantity_supply').val(add_quantity_supply);
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
			$('#form_<?php echo $methodid ?>_supply_warehouse_transfer_detail_id').val('');
			$('#form_<?php echo $methodid ?>_supply_quantity_supply').val(0);
			$('#form_<?php echo $methodid ?>_supply_already_quantity_supply').val(0);
			$('#form_<?php echo $methodid ?>_supply_from').val('');
			$('#form_<?php echo $methodid ?>_supply_receive_date').val('');
			$('#form_<?php echo $methodid ?>_supply_receive_no').val('');
		} else {
			var row = $("#table_<?php echo $methodid ?>_list_transfer").jqGrid('getRowData',id);
			stock_move_id = parseInt(unwrap_cell_value(row.r1).replace(/,/g, ''));
			from = unwrap_cell_value(row.r2);
			receive_date = unwrap_cell_value(row.r3);
			receive_no = unwrap_cell_value(row.r4);
			warehouse_transfer_detail_id = parseInt(unwrap_cell_value(row.r13).replace(/,/g, ''));
			quantity_supply = parseFloat(unwrap_cell_value(row.r8).replace(/,/g, ''));
			
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
			$('#form_<?php echo $methodid ?>_supply_warehouse_transfer_detail_id').val(warehouse_transfer_detail_id);
			$('#form_<?php echo $methodid ?>_supply_already_quantity_supply').val(quantity_supply);
			$('#form_<?php echo $methodid ?>_supply_quantity_supply').val(quantity_supply);
			$('#form_<?php echo $methodid ?>_supply_from').val(from);
			$('#form_<?php echo $methodid ?>_supply_receive_date').val(receive_date);
			$('#form_<?php echo $methodid ?>_supply_receive_no').val(receive_no);
			
		}
	}
	
	$('#form_<?php echo $methodid ?>_request_id').on('change', function (event, clickedIndex, newValue, oldValue) {
		request_id = $('#form_<?php echo $methodid ?>_request_id').val();
		$("#table_<?php echo $methodid ?>_detail").trigger('reloadGrid');
	});
	
	function cancel_<?php echo $methodid ?>(){
		$('#panel_content_<?php echo $methodid ?>').show();
		$('#panel_content_form_<?php echo $methodid ?>').hide();
		$("#table_<?php echo $methodid ?>").trigger('reloadGrid');
	}
	
	function save_<?php echo $methodid ?>(){
		$('#form_<?php echo $methodid ?>').submit();
	}
			
	function edit_<?php echo $methodid?>(id){
		$('.panel_<?php echo $methodid ?>_warehouse_transfer_supply').hide();
		$('.button_<?php echo $methodid ?>_auto_supply').hide();
				
		page_loading("show",'<?php echo $page_title ?>','Please Wait...');
		$.ajax({
			url: baseurl+'loader',
			data: {
				'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'
				,param: 'data_warehouse_transfer'
				,id : id
			},
			dataType: 'json',
			method: 'post',
			success: function(data){
				page_loading("hide");
				
				$('.button_<?php echo $methodid ?>_detail_edit').hide();
				$('.button_<?php echo $methodid ?>_detail_new').show();		
				
				new_warehouse_transfer = 0;
				warehouse_transfer_id = data[0].warehouse_transfer_id;
				
				$('#form_<?php echo $methodid ?>_warehouse_transfer_no').prop('disabled', false);
				$('#form_<?php echo $methodid ?>_warehouse_transfer_date').prop('disabled', false);
				$('#form_<?php echo $methodid ?>_request_id').prop('disabled', false);				
				
				$('#form_<?php echo $methodid ?>_warehouse_transfer_id').val(data[0].warehouse_transfer_id);
				$('#form_<?php echo $methodid ?>_warehouse_transfer_item_warehouse_transfer_id').val(data[0].warehouse_transfer_id);
				$('#form_<?php echo $methodid ?>_warehouse_transfer_no').val(data[0].warehouse_transfer_no);
				$('#form_<?php echo $methodid ?>_warehouse_transfer_date').val(data[0].warehouse_transfer_date);
				$('#form_<?php echo $methodid ?>_nomor_izin').val(data[0].nomor_izin);
				$('#form_<?php echo $methodid ?>_lokasi').val(data[0].lokasi);
				$('#form_<?php echo $methodid ?>_nomor_agenda_persetujuan').val(data[0].nomor_agenda_persetujuan);
				$('#form_<?php echo $methodid ?>_tanggal_persetujuan').val(data[0].tanggal_persetujuan);
				$('#form_<?php echo $methodid ?>_penanggung_jawab').val(data[0].penanggung_jawab);
				$('#form_<?php echo $methodid ?>_jabatan').val(data[0].jabatan);
				$('#form_<?php echo $methodid ?>_kota').val(data[0].kota);
				$('#form_<?php echo $methodid ?>_tanggal_ttd').val(data[0].tanggal_ttd);
				$('#form_<?php echo $methodid ?>_nama_pejabat_bc').val(data[0].nama_pejabat_bc);
				$('#form_<?php echo $methodid ?>_tanggal_selesai').val(data[0].tanggal_selesai);
				$('#form_<?php echo $methodid ?>_jam_selesai').val(data[0].jam_selesai);
				$('#form_<?php echo $methodid ?>_nama_petugas').val(data[0].nama_petugas);
				
				
				change_form_<?php echo $methodid ?>_request_id(data[0].request_id);
				
				request_id = $('#form_<?php echo $methodid ?>_request_id').val();
		
				setTimeout(function(){ 
					$("#tab_<?php echo $methodid; ?>_supply").removeAttr("data-toggle");
					$("#tab_<?php echo $methodid; ?>_supply").addClass( "tab_disabled");
			
					$("#tab_<?php echo $methodid; ?>_header").attr("data-toggle","tab");
					$("#tab_<?php echo $methodid; ?>_header").removeClass( "tab_disabled");
					$("#tab_<?php echo $methodid; ?>_header").click();
										
					$('.tab_scrollbar').getNiceScroll().resize(); 
				}, 500);
			}
		});
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
		
	function supply_<?php echo $methodid?>(id){
		$.ajax({
			url: baseurl+'loader',
			data: {
				'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'
				,param: 'data_warehouse_transfer'
				,id : id
			},
			dataType: 'json',
			method: 'post',
			success: function(data){
				warehouse_transfer_id = data[0].warehouse_transfer_id;
				
				$('#form_<?php echo $methodid ?>_supply_warehouse_transfer_id').val(data[0].warehouse_transfer_id);
				$('#form_<?php echo $methodid ?>_supply_request_id').val(data[0].request_id);
				$('#form_<?php echo $methodid ?>_supply_request_list_id').val('');
				$('#form_<?php echo $methodid ?>_supply_warehouse_transfer_detail_id').val('');
				$('#form_<?php echo $methodid ?>_supply_warehouse_transfer_no').val(data[0].warehouse_transfer_no);
				$('#form_<?php echo $methodid ?>_supply_warehouse_transfer_date').val(data[0].warehouse_transfer_date);
				$('#form_<?php echo $methodid ?>_supply_warehouse_request_no').val(data[0].warehouse_request_no);
				
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
	
	var jvalidate2 = $("#form_<?php echo $methodid ?>_warehouse_transfer_detail").validate({
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
	function post_<?php echo $methodid ?>_supply(){
		new_warehouse_transfer = 0;
		if(check_submit == 0) {
			check_submit = 1;
			page_loading("show",'Detail','Please Wait...');
			var data = $("#form_<?php echo $methodid ?>_supply").serialize();
			$.ajax({
				url: baseurl+'<?php echo $class_uri ?>/post_add_edit_detail',
				data: data,
				dataType: 'json',
				method: 'post',
				success: function(data){
					page_loading("hide");
					check_submit = 0;
					if(data.valid){
						show_success("show",'Detail',data.message);	
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
	
	function cancel_edit_<?php echo $methodid ?>(){
		$('#form_<?php echo $methodid ?>_supply_stock_move_id').val('');
		$('#form_<?php echo $methodid ?>_supply_warehouse_transfer_detail_id').val('');
		$('#form_<?php echo $methodid ?>_supply_quantity_supply').val(0);
		$('#form_<?php echo $methodid ?>_supply_already_quantity_supply').val(0);
		$('#form_<?php echo $methodid ?>_supply_from').val('');
		$('#form_<?php echo $methodid ?>_supply_receive_date').val('');
		$('#form_<?php echo $methodid ?>_supply_receive_no').val('');
		
		$("#table_<?php echo $methodid ?>_supply").trigger('reloadGrid');
		$("#table_<?php echo $methodid ?>_available").trigger('reloadGrid');
		$("#table_<?php echo $methodid ?>_list_transfer").trigger('reloadGrid');
			
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
						data: {'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>',warehouse_transfer_id:warehouse_transfer_id},
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
						data: {'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>',warehouse_transfer_id:warehouse_transfer_id},
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
	
	function cancel_supply_<?php echo $methodid ?>(){
		if(check_submit == 0) {
			swal({
				title: "Cancel Supply ?",
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
					page_loading("show",'Cancel Supply','Please Wait...');
					$.ajax({
						url: baseurl+'<?php echo $class_uri ?>/cancel_supply',								
						data: {'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>',warehouse_transfer_id:warehouse_transfer_id},
						dataType: 'json',
						method: 'post',
						success: function(data){
							page_loading("hide");
							check_submit = 0;
							if(data.valid){
								show_success("show",'Cancel Supply',data.message);			
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