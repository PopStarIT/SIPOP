<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$component['loadlayout'] = true;
		$component['view_load'] = 'report';

		$dashboard_tab = array();
        //var_dump($this->session->userdata());
		$tab_external_report = array('alias' => 'report_external', 'title' => 'External Report', 'icon' => 'fa fa-book');
		$tab_internal_report = array('alias' => 'report_internal', 'title' => 'Internal Report', 'icon' => 'fa fa-book');
		$tab_accounting_report = array('alias' => 'report_accounting', 'title' => 'Accounting Report', 'icon' => 'fa fa-book');
		$tab_warehouse_report = array('alias' => 'warehouse', 'title' => 'Warehouse', 'icon' => 'fa fa-book');
        $tab_warehouse_report_content = array();
		
		$tab_external_report_content = array();
		$tab_internal_report_content = array();
		$tab_accounting_report_content = array();
		

		if ($this->session->userdata('type_fasilitas_kode') == 'KB' || $this->session->userdata('type_fasilitas_kode') == '') {
			/* KB **/
			$tab_external_report_content[] = array('method_id' => 461, 'menu_name' => 'Pabean Pemasukan', 'menu_icon' => 'fa fa-file-text-o', 'menu_bg' => 'bg-success');
			$tab_external_report_content[] = array('method_id' => 462, 'menu_name' => 'Pabean Pengeluaran', 'menu_icon' => 'fa fa-file-text-o', 'menu_bg' => 'bg-danger');
			$tab_external_report_content[] = array('method_id' => 463, 'menu_name' => 'WIP', 'menu_icon' => 'fa fa-file-text-o', 'menu_bg' => 'bg-coklat');
			$tab_external_report_content[] = array('method_id' => 464, 'menu_name' => 'Mutasi Bahan Baku & Bahan Penolong', 'menu_icon' => 'fa fa-file-text-o', 'menu_bg' => 'bg-salmon');
			$tab_external_report_content[] = array('method_id' => 465, 'menu_name' => 'Mutasi Scrap & Sisa', 'menu_icon' => 'fa fa-file-text-o', 'menu_bg' => 'bg-warning');
			$tab_external_report_content[] = array('method_id' => 466, 'menu_name' => 'Mutasi Barang Jadi', 'menu_icon' => 'fa fa-file-text-o', 'menu_bg' => 'bg-primary');
			$tab_external_report_content[] = array('method_id' => 467, 'menu_name' => 'Mutasi Mesin & Sparepart', 'menu_icon' => 'fa fa-file-text-o', 'menu_bg' => 'bg-hijaulaut');


			$tab_internal_report_content[] = array('method_id' => 867, 'menu_name' => 'Pengeluaran Ke Produksi', 'menu_icon' => 'fa fa-file-text-o', 'menu_bg' => 'bg-info');
			$tab_internal_report_content[] = array('method_id' => 869, 'menu_name' => 'Penerimaan Barang Jadi', 'menu_icon' => 'fa fa-file-text-o', 'menu_bg' => 'bg-hijaulaut');
			$tab_internal_report_content[] = array('method_id' => 871, 'menu_name' => 'Penerimaan Reject', 'menu_icon' => 'fa fa-file-text-o', 'menu_bg' => 'bg-coklat');
			$tab_internal_report_content[] = array('method_id' => 873, 'menu_name' => 'Penerimaan Scrap', 'menu_icon' => 'fa fa-file-text-o', 'menu_bg' => 'bg-success');
			//$tab_internal_report_content[] = array('method_id' => 1025, 'menu_name' => 'Pabean Pemasukan Summary', 'menu_icon' => 'fa fa-file-text-o');
			$tab_internal_report_content[] = array('method_id' => 1173, 'menu_name' => 'Mutasi WIP', 'menu_icon' => 'fa fa-file-text-o');
		}


		if ($this->session->userdata('type_fasilitas_kode') == 'KITE' || $this->session->userdata('type_fasilitas_kode') == '') {
			/* KITE **/
			$tab_external_report_content[] = array('method_id' => 818, 'menu_name' => 'Laporan Pemasukan Bahan Baku per Dokumen Pabean', 'menu_icon' => 'fa fa-file-text');
			$tab_external_report_content[] = array('method_id' => 814, 'menu_name' => 'Laporan Pemakaian Bahan Baku', 'menu_icon' => 'fa fa-file-text');
			$tab_external_report_content[] = array('method_id' => 816, 'menu_name' => 'Laporan pemakaian barang dalam proses dalam rangka kegiatan subkontrak', 'menu_icon' => 'fa fa-file-text');

			$tab_external_report_content[] = array('method_id' => 820, 'menu_name' => 'Laporan pemasukan hasil produksi', 'menu_icon' => 'fa fa-file-text');
			$tab_external_report_content[] = array('method_id' => 822, 'menu_name' => 'Laporan pengeluaran hasil produksi', 'menu_icon' => 'fa fa-file-text');
			$tab_external_report_content[] = array('method_id' => 810, 'menu_name' => 'Laporan mutasi bahan baku', 'menu_icon' => 'fa fa-file-text');
			$tab_external_report_content[] = array('method_id' => 812, 'menu_name' => 'Laporan mutasi hasil produksi', 'menu_icon' => 'fa fa-file-text');

			$tab_external_report_content[] = array('method_id' => 824, 'menu_name' => 'Laporan penyelesaian waste/scrap', 'menu_icon' => 'fa fa-file-text');

			$tab_internal_report_content[] = array('method_id' => 875, 'menu_name' => 'Persediaan Barang', 'menu_icon' => 'fa fa-file-text');
			$tab_internal_report_content[] = array('method_id' => 877, 'menu_name' => 'Penjualan Barang', 'menu_icon' => 'fa fa-file-text');
			$tab_external_report_content[] = array('method_id' => 463, 'menu_name' => 'WIP', 'menu_icon' => 'fa fa-file-text-o');
		}

		if ($this->session->userdata('type_fasilitas_kode') == 'GB' || $this->session->userdata('type_fasilitas_kode') == '') {
			/* GB **/
			$tab_internal_report_content[] = array('method_id' => 667, 'menu_name' => 'Posisi Barang', 'menu_icon' => 'fa fa-file-text-o');
			$tab_external_report_content[] = array('method_id' => 464, 'menu_name' => 'Mutasi Barang', 'menu_icon' => 'fa fa-file-text-o');
		}


		/* GLOBAL */
		$tab_external_report_content[] = array('method_id' => 789, 'menu_name' => 'Log Users', 'menu_icon' => 'fa fa-file-text-o');

		$tab_internal_report_content[] = array('method_id' => 665, 'menu_name' => 'Tracing Sumber Pemasukan Barang per Dokumen', 'menu_icon' => 'fa fa-file-text-o', 'menu_bg' => 'bg-birulangit');
		$tab_internal_report_content[] = array('method_id' => 667, 'menu_name' => 'Tracing Pengeluaran Barang per Dokumen', 'menu_icon' => 'fa fa-file-text-o', 'menu_bg' => 'bg-primary');
		$tab_internal_report_content[] = array('method_id' => 781091, 'menu_name' => 'Tracing Production', 'menu_icon' => 'fa fa-file-text-o', 'menu_bg' => 'bg-hijaulaut');
		$tab_internal_report_content[] = array('method_id' => 781089, 'menu_name' => 'Tracing Bahan Baku', 'menu_icon' => 'fa fa-file-text-o', 'menu_bg' => 'bg-danger');
		$tab_internal_report_content[] = array('method_id' => 781093, 'menu_name' => 'Tracing Barang Jadi', 'menu_icon' => 'fa fa-file-text-o', 'menu_bg' => 'bg-coklat');
		$tab_internal_report_content[] = array('method_id' => 7811117, 'menu_name' => 'Laporan Bulanan Pemasukan Barang', 'menu_icon' => 'fa fa-file-text-o', 'menu_bg' => 'bg-orange');
		$tab_internal_report_content[] = array('method_id' => 7811121, 'menu_name' => 'Laporan Bulanan Pengeluaran Barang', 'menu_icon' => 'fa fa-file-text-o', 'menu_bg' => 'bg-success');
		$tab_internal_report_content[] = array('method_id' => 7811134, 'menu_name' => 'Dokumen Import', 'menu_icon' => 'fa fa-file-text-o', 'menu_bg' => 'bg-primary');
		$tab_internal_report_content[] = array('method_id' => 7811300, 'menu_name' => 'Ekspor Subcon (Blm_OK)', 'menu_icon' => 'fa fa-file-text-o', 'menu_bg' => 'bg-success');
		$tab_internal_report_content[] = array('method_id' => 7811331, 'menu_name' => 'Card Stock', 'menu_icon' => 'fa fa-file-text-o', 'menu_bg' => 'bg-success');
		// $tab_internal_report_content[] = array('method_id' => 922, 'menu_name' => 'Laporan Realisasi Import', 'menu_icon' => 'fa fa-file-text-o');

		$tab_accounting_report_content[] = array('method_id' => 781046, 'menu_name' => 'Barang Jadi', 'menu_icon' => 'fa fa-file-text-o', 'menu_bg' => 'bg-orange');
		$tab_accounting_report_content[] = array('method_id' => 7811108, 'menu_name' => 'Bahan Baku dan Penolong', 'menu_icon' => 'fa fa-file-text-o', 'menu_bg' => 'bg-info');
		$tab_accounting_report_content[] = array('method_id' => 7811112, 'menu_name' => 'Barang WIP', 'menu_icon' => 'fa fa-file-text-o', 'menu_bg' => 'bg-success');
		$tab_accounting_report_content[] = array('method_id' => 7811350, 'menu_name' => 'Card Stock Bahan Baku', 'menu_icon' => 'fa fa-file-text-o', 'menu_bg' => 'bg-info');
		$tab_accounting_report_content[] = array('method_id' => 7811352, 'menu_name' => 'Card Stock Barang Jadi', 'menu_icon' => 'fa fa-file-text-o', 'menu_bg' => 'bg-info');
		$tab_accounting_report_content[] = array('method_id' => 7811367, 'menu_name' => 'Summary_Bahan Baku dan Penolong', 'menu_icon' => 'fa fa-file-text-o', 'menu_bg' => 'bg-info');		//$tab_accounting_report_content[] = array('method_id' => 7811362, 'menu_name' => 'Card Stock WIP', 'menu_icon' => 'fa fa-file-text-o', 'menu_bg' => 'bg-info');

		$tab_warehouse_report_content[] = array('method_id' => 50002, 'menu_name' => 'Mutasi Bahan Baku Warehouse 1', 'menu_icon' => 'fa fa-file-text-o');
		$tab_warehouse_report_content[] = array('method_id' => 58018, 'menu_name' => 'Mutasi Bahan Baku Warehouse 2', 'menu_icon' => 'fa fa-file-text-o');
		$tab_warehouse_report_content[] = array('method_id' => 50004, 'menu_name' => 'Mutasi Barang Jadi Warehouse 1', 'menu_icon' => 'fa fa-file-text-o');
		$tab_warehouse_report_content[] = array('method_id' => 58022, 'menu_name' => 'Mutasi Barang Jadi Warehouse 2', 'menu_icon' => 'fa fa-file-text-o');
		$tab_warehouse_report_content[] = array('method_id' => 58025, 'menu_name' => 'Pengeluaran warehouse 1 Ke Warehouse 2', 'menu_icon' => 'fa fa-file-text-o');
		$tab_warehouse_report_content[] = array('method_id' => 58028, 'menu_name' => 'Return warehouse 2 Ke Warehouse 1', 'menu_icon' => 'fa fa-file-text-o');

		$tab_external_report['content'] = $tab_external_report_content;
		$tab_internal_report['content'] = $tab_internal_report_content;
		$tab_accounting_report['content'] = $tab_accounting_report_content;
		$tab_warehouse_report['content'] = $tab_warehouse_report_content;

		$dashboard_tab[] = $tab_external_report;
		$dashboard_tab[] = $tab_internal_report;
		$dashboard_tab[] = $tab_accounting_report;
		$dashboard_tab[] = $tab_warehouse_report;

		$component['dashboard_tab'] = $dashboard_tab;


		$this->authentication->ajaxlayout($component);
	}
}
