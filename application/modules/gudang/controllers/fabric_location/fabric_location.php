<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Fabric_location extends CI_Controller
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

	function location_table()
	{
		$field = array();
		$field['r1']  = array('sc' => 'r1',  'ctype' => 'int',  'bypassvalue' => '', 'title' => 'ITEM ID');
		$field['r2']  = array('sc' => 'r2',  'ctype' => 'text', 'bypassvalue' => '', 'title' => 'ITEM BASE');
		$field['r3']  = array('sc' => 'r3',  'ctype' => 'text', 'bypassvalue' => '', 'title' => 'ITEM DETAIL');
		$field['r4']  = array('sc' => 'r4',  'ctype' => 'date', 'bypassvalue' => '', 'title' => 'ITEM NAME');
		$field['r5']  = array('sc' => 'r5',  'ctype' => 'text', 'bypassvalue' => '', 'title' => 'QTY');
		$field['r6']  = array('sc' => 'r6',  'ctype' => 'text', 'bypassvalue' => '', 'title' => 'QTY USED');
		$field['r7']  = array('sc' => 'r7',  'ctype' => 'text', 'bypassvalue' => '', 'title' => 'UNIT');
		$field['r8']  = array('sc' => 'r8',  'ctype' => 'text', 'bypassvalue' => '', 'title' => 'LOC CODE');
		$field['r9']  = array('sc' => 'r9',  'ctype' => 'text', 'bypassvalue' => '', 'title' => 'BLOCK');
		$field['r10'] = array('sc' => 'r10', 'ctype' => 'text', 'bypassvalue' => '', 'title' => 'LOC TYPE');
		$field['r11'] = array('sc' => 'r11', 'ctype' => 'text', 'bypassvalue' => '', 'title' => 'RACK');
		$field['r12'] = array('sc' => 'r12', 'ctype' => 'text', 'bypassvalue' => '', 'title' => 'WAREHOUSE');
		$field['r13'] = array('sc' => 'r13', 'ctype' => 'text', 'bypassvalue' => '', 'title' => 'BARCODE');
		$field['r14'] = array('sc' => 'r14', 'ctype' => 'int',  'bypassvalue' => '', 'title' => 'item_category_id');
		$field['r15'] = array('sc' => 'r15', 'ctype' => 'int',  'bypassvalue' => '', 'title' => 'location_id');
		$field['r16'] = array('sc' => 'r16', 'ctype' => 'int',  'bypassvalue' => '', 'title' => 'location_base_id');
		$field['r18'] = array('sc' => 'r18', 'ctype' => 'text', 'bypassvalue' => '', 'title' => 'STATUS LOKASI');

		// ✅ TAMBAH INI — kolom virtual untuk tombol, tidak perlu ada di SP
		$field['r_action'] = array('sc' => 'r_action', 'ctype' => 'text', 'bypassvalue' => '', 'title' => 'ACTION');
		return $field;
	}
	function sub_tabel()
	{
		$view = 'view_stock_move_sipop_sub';
		$get_field = $this->ecc_library->get_field_pop($view);
		$get_field['r1']['hidden']  = true;
		$get_field['r7']['hidden']  = true;
		$get_field['r8']['hidden']  = true;
		$get_field['r9']['hidden']  = true;
		$get_field['r12']['hidden']  = true;

		return $get_field;
	}
	function index()
	{
		$this->load->model('main');
		$component['loadlayout'] = true;
		$component['view_load'] = 'fabric_location/view';
		$component['load_js'][] = 'fabric_location/view';

		$component['page_title'] = "Fabric Location";
		$dashboard_table = array();

		$field = $this->location_table();
		$field_sub = $this->sub_tabel();

		$dashboard_table['field'] = $field;

		$dashboard_table['field_sub'] = $field_sub;
		$dashboard_table['field_sub_loaddata'] = 'loaddata_sub';


		$component['dashboard_table'] = $dashboard_table;

		$this->authentication->ajaxlayout($component);
	}

	function loaddata()
	{
		$field = $this->location_table();
		$type_id            = isset($_REQUEST['type_id']) ? $_REQUEST['type_id'] : '';
		$location_base_id   = isset($_REQUEST['location_base_id']) ? $_REQUEST['location_base_id'] : 0;
		$location_id        = isset($_REQUEST['location_id']) ? $_REQUEST['location_id'] : 0;
		$print              = isset($_REQUEST['print']) ? $_REQUEST['print'] : 0;
		$format             = isset($_REQUEST['format']) ? $_REQUEST['format'] : 'xlsx';
		$page               = isset($_POST['page']) ? $_POST['page'] : 1;
		$rows               = isset($_POST['rows']) ? $_POST['rows'] : 10;
		$sidx               = isset($_POST['sidx']) ? $_POST['sidx'] : 'r1';
		$sord               = isset($_POST['sord']) ? $_POST['sord'] : '0';
		$search             = isset($_REQUEST['_search']) ? $_REQUEST['_search'] : false;
		$filterRules        = isset($_POST['filters']) ? $_POST['filters'] : false;

		$fabric_shipment_list_code = isset($_REQUEST['fabric_shipment_list_code']) ? $_REQUEST['fabric_shipment_list_code'] : '';
		$location_code             = isset($_REQUEST['location_code']) ? $_REQUEST['location_code'] : '';
		$location_base_code        = isset($_REQUEST['location_base_code']) ? $_REQUEST['location_base_code'] : '';
		$warehouse_code            = isset($_REQUEST['warehouse_code']) ? $_REQUEST['warehouse_code'] : '';

		$limit  = $rows;
		$offset = $rows * ($page - 1);
		$order  = isset($_REQUEST['order']) ? $_REQUEST['order'] : array();

		if ($sord == 'asc') {
			$sord = 1;
		} else {
			$sord = 2;
		}

		$sort = $sidx . '=' . $sord;

		$return            = array();
		$return['valid']   = false;
		$return['message'] = "Internal Server Error";

		$sp = "dbo.sp_fabric_location_fix";

		if ($print == 1) {
			$this->rpc_service->setSP(array("sp" => $sp, "mode" => "2", "debug" => "1"));
		} else {
			$this->rpc_service->setSP($sp);
		}

		$this->rpc_service->addField('type_id',           $type_id);
		$this->rpc_service->addField('location_base_id',  $location_base_id);
		$this->rpc_service->addField('location_id',       $location_id);
		$this->rpc_service->addField('format',            $format);
		$this->rpc_service->addField('temp_folder',       sys_get_temp_dir());
		$this->rpc_service->addField('sort',              $sort);
		$this->rpc_service->addField('limit',             $limit);
		$this->rpc_service->addField('offset',            $offset);

		$this->rpc_service->addField('fabric_shipment_list_code', $fabric_shipment_list_code);
		$this->rpc_service->addField('location_code',             $location_code);
		$this->rpc_service->addField('location_base_code',        $location_base_code);
		$this->rpc_service->addField('warehouse_code',            $warehouse_code);

		$this->rpc_service->setWhere($search, $filterRules, $field);

		if ($print == 1) {
			$result = $this->rpc_service->resultPrint_laporan('', '', '', '', $format, $date_start, $date_end);
			echo json_encode($result);
		} else {
			$this->authentication->plainlayout();
			$result      = $this->rpc_service->resultJSON_pop();
			$data_result = json_decode($result['data'], true);

			if (isset($data_result['detail']['result_count'])) {
				$records = $data_result['detail']['result_count'];
				$total   = ceil($data_result['detail']['result_count'] / $limit);
			} else {
				$records = 0;
				$total   = 0;
			}

			$responce          = new stdclass();
			$responce->page    = $page;
			$responce->records = $records;
			$responce->total   = $total;

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

			echo json_encode($responce);
		}
	}
	function loaddata_sub()
	{
		$this->authentication->plainlayout();

		// Ambil ID dari request, default ke -1 jika kosong
		$stock_move_sipop_id = $this->input->get_post('stock_move_sipop_id');
		if (!$stock_move_sipop_id) {
			$stock_move_sipop_id = -1;
		}

		$methodid = $this->input->get_post('methodid');

		$view = 'view_stock_move_sipop_sub';
		$field = $this->sub_tabel();

		$extra_param = array();

		$extra_param['where']['0']['field'] = 'r9';
		$extra_param['where']['0']['data'] = $stock_move_sipop_id;
		$extra_param['methodid'] = $methodid;

		$loaddata = $this->ecc_library->get_field_data_pop($view, $field, $extra_param);

		echo $loaddata;
	}
	function post_add_edit_scan_fix()
	{
		$this->load->model('main');
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();

		$code_barcode = isset($_POST['code_barcode']) ? $_POST['code_barcode'] : '';
		$keterangan = isset($_POST['keterangan']) ? $_POST['keterangan'] : 0;
		$stock_move_sipop_id = isset($_POST['stock_move_sipop_id']) ? $_POST['stock_move_sipop_id'] : '';
		if ($code_barcode) {
			$hasil = $this->main->getData_pop("dbo.view_show_item", null, array("fabric_shipment_list_code" => $code_barcode));
			if (!$hasil) {
				$return['valid'] = false;
				$return['status_code'] = '0001';
				$return['message1'] = 'kosong';
				$return['message'] = 'item barang tidak ditemukan, Insert Data';
			} else {

				if ($hasil[0]["location_id"] == null) {
					$return['valid'] = false;
					$return['status_code'] = '0001';
					$return['message1'] = 'update_location';
					$return['message'] = 'alamat lokasi masih kosong, Update Data';

					$return['stock_move_sipop_id'] = $hasil[0]['stock_move_sipop_id'];
					$return['item_code'] = $hasil[0]['item_code'];
					$return['item_name'] = $hasil[0]['item_name'];
				} else {

					if ($keterangan == 1) {
						$this->rpc_service->setSP("dbo.sp_fabric_location_barcode_edit");
						$this->rpc_service->addField('stock_move_sipop_id', $stock_move_sipop_id);
					} else {
						$this->rpc_service->setSP("dbo.sp_fabric_location_barcode_fix");
					}

					$this->rpc_service->addField('code_barcode', $code_barcode);

					$result = $this->rpc_service->resultJSON_pop();

					$data = array();
					if (isset($result)) {

						if (isset($result['valid'])) {

							$data_result = json_decode($result['data'], true);

							if ($result['valid']) {
								if (isset($result['data'])) {
									$return['valid'] = $result['valid'];
									$return['status_code'] = $result['no'];
									$return['message'] = $result['des'];
								} else {
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
				}
			}
		}
		echo json_encode($return);
	}

	function post_add_edit_update()
	{
		$this->load->model('main');
		$this->authentication->plainlayout();
		$return = array();

		$stock_move_sipop_id = isset($_POST['stock_move_sipop_id']) ? $_POST['stock_move_sipop_id'] : '';
		$location_id = isset($_POST['location_id']) ? $_POST['location_id'] : '';

		$user_id = $this->session->userdata('user_id');
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";

		if (count($_POST) > 0) {
			if ($stock_move_sipop_id) {
				$this->rpc_service->setSP("dbo.sp_fabric_location_update");
				$this->rpc_service->addField('stock_move_sipop_id', $stock_move_sipop_id);
				$this->rpc_service->addField('location_id', $location_id);
			} else {
				$this->rpc_service->setSP("dbo.sp_fabric_location_add");
			}
			$this->rpc_service->addField('stock_move_sipop_id', $stock_move_sipop_id);
			$this->rpc_service->addField('location_id', $location_id);

			$result = $this->rpc_service->resultJSON_pop();
			$data = array();
			if (isset($result)) {
				if (isset($result['valid'])) {
					if ($result['valid']) {
						if (isset($result['data'])) {
							$data = json_decode($result['data'], TRUE);
							$stock_move_sipop_id = $data['stock_move_sipop_id'];
							$location_id = $data['location_id'];

							$return['valid'] = $result['valid'];
							$return['status_code'] = $result['no'];
							$return['message'] = $result['des'];
							$return['stock_move_sipop_id'] = $stock_move_sipop_id;
							$return['location_id'] = $location_id;
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

	function post_add_edit_update_other_split()
	{
		$this->load->model('main');
		$this->authentication->plainlayout();
		$return = array();
		$stock_move_sipop_id = isset($_POST['stock_move_sipop_id']) ? $_POST['stock_move_sipop_id'] : '';
		$location_id = isset($_POST['location_id']) ? $_POST['location_id'] : '';
		$parent_id = isset($_POST['parent_id']) ? $_POST['parent_id'] : '';
		$item_id = isset($_POST['item_id']) ? $_POST['item_id'] : '';
		$quantity = isset($_POST['quantity']) ? $_POST['quantity'] : '';
		$fabric_shipment_list_code = isset($_POST['fabric_shipment_list_code']) ? $_POST['fabric_shipment_list_code'] : '';
		$stock_move_date = isset($_POST['stock_move_date']) ? $_POST['stock_move_date'] : '';
		// $fabric_shipment_no = isset($_POST['fabric_shipment_no']) ? $_POST['fabric_shipment_no'] : '';
		// $fabric_warehouse_receive_date = isset($_POST['fabric_warehouse_receive_date']) ? $_POST['fabric_warehouse_receive_date'] : '';
		// $purchase_order_warehouse_id = isset($_POST['purchase_order_warehouse_id']) ? $_POST['purchase_order_warehouse_id'] : '';
		// $fabric_shipment_colour = isset($_POST['fabric_shipment_colour']) ? $_POST['fabric_shipment_colour'] : '';
		// $fabric_shipment_lot = isset($_POST['fabric_shipment_lot']) ? $_POST['fabric_shipment_lot'] : '';
		// $fabric_shipment_bale = isset($_POST['fabric_shipment_bale']) ? $_POST['fabric_shipment_bale'] : '';
		// $fabric_shipment_roll = isset($_POST['fabric_shipment_roll']) ? $_POST['fabric_shipment_roll'] : '';
		// $fabric_shipment_weight = isset($_POST['fabric_shipment_weight']) ? $_POST['fabric_shipment_weight'] : '';
		// $uom_id = isset($_POST['uom_id']) ? $_POST['uom_id'] : '';
		$user_id = $this->session->userdata('user_id');
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";

		if (count($_POST) > 0) {
			if ($stock_move_sipop_id) {

				$this->rpc_service->setSP("dbo.sp_fabric_location_add_new_other_split");
				$this->rpc_service->addField('fabric_shipment_list_code', $fabric_shipment_list_code);
				// $this->rpc_service->addField('fabric_shipment_no', $fabric_shipment_no);
				// $this->rpc_service->addField('fabric_warehouse_receive_date', $fabric_warehouse_receive_date);
				// $this->rpc_service->addField('purchase_order_warehouse_id', $purchase_order_warehouse_id);
				// $this->rpc_service->addField('fabric_shipment_colour', $fabric_shipment_colour);
				// $this->rpc_service->addField('fabric_shipment_lot', $fabric_shipment_lot);
				// $this->rpc_service->addField('fabric_shipment_bale', $fabric_shipment_bale);
				// $this->rpc_service->addField('fabric_shipment_roll', $fabric_shipment_roll);
				// $this->rpc_service->addField('fabric_shipment_weight', $fabric_shipment_weight);
				// $this->rpc_service->addField('uom_id', $uom_id);
				$this->rpc_service->addField('stock_move_date', $stock_move_date);
				$this->rpc_service->addField('stock_move_sipop_id', $stock_move_sipop_id);
				$this->rpc_service->addField('quantity', $quantity);
			}
			// $this->rpc_service->addField('fabric_shipment_no', $fabric_shipment_no);
			// $this->rpc_service->addField('fabric_warehouse_receive_date', $fabric_warehouse_receive_date);
			// $this->rpc_service->addField('purchase_order_warehouse_id', $purchase_order_warehouse_id);
			// $this->rpc_service->addField('fabric_shipment_colour', $fabric_shipment_colour);
			// $this->rpc_service->addField('fabric_shipment_lot', $fabric_shipment_lot);
			// $this->rpc_service->addField('fabric_shipment_bale', $fabric_shipment_bale);
			// $this->rpc_service->addField('fabric_shipment_roll', $fabric_shipment_roll);
			// $this->rpc_service->addField('fabric_shipment_weight', $fabric_shipment_weight);
			// $this->rpc_service->addField('uom_id', $uom_id);
			$this->rpc_service->addField('stock_move_sipop_id', $stock_move_sipop_id);
			$this->rpc_service->addField('location_id', $location_id);
			$this->rpc_service->addField('parent_id', $parent_id);

			$this->rpc_service->addField('item_id', $item_id);
			$this->rpc_service->addField('quantity', $quantity);
			$this->rpc_service->addField('stock_move_date', $stock_move_date);

			$result = $this->rpc_service->resultJSON_pop();

			$data = array();
			if (isset($result)) {
				if (isset($result['valid'])) {
					if ($result['valid']) {
						if (isset($result['data'])) {
							$data = json_decode($result['data'], TRUE);
							$stock_move_sipop_id = $data['stock_move_sipop_id'];
							$location_id = $data['location_id'];
							// $fabric_shipment_no = $data['fabric_shipment_no'];
							// $fabric_warehouse_receive_date = $data['fabric_warehouse_receive_date'];
							// $purchase_order_warehouse_id = $data['purchase_order_warehouse_id'];
							// $fabric_shipment_colour = $data['fabric_shipment_colour'];
							// $fabric_shipment_lot = $data['fabric_shipment_lot'];
							// $fabric_shipment_bale = $data['fabric_shipment_bale'];
							// $fabric_shipment_roll = $data['fabric_shipment_roll'];
							// $fabric_shipment_weight = $data['fabric_shipment_weight'];
							// $uom_id = $data['uom_id'];
							$parent_id = $data['parent_id'];
							$stock_move_date = $data['stock_move_date'];
							$quantity = $data['quantity'];
							$return['valid'] = $result['valid'];
							$return['status_code'] = $result['no'];
							$return['message'] = $result['des'];
							$return['stock_move_sipop_id'] = $stock_move_sipop_id;
							$return['location_id'] = $location_id;
							$return['quantity'] = $quantity;
							// $return['fabric_shipment_no'] = $fabric_shipment_no;
							// $return['fabric_warehouse_receive_date'] = $fabric_warehouse_receive_date;
							// $return['purchase_order_warehouse_id'] = $purchase_order_warehouse_id;
							// $return['fabric_shipment_colour'] = $fabric_shipment_colour;
							// $return['fabric_shipment_lot'] = $fabric_shipment_lot;
							// $return['fabric_shipment_bale'] = $fabric_shipment_bale;
							// $return['fabric_shipment_roll'] = $fabric_shipment_roll;
							// $return['fabric_shipment_weight'] = $fabric_shipment_weight;
							// $return['uom_id'] = $uom_id;
							$return['stock_move_date'] = $stock_move_date;
							$return['parent_id'] = $parent_id;
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

	function post_add_edit_item_new()
	{
		$this->load->model('main');
		$this->authentication->plainlayout();
		$return = array();

		$stock_move_sipop_id = isset($_POST['stock_move_sipop_id']) ? $_POST['stock_move_sipop_id'] : '';
		$location_id = isset($_POST['location_id']) ? $_POST['location_id'] : '';

		$item_id = isset($_POST['item_id']) ? $_POST['item_id'] : '';
		$quantity = isset($_POST['quantity']) ? $_POST['quantity'] : '';
		$fabric_shipment_list_code = isset($_POST['fabric_shipment_list_code']) ? $_POST['fabric_shipment_list_code'] : '';
		$stock_move_date = isset($_POST['stock_move_date']) ? $_POST['stock_move_date'] : '';




		$fabric_shipment_no = isset($_POST['fabric_shipment_no']) ? $_POST['fabric_shipment_no'] : '';
		$fabric_warehouse_receive_date = isset($_POST['fabric_warehouse_receive_date']) ? $_POST['fabric_warehouse_receive_date'] : '';
		$purchase_order_warehouse_id = isset($_POST['purchase_order_warehouse_id']) ? $_POST['purchase_order_warehouse_id'] : '';
		$fabric_shipment_colour = isset($_POST['fabric_shipment_colour']) ? $_POST['fabric_shipment_colour'] : '';
		$fabric_shipment_lot = isset($_POST['fabric_shipment_lot']) ? $_POST['fabric_shipment_lot'] : '';
		$fabric_shipment_bale = isset($_POST['fabric_shipment_bale']) ? $_POST['fabric_shipment_bale'] : '';
		$fabric_shipment_roll = isset($_POST['fabric_shipment_roll']) ? $_POST['fabric_shipment_roll'] : '';
		$fabric_shipment_weight = isset($_POST['fabric_shipment_weight']) ? $_POST['fabric_shipment_weight'] : '';
		$uom_id = isset($_POST['uom_id']) ? $_POST['uom_id'] : '';




		$user_id = $this->session->userdata('user_id');
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";

		if (count($_POST) > 0) {
			if ($stock_move_sipop_id) {
				$this->rpc_service->setSP("dbo.sp_fabric_location_update_new");
				$this->rpc_service->addField('stock_move_sipop_id', $stock_move_sipop_id);
				$this->rpc_service->addField('location_id', $location_id);

				$this->rpc_service->addField('item_id', $item_id);
				$this->rpc_service->addField('quantity', $quantity);
				$this->rpc_service->addField('fabric_shipment_list_code', $fabric_shipment_list_code);
			} else {
				$this->rpc_service->setSP("dbo.sp_fabric_item_location_add_new");
				$this->rpc_service->addField('fabric_shipment_list_code', $fabric_shipment_list_code);
				$this->rpc_service->addField('fabric_shipment_no', $fabric_shipment_no);
				$this->rpc_service->addField('fabric_warehouse_receive_date', $fabric_warehouse_receive_date);
				$this->rpc_service->addField('purchase_order_warehouse_id', $purchase_order_warehouse_id);
				$this->rpc_service->addField('fabric_shipment_colour', $fabric_shipment_colour);
				$this->rpc_service->addField('fabric_shipment_lot', $fabric_shipment_lot);
				$this->rpc_service->addField('fabric_shipment_bale', $fabric_shipment_bale);
				$this->rpc_service->addField('fabric_shipment_roll', $fabric_shipment_roll);
				$this->rpc_service->addField('fabric_shipment_weight', $fabric_shipment_weight);
				$this->rpc_service->addField('uom_id', $uom_id);
				$this->rpc_service->addField('stock_move_date', $stock_move_date);
			}
			$this->rpc_service->addField('fabric_shipment_no', $fabric_shipment_no);
			$this->rpc_service->addField('fabric_warehouse_receive_date', $fabric_warehouse_receive_date);
			$this->rpc_service->addField('purchase_order_warehouse_id', $purchase_order_warehouse_id);
			$this->rpc_service->addField('fabric_shipment_colour', $fabric_shipment_colour);
			$this->rpc_service->addField('fabric_shipment_lot', $fabric_shipment_lot);
			$this->rpc_service->addField('fabric_shipment_bale', $fabric_shipment_bale);
			$this->rpc_service->addField('fabric_shipment_roll', $fabric_shipment_roll);
			$this->rpc_service->addField('fabric_shipment_weight', $fabric_shipment_weight);
			$this->rpc_service->addField('uom_id', $uom_id);
			$this->rpc_service->addField('stock_move_sipop_id', $stock_move_sipop_id);
			$this->rpc_service->addField('location_id', $location_id);

			$this->rpc_service->addField('item_id', $item_id);
			$this->rpc_service->addField('quantity', $quantity);
			$this->rpc_service->addField('stock_move_date', $stock_move_date);

			$result = $this->rpc_service->resultJSON_pop();

			$data = array();
			if (isset($result)) {
				if (isset($result['valid'])) {
					if ($result['valid']) {
						if (isset($result['data'])) {
							$data = json_decode($result['data'], TRUE);
							$stock_move_sipop_id = $data['stock_move_sipop_id'];
							$location_id = $data['location_id'];
							$fabric_shipment_no = $data['fabric_shipment_no'];
							$fabric_warehouse_receive_date = $data['fabric_warehouse_receive_date'];
							$purchase_order_warehouse_id = $data['purchase_order_warehouse_id'];
							$fabric_shipment_colour = $data['fabric_shipment_colour'];
							$fabric_shipment_lot = $data['fabric_shipment_lot'];
							$fabric_shipment_bale = $data['fabric_shipment_bale'];
							$fabric_shipment_roll = $data['fabric_shipment_roll'];
							$fabric_shipment_weight = $data['fabric_shipment_weight'];
							$uom_id = $data['uom_id'];
							$stock_move_date = $data['stock_move_date'];




							$return['valid'] = $result['valid'];
							$return['status_code'] = $result['no'];
							$return['message'] = $result['des'];
							$return['stock_move_sipop_id'] = $stock_move_sipop_id;
							$return['location_id'] = $location_id;
							$return['fabric_shipment_no'] = $fabric_shipment_no;
							$return['fabric_warehouse_receive_date'] = $fabric_warehouse_receive_date;
							$return['purchase_order_warehouse_id'] = $purchase_order_warehouse_id;
							$return['fabric_shipment_colour'] = $fabric_shipment_colour;
							$return['fabric_shipment_lot'] = $fabric_shipment_lot;
							$return['fabric_shipment_bale'] = $fabric_shipment_bale;
							$return['fabric_shipment_roll'] = $fabric_shipment_roll;
							$return['fabric_shipment_weight'] = $fabric_shipment_weight;
							$return['uom_id'] = $uom_id;
							$return['stock_move_date'] = $stock_move_date;
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
	function post_add_edit_item_shipment()
	{
		$this->load->model('main');
		$this->authentication->plainlayout();
		$return = array();

		$stock_move_sipop_id                 = isset($_POST['stock_move_sipop_id'])
			? $_POST['stock_move_sipop_id'] : '';
		$location_id                         = isset($_POST['location_id'])
			? $_POST['location_id'] : '';
		$item_id                             = isset($_POST['item_id'])
			? $_POST['item_id'] : '';
		$fabric_shipment_list_code           = isset($_POST['fabric_shipment_list_code'])
			? $_POST['fabric_shipment_list_code'] : '';
		$purchase_order_detail_id            = isset($_POST['purchase_order_detail_id'])
			? $_POST['purchase_order_detail_id'] : '';
		$fabric_warehouse_receive_id         = isset($_POST['fabric_warehouse_receive_id'])
			? $_POST['fabric_warehouse_receive_id'] : '';

		$fabric_warehouse_receive_detail_ids = isset($_POST['fabric_warehouse_receive_detail_ids'])
			? $_POST['fabric_warehouse_receive_detail_ids'] : '';

		$user_id = $this->session->userdata('user_id');

		$return['valid']       = false;
		$return['status_code'] = 501;
		$return['message']     = "Internal Server Error";

		if (count($_POST) > 0) {

			if ($stock_move_sipop_id) {

				$this->rpc_service->setSP("dbo.sp_fabric_location_update_new");
				$this->rpc_service->addField('stock_move_sipop_id',                  $stock_move_sipop_id);
				$this->rpc_service->addField('location_id',                          $location_id);
				$this->rpc_service->addField('fabric_shipment_list_code',            $fabric_shipment_list_code);
				$this->rpc_service->addField('purchase_order_detail_id',             $purchase_order_detail_id);
				$this->rpc_service->addField('item_id',                              $item_id);
				$this->rpc_service->addField('fabric_warehouse_receive_id',          $fabric_warehouse_receive_id);
				$this->rpc_service->addField('fabric_warehouse_receive_detail_ids',  $fabric_warehouse_receive_detail_ids);
			} else {

				$this->rpc_service->setSP("dbo.sp_fabric_shipment_location_add_new");
				$this->rpc_service->addField('location_id',                          $location_id);
				$this->rpc_service->addField('fabric_shipment_list_code',            $fabric_shipment_list_code);
				$this->rpc_service->addField('purchase_order_detail_id',             $purchase_order_detail_id);
				$this->rpc_service->addField('item_id',                              $item_id);
				$this->rpc_service->addField('fabric_warehouse_receive_id',          $fabric_warehouse_receive_id);
				$this->rpc_service->addField('fabric_warehouse_receive_detail_ids',  $fabric_warehouse_receive_detail_ids);
			}

			$result = $this->rpc_service->resultJSON_pop();

			if (isset($result['valid']) && $result['valid']) {
				if (isset($result['data'])) {
					$data = json_decode($result['data'], TRUE);

					$return['valid']                             = true;
					$return['status_code']                       = $result['no'];
					$return['message']                           = $result['des'];
					$return['stock_move_sipop_id']               = isset($data['stock_move_sipop_id']) ? $data['stock_move_sipop_id'] : '';
					$return['location_id']                       = isset($data['location_id'])         ? $data['location_id']         : '';
					$return['item_id']                           = $item_id;
					$return['purchase_order_detail_id']          = $purchase_order_detail_id;
					$return['fabric_warehouse_receive_id']       = $fabric_warehouse_receive_id;
					$return['fabric_warehouse_receive_detail_ids'] = $fabric_warehouse_receive_detail_ids;
					$return['rows_updated']                      = isset($data['rows_updated']) ? $data['rows_updated'] : 0;
				}
			} else {
				$return['status_code'] = isset($result['no'])  ? $result['no']  : '9999';
				$return['message']     = isset($result['des']) ? $result['des'] : 'Unknown error';
			}
		} else {
			$return['valid']   = false;
			$return['message'] = "Session expired";
		}

		echo json_encode($return);
	}
	function get_fabric_warehouse_receive_detail_ids()
	{
		$this->load->model('main');
		$this->authentication->plainlayout();

		$item_id                     = isset($_POST['item_id'])
			? $_POST['item_id'] : '';
		$fabric_warehouse_receive_id = isset($_POST['fabric_warehouse_receive_id'])
			? $_POST['fabric_warehouse_receive_id'] : '';

		$csrf_token_name  = $this->security->get_csrf_token_name();
		$csrf_token_value = $this->security->get_csrf_hash();

		$return = array(
			'valid'                               => false,
			'message'                             => '',
			'item_id'                             => $item_id,
			'fabric_warehouse_receive_id'         => $fabric_warehouse_receive_id,
			'fabric_warehouse_receive_detail_ids' => '',
			$csrf_token_name                      => $csrf_token_value
		);

		if (!$item_id || !$fabric_warehouse_receive_id) {
			$return['message'] = 'Parameter item_id atau fabric_warehouse_receive_id kosong.';
			echo json_encode($return);
			return;
		}

		$where = array(
			'item_id'                     => $item_id,
			'fabric_warehouse_receive_id' => $fabric_warehouse_receive_id
		);

		$data_table = $this->main->getData_pop(
			'dbo.view_shipment_po',
			null,
			$where,
			null,
			null,
			1,
			0
		);

		if ($data_table && count($data_table) > 0) {
			$row = $data_table[0];

			// fabric_warehouse_receive_detail_id berisi CSV "551,553,554,..."
			$detail_ids = isset($row['fabric_warehouse_receive_detail_id'])
				? $row['fabric_warehouse_receive_detail_id']
				: '';
			$return['valid']                               = true;
			$return['message']                             = 'OK';
			$return['fabric_warehouse_receive_detail_ids'] = $detail_ids;
		} else {
			$return['message'] = 'Data tidak ditemukan untuk item_id=' . $item_id
				. ' fabric_warehouse_receive_id=' . $fabric_warehouse_receive_id;
		}

		echo json_encode($return);
	}
	function post_add_edit_scan()
	{
		$this->load->model('main');
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();

		$code_barcode = isset($_POST['code_barcode']) ? $_POST['code_barcode'] : '';
		$keterangan = isset($_POST['keterangan']) ? $_POST['keterangan'] : 0;
		$stock_move_sipop_id = isset($_POST['stock_move_sipop_id']) ? $_POST['stock_move_sipop_id'] : '';
		if ($code_barcode) {
			$hasil = $this->main->getData_pop("dbo.view_show_item", null, array("fabric_shipment_list_code" => $code_barcode));
			if (!$hasil) {
				$return['valid'] = false;
				$return['status_code'] = '0001';
				$return['message1'] = 'kosong';
				$return['message'] = 'item barang tidak ditemukan, Insert Data';
			} else {

				if ($hasil[0]["location_id"] == null) {
					$return['valid'] = false;
					$return['status_code'] = '0001';
					$return['message1'] = 'update_location';
					$return['message'] = 'alamat lokasi masih kosong, Update Data';
					$return['stock_move_sipop_id'] = $hasil[0]['stock_move_sipop_id'];
					$return['item_code'] = $hasil[0]['item_code'];
					$return['item_name'] = $hasil[0]['item_name'];
				} else {
					if ($keterangan == 1) {
						$this->rpc_service->setSP("dbo.sp_fabric_location_barcode_edit");
						$this->rpc_service->addField('stock_move_sipop_id', $stock_move_sipop_id);
					} else {
						$this->rpc_service->setSP("dbo.sp_fabric_location_barcode");
					}
					$this->rpc_service->addField('code_barcode', $code_barcode);
					$result = $this->rpc_service->resultJSON_pop();
					$data = array();
					if (isset($result)) {
						if (isset($result['valid'])) {
							$data_result = json_decode($result['data'], true);
							if ($result['valid']) {
								if (isset($result['data'])) {
									$return['valid'] = $result['valid'];
									$return['status_code'] = $result['no'];
									$return['message'] = $result['des'];
								} else {
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
				}
			}
		}
		echo json_encode($return);
	}

	function cetak_shipment_list_code()
	{
		$this->db_pop = $this->load->database('pop', TRUE);
		$stock_move_id = (isset($_GET['stock_move_id']) && !empty($_GET['stock_move_id'])) ? $_GET['stock_move_id'] : die('{"sts":"ERROR","desc":" Param Header Tidak Ditemukan"}');
		$data['stock_move_id'] = $stock_move_id;
		// $this->load->view('draft/warehouse/draft_barcode',$data);
		$this->load->view('draft/warehouse/draft_cetak_shipment_list_code', $data);
	}
}
