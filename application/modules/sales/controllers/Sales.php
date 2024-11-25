<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Sales extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $component['loadlayout'] = true;
        $component['view_load'] = 'sales';

        $dashboard_tab = array();

        $tab_sales = array('alias' => 'sales', 'title' => 'Sales', 'icon' => 'fa fa-shopping-basket');
        $tab_sales_invoice = array('alias' => 'sales_performa', 'title' => 'Proforma Invoice', 'icon' => 'fa fa-shopping-basket');

        $tab_sales_content = array();
        $tab_sales_content[] = array('method_id' => 129, 'menu_name' => 'Sales Order', 'menu_icon' => 'fa fa-cog');
        $tab_sales_content[] = array('method_id' => 130, 'menu_name' => 'Memo Sales', 'menu_icon' => 'fa fa-cog');
        $tab_sales_content[] = array('method_id' => 781087, 'menu_name' => 'Master Goodnet', 'menu_icon' => 'fa fa-cog');
        $tab_sales['content'] = $tab_sales_content;

        $tab_sales_invoice_content = array();
        $tab_sales_invoice_content[] = array('method_id' => 247, 'menu_name' => 'Proforma Invoice', 'menu_icon' => 'fa fa-external-link');

        $tab_sales_invoice['content'] = $tab_sales_invoice_content;

        $dashboard_tab[] = $tab_sales;
        $dashboard_tab[] = $tab_sales_invoice;

        $component['dashboard_tab'] = $dashboard_tab;


        $this->authentication->ajaxlayout($component);
    }
}
