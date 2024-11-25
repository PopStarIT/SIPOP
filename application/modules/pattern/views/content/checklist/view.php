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
                                            <?php echo 'Checklist Pattern & Marker' ?>
                                        </h5>
                                    </div>

                                    <div id="panel_content_<?php echo $methodid ?>">
                                        <?php $this->load->view($path_template . '/library/content/dashboard_table2'); ?>
                                    </div>

                                    <div class="modal fade" id="modal-id5">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Checklist Pattern & Maker</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="text" id="checklist_id_input" placeholder="Checklist ID" readonly>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
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