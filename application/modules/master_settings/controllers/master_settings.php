<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Master_settings extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$component['loadlayout'] = true;
		$component['view_load'] = 'master_settings';

		$dashboard_tab = array();

		// Tab Inspection Settings
		$tab_product_settings = array(
			'alias' => 'Product Settings',
			'title' => 'Product Settings',
			'icon' => 'fa fa-tools'
		);

		$tab_product_settings_content = array();
		$tab_product_settings_content[] = array('method_id' => 7811151, 'menu_name' => 'LINE SETTINGS', 'menu_icon' => 'fa fa-sliders');
		$tab_product_settings_content[] = array('method_id' => 7811156, 'menu_name' => 'MASTER OPERATOR', 'menu_icon' => 'fa fa-user');
		$tab_product_settings_content[] = array('method_id' => 7811158, 'menu_name' => 'MASTER PROSES', 'menu_icon' => 'fa fa-spinner');

		$tab_product_settings['content'] = $tab_product_settings_content;
		$dashboard_tab[] = $tab_product_settings;

		$tab_inspection_settings = array(
			'alias' => 'Inspection Settings',
			'title' => 'Inspection Settings',
			'icon' => 'fa fa-user-secret'
		);

		$tab_inspection_settings_content = array();
		$tab_inspection_settings_content[] = array('method_id' => 7811163, 'menu_name' => 'Master Defect Cause', 'menu_icon' => 'fa fa-bug');
		$tab_inspection_settings_content[] = array('method_id' => 7811168, 'menu_name' => 'Master Defect Parts', 'menu_icon' => 'fa fa-wrench');

		$tab_inspection_settings['content'] = $tab_inspection_settings_content;
		$dashboard_tab[] = $tab_inspection_settings;

		// Tab QC Settings
		$tab_qc_settings = array(
			'alias' => 'Quality Control Settings',
			'title' => 'QC Settings',
			'icon' => 'fa fa-clipboard-check'
		);

		$tab_qc_settings_content = array();
		$tab_qc_settings_content[] = array('method_id' => 7811173, 'menu_name' => 'Master Size Settings', 'menu_icon' => 'fa fa-sort-numeric-asc');
		$tab_qc_settings_content[] = array('method_id' => 7811175, 'menu_name' => 'Master Colour Settings', 'menu_icon' => 'fa fa-paint-brush');
		$tab_qc_settings_content[] = array('method_id' => 7811183, 'menu_name' => 'Operator Tasks', 'menu_icon' => 'fa fa-tasks');

		$tab_qc_settings['content'] = $tab_qc_settings_content;
		$dashboard_tab[] = $tab_qc_settings;

		// Tab Operator Action
		$tab_operator_action = array(
			'alias' => 'Operator Action',
			'title' => 'Operator Action',
			'icon' => 'fa fa-user-cog'
		);

		$tab_operator_action_content = array();
		$tab_operator_action_content[] = array('method_id' => 7811184, 'menu_name' => 'Operator Task Logs Administrator', 'menu_icon' => 'fa fa-hourglass-half');
		$tab_operator_action_content[] = array('method_id' => 78113146, 'menu_name' => 'Operator Task Logs Correction', 'menu_icon' => 'fa fa-check-square-o');
		$tab_operator_action_content[] = array('method_id' => 7811309, 'menu_name' => 'History Operator Task Logs Correction', 'menu_icon' => 'fa fa-history');
		$tab_operator_action_content[] = array('method_id' => 7811346, 'menu_name' => 'History Task Timestamps ', 'menu_icon' => 'fa fa-hourglass-o');

		$tab_operator_action['content'] = $tab_operator_action_content;
		$dashboard_tab[] = $tab_operator_action;

		$component['dashboard_tab'] = $dashboard_tab;

		$this->authentication->ajaxlayout($component);
	}
}
