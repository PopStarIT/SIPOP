<script type="text/javascript">  
	function edit_<?php echo $methodid?>(id){
		$.ajax({
			url: baseurl+'loader',
			data: {
				'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'
				,param: 'data_user_management'
				,id : id
			},
			dataType: 'json',
			method: 'post',
			success: function(data){
				$('#form_<?php echo $methodid ?>_user_id').val(data[0].user_id);
				$('#form_<?php echo $methodid ?>_username').val(data[0].username);
				$('#form_<?php echo $methodid ?>_password').val(data[0].password);
				$('#form_<?php echo $methodid ?>_confirm_password').val(data[0].confirm_password);
				$('#form_<?php echo $methodid ?>_name').val(data[0].name);
				$('#form_<?php echo $methodid ?>_email').val(data[0].email);
				$('#form_<?php echo $methodid ?>_phone').val(data[0].phone);
				
				change_form_<?php echo $methodid ?>_role_id(data[0].role_id);
				change_form_<?php echo $methodid ?>_user_status_id(data[0].user_status_id);
				
				$('.user_work_process_id').prop('checked', false);
				data_detail = data.detail;
				if(data_detail){
					for (var key in data_detail) {
					   if (data_detail.hasOwnProperty(key)) {
						  $('.user_work_process_id_'+data_detail[key].work_process_id).prop('checked', true);
					   }
					}
				}
			}
		});
	}
	
	var jvalidate = $("#form_<?php echo $methodid ?>").validate({
		ignore: [],
		rules: {                                            
			item_group: {
				required: true
			}
		} 
	});
	
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
</script>