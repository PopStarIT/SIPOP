<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class fabric_transfer extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->data_request = $_REQUEST;

		$module = $this->router->module;
		$directory = $this->router->directory;
		$class = $this->router->class;
		$method = $this->router->method;
		$directory = trim(str_replace('../modules/' . $module, '', str_replace('/controllers/', '', $directory)), '/');

		$this->module = $module;
		if (trim($directory) != '') {
			$this->directory = $directory;
		} else {
			$this->directory = '0';
			$this->directory2 = '';
		}
		$this->class = $class;
		$this->method = $method;
	}

	function fabric_transfer_table()
	{
		$view = 'view_fabric_transfer';
		$get_field = $this->ecc_library->get_field_pop($view);

		$get_field['r1']['hidden'] = true;
		$get_field['r13']['hidden'] = true;

		return $get_field;
	}

	function fabric_transfer_detail_table()
	{
		$view = 'view_work_order_request_list';
		$get_field = $this->ecc_library->get_field($view);
		//$view = 'view_fabric_transfer_detail';
		//$get_field = $this->ecc_library->get_field_pop($view);

		$get_field['r1']['hidden'] = true;
		$get_field['r2']['hidden'] = true;

		return $get_field;
	}

	function fabric_transfer_detail_supply_table()
	{
		//$view = 'view_work_order_request_list';
		//$get_field = $this->ecc_library->get_field($view);
		$view = 'view_fabric_transfer_detail';
		$get_field = $this->ecc_library->get_field_pop($view);

		$get_field['r1']['hidden'] = true;
		$get_field['r2']['hidden'] = true;
		$get_field['r3']['hidden'] = true;
		$get_field['r4']['hidden'] = true;
		//$get_field['r5']['hidden'] = true;
		//$get_field['r6']['hidden'] = true;

		$get_field['r5']['title'] = 'Item Code';
		$get_field['r6']['title'] = 'Item Name';

		$get_field['act']['sc'] = 'act';
		$get_field['act']['title'] = 'ACTION';
		$get_field['act']['bypassvalue'] = '';
		$get_field['act']['ctype'] = 'text';
		$get_field['act']['align'] = 'center';
		$get_field['act']['search'] = false;
		$get_field['act']['sortable'] = false;
		$get_field['act']['formatter'] = 'formatOperations_fabric_supply';
		$get_field['act']['width'] = 300;

		return $get_field;
	}

	function fabric_supply_item_table()
	{
		$view = 'view_stock_move_supply_transfer';
		$get_field = $this->ecc_library->get_field($view);

		//$view = 'view_stock_move_supply_transfer_ecc';
		//$get_field = $this->ecc_library->get_field_pop($view);
		$get_field['r1']['hidden'] = true;
		//$get_field['r8']['hidden'] = true;
		$get_field['r7']['hidden'] = true;
		$get_field['r12']['hidden'] = true;
		$get_field['r13']['hidden'] = true;
		$get_field['r14']['hidden'] = true;

		return $get_field;
	}
	
	function work_order_supply_item_table() {
		$view = 'view_stock_move_supply_transfer';
		$get_field = $this->ecc_library->get_field($view);
		
		//$view = 'view_stock_move_supply_transfer_ecc';
		//$get_field = $this->ecc_library->get_field_pop($view);
		$get_field['r1']['hidden'] = true;
		//$get_field['r8']['hidden'] = true;
		$get_field['r7']['hidden'] = true;
		$get_field['r12']['hidden'] = true;
		$get_field['r13']['hidden'] = true;
		$get_field['r14']['hidden'] = true;
		
		return $get_field;
	}


	function index()
	{
		$this->load->model('main');
		$component['loadlayout'] = true;
		$component['view_load'] = 'fabric_transfer/view';
		$component['view_load_form'] = 'fabric_transfer/form';
		$component['load_js'][] = 'fabric_transfer/view';
		$component['load_js'][] = 'fabric_transfer/form';

		$component['page_title'] = "Fabric Warehouse Receive";

		$dashboard_table = array();

		$nav_button = array();
		//$nav_button[] = array('method_id' => 221,'title' => 'Add', 'icon' => 'fa fa-plus', 'load' => 'general/good_receive/function_add');
		//$nav_button[] = array('method_id' => 221,'title' => 'Add','btn'=>'btn-success', 'icon' => 'fa fa-plus', 'load' => 'fabric_receive/function_add');
		// $nav_button[] = array('method_id' => 781148, 'title' => 'Add', 'btn' => 'btn-success', 'icon' => 'fa fa-plus', 'load' => 'fabric_receive/function_add');
		$nav_button[] = array('method_id' => 7811377, 'title' => 'Add', 'btn' => 'btn-success', 'icon' => 'fa fa-plus', 'load' => 'fabric_transfer/function_add');
		$nav_button[] = array('method_id' => 7811378, 'title' => 'Edit', 'btn' => 'btn-warning', 'icon' => 'fa fa-pencil', 'load' => 'fabric_transfer/function_edit');
		$nav_button[] = array('method_id' => 7811386, 'title' => 'Supply', 'btn' => 'btn-primary', 'icon' => 'fa fa-pencil', 'load' => 'fabric_transfer/function_supply');
		$nav_button[] = array('method_id' => 7811383, 'title' => 'Approve', 'btn' => 'btn-info', 'icon' => 'fa fa-thumbs-up', 'load' => 'fabric_transfer/function_approve');
		$nav_button[] = array('method_id' => 7811379, 'title' => 'Delete', 'btn' => 'btn-danger', 'icon' => 'fa fa-trash-o', 'load' => 'fabric_transfer/function_delete');

		//$nav_button[] = array('method_id' => 7811189, 'title' => 'Add From Shipment', 'btn' => 'btn-success', 'icon' => 'fa fa-plus', 'load' => 'fabric_receive/function_add_from_shipment');



		//$nav_button[] = array('method_id' => 781155, 'title' => 'Cancel Approve', 'btn' => 'btn-danger', 'icon' => 'fa fa-thumbs-down', 'load' => 'fabric_receive/function_cancel_approve');


		$field = $this->fabric_transfer_table();
		$field_detail = $this->fabric_transfer_detail_table();
		$field_detail_supply = $this->fabric_transfer_detail_supply_table();
		$field_detail_transfer_item = $this->work_order_supply_item_table();

		$dashboard_table['nav_button'] = $nav_button;
		$dashboard_table['field'] = $field;
		$dashboard_table['field_detail'] = $field_detail;
		$dashboard_table['field_detail_loaddata'] = 'loaddata_detail';
		$dashboard_table['field_detail_supply'] = $field_detail_supply;
		$dashboard_table['field_detail_supply_loaddata'] = 'loaddata_supply_item';
		$dashboard_table['field_transfer_supply'] = $field_detail_transfer_item;
		$dashboard_table['field_transfer_supply_loaddata'] = 'loaddata_transfer_supply';

		$component['dashboard_table'] = $dashboard_table;

		$this->authentication->ajaxlayout($component);
	}


	function loaddata()
	{
		$this->authentication->plainlayout();

		$view = 'view_fabric_transfer';
		$field = $this->fabric_transfer_table();

		//$view = 'view_fabric_warehouse_receive';
		//$field = $this->receive_table();

		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";

		$loaddata = $this->ecc_library->get_field_data_pop($view, $field);

		echo $loaddata;
	}

	function loaddata_detail()
	{
		$this->authentication->plainlayout();

		$work_order_request_id = isset($_REQUEST['work_order_request_id']) ? is_numeric($_REQUEST['work_order_request_id']) ? $_REQUEST['work_order_request_id']  : -1 : -1;
		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;

		$view = 'view_work_order_request_list';
		//$view = 'view_fabric_transfer_detail';
		$field = $this->fabric_transfer_detail_table();
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";

		$extra_param = array();
		$extra_param['where']['0']['field'] = 'r2';
		//$extra_param['where']['0']['field'] = 'r4';
		$extra_param['where']['0']['data'] = $work_order_request_id;
		$extra_param['methodid'] = $methodid;

		$loaddata = $this->ecc_library->get_field_data($view, $field, $extra_param);

		echo $loaddata;
	}

	function loaddata_supply_item()
	{
		$this->authentication->plainlayout();
		$work_order_request_id = isset($_REQUEST['work_order_request_id']) ? is_numeric($_REQUEST['work_order_request_id']) ? $_REQUEST['work_order_request_id']  : -1 : -1;
		//$work_order_request_list_id = isset($_REQUEST['work_order_request_list_id']) ? is_numeric($_REQUEST['work_order_request_list_id']) ? $_REQUEST['work_order_request_list_id']  : -1 : -1;
		//$work_order_transfer_id = isset($_REQUEST['work_order_transfer_id']) ? is_numeric($_REQUEST['work_order_transfer_id']) ? $_REQUEST['work_order_transfer_id']  : -1 : -1;
		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;

		$view = 'view_fabric_transfer_detail';
		$field = $this->fabric_transfer_detail_supply_table();

		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";

		$extra_param = array();
		$extra_param['where']['0']['field'] = 'r4';
		$extra_param['where']['0']['data'] = $work_order_request_id;
		//$extra_param['where']['0']['field'] = 'r2';
		//$extra_param['where']['0']['data'] = $work_order_request_list_id;
		//$extra_param['where']['1']['field'] = 'r1';
		//$extra_param['where']['1']['data'] = $work_order_transfer_id;
		$extra_param['methodid'] = $methodid;

		$loaddata = $this->ecc_library->get_field_data_pop($view, $field, $extra_param);

		echo $loaddata;
	}
	
	function loaddata_transfer_supply()
	{
		$this->authentication->plainlayout();
		
		$work_order_request_list_id = isset($_REQUEST['work_order_request_list_id']) ? is_numeric($_REQUEST['work_order_request_list_id']) ? $_REQUEST['work_order_request_list_id']  : -1 : -1;
		$work_order_transfer_id = isset($_REQUEST['work_order_transfer_id']) ? is_numeric($_REQUEST['work_order_transfer_id']) ? $_REQUEST['work_order_transfer_id']  : -1 : -1;
		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;
		//var_dump('ok');die();
		$view = 'view_stock_move_supply_transfer';
		//$view = 'view_stock_move_supply_transfer_ecc';
		$field = $this->work_order_supply_item_table();
		
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";
		
		$extra_param = array();
		$extra_param['where']['0']['field'] = 'r12';
		//$extra_param['where']['0']['field'] = 'r13';
		$extra_param['where']['0']['data'] = $work_order_request_list_id;
		$extra_param['where']['1']['field'] = 'r14';
		//$extra_param['where']['1']['field'] = 'r15';
		$extra_param['where']['1']['data'] = $work_order_transfer_id;
		$extra_param['methodid'] = $methodid;
		
		//$loaddata = $this->ecc_library->get_field_data($view,$field,$extra_param);
		$loaddata = $this->ecc_library->get_field_data($view,$field,$extra_param);
			
		echo $loaddata;
	}

	function loaddata_supply_item_old()
	{
		$this->authentication->plainlayout();

		$work_order_request_list_id = isset($_REQUEST['work_order_request_list_id']) ? is_numeric($_REQUEST['work_order_request_list_id']) ? $_REQUEST['work_order_request_list_id']  : -1 : -1;
		$work_order_transfer_id = isset($_REQUEST['work_order_transfer_id']) ? is_numeric($_REQUEST['work_order_transfer_id']) ? $_REQUEST['work_order_transfer_id']  : -1 : -1;
		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;
		//var_dump('ok');die();
		$view = 'view_stock_move_supply_transfer';
		//$view = 'view_stock_move_supply_transfer_ecc';
		$field = $this->fabric_supply_item_table();

		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";

		$extra_param = array();
		$extra_param['where']['0']['field'] = 'r12';
		//$extra_param['where']['0']['field'] = 'r13';
		$extra_param['where']['0']['data'] = $work_order_request_list_id;
		$extra_param['where']['1']['field'] = 'r14';
		//$extra_param['where']['1']['field'] = 'r15';
		$extra_param['where']['1']['data'] = $work_order_transfer_id;
		$extra_param['methodid'] = $methodid;

		//$loaddata = $this->ecc_library->get_field_data($view,$field,$extra_param);
		$loaddata = $this->ecc_library->get_field_data($view, $field, $extra_param);

		echo $loaddata;
	}

	function approve()
	{
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();

		$fabric_warehouse_receive_id = isset($_POST['fabric_warehouse_receive_id']) ? $_POST['fabric_warehouse_receive_id'] : false;

		$user_id = $this->session->userdata('user_id');

		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";

		if (count($_POST) > 0) {

			if ($fabric_warehouse_receive_id) {
				$this->rpc_service->setSP("dbo.sp_fabric_receive_approve");
				$this->rpc_service->addField('fabric_warehouse_receive_id', $fabric_warehouse_receive_id);
			}

			$result = $this->rpc_service->resultJSON_pop();
			// print_r($result);

			$data = array();
			if (isset($result)) {
				if (isset($result['valid'])) {
					if ($result['valid']) {
						if (isset($result['data'])) {
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

	function cancel_approve()
	{
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();

		$fabric_warehouse_receive_id = isset($_POST['fabric_warehouse_receive_id']) ? $_POST['fabric_warehouse_receive_id'] : false;

		$user_id = $this->session->userdata('user_id');

		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";

		if (count($_POST) > 0) {

			if ($fabric_warehouse_receive_id) {
				$this->rpc_service->setSP("dbo.sp_fabric_receive_cancel_approve");
				$this->rpc_service->addField('fabric_warehouse_receive_id', $fabric_warehouse_receive_id);
			}

			$result = $this->rpc_service->resultJSON_pop();
			// print_r($result);

			$data = array();
			if (isset($result)) {
				if (isset($result['valid'])) {
					if ($result['valid']) {
						if (isset($result['data'])) {
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

	function delete()
	{
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();

		$fabric_receive_id = isset($_POST['fabric_receive_id']) ? $_POST['fabric_receive_id'] : false;

		$user_id = $this->session->userdata('user_id');

		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";

		if (count($_POST) > 0) {

			if ($fabric_receive_id) {
				$this->rpc_service->setSP("dbo.sp_fabric_receive_delete");
				$this->rpc_service->addField('fabric_warehouse_receive_id', $fabric_receive_id);
			}

			$result = $this->rpc_service->resultJSON_pop();
			// print_r($result);

			$data = array();
			if (isset($result)) {
				if (isset($result['valid'])) {
					if ($result['valid']) {
						if (isset($result['data'])) {
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


	function post_add_edit()
	{
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();

		$fabric_transfer_id = isset($_POST['fabric_transfer_id']) ? $_POST['fabric_transfer_id'] : '';
		$fabric_transfer_no = isset($_POST['fabric_transfer_no']) ? $_POST['fabric_transfer_no'] : '';
		$fabric_transfer_date = isset($_POST['fabric_transfer_date']) ? $_POST['fabric_transfer_date'] : '';
		$fabric_request_id = isset($_POST['fabric_request_id']) ? $_POST['fabric_request_id'] : '';
		$fabric_transfer_keterangan = isset($_POST['fabric_transfer_edit']) ? $_POST['fabric_transfer_edit'] : '';

		$user_id = $this->session->userdata('user_id');

		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";

		if (count($_POST) > 0) {
			if ($fabric_transfer_id) {
				$this->rpc_service->setSP("dbo.sp_fabric_transfer_edit");
				$this->rpc_service->addField('fabric_transfer_id', $fabric_transfer_id);
			} else {
				$this->rpc_service->setSP("dbo.sp_fabric_transfer_add");
			}

			$this->rpc_service->addField('fabric_transfer_no', $fabric_transfer_no);
			$this->rpc_service->addField('fabric_transfer_date', $fabric_transfer_date);
			$this->rpc_service->addField('fabric_request_id', $fabric_request_id);

			$result = $this->rpc_service->resultJSON_pop();

			$data = array();
			if (isset($result)) {
				if (isset($result['valid'])) {
					if ($result['valid']) {
						if (isset($result['data'])) {
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

	function post_add_edit_scan()
	{
		$this->load->model('main');
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();

		$q = isset($_POST['q']) ? $_POST['q'] : 0;
		$code_barcode = isset($_POST['code_barcode']) ? $_POST['code_barcode'] : '';
		$fabric_transfer_id = isset($_POST['fabric_transfer_id']) ? $_POST['fabric_transfer_id'] : '';
		$work_order_request_id = isset($_POST['work_order_request_id']) ? $_POST['work_order_request_id'] : '';

		if ($code_barcode) {
			$this->rpc_service->setSP("dbo.sp_scan_fabric_transfer_add");

			$this->rpc_service->addField('code_barcode', $code_barcode);
			$this->rpc_service->addField('fabric_transfer_id', $fabric_transfer_id);
			$this->rpc_service->addField('work_order_request_id', $work_order_request_id);
			$result = $this->rpc_service->resultJSON_pop();
			//var_dump($result['valid']);die();
			$data = array();
			if (isset($result)) {
				//var_dump($result);
				if (isset($result['valid'])) {
					if ($result['valid']) {
						if (isset($result['data'])) {
							$return['valid'] = $result['valid'];
							$return['status_code'] = $result['no'];
							$return['message'] = $result['des'];
						}
					} else {
						$return['valid'] = $result['valid'];
						$return['status_code'] = $result['no'];
						$return['message'] = $result['des'];
					}
				}
			}
		} else {
			$return['valid'] = false;
			$return['message'] = "Failed, Bode_barcode is Null ";
		}
		echo json_encode($return);
	}

	function post_add_edit_detail()
	{
		$this->load->model('main');
		$this->load->library('Excel');
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();

		$fabric_shipment_detail_id = isset($_POST['fabric_shipment_detail_id']) ? $_POST['fabric_shipment_detail_id'] : 0;
		$fabric_shipment_id = isset($_POST['fabric_shipment_id']) ? $_POST['fabric_shipment_id'] : 0;

		$purchase_order_warehouse_id = isset($_POST['purchase_order_warehouse_id']) ? $_POST['purchase_order_warehouse_id'] : 0;
		$item_fabric_id = isset($_POST['item_fabric_id']) ? $_POST['item_fabric_id'] : 0;
		$item_id = isset($_POST['item_id']) ? $_POST['item_id'] : null;
		$fabric_shipment_detail_unit_weight = isset($_POST['fabric_shipment_detail_unit_weight']) ? $_POST['fabric_shipment_detail_unit_weight'] : 0;
		$fabric_shipment_detail_unit_qty = isset($_POST['fabric_shipment_detail_unit_qty']) ? $_POST['fabric_shipment_detail_unit_qty'] : 0;

		$fabric_shipment_detail_invoice_number = isset($_POST['fabric_shipment_detail_invoice_number']) ? $_POST['fabric_shipment_detail_invoice_number'] : '';
		$fabric_shipment_detail_colour = isset($_POST['fabric_shipment_detail_colour']) ? $_POST['fabric_shipment_detail_colour'] : '';
		$fabric_shipment_detail_made_in = isset($_POST['fabric_shipment_detail_made_in']) ? $_POST['fabric_shipment_detail_made_in'] : '';
		$fabric_shipment_detail_note = isset($_POST['fabric_shipment_detail_note']) ? $_POST['fabric_shipment_detail_note'] : '';
		$fabric_shipment_detail_bale = isset($_POST['fabric_shipment_detail_bale']) ? $_POST['fabric_shipment_detail_bale'] : 0;
		//$fabric_file_excel = isset($_POST['fabric_file_excel']) ? $_POST['fabric_file_excel'] : '';
		$file = isset($_FILES['file']) ? $_FILES['file'] : false;

		if ($fabric_shipment_id == 0) {
			$file = false;
		}

		if ($fabric_shipment_detail_id != 0) {
			$file = true;
		}
		//var_dump($fabric_shipment_detail_bale);die();
		// ==== Proses Import excel ==============
		if ($file) {
			if ($fabric_shipment_detail_id != 0) {
				//==update ===
				$data_detail = array(
					'fabric_shipment_id' => $fabric_shipment_id,
					'purchase_order_id' => $purchase_order_warehouse_id,
					'item_fabric_id' => $item_fabric_id,
					'item_id' => $item_id,
					'fabric_shipment_detail_invoice_number' => $fabric_shipment_detail_invoice_number,
					'fabric_shipment_detail_unit_weight' => $fabric_shipment_detail_unit_weight,
					'fabric_shipment_detail_unit_qty' => $fabric_shipment_detail_unit_qty,
					'fabric_shipment_detail_made_in' => $fabric_shipment_detail_made_in,
					'fabric_shipment_detail_note' => $fabric_shipment_detail_note,
					'fabric_shipment_detail_colour' => $fabric_shipment_detail_colour,
					'fabric_shipment_detail_bale' => $fabric_shipment_detail_bale
				);
				$insert = $this->main->update_pop("dbo.dt_fabric_shipment_detail", $data_detail, array('fabric_shipment_detail_id' => $fabric_shipment_detail_id));
				$return['valid'] = true;
				$return['message'] = "Update successfully";
			} else {

				$ekstensi_diperbolehkan	= array('xls', 'xlsx');
				$nama = $_FILES['file']['name'];
				$x = explode('.', $nama);
				$ekstensi = strtolower(end($x));
				$ukuran	= $_FILES['file']['size'];
				$file_tmp = $_FILES['file']['tmp_name'];
				//===cek urannya =========
				if ($ukuran < 1044070) {
					//if($ukuran < 10502){
					$file_name = $file['name'];
					$file_temp = $file['tmp_name'];
					$lok = './assets/upload/shipment_detail/';
					$namaFile = date('His') . '_' . $file_name;
					$location = $lok . $namaFile;
					//----- untuk copy file excel di disable kan dahulu---------
					//move_uploaded_file($file_tmp, $location);
					//------------------------------------------
					if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {

						$data_detail = array(
							'fabric_shipment_id' => $fabric_shipment_id,
							'purchase_order_id' => $purchase_order_warehouse_id,
							'item_fabric_id' => $item_fabric_id,
							'item_id' => $item_id,
							'fabric_shipment_detail_invoice_number' => $fabric_shipment_detail_invoice_number,
							'fabric_shipment_detail_unit_weight' => $fabric_shipment_detail_unit_weight,
							'fabric_shipment_detail_unit_qty' => $fabric_shipment_detail_unit_qty,
							'fabric_shipment_detail_made_in' => $fabric_shipment_detail_made_in,
							'fabric_shipment_detail_note' => $fabric_shipment_detail_note,
							'fabric_shipment_detail_colour' => $fabric_shipment_detail_colour,
							'fabric_shipment_detail_bale' => $fabric_shipment_detail_bale
						);

						$insert = $this->main->insert_pop2("dbo.dt_fabric_shipment_detail", $data_detail);
						//$this->rpc_service->setSP("dbo.sp_purchase_order_detail_edit");
						//$this->rpc_service->addField('purchase_order_detail_id',$purchase_order_detail_id);
						if ($insert['pesan']) {
							$fabric_shipment_detail_id = $insert['id_data'];
							$return['fabric_shipment_detail_id'] = $insert['id_data'];
						}

						$object = PHPExcel_IOFactory::load($file_temp);
						$message_name = '';
						foreach ($object->getWorksheetIterator() as $worksheet) {
							$highestRow = $worksheet->getHighestRow();
							$highestColumn = $worksheet->getHighestColumn();
							for ($row = 3; $row <= $highestRow; $row++) {
								$colour = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
								$lot = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
								$bale = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
								$roll = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
								$weight = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
								$qty = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
								$list_code = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
								$note = $worksheet->getCellByColumnAndRow(7, $row)->getValue();


								$data_arr[] = array(
									'fabric_shipment_id' => $fabric_shipment_id,
									'fabric_shipment_detail_id' => $fabric_shipment_detail_id,
									'fabric_shipment_list_colour' => $colour,
									'fabric_shipment_list_lot' => $lot,
									'fabric_shipment_list_bale' => $bale,
									'fabric_shipment_list_roll' => $roll,
									'fabric_shipment_list_weight' => $weight,
									'fabric_shipment_list_quantity' => $qty,
									'fabric_shipment_list_note' => $note,
									'uom_weight' => $fabric_shipment_detail_unit_weight,
									'uom_qty' => $fabric_shipment_detail_unit_qty,
									'item_id' => $item_id,
									'fabric_shipment_list_code' => $list_code
								);
							}
						}
						//====== proses untuk insert data menggunakan insert_batch
						$hasil = $this->main->insert_batch_pop("dbo.dt_fabric_shipment_list", $data_arr);
						$return['valid'] = true;
						$return['message'] = "Data saved successfully";

						// var_dump($insert['pesan']);
						// var_dump($hasil);

						// $return['message'] = "Error !.. Not saved successfully";

					} else {
						$return['valid'] = false;
						$return['message'] = "File extension does not match (*.xlsx/*.xls)";
					}
				} else {
					$return['valid'] = false;
					$return['message'] = "Size is too big, max 2 mb!";
				}
			}

			// $in_item_central= $this->main->insert_pop2("dbo.dt_mst_item_central",$data_mst_item);
		} else {
			$return['valid'] = false;
			$return['message'] = "The excel import file does not exist Or Not yet input header";
		}
		// ==== Akhir proses Import excel ==============

		//$return['valid'] = false;
		//$return['message'] = "Session expired";

		echo json_encode($return);
	}
}
