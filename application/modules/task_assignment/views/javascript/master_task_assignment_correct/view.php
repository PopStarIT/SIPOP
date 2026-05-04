<?php $this->load->view($path_template . '/library/javascript/dashboard_table2'); ?>
<script type="text/javascript">
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
                    $('#modal_form_<?php echo $methodid ?>_id').val(data[0].id);
                    $('#modal_form_<?php echo $methodid ?>_task_assignment_id').val(data[0].task_assignment_id);
                    $('#modal_form_<?php echo $methodid ?>_rft_size_id').val(data[0].rft_size_id);
                    $('#modal_form_<?php echo $methodid ?>_rft_colour_id').val(data[0].rft_colour_id);
                    $('#modal_form_<?php echo $methodid ?>_created_at').val(data[0].created_at);
                    $('#modal_form_<?php echo $methodid ?>_rft_status').val(data[0].rft_status);

                    // Update tab dan panel (jika masih diperlukan)
                    $("#tab_<?php echo $methodid; ?>").attr("data-toggle", "tab").removeClass("tab_disabled");
                    $('.panel_<?php echo $methodid ?>').show();

                    // *** TAMPILKAN MODAL ***
                    $('#dataCardModal_<?php echo $methodid ?>').modal('show');

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

    function delete_<?php echo $methodid ?>(id) {


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
            var data = $("#modal_form_<?php echo $methodid ?>").serialize();
            $.ajax({
                url: baseurl + '<?php echo $class_uri ?>/post_add_edit_rft',
                data: data,
                dataType: 'json',
                method: 'post',
                success: function(data) {
                    check_submit = 0;
                    if (data.valid) {
                        show_success("show", 'Success Master Task Assignment', data.message);

                        $("#table_<?php echo $methodid ?>").trigger('reloadGrid');
                        $("#table_<?php echo $methodid ?>").setGridWidth($('.grid_container_<?php echo $methodid; ?>').width() - 20, true).trigger('resize');
                        $('.tab_scrollbar').getNiceScroll().resize();
                        $('#dataCardModal_<?php echo $methodid ?>').modal('hide');
                        setTimeout(function() {
                            $('.tab_scrollbar').getNiceScroll().resize();
                        }, 100);
                    } else {
                        show_error("show", 'Error', data.message);
                    }
                },
                or: function(xhr, error) {
                    show_error("show", xhr.status.toString() + ' ' + xhr.statusText, 'Please try again');
                    check_submit = 0;
                }
            });
        }
    }


    function edit_defect_<?php echo $methodid ?>_defect(id) {
        page_loading("show", '<?php echo $page_title ?>', 'Please Wait...');

        $.ajax({
            url: baseurl + 'loader',
            data: {
                '<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
                param: 'data_master_task_assignment_correct_defect',
                param_pop: 'db_pop',
                id: id
            },
            dataType: 'json',
            method: 'post',
            success: function(data) {
                page_loading("hide");

                if (data && data.length > 0) {
                    $('#defect_modal_form_<?php echo $methodid ?>_id').val(data[0].id);
                    $('#defect_modal_form_<?php echo $methodid ?>_task_assignment_id').val(data[0].task_assignment_id);
                    $('#defect_modal_form_<?php echo $methodid ?>_defect_cause_id').val(data[0].defect_cause_id).trigger('change');
                    $('#defect_modal_form_<?php echo $methodid ?>_defect_parts_id').val(data[0].defect_parts_id).trigger('change');
                    $('#defect_modal_form_<?php echo $methodid ?>_rfid_no').val(data[0].rfid_no);
                    $('#defect_modal_form_<?php echo $methodid ?>_defect_status').val(data[0].defect_status);

                    $('#defect_modal_form_<?php echo $methodid ?>_old_image').val(data[0].image);
                    $('#defect_modal_form_<?php echo $methodid; ?>_current_image').val(data[0].image);
                    $('#defect_modal_form_<?php echo $methodid; ?>_image').val('');

                    if (data[0].image) {
                        var imageUrl = baseurl + 'assets/img/task_assignment_detail_defect/' + data[0].image;
                        $('#imagePreview_<?php echo $methodid ?>').attr('src', imageUrl).show();
                    } else {
                        $('#imagePreview_<?php echo $methodid ?>').attr('src', '').hide();
                    }

                    $('#defectModal_<?php echo $methodid ?>').modal('show');
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



    $('#defect_modal_form_<?php echo $methodid; ?>_image').on('change', function() {
        var file = this.files[0];

        if (file) {
            $('#defect_modal_form_<?php echo $methodid; ?>_current_image').val(file.name);

            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview_<?php echo $methodid ?>').attr('src', e.target.result).show();
            };
            reader.readAsDataURL(file);
        }
    });


    function delete_defect_<?php echo $methodid ?>_defect(id) {

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
                        url: baseurl + '<?php echo $class_uri ?>/delete_defect',
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

                                $("#table_<?php echo $methodid ?>_defect").trigger('reloadGrid');
                                $("#table_<?php echo $methodid ?>_defect").setGridWidth($('.grid_container_<?php echo $methodid; ?>_defect').width() - 20, true).trigger('resize');
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

    function post_defect_<?php echo $methodid ?>() {
        if (check_submit == 0) {
            check_submit = 1;
            page_loading("show", '<?php echo $page_title ?>', 'Please Wait...');

            var form = document.getElementById('defect_modal_form_<?php echo $methodid ?>');
            var formData = new FormData(form);

            $.ajax({
                url: baseurl + '<?php echo $class_uri ?>/post_add_edit_defect',
                data: formData,
                dataType: 'json',
                method: 'post',
                processData: false,
                contentType: false,
                success: function(data) {
                    check_submit = 0;
                    page_loading("hide");

                    if (data.valid) {
                        show_success("show", 'Success', data.message);

                        $("#table_<?php echo $methodid ?>_defect").trigger('reloadGrid');
                        $('#defectModal_<?php echo $methodid ?>').modal('hide');
                    } else {
                        show_error("show", 'Error', data.message);
                    }
                },
                error: function(xhr, error) {
                    check_submit = 0;
                    page_loading("hide");
                    show_error("show", xhr.status.toString() + ' ' + xhr.statusText, 'Please try again');
                }
            });
        }
    }




    function edit_reject_<?php echo $methodid ?>_reject(id) {
        page_loading("show", '<?php echo $page_title ?>', 'Please Wait...');

        $.ajax({
            url: baseurl + 'loader',
            data: {
                '<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
                param: 'data_master_task_assignment_correct_reject',
                param_pop: 'db_pop',
                id: id
            },
            dataType: 'json',
            method: 'post',
            success: function(data) {
                page_loading("hide");

                if (data && data.length > 0) {
                    // Set values to the form fields
                    $('#reject_modal_form_<?php echo $methodid ?>_id').val(data[0].id);
                    $('#reject_modal_form_<?php echo $methodid ?>_task_assignment_id').val(data[0].task_assignment_id);
                    $('#reject_modal_form_<?php echo $methodid ?>_rft_size_id').val(data[0].rft_size_id);
                    $('#reject_modal_form_<?php echo $methodid ?>_rft_colour_id').val(data[0].rft_colour_id);
                    $('#reject_modal_form_<?php echo $methodid ?>_created_at').val(data[0].created_at);
                    $('#reject_modal_form_<?php echo $methodid ?>_reject_status').val(data[0].reject_status);

                    // Show modal
                    $('#rejectModal_<?php echo $methodid ?>').modal('show');
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

    function delete_reject_<?php echo $methodid ?>_reject(id) {

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
                        url: baseurl + '<?php echo $class_uri ?>/delete_reject',
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

                                $("#table_<?php echo $methodid ?>_reject").trigger('reloadGrid');
                                $("#table_<?php echo $methodid ?>_reject").setGridWidth($('.grid_container_<?php echo $methodid; ?>_reject').width() - 20, true).trigger('resize');
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

    function post_reject_<?php echo $methodid ?>() {
        if (check_submit == 0) {
            check_submit = 1;
            page_loading("show", '<?php echo $page_title ?>', 'Please Wait...');
            var data = $("#reject_modal_form_<?php echo $methodid ?>").serialize();

            $.ajax({
                url: baseurl + '<?php echo $class_uri ?>/post_add_edit_reject',
                data: data,
                dataType: 'json',
                method: 'post',
                success: function(data) {
                    check_submit = 0;
                    if (data.valid) {
                        show_success("show", 'Success', data.message);

                        // Reload grid and resize
                        $("#table_<?php echo $methodid ?>_reject").trigger('reloadGrid');
                        $("#table_<?php echo $methodid ?>_reject").setGridWidth($('.grid_container_<?php echo $methodid; ?>').width() - 20, true).trigger('resize');
                        $('.tab_scrollbar').getNiceScroll().resize();

                        // Close modal
                        $('#rejectModal_<?php echo $methodid ?>').modal('hide');
                    } else {
                        show_error("show", 'Error', data.message);
                    }
                },
                error: function(xhr, error) {
                    show_error("show", xhr.status.toString() + ' ' + xhr.statusText, 'Please try again');
                    check_submit = 0;
                }
            });
        }
    }
</script>