<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Master_task_assignment_time extends CI_Controller
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

    function view_table()
    {
        $view = 'view_task_assignment_rft_time';
        $get_field = $this->ecc_library->get_field_pop($view);


        return $get_field;
    }
    function view_defect()
    {
        $view = 'view_task_assignment_defect_time';
        $get_field = $this->ecc_library->get_field_pop($view);


        return $get_field;
    }
    function view_reject()
    {
        $view = 'view_task_assignment_reject_time';
        $get_field = $this->ecc_library->get_field_pop($view);


        return $get_field;
    }



    function index()
    {

        $this->load->model('main');
        $component['loadlayout'] = true;
        $component['view_load'] = 'master_task_assignment_time/view';
        $component['view_load_form'] = 'master_task_assignment_time/form';
        $component['load_js'][] = 'master_task_assignment_time/view';
        $component['load_js'][] = 'master_task_assignment_time/form';

        $component['page_title'] = "Master Task Assignment";

        $dashboard_table = array();

        $nav_button = array();


        $field = $this->view_table();
        $field_defect = $this->view_defect();
        $field_reject = $this->view_reject();



        $dashboard_table['nav_button'] = $nav_button;
        $dashboard_table['field'] = $field;
        $dashboard_table['field_defect'] = $field_defect;
        $dashboard_table['field_reject'] = $field_reject;

        $dashboard_table['field_loaddata'] = 'loaddata';
        $dashboard_table['field_loaddata_reject'] = 'loaddata_reject_time';
        $dashboard_table['field_loaddata_defect'] = 'loaddata_defect_time';


        $component['dashboard_table'] = $dashboard_table;

        $this->authentication->ajaxlayout($component);
    }

    function loaddata()
    {
        $this->authentication->plainlayout();

        $view = 'view_task_assignment_rft_time';
        $field = $this->view_table();

        $return = array();
        $return['valid'] = false;
        $return['message'] = "Internal Server Error";

        $loaddata = $this->ecc_library->get_field_data_pop($view, $field);

        echo $loaddata;
    }
    function loaddata_defect_time()
    {
        $this->authentication->plainlayout();

        $id = isset($_REQUEST['id']) ?
            (is_numeric($_REQUEST['id']) ? $_REQUEST['id'] : -1) : -1;
        $methodid = isset($_REQUEST['methodid']) ?
            (is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid'] : -1) : -1;

        $view = 'view_task_assignment_defect_time';
        $field = $this->view_table();

        $return = array();
        $return['valid'] = false;
        $return['message'] = "Internal Server Error";

        $extra_param = array();
        if ($id != -1) {
            $extra_param['where']['0']['field'] = 'r1';
            $extra_param['where']['0']['data'] = $id;
        }
        $extra_param['methodid'] = $methodid;

        $loaddata = $this->ecc_library->get_field_data_pop($view, $field, $extra_param);
        echo $loaddata;
    }
    function loaddata_reject_time()
    {
        $this->authentication->plainlayout();

        $id = isset($_REQUEST['id']) ?
            (is_numeric($_REQUEST['id']) ? $_REQUEST['id'] : -1) : -1;
        $methodid = isset($_REQUEST['methodid']) ?
            (is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid'] : -1) : -1;

        $view = 'view_task_assignment_reject_time';
        $field = $this->view_table();

        $return = array();
        $return['valid'] = false;
        $return['message'] = "Internal Server Error";

        $extra_param = array();
        if ($id != -1) {
            $extra_param['where']['0']['field'] = 'r1';
            $extra_param['where']['0']['data'] = $id;
        }
        $extra_param['methodid'] = $methodid;

        $loaddata = $this->ecc_library->get_field_data_pop($view, $field, $extra_param);
        echo $loaddata;
    }
}
