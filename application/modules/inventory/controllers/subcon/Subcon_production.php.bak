<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Subcon_production extends CI_Controller { 

	function __construct(){ 
		parent::__construct(); 
		
		$this->data_subcon = $_REQUEST;
		
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
	
	function subcon_production_table() {
		$view = 'view_subcon_production';
		$get_field = $this->ecc_library->get_field($view);
		
		$get_field['r1']['hidden'] = true;
		
		$get_field['r10']['hidden'] = true;
		$get_field['r11']['hidden'] = true;
		$get_field['r12']['hidden'] = true;
		$get_field['r13']['hidden'] = true;
		
		// $get_field['r2']['title'] = 'Work Process';
		// $get_field['r3']['title'] = 'Subcon No';
		// $get_field['r4']['title'] = 'Subcon Date';
		// $get_field['r5']['title'] = 'Plan No';
		// $get_field['r6']['title'] = 'Plan Date';
		// $get_field['r7']['title'] = 'Subcon Status';
		return $get_field;
	}
	
	function subcon_production_material_table() {
		$view = 'view_work_order_request_bom';
		$get_field = $this->ecc_library->get_field($view);
		
		return $get_field;
	}
	
	function subcon_production_detail_table() {
		$view = 'view_subcon_production_detail';
		$get_field = $this->ecc_library->get_field($view);
		
		$get_field['r1']['hidden'] = true;
		$get_field['r2']['hidden'] = true;
		$get_field['r7']['hidden'] = true;
		
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
	
	function subcon_production_detail_supply_table() {
		$view = 'view_subcon_production_list';
		$get_field = $this->ecc_library->get_field($view);
		$get_field['r1']['hidden'] = true;
		$get_field['r2']['hidden'] = true;
		
		return $get_field;
	}
	
	function subcon_production_transfer_item_table() {
		$view = 'view_stock_move_item_subcon_production';
		$get_field = $this->ecc_library->get_field($view);
		$get_field['r1']['hidden'] = true;
		$get_field['r12']['hidden'] = true;
		
		return $get_field;
	}
	
	function subcon_production_supply_item_table() {
		$view = 'view_stock_move_supply_subcon_production';
		$get_field = $this->ecc_library->get_field($view);
		
		$get_field['r1']['hidden'] = true;
		$get_field['r12']['hidden'] = true;
		$get_field['r13']['hidden'] = true;
		$get_field['r14']['hidden'] = true;
		return $get_field;
	}
	
	function index(){
		$this->load->model('main');
		$component['loadlayout'] = true;
		$component['view_load'] = 'subcon/subcon_production/view';
		$component['view_load_form'] = 'subcon/subcon_production/form';
		$component['load_js'][] = 'subcon/subcon_production/view';
		$component['load_js'][] = 'subcon/subcon_production/form';
		
		$component['page_title'] = "Production Subcon";
		
		$dashboard_table = array();
		
		$nav_button = array();
		$nav_button[] = array('method_id' => 1126,'title' => 'Add', 'icon' => 'fa fa-plus', 'load' => 'subcon/subcon_production/function_add');
		$nav_button[] = array('method_id' => 1127,'title' => 'Edit', 'icon' => 'fa fa-pencil', 'load' => 'subcon/subcon_production/function_edit');
		$nav_button[] = array('method_id' => 1131,'title' => 'Supply', 'icon' => 'fa fa-pencil', 'load' => 'subcon/subcon_production/function_supply');
		$nav_button[] = array('method_id' => 1132,'title' => 'Approve', 'icon' => 'fa fa-pencil', 'load' => 'subcon/subcon_production/function_approve');
		$nav_button[] = array('method_id' => 1129,'title' => 'Delete', 'icon' => 'fa fa-trash-o', 'load' => 'subcon/subcon_production/function_delete');
		$nav_button[] = array('method_id' => 1130,'title' => 'Cancel Approve', 'icon' => 'fa fa-pencil', 'load' => 'subcon/subcon_production/function_cancel_approve');
		
		$field = $this->subcon_production_table();
		$field_detail = $this->subcon_production_detail_table();
		$field_detail_supply = $this->subcon_production_detail_supply_table();
		$field_transfer_item = $this->subcon_production_transfer_item_table();
		$field_supply_item = $this->subcon_production_supply_item_table();
		
		$dashboard_table['nav_button'] = $nav_button;
		$dashboard_table['field'] = $field;
		$dashboard_table['field_detail'] = $field_detail;
		$dashboard_table['field_detail_supply'] = $field_detail_supply;
		$dashboard_table['field_detail_loaddata'] = 'loaddata_detail';
		$dashboard_table['field_detail_supply_loaddata'] = 'loaddata_detail_supply';
		$dashboard_table['field_transfer_item'] = $field_transfer_item;
		$dashboard_table['field_transfer_item_loaddata'] = 'loaddata_transfer_item';
		$dashboard_table['field_supply_item'] = $field_supply_item;
		$dashboard_table['field_supply_item_loaddata'] = 'loaddata_supply_item';
		
		$component['dashboard_table'] = $dashboard_table;
		
		$this->authentication->ajaxlayout($component);
	}
	
	function loaddata() {
		$this->authentication->plainlayout();
		
		$view = 'view_subcon_production';
		$field = $this->subcon_production_table();
		
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";
 
		$loaddata = $this->ecc_library->get_field_data($view,$field);
			
		echo $loaddata;
	}
	
	function approve(){
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
				
		$subcon_production_id = isset($_POST['subcon_production_id']) ? $_POST['subcon_production_id'] : false;
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			
			if($subcon_production_id){
				$this->rpc_service->setSP("dbo.sp_subcon_production_approve");
				$this->rpc_service->addField('subcon_production_id',$subcon_production_id);
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
			
		} else {
			$return['valid'] = false;
			$return['message'] = "Session expired";
		}
		
		echo json_encode($return);
	}
	
	function cancel_approve(){
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
				
		$subcon_production_id = isset($_POST['subcon_production_id']) ? $_POST['subcon_production_id'] : false;
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			
			if($subcon_production_id){
				$this->rpc_service->setSP("dbo.sp_subcon_production_cancel_approve");
				$this->rpc_service->addField('subcon_production_id',$subcon_production_id);
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
			
		} else {
			$return['valid'] = false;
			$return['message'] = "Session expired";
		}
		
		echo json_encode($return);
	}
	
	function delete(){
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
				
		$subcon_production_id = isset($_POST['subcon_production_id']) ? $_POST['subcon_production_id'] : false;
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			
			if($subcon_production_id){
				$this->rpc_service->setSP("dbo.sp_subcon_production_delete");
				$this->rpc_service->addField('subcon_production_id',$subcon_production_id);
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
			
		} else {
			$return['valid'] = false;
			$return['message'] = "Session expired";
		}
		
		echo json_encode($return);
	}
	
	function post_add_edit(){
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
								
		$subcon_production_id = isset($_POST['subcon_production_id']) ? $_POST['subcon_production_id'] : '';
		$subcon_production_no = isset($_POST['subcon_production_no']) ? $_POST['subcon_production_no'] : '';
		$subcon_production_date = isset($_POST['subcon_production_date']) ? $_POST['subcon_production_date'] : '';
		$contract_subcon_id = isset($_POST['contract_subcon_id']) ? $_POST['contract_subcon_id'] : '';
				
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			if($subcon_production_id){
				$this->rpc_service->setSP("dbo.sp_subcon_production_edit");
				$this->rpc_service->addField('subcon_production_id',$subcon_production_id);
			} else {
				$this->rpc_service->setSP("dbo.sp_subcon_production_add");
			}
			
			$this->rpc_service->addField('subcon_production_no',$subcon_production_no);
			$this->rpc_service->addField('subcon_production_date',$subcon_production_date);
			$this->rpc_service->addField('contract_subcon_id',$contract_subcon_id);
						
			$result = $this->rpc_service->resultJSON();
			
			
			$data = array();
			if(isset($result)){
				if(isset($result['valid'])){
					if($result['valid']){
						if(isset($result['data'])){
							$data = json_decode($result['data'],TRUE);
							$subcon_production_id = $data['subcon_production_id'];
							
							$return['valid'] = $result['valid'];
							$return['status_code'] = $result['no'];
							$return['message'] = $result['des'];
							$return['subcon_production_id'] = $subcon_production_id;
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
	
	function loaddata_detail(){
		$this->authentication->plainlayout();
		
		$subcon_production_id = isset($_REQUEST['subcon_production_id']) ? is_numeric($_REQUEST['subcon_production_id']) ? $_REQUEST['subcon_production_id']  : -1 : -1;
		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;
		
		$view = 'view_subcon_production_detail';
		$field = $this->subcon_production_detail_table();
		
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";
		
		$extra_param = array();
		$extra_param['where']['0']['field'] = 'r2';
		$extra_param['where']['0']['data'] = $subcon_production_id;
		$extra_param['methodid'] = $methodid;
		
		$loaddata = $this->ecc_library->get_field_data($view,$field,$extra_param);
			
		echo $loaddata;
	}
		
	function post_add_edit_detail(){
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
		
		$subcon_production_detail_id = isset($_POST['subcon_production_detail_id']) ? $_POST['subcon_production_detail_id'] : false;
		$subcon_production_id = isset($_POST['subcon_production_id']) ? $_POST['subcon_production_id'] : false;
		$item_id = isset($_POST['item_id']) ? $_POST['item_id'] : '';
		$quantity_subcon = isset($_POST['quantity_subcon']) ? $_POST['quantity_subcon'] : '';
		$material_list = isset($_POST['material_list']) ? $_POST['material_list'] : array();
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			if($subcon_production_detail_id){
				$this->rpc_service->setSP("dbo.sp_subcon_production_detail_edit");
				$this->rpc_service->addField('subcon_production_detail_id',$subcon_production_detail_id);
			} else {
				$this->rpc_service->setSP("dbo.sp_subcon_production_detail_add");
			}
			
			$this->rpc_service->addField('subcon_production_id',$subcon_production_id);
			$this->rpc_service->addField('item_id',$item_id);
			$this->rpc_service->addField('quantity_subcon',$quantity_subcon);
			$this->rpc_service->addField('subcon_production_detail_id',$subcon_production_detail_id);
			
			foreach($material_list as $dt_data){
				$this->rpc_service->addAttributeChild('dt' ,$dt_data);
			}
			
			$result = $this->rpc_service->resultJSON();
			
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
	
	function loaddata_material(){
		$this->authentication->plainlayout();
		$return = array();
		
		$field = $this->subcon_production_material_table();
		
		$contract_subcon_id = isset($_POST['contract_subcon_id']) ? is_numeric($_POST['contract_subcon_id']) ? $_POST['contract_subcon_id'] : -1: -1;
		$subcon_production_date = isset($_POST['subcon_production_date']) ? $_POST['subcon_production_date'] : '1900-01-01';
		$subcon_production_detail_id = isset($_POST['subcon_production_detail_id']) ? $_POST['subcon_production_detail_id'] : '';
		
		$page = isset($_POST['page'])?$_POST['page']:1; // get the requested page 
        $rows = isset($_POST['rows'])?$_POST['rows']:10; // get how many rows we want to have into the grid 
        $sidx = isset($_POST['sidx'])?$_POST['sidx']:'r1'; // get index row - i.e. user click to sort 
        $sord = isset($_POST['sord'])?$_POST['sord']:'asc'; // get the direction 
		$search = true; 
		$filterRules =  isset($_POST['filters'])?$_POST['filters']:false;
		
		$decode_filterRules = json_decode($filterRules,true);
		
		if(isset($decode_filterRules)){
			if(isset($decode_filterRules['rules'])){
				$rules = $decode_filterRules['rules'];
			} else {
				$rules = array();
			}
		} else {
			$decode_filterRules['groupOp'] = 'AND';
			$rules = array();
		}
		
		$decode_filterRules['rules'] = $rules;
		$filterRules = json_encode($decode_filterRules);
		
		$limit =  $rows;
		$offset =  $rows * ($page - 1);
		
		$order = isset($_REQUEST['order']) ? $_REQUEST['order'] : array();
		
		if($sord == 'asc'){
			$sord = 1;
		} else {
			$sord = 2;
		}
		
		$sort =	$sidx. '='.$sord;	
					
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";	
		
		if($subcon_production_detail_id){
			$sp = "dbo.sp_stock_move_item_subcon_production_detail";	
			$this->rpc_service_portal->setSP($sp);
			$this->rpc_service_portal->addField('subcon_production_detail_id',$subcon_production_detail_id);	
		} else {
			$sp = "dbo.sp_stock_move_item_subcon_production";	
			$this->rpc_service_portal->setSP($sp);
		}
		
		$this->rpc_service_portal->addField('contract_subcon_id',$contract_subcon_id);
		$this->rpc_service_portal->addField('subcon_production_date',$subcon_production_date);
		$this->rpc_service_portal->addField('sort',$sort);
		$this->rpc_service_portal->addField('limit',$limit);
		$this->rpc_service_portal->addField('offset',$offset);
		
		$this->rpc_service_portal->setWhere($search,$filterRules,$field);
		
		$result = $this->rpc_service_portal->resultJSON();	
		$data_result = json_decode($result['data'],true);
		
		if(isset($data_result['detail']['result_count'])){
			$records = $data_result['detail']['result_count'];
			$total = ceil($data_result['detail']['result_count'] / $limit);
		} else {
			$records = 0;
			$total = 0;
		}
		
		$responce = new stdclass();
		$responce->page = $page;
		$responce->records = $records;
		$responce->total = $total;
		$i=0; 
		if($data_result){
			if(isset($data_result['xrow'])){
				foreach($data_result['xrow'] as $key=>$value){
					foreach ($value as $k => $v) {
						
						$responce->rows[$i][$k] = $v;
						
					} 
										
					$i++;
				}
			}
		}
			
		$return = json_encode($responce);
	
		
		echo $return;
	}
	
	function loaddata_detail_total(){
		$this->authentication->plainlayout();
		
		$field = array();
		$field[] = array('field' => 'item', 'title' => 'item');
		$field[] = array('field' => 'quantity_requirement', 'title' => 'unit');
		$field[] = array('field' => 'uom_code', 'title' => 'mat_quantity');
		$field[] = array('field' => 'fg_item', 'title' => 'mat_quantity');
		$field[] = array('field' => 'quantity_subcon', 'title' => 'mat_quantity');
	
		$new_subcon_production = isset($_POST['new_subcon_production']) ? $_POST['new_subcon_production'] : 0;
		$subcon_production_id = isset($_POST['subcon_production_id']) ? is_numeric($_POST['subcon_production_id']) ? $_POST['subcon_production_id'] : -1: -1;

		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";
		$loaddata_table = array();
		
		
		$view = 'dbo.view_subcon_production_list';
		$where = array();
		$where['subcon_production_id'] = $subcon_production_id;
		$loaddata = $this->ecc_library->loaddata($view,$field, $where);
			
		foreach($loaddata['data'] as $key => $value){
			
			$new_row = array();
			$new_row[] = $value[0];
			$new_row[] = $this->mainconfig->get_decimal_format($value[1],12);
			$new_row[] = $value[2];
			$new_row[] = $value[3];
			$new_row[] = $this->mainconfig->get_decimal_format($value[4],12);
							
			$loaddata_table[$value[0]] = $new_row;
		}
		
		
		
		$loaddata['data'] = array();
		foreach($loaddata_table as $value){
			
			$data = array();
			$data[] = $value[0];
			$data[] = $value[1];
			$data[] = $value[2];
			$data[] = $value[3];
			$data[] = $value[4];
			
			$loaddata['data'][] = $data;
		}
		
		echo json_encode($loaddata);
	}
	
	function delete_detail(){
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		$subcon_production_detail_id = isset($_POST['subcon_production_detail_id']) ? $_POST['subcon_production_detail_id'] : '';
		$user_id = $this->session->userdata('user_id');
		
		if(count($_POST) > 0){
			if($subcon_production_detail_id){
				$this->rpc_service->setSP("dbo.sp_subcon_production_detail_delete");
				$this->rpc_service->addField('subcon_production_detail_id',$subcon_production_detail_id);
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
			
		} else {
			$return['valid'] = false;
			$return['message'] = "Session expired";
		}
		
		echo json_encode($return);
	}
	
	function loaddata_detail_supply(){
		$this->authentication->plainlayout();
		
		$subcon_production_id = isset($_REQUEST['subcon_production_id']) ? is_numeric($_REQUEST['subcon_production_id']) ? $_REQUEST['subcon_production_id']  : -1 : -1;
		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;
		
		$view = 'view_subcon_production_list';
		$field = $this->subcon_production_detail_supply_table();
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";
		
		$extra_param = array();
		$extra_param['where']['0']['field'] = 'r2';
		$extra_param['where']['0']['data'] = $subcon_production_id;
		$extra_param['methodid'] = $methodid;
		
		$loaddata = $this->ecc_library->get_field_data($view,$field,$extra_param);
			
		echo $loaddata;
	}
	
	function loaddata_transfer_item(){
		$this->authentication->plainlayout();
		
		$subcon_production_list_id = isset($_REQUEST['subcon_production_list_id']) ? is_numeric($_REQUEST['subcon_production_list_id']) ? $_REQUEST['subcon_production_list_id']  : -1 : -1;
		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;
		
		$view = 'view_stock_move_item_subcon_production';
		$field = $this->subcon_production_transfer_item_table();
		
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";
		
		$extra_param = array();
		$extra_param['where']['0']['field'] = 'r12';
		$extra_param['where']['0']['data'] = $subcon_production_list_id;
		$extra_param['methodid'] = $methodid;
		
		$loaddata = $this->ecc_library->get_field_data($view,$field,$extra_param);
			
		echo $loaddata;
	}
	
	function loaddata_supply_item(){
		$this->authentication->plainlayout();
		
		$subcon_production_list_id = isset($_REQUEST['subcon_production_list_id']) ? is_numeric($_REQUEST['subcon_production_list_id']) ? $_REQUEST['subcon_production_list_id']  : -1 : -1;
		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;
		
		$view = 'view_stock_move_supply_subcon_production';
		$field = $this->subcon_production_supply_item_table();
		
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";
		
		$extra_param = array();
		$extra_param['where']['0']['field'] = 'r12';
		$extra_param['where']['0']['data'] = $subcon_production_list_id;
		$extra_param['methodid'] = $methodid;
		
		$loaddata = $this->ecc_library->get_field_data($view,$field,$extra_param);
			
		echo $loaddata;
	}
	
	function post_add_edit_supply(){
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
		
		$stock_move_id = isset($_POST['stock_move_id']) ? $_POST['stock_move_id'] : false;
		$subcon_production_list_id = isset($_POST['subcon_production_list_id']) ? $_POST['subcon_production_list_id'] : 0;
		$subcon_production_supply_id = isset($_POST['subcon_production_supply_id']) ? $_POST['subcon_production_supply_id'] : '';
		$quantity_supply = isset($_POST['quantity_supply']) ? $_POST['quantity_supply'] : 0;
		$subcon_production_id = isset($_POST['subcon_production_id']) ? $_POST['subcon_production_id'] : 0;
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			if($subcon_production_supply_id){
				$this->rpc_service->setSP("dbo.sp_subcon_production_supply_edit");
				$this->rpc_service->addField('subcon_production_supply_id',$subcon_production_supply_id);
			} else {
				$this->rpc_service->setSP("dbo.sp_subcon_production_supply_add");
			}
			
			$this->rpc_service->addField('subcon_production_id',$subcon_production_id);
			$this->rpc_service->addField('subcon_production_list_id',$subcon_production_list_id);
			$this->rpc_service->addField('quantity_supply',$quantity_supply);
			$this->rpc_service->addField('stock_move_id',$stock_move_id);
			
			$result = $this->rpc_service->resultJSON();
			
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
	
	function auto_supply_fifo(){
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
				
		$subcon_production_id = isset($_POST['subcon_production_id']) ? $_POST['subcon_production_id'] : false;
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			
			if($subcon_production_id){
				$this->rpc_service->setSP("dbo.sp_subcon_production_supply_fifo");
				$this->rpc_service->addField('subcon_production_id',$subcon_production_id);
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
			
		} else {
			$return['valid'] = false;
			$return['message'] = "Session expired";
		}
		
		echo json_encode($return);
	}
	
	function auto_supply_lifo(){
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
				
		$subcon_production_id = isset($_POST['subcon_production_id']) ? $_POST['subcon_production_id'] : false;
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			
			if($subcon_production_id){
				$this->rpc_service->setSP("dbo.sp_subcon_production_supply_lifo");
				$this->rpc_service->addField('subcon_production_id',$subcon_production_id);
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
		} else {
			$return['valid'] = false;
			$return['message'] = "Session expired";
		}
		
		echo json_encode($return);
	}
}

?>