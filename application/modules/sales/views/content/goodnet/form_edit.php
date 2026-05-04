<div class="row">
    <div class="col-xl-12">
        <div class="card card-statistics h-100">
            <div class="card-body" style="padding: 1.25rem !important">
                <h5 class="card-title form_title_<?php echo $methodid ?>"><?php echo $page_title ?></h5>
                <div class="tab tab-border">
                    <ul class="nav nav-tabs form_tab_<?php echo $methodid ?>" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active show" id="tab_<?php echo $methodid; ?>_header" data-toggle="tab" href="#content_<?php echo $methodid; ?>_header" role="tab" aria-controls="content_<?php echo $methodid; ?>_header" aria-selected="true">
                                Goodnet
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab_custom_ecc tab-pane fade active show" id="content_<?php echo $methodid; ?>_header" role="tabpanel" aria-labelledby="tab_<?php echo $methodid; ?>_header">
                            <div class="row">
                                <div class="col-xl-12 mb-10 ml-10">
                                    <form class="ui grid ecc_form" id="form_<?php echo $methodid ?>" action="javascript:void(0);" method="post">
                                        <?php
                                        $this->ecc_library->form('hidden', '', "form_" . $methodid, $this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
                                        $this->ecc_library->form('hidden', '', "form_" . $methodid, 'goodnet_id', $goodnet->goodnet_id);
                                        ?>
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <?php
                                                        $this->ecc_library->form('text', 'Nama', "form_" . $methodid, 'nama', $goodnet->nama, '', '');
                                                        ?>
                                                    </div>
                                                    <div class="col-xl-8">
                                                        <?php
                                                        $this->ecc_library->form('text', 'Deskripsi hehe', "form_" . $methodid, 'deskripsi', $goodnet->deskripsi, '', '');
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    <div class="ui grid form">
                                        <div class="row field">
                                            <div class="twelve wide column">
                                                <button type="button" class="btn btn-success" onclick="update_<?php echo $methodid ?>()">
                                                    <i class="fa fa-save"></i> Update
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function update_<?php echo $methodid ?>() {
        var formData = new FormData(document.getElementById('form_<?php echo $methodid ?>'));

        $.ajax({
            url: "<?php echo site_url('sales/goodnet/update'); ?>", // Adjust the URL as necessary
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                var result = JSON.parse(response);
                if (result.valid) {
                    alert("Data berhasil diupdate!");
                    // Optionally, you can redirect or reload the page here
                    window.location.reload(); // Reload the page
                    // window.location.href = "<?php echo site_url('goodnet'); ?>"; // Redirect to another page
                } else {
                    alert("Error: " + result.message);
                }
            },
            error: function() {
                alert("An error occurred while updating data.");
            }
        });
    }
</script>