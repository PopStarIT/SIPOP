<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Card_stock_wip extends CI_Controller
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

	function card_stock_table()
	{

		$field = array();
		$field['r1'] = array('sc' => 'r1', 'ctype' => 'text', 'bypassvalue' => '', 'title' => 'ID');
		$field['r2'] = array('sc' => 'r2', 'ctype' => 'text', 'bypassvalue' => '', 'title' => 'KODE BRG');
		$field['r3'] = array('sc' => 'r3', 'ctype' => 'text', 'bypassvalue' => '', 'title' => 'SALDO AWAL');
		$field['r4'] = array('sc' => 'r4', 'ctype' => 'text', 'bypassvalue' => '', 'title' => 'NO MASUK');
		$field['r5'] = array('sc' => 'r5', 'ctype' => 'text', 'bypassvalue' => '', 'title' => 'TGL MASUK');
		$field['r6'] = array('sc' => 'r5', 'ctype' => 'int', 'bypassvalue' => '', 'title' => 'QTY MASUK');
		//$field['r6'] = array('sc' => 'r6','ctype' => 'int', 'bypassvalue' => '', 'title' => 'JUMLAH', 'data_type' => 'decimal', 'decimal_digit' => 4);
		$field['r7'] = array('sc' => 'r7', 'ctype' => 'text', 'bypassvalue' => '', 'title' => 'ARR TGL KELUAR');

		return $field;
	}


	function view_table()
	{
		$view = 'view_card_stock';
		$get_field = $this->ecc_library->get_field_pop($view);


		return $get_field;
	}

	function index()
	{

		$this->load->model('main');
		$component['loadlayout'] = true;
		$component['view_load'] = 'accounting_report/card_stock_wip/view';
		$component['load_js'][] = 'accounting_report/card_stock_wip/view';

		$component['page_title'] = "Card Stock WIP";
		$dashboard_table = array();

		$field = $this->card_stock_table();

		$dashboard_table['field'] = $field;

		$component['dashboard_table'] = $dashboard_table;

		$this->authentication->ajaxlayout($component);
	}

	function loaddata()
	{

		$field = $this->card_stock_table();

		$date_start = isset($_REQUEST['date_start']) ?  $_REQUEST['date_start'] : '';
		$date_end = isset($_REQUEST['date_end']) ? $_REQUEST['date_end'] : '';
		$print = isset($_REQUEST['print']) ? $_REQUEST['print'] : 0;
		$format = isset($_REQUEST['format']) ? $_REQUEST['format'] : 'xlsx';
		$page = isset($_POST['page']) ? $_POST['page'] : 1; // get the requested page 
		$rows = isset($_POST['rows']) ? $_POST['rows'] : 10; // get how many rows we want to have into the grid 
		$sidx = isset($_POST['sidx']) ? $_POST['sidx'] : 'r1'; // get index row - i.e. user click to sort 
		$sord = isset($_POST['sord']) ? $_POST['sord'] : '0'; // get the direction 
		$search = isset($_REQUEST['_search']) ? $_REQUEST['_search'] : false;
		$filterRules =  isset($_POST['filters']) ? $_POST['filters'] : false;
		//var_dump ($date_start);		
		$limit =  $rows;
		$offset =  $rows * ($page - 1);

		$order = isset($_REQUEST['order']) ? $_REQUEST['order'] : array();

		if ($sord == 'asc') {
			$sord = 1;
		} else {
			$sord = 2;
		}

		$sort =	$sidx . '=' . $sord;

		if (strlen(trim($date_start)) == 0) {
			$date_start = '1900-01-01';
		}

		if (strlen(trim($date_end)) == 0) {
			$date_end = '9999-12-31';
		}

		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";


		//$sp = "dbo.sp_rpt_penerimaan_barang_jadi";	
		$sp = "dbo.sp_mutasi_card_stock_bahan_baku";
		if ($print == 1) {
			$this->rpc_service->setSP(array("sp" => $sp, "mode" => $print == 1 ? "2" : "1", "debug" => "1"));
		} else {
			$this->rpc_service->setSP($sp);
		}

		$this->rpc_service->addField('date_start', $date_start);
		$this->rpc_service->addField('date_end', $date_end);
		$this->rpc_service->addField('format', $format);
		$this->rpc_service->addField('temp_folder', sys_get_temp_dir());
		$this->rpc_service->addField('sort', $sort);
		$this->rpc_service->addField('limit', $limit);
		$this->rpc_service->addField('offset', $offset);


		$this->rpc_service->setWhere($search, $filterRules, $field);

		if ($print == 1) {

			//$result = $this->rpc_service->resultPrint2();
			echo json_encode($result);
		} else {
			$this->authentication->plainlayout();

			$result = $this->rpc_service->resultJSON_pop();
			$data_result = json_decode($result['data'], true);
			//var_dump ($data_result);die();	
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

			echo json_encode($responce);
		}
	}

	function print_card_stock()
	{
		$format = isset($_REQUEST['format']) ? $_REQUEST['format'] : false;
		$date_start = isset($_REQUEST['date_start']) ? $_REQUEST['date_start'] : false;
		$date_end = isset($_REQUEST['date_end']) ? $_REQUEST['date_end'] : false;
		//var_dump($date_start ." dan ".$format);die();
		if ($format == 'xlsx') {
			$this->print_transfer_excel();
		} else {
			// var_dump($grn_id);die();
			$this->print_transfer_pdf();
		}

		//   $return['status_code'] = $grn_id;
		//   return $return;
	}

	function print_transfer_excel()
	{

		require_once APPPATH . "/third_party/PHPExcel.php";
		require_once APPPATH . "/third_party/PHPExcel/IOFactory.php";

		

		$this->db_pop = $this->load->database('pop', TRUE);

		$date_start = isset($_REQUEST['date_start']) ?  $_REQUEST['date_start'] : '';
		$date_end = isset($_REQUEST['date_end']) ? $_REQUEST['date_end'] : '';
		$print = isset($_REQUEST['print']) ? $_REQUEST['print'] : 0;
		$format = isset($_REQUEST['format']) ? $_REQUEST['format'] : 'xlsx';
		$baris = isset($_REQUEST['baris']) ? $_REQUEST['baris'] : 0;
		$page = isset($_POST['page']) ? $_POST['page'] : 1; // get the requested page 
		$rows = isset($_POST['rows']) ? $_POST['rows'] : 10; // get how many rows we want to have into the grid 
		$sidx = isset($_POST['sidx']) ? $_POST['sidx'] : 'r12'; // get index row - i.e. user click to sort 
		$sord = isset($_POST['sord']) ? $_POST['sord'] : '0'; // get the direction 
		$search = isset($_REQUEST['_search']) ? $_REQUEST['_search'] : false;
		$filterRules =  isset($_POST['filters']) ? $_POST['filters'] : false;
		//var_dump ($date_start);		
		$limit =  $rows;
		$offset =  $rows * ($page - 1);

		$order = isset($_REQUEST['order']) ? $_REQUEST['order'] : array();
		$user_id = $this->session->userdata('user_id');

		if ($sord == 'asc') {
			$sord = 1;
		} else {
			$sord = 2;
		}

		$sort =	$sidx . '=' . $sord;

		if (strlen(trim($date_start)) == 0) {
			$date_start = '1900-01-01';
		}

		if (strlen(trim($date_end)) == 0) {
			$date_end = '9999-12-31';
		}

		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";


		//$sp = "dbo.sp_rpt_penerimaan_barang_jadi";	
		$sp = "dbo.sp_mutasi_card_stock_bahan_baku";
		//$this->rpc_service->setSP($sp);
		$this->rpc_service->setSP(array("sp" => $sp, "mode" => "2", "debug" => "1"));
		$this->rpc_service->addField('date_start', $date_start);
		$this->rpc_service->addField('date_end', $date_end);
		$this->rpc_service->addField('format', $format);
		$this->rpc_service->addField('temp_folder', sys_get_temp_dir());
		$this->rpc_service->addField('sort', $sort);
		$this->rpc_service->addField('limit', $limit);
		$this->rpc_service->addField('offset', $offset);
		
       

		$styleArray = array(
			'font'  => array(
				//'bold'  => true,
				//'color' => array('rgb' => '249007'),
				//'size'  => 15,
				//'name'  => 'Verdana'
			),
			'borders' => array(
				'allborders' => array(
					'style' => PHPExcel_Style_Border::BORDER_THIN
				)
			)
		);

		$styleArray1 = array(
			'font'  => array(
				//'bold'  => true,
				//'color' => array('rgb' => '1a57e3'),
				//'size'  => 15,
				//'name'  => 'Verdana'
			),
			'borders' => array(
				'allborders' => array(
					'style' => PHPExcel_Style_Border::BORDER_THIN
				)
			)

		);

		$this->rpc_service->setWhere($search, $filterRules);
		$result = $this->rpc_service->resultJSON_pop();
		
		 $phpExcel = PHPExcel_IOFactory::load(FCPATH . "/assets/template/card_stock/tmp_card_stock.xlsx");
		$phpExcel->setActiveSheetIndex(0);  //set first sheet as active
		$phpExcel->getActiveSheet()->setCellValueExplicit("A2", "PERIODE : " . $date_start . " s/d " . $date_end, PHPExcel_Cell_DataType::TYPE_STRING);
		
		if (isset($result)) {
			if (isset($result['valid'])) {
				if ($result['valid']) {
					$data_report = json_decode($result['data'], TRUE);

					$i = 3;
					$j = '';
					$k = 1;
					$l = 1;
					$jml = 0;
					$kode = '';
					$x = 4;
					$saldo_akhir = 0;
					$saldo_akhir_keluar = 0;
					$key_arr = "r7";
					// var_dump($data_report['xrow']);die();
					foreach ($data_report['xrow'] as $k => $v) {
						$k = 1 + $i;
						$j = "$k";


						if ($v['r2'] != $kode) {
							$phpExcel->getActiveSheet()->setCellValue("A" . $j, $l);
							$phpExcel->getActiveSheet()->setCellValueExplicit("B" . $j, '', PHPExcel_Cell_DataType::TYPE_STRING);
							$phpExcel->getActiveSheet()->setCellValueExplicit("C" . $j, 'Saldo Awal', PHPExcel_Cell_DataType::TYPE_STRING);
							$phpExcel->getActiveSheet()->setCellValueExplicit("D" . $j, '', PHPExcel_Cell_DataType::TYPE_STRING);
							$phpExcel->getActiveSheet()->setCellValueExplicit("E" . $j, $v['r2'], PHPExcel_Cell_DataType::TYPE_STRING);
							$phpExcel->getActiveSheet()->setCellValueExplicit("F" . $j, $v['r11'], PHPExcel_Cell_DataType::TYPE_STRING);
							$phpExcel->getActiveSheet()->setCellValue("G" . $j, 0);
							$phpExcel->getActiveSheet()->setCellValue("H" . $j, 0);
							$phpExcel->getActiveSheet()->setCellValue("I" . $j, $v['r3']);
							$kode = $v['r2'];
							$saldo_akhir = $v['r3'];

							$phpExcel->getActiveSheet()->getStyle("A$j")->applyFromArray($styleArray);
							$phpExcel->getActiveSheet()->getStyle("B$j")->applyFromArray($styleArray);
							$phpExcel->getActiveSheet()->getStyle("C$j")->applyFromArray($styleArray);
							$phpExcel->getActiveSheet()->getStyle("D$j")->applyFromArray($styleArray);
							$phpExcel->getActiveSheet()->getStyle("E$j")->applyFromArray($styleArray);
							$phpExcel->getActiveSheet()->getStyle("F$j")->applyFromArray($styleArray);
							$phpExcel->getActiveSheet()->getStyle("G$j")->applyFromArray($styleArray);
							$phpExcel->getActiveSheet()->getStyle("H$j")->applyFromArray($styleArray);
							$phpExcel->getActiveSheet()->getStyle("I$j")->applyFromArray($styleArray);
							$i = $i + 1;
							$j = $j + 1;
							$l = $l + 1;
						}

						$saldo_akhir = $saldo_akhir + $v['r6'];
						$phpExcel->getActiveSheet()->setCellValue("A" . $j, $l);
						$phpExcel->getActiveSheet()->setCellValueExplicit("B" . $j, $v['r5'], PHPExcel_Cell_DataType::TYPE_STRING);  //tanggal
						$phpExcel->getActiveSheet()->setCellValueExplicit("C" . $j, $v['r13'], PHPExcel_Cell_DataType::TYPE_STRING);  //dokumen
						$phpExcel->getActiveSheet()->setCellValueExplicit("D" . $j, $v['r4'], PHPExcel_Cell_DataType::TYPE_STRING);  //No
						$phpExcel->getActiveSheet()->setCellValueExplicit("E" . $j, $v['r2'], PHPExcel_Cell_DataType::TYPE_STRING);   //kode Barang
						$phpExcel->getActiveSheet()->setCellValueExplicit("F" . $j, $v['r11'], PHPExcel_Cell_DataType::TYPE_STRING);  //satuan
						$phpExcel->getActiveSheet()->setCellValue("G" . $j, $v['r6']);  //masuk
						$phpExcel->getActiveSheet()->setCellValue("H" . $j, 0);   //keluar
						$phpExcel->getActiveSheet()->setCellValue("I" . $j, $saldo_akhir);

						$phpExcel->getActiveSheet()->getStyle("A$j")->applyFromArray($styleArray);
						$phpExcel->getActiveSheet()->getStyle("B$j")->applyFromArray($styleArray);
						$phpExcel->getActiveSheet()->getStyle("C$j")->applyFromArray($styleArray);
						$phpExcel->getActiveSheet()->getStyle("D$j")->applyFromArray($styleArray);
						$phpExcel->getActiveSheet()->getStyle("E$j")->applyFromArray($styleArray);
						$phpExcel->getActiveSheet()->getStyle("F$j")->applyFromArray($styleArray);
						$phpExcel->getActiveSheet()->getStyle("G$j")->applyFromArray($styleArray);
						$phpExcel->getActiveSheet()->getStyle("H$j")->applyFromArray($styleArray);
						$phpExcel->getActiveSheet()->getStyle("I$j")->applyFromArray($styleArray);
						$i = $i + 1;
						$j = $j + 1;
						$l = $l + 1;

						// array_key_exists(1, $siswa)
						//array_key_exists('nama', $mhs)
						// if ($k == $key_arr) {
						if ($v['r7'] != '-') {

							$arr_qty_keluar = explode('#', $v['r9']); // qty_keluar
							$arr_tgl_keluar = explode('#', $v['r7']); // tgl keluar
							$arr_no_keluar = explode('#', $v['r8']);   // no keluar
							$arr_dok_keluar = explode('#', $v['r10']);   // dok keluar
							$jml_arr = count($arr_qty_keluar);
							$jml_tgl = count($arr_tgl_keluar) - 1;
							$jml_dok = count($arr_dok_keluar) - 1;
							foreach ($arr_qty_keluar as $key => $value) {
								$k = 1 + $i;
								$j = "$k";
								// $saldo_akhir_keluar=$saldo_akhir - $value;
								$saldo_akhir = $saldo_akhir - $value;

								if ($key > $jml_tgl) {
									$arr_tgl_keluar[$key] = '-';
								}

								if ($key > $jml_dok) {
									$arr_dok_keluar[$key] = '-';
								}

								$phpExcel->getActiveSheet()->setCellValue("A" . $j, $l);
								$phpExcel->getActiveSheet()->setCellValueExplicit("B" . $j, $arr_tgl_keluar[$key], PHPExcel_Cell_DataType::TYPE_STRING);  //tanggal
								$phpExcel->getActiveSheet()->setCellValueExplicit("C" . $j, $arr_dok_keluar[$key], PHPExcel_Cell_DataType::TYPE_STRING);  //dokumen
								$phpExcel->getActiveSheet()->setCellValueExplicit("D" . $j, $arr_no_keluar[$key], PHPExcel_Cell_DataType::TYPE_STRING);  //nomor
								$phpExcel->getActiveSheet()->setCellValueExplicit("E" . $j, $v['r2'], PHPExcel_Cell_DataType::TYPE_STRING);   //kode Barang
								$phpExcel->getActiveSheet()->setCellValueExplicit("F" . $j, $v['r11'], PHPExcel_Cell_DataType::TYPE_STRING);  //satuan
								$phpExcel->getActiveSheet()->setCellValue("G" . $j, 0);  //masuk
								$phpExcel->getActiveSheet()->setCellValue("H" . $j, $value);   //keluar
								$phpExcel->getActiveSheet()->setCellValue("I" . $j, $saldo_akhir);

								$phpExcel->getActiveSheet()->getStyle("A$j")->applyFromArray($styleArray);
								$phpExcel->getActiveSheet()->getStyle("B$j")->applyFromArray($styleArray);
								$phpExcel->getActiveSheet()->getStyle("C$j")->applyFromArray($styleArray);
								$phpExcel->getActiveSheet()->getStyle("D$j")->applyFromArray($styleArray);
								$phpExcel->getActiveSheet()->getStyle("E$j")->applyFromArray($styleArray);
								$phpExcel->getActiveSheet()->getStyle("F$j")->applyFromArray($styleArray);
								$phpExcel->getActiveSheet()->getStyle("G$j")->applyFromArray($styleArray);
								$phpExcel->getActiveSheet()->getStyle("H$j")->applyFromArray($styleArray);
								$phpExcel->getActiveSheet()->getStyle("I$j")->applyFromArray($styleArray);
								// $saldo_akhir = $saldo_akhir - $value;
								$i++;
								$l++;
							}
						}
					}
					//var_dump($data_report['xrow']);die();


				} else {
					$return['status_code'] = $result2['no'];
					$return['message'] = $result2['des'];
				}
			}
		}


		//----coba  
		$report_time = date('_Ymd_His');

		$filename = "card_stock " . $report_time;
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');

		header("Pragma:no-cache");
		header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
		header("Expires:0");

		$objWriter = PHPExcel_IOFactory::createWriter($phpExcel, 'Excel2007');  //downloadable file is in Excel 2003 format (.xls)
		$objWriter->save('php://output');  //send it to user, of course you can save it to disk also!
		//---- Akhir coba  

		exit; //done.. exiting!	
	}

	function print_excel_perkode_ALL()
	{
		$format = isset($_REQUEST['format']) ? $_REQUEST['format'] : false;
		$date_start = isset($_REQUEST['date_start']) ? $_REQUEST['date_start'] : false;
		$date_end = isset($_REQUEST['date_end']) ? $_REQUEST['date_end'] : false;
		$baris = isset($_REQUEST['baris']) ? $_REQUEST['baris'] : 0;
		require_once APPPATH . "/third_party/PHPExcel.php";
		require_once APPPATH . "/third_party/PHPExcel/IOFactory.php";



		$this->db_pop = $this->load->database('pop', TRUE);

		$lop_id_old = $this->db_pop->query(" select c.item_id,c.item_code
		FROM dbo.view_data_assets_incoming_ecc a 
		left join dbo.sp_mutasi_saldo_awal_ecc('2021-01-01') b ON a.item_id=b.item_id
		left join dbo.sp_mutasi_keluar_sipop('2021-01-01','2021-12-31') x ON a.stock_move_id=x.parent_id
		left join dbo.view_mst_item_ecc c ON a.item_id=c.item_id
		left join dbo.view_mst_item_base_ecc d ON c.item_base_id=d.item_base_id
		LEFT JOIN dbo.view_mst_item_category_ecc e ON d.item_category_id = e.item_category_id
	    Left Join dbo.prm_custom_item_type f ON e.custom_item_type_id = f.custom_item_type_id
		where a.receive_date >='2021-01-01' and a.receive_date <='2021-12-31' AND f.custom_item_type_id = 1
		GROUP BY c.item_id,c.item_code");

		$lop_id = $this->db_pop->query("select item_id,item_code from dbo.dt_tbl_kode_tmp");

		foreach ($lop_id->result() as $lop) {

			$baris = $lop->item_id;
			$code = $lop->item_code;

			$q = $this->db_pop->query("select a.stock_move_id as r1
		,c.item_code as r2
		,case when b.quantity is null then 0 else b.quantity end as r3
		,a.receive_no as r4
		,a.receive_date as r5 
		,a.quantity as r6
		,x.arr_tgl_keluar as r7
		,x.arr_no_keluar as r8
		,x.arr_quantity_keluar as r9
		,x.arr_dok_keluar as r10
		,a.unit as r11
		,c.item_id as r12
		,a.doc_from as r13
		FROM dbo.view_data_assets_incoming_ecc a 
		left join dbo.sp_mutasi_saldo_awal_ecc('$date_start') b ON a.item_id=b.item_id
		left join dbo.sp_mutasi_keluar_sipop('$date_start','$date_end') x ON a.stock_move_id=x.parent_id
		left join dbo.view_mst_item_ecc c  ON a.item_id=c.item_id
		left join dbo.view_mst_item_base_ecc d ON c.item_base_id=d.item_base_id
		LEFT JOIN dbo.view_mst_item_category_ecc e ON d.item_category_id = e.item_category_id
	    Left Join dbo.prm_custom_item_type f ON e.custom_item_type_id = f.custom_item_type_id 
		where a.receive_date >='$date_start' and a.receive_date <='$date_end' and c.item_id=" . $baris . " and f.custom_item_type_id =2 ");

			$arr_qty_keluar = array(); // qty_keluar
			$arr_tgl_keluar = array(); // tgl keluar
			$arr_no_keluar = array();   // no keluar
			$arr_dok_keluar = array();  // dok keluar

			$styleArray = array(
				'font'  => array(
					//'bold'  => true,
					//'color' => array('rgb' => '249007'),
					//'size'  => 15,
					//'name'  => 'Verdana'
				),
				'borders' => array(
					'allborders' => array(
						'style' => PHPExcel_Style_Border::BORDER_THIN
					)
				)
			);

			$styleArray1 = array(
				'font'  => array(
					//'bold'  => true,
					//'color' => array('rgb' => '1a57e3'),
					//'size'  => 15,
					//'name'  => 'Verdana'
				),
				'borders' => array(
					'allborders' => array(
						'style' => PHPExcel_Style_Border::BORDER_THIN
					)
				)

			);

			$i = 3;
			$j = '';
			$k = 1;
			$l = 1;
			$jml = 0;
			$kode = '';
			$x = 4;
			$saldo_akhir = 0;
			$saldo_akhir_keluar = 0;
			$isi = $q->result();

			$phpExcel = PHPExcel_IOFactory::load(FCPATH . "/assets/template/card_stock/tmp_card_stock.xlsx");
			$phpExcel->setActiveSheetIndex(0);  //set first sheet as active
			$phpExcel->getActiveSheet()->setCellValueExplicit("A2", "PERIODE : " . $date_start . " s/d " . $date_end, PHPExcel_Cell_DataType::TYPE_STRING);

			for ($u = 0; $u <= count($isi) - 1; $u++) {
				//foreach ($q->result() as $r){
				$k = 1 + $i;
				$j = "$k";

				$r2 = trim($isi[$u]->r2);
				$r11 = $isi[$u]->r11;
				$r3 = $isi[$u]->r3;
				$r5 = $isi[$u]->r5;
				$r13 = $isi[$u]->r13;
				$r4 = $isi[$u]->r4;
				$r6 = $isi[$u]->r6;
				$r9 = $isi[$u]->r9;
				$r7 = $isi[$u]->r7;
				$r8 = $isi[$u]->r8;
				$r10 = $isi[$u]->r10;
				//$phpExcel->getActiveSheet()->setCellValue("A".$j, $l);
				//if ($r->r2 != $kode ){
				if ($r2 != $kode) {

					$phpExcel->getActiveSheet()->setCellValue("A" . $j, $l);
					$phpExcel->getActiveSheet()->setCellValueExplicit("B" . $j, '', PHPExcel_Cell_DataType::TYPE_STRING);
					$phpExcel->getActiveSheet()->setCellValueExplicit("C" . $j, 'Saldo Awal', PHPExcel_Cell_DataType::TYPE_STRING);
					$phpExcel->getActiveSheet()->setCellValueExplicit("D" . $j, '', PHPExcel_Cell_DataType::TYPE_STRING);
					$phpExcel->getActiveSheet()->setCellValueExplicit("E" . $j, $r2, PHPExcel_Cell_DataType::TYPE_STRING);
					$phpExcel->getActiveSheet()->setCellValueExplicit("F" . $j, $r11, PHPExcel_Cell_DataType::TYPE_STRING);
					$phpExcel->getActiveSheet()->setCellValue("G" . $j, 0);
					$phpExcel->getActiveSheet()->setCellValue("H" . $j, 0);
					$phpExcel->getActiveSheet()->setCellValue("I" . $j, $r3);
					$kode = $r2;
					$saldo_akhir = $r3;

					$phpExcel->getActiveSheet()->getStyle("A$j")->applyFromArray($styleArray);
					$phpExcel->getActiveSheet()->getStyle("B$j")->applyFromArray($styleArray);
					$phpExcel->getActiveSheet()->getStyle("C$j")->applyFromArray($styleArray);
					$phpExcel->getActiveSheet()->getStyle("D$j")->applyFromArray($styleArray);
					$phpExcel->getActiveSheet()->getStyle("E$j")->applyFromArray($styleArray);
					$phpExcel->getActiveSheet()->getStyle("F$j")->applyFromArray($styleArray);
					$phpExcel->getActiveSheet()->getStyle("G$j")->applyFromArray($styleArray);
					$phpExcel->getActiveSheet()->getStyle("H$j")->applyFromArray($styleArray);
					$phpExcel->getActiveSheet()->getStyle("I$j")->applyFromArray($styleArray);
					$i = $i + 1;
					$j = $j + 1;
					$l = $l + 1;
				}
				//$kode=$r->r2; 						
				$saldo_akhir = $saldo_akhir + $r6;
				$phpExcel->getActiveSheet()->setCellValue("A" . $j, $l);
				$phpExcel->getActiveSheet()->setCellValueExplicit("B" . $j, $r5, PHPExcel_Cell_DataType::TYPE_STRING);  //tanggal
				$phpExcel->getActiveSheet()->setCellValueExplicit("C" . $j, $r13, PHPExcel_Cell_DataType::TYPE_STRING);  //nomor
				$phpExcel->getActiveSheet()->setCellValueExplicit("D" . $j, $r4, PHPExcel_Cell_DataType::TYPE_STRING);  //nomor
				$phpExcel->getActiveSheet()->setCellValueExplicit("E" . $j, $r2, PHPExcel_Cell_DataType::TYPE_STRING);   //kode Barang
				$phpExcel->getActiveSheet()->setCellValueExplicit("F" . $j, $r11, PHPExcel_Cell_DataType::TYPE_STRING);  //satuan
				$phpExcel->getActiveSheet()->setCellValue("G" . $j, $r6);  //masuk
				$phpExcel->getActiveSheet()->setCellValue("H" . $j, 0);   //keluar
				$phpExcel->getActiveSheet()->setCellValue("I" . $j, $saldo_akhir);

				$phpExcel->getActiveSheet()->getStyle("A$j")->applyFromArray($styleArray);
				$phpExcel->getActiveSheet()->getStyle("B$j")->applyFromArray($styleArray);
				$phpExcel->getActiveSheet()->getStyle("C$j")->applyFromArray($styleArray);
				$phpExcel->getActiveSheet()->getStyle("D$j")->applyFromArray($styleArray);
				$phpExcel->getActiveSheet()->getStyle("E$j")->applyFromArray($styleArray);
				$phpExcel->getActiveSheet()->getStyle("F$j")->applyFromArray($styleArray);
				$phpExcel->getActiveSheet()->getStyle("G$j")->applyFromArray($styleArray);
				$phpExcel->getActiveSheet()->getStyle("H$j")->applyFromArray($styleArray);
				$phpExcel->getActiveSheet()->getStyle("I$j")->applyFromArray($styleArray);
				$i = $i + 1;
				$j = $j + 1;
				$l = $l + 1;

				$arr_qty_keluar = explode('#', $r9); // qty_keluar
				$arr_tgl_keluar = explode('#', $r7); // tgl keluar
				$arr_no_keluar = explode('#', $r8);   // no keluar
				$arr_dok_keluar = explode('#', $r10);   // dok keluar
				$jml_arr = count($arr_qty_keluar);
				$jml_tgl = count($arr_tgl_keluar) - 1;
				$jml_dok = count($arr_dok_keluar) - 1;
				if ($r7 != null) {

					//$saldo_akhir = $saldo_akhir - $r->r9;
					// var_dump($code.' - '.count($isi).'#'.count($arr_qty_keluar));
					foreach ($arr_qty_keluar as $key => $value) {
						$k = 1 + $i;
						$j = "$k";
						// $saldo_akhir_keluar=$saldo_akhir - $value;
						$saldo_akhir = $saldo_akhir - $value;

						if ($key > $jml_tgl) {
							$arr_tgl_keluar[$key] = '';
						}

						if ($key > $jml_dok) {
							$arr_dok_keluar[$key] = '';
						}

						$phpExcel->getActiveSheet()->setCellValue("A" . $j, $l);
						$phpExcel->getActiveSheet()->setCellValueExplicit("B" . $j, $arr_tgl_keluar[$key], PHPExcel_Cell_DataType::TYPE_STRING);  //tanggal
						$phpExcel->getActiveSheet()->setCellValueExplicit("C" . $j, $arr_dok_keluar[$key], PHPExcel_Cell_DataType::TYPE_STRING);  //dokumen
						$phpExcel->getActiveSheet()->setCellValueExplicit("D" . $j, $arr_no_keluar[$key], PHPExcel_Cell_DataType::TYPE_STRING);  //nomor
						$phpExcel->getActiveSheet()->setCellValueExplicit("E" . $j, $r2, PHPExcel_Cell_DataType::TYPE_STRING);   //kode Barang
						$phpExcel->getActiveSheet()->setCellValueExplicit("F" . $j, $r11, PHPExcel_Cell_DataType::TYPE_STRING);  //satuan
						$phpExcel->getActiveSheet()->setCellValue("G" . $j, 0);  //masuk
						$phpExcel->getActiveSheet()->setCellValue("H" . $j, $value);   //keluar
						$phpExcel->getActiveSheet()->setCellValue("I" . $j, $saldo_akhir);

						$phpExcel->getActiveSheet()->getStyle("A$j")->applyFromArray($styleArray);
						$phpExcel->getActiveSheet()->getStyle("B$j")->applyFromArray($styleArray);
						$phpExcel->getActiveSheet()->getStyle("C$j")->applyFromArray($styleArray);
						$phpExcel->getActiveSheet()->getStyle("D$j")->applyFromArray($styleArray);
						$phpExcel->getActiveSheet()->getStyle("E$j")->applyFromArray($styleArray);
						$phpExcel->getActiveSheet()->getStyle("F$j")->applyFromArray($styleArray);
						$phpExcel->getActiveSheet()->getStyle("G$j")->applyFromArray($styleArray);
						$phpExcel->getActiveSheet()->getStyle("H$j")->applyFromArray($styleArray);
						$phpExcel->getActiveSheet()->getStyle("I$j")->applyFromArray($styleArray);
						// $saldo_akhir = $saldo_akhir - $value;
						$i++;
						$l++;
					}
				}
				// $r->r7=null;
				unset($arr_qty_keluar);
				unset($arr_tgl_keluar);
				unset($arr_dok_keluar);
			}

			$report_time = date('_Ymd_His');
			$report_time2 = date('His');

			$filename =  "card_stock " . $report_time;
			$namaFile =  "card_stock_" . trim($code) . "_" . $report_time2 . '.xlsx';
			$lokasiFile = 'D:/data_card_stock/' . $namaFile;
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
			header('Cache-Control: max-age=0');
			//header("Pragma:no-cache");
			header("Pragma:public");
			header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
			header("Expires:0");

			$objWriter = PHPExcel_IOFactory::createWriter($phpExcel, 'Excel2007');  //downloadable file is in Excel 2003 format (.xls)
			$objWriter->save($lokasiFile);  //send it to user, of course you can save it to disk also!
			//$objWriter->save('php://output');  //send it to user, of course you can save it to disk also!
			// $this->db_pop->close();
			// $objWriter = null;
			//unset($r->r9);
			$this->db_pop->where('item_id', $baris);
			$this->db_pop->delete('dbo.dt_tbl_kode_tmp');
		}	 //tuutp kurung untuk looping item_id;

		exit; //done.. exiting!	
	}

	function print_excel_perkode()
	{
		$format = isset($_REQUEST['format']) ? $_REQUEST['format'] : false;
		$date_start = isset($_REQUEST['date_start']) ? $_REQUEST['date_start'] : false;
		$date_end = isset($_REQUEST['date_end']) ? $_REQUEST['date_end'] : false;
		$keterangan = isset($_REQUEST['keterangan']) ? $_REQUEST['keterangan'] : false;
		$baris = isset($_REQUEST['baris']) ? $_REQUEST['baris'] : 0;
		require_once APPPATH . "/third_party/PHPExcel.php";
		require_once APPPATH . "/third_party/PHPExcel/IOFactory.php";

		
		$this->db_pop = $this->load->database('pop', TRUE);
		if ($baris == 0) {
			$q = $this->db_pop->query("select a.stock_move_id as r1
		,c.item_code as r2
		,case when b.quantity is null then 0 else b.quantity end as r3
		,a.receive_no as r4
		,a.receive_date as r5 
		,a.quantity as r6
		,x.arr_tgl_keluar as r7
		,x.arr_no_keluar as r8
		,x.arr_quantity_keluar as r9
		,x.arr_dok_keluar as r10
		,a.unit as r11
		,c.item_id as r12
		FROM dbo.view_data_assets_incoming_ecc a 
		left join dbo.sp_mutasi_saldo_awal_ecc('$date_start') b ON a.item_id=b.item_id
		left join dbo.sp_mutasi_keluar_sipop('$date_start','$date_end') x ON a.stock_move_id=x.parent_id
		left join dbo.view_mst_item_ecc c  ON a.item_id=c.item_id
		left join dbo.view_mst_item_base_ecc d ON c.item_base_id=d.item_base_id
		LEFT JOIN dbo.view_mst_item_category_ecc e ON d.item_category_id = e.item_category_id
	    Left Join dbo.prm_custom_item_type f ON e.custom_item_type_id = f.custom_item_type_id 
		where a.receive_date >='$date_start' and a.receive_date <='$date_end' and f.custom_item_type_id = 1");
		} else {

			$q = $this->db_pop->query("select a.stock_move_id as r1
		,c.item_code as r2
		,case when b.quantity is null then 0 else b.quantity end as r3
		,a.receive_no as r4
		,a.receive_date as r5 
		,a.quantity as r6
		,x.arr_tgl_keluar as r7
		,x.arr_no_keluar as r8
		,x.arr_quantity_keluar as r9
		,x.arr_dok_keluar as r10
		,a.unit as r11
		,c.item_id as r12
		,a.doc_from as r13
		FROM dbo.view_data_assets_incoming_ecc a 
		left join dbo.sp_mutasi_saldo_awal_ecc('$date_start') b ON a.item_id=b.item_id
		left join dbo.sp_mutasi_keluar_sipop('$date_start','$date_end') x ON a.stock_move_id=x.parent_id
		left join dbo.view_mst_item_ecc c  ON a.item_id=c.item_id
		left join dbo.view_mst_item_base_ecc d ON c.item_base_id=d.item_base_id
		LEFT JOIN dbo.view_mst_item_category_ecc e ON d.item_category_id = e.item_category_id
	    Left Join dbo.prm_custom_item_type f ON e.custom_item_type_id = f.custom_item_type_id 
		where a.receive_date >='$date_start' and a.receive_date <='$date_end' and c.item_id=$baris and f.custom_item_type_id = 1 ");
		}
		
		$styleArray = array(
			'font'  => array(
				//'bold'  => true,
				//'color' => array('rgb' => '249007'),
				//'size'  => 15,
				//'name'  => 'Verdana'
			),
			'borders' => array(
				'allborders' => array(
					'style' => PHPExcel_Style_Border::BORDER_THIN
				)
			)
		);

		$styleArray1 = array(
			'font'  => array(
				//'bold'  => true,
				//'color' => array('rgb' => '1a57e3'),
				//'size'  => 15,
				//'name'  => 'Verdana'
			),
			'borders' => array(
				'allborders' => array(
					'style' => PHPExcel_Style_Border::BORDER_THIN
				)
			)

		);

		$i = 3;
		$j = '';
		$k = 1;
		$l = 1;
		$jml = 0;
		$kode = '';
		$x = 4;
		$saldo_akhir = 0;
		$saldo_akhir_keluar = 0;
		
		$phpExcel = PHPExcel_IOFactory::load(FCPATH . "/assets/template/card_stock/tmp_card_stock.xlsx");
		$phpExcel->setActiveSheetIndex(0);  //set first sheet as active

		$phpExcel->getActiveSheet()->setCellValueExplicit("A2", "PERIODE : " . $date_start . " s/d " . $date_end, PHPExcel_Cell_DataType::TYPE_STRING);

		foreach ($q->result() as $r) {
			$k = 1 + $i;
			$j = "$k";

			//$phpExcel->getActiveSheet()->setCellValue("A".$j, $l);
			if ($r->r2 != $kode) {


				$phpExcel->getActiveSheet()->setCellValue("A" . $j, $l);
				$phpExcel->getActiveSheet()->setCellValueExplicit("B" . $j, '', PHPExcel_Cell_DataType::TYPE_STRING);
				$phpExcel->getActiveSheet()->setCellValueExplicit("C" . $j, 'Saldo Awal', PHPExcel_Cell_DataType::TYPE_STRING);
				$phpExcel->getActiveSheet()->setCellValueExplicit("D" . $j, '', PHPExcel_Cell_DataType::TYPE_STRING);
				$phpExcel->getActiveSheet()->setCellValueExplicit("E" . $j, $r->r2, PHPExcel_Cell_DataType::TYPE_STRING);
				$phpExcel->getActiveSheet()->setCellValueExplicit("F" . $j, $r->r11, PHPExcel_Cell_DataType::TYPE_STRING);
				$phpExcel->getActiveSheet()->setCellValue("G" . $j, 0);
				$phpExcel->getActiveSheet()->setCellValue("H" . $j, 0);
				$phpExcel->getActiveSheet()->setCellValue("I" . $j, $r->r3);
				$kode = $r->r2;
				$saldo_akhir = $r->r3;

				$phpExcel->getActiveSheet()->getStyle("A$j")->applyFromArray($styleArray);
				$phpExcel->getActiveSheet()->getStyle("B$j")->applyFromArray($styleArray);
				$phpExcel->getActiveSheet()->getStyle("C$j")->applyFromArray($styleArray);
				$phpExcel->getActiveSheet()->getStyle("D$j")->applyFromArray($styleArray);
				$phpExcel->getActiveSheet()->getStyle("E$j")->applyFromArray($styleArray);
				$phpExcel->getActiveSheet()->getStyle("F$j")->applyFromArray($styleArray);
				$phpExcel->getActiveSheet()->getStyle("G$j")->applyFromArray($styleArray);
				$phpExcel->getActiveSheet()->getStyle("H$j")->applyFromArray($styleArray);
				$phpExcel->getActiveSheet()->getStyle("I$j")->applyFromArray($styleArray);
				$i = $i + 1;
				$j = $j + 1;
				$l = $l + 1;
			}

			$saldo_akhir = $saldo_akhir + $r->r6;
			$phpExcel->getActiveSheet()->setCellValue("A" . $j, $l);
			$phpExcel->getActiveSheet()->setCellValueExplicit("B" . $j, $r->r5, PHPExcel_Cell_DataType::TYPE_STRING);  //tanggal
			$phpExcel->getActiveSheet()->setCellValueExplicit("C" . $j, $r->r13, PHPExcel_Cell_DataType::TYPE_STRING);  //nomor
			$phpExcel->getActiveSheet()->setCellValueExplicit("D" . $j, $r->r4, PHPExcel_Cell_DataType::TYPE_STRING);  //nomor
			$phpExcel->getActiveSheet()->setCellValueExplicit("E" . $j, $r->r2, PHPExcel_Cell_DataType::TYPE_STRING);   //kode Barang
			$phpExcel->getActiveSheet()->setCellValueExplicit("F" . $j, $r->r11, PHPExcel_Cell_DataType::TYPE_STRING);  //satuan
			$phpExcel->getActiveSheet()->setCellValue("G" . $j, $r->r6);  //masuk
			$phpExcel->getActiveSheet()->setCellValue("H" . $j, 0);   //keluar
			$phpExcel->getActiveSheet()->setCellValue("I" . $j, $saldo_akhir);

			$phpExcel->getActiveSheet()->getStyle("A$j")->applyFromArray($styleArray);
			$phpExcel->getActiveSheet()->getStyle("B$j")->applyFromArray($styleArray);
			$phpExcel->getActiveSheet()->getStyle("C$j")->applyFromArray($styleArray);
			$phpExcel->getActiveSheet()->getStyle("D$j")->applyFromArray($styleArray);
			$phpExcel->getActiveSheet()->getStyle("E$j")->applyFromArray($styleArray);
			$phpExcel->getActiveSheet()->getStyle("F$j")->applyFromArray($styleArray);
			$phpExcel->getActiveSheet()->getStyle("G$j")->applyFromArray($styleArray);
			$phpExcel->getActiveSheet()->getStyle("H$j")->applyFromArray($styleArray);
			$phpExcel->getActiveSheet()->getStyle("I$j")->applyFromArray($styleArray);
			$i = $i + 1;
			$j = $j + 1;
			$l = $l + 1;

			$arr_qty_keluar = explode('#', $r->r9); // qty_keluar
			$arr_tgl_keluar = explode('#', $r->r7); // tgl keluar
			$arr_no_keluar = explode('#', $r->r8);   // no keluar
			$arr_dok_keluar = explode('#', $r->r10);   // dok keluar
			$jml_arr = count($arr_qty_keluar);
			$jml_tgl = count($arr_tgl_keluar) - 1;
			$jml_dok = count($arr_dok_keluar) - 1;
			if ($r->r7 != null) {

				//$saldo_akhir = $saldo_akhir - $r->r9;

				foreach ($arr_qty_keluar as $key => $value) {
					$k = 1 + $i;
					$j = "$k";
					// $saldo_akhir_keluar=$saldo_akhir - $value;
					$saldo_akhir = $saldo_akhir - $value;

					if ($key > $jml_tgl) {
						$arr_tgl_keluar[$key] = '';
					}

					if ($key > $jml_dok) {
						$arr_dok_keluar[$key] = '';
					}

					$phpExcel->getActiveSheet()->setCellValue("A" . $j, $l);
					$phpExcel->getActiveSheet()->setCellValueExplicit("B" . $j, $arr_tgl_keluar[$key], PHPExcel_Cell_DataType::TYPE_STRING);  //tanggal
					$phpExcel->getActiveSheet()->setCellValueExplicit("C" . $j, $arr_dok_keluar[$key], PHPExcel_Cell_DataType::TYPE_STRING);  //dokumen
					$phpExcel->getActiveSheet()->setCellValueExplicit("D" . $j, $arr_no_keluar[$key], PHPExcel_Cell_DataType::TYPE_STRING);  //nomor
					$phpExcel->getActiveSheet()->setCellValueExplicit("E" . $j, $r->r2, PHPExcel_Cell_DataType::TYPE_STRING);   //kode Barang
					$phpExcel->getActiveSheet()->setCellValueExplicit("F" . $j, $r->r11, PHPExcel_Cell_DataType::TYPE_STRING);  //satuan
					$phpExcel->getActiveSheet()->setCellValue("G" . $j, 0);  //masuk
					$phpExcel->getActiveSheet()->setCellValue("H" . $j, $value);   //keluar
					$phpExcel->getActiveSheet()->setCellValue("I" . $j, $saldo_akhir);

					$phpExcel->getActiveSheet()->getStyle("A$j")->applyFromArray($styleArray);
					$phpExcel->getActiveSheet()->getStyle("B$j")->applyFromArray($styleArray);
					$phpExcel->getActiveSheet()->getStyle("C$j")->applyFromArray($styleArray);
					$phpExcel->getActiveSheet()->getStyle("D$j")->applyFromArray($styleArray);
					$phpExcel->getActiveSheet()->getStyle("E$j")->applyFromArray($styleArray);
					$phpExcel->getActiveSheet()->getStyle("F$j")->applyFromArray($styleArray);
					$phpExcel->getActiveSheet()->getStyle("G$j")->applyFromArray($styleArray);
					$phpExcel->getActiveSheet()->getStyle("H$j")->applyFromArray($styleArray);
					$phpExcel->getActiveSheet()->getStyle("I$j")->applyFromArray($styleArray);
					// $saldo_akhir = $saldo_akhir - $value;
					$i++;
					$l++;
				}
			}
		}

		$report_time = date('_Ymd_His');

		$filename =  "card_stock " . $report_time;
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');

		header("Pragma:no-cache");
		header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
		header("Expires:0");

		$objWriter = PHPExcel_IOFactory::createWriter($phpExcel, 'Excel2007');  //downloadable file is in Excel 2003 format (.xls)
		$objWriter->save('php://output');  //send it to user, of course you can save it to disk also!

		exit; //done.. exiting!	
	}

	function print_transfer_excel_02()
	{
		$format = isset($_REQUEST['format']) ? $_REQUEST['format'] : false;
		$date_start = isset($_REQUEST['date_start']) ? $_REQUEST['date_start'] : false;
		$date_end = isset($_REQUEST['date_end']) ? $_REQUEST['date_end'] : false;
		$baris = isset($_REQUEST['baris']) ? $_REQUEST['baris'] : 0;
		require_once APPPATH . "/third_party/PHPExcel.php";
		require_once APPPATH . "/third_party/PHPExcel/IOFactory.php";

		$phpExcel = PHPExcel_IOFactory::load(FCPATH . "/assets/template/card_stock/tmp_card_stock.xlsx");
		$phpExcel->setActiveSheetIndex(0);  //set first sheet as active

		$this->db_pop = $this->load->database('pop', TRUE);
		if ($baris == 0) {
			$q = $this->db_pop->query("select a.stock_move_id as r1
		,c.item_code as r2
		,case when b.quantity is null then 0 else b.quantity end as r3
		,a.receive_no as r4
		,a.receive_date as r5 
		,a.quantity as r6
		,x.arr_tgl_keluar as r7
		,x.arr_no_keluar as r8
		,x.arr_quantity_keluar as r9
		,x.arr_dok_keluar as r10
		,a.unit as r11
		,c.item_id as r12
		FROM dbo.view_data_assets_incoming_ecc a 
		left join dbo.sp_mutasi_saldo_awal_ecc('$date_start') b ON a.item_id=b.item_id
		left join dbo.sp_mutasi_keluar_sipop('$date_start','$date_end') x ON a.stock_move_id=x.parent_id
		left join dbo.view_mst_item_ecc c  ON a.item_id=c.item_id
		left join dbo.view_mst_item_base_ecc d ON c.item_base_id=d.item_base_id
		LEFT JOIN dbo.view_mst_item_category_ecc e ON d.item_category_id = e.item_category_id
	    Left Join dbo.prm_custom_item_type f ON e.custom_item_type_id = f.custom_item_type_id 
		where a.receive_date >='$date_start' and a.receive_date <='$date_end' and f.custom_item_type_id = 1");
		} else {

			$q = $this->db_pop->query("select a.stock_move_id as r1
		,c.item_code as r2
		,case when b.quantity is null then 0 else b.quantity end as r3
		,a.receive_no as r4
		,a.receive_date as r5 
		,a.quantity as r6
		,x.arr_tgl_keluar as r7
		,x.arr_no_keluar as r8
		,x.arr_quantity_keluar as r9
		,x.arr_dok_keluar as r10
		,a.unit as r11
		,c.item_id as r12
		FROM dbo.view_data_assets_incoming_ecc a 
		left join dbo.sp_mutasi_saldo_awal_ecc('$date_start') b ON a.item_id=b.item_id
		left join dbo.sp_mutasi_keluar_sipop('$date_start','$date_end') x ON a.stock_move_id=x.parent_id
		left join dbo.view_mst_item_ecc c  ON a.item_id=c.item_id
		left join dbo.view_mst_item_base_ecc d ON c.item_base_id=d.item_base_id
		LEFT JOIN dbo.view_mst_item_category_ecc e ON d.item_category_id = e.item_category_id
	    Left Join dbo.prm_custom_item_type f ON e.custom_item_type_id = f.custom_item_type_id 
		where a.receive_date >='$date_start' and a.receive_date <='$date_end' and c.item_id=$baris and f.custom_item_type_id = 1 ");
		}
		$phpExcel->getActiveSheet()->setCellValueExplicit("A2", "PERIODE : " . $date_start . " s/d " . $date_end, PHPExcel_Cell_DataType::TYPE_STRING);

		$styleArray = array(
			'font'  => array(
				//'bold'  => true,
				//'color' => array('rgb' => '249007'),
				//'size'  => 15,
				//'name'  => 'Verdana'
			),
			'borders' => array(
				'allborders' => array(
					'style' => PHPExcel_Style_Border::BORDER_THIN
				)
			)
		);

		$styleArray1 = array(
			'font'  => array(
				//'bold'  => true,
				//'color' => array('rgb' => '1a57e3'),
				//'size'  => 15,
				//'name'  => 'Verdana'
			),
			'borders' => array(
				'allborders' => array(
					'style' => PHPExcel_Style_Border::BORDER_THIN
				)
			)

		);

		$i = 3;
		$j = '';
		$k = 1;
		$l = 1;
		$jml = 0;
		$kode = '';
		$x = 4;
		$saldo_akhir = 0;
		$saldo_akhir_keluar = 0;
		foreach ($q->result() as $r) {
			$k = 1 + $i;
			$j = "$k";

			//$phpExcel->getActiveSheet()->setCellValue("A".$j, $l);
			if ($r->r2 != $kode) {


				$phpExcel->getActiveSheet()->setCellValue("A" . $j, $l);
				$phpExcel->getActiveSheet()->setCellValueExplicit("B" . $j, '', PHPExcel_Cell_DataType::TYPE_STRING);
				$phpExcel->getActiveSheet()->setCellValueExplicit("C" . $j, 'Saldo Awal', PHPExcel_Cell_DataType::TYPE_STRING);
				$phpExcel->getActiveSheet()->setCellValueExplicit("D" . $j, $r->r2, PHPExcel_Cell_DataType::TYPE_STRING);
				$phpExcel->getActiveSheet()->setCellValueExplicit("E" . $j, $r->r11, PHPExcel_Cell_DataType::TYPE_STRING);
				$phpExcel->getActiveSheet()->setCellValue("F" . $j, 0);
				$phpExcel->getActiveSheet()->setCellValue("G" . $j, 0);
				$phpExcel->getActiveSheet()->setCellValue("H" . $j, $r->r3);
				$kode = $r->r2;
				$saldo_akhir = $r->r3;

				$phpExcel->getActiveSheet()->getStyle("A$j")->applyFromArray($styleArray);
				$phpExcel->getActiveSheet()->getStyle("B$j")->applyFromArray($styleArray);
				$phpExcel->getActiveSheet()->getStyle("C$j")->applyFromArray($styleArray);
				$phpExcel->getActiveSheet()->getStyle("D$j")->applyFromArray($styleArray);
				$phpExcel->getActiveSheet()->getStyle("E$j")->applyFromArray($styleArray);
				$phpExcel->getActiveSheet()->getStyle("F$j")->applyFromArray($styleArray);
				$phpExcel->getActiveSheet()->getStyle("G$j")->applyFromArray($styleArray);
				$phpExcel->getActiveSheet()->getStyle("H$j")->applyFromArray($styleArray);
				$i = $i + 1;
				$j = $j + 1;
				$l = $l + 1;
			}

			$saldo_akhir = $saldo_akhir + $r->r6;
			$phpExcel->getActiveSheet()->setCellValue("A" . $j, $l);
			$phpExcel->getActiveSheet()->setCellValueExplicit("B" . $j, $r->r5, PHPExcel_Cell_DataType::TYPE_STRING);  //tanggal
			$phpExcel->getActiveSheet()->setCellValueExplicit("C" . $j, $r->r4, PHPExcel_Cell_DataType::TYPE_STRING);  //dokumen
			$phpExcel->getActiveSheet()->setCellValueExplicit("D" . $j, $r->r2, PHPExcel_Cell_DataType::TYPE_STRING);   //kode Barang
			$phpExcel->getActiveSheet()->setCellValueExplicit("E" . $j, $r->r11, PHPExcel_Cell_DataType::TYPE_STRING);  //satuan
			$phpExcel->getActiveSheet()->setCellValue("F" . $j, $r->r6);  //masuk
			$phpExcel->getActiveSheet()->setCellValue("G" . $j, 0);   //keluar
			$phpExcel->getActiveSheet()->setCellValue("H" . $j, $saldo_akhir);

			$phpExcel->getActiveSheet()->getStyle("A$j")->applyFromArray($styleArray);
			$phpExcel->getActiveSheet()->getStyle("B$j")->applyFromArray($styleArray);
			$phpExcel->getActiveSheet()->getStyle("C$j")->applyFromArray($styleArray);
			$phpExcel->getActiveSheet()->getStyle("D$j")->applyFromArray($styleArray);
			$phpExcel->getActiveSheet()->getStyle("E$j")->applyFromArray($styleArray);
			$phpExcel->getActiveSheet()->getStyle("F$j")->applyFromArray($styleArray);
			$phpExcel->getActiveSheet()->getStyle("G$j")->applyFromArray($styleArray);
			$phpExcel->getActiveSheet()->getStyle("H$j")->applyFromArray($styleArray);
			$i = $i + 1;
			$j = $j + 1;
			$l = $l + 1;

			$arr_qty_keluar = explode('#', $r->r9); // qty_keluar
			$arr_tgl_keluar = explode('#', $r->r7); // tgl keluar
			$arr_no_keluar = explode('#', $r->r8);   // no keluar
			$arr_dok_keluar = explode('#', $r->r10);   // dok keluar
			$jml_arr = count($arr_qty_keluar);
			$jml_tgl = count($arr_tgl_keluar) - 1;
			$jml_dok = count($arr_dok_keluar) - 1;
			if ($r->r7 != null) {

				//$saldo_akhir = $saldo_akhir - $r->r9;

				foreach ($arr_qty_keluar as $key => $value) {
					$k = 1 + $i;
					$j = "$k";
					// $saldo_akhir_keluar=$saldo_akhir - $value;
					$saldo_akhir = $saldo_akhir - $value;

					if ($key > $jml_tgl) {
						$arr_tgl_keluar[$key] = '';
					}

					if ($key > $jml_dok) {
						$arr_dok_keluar[$key] = '';
					}

					$phpExcel->getActiveSheet()->setCellValue("A" . $j, $l);
					$phpExcel->getActiveSheet()->setCellValueExplicit("B" . $j, $arr_tgl_keluar[$key], PHPExcel_Cell_DataType::TYPE_STRING);  //tanggal
					// $phpExcel->getActiveSheet()->setCellValueExplicit("C".$j, $arr_no_keluar [$key], PHPExcel_Cell_DataType::TYPE_STRING);  //dokumen
					$phpExcel->getActiveSheet()->setCellValueExplicit("C" . $j, $arr_dok_keluar[$key], PHPExcel_Cell_DataType::TYPE_STRING);  //dokumen
					$phpExcel->getActiveSheet()->setCellValueExplicit("D" . $j, $r->r2, PHPExcel_Cell_DataType::TYPE_STRING);   //kode Barang
					$phpExcel->getActiveSheet()->setCellValueExplicit("E" . $j, $r->r11, PHPExcel_Cell_DataType::TYPE_STRING);  //satuan
					$phpExcel->getActiveSheet()->setCellValue("F" . $j, 0);  //masuk
					$phpExcel->getActiveSheet()->setCellValue("G" . $j, $value);   //keluar
					$phpExcel->getActiveSheet()->setCellValue("H" . $j, $saldo_akhir);

					$phpExcel->getActiveSheet()->getStyle("A$j")->applyFromArray($styleArray);
					$phpExcel->getActiveSheet()->getStyle("B$j")->applyFromArray($styleArray);
					$phpExcel->getActiveSheet()->getStyle("C$j")->applyFromArray($styleArray);
					$phpExcel->getActiveSheet()->getStyle("D$j")->applyFromArray($styleArray);
					$phpExcel->getActiveSheet()->getStyle("E$j")->applyFromArray($styleArray);
					$phpExcel->getActiveSheet()->getStyle("F$j")->applyFromArray($styleArray);
					$phpExcel->getActiveSheet()->getStyle("G$j")->applyFromArray($styleArray);
					$phpExcel->getActiveSheet()->getStyle("H$j")->applyFromArray($styleArray);
					// $saldo_akhir = $saldo_akhir - $value;
					$i++;
					$l++;
				}
			}
		}

		$report_time = date('_Ymd_His');

		$filename =  "card_stock " . $report_time;
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');

		header("Pragma:no-cache");
		header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
		header("Expires:0");

		$objWriter = PHPExcel_IOFactory::createWriter($phpExcel, 'Excel2007');  //downloadable file is in Excel 2003 format (.xls)
		$objWriter->save('php://output');  //send it to user, of course you can save it to disk also!

		exit; //done.. exiting!	
	}

	function print_transfer_excel_01()
	{
		$format = isset($_REQUEST['format']) ? $_REQUEST['format'] : false;
		$date_start = isset($_REQUEST['date_start']) ? $_REQUEST['date_start'] : false;
		$date_end = isset($_REQUEST['date_end']) ? $_REQUEST['date_end'] : false;
		$baris = isset($_REQUEST['baris']) ? $_REQUEST['baris'] : 0;
		require_once APPPATH . "/third_party/PHPExcel.php";
		require_once APPPATH . "/third_party/PHPExcel/IOFactory.php";

		$phpExcel = PHPExcel_IOFactory::load(FCPATH . "/assets/template/card_stock/tmp_card_stock.xlsx");
		$phpExcel->setActiveSheetIndex(0);  //set first sheet as active

		$this->db_pop = $this->load->database('pop', TRUE);
		if ($baris == 0) {
			$q = $this->db_pop->query("select a.stock_move_id as r1
		,c.item_code as r2
		,case when b.quantity is null then 0 else b.quantity end as r3
		,a.receive_no as r4
		,a.receive_date as r5 
		,a.quantity as r6
		,x.arr_tgl_keluar as r7
		,x.arr_no_keluar as r8
		,x.arr_quantity_keluar as r9
		,x.arr_dok_keluar as r10
		,a.unit as r11
		,c.item_id as r12
		FROM dbo.view_data_assets_incoming a 
		left join dbo.sp_mutasi_saldo_awal_ecc('$date_start') b ON a.item_id=b.item_id
		left join dbo.sp_mutasi_keluar_sipop('$date_start','$date_end') x ON a.stock_move_id=x.parent_id
		left join dbo.view_mst_item_ecc c  ON a.item_id=c.item_id
		where a.receive_date >='$date_start' and a.receive_date <='$date_end' ");
		} else {

			$q = $this->db_pop->query("select a.stock_move_id as r1
		,c.item_code as r2
		,case when b.quantity is null then 0 else b.quantity end as r3
		,a.receive_no as r4
		,a.receive_date as r5 
		,a.quantity as r6
		,x.arr_tgl_keluar as r7
		,x.arr_no_keluar as r8
		,x.arr_quantity_keluar as r9
		,x.arr_dok_keluar as r10
		,a.unit as r11
		,c.item_id as r12
		FROM dbo.view_data_assets_incoming a 
		left join dbo.sp_mutasi_saldo_awal_ecc('$date_start') b ON a.item_id=b.item_id
		left join dbo.sp_mutasi_keluar_sipop('$date_start','$date_end') x ON a.stock_move_id=x.parent_id
		left join dbo.view_mst_item_ecc c  ON a.item_id=c.item_id
		where a.receive_date >='$date_start' and a.receive_date <='$date_end' and c.item_id=$baris  ");
		}
		$phpExcel->getActiveSheet()->setCellValueExplicit("A2", "PERIODE : " . $date_start . " s/d " . $date_end, PHPExcel_Cell_DataType::TYPE_STRING);

		$styleArray = array(
			'font'  => array(
				//'bold'  => true,
				//'color' => array('rgb' => '249007'),
				//'size'  => 15,
				//'name'  => 'Verdana'
			),
			'borders' => array(
				'allborders' => array(
					'style' => PHPExcel_Style_Border::BORDER_THIN
				)
			)
		);

		$styleArray1 = array(
			'font'  => array(
				//'bold'  => true,
				//'color' => array('rgb' => '1a57e3'),
				//'size'  => 15,
				//'name'  => 'Verdana'
			),
			'borders' => array(
				'allborders' => array(
					'style' => PHPExcel_Style_Border::BORDER_THIN
				)
			)

		);

		$i = 3;
		$j = '';
		$k = 1;
		$l = 1;
		$jml = 0;
		$kode = '';
		$x = 4;
		$saldo_akhir = 0;
		$saldo_akhir_keluar = 0;
		foreach ($q->result() as $r) {
			$k = 1 + $i;
			$j = "$k";

			//$phpExcel->getActiveSheet()->setCellValue("A".$j, $l);
			if ($r->r2 == $kode) {
				$saldo_akhir = $saldo_akhir + $r->r6;

				if ($r->r7 != null) {
					$arr_qty_keluar = explode('#', $r->r9); // qty_keluar
					$arr_tgl_keluar = explode('#', $r->r7); // tgl keluar
					$arr_no_keluar = explode('#', $r->r8);   // no keluar
					$arr_dok_keluar = explode('#', $r->r10);   // dok keluar

					$jml_arr = count($arr_qty_keluar);

					foreach ($arr_qty_keluar as $key => $value) {
						$k = 1 + $i;
						$j = "$k";
						$saldo_akhir_keluar = $saldo_akhir - $value;
						$phpExcel->getActiveSheet()->setCellValue("A" . $j, $l);
						$phpExcel->getActiveSheet()->setCellValueExplicit("B" . $j, $arr_tgl_keluar[$key], PHPExcel_Cell_DataType::TYPE_STRING);  //tanggal
						// $phpExcel->getActiveSheet()->setCellValueExplicit("C".$j, $arr_no_keluar [$key], PHPExcel_Cell_DataType::TYPE_STRING);  //dokumen
						$phpExcel->getActiveSheet()->setCellValueExplicit("C" . $j, $arr_dok_keluar[$key], PHPExcel_Cell_DataType::TYPE_STRING);  //dokumen
						$phpExcel->getActiveSheet()->setCellValueExplicit("D" . $j, $r->r2, PHPExcel_Cell_DataType::TYPE_STRING);   //kode Barang
						$phpExcel->getActiveSheet()->setCellValueExplicit("E" . $j, $r->r11, PHPExcel_Cell_DataType::TYPE_STRING);  //satuan
						$phpExcel->getActiveSheet()->setCellValue("F" . $j, 0);  //masuk
						$phpExcel->getActiveSheet()->setCellValue("G" . $j, $value);   //keluar
						$phpExcel->getActiveSheet()->setCellValue("H" . $j, $saldo_akhir_keluar);

						$phpExcel->getActiveSheet()->getStyle("A$j")->applyFromArray($styleArray);
						$phpExcel->getActiveSheet()->getStyle("B$j")->applyFromArray($styleArray);
						$phpExcel->getActiveSheet()->getStyle("C$j")->applyFromArray($styleArray);
						$phpExcel->getActiveSheet()->getStyle("D$j")->applyFromArray($styleArray);
						$phpExcel->getActiveSheet()->getStyle("E$j")->applyFromArray($styleArray);
						$phpExcel->getActiveSheet()->getStyle("F$j")->applyFromArray($styleArray);
						$phpExcel->getActiveSheet()->getStyle("G$j")->applyFromArray($styleArray);
						$phpExcel->getActiveSheet()->getStyle("H$j")->applyFromArray($styleArray);
						$saldo_akhir = $saldo_akhir_keluar;
						$i++;
						$l++;
					}

					$i = $i - 1;
				} else {
					$phpExcel->getActiveSheet()->setCellValue("A" . $j, $l);
					$phpExcel->getActiveSheet()->setCellValueExplicit("B" . $j, $r->r5, PHPExcel_Cell_DataType::TYPE_STRING);  //tanggal
					$phpExcel->getActiveSheet()->setCellValueExplicit("C" . $j, $r->r4, PHPExcel_Cell_DataType::TYPE_STRING);  //dokumen
					$phpExcel->getActiveSheet()->setCellValueExplicit("D" . $j, $r->r2, PHPExcel_Cell_DataType::TYPE_STRING);   //kode Barang
					$phpExcel->getActiveSheet()->setCellValueExplicit("E" . $j, $r->r11, PHPExcel_Cell_DataType::TYPE_STRING);  //satuan
					$phpExcel->getActiveSheet()->setCellValue("F" . $j, $r->r6);  //masuk
					$phpExcel->getActiveSheet()->setCellValue("G" . $j, 0);   //keluar
					$phpExcel->getActiveSheet()->setCellValue("H" . $j, $saldo_akhir);

					$phpExcel->getActiveSheet()->getStyle("A$j")->applyFromArray($styleArray);
					$phpExcel->getActiveSheet()->getStyle("B$j")->applyFromArray($styleArray);
					$phpExcel->getActiveSheet()->getStyle("C$j")->applyFromArray($styleArray);
					$phpExcel->getActiveSheet()->getStyle("D$j")->applyFromArray($styleArray);
					$phpExcel->getActiveSheet()->getStyle("E$j")->applyFromArray($styleArray);
					$phpExcel->getActiveSheet()->getStyle("F$j")->applyFromArray($styleArray);
					$phpExcel->getActiveSheet()->getStyle("G$j")->applyFromArray($styleArray);
					$phpExcel->getActiveSheet()->getStyle("H$j")->applyFromArray($styleArray);
				}
			} else {
				$phpExcel->getActiveSheet()->setCellValue("A" . $j, $l);
				$phpExcel->getActiveSheet()->setCellValueExplicit("B" . $j, '', PHPExcel_Cell_DataType::TYPE_STRING);
				$phpExcel->getActiveSheet()->setCellValueExplicit("C" . $j, 'Saldo Awal', PHPExcel_Cell_DataType::TYPE_STRING);
				$phpExcel->getActiveSheet()->setCellValueExplicit("D" . $j, $r->r2, PHPExcel_Cell_DataType::TYPE_STRING);
				$phpExcel->getActiveSheet()->setCellValueExplicit("E" . $j, $r->r11, PHPExcel_Cell_DataType::TYPE_STRING);
				$phpExcel->getActiveSheet()->setCellValue("F" . $j, 0);
				$phpExcel->getActiveSheet()->setCellValue("G" . $j, 0);
				$phpExcel->getActiveSheet()->setCellValue("H" . $j, $r->r3);
				$kode = $r->r2;
				$saldo_akhir = $r->r3;

				$phpExcel->getActiveSheet()->getStyle("A$j")->applyFromArray($styleArray);
				$phpExcel->getActiveSheet()->getStyle("B$j")->applyFromArray($styleArray);
				$phpExcel->getActiveSheet()->getStyle("C$j")->applyFromArray($styleArray);
				$phpExcel->getActiveSheet()->getStyle("D$j")->applyFromArray($styleArray);
				$phpExcel->getActiveSheet()->getStyle("E$j")->applyFromArray($styleArray);
				$phpExcel->getActiveSheet()->getStyle("F$j")->applyFromArray($styleArray);
				$phpExcel->getActiveSheet()->getStyle("G$j")->applyFromArray($styleArray);
				$phpExcel->getActiveSheet()->getStyle("H$j")->applyFromArray($styleArray);
			}

			//$phpExcel->getActiveSheet()->setCellValue("E".$j, $r->r4);
			//$phpExcel->getActiveSheet()->setCellValue("F".$j, $r->r5);
			//$phpExcel->getActiveSheet()->setCellValue("G".$j, $r->r6);

			//$phpExcel->getActiveSheet()->getStyle("A$j")->applyFromArray($styleArray);
			//$phpExcel->getActiveSheet()->getStyle("B$j")->applyFromArray($styleArray);
			//$phpExcel->getActiveSheet()->getStyle("C$j")->applyFromArray($styleArray);
			//$phpExcel->getActiveSheet()->getStyle("D$j")->applyFromArray($styleArray);
			//$phpExcel->getActiveSheet()->getStyle("E$j")->applyFromArray($styleArray);
			//$phpExcel->getActiveSheet()->getStyle("F$j")->applyFromArray($styleArray);
			//$phpExcel->getActiveSheet()->getStyle("G$j")->applyFromArray($styleArray);
			//$phpExcel->getActiveSheet()->getStyle("H$j")->applyFromArray($styleArray);			
			$l++;
			$i++;
		}

		$report_time = date('_Ymd_His');

		$filename =  "card_stock " . $report_time;
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');

		header("Pragma:no-cache");
		header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
		header("Expires:0");

		$objWriter = PHPExcel_IOFactory::createWriter($phpExcel, 'Excel2007');  //downloadable file is in Excel 2003 format (.xls)
		$objWriter->save('php://output');  //send it to user, of course you can save it to disk also!

		exit; //done.. exiting!	
	}
}
