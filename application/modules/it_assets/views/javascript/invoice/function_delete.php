<script type="text/javascript">
    function nav_button_<?php echo $function ?>() {

        var id = jQuery("#table_<?php echo $methodid ?>").jqGrid('getGridParam', 'selrow');
        if (id) {
            var row = jQuery("#table_<?php echo $methodid ?>").jqGrid('getRowData', id);
            swal({
                title: "Confirm Delete <?php echo $page_title ?>?",
                text: "Are you sure you want to delete this invoice? This action cannot be undone.",
                type: "warning",
                dangerMode: true,
                showCancelButton: true,
                confirmButtonClass: "btn btn-danger m-1",
                cancelButtonClass: "btn btn-secondary m-1",
                confirmButtonText: "Yes, delete it",
                cancelButtonText: "Cancel",
                backdrop: true,
                allowOutsideClick: false
            }).then((result) => {
                if (result.value) {
                    page_loading("show", 'Delete <?php echo $page_title ?>', 'Please Wait...');
                    $.ajax({
                        url: baseurl + '<?php echo $class_uri ?>/delete_invoice',
                        data: {
                            '<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
                            invoice_id: row.r1
                        },
                        dataType: 'json',
                        method: 'post',
                        success: function(data) {
                            page_loading("hide");
                            if (data.valid) {
                                show_success("show", 'Delete <?php echo $page_title ?>', data.message);
                                $("#table_<?php echo $methodid ?>").trigger('reloadGrid');
                                $("#table_<?php echo $methodid ?>").setGridWidth($('.grid_container_<?php echo $methodid; ?>').width() - 20, true);
                                setTimeout(function() {
                                    $('.tab_scrollbar').getNiceScroll().resize();
                                }, 100);
                            } else {
                                show_error("show", 'Error', data.message || 'Failed to delete invoice');
                            }
                        },
                        error: function(xhr, status, error) {
                            page_loading("hide");
                            show_error("show", 'Error', 'Failed to delete invoice: ' + (error || 'Unknown error'));
                        }
                    });
                }
            });
        } else {
            show_error("show", 'Error', 'Please select an invoice to delete');
        }
    }
</script>