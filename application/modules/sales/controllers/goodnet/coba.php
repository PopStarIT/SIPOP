<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Stock_opname extends CI_Controller
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

    function stock_opname_table()
    {
        $view = 'view_stock_opname';
        $get_field = $this->ecc_library->get_field($view);

        return $get_field;
    }

    function index()
    {
        $this->load->model('main');
        $component['loadlayout'] = true;
        $component['view_load'] = 'general/stock_opname/view';
        $component['view_load_form'] = 'general/stock_opname/form';
        $component['load_js'][] = 'general/stock_opname/view';
        $component['load_js'][] = 'general/stock_opname/form';

        $component['page_title'] = "Stock Opname";

        $dashboard_table = array();

        $nav_button = array();
        $nav_button[] = array('method_id' => 854, 'title' => 'Add', 'icon' => 'fa fa-plus', 'load' => 'general/stock_opname/function_add');
        $nav_button[] = array('method_id' => 855, 'title' => 'Edit', 'icon' => 'fa fa-pencil', 'load' => 'general/stock_opname/function_edit');
        $nav_button[] = array('method_id' => 856, 'title' => 'Approve', 'icon' => 'fa fa-check', 'load' => 'general/stock_opname/function_approve');
        $nav_button[] = array('method_id' => 858, 'title' => 'Delete', 'icon' => 'fa fa-trash-o', 'load' => 'general/stock_opname/function_delete');
        $nav_button[] = array('method_id' => 861, 'title' => 'Cancel Approve', 'icon' => 'fa fa-check', 'load' => 'general/stock_opname/function_cancel_approve');

        $field = $this->stock_opname_table();

        $dashboard_table['nav_button'] = $nav_button;
        $dashboard_table['field'] = $field;

        $component['dashboard_table'] = $dashboard_table;

        $this->authentication->ajaxlayout($component);
    }

    function loaddata()
    {
        $this->authentication->plainlayout();

        $view = 'view_stock_opname';
        $field = $this->stock_opname_table();

        $return = array();
        $return['valid'] = false;
        $return['message'] = "Internal Server Error";

        $loaddata = $this->ecc_library->get_field_data($view, $field);

        echo $loaddata;
    }

 
    function delete()
    {
        $this->authentication->plainlayout();
        $parameter = array();
        $return = array();

        $stock_opname_id = isset($_POST['stock_opname_id']) ? $_POST['stock_opname_id'] : false;

        $user_id = $this->session->userdata('user_id');

        $result = array();
        $return['valid'] = false;
        $return['status_code'] = 501;
        $return['message'] = "Internal Server Error";

        if (count($_POST) > 0) {

            if ($stock_opname_id) {
                $this->rpc_service->setSP("dbo.sp_stock_opname_delete");
                $this->rpc_service->addField('stock_opname_id', $stock_opname_id);
            }

            $result = $this->rpc_service->resultJSON();
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

    function post_add_edit()
    {
        $this->authentication->plainlayout();
        $parameter = array();
        $return = array();

        $stock_opname_id = isset($_POST['stock_opname_id']) ? $_POST['stock_opname_id'] : '';
        $stock_opname_no = isset($_POST['stock_opname_no']) ? $_POST['stock_opname_no'] : '';
        $stock_opname_date = isset($_POST['stock_opname_date']) ? $_POST['stock_opname_date'] : '';
        $stock_opname_memo = isset($_POST['stock_opname_memo']) ? $_POST['stock_opname_memo'] : '';

        $user_id = $this->session->userdata('user_id');

        $result = array();
        $return['valid'] = false;
        $return['status_code'] = 501;
        $return['message'] = "Internal Server Error";

        if (count($_POST) > 0) {
            if ($stock_opname_id) {
                $this->rpc_service->setSP("dbo.sp_stock_opname_edit");
                $this->rpc_service->addField('stock_opname_id', $stock_opname_id);
            } else {
                $this->rpc_service->setSP("dbo.sp_stock_opname_add");
            }

            $stock_opname = $this->session->userdata('stock_opname');
            if ($stock_opname) {
                if (is_array($stock_opname)) {
                    foreach ($stock_opname as $dt_data) {
                        $this->rpc_service->addAttributeChild('dt', $dt_data);
                    }
                }
            }

            $this->rpc_service->addField('stock_opname_no', $stock_opname_no);
            $this->rpc_service->addField('stock_opname_date', $stock_opname_date);
            $this->rpc_service->addField('stock_opname_memo', $stock_opname_memo);

            $result = $this->rpc_service->resultJSON();

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

 

 

   
}
