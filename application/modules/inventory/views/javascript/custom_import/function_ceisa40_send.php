<script type="text/javascript">  
	
	function nav_button_<?php echo $function ?>(){
		var id = jQuery("#table_<?php echo $methodid ?>").jqGrid('getGridParam','selrow');
		if (id) { 
			var row = jQuery("#table_<?php echo $methodid ?>").jqGrid('getRowData',id); 
				
				var form_data = {username:$("#username_<?php echo $methodid ?>").val(), password:$("#password_<?php echo $methodid ?>").val(),'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'}
				page_loading("show",'Login Ceisa <?php echo $page_title ?>','Please Wait...');
				$.ajax({
					url : baseurl+'<?php echo $class_uri ?>/login_ceisa',
					type : 'POST',
					dataType: 'json',
					data : form_data,
					success: function(msg){
						page_loading("hide");
						if (msg.sts == '00'){
							page_loading("hide");
							swal({
							title: "Apakah Anda akan melakukan Sending Data To Ceisa?",
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
								page_loading("show",'Sending data to ceisa 40 <?php echo $page_title ?>','Please Wait...');
								$.ajax({
									url: baseurl+'<?php echo $class_uri ?>/send_to_ceisa40',								
									data: {'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'
									,bc_in_header_id:parseInt(row.r1.replace(/,/g, ''))
									,custom_type_id:parseInt(row.r2.replace(/,/g, ''))
									,noDaftar:parseInt(row.r6.replace(/,/g, ''))
									,id_respon:parseInt(row.r56.replace(/,/g, ''))
									,isFinal:'false'
									
									},
									dataType: 'json',
									method: 'post',
									success: function(msg){
										page_loading("hide");
										if (msg.sts == '00'){
											$("#table_<?php echo $methodid ?>").trigger('reloadGrid');
											if(msg.status=='failed'){
												show_error("show",msg.status +" ! " + '<br>' +" Keterangan : " + msg.message,'Sending Data <?php echo $page_title ?>');
											} else {
												show_success("show",msg.status +" ! " + '<br>' +" Keterangan : " + msg.message,'Sending Data <?php echo $page_title ?>'/*  + '<br>' +" Status : " + msg.dataStatus */);
												$("#table_<?php echo $methodid ?>").trigger('reloadGrid');
											}
										} else if ( msg.status != '00' ) {
										
											show_error("show",msg.status + ' ' + msg.dataStatus);
										}
									},
									error: function(xhr,error){
										show_error("show",xhr.status.toString() + ' ' + xhr.statusText,'Please try again');
										check_submit = 0;
									}
								});
							} else if (result.dismiss === swal.DismissReason.cancel) {
								swal.closeModal();	
							}
						});
							
						
						} else if ( msg.sts != '00' ) {
							page_loading("hide");
							show_error("show",msg.status + ' ' + msg.message,$("#username_<?php echo $methodid ?>").val());
						}
					},
					error: function(){

					}
				
				}); 
			
		} else {
			show_error("show",'Error','Please select row');
		}
	}
	function nav_button_<?php echo $function ?>xx(){
		var id = jQuery("#table_<?php echo $methodid ?>").jqGrid('getGridParam','selrow');
		if (id) { 
			var row = jQuery("#table_<?php echo $methodid ?>").jqGrid('getRowData',id); 

				var form_data = {username:$("#username_<?php echo $methodid ?>").val(), password:$("#password_<?php echo $methodid ?>").val(),'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'}
				page_loading("show",'Login Ceisa <?php echo $page_title ?>','Please Wait...');
				$.ajax({
					url : baseurl+'<?php echo $class_uri ?>/login_ceisa',
					type : 'POST',
					dataType: 'json',
					data : form_data,
					success: function(msg){
						page_loading("hide");
						if (msg.sts == '00'){
							
							page_loading("hide");
							swal({
								title: "Apakah Anda akan melakukan <b>Send To Ceisa data</b> ini ?",
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
									page_loading("show",'Sending Data <?php echo $page_title ?>','Please Wait...');
									alert(parseInt(row.r1.replace(/,/g, '')));
									$.ajax({
										url: baseurl+'<?php echo $class_uri ?>/send_to_ceisa40',																
										data: {'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'
										,bc_in_header_id:parseInt(row.r1.replace(/,/g, ''))
										,custom_type_id:parseInt(row.r2.replace(/,/g, ''))
										,noDaftar:parseInt(row.r6.replace(/,/g, ''))
										,id_respon:parseInt(row.r56.replace(/,/g, ''))
										,isFinal:'false'},
										//alert((row.r2.replace(/,/g, '')));
										//return false();
										dataType: 'json',
										method: 'post',
										success: function(msg){
											if (msg.sts == '00'){
												$("#table_<?php echo $methodid ?>").trigger('reloadGrid');
												if(msg.status=='failed'){
													show_error("show",msg.status +" ! " + '<br>' +" Keterangan : " + msg.message,'Sending Data <?php echo $page_title ?>');
												} else {
													show_success("show",msg.status +" ! " + '<br>' +" Keterangan : " + msg.message,'Sending Data <?php echo $page_title ?>'/*  + '<br>' +" Status : " + msg.dataStatus */);
													$("#table_<?php echo $methodid ?>").trigger('reloadGrid');
												}
												
												page_loading("hide");
											} else if ( msg.status != '00' ) {
											
												show_error("show",msg.status + ' ' + msg.dataStatus);
												page_loading("hide");
											}
										},
										error: function(msg,error){
											show_error("show",msg.status + ' ' + msg.message, 'Please try again');
											check_submit = 0;
										}
									});
									
									
								} else if (result.dismiss === swal.DismissReason.cancel) {
									swal.closeModal();	
								} 
							});	
						
						} else if ( msg.sts != '00' ) {
							page_loading("hide");
							show_error("show",msg.status + ' ' + msg.message,$("#username_<?php echo $methodid ?>").val());
						}
					},
					error: function(){

					}
				
				}); 
			
		} else {
			show_error("show",'Error','Please select row');
		}
	}
</script>