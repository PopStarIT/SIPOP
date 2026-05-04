<div class="row">
    <div class="col-xl-12">
        <div class="card card-statistics h-100">
            <div class="card-body" style="padding: 1.25rem !important">

                <div class="tab tab-border">
                    <ul class="nav nav-tabs form_tab_<?php echo $methodid ?>" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="tab_<?php echo $methodid; ?>" data-toggle="tab" href="#content_<?php echo $methodid; ?>" role="tab" aria-controls="content_<?php echo $methodid; ?>" aria-selected="true">
                                Header
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab_<?php echo $methodid; ?>_assign" data-toggle="tab" href="#content_<?php echo $methodid; ?>_assign" role="tab" aria-controls="content_<?php echo $methodid; ?>_assign" aria-selected="false">
                                Assign To Line
                            </a>
                        </li>


                    </ul>

                    <div class="tab-content">

                        <div class="tab_custom_ecc tab-pane fade show active" id="content_<?php echo $methodid; ?>" role="tabpanel" aria-labelledby="tab_<?php echo $methodid; ?>">
                            <div class="row">
                                <div class="col-xl-12 mb-10 ml-10">
                                    <form class="ui grid ecc_form" id="form_<?php echo $methodid ?>" action="javascript:post_<?php echo $methodid ?>()">
                                        <?php
                                        $this->ecc_library->form('hidden', '', "form_" . $methodid, $this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
                                        $this->ecc_library->form('hidden', '', "form_" . $methodid, 'id', '');
                                        ?>

                                        <div class="row">
                                            <div class="col-xl-4">
                                                <?php

                                                $this->ecc_library->form('select_pop', 'Style No', "form_" . $methodid, 'style_id', '', '', 'list_style_no_task_assignment');




                                                ?>

                                                <div class="form-group">
                                                    <div style="display: flex; align-items: center; gap: 5px;">
                                                        <?php
                                                        echo $this->ecc_library->form('number', 'Target Output', "form_" . $methodid, 'target_output', '', 'required', false);
                                                        ?>
                                                        <span>/ 60 min</span>
                                                    </div>
                                                </div>
                                                <?php
                                                $this->ecc_library->form('number', 'Order Qty', "form_" . $methodid, 'order_qty', '', 'required');
                                                $this->ecc_library->form('date', 'Created Date', "form_" . $methodid, 'created_date', '', 'required');
                                                ?>

                                            </div>
                                        </div>
                                    </form>

                                    <div class="ui grid form">
                                        <div class="row field">
                                            <div class="twelve wide column">
                                                <button type="button" class="btn btn-success" onclick="save_<?php echo $methodid ?>()">
                                                    <i class="fa fa-save"></i> Save Header
                                                </button>
                                                <button type="button" class="btn btn-info" onclick="cancel_<?php echo $methodid ?>()">
                                                    <i class="fa fa-arrow-left"></i> Back
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab_custom_ecc tab-pane fade show" id="content_<?php echo $methodid; ?>_assign" role="tabpanel" aria-labelledby="tab_<?php echo $methodid; ?>_assign">
                            <div class="row">
                                <div class="col-xl-12 mb-10 ml-10">
                                    <form class="ui grid ecc_form" id="form_assign_<?php echo $methodid ?>" action="javascript:post_<?php echo $methodid ?>_assign()">
                                        <?php
                                        $this->ecc_library->form('hidden', '', "form_assign_" . $methodid, $this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
                                        $this->ecc_library->form('hidden', '', "form_assign_" . $methodid, 'id', '');
                                        $this->ecc_library->form('hidden', '', "form_assign_" . $methodid, 'header_id', '');
                                        ?>

                                        <div class="row">
                                            <div class="col-xl-4">
                                                <?php
                                                echo $this->ecc_library->form('hidden', 'Style', "form_assign_" . $methodid, 'style_id', 'readonly', 'readonly', false);
                                                $this->ecc_library->form('select_pop', 'Line', "form_assign_" . $methodid, 'line_id', '', 'readonly', 'list_pilih_line_task_assignment');
                                                ?>

                                                <div class="form-group">
                                                    <div style="display: flex; align-items: center; gap: 5px;">
                                                        <?php
                                                        echo $this->ecc_library->form('hidden', 'Target Output', "form_assign_" . $methodid, 'target_output', '', 'readonly', false);
                                                        ?>

                                                    </div>
                                                </div>
                                                <?php
                                                $this->ecc_library->form('hidden', 'Order Qty', "form_assign_" . $methodid, 'order_qty', '', 'readonly');
                                                $this->ecc_library->form('hidden', 'Created Date', "form_assign_" . $methodid, 'created_date', '', 'readonly');
                                                ?>
                                            </div>
                                        </div>
                                    </form>

                                    <div class="ui grid form">
                                        <div class="row field">
                                            <div class="twelve wide column">
                                                <button type="button" class="btn btn-success" onclick="save_<?php echo $methodid ?>_assign()">
                                                    <i class="fa fa-save"></i> Save Assign
                                                </button>
                                                <button type="button" class="btn btn-info" onclick="cancel_<?php echo $methodid ?>_assign()">
                                                    <i class="fa fa-arrow-left"></i> Back
                                                </button>
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
</div>
</div>