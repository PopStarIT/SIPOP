<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Bc_supply extends CI_Controller { 

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
	
	function contract_subcon_table() {
		$view = 'view_bc_supply';
		$get_field = $this->ecc_library->get_field($view);
		
		$get_field['r1']['hidden'] = true;
		
		
		
		$get_field['r3']['title'] = "Nomor Aju";
		$get_field['r3']['width'] = 250;
		
	
		
		return $get_field;
	}
	
	function index(){
		$this->load->model('main');
		$component['loadlayout'] = true;
		$component['view_load'] = 'subcon/subcon/view';
		$component['view_load_form'] = 'subcon/subcon/form';
		$component['load_js'][] = 'subcon/subcon/view';
		$component['load_js'][] = 'subcon/subcon/form';
		
		$component['page_title'] = "Monitoring Dokumen Supply";
		$dashboard_table = array();
		
		$nav_button = array();
		
		$field = $this->contract_subcon_table();
		
		$dashboard_table['nav_button'] = $nav_button;
		$dashboard_table['field'] = $field;
		
		$component['dashboard_table'] = $dashboard_table;
		
		$this->authentication->ajaxlayout($component);
	}
	
	function loaddata()
   {
		$this->authentication->plainlayout();
		
		$view = 'view_bc_supply';
		$field = $this->contract_subcon_table();
		
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
				
		$contract_subcon_id = isset($_POST['contract_subcon_id']) ? $_POST['contract_subcon_id'] : false;
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			
			if($contract_subcon_id){
				$this->rpc_service->setSP("dbo.sp_contract_subcon_approve");
				$this->rpc_service->addField('contract_subcon_id',$contract_subcon_id);
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
				
		$contract_subcon_id = isset($_POST['contract_subcon_id']) ? $_POST['contract_subcon_id'] : false;
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			
			if($contract_subcon_id){
				$this->rpc_service->setSP("dbo.sp_contract_subcon_cancel_approve");
				$this->rpc_service->addField('contract_subcon_id',$contract_subcon_id);
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
				
		$contract_subcon_id = isset($_POST['contract_subcon_id']) ? $_POST['contract_subcon_id'] : false;
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			
			if($contract_subcon_id){
				$this->rpc_service->setSP("dbo.sp_contract_subcon_delete");
				$this->rpc_service->addField('contract_subcon_id',$contract_subcon_id);
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
				
		$contract_subcon_id = isset($_POST['contract_subcon_id']) ? $_POST['contract_subcon_id'] : false;
		$contract_subcon_no = isset($_POST['contract_subcon_no']) ? $_POST['contract_subcon_no'] : '';
		$contract_subcon_date_start = isset($_POST['contract_subcon_date_start']) ? $_POST['contract_subcon_date_start'] : '';
		$partner_id = isset($_POST['partner_id']) ? $_POST['partner_id'] : '';
		$inv_gl_account_id = isset($_POST['inv_gl_account_id']) ? $_POST['inv_gl_account_id'] : '';
		$contract_subcon_type_id = isset($_POST['contract_subcon_type_id']) ? $_POST['contract_subcon_type_id'] : '';
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			
			if($contract_subcon_id){
				$this->rpc_service->setSP("dbo.sp_contract_subcon_edit");
				$this->rpc_service->addField('contract_subcon_id',$contract_subcon_id);
			} else {
				$this->rpc_service->setSP("dbo.sp_contract_subcon_add");
			}
					
			$this->rpc_service->addField('contract_subcon_no',$contract_subcon_no);
			$this->rpc_service->addField('contract_subcon_date_start',$contract_subcon_date_start);
			$this->rpc_service->addField('partner_id',$partner_id);
			$this->rpc_service->addField('inv_gl_account_id',$inv_gl_account_id);
			$this->rpc_service->addField('contract_subcon_type_id',$contract_subcon_type_id);
			
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