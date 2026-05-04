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

			case 'insert3':
				$insert = $this->db->insert($table, $data);
				$isi['id_data'] =  $this->db->insert_id();
				$isi['pesan'] = $insert;
				return $isi;
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

			case 'insert_2':
				$insert = $this->db_pop->insert($table, $data);
				$isi['id_data'] =  $this->db_pop->insert_id();
				$isi['pesan'] = $insert;
				return $isi;
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

	function insert_pop2($table, $data = array(), $note = null)
	{
		return $this->audit_pop('insert_2', $table, $data, null, $note);
	}

	function insert_pop($table, $data = array(), $note = null)
	{
		return $this->audit_pop('insert', $table, $data, null, $note);
	}

	function insert($table, $data = array(), $note = null)
	{
		return $this->audit('insert', $table, $data, null, $note);
	}

	function insert3($table, $data = array(), $note = null)
	{
		return $this->audit('insert3', $table, $data, null, $note);
	}
	function insert_batch_pop($table, $data = array(), $note = null)
	{
		$this->audit_pop('insert_batch', $table, $data, null, $note);
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

	function getData_ecc($table, $key = null, $where = null, $group = null, $order = null, $limit = null, $offset = 0, $group_id = null)
	{

		if (isset($group_id)) {
			if (is_array($group_id)) {
				$group_id = implode(',', $group_id);
			}

			$this->db->select($group_id);
		} else {
			$this->db->select('*');
		}
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
			if (is_array($group)) {
				$group = implode(',', $group);
			}
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

	function getData_performa($table, $key = null, $where = null, $group = null, $order = null, $limit = null, $offset = 0)
	{
		$this->db->select('sales_performa_id as id, sales_performa_no as value, sales_performa_no as text');
		$this->db->from($table);
		//$this->db->select('*');
		//$this->db->from($table);

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
		//var_dump($query);	
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
	
	function getData_field_pop($table, $key = null, $where = null, $fields = '*', $group = null, $order = null, $limit = null, $offset = 0)
	{
		$this->db_pop->select($fields);
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

	public function find_table_ecc($table, $field, $keyword = null)
	{
		$this->db->select('*');
		$this->db->from($table);
		if (!empty($keyword)) {
			//	$this->db->like($field,$keyword);
			$this->db->where($field, $keyword);
		}
		return $this->db->get()->result_array();
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

	public function cari_gambar($field, $keyword = null, $field2, $keyword2 = null, $limit = null)
	{
		$this->db_pop->select('*');
		$this->db_pop->from('dbo.dt_style_spec_image');
		if (!empty($keyword)) {
			//	$this->db->like($field,$keyword);
			$this->db_pop->where($field, $keyword);
			$this->db_pop->where($field2, $keyword2);
		}

		if (!empty($limit)) {
			//	$this->db->like($field,$keyword);
			$this->db_pop->limit($limit);
		}
		//var_dump($this->db_pop->get());
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

	function countData_pop2($table, $where = null, $group = null)
	{
		$return = 0;

		$this->db_pop->select('count(*) total');
		$this->db_pop->from($table);
		var_dump($where);
		die();
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

	function jumlah_prod_request($tglAwal)
	{

		$this->db_pop->select('count(work_order_request_id)');
		$this->db_pop->from('dbo.view_check_prod_request_dan_transfer');
		$this->db_pop->where('work_order_request_date >=', $tglAwal);
		return $this->db_pop->get()->result_array();
	}

	function jumlah_prod_request_item($tglAwal, $field, $kode)
	{

		$this->db_pop->select('count(*)');
		$this->db_pop->from(' dbo.view_nomor_prod_request ');
		$this->db_pop->where('work_order_request_date >=', $tglAwal);
		$this->db_pop->where($field, $kode);
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

	function spec_detail($header_id, $basic)
	{
		//var_dump($basic);die();
		//validasi untuk cek basic
		if ($basic == 'S') {
			$sql = 'SELECT a.style_spec_detail_id as r1,
                  a.style_spec_header_id as r2,
                  b.uraian AS r3,
                  a.style_spec_detail_measure as r4,
                  a.style_spec_detail_nilai as r5,
		
		          a.style_spec_detail_nilai - a.formula_spec_xs as r6,
		          (a.style_spec_detail_nilai - a.formula_spec_xs) + a.formula_spec_pattern_xs as r7,
		          ((a.style_spec_detail_nilai - a.formula_spec_xs) + a.formula_spec_pattern_xs) - (a.style_spec_detail_nilai - a.formula_spec_xs) as r8,
		
		          a.style_spec_detail_nilai as r9,
		          a.style_spec_detail_nilai + a.formula_spec_pattern_s  as r10,
		          (a.style_spec_detail_nilai + a.formula_spec_pattern_s) - a.style_spec_detail_nilai  as r11,
		
		          a.style_spec_detail_nilai + a.formula_spec_m as r12,
		          a.style_spec_detail_nilai + a.formula_spec_m + a.formula_spec_pattern_s as r13,
		          (a.style_spec_detail_nilai + a.formula_spec_m + a.formula_spec_pattern_s)-(a.style_spec_detail_nilai + a.formula_spec_m) as r14,
		    
                  a.style_spec_detail_nilai + (a.formula_spec_m + a.formula_spec_l) as r15,
		          a.style_spec_detail_nilai + a.formula_spec_m + a.formula_spec_l + a.formula_spec_pattern_l as r16,
		          (a.style_spec_detail_nilai + a.formula_spec_m + a.formula_spec_l + a.formula_spec_pattern_l) - (a.style_spec_detail_nilai + a.formula_spec_m + a.formula_spec_l) as r17,
		
                  a.style_spec_detail_nilai + (a.formula_spec_m + a.formula_spec_l + a.formula_spec_xl ) as r18,
		          a.style_spec_detail_nilai + (a.formula_spec_m + a.formula_spec_l + a.formula_spec_xl ) + a.formula_spec_pattern_xl as r19,
		          (a.style_spec_detail_nilai + a.formula_spec_m + a.formula_spec_l + a.formula_spec_xl  + a.formula_spec_pattern_xl) - (a.style_spec_detail_nilai + a.formula_spec_m + a.formula_spec_l + a.formula_spec_xl ) as r20,
		
		          a.style_spec_detail_nilai + (a.formula_spec_m + a.formula_spec_m + a.formula_spec_xl + a.formula_spec_xxl  ) as r21,
		          a.style_spec_detail_nilai + a.formula_spec_m + a.formula_spec_m + a.formula_spec_xl + a.formula_spec_xxl + a.formula_spec_pattern_xxl as r22,
		          (a.style_spec_detail_nilai + a.formula_spec_m + a.formula_spec_m + a.formula_spec_xl + a.formula_spec_xxl + a.formula_spec_pattern_xxl)- (a.style_spec_detail_nilai + a.formula_spec_m + a.formula_spec_m + a.formula_spec_xl + a.formula_spec_xxl ) as r23,
		
                  a.style_spec_detail_note as r24
                  FROM dbo.dt_style_spec_detail a
                  LEFT JOIN dbo.dt_pilih b ON b.pilih_id = a.style_spec_detail_size_id
                  WHERE a.style_spec_header_id=' . $header_id . ' order by a.style_spec_detail_id asc';
		} else  if ($basic == 'M') {
			$sql = 'SELECT a.style_spec_detail_id as r1,
 				 a.style_spec_header_id as r2,
                 b.uraian AS r3,
                 a.style_spec_detail_measure as r4,
		         a.style_spec_detail_nilai as r5,
		         a.style_spec_detail_nilai - (a.formula_spec_s + a.formula_spec_xs) as r6,
		        (a.style_spec_detail_nilai - a.formula_spec_s + a.formula_spec_xs) + a.formula_spec_pattern_xs as r7,
		        ((a.style_spec_detail_nilai - a.formula_spec_s + a.formula_spec_xs) + a.formula_spec_pattern_xs ) - (a.style_spec_detail_nilai - (a.formula_spec_s + a.formula_spec_xs)) as r8,
		        a.style_spec_detail_nilai - a.formula_spec_s as r9,
		        (a.style_spec_detail_nilai - a.formula_spec_s) + a.formula_spec_pattern_s as r10,
		        ((a.style_spec_detail_nilai - a.formula_spec_s) + a.formula_spec_pattern_s ) - (a.style_spec_detail_nilai - a.formula_spec_s) as r11,
		        a.style_spec_detail_nilai as r12,
		        a.style_spec_detail_nilai + a.formula_spec_pattern_m as r13,
		        (a.style_spec_detail_nilai + a.formula_spec_pattern_m) - a.style_spec_detail_nilai as r14,
		        a.style_spec_detail_nilai + a.formula_spec_l as r15,
		        a.style_spec_detail_nilai + a.formula_spec_l + a.formula_spec_pattern_l as r16,
		        (a.style_spec_detail_nilai + a.formula_spec_l + a.formula_spec_pattern_l)-(a.style_spec_detail_nilai + a.formula_spec_l) as r17,
		        a.style_spec_detail_nilai + a.formula_spec_l + a.formula_spec_xl as r18,
                a.style_spec_detail_nilai + a.formula_spec_l + a.formula_spec_xl + a.formula_spec_pattern_xl as r19,
		        (a.style_spec_detail_nilai + a.formula_spec_l + a.formula_spec_xl + a.formula_spec_pattern_xl)-(a.style_spec_detail_nilai + a.formula_spec_l + a.formula_spec_xl) as r20,
		        
		        a.style_spec_detail_nilai + a.formula_spec_l + a.formula_spec_xl + a.formula_spec_xxl as r21,
		        a.style_spec_detail_nilai + a.formula_spec_l + a.formula_spec_xl + a.formula_spec_xxl + a.formula_spec_pattern_xxl as r22,
		        (a.style_spec_detail_nilai + a.formula_spec_l + a.formula_spec_xl + a.formula_spec_xxl + a.formula_spec_pattern_xxl)-(a.style_spec_detail_nilai + a.formula_spec_l + a.formula_spec_xl + a.formula_spec_xxl) as r23,
		
                a.style_spec_detail_note as r24
                FROM dbo.dt_style_spec_detail a
                LEFT JOIN dbo.dt_pilih b ON b.pilih_id = a.style_spec_detail_size_id
                WHERE a.style_spec_header_id=' . $header_id . ' order by a.style_spec_detail_id asc';
		} else {
			$sql = 'SELECT a.style_spec_detail_id as r1,
               a.style_spec_header_id as r2,
               b.uraian AS r3,
               a.style_spec_detail_measure as r4,
		       a.style_spec_detail_nilai as r5,
		       a.style_spec_detail_nilai - (a.formula_spec_s + a.formula_spec_m + a.formula_spec_xs )  as r6,
		       (a.style_spec_detail_nilai - (a.formula_spec_s + a.formula_spec_m + a.formula_spec_xs)) + a.formula_spec_pattern_xs   as r7,
		       ((a.style_spec_detail_nilai - (a.formula_spec_s + a.formula_spec_m + a.formula_spec_xs)) + a.formula_spec_pattern_xs)-(a.style_spec_detail_nilai - (a.formula_spec_s + a.formula_spec_m + a.formula_spec_xs ))  as r8,
		
		       a.style_spec_detail_nilai - (a.formula_spec_m + a.formula_spec_s )  as r9,
		       (a.style_spec_detail_nilai - (a.formula_spec_m + a.formula_spec_s)) + a.formula_spec_pattern_s   as r10,
		       ((a.style_spec_detail_nilai - (a.formula_spec_m + a.formula_spec_s)) + a.formula_spec_pattern_s)-(a.style_spec_detail_nilai - (a.formula_spec_m + a.formula_spec_s ))  as r11,
		
		       a.style_spec_detail_nilai - a.formula_spec_m as r12,
		       (a.style_spec_detail_nilai - a.formula_spec_m) + a.formula_spec_pattern_m  as r13,
		       ((a.style_spec_detail_nilai - a.formula_spec_m) + a.formula_spec_pattern_m) - (a.style_spec_detail_nilai - a.formula_spec_m) as r14,
			   
		       a.style_spec_detail_nilai as r15,
		       a.style_spec_detail_nilai + a.formula_spec_pattern_l as r16,
		       (a.style_spec_detail_nilai + a.formula_spec_pattern_l) - a.style_spec_detail_nilai as r17,
			   
		       a.style_spec_detail_nilai + a.formula_spec_xl as r18,
				       a.style_spec_detail_nilai + a.formula_spec_xl + a.formula_spec_pattern_xl as r19,
		       (a.style_spec_detail_nilai + a.formula_spec_xl + a.formula_spec_pattern_xl)- (a.style_spec_detail_nilai + a.formula_spec_xl) as r20,
			   
		       a.style_spec_detail_nilai + a.formula_spec_xl + a.formula_spec_xxl  as r21,
		       a.style_spec_detail_nilai + a.formula_spec_xl + a.formula_spec_xxl  + a.formula_spec_pattern_xxl as r22,
		       (a.style_spec_detail_nilai + a.formula_spec_xl + a.formula_spec_xxl  + a.formula_spec_pattern_xxl)-(a.style_spec_detail_nilai + a.formula_spec_xl + a.formula_spec_xxl ) as r23,
		
		        a.style_spec_detail_note as r24
                FROM dbo.dt_style_spec_detail a
                LEFT JOIN dbo.dt_pilih b ON b.pilih_id = a.style_spec_detail_size_id
                WHERE a.style_spec_header_id=' . $header_id . ' order by a.style_spec_detail_id asc';
		}


		$query = $this->db_pop->query($sql);
		return $query->result_array();
		//return $this->db_pop->get($sql)->result_array();	 
	}
	function getJoin($select, $table, $key = null, $joins, $where = null)
	{
		$this->db->select('a.sales_performa_id, a.sales_performa_no, a.sales_performa_date, b.partner_name, b.partner_address, b.partner_city, c.currencies_code');
		$this->db->from('dbo.dt_sales_performa a');
		$this->db->join('dbo.dt_partner b', 'a.partner_id = b.partner_id', 'left');
		$this->db->join('dbo.dt_currencies c', 'a.currencies_id = c.currencies_id', 'left');
		$this->db->where('a.sales_performa_id=1000');
		$query = $this->db->get();
		return $query->result_array();
	}


	//     $data_field = array(
	//        'NameProduct' => 'product.IdProduct',
	//        'IdProduct' => 'product.NameProduct',
	//        'NameCategory' => 'category.NameCategory',
	//        'IdCategory' => 'category.IdCategory'
	//        );
	//    $data_join = array
	//               ( 'product' => 'product_category.IdProduct = product.IdProduct',
	//                 'category' => 'product_category.IdCategory = category.IdCategory',
	//                 'product' => 'product_category.IdProduct = product.IdProduct'
	//               );
	//   $product_category = $this->mmain->GetDataWhereExtenseJoin('product_category', $data_field, $data_join);

	public function Get_Join($table, $fields, $data, $where)
	{
		//pega os campos passados para o select
		foreach ($fields as $coll => $value) {
			$this->db->select($value);
		}
		//pega a tabela
		$this->db->from($table);
		//pega os campos do join
		foreach ($data as $coll => $value) {
			$this->db->join($coll, $value, 'left');
		}

		if (isset($where)) {
			foreach ($where as $key => $value) {
				if (is_array($value)) {
					$this->db->where_in($key, $value);
				} else {
					$this->db->where($key, $value);
				}
			}
		}

		//obtem os valores
		$query = $this->db->get();
		//retorna o resultado
		return $query->result();

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


	public function Get_Join_pop($table, $fields, $data, $where)
	{
		//pega os campos passados para o select
		foreach ($fields as $coll => $value) {
			$this->db_pop->select($value);
		}
		//pega a tabela
		$this->db_pop->from($table);
		//pega os campos do join
		foreach ($data as $coll => $value) {
			$this->db_pop->join($coll, $value, 'left');
		}

		if (isset($where)) {
			foreach ($where as $key => $value) {
				if (is_array($value)) {
					$this->db_pop->where_in($key, $value);
				} else {
					$this->db_pop->where($key, $value);
				}
			}
		}

		//obtem os valores
		$query = $this->db_pop->get();
		//retorna o resultado
		return $query->result();

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

	function decimalToFraction2($decimal)
	{
		// Determine decimal precision and extrapolate multiplier required to convert to integer
		$precision = strpos(strrev($decimal), '.') ?: 0;
		$multiplier = pow(10, $precision);

		// Calculate initial numerator and denominator
		$numerator = $decimal * $multiplier;
		$denominator = 1 * $multiplier;

		// Extract whole number from numerator
		$whole = floor($numerator / $denominator);
		$numerator = $numerator % $denominator;

		// Find greatest common divisor between numerator and denominator and reduce accordingly
		$factor = gmp_intval(gmp_gcd($numerator, $denominator));
		$numerator /= $factor;
		$denominator /= $factor;

		// Create fraction value
		$fraction = [];
		$whole && $fraction[] = $whole;
		$numerator && $fraction[] = "{$numerator}/{$denominator}";

		return implode(' ', $fraction);
	}

	function fractionToDecimal2($fraction)
	{
		// Split fraction into whole number and fraction components
		preg_match('/^(?P<whole>\d+)?\s?((?P<numerator>\d+)\/(?P<denominator>\d+))?$/', $fraction, $components);

		// Extract whole number, numerator, and denominator components
		//sscanf($fraction, "%d/%d", $numerator, $denominator);
		$whole = $components['whole'] ?: 0;
		$numerator = $components['numerator'] ?: 0;
		$denominator = $components['denominator'] ?: 0;

		// Create decimal value
		$decimal = $whole;
		$numerator && $denominator && $decimal += ($numerator / $denominator);

		return $decimal;
	}

	function get_tracing_bahan_baku($tglAwal, $tglAkhir, $where, $order = null, $limit = null, $offset = 0)
	{

		$sql = "SELECT a.item_id as r1
		            ,a.category as r2
					,a.item_code as r3
					,a.nama as r4
					,a.unit as r5
					,a.saldo_awal as r6
					,a.pemasukan as r7
					,a.pengeluaran as r8
					,a.penyesuaian as r9
					,a.stock_akhir as r10
					,b.doc_from as r11
					,b.doc_no as r12
					,b.doc_date as r13
					,b.quantity as r14
					,c.quantity_total as r15
			FROM (
	 select j.item_id as item_id,k.item_category_name as category,a.item_base_code as item_code, a.item_base_name as nama, b.uom_code as unit
, COALESCE(c.quantity,0) as saldo_awal
, COALESCE(d.quantity,0) as pemasukan
, COALESCE(e.quantity,0) * -1 as pengeluaran
, COALESCE(f.quantity,0) as penyesuaian
, COALESCE(c.quantity,0) + COALESCE(d.quantity,0) + COALESCE(e.quantity,0) + COALESCE(f.quantity,0) as stock_akhir
from dbo.dt_mst_item_base a
	Left Join dbo.ref_uom b ON a.uom_id = b.uom_id
	Left Join dbo.sp_mutasi_saldo_awal('" . $tglAwal . "') c ON a.item_base_id = c.item_base_id
	Left Join dbo.sp_mutasi_pemasukan('" . $tglAwal . "','" . $tglAkhir . "') d ON a.item_base_id = d.item_base_id
	Left Join dbo.sp_mutasi_pengeluaran('" . $tglAwal . "','" . $tglAkhir . "') e ON a.item_base_id = e.item_base_id
	Left Join dbo.sp_mutasi_penyesuaian('" . $tglAwal . "','" . $tglAkhir . "') f ON a.item_base_id = f.item_base_id
	Left Join dbo.sp_mutasi_stock_opname('" . $tglAwal . "','" . $tglAkhir . "') g ON a.item_base_id = g.item_base_id
	LEFT JOIN dbo.dt_mst_item_category h ON a.item_category_id = h.item_category_id
	Left Join dbo.prm_custom_item_type i ON h.custom_item_type_id = i.custom_item_type_id 
	LEFT JOIN dbo.dt_mst_item j ON a.item_base_id=j.item_base_id
	LEFT JOIN dbo.dt_mst_item_category k ON a.item_category_id=k.item_category_id
	where  i.custom_item_type_id = 1 
	) a 
	LEFT JOIN (SELECT * FROM dbo.view_data_assets_incoming WHERE receive_date >= '2019-08-01' AND receive_date <= '" . $tglAkhir . "') b ON a.item_code=b.item_code
	LEFT JOIN (
	select 
	item_code
	,sum(quantity) as quantity_total
	, sum(quantity_used) as used
	, sum(left_qty) as left_quantity
	FROM dbo.view_data_assets_incoming 	WHERE receive_date >= '" . $tglAwal . "' AND receive_date <= '" . $tglAkhir . "' group by item_code 
	) c ON b.item_code=c.item_code " . $where . " limit '" . $limit . "' OFFSET '" . $offset . "' ";
		//var_dump();
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	function total_contract_subcon($where)
	{
		$sql = "SELECT sum(e.quantity_subcon) FROM dbo.dt_contract_subcon a 
		 LEFT JOIN dbo.dt_partner c ON a.partner_id = c.partner_id
		 LEFT JOIN dbo.dt_subcon_out b ON a.contract_subcon_id = b.contract_subcon_id
     LEFT JOIN dbo.dt_subcon_out_detail e ON b.subcon_out_id = e.subcon_out_id
		 LEFT JOIN dbo.dt_mst_item d ON e.item_id = d.item_id where a.contract_subcon_id=" . $where . " GROUP by a.contract_subcon_id";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	function total_subcon_perdetail($where)
	{
		$sql = "SELECT d.item_id,d.item_code,d.item_name,sum(e.quantity_subcon) as jumlah  FROM dbo.dt_contract_subcon a 
		 LEFT JOIN dbo.dt_partner c ON a.partner_id = c.partner_id
		 LEFT JOIN dbo.dt_subcon_out b ON a.contract_subcon_id = b.contract_subcon_id
     LEFT JOIN dbo.dt_subcon_out_detail e ON b.subcon_out_id = e.subcon_out_id
		 LEFT JOIN dbo.dt_mst_item d ON e.item_id = d.item_id where a.contract_subcon_id=" . $where . " GROUP by a.contract_subcon_id,d.item_code,d.item_name,d.item_id";
		$query = $this->db->query($sql);
		return $query->result_array();
	}


	function jumlah_tracing_bahan_baku($tglAwal, $tglAkhir, $where)
	{
		$sql = "SELECT count(a.item_id) FROM (
	 select j.item_id as item_id,k.item_category_name as category,a.item_base_code as item_code, a.item_base_name as nama, b.uom_code as unit
, COALESCE(c.quantity,0) as saldo_awal
, COALESCE(d.quantity,0) as pemasukan
, COALESCE(e.quantity,0) * -1 as pengeluaran
, COALESCE(f.quantity,0) as penyesuaian
, COALESCE(c.quantity,0) + COALESCE(d.quantity,0) + COALESCE(e.quantity,0) + COALESCE(f.quantity,0) as stock_akhir
from dbo.dt_mst_item_base a
	Left Join dbo.ref_uom b ON a.uom_id = b.uom_id
	Left Join dbo.sp_mutasi_saldo_awal('" . $tglAwal . "') c ON a.item_base_id = c.item_base_id
	Left Join dbo.sp_mutasi_pemasukan('" . $tglAwal . "','" . $tglAkhir . "') d ON a.item_base_id = d.item_base_id
	Left Join dbo.sp_mutasi_pengeluaran('" . $tglAwal . "','" . $tglAkhir . "') e ON a.item_base_id = e.item_base_id
	Left Join dbo.sp_mutasi_penyesuaian('" . $tglAwal . "','" . $tglAkhir . "') f ON a.item_base_id = f.item_base_id
	Left Join dbo.sp_mutasi_stock_opname('" . $tglAwal . "','" . $tglAkhir . "') g ON a.item_base_id = g.item_base_id
	LEFT JOIN dbo.dt_mst_item_category h ON a.item_category_id = h.item_category_id
	Left Join dbo.prm_custom_item_type i ON h.custom_item_type_id = i.custom_item_type_id 
	LEFT JOIN dbo.dt_mst_item j ON a.item_base_id=j.item_base_id
	LEFT JOIN dbo.dt_mst_item_category k ON a.item_category_id=k.item_category_id
	where  i.custom_item_type_id = 1 
	) a 
	LEFT JOIN (SELECT * FROM dbo.view_data_assets_incoming WHERE receive_date >= '2019-08-01' AND receive_date <= '" . $tglAkhir . "') b ON a.item_code=b.item_code
	LEFT JOIN (
	select 
	item_code
	,sum(quantity) as quantity_total
	, sum(quantity_used) as used
	, sum(left_qty) as left_quantity
	FROM dbo.view_data_assets_incoming 	WHERE receive_date >= '" . $tglAwal . "' AND receive_date <= '" . $tglAkhir . "' group by item_code 
	) c ON b.item_code=c.item_code " . $where . " ";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	function get_tracing_production($tglAwal, $tglAkhir, $where, $order = null, $limit = null, $offset = 0)
	{

		$sql = "SELECT a.work_order_production_id as r1,
              g.work_process_name as r2,
              f.work_order_production_type as r3,
              a.work_order_production_no as r4,
              a.work_order_production_date as r5,
              b.work_order_plan_no as r6,
              b.work_order_plan_date as r7,
	          l.custom_type_name as r8,
		      k.bc_no as r9,
		      k.bc_date as r10,
              e.work_order_production_status as r11,
              c.username as r12,
              a.create_date as r13,
              d.username as r14,
              a.edit_date as r15,
              a.work_order_plan_id as r16,
              a.work_order_production_status_id as r17,
              a.work_process_id as r18,
              a.create_user_id as r19,
              a.edit_user_id as r20,
              a.work_order_production_type_id as r21,
              f.reject as r22
              FROM dbo.dt_work_order_production a
               LEFT JOIN dbo.dt_work_order_plan b ON a.work_order_plan_id = b.work_order_plan_id
               LEFT JOIN dbo.dt_user c ON a.create_user_id = c.user_id
               LEFT JOIN dbo.dt_user d ON a.edit_user_id = d.user_id
               LEFT JOIN dbo.prm_work_order_production_status e ON a.work_order_production_status_id = e.work_order_production_status_id
               LEFT JOIN dbo.prm_work_order_production_type f ON a.work_order_production_type_id = f.work_order_production_type_id
               LEFT JOIN dbo.dt_work_process g ON a.work_process_id = g.work_process_id
	           	 LEFT JOIN dbo.dt_stock_move h ON  a.work_order_production_id=h.work_order_production_id
	           	 LEFT JOIN dbo.dt_bc_out_barang_supply i ON h.stock_move_id=i.stock_move_id
	           	 LEFT JOIN dbo.dt_bc_out_barang j ON i.bc_out_barang_id=j.bc_out_barang_id
	           	 LEFT JOIN dbo.dt_bc_out_header k ON j.bc_out_header_id=k.bc_out_header_id
				 LEFT JOIN dbo.prm_custom_type l ON k.custom_type_id=l.custom_type_id
				 WHERE a.work_order_production_date >= '" . $tglAwal . "' AND a.work_order_production_date <= '" . $tglAkhir . "' " . $where . " limit '" . $limit . "' OFFSET '" . $offset . "' ";
		//var_dump();
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	function jumlah_tracing_production($tglAwal, $tglAkhir, $where)
	{
		$sql = "SELECT count(a.work_order_production_id)
              FROM dbo.dt_work_order_production a
               LEFT JOIN dbo.dt_work_order_plan b ON a.work_order_plan_id = b.work_order_plan_id
               LEFT JOIN dbo.dt_user c ON a.create_user_id = c.user_id
               LEFT JOIN dbo.dt_user d ON a.edit_user_id = d.user_id
               LEFT JOIN dbo.prm_work_order_production_status e ON a.work_order_production_status_id = e.work_order_production_status_id
               LEFT JOIN dbo.prm_work_order_production_type f ON a.work_order_production_type_id = f.work_order_production_type_id
               LEFT JOIN dbo.dt_work_process g ON a.work_process_id = g.work_process_id
	           	 LEFT JOIN dbo.dt_stock_move h ON  a.work_order_production_id=h.work_order_production_id
	           	 LEFT JOIN dbo.dt_bc_out_barang_supply i ON h.stock_move_id=i.stock_move_id
	           	 LEFT JOIN dbo.dt_bc_out_barang j ON i.bc_out_barang_id=j.bc_out_barang_id
	           	 LEFT JOIN dbo.dt_bc_out_header k ON j.bc_out_header_id=k.bc_out_header_id
				 LEFT JOIN dbo.prm_custom_type l ON k.custom_type_id=l.custom_type_id
				  WHERE a.work_order_production_date >= '" . $tglAwal . "' AND a.work_order_production_date <= '" . $tglAkhir . "' " . $where . " ";
		//var_dump();
		$query = $this->db->query($sql);
		return $query->result_array();
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







	public function get_spec()
	{
		$this->db_pop->select('id, value');
		$this->db_pop->from('dbo.view_list_style');
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


	public function get_checklist_ids()
	{
		$this->db_pop->distinct();
		$this->db_pop->select('checklist_id');
		$this->db_pop->from('dbo.view_checklist_detail');
		$query = $this->db_pop->get();

		return $query->result();
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
	public function show_checklist_id($checklist_id)
	{
		$this->db_pop->select('*'); // Ganti '*' dengan kolom yang ingin diambil
		$this->db_pop->from('dbo.view_checklist_detail');
		$this->db_pop->where('checklist_id', $checklist_id);
		$query = $this->db_pop->get();

		return $query->result(); // Mengembalikan semua baris data
	}
	public function get_master_list_name($master_list_id)
	{
		$this->db_pop->select('name');
		$this->db_pop->from('dbo.dt_master_list');
		$this->db_pop->where('list_id', $master_list_id);
		$query = $this->db_pop->get();
		$row = $query->row();
		return $row ? $row->name : '';
	}

	function supply_rpt_bahan_baku($date_start, $date_end, $item_name)
	{
		$sql = "select a.item_base_code as r1
		, a.item_base_name as r2
		, b.uom_code as r3
        , COALESCE(c.quantity,0) + COALESCE(d.quantity,0) + COALESCE(e.quantity,0) + COALESCE(f.quantity,0) as stock_report
from dbo.dt_mst_item_base a
	Left Join dbo.ref_uom b ON a.uom_id = b.uom_id
	Left Join dbo.sp_mutasi_saldo_awal('" . $date_start . "') c ON a.item_base_id = c.item_base_id
	Left Join dbo.sp_mutasi_pemasukan('" . $date_start . "','" . $date_end . "') d ON a.item_base_id = d.item_base_id
	Left Join dbo.sp_mutasi_pengeluaran('" . $date_start . "','" . $date_end . "') e ON a.item_base_id = e.item_base_id
	Left Join dbo.sp_mutasi_penyesuaian('" . $date_start . "','" . $date_end . "') f ON a.item_base_id = f.item_base_id
	Left Join dbo.sp_mutasi_stock_opname('" . $date_start . "','" . $date_end . "') g ON a.item_base_id = g.item_base_id
	LEFT JOIN dbo.dt_mst_item_category h ON a.item_category_id = h.item_category_id
	Left Join dbo.prm_custom_item_type i ON h.custom_item_type_id = i.custom_item_type_id
  where	i.custom_item_type_id = 1 and a.item_base_code='" . $item_name . "'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	function supply_rpt_barang_jadi($date_start, $date_end, $item_name)
	{
		$sql = "select a.item_base_code as r1
				, a.item_base_name as r2
				, b.uom_code as r3
                , COALESCE(c.quantity,0) + COALESCE(d.quantity,0) + COALESCE(e.quantity,0) + COALESCE(f.quantity,0) as stock_report
                 from dbo.dt_mst_item_base a
	            Left Join dbo.ref_uom b ON a.uom_id = b.uom_id
	            Left Join dbo.sp_mutasi_saldo_awal('" . $date_start . "') c ON a.item_base_id = c.item_base_id
	            Left Join dbo.sp_mutasi_pemasukan('" . $date_start . "','" . $date_end . "') d ON a.item_base_id = d.item_base_id
	            Left Join dbo.sp_mutasi_pengeluaran('" . $date_start . "','" . $date_end . "') e ON a.item_base_id = e.item_base_id
	            Left Join dbo.sp_mutasi_penyesuaian('" . $date_start . "','" . $date_end . "') f ON a.item_base_id = f.item_base_id
	            Left Join dbo.sp_mutasi_stock_opname('" . $date_start . "','" . $date_end . "') g ON a.item_base_id = g.item_base_id
	            LEFT JOIN dbo.dt_mst_item_category h ON a.item_category_id = h.item_category_id
	            Left Join dbo.prm_custom_item_type i ON h.custom_item_type_id = i.custom_item_type_id 
	            where i.custom_item_type_id = 2 and a.item_base_code='" . $item_name . "'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function get_checklist_data()
	{
		$query = $this->db->query("
        SELECT 
            c.checklist_id,
            c.item_code,
            c.item_name,
            cd.check_status as status,
            cd.comment,
            cd.tgl_buat
        FROM dbo.dt_checklist c
        LEFT JOIN dbo.dt_checklist_detail cd ON c.checklist_id = cd.checklist_id
        ORDER BY c.checklist_id DESC
    ");

		return $query->result();
	}
	public function count_rft_by_task_id($task_assignment_id)
	{

		if (!is_numeric($task_assignment_id) || $task_assignment_id <= 0) {
			return 0;
		}

		$this->db_pop->select('COUNT(*) AS count');
		$this->db_pop->from('dbo.view_task_assignment_detail_rft');
		$this->db_pop->where('task_assignment_id', $task_assignment_id);

		$query = $this->db_pop->get();
		$result = $query->row();

		return isset($result->count) ? $result->count : 0;
	}








	public function count_rft_by_task_id_xs($task_assignment_id)
	{

		if (!is_numeric($task_assignment_id) || $task_assignment_id <= 0) {
			return 0;
		}

		$this->db_pop->select('COUNT(*) AS count');
		$this->db_pop->from('dbo.view_task_assignment_detail_rft_xs');
		$this->db_pop->where('task_assignment_id', $task_assignment_id);

		$query = $this->db_pop->get();
		$result = $query->row();

		return isset($result->count) ? $result->count : 0;
	}
	public function count_rft_by_task_id_s($task_assignment_id)
	{

		if (!is_numeric($task_assignment_id) || $task_assignment_id <= 0) {
			return 0;
		}

		$this->db_pop->select('COUNT(*) AS count');
		$this->db_pop->from('dbo.view_task_assignment_detail_rft_s');
		$this->db_pop->where('task_assignment_id', $task_assignment_id);

		$query = $this->db_pop->get();
		$result = $query->row();

		return isset($result->count) ? $result->count : 0;
	}
	public function count_rft_by_task_id_m($task_assignment_id)
	{

		if (!is_numeric($task_assignment_id) || $task_assignment_id <= 0) {
			return 0;
		}

		$this->db_pop->select('COUNT(*) AS count');
		$this->db_pop->from('dbo.view_task_assignment_detail_rft_m');
		$this->db_pop->where('task_assignment_id', $task_assignment_id);

		$query = $this->db_pop->get();
		$result = $query->row();

		return isset($result->count) ? $result->count : 0;
	}
	public function count_rft_by_task_id_l($task_assignment_id)
	{

		if (!is_numeric($task_assignment_id) || $task_assignment_id <= 0) {
			return 0;
		}

		$this->db_pop->select('COUNT(*) AS count');
		$this->db_pop->from('dbo.view_task_assignment_detail_rft_l');
		$this->db_pop->where('task_assignment_id', $task_assignment_id);

		$query = $this->db_pop->get();
		$result = $query->row();

		return isset($result->count) ? $result->count : 0;
	}
	public function count_rft_by_task_id_xl($task_assignment_id)
	{

		if (!is_numeric($task_assignment_id) || $task_assignment_id <= 0) {
			return 0;
		}

		$this->db_pop->select('COUNT(*) AS count');
		$this->db_pop->from('dbo.view_task_assignment_detail_rft_xl');
		$this->db_pop->where('task_assignment_id', $task_assignment_id);

		$query = $this->db_pop->get();
		$result = $query->row();

		return isset($result->count) ? $result->count : 0;
	}
	public function count_rft_by_task_id_xxl($task_assignment_id)
	{

		if (!is_numeric($task_assignment_id) || $task_assignment_id <= 0) {
			return 0;
		}

		$this->db_pop->select('COUNT(*) AS count');
		$this->db_pop->from('dbo.view_task_assignment_detail_rft_xxl');
		$this->db_pop->where('task_assignment_id', $task_assignment_id);

		$query = $this->db_pop->get();
		$result = $query->row();

		return isset($result->count) ? $result->count : 0;
	}









	public function count_rft_2_by_task_id($task_assignment_id)
	{

		if (!is_numeric($task_assignment_id) || $task_assignment_id <= 0) {
			return 0;
		}

		$this->db_pop->select('COUNT(*) AS count');
		$this->db_pop->from('dbo.view_task_assignment_detail_rft_2');
		$this->db_pop->where('task_assignment_id', $task_assignment_id);

		$query = $this->db_pop->get();
		$result = $query->row();

		return isset($result->count) ? $result->count : 0;
	}
	public function count_rft_2_by_task_id_xs($task_assignment_id)
	{

		if (!is_numeric($task_assignment_id) || $task_assignment_id <= 0) {
			return 0;
		}

		$this->db_pop->select('COUNT(*) AS count');
		$this->db_pop->from('dbo.view_task_assignment_detail_rft_2_xs');
		$this->db_pop->where('task_assignment_id', $task_assignment_id);

		$query = $this->db_pop->get();
		$result = $query->row();

		return isset($result->count) ? $result->count : 0;
	}

	public function count_rft_2_by_task_id_s($task_assignment_id)
	{

		if (!is_numeric($task_assignment_id) || $task_assignment_id <= 0) {
			return 0;
		}

		$this->db_pop->select('COUNT(*) AS count');
		$this->db_pop->from('dbo.view_task_assignment_detail_rft_2_s');
		$this->db_pop->where('task_assignment_id', $task_assignment_id);

		$query = $this->db_pop->get();
		$result = $query->row();

		return isset($result->count) ? $result->count : 0;
	}
	public function count_rft_2_by_task_id_m($task_assignment_id)
	{

		if (!is_numeric($task_assignment_id) || $task_assignment_id <= 0) {
			return 0;
		}

		$this->db_pop->select('COUNT(*) AS count');
		$this->db_pop->from('dbo.view_task_assignment_detail_rft_2_m');
		$this->db_pop->where('task_assignment_id', $task_assignment_id);

		$query = $this->db_pop->get();
		$result = $query->row();

		return isset($result->count) ? $result->count : 0;
	}
	public function count_rft_2_by_task_id_l($task_assignment_id)
	{

		if (!is_numeric($task_assignment_id) || $task_assignment_id <= 0) {
			return 0;
		}

		$this->db_pop->select('COUNT(*) AS count');
		$this->db_pop->from('dbo.view_task_assignment_detail_rft_2_l');
		$this->db_pop->where('task_assignment_id', $task_assignment_id);

		$query = $this->db_pop->get();
		$result = $query->row();

		return isset($result->count) ? $result->count : 0;
	}
	public function count_rft_2_by_task_id_xl($task_assignment_id)
	{

		if (!is_numeric($task_assignment_id) || $task_assignment_id <= 0) {
			return 0;
		}

		$this->db_pop->select('COUNT(*) AS count');
		$this->db_pop->from('dbo.view_task_assignment_detail_rft_2_xl');
		$this->db_pop->where('task_assignment_id', $task_assignment_id);

		$query = $this->db_pop->get();
		$result = $query->row();

		return isset($result->count) ? $result->count : 0;
	}
	public function count_rft_2_by_task_id_xxl($task_assignment_id)
	{

		if (!is_numeric($task_assignment_id) || $task_assignment_id <= 0) {
			return 0;
		}

		$this->db_pop->select('COUNT(*) AS count');
		$this->db_pop->from('dbo.view_task_assignment_detail_rft_2_xxl');
		$this->db_pop->where('task_assignment_id', $task_assignment_id);

		$query = $this->db_pop->get();
		$result = $query->row();

		return isset($result->count) ? $result->count : 0;
	}







	public function count_reject_by_task_id_xs($task_assignment_id)
	{

		if (!is_numeric($task_assignment_id) || $task_assignment_id <= 0) {
			return 0;
		}

		$this->db_pop->select('COUNT(*) AS count');
		$this->db_pop->from('dbo.view_task_assignment_detail_reject_xs');
		$this->db_pop->where('task_assignment_id', $task_assignment_id);

		$query = $this->db_pop->get();
		$result = $query->row();

		return isset($result->count) ? $result->count : 0;
	}
	public function count_reject_by_task_id_s($task_assignment_id)
	{

		if (!is_numeric($task_assignment_id) || $task_assignment_id <= 0) {
			return 0;
		}

		$this->db_pop->select('COUNT(*) AS count');
		$this->db_pop->from('dbo.view_task_assignment_detail_reject_s');
		$this->db_pop->where('task_assignment_id', $task_assignment_id);

		$query = $this->db_pop->get();
		$result = $query->row();

		return isset($result->count) ? $result->count : 0;
	}
	public function count_reject_by_task_id_m($task_assignment_id)
	{

		if (!is_numeric($task_assignment_id) || $task_assignment_id <= 0) {
			return 0;
		}

		$this->db_pop->select('COUNT(*) AS count');
		$this->db_pop->from('dbo.view_task_assignment_detail_reject_m');
		$this->db_pop->where('task_assignment_id', $task_assignment_id);

		$query = $this->db_pop->get();
		$result = $query->row();

		return isset($result->count) ? $result->count : 0;
	}
	public function count_reject_by_task_id_l($task_assignment_id)
	{

		if (!is_numeric($task_assignment_id) || $task_assignment_id <= 0) {
			return 0;
		}

		$this->db_pop->select('COUNT(*) AS count');
		$this->db_pop->from('dbo.view_task_assignment_detail_reject_l');
		$this->db_pop->where('task_assignment_id', $task_assignment_id);

		$query = $this->db_pop->get();
		$result = $query->row();

		return isset($result->count) ? $result->count : 0;
	}
	public function count_reject_by_task_id_xl($task_assignment_id)
	{

		if (!is_numeric($task_assignment_id) || $task_assignment_id <= 0) {
			return 0;
		}

		$this->db_pop->select('COUNT(*) AS count');
		$this->db_pop->from('dbo.view_task_assignment_detail_reject_xl');
		$this->db_pop->where('task_assignment_id', $task_assignment_id);

		$query = $this->db_pop->get();
		$result = $query->row();

		return isset($result->count) ? $result->count : 0;
	}
	public function count_reject_by_task_id_xxl($task_assignment_id)
	{

		if (!is_numeric($task_assignment_id) || $task_assignment_id <= 0) {
			return 0;
		}

		$this->db_pop->select('COUNT(*) AS count');
		$this->db_pop->from('dbo.view_task_assignment_detail_reject_xxl');
		$this->db_pop->where('task_assignment_id', $task_assignment_id);

		$query = $this->db_pop->get();
		$result = $query->row();

		return isset($result->count) ? $result->count : 0;
	}





	public function count_reject_2_by_task_id_xs($task_assignment_id)
	{

		if (!is_numeric($task_assignment_id) || $task_assignment_id <= 0) {
			return 0;
		}

		$this->db_pop->select('COUNT(*) AS count');
		$this->db_pop->from('dbo.view_task_assignment_detail_reject_2_xs');
		$this->db_pop->where('task_assignment_id', $task_assignment_id);

		$query = $this->db_pop->get();
		$result = $query->row();

		return isset($result->count) ? $result->count : 0;
	}
	public function count_reject_2_by_task_id_s($task_assignment_id)
	{

		if (!is_numeric($task_assignment_id) || $task_assignment_id <= 0) {
			return 0;
		}

		$this->db_pop->select('COUNT(*) AS count');
		$this->db_pop->from('dbo.view_task_assignment_detail_reject_2_s');
		$this->db_pop->where('task_assignment_id', $task_assignment_id);

		$query = $this->db_pop->get();
		$result = $query->row();

		return isset($result->count) ? $result->count : 0;
	}
	public function count_reject_2_by_task_id_m($task_assignment_id)
	{

		if (!is_numeric($task_assignment_id) || $task_assignment_id <= 0) {
			return 0;
		}

		$this->db_pop->select('COUNT(*) AS count');
		$this->db_pop->from('dbo.view_task_assignment_detail_reject_2_m');
		$this->db_pop->where('task_assignment_id', $task_assignment_id);

		$query = $this->db_pop->get();
		$result = $query->row();

		return isset($result->count) ? $result->count : 0;
	}
	public function count_reject_2_by_task_id_l($task_assignment_id)
	{

		if (!is_numeric($task_assignment_id) || $task_assignment_id <= 0) {
			return 0;
		}

		$this->db_pop->select('COUNT(*) AS count');
		$this->db_pop->from('dbo.view_task_assignment_detail_reject_2_l');
		$this->db_pop->where('task_assignment_id', $task_assignment_id);

		$query = $this->db_pop->get();
		$result = $query->row();

		return isset($result->count) ? $result->count : 0;
	}
	public function count_reject_2_by_task_id_xl($task_assignment_id)
	{

		if (!is_numeric($task_assignment_id) || $task_assignment_id <= 0) {
			return 0;
		}

		$this->db_pop->select('COUNT(*) AS count');
		$this->db_pop->from('dbo.view_task_assignment_detail_reject_2_xl');
		$this->db_pop->where('task_assignment_id', $task_assignment_id);

		$query = $this->db_pop->get();
		$result = $query->row();

		return isset($result->count) ? $result->count : 0;
	}

	public function count_reject_2_by_task_id_xxl($task_assignment_id)
	{

		if (!is_numeric($task_assignment_id) || $task_assignment_id <= 0) {
			return 0;
		}

		$this->db_pop->select('COUNT(*) AS count');
		$this->db_pop->from('dbo.view_task_assignment_detail_reject_2_xxl');
		$this->db_pop->where('task_assignment_id', $task_assignment_id);

		$query = $this->db_pop->get();
		$result = $query->row();

		return isset($result->count) ? $result->count : 0;
	}









	public function count_rft_all_by_task_id($task_assignment_id)
	{

		if (!is_numeric($task_assignment_id) || $task_assignment_id <= 0) {
			return 0;
		}

		$this->db_pop->select('COUNT(*) AS count');
		$this->db_pop->from('dbo.view_task_assignment_detail_rft_all');
		$this->db_pop->where('task_assignment_id', $task_assignment_id);

		$query = $this->db_pop->get();
		$result = $query->row();

		return isset($result->count) ? $result->count : 0;
	}
	public function count_defect_by_task_id($task_assignment_id)
	{

		if (!is_numeric($task_assignment_id) || $task_assignment_id <= 0) {
			return 0;
		}

		$this->db_pop->select('COUNT(*) AS count');
		$this->db_pop->from('dbo.view_task_assignment_detail_defect');
		$this->db_pop->where('task_assignment_id', $task_assignment_id);

		$query = $this->db_pop->get();
		$result = $query->row();

		return isset($result->count) ? $result->count : 0;
	}
	public function count_defect_2_by_task_id($task_assignment_id)
	{

		if (!is_numeric($task_assignment_id) || $task_assignment_id <= 0) {
			return 0;
		}

		$this->db_pop->select('COUNT(*) AS count');
		$this->db_pop->from('dbo.view_task_assignment_detail_defect_2');
		$this->db_pop->where('task_assignment_id', $task_assignment_id);

		$query = $this->db_pop->get();
		$result = $query->row();

		return isset($result->count) ? $result->count : 0;
	}
	public function count_defect_all_by_task_id($task_assignment_id)
	{

		if (!is_numeric($task_assignment_id) || $task_assignment_id <= 0) {
			return 0;
		}

		$this->db_pop->select('COUNT(*) AS count');
		$this->db_pop->from('dbo.view_task_assignment_detail_defect_all');
		$this->db_pop->where('task_assignment_id', $task_assignment_id);

		$query = $this->db_pop->get();
		$result = $query->row();

		return isset($result->count) ? $result->count : 0;
	}
	public function count_reject_by_task_id($task_assignment_id)
	{

		if (!is_numeric($task_assignment_id) || $task_assignment_id <= 0) {
			return 0;
		}

		$this->db_pop->select('COUNT(*) AS count');
		$this->db_pop->from('dbo.view_task_assignment_detail_reject');
		$this->db_pop->where('task_assignment_id', $task_assignment_id);

		$query = $this->db_pop->get();
		$result = $query->row();

		return isset($result->count) ? $result->count : 0;
	}
	public function count_reject_2_by_task_id($task_assignment_id)
	{

		if (!is_numeric($task_assignment_id) || $task_assignment_id <= 0) {
			return 0;
		}

		$this->db_pop->select('COUNT(*) AS count');
		$this->db_pop->from('dbo.view_task_assignment_detail_reject_2');
		$this->db_pop->where('task_assignment_id', $task_assignment_id);

		$query = $this->db_pop->get();
		$result = $query->row();

		return isset($result->count) ? $result->count : 0;
	}
	public function count_reject_all_by_task_id($task_assignment_id)
	{

		if (!is_numeric($task_assignment_id) || $task_assignment_id <= 0) {
			return 0;
		}

		$this->db_pop->select('COUNT(*) AS count');
		$this->db_pop->from('dbo.view_task_assignment_detail_reject_all');
		$this->db_pop->where('task_assignment_id', $task_assignment_id);

		$query = $this->db_pop->get();
		$result = $query->row();

		return isset($result->count) ? $result->count : 0;
	}
	public function count_ratio_task_id($task_assignment_id)
	{

		if (!is_numeric($task_assignment_id) || $task_assignment_id <= 0) {
			return 0;
		}

		$this->db_pop->select('COUNT(*) AS count');
		$this->db_pop->from('dbo.view_task_assignment_detail_ratio');
		$this->db_pop->where('task_assignment_id', $task_assignment_id);

		$query = $this->db_pop->get();
		$result = $query->row();

		return isset($result->count) ? $result->count : 0;
	}

	public function task_id($id)
	{
		if (!is_numeric($id) || $id <= 0) {
			return '';
		}

		$this->db_pop->select('text');
		$this->db_pop->from('dbo.view_style_no_task_assignment');
		$this->db_pop->where('id', $id);

		$query = $this->db_pop->get();
		$result = $query->row();

		return isset($result->text) ? $result->text : '';
	}




	public function count_rft_2_by_task_id_task($task_assignment_id)
	{

		if (!is_numeric($task_assignment_id) || $task_assignment_id <= 0) {
			return 0;
		}

		$this->db_pop->select('COUNT(*) AS count');
		$this->db_pop->from('dbo.view_task_assignment_detail_rft_2_task');
		$this->db_pop->where('task_assignment_id', $task_assignment_id);

		$query = $this->db_pop->get();
		$result = $query->row();

		return isset($result->count) ? $result->count : 0;
	}




	function main_bom_material($bom_id)
	{
		//COALESCE(g.supply / (COALESCE(f.quantity_production, 0::numeric) + COALESCE(f.quantity_reject, 0::numeric)), 0::numeric) AS r35,	
		$sql = "SELECT c.bom_id AS id,
    c.bom_code AS r31,
    c.create_date AS r32,
    b.item_code AS r33,
    b.item_name AS r34,
    COALESCE(g.supply / (COALESCE(f.quantity_plan, 0::numeric) ), 0::numeric) AS r35,
    c.bom_name AS r37,
    d.uom_code AS r38
   FROM dbo.dt_bom_detail a
     LEFT JOIN dbo.dt_mst_item b ON a.mat_item_id = b.item_id
     LEFT JOIN dbo.dt_bom c ON a.bom_id = c.bom_id
     LEFT JOIN dbo.ref_uom d ON b.uom_id = d.uom_id
     LEFT JOIN dbo.dt_work_order e ON c.work_order_plan_id = e.work_order_plan_id
     LEFT JOIN dbo.dt_work_order_detail f ON e.work_order_id = f.work_order_id
	 LEFT JOIN dbo.view_work_order_plan_material g ON e.work_order_plan_id = g.work_order_plan_id
  WHERE c.work_order_plan_id IS NOT NULL AND f.quantity_production > 0::numeric AND b.item_id=g.item_id AND c.bom_id=" . $bom_id . "
  GROUP BY c.bom_id, c.bom_code, b.item_id, b.item_code, b.item_name, d.uom_code, f.quantity_plan, f.quantity_reject,g.supply";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	function print_pengeluaran_subcon($date_start, $date_end)
	{
		//COALESCE(g.supply / (COALESCE(f.quantity_production, 0::numeric) + COALESCE(f.quantity_reject, 0::numeric)), 0::numeric) AS r35,	
		$sql = "select a.type_bc , a.bc_no , a.bc_date, a.partner_name, a.delivery_no, a.delivery_date 
			, a.item_code, a.item_name, COALESCE(a.quantity_custom,0) as quantity_custom, COALESCE(a.quantity_delivered,0) as quantity_delivered
			, uom_code , a.stock_move_id , a.bc_out_barang_id  from dbo.view_ekspor_subcon_ecc a where a.bc_date between '" . $date_start . "' AND  '" . $date_end . "' order by a.bc_date ASC";
		$query = $this->db_pop->query($sql);
		return $query->result_array();
	}

	function print_barang_jadi_report_accounting($date_start, $date_end)
	{
		$sql = "select 
		 a.item_base_code as r1
		 ,COALESCE(a.item_base_name,'''') as r2
		 ,b.uom_code as r3
		 ,COALESCE(c.quantity,0) + COALESCE(d.quantity,0) + COALESCE(e.quantity,0) + COALESCE(f.quantity,0) as r4
		 ,COALESCE(j.price,0) as r5
		 ,(COALESCE(c.quantity,0) + COALESCE(d.quantity,0) + COALESCE(e.quantity,0) + COALESCE(f.quantity,0)) * COALESCE(j.price,0) as r6
		from dbo.dt_mst_item_base a
		Left Join dbo.ref_uom b ON a.uom_id = b.uom_id
		Left Join dbo.sp_mutasi_saldo_awal('" . $date_start . "') c ON a.item_base_id = c.item_base_id
		Left Join dbo.sp_mutasi_pemasukan('" . $date_start . "','" . $date_end . "' ) d ON a.item_base_id = d.item_base_id
	  Left Join dbo.sp_mutasi_pengeluaran('" . $date_start . "','" . $date_end . "' ) e ON a.item_base_id = e.item_base_id
		Left Join dbo.sp_mutasi_penyesuaian('" . $date_start . "','" . $date_end . "' ) f ON a.item_base_id = f.item_base_id
  	Left Join dbo.sp_mutasi_stock_opname('" . $date_start . "','" . $date_end . "' ) g ON a.item_base_id = g.item_base_id
		LEFT JOIN dbo.dt_mst_item_category h ON a.item_category_id = h.item_category_id
	  Left Join dbo.prm_custom_item_type i ON h.custom_item_type_id = i.custom_item_type_id
		LEFT JOIN (SELECT
             b.item_base_id,
             a.price,
            a.stock_move_date,
             ROW_NUMBER() OVER(PARTITION BY b.item_base_id ORDER BY a.stock_move_date DESC) as rn
         from dbo.dt_stock_move a
		     Left Join dbo.dt_mst_item b ON a.item_id = b.item_id 
         WHERE (
		     	(a.app_trans_id IN (22) AND a.quantity < 0) 
			      OR (a.app_trans_id IN (39) AND a.delivery_detail_id is null)
			      OR (a.app_trans_id IN (50) AND a.consumable_detail_id is null)
	      	)  AND a.price is not NULL
     ) j ON a.item_base_id = j.item_base_id AND rn = 1
		where i.custom_item_type_id = 2 AND (COALESCE(c.quantity,0) + COALESCE(d.quantity,0) + COALESCE(e.quantity,0) + COALESCE(f.quantity,0)) !=0 ";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	function print_barang_jadi_report_accounting_awal($date_start, $date_end)
	{
		$sql = " select 
		 a.item_base_code as r1
		 ,COALESCE(a.item_base_name,'''') as r2
		 ,b.uom_code as r3
		 ,COALESCE(c.quantity,0) + COALESCE(d.quantity,0) + COALESCE(e.quantity,0) + COALESCE(f.quantity,0) as r4
		 ,COALESCE(j.price,0) as r5
		 ,(COALESCE(c.quantity,0) + COALESCE(d.quantity,0) + COALESCE(e.quantity,0) + COALESCE(f.quantity,0)) * COALESCE(j.price,0) as r6
		from dbo.view_mst_item_base_ecc a
		Left Join dbo.ref_uom b ON a.uom_id = b.uom_id
		Left Join dbo.sp_mutasi_saldo_awal_new('" . $date_start . "') c ON a.item_base_id = c.item_base_id
		Left Join dbo.sp_mutasi_pemasukan_new('" . $date_start . "','" . $date_end . "' ) d ON a.item_base_id = d.item_base_id
	  Left Join dbo.sp_mutasi_pengeluaran_new('" . $date_start . "','" . $date_end . "' ) e ON a.item_base_id = e.item_base_id
		Left Join dbo.sp_mutasi_penyesuaian('" . $date_start . "','" . $date_end . "' ) f ON a.item_base_id = f.item_base_id
  	Left Join dbo.sp_mutasi_stock_opname('" . $date_start . "','" . $date_end . "' ) g ON a.item_base_id = g.item_base_id
		LEFT JOIN dbo.dt_mst_item_category h ON a.item_category_id = h.item_category_id
	  Left Join dbo.prm_custom_item_type i ON h.custom_item_type_id = i.custom_item_type_id
		LEFT JOIN dbo.view_harga_keluar j ON a.item_base_id = j.item_base_id 
		where i.custom_item_type_id = 2 AND (COALESCE(c.quantity,0) + COALESCE(d.quantity,0) + COALESCE(e.quantity,0) + COALESCE(f.quantity,0)) !=0 ";
		$query = $this->db_pop->query($sql);
		return $query->result_array();
	}
	
	public function getCountReceive($fabric_warehouse_receive_id)
    {
		$sql = "SELECT 
                 COUNT(status_receive_detail) as total_receive,
                 COUNT(status_receive_detail) FILTER (WHERE status_receive_detail = 1) as diterima
            FROM dbo.dt_fabric_warehouse_receive_detail 
            WHERE fabric_warehouse_receive_id = ?";
		// Jalankan query dengan binding untuk keamanan (mencegah SQL Injection)
        $query = $this->db_pop->query($sql, [$fabric_warehouse_receive_id]);
   
       return $query->row_array();
	   // Mengembalikan: ['total' => 10, 'diterima' => 7]
     }

	public function read_file()
	{
		//$apppath =  str_replace("\\", "/", APPPATH);
		$apppath = 'C:\tmp_dokumen';
		$fileconfig = $apppath . '\good_receive.txt';
		$getfiledata = file_get_contents($fileconfig, true);
		$getfiledata = trim($getfiledata);
		$pecahfile = explode("\n", $getfiledata);
		$jmldata = count($pecahfile);

		$nmhasil = "";
		$nmhasilx = "";

		for ($i = 0; $i <= $jmldata - 1; $i++) {
			$hasil = explode("=", $pecahfile[$i]);
			$nmhasil .= trim($hasil[0] . ",");
			$arrhasilx = explode("=", $pecahfile[$i]);
			$nmhasilx .= $arrhasilx[1] . "#";
		}
		$arrhasil = explode(",", $nmhasil);
		$arrhasil2 = explode("#", trim($nmhasilx));

		for ($y = 0; $y < count($arrhasil); $y++) {
			$configECC[$arrhasil[$y]] = preg_replace('/^[^=]*=/', '', $arrhasil2[$y]);
		}
		return $configECC;
	}

	public function refresh_mt($tabel_mat)
	{
		try {
			//$tabel_mat = preg_replace('/[^a-zA-Z0-9_.]/', '', $tabel_mat);
			$tabel_mat = preg_replace('/[^a-zA-Z0-9_.]/', '', $tabel_mat);
			//var_dump($tabel_mat);die();
			// Gunakan CONCURRENTLY jika sudah ada Unique Index

			// Pisahkan antara schema dan nama tabel
			$parts = explode('.', $tabel_mat);

			if (count($parts) > 1) {
				// Hasilnya: "dbo"."nama_tabel"
				$full_table_name = '"' . $parts[0] . '"."' . $parts[1] . '"';
			} else {
				// Hasilnya: "nama_tabel"
				$full_table_name = '"' . $parts[0] . '"';
			}
			// $sql = "REFRESH MATERIALIZED VIEW CONCURRENTLY \"$tabel_mat\"";
			//$sql = 'REFRESH MATERIALIZED VIEW CONCURRENTLY  "dbo"."' . $tabel_mat . '"';
			// $sql ="REFRESH MATERIALIZED VIEW CONCURRENTLY $tabel_mat";
			$sql = "REFRESH MATERIALIZED VIEW CONCURRENTLY $full_table_name";

			$query = $this->db_pop->query($sql);
			return $query;
			// return $this->db_pop->exec($sql);
		} catch (PDOException $e) {
			if ($e->getCode() == '55000') { // Kode error Postgres untuk "object is not indexed"
				throw new Exception("Gagal: View ini butuh UNIQUE INDEX untuk refresh CONCURRENTLY.");
			}
			throw new Exception("Gagal Refresh Database: " . $e->getMessage());
		}
	}



	public function cari_kata_utuh_pg($kolom, $keyword, $tabel, $fields = '*')
	{
		// 1. Amankan karakter spesial untuk Regex
		$keyword = trim($keyword);
		$safe_keyword = preg_quote($keyword, '/');

		// 2. Buat pola Word Boundary untuk PostgreSQL
		$pattern = '\\y' . $safe_keyword . '\\y';

		// 3. Gunakan parameter binding (?)
		// Parameter kedua adalah array yang berisi nilai untuk menggantikan '?'
		// Misal: ['id', 'purchase_order_no'] menjadi "id", "purchase_order_no"
		if (is_array($fields)) {
			$fields = '"' . implode('", "', $fields) . '"';
		}
		$sql = "SELECT $fields FROM \"dbo\".\"$tabel\" 
             WHERE \"$kolom\" ~* ?";
		$query = $this->db_pop->query($sql, array($pattern));
		// return $query->result();
		return $query->result_array();
		//return $this->db_pop->get('users')->result();
	}
	
	public function cari_kata_utuh_new($kolom, $keyword, $tabel, $kolom2, $keyword2, $fields = '*')
      {
          // 1. Olah Keyword Utama (Regex Word Boundary)
          if (is_array($keyword)) {
              // Hapus duplikat & bersihkan spasi
              $keyword = array_unique(array_map('trim', $keyword)); 
              $patterns = array_map(function($item) {
                  return '\\y' . preg_quote($item, '/') . '\\y';
              }, $keyword);
              $final_pattern = '(' . implode('|', $patterns) . ')';
          } else {
              $final_pattern = '\\y' . preg_quote(trim($keyword), '/') . '\\y';
          }
      
          // 2. Format Fields SELECT
          if (is_array($fields)) {
              $fields = '"' . implode('", "', $fields) . '"';
          }
      
          // 3. Bangun Query Dasar
          $sql = "SELECT $fields FROM \"dbo\".\"$tabel\" WHERE \"$kolom\" ~* ?";
          $params = [$final_pattern];
      
          // 4. Tangani Filter No PO ($keyword2)
          if (is_array($keyword2) && !empty($keyword2)) {
              // PENTING: Hapus duplikat dari array(14) tadi agar query ringan
            //  $clean_keyword2 = array_values(array_unique($keyword2));
              
              // Buat placeholder ? sejumlah data unik
              $placeholders = implode(', ', array_fill(0, count($keyword2), '?'));
              
              $sql .= " AND \"$kolom2\" IN ($placeholders)";
              
              // Tambahkan nilai unik ke parameter binding
              foreach ($keyword2 as $val) {
                  $params[] = $val;
              }
          }
      
          // 5. Eksekusi
          $query = $this->db_pop->query($sql, $params);
          return $query->result_array();
      }
	
	public function cari_data_utuh($kolom, $keyword, $tabel, $kolom2, $keyword2, $fields = '*')
	{
		
		// 1. Amankan karakter spesial untuk Regex
		if (is_array($keyword)) {
            // Bersihkan setiap elemen array dan bungkus dengan \y
            $patterns = array_map(function($item) {
              return '\\y' . preg_quote(trim($item), '/') . '\\y';
           }, $keyword);
        
          // Gabungkan dengan simbol pipe (|) yang berarti "ATAU" dalam Regex
          // Contoh: (\yMerah\y|\yBiru\y|\yHijau\y)
             $pattern = '(' . implode('|', $patterns) . ')';
          }else{
		     $keyword = trim($keyword);
		     $safe_keyword = preg_quote($keyword, '/');
  		      // 2. Buat pola Word Boundary untuk PostgreSQL
		     $pattern = '\\y' . $safe_keyword . '\\y';
          }
        $keyword2 = trim($keyword2);
		// 3. Gunakan parameter binding (?)
		// Parameter kedua adalah array yang berisi nilai untuk menggantikan '?'
		// Misal: ['id', 'purchase_order_no'] menjadi "id", "purchase_order_no"
		if (is_array($fields)) {
			$fields = '"' . implode('", "', $fields) . '"';
		}
		$sql = "SELECT $fields FROM \"dbo\".\"$tabel\" 
             WHERE \"$kolom\" ~* ?
			 AND \"$kolom2\" = ?" ;
			 
	    $params = array($pattern, $keyword2);
        $query = $this->db_pop->query($sql, $params); 
		//$query = $this->db_pop->query($sql, array($pattern));
		// return $query->result();
		return $query->result_array();
		//return $this->db_pop->get('users')->result();
	}
	
	public function cari_data_utuh_cek($kolom, $keyword, $tabel, $kolom2, $keyword2, $fields = '*')
	{
		
		// 1. Amankan karakter spesial untuk Regex
		if (is_array($keyword)) {
            // Bersihkan setiap elemen array dan bungkus dengan \y
            $patterns = array_map(function($item) {
              return '\\y' . preg_quote(trim($item), '/') . '\\y';
           }, $keyword);
        
          // Gabungkan dengan simbol pipe (|) yang berarti "ATAU" dalam Regex
          // Contoh: (\yMerah\y|\yBiru\y|\yHijau\y)
             $pattern = '(' . implode('|', $patterns) . ')';
          }else{
		     $keyword = trim($keyword);
		     $safe_keyword = preg_quote($keyword, '/');
  		      // 2. Buat pola Word Boundary untuk PostgreSQL
		     $pattern = '\\y' . $safe_keyword . '\\y';
          }
        $keyword2 = trim($keyword2);
		// 3. Gunakan parameter binding (?)
		// Parameter kedua adalah array yang berisi nilai untuk menggantikan '?'
		// Misal: ['id', 'purchase_order_no'] menjadi "id", "purchase_order_no"
		if (is_array($fields)) {
			$fields = '"' . implode('", "', $fields) . '"';
		}
		$sql = "SELECT $fields FROM \"dbo\".\"$tabel\" 
             WHERE \"$kolom\" ~* ?
			 AND \"$kolom2\" ILIKE ?" ;
			 
	    $params = array($pattern, $keyword2);
        $query = $this->db_pop->query($sql, $params); 
		//$query = $this->db_pop->query($sql, array($pattern));
		// return $query->result();
		return $query->result_array();
		//return $this->db_pop->get('users')->result();
	}

     public function cari_data_utuh_2($kolom, $keyword, $tabel, $kolom2, $keyword2, $fields = '*') //menggunkana cara Ilike tetapi masalahnya jika ada yang sama akan dibagung
{
    // 1. Tangani Keyword (Jika array atau string)
    // Karena ILIKE tidak mendukung pipe (|), kita pakai cara sederhana atau ambil elemen pertama
    if (is_array($keyword)) {
        // Jika array, kita ambil elemen pertama atau sesuaikan logika bisnis Anda
        $keyword = trim($keyword[0]); 
    } else {
        $keyword = trim($keyword);
    }

    // 2. Siapkan pattern ILIKE (mencari teks yang mengandung keyword)
    // Contoh: "%Biru (Navy)%"
    $pattern = '%' . $keyword . '%';
    $keyword2 = trim($keyword2);

    // 3. Format Fields
    if (is_array($fields)) {
        $fields = '"' . implode('", "', $fields) . '"';
    }

    // 4. Ubah operator ~* menjadi ILIKE
    $sql = "SELECT $fields FROM \"dbo\".\"$tabel\" 
            WHERE \"$kolom\" ILIKE ?
            AND \"$kolom2\" = ?";

    $params = array($pattern, $keyword2);
    $query = $this->db_pop->query($sql, $params); 

    return $query->result_array();
}

	public function cari_kata_utuh_pg_ok($keyword)
	{
		// 1. Bersihkan input dari spasi yang tidak sengaja terketik
		$keyword = trim($keyword);
		$safe_keyword = preg_quote($keyword, '/');
		// 2. Buat pola Word Boundary untuk PostgreSQL
		$pattern = '\\y' . $safe_keyword . '\\y';
		// 3. Gunakan parameter binding (?)
		// Parameter kedua adalah array yang berisi nilai untuk menggantikan '?'
		$sql = "SELECT * FROM \"dbo\".\"view_purchase_order_ecc\" 
             WHERE \"purchase_order_no\" ~* ?";

		//  $this->db_pop->where($sql, [$pattern], FALSE);
		$query = $this->db_pop->query($sql, array($pattern));
		// return $query->result();
		return $query->result_array();
		// return $query->row(); // Mengembalikan satu baris data
		// return $this->db_pop->get($table)->result();
	}

	function validasiWarnaEksklusif($input, $warnaDicari)
	{
		$masterWarna = ['white', 'black', 'red', 'blue', 'green', 'yellow'];

		// Normalisasi: Ubah simbol jadi spasi agar 'white/black' terbaca terpisah
		$cleanInput = preg_replace('/[^a-zA-Z0-9]/', ' ', $input);

		$warnaDitemukan = [];
		foreach ($masterWarna as $warna) {
			if (preg_match("/\b" . preg_quote($warna, '/') . "\b/i", $cleanInput)) {
				$warnaDitemukan[] = strtolower($warna);
			}
		}

		$adaWarnaTarget = in_array(strtolower($warnaDicari), $warnaDitemukan);
		$jumlahWarna = count($warnaDitemukan);

		if ($adaWarnaTarget && $jumlahWarna === 1) {
			return ['status' => true, 'pesan' => "Valid: Murni $warnaDicari"];
		} elseif ($jumlahWarna > 1) {
			return ['status' => false, 'pesan' => "Gagal: Campuran (" . implode(', ', $warnaDitemukan) . ")"];
		} else {
			return ['status' => false, 'pesan' => "Gagal: Bukan $warnaDicari"];
		}
	}

	//logika cache 
	public function get_id_warna_eksklusif($warna_target)
	{
		// 1. Coba ambil daftar warna dari Cache terlebih dahulu
		$this->load->driver('cache', array('adapter' => 'file'));
		$list_warna_lain = $this->cache->get('master_warna_lain');

		if (!$list_warna_lain) {
			// Jika cache kosong, ambil dari DB
			$this->db->select('warna');
			$this->db->distinct();
			$all_strings = $this->db->get('item_barang')->result_array();

			$temp_warna = [];
			foreach ($all_strings as $row) {
				$words = preg_split('/[^a-zA-Z0-9]/', $row['warna'], -1, PREG_SPLIT_NO_EMPTY);
				foreach ($words as $w) {
					$w_lower = strtolower($w);
					if (!is_numeric($w_lower)) {
						$temp_warna[$w_lower] = true;
					}
				}
			}
			$list_warna_lain = array_keys($temp_warna);

			// Simpan ke cache selama 3600 detik (1 jam)
			$this->cache->save('master_warna_lain', $list_warna_lain, 3600);
		}

		// 2. Filter daftar warna lain (buang warna_target dari daftar pembanding)
		$warna_target_lower = strtolower($warna_target);
		$pembanding = array_filter($list_warna_lain, function ($v) use ($warna_target_lower) {
			return $v !== $warna_target_lower;
		});

		// 3. Query Utama PostgreSQL
		$this->db->select('id, warna');
		$this->db->from('item_barang');

		// Syarat: Harus white bersih (spasi/batas string, bukan simbol / atau #)
		$this->db->where("warna ~* '(^|[[:space:]])" . preg_quote($warna_target) . "([[:space:]]|$)'");

		// Syarat: Tidak boleh ada warna lain
		if (!empty($pembanding)) {
			$regex_warna_lain = implode('|', array_map('preg_quote', $pembanding));
			$this->db->where("warna NOT ~* '[[:<:]](" . $regex_warna_lain . ")[[:>:]]'");
		}

		return $this->db->get()->result_array();
	}
}
