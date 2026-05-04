<script type="text/javascript">  
	function nav_button_<?php echo $function ?>(){
		custom_export_<?php echo $custom_type_id ?>_new_custom_export = 1;
		custom_export_<?php echo $custom_type_id ?>_bc_out_type_id = 1;
		custom_export_<?php echo $custom_type_id ?>_bc_out_header_id = 0;
		custom_export_<?php echo $custom_type_id ?>_lock_data = 0;
		//alert ('<?php echo $custom_type_id ?>');
		//alert ('<?php echo $methodid ?>');
		page_loading("show",'New Export Subcon','Please Wait...');		
		$('.form_title_<?php echo $methodid ?>').html('New Export Subcon');
		
		$("#tab_<?php echo $methodid; ?>_detail_2").removeAttr("data-toggle");
		$("#tab_<?php echo $methodid; ?>_detail_2").addClass( "tab_disabled");
		
		//$("#tab_<?php echo $methodid; ?>_supply").removeAttr("data-toggle");
		//$("#tab_<?php echo $methodid; ?>_supply").addClass( "tab_disabled");
		
		$("#tab_<?php echo $methodid; ?>_header_2").attr("data-toggle","tab");
		$("#tab_<?php echo $methodid; ?>_header_2").removeClass( "tab_disabled");
		$("#tab_<?php echo $methodid; ?>_header_2").click();
		
		$('#panel_content_<?php echo $methodid ?>').hide();
		$('#panel_content_form_<?php echo $methodid ?>_2').show();
		$('#panel_content_form_<?php echo $methodid ?>').hide();
				
		getnexttransno(10, 'form_<?php echo $methodid ?>_exp_subcon_grn_no');
		//$('#form_<?php echo $methodid ?>_exp_subcon_grn_no').val(123);
		
		$('#form_<?php echo $methodid ?>_exp_subcon_grn_date').val('<?php echo date('Y-m-d') ?>');
		$('#form_<?php echo $methodid ?>_exp_subcon_tgl_surat_jalan').val('<?php echo date('Y-m-d') ?>');
		
		//$('.select_<?php echo $methodid ?>_from_purchase').hide();
		//$('.select_<?php echo $methodid ?>_from_custom').show();
		$('.panel_<?php echo $methodid ?>_from_purchase').hide();
		$('.panel_<?php echo $methodid ?>_from_custom').show();
		
		$('.panel_<?php echo $methodid ?>_panel_detail').show();
		$('.panel_<?php echo $methodid ?>_panel_purchase_request').hide();
		$("#table_<?php echo $methodid ?>_detail").trigger('reloadGrid');
		
		setTimeout(function(){ 
			$('.tab_scrollbar').getNiceScroll().resize(); 
		}, 100);
	}
</script>