<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
		$tab_accounting_report = array('alias' => 'report_accounting', 'title' => 'Accounting Report', 'icon' => 'fa fa-book');
		$tab_accounting_report_content = array();
		$tab_accounting_report_content[] = array('method_id' => 1046, 'menu_name' => 'Barang Jadi', 'menu_icon' => 'fa fa-file-text-o');	
		$tab_accounting_report_content[] = array('method_id' => 667, 'menu_name' => 'Barang WIP', 'menu_icon' => 'fa fa-file-text-o');	
		$tab_accounting_report['content'] = $tab_accounting_report_content;
		$dashboard_tab[] = $tab_accounting_report;