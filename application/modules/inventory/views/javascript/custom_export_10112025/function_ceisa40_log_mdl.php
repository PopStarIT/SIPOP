<script type="text/javascript">  


	function nav_button_<?php echo $function ?>(){
		var id = jQuery("#table_<?php echo $methodid ?>").jqGrid('getGridParam','selrow');
		if (id) { 
			var row = jQuery("#table_<?php echo $methodid ?>").jqGrid('getRowData',id); 
				$("#txt_<?php echo $methodid ?>_header").val(row.r1);
				$("#table_<?php echo $methodid ?>_responlogs").jqGrid('setGridParam',{postData:{'q':'1','bc_out_header_id':$("#txt_<?php echo $methodid ?>_header").val(),'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>'}}).trigger("reloadGrid"); 
				$('#mdl_log_respon_<?php echo $methodid ?>').modal();
				
				setTimeout(function(){ 
					
				//set ukuran grid pada modal	
					
					$("#table_<?php echo $methodid ?>_responlogs").trigger('reloadGrid');
					$("#table_<?php echo $methodid ?>_responlogs").setGridWidth($('.grid_container_<?php echo $methodid; ?>_responlogs').width() - 20,true).trigger('resize');
					
				}, 500);

		} else {
			show_error("show",'Error','Please select row');
		}

	
	}

		
	$(function () {
		"use strict";
		var lebar = $(".col-xl-12").width() - 410;
		$("#table_<?php echo $methodid ?>_responlogs").jqGrid({
			url: baseurl+'<?php echo $class_uri ?>/data_respon',
			mtype : "post",
			postData:{'q':'1','<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>'},
			datatype: "json",
			colNames:[
				'id_respon'
				,'bc_out_header_id'
				,'bc_in_header_id'
				,'Car'
				,'Nomor Daftar'
				,'Tanggal Daftar'
				,'Status'
				,'File'
				,'Keterangan'
				,'Nomor Respon'
				,'Tanggal Respon'
				,'Waktu Respon'
			],
			colModel:[
				{name:'id_respon',index:'id_respon', width:190,align:'left', hidden:true},
				{name:'bc_out_header_id',index:'bc_out_header_id', width:190,align:'left', hidden:true},
				{name:'bc_in_header_id',index:'bc_in_header_id', width:190,align:'left', hidden:true},
				{name:'nomoraju',index:'nomoraju', width:190,align:'left'},
				{name:'nomor_daftar',index:'nomor_daftar', width:190,align:'left'},
				{name:'tanggal_daftar',index:'tanggal_daftar', width:190,align:'left'},
				{name:'keterangan',index:'keterangan', width:190,align:'left'},
				{name:'pdf',index:'pdf', width:250,align:'left'},
				{name:'pesan',index:'pesan', width:300,align:'left'},
				{name:'nomorrespon',index:'nomorrespon', width:190,align:'left'},
				{name:'tanggalrespon',index:'tanggalrespon', width:190,align:'left'},
				{name:'waktustatus',index:'waktustatus', width:190,align:'left'},
				 
			],
			iconSet: "fontAwesome",
            iconSet: "fontAwesome",
            rownumbers: true,
			rowNum:100,
			//rowList:[10,20,30],
			pager: '#ptable_<?php echo $methodid ?>_responlogs',
            sortname: "id_respon",
            sortorder: "desc",
			shrinkToFit:false,
			//autowidth: false,
			height: 150,	
			width: lebar,
			jsonReader: { repeatitems : false },
			viewrecords : true,
			gridview:true,
			gridComplete: function(){
				var rowIDs = jQuery("#table_<?php echo $methodid ?>_responlogs").jqGrid('getDataIDs');
				var rowData = $("#table_<?php echo $methodid ?>_responlogs").jqGrid('getRowData');
				for (var i = 0; i < rowData.length; i++)
				{
					var trElement = jQuery("#"+ rowIDs[i],jQuery('#table_<?php echo $methodid ?>_responlogs'));
					
					if( rowData[i].car ==  '-' ){
						trElement.css({"color":"red"});
					}
					
				}
			
				
			},
			onSelectRow: function(ids) {
				var ret = jQuery("#table_<?php echo $methodid ?>_responlogs").jqGrid('getRowData',ids);		
				
			}
		}); 
		
		$("#table_<?php echo $methodid ?>_responlogs").jqGrid('navGrid','#ptable_<?php echo $methodid ?>_responlogs',{edit:false,add:false,del:false,view:false, search: false});  
		$("#table_<?php echo $methodid ?>_responlogs").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false, defaultSearch: 'cn', ignoreCase: false}); 
			 
			
	});
	
	
	$("#btnprint_log_<?php echo $methodid ?>").click(function(){
			
			
			var id = jQuery("#table_<?php echo $methodid ?>_responlogs").jqGrid('getGridParam','selrow');
			if (id) { 
				var row = jQuery("#table_<?php echo $methodid ?>_responlogs").jqGrid('getRowData',id); 
				window.open(baseurl+'<?php echo $class_uri ?>/cetak_respon_ceisa'+ '?bc_out_header_id=' + row.bc_out_header_id + '&id_respon='+row.id_respon + '&Pdf='+row.Pdf,'_BLANK');
				return false;
		

			} else {
				show_error("show",'Error','Please select row');
			}
			 
			
	
	});
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
</script>