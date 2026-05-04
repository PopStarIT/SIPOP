<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Gudang extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$component['loadlayout'] = true;
		$component['view_load'] = 'warehouse';

		$dashboard_tab = array();

		$tab_gudang = array('alias' => 'gudang', 'title' => 'Gudang ', 'icon' => 'fa fa-building');
		$tab_setting = array('alias' => 'setting', 'title' => 'Setting ', 'icon' => 'fa fa-cog');
		$tab_purchase_invoice = array('alias' => 'purchase_invoice', 'title' => 'Proforma Invoice', 'icon' => 'fa fa-shopping-basket');

		$tab_gudang_content = array();

		$tab_gudang_content[] = array('method_id' => 781124, 'menu_name' => 'Shipment', 'menu_icon' => 'fa fa-truck');
		//$tab_gudang_content[] = array('method_id' => 781145, 'menu_name' => 'Item Receive', 'menu_icon' => 'fa fa-sign-in'); // sebelumnya menggunakan yang ini
		$tab_gudang_content[] = array('method_id' => 7811444, 'menu_name' => 'Item Receive', 'menu_icon' => 'fa fa-sign-in'); //proses receive yang baru
		//$tab_gudang_content[] = array('method_id' => 7811444, 'menu_name' => 'Receiving', 'menu_icon' => 'fa fa-sign-in');

		$tab_gudang_content[] = array('method_id' => 7811374, 'menu_name' => 'Item Transfer', 'menu_icon' => 'fa fa-cog');
		$tab_gudang_content[] = array('method_id' => 7811389, 'menu_name' => 'Return Material', 'menu_icon' => 'fa fa-undo');
		$tab_gudang_content[] = array('method_id' => 78113101, 'menu_name' => 'Asset', 'menu_icon' => 'fa fa-cubes');
		//$tab_gudang_content[] = array('method_id' => 7811400, 'menu_name' => 'Subcon Out', 'menu_icon' => 'fa fa-bus');  // subcon_out_1
		$tab_gudang_content[] = array('method_id' => 78113116, 'menu_name' => 'Disposisi Material', 'menu_icon' => 'fa fa-random');
		$tab_gudang_content[] = array('method_id' => 7811400, 'menu_name' => 'Subcon Out New', 'menu_icon' => 'fa fa-truck');

		//$tab_gudang_content[] = array('method_id' => 7811444, 'menu_name' => 'Receiving', 'menu_icon' => 'fa fa-sign-in');
		$tab_gudang['content'] = $tab_gudang_content;

		$tab_setting_content = array();
		$tab_setting_content[] = array('method_id' => 7811421, 'menu_name' => 'Location', 'menu_icon' => 'fa fa-map-marker');
		$tab_setting_content[] = array('method_id' => 7811429, 'menu_name' => 'Fabric Location', 'menu_icon' => 'fa fa-cubes');
		$tab_setting_content[] = array('method_id' => 78113128, 'menu_name' => 'Fabric Location Movement', 'menu_icon' => 'fa fa-history');
		$tab_setting_content[] = array('method_id' => 78113134, 'menu_name' => 'Location Block', 'menu_icon' => 'fa fa-solid fa-cube');
		// $tab_setting_content[] = array('method_id' => 78113144, 'menu_name' => 'Fabric Location Sub', 'menu_icon' => 'fa fa-caret-square-o-down');

		$tab_setting['content'] = $tab_setting_content;

		$dashboard_tab[] = $tab_gudang;
		$dashboard_tab[] = $tab_setting;

		$component['dashboard_tab'] = $dashboard_tab;


		$this->authentication->ajaxlayout($component);
	}
}
