<script type="text/javascript">
	function nav_button_<?php echo $function ?>() {
		spec_category_id = 1;
		spec_this_memo = 0;
		spec_lock_data = 0;

		$('#panel_content_<?php echo $methodid ?>').hide();
		$('#panel_content_form_<?php echo $methodid ?>').show();

		$('.form_title_<?php echo $methodid ?>').html('New <?php echo $page_title ?>');

		$('#form_<?php echo $methodid ?>_spec_category_uraian').val('');
		$('#form_<?php echo $methodid ?>_spec_category_note').val('');

		$('#form_<?php echo $methodid ?>_this_memo').val(spec_this_memo);






		new_spec = 1;


		$('.panel_<?php echo $methodid ?>_panel_spec_request').hide();


		setTimeout(function() {
			$('.tab_scrollbar').getNiceScroll().resize();
		}, 100);
	}
</script>