<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class class_mdl extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getrecordcount() {
        $data = $this->db->count_all_results('hotel_mst_class');
        return $data;
    }

    function getclass_combobox()
    {
        $this->db->order_by('class_name asc');
        $query = $this->db->get('hotel_mst_class');
        $nomor = 1;
        foreach($query->result() as $row):
            $data[] = array(
                'class_id'   => $row->class_id,
                'class_name' => $row->class_name,
            ); 
            $nomor++;
        endforeach;
        return $data;
    }

    function getdatalist() {
        $data = array();
        $fields = array(
            'class_id',
            'class_name',
            'description',
        );

        $this->db->select($fields);
        $query = $this->db->get('hotel_mst_class');
        $nomor = 1;
        foreach ($query->result() as $row):
            $data[] = array(
                'class_id' => $row->class_id,
                'class_name' => $row->class_name,
                'description' => $row->description,
            );
            $nomor++;
        endforeach;
        return $data;
    }

    function getdataid($id) {
        $data = array();
        $fields = array(
            'class_id',
            'class_name',
            'description',
        );

        $this->db->select($fields);
        $this->db->where('class_id', $id);
        $query = $this->db->get('hotel_mst_class');
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $data = array(
                'class_id' => $row->class_id,
                'class_name' => $row->class_name,
                'description' => $row->description,
            );
        }
        return $data;
    }

   function save($params) {
        $log = $this->session->all_userdata();
        $this->load->model('logUpdate');
        $valid = false;
        
                $fields = array(
                    'class_name'      => $params->class_name, 
                    'description'      => $params->description,
                    'add_date'        => date('Y-m-d H:i:s'),
                    'add_user'        => $log['user_id'],
                );
        
        if (!empty($params->class_id)) {
            $this->db->where("class_id", $params->class_id);
            $fields_update = array(
                    'class_name'      => $params->class_name, 
                    'description'      => $params->description,
                    'modified_date'        => date('Y-m-d H:i:s'),
                    'modified_user'        => $log['user_id'],
                );
            $valid = $this->db->update("hotel_mst_class", $fields_update);
            $valid = $this->logUpdate->addLog("update", "hotel_mst_class", $params);
        }
        else {
            $valid = $this->db->insert('hotel_mst_class', $fields);
            $valid = $this->logUpdate->addLog("insert", "hotel_mst_class", $params);
                        
        }
        return true;
    }

    public function delete($id)
    {   
        $log = $this->session->all_userdata();
        $this->load->model('logUpdate');
        $valid = false;     
        $valid = $this->logUpdate->addLog("delete", "hotel_mst_class", array("class_id" => $id));   
        
        if ($valid){
            $this->db->where('class_id', $id);
            $valid = $this->db->delete('hotel_mst_class');
        }
        
        return $valid;      
    }

}
