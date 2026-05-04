<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Loader_sipop extends CI_Controller { 

	function __construct(){ 
		parent::__construct(); 
		$this->load->model('main_sipop');
	} 
	
	function index() {
		
        $return = array();
		$param = isset($_POST['param']) ? $_POST['param'] : '';
		$q = isset($_REQUEST['q']) ? htmlentities($_REQUEST['q']) : false;
		$id = isset($_REQUEST['id']) ? htmlentities($_REQUEST['id']) : false;
		$date_start = isset($_POST['date_start']) ? $_POST['date_start'] : '';
		$date_end = isset($_POST['date_end']) ? $_POST['date_end'] : '';
		
		if ($param == 'prod_transfer_lebih') {
			$return=$this->main_sipop->view_tanggal_prod_transfer_lebih($date_start);
		}
		
		if ($param == 'beda_barang_supply_transfer') {
			$return=$this->main_sipop->view_beda_kode_barang_supply_transfer($date_start);
		}
			
		
		echo json_encode($return);
	}
	
	function download_file() {
		///	get the file mime type using the file extension
					
		$saveAs=isset($_POST['saveAs'])?$_POST['saveAs']:'';  
		$filename=isset($_POST['filename'])?$_POST['filename']:'';  
	    $extension = strtolower( pathinfo( basename( $saveAs ), PATHINFO_EXTENSION ) );
		set_time_limit(0);
		 //var_dump($saveAs);
         //var_dump($extension);
		// our list of mime types
		$mime_types = array(

		'txt' => 'text/plain',
		'htm' => 'text/html',
		'html' => 'text/html',
		'php' => 'text/html',
		'css' => 'text/css',
		'js' => 'application/javascript',
		'json' => 'application/json',
		'xml' => 'application/xml',
		'swf' => 'application/x-shockwave-flash',
		'flv' => 'video/x-flv',

		// images
		'png' => 'image/png',
		'jpe' => 'image/jpeg',
		'jpeg' => 'image/jpeg',
		'jpg' => 'image/jpeg',
		'gif' => 'image/gif',
		'bmp' => 'image/bmp',
		'ico' => 'image/vnd.microsoft.icon',
		'tiff' => 'image/tiff',
		'tif' => 'image/tiff',
		'svg' => 'image/svg+xml',
		'svgz' => 'image/svg+xml',

		// archives
		'zip' => 'application/zip',
		'rar' => 'application/x-rar-compressed',
		'exe' => 'application/x-msdownload',
		'msi' => 'application/x-msdownload',
		'cab' => 'application/vnd.ms-cab-compressed',

		// audio/video
		'mp3' => 'audio/mpeg',
		'qt' => 'video/quicktime',
		'mov' => 'video/quicktime',

		// adobe
		'pdf' => 'application/pdf',
		'psd' => 'image/vnd.adobe.photoshop',
		'ai' => 'application/postscript',
		'eps' => 'application/postscript',
		'ps' => 'application/postscript',

		// ms office
		'doc' => 'application/msword',
		'rtf' => 'application/rtf',
		//'xls' => 'application/msexcel',
		'xlsx'	=>'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
		'xls' => 'application/vnd.ms-excel',
		'ppt' => 'application/vnd.ms-powerpoint',
		//'xls'	=>	array('application/vnd.ms-excel', 'application/msexcel', 'application/x-msexcel', 'application/x-ms-excel', 'application/x-excel', 'application/x-dos_ms_excel', 'application/xls', 'application/x-xls', 'application/excel', 'application/download', 'application/vnd.ms-office', 'application/msword','application/octet-stream'),
         //'xlsx'	=>	array('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/zip', 'application/vnd.ms-excel', 'application/msword', 'application/x-zip','application/octet-stream'),

		// open office
		'odt' => 'application/vnd.oasis.opendocument.text',
		'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
		);

		// Set a default mime if we can't find it
	
		if( !isset( $mime_types[$extension] ) )
		{
		$mime = 'application/octet-stream';
		}
		else
		{
		$mime = ( is_array( $mime_types[$extension] ) ) ? $mime_types[$extension][0] : $mime_types[$extension];
		}
		//	var_dump($mime);
	//	var_dump($filename);
		//$filename='application/vnd.ms-excel';
		//$filename='list1_20231031_042426_408792.xls';
		//	$filename='C:/Users/Ali/AppData/Local/Temp/list1_20231031_042426_408792.xls';
		
         //var_dump($mime_types[$extension]);
		
	   // var_dump($filename);die();
		if(file_exists($filename)) {
		
				if( strstr( $_SERVER['HTTP_USER_AGENT'], "MSIE" ) )
				{
					header("Content-Type: application/force-download");
					header( 'Content-Type: "'.$mime.'"' );
					header("Content-Disposition: attachment; filename=\"".basename($saveAs)."\";" ); 
					header( 'Expires: 0' );
					header( 'Cache-Control: must-revalidate, post-check=0, pre-check=0' );
					header( "Content-Transfer-Encoding: binary" );
					header( 'Pragma: public' );
					header( "Content-Length: ".filesize( $filename ) );
				}
				else
				{
					header( "Pragma: public" );
					header( "Expires: 0" );
					header( "Cache-Control: must-revalidate, post-check=0, pre-check=0" );
					header( "Cache-Control: private", false );
					header("Content-Type: application/force-download");
					header( "Content-Type: ".$mime, true, 200 );
					header("Content-Type: application/download");
					header( 'Content-Length: '.filesize( $filename ) );
					header("Content-Disposition: attachment; filename=\"".basename($saveAs)."\";" ); 
					header( "Content-Transfer-Encoding: binary" );
				}
		
				flush(); // this doesn't really matter.
				$fp = fopen($filename, "r");
				while (!feof($fp))
				{
					echo fread($fp, 65536);
					flush(); // this is essential for large downloads
				} 
				fclose($fp); 
				 unlink($filename);	
				exit("ok");
		}
		else {
			die('The provided file path: ' . $filename .' is not valid.');
		}
    	
	}	
}
