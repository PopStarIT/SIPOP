<script type="text/javascript">
    $(".form_tab_<?php echo $methodid ?>").on("click", "a", function(e) {
        e.preventDefault();

        setTimeout(function() {
            var item_base_id = $('#form_detail_<?php echo $methodid ?>_detail_item_base_id').val();

            // Update the detail grid with the current item_base_id
            $("#table_<?php echo $methodid ?>_detail").jqGrid('setGridParam', {
                postData: {
                    test: item_base_id
                }
            });

            // Reload the grid
            $("#table_<?php echo $methodid ?>_detail").trigger('reloadGrid');
            $("#table_<?php echo $methodid ?>_detail").setGridWidth($('.grid_container_<?php echo $methodid; ?>_detail').width() - 20, true).trigger('resize');
            $('.tab_scrollbar').getNiceScroll().resize();
        }, 1000);
    });


    function toggleStatusFields() {
        var detailItemBaseId = $('#form_detail_<?php echo $methodid ?>_detail_detail_item_base_id').val();

        if (detailItemBaseId && detailItemBaseId.trim() !== '') {
            // Jika detail_item_base_id memiliki nilai
            $('.field-status').show();
            $('.field-damage-status').show();
        } else {
            // Jika detail_item_base_id tidak memiliki nilai
            $('.field-status').show();
            $('.field-damage-status').hide();
        }
    }

    function cancel_detail_<?php echo $methodid ?>_detail() {
        // Kosongkan semua inputan
        $('#form_detail_<?php echo $methodid ?>_detail_detail_item_base_id').val('');
        $('#form_detail_<?php echo $methodid ?>_detail_serial_number').val('');
        $('#form_detail_<?php echo $methodid ?>_detail_garanasi').val('');
        $('#form_detail_<?php echo $methodid ?>_detail_lokasi').val('');
        $('#form_detail_<?php echo $methodid ?>_detail_tgl_keluar').val('');
        $('#form_detail_<?php echo $methodid ?>_detail_tgl_beli').val('');
        $('#form_detail_<?php echo $methodid ?>_detail_status').val('');
        $('#form_detail_<?php echo $methodid ?>_detail_damage_status').val('');

        // Tampilkan tombol simpan dan sembunyikan tombol update dan cancel
        $('.simpan_detail').show();
        $('.update_detail').hide();
        $('.cancel_detail').hide();

        // Panggil fungsi untuk toggle field status
        toggleStatusFields();
    }

    function save_<?php echo $methodid ?>_detail() {

        $('#form_detail_<?php echo $methodid ?>_detail').submit();
    }

    function cancel_<?php echo $methodid ?>() {
        $('#panel_content_<?php echo $methodid ?>').show();
        $('#panel_content_form_<?php echo $methodid ?>').hide();
    }

    function save_<?php echo $methodid ?>() {
        $('#form_<?php echo $methodid ?>').submit();
    }

    function edit_<?php echo $methodid ?>(item_base_id) {
        page_loading("show", '<?php echo $page_title ?>', 'Please Wait...');

        $.ajax({
            url: baseurl + 'loader',
            data: {
                '<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
                param: 'data_item',
                param_pop: 'db_pop',
                id: item_base_id
            },
            dataType: 'json',
            method: 'post',
            success: function(data) {
                page_loading("hide");

                $('#form_<?php echo $methodid ?>_item_base_id').val(data[0].item_base_id);
                $('#form_<?php echo $methodid ?>_item_base_code').val(data[0].item_base_code);
                $('#form_<?php echo $methodid ?>_item_base_name').val(data[0].item_base_name);
                $('#form_<?php echo $methodid ?>_item_category_id').val(data[0].item_category_id);
                $('#form_<?php echo $methodid ?>_merk').val(data[0].merk);
                $('#form_<?php echo $methodid ?>_tipe').val(data[0].tipe);
                $('#form_<?php echo $methodid ?>_spesifikasi_lain').val(data[0].spesifikasi_lain);
                $('#form_<?php echo $methodid ?>_create_date').val(data[0].create_date);

                // Set the item_base_id in the detail form
                $('#form_detail_<?php echo $methodid ?>_detail_item_base_id').val(data[0].item_base_id);

                // Update the postData for the detail grid
                $("#table_<?php echo $methodid ?>_detail").jqGrid('setGridParam', {
                    postData: {
                        test: data[0].item_base_id
                    }
                });

                $("#tab_<?php echo $methodid; ?>").attr("data-toggle", "tab");
                $("#tab_<?php echo $methodid; ?>").removeClass("tab_disabled");

                $('.panel_<?php echo $methodid ?>').show();

                $("#table_<?php echo $methodid ?>").trigger('reloadGrid');
                $("#table_<?php echo $methodid ?>").setGridWidth($('.grid_container_<?php echo $methodid; ?>').width() - 20, true).trigger('resize');
                $('.tab_scrollbar').getNiceScroll().resize();

                setTimeout(function() {
                    $("#table_<?php echo $methodid ?>_detail").trigger('reloadGrid');
                    $("#table_<?php echo $methodid ?>_detail").setGridWidth($('.grid_container_<?php echo $methodid; ?>_detail').width() - 20, true).trigger('resize');
                    $('.tab_scrollbar').getNiceScroll().resize();
                }, 500);

                setTimeout(function() {
                    $('.tab_scrollbar').getNiceScroll().resize();
                }, 90);
            }
        });
    }

    function edit_detail_<?php echo $methodid ?>_detail(detail_item_base_id) {
        // alert('masuk');
        $('.simpan_detail').hide();
        $('.update_detail').show();
        $('.cancel_detail').show();
        page_loading("show", '<?php echo $page_title ?>', 'Please Wait...');

        $.ajax({
            url: baseurl + 'loader',
            data: {
                '<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
                param: 'data_item_base_detail',
                param_pop: 'db_pop',
                id: detail_item_base_id
            },
            dataType: 'json',
            method: 'post',
            success: function(data) {
                page_loading("hide");

                $('#form_detail_<?php echo $methodid ?>_detail_item_base_id').val(data[0].item_base_id);
                $('#form_detail_<?php echo $methodid ?>_detail_detail_item_base_id').val(data[0].detail_item_base_id);
                $('#form_detail_<?php echo $methodid ?>_detail_serial_number').val(data[0].serial_number);
                $('#form_detail_<?php echo $methodid ?>_detail_tgl_beli').val(data[0].tgl_beli);
                $('#form_detail_<?php echo $methodid ?>_detail_garanasi').val(data[0].garanasi);
                $('#form_detail_<?php echo $methodid ?>_detail_lokasi').val(data[0].lokasi);
                $('#form_detail_<?php echo $methodid ?>_detail_tgl_keluar').val(data[0].tgl_keluar);
                $('#form_detail_<?php echo $methodid ?>_detail_status').val(data[0].status);
                $('#form_detail_<?php echo $methodid ?>_detail_damage_status').val(data[0].damage_status);

                // Toggle field visibility setelah mengisi detail_item_base_id
                toggleStatusFields();

                $("#tab_<?php echo $methodid; ?>_detail").attr("data-toggle", "tab");
                $("#tab_<?php echo $methodid; ?>_detail").removeClass("tab_disabled");

                $('.panel_<?php echo $methodid ?>').show();

                $("#table_<?php echo $methodid ?>_detail").trigger('reloadGrid');
                $("#table_<?php echo $methodid ?>_detail").setGridWidth($('.grid_container_<?php echo $methodid; ?>').width() - 20, true).trigger('resize');
                $('.tab_scrollbar').getNiceScroll().resize();

                setTimeout(function() {
                    $("#table_<?php echo $methodid ?>_detail").trigger('reloadGrid');
                    $("#table_<?php echo $methodid ?>_detail").setGridWidth($('.grid_container_<?php echo $methodid; ?>_detail').width() - 20, true).trigger('resize');
                    $('.tab_scrollbar').getNiceScroll().resize();
                }, 500);

                setTimeout(function() {
                    $('.tab_scrollbar').getNiceScroll().resize();
                }, 90);
            }
        });
    }

    // Panggil toggleStatusFields saat halaman dimuat
    $(document).ready(function() {
        toggleStatusFields();

        // Tambahkan event listener untuk mendeteksi perubahan pada field detail_item_base_id
        $('#form_detail_<?php echo $methodid ?>_detail_detail_item_base_id').on('change', function() {
            toggleStatusFields();
        });

        // Juga perlu menangani saat tab detail dibuka
        $(".form_tab_<?php echo $methodid ?>").on("click", "a", function(e) {
            if ($(this).attr('id') === "tab_<?php echo $methodid; ?>_detail") {
                setTimeout(toggleStatusFields, 100);
            }
        });
    });

    function delete_detail_<?php echo $methodid ?>_detail(detail_item_base_id) {
        if (check_submit == 0) {
            swal({
                title: "Confirm Delete  Detail ?",
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

                    page_loading("show", 'Delete Detail', 'Please Wait...');
                    $.ajax({
                        url: baseurl + '<?php echo $class_uri ?>/delete_detail',
                        data: {
                            '<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
                            detail_item_base_id: detail_item_base_id
                        },
                        dataType: 'json',
                        method: 'post',
                        success: function(data) {
                            page_loading("hide");
                            check_submit = 0;
                            if (data.valid) {
                                show_success("show", 'Delete Detail', data.message);
                                //$("#table_<?php echo $methodid ?>_keluarga").trigger('reloadGrid');
                                //cancel_keluarga_<?php echo $methodid ?>();

                                $("#table_<?php echo $methodid ?>_detail").trigger('reloadGrid');
                                $("#table_<?php echo $methodid ?>_detail").setGridWidth($('.grid_container_<?php echo $methodid; ?>_detail').width() - 20, true).trigger('resize');
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
            page_loading("show", 'Save <?php echo $page_title ?>', 'Please Wait...');

            let frmdata = new FormData();
            let data2 = $("#form_<?php echo $methodid ?>").serializeArray();

            $.each(data2, function(key, input) {
                frmdata.append(input.name, input.value);
            });

            const file_input = $('#form_<?php echo $methodid ?> input[type="file"]');
            const file_data = file_input.length > 0 ? file_input[0].files[0] : null;

            if (file_data) {
                frmdata.append('file', file_data);
                frmdata.append('info', "Yes");
            } else {
                frmdata.append('info', "No");
            }

            $.ajax({
                url: baseurl + '<?php echo $class_uri ?>/post_add_edit',
                type: 'post',
                data: frmdata,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(data) {
                    check_submit = 0;
                    if (data.valid) {
                        show_success("show", '<?php echo 'image' ?>', data.message, function() {
                            location.reload();
                        });
                    } else {
                        show_error("show", 'Error', data.message);
                    }
                },
                error: function(xhr) {
                    show_error("show", xhr.status.toString() + ' ' + xhr.statusText, 'Please try again');
                    check_submit = 0;
                }
            });
        }
    }

    var check_submit = 0;

    function post_<?php echo $methodid ?>_detail() {
        if (check_submit == 0) {
            var data = $("#form_detail_<?php echo $methodid ?>_detail").serialize();
            console.log("Data yang akan dikirim: ", data); // Log data
            check_submit = 1;
            page_loading("show", 'Save <?php echo $page_title ?>', 'Please Wait...');
            $.ajax({
                url: baseurl + '<?php echo $class_uri ?>/post_add_edit_detail',
                data: data,
                dataType: 'json',
                method: 'post',
                success: function(data) {
                    page_loading("hide");
                    check_submit = 0;
                    if (data.valid) {
                        show_success("show", '<?php echo 'Data Berhasil' ?>', data.message, function() {
                            // location.reload();
                        });
                    } else {
                        show_error("show", 'Error', data.message);
                    }
                }
            });
        }
    }

    function edit_status_detail_<?php echo $methodid ?>_detail(detail_item_base_id) {
        // Set detail_item_base_id ke input hidden di modal
        $('#modal_detail_item_base_id').val(detail_item_base_id);

        // Get current data untuk ditampilkan di modal
        page_loading("show", 'Get Status', 'Please Wait...');

        $.ajax({
            url: baseurl + 'loader',
            data: {
                '<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
                param: 'data_item_base_detail',
                param_pop: 'db_pop',
                id: detail_item_base_id
            },
            dataType: 'json',
            method: 'post',
            success: function(data) {
                page_loading("hide");

                // Set nilai current status ke modal
                $('#modal_status').val(data[0].status);
                $('#modal_damage_status').val(data[0].damage_status);

                // Tampilkan modal
                $('#update_status_modal').modal('show');
            },
            error: function(xhr, error) {
                page_loading("hide");
                show_error("show", xhr.status.toString() + ' ' + xhr.statusText, 'Please try again');
            }
        });
    }

    // Fungsi untuk update status
    function update_status() {
        var detail_item_base_id = $('#modal_detail_item_base_id').val();
        var status = $('#modal_status').val();
        var damage_status = $('#modal_damage_status').val();

        page_loading("show", 'Update Status', 'Please Wait...');

        $.ajax({
            url: baseurl + '<?php echo $class_uri ?>/update_status',
            data: {
                '<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
                detail_item_base_id: detail_item_base_id,
                status: status,
                damage_status: damage_status
            },
            dataType: 'json',
            method: 'post',
            success: function(data) {
                page_loading("hide");

                if (data.valid) {
                    $('#update_status_modal').modal('hide');
                    show_success("show", 'Update Status', data.message);

                    // Reload grid untuk refresh data
                    $("#table_<?php echo $methodid ?>_detail").trigger('reloadGrid');
                    $("#table_<?php echo $methodid ?>_detail").setGridWidth($('.grid_container_<?php echo $methodid; ?>_detail').width() - 20, true).trigger('resize');
                    $('.tab_scrollbar').getNiceScroll().resize();
                } else {
                    show_error("show", 'Error', data.message);
                }
            },
            error: function(xhr, error) {
                page_loading("hide");
                show_error("show", xhr.status.toString() + ' ' + xhr.statusText, 'Please try again');
            }
        });
    }
</script>