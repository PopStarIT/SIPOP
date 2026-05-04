<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12">
                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <?php echo $page_title ?>
                                        </h5>
                                    </div>

                                    <div id="panel_content_<?php echo $methodid ?>">
                                        <?php $this->load->view($path_template . '/library/content/dashboard_table2'); ?>
                                    </div>

                                    <div id="panel_content_form_<?php echo $methodid ?>" style="display:none">
                                        <?php
                                        if (isset($view_load_form)) {
                                            $this->load->view('content/' . $view_load_form);
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <table id="goodnet_table" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Goodnet ID</th>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($goodnets as $row) : ?>
            <tr>
                <td><?php echo $row['goodnet_id']; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['deskripsi']; ?></td>
                <td>
                    <!-- Tombol Edit -->
    <button class="btn btn-info" onclick="edit_goodnet('<?php echo $row['goodnet_id']; ?>')">Edit</button>
    </td>
    </tr>
<?php endforeach; ?>
</tbody>
</table> -->

<!-- <script>
    // Fungsi untuk navigasi ke halaman edit
    function edit_goodnet(goodnet_id) {
        window.location.href = "<?php echo site_url('goodnet/edit/'); ?>" + goodnet_id;
    }
</script> -->

<div id="panel_print_<?php echo $methodid ?>" style="display:none"></div>

<form id="form_<?php echo $methodid ?>_print" action="<?php echo base_url() . $class_uri ?>/loaddata" method="POST" target="panel_print_<?php echo $methodid ?>" style="display:none">
    <input type="hidden" id="form_<?php echo $methodid ?>_print_csrf" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>" />
    <input type="hidden" id="form_<?php echo $methodid ?>_print_format" name="format" value="" />
    <input type="hidden" id="form_<?php echo $methodid ?>_print_print" name="print" value="1" />
</form>
</div>