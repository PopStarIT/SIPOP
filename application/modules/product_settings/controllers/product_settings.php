<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Product_settings extends CI_Controller
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
		$tab_purchase_content[] = array('method_id' => 7811151, 'menu_name' => 'LINE SETTINGS', 'menu_icon' => 'fa fa-sliders');
		$tab_purchase_content[] = array('method_id' => 7811156, 'menu_name' => 'MASTER OPERATOR', 'menu_icon' => 'fa fa-user');
		$tab_purchase_content[] = array('method_id' => 7811158, 'menu_name' => 'MASTER PROSES', 'menu_icon' => 'fa fa-spinner');

		$tab_purchase['content'] = $tab_purchase_content;



		$dashboard_tab[] = $tab_purchase;


		$component['dashboard_tab'] = $dashboard_tab;


		$this->authentication->ajaxlayout($component);
	}
}
