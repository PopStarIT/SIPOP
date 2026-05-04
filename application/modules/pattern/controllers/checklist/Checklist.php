		<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

		class Checklist extends CI_Controller
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

			function spec_table()
			{
				$this->load->model('main'); // Pastikan model `main` diload
				$spec_data = $this->main->get_spec(); // Tambahkan fungsi di model `main` untuk mengambil data
				return $spec_data;
			}
			function list_table()
			{
				$this->load->model('main'); // Pastikan model `main` diload
				$list_data = $this->main->get_list(); // Tambahkan fungsi di model `main` untuk mengambil data
				return $list_data;
			}

			function checklist_table()
			{
				$view = 'view_checklist';
				$get_field = $this->ecc_library->get_field_pop($view);

				$get_field['r1']['hidden'] = true;
				$get_field['r2']['hidden'] = true;
				$get_field['r3']['hidden'] = false;
				$get_field['r4']['hidden'] = false;
				$get_field['r5']['hidden'] = true;


				return $get_field;
			}

			function checklist_detail_table()
			{
				$view = 'view_checklist_detail';
				$get_field = $this->ecc_library->get_field_pop($view);
				$get_field['r1']['hidden'] = true;
				$get_field['r2']['hidden'] = true;
				$get_field['r3']['hidden'] = true;
				$get_field['r4']['hidden'] = false;
				$get_field['r5']['hidden'] = false;
				$get_field['r6']['hidden'] = false;
				$get_field['r7']['hidden'] = true;
				$get_field['r8']['hidden'] = false;
				$get_field['r9']['hidden'] = true;
				$get_field['r10']['hidden'] = false;

				return $get_field;
			}


			function master_list_table()
			{
				$view = 'view_master_list';
				$get_field = $this->ecc_library->get_field_pop($view);



				return $get_field;
			}








			function index()
			{
				//var_dump('test'):die();
				$this->load->model('main');
				$component['loadlayout'] = true;
				$component['view_load'] = 'checklist/view';
				$component['view_load_form'] = 'checklist/form';
				$component['view_load_form_checklist'] = 'checklist/form_checklist';
				$component['load_js'][] = 'checklist/view';
				$component['load_js'][] = 'checklist/form';
				$component['load_js_checklist'][] = 'checklist/form_checklist';
				$component['master_lists'] = $this->get_master_lists();
				$component['page_title'] = "Master checklist";

				$dashboard_table = array();

				$nav_button = array();
				$nav_button[] = array('method_id' => 781107, 'title' => 'Add', 'icon' => 'fa fa-plus', 'load' => 'checklist/function_add');
				$nav_button[] = array('method_id' => 781108, 'title' => 'Edit', 'icon' => 'fa fa-pencil', 'load' => 'checklist/function_edit');

				$nav_button[] = array('method_id' => 781109, 'title' => 'Delete', 'icon' => 'fa fa-trash-o', 'load' => 'checklist/function_delete');
				$nav_button[] = array('method_id' => 781199, 'title' => 'Download hehe',  'icon' => 'fa fa-download', 'load' => 'checklist/function_download');

				$field = $this->checklist_table();
				$field_master_list = $this->master_list_table();
				$field_spec = $this->spec_table();
				$field_list = $this->list_table();
				$field_checklist_detail = $this->checklist_detail_table();

				$dashboard_table['nav_button'] = $nav_button;
				$dashboard_table['field'] = $field;

				$dashboard_table['field_master_list'] = $field_master_list;
				$dashboard_table['field_master_list_loaddata'] = 'loaddata_master_list';
				$dashboard_table['field_detail'] = $field_checklist_detail;
				$dashboard_table['field_detail_loaddata'] = 'loaddata_checklist_detail';
				$component['field_spec'] = $field_spec;





				$component['field_list'] = $field_list;
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
				$view_spec = 'view_spec';
				$field_spec = $this->spec_table();
				$view_list = 'view_list';
				$field_list = $this->list_table();
				$return = array();
				$return['valid'] = false;
				$return['message'] = "Internal Server Error";

				$loaddata = $this->ecc_library->get_field_data_pop($view, $field, $view_spec, $field_spec, $view_list, $field_list);

				echo $loaddata;
			}

			function loaddata_checklist_detail()
			{
				$this->authentication->plainlayout();

				$id = isset($_REQUEST['id']) ? is_numeric($_REQUEST['id']) ? $_REQUEST['id']  : -1 : -1;
				$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;


				$view = 'view_checklist_detail';
				$field = $this->checklist_detail_table();

				$return = array();
				$return['valid'] = false;
				$return['message'] = "Internal Server Error";




				$extra_param = array();
				$extra_param['where']['0']['field'] = 'r2';
				$extra_param['where']['0']['data'] = $id;
				$extra_param['methodid'] = $methodid;





				$loaddata = $this->ecc_library->get_field_data_pop($view, $field, $extra_param);

				echo $loaddata;
			}



			function loaddata_master_list()
			{
				$this->authentication->plainlayout();

				$view_master_list = 'view_master_list';
				$field_master_list = $this->master_list_table();
				$return = array();
				$return['valid'] = false;
				$return['message'] = "Internal Server Error";

				// Ambil data dari library
				$loaddata = $this->ecc_library->get_field_data_pop($view_master_list, $field_master_list);

				// Pastikan data dalam format yang benar
				if ($loaddata) {
					$return['valid'] = true;
					$return['data'] = $loaddata; // Simpan data ke dalam return
				}

				echo json_encode($return); // Kembalikan data dalam format JSON
			}









			function delete()
			{
				$this->authentication->plainlayout();
				$checklist_id = $this->input->post('checklist_id', true);
				$return = ['valid' => false, 'status_code' => 501, 'message' => "Internal Server Error"];

				if ($checklist_id) {
					$this->rpc_service->setSP("dbo.sp_checklist_delete");
					$this->rpc_service->addField('checklist_id', $checklist_id);
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
				$checklist_id = $this->input->post('checklist_id', true);
				$list = $this->input->post('list', true);
				$status = $this->input->post('status', true);

				$return['valid'] = false;
				$return['status_code'] = 501;
				$return['message'] = "Internal Server Error";

				if ($list !== false) { // Ensure list is not empty
					if ($checklist_id) {
						$this->rpc_service->setSP("dbo.sp_checklist_edit");
						$this->rpc_service->addField('checklist_id', $checklist_id);
					} else {
						$this->rpc_service->setSP("dbo.sp_checklist_add");
						$this->rpc_service->addField('status', 0);
					}

					$this->rpc_service->addField('list', $list);
					$this->rpc_service->addField('status', $status);
					$result = $this->rpc_service->resultJSON_pop();

					if (isset($result)) {
						$return['valid'] = true;
						$return['message'] = "Data successfully added.";
						// Add additional response handling as needed
					} else {
						$return['message'] = "Failed to add data.";
					}
				} else {
					$return['message'] = "List cannot be empty.";
				}

				echo json_encode($return);
			}














			function post_add_edit_detail()
			{
				$this->authentication->plainlayout();
				$return = array();

				// Get data from POST
				$checklist_detail_id = $this->input->post('checklist_detail_id', true);
				$checklist_id = $this->input->post('checklist_id', true);
				$check_status = $this->input->post('check_status', true);
				$comment = $this->input->post('comment', true);
				$size_id = $this->input->post('size_id', true);
				$tgl_buat = $this->input->post('tgl_buat', true);
				$sub_list = $this->input->post('sub_list', true);

				$return['valid'] = false;
				$return['status_code'] = 501;
				$return['message'] = "Internal Server Error";
				// var_dump($checklist_detail_id);
				// die();
				// Check if checklist_id and check_status are valid
				if (
					$checklist_id != false && is_array($check_status)
				) {

					if ($checklist_id != "") {
						$this->load->model('main');
						$where_del = array('checklist_id' => $checklist_id);
						$marker_delete = $this->main->delete_pop('dbo.dt_checklist_detail', $where_del, NULL);
					}





					foreach ($check_status as $master_list_id => $status) {
						if ($status === 'yes') {
							if ($checklist_id === "") {
								$this->rpc_service->setSP("dbo.sp_checklist_detail_edit");
								$this->rpc_service->addField('checklist_id', (string) $checklist_id);
							} else {
								$this->rpc_service->setSP("dbo.sp_checklist_detail_add");
							}

							$this->rpc_service->addField('checklist_id', (string) $checklist_id);
							$this->rpc_service->addField('master_list_id', (string) $master_list_id);
							$this->rpc_service->addField('check_status', 'yes');
							$this->rpc_service->addField('comment', (string) $comment);
							$this->rpc_service->addField('size_id', (string) $size_id);
							$this->rpc_service->addField('tgl_buat', (string) $tgl_buat);

							// Hanya proses sub_list jika master_list_id adalah 23
							if ($master_list_id == '23' && is_array($sub_list)) {
								$sub_list_string = implode(',', array_filter($sub_list, function ($value) {
									return !empty(trim($value));
								}));
								$this->rpc_service->addField('sub_list', $sub_list_string);
							} else {
								$this->rpc_service->addField('sub_list', '');
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





			function download_marker()
			{
				$this->db_pop = $this->load->database('pop', TRUE);
				$this->load->model('main');
				$this->load->library('mainconfig');

				$checklist_id = isset($_POST['checklist_id']) ? $_POST['checklist_id'] : false;
				$format = isset($_POST['format']) ? $_POST['format'] : 'pdf';
				$user_id = $this->session->userdata('user_id');

				$where_del = array('list' => str_replace(',', '', $checklist_id));
				$x = $this->main->getData_pop('dbo.view_checklist', null, $where_del);

				$list = $x[0]['list'];
				$checklist_id2 = $x[0]['checklist_id'];
				$item_code = $x[0]['item_code'];
				$item_name = $x[0]['item_name'];

				// Template setup
				$temp = sys_get_temp_dir() . '\\';
				$host_libreoffice = '127.0.0.1';
				$port_libreoffice = '8080';
				$TEMPLATE_EXT = 'fods';
				$NEWLINE = '<text:line-break/>';
				$unoconv = '"C:/Program Files/LibreOffice 5/program/python.exe" "C:\Program Files\LibreOffice 5\program\unoconv" ' .
					'--connection "socket,host=' . $host_libreoffice . ',port=' . $port_libreoffice . ',tcpNoDelay=1;urp;StarOffice.ComponentContext" ';

				$report_time = date('_Ymd_His');

				if ($format == 'xlsx') {
					$template = 'C:/tmp_sipop/marker/excel/excel_pattern_marker.fods';
					$templateData1 = 'C:/tmp_sipop/marker/excel/excel_master_list_id.fods';
					$templateData2 = 'C:/tmp_sipop/marker/excel/excel_sub_list.fods';
					$templateData3 = 'C:/tmp_sipop/marker/excel/excel_size_id.fods';
					$tmp_ext = 'fods';
					$EXTENSION = 'xlsx';
					$CONTENT_TYPE = 'application/msexcel';
					$CONVERT_TO = 'xlsx';
					$report_name = 'Pattern Marker Excel';
					$EXCEL_NEWLINE = '&#10;'; // Excel new line character in XML
				} else {
					$template = 'C:/tmp_sipop/marker/pdf/pattern_marker.fodt';
					$templateData1 = 'C:/tmp_sipop/marker/pdf/master_list_id.fodt';
					$templateData2 = 'C:/tmp_sipop/marker/pdf/sub_list.fodt';
					$templateData3 = 'C:/tmp_sipop/marker/pdf/size_id.fodt';
					$tmp_ext = 'fodt';
					$EXTENSION = 'pdf';
					$CONTENT_TYPE = 'application/pdf';
					$CONVERT_TO = 'pdf';
					$report_name = 'Pattern Marker PDF';
				}

				$template_doc = file_get_contents($template);
				$template_data1 = file_get_contents($templateData1);
				$template_data2 = file_get_contents($templateData2);
				$template_data3 = file_get_contents($templateData3);

				$q = $this->db_pop->query('
        SELECT *
        FROM dbo.view_checklist_detail
        WHERE checklist_id = ' . $checklist_id2 . '
        ORDER BY
            CASE
                WHEN name = \'JOIN PANEL\' THEN 1
                WHEN name = \'JUMLAH PANEL\' THEN 2
                WHEN name = \'ACCECORIS\' THEN 3
                WHEN name = \'SIZE SPECK\' THEN 4
                ELSE 5
            END,
            name DESC
    ');
				$result = $q->result();

				// Initialize variables
				$value_detail1 = '';
				$value_detail2 = '';
				$value_detail3 = '';
				$first_record = true;
				$size_id = '';
				$uraian = '';
				$tgl_buat = '';
				$comment = '';
				$sub_list_content = '';

				$data_detail1 = array('{master_list_id}', '{check_status}');
				$data_detail2 = array('{sub_list}');
				$data_detail3 = array('{size_id}');

				foreach ($result as $r) {
					if ($first_record) {
						$size_id = $r->size_id;
						$uraian = $r->uraian;
						$tgl_buat = $r->tgl_buat;
						$comment = $r->comment;
						$first_record = false;
					}

					// Store sub_list content if it exists
					if (!empty($r->sub_list)) {
						$sub_list_content = $r->sub_list;
					}

					// Process master_list_id and check_status
					$isi_detail1 = array($r->name, $r->check_status);

					// Add master_list_id entry
					$value_detail1 .= str_replace($data_detail1, $isi_detail1, $template_data1);

					// Add sub_list after ACCECORIS
					if (trim($r->name) === 'ACCECORIS' && !empty($sub_list_content)) {
						// Explode the sub_list_content by commas
						$sub_list_items = explode(',', $sub_list_content);
						$formatted_sub_list = '';

						// Format each item as a separate entry
						foreach ($sub_list_items as $item) {
							$item = trim($item);
							if (!empty($item)) {
								if ($format == 'xlsx') {
									// For Excel format, use the Excel newline character
									$formatted_sub_list .= $item . $EXCEL_NEWLINE;
								} else {
									// For PDF format, use the LibreOffice Writer newline
									$formatted_sub_list .= $item . $NEWLINE;
								}
							}
						}

						// Remove the last line break if it exists
						if ($format == 'xlsx') {
							$formatted_sub_list = rtrim($formatted_sub_list, $EXCEL_NEWLINE);
						} else {
							// For PDF format
							if (substr($formatted_sub_list, -strlen($NEWLINE)) === $NEWLINE) {
								$formatted_sub_list = substr($formatted_sub_list, 0, -strlen($NEWLINE));
							}
						}

						$isi_detail2 = array($formatted_sub_list);
						$value_detail2 = str_replace($data_detail2, $isi_detail2, $template_data2);
						$value_detail1 .= $value_detail2;
					}
				}

				$isi_detail3 = array($uraian);
				$value_detail3 = str_replace($data_detail3, $isi_detail3, $template_data3);

				// Replace template variables
				$data_header = array(
					'{checklist_id}',
					'{tgl_buat}',
					'{item_code}',
					'{item_name}',
					'{data_master_list_id}',
					'{data_check_status}',
					'{data_sub_list}',
					'{uraian}',
					'{comment}'
				);

				$isi_header = array(
					$list,
					$tgl_buat,
					$item_code,
					$item_name,
					$value_detail1,
					'',
					'', // Sub_list already inserted after ACCECORIS
					$value_detail3,
					$comment
				);

				$value_header = str_replace($data_header, $isi_header, $template_doc);

				// Generate output file
				file_put_contents($temp . $report_name . $report_time . '.' . $tmp_ext, $value_header);
				exec(
					$unoconv .
						'-f ' . $CONVERT_TO . ' ' .
						'-o "' . $temp . $report_name . $report_time . '.' . $EXTENSION . '" ' .
						'"' . $temp . $report_name . $report_time . '.' . $tmp_ext . '"'
				);

				$file = $temp . $report_name . $report_time . '.' . $EXTENSION;
				$namafile = $report_name . $report_time . '.' . $EXTENSION;
				unlink($temp . $report_name . $report_time . '.' . $tmp_ext);

				$return['valid'] = true;
				$return['xfile'] = $file;
				$return['namafile'] = $namafile;

				echo json_encode($return);
			}
		}
