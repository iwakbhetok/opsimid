<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class supplier_mdl extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function getrecordcount()
    {
            $data = $this->db->count_all_results('mst_supplier');
            return $data;
    }

    function getsupplier_hotel_combobox()
    {        
        $this->db->where('supplier_code LIKE', 'HS%');
        $this->db->order_by('supplier_code asc');
        $query = $this->db->get('mst_supplier');
        $nomor = 1;
        foreach($query->result() as $row):
            $data[] = array(
                'supplier_id'   => $row->supplier_id,
                'supplier_name' => $row->supplier_name,
            ); 
            $nomor++;
        endforeach;
        return $data;
    }

}