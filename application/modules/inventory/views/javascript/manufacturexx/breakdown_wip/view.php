<script type="text/javascript">  
	$(function () {
        "use strict";
        $("#table_<?php echo $methodid ?>").jqGrid({
			url: baseurl+'<?php echo $class_uri ?>/loaddata',
			mtype : "post",
			postData:{'q':'1','date_start':'<?php echo date("Y-m-d", strtotime( date( "Y-m-d", strtotime( date("Y-m-d") ) ) . "-1 month" ) ) ?>','date_end':'<?php echo date("Y-m-d") ?>','<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>'},
			datatype: "json",
			colNames:['PLAN NO'
				, 'PLAN DATE'
				, 'REQUEST NO'
				, 'REQUEST DATE'
				, 'RM ITEM CODE'
				, 'RM ITEM NAME'
				, 'QTY SUPPLY'
				, 'QTY USED'
				, 'QTY LEFT'
			],
			colModel:[
				{name:'r1',index:'r1', width:250},
				{name:'r2',index:'r2', width:120}, 
				{name:'r5',index:'r5', width:250},  
				{name:'r6',index:'r6', width:150},  
				{name:'r7',index:'r7', width:150},  
				{name:'r8',index:'r8', width:450},  
				{name:'r9',index:'r9', width:150,align:'right'},
				{name:'r66',index:'r66', width:150,align:'right'},
				{name:'r67',index:'r67', width:150,align:'right'}
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