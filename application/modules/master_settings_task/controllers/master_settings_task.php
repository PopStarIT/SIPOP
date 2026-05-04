<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Master_settings_task extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$component['loadlayout'] = true;
		$component['view_load'] = 'master_settings_task';

		$dashboard_tab = array();



		// Tab Operator Action
		$tab_operator_action = array(
			'alias' => 'Operator Action',
			'title' => 'Operator Action',
			'icon' => 'fa fa-user-cog'
		);

		$tab_operator_action_content = array();
		$tab_operator_action_content[] = array('method_id' => 7811320, 'menu_name' => 'Operator Task Logs Operator', 'menu_icon' => 'fa fa-hourglass-half');


		$tab_operator_action['content'] = $tab_operator_action_content;
		$dashboard_tab[] = $tab_operator_action;

		$component['dashboard_tab'] = $dashboard_tab;

		$this->authentication->ajaxlayout($component);
	}
}
