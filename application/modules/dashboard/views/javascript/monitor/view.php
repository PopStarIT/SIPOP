<script type="text/javascript">
//console.log(baseurl+'loader_sipop');  
//alert ('masuk');
//$date_start = date('Y-m-d', strtotime(' -4 day'));
	$(function () {
        "use strict";
		
		$("#table_<?php echo $methodid ?>_prod_transfer_lebih").jqGrid({
			url: baseurl+'loader_sipop',
			mtype : "post",
			postData:{'param':'prod_transfer_lebih',
			'date_start':'<?php echo date("Y-m-d", strtotime(" -30 day")) ?>',
			'date_end':'<?php echo date("Y-m-d") ?>',
			'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>'
			},
			datatype: "json",
			//colNames:['ID','ID ABSEN','NAME','DEPARTEMENT', 'DIVISI', 'SUB DIVISI', 'WORKING TIME', 'YEAR','HOURS','IN','CT','SK','P2'
			//          ,'P3','SD','DS','DL','IP','TM','TP','PC','M'], 
            colNames:['TRANSFER ID','DOK FROM','NO TRANSFER','DATE TRANSFER', 'SUPPLY DATE', 'KODE BARANG', 'QTY REQ', 'QTY SUPP'],	 
			colModel:[
				//{name:'r1',index:'r1', width:80},
				//{name:'r2',index:'r2'},
				//{name:'r3',index:'r3'},
				//{name:'r4',index:'r4'},
				//{name:'r5',index:'r5'},  
				//{name:'r6',index:'r6'}, 
				//{name:'r7',index:'r7'}, 
				//{name:'r8',index:'r8'}
				
				{name:'r1',index:'r1', width:80,hidden: true},
				{name:'r2',index:'r2', width:100},
				{name:'r3',index:'r3', width:250},
				{name:'r4',index:'r4', width:150},
				{name:'r5',index:'r5', width:150},  
				{name:'r6',index:'r6', width:100}, 
				{name:'r7',index:'r7', width:150}, 
				{name:'r8',index:'r8', width:150}
				//{name:'r6',index:'r6', width:80,hidden: true },  
				//{name:'r7',index:'r7', width:200,search: false},  
				//{name:'r8',index:'r8', width:50,align: 'center',search: false},
				//{name:'r11',index:'r11', width:50,align: 'center',search: false},
									
			],
			iconSet: "fontAwesome",
            iconSet: "fontAwesome",
            idPrefix: "g1_",
            rownumbers: true,
			rowNum:10,
			rowList:[10,20,30],
			pager: '#ptable_<?php echo $methodid ?>_prod_transfer_lebih',
            sortname: "r1",
            sortorder: "asc",
			shrinkToFit:false,
			autowidth: true,
			height: 250,		
			jsonReader: { repeatitems : false },
			viewrecords : true,
			gridview:true
	       	           			
		});	
		
	    $("#table_<?php echo $methodid ?>_prod_transfer_lebih").jqGrid("setColProp", "rn", {hidedlg: false});
	    $("#table_<?php echo $methodid ?>_prod_transfer_lebih").jqGrid('navGrid','#ptable_<?php echo $methodid ?>_prod_transfer_lebih',{edit:false,add:false,del:false,view:false,search: false});
        $("#table_<?php echo $methodid ?>_prod_transfer_lebih").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false, defaultSearch: 'cn', ignoreCase: false});
		
		//************ tabel vies beda kode barang transfer ********************
		
		$('#tombol-modal-transfer_lebihxxxx').click(function(event) {
			  // Mencegah perilaku default dari tautan (mengarah ke URL)
                event.preventDefault();
              //alert ('coba');
			   $("#table_<?php echo $methodid ?>_prod_transfer_lebih").trigger('reloadGrid');
			  // $("#table_<?php echo $methodid ?>_prod_transfer_lebih").setGridWidth($('.grid_container_<?php echo $methodid; ?>_prod_transfer_lebih').width() - 20,true).trigger('resize');
                  // Membuka modal yang sesuai dengan data-target
              $($(this).data('target')).modal('show');
			  
        });
		
		$("#table_<?php echo $methodid ?>_beda_barang_supply_transfer").jqGrid({
			url: baseurl+'loader_sipop',
			mtype : "post",
			postData:{'param':'beda_barang_supply_transfer',
			'date_start':'<?php echo date("Y-m-d", strtotime(" -30 day")) ?>',
			'date_end':'<?php echo date("Y-m-d") ?>',
			'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>'
			},
			datatype: "json",
			//colNames:['ID','ID ABSEN','NAME','DEPARTEMENT', 'DIVISI', 'SUB DIVISI', 'WORKING TIME', 'YEAR','HOURS','IN','CT','SK','P2'
			//          ,'P3','SD','DS','DL','IP','TM','TP','PC','M'], 
            colNames:['MOVE ID','DOK FROM','NO TRANSFER','DATE TRANSFER', 'KODE TRANSFER', 'KODE SUPPLY', 'QTY SUPPLY', 'GRN NO','GRN DATE'],	 
			colModel:[
				{name:'r1',index:'r1', width:80},
				{name:'r2',index:'r2', width:100},
				{name:'r3',index:'r3', width:200},
				{name:'r4',index:'r4', width:100},
				{name:'r5',index:'r5', width:150},  
				{name:'r6',index:'r6', width:100}, 
				{name:'r7',index:'r7', width:100}, 
				{name:'r8',index:'r8', width:100},
				{name:'r9',index:'r9', width:150}
				//{name:'r6',index:'r6', width:80,hidden: true },  
				//{name:'r7',index:'r7', width:200,search: false},  
				//{name:'r8',index:'r8', width:50,align: 'center',search: false},
				//{name:'r11',index:'r11', width:50,align: 'center',search: false},
									
			],
			iconSet: "fontAwesome",
            iconSet: "fontAwesome",
            idPrefix: "g1_",
            rownumbers: true,
			rowNum:10,
			rowList:[10,20,30],
			pager: '#ptable_<?php echo $methodid ?>_beda_barang_supply_transfer',
            sortname: "r1",
            sortorder: "asc",
			shrinkToFit:true,
			autowidth: true,
			height: 250,		
			jsonReader: { repeatitems : false },
			viewrecords : true,
			gridview:true
	       	           			
		});	
		
	    $("#table_<?php echo $methodid ?>_beda_barang_supply_transfer").jqGrid("setColProp", "rn", {hidedlg: false});
	    $("#table_<?php echo $methodid ?>_beda_barang_supply_transfer").jqGrid('navGrid','#ptable_<?php echo $methodid ?>_beda_barang_supply_transfer',{edit:false,add:false,del:false,view:false,search: false});
        $("#table_<?php echo $methodid ?>_beda_barang_supply_transfer").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false, defaultSearch: 'cn', ignoreCase: false});
		
	});	
	 function preview_dashboard_<?php echo $methodid ?>(){
		 alert("ok");
	 }
	 
   
      //  var interval = document.getElementById("interval");
      //     document.getElementById("update").onclick = function() {
      //    refreshFunction(1000)
      //  };
	  
	  function preview1_<?php echo $methodid ?>(){
		//alert ("coba");
		 window.open(baseurl+'<?php echo $class_uri ?>/preview_dashboard?methodid='+ <?php echo $methodid ?>,'_BLANK');
	  }
	  
	  function preview_<?php echo $methodid ?>(){
		  //http://192.168.99.133:8083/SIPOP/dashboard/preview_dashboard
		  alert(baseurl + '<?php echo $class_uri ?>/preview_dashboard');
		var data_send={
           '<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>'
		   ,methodid:<?php echo $methodid ?>
          // ,date:date
		  //,karyawan_name:karyawan_name
		  //,departemen:departemen
          //,format:format
          //,print:1
	     };
		   
	   $.ajax({
            type: "POST",
            url:baseurl + '<?php echo $class_uri ?>/preview_dashboard',
            data: data_send,
            dataType : 'json',
            success: function(msg){
                if (!msg.valid){  
                   // show_error('show','error',msg.des);
                     return false;
                  }else{
                 //  download_file('<?php echo $methodid ?>',msg.xfile,msg.namafile,'<?php echo $this->security->get_csrf_token_name() ?>','<?php echo $this->security->get_csrf_hash() ?>'             ); 
                    return false; 
                 } 
             }
           }) ;   
	   }

     function refreshFunction(interval){
		 //page_loading("show",'Refresh <?php echo $page_title ?>','Please Wait...');
		 var refreshId = setInterval(function()
        {
          $('#tab-content').load('add_tab(781044,"Dashboard","dashboard","fa fa-bars");');
        }, interval);
     };

  //setInterval(function(){
  // window.location.reload();
  //}, 5000);
</script>
