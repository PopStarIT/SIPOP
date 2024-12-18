<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Style_specification extends CI_Controller
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

	function spec_header_table()
	{
		$view = 'view_spec_header';
		$get_field = $this->ecc_library->get_field_pop($view);

		$get_field['r1']['hidden'] = true;
		$get_field['r2']['hidden'] = true;

		$get_field['r7']['hidden'] = true;
		$get_field['r14']['hidden'] = true;

		return $get_field;
	}

	function table_spec_detail()
	{


		$field = array();
		$field['r1'] = array('sc' => 'r1', 'ctype' => 'text', 'bypassvalue' => '', 'title' => 'DETAIL_ID');
		$field['r2'] = array('sc' => 'r2', 'ctype' => 'text', 'bypassvalue' => '', 'title' => 'ID');
		$field['r3'] = array('sc' => 'r3', 'ctype' => 'text', 'bypassvalue' => '', 'title' => 'SIZE');
		$field['r4'] = array('sc' => 'r4', 'ctype' => 'text', 'bypassvalue' => '', 'title' => 'POINT OF MEASURE');
		$field['r5'] = array('sc' => 'r5', 'ctype' => 'text', 'bypassvalue' => '', 'title' => 'SIZE S');
		$field['r6'] = array('sc' => 'r6', 'ctype' => 'text', 'bypassvalue' => '', 'title' => 'SIZE M');
		$field['r7'] = array('sc' => 'r7', 'ctype' => 'text', 'bypassvalue' => '', 'title' => 'SIZE L');
		$field['r8'] = array('sc' => 'r8', 'ctype' => 'text', 'bypassvalue' => '', 'title' => 'SIZE XL');
		$field['r9'] = array('sc' => 'r9', 'ctype' => 'text', 'bypassvalue' => '', 'title' => 'NOTE');

		return $field;
	}

	function spec_style_detail()
	{
		$view = 'view_spec_detail';
		$get_field = $this->ecc_library->get_field_pop($view);

		$get_field['r1']['hidden'] = true;
		$get_field['r2']['hidden'] = true;
		$get_field['r3']['hidden'] = true;
		$get_field['r6']['hidden'] = true;

		$get_field['r4']['width'] = '300';

		$get_field['r5']['width'] = '250';

		$get_field['r8']['editable'] = true;

		$get_field['act']['sc'] = 'act';
		$get_field['act']['title'] = '#';
		$get_field['act']['bypassvalue'] = '';
		$get_field['act']['ctype'] = 'text';
		$get_field['act']['align'] = 'center';
		$get_field['act']['search'] = false;
		$get_field['act']['sortable'] = false;
		$get_field['act']['formatter'] = 'formatOperations';


		return $get_field;
	}

	function detail_spec_history()
	{
		$view = 'view_spec_history';
		$get_field = $this->ecc_library->get_field_pop($view);

		$get_field['r1']['hidden'] = true;
		$get_field['r2']['hidden'] = true;
		$get_field['r3']['hidden'] = true;
		$get_field['r5']['hidden'] = true;

		$get_field['r4']['title'] = 'Uraian';
		$get_field['r4']['width'] = '150';
		$get_field['r6']['title'] = 'Before Value';
		$get_field['r6']['width'] = '150';
		$get_field['r7']['title'] = 'Edit';
		$get_field['r7']['width'] = '150';
		$get_field['r8']['title'] = 'Edit Date';
		$get_field['r8']['width'] = '150';
		$get_field['r9']['title'] = 'Edit By';
		$get_field['r9']['width'] = '200';

		$get_field['act']['sc'] = 'act';
		$get_field['act']['title'] = '#';
		$get_field['act']['bypassvalue'] = '';
		$get_field['act']['ctype'] = 'text';
		$get_field['act']['align'] = 'center';
		$get_field['act']['search'] = false;
		$get_field['act']['sortable'] = false;
		$get_field['act']['formatter'] = 'formatOperations';


		return $get_field;
	}



	function work_order_plan_material_table()
	{
		$view = 'view_work_order_plan_material';
		$get_field = $this->ecc_library->get_field($view);

		$get_field['r1']['hidden'] = true;
		$get_field['r2']['hidden'] = true;

		return $get_field;
	}

	function work_order_plan_foreacast_table()
	{
		$view = 'view_work_order_plan_forecast';
		$get_field = $this->ecc_library->get_field($view);

		$get_field['r1']['hidden'] = true;
		$get_field['r2']['hidden'] = true;

		return $get_field;
	}

	function index()
	{
		$component['loadlayout'] = true;
		$component['view_load'] = 'sample/style_specification/view';
		$component['view_load_form'] = 'sample/style_specification/form';
		$component['load_js'][] = 'sample/style_specification/view';
		$component['load_js'][] = 'sample/style_specification/form';
		$component['load_js'][] = 'sample/style_specification/js_dynamicLink';

		$component['page_title'] = 'Style Specification';

		// Ambil data untuk select option
		$data['style_spec_details'] = $this->main->get_style_spec_details();

		$dashboard_table = array();

		$nav_button = array();
		$nav_button[] = array('method_id' => 1077, 'title' => 'Add', 'icon' => 'fa fa-plus', 'load' => 'sample/style_specification/function_add');
		$nav_button[] = array('method_id' => 1078, 'title' => 'Edit', 'icon' => 'fa fa-pencil', 'load' => 'sample/style_specification/function_edit');

		$field = $this->spec_header_table();
		$field_detail = $this->spec_style_detail();
		$field_spec_history = $this->detail_spec_history();

		$dashboard_table['nav_button'] = $nav_button;
		$dashboard_table['field'] = $field;
		$dashboard_table['field_detail'] = $field_detail;
		$dashboard_table['field_detail_loaddata'] = 'loaddata_detail';
		$dashboard_table['field_detail_history'] = $field_spec_history;
		$dashboard_table['field_history_loaddata'] = 'loaddata_history';

		$component['dashboard_table'] = $dashboard_table;


		$component['style_spec_details'] = $data['style_spec_details'];

		$this->authentication->ajaxlayout($component);
	}
	function loaddata()
	{

		$this->authentication->plainlayout();
		$view = 'view_spec_header';
		$field = $this->spec_header_table();



		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";

		$loaddata = $this->ecc_library->get_field_data_pop($view, $field);

		echo $loaddata;
	}

	function loaddata_detail_coba()
	{
		$field = array();
		$field[] = array('field' => 'style_spec_detail_id', 'title' => 'detail_id');
		$field[] = array('field' => 'style_spec_header_id', 'title' => 'header_id');
		$field[] = array('field' => 'size', 'title' => 'size');
		$field[] = array('field' => 'point_of_measure', 'title' => 'point_of_measure');
		$field[] = array('field' => 'detail', 'title' => 'detail');
		$field[] = array('field' => 'unit', 'title' => 'unit');
		$field[] = array('field' => 'value', 'title' => 'value');
		$field[] = array('field' => 'size_s', 'title' => 'size_s');
		$field[] = array('field' => 'size_l', 'title' => 'size_l');
		$field[] = array('field' => 'size_xl', 'title' => 'size_xl');
		$field[] = array('field' => 'style_spec_detail_note', 'title' => 'note');


		$style_spec_header_id = isset($_REQUEST['style_spec_header_id']) ? is_numeric($_REQUEST['style_spec_header_id']) ? $_REQUEST['style_spec_header_id']  : -1 : -1;
		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;

		$cek = $_REQUEST['q'];
		if ($cek == '1') {
			$style_spec_detail_id = $_REQUEST['style_spec_header_id'];
		}


		$where = array();
		$where['style_spec_header_id'] = $style_spec_header_id;


		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";
		$loaddata_table = array();

		$view = 'dbo.view_spec_detail';
		$loaddata = $this->ecc_library->loaddata_pop($view, $field, $where);

		foreach ($loaddata['data'] as $key => $value) {
			$this_order[$key] = 0;

			$new_row = array();
			$new_row[] = $value[3];
			$new_row[] = $value[4];
			$new_row[] = $value[6];
			$new_row[] = $value[7];
			$new_row[] = $value[8];

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
	function loaddata_select()
	{

		$data = array();
		$data[] = "1:Entity1";
		$data[] = "2:Entity2";
		$data[] = "3:Entity3";
		$data[] = "4:Entity4";

		echo json_encode($data);
	}
	function loaddata_history()
	{
		$this->authentication->plainlayout();

		$spec_header_id = isset($_REQUEST['spec_history_header_id']) ? is_numeric($_REQUEST['spec_history_header_id']) ? $_REQUEST['spec_history_header_id']  : -1 : -1;
		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;

		$view = 'view_spec_history';
		$field = $this->detail_spec_history();

		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";

		$extra_param = array();
		$extra_param['where']['0']['field'] = 'r2';
		$extra_param['where']['0']['data'] = $spec_header_id;
		$extra_param['methodid'] = $methodid;

		$loaddata_pop = $this->ecc_library->get_field_data_pop($view, $field, $extra_param);
		echo $loaddata_pop;
	}

	function loaddata_detail()
	{
		$this->load->model('main');
		$this->authentication->plainlayout();

		$style_spec_header_id = isset($_REQUEST['style_spec_header_id']) ? is_numeric($_REQUEST['style_spec_header_id']) ? $_REQUEST['style_spec_header_id']  : -1 : -1;
		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;
		$isi_data = isset($_POST['isi_data']) ? $_POST['isi_data'] : array();
		$detail_id = isset($_POST['detail_id']) ? $_POST['detail_id'] : array();

		$cek = $_REQUEST['q'];

		if ($cek == '1') {
			$style_spec_header_id = $_REQUEST['style_spec_header_id'];
		}


		if ($cek == '3') {

			$this->rpc_service->setSP("dbo.sp_spec_detail_edit");
			$dt = $this->main->find_data_pop('dbo.dt_style_spec_detail', 'style_spec_detail_id', $detail_id, '1');


			foreach ($isi_data as $dt_data) {

				$this->rpc_service->addField('item_id', $dt_data['item_id']);
				$this->rpc_service->addField('name_spec', $dt_data['name_spec']);

				$this->rpc_service->addField('nilai_spec', $dt_data['nilai_spec']);
				$this->rpc_service->addField('note', $dt_data['note']);
			}

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
							$return['spec_detail_id'] = $data_result['spec_detail_id'];
						}
					} else {
						$return['status_code'] = $result['no'];
						$return['message'] = $result['des'];
					}
				}
			}
		}

		if ($cek == '4') {
			$model_id = isset($_POST['model_id']) ? $_POST['model_id'] : -1;
			$basic_id = isset($_POST['basic_id']) ? $_POST['basic_id'] : -1;
			$header_id = isset($_POST['header_id']) ? $_POST['header_id'] : -1;

			$this->rpc_service->setSP("dbo.sp_template_spec_copy");

			$this->rpc_service->addField('style_spec_header_id', $header_id);

			$this->rpc_service->addField('style_spec_detail_model_id', $model_id);
			$this->rpc_service->addField('style_spec_detail_size_id', $basic_id);

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
							$return['style_spec_header_id'] = $data_result['style_spec_header_id'];
						}
					} else {
						$return['status_code'] = $result['no'];
						$return['message'] = $result['des'];
					}
				}
			}
			//var_dump($_POST);
		}

		$data_arr = array();
		$alphabet = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH');

		$size = $this->main->find_data_pop('dbo.dt_style_spec_detail', 'style_spec_header_id', $style_spec_header_id, '1');
		$basic = $size[0]['style_spec_detail_size_id'];
		// var_dump($size[0]['style_spec_detail_size_id']);

		$print = isset($_REQUEST['print']) ? $_REQUEST['print'] : 0;
		$format = isset($_REQUEST['format']) ? $_REQUEST['format'] : 'xlsx';
		$page = isset($_POST['page']) ? $_POST['page'] : 1;
		$rows = isset($_POST['rows']) ? $_POST['rows'] : 10;
		$sidx = isset($_POST['sidx']) ? $_POST['sidx'] : 'r2';
		$sord = isset($_POST['sord']) ? $_POST['sord'] : '0';
		$search = isset($_REQUEST['_search']) ? $_REQUEST['_search'] : false;
		$filterRules =  isset($_POST['filters']) ? $_POST['filters'] : false;

		$limit =  $rows;
		$offset =  $rows * ($page - 1);

		if ($sord == 'asc') {
			$sord = 1;
		} else {
			$sord = 2;
		}

		$sort =	$sidx . '=' . $sord;

		$field = $this->table_spec_detail();


		$sp = "dbo.sp_pattern_style_spec_detail";
		$this->rpc_service->setSP($sp);

		$this->rpc_service->addField('style_spec_header_id', $style_spec_header_id);
		$this->rpc_service->addField('style_spec_detail_size_id', $basic);
		$this->rpc_service->addField('format', $format);
		$this->rpc_service->addField('temp_folder', sys_get_temp_dir());
		$this->rpc_service->addField('sort', $sort);
		$this->rpc_service->addField('limit', $limit);
		$this->rpc_service->addField('offset', $offset);

		$this->rpc_service->setWhere($search, $filterRules, $field);

		$this->authentication->plainlayout();
		$result = $this->rpc_service->resultJSON_pop();
		$data_result = json_decode($result['data'], true);

		//var_dump($data_result['detail']);
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

					array_push($data_arr, $value);
					$data_arr[$key]['r13'] = $alphabet[$i];

					$value = $data_arr[$key];


					foreach ($value as $k => $v) {
						if ($k == 'r5' || $k == 'r6' || $k == 'r7' || $k == 'r8' || $k == 'r9' || $k == 'r10' || $k == 'r11') {
							$responce->rows[$i][$k] = $this->mainconfig->decimalToFraction($v);
						} else {
							$responce->rows[$i][$k] = $v;
						}
					}
					$i++;
				}
			}
		}

		echo json_encode($responce);
	}

	//function find_dashboard() {
	function find_formula()
	{
		$this->load->model('main');
		$this->authentication->plainlayout();

		$spec_id = isset($_POST['spec_id']) ? $_POST['spec_id'] : '';
		$formula = isset($_POST['formula']) ? $_POST['formula'] : '';

		$cek = $this->main->find_data_pop('dbo.dt_style_spec_detail', 'style_spec_detail_id', $spec_id, '1');

		$component['formula_spec'] = $cek[0][$formula];

		echo json_encode($component);
	}

	function save_formula()
	{
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();

		$header_id = isset($_POST['header_id']) ? $_POST['header_id'] : '';
		$detail_Spec_id = isset($_POST['spec_id']) ? $_POST['spec_id'] : '';
		$nama_formula = isset($_POST['nama_formula']) ? $_POST['nama_formula'] : '';
		$uraian = isset($_POST['uraian']) ? $_POST['uraian'] : '';
		$nilai_formula = isset($_POST['nilai_formula']) ? $_POST['nilai_formula'] : '';
		$info = isset($_POST['info']) ? $_POST['info'] : '';
		$nilai_db = isset($_POST['nilai_db']) ? $_POST['nilai_db'] : '';
		$nilai_tabel = isset($_POST['nilai_tabel']) ? $_POST['nilai_tabel'] : '';


		$user_id = $this->session->userdata('user_id');

		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";

		$this->rpc_service->setSP("dbo.sp_pattern_spec_detail_formula_add");

		$this->rpc_service->addField('spec_header_id', $header_id);
		$this->rpc_service->addField('spec_detail_id', $detail_Spec_id);
		$this->rpc_service->addField('spec_nama_formula', $nama_formula);
		$this->rpc_service->addField('spec_uraian', $uraian);
		$this->rpc_service->addField('spec_nilai_formula', $nilai_formula);
		$this->rpc_service->addField('spec_information', $info);
		$this->rpc_service->addField('spec_nilai_db', $nilai_db);
		$this->rpc_service->addField('spec_nilai_tabel', $nilai_tabel);

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
						$return['spec_detail_id'] = $data_result['spec_detail_id'];
					}
				} else {
					$return['status_code'] = $result['no'];
					$return['message'] = $result['des'];
				}
			}
		}

		echo json_encode($return);
	}

	function loaddata_detail_old()
	{
		$this->authentication->plainlayout();


		$style_spec_detail_id = isset($_REQUEST['style_spec_header_id']) ? is_numeric($_REQUEST['style_spec_header_id']) ? $_REQUEST['style_spec_header_id']  : -1 : -1;
		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;
		$isi_data = isset($_POST['isi_data']) ? $_POST['isi_data'] : array();

		$cek = $_REQUEST['q'];
		if ($cek == '1') {
			$style_spec_detail_id = $_REQUEST['style_spec_header_id'];
		}


		if ($cek == '3') {

			$this->rpc_service->setSP("dbo.sp_spec_detail_edit");

			foreach ($isi_data as $dt_data) {

				$this->rpc_service->addField('item_id', $dt_data['item_id']);
				$this->rpc_service->addField('name_spec', $dt_data['name_spec']);
				$this->rpc_service->addField('detail_1', $dt_data['detail_1']);
				$this->rpc_service->addField('detail_2', $dt_data['detail_2']);
				$this->rpc_service->addField('nilai_spec', $dt_data['nilai_spec']);
				$this->rpc_service->addField('note', $dt_data['note']);
			}

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
							$return['spec_detail_id'] = $data_result['spec_detail_id'];
						}
					} else {
						$return['status_code'] = $result['no'];
						$return['message'] = $result['des'];
					}
				}
			}
		}

		if ($cek == '4') {
			$model_id = isset($_POST['model_id']) ? $_POST['model_id'] : -1;
			$basic_id = isset($_POST['basic_id']) ? $_POST['basic_id'] : -1;
			$header_id = isset($_POST['header_id']) ? $_POST['header_id'] : -1;

			$this->rpc_service->setSP("dbo.sp_template_spec_copy");

			$this->rpc_service->addField('style_spec_header_id', $header_id);

			$this->rpc_service->addField('style_spec_detail_model_id', $model_id);
			$this->rpc_service->addField('style_spec_detail_size_id', $basic_id);

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
							$return['style_spec_header_id'] = $data_result['style_spec_header_id'];
						}
					} else {
						$return['status_code'] = $result['no'];
						$return['message'] = $result['des'];
					}
				}
			}
		}

		$view = 'view_spec_detail';
		$field = $this->spec_style_detail();

		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";

		$extra_param = array();
		$extra_param['where']['0']['field'] = 'r2';

		$extra_param['where']['0']['data'] = $style_spec_detail_id;
		$extra_param['methodid'] = $methodid;

		$loaddata = $this->ecc_library->get_field_data_pop_spec($view, $field, $extra_param);

		echo $loaddata;
	}

	function loaddata_temporary()
	{
		$this->authentication->plainlayout();


		$style_spec_detail_id = isset($_REQUEST['style_spec_header_id']) ? is_numeric($_REQUEST['style_spec_header_id']) ? $_REQUEST['style_spec_header_id']  : -1 : -1;
		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;
		$isi_data = isset($_POST['isi_data']) ? $_POST['isi_data'] : array();


		$cek = $_REQUEST['q'];
		if ($cek == '1') {
			$spec_model_id = $_REQUEST['spec_model_id'];
		}

		$view = 'view_template_spec_temporary';
		$field = $this->spec_style_detail();

		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";

		$extra_param = array();
		$extra_param['where']['0']['field'] = 'r2';

		$extra_param['where']['0']['data'] = $spec_model_id;
		$extra_param['methodid'] = $methodid;

		$loaddata = $this->ecc_library->get_field_data_pop_spec_temporary($view, $field, $extra_param);

		echo $loaddata;
	}

	function approve()
	{
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();

		$work_order_plan_id = isset($_POST['work_order_plan_id']) ? $_POST['work_order_plan_id'] : false;

		$user_id = $this->session->userdata('user_id');

		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";

		if (count($_POST) > 0) {

			if ($work_order_plan_id) {
				$this->rpc_service->setSP("dbo.sp_work_order_plan_approve");
				$this->rpc_service->addField('work_order_plan_id', $work_order_plan_id);
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

	function finish()
	{
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();

		$work_order_plan_id = isset($_POST['work_order_plan_id']) ? $_POST['work_order_plan_id'] : false;

		$user_id = $this->session->userdata('user_id');

		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";

		if (count($_POST) > 0) {

			if ($work_order_plan_id) {
				$this->rpc_service->setSP("dbo.sp_work_order_plan_finish");
				$this->rpc_service->addField('work_order_plan_id', $work_order_plan_id);
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

		$work_order_plan_id = isset($_POST['work_order_plan_id']) ? $_POST['work_order_plan_id'] : false;

		$user_id = $this->session->userdata('user_id');

		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";

		if (count($_POST) > 0) {

			if ($work_order_plan_id) {
				$this->rpc_service->setSP("dbo.sp_work_order_plan_cancel_approve");
				$this->rpc_service->addField('work_order_plan_id', $work_order_plan_id);
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

		$work_order_plan_id = isset($_POST['work_order_plan_id']) ? $_POST['work_order_plan_id'] : false;

		$user_id = $this->session->userdata('user_id');

		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";

		if (count($_POST) > 0) {

			if ($work_order_plan_id) {
				$this->rpc_service->setSP("dbo.sp_work_order_plan_delete");
				$this->rpc_service->addField('work_order_plan_id', $work_order_plan_id);
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

	function template_spec()
	{
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
		var_dump($POST);
		die();
	}

	function copy_template()
	{
		var_dump($_POST);
		die();
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();

		$style_spec_header_id = isset($_POST['style_spec_header_id']) ? $_POST['style_spec_header_id'] : '';
		$style_spec_detail_id = isset($_POST['style_spec_detail_id']) ? $_POST['style_spec_detail_id'] : '';
		$style_spec_detail_model_id = isset($_POST['style_spec_detail_model_id']) ? $_POST['style_spec_detail_model_id'] : '';
		$style_spec_detail_size_id = isset($_POST['basic_id']) ? $_POST['basic_id'] : '';

		$user_id = $this->session->userdata('user_id');
		//var_dump($style_spec_detail_model_id);die();
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";

		if (count($_POST) > 0) {
			$this->rpc_service->setSP("dbo.sp_template_spec_copy");

			$this->rpc_service->addField('style_spec_header_id', $style_spec_header_id);
			$this->rpc_service->addField('style_spec_detail_id', $style_spec_detail_id);
			$this->rpc_service->addField('style_spec_detail_model_id', $style_spec_detail_model_id);
			$this->rpc_service->addField('style_spec_detail_size_id', $style_spec_detail_size_id);


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
							$return['style_spec_header_id'] = $data_result['style_spec_header_id'];
						}
					} else {
						$return['status_code'] = $result['no'];
						$return['message'] = $result['des'];
					}
				}
			}
		}
	}

	function copy_template_awal()
	{
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();

		$style_spec_header_id = isset($_POST['style_spec_header_id']) ? $_POST['style_spec_header_id'] : '';
		$style_spec_detail_id = isset($_POST['style_spec_detail_id']) ? $_POST['style_spec_detail_id'] : '';
		$style_spec_detail_size_id = isset($_POST['style_spec_detail_size_id']) ? $_POST['style_spec_detail_size_id'] : '';
		$uom_id = isset($_POST['uom_id']) ? $_POST['uom_id'] : '';
		$point_of_measure = isset($_POST['point_of_measure']) ? $_POST['point_of_measure'] : '';

		$user_id = $this->session->userdata('user_id');

		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";

		if (count($_POST) > 0) {
			$this->rpc_service->setSP("dbo.sp_template_spec_copy_copy1");

			$this->rpc_service->addField('style_spec_header_id', $style_spec_header_id);
			$this->rpc_service->addField('style_spec_detail_id', $style_spec_detail_id);
			$this->rpc_service->addField('style_spec_detail_size_id', $style_spec_detail_size_id);
			$this->rpc_service->addField('uom_id', $uom_id);
			$this->rpc_service->addField('point_of_measure', $point_of_measure);
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
							$return['style_spec_header_id'] = $data_result['style_spec_header_id'];
						}
					} else {
						$return['status_code'] = $result['no'];
						$return['message'] = $result['des'];
					}
				}
			}
		}
	}

	function post_add_edit()
	{
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();

		$style_spec_header_id = isset($_POST['style_spec_header_id']) ? $_POST['style_spec_header_id'] : '';
		$style_spec_nomor = isset($_POST['style_spec_nomor']) ? $_POST['style_spec_nomor'] : '';
		$style_spec_date = isset($_POST['style_spec_date']) ? $_POST['style_spec_date'] : '';
		$style_spec_pabric = isset($_POST['style_spec_pabric']) ? $_POST['style_spec_pabric'] : '';
		$style_spec_sub = isset($_POST['style_spec_sub']) ? $_POST['style_spec_sub'] : '';
		$item_id = isset($_POST['item_id']) ? $_POST['item_id'] : '';
		$style_spec_pattern = isset($_POST['style_spec_pattern']) ? $_POST['style_spec_pattern'] : '';
		$susut = isset($_POST['susut']) ? $_POST['susut'] : '';
		$buyer = isset($_POST['buyer']) ? $_POST['buyer'] : '';
		$po = isset($_POST['po']) ? $_POST['po'] : '';
		$note = isset($_POST['note']) ? $_POST['note'] : '';

		$user_id = $this->session->userdata('user_id');

		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";

		if (count($_POST) > 0) {
			if ($style_spec_header_id) {
				$this->rpc_service->setSP("dbo.sp_style_spec_edit");
				$this->rpc_service->addField('style_spec_header_id', $style_spec_header_id);
			} else {
				$this->rpc_service->setSP("dbo.sp_style_spec_add");
			}

			$this->rpc_service->addField('style_spec_nomor', $style_spec_nomor);
			$this->rpc_service->addField('style_spec_date', $style_spec_date);
			$this->rpc_service->addField('style_spec_pabric', $style_spec_pabric);
			$this->rpc_service->addField('style_spec_sub', $style_spec_sub);
			$this->rpc_service->addField('item_id', $item_id);
			$this->rpc_service->addField('style_spec_pattern', $style_spec_pattern);
			$this->rpc_service->addField('susut', $susut);
			$this->rpc_service->addField('buyer', $buyer);
			$this->rpc_service->addField('po', $po);
			$this->rpc_service->addField('note', $note);

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
							$return['style_spec_header_id'] = $data_result['style_spec_header_id'];
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

		$work_order_plan_id = isset($_REQUEST['work_order_plan_id']) ? is_numeric($_REQUEST['work_order_plan_id']) ? $_REQUEST['work_order_plan_id']  : -1 : -1;
		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;

		$view = 'view_work_order_plan_material';
		$field = $this->work_order_plan_material_table();

		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";

		$extra_param = array();
		$extra_param['where']['0']['field'] = 'r2';
		$extra_param['where']['0']['data'] = $work_order_plan_id;
		$extra_param['methodid'] = $methodid;

		$loaddata = $this->ecc_library->get_field_data($view, $field, $extra_param);

		echo $loaddata;
	}
	function post_add_edit_spec()
	{
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();

		$result = array();


		$return['valid'] = false;
		$return['message'] = $_POST['nilai_spec'];

		echo json_encode($return);
	}
	function post_add_edit_detail()
	{
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();

		$work_order_plan_id = isset($_POST['work_order_plan_id']) ? $_POST['work_order_plan_id'] : 0;
		$work_order_id = isset($_POST['work_order_id']) ? $_POST['work_order_id'] : '';
		$item_id = isset($_POST['item_id']) ? $_POST['item_id'] : '';
		$quantity_plan = isset($_POST['quantity_plan']) ? $_POST['quantity_plan'] : '';
		$bom_process_id = isset($_POST['bom_process_id']) ? $_POST['bom_process_id'] : '';
		$mark_up_material = isset($_POST['mark_up_material']) ? $_POST['mark_up_material'] : 0;
		$user_id = $this->session->userdata('user_id');

		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";

		if (count($_POST) > 0) {
			if ($work_order_id) {
				$this->rpc_service->setSP("dbo.sp_work_order_edit");
				$this->rpc_service->addField('work_order_id', $work_order_id);
			} else {
				$this->rpc_service->setSP("dbo.sp_work_order_add");
			}

			$this->rpc_service->addField('work_order_plan_id', $work_order_plan_id);
			$this->rpc_service->addField('item_id', $item_id);
			$this->rpc_service->addField('quantity_plan', $quantity_plan);
			$this->rpc_service->addField('bom_process_id', $bom_process_id);
			$this->rpc_service->addField('mark_up_material', $mark_up_material);

			$result = $this->rpc_service->resultJSON();

			$data = array();
			if (isset($result)) {
				if (isset($result['valid'])) {
					if ($result['valid']) {
						if (isset($result['data'])) {
							$data = json_decode($result['data'], TRUE);

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

	function delete_detail()
	{
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();

		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";

		$work_order_id = isset($_POST['work_order_id']) ? $_POST['work_order_id'] : '';
		$user_id = $this->session->userdata('user_id');


		if (count($_POST) > 0) {

			if ($work_order_id) {
				$this->rpc_service_portal->setSP("dbo.sp_work_order_delete");
				$this->rpc_service_portal->addField('work_order_id', $work_order_id);
			}

			$result = $this->rpc_service_portal->resultJSON();

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

	function loaddata_forecast_material()
	{
		$this->authentication->plainlayout();
		$return = array();

		$field = $this->work_order_plan_foreacast_table();

		$work_order_plan_id = isset($_POST['work_order_plan_id']) ? is_numeric($_POST['work_order_plan_id']) ? $_POST['work_order_plan_id'] : -1 : -1;

		$page = isset($_POST['page']) ? $_POST['page'] : 1;
		$rows = isset($_POST['rows']) ? $_POST['rows'] : 10;
		$sidx = isset($_POST['sidx']) ? $_POST['sidx'] : 'r1';
		$sord = isset($_POST['sord']) ? $_POST['sord'] : 'asc';
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

		$extra_param = array();
		$extra_param['where']['1']['field'] = 'r2';
		$extra_param['where']['1']['data'] = $work_order_plan_id;

		if (isset($extra_param['where'])) {
			foreach ($extra_param['where'] as $dt_where) {
				$have_key = false;

				foreach ($rules as $key => $value) {
					if ($value['field'] == $dt_where['field']) {
						$have_key = true;
						$rules[$key]['data'] = $dt_where['data'];
						break;
					}
				}

				if (!$have_key) {
					$data_where = array();
					$data_where['field'] = $dt_where['field'];
					$data_where['op'] = 'eq';
					$data_where['data'] = $dt_where['data'];
					$rules[] = $data_where;
				}
			}
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

		$sp = "dbo.sp_ecc_load_view_data";
		$this->rpc_service_portal->setSP($sp);
		$this->rpc_service_portal->addField('view', 'view_work_order_plan_forecast');
		$this->rpc_service_portal->addField('sort', $sort);
		$this->rpc_service_portal->addField('limit', $limit);
		$this->rpc_service_portal->addField('offset', $offset);

		$this->rpc_service_portal->setWhere($search, $filterRules, $field);

		$result = $this->rpc_service_portal->resultJSON();
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

	function post_forecast_to_purchase()
	{
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();

		$work_order_plan_id = isset($_POST['work_order_plan_id']) ? $_POST['work_order_plan_id'] : '';
		$request_list = isset($_POST['request_list']) ? $_POST['request_list'] : array();

		$user_id = $this->session->userdata('user_id');

		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";

		if (count($_POST) > 0) {
			if ($work_order_plan_id) {
				$this->rpc_service->setSP("dbo.sp_purchase_request_add_from_plan");
				$this->rpc_service->addField('work_order_plan_id', $work_order_plan_id);
			} else {
				$this->rpc_service->setSP("dbo.sp_purchase_request_add_from_plan");
			}

			foreach ($request_list as $dt_data) {
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

	public function store_detail()
	{
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();

		$style_spec_detail_id = $this->input->post('style_spec_detail_id');
		$style_spec_detail_measure = $this->input->post('style_spec_detail_measure');
		$user_id = $this->input->post('user_id');

		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";

		if (count($_POST) > 0) {
			$this->rpc_service->setSP("dbo.sp_store_style_spec_detail"); // Ganti dengan nama stored procedure Anda

			$this->rpc_service->addField('style_spec_detail_id', $style_spec_detail_id);
			$this->rpc_service->addField('user_id', $user_id);
			$this->rpc_service->addField('style_spec_detail_measure', $style_spec_detail_measure);

			$result = $this->rpc_service->resultJSON_pop();

			$data = array();
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
				}
			}
		} else {
			$return['valid'] = false;
			$return['message'] = "Session expired";
		}

		echo json_encode($return);
	}
}
