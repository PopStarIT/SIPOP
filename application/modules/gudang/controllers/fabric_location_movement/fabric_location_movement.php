<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class fabric_location_movement extends CI_Controller
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

	function fabric_location_movement_table()
	{
		$view = 'view_fabric_location_movement';
		$get_field = $this->ecc_library->get_field_pop($view);
		$get_field['r1']['hidden'] = true;
		$get_field['r2']['hidden'] = true;
		$get_field['r3']['hidden'] = true;
		$get_field['r4']['hidden'] = true;
		$get_field['r5']['hidden'] = true;
		$get_field['r11']['hidden'] = true;


		return $get_field;
	}


	function index()
	{
		$this->load->model('main');
		$component['loadlayout'] = true;
		$component['view_load'] = 'fabric_location_movement/view';
		$component['view_load_form'] = 'fabric_location_movement/form';
		$component['load_js'][] = 'fabric_location_movement/view';
		$component['load_js'][] = 'fabric_location_movement/form';

		$component['page_title'] = "Fabric Location Movement";

		$dashboard_table = array();

		$nav_button = array();


		$field = $this->fabric_location_movement_table();


		$dashboard_table['nav_button'] = $nav_button;
		$dashboard_table['field'] = $field;


		$dashboard_table['caption'] = '.:: Fabric Location Movement ::.';

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

		$view = 'view_fabric_location_movement';
		$field = $this->fabric_location_movement_table();
		$extra_param = array();

		if (!empty($code_barcode)) {
			$extra_param['where'][0]['field'] = 'r12';
			$extra_param['where'][0]['data'] = $code_barcode;
		}

		if ($methodid !== -1) {
			$extra_param['methodid'] = $methodid;
		}

		// Panggil library untuk generate JSON bagi jqGrid
		$loaddata = $this->ecc_library->get_field_data_pop($view, $field, $extra_param);

		echo $loaddata;
	}
}
