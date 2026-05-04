<script type="text/javascript">
	function nav_button_<?php echo $function ?>() {
		goodnet_id = 1;
		goodnet_this_memo = 0;
		goodnet_lock_data = 0;

		$('#panel_content_<?php echo $methodid ?>').hide();
		$('#panel_content_form_<?php echo $methodid ?>').show();

		$('.form_title_<?php echo $methodid ?>').html('New <?php echo $page_title ?>');

		$('#form_<?php echo $methodid ?>_goodnet_id').val('');

		$('#form_<?php echo $methodid ?>_this_memo').val(goodnet_this_memo);


		$('#form_<?php echo $methodid ?>_nama').val('');
		$('#form_<?php echo $methodid ?>_deskripsi').val('');



		new_goodnet = 1;


		$('.panel_<?php echo $methodid ?>_panel_goodnet_request').hide();


		setTimeout(function() {
			$('.tab_scrollbar').getNiceScroll().resize();
		}, 100);
	}
</script>