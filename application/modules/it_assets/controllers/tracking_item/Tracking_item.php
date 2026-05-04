<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Tracking_item extends CI_Controller
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

    // function view_table()
    // {
    //     $view = 'view_histori_detail_mst_item_base';
    //     $get_field = $this->ecc_library->get_field_pop($view);


    //     return $get_field;
    // }

    function view_table()
    {
        $view = 'view_histori_detail_mst_item_base';
        $get_field = $this->ecc_library->get_field_pop($view);

        $get_field['r1']['hidden'] = true;
        $get_field['r1']['title'] = 'ID';
        $get_field['r1']['width'] = '200';

        $get_field['r2']['hidden'] = true;
        $get_field['r2']['title'] = 'TANGGAL KELUAR';
        $get_field['r2']['width'] = '200';

        $get_field['r3']['hidden'] = true;
        $get_field['r3']['title'] = 'LOKASI';
        $get_field['r3']['width'] = '200';

        $get_field['r4']['hidden'] = true;
        $get_field['r4']['title'] = 'DETAIL ITEM BASE ID';
        $get_field['r4']['width'] = '200';

        $get_field['r5']['hidden'] = false;
        $get_field['r5']['title'] = 'DAMAGE STATUS';
        $get_field['r5']['width'] = '200';

        $get_field['r6']['hidden'] = false;
        $get_field['r6']['title'] = 'ACTION';
        $get_field['r6']['width'] = '200';

        $get_field['r7']['hidden'] = true;
        $get_field['r7']['title'] = 'ITEM BASE ID';
        $get_field['r7']['width'] = '200';

        $get_field['r8']['hidden'] = false;
        $get_field['r8']['title'] = 'SERIAL NUMBER';
        $get_field['r8']['width'] = '200';

        $get_field['r9']['hidden'] = true;
        $get_field['r9']['title'] = 'INVOICE ID';
        $get_field['r9']['width'] = '200';


        return $get_field;
    }



    function index()
    {

        $this->load->model('main');
        $component['loadlayout'] = true;
        $component['view_load'] = 'tracking/view';
        $component['view_load_form'] = 'tracking/form';
        $component['load_js'][] = 'tracking/view';
        $component['load_js'][] = 'tracking/form';

        $component['page_title'] = "Master It Tracking";

        $dashboard_table = array();

        $nav_button = array();


        $field = $this->view_table();


        $dashboard_table['nav_button'] = $nav_button;
        $dashboard_table['field'] = $field;

        $component['dashboard_table'] = $dashboard_table;

        $this->authentication->ajaxlayout($component);
    }

    function loaddata()
    {
        $this->authentication->plainlayout();

        $view = 'view_histori_detail_mst_item_base';
        $field = $this->view_table();

        $return = array();
        $return['valid'] = false;
        $return['message'] = "Internal Server Error";

        $loaddata = $this->ecc_library->get_field_data_pop($view, $field);

        echo $loaddata;
    }
}
