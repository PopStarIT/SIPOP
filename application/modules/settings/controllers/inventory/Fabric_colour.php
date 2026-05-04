<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Fabric_colour extends CI_Controller { 

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
	
	function fabric_colour_table(){
		$view = 'view_fabric_colour';
		$get_field = $this->ecc_library->get_field_pop($view);
		
		$get_field['r3']['hidden'] = true;
		
		//$get_field['r2']['width'] = 120;
		//$get_field['r3']['width'] = 150;
		//$get_field['r4']['width'] = 180;
		//$get_field['r6']['width'] = 180;
		//$get_field['r9']['width'] = 170;
		//$get_field['r11']['width'] = 170;
				
		return $get_field;
	}
	
	function index(){
		$this->load->model('main');
		$component['loadlayout'] = true;
		$component['view_load'] = 'inventory/fabric_colour/view';
		//$component['view_load_form'] = 'inventory/fabric_colour/form';
		$component['load_js'][] = 'inventory/fabric_colour/view';
	//	$component['load_js'][] = 'inventory/fabric_colour/form';
		
		$component['page_title'] = 'Fabric Colour';
				
		$dashboard_table = array();
		
		$nav_button = array();
		$nav_button[] = array('method_id' => 7811140,'title' => 'Add', 'icon' => 'fa fa-plus', 'load' => 'inventory/fabric_colour/function_add');
		$nav_button[] = array('method_id' => 7811141,'title' => 'Edit', 'icon' => 'fa fa-pencil', 'load' => 'inventory/fabric_colour/function_edit');
		$nav_button[] = array('method_id' => 7811142,'title' => 'Delete', 'icon' => 'fa fa-trash-o', 'load' => 'inventory/fabric_colour/function_delete');
		
		$field = $this->fabric_colour_table();
		
		$dashboard_table['nav_button'] = $nav_button;
		$dashboard_table['field'] = $field;
		
		$component['dashboard_table'] = $dashboard_table;
		
		$this->authentication->ajaxlayout($component);
	}
	
	function loaddata(){
		$this->authentication->plainlayout();
		
		$view = 'view_fabric_colour';
		$field = $this->fabric_colour_table();
		
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";
 
		$loaddata = $this->ecc_library->get_field_data_pop($view,$field);
			
		echo $loaddata;
	}
}