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
                param: 'data_master_defect_parts',
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
                    $('#form_<?php echo $methodid ?>_defect_parts').val(data[0]._defect_parts);
                    $('#form_<?php echo $methodid ?>_status').val(data[0].statuse);





                    // Update UI
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

                    page_loading("show", 'Delete Master Defect Parts', 'Please Wait...');
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
                                show_success("show", 'Delete Master Defect Parts', data.message);

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
                        show_success("show", '<?php echo 'Master Defect Parts' ?>', data.message, function() {
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
</script>