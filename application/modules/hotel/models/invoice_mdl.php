<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class modelinvoice extends CI_Model {
	
	public function __construct(){
            parent::__construct();
            $this->load->model('logUpdate');
	}
        
        function getrecordcount()
        {
            $data = $this->db->count_all_results('trans_invhotel');
            return $data;
        }
        
        function getdatalist()
        {
            $data = array();
            $fields = array(
                'id_detail', 
                'dp_number', 
                'transaksi_no', 
                "(DATE_FORMAT(tanggal_transaksi, '%d-%m-%Y')) as tanggal_transaksi" ,
                'id_dept',                
                'kode_customer', 
                'cp', 
                'currency',
                'amount',
                'note',
            );
            $this->db->select($fields);
            $query = $this->db->get('trans_invhotel');
            $nomor = 1;
            foreach($query->result() as $row):                
                $data[] = array(
                    'nomor'                 => $nomor,
                    'id_dp_customer'        => $row->id_dp_customer, 
                    'dp_number'             => $row->dp_number, 
                    'transaksi_no'          => $row->transaksi_no, 
                    'tanggal_transaksi'     => $row->tanggal_transaksi,
                    'id_dept'               => $row->id_dept,                     
                    'kode_customer'         => $row->kode_customer, 
                    'cp'                    => $row->cp, 
                    'currency'              => $row->currency,
                    'amount'                => number_format($row->amount, 2, '.', ','),
                    'note'                  => $row->note,
                );
                $nomor++;
            endforeach;
            
            return $data;
        }
        
        function getdataid($id)
        {
            $data = array();
            $fields = array(
                'id_dp_customer', 
                'dp_number', 
                'transaksi_no', 
                "tanggal_transaksi" ,
                'id_dept',                
                'kode_customer', 
                'cp', 
                'currency',
                'amount',
                'note',
            );
            $this->db->select($fields);
            $this->db->where('id_dp_customer', $id);
            $query = $this->db->get('dp_customer');
            if ($query->num_rows>0){
                $row = $query->row();
                $data = array(
                    'id_dp_customer'    => $row->id_dp_customer,
                    'dp_number'         => $row->dp_number,
                    'transaksi_no'      => $row->transaksi_no,
                    'tanggal_transaksi' => $row->tanggal_transaksi,
                    'id_dept'           => $row->id_dept,
                    'kode_customer'     => $row->kode_customer,
                    'cp'                => $row->cp,
                    'currency'             => $row->currency,
                    'amount'            => $row->amount,
                    'note'              => $row->note,
                );
            }
            return $data;
        }
        
        public function save($params)
	{	
		$log = $this->session->all_userdata();
		$valid = false;
                
                $fields = array(
                    "dp_number"         => $params->dp_number,
                    "transaksi_no"      => $params->transaksi_no,
                    "tanggal_transaksi" => $params->tanggal_transaksi,		
                    "id_customer"       => $params->id_customer,
                    "cp"                => $params->cp,
                    "amount"            => $params->amount,
                    "note"              => $params->note,
                );
                        
		if (!empty($params->id_dp_customer)) {
			$this->db->where("id_dp_customer", $params->id);
			$valid = $this->db->update("dp_customer");
                        
			$valid = $this->logUpdate->addLog("update", "dp_customer", $params);
		}
		else {
			$valid = $this->db->insert('dp_customer');
                        $valid = $this->logUpdate->addLog("insert", "dp_customer", $params);
		}
		
		return true;		
	}
        
        public function delete($id)
	{	
		$log = $this->session->all_userdata();
		$valid = false;		
		$valid = $this->logUpdate->addLog("delete", "dp_customer", array("id_dp_customer" => $id));	
		
		if ($valid){
			$this->db->where('id_dp_customer', $id);
			$valid = $this->db->delete('dp_customer');
		}
		
		return $valid;		
	}
}	