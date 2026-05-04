<script type="text/javascript">
	function nav_button_<?php echo $function ?>() {
		checklist_id = 1;
		checklist_this_memo = 0;
		checklist_lock_data = 0;

		$('#panel_content_<?php echo $methodid ?>').hide();
		$('#panel_content_form_<?php echo $methodid ?>').show();

		$('.form_title_<?php echo $methodid ?>').html('New <?php echo $page_title ?>');

		$('#form_<?php echo $methodid ?>_checklist_id').val('');

		$('#form_<?php echo $methodid ?>_this_memo').val(checklist_this_memo);


		$('#form_<?php echo $methodid ?>_list').val('');




		new_checklist = 1;


		$('.panel_<?php echo $methodid ?>_panel_checklist_request').hide();


		setTimeout(function() {
			$('.tab_scrollbar').getNiceScroll().resize();
		}, 100);
	}
</script>