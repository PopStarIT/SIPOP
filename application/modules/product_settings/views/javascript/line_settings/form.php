<script type="text/javascript">
    $(".form_tab_<?php echo $methodid ?>").on("click", "a", function(e) {
        e.preventDefault();

        setTimeout(function() {
            var item_base_id = $('#form_detail_<?php echo $methodid ?>_detail_item_base_id').val();
            $("#table_<?php echo $methodid ?>_header").trigger('reloadGrid');
            $("#table_<?php echo $methodid ?>_header").setGridWidth($('.grid_container_<?php echo $methodid; ?>_header').width() - 20, true).trigger('resize');



            $('.tab_scrollbar').getNiceScroll().resize();
        }, 1000);
    });

    function toggleStatusFields() {
        // Periksa form detail
        var detailItemBaseId = $('#form_detail_<?php echo $methodid ?>_detail_detail_item_base_id').val();
        if (detailItemBaseId && detailItemBaseId.trim() !== '') {
            $('.field-status').show();
            $('.field-damage-status').show();
        } else {
            $('.field-status').show();
            $('.field-damage-status').hide();
        }
        // Periksa form out
        var outDetailItemBaseId = $('#form_out_<?php echo $methodid ?>_out_out_detail_item_base_id').val();
        if (outDetailItemBaseId && outDetailItemBaseId.trim() !== '') {
            $('.damage_out').show();
        } else {
            $('.damage_out').hide();
        }

        // Reset form return saat modal ditutup
        $('#modal_shift_<?php echo $methodid ?>').on('hidden.bs.modal', function() {
            $('#form_shift_modal_<?php echo $methodid ?>')[0].reset();
        });
    }

    function save_<?php echo $methodid ?>() {
        // alert('masuk');
        $('#form_<?php echo $methodid ?>').submit();
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
                param: 'data_master_line',
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
                    $('#form_<?php echo $methodid ?>_line_name').val(data[0].line_name);
                    $('#form_<?php echo $methodid ?>_role_id').val(data[0].role_id);
                    $('#form_<?php echo $methodid ?>_shift').val(data[0].shift);
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
    var check_submit = 0;

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
                    check_submit = 0;
                    if (data.valid) {
                        show_success("show", '<?php echo 'Master Line' ?>', data.message, function() {
                            // location.reload();
                            clearDetailFormOut();
                        });
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






    function openShiftModal(id, methodid) {
        // Ambil data dari server menggunakan AJAX
        $.ajax({
            url: baseurl + 'loader',
            data: {
                '<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
                param: 'data_master_line',
                param_pop: 'db_pop',
                id: id
            },
            dataType: 'json',
            method: 'post',
            success: function(data) {
                if (data && data.length > 0) {
                    // Set values to the form fields
                    $('#form_' + methodid + '_id').val(data[0].id);
                    $('#form_' + methodid + '_master_line_id').val(data[0].master_line_id);
                    $('#form_' + methodid + '_line_id').val(data[0].line_id);
                    $('#form_' + methodid + '_shift').val(data[0].shift);

                    // Tampilkan modal
                    $('#modal_shift_' + methodid).modal('show');
                } else {
                    show_error("show", 'Error', 'Data not found');
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error: ' + status + ' - ' + error);
                show_error("show", 'Error', 'Failed to load data');
            }
        });
    }




    function save_<?php echo $methodid ?>() {
        var data = $("#form_shift_modal_<?php echo $methodid ?>").serialize();
        $.ajax({
            url: baseurl + '<?php echo $class_uri ?>/post_add_edit',
            data: data,
            dataType: 'json',
            method: 'post',
            success: function(data) {
                if (data.valid) {
                    show_success("show", '<?php echo 'Master Line' ?>', data.message, function() {
                        $('#modal_shift_<?php echo $methodid ?>').modal('hide');
                        $("#table_<?php echo $methodid ?>").trigger('reloadGrid');
                    });
                } else {
                    show_error("show", 'Error', data.message);
                }
            },
            error: function(xhr, error) {
                show_error("show", xhr.status.toString() + ' ' + xhr.statusText, 'Please try again');
            }
        });
    }
</script>