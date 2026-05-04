<script type="text/javascript">
	var new_spec = 1;
	var spec_category_id = 0;
	var spec_lock_data = 0;

	function edit_<?php echo $methodid ?>(id) {
		$.ajax({
			url: baseurl + 'loader',
			data: {
				'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
				param: 'data_spec',
				param_pop: 'db_pop',
				id: id
			},
			dataType: 'json',
			method: 'post',
			success: function(data) {
				$('#form_<?php echo $methodid ?>_spec_category_id').val(data[0].spec_category_id);
				$('#form_<?php echo $methodid ?>_spec_category_uraian').val(data[0].spec_category_uraian);
				$('#form_<?php echo $methodid ?>_spec_category_note').val(data[0].spec_category_note);
				spec_category_id = id;
				spec_lock_data = data[0].lock_data;
				new_spec = 0;


				setTimeout(function() {
					$('.tab_scrollbar').getNiceScroll().resize();
				}, 100);
			}
		});
	}

	$(".form_tab_<?php echo $methodid ?>").on("click", "a", function(e) {
		// //alert("coba view");
		// alert("masuk");
		e.preventDefault();
		idsOfSelectedRows_<?php echo $methodid ?>_spec_category = [];

		setTimeout(function() {

			//$("#table_<?php echo $methodid ?>_detail").trigger('reloadGrid');
			//$("#table_<?php echo $methodid ?>_detail").setGridWidth($('.grid_container_<?php echo $methodid; ?>_detail').width() - 20,true).trigger('resize');


			$("#table_<?php echo $methodid ?>_spec_category").trigger('reloadGrid');
			$("#table_<?php echo $methodid ?>_spec_category").setGridWidth($('.grid_container_<?php echo $methodid; ?>_spec_category').width() - 20, true).trigger('resize');


			$('.tab_scrollbar').getNiceScroll().resize();
		}, 1000);
	});

	function cancel_<?php echo $methodid ?>() {
		$('#panel_content_<?php echo $methodid ?>').show();
		$('#panel_content_form_<?php echo $methodid ?>').hide();
	}

	function save_<?php echo $methodid ?>() {
		console.log('Save function called');
		$('#form_<?php echo $methodid ?>').submit();
	}
	$('#form_<?php echo $methodid ?>_spec_category_id').on('change', function(event, clickedIndex, newValue, oldValue) {
		//alert("masuk");                                                    
		$("#table_<?php echo $methodid ?>_spec_category").trigger('reloadGrid');
	});

	var check_submit = 0;

	function post_<?php echo $methodid ?>() {
		if (check_submit == 0) {
			check_submit = 1;
			page_loading("show", '<?php echo $page_title ?>', 'Please Wait...');
			var data = $("#form_<?php echo $methodid ?>").serialize();
			$.ajax({
				url: baseurl + '<?php echo $class_uri ?>/post_add_edit_spec',
				data: data,
				dataType: 'json',
				method: 'post',
				success: function(data) {
					page_loading("hide");
					check_submit = 0;
					if (data.valid) {
						show_success("show", '<?php echo $page_title ?>', data.message);
						$('#panel_content_<?php echo $methodid ?>').show();
						$('#panel_content_form_<?php echo $methodid ?>').hide();
						$('#form_<?php echo $methodid ?>_spec_category_id').val(data.spec_category_id);
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


















	setTimeout(function() {
		$("#table_<?php echo $methodid ?>_spec_category").trigger('reloadGrid');
		$("#table_<?php echo $methodid ?>_spec_category").setGridWidth($('.grid_container_<?php echo $methodid; ?>_spec_category').width() - 20, true).trigger('resize');
	}, 1000);


	$('#form_<?php echo $methodid ?>_spec_category_id').on('change', function(event, clickedIndex, newValue, oldValue) {
		//alert("masuk");                                                    
		$("#table_<?php echo $methodid ?>_spec_category").trigger('reloadGrid');
	});

	function simpan_<?php echo $methodid ?>_group_category() {
		category_name = $('#form_<?php echo $methodid ?>_new_style').val();
		if (category_name != '') {
			//alert(category_name);
			page_loading("show", 'Save <?php echo $page_title ?>', 'Please Wait...');
			//var data = $("#form_<?php echo $methodid ?>").serialize();
			//	console.log(data);
			$.ajax({
				url: baseurl + '<?php echo $class_uri ?>/add_spec_category',
				data: {
					'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
					category_name: category_name
				},
				dataType: 'json',
				method: 'post',
				success: function(data) {
					page_loading("hide");
					if (data.valid) {
						show_success("show", '<?php echo $page_title ?>', data.message);
						$('#form_<?php echo $methodid ?>_new_style').val('');
					} else {
						show_success("show", '<?php echo $page_title ?>', data.message);
					}

				},
				error: function(xhr, error) {
					show_error("show", xhr.status.toString() + ' ' + xhr.statusText, 'Please try again process');
					//check_submit = 0;
				}
			});



		} else {
			//alert("kosong");
			show_error("show", 'Error', "Name category is null !");
		}

	}

	function add_<?php echo $methodid ?>_spec_category_detail() {
		category_id = $('#form_<?php echo $methodid ?>_spec_category_id').val();
		$('#form_<?php echo $methodid ?>_kode_category_spec').val(category_id);
		$('#form_<?php echo $methodid ?>_template_detail_id').val('');

		$('#form_<?php echo $methodid ?>_name_spec').val('');
		$('#form_<?php echo $methodid ?>_formula_s').val('');
		$('#form_<?php echo $methodid ?>_formula_xs').val('');
		$('#form_<?php echo $methodid ?>_formula_m').val('');
		$('#form_<?php echo $methodid ?>_formula_l').val('');
		$('#form_<?php echo $methodid ?>_formula_xl').val('');
		$('#form_<?php echo $methodid ?>_formula_xxl').val('');

		$('#form_<?php echo $methodid ?>_formula_pattern_s').val('');
		$('#form_<?php echo $methodid ?>_formula_pattern_xs').val('');
		$('#form_<?php echo $methodid ?>_formula_pattern_m').val('');
		$('#form_<?php echo $methodid ?>_formula_pattern_l').val('');
		$('#form_<?php echo $methodid ?>_formula_pattern_xl').val('');
		$('#form_<?php echo $methodid ?>_formula_pattern_xxl').val('');

		$('#m_new_category').modal('show');

		//	 $('#form_<?php echo $methodid ?>_date_daily').val(tgl);
		//	 $('#add_target_daily').modal('show'); 
		// select = $('#form_<?php echo $methodid ?>_list_style').val();
		// change_form_<?php echo $methodid ?>_detail_uom_id(data[0].partner_uom_id);
		//  change_form_<?php echo $methodid ?>_list_style(select);
	}

	function edit_modal_<?php echo $methodid ?>_spec_category() {

		var id = jQuery("#table_<?php echo $methodid ?>_spec_category").jqGrid('getGridParam', 'selrow');
		category_id = $('#form_<?php echo $methodid ?>_spec_category_id').val();

		if (id) {
			var row = jQuery("#table_<?php echo $methodid ?>_spec_category").jqGrid('getRowData', id);
			$('#form_<?php echo $methodid ?>_kode_category_spec').val(category_id);
			$('#form_<?php echo $methodid ?>_template_detail_id').val(row.r1);

			$('#form_<?php echo $methodid ?>_name_spec').val(removeTags(row.r2));
			$('#form_<?php echo $methodid ?>_formula_s').val(removeTags(row.r8));
			$('#form_<?php echo $methodid ?>_formula_xs').val(removeTags(row.r9));
			$('#form_<?php echo $methodid ?>_formula_m').val(removeTags(row.r10));
			$('#form_<?php echo $methodid ?>_formula_l').val(removeTags(row.r11));
			$('#form_<?php echo $methodid ?>_formula_xl').val(removeTags(row.r12));
			$('#form_<?php echo $methodid ?>_formula_xxl').val(removeTags(row.r13));

			$('#form_<?php echo $methodid ?>_formula_pattern_s').val(removeTags(row.r15));
			$('#form_<?php echo $methodid ?>_formula_pattern_xs').val(removeTags(row.r16));
			$('#form_<?php echo $methodid ?>_formula_pattern_m').val(removeTags(row.r17));
			$('#form_<?php echo $methodid ?>_formula_pattern_l').val(removeTags(row.r18));
			$('#form_<?php echo $methodid ?>_formula_pattern_xl').val(removeTags(row.r19));
			$('#form_<?php echo $methodid ?>_formula_pattern_xxl').val(removeTags(row.r20));


			$('#m_new_category').modal('show');
			//alert(row.r8);

		} else {
			show_error("show", 'Error !', 'Please select row');
		}

		setTimeout(function() {
			$('.tab_scrollbar').getNiceScroll().resize();
		}, 100);


	}

	function cancel_modal<?php echo $methodid ?>_spec_category() {
		$('#m_new_category').modal('hide');
	}

	function post_modal_<?php echo $methodid ?>_edit() {
		// page_loading("show",'Save <?php echo $page_title ?>','Please Wait...');

		var data = $("#form_<?php echo $methodid ?>_template_spec").serialize();
		$.ajax({
			url: baseurl + '<?php echo $class_uri ?>/post_add_edit',
			data: data,
			dataType: 'json',
			method: 'post',
			success: function(data) {
				console.log(data);
				page_loading("hide");
				if (data.valid) {
					show_success("show", '<?php echo $page_title ?>', data.message);
					$('#form_<?php echo $methodid ?>_new_style').val('');
				} else {
					// show_success("show", '<?php echo $page_title ?>', data.message);
					show_error("show", '<?php echo $page_title ?>', data.message);
				}
			},
			error: function(xhr, error) {
				show_error("show", xhr.status.toString() + ' ' + xhr.statusText, 'Please try again process');

			}

		});

		$('#m_new_category').modal('hide');
		$("#table_<?php echo $methodid ?>_spec_category").trigger('reloadGrid');
	}






	function delete_<?php echo $methodid ?>_spec_category() {
		var id = jQuery("#table_<?php echo $methodid ?>_spec_category").jqGrid('getGridParam', 'selrow'); // Corrected ID selector

		if (id) {
			var row = jQuery("#table_<?php echo $methodid ?>_spec_category").jqGrid('getRowData', id); // Corrected ID selector
			swal({
				title: "Confirm Delete <?php echo $page_title ?> ?",
				type: "question",
				dangerMode: true,
				showCancelButton: true,
				confirmButtonClass: "btn btn-danger m-1",
				cancelButtonClass: "btn btn-secondary m-1",
				confirmButtonText: "Confirm",
				cancelButtonText: "Cancel",
				backdrop: true,
				allowOutsideClick: false,
			}).then((result) => {
				if (result.value) {
					page_loading("show", 'Delete <?php echo $page_title ?>', 'Please Wait...');
					$.ajax({
						url: baseurl + '<?php echo $class_uri ?>/delete_template_category',
						data: {
							'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
							template_detail_id: row.r1 // Corrected parameter name
						},
						dataType: 'json',
						method: 'post',
						success: function(data) {
							page_loading("hide");
							if (data.valid) {
								show_success("show", 'Delete <?php echo $page_title ?>', data.message);
								$("#table_<?php echo $methodid ?>_spec_category").trigger('reloadGrid'); // Corrected ID selector
							} else {
								show_error("show", 'Error', data.message);
							}
						},
						error: function(xhr, error) {
							show_error("show", `Error ${xhr.status}: ${xhr.statusText}`, 'Please try again'); // Improved error handling
						}
					});
				}
			});
		} else {
			show_error("show", 'Error', 'Please select a row');
		}
	}
</script>