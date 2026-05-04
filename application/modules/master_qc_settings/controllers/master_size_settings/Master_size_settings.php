<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Master_size_settings extends CI_Controller
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
        $view = 'view_list_pilih_size';
        $get_field = $this->ecc_library->get_field_pop($view);
        $get_field['r1']['hidden'] = true;
        $get_field['r1']['title'] = 'ID';
        $get_field['r1']['width'] = '100';

        $get_field['r2']['hidden'] = false;
        $get_field['r2']['title'] = 'Defect Parts';
        $get_field['r2']['width'] = '100';

        $get_field['r3']['hidden'] = false;
        $get_field['r3']['title'] = 'Defect Status';
        $get_field['r3']['width'] = '100';







        return $get_field;
    }



    function index()
    {

        $this->load->model('main');
        $component['loadlayout'] = true;
        $component['view_load'] = 'master_size_settings/view';
        $component['view_load_form'] = 'master_size_settings/form';
        $component['load_js'][] = 'master_size_settings/view';
        $component['load_js'][] = 'master_size_settings/form';

        $component['page_title'] = "Master Size Settings";

        $dashboard_table = array();

        $nav_button = array();
        $nav_button[] = array('method_id' => 7811170, 'title' => 'Add', 'icon' => 'fa fa-plus', 'load' => 'master_size_settings/function_add');
        $nav_button[] = array('method_id' => 7811171, 'title' => 'Edit', 'icon' => 'fa fa-pencil', 'load' => 'master_size_settings/function_edit');

        $nav_button[] = array('method_id' => 7811172, 'title' => 'Delete', 'icon' => 'fa fa-trash-o', 'load' => 'master_size_settings/function_delete');

        $field = $this->view_table();


        $dashboard_table['nav_button'] = $nav_button;
        $dashboard_table['field'] = $field;


        $component['dashboard_table'] = $dashboard_table;

        $this->authentication->ajaxlayout($component);
    }

    function loaddata()
    {
        $this->authentication->plainlayout();

        $view = 'view_list_pilih_size';
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
                $this->rpc_service->setSP("dbo.sp_defect_parts_delete");
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
