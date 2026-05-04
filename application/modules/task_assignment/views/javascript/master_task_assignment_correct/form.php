<script type="text/javascript">
    $(".form_tab_<?php echo $methodid ?>").on("click", "a", function(e) {
        e.preventDefault();

        setTimeout(function() {



            $("#table_<?php echo $methodid ?>").trigger('reloadGrid');
            $("#table_<?php echo $methodid ?>").setGridWidth($('.grid_container_<?php echo $methodid; ?>').width() - 20, true).trigger('resize');



            $('.tab_scrollbar').getNiceScroll().resize();
        }, 1000);
    });

    function save_modal_<?php echo $methodid ?>() {

        $('#modal_form_<?php echo $methodid ?>').submit();
    }


    function cancel_<?php echo $methodid ?>() {
        $('#panel_content_<?php echo $methodid ?>').show();
        $('#panel_content_form_<?php echo $methodid ?>').hide();
    }


    function edit_<?php echo $methodid ?>(id) {
        page_loading("show", '<?php echo $page_title ?>', 'Please Wait...');

        $.ajax({
            url: baseurl + 'loader',
            data: {
                '<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
                param: 'data_master_task_assignment_correct',
                param_pop: 'db_pop',
                id: id
            },

            dataType: 'json',
            method: 'post',
            success: function(data) {
                page_loading("hide");

                if (data && data.length > 0) {
                    // Set values to the form fields
                    $('#form_<?php echo $methodid ?>_id').val(data[0].id);
                    $('#form_<?php echo $methodid ?>_task_assignment_id').val(data[0].task_assignment_id);
                    $('#form_<?php echo $methodid ?>_rft_size_id').val(data[0].rft_size_id);
                    $('#form_<?php echo $methodid ?>_rft_colour_id').val(data[0].rft_colour_id);
                    $('#form_<?php echo $methodid ?>_created_at').val(data[0].created_at);
                    $('#form_<?php echo $methodid ?>_rft_status').val(data[0].rft_status);

                    // Update tab dan panel (jika masih diperlukan)
                    $("#tab_<?php echo $methodid; ?>").attr("data-toggle", "tab").removeClass("tab_disabled");
                    $('.panel_<?php echo $methodid ?>').show();

                    // *** TAMPILKAN MODAL ***
                    $('#modal_edit_<?php echo $methodid ?>').modal('show');

                } else {
                    show_error("show", 'Error', 'Data not found');
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error: ' + status + ' - ' + error);
                page_loading("hide");
                show_error("show", 'Error', 'Failed to load data');
            }
        });
    }

    function edit_<?php echo $methodid ?>_defect(id) {
        alert('masuk');
        page_loading("show", '<?php echo $page_title ?>', 'Please Wait...');

        $.ajax({
            url: baseurl + 'loader',
            data: {
                '<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
                param: 'data_master_task_assignment_correct',
                param_pop: 'db_pop',
                id: id
            },
            dataType: 'json',
            method: 'post',
            success: function(data) {
                page_loading("hide");
                if (data && data.length > 0) {
                    // Set values to the form fields
                    $('#form_<?php echo $methodid ?>_id').val(data[0].id);
                    $('#form_<?php echo $methodid ?>_task_assignment_id').val(data[0].task_assignment_id);
                    $('#form_<?php echo $methodid ?>_rft_size_id').val(data[0].rft_size_id);
                    $('#form_<?php echo $methodid ?>_rft_colour_id').val(data[0].rft_colour_id);
                    $('#form_<?php echo $methodid ?>_created_at').val(data[0].created_at);
                    $('#form_<?php echo $methodid ?>_rft_status').val(data[0].rft_status);
                    $("#tab_<?php echo $methodid; ?>").attr("data-toggle", "tab").removeClass("tab_disabled");
                    $('.panel_<?php echo $methodid ?>').show();
                    $("#table_<?php echo $methodid ?>").trigger('reloadGrid');
                } else {
                    show_error("show", 'Error', 'Data not found');
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error: ' + status + ' - ' + error);
                page_loading("hide");
                show_error("show", 'Error', 'Failed to load data');
            }
        });
    }

    function edit_<?php echo $methodid ?>_reject(id) {
        alert('masuk');
        page_loading("show", '<?php echo $page_title ?>', 'Please Wait...');

        $.ajax({
            url: baseurl + 'loader',
            data: {
                '<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
                param: 'data_master_task_assignment_correct',
                param_pop: 'db_pop',
                id: id
            },
            dataType: 'json',
            method: 'post',
            success: function(data) {
                page_loading("hide");
                if (data && data.length > 0) {
                    // Set values to the form fields
                    $('#form_<?php echo $methodid ?>_id').val(data[0].id);
                    $('#form_<?php echo $methodid ?>_task_assignment_id').val(data[0].task_assignment_id);
                    $('#form_<?php echo $methodid ?>_rft_size_id').val(data[0].rft_size_id);
                    $('#form_<?php echo $methodid ?>_rft_colour_id').val(data[0].rft_colour_id);
                    $('#form_<?php echo $methodid ?>_created_at').val(data[0].created_at);
                    $('#form_<?php echo $methodid ?>_rft_status').val(data[0].rft_status);
                    $("#tab_<?php echo $methodid; ?>").attr("data-toggle", "tab").removeClass("tab_disabled");
                    $('.panel_<?php echo $methodid ?>').show();
                    $("#table_<?php echo $methodid ?>").trigger('reloadGrid');
                } else {
                    show_error("show", 'Error', 'Data not found');
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error: ' + status + ' - ' + error);
                page_loading("hide");
                show_error("show", 'Error', 'Failed to load data');
            }
        });
    }





    function delete<?php echo $methodid ?>(id) {
        alert('masuk');
        if (check_submit == 0) {
            swal({
                title: "Apakah anda yakin akan menghapus ini?",
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
                        }
                    });

                } else if (result.dismiss === swal.DismissReason.cancel) {
                    swal.closeModal();
                    check_submit = 0;
                }
            })
        }
    }





    var check_submit = 0;

    function post_rft_<?php echo $methodid ?>() {
        if (check_submit == 0) {
            check_submit = 1;
            page_loading("show", '<?php echo $page_title ?>', 'Please Wait...');
            var activeModal = $("#dataCardModal_<?php echo $methodid ?>").hasClass('show') ? "#modal_form_<?php echo $methodid ?>";


            var data = $(activeModal).serialize();
            $.ajax({
                url: baseurl + '<?php echo $class_uri ?>/post_add_edit_rft',
                data: data,
                dataType: 'json',
                method: 'post',
                success: function(data) {
                    check_submit = 0;
                    page_loading("hide");
                    if (data.valid) {
                        show_success("show", 'Success', data.message, function() {
                            $(activeModal).closest('.modal').modal("hide");
                            $(activeModal)[0].reset();
                            clearDetailFormOut();
                        });
                    } else {
                        show_error("show", 'Error', data.message);
                    }
                },
                error: function(xhr, status, error) {
                    check_submit = 0;
                    page_loading("hide");
                    show_error("show", xhr.status.toString() + ' ' + xhr.statusText, 'Please try again');
                }
            });
        }
    }

</script>