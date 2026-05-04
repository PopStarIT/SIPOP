<script type="text/javascript">  
	$(function () {
        "use strict";	
		$("#table_<?php echo $methodid ?>").jqGrid({
			url: baseurl+'<?php echo $class_uri ?>/loaddata',
			mtype : "post",
			postData:{'q':'1','date_start':'<?php echo date("Y-m-d", strtotime( date( "Y-m-d", strtotime( date("Y-m-d") ) ) . "-1 month" ) ) ?>','date_end':'<?php echo date("Y-m-d") ?>','<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>'},
			datatype: "json",
			colNames:[
				'JENIS','NOMOR', 'TANGGAL'
				, 'NOMOR', 'TANGGAL'
				, 'PEMBELI/PENERIMA', 'KODE', 'URAIAN', 'SAT'
				, 'JUMLAH', 'JENIS', 'DETAIL PROSES', 'NOMOR'
				, 'TANGGAL', 'JUMLAH', 'SATUAN', 'KODE'
				, 'NAMA', 'SATUAN', 'JUMLAH'
				, 'JENIS', 'NOMOR', 'TANGGAL', 'JUMLAH'
				
			],
			colModel:[
				{name:'r1',index:'r1', width:90,cellattr: function(rowId, tv, rawObject, cm, rdata) {if (rdata.rspan==0) { return  (' style="display: none"');}else if (rdata.rspan>1) { return  (' rowspan="' + rdata.rspan +'"   style=" vertical-align:top"'); }}},
				{name:'r2',index:'r2', width:200,cellattr: function(rowId, tv, rawObject, cm, rdata) {if (rdata.rspan==0) { return  (' style="display: none"');}else if (rdata.rspan>1) { return  (' rowspan="' + rdata.rspan +'"   style=" vertical-align:top"'); }}},
				{name:'r3',index:'r3', width:35,align:'center',cellattr: function(rowId, tv, rawObject, cm, rdata) {if (rdata.rspan==0) { return  (' style="display: none"');}else if (rdata.rspan>1) { return  (' rowspan="' + rdata.rspan +'"   style=" vertical-align:top"'); }}},
				
				{name:'r4',index:'r4', width:120,cellattr: function(rowId, tv, rawObject, cm, rdata) {if (rdata.rspan==0) { return  (' style="display: none"');}else if (rdata.rspan>1) { return  (' rowspan="' + rdata.rspan +'"   style=" vertical-align:top"'); }}},  
				{name:'r5',index:'r5', width:35,align:'center',cellattr: function(rowId, tv, rawObject, cm, rdata) {if (rdata.rspan==0) { return  (' style="display: none"');}else if (rdata.rspan>1) { return  (' rowspan="' + rdata.rspan +'"   style=" vertical-align:top"'); }}},  
				
				{name:'r6',index:'r6', width:150,cellattr: function(rowId, tv, rawObject, cm, rdata) {if (rdata.rspan==0) { return  (' style="display: none"');}else if (rdata.rspan>1) { return  (' rowspan="' + rdata.rspan +'"   style=" vertical-align:top"'); }}},  
				
				{name:'r7',index:'r7', width:100, search: false,cellattr: function(rowId, tv, rawObject, cm, rdata) {if (rdata.rspan==0) { return  (' style="display: none"');}else if (rdata.rspan>1) { return  (' rowspan="' + rdata.rspan +'"   style=" vertical-align:top"'); }}},
				{name:'r8',index:'r8', width:150, search: false,cellattr: function(rowId, tv, rawObject, cm, rdata) {if (rdata.rspan==0) { return  (' style="display: none"');}else if (rdata.rspan>1) { return  (' rowspan="' + rdata.rspan +'"   style=" vertical-align:top"'); }}},
				{name:'r9',index:'r9', width:50, search: false,cellattr: function(rowId, tv, rawObject, cm, rdata) {if (rdata.rspan==0) { return  (' style="display: none"');}else if (rdata.rspan>1) { return  (' rowspan="' + rdata.rspan +'"   style=" vertical-align:top"'); }}},  
				{name:'r10',index:'r10', width:80, search: false,align:'right',cellattr: function(rowId, tv, rawObject, cm, rdata) {if (rdata.rspan==0) { return  (' style="display: none"');}else if (rdata.rspan>1) { return  (' rowspan="' + rdata.rspan +'"   style=" vertical-align:top"'); }}},
				
				{name:'r11',index:'r11', width:120, search: false,cellattr: function(rowId, tv, rawObject, cm, rdata) {if (rdata.rspan==0) { return  (' style="display: none"');}else if (rdata.rspan>1) { return  (' rowspan="' + rdata.rspan +'"   style=" vertical-align:top"'); }}},
				{name:'r12',index:'r12', width:150, search: false,cellattr: function(rowId, tv, rawObject, cm, rdata) {if (rdata.rspan==0) { return  (' style="display: none"');}else if (rdata.rspan>1) { return  (' rowspan="' + rdata.rspan +'"   style=" vertical-align:top"'); }}},
				{name:'r13',index:'r13', width:100, search: false,cellattr: function(rowId, tv, rawObject, cm, rdata) {if (rdata.rspan==0) { return  (' style="display: none"');}else if (rdata.rspan>1) { return  (' rowspan="' + rdata.rspan +'"   style=" vertical-align:top"'); }}},
				{name:'r14',index:'r14', width:35, search: false,cellattr: function(rowId, tv, rawObject, cm, rdata) {if (rdata.rspan==0) { return  (' style="display: none"');}else if (rdata.rspan>1) { return  (' rowspan="' + rdata.rspan +'"   style=" vertical-align:top"'); }}},
				{name:'r15',index:'r15', width:80, search: false,align:'right',cellattr: function(rowId, tv, rawObject, cm, rdata) {if (rdata.rspan==0) { return  (' style="display: none"');}else if (rdata.rspan>1) { return  (' rowspan="' + rdata.rspan +'"   style=" vertical-align:top"'); }}},
				{name:'r16',index:'r16', width:50, search: false,cellattr: function(rowId, tv, rawObject, cm, rdata) {if (rdata.rspan==0) { return  (' style="display: none"');}else if (rdata.rspan>1) { return  (' rowspan="' + rdata.rspan +'"   style=" vertical-align:top"'); }}},
				
				{name:'r17',index:'r17', width:80, search: false,cellattr: function(rowId, tv, rawObject, cm, rdata) {if (rdata.rspan==0) { return  (' style="display: none"');}else if (rdata.rspan>1) { return  (' rowspan="' + rdata.rspan +'"   style=" vertical-align:top"'); }}},
				{name:'r18',index:'r18', width:50, search: false,cellattr: function(rowId, tv, rawObject, cm, rdata) {if (rdata.rspan==0) { return  (' style="display: none"');}else if (rdata.rspan>1) { return  (' rowspan="' + rdata.rspan +'"   style=" vertical-align:top"'); }}},
				
				{name:'r19',index:'r19', width:120, search: false,cellattr: function(rowId, tv, rawObject, cm, rdata) {if (rdata.rspan==0) { return  (' style="display: none"');}else if (rdata.rspan>1) { return  (' rowspan="' + rdata.rspan +'"   style=" vertical-align:top"'); }}},
				{name:'r20',index:'r20', width:150, search: false,align:'right',cellattr: function(rowId, tv, rawObject, cm, rdata) {if (rdata.rspan==0) { return  (' style="display: none"');}else if (rdata.rspan>1) { return  (' rowspan="' + rdata.rspan +'"   style=" vertical-align:top"'); }}},
				{name:'r21',index:'r21', width:80, search: false,cellattr: function(rowId, tv, rawObject, cm, rdata) {if (rdata.rspan==0) { return  (' style="display: none"');}else if (rdata.rspan>1) { return  (' rowspan="' + rdata.rspan +'"   style=" vertical-align:top"'); }}},
				{name:'r22',index:'r22', width:50, search: false,cellattr: function(rowId, tv, rawObject, cm, rdata) {if (rdata.rspan==0) { return  (' style="display: none"');}else if (rdata.rspan>1) { return  (' rowspan="' + rdata.rspan +'"   style=" vertical-align:top"'); }}},
				
				{name:'r23',index:'r23', width:80, search: false,cellattr: function(rowId, tv, rawObject, cm, rdata) {if (rdata.rspan==0) { return  (' style="display: none"');}else if (rdata.rspan>1) { return  (' rowspan="' + rdata.rspan +'"   style=" vertical-align:top"'); }}},
				{name:'r24',index:'r24', width:80, search: false,align:'right',cellattr: function(rowId, tv, rawObject, cm, rdata) {if (rdata.rspan==0) { return  (' style="display: none"');}else if (rdata.rspan>1) { return  (' rowspan="' + rdata.rspan +'"   style=" vertical-align:top"'); }}},
				
			],
			 iconSet: "fontAwesome",
            iconSet: "fontAwesome",
            idPrefix: "g1_",
            rownumbers: true,
			rowNum:10,
			rowList:[10,20,30],
			pager: '#ptable_<?php echo $methodid ?>',
            sortname: "r1",
            sortorder: "asc",
			shrinkToFit:false,
			autowidth: true,
			height: 250,		
			jsonReader: { repeatitems : false },
			viewrecords : true,
			gridview:true
		}); 
		$("#table_<?php echo $methodid ?>").jqGrid("setColProp", "rn", {hidedlg: false});
		
		$("#table_<?php echo $methodid ?>").jqGrid('setGroupHeaders', 
			{ useColSpanStyle: true, groupHeaders:[
			{startColumnName: 'r1', numberOfColumns: 3, titleText: '<em><center>DOKUMEN PABEAN</center></em>'}
			,{startColumnName: 'r4', numberOfColumns: 2, titleText: '<em><center>DOKUMEN PENGELUARAN</center></em>'}
			,{startColumnName: 'r11', numberOfColumns: 6, titleText: '<em><center>RINCIAN PEMASUKAN</center></em>'}
			,{startColumnName: 'r17', numberOfColumns: 4, titleText: '<em><center>RINCIAN MATERIAL</center></em>'}
			,{startColumnName: 'r21', numberOfColumns: 4, titleText: '<em><center>RINCIAN DOKUMEN ASAL</center></em>'}
		] });
		
		$("#table_<?php echo $methodid ?>").jqGrid('navGrid','#ptable_<?php echo $methodid ?>',{edit:false,add:false,del:false,view:false, search: false});  
		$("#table_<?php echo $methodid ?>").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false, defaultSearch: 'cn', ignoreCase: false});  
		
    });
					
	$( document ).ready(function() {
		$('#form_<?php echo $methodid ?>_date_start').datepicker(
			{
				format: 'yyyy-mm-dd',
				todayBtn: "linked"
			}
		);		
		
		$('#form_<?php echo $methodid ?>_date_end').datepicker(
			{
				format: 'yyyy-mm-dd',
				todayBtn: "linked"
			}
		);						
	});
	
	function search_<?php echo $methodid ?>(){
		date_start = $('#form_<?php echo $methodid ?>_date_start').val();
		date_end = $('#form_<?php echo $methodid ?>_date_end').val();  
	  
		$("#table_<?php echo $methodid ?>").jqGrid('setGridParam', 
			{
				postData: {
					'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>'
					 ,date_start:date_start
					 ,date_end:date_end
				} 
			
			}
		);
        $('#table_<?php echo $methodid ?>').trigger( 'reloadGrid' );
	}
	
	function print_<?php echo $methodid ?>(format){
      date_start = $('#form_<?php echo $methodid ?>_date_start').val();
      date_end = $('#form_<?php echo $methodid ?>_date_end').val();  
      var data_send={
         '<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>'
         ,date_start:date_start
         ,date_end:date_end
         ,format:format
         ,print:1
      }; 
      $.ajax({
         type: "POST",
         url:baseurl + '<?php echo $class_uri ?>/loaddata',
         data: data_send,
         dataType : 'json',
         complete: function(){
         },
         success: function(msg){
            if (!msg.valid){  
               show_error('show','error',msg.des);
               return false;
            }else{
               download_file('<?php echo $methodid ?>',msg.xfile,msg.namafile,'<?php echo $this->security->get_csrf_token_name() ?>','<?php echo $this->security->get_csrf_hash() ?>'); 
               return false; 
            } 
         }
      }) ;   
	}		
</script>