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
                                        <div class="col-md-6 mb-3">

                                            <div id="panel_content_<?php echo $methodid ?>_defect">
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