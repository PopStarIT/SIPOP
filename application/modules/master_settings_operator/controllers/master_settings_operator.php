<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Master_settings_operator extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$component['loadlayout'] = true;
		$component['view_load'] = 'master_settings_operator';

		$dashboard_tab = array();

		$tab_purchase = array('alias' => 'Product Settings', 'title' => 'Master Settings Operator', 'icon' => 'fa fa-building');



		$tab_purchase_content = array();

		$tab_purchase_content[] = array('method_id' => 7811184, 'menu_name' => 'Operator Task Logs', 'menu_icon' => 'fa fa-hourglass-half');

		$tab_purchase['content'] = $tab_purchase_content;

		$dashboard_tab[] = $tab_purchase;


		$component['dashboard_tab'] = $dashboard_tab;


		$this->authentication->ajaxlayout($component);
	}
}
