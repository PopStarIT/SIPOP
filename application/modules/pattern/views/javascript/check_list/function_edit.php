<script type="text/javascript">
    function nav_button_<?php echo $function ?>() {
        var id = jQuery("#table_<?php echo $methodid ?>").jqGrid('getGridParam', 'selrow');
        if (id) {
            var row = jQuery("#table_<?php echo $methodid ?>").jqGrid('getRowData', id);

            $('#panel_content_<?php echo $methodid ?>').hide();
            $('#panel_content_form_<?php echo $methodid ?>').show();
            $('.form_title_<?php echo $methodid ?>').html('Edit <?php echo $page_title ?>');
            // alert(row.r2);
            $('#form_<?php echo $methodid ?>_list_id').val(row.r1);
            $('#form_<?php echo $methodid ?>_name').val(row.r2);

            edit_<?php echo $methodid ?>(row.r1);

        } else {
            show_error("show", 'Error', 'Please select row');
        }

        setTimeout(function() {
            $('.tab_scrollbar').getNiceScroll().resize();
        }, 100);
    }
</script>