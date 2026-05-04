<script type="text/javascript">
    function nav_button_<?php echo $function ?>() {
        sales_type_id = 1;
        sales_this_memo = 0;
        sales_lock_data = 0;

        $('#panel_content_<?php echo $methodid ?>').hide();
        $('#panel_content_form_<?php echo $methodid ?>').show();

        $('.form_title_<?php echo $methodid ?>').html('New <?php echo $page_title ?>');

        $('#form_<?php echo $methodid ?>_goodnet').val('');
        $('#form_<?php echo $methodid ?>_sales_type_id').val(sales_type_id);
        $('#form_<?php echo $methodid ?>_this_memo').val(sales_this_memo);
        getnexttransno(15, 'form_<?php echo $methodid ?>_nama');
   
        $('#form_<?php echo $methodid ?>_deskripsi').val('');

      
        new_goodnet = 1;
    

        $('.panel_<?php echo $methodid ?>_panel_goodnet_request').hide();
 
     

        // change_mat_item(-1);

        setTimeout(function() {
            $('.tab_scrollbar').getNiceScroll().resize();
        }, 100);
    }
</script>