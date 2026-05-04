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

                                                <div class="">
                                                    <div class="form_base_<?php echo $methodid ?>_button_location">
                                                        <div class="form-group d-flex flex-wrap gap-2">
                                                            <button type="button" class="btn btn-outline-success" onclick="javascript:add_base_<?php echo $methodid ?>();">
                                                                <i class="fa fa-plus"></i> Add
                                                            </button>


                                                            <button type="button" class="btn btn-outline-warning ml-3" onclick="javascript:handleEdit_base_<?php echo $methodid ?>();">
                                                                <i class="fa fa-edit"></i> Edit
                                                            </button>

                                                            <button type="button" class="btn btn-outline-danger ml-3" onclick="javascript:delete_base_<?php echo $methodid ?>();">
                                                                <i class="fa fa-trash"></i> Delete
                                                            </button>
                                                            <button class="btn btn-outline-info  ml-3" onclick="javascript:print_barcode_base_<?php echo $methodid ?>();"><i class=" fa fa-print"></i>Cetak Barcode</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form_base_<?php echo $methodid ?>" style="display:none;">
                                                    <form class="ui grid ecc_form" id="form_base_<?php echo $methodid ?>" action="javascript:post_base_<?php echo $methodid ?>()">
                                                        <?php
                                                        $this->ecc_library->form('hidden', '', "form_base_" . $methodid, $this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
                                                        $this->ecc_library->form2('hidden', 'location base id', "form_base_" . $methodid, 'location_base_id', '', '', '');
                                                        ?>
                                                        <div class="col-xl-12">
                                                            <div class="row">
                                                                <div class="col-xl-3">
                                                                    <?php
                                                                    $this->ecc_library->form2('text', 'Location Base Code', "form_base_" . $methodid, 'location_base_code', '', '', '');
                                                                    ?>
                                                                </div>
                                                                <div class="col-xl-3">
                                                                    <?php
                                                                    $this->ecc_library->form2('text', 'Location Base Name', "form_base_" . $methodid, 'location_base_name', '', '', '');
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            &nbsp &nbsp
                                                            <button type="submit" class="btn btn-default">
                                                                <i class="fa fa-save"></i> Save
                                                            </button>
                                                            &nbsp &nbsp
                                                            <button type="button" class="btn btn-default" onclick="javascript:clear_<?php echo $methodid ?>();">
                                                                <i class="fa fa-undo"></i> clear
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>

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
                                                    $methodid . "_base",
                                                    $dashboard_table['field_base'],
                                                    $dashboard_table['field_base_loaddata'],
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