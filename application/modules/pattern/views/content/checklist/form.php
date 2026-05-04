<div class="row">
    <div class="col-xl-12">
        <div class="card card-statistics h-100">
            <div class="card-body" style="padding: 1.25rem !important">
                <h5 class="card-title form_title_<?php echo $methodid ?>"><?php echo $page_title ?></h5>
                <div class="tab tab-border">
                    <ul class="nav nav-tabs form_tab_<?php echo $methodid ?>" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active show" id="tab_<?php echo $methodid; ?>_header" data-toggle="tab" href="#content_<?php echo $methodid; ?>_header" role="tab" aria-controls="content_<?php echo $methodid; ?>_header" aria-selected="true">
                                Header
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="tab_<?php echo $methodid; ?>_detail" data-toggle="tab" href="#content_<?php echo $methodid; ?>_detail" role="tab" aria-controls="content_<?php echo $methodid; ?>_detail" aria-selected="true">
                                Detail
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab_custom_ecc tab-pane fade active show" id="content_<?php echo $methodid; ?>_header" role="tabpanel" aria-labelledby="tab_<?php echo $methodid; ?>_header">
                            <div class="row">
                                <div class="col-xl-12 mb-10 ml-10">
                                    <form class="ui grid ecc_form" id="form_<?php echo $methodid ?>" action="javascript:post_<?php echo $methodid ?>()">
                                        <?php
                                        $this->ecc_library->form('hidden', '', "form_" . $methodid, $this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
                                        $this->ecc_library->form('hidden', '', "form_" . $methodid, 'checklist_id', '');
                                        ?>

                                        <div class="row">
                                            <div class="card-body">

                                                <!-- <select name="list" id="list" class="form-control w-50" required>

                                                    <option value="" disabled selected>Data Style Tampil Disini</option>
                                                    <?php if (isset($field_spec) && is_array($field_spec)): ?>
                                                        <?php foreach ($field_spec as $row): ?>
                                                            <option value="<?php echo $row['value']; ?>"><?php echo $row['value']; ?></option>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </select> -->


                                                <div class="col-xl-8">
                                                    <?php
                                                    $this->ecc_library->form('select_pop', 'Style', "form_" . $methodid, 'list', '', '', 'data_pilih_list_style');
                                                    ?>
                                                    <?php
                                                    $this->ecc_library->form('hidden', 'status', "form_" . $methodid, 'status', '', '', '');
                                                    ?>
                                                </div>

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







                        <div class="tab_custom_ecc tab-pane fade" id="content_<?php echo $methodid; ?>_detail" role="tabpanel" aria-labelledby="tab_<?php echo $methodid; ?>_detail">
                            <div class="row panel_<?php echo $methodid ?>_detail">
                                <div class="col-xl-12">



                                    <div class="col-xl-12 mb-10 ml-10">
                                        <form class="ui grid ecc_form" id="form_detail_<?php echo $methodid ?>" action="javascript:post_add_edit_detail_<?php echo $methodid ?>()">
                                            <?php
                                            // CSRF token dan field hidden
                                            $this->ecc_library->form('hidden', '', "form_detail_" . $methodid, $this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
                                            $this->ecc_library->form('hidden', '', "form_detail_" . $methodid, 'checklist_detail_id', '');

                                            // Form fields
                                            ?>








                                            <div class="row">
                                                <div class="col-md-6">
                                                    <!-- Konten Div Kiri -->
                                                    <?php
                                                    $this->ecc_library->form('hidden', '', "form_detail_" . $methodid, 'checklist_id', '');
                                                    $this->ecc_library->form('readonly', 'PATTERN NAME', "form_detail_" . $methodid, 'item_code', '');
                                                    $this->ecc_library->form('readonly', 'VARIANT NAME', "form_detail_" . $methodid, 'item_name', '');

                                                    $this->ecc_library->form('select_pop', 'Size', "form_detail_" . $methodid . '', 'size_id', '', '', 'size');

                                                    $this->ecc_library->form('text', 'COMMENT', "form_detail_" . $methodid, 'comment', '', '', '');


                                                    $this->ecc_library->form('date', 'Tanggal Di Buat', "form_detail_" . $methodid, 'tgl_buat', '', '', '');





                                                    ?>


                                                </div>
                                                <div class="col-md-6">
                                                    <!-- Konten Div Kanan -->

                                                    <div class="col-xl-12">
                                                        <h6>CHECKLIST PATTERN & MARKER</h6>
                                                        <h5>LIST CHECKING</h5>
                                                    </div>






                                                    <?php if (!empty($master_lists)): ?>
                                                        <ul class="list-group">
                                                            <?php foreach ($master_lists as $detail): ?>
                                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                    <div class="d-flex align-items-center w-100">

                                                                        <div
                                                                            class="table-responsive">
                                                                            <table
                                                                                class="table">

                                                                                <tbody>
                                                                                    <tr class="">

                                                                                        <td> <?php
                                                                                                // Hidden field for master_list_id
                                                                                                echo $this->ecc_library->form('hidden', '', "form_detail_" . $methodid, 'master_list_id[]', htmlspecialchars($detail['list_id']), '', '');
                                                                                                ?> <label class="mb-0 mr-3"><?php echo htmlspecialchars($detail['name']); ?></label></td>
                                                                                        <td><input type="checkbox" name="check_status[<?php echo htmlspecialchars($detail['list_id']); ?>]" value="yes" class="mr-3 list_id list_id_<?php echo htmlspecialchars($detail['list_id']); ?>" /><?php if ($detail['list_id'] == '23'): // Only show for ACCECORIS 
                                                                                                                                                                                                                                                                                            ?>
                                                                                                <button type="button" class="btn btn-primary btn-sm" onclick="addSubChecklist(this, <?php echo htmlspecialchars($detail['list_id']); ?>)">
                                                                                                    Add Sub List
                                                                                                </button>
                                                                                                <div class="sub-checklist-container ml-3" style="width: 100%;"></div>
                                                                                            <?php endif; ?>
                                                                                        </td>
                                                                                    </tr>

                                                                                </tbody>
                                                                            </table>
                                                                        </div>





                                                                    </div>
                                                                </li>
                                                                <?php if ($detail['list_id'] == '23'): // Container for ACCECORIS sub-items 
                                                                ?>
                                                                    <div id="subChecklist_<?php echo htmlspecialchars($detail['list_id']); ?>" class="ml-4">
                                                                        <!-- Sub-checklist items will be added here -->
                                                                    </div>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    <?php else: ?>
                                                        <p>No checklist details found.</p>
                                                    <?php endif; ?>












                                                </div>
                                            </div>














                                            <!-- Display checklist details -->
                                            <div class="row">



                                                <!-- Add button for "Add Check Sub" -->


                                                <!-- Container for dynamic select elements -->
                                                <div id="dynamicSelectContainer"></div>
                                            </div>

                                            <div class="col-xl-3">
                                                <label> &nbsp </label>

                                                <table class="">

                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="input-group">

                                                                    <div class="button_<?php echo $methodid ?>" onclick="javascript:save_detail_<?php echo $methodid ?>()">
                                                                        <button type="submit" class="btn btn-outline-success">
                                                                            <i class="fa fa-check"></i> SAVE DETAIL
                                                                        </button>
                                                                    </div>

                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="input-group">

                                                                    <div class="button_cancel_<?php echo $methodid ?>" onclick="javascript:cancel_detail_<?php echo $methodid ?>()">
                                                                        <button type="button" class="btn-outline-danger">
                                                                            <i class="fa fa-check"></i> CANCEL
                                                                        </button>
                                                                    </div>

                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>




                                            </div>
                                        </form>
                                    </div>









                                </div>
                            </div>

                            <div class="row panel_<?php echo $methodid ?>_panel_purchase_request mb-10">
                                <div class="col-xl-12">
                                    <?php

                                    ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-12">
                                    <?php

                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <style>
        .sub-checklist-item {
            margin-left: 10px;
            margin-bottom: 5px;
        }

        .sub-checklist-container {
            margin-top: 10px;
        }
    </style>