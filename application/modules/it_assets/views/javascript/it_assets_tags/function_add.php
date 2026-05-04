<script type="text/javascript">
	function nav_button_<?php echo $function ?>() {
		assets_tags_id = 1;
		assets_tags_memo = 0;
		assets_tags_lock_data = 0;

		$('#panel_content_<?php echo $methodid ?>').hide();
		$('#panel_content_form_<?php echo $methodid ?>').show();

		$('.form_title_<?php echo $methodid ?>').html('New <?php echo $page_title ?>');

		$('#form_<?php echo $methodid ?>_assets_tags_id').val('');
		$('#form_<?php echo $methodid ?>_assets_tags_name').val('');
		$('#form_<?php echo $methodid ?>_assets_tags_desc').val('');

		$('#form_<?php echo $methodid ?>_this_memo').val(item_this_memo);






		new_item = 1;


		$('.panel_<?php echo $methodid ?>_panel_it_request').hide();


		setTimeout(function() {
			$('.tab_scrollbar').getNiceScroll().resize();
		}, 100);
	}
</script>