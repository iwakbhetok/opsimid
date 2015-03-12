<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class state_mdl extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function getrecordcount()
    {
            $data = $this->db->count_all_results('mst_state');
            return $data;
    }
        
    function getdatalist($country_id)
    {
        $this->db->where('country_id', $country_id);
        $this->db->order_by('state_name asc');
        $query = $this->db->get('mst_state');
        $nomor = 1;
        $data = array();
        foreach($query->result() as $row):
            $data[] = array(
                'state_id'  => $row->state_id,
                'state_name'    => $row->state_name,
            ); 
            $nomor++;
        endforeach;
        return $data;
    }

}