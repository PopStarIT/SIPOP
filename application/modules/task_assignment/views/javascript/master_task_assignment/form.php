<script type="text/javascript">
    var check_submit = 0;

    // Event handler untuk tab click
    $(".form_tab_<?php echo $methodid ?>").on("click", "a", function(e) {
        e.preventDefault();

        setTimeout(function() {
            var item_base_id = $('#form_detail_<?php echo $methodid ?>_detail_item_base_id').val();

            $("#table_<?php echo $methodid ?>_header").trigger('reloadGrid');
            $("#table_<?php echo $methodid ?>_header").setGridWidth($('.grid_container_<?php echo $methodid; ?>_header').width() - 20, true).trigger('resize');

            $('.tab_scrollbar').getNiceScroll().resize();
        }, 1000);
    });

    // Fungsi save untuk tab Header
    function save_<?php echo $methodid ?>() {
        $('#form_<?php echo $methodid ?>').submit();
    }

    // Fungsi cancel untuk tab Header
    function cancel_<?php echo $methodid ?>() {
        $('#panel_content_<?php echo $methodid ?>').show();
        $('#panel_content_form_<?php echo $methodid ?>').hide();
    }

    // Fungsi save untuk tab Assign
    function save_<?php echo $methodid ?>_assign() {
        $('#form_assign_<?php echo $methodid ?>').submit();
    }

    // Fungsi cancel untuk tab Assign
    function cancel_<?php echo $methodid ?>_assign() {
        $('#panel_content_<?php echo $methodid ?>').show();
        $('#panel_content_form_<?php echo $methodid ?>').hide();
    }

    // Fungsi edit data
    function edit_<?php echo $methodid ?>(id) {
        page_loading("show", '<?php echo $page_title ?>', 'Please Wait...');

        $.ajax({
            url: baseurl + 'loader',
            data: {
                '<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
                param: 'data_master_task_assignment',
                param_pop: 'db_pop',
                id: id
            },
            dataType: 'json',
            method: 'post',
            success: function(data) {
                page_loading("hide");
                if (data && data.length > 0) {
                    // Set values to Header form (Tab 1)
                    $('#form_<?php echo $methodid ?>_id').val(data[0].id);
                    $('#form_<?php echo $methodid ?>_style_id').val(data[0].style_id);
                    $('#form_<?php echo $methodid ?>_line_id').val(data[0].line_id);
                    $('#form_<?php echo $methodid ?>_target_output').val(data[0].target_output);
                    $('#form_<?php echo $methodid ?>_order_qty').val(data[0].order_qty);
                    $('#form_<?php echo $methodid ?>_created_date').val(data[0].created_date);

                    // Copy data to Assign form (Tab 2)
                    $('#form_assign_<?php echo $methodid ?>_id').val(data[0].id);
                    $('#form_assign_<?php echo $methodid ?>_header_id').val(data[0].id);
                    $('#form_assign_<?php echo $methodid ?>_style_id').val(data[0].style_id);
                    $('#form_assign_<?php echo $methodid ?>_line_id').val(data[0].line_id);
                    $('#form_assign_<?php echo $methodid ?>_target_output').val(data[0].target_output);
                    $('#form_assign_<?php echo $methodid ?>_order_qty').val(data[0].order_qty);
                    $('#form_assign_<?php echo $methodid ?>_created_date').val(data[0].created_date);

                    // Update UI - Enable tabs
                    $("#tab_<?php echo $methodid; ?>").attr("data-toggle", "tab").removeClass("tab_disabled");
                    $("#tab_<?php echo $methodid; ?>_assign").attr("data-toggle", "tab").removeClass("tab_disabled");

                    // Show panel
                    $('.panel_<?php echo $methodid ?>').show();
                    $('#panel_content_<?php echo $methodid ?>').hide();
                    $('#panel_content_form_<?php echo $methodid ?>').show();

                    // Reload grid if exists
                    if ($("#table_<?php echo $methodid ?>").length) {
                        $("#table_<?php echo $methodid ?>").trigger('reloadGrid');
                    }

                    console.log('Data loaded successfully:', data[0]);
                } else {
                    show_error("show", 'Error', 'Data not found');
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error: ' + status + ' - ' + error);
                page_loading("hide");
                show_error("show", 'Error', 'Failed to load data: ' + error);
            }
        });
    }

    // Fungsi delete data
    function delete_<?php echo $methodid ?>(id) {
        if (check_submit == 0) {
            swal({
                title: "Apakah anda yakin akan menghapus ini?",
                type: "question",
                dangerMode: true,
                showCancelButton: true,
                confirmButtonClass: "btn btn-danger m-1",
                cancelButtonClass: "btn btn-secondary m-1",
                confirmButtonText: "Confirm",
                cancelButtonText: "Cancel",
                backdrop: true,
                allowOutsideClick: false,
            }).then((result) => {
                if (result.value) {
                    check_submit = 1;
                    page_loading("show", 'Delete Master Task Assignment', 'Please Wait...');

                    $.ajax({
                        url: baseurl + '<?php echo $class_uri ?>/delete',
                        data: {
                            '<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
                            id: id
                        },
                        dataType: 'json',
                        method: 'post',
                        success: function(data) {
                            page_loading("hide");
                            check_submit = 0;
                            if (data.valid) {
                                show_success("show", 'Delete Master Task Assignment', data.message);

                                $("#table_<?php echo $methodid ?>").trigger('reloadGrid');
                                $("#table_<?php echo $methodid ?>").setGridWidth($('.grid_container_<?php echo $methodid; ?>').width() - 20, true).trigger('resize');
                                $('.tab_scrollbar').getNiceScroll().resize();

                                setTimeout(function() {
                                    $('.tab_scrollbar').getNiceScroll().resize();
                                }, 100);
                            } else {
                                show_error("show", 'Error', data.message);
                            }
                        },
                        error: function(xhr, error) {
                            show_error("show", xhr.status.toString() + ' ' + xhr.statusText, 'Please try again');
                            check_submit = 0;
                            page_loading("hide");
                        }
                    });
                } else if (result.dismiss === swal.DismissReason.cancel) {
                    swal.closeModal();
                    check_submit = 0;
                }
            });
        }
    }

        // Fungsi post untuk tab Header
        function post_<?php echo $methodid ?>() {
            if (check_submit == 0) {
                check_submit = 1;
                page_loading("show", '<?php echo $page_title ?>', 'Please Wait...');
                var data = $("#form_<?php echo $methodid ?>").serialize();

                $.ajax({
                    url: baseurl + '<?php echo $class_uri ?>/post_add_edit',
                    data: data,
                    dataType: 'json',
                    method: 'post',
                    success: function(data) {
                        page_loading("hide");
                        check_submit = 0;
                        if (data.valid) {
                            show_success("show", 'Success Master Task Assignment', data.message);

                            // Update form assign dengan data terbaru jika ada ID
                            if (data.id) {
                                $('#form_assign_<?php echo $methodid ?>_header_id').val(data.id);
                                $('#form_assign_<?php echo $methodid ?>_id').val(data.id);

                                // Enable tab assign
                                $("#tab_<?php echo $methodid; ?>_assign").attr("data-toggle", "tab").removeClass("tab_disabled");
                            }

                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else {
                            show_error("show", 'Error', data.message);
                        }
                    },
                    error: function(xhr, error) {
                        show_error("show", xhr.status.toString() + ' ' + xhr.statusText, 'Please try again');
                        check_submit = 0;
                        page_loading("hide");
                    }
                });
            }
        }

        // Fungsi post untuk tab Assign
        function post_<?php echo $methodid ?>_assign() {
            
            if (check_submit == 0) {
                check_submit = 1;
                page_loading("show", '<?php echo $page_title ?>', 'Please Wait...');
                var data = $("#form_assign_<?php echo $methodid ?>").serialize();

                $.ajax({
                    url: baseurl + '<?php echo $class_uri ?>/post_assign',
                    data: data,
                    dataType: 'json',
                    method: 'post',
                    success: function(data) {
                        page_loading("hide");
                        check_submit = 0;
                        if (data.valid) {
                            show_success("show", 'Success Assign Task', data.message);

                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else {
                            show_error("show", 'Error', data.message);
                        }
                    },
                    error: function(xhr, error) {
                        show_error("show", xhr.status.toString() + ' ' + xhr.statusText, 'Please try again');
                        check_submit = 0;
                        page_loading("hide");
                    }
                });
            }
        }

    // Initialize saat document ready
    $(document).ready(function() {
        // Disable tab assign by default
        $("#tab_<?php echo $methodid; ?>_assign").addClass("tab_disabled");

        console.log('Form initialized');
    });
</script>