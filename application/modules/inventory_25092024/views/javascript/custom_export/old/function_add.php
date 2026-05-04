<script type="text/javascript">  
	function nav_button_<?php echo $function ?>(){
		custom_export_<?php echo $custom_type_id ?>_new_custom_export = 1;
		custom_export_<?php echo $custom_type_id ?>_bc_out_type_id = 1;
		custom_export_<?php echo $custom_type_id ?>_bc_out_header_id = 0;
		custom_export_<?php echo $custom_type_id ?>_lock_data = 0;
		
		page_loading("show",'New <?php echo $page_title ?>','Please Wait...');		
		$('.form_title_<?php echo $methodid ?>').html('New <?php echo $page_title ?>');
		
		$("#tab_<?php echo $methodid; ?>_detail").removeAttr("data-toggle");
		$("#tab_<?php echo $methodid; ?>_detail").addClass( "tab_disabled");
		
		$("#tab_<?php echo $methodid; ?>_supply").removeAttr("data-toggle");
		$("#tab_<?php echo $methodid; ?>_supply").addClass( "tab_disabled");
		
		$("#tab_<?php echo $methodid; ?>_header").attr("data-toggle","tab");
		$("#tab_<?php echo $methodid; ?>_header").removeClass( "tab_disabled");
		$("#tab_<?php echo $methodid; ?>_header").click();
		
		$('#panel_content_<?php echo $methodid ?>').hide();
		$('#panel_content_form_<?php echo $methodid ?>').show();
		$('#panel_content_form_<?php echo $methodid ?>_2').hide();
		
		$('#panel_<?php echo $methodid ?>_1').show();
		$('#panel_<?php echo $methodid ?>_2').hide();
		$('#panel_<?php echo $methodid ?>_3').hide();
		$('#panel_<?php echo $methodid ?>_4').hide();
		$('#panel_<?php echo $methodid ?>_supply').hide();
		
		$('.input_header_<?php echo $methodid ?>').hide();
		$('.input_header_<?php echo $methodid ?>_<?php echo $custom_type_id ?>').show();
		
		$('#form_<?php echo $methodid ?>_bc_out_header_id').val('');
		$('#form_<?php echo $methodid ?>_custom_type_id').val(custom_export_<?php echo $custom_type_id ?>_custom_type_id);
		$('#form_<?php echo $methodid ?>_bc_out_type_id').val(custom_export_<?php echo $custom_type_id ?>_bc_out_type_id);
		
		if('<?php echo $custom_type_id ?>' == 6){
			getnexttransno(31, 'form_<?php echo $methodid ?>_car');
		} else if('<?php echo $custom_type_id ?>' == 7){
			getnexttransno(32, 'form_<?php echo $methodid ?>_car');
		} else if('<?php echo $custom_type_id ?>' == 8){
			getnexttransno(33, 'form_<?php echo $methodid ?>_car');
		} else if('<?php echo $custom_type_id ?>' == 9){
			getnexttransno(34, 'form_<?php echo $methodid ?>_car');
		} else if('<?php echo $custom_type_id ?>' == 10){
			getnexttransno(35, 'form_<?php echo $methodid ?>_car');
		} else if('<?php echo $custom_type_id ?>' == 11){
			getnexttransno(36, 'form_<?php echo $methodid ?>_car');
		} else if('<?php echo $custom_type_id ?>' == 12){
			getnexttransno(37, 'form_<?php echo $methodid ?>_car');
		} else if('<?php echo $custom_type_id ?>' == 13){
			getnexttransno(38, 'form_<?php echo $methodid ?>_car');
		} else {
			$('#form_<?php echo $methodid ?>_car').val('');
		}
		
		$('#form_<?php echo $methodid ?>_bc_no').val('');
		$('#form_<?php echo $methodid ?>_bc_date').val('');

		$('#form_<?php echo $methodid ?>_nama_pengangkut').val('');		
		$('#form_<?php echo $methodid ?>_nomor_voy_flight').val('');		
		$('#form_<?php echo $methodid ?>_tanggal_perkiraan_ekspor').val('');	
		$('#form_<?php echo $methodid ?>_ndpbm').val(1);		
		$('#form_<?php echo $methodid ?>_amount_origin').val(0);
		$('#form_<?php echo $methodid ?>_amount_insurance').val(0);		
		$('#form_<?php echo $methodid ?>_amount_freight').val(0);		
		$('#form_<?php echo $methodid ?>_maklon').val(0);	
		
		$('#form_<?php echo $methodid ?>_detail_seri').val(1);		
		$('#form_<?php echo $methodid ?>_detail_quantity_custom').val(0);		
		$('#form_<?php echo $methodid ?>_detail_conversion').val(1);		
		$('#form_<?php echo $methodid ?>_detail_unitprice').val(1);		
		$('#form_<?php echo $methodid ?>_detail_conversion').val(1);		
		$('#form_<?php echo $methodid ?>_detail_merk').val('');		
		$('#form_<?php echo $methodid ?>_detail_tipe').val('');		
		$('#form_<?php echo $methodid ?>_detail_ukuran').val('');		
		$('#form_<?php echo $methodid ?>_detail_volume').val('');		
		$('#form_<?php echo $methodid ?>_detail_spesifikasi_lain').val('');		
		$('#form_<?php echo $methodid ?>_detail_bruto').val(0);		
		$('#form_<?php echo $methodid ?>_detail_netto').val(0);		
		$('#form_<?php echo $methodid ?>_detail_quantity_package').val(0);		
		$('#form_<?php echo $methodid ?>_detail_bm_tarif').val(10);		
		$('#form_<?php echo $methodid ?>_detail_ppn_tarif').val(10);		
		$('#form_<?php echo $methodid ?>_detail_pph_tarif').val(2.5);
			
		$('.button_<?php echo $methodid ?>_detail_edit').hide();
		$('.button_<?php echo $methodid ?>_detail_new').show();
		
		$('.panel_<?php echo $methodid ?>_panel_detail').show();
		$('.panel_<?php echo $methodid ?>_panel_purchase_request').hide();
		$("#table_<?php echo $methodid ?>_detail").trigger('reloadGrid');
		
		setTimeout(function(){ 
			$('.tab_scrollbar').getNiceScroll().resize(); 
		}, 100);
	}
</script>