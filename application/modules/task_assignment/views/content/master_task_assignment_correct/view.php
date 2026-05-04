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


                                    <div id="panel_content_form_<?php echo $methodid ?>" style="display:none">
                                        <?php
                                        if (isset($view_load_form)) {
                                            $this->load->view('content/' . $view_load_form);
                                        }
                                        ?>
                                    </div>



                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div id="panel_content_<?php echo $methodid ?>">
                                                <h5>Data RFT</h5>
                                                <?php
                                                $extra_param = array(
                                                    'methodid' => $methodid,
                                                    'extra_param' => array(
                                                        0 => array(
                                                            'field' => 'id',
                                                            'form_id' => 'form_' . $methodid . "_id"
                                                        )
                                                    )
                                                );

                                                $this->ecc_library->jqgrid($methodid . "", $dashboard_table['field'], $dashboard_table['field_loaddata'], $extra_param);
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div id="panel_content_<?php echo $methodid ?>_reject">
                                                <h5>Data Reject</h5>
                                                <?php
                                                $extra_param = array(
                                                    'methodid' => $methodid,
                                                    'extra_param' => array(
                                                        0 => array(
                                                            'field' => 'id',
                                                            'form_id' => 'form_' . $methodid . "_id"
                                                        )
                                                    )
                                                );

                                                $this->ecc_library->jqgrid($methodid . "_reject", $dashboard_table['field_reject'], $dashboard_table['field_loaddata_reject'], $extra_param);
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-9 mb-3">
                                            <div id="panel_content_<?php echo $methodid ?>">
                                                <h5>Data Defect</h5>
                                                <?php
                                                $extra_param = array(
                                                    'methodid' => $methodid,
                                                    'extra_param' => array(
                                                        0 => array(
                                                            'field' => 'id',
                                                            'form_id' => 'form_' . $methodid . "_id"
                                                        )
                                                    )
                                                );

                                                $this->ecc_library->jqgrid($methodid . "_defect", $dashboard_table['field_defect'], $dashboard_table['field_loaddata_defect'], $extra_param);
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
        </div>
    </div>

    <div id="panel_print_<?php echo $methodid ?>" style="display:none"></div>

    <form id="form_<?php echo $methodid ?>_print" action="<?php echo base_url() . $class_uri ?>/loaddata" method="POST" target="panel_print_<?php echo $methodid ?>" style="display:none">
        <input type="hidden" id="form_<?php echo $methodid ?>_print_csrf" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>" />
        <input type="hidden" id="form_<?php echo $methodid ?>_print_format" name="format" value="" />
        <input type="hidden" id="form_<?php echo $methodid ?>_print_print" name="print" value="1" />
    </form>
</div>





<div class="modal fade" id="dataCardModal_<?php echo $methodid ?>" tabindex="-1" role="dialog" aria-labelledby="dataCardModalLabel_<?php echo $methodid ?>" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="dataCardModalLabel_<?php echo $methodid ?>">Input Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!-- Responsive: 2 columns on md+, 1 column on xs/sm -->
                <div class="row">
                    <!-- Left: Form -->
                    <div class="col-12 col-md-6 mb-3 mb-md-0">
                        <form id="modal_form_<?php echo $methodid ?>" action="javascript:post_rft_<?php echo $methodid ?>()">
                            <?php
                            $this->ecc_library->form('hidden', '', "modal_form_" . $methodid, $this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
                            $this->ecc_library->form('hidden', '', "modal_form_" . $methodid, 'id', '');
                            ?>
                            <div class="form-group">
                                <?php
                                $this->ecc_library->form('hidden', '', "modal_form_" . $methodid, 'task_assignment_id', '');


                                ?>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <?php
                                    $this->ecc_library->form('select_pop', 'SIZE', "modal_form_" . $methodid . "", 'rft_size_id', '', '', 'size');
                                    ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <?php
                                    $this->ecc_library->form('select_pop', 'COLOUR', "modal_form_" . $methodid . "", 'rft_colour_id', '', '', 'fabric_colour');

                                    $this->ecc_library->form('date', 'Created At', "modal_form_" . $methodid, 'created_at', '');
                                    ?>
                                    <div class="form-group">
                                        <label for="modal_form_<?php echo $methodid ?>_rft_status">Status</label>
                                        <select
                                            name="rft_status"
                                            id="modal_form_<?php echo $methodid ?>_rft_status"
                                            class="form-control">
                                            <option value="1">RFT</option>
                                            <option value="2">RECTIFIED</option>
                                        </select>
                                    </div>
                                </div>


                            </div>
                        </form>
                    </div>
                    <!-- Right: Numpad -->

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary rounded-circle d-flex align-items-center justify-content-center" style="width:48px;height:48px;padding:0;" data-dismiss="modal" title="Close">
                    <i class="fa fa-times" style="margin:0;"></i>
                </button>
                <button type="button" class="btn btn-info rounded-circle d-flex align-items-center justify-content-center" style="width:48px;height:48px;padding:0;" onclick="post_rft_<?php echo $methodid ?>()">
                    <i class="fa fa-check" style="margin:0;"></i>
                </button>
            </div>

        </div>
    </div>
</div>


<div class="modal fade" id="defectModal_<?php echo $methodid ?>" role="dialog" aria-labelledby="defectModalLabel_<?php echo $methodid ?>">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="defectModalLabel_<?php echo $methodid ?>">Edit Defect Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="defect_modal_form_<?php echo $methodid ?>" action="javascript:post_defect_<?php echo $methodid ?>()" enctype="multipart/form-data" method="post">
                    <?php
                    $this->ecc_library->form('hidden', '', "defect_modal_form_" . $methodid, $this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
                    $this->ecc_library->form('hidden', '', "defect_modal_form_" . $methodid, 'id', '');
                    $this->ecc_library->form('hidden', '', "defect_modal_form_" . $methodid, 'task_assignment_id', '');
                    ?>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <?php
                            $this->ecc_library->form('select_pop', 'Causes of Defect', "defect_modal_form_" . $methodid, 'defect_cause_id', '', '', 'defect_cause');
                            ?>
                        </div>
                        <div class="form-group col-md-6">
                            <?php
                            $this->ecc_library->form('select_pop', 'Parts of Defect', "defect_modal_form_" . $methodid, 'defect_parts_id', '', '', 'defect_parts');
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <?php
                        $this->ecc_library->form('text', 'RFID No', "defect_modal_form_" . $methodid, 'rfid_no', '', 'required', '');
                        $this->ecc_library->form('hidden', 'status', "defect_modal_form_" . $methodid, 'defect_status', '');
                        $this->ecc_library->form('file', 'Nama Image file', "defect_modal_form_" . $methodid, 'image', '');
                        $this->ecc_library->form('hidden', '', "defect_modal_form_" . $methodid, 'old_image', '');
                        ?>
                        <!-- <div class="form-group">
                            <label for="defect_modal_form_<?php echo $methodid; ?>_image">Image File</label>
                            <input
                                type="file"
                                name="image"
                                id="defect_modal_form_<?php echo $methodid; ?>_image"
                                class="form-control"
                                accept="image/*"
                                capture="environment">
                        </div> -->
                        <div class="form-group">
                            <label for="defect_modal_form_<?php echo $methodid ?>defect_status">Status</label>
                            <select
                                name="defect_status"
                                id="defect_modal_form_<?php echo $methodid ?>defect_status"
                                class="form-control">
                                <option value="1">DEFECT</option>
                                <option value="2">REPEAT DEFECT</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="imagePreview">Image Preview:</label>
                        <img id="imagePreview_<?php echo $methodid ?>" src="" alt="Image Preview" style="max-width: 200px; max-height: 200px; border: 1px solid #ddd; padding: 5px;">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary rounded-circle d-flex align-items-center justify-content-center" style="width:48px;height:48px;padding:0;" data-dismiss="modal" title="Close">
                    <i class="fa fa-times" style="margin:0;"></i>
                </button>
                <button type="button" class="btn btn-info rounded-circle d-flex align-items-center justify-content-center" style="width:48px;height:48px;padding:0;" onclick="post_defect_<?php echo $methodid ?>()">
                    <i class="fa fa-check" style="margin:0;"></i>
                </button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="rejectModal_<?php echo $methodid ?>" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel_<?php echo $methodid ?>" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rejectModalLabel_<?php echo $methodid ?>">Edit Reject Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="reject_modal_form_<?php echo $methodid ?>">
                    <?php
                    $this->ecc_library->form('hidden', '', "reject_modal_form_" . $methodid, $this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
                    $this->ecc_library->form('hidden', '', "reject_modal_form_" . $methodid, 'id', '');
                    ?>
                    <div class="form-group">
                        <?php
                        $this->ecc_library->form('hidden', '', "reject_modal_form_" . $methodid, 'task_assignment_id', '');
                        ?>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <?php
                            $this->ecc_library->form('select_pop', 'SIZE', "reject_modal_form_" . $methodid, 'reject_size_id', '', '', 'size');
                            ?>
                        </div>
                        <div class="form-group col-md-6">
                            <?php
                            $this->ecc_library->form('select_pop', 'COLOUR', "reject_modal_form_" . $methodid, 'reject_colour_id', '', '', 'fabric_colour');
                      
                            $this->ecc_library->form('date', 'Created At', "reject_modal_form_" . $methodid, 'created_at', '');
                            ?>
                            <label for="reject_modal_form_<?php echo $methodid ?>reject_status">Status</label>
                            <select
                                name="reject_status"
                                id="reject_modal_form_<?php echo $methodid ?>reject_status"
                                class="form-control">
                                <option value="1">REJECT</option>
                                <option value="2">REWORK REJECT</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary rounded-circle d-flex align-items-center justify-content-center" style="width:48px;height:48px;padding:0;" data-dismiss="modal" title="Close">
                    <i class="fa fa-times" style="margin:0;"></i>
                </button>
                <button type="button" class="btn btn-info rounded-circle d-flex align-items-center justify-content-center" style="width:48px;height:48px;padding:0;" onclick="post_reject_<?php echo $methodid ?>()">
                    <i class="fa fa-check" style="margin:0;"></i>
                </button>
            </div>
        </div>
    </div>
</div>