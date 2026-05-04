   <script src="https://cdnjs.cloudflare.com/ajax/libs/jsbarcode/3.11.5/JsBarcode.all.min.js"
       integrity="sha512-QEAheCz+x/VkKtxeGoDq6nsktdDvUAohTnan/XDz9t6pKMzq8AGWDYzE0bZaFzGlFGg0FKjrjoLkj7B7lQO5sA=="
       crossorigin="anonymous"></script>
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
                           <li class="nav-item">
                               <a class="nav-link" id="tab_<?php echo $methodid; ?>_header" data-toggle="tab" href="#content_<?php echo $methodid; ?>_header" role="tab" aria-controls="content_<?php echo $methodid; ?>_header" aria-selected="false">
                                   Detail
                               </a>
                           </li>

                           <li class="nav-item">
                               <a class="nav-link" id="tab_<?php echo $methodid; ?>_out" data-toggle="tab" href="#content_<?php echo $methodid; ?>_out" role="tab" aria-controls="content_<?php echo $methodid; ?>_out" aria-selected="false">
                                   Item Keluar
                               </a>
                           </li>

                           <li class="nav-item">
                               <a class="nav-link" id="tab_<?php echo $methodid; ?>_return" data-toggle="tab" href="#content_<?php echo $methodid; ?>_return" role="tab" aria-controls="content_<?php echo $methodid; ?>_return" aria-selected="false">
                                   Data Return Item
                               </a>
                           </li>

                           <li class="nav-item">
                               <a class="nav-link" id="tab_<?php echo $methodid; ?>_bug_fix" data-toggle="tab" href="#content_<?php echo $methodid; ?>_bug_fix" role="tab" aria-controls="content_<?php echo $methodid; ?>_bug_fix" aria-selected="false">
                                   Data Recycle
                               </a>
                           </li>
                       </ul>

                       <div class="tab-content">

                           <div class="tab_custom_ecc tab-pane fade show active" id="content_<?php echo $methodid; ?>_title" role="tabpanel" aria-labelledby="tab_<?php echo $methodid; ?>_title">
                               <div class="row">
                                   <div class="col-xl-12 mb-10 ml-10">
                                       <form class="ui grid ecc_form" id="form_<?php echo $methodid ?>" action="javascript:post_<?php echo $methodid ?>()">
                                           <?php
                                            $this->ecc_library->form('hidden', '', "form_" . $methodid, $this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
                                            $this->ecc_library->form('hidden', '', "form_" . $methodid, 'item_base_id', '');
                                            ?>
                                           <div class="row">
                                               <div class="col-xl-12">
                                                   <?php

                                                    $this->ecc_library->form('text', 'Item Code', "form_" . $methodid, 'item_base_code', '', 'Item Code', 'required');
                                                    $this->ecc_library->form('text', 'Item Name', "form_" . $methodid, 'item_base_name', '', 'Nama Item', 'required');
                                                    $this->ecc_library->form('hidden', 'Style', "form_" . $methodid, 'item_category_id', '1', '', 'item_it_assets');
                                                    $this->ecc_library->form('file', 'Image', "form_" . $methodid, 'merk', '', 'Image', 'required');
                                                    $this->ecc_library->form('text', 'Barcode', "form_" . $methodid, 'barcode', '', 'Barcode', 'required');
                                                    echo '<div class="col-md-12" style="margin-top: -10px; margin-bottom: 15px;">
                                                <button type="button" id="generate_barcode_' . $methodid . '" class="btn btn-sm btn-primary">Generate Barcode</button>
                                                </div>';
                                                    $this->ecc_library->form('hidden', 'Stok Tersedia', "form_" . $methodid, 'stock', '', 'Stok Tersedia', 'required');
                                                    $this->ecc_library->form('text', 'Tipe', "form_" . $methodid, 'tipe', '', 'Tipe', 'required');
                                                    $this->ecc_library->form('text', 'Spesifikasi Lain', "form_" . $methodid, 'spesifikasi_lain', '', 'Tempat Pembelian', 'required');
                                                    ?>
                                               </div>
                                           </div>
                                       </form>

                                       <div class="ui grid form mt-3">
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

                           <div class="tab_custom_ecc tab-pane fade" id="content_<?php echo $methodid; ?>_header" role="tabpanel" aria-labelledby="tab_<?php echo $methodid; ?>_header">
                               <div class="row panel_<?php echo $methodid ?>_panel_dokumen">

                                   <!-- Form Header -->
                                   <div class="col-xl-5 mb-3">
                                       <div style="border: 1px solid #ccc; padding: 15px; border-radius: 5px;">
                                           <form class="ui grid ecc_form" id="form_detail_<?php echo $methodid ?>_detail" action="javascript:post_<?php echo $methodid ?>_detail()">
                                               <div class="row">
                                                   <div class="col-xl-12">
                                                       <?php
                                                        $this->ecc_library->form('hidden', '', "form_detail_" . $methodid . "_detail", $this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
                                                        $this->ecc_library->form('hidden', 'detail item base id', "form_detail_" . $methodid . "_detail", 'detail_item_base_id', '', '', '');
                                                        $this->ecc_library->form('hidden', 'item base id', "form_detail_" . $methodid . "_detail", 'item_base_id', '', '', 'required');
                                                        $this->ecc_library->form('text', 'Serial Number', "form_detail_" . $methodid . "_detail", 'serial_number', '', '', 'required');
                                                        echo '<div class="col-md-12" style="margin-top: -10px; margin-bottom: 15px;">
                                                        <button type="button" id="generate_serial_' . $methodid . '" class="btn btn-sm btn-primary">Generate Serial Number</button>
                                                        </div>';
                                                        $this->ecc_library->form('number', 'Jumlah Item', "form_detail_" . $methodid . "_detail", 'jml_item', '', '', 'required');
                                                        $this->ecc_library->form('hidden', 'Status', "form_detail_" . $methodid, 'status', '1', '', 'required');
                                                        $this->ecc_library->form('text', 'Keterangan', "form_detail_" . $methodid . "_detail", 'keterangan', '', '', 'required');
                                                        ?>

                                                       <div class="row">
                                                           <div class="col-md-6">
                                                               <?php
                                                                $this->ecc_library->form('number', 'Garansi', "form_detail_" . $methodid . "_detail", 'garansi', '', '', 'required');
                                                                ?>
                                                           </div>
                                                           <div class="col-md-6">
                                                               <?php
                                                                echo '<div class="form-group">
                                                                    <label for="garansi_keterangan">Garansi Keterangan</label>
                                                                    <select name="garansi_keterangan" id="form_detail_" class="form-control" required>
                                                                        <option value="1">Hari</option>
                                                                        <option value="2">Bulan</option>
                                                                        <option value="3">Tahun</option>
                                                                    </select>
                                                                </div>';
                                                                ?>
                                                           </div>
                                                       </div>

                                                       <?php
                                                        $this->ecc_library->form('select_pop', 'pilih Invoice', "form_detail_" . $methodid . "_detail", 'invoice_id', '', '', 'invoice_assets');
                                                        ?>
                                                   </div>
                                               </div>
                                           </form>


                                           <div class=" mt-3">
                                               <div class="simpan_detail button_<?php echo $methodid ?>_detail_save" onclick="javascript:save_<?php echo $methodid ?>_detail()">
                                                   <button type="submit" class="btn btn-success">
                                                       <i class="fa fa-check"></i> SAVE
                                                   </button>
                                               </div>

                                               <table class="mt-2">
                                                   <tbody>
                                                       <tr>
                                                           <td>
                                                               <div class="update_detail mt-3" style="display: none;">
                                                                   <div class="button_<?php echo $methodid ?>_detail_save" onclick="javascript:save_<?php echo $methodid ?>_detail()">
                                                                       <button type="submit" class="btn btn-warning">
                                                                           <i class="fa fa-check"></i> UPDATE
                                                                       </button>
                                                                   </div>
                                                               </div>
                                                           </td>
                                                           <td>
                                                               <div class="cancel_detail mt-3" style="display: none;">
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

                                   <!-- Form Detail -->
                                   <div class="col-xl-7 mb-50">

                                       <div class="col-xl-12 mb-3">
                                           <div style="border: 1px solid #ccc; padding: 15px; border-radius: 5px;">
                                               <p>Data Detail Item</p>
                                               <?php
                                                $extra_param = array(
                                                    'methodid' => $methodid,
                                                    'extra_param' => array(
                                                        0 => array(
                                                            'field' => 'ini_item_base_id',
                                                            'form_id' => 'form_detail_' . $methodid . "_detail_item_base_id" //ambil dariinputan yang di tuju pada form detail
                                                        )
                                                    )
                                                );
                                                $this->ecc_library->jqgrid($methodid . "_detail", $dashboard_table['field_detail'], $dashboard_table['field_detail_loaddata'], $extra_param);
                                                ?>

                                           </div>
                                       </div>
                                   </div>

                                   <div class="modal fade" id="modal_out_<?php echo $methodid ?>" tabindex="-1" role="dialog" aria-labelledby="outModalLabel" aria-hidden="true">
                                       <div class="modal-dialog" role="document">
                                           <div class="modal-content">
                                               <div class="modal-header">
                                                   <h5 class="modal-title" id="outModalLabel">Form Barang Keluar</h5>
                                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                       <span aria-hidden="true">&times;</span>
                                                   </button>
                                               </div>
                                               <div class="modal-body">
                                                   <form class="ui grid ecc_form" id="form_out_modal_<?php echo $methodid ?>_out" action="javascript:post_modal_<?php echo $methodid ?>_out()">
                                                       <div class="row">
                                                           <div class="col-xl-12">
                                                               <div class="row">
                                                                   <div class="col-xl-12">
                                                                       <?php
                                                                        $this->ecc_library->form('hidden', '', "form_out_modal_" . $methodid . "_out", $this->security->get_csrf_token_name(), $this->security->get_csrf_hash());

                                                                        // Hidden fields
                                                                        $this->ecc_library->form('hidden', 'Out detail item base id', "form_out_modal_" . $methodid . "_out", 'out_detail_item_base_id', '', '', '');
                                                                        $this->ecc_library->form('hidden', 'detail item base id', "form_out_modal_" . $methodid . "_out", 'detail_item_base_id', '', '', '');

                                                                        // Visible fields
                                                                        $this->ecc_library->form('text', 'Lokasi', "form_out_modal_" . $methodid . "_out", 'lokasi', '', '', 'required');
                                                                        $this->ecc_library->form('readonly', 'Jumlah Item Keluar', "form_out_modal_" . $methodid . "_out", 'jml_item_out', '', '', 'required');
                                                                        $this->ecc_library->form('date', 'Tanggal Keluar', "form_out_modal_" . $methodid . "_out", 'tgl_keluar', '', '', 'required');



                                                                        $this->ecc_library->form('select_pop', 'Assets Tags', "form_out_modal_" . $methodid . "_out", 'assets_tags_id', '', '', 'assets_tags');


                                                                        ?>

                                                                       <div class="form-group damage_out">
                                                                           <?php
                                                                            $this->ecc_library->form('text', 'Damage Status', "form_out_modal_" . $methodid . "_out", 'damage_status', '', '', 'required');
                                                                            ?>
                                                                       </div>
                                                                   </div>
                                                               </div>
                                                           </div>
                                                       </div>
                                                   </form>
                                               </div>
                                               <div class="modal-footer">
                                                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                   <button type="button" class="btn btn-success" id="btn_save_modal_<?php echo $methodid ?>_out">
                                                       <i class="fa fa-check"></i> SAVE
                                                   </button>
                                                   <button type="button" class="btn btn-warning" id="btn_update_modal_<?php echo $methodid ?>_out" style="display:none;">
                                                       <i class="fa fa-check"></i> UPDATE
                                                   </button>
                                               </div>
                                           </div>
                                       </div>
                                   </div>

                               </div>
                           </div>

                           <div class="tab_custom_ecc tab-pane fade" id="content_<?php echo $methodid; ?>_out" role="tabpanel" aria-labelledby="tab_<?php echo $methodid; ?>_out">
                               <div class="row panel_<?php echo $methodid ?>_panel_dokumen">

                                   <div class="row mb-3 col-md-12">
                                       <div class="col-md-6">
                                           <div style="border: 1px solid #ccc; padding: 15px; border-radius: 5px;">
                                               <p>Data Pengeluaran Item</p>
                                               <?php
                                                $extra_param = array(
                                                    'methodid' => $methodid,
                                                    'extra_param' => array(
                                                        0 => array(
                                                            'field' => 'out_detail_item_base_id',
                                                            'form_id' => 'form_out_' . $methodid . '_out_detail_item_base_id'
                                                        )
                                                    )
                                                );
                                                $this->ecc_library->jqgrid($methodid . "_out", $dashboard_table['field_detail_out'], $dashboard_table['field_detail_out_loaddata'], $extra_param);
                                                ?>
                                           </div>
                                       </div>

                                       <div class="col-md-6">
                                           <div style="border: 1px solid #ccc; padding: 15px; border-radius: 5px;">
                                               <form class="ui grid ecc_form" id="form_out_<?php echo $methodid ?>_out" action="javascript:post_<?php echo $methodid ?>_out()">
                                                   <div class="row">
                                                       <div class="col-xl-12">
                                                           <div class="row">
                                                               <div class="col-xl-10">
                                                                   <?php
                                                                    $this->ecc_library->form('hidden', '', "form_out_" . $methodid . "_out", $this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
                                                                    $this->ecc_library->form('hidden', 'Out detail item base id', "form_out_" . $methodid . "_out", 'out_detail_item_base_id', '', '', '');
                                                                    $this->ecc_library->form('hidden', 'detail item base id', "form_out_" . $methodid . "_out", 'detail_item_base_id', '', '', '');
                                                                    $this->ecc_library->form('text', 'Lokasi', "form_out_" . $methodid . "_out", 'lokasi', '', '', 'required');
                                                                    $this->ecc_library->form('readonly', 'Jumlah Item Keluar', "form_out_" . $methodid . "_out", 'jml_item_out', '', '', 'required');
                                                                    $this->ecc_library->form('date', 'Tanggal Keluar', "form_out_" . $methodid . "_out", 'tgl_keluar', '', '', 'required');
                                                                    ?>
                                                                   <div class="form-group damage_out">
                                                                       <?php
                                                                        $this->ecc_library->form('text', 'Damage Status', "form_out_" . $methodid . "_out", 'damage_status', '', '', 'required');
                                                                        ?>
                                                                   </div>
                                                               </div>
                                                           </div>
                                                       </div>
                                                   </div>
                                               </form>
                                               <div class="col-xl-3">
                                                   <label>&nbsp;</label>
                                                   <div class="input-group simpan_out">
                                                       <!-- <div class="button_<?php echo $methodid ?>_out_save" onclick="javascript:save_<?php echo $methodid ?>_out()">
                                                           <button type="submit" class="btn btn-success">
                                                               <i class="fa fa-check"></i> SAVE
                                                           </button>
                                                       </div> -->
                                                   </div>
                                                   <div>
                                                       <table>
                                                           <tbody>
                                                               <tr class="">
                                                                   <td scope="row">
                                                                       <div class="input-group update_out" style="display: none;">
                                                                           <div class="button_<?php echo $methodid ?>_out_save" onclick="javascript:save_<?php echo $methodid ?>_out()">
                                                                               <button type="submit" class="btn btn-warning">
                                                                                   <i class="fa fa-check"></i> UPDATE
                                                                               </button>
                                                                           </div>
                                                                       </div>
                                                                   </td>
                                                                   <td>
                                                                       <div class="input-group cancel_out" style="display: none;">
                                                                           <div class="button_cancel_<?php echo $methodid ?>_out_save" onclick="javascript:cancel_out_<?php echo $methodid ?>_out()">
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

                           <div class="modal fade" id="modal_return_<?php echo $methodid ?>" tabindex="-1" role="dialog" aria-labelledby="returnModalLabel" aria-hidden="true">
                               <div class="modal-dialog" role="document">
                                   <div class="modal-content">
                                       <div class="modal-header">
                                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                               <span aria-hidden="true">&times;</span>
                                           </button>
                                           <h4 class="modal-title" id="returnModalLabel">Pengembalian Barang</h4>
                                       </div>
                                       <div class="modal-body">

                                           <form class="ui grid ecc_form form-horizontal" id="form_return_modal_<?php echo $methodid ?>_out" action="javascript:post_out_<?php echo $methodid ?>_out()">
                                               <!-- Hidden fields -->
                                               <div class="alert alert-info">
                                                   <p id="return_item_info"></p>
                                                   <p id="return_location_info"></p>
                                                   <p id="return_date_info"></p>
                                                   <p id="return_serial_info"></p>
                                                   <p id="return_jml_item_out_info"></p>
                                               </div>

                                               <div class="row">
                                                   <div class="col-xl-12">
                                                       <div class="row">
                                                           <div class="col-xl-10">
                                                               <?php
                                                                $this->ecc_library->form('hidden', '', "form_return_modal_" . $methodid . "_out", $this->security->get_csrf_token_name(), $this->security->get_csrf_hash());

                                                                $this->ecc_library->form('hidden', 'Out detail item base id', "form_return_modal_" . $methodid . "_out", 'out_detail_item_base_id', '', '', '');

                                                                $this->ecc_library->form('hidden', 'detail item base id', "form_return_modal_" . $methodid . "_out", 'detail_item_base_id', '', '', '');


                                                                $this->ecc_library->form('hidden', 'Jumlah Item Return', "form_return_modal_" . $methodid . "_out", 'jml_return', '', '1', 'required');



                                                                $this->ecc_library->form('date', 'Tanggal Return', "form_return_modal_" . $methodid . "_out", 'tgl_return', '', '', 'required');

                                                                $this->ecc_library->form('text', 'Alasan Return', "form_return_modal_" . $methodid . "_out", 'alasan_return', '', '', 'required');

                                                                ?>
                                                               <!-- <div class="form-group damage_out">
                                                                <?php
                                                                $this->ecc_library->form('text', 'Damage Status', "form_return_modal_" . $methodid . "_out", 'damage_status', '', '', 'required');
                                                                ?>
                                                            </div> -->
                                                           </div>
                                                       </div>
                                                   </div>
                                               </div>
                                           </form>
                                           <div class="col-xl-3">
                                               <label>&nbsp;</label>
                                               <div class="input-group ">
                                                   <div class="button_<?php echo $methodid ?>_out_save" onclick="javascript:save_return_<?php echo $methodid ?>_out()">
                                                       <button type="submit" class="btn btn-success">
                                                           <i class="fa fa-check"></i> SAVE
                                                       </button>
                                                   </div>
                                               </div>

                                           </div>

                                       </div>

                                   </div>
                               </div>
                           </div>
                           <div class="tab_custom_ecc tab-pane fade" id="content_<?php echo $methodid; ?>_return" role="tabpanel" aria-labelledby="tab_<?php echo $methodid; ?>_return">
                               <div class="row panel_<?php echo $methodid ?>_panel_dokumen">

                                   <div class="row mb-3 col-md-12">
                                       <div class="col-md-12">
                                           <div style="border: 1px solid #ccc; padding: 15px; border-radius: 5px;">
                                               <p>Data Return Item</p>
                                               <?php
                                                $extra_param = array(
                                                    'methodid' => $methodid,
                                                    'extra_param' => array(
                                                        0 => array(
                                                            'field' => 'out_detail_item_base_id',
                                                            'form_id' => 'form_out_' . $methodid . '_out_detail_item_base_id'
                                                        )
                                                    )
                                                );
                                                $this->ecc_library->jqgrid($methodid . "_return", $dashboard_table['field_detail_out_return'], $dashboard_table['field_detail_out_return_loaddata'], $extra_param);
                                                ?>
                                           </div>
                                       </div>

                                   </div>

                               </div>
                           </div>



                           <div class="tab_custom_ecc tab-pane fade" id="content_<?php echo $methodid; ?>_bug_fix" role="tabpanel" aria-labelledby="tab_<?php echo $methodid; ?>_bug_fix">
                               <div class="row panel_<?php echo $methodid ?>_panel_dokumen">





                                   <div class="row mb-3 col-md-12">
                                       <div class="col-md-6">
                                           <div style="border: 1px solid #ccc; padding: 15px; border-radius: 5px;">


                                               <p>Data Recycle</p>
                                               <?php
                                                $extra_param = array(
                                                    'methodid' => $methodid,
                                                    'extra_param' => array(
                                                        0 => array(
                                                            'field' => 'out_detail_item_base_id',
                                                            'form_id' => 'form_out_' . $methodid . '_out_detail_item_base_id'
                                                        )
                                                    ),

                                                );
                                                $this->ecc_library->jqgrid($methodid . "_bug_fix", $dashboard_table['field_bug_fix'], $dashboard_table['field_bug_fix_loaddata'], $extra_param);
                                                ?>
                                           </div>
                                       </div>

                                   </div>



                               </div>
                           </div>

                           <div class="modal fade" id="bugFixModal" tabindex="-1" role="dialog" aria-labelledby="bugFixModalLabel" aria-hidden="true">
                               <div class="modal-dialog" role="document">
                                   <div class="modal-content">
                                       <div class="modal-header">
                                           <h5 class="modal-title" id="bugFixModalLabel">Detail Bug Fix</h5>
                                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                               <span aria-hidden="true">&times;</span>
                                           </button>
                                       </div>
                                       <div class="modal-body">
                                           <!-- Form untuk menampilkan detail -->
                                           <form class="ui grid ecc_form" id="formout<?php echo $methodid ?>_out" action="javascript:post_edit_out<?php echo $methodid ?>_out()">
                                               <div class="row">
                                                   <div class="col-xl-12">
                                                       <div class="row">
                                                           <div class="col-xl-10">
                                                               <h4>apakah anda yakin ingin mengubah data ini?</h4>
                                                               <?php
                                                                $this->ecc_library->form('hidden', '', "formout" . $methodid . "_out", $this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
                                                                $this->ecc_library->form('hidden', 'Out detail item base id', "formout" . $methodid . "_out", 'out_detail_item_base_id', '', '', '');
                                                                $this->ecc_library->form('hidden', 'detail item base id', "formout" . $methodid . "_out", 'detail_item_base_id', '', '', '');
                                                                $this->ecc_library->form('hidden', 'Lokasi', "formout" . $methodid . "_out", 'lokasi', '', '', 'required');
                                                                $this->ecc_library->form('hidden', 'Jumlah Item Keluar', "formout" . $methodid . "_out", 'jml_item_out', '', '', 'hidden');
                                                                $this->ecc_library->form('hidden', 'Tanggal Keluar', "formout" . $methodid . "_out", 'tgl_keluar', '', '', 'required');
                                                                $this->ecc_library->form('hidden', 'assets_tags_id', "formout" . $methodid . "_out", 'assets_tags_id', '', '', 'required');

                                                                ?>
                                                           </div>
                                                       </div>
                                                   </div>
                                               </div>
                                           </form>

                                           <div class="col-xl-3">
                                               <label>&nbsp;</label>
                                               <div class="input-group ">
                                                   <div class="button_<?php echo $methodid ?>_out_save" onclick="javascript:save_detail_out_<?php echo $methodid ?>_out()">
                                                       <button type="submit" class="btn btn-success">
                                                           <i class="fa fa-check"></i> SAVE
                                                       </button>
                                                   </div>
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