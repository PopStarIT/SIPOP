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
						page_loading("show",'Get Respon Status <?php echo $page_title ?>','Please Wait...');
						$.ajax({
							url: baseurl+'<?php echo $class_uri ?>/get_respon_ceisa_new',								
							data: {'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'
							,bc_in_header_id:parseInt(row.r1.replace(/,/g, '')),car:(row.r5.replace(/,/g, ''))},
							dataType: 'json',
							method: 'post',
							success: function(msg){
								page_loading("hide");
								if (msg.sts == '00'){
									$("#table_<?php echo $methodid ?>").trigger('reloadGrid');
									show_success("show",msg.status +" ! " + '<br>' +" Keterangan : " + msg.message," Status : " + msg.dataStatus );
								
								} else if ( msg.sts != '00' ) {
								
									show_error("show",msg.status + ' ' + msg.dataStatus,'Get Respon <?php echo $page_title ?>');
								}
							},
							error: function(msg,error){
								page_loading("hide");
								show_error("show",msg.status + ' ' + msg.message, 'Please try again');
								check_submit = 0;
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