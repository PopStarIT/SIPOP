<script type="text/javascript">
	$(function() {
		"use strict";

		// ✅ FORMATTER untuk tombol View More
		function viewMoreFormatter(cellval, opts, rowObject) {

			var fabric_shipment_no = rowObject.r19 || '-';
			var fabric_shipment_roll = rowObject.r20 || '-';
			var fabric_shipment_bale = rowObject.r21 || '-';
			var fabric_shipment_colour = rowObject.r22 || '-';
			var lot = rowObject.r23 || '-';
			var po_no = rowObject.r27 || '-';
			var fabric_shipment_weight = rowObject.r25 || '-';
			var uom_code = rowObject.r26 || '-';

			return '<button class="btn-view-more btn btn-xs btn-info" ' +

				'data-lot="' + lot + '" ' +
				'data-pono="' + po_no + '" ' +
				'data-fabric-shipment-no="' + fabric_shipment_no + '" ' +
				'data-fabric-shipment-roll="' + fabric_shipment_roll + '" ' +
				'data-fabric-shipment-bale="' + fabric_shipment_bale + '" ' +
				'data-fabric-shipment-colour="' + fabric_shipment_colour + '" ' +
				'data-fabric-shipment-weight="' + fabric_shipment_weight + '" ' +
				'data-uom-code="' + uom_code + '" ' +

				'style="white-space:nowrap;">' +
				'<i class="fa fa-eye"></i> View More' +
				'</button>';
		}

		$("#table_<?php echo $methodid ?>").jqGrid({
			url: baseurl + '<?php echo $class_uri ?>/loaddata',
			mtype: "post",
			postData: {
				'type_id': '0',
				'location_base_id': '0',
				'location_id': '0',
				'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>'
			},
			datatype: "json",

			// ✅ Tambah 'ACTION' di colNames
			colNames: [
				'item_id', 'ITEM BASE', 'ITEM DETAIL', 'ITEM NAME',
				'QTY', 'QTY USED', 'UNIT', 'LOC CODE', 'BLOCK',
				'LOC TYPE', 'RACK', 'BLOCK', 'BARCODE',
				'item_category_id', 'location_id', 'location_base_id',
				'stock_move_sipop_id', 'STATUS LOKASI',
				'ACTION' // ✅ BARU
			],

			colModel: [{
					name: 'r1',
					index: 'r1',
					hidden: true
				},
				{
					name: 'r2',
					index: 'r2'
				},
				{
					name: 'r3',
					index: 'r3'
				},
				{
					name: 'r4',
					index: 'r4'
				},
				{
					name: 'r5',
					index: 'r5'
				},
				{
					name: 'r6',
					index: 'r6'
				},
				{
					name: 'r7',
					index: 'r7'
				},
				{
					name: 'r8',
					index: 'r8',
					align: 'center'
				},
				{
					name: 'r9',
					index: 'r9',
					hidden: true
				},
				{
					name: 'r10',
					index: 'r10',
					hidden: true
				},
				{
					name: 'r11',
					index: 'r11',
					hidden: true
				},
				{
					name: 'r12',
					index: 'r12',
					hidden: false
				},
				{
					name: 'r13',
					index: 'r13'
				},
				{
					name: 'r14',
					index: 'r14',
					hidden: true
				},
				{
					name: 'r15',
					index: 'r15',
					hidden: true
				},
				{
					name: 'r16',
					index: 'r16',
					hidden: true
				},
				{
					name: 'r17',
					index: 'r17',
					hidden: true
				},
				{
					name: 'r18',
					index: 'r18',
					align: 'center',
					width: 150,
					cellattr: function(rowId, val, rawObject) {
						if (rawObject.r15 === null || rawObject.r15 === '' || rawObject.r15 === undefined) {
							return 'style="color: red; font-weight: bold;"';
						} else {
							return 'style="color: green; font-weight: bold;"';
						}
					}
				},


				// ✅ KOLOM BARU — View More Button
				{
					name: 'r_action',
					index: 'r_action',
					width: 100,
					align: 'center',
					sortable: false,
					search: false,
					formatter: viewMoreFormatter // ✅ pakai formatter di atas
				}
			],

			iconSet: "fontAwesome",
			idPrefix: "g1_",
			rownumbers: true,
			rowNum: 10,
			rowList: [10, 20, 30],
			pager: '#ptable_<?php echo $methodid ?>',
			sortname: "r1",
			sortorder: "asc",
			shrinkToFit: false,
			autowidth: true,
			height: 250,
			jsonReader: {
				repeatitems: false
			},
			viewrecords: true,
			gridview: true,

			onSelectRow: function(row_id) {
				var rowData = $("#table_<?php echo $methodid ?>").jqGrid('getRowData', row_id);
				var stock_move_sipop_id = rowData.r17;
				console.log('stock_move_sipop_id selected:', stock_move_sipop_id);
				if (stock_move_sipop_id) {
					$('#form_sub_<?php echo $methodid ?>_stock_move_sipop_id_sub').val(stock_move_sipop_id);
				} else {
					$('#form_sub_<?php echo $methodid ?>_stock_move_sipop_id_sub').val('');
				}
				$("#table_<?php echo $methodid ?>_sub").trigger('reloadGrid');
			}
		});

		$("#table_<?php echo $methodid ?>").jqGrid("setColProp", "rn", {
			hidedlg: false
		});
		$("#table_<?php echo $methodid ?>").jqGrid('navGrid', '#ptable_<?php echo $methodid ?>', {
			edit: false,
			add: false,
			del: false,
			view: false,
			search: false
		});
		$("#table_<?php echo $methodid ?>").jqGrid('filterToolbar', {
			stringResult: true,
			searchOnEnter: false,
			defaultSearch: 'cn',
			ignoreCase: false
		});

		// ✅ EVENT HANDLER — Klik tombol View More (pakai delegasi karena grid di-render dinamis)
		$(document).on('click', '.btn-view-more', function() {
			var btn = $(this);

			var lot = btn.data('lot');
			var po_no = btn.data('pono');
			var fabric_shipment_no = btn.data('fabric-shipment-no');
			var fabric_shipment_roll = btn.data('fabric-shipment-roll');
			var fabric_shipment_bale = btn.data('fabric-shipment-bale');
			var fabric_shipment_colour = btn.data('fabric-shipment-colour');
			var fabric_shipment_weight = btn.data('fabric-shipment-weight');
			var uom_code = btn.data('uom-code');


			// ✅ Isi konten modal
			$('#modal_view_more_body').html(
				'<table class="table table-bordered table-sm">' +

				'<tr><th>Lot</th><td>' + lot + '</td></tr>' +
				'<tr><th>Purchase Order No</th><td>' + po_no + '</td></tr>' +
				'<tr><th>Fabric Shipment No</th><td>' + fabric_shipment_no + '</td></tr>' +
				'<tr><th>Fabric Shipment Roll</th><td>' + fabric_shipment_roll + '</td></tr>' +
				'<tr><th>Fabric Shipment Bale</th><td>' + fabric_shipment_bale + '</td></tr>' +
				'<tr><th>Fabric Shipment Colour</th><td>' + fabric_shipment_colour + '</td></tr>' +
				'<tr><th>Fabric Shipment Weight</th><td>' + fabric_shipment_weight + '</td></tr>' +
				'<tr><th>UOM Code</th><td>' + uom_code + '</td></tr>' +


				'</table>'
			);

			// ✅ Tampilkan modal
			$('#modal_view_more').modal('show');
		});

	}); // end $(function)

	$(window).on('resize', function() {
		const $container = $('.grid_container_<?php echo $methodid; ?>');
		const $table = $("#table_<?php echo $methodid ?>");
		// Pastikan container ada dan memiliki lebar
		const containerWidth = $container.width();

		if (containerWidth > 0) {
			$table.setGridWidth(containerWidth - 20, false);
		}
		//      clearTimeout(window.gridResizeTimer);
		//      window.gridResizeTimer = setTimeout(function() {
		//       const $container = $('.grid_container_<?php //echo $methodid; 
														?>'); // Ganti dengan class/ID parent grid
		//       const $table = $('#table_<?php //echo $methodid 
											?>');  
		//    
		//    if ($table[0].grid) {
		//        const containerWidth = $container.width();
		//        // Gunakan Math.floor agar angka tidak desimal
		//        $table.setGridWidth(Math.floor(containerWidth) - 5, true);
		//    }
		//  }, 150); // Jeda 150ms agar render selesai dulu
	}).trigger('resize');


	$('#form_<?php echo $methodid ?>_location_base_id').on('change', function(event, clickedIndex, newValue, oldValue) {
		let base_id = $('#form_<?php echo $methodid ?>_location_base_id').val();
		$("#table_<?php echo $methodid ?>").jqGrid('setGridParam', {
			postData: {
				'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
				type_id: 0,
				location_base_id: base_id,
				location_id: 0
			}

		});
		$('#table_<?php echo $methodid ?>').trigger('reloadGrid');

	});

	$('#form_<?php echo $methodid ?>_add_location_id').on('change', function(event, clickedIndex, newValue, oldValue) {
		let location_id = $('#form_<?php echo $methodid ?>_add_location_id').val();
		$("#table_<?php echo $methodid ?>").jqGrid('setGridParam', {
			postData: {
				'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
				type_id: 0,
				location_base_id: 0,
				location_id: location_id
			}

		});
		$('#table_<?php echo $methodid ?>').trigger('reloadGrid');

	});
	$('#form_<?php echo $methodid ?>_add_location').on('change', function(event, clickedIndex, newValue, oldValue) {
		let location_id = $('#form_<?php echo $methodid ?>_add_location').val();
		$("#table_<?php echo $methodid ?>").jqGrid('setGridParam', {
			postData: {
				'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
				type_id: 0,
				location_base_id: 0,
				location_id: location_id
			}

		});
		$('#table_<?php echo $methodid ?>').trigger('reloadGrid');

	});

	$('#form_cari_<?php echo $methodid ?>_add_location_id').on('change', function(event, clickedIndex, newValue, oldValue) {
		let location_id = $('#form_cari_<?php echo $methodid ?>_add_location_id').val();
		$("#table_<?php echo $methodid ?>").jqGrid('setGridParam', {
			postData: {
				'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
				type_id: 0,
				location_base_id: 0,
				location_id: location_id
			}

		});
		$('#table_<?php echo $methodid ?>').trigger('reloadGrid');

	});
	$('#form_update_new_<?php echo $methodid ?>').on('change', function(event, clickedIndex, newValue, oldValue) {
		let location_id = $('#form_update_new_<?php echo $methodid ?>').val();
		$("#table_<?php echo $methodid ?>").jqGrid('setGridParam', {
			postData: {
				'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
				type_id: 0,
				location_base_id: 0,
				location_id: location_id
			}

		});
		$('#table_<?php echo $methodid ?>').trigger('reloadGrid');

	});
	$('#form_shipment_<?php echo $methodid ?>').on('change', function(event, clickedIndex, newValue, oldValue) {
		let location_id = $('#form_shipment_<?php echo $methodid ?>').val();
		$("#table_<?php echo $methodid ?>").jqGrid('setGridParam', {
			postData: {
				'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
				type_id: 0,
				location_base_id: 0,
				location_id: location_id
			}

		});
		$('#table_<?php echo $methodid ?>').trigger('reloadGrid');

	});
	$('#form_update_<?php echo $methodid ?>').on('change', function(event, clickedIndex, newValue, oldValue) {
		let location_id = $('#form_update_<?php echo $methodid ?>').val();
		$("#table_<?php echo $methodid ?>").jqGrid('setGridParam', {
			postData: {
				'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
				type_id: 0,
				location_base_id: 0,
				location_id: location_id
			}

		});
		$('#table_<?php echo $methodid ?>').trigger('reloadGrid');

	});

	function searchxxxx_<?php echo $methodid ?>() {
		//date_start = $('#form_<?php echo $methodid ?>_date_start').val();
		//date_end = $('#form_<?php echo $methodid ?>_date_end').val();  
		//type_bc_id = $('#form_<?php echo $methodid ?>_type_bc_id').val(); 

		$("#table_<?php echo $methodid ?>").jqGrid('setGridParam', {
			postData: {
				'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
				type_id: 0,
				location_base_id: 2
			}

		});
		$('#table_<?php echo $methodid ?>').trigger('reloadGrid');
	}

	$('#form_shipment_<?php echo $methodid ?>_purchase_order_detail_id_tes').on('change', function(event, clickedIndex, newValue, oldValue) {

		$('#form_shipment_<?php echo $methodid ?>_purchase_order_detail_id').html('');
		$('#form_shipment_<?php echo $methodid ?>_purchase_order_detail_id').selectpicker('refresh');
	});

	$(function() {
		"use strict";

		// Variabel untuk menyimpan timer
		var scanTimer;
		var delayTime = 1000; // 3 detik

		$('#form_<?php echo $methodid ?>_location_barcode').on('input', function() {
			var barcode = $(this).val().trim();

			// Hapus timer sebelumnya setiap kali user mengetik
			clearTimeout(scanTimer);

			// Jika inputan tidak kosong, mulai hitung mundur 3 detik
			if (barcode !== "") {
				scanTimer = setTimeout(function() {
					// Eksekusi fungsi utama
					console.log("Auto-executing scan for barcode: " + barcode);
					scan_location_barcode_<?php echo $methodid ?>(barcode);
					tampilkan_barcode_<?php echo $methodid ?>(barcode);
				}, delayTime);
			}
		});

		// Opsional: Tetap izinkan tekan 'Enter' secara manual untuk eksekusi instan
		$('#form_<?php echo $methodid ?>_location_barcode').on('keydown', function(e) {
			if (e.key === 'Enter') {
				clearTimeout(scanTimer); // Batalkan auto-delay jika sudah ditekan enter manual
				var barcode = $(this).val().trim();
				if (barcode !== "") {
					scan_location_barcode_<?php echo $methodid ?>(barcode);
					tampilkan_barcode_<?php echo $methodid ?>(barcode);
				}
			}
		});
	});

	function tampilkan_barcode_<?php echo $methodid ?>(barcode) {
		barcode = barcode.trim();

		var detected = detectBarcodeType(barcode);
		var tipeLabel = '';

		// Tentukan label tipe
		if (detected.type === 'location_code') {
			tipeLabel = '<span style="background:#17a2b8;color:#fff;' +
				'padding:2px 8px;border-radius:3px;font-size:12px;">' +
				'Location Code (LD...)</span>';
		} else if (detected.type === 'location_base_code') {
			tipeLabel = '<span style="background:#fd7e14;color:#fff;' +
				'padding:2px 8px;border-radius:3px;font-size:12px;">' +
				'Location Blok (LB...)</span>';
		} else {
			tipeLabel = '<span style="background:#28a745;color:#fff;' +
				'padding:2px 8px;border-radius:3px;font-size:12px;">' +
				'Fabric Shipment Barcode</span>';
		}

		// Isi dan tampilkan div
		$('#display_barcode_value_<?php echo $methodid ?>').text(barcode);
		$('#display_barcode_type_<?php echo $methodid ?>').html(tipeLabel);
		$('#display_barcode_input_<?php echo $methodid ?>').show();

		console.log('[barcode tampil] value:', barcode, '| tipe:', detected.type);
	}

	function detectBarcodeType(barcode) {
		barcode = barcode.trim();

		if (barcode.startsWith('LD')) {
			return {
				type: 'location_code',
				value: barcode
			};
		}

		if (barcode.startsWith('LB')) {
			return {
				type: 'location_base_code',
				value: barcode
			};
		}

		return {
			type: 'fabric_shipment_list_code',
			value: barcode
		};
	}


	function reloadGridClearFilters(newParams) {
		// Parameter default untuk membersihkan filter sebelumnya
		var defaultParams = {
			'location_base_id': 0,
			'location_id': 0,
			'fabric_shipment_list_code': '',
			'location_code': '',
			'location_base_code': '',
			'type_id': 0 // Tetap 0 sesuai permintaan Anda
		};

		// Gabungkan default dengan parameter baru yang di-scan
		var finalParams = $.extend({}, defaultParams, newParams);
		finalParams['<?php echo $this->security->get_csrf_token_name() ?>'] = '<?php echo $this->security->get_csrf_hash() ?>';

		$("#table_<?php echo $methodid ?>").jqGrid('setGridParam', {
			postData: finalParams,
			page: 1
		}).trigger('reloadGrid');
		$("#table_<?php echo $methodid ?>_stock_manual").jqGrid('setGridParam', {
			postData: finalParams,
			page: 1
		}).trigger('reloadGrid');
	}

	function scan_location_barcode_<?php echo $methodid ?>(barcode) {
		var detected = detectBarcodeType(barcode);

		if (detected.type === 'location_code') {
			reloadGridClearFilters({
				location_code: detected.value
			});
			$('#form_<?php echo $methodid ?>_location_barcode').val('').focus();
			return;
		}

		// 2. Jika yang di-scan adalah BLOK
		if (detected.type === 'location_base_code') {
			reloadGridClearFilters({
				location_base_code: detected.value
			});
			$('#form_<?php echo $methodid ?>_location_barcode').val('').focus();
			return;
		}

		if (detected.type === 'fabric_shipment_list_code') {

			var currentBarcode = barcode;
			var currentDetectedValue = detected.value;
			show_success("show", '<?php echo $page_title ?>', 'Filter berdasarkan Fabric Shipment List Code: ' + detected.value);
			reloadGrid({
				fabric_shipment_list_code: detected.value
			});
			$('#modal_fabric_confirm_message_<?php echo $methodid ?>').text(
				'Filter berdasarkan Fabric Shipment List Code: ' + currentDetectedValue
			);
			$.ajax({
				url: baseurl + '<?php echo $class_uri ?>/post_add_edit_scan_fix',
				data: {
					'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
					code_barcode: currentBarcode,
					keterangan: 0
				},
				dataType: 'json',
				method: 'post',
				success: function(data) {
					if (data.valid) {
						$('.box_prime').show();
						$('#display_barcode_<?php echo $methodid ?>').text(currentBarcode);
						$('#display_barcode_split_<?php echo $methodid ?>').text(currentBarcode);
						$('#display_stock_move_sipop_id_<?php echo $methodid ?>').text(data.stock_move_sipop_id);
						$('#display_item_code_<?php echo $methodid ?>').text(data.item_code);
						$('#display_item_name_<?php echo $methodid ?>').text(data.item_name);
						$('#display_quantity_split_<?php echo $methodid ?>').text(data.quantity);
						$('#form_update_<?php echo $methodid ?>_stock_move_sipop_id').val(data.stock_move_sipop_id);
						$('#form_split_<?php echo $methodid ?>_stock_move_sipop_id').val(data.stock_move_sipop_id);
					} else {
						if (data.message1 == 'update_location') {
							show_error("show", 'Error', data.message);
							$('#display_barcode_<?php echo $methodid ?>').text(currentBarcode);
							$('#display_barcode_split_<?php echo $methodid ?>').text(currentBarcode);
							$('#display_stock_move_sipop_id_<?php echo $methodid ?>').text(data.stock_move_sipop_id);
							$('#display_item_code_<?php echo $methodid ?>').text(data.item_code);
							$('#display_item_name_<?php echo $methodid ?>').text(data.item_name);
							$('#display_quantity_split_<?php echo $methodid ?>').text(data.quantity);
							$('#form_update_<?php echo $methodid ?>_stock_move_sipop_id').val(data.stock_move_sipop_id);
							$('#form_split_<?php echo $methodid ?>_stock_move_sipop_id').val(data.stock_move_sipop_id);

							setTimeout(function() {
								$('#modal_update_lokasi_<?php echo $methodid ?>').modal('show');
								$('#modal_receive_other_split_<?php echo $methodid ?>').modal('show');
							}, 1000);

						} else if (data.message1 == 'kosong') {

							show_error("show", 'Error', data.message);
							$('.box_prime').hide();

							$('.form_update_new_<?php echo $methodid ?>').show();

							$('#form_update_new_<?php echo $methodid ?>').data('last_scan', currentBarcode);

							$('html, body').animate({
								scrollTop: $(".form_update_new_<?php echo $methodid ?>").offset().top
							}, 500);

						} else {
							show_error("show", 'Error', data.message);
						}
					}
				},
				error: function() {
					show_error("show", 'Error', 'Gagal menghubungi server, silakan coba lagi.');
				}
			});

			$('#form_<?php echo $methodid ?>_location_barcode').val('').focus();
			return;
		}
	}

	function add_<?php echo $methodid ?>(scannedBarcode) {
		$('.form_update_new_<?php echo $methodid ?>').show();

		$('#form_update_new_<?php echo $methodid ?>_scanned_barcode').val(scannedBarcode);
	}
	$('#btn_reset_barcode_<?php echo $methodid ?>').on('click', function() {

		$('#form_<?php echo $methodid ?>_location_barcode').val('');
		$('#form_<?php echo $methodid ?>_location_base_id').val('0').selectpicker('refresh');
		$('#form_<?php echo $methodid ?>_add_location_id').val('0').selectpicker('refresh');

		var defaultPostData = {
			'type_id': '0',
			'location_base_id': '0',
			'location_id': '0',
			'fabric_shipment_list_code': '',
			'location_code': '',
			'location_base_code': '',
			'warehouse_code': '',
			'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>'
		};

		$("#table_<?php echo $methodid ?>").jqGrid('setGridParam', {
			postData: defaultPostData,
			page: 1
		}).trigger('reloadGrid');

		if ($('#badge_scan_type_<?php echo $methodid ?>').length) {
			$('#badge_scan_type_<?php echo $methodid ?>')
				.removeClass('badge-primary badge-success badge-warning')
				.addClass('badge-secondary')
				.text('Mode: Semua');
		}

		$('#form_<?php echo $methodid ?>_location_barcode').focus();

		show_success("show", 'Reset', 'Filter telah dikosongkan ke kondisi awal.');
	});

	function reloadGrid(extraParams) {
		var basePost = {
			'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
			type_id: 31,
			location_base_id: 0,
			location_id: 0,
			fabric_shipment_list_code: '',
			location_code: '',
			location_base_code: '',
			warehouse_code: ''
		};
		var postData = $.extend(basePost, extraParams);
		$("#table_<?php echo $methodid ?>").jqGrid('setGridParam', {
			postData: postData
		});

		$('#table_<?php echo $methodid ?>').trigger('reloadGrid');
		$("#table_<?php echo $methodid ?>").setGridWidth($('.grid_container_<?php echo $methodid; ?>').width() - 20, false).trigger('resize');
	}

	function reloadGrid(params = {}) {

		var defaultPost = {
			'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
			type_id: 0,
			location_base_id: 0,
			location_id: 0,
			fabric_shipment_list_code: '',
			location_code: '',
			location_base_code: '',
			warehouse_code: ''
		};

		var newPostData = Object.assign(defaultPost, params);

		$("#table_<?php echo $methodid ?>").jqGrid('setGridParam', {
			postData: newPostData,
			page: 1
		}).trigger("reloadGrid");

		$("#table_<?php echo $methodid ?>_stock_manual").jqGrid('setGridParam', {
			postData: newPostData,
			page: 1
		}).trigger("reloadGrid");
	}

	var check_submit = 0;

	function update_location_<?php echo $methodid ?>() {
		if (check_submit == 0) {

			var form_el = $("#form_update_<?php echo $methodid ?>");


			var location_val = $('#form_update_<?php echo $methodid ?>_location_id_tes').val();


			if ($('#form_update_<?php echo $methodid ?>_location_id_hidden').length === 0) {
				form_el.append(
					'<input type="hidden" ' +
					'id="form_update_<?php echo $methodid ?>_location_id_hidden" ' +
					'name="location_id" ' +
					'value="' + location_val + '">'
				);
			} else {
				$('#form_update_<?php echo $methodid ?>_location_id_hidden').val(location_val);
			}

			var data = form_el.serialize();


			check_submit = 1;
			page_loading("show", 'Save <?php echo $page_title ?>', 'Please Wait...');

			$.ajax({
				url: baseurl + '<?php echo $class_uri ?>/post_add_edit_update',
				data: data,
				dataType: 'json',
				method: 'post',
				success: function(data) {
					page_loading("hide");
					check_submit = 0;
					if (data.valid) {
						show_success("show", 'Berhasil', data.message, function() {

							$('#modal_update_lokasi_<?php echo $methodid ?>').modal('hide');

							// ✅ Reset semua field dengan benar
							$('#form_update_<?php echo $methodid ?>_location_id_tes').val('').trigger('change');
							$('#form_update_<?php echo $methodid ?>_location_id_hidden').val('');
							$('#form_update_<?php echo $methodid ?>_location_detail_id').val('').selectpicker('refresh');
							$('#form_update_<?php echo $methodid ?>_stock_move_sipop_id').val('');

							$("#table_<?php echo $methodid ?>").trigger('reloadGrid');
							$("#table_<?php echo $methodid ?>_detail").trigger('reloadGrid');
						});
					} else {
						show_error("show", 'Error', data.message);
					}
				},
				error: function() {
					page_loading("hide");
					check_submit = 0;
					show_error("show", 'Error', "Terjadi kesalahan pada server.");
				}
			});
		}
	}

	var check_submit = 0;

	function receive_other_split_post_<?php echo $methodid ?>() {
		if (check_submit == 0) {
			var form_el = $("#form_split_<?php echo $methodid ?>");
			var data = form_el.serialize();
			check_submit = 1;
			page_loading("show", 'Save <?php echo $page_title ?>', 'Please Wait...');

			$.ajax({
				url: baseurl + '<?php echo $class_uri ?>/post_add_edit_update_other_split',
				data: data,
				dataType: 'json',
				method: 'post',
				success: function(data) {
					page_loading("hide");
					check_submit = 0;
					if (data.valid) {
						show_success("show", 'Berhasil', data.message, function() {
							$('#modal_receive_other_split_<?php echo $methodid ?>').modal('hide');

							// Reset form fields
							form_el[0].reset(); // Reset form

							// Tambahkan kode ini untuk membersihkan elemen yang menggunakan selectpicker
							$('#form_split_<?php echo $methodid ?>_location_id_tes').val('').trigger('change');
							$('#form_split_<?php echo $methodid ?>_location_id_hidden').val('');
							$('#form_split_<?php echo $methodid ?>_location_detail_id').val('').selectpicker('refresh');
							$('#form_split_<?php echo $methodid ?>_stock_move_sipop_id').val('');

							$("#table_<?php echo $methodid ?>").trigger('reloadGrid');
							$("#table_<?php echo $methodid ?>_detail").trigger('reloadGrid');
						});
					} else {
						show_error("show", 'Error', data.message);
					}
				},
				error: function() {
					page_loading("hide");
					check_submit = 0;
					show_error("show", 'Error', "Terjadi kesalahan pada server.");
				}
			});
		}
	}


	$(document).ready(function() {

		$(document).on('change', '#form_update_<?php echo $methodid ?>_location_id_tes', function() {
			var selected_val = $(this).val();


			if ($('#form_update_<?php echo $methodid ?>_location_id_hidden').length > 0) {
				$('#form_update_<?php echo $methodid ?>_location_id_hidden').val(selected_val);
			}
		});
	});

	$('#form_update_new_<?php echo $methodid ?>_location_id_tes').on('change', function(event, clickedIndex, newValue, oldValue) {
		$('#form_update_new_<?php echo $methodid ?>_location_id').html('');
		$('#form_update_new_<?php echo $methodid ?>_location_id').selectpicker('refresh');
	});
	$('#form_update_<?php echo $methodid ?>_location_id_tes').on('change', function(event, clickedIndex, newValue, oldValue) {
		$('#form_update_<?php echo $methodid ?>_location_id').html('');
		$('#form_update_<?php echo $methodid ?>_location_id').selectpicker('refresh');
	});

	var check_submit = 0;

	function item_new_location_<?php echo $methodid ?>() {
		if (check_submit == 0) {
			var form_el = $("#form_update_new_<?php echo $methodid ?>");


			var location_val = $('#form_update_new_<?php echo $methodid ?>_location_id_tes').val();


			if ($('#form_update_new_<?php echo $methodid ?>_location_id_hidden').length === 0) {
				form_el.append('<input type="hidden" id="form_update_new_<?php echo $methodid ?>_location_id_hidden" name="location_id" value="' + location_val + '">');
			} else {
				$('#form_update_new_<?php echo $methodid ?>_location_id_hidden').val(location_val);
			}

			var barcode = form_el.data('last_scan');

			if (!barcode || barcode === '') {
				show_error("show", "Error", "Barcode tidak terdeteksi, silakan scan ulang.");
				return;
			}

			var data = form_el.serialize();
			data += '&fabric_shipment_list_code=' + encodeURIComponent(barcode);



			check_submit = 1;
			page_loading("show", 'Save <?php echo $page_title ?>', 'Please Wait...');

			$.ajax({
				url: baseurl + '<?php echo $class_uri ?>/post_add_edit_item_new',
				data: data,
				dataType: 'json',
				method: 'post',
				success: function(data) {
					page_loading("hide");
					check_submit = 0;
					if (data.valid) {
						show_success("show", 'Berhasil', data.message, function() {
							// Reset Form
							form_el[0].reset();
							form_el.data('last_scan', '');

							$('.form_update_new_<?php echo $methodid ?>').hide();
							$('.box_prime').show();

							// ✅ Reset semua field
							$('#form_update_new_<?php echo $methodid ?>_location_id_tes').val('').trigger('change');
							$('#form_update_new_<?php echo $methodid ?>_location_id_hidden').val('');
							$('#form_update_new_<?php echo $methodid ?>_location_detail_id').val('').selectpicker('refresh');

							$("#table_<?php echo $methodid ?>").trigger('reloadGrid');
							$("#table_<?php echo $methodid ?>_detail").trigger('reloadGrid');
						});
					} else {
						show_error("show", 'Error', data.message);
					}
				},
				error: function() {
					page_loading("hide");
					check_submit = 0;
					show_error("show", 'Error', "Terjadi kesalahan pada server.");
				}
			});
		}
	}

	$(document).ready(function() {

		$(document).on('change', '#form_update_new_<?php echo $methodid ?>_location_id_tes', function() {
			var selected_val = $(this).val();


			// Update hidden input jika sudah ada
			if ($('#form_update_new_<?php echo $methodid ?>_location_id_hidden').length > 0) {
				$('#form_update_new_<?php echo $methodid ?>_location_id_hidden').val(selected_val);
			}
		});
	});
	var check_submit = 0;

	$(document).ready(function() {

		$(document).on('change', '#form_shipment_<?php echo $methodid ?>_purchase_order_detail_id_tes', function() {
			var selected_val = $(this).val();

			$('#form_shipment_<?php echo $methodid ?>_fabric_warehouse_receive_id').val(selected_val);


		});

	});
	var check_submit = 0;

	// =================================================================
	// LISTENER: saat item_id berubah
	// → fetch fabric_warehouse_receive_detail_ids dari backend
	// =================================================================
	$(document).on('change', '#form_shipment_<?php echo $methodid ?>_item_id', function() {

		var item_id = $(this).val(); // ← integer tunggal dari dropdown
		var fabric_warehouse_receive_id = $('#form_shipment_<?php echo $methodid ?>_fabric_warehouse_receive_id').val();

		// Reset hidden field
		$('#form_shipment_<?php echo $methodid ?>_fabric_warehouse_receive_detail_ids').val('');



		if (!item_id || !fabric_warehouse_receive_id) {

			return;
		}

		var csrf_token_name = '<?php echo $this->security->get_csrf_token_name(); ?>';
		var csrf_token_value = '<?php echo $this->security->get_csrf_hash(); ?>';

		var postData = {
			item_id: item_id, // ← integer tunggal
			fabric_warehouse_receive_id: fabric_warehouse_receive_id
		};
		postData[csrf_token_name] = csrf_token_value; // ← CSRF token

		$.ajax({
			url: baseurl + '<?php echo $class_uri ?>/get_fabric_warehouse_receive_detail_ids',
			data: postData,
			dataType: 'json',
			method: 'post',
			success: function(res) {

				if (res.valid && res.fabric_warehouse_receive_detail_ids) {
					$('#form_shipment_<?php echo $methodid ?>_fabric_warehouse_receive_detail_ids')
						.val(res.fabric_warehouse_receive_detail_ids);

					console.log('[get_detail_ids] detail_ids set:',
						res.fabric_warehouse_receive_detail_ids);
				} else {

				}
			},
			error: function(xhr, status, error) {

			}
		});
	});
	// =================================================================
	// SUBMIT FORM
	// =================================================================
	function item_shipment_location_<?php echo $methodid ?>() {
		if (check_submit == 0) {

			var fabric_warehouse_receive_id = $('#form_shipment_<?php echo $methodid ?>_fabric_warehouse_receive_id').val();
			var fabric_warehouse_receive_detail_ids = $('#form_shipment_<?php echo $methodid ?>_fabric_warehouse_receive_detail_ids').val();
			var item_id = $('#form_shipment_<?php echo $methodid ?>_item_id').val();
			var location_id = $('#form_shipment_<?php echo $methodid ?>_location_id').val();

			// Debug semua value sebelum submit


			// ── VALIDASI ──────────────────────────────────────────────
			if (!fabric_warehouse_receive_id) {
				show_error("show", 'Validasi', "Silakan pilih Shipment No terlebih dahulu.");
				return;
			}
			if (!item_id) {
				show_error("show", 'Validasi', "Silakan pilih Item Code terlebih dahulu.");
				return;
			}
			if (!fabric_warehouse_receive_detail_ids) {
				show_error("show", 'Validasi', "Detail ID tidak ditemukan. Pilih ulang Item Code.");
				return;
			}
			if (!location_id) {
				show_error("show", 'Validasi', "Silakan pilih Location terlebih dahulu.");
				return;
			}

			var data = $("#form_shipment_<?php echo $methodid ?>").serialize();


			check_submit = 1;
			page_loading("show", 'Save <?php echo $page_title ?>', 'Please Wait...');

			$.ajax({
				url: baseurl + '<?php echo $class_uri ?>/post_add_edit_item_shipment',
				data: data,
				dataType: 'json',
				method: 'post',
				success: function(data) {
					page_loading("hide");
					check_submit = 0;



					if (data.valid) {
						show_success("show", 'Berhasil', data.message, function() {

							// Reset semua field
							$('#form_shipment_<?php echo $methodid ?>_location_id')
								.val('').trigger('change');
							$('#form_shipment_<?php echo $methodid ?>_stock_move_sipop_id')
								.val('');
							$('#form_shipment_<?php echo $methodid ?>_item_id')
								.val('').trigger('change');
							$('#form_shipment_<?php echo $methodid ?>_purchase_order_detail_id_tes')
								.val('').trigger('change');
							$('#form_shipment_<?php echo $methodid ?>_fabric_warehouse_receive_id')
								.val('');
							$('#form_shipment_<?php echo $methodid ?>_fabric_warehouse_receive_detail_ids')
								.val('');

							clear_shipment_<?php echo $methodid ?>();

							$("#table_<?php echo $methodid ?>").trigger('reloadGrid');
							$("#table_<?php echo $methodid ?>_detail").trigger('reloadGrid');
						});
					} else {
						show_error("show", 'Error', data.message);
					}
				},
				error: function(xhr, status, error) {
					page_loading("hide");
					check_submit = 0;

					show_error("show", 'Error', "Terjadi kesalahan pada server.");
				}
			});
		}
	}

	function scan_mobile_location_<?php echo $methodid ?>() {
		$('.form_<?php echo $methodid ?>_scan_mobile').hide();
		$('.form_<?php echo $methodid ?>_back').show();
		scan_barcode_aktif_<?php echo $methodid ?>();

	}

	function back_<?php echo $methodid ?>() {
		$('.form_<?php echo $methodid ?>_scan_mobile').show();
		$('.form_<?php echo $methodid ?>_back').hide();
		scan_barcode_keluar_<?php echo $methodid ?>();
	}


	function scan_barcode_aktif_<?php echo $methodid ?>() {
		// Definisi fungsi responsif untuk qrbox
		// Logika QRBox Responsif (HP, Tablet, Desktop)
		let dynamicQrBox = function(viewfinderWidth, viewfinderHeight) {
			let finalWidth;
			let finalHeight = 120; // Tinggi ideal untuk bidikan barcode

			if (viewfinderWidth < 600) {
				// Smartphone
				finalWidth = viewfinderWidth * 0.8;
			} else if (viewfinderWidth >= 600 && viewfinderWidth <= 1024) {
				// Tablet
				finalWidth = viewfinderWidth * 0.6;
				finalHeight = 140;
			} else {
				// Desktop
				finalWidth = viewfinderWidth * 0.4;
			}

			return {
				width: Math.floor(finalWidth),
				height: finalHeight
			};
		};
		//let html5QrcodeScanner;
		html5QrcodeScanner = new Html5QrcodeScanner(
			"reader", {
				fps: 10,
				qrbox: dynamicQrBox,
				aspectRatio: 1.0, //Membuat tampilan kamera lebih fokus 
				showTorchButtonIfSupported: true,
				videoConstraints: {
					facingMode: "environment"
				}
			}
		);

		function onScanSuccess(decodedText, decodedResult) {
			beepSound.play().catch(err => {
				console.log("Gagal memutar suara (butuh interaksi user):", err);
			});
			$('#form_<?php echo $methodid ?>_location_barcode').val(decodedText);
			//scan_barcode_<?php echo $methodid ?>(decodedText); //belum dicoba
			scan_location_barcode_<?php echo $methodid ?>(decodedText);

		}
		html5QrcodeScanner.render(onScanSuccess);
	}

	function scan_barcode_keluar_<?php echo $methodid ?>() {
		if (html5QrcodeScanner) {

			html5QrcodeScanner.clear().catch(error => {
				console.error("Gagal menghentikan scanner: ", error);
			});
		}
	}

	function add_<?php echo $methodid ?>() {
		$('.form_<?php echo $methodid ?>_barcode').show();
		$('.form_<?php echo $methodid ?>_base_id').hide();
		$('.form_update_new_<?php echo $methodid ?>').show();
		$('.box_prime').hide();

		$('.filter-function').hide();
		$('.button-function').hide();
		$('.form_shipment_<?php echo $methodid ?>_add_shipment').hide();
		$('.form_<?php echo $methodid ?>_button_location').hide();
	}

	function add_shipment_<?php echo $methodid ?>() {
		$('.form_<?php echo $methodid ?>_barcode').hide();
		$('.form_<?php echo $methodid ?>_base_id').hide();
		$('.form_update_new_<?php echo $methodid ?>').hide();
		$('.form_shipment_<?php echo $methodid ?>_add_shipment').show();
		$('.form_<?php echo $methodid ?>_button_location').hide();
		$('.box_prime').hide();
		$('.filter-function').hide();
		$('.button-function').hide();
	}

	function clear_<?php echo $methodid ?>() {
		$('.form_<?php echo $methodid ?>_barcode').show();
		$('.form_<?php echo $methodid ?>_base_id').show();
		$('.form_update_new_<?php echo $methodid ?>').hide();
		$('.form_shipment_<?php echo $methodid ?>_add_shipment').hide();
		$('.form_<?php echo $methodid ?>_button_location').show();
		$('.box_prime').show();
		$('.filter-function').show();
		$('.button-function').show();

	}

	function clear_shipment_<?php echo $methodid ?>() {
		$('.form_<?php echo $methodid ?>_barcode').show();
		$('.form_<?php echo $methodid ?>_base_id').show();
		$('.form_update_new_<?php echo $methodid ?>').hide();
		$('.form_shipment_<?php echo $methodid ?>_add_shipment').hide();
		$('.form_<?php echo $methodid ?>_button_location').show();
		$('.box_prime').show();
		$('.filter-function').show();
		$('.button-function').show();
	}
	// Gunakan MutationObserver untuk memantau perubahan visibility/display pada .form-add
	const formAdd = document.querySelector('.form-add');

	if (formAdd) {
		const filterFunction = document.querySelector('.filter-function');
		const buttonFunction = document.querySelector('.button-function');

		function checkFormAddVisibility() {
			const isVisible = formAdd.offsetParent !== null &&
				getComputedStyle(formAdd).display !== 'none' &&
				getComputedStyle(formAdd).visibility !== 'hidden';

			if (isVisible) {
				// form-add tampil → hide filter & button
				if (filterFunction) filterFunction.style.display = 'none';
				if (buttonFunction) buttonFunction.style.display = 'none';
			} else {
				// form-add hidden → tampilkan kembali filter & button
				if (filterFunction) filterFunction.style.display = '';
				if (buttonFunction) buttonFunction.style.display = '';
			}
		}

		// Jalankan sekali saat halaman load
		checkFormAddVisibility();

		// Pantau perubahan attribute style/class pada .form-add
		const observer = new MutationObserver(checkFormAddVisibility);

		observer.observe(formAdd, {
			attributes: true, // pantau perubahan attribute (style, class)
			attributeFilter: ['style', 'class'], // hanya style dan class
			subtree: false
		});
	}
	$(function() {

		$('input[name="search_type"]').change(function() {
			if ($(this).val() === 'block') {
				$('#block_form').show();
				$('#location_form').hide();
			} else {
				$('#block_form').hide();
				$('#location_form').show();
			}
		});
	});

	function print_<?php echo $methodid ?>(format) {
		date_start = $('#form_<?php echo $methodid ?>_date_start').val();
		date_end = $('#form_<?php echo $methodid ?>_date_end').val();
		type_bc_id = $('#form_<?php echo $methodid ?>_type_bc_id').val();
		// alert(baseurl + '<?php echo $class_uri ?>/loaddata');
		// alert(format);
		window.open(baseurl + '<?php echo $class_uri ?>/print_laporan_pemasukan?' + 'date_start=' + date_start + '&date_end=' + date_end + '&type_bc_id=' + type_bc_id + '&format=' + format, '_BLANK');
	}

	function print_awal_<?php echo $methodid ?>(format) {
		date_start = $('#form_<?php echo $methodid ?>_date_start').val();
		date_end = $('#form_<?php echo $methodid ?>_date_end').val();
		// alert(baseurl + '<?php echo $class_uri ?>/loaddata');
		var data_send = {
			'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
			date_start: date_start,
			date_end: date_end,
			format: format,
			print: 1
		};
		$.ajax({
			type: "POST",
			url: baseurl + '<?php echo $class_uri ?>/loaddata',
			data: data_send,
			dataType: 'json',
			complete: function() {},
			success: function(msg) {

				if (!msg.valid) {
					show_error('show', 'error', msg.des);
					return false;
				} else {
					download_file('<?php echo $methodid ?>', msg.xfile, msg.namafile, '<?php echo $this->security->get_csrf_token_name() ?>', '<?php echo $this->security->get_csrf_hash() ?>');
					return false;
				}
			}
		});
	}

	function edit_<?php echo $methodid ?>() {
		var grid = $("#table_<?php echo $methodid ?>");
		var rowId = grid.jqGrid('getGridParam', 'selrow');

		if (rowId) {
			var rowData = grid.jqGrid('getRowData', rowId);

			var stock_move_id = rowData.r17;
			var item_code = rowData.r3;
			var item_name = rowData.r4;
			var barcode = rowData.r13;

			$('#form_update_<?php echo $methodid ?>_stock_move_sipop_id').val(stock_move_id);

			$('#display_barcode_<?php echo $methodid ?>').text(barcode);
			$('#display_item_code_<?php echo $methodid ?>').text(item_code);
			$('#display_item_name_<?php echo $methodid ?>').text(item_name);
			$('#display_stock_move_sipop_id<?php echo $methodid ?>').text(stock_move_id);

			$('#modal_update_lokasi_<?php echo $methodid ?>').modal('show');

		} else {
			swal("Peringatan", "Silakan pilih data pada tabel terlebih dahulu!", "warning");
		}
	}

	function receive_other_split_<?php echo $methodid ?>() {
		var grid = $("#table_<?php echo $methodid ?>");
		var rowId = grid.jqGrid('getGridParam', 'selrow');

		if (rowId) {
			var rowData = grid.jqGrid('getRowData', rowId);

			var stock_move_id = rowData.r17;
			var parent_id = rowData.r17;
			var item_code = rowData.r3;
			var item_name = rowData.r4;
			var barcode = rowData.r13;
			var quantity = rowData.r5;
			var item_id = rowData.r1;

			$('#form_split_<?php echo $methodid ?>_stock_move_sipop_id').val(stock_move_id);

			$('#form_split_<?php echo $methodid ?>_item_id').val(item_id);
			$('#form_split_<?php echo $methodid ?>_parent_id').val(parent_id);


			$('#display_barcode_split_<?php echo $methodid ?>').text(barcode);
			$('#display_item_code_split_<?php echo $methodid ?>').text(item_code);
			$('#display_item_name_split_<?php echo $methodid ?>').text(item_name);
			$('#display_stock_move_sipop_id_split_<?php echo $methodid ?>').text(stock_move_id);
			$('#display_quantity_split_<?php echo $methodid ?>').text(quantity);

			$('#modal_receive_other_split_<?php echo $methodid ?>').modal('show');

		} else {
			swal("Peringatan", "Silakan pilih data pada tabel terlebih dahulu!", "warning");
		}
	}


	function shipment_list_code_<?php echo $methodid ?>() {
		var grid = $("#table_<?php echo $methodid ?>");
		var rowId = grid.jqGrid('getGridParam', 'selrow');

		if (rowId) {
			var rowData = grid.jqGrid('getRowData', rowId);

			var stock_move_id = rowData.r17;
			var item_code = rowData.r3;
			var item_name = rowData.r4;
			var barcode = rowData.r13;




			window.open(baseurl + '<?php echo $class_uri ?>/cetak_shipment_list_code?' + 'stock_move_id=' + stock_move_id, '_BLANK');


		} else {
			swal("Peringatan", "Silakan pilih data pada tabel terlebih dahulu!", "warning");
		}
	}

	$('#form_update_new_<?php echo $methodid ?>_purchase_order_warehouse_id').on('change', function(event, clickedIndex, newValue, oldValue) {

		$('#form_update_new_<?php echo $methodid ?>_item_id').html('');
		$('#form_update_new_<?php echo $methodid ?>_item_id').selectpicker('refresh');
	});


	$(document).ready(function() {
		// Fungsi untuk mengatur tampilan berdasarkan nilai radio button
		$('input[name="filter_type"]').on('change', function() {
			var value = $(this).val();

			// Elemen kontainer
			var allContent = $('#wrapper_all_<?php echo $methodid ?>');
			var manualContent = $('#wrapper_manual_<?php echo $methodid ?>');

			if (value === 'all') {
				allContent.show(); // Tampilkan Tabel
				manualContent.hide(); // Sembunyikan Tulisan Manual
			} else if (value === 'manual') {
				allContent.hide(); // Sembunyikan Tabel
				manualContent.show(); // Tampilkan Tulisan Manual

				// Tips: Jika menggunakan jqGrid atau DataTables, 
				// terkadang butuh trigger resize agar tabel tidak berantakan saat muncul kembali
				$(window).trigger('resize');
			}
		});
	});
</script>