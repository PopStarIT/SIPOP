<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Custom_export extends CI_Controller { 
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
	
	function custom_export_table() {
		$view = 'view_custom_export';
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
		
		return $get_field;
	}
	
	function custom_export_detail_table() {
		$view = 'view_custom_export_detail_ceisa40';
		$get_field = $this->ecc_library->get_field($view);
		
		$get_field['r1']['hidden'] = true;
		$get_field['r2']['hidden'] = true;
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
		$get_field['r32']['hidden'] = true;
		$get_field['r33']['hidden'] = true;
		$get_field['r34']['hidden'] = true;
		$get_field['r35']['hidden'] = true;
				
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
	
	function custom_export_document_table() {
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
	
	function custom_export_packaging_table() {
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
	
	function custom_export_container_table() {
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
	
	function custom_export_pkb_table() {
		$view = 'view_ceisa_pkb';
		$get_field = $this->ecc_library->get_field($view);
		
		$get_field['r1']['hidden'] = true;
		$get_field['r2']['hidden'] = true;
		$get_field['r3']['hidden'] = true;
		$get_field['r4']['hidden'] = true;
		$get_field['r5']['hidden'] = true;
		$get_field['r6']['hidden'] = true;
		$get_field['r7']['hidden'] = true;
		$get_field['r8']['hidden'] = true;
		
		$get_field['act']['sc'] = 'act';
		$get_field['act']['title'] = '#';
		$get_field['act']['bypassvalue'] = '';
		$get_field['act']['ctype'] = 'text';
		$get_field['act']['align'] = 'center';
		$get_field['act']['search'] = false;
		$get_field['act']['sortable'] = false;
		$get_field['act']['formatter'] = 'formatOperations_custom_pkb';
		$get_field['act']['width'] = 300;
		
		return $get_field;
	}
	
	
	function custom_export_respon_table() {
		$view = 'view_ceisa_respon_data';
		$get_field = $this->ecc_library->get_field($view);
		
		//$get_field['r1']['hidden'] = true;
		//$get_field['r2']['hidden'] = true;
		//$get_field['r3']['hidden'] = true;
		//$get_field['r4']['hidden'] = true;
		//$get_field['r5']['hidden'] = true;
		//$get_field['r6']['hidden'] = true;
		//$get_field['r7']['hidden'] = true;
		
		$get_field['act']['sc'] = 'act';
		$get_field['act']['title'] = '#';
		$get_field['act']['bypassvalue'] = '';
		$get_field['act']['ctype'] = 'text';
		$get_field['act']['align'] = 'center';
		$get_field['act']['search'] = false;
		$get_field['act']['sortable'] = false;
		$get_field['act']['formatter'] = 'formatOperations_custom_respon';
		$get_field['act']['width'] = 300;
		
		return $get_field;
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
		
		//$date_start = isset($_POST['date_start']) ? $_POST['date_start'] : date('Y-m-d');
		//$date_end = isset($_POST['date_end']) ? $_POST['date_end'] : date('Y-m-d');
		$bc_out_header_id = isset($_POST['bc_out_header_id']) ? $_POST['bc_out_header_id'] : '1';
		
		
		$where = " 1=1  ";
		$where = " bc_out_header_id='$bc_out_header_id'";
						
						
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
	
	function custom_export_detail_supply_table() {
		$view = 'view_custom_export_detail_supply';
		$get_field = $this->ecc_library->get_field($view);
		
		$get_field['r1']['hidden'] = true;
		$get_field['r2']['hidden'] = true;
		
		return $get_field;
	}
	
	function custom_export_transfer_item_table() {
		$view = 'view_stock_move_item_bc_out';
		$get_field = $this->ecc_library->get_field($view);
		
		$get_field['r1']['hidden'] = true;
		$get_field['r2']['hidden'] = true;
		
		return $get_field;
	}
	
	function custom_export_supply_item_table() {
		$view = 'view_stock_move_supply_bc_out';
		$get_field = $this->ecc_library->get_field($view);
		
		$get_field['r1']['hidden'] = true;
		$get_field['r2']['hidden'] = true;
		$get_field['r3']['hidden'] = true;
		
		$get_field['r14']['hidden'] = true;
		
		return $get_field;
	}
	
	function config_dashboard_table(){
		$dashboard_table = array();
		
		$field = $this->custom_export_table();
		$field_detail = $this->custom_export_detail_table();
		$field_document = $this->custom_export_document_table();
		$field_packaging = $this->custom_export_packaging_table();
		$field_contanier = $this->custom_export_container_table();
		$field_pkb = $this->custom_export_pkb_table();
		$field_respon = $this->custom_export_respon_table();
		$field_detail_supply = $this->custom_export_detail_supply_table();
		$field_transfer_item = $this->custom_export_transfer_item_table();
		$field_supply_item = $this->custom_export_supply_item_table();
		
		$dashboard_table['field'] = $field;
		$dashboard_table['field_detail'] = $field_detail;
		$dashboard_table['field_document'] = $field_document;
		$dashboard_table['field_packaging'] = $field_packaging;
		$dashboard_table['field_contanier'] = $field_contanier;
		$dashboard_table['field_pkb'] = $field_pkb;
		$dashboard_table['field_respon'] = $field_respon;
		$dashboard_table['field_detail_supply'] = $field_detail_supply;
		$dashboard_table['field_detail_loaddata'] = 'loaddata_detail';
		$dashboard_table['field_document_loaddata'] = 'loaddata_document';
		$dashboard_table['field_packaging_loaddata'] = 'loaddata_packaging';
		$dashboard_table['field_container_loaddata'] = 'loaddata_container';
		$dashboard_table['field_pkb_loaddata'] = 'loaddata_pkb';
		$dashboard_table['field_detail_supply_loaddata'] = 'loaddata_detail_supply';
		$dashboard_table['field_transfer_item'] = $field_transfer_item;
		$dashboard_table['field_transfer_item_loaddata'] = 'loaddata_transfer_item';
		$dashboard_table['field_supply_item'] = $field_supply_item;
		$dashboard_table['field_supply_item_loaddata'] = 'loaddata_supply_item';
		
		return $dashboard_table;
	}
	
	function index(){
		$this->load->model('main');
		$component['loadlayout'] = true;
		$component['view_load'] = 'custom_export/view';
		$component['view_load_form'] = 'custom_export/form';
		$component['load_js'][] = 'custom_export/view';
		$component['load_js'][] = 'custom_export/form';
				
		$dashboard_table = array();
		
		$nav_button = array();
		$nav_button[] = array('method_id' => 141,'title' => 'Add', 'icon' => 'fa fa-plus', 'load' => 'custom_export/function_add');
		$nav_button[] = array('method_id' => 149,'title' => 'Add From Request', 'icon' => 'fa fa-plus', 'load' => 'custom_export/function_add_from_request');
		$nav_button[] = array('method_id' => 142,'title' => 'Edit', 'icon' => 'fa fa-pencil', 'load' => 'custom_export/function_edit');
		$nav_button[] = array('method_id' => 144,'title' => 'Approve', 'icon' => 'fa fa-check', 'load' => 'custom_export/function_approve');
		$nav_button[] = array('method_id' => 143,'title' => 'Delete', 'icon' => 'fa fa-trash-o', 'load' => 'custom_export/function_delete');
		
		$field = $this->custom_export_table();
		
		$dashboard_table['nav_button'] = $nav_button;
		$dashboard_table['field'] = $field;
		$dashboard_table['nav_button'] = $nav_button;
		$component['dashboard_table'] = $dashboard_table;
		
		$this->authentication->ajaxlayout($component);
	}
	
	function bc24(){
		$this->load->model('main');
		$custom_type_id = 6;
		
		$component['loadlayout'] = true;
		
		$component['view_load'] = 'custom_export/view';
		$component['view_load_form'] = 'custom_export/form';
		$component['load_js'][] = 'custom_export/view';
		$component['load_js'][] = 'custom_export/form';
		
		
		$component['custom_type_id'] = $custom_type_id;
		$component['search_param'] = 'custom_type_id';
		$component['search_param_value'] = $custom_type_id;
		$component['page_title'] = 'BC 2.4';
		
		$nav_button = array();
		$nav_button[] = array('method_id' => 267,'title' => 'New', 'icon' => 'fa fa-plus', 'load' => 'custom_export/function_add');
		$nav_button[] = array('method_id' => 271,'title' => 'New From Proforma', 'icon' => 'fa fa-plus', 'load' => 'custom_export/function_add_from_performa');
		$nav_button[] = array('method_id' => 268,'title' => 'Edit', 'icon' => 'fa fa-pencil', 'load' => 'custom_export/function_edit');
		$nav_button[] = array('method_id' => 595,'title' => 'Supply', 'icon' => 'fa fa-pencil', 'load' => 'custom_export/function_supply');
		$nav_button[] = array('method_id' => 270,'title' => 'Approve', 'icon' => 'fa fa-pencil', 'load' => 'custom_export/function_approve');
		$nav_button[] = array('method_id' => 269,'title' => 'Delete', 'icon' => 'fa fa-trash-o', 'load' => 'custom_export/function_delete');
		$nav_button[] = array('method_id' => 762,'title' => 'Cancel Approve', 'icon' => 'fa fa-pencil', 'load' => 'custom_export/function_cancel_approve');
		
		$dashboard_table = $this->config_dashboard_table();
		
		$extra_data = array();
		$extra_data['custom_type_id'] = $custom_type_id;
		$dashboard_table['extra_data'] = $extra_data;
		$dashboard_table['nav_button'] = $nav_button;
		$component['dashboard_table'] = $dashboard_table;
		
		$this->authentication->ajaxlayout($component);
	}
	
	function bc25(){
		$this->load->model('main');
		$custom_type_id = 7;
		
		$component['loadlayout'] = true;
		
		$component['view_load'] = 'custom_export/view';
		$component['view_load_form'] = 'custom_export/form';
		$component['load_js'][] = 'custom_export/view';
		$component['load_js'][] = 'custom_export/form';
		
		
		$component['custom_type_id'] = $custom_type_id;
		$component['search_param'] = 'custom_type_id';
		$component['search_param_value'] = $custom_type_id;
		$component['page_title'] = 'BC 2.5';
		
		$nav_button = array();
		$nav_button[] = array('method_id' => 273,'title' => 'New', 'icon' => 'fa fa-plus', 'load' => 'custom_export/function_add');
		$nav_button[] = array('method_id' => 277,'title' => 'New From Proforma', 'icon' => 'fa fa-plus', 'load' => 'custom_export/function_add_from_performa');
		$nav_button[] = array('method_id' => 278,'title' => 'New From Sales', 'icon' => 'fa fa-plus', 'load' => 'custom_export/function_add_from_sales');
		$nav_button[] = array('method_id' => 274,'title' => 'Edit', 'icon' => 'fa fa-pencil', 'load' => 'custom_export/function_edit');
		$nav_button[] = array('method_id' => 401042,'title' => 'Preview', 'icon' => 'fa fa-print', 'load' => 'custom_export/function_ceisa40_preview');
		$nav_button[] = array('method_id' => 596,'title' => 'Supply', 'icon' => 'fa fa-pencil', 'load' => 'custom_export/function_supply');
		$nav_button[] = array('method_id' => 276,'title' => 'Approve', 'icon' => 'fa fa-pencil', 'load' => 'custom_export/function_approve');
		$nav_button[] = array('method_id' => 763,'title' => 'Cancel Approve', 'icon' => 'fa fa-pencil', 'load' => 'custom_export/function_cancel_approve');
		//$nav_button[] = array('method_id' => 401001,'title' => 'Login Ceisa', 'icon' => 'fa fa-user', 'load' => 'custom_export/function_ceisa40_login_mdl');
		//$nav_button[] = array('method_id' => 401012,'title' => 'Send To Ceisa (Draft)', 'icon' => 'fa fa-unlock', 'load' => 'custom_export/function_ceisa40_send');
		//$nav_button[] = array('method_id' => 401013,'title' => 'Send To Ceisa (IsFinal)', 'icon' => 'fa fa-lock', 'load' => 'custom_export/function_ceisa40_send_isfinal');
		//$nav_button[] = array('method_id' => 401002,'title' => 'Get Respon', 'icon' => 'fa fa-download', 'load' => 'custom_export/function_ceisa_get_respon');
		//$nav_button[] = array('method_id' => 401003,'title' => 'Logs Status', 'icon' => 'fa fa-database', 'load' => 'custom_export/function_ceisa40_logs');
		$nav_button[] = array('method_id' => 305,'title' => 'Delete', 'icon' => 'fa fa-trash-o', 'load' => 'custom_export/function_delete');
		//$nav_button[] = array('method_id' => 768,'title' => 'Cancel Approve', 'icon' => 'fa fa-pencil', 'load' => 'custom_export/function_cancel_approve');	
		//$nav_button[] = array('method_id' => 759,'title' => 'Send To TPB Ceisa', 'icon' => 'fa fa-upload', 'load' => 'custom_export/function_ceisa_send');
		//$nav_button[] = array('method_id' => 760,'title' => 'Get Register No', 'icon' => 'fa fa-download', 'load' => 'custom_export/function_ceisa_get_respon');
		//$nav_button[] = array('method_id' => 761,'title' => 'Cancel Send', 'icon' => 'fa fa-cross', 'load' => 'custom_export/function_ceisa_cancel_send');
		
		//--button dowpdown tambahan
		$button_aja = array();
		$child=array();
		$child[]=array('method_id' => 401001,'title' => 'Login Ceisa', 'icon' => 'fa fa-angle-double-right', 'load' => 'custom_export/function_ceisa40_login_mdl');
		$child[]=array('method_id' => 401012,'title' => 'Send To Ceisa (Draft)', 'icon' => 'fa fa-angle-double-right','load' => 'custom_export/function_ceisa40_send');
		$child[]=array('method_id' => 401013,'title' => 'Send To Ceisa (Is Final)', 'icon' => 'fa fa-angle-double-right','load' => 'custom_export/function_ceisa40_send_isfinal');
		$child[]=array('method_id' => 401002,'title' => 'Get Respon', 'icon' => 'fa fa-angle-double-right', 'load' => 'custom_export/function_ceisa_get_respon');
		$child[]=array('method_id' => 401003,'title' => 'Log Respon', 'icon' => 'fa fa-angle-double-right', 'load' => 'custom_export/function_ceisa40_log_mdl');
		$button_aja[] = array('method_id' => 305,'title' => 'Ceisa40   ', 'icon' => 'fa fa-paper-plane', 'child' =>$child );
		//----
		
		
		$dashboard_table = $this->config_dashboard_table();
		
		
		$extra_data = array();
		$extra_data['custom_type_id'] = $custom_type_id;
		$dashboard_table['extra_data'] = $extra_data;
		$dashboard_table['nav_button'] = $nav_button;
		$dashboard_table['dropdown_button'] = $button_aja;
		$component['dashboard_table'] = $dashboard_table;
		
		$this->authentication->ajaxlayout($component);
	}
	
	function bc261(){
		$this->load->model('main');
		$custom_type_id = 8;
		
		$component['loadlayout'] = true;
		
		$component['view_load'] = 'custom_export/view';
		$component['view_load_form'] = 'custom_export/form';
		$component['load_js'][] = 'custom_export/view';
		$component['load_js'][] = 'custom_export/form';
		
		
		$component['custom_type_id'] = $custom_type_id;
		$component['search_param'] = 'custom_type_id';
		$component['search_param_value'] = $custom_type_id;
		$component['page_title'] = 'BC 2.6.1';
		
		$nav_button = array();
		$nav_button[] = array('method_id' => 279,'title' => 'New', 'icon' => 'fa fa-plus', 'load' => 'custom_export/function_add');
		$nav_button[] = array('method_id' => 283,'title' => 'New From Proforma', 'icon' => 'fa fa-plus', 'load' => 'custom_export/function_add_from_performa');
		$nav_button[] = array('method_id' => 602,'title' => 'New From Contract Subcon', 'icon' => 'fa fa-plus', 'load' => 'custom_export/function_add_from_contract_subcon');
		$nav_button[] = array('method_id' => 280,'title' => 'Edit', 'icon' => 'fa fa-pencil', 'load' => 'custom_export/function_edit');
		$nav_button[] = array('method_id' => 401042,'title' => 'Preview', 'icon' => 'fa fa-print', 'load' => 'custom_export/function_ceisa40_preview');
		$nav_button[] = array('method_id' => 597,'title' => 'Supply', 'icon' => 'fa fa-pencil', 'load' => 'custom_export/function_supply');
		$nav_button[] = array('method_id' => 282,'title' => 'Approve', 'icon' => 'fa fa-pencil', 'load' => 'custom_export/function_approve');
		$nav_button[] = array('method_id' => 764,'title' => 'Cancel Approve', 'icon' => 'fa fa-pencil', 'load' => 'custom_export/function_cancel_approve');
		//$nav_button[] = array('method_id' => 401001,'title' => 'Login Ceisa', 'icon' => 'fa fa-user', 'load' => 'custom_export/function_ceisa40_login_mdl');
		//$nav_button[] = array('method_id' => 401012,'title' => 'Send To Ceisa (Draft)', 'icon' => 'fa fa-unlock', 'load' => 'custom_export/function_ceisa40_send');
		//$nav_button[] = array('method_id' => 401013,'title' => 'Send To Ceisa (IsFinal)', 'icon' => 'fa fa-lock', 'load' => 'custom_export/function_ceisa40_send_isfinal');
		//$nav_button[] = array('method_id' => 401002,'title' => 'Get Respon', 'icon' => 'fa fa-download', 'load' => 'custom_export/function_ceisa_get_respon');
		//$nav_button[] = array('method_id' => 401003,'title' => 'Logs Status', 'icon' => 'fa fa-database', 'load' => 'custom_export/function_ceisa40_logs');
		$nav_button[] = array('method_id' => 305,'title' => 'Delete', 'icon' => 'fa fa-trash-o', 'load' => 'custom_export/function_delete');
		//$nav_button[] = array('method_id' => 768,'title' => 'Cancel Approve', 'icon' => 'fa fa-pencil', 'load' => 'custom_export/function_cancel_approve');	
		//$nav_button[] = array('method_id' => 759,'title' => 'Send To TPB Ceisa', 'icon' => 'fa fa-upload', 'load' => 'custom_export/function_ceisa_send');
		//$nav_button[] = array('method_id' => 760,'title' => 'Get Register No', 'icon' => 'fa fa-download', 'load' => 'custom_export/function_ceisa_get_respon');
		//$nav_button[] = array('method_id' => 761,'title' => 'Cancel Send', 'icon' => 'fa fa-cross', 'load' => 'custom_export/function_ceisa_cancel_send');
		
		//--button dowpdown tambahan
		$button_aja = array();
		$child=array();
		$child[]=array('method_id' => 401001,'title' => 'Login Ceisa', 'icon' => 'fa fa-angle-double-right', 'load' => 'custom_export/function_ceisa40_login_mdl');
		$child[]=array('method_id' => 401012,'title' => 'Send To Ceisa (Draft)', 'icon' => 'fa fa-angle-double-right','load' => 'custom_export/function_ceisa40_send');
		$child[]=array('method_id' => 401013,'title' => 'Send To Ceisa (Is Final)', 'icon' => 'fa fa-angle-double-right','load' => 'custom_export/function_ceisa40_send_isfinal');
		$child[]=array('method_id' => 401002,'title' => 'Get Respon', 'icon' => 'fa fa-angle-double-right', 'load' => 'custom_export/function_ceisa_get_respon');
		$child[]=array('method_id' => 401003,'title' => 'Log Respon', 'icon' => 'fa fa-angle-double-right', 'load' => 'custom_export/function_ceisa40_log_mdl');
		$button_aja[] = array('method_id' => 305,'title' => 'Ceisa40   ', 'icon' => 'fa fa-paper-plane', 'child' =>$child );
		//----
		
		
		$dashboard_table = $this->config_dashboard_table();
		
		
		$extra_data = array();
		$extra_data['custom_type_id'] = $custom_type_id;
		$dashboard_table['extra_data'] = $extra_data;
		$dashboard_table['nav_button'] = $nav_button;
		$dashboard_table['dropdown_button'] = $button_aja;
		$component['dashboard_table'] = $dashboard_table;
		
		$this->authentication->ajaxlayout($component);
	}
	
	function bc27(){
		$this->load->model('main');
		$custom_type_id = 9;
		
		$component['loadlayout'] = true;
		
		$component['view_load'] = 'custom_export/view';
		//$component['view_load_form'] = 'custom_export/form';
		$component['view_load_form'] = 'custom_export/form_BC27';
		$component['load_js'][] = 'custom_export/view';
		$component['load_js'][] = 'custom_export/form';
		
		
		$component['custom_type_id'] = $custom_type_id;
		$component['search_param'] = 'custom_type_id';
		$component['search_param_value'] = $custom_type_id;
		$component['page_title'] = 'BC 2.7';
		
		$nav_button = array();
		$nav_button[] = array('method_id' => 285,'title' => 'New', 'icon' => 'fa fa-plus', 'load' => 'custom_export/function_add');
		$nav_button[] = array('method_id' => 289,'title' => 'New From Proforma', 'icon' => 'fa fa-plus', 'load' => 'custom_export/function_add_from_performa');
		$nav_button[] = array('method_id' => 603,'title' => 'New From Contract Subcon', 'icon' => 'fa fa-plus', 'load' => 'custom_export/function_add_from_contract_subcon');
		$nav_button[] = array('method_id' => 286,'title' => 'Edit', 'icon' => 'fa fa-pencil', 'load' => 'custom_export/function_edit');
		$nav_button[] = array('method_id' => 401042,'title' => 'Preview', 'icon' => 'fa fa-print', 'load' => 'custom_export/function_ceisa40_preview');
		$nav_button[] = array('method_id' => 598,'title' => 'Supply', 'icon' => 'fa fa-pencil', 'load' => 'custom_export/function_supply');
		$nav_button[] = array('method_id' => 288,'title' => 'Approve', 'icon' => 'fa fa-pencil', 'load' => 'custom_export/function_approve');
		$nav_button[] = array('method_id' => 765,'title' => 'Cancel Approve', 'icon' => 'fa fa-pencil', 'load' => 'custom_export/function_cancel_approve');
		//$nav_button[] = array('method_id' => 401001,'title' => 'Login Ceisa', 'icon' => 'fa fa-user', 'load' => 'custom_export/function_ceisa40_login_mdl');
		//$nav_button[] = array('method_id' => 401012,'title' => 'Send To Ceisa (Draft)', 'icon' => 'fa fa-unlock', 'load' => 'custom_export/function_ceisa40_send');
		//$nav_button[] = array('method_id' => 401013,'title' => 'Send To Ceisa (IsFinal)', 'icon' => 'fa fa-lock', 'load' => 'custom_export/function_ceisa40_send_isfinal');
		//$nav_button[] = array('method_id' => 401002,'title' => 'Get Respon', 'icon' => 'fa fa-download', 'load' => 'custom_export/function_ceisa_get_respon');
		//$nav_button[] = array('method_id' => 401003,'title' => 'Logs Status', 'icon' => 'fa fa-database', 'load' => 'custom_export/function_ceisa40_logs');
		$nav_button[] = array('method_id' => 305,'title' => 'Delete', 'icon' => 'fa fa-trash-o', 'load' => 'custom_export/function_delete');
		//$nav_button[] = array('method_id' => 768,'title' => 'Cancel Approve', 'icon' => 'fa fa-pencil', 'load' => 'custom_export/function_cancel_approve');	
		//$nav_button[] = array('method_id' => 759,'title' => 'Send To TPB Ceisa', 'icon' => 'fa fa-upload', 'load' => 'custom_export/function_ceisa_send');
		//$nav_button[] = array('method_id' => 760,'title' => 'Get Register No', 'icon' => 'fa fa-download', 'load' => 'custom_export/function_ceisa_get_respon');
		//$nav_button[] = array('method_id' => 761,'title' => 'Cancel Send', 'icon' => 'fa fa-cross', 'load' => 'custom_export/function_ceisa_cancel_send');
		
		//--button dowpdown tambahan
		$button_aja = array();
		$child=array();
		$child[]=array('method_id' => 401001,'title' => 'Login Ceisa', 'icon' => 'fa fa-angle-double-right', 'load' => 'custom_export/function_ceisa40_login_mdl');
		$child[]=array('method_id' => 401012,'title' => 'Send To Ceisa (Draft)', 'icon' => 'fa fa-angle-double-right','load' => 'custom_export/function_ceisa40_send');
		$child[]=array('method_id' => 401013,'title' => 'Send To Ceisa (Is Final)', 'icon' => 'fa fa-angle-double-right','load' => 'custom_export/function_ceisa40_send_isfinal');
		$child[]=array('method_id' => 401002,'title' => 'Get Respon', 'icon' => 'fa fa-angle-double-right', 'load' => 'custom_export/function_ceisa_get_respon');
		$child[]=array('method_id' => 401003,'title' => 'Log Respon', 'icon' => 'fa fa-angle-double-right', 'load' => 'custom_export/function_ceisa40_log_mdl');
		$button_aja[] = array('method_id' => 305,'title' => 'Ceisa40   ', 'icon' => 'fa fa-paper-plane', 'child' =>$child );
		//----
		
		
		$dashboard_table = $this->config_dashboard_table();
		
		
		$extra_data = array();
		$extra_data['custom_type_id'] = $custom_type_id;
		$dashboard_table['extra_data'] = $extra_data;
		$dashboard_table['nav_button'] = $nav_button;
		$dashboard_table['dropdown_button'] = $button_aja;
		$component['dashboard_table'] = $dashboard_table;
		
		$this->authentication->ajaxlayout($component);
	}
	
	function bc30(){
		$this->load->model('main');
		$custom_type_id = 10;
		
		$component['loadlayout'] = true;
		
		$component['view_load'] = 'custom_export/view';
		$component['view_load_form'] = 'custom_export/form';
		$component['load_js'][] = 'custom_export/view';
		$component['load_js'][] = 'custom_export/form';
		
		
		$component['custom_type_id'] = $custom_type_id;
		$component['search_param'] = 'custom_type_id';
		$component['search_param_value'] = $custom_type_id;
		$component['page_title'] = 'BC 3.0';
		
		$nav_button = array();
		$nav_button[] = array('method_id' => 291,'title' => 'New', 'icon' => 'fa fa-plus', 'load' => 'custom_export/function_add');
		$nav_button[] = array('method_id' => 295,'title' => 'New From Proforma', 'icon' => 'fa fa-plus', 'load' => 'custom_export/function_add_from_performa');
		$nav_button[] = array('method_id' => 604,'title' => 'New From Contract Subcon', 'icon' => 'fa fa-plus', 'load' => 'custom_export/function_add_from_contract_subcon');
		$nav_button[] = array('method_id' => 292,'title' => 'Edit', 'icon' => 'fa fa-pencil', 'load' => 'custom_export/function_edit');
		$nav_button[] = array('method_id' => 401042,'title' => 'Preview', 'icon' => 'fa fa-print', 'load' => 'custom_export/function_ceisa40_preview');
		$nav_button[] = array('method_id' => 599,'title' => 'Supply', 'icon' => 'fa fa-pencil', 'load' => 'custom_export/function_supply');
		$nav_button[] = array('method_id' => 294,'title' => 'Approve', 'icon' => 'fa fa-pencil', 'load' => 'custom_export/function_approve');
		$nav_button[] = array('method_id' => 766,'title' => 'Cancel Approve', 'icon' => 'fa fa-pencil', 'load' => 'custom_export/function_cancel_approve');
		//$nav_button[] = array('method_id' => 401001,'title' => 'Login Ceisa', 'icon' => 'fa fa-user', 'load' => 'custom_export/function_ceisa40_login_mdl');
		//$nav_button[] = array('method_id' => 401012,'title' => 'Send To Ceisa (Draft)', 'icon' => 'fa fa-unlock', 'load' => 'custom_export/function_ceisa40_send');
		//$nav_button[] = array('method_id' => 401013,'title' => 'Send To Ceisa (IsFinal)', 'icon' => 'fa fa-lock', 'load' => 'custom_export/function_ceisa40_send_isfinal');
		//$nav_button[] = array('method_id' => 401002,'title' => 'Get Respon', 'icon' => 'fa fa-download', 'load' => 'custom_export/function_ceisa_get_respon');
		//$nav_button[] = array('method_id' => 401003,'title' => 'Logs Status', 'icon' => 'fa fa-database', 'load' => 'custom_export/function_ceisa40_logs');
		$nav_button[] = array('method_id' => 305,'title' => 'Delete', 'icon' => 'fa fa-trash-o', 'load' => 'custom_export/function_delete');
		//$nav_button[] = array('method_id' => 768,'title' => 'Cancel Approve', 'icon' => 'fa fa-pencil', 'load' => 'custom_export/function_cancel_approve');	
		//$nav_button[] = array('method_id' => 759,'title' => 'Send To TPB Ceisa', 'icon' => 'fa fa-upload', 'load' => 'custom_export/function_ceisa_send');
		//$nav_button[] = array('method_id' => 760,'title' => 'Get Register No', 'icon' => 'fa fa-download', 'load' => 'custom_export/function_ceisa_get_respon');
		//$nav_button[] = array('method_id' => 761,'title' => 'Cancel Send', 'icon' => 'fa fa-cross', 'load' => 'custom_export/function_ceisa_cancel_send');
		
		//--button dowpdown tambahan
		$button_aja = array();
		$child=array();
		$child[]=array('method_id' => 401001,'title' => 'Login Ceisa', 'icon' => 'fa fa-angle-double-right', 'load' => 'custom_export/function_ceisa40_login_mdl');
		$child[]=array('method_id' => 401012,'title' => 'Send To Ceisa (Draft)', 'icon' => 'fa fa-angle-double-right','load' => 'custom_export/function_ceisa40_send');
		$child[]=array('method_id' => 401013,'title' => 'Send To Ceisa (Is Final)', 'icon' => 'fa fa-angle-double-right','load' => 'custom_export/function_ceisa40_send_isfinal');
		$child[]=array('method_id' => 401002,'title' => 'Get Respon', 'icon' => 'fa fa-angle-double-right', 'load' => 'custom_export/function_ceisa_get_respon');
		$child[]=array('method_id' => 401003,'title' => 'Log Respon', 'icon' => 'fa fa-angle-double-right', 'load' => 'custom_export/function_ceisa40_log_mdl');
		$button_aja[] = array('method_id' => 305,'title' => 'Ceisa40   ', 'icon' => 'fa fa-paper-plane', 'child' =>$child );
		//----
		
		
		$dashboard_table = $this->config_dashboard_table();
		
		
		$extra_data = array();
		$extra_data['custom_type_id'] = $custom_type_id;
		$dashboard_table['extra_data'] = $extra_data;
		$dashboard_table['nav_button'] = $nav_button;
		$dashboard_table['dropdown_button'] = $button_aja;
		$component['dashboard_table'] = $dashboard_table;

		$this->authentication->ajaxlayout($component);
	}
	
	function bc33(){
		$this->load->model('main');
		$custom_type_id = 11;
		
		$component['loadlayout'] = true;
		
		$component['view_load'] = 'custom_export/view';
		$component['view_load_form'] = 'custom_export/form';
		$component['load_js'][] = 'custom_export/view';
		$component['load_js'][] = 'custom_export/form';
		
		
		$component['custom_type_id'] = $custom_type_id;
		$component['search_param'] = 'custom_type_id';
		$component['search_param_value'] = $custom_type_id;
		$component['page_title'] = 'BC 3.3';
		
		$nav_button = array();
		$nav_button[] = array('method_id' => 297,'title' => 'New', 'icon' => 'fa fa-plus', 'load' => 'custom_export/function_add');
		$nav_button[] = array('method_id' => 301,'title' => 'New From Proforma', 'icon' => 'fa fa-plus', 'load' => 'custom_export/function_add_from_performa');
		$nav_button[] = array('method_id' => 605,'title' => 'New From Contract Subcon', 'icon' => 'fa fa-plus', 'load' => 'custom_export/function_add_from_contract_subcon');
		$nav_button[] = array('method_id' => 298,'title' => 'Edit', 'icon' => 'fa fa-pencil', 'load' => 'custom_export/function_edit');
		$nav_button[] = array('method_id' => 600,'title' => 'Supply', 'icon' => 'fa fa-pencil', 'load' => 'custom_export/function_supply');
		$nav_button[] = array('method_id' => 300,'title' => 'Approve', 'icon' => 'fa fa-pencil', 'load' => 'custom_export/function_approve');
		$nav_button[] = array('method_id' => 299,'title' => 'Delete', 'icon' => 'fa fa-trash-o', 'load' => 'custom_export/function_delete');
		$nav_button[] = array('method_id' => 767,'title' => 'Cancel Approve', 'icon' => 'fa fa-pencil', 'load' => 'custom_export/function_cancel_approve');
		
		$dashboard_table = $this->config_dashboard_table();
		
		$extra_data = array();
		$extra_data['custom_type_id'] = $custom_type_id;
		$dashboard_table['extra_data'] = $extra_data;
		$dashboard_table['nav_button'] = $nav_button;
		$component['dashboard_table'] = $dashboard_table;
		
		$this->authentication->ajaxlayout($component);
	}
	
	function bc41(){
		$this->load->model('main');
		$custom_type_id = 12;
		
		$component['loadlayout'] = true;
		
		$component['view_load'] = 'custom_export/view';
		$component['view_load_form'] = 'custom_export/form';
		$component['load_js'][] = 'custom_export/view';
		$component['load_js'][] = 'custom_export/form';
		
		
		$component['custom_type_id'] = $custom_type_id;
		$component['search_param'] = 'custom_type_id';
		$component['search_param_value'] = $custom_type_id;
		$component['page_title'] = 'BC 4.1';
		
		$nav_button = array();
		$nav_button[] = array('method_id' => 303,'title' => 'New', 'icon' => 'fa fa-plus', 'load' => 'custom_export/function_add');
		$nav_button[] = array('method_id' => 307,'title' => 'New From Proforma', 'icon' => 'fa fa-plus', 'load' => 'custom_export/function_add_from_performa');
		$nav_button[] = array('method_id' => 308,'title' => 'New From Contract Subcon', 'icon' => 'fa fa-plus', 'load' => 'custom_export/function_add_from_contract_subcon');
		$nav_button[] = array('method_id' => 304,'title' => 'Edit', 'icon' => 'fa fa-pencil', 'load' => 'custom_export/function_edit');
		$nav_button[] = array('method_id' => 401042,'title' => 'Preview', 'icon' => 'fa fa-print', 'load' => 'custom_export/function_ceisa40_preview');
		$nav_button[] = array('method_id' => 601,'title' => 'Supply', 'icon' => 'fa fa-pencil', 'load' => 'custom_export/function_supply');
		$nav_button[] = array('method_id' => 306,'title' => 'Approve', 'icon' => 'fa fa-pencil', 'load' => 'custom_export/function_approve');
		$nav_button[] = array('method_id' => 766,'title' => 'Cancel Approve', 'icon' => 'fa fa-pencil', 'load' => 'custom_export/function_cancel_approve');
		//$nav_button[] = array('method_id' => 401001,'title' => 'Login Ceisa', 'icon' => 'fa fa-user', 'load' => 'custom_export/function_ceisa40_login_mdl');
		//$nav_button[] = array('method_id' => 401012,'title' => 'Send To Ceisa (Draft)', 'icon' => 'fa fa-unlock', 'load' => 'custom_export/function_ceisa40_send');
		//$nav_button[] = array('method_id' => 401013,'title' => 'Send To Ceisa (IsFinal)', 'icon' => 'fa fa-lock', 'load' => 'custom_export/function_ceisa40_send_isfinal');
		//$nav_button[] = array('method_id' => 401002,'title' => 'Get Respon', 'icon' => 'fa fa-download', 'load' => 'custom_export/function_ceisa_get_respon');
		//$nav_button[] = array('method_id' => 401003,'title' => 'Logs Status', 'icon' => 'fa fa-database', 'load' => 'custom_export/function_ceisa40_logs');
		$nav_button[] = array('method_id' => 305,'title' => 'Delete', 'icon' => 'fa fa-trash-o', 'load' => 'custom_export/function_delete');
		//$nav_button[] = array('method_id' => 768,'title' => 'Cancel Approve', 'icon' => 'fa fa-pencil', 'load' => 'custom_export/function_cancel_approve');	
		//$nav_button[] = array('method_id' => 759,'title' => 'Send To TPB Ceisa', 'icon' => 'fa fa-upload', 'load' => 'custom_export/function_ceisa_send');
		//$nav_button[] = array('method_id' => 760,'title' => 'Get Register No', 'icon' => 'fa fa-download', 'load' => 'custom_export/function_ceisa_get_respon');
		//$nav_button[] = array('method_id' => 761,'title' => 'Cancel Send', 'icon' => 'fa fa-cross', 'load' => 'custom_export/function_ceisa_cancel_send');
		
		//--button dowpdown tambahan
		$button_aja = array();
		$child=array();
		$child[]=array('method_id' => 401001,'title' => 'Login Ceisa', 'icon' => 'fa fa-angle-double-right', 'load' => 'custom_export/function_ceisa40_login_mdl');
		$child[]=array('method_id' => 401012,'title' => 'Send To Ceisa (Draft)', 'icon' => 'fa fa-angle-double-right','load' => 'custom_export/function_ceisa40_send');
		$child[]=array('method_id' => 401013,'title' => 'Send To Ceisa (Is Final)', 'icon' => 'fa fa-angle-double-right','load' => 'custom_export/function_ceisa40_send_isfinal');
		$child[]=array('method_id' => 401002,'title' => 'Get Respon', 'icon' => 'fa fa-angle-double-right', 'load' => 'custom_export/function_ceisa_get_respon');
		$child[]=array('method_id' => 401003,'title' => 'Log Respon', 'icon' => 'fa fa-angle-double-right', 'load' => 'custom_export/function_ceisa40_log_mdl');
		$button_aja[] = array('method_id' => 305,'title' => 'Ceisa40   ', 'icon' => 'fa fa-paper-plane', 'child' =>$child );
		//----
		
		
		$dashboard_table = $this->config_dashboard_table();
		
		
		$extra_data = array();
		$extra_data['custom_type_id'] = $custom_type_id;
		$dashboard_table['extra_data'] = $extra_data;
		$dashboard_table['nav_button'] = $nav_button;
		$dashboard_table['dropdown_button'] = $button_aja;
		$component['dashboard_table'] = $dashboard_table;
		
		$this->authentication->ajaxlayout($component);
	}
	
	function pemusnahan(){
		$this->load->model('main');
		$custom_type_id = 13;
		
		$component['loadlayout'] = true;
		
		$component['view_load'] = 'custom_export/view';
		$component['view_load_form'] = 'custom_export/form';
		$component['load_js'][] = 'custom_export/view';
		$component['load_js'][] = 'custom_export/form';
		
		
		$component['custom_type_id'] = $custom_type_id;
		$component['search_param'] = 'custom_type_id';
		$component['search_param_value'] = $custom_type_id;
		$component['page_title'] = 'Disposal';
		
		$nav_button = array();
		$nav_button[] = array('method_id' => 309,'title' => 'New', 'icon' => 'fa fa-plus', 'load' => 'custom_export/function_add');
		$nav_button[] = array('method_id' => 313,'title' => 'New From Proforma', 'icon' => 'fa fa-plus', 'load' => 'custom_export/function_add_from_performa');
		$nav_button[] = array('method_id' => 310,'title' => 'Edit', 'icon' => 'fa fa-pencil', 'load' => 'custom_export/function_edit');
		$nav_button[] = array('method_id' => 312,'title' => 'Approve', 'icon' => 'fa fa-pencil', 'load' => 'custom_export/function_approve');
		$nav_button[] = array('method_id' => 311,'title' => 'Delete', 'icon' => 'fa fa-trash-o', 'load' => 'custom_export/function_delete');
		$nav_button[] = array('method_id' => 769,'title' => 'Cancel Approve', 'icon' => 'fa fa-pencil', 'load' => 'custom_export/function_cancel_approve');
		
		$dashboard_table = $this->config_dashboard_table();
		
		$extra_data = array();
		$extra_data['custom_type_id'] = $custom_type_id;
		$dashboard_table['extra_data'] = $extra_data;
		
		$component['dashboard_table'] = $dashboard_table;
		
		$this->authentication->ajaxlayout($component);
	}
	
	function loaddata() {
		$this->authentication->plainlayout();
		
		$custom_type_id = isset($_REQUEST['custom_type_id']) ? is_numeric($_REQUEST['custom_type_id']) ? $_REQUEST['custom_type_id']  : -1 : -1;
		
		$view = 'view_custom_export';
		$field = $this->custom_export_table();
		
			
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
				
		$bc_out_header_id = isset($_POST['bc_out_header_id']) ? $_POST['bc_out_header_id'] : false;
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			
			if($bc_out_header_id){
				$this->rpc_service_portal->setSP("dbo.sp_custom_export_approve");
				$this->rpc_service_portal->addField('bc_out_header_id',$bc_out_header_id);
			}
					
			$result = $this->rpc_service_portal->resultJSON();
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
				
		$bc_out_header_id = isset($_POST['bc_out_header_id']) ? $_POST['bc_out_header_id'] : false;
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			
			if($bc_out_header_id){
				$this->rpc_service_portal->setSP("dbo.sp_custom_export_cancel_approve");
				$this->rpc_service_portal->addField('bc_out_header_id',$bc_out_header_id);
			}
					
			$result = $this->rpc_service_portal->resultJSON();
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
				
		$bc_out_header_id = isset($_POST['bc_out_header_id']) ? $_POST['bc_out_header_id'] : false;
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			
			if($bc_out_header_id){
				$this->rpc_service_portal->setSP("dbo.sp_custom_export_delete");
				$this->rpc_service_portal->addField('bc_out_header_id',$bc_out_header_id);
			}
					
			$result = $this->rpc_service_portal->resultJSON();
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
				
		$bc_out_header_id = isset($_POST['bc_out_header_id']) ? $_POST['bc_out_header_id'] : '';
		$custom_type_id = isset($_POST['custom_type_id']) ? $_POST['custom_type_id'] : '';
		$bc_out_type_id = isset($_POST['bc_out_type_id']) ? $_POST['bc_out_type_id'] : '';
		$car = isset($_POST['car']) ? $_POST['car'] : '';
		$bc_no = isset($_POST['bc_no']) ? $_POST['bc_no'] : '';
		$bc_date = isset($_POST['bc_date']) ? $_POST['bc_date'] : '';
		$partner_id = isset($_POST['partner_id']) ? $_POST['partner_id'] : '';
		$vendor_partner_id = isset($_POST['vendor_partner_id']) ? $_POST['vendor_partner_id'] : '';
		$currencies_id = isset($_POST['currencies_id']) ? $_POST['currencies_id'] : '';
		$sales_performa_id = isset($_POST['sales_performa_id']) ? $_POST['sales_performa_id'] : '';
		$sales_order_id = isset($_POST['sales_order_id']) ? $_POST['sales_order_id'] : '';
		$contract_subcon = isset($_POST['contract_subcon']) ? $_POST['contract_subcon'] : '';
		
		$muat_kppbc_id = isset($_POST['muat_kppbc_id']) ? $_POST['muat_kppbc_id'] : '';
		$kppbc_id = isset($_POST['kppbc_id']) ? $_POST['kppbc_id'] : '';
		$jenis_ekspor_id = isset($_POST['jenis_ekspor_id']) ? $_POST['jenis_ekspor_id'] : '';
		$kategori_ekspor_id = isset($_POST['kategori_ekspor_id']) ? $_POST['kategori_ekspor_id'] : '';
		$cara_perdagangan_id = isset($_POST['cara_perdagangan_id']) ? $_POST['cara_perdagangan_id'] : '';
		$cara_pembayaran_id = isset($_POST['cara_pembayaran_id']) ? $_POST['cara_pembayaran_id'] : '';
		$cara_angkut_id = isset($_POST['cara_angkut_id']) ? $_POST['cara_angkut_id'] : '';
		$nama_pengangkut = isset($_POST['nama_pengangkut']) ? $_POST['nama_pengangkut'] : false;
		$nama_pengangkut2 = isset($_POST['nama_pengangkut2']) ? $_POST['nama_pengangkut2'] : '';
		if(strlen(trim($nama_pengangkut)) == 0){
			$nama_pengangkut = $nama_pengangkut2;
		}
		$kode_bendera = isset($_POST['kode_bendera']) ? $_POST['kode_bendera'] : '';
		$nomor_voy_flight = isset($_POST['nomor_voy_flight']) ? $_POST['nomor_voy_flight'] : '';
		$tanggal_perkiraan_ekspor = isset($_POST['tanggal_perkiraan_ekspor']) ? $_POST['tanggal_perkiraan_ekspor'] : '';
		$ndpbm = isset($_POST['ndpbm']) ? $_POST['ndpbm'] : 1;
		$price_type_id = isset($_POST['price_type_id']) ? $_POST['price_type_id'] : '';
		$amount_origin = isset($_POST['amount_origin']) ? $_POST['amount_origin'] : '';
		$insurance_type_id = isset($_POST['insurance_type_id']) ? $_POST['insurance_type_id'] : '';
		$amount_insurance = isset($_POST['amount_insurance']) ? $_POST['amount_insurance'] : '';
		$amount_freight = isset($_POST['amount_freight']) ? $_POST['amount_freight'] : '';
		$maklon = isset($_POST['maklon']) ? $_POST['maklon'] : '';
		$muat_port_id = isset($_POST['muat_port_id']) ? $_POST['muat_port_id'] : '';
		$muat2_port_id = isset($_POST['muat2_port_id']) ? $_POST['muat2_port_id'] : '';
		$bongkar_port_id = isset($_POST['bongkar_port_id']) ? $_POST['bongkar_port_id'] : '';
		$tujuan_port_id = isset($_POST['tujuan_port_id']) ? $_POST['tujuan_port_id'] : '';
		$tujuan_country_id = isset($_POST['tujuan_country_id']) ? $_POST['tujuan_country_id'] : '';
		
		$jenis_tpb_id = isset($_POST['jenis_tpb_id']) ? $_POST['jenis_tpb_id'] : '';
		$tujuan_jenis_tpb_id = isset($_POST['tujuan_jenis_tpb_id']) ? $_POST['tujuan_jenis_tpb_id'] : '';
		$tujuan_pengiriman_id = isset($_POST['tujuan_pengiriman_id']) ? $_POST['tujuan_pengiriman_id'] : '';
		$nomor_polisi = isset($_POST['nomor_polisi']) ? $_POST['nomor_polisi'] : '';
		
		//tambahan data input ceisa40
		$bank_id = isset($_POST['bank_id']) ? $_POST['bank_id'] : '';
		$jabatan_ttd = isset($_POST['jabatan_ttd']) ? $_POST['jabatan_ttd'] : '';
		$kode_lokasi_periksa = isset($_POST['kode_lokasi_periksa']) ? $_POST['kode_lokasi_periksa'] : '';
		$kode_kantor_periksa = isset($_POST['kode_kantor_periksa']) ? $_POST['kode_kantor_periksa'] : '';
		$kota_ttd = isset($_POST['kota_ttd']) ? $_POST['kota_ttd'] : '';
		$nama_ttd = isset($_POST['nama_ttd']) ? $_POST['nama_ttd'] : '';
		$bruto = isset($_POST['bruto']) ? $_POST['bruto'] : '';
		$nik = isset($_POST['nik']) ? $_POST['nik'] : '';
		$kode_jenis_nilai = isset($_POST['kode_jenis_nilai']) ? $_POST['kode_jenis_nilai'] : '';
		$nomor_bc11 = isset($_POST['nomor_bc11']) ? $_POST['nomor_bc11'] : '';
		$pos_bc11 = isset($_POST['pos_bc11']) ? $_POST['pos_bc11'] : '';
		$subpos_bc11 = isset($_POST['subpos_bc11']) ? $_POST['subpos_bc11'] : '';
		$tanggal_periksa = isset($_POST['tanggal_periksa']) ? $_POST['tanggal_periksa'] : '';
		$tgl_ttd = isset($_POST['tgl_ttd']) ? $_POST['tgl_ttd'] : '';
		$uang_muka = isset($_POST['uang_muka']) ? $_POST['uang_muka'] : '';
		$kode_kena_pajak = isset($_POST['kode_kena_pajak']) ? $_POST['kode_kena_pajak'] : '';
		$volume = isset($_POST['volume']) ? $_POST['volume'] : '';
		$kode_kondisi_barang = isset($_POST['kode_kondisi_barang']) ? $_POST['kode_kondisi_barang'] : '';
		$kode_tutup_pu = isset($_POST['kode_tutup_pu']) ? $_POST['kode_tutup_pu'] : '';
		$pemilik_id = isset($_POST['pemilik_id']) ? $_POST['pemilik_id'] : '';
		$kode_pembayar = isset($_POST['kode_pembayar']) ? $_POST['kode_pembayar'] : '';
		
		$sales_performa = explode(',',$sales_performa_id);
		$sales_order = explode(',',$sales_order_id);
		$contract_subcon = explode(',',$contract_subcon);
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			if($bc_out_header_id){
				$this->rpc_service_portal->setSP("dbo.sp_custom_export_ceisa40_edit");
				$this->rpc_service_portal->addField('bc_out_header_id',$bc_out_header_id);
			} else {
				switch($bc_out_type_id){
					case '1':
						$this->rpc_service_portal->setSP("dbo.sp_custom_export_ceisa40_add");
					break;
					
					case '2':
						$this->rpc_service_portal->setSP("dbo.sp_custom_export_add_from_performa");
						
						foreach($sales_performa as $dt_data){
							$data = array('sales_performa_id'=>$dt_data);
							$this->rpc_service_portal->addAttributeChild('dt' ,$data);
						}
					break;
					
					case '3':
						$this->rpc_service_portal->setSP("dbo.sp_custom_export_add_from_sales");
						
						foreach($sales_order as $dt_data){
							$data = array('sales_order_id'=>$dt_data);
							$this->rpc_service_portal->addAttributeChild('dt' ,$data);
						}
					break;
					
					case '4':
						$this->rpc_service_portal->setSP("dbo.sp_custom_export_ceisa40_add_from_contract_subcon");
						
						foreach($contract_subcon as $dt_data){
							$data = array('contract_subcon_id'=>$dt_data);
							$this->rpc_service_portal->addAttributeChild('dt' ,$data);
						}
						
					break;
					
					default:
						$this->rpc_service_portal->setSP("dbo.sp_custom_export_ceisa40_add");
					break;
				}
			}			
						
			$this->rpc_service_portal->addField('custom_type_id',$custom_type_id);
			$this->rpc_service_portal->addField('bc_out_type_id',$bc_out_type_id);
			$this->rpc_service_portal->addField('car',$car);
			$this->rpc_service_portal->addField('bc_no',$bc_no);
			$this->rpc_service_portal->addField('bc_date',$bc_date);
			$this->rpc_service_portal->addField('partner_id',$partner_id);					
			$this->rpc_service_portal->addField('vendor_partner_id',$vendor_partner_id);					
			$this->rpc_service_portal->addField('currencies_id',$currencies_id);
			
			$this->rpc_service_portal->addField('muat_kppbc_id',$muat_kppbc_id);			
			$this->rpc_service_portal->addField('kppbc_id',$kppbc_id);			
			$this->rpc_service_portal->addField('jenis_ekspor_id',$jenis_ekspor_id);			
			$this->rpc_service_portal->addField('kategori_ekspor_id',$kategori_ekspor_id);			
			$this->rpc_service_portal->addField('cara_perdagangan_id',$cara_perdagangan_id);
			$this->rpc_service_portal->addField('cara_pembayaran_id',$cara_pembayaran_id);
			$this->rpc_service_portal->addField('cara_angkut_id',$cara_angkut_id);
			$this->rpc_service_portal->addField('nama_pengangkut',$nama_pengangkut);
			$this->rpc_service_portal->addField('kode_bendera',$kode_bendera);
			$this->rpc_service_portal->addField('nomor_voy_flight',$nomor_voy_flight);
			$this->rpc_service_portal->addField('tanggal_perkiraan_ekspor',$tanggal_perkiraan_ekspor);
			$this->rpc_service_portal->addField('ndpbm',$ndpbm);
			$this->rpc_service_portal->addField('price_type_id',$price_type_id);
			$this->rpc_service_portal->addField('amount_origin',$amount_origin);
			$this->rpc_service_portal->addField('insurance_type_id',$insurance_type_id);
			$this->rpc_service_portal->addField('amount_insurance',$amount_insurance);
			$this->rpc_service_portal->addField('amount_freight',$amount_freight);
			$this->rpc_service_portal->addField('maklon',$maklon);
			$this->rpc_service_portal->addField('muat_port_id',$muat_port_id);
			$this->rpc_service_portal->addField('muat2_port_id',$muat2_port_id);
			$this->rpc_service_portal->addField('bongkar_port_id',$bongkar_port_id);
			$this->rpc_service_portal->addField('tujuan_port_id',$tujuan_port_id);
			$this->rpc_service_portal->addField('tujuan_country_id',$tujuan_country_id);
			
			$this->rpc_service_portal->addField('jenis_tpb_id',$jenis_tpb_id);
			$this->rpc_service_portal->addField('tujuan_jenis_tpb_id',$tujuan_jenis_tpb_id);
			$this->rpc_service_portal->addField('tujuan_pengiriman_id',$tujuan_pengiriman_id);
			$this->rpc_service_portal->addField('nomor_polisi',$nomor_polisi);
			
			//tambahan data input ceisa40
			$this->rpc_service_portal->addField('bank_id',$bank_id);			
			$this->rpc_service_portal->addField('jabatan_ttd',$jabatan_ttd);			
			$this->rpc_service_portal->addField('kode_kantor_periksa',$kode_kantor_periksa);			
			$this->rpc_service_portal->addField('kode_lokasi_periksa',$kode_lokasi_periksa);			
			$this->rpc_service_portal->addField('kode_',$kode_jenis_nilai);			
			$this->rpc_service_portal->addField('kota_ttd',$kota_ttd);			
			$this->rpc_service_portal->addField('nama_ttd',$nama_ttd);			
			$this->rpc_service_portal->addField('bruto',$bruto);			
			$this->rpc_service_portal->addField('nik',$nik);			
			$this->rpc_service_portal->addField('nomor_bc11',$nomor_bc11);			
			$this->rpc_service_portal->addField('pos_bc11',$pos_bc11);			
			$this->rpc_service_portal->addField('subpos_bc11',$subpos_bc11);			
			$this->rpc_service_portal->addField('tanggal_periksa',$tanggal_periksa);			
			$this->rpc_service_portal->addField('tgl_ttd',$tgl_ttd);			
			$this->rpc_service_portal->addField('uang_muka',$uang_muka);			
			$this->rpc_service_portal->addField('kode_kena_pajak',$kode_kena_pajak);			
			$this->rpc_service_portal->addField('volume',$volume);			
			$this->rpc_service_portal->addField('kode_kondisi_barang',$kode_kondisi_barang);			
			$this->rpc_service_portal->addField('kode_tutup_pu',$kode_tutup_pu);		
			$this->rpc_service_portal->addField('pemilik_id',$pemilik_id);		
			$this->rpc_service_portal->addField('kode_pembayar',$kode_pembayar);		
					
			$result = $this->rpc_service_portal->resultJSON();
			
			$data = array();
			if(isset($result)){
				if(isset($result['valid'])){
					if($result['valid']){
						if(isset($result['data'])){
							$data_result = json_decode($result['data'],true);
							
							$return['valid'] = $result['valid'];
							$return['status_code'] = $result['no'];
							$return['message'] = $result['des'];
							$return['bc_out_header_id'] = $data_result['bc_out_header_id'];
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
		
		$bc_out_header_id = isset($_REQUEST['bc_out_header_id']) ? is_numeric($_REQUEST['bc_out_header_id']) ? $_REQUEST['bc_out_header_id']  : -1 : -1;
		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;
		
		$view = 'view_custom_export_detail_ceisa40';
		$field = $this->custom_export_detail_table();
		
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";
		
		$extra_param = array();
		$extra_param['where']['0']['field'] = 'r2';
		$extra_param['where']['0']['data'] = $bc_out_header_id;
		$extra_param['methodid'] = $methodid;
		
		$loaddata = $this->ecc_library->get_field_data($view,$field,$extra_param);
			
		echo $loaddata;
	}

	function post_add_edit_detail(){
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
		
		$bc_out_barang_id = isset($_POST['bc_out_barang_id']) ? $_POST['bc_out_barang_id'] : false;
		$bc_out_header_id = isset($_POST['bc_out_header_id']) ? $_POST['bc_out_header_id'] : 0;
		$seri = isset($_POST['seri']) ? $_POST['seri'] : 0;
		$item_id = isset($_POST['item_id']) ? $_POST['item_id'] : '';
		$hs_id = isset($_POST['hs_id']) ? $_POST['hs_id'] : '';
		$kategori_barang_id = isset($_POST['kategori_barang_id']) ? $_POST['kategori_barang_id'] : '';
		$quantity_custom = isset($_POST['quantity_custom']) ? $_POST['quantity_custom'] : '';
		$uom_id = isset($_POST['uom_id']) ? $_POST['uom_id'] : '';
		$conversion = isset($_POST['conversion']) ? $_POST['conversion'] : '';
		$unit_price = isset($_POST['unit_price']) ? $_POST['unit_price'] : '';
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
		$subcon_price = isset($_POST['subcon_price']) ? $_POST['subcon_price'] : '';
		
		
		//tambahan ceisa40
		$isi_perkemasan = isset($_POST['isi_perkemasan']) ? $_POST['isi_perkemasan'] : '';
		$kode_asal_barang = isset($_POST['kode_asal_barang']) ? $_POST['kode_asal_barang'] : '';
		$kode_asal_bahan_baku = isset($_POST['kode_asal_bahan_baku']) ? $_POST['kode_asal_bahan_baku'] : '';
		$daerah_kode = isset($_POST['daerah_kode']) ? $_POST['daerah_kode'] : '';
		$kode_perhitungan = isset($_POST['kode_perhitungan']) ? $_POST['kode_perhitungan'] : '';
		$kode_guna_barang = isset($_POST['kode_guna_barang']) ? $_POST['kode_guna_barang'] : '';
		$kode_kondisi_barang = isset($_POST['kode_kondisi_barang']) ? $_POST['kode_kondisi_barang'] : '';
		$uang_muka = isset($_POST['uang_muka']) ? $_POST['uang_muka'] : '';
		$nilai_devisa = isset($_POST['nilai_devisa']) ? $_POST['nilai_devisa'] : '';
		$pernyataan_lartas = isset($_POST['pernyataan_lartas']) ? $_POST['pernyataan_lartas'] : '';
		$seri_jin = isset($_POST['seri_jin']) ? $_POST['seri_jin'] : '';
		$asuransi = isset($_POST['asuransi']) ? $_POST['asuransi'] : '';
		$harga_perolehan = isset($_POST['harga_perolehan']) ? $_POST['harga_perolehan'] : '';
		$fob = isset($_POST['fob']) ? $_POST['fob'] : '';
		$kode_kondisi_barang = isset($_POST['kode_kondisi_barang']) ? $_POST['kode_kondisi_barang'] : '';
		
		
		//sampe sini
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			if($bc_out_barang_id){
				$this->rpc_service_portal->setSP("dbo.sp_custom_export_detail_ceisa40_edit");
				$this->rpc_service_portal->addField('bc_out_barang_id',$bc_out_barang_id);
			} else {
				$this->rpc_service_portal->setSP("dbo.sp_custom_export_detail_ceisa40_add");
			}
			
			$this->rpc_service_portal->addField('bc_out_header_id',$bc_out_header_id);
			
			$this->rpc_service_portal->addField('seri',$seri);
			$this->rpc_service_portal->addField('item_id',$item_id);
			$this->rpc_service_portal->addField('hs_id',$hs_id);
			$this->rpc_service_portal->addField('kategori_barang_id',$kategori_barang_id);
			$this->rpc_service_portal->addField('quantity_custom',$quantity_custom);
			$this->rpc_service_portal->addField('uom_id',$uom_id);
			$this->rpc_service_portal->addField('conversion',$conversion);
			$this->rpc_service_portal->addField('unit_price',$unit_price);
			$this->rpc_service_portal->addField('merk',$merk);
			$this->rpc_service_portal->addField('tipe',$tipe);
			$this->rpc_service_portal->addField('ukuran',$ukuran);
			$this->rpc_service_portal->addField('volume',$volume);
			$this->rpc_service_portal->addField('spesifikasi_lain',$spesifikasi_lain);
			$this->rpc_service_portal->addField('bruto',$bruto);
			$this->rpc_service_portal->addField('netto',$netto);
			$this->rpc_service_portal->addField('quantity_package',$quantity_package);
			$this->rpc_service_portal->addField('package_id',$package_id);
			$this->rpc_service_portal->addField('origin_country_id',$origin_country_id);
			$this->rpc_service_portal->addField('fasilitas_id',$fasilitas_id);
			$this->rpc_service_portal->addField('skema_tarif_id',$skema_tarif_id);
			$this->rpc_service_portal->addField('bm_jenis_tarif_id',$bm_jenis_tarif_id);
			$this->rpc_service_portal->addField('bm_tarif',$bm_tarif);
			$this->rpc_service_portal->addField('bm_uom_id',$bm_uom_id);
			$this->rpc_service_portal->addField('cukai_jenis_tarif_id',$cukai_jenis_tarif_id);
			$this->rpc_service_portal->addField('cukai_tarif',$cukai_tarif);
			$this->rpc_service_portal->addField('cukai_uom_id',$cukai_uom_id);
			$this->rpc_service_portal->addField('ppn_tarif',$ppn_tarif);
			$this->rpc_service_portal->addField('pph_tarif',$pph_tarif);
			$this->rpc_service_portal->addField('ppnbm_tarif',$ppnbm_tarif);
			$this->rpc_service_portal->addField('note',$note);
			$this->rpc_service_portal->addField('subcon_price',$subcon_price);
			
			$this->rpc_service_portal->addField('isi_perkemasan',$isi_perkemasan);
			$this->rpc_service_portal->addField('kode_asal_barang',$kode_asal_barang);
			$this->rpc_service_portal->addField('kode_asal_bahan_baku',$kode_asal_bahan_baku);
			$this->rpc_service_portal->addField('daerah_kode',$daerah_kode);
			$this->rpc_service_portal->addField('kode_perhitungan',$kode_perhitungan);
			$this->rpc_service_portal->addField('kode_guna_barang',$kode_guna_barang);
			$this->rpc_service_portal->addField('kode_kondisi_barang',$kode_kondisi_barang);
			$this->rpc_service_portal->addField('uang_muka',$uang_muka);
			$this->rpc_service_portal->addField('nilai_devisa',$nilai_devisa);
			$this->rpc_service_portal->addField('pernyataan_lartas',$pernyataan_lartas);
			$this->rpc_service_portal->addField('seri_jin',$seri_jin);
			$this->rpc_service_portal->addField('asuransi',$asuransi);
			$this->rpc_service_portal->addField('harga_perolehan',$harga_perolehan);
			$this->rpc_service_portal->addField('fob',$fob);
			$this->rpc_service_portal->addField('kode_kondisi_barang',$kode_kondisi_barang);
			
			$result = $this->rpc_service_portal->resultJSON();
			
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
		$pl = isset($_REQUEST['pl']) ? $_REQUEST['pl'] : 0;
		$id_dokumen = isset($_POST['id_dokumen']) ? $_POST['id_dokumen'] : false;
		$bc_out_header_id = isset($_POST['bc_out_header_id']) ? $_POST['bc_out_header_id'] : 0;
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
				$this->rpc_service_portal->setSP("dbo.sp_ceisa_custom_document_edit");
				$this->rpc_service_portal->addField('id_dokumen',$id_dokumen);
			} else {
				$this->rpc_service_portal->setSP("dbo.sp_ceisa_custom_document_add");
				$this->rpc_service_portal->addField('pl',$pl);
			}
			
			$this->rpc_service_portal->addField('bc_out_header_id',$bc_out_header_id);
			$this->rpc_service_portal->addField('seri_dokumen',$seri_dokumen);
			$this->rpc_service_portal->addField('kode_dokumen',$kode_dokumen);
			$this->rpc_service_portal->addField('kode_fasilitas',$kode_fasilitas);
			$this->rpc_service_portal->addField('nomor_dokumen',$nomor_dokumen);
			$this->rpc_service_portal->addField('tanggal_dokumen',$tanggal_dokumen);
			$this->rpc_service_portal->addField('memo',$memo);
			$this->rpc_service_portal->addField('uraian_dokumen',$uraian_dokumen);
			$this->rpc_service_portal->addField('uraian_fasilitas',$uraian_fasilitas);
			$this->rpc_service_portal->addField('custom_type_id',$custom_type_id);

			$result = $this->rpc_service_portal->resultJSON();
			
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
				$this->rpc_service_portal->setSP("dbo.sp_ceisa_custom_kemasan_edit");
				$this->rpc_service_portal->addField('id_kemasan',$id_kemasan);
			} else {
				$this->rpc_service_portal->setSP("dbo.sp_ceisa_custom_kemasan_add");
			}
			
			$this->rpc_service_portal->addField('id_kemasan',$id_kemasan);
			$this->rpc_service_portal->addField('bc_out_header_id',$bc_out_header_id);
			$this->rpc_service_portal->addField('seri_kemasan',$seri_kemasan);
			$this->rpc_service_portal->addField('jumlah_kemasan',$jumlah_kemasan);
			$this->rpc_service_portal->addField('kode_jeniskemasan',$kode_jeniskemasan);
			$this->rpc_service_portal->addField('merk_kemasan',$merk_kemasan);
			$this->rpc_service_portal->addField('custom_type_id',$custom_type_id);
			$this->rpc_service_portal->addField('memo',$memo);

			$result = $this->rpc_service_portal->resultJSON();
			
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
		$bc_out_header_id = isset($_POST['bc_out_header_id']) ? $_POST['bc_out_header_id'] : 0;
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
				$this->rpc_service_portal->setSP("dbo.sp_ceisa_custom_export_jaminan_edit");
				$this->rpc_service_portal->addField('idJaminan',$idJaminan);
			} else {
				$this->rpc_service_portal->setSP("dbo.sp_ceisa_custom_export_jaminan_add");
			}
			
			$this->rpc_service_portal->addField('idJaminan',$idJaminan);
			$this->rpc_service_portal->addField('bc_out_header_id',$bc_out_header_id);
			$this->rpc_service_portal->addField('custom_type_id',$custom_type_id);
			$this->rpc_service_portal->addField('seriDokumen_jaminan',$seriDokumen_jaminan);
			$this->rpc_service_portal->addField('nomorBpj',$nomorBpj);
			$this->rpc_service_portal->addField('tanggalBpj',$tanggalBpj);
			$this->rpc_service_portal->addField('kodeJenisJaminan',$kodeJenisJaminan);
			$this->rpc_service_portal->addField('nomorJaminan',$nomorJaminan);
			$this->rpc_service_portal->addField('tanggalJaminan',$tanggalJaminan);
			$this->rpc_service_portal->addField('tanggalJatuhTempo',$tanggalJatuhTempo);
			$this->rpc_service_portal->addField('penjamin',$penjamin);
			$this->rpc_service_portal->addField('nilaiJaminan',$nilaiJaminan);
			$this->rpc_service_portal->addField('keterangan',$keterangan);

			$result = $this->rpc_service_portal->resultJSON();
			
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
		$bc_out_header_id = isset($_POST['bc_out_header_id']) ? $_POST['bc_out_header_id'] : 0;
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
				$this->rpc_service_portal->setSP("dbo.sp_ceisa_custom_kontainer_edit");
				$this->rpc_service_portal->addField('id_kontainer',$id_kontainer);
			} else {
				$this->rpc_service_portal->setSP("dbo.sp_ceisa_custom_kontainer_add");
			}
			
			$this->rpc_service_portal->addField('bc_out_header_id',$bc_out_header_id);
			$this->rpc_service_portal->addField('kode_jenis_kontainer',$kode_jenis_kontainer);
			$this->rpc_service_portal->addField('kode_tipe_kontainer',$kode_tipe_kontainer);
			$this->rpc_service_portal->addField('kode_ukuran_kontainer',$kode_ukuran_kontainer);
			$this->rpc_service_portal->addField('nomor_kontainer',$nomor_kontainer);
			$this->rpc_service_portal->addField('seri_kontainer',$seri_kontainer);
			$this->rpc_service_portal->addField('custom_type_id',$custom_type_id);
			$this->rpc_service_portal->addField('memo',$memo);

			$result = $this->rpc_service_portal->resultJSON();
			
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
	
	function post_add_edit_pkb(){
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
		
		$pkb_id = isset($_POST['pkb_id']) ? $_POST['pkb_id'] : false;
		$bc_out_header_id = isset($_POST['bc_out_header_id']) ? $_POST['bc_out_header_id'] : 0;
		$jenis_barang_id = isset($_POST['jenis_barang_id']) ? $_POST['jenis_barang_id'] : '';
		$jenis_gudang_id = isset($_POST['jenis_gudang_id']) ? $_POST['jenis_gudang_id'] : '';
		$nama_pic = isset($_POST['nama_pic']) ? $_POST['nama_pic'] : '';
		$alamat = isset($_POST['alamat']) ? $_POST['alamat'] : '';
		$nomor_tlp_pic = isset($_POST['nomor_tlp_pic']) ? $_POST['nomor_tlp_pic'] : '';
		$lokasi_siap_periksa = isset($_POST['lokasi_siap_periksa']) ? $_POST['lokasi_siap_periksa'] : '';
		$cara_stuffing_id = isset($_POST['cara_stuffing_id']) ? $_POST['cara_stuffing_id'] : '';
		$jenis_partof_id = isset($_POST['jenis_partof_id']) ? $_POST['jenis_partof_id'] : '';
		$tanggal_pkb = isset($_POST['tanggal_pkb']) ? $_POST['tanggal_pkb'] : '';
		$waktu_siap_periksa = isset($_POST['waktu_siap_periksa']) ? $_POST['waktu_siap_periksa'] : '';
		$jumlah_kontainer_20 = isset($_POST['jumlah_kontainer_20']) ? $_POST['jumlah_kontainer_20'] : '';
		$jumlah_kontainer_40 = isset($_POST['jumlah_kontainer_40']) ? $_POST['jumlah_kontainer_40'] : '';
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			if($pkb_id){
				$this->rpc_service_portal->setSP("dbo.sp_ceisa_custom_pkb_edit");
				$this->rpc_service_portal->addField('pkb_id',$pkb_id);
			} else {
				$this->rpc_service_portal->setSP("dbo.sp_ceisa_custom_pkb_add");
			}
			
			$this->rpc_service_portal->addField('pkb_id',$pkb_id);
			$this->rpc_service_portal->addField('bc_out_header_id',$bc_out_header_id);
			$this->rpc_service_portal->addField('jenis_barang_id',$jenis_barang_id);
			$this->rpc_service_portal->addField('jenis_gudang_id',$jenis_gudang_id);
			$this->rpc_service_portal->addField('nama_pic',$nama_pic);
			$this->rpc_service_portal->addField('alamat',$alamat);
			$this->rpc_service_portal->addField('nomor_tlp_pic',$nomor_tlp_pic);
			$this->rpc_service_portal->addField('lokasi_siap_periksa',$lokasi_siap_periksa);
			$this->rpc_service_portal->addField('cara_stuffing_id',$cara_stuffing_id);
			$this->rpc_service_portal->addField('jenis_partof_id',$jenis_partof_id);
			$this->rpc_service_portal->addField('tanggal_pkb',$tanggal_pkb);
			$this->rpc_service_portal->addField('waktu_siap_periksa',$waktu_siap_periksa);
			$this->rpc_service_portal->addField('jumlah_kontainer_20',$jumlah_kontainer_20);
			$this->rpc_service_portal->addField('jumlah_kontainer_40',$jumlah_kontainer_40);

			$result = $this->rpc_service_portal->resultJSON();
			
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
				
		$bc_out_barang_id = isset($_POST['bc_out_barang_id']) ? $_POST['bc_out_barang_id'] : false;
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			
			if($bc_out_barang_id){
				$this->rpc_service_portal->setSP("dbo.sp_custom_export_detail_delete");
				$this->rpc_service_portal->addField('bc_out_barang_id',$bc_out_barang_id);
			}
					
			$result = $this->rpc_service_portal->resultJSON();
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
				$this->rpc_service_portal->setSP("dbo.sp_custom_ceisa_document_delete");
				$this->rpc_service_portal->addField('id_dokumen',$id_dokumen);
			}
					
			$result = $this->rpc_service_portal->resultJSON();
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
				$this->rpc_service_portal->setSP("dbo.sp_ceisa_custom_export_jaminan_delete");
				$this->rpc_service_portal->addField('idJaminan',$idJaminan);
			}
					
			$result = $this->rpc_service_portal->resultJSON();
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
				$this->rpc_service_portal->setSP("dbo.sp_custom_ceisa_kontainer_delete");
				$this->rpc_service_portal->addField('id_kontainer',$id_kontainer);
			}
					
			$result = $this->rpc_service_portal->resultJSON();
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
	
	function delete_pkb(){
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
				
		$pkb_id = isset($_POST['pkb_id']) ? $_POST['pkb_id'] : false;
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			
			if($pkb_id){
				$this->rpc_service_portal->setSP("dbo.sp_ceisa_custom_pkb_delete");
				$this->rpc_service_portal->addField('pkb_id',$pkb_id);
			}
					
			$result = $this->rpc_service_portal->resultJSON();
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
		
		$view = 'view_sales_performa_custom';
		$field = $this->custom_export_detail_table();
		
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
	
	function loaddata_contract_subcon(){
		$this->authentication->plainlayout();
		
		$partner_id = isset($_POST['partner_id']) ? is_numeric($_POST['partner_id']) ?  $_POST['partner_id'] : -1 : -1;
		$currencies_id = isset($_POST['currencies_id']) ? is_numeric($_POST['currencies_id']) ?  $_POST['currencies_id'] : -1 : -1;
		
		$view = 'view_subcon_out_custom_cmt';
		$field = $this->custom_export_detail_table();
		
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
		
		$bc_out_header_id = isset($_REQUEST['bc_out_header_id']) ? is_numeric($_REQUEST['bc_out_header_id']) ? $_REQUEST['bc_out_header_id']  : -1 : -1;
		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;
		
		$view = 'view_custom_ceisa_document';
		$field = $this->custom_export_document_table();
		
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";
		
		$extra_param = array();
		$extra_param['where']['0']['field'] = 'r2';
		$extra_param['where']['0']['data'] = $bc_out_header_id;
		$extra_param['methodid'] = $methodid;
		
		$loaddata = $this->ecc_library->get_field_data($view,$field,$extra_param);
			
		echo $loaddata;
	}
	
	function loaddata_packaging(){
		$this->authentication->plainlayout();
		
		$bc_out_header_id = isset($_REQUEST['bc_out_header_id']) ? is_numeric($_REQUEST['bc_out_header_id']) ? $_REQUEST['bc_out_header_id']  : -1 : -1;
		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;
		
		$view = 'view_custom_ceisa_kemasan';
		$field = $this->custom_export_packaging_table();
		
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";
		
		$extra_param = array();
		$extra_param['where']['0']['field'] = 'r2';
		$extra_param['where']['0']['data'] = $bc_out_header_id;
		$extra_param['methodid'] = $methodid;
		
		$loaddata = $this->ecc_library->get_field_data($view,$field,$extra_param);
			
		echo $loaddata;
	}
	
	function loaddata_container(){
		$this->authentication->plainlayout();
		
		$bc_out_header_id = isset($_REQUEST['bc_out_header_id']) ? is_numeric($_REQUEST['bc_out_header_id']) ? $_REQUEST['bc_out_header_id']  : -1 : -1;
		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;
		
		$view = 'view_custom_ceisa_kontainer';
		$field = $this->custom_export_container_table();
		
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";
		
		$extra_param = array();
		$extra_param['where']['0']['field'] = 'r2';
		$extra_param['where']['0']['data'] = $bc_out_header_id;
		$extra_param['methodid'] = $methodid;
		
		$loaddata = $this->ecc_library->get_field_data($view,$field,$extra_param);
			
		echo $loaddata;
	}
	
	function loaddata_pkb(){
		$this->authentication->plainlayout();
		
		$bc_out_header_id = isset($_REQUEST['bc_out_header_id']) ? is_numeric($_REQUEST['bc_out_header_id']) ? $_REQUEST['bc_out_header_id']  : -1 : -1;
		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;
		
		$view = 'view_ceisa_pkb';
		$field = $this->custom_export_pkb_table();
		
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";
		
		$extra_param = array();
		$extra_param['where']['0']['field'] = 'r2';
		$extra_param['where']['0']['data'] = $bc_out_header_id;
		$extra_param['methodid'] = $methodid;
		
		$loaddata = $this->ecc_library->get_field_data($view,$field,$extra_param);
			
		echo $loaddata;
	}
	
		
	function loaddata_respon(){
		$this->authentication->plainlayout();
		
		$bc_out_header_id = isset($_REQUEST['bc_out_header_id']) ? is_numeric($_REQUEST['bc_out_header_id']) ? $_REQUEST['bc_out_header_id']  : -1 : -1;
		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;
		
		$view = 'view_ceisa_respon_data';
		$field = $this->custom_export_respon_table();
		
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";
		
		$extra_param = array();
		$extra_param['where']['0']['field'] = 'r2';
		$extra_param['where']['0']['data'] = $bc_out_header_id;
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
				$this->rpc_service_portal->setSP(array("sp"=> $sp,"mode"=>"1","debug"=>"1"));
			}
			

			$this->rpc_service_portal->addField('tpb_header_id',$tpb_header_id);
			$this->rpc_service_portal->addField('custom_type_id',$custom_type_id);
				
			$result = $this->rpc_service_portal->resultJSON();
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
				$this->rpc_service_portal->setSP(array("sp"=> $sp,"mode"=>"1","debug"=>"1"));
			}
			

			$this->rpc_service_portal->addField('tpb_header_id',$tpb_header_id);
			$this->rpc_service_portal->addField('custom_type_id',$custom_type_id);
				
			$result = $this->rpc_service_portal->resultJSON();
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
				$this->rpc_service_portal->setSP(array("sp"=> $sp,"mode"=>"1","debug"=>"1"));
			}
			

			$this->rpc_service_portal->addField('tpb_header_id',$tpb_header_id);
			$this->rpc_service_portal->addField('custom_type_id',$custom_type_id);
				
			$result = $this->rpc_service_portal->resultJSON();
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
		
		$bc_out_header_id = isset($_REQUEST['bc_out_header_id']) ? is_numeric($_REQUEST['bc_out_header_id']) ? $_REQUEST['bc_out_header_id']  : -1 : -1;
		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;
		
		$view = 'view_custom_export_detail_supply';
		$field = $this->custom_export_detail_supply_table();
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";
		
		$extra_param = array();
		$extra_param['where']['0']['field'] = 'r2';
		$extra_param['where']['0']['data'] = $bc_out_header_id;
		$extra_param['methodid'] = $methodid;
		
		$loaddata = $this->ecc_library->get_field_data($view,$field,$extra_param);
			
		echo $loaddata;
	}
	
	function loaddata_transfer_item(){
		$this->authentication->plainlayout();
		
		$bc_out_barang_id = isset($_REQUEST['bc_out_barang_id']) ? is_numeric($_REQUEST['bc_out_barang_id']) ? $_REQUEST['bc_out_barang_id']  : -1 : -1;
		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;
		
		$view = 'view_stock_move_item_bc_out';
		$field = $this->custom_export_transfer_item_table();
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";
		
		$extra_param = array();
		$extra_param['where']['0']['field'] = 'r2';
		$extra_param['where']['0']['data'] = $bc_out_barang_id;
		$extra_param['methodid'] = $methodid;
		
		$loaddata = $this->ecc_library->get_field_data($view,$field,$extra_param);
			
		echo $loaddata;
	}
	
	function loaddata_supply_item(){
		$this->authentication->plainlayout();
		
		$bc_out_barang_supply_id = isset($_REQUEST['bc_out_barang_supply_id']) ? is_numeric($_REQUEST['bc_out_barang_supply_id']) ? $_REQUEST['bc_out_barang_supply_id']  : -1 : -1;
		$bc_out_barang_id = isset($_REQUEST['bc_out_barang_id']) ? is_numeric($_REQUEST['bc_out_barang_id']) ? $_REQUEST['bc_out_barang_id']  : -1 : -1;
		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;
		
		$view = 'view_stock_move_supply_bc_out';
		$field = $this->custom_export_supply_item_table();
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";
		
		$extra_param = array();
		$extra_param['where']['0']['field'] = 'r2';
		$extra_param['where']['0']['data'] = $bc_out_barang_id;
		$extra_param['methodid'] = $methodid;
		
		$loaddata = $this->ecc_library->get_field_data($view,$field,$extra_param);
			
		echo $loaddata;
	}
	
	function post_add_edit_supply(){
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
		
		$stock_move_id = isset($_POST['stock_move_id']) ? $_POST['stock_move_id'] : false;
		$bc_out_barang_id = isset($_POST['bc_out_barang_id']) ? $_POST['bc_out_barang_id'] : 0;
		$bc_out_barang_supply_id = isset($_POST['bc_out_barang_supply_id']) ? $_POST['bc_out_barang_supply_id'] : '';
		$quantity_supply = isset($_POST['quantity_supply']) ? $_POST['quantity_supply'] : 0;
		$bc_out_header_id = isset($_POST['bc_out_header_id']) ? $_POST['bc_out_header_id'] : 0;
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			if($bc_out_barang_supply_id){
				$this->rpc_service->setSP("dbo.sp_custom_export_supply_edit");
				$this->rpc_service->addField('bc_out_barang_supply_id',$bc_out_barang_supply_id);
			} else {
				$this->rpc_service->setSP("dbo.sp_custom_export_supply_add");
			}
			
			$this->rpc_service->addField('bc_out_header_id',$bc_out_header_id);
			$this->rpc_service->addField('bc_out_barang_id',$bc_out_barang_id);
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
				
		$bc_out_header_id = isset($_POST['bc_out_header_id']) ? $_POST['bc_out_header_id'] : false;
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			
			if($bc_out_header_id){
				$this->rpc_service->setSP("dbo.sp_custom_export_supply_fifo");
				//$this->rpc_service->setSP("dbo.sp_custom_export_supply_fifo_ceisa40");
				$this->rpc_service->addField('bc_out_header_id',$bc_out_header_id);
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
				
		$bc_out_header_id = isset($_POST['bc_out_header_id']) ? $_POST['bc_out_header_id'] : false;
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			
			if($bc_out_header_id){
				$this->rpc_service->setSP("dbo.sp_custom_export_supply_lifo");
				$this->rpc_service->addField('bc_out_header_id',$bc_out_header_id);
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
	
	
	function inc_noAju(){
		$kodeDokumen = isset($_POST['custom_type_id'])?$_POST['custom_type_id']:'0';
		echo json_encode(array('incre' =>  $this->inc_noAju_trx($kodeDokumen)));
	}
	

	public function inc_noAju_trx($id_tipe){
		
		if($id_tipe == 8){
			$ket = '000261';
		} else 	if($id_tipe == 6){
			$ket = '000024';
		} else 	if($id_tipe == 7){
			$ket = '000025';
		} else 	if($id_tipe == 9){
			$ket = '000027';
		} else 	if($id_tipe == 10){
			$ket = '000030';
		} else 	if($id_tipe == 11){
			$ket = '000033';
		} else 	if($id_tipe == 12){
			$ket = '000041';
		} else 	if($id_tipe == 13){
			$ket = '000013';
		}else {
			$ket = '000000';
		}
		
		$kodekpbc = '313580';
		
			
		$q = $this->db->query("

			select car as carlast , substring(car, 8,6) from dbo.dt_bc_out_header
			where  substring (car,1,6) = '$kodekpbc'
			and  substring(car, 8,6)  = '$ket';	
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
	
	
	function get_kurs(){	
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
		$bc_out_header_id =  (isset($_POST['bc_out_header_id']) && !empty($_POST['bc_out_header_id']))?$_POST['bc_out_header_id']:die('{"status":"ERROR","message":" Param Header ID Tidak Ditemukan"}');
		$custom_type_id =  (isset($_POST['custom_type_id']) && !empty($_POST['custom_type_id']))?$_POST['custom_type_id']:"";
		$noDaftar = (isset($_POST['bc_no']) && !empty($_POST['bc_no']))?$_POST['bc_no']:"";
		$isFinal = (isset($_POST['isFinal']) && !empty($_POST['isFinal']))?$_POST['isFinal']:"";
		$id_respon = (isset($_POST['id_respon']) && !empty($_POST['id_respon']))?$_POST['id_respon']:"";
		
		if($id_respon == -1){
			
			echo json_encode(array('sts' => '00', 'status'=>'02' ,'message' =>'Maaf Data Sudah di Sending!' ));		
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
			 SELECT "bc_out_header_id"
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
				  ,COALESCE("kodeAsuransi",'. "'DN'" .') as "kodeAsuransi"
				  ,COALESCE("kodeCaraBayar",'. "''" .') as "kodeCaraBayar"
				  ,COALESCE("kodeCaraDagang",'. "''" .') as "kodeCaraDagang"
				  ,"kodeDokumen"
				  ,COALESCE("kodeIncoterm",'. "''" .') as "kodeIncoterm"
				  ,COALESCE("kodeJenisEkspor",'. "''" .') as "kodeJenisEkspor"
				  ,"kodeJenisNilai"
				  ,"kodeJenisProsedur"
				  ,"kodeJenisTpb"
				  ,COALESCE("kodeKantor",'. "''" .') as "kodeKantor"
				  ,COALESCE("kodeKantorEkspor",'. "''" .') as "kodeKantorEkspor"
				  ,"kodeKantorMuat"
				  ,COALESCE("kodeKantorPeriksa",'. "''" .') AS "kodeKantorPeriksa"
				  ,COALESCE("kodeKategoriEkspor",'. "''" .') AS "kodeKategoriEkspor"
				  ,"kodeKantorTujuan"
				  ,COALESCE("kodeLokasi",'. "'2'" .') AS "kodeLokasi"
				  ,"kodeLokasiBayar"
				  ,"kodeNegaraTujuan"
				  ,"kodePelBongkar"
				  ,"kodePelEkspor"
				  ,"kodePelMuat"
				  ,"kodePelTujuan"
				  ,COALESCE("kodePembayar",'. "''" .') AS "kodePembayar"
				  ,"kodeTps"
				  ,"kodeTujuanPengiriman" 
				  ,"kodeTujuanTpb" 
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
				  ,coalesce("tanggalEkspor",'. "'$tgl'" .') as "tanggalEkspor"
				  ,"tanggalPeriksa"
				  ,"tanggalTtd"
				  ,"tempatStuffing"
				  ,"totalDanaSawit"
				  ,"uangMuka"
				  ,'. "'Lilies'" .' AS "userPortal"
				  ,"vd"
				  ,"volume"
				  , 2 as "kodeKomuditiCukai"
				  
			FROM dbo.view_custom_export_ceisa40 where "bc_out_header_id" = ' . $bc_out_header_id . '

			');
			
			$arr = array();
			$arb = array();
			$arbd = array();
			$art = array();
			$arbp = array();
			$arbahanbaku = array();
			$arbahanbaku_tr = array();
			$ar_jaminan = array();
			$ar_pungutan = array();
			$ar_entitas = array();
			$ar_kemasan = array();
			$ar_kontainer = array();
			$ar_dokumen = array();
			$ar_pengangkut = array();
			$ar_bank = array();
			$ar_kesiapanBarang = array();
			$i=0;
			
			//var_dump($q->result());
			//die();
			
			foreach($q->result() as $row) {
				$arr[$i]['asalData']=$row->asalData;
				$arr[$i]['asuransi']=(float)$row->asuransi;
				$arr[$i]['biayaTambahan']=(float)$row->biayaTambahan;
				$arr[$i]['biayaPengurang']=(float)$row->biayaPengurang;
				$arr[$i]['bruto']=(float)$row->bruto;
				$arr[$i]['cif']=(float)$row->cif;
				$arr[$i]['disclaimer']=$row->disclaimer;
				$arr[$i]['flagCurah']=$row->flagCurah;
				$arr[$i]['flagMigas']=$row->flagMigas;
				$arr[$i]['fob']=(float)$row->fob;
				$arr[$i]['freight']=(float)$row->freight;
				$arr[$i]['hargaPenyerahan']=(float)$row->hargaPenyerahan;
				$arr[$i]['idPengguna']=$row->idPengguna;
				$arr[$i]['jabatanTtd']=$row->jabatanTtd;
				$arr[$i]['jumlahKontainer']=intval($row->jumlahKontainer);
				$arr[$i]['kodeAsuransi']=$row->kodeAsuransi;
				$arr[$i]['kodeCaraBayar']=$row->kodeCaraBayar;
				$arr[$i]['kodeCaraDagang']=$row->kodeCaraDagang;
				$arr[$i]['kodeDokumen']=$row->kodeDokumen;
				$arr[$i]['kodeIncoterm']=$row->kodeIncoterm;
				$arr[$i]['kodeKomoditi']=$row->kodeKomuditiCukai;
				$arr[$i]['kodeJenisEkspor']=$row->kodeJenisEkspor;
				$arr[$i]['kodeJenisNilai']=$row->kodeJenisNilai;
				$arr[$i]['kodeJenisProsedur']=$row->kodeJenisProsedur;
				$arr[$i]['kodeJenisTpb']=$row->kodeJenisTpb;
				$arr[$i]['kodeKantor']=$row->kodeKantor;
				$arr[$i]['kodeKantorEkspor']=$row->kodeKantorEkspor;
				$arr[$i]['kodeKantorMuat']=$row->kodeKantorMuat;
				$arr[$i]['kodeKantorPeriksa']=$row->kodeKantorPeriksa;
				$arr[$i]['kodeKategoriEkspor']=$row->kodeKategoriEkspor;
				$arr[$i]['kodeKantorTujuan']=$row->kodeKantorEkspor;
				$arr[$i]['kodeLokasi']=$row->kodeLokasi;
				$arr[$i]['kodeLokasiBayar']=$row->kodeLokasiBayar;
				$arr[$i]['kodeNegaraTujuan']=$row->kodeNegaraTujuan;
				$arr[$i]['kodePelBongkar']=$row->kodePelBongkar;
				$arr[$i]['kodePelEkspor']=$row->kodePelEkspor;
				$arr[$i]['kodePelMuat']=$row->kodePelMuat;
				$arr[$i]['kodePelTujuan']=$row->kodePelTujuan;
				$arr[$i]['kodePembayar']=$row->kodePembayar;
				$arr[$i]['kodeTps']=$row->kodeTps;
				$arr[$i]['kodeTujuanPengiriman']=$row->kodeTujuanPengiriman;
				$arr[$i]['kodeTujuanTpb']=$row->kodeTujuanTpb;
				$arr[$i]['kodeValuta']=$row->kodeValuta;
				$arr[$i]['kotaTtd']=$row->kotaTtd;
				$arr[$i]['namaTtd']=$row->namaTtd;
				$arr[$i]['ndpbm']=(float)$row->ndpbm;
				$arr[$i]['nilaiBarang']=(float)$row->nilaiBarang;
				$arr[$i]['nilaiJasa']=(float)$row->nilaiJasa;
				$arr[$i]['netto']=(float)$row->netto;
				$arr[$i]['nik']=$row->nik;
				$arr[$i]['nilaiMaklon']=(float)$row->nilaiMaklon;
				$arr[$i]['nomorAju']=str_replace('-','',$row->nomorAju);
				$arr[$i]['nomorBc11']=$row->nomorBc11;
				$arr[$i]['posBc11']=$row->posBc11;
				$arr[$i]['seri']=intval($row->seri);
				$arr[$i]['subposBc11']=$row->subposBc11;
				$arr[$i]['tanggalAju']=$row->tanggalAju;
				$arr[$i]['tglAkhirBerlaku']=$row->tglAkhirBerlaku;
				$arr[$i]['tglAwalBerlaku']=$row->tglAwalBerlaku;
				$arr[$i]['tanggalBc11']=$row->tanggalBc11;
				$arr[$i]['tanggalEkspor']=$row->tanggalEkspor;
				$arr[$i]['tanggalPeriksa']=$row->tanggalPeriksa;
				$arr[$i]['tanggalTtd']=$row->tanggalTtd;
				$arr[$i]['tempatStuffing']=(float)$row->tempatStuffing;
				$arr[$i]['totalDanaSawit']=(float)$row->totalDanaSawit;
				$arr[$i]['uangMuka']=(float)$row->uangMuka;
				$arr[$i]['userPortal']=$row->userPortal;
				$arr[$i]['vd']=$row->vd;
				$arr[$i]['volume']=(float)$row->volume;
				
					$qb = $this->db->query('
					SELECT 
					  "idBarang"
					  ,"bc_out_header_id"
					  ,"cif"
					  ,"cifRupiah"
					  ,"diskon"
					  ,"freight"
					  ,"fob"
					  ,"hargaEkspor"
					  ,"hargaPatokan"
					  ,"hargaPenyerahan"
					  ,"hargaPerolehan"
					  ,cast("hargaSatuan" as decimal(18,2)) as "hargaSatuan"
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
					  ,COALESCE("kodeJenisKemasan",'. "'PK'" .') "kodeJenisKemasan"
					  ,"kodeKategoriBarang"
					  ,"kodeKondisiBarang"
					  ,COALESCE("kodeNegaraAsal",'. "'ID'" .') "kodeNegaraAsal"
					  ,"kodePerhitungan"
					  ,"kodeSatuanBarang"
					  ,COALESCE("merk",'. "''" .') "merk"
					  ,"ndpbm"
					  ,"netto"
					  ,cast("nilaiBarang" as decimal(18,2)) as "nilaiBarang"
					  ,"nilaiDanaSawit"
					  ,"nilaiJasa"
					  ,COALESCE("posTarif",'. "''" .') "posTarif"
					  ,ROW_NUMBER ( ) OVER ( PARTITION BY bc_out_header_id ORDER BY bc_out_header_id ) AS "seriBarang"
					  ,COALESCE("spesifikasiLain",'. "''" .') "spesifikasiLain"
					  ,COALESCE("tipe",'. "''" .') "tipe"
					  ,COALESCE("ukuran",'. "''" .') "ukuran"
					  ,"uangMuka"
					  ,"uraian"
					  ,"volume"
				  FROM dbo.view_custom_export_barang_ceisa40 where "bc_out_header_id" = ' . $bc_out_header_id . '
					 order by "idBarang"
					 
					');
					
					$b=0;
					foreach($qb->result() as $rb){
						$arb[$b]['cif']=(float)$rb->cif;
						$arb[$b]['cifRupiah']=(float)$rb->cifRupiah;
						$arb[$b]['diskon']=(float)$rb->diskon;
						$arb[$b]['freight']=(float)$rb->freight;
						$arb[$b]['fob']=(float)$rb->fob;
						$arb[$b]['hargaEkspor']=(float)$rb->hargaEkspor;
						$arb[$b]['hargaPatokan']=(float)$rb->hargaPatokan;
						$arb[$b]['hargaPerolehan']=(float)$rb->hargaPerolehan;
						$arb[$b]['hargaPenyerahan']=(float)$rb->hargaPenyerahan;
						$arb[$b]['hargaSatuan']=(float)$rb->hargaSatuan;
						$arb[$b]['isiPerKemasan']=intval($rb->isiPerKemasan);
						$arb[$b]['jumlahKemasan']=intval($rb->jumlahKemasan);
						$arb[$b]['jumlahSatuan']=(float)$rb->jumlahSatuan;
						$arb[$b]['kodeAsalBahanBaku']=$rb->kodeAsalBahanBaku;
						$arb[$b]['kodeAsalBarang']=$rb->kodeAsalBarang;
						$arb[$b]['kodeBarang']=$rb->kodeBarang;
						$arb[$b]['kodeDaerahAsal']=$rb->kodeDaerahAsal;
						$arb[$b]['kodeDokumen']=$rb->kodeDokumen;
						$arb[$b]['kodeDokAsal']=$rb->kodeDokAsal;
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
						$arb[$b]['nilaiBarang']=(float)$rb->nilaiBarang;
						$arb[$b]['nilaiJasa']=(float)$rb->nilaiJasa;
						$arb[$b]['nilaiDanaSawit']=(float)$rb->nilaiDanaSawit;
						$arb[$b]['posTarif']=$rb->posTarif;
					if($custom_type_id == '9'){
						$arb[$b]['seriBarang']=$rb->seriBarang;
					} else{
						$arb[$b]['seriBarang']=intval($rb->seriBarang);
					};
						$arb[$b]['spesifikasiLain']=$rb->spesifikasiLain;
						$arb[$b]['tipe']=$rb->tipe;
						$arb[$b]['uangMuka']=$rb->uangMuka;
						$arb[$b]['ukuran']=$rb->ukuran;
						$arb[$b]['uraian']=$rb->uraian;
						$arb[$b]['volume']=(float)$rb->volume;
					
					$arbp = array();
					$idBarang = $rb->idBarang;
					$qbp = $this->db->query('

						SELECT "idBarang"
						  ,"bc_out_header_id"
						  ,"seriBarang"
						  ,"seriBarang" AS "seriBarangPemilik"
						  ,1 as "seriEntitas"
						 FROM dbo.view_custom_export_barang_ceisa40 where "bc_out_header_id" = ' . $bc_out_header_id . ' and "idBarang" = ' . $idBarang . '

					');

					$bp=0;
					foreach($qbp->result() as $rbp){
						$arbp[$bp]['seriBarang']=$rbp->seriBarang;
						$arbp[$bp]['seriBarangPemilik']=$rbp->seriBarangPemilik;
						$arbp[$bp]['seriEntitas']=$rbp->seriEntitas;

					$bp++;
					}
					
					$art = array();
					$idBarang = $rb->idBarang;
					$qt = $this->db->query('

						SELECT bc_out_header_id
						  ,"idBarang"
						  ,"kodeJenisTarif"
						  ,"jumlahSatuan"
						  ,"kodeFasilitasTarif"
						  ,"kodeSatuanBarang"
						  ,"kodeJenisPungutan"
						  ,"nilaiBayar"
						  ,"nilaiFasilitas"
						  ,"nilaiSudahDilunasi"
						  ,"seriBarang"
						  ,tarif
						  ,"tarifFasilitas"
						  FROM dbo."view_custom_barangTarif_ceisa40"
						WHERE bc_out_header_id = ' . $bc_out_header_id . ' and "idBarang" = ' . $idBarang . '

					');

					$t=0;

					foreach($qt->result() as $rt){
						$art[$t]['jumlahSatuan']=intval($rt->jumlahSatuan);
						$art[$t]['kodeFasilitasTarif']=$rt->kodeFasilitasTarif;
						$art[$t]['kodeJenisPungutan']=$rt->kodeJenisPungutan;
						$art[$t]['kodeJenisTarif']=$rt->kodeJenisTarif;
						$art[$t]['kodeSatuanBarang']=$rt->kodeSatuanBarang;
						$art[$t]['nilaiBayar']=(float)$rt->nilaiFasilitas;
						$art[$t]['nilaiFasilitas']=(float)$rt->nilaiFasilitas;
						$art[$t]['nilaiSudahDilunasi']=(float)$rt->nilaiSudahDilunasi;
						$art[$t]['seriBarang']=intval($rt->seriBarang);
						$art[$t]['tarif']=(float)$rt->tarif;
						$art[$t]['tarifFasilitas']=(float)$rt->tarifFasilitas;

					$t++;
					}
					
					//===============ex_bc==================
					
					$arbahanbaku = array();
					$idBarang = $rb->idBarang;
					$qbb = $this->db->query('

						SELECT bahanbaku_id
						  ,"idBarang"
						  ,bc_out_header_id
						  ,cif
						  ,cast("cifRupiah" as decimal(18,2)) as "cifRupiah"
						  ,cast("hargaPenyerahan" as decimal(18,2)) as "hargaPenyerahan"
						  ,"hargaPerolehan"
						  ,"jumlahSatuan"
						  ,"kodeAsalBahanBaku"
						  ,coalesce("kodeBarang",'. "''" .') as "kodeBarang"
						  ,"kodeDokAsal"
						  ,"kodeDokumen"
						  ,"kodeKantor"
						  ,coalesce("kodeSatuanBarang",'. "'PCE'" .') as "kodeSatuanBarang"
						  ,"merkBarang"
						  ,ndpbm
						  ,netto
						  ,"nilaiJasa"
						  ,coalesce("nomorAjuDokAsal",'. "''" .') as "nomorAjuDokAsal"
						  ,coalesce("nomorDaftarDokAsal",'. "''" .') as "nomorDaftarDokAsal"
						  ,COALESCE("posTarif",'. "''" .') as "posTarif"
						  ,ROW_NUMBER ( ) OVER ( ORDER BY "idBarang" ) AS "seriBahanBaku"
						  ,"seriBarang"
						  ,"seriBarangDokAsal"
						  ,"seriIjin"
						  ,coalesce("spesifikasiLainBarang",'. "''" .') as "spesifikasiLainBarang"
						  ,coalesce("tanggalDaftarDokAsal", null) as "tanggalDaftarDokAsal"
						  ,"tipeBarang"
						  ,"ukuranBarang"
						  ,coalesce("uraianBarangBb",'. "''" .') as "uraianBarang"
					  FROM dbo.view_ceisa_bahanbaku_asal_r
						where  "jumlahSatuan" > 0 and "bc_out_header_id" = ' . $bc_out_header_id . ' and "idBarang" = ' . $idBarang . '
						order by "idBarang"

					');

					$bb=0;

					foreach($qbb->result() as $rbahanbaku){
						$arbahanbaku[$bb]['cif']=(float)$rbahanbaku->cif;
						$arbahanbaku[$bb]['cifRupiah']=(float)$rbahanbaku->cifRupiah;
						$arbahanbaku[$bb]['hargaPenyerahan']=(float)$rbahanbaku->hargaPenyerahan;
						$arbahanbaku[$bb]['hargaPerolehan']=(float)$rbahanbaku->hargaPerolehan;
						$arbahanbaku[$bb]['jumlahSatuan']=(float)$rbahanbaku->jumlahSatuan;
						$arbahanbaku[$bb]['kodeAsalBahanBaku']=$rbahanbaku->kodeAsalBahanBaku;
						$arbahanbaku[$bb]['kodeBarang']=$rbahanbaku->kodeBarang;
						
						if($custom_type_id == '12'){
							$arbahanbaku[$bb]['kodeDokumen']=$rbahanbaku->kodedokumen;
						} else{
							
						};

						$arbahanbaku[$bb]['kodeDokAsal']=$rbahanbaku->kodeDokAsal;
						$arbahanbaku[$bb]['kodeKantor']=$rbahanbaku->kodeKantor;
						$arbahanbaku[$bb]['kodeSatuanBarang']=$rbahanbaku->kodeSatuanBarang;
						$arbahanbaku[$bb]['merkBarang']=$rbahanbaku->merkBarang;
						$arbahanbaku[$bb]['ndpbm']=(float)$rbahanbaku->currencies_rate;
						$arbahanbaku[$bb]['netto']=(float)$rbahanbaku->netto;
						$arbahanbaku[$bb]['nilaiJasa']=(float)$rbahanbaku->nilaiJasa;
						$arbahanbaku[$bb]['nomorAjuDokAsal']=str_replace('-','',$rbahanbaku->nomorAjuDokAsal);
						$arbahanbaku[$bb]['nomorDaftarDokAsal']=$rbahanbaku->nomorDaftarDokAsal;
						$arbahanbaku[$bb]['posTarif']=$rbahanbaku->posTarif;
						$arbahanbaku[$bb]['seriBahanBaku']=intval($rbahanbaku->seriBahanBaku);
						$arbahanbaku[$bb]['seriBarang']=intval($rbahanbaku->seriBarang);
						$arbahanbaku[$bb]['seriBarangDokAsal']=intval($rbahanbaku->seriBarangDokAsal);
						$arbahanbaku[$bb]['seriIjin']=intval($rbahanbaku->seriIjin);
						$arbahanbaku[$bb]['spesifikasiLainBarang']=$rbahanbaku->spesifikasiLainBarang;
						$arbahanbaku[$bb]['tanggalDaftarDokAsal']=$rbahanbaku->tanggalDaftarDokAsal;
						$arbahanbaku[$bb]['tipeBarang']=$rbahanbaku->tipeBarang;
						$arbahanbaku[$bb]['ukuranBarang']=$rbahanbaku->ukuranBarang;
						$arbahanbaku[$bb]['uraianBarang']=$rbahanbaku->uraianBarang;

						 $arbahanbaku_tr = array();
							$idBarang = $rb->idBarang;		
							$bahanbaku_id = $rbahanbaku->bahanbaku_id;		
							$qt = $this->db->query('
							
							SELECT 
								bahanbaku_id,
								"idBarang",
								bc_out_header_id,
								"jumlahSatuan",
								"kodeAsalBahanBaku",
								"kodeFasilitasTarif",
								"kodeJenisPungutan",
								"kodeJenisTarif",
								"nilaiBayar",
								"nilaiFasilitas",
								"nilaiSudahDilunasi",
								"seriBahanBaku",
								tarif,
								"tarifFasilitas"
							FROM dbo.view_ceisa_bahanbaku_asal_tarif
							WHERE "bc_out_header_id" = ' . $bc_out_header_id . ' and "idBarang" = ' . $idBarang . ' and "kodeJenisPungutan" = '. "'BM'" .' and bahanbaku_id = ' . $bahanbaku_id . '
							
							');
							
							$t=0;
							
							foreach($qt->result() as $rt){
								$arbahanbaku_tr[$t]['jumlahSatuan']=intval($rt->jumlahSatuan);
								$arbahanbaku_tr[$t]['kodeAsalBahanBaku']=$rt->kodeAsalBahanBaku;
								$arbahanbaku_tr[$t]['kodeFasilitasTarif']=$rt->kodeFasilitasTarif;
								$arbahanbaku_tr[$t]['kodeJenisPungutan']=$rt->kodeJenisPungutan;
								
								if($custom_type_id == '9'){
									$arbahanbaku_tr[$t]['kodeJenisTarif']='1';
								} else{
									$arbahanbaku_tr[$t]['kodeJenisTarif']=$rt->kodeJenisTarif;
								};
								
								$arbahanbaku_tr[$t]['nilaiBayar']=(float)$rt->nilaiBayar;
								$arbahanbaku_tr[$t]['nilaiFasilitas']=(float)$rt->nilaiFasilitas;
								$arbahanbaku_tr[$t]['nilaiSudahDilunasi']=(float)$rt->nilaiSudahDilunasi;
								$arbahanbaku_tr[$t]['seriBahanBaku']=intval($rt->bahanbaku_id);
								$arbahanbaku_tr[$t]['tarif']=(float)$rt->tarif;
								$arbahanbaku_tr[$t]['tarifFasilitas']=(float)$rt->tarifFasilitas;
							
								$t++;
							}
							
							$arbahanbaku[$bb]['bahanBakuTarif']=$arbahanbaku_tr;


						$bb++;
					}
					
					
					//============sampe_sini================
					
					
					$arb[$b]['barangTarif']=$art;
					$arb[$b]['bahanBaku']=$arbahanbaku;
					$arb[$b]['barangDokumen']=$arbd;
					$arb[$b]['barangPemilik']=$arbp;


					$b++;

					}


				$arr[$i]['barang']=$arb;
				
				if($custom_type_id == '10'){	
				$qei = $this->db->query('
					
						SELECT "bc_out_header_id"
						  ,"custom_type_id"
						  ,alamatEntitas
						  ,inisialEntitas
						  ,kodeEntitas
						  ,kodejenisapi
						  ,CAST(kodeJenisIdentitas AS VARCHAR) as kodeJenisIdentitas
						  ,kodeNegara
						  ,COALESCE(CAST(kodeStatus AS VARCHAR),'. "'0'" .') as kodeStatus
						  ,namaEntitas
						  ,COALESCE(nibEntitas,'. "'0'" .') as nibEntitas 
						  ,'. "''" .' as niperentitas
						  ,COALESCE(nomorIdentitas,'. "'0'" .') as nomorIdentitas
						  ,nomorIjinEntitas
						  ,tanggalIjinEntitas
						  ,seriEntitas
					  FROM dbo.view_custom_export_entitas_ceisa40 where "bc_out_header_id" = ' . $bc_out_header_id . ' and kodeEntitas <> '. "'3'" .'
						ORDER BY seriEntitas

				');
			} else{
				$qei = $this->db->query('
					
						SELECT "bc_out_header_id"
							  ,"custom_type_id"
							  ,alamatEntitas
							  ,inisialEntitas
							  ,kodeEntitas
							  ,kodejenisapi
							  ,CAST(kodeJenisIdentitas AS VARCHAR) as kodeJenisIdentitas
							  ,kodeNegara
							  ,COALESCE(CAST(kodeStatus AS VARCHAR),'. "'0'" .') as kodeStatus
							  ,namaEntitas
							  ,COALESCE(nibEntitas,'. "'0'" .') as nibEntitas 
							  ,'. "''" .' as niperentitas
							  ,COALESCE(nomorIdentitas,'. "'0'" .') as nomorIdentitas
							  ,COALESCE(nomorIjinEntitas,'. "'0'" .') as nomorIjinEntitas
							  ,tanggalIjinEntitas
							  ,seriEntitas
						  FROM dbo.view_custom_export_entitas_ceisa40 where "bc_out_header_id" = ' . $bc_out_header_id . ' and kodeEntitas <> '. "'2'" .'
							ORDER BY seriEntitas

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
				$ar_entitas[$ei]['nomorIdentitas']=str_replace(str_replace(str_replace($rei->nomoridentitas, ' ', ''),'-',''),'.','');
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
						ROW_NUMBER ( ) OVER ( PARTITION BY bc_out_header_id ORDER BY bc_out_header_id ) AS serikemasan 
					FROM dbo.view_custom_kemasan_ceisa40
					WHERE "bc_out_header_id" = ' . $bc_out_header_id . '

			');

			$kemasan=0;
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
					TEXT LEFT JOIN dbo.referensi_ukuran_kontainer ON dt_ceisa_kontainer.kode_ukuran_kontainer :: TEXT = referensi_ukuran_kontainer.id_ukuran_kontainer :: TEXT where bc_out_header_id = $bc_out_header_id and dbo.referensi_jenis_kontainer.kode_jenis_kontainer = '8'

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
					 LEFT JOIN dbo.prm_custom_type ON dt_ceisa_dokumen.custom_type_id = prm_custom_type.custom_type_id where bc_out_header_id = $bc_out_header_id
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
			
				if($custom_type_id == '12' || $custom_type_id == '9'){
					$q_pengangkut = $this->db->query('

						SELECT  COALESCE("bc_out_header_id",1) as "bc_out_header_id"
						  ,COALESCE("kodeBendera",'. "'ID'" .') as "kodeBendera"
						  ,COALESCE("namaPengangkut",'. "'-'" .') as "namaPengangkut"
						  ,COALESCE("nomorPengangkut",'. "'-'" .') as "nomorPengangkut"
						  ,COALESCE("kodeCaraAngkut",'. "'0'" .') as "kodeCaraAngkut"
						  ,'. "'1'" .' as "seriPengangkut"
						  FROM dbo.view_custom_pengangkut_ceisa40 where "bc_out_header_id" = ' . $bc_out_header_id . '

					');

					$pengangkut=0;
					foreach($q_pengangkut->result() as $r_pengangkut){
						$ar_pengangkut[$pengangkut]['idPengangkut']=intval($r_pengangkut->bc_out_header_id);
						$ar_pengangkut[$pengangkut]['kodeBendera']=$r_pengangkut->kodeBendera;
						$ar_pengangkut[$pengangkut]['namaPengangkut']=$r_pengangkut->namaPengangkut;
						$ar_pengangkut[$pengangkut]['nomorPengangkut']=$r_pengangkut->nomorPengangkut;
						$ar_pengangkut[$pengangkut]['kodeCaraAngkut']=$r_pengangkut->kodeCaraAngkut;
						$ar_pengangkut[$pengangkut]['seriPengangkut']=$r_pengangkut->seriPengangkut;

					$pengangkut++;
					}
				} else{
					$q_pengangkut = $this->db->query('

						SELECT  COALESCE("bc_out_header_id",1) as "bc_out_header_id"
						  ,COALESCE("kodeBendera",'. "'ID'" .') as "kodeBendera"
						  ,COALESCE("namaPengangkut",'. "'-'" .') as "namaPengangkut"
						  ,COALESCE("nomorPengangkut",'. "'-'" .') as "nomorPengangkut"
						  ,COALESCE("kodeCaraAngkut",'. "'0'" .') as "kodeCaraAngkut"
						  ,'. "'1'" .' as "seriPengangkut"
						  FROM dbo.view_custom_pengangkut_ceisa40 where "bc_out_header_id" = ' . $bc_out_header_id . '

					');

					$pengangkut=0;
					foreach($q_pengangkut->result() as $r_pengangkut){
						$ar_pengangkut[$pengangkut]['idPengangkut']=$r_pengangkut->bc_out_header_id;
						$ar_pengangkut[$pengangkut]['kodeBendera']=$r_pengangkut->kodeBendera;
						$ar_pengangkut[$pengangkut]['namaPengangkut']=$r_pengangkut->namaPengangkut;
						$ar_pengangkut[$pengangkut]['nomorPengangkut']=$r_pengangkut->nomorPengangkut;
						$ar_pengangkut[$pengangkut]['kodeCaraAngkut']=$r_pengangkut->kodeCaraAngkut;
						$ar_pengangkut[$pengangkut]['seriPengangkut']=intval($r_pengangkut->seriPengangkut);

					$pengangkut++;
					}
					
				};
			
			$q_bank = $this->db->query('
	 
				SELECT  bc_out_header_id
				  ,kodebank
				  ,1 as seribank
				  ,uraian
				 FROM dbo.view_custom_export_bank_devisa_ceisa40  where bc_out_header_id = ' . $bc_out_header_id . '
				
			');
				
			$bank=0;
			//var_dump($q_bank->result());
			//die();
			foreach($q_bank->result() as $r_bank){
				$ar_bank[$bank]['kodeBank']=$r_bank->kodebank;
				$ar_bank[$bank]['seriBank']=intval($r_bank->seribank);
				$ar_bank[$bank]['namaBank']=$r_bank->uraian;

			$bank++;
			}
			
			
			$q_pungutan = $this->db->query('

				SELECT
					bc_out_header_id,
					"kodeAsalBahanBaku",
					"kodeFasilitasTarif",
					"kodeJenisPungutan",
					sum("nilaiBayar") as "nilaiPungutan"
				FROM dbo.view_ceisa_bahanbaku_asal_tarif a
				WHERE "bc_out_header_id" = ' . $bc_out_header_id . '
				group by 
					 bc_out_header_id,
					"kodeAsalBahanBaku",
					"kodeFasilitasTarif",
					"kodeJenisPungutan"			

			');

			$pungutan=0;
			foreach($q_pungutan->result() as $r_pungutan){
				$ar_pungutan[$pungutan]['kodeFasilitasTarif']=$r_pungutan->kodeFasilitasTarif;
				$ar_pungutan[$pungutan]['kodeJenisPungutan']=$r_pungutan->kodeJenisPungutan;
				$ar_pungutan[$pungutan]['nilaiPungutan']=(float)$r_pungutan->nilaiPungutan;

			$pungutan++;
			}
			
			
			$q_kesiapanBarang = $this->db->query('

				SELECT  "pkb_id"
				  ,bc_out_header_id
				  ,CAST("kodeJenisBarang" AS VARCHAR) as "kodeJenisBarang"
				  ,CAST("kodeJenisGudang" AS VARCHAR) as "kodeJenisGudang"
				  ,"namaPic"
				  ,"alamat"
				  ,COALESCE("nomorTelpPic",'. "'1'" .') as "nomorTelpPic"
				  ,"jumlahContainer20"
				  ,"jumlahContainer40"
				  ,"lokasiSiapPeriksa"
				  ,"kodeCaraStuffing"
				  ,CAST("kodeJenisPartOf" AS VARCHAR) as "kodeJenisPartOf"
				  ,"tanggalPkb"
				  ,concat("tanggalPkb",'. "'T'" .', "waktuSiapPeriksa",'. "':00.000Z'" .') as "waktuSiapPeriksa"

			  FROM dbo.view_custom_export_pkb_ceisa40 where "bc_out_header_id" = ' . $bc_out_header_id . '

				');
				
			$kesiapanBarang=0;
			//var_dump($q_kesiapanBarang->result());
			//die();
			foreach($q_kesiapanBarang->result() as $r_kesiapanBarang){
				$ar_kesiapanBarang[$kesiapanBarang]['kodeJenisBarang']=$r_kesiapanBarang->kodeJenisBarang;
				$ar_kesiapanBarang[$kesiapanBarang]['kodeJenisGudang']=$r_kesiapanBarang->kodeJenisGudang;
				$ar_kesiapanBarang[$kesiapanBarang]['namaPic']=$r_kesiapanBarang->namaPic;
				$ar_kesiapanBarang[$kesiapanBarang]['alamat']=$r_kesiapanBarang->alamat;
				$ar_kesiapanBarang[$kesiapanBarang]['nomorTelpPic']=$r_kesiapanBarang->nomorTelpPic;
				$ar_kesiapanBarang[$kesiapanBarang]['lokasiSiapPeriksa']=$r_kesiapanBarang->lokasiSiapPeriksa;
				$ar_kesiapanBarang[$kesiapanBarang]['kodeCaraStuffing']=strval($r_kesiapanBarang->kodeCaraStuffing);
				$ar_kesiapanBarang[$kesiapanBarang]['kodeJenisPartOf']=$r_kesiapanBarang->kodeJenisPartOf;
				$ar_kesiapanBarang[$kesiapanBarang]['tanggalPkb']=$r_kesiapanBarang->tanggalPkb;
				$ar_kesiapanBarang[$kesiapanBarang]['waktuSiapPeriksa']=$r_kesiapanBarang->waktuSiapPeriksa;
				$ar_kesiapanBarang[$kesiapanBarang]['jumlahContainer20']=intval($r_kesiapanBarang->jumlahContainer20);
				$ar_kesiapanBarang[$kesiapanBarang]['jumlahContainer40']=intval($r_kesiapanBarang->jumlahContainer40);

			$kesiapanBarang++;
			}

				$arr[$i]['jaminan']=$ar_jaminan;
				$arr[$i]['pungutan']=$ar_pungutan;
				$arr[$i]['entitas']=$ar_entitas;
				$arr[$i]['kemasan']=$ar_kemasan;
				$arr[$i]['kontainer']=$ar_kontainer;
				$arr[$i]['dokumen']=$ar_dokumen;
				$arr[$i]['pengangkut']=$ar_pengangkut;
				$arr[$i]['bankDevisa']=$ar_bank;
				
				if($custom_type_id == '10'){
					$arr[$i]['kesiapanBarang']=$ar_kesiapanBarang;
				} else{
					
				};
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
				update dbo.dt_bc_out_header set id_respon = -1,
					   bc_date = NULL,
					   mode = $isFinal
				where bc_out_header_id =  $bc_out_header_id;
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
	
	function get_respon_ceisa_new(){
		$bc_out_header_id =  (isset($_POST['bc_out_header_id']) && !empty($_POST['bc_out_header_id']))?$_POST['bc_out_header_id']:die('{"status":"ERROR","message":" Param Header ID Tidak Ditemukan"}');
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
		
		//echo $resp;
		//die();
		
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
							"bc_out_header_id" = ' . $bc_out_header_id . '
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
						
							
							$data_in = array("bc_out_header_id" => $bc_out_header_id,
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
						
								update dbo.dt_bc_out_header set bc_no = (select  nomor_daftar  from dbo.dt_ceisa_status_respon
									where bc_out_header_id = $bc_out_header_id  limit 1),  
										bc_date= (select  TO_DATE(tanggal_daftar, 'YYYY-MM-DD') from dbo.dt_ceisa_status_respon  
									where bc_out_header_id = $bc_out_header_id and nomor_daftar IS NOT NULL limit 1),
										id_respon = (select MAX (id_respon) from dbo.dt_ceisa_status_respon
									where bc_out_header_id = $bc_out_header_id  limit 1) where bc_out_header_id  = $bc_out_header_id
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
							"bc_out_header_id" = ' . $bc_out_header_id . '
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
							
							$data_in = array("bc_out_header_id" => $bc_out_header_id,
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
						
								update dbo.dt_bc_out_header set bc_no = (select  nomor_daftar  from dbo.dt_ceisa_respon_data
									where bc_out_header_id = $bc_out_header_id  limit 1),  
										bc_date= (select  TO_DATE(tanggal_daftar, 'YYYY-MM-DD') from dbo.dt_ceisa_respon_data  
									where bc_out_header_id = $bc_out_header_id and nomor_daftar IS NOT NULL limit 1),
										id_respon = (select MAX (id_respon) from dbo.dt_ceisa_respon_data
									where bc_out_header_id = $bc_out_header_id  limit 1) where bc_out_header_id  = $bc_out_header_id
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

		
	function cetak_respon_ceisa(){
		$bc_out_header_id = (isset($_GET['bc_out_header_id']) && !empty($_GET['bc_out_header_id']))?$_GET['bc_out_header_id']:die('{"sts":"ERROR","desc":" Param header_id Tidak Ditemukan"}');
		$id_respon = (isset($_GET['id_respon']) && !empty($_GET['id_respon']))?$_GET['id_respon']:"";
		$respon = (isset($_GET['Pdf']) && !empty($_GET['Pdf']))?$_GET['Pdf']:"";
		$arr = array();
        $tgl = date('Y-m-d h:i:s');
		
		$q = $this->db->query('
			select "Pdf" from dbo.dt_ceisa_respon_data where id_respon = ' . $id_respon . '
		');
		
		
		$pdf = "";
		foreach($q->result() as $r){
			$pdf = $r->Pdf;
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
		$bc_out_header_id = (isset($_GET['bc_out_header_id']) && !empty($_GET['bc_out_header_id']))?$_GET['bc_out_header_id']:die('{"sts":"ERROR","desc":" Param Header Tidak Ditemukan"}');
		$custom_type_id = (isset($_GET['custom_type_id']) && !empty($_GET['custom_type_id']))?$_GET['custom_type_id']:die('{"sts":"ERROR","desc":" Param Dokumen Tidak Ditemukan"}');
		
				
		$q = $this->db->query('
			select
				bc_out_header_id, 
				"nomorAju", 
				"noDaftar", 
				tanggaldaftar, 
				"namaPengusaha", 
				"alamatPengusaha", 
				"kotaPengusaha", 
				"kodePosPengusaha", 
				"kodeNegaraPengusaha", 
				"negaraPengusaha", 
				"npwpPengusaha", 
				"nibPengusaha", 
				"nomorIjinPengusaha", 
				"tanggalIjinPengusaha", 
				"noApiPengusaha", 
				"statusPengusaha", 
				"namaPembeli", 
				"alamatPembeli", 
				"kotaPembeli", 
				"kodeNegaraPembeli", 
				"kodePosPembeli", 
				"negaraPembeli", 
				"npwpPembeli", 
				"nibPembeli", 
				"nomorIjinPembeli", 
				"tanggalIjinPembeli", 
				"noApiPembeli", 
				"statusPembeli", 
				"namaPenerima", 
				"alamatPenerima", 
				"kotaPenerima", 
				"kodePosPenerima", 
				"kodeNegaraPenerima", 
				"negaraPenerima", 
				"npwpPenerima", 
				"nibPenerima", 
				"nomorIjinPenerima", 
				"tanggalIjinPenerima", 
				"noApiPenerima", 
				"statusPenerima", 
				"namaPemilik", 
				"alamatPemilik", 
				"kotaPemilik", 
				"kodePosPemilik", 
				"kodeNegaraPemilik", 
				"negaraPemilik", 
				"npwpPemilik", 
				"nibPemilik", 
				"nomorIjinPemilik", 
				"tanggalIjinPemilik", 
				"noApiPemilik", 
				"statusPemilik", 
				"kodeKppbc", 
				"Kppbc", 
				"kodeKppbcBongkar", 
				"KppbcBongkar", 
				"kodeKppbcPeriksa", 
				"KantorPeriksa", 
				"JenisEkspor", 
				"kategoriEkspor", 
				"caraDagang", 
				"CaraBayar", 
				"nomorBc11", 
				"tanggalBc11", 
				"posBc11", 
				"subposBc11", 
				"caraAngkut", 
				"namaPengangkut", 
				"nomorPengangkut", 
				"kodeBendera", 
				"Bendera", 
				"tanggalEkspor", 
				"pelabuhanMuat", 
				"pelabuhanEkspor", 
				"kodePelBongkar", 
				"kodePelTujuan", 
				"kodeTps", 
				"NegaraTujuan", 
				"lokasiPeriksa", 
				"kodeIncoterm", 
				"Incoterm", 
				"kodeBankDevisa", 
				"bankDevisa", 
				TO_CHAR(fob, '. "'FM99,999,999,999.00'" .') as fob, 
				TO_CHAR("cifRupiah", '. "'FM99,999,999,999.00'" .') as "cifRupiah", 
				TO_CHAR("ppnPajak", '. "'FM99,999,999,999.00'" .') as "ppnPajak", 
				"kodeValuta", 
				valuta, 
				TO_CHAR(freight, '. "'FM99,999,999,999.00'" .') as freight, 
				TO_CHAR(asuransi, '. "'FM99,999,999,999.00'" .') as asuransi, 
				TO_CHAR("nilaiJasa", '. "'FM99,999,999,999.00'" .') as "nilaiJasa", 
				TO_CHAR(bruto, '. "'FM99,999,999,999.0000'" .') as bruto, 
				TO_CHAR(netto, '. "'FM99,999,999,999.0000'" .') as netto, 
				TO_CHAR(ndpbm, '. "'FM99,999,999,999.00'" .') as ndpbm,
				"nomorPackingList",
				"tanggalPackingList",
				"nomorInvoice",
				"tanggalInvoice",
				"uraian_dokumen_mou",
				"no_mou",
				"tanggal_mou",
				"namaTtd",
				"kotaTtd",
				"tanggalTtd",
				"jabatanTtd",
				"kodeTujuanPengiriman",
				"TujuanPengiriman",
				"jenisTpb",
				"nomorKontrak",
				"nomorFaktur",
				"tanggalKontrak",
				"tanggalFaktur",
				TO_CHAR("jumlahKemasan", '. "'FM99,999,999,999'" .') as "jumlahKemasan",
				"merkKemasan",
				"Kemasan",
				"TujuanTpb",
				"nomorSj",
				"tanggalSj",
				"hargaPerolehan",
				CASE 
					WHEN "volume" < 1000 THEN TO_CHAR(volume, '. "'FM999999999.0000'" .')
					ELSE TO_CHAR(volume, '. "'FM99,999,999,999.0000'" .')
				END AS volume
			from dbo.view_bc_out_header_draft
			where bc_out_header_id =  ' . $bc_out_header_id . '
		');
		
		
		
		$bc_out_header_id = "";
		$nomorAju = ""; 
		$noDaftar = ""; 
		$tanggaldaftar = ""; 
		$namaPengusaha = ""; 
		$alamatPengusaha = ""; 
		$kotaPengusaha = ""; 
		$kodePosPengusaha = ""; 
		$kodeNegaraPengusaha = ""; 
		$negaraPengusaha = ""; 
		$npwpPengusaha = ""; 
		$nibPengusaha = ""; 
		$nomorIjinPengusaha = ""; 
		$tanggalIjinPengusaha = ""; 
		$noApiPengusaha = ""; 
		$statusPengusaha = ""; 
		$namaPembeli = ""; 
		$alamatPembeli = ""; 
		$kotaPembeli = ""; 
		$kodeNegaraPembeli = ""; 
		$kodePosPembeli = ""; 
		$negaraPembeli = ""; 
		$npwpPembeli = ""; 
		$nibPembeli = ""; 
		$nomorIjinPembeli = ""; 
		$tanggalIjinPembeli = ""; 
		$noApiPembeli = ""; 
		$statusPembeli = ""; 
		$namaPenerima = ""; 
		$alamatPenerima = ""; 
		$kotaPenerima = ""; 
		$kodePosPenerima = ""; 
		$kodeNegaraPenerima = ""; 
		$negaraPenerima = ""; 
		$npwpPenerima = ""; 
		$nibPenerima = ""; 
		$nomorIjinPenerima = ""; 
		$tanggalIjinPenerima = ""; 
		$noApiPenerima = ""; 
		$statusPenerima = ""; 
		$namaPemilik = ""; 
		$alamatPemilik = ""; 
		$kotaPemilik = ""; 
		$kodePosPemilik = ""; 
		$kodeNegaraPemilik = ""; 
		$negaraPemilik = ""; 
		$npwpPemilik = ""; 
		$nibPemilik = ""; 
		$nomorIjinPemilik = ""; 
		$tanggalIjinPemilik = ""; 
		$noApiPemilik = ""; 
		$statusPemilik = ""; 
		$kodeKppbc = ""; 
		$Kppbc = ""; 
		$kodeKppbcBongkar = ""; 
		$KppbcBongkar = ""; 
		$kodeKppbcPeriksa = ""; 
		$KantorPeriksa = ""; 
		$JenisEkspor = ""; 
		$kategoriEkspor = ""; 
		$caraDagang = ""; 
		$CaraBayar = ""; 
		$nomorBc11 = ""; 
		$tanggalBc11 = ""; 
		$posBc11 = ""; 
		$subposBc11 = ""; 
		$caraAngkut = ""; 
		$namaPengangkut = ""; 
		$nomorPengangkut = ""; 
		$kodeBendera = ""; 
		$Bendera = ""; 
		$tanggalEkspor = ""; 
		$pelabuhanMuat = ""; 
		$pelabuhanEkspor = ""; 
		$kodePelBongkar = ""; 
		$kodePelTujuan = ""; 
		$kodeTps = ""; 
		$NegaraTujuan = ""; 
		$lokasiPeriksa = ""; 
		$kodeIncoterm = ""; 
		$Incoterm = ""; 
		$kodeBankDevisa = ""; 
		$bankDevisa = ""; 
		$fob = "";  
		$cifRupiah = "";  
		$ppnPajak = "";  
		$kodeValuta = ""; 
		$valuta = ""; 
		$freight = "";  
		$asuransi = "";  
		$nilaiJasa = ""; 
		$bruto = "";  
		$netto = "";  
		$ndpbm = "";
		$nomorPackingList = "";
		$tanggalPackingList = "";
		$nomorInvoice = "";
		$tanggalInvoice = "";
		$uraian_dokumen_mou = "";
		$no_mou = "";
		$tanggal_mou = "";
		$namaTtd = "";
		$kotaTtd = "";
		$tanggalTtd = "";
		$JabatanTtd = "";
		$kodeTujuanPengiriman = "";
		$TujuanPengiriman = "";
		$jenisTpb = "";
		$nomorKontrak = "";
		$nomorFaktur = "";
		$tanggalKontrak = "";
		$tanggalFaktur = "";
		$jumlahKemasan = "";
		$merkKemasan = "";
		$Kemasan = "";
		$volume = "";
		$TujuanTpb = "";
		$nomorSj = "";
		$tanggalSj = "";
		$hargaPerolehan = "";
		
		
		
		foreach($q->result() as $r){
			$bc_out_header_id = $r-> bc_out_header_id; 
			$nomorAju = $r-> nomorAju;
			$noDaftar = $r-> noDaftar;
			$tanggaldaftar = $r-> tanggaldaftar; 
			$namaPengusaha = $r-> namaPengusaha;
			$alamatPengusaha = $r-> alamatPengusaha;
			$kotaPengusaha = $r-> kotaPengusaha;
			$kodePosPengusaha = $r-> kodePosPengusaha;
			$kodeNegaraPengusaha = $r-> kodeNegaraPengusaha;
			$negaraPengusaha = $r-> negaraPengusaha;
			$npwpPengusaha = $r-> npwpPengusaha;
			$nibPengusaha = $r-> nibPengusaha;
			$nomorIjinPengusaha = $r-> nomorIjinPengusaha;
			$tanggalIjinPengusaha = $r-> tanggalIjinPengusaha;
			$noApiPengusaha = $r-> noApiPengusaha;
			$statusPengusaha = $r-> statusPengusaha;
			$namaPembeli = $r-> namaPembeli;
			$alamatPembeli = $r-> alamatPembeli;
			$kotaPembeli = $r-> kotaPembeli;
			$kodeNegaraPembeli = $r-> kodeNegaraPembeli;
			$kodePosPembeli = $r-> kodePosPembeli;
			$negaraPembeli = $r-> negaraPembeli;
			$npwpPembeli = $r-> npwpPembeli;
			$nibPembeli = $r-> nibPembeli;
			$nomorIjinPembeli = $r-> nomorIjinPembeli;
			$tanggalIjinPembeli = $r-> tanggalIjinPembeli;
			$noApiPembeli = $r-> noApiPembeli;
			$statusPembeli = $r-> statusPembeli;
			$namaPenerima = $r-> namaPenerima;
			$alamatPenerima = $r-> alamatPenerima;
			$kotaPenerima = $r-> kotaPenerima;
			$kodePosPenerima = $r-> kodePosPenerima;
			$kodeNegaraPenerima = $r-> kodeNegaraPenerima;
			$negaraPenerima = $r-> negaraPenerima;
			$npwpPenerima = $r-> npwpPenerima;
			$nibPenerima = $r-> nibPenerima;
			$nomorIjinPenerima = $r-> nomorIjinPenerima;
			$tanggalIjinPenerima = $r-> tanggalIjinPenerima;
			$noApiPenerima = $r-> noApiPenerima;
			$statusPenerima = $r-> statusPenerima;
			$namaPemilik = $r-> namaPemilik;
			$alamatPemilik = $r-> alamatPemilik;
			$kotaPemilik = $r-> kotaPemilik;
			$kodePosPemilik = $r-> kodePosPemilik;
			$kodeNegaraPemilik = $r-> kodeNegaraPemilik;
			$negaraPemilik = $r-> negaraPemilik;
			$npwpPemilik = $r-> npwpPemilik;
			$nibPemilik = $r-> nibPemilik;
			$nomorIjinPemilik = $r-> nomorIjinPemilik;
			$tanggalIjinPemilik = $r-> tanggalIjinPemilik;
			$noApiPemilik = $r-> noApiPemilik;
			$statusPemilik = $r-> statusPemilik;
			$kodeKppbc = $r-> kodeKppbc;
			$Kppbc = $r-> Kppbc;
			$kodeKppbcBongkar = $r-> kodeKppbcBongkar;
			$KppbcBongkar = $r-> KppbcBongkar;
			$kodeKppbcPeriksa = $r-> kodeKppbcPeriksa;
			$KantorPeriksa = $r-> KantorPeriksa;
			$JenisEkspor = $r-> JenisEkspor;
			$kategoriEkspor = $r-> kategoriEkspor;
			$caraDagang = $r-> caraDagang;
			$CaraBayar = $r-> CaraBayar;
			$nomorBc11 = $r-> nomorBc11;
			$tanggalBc11 = $r-> tanggalBc11;
			$posBc11 = $r-> posBc11;
			$subposBc11 = $r-> subposBc11;
			$caraAngkut = $r-> caraAngkut;
			$namaPengangkut = $r-> namaPengangkut;
			$nomorPengangkut = $r-> nomorPengangkut;
			$kodeBendera = $r-> kodeBendera;
			$Bendera = $r-> Bendera;
			$tanggalEkspor = $r-> tanggalEkspor;
			$pelabuhanMuat = $r-> pelabuhanMuat;
			$pelabuhanEkspor = $r-> pelabuhanEkspor;
			$kodePelBongkar = $r-> kodePelBongkar;
			$kodePelTujuan = $r-> kodePelTujuan;
			$kodeTps = $r-> kodeTps;
			$NegaraTujuan = $r-> NegaraTujuan;
			$lokasiPeriksa = $r-> lokasiPeriksa;
			$kodeIncoterm = $r-> kodeIncoterm;
			$Incoterm = $r-> Incoterm;
			$kodeBankDevisa = $r-> kodeBankDevisa;
			$bankDevisa = $r-> bankDevisa;
			$fob = $r-> fob; 
			$cifRupiah = $r-> cifRupiah; 
			$ppnPajak = $r-> ppnPajak; 
			$kodeValuta = $r-> kodeValuta;
			$valuta = $r-> valuta; 
			$freight = $r-> freight; 
			$asuransi = $r-> asuransi; 
			$nilaiJasa = $r-> nilaiJasa;
			$bruto = $r-> bruto; 
			$netto = $r-> netto; 
			$ndpbm = $r-> ndpbm;
			$nomorPackingList = $r-> nomorPackingList;
			$tanggalPackingList = $r-> tanggalPackingList;
			$nomorInvoice = $r-> nomorInvoice;
			$tanggalInvoice = $r-> tanggalInvoice;
			$uraian_dokumen_mou = $r-> uraian_dokumen_mou;
			$no_mou = $r-> no_mou;
			$tanggal_mou = $r-> tanggal_mou;
			$namaTtd = $r-> namaTtd;
			$kotaTtd = $r-> kotaTtd;
			$tanggalTtd = $r-> tanggalTtd;
			$jabatanTtd = $r-> jabatanTtd;
			$kodeTujuanPengiriman = $r-> kodeTujuanPengiriman;
			$TujuanPengiriman = $r-> TujuanPengiriman;
			$jenisTpb = $r-> jenisTpb;
			$nomorKontrak = $r-> nomorKontrak;
			$nomorFaktur = $r-> nomorFaktur;
			$tanggalKontrak = $r-> tanggalKontrak;
			$tanggalFaktur = $r-> tanggalFaktur;
			$jumlahKemasan = $r-> jumlahKemasan;
			$merkKemasan = $r-> merkKemasan;
			$Kemasan = $r-> Kemasan;
			$volume = $r-> volume;
			$TujuanTpb = $r-> TujuanTpb;
			$nomorSj = $r-> nomorSj;
			$tanggalSj = $r-> tanggalSj;
			$hargaPerolehan = $r-> hargaPerolehan;
		}
		

		$data['a'] = '';
		$data['bc_out_header_id'] = $bc_out_header_id;
		$data['nomorAju'] = $nomorAju;
		$data['noDaftar'] = $noDaftar;
		$data['tanggaldaftar'] = $tanggaldaftar; 
		$data['namaPengusaha'] = $namaPengusaha;
		$data['alamatPengusaha'] = $alamatPengusaha;
		$data['kotaPengusaha'] = $kotaPengusaha;
		$data['kodePosPengusaha'] = $kodePosPengusaha;
		$data['kodeNegaraPengusaha'] = $kodeNegaraPengusaha;
		$data['negaraPengusaha'] = $negaraPengusaha;
		$data['npwpPengusaha'] = $npwpPengusaha;
		$data['nibPengusaha'] = $nibPengusaha;
		$data['nomorIjinPengusaha'] = $nomorIjinPengusaha;
		$data['tanggalIjinPengusaha'] = $tanggalIjinPengusaha;
		$data['noApiPengusaha'] = $noApiPengusaha;
		$data['statusPengusaha'] = $statusPengusaha;
		$data['namaPembeli'] = $namaPembeli;
		$data['alamatPembeli'] = $alamatPembeli;
		$data['kotaPembeli'] = $kotaPembeli;
		$data['kodeNegaraPembeli'] = $kodeNegaraPembeli;
		$data['kodePosPembeli'] = $kodePosPembeli;
		$data['negaraPembeli'] = $negaraPembeli;
		$data['npwpPembeli'] = $npwpPembeli;
		$data['nibPembeli'] = $nibPembeli;
		$data['nomorIjinPembeli'] = $nomorIjinPembeli;
		$data['tanggalIjinPembeli'] = $tanggalIjinPembeli;
		$data['noApiPembeli'] = $noApiPembeli;
		$data['statusPembeli'] = $statusPembeli;
		$data['namaPenerima'] = $namaPenerima;
		$data['alamatPenerima'] = $alamatPenerima;
		$data['kotaPenerima'] = $kotaPenerima;
		$data['kodePosPenerima'] = $kodePosPenerima;
		$data['kodeNegaraPenerima'] = $kodeNegaraPenerima;
		$data['negaraPenerima'] = $negaraPenerima;
		$data['npwpPenerima'] = $npwpPenerima;
		$data['nibPenerima'] = $nibPenerima;
		$data['nomorIjinPenerima'] = $nomorIjinPenerima;
		$data['tanggalIjinPenerima'] = $tanggalIjinPenerima;
		$data['noApiPenerima'] = $noApiPenerima;
		$data['statusPenerima'] = $statusPenerima;
		$data['namaPemilik'] = $namaPemilik;
		$data['alamatPemilik'] = $alamatPemilik;
		$data['kotaPemilik'] = $kotaPemilik;
		$data['kodePosPemilik'] = $kodePosPemilik;
		$data['kodeNegaraPemilik'] = $kodeNegaraPemilik;
		$data['negaraPemilik'] = $negaraPemilik;
		$data['npwpPemilik'] = $npwpPemilik;
		$data['nibPemilik'] = $nibPemilik;
		$data['nomorIjinPemilik'] = $nomorIjinPemilik;
		$data['tanggalIjinPemilik'] = $tanggalIjinPemilik;
		$data['noApiPemilik'] = $noApiPemilik;
		$data['statusPemilik'] = $statusPemilik;
		$data['kodeKppbc'] = $kodeKppbc;
		$data['Kppbc'] = $Kppbc;
		$data['kodeKppbcBongkar'] = $kodeKppbcBongkar;
		$data['KppbcBongkar'] = $KppbcBongkar;
		$data['kodeKppbcPeriksa'] = $kodeKppbcPeriksa;
		$data['KantorPeriksa'] = $KantorPeriksa;
		$data['JenisEkspor'] = $JenisEkspor;
		$data['kategoriEkspor'] = $kategoriEkspor;
		$data['caraDagang'] = $caraDagang;
		$data['CaraBayar'] = $CaraBayar;
		$data['nomorBc11'] = $nomorBc11;
		$data['tanggalBc11'] = $tanggalBc11;
		$data['posBc11'] = $posBc11;
		$data['subposBc11'] = $subposBc11;
		$data['caraAngkut'] = $caraAngkut;
		$data['namaPengangkut'] = $namaPengangkut;
		$data['nomorPengangkut'] = $nomorPengangkut;
		$data['kodeBendera'] = $kodeBendera;
		$data['Bendera'] = $Bendera;
		$data['tanggalEkspor'] = $tanggalEkspor;
		$data['pelabuhanMuat'] = $pelabuhanMuat;
		$data['pelabuhanEkspor'] = $pelabuhanEkspor;
		$data['kodePelBongkar'] = $kodePelBongkar;
		$data['kodePelTujuan'] = $kodePelTujuan;
		$data['kodeTps'] = $kodeTps;
		$data['NegaraTujuan'] = $NegaraTujuan;
		$data['lokasiPeriksa'] = $lokasiPeriksa;
		$data['kodeIncoterm'] = $kodeIncoterm;
		$data['Incoterm'] = $Incoterm;
		$data['kodeBankDevisa'] = $kodeBankDevisa;
		$data['bankDevisa'] = $bankDevisa;
		$data['fob'] = $fob; 
		$data['cifRupiah'] = $cifRupiah; 
		$data['ppnPajak'] = $ppnPajak; 
		$data['kodeValuta'] = $kodeValuta;
		$data['valuta'] = $valuta; 
		$data['freight'] = $freight; 
		$data['asuransi'] = $asuransi; 
		$data['nilaiJasa'] = $nilaiJasa;
		$data['bruto'] = $bruto; 
		$data['netto'] = $netto; 
		$data['ndpbm'] = $ndpbm;
		$data['nomorPackingList'] = $nomorPackingList;
		$data['tanggalPackingList'] = $tanggalPackingList;
		$data['nomorInvoice'] = $nomorInvoice;
		$data['tanggalInvoice'] = $tanggalInvoice;
		$data['uraian_dokumen_mou'] = $uraian_dokumen_mou;
		$data['no_mou'] = $no_mou;
		$data['tanggal_mou'] = $tanggal_mou;
		$data['namaTtd'] = $namaTtd;
		$data['kotaTtd'] = $kotaTtd;
		$data['tanggalTtd'] = $tanggalTtd;
		$data['jabatanTtd'] = $jabatanTtd;
		$data['kodeTujuanPengiriman'] = $kodeTujuanPengiriman;
		$data['TujuanPengiriman'] = $TujuanPengiriman;
		$data['jenisTpb'] = $jenisTpb;
		$data['nomorKontrak'] = $nomorKontrak;
		$data['nomorFaktur'] = $nomorFaktur;
		$data['tanggalKontrak'] = $tanggalKontrak;
		$data['tanggalFaktur'] = $tanggalFaktur;
		$data['jumlahKemasan'] = $jumlahKemasan;
		$data['merkKemasan'] = $merkKemasan;
		$data['Kemasan'] = $Kemasan;
		$data['volume'] = $volume;
		$data['TujuanTpb'] = $TujuanTpb;
		$data['nomorSj'] = $nomorSj;
		$data['tanggalSj'] = $tanggalSj;
		$data['hargaPerolehan'] = $hargaPerolehan;

		
		
			if($custom_type_id == 6){
				$this->load->view('draft/bc24',$data);
			}if($custom_type_id == 7){
				$this->load->view('draft/bc25',$data);
			}if($custom_type_id == 8){
				$this->load->view('draft/bc261',$data);
			}if($custom_type_id == 9){
				$this->load->view('draft/bc27',$data);
			}if($custom_type_id == 10){
				$this->load->view('draft/bc30',$data);
			}if($custom_type_id == 11){
				$this->load->view('draft/bc33',$data);
			}if($custom_type_id == 12){
				$this->load->view('draft/bc41',$data);
			}if($custom_type_id == 13){
				$this->load->view('draft/PEMUSNAHAN',$data);
			}
        

    }
	
	
	
	
	
}

?>