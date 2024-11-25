<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Marker extends CI_Controller
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


    function checklist_table()
    {
        $view = 'view_checklist';
        $get_field = $this->ecc_library->get_field_pop($view);

        return $get_field;
    }


    function checklist_detail_table()
    {
        $view = 'view_checklist_detail';
        $get_field = $this->ecc_library->get_field_pop($view);

        return $get_field;
    }

    function index()
    {

        $this->load->model('main');
        $component['loadlayout'] = true;
        $component['view_load'] = 'marker/view';
        $component['view_load_form'] = 'marker/form';
        $component['load_js'][] = 'marker/view';
        $component['load_js'][] = 'marker/form';

        $component['page_title'] = "Master marker";
        $component['master_lists'] = $this->get_master_lists();
        $dashboard_table = array();

        $nav_button = array();
        // $nav_button[] = array('method_id' => 781096, 'title' => 'Add', 'icon' => 'fa fa-plus', 'load' => 'marker/function_add');
        $nav_button[] = array('method_id' => 781097, 'title' => 'Isi Checklist', 'icon' => 'fa fa-checklist', 'load' => 'marker/function_edit');

        // $nav_button[] = array('method_id' => 781098, 'title' => 'Delete', 'icon' => 'fa fa-trash-o', 'load' => 'marker/function_delete');


        $field = $this->checklist_table();
        $field_checklist_detail = $this->checklist_detail_table();


        $dashboard_table['nav_button'] = $nav_button;
        $dashboard_table['field'] = $field;


        $component['dashboard_table'] = $dashboard_table;

        $this->authentication->ajaxlayout($component);
    }
    private function get_master_lists()
    {
        $this->load->model('main'); // Load your model
        return $this->main->get_master_lists(); // Fetch details
    }

    function loaddata()
    {
        $this->authentication->plainlayout();

        $view = 'view_checklist';
        $field = $this->checklist_table();

        $return = array();
        $return['valid'] = false;
        $return['message'] = "Internal Server Error";

        $loaddata = $this->ecc_library->get_field_data_pop($view, $field);

        echo $loaddata;
    }

    function loaddata_checklist_detail()
    {
        $this->authentication->plainlayout();

        $view = 'view_checklist_detail';
        $field = $this->checklist_detail_table();

        $return = array();
        $return['valid'] = false;
        $return['message'] = "Internal Server Error";

        $loaddata = $this->ecc_library->get_field_data_pop($view, $field);

        echo $loaddata;
    }


    public function get_checklist_with_list()
    {
        $this->load->model('main');
        $checklist_ids = $this->main->get_checklist_ids();

        $options = [];
        $added_ids = []; // Array untuk melacak checklist_id yang sudah ditambahkan

        foreach ($checklist_ids as $row) {
            // Jika checklist_id belum ditambahkan, tambahkan ke opsi
            if (!in_array($row->checklist_id, $added_ids)) {
                $list_data = $this->main->get_list_by_checklist_id($row->checklist_id);
                $list_name = $list_data ? $list_data->list : 'Tidak ada nama list';

                $options[] = [
                    'id' => $row->checklist_id,
                    'text' => $row->checklist_id . ' - ' . $list_name // Format checklist_id - nama list
                ];

                // Tambahkan checklist_id ke array yang sudah ditambahkan
                $added_ids[] = $row->checklist_id;
            }
        }

        echo json_encode($options);
    }

    public function show_checklist_id()
    {
        $this->load->model('main');
        $checklist_id = $this->input->get('checklist_id');

        // Ambil semua detail checklist dari model
        $details = $this->main->show_checklist_id($checklist_id);

        if ($details) {
            // Loop through the details and fetch the master list name
            foreach ($details as &$detail) {
                $master_list_name = $this->main->get_master_list_name($detail->master_list_id);
                $detail->master_list_name = $master_list_name; // Add the master list name to the detail object
            }
            echo json_encode($details);
        } else {
            echo json_encode([]);
        }
    }


    function post_add_edit()
    {
        $this->authentication->plainlayout();
        $return = array();

        // Get data from POST
        $checklist_detail_id = $this->input->post('checklist_detail_id', true);
        $checklist_id = $this->input->post('checklist_id', true);
        $check_status = $this->input->post('check_status', true); // This will now use master_list_id as the key
        $comment = $this->input->post('comment', true);
        $pattern_name = $this->input->post('pattern_name', true);
        $variant_name = $this->input->post('variant_name', true);
        $size = $this->input->post('size', true);
        $tgl_buat = $this->input->post('tgl_buat', true);
        $check_sub = $this->input->post('check_sub', true);

        $return['valid'] = false;
        $return['status_code'] = 501;
        $return['message'] = "Internal Server Error";

        // Check if checklist_id and check_status are valid
        if ($checklist_id != false && is_array($check_status)) {
            foreach ($check_status as $master_list_id => $status) {
                // If the checklist is selected (with 'yes' in check_status)
                if ($status === 'yes') {
                    if ($checklist_detail_id == true) {
                        $this->rpc_service->setSP("dbo.sp_checklist_edit");
                        $this->rpc_service->addField('checklist_detail_id', (string) $checklist_detail_id); // Convert to string
                    } else {
                        $this->rpc_service->setSP("dbo.sp_checklist_detail_add");
                    }

                    // Convert each field to string before passing it to addField
                    $this->rpc_service->addField('checklist_id', (string) $checklist_id);
                    $this->rpc_service->addField('master_list_id', (string) $master_list_id);
                    $this->rpc_service->addField('check_status', 'yes'); // Save as 'yes' if checked
                    $this->rpc_service->addField('comment', (string) $comment);
                    $this->rpc_service->addField('pattern_name', (string) $pattern_name);
                    $this->rpc_service->addField('variant_name', (string) $variant_name);
                    $this->rpc_service->addField('size', (string) $size);
                    $this->rpc_service->addField('tgl_buat', (string) $tgl_buat);

                    // Check if check_sub is array and process each entry
                    if (is_array($check_sub)) {
                        foreach ($check_sub as $sub) {
                            $this->rpc_service->addField('check_sub', (string) $sub);
                        }
                    } else {
                        $this->rpc_service->addField('check_sub', (string) $check_sub);
                    }

                    $result = $this->rpc_service->resultJSON_pop();

                    if (isset($result) && $result['valid']) {
                        $return['valid'] = true;
                        $return['message'] = "Berhasil menambahkan data";
                    }
                }
            }
        } else {
            $return['valid'] = false;
            $return['message'] = "Data checklist tidak lengkap atau session expired";
        }

        echo json_encode($return);
    }
}
