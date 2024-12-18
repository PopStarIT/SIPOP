<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->db_sp = $this->load->database('sp', TRUE);
		$this->db_pop = $this->load->database('pop', TRUE);
	}

	function mssql_escape($str)
	{
		if (get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return str_replace("'", "''", $str);
	}

	function audit($type = '', $table = '', $data = array(), $where = array(), $note = null, $set = array())
	{
		$userid = $this->session->userdata('userid');
		switch ($type) {
			case 'update': //Query Update
				foreach ($set as $k => $v) {
					$this->db->set($k, $k . "+" . $v, FALSE);
				}
				$this->db->where($where);
				$this->db->update($table, $data);

				break; // End Update

			case 'delete': //Query Delete

				// foreach($where as $key=>$value){
				// if(is_array($value)){
				// $first = true;
				// foreach($value as $val){
				// if($first){
				// $this->db->where($key,$val);
				// $first = false;
				// } else {
				// $this->db->or_where($key,$val);
				// }
				// }
				// } else {
				// $this->db->where($key,$value);
				// }
				// }
				foreach ($where as $key => $value) {
					if (is_array($value)) {
						$this->db->where_in($key, $value);
					} else {
						$this->db->where($key, $value);
					}
				}
				$this->db->delete($table);

				break; // End Delete

			case 'insert':
				$this->db->insert($table, $data);
				// return $this->db->insert_id();
				break;

			case 'insert_batch':
				$this->db->insert_batch($table, $data);
				break;
		}

		$query = $this->db->last_query();

		$log_data = array(
			'date' => date('Y-m-d H:i:s'),
			'tbl' => $table,
			'type' => $type,
			'query' => $query,
			'note' => $note,
			'userid' => $userid
		);

		//$this->db->insert('log_query', $log_data); 

	}

	function audit_pop($type = '', $table = '', $data = array(), $where = array(), $note = null, $set = array())
	{
		$userid = $this->session->userdata('userid');
		switch ($type) {
			case 'update': //Query Update
				foreach ($set as $k => $v) {
					$this->db_pop->set($k, $k . "+" . $v, FALSE);
					//$this->db_pop->set($k, $v, FALSE);
				}
				$this->db_pop->where($where);
				$this->db_pop->update($table, $data);

				break; // End Update

			case 'delete': //Query Delete
				foreach ($where as $key => $value) {
					if (is_array($value)) {
						$this->db_pop->where_in($key, $value);
					} else {
						$this->db_pop->where($key, $value);
					}
				}
				$this->db_pop->delete($table);

				break; // End Delete

			case 'insert':
				$this->db_pop->insert($table, $data);
				// return $this->db->insert_id();
				break;

			case 'insert_batch':
				$this->db_pop->insert_batch($table, $data);
				break;
		}

		$query = $this->db_pop->last_query();

		$log_data = array(
			'date' => date('Y-m-d H:i:s'),
			'tbl' => $table,
			'type' => $type,
			'query' => $query,
			'note' => $note,
			'userid' => $userid
		);

		//$this->db->insert('log_query', $log_data); 

	}

	function insert_pop($table, $data = array(), $note = null)
	{
		return $this->audit_pop('insert', $table, $data, null, $note);
	}

	function insert($table, $data = array(), $note = null)
	{
		return $this->audit('insert', $table, $data, null, $note);
	}

	function insert_batch($table, $data = array(), $note = null)
	{
		$this->audit('insert_batch', $table, $data, null, $note);
	}

	function update($table, $data = array(), $where = array(), $note = null, $set = array())
	{
		$this->audit('update', $table, $data, $where, $note, $set);
	}
	function update_pop($table, $data = array(), $where = array(), $note = null, $set = array())
	{
		$this->audit_pop('update', $table, $data, $where, $note, $set);
	}

	function delete($table, $where = array(), $note = null)
	{
		$this->audit('delete', $table, null, $where, $note);
	}

	function delete_pop($table, $where = array(), $note = null)
	{
		$this->audit_pop('delete', $table, null, $where, $note);
	}

	function sp($sp, $param = array())
	{
		//	var_dump($sp);die();
		$parameter = array();
		foreach ($param as $dt_param) {
			if ($dt_param == NULL) {
				$parameter[] = 'NULL';
			} elseif (is_array($dt_param)) {
				$array_param = array();
				foreach ($dt_param as $dt_array) {
					$array_param[] = trim($dt_array);
				}
				$parameter[] = "'" . json_encode($array_param) . "'";
			} else {
				$parameter[] = "'" . $dt_param . "'";
			}
		}

		$sql = "exec " . $sp . "(";
		$sql .= implode(',', $parameter);
		$sql .= ")";
		$query = $this->db_sp->query($sql);

		if ($this->db_sp->_error_number()) {
			$return = new StdClass();
			$return->valid = 'false';
			$return->message = $this->db_sp->_error_message();
			return array($return);
		} else {
			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}
		}
	}

	function extractarray($array = array(), $returnarray = array())
	{
		foreach ($array as $key => $value) {
			if ($value == NULL) {
				$returnarray[$key] = NULL;
			} elseif (is_array($value)) {
				$returnarray[$key] = $this->extractarray($value);
			} else {
				$returnarray[$key] = "'" . htmlentities($value, ENT_QUOTES) . "'";
			}
		}

		return $returnarray;
	}

	function executeSP($sp, $param = null, $type = 'default', $field_data = false)
	{

		$parameter = "";
		if ($param) {
			foreach ($param as $data) {
				$parameter .= "'" . $data . "',";
			}
			$parameter = trim($parameter, ",");
		}

		$query = $this->db_sp->query("exec " . $sp . " " . $parameter);

		$error = $this->db_sp->error();

		if ($error['code'] !== '00000') {
			$return = new StdClass();
			$return->valid = 'false';
			$return->message = $error['message'];
			return array($return);
		} else {

			if ($query->num_rows() > 0) {
				if ($field_data) {
					$return['rows'] = $query->result_array();
					$return['field_data'] = $query->field_data();

					return $return;
				} else {
					$result_array = $query->result_array();
					// $query->next_result();
					// $query->free_result();

					return $result_array;
				}
			} else {
				$return = new StdClass();
				$return->valid = 'false';
				$return->message = $error['message'];
				return array($return);
			}
		}
	}

	function getData($table, $key = null, $where = null, $group = null, $order = null, $limit = null, $offset = 0)
	{
		$this->db->select('*');
		$this->db->from($table);

		if (isset($key)) {
			$this->db->where('id', $key);
		}
		//var_dump($where);
		if (isset($where)) {
			foreach ($where as $key => $value) {
				if (is_array($value)) {
					$this->db->where_in($key, $value);
				} else {
					$this->db->where($key, $value);
				}
			}
		}

		if (isset($group)) {
			$this->db->group_by($group);
		}

		if (isset($order)) {
			if (is_array($order)) {
				$order = implode(',', $order);
			}

			$this->db->order_by($order);
		}

		if (isset($limit)) {
			$this->db->limit($limit, $offset);
		}

		$query = $this->db->get();
		//	var_dump($group);
		//print_r("test");
		// if(($limit) && $offset > 0){

		// $last_query = $this->db->last_query();
		// $replace_query = trim($last_query,"SELECT TOP");
		// $replace_query = trim($replace_query);
		// $limit2 = $limit + $offset;
		// $replace_query = trim($replace_query,$limit2);

		// $sql = "SELECT * FROM ( ";
		// $sql .= "SELECT ";
		// $sql .= "TOP ".$limit2." ROW_NUMBER() OVER (ORDER BY ".$order.") as row,";
		// $sql .= $replace_query;
		// $sql .= " ) a";
		// $sql .= " WHERE a.row > ".$offset." and a.row <= ".$limit2."";

		// $query = $this->db->query($sql);		
		// }

		$error = $this->db->error();
		if ($error['code'] !== '00000') {
			$return = new StdClass();
			$return->valid = 'false';
			$return->message = $error['message'];
			return array($return);
		} else {
			if ($query->num_rows() > 0) {
				return $query->result_array();
			} else {
				return false;
			}
		}
	}

	function getData_pop($table, $key = null, $where = null, $group = null, $order = null, $limit = null, $offset = 0)
	{
		$this->db_pop->select('*');
		$this->db_pop->from($table);
		//$this->db->select('*');
		//$this->db->from($table);

		if (isset($key)) {
			$this->db_pop->where('id', $key);
		}
		//var_dump($where);
		if (isset($where)) {
			foreach ($where as $key => $value) {
				if (is_array($value)) {
					$this->db_pop->where_in($key, $value);
				} else {
					$this->db_pop->where($key, $value);
				}
			}
		}

		if (isset($group)) {
			$this->db_pop->group_by($group);
		}

		if (isset($order)) {
			if (is_array($order)) {
				$order = implode(',', $order);
			}

			$this->db_pop->order_by($order);
		}

		if (isset($limit)) {
			$this->db_pop->limit($limit, $offset);
		}

		$query = $this->db_pop->get();
		//	var_dump($group);
		//print_r("test");
		// if(($limit) && $offset > 0){

		// $last_query = $this->db->last_query();
		// $replace_query = trim($last_query,"SELECT TOP");
		// $replace_query = trim($replace_query);
		// $limit2 = $limit + $offset;
		// $replace_query = trim($replace_query,$limit2);

		// $sql = "SELECT * FROM ( ";
		// $sql .= "SELECT ";
		// $sql .= "TOP ".$limit2." ROW_NUMBER() OVER (ORDER BY ".$order.") as row,";
		// $sql .= $replace_query;
		// $sql .= " ) a";
		// $sql .= " WHERE a.row > ".$offset." and a.row <= ".$limit2."";

		// $query = $this->db->query($sql);		
		// }

		$error = $this->db_pop->error();
		if ($error['code'] !== '00000') {
			$return = new StdClass();
			$return->valid = 'false';
			$return->message = $error['message'];
			return array($return);
		} else {
			if ($query->num_rows() > 0) {
				return $query->result_array();
			} else {
				return false;
			}
		}
	}

	function getData_sum($table, $key = null, $where = null, $group = null, $order = null, $limit = null, $offset = 0)
	{
		$this->db->select('sum(quantity)');
		$this->db->from($table);

		if (isset($key)) {
			$this->db->where('id', $key);
		}
		//var_dump($where);
		if (isset($where)) {
			foreach ($where as $key => $value) {
				if (is_array($value)) {
					$this->db->where_in($key, $value);
				} else {
					$this->db->where($key, $value);
				}
			}
		}

		if (isset($group)) {
			$this->db->group_by($group);
		}

		if (isset($order)) {
			if (is_array($order)) {
				$order = implode(',', $order);
			}

			$this->db->order_by($order);
		}

		if (isset($limit)) {
			$this->db->limit($limit, $offset);
		}

		$query = $this->db->get();
		//	var_dump($group);
		//print_r("test");
		// if(($limit) && $offset > 0){

		// $last_query = $this->db->last_query();
		// $replace_query = trim($last_query,"SELECT TOP");
		// $replace_query = trim($replace_query);
		// $limit2 = $limit + $offset;
		// $replace_query = trim($replace_query,$limit2);

		// $sql = "SELECT * FROM ( ";
		// $sql .= "SELECT ";
		// $sql .= "TOP ".$limit2." ROW_NUMBER() OVER (ORDER BY ".$order.") as row,";
		// $sql .= $replace_query;
		// $sql .= " ) a";
		// $sql .= " WHERE a.row > ".$offset." and a.row <= ".$limit2."";

		// $query = $this->db->query($sql);		
		// }

		$error = $this->db->error();
		if ($error['code'] !== '00000') {
			$return = new StdClass();
			$return->valid = 'false';
			$return->message = $error['message'];
			return array($return);
		} else {
			if ($query->num_rows() > 0) {
				return $query->result_array();
			} else {
				return false;
			}
		}
	}

	public function search_pop($table, $field, $keyword = null)
	{
		$this->db->select('*');
		$this->db->from($table);
		if (!empty($keyword)) {
			//	$this->db->like($field,$keyword);
			$this->db->where($field, $keyword);
		}
		return $this->db->get()->result_array();
	}

	public function find_table_pop($table, $field, $keyword = null)
	{
		$this->db_pop->select('*');
		$this->db_pop->from($table);
		if (!empty($keyword)) {
			//	$this->db->like($field,$keyword);
			$this->db_pop->where($field, $keyword);
		}
		return $this->db_pop->get()->result_array();
	}

	public function find_data_pop($table, $field, $keyword = null, $limit = null)
	{
		$this->db_pop->select('*');
		$this->db_pop->from($table);
		if (!empty($keyword)) {
			//	$this->db->like($field,$keyword);
			$this->db_pop->where($field, $keyword);
		}

		if (!empty($limit)) {
			//	$this->db->like($field,$keyword);
			$this->db_pop->limit($limit);
		}
		return $this->db_pop->get()->result_array();
	}

	public function cari_ecc($table, $field)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->order_by($field, 'DESC');
		$this->db->limit('1');
		//$this->db->where($field,$keyword);

		return $this->db->get()->result_array();
	}

	public function cari_nama($keyword)
	{
		$this->db_pop->select('karyawan_name');
		$this->db_pop->from('dbo.dt_karyawan');
		$this->db_pop->where('karyawan_id', $keyword);

		return $this->db_pop->get()->result_array();
	}

	function countData($table, $where = null, $group = null)
	{
		$return = 0;

		$this->db->select('count(*) cnt');
		$this->db->from($table);

		if (isset($where)) {
			$this->db->where($where);
		}

		if (isset($group)) {
			$this->db->group_by($group);
		}

		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $data) {
				$return = $data->cnt;
			}
		}

		return $return;
	}

	function countData_pop($table, $where = null, $group = null)
	{
		$return = 0;

		$this->db_pop->select('count(*) cnt');
		$this->db_pop->from($table);

		if (isset($where)) {
			$this->db_pop->where($where);
		}

		if (isset($group)) {
			$this->db_pop->group_by($group);
		}

		$query = $this->db_pop->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $data) {
				$return = $data->cnt;
			}
		}

		return $return;
	}

	function get_barang_jadi($date_start, $date_end)
	{
		$return = 0;
		$this->db->select('b.delivery_date as r1,i.item_base_code AS r2,i.item_base_name AS r3,j.uom_code AS r4,(a.quantity_delivered / a.conversion) AS r5,k.currencies_code AS r6,l.unit_price AS r7,(a.quantity_delivered/a.conversion * l.unit_price ) * d.ndpbm AS r8,d.ndpbm AS r9');
		$this->db->from('dbo.dt_delivery_detail a');
		$this->db->join('dbo.dt_delivery b', 'a.delivery_id = b.delivery_id', 'left');
		$this->db->join('dbo.prm_delivery_status c', ' b.delivery_status_id = c.delivery_status_id', 'left');
		$this->db->join('dbo.dt_bc_out_header d', 'b.bc_out_header_id = d.bc_out_header_id', 'left');
		$this->db->join('dbo.prm_custom_type e', 'd.custom_type_id = e.custom_type_id', 'left');
		$this->db->join('dbo.prm_delivery_type f', 'b.delivery_type_id = f.delivery_type_id', 'left');
		$this->db->join('dbo.dt_partner g', 'd.vendor_partner_id = g.partner_id', 'left');
		$this->db->join('dbo.dt_mst_item h', 'a.item_id = h.item_id', 'left');
		$this->db->join('dbo.dt_mst_item_base i', 'h.item_base_id = i.item_base_id', 'left');
		$this->db->join('dbo.dt_bc_out_barang l', 'a.bc_out_barang_id = l.bc_out_barang_id', 'left');
		$this->db->join('dbo.ref_uom j', 'l.uom_id = j.uom_id', 'left');
		$this->db->join('dbo.dt_currencies k', 'd.currencies_id = k.currencies_id', 'left');
		$this->db->where('b.delivery_status_id ', '1');
		$this->db->where('b.delivery_date >=', $date_start);
		$this->db->where('b.delivery_date <=', $date_end);
		//$this->db->where('b.delivery_date between '.$date_start.' and '.$date_end);
		$this->db->where('e.custom_type_name', 'BC 3.0');
		$this->db->order_by('b.delivery_date', 'DESC');
		//$query = $this->db->get();
		return $this->db->get()->result_array();
	}

	function get_absen_1($date, $name, $departemen)
	{
		$return = 0;
		if ($name == 0) {
			$where_name = '';
		} else {
			$where_name = ' and a.karyawan_id =' . $name;
		}

		if ($departemen == 0) {
			$where_departemen = '';
		} else {
			$where_departemen = ' and a.karyawan_departemen =' . $departemen;
		}

		$where = "a.karyawan_jabatan !=75 AND a.keterangan_karyawan !=72" . $where_name . $where_departemen;

		//$this->db_pop->select(' * ');
		$this->db_pop->select(
			"a.badgenumber AS r1,
				    upper(a.karyawan_name::text) AS r2,
				    d.uraian AS r3,
		            c.uraian AS r4,
				    case when b.masuk is null then '00:00:00'
		            else b.masuk 
		            end AS r5,
				    case when b.keluar is null then '00:00:00'
		            else b.keluar 
		            end AS r6,
				    case when b.status_masuk is null then '-'
			        else b.status_masuk end AS r7,
					case when b.status_keluar is null then '-'
			        else b.status_keluar end AS r8,
				    b.keterangan AS r9,
                    b.type_absen AS r10,
					case when b.tanggal is null then '" . $date . "'
			        else b.tanggal end AS r11,
			        b.absen_id AS r12"
		);
		$this->db_pop->from('dbo.dt_karyawan a');
		$this->db_pop->join("(SELECT 
		  absen_id,
		  badgenumber,
          divisi,
          line,
          tanggal ,
          masuk ,
          keluar,
		  status_masuk,
		  status_keluar,
          keterangan,
          type_absen
          FROM dbo.view_karyawan_absen
          WHERE tanggal='" . $date . "') b", 'a.badgenumber = b.badgenumber', 'left');
		$this->db_pop->join('dbo.dt_pilih c', 'a.karyawan_group = c.pilih_id', 'left');
		$this->db_pop->join('dbo.dt_pilih d', 'a.karyawan_divisi = d.pilih_id', 'left');
		$this->db_pop->where($where);

		return $this->db_pop->get()->result_array();
	}
	function get_tanggal_libur()
	{
		$this->db_pop->select("*");
		$this->db_pop->from('dbo.dt_tanggal_libur');

		$arr_tanggals = array();
		foreach ($this->db_pop->get()->result_array() as $row) {
			// $arr_tanggals[$row['tanggal_libur']]=$row['tanggal_libur'];
			// $arr_tanggals[]=$row['tanggal_libur'];
			array_push($arr_tanggals, $row['tanggal_libur']);
		}
		return $arr_tanggals;
	}

	function cek_keterangan($tglAwal, $tglAkhir)
	{
		$jml_hari = $this->selisihHari($tglAwal, $tglAkhir); // Cek hari libur dan jumlah hari
		$jml_hari = $jml_hari + 1;
		$this->db_pop->select(' * ');
		$this->db_pop->from("dbo.sp_total_keterangan_absen('" . $jml_hari . "','" . $tglAwal . "','" . $tglAkhir . "')");
		return $this->db_pop->get()->result_array();
	}


	function cek_keterangan_1($ket, $tglAwal, $tglAkhir)
	{
		$jml_hari = $this->selisihHari($tglAwal, $tglAkhir); // Cek hari libur dan jumlah hari
		$jml_hari = $jml_hari + 1;

		if ($ket == 'M') {
			$this->db_pop->select("sum(('" . $jml_hari . "') - (v.total_masuk + v.total_cuti + v.total_S + v.total_P2 + v.total_P3 + v.total_SD + v.total_DS + v.total_DL + 
			  v.total_IP + v.total_PC)) as total");
		} else {
			$this->db_pop->select('sum(v.total_S)as total');
		}
		$this->db_pop->from('dbo.view_karyawan a');
		$this->db->join("SELECT a.badgenumber
       ,a.karyawan_name
			 ,sum(p.jml_selisih) as selisih
			 ,CASE WHEN sum(p.MSK) IS NULL THEN '0'::int8 
			  else sum(p.MSK) + sum(p.TP) + sum(p.TM) END as total_masuk
       ,CASE WHEN sum(p.C) IS NULL THEN '0'::int8 
			  else sum(p.C) END as total_cuti
			 ,CASE WHEN sum(p.S) IS NULL THEN '0'::int8 
			  else sum(p.S) END as total_S
			 ,CASE WHEN sum(p.P2) IS NULL THEN '0'::int8 
			  else sum(p.P2) END as total_P2
			 ,CASE WHEN sum(p.P3) IS NULL THEN '0'::int8 
			  else sum(p.P3) END as total_P3
			 ,CASE WHEN sum(p.SD) IS NULL THEN '0'::int8 
			  else sum(p.SD) END as total_SD
			 ,CASE WHEN sum(p.DS) IS NULL THEN '0'::int8 
			  else sum(p.DS) END as total_DS
			 ,CASE WHEN sum(p.DL) IS NULL THEN '0'::int8 
			  else sum(p.DL) END as total_DL
			 ,CASE WHEN sum(p.IP) IS NULL THEN '0'::int8 
			  else sum(p.IP) END as total_IP
			 ,CASE WHEN sum(p.TM) IS NULL THEN '0'::int8 
			  else sum(p.TM) END as total_TM
			 ,CASE WHEN sum(p.TP) IS NULL THEN '0'::int8 
			  else sum(p.TP) END as total_TP
				,CASE WHEN sum(p.CL) IS NULL THEN '0'::int8 
			  else sum(p.CL) END as total_CL
				,CASE WHEN sum(p.T) IS NULL THEN '0'::int8 
			  else sum(p.T) END as total_T
				,CASE WHEN sum(p.PC) IS NULL THEN '0'::int8 
			  else sum(p.PC) END as total_PC
			 FROM dbo.dt_karyawan a
			 LEFT JOIN(SELECT 
         z.badgenumber,
				 z.name,
				 z.jml_selisih,
         CASE z.kode_keterangan
            WHEN 'MSK' THEN z.jumlah
            ELSE 0
         END AS MSK, 
	       CASE z.kode_keterangan
             WHEN 'C' THEN z.jumlah
             ELSE 0
         END AS C,
				 CASE z.kode_keterangan
             WHEN 'S' THEN z.jumlah
             ELSE 0
         END AS S,
         CASE z.kode_keterangan
             WHEN 'P2' THEN z.jumlah
             ELSE 0
         END AS P2,
         CASE z.kode_keterangan
             WHEN 'P3' THEN z.jumlah
             ELSE 0
         END AS P3,
         CASE z.kode_keterangan
             WHEN 'SD' THEN z.jumlah
             ELSE 0
         END AS SD,
         CASE z.kode_keterangan
             WHEN 'DS' THEN z.jumlah
             ELSE 0
         END AS DS,
         CASE z.kode_keterangan
             WHEN 'DL' THEN z.jumlah
             ELSE 0
         END AS DL,
         CASE z.kode_keterangan
            WHEN 'M' THEN z.jumlah
            ELSE 0
         END AS M,
         CASE z.kode_keterangan
            WHEN 'PC' THEN z.jumlah
            ELSE 0
         END AS PC,
         CASE z.kode_keterangan
            WHEN 'IP' THEN z.jumlah
            ELSE 0
         END AS IP,
         CASE z.kode_keterangan
            WHEN 'TM' THEN z.jumlah
            ELSE 0
         END AS TM,
				 CASE z.kode_keterangan
            WHEN 'CL' THEN z.jumlah
            ELSE 0
         END AS CL,
				 CASE z.kode_keterangan
            WHEN 'T' THEN z.jumlah
            ELSE 0
         END AS T,
         CASE z.kode_keterangan
             WHEN 'TP' THEN z.jumlah
             ELSE 0
         END AS TP
     FROM 
          (SELECT x.badgenumber,x.name,sum(x.selisih) as jml_selisih,y.kode_keterangan,
				   COUNT(y.kode_keterangan) AS jumlah
           FROM dbo.view_data_absen_2 x
           LEFT JOIN dbo.dt_keterangan_absen y ON x.keterangan = y.keterangan_id
					WHERE x.tanggal >= '" . $tglAwal . "' AND x.tanggal <= '" . $tglAkhir . "'
           GROUP BY x.badgenumber,y.kode_keterangan,x.name) as z) as p ON a.badgenumber = p.badgenumber GROUP BY a.badgenumber,a.karyawan_name  v", 'a.id_absen= v.badgenumber', 'left');
		$this->db->where('a.jabatan !=', 'Owner');
		$this->db->where('a.keterangan_karyawan', 'aktif');
		// where a.jabatan !='Owner' and a.keterangan_karyawan ='Aktif'
		return $this->db_pop->get()->result_array();
	}

	function selisihHari($tglAwal, $tglAkhir)
	{
		// list tanggal merah selain hari minggu
		//$tglLibur = Array("2013-01-04", "2013-01-05", "2013-01-17");

		$libur1 = 0;
		$libur2 = 0;
		// $tglLibur = Array("2024-02-08","2024-02-09","2024-02-10", "2024-02-14");
		$tglLibur = $this->get_tanggal_libur();
		// var_dump($tglLibur);

		$pecah1 = explode("-", $tglAwal);
		$date1 = $pecah1[2];
		$month1 = $pecah1[1];
		$year1 = $pecah1[0];

		// memecah string tanggal akhir untuk mendapatkan
		// tanggal, bulan, tahun
		$pecah2 = explode("-", $tglAkhir);
		$date2 = $pecah2[2];
		$month2 = $pecah2[1];
		$year2 =  $pecah2[0];

		// mencari selisih hari dari tanggal awal dan akhir
		$jd1 = GregorianToJD($month1, $date1, $year1);
		$jd2 = GregorianToJD($month2, $date2, $year2);

		$selisih = $jd2 - $jd1;
		//var_dump($selisih);
		// proses menghitung tanggal merah dan hari minggu
		// di antara tanggal awal dan akhir
		for ($i = 1; $i <= $selisih; $i++) {
			// menentukan tanggal pada hari ke-i dari tanggal awal
			$tanggal = mktime(0, 0, 0, $month1, $date1 + $i, $year1);
			$tglstr = date("Y-m-d", $tanggal);

			// menghitung jumlah tanggal pada hari ke-i
			// yang masuk dalam daftar tanggal merah selain minggu
			if (in_array($tglstr, $tglLibur)) {
				$libur1++;
			}

			// menghitung jumlah tanggal pada hari ke-i
			// yang merupakan hari minggu
			if ((date("N", $tanggal) == 7)) {
				$libur2++;
			}
		}

		// menghitung selisih hari yang bukan tanggal merah dan hari minggu
		return $selisih - $libur1 - $libur2;
		// return $libur2;
	}

	function sp_goodnet_add($nama, $deskripsi)
	{
		$this->db_pop->insert('dbo.dt_goodnet', array('nama' => $nama, 'deskripsi' => $deskripsi));
		return $this->db_pop->insert_id();
	}

	function sp_goodnet_edit($goodnet_id, $nama, $deskripsi)
	{
		$this->db_pop->where('goodnet_id', $goodnet_id);
		$this->db_pop->update('dbo.dt_goodnet', array('nama' => $nama, 'deskripsi' => $deskripsi));
		return true;
	}

	public function get_goodnet()
	{
		$this->db_pop->select('goodnet_id, nama');
		$this->db_pop->from('dbo.dt_goodnet');
		$query = $this->db_pop->get();

		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return array();
		}
	}
	function sp_checklist_add($list)
	{
		$this->db_pop->insert('dbo.dt_checklist', array('list' => $list));
		return $this->db_pop->insert_id();
	}

	function sp_checklist_edit($checklist_id, $list)
	{
		$this->db_pop->where('checklist_id', $checklist_id);
		$this->db_pop->update('dbo.dt_checklist', array('list' => $list));
		return true;
	}
	public function get_spec()
	{
		$this->db_pop->select('id_style, nama_style');
		$this->db_pop->from('dbo.dt_style');
		$query = $this->db_pop->get();

		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return array();
		}
	}
	public function get_list()
	{
		$this->db_pop->select('checklist_id, list');
		$this->db_pop->from('dbo.dt_checklist');
		$query = $this->db_pop->get();

		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return array();
		}
	}
	public function get_master_lists()
	{
		$this->db_pop->select('*');
		$this->db_pop->from('dbo.dt_master_list');
		$query = $this->db_pop->get();
		return $query->result_array(); // Return as an array
	}



	public function get_style_spec_details()
	{
		$this->db_pop->select('style_spec_detail_id, style_spec_detail_measure'); // Ganti 'detail' dengan nama kolom yang sesuai
		$query = $this->db_pop->get('dbo.dt_style_spec_detail');

		if ($query->num_rows() > 0) {
			return $query->result_array(); // Mengembalikan hasil sebagai array
		}
		return [];
	}



	public function get_checklist_ids()
	{
		$this->db_pop->distinct();
		$this->db_pop->select('checklist_id');
		$this->db_pop->from('dbo.view_checklist_detail');
		$query = $this->db_pop->get();

		return $query->result();
	}



	public function show_checklist_id($checklist_id)
	{
		$this->db_pop->select('*'); // Ganti '*' dengan kolom yang ingin diambil
		$this->db_pop->from('dbo.view_checklist_detail');
		$this->db_pop->where('checklist_id', $checklist_id);
		$query = $this->db_pop->get();

		return $query->result(); // Mengembalikan semua baris data
	}

	public function get_list_by_checklist_id($checklist_id)
	{
		$this->db_pop->select('list'); // Ganti 'list' dengan nama kolom yang sesuai di tabel dt_checklist
		$this->db_pop->from('dbo.dt_checklist');
		$this->db_pop->where('checklist_id', $checklist_id);
		$query = $this->db_pop->get();

		if ($query->num_rows() > 0) {
			return $query->row(); // Mengembalikan satu baris data
		}

		return null; // Jika tidak ada data ditemukan
	}
	public function get_master_list_name($master_list_id)
	{
		$this->db_pop->select('name'); // Replace 'name' with the actual column name in dt_master_list
		$this->db_pop->from('dbo.dt_master_list'); // Replace with your actual table name
		$this->db_pop->where('list_id', $master_list_id);
		$query = $this->db_pop->get();
		$row = $query->row();
		return $row ? $row->name : ''; // Return the 'name' value if found, otherwise return an empty string
	}
}
