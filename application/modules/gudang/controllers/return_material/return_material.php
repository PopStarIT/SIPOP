<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class return_material extends CI_Controller
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

	function return_request_table()
	{
		$view = 'view_fabric_return_request';
		$get_field = $this->ecc_library->get_field_pop($view);
		$get_field['r1']['hidden'] = true;
		$get_field['r3']['hidden'] = true;
		$get_field['r4']['hidden'] = true;
		$get_field['r5']['hidden'] = true;
		$get_field['r6']['hidden'] = true;
		$get_field['r7']['hidden'] = true;
		$get_field['r8']['hidden'] = true;
		$get_field['r9']['hidden'] = true;
		$get_field['r10']['hidden'] = true;
		$get_field['r11']['hidden'] = true;
		$get_field['r14']['hidden'] = true;
		$get_field['r15']['title'] = 'created by';
		$get_field['r16']['hidden'] = true;

		return $get_field;
	}
	function fabric_transfer_detail_table()
	{
		$view = 'view_work_order_plan_fabric_transfer';
		$get_field = $this->ecc_library->get_field_pop($view);
		$get_field['r1']['hidden'] = true;
		$get_field['r5']['hidden'] = true;
		$get_field['r7']['hidden'] = true;
		$get_field['r8']['hidden'] = true;
		$get_field['r9']['hidden'] = true;
		$get_field['r10']['hidden'] = true;
		$get_field['r11']['hidden'] = true;
		$get_field['r12']['hidden'] = true;
		$get_field['r13']['hidden'] = true;
		$get_field['r14']['hidden'] = true;


		return $get_field;
	}

	function fabric_transfer_cek_table()
	{
		$view = 'view_fabric_transfer_cek';
		$get_field = $this->ecc_library->get_field_pop($view);
		$get_field['r1']['hidden'] = true;
		$get_field['r2']['hidden'] = true;
		$get_field['r4']['hidden'] = true;
		$get_field['r6']['hidden'] = true;
		$get_field['r7']['hidden'] = true;
		$get_field['r9']['hidden'] = true;
		$get_field['r11']['hidden'] = true;
		$get_field['r12']['hidden'] = true;
		$get_field['r13']['hidden'] = true;
		$get_field['r14']['hidden'] = true;
		$get_field['r15']['hidden'] = true;
		$get_field['r17']['hidden'] = true;
		$get_field['r19']['hidden'] = true;
		$get_field['r20']['hidden'] = true;
		$get_field['r21']['hidden'] = true;
		$get_field['r22']['hidden'] = true;
		$get_field['r23']['hidden'] = true;
		$get_field['r24']['hidden'] = true;
		$get_field['r26']['hidden'] = true;

		$get_field['r27']['hidden'] = false;
		$get_field['r27']['editable'] = true;
		$get_field['r27']['edittype'] = 'text';



		$get_field['act']['sc'] = 'act';
		$get_field['act']['title'] = 'Action';
		$get_field['act']['bypassvalue'] = '';
		$get_field['act']['ctype'] = 'text';
		$get_field['act']['align'] = 'center';
		$get_field['act']['search'] = false;
		$get_field['act']['sortable'] = false;
		$get_field['act']['formatter'] = 'formatOperationsReturnMaterialDetail';
		return $get_field;
	}

	function fabric_return_table()
	{
		$view = 'view_fabric_return_result';
		$get_field = $this->ecc_library->get_field_pop($view);
		$get_field['r1']['hidden'] = true;
		$get_field['r2']['hidden'] = true;
		$get_field['r4']['hidden'] = true;
		$get_field['r5']['hidden'] = true;
		$get_field['r6']['hidden'] = true;
		$get_field['r7']['hidden'] = true;
		$get_field['r8']['hidden'] = true;
		$get_field['r9']['hidden'] = true;
		$get_field['r10']['hidden'] = true;
		$get_field['r14']['hidden'] = true;
		$get_field['r15']['hidden'] = true;
		$get_field['r16']['hidden'] = true;

		$get_field['act']['sc'] = 'act';
		$get_field['act']['title'] = 'Action';
		$get_field['act']['bypassvalue'] = '';
		$get_field['act']['ctype'] = 'text';
		$get_field['act']['align'] = 'center';
		$get_field['act']['search'] = false;
		$get_field['act']['sortable'] = false;
		$get_field['act']['formatter'] = 'formatOperations_return_barcode';


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
		$get_field['r10']['hidden'] = true;
		//$get_field['r5']['hidden'] = true;
		//$get_field['r6']['hidden'] = true;

		$get_field['r5']['title'] = 'Item Code ';
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
	function fabric_transfer_detail_supply_table_cek()
	{
		$view = 'view_fabric_transfer_cek';
		$get_field = $this->ecc_library->get_field_pop($view);
		$get_field['r1']['hidden'] = true;
		$get_field['r2']['hidden'] = true;
		$get_field['r4']['hidden'] = true;
		$get_field['r6']['hidden'] = true;
		$get_field['r7']['hidden'] = true;
		$get_field['r9']['hidden'] = true;
		$get_field['r11']['hidden'] = true;
		$get_field['r12']['hidden'] = true;
		$get_field['r13']['hidden'] = true;
		$get_field['r14']['hidden'] = true;
		$get_field['r15']['hidden'] = true;
		$get_field['r17']['hidden'] = true;
		$get_field['r19']['hidden'] = true;
		$get_field['r20']['hidden'] = true;
		$get_field['r21']['hidden'] = true;
		$get_field['r22']['hidden'] = true;
		$get_field['r23']['hidden'] = true;
		$get_field['r24']['hidden'] = true;
		$get_field['r26']['hidden'] = true;

		$get_field['r27']['hidden'] = false;
		$get_field['r27']['title'] = 'total return';
		$get_field['r27']['editable'] = true;
		$get_field['r27']['edittype'] = 'text';
		$get_field['r21']['hidden'] = true;
		$get_field['r28']['hidden'] = true;

		$get_field['act']['sc'] = 'act';
		$get_field['act']['title'] = 'Action';
		$get_field['act']['bypassvalue'] = '';
		$get_field['act']['ctype'] = 'text';
		$get_field['act']['align'] = 'center';
		$get_field['act']['search'] = false;
		$get_field['act']['sortable'] = false;
		$get_field['act']['formatter'] = 'formatOperationsReturnMaterialDetail';
		return $get_field;
	}
	function fabric_transfer_detail_supply_table_cek_filtered()
	{
		$view = 'view_fabric_transfer_cek_filtered';
		$get_field = $this->ecc_library->get_field_pop($view);
		$get_field['r1']['hidden'] = true;
		$get_field['r2']['hidden'] = true;
		$get_field['r4']['hidden'] = true;
		$get_field['r6']['hidden'] = true;
		$get_field['r7']['hidden'] = true;
		$get_field['r9']['hidden'] = true;
		$get_field['r11']['hidden'] = true;
		$get_field['r12']['hidden'] = true;
		$get_field['r13']['hidden'] = true;
		$get_field['r14']['hidden'] = true;
		$get_field['r15']['hidden'] = true;
		$get_field['r17']['hidden'] = true;
		$get_field['r19']['hidden'] = true;
		$get_field['r20']['hidden'] = true;
		$get_field['r21']['hidden'] = true;
		$get_field['r22']['hidden'] = true;
		$get_field['r23']['hidden'] = true;
		$get_field['r24']['hidden'] = true;
		$get_field['r26']['hidden'] = true;

		$get_field['r27']['hidden'] = false;
		$get_field['r27']['title'] = 'total return';
		$get_field['r27']['editable'] = true;
		$get_field['r27']['edittype'] = 'text';
		$get_field['r21']['hidden'] = true;
		$get_field['r28']['hidden'] = true;

		$get_field['act']['sc'] = 'act';
		$get_field['act']['title'] = 'Action';
		$get_field['act']['bypassvalue'] = '';
		$get_field['act']['ctype'] = 'text';
		$get_field['act']['align'] = 'center';
		$get_field['act']['search'] = false;
		$get_field['act']['sortable'] = false;
		$get_field['act']['formatter'] = 'formatOperationsReturnMaterialDetail';
		return $get_field;
	}

	function index()
	{
		$this->load->model('main');
		$component['loadlayout'] = true;
		$component['view_load'] = 'return_material/view';
		$component['view_load_form'] = 'return_material/form';
		$component['load_js'][] = 'return_material/view';
		$component['load_js'][] = 'return_material/form';

		$component['page_title'] = "Return Material";

		$dashboard_table = array();

		$nav_button = array();
		//$nav_button[] = array('method_id' => 221,'title' => 'Add', 'icon' => 'fa fa-plus', 'load' => 'general/good_receive/function_add');
		//$nav_button[] = array('method_id' => 221,'title' => 'Add','btn'=>'btn-success', 'icon' => 'fa fa-plus', 'load' => 'fabric_receive/function_add');
		// $nav_button[] = array('method_id' => 781148, 'title' => 'Add', 'btn' => 'btn-success', 'icon' => 'fa fa-plus', 'load' => 'fabric_receive/function_add');
		$nav_button[] = array('method_id' => 7811189, 'title' => 'Add From Transfer', 'btn' => 'btn-success', 'icon' => 'fa fa-plus', 'load' => 'return_material/function_add');
		$nav_button[] = array('method_id' => 7811392, 'title' => 'Edit', 'btn' => 'btn-warning', 'icon' => 'fa fa-pencil', 'load' => 'return_material/function_edit');
		$nav_button[] = array('method_id' => 7811393, 'title' => 'Delete', 'btn' => 'btn-danger', 'icon' => 'fa fa-trash-o', 'load' => 'return_material/function_delete');
		$nav_button[] = array('method_id' => 7811399, 'title' => 'Approve', 'btn' => 'btn-info', 'icon' => 'fa fa-thumbs-up', 'load' => 'return_material/function_approve');
		$nav_button[] = array('method_id' => 78113100, 'title' => 'Cancel Approve', 'btn' => 'btn-danger', 'icon' => 'fa fa-thumbs-down', 'load' => 'return_material/function_cancel_approve');

		$field = $this->return_request_table();
		$field_detail = $this->fabric_transfer_detail_table();
		$field_cek = $this->fabric_transfer_cek_table();
		$field_return = $this->fabric_return_table();
		$field_detail_supply = $this->fabric_transfer_detail_supply_table_cek();

		$field_cek_supply = $this->fabric_transfer_detail_supply_table_cek();



		$dashboard_table['nav_button'] = $nav_button;
		$dashboard_table['field'] = $field;

		$dashboard_table['field_detail_supply'] = $field_detail_supply;
		$dashboard_table['field_detail_supply_loaddata'] = 'loaddata_supply_item';


		$dashboard_table['field_detail'] = $field_detail;
		$dashboard_table['field_detail_loaddata'] = 'loaddata_detail';

		$dashboard_table['field_cek'] = $field_cek;
		$dashboard_table['field_cek_loaddata'] = 'loaddata_cek';

		$dashboard_table['field_cek_supply'] = $field_cek_supply;
		$dashboard_table['field_cek_supply_loaddata'] = 'loaddata_cek_supply';

		$dashboard_table['field_return'] = $field_return;
		$dashboard_table['field_return_loaddata'] = 'loaddata_return';

		$dashboard_table['caption'] = '.:: Return Material Request ::.';

		$component['dashboard_table'] = $dashboard_table;

		$this->authentication->ajaxlayout($component);
	}

	function loaddata_supply_item()
	{
		$this->authentication->plainlayout();
		//$work_order_request_id = isset($_REQUEST['work_order_request_id']) ? is_numeric($_REQUEST['work_order_request_id']) ? $_REQUEST['work_order_request_id']  : -1 : -1;
		$fabric_transfer_id = isset($_REQUEST['fabric_transfer_id']) ? is_numeric($_REQUEST['fabric_transfer_id']) ? $_REQUEST['fabric_transfer_id']  : -1 : -1;

		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;

		$view = 'view_fabric_transfer_detail';
		$field = $this->fabric_transfer_detail_supply_table();

		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";

		$extra_param = array();
		$extra_param['where']['0']['field'] = 'r2';
		$extra_param['where']['0']['data'] = $fabric_transfer_id;
		$extra_param['methodid'] = $methodid;

		$loaddata = $this->ecc_library->get_field_data_pop($view, $field, $extra_param);

		echo $loaddata;
	}

	function loaddata()
	{
		$this->authentication->plainlayout();

		$view = 'view_fabric_return_request';
		$field = $this->return_request_table();

		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";

		$loaddata = $this->ecc_library->get_field_data_pop($view, $field);

		echo $loaddata;
	}

	function loaddata_detail()
	{
		$this->authentication->plainlayout();

		// Ambil data dari request
		$work_order_plan_id = $this->input->get_post('work_order_plan_id');
		$methodid = $this->input->get_post('methodid');

		// Validasi nilai
		if (!$work_order_plan_id || !is_numeric($work_order_plan_id)) {
			$work_order_plan_id = -1;
		}

		$view = 'view_work_order_plan_fabric_transfer';
		$field = $this->fabric_transfer_detail_table();

		$extra_param = array();
		// Pastikan 'r14' adalah alias kolom work_order_plan_id di view_work_order_plan_fabric_transfer
		$extra_param['where']['0']['field'] = 'r14';
		$extra_param['where']['0']['data'] = $work_order_plan_id;
		$extra_param['methodid'] = $methodid;

		$loaddata = $this->ecc_library->get_field_data_pop($view, $field, $extra_param);

		echo $loaddata;
	}
	function loaddata_cek()
	{
		$this->authentication->plainlayout();
		//$work_order_request_id = isset($_REQUEST['work_order_request_id']) ? is_numeric($_REQUEST['work_order_request_id']) ? $_REQUEST['work_order_request_id']  : -1 : -1;
		$fabric_transfer_id = isset($_REQUEST['fabric_transfer_id']) ? is_numeric($_REQUEST['fabric_transfer_id']) ? $_REQUEST['fabric_transfer_id']  : -1 : -1;

		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;

		$view = 'view_fabric_transfer_cek';
		$field = $this->fabric_transfer_cek_table();

		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";

		$extra_param = array();
		$extra_param['where']['0']['field'] = 'r21';
		$extra_param['where']['0']['data'] = $fabric_transfer_id;


		//$extra_param['where']['0']['field'] = 'r4';
		//$extra_param['where']['0']['data'] = $work_order_request_id;

		$extra_param['methodid'] = $methodid;

		$loaddata = $this->ecc_library->get_field_data_pop($view, $field, $extra_param);

		echo $loaddata;
	}

	function loaddata_return()
	{
		$this->authentication->plainlayout();
		//$work_order_request_id = isset($_REQUEST['work_order_request_id']) ? is_numeric($_REQUEST['work_order_request_id']) ? $_REQUEST['work_order_request_id']  : -1 : -1;
		$fabric_transfer_supply_id = isset($_REQUEST['fabric_transfer_supply_id']) ? is_numeric($_REQUEST['fabric_transfer_supply_id']) ? $_REQUEST['fabric_transfer_supply_id']  : -1 : -1;

		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;

		$view = 'view_fabric_return_result';
		$field = $this->fabric_return_table();

		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";

		$extra_param = array();
		$extra_param['where']['0']['field'] = 'r4';
		$extra_param['where']['0']['data'] = $fabric_transfer_supply_id;


		//$extra_param['where']['0']['field'] = 'r4';
		//$extra_param['where']['0']['data'] = $work_order_request_id;

		$extra_param['methodid'] = $methodid;

		$loaddata = $this->ecc_library->get_field_data_pop($view, $field, $extra_param);

		echo $loaddata;
	}







	public function loaddata_cek_supply()
	{
		$this->authentication->plainlayout();

		$code_barcode = isset($_REQUEST['code_barcode']) ? trim($_REQUEST['code_barcode']) : '';
		$fabric_transfer_id = isset($_REQUEST['fabric_transfer_id']) && is_numeric($_REQUEST['fabric_transfer_id']) ? (int) $_REQUEST['fabric_transfer_id'] : -1;
		$methodid = isset($_REQUEST['methodid']) && is_numeric($_REQUEST['methodid']) ? (int) $_REQUEST['methodid'] : -1;

		// TAMBAHKAN: Parameter untuk membedakan load awal vs scan barcode
		$is_barcode_scanned = isset($_REQUEST['is_barcode_scanned']) ? $_REQUEST['is_barcode_scanned'] : 'false';

		// KUNCI: Pilih view dan field berdasarkan kondisi
		if ($is_barcode_scanned === 'true') {
			// Saat scan barcode: gunakan view original (tampilkan semua data termasuk qty_return = 0)
			$view = 'view_fabric_transfer_cek';
			$field = $this->fabric_transfer_detail_supply_table_cek();
		} else {
			// Saat load awal: gunakan view filtered (hanya tampilkan qty_return > 0)
			$view = 'view_fabric_transfer_cek_filtered'; // View baru dengan filter qty_return > 0
			$field = $this->fabric_transfer_detail_supply_table_cek_filtered(); // Field mapping untuk view baru
		}

		$extra_param = array();

		if (empty($code_barcode) && $fabric_transfer_id === -1) {
			$extra_param['where'][0]['field'] = 'r28';
			$extra_param['where'][0]['data'] = 'KOSONGKAN_DATA_AWAL';
		} else {
			// Filter barcode jika ada
			if (!empty($code_barcode)) {
				$extra_param['where'][0]['field'] = 'r28';
				$extra_param['where'][0]['data'] = $code_barcode;
			}

			// Filter fabric_transfer_id jika ada
			if ($fabric_transfer_id !== -1) {
				$extra_param['where'][1]['field'] = 'r21';
				$extra_param['where'][1]['data'] = $fabric_transfer_id;
			}
		}

		if ($methodid !== -1) {
			$extra_param['methodid'] = $methodid;
		}

		$loaddata = $this->ecc_library->get_field_data_pop($view, $field, $extra_param);

		echo $loaddata;
	}



	function approve()
	{
		$this->authentication->plainlayout();
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";

		$work_order_return_id = $this->input->post('work_order_return_id');
		$user_id = $this->session->userdata('user_id');

		if ($work_order_return_id) {
			// Memanggil Service RPC
			$this->rpc_service->setSP("dbo.sp_fabric_return_approve");
			$this->rpc_service->addField('work_order_return_id', $work_order_return_id);
			$this->rpc_service->addField('data_by', $user_id); // Tambahkan user id ke XML

			$result = $this->rpc_service->resultJSON_pop();

			if (isset($result['valid'])) {
				if ($result['valid']) {
					$return['valid'] = true;
					$return['status_code'] = $result['no'];
					$return['message'] = $result['des'];
				} else {
					$return['status_code'] = $result['no'];
					$return['message'] = $result['des'];
				}
			}
		} else {
			$return['message'] = "Data ID tidak ditemukan atau Session expired";
		}

		echo json_encode($return);
	}

	function cancel_approve()
	{
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();

		$work_order_return_id = isset($_POST['work_order_return_id']) ? $_POST['work_order_return_id'] : false;

		$user_id = $this->session->userdata('user_id');

		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";

		if (count($_POST) > 0) {

			if ($work_order_return_id) {
				$this->rpc_service->setSP("dbo.sp_fabric_return_cancel_approve");
				$this->rpc_service->addField('work_order_return_id', $work_order_return_id);
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

		$work_order_return_id = isset($_POST['work_order_return_id']) ? $_POST['work_order_return_id'] : false;

		$user_id = $this->session->userdata('user_id');

		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";

		if (count($_POST) > 0) {

			if ($work_order_return_id) {
				$this->rpc_service->setSP("dbo.sp_return_request_delete");
				$this->rpc_service->addField('work_order_return_id', $work_order_return_id);
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
	function delete_req_return()
	{
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();

		$work_order_return_detail_id = isset($_POST['work_order_return_detail_id']) ? $_POST['work_order_return_detail_id'] : false;

		$user_id = $this->session->userdata('user_id');

		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";

		if (count($_POST) > 0) {

			if ($work_order_return_detail_id) {
				$this->rpc_service->setSP("dbo.sp_return_request_detail_delete");
				$this->rpc_service->addField('work_order_return_detail_id', $work_order_return_detail_id);
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

		$this->load->model('main');
		$this->authentication->plainlayout();
		$return = array();

		$work_order_return_id = isset($_POST['work_order_return_id']) ? $_POST['work_order_return_id'] : '';
		$work_order_return_no = isset($_POST['work_order_return_no']) ? $_POST['work_order_return_no'] : '';
		$work_order_return_date = isset($_POST['work_order_return_date']) ? $_POST['work_order_return_date'] : '';
		$work_order_plan_id = isset($_POST['work_order_plan_id']) ? $_POST['work_order_plan_id'] : '';
		$work_process_id = isset($_POST['work_process_id']) ? $_POST['work_process_id'] : '';

		$user_id = $this->session->userdata('user_id');

		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";

		if (count($_POST) > 0) {
			if ($work_order_return_id) {
				$this->rpc_service->setSP("dbo.sp_fabric_return_request_edit");
				$this->rpc_service->addField('work_order_return_id', $work_order_return_id);
			} else {
				$this->rpc_service->setSP("dbo.sp_fabric_return_request_add");
			}

			$this->rpc_service->addField('work_order_return_no', $work_order_return_no);
			$this->rpc_service->addField('work_order_return_date', $work_order_return_date);
			$this->rpc_service->addField('work_order_plan_id', $work_order_plan_id);
			$this->rpc_service->addField('work_process_id', $work_process_id);

			$result = $this->rpc_service->resultJSON_pop();


			$data = array();
			if (isset($result)) {
				if (isset($result['valid'])) {
					if ($result['valid']) {
						if (isset($result['data'])) {
							$data = json_decode($result['data'], TRUE);
							$work_order_return_id = $data['work_order_return_id'];
							$work_order_return_no = $data['work_order_return_no'];
							$work_order_return_date = $data['work_order_return_date'];
							$work_order_plan_id = $data['work_order_plan_id'];
							$work_process_id = $data['work_process_id'];

							$return['valid'] = $result['valid'];
							$return['status_code'] = $result['no'];
							$return['message'] = $result['des'];
							$return['work_order_return_id'] = $work_order_return_id;
							$return['work_order_return_no'] = $work_order_return_no;
							$return['work_order_return_date'] = $work_order_return_date;
							$return['work_order_plan_id'] = $work_order_plan_id;
							$return['work_process_id'] = $work_process_id;
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
	function post_add_edit_detail()
	{

		$this->load->model('main');
		$this->authentication->plainlayout();
		$return = array();


		$work_order_return_detail_id = isset($_POST['work_order_return_detail_id']) ? $_POST['work_order_return_detail_id'] : '';
		$work_order_return_id = isset($_POST['work_order_return_id']) ? $_POST['work_order_return_id'] : '';
		$return_request = isset($_POST['return_request']) ? $_POST['return_request'] : '';

		$fabric_transfer_supply_id = isset($_POST['fabric_transfer_supply_id']) ? $_POST['fabric_transfer_supply_id'] : '';
		$barcode_return = isset($_POST['barcode_return']) ? $_POST['barcode_return'] : '';


		$user_id = $this->session->userdata('user_id');

		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";

		if (count($_POST) > 0) {
			if ($work_order_return_detail_id) {
				$this->rpc_service->setSP("dbo.sp_fabric_return_request_detail_edit");
				$this->rpc_service->addField('work_order_return_detail_id', $work_order_return_detail_id);
			} else {
				$this->rpc_service->setSP("dbo.sp_fabric_return_request_detail_add");
			}

			$this->rpc_service->addField('work_order_return_id', $work_order_return_id);
			$this->rpc_service->addField('return_request', $return_request);
			$this->rpc_service->addField('fabric_transfer_supply_id', $fabric_transfer_supply_id);
			$this->rpc_service->addField('barcode_return', $barcode_return);


			$result = $this->rpc_service->resultJSON_pop();


			$data = array();
			if (isset($result)) {
				if (isset($result['valid'])) {
					if ($result['valid']) {
						if (isset($result['data'])) {
							$data = json_decode($result['data'], TRUE);
							$work_order_return_detail_id = $data['work_order_return_detail_id'];
							$work_order_return_id = $data['work_order_return_id'];
							$return_request = $data['return_request'];
							$fabric_transfer_supply_id = $data['fabric_transfer_supply_id'];


							$barcode_return = $data['barcode_return'];

							$return['valid'] = $result['valid'];
							$return['status_code'] = $result['no'];
							$return['message'] = $result['des'];
							$return['work_order_return_detail_id'] = $work_order_return_detail_id;
							$return['work_order_return_id'] = $work_order_return_id;
							$return['return_request'] = $return_request;
							$return['fabric_transfer_supply_id'] = $fabric_transfer_supply_id;
							$return['barcode_return'] = $barcode_return;
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

	function cetak_barcode_return()
	{
		$this->db_pop = $this->load->database('pop', TRUE);
		$work_order_return_detail_id = (isset($_GET['work_order_return_detail_id']) && !empty($_GET['work_order_return_detail_id'])) ? $_GET['work_order_return_detail_id'] : die('{"sts":"ERROR","desc":" Param Header Tidak Ditemukan"}');
		$data['work_order_return_detail_id'] = $work_order_return_detail_id;
		// $this->load->view('draft/warehouse/draft_barcode',$data);
		$this->load->view('draft/warehouse/draft_cetak_barcode_return', $data);
	}
}
