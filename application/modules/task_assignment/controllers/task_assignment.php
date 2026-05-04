<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Task_assignment extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$component['loadlayout'] = true;
		$component['view_load'] = 'task_assignment';

		$dashboard_tab = array();

		$tab_purchase = array('alias' => 'Task Assignment', 'title' => 'Task Assignment', 'icon' => 'fa fa-building');


		$tab_purchase_content = array();


		$tab_purchase_content[] = array('method_id' => 7811183, 'menu_name' => 'Operator Tasks', 'menu_icon' => 'fa fa-tasks');
		$tab_purchase_content[] = array('method_id' => 7811184, 'menu_name' => 'Operator Task Logs', 'menu_icon' => 'fa fa-hourglass-half');

		$tab_purchase['content'] = $tab_purchase_content;



		$dashboard_tab[] = $tab_purchase;


		$component['dashboard_tab'] = $dashboard_tab;


		$this->authentication->ajaxlayout($component);
	}
}
