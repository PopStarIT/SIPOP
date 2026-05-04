<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Purchase_order_warehouse extends CI_Controller { 

	function __construct()
   { 
		parent::__construct(); 
		
		$this->data_request = $_REQUEST;
		
		$module = $this->router->module;
		$directory = $this->router->directory;
		$class = $this->router->class;
		$method = $this->router->method;
		$directory = trim(str_replace('../modules/'.$module ,'',str_replace('/controllers/','',$directory)),'/');
		
		$this->module = $module;
		if(trim($directory) != ''){
			$this->directory = $directory;
		} else {
			$this->directory = '0';
			$this->directory2 = '';
		}
		$this->class = $class;
		$this->method = $method;
	}
	
	function purchase_order_table_awal() {
		$view = 'view_purchase_order';
		$get_field = $this->ecc_library->get_field($view);
		
		$get_field['r1']['hidden'] = true;
		// $get_field['r13']['hidden'] = true;
		$get_field['r14']['hidden'] = true;
		$get_field['r15']['hidden'] = true;
		$get_field['r16']['hidden'] = true;
		$get_field['r17']['hidden'] = true;
		$get_field['r18']['hidden'] = true;
		$get_field['r19']['hidden'] = true;
		$get_field['r20']['hidden'] = true;
		$get_field['r21']['hidden'] = true;
		$get_field['r22']['hidden'] = true;
		$get_field['r23']['hidden'] = true;
		$get_field['r24']['hidden'] = true;
		$get_field['r25']['hidden'] = true;
		$get_field['r26']['hidden'] = true;
		$get_field['r27']['hidden'] = true;
		$get_field['r28']['hidden'] = true;
		$get_field['r29']['hidden'] = true;
		$get_field['r30']['hidden'] = true;
		
      
		$get_field['r2']['width'] = 200;
      // $get_field['r3']['width'] = 170;
      // $get_field['r4']['width'] = 170;
      // $get_field['r5']['width'] = 170;
      // $get_field['r6']['width'] = 210;
      // $get_field['r9']['width'] = 170;
		
		return $get_field;
	}
	function purchase_order_table() {
		$view = 'view_purchase_order_warehouse';
		//$view = 'view_purchase_order_ecc';
		$get_field = $this->ecc_library->get_field_pop($view);
		
		$get_field['r1']['hidden'] = true;
		$get_field['r2']['hidden'] = true;
		$get_field['r3']['hidden'] = true;
		$get_field['r4']['hidden'] = true;
		
		$get_field['r18']['hidden'] = true;
		$get_field['r19']['hidden'] = true;
		$get_field['r20']['hidden'] = true;
		$get_field['r21']['hidden'] = true;
		$get_field['r22']['hidden'] = true;
		$get_field['r25']['hidden'] = true;  //w
		$get_field['r26']['hidden'] = true;  //L 
		$get_field['r27']['hidden'] = true;  //T
		
		$get_field['r28']['hidden'] = true;
		$get_field['r29']['hidden'] = true;
		$get_field['r30']['hidden'] = true;
		$get_field['r31']['hidden'] = true;
		$get_field['r36']['hidden'] = true;  //status warehouse
		$get_field['r37']['hidden'] = true;
		$get_field['r38']['hidden'] = true;

		$get_field['r5']['title'] = "PO Number";
		$get_field['r6']['title'] = "PO Date";
		$get_field['r13']['title'] = "Sample";
		//$get_field['r30']['title'] = "ETD";
		//$get_field['r30']['title'] = "ETA";
		$get_field['r5']['width'] = 150;
        $get_field['r7']['width'] = 200;		
		$get_field['r8']['width'] = 100;
		$get_field['r9']['width'] = 100;
		$get_field['r10']['width'] = 100;
		$get_field['r11']['width'] = 100;
		$get_field['r12']['width'] = 100;
		$get_field['r16']['width'] = 250;
		$get_field['r23']['width'] = 100;
		$get_field['r24']['width'] = 100;
		//$get_field['r25']['width'] = 60;
		//$get_field['r26']['width'] = 60;
		//$get_field['r27']['width'] = 60;
	
		//$get_field['r27']['width'] = 60;
		//$get_field['r28']['width'] = 60;
		//$get_field['r29']['width'] = 60;
		
		$get_field['r8']['align'] = 'center';
		$get_field['r9']['align'] = 'center';
		$get_field['r10']['align'] = 'center';
		$get_field['r11']['align'] = 'center';
		$get_field['r12']['align'] = 'center';
		$get_field['r13']['align'] = 'center';
		$get_field['r14']['align'] = 'center';
		$get_field['r17']['align'] = 'center';
		$get_field['r23']['align'] = 'center';
		$get_field['r24']['align'] = 'center';
		$get_field['r25']['align'] = 'center';
		$get_field['r26']['align'] = 'center';
		$get_field['r27']['align'] = 'center';
		
		//$get_field['r27']['align'] = 'center';
		//$get_field['r28']['align'] = 'center';
		//$get_field['r29']['align'] = 'center';
     
		return $get_field;
	}
	
	function purchase_order_detail_table() {
		$view = 'view_purchase_order_warehouse_detail';
		$get_field = $this->ecc_library->get_field_pop($view);
		
		$get_field['r1']['hidden'] = true;
		$get_field['r2']['hidden'] = true;
		$get_field['r3']['hidden'] = true;
		$get_field['r4']['hidden'] = true;
		
		$get_field['r13']['hidden'] = true;
		$get_field['r14']['hidden'] = true;
		$get_field['r15']['hidden'] = true;
		$get_field['r16']['hidden'] = true;
		$get_field['r17']['hidden'] = true;
		$get_field['r18']['hidden'] = true;
		$get_field['r19']['hidden'] = true;
		$get_field['r20']['hidden'] = true;
		$get_field['r24']['hidden'] = true;
		$get_field['r26']['hidden'] = true;
		
		$get_field['r9']['align'] = 'center'; //---Unit
		$get_field['r21']['align'] = 'center'; //---colour
		
		
		//$get_field['r1']['sc'] = 'r1';
		//$get_field['r1']['sc'] = 'r1';
		
		$get_field['act']['sc'] = 'act';
		$get_field['act']['title'] = '#';
		$get_field['act']['bypassvalue'] = '';
		$get_field['act']['ctype'] = 'text';
		$get_field['act']['align'] = 'center';
		$get_field['act']['search'] = false;
		$get_field['act']['sortable'] = false;
		$get_field['act']['formatter'] = 'formatOperations';
		$get_field['act']['width'] = 300;
		
		return $get_field;
	}
	
	function proforma_detail_table() {
		//$view = 'view_purchase_sales_performa_detail';
		$view ='view_purchase_sales_performa_detail';
		$get_field = $this->ecc_library->get_field_pop($view);
		
		$get_field['r1']['hidden'] = true;
		$get_field['r2']['hidden'] = true;
		$get_field['r12']['hidden'] = true;
		$get_field['r13']['hidden'] = true;
		//$get_field['r14']['hidden'] = true;
		//$get_field['r15']['hidden'] = true;
		
		$get_field['act']['sc'] = 'act';
		$get_field['act']['title'] = '#';
		$get_field['act']['bypassvalue'] = '';
		$get_field['act']['ctype'] = 'text';
		$get_field['act']['align'] = 'center';
		$get_field['act']['search'] = false;
		$get_field['act']['sortable'] = false;
		$get_field['act']['formatter'] = 'formatOperations2';
		$get_field['act']['width'] = 300;
		
		return $get_field;
	}
	
	function purchase_order_request_table() {
		$view = 'view_purchase_request_item';
		$get_field = $this->ecc_library->get_field($view);
		
		$get_field['r1']['hidden'] = true;
		$get_field['r2']['hidden'] = true;
		$get_field['r18']['hidden'] = true;
		$get_field['r19']['hidden'] = true;
		$get_field['r20']['hidden'] = true;
		$get_field['r21']['hidden'] = true;
		$get_field['r22']['hidden'] = true;
		
		$get_field['r13']['title'] = "Unit";
		
		$get_field['r12']['editable'] = true;
		$get_field['r13']['editable'] = true;
		$get_field['r13']['edittype'] = 'select';
		$get_field['r13']['formatter'] = 'select';
		
		$array_test = array();
		$array_test['value'] = $this->ecc_library->load_uom();
		
		$get_field['r13']['editoptions'] = $array_test;
		
		$get_field['r14']['editable'] = true;
		$get_field['r15']['editable'] = true;
		$get_field['r16']['editable'] = true;
		$get_field['r17']['editable'] = true;
		

		$get_field['act']['sc'] = 'act';
		$get_field['act']['title'] = '#';
		$get_field['act']['bypassvalue'] = '';
		$get_field['act']['ctype'] = 'text';
		$get_field['act']['align'] = 'center';
		$get_field['act']['search'] = false;
		$get_field['act']['sortable'] = false;
		$get_field['act']['formatter'] = 'formatOperations2';
		$get_field['act']['width'] = 300;
		
		return $get_field;
	}
	
	function index() {
		$this->load->model('main');
		$component['loadlayout'] = true;
		$component['view_load'] = 'purchase_order_warehouse/view';
		$component['view_load_form'] = 'purchase_order_warehouse/form';
		$component['load_js'][] = 'purchase_order_warehouse/view';
		$component['load_js'][] = 'purchase_order_warehouse/form';
		
		$component['page_title'] = "Purchase Order Warehouse";
		
		$dashboard_table = array();
		
		$nav_button = array();
		$nav_button[] = array('method_id' => 781131,'title' => 'Add','btn'=>'btn-success', 'icon' => 'fa fa-plus', 'load' => 'purchase_order_warehouse/function_add');
		$nav_button[] = array('method_id' => 781132,'title' => 'Edit', 'btn'=>'btn-warning','icon' => 'fa fa-pencil', 'load' => 'purchase_order_warehouse/function_edit');
		$nav_button[] = array('method_id' => 781133,'title' => 'Delete','btn'=>'btn-danger','icon' => 'fa fa-trash-o', 'load' => 'purchase_order_warehouse/function_delete');
		$nav_button[] = array('method_id' => 781135,'title' => 'Approve', 'btn'=>'btn-info','icon' => 'fa fa-thumbs-up', 'load' => 'purchase_order_warehouse/function_approve');
		$nav_button[] = array('method_id' => 781134,'title' => 'Cancel Approve','btn'=>'btn-danger','icon' => 'fa fa-thumbs-down', 'load' => 'purchase_order_warehouse/function_cancel_approve');
		$nav_button[] = array('method_id' => 781114,'title' => 'Preview','btn'=>'btn-primary','icon' => 'fa fa-search', 'load' => 'purchase_order_warehouse/function_print_warehouse');
		$nav_button[] = array('method_id' => 781118,'title' => 'Download','btn'=>'btn-secondary','icon' => 'fa fa-download', 'load' => 'purchase_order_warehouse/function_download_warehouse');
		
		//$nav_button[] = array('method_id' => 781118,'title' => 'Update ETD/ETA', 'icon' => 'fa fa-pencil', 'load' => 'purchase_order_warehouse/function_edit');
	
		
		$field = $this->purchase_order_table();
		$field_detail = $this->purchase_order_detail_table();
			
		$dashboard_table['nav_button'] = $nav_button;
		$dashboard_table['field'] = $field;
		$dashboard_table['field_detail'] = $field_detail;
		$dashboard_table['field_detail_loaddata'] = 'loaddata_detail';
		$dashboard_table['caption'] = '.:: Purchase Order Warehouse ::.';
				
		$component['dashboard_table'] = $dashboard_table;
		
		$this->authentication->ajaxlayout($component);
	}
	
	function loaddata()
   {
		$this->authentication->plainlayout();
		
		$view = 'view_purchase_order_warehouse';
		//$view = 'view_purchase_order_ecc';
		$field = $this->purchase_order_table();
		
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";
 
		$loaddata = $this->ecc_library->get_field_data_pop($view,$field);
			
		echo $loaddata;
	}

	function approve()
   {
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
				
		$purchase_order_id = isset($_POST['purchase_order_id']) ? $_POST['purchase_order_id'] : false;
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		//var_dump($purchase_order_id);die();
		if(count($_POST) > 0){
			 
			$app_warehouse= false;
			
			if($purchase_order_id){
				$this->rpc_service->setSP("dbo.sp_purchase_order_approve");
				$this->rpc_service->addField('purchase_order_id',$purchase_order_id);
			}
			$result = $this->rpc_service->resultJSON();
			
			$data = array();
			if(isset($result)){
				if(isset($result['valid'])){
					if($result['valid']){
						if(isset($result['data'])){
							//$return['valid'] = $result['valid'];
							//$return['status_code'] = $result['no'];
							//$return['message'] = $result['des'];
							
							$app_warehouse=true;
						}
					} else {
						//$return['status_code'] = $result['no'];
						//$return['message'] = $result['des'];
						$app_warehouse=False;
					}
				}
			}
			
			if ($app_warehouse){
				
			   if($purchase_order_id){
				$this->rpc_service->setSP("dbo.sp_purchase_order_warehouse_approve");
				$this->rpc_service->addField('purchase_order_id',$purchase_order_id);
			   }
			
			   $result2 = $this->rpc_service->resultJSON_pop();
			  // $data = array();
			 if(isset($result2)){
				if(isset($result2['valid'])){
					if($result2['valid']){
						if(isset($result2['data'])){
							$return['valid'] = $result2['valid'];
							$return['status_code'] = $result2['no'];
							$return['message'] = $result2['des'];
						  }
						} else {
						   $return['status_code'] = $result2['no'];
						   $return['message'] = $result2['des'];
						
					}
				}
			  }
			   
			}else{
			 $return['status_code'] = $result['no'];
			 $return['message'] = $result['des'];
		  }
			  
		} else {
			$return['valid'] = false;
			$return['message'] = "Session expired";
		}
		
		
		
		echo json_encode($return);
	}
	
	function cancel_approve()
   {
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
				
		$purchase_order_id = isset($_POST['purchase_order_id']) ? $_POST['purchase_order_id'] : false;
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		//var_dump($purchase_order_id);die();
		$cancel=false;
		if(count($_POST) > 0){
			if($purchase_order_id){
			  $this->rpc_service->setSP("dbo.sp_purchase_order_warehouse_cancel_approve");
			  $this->rpc_service->addField('purchase_order_id',$purchase_order_id);
			  $result = $this->rpc_service->resultJSON_pop();
			  
			  $data = array();
			 if(isset($result)){
				if(isset($result['valid'])){
					if($result['valid']){
						if(isset($result['data'])){
							$return['valid'] = $result['valid'];
							$return['status_code'] = $result['no'];
							$return['message'] = $result['des'];
						}
						$cancel=true;
					} else {
						$return['status_code'] = $result['no'];
						$return['message'] = $result['des'];
						$cancel=false;
					}
				}
			  }
			}
		// ===cek apakah status di shipment sudah dihapus ========
		 if ($cancel){
			// var_dump($result['des']);die();
			if($purchase_order_id){
				$this->rpc_service->setSP("dbo.sp_purchase_order_cancel_approve");
				$this->rpc_service->addField('purchase_order_id',$purchase_order_id);
			}
					
			$result = $this->rpc_service->resultJSON();
			// print_r($result);
			
			$data = array();
			if(isset($result)){
				if(isset($result['valid'])){
					if($result['valid']){
						
						if(isset($result['data'])){
							$return['valid'] = $result['valid'];
							$return['status_code'] = $result['no'];
							$return['message'] = $result['des'];
						}
					} else {
						$return['status_code'] = $result['no'];
						$return['message'] = $result['des'];
					}
				}
			}
		  } else{
			$return['valid'] = false;
			//$return['message'] = "Error, already been used on already been used on Shipment";
			$return['message'] = $result['des'];
		  }
		} else {
			$return['valid'] = false;
			$return['message'] = "Session expired";
		}
		
		echo json_encode($return);
	}
	
	function delete()
   {
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
				
		$purchase_order_id = isset($_POST['purchase_order_id']) ? $_POST['purchase_order_id'] : false;
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			
			if($purchase_order_id){
				$this->rpc_service->setSP("dbo.sp_purchase_order_delete");
				$this->rpc_service->addField('purchase_order_id',$purchase_order_id);
			}
					
			$result = $this->rpc_service->resultJSON();
			// print_r($result);
			
			$data = array();
			if(isset($result)){
				if(isset($result['valid'])){
					if($result['valid']){
						if(isset($result['data'])){
							
							     $this->rpc_service->setSP("dbo.sp_purchase_order_warehouse_delete");
				                 $this->rpc_service->addField('purchase_order_id',$purchase_order_id);
			                     $result = $this->rpc_service->resultJSON_pop();
							
							$return['valid'] = $result['valid'];
							$return['status_code'] = $result['no'];
							$return['message'] = $result['des'];
						}
					} else {
						$return['status_code'] = $result['no'];
						$return['message'] = $result['des'];
					}
				}
			}
			
		} else {
			$return['valid'] = false;
			$return['message'] = "Session expired";
		}
		
		echo json_encode($return);
	}
	
	function post_add_edit() {
		 $this->load->model('main');
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
		
		//var_dump($_POST);die();
		$purchase_order_id = isset($_POST['purchase_order_id']) ? $_POST['purchase_order_id'] : '';
		$purchase_order_no = isset($_POST['purchase_order_no']) ? $_POST['purchase_order_no'] : '';
		$purchase_order_date = isset($_POST['purchase_order_date']) ? $_POST['purchase_order_date'] : '';
		$partner_id = isset($_POST['partner_id']) ? $_POST['partner_id'] : '';
		$currencies_id = isset($_POST['currencies_id']) ? $_POST['currencies_id'] : '';
		$purchase_type_id = isset($_POST['purchase_type_id']) ? $_POST['purchase_type_id'] : '';
		$this_memo = isset($_POST['this_memo']) ? $_POST['this_memo'] : '';
		$purchase_order_type_id = isset($_POST['purchase_order_type_id']) ? $_POST['purchase_order_type_id'] : '';
		$purchase_order_memo = isset($_POST['purchase_order_memo']) ? $_POST['purchase_order_memo'] : '';
		$payment_term = isset($_POST['payment_term']) ? $_POST['payment_term'] : '';
		$ppn = isset($_POST['ppn']) ? $_POST['ppn'] : '';
		
		//---- Untuk Warehouse -----------
		//$item_info = isset($_POST['item_info']) ? $_POST['item_info'] : '';
		//$fabric_code = isset($_POST['fabric_code']) ? $_POST['fabric_code'] : '';
		//$fabric_code_input = isset($_POST['fabric_code_input']) ? $_POST['fabric_code_input'] : '';
		//$fabric_description = isset($_POST['fabric_description']) ? $_POST['fabric_description'] : '';
		//$fabric_content = isset($_POST['fabric_content']) ? $_POST['fabric_content'] :'';
		$fabric_weight = isset($_POST['fabric_weight']) ? $_POST['fabric_weight'] : 0;
		$unit_weight = isset($_POST['unit_weight']) ? $_POST['unit_weight'] : '';
		
		$packing_instructions = isset($_POST['packing_instructions']) ? $_POST['packing_instructions'] : '';
		$other_instructions = isset($_POST['other_instructions']) ? $_POST['other_instructions'] : '';
		$fabric_width = isset($_POST['fabric_width']) ? $_POST['fabric_width'] : 0;
		$unit_width = isset($_POST['unit_width']) ? $_POST['unit_width'] : '';
		
		$shipping_sample = isset($_POST['shipping_sample']) ? $_POST['shipping_sample'] : '';
		$requested_ETD = isset($_POST['requested_ETD']) ? $_POST['requested_ETD'] : '';
		$width = isset($_POST['width']) ? $_POST['width'] : '';
		$long = isset($_POST['long']) ? $_POST['long'] : '';
		$tall = isset($_POST['tall']) ? $_POST['tall'] : '';
		
		$date_etd = isset($_POST['date_etd']) ? $_POST['date_etd'] : '';
		$date_eta = isset($_POST['date_eta']) ? $_POST['date_eta'] : '';
		$date_in = isset($_POST['date_in']) ? $_POST['date_in'] : '';
		$date_etd = $date_etd == '' ? null : $date_etd ;
		$date_eta = $date_eta == '' ? null : $date_eta ;
		$date_in = $date_in == '' ? null : $date_in ;
		
			//var_dump($date_etd .' hasilnya');die();
		
		$user_id = $this->session->userdata('user_id');
		
		$sales_performa_id=isset($_POST['sales_performa_id']) ? $_POST['sales_performa_id'] : '';
		
		if ($sales_performa_id){
		  $return['sales_performa_id'] = $sales_performa_id;
		  //var_dump('adaan');die();
		}else{
		  $return['sales_performa_id'] ='';
		 // var_dump('kosong');die();
		}
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			if($purchase_order_id){
				$this->rpc_service->setSP("dbo.sp_purchase_order_edit");
				$this->rpc_service->addField('purchase_order_id',$purchase_order_id);
			} else {
				$this->rpc_service->setSP("dbo.sp_purchase_order_add");
			}
						
			$this->rpc_service->addField('purchase_order_no',$purchase_order_no);
			$this->rpc_service->addField('purchase_order_date',$purchase_order_date);
			$this->rpc_service->addField('partner_id',$partner_id);
			$this->rpc_service->addField('currencies_id',$currencies_id);
			$this->rpc_service->addField('purchase_type_id',$purchase_type_id);
			$this->rpc_service->addField('this_memo',$this_memo);
			$this->rpc_service->addField('purchase_order_type_id',$purchase_order_type_id);
			$this->rpc_service->addField('purchase_order_memo',$purchase_order_memo);
			$this->rpc_service->addField('payment_term',$payment_term);
			$this->rpc_service->addField('ppn',$ppn);
	
			 // --- input data untuk data sipop ---------
			 
		//	 $data_item_fabric=array(
		//         'item_fabric_code' => $fabric_code_input,
		//         'item_fabric_name'=> $fabric_description,
		//         'item_fabric_content'=> $fabric_content,
		//         'spesifikasi_lain'=>null,
		//         'create_user_id' => $user_id,
		//         'create_date' => date("Y-m-d"),
	    //     );	
			             //   $cek=true;
						//	$ket='';
	                     //   if ($item_info == 'new' ){
		                 //        if ($fabric_code_input ==''){
						//			  if($fabric_code =='-99')
						//			    {
						//			               // $cek=false;
		                 //       	              //  $return['valid'] = false;
		                 //       					//$return['status_code'] = '000';
		                 //       					//$return['message'] ='Empty is Fabric code !';
						//							$fabric_code='';
						//							//$ket='masuk ke code -99';
						//							$return['fabric_id'] ='';
						//							$return['fabric_code'] ='';
		                 //       					$return['purchase_order_id'] =$purchase_order_id;
						//			    }else{
						//				             $cek=false;
		                 //       	                 $return['valid'] = false;
		                 //       					 $return['status_code'] = '000';
		                 //       					 $return['message'] ='Empty is Fabric code !';
						//							// $ket='masuk ke input kosong';
						//			   }
		                 //         } else if ($fabric_code =='' ){
						//			    // $ket='masuk ke code null';
						//				$fabric_code='';
						//				$return['fabric_id'] ='';
						//				$return['fabric_code'] ='';
						//		        $return['purchase_order_id'] =$purchase_order_id;
						//		  }else{
						//			   //$ket='masuk ke code insert';
		                 //            $hasil= $this->main->insert_pop2("dbo.dt_mst_item_fabric",$data_item_fabric);
		                 //          
		                 //            if ($hasil['pesan']){
		                 //                $return['fabric_id'] =$hasil['id_data'];
		                 //                $return['fabric_code'] =$fabric_code_input;
						//				 $fabric_code=$hasil['id_data'];
		                 //               }
		                 //                 
		                 //        }
						//		// var_dump($ket);die();
	                     //  }else{
						//	   if($fabric_code ==''){
						//		   // $ket='masuk ke code get lagi';
						//			 $fabric_code='';
						//			 $return['fabric_id'] ='';
	                     // 	         $return['fabric_code'] ='';
						//	   }else{
						//	       $hasil=$this->main->getData_pop("dbo.dt_mst_item_fabric",null,array("item_fabric_id"=>$fabric_code));
	                     // 	
	                     // 	       $return['fabric_id'] = $hasil[0]['item_fabric_id'];
	                     // 	       $return['fabric_code'] = $hasil[0]['item_fabric_code'];
						//	   }
	                     // }
						  
						  
                            // var_dump($ket);die();
                                   $result = $this->rpc_service->resultJSON();	   
									$data = array();
	            		        if(isset($result)){
	          			         if(isset($result['valid'])){
									 
	          				      if($result['valid']){
	          					   if(isset($result['data'])){
	          						   $data_result = json_decode($result['data'],true);
	          						        						 
			                          //====== Simpan data purchase warehouse ==========
									    $tanggal=date("Y-m-d H:i:s.u");
																			 
			                             $data_po_warehouse =array(
	                                	    'purchase_order_id'=>$data_result['purchase_order_id'],
											'purchase_type_id'=>$purchase_type_id,
	                                	    'item_fabric_id'=>null,
	                                	    'fabric_weight'=>$fabric_weight,
	                                	    'unit_weight'=>$unit_weight,
	                                	    'fabric_width'=>$fabric_width,
	                                	    'unit_width'=>$unit_width,
	                                	    'shrinkage_w'=>$width,
	                                	    'shrinkage_l'=>$long,
	                                	    'shrinkage_t'=>$tall,
	                                	    'packing_instructions'=>$packing_instructions,
	                                	    'shipping_sample'=>$shipping_sample,
	                                	    'requested_etd'=>$requested_ETD,
	                                	    'other_instructions'=>$other_instructions,
	                                	    'create_user_id'=> $user_id,
	                                	    'create_date'=> $tanggal,
											'date_etd'=>$date_etd,
											'date_eta'=>$date_eta,
											'date_in'=>$date_in
	                                	);
										
										if($purchase_order_id){
											 $data_po_warehouse_edit =array(
	                                	        'purchase_order_id'=>$data_result['purchase_order_id'],
											    'purchase_type_id'=>$purchase_type_id,
	                                	        'item_fabric_id'=>null,
	                                	        'fabric_weight'=>$fabric_weight,
	                                	        'unit_weight'=>$unit_weight,
	                                	        'fabric_width'=>$fabric_width,
	                                	        'unit_width'=>$unit_width,
	                                	        'shrinkage_w'=>$width,
	                                	        'shrinkage_l'=>$long,
	                                	        'shrinkage_t'=>$tall,
	                                	        'packing_instructions'=>$packing_instructions,
	                                	        'shipping_sample'=>$shipping_sample,
	                                	        'requested_etd'=>$requested_ETD,
	                                	        'other_instructions'=>$other_instructions,
	                                	        'edit_user_id'=> $user_id,
	                                	        'edit_date'=> $tanggal,
												'date_etd'=>$date_etd,
											    'date_eta'=>$date_eta,
											    'date_in'=>$date_in
	                                	    );
											$where=array('purchase_order_id'=>$purchase_order_id);
											$this->main->update_pop('dbo.dt_purchase_order_warehouse',$data_po_warehouse_edit,$where);
											 $return['purchase_order_warehouse_id']=$purchase_order_id;
										}else {
										  $insert= $this->main->insert_pop2("dbo.dt_purchase_order_warehouse",$data_po_warehouse);
										  if ($insert['pesan']){
											   $return['purchase_order_warehouse_id']=$insert['id_data'];
										   }
										}
										  
										  $return['valid'] = $result['valid'];
	          						      $return['status_code'] = $result['no'];
	          						      $return['message'] = $result['des'];
	          						      $return['purchase_order_id'] = $data_result['purchase_order_id'];
										  
	          					        }
	          				          } else {
	          					        $return['status_code'] = $result['no'];
	          					        $return['message'] = $result['des'];
	          				           }
	          			             }
	          		             }	   
							 							 
		} else {
			$return['valid'] = false;
			$return['message'] = "Session expired";
		}
		
		echo json_encode($return);
	}
		
	function post_add_edit_11112024() {
		 $this->load->model('main');
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
		
		//var_dump($_POST);die();
		$purchase_order_id = isset($_POST['purchase_order_id']) ? $_POST['purchase_order_id'] : '';
		$purchase_order_no = isset($_POST['purchase_order_no']) ? $_POST['purchase_order_no'] : '';
		$purchase_order_date = isset($_POST['purchase_order_date']) ? $_POST['purchase_order_date'] : '';
		$partner_id = isset($_POST['partner_id']) ? $_POST['partner_id'] : '';
		$currencies_id = isset($_POST['currencies_id']) ? $_POST['currencies_id'] : '';
		$purchase_type_id = isset($_POST['purchase_type_id']) ? $_POST['purchase_type_id'] : '';
		$this_memo = isset($_POST['this_memo']) ? $_POST['this_memo'] : '';
		$purchase_order_type_id = isset($_POST['purchase_order_type_id']) ? $_POST['purchase_order_type_id'] : '';
		$purchase_order_memo = isset($_POST['purchase_order_memo']) ? $_POST['purchase_order_memo'] : '';
		$payment_term = isset($_POST['payment_term']) ? $_POST['payment_term'] : '';
		$ppn = isset($_POST['ppn']) ? $_POST['ppn'] : '';
		
		//---- Untuk Warehouse -----------
		//$item_info = isset($_POST['item_info']) ? $_POST['item_info'] : '';
		//$fabric_code = isset($_POST['fabric_code']) ? $_POST['fabric_code'] : '';
		//$fabric_code_input = isset($_POST['fabric_code_input']) ? $_POST['fabric_code_input'] : '';
		//$fabric_description = isset($_POST['fabric_description']) ? $_POST['fabric_description'] : '';
		//$fabric_content = isset($_POST['fabric_content']) ? $_POST['fabric_content'] :'';
		$fabric_weight = isset($_POST['fabric_weight']) ? $_POST['fabric_weight'] : 0;
		$unit_weight = isset($_POST['unit_weight']) ? $_POST['unit_weight'] : '';
		
		$packing_instructions = isset($_POST['packing_instructions']) ? $_POST['packing_instructions'] : '';
		$other_instructions = isset($_POST['other_instructions']) ? $_POST['other_instructions'] : '';
		$fabric_width = isset($_POST['fabric_width']) ? $_POST['fabric_width'] : 0;
		$unit_width = isset($_POST['unit_width']) ? $_POST['unit_width'] : '';
		
		$shipping_sample = isset($_POST['shipping_sample']) ? $_POST['shipping_sample'] : '';
		$requested_ETD = isset($_POST['requested_ETD']) ? $_POST['requested_ETD'] : '';
		$width = isset($_POST['width']) ? $_POST['width'] : '';
		$long = isset($_POST['long']) ? $_POST['long'] : '';
		$tall = isset($_POST['tall']) ? $_POST['tall'] : '';
		
		$user_id = $this->session->userdata('user_id');
		
		$sales_performa_id=isset($_POST['sales_performa_id']) ? $_POST['sales_performa_id'] : '';
		
		if ($sales_performa_id){
		  $return['sales_performa_id'] = $sales_performa_id;
		  //var_dump('adaan');die();
		}else{
		  $return['sales_performa_id'] ='';
		 // var_dump('kosong');die();
		}
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			if($purchase_order_id){
				$this->rpc_service->setSP("dbo.sp_purchase_order_edit");
				$this->rpc_service->addField('purchase_order_id',$purchase_order_id);
			} else {
				$this->rpc_service->setSP("dbo.sp_purchase_order_add");
			}
						
			$this->rpc_service->addField('purchase_order_no',$purchase_order_no);
			$this->rpc_service->addField('purchase_order_date',$purchase_order_date);
			$this->rpc_service->addField('partner_id',$partner_id);
			$this->rpc_service->addField('currencies_id',$currencies_id);
			$this->rpc_service->addField('purchase_type_id',$purchase_type_id);
			$this->rpc_service->addField('this_memo',$this_memo);
			$this->rpc_service->addField('purchase_order_type_id',$purchase_order_type_id);
			$this->rpc_service->addField('purchase_order_memo',$purchase_order_memo);
			$this->rpc_service->addField('payment_term',$payment_term);
			$this->rpc_service->addField('ppn',$ppn);
	
			 // --- input data untuk data sipop ---------
			 
			 $data_item_fabric=array(
		         'item_fabric_code' => $fabric_code_input,
		         'item_fabric_name'=> $fabric_description,
		         'item_fabric_content'=> $fabric_content,
		         'spesifikasi_lain'=>null,
		         'create_user_id' => $user_id,
		         'create_date' => date("Y-m-d"),
	         );	
			                $cek=true;
							$ket='';
	                        if ($item_info == 'new' ){
		                         if ($fabric_code_input ==''){
									  if($fabric_code =='-99')
									    {
									               // $cek=false;
		                        	              //  $return['valid'] = false;
		                        					//$return['status_code'] = '000';
		                        					//$return['message'] ='Empty is Fabric code !';
													$fabric_code='';
													//$ket='masuk ke code -99';
													$return['fabric_id'] ='';
													$return['fabric_code'] ='';
		                        					$return['purchase_order_id'] =$purchase_order_id;
									    }else{
										             $cek=false;
		                        	                 $return['valid'] = false;
		                        					 $return['status_code'] = '000';
		                        					 $return['message'] ='Empty is Fabric code !';
													// $ket='masuk ke input kosong';
									   }
		                          } else if ($fabric_code =='' ){
									    // $ket='masuk ke code null';
										$fabric_code='';
										$return['fabric_id'] ='';
										$return['fabric_code'] ='';
								        $return['purchase_order_id'] =$purchase_order_id;
								  }else{
									   //$ket='masuk ke code insert';
		                             $hasil= $this->main->insert_pop2("dbo.dt_mst_item_fabric",$data_item_fabric);
		                           
		                             if ($hasil['pesan']){
		                                 $return['fabric_id'] =$hasil['id_data'];
		                                 $return['fabric_code'] =$fabric_code_input;
										 $fabric_code=$hasil['id_data'];
		                                }
		                                  
		                         }
								// var_dump($ket);die();
	                       }else{
							   if($fabric_code ==''){
								   // $ket='masuk ke code get lagi';
									 $fabric_code='';
									 $return['fabric_id'] ='';
	                      	         $return['fabric_code'] ='';
							   }else{
							       $hasil=$this->main->getData_pop("dbo.dt_mst_item_fabric",null,array("item_fabric_id"=>$fabric_code));
	                      	
	                      	       $return['fabric_id'] = $hasil[0]['item_fabric_id'];
	                      	       $return['fabric_code'] = $hasil[0]['item_fabric_code'];
							   }
	                      }
						  
						  
                            // var_dump($ket);die();
                               if ($cek){
		                      	 	$result = $this->rpc_service->resultJSON();	   
									$data = array();
	            		        if(isset($result)){
	          			         if(isset($result['valid'])){
									 
	          				      if($result['valid']){
	          					   if(isset($result['data'])){
	          						   $data_result = json_decode($result['data'],true);
	          						
	          						 
			                          //====== Simpan data purchase warehouse ==========
									    $tanggal=date("Y-m-d H:i:s.u");
									 
			                             $data_po_warehouse =array(
	                                	    'purchase_order_id'=>$data_result['purchase_order_id'],
											'purchase_type_id'=>$purchase_type_id,
	                                	    'item_fabric_id'=>$fabric_code,
	                                	    'fabric_weight'=>$fabric_weight,
	                                	    'unit_weight'=>$unit_weight,
	                                	    'fabric_width'=>$fabric_width,
	                                	    'unit_width'=>$unit_width,
	                                	    'shrinkage_w'=>$width,
	                                	    'shrinkage_l'=>$long,
	                                	    'shrinkage_t'=>$tall,
	                                	    'packing_instructions'=>$packing_instructions,
	                                	    'shipping_sample'=>$shipping_sample,
	                                	    'requested_etd'=>$requested_ETD,
	                                	    'other_instructions'=>$other_instructions,
	                                	    'create_user_id'=> $user_id,
	                                	    'create_date'=> $tanggal
	                                	);
										
										if($purchase_order_id){
											 $data_po_warehouse_edit =array(
	                                	        'purchase_order_id'=>$data_result['purchase_order_id'],
											    'purchase_type_id'=>$purchase_type_id,
	                                	        'item_fabric_id'=>$fabric_code,
	                                	        'fabric_weight'=>$fabric_weight,
	                                	        'unit_weight'=>$unit_weight,
	                                	        'fabric_width'=>$fabric_width,
	                                	        'unit_width'=>$unit_width,
	                                	        'shrinkage_w'=>$width,
	                                	        'shrinkage_l'=>$long,
	                                	        'shrinkage_t'=>$tall,
	                                	        'packing_instructions'=>$packing_instructions,
	                                	        'shipping_sample'=>$shipping_sample,
	                                	        'requested_etd'=>$requested_ETD,
	                                	        'other_instructions'=>$other_instructions,
	                                	        'edit_user_id'=> $user_id,
	                                	        'edit_date'=> $tanggal
	                                	    );
											$where=array('purchase_order_id'=>$purchase_order_id);
											$this->main->update_pop('dbo.dt_purchase_order_warehouse',$data_po_warehouse_edit,$where);
											 $return['purchase_order_warehouse_id']=$purchase_order_id;
										}else {
										  $insert= $this->main->insert_pop2("dbo.dt_purchase_order_warehouse",$data_po_warehouse);
										  if ($insert['pesan']){
											   $return['purchase_order_warehouse_id']=$insert['id_data'];
										  }
										}
										  
										  $return['valid'] = $result['valid'];
	          						      $return['status_code'] = $result['no'];
	          						      $return['message'] = $result['des'];
	          						      $return['purchase_order_id'] = $data_result['purchase_order_id'];
										  
	          					        }
	          				          } else {
	          					        $return['status_code'] = $result['no'];
	          					        $return['message'] = $result['des'];
	          				           }
	          			             }
	          		             }	   
							  }else{
									  $return['valid'] = false;
		                        	  $return['status_code'] = '000';
		                        	  $return['message'] ='Empty is Fabric code !';
		                        	  //$return['purchase_order_id'] =$purchase_order_id;
								}									 
		} else {
			$return['valid'] = false;
			$return['message'] = "Session expired";
		}
		
		echo json_encode($return);
	}
	
	
	function loaddata_detail() {
		$this->authentication->plainlayout();
		
		$purchase_order_id = isset($_REQUEST['purchase_order_id']) ? is_numeric($_REQUEST['purchase_order_id']) ? $_REQUEST['purchase_order_id']  : -1 : -1;
		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;
		
		$view = 'view_purchase_order_warehouse_detail';
		$field = $this->purchase_order_detail_table();
		
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";
		
		$extra_param = array();
		$extra_param['where']['0']['field'] = 'r2';
		$extra_param['where']['0']['data'] = $purchase_order_id;
		$extra_param['methodid'] = $methodid;
		
		$loaddata = $this->ecc_library->get_field_data_pop($view,$field,$extra_param);
			
		echo $loaddata;
	}
	
	function loaddata_proforma() {
		$this->authentication->plainlayout();
		
		$sales_proforma_id = isset($_REQUEST['sales_performa_id']) ? is_numeric($_REQUEST['sales_performa_id']) ? $_REQUEST['sales_performa_id']  : -1 : -1;
		//$sales_proforma_id = isset($_REQUEST['performa_id']) ? is_numeric($_REQUEST['performa_id']) ? $_REQUEST['performa_id']  : -1 : -1;
		$purchase_order_id = isset($_REQUEST['purchase_order_id2']) ? is_numeric($_REQUEST['purchase_order_id2']) ? $_REQUEST['purchase_order_id2']  : -1 : -1;
		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;
		
		//$view = 'view_purchase_sales_performa_detail';
		$field = $this->proforma_detail_table();
		
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";
		
		$extra_param = array();
		//var_dump($purchase_order_id);
		if($purchase_order_id){
			$view = 'view_purchase_sales_performa_detail';
			$extra_param['where']['0']['field'] = 'r2';
		    $extra_param['where']['0']['data'] = $sales_proforma_id;
			//var_dump("Ada");
		} else {
			//var_dump("Nol");
			
			
			$view = 'view_purchase_sales_performa_detail_item';
			$extra_param['where']['0']['field'] = 'r11';
			$extra_param['where']['0']['data'] = $purchase_order_id;
		}
		$extra_param['methodid'] = $methodid;
		//$extra_param['where']['0']['field'] = 'r2';
		//$extra_param['where']['0']['data'] = $sales_proforma_id;
		//$extra_param['methodid'] = $methodid;
		
		$extra_param['field']['rh_id'] = $purchase_order_id;
		
		
		$loaddata = $this->ecc_library->get_field_data_pop($view,$field,$extra_param);
		//var_dump($loaddata);	
		echo $loaddata;
	}
	
	function post_add_edit_detail() {
		 $this->load->model('main');
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
		
		$purchase_order_id = isset($_POST['purchase_order_id']) ? $_POST['purchase_order_id'] : 0;
		$purchase_order_detail_id = isset($_POST['purchase_order_detail_id']) ? $_POST['purchase_order_detail_id'] : '';
		$item_id = isset($_POST['item_id']) ? $_POST['item_id'] : '';
		$quantity_ordered = isset($_POST['quantity_ordered']) ? $_POST['quantity_ordered'] : '';
		$order_delivery_date = isset($_POST['order_delivery_date']) ? $_POST['order_delivery_date'] : '';
		$purchase_order_detail_memo = isset($_POST['purchase_order_detail_memo']) ? $_POST['purchase_order_detail_memo'] : '';
		$uom_id = isset($_POST['uom_id']) ? $_POST['uom_id'] : '';
		$conversion = isset($_POST['conversion']) ? $_POST['conversion'] : '';
		$unit_price = isset($_POST['unit_price']) ? $_POST['unit_price'] : '';
		$trans_type = isset($_POST['trans_type']) ? $_POST['trans_type'] : 1;
		$purchase_request_detail_id = isset($_POST['purchase_request_detail_id']) ? $_POST['purchase_request_detail_id'] : '';
		$size = isset($_POST['size']) ? $_POST['size'] : '';
		$style = isset($_POST['style']) ? $_POST['style'] : '';
		$colour = isset($_POST['colour']) ? $_POST['colour'] : '';
		$po_customer = isset($_POST['po_customer']) ? $_POST['po_customer'] : '';
		
	   // $fabric_code_header_id=isset($_POST['fabric_code_header_id']) ? $_POST['fabric_code_header_id'] : 0;
		//$fabric_code_header=isset($_POST['fabric_code_header']) ? $_POST['fabric_code_header'] : 0;
		$purchase_order_warehouse_id=isset($_POST['purchase_order_warehouse_id']) ? $_POST['purchase_order_warehouse_id'] : 0;
		
		$fabric_code_detail=isset($_POST['fabric_code_detail']) ? $_POST['fabric_code_detail'] : '';
		$purchase_order_warehouse_detail_id = isset($_POST['purchase_order_warehouse_detail_id']) ? $_POST['purchase_order_warehouse_detail_id'] : '';
		$fabric_code_input_detail = isset($_POST['fabric_code_input_detail']) ? $_POST['fabric_code_input_detail'] : '';
		$fabric_description_detail = isset($_POST['fabric_description_detail']) ? $_POST['fabric_description_detail'] : '';
		$fabric_content_detail = isset($_POST['fabric_content_detail']) ? $_POST['fabric_content_detail'] : '';
				
		$user_id = $this->session->userdata('user_id');
		//var_dump($item_id);die();
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		 $cek=false;
		 
		//===cek apakah fabric codenya kosong ==
		 if ($fabric_code_detail == ''){
			 $fabric_code_detail = '-99';
		  }
		  
		   //======== Pengecekan code fabric =========
			 if ($fabric_code_detail == '-99'){
				  if ($fabric_code_input_detail !=''){
					   	$cek=true;
					 } else{
					   $cek=false;
					 }
			 }else{
				 $cek=true;
			}
					
		if(count($_POST) > 0){
		  if ($cek){ 
			if($purchase_order_detail_id){
				$this->rpc_service->setSP("dbo.sp_purchase_order_detail_edit");
				$this->rpc_service->addField('purchase_order_detail_id',$purchase_order_detail_id);
			} else {
				$this->rpc_service->setSP("dbo.sp_purchase_order_detail_add");
			}
			
			$this->rpc_service->addField('purchase_order_id',$purchase_order_id);
			$this->rpc_service->addField('item_id',$item_id);
			$this->rpc_service->addField('quantity_ordered',$quantity_ordered);
			$this->rpc_service->addField('uom_id',$uom_id);
			$this->rpc_service->addField('conversion',$conversion);
			$this->rpc_service->addField('unit_price',$unit_price);
			$this->rpc_service->addField('order_delivery_date',$order_delivery_date);
			$this->rpc_service->addField('purchase_order_detail_memo',$purchase_order_detail_memo);
			$this->rpc_service->addField('purchase_request_detail_id',$purchase_request_detail_id);
			$this->rpc_service->addField('trans_type',$trans_type);
			$this->rpc_service->addField('size',$size);
			$this->rpc_service->addField('style',$style);
			$this->rpc_service->addField('colour',$colour);
			$this->rpc_service->addField('po_customer',$po_customer);
			
			$result = $this->rpc_service->resultJSON();
			
			$data = array();
			if(isset($result)){
				if(isset($result['valid'])){
					if($result['valid']){
						if(isset($result['data'])){
							$data = json_decode($result['data'],TRUE);
							
							$return['valid'] = $result['valid'];
							$return['status_code'] = $result['no'];
							$return['message'] = $result['des'];
	
	                    //   $return['valid'] = 'valid';
						//	$return['status_code'] = 'no';
						//	$return['message'] ='OK Detail';
							 // ----Input Detail data warehouse ----------
							 
							 $purchase_order_detail_id=$data['purchase_order_detail_id'];
							//$purchase_order_detail_id='2';
						
							//   if ($fabric_code_detail == ''){
							//	    $fabric_code_detail = '-99';
							//      }
								
						//	   if ($fabric_code_detail == '-99'){
								   if ($fabric_code_input_detail !=''){
									    $item_header=array(
		                                    'item_fabric_code' => $fabric_code_input_detail,
		                                    'item_fabric_name'=> $fabric_description_detail,
		                                    'item_fabric_content'=> $fabric_content_detail,
		                                    'spesifikasi_lain'=>null,
		                                    'create_user_id' => $user_id,
		                                    'create_date' => date("Y-m-d"),
	                                       );	
                                         $hasil= $this->main->insert_pop2("dbo.dt_mst_item_fabric",$item_header);
									   
		                                 if ($hasil['pesan']){
		                                       $fabric_code_detail=$hasil['id_data'];
		                                       $return['fabric_code'] =$fabric_code_input_detail;
									   	  }
									 }
						//			 else{
						//				  $fabric_code_detail=null;
						//			 }
						//			
						//         }
							   
							   	  
							 $data_mst_item=array(
							   'item_header_id'=>$fabric_code_detail,
							   'item_id'=>$item_id
							 );
							 
							  $data_PO_detail=array(
							   //'purchase_order_warehouse_detail'=>$fabric_code_header_id,
							   'purchase_order_warehouse_id'=>$purchase_order_warehouse_id,
							   'purchase_order_id'=>$purchase_order_id,
							   'purchase_order_detail_id'=>$purchase_order_detail_id,
							   'item_id'=>$item_id,
							   'note'=>'',
							   'item_fabric_id' =>$fabric_code_detail
							 );
							 
							 	if($purchase_order_warehouse_detail_id){
								    	$where=array('purchase_order_warehouse_detail'=>$purchase_order_warehouse_detail_id);
										$this->main->update_pop('dbo.dt_purchase_order_warehouse_detail',$data_PO_detail,$where);
								}else{ 
							        $in_item_central= $this->main->insert_pop2("dbo.dt_mst_item_central",$data_mst_item);
							        if($in_item_central['pesan']){
							       	  $in_detail= $this->main->insert_pop2("dbo.dt_purchase_order_warehouse_detail",$data_PO_detail);
							        }
							    }
						}
					} else {
						$return['status_code'] = $result['no'];
						$return['message'] = $result['des'];
					}
				}else{
					$return['valid'] = $result['valid'];
					$return['status_code'] = $result['no'];
					$return['message'] = $result['des'];
				}
			}
			
          } else{
			  $return['valid'] = false;
			  $return['message'] = "Fabric code empty!";
          } 
		 
		} else {
			$return['valid'] = false;
			$return['message'] = "Session expired";
		}
				
		echo json_encode($return);
	}
	
	function delete_detail() {
		 $this->load->model('main');
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		$purchase_order_detail_id = isset($_POST['purchase_order_detail_id']) ? $_POST['purchase_order_detail_id'] : '';
		$user_id = $this->session->userdata('user_id');
		
		
		if(count($_POST) > 0){
			
			if($purchase_order_detail_id){
				$this->rpc_service->setSP("dbo.sp_purchase_order_detail_delete");
				$this->rpc_service->addField('purchase_order_detail_id',$purchase_order_detail_id);
			}
					
			$result = $this->rpc_service->resultJSON();
			
			if($purchase_order_detail_id){
				$del_detail=array('purchase_order_detail_id'=>$purchase_order_detail_id);
			    $this->main->delete_pop('dbo.dt_purchase_order_warehouse_detail',$del_detail,$note=null);
			}
			$data = array();
			if(isset($result)){
				if(isset($result['valid'])){
					if($result['valid']){
						if(isset($result['data'])){
							$return['valid'] = $result['valid'];
							$return['status_code'] = $result['no'];
							$return['message'] = $result['des'];
						}
					} else {
						$return['status_code'] = $result['no'];
						$return['message'] = $result['des'];
					}
				}
			}
			
		} else {
			$return['valid'] = false;
			$return['message'] = "Session expired";
		}

		echo json_encode($return);
		
	}
	
	function loaddata_request_item() {
		$this->authentication->plainlayout();
		
		$purchase_order_detail_id = isset($_POST['purchase_order_detail_id']) ? $_POST['purchase_order_detail_id'] : '';
		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;
		
		$field = $this->purchase_order_request_table();
		
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";
		
		$extra_param = array();
		if($purchase_order_detail_id){
			$view = 'view_purchase_order_detail_request';
			$extra_param['where']['0']['field'] = 'r22';
			$extra_param['where']['0']['data'] = $purchase_order_detail_id;
		} else {
			$view = 'view_purchase_request_item';
		}
		
		$extra_param['field']['rh_id'] = $purchase_order_detail_id;
		
		
		$extra_param['methodid'] = $methodid;
		
		$loaddata = $this->ecc_library->get_field_data($view,$field,$extra_param);
			
		echo $loaddata;
	}
	
	function loaddata_request_item2() {
		$this->authentication->plainlayout();
		
		$field = array();
		$field[] = array('field' => 'purchase_request_detail_id', 'title' => 'purchase_request_detail_id');
		$field[] = array('field' => 'purchase_request_id', 'title' => 'purchase_request_id');
		$field[] = array('field' => 'purchase_request_date', 'title' => 'purchase_request_date');
		$field[] = array('field' => 'purchase_request_no', 'title' => 'purchase_request_no');
		$field[] = array('field' => 'item', 'title' => 'item');
		$field[] = array('field' => 'quantity_requested', 'title' => 'quantity_requested');
		$field[] = array('field' => 'quantity_ordered', 'title' => 'quantity_ordered');
		$field[] = array('field' => 'unit', 'title' => 'TOTAL');
		$field[] = array('field' => 'purchase_request_status_id', 'title' => 'purchase_request_status_id');
		$field[] = array('field' => 'item_id', 'title' => 'item_id');
		$field[] = array('field' => 'request_delivery_date', 'title' => 'request_delivery_date');
		$field[] = array('field' => 'outstanding_qty', 'title' => 'outstanding_qty');
		$field[] = array('field' => 'uom_id', 'title' => 'uom_id');
		$field[] = array('field' => 'memo', 'title' => 'memo');
		$field[] = array('field' => 'request_delivery_date', 'title' => 'request_delivery_date');
	
		$new_purchase_order = isset($_POST['new_purchase_order']) ? $_POST['new_purchase_order'] : 0;
		$purchase_order_id = isset($_POST['purchase_order_id']) ? $_POST['purchase_order_id'] : 0;
		$lock_data = isset($_POST['lock_data']) ? $_POST['lock_data'] : 0;
		
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";
		$loaddata_table = array();
		
		if($lock_data == 0){
			$view = 'dbo.view_purchase_request_item';
			$loaddata = $this->ecc_library->loaddata($view,$field);
				
			foreach($loaddata['data'] as $key => $value){
				$this_order[$key] = 0;
				
				$new_row = array();
				$new_row[] = $value[0];
				$new_row[] = $value[3];
				$new_row[] = $value[2];
				$new_row[] = $value[4];
				$new_row[] = $this->mainconfig->get_decimal_format($value[5],12);
				$new_row[] = $this->mainconfig->get_decimal_format($value[6],12);
				$new_row[] = $value[7];
				$new_row[] = "<input class=\"form-control\" name=\"quantity_ordered[". $value[0] ."]\" type=\"text\" placeholder=\"This Order\" value=\"". $this_order[$key] ."\" />";
				$select = "<select class=\"form-control search_uom\" name=\"uom_id[". $value[0] ."]\" style=\"width:150px\">";
				$select .= "<option value=\"".$value[12]."\" selected=\"selectted\">". $value[7]."</option>";
				$select .= "</select>";
				
				$new_row[] = $select;
				$new_row[] = "<input class=\"form-control\" name=\"conversion[". $value[0] ."]\" type=\"text\" placeholder=\"Conversion\" value=\"1\" />";
				$new_row[] = "
				<input name=\"item_id[". $value[0] ."]\" type=\"hidden\" value=\"". $value[9] ."\" /><input class=\"form-control\" name=\"unit_price[". $value[0] ."]\" type=\"text\" placeholder=\"Unit Price\" value=\"1\" />";
				$new_row[] = "";
				
				
				$loaddata_table[$value[0]] = $new_row;
			}
		}
		
		if($new_purchase_order == '0')
      {
			$view = 'dbo.view_purchase_order_detail_request';
			
			$field = array();
			$field[] = array('field' => 'purchase_request_detail_id', 'title' => 'purchase_request_detail_id');
			$field[] = array('field' => 'purchase_request_id', 'title' => 'purchase_request_id');
			$field[] = array('field' => 'purchase_request_date', 'title' => 'purchase_request_date');
			$field[] = array('field' => 'purchase_request_no', 'title' => 'purchase_request_no');
			$field[] = array('field' => 'item', 'title' => 'item');
			$field[] = array('field' => 'quantity_requested', 'title' => 'quantity_requested');
			$field[] = array('field' => 'quantity_ordered', 'title' => 'quantity_ordered');
			$field[] = array('field' => 'unit', 'title' => 'TOTAL');
			$field[] = array('field' => 'purchase_request_status_id', 'title' => 'purchase_request_status_id');
			$field[] = array('field' => 'item_id', 'title' => 'item_id');
			$field[] = array('field' => 'request_delivery_date', 'title' => 'request_delivery_date');
			$field[] = array('field' => 'outstanding_qty', 'title' => 'outstanding_qty');
			$field[] = array('field' => 'uom_id', 'title' => 'uom_id');
			$field[] = array('field' => 'request_delivery_date', 'title' => 'request_delivery_date');
			$field[] = array('field' => 'conversion', 'title' => 'conversion');
			$field[] = array('field' => 'unit_price', 'title' => 'unit_price');
			$field[] = array('field' => 'unit_order', 'title' => 'unit_order');
			
			$where = array();
			$where['purchase_order_id'] = $purchase_order_id;
			$loaddata_purchase = $this->ecc_library->loaddata($view,$field,$where);
			
			
			foreach($loaddata_purchase['data'] as $key => $value){
				if($lock_data == 0){
					
					$loaddata_table[$value[0]][7] = "<input class=\"form-control\" name=\"quantity_ordered[". $value[0] ."]\" type=\"text\" placeholder=\"This Order\" value=\"". $this->mainconfig->get_decimal_format2($value[11],12) ."\" />";
					$select = "<select class=\"form-control search_uom\" name=\"uom_id[". $value[0] ."]\" style=\"width:150px\">";
					$select .= "<option value=\"".$value[12]."\" selected=\"selectted\">". $value[16]."</option>";
					$select .= "</select>";
					$loaddata_table[$value[0]][8] = $select;
					$loaddata_table[$value[0]][9] = "<input class=\"form-control\" name=\"conversion[". $value[0] ."]\" type=\"text\" placeholder=\"Conversion\" value=\"". $this->mainconfig->get_decimal_format2($value[14],12) ."\" />";
					$loaddata_table[$value[0]][10] = "<input name=\"item_id[". $value[0] ."]\" type=\"hidden\" value=\"". $value[9] ."\" /><input class=\"form-control\" name=\"unit_price[". $value[0] ."]\" type=\"text\" placeholder=\"Unit Price\" value=\"". $this->mainconfig->get_decimal_format2($value[15],12) ."\" />";
					
				} else {
					$this_order[$value[0]] = $value[11];
					$new_row = array();
					$new_row[] = $value[0];
					$new_row[] = $value[3];
					$new_row[] = $value[2];
					$new_row[] = $value[4];
					$new_row[] = $this->mainconfig->get_decimal_format($value[5],12);
					$new_row[] = $this->mainconfig->get_decimal_format($value[6],12);
					$new_row[] = $value[7];
					$new_row[] = $this->mainconfig->get_decimal_format($value[11],12);
					$new_row[] = $value[16];
					$new_row[] = $this->mainconfig->get_decimal_format($value[14],12);
					$new_row[] = $this->mainconfig->get_decimal_format($value[15],12);
					$new_row[] = "";
					
					$loaddata_table[$value[0]] = $new_row;
				}
				
			}
		
		}
		
		$loaddata['data'] = array();
		foreach($loaddata_table as $value){
			
			$data = array();
			$data[] = $value[0];
			$data[] = $value[1];
			$data[] = $value[2];
			$data[] = $value[3];
			$data[] = $value[4];
			$data[] = $value[5];
			$data[] = $value[6];
			$data[] = $value[7];
			$data[] = $value[8];
			$data[] = $value[9];
			$data[] = $value[10];
			$data[] = $value[11];
			
			$loaddata['data'][] = $data;
		}
		
		echo json_encode($loaddata);
	}
	
	function print_purchase_order() {
      
      $purchase_order_id = isset($_POST['purchase_order_id']) ? $_POST['purchase_order_id'] : false;
      $format = isset($_POST['format']) ? $_POST['format'] : 'pdf';
      $user_id = $this->session->userdata('user_id');
      
      $sp = "dbo.sp_rpt_purchase_order_popstar";
 
      $this->rpc_service->setSP(array("sp"=>$sp,"mode"=>"2","debug"=>"1"));
      $this->rpc_service->addField('purchase_order_id',$purchase_order_id);
      $this->rpc_service->addField('format',$format);
      $this->rpc_service->addField('temp_folder',sys_get_temp_dir());
      $this->rpc_service->addField('sort','e.item_code asc');  
      
      $result = $this->rpc_service->resultPrint2();
      echo json_encode($result);
	}
	
		
	function cetak_dokumen(){ 
	   $this->db_pop = $this->load->database('pop',TRUE);
	   $purchase_order_id = (isset($_GET['purchase_order_id']) && !empty($_GET['purchase_order_id']))?$_GET['purchase_order_id']:die('{"sts":"ERROR","desc":" Param Header Tidak Ditemukan"}');
	   $item_fabric_id = (isset($_GET['item_fabric_id']) && !empty($_GET['item_fabric_id']))?$_GET['item_fabric_id']:die('{"sts":"ERROR","desc":" Param Dokumen Tidak Ditemukan"}');
	   //var_dump ($purchase_order_id);
	   $data=array();
	   
	   $q = $this->db_pop->query('SELECT * FROM dbo.view_purchase_order_warehouse WHERE purchase_order_id= '. $purchase_order_id .' ');
	   
	   $purchase_order_id = "";
	   $fabric_code = ""; 
	   $fabric_name = ""; 
	   $purchase_order_no="";
	   $purchase_order_date="";
	  
	   foreach($q->result() as $r){
		    $purchase_order_id = $r-> purchase_order_id; 
			$purchase_order_no = $r-> purchase_order_no;
			$purchase_order_date = $r-> purchase_order_date;
			$date_etd = $r->date_etd;
			$date_eta = $r->date_eta;
			$date_in = $r->date_in;
			$weight = $r->weight;
			$width = $r->width;
			$w = $r->w;
			$l = $r->l;
			$t = $r->t;
			$partner_id = $r->partner_id;
			$packing_instructions = $r->packing_instructions;
			$shipping_sample = $r->shipping_sample;
			$requested_etd = $r->requested_etd;
			$other_instructions = $r->other_instructions;
			$currencies = $r->currencies;
						
	   }
	   
	     $hasil=$this->main->getData("dbo.dt_partner",null,array("partner_id"=>$partner_id));
	     $data['partner_name'] = $hasil[0]['partner_name'];
	     $data['partner_address'] = $hasil[0]['partner_address'];
		 $data['partner_city'] = $hasil[0]['partner_city'];
		 $data['partner_state'] = $hasil[0]['partner_state'];
	  // var_dump($purchase_order_id);die();
	     $data['purchase_order_id'] = $purchase_order_id;
		 $data['purchase_order_no'] = $purchase_order_no;
		 $data['purchase_order_date'] = $purchase_order_date;
		 $data['date_etd'] = $date_etd;
		 $data['date_eta'] = $date_eta;
		 $data['date_in'] = $date_in;
		 $data['weight'] = $weight;
		 $data['width'] = $width;
		 $data['w'] = $w;
		 $data['l'] = $l;
		 $data['t'] = $t;
		 $data['packing_instructions'] = $packing_instructions; 
		 $data['shipping_sample'] = $shipping_sample; 
		 $data['requested_etd'] = $requested_etd; 
		 $data['other_instructions'] = $other_instructions; 
		 $data['partner_id'] = $partner_id; 
		 $data['currencies'] = $currencies; 
		 
		 //$data['partner_id'] = $partner_id; 
		
	   $this->load->view('draft/warehouse/purchase_order',$data);
	}
	
	function download_purchase_order_warehouse(){ 
	  $this->db_pop = $this->load->database('pop',TRUE);
	  $this->load->model('main');
	  $this->load->library('mainconfig');
      $purchase_order_id = isset($_POST['purchase_order_id']) ? $_POST['purchase_order_id'] : false;
      $format = isset($_POST['format']) ? $_POST['format'] : 'pdf';
      $user_id = $this->session->userdata('user_id');
	  
	   $q = $this->db_pop->query('SELECT * FROM dbo.view_purchase_order_warehouse WHERE purchase_order_id= '. $purchase_order_id .' ');
	   
	   $purchase_order_id = "";
	   $fabric_code = ""; 
	   $fabric_name = ""; 
	   $purchase_order_no="";
	   $purchase_order_date="";
	  
	   foreach($q->result() as $r){
		    $purchase_order_id = $r-> purchase_order_id; 
			$purchase_order_no = $r-> purchase_order_no;
			$purchase_order_date = $r-> purchase_order_date;
			$date_etd = $r->date_etd;
			$date_eta = $r->date_eta;
			$date_in = $r->date_in;
			$weight = $r->weight;
			$width = $r->width;
			$w = $r->w;
			$l = $r->l;
			$t = $r->t;
			$partner_id = $r->partner_id;
			$packing_instructions = $r->packing_instructions;
			$shipping_sample = $r->shipping_sample;
			$requested_etd = $r->requested_etd;
			$other_instructions = $r->other_instructions;
			$currencies = $r->currencies;
						
	   }
	   
	     $hasil=$this->main->getData("dbo.dt_partner",null,array("partner_id"=>$partner_id));
	     $partner_name = $hasil[0]['partner_name'];
	     $partner_address = $hasil[0]['partner_address'];
		 $partner_city = $hasil[0]['partner_city'];
		 $partner_state= $hasil[0]['partner_state'];
		 
		 $ship_name='PT.POPSTAR';
		 $ship_address='Jl.Nanjung Km.3 No.99';
	     $ship_city='Lagadar Margaasih Kab. Bandung';
		 $ship_state='Indonesia 40216';
		 
	    $temp=sys_get_temp_dir().'\\';
	 // var_dump($xrow_detail);die();
	    $host_libreoffice='127.0.0.1'; // setting host service libreoffice
        $port_libreoffice='8080';      // setting port service libreoffice
	    $TEMPLATE_EXT='fods';
	    $NEWLINE='<text:line-break/>';
	    $unoconv='"C:/Program Files/LibreOffice 5/program/python.exe" "C:\Program Files\LibreOffice 5\program\unoconv" '.'--connection "socket,host='.$host_libreoffice.',port='.            $port_libreoffice.',tcpNoDelay=1;urp;StarOffice.ComponentContext" ';
	   
	    $report_time=date('_Ymd_His');      
       	
	   if ($format =='xlsx'){
		    	$template='C:/tmp_sipop/warehouse/purchase_order/excel/excel_po_warehouse.fods';
		    $templateData='C:/tmp_sipop/warehouse/purchase_order/excel/excel_po_warehouse_data.fods';
		  	$tmp_ext='fods';
			$EXTENSION='xlsx';
			$CONTENT_TYPE='application/msexcel';
			$CONVERT_TO='xlsx';
			$report_name='Purchase_order_warehouse';
			
		   // $des='Excel';
	   }else{
		    $template='C:/tmp_sipop/warehouse/purchase_order/pdf/purchase_order.fodt';
		    $templateData='C:/tmp_sipop/warehouse/purchase_order/pdf/purchase_order_data.fodt';
		  	$tmp_ext='fodt';
			$EXTENSION='pdf';
			$CONTENT_TYPE='application/pdf';
			$CONVERT_TO='pdf';
			$report_name='invoice';
			
		   // $des='PDF';
	   }
	   $template_doc=file_get_contents($template);
       $template_data=file_get_contents($templateData);
	 
	     $shrinkage= 'W='.$w.' L='.$l.' T='.$t ;
	  
		
		//======= Detail ================
		$q2 = $this->db_pop->query('SELECT * FROM dbo.view_purchase_order_warehouse_detail WHERE purchase_order_id= '. $purchase_order_id .' ');
		$jml=0;
		$jml_amount=0;
		$value_detail ='';
		$data_detail=array('{color}','{color_code}','{qty_yard}','{unit_price}','{amount}','{remark}','{item_code}');
		//var_dump($q2->result());die();
		  foreach($q2->result() as $r2){
			$jml= $jml + $r2->quantity_ordered ;
			$amount=$r2->quantity_ordered * $r2->unit_price ; 
			$jml_amount=$jml_amount + $amount ;
			if ($currencies=='USD'){
				//$amount="$ &nbsp;&nbsp;".number_format($amount,4);
				//$qty="$ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".number_format($r2->unit_price,4);
				$amount="$ ".number_format($amount,4);
				$qty="$ ".number_format($r2->unit_price,4);
				//$jml="$ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".number_format($jml_amount,4);
			}else{
				//$amount="Rp &nbsp;".number_format($amount,4);
				//$qty="Rp &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".number_format($r2->unit_price,4);
				$amount="Rp ".number_format($amount,4);
				$qty="Rp ".number_format($r2->unit_price,4);
				//$jml="R &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".number_format($jml_amount,4);
			}
			$isi_detail=array($r2->colour,$r2->fabric_code,number_format($r2->quantity_ordered,4),$qty,$amount,$r2->purchase_order_detail_memo,$r2->item_code);
			$value_detail .=str_replace($data_detail,$isi_detail,$template_data);
		  }
		  
		    if ($currencies=='USD'){
			   //$total_amount="$ &nbsp;&nbsp;&nbsp;".number_format($jml_amount,4);
			    $total_amount="$ ".number_format($jml_amount,4);
		   }else{
			   $total_amount="Rp ".number_format($jml_amount,4);
		   }
		   
		   
		  // var_dump($value_detail);die();
		//===============================
		  $data_header=array('{no_purchase_order}','{date}','{nama_vendor}','{Nama_ship}','{alamat_vendor}','{alamat_ship}','{city_vendor}','{city_ship}','{state_vendor}','{state_ship}','{fabric_weight}','{fabric_width}','{shrinkage}','{packing_intructions}','{shipping_sample}','{request_etd}','{date_etd}','{date_eta}','{date_in}','{other_intructions}','{data}','{sum_qty}','{sum_amount}','{vendor_accepted}');	
		  
		$isi_header=array($purchase_order_no,$purchase_order_date,$partner_name,$ship_name,$partner_address,$ship_address,$partner_city,$ship_city,$partner_state,$ship_state,$weight,$width,$shrinkage,$packing_instructions,$shipping_sample,$requested_etd,$date_etd,$date_eta,$date_in,$other_instructions,$value_detail,number_format($jml,4),$total_amount,$partner_name);
		//$value_detail,number_format($jml,4),$total_amount,
		$value_header=str_replace($data_header,$isi_header,$template_doc);
		
		file_put_contents($temp.$report_name.$report_time.'.'.$tmp_ext,$value_header);
	     exec(
             $unoconv.
             '-f '.$CONVERT_TO.' '.
             '-o "'.$temp.$report_name.$report_time.'.'.$EXTENSION.'" '.
             '"'.$temp.$report_name.$report_time.'.'.$tmp_ext.'"'
             );
		
        $file=$temp.$report_name.$report_time.'.'.$EXTENSION;
		$namafile=$report_name.$report_time.'.'.$EXTENSION;
	    unlink($temp.$report_name.$report_time.'.'.$tmp_ext);		
		
        $return['valid'] =true;
		$return['xfile'] =$file;
		$return['namafile'] =$namafile; 		
	 
		//$return['valid'] =false;
		//$return['des'] =$des; 
		
		//$return['status_code'] = $result['no'];
		//$return['message'] = $result['des'];
		//$return['spec_detail_id'] = $data_result['spec_detail_id'];
		//$get_field['r16']['editable'] = true;
		//$get_field['r17']['editable'] = true;
		
		echo json_encode($return);
	  
	}
}

?>