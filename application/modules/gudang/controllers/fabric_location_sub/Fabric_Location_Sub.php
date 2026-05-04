<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Fabric_Location_Sub extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->data_request = $_REQUEST;

        $module = $this->router->module;
        $directory = $this->router->directory;
        $class = $this->router->class;
        $method = $this->router->method;
        $directory = trim(str_replace('../modules/' . $module, '', str_replace('/controllers/', '', $directory)), '/');

        $this->module = $module;
        if (trim($directory) != '') {
            $this->directory = $directory;
        } else {
            $this->directory = '0';
            $this->directory2 = '';
        }
        $this->class = $class;
        $this->method = $method;
    }


    function table()
    {
        $view = 'view_stock_move_sipop_sub';
        $get_field = $this->ecc_library->get_field_pop($view);
        $get_field['r1']['hidden'] = true;

        $get_field['r4']['hidden'] = true;
        $get_field['r5']['hidden'] = true;
        $get_field['r6']['hidden'] = true;
        $get_field['r7']['hidden'] = true;

        return $get_field;
    }

    function index()
    {
        $this->load->model('main');
        $component['loadlayout'] = true;
        $component['view_load'] = 'fabric_location_sub/view';
        $component['view_load_form'] = 'fabric_location_sub/form';
        $component['load_js'][] = 'fabric_location_sub/view';
        $component['load_js'][] = 'fabric_location_sub/form';

        $component['page_title'] = "Fabric Location Sub";

        $dashboard_table = array();

        $nav_button = array();


        $field = $this->table();


        $dashboard_table['nav_button'] = $nav_button;

        $dashboard_table['field'] = $field;
        $dashboard_table['field_loaddata'] = 'loaddata';


        $component['dashboard_table'] = $dashboard_table;

        $this->authentication->ajaxlayout($component);
    }


    function loaddata()
    {
        $this->authentication->plainlayout();
        //$work_order_request_id = isset($_REQUEST['work_order_request_id']) ? is_numeric($_REQUEST['work_order_request_id']) ? $_REQUEST['work_order_request_id']  : -1 : -1;
        $location_id = isset($_REQUEST['location_id']) ? is_numeric($_REQUEST['location_id']) ? $_REQUEST['location_id']  : -1 : -1;

        $methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;

        $view = 'view_stock_move_sipop_sub';
        $field = $this->table();

        $return = array();
        $return['valid'] = false;
        $return['message'] = "Internal Server Error";

        $extra_param = array();

        $extra_param['methodid'] = $methodid;

        $loaddata = $this->ecc_library->get_field_data_pop($view, $field, $extra_param);

        echo $loaddata;
    }
}
