<script type="text/javascript">
    var new_goodnet = 1;
    var goodnet_id = 0;
    var goodnet_lock_data = 0;

    function add_base_<?php echo $methodid ?>() {
        $('.form_base_<?php echo $methodid ?>_button_location').hide();
        $('.form_base_<?php echo $methodid ?>').show();
    }

    function clear_<?php echo $methodid ?>() {
        $('.form_base_<?php echo $methodid ?>_button_location').show();
        $('.form_base_<?php echo $methodid ?>').hide();
    }


    var check_submit = 0;

    function post_base_<?php echo $methodid ?>() {
        if (check_submit == 0) {
            check_submit = 1;
            page_loading("show", 'Save <?php echo $page_title ?>', 'Please Wait...');
            var data = $("#form_base_<?php echo $methodid ?>").serialize();
            $.ajax({
                url: baseurl + '<?php echo $class_uri ?>/post_add_edit_base',
                data: data,
                dataType: 'json',
                method: 'post',
                success: function(data) {
                    page_loading("hide");
                    check_submit = 0;
                    if (data.valid) {

                        $('.form_base_<?php echo $methodid ?>_button_location').show();
                        $('.form_base_<?php echo $methodid ?>').hide();
                        show_success("show", '<?php echo $page_title ?>', data.message);
                        $("#table_<?php echo $methodid ?>_base").trigger('reloadGrid');

                        $("#table_<?php echo $methodid ?>_base").setGridWidth($('.grid_container_<?php echo $methodid; ?>_base').width() - 20, true).trigger('resize');

                    } else {
                        show_error("show", 'Error', data.message);
                    }
                },
                error: function(xhr, error) {
                    //$('#panel_content_<?php echo $methodid ?>').show();
                    //$('#panel_content_form_<?php echo $methodid ?>').hide();
                    //$("#table_<?php echo $methodid ?>").trigger('reloadGrid');
                    show_error("show", xhr.status.toString() + ' ' + xhr.statusText, 'Please try again');
                    check_submit = 0;
                }
            });
        }
    }

    function delete_base_<?php echo $methodid ?>() {
        var id = jQuery("#table_<?php echo $methodid ?>_base").jqGrid('getGridParam', 'selrow');
        if (id) {
            var row = jQuery("#table_<?php echo $methodid ?>_base").jqGrid('getRowData', id);
            swal({
                title: "Confirm Delete ?",
                type: "question",
                dangerMode: true,
                showCancelButton: !0,
                confirmButtonClass: "btn btn-danger m-1",
                cancelButtonClass: "btn btn-secondary m-1",
                confirmButtonText: "Confirm",
                cancelButtonText: "Cancel",
                backdrop: true,
                allowOutsideClick: false,
            }).then((result) => {
                if (result.value) {
                    page_loading("show", 'Delete <?php echo $page_title ?>', 'Please Wait...');
                    $.ajax({
                        url: baseurl + '<?php echo $class_uri ?>/delete_base',
                        data: {
                            '<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
                            location_base_id: row.r1
                        },
                        dataType: 'json',
                        method: 'post',
                        success: function(data) {
                            page_loading("hide");
                            check_submit = 0;
                            if (data.valid) {
                                show_success("show", 'Delete <?php echo $page_title ?>', data.message);
                                $("#table_<?php echo $methodid ?>_base").trigger('reloadGrid');
                            } else {
                                show_error("show", 'Error', data.message);
                            }
                        },
                        error: function(xhr, error) {
                            show_error("show", xhr.status.toString() + ' ' + xhr.statusText, 'Please try again');
                            check_submit = 0;
                        }
                    });
                } else if (result.dismiss === swal.DismissReason.cancel) {
                    swal.closeModal();
                }
            });
        } else {
            show_error("show", 'Error', 'Please select row');
        }
    }



    function handleEdit_base_<?php echo $methodid ?>() {
        var id = jQuery("#table_<?php echo $methodid ?>_base").jqGrid('getGridParam', 'selrow');
        if (id) {
            var row = jQuery("#table_<?php echo $methodid ?>_base").jqGrid('getRowData', id);

            $('.form_base_<?php echo $methodid ?>_button_location').hide();
            $('.form_base_<?php echo $methodid ?>').show();

            $('.form_title_<?php echo $methodid ?>').html('Edit Item Base');

            edit_base_<?php echo $methodid ?>(row.r1);
        } else {
            show_error("show", 'Error', 'Please select row');
        }
    }

    function edit_base_<?php echo $methodid ?>(id) {
        page_loading("show", '<?php echo $page_title ?>', 'Please Wait...');

        $.ajax({
            url: baseurl + 'loader',
            data: {
                '<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
                param: 'data_location_base',
                param_pop: 'db_pop',
                id: id
            },
            dataType: 'json',
            method: 'post',
            success: function(data) {
                page_loading("hide");

                if (data && data.length > 0) {
                    $('.form_base_<?php echo $methodid ?>').show();

                    $('#form_base_<?php echo $methodid ?>_location_base_id').val(data[0].location_base_id);

                    $('#form_base_<?php echo $methodid ?>_location_base_code').val(data[0].location_base_code);

                    $('#form_base_<?php echo $methodid ?>_location_base_name').val(data[0].location_base_name);

                    $('.form_base_<?php echo $methodid ?>_button_location').hide();
                    $('.form_base_<?php echo $methodid ?>').show();

                    setTimeout(function() {
                        $("#table_<?php echo $methodid ?>_base").trigger('reloadGrid');

                        $("#table_<?php echo $methodid ?>_base").setGridWidth($('.grid_container_<?php echo $methodid; ?>_base').width() - 20, true).trigger('resize');

                        $('.tab_scrollbar').getNiceScroll().resize();
                    }, 300);

                } else {
                    show_error("show", 'Error', 'Data detail tidak ditemukan');
                }
            },
            error: function(xhr) {
                page_loading("hide");
                show_error("show", 'Error', 'Gagal mengambil data dari server');
            }
        });
    }

    function print_barcode_base_<?php echo $methodid ?>(id) {
        var id = jQuery("#table_<?php echo $methodid ?>_base").jqGrid('getGridParam', 'selrow');
        if (id) {
            var row = jQuery("#table_<?php echo $methodid ?>_base").jqGrid('getRowData', id);



            window.open(baseurl + '<?php echo $class_uri ?>/cetak_barcode_location_base?' + 'id=' + id, '_BLANK');
        } else {
            show_error("show", 'Error', 'Please select row');
        }




    }
</script>