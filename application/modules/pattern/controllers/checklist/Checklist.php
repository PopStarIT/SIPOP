		<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

		class Checklist extends CI_Controller
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

			function spec_table()
			{
				$this->load->model('main'); // Pastikan model `main` diload
				$spec_data = $this->main->get_spec(); // Tambahkan fungsi di model `main` untuk mengambil data
				return $spec_data;
			}
			function list_table()
			{
				$this->load->model('main'); // Pastikan model `main` diload
				$list_data = $this->main->get_list(); // Tambahkan fungsi di model `main` untuk mengambil data
				return $list_data;
			}

			function checklist_table()
			{
				$view = 'view_checklist';
				$get_field = $this->ecc_library->get_field_pop($view);





				// $get_field['act']['sc'] = 'act';
				// $get_field['act']['title'] = '#';
				// $get_field['act']['bypassvalue'] = '';
				// $get_field['act']['ctype'] = 'text';
				// $get_field['act']['align'] = 'center';
				// $get_field['act']['search'] = false;
				// $get_field['act']['sortable'] = false;
				// $get_field['act']['formatter'] = 'formatOperations';
				// $get_field['act']['width'] = 300;

				return $get_field;
			}

			function index()
			{

				$this->load->model('main');
				$component['loadlayout'] = true;
				$component['view_load'] = 'checklist/view';
				$component['view_load_form'] = 'checklist/form';
				$component['view_load_form_checklist'] = 'checklist/form_checklist';
				$component['load_js'][] = 'checklist/view';
				$component['load_js'][] = 'checklist/form';
				$component['load_js_checklist'][] = 'checklist/form_checklist';

				$component['page_title'] = "Master checklist";

				$dashboard_table = array();

				$nav_button = array();
				$nav_button[] = array('method_id' => 781107, 'title' => 'Add', 'icon' => 'fa fa-plus', 'load' => 'checklist/function_add');
				$nav_button[] = array('method_id' => 781108, 'title' => 'Edit', 'icon' => 'fa fa-pencil', 'load' => 'checklist/function_edit');

				$nav_button[] = array('method_id' => 781109, 'title' => 'Delete', 'icon' => 'fa fa-trash-o', 'load' => 'checklist/function_delete');


				$field = $this->checklist_table();
				$field_spec = $this->spec_table();
				$field_list = $this->list_table();

				$dashboard_table['nav_button'] = $nav_button;
				$dashboard_table['field'] = $field;
				$component['field_spec'] = $field_spec;
				$component['field_list'] = $field_list;

				$component['dashboard_table'] = $dashboard_table;

				$this->authentication->ajaxlayout($component);
			}

			function loaddata()
			{
				$this->authentication->plainlayout();

				$view = 'view_checklist';
				$field = $this->checklist_table();
				$view_spec = 'view_spec';
				$field_spec = $this->spec_table();
				$view_list = 'view_list';
				$field_list = $this->list_table();
				$return = array();
				$return['valid'] = false;
				$return['message'] = "Internal Server Error";

				$loaddata = $this->ecc_library->get_field_data_pop($view, $field, $view_spec, $field_spec, $view_list, $field_list);

				echo $loaddata;
			}


			function delete()
			{
				$this->authentication->plainlayout();
				$checklist_id = $this->input->post('checklist_id', true);
				$return = ['valid' => false, 'status_code' => 501, 'message' => "Internal Server Error"];

				if ($checklist_id) {
					$this->rpc_service->setSP("dbo.sp_checklist_delete");
					$this->rpc_service->addField('checklist_id', $checklist_id);
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
			function post_add_edit()
			{
				$this->authentication->plainlayout();
				$return = array();

				// Mengambil data dari form POST
				$checklist_id = $this->input->post('checklist_id', true);
				$list = $this->input->post('list', true);

				$return['valid'] = false;
				$return['status_code'] = 501;
				$return['message'] = "Internal Server Error";

				if ($list !== false) { // Ensure list is not empty
					if ($checklist_id) {
						$this->rpc_service->setSP("dbo.sp_checklist_edit");
						$this->rpc_service->addField('checklist_id', $checklist_id);
					} else {
						$this->rpc_service->setSP("dbo.sp_checklist_add");
					}

					$this->rpc_service->addField('list', $list);
					$result = $this->rpc_service->resultJSON_pop();

					if (isset($result)) {
						$return['valid'] = true;
						$return['message'] = "Data successfully added.";
						// Add additional response handling as needed
					} else {
						$return['message'] = "Failed to add data.";
					}
				} else {
					$return['message'] = "List cannot be empty.";
				}

				echo json_encode($return);
			}
		}
