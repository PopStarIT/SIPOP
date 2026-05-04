<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Item extends CI_Controller
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
        $view = 'view_mst_item_it_assets';
        $get_field = $this->ecc_library->get_field_pop($view);
        $get_field['r1']['hidden'] = true;
        $get_field['r1']['title'] = 'item_base_id';
        $get_field['r1']['width'] = '200';

        $get_field['r2']['hidden'] = false;
        $get_field['r2']['title'] = 'ITEM CODE';
        $get_field['r2']['width'] = '100';

        $get_field['r3']['hidden'] = false;
        $get_field['r3']['title'] = 'ITEM NAME';
        $get_field['r3']['width'] = '200';

        $get_field['r4']['hidden'] = true;
        $get_field['r4']['title'] = 'ITEM CATEGORY';
        $get_field['r4']['width'] = '200';

        $get_field['r5']['hidden'] = false;
        $get_field['r5']['title'] = 'Preview Image';
        $get_field['r5']['width'] = '200';
        $get_field['r5']['formatter'] = 'formatImageItassets';
        $get_field['r5']['align'] = 'center';

        $get_field['r6']['hidden'] = false;
        $get_field['r6']['title'] = 'TIPE';
        $get_field['r6']['width'] = '100';

        $get_field['r7']['hidden'] = false;
        $get_field['r7']['title'] = 'SPESIFIKASI LAIN';
        $get_field['r7']['width'] = '200';

        $get_field['r8']['hidden'] = false;
        $get_field['r8']['title'] = 'Barcode';
        $get_field['r8']['width'] = '100';

        $get_field['r9']['hidden'] = true;
        $get_field['r9']['title'] = 'Stock Tersedia';
        $get_field['r9']['width'] = '80';

        $get_field['r10']['hidden'] = false;
        $get_field['r10']['title'] = 'TOtal Item';
        $get_field['r10']['width'] = '80';

        $get_field['r11']['hidden'] = true;
        $get_field['r11']['title'] = 'Invoice ID';
        $get_field['r11']['width'] = '80';

        return $get_field;
    }

    function view_detail()
    {
        $view = 'view_detail_mst_item_base';
        $get_field = $this->ecc_library->get_field_pop($view);

        $get_field['r1']['hidden'] = true;
        $get_field['r1']['title'] = 'Detail Item Base Id';
        $get_field['r1']['width'] = '200';

        $get_field['r2']['hidden'] = true;
        $get_field['r2']['title'] = 'Item Base Id';
        $get_field['r2']['width'] = '200';

        $get_field['r3']['hidden'] = false;
        $get_field['r3']['title'] = 'Serial Number';
        $get_field['r3']['width'] = '200';

        $get_field['r4']['hidden'] = true;
        $get_field['r4']['title'] = 'Status Code';
        $get_field['r4']['width'] = '200';

        $get_field['r5']['hidden'] = false;
        $get_field['r5']['title'] = 'Status';
        $get_field['r5']['width'] = '200';

        $get_field['r6']['hidden'] = false;
        $get_field['r6']['title'] = 'Keterangan';
        $get_field['r6']['width'] = '200';

        $get_field['r7']['hidden'] = true;
        $get_field['r7']['title'] = 'Invoice ID';
        $get_field['r7']['width'] = '200';

        $get_field['r8']['hidden'] = false;
        $get_field['r8']['title'] = 'Garansi';
        $get_field['r8']['width'] = '200';


        $get_field['r9']['hidden'] = false;
        $get_field['r9']['title'] = 'Jumlah Item';
        $get_field['r9']['width'] = '200';

        $get_field['r10']['hidden'] = true;
        $get_field['r10']['title'] = 'Garansi Keterangan';
        $get_field['r10']['width'] = '200';

        $get_field['r11']['hidden'] = false;
        $get_field['r11']['title'] = 'Invoice Info';
        $get_field['r11']['width'] = '200';

        $get_field['r12']['hidden'] = false;
        $get_field['r12']['title'] = 'Garansi Info';
        $get_field['r12']['width'] = '200';




        $get_field['act']['sc'] = 'act';
        $get_field['act']['title'] = 'action';
        $get_field['act']['bypassvalue'] = '';
        $get_field['act']['ctype'] = 'text';
        $get_field['act']['align'] = 'center';
        $get_field['act']['search'] = false;
        $get_field['act']['sortable'] = false;
        $get_field['act']['formatter'] = 'formatOperationsItAssets';
        $get_field['act']['width'] = 300;

        return $get_field;
    }

    function view_detail_out()
    {
        $view = 'view_detail_mst_item_base_out';
        $get_field = $this->ecc_library->get_field_pop($view);

        $get_field['r1']['hidden'] = true;
        $get_field['r1']['title'] = 'out_detail_item_base_id';
        $get_field['r1']['width'] = '150';

        $get_field['r2']['hidden'] = true;
        $get_field['r2']['title'] = 'detail_item_base_id';
        $get_field['r2']['width'] = '150';

        $get_field['r3']['hidden'] = false;
        $get_field['r3']['title'] = 'tgl_keluar';
        $get_field['r3']['width'] = '150';

        $get_field['r4']['hidden'] = false;
        $get_field['r4']['title'] = 'lokasi';
        $get_field['r4']['width'] = '150';

        $get_field['r5']['hidden'] = false;
        $get_field['r5']['title'] = 'damage_status';
        $get_field['r5']['width'] = '150';

        $get_field['r6']['hidden'] = false;
        $get_field['r6']['title'] = 'jumlah item keluar';
        $get_field['r6']['width'] = '150';

        $get_field['r7']['hidden'] = false;
        $get_field['r7']['title'] = 'Serial Number';
        $get_field['r7']['width'] = '150';

        $get_field['r8']['hidden'] = false;
        $get_field['r8']['title'] = 'Item Base Code';
        $get_field['r8']['width'] = '150';

        $get_field['r9']['hidden'] = true;
        $get_field['r9']['title'] = 'Assets Tags ID';
        $get_field['r9']['width'] = '150';

        $get_field['r10']['hidden'] = true;
        $get_field['r10']['title'] = 'status info';
        $get_field['r10']['width'] = '200';

        $get_field['r11']['hidden'] = false;
        $get_field['r11']['title'] = 'Assets Tags Info';
        $get_field['r11']['width'] = '200';

        $get_field['act']['sc'] = 'act';
        $get_field['act']['title'] = 'action';
        $get_field['act']['bypassvalue'] = '';
        $get_field['act']['ctype'] = 'text';
        $get_field['act']['align'] = 'center';
        $get_field['act']['search'] = false;
        $get_field['act']['sortable'] = false;
        $get_field['act']['formatter'] = 'formatOperationsItAssetsOut';
        $get_field['act']['width'] = 150;

        return $get_field;
    }

    function view_detail_out_return()
    {
        $view = 'view_assets_return';
        $get_field = $this->ecc_library->get_field_pop($view);

        $get_field['r1']['hidden'] = true;
        $get_field['r1']['title'] = 'out_detail_item_base_id_return';
        $get_field['r1']['width'] = '200';

        $get_field['r2']['hidden'] = true;
        $get_field['r2']['title'] = 'out_detail_item_base_id';
        $get_field['r2']['width'] = '200';

        $get_field['r3']['hidden'] = true;
        $get_field['r3']['title'] = 'Detail_item_base_id';
        $get_field['r3']['width'] = '200';

        $get_field['r4']['hidden'] = false;
        $get_field['r4']['title'] = 'Tanggal Return';
        $get_field['r4']['width'] = '200';

        $get_field['r5']['hidden'] = false;
        $get_field['r5']['title'] = 'Alasan Return';
        $get_field['r5']['width'] = '200';

        $get_field['r6']['hidden'] = false;
        $get_field['r6']['title'] = 'Jumlah Return';
        $get_field['r6']['width'] = '200';

        $get_field['r7']['hidden'] = false;
        $get_field['r7']['title'] = 'Serial Number';
        $get_field['r7']['width'] = '200';


        return $get_field;
    }



    function view_bug_fix()
    {
        $view = 'view_bug_fix';
        $get_field = $this->ecc_library->get_field_pop($view);

        $get_field['r1']['hidden'] = true;
        $get_field['r1']['title'] = 'out_detail_item_base_id';
        $get_field['r1']['width'] = '150';

        $get_field['r2']['hidden'] = true;
        $get_field['r2']['title'] = 'detail_item_base_id';
        $get_field['r2']['width'] = '150';

        $get_field['r3']['hidden'] = false;
        $get_field['r3']['title'] = 'tgl_keluar';
        $get_field['r3']['width'] = '150';

        $get_field['r4']['hidden'] = false;
        $get_field['r4']['title'] = 'lokasi';
        $get_field['r4']['width'] = '150';

        $get_field['r5']['hidden'] = false;
        $get_field['r5']['title'] = 'damage_status';
        $get_field['r5']['width'] = '150';

        $get_field['r6']['hidden'] = false;
        $get_field['r6']['title'] = 'jumlah item keluar';
        $get_field['r6']['width'] = '150';

        $get_field['r7']['hidden'] = false;
        $get_field['r7']['title'] = 'Serial Number';
        $get_field['r7']['width'] = '150';

        $get_field['r8']['hidden'] = false;
        $get_field['r8']['title'] = 'Item Base Code';
        $get_field['r8']['width'] = '150';

        $get_field['r9']['hidden'] = true;
        $get_field['r9']['title'] = 'Assets Tags ID';
        $get_field['r9']['width'] = '150';

        $get_field['r10']['hidden'] = true;
        $get_field['r10']['title'] = 'status info';
        $get_field['r10']['width'] = '200';

        $get_field['r11']['hidden'] = false;
        $get_field['r11']['title'] = 'Assets Tags Info';
        $get_field['r11']['width'] = '200';



        return $get_field;
    }

    function index()
    {

        $this->load->model('main');
        $component['loadlayout'] = true;
        $component['view_load'] = 'item/view';
        $component['view_load_form'] = 'item/form';
        $component['load_js'][] = 'item/view';
        $component['load_js'][] = 'item/form';

        $component['page_title'] = "Data It Assets";

        $dashboard_table = array();

        $nav_button = array();
        $nav_button[] = array('method_id' => 7811104, 'title' => 'Add', 'icon' => 'fa fa-plus', 'load' => 'item/function_add');
        $nav_button[] = array('method_id' => 7811105, 'title' => 'Edit', 'icon' => 'fa fa-pencil', 'load' => 'item/function_edit');

        $nav_button[] = array('method_id' => 7811106, 'title' => 'Delete', 'icon' => 'fa fa-trash-o', 'load' => 'item/function_delete');

        $field = $this->view_table();

        $field_detail = $this->view_detail();
        $field_detail_out = $this->view_detail_out();
        $field_detail_out_return = $this->view_detail_out_return();
        $field_bug_fix = $this->view_bug_fix();
        $dashboard_table['nav_button'] = $nav_button;
        $dashboard_table['field'] = $field;

        $dashboard_table['field_loaddata'] = 'loaddata_header';

        $dashboard_table['field_detail'] = $field_detail;
        $dashboard_table['field_detail_loaddata'] = 'loaddata_detail';

        $dashboard_table['field_detail_out'] = $field_detail_out;
        $dashboard_table['field_detail_out_loaddata'] = 'loaddata_detail_out';

        $dashboard_table['field_detail_out_return'] = $field_detail_out_return;
        $dashboard_table['field_detail_out_return_loaddata'] = 'loaddata_detail_out_return';

        $dashboard_table['field_bug_fix'] = $field_bug_fix;
        $dashboard_table['field_bug_fix_loaddata'] = 'loaddata_bug_fix';

        $component['dashboard_table'] = $dashboard_table;

        $this->authentication->ajaxlayout($component);
    }

    function loaddata()
    {


        $this->authentication->plainlayout();


        $methodid = isset($_REQUEST['methodid']) ?
            (is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid'] : -1) : -1;

        $view = 'view_mst_item_it_assets';
        $field = $this->view_table();

        $return = array();
        $return['valid'] = false;
        $return['message'] = "Internal Server Error";

        $extra_param = array();

        // }
        $extra_param['methodid'] = $methodid;

        $load_detail = $this->ecc_library->get_field_data_pop($view, $field, $extra_param);

        echo $load_detail;
    }

    function loaddata_detail()
    {
        $this->authentication->plainlayout();

        $item_base_id = isset($_REQUEST['item_base_id']) ?
            (is_numeric($_REQUEST['item_base_id']) ? $_REQUEST['item_base_id'] : -1) : -1;

        $ini_item_base_id = isset($_REQUEST['ini_item_base_id']) ? $_REQUEST['ini_item_base_id'] : $item_base_id;

        if (!empty($item_base_id)) {
            $item_base_id = $ini_item_base_id;
        }

        $methodid = isset($_REQUEST['methodid']) ?
            (is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid'] : -1) : -1;

        $view = 'view_detail_mst_item_base';
        $field = $this->view_detail();

        $return = array();
        $return['valid'] = false;
        $return['message'] = "Internal Server Error";

        $extra_param = array();
        if ($item_base_id != -1) {
            $extra_param['where']['0']['field'] = 'r2';
            $extra_param['where']['0']['data'] = $item_base_id;
        }
        $extra_param['methodid'] = $methodid;

        $load_detail = $this->ecc_library->get_field_data_pop($view, $field, $extra_param);

        echo $load_detail;
    }

    function loaddata_detail_out()
    {
        $this->authentication->plainlayout();

        $detail_item_base_id = isset($_REQUEST['detail_item_base_id']) ?
            (is_numeric($_REQUEST['detail_item_base_id']) ? $_REQUEST['detail_item_base_id'] : -1) : -1;


        // $ini_detail_item_base_id = isset($_REQUEST['ini_detail_item_base_id']) ? $_REQUEST['ini_detail_item_base_id'] : $detail_item_base_id;


        // if (!empty($detail_item_base_id)) {
        //     $detail_item_base_id = $ini_detail_item_base_id;
        // }

        $methodid = isset($_REQUEST['methodid']) ?
            (is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid'] : -1) : -1;

        $view = 'view_detail_mst_item_base_out';
        $field = $this->view_detail_out();

        $return = array();
        $return['valid'] = false;
        $return['message'] = "Internal Server Error";

        $extra_param = array();
        if ($detail_item_base_id != -1) {
            $extra_param['where']['0']['field'] = 'r2';
            $extra_param['where']['0']['data'] = $detail_item_base_id;
        }
        $extra_param['methodid'] = $methodid;

        $load_detail = $this->ecc_library->get_field_data_pop($view, $field, $extra_param);

        echo $load_detail;
    }


    function loaddata_detail_out_return()
    {
        $this->authentication->plainlayout();

        $out_detail_item_base_id = isset($_REQUEST['out_detail_item_base_id']) ?
            (is_numeric($_REQUEST['out_detail_item_base_id']) ? $_REQUEST['out_detail_item_base_id'] : -1) : -1;


        // $ini_detail_item_base_id_return = isset($_REQUEST['ini_detail_item_base_id_return']) ? $_REQUEST['ini_detail_item_base_id_return'] : $out_detail_item_base_id;


        // if (!empty($detail_item_base_id)) {
        //     $detail_item_base_id = $ini_detail_item_base_id_return;
        // }

        $methodid = isset($_REQUEST['methodid']) ?
            (is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid'] : -1) : -1;

        $view = 'view_assets_return';
        $field = $this->view_detail_out_return();

        $return = array();
        $return['valid'] = false;
        $return['message'] = "Internal Server Error";

        $extra_param = array();
        if ($out_detail_item_base_id != -1) {
            $extra_param['where']['0']['field'] = 'r2';
            $extra_param['where']['0']['data'] = $out_detail_item_base_id;
        }
        $extra_param['methodid'] = $methodid;

        $load_detail = $this->ecc_library->get_field_data_pop($view, $field, $extra_param);

        echo $load_detail;
    }

    function loaddata_bug_fix()
    {


        $this->authentication->plainlayout();


        $methodid = isset($_REQUEST['methodid']) ?
            (is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid'] : -1) : -1;

        $view = 'view_bug_fix';
        $field = $this->view_bug_fix();

        $return = array();
        $return['valid'] = false;
        $return['message'] = "Internal Server Error";

        $extra_param = array();


        $extra_param['methodid'] = $methodid;

        $load_detail = $this->ecc_library->get_field_data_pop($view, $field, $extra_param);

        echo $load_detail;
    }

    function delete_detail()
    {
        $this->authentication->plainlayout();
        $parameter = array();
        $return = array();

        $result = array();
        $return['valid'] = false;
        $return['status_code'] = 501;
        $return['message'] = "Internal Server Error";

        $detail_item_base_id = isset($_POST['detail_item_base_id']) ? $_POST['detail_item_base_id'] : '';
        $user_id = $this->session->userdata('user_id');

        if (count($_POST) > 0) {
            if ($detail_item_base_id) {
                $this->rpc_service->setSP("dbo.sp_detail_item_base_delete");
                $this->rpc_service->addField('detail_item_base_id', $detail_item_base_id);
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

    function delete_out()
    {
        $this->authentication->plainlayout();
        $parameter = array();
        $return = array();

        $result = array();
        $return['valid'] = false;
        $return['status_code'] = 501;
        $return['message'] = "Internal Server Error";

        $out_detail_item_base_id = isset($_POST['out_detail_item_base_id']) ? $_POST['out_detail_item_base_id'] : '';
        $user_id = $this->session->userdata('user_id');

        if (count($_POST) > 0) {
            if ($out_detail_item_base_id) {
                $this->rpc_service->setSP("dbo.sp_detail_item_base_delete_out");
                $this->rpc_service->addField('out_detail_item_base_id', $out_detail_item_base_id);
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

    public function bug_fix()
    {
        $this->authentication->plainlayout();
        $return = [
            'valid' => false,
            'status_code' => 501,
            'message' => "Internal Server Error"
        ];

        $out_detail_item_base_id = $this->input->post('out_detail_item_base_id');
        $keterangan = $this->input->post('keterangan'); // tangkap keterangan
        $user_id = $this->session->userdata('user_id');

        if (!empty($out_detail_item_base_id)) {
            $this->rpc_service->setSP("dbo.sp_detail_item_base_bug_fix");
            $this->rpc_service->addField('out_detail_item_base_id', $out_detail_item_base_id);
            $this->rpc_service->addField('keterangan', $keterangan); // kirim ke SP
            $this->rpc_service->addField('data_by', $user_id);
            $this->rpc_service->addField('ip_address', $this->input->ip_address());

            $result = $this->rpc_service->resultJSON_pop();

            if (isset($result['valid']) && $result['valid']) {
                $return['valid'] = true;
                $return['status_code'] = $result['no'];
                $return['message'] = $result['des'];
            }
        } else {
            $return['message'] = "Invalid data submitted.";
        }

        echo json_encode($return);
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

        $item_base_id = isset($_POST['item_base_id']) ? $_POST['item_base_id'] : '';
        $user_id = $this->session->userdata('user_id');

        if (count($_POST) > 0) {
            if ($item_base_id) {
                $this->rpc_service->setSP("dbo.sp_hardware_it_assets_delete");
                $this->rpc_service->addField('item_base_id', $item_base_id);
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

        $item_base_id = isset($_POST['item_base_id']) ? $_POST['item_base_id'] : '';
        $invoice_id = isset($_POST['invoice_id']) ? $_POST['invoice_id'] : '';
        $item_base_code = isset($_POST['item_base_code']) ? $_POST['item_base_code'] : '';
        $item_base_name = isset($_POST['item_base_name']) ? $_POST['item_base_name'] : '';
        $merk = isset($_POST['merk']) ? $_POST['merk'] : '';
        $barcode = isset($_POST['barcode']) ? $_POST['barcode'] : '';
        $item_category_id = !empty($_POST['item_category_id']) ? $_POST['item_category_id'] : 1;
        $tipe = isset($_POST['tipe']) ? $_POST['tipe'] : '';
        $spesifikasi_lain = isset($_POST['spesifikasi_lain']) ? $_POST['spesifikasi_lain'] : '';

        $upload_success = false;

        $file_name = '';

        $file_path = './assets/img/it_assets/'; // Removed dynamic path

        // Proses upload file gambar (merk)
        if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
            $file = $_FILES['file'];
            $file_name = $file['name'];
            $file_temp = $file['tmp_name'];

            //Sanitize filename to prevent directory traversal vulnerabilities
            $file_name = preg_replace('/[^a-zA-Z0-9._-]/', '', $file_name); //Allows alphanumeric characters, 
            $i = 1;
            $base_name = pathinfo($file_name, PATHINFO_FILENAME);
            $extension = pathinfo($file_name, PATHINFO_EXTENSION);
            while (file_exists($file_path . $file_name)) {
                $file_name = $base_name . '_' . $i++ . '.' . $extension;
            }

            $destination = $file_path . $file_name;
            if (move_uploaded_file($file_temp, $destination)) {
                $upload_success = true;
            } else {
                $return['message'] = "File upload failed. Please check file permissions.";
                echo json_encode($return);
                return;
            }
        }

        $this->load->model('main');
        if (count($_POST) > 0) {
            if ($item_base_id) {
                $this->rpc_service->setSP("dbo.sp_hardware_it_assets_edit");
            } else {
                $this->rpc_service->setSP("dbo.sp_hardware_it_assets_add");
            }

            $this->rpc_service->addField('item_base_id', $item_base_id);
            $this->rpc_service->addField('invoice_id', $invoice_id);
            $this->rpc_service->addField('item_base_code', $item_base_code);
            $this->rpc_service->addField('item_base_name', $item_base_name);
            $this->rpc_service->addField('item_category_id', $item_category_id);
            $this->rpc_service->addField('merk', $file_name); // File gambar untuk merk

            $this->rpc_service->addField('barcode', $barcode);

            $this->rpc_service->addField('tipe', $tipe);
            $this->rpc_service->addField('spesifikasi_lain', $spesifikasi_lain);


            $result = $this->rpc_service->resultJSON_pop();
            $data = array();
            if (isset($result) && isset($result['valid']) && $result['valid']) {
                $data_result = json_decode($result['data'], true);
                $return['valid'] = true;
                $return['status_code'] = $result['no'];
                $return['message'] = $result['des'];
                // $return['item_base_id'] = $data_result['detail_item_base_id'];
            } else {
                $return['message'] = isset($result['des']) ? $result['des'] : "Database error.";
                if (!$upload_success && isset($_FILES['file']) && $_FILES['file']['error'] != UPLOAD_ERR_OK) {
                    $return['message'] .= " File upload error: " . $_FILES['file']['error'];
                }
            }
        } else {
            $return['valid'] = false;
            $return['message'] = "Session expired";
        }

        echo json_encode($return);
    }

    function post_add_edit_detail()
    {
        $this->authentication->plainlayout();
        $return = array('valid' => false, 'status_code' => 501, 'message' => "Internal Server Error");

        // Mengambil data dari POST
        $detail_item_base_id = $this->input->post('detail_item_base_id', true);
        $item_base_id = $this->input->post('item_base_id', true);
        $serial_number = $this->input->post('serial_number', true);
        $jml_item = $this->input->post('jml_item', true);
        $garansi = $this->input->post('garansi', true);
        $garansi_keterangan = $this->input->post('garansi_keterangan', true);
        $invoice_id = $this->input->post('invoice_id', true);
        $status = $this->input->post('status', true);
        $keterangan = $this->input->post('keterangan', true);
        $assets_tags_id = $this->input->post('assets_tags_id', true);

        // Validasi input
        if ($item_base_id == false) {
            $return['valid'] = false;
            $return['message'] = "Item base ID is required";
            echo json_encode($return);
            return;
        }

        if (!is_numeric($jml_item) || $jml_item <= 0) {
            $return['valid'] = false;
            $return['message'] = "Jumlah item harus berupa angka positif";
            echo json_encode($return);
            return;
        }

        // Inisialisasi counter untuk item berhasil ditambahkan
        $success_count = 0;
        $error_messages = array();

        // Loop sebanyak jumlah item yang diinputkan
        for ($i = 0; $i < $jml_item; $i++) {
            // Generate serial number unik jika jumlah item > 1
            $current_serial = $serial_number;
            if ($jml_item > 1) {
                $current_serial = $serial_number . '-' . ($i + 1);
            }

            // Reset RPC service


            // Tentukan stored procedure yang akan digunakan
            if ($detail_item_base_id == true && $i == 0) {
                // Hanya edit item pertama jika detail_item_base_id tersedia
                $this->rpc_service->setSP("dbo.sp_detail_item_base_edit");
                $this->rpc_service->addField('detail_item_base_id', $detail_item_base_id);
            } else {
                // Tambahkan item baru
                $this->rpc_service->setSP("dbo.sp_detail_item_base_add");
            }

            // Menambahkan field ke RPC service
            $this->rpc_service->addField('item_base_id', $item_base_id);
            $this->rpc_service->addField('serial_number', $current_serial);
            $this->rpc_service->addField('jml_item', 1); // Setiap item disimpan sebagai 1
            $this->rpc_service->addField('invoice_id', $invoice_id);
            $this->rpc_service->addField('garansi', $garansi);
            $this->rpc_service->addField('garansi_keterangan', $garansi_keterangan);
            $this->rpc_service->addField('status', $status);
            $this->rpc_service->addField('keterangan', $keterangan);

            // Tambahkan assets_tags_id jika tersedia
            if ($assets_tags_id) {
                $this->rpc_service->addField('assets_tags_id', $assets_tags_id);
            }

            $result = $this->rpc_service->resultJSON_pop();

            if (isset($result) && isset($result['valid']) && $result['valid']) {
                $success_count++;
            } else {
                // Tambahkan pesan error jika ada
                $error_message = isset($result['des']) ? $result['des'] : "Unknown error occurred";
                $error_messages[] = "Error pada item ke-" . ($i + 1) . ": " . $error_message;
            }
        }

        // Siapkan response
        if ($success_count == $jml_item) {
            $return['valid'] = true;
            $return['status_code'] = 200;
            $return['message'] = "Berhasil menyimpan " . $success_count . " item";
        } else if ($success_count > 0) {
            $return['valid'] = true;
            $return['status_code'] = 206;
            $return['message'] = "Berhasil menyimpan " . $success_count . " dari " . $jml_item . " item. Errors: " . implode(", ", $error_messages);
        } else {
            $return['valid'] = false;
            $return['status_code'] = 400;
            $return['message'] = "Gagal menyimpan item. Errors: " . implode(", ", $error_messages);
        }

        echo json_encode($return);
    }

    function post_add_edit_out()
    {

        $this->authentication->plainlayout();
        $return = array('valid' => false, 'status_code' => 501, 'message' => "Internal Server Error");

        $out_detail_item_base_id = $this->input->post('out_detail_item_base_id', true);
        $detail_item_base_id = $this->input->post('detail_item_base_id', true);
        $tgl_keluar = $this->input->post('tgl_keluar', true);
        $lokasi = $this->input->post('lokasi', true);
        $jml_item_out = $this->input->post('jml_item_out', true);
        $damage_status = $this->input->post('damage_status', true);
        $assets_tags_id = $this->input->post('assets_tags_id', true);
        $status_info = !empty($_POST['status_info']) ? $_POST['status_info'] : 1;
        if ($detail_item_base_id != false) {

            if ($out_detail_item_base_id == true) {
                $this->rpc_service->setSP("dbo.sp_detail_item_base_edit_out");
                $this->rpc_service->addField('out_detail_item_base_id', $out_detail_item_base_id);
            } else {
                $this->rpc_service->setSP("dbo.sp_detail_item_base_add_out");
            }
            $this->rpc_service->addField('detail_item_base_id', $detail_item_base_id);
            $this->rpc_service->addField('lokasi', $lokasi);
            $this->rpc_service->addField('jml_item_out', $jml_item_out);
            $this->rpc_service->addField('tgl_keluar', $tgl_keluar);
            $this->rpc_service->addField('damage_status', $damage_status);
            $this->rpc_service->addField('assets_tags_id', $assets_tags_id);
            $this->rpc_service->addField('status_info', $status_info);
            $result = $this->rpc_service->resultJSON_pop();

            if (isset($result)) {
                if (isset($result['valid']) && $result['valid']) {
                    $data_result = json_decode($result['data'], true);
                    $return['keterangan'] = $data_result['keterangan'];
                    $return['valid'] = $result['valid'];
                    $return['status_code'] = $result['no'];
                    $return['message'] = $result['des'];
                } else {
                    $return['valid'] = false;
                    $return['status_code'] = $result['no'];
                    $return['message'] = $result['des'];
                }
            }
        } else {
            $return['valid'] = false;
            $return['message'] = "Item base ID is required";
        }

        echo json_encode($return);
    }
    function post_add_edit_out_return()
    {

        $this->authentication->plainlayout();
        $return = array('valid' => false, 'status_code' => 501, 'message' => "Internal Server Error");

        $out_detail_item_base_id_return = $this->input->post('out_detail_item_base_id_return', true);
        $out_detail_item_base_id = $this->input->post('out_detail_item_base_id', true);
        $detail_item_base_id = $this->input->post('detail_item_base_id', true);
        $tgl_return = $this->input->post('tgl_return', true);
        $alasan_return = $this->input->post('alasan_return', true);
        $jml_return = !empty($_POST['jml_return']) ? $_POST['jml_return'] : 1;


        if ($out_detail_item_base_id != false) {

            if ($out_detail_item_base_id_return == true) {
                $this->rpc_service->setSP("dbo.sp_detail_item_base_edit_out_return");
                $this->rpc_service->addField('out_detail_item_base_id', $out_detail_item_base_id_return);
            } else {
                $this->rpc_service->setSP("dbo.sp_detail_item_base_add_out_return");
            }
            $this->rpc_service->addField('out_detail_item_base_id', $out_detail_item_base_id);
            $this->rpc_service->addField('tgl_return', $tgl_return);
            $this->rpc_service->addField('alasan_return', $alasan_return);
            $this->rpc_service->addField('jml_return', $jml_return);
            $this->rpc_service->addField('detail_item_base_id', $detail_item_base_id);
            $result = $this->rpc_service->resultJSON_pop();

            if (isset($result)) {
                if (isset($result['valid']) && $result['valid']) {
                    $data_result = json_decode($result['data'], true);
                    $return['keterangan'] = $data_result['keterangan'];
                    $return['valid'] = $result['valid'];
                    $return['status_code'] = $result['no'];
                    $return['message'] = $result['des'];
                } else {
                    $return['valid'] = false;
                    $return['status_code'] = $result['no'];
                    $return['message'] = $result['des'];
                }
            }
        } else {
            $return['valid'] = false;
            $return['message'] = "Item base ID is required";
        }

        echo json_encode($return);
    }
    function post_edit_out()
    {

        $this->authentication->plainlayout();
        $return = array('valid' => false, 'status_code' => 501, 'message' => "Internal Server Error");

        $out_detail_item_base_id = $this->input->post('out_detail_item_base_id', true);
        $detail_item_base_id = $this->input->post('detail_item_base_id', true);
        $tgl_keluar = $this->input->post('tgl_keluar', true);
        $lokasi = $this->input->post('lokasi', true);
        $jml_item_out = $this->input->post('jml_item_out', true);
        $damage_status = $this->input->post('damage_status', true);
        $assets_tags_id = $this->input->post('assets_tags_id', true);
        $status_info = !empty($_POST['status_info']) ? $_POST['status_info'] : 2;
        if ($detail_item_base_id != false) {

            if ($out_detail_item_base_id == true) {
                $this->rpc_service->setSP("dbo.sp_detail_item_base_edit_out_bug");
                $this->rpc_service->addField('out_detail_item_base_id', $out_detail_item_base_id);
            } else {
                $this->rpc_service->setSP("dbo.sp_detail_item_base_add_out_bug");
            }
            $this->rpc_service->addField('detail_item_base_id', $detail_item_base_id);
            $this->rpc_service->addField('lokasi', $lokasi);
            $this->rpc_service->addField('jml_item_out', $jml_item_out);
            $this->rpc_service->addField('tgl_keluar', $tgl_keluar);
            $this->rpc_service->addField('damage_status', $damage_status);
            $this->rpc_service->addField('assets_tags_id', $assets_tags_id);
            $this->rpc_service->addField('status_info', $status_info);
            $result = $this->rpc_service->resultJSON_pop();

            if (isset($result)) {
                if (isset($result['valid']) && $result['valid']) {
                    $data_result = json_decode($result['data'], true);
                    $return['keterangan'] = $data_result['keterangan'];
                    $return['valid'] = $result['valid'];
                    $return['status_code'] = $result['no'];
                    $return['message'] = $result['des'];
                } else {
                    $return['valid'] = false;
                    $return['status_code'] = $result['no'];
                    $return['message'] = $result['des'];
                }
            }
        } else {
            $return['valid'] = false;
            $return['message'] = "Item base ID is required";
        }

        echo json_encode($return);
    }
}
