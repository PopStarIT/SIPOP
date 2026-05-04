<script type="text/javascript">  
   
    function nav_button_<?php echo $function ?>(){
	  	var id = jQuery("#table_<?php echo $methodid ?>").jqGrid('getGridParam','selrow');
		if (id) { 
			var row = jQuery("#table_<?php echo $methodid ?>").jqGrid('getRowData',id);
			
			
			swal({
				title: "Confirm Print ?",
            input: 'select',
            inputOptions: {
              // 'pdf': 'PDF',
               'xlsx': 'XLSX',
            },
				type: "question",
				dangerMode: true,
				showCancelButton: !0,
				confirmButtonClass: "btn btn-danger m-1",
				cancelButtonClass: "btn btn-secondary m-1",
				confirmButtonText: "Print",
				cancelButtonText: "Cancel",
				backdrop: true,
				allowOutsideClick : false,
			}).then((result) => {
				if (result.value) {
               format = result.value;
                    // alert(format);
					window.open(baseurl+'<?php echo $class_uri ?>/download_shipment?'+'fabric_shipment_id=' +row.r1+ '&format='+format, '_BLANK');
		
               
				} else if (result.dismiss === swal.DismissReason.cancel) {
					swal.closeModal();	
				}
			});
		} else {
			show_error("show",'Error','Please select row');
		}
	}
</script>