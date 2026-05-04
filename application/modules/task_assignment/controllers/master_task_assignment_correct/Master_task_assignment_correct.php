<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Master_task_assignment_correct extends CI_Controller
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
        $view = 'view_task_assignment_detail_rft_all';
        $get_field = $this->ecc_library->get_field_pop($view);
        $get_field['r1']['hidden'] = true;
        $get_field['r2']['hidden'] = true;
        $get_field['r3']['hidden'] = true;
        $get_field['r4']['hidden'] = true;
        $get_field['r7']['hidden'] = true;
        $get_field['r9']['hidden'] = true;

        $get_field['act']['sc'] = 'act';
        $get_field['act']['title'] = 'action';
        $get_field['act']['bypassvalue'] = '';
        $get_field['act']['ctype'] = 'text';
        $get_field['act']['align'] = 'center';
        $get_field['act']['search'] = false;
        $get_field['act']['sortable'] = false;
        $get_field['act']['formatter'] = 'formatOperationsTaskAssignmentCorrectRft';
        $get_field['act']['width'] = 150;
        return $get_field;
    }
    function view_defect_table()
    {
        $view = 'view_task_assignment_detail_defect_all';
        $get_field = $this->ecc_library->get_field_pop($view);
        $get_field['r1']['hidden'] = true;
        $get_field['r2']['hidden'] = true;
        $get_field['r3']['hidden'] = true;
        $get_field['r6']['hidden'] = true;
        $get_field['r8']['hidden'] = true;
        $get_field['r9']['hidden'] = false;
        $get_field['r9']['title'] = 'Preview Image';
        $get_field['r9']['width'] = '200';
        $get_field['r9']['formatter'] = 'formatImageCorrectDefect';

        $get_field['act']['sc'] = 'act';
        $get_field['act']['title'] = 'action';
        $get_field['act']['bypassvalue'] = '';
        $get_field['act']['ctype'] = 'text';
        $get_field['act']['align'] = 'center';
        $get_field['act']['search'] = false;
        $get_field['act']['sortable'] = false;
        $get_field['act']['formatter'] = 'formatOperationsTaskAssignmentCorrectDefect';
        $get_field['act']['width'] = 150;
        return $get_field;
    }
    function view_reject_table()
    {
        $view = 'view_task_assignment_detail_reject_all';
        $get_field = $this->ecc_library->get_field_pop($view);


        $get_field['r1']['hidden'] = true;



        $get_field['r2']['hidden'] = true;


        $get_field['r3']['hidden'] = true;


        $get_field['r4']['hidden'] = true;



        $get_field['r7']['hidden'] = true;
        $get_field['r9']['hidden'] = true;


        $get_field['act']['sc'] = 'act';
        $get_field['act']['title'] = 'action';
        $get_field['act']['bypassvalue'] = '';
        $get_field['act']['ctype'] = 'text';
        $get_field['act']['align'] = 'center';
        $get_field['act']['search'] = false;
        $get_field['act']['sortable'] = false;
        $get_field['act']['formatter'] = 'formatOperationsTaskAssignmentCorrectReject';
        $get_field['act']['width'] = 150;
        return $get_field;
    }



    function index()
    {

        $this->load->model('main');
        $component['loadlayout'] = true;
        $component['view_load'] = 'master_task_assignment_correct/view';
        $component['view_load_form'] = 'master_task_assignment_correct/form';
        $component['load_js'][] = 'master_task_assignment_correct/view';
        $component['load_js'][] = 'master_task_assignment_correct/form';

        $component['page_title'] = "Master Task Assignment Correction";

        $dashboard_table = array();

        $nav_button = array();


        $field = $this->view_table();
        $field_defect = $this->view_defect_table();
        $field_reject = $this->view_reject_table();

        $dashboard_table['field'] = $field;
        $dashboard_table['field_defect'] = $field_defect;
        $dashboard_table['field_reject'] = $field_reject;

        $dashboard_table['field_loaddata'] = 'loaddata';
        $dashboard_table['field_loaddata_defect'] = 'loaddata_defect';
        $dashboard_table['field_loaddata_reject'] = 'loaddata_reject';





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

        $view = 'view_task_assignment_detail_rft_all';
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

        $view = 'view_task_assignment_detail_defect_all';
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

        $view = 'view_task_assignment_detail_reject_all';
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
                $this->rpc_service->setSP("dbo.sp_master_task_assignment_rft_delete");
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
    function delete_defect()
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
                $this->rpc_service->setSP("dbo.sp_master_task_assignment_defect_delete");
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
    function delete_reject()
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
                $this->rpc_service->setSP("dbo.sp_master_task_assignment_reject_delete");
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


    function post_add_edit_rft()
    {
        $this->authentication->plainlayout();
        $return = array('valid' => false, 'task_assignment_id' => 501, 'message' => "Internal Server Error");

        $id = $this->input->post('id', true);

        $task_assignment_id = $this->input->post('task_assignment_id', true);
        $rft_size_id = $this->input->post('rft_size_id', true);
        $rft_colour_id = $this->input->post('rft_colour_id', true);
        $created_at = $this->input->post('created_at', true);
        $rft_status = $this->input->post('rft_status', true);




        if (empty($task_assignment_id)) {
            $return['valid'] = false;
            $return['message'] = "task_assignment_id is required";
            echo json_encode($return);
            return;
        }

        if ($id == true) {
            $this->rpc_service->setSP("dbo.sp_master_task_assignment_rft_edit");
            $this->rpc_service->addField('id', $id);
        } else {
            $this->rpc_service->setSP("dbo.sp_master_task_assignment_rft_add");
        }

        $this->rpc_service->addField('task_assignment_id', $task_assignment_id);
        $this->rpc_service->addField('rft_size_id', $rft_size_id);
        $this->rpc_service->addField('rft_colour_id', $rft_colour_id);
        $this->rpc_service->addField('created_at', $created_at);
        $this->rpc_service->addField('rft_status', $rft_status);



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
    function post_add_edit_defect()
    {
        $this->authentication->plainlayout();
        $return = array(
            'valid' => false,
            'task_assignment_id' => 501,
            'message' => "Internal Server Error"
        );

        $id = $this->input->post('id', true);
        $task_assignment_id = $this->input->post('task_assignment_id', true);
        $defect_cause_id = $this->input->post('defect_cause_id', true);
        $defect_parts_id = $this->input->post('defect_parts_id', true);
        $rfid_no = $this->input->post('rfid_no', true);
        $defect_status = $this->input->post('defect_status', true);
        $old_image = $this->input->post('old_image', true);
        $image = $old_image;

        if (empty($task_assignment_id)) {
            $return['message'] = "task_assignment_id is required";
            echo json_encode($return);
            return;
        }

        if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
            $file_ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

            if (!in_array($file_ext, array('jpg', 'jpeg', 'png'))) {
                $return['message'] = "Hanya file jpg, jpeg dan png yang diizinkan untuk image";
                echo json_encode($return);
                return;
            }

            $upload_dir = './assets/img/task_assignment_detail_defect/';

            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            $new_filename = uniqid('defect_') . '.' . $file_ext;
            $destination = $upload_dir . $new_filename;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
                $image = $new_filename;
            } else {
                $return['message'] = "Gagal mengunggah file. Silakan coba lagi.";
                echo json_encode($return);
                return;
            }
        } else {
            if (empty($id) && empty($old_image)) {
                $return['message'] = "File image dibutuhkan";
                echo json_encode($return);
                return;
            }
        }

        if ($id) {
            $this->rpc_service->setSP("dbo.sp_master_task_assignment_defect_edit");
            $this->rpc_service->addField('id', $id);
        } else {
            $this->rpc_service->setSP("dbo.sp_master_task_assignment_defect_add");
        }

        $this->rpc_service->addField('task_assignment_id', $task_assignment_id);
        $this->rpc_service->addField('defect_cause_id', $defect_cause_id);
        $this->rpc_service->addField('defect_parts_id', $defect_parts_id);
        $this->rpc_service->addField('rfid_no', $rfid_no);
        $this->rpc_service->addField('defect_status', $defect_status);
        $this->rpc_service->addField('image', $image);

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
    function post_add_edit_reject()
    {
        $this->authentication->plainlayout();
        $return = array('valid' => false, 'task_assignment_id' => 501, 'message' => "Internal Server Error");

        $id = $this->input->post('id', true);

        $task_assignment_id = $this->input->post('task_assignment_id', true);
        $reject_size_id = $this->input->post('reject_size_id', true);
        $reject_colour_id = $this->input->post('reject_colour_id', true);
        $created_at = $this->input->post('created_at', true);
        $reject_status = $this->input->post('reject_status', true);




        if (empty($task_assignment_id)) {
            $return['valid'] = false;
            $return['message'] = "task_assignment_id is required";
            echo json_encode($return);
            return;
        }

        if ($id == true) {
            $this->rpc_service->setSP("dbo.sp_master_task_assignment_reject_edit");
            $this->rpc_service->addField('id', $id);
        } else {
            $this->rpc_service->setSP("dbo.sp_master_task_assignment_reject_add");
        }

        $this->rpc_service->addField('task_assignment_id', $task_assignment_id);
        $this->rpc_service->addField('reject_size_id', $reject_size_id);
        $this->rpc_service->addField('reject_colour_id', $reject_colour_id);
        $this->rpc_service->addField('created_at', $created_at);
        $this->rpc_service->addField('reject_status', $reject_status);



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
