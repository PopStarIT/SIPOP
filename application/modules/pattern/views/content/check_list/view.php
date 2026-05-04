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
                                            <?php echo 'List Pattern & Marker' ?>
                                        </h5>
                                    </div>

                                    <div class="container" id="panel_content_<?php echo $methodid ?>">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Konten Div Kiri -->
                                                <div id="panel_content_<?php echo $methodid ?>">
                                                    <?php $this->load->view($path_template . '/library/content/dashboard_table2'); ?>



                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Konten Div Kanan -->
                                                <div class="p-3 border bg-light">

                                                    <?php
                                                    $extra_param = array('methodid' => $methodid, 'extra_param' => array(0 => array('field' => 'style_spec_header_id', 'form_id' => 'form_detail_' . $methodid . '_trims_style_spec_header_id')));
                                                    $this->ecc_library->jqgrid($methodid . "_marker", $dashboard_table['field_sub'], $dashboard_table['field_sub_loaddata'], $extra_param);
                                                    ?>
                                                </div>


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