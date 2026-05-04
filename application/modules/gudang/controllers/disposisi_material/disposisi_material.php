<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class disposisi_material extends CI_Controller
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
		$get_field['act']['formatter'] = 'formatOperations_disposisi_material';
		return $get_field;
	}
	function fabric_disposisi_table()
	{
		$view = 'view_fabric_disposisi_material';
		$get_field = $this->ecc_library->get_field_pop($view);

		$get_field['r1']['hidden'] = true;
		$get_field['r2']['hidden'] = true;
		$get_field['r4']['hidden'] = true;
		$get_field['r5']['hidden'] = true;
		$get_field['r6']['hidden'] = true;
		$get_field['r11']['hidden'] = true;
		$get_field['r12']['hidden'] = true;
		$get_field['r13']['hidden'] = true;
		$get_field['r14']['hidden'] = true;
		$get_field['r15']['hidden'] = true;



		$get_field['act']['sc'] = 'act';
		$get_field['act']['title'] = 'Action';
		$get_field['act']['bypassvalue'] = '';
		$get_field['act']['ctype'] = 'text';
		$get_field['act']['align'] = 'center';
		$get_field['act']['search'] = false;
		$get_field['act']['sortable'] = false;
		$get_field['act']['formatter'] = 'formatOperations_disposisi_material_action';
		return $get_field;
	}






	function index()
	{
		$this->load->model('main');
		$component['loadlayout'] = true;
		$component['view_load'] = 'disposisi_material/view';
		$component['view_load_form'] = 'disposisi_material/form';
		$component['load_js'][] = 'disposisi_material/view';
		$component['load_js'][] = 'disposisi_material/form';

		$component['page_title'] = "Disposisi Material";

		$dashboard_table = array();

		$nav_button = array();

		$nav_button[] = array('method_id' => 7811189, 'title' => 'Add From Transfer', 'btn' => 'btn-success', 'icon' => 'fa fa-plus', 'load' => 'disposisi_material/function_add');
		$nav_button[] = array('method_id' => 7811392, 'title' => 'Edit', 'btn' => 'btn-warning', 'icon' => 'fa fa-pencil', 'load' => 'disposisi_material/function_edit');
		$nav_button[] = array('method_id' => 7811393, 'title' => 'Delete', 'btn' => 'btn-danger', 'icon' => 'fa fa-trash-o', 'load' => 'disposisi_material/function_delete');


		$field_return = $this->fabric_return_table();
		$field_disposisi = $this->fabric_disposisi_table();




		$dashboard_table['nav_button'] = $nav_button;


		$dashboard_table['field_return'] = $field_return;
		$dashboard_table['field_return_loaddata'] = 'loaddata';

		$dashboard_table['field_disposisi'] = $field_disposisi;
		$dashboard_table['field_disposisi_loaddata'] = 'loaddata_disposisi';

		$dashboard_table['caption'] = '.:: Disposisi Material Request ::.';

		$component['dashboard_table'] = $dashboard_table;

		$this->authentication->ajaxlayout($component);
	}


	public function loaddata()
	{
		$this->authentication->plainlayout();

		// Pastikan menangkap dari REQUEST karena jqGrid mengirim parameter saat reload
		$code_barcode = isset($_REQUEST['code_barcode']) ? trim($_REQUEST['code_barcode']) : '';
		$methodid = isset($_REQUEST['methodid']) && is_numeric($_REQUEST['methodid']) ? (int) $_REQUEST['methodid'] : -1;
		$is_barcode_scanned = isset($_REQUEST['is_barcode_scanned']) ? $_REQUEST['is_barcode_scanned'] : 'false';

		$view = 'view_fabric_return_result';
		$field = $this->fabric_return_table();
		$extra_param = array();

		// Filter barcode: Jika code_barcode ada, tambahkan WHERE clause
		if (!empty($code_barcode)) {
			$extra_param['where'][0]['field'] = 'r15'; // Pastikan 'r15' adalah nama kolom barcode di database/view Anda
			$extra_param['where'][0]['data'] = $code_barcode;
		}

		if ($methodid !== -1) {
			$extra_param['methodid'] = $methodid;
		}

		// Panggil library untuk generate JSON bagi jqGrid
		$loaddata = $this->ecc_library->get_field_data_pop($view, $field, $extra_param);

		echo $loaddata;
	}
	function loaddata_disposisi()
	{
		$this->authentication->plainlayout();

		// Ambil ID dari request, default ke -1 jika kosong
		$work_order_return_detail_id = $this->input->get_post('work_order_return_detail_id');
		if (!$work_order_return_detail_id) {
			$work_order_return_detail_id = -1;
		}

		$methodid = $this->input->get_post('methodid');

		$view = 'view_fabric_disposisi_material';
		$field = $this->fabric_disposisi_table();

		$extra_param = array();
		// Pastikan 'field' r2 adalah nama kolom yang tepat di database/view untuk ID return detail
		$extra_param['where']['0']['field'] = 'r2';
		$extra_param['where']['0']['data'] = $work_order_return_detail_id;
		$extra_param['methodid'] = $methodid;

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

	function delete_disposisi()
	{
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();

		$disposition_id = isset($_POST['disposition_id']) ? $_POST['disposition_id'] : false;

		$user_id = $this->session->userdata('user_id');

		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";

		if (count($_POST) > 0) {

			if ($disposition_id) {
				$this->rpc_service->setSP("dbo.sp_fabric_disposisi_material_delete");
				$this->rpc_service->addField('disposition_id', $disposition_id);
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


		$disposition_id = isset($_POST['disposition_id']) ? $_POST['disposition_id'] : '';
		$disposition_no = isset($_POST['disposition_no']) ? $_POST['disposition_no'] : '';
		$work_order_return_detail_id = isset($_POST['work_order_return_detail_id']) ? $_POST['work_order_return_detail_id'] : '';
		$notes_disposition = isset($_POST['notes_disposition']) ? $_POST['notes_disposition'] : '';

		$disposition_action = isset($_POST['disposition_action']) ? $_POST['disposition_action'] : '';
		$actual_quantity = isset($_POST['actual_quantity']) ? $_POST['actual_quantity'] : '';
		$quality_grade = isset($_POST['quality_grade']) ? $_POST['quality_grade'] : '';


		$user_id = $this->session->userdata('user_id');

		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";

		if (count($_POST) > 0) {
			if ($disposition_id) {
				$this->rpc_service->setSP("dbo.sp_fabric_disposisi_material_edit");
				$this->rpc_service->addField('disposition_id', $disposition_id);
			} else {
				$this->rpc_service->setSP("dbo.sp_fabric_disposisi_material_add");
			}

			$this->rpc_service->addField('disposition_id', $disposition_id);
			$this->rpc_service->addField('work_order_return_detail_id', $work_order_return_detail_id);
			$this->rpc_service->addField('disposition_no', $disposition_no);
			$this->rpc_service->addField('disposition_action', $disposition_action);
			$this->rpc_service->addField('actual_quantity', $actual_quantity);
			$this->rpc_service->addField('notes_disposition', $notes_disposition);
			$this->rpc_service->addField('quality_grade', $quality_grade);

			$result = $this->rpc_service->resultJSON_pop();


			$data = array();
			if (isset($result)) {
				if (isset($result['valid'])) {
					if ($result['valid']) {
						if (isset($result['data'])) {
							$data = json_decode($result['data'], TRUE);
							$disposition_id = $data['disposition_id'];
							$work_order_return_detail_id = $data['work_order_return_detail_id'];
							$disposition_no = $data['disposition_no'];
							$disposition_action = $data['disposition_action'];
							$actual_quantity = $data['actual_quantity'];
							$quality_grade = $data['quality_grade'];
							$notes_disposition = $data['notes_disposition'];


							$return['valid'] = $result['valid'];
							$return['status_code'] = $result['no'];
							$return['message'] = $result['des'];
							$return['disposition_id'] = $disposition_id;
							$return['work_order_return_detail_id'] = $work_order_return_detail_id;
							$return['disposition_no'] = $disposition_no;
							$return['disposition_action'] = $disposition_action;
							$return['actual_quantity'] = $actual_quantity;
							$return['quality_grade'] = $quality_grade;
							$return['notes_disposition'] = $notes_disposition;
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
