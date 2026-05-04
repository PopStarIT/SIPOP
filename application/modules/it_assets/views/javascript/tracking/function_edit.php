<script type="text/javascript">
    function nav_button_<?php echo $function ?>() {
        var id = jQuery("#table_<?php echo $methodid ?>").jqGrid('getGridParam', 'selrow');
        if (id) {
            var row = jQuery("#table_<?php echo $methodid ?>").jqGrid('getRowData', id);

            $('#panel_content_<?php echo $methodid ?>').hide();
            $('#panel_content_form_<?php echo $methodid ?>').show();
            $('.form_title_<?php echo $methodid ?>').html('Edit <?php echo $page_title ?>');
            $('#form_<?php echo $methodid ?>_item_base_id').val(row.r1);
            $('#form_detail_<?php echo $methodid ?>_detail_item_base_id').val(row.r1);
            $('#form_<?php echo $methodid ?>_item_base_code').val(row.r2);
            $('#form_<?php echo $methodid ?>_item_base_name').val(row.r3);
            $('#form_<?php echo $methodid ?>_item_category_id').val(row.r4);
            $('#form_<?php echo $methodid ?>_merk').val(row.r5);
            $('#form_<?php echo $methodid ?>_tipe').val(row.r6);
            $('#form_<?php echo $methodid ?>_spesifikasi_lain').val(row.r7);
            $('#form_<?php echo $methodid ?>_create_date').val(row.r8);
            edit_<?php echo $methodid ?>(row.r1);

        } else {
            show_error("show", 'Error', 'Please select row');
        }

        setTimeout(function() {
            $('.tab_scrollbar').getNiceScroll().resize();
        }, 100);
    }
</script>