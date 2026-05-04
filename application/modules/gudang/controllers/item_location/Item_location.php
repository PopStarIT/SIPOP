<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Item_location extends CI_Controller
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

	function item_location_table()
	{
		$view = 'view_item_location';
		$get_field = $this->ecc_library->get_field_pop($view);

		$get_field['r1']['hidden'] = true;
		$get_field['r12']['hidden'] = true;
		$get_field['r13']['hidden'] = true;
		$get_field['r14']['hidden'] = true;

		$get_field['r2']['title'] = 'code';
		$get_field['r3']['title'] = 'block';
		$get_field['r4']['title'] = 'rack';
		$get_field['r5']['title'] = 'item type';
		$get_field['r6']['title'] = 'item category';
		$get_field['r7']['title'] = 'warehouse';

		$get_field['r4']['align'] = 'center';


		$get_field['r2']['width'] = 200;
		$get_field['act']['sc'] = 'act';

		$get_field['act']['title'] = 'Action';
		$get_field['act']['bypassvalue'] = '';
		$get_field['act']['ctype'] = 'text';
		$get_field['act']['align'] = 'center';
		$get_field['act']['search'] = false;
		$get_field['act']['sortable'] = false;
		$get_field['act']['formatter'] = 'formatOperations_location_barcode';
		return $get_field;
	}


	function index()
	{
		$this->load->model('main');
		$component['loadlayout'] = true;
		$component['view_load'] = 'item_location/view';
		$component['view_load_form'] = 'item_location/form';
		$component['load_js'][] = 'item_location/view';
		$component['load_js'][] = 'item_location/form';

		$component['page_title'] = "Item Location";

		$dashboard_table = array();

		$nav_button = array();

		$nav_button[] = array('method_id' => 7811423, 'title' => 'Add', 'btn' => 'btn-success', 'icon' => 'fa fa-plus', 'load' => 'item_location/function_add');
		$nav_button[] = array('method_id' => 7811424, 'title' => 'Edit', 'btn' => 'btn-warning', 'icon' => 'fa fa-pencil', 'load' => 'item_location/function_edit');
		$nav_button[] = array('method_id' => 7811425, 'title' => 'Delete', 'btn' => 'btn-danger', 'icon' => 'fa fa-trash-o', 'load' => 'item_location/function_delete');

		$field = $this->item_location_table();

		$dashboard_table['nav_button'] = $nav_button;
		$dashboard_table['field'] = $field;
		$dashboard_table['field_loaddata'] = 'loaddata';

		$component['dashboard_table'] = $dashboard_table;

		$this->authentication->ajaxlayout($component);
	}

	function loaddata()
	{
		$this->authentication->plainlayout();
		//$work_order_request_id = isset($_REQUEST['work_order_request_id']) ? is_numeric($_REQUEST['work_order_request_id']) ? $_REQUEST['work_order_request_id']  : -1 : -1;
		$location_id = isset($_REQUEST['location_id']) ? is_numeric($_REQUEST['location_id']) ? $_REQUEST['location_id']  : -1 : -1;

		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;

		$view = 'view_item_location';
		$field = $this->item_location_table();

		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";

		$extra_param = array();

		$extra_param['methodid'] = $methodid;

		$loaddata = $this->ecc_library->get_field_data_pop($view, $field, $extra_param);

		echo $loaddata;
	}

	function post_add_edit()
	{
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();

		$location_id = isset($_POST['location_id']) ? $_POST['location_id'] : '';
		$type_location_code = isset($_POST['type_location_code']) ? $_POST['type_location_code'] : '';
		$item_category_code = isset($_POST['item_category_code']) ? $_POST['item_category_code'] : '';
		$warehouse_code = isset($_POST['warehouse_code']) ? $_POST['warehouse_code'] : '';

		$location_base_id = isset($_POST['location_base_id']) ? $_POST['location_base_id'] : '';
		$location_number = isset($_POST['location_number']) ? $_POST['location_number'] : '';
		$type_location_id = isset($_POST['type_location_id']) ? $_POST['type_location_id'] : '';
		$item_category_id = isset($_POST['item_category_id']) ? $_POST['item_category_id'] : '';
		$warehouse_id = isset($_POST['warehouse_id']) ? $_POST['warehouse_id'] : '';
		$location_code = isset($_POST['location_code']) ? $_POST['location_code'] : '';

		$user_id = $this->session->userdata('user_id');

		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";

		if (count($_POST) > 0) {
			if ($location_id) {
				$this->rpc_service->setSP("dbo.sp_item_location_edit");
				$this->rpc_service->addField('location_id', $location_id);
			} else {
				//var_dump($location_code);die();
				$this->rpc_service->setSP("dbo.sp_item_location_add");
			}

			$this->rpc_service->addField('location_base_id', $location_base_id);
			$this->rpc_service->addField('location_number', $location_number);
			$this->rpc_service->addField('type_location_id', $type_location_id);
			$this->rpc_service->addField('item_category_id', $item_category_id);
			$this->rpc_service->addField('warehouse_id', $warehouse_id);
			$this->rpc_service->addField('location_code', $location_code);

			$result = $this->rpc_service->resultJSON_pop();

			$data = array();
			if (isset($result)) {
				if (isset($result['valid'])) {
					if ($result['valid']) {
						if (isset($result['data'])) {
							$data_result = json_decode($result['data'], true);
							$return['location_id'] = $data_result['location_id'];
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

		$location_id = isset($_POST['location_id']) ? $_POST['location_id'] : false;

		$user_id = $this->session->userdata('user_id');

		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		// var_dump($location_id);die();
		if (count($_POST) > 0) {
			if ($location_id) {
				$this->rpc_service->setSP("dbo.sp_item_location_delete");
				$this->rpc_service->addField('location_id', $location_id);
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

	function cetak_barcode_location()
	{
		$this->db_pop = $this->load->database('pop', TRUE);
		$location_id = (isset($_GET['location_id']) && !empty($_GET['location_id'])) ? $_GET['location_id'] : die('{"sts":"ERROR","desc":" Param Header Tidak Ditemukan"}');
		$data['location_id'] = $location_id;
		// $this->load->view('draft/warehouse/draft_barcode',$data);
		$this->load->view('draft/warehouse/draft_cetak_barcode_location', $data);
	}
}
