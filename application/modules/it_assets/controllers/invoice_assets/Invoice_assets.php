<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Invoice_assets extends CI_Controller
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
        $view = 'view_assets_invoice';
        $get_field = $this->ecc_library->get_field_pop($view);
        $get_field['r1']['hidden'] = true;
        $get_field['r1']['title'] = 'invoice_id';
        $get_field['r1']['width'] = '100';

        $get_field['r2']['hidden'] = false;
        $get_field['r2']['title'] = 'invoice_number';
        $get_field['r2']['width'] = '100';

        $get_field['r3']['hidden'] = false;
        $get_field['r3']['title'] = 'invoice_file';
        $get_field['r3']['width'] = '100';
        $get_field['r3']['formatter'] = 'formatImageItassetsInvoice';
        $get_field['r3']['align'] = 'center';

        $get_field['r4']['hidden'] = false;
        $get_field['r4']['title'] = 'keterangan';
        $get_field['r4']['width'] = '100';

        $get_field['r5']['hidden'] = false;
        $get_field['r5']['title'] = 'Create Date';
        $get_field['r5']['width'] = '100';

        $get_field['r6']['hidden'] = true;
        $get_field['r6']['title'] = 'Garansi';
        $get_field['r6']['width'] = '100';

        $get_field['r7']['hidden'] = false;
        $get_field['r7']['title'] = 'Toko';
        $get_field['r7']['width'] = '100';



        return $get_field;
    }



    function index()
    {

        $this->load->model('main');
        $component['loadlayout'] = true;
        $component['view_load'] = 'invoice/view';
        $component['view_load_form'] = 'invoice/form';
        $component['load_js'][] = 'invoice/view';
        $component['load_js'][] = 'invoice/form';

        $component['page_title'] = "Master Invoice";

        $dashboard_table = array();

        $nav_button = array();
        $nav_button[] = array('method_id' => 7811126, 'title' => 'Add', 'icon' => 'fa fa-plus', 'load' => 'invoice/function_add');
        $nav_button[] = array('method_id' => 7811127, 'title' => 'Edit', 'icon' => 'fa fa-pencil', 'load' => 'invoice/function_edit');

        $nav_button[] = array('method_id' => 7811128, 'title' => 'Delete', 'icon' => 'fa fa-trash-o', 'load' => 'invoice/function_delete');

        $field = $this->view_table();


        $dashboard_table['nav_button'] = $nav_button;
        $dashboard_table['field'] = $field;


        $component['dashboard_table'] = $dashboard_table;

        $this->authentication->ajaxlayout($component);
    }

    function loaddata()
    {
        $this->authentication->plainlayout();

        $view = 'view_assets_invoice';
        $field = $this->view_table();

        $return = array();
        $return['valid'] = false;
        $return['message'] = "Internal Server Error";

        $loaddata = $this->ecc_library->get_field_data_pop($view, $field);

        echo $loaddata;
    }



    function delete_invoice()
    {
        $this->authentication->plainlayout();
        $parameter = array();
        $return = array();

        $result = array();
        $return['valid'] = false;
        $return['status_code'] = 501;
        $return['message'] = "Internal Server Error";

        $invoice_id = isset($_POST['invoice_id']) ? $_POST['invoice_id'] : '';
        $user_id = $this->session->userdata('user_id');

        if (count($_POST) > 0) {
            if ($invoice_id) {
                $this->rpc_service->setSP("dbo.sp_hardware_it_assets_delete_invoice");
                $this->rpc_service->addField('invoice_id', $invoice_id);
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

        $invoice_id = $this->input->post('invoice_id', true);
        $invoice_number = $this->input->post('invoice_number', true);
        $keterangan = $this->input->post('keterangan', true);
        $garansi = $this->input->post('garansi', true);
        $info = $this->input->post('info', true);
        $create_date = $this->input->post('create_date', true);

        if (empty($invoice_number)) {
            $return['valid'] = false;
            $return['message'] = "invoice_number is required";
            echo json_encode($return);
            return;
        }

        $invoice_file = '';

        if (isset($_FILES['invoice_file']) && !empty($_FILES['invoice_file']['name'])) {

            $file_ext = pathinfo($_FILES['invoice_file']['name'], PATHINFO_EXTENSION);

            if (strtolower($file_ext) !== 'pdf') {
                $return['valid'] = false;
                $return['message'] = "Hanya file PDF yang diizinkan untuk invoice";
                echo json_encode($return);
                return;
            }

            $upload_dir = './assets/img/it_assets/';

            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            $new_filename = uniqid('invoice_') . '.pdf';
            $destination = $upload_dir . $new_filename;

            if (move_uploaded_file($_FILES['invoice_file']['tmp_name'], $destination)) {
                $invoice_file = $new_filename;
            } else {
                $return['valid'] = false;
                $return['message'] = "Gagal mengunggah file. Silakan coba lagi.";
                echo json_encode($return);
                return;
            }
        } else {
            $return['valid'] = false;
            $return['message'] = "File invoice dibutuhkan";
            echo json_encode($return);
            return;
        }

        if ($invoice_id == true) {
            $this->rpc_service->setSP("dbo.sp_hardware_it_assets_edit_invoice");
            $this->rpc_service->addField('invoice_id', $invoice_id);
        } else {
            $this->rpc_service->setSP("dbo.sp_hardware_it_assets_add_invoice");
        }

        $this->rpc_service->addField('invoice_number', $invoice_number);
        $this->rpc_service->addField('invoice_file', $invoice_file);
        $this->rpc_service->addField('keterangan', $keterangan);
        $this->rpc_service->addField('create_date', $create_date);
        $this->rpc_service->addField('garansi', $garansi);
        $this->rpc_service->addField('info', $info);

        $result = $this->rpc_service->resultJSON_pop();

        if (isset($result) && is_array($result) && isset($result['valid']) && $result['valid']) {
            $data_result = json_decode($result['data'], true);
            $return['invoice_id'] = $data_result['invoice_id'];
            $return['valid'] = $result['valid'];
            $return['status_code'] = $result['no'];
            $return['message'] = $result['des'];
        } else {
            if (!empty($invoice_file)) {
                @unlink($upload_dir . $invoice_file);
            }

            $return['valid'] = false;
            $return['status_code'] = isset($result['no']) ? $result['no'] : 500;
            $return['message'] = isset($result['des']) ? $result['des'] : "Gagal menyimpan data";
        }

        echo json_encode($return);
    }
}
