<script type="text/javascript">
    $(".form_tab_<?php echo $methodid ?>").on("click", "a", function(e) {
        e.preventDefault();
        setTimeout(function() {

            var task_assignment_id = $('#form_<?php echo $methodid ?>_task_assignment_id').val();
            $("#table_<?php echo $methodid ?>_task_assignment_id").trigger('reloadGrid');
            $("#table_<?php echo $methodid ?>_task_assignment_id").setGridWidth($('.grid_container_<?php echo $methodid; ?>_task_assignment_id').width() - 20, true).trigger('resize');





            $('.tab_scrollbar').getNiceScroll().resize();
        }, 1000);
    });

    function save_<?php echo $methodid ?>() {

        $('#form_<?php echo $methodid ?>').submit();
    }

    function save_modal_<?php echo $methodid ?>() {

        $('#modal_form_<?php echo $methodid ?>').submit();
    }

    function cancel_<?php echo $methodid ?>() {
        // Tampilkan panel content dan sembunyikan panel form
        $('#panel_content_<?php echo $methodid ?>').show();
        $('#panel_content_form_<?php echo $methodid ?>').hide();

        // Reset form
        $('#form_<?php echo $methodid ?>')[0].reset();

        // Trigger reload grid
        $("#table_<?php echo $methodid ?>").trigger('reloadGrid');
        $("#table_<?php echo $methodid ?>").setGridWidth($('.grid_container_<?php echo $methodid; ?>').width() - 20, true).trigger('resize');

        // Resize tab scrollbar
        $('.tab_scrollbar').getNiceScroll().resize();
    }

    function edit_<?php echo $methodid ?>(id) {

        page_loading("show", '<?php echo $page_title ?>', 'Please Wait...');

        $.ajax({
            url: baseurl + 'loader',
            data: {
                '<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
                param: 'data_style_no_task_assignment_execute',
                param_pop: 'db_pop',
                id: id
            },
            dataType: 'json',
            method: 'post',
            success: function(data) {
                page_loading("hide");
                if (data && data.length > 0) {
                    $('#form_<?php echo $methodid ?>_id').val(data[0].id);
                    $('#form_detail_<?php echo $methodid ?>_id').val(data[0].id);
                    $('#form_<?php echo $methodid ?>_text').val(data[0].text);

                    $('.info-item:contains("Style No:")').text('Style No: ' + data[0].text);
                    $('.info-item:contains("Target Output:")').text('Target Output: ' + data[0].value);
                    // $("#tab_<?php echo $methodid; ?>").attr("data-toggle", "tab").removeClass("tab_disabled");
                    $('#panel_content_<?php echo $methodid ?>').hide();
                    $('#panel_content_form_<?php echo $methodid ?>').show();
                    $('.panel_<?php echo $methodid ?>').show();
                    $("#table_<?php echo $methodid ?>").trigger('reloadGrid');

                    // Load semua data termasuk size breakdown
                    loadCountData(baseurl + '<?php echo $class_uri ?>/count_rft_1', '.card-value-rft');
                    loadCountData(baseurl + '<?php echo $class_uri ?>/count_rft_xs', '.card-value-rft-xs');
                    loadCountData(baseurl + '<?php echo $class_uri ?>/count_rft_s', '.card-value-rft-s');
                    loadCountData(baseurl + '<?php echo $class_uri ?>/count_rft_m', '.card-value-rft-m');
                    loadCountData(baseurl + '<?php echo $class_uri ?>/count_rft_l', '.card-value-rft-l');
                    loadCountData(baseurl + '<?php echo $class_uri ?>/count_rft_xl', '.card-value-rft-xl');
                    loadCountData(baseurl + '<?php echo $class_uri ?>/count_rft_xxl', '.card-value-rft-xxl');


                    loadCountData(baseurl + '<?php echo $class_uri ?>/count_rft_2', '.card-value-rft-2');
                    loadCountData(baseurl + '<?php echo $class_uri ?>/count_rft_2_xs', '.card-value-rft-2-xs');
                    loadCountData(baseurl + '<?php echo $class_uri ?>/count_rft_2_s', '.card-value-rft-2-s');
                    loadCountData(baseurl + '<?php echo $class_uri ?>/count_rft_2_m', '.card-value-rft-2-m');
                    loadCountData(baseurl + '<?php echo $class_uri ?>/count_rft_2_l', '.card-value-rft-2-l');
                    loadCountData(baseurl + '<?php echo $class_uri ?>/count_rft_2_xl', '.card-value-rft-2-xl');
                    loadCountData(baseurl + '<?php echo $class_uri ?>/count_rft_2_xxl', '.card-value-rft-2-xxl');




                    loadCountData(baseurl + '<?php echo $class_uri ?>/count_reject_1', '.card-value-reject');
                    loadCountData(baseurl + '<?php echo $class_uri ?>/count_reject_xs', '.card-value-reject-xs');
                    loadCountData(baseurl + '<?php echo $class_uri ?>/count_reject_s', '.card-value-reject-s');
                    loadCountData(baseurl + '<?php echo $class_uri ?>/count_reject_m', '.card-value-reject-m');
                    loadCountData(baseurl + '<?php echo $class_uri ?>/count_reject_l', '.card-value-reject-l');
                    loadCountData(baseurl + '<?php echo $class_uri ?>/count_reject_xl', '.card-value-reject-xl');
                    loadCountData(baseurl + '<?php echo $class_uri ?>/count_reject_xxl', '.card-value-reject-xxl');








                    loadCountData(baseurl + '<?php echo $class_uri ?>/count_reject_2', '.card-value-reject-2');
                    loadCountData(baseurl + '<?php echo $class_uri ?>/count_reject_2_xs', '.card-value-reject-2-xs');
                    loadCountData(baseurl + '<?php echo $class_uri ?>/count_reject_2_s', '.card-value-reject-2-s');
                    loadCountData(baseurl + '<?php echo $class_uri ?>/count_reject_2_m', '.card-value-reject-2-m');
                    loadCountData(baseurl + '<?php echo $class_uri ?>/count_reject_2_l', '.card-value-reject-2-l');
                    loadCountData(baseurl + '<?php echo $class_uri ?>/count_reject_2_xl', '.card-value-reject-2-xl');
                    loadCountData(baseurl + '<?php echo $class_uri ?>/count_reject_2_xxl', '.card-value-reject-2-xxl');











                    loadCountData(baseurl + '<?php echo $class_uri ?>/count_reject_2', '.card-value-reject-2');
                    loadCountData(baseurl + '<?php echo $class_uri ?>/count_defect_1', '.card-value-defective');
                    loadCountData(baseurl + '<?php echo $class_uri ?>/count_defect_2', '.card-value-defective-2');


                    updateAllDataAndRatio();

                    $("#table_<?php echo $methodid ?>").trigger('reloadGrid');
                    $("#table_<?php echo $methodid ?>").setGridWidth($('.grid_container_<?php echo $methodid; ?>').width() - 20, true).trigger('resize');
                    $('.tab_scrollbar').getNiceScroll().resize();

                    setTimeout(function() {
                        $('.tab_scrollbar').getNiceScroll().resize();
                    }, 100);

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

    function calculateAndUpdateRatio() {
        var rftValue = parseInt($('.indicator-rft').text()) || 0;
        var defectValue = parseInt($('.indicator-defect').text()) || 0;
        var rejectValue = parseInt($('.indicator-reject').text()) || 0;

        var totalOutput = rftValue + defectValue + rejectValue;

        var targetOutputText = $('.info-item:contains("Target Output:")').text();
        var targetOutput = 0;
        var match = targetOutputText.match(/Target Output:\s*(\d+)/);
        if (match) {
            targetOutput = parseInt(match[1]);
        }
        var percentage = 0;
        if (targetOutput > 0) {
            percentage = (totalOutput / targetOutput) * 100;
            percentage = Math.round(percentage * 100) / 100;
        }
        $('.dhu-percentage').text(percentage + '%');

        $('.dhu-label').text('Ratio (' + totalOutput + '/' + targetOutput + ')');

        var targetInfo = {
            totalOutput: totalOutput,
            targetOutput: targetOutput,
            isTargetReached: totalOutput >= targetOutput && targetOutput > 0,
            rft: rftValue,
            defect: defectValue,
            reject: rejectValue,
            percentage: percentage
        };
        toggleCardsBasedOnTarget(targetInfo.isTargetReached);
        return targetInfo;
    }

    function loadCountData(url, targetElement) {
        var mainId = $('#form_<?php echo $methodid ?>_id').val();
        if (!mainId) {
            $(targetElement).text(0);
            console.warn('No task_assignment_id found for ' + targetElement);
            calculateAndUpdateRatio();
            return;
        }

        $.ajax({
            url: url,
            data: {
                '<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
                task_assignment_id: mainId
            },
            dataType: 'json',
            method: 'post',
            success: function(count_data) {
                if (count_data && typeof count_data.count !== 'undefined') {
                    $(targetElement).text(count_data.count);

                    if (count_data.output_array) {

                    } else {

                    }

                    setTimeout(function() {
                        calculateAndUpdateRatio();
                    }, 100);

                } else {
                    console.warn('Invalid data format received for ' + targetElement, count_data);
                    $(targetElement).text(0);
                    setTimeout(function() {
                        calculateAndUpdateRatio();
                    }, 100);
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error for ' + targetElement + ': ' + status + ' - ' + error);
                $(targetElement).text(0);
                setTimeout(function() {
                    calculateAndUpdateRatio();
                }, 100);
            }
        });
    }

    function updateAllDataAndRatio() {
        var mainId = $('#form_<?php echo $methodid ?>_id').val();
        if (!mainId) {
            console.warn('No task_assignment_id found');
            return;
        }
        var completedRequests = 0;
        var totalRequests = 3;

        function onRequestComplete() {
            completedRequests++;
            if (completedRequests >= totalRequests) {
                calculateAndUpdateRatio();
            }
        }
        loadCountDataWithCallback(baseurl + '<?php echo $class_uri ?>/count_rft_all', '.indicator-rft', onRequestComplete);
        loadCountDataWithCallback(baseurl + '<?php echo $class_uri ?>/count_defect_all', '.indicator-defect', onRequestComplete);
        loadCountDataWithCallback(baseurl + '<?php echo $class_uri ?>/count_reject_all', '.indicator-reject', onRequestComplete);
    }

    function loadCountDataWithCallback(url, targetElement, callback) {
        var mainId = $('#form_<?php echo $methodid ?>_id').val();
        if (!mainId) {
            $(targetElement).text(0);
            if (callback) callback();
            return;
        }

        $.ajax({
            url: url,
            data: {
                '<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
                task_assignment_id: mainId
            },
            dataType: 'json',
            method: 'post',
            success: function(count_data) {
                if (count_data && typeof count_data.count !== 'undefined') {
                    $(targetElement).text(count_data.count);
                } else {
                    $(targetElement).text(0);
                }
                if (callback) callback();
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error for ' + targetElement + ': ' + status + ' - ' + error);
                $(targetElement).text(0);
                if (callback) callback();
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
                        show_success("show", '<?php echo 'Success' ?>', data.message, function() {


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

    $("body").off("click", ".data-card-rft").on("click", ".data-card-rft", function(e) {
        e.preventDefault();

        // var targetInfo = checkTargetAchievement();

        // if (targetInfo.isTargetReached) {
        //     showTargetReachedPopup(targetInfo);
        //     return false;
        // }

        // Lanjutkan dengan logic asli
        var cardTitle = $(this).find(".card-title-rft").text();
        var cardValue = $(this).find(".card-value-rft").text();

        $("#modal_title_<?php echo $methodid ?>").val(cardTitle);
        $("#modal_value_<?php echo $methodid ?>").val(cardValue);

        var mainId = $("#form_<?php echo $methodid ?>_id").val();
        $("#modal_form_<?php echo $methodid ?>_task_assignment_id").val(mainId);

        $("#dataCardModal_<?php echo $methodid ?>").modal("show");
    });


    $("body").off("click", ".data-card-reject").on("click", ".data-card-reject", function(e) {
        e.preventDefault();

        // var targetInfo = checkTargetAchievement();

        // if (targetInfo.isTargetReached) {
        //     showTargetReachedPopup(targetInfo);
        //     return false;
        // }
        var cardTitle = $(this).find(".card-title-reject").text();
        var cardValue = $(this).find(".card-value-reject").text();

        $("#rejectModalLabel_<?php echo $methodid ?>").text("Reject Data for " + cardTitle);

        var mainId = $("#form_<?php echo $methodid ?>_id").val();
        $("#reject_form_<?php echo $methodid ?>_task_assignment_id").val(mainId);

        $("#rejectModal_<?php echo $methodid ?>").modal("show");
    });


    $('#rejectModal_<?php echo $methodid ?>').on('shown.bs.modal', function() {

        var mainId = $("#form_<?php echo $methodid ?>_id").val();
        if (mainId && mainId !== '') {
            $("#reject_form_<?php echo $methodid ?>_task_assignment_id").val(mainId);

        } else {
            console.error("Warning: Main ID is empty or undefined");
        }
    });
    var check_submit = 0;

    function post_rft_<?php echo $methodid ?>() {
        if (check_submit == 0) {
            check_submit = 1;
            page_loading("show", '<?php echo $page_title ?>', 'Please Wait...');
            var activeModal = $("#dataCardModal_<?php echo $methodid ?>").hasClass('show') ? "#modal_form_<?php echo $methodid ?>" : "#rectified_form_<?php echo $methodid ?>";

            var bundle_qty = $(activeModal).find("input[name='bundle_qty']").val();
            if (activeModal === "#modal_form_<?php echo $methodid ?>" && !bundle_qty) {
                bundle_qty = 1;
                $(activeModal).find("input[name='bundle_qty']").val(bundle_qty);
            }
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
    var check_submit_reject = 0;

    function post_reject_<?php echo $methodid ?>() {
        if (check_submit_reject == 0) {
            check_submit_reject = 1;
            page_loading("show", '<?php echo $page_title ?>', 'Please Wait...');

            var activeModal = $("#rejectModal_<?php echo $methodid ?>").hasClass('show') ? "#reject_form_<?php echo $methodid ?>" : "#rework_reject_form_<?php echo $methodid ?>";

            var data = $(activeModal).serialize();
            $.ajax({
                url: baseurl + '<?php echo $class_uri ?>/post_add_edit_reject',
                data: data,
                dataType: 'json',
                method: 'post',
                success: function(data) {
                    check_submit_reject = 0;
                    page_loading("hide");
                    if (data.valid) {
                        show_success("show", 'Success', data.message, function() {

                            $(activeModal).closest('.modal').modal("hide");
                            $(activeModal)[0].reset();
                        });
                    } else {
                        show_error("show", 'Error', data.message);
                    }
                },
                error: function(xhr, status, error) {
                    check_submit_reject = 0;
                    page_loading("hide");
                    show_error("show", xhr.status.toString() + ' ' + xhr.statusText, 'Please try again');
                }
            });
        }
    }
    $("body").off("click", ".data-card-defective").on("click", ".data-card-defective", function(e) {
        e.preventDefault();

        // var targetInfo = checkTargetAchievement();

        // if (targetInfo.isTargetReached) {
        //     showTargetReachedPopup(targetInfo);
        //     return false;
        // }
        var cardTitle = $(this).find(".card-title-defective").text();

        $("#defectiveModalLabel_<?php echo $methodid ?>").text("Defective Data for " + cardTitle);

        var mainId = $("#form_<?php echo $methodid ?>_id").val();
        $("#defective_form_<?php echo $methodid ?>_task_assignment_id").val(mainId);

        $("#defectiveModal_<?php echo $methodid ?>").modal("show");
    });



    $("body").off("click", ".data-card-rft-2.blue-card-2").on("click", ".data-card-rft-2.blue-card-2", function(e) {
        e.preventDefault();

        // var targetInfo = checkTargetAchievement();

        // if (targetInfo.isTargetReached) {
        //     showTargetReachedPopup(targetInfo);
        //     return false;
        // }
        var cardTitle = $(this).find(".card-title").text();

        $("#rectifiedModalLabel_<?php echo $methodid ?>").text("Rectified Data for " + cardTitle);

        var mainId = $("#form_<?php echo $methodid ?>_id").val();
        $("#rectified_form_<?php echo $methodid ?>_task_assignment_id").val(mainId);

        $("#rectifiedModal_<?php echo $methodid ?>").modal("show");
    });
    $("body").off("click", ".data-card-defective-2.olive-card").on("click", ".data-card-defective-2.olive-card", function(e) {
        e.preventDefault();

        // var targetInfo = checkTargetAchievement();

        // if (targetInfo.isTargetReached) {
        //     showTargetReachedPopup(targetInfo);
        //     return false;
        // }
        var cardTitle = $(this).find(".card-title").text();

        $("#repeatDefectModalLabel_<?php echo $methodid ?>").text("Repeat Defect Data for " + cardTitle);

        var mainId = $("#form_<?php echo $methodid ?>_id").val();
        $("#repeat_defect_form_<?php echo $methodid ?>_task_assignment_id").val(mainId);

        $("#repeatDefectModal_<?php echo $methodid ?>").modal("show");
    });

    $("body").off("click", ".data-card-reject-2.red-card").on("click", ".data-card-reject-2.red-card", function(e) {
        e.preventDefault();

        // var targetInfo = checkTargetAchievement();

        // if (targetInfo.isTargetReached) {
        //     showTargetReachedPopup(targetInfo);
        //     return false;
        // }
        var mainId = $("#form_<?php echo $methodid ?>_id").val();

        if (mainId && mainId !== '') {
            $("#rework_reject_form_<?php echo $methodid ?>_task_assignment_id").val(mainId);
            $("#reworkRejectModal_<?php echo $methodid ?>").modal("show");
        } else {
            console.error("Warning: Main ID kosong atau undefined");
        }
    });

    function toggleCardsBasedOnTarget(isTargetReached) {
        var cards = [
            '.data-card-rft',
            '.data-card-defective',
            '.data-card-reject',
            '.data-card-rft-2',
            '.data-card-defective-2',
            '.data-card-reject-2'
        ];

        cards.forEach(function(cardSelector) {
            var card = $(cardSelector);
            if (isTargetReached) {
                card.addClass('target-reached-disabled');
                card.css({
                    'cursor': 'not-allowed',
                    'opacity': '0.7',
                    'pointer-events': 'none'
                });
                if (card.find('.target-reached-overlay').length === 0) {
                    card.append('<div class="target-reached-overlay" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(255,0,0,0.1); display: flex; align-items: center; justify-content: center; color: #fff; font-weight: bold; font-size: 12px;">TARGET TERCAPAI</div>');
                }
            } else {
                card.removeClass('target-reached-disabled');
                card.css({
                    'cursor': 'pointer',
                    'opacity': '1',
                    'pointer-events': 'auto'
                });
                card.find('.target-reached-overlay').remove();
            }
        });
    }
    $(document).ready(function() {
        // Eksekusi resize sekali saat halaman pertama kali dimuat
        $(window).trigger('resize');
        pollData();
        // Inisialisasi kamera untuk kedua form
        initializeCameraInput_<?php echo $methodid ?>();
        initializeCameraInput_repeat_<?php echo $methodid ?>();


        $('#exampleModalrft').on('shown.bs.modal', function() {
            reloadJqGridTables('<?php echo $methodid ?>_rft_1');
        });

        // Event listener untuk modal Defective
        $('#exampleModaldefect').on('shown.bs.modal', function() {
            reloadJqGridTables('<?php echo $methodid ?>_defect_1');
        });

        // Event listener untuk modal Reject
        $('#exampleModalreject').on('shown.bs.modal', function() {
            reloadJqGridTables('<?php echo $methodid ?>_reject_1');
        });

        // Event listener untuk modal Rectified
        $('#exampleModalrectified').on('shown.bs.modal', function() {
            reloadJqGridTables('<?php echo $methodid ?>_rft_2');
        });

        // Event listener untuk modal Repeat Defect
        $('#exampleModalrepet_defect').on('shown.bs.modal', function() {
            reloadJqGridTables('<?php echo $methodid ?>_defect_2');
        });

        // Event listener untuk modal Rework Reject
        $('#exampleModalrework_reject').on('shown.bs.modal', function() {
            reloadJqGridTables('<?php echo $methodid ?>_reject_2');
        });
    });

    // Fungsi untuk menghitung ulang ratio setelah resize
    $(window).on('resize', function() {
        calculateAndUpdateRatio();
    });

    function initializeCameraInput_<?php echo $methodid ?>() {
        const cameraContainer = $('#cameraContainer_<?php echo $methodid ?>');
        const cameraInput = $('#cameraInput_<?php echo $methodid ?>');
        const imagePreview = $('#imagePreview_<?php echo $methodid ?>');
        const removeImage = $('#removeImage_<?php echo $methodid ?>');
        const retakeBtn = $('#retakeBtn_<?php echo $methodid ?>');

        // Click handler untuk membuka kamera
        cameraContainer.off('click').on('click', function(e) {
            // Jangan trigger jika click pada button remove atau retake
            if ($(e.target).closest('.remove-image, .retake-btn').length > 0) {
                return;
            }

            // Trigger file input untuk membuka kamera
            cameraInput.trigger('click');
        });

        // Handler ketika gambar dipilih/diambil
        cameraInput.off('change').on('change', function(e) {
            const file = e.target.files[0];

            if (file) {
                // Validasi tipe file
                if (!file.type.startsWith('image/')) {
                    show_error("show", 'Error', 'Please select an image file');
                    return;
                }

                // Validasi ukuran file (max 5MB)
                if (file.size > 5 * 1024 * 1024) {
                    show_error("show", 'Error', 'File size too large. Maximum 5MB allowed.');
                    return;
                }

                // Baca file dan tampilkan preview
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.attr('src', e.target.result);
                    showImagePreview_<?php echo $methodid ?>();
                };
                reader.readAsDataURL(file);
            }
        });

        // Handler untuk remove image
        removeImage.off('click').on('click', function(e) {
            e.stopPropagation();
            resetCameraInput_<?php echo $methodid ?>();
        });

        // Handler untuk retake
        retakeBtn.off('click').on('click', function(e) {
            e.stopPropagation();
            cameraInput.trigger('click');
        });
    }

    // Function untuk menampilkan preview
    function showImagePreview_<?php echo $methodid ?>() {
        const cameraContainer = $('#cameraContainer_<?php echo $methodid ?>');
        const imagePreview = $('#imagePreview_<?php echo $methodid ?>');
        const retakeBtn = $('#retakeBtn_<?php echo $methodid ?>');

        cameraContainer.addClass('has-image');
        imagePreview.show();
        retakeBtn.show();
        cameraContainer.find('.camera-icon, .camera-text').hide();
    }

    // Function untuk reset camera input
    function resetCameraInput_<?php echo $methodid ?>() {
        const cameraContainer = $('#cameraContainer_<?php echo $methodid ?>');
        const imagePreview = $('#imagePreview_<?php echo $methodid ?>');
        const retakeBtn = $('#retakeBtn_<?php echo $methodid ?>');
        const cameraInput = $('#cameraInput_<?php echo $methodid ?>');

        cameraContainer.removeClass('has-image');
        imagePreview.hide().attr('src', '');
        retakeBtn.hide();
        cameraContainer.find('.camera-icon, .camera-text').show();
        cameraInput.val(''); // Clear file input
    }

    var check_submit_defective = 0;

    function post_defective_<?php echo $methodid ?>() {
        if (check_submit_defective == 0) {
            // Validasi gambar wajib
            const cameraInput = $('#cameraInput_<?php echo $methodid ?>');
            if (!cameraInput[0] || !cameraInput[0].files[0]) {
                show_error("show", 'Error', 'Please take a photo before submitting');
                return;
            }

            check_submit_defective = 1;
            page_loading("show", '<?php echo $page_title ?>', 'Please Wait...');

            // Cek form mana yang sedang aktif/visible
            var activeForm;
            var defectiveForm = document.getElementById("defective_form_<?php echo $methodid ?>");
            var repeatDefectForm = document.getElementById("repeat_defect_form_<?php echo $methodid ?>");

            // Cek modal mana yang sedang terbuka
            if ($('#defectiveModal_<?php echo $methodid ?>').hasClass('show')) {
                activeForm = defectiveForm;
            } else if ($('#repeatDefectModal_<?php echo $methodid ?>').hasClass('show')) {
                activeForm = repeatDefectForm;
            }

            if (!activeForm) {
                check_submit_defective = 0;
                page_loading("hide");
                show_error("show", 'Error', 'No active form found');
                return;
            }

            var formData = new FormData(activeForm);

            $.ajax({
                url: baseurl + '<?php echo $class_uri ?>/post_add_edit_defective',
                data: formData,
                dataType: 'json',
                method: 'post',
                processData: false,
                contentType: false,
                success: function(data) {
                    check_submit_defective = 0;
                    page_loading("hide");
                    if (data.valid) {
                        show_success("show", 'Success', data.message, function() {
                            $(activeForm).closest('.modal').modal("hide");
                            activeForm.reset();
                            resetCameraInput_<?php echo $methodid ?>(); // Reset camera input

                        });
                    } else {
                        show_error("show", 'Error', data.message);
                    }
                },
                error: function(xhr, status, error) {
                    check_submit_defective = 0;
                    page_loading("hide");
                    show_error("show", xhr.status.toString() + ' ' + xhr.statusText, 'Please try again');
                }
            });
        }
    }

    $('#defectiveModal_<?php echo $methodid ?>').on('shown.bs.modal', function() {
        resetCameraInput_<?php echo $methodid ?>();
        var mainId = $("#form_<?php echo $methodid ?>_id").val();
        if (mainId && mainId !== '') {
            $("#defective_form_<?php echo $methodid ?>_task_assignment_id").val(mainId);
        }
    });

    function initializeCameraInput_repeat_<?php echo $methodid ?>() {
        const cameraContainer = $('#cameraContainer_repeat_<?php echo $methodid ?>');
        const cameraInput = $('#cameraInput_repeat_<?php echo $methodid ?>');
        const imagePreview = $('#imagePreview_repeat_<?php echo $methodid ?>');
        const removeImage = $('#removeImage_repeat_<?php echo $methodid ?>');
        const retakeBtn = $('#retakeBtn_repeat_<?php echo $methodid ?>');

        // Click handler untuk membuka kamera
        cameraContainer.off('click').on('click', function(e) {
            // Jangan trigger jika click pada button remove atau retake
            if ($(e.target).closest('.remove-image, .retake-btn').length > 0) {
                return;
            }

            // Trigger file input untuk membuka kamera
            cameraInput.trigger('click');
        });

        // Handler ketika gambar dipilih/diambil
        cameraInput.off('change').on('change', function(e) {
            const file = e.target.files[0];

            if (file) {
                // Validasi tipe file
                if (!file.type.startsWith('image/')) {
                    show_error("show", 'Error', 'Please select an image file');
                    return;
                }

                // Validasi ukuran file (max 5MB)
                if (file.size > 5 * 1024 * 1024) {
                    show_error("show", 'Error', 'File size too large. Maximum 5MB allowed.');
                    return;
                }

                // Baca file dan tampilkan preview
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.attr('src', e.target.result);
                    showImagePreview_repeat_<?php echo $methodid ?>();
                };
                reader.readAsDataURL(file);
            }
        });

        // Handler untuk remove image
        removeImage.off('click').on('click', function(e) {
            e.stopPropagation();
            resetCameraInput_repeat_<?php echo $methodid ?>();
        });

        // Handler untuk retake
        retakeBtn.off('click').on('click', function(e) {
            e.stopPropagation();
            cameraInput.trigger('click');
        });
    }

    // Function untuk menampilkan preview - REPEAT FORM
    function showImagePreview_repeat_<?php echo $methodid ?>() {
        const cameraContainer = $('#cameraContainer_repeat_<?php echo $methodid ?>');
        const imagePreview = $('#imagePreview_repeat_<?php echo $methodid ?>');
        const retakeBtn = $('#retakeBtn_repeat_<?php echo $methodid ?>');

        cameraContainer.addClass('has-image');
        imagePreview.show();
        retakeBtn.show();
        cameraContainer.find('.camera-icon, .camera-text').hide();
    }

    // Function untuk reset camera input - REPEAT FORM
    function resetCameraInput_repeat_<?php echo $methodid ?>() {
        const cameraContainer = $('#cameraContainer_repeat_<?php echo $methodid ?>');
        const imagePreview = $('#imagePreview_repeat_<?php echo $methodid ?>');
        const retakeBtn = $('#retakeBtn_repeat_<?php echo $methodid ?>');
        const cameraInput = $('#cameraInput_repeat_<?php echo $methodid ?>');

        cameraContainer.removeClass('has-image');
        imagePreview.hide().attr('src', '');
        retakeBtn.hide();
        cameraContainer.find('.camera-icon, .camera-text').show();
        cameraInput.val(''); // Clear file input
    }

    var check_submit_defective = 0;

    function post_defective_<?php echo $methodid ?>() {
        if (check_submit_defective == 0) {

            var activeForm;
            var activeCameraInput;
            var defectiveForm = document.getElementById("defective_form_<?php echo $methodid ?>");
            var repeatDefectForm = document.getElementById("repeat_defect_form_<?php echo $methodid ?>");

            // Cek modal mana yang sedang terbuka
            if ($('#defectiveModal_<?php echo $methodid ?>').hasClass('show')) {
                activeForm = defectiveForm;
                activeCameraInput = $('#cameraInput_<?php echo $methodid ?>');
            } else if ($('#repeatDefectModal_<?php echo $methodid ?>').hasClass('show')) {
                activeForm = repeatDefectForm;
                activeCameraInput = $('#cameraInput_repeat_<?php echo $methodid ?>');
            }

            if (!activeForm) {
                show_error("show", 'Error', 'No active form found');
                return;
            }

            // Validasi gambar wajib sesuai form yang aktif
            if (!activeCameraInput[0] || !activeCameraInput[0].files[0]) {
                show_error("show", 'Error', 'Please take a photo before submitting');
                return;
            }

            check_submit_defective = 1;
            page_loading("show", '<?php echo $page_title ?>', 'Please Wait...');

            var formData = new FormData(activeForm);

            $.ajax({
                url: baseurl + '<?php echo $class_uri ?>/post_add_edit_defective',
                data: formData,
                dataType: 'json',
                method: 'post',
                processData: false,
                contentType: false,
                success: function(data) {
                    check_submit_defective = 0;
                    page_loading("hide");
                    if (data.valid) {
                        show_success("show", 'Success', data.message, function() {
                            $(activeForm).closest('.modal').modal("hide");
                            activeForm.reset();

                            // Reset camera input sesuai form yang aktif
                            if (activeForm === defectiveForm) {
                                resetCameraInput_<?php echo $methodid ?>();
                            } else if (activeForm === repeatDefectForm) {
                                resetCameraInput_repeat_<?php echo $methodid ?>();
                            }


                        });
                    } else {
                        show_error("show", 'Error', data.message);
                    }
                },
                error: function(xhr, status, error) {
                    check_submit_defective = 0;
                    page_loading("hide");
                    show_error("show", xhr.status.toString() + ' ' + xhr.statusText, 'Please try again');
                }
            });
        }
    }

    $('#defectiveModal_<?php echo $methodid ?>').on('shown.bs.modal', function() {
        resetCameraInput_<?php echo $methodid ?>();
        var mainId = $("#form_<?php echo $methodid ?>_id").val();
        if (mainId && mainId !== '') {
            $("#defective_form_<?php echo $methodid ?>_task_assignment_id").val(mainId);
        }
    });

    // Reset saat repeat defect modal dibuka
    $('#repeatDefectModal_<?php echo $methodid ?>').on('shown.bs.modal', function() {
        resetCameraInput_repeat_<?php echo $methodid ?>();
        var mainId = $("#form_<?php echo $methodid ?>_id").val();
        if (mainId && mainId !== '') {
            $("#repeat_defect_form_<?php echo $methodid ?>_task_assignment_id").val(mainId);
        }
    });

    function pollData() {
        // Ambil task assignment ID dari form
        var taskId = $('#form_<?php echo $methodid ?>_id').val();

        // Kirim request ke server untuk mendapatkan data terbaru
        $.ajax({
            url: baseurl + '<?php echo $class_uri ?>/get_latest_counts',
            data: {
                task_assignment_id: taskId,
                timestamp: new Date().getTime() // Menambah parameter anti-cache
            },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    // Perbarui semua nilai di dashboard
                    updateDashboardValues(response.data);

                    // Hitung ulang ratio
                    calculateAndUpdateRatio();
                }
            },
            error: function(xhr, status, error) {
                console.error('Polling error:', error);
            },
            complete: function() {
                // Setel timeout untuk polling berikutnya (misal 5 detik)
                setTimeout(pollData, 5000);
            }
        });
    }

    // Fungsi untuk memperbarui nilai-nilai di dashboard
    function updateDashboardValues(data) {

        $('.indicator-rft').html(`${data.rft_total} <sub>(RFT)</sub>`);
        $('.indicator-defect').html(`${data.defect_total} <sub>(Defect)</sub>`);
        $('.indicator-reject').html(`${data.reject_total} <sub>(Reject)</sub>`);


        $('.card-value-defective').text(data.defect_card_1);






        $('.card-value-reject').text(data.reject_card_1);
        $('.card-value-reject-xs').text(data.reject_card_xs);
        $('.card-value-reject-s').text(data.reject_card_s);
        $('.card-value-reject-m').text(data.reject_card_m);
        $('.card-value-reject-l').text(data.reject_card_l);
        $('.card-value-reject-xl').text(data.reject_card_xl);
        $('.card-value-reject-xxl').text(data.reject_card_xxl);












        $('.card-value-rft').text(data.rft_card_1);
        $('.card-value-rft-xs').text(data.rft_card_xs);
        $('.card-value-rft-s').text(data.rft_card_s);
        $('.card-value-rft-m').text(data.rft_card_m);
        $('.card-value-rft-l').text(data.rft_card_l);
        $('.card-value-rft-xl').text(data.rft_card_xl);
        $('.card-value-rft-xxl').text(data.rft_card_xxl);

        $('.card-value-rft-2').text(data.rft_card_2);
        $('.card-value-rft-2-xs').text(data.rft_card_2_xs);
        $('.card-value-rft-2-s').text(data.rft_card_2_s);
        $('.card-value-rft-2-m').text(data.rft_card_2_m);
        $('.card-value-rft-2-l').text(data.rft_card_2_l);
        $('.card-value-rft-2-xl').text(data.rft_card_2_xl);
        $('.card-value-rft-2-xxl').text(data.rft_card_2_xxl);

        $('.card-value-defective-2').text(data.defect_card_2);



        $('.card-value-reject-2').text(data.reject_card_2);
        $('.card-value-reject-2-xs').text(data.reject_card_2_xs);
        $('.card-value-reject-2-s').text(data.reject_card_2_s);
        $('.card-value-reject-2-m').text(data.reject_card_2_m);
        $('.card-value-reject-2-l').text(data.reject_card_2_l);
        $('.card-value-reject-2-xl').text(data.reject_card_2_xl);
        $('.card-value-reject-2-xxl').text(data.reject_card_2_xxl);

        // nga update count

        $('.size-count-xs').text(data.size_xs);
        $('.size-count-s').text(data.size_s);
        $('.size-count-m').text(data.size_m);
        $('.size-count-l').text(data.size_l);
        $('.size-count-xl').text(data.size_xl);
        $('.size-count-xxl').text(data.size_xxl);



    }



    function openModal() {
        document.getElementById('productModal').style.display = 'flex';
        updateTime(); // Initial update
        setInterval(updateTime, 1000); // Update every second
    }

    // Close modal function
    function closeModal() {
        document.getElementById('productModal').style.display = 'none';
    }

    // Close modal when clicking outside
    window.onclick = function(event) {
        const modal = document.getElementById('productModal');
        if (event.target === modal) {
            closeModal();
        }
    }

    // Fungsi umum untuk reload semua jqGrid tables
    function reloadJqGridTables(methodId) {
        var gridId = '#table_' + methodId;

        // Reload grid
        $(gridId).trigger('reloadGrid');

        // Resize grid agar sesuai container
        setTimeout(function() {
            $(gridId).setGridWidth($('.grid_container_' + methodId).width() - 20, true).trigger('resize');
        }, 100);
    }







    function delete_rft_<?php echo $methodid ?>_rft_1(id) {

        if (check_submit == 0) {
            swal({
                title: "Confirm Cancel Request ?",
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

                    page_loading("show", 'Cancel Request', 'Please Wait...');
                    $.ajax({
                        url: baseurl + '<?php echo $class_uri ?>/delete_rft',
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
                                show_success("show", 'Cancel Request', data.message);
                                //$("#table_<?php echo $methodid ?>_keluarga").trigger('reloadGrid');
                                //cancel_keluarga_<?php echo $methodid ?>();

                                $("#table_<?php echo $methodid ?>_rft_1").trigger('reloadGrid');
                                $("#table_<?php echo $methodid ?>_rft_1").setGridWidth($('.grid_container_<?php echo $methodid; ?>_rft_1').width() - 20, true).trigger('resize');
                                $("#table_<?php echo $methodid ?>_rft_2").trigger('reloadGrid');
                                $("#table_<?php echo $methodid ?>_rft_2").setGridWidth($('.grid_container_<?php echo $methodid; ?>_rft_2').width() - 20, true).trigger('resize');

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

    function delete_defect_<?php echo $methodid ?>_defect_1(id) {

        if (check_submit == 0) {
            swal({
                title: "Confirm Cancel Request ?",
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

                    page_loading("show", 'Cancel Request', 'Please Wait...');
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
                                show_success("show", 'Cancel Request', data.message);
                                //$("#table_<?php echo $methodid ?>_keluarga").trigger('reloadGrid');
                                //cancel_keluarga_<?php echo $methodid ?>();

                                $("#table_<?php echo $methodid ?>_defect_1").trigger('reloadGrid');
                                $("#table_<?php echo $methodid ?>_defect_1").setGridWidth($('.grid_container_<?php echo $methodid; ?>_defect_1').width() - 20, true).trigger('resize');
                                $("#table_<?php echo $methodid ?>_defect_2").trigger('reloadGrid');
                                $("#table_<?php echo $methodid ?>_defect_2").setGridWidth($('.grid_container_<?php echo $methodid; ?>_defect_2').width() - 20, true).trigger('resize');

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

    function delete_reject_<?php echo $methodid ?>_reject_1(id) {

        if (check_submit == 0) {
            swal({
                title: "Confirm Cancel Request ?",
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

                    page_loading("show", 'Cancel Request', 'Please Wait...');
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
                                show_success("show", 'Cancel Request', data.message);
                                //$("#table_<?php echo $methodid ?>_keluarga").trigger('reloadGrid');
                                //cancel_keluarga_<?php echo $methodid ?>();

                                $("#table_<?php echo $methodid ?>_reject_1").trigger('reloadGrid');
                                $("#table_<?php echo $methodid ?>_reject_1").setGridWidth($('.grid_container_<?php echo $methodid; ?>_reject_1').width() - 20, true).trigger('resize');
                                $("#table_<?php echo $methodid ?>_reject_2").trigger('reloadGrid');
                                $("#table_<?php echo $methodid ?>_reject_2").setGridWidth($('.grid_container_<?php echo $methodid; ?>_reject_2').width() - 20, true).trigger('resize');

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
</script>