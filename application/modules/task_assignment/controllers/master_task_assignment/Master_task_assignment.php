<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Master_task_assignment extends CI_Controller
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
        $get_field['r1']['hidden'] = true;
        $get_field['r2']['hidden'] = true;
        $get_field['r3']['title'] = 'work order plan no';
        $get_field['r4']['hidden'] = true;
        $get_field['r5']['hidden'] = true;
        $get_field['r9']['hidden'] = true;





        return $get_field;
    }



    function index()
    {

        $this->load->model('main');
        $component['loadlayout'] = true;
        $component['view_load'] = 'master_task_assignment/view';
        $component['view_load_form'] = 'master_task_assignment/form';
        $component['load_js'][] = 'master_task_assignment/view';
        $component['load_js'][] = 'master_task_assignment/form';

        $component['page_title'] = "Master Task Assignment";

        $dashboard_table = array();

        $nav_button = array();
        $nav_button[] = array('method_id' => 7811170, 'title' => 'Add', 'icon' => 'fa fa-plus', 'load' => 'master_task_assignment/function_add');
        $nav_button[] = array('method_id' => 7811171, 'title' => 'Edit', 'icon' => 'fa fa-pencil', 'load' => 'master_task_assignment/function_edit');
        $nav_button[] = array('method_id' => 7811172, 'title' => 'Delete', 'icon' => 'fa fa-trash-o', 'load' => 'master_task_assignment/function_delete');

        $field = $this->view_table();


        $dashboard_table['nav_button'] = $nav_button;
        $dashboard_table['field'] = $field;


        $component['dashboard_table'] = $dashboard_table;

        $this->authentication->ajaxlayout($component);
    }

    function loaddata()
    {
        $this->authentication->plainlayout();

        $view = 'view_master_task_assignment';
        $field = $this->view_table();

        $return = array();
        $return['valid'] = false;
        $return['message'] = "Internal Server Error";

        $loaddata = $this->ecc_library->get_field_data_pop($view, $field);

        echo $loaddata;
    }



    function delete()
    {
        $this->authentication->plainlayout();
        $parameter = array();
        $return = array();

        $result = array();
        $return['valid'] = false;
        $return['status_code'] = 501;
        $return['message'] = "Internal Server Error";

        $id = isset($_POST['id']) ? $_POST['id'] : '';
        $user_id = $this->session->userdata('user_id');

        if (count($_POST) > 0) {
            if ($id) {
                $this->rpc_service->setSP("dbo.sp_master_task_assignment_delete");
                $this->rpc_service->addField('id', $id);
            }
            $result = $this->rpc_service->resultJSON_pop();

            $data = array();
            if (isset($result)) {
                if (isset($result['valid'])) {
                    if ($result['valid']) {
                        if (isset($result['data'])) {
                            $return['valid'] = $result['valid'];
                            $return['status_code'] = $result['no'];
                            $return['message'] = $result['des'];
                        }
                    } else {
                        $return['status_code'] = $result['no'];
                        $return['message'] = $result['des'];
                    }
                }
            }
        } else {
            $return['valid'] = false;
            $return['message'] = "Session expired";
        }

        echo json_encode($return);
    }


    function post_add_edit()
    {
        $this->authentication->plainlayout();
        $return = array('valid' => false, 'style_id' => 501, 'message' => "Internal Server Error");

        $id = $this->input->post('id', true);

        $style_id = $this->input->post('style_id', true);
        $line_id = $this->input->post('line_id', true);
        $status = $this->input->post('status', true);
        $target_output = $this->input->post('target_output', true);
        $order_qty = $this->input->post('order_qty', true);
        $created_date = $this->input->post('created_date', true);
        $status_assign = $this->input->post('status_assign', true);



        if (empty($style_id)) {
            $return['valid'] = false;
            $return['message'] = "style_id is required";
            echo json_encode($return);
            return;
        }

        if ($id == true) {
            $this->rpc_service->setSP("dbo.sp_master_task_assignment_edit");
            $this->rpc_service->addField('id', $id);
        } else {
            $this->rpc_service->setSP("dbo.sp_master_task_assignment_add");
        }

        $this->rpc_service->addField('style_id', $style_id);
        $this->rpc_service->addField('line_id', $line_id);
        $this->rpc_service->addField('status', $status);
        $this->rpc_service->addField('target_output', $target_output);
        $this->rpc_service->addField('order_qty', $order_qty);
        $this->rpc_service->addField('created_date', $created_date);
        $this->rpc_service->addField('status_assign', $status_assign);


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
    function post_assign()
    {
        $this->authentication->plainlayout();
        $return = array('valid' => false, 'style_id' => 501, 'message' => "Internal Server Error");

        $id = $this->input->post('id', true);

        $style_id = $this->input->post('style_id', true);
        $line_id = $this->input->post('line_id', true);
        $status = $this->input->post('status', true);
        $target_output = $this->input->post('target_output', true);
        $order_qty = $this->input->post('order_qty', true);
        $created_date = $this->input->post('created_date', true);
        $status_assign = $this->input->post('status_assign', true);



        if (empty($style_id)) {
            $return['valid'] = false;
            $return['message'] = "style_id is required";
            echo json_encode($return);
            return;
        }

        if ($id == true) {
            $this->rpc_service->setSP("dbo.sp_master_task_assignment_edit_assign");
            $this->rpc_service->addField('id', $id);
        } else {
            $this->rpc_service->setSP("dbo.sp_master_task_assignment_add");
        }

        $this->rpc_service->addField('style_id', $style_id);
        $this->rpc_service->addField('line_id', $line_id);
        $this->rpc_service->addField('status', $status);
        $this->rpc_service->addField('target_output', $target_output);
        $this->rpc_service->addField('order_qty', $order_qty);
        $this->rpc_service->addField('created_date', $created_date);
        $this->rpc_service->addField('status_assign', $status_assign);


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
