<script type="text/javascript">
	function nav_button_<?php echo $function ?>() {
		//alert(' echo $page_title ?>');
		new_karyawan = 1;
		return_request_id = 0;
		karyawan_type_id = 1;
		karyawan_this_memo = 0;
		karyawan_lock_data = 0;
		karyawan_open_form = 1;

		$('.form_title_<?php echo $methodid ?>').html('New <?php echo $page_title ?>');
		//	page_loading("show",'New <?php echo $page_title ?>','Please Wait...');

		//$("#tab_<?php echo $methodid; ?>_header").removeAttr("data-toggle");
		$("#tab_<?php echo $methodid; ?>_detail").removeAttr("data-toggle");


		$("#tab_<?php echo $methodid; ?>_detail").addClass("tab_disabled");



		$('#panel_content_<?php echo $methodid ?>').hide();
		$('#panel_content_form_<?php echo $methodid ?>').show();
		//$('#panel_content_form_upload_<?php echo $methodid ?>').hide();

		$('#form_<?php echo $methodid ?>_return_request_id').val('');
		$('#form_<?php echo $methodid ?>_fabric_transfer_detail_id').val('');

		$('#form_<?php echo $methodid ?>_return_no').val('');
		$('#form_<?php echo $methodid ?>_tgl_req').val('');
		$('#form_<?php echo $methodid ?>_alasan_return').val('');


		setTimeout(function() {
			//purchase_order_get_purchase_data();
			$('.tab_scrollbar').getNiceScroll().resize();
		}, 100);
	}
</script>