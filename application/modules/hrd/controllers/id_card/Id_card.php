<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Id_card extends CI_Controller { 
    function __construct()
      { 
		parent::__construct(); 
		$this->CI =& get_instance();
		$this->CI->load->library('mainconfig');	
		$config = $this->CI->config->config;
        $base_config = $config['base_config'];
		$dir_template = "template";
		$template = $base_config['template'];
		//var_dump($template);
		$this->data['path_template'] = $dir_template ."/". $template;
			
		$this->data_request = $_REQUEST;
		
		$module = $this->router->module;
		$directory = $this->router->directory;
		$class = $this->router->class;
		$method = $this->router->method;
		$directory = trim(str_replace('../modules/'.$module ,'',str_replace('/controllers/','',$directory)),'/');
		//var_dump($directory);
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
	  
	  function idcard_table() {
		//$view = 'view_purchase_order';
		$view = 'view_id_card';
		$get_field = $this->ecc_library->get_field_pop($view);
		//12
		$get_field['r2']['hidden'] = true;
		return $get_field;
	}
	 
	 function index() {
		 $this->load->model('main');
		 $component['loadlayout'] = true;
		 $component['view_load'] = 'id_card/view';
		 $component['view_load_form'] = 'id_card/form';
		 $component['view_load_form_template'] = 'id_card/form_template';
	     $component['load_js'][] = 'id_card/view';
		 $component['load_js'][] = 'id_card/form';
		 
		 $component['page_title'] = "ID Card";
		 $dashboard_table = array();
		 
		//$nav_button = array();
		//$nav_button[] = array('method_id' => 781017,'title' => 'Add', 'icon' => 'fa fa-plus', 'load' => 'karyawan/function_add');
		//$nav_button[] = array('method_id' => 781018,'title' => 'Edit', 'icon' => 'fa fa-pencil', 'load' => 'karyawan/function_edit');
		//$nav_button[] = array('method_id' => 781019,'title' => 'Delete', 'icon' => 'fa fa-trash-o', 'load' => 'karyawan/function_delete');
		
		 $field = $this->idcard_table();
		
		//$dashboard_table['nav_button'] = $nav_button;
       	$dashboard_table['field'] = $field;
	    $dashboard_table['field_loaddata'] = 'loaddata';
					 	
		$component['dashboard_table'] = $dashboard_table;
		 
		 $this->authentication->ajaxlayout($component);
	 }
	 
	 function loaddata()
   {
	  	$this->authentication->plainlayout();
		$view = 'view_id_card';
		$field = $this->idcard_table();
	   
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";
		
		$loaddata = $this->ecc_library->get_field_data_pop($view,$field);
		echo $loaddata;
	}
	
	function loaddata_cetak()
   {
	   $component['nik'] = isset($_POST['nik']) ? $_POST['nik'] : '0';
	   $component['page_title'] = "Si A";
		//$component = array_merge($this->data,$data,$array);
	//	var_dump($component);
		//$component=array();
	    echo $this->CI->load->view( $this->data['path_template']."/new_2",$component); 
	 // return view('template/view1',$data=null);
		//echo $loaddata;
	}
	function loaddata_cetak_2()
    {
	   $component['nik'] = isset($_POST['nik']) ? $_POST['nik'] : '0';
	   $component['page_title'] = "Si A";
	   echo $this->CI->load->view( $this->data['path_template']."/terbaru",$component); 
	 
	}
	
	function post_add_edit() {
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
	   // var_dump($_POST);die();
	//	array(7) { ["nama_karyawan"]=> string(12) "acep somatri" ["cari_karyawan"]=> string(3) "232" ["departemen_id"]=> string(2) "41" ["link_photo_karyawan"]=> string(0) "" ["nik"]=> string(8) "15021402" ["divisi_id"]=> string(2) "35" ["info"]=> string(2) "No"}   card_id
	
	//array(9) { ["nama_karyawan_edit"]=> string(0) "" ["card_id_edit"]=> string(3) "405" ["nama_karyawan"]=> string(21) "bella piera rafhyta h" ["departemen_edit"]=> string(2) "41" ["link_photo_karyawan_edit"]=> string(47) "assets/img/profile/bella/bella_084242_BELLA.jpg" ["nik_edit"]=> string(8) "18030505" ["divisi_id_edit"]=> string(2) "34" ["status_id_edit"]=> string(2) "18" ["info"]=> string(3) "Yes" }
	
	    $card_id_edit = isset($_POST['card_id_edit']) ? $_POST['card_id_edit'] : '';
		
		//var_dump($card_id_edit);die();
	    if ($card_id_edit == ''){
			
	       $karyawan_id = isset($_POST['cari_karyawan']) ? $_POST['cari_karyawan'] : '';
		   $nama_karyawan = isset($_POST['nama_karyawan']) ? $_POST['nama_karyawan'] : '';
		   $departemen_id = isset($_POST['departemen_id']) ? $_POST['departemen_id'] : '';
		   $nik = isset($_POST['nik']) ? $_POST['nik'] : '';
		   $divisi_id = isset($_POST['divisi_id']) ? $_POST['divisi_id'] : '';
		   $link_photo_karyawan = isset($_POST['link_photo_karyawan']) ? $_POST['link_photo_karyawan'] : '';
		   $info = isset($_POST['info']) ? $_POST['info'] : '';
		   $card_id = isset($_POST['card_id']) ? $_POST['card_id'] : '';
		   $status_id = isset($_POST['status_id']) ? $_POST['status_id'] : '';
		}else{
		   $karyawan_id = isset($_POST['cari_karyawan']) ? $_POST['cari_karyawan'] : '';
		   $nama_karyawan = isset($_POST['nama_karyawan']) ? $_POST['nama_karyawan'] : '';
		   $departemen_id = isset($_POST['departemen_edit']) ? $_POST['departemen_edit'] : '';
		   $link_photo_karyawan = isset($_POST['link_photo_karyawan_edit']) ? $_POST['link_photo_karyawan_edit'] : '';
		   $nik = isset($_POST['nik_edit']) ? $_POST['nik_edit'] : '';
		   $divisi_id = isset($_POST['divisi_id_edit']) ? $_POST['divisi_id_edit'] : '';
		   $status_id = isset($_POST['status_id_edit']) ? $_POST['status_id_edit'] : '';
		   $info = isset($_POST['info']) ? $_POST['info'] : '';
		   $card_id = isset($_POST['card_id_edit']) ? $_POST['card_id_edit'] : '';
		}
		
		$photo = isset($_FILES['file']) ? $_FILES['file'] : '';
	     
		$user_id = $this->session->userdata('user_id');
		
		//------ Untuk proses Upload photo ------------
		  if($_POST['info'] =='Yes'){
			    $file=$_FILES['file'];
			    $file_name = $file['name'];
				$file_name = str_replace(" ", "_", $file_name);
			    $file_temp=$file['tmp_name'];
				$nama_karyawan = str_replace(" ", "_", $nama_karyawan);
				$lok='./assets/img/id_card/'.$nama_karyawan.'/';
				
				$dir=false;
				if(!is_dir($lok)){
			       $dir=mkdir("./assets/img/id_card/".$nama_karyawan,0777,true);
				}
				$namaFile=$nama_karyawan.'_'.date('His').'_'.$file_name;
				
                if ($dir) {
                    $location='assets/img/id_card/'.$nama_karyawan.'/'.$namaFile;
                } else {
					$location='assets/img/id_card/'.$namaFile;
                 
                }
						
			    $upload=move_uploaded_file($file_temp,$location);
			 
				if ($upload){
					$upload_photo=true;
				}else{
					$upload_photo=false;
				}
	 	 // var_dump($location.' - '.$upload);die();	
		 }else{
			 $namaFile='';
			 $location='';
		 }
		 
		//---------------------------------------------
		
		$link_photo=$location;
	 //  var_dump($card_id_edit);die();
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
	//	  var_dump($link_photo);die();
		// $karyawan_id = isset($_POST['cari_karyawan']) ? $_POST['cari_karyawan'] : '';
		//$nama_karyawan = isset($_POST['nama_karyawan']) ? $_POST['nama_karyawan'] : '';
		//$departemen_id = isset($_POST['departemen_id']) ? $_POST['departemen_id'] : '';
		//$nik = isset($_POST['nik']) ? $_POST['nik'] : '';
		//$divisi_id = isset($_POST['divisi_id']) ? $_POST['divisi_id'] : '';
		//$link_photo_karyawan = isset($_POST['link_photo_karyawan']) ? $_POST['link_photo_karyawan'] : '';
		//$info = isset($_POST['info']) ? $_POST['info'] : '';
		//$card_id = isset($_POST['card_id']) ? $_POST['card_id'] : '';
		//$status_id = isset($_POST['status_id']) ? $_POST['status_id'] : '';
		
		//---jika link photo browser kosong ambil data dari data karyawan ----------
		if ($link_photo==''){
			$link_photo= $link_photo_karyawan;
		}
		if(count($_POST) > 0){
			//--cek apakah proses edit atau add -------------
			$this->load->model('main');
					
			if($card_id_edit !=''){
				$this->rpc_service->setSP("dbo.sp_id_card_edit");
				$this->rpc_service->addField('card_id',$card_id);
								
			} else {
				$this->rpc_service->setSP("dbo.sp_id_card_add");
			}
			$this->rpc_service->addField('karyawan_id',$karyawan_id);	
			$this->rpc_service->addField('nama_karyawan',str_replace("_", " ",strtolower($nama_karyawan)));
			$this->rpc_service->addField('departemen_id',$departemen_id);
			$this->rpc_service->addField('nik',$nik);
			$this->rpc_service->addField('divisi_id',$divisi_id);
			$this->rpc_service->addField('link_photo',$link_photo);	
			$this->rpc_service->addField('status_id',$status_id);
			
			$result = $this->rpc_service->resultJSON_pop();
			
			$data = array();
			if(isset($result)){
				if(isset($result['valid'])){
					if($result['valid']){
						if(isset($result['data'])){
							$data_result = json_decode($result['data'],true);
							
							$return['valid'] = $result['valid'];
							$return['status_code'] = $result['no'];
							$return['message'] = $result['des'];
							$return['card_id'] = $data_result['card_id'];
							$return['karyawan_id'] = $data_result['karyawan_id'];
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
		//var_dump($link_photo);
		//var_dump($return['karyawan_id']);
		echo json_encode($return);
	}
}
?>