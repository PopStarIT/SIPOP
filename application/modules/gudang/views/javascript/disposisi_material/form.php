<script type="text/javascript">
	$(".form_tab_<?php echo $methodid ?>").on("click", "a", function(e) {
		e.preventDefault();
		setTimeout(function() {

			$("#table_<?php echo $methodid ?>_return").trigger('reloadGrid');
			$("#table_<?php echo $methodid ?>_return").setGridWidth($('.grid_container_<?php echo $methodid; ?>_return').width() - 20, true).trigger('resize');
			$("#table_<?php echo $methodid ?>_disposisi").trigger('reloadGrid');
			$("#table_<?php echo $methodid ?>_disposisi").setGridWidth($('.grid_container_<?php echo $methodid; ?>_disposisi').width() - 20, true).trigger('resize');



			$('.tab_scrollbar').getNiceScroll().resize();

			$('#form_<?php echo $methodid ?>_detail').focus();
		}, 1000);

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

	function save_disposisi_<?php echo $methodid ?>() {

		$('#form_return_<?php echo $methodid ?>').submit();
	}



	var click_disposisi_<?php echo $methodid ?> = function(row_id, isSelected) {

		var targetInput = $('#form_disposisi_<?php echo $methodid ?>_work_order_return_detail_id');
		var tableDisposisi = $("#table_<?php echo $methodid ?>_disposisi");

		if (!isSelected) {
			targetInput.val('');
		} else {

			targetInput.val(row_id);
		}

		tableDisposisi.trigger('reloadGrid');
	};


	function delete_disposisi_<?php echo $methodid ?>_disposisi(id) {
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
						url: baseurl + '<?php echo $class_uri ?>/delete_disposisi',
						data: {
							'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
							disposition_id: id
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
								$("#table_<?php echo $methodid ?>_disposisi").trigger('reloadGrid');
								$("#table_<?php echo $methodid ?>_disposisi").setGridWidth($('.grid_container_<?php echo $methodid; ?>_disposisi').width() - 20, true).trigger('resize');
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


	function edit_disposisi_<?php echo $methodid ?>_disposisi(id) {

		page_loading("show", '<?php echo $page_title ?>', 'Please Wait...');
		//alert(id+'loader');
		$.ajax({
			url: baseurl + 'loader',
			data: {
				'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
				param: 'data_fabric_disposisi_material',
				param_pop: 'db_pop',
				id: id

			},
			dataType: 'json',
			method: 'post',
			success: function(data) {
				page_loading("hide");


				$('#form_return_<?php echo $methodid ?>_disposition_id').val(data[0].disposition_id);
				$('#form_return_<?php echo $methodid ?>_work_order_return_detail_id').val(data[0].work_order_return_detail_id);
				$('#form_return_<?php echo $methodid ?>_notes_disposition').val(data[0].notes_disposition);
				$('#form_return_<?php echo $methodid ?>_actual_quantity').val(data[0].actual_quantity);
				$('#disposition_action<?php echo $methodid ?>')
					.val(data[0].disposition_action)
					.trigger('change');

				$('#quality_grade<?php echo $methodid ?>')
					.val(data[0].quality_grade)
					.trigger('change');
				$('#form_return_<?php echo $methodid ?>_quality_grade').val(data[0].quality_grade);
				$('#form_return_<?php echo $methodid ?>_disposition_no').val(data[0].disposition_no);
				$('#form_return_<?php echo $methodid ?>_return_request').val(data[0].return_request);
				$('#form_return_<?php echo $methodid ?>_item_code').val(data[0].item_code);
				$('#form_return_<?php echo $methodid ?>_item_name').val(data[0].item_name);
				$('#form_return_<?php echo $methodid ?>_uom_code').val(data[0].uom_code);
				$('#detailResult').modal('show');


				$("#tab_<?php echo $methodid; ?>").attr("data-toggle", "tab");
				$("#tab_<?php echo $methodid; ?>").removeClass("tab_disabled");


				$('.panel_content_<?php echo $methodid ?>').show();

				setTimeout(function() {
					$('.tab_scrollbar').getNiceScroll().resize();
				}, 100);


				$("#table_<?php echo $methodid ?>_return").trigger('reloadGrid');
				$("#table_<?php echo $methodid ?>_return").setGridWidth($('.grid_container_<?php echo $methodid; ?>_return').width() - 20, true).trigger('resize');
				$("#table_<?php echo $methodid ?>_disposisi").trigger('reloadGrid');
				$("#table_<?php echo $methodid ?>_disposisi").setGridWidth($('.grid_container_<?php echo $methodid; ?>_disposisi').width() - 20, true).trigger('resize');
			}
		});
	}

	function add_disposisi_<?php echo $methodid ?>_return(id) {

		reset_form_disposisi_<?php echo $methodid ?>();

		page_loading("show", '<?php echo $page_title ?>', 'Please Wait...');

		$.ajax({
			url: baseurl + 'loader',
			data: {
				'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
				param: 'data_fabric_return_result',
				param_pop: 'db_pop',
				id: id
			},
			dataType: 'json',
			method: 'post',
			success: function(data) {

				page_loading("hide");

				// isi data hasil return
				$('#form_return_<?php echo $methodid ?>_work_order_return_detail_id')
					.val(data[0].work_order_return_detail_id);

				$('#form_return_<?php echo $methodid ?>_return_request')
					.val(data[0].return_request);

				$('#form_return_<?php echo $methodid ?>_item_code')
					.val(data[0].item_code);

				$('#form_return_<?php echo $methodid ?>_item_name')
					.val(data[0].item_name);

				$('#form_return_<?php echo $methodid ?>_uom_code')
					.val(data[0].uom_code);

				// tampilkan modal
				$('#detailResult').modal('show');

				// UI lainnya
				$("#tab_<?php echo $methodid; ?>").attr("data-toggle", "tab");
				$("#tab_<?php echo $methodid; ?>").removeClass("tab_disabled");

				$('.panel_content_<?php echo $methodid ?>').show();

				setTimeout(function() {
					$('.tab_scrollbar').getNiceScroll().resize();
				}, 100);

				$("#table_<?php echo $methodid ?>_return").trigger('reloadGrid');
				$("#table_<?php echo $methodid ?>_return")
					.setGridWidth($('.grid_container_<?php echo $methodid; ?>_return').width() - 20, true)
					.trigger('resize');

				$("#table_<?php echo $methodid ?>_disposisi").trigger('reloadGrid');
				$("#table_<?php echo $methodid ?>_disposisi")
					.setGridWidth($('.grid_container_<?php echo $methodid; ?>_disposisi').width() - 20, true)
					.trigger('resize');
			}
		});
	}

	function reset_form_disposisi_<?php echo $methodid ?>() {

		// reset seluruh input dalam form
		$('#form_return_<?php echo $methodid ?>')[0].reset();

		// reset hidden field (penting!)
		$('#form_return_<?php echo $methodid ?>_disposition_id').val('');
		$('#form_return_<?php echo $methodid ?>_work_order_return_detail_id').val('');

		// reset select manual + trigger
		$('#disposition_action<?php echo $methodid ?>')
			.val('')
			.trigger('change');

		$('#quality_grade<?php echo $methodid ?>')
			.val('')
			.trigger('change');
	}


	var check_submit = 0;

	function post_<?php echo $methodid ?>() {
		if (check_submit == 0) {
			var data = $("#form_return_<?php echo $methodid ?>").serialize();
			check_submit = 1;
			page_loading("show", 'Save <?php echo $page_title ?>', 'Please Wait...');

			$.ajax({
				url: baseurl + '<?php echo $class_uri ?>/post_add_edit',
				data: data,
				dataType: 'json',
				method: 'post',
				success: function(data) {
					page_loading("hide");
					check_submit = 0;
					if (data.valid) {
						show_success("show", ' Berhasil', data.message, function() {

							$('#detailResult').modal('hide');

							$('#form_return_<?php echo $methodid ?>_disposition_id').val('');
							$('#form_return_<?php echo $methodid ?>_work_order_return_detail_id').val('');
							$('#form_return_<?php echo $methodid ?>_disposition_no').val('');
							$('#form_return_<?php echo $methodid ?>_notes').val('');
							$('#form_return_<?php echo $methodid ?>_disposition_action').val('');
							$('#form_return_<?php echo $methodid ?>_actual_quantity').val('');
							$('#form_return_<?php echo $methodid ?>_quality_grade').val('');



							$("#table_<?php echo $methodid ?>").trigger('reloadGrid');
							$("#table_<?php echo $methodid ?>_detail").trigger('reloadGrid');
							$("#table_<?php echo $methodid ?>_return").trigger('reloadGrid');
							$("#table_<?php echo $methodid ?>_cek").trigger('reloadGrid');

							$('.tab_scrollbar').getNiceScroll().resize();
						});
						$("#table_<?php echo $methodid ?>_cek_supply").trigger('reloadGrid');
						$("#table_<?php echo $methodid ?>_cek_supply").setGridWidth($('.grid_container_<?php echo $methodid; ?>_cek_supply').width() - 20, true);
						$("#table_<?php echo $methodid ?>_disposisi").trigger('reloadGrid');
						$("#table_<?php echo $methodid ?>_disposisi").setGridWidth($('.grid_container_<?php echo $methodid; ?>_disposisi').width() - 20, true);
					} else {
						show_error("show", 'Error', data.message);
					}
				}
			});
		}
	}



	$(document).ready(function() {
		// Fokuskan kursor ke input barcode saat halaman siap
		$('#form_return_<?php echo $methodid ?>_return_barcode').focus();

		// Event listener Enter Key
		$('#form_return_<?php echo $methodid ?>_return_barcode').on('keypress', function(e) {
			if (e.which === 13) {
				e.preventDefault();
				return_barcode_<?php echo $methodid ?>();
			}
		});

		let barcodeTimeout;
		$('#form_return_<?php echo $methodid ?>_return_barcode').on('input', function() {
			clearTimeout(barcodeTimeout);
			barcodeTimeout = setTimeout(function() {
				let barcodeValue = $('#form_return_<?php echo $methodid ?>_return_barcode').val();
				if (barcodeValue.length > 0) {
					return_barcode_<?php echo $methodid ?>();
				}
			}, 500); // Tunggu 500ms setelah input terakhir
		});


		$('.btn-info').on('click', function() {
			setTimeout(function() {
				$('#form_return_<?php echo $methodid ?>_return_barcode').focus();
			}, 500);
		});

	});

	function return_barcode_<?php echo $methodid ?>() {
		let input_element = $('#form_return_<?php echo $methodid ?>_return_barcode');
		let code_barcode = input_element.val().trim();
		let grid_id = "table_<?php echo $methodid ?>_return";

		if (code_barcode === "") {
			return;
		}

		page_loading("show");

		// Kita panggil ajax untuk validasi keberadaan data terlebih dahulu
		$.ajax({
			url: baseurl + '<?php echo $class_uri ?>/loaddata',
			type: 'POST',
			dataType: 'json',
			data: {
				'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
				'code_barcode': code_barcode,
				'methodid': '<?php echo $methodid ?>',
				'is_barcode_scanned': 'true'
			},
			success: function(response) {
				page_loading("hide");

				if (parseInt(response.records) > 0) {
					// JIKA DATA DITEMUKAN:
					// Update parameter pencarian grid dan reload tabel
					$("#" + grid_id).jqGrid('setGridParam', {
						postData: {
							'code_barcode': code_barcode,
							'is_barcode_scanned': 'true'
						},
						page: 1
					}).trigger('reloadGrid');

					// Kosongkan input dan fokuskan kembali untuk scan selanjutnya
					input_element.val('').focus();
				} else {
					// JIKA DATA TIDAK DITEMUKAN:
					show_error("show", 'Validasi Gagal', 'Barcode ' + code_barcode + ' Tidak Ditemukan!');
					input_element.val('').focus();

					// Opsional: Reset tabel ke kondisi kosong atau awal
					$("#" + grid_id).jqGrid('setGridParam', {
						postData: {
							'code_barcode': '',
							'is_barcode_scanned': 'false'
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

	function reset_<?php echo $methodid ?>() {
		// 1. Kosongkan input field barcode secara visual
		$('#form_return_<?php echo $methodid ?>_return_barcode').val('');

		// 2. Tentukan ID grid
		var grid_id = "table_<?php echo $methodid ?>_return";

		// 3. Reset parameter jqGrid ke kondisi awal
		$("#" + grid_id).jqGrid('setGridParam', {
			postData: {
				'code_barcode': '', // Kosongkan filter barcode
				'is_barcode_scanned': 'false'
			},
			page: 1 // Kembali ke halaman pertama
		}).trigger('reloadGrid'); // Refresh tabel

		// 4. Fokuskan kembali ke input barcode agar user bisa langsung scan lagi
		$('#form_return_<?php echo $methodid ?>_return_barcode').focus();

		// (Opsional) Jika ada grid lain yang perlu di-refresh saat reset
		$("#table_<?php echo $methodid ?>_disposisi").trigger('reloadGrid');
	}
</script>