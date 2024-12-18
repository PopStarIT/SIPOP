<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pattern extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		//var_dump('gfgsgfg');die();
		$component['loadlayout'] = true;
		$component['view_load'] = 'pattern';

		$dashboard_tab = array();

		$tab_hrd = array('alias' => 'Sample', 'title' => 'Sample', 'icon' => 'fa fa-users');
		$tab_hrd_att = array('alias' => 'Report', 'title' => 'Production', 'icon' => 'fa fa-address-card');
		$tab_hrd_payrol = array('alias' => 'Payrol', 'title' => 'Payrol', 'icon' => 'fa fa-files-o');

		$tab_hrd_content = array();
		$tab_hrd_content[] = array('method_id' => 1076, 'menu_name' => 'Style Specification', 'menu_icon' => 'fa fa-user-circle-o'); //fa fa-address-book  //104
		$tab_hrd_content[] = array('method_id' => 1068, 'menu_name' => 'Other', 'menu_icon' => 'fa fa-address-card');
		$tab_hrd_content[] = array('method_id' => 781119, 'menu_name' => 'Master CheckList Pattern & Marker', 'menu_icon' => 'fa fa-bars');
		$tab_hrd_content[] = array('method_id' => 781105, 'menu_name' => 'Nama Of Style', 'menu_icon' => 'fa fa-server');
		$tab_hrd_content[] = array('method_id' => 781115, 'menu_name' => 'Marker', 'menu_icon' => 'fa fa-check');



		//$tab_purchase_content[] = array('method_id' => 106, 'menu_name' => 'Memo Purchase', 'menu_icon' => 'fa fa-users');
		//$tab_purchase_content[] = array('method_id' => 918, 'menu_name' => 'Monitoring PO', 'menu_icon' => 'fa fa-users');
		$tab_hrd['content'] = $tab_hrd_content;

		$tab_hrd_att_content = array();
		$tab_hrd_att_content[] = array('method_id' => 1062, 'menu_name' => 'attendance_dashboard', 'menu_icon' => 'fa fa-address-card');
		//$tab_hrd_att_content[] = array('method_id' => 1057, 'menu_name' => 'Dashboard', 'menu_icon' => 'fa fa-address-card');
		$tab_hrd_att['content'] = $tab_hrd_att_content;

		$tab_hrd_payrol_content = array();
		$tab_hrd_payrol_content[] = array('method_id' => 160, 'menu_name' => 'Proforma Invoice', 'menu_icon' => 'fa fa-paypal');
		$tab_hrd_payrol['content'] = $tab_hrd_payrol_content;

		$dashboard_tab[] = $tab_hrd;
		$dashboard_tab[] = $tab_hrd_att;
		$dashboard_tab[] = $tab_hrd_payrol;

		$component['dashboard_tab'] = $dashboard_tab;
		//var_dump($component);die();

		$this->authentication->ajaxlayout($component);
	}
}
