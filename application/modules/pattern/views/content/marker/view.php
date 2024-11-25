<style>
    .modal-body {
        overflow-y: auto;
        /* Memungkinkan scroll vertikal */
        max-height: 500px;
        /* Atur tinggi maksimum untuk modal */
    }
</style>
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

                                    <div class="container" id="panel_content_<?php echo $methodid ?>">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Konten Div Kiri -->
                                                <div class="p-3 border bg-light">
                                                    <?php $this->load->view($path_template . '/library/content/dashboard_table2'); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Konten Div Kanan -->
                                                <div class="p-3 border bg-light">
                                                    <div class="form-group">
                                                        <label for="checklistSelect">Pilih Style Of Checklist :</label>
                                                        <select id="checklistSelect" class="form-control">
                                                            <option value="" disabled>Pilih Style Of Checklist :</option>
                                                        </select>
                                                    </div>
                                                    <!-- Modal untuk menampilkan detail checklist -->
                                                    <div class="modal fade" id="checklistModal" tabindex="-1" role="dialog" aria-labelledby="checklistModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="checklistModalLabel">Detail Checklist</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body d-flex flex-column" id="modalContent" style="overflow-y: auto; max-height: 500px;">
                                                                    <!-- Konten modal akan dimuat di sini -->
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <script type="text/javascript">
                                                        $(document).ready(function() {
                                                            // Ambil checklist IDs dan nama list
                                                            $.ajax({
                                                                url: "<?php echo base_url('pattern/marker/get_checklist_with_list'); ?>",
                                                                method: "GET",
                                                                dataType: "json",
                                                                success: function(data) {
                                                                    $.each(data, function(index, value) {
                                                                        // Hanya tampilkan nama list, tapi simpan checklist_id sebagai value
                                                                        $('#checklistSelect').append('<option value="' + value.id + '">' + value.text.split(' - ')[1] + '</option>');
                                                                    });
                                                                },
                                                                error: function(xhr, status, error) {
                                                                    console.error("Error fetching checklist IDs: ", error);
                                                                }
                                                            });

                                                            // Event listener untuk dropdown
                                                            $('#checklistSelect').change(function() {
                                                                var checklistId = $(this).val();
                                                                if (checklistId) {
                                                                    // Ambil semua data checklist berdasarkan ID yang dipilih
                                                                    $.ajax({
                                                                        url: "<?php echo base_url('pattern/marker/show_checklist_id'); ?>",
                                                                        method: "GET",
                                                                        data: {
                                                                            checklist_id: checklistId
                                                                        },
                                                                        dataType: "json",
                                                                        success: function(data) {
                                                                            // Temporary object to hold unique entries
                                                                            var uniqueEntries = {};
                                                                            var content = '<table class="table table-bordered"><thead><tr><th>CHECKLIST PATTERN & NAME</th><th>Comment</th><th>Pattern Name</th><th>Variant Name</th><th>Size</th><th>Date Created</th><th>Status</th></tr></thead><tbody>';

                                                                            $.each(data, function(index, item) {
                                                                                var key = item.comment + '|' + item.pattern_name + '|' + item.variant_name + '|' + item.size + '|' + item.tgl_buat;

                                                                                // Check if the key already exists
                                                                                if (!uniqueEntries[key]) {
                                                                                    uniqueEntries[key] = true; // Mark this combination as seen
                                                                                    content += '<tr>';

                                                                                    content += '<td>' + item.master_list_name + '</td>';

                                                                                    content += '<td>' + item.comment + '</td>';
                                                                                    content += '<td>' + item.pattern_name + '</td>';
                                                                                    content += '<td>' + item.variant_name + '</td>';
                                                                                    content += '<td>' + item.size + '</td>';
                                                                                    content += '<td>' + item.tgl_buat + '</td>';
                                                                                    content += '<td>' + item.check_status + '</td>';
                                                                                    content += '</tr>';
                                                                                } else {
                                                                                    // If it exists, just add the master_list_id and check_status
                                                                                    content += '<tr>';

                                                                                    content += '<td>' + item.master_list_name + '</td>'; // Display the master list name

                                                                                    content += '<td></td>'; // Empty cell for duplicate entries
                                                                                    content += '<td></td>'; // Empty cell for duplicate entries
                                                                                    content += '<td></td>'; // Empty cell for duplicate entries
                                                                                    content += '<td></td>'; // Empty cell for duplicate entries
                                                                                    content += '<td></td>'; // Empty cell for duplicate entries
                                                                                    content += '<td>' + item.check_status + '</td>';
                                                                                    content += '</tr>';
                                                                                }
                                                                            });
                                                                            content += '</tbody></table>';
                                                                            $('#modalContent').html(content);
                                                                            $('#checklistModal').modal('show'); // Tampilkan modal
                                                                        },
                                                                        error: function(xhr, status, error) {
                                                                            console.error("Error fetching checklist details: ", error);
                                                                        }
                                                                    });
                                                                }
                                                            });
                                                        });
                                                    </script>



                                                </div>
                                            </div>
                                        </div>
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

    <div id="panel_print_<?php echo $methodid ?>" style="display:none"></div>

    <form id="form_<?php echo $methodid ?>_print" action="<?php echo base_url() . $class_uri ?>/loaddata" method="POST" target="panel_print_<?php echo $methodid ?>" style="display:none">
        <input type="hidden" id="form_<?php echo $methodid ?>_print_csrf" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>" />
        <input type="hidden" id="form_<?php echo $methodid ?>_print_format" name="format" value="" />
        <input type="hidden" id="form_<?php echo $methodid ?>_print_print" name="print" value="1" />
    </form>
</div>

<!-- JqGrid CSS -->
<link rel="stylesheet" href="<?php echo base_url('assets/template/plugin/jqgrid/ui.jqgrid.min.css'); ?>">

<!-- jQuery dan jqGrid JavaScript -->
<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/template/plugin/jqgrid/jquery.jqgrid.min.js'); ?>"></script>