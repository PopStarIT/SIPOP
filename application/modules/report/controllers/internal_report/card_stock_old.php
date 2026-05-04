<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Card_stock extends CI_Controller
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
        $view = 'view_master_task_assignment';
        $get_field = $this->ecc_library->get_field_pop($view);

        return $get_field;
    }

    function loaddata()
    {
        $this->authentication->plainlayout();

        $methodid = isset($_REQUEST['methodid']) ?
            (is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid'] : -1) : -1;

        $view = 'view_master_task_assignment';
        $field = $this->view_table();

        $return = array();
        $return['valid'] = false;
        $return['message'] = "Internal Server Error";

        $extra_param = array();
        $extra_param['methodid'] = $methodid;

        $loaddata = $this->ecc_library->get_field_data_pop($view, $field, $extra_param);

        echo $loaddata;
    }

    function index()
    {
        $this->load->model('main');

        $component['loadlayout'] = true;
        $component['view_load'] = 'internal_report/card_stock/view';
        $component['view_load_form'] = 'internal_report/card_stock/form';
        $component['load_js'][] = 'internal_report/card_stock/view';
        $component['load_js'][] = 'internal_report/card_stock/form';
        $component['page_title'] = "Card Stock Report";

        $dashboard_table = array();

        $nav_button = array();
        $nav_button = array();
        $nav_button[] = array('method_id' => 7811333, 'title' => 'Add', 'icon' => 'fa fa-plus', 'load' => 'internal_report/card_stock/function_add');
        $nav_button[] = array('method_id' => 7811334, 'title' => 'Edit', 'icon' => 'fa fa-pencil', 'load' => 'internal_report/card_stock/function_edit');

        $nav_button[] = array('method_id' => 7811335, 'title' => 'Delete', 'icon' => 'fa fa-trash-o', 'load' => 'internal_report/card_stock/function_delete');


        $field = $this->view_table();




        $dashboard_table['nav_button'] = $nav_button;

        $dashboard_table['field'] = $field;
        $dashboard_table['field_loaddata'] = 'loaddata';


        $component['dashboard_table'] = $dashboard_table;

        $this->authentication->ajaxlayout($component);
    }

    function post_add_edit()
    {
        $this->authentication->plainlayout();
        $return = array('valid' => false, 'status_code' => 501, 'message' => "Internal Server Error");

        $id = $this->input->post('id', true);
        $defect_parts = $this->input->post('defect_parts', true);
        $status = $this->input->post('status', true);

        if (empty($defect_parts)) {
            $return['valid'] = false;
            $return['message'] = "defect_parts is required";
            echo json_encode($return);
            return;
        }

        if ($id == true) {
            $this->rpc_service->setSP("dbo.sp_defect_parts_edit");
            $this->rpc_service->addField('id', $id);
        } else {
            $this->rpc_service->setSP("dbo.sp_defect_parts_add");
        }

        $this->rpc_service->addField('defect_parts', $defect_parts);
        $this->rpc_service->addField('status', $status);

        $result = $this->rpc_service->resultJSON_pop();

        if (isset($result) && is_array($result) && isset($result['valid']) && $result['valid']) {
            $data_result = json_decode($result['data'], true);
            $return['id'] = $data_result['id'];
            $return['valid'] = $result['valid'];
            $return['status_code'] = $result['no'];
            $return['message'] = $result['des'];
        } else {

            $return['valid'] = false;
            $return['status_code'] = isset($result['no']) ? $result['no'] : 500;
            $return['message'] = isset($result['des']) ? $result['des'] : "Gagal menyimpan data";
        }

        echo json_encode($return);
    }
}
