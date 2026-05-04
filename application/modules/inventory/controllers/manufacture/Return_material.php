<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Return_material extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->data_return = $_REQUEST;

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

	function work_order_return_table()
	{
		$view = 'view_work_order_return';
		$get_field = $this->ecc_library->get_field($view);

		$get_field['r1']['hidden'] = true;

		$get_field['r12']['hidden'] = true;
		$get_field['r13']['hidden'] = true;
		$get_field['r14']['hidden'] = true;
		$get_field['r15']['hidden'] = true;
		$get_field['r16']['hidden'] = true;

		$get_field['r2']['title'] = 'Work Process';
		$get_field['r3']['title'] = 'Return No';
		$get_field['r4']['title'] = 'Return Date';
		$get_field['r5']['title'] = 'Plan No';
		$get_field['r6']['title'] = 'Plan Date';
		$get_field['r7']['title'] = 'Return Status';
		return $get_field;
	}

	function work_order_return_material_table()
	{
		$view = 'view_work_order_request_bom';
		$get_field = $this->ecc_library->get_field($view);

		return $get_field;
	}

	function work_order_return_detail_supply_table()
	{
		$view = 'view_work_order_return_detail';
		$get_field = $this->ecc_library->get_field($view);
		$get_field['r1']['hidden'] = true;
		$get_field['r2']['hidden'] = true;
		$get_field['r3']['hidden'] = true;

		return $get_field;
	}

	function work_order_return_transfer_item_table()
	{
		$view = 'view_stock_move_item_return';
		$get_field = $this->ecc_library->get_field($view);
		$get_field['r1']['hidden'] = true;
		$get_field['r12']['hidden'] = true;

		return $get_field;
	}

	function work_order_return_supply_item_table()
	{
		$view = 'view_stock_move_supply_return';
		$get_field = $this->ecc_library->get_field($view);

		$get_field['r1']['hidden'] = true;
		$get_field['r12']['hidden'] = true;
		$get_field['r13']['hidden'] = true;
		$get_field['r14']['hidden'] = true;
		return $get_field;
	}

	function index()
	{
		$this->load->model('main');
		$component['loadlayout'] = true;
		$component['view_load'] = 'manufacture/return/view';
		$component['view_load_form'] = 'manufacture/return/form';
		$component['load_js'][] = 'manufacture/return/view';
		$component['load_js'][] = 'manufacture/return/form';

		$component['page_title'] = "Return Material";

		$dashboard_table = array();

		$nav_button = array();
		$nav_button[] = array('method_id' => 575, 'title' => 'Add', 'icon' => 'fa fa-plus', 'load' => 'manufacture/return/function_add');
		$nav_button[] = array('method_id' => 576, 'title' => 'Edit', 'icon' => 'fa fa-pencil', 'load' => 'manufacture/return/function_edit');
		$nav_button[] = array('method_id' => 579, 'title' => 'Approve', 'icon' => 'fa fa-pencil', 'load' => 'manufacture/return/function_approve');
		$nav_button[] = array('method_id' => 920, 'title' => 'Supply', 'icon' => 'fa fa-pencil', 'load' => 'manufacture/scrap/function_supply');
		$nav_button[] = array('method_id' => 578, 'title' => 'Delete', 'icon' => 'fa fa-trash-o', 'load' => 'manufacture/return/function_delete');
		$nav_button[] = array('method_id' => 775, 'title' => 'Cancel Approve', 'icon' => 'fa fa-pencil', 'load' => 'manufacture/return/function_cancel_approve');
		$nav_button[] = array('method_id' => 7811304, 'title' => 'Print', 'icon' => 'fa fa-print', 'load' => 'manufacture/return/function_print');

		$field = $this->work_order_return_table();
		$field_detail_supply = $this->work_order_return_detail_supply_table();
		$field_transfer_item = $this->work_order_return_transfer_item_table();
		$field_supply_item = $this->work_order_return_supply_item_table();

		$dashboard_table['nav_button'] = $nav_button;
		$dashboard_table['field'] = $field;
		$dashboard_table['field_detail_supply'] = $field_detail_supply;
		$dashboard_table['field_detail_supply_loaddata'] = 'loaddata_detail_supply';
		$dashboard_table['field_transfer_item'] = $field_transfer_item;
		$dashboard_table['field_transfer_item_loaddata'] = 'loaddata_transfer_item';
		$dashboard_table['field_supply_item'] = $field_supply_item;
		$dashboard_table['field_supply_item_loaddata'] = 'loaddata_supply_item';

		$component['dashboard_table'] = $dashboard_table;

		$this->authentication->ajaxlayout($component);
	}

	function loaddata()
	{
		$this->authentication->plainlayout();

		$view = 'view_work_order_return';
		$field = $this->work_order_return_table();

		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";

		$loaddata = $this->ecc_library->get_field_data($view, $field);

		echo $loaddata;
	}

	function approve()
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
				$this->rpc_service->setSP("dbo.sp_work_order_return_approve");
				$this->rpc_service->addField('work_order_return_id', $work_order_return_id);
			}

			$result = $this->rpc_service->resultJSON();
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

		$work_order_return_id = isset($_POST['work_order_return_id']) ? $_POST['work_order_return_id'] : false;

		$user_id = $this->session->userdata('user_id');

		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";

		if (count($_POST) > 0) {

			if ($work_order_return_id) {
				$this->rpc_service->setSP("dbo.sp_work_order_return_cancel_approve");
				$this->rpc_service->addField('work_order_return_id', $work_order_return_id);
			}

			$result = $this->rpc_service->resultJSON();
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
				$this->rpc_service->setSP("dbo.sp_work_order_return_delete");
				$this->rpc_service->addField('work_order_return_id', $work_order_return_id);
			}

			$result = $this->rpc_service->resultJSON();
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
				$this->rpc_service->setSP("dbo.sp_work_order_return_edit");
				$this->rpc_service->addField('work_order_return_id', $work_order_return_id);
			} else {
				$this->rpc_service->setSP("dbo.sp_work_order_return_add");
			}

			$this->rpc_service->addField('work_order_return_no', $work_order_return_no);
			$this->rpc_service->addField('work_order_return_date', $work_order_return_date);
			$this->rpc_service->addField('work_order_plan_id', $work_order_plan_id);
			$this->rpc_service->addField('work_process_id', $work_process_id);

			$result = $this->rpc_service->resultJSON();


			$data = array();
			if (isset($result)) {
				if (isset($result['valid'])) {
					if ($result['valid']) {
						if (isset($result['data'])) {
							$data = json_decode($result['data'], TRUE);
							$work_order_return_id = $data['work_order_return_id'];

							$return['valid'] = $result['valid'];
							$return['status_code'] = $result['no'];
							$return['message'] = $result['des'];
							$return['work_order_return_id'] = $work_order_return_id;
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
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();

		$work_order_return_id = isset($_POST['work_order_return_id']) ? $_POST['work_order_return_id'] : false;
		$item_id = isset($_POST['item_id']) ? $_POST['item_id'] : '';
		$material_list = isset($_POST['material_list']) ? $_POST['material_list'] : array();
		$user_id = $this->session->userdata('user_id');

		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";

		if (count($_POST) > 0) {

			$this->rpc_service->setSP("dbo.sp_work_order_return_detail_add_edit");

			$this->rpc_service->addField('work_order_return_id', $work_order_return_id);

			foreach ($material_list as $dt_data) {
				$this->rpc_service->addAttributeChild('dt', $dt_data);
			}

			$result = $this->rpc_service->resultJSON();

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

	function loaddata_material()
	{
		$this->authentication->plainlayout();
		$return = array();

		$field = $this->work_order_return_material_table();

		$work_order_plan_id = isset($_POST['work_order_plan_id']) ? is_numeric($_POST['work_order_plan_id']) ? $_POST['work_order_plan_id'] : -1 : -1;
		$work_process_id = isset($_POST['work_process_id']) ? is_numeric($_POST['work_process_id']) ? $_POST['work_process_id'] : -1 : -1;
		$work_order_return_date = isset($_POST['work_order_return_date']) ? $_POST['work_order_return_date'] : '1900-01-01';
		$work_order_return_id = isset($_POST['work_order_return_id']) ? $_POST['work_order_return_id'] : '';

		$page = isset($_POST['page']) ? $_POST['page'] : 1; // get the requested page 
		$rows = isset($_POST['rows']) ? $_POST['rows'] : 10; // get how many rows we want to have into the grid 
		$sidx = isset($_POST['sidx']) ? $_POST['sidx'] : 'r1'; // get index row - i.e. user click to sort 
		$sord = isset($_POST['sord']) ? $_POST['sord'] : 'asc'; // get the direction 
		$search = true;
		$filterRules =  isset($_POST['filters']) ? $_POST['filters'] : false;

		$decode_filterRules = json_decode($filterRules, true);

		if (isset($decode_filterRules)) {
			if (isset($decode_filterRules['rules'])) {
				$rules = $decode_filterRules['rules'];
			} else {
				$rules = array();
			}
		} else {
			$decode_filterRules['groupOp'] = 'AND';
			$rules = array();
		}

		$decode_filterRules['rules'] = $rules;
		$filterRules = json_encode($decode_filterRules);

		$limit =  $rows;
		$offset =  $rows * ($page - 1);

		$order = isset($_REQUEST['order']) ? $_REQUEST['order'] : array();

		if ($sord == 'asc') {
			$sord = 1;
		} else {
			$sord = 2;
		}

		$sort =	$sidx . '=' . $sord;

		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";

		$sp = "dbo.sp_stock_move_item_return_detail";
		$this->rpc_service->setSP($sp);

		if ($work_order_return_id) {
			$this->rpc_service->addField('work_order_return_id', $work_order_return_id);
		}

		$this->rpc_service->addField('work_order_plan_id', $work_order_plan_id);
		$this->rpc_service->addField('work_process_id', $work_process_id);
		$this->rpc_service->addField('work_order_return_date', $work_order_return_date);
		$this->rpc_service->addField('sort', $sort);
		$this->rpc_service->addField('limit', $limit);
		$this->rpc_service->addField('offset', $offset);

		$this->rpc_service->setWhere($search, $filterRules, $field);

		$result = $this->rpc_service->resultJSON();
		$data_result = json_decode($result['data'], true);

		if (isset($data_result['detail']['result_count'])) {
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
		$i = 0;
		if ($data_result) {
			if (isset($data_result['xrow'])) {
				foreach ($data_result['xrow'] as $key => $value) {
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

	function loaddata_detail_total()
	{
		$this->authentication->plainlayout();

		$field = array();
		$field[] = array('field' => 'item', 'title' => 'item');
		$field[] = array('field' => 'quantity_requirement', 'title' => 'unit');
		$field[] = array('field' => 'uom_code', 'title' => 'mat_quantity');
		$field[] = array('field' => 'fg_item', 'title' => 'mat_quantity');
		$field[] = array('field' => 'quantity_return', 'title' => 'mat_quantity');

		$new_work_order_return = isset($_POST['new_work_order_return']) ? $_POST['new_work_order_return'] : 0;
		$work_order_return_id = isset($_POST['work_order_return_id']) ? is_numeric($_POST['work_order_return_id']) ? $_POST['work_order_return_id'] : -1 : -1;

		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";
		$loaddata_table = array();


		$view = 'dbo.view_work_order_return_detail';
		$where = array();
		$where['work_order_return_id'] = $work_order_return_id;
		$loaddata = $this->ecc_library->loaddata($view, $field, $where);

		foreach ($loaddata['data'] as $key => $value) {

			$new_row = array();
			$new_row[] = $value[0];
			$new_row[] = $this->mainconfig->get_decimal_format($value[1], 12);
			$new_row[] = $value[2];
			$new_row[] = $value[3];
			$new_row[] = $this->mainconfig->get_decimal_format($value[4], 12);

			$loaddata_table[$value[0]] = $new_row;
		}



		$loaddata['data'] = array();
		foreach ($loaddata_table as $value) {

			$data = array();
			$data[] = $value[0];
			$data[] = $value[1];
			$data[] = $value[2];
			$data[] = $value[3];
			$data[] = $value[4];

			$loaddata['data'][] = $data;
		}

		echo json_encode($loaddata);
	}

	function delete_detail()
	{
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();

		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";

		$work_order_return_detail_id = isset($_POST['work_order_return_detail_id']) ? $_POST['work_order_return_detail_id'] : '';
		$user_id = $this->session->userdata('user_id');

		if (count($_POST) > 0) {
			if ($work_order_return_detail_id) {
				$this->rpc_service->setSP("dbo.sp_work_order_return_detail_delete");
				$this->rpc_service->addField('work_order_return_detail_id', $work_order_return_detail_id);
			}

			$result = $this->rpc_service->resultJSON();
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

	function loaddata_detail_supply()
	{
		$this->authentication->plainlayout();

		$work_order_return_id = isset($_REQUEST['work_order_return_id']) ? is_numeric($_REQUEST['work_order_return_id']) ? $_REQUEST['work_order_return_id']  : -1 : -1;
		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;

		$view = 'view_work_order_return_detail';
		$field = $this->work_order_return_detail_supply_table();
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";

		$extra_param = array();
		$extra_param['where']['0']['field'] = 'r2';
		$extra_param['where']['0']['data'] = $work_order_return_id;
		$extra_param['methodid'] = $methodid;

		$loaddata = $this->ecc_library->get_field_data($view, $field, $extra_param);

		echo $loaddata;
	}

	function loaddata_transfer_item()
	{
		$this->authentication->plainlayout();

		$work_order_return_detail_id = isset($_REQUEST['work_order_return_detail_id']) ? is_numeric($_REQUEST['work_order_return_detail_id']) ? $_REQUEST['work_order_return_detail_id']  : -1 : -1;
		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;

		$view = 'view_stock_move_item_return';
		$field = $this->work_order_return_transfer_item_table();

		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";

		$extra_param = array();
		$extra_param['where']['0']['field'] = 'r12';
		$extra_param['where']['0']['data'] = $work_order_return_detail_id;
		$extra_param['methodid'] = $methodid;

		$loaddata = $this->ecc_library->get_field_data($view, $field, $extra_param);

		echo $loaddata;
	}

	function loaddata_supply_item()
	{
		$this->authentication->plainlayout();

		$work_order_return_detail_id = isset($_REQUEST['work_order_return_detail_id']) ? is_numeric($_REQUEST['work_order_return_detail_id']) ? $_REQUEST['work_order_return_detail_id']  : -1 : -1;
		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;

		$view = 'view_stock_move_supply_return';
		$field = $this->work_order_return_supply_item_table();

		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";

		$extra_param = array();
		$extra_param['where']['0']['field'] = 'r12';
		$extra_param['where']['0']['data'] = $work_order_return_detail_id;
		$extra_param['methodid'] = $methodid;

		$loaddata = $this->ecc_library->get_field_data($view, $field, $extra_param);

		echo $loaddata;
	}

	function post_add_edit_supply()
	{
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();

		$stock_move_id = isset($_POST['stock_move_id']) ? $_POST['stock_move_id'] : false;
		$work_order_return_detail_id = isset($_POST['work_order_return_detail_id']) ? $_POST['work_order_return_detail_id'] : 0;
		$work_order_return_supply_id = isset($_POST['work_order_return_supply_id']) ? $_POST['work_order_return_supply_id'] : '';
		$quantity_supply = isset($_POST['quantity_supply']) ? $_POST['quantity_supply'] : 0;
		$work_order_return_id = isset($_POST['work_order_return_id']) ? $_POST['work_order_return_id'] : 0;

		$user_id = $this->session->userdata('user_id');

		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";

		if (count($_POST) > 0) {
			if ($work_order_return_supply_id) {
				$this->rpc_service->setSP("dbo.sp_work_order_return_supply_edit");
				$this->rpc_service->addField('work_order_return_supply_id', $work_order_return_supply_id);
			} else {
				$this->rpc_service->setSP("dbo.sp_work_order_return_supply_add");
			}

			$this->rpc_service->addField('work_order_return_id', $work_order_return_id);
			$this->rpc_service->addField('work_order_return_detail_id', $work_order_return_detail_id);
			$this->rpc_service->addField('quantity_supply', $quantity_supply);
			$this->rpc_service->addField('stock_move_id', $stock_move_id);

			$result = $this->rpc_service->resultJSON();

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

	function auto_supply_fifo()
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
				$this->rpc_service->setSP("dbo.sp_work_order_return_supply_fifo");
				$this->rpc_service->addField('work_order_return_id', $work_order_return_id);
			}

			$result = $this->rpc_service->resultJSON();
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

	function auto_supply_lifo()
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
				$this->rpc_service->setSP("dbo.sp_work_order_return_supply_lifo");
				$this->rpc_service->addField('work_order_return_id', $work_order_return_id);
			}

			$result = $this->rpc_service->resultJSON();
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
	function print_raw_return()
	{
		$this->db_pop = $this->load->database('pop', TRUE);
		$this->load->model('main');
		$this->load->library('mainconfig');

		$work_order_return_id = isset($_POST['work_order_return_id']) ? $_POST['work_order_return_id'] : false;
		$format = isset($_POST['format']) ? $_POST['format'] : 'pdf';

		// Ambil data header
		$where_del = array('work_order_return_id' => str_replace(',', '', $work_order_return_id));
		$x = $this->main->getData_pop('dbo.view_work_order_return', null, $where_del);

		if (!$x || count($x) == 0) {
			echo json_encode(['valid' => false, 'message' => 'Data header tidak ditemukan']);
			return;
		}

		$work_process_name       = $x[0]['work_process_name'];
		$work_order_return_no    = $x[0]['work_order_return_no'];
		$work_order_return_date  = $x[0]['work_order_return_date'];
		$work_order_plan_no      = $x[0]['work_order_plan_no'];
		$work_order_plan_date    = $x[0]['work_order_plan_date'];
		$work_order_return_status = $x[0]['work_order_return_status'];
		$create_by               = $x[0]['create_by'];
		$work_order_return_id2   = $x[0]['work_order_return_id'];

		// Template config
		$temp = sys_get_temp_dir() . DIRECTORY_SEPARATOR;
		$host_libreoffice = '127.0.0.1';
		$port_libreoffice = '8080';
		$unoconv = '"C:/Program Files/LibreOffice 5/program/python.exe" "C:/Program Files/LibreOffice 5/program/unoconv" ' .
			'--connection "socket,host=' . $host_libreoffice . ',port=' . $port_libreoffice . ',tcpNoDelay=1;urp;StarOffice.ComponentContext" ';

		$report_time = date('_Ymd_His');

		if ($format == 'xlsx') {
			$template = 'C:/tmp_sipop/raw_return/excel/excel_raw_return_template.fods';
			$templateData1 = 'C:/tmp_sipop/raw_return/excel/excel_raw_material_return_detail.fods';
			$tmp_ext = 'fods';
			$EXTENSION = 'xlsx';
			$CONVERT_TO = 'xlsx';
			$report_name = 'Pattern_raw_return_Excel';
		} else {
			$template = 'C:/tmp_sipop/raw_return/pdf/raw_return_template.fodt';
			$templateData1 = 'C:/tmp_sipop/raw_return/pdf/raw_material_return_detail.fodt';
			$tmp_ext = 'fodt';
			$EXTENSION = 'pdf';
			$CONVERT_TO = 'pdf';
			$report_name = 'Pattern_raw_return_PDF';
		}

		// Baca template
		$template_doc = @file_get_contents($template);
		$template_data1 = @file_get_contents($templateData1);

		if ($template_doc === false) {
			echo json_encode(['valid' => false, 'message' => "Gagal buka template: $template"]);
			return;
		}
		if ($template_data1 === false) {
			echo json_encode(['valid' => false, 'message' => "Gagal buka template data detail: $templateData1"]);
			return;
		}

		// Ambil detail
		$q = $this->db_pop->query('
        SELECT *
        FROM dbo.view_work_order_return_detail
        WHERE work_order_return_id = ' . $this->db_pop->escape($work_order_return_id2) . '
        ORDER BY work_order_return_detail_id ASC
    ');
		$result = $q->result();

		$value_detail1 = '';
		$data_detail_placeholders = array('{item_code}', '{item_name}', '{quantity_return}', '{quantity_supply}', '{unit}');

		foreach ($result as $r) {
			$isi_detail1 = array(
				$r->item_code,
				$r->item_name,
				$this->mainconfig->get_decimal_format($r->quantity_return, 12),
				$this->mainconfig->get_decimal_format($r->quantity_supply, 12),
				$r->unit
			);
			// Ganti per satu row detail (template_data1 diasumsikan satu baris / row table)
			$value_detail1 .= str_replace($data_detail_placeholders, $isi_detail1, $template_data1);
		}

		// Siapkan mapping associative (lebih aman daripada array index)
		$replacements = array(
			'{work_order_return_id}'    => $work_order_return_id2,
			'{work_process_name}'       => $work_process_name,
			'{work_order_return_no}'    => $work_order_return_no,
			'{work_order_return_date}'  => $work_order_return_date,
			'{work_order_plan_no}'      => $work_order_plan_no,
			'{work_order_plan_date}'    => $work_order_plan_date,
			'{work_order_return_status}' => $work_order_return_status,
			'{create_by}'               => $create_by,
			'{data_raw_material}'       => $value_detail1
		);

		// Debug: cek apakah semua placeholder header ada di template
		$missing = array();
		foreach (array_keys($replacements) as $ph) {
			if (strpos($template_doc, $ph) === false) {
				$missing[] = $ph;
			}
		}
		// Jika ada placeholder yg hilang, simpan log & teruskan (agar kamu bisa buka file fodt untuk cek)
		if (!empty($missing)) {
			file_put_contents($temp . 'missing_placeholders_' . $report_time . '.log', "Missing placeholders in template: " . implode(', ', $missing) . PHP_EOL . "Template used: $template");
			// NOTE: jangan return, biarkan tetap generate agar bisa inspect hasil .fodt
		}

		// Lakukan penggantian menggunakan strtr (associative), aman & deterministic
		$value_header = strtr($template_doc, $replacements);

		// Simpan hasil .fodt/.fods sebelum konversi agar bisa diperiksa manual
		$out_tmp = $temp . $report_name . $report_time . '.' . $tmp_ext;
		file_put_contents($out_tmp, $value_header);

		// OPTIONAL debug: simpan juga preview text (pertama 5k chars) agar cepat cek
		file_put_contents($temp . 'preview_' . $report_name . $report_time . '.txt', substr($value_header, 0, 5000));

		// Konversi ke format akhir
		exec(
			$unoconv .
				'-f ' . $CONVERT_TO . ' ' .
				'-o "' . $temp . $report_name . $report_time . '.' . $EXTENSION . '" ' .
				'"' . $out_tmp . '"'
		);

		$file = $temp . $report_name . $report_time . '.' . $EXTENSION;
		$namafile = $report_name . $report_time . '.' . $EXTENSION;

		// Hapus temporary source (kamu bisa komentar baris ini sementara untuk debugging)
		@unlink($out_tmp);

		echo json_encode([
			'valid' => true,
			'xfile' => $file,
			'namafile' => $namafile,
			'debug_log' => file_exists($temp . 'missing_placeholders_' . $report_time . '.log') ? ('missing_placeholders_' . $report_time . '.log') : null,
			'preview_txt' => 'preview_' . $report_name . $report_time . '.txt'
		]);
	}
}
