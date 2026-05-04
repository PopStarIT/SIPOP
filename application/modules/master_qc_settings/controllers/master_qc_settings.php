<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Master_qc_settings extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$component['loadlayout'] = true;
		$component['view_load'] = 'master_qc_settings';

		$dashboard_tab = array();

		$tab_purchase = array('alias' => 'Master QC Settings', 'title' => 'Master QC Settings', 'icon' => 'fa fa-building');


		$tab_purchase_content = array();


		$tab_purchase_content[] = array('method_id' => 7811173, 'menu_name' => 'Master Size Settings', 'menu_icon' => 'fa fa-sort-numeric-asc');
		$tab_purchase_content[] = array('method_id' => 7811175, 'menu_name' => 'Master Colour Settings', 'menu_icon' => 'fa fa-paint-brush');

		$tab_purchase['content'] = $tab_purchase_content;



		$dashboard_tab[] = $tab_purchase;


		$component['dashboard_tab'] = $dashboard_tab;


		$this->authentication->ajaxlayout($component);
	}
}
