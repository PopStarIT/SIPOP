<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Bill_of_material extends CI_Controller { 

	function __construct(){ 
		parent::__construct(); 
		
		$this->data_request = $_REQUEST;
		
		$module = $this->router->module;
		$directory = $this->router->directory;
		$class = $this->router->class;
		$method = $this->router->method;
		$directory = trim(str_replace('../modules/'.$module ,'',str_replace('/controllers/','',$directory)),'/');
		
		$this->module = $module;
		if(trim($directory) != ''){
			$this->directory = $directory;
		} else {
			$this->directory = '0';
			$this->directory2 = '';
		}
		$this->class = $class;
		$this->method = $method;
	}
	
	function bom_table(){
		$view = 'view_bom';
		$get_field = $this->ecc_library->get_field($view);
		
		$get_field['r1']['hidden'] = true;
		$get_field['r10']['hidden'] = true;
		$get_field['r11']['hidden'] = true;
		$get_field['r12']['hidden'] = true;
		$get_field['r13']['hidden'] = true;
		$get_field['r14']['hidden'] = true;
		$get_field['r15']['hidden'] = true;
		$get_field['r16']['hidden'] = true;
		
		$get_field['r2']['width'] = 150;
		$get_field['r3']['width'] = 200;
		$get_field['r4']['width'] = 200;
		$get_field['r7']['width'] = 170;
		$get_field['r9']['width'] = 170;
		
		return $get_field;
	}
	
	function bom_detail_table() {
		$view = 'view_bom_detail';
		$get_field = $this->ecc_library->get_field($view);
		
		$get_field['r1']['hidden'] = true;
		$get_field['r2']['hidden'] = true;
		$get_field['r6']['hidden'] = true;
		$get_field['r7']['hidden'] = true;
		$get_field['r8']['hidden'] = true;
		
		$get_field['act']['sc'] = 'act';
		$get_field['act']['title'] = '#';
		$get_field['act']['bypassvalue'] = '';
		$get_field['act']['ctype'] = 'text';
		$get_field['act']['align'] = 'center';
		$get_field['act']['search'] = false;
		$get_field['act']['sortable'] = false;
		$get_field['act']['formatter'] = 'formatOperations';
		$get_field['act']['width'] = 300;
		
		return $get_field;
	}
	
	function index(){
		$this->load->model('main');
		$component['loadlayout'] = true;
		$component['view_load'] = 'manufacture/bill_of_material/view';
		$component['view_load_form'] = 'manufacture/bill_of_material/form';
		$component['load_js'][] = 'manufacture/bill_of_material/view';
		$component['load_js'][] = 'manufacture/bill_of_material/form';
		
		$component['page_title'] = 'Bill Of Material';
		
		$dashboard_table = array();
		
		$nav_button = array();
		$nav_button[] = array('method_id' => 420,'title' => 'Add', 'icon' => 'fa fa-plus', 'load' => 'manufacture/bill_of_material/function_add');
		$nav_button[] = array('method_id' => 421,'title' => 'Edit', 'icon' => 'fa fa-pencil', 'load' => 'manufacture/bill_of_material/function_edit');
		$nav_button[] = array('method_id' => 412,'title' => 'Approve', 'icon' => 'fa fa-pencil', 'load' => 'manufacture/bill_of_material/function_approve');
		$nav_button[] = array('method_id' => 423,'title' => 'Delete', 'icon' => 'fa fa-trash-o', 'load' => 'manufacture/bill_of_material/function_delete');
		$nav_button[] = array('method_id' => 796,'title' => 'Cancel Approve', 'icon' => 'fa fa-pencil', 'load' => 'manufacture/bill_of_material/function_cancel_approve');
		$nav_button[] = array('method_id' => 833,'title' => 'Copy BOM', 'icon' => 'fa fa-pencil', 'load' => 'manufacture/bill_of_material/function_copy_bom');
		$nav_button[] = array('method_id' => 1147,'title' => 'Print Bom', 'icon' => 'fa fa-print', 'load' => 'manufacture/bill_of_material/function_print_bom');
		$nav_button[] = array('method_id' => 7811207,'title' => 'Print Bom_material', 'icon' => 'fa fa-print', 'load' => 'manufacture/bill_of_material/function_print_bom_material');
		//print_bom_material
		
		$field = $this->bom_table();
		$field_detail = $this->bom_detail_table();
		
		$dashboard_table['nav_button'] = $nav_button;
		$dashboard_table['field'] = $field;
		$dashboard_table['field_detail'] = $field_detail;
		$dashboard_table['field_detail_loaddata'] = 'loaddata_detail';
		$component['dashboard_table'] = $dashboard_table;
		
		$this->authentication->ajaxlayout($component);
	}
	
	function loaddata(){
		$this->authentication->plainlayout();
		
		$view = 'view_bom';
		$field = $this->bom_table();
		
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";
 
		$loaddata = $this->ecc_library->get_field_data($view,$field);
			
		echo $loaddata;
	}
	
	function post_add_edit(){
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
				
		$bom_id = isset($_POST['bom_id']) ? $_POST['bom_id'] : '';
		$bom_code = isset($_POST['bom_code']) ? $_POST['bom_code'] : '';
		$bom_name = isset($_POST['bom_name']) ? $_POST['bom_name'] : '';
		$fg_item_id = isset($_POST['fg_item_id']) ? $_POST['fg_item_id'] : '';
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			if($bom_id){
				$this->rpc_service->setSP("dbo.sp_bom_edit");
				$this->rpc_service->addField('bom_id',$bom_id);
			} else {
				$this->rpc_service->setSP("dbo.sp_bom_add");
			}
			
			$this->rpc_service->addField('bom_code',$bom_code);
			$this->rpc_service->addField('bom_name',$bom_name);
			$this->rpc_service->addField('fg_item_id',$fg_item_id);
			
					
			$result = $this->rpc_service->resultJSON();
			
			$data = array();
			if(isset($result)){
				if(isset($result['valid'])){
					if($result['valid']){
						if(isset($result['data'])){
							$data_result = json_decode($result['data'],true);
							
							$return['valid'] = $result['valid'];
							$return['status_code'] = $result['no'];
							$return['message'] = $result['des'];
							
							$return['bom_id'] = $data_result['bom_id'];
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
	
	function approve(){
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
				
		$bom_id = isset($_POST['bom_id']) ? $_POST['bom_id'] : false;
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			
			if($bom_id){
				$this->rpc_service->setSP("dbo.sp_bom_approve");
				$this->rpc_service->addField('bom_id',$bom_id);
			}
					
			$result = $this->rpc_service->resultJSON();
			
			$data = array();
			if(isset($result)){
				if(isset($result['valid'])){
					if($result['valid']){
						if(isset($result['data'])){
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
	
	function cancel_approve(){
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
				
		$bom_id = isset($_POST['bom_id']) ? $_POST['bom_id'] : false;
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			
			if($bom_id){
				$this->rpc_service->setSP("dbo.sp_bom_cancel_approve");
				$this->rpc_service->addField('bom_id',$bom_id);
			}
					
			$result = $this->rpc_service->resultJSON();
			
			$data = array();
			if(isset($result)){
				if(isset($result['valid'])){
					if($result['valid']){
						if(isset($result['data'])){
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
	
	function copy_bom(){
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
				
		$bom_id = isset($_POST['bom_id']) ? $_POST['bom_id'] : false;
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			
			if($bom_id){
				$this->rpc_service->setSP("dbo.sp_bom_copy");
				$this->rpc_service->addField('bom_id',$bom_id);
			}
					
			$result = $this->rpc_service->resultJSON();
			
			$data = array();
			if(isset($result)){
				if(isset($result['valid'])){
					if($result['valid']){
						if(isset($result['data'])){
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
	
	function delete(){
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
				
		$bom_id = isset($_POST['bom_id']) ? $_POST['bom_id'] : false;
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			
			if($bom_id){
				$this->rpc_service->setSP("dbo.sp_bom_delete");
				$this->rpc_service->addField('bom_id',$bom_id);
			}
					
			$result = $this->rpc_service->resultJSON();
			// print_r($result);
			
			$data = array();
			if(isset($result)){
				if(isset($result['valid'])){
					if($result['valid']){
						if(isset($result['data'])){
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
	
	function loaddata_detail(){
		$this->authentication->plainlayout();
		
		$bom_id = isset($_REQUEST['bom_id']) ? is_numeric($_REQUEST['bom_id']) ? $_REQUEST['bom_id']  : -1 : -1;
		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;
		
		$view = 'view_bom_detail';
		$field = $this->bom_detail_table();
		
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";
		
		$extra_param = array();
		$extra_param['where']['0']['field'] = 'r2';
		$extra_param['where']['0']['data'] = $bom_id;
		$extra_param['methodid'] = $methodid;
		
		$loaddata = $this->ecc_library->get_field_data($view,$field,$extra_param);
			
		echo $loaddata;
	}
	
	function post_add_edit_detail(){
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
		
		$bom_id = isset($_POST['bom_id']) ? $_POST['bom_id'] : 0;
		$bom_detail_id = isset($_POST['bom_detail_id']) ? $_POST['bom_detail_id'] : '';
		$mat_item_id = isset($_POST['mat_item_id']) ? $_POST['mat_item_id'] : '';
		$mat_quantity = isset($_POST['mat_quantity']) ? $_POST['mat_quantity'] : '';
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			if($bom_detail_id){
				$this->rpc_service->setSP("dbo.sp_bom_detail_edit");
				$this->rpc_service->addField('bom_detail_id',$bom_detail_id);
			} else {
				$this->rpc_service->setSP("dbo.sp_bom_detail_add");
			}
			
			$this->rpc_service->addField('bom_id',$bom_id);
			$this->rpc_service->addField('mat_item_id',$mat_item_id);
			$this->rpc_service->addField('mat_quantity',$mat_quantity);
			
			$result = $this->rpc_service->resultJSON();
			
			$data = array();
			if(isset($result)){
				if(isset($result['valid'])){
					if($result['valid']){
						if(isset($result['data'])){
							$data = json_decode($result['data'],TRUE);
							$bom_id = $data['bom_id'];
							$bom_detail_id = $data['bom_detail_id'];
							$material = $data['material'];
							$unit = $data['unit'];
							$mat_item_id = $data['mat_item_id'];
							
							$bom = $this->session->userdata('bom');
							
							$row = array();
							// $row['bom_index'] = $seq;
							$row['material'] = $material;
							$row['mat_quantity'] = $mat_quantity;
							$row['unit'] = $unit;
							$row['mat_item_id'] = $mat_item_id;
							$row['bom_detail_id'] = $bom_detail_id;
							$row['bom_id'] = $bom_id;
							
							// $bom[$seq] = $row;
							$newdata = array(
								'bom'  => $bom
								// ,'bom_seq'  => $seq
							);

							$this->session->set_userdata($newdata);	
							
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
	
	function delete_detail(){
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		
		$bom_detail_id = isset($_POST['bom_detail_id']) ? $_POST['bom_detail_id'] : '';
		$user_id = $this->session->userdata('user_id');
		
		if(count($_POST) > 0){
			
			if($bom_detail_id){
				$this->rpc_service_portal->setSP("dbo.sp_bom_detail_delete");
				$this->rpc_service_portal->addField('bom_detail_id',$bom_detail_id);
			}
					
			$result = $this->rpc_service_portal->resultJSON();
			
			$data = array();
			if(isset($result)){
				if(isset($result['valid'])){
					if($result['valid']){
						if(isset($result['data'])){
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
	
	function print_bom_awal() {
      
      $bom_id = isset($_POST['bom_id']) ? $_POST['bom_id'] : false;
      $format = isset($_POST['format']) ? $_POST['format'] : 'pdf';
      $user_id = $this->session->userdata('user_id');
      
      $sp = "dbo.sp_rpt_print_bom";
 
      $this->rpc_service_portal->setSP(array("sp"=>$sp,"mode"=>"2","debug"=>"1"));
      $this->rpc_service_portal->addField('bom_id',$bom_id);
      $this->rpc_service_portal->addField('format',$format);
      $this->rpc_service_portal->addField('temp_folder',sys_get_temp_dir());
      $this->rpc_service_portal->addField('sort','ID');  
      
      $result = $this->rpc_service_portal->resultPrint2();
      echo json_encode($result);
	}
	
	function print_bom() {
	   $this->load->library('excel');
	   
	   $format = isset($_REQUEST['format']) ? $_REQUEST['format'] : false;
	   $bom_id = isset($_REQUEST['bom_id']) ? $_REQUEST['bom_id'] : false;
	     
	    $page = isset($_POST['page'])?$_POST['page']:1; // get the requested page 
        $rows = isset($_POST['rows'])?$_POST['rows']:10; // get how many rows we want to have into the grid 
        $sidx = isset($_POST['sidx'])?$_POST['sidx']:'r1'; // get index row - i.e. user click to sort 
        $sord = isset($_POST['sord'])?$_POST['sord']:'0'; // get the direction 
		$search = isset($_REQUEST['_search'])?$_REQUEST['_search']:false; 
		$filterRules =  isset($_POST['filters'])?$_POST['filters']:false;
		
		//var_dump($bom_id);die();		
		$limit =  $rows;
		$offset =  $rows * ($page - 1);
		
		
		$order = isset($_REQUEST['order']) ? $_REQUEST['order'] : array();
		
		if($sord == 'asc'){
			$sord = 1;
		} else {
			$sord = 2;
		}
		
		$sort =	$sidx. '='.$sord;	
				
		$user_id = $this->session->userdata('user_id');
		
	   
	  
	   $report_time=date('_Ymd_His'); 
	   $excel = new PHPExcel();
       // Settingan awal fil excel
       $excel->getProperties()->setCreator('My Notes Code')
                 ->setLastModifiedBy('My Notes Code')
                 ->setTitle("Print BOM")
                 ->setSubject("Print bom")
                 ->setDescription("Print Bill Of Material")
                 ->setKeywords("print bom");
				 
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
        ));
		
		$rpt_bom=$this->main->getData("dbo.view_rpt_bom",null,array("id"=>$bom_id));
	    $bom_code = $rpt_bom[0]['r31'];
	    $create_date = $rpt_bom[0]['r32'];
	    $bom_nama = $rpt_bom[0]['r37'];
		
		
		//var_dump($bom_code);die();
		
	  //$excel->getActiveSheet()->getStyle('C1:C'.$excel->getActiveSheet()->getHighestRow())
	  //->getAlignment()->setWrapText(true); 
	  
	   
	   $excel->setActiveSheetIndex(0)->setCellValue('A2', "BOM PRODUCTION"); // Set kolom A1 dengan tulisan "DATA SISWA"
	   $excel->getActiveSheet()->mergeCells('A2:G2'); // Set Merge Cell pada kolom A1 sampai L1
       $excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(TRUE); // Set bold kolom A1
       $excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(12); // Set font size 15 untuk kolom A1
       $excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
	   
	   $excel->setActiveSheetIndex(0)->setCellValue('A4', 'BOM NO'); // Set kolom A1 dengan tulisan "DATA SISWA"
	   $excel->getActiveSheet()->mergeCells('A4:B4'); // Set Merge Cell pada kolom A1 sampai L1
       $excel->getActiveSheet()->getStyle('A4')->getFont()->setBold(TRUE); // Set bold kolom A1
       $excel->getActiveSheet()->getStyle('A4')->getFont()->setSize(8); // Set font size 15 untuk kolom A1
	  // $excel->getActiveSheet()->getStyle('A2')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
	   $excel->getActiveSheet()->getStyle('A4:B4')->getAlignment()->setVertical('top');
	   
	    $excel->setActiveSheetIndex(0)->setCellValue('C4', $bom_code); // Set kolom A1 dengan tulisan "DATA SISWA"
	    //$excel->getActiveSheet()->getStyle('C4:D4')->getAlignment()->setWrapText(true); 
		$excel->getActiveSheet()->getStyle('C4:E4'.$excel->getActiveSheet()->getHighestRow())->getAlignment()->setWrapText(true); 
		$excel->getActiveSheet()->getStyle('C4:E4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
	    $excel->getActiveSheet()->mergeCells('C4:E4'); // Set Merge Cell pada kolom A1 sampai L1
		//$excel->getActiveSheet()->getDefaultRowDimension('4')->setRowHeight(30);
		$excel->getActiveSheet()->getRowDimension('4')->setRowHeight(30);
		$excel->getActiveSheet()->getStyle('C4')->getFont()->setSize(8); // Set font size 15 untuk kolom A1
		//$excel->getActiveSheet()->autofitRow(4);
	   //$excel->getActiveSheet()->mergeCells('C4:C5'); // Set Merge Cell pada kolom A1 sampai L1
	  
	  // $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setWrapText(true);	  
	   $excel->setActiveSheetIndex(0)->setCellValue('A5', 'BOM NAME'); // Set kolom A1 dengan tulisan "DATA SISWA"
	   $excel->getActiveSheet()->mergeCells('A5:B5'); // Set Merge Cell pada kolom A1 sampai L1
        $excel->getActiveSheet()->getStyle('A5')->getFont()->setBold(TRUE); // Set bold kolom A1
	    $excel->getActiveSheet()->getStyle('A5:B5')->getAlignment()->setVertical('top');
       $excel->getActiveSheet()->getStyle('A5')->getFont()->setSize(8); // Set font size 15 untuk kolom A1
	   
	   $excel->setActiveSheetIndex(0)->setCellValue('C5', $bom_nama); // Set kolom A1 dengan tulisan "DATA SISWA"
	   $excel->getActiveSheet()->mergeCells('C5:E5'); // Set Merge Cell pada kolom A1 sampai L1
	   $excel->getActiveSheet()->getStyle('C5:E5')->getAlignment()->setWrapText(true);
	   $excel->getActiveSheet()->getStyle('C5:E5')->getAlignment()->setVertical('top');
	   $excel->getActiveSheet()->getRowDimension('5')->setRowHeight(30);
	   $excel->getActiveSheet()->getStyle('C5')->getFont()->setSize(8); // Set font size 15 untuk kolom A1
	   
	   $excel->setActiveSheetIndex(0)->setCellValue('A6', 'CREATE DATE'); // Set kolom A1 dengan tulisan "DATA SISWA"
	   $excel->getActiveSheet()->mergeCells('A6:B6'); // Set Merge Cell pada kolom A1 sampai L1
       $excel->getActiveSheet()->getStyle('A6')->getFont()->setBold(TRUE); // Set bold kolom A1
       $excel->getActiveSheet()->getStyle('A6')->getFont()->setSize(8); // Set font size 15 untuk kolom A1
	   
	   $excel->setActiveSheetIndex(0)->setCellValue('C6', $create_date); // Set kolom A1 dengan tulisan "DATA SISWA"
	   $excel->getActiveSheet()->mergeCells('C6:D6'); // Set Merge Cell pada kolom A1 sampai L1
	   $excel->getActiveSheet()->getStyle('C6:D6')->getAlignment()->setWrapText(true);
	   $excel->getActiveSheet()->getStyle('C6')->getFont()->setSize(8); // Set font size 15 untuk kolom A1
      // $excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
	  
	 
	   
	   //------------ Tabel ==============
	     // Set font size 15 untuk kolom A1
		 
	   $excel->setActiveSheetIndex(0)->setCellValue('A8', "No"); // Set kolom A3 dengan tulisan "NO"
	   $excel->getActiveSheet()->getStyle('A8')->applyFromArray($style_col);
	    //  $excel->getActiveSheet()->getStyle('A4')->applyFromArray($style_col_header);
	   $excel->getActiveSheet()->getStyle('A8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	   $excel->getActiveSheet()->getStyle('A8')->getFont()->setSize(10); 
	  
	   
	    $excel->setActiveSheetIndex(0)->setCellValue('B8', "Item Code"); 
		$excel->getActiveSheet()->mergeCells('B8:c8'); // Set Merge Cell pada kolom A1 sampai L1
		//$excel->getActiveSheet()->getColumnDimension('B')->setWidth(25);
		$excel->getActiveSheet()->getStyle('B8:C8')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$excel->getActiveSheet()->getStyle('B8')->getFont()->setSize(10);
		
		 $excel->setActiveSheetIndex(0)->setCellValue('D8', "Item Name"); 
		$excel->getActiveSheet()->mergeCells('D8:E8'); // Set Merge Cell pada kolom A1 sampai L1
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
		$excel->getActiveSheet()->getStyle('D8:E8')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$excel->getActiveSheet()->getStyle('D8')->getFont()->setSize(10);
		
		$excel->setActiveSheetIndex(0)->setCellValue('F8', "Satuan"); 
		//$excel->getActiveSheet()->getColumnDimension('B')->setWidth(25);
		$excel->getActiveSheet()->getStyle('F8')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$excel->getActiveSheet()->getStyle('F8')->getFont()->setSize(10);
		
		$excel->setActiveSheetIndex(0)->setCellValue('G8', "Qty Material"); 
		//$excel->getActiveSheet()->mergeCells('G10'); // Set Merge Cell pada kolom A1 sampai L1
		$excel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
		$excel->getActiveSheet()->getStyle('G8')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$excel->getActiveSheet()->getStyle('G8')->getFont()->setSize(10);
			

        $i=1;
        $numrow = 9; // Set baris pertama untuk isi tabel adalah baris ke 4		
	 //   $rpt_bom2=$this->main-> main_bom_material($bom_id);
		//foreach($rpt_bom2 as $rpt_bom2s){
		foreach($rpt_bom as $rpt_boms){
			//var_dump($rpt_boms);
	  		
			 //  var_dump($rpt_boms['r33']);
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $i);
		    $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('A'.$numrow)->getFont()->setSize(8);
			
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $rpt_boms['r33']);
		    $excel->getActiveSheet()->getStyle('B'.$numrow.':C'.$numrow.'')->applyFromArray($style_row);
			$excel->getActiveSheet()->mergeCells('B'.$numrow.':C'.$numrow.''); 
			$excel->getActiveSheet()->getStyle('B'.$numrow)->getFont()->setSize(8);
			
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $rpt_boms['r34']);
		    $excel->getActiveSheet()->getStyle('D'.$numrow.':E'.$numrow.'')->applyFromArray($style_row);
			$excel->getActiveSheet()->mergeCells('D'.$numrow.':E'.$numrow.''); 
			$excel->getActiveSheet()->getStyle('D'.$numrow)->getFont()->setSize(8);
			
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $rpt_boms['r38']);
		    $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F'.$numrow)->getFont()->setSize(8);
			
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $rpt_boms['r35']);
		    $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('G'.$numrow)->getFont()->setSize(8);
			 
	     $i=$i+1;
	     $numrow++;
		 
		}
	//	 die(); 
		 // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
         // Set orientasi kertas jadi LANDSCAPE
         $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
         // Set judul file excel nya
         $excel->getActiveSheet(0)->setTitle("Report_print_bom");
         $excel->setActiveSheetIndex(0);
		 $nama_file='Report_print_bom'.$report_time.'.xlsx';
		   // Proses file excel
         header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
         header('Content-Disposition: attachment; filename="Report_print_bom'.$report_time.'.xlsx"'); // Set nama file excel nya
		 header('Cache-Control: max-age=0');
		 
		 header("Content-Type: application/force-download");
		 header("Content-Type: application/download");
		
		 
         $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		 $write->save('php://output');  
	}
	
	function print_bom_material() {
	   $this->load->library('excel');
	   
	   $format = isset($_REQUEST['format']) ? $_REQUEST['format'] : false;
	   $bom_id = isset($_REQUEST['bom_id']) ? $_REQUEST['bom_id'] : false;
	     
	    $page = isset($_POST['page'])?$_POST['page']:1; // get the requested page 
        $rows = isset($_POST['rows'])?$_POST['rows']:10; // get how many rows we want to have into the grid 
        $sidx = isset($_POST['sidx'])?$_POST['sidx']:'r1'; // get index row - i.e. user click to sort 
        $sord = isset($_POST['sord'])?$_POST['sord']:'0'; // get the direction 
		$search = isset($_REQUEST['_search'])?$_REQUEST['_search']:false; 
		$filterRules =  isset($_POST['filters'])?$_POST['filters']:false;
		
		//var_dump($bom_id);die();		
		$limit =  $rows;
		$offset =  $rows * ($page - 1);
		
		
		$order = isset($_REQUEST['order']) ? $_REQUEST['order'] : array();
		
		if($sord == 'asc'){
			$sord = 1;
		} else {
			$sord = 2;
		}
		
		$sort =	$sidx. '='.$sord;	
				
		$user_id = $this->session->userdata('user_id');
		
	   
	  
	   $report_time=date('_Ymd_His'); 
	   $excel = new PHPExcel();
       // Settingan awal fil excel
       $excel->getProperties()->setCreator('My Notes Code')
                 ->setLastModifiedBy('My Notes Code')
                 ->setTitle("Print BOM")
                 ->setSubject("Print bom")
                 ->setDescription("Print Bill Of Material")
                 ->setKeywords("print bom");
				 
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
        ));
		
		$rpt_bom=$this->main->getData("dbo.view_rpt_bom",null,array("id"=>$bom_id));
	    $bom_code = $rpt_bom[0]['r31'];
	    $create_date = $rpt_bom[0]['r32'];
	    $bom_nama = $rpt_bom[0]['r37'];
	    
		//var_dump($bom_code);die();
		
	  //$excel->getActiveSheet()->getStyle('C1:C'.$excel->getActiveSheet()->getHighestRow())
	  //->getAlignment()->setWrapText(true); 
	  
	   
	   $excel->setActiveSheetIndex(0)->setCellValue('A2', "BOM PRODUCTION"); // Set kolom A1 dengan tulisan "DATA SISWA"
	   $excel->getActiveSheet()->mergeCells('A2:G2'); // Set Merge Cell pada kolom A1 sampai L1
       $excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(TRUE); // Set bold kolom A1
       $excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(12); // Set font size 15 untuk kolom A1
       $excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
	   
	   $excel->setActiveSheetIndex(0)->setCellValue('A4', 'BOM NO'); // Set kolom A1 dengan tulisan "DATA SISWA"
	   $excel->getActiveSheet()->mergeCells('A4:B4'); // Set Merge Cell pada kolom A1 sampai L1
       $excel->getActiveSheet()->getStyle('A4')->getFont()->setBold(TRUE); // Set bold kolom A1
       $excel->getActiveSheet()->getStyle('A4')->getFont()->setSize(8); // Set font size 15 untuk kolom A1
	  // $excel->getActiveSheet()->getStyle('A2')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
	   $excel->getActiveSheet()->getStyle('A4:B4')->getAlignment()->setVertical('top');
	   
	    $excel->setActiveSheetIndex(0)->setCellValue('C4', $bom_code); // Set kolom A1 dengan tulisan "DATA SISWA"
	    //$excel->getActiveSheet()->getStyle('C4:D4')->getAlignment()->setWrapText(true); 
		$excel->getActiveSheet()->getStyle('C4:E4'.$excel->getActiveSheet()->getHighestRow())->getAlignment()->setWrapText(true); 
		$excel->getActiveSheet()->getStyle('C4:E4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
	    $excel->getActiveSheet()->mergeCells('C4:E4'); // Set Merge Cell pada kolom A1 sampai L1
		//$excel->getActiveSheet()->getDefaultRowDimension('4')->setRowHeight(30);
		$excel->getActiveSheet()->getRowDimension('4')->setRowHeight(30);
		$excel->getActiveSheet()->getStyle('C4')->getFont()->setSize(8); // Set font size 15 untuk kolom A1
		//$excel->getActiveSheet()->autofitRow(4);
	   //$excel->getActiveSheet()->mergeCells('C4:C5'); // Set Merge Cell pada kolom A1 sampai L1
	  
	  // $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setWrapText(true);	  
	   $excel->setActiveSheetIndex(0)->setCellValue('A5', 'BOM NAME'); // Set kolom A1 dengan tulisan "DATA SISWA"
	   $excel->getActiveSheet()->mergeCells('A5:B5'); // Set Merge Cell pada kolom A1 sampai L1
        $excel->getActiveSheet()->getStyle('A5')->getFont()->setBold(TRUE); // Set bold kolom A1
	    $excel->getActiveSheet()->getStyle('A5:B5')->getAlignment()->setVertical('top');
       $excel->getActiveSheet()->getStyle('A5')->getFont()->setSize(8); // Set font size 15 untuk kolom A1
	   
	   $excel->setActiveSheetIndex(0)->setCellValue('C5', $bom_nama); // Set kolom A1 dengan tulisan "DATA SISWA"
	   $excel->getActiveSheet()->mergeCells('C5:E5'); // Set Merge Cell pada kolom A1 sampai L1
	   $excel->getActiveSheet()->getStyle('C5:E5')->getAlignment()->setWrapText(true);
	   $excel->getActiveSheet()->getStyle('C5:E5')->getAlignment()->setVertical('top');
	   $excel->getActiveSheet()->getRowDimension('5')->setRowHeight(30);
	   $excel->getActiveSheet()->getStyle('C5')->getFont()->setSize(8); // Set font size 15 untuk kolom A1
	   
	//   $excel->setActiveSheetIndex(0)->setCellValue('A6', 'CREATE DATE'); // Set kolom A1 dengan tulisan "DATA SISWA"
	//   $excel->getActiveSheet()->mergeCells('A6:B6'); // Set Merge Cell pada kolom A1 sampai L1
    //   $excel->getActiveSheet()->getStyle('A6')->getFont()->setBold(TRUE); // Set bold kolom A1
    //   $excel->getActiveSheet()->getStyle('A6')->getFont()->setSize(8); // Set font size 15 untuk kolom A1
	//   
	//   $excel->setActiveSheetIndex(0)->setCellValue('C6', $create_date); // Set kolom A1 dengan tulisan "DATA SISWA"
	//   $excel->getActiveSheet()->mergeCells('C6:D6'); // Set Merge Cell pada kolom A1 sampai L1
	//   $excel->getActiveSheet()->getStyle('C6:D6')->getAlignment()->setWrapText(true);
	//   $excel->getActiveSheet()->getStyle('C6')->getFont()->setSize(8); // Set font size 15 untuk kolom A1
      // $excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
	  
	 
	   
	   //------------ Tabel ==============
	     // Set font size 15 untuk kolom A1
		 
	   $excel->setActiveSheetIndex(0)->setCellValue('A8', "No"); // Set kolom A3 dengan tulisan "NO"
	   $excel->getActiveSheet()->getStyle('A8')->applyFromArray($style_col);
	    //  $excel->getActiveSheet()->getStyle('A4')->applyFromArray($style_col_header);
	   $excel->getActiveSheet()->getStyle('A8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	   $excel->getActiveSheet()->getStyle('A8')->getFont()->setSize(10); 
	  
	   
	    $excel->setActiveSheetIndex(0)->setCellValue('B8', "Item Code"); 
		$excel->getActiveSheet()->mergeCells('B8:c8'); // Set Merge Cell pada kolom A1 sampai L1
		//$excel->getActiveSheet()->getColumnDimension('B')->setWidth(25);
		$excel->getActiveSheet()->getStyle('B8:C8')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$excel->getActiveSheet()->getStyle('B8')->getFont()->setSize(10);
		
		 $excel->setActiveSheetIndex(0)->setCellValue('D8', "Item Name"); 
		$excel->getActiveSheet()->mergeCells('D8:E8'); // Set Merge Cell pada kolom A1 sampai L1
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
		$excel->getActiveSheet()->getStyle('D8:E8')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$excel->getActiveSheet()->getStyle('D8')->getFont()->setSize(10);
		
		$excel->setActiveSheetIndex(0)->setCellValue('F8', "Satuan"); 
		//$excel->getActiveSheet()->getColumnDimension('B')->setWidth(25);
		$excel->getActiveSheet()->getStyle('F8')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$excel->getActiveSheet()->getStyle('F8')->getFont()->setSize(10);
		
		$excel->setActiveSheetIndex(0)->setCellValue('G8', "Qty Material"); 
		//$excel->getActiveSheet()->mergeCells('G10'); // Set Merge Cell pada kolom A1 sampai L1
		$excel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
		$excel->getActiveSheet()->getStyle('G8')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$excel->getActiveSheet()->getStyle('G8')->getFont()->setSize(10);
			

        $i=1;
        $numrow = 9; // Set baris pertama untuk isi tabel adalah baris ke 4		
	     $rpt_bom_material=$this->main-> main_bom_material($bom_id);
		 //var_dump($bom_id);die();
		foreach($rpt_bom_material as $rpt_bom_materials){
			 //  var_dump($rpt_boms['r33']);
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $i);
		    $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('A'.$numrow)->getFont()->setSize(8);
			
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $rpt_bom_materials['r33']);
		    $excel->getActiveSheet()->getStyle('B'.$numrow.':C'.$numrow.'')->applyFromArray($style_row);
			$excel->getActiveSheet()->mergeCells('B'.$numrow.':C'.$numrow.''); 
			$excel->getActiveSheet()->getStyle('B'.$numrow)->getFont()->setSize(8);
			
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $rpt_bom_materials['r34']);
		    $excel->getActiveSheet()->getStyle('D'.$numrow.':E'.$numrow.'')->applyFromArray($style_row);
			$excel->getActiveSheet()->mergeCells('D'.$numrow.':E'.$numrow.''); 
			$excel->getActiveSheet()->getStyle('D'.$numrow)->getFont()->setSize(8);
			
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $rpt_bom_materials['r38']);
		    $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F'.$numrow)->getFont()->setSize(8);
			
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $rpt_bom_materials['r35']);
		    $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('G'.$numrow)->getFont()->setSize(8);
			 
	     $i=$i+1;
	     $numrow++;
		 
		}
	//	 die(); 
		 // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
         // Set orientasi kertas jadi LANDSCAPE
         $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
         // Set judul file excel nya
         $excel->getActiveSheet(0)->setTitle("Report_print_bom");
         $excel->setActiveSheetIndex(0);
		 $nama_file='Report_print_bom'.$report_time.'.xlsx';
		   // Proses file excel
         header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
         header('Content-Disposition: attachment; filename="Report_print_bom_material'.$report_time.'.xlsx"'); // Set nama file excel nya
		 header('Cache-Control: max-age=0');
		 
		 header("Content-Type: application/force-download");
		 header("Content-Type: application/download");
		
		 
         $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		 $write->save('php://output');  
	}
}

?>