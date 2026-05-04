<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class specification extends CI_Controller
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

	function spec_category_table()
	{
		$view = 'view_spec_template';
		$get_field = $this->ecc_library->get_field_pop($view);

		$get_field['r1']['hidden'] = true;
		$get_field['r3']['hidden'] = true;
		$get_field['r4']['hidden'] = true;
		$get_field['r5']['hidden'] = true;
		$get_field['r6']['hidden'] = true;
		$get_field['r7']['hidden'] = true;
		$get_field['r14']['hidden'] = true;
		$get_field['r21']['hidden'] = true;

		return $get_field;
	}





	function style_spec_category_table()
	{
		$view = 'view_list_pilih_model_spec';
		$get_field = $this->ecc_library->get_field_pop($view);

		$get_field['r1']['hidden'] = true;


		return $get_field;
	}



	function index()
	{
		$this->load->model('main');
		$component['loadlayout'] = true;
		$component['view_load'] = 'specification/specification/view';
		$component['view_load_form'] = 'specification/specification/form_spec';
		$component['load_js'][] = 'specification/specification/view';



		$component['page_title'] = 'Specification Category';

		$dashboard_table = array();

		$nav_button = array();
		$nav_button[] = array('method_id' => 1101, 'title' => 'Addx', 'icon' => 'fa fa-plus', 'load' => 'specification/specification/function_add');
		$nav_button[] = array('method_id' => 1102, 'title' => 'Editx', 'icon' => 'fa fa-pencil', 'load' => 'specification/specification/function_edit');
		$nav_button[] = array('method_id' => 1103, 'title' => 'Delete', 'icon' => 'fa fa-trash-o', 'load' => 'specification/specification/function_delete');

		//	$nav_button[] = array('method_id' => 776,'title' => 'Cancel Approve', 'icon' => 'fa fa-pencil', 'load' => 'manufacture/production_plan/function_cancel_approve');

		$field_spec = $this->spec_category_table();


		//	$field_material = $this->work_order_plan_material_table();

		$dashboard_table['nav_button'] = $nav_button;

		$dashboard_table['field_spec_category'] = $field_spec;
		$dashboard_table['field_spec_category_loaddata'] = 'loaddata_spec_category';

		$component['dashboard_table'] = $dashboard_table;

		$this->authentication->ajaxlayout($component);
	}




	function index_spec()
	{
		$this->load->model('main');
		$component['loadlayout'] = true;
		$component['view_load'] = 'specification/specification/view_spec';
		$component['view_load_form'] = 'specification/specification/form_spec';
		$component['load_js'][] = 'specification/specification/view_spec';
		$component['load_js'][] = 'specification/specification/form_spec';



		$component['page_title'] = 'Style Specification Category';

		$dashboard_table = array();

		$nav_button = array();
		$nav_button[] = array('method_id' => 781176, 'title' => 'Add', 'icon' => 'fa fa-plus', 'load' => 'specification/specification/function_add_spec');
		$nav_button[] = array('method_id' => 781163, 'title' => 'Edit', 'icon' => 'fa fa-pencil', 'load' => 'specification/specification/function_edit_spec');

		$nav_button[] = array('method_id' => 781164, 'title' => 'Delete', 'icon' => 'fa fa-trash-o', 'load' => 'specification/specification/function_delete_spec');
		$nav_button[] = array('method_id' => 781166, 'title' => 'Copy Style Specification', 'icon' => 'fa fa-copy', 'load' => 'specification/specification/function_copy_style_spec');


		$field_spec_category = $this->style_spec_category_table();
		$field_category = $this->spec_category_table();



		$dashboard_table['nav_button'] = $nav_button;
		$dashboard_table['field'] = $field_spec_category;
		$dashboard_table['field_spec_category'] = $field_category;
		$dashboard_table['field_spec_category_loaddata'] = 'loaddata_spec_category';

		$component['dashboard_table'] = $dashboard_table;

		$this->authentication->ajaxlayout($component);
	}






	function loaddata()
	{

		$this->authentication->plainlayout();

		$model_id = isset($_REQUEST['template_detail_model_id']) ? is_numeric($_REQUEST['template_detail_model_id']) ? $_REQUEST['template_detail_model_id']  : -1 : -1;
		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;

		//var_dump($model_id);
		$view = 'view_list_pilih_model_spec';
		$field_spec_category = $this->style_spec_category_table();

		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";

		$extra_param_spec = array();
		// $extra_param_spec['where']['0']['field'] = 'r7';
		// $extra_param_spec['where']['0']['data'] = $model_id;
		$extra_param_spec['methodid'] = $methodid;

		$loaddata = $this->ecc_library->get_field_data_pop($view, $field_spec_category, $extra_param_spec);

		echo $loaddata;
	}

	function loaddata_style_spec_category()
	{

		$this->authentication->plainlayout();

		$model_id = isset($_REQUEST['template_detail_model_id']) ? is_numeric($_REQUEST['template_detail_model_id']) ? $_REQUEST['template_detail_model_id']  : -1 : -1;
		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;

		//var_dump($model_id);
		$view = 'view_list_pilih_model_spec';
		$field_spec_category = $this->style_spec_category_table();

		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";

		$extra_param_spec = array();
		// $extra_param_spec['where']['0']['field'] = 'r7';
		// $extra_param_spec['where']['0']['data'] = $model_id;
		$extra_param_spec['methodid'] = $methodid;

		$loaddata = $this->ecc_library->get_field_data_pop($view, $field_spec_category, $extra_param_spec);

		echo $loaddata;
	}




















	function loaddata_spec_category()
	{

		$this->authentication->plainlayout();

		$model_id = isset($_REQUEST['template_detail_model_id']) ? is_numeric($_REQUEST['template_detail_model_id']) ? $_REQUEST['template_detail_model_id']  : -1 : -1;
		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;

		//var_dump($model_id);
		$view = 'view_spec_template';
		$field = $this->spec_category_table();

		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";

		$extra_param = array();
		$extra_param['where']['0']['field'] = 'r7';
		$extra_param['where']['0']['data'] = $model_id;
		$extra_param['methodid'] = $methodid;

		$loaddata = $this->ecc_library->get_field_data_pop($view, $field, $extra_param);

		echo $loaddata;
	}


	function post_add_edit()
	{
		$this->authentication->plainlayout();
		$return = array();

		$kode_category_spec = isset($_POST['kode_category_spec']) ? str_replace(',', '.', $_POST['kode_category_spec']) : '';

		$template_detail_id = isset($_POST['template_detail_id']) ? str_replace(',', '.', $_POST['template_detail_id']) : 0;

		$name_spec = isset($_POST['name_spec']) ? str_replace(',', '.', $_POST['name_spec']) : 0;
		$formula_s = isset($_POST['formula_s']) ? str_replace(',', '.', $_POST['formula_s']) : 0;
		$formula_xs = isset($_POST['formula_xs']) ? str_replace(',', '.', $_POST['formula_xs']) : 0;
		$formula_m = isset($_POST['formula_m']) ? str_replace(',', '.', $_POST['formula_m']) : 0;
		$formula_l = isset($_POST['formula_l']) ? str_replace(',', '.', $_POST['formula_l']) : 0;
		$formula_xl = isset($_POST['formula_xl']) ? str_replace(',', '.', $_POST['formula_xl']) : 0;
		$formula_xxl = isset($_POST['formula_xxl']) ? str_replace(',', '.', $_POST['formula_xxl']) : 0;
		if (
			!is_numeric($formula_s) || !is_numeric($formula_xs) || !is_numeric($formula_m) ||
			!is_numeric($formula_l) || !is_numeric($formula_xl) || !is_numeric($formula_xxl)
		) {
			$return['valid'] = false;
			$return['status_code'] = 400;
			$return['message'] = "Semua nilai formula harus berupa angka.";
			echo json_encode($return);
			return;
		}
		$formula_pattern_s = isset($_POST['formula_pattern_s']) ? str_replace(',', '.', $_POST['formula_pattern_s']) : 0;
		$formula_pattern_xs = isset($_POST['formula_pattern_xs']) ? str_replace(',', '.', $_POST['formula_pattern_xs']) : 0;
		$formula_pattern_m = isset($_POST['formula_pattern_m']) ? str_replace(',', '.', $_POST['formula_pattern_m']) : 0;
		$formula_pattern_l = isset($_POST['formula_pattern_l']) ? str_replace(',', '.', $_POST['formula_pattern_l']) : 0;
		$formula_pattern_xl = isset($_POST['formula_pattern_xl']) ? str_replace(',', '.', $_POST['formula_pattern_xl']) : 0;
		$formula_pattern_xxl = isset($_POST['formula_pattern_xxl']) ? str_replace(',', '.', $_POST['formula_pattern_xxl']) : 0;
		if (
			!is_numeric($formula_pattern_s) || !is_numeric($formula_pattern_xs) || !is_numeric($formula_pattern_m) ||
			!is_numeric($formula_pattern_l) || !is_numeric($formula_pattern_xl) || !is_numeric($formula_pattern_xxl)
		) {
			$return['valid'] = false;
			$return['status_code'] = 400;
			$return['message'] = "Semua nilai formula pattern harus berupa angka.";
			echo json_encode($return);
			return;
		}
		$user_id = $this->session->userdata('user_id');

		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";

		if (count($_POST) > 0) {
			if ($template_detail_id != '') {
				$this->rpc_service->setSP("dbo.sp_template_category_edit");
				$this->rpc_service->addField('template_detail_id', $template_detail_id);
			} else {
				$this->rpc_service->setSP("dbo.sp_template_spec_detail_add");
				$this->rpc_service->addField('kode_category_spec', $kode_category_spec);
				$this->rpc_service->addField('name_spec', $name_spec);
			}

			$this->rpc_service->addField('formula_s', $formula_s);
			$this->rpc_service->addField('formula_xs', $formula_xs);
			$this->rpc_service->addField('formula_m', $formula_m);
			$this->rpc_service->addField('formula_l', $formula_l);
			$this->rpc_service->addField('formula_xl', $formula_xl);
			$this->rpc_service->addField('formula_xxl', $formula_xxl);

			$this->rpc_service->addField('formula_pattern_s', $formula_pattern_s);
			$this->rpc_service->addField('formula_pattern_xs', $formula_pattern_xs);
			$this->rpc_service->addField('formula_pattern_m', $formula_pattern_m);
			$this->rpc_service->addField('formula_pattern_l', $formula_pattern_l);
			$this->rpc_service->addField('formula_pattern_xl', $formula_pattern_xl);
			$this->rpc_service->addField('formula_pattern_xxl', $formula_pattern_xxl);
			$this->rpc_service->addField('user_id', $user_id);

			$result = $this->rpc_service->resultJSON_pop();

			$data = array();
			if (isset($result)) {
				if (isset($result['valid'])) {
					if ($result['valid']) {
						if (isset($result['data'])) {
							$data_result = json_decode($result['data'], true);

							$return['valid'] = $result['valid'];
							$return['status_code'] = $result['no'];
							$return['message'] = $result['des'];
							$return['kode_category_spec'] = $data_result['kode_category_spec'];
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


















	function delete_spec()
	{
		$this->authentication->plainlayout();
		$spec_category_id = $this->input->post('spec_category_id', true);
		$return = ['valid' => false, 'status_code' => 501, 'message' => "Internal Server Error"];

		if ($spec_category_id) {
			$this->rpc_service->setSP("dbo.sp_spec_delete");
			$this->rpc_service->addField('spec_category_id', $spec_category_id);
			$result = $this->rpc_service->resultJSON_pop();

			if ($result) {
				$return = [
					'valid' => isset($result['valid']) ? $result['valid'] : false,
					'status_code' => isset($result['no']) ? $result['no'] : 501,
					'message' => isset($result['des']) ? $result['des'] : "Delete Success",
				];
			}
		} else {
			$return['message'] = "Session expired";
		}
		echo json_encode($return);
	}

	function delete_template_category()
	{
		$this->authentication->plainlayout();
		$template_detail_id = $this->input->post('template_detail_id', TRUE);
		$return = ['valid' => FALSE, 'status_code' => 501, 'message' => "Internal Server Error"];

		if ($template_detail_id) {
			$this->db->trans_start(); // Start transaction for better error handling
			try {
				$this->rpc_service->setSP("dbo.sp_template_category_delete");
				$this->rpc_service->addField('template_detail_id', $template_detail_id);
				$result = $this->rpc_service->resultJSON_pop();

				if ($result) {
					$return = [
						'valid' => isset($result['valid']) ? $result['valid'] : FALSE,
						'status_code' => isset($result['no']) ? $result['no'] : 501,
						'message' => isset($result['des']) ? $result['des'] : "Delete Success",
					];
					$this->db->trans_complete(); // Complete transaction if successful
				} else {
					throw new Exception("Stored Procedure returned an error."); // Throw exception on SP failure
				}
			} catch (Exception $e) {
				$this->db->trans_rollback(); // Rollback transaction on error
				$return['message'] = "Error deleting record: " . $e->getMessage();
			}
		} else {
			$return['message'] = "Invalid template_detail_id";
		}
		echo json_encode($return);
	}










	function add_spec_category()
	{
		$this->load->model('main');
		$category_name = isset($_POST['category_name']) ? $_POST['category_name'] : '';
		$this->authentication->plainlayout();

		if (
			$category_name != ''
		) {
			$this->main->insert_pop("dbo.dt_style_spec_category", $data = array('spec_category_uraian' => $category_name, 'spec_category_note' => ''));
			$result['valid'] = 'true';
			$result['no'] = '0000';
			$result['des'] = 'saved successfully!';
		} else {
			$result['valid'] = 'false';
			$result['no'] = '0001';
			$result['des'] = 'category_name is null, saved error!';
		}


		$return['valid'] = $result['valid'];
		$return['status_code'] = $result['no'];
		$return['message'] = $result['des'];
		//$return['spec_detail_id'] = $data_result['spec_detail_id'];

		echo json_encode($return);
	}















	function post_add_edit_spec()
	{
		$this->authentication->plainlayout();
		$return = array();

		// Mengambil data dari form POST
		$spec_category_id = $this->input->post('spec_category_id', true);
		$spec_category_uraian = $this->input->post('spec_category_uraian', true);
		$spec_category_note = $this->input->post('spec_category_note', true);

		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";

		if ($spec_category_uraian !== false) {
			if ($spec_category_id) {
				$this->rpc_service->setSP("dbo.sp_spec_category_edit");
				$this->rpc_service->addField('spec_category_id', $spec_category_id);
			} else {
				$this->rpc_service->setSP("dbo.sp_spec_add");
			}

			$this->rpc_service->addField('spec_category_uraian', $spec_category_uraian);
			$this->rpc_service->addField('spec_category_note', $spec_category_note);
			$result = $this->rpc_service->resultJSON_pop();

			if (isset($result)) {
				$return['valid'] = true;
				$return['message'] = "Data successfully added.";
				// Add additional response handling as needed
			} else {
				$return['message'] = "Failed to add data.";
			}
		} else {
			$return['message'] = "spec_category_uraian cannot be empty.";
		}

		echo json_encode($return);
	}





	function copy_style_spec()
	{
		$this->authentication->plainlayout();
		$return = array();

		$spec_category_id = $this->input->post('spec_category_id', true);
		$user_id = $this->session->userdata('user_id');

		if ($spec_category_id) {
			$this->rpc_service->setSP("dbo.sp_spec_category_copy");
			$this->rpc_service->addField('spec_category_id', $spec_category_id);
			$this->rpc_service->addField('user_id', $user_id);

			$result = $this->rpc_service->resultJSON_pop();

			if (isset($result)) {
				if (isset($result['valid'])) {
					if ($result['valid']) {
						$return['valid'] = $result['valid'];
						$return['status_code'] = $result['no'];
						$return['message'] = $result['des'];
					} else {
						$return['status_code'] = $result['no'];
						$return['message'] = $result['des'];
					}
				} else {
					$return['status_code'] = 501;
					$return['message'] = "Internal Server Error";
				}
			} else {
				$return['status_code'] = 501;
				$return['message'] = "Internal Server Error";
			}
		} else {
			$return['status_code'] = 400;
			$return['message'] = "Invalid spec_category_id";
		}

		echo json_encode($return);
	}
}
