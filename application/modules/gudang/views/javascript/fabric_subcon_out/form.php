<script type="text/javascript">

	
	$(".form_tab_<?php echo $methodid ?>").on("click", "a", function (e) {
        e.preventDefault();
		setTimeout(function(){ 
		   //alert ("test");
		  $("#table_<?php //echo $methodid ?>_detail_supply").trigger('reloadGrid');
		  $("#table_<?php //echo $methodid ?>_detail_supply").setGridWidth($('.grid_container_<?php //echo $methodid; ?>_detail_supply').width() - 20,true).trigger('resize');
			
			$("#table_<?php echo $methodid ?>_supply").trigger('reloadGrid');
			$("#table_<?php echo $methodid ?>_supply").setGridWidth($('.grid_container_<?php echo $methodid; ?>_supply').width() - 20,true).trigger('resize');
		     
			//$("#table_<?php //echo $methodid ?>_detail_supply").trigger('reloadGrid');
			//$("#table_<?php //echo $methodid ?>_detail_supply").setGridWidth($('.grid_container_<?php //echo $methodid; ?>_detail_supply').width() - 20,true).trigger('resize');
			 
			//$("#table_<?php echo $methodid ?>_fabric_subcon_out_detail").trigger('reloadGrid');
			//$("#table_<?php echo $methodid ?>_fabric_subcon_out_detail").setGridWidth($('.grid_container_<?php echo $methodid; ?>_fabric_subcon_out_detail').width() - 20,true).trigger('resize');
			
			$('.tab_scrollbar').getNiceScroll().resize(); 
		}, 500);
    });
	
	  
	function scan_mobile_<?php echo $methodid ?>() {
		$('.form_<?php echo $methodid ?>_scan_mobile').hide();
		$('.form_<?php echo $methodid ?>_back').show();
		 scan_barcode_aktif_<?php echo $methodid ?>();
	}
	
	function back_<?php echo $methodid ?>() {
		$('.form_<?php echo $methodid ?>_scan_mobile').show();
		$('.form_<?php echo $methodid ?>_back').hide();
		scan_barcode_keluar_<?php echo $methodid ?>();
	}
	
	function scan_barcode_aktif_<?php echo $methodid ?>() {
       if (!html5QrcodeScanner) {
        html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", { 
                fps: 10, 
                qrbox: {width: 250, height: 150}, 
                aspectRatio: 1.0 
            }
        );
      }

         function onScanSuccess(decodedText, decodedResult) {
               // CEK LOCK: Jika sedang proses, langsung keluar/abaikan
             if (isProcessing) {
                 return;
                }
               // AKTIFKAN LOCK: Tandai sedang memproses
                isProcessing = true;
                beepSound.play().catch(err => {
                    console.log("Gagal memutar suara:", err);
                 });

               $('#form_<?php echo $methodid ?>_subcon_out_barcode').val(decodedText);
 
                // Jalankan fungsi proses (Ajax/Logic)
                // Kita bungkus dengan Promise atau callback agar kita tahu kapan selesainya
                 process_scan_data(decodedText); 
           }

                 html5QrcodeScanner.render(onScanSuccess);
        }

          // Fungsi pembantu untuk memproses data dan membuka kunci kembali
          function process_scan_data(barcode) {
                scan_barcode_<?php echo $methodid ?>(barcode);
          
              // 6. BUKA LOCK: Beri jeda 2-3 detik sebelum user bisa scan lagi
              // Ini memberikan waktu bagi user untuk menjauhkan barcode dari kamera
              setTimeout(() => {
                  isProcessing= false;
                  console.log("Scanner siap kembali...");
              }, 2500); 
          }
	
	//=============================
	
	function scan_barcode_keluar_<?php echo $methodid ?>() {
		 if (html5QrcodeScanner) {
			
               html5QrcodeScanner.clear().catch(error => {
                   console.error("Gagal menghentikan scanner: ", error);
               });
           }
	 }
	
   $('#form_<?php echo $methodid ?>_subcon_out_barcode').keydown(function(e){
	  if (e.key === 'Enter') {
		//  page_loading("show",'<?php echo $page_title ?>','Please Wait...');
	       var supply_barcode = $('#form_<?php echo $methodid ?>_subcon_out_barcode').val();
		   var no_po = $('#form_<?php echo $methodid ?>_supply_no_po').val();
		   let fabric_subcon_out_id = $('#form_<?php echo $methodid ?>_supply_fabric_subcon_out_id').val();
		   if (no_po == ''){
			   no_po_input ='<font color="#FF0000"><b> NULL </b></font>' ;
		     }else{
			   no_po_input = no_po;
			 }
		   
		   $.ajax({
			url: baseurl + '<?php echo $class_uri ?>/post_add_edit_scan',
			data: {
				'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
			    code_barcode: supply_barcode,
				fabric_subcon_out_id: fabric_subcon_out_id,
				no_po: no_po,
				keterangan : 0
			 },
			dataType: 'json',
			method: 'post',
			success: function(data) {
				
				 $('#form_<?php echo $methodid ?>_subcon_out_barcode').val('');
			    if (data.bc_no == null ){
					bc_no ='-';
					bc_date = '-';
					custom_name= 'Saldo Awal';
					html='<label for="nama" style="display: block; text-align: left;">From : '+ custom_name+'</label><label for="nama" style="display: block; text-align: left;">Qty available : '+ data.quantity_available+'</label><label for="no_po" style="display: block; text-align: left;">No PO : '+ no_po_input+'</label>';
				}else{
					bc_no = data.bc_no;
				    bc_date = data.bc_date;
					custom_name= data.custom_name;
					html='<label for="nama" style="display: block; text-align: left;">Dokumen : '+ custom_name+'</label><label for="nama" style="display: block; text-align: left;">Nopen : '+ bc_no +' Date : ' +bc_date+' </label><label for="nama" style="display: block; text-align: left;">Qty available : '+ data.quantity_available+'</label><label for="no_po" style="display: block; text-align: left;">No PO : '+ no_po_input+'</label>';
				}
				
				 if (data.valid) {
				    swal({
					 title:'Available Stock', 
				     html:html+'<input type="text" id="qty_supply" class="swal2-input" name="qty_supply" value='+data.quantity+'>',
				     showCancelButton: true, // Menampilkan tombol batal
                     confirmButtonText: 'Supply', // Mengubah teks tombol konfirmasi
                     cancelButtonText: 'Cancel', // Mengubah teks tombol batal
				     focusConfirm: false, // Agar fokus ke input pertama
				      preConfirm: () => {
						   qty_supply = document.getElementById('qty_supply').value;
						   
						var data_send={
                             '<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>'
                             ,qty_supply: qty_supply.replace(/,/g, ".")
                             ,code_barcode:supply_barcode
							 ,fabric_subcon_out_id:fabric_subcon_out_id
							 ,fabric_subcon_out_detail_id:data.fabric_subcon_out_detail_id
							 ,no_po: no_po
							 ,keterangan : 1
						};
						
						  $.ajax({
                             type: "POST",
                             url:baseurl + '<?php echo $class_uri ?>/post_add_edit_scan',
                             data: data_send,
                             dataType : 'json',
                             success: function(msg){
								// console.log(msg);
							    if (msg.valid) {
								   show_success("show", '<?php echo $page_title ?>', msg.message);
														   								   
			                    }else {
									
			                     	show_error("show", 'Error', msg.message);
		 	                    }
								
								  $('#form_<?php echo $methodid ?>_supply_fabric_subcon_out_detail_id').val(msg.fabric_subcon_out_detail_id);
								
								 //  $("#table_<?php //echo $methodid ?>_detail_supply").trigger('reloadGrid');
						         //  $("#table_<?php //echo $methodid ?>_detail_supply").setGridWidth($('.grid_container_<?php // $methodid; ?>_detail_supply').width() - 20,true).trigger('resize');
								   
								   $("#table_<?php echo $methodid ?>_supply").trigger('reloadGrid');
					               $("#table_<?php echo $methodid ?>_supply").setGridWidth($('.grid_container_<?php echo $methodid; ?>_supply').width() - 20,true).trigger('resize');
			                        
                             }
                          }) ;
						  
					  }
					})
				 }else{
					  show_error("show", 'Error', data.message);
				 }
			}
		  });
		  
			
	   // scan_barcode_<?php //echo $methodid ?>(supply_barcode);
    
        }
		
	});
	
	
  function scan_barcode_<?php echo $methodid ?>(code_barcode) {
	  
	       var supply_barcode = code_barcode;
		   let fabric_subcon_out_id = $('#form_<?php echo $methodid ?>_supply_fabric_subcon_out_id').val();
		   $.ajax({
			url: baseurl + '<?php echo $class_uri ?>/post_add_edit_scan',
			data: {
				'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
			    code_barcode: supply_barcode,
				fabric_subcon_out_id: fabric_subcon_out_id,
				keterangan : 0
			 },
			dataType: 'json',
			method: 'post',
			success: function(data) {
				
				 $('#form_<?php echo $methodid ?>_subcon_out_barcode').val('');
			    if (data.bc_no == null ){
					bc_no ='-';
					bc_date = '-';
					custom_name= 'Saldo Awal';
					html='<label for="nama" style="display: block; text-align: left;">From : '+ custom_name+'</label><label for="nama" style="display: block; text-align: left;">Qty available : '+ data.quantity_available+'</label>';
				}else{
					bc_no = data.bc_no;
				    bc_date = data.bc_date;
					custom_name= data.custom_name;
					html='<label for="nama" style="display: block; text-align: left;">Dokumen : '+ custom_name+'</label><label for="nama" style="display: block; text-align: left;">Nopen : '+ bc_no +' Date : ' +bc_date+' </label><label for="nama" style="display: block; text-align: left;">Qty available : '+ data.quantity_available+'</label>';
				}
				
				 if (data.valid) {
				    swal({
					 title:'Available Stock', 
				     html:html+'<input type="text" id="qty_supply" class="swal2-input" name="qty_supply" value='+data.quantity+'>',
				     showCancelButton: true, // Menampilkan tombol batal
                     confirmButtonText: 'Supply', // Mengubah teks tombol konfirmasi
                     cancelButtonText: 'Cancel', // Mengubah teks tombol batal
				     focusConfirm: false, // Agar fokus ke input pertama
				      preConfirm: () => {
						   qty_supply = document.getElementById('qty_supply').value;
						   
						var data_send={
                             '<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>'
                             ,qty_supply: qty_supply.replace(/,/g, ".")
                             ,code_barcode:supply_barcode
							 ,fabric_subcon_out_id:fabric_subcon_out_id
							 ,fabric_subcon_out_detail_id:data.fabric_subcon_out_detail_id
							 ,keterangan : 1
						};
						
						  $.ajax({
                             type: "POST",
                             url:baseurl + '<?php echo $class_uri ?>/post_add_edit_scan',
                             data: data_send,
                             dataType : 'json',
                             success: function(msg){
								 console.log(msg);
							    if (msg.valid) {
								   show_success("show", '<?php echo $page_title ?>', msg.message);
														   								   
			                    }else {
									
			                     	show_error("show", 'Error', msg.message);
		 	                    }
								
								  $('#form_<?php echo $methodid ?>_supply_fabric_subcon_out_detail_id').val(msg.fabric_subcon_out_detail_id);
								
								  // $("#table_<?php //echo $methodid ?>_detail_supply").trigger('reloadGrid');
						         //  $("#table_<?php //echo $methodid ?>_detail_supply").setGridWidth($('.grid_container_<?php //echo $methodid; ?>_detail_supply').width() - 20,true).trigger('resize');
								   
								   $("#table_<?php echo $methodid ?>_supply").trigger('reloadGrid');
					               $("#table_<?php echo $methodid ?>_supply").setGridWidth($('.grid_container_<?php echo $methodid; ?>_supply').width() - 20,true).trigger('resize');
			                        
                             }
                          }) ;
						  
					  }
					})
				 }else{
					  show_error("show", 'Error', data.message);
				 }
			}
		  });
		  
	  
  }


	function cancel_<?php echo $methodid ?>(){
		$('#panel_content_<?php echo $methodid ?>').show();
		$('#panel_content_form_<?php echo $methodid ?>').hide();
		$("#table_<?php echo $methodid ?>").trigger('reloadGrid');
	}
	
	function save_<?php echo $methodid ?>(){
		$('#form_<?php echo $methodid ?>').submit();
	}
	
	function modal_view_<?php echo $methodid ?>(){
	
	   $('#modal_view_detail').modal('show');
	  //cancel_add_receive_<?php //echo $methodid ?>();
	       setTimeout(function() {
			   $("#table_<?php echo $methodid ?>_detail_supply").trigger('reloadGrid');
	          $("#table_<?php echo $methodid ?>_detail_supply").setGridWidth($('.grid_container_<?php echo $methodid; ?>_detail_supply').width() - 20, true).trigger('resize');
		
				$('.tab_scrollbar').getNiceScroll().resize();
			}, 200);
	 
	}
			
	
	function edit_<?php echo $methodid?>(id){
		page_loading("show",'<?php echo $page_title ?>','Please Wait...');
		$.ajax({
			url: baseurl+'loader',
			data: {
				'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'
				,param: 'data_fabric_subcon_out'
				,param_pop:'db_pop'
				,id : id
			},
			dataType: 'json',
			method: 'post',
			success: function(data){
				page_loading("hide");
				$('.button_<?php echo $methodid ?>_detail_edit').hide();
				$('.button_<?php echo $methodid ?>_detail_new').show();		
				
				subcon_out_open_form = 1;
				new_subcon_out = 0;
				subcon_out_id = data[0].subcon_out_id;
				subcon_out_lock_data = data[0].lock_data;
				subcon_out_receiver = data[0].receiver;
				subcon_out_contract_subcon_id = data[0].contract_subcon_id;
				
				$('#form_<?php echo $methodid ?>_fabric_subcon_out_id').val(data[0].fabric_subcon_out_id);
				$('#form_<?php echo $methodid ?>_subcon_out_no').val(data[0].fabric_subcon_no);
				$('#form_<?php echo $methodid ?>_subcon_out_date').val(data[0].fabric_subcon_date);
				$('#form_<?php echo $methodid ?>_style').val(data[0].style_subcon);
				$('#form_<?php echo $methodid ?>_no_po').val(data[0].purchase_order_no);
				
				change_form_<?php echo $methodid ?>_partner_id(data[0].partner_id);
				
			    $("#tab_<?php echo $methodid; ?>_supply").attr("data-toggle","tab");
				$("#tab_<?php echo $methodid; ?>_supply").removeClass( "tab_disabled");
			
				$('.panel_<?php echo $methodid ?>_panel_supply').show();
			
				setTimeout(function(){
				
					$("#tab_<?php echo $methodid; ?>_header").attr("data-toggle","tab");
					$("#tab_<?php echo $methodid; ?>_header").removeClass( "tab_disabled");
					$("#tab_<?php echo $methodid; ?>_header").click();
			
					change_form_<?php echo $methodid ?>_contract_subcon_id(data[0].contract_subcon_id);
					$('.tab_scrollbar').getNiceScroll().resize(); 
				}, 300);
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
				
						//$('#form_<?php echo $methodid ?>_detail_fabric_subcon_out_id').val(data.fabric_subcon_out_id);
						$('#form_<?php echo $methodid ?>_supply_fabric_subcon_out_id').val(data.fabric_subcon_out_id);
						
						//$("#tab_<?php echo $methodid; ?>_detail").attr("data-toggle","tab");
						//$("#tab_<?php echo $methodid; ?>_detail").removeClass( "tab_disabled");
						
						$("#tab_<?php echo $methodid; ?>_supply").attr("data-toggle","tab");
				        $("#tab_<?php echo $methodid; ?>_supply").removeClass( "tab_disabled");
						$("#tab_<?php echo $methodid; ?>_supply").click();
						
						//$("#tab_<?php echo $methodid; ?>_detail").click();
						
						setTimeout(function(){ 
								$("#table_<?php echo $methodid ?>_fabric_subcon_out_detail").trigger('reloadGrid');
								$("#table_<?php echo $methodid ?>_fabric_subcon_out_detail").setGridWidth($('.grid_container_<?php echo $methodid; ?>_fabric_subcon_out_detail').width() - 20,true).trigger('resize');
								$('.tab_scrollbar').getNiceScroll().resize(); 
							}, 500);
						
					} else {
						show_error("show",'Error',data.message);
					}
				},
				error: function(xhr,error){
					    //$('#panel_content_<?php //echo $methodid ?>').show();
						//$('#panel_content_form_<?php //echo $methodid ?>').hide();
						//$("#table_<?php //echo $methodid ?>").trigger('reloadGrid');
					show_error("show",xhr.status.toString() + ' ' + xhr.statusText,'Please try again');
					check_submit = 0;
				}
			});
		}
	}

     var check_submit = 0;
	function add_<?php echo $methodid ?>(){  //sementara form di hapus jadi tidak digunakan
		new_subcon_out = 0;
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
	
		
	function edit_detail_<?php echo $methodid ?>(subcon_out_detail_id){
		page_loading("show",'<?php echo $page_title ?>','Please Wait...');
		$.ajax({
			url: baseurl+'loader',
			data: {
				'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'
				,param: 'data_fabric_subcon_out_detail'
				,param_pop:'db_pop'
				,id : subcon_out_detail_id
			},
			dataType: 'json',
			method: 'post',
			success: function(data){
				page_loading("hide");
				console.log(data);
				
				$('#form_<?php echo $methodid ?>_detail_fabric_subcon_out_id').val(data[0].fabric_subcon_out_id);
				$('#form_<?php echo $methodid ?>_detail_fabric_subcon_out_detail_id').val(data[0].fabric_subcon_out_detail_id);
				$('#form_<?php echo $methodid ?>_detail_quantity_subcon').val(data[0].quantity_subcon);
				$('#form_<?php echo $methodid ?>_detail_conversion').val(data[0].conversion);
				$('#form_<?php echo $methodid ?>_detail_unit_price').val(data[0].unit_price);
				//$('#form_<?php echo $methodid ?>_detail_subcon_price').val(data[0].subcon_price);
                
				    $('.button_<?php echo $methodid ?>_detail_edit').show();
					$('.button_<?php echo $methodid ?>_detail_new').hide();	
					
					change_form_<?php echo $methodid ?>_detail_item_id(data[0].item_id);
					change_form_<?php echo $methodid ?>_detail_uom_id(data[0].uom_id);
					
					
				//if(subcon_out_receiver == 0){
				//	$('.button_<?php echo $methodid ?>_detail_edit').show();
				//	$('.button_<?php echo $methodid ?>_detail_new').hide();	
				//	
				//	change_form_<?php echo $methodid ?>_detail_item_id(data[0].item_id);
				//	change_form_<?php echo $methodid ?>_detail_uom_id(data[0].uom_id);
				//} else {
				//	$("#table_<?php echo $methodid ?>_receiver").trigger('reloadGrid');
				//}		
			}
		});
	}
	
	function supply_<?php echo $methodid ?>(fabric_subcon_out_id){
	  $.ajax({
			url: baseurl+'loader',
			data: {
				'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'
				,param: 'data_fabric_subcon_out_supply'
				,param_pop:'db_pop'
				,id : fabric_subcon_out_id
			},
			dataType: 'json',
			method: 'post',
			success: function(data){
		      //alert(fabric_subcon_out_id)
			 // console.log(data);
		      $('#form_<?php echo $methodid ?>_supply_fabric_subcon_out_id').val(data[0].fabric_subcon_out_id);
			  $('#form_<?php echo $methodid ?>_supply_fabric_subcon_out_detail_id').val(data[0].fabric_subcon_out_detail_id);
			  
			 //  $("#table_<?php //echo $methodid ?>_detail_supply").trigger('reloadGrid');
		     //  $("#table_<?php //echo $methodid ?>_detail_supply").setGridWidth($('.grid_container_<?php //echo $methodid; ?>_detail_supply').width() - 20,true).trigger('resize');
		     //  $('.tab_scrollbar').getNiceScroll().resize(); 
		
		    setTimeout(function(){ 
		       		        
		        $("#table_<?php echo $methodid ?>_supply").trigger('reloadGrid');
		        $("#table_<?php echo $methodid ?>_supply").setGridWidth($('.grid_container_<?php echo $methodid; ?>_supply').width() - 20,true).trigger('resize');
		        $('.tab_scrollbar').getNiceScroll().resize(); 
		     }, 200);
			}
		});
	}
	
	function delete_detail_<?php echo $methodid ?>(fabric_subcon_out_detail_id){
		//alert (fabric_subcon_out_detail_id +' - '+ check_submit);
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
						data: {'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>',fabric_subcon_out_detail_id:fabric_subcon_out_detail_id},
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
		$('#form_<?php echo $methodid ?>_detail_fabric_subcon_out_detail_id').val('');
		$('#form_<?php echo $methodid ?>_detail_quantity_subcon').val(0);
		$('#form_<?php echo $methodid ?>_detail_conversion').val(1);
		$('#form_<?php echo $methodid ?>_detail_unit_price').val(0);;
		//$('#form_<?php echo $methodid ?>_detail_subcon_price').val(0);;
		
		$('.button_<?php echo $methodid ?>_detail_edit').hide();
		$('.button_<?php echo $methodid ?>_detail_new').show();	
		
	}	
	
	function delete_detail_supply_<?php echo $methodid?>(fabric_subcon_out_supply_id){
		//page_loading("show", 'Delete <?php echo $page_title ?> Detail', 'Please Wait...');
		//alert (fabric_subcon_out_supply_id);
		$.ajax({
			url: baseurl + '<?php echo $class_uri ?>/delete_detail_supply',
			data: {
				'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
				fabric_subcon_out_supply_id: fabric_subcon_out_supply_id
			},
			dataType: 'json',
			method: 'post',
			success: function(data) {
				page_loading("hide");
				check_submit = 0;
				if (data.valid) {
					show_success("show", 'Cancel <?php echo $page_title ?> Supply', data.message);
								
				  $("#table_<?php echo $methodid ?>_supply").trigger('reloadGrid');
				  $("#table_<?php echo $methodid ?>_supply").setGridWidth($('.grid_container_<?php echo $methodid; ?>_supply').width() - 20,true).trigger('resize');
				
                //  $("#table_<?php //echo $methodid ?>_detail_supply").trigger('reloadGrid');
				//  $("#table_<?php //echo $methodid ?>_detail_supply").setGridWidth($('.grid_container_<?php //echo $methodid; ?>_detail_supply').width() - 20,true).trigger('resize');
			      
				  setTimeout(function() {
			      	$('.tab_scrollbar').getNiceScroll().resize();
			      }, 100);
				  
				} else {
					show_error("show", 'Error', data.message);
				}
			},
			error: function(xhr, error) {
				show_error("show", xhr.status.toString() + ' ' + xhr.statusText, 'Please try again');
				check_submit = 0;
			}
		});
		
		
	}
	
	function cetak_supply_<?php echo $methodid ?>(supply_id)
	{
		var fabric_transfer_supply_id = fabric_transfer_supply_id;
	    window.open(baseurl + '<?php echo $class_uri ?>/cetak_supply?' + 'fabric_subcon_out_supply_id=' + supply_id, '_BLANK');
	}
	
  var click_transfer_<?php echo $methodid ?> = function (id, isSelected) {
		if (!isSelected) {
			$('#form_<?php echo $methodid ?>_supply_fabric_subcon_out_detail_id').val('');
		} else {
			var row = jQuery("#table_<?php echo $methodid ?>_supply").jqGrid('getRowData',id);
		   // item_code =unwrap_cell_value(row.r5).replace(/,/g, '');
			//fabric_transfer_id = parseInt(unwrap_cell_value(row.r2).replace(/,/g, ''));
			//alert(fabric_transfer_detail_id);
		     
			//$('#form_<?php echo $methodid ?>_supply_fabric_transfer_id').val(fabric_transfer_id);
			$('#form_<?php echo $methodid ?>_supply_fabric_subcon_out_detail_id').val(id);
			
	
		$("#table_<?php echo $methodid ?>_supply").trigger('reloadGrid');	
		
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
	
	
	
</script>