<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Pabean_in extends CI_Controller
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

	function pabean_in_table()
	{
		$field = array();
		$field['r1'] = array('sc' => 'r1', 'ctype' => 'text', 'bypassvalue' => '', 'title' => 'TIPE BC');
		$field['r2'] = array('sc' => 'r2', 'ctype' => 'text', 'bypassvalue' => '', 'title' => 'NO');
		$field['r3'] = array('sc' => 'r3', 'ctype' => 'date', 'bypassvalue' => '', 'title' => 'DATE');
		$field['r4'] = array('sc' => 'r4', 'ctype' => 'text', 'bypassvalue' => '', 'title' => 'NO');
		$field['r5'] = array('sc' => 'r5', 'ctype' => 'date', 'bypassvalue' => '', 'title' => 'DATE');
		$field['r6'] = array('sc' => 'r6', 'ctype' => 'text', 'bypassvalue' => '', 'title' => 'SUPLIER NAME');
		$field['r7'] = array('sc' => 'r7', 'ctype' => 'text', 'bypassvalue' => '', 'title' => 'CODE');
		$field['r8'] = array('sc' => 'r8', 'ctype' => 'text', 'bypassvalue' => '', 'title' => 'NAME');
		$field['r9'] = array('sc' => 'r9', 'ctype' => 'text', 'bypassvalue' => '', 'title' => 'UNIT');
		$field['r10'] = array('sc' => 'r10', 'ctype' => 'int', 'bypassvalue' => '', 'title' => 'QTY', 'data_type' => 'decimal', 'decimal_digit' => 4);
		$field['r11'] = array('sc' => 'r11', 'ctype' => 'text', 'bypassvalue' => '', 'title' => 'VAL');
		$field['r12'] = array('sc' => 'r12', 'ctype' => 'int', 'bypassvalue' => '', 'title' => 'JML', 'data_type' => 'decimal', 'decimal_digit' => 4);
		$field['r13'] = array('sc' => 'r13', 'ctype' => 'text', 'bypassvalue' => '', 'title' => 'CAR');
		$field['r14'] = array('sc' => 'r14', 'ctype' => 'text', 'bypassvalue' => '', 'title' => 'HS CODE');
		$field['r15'] = array('sc' => 'r15', 'ctype' => 'int', 'bypassvalue' => '', 'title' => 'UNIT RECEIVE');
		$field['r16'] = array('sc' => 'r16', 'ctype' => 'int', 'bypassvalue' => '', 'title' => 'CONVERSION','data_type' => 'decimal', 'decimal_digit' => 4);
		$field['r17'] = array('sc' => 'r17', 'ctype' => 'int', 'bypassvalue' => '', 'title' => 'QTY WAREHOUSE', 'data_type' => 'decimal', 'decimal_digit' => 6);
		
	 return $field;
	}

	function index()
	{
		$this->load->model('main');
		$component['loadlayout'] = true;
		$component['view_load'] = 'external_report/pabean_in/view';
		$component['load_js'][] = 'external_report/pabean_in/view';

		$component['page_title'] = "Pabean Pemasukan";
		$dashboard_table = array();

		$field = $this->pabean_in_table();
		$dashboard_table['field'] = $field;
		$component['dashboard_table'] = $dashboard_table;

		$this->authentication->ajaxlayout($component);
	}

	function loaddata()
	{
		$field = $this->pabean_in_table();

		$date_start = isset($_REQUEST['date_start']) ?  $_REQUEST['date_start'] : '';
		$date_end = isset($_REQUEST['date_end']) ? $_REQUEST['date_end'] : '';
		$print = isset($_REQUEST['print']) ? $_REQUEST['print'] : 0;
		$format = isset($_REQUEST['format']) ? $_REQUEST['format'] : 'xlsx';
		$page = isset($_POST['page']) ? $_POST['page'] : 1; // get the requested page 
		$rows = isset($_POST['rows']) ? $_POST['rows'] : 10; // get how many rows we want to have into the grid 
		$sidx = isset($_POST['sidx']) ? $_POST['sidx'] : 'r5'; // get index row - i.e. user click to sort 
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

		if (strlen(trim($date_start)) == 0) {
			$date_start = '1900-01-01';
		}

		if (strlen(trim($date_end)) == 0) {
			$date_end = '9999-12-31';
		}

		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";


		$sp = "dbo.sp_rpt_bc_in";
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

			$result = $this->rpc_service->resultPrint2();
			echo json_encode($result);
		} else {
			$this->authentication->plainlayout();


			$result = $this->rpc_service->resultJSON_pop();
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

			echo json_encode($responce);
		}
	}
	
	function print_excel(){ 
	  $this->db_pop = $this->load->database('pop',TRUE);
	  $this->load->model('main');
	  $this->load->library('mainconfig');
			
      $date_start = isset($_POST['date_start']) ? $_POST['date_start'] : '';
	  $date_end = isset($_POST['date_end']) ? $_POST['date_end'] : '';
      $format = isset($_POST['format']) ? $_POST['format'] : 'xlsx';
	  $print = isset($_POST['print']) ? $_POST['print'] : 0;
	  
	  $user_id = $this->session->userdata('user_id');
	  
	   $temp=sys_get_temp_dir().'\\';
	 // var_dump($xrow_detail);die();
	    $host_libreoffice='127.0.0.1'; // setting host service libreoffice
        $port_libreoffice='8080';      // setting port service libreoffice
	    $TEMPLATE_EXT='fods';
	    $NEWLINE='<text:line-break/>';
	    $unoconv='"C:/Program Files/LibreOffice 5/program/python.exe" "C:\Program Files\LibreOffice 5\program\unoconv" '.'--connection "socket,host='.$host_libreoffice.',port='.            $port_libreoffice.',tcpNoDelay=1;urp;StarOffice.ComponentContext" ';
	   
	    $report_time=date('_Ymd_His');      
       	
		 if ($format =='xlsx'){
		   // $template='C:/tmp_sipop/report/pabean_in/lap_pabean_in_1.fods';
		   // $templateData='C:/tmp_sipop/report/pabean_in/lap_pabean_in_1_data.fods';
			$template='C:/tmp_sipop/report/pabean_in/excel/lap_pabean_in_header.fods';
		    $templateData='C:/tmp_sipop/report/pabean_in/excel/lap_pabean_in_data.fods';
		  	$tmp_ext='fods';
			$EXTENSION='xlsx';
			$CONTENT_TYPE='application/msexcel';
			$CONVERT_TO='xlsx';
			$report_name='Laporan_pemasukan';
			
		   // $des='Excel';
	   }else{
		    $template='C:/tmp_sipop/warehouse/purchase_order/pdf/purchase_orderx.fodt';
		    $templateData='C:/tmp_sipop/warehouse/purchase_order/pdf/purchase_order_datax.fodt';
		  	$tmp_ext='fodt';
			$EXTENSION='pdf';
			$CONTENT_TYPE='application/pdf';
			$CONVERT_TO='pdf';
			$report_name='invoice';
			
		   // $des='PDF';
	   }
	   
	   $template_doc=file_get_contents($template);
       $template_data=file_get_contents($templateData);
	   
	   	$data_detail=array('{no_urut}','{tipe_bc}','{no_doc}','{date_doc}','{no_receive}','{date_receive}','{supplier_name}','{code_item}','{name_item}','{satuan}','{qty}','{val}','{amount}','{car}',
		'{hs}','(unit_receive}','{conversion}','{qty_warehouse}');
	   $q2 = $this->db_pop->query("SELECT * FROM dbo.view_rpt_bc_in_ecc2 WHERE grn_date between '".$date_start."' and '".$date_end."'" );
	   $i=1;
	    $value_detail ='';
	     foreach($q2->result() as $r2){
			 $r2->type_bc;
			
			 $isi_detail=array($i,$r2->type_bc,$r2->bc_no, $r2->bc_date,$r2->grn_no,$r2->grn_date,$r2->partner_name,$r2->item_base_code,$r2->item_base_name,
			 $r2->uom_code,number_format($r2->qty,0),$r2->currencies_code,number_format($r2->jumlah,4),$r2->car,$r2->hs_code,$r2->unit_received,number_format($r2->conversion,4),number_format($r2->quantity_warehouse,0));
			 $value_detail .=str_replace($data_detail,$isi_detail,$template_data);
			// number_format($r2->quantity_ordered,4),$qty,$amount,$r2->purchase_order_detail_memo,$r2->item_code);
			//var_dump($r2->unit_received);
			$i++;
		 }
		// die();
		   $data_header=array('{periode}','{data}');	
		   $isi_header=array($date_start .' s/d ' .$date_end,$value_detail);
		   $value_header=str_replace($data_header,$isi_header,$template_doc);
		   
		   file_put_contents($temp.$report_name.$report_time.'.'.$tmp_ext,$value_header);
	     exec(
             $unoconv.
             '-f '.$CONVERT_TO.' '.
             '-o "'.$temp.$report_name.$report_time.'.'.$EXTENSION.'" '.
             '"'.$temp.$report_name.$report_time.'.'.$tmp_ext.'"'
             );
		
        $file=$temp.$report_name.$report_time.'.'.$EXTENSION;
		$namafile=$report_name.$report_time.'.'.$EXTENSION;
	    unlink($temp.$report_name.$report_time.'.'.$tmp_ext);		
		
        $return['valid'] =true;
		$return['xfile'] =$file;
		$return['namafile'] =$namafile; 		
	 
		//$return['valid'] =false;
		//$return['des'] =$des; 
		
		//$return['status_code'] = $result['no'];
		//$return['message'] = $result['des'];
		//$return['spec_detail_id'] = $data_result['spec_detail_id'];
		//$get_field['r16']['editable'] = true;
		//$get_field['r17']['editable'] = true;
		
		echo json_encode($return);
	   
	}
}
