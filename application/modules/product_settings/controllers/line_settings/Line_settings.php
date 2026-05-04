<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Line_settings extends CI_Controller
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
        $view = 'view_list_pilih_group';
        $get_field = $this->ecc_library->get_field_pop($view);
        $get_field['r1']['hidden'] = true;
        $get_field['r1']['title'] = 'Pilih ID';
        $get_field['r1']['width'] = '100';

        $get_field['r2']['hidden'] = false;
        $get_field['r2']['title'] = 'Kode Id';
        $get_field['r2']['width'] = '100';

        $get_field['r3']['hidden'] = false;
        $get_field['r3']['title'] = 'Uraian';
        $get_field['r3']['width'] = '100';

        // $get_field['act']['sc'] = 'act';
        // $get_field['act']['title'] = 'action';
        // $get_field['act']['bypassvalue'] = '';
        // $get_field['act']['ctype'] = 'text';
        // $get_field['act']['align'] = 'center';
        // $get_field['act']['search'] = false;
        // $get_field['act']['sortable'] = false;
        // $get_field['act']['formatter'] = 'formatOperationsMasterLine';
        // $get_field['act']['width'] = 150;




        return $get_field;
    }



    function index()
    {

        $this->load->model('main');
        $component['loadlayout'] = true;
        $component['view_load'] = 'line_settings/view';
        $component['view_load_form'] = 'line_settings/form';
        $component['load_js'][] = 'line_settings/view';
        $component['load_js'][] = 'line_settings/form';

        $component['page_title'] = "Master Line Settings";

        $dashboard_table = array();

        $nav_button = array();
        $nav_button[] = array('method_id' => 7811152, 'title' => 'Add', 'icon' => 'fa fa-plus', 'load' => 'line_settings/function_add');
        $nav_button[] = array('method_id' => 7811153, 'title' => 'Edit', 'icon' => 'fa fa-pencil', 'load' => 'line_settings/function_edit');

        $nav_button[] = array('method_id' => 7811154, 'title' => 'Delete', 'icon' => 'fa fa-trash-o', 'load' => 'line_settings/function_delete');

        $field = $this->view_table();


        $dashboard_table['nav_button'] = $nav_button;
        $dashboard_table['field'] = $field;
        $dashboard_table['field_loaddata'] = 'loaddata';


        $component['dashboard_table'] = $dashboard_table;

        $this->authentication->ajaxlayout($component);
    }

    function loaddata()
    {


        $this->authentication->plainlayout();


        $methodid = isset($_REQUEST['methodid']) ?
            (is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid'] : -1) : -1;

        $view = 'view_list_pilih_group';
        $field = $this->view_table();

        $return = array();
        $return['valid'] = false;
        $return['message'] = "Internal Server Error";

        $extra_param = array();


        $extra_param['methodid'] = $methodid;

        $load_detail = $this->ecc_library->get_field_data_pop($view, $field, $extra_param);

        echo $load_detail;
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
                $this->rpc_service->setSP("dbo.sp_master_line_delete");
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

        $master_line_id = $this->input->post('master_line_id', true);
        $line_id = $this->input->post('line_id', true);
        $shift = $this->input->post('shift', true);


        if (empty($line_id)) {
            $return['valid'] = false;
            $return['message'] = "line_id is required";
            echo json_encode($return);
            return;
        }

        if ($master_line_id == true) {
            $this->rpc_service->setSP("dbo.sp_master_line_edit");
            $this->rpc_service->addField('master_line_id', $master_line_id);
        } else {
            $this->rpc_service->setSP("dbo.sp_master_line_add");
        }

        $this->rpc_service->addField('line_id', $line_id);

        -$this->rpc_service->addField('shift', $shift);


        $result = $this->rpc_service->resultJSON_pop();

        if (isset($result) && is_array($result) && isset($result['valid']) && $result['valid']) {
            $data_result = json_decode($result['data'], true);
            $return['master_line_id'] = $data_result['master_line_id'];
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
