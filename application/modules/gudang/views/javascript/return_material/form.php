<script type="text/javascript">
	$(".form_tab_<?php echo $methodid ?>").on("click", "a", function(e) {
		e.preventDefault();
		setTimeout(function() {


			$("#table_<?php echo $methodid ?>_detail").trigger('reloadGrid');
			$("#table_<?php echo $methodid ?>_detail").setGridWidth($('.grid_container_<?php echo $methodid; ?>_detail').width() - 20, true).trigger('resize');
			$("#table_<?php echo $methodid ?>_cek").trigger('reloadGrid');
			$("#table_<?php echo $methodid ?>_cek").setGridWidth($('.grid_container_<?php echo $methodid; ?>_cek').width() - 20, true).trigger('resize');
			$("#table_<?php echo $methodid ?>_cek_supply").trigger('reloadGrid');
			$("#table_<?php echo $methodid ?>_cek_supply").setGridWidth($('.grid_container_<?php echo $methodid; ?>_cek_supply').width() - 20, true).trigger('resize');
			$("#table_<?php echo $methodid ?>_return").trigger('reloadGrid');
			$("#table_<?php echo $methodid ?>_return").setGridWidth($('.grid_container_<?php echo $methodid; ?>_return').width() - 20, true).trigger('resize');

			$('.tab_scrollbar').getNiceScroll().resize();

			$('#form_<?php echo $methodid ?>_detail').focus();
		}, 1000);

		var html5QrcodeScanner;

	});

	$('#form_<?php echo $methodid ?>_detail_purchase_order_warehouse_id').on('change', function(event, clickedIndex, newValue, oldValue) {
		//item_fabric_id
		$('#form_<?php echo $methodid ?>_detail_item_fabric_id').html('');
		$('#form_<?php echo $methodid ?>_detail_item_fabric_id').selectpicker('refresh');

		$('#form_<?php echo $methodid ?>_detail_item_id').html('');
		$('#form_<?php echo $methodid ?>_detail_item_id').selectpicker('refresh');

		change_form_<?php echo $methodid ?>_detail_item_fabric_id();
	});

	$('#form_<?php echo $methodid ?>_detail_item_fabric_id').on('change', function(event, clickedIndex, newValue, oldValue) {
		//item_fabric_id
		$('#form_<?php echo $methodid ?>_detail_item_id').html('');
		$('#form_<?php echo $methodid ?>_detail_item_id').selectpicker('refresh');
		change_form_<?php echo $methodid ?>_detail_item_id();
	});

	function cancel_<?php echo $methodid ?>() {
		$('#panel_content_<?php echo $methodid ?>').show();
		$('#panel_content_form_<?php echo $methodid ?>').hide();
		$("#table_<?php echo $methodid ?>").trigger('reloadGrid');
	}

	function save_<?php echo $methodid ?>() {
		$('#form_<?php echo $methodid ?>').submit();
	}

	function save_return_<?php echo $methodid ?>() {

		$('#form_return_<?php echo $methodid ?>').submit();
	}

	function edit_<?php echo $methodid ?>(id) {
		page_loading("show", '<?php echo $page_title ?>', 'Please Wait...');
		//alert(id+'loader');
		$.ajax({
			url: baseurl + 'loader',
			data: {
				'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
				param: 'data_fabric_return',
				param_pop: 'db_pop',
				id: id

			},
			dataType: 'json',
			method: 'post',
			success: function(data) {
				page_loading("hide");

				$('#form_<?php echo $methodid ?>_work_order_return_id').val(data[0].work_order_return_id);
				$('#form_detail_return_<?php echo $methodid ?>_work_order_return_id').val(data[0].work_order_return_id);
				$('#form_detail_return_<?php echo $methodid ?>_fabric_transfer_id').val(data[0].fabric_transfer_id);
				$('#form_<?php echo $methodid ?>_work_order_request_id').val(data[0].work_order_request_id);
				$('#form_<?php echo $methodid ?>_work_order_plan_id').val(data[0].work_order_plan_id);

				$('#form_detail_<?php echo $methodid ?>_work_order_return_id').val(data[0].work_order_return_id);
				$('#form_detail_<?php echo $methodid ?>_work_order_request_id').val(data[0].work_order_request_id);
				$('#form_detail_<?php echo $methodid ?>_work_order_plan_id').val(data[0].work_order_plan_id);
				$('#form_detail_<?php echo $methodid ?>_work_order_return_id').val(data[0].work_order_return_id);

				$('#form_detail_<?php echo $methodid ?>_fabric_transfer_id').val(data[0].fabric_transfer_id);
				$('#form_cek_<?php echo $methodid ?>_fabric_transfer_id').val(data[0].fabric_transfer_id);
				$('#form_return_<?php echo $methodid ?>_work_order_return_id').val(data[0].work_order_return_id);

				$('#form_<?php echo $methodid ?>_work_order_return_no').val(data[0].work_order_return_no);
				$('#form_<?php echo $methodid ?>_work_order_plan_id').val(data[0].work_order_plan_id);
				$('#form_<?php echo $methodid ?>_work_order_return_date').val(data[0].work_order_return_date);
				$('#form_<?php echo $methodid ?>_work_process_id').val(data[0].work_process_id);

				$('#form_<?php echo $methodid ?>_detail_work_order_request_id').val(data[0].work_order_request_id);
				$('#form_return_<?php echo $methodid ?>_fabric_transfer_supply_id').val(data[0].fabric_transfer_supply_id);
				$('#form_detail_<?php echo $methodid ?>_fabric_transfer_supply_id').val(data[0].fabric_transfer_supply_id);

				$("#tab_<?php echo $methodid; ?>").attr("data-toggle", "tab");
				$("#tab_<?php echo $methodid; ?>").removeClass("tab_disabled");


				$('.panel_<?php echo $methodid ?>_panel_detail').show();
				//$('.panel_<?php echo $methodid ?>_panel_purchase_request').hide();

				setTimeout(function() {
					$('.tab_scrollbar').getNiceScroll().resize();
				}, 100);

				$("#table_<?php echo $methodid ?>_cek_supply").trigger('reloadGrid');
				$("#table_<?php echo $methodid ?>_cek_supply").setGridWidth($('.grid_container_<?php echo $methodid; ?>_cek_supply').width() - 20, true).trigger('resize');
				$("#table_<?php echo $methodid ?>_return").trigger('reloadGrid');
				$("#table_<?php echo $methodid ?>_return").setGridWidth($('.grid_container_<?php echo $methodid; ?>_return').width() - 20, true).trigger('resize');
			}
		});
	}

	function edit_detail_<?php echo $methodid ?>(id) {

		page_loading("show", '<?php echo $page_title ?>', 'Please Wait...');

		$.ajax({
			url: baseurl + 'loader',
			data: {
				'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
				param: 'data_fabric_return_request',
				param_pop: 'db_pop',
				id: id
			},
			dataType: 'json',
			method: 'post',
			success: function(data) {
				page_loading("hide");

				if (data && data.length > 0) {

					var returnId = data[0].work_order_return_id;
					if (!returnId || returnId == "") {
						returnId = $('#form_<?php echo $methodid ?>_work_order_return_id').val();
					}

					$('#form_return_<?php echo $methodid ?>_work_order_return_detail_id').val(data[0].work_order_return_detail_id);
					$('#form_return_<?php echo $methodid ?>_work_order_return_id').val(returnId); // Ini target Anda
					$('#form_return_<?php echo $methodid ?>_fabric_transfer_detail_id').val(data[0].fabric_transfer_detail_id);

					$('#form_return_<?php echo $methodid ?>_quantity_available').val(data[0].quantity_available);

					$('#form_return_<?php echo $methodid ?>_return_dummy').val(data[0].return_dummy);

					$('#form_cek_<?php echo $methodid ?>_fabric_transfer_id').val(data[0].fabric_transfer_id);
					$('#form_return_<?php echo $methodid ?>_fabric_transfer_supply_id').val(data[0].fabric_transfer_supply_id);
					$('#form_return_<?php echo $methodid ?>_barcode_return').val(data[0].barcode_return);


					$('#form_return_<?php echo $methodid ?>_fabric_transfer_supply_id').val(data[0].fabric_transfer_supply_id);
					$('#form_detail_<?php echo $methodid ?>_fabric_transfer_supply_id').val(data[0].fabric_transfer_supply_id);

					if (data[0].return_request) {
						$('#form_return_<?php echo $methodid ?>_return_request').val(data[0].return_request);
					}

					$('#detailModal').modal('show');
					validate_return_qty_<?php echo $methodid ?>();
				} else {
					alert("Data tidak ditemukan atau gagal memuat data.");
				}

				setTimeout(function() {
					$('.tab_scrollbar').getNiceScroll().resize();
				}, 100);
			},
			error: function() {
				page_loading("hide");
				alert("Terjadi kesalahan pada server.");
			}
		});
	}

	function submit_req_<?php echo $methodid ?>(id) {

		var finalValue = $("#" + id + "_r27").val();
		if (finalValue === undefined) {
			finalValue = $("#" + "<?php echo $methodid ?>_cek").jqGrid('getCell', id, 'r27');
		}

		if (finalValue === "" || finalValue === null) {
			alert("Silahkan isi Return Dummy terlebih dahulu.");
			return;
		}

		page_loading("show", 'Processing', 'Please Wait...');

		$.ajax({
			url: baseurl + 'loader',
			data: {
				'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
				param: 'data_fabric_return_request',
				param_pop: 'db_pop',
				id: id
			},
			dataType: 'json',
			method: 'post',
			success: function(data) {
				if (data && data.length > 0) {

					var returnId = data[0].work_order_return_id;
					if (!returnId || returnId == "") {
						returnId = $('#form_<?php echo $methodid ?>_work_order_return_id').val();
					}

					$('#form_return_<?php echo $methodid ?>_work_order_return_detail_id').val(data[0].work_order_return_detail_id);
					$('#form_detail_return_<?php echo $methodid ?>_work_order_return_id').val(data[0].work_order_return_id);
					$('#form_return_<?php echo $methodid ?>_fabric_transfer_supply_id').val(data[0].fabric_transfer_supply_id);
					$('#form_return_<?php echo $methodid ?>_barcode_return').val(data[0].barcode_return);

					$('#form_return_<?php echo $methodid ?>_return_request').val(finalValue);

					page_loading("hide");
					post_return_<?php echo $methodid ?>();

					setTimeout(function() {
						$("#table_<?php echo $methodid ?>_cek").trigger('reloadGrid');
						$("#table_<?php echo $methodid ?>_cek").setGridWidth($('.grid_container_<?php echo $methodid; ?>_cek').width() - 20, true).trigger('resize');
						$('.tab_scrollbar').getNiceScroll().resize();
					}, 800);

				} else {
					page_loading("hide");
					alert("Data detail tidak ditemukan.");
				}
				$("#table_<?php echo $methodid ?>_return").trigger('reloadGrid');
				$("#table_<?php echo $methodid ?>_return").setGridWidth($('.grid_container_<?php echo $methodid; ?>_return').width() - 20, true).trigger('resize');
				$("#table_<?php echo $methodid ?>_cek").trigger('reloadGrid');
				$("#table_<?php echo $methodid ?>_cek").setGridWidth($('.grid_container_<?php echo $methodid; ?>_cek').width() - 20, true).trigger('resize');
				$('.tab_scrollbar').getNiceScroll().resize();
			},
			error: function() {
				page_loading("hide");
				alert("Terjadi kesalahan sistem saat mengambil data detail.");
			}
		});
	}

	var click_cek_<?php echo $methodid ?> = function(row_id, isSelected) {

		if (!isSelected) {

			$('#form_detail_<?php echo $methodid ?>_fabric_transfer_id').val('');
		} else {

			var rowData = jQuery("#table_<?php echo $methodid ?>_detail").jqGrid('getRowData', row_id);

			$('#form_detail_<?php echo $methodid ?>_fabric_transfer_id').val(row_id);
		}

		$("#table_<?php echo $methodid ?>_cek").trigger('reloadGrid');
	};
	var click_return_<?php echo $methodid ?> = function(row_id, isSelected) {

		if (!isSelected) {

			$('#form_detail_<?php echo $methodid ?>_fabric_transfer_supply_id').val('');
		} else {

			var rowData = jQuery("#table_<?php echo $methodid ?>_cek").jqGrid('getRowData', row_id);

			$('#form_detail_<?php echo $methodid ?>_fabric_transfer_supply_id').val(row_id);
		}

		$("#table_<?php echo $methodid ?>_return").trigger('reloadGrid');
	};
	var click_cek_supply_<?php echo $methodid ?> = function(row_id, isSelected) {

		if (!isSelected) {

			$('#form_cek_supply_<?php echo $methodid ?>_fabric_transfer_supply_id').val('');
		} else {

			var rowData = jQuery("#table_<?php echo $methodid ?>_fabric_transfer_supply_id").jqGrid('getRowData', row_id);

			$('#form_cek_supply_<?php echo $methodid ?>_fabric_transfer_supply_id').val(row_id);
		}

		$("#table_<?php echo $methodid ?>_return").trigger('reloadGrid');
	};

	var check_submit = 0;

	function post_<?php echo $methodid ?>() {

		if (check_submit == 0) {
			check_submit = 1;
			page_loading("show", 'Save <?php echo $page_title ?>', 'Please Wait...');
			var data = $("#form_<?php echo $methodid ?>").serialize();

			$.ajax({
				url: baseurl + '<?php echo $class_uri ?>/post_add_edit',
				data: data,
				dataType: 'json',
				method: 'post',
				success: function(data) {
					page_loading("hide");
					check_submit = 0;
					if (data.valid) {
						show_success("show", ' Berhasil', data.message);

						$('#form_<?php echo $methodid ?>_work_order_return_id').val('');
						$('#form_<?php echo $methodid ?>_work_process_id').val('');
						$('#form_<?php echo $methodid ?>_work_order_plan_id').val('');
						$('#form_<?php echo $methodid ?>_work_order_return_date').val('');
						$('#form_<?php echo $methodid ?>_work_order_return_no').val('');
						$('#panel_content_<?php echo $methodid ?>').show();
						$('#panel_content_form_<?php echo $methodid ?>').hide();
						$("#table_<?php echo $methodid ?>").trigger('reloadGrid');
					} else {
						show_error("show", 'Error', data.message);
					}
				},
				error: function(xhr, error) {
					show_error("show", xhr.status.toString() + ' ' + xhr.statusText, 'Please try again');
					check_submit = 0;
				}
			});
		}
	}
	var check_submit = 0;

	function post_return_<?php echo $methodid ?>() {
		if (check_submit == 0) {
			var data = $("#form_return_<?php echo $methodid ?>").serialize();
			check_submit = 1;
			page_loading("show", 'Save <?php echo $page_title ?>', 'Please Wait...');

			$.ajax({
				url: baseurl + '<?php echo $class_uri ?>/post_add_edit_detail',
				data: data,
				dataType: 'json',
				method: 'post',
				success: function(data) {
					page_loading("hide");
					check_submit = 0;
					if (data.valid) {
						show_success("show", ' Berhasil', data.message, function() {

							$('#detailModal').modal('hide');

							$('#form_return_<?php echo $methodid ?>_work_order_return_detail_id').val('');

							$('#form_return_<?php echo $methodid ?>_fabric_transfer_detail_id').val('');
							$('#form_return_<?php echo $methodid ?>_quantity_received').val('');
							$('#form_return_<?php echo $methodid ?>_return_request').val('');
							$('#form_return_<?php echo $methodid ?>_barcode_return').val('');

							$("#table_<?php echo $methodid ?>").trigger('reloadGrid');
							$("#table_<?php echo $methodid ?>_detail").trigger('reloadGrid');
							$("#table_<?php echo $methodid ?>_return").trigger('reloadGrid');
							$("#table_<?php echo $methodid ?>_cek").trigger('reloadGrid');

							$('.tab_scrollbar').getNiceScroll().resize();
						});
						$("#table_<?php echo $methodid ?>_cek_supply").trigger('reloadGrid');
						$("#table_<?php echo $methodid ?>_cek_supply").setGridWidth($('.grid_container_<?php echo $methodid; ?>_cek_supply').width() - 20, true);
					} else {
						show_error("show", 'Error', data.message);
					}
				}
			});
		}
	}

	$(document).ready(function() {

		$('#form_return_<?php echo $methodid ?>_return_request').on('keyup change', function() {
			validate_return_qty_<?php echo $methodid ?>();
		});

	});

	function validate_return_qty_<?php echo $methodid ?>() {

		var qty_received = parseFloat($('#form_return_<?php echo $methodid ?>_quantity_available').val()) || 0;
		var qty_request = parseFloat($('#form_return_<?php echo $methodid ?>_return_request').val()) || 0;

		var btnSave = $('#btn_save_return_<?php echo $methodid ?>');
		var errorMsg = $('#error_msg_<?php echo $methodid ?>');

		if (qty_request > qty_received) {

			btnSave.hide();
			errorMsg.fadeIn();

			$('#form_return_<?php echo $methodid ?>_return_request').css('border', '2px solid red');
		} else {

			btnSave.show();
			errorMsg.fadeOut();

			$('#form_return_<?php echo $methodid ?>_return_request').css('border', '');
		}
	}

	function return_barcode_<?php echo $methodid ?>_return(id) {

		var work_order_return_detail_id = id;

		window.open(baseurl + '<?php echo $class_uri ?>/cetak_barcode_return?' + 'work_order_return_detail_id=' + work_order_return_detail_id, '_BLANK');

	}

	function delete_<?php echo $methodid ?>_return(id) {
		if (check_submit == 0) {
			swal({
				title: "Confirm Cancel Request ?",
				type: "question",
				dangerMode: true,
				showCancelButton: !0,
				confirmButtonClass: "btn btn-danger m-1",
				cancelButtonClass: "btn btn-secondary m-1",
				confirmButtonText: "Confirm",
				cancelButtonText: "Cancel",
				backdrop: true,
				allowOutsideClick: false,
			}).then((result) => {
				if (result.value) {

					page_loading("show", 'Cancel Request', 'Please Wait...');
					$.ajax({
						url: baseurl + '<?php echo $class_uri ?>/delete_req_return',
						data: {
							'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
							work_order_return_detail_id: id
						},
						dataType: 'json',
						method: 'post',
						success: function(data) {
							page_loading("hide");
							check_submit = 0;
							if (data.valid) {
								show_success("show", 'Cancel Request', data.message);
								//$("#table_<?php echo $methodid ?>_keluarga").trigger('reloadGrid');
								//cancel_keluarga_<?php echo $methodid ?>();

								$("#table_<?php echo $methodid ?>_return").trigger('reloadGrid');
								$("#table_<?php echo $methodid ?>_return").setGridWidth($('.grid_container_<?php echo $methodid; ?>_return').width() - 20, true).trigger('resize');
								$("#table_<?php echo $methodid ?>_cek_supply").trigger('reloadGrid');
								$("#table_<?php echo $methodid ?>_cek_supply").setGridWidth($('.grid_container_<?php echo $methodid; ?>_cek_supply').width() - 20, true).trigger('resize');
								$('.tab_scrollbar').getNiceScroll().resize();

								setTimeout(function() {
									$('.tab_scrollbar').getNiceScroll().resize();
								}, 100);
							} else {
								show_error("show", 'Error', data.message);
							}
						},
						error: function(xhr, error) {
							show_error("show", xhr.status.toString() + ' ' + xhr.statusText, 'Please try again');
							check_submit = 0;
						}
					});

				} else if (result.dismiss === swal.DismissReason.cancel) {
					swal.closeModal();
					check_submit = 0;
				}
			})
		}
	}



	function handle_barcode_scan(e, methodid) {
		if (e.keyCode === 13) { // Enter key
			e.preventDefault();
			supply_fabric_barcode(methodid);
		}
	}


	$(document).ready(function() {
		// Fokuskan kursor ke input barcode saat halaman siap
		$('#form_<?php echo $methodid ?>_supply_fabric_barcode').focus();

		// Event listener Enter Key
		$('#form_<?php echo $methodid ?>_supply_fabric_barcode').on('keypress', function(e) {
			if (e.which === 13) {
				e.preventDefault();
				supply_fabric_barcode_<?php echo $methodid ?>();
			}
		});

		let barcodeTimeout;
		$('#form_<?php echo $methodid ?>_supply_fabric_barcode').on('input', function() {
			clearTimeout(barcodeTimeout);
			barcodeTimeout = setTimeout(function() {
				let barcodeValue = $('#form_<?php echo $methodid ?>_supply_fabric_barcode').val();
				if (barcodeValue.length > 0) {
					supply_fabric_barcode_<?php echo $methodid ?>();
				}
			}, 500); // Tunggu 500ms setelah input terakhir
		});

	});

	function supply_fabric_barcode_<?php echo $methodid ?>() {
		let input_element = $('#form_<?php echo $methodid ?>_supply_fabric_barcode');
		let code_barcode = input_element.val().trim();
		let fabric_transfer_id = $('#form_cek_<?php echo $methodid ?>_fabric_transfer_id').val();
		let grid_id = "table_<?php echo $methodid ?>_cek_supply";

		if (code_barcode === "") {
			return;
		}

		page_loading("show");

		// 1. Jalankan reload grid untuk mencoba mencari data
		$("#" + grid_id).jqGrid('setGridParam', {
			postData: {
				code_barcode: code_barcode,
				fabric_transfer_id: fabric_transfer_id,
				methodid: '<?php echo $methodid ?>',
				is_barcode_scanned: 'true'
			},
			page: 1
		}).trigger('reloadGrid');

		// 2. AJAX untuk validasi keberadaan data
		$.ajax({
			url: baseurl + '<?php echo $class_uri ?>/loaddata_cek_supply',
			type: 'POST',
			dataType: 'json',
			data: {
				'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
				'code_barcode': code_barcode,
				'fabric_transfer_id': fabric_transfer_id,
				'methodid': '<?php echo $methodid ?>',
				'is_barcode_scanned': 'true'
			},
			success: function(response) {
				page_loading("hide");

				if (parseInt(response.records) > 0) {
					// Jika sukses, kosongkan input dan fokus kembali
					input_element.val('').focus();
				} else {
					// Tampilkan error
					show_error("show", 'Validasi Gagal', 'Barcode tidak ditemukan atau Fabric Transfer tidak sesuai!');

					// --- BAGIAN SOLUSI: Reload ke posisi awal ---
					input_element.val('').focus();

					$("#" + grid_id).jqGrid('setGridParam', {
						postData: {
							code_barcode: '', // Kosongkan barcode agar kembali ke data awal
							fabric_transfer_id: fabric_transfer_id,
							methodid: '<?php echo $methodid ?>',
							is_barcode_scanned: 'false' // Kembalikan ke mode load awal (filter qty_return > 0)
						},
						page: 1
					}).trigger('reloadGrid');
				}
			},
			error: function() {
				page_loading("hide");
				show_error("show", 'Error', 'Terjadi kesalahan sistem');
			}
		});
	}















	$('#form_<?php echo $methodid ?>_supply_fabric_barcode').keydown(function(e) {
		if (e.key === 'Enter') {
			var supply_barcode = $('#form_<?php echo $methodid ?>_supply_fabric_barcode').val();

			scan_barcode_<?php echo $methodid ?>(supply_barcode);

		}

	});

	function scan_barcode_<?php echo $methodid ?>(code_barcode) {

		let fabric_transfer_id = $('#form_<?php echo $methodid ?>_supply_work_order_transfer_id').val();
		let work_order_request_id = $('#form_<?php echo $methodid ?>_supply_work_order_request_id').val();

		$.ajax({
			url: baseurl + '<?php echo $class_uri ?>/loaddata_cek_supply',
			data: {
				'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
				code_barcode: code_barcode,
				fabric_transfer_id: fabric_transfer_id,
				work_order_request_id: work_order_request_id,
				keterangan: 0
			},
			dataType: 'json',
			method: 'post',
			success: function(data) {

				$('#form_<?php echo $methodid ?>_supply_fabric_barcode').val('');
				page_loading("hide");
				if (data.bc_no == null) {
					bc_no = '-';
					bc_date = '-';
					custom_name = 'Saldo Awal';
					html = '<label for="nama" style="display: block; text-align: left;">From : ' + custom_name + '</label><label for="nama" style="display: block; text-align: left;">Qty available : ' + data.quantity_available + '</label>';
				} else {
					bc_no = data.bc_no;
					bc_date = data.bc_date;
					custom_name = data.custom_name;
					html = '<label for="nama" style="display: block; text-align: left;">Dokumen : ' + custom_name + '</label><label for="nama" style="display: block; text-align: left;">Nopen : ' + bc_no + ' Date : ' + bc_date + ' </label><label for="nama" style="display: block; text-align: left;">Qty available : ' + data.quantity_supply + '</label>';
				}

				if (data.valid) {
					swal({
						title: 'Available Stock',
						html: html + '<input type="text" id="qty_supply" class="swal2-input" name="qty_supply" value=' + data.quantity + '>',
						//  input: 'text', // Tipe input (akan tersembunyi karena kita pakai 'html' kustom, tapi tetap berguna untuk fungsionalitas janji/promise)
						showCancelButton: true, // Menampilkan tombol batal
						confirmButtonText: 'Supply', // Mengubah teks tombol konfirmasi
						cancelButtonText: 'Cancel', // Mengubah teks tombol batal
						focusConfirm: false, // Agar fokus ke input pertama
						preConfirm: () => {
							// const nama = document.getElementById('nama').value;
							qty_supply = document.getElementById('qty_supply').value;

							var data_send = {
								'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
								qty_supply: qty_supply.replace(/,/g, "."),
								code_barcode: code_barcode,
								fabric_transfer_id: fabric_transfer_id,
								work_order_request_id: work_order_request_id,
								fabric_transfer_detail_id: data.fabric_transfer_detail_id,
								keterangan: 1
							};

							$.ajax({
								type: "POST",
								url: baseurl + '<?php echo $class_uri ?>/loaddata_cek',
								data: data_send,
								dataType: 'json',
								success: function(msg) {
									// console.log(msg.fabric_transfer_detail_id);
									if (msg.valid) {
										show_success("show", '<?php echo $page_title ?>', msg.message);


									} else {

										show_error("show", 'Error', msg.message);
									}

									$('#form_<?php echo $methodid ?>_supply_stock_move_id').val('');
									$('#form_<?php echo $methodid ?>_supply_fabric_transfer_detail_id').val(msg.fabric_transfer_detail_id);

									$("#table_<?php echo $methodid ?>_supply").trigger('reloadGrid');
									$("#table_<?php echo $methodid ?>_supply").setGridWidth($('.grid_container_<?php echo $methodid; ?>_supply').width() - 20, true).trigger('resize');

									$("#table_<?php echo $methodid ?>_list_transfer").trigger('reloadGrid');
									$("#table_<?php echo $methodid ?>_list_transfer").setGridWidth($('.grid_container_<?php echo $methodid; ?>_list_transfer').width() - 20, true).trigger('resize');

								}
							});

						}
					})

				} else {
					show_error("show", 'Error', data.message);

					$('#form_<?php echo $methodid ?>_supply_stock_move_id').val('');
					$('#form_<?php echo $methodid ?>_supply_fabric_transfer_detail_id').val(data.fabric_transfer_detail_id);

					$("#table_<?php echo $methodid ?>_supply").trigger('reloadGrid');
					$("#table_<?php echo $methodid ?>_supply").setGridWidth($('.grid_container_<?php echo $methodid; ?>_supply').width() - 20, true).trigger('resize');

					$("#table_<?php echo $methodid ?>_list_transfer").trigger('reloadGrid');
					$("#table_<?php echo $methodid ?>_list_transfer").setGridWidth($('.grid_container_<?php echo $methodid; ?>_list_transfer').width() - 20, true).trigger('resize');
				}


			}
		});

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
</script>