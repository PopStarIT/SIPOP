<script type="text/javascript">
	var new_sales_performa = 1;
	var sales_performa_id = 0;
	var sales_performa_lock_data = 0;
	
	var idsOfSelectedRows_<?php echo $methodid ?>_detail_proforma = [],
		updateIdsOfSelectedRows_<?php echo $methodid ?>_detail_proformac = function(id, isSelected) {
			//alert(id);
			var index = $.inArray(id, idsOfSelectedRows_<?php echo $methodid ?>_detail_proforma);
			if (!isSelected && index >= 0) {
				idsOfSelectedRows_<?php echo $methodid ?>_detail_proforma.splice(index, 1); // remove id from the list
				//alert(id);
				alert("No");
			} else if (index < 0) {
				idsOfSelectedRows_<?php echo $methodid ?>_detail_proforma.push(id);
				//var id = jQuery("#table_<?php echo $methodid ?>_detail_spec").jqGrid('getGridParam','selrow');
				//if (id) {
				//  var row = jQuery("#table_<?php echo $methodid ?>_detail_spec").jqGrid('getRowData',id);
				 // alert(row['r4']);
				//}
				alert("Ok");
			}
		};
	
	$(".form_tab_<?php echo $methodid ?>").on("click", "a", function (e) {
        e.preventDefault();
		setTimeout(function(){ 
			$("#table_<?php echo $methodid ?>_detail").trigger('reloadGrid');
			$("#table_<?php echo $methodid ?>_detail").setGridWidth($('.grid_container_<?php echo $methodid; ?>_detail').width() - 20,true).trigger('resize');
			
			$("#table_<?php echo $methodid ?>_sales_order").trigger('reloadGrid');
			$("#table_<?php echo $methodid ?>_sales_order").setGridWidth($('.grid_container_<?php echo $methodid; ?>_sales_order').width() - 20,true).trigger('resize');
						
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
	
	function edit_<?php echo $methodid ?>(id){
		$.ajax({
			url: baseurl+'loader',
			data: {
				'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'
				,param: 'data_sales_performa'
				,id : id
			},
			dataType: 'json',
			method: 'post',
			success: function(data){
				$("#tab_<?php echo $methodid; ?>_detail").attr("data-toggle","tab");
				$("#tab_<?php echo $methodid; ?>_detail").removeClass( "tab_disabled");
							
				$('#form_<?php echo $methodid ?>_sales_performa_id').val(data[0].sales_performa_id);
				$('#form_<?php echo $methodid ?>_sales_performa_no').val(data[0].proforma_no);
				$('#form_<?php echo $methodid ?>_sales_performa_date').val(data[0].proforma_date);
				
				$('#form_<?php echo $methodid ?>_detail_sales_performa_id').val(data[0].sales_performa_id);
				$('#form_<?php echo $methodid ?>_detail_partner_id').val(data[0].partner_id);
				$('#form_<?php echo $methodid ?>_detail_currencies_id').val(data[0].currencies_id);
				
				change_form_<?php echo $methodid ?>_partner_id(data[0].partner_id);
				change_form_<?php echo $methodid ?>_currencies_id(data[0].currencies_id);
				
				sales_performa_id = id;
				sales_performa_lock_data = data[0].lock_data;
				
				new_sales_performa = 0;
									
				$('.panel_<?php echo $methodid ?>_panel_sales_order').show();
				
				setTimeout(function(){ 
					$('.tab_scrollbar').getNiceScroll().resize(); 
				}, 100);
			}
		});
	}
	
	function save_sales_performa_<?php echo $methodid ?>(id){
		// var id_tabel = jQuery("#table_<?php echo $methodid ?>_detail").jqGrid('getGridParam','selrow');
		 var row = jQuery("#table_<?php echo $methodid ?>_detail").jqGrid('getRowData',id);  
		// alert(id);
		setTimeout(function(){ 
		 if (id) {
	
		 //removeTags(row.r2)
		//alert(removeTags(row.r1));
		
		//var netto = unwrap_cell_value(row.r16).replace(/,/g, '');
		//var bruto = unwrap_cell_value(row.r17).replace(/,/g, '');
		var id_header=unwrap_cell_value(row.r2).replace(/,/g, '');
		var id_detail=id; 
		var netto = unwrap_cell_value(row.r16);
		var bruto = unwrap_cell_value(row.r17);
		var id_sipop=unwrap_cell_value(row.r18).replace(/,/g, '');
		
		//--masih ada error jika diklik nilai kosong di modalnya
	//	$('#form_<?php echo $methodid ?>_sales_performa_detail_id').val(id);
	//	alert(id_detail + ' dan ' + netto + ' dan ' + bruto);
		
		$('#form_<?php echo $methodid ?>_item_code').val(unwrap_cell_value(row.r5));
		$('#form_<?php echo $methodid ?>_netto').val(netto);
		$('#form_<?php echo $methodid ?>_bruto').val(bruto);
		$('#mdl_form_add').modal('show');
	  //  alert(id_sipop);
	  
	  //---- langsung save ------------
  //	$.ajax({
	//			url: baseurl+'<?php echo $class_uri ?>/post_netto_bruto',
	//			data: {
	//				'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'
	//				,id_detail: id_detail
	//				,id_header: id_header
	//				,netto : netto
	//				,bruto : bruto
	//				,id_sipop : id_sipop
	//			},
	//			dataType: 'json',
	//			method: 'post',
	//			success: function(data){
	//				// page_loading("hide");
	//				//console.log(data);
	//				   if (data.valid) {
	//					   show_success("show", '<?php echo $page_title ?>', data.message);
	//					   //cancel_detail_<?php echo $methodid ?>();
	//					   $("#table_<?php echo $methodid ?>_detail").trigger('reloadGrid');
	//					 //  $('#form_<?php echo $methodid ?>_new_style').val('');
	//				   }else{
	//					   show_success("show", '<?php echo $page_title ?>', data.message);
	//				   }
	//				   
	//			
	//			
	//			},
	//			error: function(xhr, error) {
	//				show_error("show", xhr.status.toString() + ' ' + xhr.statusText, 'Please try again process');
	//				//check_submit = 0;
	//			}
	//	});
		
		//-------------------------------
		
		//  $("#table_<?php echo $methodid ?>_detail").jqGrid('editRow', aftersavefunc: function(){
        //        $("#table_<?php echo $methodid ?>_detail").trigger("reloadGrid");
        //   });
		   
		//$("#table_<?php echo $methodid ?>_detail").jqGrid('clearGridData');
       // $("#table_<?php echo $methodid ?>_detail").jqGrid('setGridParam', {data: dataToLoad});
	
		//$("#table_<?php echo $methodid ?>_detail").trigger('reloadGrid');
	    $("#table_<?php echo $methodid ?>_detail").setGridWidth($('.grid_container_<?php echo $methodid; ?>_detail').width() - 20,true).trigger('resize');
		}else{
			 show_error("show", 'Error', 'Please select row');
		 }
		 
		}, 500);
	}
	
	function cancel_modal<?php echo $methodid ?>(){
		$('#mdl_form_add').modal('hidden');
		$("#table_<?php echo $methodid ?>_detail").trigger('reloadGrid');
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
						
						new_sales_performa = data.new_sales_performa;
						
						if(new_sales_performa == 1){
							new_sales_performa = 0;
							$("#tab_<?php echo $methodid; ?>_detail").attr("data-toggle","tab");
							$("#tab_<?php echo $methodid; ?>_detail").removeClass( "tab_disabled");
							$("#tab_<?php echo $methodid; ?>_detail").click();
							sales_performa_id = data.sales_performa_id;
							$('#form_<?php echo $methodid ?>_sales_performa_id').val(sales_performa_id);
							$('#form_<?php echo $methodid ?>_detail_sales_performa_id').val(sales_performa_id);
							$('#form_<?php echo $methodid ?>_detail_partner_id').val(data.partner_id);
							$('#form_<?php echo $methodid ?>_detail_currencies_id').val(data.currencies_id);
								
							setTimeout(function(){ 
								$("#table_<?php echo $methodid ?>_detail").trigger('reloadGrid');
								$("#table_<?php echo $methodid ?>_detail").setGridWidth($('.grid_container_<?php echo $methodid; ?>_detail').width() - 20,true).trigger('resize');
								$('.tab_scrollbar').getNiceScroll().resize(); 
							}, 500);
							
							$('.panel_<?php echo $methodid ?>_panel_detail').hide();
							$('.panel_<?php echo $methodid ?>_panel_sales_order').show();
							
						} else {
							new_sales_performa = 1;
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
	
	function edit_detail_<?php echo $methodid ?>(sales_performa_detail_id){
		page_loading("show",'<?php echo $page_title ?>','Please Wait...');
		$.ajax({
			url: baseurl+'loader',
			data: {
				'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'
				,param: 'data_sales_performa_detail'
				,id : sales_performa_detail_id
			},
			dataType: 'json',
			method: 'post',
			success: function(data){
				page_loading("hide");
				$('#form_<?php echo $methodid ?>_detail_sales_performa_detail_id').val(data[0].sales_performa_detail_id);
					
				$("#table_<?php echo $methodid ?>_sales_order").trigger('reloadGrid');
					
			}
		});
	}
	
	function delete_detail_<?php echo $methodid ?>(sales_performa_detail_id){
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
						data: {'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>',sales_performa_detail_id:sales_performa_detail_id},
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
		$('#form_<?php echo $methodid ?>_detail_sales_performa_detail_id').val('');
				
		$("#table_<?php echo $methodid ?>_sales_order").trigger('reloadGrid');
	}	
	/* End Detail Function */
	
	var check_submit = 0;
	function add_list_<?php echo $methodid ?>(rh_id){
		page_loading("show",'<?php echo $page_title ?> Detail','Please Wait...');
		setTimeout(function(){ 
			var id = jQuery("#table_<?php echo $methodid ?>_sales_order").jqGrid('getGridParam','selrow');
			if (id) {
				var row = jQuery("#table_<?php echo $methodid ?>_sales_order").jqGrid('getRowData',id);   
				
				sales_performa_id = $('#form_<?php echo $methodid ?>_sales_performa_id').val();
				sales_performa_detail_id = rh_id;
				sales_order_detail_id = parseInt(unwrap_cell_value(row.r1).replace(/,/g, ''));
				item_id = parseInt(unwrap_cell_value(row.r15).replace(/,/g, ''));
				quantity_performa_invoiced = parseFloat(unwrap_cell_value(row.r10).replace(/,/g, ''));
				uom_id = parseInt(unwrap_cell_value(row.r11).replace(/,/g, ''));
				conversion = parseFloat(unwrap_cell_value(row.r12).replace(/,/g, ''));
				unit_price = parseFloat(unwrap_cell_value(row.r13).replace(/,/g, ''));
				
				$.ajax({
				url: baseurl+'<?php echo $class_uri ?>/post_add_edit_detail',
				data: {
					'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'
					,sales_performa_detail_id:sales_performa_detail_id
					,sales_order_detail_id:sales_order_detail_id
					,sales_performa_id :sales_performa_id
					,item_id :item_id
					,quantity_performa_invoiced :quantity_performa_invoiced
					,uom_id :uom_id
					,conversion :conversion
					,unit_price :unit_price
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
						$("#table_<?php echo $methodid ?>_sales_performa").trigger('reloadGrid');
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