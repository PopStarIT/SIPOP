<script type="text/javascript">
	setTimeout(function() {
		$("#table_<?php echo $methodid ?>_style_spec_category").trigger('reloadGrid');
		$("#table_<?php echo $methodid ?>_style_spec_category").setGridWidth($('.grid_container_<?php echo $methodid; ?>_style_spec_category').width() - 20, true).trigger('resize');
	}, 1000);


	$('#form_<?php echo $methodid ?>_item_group').on('change', function(event, clickedIndex, newValue, oldValue) {
		//alert("masuk");                                                    
		$("#table_<?php echo $methodid ?>_style_spec_category").trigger('reloadGrid');
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
		category_id = $('#form_<?php echo $methodid ?>_item_group').val();
		$('#form_<?php echo $methodid ?>_spec_category_id').val(spec_category_id);
		$('#form_<?php echo $methodid ?>_spec_category_uraian').val('');
		$('#form_<?php echo $methodid ?>_spec_category_note').val('');



		$('#m_new_category').modal('show');

		//	 $('#form_<?php echo $methodid ?>_date_daily').val(tgl);
		//	 $('#add_target_daily').modal('show'); 
		// select = $('#form_<?php echo $methodid ?>_list_style').val();
		// change_form_<?php echo $methodid ?>_detail_uom_id(data[0].partner_uom_id);
		//  change_form_<?php echo $methodid ?>_list_style(select);
	}

	function edit_<?php echo $methodid ?>_style_spec_category() {
		var id = jQuery("#table_<?php echo $methodid ?>_style_spec_category").jqGrid('getGridParam', 'selrow');
		var spec_category_id = $('#form_<?php echo $methodid ?>_item_group').val();

		if (id) {
			var row = jQuery("#table_<?php echo $methodid ?>_style_spec_category").jqGrid('getRowData', id);
			var spec_category_id = row.r1; // Mendefinisikan dan menetapkan nilai spec_category_id
			$('#form_<?php echo $methodid ?>_spec_category_id').val(spec_category_id);
			$('#form_<?php echo $methodid ?>_spec_category_uraian').val(row.r1);
			$('#form_<?php echo $methodid ?>_spec_category_note').val(row.r1);


		} else {
			show_error("show", 'Error !', 'Please select row');
		}

		setTimeout(function() {
			$('.tab_scrollbar').getNiceScroll().resize();
		}, 100);
	}


	function cancel_modal<?php echo $methodid ?>_style_spec_category() {
		$('#m_new_category').modal('hide');
	}

	function post_<?php echo $methodid ?>_edit() {
		// page_loading("show",'Save <?php echo $page_title ?>','Please Wait...');
		var data = $("#form_<?php echo $methodid ?>_spec_category").serialize();
		$.ajax({
			url: baseurl + '<?php echo $class_uri ?>/post_add_edit',
			data: data,
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
		//  page_loading("hide");
		//  alert("masuk");
		//  console.log(data);
		$('#m_new_category').modal('hide');
		$("#table_<?php echo $methodid ?>_style_spec_category").trigger('reloadGrid');
	}
</script>