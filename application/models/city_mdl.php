<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class city_mdl extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function getrecordcount()
    {
            $data = $this->db->count_all_results('mst_city');
            return $data;
    }
        
    function getdatalist($state_id)
    {
        $this->db->where('state_id', $state_id);
        $this->db->order_by('city_name asc');
        $query = $this->db->get('mst_city');
        $nomor = 1;
        $data = array();
        foreach($query->result() as $row):
            $data[] = array(
                'city_id'  => $row->city_id,
                'city_name'    => $row->city_name,
            ); 
            $nomor++;
        endforeach;
        return $data;
    }

}