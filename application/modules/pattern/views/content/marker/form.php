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
                    </ul>

                    <div class="tab-content">
                        <div class="tab_custom_ecc tab-pane fade active show" id="content_<?php echo $methodid; ?>_header" role="tabpanel" aria-labelledby="tab_<?php echo $methodid; ?>_header">
                            <div class="row">
                                <div class="col-xl-12 mb-10 ml-10">
                                    <form class="ui grid ecc_form" id="form_<?php echo $methodid ?>" action="javascript:post_<?php echo $methodid ?>()">
                                        <?php
                                        // CSRF token dan field hidden
                                        $this->ecc_library->form('hidden', '', "form_" . $methodid, $this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
                                        $this->ecc_library->form('hidden', '', "form_" . $methodid, 'checklist_detail_id', '');

                                        // Form fields
                                        ?>
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <?php
                                                $this->ecc_library->form('hidden', 'Checklist ID', "form_" . $methodid, 'checklist_id', '', '', '');
                                                $this->ecc_library->form('text', 'Checklist untuk', "form_" . $methodid, 'list', '', 'readonly', 'disabled');
                                                $this->ecc_library->form('text', 'PATTERN NAME', "form_" . $methodid, 'pattern_name', '', '', '');
                                                $this->ecc_library->form('text', 'VARIANT NAME', "form_" . $methodid, 'variant_name', '', '', '');
                                                ?>

                                                <div class="form-group">
                                                    <label for="size">SIZE</label>
                                                    <select name="size" id="size" class="form-control">
                                                        <option value="">Pilih Size</option>
                                                        <option value="S">S</option>
                                                        <option value="M">M</option>
                                                        <option value="L">L</option>
                                                        <option value="XL">XL</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Display checklist details -->
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <h6>Checklist Details</h6>
                                                <?php if (!empty($master_lists)): ?>
                                                    <ul class="list-group">
                                                        <?php foreach ($master_lists as $detail): ?>
                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                <div class="d-flex align-items-center">
                                                                    <?php
                                                                    // Hidden field for master_list_id
                                                                    echo $this->ecc_library->form('hidden', 'Master List ID', "form_" . $methodid, 'master_list_id[]', htmlspecialchars($detail['list_id']), '', '');
                                                                    ?>
                                                                    <label><?php echo htmlspecialchars($detail['name']); ?></label>
                                                                    <input type="checkbox" name="check_status[<?php echo htmlspecialchars($detail['list_id']); ?>]" value="yes" />
                                                                </div>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                <?php else: ?>
                                                    <p>No checklist details found.</p>
                                                <?php endif; ?>
                                            </div>

                                            <?php
                                            $this->ecc_library->form('text', 'COMMENT', "form_" . $methodid, 'comment', '', '', '');
                                            ?>
                                            <?php
                                            $this->ecc_library->form('date', 'Tanggal Di Buat', "form_" . $methodid, 'tgl_buat', '', '', '');
                                            ?>

                                            <!-- Add button for "Add Check Sub" -->
                                            <div class="form-group">
                                                <button type="button" class="btn btn-primary" id="addSelectBtn">Add Sub Checklist</button>
                                            </div>

                                            <!-- Container for dynamic select elements -->
                                            <div id="dynamicSelectContainer"></div>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success">
                                                <i class="fa fa-save"></i> Save Header
                                            </button>
                                        </div>
                                    </form>
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
    document.getElementById('addSelectBtn').addEventListener('click', function() {
        // Membuat div baru untuk menampung input text, checkbox, dan tombol hapus
        var newDiv = document.createElement('div');
        newDiv.className = 'form-group d-flex align-items-center';

        // Membuat elemen input type text
        var inputText = document.createElement('input');
        inputText.type = 'text';
        inputText.name = 'check_sub[]'; // Ganti dengan nama yang sesuai
        inputText.className = 'form-control mr-2'; // Tambahkan margin ke kanan
        inputText.placeholder = 'Masukkan Sub Checklist';

        // Membuat checkbox baru
        var checkbox = document.createElement('input');
        checkbox.type = 'checkbox';
        checkbox.name = 'check_status[]'; // Nama checkbox tetap
        checkbox.value = 'yes';
        checkbox.className = 'ml-2'; // Tambahkan margin ke kiri

        // Membuat tombol add master
        var removeBtn = document.createElement('button');
        removeBtn.type = 'button';
        removeBtn.className = 'btn btn-danger ml-2'; // Tambahkan margin ke kiri
        removeBtn.innerText = 'Remove';

        // Menambahkan event listener untuk menghapus div input ketika tombol diklik
        removeBtn.addEventListener('click', function() {
            newDiv.remove(); // Hapus seluruh div yang berisi input text, checkbox, dan tombol hapus
        });

        // Menambahkan input text, checkbox, dan tombol hapus ke dalam div baru
        newDiv.appendChild(inputText);
        newDiv.appendChild(checkbox);
        newDiv.appendChild(removeBtn);

        // Menambahkan div baru ke dalam container
        document.getElementById('dynamicSelectContainer').appendChild(newDiv);
    });
</script>