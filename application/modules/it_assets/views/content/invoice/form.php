<div class="row">
    <div class="col-xl-12">
        <div class="card card-statistics h-100">
            <div class="card-body" style="padding: 1.25rem !important">
                <h5 class="card-title form_title_<?php echo $methodid ?>"><?php echo $page_title ?></h5>
                <div class="tab tab-border">
                    <ul class="nav nav-tabs form_tab_<?php echo $methodid ?>" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="tab_<?php echo $methodid; ?>_title" data-toggle="tab" href="#content_<?php echo $methodid; ?>_title" role="tab" aria-controls="content_<?php echo $methodid; ?>_title" aria-selected="true">
                                Header
                            </a>
                        </li>


                    </ul>

                    <div class="tab-content">

                        <div class="tab_custom_ecc tab-pane fade show active" id="content_<?php echo $methodid; ?>_title" role="tabpanel" aria-labelledby="tab_<?php echo $methodid; ?>_title">
                            <div class="row">
                                <div class="col-xl-12 mb-10 ml-10">
                                    <form class="ui grid ecc_form" id="form_<?php echo $methodid ?>" action="javascript:post_title_<?php echo $methodid ?>()">
                                        <?php
                                        $this->ecc_library->form('hidden', '', "form_" . $methodid, $this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
                                        $this->ecc_library->form('hidden', '', "form_" . $methodid, 'invoice_id', '');
                                        ?>

                                        <div class="row">
                                            <div class="col-xl-4">
                                                <?php
                                                $this->ecc_library->form('text', 'Number', "form_" . $methodid, 'invoice_number', '', 'number', 'required');
                                                $this->ecc_library->form('file', 'Invoice (PDF Only)', "form_" . $methodid, 'invoice_file', '', 'Invoice', 'required', '', 'accept=".pdf"');
                                                $this->ecc_library->form('text', 'Keterangan', "form_" . $methodid, 'keterangan', '', 'keterangan', '', 'required');
                                                $this->ecc_library->form('date', 'Tanggal Beli', "form_" . $methodid, 'create_date', '', '', 'required');
                                                $this->ecc_library->form('hidden', 'Garansi', "form_" . $methodid, 'garansi', '', 'Garansi', '', 'required');
                                                $this->ecc_library->form('text', 'Toko', "form_" . $methodid, 'info', '', 'Toko', '', 'required');
                                                ?>
                                            </div>
                                        </div>
                                    </form>

                                    <div class="ui grid form">
                                        <div class="row field">
                                            <div class="twelve wide column">
                                                <button type="button" class="btn btn-success" onclick="save_title_<?php echo $methodid ?>()">
                                                    <i class="fa fa-save"></i> Save Header
                                                </button>
                                                <button type="button" class="btn btn-info" onclick="cancel_title_<?php echo $methodid ?>()">
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

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>