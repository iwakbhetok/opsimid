<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class country_mdl extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function getrecordcount()
    {
            $data = $this->db->count_all_results('mst_country');
            return $data;
    }
        
    function getdatalist()
    {
        $this->db->order_by('country_name asc');
        $query = $this->db->get('mst_country');
        $nomor = 1;
        foreach($query->result() as $row):
            $data[] = array(
                'country_id'  => $row->country_id,
                'country_name'    => $row->country_name,
            ); 
            $nomor++;
        endforeach;
        return $data;
    }

    function getdatacurrency_combobox()
    {
        $this->db->where('currency !=', '');
        $this->db->order_by('currency asc');
        $query = $this->db->get('mst_country');
        $nomor = 1;
        foreach($query->result() as $row):
            $data[] = array(
                'country_id'  => $row->country_id,
                'currency'    => $row->currency,
                'currency_label'    => $row->currency.' - '.$row->country_name,
            ); 
            $nomor++;
        endforeach;
        return $data;
    }

}