<script type="text/javascript">  
	function nav_button_<?php echo $function ?>(){
		var id = jQuery("#table_<?php echo $methodid ?>").jqGrid('getGridParam','selrow');
		if (id) { 
			var row = jQuery("#table_<?php echo $methodid ?>").jqGrid('getRowData',id);  
			swal({
				title: "Preview Dok. <?php echo $page_title ?> ?",
				type: "question",
				dangerMode: true,
				showCancelButton: !0,
				confirmButtonClass: "btn btn-danger m-1",
				cancelButtonClass: "btn btn-secondary m-1",
				confirmButtonText: "Confirm",
				cancelButtonText: "Cancel",
				backdrop: true,
				allowOutsideClick : false,
			}).then((result) => {
				if (result.value) {
					window.open(baseurl+'<?php echo $class_uri ?>/cetak_dokumen?'+'bc_in_header_id=' +row.r1 + '&custom_type_id='+row.r2, '_BLANK');
				} else if (result.dismiss === swal.DismissReason.cancel) {
					swal.closeModal();	
				}
			});
		} else {
			show_error("show",'Error','Please select row');
		}
		
	}	
	
</script>