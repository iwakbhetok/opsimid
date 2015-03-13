<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ticket_stock_mdl extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getrecordcount() {
        $data = $this->db->count_all_results('ticketing_ticket_stock');
        return $data;
    }

    function getdatalist() {
        $data = array();
        $fields = array(
            'stock_id',
            'vendor_id',            
            'group_id',
            'prefix',
            'start',
            'until',
            'total_ticket',
            'stock_date',
            'description',
        );

        $this->db->select($fields);
        $query = $this->db->get('ticketing_ticket_stock');
        $nomor = 1;
        foreach ($query->result() as $row):
            $data[] = array(
                'stock_id' => $row->stock_id,
                'vendor_id' => $row->vendor_id,                
                'group_id' => $row->group_id,
                'prefix' => $row->prefix,
                'start' => $row->start,
                'until' => $row->until,   
            );
            $nomor++;
        endforeach;
        return $data;
    }

    function getdataid($id) {
        $data = array();
        $fields = array(
            'airlines_id',
            'airlines_name',            
            'contact_person',
            'phone',
            'email',
            'address',
        );

        $this->db->select($fields);
        $this->db->where('airlines_id', $id);
        $query = $this->db->get('ticketing_mst_airlines');
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $data = array(
                'airlines_id' => $row->airlines_id,
                'airlines_name' => $row->airlines_name,                
                'contact_person' => $row->contact_person,
                'phone' => $row->phone,
                'email' => $row->email,
                'address' => $row->address,
            );
        }
        return $data;
    }

   function save($params) {
        $log = $this->session->all_userdata();
        $this->load->model('logUpdate');
        $valid = false;
        
                $fields = array(
                    'airlines_name'     => $params->airlines_name,                     
                    'contact_person'    => $params->contact_person,
                    'phone'      		=> $params->phone,
                    'email'      		=> $params->email,
                    'address'    		=> $params->address,
                    'add_date'        	=> date('Y-m-d H:i:s'),
                    'add_user'        	=> $log['user_id'],
                );	
        
        if (!empty($params->airlines_id)) {
            $this->db->where("airlines_id", $params->airlines_id);
            $fields_update = array(
                    'airlines_name'     => $params->airlines_name,                     
                    'contact_person'    => $params->contact_person,
                    'phone'      		=> $params->phone,
                    'email'      		=> $params->email,
                    'address'      		=> $params->address,
                    'modified_date'     => date('Y-m-d H:i:s'),
                    'modified_user'     => $log['user_id'],
                );
            $valid = $this->db->update("ticketing_mst_airlines", $fields_update);
            $valid = $this->logUpdate->addLog("update", "ticketing_mst_airlines", $params);
        }
        else {
            $valid = $this->db->insert('ticketing_mst_airlines', $fields);
            $valid = $this->logUpdate->addLog("insert", "ticketing_mst_airlines", $params);
                        
        }
        return true;
    }

    public function delete($id)
    {   
        $log = $this->session->all_userdata();
        $this->load->model('logUpdate');
        $valid = false;     
        $valid = $this->logUpdate->addLog("delete", "ticketing_mst_airlines", array("airlines_id" => $id));   
        
        if ($valid){
            $this->db->where('airlines_id', $id);
            $valid = $this->db->delete('ticketing_mst_airlines');
        }
        
        return $valid;      
    }

}
