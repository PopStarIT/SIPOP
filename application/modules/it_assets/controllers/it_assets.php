<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class It_assets extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$component['loadlayout'] = true;
		$component['view_load'] = 'it_assets';

		$dashboard_tab = array();

		$tab_purchase = array('alias' => 'Item', 'title' => 'Item', 'icon' => 'fa fa-building');


		$tab_purchase_content = array();
		$tab_purchase_content[] = array('method_id' => 7811124, 'menu_name' => 'DATA INVOICE', 'menu_icon' => 'fa fa-file-text-o');
		$tab_purchase_content[] = array('method_id' => 7811102, 'menu_name' => 'ITEM', 'menu_icon' => 'fa fa-hdd-o');
		$tab_purchase_content[] = array('method_id' => 7811111, 'menu_name' => 'ID ASSETS', 'menu_icon' => 'fa fa-tags');
		$tab_purchase_content[] = array('method_id' => 7811115, 'menu_name' => 'TRACK', 'menu_icon' => 'fa fa-history');

		$tab_purchase['content'] = $tab_purchase_content;



		$dashboard_tab[] = $tab_purchase;


		$component['dashboard_tab'] = $dashboard_tab;


		$this->authentication->ajaxlayout($component);
	}
}
