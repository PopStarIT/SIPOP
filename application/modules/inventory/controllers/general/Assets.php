<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Assets extends CI_Controller
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

	function assets_table()
	{
		$view = 'view_data_assets';
		$get_field = $this->ecc_library->get_field($view);

		$get_field['r1']['hidden'] = true;
		$get_field['r6']['hidden'] = true;
		$get_field['r7']['hidden'] = true;
		$get_field['r8']['hidden'] = true;
		$get_field['r9']['hidden'] = true;
		$get_field['r10']['hidden'] = true;

		return $get_field;
	}

	function incoming_table()
	{
		$view = 'view_data_assets_incoming';
		$get_field = $this->ecc_library->get_field($view);

		$get_field['r1']['hidden'] = true;
		$get_field['r15']['hidden'] = true;

		$get_field['r6']['footer'] = 'Total Incoming :';
		$get_field['r7']['footer'] = 'sum';
		$get_field['r8']['footer'] = 'sum';
		$get_field['r9']['footer'] = 'sum';

		return $get_field;
	}

	function incoming_transfer_table()
	{
		$view = 'view_data_assets_incoming_detail';
		$get_field = $this->ecc_library->get_field_pop($view);
		$get_field['r1']['hidden'] = true;
		$get_field['r2']['hidden'] = true;
		$get_field['r3']['hidden'] = true;
		$get_field['r11']['hidden'] = true;

		$get_field['r8']['footer'] = 'Total Detail :';
		$get_field['r9']['footer'] = 'sum';
		return $get_field;
	}

	function outgoing_table()
	{

		$view = 'view_data_assets_outgoing';
		$get_field = $this->ecc_library->get_field($view);

		$get_field['r1']['hidden'] = true;
		$get_field['r13']['hidden'] = true;

		$get_field['r6']['footer'] = 'Total Outgoing :';
		$get_field['r7']['footer'] = 'sum';

		return $get_field;
	}

	function outgoing_transfer_item_table()
	{
		$view = 'view_data_assets_outgoing_transfer';
		$get_field = $this->ecc_library->get_field_pop($view);
		$get_field['r1']['hidden'] = true;
		$get_field['r7']['hidden'] = true;
		$get_field['r12']['hidden'] = true;
		$get_field['r13']['hidden'] = true;
		$get_field['r14']['hidden'] = true;
		$get_field['r16']['hidden'] = true;
		$get_field['r17']['hidden'] = true;
		$get_field['r18']['hidden'] = true;


		return $get_field;
	}

	function index()
	{
		$this->load->model('main');
		$component['loadlayout'] = true;
		$component['view_load'] = 'general/assets/view';
		$component['load_js'][] = 'general/assets/view';

		$component['page_title'] = "Assets";
		$dashboard_table = array();

		$field_asset = $this->assets_table();
		$field_incoming = $this->incoming_table();
		$field_incoming_transfer = $this->incoming_transfer_table();
		$field_outgoing = $this->outgoing_table();
		$field_outgoing_transfer = $this->outgoing_transfer_item_table();


		$dashboard_table['field_asset'] = $field_asset;
		$dashboard_table['field_asset_loaddata'] = 'loaddata_assets';

		$dashboard_table['field_incoming'] = $field_incoming;
		$dashboard_table['field_incoming_loaddata'] = 'loaddata_incoming';

		$dashboard_table['field_incoming_transfer'] = $field_incoming_transfer;
		$dashboard_table['field_incoming_transfer_loaddata'] = 'loaddata_incoming_detail';

		$dashboard_table['field_outgoing'] = $field_outgoing;
		$dashboard_table['field_outgoing_loaddata'] = 'loaddata_outgoing';

		//$dashboard_table['field_outgoing_supply'] = $field_outgoing_transfer;
		//$dashboard_table['field_outgoing_supply_loaddata'] = 'loaddata_outgoing_transfer';

		//$dashboard_table['caption'] = '.:: Incoming Detail ::.';

		$component['dashboard_table'] = $dashboard_table;

		$this->authentication->ajaxlayout($component);
	}

	function loaddata_incoming_detail()
	{
		//$this->load->model('main');
		$this->authentication->plainlayout();

		$stock_move_id = isset($_REQUEST['stock_move_id']) ? is_numeric($_REQUEST['stock_move_id']) ? $_REQUEST['stock_move_id']  : -1 : -1;
		$item_id = isset($_REQUEST['item_id']) ? $_REQUEST['item_id'] : false;
		$item_code = isset($_REQUEST['item_code']) ? $_REQUEST['item_code'] : false;
		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;
		//var_dump ($methodid);
		if ($stock_move_id) {
			$view = 'view_data_assets_incoming_detail';
			$field = $this->incoming_transfer_table();

			//$return = array();
			//$return['valid'] = false;
			//$return['message'] = "Internal Server Error";

			$extra_param = array();
			if ($item_id) {
				$extra_param['where']['0']['field'] = 'r1';
				$extra_param['where']['0']['data'] = $stock_move_id;
				$extra_param['where']['1']['field'] = 'r11';
				$extra_param['where']['1']['data'] = $item_id;
			}

			$extra_param['methodid'] = $methodid;
			$extra_param['footer_data'] = true;
			$extra_param['sp_sum'] = 'dbo.sp_assets_incoming_detail_sum';

			$loaddata = $this->ecc_library->get_field_data_pop_incoming_detail($view, $field, $extra_param);
		} else {
			$loaddata = '';
		}
		echo $loaddata;
	}

	function loaddata_outgoing_transfer()
	{
		$this->load->model('main');
		$this->authentication->plainlayout();

		$item_code = isset($_REQUEST['item_code']) ? $_REQUEST['item_code'] : false;
		$no_dokumen = isset($_REQUEST['doc_no']) ? $_REQUEST['doc_no'] : false;
		$doc_date = isset($_REQUEST['doc_date']) ? $_REQUEST['doc_date'] : '';
		$stock_move_id = isset($_REQUEST['stock_move_id']) ? is_numeric($_REQUEST['stock_move_id']) ? $_REQUEST['stock_move_id']  : -1 : -1;
		$item_id = isset($_REQUEST['item_id']) ? $_REQUEST['item_id'] : false;
		$dok_to = isset($_REQUEST['dok_to']) ? $_REQUEST['dok_to'] : false;
		//$item_id =isset($_REQUEST['item_id']) ? is_numeric($_REQUEST['item_id']) ? $_REQUEST['item_id']  : -1 : -1;
		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;


		if ($no_dokumen) {
			//var_dump("ada".$no_dokumen);die();

			if ($dok_to == 'Production Transfer') {
				$view = 'view_data_assets_outgoing_transfer';
			} else {
				//$view = 'view_data_assets_outgoing_transfer';
				var_dump("masih error");
				die();
			}

			$field = $this->outgoing_transfer_item_table();

			$return = array();
			$return['valid'] = false;
			$return['message'] = "Internal Server Error";

			$extra_param = array();
			$extra_param['where']['0']['field'] = 'r16';
			$extra_param['where']['0']['data'] = $no_dokumen;
			$extra_param['where']['1']['field'] = 'r17';
			$extra_param['where']['1']['data'] = str_replace("-", "/", $doc_date);
			$extra_param['where']['2']['field'] = 'r18';
			$extra_param['where']['2']['data'] = $item_id;
			$extra_param['methodid'] = $methodid;

			$loaddata = $this->ecc_library->get_field_data_pop($view, $field, $extra_param);
		} else {
			//var_dump("No".$no_dokumen);die();
			$loaddata = '';
		}
		//var_dump($loaddata);die();
		echo $loaddata;
	}

	function loaddata_assets()
	{

		$this->authentication->plainlayout();

		$item_category_id = isset($_REQUEST['item_category_id']) ? is_numeric($_REQUEST['item_category_id']) ? $_REQUEST['item_category_id']  : -1 : -1;
		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;

		$view = 'view_data_assets';
		$field = $this->assets_table();

		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";
		//var_dump('COBA :'.$item_category_id);
		$extra_param = array();
		$extra_param['where']['0']['field'] = 'r10';
		$extra_param['where']['0']['data'] = $item_category_id;
		$extra_param['methodid'] = $methodid;

		$loaddata = $this->ecc_library->get_field_data($view, $field, $extra_param);

		echo $loaddata;
	}

	function loaddata_incoming()
	{

		$this->authentication->plainlayout();

		$item_id = isset($_REQUEST['item_id']) ? $_REQUEST['item_id'] : false;
		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;

		$view = 'view_data_assets_incoming';
		$field = $this->incoming_table();

		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";

		$extra_param = array();
		if ($item_id) {
			$extra_param['where']['0']['field'] = 'r15';
			$extra_param['where']['0']['data'] = $item_id;
		}
		$extra_param['methodid'] = $methodid;
		$extra_param['footer_data'] = true;
		$extra_param['sp_sum'] = 'dbo.sp_assets_incoming_sum';

		$loaddata = $this->ecc_library->get_field_data($view, $field, $extra_param);

		echo $loaddata;
	}

	function loaddata_outgoing()
	{

		$this->authentication->plainlayout();

		//$item_id = isset($_REQUEST['item_id']) ? is_numeric($_REQUEST['item_id']) ? $_REQUEST['item_id']  : false : false;
		$item_id = isset($_REQUEST['item_id']) ? $_REQUEST['item_id'] : false;
		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;
		//var_dump($item_id);
		$view = 'view_data_assets_outgoing';
		$field = $this->outgoing_table();

		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";

		$extra_param = array();
		if ($item_id) {
			//var_dump("MASUK");
			$extra_param['where']['0']['field'] = 'r13';
			$extra_param['where']['0']['data'] = $item_id;
		}

		$extra_param['methodid'] = $methodid;
		$extra_param['footer_data'] = true;
		$extra_param['sp_sum'] = 'dbo.sp_assets_outgoing_sum';
		//var_dump($extra_param);

		$loaddata = $this->ecc_library->get_field_data($view, $field, $extra_param);
		//var_dump($loaddata);	
		echo $loaddata;
	}

	function print_assets()
	{

		$field = $this->incoming_table();

		$item_category_id = isset($_REQUEST['item_category_id']) ?  $_REQUEST['item_category_id'] : '';
		$print = isset($_REQUEST['print']) ? $_REQUEST['print'] : 0;
		$format = isset($_REQUEST['format']) ? $_REQUEST['format'] : 'xlsx';
		$page = isset($_POST['page']) ? $_POST['page'] : 1; // get the requested page 
		$rows = isset($_POST['rows']) ? $_POST['rows'] : 10; // get how many rows we want to have into the grid 
		$sidx = isset($_POST['sidx']) ? $_POST['sidx'] : 'r1'; // get index row - i.e. user click to sort 
		$sord = isset($_POST['sord']) ? $_POST['sord'] : '0'; // get the direction 
		$search = isset($_REQUEST['_search']) ? $_REQUEST['_search'] : false;
		$filterRules =  isset($_POST['filters']) ? $_POST['filters'] : false;

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

		$sp = "dbo.sp_rpt_assets";

		$this->rpc_service_portal->setSP(array("sp" => $sp, "mode" => $print == 1 ? "2" : "1", "debug" => "1"));

		$this->rpc_service_portal->addField('item_category_id', $item_category_id);
		$this->rpc_service_portal->addField('format', $format);
		$this->rpc_service_portal->addField('temp_folder', sys_get_temp_dir());
		$this->rpc_service_portal->addField('sort', $sort);
		$this->rpc_service_portal->addField('limit', $limit);
		$this->rpc_service_portal->addField('offset', $offset);


		$this->rpc_service_portal->setWhere($search, $filterRules, $field);

		$result = $this->rpc_service_portal->resultPrint2();
		echo json_encode($result);
	}

	function print_excel_incoming_detail()
	{
		$this->load->library('excel');

		$stock_move_id = isset($_REQUEST['stock_move_id']) ?  $_REQUEST['stock_move_id'] : null;
		$item_id = isset($_REQUEST['item_id']) ? $_REQUEST['item_id'] : null;
		$item_code = isset($_REQUEST['item_code']) ? $_REQUEST['item_code'] : '';
		$format = isset($_REQUEST['format']) ? $_REQUEST['format'] : 'xlsx';

		//$grn_id = isset($_GET['grn_id']) ? $_GET['grn_id'] : false;
		//$format = isset($_GET['format']) ? $_GET['format'] : 'xlsx';
		$user_id = $this->session->userdata('user_id');
		//var_dump("masuk lagi ".$grn_id);die();
		$excel = new PHPExcel();
		// Settingan awal fil excel
		$excel->getProperties()->setCreator('My Notes Code')
			->setLastModifiedBy('My Notes Code')
			->setTitle("Bukti Barang Masuk")
			->setSubject("Barang Masuk")
			->setDescription("Surat BuktiBarang Masuk")
			->setKeywords("Barang Masuk");

		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_col_header = array(
			'font' => array('bold' => true), // Set font nya jadi bold
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, // Set text jadi ditengah secara horizontal (center)
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			)

		);

		$style_row_header = array(
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, // Set text jadi ditengah secara horizontal (center)
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			)

		);
		$style_col = array(
			'font' => array('bold' => true), // Set font nya jadi bold
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);

		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = array(
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);

		//	 $objDrawing = new PHPExcel_Worksheet_Drawing();
		//     $objDrawing->setName('test_img');
		//     $objDrawing->setDescription('test_img');
		//     $objDrawing->setPath('./assets/template/webmin/images/logo-popstar.png');
		//     $objDrawing->setCoordinates('A1');                      
		//     //setOffsetX works properly
		//     $objDrawing->setOffsetX(5); 
		//     $objDrawing->setOffsetY(5);                
		//     //set width, height
		//     $objDrawing->setWidth(100); 
		//     $objDrawing->setHeight(35); 
		//     $objDrawing->setWorksheet($excel->getActiveSheet());


		$excel->setActiveSheetIndex(0)->setCellValue('A1', "KODE BARANG " . $item_code); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A1:L1'); // Set Merge Cell pada kolom A1 sampai L1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(12); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1




		$report_time = date('_Ymd_His');
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("Asset_incoming_detail");
		$excel->setActiveSheetIndex(0);
		$nama_file = 'asset_incoming_detail' . $report_time . '.xlsx';

		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="asset_incoming_detail_' . $report_time . '.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');

		header("Content-Type: application/force-download");
		header("Content-Type: application/download");


		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');

		//return $excelOutput;

	}

	function print_incoming()
	{

		$field = $this->incoming_table();

		$item_id = isset($_REQUEST['item_id']) ?  $_REQUEST['item_id'] : 0;
		$print = isset($_REQUEST['print']) ? $_REQUEST['print'] : 0;
		$format = isset($_REQUEST['format']) ? $_REQUEST['format'] : 'xlsx';
		$page = isset($_POST['page']) ? $_POST['page'] : 1; // get the requested page 
		$rows = isset($_POST['rows']) ? $_POST['rows'] : 10; // get how many rows we want to have into the grid 
		$sidx = isset($_POST['sidx']) ? $_POST['sidx'] : 'r1'; // get index row - i.e. user click to sort 
		$sord = isset($_POST['sord']) ? $_POST['sord'] : '0'; // get the direction 
		$search = isset($_REQUEST['_search']) ? $_REQUEST['_search'] : false;
		$filterRules =  isset($_POST['filters']) ? $_POST['filters'] : false;

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

		if ($item_id == 0) {
			$sp = "dbo.sp_rpt_rekap_detail_pemasukan_all";
		} else {
			$sp = "dbo.sp_rpt_rekap_detail_pemasukan";
		}


		$this->rpc_service_portal->setSP(array("sp" => $sp, "mode" => $print == 1 ? "2" : "1", "debug" => "1"));

		$this->rpc_service_portal->addField('item_id', $item_id);
		$this->rpc_service_portal->addField('format', $format);
		$this->rpc_service_portal->addField('temp_folder', sys_get_temp_dir());
		$this->rpc_service_portal->addField('sort', $sort);
		$this->rpc_service_portal->addField('limit', $limit);
		$this->rpc_service_portal->addField('offset', $offset);


		$this->rpc_service_portal->setWhere($search, $filterRules, $field);

		$result = $this->rpc_service_portal->resultPrint2();
		echo json_encode($result);
	}

	function print_outgoing()
	{

		$field = $this->outgoing_table();

		$item_id = isset($_REQUEST['item_id']) ?  $_REQUEST['item_id'] : '';
		$print = isset($_REQUEST['print']) ? $_REQUEST['print'] : 0;
		$format = isset($_REQUEST['format']) ? $_REQUEST['format'] : 'xlsx';
		$page = isset($_POST['page']) ? $_POST['page'] : 1; // get the requested page 
		$rows = isset($_POST['rows']) ? $_POST['rows'] : 10; // get how many rows we want to have into the grid 
		$sidx = isset($_POST['sidx']) ? $_POST['sidx'] : 'r1'; // get index row - i.e. user click to sort 
		$sord = isset($_POST['sord']) ? $_POST['sord'] : '0'; // get the direction 
		$search = isset($_REQUEST['_search']) ? $_REQUEST['_search'] : false;
		$filterRules =  isset($_POST['filters']) ? $_POST['filters'] : false;

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

		if ($item_id == 0) {
			$sp = "dbo.sp_rpt_rekap_detail_pengeluaran_all";
		} else {
			$sp = "dbo.sp_rpt_rekap_detail_pengeluaran";
		}



		$this->rpc_service_portal->setSP(array("sp" => $sp, "mode" => $print == 1 ? "2" : "1", "debug" => "1"));

		$this->rpc_service_portal->addField('item_id', $item_id);
		$this->rpc_service_portal->addField('format', $format);
		$this->rpc_service_portal->addField('temp_folder', sys_get_temp_dir());
		$this->rpc_service_portal->addField('sort', $sort);
		$this->rpc_service_portal->addField('limit', $limit);
		$this->rpc_service_portal->addField('offset', $offset);


		$this->rpc_service_portal->setWhere($search, $filterRules, $field);

		$result = $this->rpc_service_portal->resultPrint2();
		echo json_encode($result);
	}
}
