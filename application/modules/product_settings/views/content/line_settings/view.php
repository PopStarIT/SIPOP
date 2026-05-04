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


                                    <div class="col-md-12">
                                        <!-- Konten Div Kanan -->
                                        <div class="p-3 border bg-light">
                                            <div id="panel_content_<?php echo $methodid ?>">
                                                <?php
                                                $extra_param = array(
                                                    'methodid' => $methodid,
                                                    'extra_param' => array(
                                                        0 => array(
                                                            'field' => 'ini_item_base_id',
                                                            'form_id' => 'form_' . $methodid . "_id"
                                                        )
                                                    )
                                                );
                                                $this->ecc_library->jqgrid($methodid . "", $dashboard_table['field'], $dashboard_table['field_loaddata'], $extra_param);
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






<!-- Modal Form -->
<div class="modal fade" id="modal_shift_<?php echo $methodid ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Shift Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class="ui grid ecc_form" id="form_shift_modal_<?php echo $methodid ?>" action=" javascript:post_<?php echo $methodid ?>()">
                    <div class="col-xl-12">
                        <div class="form-group">


                            <?php
                            $this->ecc_library->form('hidden', '', "form_" . $methodid . "", $this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
                            $this->ecc_library->form('hidden', 'detail item base id', "form_" . $methodid . "", 'master_line_id', '', '', '');


                            ?>
                            <div class="form-group">
                                <label for="form_<?php echo $methodid ?>_id">Line ID</label>
                                <input type="text" class="form-control" id="form_<?php echo $methodid ?>_id" name="line_id" value="">
                            </div>
                            <div class="form-group">
                                <label for="form_<?php echo $methodid ?>_id">Shift</label>
                                <select class="form-control" id="form_<?php echo $methodid ?>_shift" name="shift">
                                    <option value="1">Reguler</option>
                                    <option value="2">Sabtu</option>
                                </select>
                            </div>
                        </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="save_<?php echo $methodid ?>()">Save changes</button>
            </div>
        </div>
    </div>
</div>