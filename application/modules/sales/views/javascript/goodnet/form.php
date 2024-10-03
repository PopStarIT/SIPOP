<script type="text/javascript">
    var new_goodnet = 1;
    var goodnet_id = 0;
    var goodnet_lock_data = 0;

    function edit_<?php echo $methodid ?>(id) {
        $.ajax({
            url: baseurl + 'loader',
            data: {
                '<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
                param: 'data_goodnet',
                param_pop: 'db_pop',
                id: id
            },
            dataType: 'json',
            method: 'post',
            success: function(data) {
                $('#form_<?php echo $methodid ?>_goodnet_id').val(data[0].goodnet_id);
                $('#form_<?php echo $methodid ?>_nama').val(data[0].nama);
                $('#form_<?php echo $methodid ?>_deskripsi').val(data[0].deskripsi);
                goodnet_id = id;
                goodnet_lock_data = data[0].lock_data;
                new_goodnet = 0;

                setTimeout(function() {
                    $('.tab_scrollbar').getNiceScroll().resize();
                }, 100);
            }
        });
    }

    function cancel_<?php echo $methodid ?>() {
        $('#panel_content_<?php echo $methodid ?>').show();
        $('#panel_content_form_<?php echo $methodid ?>').hide();
    }

    function save_<?php echo $methodid ?>() {
        $('#form_<?php echo $methodid ?>').submit();
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
                    page_loading("hide");
                    check_submit = 0;
                    if (data.valid) {
                        show_success("show", '<?php echo $page_title ?>', data.message);
                        $('#panel_content_<?php echo $methodid ?>').show();
                        $('#panel_content_form_<?php echo $methodid ?>').hide();
                        $('#form_<?php echo $methodid ?>_goodnet_id').val(data.goodnet_id);
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