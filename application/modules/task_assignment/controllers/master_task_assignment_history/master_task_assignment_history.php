<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Master_task_assignment_history extends CI_Controller
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
        $view = 'view_task_assignment_history';

        $get_field = $this->ecc_library->get_field_pop($view);
        $get_field['r1']['hidden'] = true;
        return $get_field;
    }

    function view_delete_table()
    {
        $view = 'view_task_assignment_history_delete';

        $get_field = $this->ecc_library->get_field_pop($view);
        $get_field['r1']['hidden'] = true;
        return $get_field;
    }

    function view_table_reject()
    {
        $view = 'view_task_assignment_history_reject';

        $get_field = $this->ecc_library->get_field_pop($view);
        $get_field['r1']['hidden'] = true;
        return $get_field;
    }
    function view_table_defect()
    {
        $view = 'view_task_assignment_history_defect';

        $get_field = $this->ecc_library->get_field_pop($view);
        $get_field['r1']['hidden'] = true;
        return $get_field;
    }


    function index()
    {

        $this->load->model('main');
        $component['loadlayout'] = true;
        $component['view_load'] = 'master_task_assignment_history/view';
        $component['view_load_form'] = 'master_task_assignment_history/form';
        $component['load_js'][] = 'master_task_assignment_history/view';
        $component['load_js'][] = 'master_task_assignment_history/form';

        $component['page_title'] = "Master Task Assignment History";

        $dashboard_table = array();

        $nav_button = array();


        $field = $this->view_table();
        $field_delete = $this->view_delete_table();
        $field_reject = $this->view_table_reject();
        $field_defect = $this->view_table_defect();

        $dashboard_table['field'] = $field;
        $dashboard_table['field_delete'] = $field_delete;
        $dashboard_table['field_reject'] = $field_reject;
        $dashboard_table['field_defect'] = $field_defect;

        $dashboard_table['field_loaddata'] = 'loaddata';
        $dashboard_table['field_loaddata_delete'] = 'loaddata_delete';
        $dashboard_table['field_loaddata_reject'] = 'loaddata_reject';
        $dashboard_table['field_loaddata_defect'] = 'loaddata_defect';
        $dashboard_table['nav_button'] = $nav_button;

        $component['dashboard_table'] = $dashboard_table;

        $this->authentication->ajaxlayout($component);
    }

    function loaddata()
    {
        $this->authentication->plainlayout();

        $id = isset($_REQUEST['id']) ?
            (is_numeric($_REQUEST['id']) ? $_REQUEST['id'] : -1) : -1;
        $methodid = isset($_REQUEST['methodid']) ?
            (is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid'] : -1) : -1;

        $view = 'view_task_assignment_history';
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




    function loaddata_delete()
    {
        $this->authentication->plainlayout();

        $id = isset($_REQUEST['id']) ?
            (is_numeric($_REQUEST['id']) ? $_REQUEST['id'] : -1) : -1;
        $methodid = isset($_REQUEST['methodid']) ?
            (is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid'] : -1) : -1;

        $view = 'view_task_assignment_history_delete';
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
    function loaddata_reject()
    {
        $this->authentication->plainlayout();

        $id = isset($_REQUEST['id']) ?
            (is_numeric($_REQUEST['id']) ? $_REQUEST['id'] : -1) : -1;
        $methodid = isset($_REQUEST['methodid']) ?
            (is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid'] : -1) : -1;

        $view = 'view_task_assignment_history_reject';
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
    function loaddata_defect()
    {
        $this->authentication->plainlayout();

        $id = isset($_REQUEST['id']) ?
            (is_numeric($_REQUEST['id']) ? $_REQUEST['id'] : -1) : -1;
        $methodid = isset($_REQUEST['methodid']) ?
            (is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid'] : -1) : -1;

        $view = 'view_task_assignment_history_defect';
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
