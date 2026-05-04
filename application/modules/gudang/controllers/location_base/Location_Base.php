<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Location_Base extends CI_Controller
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


    function location_base_table()
    {
        $view = 'view_location_base';
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
        $component['view_load'] = 'location_base/view';
        $component['view_load_form'] = 'location_base/form';
        $component['load_js'][] = 'location_base/view';
        $component['load_js'][] = 'location_base/form';

        $component['page_title'] = "Location Base";

        $dashboard_table = array();

        $nav_button = array();


        $field_base = $this->location_base_table();


        $dashboard_table['nav_button'] = $nav_button;

        $dashboard_table['field_loaddata'] = 'loaddata';
        $dashboard_table['field_base'] = $field_base;
        $dashboard_table['field_base_loaddata'] = 'loaddata_base';

        $component['dashboard_table'] = $dashboard_table;

        $this->authentication->ajaxlayout($component);
    }


    function loaddata_base()
    {
        $this->authentication->plainlayout();
        //$work_order_request_id = isset($_REQUEST['work_order_request_id']) ? is_numeric($_REQUEST['work_order_request_id']) ? $_REQUEST['work_order_request_id']  : -1 : -1;
        $location_id = isset($_REQUEST['location_id']) ? is_numeric($_REQUEST['location_id']) ? $_REQUEST['location_id']  : -1 : -1;

        $methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;

        $view = 'view_location_base';
        $field = $this->location_base_table();

        $return = array();
        $return['valid'] = false;
        $return['message'] = "Internal Server Error";

        $extra_param = array();

        $extra_param['methodid'] = $methodid;

        $loaddata = $this->ecc_library->get_field_data_pop($view, $field, $extra_param);

        echo $loaddata;
    }
    function post_add_edit_base()
    {
        $this->authentication->plainlayout();
        $parameter = array();
        $return = array();


        $location_base_id   = isset($_POST['location_base_id'])   ? $_POST['location_base_id']   : '';
        $location_base_code = isset($_POST['location_base_code']) ? $_POST['location_base_code'] : '';
        $location_base_name = isset($_POST['location_base_name']) ? $_POST['location_base_name'] : '';


        $user_id = $this->session->userdata('user_id');

        $result = array();
        $return['valid']       = false;
        $return['status_code'] = 501;
        $return['message']     = "Internal Server Error";

        if (count($_POST) > 0) {
            if ($location_base_id) {
                // ✅ MODE EDIT
                $this->rpc_service->setSP("dbo.sp_item_location_edit_base");
                $this->rpc_service->addField('location_base_id',   $location_base_id);
                $this->rpc_service->addField('location_base_code', $location_base_code);
                $this->rpc_service->addField('location_base_name', $location_base_name);
            } else {
                // ✅ MODE ADD
                $this->rpc_service->setSP("dbo.sp_item_location_add_base");
                $this->rpc_service->addField('location_base_code', $location_base_code);
                $this->rpc_service->addField('location_base_name', $location_base_name);
            }

            $result = $this->rpc_service->resultJSON_pop();

            if (isset($result)) {
                if (isset($result['valid'])) {
                    if ($result['valid']) {
                        if (isset($result['data'])) {
                            $data_result = json_decode($result['data'], true);

                            // ✅ FIX: Gunakan isset() untuk cegah Undefined index

                            $return['location_base_id']   = isset($data_result['location_base_id'])   ? $data_result['location_base_id']   : null;
                            $return['location_base_code'] = isset($data_result['location_base_code']) ? $data_result['location_base_code'] : null;
                            $return['location_base_name'] = isset($data_result['location_base_name']) ? $data_result['location_base_name'] : null;

                            $return['valid']                = $result['valid'];
                            $return['status_code']          = $result['no'];
                            $return['message']              = $result['des'];
                        }
                    } else {
                        $return['status_code'] = $result['no'];
                        $return['message']     = $result['des'];
                    }
                }
            }
        } else {
            $return['valid']   = false;
            $return['message'] = "Session expired";
        }

        echo json_encode($return);
    }
    function delete_base()
    {
        $this->authentication->plainlayout();
        $parameter = array();
        $return = array();

        $location_base_id = isset($_POST['location_base_id']) ? $_POST['location_base_id'] : false;

        $user_id = $this->session->userdata('user_id');

        $result = array();
        $return['valid'] = false;
        $return['status_code'] = 501;
        $return['message'] = "Internal Server Error";
        // var_dump($location_base_id);die();
        if (count($_POST) > 0) {
            if ($location_base_id) {
                $this->rpc_service->setSP("dbo.sp_item_location_delete_base");
                $this->rpc_service->addField('location_base_id', $location_base_id);
            }

            $result = $this->rpc_service->resultJSON_pop();
            // print_r($result);

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

    function cetak_barcode_location_base()
    {
        $this->db_pop = $this->load->database('pop', TRUE);
        $id = (isset($_GET['id']) && !empty($_GET['id'])) ? $_GET['id'] : die('{"sts":"ERROR","desc":" Param Header Tidak Ditemukan"}');
        $data['id'] = $id;
        // $this->load->view('draft/warehouse/draft_barcode',$data);
        $this->load->view('draft/warehouse/draft_cetak_barcode_location_base', $data);
    }
}
