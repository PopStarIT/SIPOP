<script type="text/javascript">
	function nav_button_<?php echo $function ?>() {
		// Ambil ID Baris yang dipilih
		var id = jQuery("#table_<?php echo $methodid ?>").jqGrid('getGridParam', 'selrow');

		if (id) {
			var row = jQuery("#table_<?php echo $methodid ?>").jqGrid('getRowData', id);

			swal({
				title: "Confirm Approve Return?",
				text: "Work Order Return No: " + row.r2, // Untuk memastikan ID yang terambil benar
				type: "warning",
				showCancelButton: true,
				confirmButtonText: "Yes, Approve it!",
				cancelButtonText: "No, Cancel",
				closeOnConfirm: false
			}).then((result) => {
				if (result.value) {
					page_loading("show", 'Processing...', 'Please Wait');
					$.ajax({
						url: baseurl + '<?php echo $class_uri ?>/approve',
						data: {
							'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
							'work_order_return_id': row.r1 // Mengirim ID Header ke Controller
						},
						dataType: 'json',
						method: 'post',
						success: function(data) {
							page_loading("hide");
							if (data.valid) {
								show_success("show", 'Success', data.message);
								$("#table_<?php echo $methodid ?>").trigger('reloadGrid');
							} else {
								show_error("show", 'Error', data.message);
							}
						},
						error: function(xhr) {
							page_loading("hide");
							show_error("show", 'Error ' + xhr.status, 'Network Error');
						}
					});
				}
			});
		} else {
			show_error("show", 'Error', 'Silahkan pilih baris data terlebih dahulu');
		}
	}
</script>