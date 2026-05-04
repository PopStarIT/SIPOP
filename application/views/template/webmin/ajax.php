<?php 
//print_r($view_load);
//var_dump($view_load);
	if(isset($view_load)){
		if(is_array($view_load)){
			//var_dump('dua');
			foreach($view_load as $dt_load){
				$this->load->view('content/'.$dt_load);
			}
		} else {
			if($view_load=='monitor/dashboard'){
				//var_dump('satu');
				//$methodid=0;
				$this->load->view('draft/preview_dashboard/dashboard',$component=0);
				//echo '<script>window.open("draft/preview_dashboard/dashboard", "_blank");</script>';
				//echo '<script>window.open("draft/preview_dashboard/dashboard", "_blank");</script>';
		
			}else{
			    $this->load->view('content/'.$view_load);
			}
		}
	}
	//var_dump($view_load);die();
?>
		
<?php $this->load->view($path_template.'/include/global/ajax_javascript'); ?>