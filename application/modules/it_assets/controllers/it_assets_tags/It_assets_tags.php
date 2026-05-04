<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class It_assets_tags extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->data_request = $_REQUEST;
        $this->load->library('tcpdf');

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

    function view_assets_tag()
    {
        $view = 'view_assets_tag';
        $get_field = $this->ecc_library->get_field_pop($view);

        $get_field['r1']['hidden'] = true;
        $get_field['r1']['title'] = 'assets_tags_id';
        $get_field['r1']['width'] = '150';

        $get_field['r2']['hidden'] = false;
        $get_field['r2']['title'] = 'assets_tags_name';
        $get_field['r2']['width'] = '150';

        $get_field['r3']['hidden'] = false;
        $get_field['r3']['title'] = 'assets_tags_desc';
        $get_field['r3']['width'] = '150';


        return $get_field;
    }
    function view_assets_tags_detail()
    {
        $view = 'view_assets_tags_detail';
        $get_field = $this->ecc_library->get_field_pop($view);

        $get_field['r1']['hidden'] = true;
        $get_field['r1']['title'] = 'assets_tags_id';
        $get_field['r1']['width'] = '150';

        $get_field['r2']['hidden'] = false;
        $get_field['r2']['title'] = 'assets_tags_name';
        $get_field['r2']['width'] = '150';

        $get_field['r3']['hidden'] = false;
        $get_field['r3']['title'] = 'assets_tags_desc';
        $get_field['r3']['width'] = '150';

        $get_field['r4']['hidden'] = true;
        $get_field['r4']['title'] = 'out_detail_item_base_id';
        $get_field['r4']['width'] = '150';

        $get_field['r5']['hidden'] = true;
        $get_field['r5']['title'] = 'detail_item_base_id';
        $get_field['r5']['width'] = '150';

        $get_field['r6']['hidden'] = false;
        $get_field['r6']['title'] = 'tgl_keluar';
        $get_field['r6']['width'] = '150';

        $get_field['r7']['hidden'] = false;
        $get_field['r7']['title'] = 'lokasi';
        $get_field['r7']['width'] = '150';

        $get_field['r8']['hidden'] = false;
        $get_field['r8']['title'] = 'damage_status';
        $get_field['r8']['width'] = '150';

        $get_field['r9']['hidden'] = false;
        $get_field['r9']['title'] = 'jml_item_out';
        $get_field['r9']['width'] = '150';

        $get_field['r10']['hidden'] = false;
        $get_field['r10']['title'] = 'serial_number';
        $get_field['r10']['width'] = '150';

        $get_field['r11']['hidden'] = false;
        $get_field['r11']['title'] = 'item_base_code';
        $get_field['r11']['width'] = '150';

        return $get_field;
    }

    function index()
    {
        $this->load->model('main');
        $component['loadlayout'] = true;
        $component['view_load'] = 'it_assets_tags/view';
        $component['view_load_form'] = 'it_assets_tags/form';
        $component['load_js'][] = 'it_assets_tags/view';
        $component['load_js'][] = 'it_assets_tags/form';

        $component['page_title'] = "Master it_assets_tags";

        $dashboard_table = array();

        $nav_button = array();
        $nav_button[] = array('method_id' => 7811130, 'title' => 'Add', 'icon' => 'fa fa-plus', 'load' => 'it_assets_tags/function_add');
        $nav_button[] = array('method_id' => 7811131, 'title' => 'Edit', 'icon' => 'fa fa-pencil', 'load' => 'it_assets_tags/function_edit');
        $nav_button[] = array('method_id' => 7811132, 'title' => 'Delete', 'icon' => 'fa fa-trash-o', 'load' => 'it_assets_tags/function_delete');
        $nav_button[] = array('method_id' => 7811133, 'title' => 'Print', 'icon' => 'fa fa-print', 'load' => 'it_assets_tags/function_print');
        $nav_button[] = array('method_id' => 7811138, 'title' => 'Print QrCode', 'icon' => 'fa fa-qrcode', 'load' => 'it_assets_tags/function_print_barcode');

        $field = $this->view_assets_tag();
        $field_detail = $this->view_assets_tags_detail();

        $dashboard_table['field_loaddata'] = 'loaddata';
        $dashboard_table['field_loaddata_detail'] = 'loaddata_detail';
        $dashboard_table['nav_button'] = $nav_button;
        $dashboard_table['field'] = $field;
        $dashboard_table['field_detail'] = $field_detail;

        $component['dashboard_table'] = $dashboard_table;

        $this->authentication->ajaxlayout($component);
    }

    function loaddata()
    {
        $this->authentication->plainlayout();

        // Get assets_tags_id from REQUEST, with proper validation
        $assets_tags_id = -1;
        // if (isset($_REQUEST['assets_tags_id'])) {
        //     if (is_numeric($_REQUEST['assets_tags_id'])) {
        //         $assets_tags_id = $_REQUEST['assets_tags_id'];
        //     }
        // }

        // Get methodid
        $methodid = isset($_REQUEST['methodid']) ?
            (is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid'] : -1) : -1;

        $view = 'view_assets_tag';
        $field = $this->view_assets_tag();

        $extra_param = array();
        if ($assets_tags_id != -1) {
            $extra_param['where']['0']['field'] = 'assets_tags_id';
            $extra_param['where']['0']['data'] = $assets_tags_id;
        }
        $extra_param['methodid'] = $methodid;

        $load_detail = $this->ecc_library->get_field_data_pop($view, $field, $extra_param);

        echo $load_detail;
    }

    function loaddata_detail()
    {
        $this->authentication->plainlayout();

        // Debug log
        error_log('loaddata_detail called with REQUEST: ' . print_r($_REQUEST, true));

        // Get assets_tags_id dari berbagai sumber
        $assets_tags_id = -1;

        // Prioritas 1: dari parameter ini_assets_tags_id (yang dikirim dari JavaScript)
        if (isset($_REQUEST['ini_assets_tags_id']) && is_numeric($_REQUEST['ini_assets_tags_id'])) {
            $assets_tags_id = $_REQUEST['ini_assets_tags_id'];
        }
        // Prioritas 2: dari parameter assets_tags_id langsung
        elseif (isset($_REQUEST['assets_tags_id']) && is_numeric($_REQUEST['assets_tags_id'])) {
            $assets_tags_id = $_REQUEST['assets_tags_id'];
        }
        // Prioritas 3: dari parameter id (fallback)
        elseif (isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])) {
            $assets_tags_id = $_REQUEST['id'];
        }

        // Debug log
        error_log('Final assets_tags_id: ' . $assets_tags_id);

        // Get methodid
        $methodid = isset($_REQUEST['methodid']) ?
            (is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid'] : -1) : -1;

        $view = 'view_assets_tags_detail';
        $field = $this->view_assets_tags_detail();

        $extra_param = array();

        // Hanya tambahkan filter WHERE jika assets_tags_id valid (bukan -1)
        if ($assets_tags_id != -1) {
            $extra_param['where']['0']['field'] = 'r1'; // r1 adalah assets_tags_id di view
            $extra_param['where']['0']['data'] = $assets_tags_id;
        } else {
            // Jika -1, buat kondisi yang tidak akan mengembalikan data (untuk mengosongkan grid)
            $extra_param['where']['0']['field'] = 'r1';
            $extra_param['where']['0']['data'] = -999; // ID yang tidak mungkin ada
        }

        $extra_param['methodid'] = $methodid;

        // Debug log
        error_log('Extra param: ' . print_r($extra_param, true));

        $load_detail = $this->ecc_library->get_field_data_pop($view, $field, $extra_param);

        echo $load_detail;
    }

    function post_add_edit()
    {
        $this->authentication->plainlayout();

        // Always disable CSRF checking for this specific action
        $this->config->set_item('csrf_protection', FALSE);

        $return = array('valid' => false, 'status_code' => 501, 'message' => "Internal Server Error");

        $assets_tags_id = $this->input->post('assets_tags_id', true);
        $assets_tags_name = $this->input->post('assets_tags_name', true);
        $assets_tags_desc = $this->input->post('assets_tags_desc', true);

        // Validate required fields
        if (empty($assets_tags_name) || empty($assets_tags_desc)) {
            $return['valid'] = false;
            $return['status_code'] = 400;
            $return['message'] = "All fields are required";
            echo json_encode($return);
            return;
        }

        if ($assets_tags_id) {
            $this->rpc_service->setSP("dbo.sp_assets_tags_edit");
            $this->rpc_service->addField('assets_tags_id', $assets_tags_id);
        } else {
            $this->rpc_service->setSP("dbo.sp_assets_tags_add");
        }

        $this->rpc_service->addField('assets_tags_name', $assets_tags_name);
        $this->rpc_service->addField('assets_tags_desc', $assets_tags_desc);

        $result = $this->rpc_service->resultJSON_pop();

        if (isset($result)) {
            if (isset($result['valid']) && $result['valid']) {
                $data_result = json_decode($result['data'], true);
                if ($data_result && isset($data_result['keterangan'])) {
                    $return['keterangan'] = $data_result['keterangan'];
                }
                $return['valid'] = $result['valid'];
                $return['status_code'] = $result['no'];
                $return['message'] = $result['des'];
            } else {
                $return['valid'] = false;
                $return['status_code'] = isset($result['no']) ? $result['no'] : 501;
                $return['message'] = isset($result['des']) ? $result['des'] : "Database operation failed";
            }
        }

        // Generate new CSRF token and include it in the response
        $this->config->set_item('csrf_protection', TRUE); // Re-enable CSRF for future requests
        $return['csrf_token_name'] = $this->security->get_csrf_token_name();
        $return['csrf_token_hash'] = $this->security->get_csrf_hash();

        echo json_encode($return);
    }

    function delete()
    {
        $this->authentication->plainlayout();

        // Disable CSRF protection for this specific action
        $this->config->set_item('csrf_protection', FALSE);

        $return = array();
        $return['valid'] = false;
        $return['status_code'] = 501;
        $return['message'] = "Internal Server Error";

        $assets_tags_id = $this->input->post('assets_tags_id', true);

        if (empty($assets_tags_id)) {
            $return['valid'] = false;
            $return['status_code'] = 400;
            $return['message'] = "Invalid asset tag ID";
            echo json_encode($return);
            return;
        }

        $this->rpc_service->setSP("dbo.sp_assets_tags_delete");
        $this->rpc_service->addField('assets_tags_id', $assets_tags_id);
        $result = $this->rpc_service->resultJSON_pop();

        if (isset($result)) {
            if (isset($result['valid'])) {
                if ($result['valid']) {
                    $return['valid'] = $result['valid'];
                    $return['status_code'] = $result['no'];
                    $return['message'] = $result['des'];
                } else {
                    $return['status_code'] = $result['no'];
                    $return['message'] = $result['des'];
                }
            }
        }

        // Generate new CSRF token and include it in the response
        $this->config->set_item('csrf_protection', TRUE); // Re-enable CSRF for future requests
        $return['csrf_token_name'] = $this->security->get_csrf_token_name();
        $return['csrf_token_hash'] = $this->security->get_csrf_hash();

        echo json_encode($return);
    }

    function print_assets_tags()
    {
        $this->db_pop = $this->load->database('pop', TRUE);
        $this->load->model('main');
        $this->load->library('mainconfig');

        // Validasi input parameter
        $assets_tags_id = isset($_POST['assets_tags_id']) ? $_POST['assets_tags_id'] : false;
        $format = isset($_POST['format']) ? $_POST['format'] : 'pdf';
        $user_id = $this->session->userdata('user_id');

        // Validasi assets_tags_id
        if (!$assets_tags_id || empty($assets_tags_id)) {
            $return['valid'] = false;
            $return['message'] = 'Assets Tags ID tidak boleh kosong';
            echo json_encode($return);
            return;
        }

        // Bersihkan input dari karakter yang tidak diinginkan
        $clean_assets_tags_id = str_replace(',', '', $assets_tags_id);

        // Validasi bahwa ID adalah numerik (jika seharusnya numerik)
        if (!is_numeric($clean_assets_tags_id)) {
            $return['valid'] = false;
            $return['message'] = 'Assets Tags ID harus berupa angka';
            echo json_encode($return);
            return;
        }

        try {
            // Ambil data assets tags berdasarkan ID
            $where_del = array('assets_tags_id' => $clean_assets_tags_id);
            $x = $this->main->getData_pop('dbo.view_assets_tag', null, $where_del);

            // Validasi apakah data ditemukan
            if (empty($x) || !isset($x[0])) {
                $return['valid'] = false;
                $return['message'] = 'Data Assets Tags tidak ditemukan';
                echo json_encode($return);
                return;
            }

            $assets_tags_name = $x[0]['assets_tags_name'];
            $assets_tags_id2 = $x[0]['assets_tags_id'];
            $assets_tags_desc = isset($x[0]['assets_tags_desc']) ? $x[0]['assets_tags_desc'] : '';

            // Template setup
            $temp = sys_get_temp_dir() . DIRECTORY_SEPARATOR;
            $host_libreoffice = '127.0.0.1';
            $port_libreoffice = '8080';
            $TEMPLATE_EXT = 'fods';
            $NEWLINE = '<text:line-break/>';
            $unoconv = '"C:/Program Files/LibreOffice 5/program/python.exe" "C:\Program Files\LibreOffice 5\program\unoconv" ' .
                '--connection "socket,host=' . $host_libreoffice . ',port=' . $port_libreoffice . ',tcpNoDelay=1;urp;StarOffice.ComponentContext" ';

            $report_time = date('_Ymd_His');

            if ($format == 'xlsx') {
                $template = 'C:/tmp_sipop/assets_tags/excel/excel_assets_tags_template.fods';
                $templateData1 = 'C:/tmp_sipop/assets_tags/excel/excel_master_assets_tags.fods';

                $tmp_ext = 'fods';
                $EXTENSION = 'xlsx';
                $CONTENT_TYPE = 'application/msexcel';
                $CONVERT_TO = 'xlsx';
                $report_name = 'Pattern_assets_tags_Excel';
                $EXCEL_NEWLINE = '&#10;';
            } else {
                $template = 'C:/tmp_sipop/assets_tags/pdf/assets_tags_template.fodt';
                $templateData1 = 'C:/tmp_sipop/assets_tags/pdf/master_assets_tags.fodt';

                $tmp_ext = 'fodt';
                $EXTENSION = 'pdf';
                $CONTENT_TYPE = 'application/pdf';
                $CONVERT_TO = 'pdf';
                $report_name = 'Pattern_assets_tags_PDF';
            }

            // Validasi keberadaan file template
            if (!file_exists($template)) {
                $return['valid'] = false;
                $return['message'] = 'Template file tidak ditemukan: ' . $template;
                echo json_encode($return);
                return;
            }

            if (!file_exists($templateData1)) {
                $return['valid'] = false;
                $return['message'] = 'Template data file tidak ditemukan: ' . $templateData1;
                echo json_encode($return);
                return;
            }

            $template_doc = file_get_contents($template);
            $template_data1 = file_get_contents($templateData1);

            // Validasi template berhasil dibaca
            if ($template_doc === false || $template_data1 === false) {
                $return['valid'] = false;
                $return['message'] = 'Gagal membaca file template';
                echo json_encode($return);
                return;
            }

            // Query untuk mengambil detail assets tags dengan validasi ID
            $sql = "SELECT * 
                FROM dbo.view_assets_tags_detail 
                WHERE assets_tags_id = ? 
                ORDER BY 
                    CASE 
                        WHEN assets_tags_name = 'DIDUT' THEN 1 
                        ELSE 2 
                    END,
                    assets_tags_name DESC";

            $q = $this->db_pop->query($sql, array($assets_tags_id2));

            if (!$q) {
                $return['valid'] = false;
                $return['message'] = 'Gagal menjalankan query database';
                echo json_encode($return);
                return;
            }

            $result = $q->result();

            // Debug: Log jumlah data yang ditemukan
            log_message('debug', 'Jumlah data ditemukan: ' . count($result));

            // Initialize variables
            $value_detail1 = '';
            $first_record = true;

            // PERBAIKAN UTAMA: Template replacement yang lebih komprehensif
            // Definisikan semua placeholder yang mungkin ada di template detail
            $data_detail_placeholders = array(
                '{assets_tags_name}',
                '{assets_tags_desc}',
                '{lokasi}',
                '{damage_status}',
                '{jml_item_out}',
                '{serial_number}',
                '{item_base_code}',
                '{tgl_keluar}',
                '{master_assets_tags}' // placeholder asli
            );

            // Proses setiap record dari database
            foreach ($result as $r) {
                if ($first_record) {
                    $first_record = false;
                }

                // PERBAIKAN: Ambil semua data dari record dan handle nilai kosong
                $record_data = array(
                    isset($r->assets_tags_name) ? $r->assets_tags_name : '',
                    isset($r->assets_tags_desc) ? $r->assets_tags_desc : '',
                    isset($r->lokasi) ? $r->lokasi : '',
                    isset($r->damage_status) ? $r->damage_status : '',
                    isset($r->jml_item_out) ? $r->jml_item_out : '',
                    isset($r->serial_number) ? $r->serial_number : '',
                    isset($r->item_base_code) ? $r->item_base_code : '',
                    isset($r->tgl_keluar) ? $r->tgl_keluar : '',
                    isset($r->assets_tags_name) ? $r->assets_tags_name : '' // untuk master_assets_tags
                );

                // Replace semua placeholder dengan data sebenarnya
                $current_template = $template_data1;
                $current_template = str_replace($data_detail_placeholders, $record_data, $current_template);

                $value_detail1 .= $current_template;

                // Debug: Log setiap record yang diproses
                log_message('debug', 'Processing record: ' . json_encode($r));
            }

            // Jika tidak ada data detail, buat pesan kosong
            if (empty($result)) {
                $value_detail1 = 'Tidak ada data detail ditemukan untuk Assets Tags ID: ' . $assets_tags_id2;
            }

            // PERBAIKAN: Replace template variables header dengan data yang benar
            $data_header = array(
                '{assets_tags_id}',
                '{assets_tags_name}',
                '{assets_tags_desc}',
                '{data_assets_tags}',    // placeholder asli dari kode sebelumnya
                '{data_master_tags}',    // placeholder dari kode yang diperbaiki
                '{master_data}',         // kemungkinan placeholder lain
                '{detail_data}'          // kemungkinan placeholder lain
            );

            $isi_header = array(
                $assets_tags_id2,
                $assets_tags_name,
                $assets_tags_desc,
                $value_detail1,  // untuk {data_assets_tags}
                $value_detail1,  // untuk {data_master_tags}
                $value_detail1,  // untuk {master_data}
                $value_detail1   // untuk {detail_data}
            );

            // Replace header template
            $value_header = str_replace($data_header, $isi_header, $template_doc);

            // TAMBAHAN: Double check untuk placeholder yang mungkin terlewat
            // Cari semua placeholder yang masih tersisa dalam format {xxx}
            if (preg_match_all('/\{([^}]+)\}/', $value_header, $matches)) {
                log_message('debug', 'Placeholder yang belum diganti: ' . json_encode($matches[0]));

                // Ganti semua placeholder yang tersisa dengan string kosong atau nilai default
                foreach ($matches[0] as $placeholder) {
                    $value_header = str_replace($placeholder, '', $value_header);
                }
            }

            // Debug: Log template final
            log_message('debug', 'Template final length: ' . strlen($value_header));

            // Buat direktori temp jika belum ada
            if (!is_dir($temp)) {
                mkdir($temp, 0755, true);
            }

            // Generate output file
            $temp_file = $temp . $report_name . $report_time . '.' . $tmp_ext;
            $output_file = $temp . $report_name . $report_time . '.' . $EXTENSION;

            if (file_put_contents($temp_file, $value_header) === false) {
                $return['valid'] = false;
                $return['message'] = 'Gagal menulis file temporary';
                echo json_encode($return);
                return;
            }

            // Debug: Log ukuran file yang ditulis
            log_message('debug', 'File temporary size: ' . filesize($temp_file) . ' bytes');

            // Convert file menggunakan LibreOffice
            $command = $unoconv .
                '-f ' . $CONVERT_TO . ' ' .
                '-o "' . $output_file . '" ' .
                '"' . $temp_file . '"';

            // Debug: Log command yang dijalankan
            log_message('debug', 'LibreOffice command: ' . $command);

            exec($command, $output, $return_code);

            // Debug: Log hasil konversi
            log_message('debug', 'Conversion return code: ' . $return_code);
            log_message('debug', 'Conversion output: ' . json_encode($output));

            // Cek apakah konversi berhasil
            if ($return_code !== 0 || !file_exists($output_file)) {
                // Bersihkan file temporary
                if (file_exists($temp_file)) {
                    unlink($temp_file);
                }

                $return['valid'] = false;
                $return['message'] = 'Gagal mengkonversi file ke format ' . $EXTENSION . '. Return code: ' . $return_code;
                echo json_encode($return);
                return;
            }

            $file = $output_file;
            $namafile = $report_name . $report_time . '.' . $EXTENSION;

            // Bersihkan file temporary
            if (file_exists($temp_file)) {
                unlink($temp_file);
            }

            $return['valid'] = true;
            $return['xfile'] = $file;
            $return['namafile'] = $namafile;
            $return['message'] = 'File berhasil dibuat';

            // Debug: Log hasil akhir
            log_message('debug', 'Final file: ' . $file);
            log_message('debug', 'Final file size: ' . filesize($file) . ' bytes');
        } catch (Exception $e) {
            $return['valid'] = false;
            $return['message'] = 'Terjadi kesalahan: ' . $e->getMessage();
            log_message('error', 'Error in print_assets_tags: ' . $e->getMessage());
        }

        echo json_encode($return);
    }
}
