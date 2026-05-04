<script type="text/javascript">
	function nav_button_<?php echo $function ?>() {
		id = 1;
		item_this_memo = 0;
		item_lock_data = 0;

		$('#panel_content_<?php echo $methodid ?>').hide();
		$('#panel_content_form_<?php echo $methodid ?>').show();

		$('.form_<?php echo $methodid ?>').html('New <?php echo $page_title ?>');

		$('#form_<?php echo $methodid ?>_id').val('');
		$('#form_<?php echo $methodid ?>_defect_cause').val('');
		$('#form_<?php echo $methodid ?>_defect_cause_related').val('');
		$('#form_<?php echo $methodid ?>_color').val('');





		new_item = 1;


		$('.panel_<?php echo $methodid ?>_panel_it_request').hide();


		setTimeout(function() {
			$('.tab_scrollbar').getNiceScroll().resize();
		}, 100);
	}
</script>