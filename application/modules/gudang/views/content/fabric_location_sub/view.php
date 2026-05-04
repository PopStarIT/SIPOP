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
                                        <div class="row">



                                            <div class="col-md-6">

                                                <?php
                                                $extra_param_disposisi = array(
                                                    'methodid' => $methodid,
                                                    'extra_param' => array(
                                                        0 => array(
                                                            // Jqgrid akan mengambil value dari form_id ini saat reload
                                                            'field' => 'location_id',
                                                            'form_id' => 'form_location_' . $methodid . '_location_id'
                                                        )
                                                    )
                                                );

                                                $this->ecc_library->jqgrid2(
                                                    $methodid . "",
                                                    $dashboard_table['field'],
                                                    $dashboard_table['field_loaddata'],
                                                    $extra_param_disposisi
                                                );
                                                ?>
                                                <input type="hidden" id="form_location_<?php echo $methodid ?>_location_id" value="">
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

</div>