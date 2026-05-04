<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Custom_import extends CI_Controller { 
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
	
	function custom_import_table() {
		$view = 'view_custom_import';
		$get_field = $this->ecc_library->get_field($view);
		
		$get_field['r1']['hidden'] = true;
		$get_field['r2']['hidden'] = true;
		$get_field['r3']['hidden'] = true;
		
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
		$get_field['r31']['hidden'] = true;
		$get_field['r32']['hidden'] = true;
		$get_field['r33']['hidden'] = true;
		$get_field['r34']['hidden'] = true;
		$get_field['r35']['hidden'] = true;
		$get_field['r36']['hidden'] = true;
		$get_field['r37']['hidden'] = true;
		$get_field['r38']['hidden'] = true;
		$get_field['r39']['hidden'] = true;
		$get_field['r40']['hidden'] = true;
		$get_field['r41']['hidden'] = true;
		$get_field['r42']['hidden'] = true;
		$get_field['r43']['hidden'] = true;
		$get_field['r44']['hidden'] = true;
		$get_field['r45']['hidden'] = true;
		$get_field['r46']['hidden'] = true;
		$get_field['r47']['hidden'] = true;
		$get_field['r48']['hidden'] = true;
		$get_field['r49']['hidden'] = true;
		$get_field['r50']['hidden'] = true;
		$get_field['r51']['hidden'] = true;
		$get_field['r52']['hidden'] = true;
		$get_field['r53']['hidden'] = true;
		$get_field['r54']['hidden'] = true;
		$get_field['r55']['hidden'] = true;
		$get_field['r56']['hidden'] = true;
		$get_field['r57']['hidden'] = true;
		$get_field['r58']['hidden'] = true;
		$get_field['r59']['hidden'] = true;
		$get_field['r60']['hidden'] = true;
		$get_field['r61']['hidden'] = true;
		$get_field['r62']['hidden'] = true;
		$get_field['r63']['hidden'] = true;
		$get_field['r64']['hidden'] = true;
		$get_field['r65']['hidden'] = true;
		$get_field['r66']['hidden'] = true;
		$get_field['r67']['hidden'] = true;
		$get_field['r68']['hidden'] = true;
		$get_field['r69']['hidden'] = true;
		$get_field['r70']['hidden'] = true;
		$get_field['r71']['hidden'] = true;
		$get_field['r72']['hidden'] = true;
		$get_field['r73']['hidden'] = true;
		$get_field['r73']['hidden'] = true;
		
		return $get_field;
	}
	
	function custom_import_detail_table() {
		$view = 'view_custom_import_detail';
		$get_field = $this->ecc_library->get_field($view);
		
		$get_field['r1']['hidden'] = true;
		$get_field['r2']['hidden'] = true;
		$get_field['r3']['hidden'] = true;
		//$get_field['r17']['hidden'] = true;
		$get_field['r18']['hidden'] = true;
		$get_field['r19']['hidden'] = true;
		$get_field['r20']['hidden'] = true;
		$get_field['r21']['hidden'] = true;
		$get_field['r22']['hidden'] = true;
		$get_field['r23']['hidden'] = true;
		$get_field['r24']['hidden'] = true;
		$get_field['r25']['hidden'] = true;
		$get_field['r26']['hidden'] = true;
		//$get_field['r27']['hidden'] = true;
		$get_field['r28']['hidden'] = true;
		$get_field['r29']['hidden'] = true;
		//$get_field['r30']['hidden'] = true;
		$get_field['r31']['hidden'] = true;
		$get_field['r32']['hidden'] = true;
		$get_field['r33']['hidden'] = true;
		$get_field['r34']['hidden'] = true;
		$get_field['r35']['hidden'] = true;
		$get_field['r36']['hidden'] = true;
		// $get_field['r14']['hidden'] = true;
		// $get_field['r15']['hidden'] = true;
		// $get_field['r16']['hidden'] = true;
		// $get_field['r17']['hidden'] = true;
		// $get_field['r18']['hidden'] = true;
		// $get_field['r19']['hidden'] = true;
		
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
	
	function custom_import_document_table() {
		$view = 'view_custom_ceisa_document';
		$get_field = $this->ecc_library->get_field($view);
		
		$get_field['r1']['hidden'] = true;
		$get_field['r2']['hidden'] = true;
		$get_field['r3']['hidden'] = true;
		$get_field['r4']['hidden'] = true;
		$get_field['r5']['hidden'] = true;
		$get_field['r6']['hidden'] = true;
		
		
		$get_field['act']['sc'] = 'act';
		$get_field['act']['title'] = '#';
		$get_field['act']['bypassvalue'] = '';
		$get_field['act']['ctype'] = 'text';
		$get_field['act']['align'] = 'center';
		$get_field['act']['search'] = false;
		$get_field['act']['sortable'] = false;
		$get_field['act']['formatter'] = 'formatOperations_custom_document';
		$get_field['act']['width'] = 300;
		
		return $get_field;
	}
	
	function custom_import_packaging_table() {
		$view = 'view_custom_ceisa_kemasan';
		$get_field = $this->ecc_library->get_field($view);
		
		$get_field['r1']['hidden'] = true;
		$get_field['r2']['hidden'] = true;
		$get_field['r3']['hidden'] = true;
		$get_field['r4']['hidden'] = true;
		$get_field['r5']['hidden'] = true;
		$get_field['r8']['hidden'] = true;
		
		$get_field['act']['sc'] = 'act';
		$get_field['act']['title'] = '#';
		$get_field['act']['bypassvalue'] = '';
		$get_field['act']['ctype'] = 'text';
		$get_field['act']['align'] = 'center';
		$get_field['act']['search'] = false;
		$get_field['act']['sortable'] = false;
		$get_field['act']['formatter'] = 'formatOperations_custom_kemasan';
		$get_field['act']['width'] = 300;
		
		return $get_field;
	}
	
	function custom_import_container_table() {
		$view = 'view_custom_ceisa_kontainer';
		$get_field = $this->ecc_library->get_field($view);
		
		$get_field['r1']['hidden'] = true;
		$get_field['r2']['hidden'] = true;
		$get_field['r3']['hidden'] = true;
		$get_field['r4']['hidden'] = true;
		$get_field['r5']['hidden'] = true;
		$get_field['r6']['hidden'] = true;
		$get_field['r7']['hidden'] = true;
		
		$get_field['act']['sc'] = 'act';
		$get_field['act']['title'] = '#';
		$get_field['act']['bypassvalue'] = '';
		$get_field['act']['ctype'] = 'text';
		$get_field['act']['align'] = 'center';
		$get_field['act']['search'] = false;
		$get_field['act']['sortable'] = false;
		$get_field['act']['formatter'] = 'formatOperations_custom_kontainer';
		$get_field['act']['width'] = 300;
		
		return $get_field;
	}
	
	function index(){
		$this->load->model('main');
		$component['loadlayout'] = true;
		$component['view_load'] = 'custom_import/view';
		$component['view_load_form'] = 'custom_import/form';
		$component['load_js'][] = 'custom_import/view';
		$component['load_js'][] = 'custom_import/form';
				
		$dashboard_table = array();
		
		$nav_button = array();
		$nav_button[] = array('method_id' => 141,'title' => 'Add', 'icon' => 'fa fa-plus', 'load' => 'custom_import/function_add');
		$nav_button[] = array('method_id' => 149,'title' => 'Add From Request', 'icon' => 'fa fa-plus', 'load' => 'custom_import/function_add_from_request');
		$nav_button[] = array('method_id' => 142,'title' => 'Edit', 'icon' => 'fa fa-pencil', 'load' => 'custom_import/function_edit');
		$nav_button[] = array('method_id' => 144,'title' => 'Approve', 'icon' => 'fa fa-check', 'load' => 'custom_import/function_approve');
		$nav_button[] = array('method_id' => 143,'title' => 'Delete', 'icon' => 'fa fa-trash-o', 'load' => 'custom_import/function_delete');
		
		$field = $this->custom_import_table();
		
		$dashboard_table['nav_button'] = $nav_button;
		$dashboard_table['field'] = $field;
		
		$component['dashboard_table'] = $dashboard_table;
		
		$this->authentication->ajaxlayout($component);
	}
	
	function bc20(){
		$this->load->model('main');
		$custom_type_id = 1;
		
		$component['loadlayout'] = true;
		
		$component['view_load'] = 'custom_import/view';
		$component['view_load_form'] = 'custom_import/form';
		$component['load_js'][] = 'custom_import/view';
		$component['load_js'][] = 'custom_import/form';
		
		
		$component['custom_type_id'] = $custom_type_id;
		$component['search_param'] = 'custom_type_id';
		$component['search_param_value'] = $custom_type_id;
		$component['page_title'] = 'BC 2.0';
		
		$dashboard_table = array();
		
		$nav_button = array();
		$nav_button[] = array('method_id' => 172,'title' => 'New', 'icon' => 'fa fa-plus', 'load' => 'custom_import/function_add');
		$nav_button[] = array('method_id' => 179,'title' => 'New From Proforma', 'icon' => 'fa fa-plus', 'load' => 'custom_import/function_add_from_performa');
		$nav_button[] = array('method_id' => 180,'title' => 'New From Purchase', 'icon' => 'fa fa-plus', 'load' => 'custom_import/function_add_from_purchase');
		$nav_button[] = array('method_id' => 173,'title' => 'Edit', 'icon' => 'fa fa-pencil', 'load' => 'custom_import/function_edit');
		$nav_button[] = array('method_id' => 401041,'title' => 'Preview', 'icon' => 'fa fa-print', 'load' => 'custom_import/function_ceisa40_preview');
		$nav_button[] = array('method_id' => 175,'title' => 'Approve', 'icon' => 'fa fa-pencil', 'load' => 'custom_import/function_approve');
		$nav_button[] = array('method_id' => 746,'title' => 'Cancel Approve', 'icon' => 'fa fa-exclamation', 'load' => 'custom_import/function_cancel_approve');
		//$nav_button[] = array('method_id' => 401004,'title' => 'Login Ceisa', 'icon' => 'fa fa-user', 'load' => 'custom_import/function_ceisa40_login_mdl');
		//$nav_button[] = array('method_id' => 401009,'title' => 'Send To Ceisa (Draft)', 'icon' => 'fa fa-unlock', 'load' => 'custom_import/function_ceisa40_bc20_send');
		//$nav_button[] = array('method_id' => 401016,'title' => 'Send To Ceisa (IsFinal)', 'icon' => 'fa fa-lock', 'load' => 'custom_import/function_ceisa40_bc20_send_isfinal');
		//$nav_button[] = array('method_id' => 401006,'title' => 'Get Respon', 'icon' => 'fa fa-download', 'load' => 'custom_import/function_ceisa_get_respon');
		//$nav_button[] = array('method_id' => 401010,'title' => 'Print Respon', 'icon' => 'fa fa-print', 'load' => 'custom_import/function_ceisa_print_respon');
		//$nav_button[] = array('method_id' => 671,'title' => 'Send To TPB Ceisa', 'icon' => 'fa fa-upload', 'load' => 'custom_import/function_ceisa_send');
		//$nav_button[] = array('method_id' => 672,'title' => 'Get Register No', 'icon' => 'fa fa-download', 'load' => 'custom_import/function_ceisa_get_respon');
		//$nav_button[] = array('method_id' => 673,'title' => 'Cancel Send', 'icon' => 'fa fa-cross', 'load' => 'custom_import/function_ceisa_cancel_send');
		$nav_button[] = array('method_id' => 187,'title' => 'Delete', 'icon' => 'fa fa-trash-o', 'load' => 'custom_import/function_delete'); 
		
		
		//--button dowpdown tambahan
		$button_aja = array();
		$child=array();
		$child[]=array('method_id' => 401004,'title' => 'Login Ceisa', 'icon' => 'fa fa-angle-double-right', 'load' => 'custom_import/function_ceisa40_login_mdl');
		$child[]=array('method_id' => 401009,'title' => 'Send To Ceisa (Draft)', 'icon' => 'fa fa-angle-double-right','load' => 'custom_import/function_ceisa40_bc20_send');
		$child[]=array('method_id' => 401016,'title' => 'Send To Ceisa (Is Final)', 'icon' => 'fa fa-angle-double-right','load' => 'custom_import/function_ceisa40_bc20_send_isfinal');
		$child[]=array('method_id' => 401006,'title' => 'Get Respon', 'icon' => 'fa fa-angle-double-right', 'load' => 'custom_import/function_ceisa_get_respon');
		$child[]=array('method_id' => 401017,'title' => 'Log Respon', 'icon' => 'fa fa-angle-double-right', 'load' => 'custom_import/function_ceisa40_log_mdl');
		$button_aja[] = array('method_id' => 187,'title' => 'Ceisa40   ', 'icon' => 'fa fa-paper-plane', 'child' =>$child );
		//----
		
		$field = $this->custom_import_table();
		$field_detail = $this->custom_import_detail_table();
		$field_document = $this->custom_import_document_table();
		$field_packaging = $this->custom_import_packaging_table();
		$field_contanier = $this->custom_import_container_table();
		
		$dashboard_table['dropdown_button'] = $button_aja;
		$dashboard_table['nav_button'] = $nav_button;
		$dashboard_table['field'] = $field;
		
		$dashboard_table['field_detail'] = $field_detail;
		$dashboard_table['field_document'] = $field_document;
		$dashboard_table['field_packaging'] = $field_packaging;
		$dashboard_table['field_contanier'] = $field_contanier;
		
		$dashboard_table['field_detail_loaddata'] = 'loaddata_detail';
		$dashboard_table['field_document_loaddata'] = 'loaddata_document';
		$dashboard_table['field_packaging_loaddata'] = 'loaddata_packaging';
		$dashboard_table['field_container_loaddata'] = 'loaddata_container';
		
		$extra_data = array();
		$extra_data['custom_type_id'] = $custom_type_id;
		$dashboard_table['extra_data'] = $extra_data;
		
		$component['dashboard_table'] = $dashboard_table;
		
		$this->authentication->ajaxlayout($component);
	}
	
	function bc23(){
		$this->load->model('main');
		$custom_type_id = 2;
		
		$component['loadlayout'] = true;
		
		$component['view_load'] = 'custom_import/view';
		$component['view_load_form'] = 'custom_import/form';
		$component['load_js'][] = 'custom_import/view';
		$component['load_js'][] = 'custom_import/form';
		
		
		$component['custom_type_id'] = $custom_type_id;
		$component['search_param'] = 'custom_type_id';
		$component['search_param_value'] = $custom_type_id;
		$component['page_title'] = 'BC 2.3';
		
		$dashboard_table = array();
		
		$nav_button = array();
		$nav_button[] = array('method_id' => 185,'title' => 'New', 'icon' => 'fa fa-plus', 'load' => 'custom_import/function_add');
		$nav_button[] = array('method_id' => 189,'title' => 'From Proforma', 'icon' => 'fa fa-plus', 'load' => 'custom_import/function_add_from_performa');
		//$nav_button[] = array('method_id' => 196,'title' => 'New From Purchase', 'icon' => 'fa fa-plus', 'load' => 'custom_import/function_add_from_purchase');
		$nav_button[] = array('method_id' => 593,'title' => 'From Contract Subcon', 'icon' => 'fa fa-plus', 'load' => 'custom_import/function_add_from_contract_subcon');
		//$nav_button[] = array('method_id' => 401043,'title' => 'Copy Data', 'icon' => 'fa fa-copy', 'load' => 'custom_import/function_copy_doc');
		$nav_button[] = array('method_id' => 186,'title' => 'Edit', 'icon' => 'fa fa-pencil', 'load' => 'custom_import/function_edit');
		$nav_button[] = array('method_id' => 401041,'title' => 'Preview', 'icon' => 'fa fa-print', 'load' => 'custom_import/function_ceisa40_preview');
		$nav_button[] = array('method_id' => 188,'title' => 'Approve', 'icon' => 'fa fa-pencil', 'load' => 'custom_import/function_approve');
		$nav_button[] = array('method_id' => 747,'title' => 'Cancel Approve', 'icon' => 'fa fa-exclamation', 'load' => 'custom_import/function_cancel_approve');
		//$nav_button[] = array('method_id' => 401005,'title' => 'Send To Ceisa (Draft)', 'icon' => 'fa fa-unlock', 'load' => 'custom_import/function_ceisa40_send');
		//$nav_button[] = array('method_id' => 401014,'title' => 'Send To Ceisa (IsFinal)', 'icon' => 'fa fa-lock', 'load' => 'custom_import/function_ceisa40_send_isfinal');
		//$nav_button[] = array('method_id' => 401006,'title' => 'Get Respon', 'icon' => 'fa fa-download', 'load' => 'custom_import/function_ceisa_get_respon');
		//$nav_button[] = array('method_id' => 401010,'title' => 'Print Respon', 'icon' => 'fa fa-print', 'load' => 'custom_import/function_ceisa_print_respon');
		
		//$nav_button[] = array('method_id' => 671,'title' => 'Send To TPB Ceisa', 'icon' => 'fa fa-upload', 'load' => 'custom_import/function_ceisa_send');
		//$nav_button[] = array('method_id' => 672,'title' => 'Get Register No', 'icon' => 'fa fa-download', 'load' => 'custom_import/function_ceisa_get_respon');
		//$nav_button[] = array('method_id' => 673,'title' => 'Cancel Send', 'icon' => 'fa fa-cross', 'load' => 'custom_import/function_ceisa_cancel_send');
		$nav_button[] = array('method_id' => 187,'title' => 'Delete', 'icon' => 'fa fa-trash-o', 'load' => 'custom_import/function_delete');
		
		//--button dowpdown tambahan
		$button_aja = array();
		$child=array();
		//$child[]=array('method_id' => 401004,'title' => 'Login Ceisa', 'icon' => 'fa fa-angle-double-right', 'load' => 'custom_import/function_ceisa40_login_mdl');
		$child[]=array('method_id' => 401005,'title' => 'Send To Ceisa (Draft)', 'icon' => 'fa fa-angle-double-right','load' => 'custom_import/function_ceisa40_send');
		$child[]=array('method_id' => 401014,'title' => 'Send To Ceisa (Is Final)', 'icon' => 'fa fa-angle-double-right','load' => 'custom_import/function_ceisa40_send_isfinal');
		$child[]=array('method_id' => 401006,'title' => 'Get Respon', 'icon' => 'fa fa-angle-double-right', 'load' => 'custom_import/function_ceisa_get_respon');
		$child[]=array('method_id' => 401017,'title' => 'Log Respon', 'icon' => 'fa fa-angle-double-right', 'load' => 'custom_import/function_ceisa40_log_mdl');
		$button_aja[] = array('method_id' => 187,'title' => 'Ceisa40   ', 'icon' => 'fa fa-paper-plane', 'child' =>$child );
		//----
		
		$field = $this->custom_import_table();
		$field_detail = $this->custom_import_detail_table();
		$field_document = $this->custom_import_document_table();
		$field_packaging = $this->custom_import_packaging_table();
		$field_contanier = $this->custom_import_container_table();
		
		$dashboard_table['dropdown_button'] = $button_aja;
		$dashboard_table['nav_button'] = $nav_button;
		$dashboard_table['field'] = $field;
		
		$dashboard_table['field_detail'] = $field_detail;
		$dashboard_table['field_document'] = $field_document;
		$dashboard_table['field_packaging'] = $field_packaging;
		$dashboard_table['field_contanier'] = $field_contanier;
		
		$dashboard_table['field_detail_loaddata'] = 'loaddata_detail';
		$dashboard_table['field_document_loaddata'] = 'loaddata_document';
		$dashboard_table['field_packaging_loaddata'] = 'loaddata_packaging';
		$dashboard_table['field_container_loaddata'] = 'loaddata_container';
		
		$extra_data = array();
		$extra_data['custom_type_id'] = $custom_type_id;
		$dashboard_table['extra_data'] = $extra_data;
		
		$component['dashboard_table'] = $dashboard_table;
		
		$this->authentication->ajaxlayout($component);
	}
	
	function bc262(){
		$this->load->model('main');
		$custom_type_id = 3;
		
		$component['loadlayout'] = true;
		
		$component['view_load'] = 'custom_import/view';
		$component['view_load_form'] = 'custom_import/form';
		$component['load_js'][] = 'custom_import/view';
		$component['load_js'][] = 'custom_import/form';
		
		
		$component['custom_type_id'] = $custom_type_id;
		$component['search_param'] = 'custom_type_id';
		$component['search_param_value'] = $custom_type_id;
		$component['page_title'] = 'BC 2.6.2';
		
		$dashboard_table = array();
		
		$nav_button = array();
		$nav_button[] = array('method_id' => 191,'title' => 'New', 'icon' => 'fa fa-plus', 'load' => 'custom_import/function_add');
		$nav_button[] = array('method_id' => 195,'title' => 'From Proforma', 'icon' => 'fa fa-plus', 'load' => 'custom_import/function_add_from_performa');
		// $nav_button[] = array('method_id' => 196,'title' => 'New From Purchase', 'icon' => 'fa fa-plus', 'load' => 'custom_import/function_add_from_purchase');
		$nav_button[] = array('method_id' => 593,'title' => 'From Contract Subcon', 'icon' => 'fa fa-plus', 'load' => 'custom_import/function_add_from_contract_subcon');
		$nav_button[] = array('method_id' => 192,'title' => 'Edit', 'icon' => 'fa fa-pencil', 'load' => 'custom_import/function_edit');
		$nav_button[] = array('method_id' => 401041,'title' => 'Preview', 'icon' => 'fa fa-print', 'load' => 'custom_import/function_ceisa40_preview');
		//$nav_button[] = array('method_id' => 193,'title' => 'Delete', 'icon' => 'fa fa-trash-o', 'load' => 'custom_import/function_delete');
		$nav_button[] = array('method_id' => 194,'title' => 'Approve', 'icon' => 'fa fa-pencil', 'load' => 'custom_import/function_approve');
		$nav_button[] = array('method_id' => 748,'title' => 'Cancel Approve', 'icon' => 'fa fa-exclamation', 'load' => 'custom_import/function_cancel_approve');
		//$nav_button[] = array('method_id' => 401004,'title' => 'Login Ceisa', 'icon' => 'fa fa-user', 'load' => 'custom_import/function_ceisa40_login_mdl');
		//$nav_button[] = array('method_id' => 401005,'title' => 'Send To Ceisa (Draft)', 'icon' => 'fa fa-unlock', 'load' => 'custom_import/function_ceisa40_send');
		//$nav_button[] = array('method_id' => 401014,'title' => 'Send To Ceisa (IsFinal)', 'icon' => 'fa fa-lock', 'load' => 'custom_import/function_ceisa40_send_isfinal');
		//$nav_button[] = array('method_id' => 401006,'title' => 'Get Respon', 'icon' => 'fa fa-download', 'load' => 'custom_import/function_ceisa_get_respon');
		//$nav_button[] = array('method_id' => 671,'title' => 'Send To TPB Ceisa', 'icon' => 'fa fa-upload', 'load' => 'custom_import/function_ceisa_send');
		//$nav_button[] = array('method_id' => 672,'title' => 'Get Register No', 'icon' => 'fa fa-download', 'load' => 'custom_import/function_ceisa_get_respon');
		//$nav_button[] = array('method_id' => 673,'title' => 'Cancel Send', 'icon' => 'fa fa-cross', 'load' => 'custom_import/function_ceisa_cancel_send');
		$nav_button[] = array('method_id' => 187,'title' => 'Delete', 'icon' => 'fa fa-trash-o', 'load' => 'custom_import/function_delete');
		
		//--button dowpdown tambahan
		$button_aja = array();
		$child=array();
		//$child[]=array('method_id' => 401004,'title' => 'Login Ceisa', 'icon' => 'fa fa-angle-double-right', 'load' => 'custom_import/function_ceisa40_login_mdl');
		$child[]=array('method_id' => 401005,'title' => 'Send To Ceisa (Draft)', 'icon' => 'fa fa-angle-double-right','load' => 'custom_import/function_ceisa40_send');
		$child[]=array('method_id' => 401014,'title' => 'Send To Ceisa (Is Final)', 'icon' => 'fa fa-angle-double-right','load' => 'custom_import/function_ceisa40_send_isfinal');
		$child[]=array('method_id' => 401006,'title' => 'Get Respon', 'icon' => 'fa fa-angle-double-right', 'load' => 'custom_import/function_ceisa_get_respon');
		$child[]=array('method_id' => 401017,'title' => 'Log Respon', 'icon' => 'fa fa-angle-double-right', 'load' => 'custom_import/function_ceisa40_log_mdl');
		$button_aja[] = array('method_id' => 187,'title' => 'Ceisa40   ', 'icon' => 'fa fa-paper-plane', 'child' =>$child );
		//----
		
		$field = $this->custom_import_table();
		$field_detail = $this->custom_import_detail_table();
		$field_document = $this->custom_import_document_table();
		$field_packaging = $this->custom_import_packaging_table();
		$field_contanier = $this->custom_import_container_table();
		
		$dashboard_table['dropdown_button'] = $button_aja;
		$dashboard_table['nav_button'] = $nav_button;
		$dashboard_table['field'] = $field;
		
		$dashboard_table['field_detail'] = $field_detail;
		$dashboard_table['field_document'] = $field_document;
		$dashboard_table['field_packaging'] = $field_packaging;
		$dashboard_table['field_contanier'] = $field_contanier;
		
		$dashboard_table['field_detail_loaddata'] = 'loaddata_detail';
		$dashboard_table['field_document_loaddata'] = 'loaddata_document';
		$dashboard_table['field_packaging_loaddata'] = 'loaddata_packaging';
		$dashboard_table['field_container_loaddata'] = 'loaddata_container';
		
		$extra_data = array();
		$extra_data['custom_type_id'] = $custom_type_id;
		$dashboard_table['extra_data'] = $extra_data;
		
		$component['dashboard_table'] = $dashboard_table;
		
		$this->authentication->ajaxlayout($component);
	}
	
	function bc27(){
		$this->load->model('main');
		$custom_type_id = 4;
		
		$component['loadlayout'] = true;
		
		$component['view_load'] = 'custom_import/view';
		$component['view_load_form'] = 'custom_import/form';
		$component['load_js'][] = 'custom_import/view';
		$component['load_js'][] = 'custom_import/form';
		
		
		$component['custom_type_id'] = $custom_type_id;
		$component['search_param'] = 'custom_type_id';
		$component['search_param_value'] = $custom_type_id;
		$component['page_title'] = 'BC 2.7';
		
		$dashboard_table = array();
		
		$nav_button = array();
		$nav_button[] = array('method_id' => 197,'title' => 'New', 'icon' => 'fa fa-plus', 'load' => 'custom_import/function_add');
		$nav_button[] = array('method_id' => 201,'title' => 'From Proforma', 'icon' => 'fa fa-plus', 'load' => 'custom_import/function_add_from_performa');
		// $nav_button[] = array('method_id' => 202,'title' => 'New From Purchase', 'icon' => 'fa fa-plus', 'load' => 'custom_import/function_add_from_purchase');
		$nav_button[] = array('method_id' => 670,'title' => 'From Contract Subcon', 'icon' => 'fa fa-plus', 'load' => 'custom_import/function_add_from_contract_subcon');
		$nav_button[] = array('method_id' => 198,'title' => 'Edit', 'icon' => 'fa fa-pencil', 'load' => 'custom_import/function_edit');
		$nav_button[] = array('method_id' => 199,'title' => 'Delete', 'icon' => 'fa fa-trash-o', 'load' => 'custom_import/function_delete');
		$nav_button[] = array('method_id' => 200,'title' => 'Approve', 'icon' => 'fa fa-pencil', 'load' => 'custom_import/function_approve');
		$nav_button[] = array('method_id' => 749,'title' => 'Cancel Approve', 'icon' => 'fa fa-exclamation', 'load' => 'custom_import/function_cancel_approve');
		
		$field = $this->custom_import_table();
		$field_detail = $this->custom_import_detail_table();
		$field_document = $this->custom_import_document_table();
		$field_packaging = $this->custom_import_packaging_table();
		$field_contanier = $this->custom_import_container_table();
		
		
		$dashboard_table['nav_button'] = $nav_button;
		$dashboard_table['field'] = $field;
		
		$dashboard_table['field_detail'] = $field_detail;
		$dashboard_table['field_document'] = $field_document;
		$dashboard_table['field_packaging'] = $field_packaging;
		$dashboard_table['field_contanier'] = $field_contanier;
		
		$dashboard_table['field_detail_loaddata'] = 'loaddata_detail';
		$dashboard_table['field_document_loaddata'] = 'loaddata_document';
		$dashboard_table['field_packaging_loaddata'] = 'loaddata_packaging';
		$dashboard_table['field_container_loaddata'] = 'loaddata_container';
		
		$extra_data = array();
		$extra_data['custom_type_id'] = $custom_type_id;
		$dashboard_table['extra_data'] = $extra_data;
		
		$component['dashboard_table'] = $dashboard_table;
		
		$this->authentication->ajaxlayout($component);
	}
	
	function bc40(){
		$this->load->model('main');
		$custom_type_id = 5;
		
		$component['loadlayout'] = true;
		
		$component['view_load'] = 'custom_import/view';
		$component['view_load_form'] = 'custom_import/form';
		$component['load_js'][] = 'custom_import/view';
		$component['load_js'][] = 'custom_import/form';
		
		
		$component['custom_type_id'] = $custom_type_id;
		$component['search_param'] = 'custom_type_id';
		$component['search_param_value'] = $custom_type_id;
		$component['page_title'] = 'BC 4.0';
		
		$dashboard_table = array();
		
		$nav_button = array();
		$nav_button[] = array('method_id' => 203,'title' => 'New', 'icon' => 'fa fa-plus', 'load' => 'custom_import/function_add');
		$nav_button[] = array('method_id' => 207,'title' => 'From Proforma', 'icon' => 'fa fa-plus', 'load' => 'custom_import/function_add_from_performa');
		$nav_button[] = array('method_id' => 798,'title' => 'From Contract Subcon', 'icon' => 'fa fa-plus', 'load' => 'custom_import/function_add_from_contract_subcon');
		$nav_button[] = array('method_id' => 204,'title' => 'Edit', 'icon' => 'fa fa-pencil', 'load' => 'custom_import/function_edit');
		$nav_button[] = array('method_id' => 401041,'title' => 'Preview', 'icon' => 'fa fa-print', 'load' => 'custom_import/function_ceisa40_preview');
		$nav_button[] = array('method_id' => 205,'title' => 'Delete', 'icon' => 'fa fa-trash-o', 'load' => 'custom_import/function_delete');
		$nav_button[] = array('method_id' => 206,'title' => 'Approve', 'icon' => 'fa fa-pencil', 'load' => 'custom_import/function_approve');
		$nav_button[] = array('method_id' => 750,'title' => 'Cancel Approve', 'icon' => 'fa fa-exclamation', 'load' => 'custom_import/function_cancel_approve');
		//$nav_button[] = array('method_id' => 401004,'title' => 'Login Ceisa', 'icon' => 'fa fa-user', 'load' => 'custom_import/function_ceisa40_login_mdl');
		//$nav_button[] = array('method_id' => 401008,'title' => 'Send To Ceisa (Draft)', 'icon' => 'fa fa-upload', 'load' => 'custom_import/function_ceisa40_bc40_send');
		//$nav_button[] = array('method_id' => 401015,'title' => 'Send To Ceisa (IsFinal)', 'icon' => 'fa fa-upload', 'load' => 'custom_import/function_ceisa40_bc40_send_isfinal');
		//$nav_button[] = array('method_id' => 401006,'title' => 'Get Respon', 'icon' => 'fa fa-download', 'load' => 'custom_import/function_ceisa_get_respon');
		//$nav_button[] = array('method_id' => 671,'title' => 'Send To TPB Ceisa', 'icon' => 'fa fa-upload', 'load' => 'custom_import/function_ceisa_send');
		//$nav_button[] = array('method_id' => 672,'title' => 'Get Register No', 'icon' => 'fa fa-download', 'load' => 'custom_import/function_ceisa_get_respon');
		//$nav_button[] = array('method_id' => 673,'title' => 'Cancel Send', 'icon' => 'fa fa-cross', 'load' => 'custom_import/function_ceisa_cancel_send');
		$nav_button[] = array('method_id' => 187,'title' => 'Delete', 'icon' => 'fa fa-trash-o', 'load' => 'custom_import/function_delete');
		
		//--button dowpdown tambahan
		$button_aja = array();
		$child=array();
		//$child[]=array('method_id' => 401004,'title' => 'Login Ceisa', 'icon' => 'fa fa-angle-double-right', 'load' => 'custom_import/function_ceisa40_login_mdl');
		$child[]=array('method_id' => 401008,'title' => 'Send To Ceisa (Draft)', 'icon' => 'fa fa-angle-double-right','load' => 'custom_import/function_ceisa40_bc40_send');
		$child[]=array('method_id' => 401015,'title' => 'Send To Ceisa (Is Final)', 'icon' => 'fa fa-angle-double-right','load' => 'custom_import/function_ceisa40_bc40_send_isfinal');
		$child[]=array('method_id' => 401006,'title' => 'Get Respon', 'icon' => 'fa fa-angle-double-right', 'load' => 'custom_import/function_ceisa_get_respon');
		$child[]=array('method_id' => 401017,'title' => 'Log Respon', 'icon' => 'fa fa-angle-double-right', 'load' => 'custom_import/function_ceisa40_log_mdl');
		$button_aja[] = array('method_id' => 187,'title' => 'Ceisa40   ', 'icon' => 'fa fa-paper-plane', 'child' =>$child );
		//----
		
		$field = $this->custom_import_table();
		$field_detail = $this->custom_import_detail_table();
		$field_document = $this->custom_import_document_table();
		$field_packaging = $this->custom_import_packaging_table();
		$field_contanier = $this->custom_import_container_table();
		
		$dashboard_table['dropdown_button'] = $button_aja;
		$dashboard_table['nav_button'] = $nav_button;
		$dashboard_table['field'] = $field;
		$dashboard_table['field_detail'] = $field_detail;
		$dashboard_table['field_document'] = $field_document;
		$dashboard_table['field_packaging'] = $field_packaging;
		$dashboard_table['field_contanier'] = $field_contanier;
		
		$dashboard_table['field_detail_loaddata'] = 'loaddata_detail';
		$dashboard_table['field_document_loaddata'] = 'loaddata_document';
		$dashboard_table['field_packaging_loaddata'] = 'loaddata_packaging';
		$dashboard_table['field_container_loaddata'] = 'loaddata_container';
		
		$extra_data = array();
		$extra_data['custom_type_id'] = $custom_type_id;
		$dashboard_table['extra_data'] = $extra_data;
		
		$component['dashboard_table'] = $dashboard_table;
		
		$this->authentication->ajaxlayout($component);
	}
	
	function loaddata() {
		$this->authentication->plainlayout();
		
		$custom_type_id = isset($_REQUEST['custom_type_id']) ? is_numeric($_REQUEST['custom_type_id']) ? $_REQUEST['custom_type_id']  : -1 : -1;
		
		$view = 'view_custom_import';
		$field = $this->custom_import_table();
		
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";
 
		$extra_param = array();
		$extra_param['where']['0']['field'] = 'r2';
		$extra_param['where']['0']['data'] = $custom_type_id;
		
		$loaddata = $this->ecc_library->get_field_data($view,$field,$extra_param);
			
		echo $loaddata;
	}
		
	function approve(){
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
				
		$bc_in_header_id = isset($_POST['bc_in_header_id']) ? $_POST['bc_in_header_id'] : false;
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			
			if($bc_in_header_id){
				$this->rpc_service->setSP("dbo.sp_custom_import_approve");
				$this->rpc_service->addField('bc_in_header_id',$bc_in_header_id);
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
				
		$bc_in_header_id = isset($_POST['bc_in_header_id']) ? $_POST['bc_in_header_id'] : false;
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			
			if($bc_in_header_id){
				$this->rpc_service->setSP("dbo.sp_custom_import_cancel_approve");
				$this->rpc_service->addField('bc_in_header_id',$bc_in_header_id);
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
				
		$bc_in_header_id = isset($_POST['bc_in_header_id']) ? $_POST['bc_in_header_id'] : false;
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			
			if($bc_in_header_id){
				$this->rpc_service->setSP("dbo.sp_custom_import_delete");
				$this->rpc_service->addField('bc_in_header_id',$bc_in_header_id);
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
				
		$bc_in_header_id = isset($_POST['bc_in_header_id']) ? $_POST['bc_in_header_id'] : '';
		$custom_type_id = isset($_POST['custom_type_id']) ? $_POST['custom_type_id'] : '';
		$bc_in_type_id = isset($_POST['bc_in_type_id']) ? $_POST['bc_in_type_id'] : '';
		$car = isset($_POST['car']) ? $_POST['car'] : '';
		$bc_no = isset($_POST['bc_no']) ? $_POST['bc_no'] : '';
		$bc_date = isset($_POST['bc_date']) ? $_POST['bc_date'] : '';
		$partner_id = isset($_POST['partner_id']) ? $_POST['partner_id'] : '';
		$currencies_id = isset($_POST['currencies_id']) ? $_POST['currencies_id'] : '';
		$purchase_performa_id = isset($_POST['purchase_performa_id']) ? $_POST['purchase_performa_id'] : '';
		$purchase_order_id = isset($_POST['purchase_order_id']) ? $_POST['purchase_order_id'] : '';
		$contract_subcon = isset($_POST['contract_subcon']) ? $_POST['contract_subcon'] : '';
		
		$bongkar_port_id = isset($_POST['bongkar_port_id']) ? $_POST['bongkar_port_id'] : '';
		$bongkar_kppbc_id = isset($_POST['bongkar_kppbc_id']) ? $_POST['bongkar_kppbc_id'] : '';
		$tujuan_tpb_id = isset($_POST['tujuan_tpb_id']) ? $_POST['tujuan_tpb_id'] : '';
		$jenis_tpb_id = isset($_POST['jenis_tpb_id']) ? $_POST['jenis_tpb_id'] : '';
		$tujuan_pengiriman_id = isset($_POST['tujuan_pengiriman_id']) ? $_POST['tujuan_pengiriman_id'] : '';
		$tujuan_pemasukan_id = isset($_POST['tujuan_pemasukan_id']) ? $_POST['tujuan_pemasukan_id'] : '';
		$pjt_status_id = isset($_POST['pjt_status_id']) ? $_POST['pjt_status_id'] : '';
		$cara_angkut_id = isset($_POST['cara_angkut_id']) ? $_POST['cara_angkut_id'] : '';
		$nama_pengangkut = isset($_POST['nama_pengangkut']) ? $_POST['nama_pengangkut'] : false;
		$nama_pengangkut2 = isset($_POST['nama_pengangkut2']) ? $_POST['nama_pengangkut2'] : '';
		
		if(strlen(trim($nama_pengangkut)) == 0){ 
			$nama_pengangkut = $nama_pengangkut2;
		}
	
		
		$nomor_voy_flight = isset($_POST['nomor_voy_flight']) ? $_POST['nomor_voy_flight'] : '';
		$kode_bendera = isset($_POST['kode_bendera']) ? $_POST['kode_bendera'] : '';
		$nomor_polisi = isset($_POST['nomor_polisi']) ? $_POST['nomor_polisi'] : '';
		$ndpbm = isset($_POST['ndpbm']) ? $_POST['ndpbm'] : '';
		$price_type_id = isset($_POST['price_type_id']) ? $_POST['price_type_id'] : '';
		$amount_origin = isset($_POST['amount_origin']) ? $_POST['amount_origin'] : '';
		$cifRupiah = isset($_POST['cifRupiah']) ? $_POST['cifRupiah'] : '';
		$value_additional = isset($_POST['value_additional']) ? $_POST['value_additional'] : '';
		$discount = isset($_POST['discount']) ? $_POST['discount'] : '';
		$insurance_type_id = isset($_POST['insurance_type_id']) ? $_POST['insurance_type_id'] : '';
		$amount_insurance = isset($_POST['amount_insurance']) ? $_POST['amount_insurance'] : '';
		$amount_freight = isset($_POST['amount_freight']) ? $_POST['amount_freight'] : '';
		$maklon = isset($_POST['maklon']) ? $_POST['maklon'] : '';
		$tps_id = isset($_POST['tps_id']) ? $_POST['tps_id'] : '';
		$muat_port_id = isset($_POST['muat_port_id']) ? $_POST['muat_port_id'] : '';
		$transit_port_id = isset($_POST['transit_port_id']) ? $_POST['transit_port_id'] : '';
		$vendor_partner_id = isset($_POST['vendor_partner_id']) ? $_POST['vendor_partner_id'] : '';
		
		//tambahan data input ceisa40
		$jabatan_ttd = isset($_POST['jabatan_ttd']) ? $_POST['jabatan_ttd'] : '';
		$jabatan_ttd_1 = isset($_POST['jabatan_ttd_1']) ? $_POST['jabatan_ttd_1'] : '';
		$jumlah_tanda_pengaman = isset($_POST['jumlah_tanda_pengaman']) ? $_POST['jumlah_tanda_pengaman'] : '';
		$kode_jenis_nilai = isset($_POST['kode_jenis_nilai']) ? $_POST['kode_jenis_nilai'] : '';
		$kota_ttd = isset($_POST['kota_ttd']) ? $_POST['kota_ttd'] : '';
		$nama_ttd = isset($_POST['nama_ttd']) ? $_POST['nama_ttd'] : '';
		$nama_ttd_1 = isset($_POST['nama_ttd_1']) ? $_POST['nama_ttd_1'] : '';
		$bruto = isset($_POST['bruto']) ? $_POST['bruto'] : '';
		$nik = isset($_POST['nik']) ? $_POST['nik'] : '';
		$nomor_bc11 = isset($_POST['nomor_bc11']) ? $_POST['nomor_bc11'] : '';
		$pos_bc11 = isset($_POST['pos_bc11']) ? $_POST['pos_bc11'] : '';
		$subpos_bc11 = isset($_POST['subpos_bc11']) ? $_POST['subpos_bc11'] : '';
		$tgl_bc11 = isset($_POST['tgl_bc11']) ? $_POST['tgl_bc11'] : '';
		$uang_muka = isset($_POST['uang_muka']) ? $_POST['uang_muka'] : '';
		$kode_kena_pajak = isset($_POST['kode_kena_pajak']) ? $_POST['kode_kena_pajak'] : '';
		$volume = isset($_POST['volume']) ? $_POST['volume'] : '';
		$kode_kondisi_barang = isset($_POST['kode_kondisi_barang']) ? $_POST['kode_kondisi_barang'] : '';
		$kode_tutup_pu = isset($_POST['kode_tutup_pu']) ? $_POST['kode_tutup_pu'] : '';
		$tgl_perkiraan_tiba = isset($_POST['tgl_perkiraan_tiba']) ? $_POST['tgl_perkiraan_tiba'] : '';
		$cara_pembayaran_id = isset($_POST['cara_pembayaran_id']) ? $_POST['cara_pembayaran_id'] : '';
		$pemilik_id = isset($_POST['pemilik_id']) ? $_POST['pemilik_id'] : '';
		$bl_no = isset($_POST['bl_no']) ? $_POST['bl_no'] : '';
		$bl_date = isset($_POST['bl_date']) ? $_POST['bl_date'] : '';
		
		/* 
		echo($jabatan_ttd . 'xx' . $jabatan_ttd_1);
		echo($nama_ttd . 'xx' . $nama_ttd_1);
		die();
		 */
		$purchase_performa = explode(',',$purchase_performa_id);
		$purchase_order = explode(',',$purchase_order_id);
		$contract_subcon = explode(',',$contract_subcon);
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			if($bc_in_header_id){
				$this->rpc_service->setSP("dbo.sp_custom_import_edit_ceisa40");
				$this->rpc_service->addField('bc_in_header_id',$bc_in_header_id);
			} else {
				switch($bc_in_type_id){
					case '1':
						$this->rpc_service->setSP("dbo.sp_custom_import_add_ceisa40");
					break;
					
					case '2':
						$this->rpc_service->setSP("dbo.sp_custom_import_add_from_performa_ceisa40");
						
						foreach($purchase_performa as $dt_data){
							$data = array('purchase_performa_id'=>$dt_data);
							$this->rpc_service->addAttributeChild('dt' ,$data);
						}
					break;
					
					case '3':
						$this->rpc_service->setSP("dbo.sp_custom_import_add_from_purchase");
						
						foreach($purchase_order as $dt_data){
							$data = array('purchase_order_id'=>$dt_data);
							$this->rpc_service->addAttributeChild('dt' ,$data);
						}
					break;
					
					case '4':
						$this->rpc_service->setSP("dbo.sp_custom_import_add_from_contract_subcon_ceisa40");
						
						foreach($contract_subcon as $dt_data){
							$data = array('contract_subcon_id'=>$dt_data);
							$this->rpc_service->addAttributeChild('dt' ,$data);
						}
						
					break;
					
					default:
						$this->rpc_service->setSP("dbo.sp_custom_import_add_ceisa40");
					break;
				}
			}			
						
			$this->rpc_service->addField('custom_type_id',$custom_type_id);
			$this->rpc_service->addField('bc_in_type_id',$bc_in_type_id);
			$this->rpc_service->addField('car',$car);
			$this->rpc_service->addField('bc_no',$bc_no);
			$this->rpc_service->addField('bc_date',$bc_date);
			$this->rpc_service->addField('partner_id',$partner_id);					
			$this->rpc_service->addField('currencies_id',$currencies_id);
			
			$this->rpc_service->addField('bongkar_port_id',$bongkar_port_id);			
			$this->rpc_service->addField('bongkar_kppbc_id',$bongkar_kppbc_id);			
			$this->rpc_service->addField('tujuan_tpb_id',$tujuan_tpb_id);			
			$this->rpc_service->addField('jenis_tpb_id',$jenis_tpb_id);			
			$this->rpc_service->addField('tujuan_pengiriman_id',$tujuan_pengiriman_id);			
			$this->rpc_service->addField('tujuan_pemasukan_id',$tujuan_pemasukan_id);			
			$this->rpc_service->addField('pjt_status_id',$pjt_status_id);			
			$this->rpc_service->addField('cara_angkut_id',$cara_angkut_id);			
			$this->rpc_service->addField('nama_pengangkut',$nama_pengangkut);			
			$this->rpc_service->addField('nomor_voy_flight',$nomor_voy_flight);			
			$this->rpc_service->addField('kode_bendera',$kode_bendera);			
			$this->rpc_service->addField('nomor_polisi',$nomor_polisi);			
			$this->rpc_service->addField('ndpbm',$ndpbm);			
			$this->rpc_service->addField('price_type_id',$price_type_id);			
			$this->rpc_service->addField('amount_origin',$amount_origin);			
			$this->rpc_service->addField('cifRupiah',$cifRupiah);			
			$this->rpc_service->addField('value_additional',$value_additional);			
			$this->rpc_service->addField('discount',$discount);			
			$this->rpc_service->addField('insurance_type_id',$insurance_type_id);			
			$this->rpc_service->addField('amount_insurance',$amount_insurance);			
			$this->rpc_service->addField('amount_freight',$amount_freight);			
			$this->rpc_service->addField('maklon',$maklon);			
			$this->rpc_service->addField('tps_id',$tps_id);			
			$this->rpc_service->addField('muat_port_id',$muat_port_id);			
			$this->rpc_service->addField('transit_port_id',$transit_port_id);			
			$this->rpc_service->addField('vendor_partner_id',$vendor_partner_id);			
			
			//tambahan data input ceisa40
			$this->rpc_service->addField('jabatan_ttd',$jabatan_ttd);
			$this->rpc_service->addField('jabatan_ttd_1',$jabatan_ttd_1);
			$this->rpc_service->addField('jumlah_tanda_pengaman',$jumlah_tanda_pengaman);			
			$this->rpc_service->addField('kode_jenis_nilai',$kode_jenis_nilai);			
			$this->rpc_service->addField('kota_ttd',$kota_ttd);			
			$this->rpc_service->addField('nama_ttd',$nama_ttd);
			$this->rpc_service->addField('nama_ttd_1',$nama_ttd_1);
			$this->rpc_service->addField('bruto',$bruto);
			$this->rpc_service->addField('nik',$nik);			
			$this->rpc_service->addField('nomor_bc11',$nomor_bc11);			
			$this->rpc_service->addField('pos_bc11',$pos_bc11);			
			$this->rpc_service->addField('subpos_bc11',$subpos_bc11);			
			$this->rpc_service->addField('tgl_bc11',$tgl_bc11);						
			$this->rpc_service->addField('uang_muka',$uang_muka);			
			$this->rpc_service->addField('kode_kena_pajak',$kode_kena_pajak);			
			$this->rpc_service->addField('volume',$volume);			
			$this->rpc_service->addField('kode_kondisi_barang',$kode_kondisi_barang);			
			$this->rpc_service->addField('kode_tutup_pu',$kode_tutup_pu);			
			$this->rpc_service->addField('tgl_perkiraan_tiba',$tgl_perkiraan_tiba);		
			$this->rpc_service->addField('cara_pembayaran_id',$cara_pembayaran_id);
			$this->rpc_service->addField('pemilik_id',$pemilik_id);
			$this->rpc_service->addField('bl_no',$bl_no);
			$this->rpc_service->addField('bl_date',$bl_date);
			
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
							$return['bc_in_header_id'] = $data_result['bc_in_header_id'];
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
		
		$bc_in_header_id = isset($_REQUEST['bc_in_header_id']) ? is_numeric($_REQUEST['bc_in_header_id']) ? $_REQUEST['bc_in_header_id']  : -1 : -1;
		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;
		
		$view = 'view_custom_import_detail';
		$field = $this->custom_import_detail_table();
		
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";
		
		$extra_param = array();
		$extra_param['where']['0']['field'] = 'r2';
		$extra_param['where']['0']['data'] = $bc_in_header_id;
		$extra_param['methodid'] = $methodid;
		
		$loaddata = $this->ecc_library->get_field_data($view,$field,$extra_param);
		
		echo $loaddata;
	}
	

	function post_add_edit_detail(){
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
		
		$bc_in_barang_id = isset($_POST['bc_in_barang_id']) ? $_POST['bc_in_barang_id'] : false;
		$bc_in_header_id = isset($_POST['bc_in_header_id']) ? $_POST['bc_in_header_id'] : 0;
		$seri = isset($_POST['seri']) ? $_POST['seri'] : 0;
		$item_id = isset($_POST['item_id']) ? $_POST['item_id'] : '';
		$hs_id = isset($_POST['hs_id']) ? $_POST['hs_id'] : '';
		$kategori_barang_id = isset($_POST['kategori_barang_id']) ? $_POST['kategori_barang_id'] : '';
		$quantity_custom = isset($_POST['quantity_custom']) ? $_POST['quantity_custom'] : '';
		$uom_id = isset($_POST['uom_id']) ? $_POST['uom_id'] : '';
		$conversion = isset($_POST['conversion']) ? $_POST['conversion'] : '';
		$unit_price = isset($_POST['unit_price']) ? $_POST['unit_price'] : '';
		$subcon_price = isset($_POST['subcon_price']) ? $_POST['subcon_price'] : '';
		$merk = isset($_POST['merk']) ? $_POST['merk'] : '';
		$tipe = isset($_POST['tipe']) ? $_POST['tipe'] : '';
		$ukuran = isset($_POST['ukuran']) ? $_POST['ukuran'] : '';
		$volume = isset($_POST['volume']) ? $_POST['volume'] : '';
		$spesifikasi_lain = isset($_POST['spesifikasi_lain']) ? $_POST['spesifikasi_lain'] : '';
		$bruto = isset($_POST['bruto']) ? $_POST['bruto'] : '';
		$netto = isset($_POST['netto']) ? $_POST['netto'] : '';
		$quantity_package = isset($_POST['quantity_package']) ? $_POST['quantity_package'] : '';
		$package_id = isset($_POST['package_id']) ? $_POST['package_id'] : '';
		$origin_country_id = isset($_POST['origin_country_id']) ? $_POST['origin_country_id'] : '';
		$fasilitas_id = isset($_POST['fasilitas_id']) ? $_POST['fasilitas_id'] : '';
		$skema_tarif_id = isset($_POST['skema_tarif_id']) ? $_POST['skema_tarif_id'] : '';
		$bm_jenis_tarif_id = isset($_POST['bm_jenis_tarif_id']) ? $_POST['bm_jenis_tarif_id'] : '';
		$bm_tarif = isset($_POST['bm_tarif']) ? $_POST['bm_tarif'] : '';
		$bm_uom_id = isset($_POST['bm_uom_id']) ? $_POST['bm_uom_id'] : '';
		$cukai_jenis_tarif_id = isset($_POST['cukai_jenis_tarif_id']) ? $_POST['cukai_jenis_tarif_id'] : '';
		$cukai_tarif = isset($_POST['cukai_tarif']) ? $_POST['cukai_tarif'] : '';
		$cukai_uom_id = isset($_POST['cukai_uom_id']) ? $_POST['cukai_uom_id'] : '';
		$ppn_tarif = isset($_POST['ppn_tarif']) ? $_POST['ppn_tarif'] : '';
		$pph_tarif = isset($_POST['pph_tarif']) ? $_POST['pph_tarif'] : '';
		$ppnbm_tarif = isset($_POST['ppnbm_tarif']) ? $_POST['ppnbm_tarif'] : '';
		$note = isset($_POST['note']) ? $_POST['note'] : '';
		
		//tambahan ceisa40
		$isi_perkemasan = isset($_POST['isi_perkemasan']) ? $_POST['isi_perkemasan'] : '';
		$kode_asal_barang = isset($_POST['kode_asal_barang']) ? $_POST['kode_asal_barang'] : '';
		$kode_asal_bahan_baku = isset($_POST['kode_asal_bahan_baku']) ? $_POST['kode_asal_bahan_baku'] : '';
		$kode_perhitungan = isset($_POST['kode_perhitungan']) ? $_POST['kode_perhitungan'] : '';
		$kode_guna_barang = isset($_POST['kode_guna_barang']) ? $_POST['kode_guna_barang'] : '';
		$kode_kondisi_barang = isset($_POST['kode_kondisi_barang']) ? $_POST['kode_kondisi_barang'] : '';
		$uang_muka = isset($_POST['uang_muka']) ? $_POST['uang_muka'] : '';
		$nilai_devisa = isset($_POST['nilai_devisa']) ? $_POST['nilai_devisa'] : '';
		$pernyataan_lartas = isset($_POST['pernyataan_lartas']) ? $_POST['pernyataan_lartas'] : '';
		$seri_jin = isset($_POST['seri_jin']) ? $_POST['seri_jin'] : '';
		$asuransi = isset($_POST['asuransi']) ? $_POST['asuransi'] : '';
		$harga_perolehan = isset($_POST['harga_perolehan']) ? $_POST['harga_perolehan'] : '';
		$cif = isset($_POST['cif']) ? $_POST['cif'] : '';
		
		//sampe sini
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			if($bc_in_barang_id){
				$this->rpc_service->setSP("dbo.sp_custom_import_detail_edit_ceisa40");
				$this->rpc_service->addField('bc_in_barang_id',$bc_in_barang_id);
			} else {
				$this->rpc_service->setSP("dbo.sp_custom_import_detail_add_ceisa40");
			}
			
			$this->rpc_service->addField('bc_in_header_id',$bc_in_header_id);
			
			$this->rpc_service->addField('seri',$seri);
			$this->rpc_service->addField('item_id',$item_id);
			$this->rpc_service->addField('hs_id',$hs_id);
			$this->rpc_service->addField('kategori_barang_id',$kategori_barang_id);
			$this->rpc_service->addField('quantity_custom',$quantity_custom);
			$this->rpc_service->addField('uom_id',$uom_id);
			$this->rpc_service->addField('conversion',$conversion);
			$this->rpc_service->addField('unit_price',$unit_price);
			$this->rpc_service->addField('subcon_price',$subcon_price);
			$this->rpc_service->addField('merk',$merk);
			$this->rpc_service->addField('tipe',$tipe);
			$this->rpc_service->addField('ukuran',$ukuran);
			$this->rpc_service->addField('volume',$volume);
			$this->rpc_service->addField('spesifikasi_lain',$spesifikasi_lain);
			$this->rpc_service->addField('bruto',$bruto);
			$this->rpc_service->addField('netto',$netto);
			$this->rpc_service->addField('quantity_package',$quantity_package);
			$this->rpc_service->addField('package_id',$package_id);
			$this->rpc_service->addField('origin_country_id',$origin_country_id);
			$this->rpc_service->addField('fasilitas_id',$fasilitas_id);
			$this->rpc_service->addField('skema_tarif_id',$skema_tarif_id);
			$this->rpc_service->addField('bm_jenis_tarif_id',$bm_jenis_tarif_id);
			$this->rpc_service->addField('bm_tarif',$bm_tarif);
			$this->rpc_service->addField('bm_uom_id',$bm_uom_id);
			$this->rpc_service->addField('cukai_jenis_tarif_id',$cukai_jenis_tarif_id);
			$this->rpc_service->addField('cukai_tarif',$cukai_tarif);
			$this->rpc_service->addField('cukai_uom_id',$cukai_uom_id);
			$this->rpc_service->addField('ppn_tarif',$ppn_tarif);
			$this->rpc_service->addField('pph_tarif',$pph_tarif);
			$this->rpc_service->addField('ppnbm_tarif',$ppnbm_tarif);
			$this->rpc_service->addField('note',$note);
			
			$this->rpc_service->addField('isi_perkemasan',$isi_perkemasan);
			$this->rpc_service->addField('kode_asal_barang',$kode_asal_barang);
			$this->rpc_service->addField('kode_asal_bahan_baku',$kode_asal_bahan_baku);
			$this->rpc_service->addField('kode_perhitungan',$kode_perhitungan);
			$this->rpc_service->addField('kode_guna_barang',$kode_guna_barang);
			$this->rpc_service->addField('kode_kondisi_barang',$kode_kondisi_barang);
			$this->rpc_service->addField('uang_muka',$uang_muka);
			$this->rpc_service->addField('nilai_devisa',$nilai_devisa);
			$this->rpc_service->addField('pernyataan_lartas',$pernyataan_lartas);
			$this->rpc_service->addField('seri_jin',$seri_jin);
			$this->rpc_service->addField('asuransi',$asuransi);
			$this->rpc_service->addField('harga_perolehan',$harga_perolehan);
			$this->rpc_service->addField('cif',$cif);
			
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
	
	function post_add_edit_document_xx(){
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
		
		$id_dokumen = isset($_POST['id_dokumen']) ? $_POST['id_dokumen'] : false;
		$bc_in_header_id = isset($_POST['bc_in_header_id']) ? $_POST['bc_in_header_id'] : 0;
		$seri_dokumen = isset($_POST['seri_dokumen']) ? $_POST['seri_dokumen'] : '';
		$kode_dokumen = isset($_POST['kode_dokumen']) ? $_POST['kode_dokumen'] : '';
		$kode_fasilitas = isset($_POST['kode_fasilitas']) ? $_POST['kode_fasilitas'] : '';
		$nomor_dokumen = isset($_POST['nomor_dokumen']) ? $_POST['nomor_dokumen'] : '';
		$tanggal_dokumen = isset($_POST['tanggal_dokumen']) ? $_POST['tanggal_dokumen'] : '';
		$uraian_dokumen = isset($_POST['uraian_dokumen']) ? $_POST['uraian_dokumen'] : '';
		$uraian_fasilitas = isset($_POST['uraian_fasilitas']) ? $_POST['uraian_fasilitas'] : '';
		$custom_type_id = isset($_POST['custom_type_id']) ? $_POST['custom_type_id'] : '';
		$memo = isset($_POST['memo']) ? $_POST['memo'] : '';
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			if($id_dokumen){
				$this->rpc_service->setSP("dbo.sp_ceisa_custom_document_in_edit");
				$this->rpc_service->addField('id_dokumen',$id_dokumen);
			} else {
				$this->rpc_service->setSP("dbo.sp_ceisa_custom_document_in_add");
			}
			
			$this->rpc_service->addField('bc_in_header_id',$bc_in_header_id);
			$this->rpc_service->addField('id_dokumen',$id_dokumen);
			$this->rpc_service->addField('seri_dokumen',$seri_dokumen);
			$this->rpc_service->addField('kode_dokumen',$kode_dokumen);
			$this->rpc_service->addField('uraian_dokumen',$uraian_dokumen);
			$this->rpc_service->addField('kode_fasilitas',$kode_fasilitas);
			$this->rpc_service->addField('uraian_fasilitas',$uraian_fasilitas);
			$this->rpc_service->addField('nomor_dokumen',$nomor_dokumen);
			$this->rpc_service->addField('tanggal_dokumen',$tanggal_dokumen);
			$this->rpc_service->addField('memo',$memo);
			
			
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
	
	function post_add_edit_document(){
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
		
		$id_dokumen = isset($_POST['id_dokumen']) ? $_POST['id_dokumen'] : false;
		$bc_in_header_id = isset($_POST['bc_in_header_id']) ? $_POST['bc_in_header_id'] : 0;
		$seri_dokumen = isset($_POST['seri_dokumen']) ? $_POST['seri_dokumen'] : '';
		$kode_dokumen = isset($_POST['kode_dokumen']) ? $_POST['kode_dokumen'] : '';
		$kode_fasilitas = isset($_POST['kode_fasilitas']) ? $_POST['kode_fasilitas'] : '';
		$nomor_dokumen = isset($_POST['nomor_dokumen']) ? $_POST['nomor_dokumen'] : '';
		$tanggal_dokumen = isset($_POST['tanggal_dokumen']) ? $_POST['tanggal_dokumen'] : '';
		$uraian_dokumen = isset($_POST['uraian_dokumen']) ? $_POST['uraian_dokumen'] : '';
		$uraian_fasilitas = isset($_POST['uraian_fasilitas']) ? $_POST['uraian_fasilitas'] : '';
		$custom_type_id = isset($_POST['custom_type_id']) ? $_POST['custom_type_id'] : '';
		$memo = isset($_POST['memo']) ? $_POST['memo'] : '';
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			if($id_dokumen){
				$this->rpc_service->setSP("dbo.sp_ceisa_custom_document_in_edit");
				$this->rpc_service->addField('id_dokumen',$id_dokumen);
			} else {
				$this->rpc_service->setSP("dbo.sp_ceisa_custom_document_in_add");
			}
			
			$this->rpc_service->addField('id_dokumen',$id_dokumen);
			$this->rpc_service->addField('bc_in_header_id',$bc_in_header_id);
			$this->rpc_service->addField('seri_dokumen',$seri_dokumen);
			$this->rpc_service->addField('kode_dokumen',$kode_dokumen);
			$this->rpc_service->addField('kode_fasilitas',$kode_fasilitas);
			$this->rpc_service->addField('nomor_dokumen',$nomor_dokumen);
			$this->rpc_service->addField('tanggal_dokumen',$tanggal_dokumen);
			$this->rpc_service->addField('memo',$memo);
			$this->rpc_service->addField('uraian_dokumen',$uraian_dokumen);
			$this->rpc_service->addField('uraian_fasilitas',$uraian_fasilitas);
			$this->rpc_service->addField('custom_type_id',$custom_type_id);

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
	
	function post_add_edit_kemasan(){
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
		
		$id_kemasan = isset($_POST['id_kemasan']) ? $_POST['id_kemasan'] : false;
		$bc_out_header_id = isset($_POST['bc_out_header_id']) ? $_POST['bc_out_header_id'] : 0;
		$seri_kemasan = isset($_POST['seri_kemasan']) ? $_POST['seri_kemasan'] : '';
		$jumlah_kemasan = isset($_POST['jumlah_kemasan']) ? $_POST['jumlah_kemasan'] : '';
		$kode_jeniskemasan = isset($_POST['kode_jeniskemasan']) ? $_POST['kode_jeniskemasan'] : '';
		$merk_kemasan = isset($_POST['merk_kemasan']) ? $_POST['merk_kemasan'] : '';
		$custom_type_id = isset($_POST['custom_type_id']) ? $_POST['custom_type_id'] : '';
		$memo = isset($_POST['memo']) ? $_POST['memo'] : '';
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			if($id_kemasan){
				$this->rpc_service->setSP("dbo.sp_ceisa_custom_kemasan_edit");
				$this->rpc_service->addField('id_kemasan',$id_kemasan);
			} else {
				$this->rpc_service->setSP("dbo.sp_ceisa_custom_kemasan_add");
			}
			
			$this->rpc_service->addField('id_kemasan',$id_kemasan);
			$this->rpc_service->addField('bc_out_header_id',$bc_out_header_id);
			$this->rpc_service->addField('seri_kemasan',$seri_kemasan);
			$this->rpc_service->addField('jumlah_kemasan',$jumlah_kemasan);
			$this->rpc_service->addField('kode_jeniskemasan',$kode_jeniskemasan);
			$this->rpc_service->addField('merk_kemasan',$merk_kemasan);
			$this->rpc_service->addField('custom_type_id',$custom_type_id);
			$this->rpc_service->addField('memo',$memo);

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
	
	function post_add_edit_jaminan(){
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
		
		$idJaminan = isset($_POST['idJaminan']) ? $_POST['idJaminan'] : false;
		$bc_in_header_id = isset($_POST['bc_in_header_id']) ? $_POST['bc_in_header_id'] : 0;
		$custom_type_id = isset($_POST['custom_type_id']) ? $_POST['custom_type_id'] : '';
		$seriDokumen_jaminan = isset($_POST['seriDokumen_jaminan']) ? $_POST['seriDokumen_jaminan'] : '';
		$nomorBpj = isset($_POST['nomorBpj']) ? $_POST['nomorBpj'] : '';
		$tanggalBpj = isset($_POST['tanggalBpj']) ? $_POST['tanggalBpj'] : '';
		$kodeJenisJaminan = isset($_POST['kodeJenisJaminan']) ? $_POST['kodeJenisJaminan'] : '';
		$JenisJaminan = isset($_POST['JenisJaminan']) ? $_POST['JenisJaminan'] : '';
		$nomorJaminan = isset($_POST['nomorJaminan']) ? $_POST['nomorJaminan'] : '';
		$tanggalJaminan = isset($_POST['tanggalJaminan']) ? $_POST['tanggalJaminan'] : '';
		$tanggalJatuhTempo = isset($_POST['tanggalJatuhTempo']) ? $_POST['tanggalJatuhTempo'] : '';
		$penjamin = isset($_POST['penjamin']) ? $_POST['penjamin'] : '';
		$nilaiJaminan = isset($_POST['nilaiJaminan']) ? $_POST['nilaiJaminan'] : '';
		$keterangan = isset($_POST['keterangan']) ? $_POST['keterangan'] : '';
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			if($idJaminan){
				$this->rpc_service->setSP("dbo.sp_ceisa_custom_import_jaminan_edit");
				$this->rpc_service->addField('idJaminan',$idJaminan);
			} else {
				$this->rpc_service->setSP("dbo.sp_ceisa_custom_import_jaminan_add");
			}
			
			$this->rpc_service->addField('idJaminan',$idJaminan);
			$this->rpc_service->addField('bc_in_header_id',$bc_in_header_id);
			$this->rpc_service->addField('custom_type_id',$custom_type_id);
			$this->rpc_service->addField('seriDokumen_jaminan',$seriDokumen_jaminan);
			$this->rpc_service->addField('nomorBpj',$nomorBpj);
			$this->rpc_service->addField('tanggalBpj',$tanggalBpj);
			$this->rpc_service->addField('kodeJenisJaminan',$kodeJenisJaminan);
			$this->rpc_service->addField('nomorJaminan',$nomorJaminan);
			$this->rpc_service->addField('tanggalJaminan',$tanggalJaminan);
			$this->rpc_service->addField('tanggalJatuhTempo',$tanggalJatuhTempo);
			$this->rpc_service->addField('penjamin',$penjamin);
			$this->rpc_service->addField('nilaiJaminan',$nilaiJaminan);
			$this->rpc_service->addField('keterangan',$keterangan);

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
	
	function post_add_edit_kontainer(){
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
		
		$id_kontainer = isset($_POST['id_kontainer']) ? $_POST['id_kontainer'] : false;
		$bc_in_header_id = isset($_POST['bc_in_header_id']) ? $_POST['bc_in_header_id'] : 0;
		$kode_jenis_kontainer = isset($_POST['kode_jenis_kontainer']) ? $_POST['kode_jenis_kontainer'] : '';
		$kode_tipe_kontainer = isset($_POST['kode_tipe_kontainer']) ? $_POST['kode_tipe_kontainer'] : '';
		$kode_ukuran_kontainer = isset($_POST['kode_ukuran_kontainer']) ? $_POST['kode_ukuran_kontainer'] : '';
		$nomor_kontainer = isset($_POST['nomor_kontainer']) ? $_POST['nomor_kontainer'] : '';
		$seri_kontainer = isset($_POST['seri_kontainer']) ? $_POST['seri_kontainer'] : '';
		$custom_type_id = isset($_POST['custom_type_id']) ? $_POST['custom_type_id'] : '';
		$memo = isset($_POST['memo']) ? $_POST['memo'] : '';
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			if($id_kontainer){
				$this->rpc_service->setSP("dbo.sp_ceisa_custom_kontainer_in_edit");
				$this->rpc_service->addField('id_kontainer',$id_kontainer);
			} else {
				$this->rpc_service->setSP("dbo.sp_ceisa_custom_kontainer_in_add");
			}
			
			$this->rpc_service->addField('id_kontainer',$id_kontainer);
			$this->rpc_service->addField('bc_in_header_id',$bc_in_header_id);
			$this->rpc_service->addField('kode_jenis_kontainer',$kode_jenis_kontainer);
			$this->rpc_service->addField('kode_tipe_kontainer',$kode_tipe_kontainer);
			$this->rpc_service->addField('kode_ukuran_kontainer',$kode_ukuran_kontainer);
			$this->rpc_service->addField('nomor_kontainer',$nomor_kontainer);
			$this->rpc_service->addField('seri_kontainer',$seri_kontainer);
			$this->rpc_service->addField('custom_type_id',$custom_type_id);
			$this->rpc_service->addField('memo',$memo);

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
				
		$bc_in_barang_id = isset($_POST['bc_in_barang_id']) ? $_POST['bc_in_barang_id'] : false;
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			
			if($bc_in_barang_id){
				$this->rpc_service->setSP("dbo.sp_custom_import_detail_delete");
				$this->rpc_service->addField('bc_in_barang_id',$bc_in_barang_id);
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
	
	function delete_document(){
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
				
		$id_dokumen = isset($_POST['id_dokumen']) ? $_POST['id_dokumen'] : false;
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			
			if($id_dokumen){
				$this->rpc_service->setSP("dbo.sp_custom_ceisa_document_in_delete");
				$this->rpc_service->addField('id_dokumen',$id_dokumen);
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
	
	function delete_kemasan(){
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
				
		$idJaminan = isset($_POST['idJaminan']) ? $_POST['idJaminan'] : false;
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			
			if($idJaminan){
				$this->rpc_service->setSP("dbo.sp_ceisa_custom_import_jaminan_delete");
				$this->rpc_service->addField('idJaminan',$idJaminan);
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
	
	function delete_kontainer(){
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
				
		$id_kontainer = isset($_POST['id_kontainer']) ? $_POST['id_kontainer'] : false;
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			
			if($id_kontainer){
				$this->rpc_service->setSP("dbo.sp_custom_in_ceisa_kontainer_delete");
				$this->rpc_service->addField('id_kontainer',$id_kontainer);
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
	
	function loaddata_performa(){
		$this->authentication->plainlayout();
		
		$partner_id = isset($_POST['partner_id']) ? is_numeric($_POST['partner_id']) ?  $_POST['partner_id'] : -1 : -1;
		$currencies_id = isset($_POST['currencies_id']) ? is_numeric($_POST['currencies_id']) ?  $_POST['currencies_id'] : -1 : -1;
		
		$view = 'view_purchase_performa_custom';
		$field = $this->custom_import_detail_table();
		
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";
		
		$extra_param = array();
		$extra_param['where']['0']['field'] = 'r4';
		$extra_param['where']['0']['data'] = $partner_id;
		$extra_param['where']['1']['field'] = 'r5';
		$extra_param['where']['1']['data'] = $currencies_id;
		
		$loaddata = $this->ecc_library->get_field_data($view,$field,$extra_param);
			
		echo $loaddata;
	}
	
	function loaddata_purchase(){
		$this->authentication->plainlayout();
		
		$field = array();
		$field[] = array('field' => 'purchase_order_id', 'title' => 'purchase_order_id');
		$field[] = array('field' => 'purchase_order_no', 'title' => 'purchase_order_no');
		$field[] = array('field' => 'purchase_order_date', 'title' => 'purchase_order_date');
		
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";
		$loaddata_table = array();
		
		$partner_id = isset($_POST['partner_id']) ? is_numeric($_POST['partner_id']) ?  $_POST['partner_id'] : -1 : -1;
		$currencies_id = isset($_POST['currencies_id']) ? is_numeric($_POST['currencies_id']) ?  $_POST['currencies_id'] : -1 : -1;
		
		$view = 'dbo.view_purchase_order_custom';
		$where = array();
		$where['partner_id'] = $partner_id;
		$where['currencies_id'] = $currencies_id;
		$loaddata = $this->ecc_library->loaddata($view,$field,$where);
			
		foreach($loaddata['data'] as $key => $value){
			
			$new_row = array();
			$new_row[] = $value[0];
			$new_row[] = $value[1];
			$new_row[] = $value[2];
			
			$loaddata_table[$value[0]] = $new_row;
		}
		
			
		$loaddata['data'] = array();
		foreach($loaddata_table as $value){
			
			$data = array();
			$data[] = $value[0];
			$data[] = $value[1];
			$data[] = $value[2];
			
			$loaddata['data'][] = $data;
		}
		
		echo json_encode($loaddata);
	}
	
	function loaddata_contract_subcon(){
		$this->authentication->plainlayout();
		
		$partner_id = isset($_POST['partner_id']) ? is_numeric($_POST['partner_id']) ?  $_POST['partner_id'] : -1 : -1;
		$currencies_id = isset($_POST['currencies_id']) ? is_numeric($_POST['currencies_id']) ?  $_POST['currencies_id'] : -1 : -1;
		
		$view = 'view_subcon_in_custom_cmt';
		$field = $this->custom_import_detail_table();
		
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";
		
		$extra_param = array();
		$extra_param['where']['0']['field'] = 'r4';
		$extra_param['where']['0']['data'] = $partner_id;
		$extra_param['where']['1']['field'] = 'r5';
		$extra_param['where']['1']['data'] = $currencies_id;
		
		$loaddata = $this->ecc_library->get_field_data($view,$field,$extra_param);
			
		echo $loaddata;
	}
	
	function loaddata_document(){
		$this->authentication->plainlayout();
		
		$bc_in_header_id = isset($_REQUEST['bc_in_header_id']) ? is_numeric($_REQUEST['bc_in_header_id']) ? $_REQUEST['bc_in_header_id']  : -1 : -1;
		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;
		
		$view = 'view_custom_ceisa_document';
		$field = $this->custom_import_document_table();
		
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";
		
		$extra_param = array();
		$extra_param['where']['0']['field'] = 'r3';
		$extra_param['where']['0']['data'] = $bc_in_header_id;
		$extra_param['methodid'] = $methodid;
		
		$loaddata = $this->ecc_library->get_field_data($view,$field,$extra_param);
			
		echo $loaddata;
	}
	
	function loaddata_packaging(){
		$this->authentication->plainlayout();
		
		$bc_in_header_id = isset($_REQUEST['bc_in_header_id']) ? is_numeric($_REQUEST['bc_in_header_id']) ? $_REQUEST['bc_in_header_id']  : -1 : -1;
		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;
		
		$view = 'view_custom_ceisa_kemasan';
		$field = $this->custom_import_packaging_table();
		
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";
		
		$extra_param = array();
		$extra_param['where']['0']['field'] = 'r3';
		$extra_param['where']['0']['data'] = $bc_in_header_id;
		$extra_param['methodid'] = $methodid;
		
		$loaddata = $this->ecc_library->get_field_data($view,$field,$extra_param);
			
		echo $loaddata;
	}
	
	function loaddata_container(){
		$this->authentication->plainlayout();
		
		$bc_in_header_id = isset($_REQUEST['bc_in_header_id']) ? is_numeric($_REQUEST['bc_in_header_id']) ? $_REQUEST['bc_in_header_id']  : -1 : -1;
		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;
		
		$view = 'view_custom_ceisa_kontainer';
		$field = $this->custom_import_container_table();
		
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";
		
		$extra_param = array();
		$extra_param['where']['0']['field'] = 'r3';
		$extra_param['where']['0']['data'] = $bc_in_header_id;
		$extra_param['methodid'] = $methodid;
		
		$loaddata = $this->ecc_library->get_field_data($view,$field,$extra_param);
			
		echo $loaddata;
	}
	
	function send_to_ceisa(){
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
				
		$tpb_header_id = isset($_POST['tpb_header_id']) ? $_POST['tpb_header_id'] : false;
		$custom_type_id = isset($_POST['custom_type_id']) ? $_POST['custom_type_id'] : false;
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			$sp = "dbo.sp_ceisa_send_to_module";	
			if($tpb_header_id){
				$this->rpc_service->setSP(array("sp"=> $sp,"mode"=>"1","debug"=>"1"));
			}
			

			$this->rpc_service->addField('tpb_header_id',$tpb_header_id);
			$this->rpc_service->addField('custom_type_id',$custom_type_id);
				
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
	
	function get_register_no(){
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
				
		$tpb_header_id = isset($_POST['tpb_header_id']) ? $_POST['tpb_header_id'] : false;
		$custom_type_id = isset($_POST['custom_type_id']) ? $_POST['custom_type_id'] : false;
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			$sp = "dbo.sp_ceisa_get_respon";	
			if($tpb_header_id){
				$this->rpc_service->setSP(array("sp"=> $sp,"mode"=>"1","debug"=>"1"));
			}
			

			$this->rpc_service->addField('tpb_header_id',$tpb_header_id);
			$this->rpc_service->addField('custom_type_id',$custom_type_id);
				
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
	
	function cancel_send_ceisa(){
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
				
		$tpb_header_id = isset($_POST['tpb_header_id']) ? $_POST['tpb_header_id'] : false;
		$custom_type_id = isset($_POST['custom_type_id']) ? $_POST['custom_type_id'] : false;
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			$sp = "dbo.sp_ceisa_cancel_dokumen";	
			if($tpb_header_id){
				$this->rpc_service->setSP(array("sp"=> $sp,"mode"=>"1","debug"=>"1"));
			}
			

			$this->rpc_service->addField('tpb_header_id',$tpb_header_id);
			$this->rpc_service->addField('custom_type_id',$custom_type_id);
				
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
	
	
	function inc_noAju(){
		$kodeDokumen = isset($_POST['custom_type_id'])?$_POST['custom_type_id']:'0';
		echo json_encode(array('incre' =>  $this->inc_noAju_trx($kodeDokumen)));
	}
	

	public function inc_noAju_trx($id_tipe){
		
		if($id_tipe == 1){
			$ket = '000020';
		} else 	if($id_tipe == 2){
			$ket = '000023';
		} else 	if($id_tipe == 3){
			$ket = '000262';
		} else 	if($id_tipe == 4){
			$ket = '000027';
		} else 	if($id_tipe == 5){
			$ket = '000040';
		}else {
			$ket = '000000';
		}
		
		$kodekpbc = '313580';
		
			
		$q = $this->db->query("

			select car as carlast , substring(car, 8,6) from dbo.dt_bc_in_header
			where  substring (car,1,6) = '$ket'
			and  substring(car, 8,6)  = '$kodekpbc'
			order by car desc
			limit 1
			;
		"); 
		
			
		$nomer = '';
		$nomor_terakhir = "";
		foreach($q->result() as $r){
			$nomor_terakhir = $r->carlast;
		}
		
		//050500-000403-20211231-002288
		$tahun_ini = date("Y");
		$tahunterakhir = substr("$nomor_terakhir",14,4);
		$nomor_urut_akhir = substr("$nomor_terakhir", -6);
		
		
		
		
		if($nomor_urut_akhir == 0){ 
			$incre =  $ket . "-" . $kodekpbc . "-" . date("Ymd") . "-" . sprintf('%06d', 1); 
		} else {
			
			if($tahunterakhir == $tahun_ini){
				$urut = $nomor_urut_akhir + 1; 
				$incre = $ket . "-" . $kodekpbc . "-" . date("Ymd") . "-" . sprintf('%06d', $urut); 
				
			} else { 
				$incre = $ket . "-" . $kodekpbc . "-" . date("Ymd") . "-" . sprintf('%06d', 1); 
			}
		}

		//echo($urut);
		//die();

		return $incre;
	

	}
	
	
	public function get_kurs(){	
		$this->login_ceisa_new();
		$token = $this->session->userdata('s_token');

		$id_curr = (isset($_POST['currencies_id']) && !empty($_POST['currencies_id']))?$_POST['currencies_id']:die('{"sts":"ERROR","desc":" Pilih Terlebih Dahulu Data Barang!"}');
		$tgl = date('Y-m-d');
		
		//$id_curr = 191;
	
		$currencies_code = "";
		
		$where = array();
		$where['currencies_id'] = $id_curr;
		
		$dataKurs = $this->main->getData('dbo.dt_currencies',null,$where);
		if($dataKurs){
			foreach($dataKurs as $dt_kurs){
				$currencies_code = $dt_kurs['currencies_code'];
			}
		}
		
		$url = "https://apis-gw.beacukai.go.id/openapi/kurs/$currencies_code";
		
		// echo($currencies_code);
		// die();

		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

		$headers = array(
		   "Authorization: Bearer $token",
		   "Content-Type: application/json"
		);
		
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
		//for debug only!
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

		$resp = curl_exec($curl);
		curl_close($curl);
		
		$result = json_decode($resp,true);
		
		// print_r($result);
		
		$status = "Failed";
		$kurs = 0;
		
		if(isset($result['message'])){
			$status = $result['message'];
		
			if(isset($result['data'])){
				$kurs = $result['data'][0]['nilaiKurs'];
			}
		
		}
		
		echo json_encode(array('sts' => '00','status'=>$status,'message'=>$kurs,'dataStatus'=>$tgl  ));
	} 
	
	
	function login_ceisa_new(){
		$username = "eximpopstar";
		$password = "P0pnanjung99";

		$url = "https://apis-gw.beacukai.go.id/nle-oauth/v1/user/login";
		
		$headers = array(
		   "Content-Type: application/json",
		);
		$data = json_encode(array('username'=>$username, 'password'=>$password));
	//	echo $data;
	//	die();
		
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		//ini headernya
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
		//dikirim disini
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

		//for debug only!
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

		$resp = curl_exec($curl);
		//resp hasil dari server
		curl_close($curl);
		
		
		$arr = array();
		$arr = json_decode($resp, true);
		  
		$this->session->set_userdata('s_token', $arr["item"]["access_token"]);
		
		$respon_login = json_decode($resp, true);
		


	} 
	
	
	function login_ceisa(){
		$username = (isset($_POST['username']) && !empty($_POST['username'])) ? $_POST['username'] : die('{"status":"ERROR","message":" Param username Tidak Ditemukan"}');
		$password = (isset($_POST['password']) && !empty($_POST['password'])) ? $_POST['password'] : die('{"status":"ERROR","message":" Param Password Tidak Ditemukan"}');

		$url = "https://apis-gw.beacukai.go.id/nle-oauth/v1/user/login";
		
		$headers = array(
		   "Content-Type: application/json",
		);
		$data = json_encode(array('username'=>$username, 'password'=>$password));
		
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_TIMEOUT, 10);

		$resp = curl_exec($curl);

		if ($curl_error = curl_error($curl)) {
			echo json_encode(array('sts' => '01', 'status' => 'ERROR', 'message' => "Tidak Terhubung ke Server, Cek Jarigan Anda!"));
			curl_close($curl);
			die();
		}
		curl_close($curl);

		$arr = json_decode($resp, true);

		if (json_last_error() !== JSON_ERROR_NONE) {
			echo json_encode(array('sts' => '01', 'status' => 'ERROR', 'message' => "Invalid JSON response"));
			die();
		}

		if (empty($arr)) {
			echo json_encode(array('sts' => '01', 'status' => 'Informasi:', 'message' => "<hr> Under Maintenance Server"));
			die();
		}

		if (array_key_exists("Exception", $arr)) {
			echo json_encode(array('sts' => '00', 'status' => 'Informasi:', 'message' => $arr['Exception']));
			die();
		}
		
		$this->session->set_userdata('s_token', $arr["item"]["access_token"]);
		
		$respon_login = $arr;

		if (isset($respon_login['status'])) {
			echo json_encode(array('sts' => '00', 'status' => $respon_login['status'], 'message' => $respon_login['message']));
		}
	}  
	
	
	function send_to_ceisa40(){	
		$bc_in_header_id =  (isset($_POST['bc_in_header_id']) && !empty($_POST['bc_in_header_id']))?$_POST['bc_in_header_id']:die('{"status":"ERROR","message":" Param Header ID Tidak Ditemukan"}');
		$custom_type_id =  (isset($_POST['custom_type_id']) && !empty($_POST['custom_type_id']))?$_POST['custom_type_id']:"";
		$noDaftar = (isset($_POST['bc_no']) && !empty($_POST['bc_no']))?$_POST['bc_no']:"";
		$isFinal = (isset($_POST['isFinal']) && !empty($_POST['isFinal']))?$_POST['isFinal']:"";
		$id_respon = (isset($_POST['id_respon']) && !empty($_POST['id_respon']))?$_POST['id_respon']:"";
		
		if($id_respon == -1){
			
			echo json_encode(array('sts' => '00', 'status'=>'02' ,'message' =>'Maaf, Status Data sudah Sending To Ceisa!' ));		
			die();
			
		}else{


			$token = $this->session->userdata('s_token');
			$tgl = date('Y-m-d');
			
			if($isFinal=='true') {
				$url = "https://apis-gw.beacukai.go.id/openapi/document?isFinal=true";
				if($noDaftar != ''){
					$url = "https://apis-gw.beacukai.go.id/openapi/document?isFinal=true&isRevision=true";
				}
			} else {
				$url = "https://apis-gw.beacukai.go.id/openapi/document";
			}
			
			
			//$url = "https://apis-gw.beacukai.go.id/openapi/document";
		
			//echo $custom_type_id;
			//die();
			
			$q = $this->db->query('
			 SELECT "bc_in_header_id"
				  ,"asalData"
				  ,cast(asuransi as decimal(18,2)) as "asuransi"
				  ,cast(bruto as decimal(18,4)) as "bruto"
				  ,0 as "biayaTambahan"
				  ,0 as "biayaPengurang"
				  ,cast(cif as decimal(18,2)) as "cif"
				  ,"disclaimer"
				  ,"flagCurah"
				  ,"flagMigas"
				  ,cast(fob as decimal(18,2)) as "fob"
				  ,cast(freight as decimal(18,2)) as "freight"
				  ,"hargaPenyerahan"
				  ,COALESCE("idPengguna",'. "''" .') as "idPengguna"
				  ,"jabatanTtd"
				  ,"jumlahKontainer"
				  ,COALESCE("kodeAsuransi",'. "''" .') as "kodeAsuransi"
				  ,COALESCE("kodeCaraBayar",'. "''" .') as "kodeCaraBayar"
				  ,COALESCE("kodeCaraDagang",'. "''" .') as "kodeCaraDagang"
				  ,"kodeDokumen"
				  ,COALESCE("kodeIncoterm",'. "''" .') as "kodeIncoterm"
				  --,COALESCE("kodeJenisEkspor",'. "''" .') as "kodeJenisEkspor"
				  ,"kodeJenisNilai"
				  ,"kodeJenisProsedur"
				  ,"kodeJenisTpb"
				  ,COALESCE("kodeKantor",'. "''" .') as "kodeKantor"
				  ,COALESCE("kodeKantorBongkar",'. "''" .') as "kodeKantorBongkar"
				  ,COALESCE("kodeKenaPajak",'. "'1'" .') as "kodeKenaPajak"
				  --,COALESCE("kodeKantorEkspor",'. "''" .') as "kodeKantorEkspor"
				  ,"kodeKantorMuat"
				  ,COALESCE("kodeKantorPeriksa",'. "''" .') AS "kodeKantorPeriksa"
				  ,COALESCE("kodeKategoriEkspor",'. "''" .') AS "kodeKategoriEkspor"
				  ,"kodeKantorTujuan"
				  ,COALESCE("kodeLokasi",'. "'2'" .') AS "kodeLokasi"
				  ,"kodeLokasiBayar"
				  --,"kodeNegaraTujuan"
				  ,"kodePelBongkar"
				  ,"kodePelEkspor"
				  ,"kodePelMuat"
				  ,COALESCE("kodePelTransit",'. "''" .') AS "kodePelTransit"
				  ,"kodePelTujuan"
				  ,COALESCE("kodePembayar",'. "''" .') AS "kodePembayar"
				  ,"kodeTps"
				  ,"kodeTujuanPemasukan" 
				  ,"kodeTujuanTpb" 
				  ,COALESCE("kodeTutupPu",'. "''" .') AS "kodeTutupPu"
				  ,COALESCE("kotaTtd",'. "''" .') AS "kotaTtd"
				  ,"kodeValuta"
				  ,COALESCE("namaTtd",'. "''" .') AS "namaTtd"
				  ,cast(ndpbm as decimal(18,2)) as "ndpbm"
				  ,cast(netto as decimal(18,4)) as "netto"
				  ,"nilaiBarang"
				  ,"nilaiJasa"
				  ,"nik"
				  ,"nilaiMaklon"
				  ,"nomorAju"
				  ,COALESCE("nomorBc11",'. "''" .') AS "nomorBc11"
				  ,COALESCE("posBc11",'. "''" .') AS "posBc11"
				  ,"seri"
				  ,COALESCE("subposBc11",'. "''" .') AS "subposBc11"
				  ,"tanggalAju"
				  ,"tglAkhirBerlaku"
				  ,"tglAwalBerlaku"
				  ,"tanggalBc11"
				  ,"tanggalTiba"
				  ,"tanggalPeriksa"
				  ,"tanggalTtd"
				  ,"tempatStuffing"
				  ,"totalDanaSawit"
				  ,"uangMuka"
				  ,'. "'Lilies'" .' AS "userPortal"
				  ,"vd"
				  ,"volume"
				  
			FROM dbo.view_custom_import_ceisa40 where "bc_in_header_id" = ' . $bc_in_header_id . '

			');
			
			$arr = array();
			$arb = array();
			$arbd = array();
			$art = array();
			$arvd = array();
			$arsk = array();
			$arbp = array();
			$ar_bank = array();
			$ar_jaminan = array();
			$arbahanbaku = array();
			$ar_entitas = array();
			$ar_kemasan = array();
			$ar_kontainer = array();
			$ar_dokumen = array();
			$ar_pengangkut = array();
			$ar_pungutan = array();
			$ar_kesiapanBarang = array();
			$i=0;
			
			/* var_dump($q->result());
			die();
			 */
			foreach($q->result() as $row) {
				$arr[$i]['asalData']=$row->asalData;
				$arr[$i]['asuransi']=(float)$row->asuransi;
				$arr[$i]['biayaPengurang']=(float)$row->biayaPengurang;
				$arr[$i]['biayaTambahan']=(float)$row->biayaTambahan;
				$arr[$i]['bruto']=(float)$row->bruto;
				$arr[$i]['cif']=(float)$row->cif;
				$arr[$i]['disclaimer']=$row->disclaimer;
				$arr[$i]['fob']=(float)$row->fob;
				$arr[$i]['freight']=(float)$row->freight;
				$arr[$i]['hargaPenyerahan']=(float)$row->hargaPenyerahan;
				$arr[$i]['jabatanTtd']=$row->jabatanTtd;
				$arr[$i]['jumlahKontainer']=intval($row->jumlahKontainer);
				$arr[$i]['kodeAsuransi']=$row->kodeAsuransi;
				$arr[$i]['kodeDokumen']=$row->kodeDokumen;
				$arr[$i]['kodeIncoterm']=$row->kodeIncoterm;
				$arr[$i]['kodeKantor']=$row->kodeKantor;
				$arr[$i]['kodeKantorBongkar']=$row->kodeKantorBongkar;
				$arr[$i]['kodeKenaPajak']=$row->kodeKenaPajak;
				$arr[$i]['kodePelBongkar']=$row->kodePelBongkar;
				$arr[$i]['kodePelMuat']=$row->kodePelMuat;
				$arr[$i]['kodePelTransit']=$row->kodePelTransit;
				$arr[$i]['kodeTps']=$row->kodeTps;
				$arr[$i]['kodeTujuanPemasukan']=strval($row->kodeTujuanPemasukan);
				$arr[$i]['kodeTujuanTpb']=$row->kodeTujuanTpb;
				$arr[$i]['kodeTutupPu']=$row->kodeTutupPu;
				$arr[$i]['kodeValuta']=$row->kodeValuta;
				$arr[$i]['kotaTtd']=$row->kotaTtd;
				$arr[$i]['namaTtd']=$row->namaTtd;
				$arr[$i]['ndpbm']=(float)$row->ndpbm;
				$arr[$i]['netto']=(float)$row->netto;
				$arr[$i]['nik']=$row->nik;
				$arr[$i]['nilaiBarang']=(float)$row->nilaiBarang;
				$arr[$i]['nilaiIncoterm']=(float)$row->nilaiBarang;
				$arr[$i]['nomorAju']=str_replace('-','',$row->nomorAju);
				$arr[$i]['nomorBc11']=$row->nomorBc11;
				$arr[$i]['posBc11']=$row->posBc11;
				$arr[$i]['seri']=intval($row->seri);
				$arr[$i]['subposBc11']=$row->subposBc11;
				$arr[$i]['tanggalAju']=$row->tanggalAju;
				$arr[$i]['tanggalBc11']=$row->tanggalBc11;
				$arr[$i]['tanggalTiba']=$row->tanggalTiba;
				$arr[$i]['tanggalTtd']=$row->tanggalTtd;
				$arr[$i]['uangMuka']=(float)$row->uangMuka;
				$arr[$i]['vd']=(float)$row->vd;
			
					$qb = $this->db->query('
					SELECT 
					  "idBarang"
					  ,"bc_in_header_id"
					  ,"asuransi"
					  ,"cif"
					  ,"cifRupiah"
					  ,"diskon"
					  ,"freight"
					  ,"fob"
					  ,cast("hargaEkspor" as decimal(18,4)) as "hargaEkspor"
					  ,"hargaPatokan"
					  ,"hargaPenyerahan"
					  ,"hargaPerolehan"
					  ,"hargaSatuan"
					  ,"isiPerKemasan"
					  ,"jumlahKemasan"
					  ,"jumlahSatuan"
					  ,COALESCE("kodeAsalBahanBaku",'. "'0'" .') "kodeAsalBahanBaku"
					  ,"kodeAsalBarang"
					  ,"kodeBarang"
					  ,COALESCE("kodeDaerahAsal",'. "''" .') "kodeDaerahAsal"
					  ,"kodeDokumen"
					  ,"kodeDokAsal"
					  ,"kodeGunaBarang"
					  ,COALESCE("kodeJenisKemasan",'. "''" .') "kodeJenisKemasan"
					  ,COALESCE("kodeKategoriBarang",'. "''" .') "kodeKategoriBarang"
					  ,"kodeKondisiBarang"
					  ,COALESCE("kodeNegaraAsal",'. "'ID'" .') "kodeNegaraAsal"
					  ,"kodePerhitungan"
					  ,"kodeSatuanBarang"
					  ,COALESCE("merk",'. "''" .') "merk"
					  ,"ndpbm"
					  ,"netto"
					  ,"nilaiBarang"
					  ,"nilaiDanaSawit"
					  ,"nilaiJasa"
					  ,"nilaiTambah"
					  ,COALESCE("posTarif",'. "''" .') "posTarif"
					  ,ROW_NUMBER ( ) OVER ( PARTITION BY bc_in_header_id ORDER BY bc_in_header_id ) AS "seriBarang"
					  ,COALESCE("spesifikasiLain",'. "''" .') "spesifikasiLain"
					  ,COALESCE("tipe",'. "''" .') "tipe"
					  ,COALESCE("ukuran",'. "''" .') "ukuran"
					  ,"uangMuka"
					  ,"uraian"
					  ,"volume"
				  FROM dbo.view_custom_import_barang_ceisa40 where "bc_in_header_id" = ' . $bc_in_header_id . '
					 order by "idBarang"
					 
					');
					
					$b=0;
					
					//var_dump($qb->result());
					//die();
					
					foreach($qb->result() as $rb){
						$arb[$b]['asuransi']=(float)$rb->asuransi;
						$arb[$b]['cif']=(float)$rb->cif;
						$arb[$b]['cifRupiah']=(float)$rb->cifRupiah;
						$arb[$b]['diskon']=(float)$rb->diskon;
						$arb[$b]['fob']=(float)$rb->fob;
						$arb[$b]['freight']=(float)$rb->freight;
						$arb[$b]['hargaEkspor']=(float)$rb->hargaEkspor;
						$arb[$b]['hargaPatokan']=(float)$rb->hargaPatokan;
						$arb[$b]['hargaPenyerahan']=(float)$rb->hargaPenyerahan;
						$arb[$b]['hargaPerolehan']=(float)$rb->hargaPerolehan;
						$arb[$b]['hargaSatuan']=(float)$rb->hargaSatuan;
						$arb[$b]['isiPerKemasan']=intval($rb->isiPerKemasan);
						$arb[$b]['jumlahKemasan']=intval($rb->jumlahKemasan);
						$arb[$b]['jumlahSatuan']=(float)$rb->jumlahSatuan;
						$arb[$b]['kodeAsalBahanBaku']=$rb->kodeAsalBahanBaku;
						$arb[$b]['kodeAsalBarang']=$rb->kodeAsalBarang;
						$arb[$b]['kodeBarang']=$rb->kodeBarang;
						$arb[$b]['kodeDaerahAsal']=$rb->kodeDaerahAsal;
						$arb[$b]['kodeDokAsal']=$rb->kodeDokAsal;
						$arb[$b]['kodeDokumen']=$rb->kodeDokumen;
						$arb[$b]['kodeGunaBarang']=$rb->kodeGunaBarang;
						$arb[$b]['kodeJenisKemasan']=$rb->kodeJenisKemasan;
						$arb[$b]['kodeKategoriBarang']=$rb->kodeKategoriBarang;
						$arb[$b]['kodeKondisiBarang']=$rb->kodeKondisiBarang;
						$arb[$b]['kodeNegaraAsal']=$rb->kodeNegaraAsal;
						$arb[$b]['kodePerhitungan']=$rb->kodePerhitungan;
						$arb[$b]['kodeSatuanBarang']=$rb->kodeSatuanBarang;
						$arb[$b]['merk']=$rb->merk;
						$arb[$b]['ndpbm']=(float)$rb->ndpbm;
						$arb[$b]['netto']=(float)$rb->netto;
						$arb[$b]['nilaiBarang']=(float)$rb->cif;
						$arb[$b]['nilaiDanaSawit']=(float)$rb->nilaiDanaSawit;
						$arb[$b]['nilaiJasa']=(float)$rb->nilaiJasa;
						$arb[$b]['nilaiTambah']=(float)$rb->nilaiTambah;
						$arb[$b]['posTarif']=$rb->posTarif;
						$arb[$b]['seriBarang']=intval($rb->seriBarang);
						$arb[$b]['spesifikasiLain']=$rb->spesifikasiLain;
						$arb[$b]['tipe']=$rb->tipe;
						$arb[$b]['uangMuka']=$rb->uangMuka;
						$arb[$b]['ukuran']=$rb->ukuran;
						$arb[$b]['uraian']=$rb->uraian;
						$arb[$b]['volume']=(float)$rb->volume;
					
					$art = array();
					$idBarang = $rb->idBarang;
					$qt = $this->db->query('

						SELECT "idBarang",
							bc_in_header_id,
							custom_type_id,
							"posTarif",
							"jumlahSatuan",
							"kodeSatuanBarang",
							kodefasilitastarif,
							kodejenispungutan,
							kodejenistarif,
							nilaibayar,
							0 as "nilaiSudahDilunasi",
							seribarang,
							tarif,
							100 as tariffasilitas,
							nilai_pungutan
						FROM
							dbo.view_ceisa40_barang_tarif 
						where "bc_in_header_id" = ' . $bc_in_header_id . ' and 	"idBarang" = ' . $idBarang . '

					');

					$t=0;
					
					//var_dump($qt->result());
					//die();
					
					foreach($qt->result() as $rt){
						$art[$t]['jumlahSatuan']=intval($rt->jumlahSatuan);
						$art[$t]['kodeFasilitasTarif']=$rt->kodefasilitastarif;
						$art[$t]['kodeJenisPungutan']=$rt->kodejenispungutan;
						$art[$t]['kodeJenisTarif']=$rt->kodejenistarif;
						$art[$t]['kodeSatuanBarang']=$rt->kodeSatuanBarang;
						$art[$t]['nilaiBayar']=(float)$rt->nilaibayar;
						$art[$t]['nilaiFasilitas']=(float)$rt->nilai_pungutan;
						$art[$t]['nilaiSudahDilunasi']=(float)$rt->nilaiSudahDilunasi;
						$art[$t]['seriBarang']=intval($rt->seribarang);
						$art[$t]['tarif']=(float)$rt->tarif;
						$art[$t]['tarifFasilitas']=(float)$rt->tariffasilitas;

					$t++;
					}
					
					$arb[$b]['bahanBaku']=$arbahanbaku;
					$arb[$b]['barangTarif']=$art;
					$arb[$b]['barangDokumen']=$arbd;
					$arb[$b]['barangPemilik']=$arbp;


					$b++;

					}


				$arr[$i]['barang']=$arb;
					
			
			if($custom_type_id == '2'){	
				$qei = $this->db->query('
					
						SELECT "bc_in_header_id"
						  ,"custom_type_id"
						  ,COALESCE("alamatentitas",'. "''" .') as alamatentitas
						  ,inisialentitas
						  ,kodeentitas
						  ,kodejenisapi
						  ,CAST(kodeJenisIdentitas AS VARCHAR) as kodejenisidentitas
						  ,kodenegara
						  ,COALESCE(CAST(kodestatus AS VARCHAR),'. "'0'" .') as kodestatus
						  ,namaentitas
						  ,COALESCE(nibentitas,'. "'0'" .') as nibentitas 
						  ,'. "''" .' as niperentitas
						  ,COALESCE(nomoridentitas,'. "'0'" .') as nomoridentitas
						  ,nomorijinentitas
						  ,COALESCE(tanggalijinentitas,'. "'1900-01-01'" .') AS tanggalijinentitas
						  ,serientitas
					  FROM dbo.view_custom_import_entitas_ceisa40 where "bc_in_header_id" = ' . $bc_in_header_id . ' and kodeentitas <> '. "'1'" .'
						ORDER BY serientitas;

				');
			} else{
				$qei = $this->db->query('
					
						SELECT "bc_in_header_id"
						  ,"custom_type_id"
						  ,COALESCE(alamatentitas,'. "''" .') as alamatentitas
						  ,inisialentitas
						  ,kodeentitas
						  ,kodejenisapi
						  ,CAST(kodeJenisIdentitas AS VARCHAR) as kodejenisidentitas
						  ,kodenegara
						  ,COALESCE(CAST(kodestatus AS VARCHAR),'. "'0'" .') as kodestatus
						  ,COALESCE(namaentitas,'. "''" .') as namaentitas
						  ,COALESCE(nibentitas,'. "'0'" .') as nibentitas 
						  ,'. "''" .' as niperentitas
						  ,COALESCE(nomoridentitas,'. "''" .') as nomoridentitas
						  ,COALESCE(nomorijinentitas,'. "''" .') as nomorijinentitas
						  ,COALESCE(tanggalijinentitas,'. "'1900-01-01'" .') AS tanggalijinentitas
						  ,serientitas
					  FROM dbo.view_custom_import_entitas_ceisa40_bc262 where "bc_in_header_id" = ' . $bc_in_header_id . ' and kodeentitas <> '. "'1'" .'
						ORDER BY serientitas;

				');
				
			};
			
			$ei=0;
			foreach($qei->result() as $rei){
				$ar_entitas[$ei]['alamatEntitas']=$rei->alamatentitas;
				$ar_entitas[$ei]['kodeEntitas']=$rei->kodeentitas;
				$ar_entitas[$ei]['kodeJenisApi']=strval($rei->kodejenisapi);
				$ar_entitas[$ei]['kodeJenisIdentitas']=$rei->kodejenisidentitas;
				$ar_entitas[$ei]['kodeNegara']=$rei->kodenegara;
				$ar_entitas[$ei]['kodeStatus']=$rei->kodestatus;
				$ar_entitas[$ei]['namaEntitas']=$rei->namaentitas;
				$ar_entitas[$ei]['nibEntitas']=$rei->nibentitas;
				$ar_entitas[$ei]['niperEntitas']=$rei->niperentitas;
				$ar_entitas[$ei]['nomorIdentitas']=$rei->nomoridentitas;
				$ar_entitas[$ei]['nomorIjinEntitas']=$rei->nomorijinentitas;
				$ar_entitas[$ei]['seriEntitas']=intval($rei->serientitas);
				$ar_entitas[$ei]['tanggalIjinEntitas']=$rei->tanggalijinentitas;
				
				$ei++;
			}
			
			$q_kemasan = $this->db->query('

					SELECT
						bc_out_header_id,
						bc_in_header_id,
						jumlahKemasan,
						kodejeniskemasan,
						coalesce(merkkemasan,'. "''" .') as merkkemasan,
						ROW_NUMBER ( ) OVER ( PARTITION BY bc_in_header_id ORDER BY bc_in_header_id ) AS serikemasan
					FROM dbo.view_custom_kemasan_ceisa40
					WHERE "bc_in_header_id" = ' . $bc_in_header_id . '

			');

			$kemasan=0;
			//var_dump($q_kemasan->result());
			//die();
			foreach($q_kemasan->result() as $r_kemasan){
				$ar_kemasan[$kemasan]['jumlahKemasan']=intval($r_kemasan->jumlahkemasan);
				$ar_kemasan[$kemasan]['kodeJenisKemasan']=$r_kemasan->kodejeniskemasan;
				$ar_kemasan[$kemasan]['merkKemasan']=$r_kemasan->merkkemasan;
				$ar_kemasan[$kemasan]['seriKemasan']=intval($r_kemasan->serikemasan);

			$kemasan++;
			}
			
			$q_kontainer = $this->db->query("

				SELECT
					dt_ceisa_kontainer.id_kontainer,
					dt_ceisa_kontainer.bc_out_header_id,
					dt_ceisa_kontainer.bc_in_header_id,
					dt_ceisa_kontainer.custom_type_id,
					dt_ceisa_kontainer.kode_jenis_kontainer AS id_jenis,
					dt_ceisa_kontainer.kode_tipe_kontainer AS id_tipe,
					dt_ceisa_kontainer.kode_ukuran_kontainer AS id_ukuran,
					dt_ceisa_kontainer.seri_kontainer AS seriKontainer,
					referensi_jenis_kontainer.kode_jenis_kontainer as kodeJenisKontainer, 
					referensi_tipe_kontainer.kode_tipe_kontainer as kodeTipeKontainer,
					referensi_ukuran_kontainer.kode_ukuran_kontainer as kodeUkuranKontainer,
					dt_ceisa_kontainer.nomor_kontainer AS nomorKontainer 
				FROM
					dbo.dt_ceisa_kontainer
					LEFT JOIN dbo.referensi_jenis_kontainer ON dt_ceisa_kontainer.kode_jenis_kontainer :: TEXT = referensi_jenis_kontainer.id_jenis_kontainer
					LEFT JOIN dbo.referensi_tipe_kontainer ON dt_ceisa_kontainer.kode_tipe_kontainer :: TEXT = referensi_tipe_kontainer.id_tipe_kontainer ::
					TEXT LEFT JOIN dbo.referensi_ukuran_kontainer ON dt_ceisa_kontainer.kode_ukuran_kontainer :: TEXT = referensi_ukuran_kontainer.id_ukuran_kontainer :: TEXT where bc_in_header_id = $bc_in_header_id and dbo.referensi_jenis_kontainer.kode_jenis_kontainer = '8'

			");

			$kontainer=0;
			//var_dump($q_kontainer->result());
			//die();
			foreach($q_kontainer->result() as $r_kontainer){
				$ar_kontainer[$kontainer]['kodeJenisKontainer']=$r_kontainer->kodejeniskontainer;
				$ar_kontainer[$kontainer]['kodeTipeKontainer']=$r_kontainer->kodetipekontainer;
				$ar_kontainer[$kontainer]['kodeUkuranKontainer']=$r_kontainer->kodeukurankontainer;
				$ar_kontainer[$kontainer]['nomorKontainer']=$r_kontainer->nomorkontainer;
				$ar_kontainer[$kontainer]['seriKontainer']=intval($r_kontainer->serikontainer);

			$kontainer++;
			}
			
			$q_dokumen = $this->db->query("

				 SELECT dt_ceisa_dokumen.id_dokumen as idDokumen,
					dt_ceisa_dokumen.bc_out_header_id,
					dt_ceisa_dokumen.bc_in_header_id,
					dt_ceisa_dokumen.custom_type_id,
					dt_ceisa_dokumen.kode_fasilitas AS id_fasilitas,
					dt_ceisa_dokumen.kode_dokumen AS id_dok,
					dt_ceisa_dokumen.seri_dokumen AS seriDokumen,
					prm_custom_type.custom_type_name AS tipe_dok,
					referensi_fasilitas.kode_fasilitas,
					referensi_dokumen.kode_dokumen as kodeDokumen,
					dt_ceisa_dokumen.nomor_dokumen as nomorDokumen,
					dt_ceisa_dokumen.tanggal_dokumen as tanggalDokumen,
					dt_ceisa_dokumen.memo
				   FROM dbo.dt_ceisa_dokumen
					 LEFT JOIN dbo.referensi_dokumen ON dt_ceisa_dokumen.kode_dokumen = referensi_dokumen.id_dok
					 LEFT JOIN dbo.referensi_fasilitas ON dt_ceisa_dokumen.kode_fasilitas = referensi_fasilitas.id_fasilitas
					 LEFT JOIN dbo.prm_custom_type ON dt_ceisa_dokumen.custom_type_id = prm_custom_type.custom_type_id where bc_in_header_id = $bc_in_header_id
					order by seri_dokumen

			");
			
			$dokumen=0;
			//var_dump($q_dokumen->result());
			//die();
			foreach($q_dokumen->result() as $r_dokumen){
				$ar_dokumen[$dokumen]['idDokumen']=$r_dokumen->iddokumen;
				$ar_dokumen[$dokumen]['kodeDokumen']=$r_dokumen->kodedokumen;
				$ar_dokumen[$dokumen]['nomorDokumen']=$r_dokumen->nomordokumen;
				$ar_dokumen[$dokumen]['seriDokumen']=intval($r_dokumen->seridokumen);
				$ar_dokumen[$dokumen]['tanggalDokumen']=$r_dokumen->tanggaldokumen;

			$dokumen++;
			}
			
					
					
				$q_pengangkut = $this->db->query('

					SELECT  "bc_in_header_id"
					  ,COALESCE("kodeBendera",'. "'ID'" .') as "kodeBendera"
					  ,COALESCE("namaPengangkut",'. "'-'" .') as "namaPengangkut"
					  ,COALESCE("nomorPengangkut",'. "'-'" .') as "nomorPengangkut"
					  ,COALESCE("kodeCaraAngkut",1) as "kodeCaraAngkut"
					  ,'. "'1'" .' as "seriPengangkut"
					  FROM dbo.view_custom_pengangkut_ceisa40 where "bc_in_header_id" = ' . $bc_in_header_id . '

				');

			$pengangkut=0;
			foreach($q_pengangkut->result() as $r_pengangkut){
				$ar_pengangkut[$pengangkut]['idPengangkut']=$r_pengangkut->bc_in_header_id;
				$ar_pengangkut[$pengangkut]['kodeBendera']=$r_pengangkut->kodeBendera;
				$ar_pengangkut[$pengangkut]['namaPengangkut']=$r_pengangkut->namaPengangkut;
				$ar_pengangkut[$pengangkut]['nomorPengangkut']=$r_pengangkut->nomorPengangkut;
				$ar_pengangkut[$pengangkut]['kodeCaraAngkut']=$r_pengangkut->kodeCaraAngkut;
				$ar_pengangkut[$pengangkut]['seriPengangkut']=intval($r_pengangkut->seriPengangkut);

			$pengangkut++;
			}
			
			$q_pungutan = $this->db->query('

			SELECT '. "'1'" .' as idpungutan,
				a.bc_in_header_id,
				a.kodefasilitastarif,
				a.kodejenispungutan,
				cast(SUM(a.nilai_pungutan) as decimal(18,2)) AS "nilaiPungutan"
			FROM dbo.view_ceisa40_barang_tarif a
			WHERE "bc_in_header_id" = ' . $bc_in_header_id . '
			GROUP BY
				a.bc_in_header_id,
				a.kodefasilitastarif,
				a.kodejenispungutan

			');

			$pungutan=0;
			foreach($q_pungutan->result() as $r_pungutan){
				$ar_pungutan[$pungutan]['idPungutan']=$r_pungutan->idpungutan;
				$ar_pungutan[$pungutan]['kodeFasilitasTarif']=$r_pungutan->kodefasilitastarif;
				$ar_pungutan[$pungutan]['kodeJenisPungutan']=$r_pungutan->kodejenispungutan;
				$ar_pungutan[$pungutan]['nilaiPungutan']=(float)$r_pungutan->nilaiPungutan;

			$pungutan++;
			}
			
			/* $q_jaminan = $this->db->query("

					  SELECT bc_id
						,contract_id
						,idJaminan
						,kodeDokumenPabean
						,nomorAju
						,kodeJenisJaminan
						,nilaiJaminan
						,nomorBpj
						,nomorJaminan
						,penjamin
						,tanggalBpj
						,tanggalJaminan
						,tanggalJatuhTempo
						FROM dbo.view_ceisa40_jaminan_ok where bc_id = $bc_out_header_id and kodeDokumenPabean = '262'
						
				");
					
				$jaminan=0;
				foreach($q_jaminan->result() as $r_jaminan){
					$ar_jaminan[$jaminan]['idJaminan']=$r_jaminan->idJaminan;
					$ar_jaminan[$jaminan]['kodeJenisJaminan']=$r_jaminan->kodeJenisJaminan;
					$ar_jaminan[$jaminan]['nilaiJaminan']=(float)$r_jaminan->nilaiJaminan;
					$ar_jaminan[$jaminan]['nomorBpj']=$r_jaminan->nomorBpj;
					$ar_jaminan[$jaminan]['nomorJaminan']=$r_jaminan->nomorJaminan;
					$ar_jaminan[$jaminan]['penjamin']=$r_jaminan->penjamin;
					$ar_jaminan[$jaminan]['tanggalBpj']=$r_jaminan->tanggalBpj;
					$ar_jaminan[$jaminan]['tanggalJaminan']=$r_jaminan->tanggalJaminan;
					$ar_jaminan[$jaminan]['tanggalJatuhTempo']=$r_jaminan->tanggalJatuhTempo;

				$jaminan++;
				} */

				$arr[$i]['jaminan']=$ar_jaminan;
				$arr[$i]['pungutan']=$ar_pungutan;
				$arr[$i]['entitas']=$ar_entitas;
				$arr[$i]['kemasan']=$ar_kemasan;
				$arr[$i]['kontainer']=$ar_kontainer;
				$arr[$i]['dokumen']=$ar_dokumen;
				$arr[$i]['pengangkut']=$ar_pengangkut;

			$i++;
		   //------------
		}
		
			
			$array= $arr[0];
			
			$datanya= json_encode($array);
			//echo $datanya;
			//die();
			
			$curl = curl_init($url);
			
			curl_setopt($curl, CURLOPT_URL, $url);
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			$headers = array(
			   "Authorization: Bearer $token",
			   "Content-Type: application/json"
			);
			//echo $token . "<br>"; 
			//var_dump($headers);
			//die();
			curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
				
			curl_setopt($curl, CURLOPT_POSTFIELDS, $datanya);
			

			//for debug only!
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			
			$resp = curl_exec($curl);
			
			curl_close($curl);

			$status_ceisa = json_decode($resp, true);
			//var_dump($status_ceisa);
			//die();
			$asuw = isset($status_ceisa["Exception"])?$status_ceisa["Exception"]:'aw';
			if($asuw == 'aw'){
				if($status_ceisa['status'] == 'OK'){
				$q = $this->db->query("
					update dbo.dt_bc_in_header set id_respon = -1,
												   mode = '$isFinal' 
					where bc_in_header_id = $bc_in_header_id;
				");
				
				echo json_encode(array('sts' => '00','status'=>$status_ceisa['status'] ,'message' =>$status_ceisa['message'],'dataStatus' =>'Sukses!'  ));
				
				
			} else {
				if (isset($status_ceisa['status'])){
					echo json_encode(array('sts' => '00','status'=>$status_ceisa['status'] ,'message' =>$status_ceisa['message'],'dataStatus' =>'Failed!'));
				} else {
					echo json_encode(array('sts' => '00','status' => "Informasi", 'message' => "<hr> Under Maintanence Server" ) );	
					//echo json_encode(array('sts' => '00','status'=>'Informasi:','message' => "Maaf, Tidak Terhubung ke server CEISA40, Silahkan Hub Kami di ( 021 - 4890308 ext 333)"));	
					die();
				}
			}
			} else {
				echo json_encode(array('sts' => '00', 'status'=>'02' ,'message' =>$asuw,'dataStatus' =>'Koneksi terputus, Silahkan Login CEISA kembali!' ));		
				die();
				
			}
		
		}

	}
	
	function send_to_ceisa_bc40(){
		$bc_in_header_id =  (isset($_POST['bc_in_header_id']) && !empty($_POST['bc_in_header_id']))?$_POST['bc_in_header_id']:die('{"status":"ERROR","message":" Param Header ID Tidak Ditemukan"}');
		$custom_type_id =  (isset($_POST['custom_type_id']) && !empty($_POST['custom_type_id']))?$_POST['custom_type_id']:"";
		$noDaftar = (isset($_POST['bc_no']) && !empty($_POST['bc_no']))?$_POST['bc_no']:"";
		$isFinal = (isset($_POST['isFinal']) && !empty($_POST['isFinal']))?$_POST['isFinal']:"";
		$id_respon = (isset($_POST['id_respon']) && !empty($_POST['id_respon']))?$_POST['id_respon']:"";
		
		if($id_respon == -1){
			
			echo json_encode(array('sts' => '00', 'status'=>'02' ,'message' =>'Maaf, Status Data sudah Sending To Ceisa!' ));		
			die();
			
		}else{


			$token = $this->session->userdata('s_token');
			$tgl = date('Y-m-d');
			
			if($isFinal=='true') {
				$url = "https://apis-gw.beacukai.go.id/openapi/document?isFinal=true";
				if($noDaftar != ''){
					$url = "https://apis-gw.beacukai.go.id/openapi/document?isFinal=true&isRevision=true";
				}
			} else {
				$url = "https://apis-gw.beacukai.go.id/openapi/document";
			}
			
			
			//$url = "https://apis-gw.beacukai.go.id/openapi/document";
		
			//echo $custom_type_id;
			//die();

			$q = $this->db->query('
				SELECT "bc_in_header_id"
				  ,"asalData"
				  ,cast(asuransi as decimal(18,2)) as "asuransi"
				  ,cast(bruto as decimal(18,4)) as "bruto"
				  ,0 as "biayaTambahan"
				  ,0 as "biayaPengurang"
				  ,cast(cif as decimal(18,2)) as "cif"
				  ,"disclaimer"
				  ,"flagCurah"
				  ,"flagMigas"
				  ,cast(fob as decimal(18,2)) as "fob"
				  ,cast(freight as decimal(18,2)) as "freight"
				  ,"hargaPenyerahan"
				  ,COALESCE("idPengguna",'. "''" .') as "idPengguna"
				  ,"jabatanTtd"
				  ,"jumlahKontainer"
				  ,COALESCE("kodeAsuransi",'. "''" .') as "kodeAsuransi"
				  ,COALESCE("kodeCaraBayar",'. "''" .') as "kodeCaraBayar"
				  ,COALESCE("kodeCaraDagang",'. "''" .') as "kodeCaraDagang"
				  ,"kodeDokumen"
				  ,COALESCE("kodeIncoterm",'. "''" .') as "kodeIncoterm"
				  --,COALESCE("kodeJenisEkspor",'. "''" .') as "kodeJenisEkspor"
				  ,"kodeJenisNilai"
				  ,"kodeJenisProsedur"
				  ,"kodeJenisTpb"
				  ,COALESCE("kodeKantor",'. "''" .') as "kodeKantor"
				  ,COALESCE("kodeKantorBongkar",'. "''" .') as "kodeKantorBongkar"
				  ,COALESCE("kodeKenaPajak",'. "'1'" .') as "kodeKenaPajak"
				  --,COALESCE("kodeKantorEkspor",'. "''" .') as "kodeKantorEkspor"
				  ,"kodeKantorMuat"
				  ,COALESCE("kodeKantorPeriksa",'. "''" .') AS "kodeKantorPeriksa"
				  ,COALESCE("kodeKategoriEkspor",'. "''" .') AS "kodeKategoriEkspor"
				  ,"kodeKantorTujuan"
				  ,COALESCE("kodeLokasi",'. "'2'" .') AS "kodeLokasi"
				  ,"kodeLokasiBayar"
				  --,"kodeNegaraTujuan"
				  ,"kodePelBongkar"
				  ,"kodePelEkspor"
				  ,"kodePelMuat"
				  ,COALESCE("kodePelTransit",'. "''" .') AS "kodePelTransit"
				  ,"kodePelTujuan"
				  ,COALESCE("kodePembayar",'. "''" .') AS "kodePembayar"
				  ,"kodeTps"
				  ,"kodeTujuanPemasukan" 
				  ,"kodeTujuanPengiriman" 
				  ,"kodeTujuanTpb" 
				  ,COALESCE("kodeTutupPu",'. "''" .') AS "kodeTutupPu"
				  ,COALESCE("kotaTtd",'. "''" .') AS "kotaTtd"
				  ,"kodeValuta"
				  ,COALESCE("namaTtd",'. "''" .') AS "namaTtd"
				  ,cast(ndpbm as decimal(18,2)) as "ndpbm"
				  ,cast(netto as decimal(18,4)) as "netto"
				  ,"nilaiBarang"
				  ,"nilaiMaklon" as "nilaiJasa"
				  ,"nik"
				  ,"nilaiMaklon"
				  ,"nomorAju"
				  ,COALESCE("nomorBc11",'. "''" .') AS "nomorBc11"
				  ,COALESCE("posBc11",'. "''" .') AS "posBc11"
				  ,"seri"
				  ,COALESCE("subposBc11",'. "''" .') AS "subposBc11"
				  ,"tanggalAju"
				  ,"tglAkhirBerlaku"
				  ,"tglAwalBerlaku"
				  ,"tanggalBc11"
				  ,"tanggalTiba"
				  ,"tanggalPeriksa"
				  ,"tanggalTtd"
				  ,"tempatStuffing"
				  ,"totalDanaSawit"
				  ,"uangMuka"
				  ,'. "'Lilies'" .' AS "userPortal"
				  ,"vd"
				  ,"volume"
				  
			FROM dbo.view_custom_import_ceisa40 where "bc_in_header_id" = ' . $bc_in_header_id . '

			');

			$arr = array();
			$arb = array();
			$arbd = array();
			$art = array();
			$arvd = array();
			$arsk = array();
			$arbp = array();
			$arbahanbaku = array();
			$ar_entitas = array();
			$ar_kemasan = array();
			$ar_kontainer = array();
			$ar_dokumen = array();
			$ar_pengangkut = array();
			$ar_pungutan = array();
			$i=0;

				foreach($q->result() as $row) {
					$arr[$i]['asalData']=$row->asalData;
					$arr[$i]['asuransi']=(float)$row->asuransi;
					$arr[$i]['bruto']=(float)$row->bruto;
					$arr[$i]['cif']=(float)$row->cif;
					$arr[$i]['kodeJenisTpb']=$row->kodeJenisTpb;
					$arr[$i]['freight']=(float)$row->freight;
					$arr[$i]['hargaPenyerahan']=(float)$row->hargaPenyerahan;
					$arr[$i]['idPengguna']=$row->idPengguna;
					$arr[$i]['jabatanTtd']=$row->jabatanTtd;
					$arr[$i]['jumlahKontainer']=intval($row->jumlahKontainer);
					$arr[$i]['kodeDokumen']=$row->kodeDokumen;
					$arr[$i]['kodeKantor']=$row->kodeKantor;
					$arr[$i]['kodeTujuanPengiriman']=strval($row->kodeTujuanPengiriman);
					$arr[$i]['kotaTtd']=$row->kotaTtd;
					$arr[$i]['namaTtd']=$row->namaTtd;
					$arr[$i]['netto']=(float)$row->netto;
					$arr[$i]['nik']=$row->nik;
					$arr[$i]['nomorAju']=str_replace('-','',$row->nomorAju);
					$arr[$i]['seri']=intval($row->seri);
					$arr[$i]['tanggalAju']=$row->tanggalAju;
					$arr[$i]['tanggalTtd']=$row->tanggalTtd;
					$arr[$i]['volume']=(float)$row->volume;
					$arr[$i]['biayaPengurang']=(float)$row->biayaPengurang;
					$arr[$i]['biayaTambahan']=(float)$row->biayaTambahan;
					$arr[$i]['vd']=(float)$row->vd;
					$arr[$i]['uangMuka']=(float)$row->uangMuka;
					$arr[$i]['nilaiJasa']=(float)$row->nilaiJasa;

						$qei = $this->db->query('

						SELECT "bc_in_header_id"
						  ,"custom_type_id"
						  ,alamatentitas
						  ,inisialentitas
						  ,kodeentitas
						  ,kodejenisapi
						  ,CAST(kodeJenisIdentitas AS VARCHAR) as kodejenisidentitas
						  ,kodenegara
						  ,COALESCE(CAST(kodestatus AS VARCHAR),'. "'0'" .') as kodestatus
						  ,namaentitas
						  ,COALESCE(nibentitas,'. "'0'" .') as nibentitas 
						  ,'. "''" .' as niperentitas
						  ,COALESCE(nomoridentitas,'. "''" .') as nomoridentitas
						  ,COALESCE(nomorijinentitas,'. "''" .') as nomorijinentitas
						  ,COALESCE(tanggalijinentitas,'. "'1900-01-01'" .') AS tanggalijinentitas
						  ,serientitas
					  FROM dbo.view_custom_import_entitas_ceisa40_bc262 where "bc_in_header_id" = ' . $bc_in_header_id . ' and kodeentitas <> '. "'1'" .'
						ORDER BY serientitas;

					');

					$ei=0;
					foreach($qei->result() as $rei){
						$ar_entitas[$ei]['alamatEntitas']=$rei->alamatentitas;
						$ar_entitas[$ei]['kodeEntitas']=$rei->kodeentitas;
						$ar_entitas[$ei]['kodeJenisApi']=$rei->kodejenisapi;
						$ar_entitas[$ei]['kodeJenisIdentitas']=$rei->kodejenisidentitas;
						$ar_entitas[$ei]['kodeNegara']=$rei->kodenegara;
						$ar_entitas[$ei]['kodeStatus']=$rei->kodestatus;
						$ar_entitas[$ei]['namaEntitas']=$rei->namaentitas;
						$ar_entitas[$ei]['nibEntitas']=$rei->nibentitas;
						$ar_entitas[$ei]['nomorIdentitas']=$rei->nomoridentitas;
						$ar_entitas[$ei]['nomorIjinEntitas']=$rei->nomorijinentitas;
						$ar_entitas[$ei]['tanggalIjinEntitas']=$rei->tanggalijinentitas;
						$ar_entitas[$ei]['seriEntitas']=intval($rei->serientitas);

					$ei++;
					}
			
					$q_kemasan = $this->db->query('

					SELECT
						bc_out_header_id,
						bc_in_header_id,
						jumlahkemasan,
						kodejeniskemasan,
						coalesce(merkkemasan,'. "''" .') as merkkemasan,
						ROW_NUMBER ( ) OVER ( PARTITION BY bc_in_header_id ORDER BY bc_in_header_id ) AS serikemasan
					FROM dbo.view_custom_kemasan_ceisa40
					WHERE "bc_in_header_id" = ' . $bc_in_header_id . '

					');

					$kemasan=0;
					foreach($q_kemasan->result() as $r_kemasan){
						$ar_kemasan[$kemasan]['jumlahKemasan']=intval($r_kemasan->jumlahkemasan);
						$ar_kemasan[$kemasan]['kodeJenisKemasan']=$r_kemasan->kodejeniskemasan;
						$ar_kemasan[$kemasan]['merkKemasan']=$r_kemasan->merkkemasan;
						$ar_kemasan[$kemasan]['seriKemasan']=intval($r_kemasan->serikemasan);

					$kemasan++;
					}

					/* $q_kontainer = $this->db->query("

						SELECT ID_HEADER
						  ,kodeJenisKontainer
						  ,kodeTipeKontainer
						  ,kodeUkuranKontainer
						  ,nomorKontainer
						  ,seriKontainer
					  FROM dbo.view_ceisa40_kontainer where ID_HEADER = $ID_HEADER

					");

					$kontainer=0;
					foreach($q_kontainer->result() as $r_kontainer){
						$ar_kontainer[$kontainer]['kodeJenisKontainer']=$r_kontainer->kodeJenisKontainer;
						$ar_kontainer[$kontainer]['kodeTipeKontainer']=$r_kontainer->kodeTipeKontainer;
						$ar_kontainer[$kontainer]['kodeUkuranKontainer']=$r_kontainer->kodeUkuranKontainer;
						$ar_kontainer[$kontainer]['nomorKontainer']=$r_kontainer->nomorKontainer;
						$ar_kontainer[$kontainer]['seriKontainer']=intval($r_kontainer->seriKontainer);

					$kontainer++;
					} */

					$q_dokumen = $this->db->query("

						SELECT dt_ceisa_dokumen.id_dokumen as idDokumen,
							dt_ceisa_dokumen.bc_out_header_id,
							dt_ceisa_dokumen.bc_in_header_id,
							dt_ceisa_dokumen.custom_type_id,
							dt_ceisa_dokumen.kode_fasilitas AS id_fasilitas,
							dt_ceisa_dokumen.kode_dokumen AS id_dok,
							dt_ceisa_dokumen.seri_dokumen AS seriDokumen,
							prm_custom_type.custom_type_name AS tipe_dok,
							referensi_fasilitas.kode_fasilitas,
							referensi_dokumen.kode_dokumen as kodeDokumen,
							dt_ceisa_dokumen.nomor_dokumen as nomorDokumen,
							dt_ceisa_dokumen.tanggal_dokumen as tanggalDokumen,
							dt_ceisa_dokumen.memo
						FROM dbo.dt_ceisa_dokumen
							 LEFT JOIN dbo.referensi_dokumen ON dt_ceisa_dokumen.kode_dokumen = referensi_dokumen.id_dok
							 LEFT JOIN dbo.referensi_fasilitas ON dt_ceisa_dokumen.kode_fasilitas = referensi_fasilitas.id_fasilitas
							 LEFT JOIN dbo.prm_custom_type ON dt_ceisa_dokumen.custom_type_id = prm_custom_type.custom_type_id 
						where bc_in_header_id = $bc_in_header_id
							order by seri_dokumen

					");
					
					$dokumen=0;
					foreach($q_dokumen->result() as $r_dokumen){
						$ar_dokumen[$dokumen]['idDokumen']=$r_dokumen->iddokumen;
						$ar_dokumen[$dokumen]['kodeDokumen']=$r_dokumen->kodedokumen;
						$ar_dokumen[$dokumen]['nomorDokumen']=$r_dokumen->nomordokumen;
						$ar_dokumen[$dokumen]['seriDokumen']=intval($r_dokumen->seridokumen);
						$ar_dokumen[$dokumen]['tanggalDokumen']=$r_dokumen->tanggaldokumen;

					$dokumen++;
					}

					$q_pengangkut = $this->db->query('

						SELECT  "bc_in_header_id"
							  ,COALESCE("kodeBendera",'. "'ID'" .') as "kodeBendera"
							  ,COALESCE("namaPengangkut",'. "'XXX'" .') as "namaPengangkut"
							  ,COALESCE("nomorPengangkut",'. "'123456'" .') as "nomorPengangkut"
							  ,COALESCE("kodeCaraAngkut",'. "'0'" .') as "kodeCaraAngkut"
							  ,'. "'1'" .' as "seriPengangkut"
							  FROM dbo.view_custom_pengangkut_ceisa40 where "bc_in_header_id" = ' . $bc_in_header_id . '

					');

					$pengangkut=0;
					foreach($q_pengangkut->result() as $r_pengangkut){
						$ar_pengangkut[$pengangkut]['kodeBendera']=$r_pengangkut->kodeBendera;
						$ar_pengangkut[$pengangkut]['namaPengangkut']=$r_pengangkut->namaPengangkut;
						$ar_pengangkut[$pengangkut]['nomorPengangkut']=$r_pengangkut->nomorPengangkut;
						$ar_pengangkut[$pengangkut]['kodeCaraAngkut']=$r_pengangkut->kodeCaraAngkut;
						$ar_pengangkut[$pengangkut]['seriPengangkut']=intval($r_pengangkut->seriPengangkut);

					$pengangkut++;
					}
			
					$q_pungutan = $this->db->query('

						SELECT a.bc_in_header_id,
							a.kodefasilitastarif,
							a.kodejenispungutan,
							SUM ( a.nilai_pungutan ) AS nilaipungutan 
						FROM dbo.view_ceisa40_barang_tarif a
						where "bc_in_header_id" = ' . $bc_in_header_id . ' and kodejenispungutan = '. "'PPN'" .'
						GROUP BY
							a.bc_in_header_id,
							a.kodefasilitastarif,
							a.kodejenispungutan
					');

					$pungutan=0;
					foreach($q_pungutan->result() as $r_pungutan){
						$ar_pungutan[$pungutan]['kodeFasilitasTarif']=$r_pungutan->kodefasilitastarif;
						$ar_pungutan[$pungutan]['kodeJenisPungutan']=$r_pungutan->kodejenispungutan;
						$ar_pungutan[$pungutan]['nilaiPungutan']=(float)$r_pungutan->nilaipungutan;

					$pungutan++;
					}

				$arr[$i]['entitas']=$ar_entitas;
				$arr[$i]['dokumen']=$ar_dokumen;
				$arr[$i]['pengangkut']=$ar_pengangkut;
				$arr[$i]['kontainer']=$ar_kontainer;
				$arr[$i]['kemasan']=$ar_kemasan;
				$arr[$i]['pungutan']=$ar_pungutan;

					$qb = $this->db->query('
						SELECT 
						  "idBarang"
						  ,"bc_in_header_id"
						  ,"asuransi"
						  ,"bruto"
						  ,"cif"
						  ,"cifRupiah"
						  ,"diskon"
						  ,"freight"
						  ,"fob"
						  ,cast("hargaEkspor" as decimal(18,4)) as "hargaEkspor"
						  ,"hargaPatokan"
						  ,"hargaPenyerahan"
						  ,"hargaPerolehan"
						  ,"hargaSatuan"
						  ,"isiPerKemasan"
						  ,"jumlahKemasan"
						  ,"jumlahSatuan"
						  ,"jumlahRealisasi"
						  ,COALESCE("kodeAsalBahanBaku",'. "'0'" .') "kodeAsalBahanBaku"
						  ,"kodeAsalBarang"
						  ,"kodeBarang"
						  ,COALESCE("kodeDaerahAsal",'. "''" .') "kodeDaerahAsal"
						  ,"kodeDokumen"
						  ,"kodeDokAsal"
						  ,"kodeGunaBarang"
						  ,COALESCE("kodeJenisKemasan",'. "''" .') "kodeJenisKemasan"
						  ,"kodeKategoriBarang"
						  ,"kodeKondisiBarang"
						  ,"kodeNegaraAsal"
						  ,"kodePerhitungan"
						  ,"kodeSatuanBarang"
						  ,COALESCE("merk",'. "''" .') "merk"
						  ,"ndpbm"
						  ,"netto"
						  ,"nilaiBarang"
						  ,"nilaiDanaSawit"
						  ,"nilaiJasa"
						  ,"nilaiTambah"
						  ,COALESCE("posTarif",'. "''" .') "posTarif"
						  ,ROW_NUMBER ( ) OVER ( PARTITION BY bc_in_header_id ORDER BY bc_in_header_id ) AS "seriBarang"
						  ,COALESCE("spesifikasiLain",'. "''" .') "spesifikasiLain"
						  ,COALESCE("tipe",'. "''" .') "tipe"
						  ,COALESCE("ukuran",'. "''" .') "ukuran"
						  ,"uangMuka"
						  ,"uraian"
						  ,"volume"
					  FROM dbo.view_custom_import_barang_ceisa40 where "bc_in_header_id" = ' . $bc_in_header_id . '
						 order by "idBarang"
					');
					$b=0;
					
					foreach($qb->result() as $rb){
						$arb[$b]['asuransi']=(float)$rb->asuransi;
						$arb[$b]['bruto']=(float)$rb->bruto;
						$arb[$b]['cif']=(float)$rb->cif;
						$arb[$b]['diskon']=(float)$rb->diskon;
						$arb[$b]['hargaEkspor']=(float)$rb->hargaEkspor;
						$arb[$b]['hargaPenyerahan']=(float)$rb->hargaPenyerahan;
						$arb[$b]['hargaSatuan']=(float)$rb->hargaSatuan;
						$arb[$b]['isiPerKemasan']=intval($rb->isiPerKemasan);
						$arb[$b]['jumlahKemasan']=(float)$rb->jumlahKemasan;
						$arb[$b]['jumlahRealisasi']=(float)$rb->jumlahRealisasi;
						$arb[$b]['jumlahSatuan']=(float)$rb->jumlahSatuan;
						$arb[$b]['kodeBarang']=$rb->kodeBarang;
						$arb[$b]['kodeDokumen']=$rb->kodeDokumen;
						$arb[$b]['kodeJenisKemasan']=$rb->kodeJenisKemasan;
						$arb[$b]['kodeSatuanBarang']=$rb->kodeSatuanBarang;
						$arb[$b]['merk']=$rb->merk;
						$arb[$b]['netto']=(float)$rb->netto;
						$arb[$b]['nilaiBarang']=(float)$rb->nilaiBarang;
						$arb[$b]['nilaiTambah']=(float)$rb->nilaiTambah;
						$arb[$b]['posTarif']=$rb->posTarif;
						$arb[$b]['seriBarang']=intval($rb->seriBarang);
						$arb[$b]['spesifikasiLain']=$rb->spesifikasiLain;
						$arb[$b]['tipe']=$rb->tipe;
						$arb[$b]['ukuran']=$rb->ukuran;
						$arb[$b]['uraian']=$rb->uraian;
						$arb[$b]['volume']=(float)$rb->volume;
						$arb[$b]['cifRupiah']=(float)$rb->cifRupiah;
						$arb[$b]['hargaPerolehan']=(float)$rb->hargaPerolehan;
						$arb[$b]['kodeAsalBahanBaku']=$rb->kodeAsalBahanBaku;
						$arb[$b]['ndpbm']=(float)$rb->ndpbm;
						$arb[$b]['uangMuka']=(float)$rb->uangMuka;
						$arb[$b]['nilaiJasa']=(float)$rb->nilaiJasa;

						/* $qbd = $this->db->query("

							SELECT 
							id
							,'' as seriDokumen

							  FROM dbo.view_ceisa40_barang where ID_HEADER = $ID_HEADER

						");

						$bd=0;
						foreach($qbd->result() as $rbd){
							$arbd[$bd]['seriDokumen']=$rbd->seriDokumen;
							
						$bd++;
						}
					
						$qbp = $this->db->query("

								SELECT  id
								  ,ID_HEADER
								  ,seriBarang
								  ,seriBarang as seriBarangPemilik
								  ,2 as seriEntitas
								  FROM dbo.view_ceisa40_barang where ID_HEADER = $ID_HEADER

							");

						$bp=0;
						foreach($qbp->result() as $rbp){
							$arbp[$bp]['seriBarang']=$rbp->seriBarang;
							$arbp[$bp]['seriBarangPemilik']=$rbp->seriBarangPemilik;
							$arbp[$bp]['seriEntitas']=$rbp->seriEntitas;

						$bp++;
						} */
					
						$art = array();
						$idBarang = $rb->idBarang;
						$qt = $this->db->query('

							SELECT "idBarang",
								bc_in_header_id,
								custom_type_id,
								"posTarif",
								"jumlahSatuan",
								"kodeSatuanBarang",
								kodefasilitastarif,
								kodejenispungutan,
								kodejenistarif,
								nilaibayar,
								tariffasilitas as nilaifasilitas,
								"nilaiSudahDilunasi",
								seribarang,
								tarif,
								100 as tariffasilitas 
							FROM
								dbo.view_ceisa40_barang_tarif_bc40
							where "bc_in_header_id" = ' . $bc_in_header_id . ' and 	"idBarang" = ' . $idBarang . '

						');

						$t=0;

						foreach($qt->result() as $rt){
							$art[$t]['jumlahSatuan']=intval($rt->jumlahSatuan);
							$art[$t]['kodeFasilitasTarif']=$rt->kodefasilitastarif;
							$art[$t]['kodeJenisPungutan']=$rt->kodejenispungutan;
							$art[$t]['kodeJenisTarif']=$rt->kodejenistarif;
							$art[$t]['kodeSatuanBarang']=$rt->kodeSatuanBarang;
							$art[$t]['nilaiBayar']=(float)$rt->nilaibayar;
							$art[$t]['nilaiFasilitas']=(float)$rt->nilaifasilitas;
							$art[$t]['nilaiSudahDilunasi']=(float)$rt->nilaiSudahDilunasi;
							$art[$t]['seriBarang']=intval($rt->seribarang);
							$art[$t]['tarif']=(float)$rt->tarif;
							$art[$t]['tarifFasilitas']=(float)$rt->tariffasilitas;

						$t++;
						}
		
					$arb[$b]['barangTarif']=$art;

				$b++;

					}

				$arr[$i]['barang']=$arb;
				
				$i++;
		
			}
		

			$array= $arr[0];
			$datanya= json_encode($array);
			//echo $datanya;
			//die();
			
			$curl = curl_init($url);
			
			curl_setopt($curl, CURLOPT_URL, $url);
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			$headers = array(
			   "Authorization: Bearer $token",
			   "Content-Type: application/json"
			);
			//echo $token . "<br>"; 
			//var_dump($headers);
			//die();
			curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
				
			curl_setopt($curl, CURLOPT_POSTFIELDS, $datanya);
			

			//for debug only!
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			
			$resp = curl_exec($curl);
			
			curl_close($curl);

			$status_ceisa = json_decode($resp, true);
			//var_dump($status_ceisa);
			//die();
			$asuw = isset($status_ceisa["Exception"])?$status_ceisa["Exception"]:'aw';
			if($asuw == 'aw'){
				if($status_ceisa['status'] == 'OK'){
				$q = $this->db->query("
					update dbo.dt_bc_in_header set id_respon = -1,
								   mode = '$isFinal' 
					where bc_in_header_id = $bc_in_header_id;

				");
				
				echo json_encode(array('sts' => '00','status'=>$status_ceisa['status'] ,'message' =>$status_ceisa['message'],'dataStatus' =>'Sukses!'  ));
				
				
			} else {
				if (isset($status_ceisa['status'])){
					echo json_encode(array('sts' => '00','status'=>$status_ceisa['status'] ,'message' =>$status_ceisa['message'],'dataStatus' =>'Failed!'));
				} else {
					echo json_encode(array('sts' => '00','status'=>"Informasi" ,'message' => " <hr> Under Maintanence Server"));	
					//echo json_encode(array('sts' => '00','status'=>'Informasi:','message' => "Maaf, Tidak Terhubung ke server CEISA40, Silahkan Hub Kami di ( 021 - 4890308 ext 333)"));	
					die();
				}
			}
			} else {
				echo json_encode(array('sts' => '00', 'status'=>'02' ,'message' =>$asuw,'dataStatus' =>'Koneksi terputus, Silahkan Login CEISA kembali!' ));		
				die();
				
			}
		}	
			

	}
	
	function send_to_ceisa_bc20(){
		$bc_in_header_id =  (isset($_POST['bc_in_header_id']) && !empty($_POST['bc_in_header_id']))?$_POST['bc_in_header_id']:die('{"status":"ERROR","message":" Param Header ID Tidak Ditemukan"}');
		$custom_type_id =  (isset($_POST['custom_type_id']) && !empty($_POST['custom_type_id']))?$_POST['custom_type_id']:"";
		$noDaftar = (isset($_POST['bc_no']) && !empty($_POST['bc_no']))?$_POST['bc_no']:"";
		$isFinal = (isset($_POST['isFinal']) && !empty($_POST['isFinal']))?$_POST['isFinal']:"";
		$id_respon = (isset($_POST['id_respon']) && !empty($_POST['id_respon']))?$_POST['id_respon']:"";
		
		if($id_respon == -1){
			
			echo json_encode(array('sts' => '00', 'status'=>'02' ,'message' =>'Maaf, Status Data sudah Sending To Ceisa!' ));		
			die();
			
		}else{


			$token = $this->session->userdata('s_token');
			$tgl = date('Y-m-d');
			
			if($isFinal=='true') {
				$url = "https://apis-gw.beacukai.go.id/openapi/document?isFinal=true";
				if($noDaftar != ''){
					$url = "https://apis-gw.beacukai.go.id/openapi/document?isFinal=true&isRevision=true";
				}
			} else {
				$url = "https://apis-gw.beacukai.go.id/openapi/document";
			}
			

			$q = $this->db->query('
			 SELECT "bc_in_header_id"
				  ,"asalData"
				  ,cast(asuransi as decimal(18,2)) as "asuransi"
				  ,cast(bruto as decimal(18,4)) as "bruto"
				  ,0 as "biayaTambahan"
				  ,0 as "biayaPengurang"
				  ,cast(cif as decimal(18,2)) as "cif"
				  ,"disclaimer"
				  ,"flagCurah"
				  ,"flagMigas"
				  ,"flagVd"
				  ,cast(fob as decimal(18,2)) as "fob"
				  ,cast(freight as decimal(18,2)) as "freight"
				  ,"hargaPenyerahan"
				  ,COALESCE("idPengguna",'. "''" .') as "idPengguna"
				  ,"jabatanTtd"
				  ,'. "'1'" .' as "jenisPib"
				  ,"jumlahKontainer"
				  ,1 as "jumlahTandaPengaman"
				  ,COALESCE("kodeAsuransi",'. "''" .') as "kodeAsuransi"
				  ,COALESCE("kodeCaraBayar",'. "''" .') as "kodeCaraBayar"
				  ,COALESCE("kodeCaraDagang",'. "''" .') as "kodeCaraDagang"
				  ,"kodeDokumen"
				  ,COALESCE("kodeIncoterm",'. "''" .') as "kodeIncoterm"
				  ,"kodeJenisImpor"
				  ,"kodeJenisNilai"
				  ,"kodeJenisProsedur"
				  ,"kodeJenisTpb"
				  ,COALESCE("kodeKantor",'. "''" .') as "kodeKantor"
				  ,COALESCE("kodeKantorBongkar",'. "''" .') as "kodeKantorBongkar"
				  ,COALESCE("kodeKenaPajak",'. "'1'" .') as "kodeKenaPajak"
				  --,COALESCE("kodeKantorEkspor",'. "''" .') as "kodeKantorEkspor"
				  ,"kodeKantorMuat"
				  ,COALESCE("kodeKantorPeriksa",'. "''" .') AS "kodeKantorPeriksa"
				  ,COALESCE("kodeKategoriEkspor",'. "''" .') AS "kodeKategoriEkspor"
				  ,"kodeKantorTujuan"
				  ,COALESCE("kodeLokasi",'. "'2'" .') AS "kodeLokasi"
				  ,"kodeLokasiBayar"
				  --,"kodeNegaraTujuan"
				  ,"kodePelBongkar"
				  ,"kodePelEkspor"
				  ,"kodePelMuat"
				  ,COALESCE("kodePelTransit",'. "''" .') AS "kodePelTransit"
				  ,COALESCE("kodePelTujuan",'. "''" .') AS "kodePelTujuan"
				  ,COALESCE("kodePembayar",'. "''" .') AS "kodePembayar"
				  ,"kodeTps"
				  ,"kodeTujuanPemasukan" 
				  ,"kodeTujuanTpb" 
				  ,COALESCE("kodeTutupPu",'. "''" .') AS "kodeTutupPu"
				  ,COALESCE("kotaTtd",'. "''" .') AS "kotaTtd"
				  ,"kodeValuta"
				  ,COALESCE("namaTtd",'. "''" .') AS "namaTtd"
				  ,cast(ndpbm as decimal(18,2)) as "ndpbm"
				  ,cast(netto as decimal(18,4)) as "netto"
				  ,"nilaiBarang"
				  ,"nilaiJasa"
				  ,"nik"
				  ,"nilaiMaklon"
				  ,"nomorAju"
				  ,COALESCE("nomorBc11",'. "''" .') AS "nomorBc11"
				  ,COALESCE("posBc11",'. "''" .') AS "posBc11"
				  ,"seri"
				  ,COALESCE("subposBc11",'. "''" .') AS "subposBc11"
				  ,"tanggalAju"
				  ,"tglAkhirBerlaku"
				  ,"tglAwalBerlaku"
				  ,"tanggalBc11"
				  ,"tanggalTiba"
				  ,"tanggalPeriksa"
				  ,"tanggalTtd"
				  ,"tempatStuffing"
				  ,"totalDanaSawit"
				  ,"uangMuka"
				  ,'. "''" .' AS "userPortal"
				  ,"vd"
				  ,"volume"
				  
			FROM dbo.view_custom_import_ceisa40 where "bc_in_header_id" = ' . $bc_in_header_id . '

			');
			
			$arr = array();	
			$arb = array();	
			$arbd = array();	
			$art = array();	
			$arvd = array();	
			$arsk = array();	
			$arbp = array();	
			$ar_entitas = array();	
			$ar_kemasan = array();	
			$ar_kontainer = array();	
			$ar_dokumen = array();	
			$ar_pengangkut = array();	
			$i=0;	
			
		foreach($q->result() as $row) {
				$arr[$i]['asalData']=$row->asalData;
				$arr[$i]['asuransi']=(float)$row->asuransi;
				$arr[$i]['biayaPengurang']=(float)$row->biayaPengurang;
				$arr[$i]['biayaTambahan']=(float)$row->biayaTambahan;
				$arr[$i]['bruto']=(float)$row->bruto;
				$arr[$i]['cif']=(float)$row->cif;
				$arr[$i]['disclaimer']=$row->disclaimer;
				$arr[$i]['flagVd']=$row->flagVd;
				$arr[$i]['fob']=(float)$row->fob;
				$arr[$i]['freight']=(float)$row->freight;
				$arr[$i]['hargaPenyerahan']=(float)$row->hargaPenyerahan;
				$arr[$i]['idPengguna']=$row->idPengguna;
				$arr[$i]['jabatanTtd']=$row->jabatanTtd;
				$arr[$i]['jenisPib']=$row->jenisPib;
				$arr[$i]['jumlahKontainer']=intval($row->jumlahKontainer);
				$arr[$i]['jumlahTandaPengaman']=$row->jumlahTandaPengaman;
				$arr[$i]['kodeAsuransi']=$row->kodeAsuransi;
				$arr[$i]['kodeCaraBayar']=$row->kodeCaraBayar;
				$arr[$i]['kodeDokumen']=$row->kodeDokumen;
				$arr[$i]['kodeIncoterm']=$row->kodeIncoterm;
				$arr[$i]['kodeJenisImpor']=$row->kodeJenisImpor;
				$arr[$i]['kodeJenisNilai']=$row->kodeJenisNilai;
				$arr[$i]['kodeJenisProsedur']=$row->kodeJenisProsedur;
				$arr[$i]['kodeKantor']=$row->kodeKantor;
				$arr[$i]['kodePelMuat']=$row->kodePelMuat;
				$arr[$i]['kodePelTransit']=$row->kodePelTransit;
				$arr[$i]['kodePelTujuan']=$row->kodePelTujuan;
				$arr[$i]['kodeTps']=$row->kodeTps;
				$arr[$i]['kodeTutupPu']=$row->kodeTutupPu;
				$arr[$i]['kodeValuta']=$row->kodeValuta;
				$arr[$i]['kotaTtd']=$row->kotaTtd;
				$arr[$i]['namaTtd']=$row->namaTtd;
				$arr[$i]['ndpbm']=(float)$row->ndpbm;
				$arr[$i]['netto']=(float)$row->netto;
				$arr[$i]['nilaiBarang']=(float)$row->nilaiBarang;
				$arr[$i]['nilaiIncoterm']=(float)$row->nilaiBarang;
				$arr[$i]['nilaiMaklon']=(float)$row->nilaiMaklon;
				$arr[$i]['nomorAju']=str_replace('-','',$row->nomorAju);
				$arr[$i]['nomorBc11']=$row->nomorBc11;
				$arr[$i]['posBc11']=$row->posBc11;
				$arr[$i]['seri']=intval($row->seri);
				$arr[$i]['subposBc11']=$row->subposBc11;
				$arr[$i]['tanggalAju']=$row->tanggalAju;
				$arr[$i]['tanggalBc11']=$row->tanggalBc11;
				$arr[$i]['tanggalTiba']=$row->tanggalTiba;
				$arr[$i]['tanggalTtd']=$row->tanggalTtd;
				$arr[$i]['totalDanaSawit']=(float)$row->totalDanaSawit;
				$arr[$i]['vd']=(float)$row->vd;
				$arr[$i]['volume']=(float)$row->volume;
				
				$qb = $this->db->query('
					SELECT 
					  "idBarang"
					  ,"bc_in_header_id"
					  ,"asuransi"
					  ,"bruto"
					  ,"cif"
					  ,"cifRupiah"
					  ,"diskon"
					  ,"freight"
					  ,"fob"
					  ,cast("hargaEkspor" as decimal(18,4)) as "hargaEkspor"
					  ,"hargaPatokan"
					  ,"hargaPenyerahan"
					  ,"hargaPerolehan"
					  ,"hargaSatuan"
					  ,"isiPerKemasan"
					  ,0 as "jumlahBahanBaku"
					  ,0 as "jumlahDilekatkan"
					  ,"jumlahKemasan"
					  ,0 as "jumlahPitaCukai"
					  ,"jumlahSatuan"
					  ,"jumlahSatuan"
					  ,0 as "kapasitasSilinder"
					  ,COALESCE("kodeAsalBahanBaku",'. "'0'" .') "kodeAsalBahanBaku"
					  ,"kodeAsalBarang"
					  ,"kodeBarang"
					  ,COALESCE("kodeDaerahAsal",'. "''" .') "kodeDaerahAsal"
					  ,"kodeDokumen"
					  ,"kodeDokAsal"
					  ,"kodeGunaBarang"
					  ,"kodeJenisKemasan"
					  ,"kodeKategoriBarang"
					  ,"kodeKondisiBarang"
					  ,"kodeNegaraAsal"
					  ,"kodePerhitungan"
					  ,"kodeSatuanBarang"
					  ,COALESCE("merk",'. "''" .') "merk"
					  ,"ndpbm"
					  ,"netto"
					  ,"nilaiBarang"
					  ,"nilaiDanaSawit"
					  ,0 "nilaiDevisa"
					  ,"nilaiJasa"
					  ,"nilaiTambah"
					  ,'. "'T'" .' as "pernyataanLartas"
					  ,0 as "persentaseImpor"
					  ,"posTarif"
					  ,0 as "saldoAkhir"
					  ,0 as "saldoAwal"
					  ,ROW_NUMBER ( ) OVER ( PARTITION BY "bc_in_header_id" ORDER BY "bc_in_header_id" ) AS "seriBarang"
					  ,0 as "seriBarangDokAsal"
					  ,0 "seriIjin"
					  ,COALESCE("spesifikasiLain",'. "''" .') "spesifikasiLain"
					  ,COALESCE("tipe",'. "''" .') "tipe"
					  ,0 as "tahunPembuatan"
					  ,0 as "tarifCukai"
					  ,COALESCE("ukuran",'. "''" .') "ukuran"
					  ,"uangMuka"
					  ,"uraian"
					  ,"volume"
				  FROM dbo.view_custom_import_barang_ceisa40 where "bc_in_header_id" = ' . $bc_in_header_id . '
					 order by "idBarang"
					 
					');
				
				$b=0;
				foreach($qb->result() as $rb){
					$arb[$b]['asuransi']=(float)$rb->asuransi;
					$arb[$b]['bruto']=(float)$rb->bruto;
					$arb[$b]['cif']=(float)$rb->cif;
					$arb[$b]['cifRupiah']=(float)$rb->cifRupiah;
					$arb[$b]['diskon']=(float)$rb->diskon;
					$arb[$b]['fob']=(float)$rb->fob;
					$arb[$b]['freight']=(float)$rb->freight;
					$arb[$b]['hargaEkspor']=(float)$rb->hargaEkspor;
					$arb[$b]['hargaPatokan']=(float)$rb->hargaPatokan;
					$arb[$b]['hargaPenyerahan']=(float)$rb->hargaPenyerahan;
					$arb[$b]['hargaPerolehan']=(float)$rb->hargaPerolehan;
					$arb[$b]['hargaSatuan']=(float)$rb->hargaSatuan;
					$arb[$b]['hjeCukai']=(float)$rb->hargaSatuan;
					$arb[$b]['isiPerKemasan']=intval($rb->isiPerKemasan);
					$arb[$b]['jumlahBahanBaku']=intval($rb->jumlahBahanBaku);
					$arb[$b]['jumlahDilekatkan']=(float)$rb->jumlahDilekatkan;
					$arb[$b]['jumlahKemasan']=(float)$rb->jumlahKemasan;
					$arb[$b]['jumlahPitaCukai']=(float)$rb->jumlahPitaCukai;
					$arb[$b]['jumlahRealisasi']=(float)$rb->jumlahSatuan;
					$arb[$b]['jumlahSatuan']=(float)$rb->jumlahSatuan;
					$arb[$b]['kapasitasSilinder']=(float)$rb->kapasitasSilinder;
					$arb[$b]['kodeJenisKemasan']=$rb->kodeJenisKemasan;
					$arb[$b]['kodeKondisiBarang']=$rb->kodeKondisiBarang;
					$arb[$b]['kodeNegaraAsal']=$rb->kodeNegaraAsal;
					$arb[$b]['kodeSatuanBarang']=$rb->kodeSatuanBarang;
					$arb[$b]['merk']=$rb->merk;
					$arb[$b]['ndpbm']=(float)$rb->ndpbm;
					$arb[$b]['netto']=(float)$rb->netto;
					$arb[$b]['nilaiBarang']=(float)$rb->nilaiBarang;
					$arb[$b]['nilaiDanaSawit']=(float)$rb->nilaiDanaSawit;
					$arb[$b]['nilaiDevisa']=(float)$rb->nilaiDevisa;
					$arb[$b]['nilaiTambah']=(float)$rb->nilaiTambah;
					$arb[$b]['pernyataanLartas']=$rb->pernyataanLartas;
					$arb[$b]['persentaseImpor']=intval($rb->persentaseImpor);
					$arb[$b]['posTarif']=$rb->posTarif;
					$arb[$b]['saldoAkhir']=intval($rb->saldoAkhir);
					$arb[$b]['saldoAwal']=intval($rb->saldoAwal);
					$arb[$b]['seriBarang']=intval($rb->seriBarang);
					$arb[$b]['seriBarangDokAsal']=(float)$rb->seriBarangDokAsal;
					$arb[$b]['seriIjin']=$rb->seriIjin;
					$arb[$b]['tahunPembuatan']=intval($rb->tahunPembuatan);
					$arb[$b]['tarifCukai']=(float)$rb->tarifCukai;
					$arb[$b]['tipe']=$rb->tipe;
					$arb[$b]['uraian']=$rb->uraian;
					$arb[$b]['volume']=(float)$rb->volume;
						
						/* $qbd = $this->db->query('

							SELECT 
							"idBarang"
							,1 as "seriDokumen"

							  FROM dbo.view_custom_export_barang_ceisa40 where "bc_out_header_id" = ' . $bc_in_header_id . '

						');

						$bd=0;
						foreach($qbd->result() as $rbd){
							$arbd[$bd]['seriDokumen']=intval($rbd->seriDokumen);
							
						$bd++; */
				
					$art = array();
					$idBarang = $rb->idBarang;
					$qt = $this->db->query('

						SELECT "idBarang",
							bc_in_header_id,
							custom_type_id,
							"posTarif",
							"jumlahSatuan",
							"kodeSatuanBarang",
							kodefasilitastarif,
							kodejenispungutan,
							kodejenistarif,
							nilaibayar,
							nilai_pungutan as nilaifasilitas,
							0 as "nilaiSudahDilunasi",
							ROW_NUMBER ( ) OVER ( PARTITION BY "idBarang" ORDER BY "idBarang" ) AS seribarang,
							tarif,
							tariffasilitas,
							nilai_pungutan
						FROM
							dbo.view_ceisa40_barang_tarif_bc20
						where "bc_in_header_id" = ' . $bc_in_header_id . ' and 	"idBarang" = ' . $idBarang . '

					');
					
					$t=0;
					
					foreach($qt->result() as $rt){
						$art[$t]['jumlahSatuan']=intval($rt->jumlahSatuan);
						$art[$t]['kodeFasilitasTarif']=$rt->kodefasilitastarif;
						$art[$t]['kodeJenisPungutan']=$rt->kodejenispungutan;
						$art[$t]['kodeJenisTarif']=$rt->kodejenistarif;
						$art[$t]['nilaiBayar']=(float)$rt->nilaibayar;
						$art[$t]['nilaiFasilitas']=(float)$rt->nilaifasilitas;
						$art[$t]['seriBarang']=intval($rt->seribarang);
						$art[$t]['tarif']=(float)$rt->tarif;
						$art[$t]['tarifFasilitas']=(float)$rt->tariffasilitas;
					
						$t++;
					}
					
					
				
				/* $qvd = $this->db->query("
					
					SELECT bc_in_detail_id
					  ,bc_in_header_id
					  ,ISNULL(kodeJenisVd, '') AS kodeJenisVd
					  ,cast(nilaiBarangVd as decimal(18,2)) as nilaiBarangVd
					FROM dbo.tbl_bc_in_detail where bc_in_header_id = $bc_in_header_id
				
				"); 
					
				$vd=0;
				foreach($qvd->result() as $rvd){
					$arvd[$vd]['kodeJenisVd']=$rvd->kodeJenisVd;
					$arvd[$vd]['nilaiBarangVd']=(float)$rvd->nilaiBarangVd;

					$vd++;
				}*/
				
				/* $qsk = $this->db->query("
						
					SELECT idBarangSpekKhusus
						  ,bc_in_detail_id
						  ,bc_in_header_id
						  ,seriBarangSpekKhusus
						  ,kodeSpekKhusus
						  ,uraianSpekKhusus
					FROM dbo.tbl_barangSpekKhusus where bc_in_header_id = $bc_in_header_id
					
				"); 
				
				$sk=0;
				foreach($qsk->result() as $rsk){
					$arsk[$sk]['seriBarangSpekKhusus']=$rsk->seriBarangSpekKhusus;
					$arsk[$sk]['kodeSpekKhusus']=$rsk->kodeSpekKhusus;

					$sk++;
				} */
				
				 $arbp = array();
					$idBarang = $rb->idBarang;
					$qbp = $this->db->query('

						SELECT "idBarang"
						  ,"bc_out_header_id"
						  ,"seriBarang"
						  ,2 as "seriBarangPemilik"
						  ,2 as "seriEntitas"
						 FROM dbo.view_custom_export_barang_ceisa40 where "bc_out_header_id" = ' . $bc_in_header_id . '

					');

					$bp=0;
					foreach($qbp->result() as $rbp){
						$arbp[$bp]['seriBarang']=$rbp->seriBarang;
						$arbp[$bp]['seriBarangPemilik']=$rbp->seriBarangPemilik;
						$arbp[$bp]['seriEntitas']=$rbp->seriEntitas;

					$bp++;
				}
				
				$arb[$i]['barangDokumen']=$arbd;
				$arb[$b]['barangTarif']=$art;	
				$arb[$i]['barangVd']=$arvd;
				$arb[$i]['barangSpekKhusus']=$arsk;
				$arb[$i]['barangPemilik']=$arbp;
				
				$b++;
				
			}
			
			
			$arr[$i]['barang']=$arb;
			
				$qei = $this->db->query('
						
					SELECT "bc_in_header_id"
					  ,"custom_type_id"
						  ,alamatentitas
						  ,inisialentitas
						  ,kodeentitas
						  ,kodejenisapi
						  ,CAST(kodeJenisIdentitas AS VARCHAR) as kodejenisidentitas
						  ,kodenegara
						  ,COALESCE(CAST(kodestatus AS VARCHAR),'. "'0'" .') as kodestatus
						  ,namaentitas
						  ,COALESCE(nibentitas,'. "'0'" .') as nibentitas 
						  ,'. "''" .' as niperentitas
						  ,COALESCE(nomoridentitas,'. "''" .') as nomoridentitas
						  ,COALESCE(nomorijinentitas,'. "''" .') as nomorijinentitas
						  ,COALESCE(tanggalijinentitas,'. "'1900-01-01'" .') AS tanggalijinentitas
						  ,serientitas
				  FROM dbo.view_custom_import_entitas_ceisa40_bc20 where "bc_in_header_id" = ' . $bc_in_header_id . ' and kodeentitas <> '. "'3'" .'
					ORDER BY serientitas;

					');
				
				$ei=0;
				foreach($qei->result() as $rei){
					$ar_entitas[$ei]['alamatEntitas']=$rei->alamatentitas;
					$ar_entitas[$ei]['kodeEntitas']=$rei->kodeentitas;
					$ar_entitas[$ei]['kodeJenisApi']=$rei->kodejenisapi;
					$ar_entitas[$ei]['kodeJenisIdentitas']=$rei->kodejenisidentitas;
					$ar_entitas[$ei]['kodeStatus']=$rei->kodestatus;
					$ar_entitas[$ei]['kodeNegara']=$rei->kodenegara;
					$ar_entitas[$ei]['namaEntitas']=$rei->namaentitas;
					$ar_entitas[$ei]['nibEntitas']=$rei->nibentitas;
					$ar_entitas[$ei]['nomorIdentitas']=$rei->nomoridentitas;
					$ar_entitas[$ei]['seriEntitas']=$rei->serientitas;

				$ei++;
				}
				
				$q_kemasan = $this->db->query('

					SELECT
						bc_out_header_id,
						bc_in_header_id,
						jumlahkemasan,
						kodejeniskemasan,
						coalesce(merkkemasan,'. "''" .') as merkkemasan,
						ROW_NUMBER ( ) OVER ( PARTITION BY bc_in_header_id ORDER BY bc_in_header_id ) AS serikemasan 
					FROM dbo.view_custom_kemasan_ceisa40
					WHERE "bc_in_header_id" = ' . $bc_in_header_id . '

				');
					
				$kemasan=0;
				foreach($q_kemasan->result() as $r_kemasan){
					$ar_kemasan[$kemasan]['jumlahKemasan']=intval($r_kemasan->jumlahkemasan);
					$ar_kemasan[$kemasan]['kodeJenisKemasan']=$r_kemasan->kodejeniskemasan;
					$ar_kemasan[$kemasan]['merkKemasan']=$r_kemasan->merkkemasan;
					$ar_kemasan[$kemasan]['seriKemasan']=intval($r_kemasan->serikemasan);

				$kemasan++;
				}
				
				$q_kontainer = $this->db->query('

				SELECT
					dt_ceisa_kontainer.id_kontainer,
					dt_ceisa_kontainer.bc_out_header_id,
					dt_ceisa_kontainer.bc_in_header_id,
					dt_ceisa_kontainer.custom_type_id,
					dt_ceisa_kontainer.kode_jenis_kontainer AS id_jenis,
					dt_ceisa_kontainer.kode_tipe_kontainer AS id_tipe,
					dt_ceisa_kontainer.kode_ukuran_kontainer AS id_ukuran,
					dt_ceisa_kontainer.seri_kontainer AS "seriKontainer",
					referensi_jenis_kontainer.kode_jenis_kontainer as "kodeJenisKontainer", 
					referensi_tipe_kontainer.kode_tipe_kontainer as "kodeTipeKontainer",
					referensi_ukuran_kontainer.kode_ukuran_kontainer as "kodeUkuranKontainer",
					dt_ceisa_kontainer.nomor_kontainer AS "nomorKontainer" 
				FROM
					dbo.dt_ceisa_kontainer
					LEFT JOIN dbo.referensi_jenis_kontainer ON dt_ceisa_kontainer.kode_jenis_kontainer :: TEXT = referensi_jenis_kontainer.id_jenis_kontainer
					LEFT JOIN dbo.referensi_tipe_kontainer ON dt_ceisa_kontainer.kode_tipe_kontainer :: TEXT = referensi_tipe_kontainer.id_tipe_kontainer ::
					TEXT LEFT JOIN dbo.referensi_ukuran_kontainer ON dt_ceisa_kontainer.kode_ukuran_kontainer :: TEXT = referensi_ukuran_kontainer.id_ukuran_kontainer :: TEXT 
				where "bc_in_header_id" = ' . $bc_in_header_id . ' and dbo.referensi_jenis_kontainer.kode_jenis_kontainer = '. "'8'" .'

				');
					
				$kontainer=0;
				foreach($q_kontainer->result() as $r_kontainer){
					$ar_kontainer[$kontainer]['kodeJenisKontainer']=$r_kontainer->kodeJenisKontainer;
					$ar_kontainer[$kontainer]['kodeTipeKontainer']=$r_kontainer->kodeTipeKontainer;
					$ar_kontainer[$kontainer]['kodeUkuranKontainer']=$r_kontainer->kodeUkuranKontainer;
					$ar_kontainer[$kontainer]['nomorKontainer']=$r_kontainer->nomorKontainer;
					$ar_kontainer[$kontainer]['seriKontainer']=intval($r_kontainer->seriKontainer);

				$kontainer++;
				}
				
				$q_dokumen = $this->db->query('

				 SELECT dt_ceisa_dokumen.id_dokumen as "idDokumen",
					dt_ceisa_dokumen.bc_out_header_id,
					dt_ceisa_dokumen.bc_in_header_id,
					dt_ceisa_dokumen.custom_type_id,
					dt_ceisa_dokumen.kode_fasilitas AS id_fasilitas,
					dt_ceisa_dokumen.kode_dokumen AS id_dok,
					dt_ceisa_dokumen.seri_dokumen AS "seriDokumen",
					prm_custom_type.custom_type_name AS tipe_dok,
					referensi_fasilitas.kode_fasilitas,
					referensi_dokumen.kode_dokumen as "kodeDokumen",
					dt_ceisa_dokumen.nomor_dokumen as "nomorDokumen",
					dt_ceisa_dokumen.tanggal_dokumen as "tanggalDokumen",
					dt_ceisa_dokumen.memo
				   FROM dbo.dt_ceisa_dokumen
					 LEFT JOIN dbo.referensi_dokumen ON dt_ceisa_dokumen.kode_dokumen = referensi_dokumen.id_dok
					 LEFT JOIN dbo.referensi_fasilitas ON dt_ceisa_dokumen.kode_fasilitas = referensi_fasilitas.id_fasilitas
					 LEFT JOIN dbo.prm_custom_type ON dt_ceisa_dokumen.custom_type_id = prm_custom_type.custom_type_id 
					where "bc_in_header_id" = ' . $bc_in_header_id . '
					order by seri_dokumen

				');
					
				$dokumen=0;
				foreach($q_dokumen->result() as $r_dokumen){
					$ar_dokumen[$dokumen]['idDokumen']=$r_dokumen->idDokumen;
					$ar_dokumen[$dokumen]['kodeDokumen']=$r_dokumen->kodeDokumen;
					//$ar_dokumen[$dokumen]['kodeFasilitas']=$r_dokumen->kodeFasilitas;
					$ar_dokumen[$dokumen]['nomorDokumen']=$r_dokumen->nomorDokumen;
					$ar_dokumen[$dokumen]['seriDokumen']=intval($r_dokumen->seriDokumen);
					$ar_dokumen[$dokumen]['tanggalDokumen']=$r_dokumen->tanggalDokumen;

				$dokumen++;
				}
				
				$q_pengangkut = $this->db->query('

					SELECT  "bc_in_header_id"
					  ,COALESCE("kodeBendera",'. "'ID'" .') as "kodeBendera"
					  ,COALESCE("namaPengangkut",'. "'XXX'" .') as "namaPengangkut"
					  ,COALESCE("nomorPengangkut",'. "'123456'" .') as "nomorPengangkut"
					  ,COALESCE("kodeCaraAngkut",'. "'0'" .') as "kodeCaraAngkut"
					  ,'. "'1'" .' as "seriPengangkut"
					  FROM dbo.view_custom_pengangkut_ceisa40 where "bc_in_header_id" = ' . $bc_in_header_id . '

				');
					
				$pengangkut=0;
				foreach($q_pengangkut->result() as $r_pengangkut){
					$ar_pengangkut[$pengangkut]['kodeBendera']=$r_pengangkut->kodeBendera;
					$ar_pengangkut[$pengangkut]['namaPengangkut']=$r_pengangkut->namaPengangkut;
					$ar_pengangkut[$pengangkut]['nomorPengangkut']=$r_pengangkut->nomorPengangkut;
					$ar_pengangkut[$pengangkut]['kodeCaraAngkut']=$r_pengangkut->kodeCaraAngkut;
					$ar_pengangkut[$pengangkut]['seriPengangkut']=intval($r_pengangkut->seriPengangkut);

				$pengangkut++;
				}
				
			$arr[$i]['entitas']=$ar_entitas;
			$arr[$i]['kemasan']=$ar_kemasan;
			$arr[$i]['kontainer']=$ar_kontainer;
			$arr[$i]['dokumen']=$ar_dokumen;
			$arr[$i]['pengangkut']=$ar_pengangkut;
			
			//query lagi utk kemasan
			
			$i++;
		}
		

			$array= $arr[0];
			$datanya= json_encode($array);
			//echo $datanya;
			//die();
			
			$curl = curl_init($url);
			
			curl_setopt($curl, CURLOPT_URL, $url);
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			$headers = array(
			   "Authorization: Bearer $token",
			   "Content-Type: application/json"
			);
			//echo $token . "<br>"; 
			//var_dump($headers);
			//die();
			curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
				
			curl_setopt($curl, CURLOPT_POSTFIELDS, $datanya);
			

			//for debug only!
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			
			$resp = curl_exec($curl);
			
			curl_close($curl);

			$status_ceisa = json_decode($resp, true);
			//var_dump($status_ceisa);
			//die();
			$asuw = isset($status_ceisa["Exception"])?$status_ceisa["Exception"]:'aw';
			if($asuw == 'aw'){
				if($status_ceisa['status'] == 'OK'){
				$q = $this->db->query("
				update dbo.dt_bc_in_header set id_respon = -1,
							   mode = '$isFinal' 
				where bc_in_header_id = $bc_in_header_id;

				");
				
				echo json_encode(array('sts' => '00','status'=>$status_ceisa['status'] ,'message' =>$status_ceisa['message'],'dataStatus' =>'Sukses!'  ));
				
				
			} else {
				if (isset($status_ceisa['status'])){
					echo json_encode(array('sts' => '00','status'=>$status_ceisa['status'] ,'message' =>$status_ceisa['message'],'dataStatus' =>'Failed!'));
				} else {
					echo json_encode(array('sts' => '00','status'=>'Informasi:','message' => "<hr> Under Maintanence Server"));	
					//echo json_encode(array('sts' => '00','status'=>'Informasi:','message' => "Maaf, Tidak Terhubung ke server CEISA40, Silahkan Hub Kami di ( 021 - 4890308 ext 333)"));	
					die();
				}
			}
			} else {
				echo json_encode(array('sts' => '00', 'status'=>'02' ,'message' =>$asuw,'dataStatus' =>'Koneksi terputus, Silahkan Login CEISA kembali!' ));		
				die();
				
			}
		}

	}
	
	function get_respon_ceisa_new(){
		$bc_in_header_id =  (isset($_POST['bc_in_header_id']) && !empty($_POST['bc_in_header_id']))?$_POST['bc_in_header_id']:die('{"status":"ERROR","message":" Param Header ID Tidak Ditemukan"}');
		$car = (isset($_POST['car']) && !empty($_POST['car']))?$_POST['car']:die('{"sts":"ERROR","desc":" Nomor Aju Tidak Ditemukan"}');
		$token = $this->session->userdata('s_token');
		$tgl = date('Y-m-d h:i:s');
		
		$car = str_replace(array("-",".","xx"), array("",""), $car);
		$url = "https://apis-gw.beacukai.go.id/openapi/status/$car";


		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

		$headers = array(
		   "Authorization: Bearer $token",
		   "Content-Type: application/json"
		);
		//echo $token;
		//die();
		   
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
		//for debug only!
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

		$resp = curl_exec($curl);
		curl_close($curl);
		
		$kodeRespon ='';
		$kodeDokumen ='';
		$kodeProses ='';
		$nomorRespon ='';
		$tanggalRespon ='';
		$nomorDaftar ='';
		$tanggalDaftar ='';
		$waktuRespon ='';
		$waktuStatus ='';
		$uraian1 ='';
		$uraian2 ='';
		$Pdf ='';
		$ketres = "";
		$keterangan = "";

		$status_ceisa = json_decode($resp, true);
		
		
		if (!array_key_exists("dataStatus",$status_ceisa))
		{
			if(array_key_exists("Exception",$status_ceisa)){
				echo json_encode(array('sts' => '02', 'status'=>'02' ,'message' =>$status_ceisa['Exception'],'dataStatus' =>$status_ceisa['Exception'] ));		
				die();
			}
					
			echo json_encode(array('sts' => '99', 'status'=>'99' ,'message' =>$status_ceisa['message'],'dataStatus' =>$status_ceisa['status'] ));		
			die();
		} 
		  

		$asuw = isset($status_ceisa["Exception"])?$status_ceisa["Exception"]:'aw';
		
		
		if($asuw == 'aw'){
			if(count($status_ceisa) > 0){
				
				if(count($status_ceisa["dataStatus"]) > 0){
					
					for ($y = 0; $y <= (count($status_ceisa["dataStatus"]))-1; $y++) {
						$nomorAju = $status_ceisa["dataStatus"][$y]["nomorAju"];
						$kodeProses = $status_ceisa["dataStatus"][$y]["kodeProses"];
						$nomorDaftar = $status_ceisa["dataStatus"][$y]["nomorDaftar"];
						$tanggalDaftar = $status_ceisa["dataStatus"][$y]["tanggalDaftar"];
						
						$tanggalDaftar=date_create($tanggalDaftar);
						$tanggalDaftar=date_format($tanggalDaftar,"Y-m-d");
						
						$waktuStatus = $status_ceisa["dataStatus"][$y]["waktuStatus"];
						$keterangan = $status_ceisa["dataStatus"][$y]["keterangan"];
						$kodeDokumen = $status_ceisa["dataStatus"][$y]["kodeDokumen"];
						$status = $status_ceisa["status"];
						
						$q = $this->db->query('
							select count(*) as status_respon 
							from dbo.dt_ceisa_status_respon 
								where "nomorAju" = '. "'$nomorAju'" .'
								and "kodeProses" = '. "'$kodeProses'" .'
								and keterangan = '. "'$keterangan'" .'
								and "waktuStatus" = '. "'$waktuStatus'" .'
						');
						$status_respon = 0;
						
						foreach($q->result() as $r){
							$status_respon = $r->status_respon;
						}
						
						
						$qa = $this->db->query('
							select count(*) as cnt from  dbo.dt_ceisa_status_respon 
							where	
							"bc_in_header_id" = ' . $bc_in_header_id . '
								and "nomorAju" = ' . "'" . $nomorAju . "'" . '
								and "kodeProses" = ' . "'" . $kodeProses. "'" . '
								and keterangan = ' . "'" . $keterangan . "'" . '
								and "waktuStatus" = ' . "'" .  $waktuStatus . "'" . '
								and "kodeDokumen" = ' . "'" .  $kodeDokumen . "'" . '
						
						');
						
						
						$cnt=0;
						foreach($qa->result() as $r){
							$cnt = $r->cnt;
						}
							
						if($cnt == 0){

							$data_in = array("bc_in_header_id" => $bc_in_header_id,
								"\"nomorAju\"" => $nomorAju,
								"\"kodeProses\"" => $kodeProses,
								"nomor_daftar" => $nomorDaftar,
								"tanggal_daftar" => $tanggalDaftar,
								"\"waktuStatus\"" => $waktuStatus,
								"\"kodeDokumen\"" => $kodeDokumen,
								"\"kodeRespon\"" => $kodeRespon,
								"\"nomorRespon\"" => $nomorRespon,
								"\"tanggalRespon\"" => $tanggalRespon,
								"keterangan" => $keterangan
								
								);
							$msg = $this->db->insert("dbo.dt_ceisa_status_respon", $data_in);
						
							$q = $this->db->query("
						
								 WITH latest_respon AS (
									SELECT nomor_daftar, 
										TO_DATE(tanggal_daftar, 'YYYY-MM-DD') AS tanggal_daftar,
										MAX(id_respon) AS id_respon, waktustatus
									FROM dbo.view_ceisa_respon_data_all
									WHERE bc_in_header_id = $bc_in_header_id
									GROUP BY nomor_daftar, tanggal_daftar, waktustatus
									ORDER BY id_respon DESC
									LIMIT 1
								)
								UPDATE dbo.dt_bc_in_header
								SET 
									bc_no = (SELECT nomor_daftar FROM latest_respon),
									bc_date = (SELECT tanggal_daftar FROM latest_respon),
									id_respon = (SELECT id_respon FROM latest_respon)
								WHERE bc_in_header_id = $bc_in_header_id;
							");
							
						}
					}
				}
				
				$pesanpesan = array();
				if(count($status_ceisa["dataRespon"]) > 0){
				
					for ($y = 0; $y <= (count($status_ceisa["dataRespon"]))-1; $y++) {
						$nomorAju = $status_ceisa["dataRespon"][$y]["nomorAju"];
						$kodeDokumen = $status_ceisa["dataRespon"][$y]["kodeDokumen"];
						$waktuRespon = $status_ceisa["dataRespon"][$y]['waktuRespon'];
						$kodeRespon = $status_ceisa["dataRespon"][$y]['kodeRespon'];
						$Pdf = $status_ceisa["dataRespon"][$y]['pdf'];
						$keterangan =  $status_ceisa["dataRespon"][$y]["keterangan"];
						$nomorDaftar=$status_ceisa["dataRespon"][$y]['nomorDaftar'];
						$tanggalDaftar=$status_ceisa["dataRespon"][$y]['tanggalDaftar'];
						$nomorRespon=$status_ceisa["dataRespon"][$y]['nomorRespon'];
						$tanggalRespon=$status_ceisa["dataRespon"][$y]['tanggalRespon'];
						$billingPungutans=$status_ceisa["dataRespon"][$y]['billingPungutans'];
						$pesanpesan = $status_ceisa["dataRespon"][$y]["pesan"];
						if(count($status_ceisa["dataRespon"][$y]["pesan"]) > 0){
							$ketrus = "";
							$ketris = "";
							for ($z = 0; $z <= (count($status_ceisa["dataRespon"][$y]["pesan"]))-1; $z++) {
								$ketres.=$status_ceisa["dataRespon"][$y]["pesan"][$z] . "<br>"; 
							}
							
						}
						
						
						$qa = $this->db->query('
							select count(*) as cnt from  dbo.dt_ceisa_respon_data 
							where	
							"bc_in_header_id" = ' . $bc_in_header_id . '
								and "nomorAju" = ' . "'" . $nomorAju . "'" . '
								and "kodeRespon" = ' . "'" . $kodeRespon. "'" . '
								and keterangan = ' . "'" . $keterangan . "'" . '
								and "waktuRespon" = ' . "'" .  $waktuRespon . "'" . '
								and "kodeDokumen" = ' . "'" .  $kodeDokumen . "'" . '
								
							
						');

						$cnt=0;
						foreach($qa->result() as $r){
							$cnt = $r->cnt;
						}
						
						if($cnt == 0){
							
							$data_in = array("bc_in_header_id" => $bc_in_header_id,
								"\"nomorAju\"" => $nomorAju,
								"\"kodeProses\"" => $kodeProses,
								"nomor_daftar" => $nomorDaftar,
								"tanggal_daftar" => $tanggalDaftar,
								"\"waktuStatus\"" => $waktuStatus,
								"\"kodeDokumen\"" => $kodeDokumen,
								"\"kodeRespon\"" => $kodeRespon,
								"\"nomorRespon\"" => $nomorRespon,
								"\"tanggalRespon\"" => $tanggalRespon,
								"\"waktuRespon\"" => $waktuRespon,
								"\"Pdf\"" => $Pdf,
								"keterangan" => $keterangan,
								"pesan" => $ketres);
							$msg = $this->db->insert("dbo.dt_ceisa_respon_data", $data_in); 
							
						}				
					} 
					
					
				}	
					
				
				echo json_encode(array('sts' => '00', 'status'=>$status_ceisa['status'] ,'message' =>$status_ceisa['message'], 'dataStatus' =>$keterangan  . " => Nomor AJU: " . $nomorAju  . '<hr/>' .   implode("<br>\n" , $pesanpesan) /*$ketres*/ ));		
				die();
			}
		} else {
			
					
			echo json_encode(array('sts' => '02', 'status'=>'02' ,'message' =>$asuw,'dataStatus' =>'Koneksi terputus, Silahkan Login CEISA kembali!' ));		
			die();
			
		}

	
	}
	
	function get_respon_ceisa_new_old(){
		$bc_in_header_id =  (isset($_POST['bc_in_header_id']) && !empty($_POST['bc_in_header_id']))?$_POST['bc_in_header_id']:die('{"status":"ERROR","message":" Param Header ID Tidak Ditemukan"}');
		$car = (isset($_POST['car']) && !empty($_POST['car']))?$_POST['car']:die('{"sts":"ERROR","desc":" Nomor Aju Tidak Ditemukan"}');
		$token = $this->session->userdata('s_token');
		$tgl = date('Y-m-d h:i:s');
		
		$car = str_replace(array("-",".","xx"), array("",""), $car);
		$url = "https://apis-gw.beacukai.go.id/openapi/status/$car";


		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

		$headers = array(
		   "Authorization: Bearer $token",
		   "Content-Type: application/json"
		);
		//echo $token;
		//die();
		   
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
		//for debug only!
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

		$resp = curl_exec($curl);
		curl_close($curl);
		
		$kodeRespon ='';
		$kodeDokumen ='';
		$kodeProses ='';
		$nomorRespon ='';
		$tanggalRespon ='';
		$nomorDaftar ='';
		$tanggalDaftar ='';
		$waktuRespon ='';
		$waktuStatus ='';
		$uraian1 ='';
		$uraian2 ='';
		$Pdf ='';
		$ketres = "";
		$keterangan = "";

		$status_ceisa = json_decode($resp, true);
		
		
		if (!array_key_exists("dataStatus",$status_ceisa))
		{
			if(array_key_exists("Exception",$status_ceisa)){
				echo json_encode(array('sts' => '02', 'status'=>'02' ,'message' =>$status_ceisa['Exception'],'dataStatus' =>$status_ceisa['Exception'] ));		
				die();
			}
					
			echo json_encode(array('sts' => '99', 'status'=>'99' ,'message' =>$status_ceisa['message'],'dataStatus' =>$status_ceisa['status'] ));		
			die();
		} 
		  

		$asuw = isset($status_ceisa["Exception"])?$status_ceisa["Exception"]:'aw';
		
		
		if($asuw == 'aw'){
			if(count($status_ceisa) > 0){
				
				if(count($status_ceisa["dataStatus"]) > 0){
					
					for ($y = 0; $y <= (count($status_ceisa["dataStatus"]))-1; $y++) {
						$nomorAju = $status_ceisa["dataStatus"][$y]["nomorAju"];
						$kodeProses = $status_ceisa["dataStatus"][$y]["kodeProses"];
						$nomorDaftar = $status_ceisa["dataStatus"][$y]["nomorDaftar"];
						$tanggalDaftar = $status_ceisa["dataStatus"][$y]["tanggalDaftar"];
						
						$tanggalDaftar=date_create($tanggalDaftar);
						$tanggalDaftar=date_format($tanggalDaftar,"Y-m-d");
						
						$waktuStatus = $status_ceisa["dataStatus"][$y]["waktuStatus"];
						$keterangan = $status_ceisa["dataStatus"][$y]["keterangan"];
						$kodeDokumen = $status_ceisa["dataStatus"][$y]["kodeDokumen"];
						$status = $status_ceisa["status"];
						
						$q = $this->db->query('
							select count(*) as status_respon 
							from dbo.dt_ceisa_status_respon 
								where "nomorAju" = '. "'$nomorAju'" .'
								and "kodeProses" = '. "'$kodeProses'" .'
								and keterangan = '. "'$keterangan'" .'
								and "waktuStatus" = '. "'$waktuStatus'" .'
						');
						$status_respon = 0;
						
						foreach($q->result() as $r){
							$status_respon = $r->status_respon;
						}
						
						
						$qa = $this->db->query('
							select count(*) as cnt from  dbo.dt_ceisa_status_respon 
							where	
							"bc_in_header_id" = ' . $bc_in_header_id . '
								and "nomorAju" = ' . "'" . $nomorAju . "'" . '
								and "kodeProses" = ' . "'" . $kodeProses. "'" . '
								and keterangan = ' . "'" . $keterangan . "'" . '
								and "waktuStatus" = ' . "'" .  $waktuStatus . "'" . '
								and "kodeDokumen" = ' . "'" .  $kodeDokumen . "'" . '
						
						');
						
						
						$cnt=0;
						foreach($qa->result() as $r){
							$cnt = $r->cnt;
						}
							
						if($cnt == 0){

							$data_in = array("bc_in_header_id" => $bc_in_header_id,
								"\"nomorAju\"" => $nomorAju,
								"\"kodeProses\"" => $kodeProses,
								"nomor_daftar" => $nomorDaftar,
								"tanggal_daftar" => $tanggalDaftar,
								"\"waktuStatus\"" => $waktuStatus,
								"\"kodeDokumen\"" => $kodeDokumen,
								"\"kodeRespon\"" => $kodeRespon,
								"\"nomorRespon\"" => $nomorRespon,
								"\"tanggalRespon\"" => $tanggalRespon,
								"keterangan" => $keterangan
								
								);
							$msg = $this->db->insert("dbo.dt_ceisa_status_respon", $data_in);
						
							$q = $this->db->query("
						
								update dbo.dt_bc_in_header set bc_no = (select  nomor_daftar  from dbo.dt_ceisa_status_respon
									where bc_in_header_id = $bc_in_header_id  limit 1),  
										bc_date= (select  TO_DATE(tanggal_daftar, 'YYYY-MM-DD') from dbo.dt_ceisa_status_respon  
									where bc_in_header_id = $bc_in_header_id and nomor_daftar IS NOT NULL limit 1),
										id_respon = (select MAX (id_respon) from dbo.dt_ceisa_status_respon
									where bc_in_header_id = $bc_in_header_id  limit 1) where bc_in_header_id  = $bc_in_header_id
							");
							
						}
					}
				}
				
				$pesanpesan = array();
				if(count($status_ceisa["dataRespon"]) > 0){
				
					for ($y = 0; $y <= (count($status_ceisa["dataRespon"]))-1; $y++) {
						$nomorAju = $status_ceisa["dataRespon"][$y]["nomorAju"];
						$kodeDokumen = $status_ceisa["dataRespon"][$y]["kodeDokumen"];
						$waktuRespon = $status_ceisa["dataRespon"][$y]['waktuRespon'];
						$kodeRespon = $status_ceisa["dataRespon"][$y]['kodeRespon'];
						$Pdf = $status_ceisa["dataRespon"][$y]['pdf'];
						$keterangan =  $status_ceisa["dataRespon"][$y]["keterangan"];
						$nomorDaftar=$status_ceisa["dataRespon"][$y]['nomorDaftar'];
						$tanggalDaftar=$status_ceisa["dataRespon"][$y]['tanggalDaftar'];
						$nomorRespon=$status_ceisa["dataRespon"][$y]['nomorRespon'];
						$tanggalRespon=$status_ceisa["dataRespon"][$y]['tanggalRespon'];
						$billingPungutans=$status_ceisa["dataRespon"][$y]['billingPungutans'];
						$pesanpesan = $status_ceisa["dataRespon"][$y]["pesan"];
						if(count($status_ceisa["dataRespon"][$y]["pesan"]) > 0){
							$ketrus = "";
							$ketris = "";
							for ($z = 0; $z <= (count($status_ceisa["dataRespon"][$y]["pesan"]))-1; $z++) {
								$ketres.=$status_ceisa["dataRespon"][$y]["pesan"][$z] . "<br>"; 
							}
							
						}
						
						
						$qa = $this->db->query('
							select count(*) as cnt from  dbo.dt_ceisa_respon_data 
							where	
							"bc_in_header_id" = ' . $bc_in_header_id . '
								and "nomorAju" = ' . "'" . $nomorAju . "'" . '
								and "kodeRespon" = ' . "'" . $kodeRespon. "'" . '
								and keterangan = ' . "'" . $keterangan . "'" . '
								and "waktuRespon" = ' . "'" .  $waktuRespon . "'" . '
								and "kodeDokumen" = ' . "'" .  $kodeDokumen . "'" . '
								--and "Pdf" = ' . "'" .  $Pdf . "'" . '
								
							
						');

						$cnt=0;
						foreach($qa->result() as $r){
							$cnt = $r->cnt;
						}
						
						if($cnt == 0){
							
							$data_in = array("bc_in_header_id" => $bc_in_header_id,
								"\"nomorAju\"" => $nomorAju,
								"\"kodeProses\"" => $kodeProses,
								"nomor_daftar" => $nomorDaftar,
								"tanggal_daftar" => $tanggalDaftar,
								"\"waktuStatus\"" => $waktuStatus,
								"\"kodeDokumen\"" => $kodeDokumen,
								"\"kodeRespon\"" => $kodeRespon,
								"\"nomorRespon\"" => $nomorRespon,
								"\"tanggalRespon\"" => $tanggalRespon,
								"\"waktuRespon\"" => $waktuRespon,
								"\"Pdf\"" => $Pdf,
								"keterangan" => $keterangan,
								"pesan" => $ketres);
							$msg = $this->db->insert("dbo.dt_ceisa_respon_data", $data_in); 
							
							$q = $this->db->query("
						
								update dbo.dt_bc_in_header set bc_no = (select  nomor_daftar  from dbo.dt_ceisa_respon_data
									where bc_in_header_id = $bc_in_header_id  limit 1),  
										bc_date= (select  TO_DATE(tanggal_daftar, 'YYYY-MM-DD') from dbo.dt_ceisa_respon_data  
									where bc_in_header_id = $bc_in_header_id and nomor_daftar IS NOT NULL limit 1),
										id_respon = (select MAX (id_respon) from dbo.dt_ceisa_respon_data
									where bc_in_header_id = $bc_in_header_id  limit 1) where bc_in_header_id  = $bc_in_header_id
							");
							
						}				
					} 
					
					
				}	
					
				
				echo json_encode(array('sts' => '00', 'status'=>$status_ceisa['status'] ,'message' =>$status_ceisa['message'], 'dataStatus' =>$keterangan  . " => Nomor AJU: " . $nomorAju  . '<hr/>' .   implode("<br>\n" , $pesanpesan) /*$ketres*/ ));		
				die();
			}
		} else {
			
					
			echo json_encode(array('sts' => '02', 'status'=>'02' ,'message' =>$asuw,'dataStatus' =>'Koneksi terputus, Silahkan Login CEISA kembali!' ));		
			die();
			
		}

	
	}
	
	function data_respon(){	
		$data= new StdClass;
		$search = isset($_POST['_search'])?$_POST['_search']:false;
        $searchField = isset($_POST['searchField'])?$_POST['searchField']:'';
        $searchString = isset($_POST['searchString'])?$_POST['searchString']:'';
        $filters =  isset($_POST['filters'])?$_POST['filters']:'';
		
		$filters =  isset($_POST['filters'])?$_POST['filters']:'';
		$hal = isset($_POST['page'])?$_POST['page']:1; 
		$batas = isset($_POST['rows'])?$_POST['rows']:100;
		$sidx = isset($_POST['sidx'])?$_POST['sidx']:'id_respon';
		$sord = isset($_POST['sord'])?$_POST['sord']:'desc';
		
		
		if(!$sidx) $sidx =1;
		
		$bc_in_header_id = isset($_POST['bc_in_header_id']) ? $_POST['bc_in_header_id'] : '1';
		
		
		$where = " 1=1  ";
		$where = " bc_in_header_id='$bc_in_header_id'";
						
						
		if ($search){
		    
			if (!empty($filters)){
				$array = json_decode($filters);
				foreach($array->rules as $arr=>$k){
					$searchString = $k->data;
					$where .= " and " . $k->field . " like  '%".$searchString."%'"; 
				}
			}
		}
		
		$q=$this->db->query("
			select count(*) as cnt from dbo.view_ceisa_respon_data_all 	where $where 		
		");
		$hitung = 0;
	    foreach($q->result() as $r){
			$hitung = $r->cnt;			
		}
		
		if( $hitung > 0 ) {
		    $total_hal = ceil($hitung/$batas);
		} else {
		    $total_hal = 0;
		}
	 
		if ($hal > $total_hal) $hal=$total_hal;
	 
		$start = $batas*$hal - $batas;
		$start = ($start<0)?0:$start;
		
		$order = " ORDER BY $sidx $sord LIMIT $batas OFFSET $start ";
		$where = $where . $order;
		$q=$this->db->query("
			select  
				id_respon,
				bc_out_header_id,
				bc_in_header_id,
				keterangan,
				kodeDokumen,
				kodeProses,
				kodeRespon,
				nomorAju,
				nomor_daftar,
				nomorRespon,
				tanggalRespon,
				waktuRespon,
				waktuStatus,
				uraian1,
				uraian2,
				Pdf,
				idrespon2,
				pesan,
				billingpungutans
			
			from dbo.view_ceisa_respon_data_all
			
			where $where	
		");
		
		
		$data->page = $hal;
		$data->total = $total_hal;
		$data->records = $hitung;
		$i=0;
		
		
		
		foreach($q->result() as $row) {
			$data->rows[$i]['id_respon']=$row->id_respon;
			$data->rows[$i]['bc_out_header_id']=$row->bc_out_header_id;
			$data->rows[$i]['bc_in_header_id']=$row->bc_in_header_id;
			$data->rows[$i]['keterangan']=$row->keterangan;
			$data->rows[$i]['kodedokumen']=$row->kodedokumen;
			$data->rows[$i]['kodeproses']=$row->kodeproses;
			$data->rows[$i]['koderespon']=$row->koderespon;
			$data->rows[$i]['nomoraju']=$row->nomoraju;
			$data->rows[$i]['nomor_daftar']=$row->nomor_daftar;
			$data->rows[$i]['nomorrespon']=$row->nomorrespon;
			$data->rows[$i]['tanggalrespon']=$row->tanggalrespon;
			$data->rows[$i]['wakturespon']=$row->wakturespon;
			$data->rows[$i]['waktustatus']=$row->waktustatus;
			$data->rows[$i]['uraian1']=$row->uraian1;
			$data->rows[$i]['uraian2']=$row->uraian2;
			$data->rows[$i]['pdf']=$row->pdf;
			$data->rows[$i]['idrespon2']=$row->idrespon2;
			$data->rows[$i]['pesan']=$row->pesan;
			$data->rows[$i]['billingpungutans']=$row->billingpungutans;
			
			$i++;
		}
		echo json_encode($data);
		
		
		
	}
	
	
	function cetak_respon_ceisa(){
		$bc_in_header_id = (isset($_GET['bc_in_header_id']) && !empty($_GET['bc_in_header_id']))?$_GET['bc_in_header_id']:die('{"sts":"ERROR","desc":" Param header_id Tidak Ditemukan"}');
		$id_respon = (isset($_GET['id_respon']) && !empty($_GET['id_respon']))?$_GET['id_respon']:"";
		$respon = (isset($_GET['Pdf']) && !empty($_GET['Pdf']))?$_GET['Pdf']:"";
		$arr = array();
        $tgl = date('Y-m-d h:i:s');
		
		$q = $this->db->query('
			select "pdf" from dbo.view_ceisa_respon_data_all where id_respon = ' . $id_respon . '
		');
		
		
		$pdf = "";
		foreach($q->result() as $r){
			$pdf = $r->pdf;
		}
		$filename='respon'.date('Ymdhis').'pdf';
		if($pdf==''){
			echo "Data tidak ditemukan/belum ada Respon siap Cetak,  Silahkan Cek kembali!";
			die();
		} else {
			$dt = explode('/',$pdf);
			if(count($dt) == 6){
				$filename=$dt[5];				
			}
			
		}
		
		$path = 'respon/' . $filename;
		
		if(file_exists($path)){
			header('Content-type: application/pdf');
			@readfile($path);
			die();
		} 
		
		$this->login_ceisa_new();
		
		$token = $this->session->userdata('s_token');
		
		$url = "https://apis-gw.beacukai.go.id/openapi/download-respon?path=$respon";
		
		
		$token = $this->session->userdata('s_token');
		$tgl = date('Y-m-d h:i:s');
		
		$url = "https://apis-gw.beacukai.go.id/openapi/download-respon?path=$pdf";
		
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

		$headers = array(
		   "Authorization: Bearer $token",
		   "Content-Type: application/json"
		);
		   
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		header('Content-type: application/pdf');
		$result = curl_exec($curl);
		curl_close($curl);
		file_put_contents($path, $result);
		echo $result;
		
		exit;
	

	} 
	
	
	function cetak_dokumen(){
		$bc_in_header_id = (isset($_GET['bc_in_header_id']) && !empty($_GET['bc_in_header_id']))?$_GET['bc_in_header_id']:die('{"sts":"ERROR","desc":" Param Header Tidak Ditemukan"}');
		$custom_type_id = (isset($_GET['custom_type_id']) && !empty($_GET['custom_type_id']))?$_GET['custom_type_id']:die('{"sts":"ERROR","desc":" Param Dokumen Tidak Ditemukan"}');
				
		$q = $this->db->query('
			select
				bc_in_header_id,
				id_tpb,
				"asalData",
				"Asuransi_tipe",
				"biayaPengurang",
				"biayaTambahan",
				"CaraBayar",
				"disclaimer",
				"namaPengusaha",
				"alamatPengusaha",
				"kotaPengusaha",
				"kodePosPengusaha",
				"kodeNegaraPengusaha",
				"negaraPengusaha",
				"npwpPengusaha",
				"nibPengusaha",
				"nomorIjinPengusaha",
				"namaPemasok",
				"alamatPemasok",
				"kotaPemasok",
				"kodePosPemasok",
				"kodeNegaraPemasok",
				"negaraPemasok",
				"npwpPemasok",
				"nibPemasok",
				"nomorIjinPemasok",
				"namaPemilik",
				"alamatPemilik",
				"kotaPemilik",
				"kodePosPemilik",
				"kodeNegaraPemilik",
				"negaraPemilik",
				"npwpPemilik",
				"nibPemilik",
				"nomorIjinPemilik",
				"namaPembeli",
				"alamatPembeli",
				"kotaPembeli",
				"kodePosPembeli",
				"kodeNegaraPembeli",
				"negaraPembeli",
				"npwpPembeli",
				"nibPembeli",
				"nomorIjinPembeli",
				"namaPenjual",
				"alamatPenjual",
				"kotaPenjual",
				"kodePosPenjual",
				"kodeNegaraPenjual",
				"negaraPenjual",
				"npwpPenjual",
				"nibPenjual",
				"nomorIjinPenjual",
				"kodeKppbcBongkar",
				"KppbcBongkar",
				"kodeKppbc",
				"Kppbc",
				"kodeCaraAngkut",
				"caraAngkut",
				"namaPengangkut",
				"nomorPengangkut",
				"pengangkut",
				"kodeBendera",
				"Bendera",
				"kodePelBongkar",
				"pelabuhanBongkar",
				"kodePelMuat",
				"pelabuhanMuat",
				"kodePelTransit",
				"pelabuhanTransit",
				"kodePelTujuan",
				"pelabuhanTujuan",
				"nomorInvoice",
				"tanggalInvoice",
				"nomor_bl",
				"tanggal_bl",
				"nomorBc11",
				"tanggalBc11",
				"posBc11",
				"subposBc11",
				"kodeTps",
				"tps",
				"kodeValuta",
				"valuta",
				TO_CHAR(ndpbm, '. "'FM99,999,999,999.00'" .') as ndpbm,
				"freight",
				"asuransi",
				TO_CHAR(cif, '. "'FM99,999,999,999.00'" .') as "cif",
				TO_CHAR("cifRupiah", '. "'FM99,999,999,999.00'" .') as "cifRupiah",
				TO_CHAR("fob", '. "'FM99,999,999,999.00'" .') as "fob",
				"kontainer",
				"kodeUkurankontainer",
				"kontainer20",
				"kodeUkurankontainer20",
				"jumlahKemasan",
				"kodeJenisKemasan",
				"kemasan",
				"merkKemasan",
				"KenaPajak",
				TO_CHAR(netto, '. "'FM99,999,999,999.0000'" .') as "netto",
				TO_CHAR(bruto, '. "'FM99,999,999,999.0000'" .') as "bruto",
				"posTarif",
				"kodeBarang",
				"uraian",
				"merk",
				"tipe",
				"ukuran",
				"KategoriBarang",
				"NegaraAsal",
				"jumlahSatuan",
				"kodeSatuanBarang",
				"netDetail",
				"cifRupiahDetail",
				"kodeJenisPungutan",
				"tarif",
				"tarifFasilitas",
				"diTangguhkan",
				"diBebaskan",
				"tidakDipungut",
				"flagCurah",
				"flagMigas",
				"flagVd",
				TO_CHAR("hargaPenyerahan", '. "'FM99,999,999,999.00'" .') as "hargaPenyerahan",
				"Incoterm",
				"idRespon",
				"idRespon_1",
				"jabatanTtd",
				"JenisImpor",
				"JenisKemasan",
				"JenisProsedur",
				"JenisTpb",
				"jumlahJenisBarang",
				"jumlahKontainer",
				"jumlahTandaPengaman",
				"kodeAsuransi",
				"kodeCaraBayar",
				"kodeEntitas",
				"kodeIncoterm",
				"kodeJenisImpor",
				"kodeJenisNilai",
				"kodeJenisProsedur",
				"kodeJenisTpb",
				"kodeKantorTujuan",
				"kodeKenaPajak",
				"kodeKondisiBarang",
				"kodeTipeHarga",
				"kodeTujuanPemasukan",
				"kodeTujuanPengiriman",
				"kodeTujuanTpb",
				"kodeTutupPu",
				"KondisiBarang",
				"kotaTtd",
				"kurs",
				"namaTtd",
				"nik",
				"nilaiBarang",
				"nilaiIncoterm",
				TO_CHAR("nilaiJasa", '. "'FM99,999,999,999.00'" .') as "nilaiJasa",
				"nilaiMaklon",
				"noDaftar",
				"seri",
				"seriBank",
				"seriEntitas",
				"idPengguna",
				"seriEntitas1",
				"seriEntitas2",
				"seriEntitas3",
				"seriEntitas4",
				"seriPengangkut",
				"tanggalAju",
				"tanggalTiba",
				"tanggalTtd",
				"totalDanaSawit",
				"TujuanPemasukan",
				"TujuanPengiriman",
				"TujuanTpb",
				"TutupPu",
				"uangMuka",
				"vd",
				TO_CHAR(volume, '. "'FM99,999,999,999.0000'" .') as "volume",
				"kodeDokumen",
				"nomorAju",
				"tanggaldaftar",
				"nomorPackingList",
				"nomorKontrak",
				"nomorFaktur",
				"tanggalPackingList",
				"tanggalKontrak",
				"tanggalFaktur",
				"kodeJenisTransaksi",
				"statusPengusaha",
				"namaPpjk",
				"alamatPpjk",
				"npwpPpjk",
				"nomorIjinPpjk",
				"tanggalIjinPengusaha"
			from dbo.view_bc_in_header_draft
			where bc_in_header_id =  ' . $bc_in_header_id . '
		');
		
		
		
		$bc_in_header_id = "";
		$id_tpb = "";
		$asalData = "";
		$Asuransi_tipe = "";
		$biayaPengurang = "";
		$biayaTambahan = "";
		$CaraBayar = "";
		$disclaimer = "";
		$namaPengusaha = "";
		$alamatPengusaha = "";
		$kotaPengusaha = "";
		$kodePosPengusaha = "";
		$kodeNegaraPengusaha = "";
		$negaraPengusaha = "";
		$npwpPengusaha = "";
		$nibPengusaha = "";
		$nomorIjinPengusaha = "";
		$namaPemasok = "";
		$alamatPemasok = "";
		$kotaPemasok = "";
		$kodePosPemasok = "";
		$kodeNegaraPemasok = "";
		$negaraPemasok = "";
		$npwpPemasok = "";
		$nibPemasok = "";
		$nomorIjinPemasok = "";
		$namaPemilik = "";
		$alamatPemilik = "";
		$kotaPemilik = "";
		$kodePosPemilik = "";
		$kodeNegaraPemilik = "";
		$negaraPemilik = "";
		$npwpPemilik = "";
		$nibPemilik = "";
		$nomorIjinPemilik = "";
		$namaPembeli = "";
		$alamatPembeli = "";
		$kotaPembeli = "";
		$kodePosPembeli = "";
		$kodeNegaraPembeli = "";
		$negaraPembeli = "";
		$npwpPembeli = "";
		$nibPembeli = "";
		$nomorIjinPembeli = "";
		$namaPenjual = "";
		$alamatPenjual = "";
		$kotaPenjual = "";
		$kodePosPenjual = "";
		$kodeNegaraPenjual = "";
		$negaraPenjual = "";
		$npwpPenjual = "";
		$nibPenjual = "";
		$nomorIjinPenjual = "";
		$kodeKppbcBongkar = "";
		$KppbcBongkar = "";
		$kodeKppbc = "";
		$Kppbc = "";
		$kodeCaraAngkut = "";
		$caraAngkut = "";
		$namaPengangkut = "";
		$nomorPengangkut = "";
		$pengangkut = "";
		$kodeBendera = "";
		$Bendera = "";
		$kodePelBongkar = "";
		$pelabuhanBongkar = "";
		$kodePelMuat = "";
		$pelabuhanMuat = "";
		$kodePelTransit = "";
		$pelabuhanTransit = "";
		$kodePelTujuan = "";
		$pelabuhanTujuan = "";
		$nomorInvoice = "";
		$tanggalInvoice = "";
		$nomor_bl = "";
		$tanggal_bl = "";
		$nomorBc11 = "";
		$tanggalBc11 = "";
		$posBc11 = "";
		$subposBc11 = "";
		$kodeTps = "";
		$tps = "";
		$kodeValuta = "";
		$valuta = "";
		$ndpbm = "";
		$freight = "";
		$asuransi = "";
		$cif = "";
		$cifRupiah = "";
		$fob = "";
		$kontainer20 = "";
		$kontainer = "";
		$kodeUkurankontainer20 = "";
		$kodeUkurankontainer = "";
		$jumlahKemasan = "";
		$kodeJenisKemasan = "";
		$kemasan = "";
		$merkKemasan = "";
		$KenaPajak = "";
		$netto = "";
		$bruto = "";
		$posTarif = "";
		$kodeBarang = "";
		$uraian = "";
		$merk = "";
		$tipe = "";
		$ukuran = "";
		$KategoriBarang = "";
		$NegaraAsal = "";
		$jumlahSatuan = "";
		$kodeSatuanBarang = "";
		$netDetail = "";
		$cifRupiahDetail = "";
		$kodeJenisPungutan = "";
		$tarif = "";
		$tarifFasilitas = "";
		$diTangguhkan = "";
		$diBebaskan = "";
		$tidakDipungut = "";
		$flagCurah = "";
		$flagMigas = "";
		$flagVd = "";
		$hargaPenyerahan = "";
		$Incoterm = "";
		$idRespon = "";
		$idRespon_1 = "";
		$jabatanTtd = "";
		$JenisImpor = "";
		$JenisKemasan = "";
		$JenisProsedur = "";
		$JenisTpb = "";
		$jumlahJenisBarang = "";
		$jumlahKontainer = "";
		$jumlahTandaPengaman = "";
		$kodeAsuransi = "";
		$kodeCaraBayar = "";
		$kodeEntitas = "";
		$kodeIncoterm = "";
		$kodeJenisImpor = "";
		$kodeJenisNilai = "";
		$kodeJenisProsedur = "";
		$kodeJenisTpb = "";
		$kodeKantorTujuan = "";
		$kodeKenaPajak = "";
		$kodeKondisiBarang = "";
		$kodeTipeHarga = "";
		$kodeTujuanPemasukan = "";
		$kodeTujuanPengiriman = "";
		$kodeTujuanTpb = "";
		$kodeTutupPu = "";
		$KondisiBarang = "";
		$kotaTtd = "";
		$kurs = "";
		$namaTtd = "";
		$nik = "";
		$nilaiBarang = "";
		$nilaiIncoterm = "";
		$nilaiJasa = "";
		$nilaiMaklon = "";
		$noDaftar = "";
		$seri = "";
		$seriBank = "";
		$seriEntitas = "";
		$idPengguna = "";
		$seriEntitas1 = "";
		$seriEntitas2 = "";
		$seriEntitas3 = "";
		$seriEntitas4 = "";
		$seriPengangkut = "";
		$tanggalAju = "";
		$tanggalTiba = "";
		$tanggalTtd = "";
		$totalDanaSawit = "";
		$TujuanPemasukan = "";
		$TujuanPengiriman = "";
		$TujuanTpb = "";
		$TutupPu = "";
		$uangMuka = "";
		$vd = "";
		$volume = "";
		$kodeDokumen = "";
		$nomorAju = "";
		$tanggaldaftar = "";
		$nomorPackingList = "";
		$nomorKontrak = "";
		$nomorFaktur = "";
		$tanggalPackingList = "";
		$tanggalKontrak = "";
		$tanggalFaktur = "";
		$tanggalIjinPengusaha = "";
		$kodeJenisTransaksi = "";
		$statusPengusaha = "";
		$namaPpjk = "";
		$alamatPpjk = "";
		$npwpPpjk = "";
		$nomorIjinPpjk = "";
		
		
		
		foreach($q->result() as $r){
			$bc_in_header_id = $r-> bc_in_header_id;
			$id_tpb = $r-> id_tpb;
			$asalData = $r-> asalData;
			$Asuransi_tipe = $r-> Asuransi_tipe;
			$biayaPengurang = $r-> biayaPengurang;
			$biayaTambahan = $r-> biayaTambahan;
			$CaraBayar = $r-> CaraBayar;
			$disclaimer = $r-> disclaimer;
			$namaPengusaha = $r-> namaPengusaha;
			$alamatPengusaha = $r-> alamatPengusaha;
			$kotaPengusaha = $r-> kotaPengusaha;
			$kodePosPengusaha = $r-> kodePosPengusaha;
			$kodeNegaraPengusaha = $r-> kodeNegaraPengusaha;
			$negaraPengusaha = $r-> negaraPengusaha;
			$npwpPengusaha = $r-> npwpPengusaha;
			$nibPengusaha = $r-> nibPengusaha;
			$nomorIjinPengusaha = $r-> nomorIjinPengusaha;
			$namaPemasok = $r-> namaPemasok;
			$alamatPemasok = $r-> alamatPemasok;
			$kotaPemasok = $r-> kotaPemasok;
			$kodePosPemasok = $r-> kodePosPemasok;
			$kodeNegaraPemasok = $r-> kodeNegaraPemasok;
			$negaraPemasok = $r-> negaraPemasok;
			$npwpPemasok = $r-> npwpPemasok;
			$nibPemasok = $r-> nibPemasok;
			$nomorIjinPemasok = $r-> nomorIjinPemasok;
			$namaPemilik = $r-> namaPemilik;
			$alamatPemilik = $r-> alamatPemilik;
			$kotaPemilik = $r-> kotaPemilik;
			$kodePosPemilik = $r-> kodePosPemilik;
			$kodeNegaraPemilik = $r-> kodeNegaraPemilik;
			$negaraPemilik = $r-> negaraPemilik;
			$npwpPemilik = $r-> npwpPemilik;
			$nibPemilik = $r-> nibPemilik;
			$nomorIjinPemilik = $r-> nomorIjinPemilik;
			$namaPembeli = $r-> namaPembeli;
			$alamatPembeli = $r-> alamatPembeli;
			$kotaPembeli = $r-> kotaPembeli;
			$kodePosPembeli = $r-> kodePosPembeli;
			$kodeNegaraPembeli = $r-> kodeNegaraPembeli;
			$negaraPembeli = $r-> negaraPembeli;
			$npwpPembeli = $r-> npwpPembeli;
			$nibPembeli = $r-> nibPembeli;
			$nomorIjinPembeli = $r-> nomorIjinPembeli;
			$namaPenjual = $r-> namaPenjual;
			$alamatPenjual = $r-> alamatPenjual;
			$kotaPenjual = $r-> kotaPenjual;
			$kodePosPenjual = $r-> kodePosPenjual;
			$kodeNegaraPenjual = $r-> kodeNegaraPenjual;
			$negaraPenjual = $r-> negaraPenjual;
			$npwpPenjual = $r-> npwpPenjual;
			$nibPenjual = $r-> nibPenjual;
			$nomorIjinPenjual = $r-> nomorIjinPenjual;
			$kodeKppbcBongkar = $r-> kodeKppbcBongkar;
			$KppbcBongkar = $r-> KppbcBongkar;
			$kodeKppbc = $r-> kodeKppbc;
			$Kppbc = $r-> Kppbc;
			$kodeCaraAngkut = $r-> kodeCaraAngkut;
			$caraAngkut = $r-> caraAngkut;
			$namaPengangkut = $r-> namaPengangkut;
			$nomorPengangkut = $r-> nomorPengangkut;
			$pengangkut = $r-> pengangkut;
			$kodeBendera = $r-> kodeBendera;
			$Bendera = $r-> Bendera;
			$kodePelBongkar = $r-> kodePelBongkar;
			$pelabuhanBongkar = $r-> pelabuhanBongkar;
			$kodePelMuat = $r-> kodePelMuat;
			$pelabuhanMuat = $r-> pelabuhanMuat;
			$kodePelTransit = $r-> kodePelTransit;
			$pelabuhanTransit = $r-> pelabuhanTransit;
			$kodePelTujuan = $r-> kodePelTujuan;
			$pelabuhanTujuan = $r-> pelabuhanTujuan;
			$nomorInvoice = $r-> nomorInvoice;
			$tanggalInvoice = $r-> tanggalInvoice;
			$nomor_bl = $r-> nomor_bl;
			$tanggal_bl = $r-> tanggal_bl;
			$nomorBc11 = $r-> nomorBc11;
			$tanggalBc11 = $r-> tanggalBc11;
			$posBc11 = $r-> posBc11;
			$subposBc11 = $r-> subposBc11;
			$kodeTps = $r-> kodeTps;
			$tps = $r-> tps;
			$kodeValuta = $r-> kodeValuta;
			$valuta = $r-> valuta;
			$ndpbm = $r-> ndpbm;
			$freight = $r-> freight;
			$asuransi = $r-> asuransi;
			$cif = $r-> cif;
			$cifRupiah = $r-> cifRupiah;
			$fob = $r-> fob;
			$kontainer = $r-> kontainer;
			$kontainer = $r-> kontainer20;
			$kodeUkurankontainer = $r-> kodeUkurankontainer;
			$kodeUkurankontainer = $r-> kodeUkurankontainer20;
			$jumlahKemasan = $r-> jumlahKemasan;
			$kodeJenisKemasan = $r-> kodeJenisKemasan;
			$kemasan = $r-> kemasan;
			$merkKemasan = $r-> merkKemasan;
			$KenaPajak = $r-> KenaPajak;
			$netto = $r-> netto;
			$bruto = $r-> bruto;
			$posTarif = $r-> posTarif;
			$kodeBarang = $r-> kodeBarang;
			$uraian = $r-> uraian;
			$merk = $r-> merk;
			$tipe = $r-> tipe;
			$ukuran = $r-> ukuran;
			$KategoriBarang = $r-> KategoriBarang;
			$NegaraAsal = $r-> NegaraAsal;
			$jumlahSatuan = $r-> jumlahSatuan;
			$kodeSatuanBarang = $r-> kodeSatuanBarang;
			$netDetail = $r-> netDetail;
			$cifRupiahDetail = $r-> cifRupiahDetail;
			$kodeJenisPungutan = $r-> kodeJenisPungutan;
			$tarif = $r-> tarif;
			$tarifFasilitas = $r-> tarifFasilitas;
			$diTangguhkan = $r-> diTangguhkan;
			$diBebaskan = $r-> diBebaskan;
			$tidakDipungut = $r-> tidakDipungut;
			$flagCurah = $r-> flagCurah;
			$flagMigas = $r-> flagMigas;
			$flagVd = $r-> flagVd;
			$hargaPenyerahan = $r-> hargaPenyerahan;
			$Incoterm = $r-> Incoterm;
			$idRespon = $r-> idRespon;
			$idRespon_1 = $r-> idRespon_1;
			$jabatanTtd = $r-> jabatanTtd;
			$JenisImpor = $r-> JenisImpor;
			$JenisKemasan = $r-> JenisKemasan;
			$JenisProsedur = $r-> JenisProsedur;
			$JenisTpb = $r-> JenisTpb;
			$jumlahJenisBarang = $r-> jumlahJenisBarang;
			$jumlahKontainer = $r-> jumlahKontainer;
			$jumlahTandaPengaman = $r-> jumlahTandaPengaman;
			$kodeAsuransi = $r-> kodeAsuransi;
			$kodeCaraBayar = $r-> kodeCaraBayar;
			$kodeEntitas = $r-> kodeEntitas;
			$kodeIncoterm = $r-> kodeIncoterm;
			$kodeJenisImpor = $r-> kodeJenisImpor;
			$kodeJenisNilai = $r-> kodeJenisNilai;
			$kodeJenisProsedur = $r-> kodeJenisProsedur;
			$kodeJenisTpb = $r-> kodeJenisTpb;
			$kodeKantorTujuan = $r-> kodeKantorTujuan;
			$kodeKenaPajak = $r-> kodeKenaPajak;
			$kodeKondisiBarang = $r-> kodeKondisiBarang;
			$kodeTipeHarga = $r-> kodeTipeHarga;
			$kodeTujuanPemasukan = $r-> kodeTujuanPemasukan;
			$kodeTujuanPengiriman = $r-> kodeTujuanPengiriman;
			$kodeTujuanTpb = $r-> kodeTujuanTpb;
			$kodeTutupPu = $r-> kodeTutupPu;
			$KondisiBarang = $r-> KondisiBarang;
			$kotaTtd = $r-> kotaTtd;
			$kurs = $r-> kurs;
			$namaTtd = $r-> namaTtd;
			$nik = $r-> nik;
			$nilaiBarang = $r-> nilaiBarang;
			$nilaiIncoterm = $r-> nilaiIncoterm;
			$nilaiJasa = $r-> nilaiJasa;
			$nilaiMaklon = $r-> nilaiMaklon;
			$noDaftar = $r-> noDaftar;
			$seri = $r-> seri;
			$seriBank = $r-> seriBank;
			$seriEntitas = $r-> seriEntitas;
			$idPengguna = $r-> idPengguna;
			$seriEntitas1 = $r-> seriEntitas1;
			$seriEntitas2 = $r-> seriEntitas2;
			$seriEntitas3 = $r-> seriEntitas3;
			$seriEntitas4 = $r-> seriEntitas4;
			$seriPengangkut = $r-> seriPengangkut;
			$tanggalAju = $r-> tanggalAju;
			$tanggalTiba = $r-> tanggalTiba;
			$tanggalTtd = $r-> tanggalTtd;
			$totalDanaSawit = $r-> totalDanaSawit;
			$TujuanPemasukan = $r-> TujuanPemasukan;
			$TujuanPengiriman = $r-> TujuanPengiriman;
			$TujuanTpb = $r-> TujuanTpb;
			$TutupPu = $r-> TutupPu;
			$uangMuka = $r-> uangMuka;
			$vd = $r-> vd;
			$volume = $r-> volume;
			$kodeDokumen = $r-> kodeDokumen;
			$nomorAju = $r-> nomorAju;
			$tanggaldaftar = $r-> tanggaldaftar;
			$nomorPackingList = $r-> nomorPackingList;
			$nomorKontrak = $r-> nomorKontrak;
			$nomorFaktur = $r-> nomorFaktur;
			$tanggalPackingList = $r-> tanggalPackingList;
			$tanggalKontrak = $r-> tanggalKontrak;
			$tanggalFaktur = $r-> tanggalFaktur;
			$tanggalIjinPengusaha = $r-> tanggalIjinPengusaha;
			$kodeJenisTransaksi = $r-> kodeJenisTransaksi;
			$statusPengusaha = $r-> statusPengusaha;
			$namaPpjk = $r-> namaPpjk;
			$alamatPpjk = $r-> alamatPpjk;
			$npwpPpjk = $r-> npwpPpjk;
			$nomorIjinPpjk = $r-> nomorIjinPpjk;
		}
		
		
		
		
		$data['a'] = '';
		$data['bc_in_header_id'] = $bc_in_header_id;
		$data['id_tpb'] = $id_tpb;
		$data['asalData'] = $asalData;
		$data['Asuransi_tipe'] = $Asuransi_tipe;
		$data['biayaPengurang'] = $biayaPengurang;
		$data['biayaTambahan'] = $biayaTambahan;
		$data['CaraBayar'] = $CaraBayar;
		$data['disclaimer'] = $disclaimer;
		$data['namaPengusaha'] = $namaPengusaha;
		$data['alamatPengusaha'] = $alamatPengusaha;
		$data['kotaPengusaha'] = $kotaPengusaha;
		$data['kodePosPengusaha'] = $kodePosPengusaha;
		$data['kodeNegaraPengusaha'] = $kodeNegaraPengusaha;
		$data['negaraPengusaha'] = $negaraPengusaha;
		$data['npwpPengusaha'] = $npwpPengusaha;
		$data['nibPengusaha'] = $nibPengusaha;
		$data['nomorIjinPengusaha'] = $nomorIjinPengusaha;
		$data['namaPemasok'] = $namaPemasok;
		$data['alamatPemasok'] = $alamatPemasok;
		$data['kotaPemasok'] = $kotaPemasok;
		$data['kodePosPemasok'] = $kodePosPemasok;
		$data['kodeNegaraPemasok'] = $kodeNegaraPemasok;
		$data['negaraPemasok'] = $negaraPemasok;
		$data['npwpPemasok'] = $npwpPemasok;
		$data['nibPemasok'] = $nibPemasok;
		$data['nomorIjinPemasok'] = $nomorIjinPemasok;
		$data['namaPemilik'] = $namaPemilik;
		$data['alamatPemilik'] = $alamatPemilik;
		$data['kotaPemilik'] = $kotaPemilik;
		$data['kodePosPemilik'] = $kodePosPemilik;
		$data['kodeNegaraPemilik'] = $kodeNegaraPemilik;
		$data['negaraPemilik'] = $negaraPemilik;
		$data['npwpPemilik'] = $npwpPemilik;
		$data['nibPemilik'] = $nibPemilik;
		$data['nomorIjinPemilik'] = $nomorIjinPemilik;
		$data['namaPembeli'] = $namaPembeli;
		$data['alamatPembeli'] = $alamatPembeli;
		$data['kotaPembeli'] = $kotaPembeli;
		$data['kodePosPembeli'] = $kodePosPembeli;
		$data['kodeNegaraPembeli'] = $kodeNegaraPembeli;
		$data['negaraPembeli'] = $negaraPembeli;
		$data['npwpPembeli'] = $npwpPembeli;
		$data['nibPembeli'] = $nibPembeli;
		$data['nomorIjinPembeli'] = $nomorIjinPembeli;
		$data['namaPenjual'] = $namaPenjual;
		$data['alamatPenjual'] = $alamatPenjual;
		$data['kotaPenjual'] = $kotaPenjual;
		$data['kodePosPenjual'] = $kodePosPenjual;
		$data['kodeNegaraPenjual'] = $kodeNegaraPenjual;
		$data['negaraPenjual'] = $negaraPenjual;
		$data['npwpPenjual'] = $npwpPenjual;
		$data['nibPenjual'] = $nibPenjual;
		$data['nomorIjinPenjual'] = $nomorIjinPenjual;
		$data['kodeKppbcBongkar'] = $kodeKppbcBongkar;
		$data['KppbcBongkar'] = $KppbcBongkar;
		$data['kodeKppbc'] = $kodeKppbc;
		$data['Kppbc'] = $Kppbc;
		$data['kodeCaraAngkut'] = $kodeCaraAngkut;
		$data['caraAngkut'] = $caraAngkut;
		$data['namaPengangkut'] = $namaPengangkut;
		$data['nomorPengangkut'] = $nomorPengangkut;
		$data['pengangkut'] = $pengangkut;
		$data['kodeBendera'] = $kodeBendera;
		$data['Bendera'] = $Bendera;
		$data['kodePelBongkar'] = $kodePelBongkar;
		$data['pelabuhanBongkar'] = $pelabuhanBongkar;
		$data['kodePelMuat'] = $kodePelMuat;
		$data['pelabuhanMuat'] = $pelabuhanMuat;
		$data['kodePelTransit'] = $kodePelTransit;
		$data['pelabuhanTransit'] = $pelabuhanTransit;
		$data['kodePelTujuan'] = $kodePelTujuan;
		$data['pelabuhanTujuan'] = $pelabuhanTujuan;
		$data['nomorInvoice'] = $nomorInvoice;
		$data['tanggalInvoice'] = $tanggalInvoice;
		$data['nomor_bl'] = $nomor_bl;
		$data['tanggal_bl'] = $tanggal_bl;
		$data['nomorBc11'] = $nomorBc11;
		$data['tanggalBc11'] = $tanggalBc11;
		$data['posBc11'] = $posBc11;
		$data['subposBc11'] = $subposBc11;
		$data['kodeTps'] = $kodeTps;
		$data['tps'] = $tps;
		$data['kodeValuta'] = $kodeValuta;
		$data['valuta'] = $valuta;
		$data['ndpbm'] = $ndpbm;
		$data['freight'] = $freight;
		$data['asuransi'] = $asuransi;
		$data['cif'] = $cif;
		$data['cifRupiah'] = $cifRupiah;
		$data['fob'] = $fob;
		$data['kontainer'] = $kontainer;
		$data['kontainer20'] = $kontainer20;
		$data['kodeUkurankontainer'] = $kodeUkurankontainer;
		$data['kodeUkurankontainer20'] = $kodeUkurankontainer20;
		$data['jumlahKemasan'] = $jumlahKemasan;
		$data['kodeJenisKemasan'] = $kodeJenisKemasan;
		$data['kemasan'] = $kemasan;
		$data['merkKemasan'] = $merkKemasan;
		$data['KenaPajak'] = $KenaPajak;
		$data['netto'] = $netto;
		$data['bruto'] = $bruto;
		$data['posTarif'] = $posTarif;
		$data['kodeBarang'] = $kodeBarang;
		$data['uraian'] = $uraian;
		$data['merk'] = $merk;
		$data['tipe'] = $tipe;
		$data['ukuran'] = $ukuran;
		$data['KategoriBarang'] = $KategoriBarang;
		$data['NegaraAsal'] = $NegaraAsal;
		$data['jumlahSatuan'] = $jumlahSatuan;
		$data['kodeSatuanBarang'] = $kodeSatuanBarang;
		$data['netDetail'] = $netDetail;
		$data['cifRupiahDetail'] = $cifRupiahDetail;
		$data['kodeJenisPungutan'] = $kodeJenisPungutan;
		$data['tarif'] = $tarif;
		$data['tarifFasilitas'] = $tarifFasilitas;
		$data['diTangguhkan'] = $diTangguhkan;
		$data['diBebaskan'] = $diBebaskan;
		$data['tidakDipungut'] = $tidakDipungut;
		$data['flagCurah'] = $flagCurah;
		$data['flagMigas'] = $flagMigas;
		$data['flagVd'] = $flagVd;
		$data['hargaPenyerahan'] = $hargaPenyerahan;
		$data['Incoterm'] = $Incoterm;
		$data['idRespon'] = $idRespon;
		$data['idRespon_1'] = $idRespon_1;
		$data['jabatanTtd'] = $jabatanTtd;
		$data['JenisImpor'] = $JenisImpor;
		$data['JenisKemasan'] = $JenisKemasan;
		$data['JenisProsedur'] = $JenisProsedur;
		$data['JenisTpb'] = $JenisTpb;
		$data['jumlahJenisBarang'] = $jumlahJenisBarang;
		$data['jumlahKontainer'] = $jumlahKontainer;
		$data['jumlahTandaPengaman'] = $jumlahTandaPengaman;
		$data['kodeAsuransi'] = $kodeAsuransi;
		$data['kodeCaraBayar'] = $kodeCaraBayar;
		$data['kodeEntitas'] = $kodeEntitas;
		$data['kodeIncoterm'] = $kodeIncoterm;
		$data['kodeJenisImpor'] = $kodeJenisImpor;
		$data['kodeJenisNilai'] = $kodeJenisNilai;
		$data['kodeJenisProsedur'] = $kodeJenisProsedur;
		$data['kodeJenisTpb'] = $kodeJenisTpb;
		$data['kodeKantorTujuan'] = $kodeKantorTujuan;
		$data['kodeKenaPajak'] = $kodeKenaPajak;
		$data['kodeKondisiBarang'] = $kodeKondisiBarang;
		$data['kodeTipeHarga'] = $kodeTipeHarga;
		$data['kodeTujuanPemasukan'] = $kodeTujuanPemasukan;
		$data['kodeTujuanPengiriman'] = $kodeTujuanPengiriman;
		$data['kodeTujuanTpb'] = $kodeTujuanTpb;
		$data['kodeTutupPu'] = $kodeTutupPu;
		$data['KondisiBarang'] = $KondisiBarang;
		$data['kotaTtd'] = $kotaTtd;
		$data['kurs'] = $kurs;
		$data['namaTtd'] = $namaTtd;
		$data['nik'] = $nik;
		$data['nilaiBarang'] = $nilaiBarang;
		$data['nilaiIncoterm'] = $nilaiIncoterm;
		$data['nilaiJasa'] = $nilaiJasa;
		$data['nilaiMaklon'] = $nilaiMaklon;
		$data['noDaftar'] = $noDaftar;
		$data['seri'] = $seri;
		$data['seriBank'] = $seriBank;
		$data['seriEntitas'] = $seriEntitas;
		$data['idPengguna'] = $idPengguna;
		$data['seriEntitas1'] = $seriEntitas1;
		$data['seriEntitas2'] = $seriEntitas2;
		$data['seriEntitas3'] = $seriEntitas3;
		$data['seriEntitas4'] = $seriEntitas4;
		$data['seriPengangkut'] = $seriPengangkut;
		$data['tanggalAju'] = $tanggalAju;
		$data['tanggalTiba'] = $tanggalTiba;
		$data['tanggalTtd'] = $tanggalTtd;
		$data['totalDanaSawit'] = $totalDanaSawit;
		$data['TujuanPemasukan'] = $TujuanPemasukan;
		$data['TujuanPengiriman'] = $TujuanPengiriman;
		$data['TujuanTpb'] = $TujuanTpb;
		$data['TutupPu'] = $TutupPu;
		$data['uangMuka'] = $uangMuka;
		$data['vd'] = $vd;
		$data['volume'] = $volume;
		$data['kodeDokumen'] = $kodeDokumen;
		$data['nomorAju'] = $nomorAju;
		$data['tanggaldaftar'] = $tanggaldaftar;
		$data['nomorPackingList'] = $nomorPackingList;
		$data['nomorKontrak'] = $nomorKontrak;
		$data['nomorFaktur'] = $nomorFaktur;
		$data['tanggalPackingList'] = $tanggalPackingList;
		$data['tanggalKontrak'] = $tanggalKontrak;
		$data['tanggalFaktur'] = $tanggalFaktur;
		$data['tanggalIjinPengusaha'] = $tanggalIjinPengusaha;
		$data['kodeJenisTransaksi'] = $kodeJenisTransaksi;
		$data['statusPengusaha'] = $statusPengusaha;
		$data['namaPpjk'] = $namaPpjk;
		$data['alamatPpjk'] = $alamatPpjk;
		$data['npwpPpjk'] = $npwpPpjk;
		$data['nomorIjinPpjk'] = $nomorIjinPpjk;
		
		
		
		if($custom_type_id == 2){
			$this->load->view('draft/bc23',$data);
		}if($custom_type_id == 5){
			$this->load->view('draft/bc40',$data);
		}if($custom_type_id == 1){
			$this->load->view('draft/bc20',$data);
		}if($custom_type_id == 3){
			$this->load->view('draft/bc262',$data);
		}
        

    }
	
	
	public function cek_nomor_aju_ceisa($bc_in_header_id){
		
		$this->login_ceisa_new();
		$token = $this->session->userdata('s_token');
		
		$q = $this->db->query("
			select nomorAju from  tbl_bc_in_header where bc_in_header_id = $bc_in_header_id
		");
		$nomorAju = '1';
		foreach($q->result() as $r){
			$nomorAju = $r->nomorAju;			
		}
		
		$nomorAju = str_replace(array("-",".","xx"), array("",""), $nomorAju);
		$link = $this->config->item('APP_linkceisa');
		$url = $link . "openapi/status/$nomorAju";
		
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

		$headers = array(
		   "Authorization: Bearer $token",
		   "Content-Type: application/json"
		);
		   
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
		//for debug only!
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

		$resp = curl_exec($curl);
		curl_close($curl);
		
		$nomorAju ='';
				
		$status_ceisa = json_decode($resp, true);
		
		if (!array_key_exists("dataStatus",$status_ceisa))
		{
			return 'tidakadaaju' ;
		} 
		
		$asuw = isset($status_ceisa["Exception"])?$status_ceisa["Exception"]:'aw';
		if($asuw == 'aw'){
			if(count($status_ceisa) > 0){
				if(count($status_ceisa["dataStatus"][0]) > 0){
					$nomorAju = $status_ceisa["dataStatus"][0]["nomorAju"];
				} 
			}
		} else {
			$car="ulangi";		
			echo $car;
			die();
			
		}
		
		if($nomorAju == $nomorAju){
			return 'adaaju' ;
		} else {
			return 'tidakadaaju' ;
		}
		
		
	}


	function get_bl() {    
		$this->login_ceisa_new();
		$token = $this->session->userdata('s_token');
		$bc_in_header_id = $this->input->post('bc_in_header_id');
		$nomor_bl = $this->input->post('bl_no');
		$tanggal_bl = $this->input->post('bl_date');
		$bongkar_kppbc_id = $this->input->post('bongkar_kppbc_id');

		$tanggal_bl = date_create($tanggal_bl);
		$tanggal_bl = date_format($tanggal_bl, "d-m-Y");
		$bongkar_kppbc_id = $this->db->escape($bongkar_kppbc_id);

		$q = $this->db->query("
			SELECT kppbc_id, kppbc_code
			FROM dbo.ref_kppbc 
			WHERE kppbc_id = $bongkar_kppbc_id
		");

		$kode_kppbc = '';
		if ($q->num_rows() > 0) {
			$r = $q->row();
			$kode_kppbc = $r->kppbc_code;
		}

		$qx = $this->db->query("
			 SELECT partner_id, partner_name
			 FROM dbo.dt_partner 
			 WHERE partner_id = -99
		 ");
		 
		$importir = '';
		if ($qx->num_rows() > 0) {
			$rx = $qx->row();
			$importir = $rx->partner_name;
		} 

		$nomor_bl = str_replace(' ', '', $nomor_bl);
		$namapt = str_replace(' ','%20',$importir);

		$NOMOR_BL = "noHostBl=$nomor_bl&tglHostBl=$tanggal_bl&kodeKantor=$kode_kppbc&nama=$namapt";
		
		$url = "https://apis-gw.beacukai.go.id/openapi/manifes-bc11?$NOMOR_BL";

		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
		   "Authorization: Bearer $token",
		   "Content-Type: application/json"
		));
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_TIMEOUT, 10);  // Set timeout

		$resp = curl_exec($curl);

		if ($curl_error = curl_error($curl)) {
			echo json_encode(array("sts" => "09", "error" => $curl_error));
			curl_close($curl);
			return;
		}
		curl_close($curl);

		$respon_arr = json_decode($resp, true);

		if (json_last_error() !== JSON_ERROR_NONE) {
			echo json_encode(array("sts" => "09", "error" => "Invalid JSON response"));
			return;
		}
		
		if (isset($respon_arr['tglBc11'])) {
			$tglBc11 = date_create_from_format("d-m-Y", $respon_arr["tglBc11"]);
			$tglBc111 = date_format($tglBc11, "Y-m-d");
			
			$tglTiba = date_create_from_format("d-m-Y", $respon_arr["tglTiba"]);
			$tglTiba1 = date_format($tglTiba, "Y-m-d");
		
			$pelAsal = $respon_arr["pelAsal"];
			$pelTransit = $respon_arr["pelTransit"];
			$pelBongkar = $respon_arr["pelBongkar"];
			$bendera = $respon_arr["bendera"];
			$angkut = $respon_arr["caraPengangkutan"];
			
			$q = $this->db->query("
				SELECT port_id, port_code, port_name
				FROM dbo.ref_port 
				WHERE port_code = '$pelAsal'
			");
			$port_id = $q->num_rows() > 0 ? $q->row()->port_id : null;

			$qtr = $this->db->query("
				SELECT port_id, port_code, port_name
				FROM dbo.ref_port 
				WHERE port_code = '$pelTransit'
			");
			$port_tr_id = $qtr->num_rows() > 0 ? $qtr->row()->port_id : null;

			$qbkr = $this->db->query("
				SELECT port_id, port_code, port_name
				FROM dbo.ref_port 
				WHERE port_code = '$pelBongkar'
			");
			$port_bkr_id = $qbkr->num_rows() > 0 ? $qbkr->row()->port_id : null;

			$qbdr = $this->db->query("
				SELECT country_id, country_code, country_name
				FROM dbo.ref_country 
				WHERE country_code = '$bendera'
			");
			$bendera_id = $qbdr->num_rows() > 0 ? $qbdr->row()->country_id : null;

			$qank = $this->db->query("
				SELECT cara_angkut_id, cara_angkut
				FROM dbo.prm_cara_angkut 
				WHERE cara_angkut_id = '$angkut'
			");
			$angkut_id = $qank->num_rows() > 0 ? $qank->row()->cara_angkut_id : null;
			
			$respon = "";
			
			$res = array_merge(array(
				"sts" => "00", 
				"tglBc111" => $tglBc111, 
				"tglTiba1" => $tglTiba1, 
				"port_id" => $port_id, 
				"port_tr_id" => $port_tr_id, 
				"port_bkr_id" => $port_bkr_id, 
				"bendera_id" => $bendera_id, 
				"angkut_id" => $angkut_id
			), $respon_arr);
		} else {
			$res = array("sts" => "09", "tglBc111" => "", "tglTiba1" => "", "respon" => $respon_arr['respon']);
		}
		
		echo json_encode($res);
		die();
	}
	
	function get_tarif(){
		// Login and session management
		$this->login_ceisa_new();
		$token = $this->session->userdata('s_token');
		$bc_in_header_id = $this->input->post('bc_in_header_id');
		$hs_id = $this->input->post('hs_id');
		$tgl = date('Y-m-d');

		// Escape the hs_id to prevent SQL injection
		$hs_id = $this->db->escape($hs_id);

		// Query to get hs_code from the database
		$q = $this->db->query("
			SELECT hs_id, hs_code
			FROM dbo.ref_hs 
			WHERE hs_id = $hs_id
		");

		$hs_code = '';
		if ($q->num_rows() > 0) {
			$r = $q->row();
			$hs_code = $r->hs_code;
		} else {
			echo json_encode(array('sts' => '00', 'status'=>'01', 'message' => 'Kode HS tidak ditemukan'));
			die();
		}

		// Prepare the API request
		$hs_code=str_replace('.','',$hs_code);
		$hs_code = "kodeHs=$hs_code&tanggal=$tgl";
		$url = "https://apis-gw.beacukai.go.id/openapi/tarif-hs?$hs_code";

		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
		   "Authorization: Bearer $token",
		   "Content-Type: application/json"
		));
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

		$resp = curl_exec($curl);
		if ($resp === false) {
			echo json_encode(array('sts' => '00', 'status'=>'99', 'message' => 'Koneksi Jaringan terputus, Silahkan coba kembali!'));
			curl_close($curl);
			die();
		}

		curl_close($curl);
		$respon_arr = json_decode($resp, true);

		// Variables to hold the tariff values
		$tarifBm = null;
		$tarifPpn = null;
		$tarifPph = null;

		// Check if API response is valid and contains tariff data
		if (isset($respon_arr["posTarif"]) && is_array($respon_arr["posTarif"])) {
			$posTarif = $respon_arr["posTarif"];
			for ($x = 0; $x < count($posTarif); $x++) {
				if (isset($posTarif[$x]["kodeJenisPungutan"])) {
					if ($posTarif[$x]["kodeJenisPungutan"] == 'BM') {
						$tarifBm = $posTarif[$x]["tarif"];
					} elseif ($posTarif[$x]["kodeJenisPungutan"] == 'PPN') {
						$tarifPpn = $posTarif[$x]["tarif"];
					} elseif ($posTarif[$x]["kodeJenisPungutan"] == 'PPH') {
						$tarifPph = $posTarif[$x]["tarif"];
					}
				}
			}
		}

		// If any of the tariffs are missing, fetch from the local database
		if (is_null($tarifBm) || is_null($tarifPpn) || is_null($tarifPph)) {
			$q = $this->db->query("
				SELECT bm_tarif, ppn_tarif, pph_tarif
				FROM dbo.ref_hs 
				WHERE hs_id = $hs_id
			");

			if ($q->num_rows() > 0) {
				$r = $q->row();

				// Only override the API results if they are missing
				if (is_null($tarifBm)) {
					$tarifBm = $r->bm_tarif;
				}
				if (is_null($tarifPpn)) {
					$tarifPpn = $r->ppn_tarif;
				}
				if (is_null($tarifPph)) {
					$tarifPph = $r->pph_tarif;
				}
			} else {
				echo json_encode(array('sts' => '00', 'status'=>'01', 'message' => 'Data Tarif tidak ditemukan di API maupun di database lokal'));
				die();
			}
		}

		// Return the final results
		$result = array("sts" => "00", "tarifBm" => $tarifBm, "tarifPpn" => $tarifPpn, "tarifPph" => $tarifPph);
		echo json_encode($result);
		die();
	}
	
	function get_tarif_local(){
		$bc_in_header_id = $this->input->post('bc_in_header_id');
		$hs_id = $this->input->post('hs_id');
		$tgl = date('Y-m-d');

		$hs_id = $this->db->escape($hs_id);

		$q = $this->db->query("
			SELECT hs_id, hs_code, bm_tarif, ppn_tarif, pph_tarif
			FROM dbo.ref_hs 
			WHERE hs_id = $hs_id
		");

		if ($q->num_rows() > 0) {
			$r = $q->row();

			$result = array("sts" => "00");

			$result["tarifBm"] = $r->bm_tarif;
			$result["tarifPpn"] = $r->ppn_tarif;
			$result["tarifPph"] = $r->pph_tarif;

			echo json_encode($result);
			die();
		} else {
			echo json_encode(array('sts' => '00', 'status'=>'01', 'message' => 'Data Tarif tidak ditemukan'));
			die();
		}
	}
	
	function get_tarif_api(){
		$this->login_ceisa_new();
		$token = $this->session->userdata('s_token');
		$bc_in_header_id = $this->input->post('bc_in_header_id');
		$hs_id = $this->input->post('hs_id');
		$tgl = date('Y-m-d');
		
		$hs_id = $this->db->escape($hs_id);

		$q = $this->db->query("
			SELECT hs_id, hs_code
			FROM dbo.ref_hs 
			WHERE hs_id = $hs_id
		");

		$hs_code = '';
		if ($q->num_rows() > 0) {
			$r = $q->row();
			$hs_code = $r->hs_code;
		}
		
		//echo($hs_code);
		//die();
	
		$hs_code = "kodeHs=$hs_code&tanggal=$tgl";
		$url = "https://apis-gw.beacukai.go.id/openapi/tarif-hs?$hs_code";

		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
		   "Authorization: Bearer $token",
		   "Content-Type: application/json"
		));
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

		$resp = curl_exec($curl);
		if ($resp === false) {
        echo json_encode(array('sts' => '00', 'status'=>'99', 'message' => 'Koneksi Jaringan terputus, Silahkan coba kembali!'));
        curl_close($curl);
        die();
		}
		
		curl_close($curl);
		$respon_arr= json_decode($resp, true);
		//var_dump($respon_arr);
		//die();
			
			$tarifHs = isset($respon_arr["Exception"])?$respon_arr["Exception"]:'ok';
			if ($tarifHs == 'ok') {
			if (count($respon_arr) > 0 && isset($respon_arr["posTarif"])) {
				$posTarif = $respon_arr["posTarif"];
				$result = array("sts" => "00");
				for ($x = 0; $x < count($posTarif); $x++) {
					if (isset($posTarif[$x]["kodeJenisPungutan"])) {
						if ($posTarif[$x]["kodeJenisPungutan"] == 'BM') {
							$result["tarifBm"] = $posTarif[$x]["tarif"];
						} elseif ($posTarif[$x]["kodeJenisPungutan"] == 'PPN') {
							$result["tarifPpn"] = $posTarif[$x]["tarif"];
						} elseif ($posTarif[$x]["kodeJenisPungutan"] == 'PPH') {
							$result["tarifPph"] = $posTarif[$x]["tarif"];
						}
					}
				}
				echo json_encode($result);
				die();
			}
			} else {	
				echo json_encode(array('sts' => '00', 'status'=>'99' ,'message' =>'Koneksi terputus, Silahkan Login CEISA kembali!'));        
				die();	
			}
			
			echo json_encode(array('sts' => '00', 'status'=>'01', 'message' => 'Data Tarif tidak ditemukan'));
			die();
		
	} 
	
	function copy_doc() {
		$bc_in_header_id = (isset($_POST['bc_in_header_id']) && !empty($_POST['bc_in_header_id'])) ? $_POST['bc_in_header_id'] : die('{"sts":"ERROR","desc":"Param Header Tidak Ditemukan"}');
		$custom_type_id = (isset($_POST['custom_type_id']) && !empty($_POST['custom_type_id'])) ? $_POST['custom_type_id'] : die('{"sts":"ERROR","desc":"Param Type Tidak Ditemukan"}');
		$currencies_id = (isset($_POST['currencies_id']) && !empty($_POST['currencies_id'])) ? $_POST['currencies_id'] : die('{"sts":"ERROR","desc":"Param Currencies Tidak Ditemukan"}');
		$user_id = $this->session->userdata('user_id');

		// Ambil kode mata uang
		$q = $this->db->query("
			SELECT currencies_code
			FROM dbo.dt_currencies 
			WHERE currencies_id = $currencies_id
		");
		$currencies_code = ($q->num_rows() > 0) ? $q->row()->currencies_code : die('{"sts":"ERROR","desc":"Currencies Code Tidak Ditemukan"}');
		
		// Buat nomor Aju
		$nomorAju = $this->inc_noAju_trx($custom_type_id);
		if (!isset($nomorAju)) {
			echo json_encode(array('sts' => "00", 'desc' => "Nomor Aju gagal untuk dibentuk"));
			die();
		}

		// Ambil kurs
		//$ndpbm = $this->get_kurs($currencies_code);

		// Ambil data header
		$header_query = $this->db->query("
			SELECT *
			FROM dbo.dt_bc_in_header 
			WHERE bc_in_header_id = $bc_in_header_id
			LIMIT 1
		");


		if ($header_query->num_rows() > 0) {
			$header_data = $header_query->row();
			
			$currencies_rate = !empty($header_data->currencies_rate) ? $header_data->currencies_rate : 0;
			$kppbc_id = !empty($header_data->kppbc_id) ? $header_data->kppbc_id : 0;
			$jenis_pib_id = !empty($header_data->jenis_pib_id) ? $header_data->jenis_pib_id : 0;
			$jenis_impor_id = !empty($header_data->jenis_impor_id) ? $header_data->jenis_impor_id : 0;
			$cara_pembayaran_id = !empty($header_data->cara_pembayaran_id) ? $header_data->cara_pembayaran_id : 0;
			$ppjk_identity_id = !empty($header_data->ppjk_identity_id) ? $header_data->ppjk_identity_id : 0;
			$tujuan_port_id = !empty($header_data->tujuan_port_id) ? $header_data->tujuan_port_id : 0;
			$jenis_transaksi_kode = !empty($header_data->jenis_transaksi_kode) ? $header_data->jenis_transaksi_kode : 0;
			$jenis_tutup_pu_id = !empty($header_data->jenis_tutup_pu_id) ? $header_data->jenis_tutup_pu_id : 0;
			$fasilitas_id = !empty($header_data->fasilitas_id) ? $header_data->fasilitas_id : 0;
			$pjt_status_id = !empty($header_data->pjt_status_id) ? $header_data->pjt_status_id : 0;
			$tpb_header_id = !empty($header_data->tpb_header_id) ? $header_data->tpb_header_id : 0;
			$vendor_partner_id = !empty($header_data->vendor_partner_id) ? $header_data->vendor_partner_id : 0;
			$kode_jenis_nilai = !empty($header_data->kode_jenis_nilai) ? $header_data->kode_jenis_nilai : 0;
			$kode_kena_pajak = !empty($header_data->kode_kena_pajak) ? $header_data->kode_kena_pajak : 0;
			$kode_kondisi_barang = !empty($header_data->kode_kondisi_barang) ? $header_data->kode_kondisi_barang : 0;
			$kode_tutup_pu = !empty($header_data->kode_tutup_pu) ? $header_data->kode_tutup_pu : 0;
			$netto = !empty($header_data->netto) ? $header_data->netto : 0;
			$ndpbm = !empty($header_data->ndpbm) ? $header_data->ndpbm : 1;
			$jumlah_tanda_pengaman = !empty($header_data->jumlah_tanda_pengaman) ? $header_data->jumlah_tanda_pengaman : 0;
			$maklon = !empty($header_data->maklon) ? $header_data->maklon : 0;
			$uang_muka = !empty($header_data->uang_muka) ? $header_data->uang_muka : 0;
			$volume = !empty($header_data->volume) ? $header_data->volume : 0;
			
			$perkiraan_tgl_tiba = !empty($header_data->perkiraan_tgl_tiba) ? "'{$header_data->perkiraan_tgl_tiba}'" : 'NULL';
			$fasilitas_date = !empty($header_data->fasilitas_date) ? "'{$header_data->fasilitas_date}'" : 'NULL';
			$tgl_bc11 = !empty($header_data->tgl_bc11) ? "'{$header_data->tgl_bc11}'" : 'NULL';
			$tgl_ttd = !empty($header_data->tgl_ttd) ? "'{$header_data->tgl_ttd}'" : 'NULL';
			$tgl_perkiraan_tiba = !empty($header_data->tgl_perkiraan_tiba) ? "'{$header_data->tgl_perkiraan_tiba}'" : 'NULL';
			$bl_date = !empty($header_data->bl_date) ? "'{$header_data->bl_date}'" : 'NULL';
			
			//select nextval('dbo.dt_bc_in_header_bc_in_header_id_seq'::regclass);
			
			
			// Insert data header baru
			$insert_header_query = $this->db->query("
				INSERT INTO dbo.dt_bc_in_header (
					custom_type_id, car, bc_no, bc_date, partner_id, tujuan_tpb_id, currencies_id, price_type_id, amount_origin, currencies_rate,
					value_additional, discount, insurance_type_id, amount_insurance, amount_freight, bongkar_kppbc_id, bongkar_port_id, doc_from_id,
					bruto, finish_entry_date, finish_entry_time, cara_angkut_id, moda, tps_id, jenis_tpb_id, kode_bendera, tujuan_pemasukan_id,
					tujuan_pengiriman_id, transit_port_id, muat_port_id, nama_pengangkut, nomor_polisi, nomor_voy_flight, bc_in_header_status_id,
					bc_in_type_id, create_user_id, create_date, kppbc_id, jenis_pib_id, jenis_impor_id, cara_pembayaran_id, ppjk_identity_id,
					ppjk_identity, ppjk_nama, ppjk_alamat, ppjk_no, perkiraan_tgl_tiba, tujuan_port_id, jenis_transaksi_kode,
					jenis_tutup_pu_id, fasilitas_id, fasilitas_no, fasilitas_date, rate, netto, origin_rate, receive_status_id, pjt_status_id,
					ndpbm, tpb_header_id, maklon, vendor_partner_id, jabatan_ttd, jumlah_tanda_pengaman, kode_jenis_nilai, kota_ttd, nama_ttd,
					nik, nomor_bc11, pos_bc11, subpos_bc11, tgl_bc11, tgl_ttd, uang_muka, kode_kena_pajak, volume, kode_kondisi_barang,
					kode_tutup_pu, tanggal_aju, pengusaha_id, id_respon, tgl_perkiraan_tiba, mode, pemilik_id, bl_no, bl_date
				) VALUES (
					'{$header_data->custom_type_id}', '$nomorAju', '', null, '{$header_data->partner_id}', '{$header_data->tujuan_tpb_id}',
					'{$header_data->currencies_id}', '{$header_data->price_type_id}', '{$header_data->amount_origin}', $ndpbm,
					'{$header_data->value_additional}', '{$header_data->discount}', '{$header_data->insurance_type_id}', '{$header_data->amount_insurance}',
					'{$header_data->amount_freight}', '{$header_data->bongkar_kppbc_id}', '{$header_data->bongkar_port_id}', null,
					'{$header_data->bruto}', null, null, '{$header_data->cara_angkut_id}',
					'{$header_data->moda}', '{$header_data->tps_id}', '{$header_data->jenis_tpb_id}', '{$header_data->kode_bendera}', '{$header_data->tujuan_pemasukan_id}',
					'{$header_data->tujuan_pengiriman_id}', '{$header_data->transit_port_id}', '{$header_data->muat_port_id}', '{$header_data->nama_pengangkut}',
					'{$header_data->nomor_polisi}', '{$header_data->nomor_voy_flight}', 0, '{$header_data->bc_in_type_id}', $user_id, CURRENT_TIMESTAMP,
					 $kppbc_id, $jenis_pib_id, $jenis_impor_id, $cara_pembayaran_id,
					 $ppjk_identity_id, '{$header_data->ppjk_identity}', '{$header_data->ppjk_nama}', '{$header_data->ppjk_alamat}',
					'{$header_data->ppjk_no}', $perkiraan_tgl_tiba, $tujuan_port_id,
					 $jenis_transaksi_kode, $jenis_tutup_pu_id, $fasilitas_id, '{$header_data->fasilitas_no}',
					 $fasilitas_date, $ndpbm, $netto, $ndpbm, 0, $pjt_status_id,
					 $ndpbm, $tpb_header_id, $maklon, $vendor_partner_id, '{$header_data->jabatan_ttd}',
					$jumlah_tanda_pengaman, $kode_jenis_nilai, '{$header_data->kota_ttd}', '{$header_data->nama_ttd}',
					'{$header_data->nik}', '{$header_data->nomor_bc11}', '{$header_data->pos_bc11}', '{$header_data->subpos_bc11}', $tgl_bc11,
					$tgl_ttd, $uang_muka, $kode_kena_pajak, $volume, $kode_kondisi_barang,
					$kode_tutup_pu, TO_DATE(SUBSTRING('$nomorAju', 15, 4) || '-' || SUBSTRING('$nomorAju', 19, 2) || '-' || SUBSTRING('$nomorAju', 21, 2), 'YYYY-MM-DD'),
					'{$header_data->pengusaha_id}', -99, $tgl_perkiraan_tiba, '', '{$header_data->pemilik_id}', '{$header_data->bl_no}', $bl_date
				)
				RETURNING bc_in_header_id
			");
			
			if ($insert_header_query === FALSE) {
				$error = $this->db->error();
				die(json_encode(array('sts' => 'ERROR', 'desc' => "Query Error: " . $error['message'])));
			}
			print_r($insert_header_query);
			// $new_id_header = $insert_header_query->rows()->bc_in_header_id;

			$insert_detail_query = $this->db->query("
				INSERT INTO dt_bc_in_detail (
					bc_in_header_id, seri, item_id, kategori_barang_id, quantity_custom, uom_id, unit_price, quantity_package, package_id,
					origin_country_id, netto, bruto, volume, quantity_received, conversion, purchase_order_detail_id, purchase_performa_detail_id,
					subcon_in_detail_id, this_cmt, ex_rate, this_cmt_service, this_credit_note, this_fixed_asset, merk, tipe, ukuran,
					spesifikasi_lain, hs_id, tpb_barang_id, bm_jenis_tarif_id, bm_tarif, bm_uom_id, cukai_jenis_tarif_id, cukai_tarif, cukai_uom_id,
					pph_tarif, ppn_tarif, ppnbm_tarif, seri_hs, skema_tarif_id, fasilitas_id, note, subcon_price, isi_perkemasan, kode_asal_barang,
					kode_asal_bahan_baku, kode_perhitungan, kode_guna_barang, kode_kondisi_barang, uang_muka, nilai_devisa, pernyataan_lartas,
					seri_jin, asuransi, harga_perolehan, cif
				) VALUES (
					$new_id_header, seri, item_id, kategori_barang_id, quantity_custom, uom_id, unit_price, quantity_package, package_id,
					origin_country_id, netto, bruto, volume, quantity_received, conversion, purchase_order_detail_id, purchase_performa_detail_id,
					subcon_in_detail_id, this_cmt, ex_rate, this_cmt_service, this_credit_note, this_fixed_asset, merk, tipe, ukuran,
					spesifikasi_lain, hs_id, tpb_barang_id, bm_jenis_tarif_id, bm_tarif, bm_uom_id, cukai_jenis_tarif_id, cukai_tarif, cukai_uom_id,
					pph_tarif, ppn_tarif, ppnbm_tarif, seri_hs, skema_tarif_id, fasilitas_id, note, subcon_price, isi_perkemasan, kode_asal_barang,
					kode_asal_bahan_baku, kode_perhitungan, kode_guna_barang, kode_kondisi_barang, uang_muka, nilai_devisa, pernyataan_lartas,
					seri_jin, asuransi, harga_perolehan, cif
				FROM dbo.dt_bc_in_barang
				WHERE bc_in_header_id = $bc_in_header_id
				)
			");

        if ($insert_detail_query) {
            echo json_encode(array('sts' => "SUCCESS", 'desc' => "Data berhasil disalin"));
			} else {
				$error = $this->db->error();
				echo json_encode(array('sts' => "ERROR", 'desc' => "Data detail gagal disalin: " . $error['message']));
			}
		} else {
			echo json_encode(array('sts' => "ERROR", 'desc' => "Header tidak ditemukan"));
		}

	}
	
	
	
	
}

?>