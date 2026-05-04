<script type="text/javascript">
	//var new_work_order_transfer = 1;
	//var work_order_transfer_id = 0;
	//var work_order_request_id = 0;
	//var work_order_request_list_id = 0;
	//var work_order_transfer_detail_id = 0;
	//var stock_move_id = 0;
	//var quantity_supply = 0;
	//var lock_data = 0;
	
	$(".form_tab_<?php echo $methodid ?>").on("click", "a", function (e) {
        e.preventDefault();
		setTimeout(function(){ 
			$("#table_<?php echo $methodid ?>_detail").trigger('reloadGrid');
			$("#table_<?php echo $methodid ?>_detail").setGridWidth($('.grid_container_<?php echo $methodid; ?>_detail').width() - 20,true).trigger('resize');
			
			$('.tab_scrollbar').getNiceScroll().resize(); 
		}, 1000);
    });
	
	function supply_<?php echo $methodid?>(id){
		$.ajax({
			url: baseurl+'loader',
			data: {
				'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'
				//,param: 'data_work_order_transfer' 
				,param: 'data_fabric_transfer' 
				,param_pop :'db_pop'
				,id : id
			},
			dataType: 'json',
			method: 'post',
			success: function(data){
				fabric_transfer_id = data[0].fabric_transfer_id;
				work_order_request_id = data[0].work_order_request_id;
				//alert (work_order_request_id);
				$('#form_<?php echo $methodid ?>_supply_work_order_transfer_id').val(data[0].fabric_transfer_id);
				$('#form_<?php echo $methodid ?>_supply_work_order_request_id').val(data[0].work_order_request_id);
				$('#form_<?php echo $methodid ?>_supply_work_order_request_list_id').val('');
				$('#form_<?php echo $methodid ?>_supply_work_order_transfer_detail_id').val('');
				$('#form_<?php echo $methodid ?>_supply_fabric_transfer_no').val(data[0].fabric_transfer_no);
				$('#form_<?php echo $methodid ?>_supply_fabric_transfer_date').val(data[0].fabric_transfer_date);
				$('#form_<?php echo $methodid ?>_supply_work_order_request_no').val(data[0].work_order_request_no);
				
				//============ proses replace item ==================
				  $('#form_<?php echo $methodid ?>_replace_item_work_order_transfer_id').val(data[0].work_order_transfer_id);
				//============ Akhir proses replace item ============
				
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
	
	function supply_fabric_barcode_<?php echo $methodid ?>(e) {
		let code_barcode = $('#form_<?php echo $methodid ?>_supply_fabric_barcode').val();
		let fabric_transfer_id = $('#form_<?php echo $methodid ?>_supply_work_order_transfer_id').val();
		let work_order_request_id = $('#form_<?php echo $methodid ?>_supply_work_order_request_id').val();
		//alert (e);	
	   $.ajax({
			url: baseurl + '<?php echo $class_uri ?>/post_add_edit_scan',
			data: {
				'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
			    code_barcode: code_barcode,
				fabric_transfer_id: fabric_transfer_id,
				work_order_request_id : work_order_request_id
			 },
			dataType: 'json',
			method: 'post',
			success: function(data) {
		     page_loading("hide");
	  	     check_submit = 0;
			// console.log(data);
				if (data.valid) {
			
			  }else {
				show_error("show", 'Error', data.message);
		 	   }
			}
		 });
		
	}
	
	//$("#inputSaya").keypress(function(event)
	$('#form_<?php echo $methodid ?>_supply_fabric_barcode_xx').keyup(function() {
	//$('#form_<?php echo $methodid ?>_supply_fabric_barcode').keypress(function() {
		let code_barcode = $('#form_<?php echo $methodid ?>_supply_fabric_barcode').val();
		let fabric_transfer_id = $('#form_<?php echo $methodid ?>_supply_work_order_transfer_id').val();
		let work_order_request_id = $('#form_<?php echo $methodid ?>_supply_work_order_request_id').val();
		
		//if(event.which == 13){
          //  event.preventDefault(); // Mencegah enter submit form
           //var nextInput = $(this).next('input');
		   var jumlah = $('#form_<?php echo $methodid ?>_supply_fabric_barcode').val().length; 
		   //var jumlah = $(this).val().length; 
		  // 	alert ("coba " + jumlah); 
          if(jumlah > 12)
		  {
              // nextInput.focus();
			   	alert ("coba "); 
           }
	//	}
	});
	
	//$('#form_<?php echo $methodid ?>_supply_fabric_barcode').keyup(function() {
	$('#form_<?php echo $methodid ?>_supply_fabric_barcode').keypress(function() {
		let code_barcode = $('#form_<?php echo $methodid ?>_supply_fabric_barcode').val();
		let fabric_transfer_id = $('#form_<?php echo $methodid ?>_supply_work_order_transfer_id').val();
		let work_order_request_id = $('#form_<?php echo $methodid ?>_supply_work_order_request_id').val();
		var jumlah = $('#form_<?php echo $methodid ?>_supply_fabric_barcode').val().length; 
		
		if(jumlah > 10)
		 {
			 
	      $.ajax({
			url: baseurl + '<?php echo $class_uri ?>/post_add_edit_scan',
			data: {
				'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
			    code_barcode: code_barcode,
				fabric_transfer_id: fabric_transfer_id,
				work_order_request_id : work_order_request_id,
				keterangan : 0
			 },
			dataType: 'json',
			method: 'post',
			success: function(data) {
			 //console.log(data.quantity_available);
			 $('#form_<?php echo $methodid ?>_supply_fabric_barcode').val('');
		     page_loading("hide");
			    if (data.bc_no == null ){
					bc_no ='-';
					bc_date = '-';
					custom_name= 'Saldo Awal';
					html='<label for="nama" style="display: block; text-align: left;">From : '+ custom_name+'</label>';
				}else{
					bc_no = data.bc_no;
				    bc_date = data.bc_date;
					custom_name= data.custom_name;
					html='<label for="nama" style="display: block; text-align: left;">Dokumen : '+ custom_name+'</label><label for="nama" style="display: block; text-align: left;">Nopen : '+ bc_no +' Date : ' +bc_date+' </label>';
				}
			 
			   if (data.valid) {
			 	 swal({
				  title:'Available Stock', 
				  html:html+'<input type="text" id="qty_supply" class="swal2-input" name="qty_supply" value='+data.quantity_available+'>',
				//  input: 'text', // Tipe input (akan tersembunyi karena kita pakai 'html' kustom, tapi tetap berguna untuk fungsionalitas janji/promise)
                  showCancelButton: true, // Menampilkan tombol batal
                  confirmButtonText: 'Supply', // Mengubah teks tombol konfirmasi
                  cancelButtonText: 'Cancel', // Mengubah teks tombol batal
				  focusConfirm: false, // Agar fokus ke input pertama
				   preConfirm: () => {
                     // const nama = document.getElementById('nama').value;
					   qty_supply = document.getElementById('qty_supply').value;
					
					  var data_send={
                             '<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>'
                             ,qty_supply:qty_supply
                             ,code_barcode:code_barcode
							 ,fabric_transfer_id:fabric_transfer_id
							 ,work_order_request_id:work_order_request_id
							 ,keterangan : 1
						};
						
					  $.ajax({
                             type: "POST",
                             url:baseurl + '<?php echo $class_uri ?>/post_add_edit_scan',
                             data: data_send,
                             dataType : 'json',
                             success: function(msg){
								 
								  if (msg.valid) {
			                        show_success("show", '<?php echo $page_title ?>', msg.message);
			                      }else {
			                     	show_error("show", 'Error', msg.message);
		 	                        }
			
                         //       if (!msg.valid){  
                         //          show_error('show','error',msg.des);
                         //          return false;
                         //       }else{
						//		//download_file('<?php echo $methodid ?>',msg.xfile,msg.namafile,'<?php echo $this->security->get_csrf_token_name() ?>','<?php echo $this->security->get_csrf_hash() ?>');
                         //       //download_file_2('<?php echo $methodid ?>',msg.xfile2,msg.namafile2,'<?php echo $this->security->get_csrf_token_name() ?>','<?php echo $this->security->get_csrf_hash() ?>'); 
                         //          return false; 
                         //       } 
                             }
                          }) ;
                      //const email = document.getElementById('email').value;
                     // if (!nama || !email) {
                     //     Swal.showInputError('Nama dan Email harus diisi!');
                     //     return false; // Mencegah penutupan jika ada error
                     // }
                     // return { nama, email }; // Mengembalikan nilai jika valid
                  }
			    })
				//.then((result) =>{
				//	 if (result.isConfirmed) {
                //          Swal.fire('Data Diterima!', `Halo ${result.value.nama}, email Anda ${result.value.email}.`, 'success');
                //     }
			    //});
				
			   }else {
				  show_error("show", 'Error', data.message);
		 	  }
			 
	  	    // check_submit = 0;
			// console.log(data);
			 
			// if (data.valid) {
			//   show_success("show", '<?php echo $page_title ?>', data.message);
			// }else {
			//	show_error("show", 'Error', data.message);
		 	//   }
			}
		 });
			 
			 
		//	 swal({
		//		  title:'Available Stock',
		//		  html:'<label for="nama" style="display: block; text-align: left;">'+ code_barcode +'</label><input type="text" id="nama" class="swal2-input" placeholder="Masukkan nama Anda"><br> <label for="email" style="display: block; text-align: left;">Email:</label> <input type="email" id="email" class="swal2-input" placeholder="Masukkan email Anda">',
		//		  input: 'text', // Tipe input (akan tersembunyi karena kita pakai 'html' kustom, tapi tetap berguna untuk fungsionalitas janji/promise)
        //          showCancelButton: true, // Menampilkan tombol batal
        //          confirmButtonText: 'Simpan', // Mengubah teks tombol konfirmasi
        //          cancelButtonText: 'Batal', // Mengubah teks tombol batal
		//		  focusConfirm: false, // Agar fokus ke input pertama
		//		   preConfirm: () => {
        //              const nama = document.getElementById('nama').value;
        //              const email = document.getElementById('email').value;
        //              if (!nama || !email) {
        //                  Swal.showInputError('Nama dan Email harus diisi!');
        //                  return false; // Mencegah penutupan jika ada error
        //              }
        //              return { nama, email }; // Mengembalikan nilai jika valid
        //          }
		//	    }).then((result) =>{
		//			 if (result.isConfirmed) {
        //                  Swal.fire('Data Diterima!', `Halo ${result.value.nama}, email Anda ${result.value.email}.`, 'success');
        //             }
		//	    });
		//	 
			
			 
			 
			 
			 
			
	   }
	});
	
	var click_transfer_<?php echo $methodid ?> = function (id, isSelected) {
		$('#form_<?php echo $methodid ?>_supply_stock_move_id').val('');
		$('#form_<?php echo $methodid ?>_supply_work_order_transfer_detail_id').val('');
		$('#form_<?php echo $methodid ?>_supply_quantity_supply').val(0);
		$('#form_<?php echo $methodid ?>_supply_from').val('');
		$('#form_<?php echo $methodid ?>_supply_receive_date').val('');
		$('#form_<?php echo $methodid ?>_supply_receive_no').val('');
		
		alert ("cek");
		
		if (!isSelected) {
			$('#form_<?php echo $methodid ?>_supply_item_work_order_request_list_id').val('');
		} else {
			var row = jQuery("#table_<?php echo $methodid ?>_supply").jqGrid('getRowData',id);
			
			//---- tambahan untuk cek nilai stock yang ada -----------
			item_code =unwrap_cell_value(row.r7).replace(/,/g, '');
			//alert(item_code +' loader');
			$.ajax({
				url: baseurl+'loader',
				data: {
					'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'
				    ,param:'get_stock_transfer'
					,id :id
				    ,code_id : item_code
				},
				dataType: 'json',
			    method: 'post',
			    success: function(data){
					//alert ('test');
					//console.log(data[1]['quantity']);
				$('#form_<?php echo $methodid ?>_supply_mat_rpt_mutasi').val(data[1]['stock_report']);	
				//$('#form_<?php echo $methodid ?>_supply_mat_asset_id').val(data[1]['quantity']);
				$('#form_<?php echo $methodid ?>_supply_mat_asset_id').val(data[1]['stock_assets']);
				}
			});
			//$data_table = $this->main->getData('dbo.view_data_assets', null, $where, null, $order , $limit, $offset);
		
			//---------------------------------------
			
			work_order_request_list_id = parseInt(unwrap_cell_value(row.r1).replace(/,/g, ''));
			$('#form_<?php echo $methodid ?>_supply_work_order_request_list_id').val(work_order_request_list_id);
			$('#form_<?php echo $methodid ?>_supply_item_code_transfer').val(item_code);
			
			//============ proses replace item id =================
			work_order_request_id = parseInt(unwrap_cell_value(row.r2).replace(/,/g, ''));
			  $('#form_<?php echo $methodid ?>_replace_item_work_order_request_id').val(work_order_request_id);
			  $('#form_<?php echo $methodid ?>_replace_item_work_order_request_list_id').val(work_order_request_list_id);
			//============ Akhir proses replace item id =================
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
			$('#form_<?php echo $methodid ?>_supply_work_order_transfer_detail_id').val('');
			$('#form_<?php echo $methodid ?>_supply_quantity_supply').val(0);
			$('#form_<?php echo $methodid ?>_supply_from').val('');
			$('#form_<?php echo $methodid ?>_supply_receive_date').val('');
			$('#form_<?php echo $methodid ?>_supply_receive_no').val('');
			$('#form_<?php echo $methodid ?>_supply_item_code_available').val('');
		} else {
			var row = $("#table_<?php echo $methodid ?>_available").jqGrid('getRowData',id);
			stock_move_id = parseInt(unwrap_cell_value(row.r1).replace(/,/g, ''));
			from = unwrap_cell_value(row.r2);
			receive_date = unwrap_cell_value(row.r3);
			receive_no = unwrap_cell_value(row.r4);
			quantity_supply = parseFloat(unwrap_cell_value(row.r7).replace(/,/g, ''));
			work_order_transfer_detail_id = '';
			//alert(quantity_supply);
			var row_supply = $("#table_<?php echo $methodid ?>_list_transfer").jqGrid('getRowData',id);
			if(unwrap_cell_value(row_supply.r1) == id){
				work_order_transfer_detail_id = parseInt(unwrap_cell_value(row_supply.r13).replace(/,/g, ''));
				quantity_supply = parseFloat(unwrap_cell_value(row_supply.r8).replace(/,/g, ''));
				
				var table_available = $("#table_<?php echo $methodid ?>_list_transfer").jqGrid('getGridParam','selrow');
				if(table_available != id){
					$('#table_<?php echo $methodid ?>_list_transfer').jqGrid('setSelection',id);
				}
			} else {
				$("#table_<?php echo $methodid ?>_list_transfer").jqGrid("resetSelection");
			}
			
			
			$('#form_<?php echo $methodid ?>_supply_stock_move_id').val(stock_move_id);
			$('#form_<?php echo $methodid ?>_supply_work_order_transfer_detail_id').val(work_order_transfer_detail_id);
			$('#form_<?php echo $methodid ?>_supply_quantity_supply').val(quantity_supply);
			$('#form_<?php echo $methodid ?>_supply_from').val(from);
			$('#form_<?php echo $methodid ?>_supply_receive_date').val(receive_date);
			$('#form_<?php echo $methodid ?>_supply_receive_no').val(receive_no);
			$('#form_<?php echo $methodid ?>_supply_item_code_available').val(item_code);
			
			
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
			$('#form_<?php echo $methodid ?>_supply_work_order_transfer_detail_id').val('');
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
			work_order_transfer_detail_id = parseInt(unwrap_cell_value(row.r13).replace(/,/g, ''));
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
			$('#form_<?php echo $methodid ?>_supply_work_order_transfer_detail_id').val(work_order_transfer_detail_id);
			$('#form_<?php echo $methodid ?>_supply_quantity_supply').val(quantity_supply);
			$('#form_<?php echo $methodid ?>_supply_from').val(from);
			$('#form_<?php echo $methodid ?>_supply_receive_date').val(receive_date);
			$('#form_<?php echo $methodid ?>_supply_receive_no').val(receive_no);
			
		}
	}
	
	$('#form_<?php echo $methodid ?>_fabric_request_id').on('change', function (event, clickedIndex, newValue, oldValue) {
		work_order_request_id = $('#form_<?php echo $methodid ?>_fabric_request_id').val();
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
		$('.panel_<?php echo $methodid ?>_work_order_transfer_supply').hide();
		$('.button_<?php echo $methodid ?>_auto_supply').hide();
				
		page_loading("show",'<?php echo $page_title ?>','Please Wait...');
		$.ajax({
			url: baseurl+'loader',
			data: {
				'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'
				,param: 'data_fabric_transfer' 
				,param_pop :'db_pop'
				,id : id
			},
			dataType: 'json',
			method: 'post',
			success: function(data){
				page_loading("hide");
				//console.log(data);
				//$('.button_<?php echo $methodid ?>_detail_edit').hide();
				//$('.button_<?php echo $methodid ?>_detail_new').show();	
               	$('#form_<?php echo $methodid ?>_fabric_transfer_edit').val(1);
				$('#form_<?php echo $methodid ?>_fabric_transfer_id').val(data[0].fabric_transfer_id);
				$('#form_<?php echo $methodid ?>_fabric_transfer_no').val(data[0].fabric_transfer_no);
				$('#form_<?php echo $methodid ?>_fabric_transfer_date').val(data[0].fabric_transfer_date);
				change_form_<?php echo $methodid ?>_fabric_request_id(data[0].work_order_request_id);
				
		//		new_work_order_transfer = 0;
		//		work_order_transfer_id = data[0].work_order_transfer_id;
		//		
		//		$('#form_<?php echo $methodid ?>_work_order_transfer_no').prop('disabled', false);
		//		$('#form_<?php echo $methodid ?>_work_order_transfer_date').prop('disabled', false);
		//		$('#form_<?php echo $methodid ?>_work_order_request_id').prop('disabled', false);
		//		
		//		
		
		//		
		//		change_form_<?php echo $methodid ?>_work_order_request_id(data[0].work_order_request_id);
		//		
		//		work_order_request_id = $('#form_<?php echo $methodid ?>_work_order_request_id').val();
		//
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
	
		
	
	var jvalidate2 = $("#form_<?php echo $methodid ?>_work_order_transfer_detail").validate({
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
		new_work_order_transfer = 0;
		if(check_submit == 0) {
			check_submit = 1;
			page_loading("show",'Detail','Please Wait...');
			var transfer_date= $("#form_<?php echo $methodid ?>_supply_work_order_transfer_date").val();
			//alert(transfer_date);
			var data = $("#form_<?php echo $methodid ?>_supply").serialize();
			var data2= data + "&transfer_date="+transfer_date;
			//data.push({ name: "transfer_date", value: transfer_date });
			//data.push('transfer_date='transfer_date);
			//console.log(data2);
			$.ajax({
				url: baseurl+'<?php echo $class_uri ?>/post_add_edit_detail',
				data: data2,
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
		$('#form_<?php echo $methodid ?>_supply_work_order_transfer_detail_id').val('');
		$('#form_<?php echo $methodid ?>_supply_quantity_supply').val(0);
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
						data: {'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>',work_order_transfer_id:work_order_transfer_id},
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
						data: {'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>',work_order_transfer_id:work_order_transfer_id},
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
						data: {'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>',work_order_transfer_id:work_order_transfer_id},
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