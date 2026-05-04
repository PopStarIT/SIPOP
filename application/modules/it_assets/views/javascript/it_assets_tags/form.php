<script type="text/javascript">
    // Global variables
    var check_submit = 0;
    var currentSelectedAssetsTagsId = null;

    // Function untuk toggle status field (jika diperlukan)
    function toggleStatusFields() {
        // Implement your toggle logic here if needed
    }

    // Tab click handler
    $(".form_tab_<?php echo $methodid ?>").on("click", "a", function(e) {
        e.preventDefault();

        setTimeout(function() {
            var assets_tags_id = $('#form_<?php echo $methodid ?>_assets_tags_id').val();

            $("#table_<?php echo $methodid ?>").trigger('reloadGrid');
            $("#table_<?php echo $methodid ?>").setGridWidth($('.grid_container_<?php echo $methodid; ?>').width() - 20, true).trigger('resize');

            $("#table_<?php echo $methodid ?>_detail").trigger('reloadGrid');
            $("#table_<?php echo $methodid ?>_detail").setGridWidth($('.grid_container_<?php echo $methodid; ?>_detail').width() - 20, true).trigger('resize');

            $('.tab_scrollbar').getNiceScroll().resize();
        }, 1000);
    });

    // Cancel function
    function cancel_<?php echo $methodid ?>() {
        $('#panel_content_<?php echo $methodid ?>').show();
        $('#panel_content_form_<?php echo $methodid ?>').hide();
    }

    // Save function
    function save_<?php echo $methodid ?>() {
        $('#form_<?php echo $methodid ?>').submit();
    }

    // Edit function
    function edit_<?php echo $methodid ?>(assets_tags_id) {
        $('.simpan_title').hide();
        $('.update_title').show();
        $('.cancel_title').show();
        page_loading("show", '<?php echo $page_title ?>', 'Please Wait...');

        $.ajax({
            url: baseurl + 'loader',
            data: {
                '<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
                param: 'data_assets_tags',
                param_pop: 'db_pop',
                id: assets_tags_id
            },
            dataType: 'json',
            method: 'post',
            success: function(data) {
                page_loading("hide");
                if (data && data.length > 0) {
                    $('#form_<?php echo $methodid ?>_assets_tags_id').val(data[0].assets_tags_id);
                    $('#form_<?php echo $methodid ?>_assets_tags_name').val(data[0].assets_tags_name);
                    $('#form_<?php echo $methodid ?>_assets_tags_desc').val(data[0].assets_tags_desc);
                } else {
                    console.error('Data not found');
                }

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

    // Delete function
    function delete_<?php echo $methodid ?>(assets_tags_id) {
        if (check_submit == 0) {
            swal({
                title: "Yakin Hapus Item?",
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
                    page_loading("show", 'Delete Assets Tags', 'Please Wait...');
                    $.ajax({
                        url: baseurl + '<?php echo $class_uri ?>/delete',
                        data: {
                            '<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
                            assets_tags_id: assets_tags_id
                        },
                        dataType: 'json',
                        method: 'post',
                        success: function(data) {
                            page_loading("hide");
                            check_submit = 0;
                            if (data.valid) {
                                show_success("show", 'Delete Detail', data.message);
                                $("#table_<?php echo $methodid ?>").trigger('reloadGrid');
                                $("#table_<?php echo $methodid ?>").setGridWidth($('.grid_container_<?php echo $methodid; ?>').width() - 20, true).trigger('resize');

                                // Clear detail table
                                clearDetailTable();

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


    // ===== END PRINT FUNCTIONALITY =====

    // Post add/edit function
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
                        show_success("show", '<?php echo 'assets_tags' ?>', data.message, function() {
                            $("#table_<?php echo $methodid ?>").trigger('reloadGrid');
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

    // ===== MASTER-DETAIL FUNCTIONALITY =====

    // Function untuk load detail berdasarkan assets_tags_id
    function loadDetailData(assets_tags_id) {
        // Update global variable
        currentSelectedAssetsTagsId = assets_tags_id;

        // Set parameter untuk detail table
        $("#table_<?php echo $methodid ?>_detail").jqGrid('setGridParam', {
            postData: {
                '<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
                ini_assets_tags_id: assets_tags_id,
                methodid: '<?php echo $methodid ?>'
            }
        });

        // Reload detail table
        $("#table_<?php echo $methodid ?>_detail").trigger('reloadGrid');
    }

    // Function untuk clear detail table
    function clearDetailTable() {
        currentSelectedAssetsTagsId = null;

        $("#table_<?php echo $methodid ?>_detail").jqGrid('setGridParam', {
            postData: {
                '<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
                ini_assets_tags_id: -1,
                methodid: '<?php echo $methodid ?>'
            }
        });

        $("#table_<?php echo $methodid ?>_detail").trigger('reloadGrid');
    }

    // ===== EVENT HANDLERS =====

    // Document ready
    $(document).ready(function() {
        // Initialize
        toggleStatusFields();

        // Form change handler
        $('#form_<?php echo $methodid ?>_assets_tags_id').on('change', function() {
            toggleStatusFields();
        });

        // Tab change handler
        $(".form_tab_<?php echo $methodid ?>").on("click", "a", function(e) {
            if ($(this).attr('id') === "tab_<?php echo $methodid; ?>" ||
                $(this).attr('id') === "tab_<?php echo $methodid; ?>_out") {
                setTimeout(toggleStatusFields, 100);
            }
        });

        // Setup master table click handler with delay to ensure jqGrid is fully loaded
        setTimeout(function() {
            setupMasterTableHandler();
        }, 1500);

        // Setup keyboard shortcuts untuk print
        $(document).on('keydown', function(e) {
            // Ctrl+P untuk print selected row
            if (e.ctrlKey && e.which === 80) {
                e.preventDefault();
                printSelectedRow_<?php echo $methodid ?>();
            }
        });
    });

    // Function untuk setup master table event handler
    function setupMasterTableHandler() {
        // Method 1: Using click event on table
        $("#table_<?php echo $methodid ?>").off('click.masterdetail').on('click.masterdetail', 'tr.jqgrow', function(e) {
            var rowId = $(this).attr('id');

            if (rowId) {
                // Get row data
                var rowData = $("#table_<?php echo $methodid ?>").jqGrid('getRowData', rowId);

                // Check if r1 (assets_tags_id) exists
                if (rowData && rowData.r1) {
                    loadDetailData(rowData.r1);
                } else {
                    clearDetailTable();
                }
            }
        });

        // Double click untuk print (optional)
        $("#table_<?php echo $methodid ?>").off('dblclick.print').on('dblclick.print', 'tr.jqgrow', function(e) {
            var rowId = $(this).attr('id');
            if (rowId) {
                var rowData = $("#table_<?php echo $methodid ?>").jqGrid('getRowData', rowId);
                if (rowData && rowData.r1) {
                    print_<?php echo $methodid ?>(rowData.r1);
                }
            }
        });
    }

    // Function untuk reload kedua table
    function reloadBothTables() {
        $("#table_<?php echo $methodid ?>").trigger('reloadGrid');
        $("#table_<?php echo $methodid ?>_detail").trigger('reloadGrid');
    }

    // Export functions to global scope
    window.reloadBothTables = reloadBothTables;
    window.loadDetailData = loadDetailData;
    window.clearDetailTable = clearDetailTable;
    window.printAssetsTagsById = print_<?php echo $methodid ?>;
    window.printSelectedRow = printSelectedRow_<?php echo $methodid ?>;
    window.printCurrentSelected = printCurrentSelected_<?php echo $methodid ?>;
</script>