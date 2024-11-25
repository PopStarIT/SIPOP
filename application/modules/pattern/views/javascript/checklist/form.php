<script type="text/javascript">
    var new_checklist = 1;
    var checklist_id = 0;
    var checklist_lock_data = 0;

    function edit_<?php echo $methodid ?>(id) {
        $.ajax({
            url: baseurl + 'loader',
            data: {
                '<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
                param: 'data_checklist',
                param_pop: 'db_pop',
                id: id
            },
            dataType: 'json',
            method: 'post',
            success: function(data) {
                $('#form_<?php echo $methodid ?>_checklist_id').val(data[0].checklist_id);
                $('#form_<?php echo $methodid ?>_list').val(data[0].list);

                checklist_id = id;
                checklist_lock_data = data[0].lock_data;
                new_checklist = 0;

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

    var checklist_submit = 0;

    function post_<?php echo $methodid ?>() {
        if (checklist_submit == 0) {
            checklist_submit = 1;
            page_loading("show", '<?php echo $page_title ?>', 'Please Wait...');
            var data = $("#form_<?php echo $methodid ?>").serialize();
            $.ajax({
                url: baseurl + '<?php echo $class_uri ?>/post_add_edit',
                data: data,
                dataType: 'json',
                method: 'post',
                success: function(data) {
                    page_loading("hide");
                    checklist_submit = 0;
                    if (data.valid) {
                        show_success("show", '<?php echo $page_title ?>', data.message);
                        $('#panel_content_<?php echo $methodid ?>').show();
                        $('#panel_content_form_<?php echo $methodid ?>').hide();
                        $('#form_<?php echo $methodid ?>_checklist_id').val(data.checklist_id);
                    } else {
                        show_error("show", 'Error', data.message);
                    }
                },
                error: function(xhr, error) {
                    show_error("show", xhr.status.toString() + ' ' + xhr.statusText, 'Please try again');
                    checklist_submit = 0;
                }
            });
        }
    }
</script>