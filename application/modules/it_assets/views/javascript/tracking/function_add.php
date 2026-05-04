<script type="text/javascript">
	function nav_button_<?php echo $function ?>() {
		assets_id = 1;
		item_this_memo = 0;
		item_lock_data = 0;

		$('#panel_content_<?php echo $methodid ?>').hide();
		$('#panel_content_form_<?php echo $methodid ?>').show();

		$('.form_title_<?php echo $methodid ?>').html('New <?php echo $page_title ?>');

		$('#form_<?php echo $methodid ?>_assets_id').val('');
		$('#form_<?php echo $methodid ?>_item_code').val('');
		$('#form_<?php echo $methodid ?>_serial_number').val('');
		$('#form_<?php echo $methodid ?>_tgl_datang').val('');
		$('#form_<?php echo $methodid ?>_image').val('');
		$('#form_<?php echo $methodid ?>_waktu_garansi').val('');
		$('#form_<?php echo $methodid ?>_tempat_pembelian').val('');

		$('#form_<?php echo $methodid ?>_this_memo').val(item_this_memo);






		new_item = 1;


		$('.panel_<?php echo $methodid ?>_panel_it_request').hide();


		setTimeout(function() {
			$('.tab_scrollbar').getNiceScroll().resize();
		}, 100);
	}
</script>