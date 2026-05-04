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


            $("#table_<?php echo $methodid ?>_detail").trigger('reloadGrid');
            $("#table_<?php echo $methodid ?>_detail").setGridWidth($('.grid_container_<?php echo $methodid; ?>_detail').width() - 20, true).trigger('resize');


            $("#table_<?php echo $methodid ?>_out").trigger('reloadGrid');
            $("#table_<?php echo $methodid ?>_out").setGridWidth($('.grid_container_<?php echo $methodid; ?>_out').width() - 20, true).trigger('resize');


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

    function cancel_detail_<?php echo $methodid ?>_detail() {
        // Kosongkan semua inputan
        $('#form_detail_<?php echo $methodid ?>_detail_detail_item_base_id').val('');
        $('#form_detail_<?php echo $methodid ?>_detail_serial_number').val('');
        $('#form_detail_<?php echo $methodid ?>_detail_jml_item').val('');


        $('#form_detail_<?php echo $methodid ?>_detail_status').val('');
        $('#form_detail_<?php echo $methodid ?>_detail_keterangan').val('');
        $('#form_detail_<?php echo $methodid ?>_detail_garansi').val('');

        // Tampilkan tombol simpan dan sembunyikan tombol update dan cancel
        $('.simpan_detail').show();
        $('.update_detail').hide();
        $('.cancel_detail').hide();

        // Panggil fungsi untuk toggle field status
        toggleStatusFields();
    }

    function cancel_title_<?php echo $methodid ?>() {
        // Kosongkan semua inputan
        $('#form_title_<?php echo $methodid ?>_invoice_number').val('');
        $('#form_title_<?php echo $methodid ?>_invoice_file').val('');

        $('#form_title_<?php echo $methodid ?>_keterangan').val('');
        $('#form_title_<?php echo $methodid ?>_create_date').val('');
        $('#form_title_<?php echo $methodid ?>_garansi').val('');

        // Tampilkan tombol simpan dan sembunyikan tombol update dan cancel
        $('.simpan_title').show();
        $('.update_title').hide();
        $('.cancel_title').hide();

        // Panggil fungsi untuk toggle field status
        toggleStatusFields();
    }

    function cancel_out_<?php echo $methodid ?>_out() {
        // Kosongkan semua inputan
        $('#form_out_<?php echo $methodid ?>_out_out_detail_item_base_id').val('');
        $('#form_out_<?php echo $methodid ?>_out_lokasi').val('');
        $('#form_out_<?php echo $methodid ?>_out_jml_item_out').val('');
        $('#form_out_<?php echo $methodid ?>_out_tgl_keluar').val('');
        $('#form_out_<?php echo $methodid ?>_out_damage_status').val('');

        // Tampilkan tombol simpan dan sembunyikan tombol update dan cancel
        $('.simpan_out').show();
        $('.update_out').hide();
        $('.damage_out').hide();
        $('.cancel_out').hide();

        // Panggil fungsi untuk toggle field status
        toggleStatusFields();
    }

    function save_<?php echo $methodid ?>_detail() {

        $('#form_detail_<?php echo $methodid ?>_detail').submit();
    }

    function save_detail_out_<?php echo $methodid ?>_out() {
        // alert('masuk');
        $('#formout<?php echo $methodid ?>_out').submit();
    }

    function save_title_<?php echo $methodid ?>() {
        // alert('masuk');
        $('#form_title_<?php echo $methodid ?>').submit();
    }

    function save_<?php echo $methodid ?>_out() {
        // alert('masuk');
        $('#form_out_<?php echo $methodid ?>_out').submit();
    }

    function save_return_<?php echo $methodid ?>_out() {
        // alert('masuk');
        $('#form_return_modal_<?php echo $methodid ?>_out').submit();
    }

    function cancel_<?php echo $methodid ?>() {
        $('#panel_content_<?php echo $methodid ?>').show();
        $('#panel_content_form_<?php echo $methodid ?>').hide();
    }

    function cancel_title_<?php echo $methodid ?>() {
        $('#panel_content_<?php echo $methodid ?>').show();
        $('#panel_content_form_<?php echo $methodid ?>').hide();
    }

    function save_<?php echo $methodid ?>() {
        $('#form_<?php echo $methodid ?>').submit();
    }

    function edit_title_<?php echo $methodid ?>(invoice_id) {
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
                    $('#form_title_<?php echo $methodid ?>_invoice_id').val(data[0].invoice_id); // Set invoice_id
                    $('#form_title_<?php echo $methodid ?>_invoice_number').val(data[0].invoice_number);
                    $('#form_title_<?php echo $methodid ?>_invoice_file').val(data[0].invoice_file);
                    $('#form_title_<?php echo $methodid ?>_keterangan').val(data[0].keterangan);
                    $('#form_title_<?php echo $methodid ?>_garansi').val(data[0].garansi);

                    // Set invoice_id in the header form
                    $('#form_<?php echo $methodid ?>_invoice_id').val(data[0].invoice_id); // Set invoice_id in the header form
                } else {
                    console.error('Data not found');
                }

                // Update UI
                $("#tab_<?php echo $methodid; ?>").attr("data-toggle", "tab").removeClass("tab_disabled");
                $('.panel_<?php echo $methodid ?>').show();
                $("#table_<?php echo $methodid ?>").trigger('reloadGrid');
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error: ' + status + ' - ' + error);
                page_loading("hide");
            }
        });
    }

    function edit_<?php echo $methodid ?>(item_base_id) {
        page_loading("show", '<?php echo $page_title ?>', 'Please Wait...');

        // First, remove any existing file labels to avoid duplicates
        $('.current-file-label').remove();

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
                console.log(data);

                $('#form_<?php echo $methodid ?>_item_base_id').val(data[0].item_base_id);
                $('#form_<?php echo $methodid ?>_item_base_code').val(data[0].item_base_code);
                $('#form_<?php echo $methodid ?>_item_base_name').val(data[0].item_base_name);
                $('#form_<?php echo $methodid ?>_item_category_id').val(data[0].item_category_id);
                $('#form_detail_<?php echo $methodid ?>_detail_item_base_id').val(item_base_id);
                // For text fields, directly set the values
                $('#form_<?php echo $methodid ?>_barcode').val(data[0].barcode);

                // Display available stock
                $('#form_<?php echo $methodid ?>_stock').val(data[0].available_stock || '0');
                $('#form_<?php echo $methodid ?>_tipe').val(data[0].tipe);
                $('#form_<?php echo $methodid ?>_spesifikasi_lain').val(data[0].spesifikasi_lain);

                // Set the invoice_id in both the hidden field and the visible text field
                $('#form_<?php echo $methodid ?>_invoice_id').val(data[0].invoice_id);
                $('#form_<?php echo $methodid ?>_merk').val(data[1].merk);


                // Set the item_base_id in the detail form
                $('#form_detail_<?php echo $methodid ?>_detail_item_base_id').val(data[0].item_base_id);

                // Update the postData for the detail grid
                $("#table_<?php echo $methodid ?>_detail").jqGrid('setGridParam', {
                    postData: {
                        test: data[0].item_base_id
                    }
                });

                $("#tab_<?php echo $methodid; ?>").attr("data-toggle", "tab");
                $("#tab_<?php echo $methodid; ?>_detail").removeClass("tab_disabled");

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
                }, 100);
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
                $('#form_detail_<?php echo $methodid ?>_detail_jml_item').val(data[0].jml_item);

                $('#form_detail_<?php echo $methodid ?>_detail_tgl_beli').val(data[0].tgl_beli);
                $('#form_detail_<?php echo $methodid ?>_detail_garansi').val(data[0].garansi);
                $('#form_detail_<?php echo $methodid ?>_detail_lokasi').val(data[0].lokasi);
                $('#form_detail_<?php echo $methodid ?>_detail_jml_item').val(data[0].jml_item);

                $('#form_detail_<?php echo $methodid ?>_detail_keterangan').val(data[0].keterangan);
                $('#form_detail_<?php echo $methodid ?>_detail_status').val(data[0].status);

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
                }, 100);
            }
        });
    }

    function edit_detail_out_<?php echo $methodid ?>_out(out_detail_item_base_id) {

        $('.simpan_out').hide();
        $('.update_out').show();
        $('.cancel_out').show();

        page_loading("show", '<?php echo $page_title ?>', 'Please Wait...');

        $.ajax({
            url: baseurl + 'loader',
            data: {
                '<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
                param: 'data_item_base_detail_out',
                param_pop: 'db_pop',
                id: out_detail_item_base_id
            },
            dataType: 'json',
            method: 'post',
            success: function(data) {
                page_loading("hide");

                // Pastikan ID form sesuai dengan form HTML
                $('#form_out_<?php echo $methodid ?>_out_out_detail_item_base_id').val(data[0].out_detail_item_base_id);
                $('#form_out_<?php echo $methodid ?>_out_detail_item_base_id').val(data[0].detail_item_base_id);
                $('#form_out_<?php echo $methodid ?>_out_tgl_keluar').val(data[0].tgl_keluar);
                $('#form_out_<?php echo $methodid ?>_out_lokasi').val(data[0].lokasi);
                $('#form_out_<?php echo $methodid ?>_out_jml_item_out').val(data[0].jml_item_out);
                $('#form_out_<?php echo $methodid ?>_out_damage_status').val(data[0].damage_status);

                // Toggle field visibility setelah mengisi detail_item_base_id
                if (typeof toggleStatusFields === 'function') {
                    toggleStatusFields();
                }

                $("#tab_<?php echo $methodid; ?>_out").attr("data-toggle", "tab");
                $("#tab_<?php echo $methodid; ?>_out").removeClass("tab_disabled");

                $('.panel_<?php echo $methodid ?>').show();

                $("#table_<?php echo $methodid ?>_out").trigger('reloadGrid');
                $("#table_<?php echo $methodid ?>_out").setGridWidth($('.grid_container_<?php echo $methodid; ?>').width() - 20, true).trigger('resize');
                $('.tab_scrollbar').getNiceScroll().resize();

                setTimeout(function() {
                    $("#table_<?php echo $methodid ?>_out").trigger('reloadGrid');
                    $("#table_<?php echo $methodid ?>_out").setGridWidth($('.grid_container_<?php echo $methodid; ?>_out').width() - 20, true).trigger('resize');
                    $('.tab_scrollbar').getNiceScroll().resize();
                }, 500);

                setTimeout(function() {
                    $('.tab_scrollbar').getNiceScroll().resize();
                }, 100);
            }
        });
    }

    function detail_out_<?php echo $methodid ?>_out(detail_item_base_id) {
        // Reset form state
        $('#btn_save_modal_<?php echo $methodid ?>_out').show();
        $('#btn_update_modal_<?php echo $methodid ?>_out').hide();

        // Clear form fields
        $('#form_out_modal_<?php echo $methodid ?>_out')[0].reset();

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

                // Fill form fields with data
                $('#form_out_modal_<?php echo $methodid ?>_out [name="detail_item_base_id"]').val(data[0].detail_item_base_id);

                // Set default values for new record
                var currentDate = new Date();
                var formattedDate = currentDate.getFullYear() + '-' +
                    ('0' + (currentDate.getMonth() + 1)).slice(-2) + '-' +
                    ('0' + currentDate.getDate()).slice(-2);

                $('#form_out_modal_<?php echo $methodid ?>_out [name="tgl_keluar"]').val(formattedDate);
                $('#form_out_modal_<?php echo $methodid ?>_out [name="lokasi"]').val(data[0].lokasi || '');
                // Set jml_item_out from jml_item
                $('#form_out_modal_<?php echo $methodid ?>_out [name="jml_item_out"]').val(data[0].jml_item || '1');

                // Show/hide damage status field based on data
                if (data[0].status === 'Rusak') {
                    $('.damage_out').show();
                    $('#form_out_modal_<?php echo $methodid ?>_out [name="damage_status"]').val('Rusak');
                } else {
                    $('.damage_out').hide();
                    $('#form_out_modal_<?php echo $methodid ?>_out [name="damage_status"]').val('');
                }

                // Check item status
                if (data[0].status === 'Sedang di luar') {
                    // Show warning and prevent action
                    show_error("show", 'Error', 'Barang sedang di luar, tidak dapat melakukan aksi keluar.');
                    $('#modal_out_<?php echo $methodid ?>').modal('hide');
                } else {
                    // Show the modal
                    $('#modal_out_<?php echo $methodid ?>').modal('show');
                }
            },
            error: function(xhr, status, error) {
                page_loading("hide");
                show_error("show", xhr.status.toString() + ' ' + xhr.statusText, 'Please try again');
            }
        });
    }

    function bug_fix_<?php echo $methodid ?>_out(out_detail_item_base_id) {
        // Tampilkan modal
        $('#bugFixModal').modal('show');

        page_loading("show", '<?php echo $page_title ?>', 'Please Wait...');

        $.ajax({
            url: baseurl + 'loader',
            data: {
                '<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
                param: 'data_item_base_detail_out',
                param_pop: 'db_pop',
                id: out_detail_item_base_id
            },
            dataType: 'json',
            method: 'post',
            success: function(data) {
                page_loading("hide");

                // Isi form dengan data yang diterima
                $('#formout<?php echo $methodid ?>_out_out_detail_item_base_id').val(data[0].out_detail_item_base_id);
                $('#formout<?php echo $methodid ?>_out_serial_number').val(data[0].serial_number);
                $('#formout<?php echo $methodid ?>_out_item_base_code').val(data[0].item_base_code);
                $('#formout<?php echo $methodid ?>_out_assets_tags_id').val(data[0].assets_tags_id);
                $('#formout<?php echo $methodid ?>_out_detail_item_base_id').val(data[0].detail_item_base_id);
                $('#formout<?php echo $methodid ?>_out_tgl_keluar').val(data[0].tgl_keluar);
                $('#formout<?php echo $methodid ?>_out_lokasi').val(data[0].lokasi);
                $('#formout<?php echo $methodid ?>_out_jml_item_out').val(data[0].jml_item_out);
                $('#formout<?php echo $methodid ?>_out_status_info').val(data[0].status_info);

                // Toggle field visibility setelah mengisi detail_item_baseid
                if (typeof toggleStatusFields === 'function') {
                    toggleStatusFields();
                }
            }
        });
    }



    function edit_detail_out_modal_<?php echo $methodid ?>_out(out_detail_item_base_id) {
        // Show update button, hide save button
        $('#btn_save_modal_<?php echo $methodid ?>_out').hide();
        $('#btn_update_modal_<?php echo $methodid ?>_out').show();

        page_loading("show", '<?php echo $page_title ?>', 'Please Wait...');

        $.ajax({
            url: baseurl + 'loader',
            data: {
                '<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
                param: 'data_item_base_detail_out',
                param_pop: 'db_pop',
                id: out_detail_item_base_id
            },
            dataType: 'json',
            method: 'post',
            success: function(data) {
                page_loading("hide");

                // Fill form fields with data
                $('#form_out_modal_<?php echo $methodid ?>_out [name="out_detail_item_base_id"]').val(data[0].out_detail_item_base_id);
                $('#form_out_modal_<?php echo $methodid ?>_out [name="detail_item_base_id"]').val(data[0].detail_item_base_id);
                $('#form_out_modal_<?php echo $methodid ?>_out [name="tgl_keluar"]').val(data[0].tgl_keluar);
                $('#form_out_modal_<?php echo $methodid ?>_out [name="lokasi"]').val(data[0].lokasi);
                $('#form_out_modal_<?php echo $methodid ?>_out [name="jml_item_out"]').val(data[0].jml_item_out);

                if (data[0].damage_status) {
                    $('.damage_out').show();
                    $('#form_out_modal_<?php echo $methodid ?>_out [name="damage_status"]').val(data[0].damage_status);
                } else {
                    $('.damage_out').hide();
                }

                // Show the modal
                $('#modal_out_<?php echo $methodid ?>').modal('show');
            },
            error: function(xhr, status, error) {
                page_loading("hide");
                show_error("show", xhr.status.toString() + ' ' + xhr.statusText, 'Please try again');
            }
        });
    }

    function tambah_persediaan_<?php echo $methodid ?>_detail(item_base_id) {

        page_loading("show", '<?php echo $page_title ?>', 'Please Wait...');

        $.ajax({
            url: baseurl + 'loader',
            data: {
                '<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
                param: 'data_item_base_detail_persediaan',
                param_pop: 'db_pop',
                id: item_base_id
            },
            dataType: 'json',
            method: 'post',
            success: function(data) {
                page_loading("hide");

                $('#form_detail_<?php echo $methodid ?>_detail_item_base_id').val(data[0].item_base_id);
                $('#form_detail_<?php echo $methodid ?>_detail_detail_item_base_id').val(data[0].detail_item_base_id);
                $('#form_detail_<?php echo $methodid ?>_detail_serial_number').val(data[0].serial_number);
                $('#form_detail_<?php echo $methodid ?>_detail_tgl_beli').val(data[0].tgl_beli);
                $('#form_detail_<?php echo $methodid ?>_detail_garansi').val(data[0].garansi);
                $('#form_detail_<?php echo $methodid ?>_detail_lokasi').val(data[0].lokasi);
                $('#form_detail_<?php echo $methodid ?>_detail_jml_item').val(data[0].jml_item);
                $('#form_detail_<?php echo $methodid ?>_detail_keterangan').val(data[0].keterangan);
                $('#form_detail_<?php echo $methodid ?>_detail_status').val(data[0].status);

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
        $('#btn_return_modal_<?php echo $methodid ?>').on('click', function() {
            process_return_<?php echo $methodid ?>();
        });

        // Reset form return saat modal ditutup
        $('#modal_return_<?php echo $methodid ?>').on('hidden.bs.modal', function() {
            $('#form_return_modal_<?php echo $methodid ?>_out')[0].reset();
        });

        $('#generate_serial_<?php echo $methodid ?>').on('click', function() {
            // Generate random serial number with timestamp
            var timestamp = new Date().getTime();
            var random = Math.floor(Math.random() * 10000);
            var serialNumber = '' + timestamp;

            // Set the generated serial number to the input field
            $('input[name="serial_number"]').val(serialNumber);
        });
    });

    $('#modal_out_<?php echo $methodid ?>').on('hidden.bs.modal', function() {
        // Reset form when modal is closed
        $('#form_out_modal_<?php echo $methodid ?>_out')[0].reset();
    });

    function delete_header_<?php echo $methodid ?>(item_base_id) {
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
                        url: baseurl + '<?php echo $class_uri ?>/delete',
                        data: {
                            '<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
                            item_base_id: item_base_id
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

    function delete_detail_<?php echo $methodid ?>_detail(detail_item_base_id) {
        if (check_submit == 0) {
            swal({
                title: "Yakin Hapus Detail ?",
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

    function delete_out_<?php echo $methodid ?>_out(out_detail_item_base_id) {
        if (check_submit == 0) {
            swal({
                title: "Yakin Hapus Item Out?",
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
                        url: baseurl + '<?php echo $class_uri ?>/delete_out',
                        data: {
                            '<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
                            out_detail_item_base_id: out_detail_item_base_id
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

                                $("#table_<?php echo $methodid ?>_out").trigger('reloadGrid');
                                $("#table_<?php echo $methodid ?>_out").setGridWidth($('.grid_container_<?php echo $methodid; ?>_out').width() - 20, true).trigger('resize');
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
            // Mendapatkan file utama (image)
            const file_input = $('#form_<?php echo $methodid ?> input[name="merk"]');
            const file_data = file_input.length > 0 && file_input[0].files.length > 0 ? file_input[0].files[0] : null;
            const current_merk = file_input.data('current-file');

            // Mendapatkan file invoice
            const invoice_input = $('#form_<?php echo $methodid ?> input[name="invoice"]');
            const invoice_data = invoice_input.length > 0 && invoice_input[0].files.length > 0 ? invoice_input[0].files[0] : null;
            const current_invoice = invoice_input.data('current-file');

            // Validasi file invoice jika ada
            if (invoice_data) {
                const file_type = invoice_data.type;
                const file_name = invoice_data.name;
                const file_extension = file_name.split('.').pop().toLowerCase();

                // Memastikan file invoice adalah PDF
                if (file_type !== 'application/pdf' && file_extension !== 'pdf') {
                    show_error("show", 'Error', 'File invoice harus dalam format PDF.');
                    return;
                }
            }

            check_submit = 1;
            page_loading("show", 'Save <?php echo $page_title ?>', 'Please Wait...');

            let frmdata = new FormData();
            let data2 = $("#form_<?php echo $methodid ?>").serializeArray();

            $.each(data2, function(key, input) {
                frmdata.append(input.name, input.value);
            });

            // Menambahkan file utama (image)
            if (file_data) {
                frmdata.append('file', file_data);
                frmdata.append('info', "Yes");
            } else {
                frmdata.append('info', "No");
                // If no new file is selected but there's an existing file, send the current filename
                if (current_merk) {
                    frmdata.append('current_merk', current_merk);
                }
            }

            // Menambahkan file invoice jika ada
            if (invoice_data) {
                frmdata.append('invoice', invoice_data);
                frmdata.append('invoice_info', "Yes");
            } else {
                frmdata.append('invoice_info', "No");
                // If no new invoice is selected but there's an existing one, send the current filename
                if (current_invoice) {
                    frmdata.append('current_invoice', current_invoice);
                }
            }

            $.ajax({
                url: baseurl + '<?php echo $class_uri ?>/post_add_edit',
                type: 'post',
                data: frmdata,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(data) {
                    page_loading("hide");
                    check_submit = 0;
                    if (data.valid) {
                        show_success("show", '<?php echo 'image' ?>', data.message, function() {
                            //// location.reload();
                        });
                    } else {
                        show_error("show", 'Error', data.message);
                    }
                },
                error: function(xhr) {
                    page_loading("hide");
                    show_error("show", xhr.status.toString() + ' ' + xhr.statusText, 'Please try again');
                    check_submit = 0;
                }
            });
        }
    }
    var check_submit = 0;

    function post_<?php echo $methodid ?>_detail() {
        if (check_submit == 0) {
            check_submit = 1;
            page_loading("show", '<?php echo $page_title ?>', 'Please Wait...');

            // Get form data
            var formData = $("#form_detail_<?php echo $methodid ?>_detail").serializeArray();
            var formObject = {};

            // Convert form data to object for easier manipulation
            $(formData).each(function(index, obj) {
                formObject[obj.name] = obj.value;
            });

            // Get jumlah item
            var jml_item = parseInt(formObject.jml_item);

            if (isNaN(jml_item) || jml_item <= 0) {
                show_error("show", 'Error', 'Jumlah item harus berupa angka positif');
                check_submit = 0;
                return;
            }

            // Base serial number (akan diincrement jika perlu)
            var baseSerialNumber = formObject.serial_number;

            // Prepare data batch for submission
            var batchData = {
                <?php echo $this->security->get_csrf_token_name(); ?>: formObject['<?php echo $this->security->get_csrf_token_name(); ?>'],
                item_base_id: formObject.item_base_id,
                detail_item_base_id: formObject.detail_item_base_id,
                jml_item: jml_item,
                serial_number: baseSerialNumber,
                assets_tags_id: formObject.assets_tags_id,
                status: formObject.status || '1',
                keterangan: formObject.keterangan,
                garansi: formObject.garansi,
                garansi_keterangan: formObject.garansi_keterangan,
                invoice_id: formObject.invoice_id
            };

            $.ajax({
                url: baseurl + '<?php echo $class_uri ?>/post_add_edit_detail',
                data: batchData,
                dataType: 'json',
                method: 'post',
                success: function(data) {
                    check_submit = 0;
                    if (data.valid) {
                        show_success("show", '<?php echo 'Detail' ?>', data.message, function() {
                            // location.reload();
                            clearDetailForm();
                        });
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


    var check_submit = 0;

    function post_<?php echo $methodid ?>_out() {
        if (check_submit == 0) {
            check_submit = 1;
            page_loading("show", '<?php echo $page_title ?>', 'Please Wait...');
            var data = $("#form_out_<?php echo $methodid ?>_out").serialize();
            $.ajax({
                url: baseurl + '<?php echo $class_uri ?>/post_add_edit_out',
                data: data,
                dataType: 'json',
                method: 'post',
                success: function(data) {
                    check_submit = 0;
                    if (data.valid) {
                        show_success("show", '<?php echo 'out' ?>', data.message, function() {
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

    var check_submit = 0;

    function post_modal_<?php echo $methodid ?>_out() {
        if (check_submit == 0) {
            check_submit = 1;
            page_loading("show", 'Save <?php echo $page_title ?>', 'Please Wait...');

            // Get CSRF token
            var csrfName = "<?php echo $this->security->get_csrf_token_name(); ?>";
            var csrfHash = "<?php echo $this->security->get_csrf_hash(); ?>";

            // Create FormData object
            let frmdata = new FormData();

            // Add form data
            var data = $("#form_out_modal_<?php echo $methodid ?>_out").serializeArray();
            $.each(data, function(index, field) {
                frmdata.append(field.name, field.value);
            });

            // Add CSRF token
            frmdata.append(csrfName, csrfHash);

            $.ajax({
                url: baseurl + '<?php echo $class_uri ?>/post_add_edit_out',
                type: 'post',
                data: frmdata,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(data) {
                    page_loading("hide");
                    check_submit = 0;

                    if (data.valid) {
                        show_success("show", '<?php echo 'Barang Keluar' ?>', data.message, function() {
                            // Close modal
                            $('#modal_out_<?php echo $methodid ?>').modal('hide');

                            // Reload grid if needed
                            $("#table_<?php echo $methodid ?>_out").trigger('reloadGrid');
                            $("#table_<?php echo $methodid ?>_detail").trigger('reloadGrid');
                        });
                    } else {
                        show_error("show", 'Error', data.message);
                    }
                },
                error: function(xhr) {
                    page_loading("hide");
                    show_error("show", xhr.status.toString() + ' ' + xhr.statusText, 'Please try again');
                    check_submit = 0;
                }
            });
        }
    }

    $('#generate_barcode_<?php echo $methodid ?>').on('click', function() {
        generateBarcode();
    });

    function generateBarcode() {
        // Dapatkan tahun dua digit terakhir
        const date = new Date();
        const year = date.getFullYear().toString().slice(-2);

        // Dapatkan bulan dengan format 2 digit (01-12)
        const month = ('0' + (date.getMonth() + 1)).slice(-2);

        // Generate 12 digit random (total 16 karakter = 2 digit tahun + 2 digit bulan + 12 digit random)
        let randomDigits = '';
        for (let i = 0; i < 6; i++) {
            randomDigits += Math.floor(Math.random() * 8);
        }

        // Gabungkan menjadi barcode
        const barcode = year + month + randomDigits;

        // Masukkan ke input field barcode
        $('#form_<?php echo $methodid ?>_barcode').val(barcode);
    }

    $('#generate_serial_<?php echo $methodid ?>').on('click', function() {
        generateSerial();
    });

    function generateSerial() {
        const date = new Date();
        const year = date.getFullYear().toString().slice(-2);
        const month = ('0' + (date.getMonth() + 1)).slice(-2);
        const day = ('0' + date.getDate()).slice(-2);

        let randomDigits = '';
        for (let i = 0; i < 6; i++) {
            randomDigits += Math.floor(Math.random() * 10);
        }

        const serialNumber = month + day + year + randomDigits;
        $('#form_detail_<?php echo $methodid ?>_detail_serial_number').val(serialNumber);
    }



    function return_item_<?php echo $methodid ?>_out(out_detail_item_base_id) {
        // Reset form state untuk modal return
        $('#btn_return_modal_<?php echo $methodid ?>').show();
        $('#form_return_modal_<?php echo $methodid ?>_out')[0].reset();

        page_loading("show", '<?php echo $page_title ?>', 'Please Wait...');

        $.ajax({
            url: baseurl + 'loader',
            data: {
                '<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
                param: 'data_item_base_detail_out',
                param_pop: 'db_pop',
                id: out_detail_item_base_id
            },
            dataType: 'json',
            method: 'post',
            success: function(data) {
                page_loading("hide");

                // Fill form fields with data
                $('#form_return_modal_<?php echo $methodid ?>_out_out_detail_item_base_id').val(data[0].out_detail_item_base_id);
                $('#form_return_modal_<?php echo $methodid ?>_out_detail_item_base_id').val(data[0].detail_item_base_id);

                // Set default values for return
                var currentDate = new Date();
                var formattedDate = currentDate.getFullYear() + '-' +
                    ('0' + (currentDate.getMonth() + 1)).slice(-2) + '-' +
                    ('0' + currentDate.getDate()).slice(-2);

                $('#form_return_modal_<?php echo $methodid ?>_out_tgl_kembali').val(formattedDate);
                $('#form_return_modal_<?php echo $methodid ?>_out_jml_item_return').val(data[0].jml_item_out || '');
                $('#form_return_modal_<?php echo $methodid ?>_out_status_kembali').val('Baik');
                $('#form_return_modal_<?php echo $methodid ?>_out_lokasi').val(data[0].lokasi);
                $('#form_return_modal_<?php echo $methodid ?>_out_tgl_keluar').val(data[0].tgl_keluar);
                $('#form_return_modal_<?php echo $methodid ?>_out_serial_number').val(data[0].serial_number);
                $('#form_return_modal_<?php echo $methodid ?>_out_jml_item_out').val(data[0].jml_item_out);

                // Tambahkan informasi item untuk ditampilkan di modal
                $('#return_item_info').text('Item yang dikembalikan: ' + (data[0].item_name || 'Item'));
                $('#return_location_info').text('Lokasi sebelumnya: ' + (data[0].lokasi || '-'));
                $('#return_date_info').text('Tanggal keluar: ' + (data[0].tgl_keluar || '-'));
                $('#return_serial_info').text('Serial Number: ' + (data[0].serial_number || '-'));
                $('#return_jml_item_out_info').text('Jumlah Item Keluar: ' + (data[0].jml_item_out || '-'));

                // Show the modal
                $('#modal_return_<?php echo $methodid ?>').modal('show');
            },
            error: function(xhr, status, error) {
                page_loading("hide");
                show_error("show", xhr.status.toString() + ' ' + xhr.statusText, 'Please try again');
            }
        });
    }
    var check_submit = 0;

    function post_out_<?php echo $methodid ?>_out() {
        if (check_submit == 0) {
            check_submit = 1;
            page_loading("show", '<?php echo $page_title ?>', 'Please Wait...');
            var data = $("#form_return_modal_<?php echo $methodid ?>_out").serialize();
            $.ajax({
                url: baseurl + '<?php echo $class_uri ?>/post_add_edit_out_return',
                data: data,
                dataType: 'json',
                method: 'post',
                success: function(data) {
                    check_submit = 0;
                    if (data.valid) {
                        show_success("show", '<?php echo 'out' ?>', data.message, function() {
                            // Tutup modal setelah berhasil
                            $('#modal_return_<?php echo $methodid ?>').modal('hide'); // Menutup modal
                            // location.reload(); // Uncomment jika ingin reload halaman
                        });
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


    function print_detail_<?php echo $methodid ?>_detail(serial_number) {

        if (!serial_number || serial_number.trim() === '') {

            show_error("show", 'Error', 'Serial number tidak ditemukan');
            return;
        }

        try {

            var canvas = document.createElement('canvas');

            if (typeof JsBarcode === 'undefined') {
                show_error("show", 'Error', 'JsBarcode library tidak ditemukan. Pastikan library sudah di-include.');
                return;
            }

            const cmToPx = (cm) => (cm / 2.54) * 96;

            const targetWidthCm = 3;
            const targetHeightCm = 1.5;


            canvas.width = Math.round(cmToPx(targetWidthCm));
            canvas.height = Math.round(cmToPx(targetHeightCm));


            JsBarcode(canvas, serial_number, {
                format: "CODE39",
                width: 3,
                height: canvas.height * 0.7,
                displayValue: true,
                fontSize: 12,
                textMargin: 3,
                background: "#ffffff",
                lineColor: "#000000",
                margin: 5
            });

            var imageDataURL = canvas.toDataURL('image/png');


            var printContent = `
            <!DOCTYPE html>
            <html>
            <head>
                <title>Print Barcode - ${serial_number}</title>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        margin: 0;
                        padding: 0;
                        text-align: center;
                    }
                    .barcode-container {
                        border: 1px solid #000; 
                        width: ${targetWidthCm}cm;  
                        height: ${targetHeightCm}cm; 
                        padding: 2px;
                       
                        background: white;
                        display: flex;
                        flex-direction: column;
                        justify-content: center;
                        align-items: center;
                        box-sizing: border-box; 
                        overflow: hidden; 
                    }
                    .company-name {
                        font-size: 8px;
                        font-weight: bold;
                        margin-bottom: 1px;
                        line-height: 1;
                        white-space: nowrap;
                    }
                    .barcode-image {
                        flex: 1; 
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        width: 100%; 
                        height: 100%;
                    }
                    .barcode-image img {
                        max-width: 100%; 
                        max-height: 100%;
                        object-fit: contain; 
                    }
                    @media print {
                        body {
                            margin: 0;
                            -webkit-print-color-adjust: exact; 
                            print-color-adjust: exact;
                        }
                        .barcode-container {
                            border: 1px solid #000;
                            page-break-inside: avoid; 
                            width: ${targetWidthCm}cm;
                            height: ${targetHeightCm}cm;
                           
                        }
                    }
                </style>
            </head>
            <body>
                <div class="barcode-container">
                    <div class="company-name">PT POP STAR</div>
                    <div class="barcode-image">
                        <img src="${imageDataURL}" alt="Barcode for ${serial_number}" />
                    </div>
                </div>
            </body>
            </html>
        `;

            // Buka jendela baru untuk proses cetak.
            var printWindow = window.open('', '_blank', 'width=600,height=400');

            if (printWindow) {
                printWindow.document.write(printContent);
                printWindow.document.close();


                printWindow.onload = function() {

                    setTimeout(function() {
                        printWindow.print();
                    }, 500);
                };


                printWindow.onafterprint = function() {
                    printWindow.close();
                };
            } else {

                show_error("show", 'Error', 'Popup blocked. Mohon allow popup untuk website ini.');
            }

        } catch (error) {

            console.error('Error generating barcode:', error);
            show_error("show", 'Error', 'Terjadi kesalahan saat generate barcode: ' + error.message);
        }
    }


    function download_barcode_<?php echo $methodid ?>_detail(serial_number) {
        if (!serial_number || serial_number.trim() === '') {
            show_error("show", 'Error', 'Serial number tidak ditemukan');
            return;
        }

        try {
            // Buat canvas untuk container dengan ukuran yang tepat
            var containerCanvas = document.createElement('canvas');
            var ctx = containerCanvas.getContext('2d');

            // Set ukuran canvas sesuai dengan ukuran yang diinginkan
            // 1 inch = 96 pixels (web standard DPI)
            var containerWidth = 96; // 1 inch = 96px
            var containerHeight = 144; // 1.5 inch = 144px

            containerCanvas.width = containerWidth;
            containerCanvas.height = containerHeight;

            // Set background putih
            ctx.fillStyle = '#ffffff';
            ctx.fillRect(0, 0, containerWidth, containerHeight);

            // Gambar border
            ctx.strokeStyle = '#000000';
            ctx.lineWidth = 2;
            ctx.strokeRect(1, 1, containerWidth - 2, containerHeight - 2);

            // Buat canvas untuk barcode
            var barcodeCanvas = document.createElement('canvas');

            if (typeof JsBarcode === 'undefined') {
                show_error("show", 'Error', 'JsBarcode library tidak ditemukan');
                return;
            }

            // Generate barcode dengan ukuran yang sesuai
            JsBarcode(barcodeCanvas, serial_number, {
                format: "CODE39",
                width: 1.2,
                height: 20,
                displayValue: true,
                fontSize: 8,
                textMargin: 2,
                background: "#ffffff",
                lineColor: "#000000",
                margin: 2
            });

            // Tulis text "PT POP STAR"
            ctx.fillStyle = '#000000';
            ctx.font = 'bold 8px Arial';
            ctx.textAlign = 'center';
            ctx.fillText('PT POP STAR', containerWidth / 2, 15);

            // Gambar barcode ke canvas utama
            var barcodeWidth = Math.min(barcodeCanvas.width, containerWidth - 10);
            var barcodeHeight = Math.min(barcodeCanvas.height, containerHeight - 25);
            var x = (containerWidth - barcodeWidth) / 2;
            var y = 20;

            ctx.drawImage(barcodeCanvas, x, y, barcodeWidth, barcodeHeight);

            // Convert to blob dan download
            containerCanvas.toBlob(function(blob) {
                var url = URL.createObjectURL(blob);
                var a = document.createElement('a');
                a.href = url;
                a.download = 'barcode_' + serial_number + '.png';
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
                URL.revokeObjectURL(url);
            }, 'image/png');

        } catch (error) {
            console.error('Error downloading barcode:', error);
            show_error("show", 'Error', 'Terjadi kesalahan saat download barcode: ' + error.message);
        }
    }






    var check_submit = 0;

    function post_edit_out<?php echo $methodid ?>_out() {
        if (check_submit == 0) {
            check_submit = 1;
            page_loading("show", '<?php echo $page_title ?>', 'Please Wait...');
            var data = $("#formout<?php echo $methodid ?>_out").serialize();
            $.ajax({
                url: baseurl + '<?php echo $class_uri ?>/post_edit_out',
                data: data,
                dataType: 'json',
                method: 'post',
                success: function(data) {
                    check_submit = 0;
                    if (data.valid) {
                        show_success("show", '<?php echo 'out' ?>', data.message, function() {
                            // Tutup modal setelah berhasil
                            $('#bugFixModal').modal('hide'); // Menutup modal bug fix
                            // location.reload(); // Uncomment jika ingin reload halaman
                        });
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





    function clearDetailForm() {
        $('#form_detail_<?php echo $methodid ?>_detail_detail_item_base_id').val('');
        $('#form_detail_<?php echo $methodid ?>_detail_serial_number').val('');
        $('#form_detail_<?php echo $methodid ?>_detail_jml_item').val('');
        $('#form_detail_<?php echo $methodid ?>_detail_status').val('');
        $('#form_detail_<?php echo $methodid ?>_detail_keterangan').val('');
        $('#form_detail_<?php echo $methodid ?>_detail_garansi').val('');

        // Tampilkan tombol simpan dan sembunyikan tombol update dan cancel
        $('.simpan_detail').show();
        $('.update_detail').hide();
        $('.cancel_detail').hide();

        // Panggil fungsi untuk toggle field status
        toggleStatusFields();
    }

    function clearDetailFormOut() {
        $('#form_out_<?php echo $methodid ?>_out_out_detail_item_base_id').val('');
        $('#form_out_<?php echo $methodid ?>_out_lokasi').val('');
        $('#form_out_<?php echo $methodid ?>_out_jml_item_out').val('');
        $('#form_out_<?php echo $methodid ?>_out_tgl_keluar').val('');
        $('#form_out_<?php echo $methodid ?>_out_damage_status').val('');



        $('.simpan_out').show();
        $('.update_out').hide();
        $('.damage_out').hide();
        $('.cancel_out').hide();


        // Panggil fungsi untuk toggle field status
        toggleStatusFields();
    }
</script>