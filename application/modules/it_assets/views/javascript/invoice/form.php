<script type="text/javascript">
    $(".form_tab_<?php echo $methodid ?>").on("click", "a", function(e) {
        e.preventDefault();

        setTimeout(function() {
            var item_base_id = $('#form_detail_<?php echo $methodid ?>_detail_item_base_id').val();

            // Update the detail grid with the current item_base_id
            // $("#table_<?php echo $methodid ?>_detail").jqGrid('setGridParam', {
            //     postData: {
            //         test: item_base_id
            //     }
            // });
            // Reload the grid



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


    function cancel_title_<?php echo $methodid ?>() {
        // Kosongkan semua inputan
        $('#form_<?php echo $methodid ?>_invoice_number').val('');
        $('#form_<?php echo $methodid ?>_invoice_file').val('');

        $('#form_<?php echo $methodid ?>_keterangan').val('');
        $('#form_<?php echo $methodid ?>_create_date').val('');
        $('#form_<?php echo $methodid ?>_garansi').val('');
        $('#form_<?php echo $methodid ?>_info').val('');

        // Tampilkan tombol simpan dan sembunyikan tombol update dan cancel
        $('.simpan_title').show();
        $('.update_title').hide();
        $('.cancel_title').hide();

        // Panggil fungsi untuk toggle field status
        toggleStatusFields();
    }



    function save_title_<?php echo $methodid ?>() {
        // alert('masuk');
        $('#form_<?php echo $methodid ?>').submit();
    }



    function cancel_title_<?php echo $methodid ?>() {
        $('#panel_content_<?php echo $methodid ?>').show();
        $('#panel_content_form_<?php echo $methodid ?>').hide();
    }


    function edit_<?php echo $methodid ?>(invoice_id) {
        $('.simpan_title').hide();
        $('.update_title').show();
        $('.cancel_title').show();
        page_loading("show", '<?php echo $page_title ?>', 'Please Wait...');

        $.ajax({
            url: baseurl + 'loader',
            data: {
                '<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
                param: 'data_item_invoice',
                param_pop: 'db_pop',
                id: invoice_id
            },
            dataType: 'json',
            method: 'post',
            success: function(data) {
                page_loading("hide");
                if (data && data.length > 0) {
                    // Set values to the form fields
                    $('#form_<?php echo $methodid ?>_invoice_id').val(data[0].invoice_id);
                    $('#form_<?php echo $methodid ?>_invoice_number').val(data[0].invoice_number);
                    $('#form_<?php echo $methodid ?>_keterangan').val(data[0].keterangan);

                    // Format and set the date
                    if (data[0].create_date) {
                        var date = new Date(data[0].create_date);
                        var formattedDate = date.getFullYear() + '-' +
                            String(date.getMonth() + 1).padStart(2, '0') + '-' +
                            String(date.getDate()).padStart(2, '0');
                        $('#form_<?php echo $methodid ?>_create_date').val(formattedDate);
                    }

                    $('#form_<?php echo $methodid ?>_garansi').val(data[0].garansi);
                    $('#form_<?php echo $methodid ?>_info').val(data[0].info);

                    // Handle file display
                    if (data[1].invoice_file) {
                        // Create a "Current file" text next to the file input
                        var fileInput = $('#form_<?php echo $methodid ?>_invoice_file');
                        if ($('.current-file-info').length === 0) {
                            fileInput.after('<div class="current-file-info">Current file: ' + data[1].invoice_file + '</div>');
                        } else {
                            $('.current-file-info').text('Current file: ' + data[1].invoice_file);
                        }
                    }

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



    $(document).ready(function() {
        toggleStatusFields();

        // Tambahkan event listener untuk mendeteksi perubahan pada field detail_item_base_id
        $('#form_detail_<?php echo $methodid ?>_detail_detail_item_base_id').on('change', function() {
            toggleStatusFields();
        });

        // Tambahkan event listener untuk mendeteksi perubahan pada field out_detail_item_base_id
        $('#form_out_<?php echo $methodid ?>_out_out_detail_item_base_id').on('change', function() {
            toggleStatusFields();
        });

        // Juga perlu menangani saat tab detail atau tab out dibuka
        $(".form_tab_<?php echo $methodid ?>").on("click", "a", function(e) {
            if ($(this).attr('id') === "tab_<?php echo $methodid; ?>_detail" ||
                $(this).attr('id') === "tab_<?php echo $methodid; ?>_out") {
                setTimeout(toggleStatusFields, 100);
            }
        });


        $('#btn_save_modal_<?php echo $methodid ?>_out').on('click', function() {
            post_modal_<?php echo $methodid ?>_out();
        });

        $('#btn_update_modal_<?php echo $methodid ?>_out').on('click', function() {
            post_modal_<?php echo $methodid ?>_out();
        });
    });

    $('#modal_out_<?php echo $methodid ?>').on('hidden.bs.modal', function() {
        // Reset form when modal is closed
        $('#form_out_modal_<?php echo $methodid ?>_out')[0].reset();
    });



    function delete<?php echo $methodid ?>(invoice_id) {
        if (check_submit == 0) {
            swal({
                title: "Confirm Out?",
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
                        url: baseurl + '<?php echo $class_uri ?>/delete',
                        data: {
                            '<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
                            invoice_id: invoice_id
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

    function post_title_<?php echo $methodid ?>() {
        if (check_submit == 0) {
            // Add PDF validation
            var fileInput = $('#form_<?php echo $methodid ?> input[name="invoice_file"]')[0];
            if (fileInput && fileInput.files.length > 0) {
                var file = fileInput.files[0];
                var fileName = file.name;
                var fileExtension = fileName.split('.').pop().toLowerCase();

                // Check if file is not a PDF
                if (fileExtension !== 'pdf') {
                    show_error("show", 'Invalid File Type', 'Please upload a PDF file for the invoice');

                }
            }

            check_submit = 1;
            page_loading("show", 'Save <?php echo $page_title ?>', 'Please Wait...');

            // Ambil token CSRF dari form
            var csrfName = "<?php echo $this->security->get_csrf_token_name(); ?>";
            var csrfHash = "<?php echo $this->security->get_csrf_hash(); ?>";

            let frmdata = new FormData();
            // Tambahkan data dari form
            var data = $("#form_<?php echo $methodid ?>").serializeArray();
            $.each(data, function(index, field) {
                frmdata.append(field.name, field.value);
            });

            // Tambahkan file ke FormData jika ada
            if (fileInput && fileInput.files.length > 0) {
                frmdata.append('invoice_file', file);
            }

            // Tambahkan CSRF token ke FormData
            frmdata.append(csrfName, csrfHash);

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
                        show_success("show", '<?php echo 'out' ?>', data.message, function() {
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
</script>