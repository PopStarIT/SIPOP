<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Production_plan extends CI_Controller { 

	function __construct(){ 
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
	
	function work_order_plan_table() {
		$view = 'view_work_order_plan';
		$get_field = $this->ecc_library->get_field($view);
		
		$get_field['r1']['hidden'] = true;
		$get_field['r12']['hidden'] = true;
		$get_field['r13']['hidden'] = true;
		$get_field['r14']['hidden'] = true;
		$get_field['r15']['hidden'] = true;
		$get_field['r16']['hidden'] = true;
		$get_field['r17']['hidden'] = true;
		$get_field['r18']['hidden'] = true;
		
		$get_field['r2']['title'] = 'Plan No';
		$get_field['r2']['width'] = '280';
		$get_field['r3']['title'] = 'Plan Date';
		$get_field['r3']['width'] = '150';
		$get_field['r4']['title'] = 'Required Date';
		$get_field['r4']['width'] = '150';
		$get_field['r5']['title'] = 'Status';
		$get_field['r5']['width'] = '150';
		$get_field['r6']['width'] = '200';
		
		return $get_field;
	}
	
	function work_order_table() {
		$view = 'view_work_order';
		$get_field = $this->ecc_library->get_field($view);
		
		$get_field['r1']['hidden'] = true;
		$get_field['r2']['hidden'] = true;
		$get_field['r8']['hidden'] = true;
		$get_field['r9']['hidden'] = true;
		
		$get_field['r3']['width'] = '200';
		$get_field['r4']['width'] = '250';
		$get_field['r5']['width'] = '250';
		$get_field['r6']['width'] = '250';
		//$get_field['r9']['title'] = 'Mark Up Material (%)';
		//$get_field['r9']['width'] = '250';
		
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
	
	function work_order_plan_material_table() {
		$view = 'view_work_order_plan_material';
		$get_field = $this->ecc_library->get_field($view);
		
		$get_field['r1']['hidden'] = true;
		$get_field['r2']['hidden'] = true;
		
		return $get_field;
	}
	
	function work_order_plan_foreacast_table() {
		$view = 'view_work_order_plan_forecast';
		$get_field = $this->ecc_library->get_field($view);
		
		$get_field['r1']['hidden'] = true;
		$get_field['r2']['hidden'] = true;
		
		return $get_field;
	}
	
	function monitoring_request_table(){
		$view = 'view_work_order_monitoring_request';
		$get_field = $this->ecc_library->get_field_pop($view);
		
		$get_field['r1']['hidden'] = true;
		$get_field['r2']['hidden'] = true;
				
		return $get_field;
	}
	
	function index(){
		$this->load->model('main');
		$component['loadlayout'] = true;
		$component['view_load'] = 'manufacture/production_plan/view';
		$component['view_load_form'] = 'manufacture/production_plan/form';
		$component['load_js'][] = 'manufacture/production_plan/view';
		$component['load_js'][] = 'manufacture/production_plan/form';
		
		$component['page_title'] = "Production Plan";
		
		$dashboard_table = array();
		
		$nav_button = array();
		$nav_button[] = array('method_id' => 491,'title' => 'Add', 'icon' => 'fa fa-plus', 'load' => 'manufacture/production_plan/function_add');
		$nav_button[] = array('method_id' => 492,'title' => 'Edit', 'icon' => 'fa fa-pencil', 'load' => 'manufacture/production_plan/function_edit');
		$nav_button[] = array('method_id' => 886,'title' => 'List Material', 'icon' => 'fa fa-pencil', 'load' => 'manufacture/production_plan/function_material');
		$nav_button[] = array('method_id' => 495,'title' => 'Approve', 'icon' => 'fa fa-pencil', 'load' => 'manufacture/production_plan/function_approve');
		$nav_button[] = array('method_id' => 885,'title' => 'Finish', 'icon' => 'fa fa-pencil', 'load' => 'manufacture/production_plan/function_finish');
		//$nav_button[] = array('method_id' => 659,'title' => 'Forecast Material', 'icon' => 'fa fa-pencil', 'load' => 'manufacture/production_plan/function_forecast');
		$nav_button[] = array('method_id' => 494,'title' => 'Delete', 'icon' => 'fa fa-trash-o', 'load' => 'manufacture/production_plan/function_delete');
		$nav_button[] = array('method_id' => 776,'title' => 'Cancel Approve', 'icon' => 'fa fa-pencil', 'load' => 'manufacture/production_plan/function_cancel_approve');
		$nav_button[] = array('method_id' => 1108,'title' => 'Cancel Finish', 'icon' => 'fa fa-pencil', 'load' => 'manufacture/production_plan/function_cancel_finish');
		$nav_button[] = array('method_id' => 776,'title' => 'Monitoring', 'icon' => 'fa fa-search', 'load' => 'manufacture/production_plan/function_monitoring');
		
		$field = $this->work_order_plan_table();
		$field_detail = $this->work_order_table();
		$field_material = $this->work_order_plan_material_table();
		$field_request = $this->monitoring_request_table();
		
		$dashboard_table['nav_button'] = $nav_button;
		$dashboard_table['field'] = $field;
		$dashboard_table['field_detail'] = $field_detail;
		$dashboard_table['field_detail_loaddata'] = 'loaddata_detail';
		$dashboard_table['field_material'] = $field_material;
		$dashboard_table['field_material_loaddata'] = 'loaddata_material';
				
		$dashboard_table['field_monitoring_request'] = $field_request;
		$dashboard_table['field_monitoring_request_loaddata'] = 'loaddata_monitoring_request';
		
		$component['dashboard_table'] = $dashboard_table;
		
		$this->authentication->ajaxlayout($component);
	}
	
	function loaddata() {
		$this->authentication->plainlayout();
		
		$view = 'view_work_order_plan';
		$field = $this->work_order_table();
		
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";
 
		$loaddata = $this->ecc_library->get_field_data($view,$field);
			
		echo $loaddata;
	}
	
	function loaddata_monitoring_request() {
		$this->authentication->plainlayout();
		$view = 'view_work_order_monitoring_request';
		$field = $this->monitoring_request_table();
		
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";
		//var_dump($_POST);
		$work_order_plan_id = isset($_POST['work_order_plan_id']) ? $_POST['work_order_plan_id'] : '';
		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;
		
		$extra_param = array();
		$extra_param['where']['0']['field'] = 'r1';
		$extra_param['where']['0']['data'] = $work_order_plan_id;
		$extra_param['methodid'] = $methodid;
				
		$loaddata = $this->ecc_library->get_field_data_pop($view,$field,$extra_param);
		echo $loaddata;
	}
	
	function approve(){
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
				
		$work_order_plan_id = isset($_POST['work_order_plan_id']) ? $_POST['work_order_plan_id'] : false;
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			
			if($work_order_plan_id){
				$this->rpc_service->setSP("dbo.sp_work_order_plan_approve");
				$this->rpc_service->addField('work_order_plan_id',$work_order_plan_id);
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
	
	function finish(){
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
				
		$work_order_plan_id = isset($_POST['work_order_plan_id']) ? $_POST['work_order_plan_id'] : false;
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			
			if($work_order_plan_id){
				$this->rpc_service->setSP("dbo.sp_work_order_plan_finish");
				$this->rpc_service->addField('work_order_plan_id',$work_order_plan_id);
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
	
	function cancel_finish(){
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();

		$work_order_plan_id = isset($_POST['work_order_plan_id']) ? $_POST['work_order_plan_id'] : false;

		$user_id = $this->session->userdata('user_id');

		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";

		if(count($_POST) > 0){

			if($work_order_plan_id){
				$this->rpc_service->setSP("dbo.sp_work_order_plan_cancel_finish");
				$this->rpc_service->addField('work_order_plan_id',$work_order_plan_id);
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
				
		$work_order_plan_id = isset($_POST['work_order_plan_id']) ? $_POST['work_order_plan_id'] : false;
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			
			if($work_order_plan_id){
				$this->rpc_service->setSP("dbo.sp_work_order_plan_cancel_approve");
				$this->rpc_service->addField('work_order_plan_id',$work_order_plan_id);
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
				
		$work_order_plan_id = isset($_POST['work_order_plan_id']) ? $_POST['work_order_plan_id'] : false;
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			
			if($work_order_plan_id){
				$this->rpc_service->setSP("dbo.sp_work_order_plan_delete");
				$this->rpc_service->addField('work_order_plan_id',$work_order_plan_id);
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
				
		$work_order_plan_id = isset($_POST['work_order_plan_id']) ? $_POST['work_order_plan_id'] : '';
		$work_order_plan_no = isset($_POST['work_order_plan_no']) ? $_POST['work_order_plan_no'] : '';
		$work_order_plan_date = isset($_POST['work_order_plan_date']) ? $_POST['work_order_plan_date'] : '';
		$work_order_plan_type_id = isset($_POST['work_order_plan_type_id']) ? $_POST['work_order_plan_type_id'] : '';
		$contract_subcon_id = isset($_POST['contract_subcon_id']) ? $_POST['contract_subcon_id'] : '';
		$sales_order_id = isset($_POST['sales_order_id']) ? $_POST['sales_order_id'] : '';
		$work_order_required_date = isset($_POST['work_order_required_date']) ? $_POST['work_order_required_date'] : '';
		
		if($sales_order_id == -1){
			$sales_order_id = NULL;
		}
		
		if($contract_subcon_id == -1){
			$contract_subcon_id = NULL;
		}
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			if($work_order_plan_id){
				$this->rpc_service->setSP("dbo.sp_work_order_plan_edit");
				$this->rpc_service->addField('work_order_plan_id',$work_order_plan_id);
			} else {
				$this->rpc_service->setSP("dbo.sp_work_order_plan_add");
			}
			
			$this->rpc_service->addField('work_order_plan_no',$work_order_plan_no);
			$this->rpc_service->addField('work_order_plan_date',$work_order_plan_date);
			$this->rpc_service->addField('work_order_plan_type_id',$work_order_plan_type_id);
			$this->rpc_service->addField('contract_subcon_id',$contract_subcon_id);
			$this->rpc_service->addField('sales_order_id',$sales_order_id);
			$this->rpc_service->addField('work_order_required_date',$work_order_required_date);
						
			$result = $this->rpc_service->resultJSON();
			
			
			$data = array();
			if(isset($result)){
				if(isset($result['valid'])){
					if($result['valid']){
						if(isset($result['data'])){
							$data_result = json_decode($result['data'],true);
							
							$return['valid'] = $result['valid'];
							$return['status_code'] = $result['no'];
							$return['message'] = $result['des'];
							$return['work_order_plan_id'] = $data_result['work_order_plan_id'];
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
	
	function loaddata_detail() {
		$this->authentication->plainlayout();
		
		$work_order_plan_id = isset($_REQUEST['work_order_plan_id']) ? is_numeric($_REQUEST['work_order_plan_id']) ? $_REQUEST['work_order_plan_id']  : -1 : -1;
		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;
		
		$view = 'view_work_order';
		$field = $this->work_order_table();
		
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";
		
		$extra_param = array();
		$extra_param['where']['0']['field'] = 'r2';
		$extra_param['where']['0']['data'] = $work_order_plan_id;
		$extra_param['methodid'] = $methodid;
		
		$loaddata = $this->ecc_library->get_field_data($view,$field,$extra_param);
			
		echo $loaddata;
	}
		
	function loaddata_material() {
		$this->authentication->plainlayout();
		
		$work_order_plan_id = isset($_REQUEST['work_order_plan_id']) ? is_numeric($_REQUEST['work_order_plan_id']) ? $_REQUEST['work_order_plan_id']  : -1 : -1;
		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;
		
		$view = 'view_work_order_plan_material';
		$field = $this->work_order_plan_material_table();
		
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";
		
		$extra_param = array();
		$extra_param['where']['0']['field'] = 'r2';
		$extra_param['where']['0']['data'] = $work_order_plan_id;
		$extra_param['methodid'] = $methodid;
		
		$loaddata = $this->ecc_library->get_field_data($view,$field,$extra_param);
			
		echo $loaddata;
	}
		
	function post_add_edit_detail(){
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
		
		$work_order_plan_id = isset($_POST['work_order_plan_id']) ? $_POST['work_order_plan_id'] : 0;
		$work_order_id = isset($_POST['work_order_id']) ? $_POST['work_order_id'] : '';
		$item_id = isset($_POST['item_id']) ? $_POST['item_id'] : '';
		$quantity_plan = isset($_POST['quantity_plan']) ? $_POST['quantity_plan'] : '';
		//$bom_process_id = isset($_POST['bom_process_id']) ? $_POST['bom_process_id'] : '';
		$mark_up_material = isset($_POST['mark_up_material']) ? $_POST['mark_up_material'] : 0;
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			if($work_order_id){
				$this->rpc_service->setSP("dbo.sp_work_order_edit");
				$this->rpc_service->addField('work_order_id',$work_order_id);
			} else {
				$this->rpc_service->setSP("dbo.sp_work_order_add");
			}
			
			$this->rpc_service->addField('work_order_plan_id',$work_order_plan_id);
			$this->rpc_service->addField('item_id',$item_id);
			$this->rpc_service->addField('quantity_plan',$quantity_plan);
			//$this->rpc_service->addField('bom_process_id',$bom_process_id);
			$this->rpc_service->addField('mark_up_material',$mark_up_material);
			
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
	
	function delete_detail(){
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		$work_order_id = isset($_POST['work_order_id']) ? $_POST['work_order_id'] : '';
		$user_id = $this->session->userdata('user_id');
		
		
		if(count($_POST) > 0){
			
			if($work_order_id){
				$this->rpc_service_portal->setSP("dbo.sp_work_order_delete");
				$this->rpc_service_portal->addField('work_order_id',$work_order_id);
			}
					
			$result = $this->rpc_service_portal->resultJSON();
			
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
	
	function loaddata_forecast_material(){
		$this->authentication->plainlayout();
		$return = array();
		
		$field = $this->work_order_plan_foreacast_table();
		
		$work_order_plan_id = isset($_POST['work_order_plan_id']) ? is_numeric($_POST['work_order_plan_id']) ? $_POST['work_order_plan_id'] : -1: -1;
		
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
				
		$extra_param = array();
		$extra_param['where']['1']['field'] = 'r2';
		$extra_param['where']['1']['data'] = $work_order_plan_id;		
		
		if(isset($extra_param['where'])){
			foreach($extra_param['where'] as $dt_where){
				$have_key = false;
				
				foreach($rules as $key => $value){
					if($value['field'] == $dt_where['field']){
						$have_key = true;
						$rules[$key]['data'] = $dt_where['data'];
						break;
					}
				}
				
				if(!$have_key){
					$data_where = array();
					$data_where['field'] = $dt_where['field'];
					$data_where['op'] = 'eq';
					$data_where['data'] = $dt_where['data'];
					$rules[] = $data_where;
				}
			}
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
				
		$sp = "dbo.sp_ecc_load_view_data";	
		$this->rpc_service->setSP($sp);
		$this->rpc_service->addField('view','view_work_order_plan_forecast');
		$this->rpc_service->addField('sort',$sort);
		$this->rpc_service->addField('limit',$limit);
		$this->rpc_service->addField('offset',$offset);
		
		$this->rpc_service->setWhere($search,$filterRules,$field);
		
		$result = $this->rpc_service->resultJSON();	
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
	
	function post_forecast_to_purchase(){
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
				
		$work_order_plan_id = isset($_POST['work_order_plan_id']) ? $_POST['work_order_plan_id'] : '';
		$request_list = isset($_POST['request_list']) ? $_POST['request_list'] : array();
				
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){			
			if($work_order_plan_id){
				$this->rpc_service->setSP("dbo.sp_purchase_request_add_from_plan");
				$this->rpc_service->addField('work_order_plan_id',$work_order_plan_id);
			} else {
				$this->rpc_service->setSP("dbo.sp_purchase_request_add_from_plan");
			}
			
			foreach($request_list as $dt_data){
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
	
	function post_upload(){
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
		
		if(count($_POST) > 0){	
			$data = $_POST;
			if (isset($data)) {
			   $data =  current($data);
			}
		} else {
			$return['valid'] = false;
			$return['message'] = "Data Tidak Ditemukan";
			echo json_encode($return);
			die();
		}
		
		$file = isset($_FILES['userfile_' . $data . '_production_plan']['name']) && $_FILES['userfile_' . $data . '_production_plan']['name'] != '' ? true : false;
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		$error = 0;
		$msg = "";
		
		if(count($_POST) > 0){			
			$dir = 'uploads/';
			
			if (!is_dir($dir)) {  
				mkdir($dir, 0777);
			}
			$dir .= date('Y').'/';
			if (!is_dir($dir)) {  
				mkdir($dir, 0777);
			}
			$dir .= date('m').'/';
			if (!is_dir($dir)) {  
				mkdir($dir, 0777);
			}
			$dir .= 'production_plan/';
			if (!is_dir($dir)) {  
				mkdir($dir, 0777);
			}
			
			if($file){
				
				$config['overwrite'] = false;
				$config['file_name'] = $_FILES['userfile_' . $data . '_production_plan']['name'];
				$config['upload_path'] = $dir;
				$config['allowed_types'] = 'xls|xlsx';
				$config['max_size'] = '10000000';
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				
				
				if ($this->upload->do_upload('userfile_' . $data . '_production_plan')) {
					$uploaded = $this->upload->data();

					$file_name = $uploaded['file_name'];
					$file_type = $uploaded['file_type'];
					$file_path = $uploaded['file_path'];
					$full_path = $uploaded['full_path'];
					$raw_name = $uploaded['raw_name'];
					$orig_name = $uploaded['orig_name'];
					$client_name = $uploaded['client_name'];
					$file_ext = $uploaded['file_ext'];
					$file_size = $uploaded['file_size'];
					$is_image = $uploaded['is_image'];
					$image_width = $uploaded['image_width'];
					$image_height = $uploaded['image_height'];
					$image_type = $uploaded['image_type'];
					$image_size_str = $uploaded['image_size_str'];
				} else {
					$error++;
					$msg .= $this->upload->display_errors();
				}
			} else {
				$error++;
				$msg = "No file selected";
			}
		}
		
		if($error == 0){
			// create xml from data excel
			//file_ext
			$data_bom = array();
			
			if($file_ext =='xls'){
				$inputFileType = 'Excel5';
			} else {
				$inputFileType = 'Excel2007';
			}
			
			$inputFileName = $full_path;
			 
			
			$objReader = PHPExcel_IOFactory::createReader($inputFileType);
			$objReader->setLoadSheetsOnly('PRODUCTION PLAN');
			$objPHPExcel = $objReader->load($inputFileName);
			
			// Prepare loop to extract values from cells
			$worksheet = $objPHPExcel->getActiveSheet();
			
			$rows = $worksheet->toArray();
			if($worksheet->getTitle() != 'PRODUCTION PLAN'){
				$return['valid'] = false;
				$return['message'] = 'Nama sheet harus PRODUCTION PLAN';
				echo json_encode($return);
				die();
			}
			
			if(count($rows) == 0){
				$return['valid'] = false;
				$return['message'] = 'Cek kembali datanya';
				echo json_encode($return);
				die();
			}
			
			$row_bom = array();
			for ($x = 0; $x <= count($rows)-1; $x+=1) {
				for ($i = 0; $i <= count($rows[$x])-1; $i+=1){
					$row_bom[$rows[0][$i]] = $rows[$x][$i];				
				}				
			
				$data_bom[] = $row_bom;	
			}  
			
			if (!array_key_exists("WORK_ORDER_PLAN_NO",$data_bom[0]))
			{
			  $return['valid'] = false;
			  $return['message'] = "WORK_ORDER_PLAN_NO TIDAK ADA <br />" . 'Cek kembali datanya';
			  echo json_encode($return);
			  die();
			}
			
			if (!array_key_exists("WORK_ORDER_PLAN_DATE",$data_bom[0]))
			{
			  $return['valid'] = false;
			  $return['message'] = "WORK ORDER PLAN DATE TIDAK ADA <br />" . 'Cek kembali datanya';
			  echo json_encode($return);
			  die();
			}
			
			if (!array_key_exists("WORK_ORDER_REQUIRED_DATE",$data_bom[0]))
			{
			  $return['valid'] = false;
			  $return['message'] = "WORK ORDER REQUIRED DATE TIDAK ADA <br />" . 'Cek kembali datanya';
			  echo json_encode($return);
			  die();
			}
			
			if (!array_key_exists("ITEM_CODE",$data_bom[0]))
			{
			  $return['valid'] = false;
			  $return['message'] = "ITEM CODE TIDAK ADA <br />" . 'Cek kembali datanya';
			  echo json_encode($return);
			  die();
			}
			
			if (!array_key_exists("QTY_PLAN",$data_bom[0]))
			{
			  $return['valid'] = false;
			  $return['message'] = "QTY PLAN TIDAK ADA <br />" . 'Cek kembali datanya';
			  echo json_encode($return);
			  die();
			}
			
			for ($x = 0; $x <= count($data_bom)-1; $x+=1) {
				
				if($data_bom[$x]["WORK_ORDER_PLAN_NO"] == NULL){
					unset($data_bom[$x]);
				} 
			}
			
			unset($data_bom[0]); // ok jar..makasih .. oke
			$data = json_encode($data_bom);
			
			$this->rpc_service_portal->setSP("dbo.sp_production_plan_upload");	
			$this->rpc_service_portal->addField('data_production_plan',$data);
			$this->rpc_service_portal->addField('file_name',$inputFileName);
			$result = $this->rpc_service_portal->resultJSON();
			// echo "<pre>";
			// var_dump($result);
			
			$data = array();
			if(isset($result)){
				if(isset($result['valid'])){
					if($result['valid']){
						if(isset($result['data'])){
							$data_result = json_decode($result['data'],true);
							
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
			$return['message'] = $msg;
		}
		
		echo json_encode($return);
	}
}

?>