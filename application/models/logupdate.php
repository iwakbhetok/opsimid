<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// change update by dwi
// Jan, 29, 2015
// move from folder main to models

class logUpdate extends CI_Model {
	
    public function __construct()
    {
        parent::__construct();
	}
	
	private function getIP() {
		$ipaddress = '';
      
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			$ipaddress = $_SERVER['REMOTE_ADDR'];
		}

      	return $ipaddress;
	}
	
	public function addLog($act, $table, $record)
	{
		$log = $this->session->all_userdata();
		$valid = false;
		
		$ip = $this->getIP();
	
		if ($act == "delete") {
			$field = array();
			$data = array();
			
			$selFields = $this->db->field_data($table);
			$c = 0;
			foreach ($selFields as $d) {
			   $c++; 
			   $field[$c] = $d->name;
			}
			
			$query = $this->db->get_where($table, $record);
			$data = $query->row();
			$arrData = array_combine($field, (array) $data);
			$dataRecord = str_replace("+", " ", http_build_query($arrData, '', ', '));
		}
		else {
			$arrData = (array) $record;
			$dataRecord = str_replace("+", " ", http_build_query($arrData, '', ', '));			
		}
		
		$this->db->set("ip_address", $ip);
		$this->db->set("user_id", $this->session->userdata('userId'));
		$this->db->set("position_id", $this->session->userdata('userSKPD'));
		$this->db->set("action", $act);
		$this->db->set("record", $dataRecord);
		$this->db->set("table_transaction", $table);
		$valid = $this->db->insert('reff_log');	
		
		return $valid;
	}
}
?>