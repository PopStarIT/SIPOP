<script type="text/javascript">
	function nav_button_<?php echo $function ?>() {
		checklist_detail_id = 1;
		checklist_detail_this_memo = 0;
		checklist_detail_lock_data = 0;

		$('#panel_content_<?php echo $methodid ?>').hide();
		$('#panel_content_form_<?php echo $methodid ?>').show();

		$('.form_title_<?php echo $methodid ?>').html('New <?php echo $page_title ?>');

		$('#form_<?php echo $methodid ?>_checklist_detail_id').val('');

		$('#form_<?php echo $methodid ?>_this_memo').val(checklist_detail_this_memo);


		$('#form_<?php echo $methodid ?>_checklist_id').val('');
		$('#form_<?php echo $methodid ?>_master_list_id').val('');
		$('#form_<?php echo $methodid ?>_check_status').val('');
		$('#form_<?php echo $methodid ?>_comment').val('');
		$('#form_<?php echo $methodid ?>_pattern_name').val('');
		$('#form_<?php echo $methodid ?>_variant_name').val('');
		$('#form_<?php echo $methodid ?>_size').val('');
		





		new_checklist_detail = 1;


		$('.panel_<?php echo $methodid ?>_panel_checklist_detail_request').hide();


		setTimeout(function() {
			$('.tab_scrollbar').getNiceScroll().resize();
		}, 100);
	}
</script>