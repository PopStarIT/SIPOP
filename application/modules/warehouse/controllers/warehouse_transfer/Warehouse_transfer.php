<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Warehouse_transfer extends CI_Controller { 

	function __construct(){ 
		parent::__construct(); 
		
		$this->data_transfer = $_REQUEST;
		
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
	
	function warehouse_transfer_table() {
		$view = 'view_warehouse_transfer';
		$get_field = $this->ecc_library->get_field($view);
		
		$get_field['r1']['hidden'] = true;
		$get_field['r6']['hidden'] = true;
		$get_field['r7']['hidden'] = true;
		$get_field['r13']['hidden'] = true;
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
		$get_field['r2']['width'] = 200;
		$get_field['r3']['width'] = 200;
		$get_field['r4']['width'] = 250;
		$get_field['r8']['width'] = 250;
		
		return $get_field;
	}
	
	function warehouse_transfer_detail_table() {
		$view = 'view_warehouse_request_list';
		$get_field = $this->ecc_library->get_field($view);
		
		$get_field['r1']['hidden'] = true;
		$get_field['r2']['hidden'] = true;
		
		return $get_field;
	}
	
	function warehouse_transfer_detail_supply_table() {
		$view = 'view_warehouse_request_list';
		$get_field = $this->ecc_library->get_field($view);
		
		$get_field['r1']['hidden'] = true;
		$get_field['r2']['hidden'] = true;
		
		return $get_field;
	}
	
	function warehouse_transfer_item_table() {
		$view = 'view_stock_move_item_warehouse_transfer';
		$get_field = $this->ecc_library->get_field($view);
		$get_field['r1']['hidden'] = true;
		$get_field['r12']['hidden'] = true;
		
		$get_field['r6']['footer'] = 'Total Stock :';
		$get_field['r7']['footer'] = 'sum';
		// $get_field['r1']['width'] = 450;
		
		return $get_field;
	}
	//INI BELUM YA
	function warehouse_supply_item_table() {
		$view = 'view_stock_move_supply_warehouse_transfer';
		$get_field = $this->ecc_library->get_field($view);
		$get_field['r1']['hidden'] = true;
		$get_field['r7']['hidden'] = true;
		$get_field['r12']['hidden'] = true;
		$get_field['r13']['hidden'] = true;
		$get_field['r14']['hidden'] = true;
		
		return $get_field;
	}
	
	function index(){
		$this->load->model('main');
		$component['loadlayout'] = true;
		$component['view_load'] = 'warehouse_transfer/view';
		$component['view_load_form'] = 'warehouse_transfer/form';
		$component['load_js'][] = 'warehouse_transfer/view';
		$component['load_js'][] = 'warehouse_transfer/form';
		
		$component['page_title'] = "Warehouse Transfer";
		
		$dashboard_table = array();
		
		$nav_button = array();
		$nav_button[] = array('method_id' => 50036,'title' => 'Add', 'icon' => 'fa fa-plus', 'load' => 'warehouse_transfer/function_add');
		$nav_button[] = array('method_id' => 50037,'title' => 'Edit', 'icon' => 'fa fa-pencil', 'load' => 'warehouse_transfer/function_edit');
		$nav_button[] = array('method_id' => 50044,'title' => 'Supply', 'icon' => 'fa fa-pencil', 'load' => 'warehouse_transfer/function_supply');
		$nav_button[] = array('method_id' => 50040,'title' => 'Approve', 'icon' => 'fa fa-pencil', 'load' => 'warehouse_transfer/function_approve');
		$nav_button[] = array('method_id' => 50039,'title' => 'Delete', 'icon' => 'fa fa-trash-o', 'load' => 'warehouse_transfer/function_delete');
		$nav_button[] = array('method_id' => 50050,'title' => 'Cancel Approve', 'icon' => 'fa fa-cross', 'load' => 'warehouse_transfer/function_cancel_approve');
		$nav_button[] = array('method_id' => 50048,'title' => 'Print PPB KB', 'icon' => 'fa fa-print', 'load' => 'warehouse_transfer/function_print_request');
		
		$field = $this->warehouse_transfer_table();
		$field_detail = $this->warehouse_transfer_detail_table();
		$field_detail_supply = $this->warehouse_transfer_detail_supply_table();
		$field_transfer_item = $this->warehouse_transfer_item_table();
		$field_supply_item = $this->warehouse_supply_item_table();
		
		$dashboard_table['nav_button'] = $nav_button;
		$dashboard_table['field'] = $field;
		$dashboard_table['field_detail'] = $field_detail;
		$dashboard_table['field_detail_supply'] = $field_detail_supply;
		$dashboard_table['field_detail_loaddata'] = 'loaddata_detail';
		$dashboard_table['field_detail_supply_loaddata'] = 'loaddata_detail';
		$dashboard_table['field_transfer_item'] = $field_transfer_item;
		$dashboard_table['field_transfer_item_loaddata'] = 'loaddata_transfer_item';
		$dashboard_table['field_supply_item'] = $field_supply_item;
		$dashboard_table['field_supply_item_loaddata'] = 'loaddata_supply_item';
		
		$component['dashboard_table'] = $dashboard_table;
		
		$this->authentication->ajaxlayout($component);
	}
	
	function loaddata() {
		$this->authentication->plainlayout();
		
		$view = 'view_warehouse_transfer';
		$field = $this->warehouse_transfer_table();
		
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";
 
		$loaddata = $this->ecc_library->get_field_data($view,$field);
			
		echo $loaddata;
	}
	
	function delete(){
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
				
		$warehouse_transfer_id = isset($_POST['warehouse_transfer_id']) ? $_POST['warehouse_transfer_id'] : false;
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			
			if($warehouse_transfer_id){
				$this->rpc_service->setSP("dbo.sp_warehouse_transfer_delete");
				$this->rpc_service->addField('warehouse_transfer_id',$warehouse_transfer_id);
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
	
	function approve(){
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
				
		$warehouse_transfer_id = isset($_POST['warehouse_transfer_id']) ? $_POST['warehouse_transfer_id'] : false;
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			
			if($warehouse_transfer_id){
				$this->rpc_service->setSP("dbo.sp_warehouse_transfer_approve");
				$this->rpc_service->addField('warehouse_transfer_id',$warehouse_transfer_id);
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
				
		$warehouse_transfer_id = isset($_POST['warehouse_transfer_id']) ? $_POST['warehouse_transfer_id'] : false;
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			
			if($warehouse_transfer_id){
				$this->rpc_service->setSP("dbo.sp_warehouse_transfer_cancel_approve");
				$this->rpc_service->addField('warehouse_transfer_id',$warehouse_transfer_id);
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
								
		$warehouse_transfer_id = isset($_POST['warehouse_transfer_id']) ? $_POST['warehouse_transfer_id'] : '';
		$warehouse_transfer_no = isset($_POST['warehouse_transfer_no']) ? $_POST['warehouse_transfer_no'] : '';
		$warehouse_transfer_date = isset($_POST['warehouse_transfer_date']) ? $_POST['warehouse_transfer_date'] : '';
		$nomor_izin = isset($_POST['nomor_izin']) ? $_POST['nomor_izin'] : '';
		$lokasi = isset($_POST['lokasi']) ? $_POST['lokasi'] : '';
		$nomor_agenda_persetujuan = isset($_POST['nomor_agenda_persetujuan']) ? $_POST['nomor_agenda_persetujuan'] : '';
		$tanggal_persetujuan = isset($_POST['tanggal_persetujuan']) ? $_POST['tanggal_persetujuan'] : '';
		$penanggung_jawab = isset($_POST['penanggung_jawab']) ? $_POST['penanggung_jawab'] : '';
		$jabatan = isset($_POST['jabatan']) ? $_POST['jabatan'] : '';
		$kota = isset($_POST['kota']) ? $_POST['kota'] : '';
		$tanggal_ttd = isset($_POST['tanggal_ttd']) ? $_POST['tanggal_ttd'] : '';
		$nama_pejabat_bc = isset($_POST['nama_pejabat_bc']) ? $_POST['nama_pejabat_bc'] : '';
		$tanggal_selesai = isset($_POST['tanggal_selesai']) ? $_POST['tanggal_selesai'] : '';
		$jam_selesai = isset($_POST['jam_selesai']) ? $_POST['jam_selesai'] : '';
		$nama_petugas = isset($_POST['nama_petugas']) ? $_POST['nama_petugas'] : '';
		$request_id = isset($_POST['request_id']) ? $_POST['request_id'] : '';
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			if($warehouse_transfer_id){
				$this->rpc_service->setSP("dbo.sp_warehouse_transfer_edit");
				$this->rpc_service->addField('warehouse_transfer_id',$warehouse_transfer_id);
			} else {
				$this->rpc_service->setSP("dbo.sp_warehouse_transfer_add");
			}
			
			$this->rpc_service->addField('warehouse_transfer_no',$warehouse_transfer_no);
			$this->rpc_service->addField('warehouse_transfer_date',$warehouse_transfer_date);
			$this->rpc_service->addField('nomor_izin',$nomor_izin);
			$this->rpc_service->addField('lokasi',$lokasi);
			$this->rpc_service->addField('nomor_agenda_persetujuan',$nomor_agenda_persetujuan);
			$this->rpc_service->addField('tanggal_persetujuan',$tanggal_persetujuan);
			$this->rpc_service->addField('penanggung_jawab',$penanggung_jawab);
			$this->rpc_service->addField('jabatan',$jabatan);
			$this->rpc_service->addField('kota',$kota);
			$this->rpc_service->addField('tanggal_ttd',$tanggal_ttd);
			$this->rpc_service->addField('nama_pejabat_bc',$nama_pejabat_bc);
			$this->rpc_service->addField('tanggal_selesai',$tanggal_selesai);
			$this->rpc_service->addField('jam_selesai',$jam_selesai);
			$this->rpc_service->addField('nama_petugas',$nama_petugas);
			$this->rpc_service->addField('request_id',$request_id);
			
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
	
	function loaddata_detail(){
		$this->authentication->plainlayout();
		
		$request_id = isset($_REQUEST['request_id']) ? is_numeric($_REQUEST['request_id']) ? $_REQUEST['request_id']  : -1 : -1;
		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;
		
		$view = 'view_warehouse_request_list';
		$field = $this->warehouse_transfer_detail_table();
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";
		
		$extra_param = array();
		$extra_param['where']['0']['field'] = 'r2';
		$extra_param['where']['0']['data'] = $request_id;
		$extra_param['methodid'] = $methodid;
		
		$loaddata = $this->ecc_library->get_field_data($view,$field,$extra_param);
			
		echo $loaddata;
	}
	
	function loaddata_transfer_item(){
		$this->authentication->plainlayout();
		
		$request_list_id = isset($_REQUEST['request_list_id']) ? is_numeric($_REQUEST['request_list_id']) ? $_REQUEST['request_list_id']  : -1 : -1;
		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;
		
		$view = 'view_stock_move_item_warehouse_transfer';
		$field = $this->warehouse_transfer_item_table();
		
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";
		
		$extra_param = array();
		$extra_param['where']['0']['field'] = 'r12';
		$extra_param['where']['0']['data'] = $request_list_id;
		$extra_param['methodid'] = $methodid;
	
		
		$loaddata = $this->ecc_library->get_field_data($view,$field,$extra_param);
			
		echo $loaddata;
	}
	
	function loaddata_supply_item(){
		$this->authentication->plainlayout();
		
		$request_list_id = isset($_REQUEST['request_list_id']) ? is_numeric($_REQUEST['request_list_id']) ? $_REQUEST['request_list_id']  : -1 : -1;
		$warehouse_transfer_id = isset($_REQUEST['warehouse_transfer_id']) ? is_numeric($_REQUEST['warehouse_transfer_id']) ? $_REQUEST['warehouse_transfer_id']  : -1 : -1;
		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;
		
		$view = 'view_stock_move_supply_warehouse_transfer';
		$field = $this->warehouse_supply_item_table();
		
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";
		
		$extra_param = array();
		$extra_param['where']['0']['field'] = 'r12';
		$extra_param['where']['0']['data'] = $request_list_id;
		$extra_param['where']['1']['field'] = 'r14';
		$extra_param['where']['1']['data'] = $warehouse_transfer_id;
		$extra_param['methodid'] = $methodid;
		
		$loaddata = $this->ecc_library->get_field_data($view,$field,$extra_param);
			
		echo $loaddata;
	}
	
	function post_add_edit_detail(){
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
		
		$stock_move_id = isset($_POST['stock_move_id']) ? $_POST['stock_move_id'] : false;
		$request_list_id = isset($_POST['request_list_id']) ? $_POST['request_list_id'] : 0;
		$warehouse_transfer_detail_id = isset($_POST['warehouse_transfer_detail_id']) ? $_POST['warehouse_transfer_detail_id'] : '';
		$quantity_supply = isset($_POST['quantity_supply']) ? $_POST['quantity_supply'] : 0;
		$warehouse_transfer_id = isset($_POST['warehouse_transfer_id']) ? $_POST['warehouse_transfer_id'] : 0;
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			if($warehouse_transfer_detail_id){
				$this->rpc_service->setSP("dbo.sp_warehouse_transfer_supply_edit");
				$this->rpc_service->addField('warehouse_transfer_detail_id',$warehouse_transfer_detail_id);
			} else {
				$this->rpc_service->setSP("dbo.sp_warehouse_transfer_supply_add");
			}
			
			$this->rpc_service->addField('warehouse_transfer_id',$warehouse_transfer_id);
			$this->rpc_service->addField('request_list_id',$request_list_id);
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
				
		$warehouse_transfer_id = isset($_POST['warehouse_transfer_id']) ? $_POST['warehouse_transfer_id'] : false;
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			
			if($warehouse_transfer_id){
				$this->rpc_service->setSP("dbo.sp_warehouse_transfer_supply_fifo");
				$this->rpc_service->addField('warehouse_transfer_id',$warehouse_transfer_id);
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
				
		$warehouse_transfer_id = isset($_POST['warehouse_transfer_id']) ? $_POST['warehouse_transfer_id'] : false;
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			
			if($warehouse_transfer_id){
				$this->rpc_service->setSP("dbo.sp_warehouse_transfer_supply_lifo");
				$this->rpc_service->addField('warehouse_transfer_id',$warehouse_transfer_id);
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
   
   function print_request() {
      
      $warehouse_transfer_id = isset($_POST['warehouse_transfer_id']) ? $_POST['warehouse_transfer_id'] : false;
      $format = isset($_POST['format']) ? $_POST['format'] : 'pdf';
      $user_id = $this->session->userdata('user_id');
      
      $sp = "dbo.sp_rpt_ppbkb";
 
      $this->rpc_service_portal->setSP(array("sp"=>$sp,"mode"=>"2","debug"=>"1"));
      $this->rpc_service_portal->addField('warehouse_transfer_id',$warehouse_transfer_id);
      $this->rpc_service_portal->addField('format',$format);
      $this->rpc_service_portal->addField('temp_folder',sys_get_temp_dir());
      $this->rpc_service_portal->addField('sort','ID');  
      
      $result = $this->rpc_service_portal->resultPrint2();
      echo json_encode($result);
	}
	
	function cancel_supply(){
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
		
		$stock_move_id = isset($_POST['stock_move_id']) ? $_POST['stock_move_id'] : false;
		$quantity_supply = isset($_POST['quantity_supply']) ? $_POST['quantity_supply'] : 0;
		$warehouse_transfer_id = isset($_POST['warehouse_transfer_id']) ? $_POST['warehouse_transfer_id'] : 0;
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			$this->rpc_service->setSP("dbo.sp_warehouse_transfer_cancel_supply");
			
			
			$this->rpc_service->addField('warehouse_transfer_id',$warehouse_transfer_id);
			
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
   
}
?>