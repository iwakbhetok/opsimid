<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class customer_mdl extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function getrecordcount()
    {
        $this->db->where('state', '1');
        $this->db->from('mst_customer');
        $data = $this->db->count_all_results();
        return $data;
    }
        
    function getdatalist()
    {
        $this->db->where('state', '1');
        $this->db->order_by('full_name asc');
        $query = $this->db->get('mst_customer');
        $nomor = 1;
        $data = array();
        foreach($query->result() as $row):
            $data[] = array(
                'customer_id'  => $row->customer_id,
                'nomor'         => $nomor,
                'customer_name'    => $row->title.' '.$row->full_name,
                'address'  => 'Address 1: '.$row->address_1.'<br> Address 2: '.$row->address_2,
                'email'  => $row->email,
                'contact_person'  => $row->full_name,
                'pricing_policy'  => $row->pricing_policy,
                'description'  => $row->description,
            ); 
            $nomor++;
        endforeach;
        return $data;
    }

}