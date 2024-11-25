<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Goodnet extends CI_Controller
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


    function goodnet_table()
    {
        $view = 'view_goodnet';
        $get_field = $this->ecc_library->get_field_pop($view);





        // $get_field['act']['sc'] = 'act';
        // $get_field['act']['title'] = '#';
        // $get_field['act']['bypassvalue'] = '';
        // $get_field['act']['ctype'] = 'text';
        // $get_field['act']['align'] = 'center';
        // $get_field['act']['search'] = false;
        // $get_field['act']['sortable'] = false;
        // $get_field['act']['formatter'] = 'formatOperations';
        // $get_field['act']['width'] = 300;

        return $get_field;
    }

    function index()
    {

        $this->load->model('main');
        $component['loadlayout'] = true;
        $component['view_load'] = 'goodnet/view';
        $component['view_load_form'] = 'goodnet/form';
        $component['load_js'][] = 'goodnet/view';
        $component['load_js'][] = 'goodnet/form';

        $component['page_title'] = "Master Goodnet";

        $dashboard_table = array();

        $nav_button = array();
        $nav_button[] = array('method_id' => 781096, 'title' => 'Add', 'icon' => 'fa fa-plus', 'load' => 'goodnet/function_add');
        $nav_button[] = array('method_id' => 781097, 'title' => 'Edit', 'icon' => 'fa fa-pencil', 'load' => 'goodnet/function_edit');

        $nav_button[] = array('method_id' => 781098, 'title' => 'Delete', 'icon' => 'fa fa-trash-o', 'load' => 'goodnet/function_delete');


        $field = $this->goodnet_table();


        $dashboard_table['nav_button'] = $nav_button;
        $dashboard_table['field'] = $field;


        $component['dashboard_table'] = $dashboard_table;

        $this->authentication->ajaxlayout($component);
    }

    function loaddata()
    {
        $this->authentication->plainlayout();

        $view = 'view_goodnet';
        $field = $this->goodnet_table();

        $return = array();
        $return['valid'] = false;
        $return['message'] = "Internal Server Error";

        $loaddata = $this->ecc_library->get_field_data_pop($view, $field);

        echo $loaddata;
    }


    function delete()
    {
        $this->authentication->plainlayout();
        $goodnet_id = $this->input->post('goodnet_id', true);
        $return = ['valid' => false, 'status_code' => 501, 'message' => "Internal Server Error"];

        if ($goodnet_id) {
            $this->rpc_service->setSP("dbo.sp_goodnet_delete");
            $this->rpc_service->addField('goodnet_id', $goodnet_id);
            $result = $this->rpc_service->resultJSON_pop();

            if ($result) {
                $return = [
                    'valid' => isset($result['valid']) ? $result['valid'] : false,
                    'status_code' => isset($result['no']) ? $result['no'] : 501,
                    'message' => isset($result['des']) ? $result['des'] : "Delete Success",
                ];
            }
        } else {
            $return['message'] = "Session expired";
        }
        echo json_encode($return);
    }
    function post_add_edit()
    {
        $this->authentication->plainlayout();
        $return = array();

        // Mengambil data dari form POST
        $goodnet_id = $this->input->post('goodnet_id', true);
        $nama = $this->input->post('nama', true);
        $deskripsi = $this->input->post('deskripsi', true);

        $return['valid'] = false;
        $return['status_code'] = 501;
        $return['message'] = "Internal Server Error";

        if ($goodnet_id != false || $nama != false || $deskripsi != false) {
            if ($goodnet_id == true) {
                $this->rpc_service->setSP("dbo.sp_goodnet_edit");
                $this->rpc_service->addField('goodnet_id', $goodnet_id);
                // var_dump($goodnet_id);
            } else {
                $this->rpc_service->setSP("dbo.sp_goodnet_add");
            }
            // $this->rpc_service->addField('goodnet_id', $goodnet_id);
            $this->rpc_service->addField('nama', $nama);
            $this->rpc_service->addField('deskripsi', $deskripsi);
            // var_dump($nama);
            $result = $this->rpc_service->resultJSON_pop();
            $return['valid'] = true;
            $return['message'] = "Berhasil menambahkan data";
            if (isset($result)) {
                if (isset($result['valid']) && $result['valid']) {
                    $data_result = json_decode($result['data'], true);
                    // var_dump($data_result);
                    //         $return['valid'] = $result['valid'];
                    //        $return['status_code'] = $result['no'];
                    //         $return['message'] = $result['des'];
                    // $return['nama'] = $data_result['nama'];
                    // $return['status'] = $data_result['status'];
                } else {
                    //         $return['status_code'] = $result['no'];
                    //         $return['message'] = $result['des'];
                }
            }
        } else {
            $return['valid'] = false;
            $return['message'] = "Session expired";
        }

        echo json_encode($return);
    }
}
