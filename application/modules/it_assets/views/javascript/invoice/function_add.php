<script type="text/javascript">
	function nav_button_<?php echo $function ?>() {
		invoice_id = 1;
		item_this_memo = 0;
		item_lock_data = 0;

		$('#panel_content_<?php echo $methodid ?>').hide();
		$('#panel_content_form_<?php echo $methodid ?>').show();

		$('.form_title_<?php echo $methodid ?>').html('New <?php echo $page_title ?>');

		$('#form_title_<?php echo $methodid ?>_invoice_id').val('');
		$('#form_title_<?php echo $methodid ?>_invoice_number').val('');
		$('#form_title_<?php echo $methodid ?>_invoice_file').val('');
		$('#form_title_<?php echo $methodid ?>_keterangan').val('');
		$('#form_title_<?php echo $methodid ?>_create_date').val('<?php echo date('Y-m-d H:i:s') ?>');

		$('#form_title_<?php echo $methodid ?>_garansi').val('');






		new_item = 1;


		$('.panel_<?php echo $methodid ?>_panel_it_request').hide();


		setTimeout(function() {
			$('.tab_scrollbar').getNiceScroll().resize();
		}, 100);
	}
</script>