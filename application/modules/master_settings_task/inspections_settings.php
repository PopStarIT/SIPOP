<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Inspections_settings extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$component['loadlayout'] = true;
		$component['view_load'] = 'product_settings';

		$dashboard_tab = array();

		$tab_purchase = array('alias' => 'Product Settings', 'title' => 'Product Settings', 'icon' => 'fa fa-building');


		$tab_purchase_content = array();

		$tab_purchase_content[] = array('method_id' => 7811163, 'menu_name' => 'Master Defect Cause', 'menu_icon' => 'fa fa-bug');
		$tab_purchase_content[] = array('method_id' => 7811168, 'menu_name' => 'Master Defect Parts', 'menu_icon' => 'fa fa-outdent');


		$tab_purchase['content'] = $tab_purchase_content;



		$dashboard_tab[] = $tab_purchase;


		$component['dashboard_tab'] = $dashboard_tab;


		$this->authentication->ajaxlayout($component);
	}
}
