<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dp_supplier_mdl extends CI_Model {
	
	public function __construct(){
            parent::__construct();
            $this->load->model('logUpdate');
	}

	function create_cashier_no(){
		$log = $this->session->all_userdata();
		$office_code = $log['division_id'];
		$year = date('y');
		$month = date('m');
		$this->db->select_max('cashier_number'); 
		$query = $this->db->get('trans_ticketing_dp_supplier');
		$row = $query->result();
		if (empty($row)) {
			$data = $office_code.''.resetter_new_number();
		}
		else{
			$data = $office_code.''.resetter_new_number($row[0]->cashier_number);
		}
		return $data;
	}

	function create_slip_no(){//resetter_new_number
		$log = $this->session->all_userdata();
		$office_code = $log['division_id'];
		$year = date('y');
		$month = date('m');
		$this->db->select_max('dp_slip_number'); 
		$query = $this->db->get('trans_ticketing_dp_supplier');
		$row = $query->result();
		$arr_dp_slip_number = str_split($row[0]->dp_slip_number, 2);
		$curr_sequence = $arr_dp_slip_number[4].''.$arr_dp_slip_number[5];
		$new_sequence = sprintf('%04d',((int)$curr_sequence + 1));
		if (empty($row)) {
			$data = $office_code.''.resetter_new_number_with_code($row);
		}
		else{
			$data = $office_code.''.resetter_new_number_with_code($row[0]->dp_slip_number);
		}
		return $data;
	}

	function getmax_transaction_number(){
		$this->db->select_max('transaction_number'); 
		$query = $this->db->get('trans_ticketing_dp_supplier');
		$data = $query->result();
		if (empty($data)){
			return sprintf('%010d','1');
		}
		else {
			$data = (int)$data + 1;
			return sprintf('%010d', $data);
		}
	}

}