<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Loader extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{


		$param = isset($_POST['param']) ? $_POST['param'] : '';
		$param_pop = isset($_POST['param_pop']) ? $_POST['param_pop'] : '';
		$q = isset($_REQUEST['q']) ? htmlentities($_REQUEST['q']) : false;
		$id = isset($_REQUEST['id']) ? htmlentities($_REQUEST['id']) : false;
		$item_code = isset($_REQUEST['item_code']) ? htmlentities($_REQUEST['item_code']) : '';
		//var_dump($id);
		//var_dump($param);
		//print_r($item_code);
		$return = array();

		$view_list = array();
		$view_list['date_format'] = array('view' => 'dbo.view_list_date_format');
		$view_list['month'] = array('view' => 'dbo.view_list_month', 'order' => 'id');
		$view_list['gender'] = array('view' => 'dbo.view_list_pilih_gender', 'order' => 'value');
		$view_list['plh_karyawan'] = array('view' => 'dbo.view_list_pilih_karyawan', 'order' => 'value');
		$view_list['plh_divisi'] = array('view' => 'dbo.view_list_pilih_divisi', 'order' => 'value');


		// Ini Dari Haris
		$view_list['style_spec_detail'] = array('view' => 'dbo.view_list_pilih_spec', 'order' => 'text');
		$view_list['pilih_list_style'] = array('view' => 'dbo.view_list_style', 'order' => 'value');


		$view_list['data_pilih_list_style'] = array('view' => 'dbo.view_list_pilih_style_marker', 'order' => 'value');


		//$view_list['plh_karyawan'] = array('view' => 'dbo.view_list_karyawan', 'order'=>'value');
		$view_list['plh_departement'] = array('view' => 'dbo.view_list_pilih_departement', 'order' => 'value');
		$view_list['plh_status'] = array('view' => 'dbo.view_list_pilih_status_karyawan', 'order' => 'value');
		$view_list['plh_jabatan'] = array('view' => 'dbo.view_list_pilih_jabatan', 'order' => 'value');
		$view_list['plh_agama'] = array('view' => 'dbo.view_list_pilih_agama', 'order' => 'value');
		$view_list['plh_nikah'] = array('view' => 'dbo.view_list_pilih_nikah', 'order' => 'value');
		$view_list['plh_status_keluarga'] = array('view' => 'dbo.view_list_pilih_status_keluarga', 'order' => 'value');
		$view_list['plh_group'] = array('view' => 'dbo.view_list_pilih_group', 'order' => 'value');
		$view_list['plh_dokumen'] = array('view' => 'dbo.view_list_pilih_dokumen', 'order' => 'value');
		$view_list['plh_jam'] = array('view' => 'dbo.view_list_pilih_jam', 'order' => 'value');
		$view_list['plh_keterangan'] = array('view' => 'dbo.view_list_pilih_keterangan', 'order' => 'value');
		$view_list['plh_keterangan_absen'] = array('view' => 'dbo.view_list_pilih_keterangan_absen', 'order' => 'value');
		$view_list['currencies'] = array('view' => 'dbo.view_list_currencies', 'order' => 'value');
		$view_list['currencies_rate'] = array('view' => 'dbo.view_list_currencies_rate', 'order' => 'value');
		$view_list['gl_account'] = array('view' => 'dbo.view_list_gl_account', 'order' => 'value');
		$view_list['currencies_all'] = array('view' => 'dbo.view_list_currencies_all', 'order' => 'value');
		$view_list['tax_type'] = array('view' => 'dbo.view_list_tax_type', 'order' => 'value');
		$view_list['tax_item'] = array('view' => 'dbo.view_list_tax_item', 'order' => 'value');
		$view_list['uom'] = array('view' => 'dbo.view_list_uom', 'order' => 'value');
		$view_list['type_location'] = array('view' => 'dbo.view_list_type_location', 'order' => 'value');
		$view_list['location_base'] = array('view' => 'dbo.view_list_location_base', 'order' => 'value');
		$view_list['mb_flag'] = array('view' => 'dbo.view_list_mb_flag', 'order' => 'value');
		$view_list['custom_item_type'] = array('view' => 'dbo.view_list_custom_item_type', 'order' => 'value');
		$view_list['item_category'] = array('view' => 'dbo.view_list_item_category', 'order' => 'value');
		$view_list['custom_item_kite_type'] = array('view' => 'dbo.view_list_custom_item_kite_type', 'order' => 'value');
		$view_list['item_base'] = array('view' => 'dbo.view_list_item_base', 'order' => 'value');
		$view_list['item_fixed_asset'] = array('view' => 'dbo.view_list_item_fixed_asset', 'order' => 'value');
		$view_list['depriciation_method'] = array('view' => 'dbo.view_list_depriciation_method', 'order' => 'value');
		$view_list['warehouse'] = array('view' => 'dbo.view_list_warehouse', 'order' => 'value');
		$view_list['warehouse_old'] = array('view' => 'dbo.view_list_warehouse_old', 'order' => 'value');
		$view_list['work_center'] = array('view' => 'dbo.view_list_work_center', 'order' => 'value');
		$view_list['manufacture_item'] = array('view' => 'dbo.view_list_manufacture_item', 'order' => 'value');
		$view_list['item_detail'] = array('view' => 'dbo.view_list_item_detail', 'order' => 'value');
		$view_list['fabric_colour'] = array('view' => 'dbo.view_list_fabric_colour', 'order' => 'value');
		$view_list['warehouse_ecc'] = array('view' => 'dbo.view_list_warehouse_ecc', 'order' => 'value');
		// $view_list['get_item_location'] = array('view' => 'dbo.list_item_location', 'order' => 'value');


		$view_list['item_it_assets'] = array('view' => 'dbo.view_list_item_it_assets', 'order' => 'value');
		$view_list['item_it_assets_user'] = array('view' => 'dbo.view_list_user_assets', 'order' => 'value');
		$view_list['item_it_user'] = array('view' => 'dbo.view_list_item_base_user', 'order' => 'value');



		$view_list['list_pilih_line_task_assignment'] = array('view' => 'dbo.view_list_pilih_line_task_assignment', 'order' => 'value');
		$view_list['list_style_no_task_assignment'] = array('view' => 'dbo.view_list_style_no_task_assignment', 'order' => 'value');





		$view_list['work_process'] = array('view' => 'dbo.view_list_work_process', 'order' => 'value');
		$view_list['bom'] = array('view' => 'dbo.view_list_bom', 'order' => 'value');
		$view_list['country'] = array('view' => 'dbo.view_list_country', 'order' => 'value');
		$view_list['kppbc'] = array('view' => 'dbo.view_list_kppbc', 'order' => 'value');
		$view_list['identity'] = array('view' => 'dbo.view_list_identity', 'order' => 'id');
		$view_list['partner_api'] = array('view' => 'dbo.view_list_partner_api', 'order' => 'id');
		$view_list['supplier'] = array('view' => 'dbo.view_list_supplier', 'order' => 'value');
		$view_list['customer'] = array('view' => 'dbo.view_list_customer', 'order' => 'value');
		$view_list['partner'] = array('view' => 'dbo.view_list_partner', 'order' => 'value');
		$view_list['purchase_order_type_purchase'] = array('view' => 'dbo.view_list_purchase_order_type_purchase', 'order' => 'value');
		$view_list['purchase_order_type_memo'] = array('view' => 'dbo.view_list_purchase_order_type_memo', 'order' => 'value');
		$view_list['purchase_order_type_fixed_asset'] = array('view' => 'dbo.view_list_purchase_order_type_fixed_asset', 'order' => 'value');
		$view_list['sales_order_type_sales'] = array('view' => 'dbo.view_list_sales_order_type_sales', 'order' => 'value');
		$view_list['sales_order_type_memo'] = array('view' => 'dbo.view_list_sales_order_type_memo', 'order' => 'value');
		$view_list['bom_process'] = array('view' => 'dbo.view_list_bom_process', 'order' => 'value');
		$view_list['work_order_plan'] = array('view' => 'dbo.view_list_work_order_plan', 'order' => 'value');
		$view_list['work_order_item'] = array('view' => 'dbo.view_list_work_order_item', 'order' => 'value');
		$view_list['work_order_detail_process'] = array('view' => 'dbo.view_list_work_order_detail_process', 'order' => 'value');
		$view_list['work_order_request'] = array('view' => 'dbo.view_list_work_order_request', 'order' => 'value');
		$view_list['bank'] = array('view' => 'dbo.view_list_bank', 'order' => 'value');
		$view_list['bank_trans_type_deposit'] = array('view' => 'dbo.view_list_bank_trans_type_deposit', 'order' => 'value');
		$view_list['grn_custom'] = array('view' => 'dbo.view_list_grn_custom', 'order' => 'value');
		$view_list['grn_purchase'] = array('view' => 'dbo.view_list_grn_purchase', 'order' => 'value');
		$view_list['manufacture_item_with_bom_process'] = array('view' => 'dbo.view_list_manufacture_item_with_bom_process', 'order' => 'value');
		$view_list['jenis_tarif'] = array('view' => 'dbo.view_list_jenis_tarif', 'order' => 'id');
		$view_list['tax_group'] = array('view' => 'dbo.view_list_tax_group', 'order' => 'id');
		$view_list['hs_code'] = array('view' => 'dbo.view_list_hs', 'order' => 'id');
		$view_list['gl_tag'] = array('view' => 'dbo.view_list_gl_tag', 'order' => 'value');
		$view_list['calculate_type'] = array('view' => 'dbo.view_list_calculate_type', 'order' => 'id');
		$view_list['gl_account_section'] = array('view' => 'dbo.view_list_gl_account_section', 'order' => 'id');
		$view_list['gl_account_group'] = array('view' => 'dbo.view_list_gl_account_group', 'order' => 'value');
		$view_list['cashflow'] = array('view' => 'dbo.view_list_cashflow', 'order' => 'id');
		$view_list['contract_subcon_type'] = array('view' => 'dbo.view_list_contract_subcon_type', 'order' => 'id');
		$view_list['contract_subcon'] = array('view' => 'dbo.view_list_contract_subcon', 'order' => 'id');
		$view_list['item_cmt'] = array('view' => 'dbo.view_list_item_cmt', 'order' => 'id');
		$view_list['item_scrap'] = array('view' => 'dbo.view_list_item_scrap', 'order' => 'id');
		$view_list['item_reject'] = array('view' => 'dbo.view_list_item_reject', 'order' => 'id');
		$view_list['security_token'] = array('view' => 'dbo.view_list_security_token', 'order' => 'value');
		$view_list['work_process_user'] = array('view' => 'dbo.view_list_work_process_user', 'order' => 'value', 'where' => array(0 => array('field' => 'user_id', 'value' => $this->session->userdata('user_id'))));
		$view_list['security_role'] = array('view' => 'dbo.view_list_security_role', 'order' => 'value');
		$view_list['user_status'] = array('view' => 'dbo.view_list_user_status', 'order' => 'value');
		$view_list['work_order_plan_type'] = array('view' => 'dbo.view_list_work_order_plan_type', 'order' => 'id');
		$view_list['contract_subcon_plan'] = array('view' => 'dbo.view_list_contract_subcon_plan', 'order' => 'id');
		$view_list['sales_order_plan'] = array('view' => 'dbo.view_list_sales_order_plan', 'order' => 'id');
		$view_list['work_order_production_type'] = array('view' => 'dbo.view_list_work_order_production_type', 'order' => 'id');
		$view_list['contract_subcon_production'] = array('view' => 'dbo.view_list_contract_subcon_production', 'order' => 'id');
		$view_list['work_order_costing_type'] = array('view' => 'dbo.view_list_work_order_costing_type', 'order' => 'id');
		$view_list['bank_trans_type_payment'] = array('view' => 'dbo.view_list_bank_trans_type_payment', 'key' => 'bank_trans_type_id');
		$view_list['port'] = array('view' => 'dbo.view_list_port', 'key' => 'port_id');
		$view_list['tujuan_tpb'] = array('view' => 'dbo.view_list_tujuan_tpb', 'key' => 'tujuan_tpb_id');
		$view_list['jenis_tpb'] = array('view' => 'dbo.view_list_jenis_tpb', 'key' => 'jenis_tpb_id');
		$view_list['tujuan_pengiriman'] = array('view' => 'dbo.view_list_tujuan_pengiriman', 'key' => 'tujuan_pengiriman_id');
		$view_list['tujuan_pemasukan'] = array('view' => 'dbo.view_list_tujuan_pemasukan', 'key' => 'tujuan_pemasukan_id');
		$view_list['cara_angkut'] = array('view' => 'dbo.view_list_cara_angkut', 'key' => 'cara_angkut_id');
		$view_list['tps'] = array('view' => 'dbo.view_list_tps', 'key' => 'tps_id');
		$view_list['insurance_type'] = array('view' => 'dbo.view_list_insurance_type', 'key' => 'insurance_type_id');
		$view_list['price_type'] = array('view' => 'dbo.view_list_price_type', 'key' => 'price_type_id');
		$view_list['pjt_status'] = array('view' => 'dbo.view_list_pjt_status', 'key' => 'pjt_status_id');
		$view_list['kategori_barang'] = array('view' => 'dbo.view_list_kategori_barang', 'key' => 'kategori_barang_id');
		$view_list['package'] = array('view' => 'dbo.view_list_package', 'key' => 'package_id');
		$view_list['fasilitas'] = array('view' => 'dbo.view_list_fasilitas', 'key' => 'fasilitas_id');
		$view_list['skema_tarif'] = array('view' => 'dbo.view_list_skema_tarif', 'key' => 'skema_tarif_id');
		$view_list['app_trans'] = array('view' => 'dbo.view_list_app_trans', 'key' => 'app_trans_id');
		$view_list['custom_item_kite_type_report'] = array('view' => 'dbo.view_list_custom_item_kite_type_report', 'key' => 'custom_item_kite_type_id');
		$view_list['voucher_type'] = array('view' => 'dbo.view_list_voucher_type', 'key' => 'app_trans_id');
		$view_list['jenis_ekspor'] = array('view' => 'dbo.view_list_jenis_ekspor', 'key' => 'jenis_ekspor_id');
		$view_list['kategori_ekspor'] = array('view' => 'dbo.view_list_kategori_ekspor', 'key' => 'kategori_ekspor_id');
		$view_list['cara_perdagangan'] = array('view' => 'dbo.view_list_cara_perdagangan', 'key' => 'cara_perdagangan_id');
		$view_list['cara_pembayaran_peb'] = array('view' => 'dbo.view_list_cara_pembayaran_peb', 'key' => 'cara_pembayaran_id');
		$view_list['cara_pembayaran_ceisa'] = array('view' => 'dbo.view_list_cara_pembayaran_ceisa', 'key' => 'cara_pembayaran_id');
		$view_list['username'] = array('view' => 'dbo.view_list_username', 'order' => 'value');
		$view_list['size'] = array('view' => 'dbo.view_list_pilih_size', 'order' => 'id');
		$view_list['defect_cause'] = array('view' => 'dbo.view_list_defect_cause_task_assignment', 'order' => 'text');
		$view_list['defect_parts'] = array('view' => 'dbo.view_list_defect_parts_task_assignment', 'order' => 'text');
		$view_list['sub_style'] = array('view' => 'dbo.view_list_pilih_sub_style', 'order' => 'id');
		$view_list['model_spec'] = array('view' => 'dbo.view_list_pilih_model_spec', 'order' => 'id');
		$view_list['assets_tags'] = array('view' => 'dbo.view_list_assets_tags', 'key' => 'assets_tags_id');
		$view_list['performa_invoice'] = array('view' => 'dbo.dt_sales_performa', 'key' => 'sales_performa_id');
		$view_list['group_specification'] = array('view' => 'dbo.view_list_specification_group', 'order' => 'value');
		$view_list['production_plan'] = array('view' => 'dbo.view_list_production_plan', 'order' => 'id');
		$view_list['data_list_po_warehouse_new'] = array('view' => 'dbo.view_list_purchase_order_new', 'order' => 'id');
		$view_list['view_uom_fabric_location'] = array('view' => 'dbo.view_list_uom_fabric_location', 'order' => 'text');

		$view_list['data_list_po_warehouse'] = array('view' => 'dbo.view_list_purchase_order_new', 'order' => 'id');
		$view_list['data_list_po_warehouse_fabric_location'] = array('view' => 'dbo.view_list_purchase_order_new_fabric_location', 'order' => 'id');


		$view_list['data_list_po_warehouse_fix'] = array('view' => 'dbo.view_list_po_warehouse_ecc', 'order' => 'id');
		$view_list['list_po_warehouse_shipment'] = array('view' => 'dbo.view_list_po_warehouse_shipment', 'order' => 'id');
		$view_list['data_list_fabric_receive'] = array('view' => 'dbo.view_list_fabric_shipment', 'order' => 'id');
		$view_list['data_fabric_transfer_return_select'] = array(
			'view' => 'dbo.view_work_order_plan_fabric_return',
			'order' => 'id',
			'limit' => 1
		);
		$view_list['data_fabric_return_ecc'] = array(
			'view' => 'dbo.view_work_order_return_ecc',
			'order' => 'id',
			'limit' => 1
		);
		//$view_list['supplier'] = array('view' => 'dbo.view_list_supplier', 'order'=>'value');

		$view_list['invoice_assets'] = array('view' => 'dbo.view_list_invoice_assets', 'order' => 'value');



		$view_list['data_style_no_task_assignment'] = array(
			'view' => 'dbo.view_style_no_task_assignment',
			'order' => 'text',
			'where' => array(
				array(
					'field' => 'line_id',
					'value' => $this->session->userdata('user_id')
				)
			)
		);

		//ceisa40
		$view_list['jenis_jaminan_ceisa'] = array('view' => 'dbo.view_list_jenis_jaminan', 'key' => 'id');
		$view_list['ceisa_document'] = array('view' => 'dbo.view_list_ref_ceisa_document', 'order' => 'value');
		$view_list['ceisa_fasilitas'] = array('view' => 'dbo.view_list_ref_ceisa_fasilitas', 'order' => 'value');
		$view_list['ceisa_tipe_kontainer'] = array('view' => 'dbo.view_list_ceisa_tipe_kontainer', 'order' => 'value');
		$view_list['ceisa_jenis_kontainer'] = array('view' => 'dbo.view_list_ceisa_jenis_kontainer', 'order' => 'value');
		$view_list['ceisa_ukuran_kontainer'] = array('view' => 'dbo.view_list_ceisa_ukuran_kontainer', 'order' => 'value');
		$view_list['ceisa_tutup_pu'] = array('view' => 'dbo.view_list_ceisa_tutup_pu', 'order' => 'value');
		$view_list['ceisa_kena_pajak'] = array('view' => 'dbo.view_list_ref_ceisa_kena_pajak', 'order' => 'value');
		$view_list['ceisa_asal_bahanbaku'] = array('view' => 'dbo.view_list_ref_ceisa_bahanbaku_asal', 'order' => 'value');
		$view_list['ceisa_cara_perhitungan'] = array('view' => 'dbo.view_list_ref_ceisa_cara_perhitungan', 'order' => 'value');
		$view_list['ceisa_lokasi_periksa'] = array('view' => 'dbo.view_list_ref_ceisa_lokasi_periksa', 'order' => 'value');
		$view_list['ceisa_daerah_asal'] = array('view' => 'dbo.view_list_ref_ceisa_daerah_asal', 'order' => 'value');
		$view_list['ceisa_bank_devisa'] = array('view' => 'dbo.view_list_ceisa_bank_devisa', 'order' => 'value');
		$view_list['ceisa_partner_type'] = array('view' => 'dbo.view_list_ceisa_partner_tipe', 'order' => 'value');
		$view_list['ceisa_jenis_barang_pkb'] = array('view' => 'dbo.view_list_ref_ceisa_jenis_barang', 'order' => 'value');
		$view_list['ceisa_jenis_gudang_pkb'] = array('view' => 'dbo.view_list_ref_ceisa_gudang_periksa', 'order' => 'value');
		$view_list['ceisa_cara_stuffing_pkb'] = array('view' => 'dbo.view_list_ref_ceisa_cara_stuffing', 'order' => 'value');
		$view_list['ceisa_jenis_partof_pkb'] = array('view' => 'dbo.view_list_ref_ceisa_part_of', 'order' => 'value');
		$view_list['ceisa_tarif_fasilitas'] = array('view' => 'dbo.view_list_ref_ceisa_tarif_fasilitas', 'order' => 'value');
		$view_list['ceisa_kode_kondisi_barang'] = array('view' => 'dbo.view_list_ceisa_kondisi_barang', 'order' => 'value');
		$view_list['tujuan_pengiriman_40_41'] = array('view' => 'dbo.view_list_tujuan_pengiriman_bc40_41', 'key' => 'tujuan_pengiriman_id');
		$view_list['tujuan_pengiriman_bc261'] = array('view' => 'dbo.view_list_tujuan_pengiriman_bc261', 'key' => 'tujuan_pengiriman_id');
		$view_list['kategori_barang_bc23'] = array('view' => 'dbo.view_list_kategori_barang_bc23', 'key' => 'kategori_barang_id');
		$view_list['konsolidator'] = array('view' => 'dbo.view_list_konsolidator', 'order' => 'value');
		$view_list['kategori_konsolidator'] = array('view' => 'dbo.view_list_ref_kategori_konsolidator', 'order' => 'value');
		$view_list['cara_pengangkutan'] = array('view' => 'dbo.view_list_cara_pengangkutan', 'order' => 'value');
		$view_list['jenis_barkir'] = array('view' => 'dbo.view_list_jenis_barkir', 'order' => 'value');
		//end ceisa40

		$data_list = array();
		$data_list['data_bank'] = array('view' => 'dbo.view_bank', 'key' => 'bank_id');
		$data_list['data_contract_subcon'] = array('view' => 'dbo.view_contract_subcon', 'key' => 'contract_subcon_id');
		$data_list['data_currencies'] = array('view' => 'dbo.view_currencies', 'key' => 'currencies_id');
		$data_list['data_tax_type'] = array('view' => 'dbo.view_tax_type', 'key' => 'tax_type_id');
		$data_list['data_item_category'] = array('view' => 'dbo.view_item_category', 'key' => 'item_category_id');
		$data_list['data_item_base'] = array('view' => 'dbo.view_item_base', 'key' => 'item_base_id');
		$data_list['data_item_detail'] = array('view' => 'dbo.view_item_detail', 'key' => 'item_id');
		$data_list['data_work_center'] = array('view' => 'dbo.view_work_center', 'key' => 'work_center_id');
		$data_list['data_work_process'] = array('view' => 'dbo.view_work_process', 'key' => 'work_process_id');
		$data_list['data_supplier'] = array('view' => 'dbo.view_supplier', 'key' => 'partner_id');
		$data_list['data_customer'] = array('view' => 'dbo.view_customer', 'key' => 'partner_id');
		$data_list['data_purchase_request'] = array('view' => 'dbo.view_purchase_request', 'view_detail' => 'dbo.view_purchase_request_detail', 'view_detail_session' => 'purchase_request', 'detail_session_key' => 'purchase_request_index', 'detail_session_seq' => 'purchase_request_seq', 'key' => 'purchase_request_id');
		$data_list['data_purchase_order'] = array('view' => 'dbo.view_purchase_order', 'view_detail' => 'dbo.view_purchase_order_detail', 'view_detail_session' => 'purchase_order', 'detail_session_key' => 'purchase_order_index', 'detail_session_seq' => 'purchase_order_seq', 'key' => 'purchase_order_id');
		$data_list['data_purchase_order_warehouse'] = array('view' => 'dbo.view_purchase_order_warehouse', 'view_detail' => 'dbo.view_purchase_order_detail', 'view_detail_session' => 'purchase_order', 'detail_session_key' => 'purchase_order_index', 'detail_session_seq' => 'purchase_order_seq', 'key' => 'purchase_order_id');
		$data_list['data_fabric_shipment'] = array('view' => 'dbo.view_fabric_shipment', 'view_detail' => 'dbo.view_fabric_shipment_detail', 'view_detail_session' => 'fabric_shipment', 'detail_session_key' => 'fabric_shipment_index', 'detail_session_seq' => 'fabric_shipment_seq', 'key' => 'fabric_shipment_id');

		$data_list['data_fabric_warehouse_receive'] = array('view' => 'dbo.view_fabric_warehouse_receive', 'view_detail' => 'dbo.view_fabric_warehouse_receive_detail', 'key' => 'fabric_warehouse_receive_id');
		$data_list['data_fabric_return'] = array('view' => 'dbo.view_fabric_return_request', 'key' => 'work_order_return_id');
		$data_list['data_fabric_return_result'] = array('view' => 'dbo.view_fabric_return_result', 'key' => 'work_order_return_detail_id');
		$data_list['data_fabric_disposisi_material'] = array('view' => 'dbo.view_fabric_disposisi_material', 'key' => 'disposition_id');
		$data_list['data_fabric_loc_stock'] = array('view' => 'dbo.view_stock_loc', 'key' => 'stock_move_sipop_id');
		$data_list['data_fabric_return_request'] = array('view' => 'dbo.view_fabric_transfer_cek', 'key' => 'fabric_transfer_supply_id');

		$data_list['data_fabric_shipment_receive'] = array('view' => 'dbo.view_fabric_shipment', 'view_detail' => 'dbo.view_fabric_shipment_detail', 'view_detail_receive' => 'dbo.view_fabric_warehouse_receive_detail', 'key' => 'fabric_shipment_id');

		$data_list['data_fabric_shipment_detail'] = array('view' => 'dbo.view_fabric_shipment', 'view_detail' => 'dbo.view_fabric_shipment_detail', 'view_detail_session' => 'fabric_shipment', 'detail_session_key' => 'fabric_shipment_index', 'detail_session_seq' => 'fabric_shipment_seq', 'key' => 'fabric_shipment_id');

		$data_list['data_karyawan'] = array('view' => 'dbo.view_karyawan', 'view_biodata' => 'dbo.view_karyawan_biodata', 'view_keluarga' => 'dbo.view_karyawan_keluarga', 'view_dokumen' => 'dbo.view_karyawan_dokumen', 'view_detail_session' => 'karyawan', 'detail_session_key' => 'karyawan_index', 'detail_session_seq' => 'karyawan_seq', 'key' => 'karyawan_id');




		//dari haris

		$data_list['data_spec_detailx'] = array('view' => 'dbo.view_spec_detail', 'key' => 'style_spec_detail_id');




		$data_list['data_fabric_loc'] = array('view' => 'dbo.view_warehouse_loc', 'key' => 'r1');






		$data_list['data_karyawan_edit'] = array('view' => 'dbo.view_karyawan_all', 'view_detail' => 'dbo.view_karyawan_keluarga', 'view_dokumen' => 'dbo.view_karyawan_dokumen', 'view_detail_session' => 'karyawan', 'detail_session_key' => 'karyawan_index', 'detail_session_seq' => 'karyawan_seq', 'key' => 'karyawan_id');

		$data_list['data_sales_order'] = array('view' => 'dbo.view_sales_order', 'view_detail' => 'dbo.view_sales_order_detail', 'view_detail_session' => 'sales_order', 'detail_session_key' => 'sales_order_index', 'detail_session_seq' => 'sales_order_seq', 'key' => 'sales_order_id');
		$data_list['data_memo_purchase'] = array('view' => 'dbo.view_memo_purchase', 'view_detail' => 'dbo.view_purchase_order_detail', 'view_detail_session' => 'memo_purchase', 'detail_session_key' => 'purchase_order_index', 'detail_session_seq' => 'memo_purchase_seq', 'key' => 'purchase_order_id');
		$data_list['data_memo_sales'] = array('view' => 'dbo.view_memo_sales', 'view_detail' => 'dbo.view_sales_order_detail', 'view_detail_session' => 'memo_sales', 'detail_session_key' => 'sales_order_index', 'detail_session_seq' => 'memo_sales_seq', 'key' => 'sales_order_id');
		$data_list['data_purchase_performa'] = array('view' => 'dbo.view_purchase_performa', 'view_detail' => 'dbo.view_purchase_performa_detail', 'view_detail_session' => 'purchase_performa', 'detail_session_key' => 'purchase_performa_index', 'detail_session_seq' => 'purchase_performa_seq', 'key' => 'purchase_performa_id');
		$data_list['data_sales_performa'] = array('view' => 'dbo.view_sales_performa', 'view_detail' => 'dbo.view_sales_performa_detail', 'view_detail_session' => 'sales_performa', 'detail_session_key' => 'sales_performa_index', 'detail_session_seq' => 'sales_performa_seq', 'key' => 'sales_performa_id');
		$data_list['data_sales_order_transfer'] = array('view' => 'dbo.view_sales_order_transfer', 'view_detail' => 'dbo.view_sales_order_transfer_detail', 'view_detail_session' => 'sales_order_transfer', 'detail_session_key' => 'sales_order_transfer_index', 'detail_session_seq' => 'sales_order_transfer_seq', 'key' => 'sales_order_transfer_id');
		$data_list['data_grn'] = array('view' => 'dbo.view_grn', 'view_detail' => 'dbo.view_grn_detail', 'view_detail_session' => 'grn', 'detail_session_key' => 'grn_index', 'detail_session_seq' => 'grn_seq', 'key' => 'grn_id');
		$data_list['data_delivery'] = array('view' => 'dbo.view_delivery', 'view_detail' => 'dbo.view_delivery_detail', 'view_detail_session' => 'delivery', 'detail_session_key' => 'delivery_index', 'detail_session_seq' => 'delivery_seq', 'key' => 'delivery_id');
		$data_list['data_custom_import'] = array('view' => 'dbo.view_custom_import', 'key' => 'bc_in_header_id');
		$data_list['data_custom_import_detail'] = array('view' => 'dbo.view_custom_import_detail', 'key' => 'bc_in_barang_id');
		$data_list['data_custom_export'] = array('view' => 'dbo.view_custom_export', 'key' => 'bc_out_header_id');
		$data_list['data_custom_export_detail'] = array('view' => 'dbo.view_custom_export_detail', 'key' => 'bc_out_barang_id');
		$data_list['data_work_order_plan'] = array('view' => 'dbo.view_work_order_plan', 'view_detail' => 'dbo.view_work_order', 'view_detail_session' => 'work_order_plan', 'detail_session_key' => 'work_order_plan_index', 'detail_session_seq' => 'work_order_plan_seq', 'key' => 'work_order_plan_id');
		$data_list['data_work_order_request'] = array('view' => 'dbo.view_work_order_request', 'view_detail' => 'dbo.view_work_order_request_detail', 'view_detail_session' => 'work_order_request', 'detail_session_key' => 'work_order_request_index', 'detail_session_seq' => 'work_order_request_seq', 'key' => 'work_order_request_id');
		$data_list['data_work_order_transfer'] = array('view' => 'dbo.view_work_order_transfer', 'view_detail' => 'dbo.view_work_order_transfer_detail', 'view_detail_session' => 'work_order_transfer', 'detail_session_key' => 'work_order_transfer_index', 'detail_session_seq' => 'work_order_transfer_seq', 'key' => 'work_order_transfer_id');

		$data_list['data_fabric_transfer'] = array('view' => 'dbo.view_fabric_transfer', 'view_detail' => 'dbo.view_fabric_transfer_detail', 'view_detail_session' => 'fabric_transfer', 'detail_session_key' => 'fabrictransfer_index', 'detail_session_seq' => 'fabric_transfer_seq', 'key' => 'fabric_transfer_id');

		$data_list['data_work_order_production'] = array('view' => 'dbo.view_work_order_production', 'view_detail' => 'dbo.view_work_order_production_detail', 'view_detail_session' => 'work_order_production', 'detail_session_key' => 'work_order_production_index', 'detail_session_seq' => 'work_order_production_seq', 'key' => 'work_order_production_id');
		$data_list['data_work_order_scrap'] = array('view' => 'dbo.view_work_order_scrap', 'view_detail' => 'dbo.view_work_order_scrap_detail', 'view_detail_session' => 'work_order_scrap', 'detail_session_key' => 'work_order_scrap_index', 'detail_session_seq' => 'work_order_scrap_seq', 'key' => 'work_order_scrap_id');
		$data_list['data_work_order_return'] = array('view' => 'dbo.view_work_order_return', 'view_detail' => 'dbo.view_work_order_return_detail', 'view_detail_session' => 'work_order_return', 'detail_session_key' => 'work_order_return_index', 'detail_session_seq' => 'work_order_return_seq', 'key' => 'work_order_return_id');
		$data_list['data_work_order_costing'] = array('view' => 'dbo.view_work_order_costing', 'view_detail' => 'dbo.view_work_order_costing_detail', 'view_detail_session' => 'work_order_costing', 'detail_session_key' => 'work_order_costing_index', 'detail_session_seq' => 'work_order_costing_seq', 'key' => 'work_order_costing_id');
		$data_list['data_work_order_costing_period'] = array('view' => 'dbo.view_work_order_costing_period', 'view_detail' => 'dbo.view_work_order_costing_period_detail', 'view_detail_session' => 'work_order_costing_period', 'detail_session_key' => 'work_order_costing_period_index', 'detail_session_seq' => 'work_order_costing_period_seq', 'key' => 'work_order_costing_period_id');
		$data_list['data_work_order_subcon'] = array('view' => 'dbo.view_work_order_subcon', 'view_detail' => 'dbo.view_work_order_subcon_detail', 'view_detail_session' => 'work_order_subcon', 'detail_session_key' => 'work_order_subcon_index', 'detail_session_seq' => 'work_order_subcon_seq', 'key' => 'work_order_subcon_id');
		$data_list['data_bank_trans_deposit'] = array('view' => 'dbo.view_bank_deposit', 'view_detail' => 'dbo.view_bank_trans_detail', 'view_detail_session' => 'bank_trans_deposit', 'detail_session_key' => 'bank_trans_index', 'detail_session_seq' => 'bank_trans_deposit_seq', 'key' => 'bank_trans_id');
		$data_list['data_bank_trans_payment'] = array('view' => 'dbo.view_bank_payment', 'view_detail' => 'dbo.view_bank_trans_detail', 'view_detail_session' => 'bank_trans_payment', 'detail_session_key' => 'bank_trans_index', 'detail_session_seq' => 'bank_trans_payment_seq', 'key' => 'bank_trans_id');
		$data_list['data_bank_trans_transfer'] = array('view' => 'dbo.view_bank_transfer', 'key' => 'bank_trans_id');
		$data_list['data_uom'] = array('view' => 'dbo.view_uom', 'key' => 'uom_id');
		$data_list['data_kppbc'] = array('view' => 'dbo.view_kppbc', 'key' => 'kppbc_id');
		$data_list['data_port'] = array('view' => 'dbo.view_port', 'key' => 'port_id');
		$data_list['data_warehouse'] = array('view' => 'dbo.view_warehouse', 'key' => 'warehouse_id');
		$data_list['data_package'] = array('view' => 'dbo.view_package', 'key' => 'package_id');
		$data_list['data_supp_trans_invoice'] = array('view' => 'dbo.view_supp_trans_invoice', 'view_detail' => 'dbo.view_supp_trans_invoice_detail_gl', 'view_detail_session' => 'supp_trans_invoice', 'detail_session_key' => 'supp_trans_index', 'detail_session_seq' => 'supp_trans_invoice_seq', 'key' => 'supp_trans_id');
		$data_list['data_cust_trans_invoice'] = array('view' => 'dbo.view_cust_trans_invoice', 'view_detail' => 'dbo.view_cust_trans_invoice_detail_gl', 'view_detail_session' => 'cust_trans_invoice', 'detail_session_key' => 'cust_trans_index', 'detail_session_seq' => 'cust_trans_invoice_seq', 'key' => 'cust_trans_id');
		$data_list['data_supp_trans_payment'] = array('view' => 'dbo.view_supp_trans_payment', 'key' => 'supp_trans_id');
		$data_list['data_cust_trans_payment'] = array('view' => 'dbo.view_cust_trans_payment', 'key' => 'cust_trans_id');
		$data_list['data_currencies_rate'] = array('view' => 'dbo.view_currencies_rate', 'key' => 'currencies_rate_id');
		$data_list['data_hs'] = array('view' => 'dbo.view_hs_code', 'key' => 'hs_id');
		$data_list['data_gl_account_section'] = array('view' => 'dbo.view_gl_account_section', 'key' => 'gl_account_section_id');
		$data_list['data_gl_account_group'] = array('view' => 'dbo.view_gl_account_group', 'key' => 'gl_account_group_id');
		$data_list['data_gl_account'] = array('view' => 'dbo.view_gl_account', 'key' => 'gl_account_id');
		$data_list['data_gl_tag'] = array('view' => 'dbo.view_gl_tag', 'key' => 'gl_tag_id');
		$data_list['data_security_module'] = array('view' => 'dbo.view_security_module', 'key' => 'module_method_id');
		$data_list['data_security_token'] = array('view' => 'dbo.view_security_token', 'key' => 'token_id');
		$data_list['data_work_order_request_detail'] = array('view' => 'dbo.view_work_order_request_detail', 'key' => 'work_order_request_detail_id');
		$data_list['data_work_order_production_detail'] = array('view' => 'dbo.view_work_order_production_detail', 'key' => 'work_order_production_detail_id');
		$data_list['data_work_order_scrap_detail'] = array('view' => 'dbo.view_work_order_scrap_detail', 'key' => 'work_order_scrap_detail_id');
		$data_list['data_work_order_subcon_detail'] = array('view' => 'dbo.view_work_order_subcon_detail', 'key' => 'work_order_subcon_detail_id');
		$data_list['data_tax_group'] = array('view' => 'dbo.view_tax_group', 'view_detail' => 'dbo.view_tax_group_detail', 'view_detail_session' => 'tax_group', 'detail_session_key' => 'tax_group_index', 'detail_session_seq' => 'tax_group_seq', 'key' => 'tax_group_id');
		$data_list['data_bom'] = array('view' => 'dbo.view_bom', 'view_detail' => 'dbo.view_bom_detail', 'view_detail_session' => 'bom', 'detail_session_key' => 'bom_index', 'detail_session_seq' => 'bom_seq', 'key' => 'bom_id');
		$data_list['data_bom_process'] = array('view' => 'dbo.view_bom_process', 'view_detail' => 'dbo.view_bom_process_detail', 'view_detail_session' => 'bom_process', 'detail_session_key' => 'bom_process_index', 'detail_session_seq' => 'bom_process_seq', 'key' => 'bom_process_id');
		$data_list['data_journal_entry'] = array('view' => 'dbo.view_gl_trans', 'view_detail' => 'dbo.view_gl_trans_detail', 'view_detail_session' => 'journal_entry', 'detail_session_key' => 'journal_entry_index', 'detail_session_seq' => 'journal_entry_seq', 'key' => 'gl_trans_id');
		$data_list['data_subcon_in'] = array('view' => 'dbo.view_subcon_in', 'view_detail' => 'dbo.view_subcon_in_detail', 'view_detail_session' => 'subcon_in', 'detail_session_key' => 'subcon_in_index', 'detail_session_seq' => 'subcon_in_seq', 'key' => 'subcon_in_id');
		$data_list['data_subcon_out'] = array('view' => 'dbo.view_subcon_out', 'view_detail' => 'dbo.view_subcon_out_detail', 'view_detail_session' => 'subcon_out', 'detail_session_key' => 'subcon_out_index', 'detail_session_seq' => 'subcon_out_seq', 'key' => 'subcon_out_id');

		$data_list['data_fabric_subcon_out'] = array('view' => 'dbo.view_fabric_subcon_out', 'view_detail' => 'dbo.view_fabric_subcon_out_detail', 'view_detail_session' => 'subcon_out', 'detail_session_key' => 'subcon_out_index', 'detail_session_seq' => 'subcon_out_seq', 'key' => 'fabric_subcon_out_id');

		$data_list['data_fabric_subcon_out_supply'] = array('view' => 'dbo.view_fabric_subcon_out', 'view_detail' => 'dbo.view_fabric_subcon_out_detail', 'key' => 'fabric_subcon_out_id');

		$data_list['data_security_role_token'] = array('view' => 'dbo.view_security_role', 'view_detail' => 'dbo.view_security_role_token', 'key' => 'role_id');
		$data_list['data_user_management'] = array('view' => 'dbo.view_user', 'view_detail' => 'dbo.view_user_work_process', 'key' => 'user_id');
		$data_list['data_item_fixed_asset'] = array('view' => 'dbo.view_item_fixed_asset', 'key' => 'item_fixed_asset_id');
		$data_list['data_consumable'] = array('view' => 'dbo.view_consumable', 'key' => 'consumable_id');
		$data_list['data_work_order_costing_period_detail'] = array('view' => 'dbo.view_work_order_costing_period_detail', 'key' => 'work_order_costing_period_detail_id');
		$data_list['data_stock_adjustment'] = array('view' => 'dbo.view_stock_adjustment', 'view_detail' => 'dbo.view_stock_adjustment_detail', 'view_detail_session' => 'stock_adjustment', 'detail_session_key' => 'stock_adjustment_index', 'detail_session_seq' => 'stock_adjustment_seq', 'key' => 'stock_adjustment_id');
		$data_list['data_purchase_request_detail'] = array('view' => 'dbo.view_purchase_request_detail', 'key' => 'purchase_request_detail_id');
		$data_list['data_purchase_order_detail'] = array('view' => 'dbo.view_purchase_order_detail', 'key' => 'purchase_order_detail_id');
		$data_list['data_keluarga_detail'] = array('view' => 'dbo.view_karyawan_keluarga', 'key' => 'keluarga_id');
		$data_list['data_dokumen_detail'] = array('view' => 'dbo.view_karyawan_dokumen', 'key' => 'dokumen_id');
		$data_list['data_purchase_performa_detail'] = array('view' => 'dbo.view_purchase_performa_detail', 'key' => 'purchase_performa_detail_id');

		$data_list['data_sales_order_detail'] = array('view' => 'dbo.view_sales_order_detail', 'key' => 'sales_order_detail_id');
		$data_list['data_sales_performa_detail'] = array('view' => 'dbo.view_sales_performa_detail', 'key' => 'sales_performa_detail_id');

		$data_list['data_subcon_in_detail'] = array('view' => 'dbo.view_subcon_in_detail', 'key' => 'subcon_in_detail_id');
		$data_list['data_subcon_out_detail'] = array('view' => 'dbo.view_subcon_out_detail', 'key' => 'subcon_out_detail_id');
		$data_list['data_fabric_subcon_out_detail'] = array('view' => 'dbo.view_fabric_subcon_out_detail', 'key' => 'fabric_subcon_out_detail_id');
		$data_list['data_location_base'] = array('view' => 'dbo.view_location_base', 'key' => 'location_base_id');
		$data_list['data_work_order'] = array('view' => 'dbo.view_work_order', 'key' => 'work_order_id');

		$data_list['data_tax_group_detail'] = array('view' => 'dbo.view_tax_group_detail', 'key' => 'tax_group_detail_id');
		$data_list['data_bom_detail'] = array('view' => 'dbo.view_bom_detail', 'key' => 'bom_detail_id');
		$data_list['data_bom_process_detail'] = array('view' => 'dbo.view_bom_process_detail', 'key' => 'bom_process_detail_id');
		$data_list['data_bom_assets'] = array('view' => 'dbo.view_data_assets', 'key' => 'item_id');

		$data_list['data_grn_detail'] = array('view' => 'dbo.view_grn_detail', 'key' => 'grn_detail_id');
		$data_list['data_consumable_detail'] = array('view' => 'dbo.view_consumable_detail', 'key' => 'consumable_detail_id');

		$data_list['data_journal_entry_detail'] = array('view' => 'dbo.view_gl_trans_detail', 'key' => 'gl_trans_detail_id');
		$data_list['data_bank_trans_detail'] = array('view' => 'dbo.view_bank_trans_detail', 'key' => 'bank_trans_detail_id');
		$data_list['data_fixed_asset_purchase'] = array('view' => 'dbo.view_fixed_asset_purchase', 'key' => 'purchase_order_id');
		$data_list['data_supp_trans_detail_gl'] = array('view' => 'dbo.view_supp_trans_invoice_detail_gl', 'key' => 'supp_trans_detail_id');
		$data_list['data_supp_trans_detail'] = array('view' => 'dbo.view_supp_trans_invoice_detail', 'key' => 'supp_trans_detail_id');
		$data_list['data_cust_trans_detail_gl'] = array('view' => 'dbo.view_cust_trans_invoice_detail_gl', 'key' => 'cust_trans_detail_id');
		$data_list['data_cust_trans_detail'] = array('view' => 'dbo.view_cust_trans_invoice_detail', 'key' => 'cust_trans_detail_id');

		$data_list['data_stock_opname'] = array('view' => 'dbo.view_stock_opname', 'key' => 'stock_opname_id');
		$data_list['data_purchase_data'] = array('view' => 'dbo.view_purchase_data', 'key' => 'purchase_data_id');
		$data_list['data_sales_data'] = array('view' => 'dbo.view_sales_data', 'key' => 'sales_data_id');

		$data_list['data_reject_warehouse'] = array('view' => 'dbo.view_reject_warehouse', 'view_detail' => 'dbo.view_reject_warehouse_detail', 'view_detail_session' => 'reject_warehouse', 'detail_session_key' => 'reject_warehouse_index', 'detail_session_seq' => 'reject_warehouse_seq', 'key' => 'reject_warehouse_id');
		$data_list['data_reject_warehouse_detail'] = array('view' => 'dbo.view_reject_warehouse_detail', 'key' => 'reject_warehouse_detail_id');
		$data_list['data_payment_request_payment'] = array('view' => 'dbo.view_payment_request_payment', 'key' => 'payment_request_id');
		$data_list['data_subcon_production'] = array('view' => 'dbo.view_subcon_production', 'key' => 'subcon_production_id');
		$data_list['data_reject'] = array('view' => 'dbo.view_reject', 'key' => 'reject_id');
		$data_list['data_reject_detail'] = array('view' => 'dbo.view_reject_detail', 'key' => 'reject_detail_id');

		$data_list['data_request_injection'] = array('view' => 'dbo.view_request_injection', 'key' => 'request_id');;
		$data_list['data_request_injection_detail'] = array('view' => 'dbo.view_request_detail', 'key' => 'request_detail_id');
		$data_list['data_warehouse_transfer'] = array('view' => 'dbo.view_warehouse_transfer', 'view_detail' => 'dbo.view_warehouse_transfer_detail', 'view_detail_session' => 'warehouse_transfer', 'detail_session_key' => 'warehouse_transfer_index', 'detail_session_seq' => 'warehouse_transfer_seq', 'key' => 'warehouse_transfer_id');
		$data_list['data_warehouse_transfer_injection'] = array('view' => 'dbo.view_warehouse_transfer_injection', 'view_detail' => 'dbo.view_warehouse_transfer_detail', 'view_detail_session' => 'warehouse_transfer', 'detail_session_key' => 'warehouse_transfer_index', 'detail_session_seq' => 'warehouse_transfer_seq', 'key' => 'warehouse_transfer_id');
		$data_list['data_warehouse_return'] = array('view' => 'dbo.view_warehouse_return', 'key' => 'warehouse_return_id');
		$data_list['data_warehouse_return_detail'] = array('view' => 'dbo.view_warehouse_return_detail', 'key' => 'warehouse_return_detail_id');



		$data_list['data_master_task_assignment'] = array('view' => 'dbo.view_master_task_assignment', 'key' => 'id');
		$data_list['data_master_task_assignment_correct'] = array('view' => 'dbo.view_task_assignment_detail_rft_all', 'key' => 'id');
		$data_list['data_master_task_assignment_correct_defect'] = array('view' => 'dbo.view_task_assignment_detail_defect_all', 'key' => 'id');
		$data_list['data_master_task_assignment_correct_reject'] = array('view' => 'dbo.view_task_assignment_detail_reject_all', 'key' => 'id');

		//ceisa40
		$data_list['data_ref_ceisa_document'] = array('view' => 'dbo.view_list_ref_ceisa_document', 'key' => 'id_dokumen');
		$data_list['data_ref_ceisa_fasilitas'] = array('view' => 'dbo.view_list_ref_ceisa_fasilitas', 'key' => 'ceisa_fasilitas');
		$data_list['data_ref_ceisa_tipe_kontainer'] = array('view' => 'dbo.view_list_ceisa_tipe_kontainer', 'key' => 'ceisa_tipe_kontainer');
		$data_list['data_ref_ceisa_jenis_kontainer'] = array('view' => 'dbo.view_list_ceisa_jenis_kontainer', 'key' => 'ceisa_jenis_kontainer');
		$data_list['data_ref_ceisa_ukuran_kontainer'] = array('view' => 'dbo.view_list_ceisa_ukuran_kontainer', 'key' => 'ceisa_ukuran_kontainer');
		$data_list['data_ref_ceisa_tutup_pu'] = array('view' => 'dbo.view_list_ceisa_tutup_pu', 'key' => 'ceisa_tutup_pu');
		$data_list['data_ref_ceisa_kena_pajak'] = array('view' => 'dbo.view_list_ref_ceisa_kena_pajak', 'key' => 'ceisa_kena_pajak');
		$data_list['data_ref_ceisa_asal_bahanbaku'] = array('view' => 'dbo.view_list_ref_ceisa_bahanbaku_asal', 'key' => 'ceisa_asal_bahanbaku');
		$data_list['data_ref_ceisa_cara_perhitungan'] = array('view' => 'dbo.view_list_ref_ceisa_cara_perhitungan', 'key' => 'ceisa_cara_perhitungan');
		$data_list['data_ref_ceisa_lokasi_periksa'] = array('view' => 'dbo.view_list_ref_ceisa_lokasi_periksa', 'key' => 'ceisa_lokasi_periksa');
		$data_list['data_ref_ceisa_daerah_asal'] = array('view' => 'dbo.view_list_ref_ceisa_daerah_asal', 'key' => 'ceisa_daerah_asal');
		$data_list['data_ref_ceisa_bank_devisa'] = array('view' => 'dbo.view_list_ceisa_bank_devisa', 'key' => 'ceisa_bank_devisa');
		$data_list['data_ref_ceisa_partner_type'] = array('view' => 'dbo.view_list_ceisa_partner_tipe', 'key' => 'ceisa_partner_type');
		$data_list['data_ref_ceisa_jenis_barang_pkb'] = array('view' => 'dbo.view_list_ref_ceisa_jenis_barang', 'key' => 'ceisa_jenis_barang_pkb');
		$data_list['data_ref_ceisa_jenis_gudang_pkb'] = array('view' => 'dbo.view_list_ref_ceisa_gudang_periksa', 'key' => 'ceisa_jenis_gudang_pkb');
		$data_list['data_ref_ceisa_cara_stuffing_pkb'] = array('view' => 'dbo.view_list_ref_ceisa_cara_stuffing', 'key' => 'ceisa_cara_stuffing_pkb');
		$data_list['data_ref_ceisa_jenis_partof_pkb'] = array('view' => 'dbo.view_list_ref_ceisa_part_of', 'key' => 'ceisa_jenis_partof_pkb');
		$data_list['data_ref_ceisa_kondisi_barang'] = array('view' => 'dbo.view_list_ceisa_kondisi_barang', 'key' => 'ceisa_kode_kondisi_barang');
		$data_list['data_ceisa_custom_import_document'] = array('view' => 'dbo.view_custom_ceisa_document', 'key' => 'id_dokumen');
		//end ceisa40


		$data_list['data_style_specification_edit'] = array('view' => 'dbo.view_spec_header', 'view_detail' => 'dbo.view_spec_detail', 'view_trims' => 'dbo.view_spec_trims', 'view_image' => 'dbo.view_spec_image', 'detail_session_seq' => 'style_spec_header_id_seq', 'key' => 'style_spec_header_id');







		$data_list['data_style_specification_detail'] = array('view' => 'dbo.view_spec_detail', 'key' => 'style_spec_detail_id');
		$data_list['data_style_spec_trims'] = array('view' => 'dbo.view_spec_trims', 'key' => 'style_spec_trims_id');
		$data_list['data_item_base_detail'] = array('view' => 'dbo.view_detail_mst_item_base', 'key' => 'detail_item_base_id');
		$data_list['data_assets_tags'] = array('view' => 'dbo.view_assets_tag', 'key' => 'assets_tags_id');
		$data_list['data_item_base_detail_persediaan'] = array('view' => 'dbo.view_mst_item_it_assets', 'key' => 'item_base_id');
		$data_list['data_item_base_detail_out'] = array('view' => 'dbo.view_detail_mst_item_base_out', 'key' => 'out_detail_item_base_id');



		$data_list['data_checklist'] = array('view' => 'dbo.view_checklist', 'view_detail' => 'dbo.view_checklist_detail', 'key' => 'checklist_id');

		$data_list['data_item'] = array('view' => 'dbo.view_mst_item_it_assets', 'key' => 'item_base_id');
		$data_list['data_tags'] = array('view' => 'dbo.view_assets_tag', 'key' => 'assets_tags_id');

		$data_list['data_item_invoice'] = array('view' => 'dbo.view_assets_invoice', 'key' => 'invoice_id');
		$data_list['data_master_line'] = array('view' => 'dbo.view_list_pilih_line', 'key' => 'id');
		$data_list['data_master_process'] = array('view' => 'dbo.view_master_process', 'key' => 'id');
		$data_list['data_master_defect_cause'] = array('view' => 'dbo.view_defect_cause', 'key' => 'id');
		$data_list['data_style_no_task_assignment_execute'] = array('view' => 'dbo.view_master_task_assignment', 'key' => 'id');
		$data_list['data_master_defect_parts'] = array('view' => 'dbo.view_defect_parts', 'key' => 'id');
		//$data_list['data_user_management'] = array('view' => 'dbo.view_user', 'view_detail' => 'dbo.view_user_work_process', 'key' => 'user_id');

		$data_list['data_image_pattern'] = array('view' => 'dbo.view_image_pattern', 'key' => 'id_image_pattern');
		$data_list['data_shipment_detail_list'] = array('view' => 'dbo.view_fabric_shipment_list', 'key' => 'fabric_shipment_list_id');
		$data_list['data_fabric_shipment_detail_list'] = array('view' => 'dbo.view_fabric_shipment_detail', 'key' => 'fabric_shipment_detail_id');
		$data_list['data_shipment_list_receive'] = array('view' => 'dbo.view_fabric_shipment_list_receive', 'key' => 'fabric_shipment_list_id');
		$data_list['data_item_location'] = array('view' => 'dbo.view_item_location', 'key' => 'location_id');

		// $view_list['data_pilih_list_style'] = array('view' => 'dbo.view_list_pilih_style_marker', 'key' => 'value');
		//$data_list['data_performa_invoice'] = array('view' => 'dbo.dt_sales_performa', 'key' => 'sales_performa_id');

		//$data_list['data_performa_invoice'] = array('view' => 'dbo.dt_sales_performa', 'key' => 'sales_performa_id');

		//$data_list['data_purchase_order'] = array('view' => 'dbo.view_purchase_order','view_detail' => 'dbo.view_purchase_order_detail','view_detail_session' => 'purchase_order','detail_session_key' => 'purchase_order_index','detail_session_seq' => 'purchase_order_seq', 'key' => 'purchase_order_id');



		$custom = array();
		$custom[] = 'confirm';

		$custom_list = array();

		$confirm_data = array();
		$confirm_data[0] = "No";
		$confirm_data[1] = "Yes";

		$custom_list['confirm']['data'] = $confirm_data;

		$data_session = array();
		$data_session[] = 'data_sess_purchase_request';
		$data_session[] = 'data_sess_tax_group';
		$data_session[] = 'data_sess_bom';
		$data_session[] = 'data_sess_bom_process';
		$data_session[] = 'data_sess_purchase_order';
		$data_session[] = 'data_sess_memo_purchase';
		$data_session[] = 'data_sess_work_order_plan';
		$data_session[] = 'data_sess_bank_trans_deposit';
		$data_session[] = 'data_sess_bank_trans_payment';
		$data_session[] = 'data_sess_journal_entry';
		$data_session[] = 'data_sess_subcon_in';
		$data_session[] = 'data_sess_subcon_out';
		$data_session[] = 'data_sess_sales_order';
		$data_session[] = 'data_sess_supp_trans_invoice';
		$data_session[] = 'data_sess_cust_trans_invoice';
		$data_session[] = 'data_sess_stock_adjustment';

		$data_session_list = array();
		$data_session_list['data_sess_purchase_request'] = 'purchase_request';
		$data_session_list['data_sess_purchase_order'] = 'purchase_order';
		$data_session_list['data_sess_memo_purchase'] = 'memo_purchase';
		$data_session_list['data_sess_work_order_plan'] = 'work_order_plan';
		$data_session_list['data_sess_bank_trans_deposit'] = 'bank_trans_deposit';
		$data_session_list['data_sess_bank_trans_payment'] = 'bank_trans_payment';
		$data_session_list['data_sess_tax_group'] = 'tax_group';
		$data_session_list['data_sess_bom'] = 'bom';
		$data_session_list['data_sess_bom_process'] = 'bom_process';
		$data_session_list['data_sess_journal_entry'] = 'journal_entry';
		$data_session_list['data_sess_subcon_in'] = 'subcon_in';
		$data_session_list['data_sess_subcon_out'] = 'subcon_out';
		$data_session_list['data_sess_sales_order'] = 'sales_order';
		$data_session_list['data_sess_stock_adjustment'] = 'stock_adjustment';
		$data_session_list['data_sess_supp_trans_invoice'] = 'supp_trans_invoice';
		$data_session_list['data_sess_cust_trans_invoice'] = 'cust_trans_invoice';

		$get = array();
		$get[] = 'get_purchase_data';
		$get[] = 'get_sales_data';
		$get[] = 'get_grn_custom';
		$get[] = 'get_delivery_custom';
		$get[] = 'get_grn_purchase';
		$get[] = 'get_delivery_sales';
		$get[] = 'get_supply_sales';
		$get[] = 'get_bom_process';
		$get[] = 'get_stock_transfer';
		$get[] = 'get_item_from_work_order_detail';
		$get[] = 'get_item_from_work_order_plan_process';
		$get[] = 'get_work_order_detail_process';
		$get[] = 'get_bom_from_work_order';
		$get[] = 'get_bom';
		$get[] = 'get_bom_assets';
		$get[] = 'get_gl_parent_group';
		$get[] = 'get_rate_data';
		$get[] = 'get_contract_subcon';
		$get[] = 'get_contract_subcon_type';
		$get[] = 'get_work_order_plan_process';
		$get[] = 'get_work_order_detail_item';
		$get[] = 'get_work_order_detail_item_from_plan';
		$get[] = 'get_app_trans_no';
		$get[] = 'get_app_trans_no_SIPOP';
		$get[] = 'get_app_trans_no_item_transfer';
		$get[] = 'get_app_trans_no_GRN_SIPOP';
		$get[] = 'get_app_trans_no_SIPOP_fabric';
		$get[] = 'get_good_receive_no';
		$get[] = 'get_item_detail';
		$get[] = 'get_bank_curr';
		$get[] = 'get_nama_karyawan';
		$get[] = 'get_departemen';
		$get[] = 'get_departemen_1';
		$get[] = 'get_divisi';
		$get[] = 'get_divisi_1';
		$get[] = 'get_group';
		$get[] = 'get_group_1';
		$get[] = 'get_tahun';
		$get[] = 'get_keterangan_absen';
		$get[] = 'get_keterangan_line';
		$get[] = 'get_list_style';
		$get[] = 'get_list_spec_group';
		$get[] = 'get_list_item_central';
		$get[] = 'get_list_item_fabric';
		$get[] = 'get_list_item_barang';
		$get[] = 'get_list_item_barang_shipment';
		$get[] = 'get_list_detil_shipment';
		$get[] = 'get_temp_shipment_detail';
		$get[] = 'get_cari_karyawan';
		$get[] = 'get_cari_karyawan';
		$get[] = 'get_custom_in';
		$get[] = 'get_custom_out';
		$get[] = 'get_colour_fabric';

		$get[] = 'get_shipment_code';
		$get[] = 'get_shipment_code_fabric_location';


		$get[] = 'get_shipment_code_new';
		$get[] = 'get_shipment_code_fix';
		$get[] = 'get_po_add_receive';
		$get[] = 'get_receive_code';
		$get[] = 'get_location_detail_code';
		$get[] = 'get_colour_auto';
		$get[] = 'get_item_base_gudang';
		$get[] = 'get_mst_item_fabric';
		$get[] = 'get_app_trans_no_txt_acc';
		$get[] = 'get_app_trans_good_receive';
		$get[] = 'get_app_trans_no_delivery';
		$get[] = 'get_app_trans_no_delivery_bc_out';
		$get[] = 'get_type_item_location';
		$get[] = 'get_item_category';
		$get[] = 'get_warehouse_new';
		$get[] = 'get_location_base';
		$get[] = 'get_fabric_location';
		$get[] = 'get_fabric_location_update_new';
		$get[] = 'get_fabric_location_update_location';
		$get[] = 'get_fabric_location_shipment';
		$get[] = 'get_fabric_location_update';
		$get[] = 'get_fabric_location_update_split';
		$get[] = 'get_item_detail_show';
		$get[] = 'get_item_location';
		$get[] = 'get_location_base_id';
		$get[] = 'get_no_kontainer';




		$offset = 0;
		$limit = 100;

		if (in_array($param, $get)) {

			if ($param == 'get_type_item_location') {
				$where = array();
				if ($id) {
					$where["type_location_id =" . $id . " AND 1="] = 1;
				}

				$data_table = $this->main->getData_pop('dbo.prm_type_location', null, $where, null, null, 10);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['type_location_id'], "code" => $value['type_location_code'], "text" => $value['type_location_name']);
					}
				}

				$return['results'] = $return;
			}

			if ($param == 'get_item_category') {
				$where = array();
				if ($id) {
					$where["item_category_id =" . $id . " AND 1="] = 1;
				}

				$data_table = $this->main->getData_pop('dbo.view_mst_item_category_ecc', null, $where, null, null, 10);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['item_category_id'], "code" => $value['item_category_code'], "text" => $value['item_category_name']);
					}
				}

				$return['results'] = $return;
			}

			if ($param == 'get_warehouse_new') {
				$where = array();
				if ($id) {
					$where["warehouse_id =" . $id . " AND 1="] = 1;
				}

				$data_table = $this->main->getData_pop('dbo.dt_mst_warehouse_ecc', null, $where, null, null, 10);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['warehouse_id'], "code" => $value['warehouse_code'], "text" => $value['warehouse_name']);
					}
				}

				$return['results'] = $return;
			}

			if ($param == 'get_location_base') {
				$where = array();
				if ($id) {
					$where["location_base_id =" . $id . " AND 1="] = 1;
				}

				$data_table = $this->main->getData_pop('dbo.dt_location_base', null, $where, null, null, 10);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['location_base_id'], "code" => $value['location_base_code'], "text" => $value['location_base_name']);
					}
				}

				$return['results'] = $return;
			}

			if ($param == 'get_nama_karyawan') {
				$where = array();

				if ($q) {
					$where["value like '%" . $q . "%' AND 1="] = 1;
				}

				$return[] = array("id" => 0, "value" => 'All', "text" => 'All');

				$data_table = $this->main->getData_pop('dbo.view_list_pilih_karyawan', null, $where, null, null, 10);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['id'], "value" => $value['value'], "text" => $value['text']);
					}
				}

				$return['results'] = $return;
			}

			if ($param == 'get_departemen') {
				$where = array();

				if ($q) {
					$where["value like '%" . $q . "%' AND 1="] = 1;
				}

				$return[] = array("id" => 0, "value" => 'All', "text" => 'All');

				$data_table = $this->main->getData_pop('dbo.view_list_pilih_departement', null, $where, null, null, 10);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['id'], "value" => $value['value'], "text" => $value['text']);
					}
				}

				$return['results'] = $return;
			}

			if ($param == 'get_departemen_1') {
				$where = array();

				if ($q) {
					$where["value like '%" . $q . "%' AND 1="] = 1;
				}

				$return[] = array("id" => '', "value" => 'All', "text" => 'All');

				$data_table = $this->main->getData_pop('dbo.view_list_pilih_departement_1', null, $where, null, null, 10);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['id'], "value" => $value['value'], "text" => $value['text']);
					}
				}

				$return['results'] = $return;
			}

			if ($param == 'get_divisi') {
				$where = array();

				if ($q) {
					$where["value like '%" . $q . "%' AND 1="] = 1;
				}

				$return[] = array("id" => 0, "value" => 'All', "text" => 'All');

				$data_table = $this->main->getData_pop('dbo.view_list_pilih_divisi', null, $where, null, null, 10);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['id'], "value" => $value['value'], "text" => $value['text']);
					}
				}

				$return['results'] = $return;
			}

			if ($param == 'get_divisi_1') {
				$where = array();

				if ($q) {
					$where["value like '%" . $q . "%' AND 1="] = 1;
				}

				$return[] = array("id" => '', "value" => 'All', "text" => 'All');

				$data_table = $this->main->getData_pop('dbo.view_list_pilih_divisi_1', null, $where, null, null, null);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['id'], "value" => $value['value'], "text" => $value['text']);
					}
				}

				$return['results'] = $return;
			}

			if ($param == 'get_group') {
				$where = array();

				if ($q) {
					$where["value like '%" . $q . "%' AND 1="] = 1;
				}

				$return[] = array("id" => 0, "value" => 'All', "text" => 'All');

				$data_table = $this->main->getData_pop('dbo.view_list_pilih_group', null, $where, null, null, 10);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['id'], "value" => $value['value'], "text" => $value['text']);
					}
				}

				$return['results'] = $return;
			}

			if ($param == 'get_group_1') {
				$where = array();

				if ($q) {
					$where["value like '%" . $q . "%' AND 1="] = 1;
				}

				$return[] = array("id" => '', "value" => 'All', "text" => 'All');

				$data_table = $this->main->getData_pop('dbo.view_list_pilih_group_1', null, $where, null, null, null);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['id'], "value" => $value['value'], "text" => $value['text']);
					}
				}

				$return['results'] = $return;
			}

			if ($param == 'get_tahun') {
				$where = array();

				if ($q) {
					$where["value like '%" . $q . "%' AND 1="] = 1;
				}

				$return[] = array("id" => 0, "value" => 'All', "text" => 'All');

				$data_table = $this->main->getData_pop('dbo.view_list_pilih_tahun', null, $where, null, null, 10);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['id'], "value" => $value['value'], "text" => $value['text']);
					}
				}

				$return['results'] = $return;
			}

			if ($param == 'get_keterangan_absen') {
				$where = array();

				if ($q) {
					$where["value like '%" . $q . "%' AND 1="] = 1;
				}

				$return[] = array("id" => 0, "value" => '-', "text" => '-');

				$data_table = $this->main->getData_pop('dbo.view_list_pilih_keterangan_absen', null, $where, null, null, 20);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['id'], "value" => $value['value'], "text" => $value['text']);
					}
				}

				$return['results'] = $return;
			}

			if ($param == 'get_keterangan_line') {
				$where = array();

				if ($q) {
					$where["value like '%" . $q . "%' AND 1="] = 1;
				}

				$return[] = array("id" => 0, "value" => '-', "text" => '-');

				$data_table = $this->main->getData_pop('dbo.view_list_pilih_line', null, $where, null, null, 25);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['id'], "value" => $value['value'], "text" => $value['text']);
					}
				}

				$return['results'] = $return;
			}

			if ($param == 'get_list_style') {
				$where = array();

				if ($q) {
					$where["value like '%" . $q . "%' AND 1="] = 1;
				}


				$return[] = array("id" => 0, "value" => '-', "text" => '-');
				$return[] = array("id" => 26, "value" => 'Create ..', "text" => 'Create ..');

				$data_table = $this->main->getData_pop('dbo.view_list_pilih_style', null, $where, null, null, 25);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['id'], "value" => $value['value'], "text" => $value['text']);
					}
				}

				$return['results'] = $return;
			}

			if ($param == 'get_list_spec_group') {

				$where = array();

				if ($q) {
					$where["value like '%" . $q . "%' AND 1="] = 1;
				}


				//$return[] = array("id"=>0,"value"=>'-',"text"=>'-');
				$return[] = array("id" => -99, "value" => 'Create ..', "text" => 'Create ..');

				$data_table = $this->main->getData_pop('dbo.view_list_pilih_model_spec', null, $where, null, null);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['id'], "value" => $value['value'], "text" => $value['text']);
					}
				}

				$return['results'] = $return;
			}
			
			
			if ($param == 'get_no_kontainer') {
				//var_dump($_REQUEST);
				$fabric_warehouse_receive_id = isset($_REQUEST['fabric_warehouse_receive_id']) ? is_numeric($_REQUEST['fabric_warehouse_receive_id']) ? $_REQUEST['fabric_warehouse_receive_id']  : -1 : -1;
				
				$where = array();
				$where["fabric_warehouse_receive_id"] = $fabric_warehouse_receive_id;

				if ($id) {
					$where['id'] = $id;
				} else {
					if ($q) {
						$where["value like '%" . $q . "%' AND 1="] = 1;
					}
				}
              
			    //  $return[] = array("id" => 0, "value" => '-', "text" => '-');
				// var_dump($where);
				//$return[] = array("id"=>-99,"value"=>'Create ..',"text"=>'Create ..');
				//view_list_item_central
				$data_table = $this->main->getData_pop('dbo.view_list_kode_kontainer', null, $where, null, null);
				//$return[] = array("id"=>'',"value"=>'-',"text"=>'-');
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['id'], "value" => $value['value'], "text" => $value['text']);
					}
				}
                
				
				  
				$return['results'] = $return;
			}

			if ($param == 'get_list_item_central') {
				$item_id = isset($_REQUEST['item_id']) ? is_numeric($_REQUEST['item_id']) ? $_REQUEST['item_id']  : -1 : -1;
				$po_detail_rincian_id = isset($_REQUEST['po_detail_rincian_id']) ? is_numeric($_REQUEST['po_detail_rincian_id']) ? $_REQUEST['po_detail_rincian_id']  : -1 : -1;

				//	$where = array();
				if ($po_detail_rincian_id != -1) {
					//		$where["item_id=".$item_id." OR id_fabric="] = -99; 
					$where["item_id"] = $item_id;
					//		//$where["id_fabric"] = -99; 
				} else {
					$return[] = array("id" => -99, "value" => 'Create ..', "text" => 'Create ..');
					//		$where["item_id"] = $item_id; 
				}


				$where["item_id"] = $item_id;

				if ($id) {
					$where['id'] = $id;
				} else {
					if ($q) {
						$where["value like '%" . $q . "%' AND 1="] = 1;
					}
				}

				// var_dump($where);
				//$return[] = array("id"=>-99,"value"=>'Create ..',"text"=>'Create ..');
				//view_list_item_central
				$data_table = $this->main->getData_pop('dbo.view_list_item_central', null, $where, null, null);
				//$return[] = array("id"=>'',"value"=>'-',"text"=>'-');
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['id'], "value" => $value['value'], "text" => $value['text']);
					}
				}

				$return['results'] = $return;
			}



			if ($param == 'get_list_item_fabric') {
				// var_dump($_REQUEST);
				$purchase_order_ecc_id = isset($_REQUEST['purchase_order_warehouse_id']) ? is_numeric($_REQUEST['purchase_order_warehouse_id']) ? $_REQUEST['purchase_order_warehouse_id']  : -1 : -1;

				$where = array();
				$where['purchase_order_id'] = $purchase_order_ecc_id;
				//$where['id'] = $purchase_order_ecc_id;
				if ($id) {
					if ($id == -1) {
						$limit = 1;
					} else {
						$where["id"] = $id;
					}
				} else {
					if ($q) {
						$where["value like '%" . $q . "%' AND 1="] = 1;
					}
				}

				$order = "value asc";

				$data_table = $this->main->getData_pop('dbo.view_list_item_fabric', null, $where, null, $order, $limit, $offset);
				//var_dump($data_table);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['id'], "value" => $value['value'], "text" => $value['text']);
					}
				}

				$return['results'] = $return;
			}

			if ($param == 'get_list_item_barang') {
				// var_dump($_REQUEST);
				$purchase_order_ecc_id = isset($_REQUEST['purchase_order_warehouse_id']) ? is_numeric($_REQUEST['purchase_order_warehouse_id']) ? $_REQUEST['purchase_order_warehouse_id']  : -1 : -1;
				$item_fabric_id = isset($_REQUEST['item_fabric_id']) ? is_numeric($_REQUEST['item_fabric_id']) ? $_REQUEST['item_fabric_id']  : -1 : -1;

				$where = array();
				$where['purchase_order_id'] = $purchase_order_ecc_id;
				$where['item_fabric_id'] = $item_fabric_id;

				//var_dump($where);
				if ($id) {
					if ($id == -1) {
						$limit = 1;
					} else {
						$where["id"] = $id;
					}
				} else {
					if ($q) {
						$where["value like '%" . $q . "%' AND 1="] = 1;
					}
				}

				$order = "value asc";

				$data_table = $this->main->getData_pop('dbo.view_list_item_barang', null, $where, null, $order, $limit, $offset);
				//var_dump($data_table);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['id'], "value" => $value['value'], "text" => $value['text']);
					}
				}

				$return['results'] = $return;
			}

			if ($param == 'get_colour_fabric') {
				$where = array();
				//var_dump($q);
				if ($q) {
					$where["value ilike '%" . $q . "%' AND 1="] = 1;
				}


				$return[] = array("id" => null, "value" => '-', "text" => '-');
				//$data_table['fabric_colour'] = array('view' => 'dbo.view_list_fabric_colour', 'order' => 'value');
				$data_table = $this->main->getData_pop('dbo.view_list_fabric_colour', null, $where, null, null, 50);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['id'], "value" => $value['value'], "text" => $value['text']);
					}
				}

				$return['results'] = $return;
			}

			if ($param == 'get_colour_auto') {
				//var_dump('nama'.$_POST['nama']);die();
				$q = $_POST['nama'];
				$where = array();
				//var_dump($q);
				if ($q) {
					$where["value ilike '%" . $q . "%' AND 1="] = 1;
				}


				$return[] = array("id" => null, "value" => '-', "text" => '-');
				//$data_table['fabric_colour'] = array('view' => 'dbo.view_list_fabric_colour', 'order' => 'value');
				$data_table = $this->main->getData_pop('dbo.view_list_fabric_colour', null, $where, null, null, 50);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['id'], "value" => $value['value'], "text" => $value['text']);
					}
				}

				$return['results'] = $return;
			}

			if ($param == 'get_list_item_barang_shipment') {
				$fabric_shipment_detail_id = isset($_REQUEST['fabric_shipment_detail_id']) ? is_numeric($_REQUEST['fabric_shipment_detail_id']) ? $_REQUEST['fabric_shipment_detail_id']  : -1 : -1;
				$data_shipment_detail = $this->main->find_data_pop('dbo.dt_fabric_shipment_detail', 'fabric_shipment_detail_id', $fabric_shipment_detail_id);

				$where = array();
				$where['purchase_order_id'] = $data_shipment_detail[0]['purchase_order_id'];
				$where['item_fabric_id'] = $data_shipment_detail[0]['item_fabric_id'];

				//var_dump($where);
				if ($id) {
					if ($id == -1) {
						$limit = 1;
					} else {
						$where["id"] = $id;
					}
				} else {
					if ($q) {
						$where["value like '%" . $q . "%' AND 1="] = 1;
					}
				}

				$order = "value asc";

				$data_table = $this->main->getData_pop('dbo.view_list_item_barang', null, $where, null, $order, $limit, $offset);
				//var_dump($data_table);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['id'], "value" => $value['value'], "text" => $value['text']);
					}
				}

				$return['results'] = $return;
			}

			if ($param == 'get_list_detil_shipment') {
				$id = isset($_REQUEST['fabric_shipment_detail_id']) ? is_numeric($_REQUEST['fabric_shipment_detail_id']) ? $_REQUEST['fabric_shipment_detail_id']  : -1 : -1;

				$where = array();

				if ($id) {
					if ($id == -1) {
						$limit = 1;
					} else {
						$where["id"] = $id;
					}
				} else {
					if ($q) {
						$where["value like '%" . $q . "%' AND 1="] = 1;
					}
				}

				$order = "value asc";

				$data_table = $this->main->getData_pop('dbo.view_list_fabric_shipment_detail', null, $where, null, $order, $limit, $offset);

				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['id'], "value" => $value['value'], "text" => $value['text']);
					}
				}

				$return['results'] = $return;
			}
			if ($param == 'data_fabric_transfer_return_select') {
				$id = isset($_REQUEST['work_order_plan_id']) ? is_numeric($_REQUEST['work_order_plan_id']) ? $_REQUEST['work_order_plan_id']  : -1 : -1;

				$where = array();

				if ($id) {
					if ($id == -1) {
						$limit = 1;
					} else {
						$where["id"] = $id;
					}
				} else {
					if ($q) {
						$where["value like '%" . $q . "%' AND 1="] = 1;
					}
				}

				$order = "value asc";

				$data_table = $this->main->getData_pop('dbo.view_work_order_return_ecc', null, $where, null, $order, $limit, $offset);

				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['id'], "value" => $value['value'], "text" => $value['text']);
					}
				}

				$return['results'] = $return;
			}
			if ($param == 'data_fabric_return_ecc') {
				$id = isset($_REQUEST['work_order_return_id']) ? is_numeric($_REQUEST['work_order_return_id']) ? $_REQUEST['work_order_return_id']  : -1 : -1;

				$where = array();

				if ($id) {
					if ($id == -1) {
						$limit = 1;
					} else {
						$where["id"] = $id;
					}
				} else {
					if ($q) {
						$where["value like '%" . $q . "%' AND 1="] = 1;
					}
				}

				$order = "value asc";

				$data_table = $this->main->getData_pop('dbo.view_work_order_plan_fabric_return', null, $where, null, $order, $limit, $offset);

				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['id'], "value" => $value['value'], "text" => $value['text']);
					}
				}

				$return['results'] = $return;
			}

			if ($param == 'get_item_detail_show') {
				$where = array();

				if ($q) {
					$where["value like '%" . $q . "%' AND 1="] = 1;
				}

				// $return[] = array("id" => 0, "value" => 'All', "text" => 'All');

				$data_table = $this->main->getData('dbo.view_list_item_detail', null, $where, null, null, 10);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['id'], "value" => $value['value'], "text" => $value['text']);
					}
				}

				$return['results'] = $return;
			}

			//ini nu bener

			if ($param == 'get_shipment_code_fabric_location') {
				// $purchase_order_warehouse_id = isset($_REQUEST['purchase_order_warehouse_id']) ? is_numeric($_REQUEST['purchase_order_warehouse_id']) ? $_REQUEST['purchase_order_warehouse_id']  : -1 : -1;
				//var_dump('hasilnya' . $purchase_order_warehouse_id);
				$where = array();
				// $where['purchase_order_id'] = $purchase_order_warehouse_id;
				if ($id) {
					if ($id == -1) {
						$limit = 1;
					} else {
						$where["id"] = $id;
					}
				} else {
					if ($q) {
						$where["value like '%" . $q . "%' AND 1="] = 1;
					}
				}

				$order = "value asc";

				$data_table = $this->main->getData_pop('dbo.view_list_shipment_code_fabric_location', null, $where, null, $order, $limit, $offset);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['id'], "value" => $value['value'], "text" => $value['text']);
					}
				}
				$return['results'] = $return;
			}




			if ($param == 'get_custom_in') {
				$where = array();

				if ($q) {
					$where["value like '%" . $q . "%' AND 1="] = 1;
				}

				$return[] = array("id" => 0, "value" => 'All', "text" => 'All');

				$data_table = $this->main->getData_pop('dbo.view_list_custom_in', null, $where, null, null, 10);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['id'], "value" => $value['value'], "text" => $value['text']);
					}
				}

				$return['results'] = $return;
			}
			if ($param == 'get_custom_out') {
				$where = array();

				if ($q) {
					$where["value like '%" . $q . "%' AND 1="] = 1;
				}

				$return[] = array("id" => 0, "value" => 'All', "text" => 'All');

				$data_table = $this->main->getData_pop('dbo.view_list_custom_out', null, $where, null, null, 10);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['id'], "value" => $value['value'], "text" => $value['text']);
					}
				}

				$return['results'] = $return;
			}

			if ($param == 'get_work_order_plan_process') {
				$work_process_id = isset($_REQUEST['work_process_id']) ? htmlentities($_REQUEST['work_process_id']) : false;

				$where = array();

				if ($id) {
					$where['id'] = $id;
				} else {
					if ($work_process_id) {
						$where['work_process_id'] = $work_process_id;
					} else {
						$where['work_process_id'] = -1;
					}
				}

				if ($q) {
					$where["value like '%" . $q . "%' AND 1="] = 1;
				}

				$order = "value asc";

				$data_table = $this->main->getData('dbo.view_list_work_order_plan_process', null, $where, null, $order);

				if ($data_table) {
					$return = $data_table;
				} else {
					$return = array();
				}

				$return['results'] = $return;
			}

			if ($param == 'get_contract_subcon_type') {
				$partner_id = isset($_REQUEST['partner_id']) ? is_numeric($_REQUEST['partner_id']) ? $_REQUEST['partner_id']  : -1 : -1;
				$contract_subcon_id = isset($_REQUEST['contract_subcon_id']) ? htmlentities($_REQUEST['contract_subcon_id']) : false;

				$where = array();

				if ($id) {
					$where['contract_subcon_id'] = $id;
				} else {
					$where['partner_id'] = $partner_id;
					if ($contract_subcon_id) {
						$where['contract_subcon_id'] = $contract_subcon_id;
					} else {
						$where['contract_subcon_id'] = -1;
					}
				}


				$order = "contract_subcon_id desc";

				$data_table = $this->main->getData('dbo.view_contract_subcon', null, $where, null, $order, 1);
				if ($data_table) {
					$return = $data_table;
				} else {
					$return = false;
				}

				$return['results'] = $return;
			}

			if ($param == 'get_good_receive_no') {
				$bc_in_header_id = isset($_REQUEST['bc_in_header_id']) ? htmlentities($_REQUEST['bc_in_header_id']) : false;
				$po_no = '';
				$bc_no = '';

				$where = array();
				$where['bc_in_header_id'] = $bc_in_header_id;

				$order = null;

				$data_table = $this->main->getData('dbo.view_get_bc_no_po_no', null, $where, null, $order, 1);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$bc_no = $value['doc_no'];
						$po_no = $value['po_no'];

						if (!$po_no) {
							$where = array();
							$where['app_trans_id'] = 57;

							$order = null;

							$data_table = $this->main->getData('dbo.view_app_trans', null, $where, null, $order, 1);
							if ($data_table) {
								foreach ($data_table as $key => $value) {
									if (date('Ym', strtotime($value['app_trans_last_date'])) != date('Ym')) {
										$app_trans_no = 0;
									} else {
										$app_trans_no = $value['app_trans_no'];
									}

									$app_trans_no++;

									$po_no .= $value['app_trans_prefix'];
									$po_no .= "-" . date('Y/m/d');
									$po_no .= "-" . str_pad($app_trans_no, 4, "0", STR_PAD_LEFT);
								}
							}
						}
					}
				}

				$return['po_no'] = $po_no;
				$return['bc_no'] = $bc_no;
				$return['results'] = $return;
			}

			if ($param == 'get_bank_curr') {
				$return2 = false;

				$currencies_id = isset($_REQUEST['currencies_id']) ? htmlentities($_REQUEST['currencies_id']) : false;
				$bank_id = isset($_REQUEST['bank_id']) ? is_numeric($_REQUEST['bank_id']) ? $_REQUEST['bank_id']  : -1 : -1;

				$where = array();
				$where['bank_id'] = $bank_id;

				$order = null;

				$data_table = $this->main->getData('dbo.view_bank', null, $where, null, $order, 1);
				if ($data_table) {
					$bank_currencies_id = $data_table[0]['currencies_id'];
					if ($bank_currencies_id == $currencies_id) {
						$return2 = true;
					} else {
						$return2 = false;
					}
				} else {
					$return2 = false;
				}

				$return['results'] = $return2;
			}


			if ($param == 'get_purchase_data') {
				//var_dump('get euy');
				$partner_id = isset($_REQUEST['partner_id']) ? htmlentities($_REQUEST['partner_id']) : false;
				$currencies_id = isset($_REQUEST['currencies_id']) ? htmlentities($_REQUEST['currencies_id']) : false;
				$item_id = isset($_REQUEST['item_id']) ? is_numeric($_REQUEST['item_id']) ? $_REQUEST['item_id']  : -1 : -1;

				$date = isset($_REQUEST['date']) ? htmlentities($_REQUEST['date']) : '1900-01-01';

				$where = array();
				// $where['partner_id'] = $partner_id;
				// $where['currencies_id'] = $currencies_id;
				$where['item_id'] = $item_id;

				$order = "purchase_data_id desc";

				$data_table = $this->main->getData('dbo.view_purchase_data', null, $where, null, $order, 1);
				if ($data_table) {
					$return = $data_table;
					$return[0]['unit_price'] = $this->mainconfig->get_decimal_format2($return[0]['unit_price'], 4);
					$return[0]['conversion'] = $this->mainconfig->get_decimal_format2($return[0]['conversion']);
				} else {
					$return[0]['unit_price'] = 0;
					$return[0]['conversion'] = 1;
					$return[0]['partner_uom_id'] = 1;
				}


				$where = array();
				$where['currencies_date_start <='] = $date;
				$where['currencies_date_end >='] = $date;
				$where['currencies_id'] = $currencies_id;

				$home_currency = $this->session->userdata('home_currencies');
				if ($home_currency == $currencies_id) {
					$return[0]['rate'] = 1;
				} else {
					$data_table = $this->main->getData('dbo.view_currencies_rate', null, $where, null, null, 1);
					if ($data_table) {
						$return2 = $data_table;
						$return[0]['rate'] = $this->mainconfig->get_decimal_format2($return2[0]['currencies_rate'], 8);
					} else {
						$return[0]['rate'] = 0;
					}
				}
				//var_dump($return);
				$return['results'] = $return;
			}

			if ($param == 'get_item_base_gudang') {
				$item_id = isset($_REQUEST['item_id']) ? is_numeric($_REQUEST['item_id']) ? $_REQUEST['item_id']  : -1 : -1;
				$limit = 1;
				//find_table_ecc($table, $field, $keyword = null)
				$item_detail = $this->main->find_table_ecc('dbo.dt_mst_item', 'item_id', $item_id);
				$item_base = $this->main->find_table_ecc('dbo.dt_mst_item_base', 'item_base_id', $item_detail[0]['item_base_id']);
				//var_dump($item_base);
				$return['item_base_code'] = $item_base[0]['item_base_code'];
				$return['item_base_id'] = $item_base[0]['item_base_id'];
				//$return['item_base_code'] ='test';
				$return['results'] = $return;
			}

			if ($param == 'get_mst_item_fabric') {
				$item_id = isset($_REQUEST['item_id']) ? is_numeric($_REQUEST['item_id']) ? $_REQUEST['item_id']  : -1 : -1;
				$limit = 1;

				$where = array();
				if ($item_id != -1) {
					$where['item_fabric_id'] = $item_id;
					$order = "item_fabric_id";
					$data_table = $this->main->getData_pop('dbo.dt_mst_item_fabric', null, $where, null, $order, $limit, $offset);
					//$item_detail = $this->main->find_table_ecc('dbo.dt_mst_item','item_id',$item_id);
					//$item_base = $this->main->find_table_ecc('dbo.dt_mst_item_base','item_base_id', $item_detail[0]['item_base_id']);

					//$return['item_base_code'] = $item_base[0]['item_base_code'];
					//$return['item_base_id'] = $item_base[0]['item_base_id'];
					$return['item_fabric_code'] = $data_table[0]['item_fabric_code'];
					$return['item_fabric_name'] = $data_table[0]['item_fabric_name'];
				} else {
					$return['item_fabric_code'] = '';
					$return['item_fabric_name'] = '';
				}
				$return['results'] = $return;
			}

			if ($param == 'get_cari_karyawan') {
				$karyawan_id = isset($_REQUEST['karyawan_id']) ? htmlentities($_REQUEST['karyawan_id']) : 0;
				$limit = 1;

				$where = array();
				if ($karyawan_id != null) {
					$where['karyawan_id'] = $karyawan_id;

					$order = "karyawan_id";
					$order2 = "pilih_id";

					$data_table = $this->main->getData_pop('dbo.dt_karyawan', null, $where, null, $order, $limit, $offset);
					$return['karyawan_name'] = $data_table[0]['karyawan_name'];
					$return['karyawan_nik'] = $data_table[0]['karyawan_nik'];
					$return['departemen'] = $data_table[0]['karyawan_departemen'];
					$return['divisi'] = $data_table[0]['karyawan_divisi'];

					$where2['pilih_id'] = $data_table[0]['karyawan_departemen'];
					$where3['pilih_id'] = $data_table[0]['karyawan_divisi'];

					$data_dept = $this->main->getData_pop('dbo.dt_pilih', null, $where2, null, $order2, $limit, $offset);
					$data_divisi = $this->main->getData_pop('dbo.dt_pilih', null, $where3, null, $order2, $limit, $offset);

					$return['karyawan_departemen'] = $data_dept[0]['uraian'];
					$return['karyawan_divisi'] = $data_divisi[0]['uraian'];
					$return['link_photo'] = $data_table[0]['karyawan_link_photo'];
				} else {

					$return['karyawan_name'] = '';
					$return['karyawan_nik'] = '';
					$return['karyawan_departemen'] = '';
					$return['karyawan_divisi'] = '';
					$return['link_photo'] = '';
					$return['departemen'] = '';
					$return['divisi'] = '';
				}

				$return['results'] = $return;
			}

			if ($param == 'get_sales_data') {
				$partner_id = isset($_REQUEST['partner_id']) ? htmlentities($_REQUEST['partner_id']) : false;
				$currencies_id = isset($_REQUEST['currencies_id']) ? htmlentities($_REQUEST['currencies_id']) : false;
				$item_id = isset($_REQUEST['item_id']) ? is_numeric($_REQUEST['item_id']) ? $_REQUEST['item_id']  : -1 : -1;
				$date = isset($_REQUEST['date']) ? htmlentities($_REQUEST['date']) : '1900-01-01';

				$where = array();
				// $where['partner_id'] = $partner_id;
				// $where['currencies_id'] = $currencies_id;
				$where['item_id'] = $item_id;

				$order = "sales_data_id desc";

				$data_table = $this->main->getData('dbo.view_sales_data', null, $where, null, $order, 1);
				if ($data_table) {
					$return = $data_table;
					$return[0]['unit_price'] = $this->mainconfig->get_decimal_format2($return[0]['unit_price'], 4);
					$return[0]['conversion'] = $this->mainconfig->get_decimal_format2($return[0]['conversion']);
				} else {
					$return[0]['unit_price'] = 0;
					$return[0]['conversion'] = 1;
					$return[0]['partner_uom_id'] = 1;
				}

				$where = array();
				$where['currencies_date_start <='] = $date;
				$where['currencies_date_end >='] = $date;
				$where['currencies_id'] = $currencies_id;

				$home_currency = $this->session->userdata('home_currencies');
				if ($home_currency == $currencies_id) {
					$return[0]['rate'] = 1;
				} else {
					$data_table = $this->main->getData('dbo.view_currencies_rate', null, $where, null, null, 1);
					if ($data_table) {
						$return2 = $data_table;
						$return[0]['rate'] = $this->mainconfig->get_decimal_format2($return2[0]['currencies_rate'], 8);
					} else {
						$return[0]['rate'] = 0;
					}
				}

				$return['results'] = $return;
			}

			if ($param == 'get_temp_shipment_detail') {
				//$po_warehouse_id = isset($_REQUEST['po_warehouse_id']) ? htmlentities($_REQUEST['po_warehouse_id']) : false;
				$po_warehouse_id = isset($_REQUEST['po_warehouse_id']) ? is_numeric($_REQUEST['po_warehouse_id']) ? $_REQUEST['po_warehouse_id']  : -1 : -1;
				$item_id = isset($_REQUEST['item_id']) ? is_numeric($_REQUEST['item_id']) ? $_REQUEST['item_id']  : -1 : -1;
				//$data_shipment_detail = $this->main->find_data_pop('dbo.dt_purchase_order_warehouse_detail','purchase_order_id',$po_warehouse_id);
				$limit = 1;

				$where = array();
				$where['purchase_order_id'] = $po_warehouse_id;
				$where['item_id'] = $item_id;
				//var_dump($where);
				//$order = "value asc";
				$order = "purchase_order_warehouse_detail";

				$data_table = $this->main->getData_pop('dbo.dt_purchase_order_warehouse_detail', null, $where, null, $order, $limit, $offset);
				//var_dump($data_table[0]);
				$return['purchase_order_detail_id'] = $data_table[0]['purchase_order_detail_id'];
				$return['purchase_order_warehouse_detail'] = $data_table[0]['purchase_order_warehouse_detail'];
				$return['results'] = $return;
			}

			if ($param == 'get_grn_custom') {
				$partner_id = isset($_REQUEST['partner_id']) ? is_numeric($_REQUEST['partner_id']) ? $_REQUEST['partner_id']  : -1 : -1;

				$where = array();
				$where['vendor_partner_id'] = $partner_id;
				if ($id) {
					if ($id == -1) {
						$limit = 1;
					} else {
						$where["id"] = $id;
					}
				} else {
					if ($q) {
						$where["value like '%" . $q . "%' AND 1="] = 1;
					}
				}

				$order = "value asc";

				$data_table = $this->main->getData('dbo.view_list_grn_custom', null, $where, null, $order, $limit, $offset);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['id'], "value" => $value['value'], "text" => $value['text']);
					}
				}

				$return['results'] = $return;
			}
			if ($param == 'get_shipment_code_new') {
				//jika dirubah cek dahulu datanya bro.takut ada terkait dengan data yang lain
				$purchase_order_id = isset($_REQUEST['purchase_order_id']) ? is_numeric($_REQUEST['purchase_order_id']) ? $_REQUEST['purchase_order_id']  : -1 : -1;

				$where = array();
				$where['purchase_order_id'] = $purchase_order_id;
				if ($id) {
					if ($id == -1) {
						$limit = 1;
					} else {
						$where["id"] = $id;
					}
				} else {
					if ($q) {
						$where["value like '%" . $q . "%' AND 1="] = 1;
					}
				}

				$order = "value asc";

				$data_table = $this->main->getData_pop('dbo.view_shipment_item_code', null, $where, null, $order, $limit, $offset);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['id'], "value" => $value['value'], "text" => $value['text']);
					}
				}

				$return['results'] = $return;
			}

			if ($param == 'get_po_add_receive') {
				$fabric_shipment_id = isset($_REQUEST['fabric_shipment_id']) ? is_numeric($_REQUEST['fabric_shipment_id']) ? $_REQUEST['fabric_shipment_id']  : -1 : -1;
				$where = array();
				$where['fabric_shipment_id'] = $fabric_shipment_id;
				//  var_dump($where);

				if ($id) {
					if ($id == -1) {
						$limit = 1;
					} else {
						$where["id"] = $id;
					}
				} else {
					if ($q) {
						$where["value like '%" . $q . "%' AND 1="] = 1;
					}
				}

				$order = "value asc";

				$data_table = $this->main->getData_pop('dbo.view_list_add_receive_gudang', null, $where, null, $order, $limit, $offset);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['id'], "value" => $value['value'], "text" => $value['text']);
					}
				}

				$return['results'] = $return;
			}

			if ($param == 'get_receive_code') {
				$po_no = isset($_REQUEST['po_no']) ? is_numeric($_REQUEST['po_no']) ? $_REQUEST['po_no']  : -1 : -1;
				$where = array();
				$where['purchase_order_id'] = $po_no;

				if ($id) {
					if ($id == -1) {
						$limit = 1;
					} else {
						$where["id"] = $id;
					}
				} else {
					if ($q) {
						$where["value like '%" . $q . "%' AND 1="] = 1;
					}
				}

				$order = "value asc";

				$data_table = $this->main->getData_pop('dbo.view_list_add_receive_item', null, $where, null, $order, $limit, $offset);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array(
							"id" => $value['id'],
							"value" => $value['value'],
							"text" => $value['text'],
							"fabric_shipment_detail_id" => $value['fabric_shipment_detail_id'],
							"purchase_order_detail_id" => $value['purchase_order_detail_id']
						);
					}
				}
				// var_dump($return);
				$return['results'] = $return;
			}
			// if ($param == 'get_shipment_code') {
			// 	$purchase_order_detail_id_tes = isset($_REQUEST['purchase_order_detail_id_tes']) ? is_numeric($_REQUEST['purchase_order_detail_id_tes']) ? $_REQUEST['purchase_order_detail_id_tes']  : -1 : -1;

			// 	$where = array();
			// 	$where['fabric_warehouse_receive_id'] = $purchase_order_detail_id_tes;
			// 	if ($id) {
			// 		if ($id == -1) {
			// 			$limit = 1;
			// 		} else {
			// 			$where["id"] = $id;
			// 		}
			// 	} else {
			// 		if ($q) {
			// 			$where["value like '%" . $q . "%' AND 1="] = 1;
			// 		}
			// 	}

			// 	$order = "value asc";

			// 	$data_table = $this->main->getData_pop('dbo.view_shipment_po', null, $where, null, $order, $limit, $offset);
			// 	if ($data_table) {
			// 		foreach ($data_table as $key => $value) {
			// 			$return[] = array("id" => $value['id'], "value" => $value['value'], "text" => $value['text']);
			// 		}
			// 	}

			// 	$return['results'] = $return;
			// }


			if ($param == 'get_shipment_code') {
				$purchase_order_warehouse_id = isset($_REQUEST['purchase_order_warehouse_id']) ? is_numeric($_REQUEST['purchase_order_warehouse_id']) ? $_REQUEST['purchase_order_warehouse_id']  : -1 : -1;
				//var_dump('hasilnya' . $purchase_order_warehouse_id);
				$where = array();
				$where['purchase_order_id'] = $purchase_order_warehouse_id;
				if ($id) {
					if ($id == -1) {
						$limit = 1;
					} else {
						$where["id"] = $id;
					}
				} else {
					if ($q) {
						$where["value like '%" . $q . "%' AND 1="] = 1;
					}
				}

				$order = "value asc";

				$data_table = $this->main->getData_pop('dbo.view_list_shipment_code', null, $where, null, $order, $limit, $offset);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['id'], "value" => $value['value'], "text" => $value['text']);
					}
				}
				$return['results'] = $return;
			}






			if ($param == 'get_shipment_code_fix') {

				$purchase_order_detail_id_tes = isset($_REQUEST['purchase_order_detail_id_tes'])
					? is_numeric($_REQUEST['purchase_order_detail_id_tes'])
					? $_REQUEST['purchase_order_detail_id_tes']
					: -1
					: -1;

				$where = array();
				$where['fabric_warehouse_receive_id'] = $purchase_order_detail_id_tes;

				if ($id) {
					if ($id == -1) {
						$limit = 1;
					} else {
						$where["item_id"] = $id; // ← pakai item_id bukan id
					}
				} else {
					if ($q) {
						$where["value like '%" . $q . "%' AND 1="] = 1;
					}
				}

				$order = "value asc";

				$data_table = $this->main->getData_pop(
					'dbo.view_shipment_po',
					null,
					$where,
					null,
					$order,
					$limit,
					$offset
				);

				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array(
							"id"    => $value['item_id'],   // ← eksplisit pakai item_id sebagai id dropdown
							"value" => $value['value'],
							"text"  => $value['text'],
							// fabric_warehouse_receive_detail_id berisi CSV "551,553,554,..."
							"fabric_warehouse_receive_detail_id" => isset($value['fabric_warehouse_receive_detail_id'])
								? $value['fabric_warehouse_receive_detail_id']
								: ''
						);
					}
				}

				$return['results'] = $return;
			}






			if ($param == 'get_location_detail_code') {
				$location_id_tes = isset($_REQUEST['location_id_tes']) ? is_numeric($_REQUEST['location_id_tes']) ? $_REQUEST['location_id_tes']  : -1 : -1;

				$where = array();
				$where['location_id'] = $location_id_tes;
				if ($id) {
					if ($id == -1) {
						$limit = 1;
					} else {
						$where["id"] = $id;
					}
				} else {
					if ($q) {
						$where["value like '%" . $q . "%' AND 1="] = 1;
					}
				}

				$order = "value asc";

				$data_table = $this->main->getData_pop('dbo.view_list_location_detail', null, $where, null, $order, $limit, $offset);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['id'], "value" => $value['value'], "text" => $value['text']);
					}
				}

				$return['results'] = $return;
			}

			if ($param == 'get_delivery_custom') {
				$partner_id = isset($_REQUEST['partner_id']) ? is_numeric($_REQUEST['partner_id']) ? $_REQUEST['partner_id']  : -1 : -1;

				$where = array();
				$where['partner_id'] = $partner_id;
				if ($id) {
					if ($id == -1) {
						$limit = 1;
					} else {
						$where["id"] = $id;
					}
				} else {
					if ($q) {
						$where["value like '%" . $q . "%' AND 1="] = 1;
					}
				}

				if ($q) {
					$where["value like '%" . $q . "%' AND 1="] = 1;
				}

				$order = "value asc";

				$data_table = $this->main->getData('dbo.view_list_delivery_custom', null, $where, null, $order, $limit, $offset);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['id'], "value" => $value['value'], "text" => $value['text']);
					}
				}

				$return['results'] = $return;
			}

			if ($param == 'get_bom_process') {
				$item_id = isset($_REQUEST['item_id']) ? is_numeric($_REQUEST['item_id']) ? $_REQUEST['item_id']  : -1 : -1;

				$where = array();
				$where['fg_item_id'] = $item_id;
				if ($id) {
					if ($id == -1) {
						$limit = 1;
					} else {
						$where["id"] = $id;
					}
				} else {
					if ($q) {
						$where["value like '%" . $q . "%' AND 1="] = 1;
					}
				}

				$order = "value asc";

				$data_table = $this->main->getData('dbo.view_list_bom_process', null, $where, null, $order, $limit, $offset);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['id'], "value" => $value['value'], "text" => $value['text']);
					}
				}

				$return['results'] = $return;
			}

			if ($param == 'get_item_from_work_order_detail') {
				$work_order_plan_id = isset($_REQUEST['work_order_plan_id']) ? is_numeric($_REQUEST['work_order_plan_id']) ? $_REQUEST['work_order_plan_id']  : -1 : -1;
				$work_order_detail_id = isset($_REQUEST['work_order_detail_id']) ? is_numeric($_REQUEST['work_order_detail_id']) ? $_REQUEST['work_order_detail_id']  : -1 : -1;

				$where = array();
				$where['work_order_plan_id'] = $work_order_plan_id;
				$where['work_order_detail_id'] = $work_order_detail_id;
				if ($id) {
					if ($id == -1) {
						$limit = 1;
					} else {
						$where["id"] = $id;
					}
				} else {
					if ($q) {
						$where["value like '%" . $q . "%' AND 1="] = 1;
					}
				}

				$order = "value asc";

				$data_table = $this->main->getData('dbo.view_list_item_from_work_order_detail', null, $where, null, $order, $limit, $offset);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['id'], "value" => $value['value'], "text" => $value['text']);
					}
				}

				$return['results'] = $return;
			}


			if ($param == 'get_work_order_detail_item') {
				$work_order_plan_id = isset($_REQUEST['work_order_plan_id']) ? is_numeric($_REQUEST['work_order_plan_id']) ? $_REQUEST['work_order_plan_id']  : -1 : -1;
				$work_process_id = isset($_REQUEST['work_process_id']) ? is_numeric($_REQUEST['work_process_id']) ? $_REQUEST['work_process_id']  : -1 : -1;

				$where = array();
				$where['work_order_plan_id'] = $work_order_plan_id;
				$where['work_process_id'] = $work_process_id;
				if ($id) {
					if ($id == -1) {
						$limit = 1;
					} else {
						$where["id"] = $id;
					}
				} else {
					if ($q) {
						$where["value like '%" . $q . "%' AND 1="] = 1;
					}
				}

				$order = "value asc";

				$data_table = $this->main->getData('dbo.view_list_work_order_detail_item', null, $where, null, $order, $limit, $offset);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['id'], "value" => $value['value'], "text" => $value['text']);
					}
				}

				$return['results'] = $return;
			}



			if ($param == 'get_work_order_detail_item_from_plan') {
				$work_order_plan_id = isset($_REQUEST['work_order_plan_id']) ? is_numeric($_REQUEST['work_order_plan_id']) ? $_REQUEST['work_order_plan_id']  : -1 : -1;

				$where = array();
				$where['work_order_plan_id'] = $work_order_plan_id;
				if ($id) {
					if ($id == -1) {
						$limit = 1;
					} else {
						$where["id"] = $id;
					}
				}

				if ($q) {
					$where["value like '%" . $q . "%' AND 1="] = 1;
				}

				$order = "value asc";

				$data_table = $this->main->getData('dbo.view_list_work_order_detail_item_from_plan', null, $where, null, $order, $limit, $offset);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['id'], "value" => $value['value'], "text" => $value['text']);
					}
				}

				$return['results'] = $return;
			}

			if ($param == 'get_item_from_work_order_plan_process') {
				$work_order_plan_id = isset($_REQUEST['work_order_plan_id']) ? is_numeric($_REQUEST['work_order_plan_id']) ? $_REQUEST['work_order_plan_id']  : -1 : -1;
				$work_process_id = isset($_REQUEST['work_process_id']) ? is_numeric($_REQUEST['work_process_id']) ? $_REQUEST['work_process_id']  : -1 : -1;
				$work_order_detail_id = isset($_REQUEST['work_order_detail_id']) ? is_numeric($_REQUEST['work_order_detail_id']) ? $_REQUEST['work_order_detail_id']  : -1 : -1;

				$where = array();
				$where['work_order_plan_id'] = $work_order_plan_id;
				$where['work_process_id'] = $work_process_id;
				$where['work_order_detail_id'] = $work_order_detail_id;
				if ($id) {
					if ($id == -1) {
						$limit = 1;
					} else {
						$where["id"] = $id;
					}
				} else {
					if ($q) {
						$where["value like '%" . $q . "%' AND 1="] = 1;
					}
				}

				$order = "value asc";

				$data_table = $this->main->getData('dbo.view_list_item_from_work_order_plan_process', null, $where, null, $order, $limit, $offset);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['id'], "value" => $value['value'], "text" => $value['text']);
					}
				}

				$return['results'] = $return;
			}

			if ($param == 'get_work_order_detail_process') {
				$work_order_plan_id = isset($_REQUEST['work_order_plan_id']) ? is_numeric($_REQUEST['work_order_plan_id']) ? $_REQUEST['work_order_plan_id']  : -1 : -1;

				$where = array();
				$where['work_order_plan_id'] = $work_order_plan_id;
				if ($id) {
					if ($id == -1) {
						$limit = 1;
					} else {
						$where["id"] = $id;
					}
				} else {
					if ($q) {
						$where["value like '%" . $q . "%' AND 1="] = 1;
					}
				}

				$order = "value asc";

				$data_table = $this->main->getData('dbo.view_list_work_order_detail_process', null, $where, null, $order, $limit, $offset);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['id'], "value" => $value['value'], "text" => $value['text']);
					}
				}

				$return['results'] = $return;
			}

			if ($param == 'get_bom_from_work_order') {
				$work_order_id = isset($_REQUEST['work_order_id']) ? is_numeric($_REQUEST['work_order_id']) ? $_REQUEST['work_order_id']  : -1 : -1;

				$where = array();
				$where['work_order_id'] = $work_order_id;
				if ($id) {
					if ($id == -1) {
						$limit = 1;
					} else {
						$where["id"] = $id;
					}
				} else {
					if ($q) {
						$where["value like '%" . $q . "%' AND 1="] = 1;
					}
				}

				$order = "value asc";

				$data_table = $this->main->getData('dbo.view_list_bom_from_work_order', null, $where, null, $order, $limit, $offset);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['id'], "value" => $value['value'], "text" => $value['text']);
					}
				}

				$return['results'] = $return;
			}

			if ($param == 'get_bom') {
				$item_id = isset($_REQUEST['item_id']) ? is_numeric($_REQUEST['item_id']) ? $_REQUEST['item_id']  : -1 : -1;
				$where = array();
				if ($id) {
					if ($id == -1) {
						$where['fg_item_id'] = $item_id;
						$limit = 1;
					} else {
						$where["id"] = $id;
					}
				} else {
					$where['fg_item_id'] = $item_id;
					if ($q) {
						$where["value like '%" . $q . "%' AND 1="] = 1;
					}
				}

				$order = "value asc";

				$data_table = $this->main->getData('dbo.view_list_bom', null, $where, null, $order, $limit, $offset);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['id'], "value" => $value['value'], "text" => $value['text']);
					}
				}

				$return['results'] = $return;
			}

			if ($param == 'get_bom_assets') {
				$item_id = isset($_REQUEST['item_id']) ? is_numeric($_REQUEST['item_id']) ? $_REQUEST['item_id']  : -1 : -1;
				//print_r($q);
				$where = array();
				if ($id) {
					if ($id == -1) {
						$where['item_id'] = $item_id;
						$limit = 1;
					} else {
						$where["item_id"] = $id;
					}
				} else {
					$where['item_id'] = $item_id;
					if ($q) {
						$where["item_code like '%" . $q . "%' AND 1="] = 1;
					}
				}

				$order = "item_code asc";

				$data_table = $this->main->getData('dbo.view_data_assets', null, $where, null, $order, $limit, $offset);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$category = $value['item_category_id'];
						$code = $value['item_code'];
						$return = array("item_id" => $value['item_id'], "item_code" => $value['item_code'], "stock" => $value['stock'], "msg" => "ada");
					}

					$where2 = array();
					$where2['item_category_id'] = $category;
					$order2 = "item_category_id asc";
					$data_table2 = $this->main->getData('dbo.view_item_category', null, $where2, null, $order2, '1', $offset);
					foreach ($data_table2 as $key2 => $value2) {
						$item_category_name = $value2['item_category_name'];
					}
					$where3['item_code'] = $code;
					$data_table3 = $this->main->getData_sum('dbo.view_data_assets_outgoing', null, $where3, null, '', '', '');
					foreach ($data_table3 as $key3 => $value3) {
						$quantity = $value3['sum'];
					}

					// $where4['item_code']=$code;	   
					$data_table4 = $this->main->getData_sum('dbo.view_data_assets_incoming', null, $where3, null, '', '', '');
					foreach ($data_table4 as $key4 => $value4) {
						$quantity_masuk = $value4['sum'];
					}
					$sisa = $quantity_masuk	- $quantity;
					$tambah = array('quantity' => $sisa, 'item_category_name' => $item_category_name);
					//array_push($return,$item_category_name);
					array_push($return, $tambah);
				} else {
					$return[] = array("msg" => "kosong");
					//print_r('Nihil');
				}
				$return['results'] = $return;
			}

			if ($param == 'get_stock_transfer') {
				//$item_id = isset($_REQUEST['item_id']) ? is_numeric($_REQUEST['item_id']) ? $_REQUEST['item_id']  : -1 : -1;
				$item_code = isset($_POST['code_id']) ? $_POST['code_id'] : '';
				$id_barang = isset($_POST['id_barang']) ? $_POST['id_barang'] : '';
				$where_brg = array();
				if ($id_barang) {
					$where_brg['item_id'] = $id_barang;
					$data_barang = $this->main->getData('dbo.dt_mst_item', null, $where_brg, null, '', '', '');
					$item_code = $data_barang[0]['item_code'];
					// var_dump( $data_barang[0]['item_code']);
				}
				//$item_code = $id;
				//$param_pop = isset($_POST['param_pop']) ? $_POST['param_pop'] : '';
				// $q = isset($_REQUEST['q']) ? htmlentities($_REQUEST['q']) : false;
				// var_dump( $item_code);
				//print_r($q);
				$where = array();
				if ($item_code) {
					$where['item_code'] = $item_code;

					$limit = 1;
				} else {
					//$where['item_id'] = $item_id;
					$where['item_code'] = $item_code;
				}
				// var_dump( $where);
				$order = "item_code asc";
				//var_dump($item_code);
				//$data_table = $this->main->getData('dbo.view_data_assets', null, $where, null, $order , $limit, $offset);
				$data_table = $this->main->getData('dbo.view_data_assets', null, $where, null, '', '', '');
				if ($data_table) {
					$date_awal = date("Y-m-d", strtotime(date("Y-m-d", strtotime(date("Y-m-d"))) . "-1 month"));
					$date_akhir = date("Y-m-d");
					//$data_table_rpt= $this->main->supply_rpt_bahan_baku($date_awal,$date_akhir,$item_code);

					//var_dump($data_table_rpt[0]['stock_report']);

					foreach ($data_table as $key => $value) {
						$category = $value['item_category_id'];
						//  $code=$value['item_code'];
						$return = array("item_id" => $value['item_id'], "item_code" => $value['item_code'], "stock" => $value['stock'], "msg" => "ada");
					}
					$return[] = $return;
					$where2 = array();
					$where2['item_category_id'] = $category;
					$order2 = "item_category_id asc";
					$data_table2 = $this->main->getData('dbo.view_item_category', null, $where2, null, $order2, '1', $offset);
					foreach ($data_table2 as $key2 => $value2) {
						$item_category_name = $value2['item_category_name'];
						$custom_item_type = $value2['custom_item_type'];
					}

					if ($custom_item_type == 'Bahan Baku & Bahan Penolong') {
						$data_table_rpt = $this->main->supply_rpt_bahan_baku($date_awal, $date_akhir, $item_code);
					} else {
						$data_table_rpt = $this->main->supply_rpt_barang_jadi($date_awal, $date_akhir, $item_code);
					}

					$where3['item_code'] = $item_code;
					$data_table3 = $this->main->getData_sum('dbo.view_data_assets_outgoing', null, $where3, null, '', '', '');
					foreach ($data_table3 as $key3 => $value3) {
						$quantity = $value3['sum'];
					}

					// $where4['item_code']=$code;	   
					$data_table4 = $this->main->getData_sum('dbo.view_data_assets_incoming', null, $where3, null, '', '', '');
					$data_table5 = $this->main->getData_ecc('dbo.view_data_assets_incoming', null, $where3, 'item_code', '', '', '', 'sum(quantity - quantity_used) as total_assets');
					//getData($table, $key = null, $where = null, $group = null, $order = null, $limit = null, $offset = 0)
					//var_dump($data_table5);die();
					foreach ($data_table4 as $key4 => $value4) {
						$quantity_masuk = $value4['sum'];
					}
					$sisa = $quantity_masuk	- $quantity;

					//number_format($data_table_rpt[0]['stock_report'],10)
					$tambah = array('quantity' => number_format($sisa, 10), 'item_category_name' => $item_category_name, 'stock_report' => $data_table_rpt[0]['stock_report'], "stock_assets" => $data_table5[0]['total_assets']);
					$return[] = $tambah;
					//array_push($return,$item_category_name);
					// array_push($return,$tambah);
				} else {
					$return[] = array("item_id" => '', "item_code" => 0, "stock" => 0, "msg" => "No");
					$return[] = array('quantity' => 0, 'item_category_name' => '', 'stock_report' => 0, "stock_assets" => 0);

					//	$tambah = array('quantity' => 0, 'item_category_name' => 0, 'stock_report' => 0,"stock_assets"=>0);
					//	$return[] = $tambah;
					//$return[] = array("msg" => "kosong");
					//print_r('Nihil');
				}
				$return['results'] = $return;
			}

			if ($param == 'get_grn_purchase') {
				$partner_id = isset($_REQUEST['partner_id']) ? is_numeric($_REQUEST['partner_id']) ? $_REQUEST['partner_id']  : -1 : -1;

				$where = array();
				$where['partner_id'] = $partner_id;
				if ($id) {
					if ($id == -1) {
						$limit = 1;
					} else {
						$where["id"] = $id;
					}
				} else {
					if ($q) {
						$where["value like '%" . $q . "%' AND 1="] = 1;
					}
				}

				$order = "value asc";

				$data_table = $this->main->getData('dbo.view_list_grn_purchase', null, $where, null, $order, $limit, $offset);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['id'], "value" => $value['value'], "text" => $value['text']);
					}
				}

				$return['results'] = $return;
			}

			if ($param == 'get_delivery_sales') {
				$partner_id = isset($_REQUEST['partner_id']) ? is_numeric($_REQUEST['partner_id']) ? $_REQUEST['partner_id']  : -1 : -1;

				$where = array();
				$where['partner_id'] = $partner_id;
				if ($id) {
					if ($id == -1) {
						$limit = 1;
					} else {
						$where["id"] = $id;
					}
				} else {
					if ($q) {
						$where["value like '%" . $q . "%' AND 1="] = 1;
					}
				}

				$order = "value asc";

				$data_table = $this->main->getData('dbo.view_list_delivery_sales', null, $where, null, $order, $limit, $offset);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['id'], "value" => $value['value'], "text" => $value['text']);
					}
				}

				$return['results'] = $return;
			}

			if ($param == 'get_supply_sales') {
				$partner_id = isset($_REQUEST['partner_id']) ? is_numeric($_REQUEST['partner_id']) ? $_REQUEST['partner_id']  : -1 : -1;

				$where = array();
				$where['partner_id'] = $partner_id;
				if ($id) {
					if ($id == -1) {
						$limit = 1;
					} else {
						$where["id"] = $id;
					}
				} else {
					if ($q) {
						$where["value like '%" . $q . "%' AND 1="] = 1;
					}
				}

				$order = "value asc";

				$data_table = $this->main->getData('dbo.view_list_supply_sales', null, $where, null, $order, $limit, $offset);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['id'], "value" => $value['value'], "text" => $value['text']);
					}
				}

				$return['results'] = $return;
			}

			if ($param == 'get_gl_parent_group') {
				$gl_account_group_id = isset($_REQUEST['gl_account_group_id']) ? is_numeric($_REQUEST['gl_account_group_id']) ? $_REQUEST['gl_account_group_id']  : -2 : -2;
				$id = isset($_REQUEST['id']) ? is_numeric($_REQUEST['id']) ? $_REQUEST['id']  : -1 : -1;

				$where = array();
				if ($gl_account_group_id != -2) {
					$where['gl_account_group_id !='] = $gl_account_group_id;
				}

				if ($id) {
					if ($id == -1) {
						$limit = 1;
					} else {
						$where["id"] = $id;
					}

					if ($q) {
						$where["value like '%" . $q . "%' AND 1="] = 1;
					}
				} else {

					if ($id == 0) {
						$where["id"] = 0;
					}

					if ($q) {
						$where["value like '%" . $q . "%' AND 1="] = 1;
					}
				}

				$order = "id asc";

				$data_table = $this->main->getData('dbo.view_list_gl_account_group_parent', null, $where, null, $order, null, $offset);

				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['id'], "value" => $value['value'], "text" => $value['text']);
					}
				}

				$return['results'] = $return;
			}

			if ($param == 'get_rate_data') {
				$currencies_id = isset($_REQUEST['currencies_id']) ? is_numeric($_REQUEST['currencies_id']) ? $_REQUEST['currencies_id']  : -2 : -2;
				$date = isset($_REQUEST['date']) ? $_REQUEST['date'] : '1900-01-01';

				$where = array();
				$where['currencies_date_start <='] = $date;
				$where['currencies_date_end >='] = $date;
				$where['currencies_id'] = $currencies_id;

				$home_currency = $this->session->userdata('home_currencies');
				if ($home_currency == $currencies_id) {
					$return[0]['rate'] = 1;
				} else {
					$data_table = $this->main->getData('dbo.view_currencies_rate', null, $where, null, null, 1);
					if ($data_table) {
						$return2 = $data_table;
						$return[0]['rate'] = $this->mainconfig->get_decimal_format2($return2[0]['currencies_rate'], 8);
					} else {
						$return[0]['rate'] = 0;
					}

					$return['results'] = $return;
				}
			}
			if ($param == 'get_fabric_location') {
				$where = array();

				if ($q) {
					$where["value like '%" . $q . "%' AND 1="] = 1;
				}

				$return[] = array("id" => 0, "value" => 'All', "text" => 'All');
				$data_table = $this->main->getData_pop('dbo.view_list_location', null, $where, null, null, 10);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['id'], "value" => $value['value'], "text" => $value['text']);
					}
				}

				$return['results'] = $return;
			}
			if ($param == 'get_fabric_location_update_new') {
				$where = array();

				if ($q) {
					$where["value like '%" . $q . "%' AND 1="] = 1;
				}

				// $return[] = array("id" => 0, "value" => 'All', "text" => 'All');
				$data_table = $this->main->getData_pop('dbo.view_list_location', null, $where, null, null, 10);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['id'], "value" => $value['value'], "text" => $value['text']);
					}
				}

				$return['results'] = $return;
			}
			if ($param == 'get_fabric_location_update_location') {
				$where = array();

				if ($q) {
					$where["value like '%" . $q . "%' AND 1="] = 1;
				}

				$return[] = array("id" => 0, "value" => 'All', "text" => 'All');
				$data_table = $this->main->getData_pop('dbo.view_list_location', null, $where, null, null, 10);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['id'], "value" => $value['value'], "text" => $value['text']);
					}
				}

				$return['results'] = $return;
			}
			if ($param == 'get_fabric_location_shipment') {
				$where = array();

				if ($q) {
					$where["value like '%" . $q . "%' AND 1="] = 1;
				}

				// $return[] = array("id" => 0, "value" => 'All', "text" => 'All');
				$data_table = $this->main->getData_pop('dbo.view_list_location', null, $where, null, null, 10);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['id'], "value" => $value['value'], "text" => $value['text']);
					}
				}

				$return['results'] = $return;
			}
			if ($param == 'get_fabric_location_update') {
				$where = array();

				if ($q) {
					$where["value like '%" . $q . "%' AND 1="] = 1;
				}

				// $return[] = array("id" => 0, "value" => 'All', "text" => 'All');
				$data_table = $this->main->getData_pop('dbo.view_list_location', null, $where, null, null, 10);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['id'], "value" => $value['value'], "text" => $value['text']);
					}
				}

				$return['results'] = $return;
			}
			if ($param == 'get_fabric_location_update_split') {
				$where = array();

				if ($q) {
					$where["value like '%" . $q . "%' AND 1="] = 1;
				}

				// $return[] = array("id" => 0, "value" => 'All', "text" => 'All');
				$data_table = $this->main->getData_pop('dbo.view_list_location', null, $where, null, null, 10);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['id'], "value" => $value['value'], "text" => $value['text']);
					}
				}

				$return['results'] = $return;
			}



			if ($param == 'get_item_detail') {
				$where = array();

				if ($q) {
					$where["value like '%" . $q . "%' AND 1="] = 1;
				}

				$return[] = array("id" => 0, "value" => 'All', "text" => 'All');
				$data_table = $this->main->getData_pop('dbo.list_item_detail', null, $where, null, null, 10);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['id'], "value" => $value['value'], "text" => $value['text']);
					}
				}

				$return['results'] = $return;
			}



			if ($param == 'get_item_location') {
				// $id = isset($_REQUEST['stock_move_sipop_id']) ? is_numeric($_REQUEST['stock_move_sipop_id']) ? $_REQUEST['stock_move_sipop_id']  : -1 : -1;

				$where = array();

				if ($id) {
					if ($id == -1) {
						$limit = 1;
					} else {
						$where["id"] = $id;
					}
				} else {
					if ($q) {
						$where["value like '%" . $q . "%' AND 1="] = 1;
					}
				}

				$order = "text asc";

				$data_table = $this->main->getData_pop('dbo.list_item_location', null, $where, null, $order, $limit, $offset);

				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['id'], "value" => $value['value'], "text" => $value['text']);
					}
				}

				$return['results'] = $return;
			}

			if ($param == 'get_location_base_id') {
				$where = array();

				if ($q) {
					$where["value like '%" . $q . "%' AND 1="] = 1;
				}

				$return[] = array("id" => 0, "value" => 'All', "text" => 'All');
				$data_table = $this->main->getData_pop('dbo.view_list_location_base', null, $where, null, null, 10);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['id'], "value" => $value['value'], "text" => $value['text']);
					}
				}

				$return['results'] = $return;
			}

			if ($param == 'get_contract_subcon') {
				$partner_id = isset($_REQUEST['partner_id']) ? is_numeric($_REQUEST['partner_id']) ? $_REQUEST['partner_id'] : -1 : -1;

				$where = array();
				$where['partner_id'] = $partner_id;
				//var_dump($partner_id);
				if ($id) {
					if ($id == -1) {
						$limit = 1;
					} else {
						$where["id"] = $id;
					}
				}

				if ($q) {
					$where["value like '%" . $q . "%' AND 1="] = 1;
				}

				$order = "contract_subcon_date_start desc";

				$data_table = $this->main->getData('dbo.view_list_contract_subcon', null, $where, null, $order);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						$return[] = array("id" => $value['id'], "value" => $value['value'], "text" => $value['text']);
					}
				}

				$return['results'] = $return;
			}

			if ($param == 'get_app_trans_no') {
				$app_trans_id = isset($_REQUEST['app_trans_id']) ? is_numeric($_REQUEST['app_trans_id']) ? $_REQUEST['app_trans_id'] : -1 : -1;
				$return = "";

				$where = array();
				$where['app_trans_id'] = $app_trans_id;

				$order = null;

				$data_table = $this->main->getData('dbo.view_app_trans', null, $where, null, $order, 1);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						if (date('Ym', strtotime($value['app_trans_last_date'])) != date('Ym')) {
							$app_trans_no = 0;
						} else {
							$app_trans_no = $value['app_trans_no'];
						}

						$app_trans_no++;

						$return .= $value['app_trans_prefix'];
						$return .= "-" . date('Y/m/d');
						$return .= "-" . str_pad($app_trans_no, 4, "0", STR_PAD_LEFT);
					}
				}
			}

			if ($param == 'get_app_trans_no_delivery') {
				$app_trans_id = isset($_REQUEST['app_trans_id']) ? is_numeric($_REQUEST['app_trans_id']) ? $_REQUEST['app_trans_id'] : -1 : -1;
				$custom_type_id = isset($_REQUEST['custom_type_id']) ? is_numeric($_REQUEST['custom_type_id']) ? $_REQUEST['custom_type_id'] : -1 : -1;
				$return = "";

				//======== cek data dari ecc ==========
				$where_ecc = array();
				$where_ecc['custom_type_id'] = $custom_type_id;
				$order_ecc = 'bc_out_header_id DESC';
				$data_table_ecc = $this->main->getData('dbo.dt_bc_out_header', null, $where_ecc, null, $order_ecc, 1);
				$no_ecc = $data_table_ecc[0]['no_surat_jalan'];
				$tanggal_ecc = $data_table_ecc[0]['tanggal_surat_jalan'];

				// memisahkan string menjadi array
				$data_no_surat_jalan = explode("/", $no_ecc);
				$no_surat_jalan = $data_no_surat_jalan[0];
				if ($custom_type_id == 10) {
					$no_surat_jalan2 = explode("-", $no_surat_jalan);
					$no_surat_jalan = $no_surat_jalan2[0];
				}
				$no_surat_jalan++;
				//var_dump($no_surat_jalan);
				//======== Akhir cek data dari ecc ==========

				$where = array();
				$where['app_trans_id'] = $app_trans_id;
				$order = null;
				$data_table = $this->main->getData_pop('dbo.view_app_trans', null, $where, null, $order, 1);
				if ($data_table) {
					foreach ($data_table as $key => $value) {

						if (date('Ym', strtotime($value['app_trans_last_date'])) != date('Ym')) {
							$app_trans_no = 0;
						} else {
							$format_date = date('m/Y');
							$app_trans_no = $value['app_trans_no'];
						}


						$format_tahun = date('Y');

						if ($app_trans_id == 514) {
							//BC25 =009/POP/25/2025
							$format_date = "POP/25/" . $format_tahun;
						} else if ($app_trans_id == 517) {
							$bulan = $this->konversiBulanRomawi(date('m'));
							$format_date = $bulan . "/" . $format_tahun;
						}

						$app_trans_no++;

						if ($no_surat_jalan < $app_trans_no) {
							$no_surat_jalan = $app_trans_no;
						}
						//$no=str_pad($app_trans_no, 4, "0", STR_PAD_LEFT);
						$no = str_pad($no_surat_jalan, 4, "0", STR_PAD_LEFT);
						$return .= $no;

						if ($app_trans_id == 517) {
							$return .= "-" . $no . "/" . $format_date;
						} else {
							$return .= "/" . $format_date;
						}
					}
				}
			}
			if ($param == 'get_app_trans_no_delivery_bc_out') {
				$bc_out_header_id = isset($_REQUEST['bc_out_header_id']) ? is_numeric($_REQUEST['bc_out_header_id']) ? $_REQUEST['bc_out_header_id'] : -1 : -1;
				$return = "";
				$where1 = array();
				$where1['bc_out_header_id'] = $bc_out_header_id;

				$order = null;

				$data_table_header = $this->main->getData('dbo.dt_bc_out_header', null, $where1, null, $order, 1);
				if ($data_table_header) {
					foreach ($data_table_header as $key => $value) {
						$custom_type_id = $value['custom_type_id'];
						if ($custom_type_id == 8) // BC 261
						{
							$app_trans_id = 515;
						} else if ($custom_type_id == 7) //BC 25
						{
							$app_trans_id = 514;
						} else if ($custom_type_id == 9) // BC 27 keluar
						{
							$app_trans_id = 516;
						} else if ($custom_type_id == 10) // BC 30
						{
							$app_trans_id = 517;
						} else if ($custom_type_id == 12) // BC 41
						{
							$app_trans_id = 519;
						} else {
							$app_trans_id = 519;
						}

						$where = array();
						$where['app_trans_id'] = $app_trans_id;
						$order = null;
						$data_table_trans = $this->main->getData_pop('dbo.view_app_trans', null, $where, null, $order, 1);
						if ($data_table_trans) {
							foreach ($data_table_trans as $key => $value) {
								if (date('Ym', strtotime($value['app_trans_last_date'])) != date('Ym')) {
									$app_trans_no = 0;
								} else {
									$format_date = date('m/Y');
									$app_trans_no = $value['app_trans_no'];
								}
								$format_tahun = date('Y');

								if ($app_trans_id == 514) {
									//BC25 =009/POP/25/2025
									$format_date = "POP/25/" . $format_tahun;
								} else if ($app_trans_id == 517) {
									$bulan = $this->konversiBulanRomawi(date('m'));
									$format_date = $bulan . "/" . $format_tahun;
								}

								$app_trans_no++;
								$no = str_pad($app_trans_no, 4, "0", STR_PAD_LEFT);
								$return .= $no;

								if ($app_trans_id == 517) {
									$return .= "-" . $no . "/" . $format_date;
								} else {
									$return .= "/" . $format_date;
								}
							}
						}

						// =========== untuk Delivery asli 
						$where_ori = array();
						$where_ori['app_trans_id'] = 39;
						$return_ori = "";
						$data_table_ori = $this->main->getData('dbo.view_app_trans', null, $where_ori, null, $order, 1);
						if ($data_table_ori) {
							foreach ($data_table_ori as $key => $value2) {
								if (date('Ym', strtotime($value2['app_trans_last_date'])) != date('Ym')) {
									$app_trans_no_ori = 0;
								} else {
									$app_trans_no_ori = $value2['app_trans_no'];
								}

								$app_trans_no_ori++;

								//$nomor = str_pad($app_trans_no_ori, 4, "0", STR_PAD_LEFT);
								$return_ori .= $value2['app_trans_prefix'];
								$return_ori .= "-" . date('Y/m/d');
								//$return_ori .= "-" . $nomor;  
								$return_ori .= "-" . str_pad($app_trans_no_ori, 4, "0", STR_PAD_LEFT);
							}
						}




						$return = array("no" => $return, "app_trans_id" => $app_trans_id, "no_ori" => $return_ori, "app_trans_no" => $no);
						$return['results'] = $return;
						//var_dump($return);die();
					}
				}
			}

			if ($param == 'get_app_trans_good_receive') {
				//var_dump ($data_txt);die();
				$return = "";
				$this->load->model('main');
				$app_trans_id_ori = isset($_REQUEST['type_dokumen']) ? is_numeric($_REQUEST['type_dokumen']) ? $_REQUEST['type_dokumen'] : -1 : -1;

				$where = array();
				//$where['app_trans_id=509 or app_trans_id=511 or app_trans_id=512 or app_trans_id='] = 10;
				$where['app_trans_id=509 or app_trans_id=511 or app_trans_id=512 or app_trans_id='] = $app_trans_id_ori;
				$order = null;

				$where_ecc = array();
				$where_ecc['app_trans_id'] = 10;


				$data_table = $this->main->getData_pop('dbo.view_app_trans', null, $where, null, $order, 4);
				$data_table_ecc = $this->main->getData('dbo.view_app_trans', null, $where_ecc, null, $order, 1);
				foreach ($data_table_ecc as $dt_param_ecc) {
					$no_table_ecc = $dt_param_ecc['app_trans_no'];
				}
				//var_dump($app_trans_no_ecc);

				foreach ($data_table as $dt_param) {
					//var_dump ($dt_param);
					if ($dt_param['app_trans_id'] == 509) {
						$app_trans_id_acc = $dt_param['app_trans_id'];
						$app_trans_acc = $dt_param['app_trans'];
						$app_trans_no_acc = $dt_param['app_trans_no'];
						$app_trans_prefix_acc = $dt_param['app_trans_prefix'];
						$app_trans_pattern_acc = $dt_param['app_trans_pattern'];
						$app_trans_last_date_acc = $dt_param['app_trans_last_date'];
						$no_ecc_acc = 0;
					} else if ($dt_param['app_trans_id'] == 511) {
						$app_trans_id_fbr = $dt_param['app_trans_id'];
						$app_trans_fbr = $dt_param['app_trans'];
						$app_trans_no_fbr = $dt_param['app_trans_no'];
						$app_trans_prefix_fbr = $dt_param['app_trans_prefix'];
						$app_trans_pattern_fbr = $dt_param['app_trans_pattern'];
						$app_trans_last_date_fbr = $dt_param['app_trans_last_date'];
						$no_ecc_fbr = 0;
					} else if ($dt_param['app_trans_id'] == 512) {
						$app_trans_id_msn = $dt_param['app_trans_id'];
						$app_trans_msn = $dt_param['app_trans'];
						$app_trans_no_msn = $dt_param['app_trans_no'];
						$app_trans_prefix_msn = $dt_param['app_trans_prefix'];
						$app_trans_pattern_msn = $dt_param['app_trans_pattern'];
						$app_trans_last_date_msn = $dt_param['app_trans_last_date'];
						$no_ecc_msn = 0;
					} else {
						$app_trans_id_grn = $dt_param['app_trans_id'];
						$app_trans = $dt_param['app_trans'];
						$app_trans_no = $dt_param['app_trans_no'];
						$app_trans_prefix = $dt_param['app_trans_prefix'];
						$app_trans_pattern = $dt_param['app_trans_pattern'];
						$app_trans_last_date = $dt_param['app_trans_last_date'];
						$no_ecc_grn = $no_table_ecc;
					}
				}

				$cek_user_ACC = [59, 79];
				$cek_user_FBR = [14, 63];
				$cek_user_MSN = [17];

				if (in_array($this->session->userdata('user_id'), $cek_user_ACC, true)) {
					$TMP_ACC = $app_trans_prefix_acc;
					$app_trans_id = $app_trans_id_acc;
					$no = $app_trans_no_acc + 1;
					$no_ecc = $no_ecc_acc;
					$return .= $TMP_ACC;
					$return .= "-" . date('Y/m/d');

					// return .= "-".str_pad($no, 4, "0", STR_PAD_LEFT);
				} else if (in_array($this->session->userdata('user_id'), $cek_user_FBR, true)) {
					$TMP_FBR = $app_trans_prefix_fbr;
					$app_trans_id = $app_trans_id_fbr;
					$no = $app_trans_no_fbr + 1;
					$no_ecc = $no_ecc_fbr;
					$return .= $TMP_FBR;
					$return .= "-" . date('Y/m/d');
					//return .= "-".str_pad($no, 4, "0", STR_PAD_LEFT);
				} else if (in_array($this->session->userdata('user_id'), $cek_user_MSN, true)) {
					$TMP_MSN = $app_trans_prefix_msn;
					$app_trans_id = $app_trans_id_msn;
					$no = $app_trans_no_msn + 1;
					$no_ecc = $no_ecc_msn;
					$return .= $TMP_MSN;
					$return .= "-" . date('Y/m/d');
					//return .= "-".str_pad($no, 4, "0", STR_PAD_LEFT);
				} else {
					$TMP_GRN = $app_trans_prefix;
					$app_trans_id = $app_trans_id_grn;
					$no = $app_trans_no + 1;
					$no_ecc = $no_ecc_grn + 1;
					$return .= $TMP_GRN;
					$return .= "-" . date('Y/m/d');
					// 
				}

				//$return .= "-".str_pad($no, 4, "0", STR_PAD_LEFT);
				if ($no_ecc == 0) {
					$return .= "-" . str_pad($no, 4, "0", STR_PAD_LEFT);
				} else {
					$return .= "-" . str_pad($no_ecc, 4, "0", STR_PAD_LEFT);
				}
				$return = array("no" => $return, "app_trans_id" => $app_trans_id, "app_trans_no" => $no, "app_trans_no_ecc" => $no_ecc);
				$return['results'] = $return;
			}

			if ($param == 'get_app_trans_no_txt_acc') {
				//var_dump ($data_txt);die();
				$return = "";
				$this->load->model('main');
				$app_trans_id = isset($_REQUEST['type_dokumen']) ? is_numeric($_REQUEST['type_dokumen']) ? $_REQUEST['type_dokumen'] : -1 : -1;

				$data_txt = $this->main->read_file();
				$cek_user_ACC = [59, 79];
				$cek_user_FBR = [14, 63];

				if (in_array($this->session->userdata('user_id'), $cek_user_ACC, true)) {
					$TMP_ACC = strval($data_txt['TMP_ACC']);
					$no = strval($data_txt['NO_ACC'] + 1);
					//var_dump ($no);die();
					$return .= $TMP_ACC;
					$return .= "-" . date('Y/m/d');
					// return .= "-".str_pad($no, 4, "0", STR_PAD_LEFT);
				} else if (in_array($this->session->userdata('user_id'), $cek_user_FBR, true)) {
					$TMP_FBR = strval($data_txt['TMP_FABRIC']);
					$no = strval($data_txt['NO_FABRIC'] + 1);
					//var_dump ($no);die();
					$return .= $TMP_FBR;
					$return .= "-" . date('Y/m/d');
					//return .= "-".str_pad($no, 4, "0", STR_PAD_LEFT);
				} else {
					$TMP_GRN = 'GRN';
					$no = 8;
					//var_dump ($no);die();
					$return .= $TMP_GRN;
					$return .= "-" . date('Y/m/d');
					// 
				}

				$return .= "-" . str_pad($no, 4, "0", STR_PAD_LEFT);
				// $component['NO_ACC']=$data_txt['NO_ACC'];

			}

			if ($param == 'get_app_trans_no_SIPOP_fabric') {
				$app_trans_id = isset($_REQUEST['app_trans_id']) ? is_numeric($_REQUEST['app_trans_id']) ? $_REQUEST['app_trans_id'] : -1 : -1;
				$return = "";

				$where = array();
				$where['app_trans_id'] = $app_trans_id;

				$order = null;

				$data_table = $this->main->getData_pop('dbo.view_app_trans', null, $where, null, $order, 1);
				//var_dump($data_table);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						if (date('Ym', strtotime($value['app_trans_last_date'])) != date('Ym')) {
							$app_trans_no = 0;
						} else {
							$app_trans_no = $value['app_trans_no'];
						}

						$app_trans_no++;

						$tanggal = date("Y-m-d"); // Mendapatkan tanggal hari ini
						$pecah_tanggal = explode("-", $tanggal);
						$bulan_angka = (int)$pecah_tanggal[1]; // Mendapatkan nomor bulan sebagai angka

						$bulan = $this->konversiBulanRomawi($bulan_angka);

						$return .= str_pad($app_trans_no, 4, "0", STR_PAD_LEFT);
						$return .= "/" . $value['app_trans_prefix'] . "/" . $bulan . "/" . $pecah_tanggal[0];

						//$return .= $value['app_trans_prefix'];
						//$return .= "-" . date('Y/m/d');
						//$return .= "-" . str_pad($app_trans_no, 4, "0", STR_PAD_LEFT);
					}
				}
			}

			if ($param == 'get_app_trans_no_SIPOP') {
				$app_trans_id = isset($_REQUEST['app_trans_id']) ? is_numeric($_REQUEST['app_trans_id']) ? $_REQUEST['app_trans_id'] : -1 : -1;
				$return = "";

				$where = array();
				$where['app_trans_id'] = $app_trans_id;

				$order = null;
				$app_trans_no_ecc = 0;
				$where2 = array();

				//--cek tabel dt_app_trans dari ECC untuk mengambil nomornya saja
				if ($app_trans_id == 710) {
					$where2['app_trans_id'] = 10;
					$data_table_ecc = $this->main->getData_pop('public.dt_app_trans', null, $where2, null, $order, 1);
					if (date('Ym', strtotime($data_table_ecc[0]['app_trans_last_date'])) != date('Ym')) {
						$app_trans_no_ecc = 0;
					} else {
						$app_trans_no_ecc = $data_table_ecc[0]['app_trans_no'];
					}

					$app_trans_no_ecc++;
				}

				$data_table = $this->main->getData_pop('dbo.view_app_trans', null, $where, null, $order, 1);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						if (date('Ym', strtotime($value['app_trans_last_date'])) != date('Ym')) {
							$app_trans_no = 0;
						} else {
							$app_trans_no = $value['app_trans_no'];
						}
						$app_trans_no++;

						$return .= $value['app_trans_prefix'];
						$return .= "-" . date('Y/m');
						$return .= "-" . str_pad($app_trans_no_ecc, 4, "0", STR_PAD_LEFT); //--hanya mengambil nomor dari tabel ecc
						//$return .= "-" . str_pad($app_trans_no, 4, "0", STR_PAD_LEFT);
					}
				}
			}

			if ($param == 'get_app_trans_no_item_transfer') {
				$app_trans_id = isset($_REQUEST['app_trans_id']) ? is_numeric($_REQUEST['app_trans_id']) ? $_REQUEST['app_trans_id'] : -1 : -1;
				$return = "";

				$where = array();
				$where['app_trans_id'] = $app_trans_id;

				$order = null;

				$data_table = $this->main->getData_pop('dbo.view_app_trans', null, $where, null, $order, 1);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						if (date('Ym', strtotime($value['app_trans_last_date'])) != date('Ym')) {
							$app_trans_no = 0;
						} else {
							$app_trans_no = $value['app_trans_no'];
						}
						$app_trans_no++;

						$return .= $value['app_trans_prefix'];
						$return .= "-" . date('Y/m/d');
						$return .= "-" . str_pad($app_trans_no, 4, "0", STR_PAD_LEFT);
					}
				}
			}


			if ($param == 'get_app_trans_no_GRN_SIPOP') {
				$app_trans_id = isset($_REQUEST['app_trans_id']) ? is_numeric($_REQUEST['app_trans_id']) ? $_REQUEST['app_trans_id'] : -1 : -1;
				$template = isset($_REQUEST['template']) ? $_REQUEST['template'] : 'GRN2';
				$return = "";

				$where = array();
				$where['app_trans_id'] = $app_trans_id;

				$order = null;

				$data_table = $this->main->getData('dbo.view_app_trans', null, $where, null, $order, 1);
				if ($data_table) {
					foreach ($data_table as $key => $value) {
						if (date('Ym', strtotime($value['app_trans_last_date'])) != date('Ym')) {
							$app_trans_no = 0;
						} else {
							$app_trans_no = $value['app_trans_no'];
						}

						$app_trans_no++;

						$format_tahun = date('Y');
						$bulan = $this->konversiBulanRomawi(date('m'));
						// $format_date = date('d') . "/" . $bulan . "/" . $format_tahun; // Baris ini tidak lagi diperlukan

						// --- BARIS YANG DIUBAH UNTUK MENGHASILKAN FORMAT BARU ---
						$return .= $template;
						$return .= "-" . $format_tahun;
						$return .= "/" . $bulan;
						$return .= "/" . str_pad($app_trans_no, 4, "0", STR_PAD_LEFT);
						// --------------------------------------------------------
					}
				}
			}
		}

		if (isset($view_list[$param])) {

			//var_dump($param);die();
			$where = array();

			if ($id) {
				if ($id == -1) {
					$limit = 1;
				} else {
					$where["id"] = $id;
				}
			} else {
				if ($q) {
					if ($param == 'performa_invoice') {
						$where["sales_performa_no ilike '%" . trim($q) . "%' AND 1="] = 1;
					} else {
						$where["value ilike '%" . trim($q) . "%' AND 1="] = 1;
					}
				}
			}

			if (isset($view_list[$param]['where'])) {
				foreach ($view_list[$param]['where'] as $key => $value) {
					$where[$value['field']] = $value['value'];
				}
			}

			if (isset($view_list[$param]['order'])) {
				if ($param == 'data_list_po_warehouse') {
					$order = $view_list[$param]['order'] . " desc";
				} else {
					$order = $view_list[$param]['order'] . " asc";
				}
			} else {
				$order = "value asc";
			}
			if (isset($view_list[$param]['order'])) {
				if ($param == 'data_list_po_warehouse_fabric_location') {
					$order = $view_list[$param]['order'] . " desc";
				} else {
					$order = $view_list[$param]['order'] . " asc";
				}
			} else {
				$order = "value asc";
			}
			//var_dump($where);
			//var_dump("text param ".$param_pop);
			//if ($param=='username'){
			if ($param_pop == 'db_pop') {
				//var_dump("dbsipop");die();
				$data_table = $this->main->getData_pop($view_list[$param]['view'], null, $where, null, $order, $limit, $offset);
			} else if ($param == 'performa_invoice') {
				//var_dump("ecc");die();
				$data_table = $this->main->getData_performa('dbo.dt_sales_performa', null, $where, null, $order, $limit, $offset);
				//var_dump($data_table);
			} else {
				if ($param == 'username') {
					$data_table = $this->main->getData_pop($view_list[$param]['view'], null, $where, null, $order, $limit, $offset);
				} else {
					$data_table = $this->main->getData($view_list[$param]['view'], null, $where, null, $order, $limit, $offset);
				}
			}

			//$view_list['data_list_fabric_receive'] = array('view' => 'dbo.view_list_fabric_shipment', 'order'=>'id');
			if ($param == 'data_list_fabric_receive') {
				//$return[] = array("id" => null, "value" => '-', "text" => '-');
			}
			if ($param == 'fabric_colour2') {
				$return[] = array("id" => null, "value" => '-', "text" => '-');
			}

			if ($data_table) {
				foreach ($data_table as $key => $value) {
					$return[] = array("id" => $value['id'], "value" => $value['value'], "text" => $value['text']);
				}
			}

			$return['results'] = $return;
		}

		//	$data_list['data_fabric_transfer'] = array('view' => 'dbo.view_fabric_transfer', 'view_detail' => 'dbo.view_fabric_transfer_detail', 'view_detail_session' => 'fabric_transfer', 'detail_session_key' => 'fabrictransfer_index', 'detail_session_seq' => 'fabric_transfer_seq', 'key' => 'fabric_transfer_id');

		//$data_list['data_purchase_order_detail'] = array('view' => 'dbo.view_purchase_order_detail', 'key' => 'purchase_order_detail_id');

		if (isset($data_list[$param])) {
			$where = array();
			$return = array();

			if (isset($data_list[$param]['order'])) {
				$order = $data_list[$param]['order'] . " asc";
			} else {
				$order = null;
			}

			if ($id) {
				if ($id == -1) {
					$limit = 1;
				} else {
					$where[$data_list[$param]['key']] = $id;
				}
				// var_dump($id);die();
				//var_dump($param);
				//	$data_table = $this->main->getData($data_list[$param]['view'], null, $where, null, $order , $limit, $offset);
				//$data_table = $this->main->getData_pop('dbo.view_po_detail_pop', null, $where, null, $order , $limit, $offset);

				if ($param == 'data_purchase_order_detail') {
					//$data_table = $this->main->getData_pop('dbo.view_po_detail_pop', null, $where, null, $order , $limit, $offset);
					$data_table = $this->main->getData_pop('dbo.view_purchase_order_warehouse_detail', null, $where, null, $order, $limit, $offset);
				} else {
					if ($param_pop == 'db_pop') {
						$data_table = $this->main->getData_pop($data_list[$param]['view'], null, $where, null, $order, $limit, $offset);
					} else {
						$data_table = $this->main->getData($data_list[$param]['view'], null, $where, null, $order, $limit, $offset);
						// var_dump($data_table);
					}
				}
				//var_dump($data_table);
				//console.log($data_table);
				if ($data_table) {
					foreach ($data_table as $key => $data) {
						foreach ($data as $k => $v) {
							if (is_numeric($v)) {
								if (substr(substr($v, -13), 0, 1) == '.') {
									$return[$key][$k] = $this->mainconfig->get_decimal_format3($v, 12);
								} else {
									$return[$key][$k] = $v;
								}
							} else {
								$return[$key][$k] = $v;
							}
						}
					}
				}

				if (isset($data_list[$param]['view_detail'])) {
					$where[$data_list[$param]['key']] = $id;
					//var_dump($data_list[$param]['key']);
					if ($param_pop == 'db_pop') {
						$data_table = $this->main->getData_pop($data_list[$param]['view_detail'], null, $where, null, $order, $limit, $offset);
					} else {
						$data_table = $this->main->getData($data_list[$param]['view_detail'], null, $where, null, $order, $limit, $offset);
					}
					//$data_table = $this->main->getData($data_list[$param]['view_detail'], null, $where, null, $order , $limit, $offset);
					//  print_r($data_table);
					//var_dump($data_table);
					//if($param='data_purchase_order'){
					//	$where_pop['po_ecc_id'] = $id;
					//	//var_dump($data_table[0]); 
					///	echo '<br><br>';
					//	$data_table_pop = $this->main->getData_pop('dbo.view_po_pop', null,$where_pop, null, $order , $limit, $offset);
					//		//var_dump($data_table[0]);
					//		for($x=0;$x < count($data_table);$x++){
					//		//	array_push($data_table[$x],$data_table_pop[$x]);
					//		$data_table[$x]=$data_table[$x]+$data_table_pop[$x];
					//		}
					//		//var_dump($data_table[0]);
					//	}

					$return['detail'] = $data_table;

					if (isset($data_list[$param]['view_detail_session'])) {
						if ($data_table) {
							$seq = 1;
							$session_data = array();
							foreach ($data_table as $dt_table) {
								$row[$data_list[$param]['detail_session_seq']] = $seq;
								foreach ($dt_table as $key => $value) {
									if (is_numeric($value)) {
										if (substr(substr($value, -13), 0, 1) == '.') {
											$row[$key] = $this->mainconfig->get_decimal_format3($value, 12);
										} else {
											$row[$key] = $value;
										}
									} else {
										$row[$key] = $value;
									}
								}

								$session_data[$seq] = $row;
								$seq++;
							}

							$newdata = array(
								$data_list[$param]['view_detail_session']  => $session_data,
								$data_list[$param]['detail_session_key']  => $seq
							);

							$this->session->set_userdata($newdata);
						} else {
							$newdata = array(
								$data_list[$param]['view_detail_session']  => array(),
								$data_list[$param]['detail_session_key']  => 1
							);

							$this->session->set_userdata($newdata);
						}
					}
				}

				//=> 'dbo.view_spec_image''
				if (isset($data_list[$param]['view_image'])) {
					$where[$data_list[$param]['key']] = $id;
					$img_array = array();
					//console.log($param_pop);
					if ($param_pop == 'db_pop') {
						$data_table = $this->main->getData_pop($data_list[$param]['view_image'], null, $where, null, $order, $limit, $offset);
					} else {
						$data_table = $this->main->getData($data_list[$param]['view_image'], null, $where, null, $order, $limit, $offset);
					}

					if ($data_table) {
						foreach ($data_table as $key => $data) {
							foreach ($data as $k => $v) {
								//$return[$key][$k] = $v;
								//$img_array[$key][$k] = $v;
								if ($k == 'style_spec_name_images') {
									//$img_array[$k]=$v;
									$name_images = $v;
								}
								if ($k == 'style_spec_images_seri') {
									$img_array[$v] = $name_images;
								}
								//$img_array[$key]['style_spec_name_images']=$v;
							}
						}
					} else {
						$img_array = 0;
					}
					$return['image'] = $img_array;
				}

				if (isset($data_list[$param]['view_detail_receive'])) {
					$where[$data_list[$param]['key']] = $id;
					$img_array = array();
					//console.log($param_pop);
					if ($param_pop == 'db_pop') {
						$data_table = $this->main->getData_pop($data_list[$param]['view_detail_receive'], null, $where, null, $order, $limit, $offset);
					} else {
						$data_table = $this->main->getData($data_list[$param]['view_detail_receive'], null, $where, null, $order, $limit, $offset);
					}

					if ($data_table) {
						foreach ($data_table as $key => $data) {
							foreach ($data as $k => $v) {
								if (is_numeric($v)) {
									if (substr(substr($v, -13), 0, 1) == '.') {
										$return[$key][$k] = $this->mainconfig->get_decimal_format3($v, 12);
									} else {
										$return[$key][$k] = $v;
									}
								} else {
									$return[$key][$k] = $v;
								}
							}
						}
					}
				}
			}
		}

		if (in_array($param, $custom)) {
			if (isset($custom_list[$param]['data'])) {
				if (is_array($custom_list[$param]['data'])) {
					foreach ($custom_list[$param]['data'] as $key => $value) {
						$return[] = array("id" => $key, "value" => $value);
					}
				}
			}
		}

		if (in_array($param, $data_session)) {
			$where = array();

			if ($id) {

				$session_data = $this->session->userdata($data_session_list[$param]);

				$row_data = array();
				if (isset($session_data[$id])) {
					// if(is_numeric($session_data[$id])){
					// $row_data[] = $this->mainconfig->get_decimal_format3($session_data[$id],12);
					// } else {
					$row_data[] = $session_data[$id];
					// }
				}

				$return = $row_data;
			}
		}


		echo json_encode($return);
	}

	function konversiBulanRomawi($bulan)
	{
		switch ($bulan) {
			case 1:
				return "I";
			case 2:
				return "II";
			case 3:
				return "III";
			case 4:
				return "IV";
			case 5:
				return "V";
			case 6:
				return "VI";
			case 7:
				return "VII";
			case 8:
				return "VIII";
			case 9:
				return "IX";
			case 10:
				return "X";
			case 11:
				return "XI";
			case 12:
				return "XII";
			default:
				return ""; // Mengembalikan string kosong jika bulan tidak valid
		}
	}

	function download_file()
	{
		///	get the file mime type using the file extension

		$saveAs = isset($_POST['saveAs']) ? $_POST['saveAs'] : '';
		$filename = isset($_POST['filename']) ? $_POST['filename'] : '';
		$extension = strtolower(pathinfo(basename($saveAs), PATHINFO_EXTENSION));
		set_time_limit(0);
		//var_dump($saveAs);
		//var_dump($extension);
		// our list of mime types
		$mime_types = array(

			'txt' => 'text/plain',
			'htm' => 'text/html',
			'html' => 'text/html',
			'php' => 'text/html',
			'css' => 'text/css',
			'js' => 'application/javascript',
			'json' => 'application/json',
			'xml' => 'application/xml',
			'swf' => 'application/x-shockwave-flash',
			'flv' => 'video/x-flv',

			// images
			'png' => 'image/png',
			'jpe' => 'image/jpeg',
			'jpeg' => 'image/jpeg',
			'jpg' => 'image/jpeg',
			'gif' => 'image/gif',
			'bmp' => 'image/bmp',
			'ico' => 'image/vnd.microsoft.icon',
			'tiff' => 'image/tiff',
			'tif' => 'image/tiff',
			'svg' => 'image/svg+xml',
			'svgz' => 'image/svg+xml',

			// archives
			'zip' => 'application/zip',
			'rar' => 'application/x-rar-compressed',
			'exe' => 'application/x-msdownload',
			'msi' => 'application/x-msdownload',
			'cab' => 'application/vnd.ms-cab-compressed',

			// audio/video
			'mp3' => 'audio/mpeg',
			'qt' => 'video/quicktime',
			'mov' => 'video/quicktime',

			// adobe
			'pdf' => 'application/pdf',
			'psd' => 'image/vnd.adobe.photoshop',
			'ai' => 'application/postscript',
			'eps' => 'application/postscript',
			'ps' => 'application/postscript',

			// ms office
			'doc' => 'application/msword',
			'rtf' => 'application/rtf',
			//'xls' => 'application/msexcel',
			'xlsx'	=> 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
			'xls' => 'application/vnd.ms-excel',
			'ppt' => 'application/vnd.ms-powerpoint',
			//'xls'	=>	array('application/vnd.ms-excel', 'application/msexcel', 'application/x-msexcel', 'application/x-ms-excel', 'application/x-excel', 'application/x-dos_ms_excel', 'application/xls', 'application/x-xls', 'application/excel', 'application/download', 'application/vnd.ms-office', 'application/msword','application/octet-stream'),
			//'xlsx'	=>	array('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/zip', 'application/vnd.ms-excel', 'application/msword', 'application/x-zip','application/octet-stream'),

			// open office
			'odt' => 'application/vnd.oasis.opendocument.text',
			'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
			'fods' => 'application/vnd.oasis.opendocument.spreadsheet'
		);

		// Set a default mime if we can't find it

		if (!isset($mime_types[$extension])) {
			$mime = 'application/octet-stream';
		} else {
			$mime = (is_array($mime_types[$extension])) ? $mime_types[$extension][0] : $mime_types[$extension];
		}
		//	var_dump($mime);
		//	var_dump($filename);
		//$filename='application/vnd.ms-excel';
		//$filename='list1_20231031_042426_408792.xls';
		//	$filename='C:/Users/Ali/AppData/Local/Temp/list1_20231031_042426_408792.xls';

		//var_dump($mime_types[$extension]);

		// var_dump($filename);die();
		if (file_exists($filename)) {

			if (strstr($_SERVER['HTTP_USER_AGENT'], "MSIE")) {
				header("Content-Type: application/force-download");
				header('Content-Type: "' . $mime . '"');
				header("Content-Disposition: attachment; filename=\"" . basename($saveAs) . "\";");
				header('Expires: 0');
				header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
				header("Content-Transfer-Encoding: binary");
				header('Pragma: public');
				header("Content-Length: " . filesize($filename));
			} else {
				header("Pragma: public");
				header("Expires: 0");
				header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
				header("Cache-Control: private", false);
				header("Content-Type: application/force-download");
				header("Content-Type: " . $mime, true, 200);
				header("Content-Type: application/download");
				header('Content-Length: ' . filesize($filename));
				header("Content-Disposition: attachment; filename=\"" . basename($saveAs) . "\";");
				header("Content-Transfer-Encoding: binary");
			}

			flush(); // this doesn't really matter.
			$fp = fopen($filename, "r");
			while (!feof($fp)) {
				echo fread($fp, 65536);
				flush(); // this is essential for large downloads
			}
			fclose($fp);
			unlink($filename);
			exit("ok");
		} else {
			die('The provided file path: ' . $filename . ' is not valid.');
		}
	}

	function download_file_copy()
	{
		///	get the file mime type using the file extension

		$saveAs = isset($_POST['saveAs']) ? $_POST['saveAs'] : '';
		$filename = isset($_POST['filename']) ? $_POST['filename'] : '';
		$extension = strtolower(pathinfo(basename($saveAs), PATHINFO_EXTENSION));
		//var_dump($filename);die();
		set_time_limit(0);

		//var_dump($extension);
		// our list of mime types
		$mime_types = array(

			'txt' => 'text/plain',
			'htm' => 'text/html',
			'html' => 'text/html',
			'php' => 'text/html',
			'css' => 'text/css',
			'js' => 'application/javascript',
			'json' => 'application/json',
			'xml' => 'application/xml',
			'swf' => 'application/x-shockwave-flash',
			'flv' => 'video/x-flv',

			// images
			'png' => 'image/png',
			'jpe' => 'image/jpeg',
			'jpeg' => 'image/jpeg',
			'jpg' => 'image/jpeg',
			'gif' => 'image/gif',
			'bmp' => 'image/bmp',
			'ico' => 'image/vnd.microsoft.icon',
			'tiff' => 'image/tiff',
			'tif' => 'image/tiff',
			'svg' => 'image/svg+xml',
			'svgz' => 'image/svg+xml',

			// archives
			'zip' => 'application/zip',
			'rar' => 'application/x-rar-compressed',
			'exe' => 'application/x-msdownload',
			'msi' => 'application/x-msdownload',
			'cab' => 'application/vnd.ms-cab-compressed',

			// audio/video
			'mp3' => 'audio/mpeg',
			'qt' => 'video/quicktime',
			'mov' => 'video/quicktime',

			// adobe
			'pdf' => 'application/pdf',
			'psd' => 'image/vnd.adobe.photoshop',
			'ai' => 'application/postscript',
			'eps' => 'application/postscript',
			'ps' => 'application/postscript',

			// ms office
			'doc' => 'application/msword',
			'rtf' => 'application/rtf',
			//'xls' => 'application/msexcel',
			'xlsx'	=> 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
			'xls' => 'application/vnd.ms-excel',
			'ppt' => 'application/vnd.ms-powerpoint',
			//'xls'	=>	array('application/vnd.ms-excel', 'application/msexcel', 'application/x-msexcel', 'application/x-ms-excel', 'application/x-excel', 'application/x-dos_ms_excel', 'application/xls', 'application/x-xls', 'application/excel', 'application/download', 'application/vnd.ms-office', 'application/msword','application/octet-stream'),
			//'xlsx'	=>	array('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/zip', 'application/vnd.ms-excel', 'application/msword', 'application/x-zip','application/octet-stream'),

			// open office
			'odt' => 'application/vnd.oasis.opendocument.text',
			'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
		);

		// Set a default mime if we can't find it

		if (!isset($mime_types[$extension])) {
			$mime = 'application/octet-stream';
		} else {
			$mime = (is_array($mime_types[$extension])) ? $mime_types[$extension][0] : $mime_types[$extension];
		}
		//	var_dump($mime);
		//	var_dump($filename);
		//$filename='application/vnd.ms-excel';
		//$filename='list1_20231031_042426_408792.xls';
		//	$filename='C:/Users/Ali/AppData/Local/Temp/list1_20231031_042426_408792.xls';

		//var_dump($mime_types[$extension]);

		// var_dump($filename);die();
		if (file_exists($filename)) {

			if (strstr($_SERVER['HTTP_USER_AGENT'], "MSIE")) {
				header("Content-Type: application/force-download");
				header('Content-Type: "' . $mime . '"');
				header("Content-Disposition: attachment; filename=\"" . basename($saveAs) . "\";");
				header('Expires: 0');
				header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
				header("Content-Transfer-Encoding: binary");
				header('Pragma: public');
				header("Content-Length: " . filesize($filename));
			} else {
				header("Pragma: public");
				header("Expires: 0");
				header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
				header("Cache-Control: private", false);
				header("Content-Type: application/force-download");
				header("Content-Type: " . $mime, true, 200);
				header("Content-Type: application/download");
				header('Content-Length: ' . filesize($filename));
				header("Content-Disposition: attachment; filename=\"" . basename($saveAs) . "\";");
				header("Content-Transfer-Encoding: binary");
			}

			flush(); // this doesn't really matter.
			$fp = fopen($filename, "r");
			while (!feof($fp)) {
				echo fread($fp, 65536);
				flush(); // this is essential for large downloads
			}
			fclose($fp);
			// unlink($filename);	
			exit("ok");
		} else {
			die('The provided file path: ' . $filename . ' is not valid.');
		}
	}
}
