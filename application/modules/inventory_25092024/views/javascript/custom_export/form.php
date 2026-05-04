<script type="text/javascript">
	var custom_export_<?php echo $custom_type_id ?>_new_custom_export = 1;
	var custom_export_<?php echo $custom_type_id ?>_custom_type_id = '<?php echo $custom_type_id ?>';
	var custom_export_<?php echo $custom_type_id ?>_bc_out_type_id = 1;
	var custom_export_<?php echo $custom_type_id ?>_bc_out_header_id = 0;
	var custom_export_<?php echo $custom_type_id ?>_lock_data = 0;
	
	
	var idsOfSelectedRows_<?php echo $methodid ?>_sales_performa = [],
	updateIdsOfSelectedRows_<?php echo $methodid ?>_sales_performa = function (id, isSelected) {
		var index = $.inArray(id, idsOfSelectedRows_<?php echo $methodid ?>_sales_performa);
		if (!isSelected && index >= 0) {
			idsOfSelectedRows_<?php echo $methodid ?>_sales_performa.splice(index, 1); // remove id from the list
		} else if (index < 0) {
			idsOfSelectedRows_<?php echo $methodid ?>_sales_performa.push(id);
		}
	};
	
	var idsOfSelectedRows_<?php echo $methodid ?>_contract_subcon = [],
	updateIdsOfSelectedRows_<?php echo $methodid ?>_contract_subcon = function (id, isSelected) {
		var index = $.inArray(id, idsOfSelectedRows_<?php echo $methodid ?>_contract_subcon);
		if (!isSelected && index >= 0) {
			idsOfSelectedRows_<?php echo $methodid ?>_contract_subcon.splice(index, 1); // remove id from the list
		} else if (index < 0) {
			idsOfSelectedRows_<?php echo $methodid ?>_contract_subcon.push(id);
		}
	};
	
	$(".form_tab_<?php echo $methodid ?>").on("click", "a", function (e) {
        e.preventDefault();
		setTimeout(function(){ 
			$("#table_<?php echo $methodid ?>_detail").trigger('reloadGrid');
			$("#table_<?php echo $methodid ?>_detail").setGridWidth($('.grid_container_<?php echo $methodid; ?>_detail').width() - 20,true).trigger('resize');
			
			$('.tab_scrollbar').getNiceScroll().resize(); 
		}, 1000);
    });
	
	$(".form_tab_<?php echo $methodid ?>").on("click", "a", function (f) {
        f.preventDefault();
		setTimeout(function(){ 
			$("#table_<?php echo $methodid ?>_document").trigger('reloadGrid');
			$("#table_<?php echo $methodid ?>_document").setGridWidth($('.grid_container_<?php echo $methodid; ?>_document').width() - 20,true).trigger('resize');
			
			$('.tab_scrollbar').getNiceScroll().resize(); 
		}, 1000);
    });
	
 	
	$(".form_tab_<?php echo $methodid ?>").on("click", "a", function (g) {
        g.preventDefault();
		setTimeout(function(){ 
			$("#table_<?php echo $methodid ?>_packaging").trigger('reloadGrid');
			$("#table_<?php echo $methodid ?>_packaging").setGridWidth($('.grid_container_<?php echo $methodid; ?>_packaging').width() - 20,true).trigger('resize');
			
			$('.tab_scrollbar').getNiceScroll().resize(); 
		}, 1000);
    });

	$(".form_tab_<?php echo $methodid ?>").on("click", "a", function (h) {
        h.preventDefault();
		setTimeout(function(){ 
			$("#table_<?php echo $methodid ?>_container").trigger('reloadGrid');
			$("#table_<?php echo $methodid ?>_container").setGridWidth($('.grid_container_<?php echo $methodid; ?>_container').width() - 20,true).trigger('resize');
			
			$('.tab_scrollbar').getNiceScroll().resize(); 
		}, 1000);
    });
	
	$(".form_tab_<?php echo $methodid ?>").on("click", "a", function (i) {
        i.preventDefault();
		setTimeout(function(){ 
			$("#table_<?php echo $methodid ?>_pkb").trigger('reloadGrid');
			$("#table_<?php echo $methodid ?>_pkb").setGridWidth($('.grid_container_<?php echo $methodid; ?>_pkb').width() - 20,true).trigger('resize');
			
			$('.tab_scrollbar').getNiceScroll().resize(); 
		}, 1000);
    });
	
	$('#form_<?php echo $methodid ?>_partner_id,#form_<?php echo $methodid ?>_currencies_id').on('change', function (event, clickedIndex, newValue, oldValue) {
		if(custom_export_<?php echo $custom_type_id ?>_bc_out_type_id == 2){
			$("#table_<?php echo $methodid ?>_sales_performa").trigger('reloadGrid');
			idsOfSelectedRows_<?php echo $methodid ?>_sales_performa = [];
		} else if(custom_export_<?php echo $custom_type_id ?>_bc_out_type_id == 4){
			$("#table_<?php echo $methodid ?>_contract_subcon").trigger('reloadGrid');
			idsOfSelectedRows_<?php echo $methodid ?>_contract_subcon = [];
		}
	});
	
	function cancel_<?php echo $methodid ?>(){
		$('#panel_content_<?php echo $methodid ?>').show();
		$('#panel_content_form_<?php echo $methodid ?>').hide();
		$("#table_<?php echo $methodid ?>").trigger('reloadGrid');
	}
	
	function save_<?php echo $methodid ?>(){
		$('#form_<?php echo $methodid ?>').submit();
	}
	
	var jvalidate = $("#form_<?php echo $methodid ?>").validate({
		ignore: [],
		rules: {                                            
			gl_account_group: {
				required: true
			}
		} 
	});
	
	function edit_<?php echo $methodid?>(id){
		$.ajax({
			url: baseurl+'loader',
			data: {
				'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'
				,param: 'data_custom_export'
				,id : id
			},
			dataType: 'json',
			method: 'post',
			success: function(data){
				
				custom_export_<?php echo $custom_type_id ?>_new_custom_export = 0;
				custom_export_<?php echo $custom_type_id ?>_bc_out_header_id = data[0].bc_out_header_id;
				custom_export_<?php echo $custom_type_id ?>_bc_out_type_id = data[0].bc_out_type_id;
				custom_export_<?php echo $custom_type_id ?>_custom_type_id = data[0].custom_type_id;
				
				
				$('.input_header_<?php echo $methodid ?>').hide();
				$('.input_header_<?php echo $methodid ?>_<?php echo $custom_type_id ?>').show();
		
				$('#form_<?php echo $methodid ?>_bc_out_header_id').val(data[0].bc_out_header_id);
				$('#form_<?php echo $methodid ?>_custom_type_id').val(data[0].custom_type_id);
				$('#form_<?php echo $methodid ?>_bc_out_type_id').val(data[0].bc_out_type_id);
				$('#form_<?php echo $methodid ?>_car').val(data[0].car);
				$('#form_<?php echo $methodid ?>_bc_no').val(data[0].bc_no);
				$('#form_<?php echo $methodid ?>_bc_date').val(data[0].bc_date);
			
				$('#form_<?php echo $methodid ?>_nama_pengangkut').val(data[0].nama_pengangkut);
				$('#form_<?php echo $methodid ?>_nomor_voy_flight').val(data[0].nomor_voy_flight);
				$('#form_<?php echo $methodid ?>_ndpbm').val(data[0].ndpbm);
				$('#form_<?php echo $methodid ?>_tanggal_perkiraan_ekspor').val(data[0].tanggal_perkiraan_ekspor);
				$('#form_<?php echo $methodid ?>_amount_origin').val(data[0].amount_origin);
				$('#form_<?php echo $methodid ?>_amount_insurance').val(data[0].amount_insurance);
				$('#form_<?php echo $methodid ?>_amount_freight').val(data[0].amount_freight);
				$('#form_<?php echo $methodid ?>_maklon').val(data[0].maklon);
				
				$('#form_<?php echo $methodid ?>_jabatan_ttd').val(data[0].jabatan_ttd);
				$('#form_<?php echo $methodid ?>_jumlah_tanda_pengaman').val(data[0].jumlah_tanda_pengaman);
				$('#form_<?php echo $methodid ?>_kode_jenis_nilai').val(data[0].kode_jenis_nilai);
				$('#form_<?php echo $methodid ?>_kota_ttd').val(data[0].kota_ttd);
				$('#form_<?php echo $methodid ?>_nama_ttd').val(data[0].nama_ttd);
				$('#form_<?php echo $methodid ?>_bruto').val(data[0].bruto);
				$('#form_<?php echo $methodid ?>_nik').val(data[0].nik);
				$('#form_<?php echo $methodid ?>_nomor_bc11').val(data[0].nomor_bc11);
				$('#form_<?php echo $methodid ?>_pos_bc11').val(data[0].pos_bc11);
				$('#form_<?php echo $methodid ?>_subpos_bc11').val(data[0].subpos_bc11);
				$('#form_<?php echo $methodid ?>_tanggal_periksa').val(data[0].tanggal_periksa);
				$('#form_<?php echo $methodid ?>_tgl_bc11').val(data[0].tgl_bc11);
				$('#form_<?php echo $methodid ?>_tgl_ttd').val(data[0].tgl_ttd);
				$('#form_<?php echo $methodid ?>_uang_muka').val(data[0].uang_muka);
				$('#form_<?php echo $methodid ?>_kode_kena_pajak').val(data[0].kode_kena_pajak);
				$('#form_<?php echo $methodid ?>_volume').val(data[0].volume);
				$('#form_<?php echo $methodid ?>_kode_kondisi_barang').val(data[0].kode_kondisi_barang);
				$('#form_<?php echo $methodid ?>_kode_tutup_pu').val(data[0].kode_tutup_pu);
				$('#form_<?php echo $methodid ?>_kode_pembayar').val(data[0].kode_pembayar);
				
				change_form_<?php echo $methodid ?>_partner_id(data[0].partner_id);
				change_form_<?php echo $methodid ?>_vendor_partner_id(data[0].vendor_partner_id);
				change_form_<?php echo $methodid ?>_currencies_id(data[0].currencies_id);
				change_form_<?php echo $methodid ?>_muat_kppbc_id(data[0].muat_kppbc_id);
				change_form_<?php echo $methodid ?>_kppbc_id(data[0].kppbc_id);
				change_form_<?php echo $methodid ?>_jenis_ekspor_id(data[0].jenis_ekspor_id);
				change_form_<?php echo $methodid ?>_kategori_ekspor_id(data[0].kategori_ekspor_id);
				change_form_<?php echo $methodid ?>_cara_perdagangan_id(data[0].cara_perdagangan_id);
				change_form_<?php echo $methodid ?>_cara_pembayaran_id(data[0].cara_pembayaran_id);
				change_form_<?php echo $methodid ?>_cara_angkut_id(data[0].cara_angkut_id);
				change_form_<?php echo $methodid ?>_kode_bendera(data[0].kode_bendera);
				change_form_<?php echo $methodid ?>_price_type_id(data[0].price_type_id);
				change_form_<?php echo $methodid ?>_insurance_type_id(data[0].insurance_type_id);
				change_form_<?php echo $methodid ?>_muat_port_id(data[0].muat_port_id);
				change_form_<?php echo $methodid ?>_muat2_port_id(data[0].muat2_port_id);
				change_form_<?php echo $methodid ?>_bongkar_port_id(data[0].bongkar_port_id);
				change_form_<?php echo $methodid ?>_tujuan_port_id(data[0].tujuan_port_id);
				change_form_<?php echo $methodid ?>_tujuan_country_id(data[0].tujuan_country_id);
				
				$('#form_<?php echo $methodid ?>_detail_bc_out_header_id').val(data[0].bc_out_header_id);
				$('#form_<?php echo $methodid ?>_document_bc_out_header_id').val(data[0].bc_out_header_id);
				$('#form_<?php echo $methodid ?>_document_custom_type_id').val(data[0].custom_type_id);
				$('#form_<?php echo $methodid ?>_packaging_bc_out_header_id').val(data[0].bc_out_header_id);
				$('#form_<?php echo $methodid ?>_packaging_custom_type_id').val(data[0].custom_type_id);
				$('#form_<?php echo $methodid ?>_container_bc_out_header_id').val(data[0].bc_out_header_id);
				$('#form_<?php echo $methodid ?>_container_custom_type_id').val(data[0].custom_type_id);
				$('#form_<?php echo $methodid ?>_pkb_bc_out_header_id').val(data[0].bc_out_header_id);
				$('#form_<?php echo $methodid ?>_pkb_custom_type_id').val(data[0].custom_type_id);
				
				$('#panel_<?php echo $methodid ?>_1').show();
				$('#panel_<?php echo $methodid ?>_2').hide();
				$('#panel_<?php echo $methodid ?>_3').hide();
				$('#panel_<?php echo $methodid ?>_4').hide();
				$('#panel_<?php echo $methodid ?>_5').hide();
				$('#panel_<?php echo $methodid ?>_6').hide();
				$('#panel_<?php echo $methodid ?>_7').hide();
				
				$('.button_<?php echo $methodid ?>_detail_edit').hide();
				$('.button_<?php echo $methodid ?>_detail_new').show();	
				
				$('.button_<?php echo $methodid ?>_document_edit').hide();
				$('.button_<?php echo $methodid ?>_document_new').show();
				
				$('.button_<?php echo $methodid ?>_kemasan_edit').hide();
				$('.button_<?php echo $methodid ?>_kemasan_new').show();
				
				$('.button_<?php echo $methodid ?>_kontainer_edit').hide();
				$('.button_<?php echo $methodid ?>_kontainer_new').show();
				
				$('.button_<?php echo $methodid ?>_pkb_edit').hide();
				$('.button_<?php echo $methodid ?>_pkb_new').show();
				
								
				setTimeout(function(){ 
					$("#tab_<?php echo $methodid; ?>_supply").removeAttr("data-toggle");
					$("#tab_<?php echo $methodid; ?>_supply").addClass( "tab_disabled");
			
					$("#tab_<?php echo $methodid; ?>_detail").attr("data-toggle","tab");
					$("#tab_<?php echo $methodid; ?>_detail").removeClass( "tab_disabled");
					
					$("#tab_<?php echo $methodid; ?>_document").attr("data-toggle","tab");
					$("#tab_<?php echo $methodid; ?>_document").removeClass( "tab_disabled");
					
					$("#tab_<?php echo $methodid; ?>_packaging").attr("data-toggle","tab");
					$("#tab_<?php echo $methodid; ?>_packaging").removeClass( "tab_disabled");
					
					$("#tab_<?php echo $methodid; ?>_container").attr("data-toggle","tab");
					$("#tab_<?php echo $methodid; ?>_container").removeClass( "tab_disabled");
					
					$("#tab_<?php echo $methodid; ?>_pkb").attr("data-toggle","tab");
					$("#tab_<?php echo $methodid; ?>_pkb").removeClass( "tab_disabled");
					
					$("#tab_<?php echo $methodid; ?>_header").attr("data-toggle","tab");
					$("#tab_<?php echo $methodid; ?>_header").removeClass( "tab_disabled");
					$("#tab_<?php echo $methodid; ?>_header").click();
					
					$('.tab_scrollbar').getNiceScroll().resize(); 
				}, 100);
			}
		});
	}
	
	var check_submit = 0;
	function post_<?php echo $methodid ?>(){
		if(check_submit == 0) {
			check_submit = 1;
			page_loading("show",'Save <?php echo $page_title ?>','Please Wait...');
			var data = $("#form_<?php echo $methodid ?>").serialize();
			
			if(custom_export_<?php echo $custom_type_id ?>_bc_out_type_id == 2){
				data = data +'&sales_performa_id='+idsOfSelectedRows_<?php echo $methodid ?>_sales_performa;
			} else if(custom_export_<?php echo $custom_type_id ?>_bc_out_type_id == 4){
				data = data +'&contract_subcon='+idsOfSelectedRows_<?php echo $methodid ?>_contract_subcon;
			}
			
			$.ajax({
				url: baseurl+'<?php echo $class_uri ?>/post_add_edit',
				data: data,
				dataType: 'json',
				method: 'post',
				success: function(data){
					page_loading("hide");
					check_submit = 0;
					if(data.valid){
						show_success("show",'<?php echo $page_title ?> Header',data.message);	
						
						if(custom_export_<?php echo $custom_type_id ?>_new_custom_export == 1){
							custom_export_<?php echo $custom_type_id ?>_new_custom_export = 0;
							$("#tab_<?php echo $methodid; ?>_detail").attr("data-toggle","tab");
							$("#tab_<?php echo $methodid; ?>_detail").removeClass( "tab_disabled");
							$("#tab_<?php echo $methodid; ?>_detail").click();
							
							$("#tab_<?php echo $methodid; ?>_document").attr("data-toggle","tab");
							$("#tab_<?php echo $methodid; ?>_document").removeClass( "tab_disabled");
							//$("#tab_<?php echo $methodid; ?>_document").click();
							
							$("#tab_<?php echo $methodid; ?>_packaging").attr("data-toggle","tab");
							$("#tab_<?php echo $methodid; ?>_packaging").removeClass( "tab_disabled");
							//$("#tab_<?php echo $methodid; ?>_packaging").click();
							
							$("#tab_<?php echo $methodid; ?>_container").attr("data-toggle","tab");
							$("#tab_<?php echo $methodid; ?>_container").removeClass( "tab_disabled");
							//$("#tab_<?php echo $methodid; ?>_container").click();
							
							$("#tab_<?php echo $methodid; ?>_pkb").attr("data-toggle","tab");
							$("#tab_<?php echo $methodid; ?>_pkb").removeClass( "tab_disabled");
							//$("#tab_<?php echo $methodid; ?>_pkb").click();
							
							custom_export_<?php echo $custom_type_id ?>_bc_out_header_id = data.bc_out_header_id;
							$('#form_<?php echo $methodid ?>_bc_out_header_id').val(custom_export_<?php echo $custom_type_id ?>_bc_out_header_id);
							$('#form_<?php echo $methodid ?>_detail_bc_out_header_id').val(custom_export_<?php echo $custom_type_id ?>_bc_out_header_id);
							
							$('#form_<?php echo $methodid ?>_container_bc_out_header_id').val(custom_export_<?php echo $custom_type_id ?>_bc_out_header_id);
							$('#form_<?php echo $methodid ?>_document_bc_out_header_id').val(custom_export_<?php echo $custom_type_id ?>_bc_out_header_id);
							$('#form_<?php echo $methodid ?>_packaging_bc_out_header_id').val(custom_export_<?php echo $custom_type_id ?>_bc_out_header_id);
							$('#form_<?php echo $methodid ?>_pkb_bc_out_header_id').val(custom_export_<?php echo $custom_type_id ?>_bc_out_header_id);
							$('#form_<?php echo $methodid ?>_document_custom_type_id').val(<?php echo $custom_type_id ?>);
							$('#form_<?php echo $methodid ?>_packaging_custom_type_id').val(<?php echo $custom_type_id ?>);
							$('#form_<?php echo $methodid ?>_container_custom_type_id').val(<?php echo $custom_type_id ?>);
							$('#form_<?php echo $methodid ?>_pkb_custom_type_id').val(<?php echo $custom_type_id ?>);
							
							
							$('.button_<?php echo $methodid ?>_document_new').show();	
							$('.button_<?php echo $methodid ?>_kontainer_new').show();
							$('.button_<?php echo $methodid ?>_pkb_new').show();
							
								setTimeout(function(){ 
								$("#table_<?php echo $methodid ?>_detail").trigger('reloadGrid');
								$("#table_<?php echo $methodid ?>_detail").setGridWidth($('.grid_container_<?php echo $methodid; ?>_detail').width() - 20,true).trigger('resize');
								$("#table_<?php echo $methodid ?>_document").trigger('reloadGrid');
								$("#table_<?php echo $methodid ?>_document").setGridWidth($('.grid_container_<?php echo $methodid; ?>_document').width() - 20,true).trigger('resize');
								$("#table_<?php echo $methodid ?>_packaging").trigger('reloadGrid');
								$("#table_<?php echo $methodid ?>_packaging").setGridWidth($('.grid_container_<?php echo $methodid; ?>_packaging').width() - 20,true).trigger('resize');
								$("#table_<?php echo $methodid ?>_container").trigger('reloadGrid');
								$("#table_<?php echo $methodid ?>_container").setGridWidth($('.grid_container_<?php echo $methodid; ?>_container').width() - 20,true).trigger('resize');
								$("#table_<?php echo $methodid ?>_pkb").trigger('reloadGrid');
								$("#table_<?php echo $methodid ?>_pkb").setGridWidth($('.grid_container_<?php echo $methodid; ?>_pkb').width() - 20,true).trigger('resize');
								
								$('.tab_scrollbar').getNiceScroll().resize(); 
							}, 500);
							
							$('.panel_<?php echo $methodid ?>_panel_detail').show();
							$('.panel_<?php echo $methodid ?>_panel_document').show();
							$('.panel_<?php echo $methodid ?>_panel_packaging').show();
							$('.panel_<?php echo $methodid ?>_panel_container').show();
							$('.panel_<?php echo $methodid ?>_panel_pkb').show();
							$('.panel_<?php echo $methodid ?>_panel_sales_request').hide();
													
						} else {
							custom_export_<?php echo $custom_type_id ?>_new_custom_export = 1;
							$('#panel_content_<?php echo $methodid ?>').show();
							$('#panel_content_form_<?php echo $methodid ?>').hide();
							$("#table_<?php echo $methodid ?>").trigger('reloadGrid');
						}
						
						$("#table_<?php echo $methodid ?>_sales_performa").trigger('reloadGrid');
						$("#table_<?php echo $methodid ?>_contract_subcon").trigger('reloadGrid');
						
						idsOfSelectedRows_<?php echo $methodid ?>_sales_performa = [];
						idsOfSelectedRows_<?php echo $methodid ?>_contract_subcon = [];
						
					} else {
						show_error("show",'Error',data.message);
					}
				},
				error: function(xhr,error){
					show_error("show",xhr.status.toString() + ' ' + xhr.statusText,'Please try again');
					check_submit = 0;
				}
			});
		}
	}
	
	/* Detail Function */
	var jvalidate2 = $("#form_<?php echo $methodid ?>_detail").validate({
		ignore: [],
		rules: {                                            
			item_id: {
				required: true
			},
			'quantity_ordered': {
				min: 0
			}
		} 
	});
	
	var check_submit = 0;
	function add_<?php echo $methodid ?>(){
		new_sales_order = 0;
		if(check_submit == 0) {
			check_submit = 1;
			page_loading("show",'<?php echo $page_title ?> Detail','Please Wait...');
			var data = $("#form_<?php echo $methodid ?>_detail").serialize();
			$.ajax({
				url: baseurl+'<?php echo $class_uri ?>/post_add_edit_detail',
				data: data,
				dataType: 'json',
				method: 'post',
				success: function(data){
					page_loading("hide");
					check_submit = 0;
					if(data.valid){
						show_success("show",'<?php echo $page_title ?> Detail',data.message);	
						
						$("#table_<?php echo $methodid ?>_detail").trigger('reloadGrid');
						cancel_detail_<?php echo $methodid ?>();
						$("#table_<?php echo $methodid ?>_detail").setGridWidth($('.grid_container_<?php echo $methodid; ?>_detail').width() - 20,true).trigger('resize');
									
					} else {
						show_error("show",'Error',data.message);
					}
				},
				error: function(xhr,error){
					show_error("show",xhr.status.toString() + ' ' + xhr.statusText,'Please try again');
					check_submit = 0;
				}
			});
		}
	}
	
	function edit_detail_<?php echo $methodid ?>(bc_out_barang_id){
		page_loading("show",'<?php echo $page_title ?>','Please Wait...');
		$.ajax({
			url: baseurl+'loader',
			data: {
				'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'
				,param: 'data_custom_export_detail'
				,id : bc_out_barang_id
			},
			dataType: 'json',
			method: 'post',
			success: function(data){
				page_loading("hide");
				
				$('.button_<?php echo $methodid ?>_detail_edit').show();
				$('.button_<?php echo $methodid ?>_detail_new').hide();	
										
				$('#form_<?php echo $methodid ?>_detail_bc_out_barang_id').val(data[0].bc_out_barang_id);
				$('#form_<?php echo $methodid ?>_detail_seri').val(data[0].seri);
				$('#form_<?php echo $methodid ?>_detail_quantity_custom').val(data[0].quantity);
				$('#form_<?php echo $methodid ?>_detail_conversion').val(data[0].conversion);
				$('#form_<?php echo $methodid ?>_detail_unit_price').val(data[0].unit_price);
				$('#form_<?php echo $methodid ?>_detail_subcon_price').val(data[0].subcon_price);
				$('#form_<?php echo $methodid ?>_detail_subcon_out_no').val(data[0].subcon_out_no);
				$('#form_<?php echo $methodid ?>_detail_merk').val(data[0].merk);
				$('#form_<?php echo $methodid ?>_detail_tipe').val(data[0].tipe);
				$('#form_<?php echo $methodid ?>_detail_ukuran').val(data[0].ukuran);
				$('#form_<?php echo $methodid ?>_detail_volume').val(data[0].volume);
				$('#form_<?php echo $methodid ?>_detail_spesifikasi_lain').val(data[0].spesifikasi_lain);
				$('#form_<?php echo $methodid ?>_detail_bruto').val(data[0].bruto);
				$('#form_<?php echo $methodid ?>_detail_netto').val(data[0].netto);
				$('#form_<?php echo $methodid ?>_detail_quantity_package').val(data[0].quantity_package);
				$('#form_<?php echo $methodid ?>_detail_note').val(data[0].note);
				
				$('#form_<?php echo $methodid ?>_isi_perkemasan').val(data[0].isi_perkemasan);
				$('#form_<?php echo $methodid ?>_daerah_kode').val(data[0].daerah_kode);
				$('#form_<?php echo $methodid ?>_kode_asal_barang').val(data[0].kode_asal_barang);
				$('#form_<?php echo $methodid ?>_kode_asal_bahan_baku').val(data[0].kode_asal_bahan_baku);
				$('#form_<?php echo $methodid ?>_kode_perhitungan').val(data[0].kode_perhitungan);
				$('#form_<?php echo $methodid ?>_kode_guna_barang').val(data[0].kode_guna_barang);
				$('#form_<?php echo $methodid ?>_kode_kondisi_barang').val(data[0].kode_kondisi_barang);
				$('#form_<?php echo $methodid ?>_uang_muka').val(data[0].uang_muka);
				$('#form_<?php echo $methodid ?>_nilai_devisa').val(data[0].nilai_devisa);
				$('#form_<?php echo $methodid ?>_pernyataan_lartas').val(data[0].pernyataan_lartas);
				$('#form_<?php echo $methodid ?>_seri_jin').val(data[0].seri_jin);
				$('#form_<?php echo $methodid ?>_asuransi').val(data[0].asuransi);
				$('#form_<?php echo $methodid ?>_harga_perolehan').val(data[0].harga_perolehan);
				$('#form_<?php echo $methodid ?>_detail_bm_tarif').val(data[0].bm_tarif);
				$('#form_<?php echo $methodid ?>_detail_pph_tarif').val(data[0].pph_tarif);
				$('#form_<?php echo $methodid ?>_detail_ppn_tarif').val(data[0].ppn_tarif);
				$('#form_<?php echo $methodid ?>_detail_fob').val(data[0].fob);
				$('#form_<?php echo $methodid ?>_detail_kode_kondisi_barang').val(data[0].kode_kondisi_barang);
				
				change_form_<?php echo $methodid ?>_detail_item_id(data[0].item_id);
				change_form_<?php echo $methodid ?>_detail_hs_id(data[0].hs_id);
				change_form_<?php echo $methodid ?>_detail_kategori_barang_id(data[0].kategori_barang_id);
				change_form_<?php echo $methodid ?>_detail_uom_id(data[0].uom_id);
				change_form_<?php echo $methodid ?>_detail_package_id(data[0].package_id);
				change_form_<?php echo $methodid ?>_detail_origin_country_id(data[0].origin_country_id);
				change_form_<?php echo $methodid ?>_detail_fasilitas_id(data[0].fasilitas_id);
				change_form_<?php echo $methodid ?>_detail_skema_tarif_id(data[0].skema_tarif_id);				
			}
		});
	}
	
	function delete_detail_<?php echo $methodid ?>(sales_order_detail_id){
		if(check_submit == 0) {
			swal({
				title: "Confirm Delete <?php echo $page_title ?> Detail ?",
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
					page_loading("show",'Delete <?php echo $page_title ?> Detail','Please Wait...');
					$.ajax({
						url: baseurl+'<?php echo $class_uri ?>/delete_detail',								
						data: {'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'
						,bc_out_barang_id:sales_order_detail_id},
						dataType: 'json',
						method: 'post',
						success: function(data){
							page_loading("hide");
							check_submit = 0;
							if(data.valid){
								show_success("show",'Delete <?php echo $page_title ?> Detail',data.message);			
								$("#table_<?php echo $methodid ?>_detail").trigger('reloadGrid');
								cancel_detail_<?php echo $methodid ?>();
								
								setTimeout(function(){ 
									$('.tab_scrollbar').getNiceScroll().resize(); 
								}, 100);
							} else {
								show_error("show",'Error',data.message);
							}
						},
						error: function(xhr,error){
							show_error("show",xhr.status.toString() + ' ' + xhr.statusText,'Please try again');
							check_submit = 0;
						}
					});
				} else if (result.dismiss === swal.DismissReason.cancel) {
					swal.closeModal();	
					check_submit = 0;
				}
			});
		}
	}
	
	function cancel_detail_<?php echo $methodid ?>(){
		$('#form_<?php echo $methodid ?>_detail_bc_out_barang_id').val('');
		$('#form_<?php echo $methodid ?>_detail_quantity_ordered').val(0);
		$('#form_<?php echo $methodid ?>_detail_conversion').val(1);
		$('#form_<?php echo $methodid ?>_detail_unit_price').val(0);
		$('#form_<?php echo $methodid ?>_detail_sales_order_detail_memo').val('');
		$('#form_<?php echo $methodid ?>_detail_order_delivery_date').val('');
		
		$('.button_<?php echo $methodid ?>_detail_edit').hide();
		$('.button_<?php echo $methodid ?>_detail_new').show();	
		
	}	
	/* End Detail Function */
	
	/* document_ceisa Function */
	var jvalidate2 = $("#form_<?php echo $methodid ?>_document").validate({
		ignore: [],
		rules: {                                            
			kode_dokumen: {
				required: true
			},
			nomor_dokumen: {
				required: true
			},
			/* seri_dokumen: {
				required: true
			}, */
			tanggal_dokumen: {
				required: true
			}
		} 
	});
	
	var check_submit = 0;
	function add_doc_<?php echo $methodid ?>(){
		new_purchase_order = 0;
		
		if($('#form_<?php echo $methodid ?>_document_kode_dokumen').val()=='30'){ 
			swal({
				title: "Create Packing List?",
				type: "question",
				dangerMode: true,
				showCancelButton: !0,
				confirmButtonClass: "btn btn-danger m-1",
				cancelButtonClass: "btn btn-secondary m-1",
				confirmButtonText: "Ya",
				cancelButtonText: "Tidak",
				backdrop: true,
				allowOutsideClick : false,
			}).then((result) => {
				if (result.value) {
					if(check_submit == 0) {
						check_submit = 1;
						page_loading("show",'<?php echo $page_title ?> Document','Please Wait...');
						var data = $("#form_<?php echo $methodid ?>_document").serialize();
						$.ajax({
							url: baseurl+'<?php echo $class_uri ?>/post_add_edit_document?pl=1',
							data: data,
							dataType: 'json',
							method: 'post',
							success: function(data){
								page_loading("hide");
								check_submit = 0;
								if(data.valid){
									show_success("show",'<?php echo $page_title ?> Document',data.message);	
									$('#form_<?php echo $methodid ?>_document_id_dokumen').val('');
									$("#table_<?php echo $methodid ?>_document").trigger('reloadGrid');
									cancel_document_<?php echo $methodid ?>();
									$("#table_<?php echo $methodid ?>_document").setGridWidth($('.grid_container_<?php echo $methodid; ?>_document').width() - 20,true).trigger('resize');
												
								} else {
									show_error("show",'Error',data.message);
								}
							},
							error: function(xhr,error){
								show_error("show",xhr.status.toString() + ' ' + xhr.statusText,'Please try again');
								check_submit = 0;
							}
						});
					} 				
				} else {
					if(check_submit == 0) {
						check_submit = 1;
						page_loading("show",'<?php echo $page_title ?> Document','Please Wait...');
						var data = $("#form_<?php echo $methodid ?>_document").serialize();
						$.ajax({
							url: baseurl+'<?php echo $class_uri ?>/post_add_edit_document',
							data: data,
							dataType: 'json',
							method: 'post',
							success: function(data){
								page_loading("hide");
								check_submit = 0;
								if(data.valid){
									show_success("show",'<?php echo $page_title ?> Document',data.message);	
									$('#form_<?php echo $methodid ?>_document_id_dokumen').val('');
									$("#table_<?php echo $methodid ?>_document").trigger('reloadGrid');
									cancel_document_<?php echo $methodid ?>();
									$("#table_<?php echo $methodid ?>_document").setGridWidth($('.grid_container_<?php echo $methodid; ?>_document').width() - 20,true).trigger('resize');
												
								} else {
									show_error("show",'Error',data.message);
								}
							},
							error: function(xhr,error){
								show_error("show",xhr.status.toString() + ' ' + xhr.statusText,'Please try again');
								check_submit = 0;
							}
						});
					} ;
				}
			});
		} else {
			
			if(check_submit == 0) {
				check_submit = 1;
				page_loading("show",'<?php echo $page_title ?> Document','Please Wait...');
				var data = $("#form_<?php echo $methodid ?>_document").serialize();
				$.ajax({
					url: baseurl+'<?php echo $class_uri ?>/post_add_edit_document',
					data: data,
					dataType: 'json',
					method: 'post',
					success: function(data){
						page_loading("hide");
						check_submit = 0;
						if(data.valid){
							show_success("show",'<?php echo $page_title ?> Document',data.message);	
							$('#form_<?php echo $methodid ?>_document_id_dokumen').val('');
							$("#table_<?php echo $methodid ?>_document").trigger('reloadGrid');
							cancel_document_<?php echo $methodid ?>();
							$("#table_<?php echo $methodid ?>_document").setGridWidth($('.grid_container_<?php echo $methodid; ?>_document').width() - 20,true).trigger('resize');
										
						} else {
							show_error("show",'Error',data.message);
						}
					},
					error: function(xhr,error){
						show_error("show",xhr.status.toString() + ' ' + xhr.statusText,'Please try again');
						check_submit = 0;
					}
				});
			} 
			
		}	
		
		/* if(check_submit == 0) {
			check_submit = 1;
			page_loading("show",'<?php echo $page_title ?> Document','Please Wait...');
			var data = $("#form_<?php echo $methodid ?>_document").serialize();
			$.ajax({
				url: baseurl+'<?php echo $class_uri ?>/post_add_edit_document',
				data: data,
				dataType: 'json',
				method: 'post',
				success: function(data){
					page_loading("hide");
					check_submit = 0;
					if(data.valid){
						show_success("show",'<?php echo $page_title ?> Document',data.message);	
						$('#form_<?php echo $methodid ?>_document_id_dokumen').val('');
						$("#table_<?php echo $methodid ?>_document").trigger('reloadGrid');
						cancel_document_<?php echo $methodid ?>();
						$("#table_<?php echo $methodid ?>_document").setGridWidth($('.grid_container_<?php echo $methodid; ?>_document').width() - 20,true).trigger('resize');
									
					} else {
						show_error("show",'Error',data.message);
					}
				},
				error: function(xhr,error){
					show_error("show",xhr.status.toString() + ' ' + xhr.statusText,'Please try again');
					check_submit = 0;
				}
			});
		} 
		*/
	}
	
	function edit_document_<?php echo $methodid ?>(id_dokumen){
		page_loading("show",'<?php echo $page_title ?>','Please Wait...');
		$.ajax({
			url: baseurl+'loader',
			data: {
				'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'
				,param: 'data_ceisa_custom_import_document'
				,id : id_dokumen
			},
			dataType: 'json',
			method: 'post',
			success: function(data){
				page_loading("hide");
				
				$('.button_<?php echo $methodid ?>_document_edit').show();
				$('.button_<?php echo $methodid ?>_document_new').hide();	
										
				$('#form_<?php echo $methodid ?>_document_id_dokumen').val(data[0].id_dokumen);
				$('#form_<?php echo $methodid ?>_document_nomor_dokumen').val(data[0].nomor_dokumen);
				$('#form_<?php echo $methodid ?>_document_seri_dokumen').val(data[0].seri);
				$('#form_<?php echo $methodid ?>_document_tanggal_dokumen').val(data[0].tanggal_dokumen);
				$('#form_<?php echo $methodid ?>_document_memo').val(data[0].memo);
				$('#form_<?php echo $methodid ?>_document_uraian_fasilitas').val(data[0].uraian_fasilitas);
				
				change_form_<?php echo $methodid ?>_document_kode_dokumen(data[0].id_doc);
				change_form_<?php echo $methodid ?>_document_kode_fasilitas(data[0].id_fasilitas);

			}
		});
	}
	
	function delete_document_<?php echo $methodid ?>(id_dokumen){
		if(check_submit == 0) {
			swal({
				title: "Confirm Delete <?php echo $page_title ?> Document ?",
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
					page_loading("show",'Delete <?php echo $page_title ?> Document','Please Wait...');
					$.ajax({
						url: baseurl+'<?php echo $class_uri ?>/delete_document',								
						data: {'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'
						,id_dokumen:id_dokumen},
						dataType: 'json',
						method: 'post',
						success: function(data){
							page_loading("hide");
							check_submit = 0;
							if(data.valid){
								show_success("show",'Delete <?php echo $page_title ?> Document',data.message);			
								$("#table_<?php echo $methodid ?>_document").trigger('reloadGrid');
								cancel_document_<?php echo $methodid ?>();
								
								setTimeout(function(){ 
									$('.tab_scrollbar').getNiceScroll().resize(); 
								}, 100);
							} else {
								show_error("show",'Error',data.message);
							}
						},
						error: function(xhr,error){
							show_error("show",xhr.status.toString() + ' ' + xhr.statusText,'Please try again');
							check_submit = 0;
						}
					});
				} else if (result.dismiss === swal.DismissReason.cancel) {
					swal.closeModal();	
					check_submit = 0;
				}
			});
		}
	}
	
	function cancel_document_<?php echo $methodid ?>(){
		$('#form_<?php echo $methodid ?>_document_id_document').val('');
		$('#form_<?php echo $methodid ?>_document_kode_dokumen').val('');
		$('#form_<?php echo $methodid ?>_document_kode_fasilitas').val('');
		$('#form_<?php echo $methodid ?>_document_nomor_dokumen').val('');
		$('#form_<?php echo $methodid ?>_document_seri_dokumen').val('');
		$('#form_<?php echo $methodid ?>_document_tanggal_dokumen').val('');
		$('#form_<?php echo $methodid ?>_document_memo').val('');
		$('#form_<?php echo $methodid ?>_document_uraian_dokumen').val('');
		$('#form_<?php echo $methodid ?>_document_uraian_fasilitas').val('');

		
		$('.button_<?php echo $methodid ?>_document_edit').hide();
		$('.button_<?php echo $methodid ?>_document_new').show();	
		
	}	
	/* End document_ceisa Function */	
	
	/* kemasan_ceisa Function */
	var jvalidate2 = $("#form_<?php echo $methodid ?>_packaging").validate({
		ignore: [],
		rules: {                                            
			nomorJaminan: {
				required: true
			},
			tanggalJaminan: {
				required: true
			},
			nomorBpj: {
				required: true
			},
			tanggalBpj: {
				required: true
			},
			kodeJenisJaminan: {
				required: true
			},
			nomorJaminan: {
				required: true
			},
			penjamin: {
				required: true
			},
			'nilaiJaminan': {
				min: 0
			}
		} 
	});
	
	var check_submit = 0;
	function add_kemasan_<?php echo $methodid ?>(){
		new_purchase_order = 0;
		if(check_submit == 0) {
			check_submit = 1;
			page_loading("show",'<?php echo $page_title ?> Data Jaminan','Please Wait...');
			var data = $("#form_<?php echo $methodid ?>_packaging").serialize();
			$.ajax({
				url: baseurl+'<?php echo $class_uri ?>/post_add_edit_jaminan',
				data: data,
				dataType: 'json',
				method: 'post',
				success: function(data){
					page_loading("hide");
					check_submit = 0;
					if(data.valid){
						show_success("show",'<?php echo $page_title ?> Data Jaminan',data.message);	
						
						$("#table_<?php echo $methodid ?>_packaging").trigger('reloadGrid');
						cancel_kemasan_<?php echo $methodid ?>();
						$("#table_<?php echo $methodid ?>_packaging").setGridWidth($('.grid_container_<?php echo $methodid; ?>_packaging').width() - 20,true).trigger('resize');
									
					} else {
						show_error("show",'Error',data.message);
					}
				},
				error: function(xhr,error){
					show_error("show",xhr.status.toString() + ' ' + xhr.statusText,'Please try again');
					check_submit = 0;
				}
			});
		}
	}
	
	function edit_kemasan_<?php echo $methodid ?>(id_jaminan){
		page_loading("show",'<?php echo $page_title ?>','Please Wait...');
		$.ajax({
			url: baseurl+'loader',
			data: {
				'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'
				,param: 'data_custom_export_kemasan'
				,id : id_jaminan
			},
			dataType: 'json',
			method: 'post',
			success: function(data){
				page_loading("hide");
				
				$('.button_<?php echo $methodid ?>_kemasan_edit').show();
				$('.button_<?php echo $methodid ?>_kemasan_new').hide();	
										
				$('#form_<?php echo $methodid ?>_packaging_idJaminan').val(data[0].id_jaminan);
				$('#form_<?php echo $methodid ?>_packaging_bc_out_header_id').val(data[0].bc_out_header_id);
				$('#form_<?php echo $methodid ?>_packaging_seriDokumen_jaminan').val(data[0].seri_jaminan);
				$('#form_<?php echo $methodid ?>_packaging_custom_type_id').val(data[0].custom_type_id);
				$('#form_<?php echo $methodid ?>_packaging_nomorBpj').val(data[0].nomor_bpj);
				$('#form_<?php echo $methodid ?>_packaging_tanggalBpj').val(data[0].tanggal_bpj);
				$('#form_<?php echo $methodid ?>_packaging_kodeJenisJaminan').val(data[0].kodeJenisJaminan);
				$('#form_<?php echo $methodid ?>_packaging_nomorJaminan').val(data[0].nomor_jaminan);
				$('#form_<?php echo $methodid ?>_packaging_tanggalJaminan').val(data[0].tanggal_jaminan);
				$('#form_<?php echo $methodid ?>_packaging_tanggalJatuhTempo').val(data[0].tgl_jatuh_tempo);
				$('#form_<?php echo $methodid ?>_packaging_penjamin').val(data[0].penjamin);
				$('#form_<?php echo $methodid ?>_packaging_nilaiJaminan').val(data[0].nilai_jaminan);
				
				change_form_<?php echo $methodid ?>_packaging_kodeJenisJaminan(data[0].kode_jenis_jaminan);

			}
		});
	}
	
	function delete_kemasan_<?php echo $methodid ?>(id_jaminan){
		if(check_submit == 0) {
			swal({
				title: "Confirm Delete <?php echo $page_title ?> Jaminan ?",
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
					page_loading("show",'Delete <?php echo $page_title ?> Jaminan','Please Wait...');
					$.ajax({
						url: baseurl+'<?php echo $class_uri ?>/delete_kemasan',								
						data: {'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'
						,idJaminan:id_jaminan},
						dataType: 'json',
						method: 'post',
						success: function(data){
							page_loading("hide");
							check_submit = 0;
							if(data.valid){
								show_success("show",'Delete <?php echo $page_title ?> Jaminan',data.message);			
								$("#table_<?php echo $methodid ?>_packaging").trigger('reloadGrid');
								cancel_kemasan_<?php echo $methodid ?>();
								
								setTimeout(function(){ 
									$('.tab_scrollbar').getNiceScroll().resize(); 
								}, 100);
							} else {
								show_error("show",'Error',data.message);
							}
						},
						error: function(xhr,error){
							show_error("show",xhr.status.toString() + ' ' + xhr.statusText,'Please try again');
							check_submit = 0;
						}
					});
				} else if (result.dismiss === swal.DismissReason.cancel) {
					swal.closeModal();	
					check_submit = 0;
				}
			});
		}
	}
	
	function cancel_kemasan_<?php echo $methodid ?>(){
		$('#form_<?php echo $methodid ?>_packaging_id_jaminan').val('');
		$('#form_<?php echo $methodid ?>_packaging_seriDokumen_jaminan').val('');
		$('#form_<?php echo $methodid ?>_packaging_kodeJenisJaminan').val('');
		$('#form_<?php echo $methodid ?>_packaging_nomorBpj').val('');
		$('#form_<?php echo $methodid ?>_packaging_tanggalBpj').val('');
		$('#form_<?php echo $methodid ?>_packaging_nomorJaminan').val('');
		$('#form_<?php echo $methodid ?>_packaging_tanggalJaminan').val('');
		$('#form_<?php echo $methodid ?>_packaging_tanggalJatuhTempo').val('');
		$('#form_<?php echo $methodid ?>_packaging_penjamin').val('');
		$('#form_<?php echo $methodid ?>_packaging_nilaiJaminan').val('');


		
		$('.button_<?php echo $methodid ?>_kemasan_edit').hide();
		$('.button_<?php echo $methodid ?>_kemasan_new').show();	
		
	}	
	/* End kemasan_ceisa Function */	
	
	/* kontainer_ceisa Function */
	var jvalidate2 = $("#form_<?php echo $methodid ?>_container").validate({
		ignore: [],
		rules: {                                            
			kode_jenis_kontainer: {
				required: true
			},
			kode_tipe_kontainer: {
				required: true
			},
			kode_ukuran_kontainer: {
				required: true
			},
			nomor_kontainer: {
				required: true
			},
			seri_kontainer: {
				required: true
			}
		} 
	});
	
	var check_submit = 0;
	function add_kontainer_<?php echo $methodid ?>(){
		new_purchase_order = 0;
		if(check_submit == 0) {
			check_submit = 1;
			page_loading("show",'<?php echo $page_title ?> Petikemas','Please Wait...');
			var data = $("#form_<?php echo $methodid ?>_container").serialize();
			$.ajax({
				url: baseurl+'<?php echo $class_uri ?>/post_add_edit_kontainer',
				data: data,
				dataType: 'json',
				method: 'post',
				success: function(data){
					page_loading("hide");
					check_submit = 0;
					if(data.valid){
						show_success("show",'<?php echo $page_title ?> Petikemas',data.message);	
						
						$("#table_<?php echo $methodid ?>_container").trigger('reloadGrid');
						cancel_kontainer_<?php echo $methodid ?>();
						$("#table_<?php echo $methodid ?>_container").setGridWidth($('.grid_container_<?php echo $methodid; ?>_container').width() - 20,true).trigger('resize');
									
					} else {
						show_error("show",'Error',data.message);
					}
				},
				error: function(xhr,error){
					show_error("show",xhr.status.toString() + ' ' + xhr.statusText,'Please try again');
					check_submit = 0;
				}
			});
		}
	}
	
	function edit_kontainer_<?php echo $methodid ?>(id_kontainer){
		page_loading("show",'<?php echo $page_title ?>','Please Wait...');
		$.ajax({
			url: baseurl+'loader',
			data: {
				'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'
				,param: 'data_custom_export_kontainer'
				,id : id_kontainer
			},
			dataType: 'json',
			method: 'post',
			success: function(data){
				page_loading("hide");
				
				$('.button_<?php echo $methodid ?>_kontainer_edit').show();
				$('.button_<?php echo $methodid ?>_kontainer_new').hide();	
										
				$('#form_<?php echo $methodid ?>_container_id_kontainer').val(data[0].id_kontainer);
				$('#form_<?php echo $methodid ?>_container_seri_kontainer').val(data[0].seri);
				$('#form_<?php echo $methodid ?>_container_nomor_kontainer').val(data[0].nomor);
				$('#form_<?php echo $methodid ?>_container_memo').val(data[0].note);
				

				change_form_<?php echo $methodid ?>_container_kode_jenis_kontainer(data[0].id_jenis);
				change_form_<?php echo $methodid ?>_container_kode_tipe_kontainer(data[0].id_tipe);
				change_form_<?php echo $methodid ?>_container_kode_ukuran_kontainer(data[0].id_ukuran);
	
			}
		});
	}
	
	function delete_kontainer_<?php echo $methodid ?>(sales_order_detail_id){
		if(check_submit == 0) {
			swal({
				title: "Confirm Delete <?php echo $page_title ?> Kontainer ?",
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
					page_loading("show",'Delete <?php echo $page_title ?> Kontainer','Please Wait...');
					$.ajax({
						url: baseurl+'<?php echo $class_uri ?>/delete_kontainer',								
						data: {'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'
						,id_kontainer:sales_order_detail_id},
						dataType: 'json',
						method: 'post',
						success: function(data){
							page_loading("hide");
							check_submit = 0;
							if(data.valid){
								show_success("show",'Delete <?php echo $page_title ?> Kontainer',data.message);			
								$("#table_<?php echo $methodid ?>_container").trigger('reloadGrid');
								cancel_kontainer_<?php echo $methodid ?>();
								
								setTimeout(function(){ 
									$('.tab_scrollbar').getNiceScroll().resize(); 
								}, 100);
							} else {
								show_error("show",'Error',data.message);
							}
						},
						error: function(xhr,error){
							show_error("show",xhr.status.toString() + ' ' + xhr.statusText,'Please try again');
							check_submit = 0;
						}
					});
				} else if (result.dismiss === swal.DismissReason.cancel) {
					swal.closeModal();	
					check_submit = 0;
				}
			});
		}
	}
	
	function cancel_kontainer_<?php echo $methodid ?>(){
		$('#form_<?php echo $methodid ?>_container_id_kontainer').val('');
		$('#form_<?php echo $methodid ?>_container_seri_kontainer').val('');
		$('#form_<?php echo $methodid ?>_container_kode_jenis_kontainer').val('');
		$('#form_<?php echo $methodid ?>_container_kode_tipe_kontainer').val('');
		$('#form_<?php echo $methodid ?>_container_kode_ukuran_kontainer').val('');
		$('#form_<?php echo $methodid ?>_container_nomor_kontainer').val('');
		$('#form_<?php echo $methodid ?>_container_seri_kontainer').val('');
		$('#form_<?php echo $methodid ?>_container_memo').val('');


		
		$('.button_<?php echo $methodid ?>_kontainer_edit').hide();
		$('.button_<?php echo $methodid ?>_kontainer_new').show();	
		
	}	
	/* End kontainer_ceisa Function */	
	
	/* pkb_ceisa Function */
	var jvalidate2 = $("#form_<?php echo $methodid ?>_pkb").validate({
		ignore: [],
		rules: {                                            
			/* kode_jenis_kontainer: {
				required: true
			},
			kode_tipe_kontainer: {
				required: true
			},
			kode_ukuran_kontainer: {
				required: true
			},
			nomor_kontainer: {
				required: true
			},
			'seri_kontainer': {
				required: true
			} */
		} 
	});
	
	var check_submit = 0;
	function add_pkb_<?php echo $methodid ?>(){
		new_purchase_order = 0;
		if(check_submit == 0) {
			check_submit = 1;
			page_loading("show",'<?php echo $page_title ?> Siap Periksa','Please Wait...');
			var data = $("#form_<?php echo $methodid ?>_pkb").serialize();
			$.ajax({
				url: baseurl+'<?php echo $class_uri ?>/post_add_edit_pkb',
				data: data,
				dataType: 'json',
				method: 'post',
				success: function(data){
					page_loading("hide");
					check_submit = 0;
					if(data.valid){
						show_success("show",'<?php echo $page_title ?> Siap Periksa',data.message);	
						
						$("#table_<?php echo $methodid ?>_pkb").trigger('reloadGrid');
						cancel_pkb_<?php echo $methodid ?>();
						$("#table_<?php echo $methodid ?>_pkb").setGridWidth($('.grid_container_<?php echo $methodid; ?>_pkb').width() - 20,true).trigger('resize');
									
					} else {
						show_error("show",'Error',data.message);
					}
				},
				error: function(xhr,error){
					show_error("show",xhr.status.toString() + ' ' + xhr.statusText,'Please try again');
					check_submit = 0;
				}
			});
		}
	}
	
	function edit_pkb_<?php echo $methodid ?>(pkb_id){
		page_loading("show",'<?php echo $page_title ?>','Please Wait...');
		$.ajax({
			url: baseurl+'loader',
			data: {
				'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'
				,param: 'data_custom_export_pkb'
				,id : pkb_id
			},
			dataType: 'json',
			method: 'post',
			success: function(data){
				page_loading("hide");
				
				$('.button_<?php echo $methodid ?>_pkb_edit').show();
				$('.button_<?php echo $methodid ?>_pkb_new').hide();	
										
				$('#form_<?php echo $methodid ?>_pkb_pkb_id').val(data[0].pkb_id);
				$('#form_<?php echo $methodid ?>_pkb_nama_pic').val(data[0].nama_pic);
				$('#form_<?php echo $methodid ?>_pkb_alamat').val(data[0].alamat);
				$('#form_<?php echo $methodid ?>_pkb_nomor_tlp_pic').val(data[0].nomor_tlp);
				$('#form_<?php echo $methodid ?>_pkb_lokasi_siap_periksa').val(data[0].lokasi_siap_periksa);
				$('#form_<?php echo $methodid ?>_pkb_tanggal_pkb').val(data[0].tanggal_pkb);
				$('#form_<?php echo $methodid ?>_pkb_waktu_siap_periksa').val(data[0].waktu_siap_periksa);
				$('#form_<?php echo $methodid ?>_pkb_jumlah_kontainer_20').val(data[0].jumlah_kontainer_20);
				$('#form_<?php echo $methodid ?>_pkb_jumlah_kontainer_40').val(data[0].jumlah_kontainer_40);
				
				change_form_<?php echo $methodid ?>_pkb_jenis_barang_id(data[0].jenis_barang_id);
				change_form_<?php echo $methodid ?>_pkb_jenis_gudang_id(data[0].jenis_gudang_id);	
				change_form_<?php echo $methodid ?>_pkb_cara_stuffing_id(data[0].cara_stuffing_id);		
				change_form_<?php echo $methodid ?>_pkb_jenis_partof_id(data[0].jenis_partof_id);		
				
			}
		});
	}
	
	function delete_pkb_<?php echo $methodid ?>(sales_order_detail_id){
		if(check_submit == 0) {
			swal({
				title: "Confirm Delete <?php echo $page_title ?> Siap Periksa ?",
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
					page_loading("show",'Delete <?php echo $page_title ?> Siap Periksa','Please Wait...');
					$.ajax({
						url: baseurl+'<?php echo $class_uri ?>/delete_pkb',								
						data: {'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'
						,pkb_id:sales_order_detail_id},
						dataType: 'json',
						method: 'post',
						success: function(data){
							page_loading("hide");
							check_submit = 0;
							if(data.valid){
								show_success("show",'Delete <?php echo $page_title ?> Siap Periksa',data.message);			
								$("#table_<?php echo $methodid ?>_pkb").trigger('reloadGrid');
								cancel_pkb_<?php echo $methodid ?>();
								
								setTimeout(function(){ 
									$('.tab_scrollbar').getNiceScroll().resize(); 
								}, 100);
							} else {
								show_error("show",'Error',data.message);
							}
						},
						error: function(xhr,error){
							show_error("show",xhr.status.toString() + ' ' + xhr.statusText,'Please try again');
							check_submit = 0;
						}
					});
				} else if (result.dismiss === swal.DismissReason.cancel) {
					swal.closeModal();	
					check_submit = 0;
				}
			});
		}
	}
	
	function cancel_pkb_<?php echo $methodid ?>(){
		$('#form_<?php echo $methodid ?>_pkb_pkb_id').val('');
		$('#form_<?php echo $methodid ?>_pkb_jenis_barang_id').val('');
		$('#form_<?php echo $methodid ?>_pkb_jenis_gudang_id').val('');
		$('#form_<?php echo $methodid ?>_pkb_nama_pic').val('');
		$('#form_<?php echo $methodid ?>_pkb_alamat').val('');
		$('#form_<?php echo $methodid ?>_pkb_nomor_tlp_pic').val('');
		$('#form_<?php echo $methodid ?>_pkb_lokasi_siap_periksa').val('');
		$('#form_<?php echo $methodid ?>_pkb_cara_stuffing_id').val('');
		$('#form_<?php echo $methodid ?>_pkb_jenis_partof_id').val('');
		$('#form_<?php echo $methodid ?>_pkb_tanggal_pkb').val('');
		$('#form_<?php echo $methodid ?>_pkb_waktu_siap_periksa').val('');
		$('#form_<?php echo $methodid ?>_pkb_jumlah_kontainer_20').val(0);
		$('#form_<?php echo $methodid ?>_pkb_jumlah_kontainer_40').val(0);


		
		$('.button_<?php echo $methodid ?>_pkb_edit').hide();
		$('.button_<?php echo $methodid ?>_pkb_new').show();	
		
	}	
	/* End pkb_ceisa Function */
	
	$(function () {
		"use strict";
		$("#table_<?php echo $methodid ?>_sales_performa").jqGrid({
			url: baseurl+'<?php echo $class_uri ?>/loaddata_performa',
			mtype : "post",
			postData:{
					'q':'1'
					,'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>'
					, 'partner_id' : function (){
									return $('#form_<?php echo $methodid ?>_partner_id').val();	
								}
					, 'currencies_id' : function (){
						return $('#form_<?php echo $methodid ?>_currencies_id').val();	
					}						
			},
			datatype: "json",
			colNames:['sales_performa_id', 'Proforma No', 'Proforma Date'],
			colModel:[
				{name:'r1',index:'r1', width:60, hidden : true, key: true},  
				{name:'r2',index:'r2', width:60},  
				{name:'r3',index:'r3', width:60},
			],
			iconSet: "fontAwesome",
			rownumbers: true,
			rowNum:10,
			rowList:[10,20,30],
			pager: '#ptable_<?php echo $methodid ?>_sales_performa',
			sortname: "r1",
			sortorder: "asc",
			autowidth:true,
			shrinkToFit:false,
			forceFit:true,
			height: 250,		
			jsonReader: { repeatitems : false },
			viewrecords : true,
			gridview:true,
			multiselect: true,
			onSelectRow: updateIdsOfSelectedRows_<?php echo $methodid ?>_sales_performa,
			onSelectAll: function (aRowids, isSelected) {
				var i, count, id;
				for (i = 0, count = aRowids.length; i < count; i++) {
					id = aRowids[i];
					updateIdsOfSelectedRows_<?php echo $methodid ?>_sales_performa(id, isSelected);
				}
			},
			loadComplete: function () {
				var $this = $(this), i, count;
				for (i = 0, count = idsOfSelectedRows_<?php echo $methodid ?>_sales_performa.length; i < count; i++) {
					$this.jqGrid('setSelection', idsOfSelectedRows_<?php echo $methodid ?>_sales_performa[i], false);
				}
			}
		}); 
		$("#table_<?php echo $methodid ?>_sales_performa").jqGrid("setColProp", "rn", {hidedlg: false});
					
		$("#table_<?php echo $methodid ?>_sales_performa").jqGrid('navGrid','#ptable_<?php echo $methodid ?>_sales_performa',{edit:false,add:false,del:false,view:false, search: false});  
		$("#table_<?php echo $methodid ?>_sales_performa").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false, defaultSearch: 'cn', ignoreCase: false});  	
	});
		
	$(function () {
		"use strict";
		$("#table_<?php echo $methodid ?>_contract_subcon").jqGrid({
			url: baseurl+'<?php echo $class_uri ?>/loaddata_contract_subcon',
			mtype : "post",
			postData:{
					'q':'1'
					,'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>'
					, 'partner_id' : function (){
									return $('#form_<?php echo $methodid ?>_partner_id').val();	
								}
					, 'currencies_id' : function (){
						return $('#form_<?php echo $methodid ?>_currencies_id').val();	
					}						
			},
			datatype: "json",
			colNames:['subcon_in_id', 'Incoming Subcon No', 'Incoming Subcon Date'],
			colModel:[
				{name:'r1',index:'r1', width:60, hidden : true, key: true},  
				{name:'r2',index:'r2', width:60},  
				{name:'r3',index:'r3', width:60},
			],
			iconSet: "fontAwesome",
			rownumbers: true,
			rowNum:10,
			rowList:[10,20,30],
			pager: '#ptable_<?php echo $methodid ?>_contract_subcon',
			sortname: "r1",
			sortorder: "asc",
			autowidth:true,
			shrinkToFit:false,
			forceFit:true,
			height: 250,		
			jsonReader: { repeatitems : false },
			viewrecords : true,
			gridview:true,
			multiselect: true,
			onSelectRow: updateIdsOfSelectedRows_<?php echo $methodid ?>_contract_subcon,
			onSelectAll: function (aRowids, isSelected) {
				var i, count, id;
				for (i = 0, count = aRowids.length; i < count; i++) {
					id = aRowids[i];
					updateIdsOfSelectedRows_<?php echo $methodid ?>_contract_subcon(id, isSelected);
				}
			},
			loadComplete: function () {
				var $this = $(this), i, count;
				for (i = 0, count = idsOfSelectedRows_<?php echo $methodid ?>_contract_subcon.length; i < count; i++) {
					$this.jqGrid('setSelection', idsOfSelectedRows_<?php echo $methodid ?>_contract_subcon[i], false);
				}
			}
		}); 
		$("#table_<?php echo $methodid ?>_contract_subcon").jqGrid("setColProp", "rn", {hidedlg: false});
					
		$("#table_<?php echo $methodid ?>_contract_subcon").jqGrid('navGrid','#ptable_<?php echo $methodid ?>_contract_subcon',{edit:false,add:false,del:false,view:false, search: false});  
		$("#table_<?php echo $methodid ?>_contract_subcon").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false, defaultSearch: 'cn', ignoreCase: false});  	
	});
	
	var click_transfer_<?php echo $methodid ?> = function (id, isSelected) {
		$('#form_<?php echo $methodid ?>_supply_item_stock_move_id').val('');
		$('#form_<?php echo $methodid ?>_supply_bc_out_barang_supply_id').val('');
		$('#form_<?php echo $methodid ?>_supply_quantity_supply').val(0);
		$('#form_<?php echo $methodid ?>_supply_from').val('');
		$('#form_<?php echo $methodid ?>_supply_receive_date').val('');
		$('#form_<?php echo $methodid ?>_supply_receive_no').val('');
		
		if (!isSelected) {
			$('#form_<?php echo $methodid ?>_supply_bc_out_barang_id').val('');
		} else {
			var row = jQuery("#table_<?php echo $methodid ?>_supply").jqGrid('getRowData',id);
			bc_out_barang_id = parseInt(unwrap_cell_value(row.r1).replace(/,/g, ''));
			$('#form_<?php echo $methodid ?>_supply_bc_out_barang_id').val(bc_out_barang_id);
		}
		
		$("#table_<?php echo $methodid ?>_available").trigger('reloadGrid');	
		$("#table_<?php echo $methodid ?>_list_transfer").trigger('reloadGrid');	
	}
	
	var click_item_<?php echo $methodid ?> = function (id, isSelected) {	
		if (!isSelected) {
			var row_supply = $("#table_<?php echo $methodid ?>_list_transfer").jqGrid('getRowData',id);
			if(unwrap_cell_value(row_supply.r1) == id){
				var table_available = $("#table_<?php echo $methodid ?>_list_transfer").jqGrid('getGridParam','selrow');
				if(table_available == id){
					$("#table_<?php echo $methodid ?>_list_transfer").jqGrid("resetSelection");
				}
			}
			
			$('#form_<?php echo $methodid ?>_supply_stock_move_id').val('');
			$('#form_<?php echo $methodid ?>_supply_bc_out_barang_supply_id').val('');
			$('#form_<?php echo $methodid ?>_supply_quantity_supply').val(0);
			$('#form_<?php echo $methodid ?>_supply_from').val('');
			$('#form_<?php echo $methodid ?>_supply_receive_date').val('');
			$('#form_<?php echo $methodid ?>_supply_receive_no').val('');
		} else {
			var row = $("#table_<?php echo $methodid ?>_available").jqGrid('getRowData',id);
			stock_move_id = parseInt(unwrap_cell_value(row.r1).replace(/,/g, ''));
			from = unwrap_cell_value(row.r3);
			receive_date = unwrap_cell_value(row.r4);
			receive_no = unwrap_cell_value(row.r5);
			quantity_supply = parseFloat(unwrap_cell_value(row.r8).replace(/,/g, ''));
			bc_out_barang_supply_id = '';
			
			var row_supply = $("#table_<?php echo $methodid ?>_list_transfer").jqGrid('getRowData',id);
			if(unwrap_cell_value(row_supply.r1) == id){
				bc_out_barang_supply_id = parseInt(unwrap_cell_value(row_supply.r3).replace(/,/g, ''));
				quantity_supply = parseFloat(unwrap_cell_value(row_supply.r9).replace(/,/g, ''));
				
				var table_available = $("#table_<?php echo $methodid ?>_list_transfer").jqGrid('getGridParam','selrow');
				if(table_available != id){
					$('#table_<?php echo $methodid ?>_list_transfer').jqGrid('setSelection',id);
				}
			} else {
				$("#table_<?php echo $methodid ?>_list_transfer").jqGrid("resetSelection");
			}
			
			
			$('#form_<?php echo $methodid ?>_supply_stock_move_id').val(stock_move_id);
			$('#form_<?php echo $methodid ?>_supply_bc_out_barang_supply_id').val(bc_out_barang_supply_id);
			$('#form_<?php echo $methodid ?>_supply_quantity_supply').val(quantity_supply);
			$('#form_<?php echo $methodid ?>_supply_from').val(from);
			$('#form_<?php echo $methodid ?>_supply_receive_date').val(receive_date);
			$('#form_<?php echo $methodid ?>_supply_receive_no').val(receive_no);
			
		}
	}
	
	var click_supply_<?php echo $methodid ?> = function (id, isSelected) {
		if (!isSelected) {	
			var row_available = $("#table_<?php echo $methodid ?>_available").jqGrid('getRowData',id);
			if(unwrap_cell_value(row_available.r1) == id){
				var table_available = $("#table_<?php echo $methodid ?>_available").jqGrid('getGridParam','selrow');
				if(table_available == id){
					$("#table_<?php echo $methodid ?>_available").jqGrid("resetSelection");
				}
			}
			
			$('#form_<?php echo $methodid ?>_supply_stock_move_id').val('');
			$('#form_<?php echo $methodid ?>_supply_bc_out_barang_supply_id').val('');
			$('#form_<?php echo $methodid ?>_supply_quantity_supply').val(0);
			$('#form_<?php echo $methodid ?>_supply_from').val('');
			$('#form_<?php echo $methodid ?>_supply_receive_date').val('');
			$('#form_<?php echo $methodid ?>_supply_receive_no').val('');
		} else {
			var row = $("#table_<?php echo $methodid ?>_list_transfer").jqGrid('getRowData',id);
			stock_move_id = parseInt(unwrap_cell_value(row.r1).replace(/,/g, ''));
			from = unwrap_cell_value(row.r4);
			receive_date = unwrap_cell_value(row.r5);
			receive_no = unwrap_cell_value(row.r6);
			bc_out_barang_supply_id = parseInt(unwrap_cell_value(row.r3).replace(/,/g, ''));
			quantity_supply = parseFloat(unwrap_cell_value(row.r9).replace(/,/g, ''));
			
			var row_available = $("#table_<?php echo $methodid ?>_available").jqGrid('getRowData',id);
			if(unwrap_cell_value(row_available.r1) == id){
				var table_available = $("#table_<?php echo $methodid ?>_available").jqGrid('getGridParam','selrow');
				if(table_available != id){
					$('#table_<?php echo $methodid ?>_available').jqGrid('setSelection',id);
				}
			} else {
				$("#table_<?php echo $methodid ?>_available").jqGrid("resetSelection");
			}
			
			$('#form_<?php echo $methodid ?>_supply_stock_move_id').val(stock_move_id);
			$('#form_<?php echo $methodid ?>_supply_bc_out_barang_supply_id').val(bc_out_barang_supply_id);
			$('#form_<?php echo $methodid ?>_supply_quantity_supply').val(quantity_supply);
			$('#form_<?php echo $methodid ?>_supply_from').val(from);
			$('#form_<?php echo $methodid ?>_supply_receive_date').val(receive_date);
			$('#form_<?php echo $methodid ?>_supply_receive_no').val(receive_no);
		}
	}
	
	function custom_export_<?php echo $custom_type_id ?>_transfer_supply(id){
		$.ajax({
			url: baseurl+'loader',
			data: {
				'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'
				,param: 'data_custom_export'
				,id : id
			},
			dataType: 'json',
			method: 'post',
			success: function(data){
				custom_export_<?php echo $custom_type_id ?>_bc_out_header_id = data[0].bc_out_header_id;
				
				$('#form_<?php echo $methodid ?>_supply_bc_out_header_id').val(data[0].bc_out_header_id);
				$('#form_<?php echo $methodid ?>_supply_bc_out_barang_id').val('');
				$('#form_<?php echo $methodid ?>_supply_bc_out_barang_supply_id').val('');
				$('#form_<?php echo $methodid ?>_supply_car').val(data[0].car);
				$('#form_<?php echo $methodid ?>_supply_bc_no').val(data[0].bc_no);
				$('#form_<?php echo $methodid ?>_supply_bc_date').val(data[0].bc_date);
				//$('#form_<?php echo $methodid ?>_supply_tanggal_aju').val(data[0].tanggal_aju);
				
				setTimeout(function(){ 
					$("#table_<?php echo $methodid ?>_supply").trigger('reloadGrid');
					$("#table_<?php echo $methodid ?>_supply").setGridWidth($('.grid_container_<?php echo $methodid; ?>_supply').width() - 20,true).trigger('resize');
					
					$("#table_<?php echo $methodid ?>_available").trigger('reloadGrid');
					$("#table_<?php echo $methodid ?>_available").setGridWidth($('.grid_container_<?php echo $methodid; ?>_available').width() - 20,true).trigger('resize');
						
					$("#table_<?php echo $methodid ?>_list_transfer").trigger('reloadGrid');
					$("#table_<?php echo $methodid ?>_list_transfer").setGridWidth($('.grid_container_<?php echo $methodid; ?>_list_transfer').width() - 20,true).trigger('resize');
											
					$('.tab_scrollbar').getNiceScroll().resize(); 
				}, 500);
			}
		});
	}
	
	var check_submit = 0;
	function post_<?php echo $methodid ?>_supply(){
		new_work_order_transfer = 0;
		if(check_submit == 0) {
			check_submit = 1;
			page_loading("show",'Supply','Please Wait...');
			var data = $("#form_<?php echo $methodid ?>_supply").serialize();
			$.ajax({
				url: baseurl+'<?php echo $class_uri ?>/post_add_edit_supply',
				data: data,
				dataType: 'json',
				method: 'post',
				success: function(data){
					page_loading("hide");
					check_submit = 0;
					if(data.valid){
						show_success("show",'Detail',data.message);	
						$("#table_<?php echo $methodid ?>_supply").trigger('reloadGrid');
						$("#table_<?php echo $methodid ?>_supply").setGridWidth($('.grid_container_<?php echo $methodid; ?>_supply').width() - 20,true).trigger('resize');
						
						$("#table_<?php echo $methodid ?>_available").trigger('reloadGrid');
						$("#table_<?php echo $methodid ?>_available").setGridWidth($('.grid_container_<?php echo $methodid; ?>_available').width() - 20,true).trigger('resize');
						
						$("#table_<?php echo $methodid ?>_list_transfer").trigger('reloadGrid');
						$("#table_<?php echo $methodid ?>_list_transfer").setGridWidth($('.grid_container_<?php echo $methodid; ?>_list_transfer').width() - 20,true).trigger('resize');
							
						setTimeout(function(){ 
							$('.tab_scrollbar').getNiceScroll().resize(); 
						}, 100);
					} else {
						show_error("show",'Error',data.message);
					}
				},
				error: function(xhr,error){
					show_error("show",xhr.status.toString() + ' ' + xhr.statusText,'Please try again');
					check_submit = 0;
				}
			});
		}
	}
	
	function custom_export_<?php echo $custom_type_id ?>_transfer_supply_fifo(){
		if(check_submit == 0) {
			swal({
				title: "Auto Supply FIFO ?",
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
					page_loading("show",'Auto Supply FIFO','Please Wait...');
					$.ajax({
						url: baseurl+'<?php echo $class_uri ?>/auto_supply_fifo',								
						data: {'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>',bc_out_header_id:custom_export_<?php echo $custom_type_id ?>_bc_out_header_id},
						dataType: 'json',
						method: 'post',
						success: function(data){
							page_loading("hide");
							check_submit = 0;
							if(data.valid){
								show_success("show",'Auto Supply FIFO',data.message);			
								
								$("#table_<?php echo $methodid ?>_supply").trigger('reloadGrid');
								$("#table_<?php echo $methodid ?>_supply").setGridWidth($('.grid_container_<?php echo $methodid; ?>_supply').width() - 20,true).trigger('resize');
								
								$("#table_<?php echo $methodid ?>_available").trigger('reloadGrid');
								$("#table_<?php echo $methodid ?>_available").setGridWidth($('.grid_container_<?php echo $methodid; ?>_available').width() - 20,true).trigger('resize');
								
								$("#table_<?php echo $methodid ?>_list_transfer").trigger('reloadGrid');
								$("#table_<?php echo $methodid ?>_list_transfer").setGridWidth($('.grid_container_<?php echo $methodid; ?>_list_transfer').width() - 20,true).trigger('resize');
									
								setTimeout(function(){ 
									$('.tab_scrollbar').getNiceScroll().resize(); 
								}, 100);
							} else {
								show_error("show",'Error',data.message);
							}
						},
						error: function(xhr,error){
							show_error("show",xhr.status.toString() + ' ' + xhr.statusText,'Please try again');
							check_submit = 0;
						}
					});
				} else if (result.dismiss === swal.DismissReason.cancel) {
					swal.closeModal();	
					check_submit = 0;
				}
			});
		}
	}
	
	function custom_export_<?php echo $custom_type_id ?>_transfer_supply_lifo(){
		if(check_submit == 0) {
			swal({
				title: "Auto Supply LIFO ?",
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
					page_loading("show",'Auto Supply LIFO','Please Wait...');
					$.ajax({
						url: baseurl+'<?php echo $class_uri ?>/auto_supply_lifo',								
						data: {'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>',bc_out_header_id:custom_export_<?php echo $custom_type_id ?>_bc_out_header_id},
						dataType: 'json',
						method: 'post',
						success: function(data){
							page_loading("hide");
							check_submit = 0;
							if(data.valid){
								show_success("show",'Auto Supply LIFO',data.message);			
								$("#table_<?php echo $methodid ?>_supply").trigger('reloadGrid');
								$("#table_<?php echo $methodid ?>_supply").setGridWidth($('.grid_container_<?php echo $methodid; ?>_supply').width() - 20,true).trigger('resize');
								
								$("#table_<?php echo $methodid ?>_available").trigger('reloadGrid');
								$("#table_<?php echo $methodid ?>_available").setGridWidth($('.grid_container_<?php echo $methodid; ?>_available').width() - 20,true).trigger('resize');
								
								$("#table_<?php echo $methodid ?>_list_transfer").trigger('reloadGrid');
								$("#table_<?php echo $methodid ?>_list_transfer").setGridWidth($('.grid_container_<?php echo $methodid; ?>_list_transfer').width() - 20,true).trigger('resize');
									
								setTimeout(function(){ 
									$('.tab_scrollbar').getNiceScroll().resize(); 
								}, 100);
							} else {
								show_error("show",'Error',data.message);
							}
						},
						error: function(xhr,error){
							show_error("show",xhr.status.toString() + ' ' + xhr.statusText,'Please try again');
							check_submit = 0;
						}
					});
				} else if (result.dismiss === swal.DismissReason.cancel) {
					swal.closeModal();	
					check_submit = 0;
				}
			});
		}
	}
	
	function generate_car_<?php echo $methodid ?>(){
		//$('#form_<?php echo $methodid ?>_car').val('');
	
			$.ajax({
				url: baseurl+'<?php echo $class_uri ?>/inc_noAju',
				type : 'POST',
				dataType: 'json',
				data: {'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'
						,custom_type_id:'<?php echo $custom_type_id ?>'},
				success: function(msg){
					$('#form_<?php echo $methodid ?>_car').val(msg.incre);
				},
				error: function(){

				}
			});	
		
	}
	
	
	function generate_kurs_<?php echo $methodid ?>(){
		page_loading("show",'<?php echo $page_title ?>','Please Wait...');
		$('#form_<?php echo $methodid ?>_ndpbm').val('');
		$.ajax({
			url: baseurl+'<?php echo $class_uri ?>/get_kurs',
			type : 'POST',
			dataType: 'json',
			data: {'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'
					,currencies_id:$('#form_<?php echo $methodid ?>_currencies_id').val()},
			success: function(msg){
				page_loading("hide");
				$('#form_<?php echo $methodid ?>_ndpbm').val(msg.message);
				
			},
			error: function(){

			}
		});
	}
	
	
	
	function generate_kursx_<?php echo $methodid ?>(){
		$.ajax({
			url: baseurl+'<?php echo $class_uri ?>/get_kurs',
			type : 'POST',
			dataType: 'json',
			data: {'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'
					,currencies_id:$('#form_<?php echo $methodid ?>_currencies_id').val()},
			success: function(msg){
				$('#form_<?php echo $methodid ?>_ndpbm').val(msg.message);
			},
			error: function(){

			}
		});
	}
	
	
	
	
</script>