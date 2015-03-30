<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class room_mdl extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getrecordcount() {
        $data = $this->db->count_all_results('hotel_mst_room');
        return $data;
    }

    function getroom_type_combobox()
    {
        $this->db->order_by('room_name asc');
        $query = $this->db->get('hotel_mst_room');
        $nomor = 1;
        foreach($query->result() as $row):
            $data[] = array(
                'room_id'   => $row->room_id,
                'room_name' => $row->room_name,
            ); 
            $nomor++;
        endforeach;
        return $data;
    }

    function getdatalist() {
        $data = array();
        $fields = array(
            'room_id',
            'room_name',
            'description',
        );

        $this->db->select($fields);
        $this->db->where('state', '1');
        $query = $this->db->get('hotel_mst_room');
        $nomor = 1;
        foreach ($query->result() as $row):
            $data[] = array(
                'room_id' => $row->room_id,
                'room_name' => $row->room_name,
                'description' => $row->description,
            );
            $nomor++;
        endforeach;
        return $data;
    }

    function getdataid($id) {
        $data = array();
        $fields = array(
            'room_name',
            'description',
        );

        $this->db->select($fields);

        $this->db->where('room_id', $id);
        $query = $this->db->get('hotel_mst_room');
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $data = array(
                'room_name' => $row->room_name,
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
                    'room_name'      => $params->room_name,
                    'description'         => $params->description,
                    'state'         => '1',
                    'add_date'        => date('Y-m-d H:i:s'),
                    'add_user'        => $log['user_id'],
                );
        
        if (!empty($params->hotel_id)) {
            $fields_update = array(
                    'room_name'      => $params->room_name,
                    'description'         => $params->description,
                    'modified_date'        => date('Y-m-d H:i:s'),
                    'modified_user'        => $log['user_id'],
                );
            $this->db->where("room_id", $params->room_id);
            $valid = $this->db->update("hotel_mst_room", $fields_update);
                        
            $valid = $this->logUpdate->addLog("update", "hotel_mst_room", $params);
        }
        else {
            $valid = $this->db->insert('hotel_mst_room', $fields);
            $valid = $this->logUpdate->addLog("insert", "hotel_mst_room", $params);
                        
        }
        return true;
    }

    function delete($id) {
       $log = $this->session->all_userdata();
        $this->load->model('logUpdate');
        $valid = false;
        if (!empty($id)) {
                $fields_update = array(
                    'state'         => '0',
                    'modified_date'     => date('Y-m-d H:i:s'),
                    'modified_user'     => $log['user_id'],
                );
            
            $this->db->where("room_id", $id);
            $valid = $this->db->update("hotel_mst_room", $fields_update);
                        
            $valid = $this->logUpdate->addLog("delete", "hotel_mst_room", array('room_id'=> $id));
        }
        return true;
    }

}
