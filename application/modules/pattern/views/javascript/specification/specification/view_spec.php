<?php $this->load->view($path_template . '/library/javascript/dashboard_table2');
?>
<script type="text/javascript">
    function simpan_<?php echo $methodid ?>_group_category() {
        category_name = $('#form_<?php echo $methodid ?>_new_style').val();
        if (category_name != '') {
            //alert(category_name);
            page_loading("show", 'Save <?php echo $page_title ?>', 'Please Wait...');
            //var data = $("#form_<?php echo $methodid ?>").serialize();
            //	console.log(data);
            $.ajax({
                url: baseurl + '<?php echo $class_uri ?>/add_spec_category',
                data: {
                    '<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
                    category_name: category_name
                },
                dataType: 'json',
                method: 'post',
                success: function(data) {
                    page_loading("hide");
                    if (data.valid) {
                        show_success("show", '<?php echo $page_title ?>', data.message);
                        $('#form_<?php echo $methodid ?>_new_style').val('');
                    } else {
                        show_success("show", '<?php echo $page_title ?>', data.message);
                    }

                },
                error: function(xhr, error) {
                    show_error("show", xhr.status.toString() + ' ' + xhr.statusText, 'Please try again process');
                    //check_submit = 0;
                }
            });



        } else {
            //alert("kosong");
            show_error("show", 'Error', "Name category is null !");
        }

    }

    function post_<?php echo $methodid ?>_edit() {
        // page_loading("show",'Save <?php echo $page_title ?>','Please Wait...');
        var data = $("#form_<?php echo $methodid ?>_template_spec").serialize();
        $.ajax({
            url: baseurl + '<?php echo $class_uri ?>/post_add_edit_spec',
            data: data,
            dataType: 'json',
            method: 'post',
            success: function(data) {
                page_loading("hide");
                if (data.valid) {
                    show_success("show", '<?php echo $page_title ?>', data.message);
                    $('#form_<?php echo $methodid ?>_new_style').val('');
                } else {
                    show_success("show", '<?php echo $page_title ?>', data.message);
                }
            },
            error: function(xhr, error) {
                show_error("show", xhr.status.toString() + ' ' + xhr.statusText, 'Please try again process');
                //check_submit = 0;
            }

        });
        //  page_loading("hide");
        //  alert("masuk");
        //  console.log(data);
        $('#m_new_category').modal('hide');
        $("#table_<?php echo $methodid ?>_spec_category").trigger('reloadGrid');
    }
</script>