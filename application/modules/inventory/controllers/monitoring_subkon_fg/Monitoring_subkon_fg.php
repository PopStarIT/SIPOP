<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class monitoring_subkon_fg extends CI_Controller { 

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
	
	function monitoring_subkon_fg_table(){
		$field = array();
		$field['r61'] = array('sc' => 'r61','ctype' => 'text', 'bypassvalue' => '', 'title' => 'NOMOR CONTRACT');
		$field['r62'] = array('sc' => 'r62','ctype' => 'text', 'bypassvalue' => '', 'title' => 'SUBCON OUT');
		$field['r63'] = array('sc' => 'r63','ctype' => 'text', 'bypassvalue' => '', 'title' => 'SUBCON DATE');
		$field['r64'] = array('sc' => 'r64','ctype' => 'text', 'bypassvalue' => '', 'title' => 'PARTNER NAME');
		$field['r65'] = array('sc' => 'r65','ctype' => 'text', 'bypassvalue' => '', 'title' => 'ITEM CODE');
		$field['r66'] = array('sc' => 'r66','ctype' => 'text', 'bypassvalue' => '', 'title' => 'ITEM NAME');
		$field['r67'] = array('sc' => 'r67','ctype' => 'text', 'bypassvalue' => '', 'title' => 'QTY SUBCON OUT');
		$field['r68'] = array('sc' => 'r68','ctype' => 'text', 'bypassvalue' => '', 'title' => 'BC OUT NO');
		$field['r69'] = array('sc' => 'r69','ctype' => 'text', 'bypassvalue' => '', 'title' => 'BC OUT DATE');
		$field['r70'] = array('sc' => 'r70','ctype' => 'text', 'bypassvalue' => '', 'title' => 'NO DELIVERY');
		$field['r71'] = array('sc' => 'r71','ctype' => 'text', 'bypassvalue' => '', 'title' => 'TGL DELIVERY');
		$field['r72'] = array('sc' => 'r72','ctype' => 'text', 'bypassvalue' => '', 'title' => 'QTY DELIVERY');
		$field['r73'] = array('sc' => 'r73','ctype' => 'text', 'bypassvalue' => '', 'title' => 'CONVERSION');
		$field['r74'] = array('sc' => 'r74','ctype' => 'text', 'bypassvalue' => '', 'title' => 'QTY DELIVERY');
		$field['r75'] = array('sc' => 'r75','ctype' => 'text', 'bypassvalue' => '', 'title' => 'SUBCON IN');
		$field['r76'] = array('sc' => 'r76','ctype' => 'text', 'bypassvalue' => '', 'title' => 'SUBCON IN DATE');
		$field['r77'] = array('sc' => 'r77','ctype' => 'text', 'bypassvalue' => '', 'title' => 'QTY SUBCON');
		$field['r78'] = array('sc' => 'r78','ctype' => 'text', 'bypassvalue' => '', 'title' => 'BC IN NO');
		$field['r79'] = array('sc' => 'r79','ctype' => 'text', 'bypassvalue' => '', 'title' => 'BC IN DATE');
		$field['r80'] = array('sc' => 'r80','ctype' => 'text', 'bypassvalue' => '', 'title' => 'GRN NO');
		$field['r81'] = array('sc' => 'r81','ctype' => 'text', 'bypassvalue' => '', 'title' => 'GRN DATE');
		$field['r82'] = array('sc' => 'r82','ctype' => 'text', 'bypassvalue' => '', 'title' => 'QTY GRN');
		$field['r83'] = array('sc' => 'r83','ctype' => 'text', 'bypassvalue' => '', 'title' => 'CONVERSION');
		$field['r84'] = array('sc' => 'r84','ctype' => 'text', 'bypassvalue' => '', 'title' => 'QTY GRN');
		$field['r85'] = array('sc' => 'r85','ctype' => 'text', 'bypassvalue' => '', 'title' => 'OUTSTANDING');
		return $field;
	}
	
	function index(){
		$this->load->model('main');
		$component['loadlayout'] = true;
		$component['view_load'] = 'monitoring_subkon_fg/view';
		$component['load_js'][] = 'monitoring_subkon_fg/view';
		
		$component['page_title'] = "Monitoring Subcon FG";
		$dashboard_table = array();
	
		$field = $this->monitoring_subkon_fg_table();
		
		$dashboard_table['field'] = $field;
		
		$component['dashboard_table'] = $dashboard_table;
		
		$this->authentication->ajaxlayout($component);
	}
	
	function loaddata(){
		
		$field = $this->monitoring_subkon_fg_table();
		
		$date_start = isset($_REQUEST['date_start']) ?  $_REQUEST['date_start'] : '';
		$date_end = isset($_REQUEST['date_end']) ? $_REQUEST['date_end'] : '';
		$print = isset($_REQUEST['print']) ? $_REQUEST['print'] : 0;
		$format = isset($_REQUEST['format']) ? $_REQUEST['format'] : 'xlsx';
		$page = isset($_POST['page'])?$_POST['page']:1; // get the requested page 
		$rows = isset($_POST['rows'])?$_POST['rows']:10; // get how many rows we want to have into the grid 
		$sidx = isset($_POST['sidx'])?$_POST['sidx']:'r61'; // get index row - i.e. user click to sort 
		$sord = isset($_POST['sord'])?$_POST['sord']:'0'; // get the direction 
		$search = isset($_REQUEST['_search'])?$_REQUEST['_search']:false; 
		$filterRules =  isset($_POST['filters'])?$_POST['filters']:false;
				
		$limit =  $rows;
		$offset =  $rows * ($page - 1);
		
		$order = isset($_REQUEST['order']) ? $_REQUEST['order'] : array();
		
		if($sord == 'asc'){
			$sord = 1;
		} else {
			$sord = 2;
		}
		
		$sort =	$sidx. '='.$sord;	
				
		if(strlen(trim($date_start)) == 0 ){
			$date_start = '1900-01-01';
		}
		
		if(strlen(trim($date_end)) == 0 ){
			$date_end = '9999-12-31';
		}
		
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";	
				
				
		$sp = "dbo.sp_rpt_monitoring_subkon_fg";		
		if($print == 1){
			$this->rpc_service->setSP(array("sp"=> $sp,"mode"=> $print == 1 ? "2" : "1","debug"=>"1"));
		} else {
			$this->rpc_service->setSP($sp);
		}
		
		$this->rpc_service->addField('date_start',$date_start);
		$this->rpc_service->addField('date_end',$date_end);
		$this->rpc_service->addField('format',$format);
		$this->rpc_service->addField('temp_folder',sys_get_temp_dir());
		$this->rpc_service->addField('sort',$sort);
		$this->rpc_service->addField('limit',$limit);
		$this->rpc_service->addField('offset',$offset);
			
		$this->rpc_service->setWhere($search,$filterRules,$field);
		
		if($print == 1){
			
			$result = $this->rpc_service->resultPrint2();
			echo json_encode($result);
		} else {
			$this->authentication->plainlayout();
				
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
		
			echo json_encode($responce);
		}
	}
}

?>