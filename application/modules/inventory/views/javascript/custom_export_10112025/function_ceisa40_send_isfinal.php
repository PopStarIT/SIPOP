<script type="text/javascript">  
	$("#child_401013").click(function(){
		
			var id = jQuery("#table_<?php echo $methodid ?>").jqGrid('getGridParam','selrow');
		if (id) { 
			var row = jQuery("#table_<?php echo $methodid ?>").jqGrid('getRowData',id); 

				var form_data = {username:$("#username_<?php echo $methodid ?>").val(), password:$("#password_<?php echo $methodid ?>").val(),'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'}
				$.ajax({
					url : baseurl+'<?php echo $class_uri ?>/login_ceisa',
					type : 'POST',
					dataType: 'json',
					data : form_data,
				
				}); 
	

			swal({
				title: "Send To Ceisa (IsFinal)?",
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
					$.ajax({
						url: baseurl+'<?php echo $class_uri ?>/send_to_ceisa40',								
						data: {'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'
						,bc_out_header_id:parseInt(row.r1.replace(/,/g, ''))
						,custom_type_id:parseInt(row.r2.replace(/,/g, ''))
						,noDaftar:parseInt(row.r6.replace(/,/g, ''))
						,id_respon:parseInt(row.r51.replace(/,/g, ''))
						,isFinal:'true'},
						//alert((row.r2.replace(/,/g, '')));
						//return false();
						dataType: 'json',
						method: 'post',
						success: function(msg){
							if (msg.sts == '00'){
								$("#table_<?php echo $methodid ?>").trigger('reloadGrid');
								// $('#jqgrid').trigger('reloadGrid');
								if(msg.status=='failed'){
									show_error("show",msg.status +" ! " + '<br>' +" Keterangan : " + msg.message,'Sending Data <?php echo $page_title ?>');
								} else {
									show_success("show",msg.status +" ! " + '<br>' +" Keterangan : " + msg.message,'Sending Data <?php echo $page_title ?>'/*  + '<br>' +" Status : " + msg.dataStatus */);
									// $('#jqgrid').trigger('reloadGrid');
									$("#table_<?php echo $methodid ?>").trigger('reloadGrid');
								}
								
							
							} else if ( msg.status != '00' ) {
							
								show_error("show",msg.status + ' ' + msg.dataStatus);
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
		} else {
			show_error("show",'Error','Please select row');
		}
		
	});
	
	
	function nav_button_<?php echo $function ?>(){
		var id = jQuery("#table_<?php echo $methodid ?>").jqGrid('getGridParam','selrow');
		if (id) { 
			var row = jQuery("#table_<?php echo $methodid ?>").jqGrid('getRowData',id); 

				var form_data = {username:$("#username_<?php echo $methodid ?>").val(), password:$("#password_<?php echo $methodid ?>").val(),'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'}
				$.ajax({
					url : baseurl+'<?php echo $class_uri ?>/login_ceisa',
					type : 'POST',
					dataType: 'json',
					data : form_data,
				
				}); 
	

			swal({
				title: "Send To Ceisa (IsFinal)?",
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
					$.ajax({
						url: baseurl+'<?php echo $class_uri ?>/send_to_ceisa40',								
						data: {'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'
						,bc_out_header_id:parseInt(row.r1.replace(/,/g, ''))
						,custom_type_id:parseInt(row.r2.replace(/,/g, ''))
						,noDaftar:parseInt(row.r6.replace(/,/g, ''))
						,id_respon:parseInt(row.r51.replace(/,/g, ''))
						,isFinal:'true'},
						//alert((row.r2.replace(/,/g, '')));
						//return false();
						dataType: 'json',
						method: 'post',
						success: function(msg){
							if (msg.sts == '00'){
								$("#table_<?php echo $methodid ?>").trigger('reloadGrid');
								// $('#jqgrid').trigger('reloadGrid');
								if(msg.status=='failed'){
									show_error("show",msg.status +" ! " + '<br>' +" Keterangan : " + msg.message,'Sending Data <?php echo $page_title ?>');
								} else {
									show_success("show",msg.status +" ! " + '<br>' +" Keterangan : " + msg.message,'Sending Data <?php echo $page_title ?>'/*  + '<br>' +" Status : " + msg.dataStatus */);
									// $('#jqgrid').trigger('reloadGrid');
									$("#table_<?php echo $methodid ?>").trigger('reloadGrid');
								}
								
							
							} else if ( msg.status != '00' ) {
							
								show_error("show",msg.status + ' ' + msg.dataStatus);
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
		} else {
			show_error("show",'Error','Please select row');
		}
	}
</script>