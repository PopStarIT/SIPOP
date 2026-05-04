<style>
    .container {
        width: 100%;
        max-width: 3000px;
        min-height: calc(100vh - 70px);
        background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
        padding: 20px;
        box-sizing: border-box;
        color: #fff;
        font-family: 'Segoe UI', sans-serif;
        display: flex;
        flex-direction: column;
        gap: 20px;
        overflow-y: auto;
        padding-bottom: 40px;
        overflow-x: hidden;
    }

    /* ========== HEADER BAR ========== */
    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px 20px;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 16px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4);
        backdrop-filter: blur(12px);
        flex-wrap: wrap;
        gap: 10px;
    }

    .header-left {
        font-size: 18px;
        font-weight: bold;
        color: #00e6e6;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .header-right {
        font-size: 14px;
        display: flex;
        gap: 15px;
        align-items: center;
        color: #ddd;
        flex-wrap: wrap;
    }

    /* ========== MAIN CONTENT GRID ========== */
    .main-content {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        flex-grow: 1;
    }

    .dhu-container {
        display: block;
    }

    /* ========== IMAGE SECTION ========== */
    .img-section {
        background: linear-gradient(135deg, #00c6ff, #0072ff);
        border-radius: 20px;
        padding: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        backdrop-filter: blur(12px);
        color: #fff;
        font-size: 18px;
        font-weight: bold;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.3);
        min-height: 100px;
    }

    /* ========== ORDER INFO CARD ========== */
    .order-info {
        background: linear-gradient(135deg, #00c6ff, #0072ff);
        border-radius: 20px;
        padding: 20px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        font-size: 16px;
        line-height: 1.8;
        color: #fff;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
        min-height: 200px;
    }

    .info-item {
        margin-bottom: 8px;
        padding: 5px 0;
    }

    /* ========== DHU SECTION ========== */
    .dhu-section {
        background: linear-gradient(135deg, #00c6ff, #0072ff);
        border-radius: 20px;
        padding: 25px;
        text-align: center;
        color: #fff;
        display: flex;
        flex-direction: column;
        justify-content: center;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
        min-height: 100px;
    }

    .dhu-label {
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 8px;
    }

    .dhu-percentage {
        font-size: 42px;
        font-weight: bold;
    }

    /* ========== TIME SECTION ========== */
    .time-section {
        background: linear-gradient(135deg, #00c6ff, #0072ff);
        border-radius: 20px;
        padding: 20px;
        text-align: center;
        color: #00ffcc;
        font-size: 18px;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.3);
        display: flex;
        flex-direction: column;
        justify-content: center;
        min-height: 100px;
    }

    .time-label {
        margin-bottom: 8px;
        font-weight: 600;
    }

    .dhtime-percentage {
        font-size: 24px;
        font-weight: bold;
    }

    /* ========== ZERO INDICATORS ========== */
    .zero-indicators {
        display: flex;
        border-radius: 20px;
        background: rgba(255, 255, 255, 0.05);
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.3);
        flex-wrap: wrap;
        grid-column: span 3;
        min-height: fit-content;
    }

    .indicator-rft {
        font-size: 48px;
        font-weight: bold;
        text-align: center;
        flex: 1;
        min-width: 80px;
        padding: 10px 5px;
    }

    .indicator-defect {
        font-size: 48px;
        font-weight: bold;
        text-align: center;
        flex: 1;
        min-width: 80px;
        padding: 10px 5px;
    }

    .indicator-reject {
        font-size: 48px;
        font-weight: bold;
        text-align: center;
        flex: 1;
        min-width: 80px;
        padding: 10px 5px;
    }

    .indicator-rft.blue {
        color: #00e6e6;
        text-shadow: 0 0 15px #00e6e6;
        min-height: fit-content;
    }

    .indicator-defect.yellow {
        color: #a18cd1;
        text-shadow: 0 0 15px #a18cd1;
        min-height: fit-content;
    }

    .indicator-reject.red {
        color: #FF4C4C;
        text-shadow: 0 0 15px #FF4C4C;
        min-height: fit-content;
    }

    .indicator-defect sub {
        color: #a18cd1;
        font-size: 16px;
        display: block;
        margin-top: 5px;
    }

    .indicator-rft sub {
        color: #00e6e6;
        font-size: 16px;
        display: block;
        margin-top: 5px;
    }

    .indicator-reject sub {
        color: #FF4C4C;
        font-size: 16px;
        display: block;
        margin-top: 5px;
    }

    /* ========== DATA CARDS ========== */
    .data-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        grid-column: span 3;
    }

    .data-card-rft,
    .data-card-rft-2,
    .data-card-defective,
    .data-card-defective-2,
    .data-card-reject,
    .data-card-reject-2 {
        border-radius: 20px;
        padding: 20px;
        min-height: 180px;
        position: relative;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        transition: all 0.3s ease;
        backdrop-filter: blur(12px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
    }

    .data-card-rft,
    .data-card-rft-2 {
        background: linear-gradient(135deg, #00e6e6, #009999);
    }

    .data-card-defective,
    .data-card-defective-2 {
        background: linear-gradient(135deg, #a18cd1, #fbc2eb);
    }

    .data-card-reject,
    .data-card-reject-2 {
        background: linear-gradient(135deg, #ff6a6a, #d80000);
    }

    .data-card-rft:hover,
    .data-card-rft-2:hover,
    .data-card-defective:hover,
    .data-card-defective-2:hover,
    .data-card-reject:hover,
    .data-card-reject-2:hover {
        transform: translateY(-5px) scale(1.02);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.5);
    }

    .card-title,
    .card-title-rft,
    .card-title-rft-2,
    .card-title-defective,
    .card-title-defective-2,
    .card-title-reject,
    .card-title-reject-2 {
        font-size: 16px;
        font-weight: bold;
        margin-bottom: 8px;
        text-shadow: none;
        color: white;
    }

    .card-value-rft,
    .card-value-rft-2,
    .card-value-defective,
    .card-value-defective-2,
    .card-value-reject,
    .card-value-reject-2 {
        font-size: 36px;
        font-weight: bold;
        text-align: center;
        color: white;
    }

    .card-size-breakdown {
        margin-top: 10px;
        padding: 8px 0;
        border-top: 1px solid rgba(255, 255, 255, 0.2);
        flex-grow: 1;
    }

    .size-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 4px;
        font-size: 12px;
    }

    .size-row:last-child {
        margin-bottom: 0;
    }

    .size-label {
        color: rgba(255, 255, 255, 0.8);
        font-weight: 600;
        min-width: 25px;
    }

    .size-count {
        color: white;
        font-weight: bold;
        min-width: 15px;
        text-align: right;
    }

    /* ========== BACK BUTTON ========== */
    .back-button {
        background: linear-gradient(135deg, #17a2b8, #138496);
        color: white;
        padding: 12px 24px;
        border: none;
        border-radius: 12px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(23, 162, 184, 0.3);
        margin-top: 20px;
    }

    .back-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(23, 162, 184, 0.4);
    }

    /* ========== CAMERA CONTAINER ========== */
    .camera-container {
        position: relative;
        border: 2px dashed #007bff;
        border-radius: 8px;
        padding: 20px;
        text-align: center;
        background: #f8f9fa;
        cursor: pointer;
        transition: all 0.3s ease;
        max-width: 100%;
    }

    .camera-container:hover {
        border-color: #0056b3;
        background: #e9ecef;
    }

    .camera-container.has-image {
        border: 2px solid #28a745;
        background: #d4edda;
    }

    .camera-icon {
        font-size: 3rem;
        color: #007bff;
        margin-bottom: 10px;
    }

    .camera-preview {
        max-width: 100%;
        max-height: 300px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .remove-image {
        position: absolute;
        top: -10px;
        right: -10px;
        background: #dc3545;
        color: white;
        border: none;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        cursor: pointer;
        display: none;
    }

    .camera-container.has-image .remove-image {
        display: block;
    }

    .camera-text {
        color: #6c757d;
        margin-top: 10px;
    }

    .retake-btn {
        margin-top: 10px;
        background: #17a2b8;
        border: none;
        color: white;
        padding: 8px 16px;
        border-radius: 4px;
        cursor: pointer;
    }

    /* ========== BODY & FOOTER ========== */
    body {
        margin: 0;
        padding-bottom: 40px;
        font-family: 'Segoe UI', sans-serif;
    }

    footer {
        position: fixed;
        bottom: 0;
        width: 100%;
        background: #f8f9fa;
        padding: 10px;
        text-align: center;
        font-size: 12px;
        color: #666;
    }

    .modal-dialog {
        max-width: 90%;
        margin: 1rem auto;
    }

    /* ========== DESKTOP LAYOUT (di atas 1024px) ========== */
    @media (min-width: 1025px) {
        .zero-indicators {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            grid-template-rows: auto auto auto;
            gap: 20px;
            padding: 20px;
            align-items: start;
        }

        /* More Info Button + Ratio - Grid position (1,1) */
        .zero-indicators>div:first-child {
            grid-column: 1 / 2;
            grid-row: 1 / 2;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        /* Indicator RFT - Grid position (2,1) */
        .indicator-rft {
            grid-column: 2 / 3;
            grid-row: 1 / 2;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        /* Indicator Defect - Grid position (3,1) */
        .indicator-defect {
            grid-column: 3 / 4;
            grid-row: 1 / 2;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        /* Indicator Reject - Grid position (4,1) */
        .indicator-reject {
            grid-column: 4 / 5;
            grid-row: 1 / 2;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        /* DHU Container (kosong atau bisa dihapus) - Grid position (1,2) */
        .dhu-container {
            grid-column: 1 / 2;
            grid-row: 2 / 3;
            display: none;
            /* Sembunyikan jika kosong */
        }

        /* Data Grid - Grid position spanning (1,3) to (4,3) - full width row 3 */
        .data-grid {
            grid-column: 1 / 5;
            grid-row: 3 / 4;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        /* Styling untuk setiap card di data-grid tetap sama */
        .data-grid>div {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .data-grid>div>div:first-child {
            flex-grow: 1;
        }

        .data-grid>div>div:last-child {
            margin-top: 10px;
        }

        .data-grid .btn {
            width: 100%;
        }
    }

    /* ========== TABLET LAYOUT (601px - 1024px) ========== */
    @media (max-width: 1024px) and (min-width: 601px) {

        .container {
            padding: 15px;
            gap: 15px;
        }

        .main-content {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        .img-section {
            grid-column: 1 / 2;
            grid-row: 1 / 2;
            min-height: 100px;
            font-size: 16px;
        }

        .dhu-section,
        .time-section {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .dhu-container {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 20px;
        }

        .order-info {
            grid-column: 2 / 3;
            grid-row: 1 / 2;
            min-height: 120px;
            padding: 15px;
            font-size: 14px;
            line-height: 1.6;
        }

        .dhu-section {
            grid-column: 2 / 3;
            grid-row: 2 / 3;
            padding: 12px;
            min-height: auto;
        }

        .dhu-label {
            font-size: 16px;
            margin-bottom: 5px;
        }

        .dhu-percentage {
            font-size: 28px;
        }

        .time-section {
            grid-column: 2 / 3;
            grid-row: 2 / 3;
            padding: 12px;
            min-height: auto;
            font-size: 14px;
            margin-top: 10px;
        }

        .time-label {
            font-size: 13px;
            margin-bottom: 5px;
        }

        .dhtime-percentage {
            font-size: 18px;
        }

        .indicator-rft,
        .indicator-defect,
        .indicator-reject {
            font-size: 36px;
            padding: 8px 3px;
            min-width: 70px;
        }

        .indicator-defect sub,
        .indicator-rft sub,
        .indicator-reject sub {
            font-size: 12px;
            margin-top: 4px;
        }

        .data-grid {
            grid-column: 1 / 3;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
            min-height: fit-content;
        }

        .data-card-rft,
        .data-card-rft-2,
        .data-card-defective,
        .data-card-defective-2,
        .data-card-reject,
        .data-card-reject-2 {
            min-height: 140px;
            padding: 15px;
        }

        .card-title,
        .card-title-rft,
        .card-title-rft-2,
        .card-title-defective,
        .card-title-defective-2,
        .card-title-reject,
        .card-title-reject-2 {
            font-size: 13px;
            margin-bottom: 6px;
        }

        .card-value-rft,
        .card-value-rft-2,
        .card-value-defective,
        .card-value-defective-2,
        .card-value-reject,
        .card-value-reject-2 {
            font-size: 28px;
        }

        .card-size-breakdown {
            margin-top: 8px;
            padding: 6px 0;
        }

        .size-row {
            font-size: 10px;
            margin-bottom: 3px;
        }

        .size-label {
            min-width: 20px;
        }
    }

    /* ========== MOBILE LAYOUT (320px - 600px) ========== */
    @media (max-width: 600px) {
        .container {
            padding: 10px;
            gap: 10px;
        }

        .header {
            padding: 10px 12px;
            flex-direction: column;
            text-align: center;
        }

        .header-left {
            font-size: 14px;
        }

        .header-right {
            font-size: 11px;
            justify-content: center;
        }

        .main-content {
            grid-template-columns: 1fr;
            gap: 10px;
        }

        .img-section {
            grid-column: span 1;
            min-height: 80px;
            font-size: 14px;
            padding: 15px;
        }

        .order-info {
            grid-column: span 1;
            padding: 15px;
            font-size: 13px;
            line-height: 1.5;
            min-height: 140px;
        }

        .info-item {
            margin-bottom: 6px;
        }

        .dhu-section {
            grid-column: span 1;
            padding: 15px;
        }

        .dhu-label {
            font-size: 16px;
        }

        .dhu-percentage {
            font-size: 32px;
        }

        .time-section {
            grid-column: span 1;
            padding: 15px;
            font-size: 14px;
        }

        .dhtime-percentage {
            font-size: 20px;
        }

        .indicator-rft,
        .indicator-defect,
        .indicator-reject {
            font-size: 28px;
            min-width: auto;
            padding: 8px 4px;
        }

        .indicator-defect sub,
        .indicator-rft sub,
        .indicator-reject sub {
            font-size: 11px;
            margin-top: 3px;
        }

        .data-grid {
            grid-column: span 1;
            grid-template-columns: 1fr;
            gap: 10px;
            min-height: fit-content;
        }

        .data-card-rft,
        .data-card-rft-2,
        .data-card-defective,
        .data-card-defective-2,
        .data-card-reject,
        .data-card-reject-2 {
            padding: 15px;
            min-height: 130px;
        }

        .card-title,
        .card-title-rft,
        .card-title-rft-2,
        .card-title-defective,
        .card-title-defective-2,
        .card-title-reject,
        .card-title-reject-2 {
            font-size: 13px;
            margin-bottom: 6px;
        }

        .card-value-rft,
        .card-value-rft-2,
        .card-value-defective,
        .card-value-defective-2,
        .card-value-reject,
        .card-value-reject-2 {
            font-size: 24px;
        }

        .card-size-breakdown {
            margin-top: 8px;
            padding: 6px 0;
        }

        .size-row {
            font-size: 11px;
            margin-bottom: 3px;
        }

        .back-button {
            padding: 10px 20px;
            font-size: 14px;
        }
    }
</style>

<div class="row">
    <div class="col-xl-12">
        <div class="card card-statistics h-100">
            <div class="card-body" style="padding: 1.25rem !important">
                <div class="tab tab-border">
                    <ul class="nav nav-tabs form_tab_<?php echo $methodid ?>" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="tab_<?php echo $methodid; ?>" data-toggle="tab" href="#content_<?php echo $methodid; ?>" role="tab" aria-controls="content_<?php echo $methodid; ?>" aria-selected="true">
                                Logs Operator
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
                                        $this->ecc_library->form('hidden', '', "form_" . $methodid, 'value', '');
                                        $this->ecc_library->form('hidden', '', "form_" . $methodid, 'text', '');

                                        ?>


                                        <div class="container" style="min-height:fit-content;">
                                            <main class="main-content" style="min-height:fit-content;">


                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">More Information</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div style="display: flex; gap: 20px; align-items: stretch;">
                                                                    <div class="img-section" style="flex: 1 1 0;">
                                                                        <div class="img-label">Product Image</div>
                                                                    </div>
                                                                    <div class="order-info" style="flex: 2 1 0;">
                                                                        <div class="info-item">Order No:</div>
                                                                        <div class="info-item">Buyer Name:</div>
                                                                        <div class="info-item">Style No:</div>
                                                                        <div class="info-item">Target Output:</div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="zero-indicators" style="height: fit-content;">
                                                    <div>
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                            More Info
                                                        </button>
                                                        <div class="dhu-section">
                                                            <div class="dhu-label">Ratio</div>
                                                            <div class="dhu-percentage">0%</div>
                                                        </div>
                                                    </div>
                                                    <div class="indicator-rft blue" style="min-height: fit-content;">0<sub>(Rft)</sub></div>
                                                    <div class="indicator-defect yellow" style="min-height: fit-content;">0<sub>(Defect)</sub></div>
                                                    <div class="indicator-reject red" style="min-height: fit-content;">0<sub>(Reject)</sub></div>
                                                    <div class="dhu-container"> <!-- Kontainer baru -->
                                                        <!-- <div class="time-section">
                                                            <div class="time-label" id="current-date"></div>
                                                            <div class="dhtime-percentage" id="current-time"></div>
                                                        </div> -->

                                                        <br>

                                                    </div>

                                                    <div class="data-grid" style="margin-top: 10px;">
                                                        <div style="height: fit-content;">
                                                            <div class="data-card-rft">
                                                                <div class="card-title-rft">RFT (Right first time)</div>
                                                                <div class="card-value-rft">0</div>






                                                                <div class="box" style="background-color: #20B2AA; border-radius: 10px;">
                                                                    <div class="p-2">
                                                                        <div class="row">
                                                                            <div class="col-md-4">
                                                                                XS : <label for="" class="card-value-rft-xs">0</label>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                S : <label for="" class="card-value-rft-s">0</label>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                M : <label for="" class="card-value-rft-m">0</label>
                                                                            </div>

                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-4">
                                                                                L : <label for="" class="card-value-rft-l">0</label>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                XL : <label for="" class="card-value-rft-xl">0</label>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                XXL : <label for="" class="card-value-rft-xxl">0</label>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>




                                                            </div>
                                                            <div>
                                                                <button type="button" class="btn" style="background-color:  #009999;color: #ffff; margin-top:10px;height: fit-content;" data-toggle="modal" data-target="#exampleModalrft">
                                                                    More Info Rft
                                                                </button>

                                                            </div>

                                                        </div>


                                                        <div style="height: fit-content;">

                                                            <div class="data-card-defective">
                                                                <div class="card-title-defective">Defective</div>
                                                                <div class="card-value-defective">0</div>
                                                            </div>
                                                            <div>
                                                                <button type="button" class="btn" style="background-color: #a18cd1;color: #ffff; margin-top:10px;height: fit-content;" data-toggle="modal" data-target="#exampleModaldefect">
                                                                    More Info Defective
                                                                </button>

                                                                <!-- Modal -->

                                                            </div>
                                                        </div>
                                                        <div style="height: fit-content;">

                                                            <div class="data-card-reject">
                                                                <div class="card-title-reject">Reject</div>
                                                                <div class="card-value-reject">0</div>

                                                                <div class="box" style="background-color: #ff4500; border-radius: 10px;">
                                                                    <div class="p-2">
                                                                        <div class="row">
                                                                            <div class="col-md-4">
                                                                                XS : <label for="" class="card-value-reject-xs">0</label>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                S : <label for="" class="card-value-reject-s">0</label>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                M : <label for="" class="card-value-reject-m">0</label>
                                                                            </div>

                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-4">
                                                                                L : <label for="" class="card-value-reject-l">0</label>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                XL : <label for="" class="card-value-reject-xl">0</label>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                XXL : <label for="" class="card-value-reject-xxl">0</label>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>

                                                            <div>
                                                                <button type="button" class="btn" style="background-color:  #d80000;color: #ffff; margin-top:10px;height: fit-content;" data-toggle="modal" data-target="#exampleModalreject">
                                                                    More Info Reject
                                                                </button>

                                                                <!-- Modal -->

                                                            </div>
                                                        </div>


                                                        <div style="height: fit-content;">

                                                            <div class="data-card-rft-2 blue-card-2">
                                                                <div class="card-title-rft-2">Rectified</div>
                                                                <div class="card-value-rft-2">0</div>


                                                                <div class="box" style="background-color: #20B2AA; border-radius: 10px;">
                                                                    <div class="p-2">
                                                                        <div class="row">
                                                                            <div class="col-md-4">
                                                                                XS : <label for="" class="card-value-rft-2-xs">0</label>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                S : <label for="" class="card-value-rft-2-s">0</label>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                M : <label for="" class="card-value-rft-2-m">0</label>
                                                                            </div>

                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-4">
                                                                                L : <label for="" class="card-value-rft-2-l">0</label>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                XL : <label for="" class="card-value-rft-2-xl">0</label>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                XXL : <label for="" class="card-value-rft-2-xxl">0</label>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>

                                                            <div>
                                                                <button type="button" class="btn" style="background-color:   #009999;color: #ffff; margin-top:10px;height: fit-content;" data-toggle="modal" data-target="#exampleModalrectified">
                                                                    More Info Rectified
                                                                </button>

                                                                <!-- Modal -->

                                                            </div>
                                                        </div>

                                                        <div style="height: fit-content;">

                                                            <div class="data-card-defective-2 olive-card">
                                                                <div class="card-title-defective-2">Repeat defect</div>
                                                                <div class="card-value-defective-2">0</div>


                                                            </div>

                                                            <div>
                                                                <button type="button" class="btn" style="background-color:  #a18cd1; color: #ffff; margin-top:10px;height: fit-content;" data-toggle="modal" data-target="#exampleModalrepet_defect">
                                                                    More Info Repeat defect
                                                                </button>

                                                                <!-- Modal -->

                                                            </div>
                                                        </div>


                                                        <div style="height: fit-content;">

                                                            <div class="data-card-reject-2 red-card">
                                                                <div class="card-title-reject-2">Rework reject</div>
                                                                <div class="card-value-reject-2">0</div>

                                                                <div class="box" style="background-color: #ff4500; border-radius: 10px;">
                                                                    <div class="p-2">
                                                                        <div class="row">
                                                                            <div class="col-md-4">
                                                                                XS : <label for="" class="card-value-reject-2-xs">0</label>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                S : <label for="" class="card-value-reject-2-s">0</label>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                M : <label for="" class="card-value-reject-2-m">0</label>
                                                                            </div>

                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-4">
                                                                                L : <label for="" class="card-value-reject-2-l">0</label>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                XL : <label for="" class="card-value-reject-2-xl">0</label>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                XXL : <label for="" class="card-value-reject-2-xxl">0</label>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <button type="button" class="btn" style="background-color:  #d80000; color: #ffff; margin-top:10px;height: fit-content;" data-toggle="modal" data-target="#exampleModalrework_reject">
                                                                    More Info Rework reject
                                                                </button>

                                                                <!-- Modal -->

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>


                                            </main>
                                        </div>
                                    </form>

                                    <div class="ui grid form">
                                        <div class="row field">
                                            <div class="twelve wide column">
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

<div class="modal fade" id="dataCardModal_<?php echo $methodid ?>" tabindex="-1" role="dialog" aria-labelledby="dataCardModalLabel_<?php echo $methodid ?>" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="dataCardModalLabel_<?php echo $methodid ?>">Input Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!-- Responsive: 2 columns on md+, 1 column on xs/sm -->
                <div class="row">
                    <!-- Left: Form -->
                    <div class="col-12 col-md-6 mb-3 mb-md-0">
                        <form id="modal_form_<?php echo $methodid ?>" action="javascript:post_rft_<?php echo $methodid ?>()">
                            <?php
                            $this->ecc_library->form('hidden', '', "modal_form_" . $methodid, $this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
                            $this->ecc_library->form('hidden', '', "modal_form_" . $methodid, 'id', '');
                            ?>
                            <div class="form-group">
                                <?php
                                $this->ecc_library->form('hidden', '', "modal_form_" . $methodid, 'task_assignment_id', '');
                                // Ganti type input ke text dan tambahkan readonly agar keyboard tidak muncul
                                $this->ecc_library->form(
                                    'text',
                                    'Bundle Input',
                                    "modal_form_" . $methodid,
                                    'bundle_qty',
                                    '',
                                    'required readonly inputmode="none" autocomplete="off"',
                                    ''
                                );
                                ?>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <?php
                                    $this->ecc_library->form('select_pop', 'SIZE', "modal_form_" . $methodid . "", 'rft_size_id', '', '', 'size');
                                    ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <?php
                                    $this->ecc_library->form('select_pop', 'COLOUR', "modal_form_" . $methodid . "", 'rft_colour_id', '', '', 'fabric_colour');
                                    $this->ecc_library->form('hidden', 'COLOUR', "modal_form_" . $methodid, 'rft_status', '1');
                                    ?>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Right: Numpad -->
                    <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                        <div id="numpad_<?php echo $methodid ?>" style="width:100%;">
                            <style>
                                @media (max-width: 767.98px) {
                                    #numpad_<?php echo $methodid ?>.custom-numpad {
                                        grid-template-columns: repeat(3, 1fr) !important;
                                        gap: 8px !important;
                                    }

                                    #numpad_<?php echo $methodid ?>.custom-numpad-btn {
                                        width: 100% !important;
                                        height: 48px !important;
                                        font-size: 1.2rem !important;
                                    }
                                }

                                .custom-numpad {
                                    display: grid;
                                    grid-template-columns: repeat(3, 60px);
                                    gap: 10px;
                                    justify-content: center;
                                }

                                .custom-numpad-btn {
                                    width: 60px;
                                    height: 60px;
                                    font-size: 1.5rem;
                                    border: none;
                                    border-radius: 10px;
                                    background: #00e6e6;
                                    color: #fff;
                                    font-weight: bold;
                                    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
                                    transition: background 0.2s;
                                }

                                .custom-numpad-btn:active {
                                    background: #009999;
                                }

                                .custom-numpad-btn.zero {
                                    grid-column: 2/3;
                                }

                                .custom-numpad-btn.clear {
                                    background: #ff4c4c;
                                }

                                .custom-numpad-btn.clear:active {
                                    background: #d80000;
                                }
                            </style>
                            <div class="custom-numpad">
                                <button type="button" class="custom-numpad-btn" data-num="1">1</button>
                                <button type="button" class="custom-numpad-btn" data-num="2">2</button>
                                <button type="button" class="custom-numpad-btn" data-num="3">3</button>
                                <button type="button" class="custom-numpad-btn" data-num="4">4</button>
                                <button type="button" class="custom-numpad-btn" data-num="5">5</button>
                                <button type="button" class="custom-numpad-btn" data-num="6">6</button>
                                <button type="button" class="custom-numpad-btn" data-num="7">7</button>
                                <button type="button" class="custom-numpad-btn" data-num="8">8</button>
                                <button type="button" class="custom-numpad-btn" data-num="9">9</button>
                                <button type="button" class="custom-numpad-btn clear" data-num="clear">C</button>
                                <button type="button" class="custom-numpad-btn zero" data-num="0">0</button>
                                <button type="button" class="custom-numpad-btn" data-num="del"><i class="fa fa-backspace"></i></button>
                            </div>
                        </div>
                        <script>
                            (function() {
                                var input = document.querySelector('#modal_form_<?php echo $methodid ?> input[name="bundle_qty"]');
                                var numpad = document.getElementById('numpad_<?php echo $methodid ?>');
                                if (input && numpad) {
                                    // Pastikan input tidak bisa diketik manual
                                    input.setAttribute('readonly', true);
                                    input.setAttribute('inputmode', 'none');
                                    input.setAttribute('autocomplete', 'off');
                                    input.addEventListener('focus', function(e) {
                                        // Cegah keyboard muncul di mobile
                                        this.blur();
                                    });
                                    numpad.addEventListener('click', function(e) {
                                        if (e.target.classList.contains('custom-numpad-btn')) {
                                            var val = e.target.getAttribute('data-num');
                                            if (val === 'clear') {
                                                input.value = '';
                                            } else if (val === 'del') {
                                                input.value = input.value.slice(0, -1);
                                            } else if (!isNaN(val)) {
                                                input.value = (input.value || '') + val;
                                            }
                                            input.dispatchEvent(new Event('input'));
                                        }
                                    });
                                }
                            })();
                        </script>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary rounded-circle d-flex align-items-center justify-content-center" style="width:48px;height:48px;padding:0;" data-dismiss="modal" title="Close">
                    <i class="fa fa-times" style="margin:0;"></i>
                </button>
                <button type="button" class="btn btn-info rounded-circle d-flex align-items-center justify-content-center" style="width:48px;height:48px;padding:0;" onclick="save_modal_<?php echo $methodid ?>()">
                    <i class="fa fa-check" style="margin:0;"></i>
                </button>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="rejectModal_<?php echo $methodid ?>" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel_<?php echo $methodid ?>" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="rejectModalLabel_<?php echo $methodid ?>">Reject Data Input</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="reject_form_<?php echo $methodid ?>" action="javascript:post_reject_<?php echo $methodid ?>()">
                    <?php
                    $this->ecc_library->form('hidden', '', "reject_form_" . $methodid, $this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
                    $this->ecc_library->form('hidden', '', "reject_form_" . $methodid, 'id', '');
                    ?>
                    <div class="form-group">
                        <?php
                        $this->ecc_library->form('hidden', '', "reject_form_" . $methodid, 'task_assignment_id', '');

                        ?>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <?php

                            $this->ecc_library->form('select_pop', 'SIZE', "reject_form_" . $methodid . "", 'reject_size_id', '', '', 'size');
                            ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php

                            $this->ecc_library->form('select_pop', 'COLOUR', "reject_form_" . $methodid . "", 'reject_colour_id', '', '', 'fabric_colour');
                            $this->ecc_library->form('hidden', 'COLOUR', "reject_form_" . $methodid . "", 'reject_status', '1');
                            ?>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-secondary rounded-circle d-flex align-items-center justify-content-center" style="width:48px;height:48px;padding:0;" data-dismiss="modal" title="Close">
                    <i class="fa fa-times" style="margin:0;"></i>
                </button>
                <button type="button" class="btn btn-info rounded-circle d-flex align-items-center justify-content-center" style="width:48px;height:48px;padding:0;" onclick="post_reject_<?php echo $methodid ?>()">
                    <i class="fa fa-check" style="margin:0;"></i>
                </button>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="defectiveModal_<?php echo $methodid ?>" role="dialog" aria-labelledby="defectiveModalLabel_<?php echo $methodid ?>" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="defectiveModalLabel_<?php echo $methodid ?>">Defective Data Input</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <!-- Left: Form -->
                    <div class="col-12 col-md-6 mb-3 mb-md-0">
                        <form id="defective_form_<?php echo $methodid ?>" action="javascript:post_defective_<?php echo $methodid ?>()" enctype="multipart/form-data" method="post">
                            <?php
                            $this->ecc_library->form('hidden', '', "defective_form_" . $methodid, $this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
                            $this->ecc_library->form('hidden', '', "defective_form_" . $methodid, 'id', '');
                            $this->ecc_library->form('hidden', '', "defective_form_" . $methodid, 'task_assignment_id', '');
                            ?>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <?php
                                    $this->ecc_library->form('select_pop', 'Causes of Defect', "defective_form_" . $methodid, 'defect_cause_id', '', '', 'defect_cause');
                                    ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <?php
                                    $this->ecc_library->form('select_pop', 'Parts of Defect', "defective_form_" . $methodid, 'defect_parts_id', '', '', 'defect_parts');
                                    ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <?php
                                // Tambahkan atribut readonly pada input RFID
                                $this->ecc_library->form('text', 'RFID No', "defective_form_" . $methodid, 'rfid_no', '', 'required', 'readonly');
                                $this->ecc_library->form('hidden', 'COLOUR', "defective_form_" . $methodid, 'defect_status', '1');
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Photo Evidence</label>
                                <div class="camera-container" id="cameraContainer_<?php echo $methodid ?>">
                                    <div class="camera-icon">
                                        <i class="fas fa-camera"></i>
                                    </div>
                                    <div class="camera-text">
                                        <strong>Tap to take photo</strong><br>
                                        <small>Camera will open automatically</small>
                                    </div>
                                    <img class="camera-preview" id="imagePreview_<?php echo $methodid ?>" style="display: none;">
                                    <button type="button" class="remove-image" id="removeImage_<?php echo $methodid ?>">
                                        <i class="fas fa-times"></i>
                                    </button>
                                    <button type="button" class="retake-btn" id="retakeBtn_<?php echo $methodid ?>" style="display: none;">
                                        <i class="fa fa-redo"></i> Retake Photo
                                    </button>
                                </div>
                                <input type="file" id="cameraInput_<?php echo $methodid ?>" name="image" accept="image/*" capture="camera" style="display: none;">
                            </div>
                        </form>
                    </div>
                    <!-- Right: Numpad/Qwerty -->
                    <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                        <div id="numpad_defective_<?php echo $methodid ?>" style="width:100%;">
                            <style>
                                /* CSS sama seperti sebelumnya */
                            </style>
                            <div id="numpadContent_defective_<?php echo $methodid ?>">
                                <!-- Numpad content sama seperti sebelumnya -->
                            </div>
                            <button type="button" class="switch-numpad-btn" id="switchNumpadBtn_defective_<?php echo $methodid ?>">Switch to QWERTY</button>
                        </div>
                        <script>
                            (function() {
                                var input = document.querySelector('#defective_form_<?php echo $methodid ?> input[name="rfid_no"]');
                                var numpadContent = document.getElementById('numpadContent_defective_<?php echo $methodid ?>');
                                var switchBtn = document.getElementById('switchNumpadBtn_defective_<?php echo $methodid ?>');
                                var isNumpad = true;

                                // QWERTY layout
                                var qwertyRows = [
                                    ['Q', 'W', 'E', 'R', 'T', 'Y', 'U', 'I', 'O', 'P'],
                                    ['A', 'S', 'D', 'F', 'G', 'H', 'J', 'K', 'L'],
                                    ['Z', 'X', 'C', 'V', 'B', 'N', 'M'],
                                    ['clear', 'del']
                                ];

                                function renderNumpad() {
                                    numpadContent.innerHTML = `
                    <div class="custom-numpad">
                        <button type="button" class="custom-numpad-btn" data-num="1">1</button>
                        <button type="button" class="custom-numpad-btn" data-num="2">2</button>
                        <button type="button" class="custom-numpad-btn" data-num="3">3</button>
                        <button type="button" class="custom-numpad-btn" data-num="4">4</button>
                        <button type="button" class="custom-numpad-btn" data-num="5">5</button>
                        <button type="button" class="custom-numpad-btn" data-num="6">6</button>
                        <button type="button" class="custom-numpad-btn" data-num="7">7</button>
                        <button type="button" class="custom-numpad-btn" data-num="8">8</button>
                        <button type="button" class="custom-numpad-btn" data-num="9">9</button>
                        <button type="button" class="custom-numpad-btn clear" data-num="clear">C</button>
                        <button type="button" class="custom-numpad-btn zero" data-num="0">0</button>
                        <button type="button" class="custom-numpad-btn" data-num="del"><i class="fa fa-backspace"></i></button>
                    </div>
                `;
                                    switchBtn.textContent = 'Switch to QWERTY';
                                }

                                function renderQwerty() {
                                    var html = '<div class="custom-qwerty">';
                                    qwertyRows.forEach(function(row) {
                                        row.forEach(function(key) {
                                            if (key === 'clear') {
                                                html += '<button type="button" class="custom-qwerty-btn clear" data-num="clear">C</button>';
                                            } else if (key === 'del') {
                                                html += '<button type="button" class="custom-qwerty-btn" data-num="del"><i class="fa fa-backspace"></i></button>';
                                            } else {
                                                html += '<button type="button" class="custom-qwerty-btn" data-num="' + key + '">' + key + '</button>';
                                            }
                                        });
                                        html += '<br/>';
                                    });
                                    html += '</div>';
                                    numpadContent.innerHTML = html;
                                    switchBtn.textContent = 'Switch to Numpad';
                                }

                                // Initial render
                                renderNumpad();

                                // Switch button
                                switchBtn.addEventListener('click', function() {
                                    isNumpad = !isNumpad;
                                    if (isNumpad) {
                                        renderNumpad();
                                    } else {
                                        renderQwerty();
                                    }
                                });

                                // Delegate click event for both numpad and qwerty
                                numpadContent.addEventListener('click', function(e) {
                                    var btn = e.target.closest('button[data-num]');
                                    if (!btn || !input) return;
                                    var val = btn.getAttribute('data-num');
                                    if (val === 'clear') {
                                        input.value = '';
                                    } else if (val === 'del') {
                                        input.value = input.value.slice(0, -1);
                                    } else {
                                        input.value = (input.value || '') + val;
                                    }
                                    input.dispatchEvent(new Event('input'));
                                });

                                // Tambahkan event listener untuk mencegah fokus pada input RFID
                                input.addEventListener('focus', function(e) {
                                    e.preventDefault();
                                    this.blur();
                                });
                            })();
                        </script>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary rounded-circle d-flex align-items-center justify-content-center"
                    style="width:48px;height:48px;padding:0;" data-dismiss="modal" title="Close">
                    <i class="fa fa-times" style="margin:0;"></i>
                </button>
                <button type="button" class="btn btn-info rounded-circle d-flex align-items-center justify-content-center"
                    style="width:48px;height:48px;padding:0;" onclick="post_defective_<?php echo $methodid ?>()">
                    <i class="fa fa-check" style="margin:0;"></i>
                </button>
            </div>

        </div>
    </div>
</div>


<div class="modal fade" id="rectifiedModal_<?php echo $methodid ?>" tabindex="-1" role="dialog" aria-labelledby="rectifiedModalLabel_<?php echo $methodid ?>" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="rectifiedModalLabel_<?php echo $methodid ?>">Rectified Data Input</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="rectified_form_<?php echo $methodid ?>" action="javascript:post_rft_<?php echo $methodid ?>()">
                    <?php
                    $this->ecc_library->form('hidden', '', "rectified_form_" . $methodid, $this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
                    $this->ecc_library->form('hidden', '', "rectified_form_" . $methodid, 'id', '');
                    $this->ecc_library->form('hidden', '', "rectified_form_" . $methodid, 'task_assignment_id', '');
                    ?>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <?php
                            $this->ecc_library->form('select_pop', 'SIZE', "rectified_form_" . $methodid . "", 'rft_size_id', '', '', 'size');
                            ?>
                        </div>
                        <div class="form-group col-md-6">
                            <?php
                            $this->ecc_library->form('select_pop', 'COLOUR', "rectified_form_" . $methodid . "", 'rft_colour_id', '', '', 'fabric_colour');
                            $this->ecc_library->form('hidden', 'Bundle Input', "rectified_form_" . $methodid, 'bundle_qty', '1');
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <?php

                        $this->ecc_library->form('hidden', 'COLOUR', "rectified_form_" . $methodid . "", 'rft_status', '2');
                        ?>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary rounded-circle d-flex align-items-center justify-content-center"
                    style="width:48px;height:48px;padding:0;" data-dismiss="modal" title="Close">
                    <i class="fa fa-times" style="margin:0;"></i>
                </button>
                <button type="button" class="btn btn-info rounded-circle d-flex align-items-center justify-content-center"
                    style="width:48px;height:48px;padding:0;" onclick="post_rft_<?php echo $methodid ?>()">
                    <i class="fa fa-check" style="margin:0;"></i>
                </button>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="repeatDefectModal_<?php echo $methodid ?>" tabindex="-1" role="dialog" aria-labelledby="repeatDefectModalLabel_<?php echo $methodid ?>" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="repeatDefectModalLabel_<?php echo $methodid ?>">Repeat Defect Data Input</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <!-- Left: Form -->
                    <div class="col-12 col-md-6 mb-3 mb-md-0">
                        <form id="repeat_defect_form_<?php echo $methodid ?>" action="javascript:post_defective_<?php echo $methodid ?>()" enctype="multipart/form-data" method="post">
                            <?php
                            $this->ecc_library->form('hidden', '', "repeat_defect_form_" . $methodid, $this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
                            $this->ecc_library->form('hidden', '', "repeat_defect_form_" . $methodid, 'id', '');
                            $this->ecc_library->form('hidden', '', "repeat_defect_form_" . $methodid, 'task_assignment_id', '');
                            ?>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <?php
                                    $this->ecc_library->form('select_pop', 'Causes of Defect', "repeat_defect_form_" . $methodid, 'defect_cause_id', '', '', 'defect_cause');
                                    ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <?php
                                    $this->ecc_library->form('select_pop', 'Parts of Defect', "repeat_defect_form_" . $methodid, 'defect_parts_id', '', '', 'defect_parts');
                                    ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <?php
                                $this->ecc_library->form('text', 'RFID No', "repeat_defect_form_" . $methodid, 'rfid_no', '', 'required', 'readonly'); // Tambahkan atribut readonly
                                $this->ecc_library->form('hidden', 'COLOUR', "repeat_defect_form_" . $methodid, 'defect_status', '2');
                                ?>
                            </div>

                            <!-- TAMBAHKAN CAMERA INPUT SECTION INI -->
                            <div class="form-group">
                                <label>Photo Evidence</label>
                                <div class="camera-container" id="cameraContainer_repeat_<?php echo $methodid ?>">
                                    <div class="camera-icon">
                                        <i class="fas fa-camera"></i>
                                    </div>
                                    <div class="camera-text">
                                        <strong>Tap to take photo</strong><br>
                                        <small>Camera will open automatically</small>
                                    </div>
                                    <img class="camera-preview" id="imagePreview_repeat_<?php echo $methodid ?>" style="display: none;">
                                    <button type="button" class="remove-image" id="removeImage_repeat_<?php echo $methodid ?>">
                                        <i class="fas fa-times"></i>
                                    </button>
                                    <button type="button" class="retake-btn" id="retakeBtn_repeat_<?php echo $methodid ?>" style="display: none;">
                                        <i class="fa fa-redo"></i> Retake Photo
                                    </button>
                                </div>
                                <input type="file" id="cameraInput_repeat_<?php echo $methodid ?>" name="image" accept="image/*" capture="camera" style="display: none;">
                            </div>
                        </form>
                    </div>

                    <!-- Right: Numpad/Qwerty -->
                    <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                        <div id="numpad_repeat_<?php echo $methodid ?>" style="width:100%;">
                            <style>
                                @media (max-width: 767.98px) {
                                    #numpad_repeat_<?php echo $methodid ?>.custom-numpad {
                                        grid-template-columns: repeat(3, 1fr) !important;
                                        gap: 8px !important;
                                    }

                                    #numpad_repeat_<?php echo $methodid ?>.custom-numpad-btn {
                                        width: 100% !important;
                                        height: 48px !important;
                                        font-size: 1.2rem !important;
                                    }

                                    #numpad_repeat_<?php echo $methodid ?>.custom-qwerty {
                                        grid-template-columns: repeat(7, 1fr) !important;
                                        gap: 6px !important;
                                    }

                                    #numpad_repeat_<?php echo $methodid ?>.custom-qwerty-btn {
                                        width: 100% !important;
                                        height: 38px !important;
                                        font-size: 1rem !important;
                                    }
                                }

                                .custom-numpad,
                                .custom-qwerty {
                                    display: grid;
                                    gap: 10px;
                                    justify-content: center;
                                }

                                .custom-numpad {
                                    grid-template-columns: repeat(3, 60px);
                                }

                                .custom-qwerty {
                                    grid-template-columns: repeat(10, 36px);
                                }

                                .custom-numpad-btn,
                                .custom-qwerty-btn {
                                    width: 60px;
                                    height: 60px;
                                    font-size: 1.5rem;
                                    border: none;
                                    border-radius: 10px;
                                    background: #ff6a6a;
                                    color: #fff;
                                    font-weight: bold;
                                    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
                                    transition: background 0.2s;
                                }

                                .custom-qwerty-btn {
                                    width: 36px;
                                    height: 48px;
                                    font-size: 1.1rem;
                                }

                                .custom-numpad-btn:active,
                                .custom-qwerty-btn:active {
                                    background: #009999;
                                }

                                .custom-numpad-btn.zero {
                                    grid-column: 2/3;
                                }

                                .custom-numpad-btn.clear,
                                .custom-qwerty-btn.clear {
                                    background: #ff4c4c;
                                }

                                .custom-numpad-btn.clear:active,
                                .custom-qwerty-btn.clear:active {
                                    background: #d80000;
                                }
                            </style>
                            <div id="numpadContent_repeat_<?php echo $methodid ?>">
                                <!-- Default: Numpad -->
                                <div class="custom-numpad">
                                    <button type="button" class="custom-numpad-btn" data-num="1">1</button>
                                    <button type="button" class="custom-numpad-btn" data-num="2">2</button>
                                    <button type="button" class="custom-numpad-btn" data-num="3">3</button>
                                    <button type="button" class="custom-numpad-btn" data-num="4">4</button>
                                    <button type="button" class="custom-numpad-btn" data-num="5">5</button>
                                    <button type="button" class="custom-numpad-btn" data-num="6">6</button>
                                    <button type="button" class="custom-numpad-btn" data-num="7">7</button>
                                    <button type="button" class="custom-numpad-btn" data-num="8">8</button>
                                    <button type="button" class="custom-numpad-btn" data-num="9">9</button>
                                    <button type="button" class="custom-numpad-btn clear" data-num="clear">C</button>
                                    <button type="button" class="custom-numpad-btn zero" data-num="0">0</button>
                                    <button type="button" class="custom-numpad-btn" data-num="del"><i class="fa fa-backspace"></i></button>
                                </div>
                            </div>
                            <button type="button" class="switch-numpad-btn" id="switchNumpadBtn_repeat_<?php echo $methodid ?>">Switch to QWERTY</button>
                        </div>
                        <script>
                            (function() {
                                var input = document.querySelector('#repeat_defect_form_<?php echo $methodid ?> input[name="rfid_no"]');
                                var numpadContent = document.getElementById('numpadContent_repeat_<?php echo $methodid ?>');
                                var switchBtn = document.getElementById('switchNumpadBtn_repeat_<?php echo $methodid ?>');
                                var isNumpad = true;

                                // QWERTY layout
                                var qwertyRows = [
                                    ['Q', 'W', 'E', 'R', 'T', 'Y', 'U', 'I', 'O', 'P'],
                                    ['A', 'S', 'D', 'F', 'G', 'H', 'J', 'K', 'L'],
                                    ['Z', 'X', 'C', 'V', 'B', 'N', 'M'],
                                    ['clear', 'del']
                                ];

                                function renderNumpad() {
                                    numpadContent.innerHTML = `
                    <div class="custom-numpad">
                        <button type="button" class="custom-numpad-btn" data-num="1">1</button>
                        <button type="button" class="custom-numpad-btn" data-num="2">2</button>
                        <button type="button" class="custom-numpad-btn" data-num="3">3</button>
                        <button type="button" class="custom-numpad-btn" data-num="4">4</button>
                        <button type="button" class="custom-numpad-btn" data-num="5">5</button>
                        <button type="button" class="custom-numpad-btn" data-num="6">6</button>
                        <button type="button" class="custom-numpad-btn" data-num="7">7</button>
                        <button type="button" class="custom-numpad-btn" data-num="8">8</button>
                        <button type="button" class="custom-numpad-btn" data-num="9">9</button>
                        <button type="button" class="custom-numpad-btn clear" data-num="clear">C</button>
                        <button type="button" class="custom-numpad-btn zero" data-num="0">0</button>
                        <button type="button" class="custom-numpad-btn" data-num="del"><i class="fa fa-backspace"></i></button>
                    </div>
                `;
                                    switchBtn.textContent = 'Switch to QWERTY';
                                }

                                function renderQwerty() {
                                    var html = '<div class="custom-qwerty">';
                                    qwertyRows.forEach(function(row) {
                                        row.forEach(function(key) {
                                            if (key === 'clear') {
                                                html += '<button type="button" class="custom-qwerty-btn clear" data-num="clear">C</button>';
                                            } else if (key === 'del') {
                                                html += '<button type="button" class="custom-qwerty-btn" data-num="del"><i class="fa fa-backspace"></i></button>';
                                            } else {
                                                html += '<button type="button" class="custom-qwerty-btn" data-num="' + key + '">' + key + '</button>';
                                            }
                                        });
                                        html += '<br/>';
                                    });
                                    html += '</div>';
                                    numpadContent.innerHTML = html;
                                    switchBtn.textContent = 'Switch to Numpad';
                                }

                                // Initial render
                                renderNumpad();

                                // Switch button
                                switchBtn.addEventListener('click', function() {
                                    isNumpad = !isNumpad;
                                    if (isNumpad) {
                                        renderNumpad();
                                    } else {
                                        renderQwerty();
                                    }
                                });

                                // Delegate click event for both numpad and qwerty
                                numpadContent.addEventListener('click', function(e) {
                                    var btn = e.target.closest('button[data-num]');
                                    if (!btn || !input) return;
                                    var val = btn.getAttribute('data-num');
                                    if (val === 'clear') {
                                        input.value = '';
                                    } else if (val === 'del') {
                                        input.value = input.value.slice(0, -1);
                                    } else {
                                        input.value = (input.value || '') + val;
                                    }
                                    input.dispatchEvent(new Event('input'));
                                });

                                // Tambahkan event listener untuk mencegah fokus pada input RFID
                                input.addEventListener('focus', function(e) {
                                    e.preventDefault();
                                    this.blur();
                                });
                            })();
                        </script>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary rounded-circle d-flex align-items-center justify-content-center"
                    style="width:48px;height:48px;padding:0;" data-dismiss="modal" title="Close">
                    <i class="fa fa-times" style="margin:0;"></i>
                </button>
                <button type="button" class="btn btn-info rounded-circle d-flex align-items-center justify-content-center"
                    style="width:48px;height:48px;padding:0;" onclick="post_defective_<?php echo $methodid ?>()">
                    <i class="fa fa-check" style="margin:0;"></i>
                </button>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="reworkRejectModal_<?php echo $methodid ?>" tabindex="-1" role="dialog" aria-labelledby="reworkRejectModalLabel_<?php echo $methodid ?>" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="reworkRejectModalLabel_<?php echo $methodid ?>">Rework Reject Data Input</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="rework_reject_form_<?php echo $methodid ?>" action="javascript:post_reject_<?php echo $methodid ?>()">
                    <?php
                    $this->ecc_library->form('hidden', '', "rework_reject_form_" . $methodid, $this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
                    $this->ecc_library->form('hidden', '', "rework_reject_form_" . $methodid, 'id', '');
                    ?>
                    <div class="form-group">
                        <?php
                        $this->ecc_library->form('hidden', '', "rework_reject_form_" . $methodid, 'task_assignment_id', '');

                        ?>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <?php

                            $this->ecc_library->form('select_pop', 'SIZE', "rework_reject_form_" . $methodid . "", 'reject_size_id', '', '', 'size');
                            ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php

                            $this->ecc_library->form('select_pop', 'COLOUR', "rework_reject_form_" . $methodid . "", 'reject_colour_id', '', '', 'fabric_colour');
                            $this->ecc_library->form('hidden', 'COLOUR', "rework_reject_form_" . $methodid . "", 'reject_status', '2');
                            ?>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary rounded-circle d-flex align-items-center justify-content-center"
                    style="width:48px;height:48px;padding:0;" data-dismiss="modal" title="Close">
                    <i class="fa fa-times" style="margin:0;"></i>
                </button>
                <button type="button" class="btn btn-info rounded-circle d-flex align-items-center justify-content-center"
                    style="width:48px;height:48px;padding:0;" onclick="post_reject_<?php echo $methodid ?>()">
                    <i class="fa fa-check" style="margin:0;"></i>
                </button>
            </div>

        </div>
    </div>
</div>



<div class="modal fade" id="exampleModalrft" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">More Information RFT</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-size-breakdown">

                </div>
                <div class="col-xl-7 mb-50">

                    <div class="row" style="margin-top:8px;">
                        <div class="col-xl-12">
                            <?php
                            $extra_param = array(
                                'methodid' => $methodid,
                                'extra_param' => array(
                                    0 => array(
                                        'field' => 'id',
                                        'form_id' => 'form_' . $methodid . "_id"
                                    )
                                )
                            );

                            $this->ecc_library->jqgrid($methodid . "_rft_1", $dashboard_table['field_rft'], $dashboard_table['field_loaddata_rft'], $extra_param);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="exampleModaldefect" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">More Information Defective</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row" style="margin-top:8px;">
                    <div class="col-xl-12">
                        <?php
                        $extra_param = array(
                            'methodid' => $methodid,
                            'extra_param' => array(
                                0 => array(
                                    'field' => 'id',
                                    'form_id' => 'form_' . $methodid . "_id"
                                )
                            )
                        );

                        $this->ecc_library->jqgrid($methodid . "_defect_1", $dashboard_table['field_defect'], $dashboard_table['field_loaddata_defect'], $extra_param);
                        ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="exampleModalreject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">More Information Reject</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row" style="margin-top:8px;">
                    <div class="col-xl-12">
                        <?php
                        $extra_param = array(
                            'methodid' => $methodid,
                            'extra_param' => array(
                                0 => array(
                                    'field' => 'id',
                                    'form_id' => 'form_' . $methodid . "_id"
                                )
                            )
                        );

                        $this->ecc_library->jqgrid($methodid . "_reject_1", $dashboard_table['field_reject'], $dashboard_table['field_loaddata_reject'], $extra_param);
                        ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="exampleModalrectified" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">More Information Rectified</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row" style="margin-top:8px;">
                    <div class="col-xl-12">
                        <?php
                        $extra_param = array(
                            'methodid' => $methodid,
                            'extra_param' => array(
                                0 => array(
                                    'field' => 'id',
                                    'form_id' => 'form_' . $methodid . "_id"
                                )
                            )
                        );

                        $this->ecc_library->jqgrid($methodid . "_rft_2", $dashboard_table['field_rft_2'], $dashboard_table['field_loaddata_rft_2'], $extra_param);
                        ?>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="exampleModalrepet_defect" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">More Information Repeat Defect</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row" style="margin-top:8px;">
                    <div class="col-xl-12">
                        <?php
                        $extra_param = array(
                            'methodid' => $methodid,
                            'extra_param' => array(
                                0 => array(
                                    'field' => 'id',
                                    'form_id' => 'form_' . $methodid . "_id"
                                )
                            )
                        );

                        $this->ecc_library->jqgrid($methodid . "_defect_2", $dashboard_table['field_defect_2'], $dashboard_table['field_loaddata_defect_2'], $extra_param);
                        ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModalrework_reject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">More Information Rework reject</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row" style="margin-top:8px;">
                    <div class="col-xl-12">
                        <?php
                        $extra_param = array(
                            'methodid' => $methodid,
                            'extra_param' => array(
                                0 => array(
                                    'field' => 'id',
                                    'form_id' => 'form_' . $methodid . "_id"
                                )
                            )
                        );

                        $this->ecc_library->jqgrid($methodid . "_reject_2", $dashboard_table['field_reject_2'], $dashboard_table['field_loaddata_reject_2'], $extra_param);
                        ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>