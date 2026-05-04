 <script type="text/javascript"
     src="https://cdn.jsdelivr.net/npm/qrcode-generator/qrcode.js"></script>

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
                                     <form class="ui grid ecc_form" id="form_<?php echo $methodid ?>" action="javascript:post_<?php echo $methodid ?>()">
                                         <?php
                                            $this->ecc_library->form('hidden', '', "form_" . $methodid, $this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
                                            $this->ecc_library->form('hidden', '', "form_" . $methodid, 'assets_tags_id', '');
                                            ?>
                                         <div class="row">
                                             <div class="col-xl-12">
                                                 <?php

                                                    $this->ecc_library->form('text', 'Assets Tags Name', "form_" . $methodid, 'assets_tags_name', '', 'Assets Tags Name', 'required');
                                                    $this->ecc_library->form('text', 'Assets Tags Description', "form_" . $methodid, 'assets_tags_desc', '', 'Assets Tags Description', 'required');

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

 <!-- Add this function to refresh CSRF token after each AJAX request -->
 <script>
     function refreshCSRFToken(tokenName, tokenHash) {
         // Update all forms with new CSRF token
         $('input[name="' + tokenName + '"]').val(tokenHash);
     }
 </script>