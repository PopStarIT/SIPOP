<script type="text/javascript">  
	function nav_button_<?php echo $function ?>(){
		$('#mdl_pengoloran_<?php echo $methodid ?>').modal();
		
	}
	
	$("#btnclose_login_<?php echo $methodid ?>").click(function(){
		$('#mdl_pengoloran_<?php echo $methodid ?>').modal('toggle');
	});
	
	$("#btnproseslogin_<?php echo $methodid ?>").click(function(){
			var form_data = {username:$("#username_<?php echo $methodid ?>").val(), password:$("#password_<?php echo $methodid ?>").val(),'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'}
			$.ajax({
				url : baseurl+'<?php echo $class_uri ?>/login_ceisa',
				type : 'POST',
				dataType: 'json',
				data : form_data,
				success: function(msg){
					if (msg.sts == '00'){
						show_success("show",msg.status + ' ' + msg.message,$("#username_<?php echo $methodid ?>").val());
						$('#mdl_pengoloran_<?php echo $methodid ?>').modal('toggle');

					} else if ( msg.sts != '00' ) {
					
						show_error("show",msg.status + ' ' + msg.message,$("#username_<?php echo $methodid ?>").val());
					}
				},
				error: function(){

				}
			}); 
	
	});
	
	
	
</script>