<script type="text/javascript">
    function nav_button_<?php echo $function ?>() {
        var id = jQuery("#table_<?php echo $methodid ?>").jqGrid('getGridParam', 'selrow');
        if (id) {
            var row = jQuery("#table_<?php echo $methodid ?>").jqGrid('getRowData', id);

            $('#panel_content_<?php echo $methodid ?>').hide();
            $('#panel_content_form_<?php echo $methodid ?>').show();
         

            // Clear previous form data
            $('#form_<?php echo $methodid ?>')[0].reset();
            $('.current-file-info').remove();

            // Set the invoice ID
            $('#form_<?php echo $methodid ?>_id').val(row.r1);
            $('#form_assign_<?php echo $methodid ?>_assign_id').val(row.r1);

            // Call edit function to load complete data
            edit_<?php echo $methodid ?>(row.r1);
        } else {
            show_error("show", 'Error', 'Please select row');
        }

        setTimeout(function() {
            $('.tab_scrollbar_title').getNiceScroll().resize();
        }, 100);
    }
</script>