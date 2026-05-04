<div class="row">
    <div class="col-xl-12">
        <div class="card card-statistics h-100">
            <div class="card-body" style="padding: 1.25rem !important">
                <h5 class="card-title form_title_<?php echo $methodid ?>"><?php echo $page_title ?></h5>
                <div class="tab tab-border">
                    <ul class="nav nav-tabs form_tab_<?php echo $methodid ?>" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="tab_<?php echo $methodid; ?>_header" data-toggle="tab" href="#content_<?php echo $methodid; ?>_header" role="tab" aria-controls="content_<?php echo $methodid; ?>_header" aria-selected="true">
                                Header
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab_<?php echo $methodid; ?>_detail" data-toggle="tab" href="#content_<?php echo $methodid; ?>_detail" role="tab" aria-controls="content_<?php echo $methodid; ?>_detail" aria-selected="false">
                                Detail
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab_custom_ecc tab-pane fade show active" id="content_<?php echo $methodid; ?>_header" role="tabpanel" aria-labelledby="tab_<?php echo $methodid; ?>_header">
                            <div class="row">
                                <div class="col-xl-12 mb-10 ml-10">
                                    <form class="ui grid ecc_form" id="form_<?php echo $methodid ?>" action="javascript:post_<?php echo $methodid ?>()">
                                        <?php
                                        $this->ecc_library->form('hidden', '', "form_" . $methodid, $this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
                                        $this->ecc_library->form('hidden', '', "form_" . $methodid, 'item_base_id', '');
                                        ?>

                                        <div class="row">
                                            <div class="col-xl-4">
                                                <?php

                                                $this->ecc_library->form('text', 'Item Code', "form_" . $methodid, 'item_base_code', '', 'Item Code', 'required');
                                                $this->ecc_library->form('text', 'Item Name', "form_" . $methodid, 'item_base_name', '', 'Nama Item', 'required');

                                                $this->ecc_library->form('hidden', 'Style', "form_" . $methodid, 'item_category_id', '1', '', 'item_it_assets');

                                                $this->ecc_library->form('file', 'Image', "form_" . $methodid, 'merk', '', 'Image', 'required');
                                                $this->ecc_library->form('text', 'Tipe', "form_" . $methodid, 'tipe', '', 'Tipe', '');
                                                $this->ecc_library->form('text', 'Spesifikasi Lain', "form_" . $methodid, 'spesifikasi_lain', '', 'Tempat Pembelian', 'required');


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

                        <div class="tab_custom_ecc tab-pane fade" id="content_<?php echo $methodid; ?>_detail" role="tabpanel" aria-labelledby="tab_<?php echo $methodid; ?>_detail">
                            <div class="row panel_<?php echo $methodid ?>_panel_dokumen">
                                <div class="col-xl-12">
                                    <form class="ui grid ecc_form" id="form_detail_<?php echo $methodid ?>_detail" action="javascript:post_<?php echo $methodid ?>_detail()">
                                        <div class="row">
                                            <div class="col-xl-9">
                                                <div class="row">
                                                    <div class="col-xl-5">
                                                        <?php

                                                        $this->ecc_library->form('hidden', '', "form_detail_" . $methodid . "_detail", $this->security->get_csrf_token_name(), $this->security->get_csrf_hash());

                                                        $this->ecc_library->form('text', 'detail item base id', "form_detail_" . $methodid . "_detail", 'detail_item_base_id', '', '', '');

                                                        $this->ecc_library->form('hidden', 'item base id', "form_detail_" . $methodid . "_detail", 'item_base_id', '', '', '');

                                                        $this->ecc_library->form('text', 'Serial Number', "form_detail_" . $methodid . "_detail", 'serial_number', '', '', 'required');

                                                        $this->ecc_library->form('text', 'Garansi', "form_detail_" . $methodid . "_detail", 'garanasi', '', '', 'required');

                                                        $this->ecc_library->form('text', 'Lokasi', "form_detail_" . $methodid . "_detail", 'lokasi', '', '', 'required');
                                                        $this->ecc_library->form('date', 'Tanggal Keluar', "form_detail_" . $methodid . "_detail", 'tgl_keluar', '', '', 'required');




                                                        $this->ecc_library->form('date', 'Tanggal Beli', "form_detail_" . $methodid . "_detail", 'tgl_beli', '', '', 'required');

                                                        ?>
                                                        <div class="form-group field-status">
                                                            <?php
                                                            $this->ecc_library->form('text', 'Status', "form_detail_" . $methodid . "_detail", 'status', '', '', 'required');
                                                            ?>
                                                        </div>
                                                        <div class="form-group field-damage-status">
                                                            <?php
                                                            $this->ecc_library->form('text', 'Damage Status', "form_detail_" . $methodid . "_detail", 'damage_status', '', '', 'required');
                                                            ?>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>

                                            <div class="col-xl-3">
                                                <label> &nbsp </label>
                                                <div class="input-group">

                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="col-xl-3">
                                        <label> &nbsp </label>
                                        <div class="input-group simpan_detail">

                                            <div class="button_<?php echo $methodid ?>_detail_save" onclick="javascript:save_<?php echo $methodid ?>_detail()">
                                                <button type="submit" class="btn btn-success">
                                                    <i class="fa fa-check"></i> SAVE
                                                </button>
                                            </div>
                                        </div>
                                        <div>
                                            <table>

                                                <tbody>

                                                    <tr class="">
                                                        <td scope="row">
                                                            <div class="input-group update_detail" style="display: none;">

                                                                <div class="button_<?php echo $methodid ?>_detail_save" onclick="javascript:save_<?php echo $methodid ?>_detail()">
                                                                    <button type="submit" class="btn btn-warning">
                                                                        <i class="fa fa-check"></i> UPDATE
                                                                    </button>
                                                                </div>
                                                        </td>
                                                        <td>
                                                            <div class="input-group cancel_detail" style="display: none;">

                                                                <div class="button_cancel_<?php echo $methodid ?>_detail_save" onclick="javascript:cancel_detail_<?php echo $methodid ?>_detail()">
                                                                    <button type="button" class="btn btn-danger">
                                                                        <i class="fa fa-check"></i> CANCEL
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </td>

                                                    </tr>
                                                </tbody>
                                            </table>
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

<div class="modal fade" id="update_status_modal" tabindex="-1" role="dialog" aria-labelledby="updateStatusModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateStatusModalLabel">Update Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_update_status">
                    <input type="text" id="modal_detail_item_base_id" name="detail_item_base_id">
                    <div class="form-group">
                        <label for="modal_status">Status:</label>
                        <input type="text" class="form-control" id="modal_status" name="status">
                    </div>
                    <div class="form-group">
                        <label for="modal_damage_status">Damage Status:</label>
                        <input type="text" class="form-control" id="modal_damage_status" name="damage_status">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="update_status()">Update Status</button>
            </div>
        </div>
    </div>
</div>