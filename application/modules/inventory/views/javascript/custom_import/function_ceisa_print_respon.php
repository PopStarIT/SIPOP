<script type="text/javascript">  
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
				title: "Print Respon?",
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
					page_loading("show",'Get Respon Status <?php echo $page_title ?>','Please Wait...');
					$.ajax({
						url: baseurl+'<?php echo $class_uri ?>/print_ceisa',								
						data: {'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'
						,bc_in_header_id:parseInt(row.r1.replace(/,/g, ''))
						,car:(row.r5.replace(/,/g, ''))},
						dataType: 'json',
						method: 'post',
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