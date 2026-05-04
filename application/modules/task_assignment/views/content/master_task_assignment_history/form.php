  <style>
      /* ========== GLOBAL CONTAINER ========== */
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
          /* Ruang untuk footer */
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
          grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
          /* Fleksibel berdasarkan lebar */
          gap: 20px;
          flex-grow: 1;
      }

      /* ========== IMAGE SECTION ========== */
      .img-section {
          background: rgba(255, 255, 255, 0.05);
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
          min-height: 150px;
      }

      /* ========== ORDER INFO CARD ========== */
      .order-info {
          background: rgba(255, 255, 255, 0.07);
          border-radius: 20px;
          padding: 20px;
          display: flex;
          flex-direction: column;
          justify-content: center;
          font-size: 16px;
          line-height: 1.6;
          color: #fff;
          box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
      }

      .info-item {
          margin-bottom: 8px;
          padding: 5px 0;
      }

      /* ========== SIZE SELECTION ========== */
      .size-section {
          background: rgba(255, 255, 255, 0.08);
          border-radius: 20px;
          padding: 20px;
          margin-top: 10px;
          box-shadow: 0 6px 18px rgba(0, 0, 0, 0.3);
      }

      .size-title {
          font-size: 16px;
          font-weight: bold;
          margin-bottom: 15px;
          color: #00e6e6;
          text-align: center;
      }

      .size-grid {
          display: grid;
          grid-template-columns: repeat(3, 1fr);
          gap: 10px;
      }

      .size-button {
          background: rgba(255, 255, 255, 0.1);
          border: 2px solid rgba(255, 255, 255, 0.2);
          border-radius: 12px;
          padding: 12px 8px;
          color: #fff;
          font-weight: bold;
          text-align: center;
          cursor: pointer;
          transition: all 0.3s ease;
          min-height: 50px;
          display: flex;
          align-items: center;
          justify-content: center;
          font-size: 14px;
      }

      .size-button:hover {
          background: rgba(0, 230, 230, 0.2);
          border-color: #00e6e6;
          transform: translateY(-2px);
          box-shadow: 0 4px 12px rgba(0, 230, 230, 0.3);
      }

      .size-button.active {
          background: linear-gradient(135deg, #00e6e6, #009999);
          border-color: #00e6e6;
          box-shadow: 0 4px 15px rgba(0, 230, 230, 0.4);
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
          background: rgba(255, 255, 255, 0.07);
          border-radius: 20px;
          padding: 20px;
          text-align: center;
          color: #00ffcc;
          font-size: 18px;
          box-shadow: 0 6px 18px rgba(0, 0, 0, 0.3);
      }

      /* ========== ZERO INDICATORS ========== */
      .zero-indicators {
          display: flex;
          justify-content: space-around;
          padding: 20px;
          border-radius: 20px;
          background: rgba(255, 255, 255, 0.05);
          box-shadow: 0 6px 18px rgba(0, 0, 0, 0.3);
          gap: 10px;
          flex-wrap: wrap;
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

      .indicator.blue {
          color: #00e6e6;
          text-shadow: 0 0 15px #00e6e6;
      }

      .indicator-rft.blue {
          color: #00e6e6;
          text-shadow: 0 0 15px #00e6e6;
      }

      .indicator.yellow {
          color: #FFD93D;
          text-shadow: 0 0 15px #FFD93D;
      }

      .indicator-defect.yellow {
          color: #FFD93D;
          text-shadow: 0 0 15px #FFD93D;
      }

      .indicator.red {
          color: #FF4C4C;
          text-shadow: 0 0 15px #FF4C4C;
      }

      .indicator-reject.red {
          color: #FF4C4C;
          text-shadow: 0 0 15px #FF4C4C;
      }

      .indicator sub {
          color: #FFD700;
          font-size: 16px;
          display: block;
          margin-top: 5px;
      }

      /* ========== DATA CARDS ========== */
      .data-grid {
          display: grid;
          grid-template-columns: 1fr;
          gap: 20px;
      }

      .data-card-rft,
      .data-card-rft-2,
      .data-card-defective,
      .data-card-defective-2,
      .data-card-reject,
      .data-card-reject-2 {
          border-radius: 20px;
          padding: 20px;
          min-height: 200px;
          position: relative;
          display: flex;
          flex-direction: column;
          justify-content: space-between;
          transition: all 0.3s ease;
          backdrop-filter: blur(12px);
          box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
      }

      /* Warna berbeda tiap jenis */
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

      /* Hover Effect */
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

      /* ========== SIZE BREAKDOWN IN CARDS ========== */
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

      .card-actions {
          position: absolute;
          bottom: 15px;
          right: 15px;
          display: flex;
          gap: 8px;
      }

      .circle-button {
          width: 30px;
          height: 30px;
          border-radius: 50%;
          background: rgba(255, 255, 255, 0.3);
          display: flex;
          justify-content: center;
          align-items: center;
          font-size: 18px;
          cursor: pointer;
          color: #fff;
          transition: all 0.3s ease;
      }

      .circle-button:hover {
          background: rgba(255, 255, 255, 0.6);
          transform: scale(1.1);
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

      /* ========== RESPONSIVE BREAKPOINTS ========== */
      /* Small phones: 320px - 480px */
      @media (max-width: 480px) {
          .container {
              padding: 15px;
              gap: 15px;
          }

          .header {
              padding: 12px 15px;
              flex-direction: column;
              text-align: center;
          }

          .header-left {
              font-size: 16px;
              margin-bottom: 5px;
          }

          .header-right {
              font-size: 12px;
              justify-content: center;
          }

          .main-content {
              gap: 15px;
          }

          .img-section {
              min-height: 120px;
              font-size: 16px;
              padding: 15px;
          }

          .order-info {
              padding: 15px;
              font-size: 14px;
          }

          .size-section {
              padding: 15px;
          }

          .size-grid {
              grid-template-columns: repeat(2, 1fr);
              gap: 8px;
          }

          .size-button {
              padding: 10px 6px;
              font-size: 12px;
              min-height: 40px;
          }

          .dhu-section {
              padding: 20px 15px;
          }

          .dhu-label {
              font-size: 18px;
          }

          .dhu-percentage {
              font-size: 36px;
          }

          .time-section {
              padding: 15px;
              font-size: 16px;
          }

          .zero-indicators {
              padding: 15px;
              flex-direction: column;
              gap: 8px;
          }

          .indicator-rft,
          .indicator-defect,
          .indicator-reject {
              font-size: 32px;
              min-width: auto;
              padding: 8px;
          }

          .indicator sub {
              font-size: 14px;
          }

          .data-grid {
              gap: 15px;
          }

          .data-card-rft,
          .data-card-rft-2,
          .data-card-defective,
          .data-card-defective-2,
          .data-card-reject,
          .data-card-reject-2 {
              padding: 15px;
              min-height: 120px;
          }

          .card-title,
          .card-title-rft,
          .card-title-rft-2,
          .card-title-defective,
          .card-title-defective-2,
          .card-title-reject,
          .card-title-reject-2 {
              font-size: 14px;
          }

          .card-value-rft,
          .card-value-rft-2,
          .card-value-defective,
          .card-value-defective-2,
          .card-value-reject,
          .card-value-reject-2 {
              font-size: 28px;
          }
      }

      /* Large phones: 481px - 767px */
      @media (min-width: 481px) and (max-width: 767px) {
          .container {
              padding: 20px;
              gap: 20px;
          }


          .main-content {
              grid-template-columns: repeat(4, 1fr);
              gap: 20px;
          }

          .img-section {
              grid-column: span 2;
          }

          .size-grid {
              grid-template-columns: repeat(3, 1fr);
          }

          .zero-indicators {
              grid-column: span 2;
              flex-direction: row;
          }

          .indicator-rft,
          .indicator-defect,
          .indicator-reject {
              font-size: 40px;
          }

          .indicator sub {
              font-size: 16px;
          }

          .data-grid {
              grid-column: span 2;
              grid-template-columns: repeat(2, 1fr);
              gap: 20px;
          }

          .card-value-rft,
          .card-value-rft-2,
          .card-value-defective,
          .card-value-defective-2,
          .card-value-reject,
          .card-value-reject-2 {
              font-size: 32px;
          }
      }

      /* Tablets and up */
      @media (min-width: 768px) {
          .main-content {
              grid-template-columns: 1fr 1.2fr 1fr;
              gap: 25px;
          }

          .img-section {
              grid-row: span 2;
          }

          .zero-indicators {
              grid-column: span 3;
          }

          .data-grid {
              grid-column: span 3;
              grid-template-columns: repeat(3, 1fr);
              gap: 20px;
          }
      }

      @media (min-width: 1200px) {
          .main-content {
              grid-template-columns: repeat(4, 1fr);
              gap: 30px;
          }

          .zero-indicators {
              grid-column: span 4;
          }

          .data-grid {
              grid-column: span 4;
              grid-template-columns: repeat(3, 1fr);
              gap: 25px;
          }
      }

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

      body {
          margin: 0;
          padding-bottom: 40px;
          /* Ruang untuk footer */
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
          /* Batasi lebar maksimum */
          margin: 1rem auto;
          /* Posisi tengah */
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



                                          <div class="container">

                                              <main class="main-content">
                                                  <div class="img-section">
                                                      <div class="img-label">Product Image</div>
                                                  </div>

                                                  <div class="order-info">
                                                      <div class="info-item">Order No:</div>
                                                      <div class="info-item">Buyer Name:</div>
                                                      <div class="info-item">Style No:</div>
                                                      <div class="info-item">Target Output:</div>
                                                  </div>

                                                  <div class="dhu-section">
                                                      <div class="dhu-label">Ratio</div>
                                                      <div class="dhu-percentage">0%</div>
                                                  </div>

                                                  <div class="time-section">
                                                      <div class="time-label" id="current-date"></div>
                                                      <div class="dhtime-percentage" id="current-time"></div>
                                                  </div>

                                                  <div class="zero-indicators">
                                                      <div class="indicator-rft blue">0</div>
                                                      <div class="indicator-defect yellow">0 <sub>(In Line)</sub></div>
                                                      <div class="indicator-reject red">0</div>
                                                  </div>

                                                  <div class="data-grid">
                                                      <div class="data-card-rft">
                                                          <div class="card-title-rft">RFT (Right first time)</div>
                                                          <div class="card-value-rft">0</div>
                                                          <div class="card-size-breakdown">
                                                              <div class="size-row">
                                                                  <span class="size-label">XS:</span><span class="size-count-xs">0</span>
                                                                  <span class="size-label">S:</span><span class="size-count-s">0</span>
                                                                  <span class="size-label">M:</span><span class="size-count-m">0</span>
                                                              </div>
                                                              <div class="size-row">
                                                                  <span class="size-label">L:</span><span class="size-count-l">0</span>
                                                                  <span class="size-label">XL:</span><span class="size-count-xl">0</span>
                                                                  <span class="size-label">XXL:</span><span class="size-count-xxl">0</span>
                                                              </div>
                                                          </div>
                                                      </div>
                                                      <div class="data-card-defective">
                                                          <div class="card-title-defective">Defective</div>
                                                          <div class="card-value-defective">0</div>
                                                      </div>
                                                      <div class="data-card-reject">
                                                          <div class="card-title-reject">Reject</div>
                                                          <div class="card-value-reject">0</div>
                                                      </div>
                                                      <div class="data-card-rft-2 blue-card-2">
                                                          <div class="card-title-rft-2">Rectified</div>
                                                          <div class="card-value-rft-2">0</div>
                                                          <div class="card-size-breakdown">
                                                              <div class="size-row">
                                                                  <span class="size-label">XS:</span><span class="size-count-rectified-xs">0</span>
                                                                  <span class="size-label">S:</span><span class="size-count-rectified-s">0</span>
                                                                  <span class="size-label">M:</span><span class="size-count-rectified-m">0</span>
                                                              </div>
                                                              <div class="size-row">
                                                                  <span class="size-label">L:</span><span class="size-count-rectified-l">0</span>
                                                                  <span class="size-label">XL:</span><span class="size-count-rectified-xl">0</span>
                                                                  <span class="size-label">XXL:</span><span class="size-count-rectified-xxl">0</span>
                                                              </div>
                                                          </div>
                                                      </div>
                                                      <div class="data-card-defective-2 olive-card">
                                                          <div class="card-title-defective-2">Repeat defect</div>
                                                          <div class="card-value-defective-2">0</div>
                                                      </div>
                                                      <div class="data-card-reject-2 red-card">
                                                          <div class="card-title-reject-2">Rework reject</div>
                                                          <div class="card-value-reject-2">0</div>
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
                                    $this->ecc_library->form('text', 'RFID No', "defective_form_" . $methodid, 'rfid_no', '', 'required', '');
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
                                          <i class="fas fa-redo"></i> Retake Photo
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
                                  @media (max-width: 767.98px) {
                                      #numpad_defective_<?php echo $methodid ?>.custom-numpad {
                                          grid-template-columns: repeat(3, 1fr) !important;
                                          gap: 8px !important;
                                      }

                                      #numpad_defective_<?php echo $methodid ?>.custom-numpad-btn {
                                          width: 100% !important;
                                          height: 48px !important;
                                          font-size: 1.2rem !important;
                                      }

                                      #numpad_defective_<?php echo $methodid ?>.custom-qwerty {
                                          grid-template-columns: repeat(7, 1fr) !important;
                                          gap: 6px !important;
                                      }

                                      #numpad_defective_<?php echo $methodid ?>.custom-qwerty-btn {
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
                                      background: #00e6e6;
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

                                  .switch-numpad-btn {
                                      margin-top: 10px;
                                      background: #17a2b8;
                                      border: none;
                                      color: white;
                                      padding: 8px 16px;
                                      border-radius: 4px;
                                      cursor: pointer;
                                      width: 100%;
                                  }
                              </style>
                              <div id="numpadContent_defective_<?php echo $methodid ?>">
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
                  <form id="repeat_defect_form_<?php echo $methodid ?>" action="javascript:post_defective_<?php echo $methodid ?>()">
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
                            $this->ecc_library->form('text', 'RFID No', "repeat_defect_form_" . $methodid, 'rfid_no', '', '', '');
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
                                  <i class="fas fa-redo"></i> Retake Photo
                              </button>
                          </div>
                          <!-- Hidden file input -->
                          <input type="file" id="cameraInput_repeat_<?php echo $methodid ?>" name="image" accept="image/*" capture="camera" style="display: none;">
                      </div>

                  </form>
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