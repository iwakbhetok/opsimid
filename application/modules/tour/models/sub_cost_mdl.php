<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class sub_cost_mdl extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getrecordcount() {
        $data = $this->db->count_all_results('tour_mst_sub_cost');
        return $data;
    }

    function getdatalist() {
        $data = array();
        $fields = array(
            'sub_cost_id',
            'sub_cost_code',
            'sub_cost_name',
            'description',
        );

        $this->db->select($fields);
//            $this->db->join('coa_class_type', 'coa_class_type.class_type_id=coa_class.class_type_id', 'left');
        $query = $this->db->get('tour_mst_sub_cost');
        $nomor = 1;
        foreach ($query->result() as $row):
            $data[] = array(
                'nomor' => $nomor,
                'sub_cost_id' => $row->sub_cost_id,
                'sub_cost_code' => $row->sub_cost_code,
                'sub_cost_name' => $row->sub_cost_name,
                'description' => $row->description,
            );
            $nomor++;
        endforeach;
        return $data;
    }

    function getdataid($id) {
        $data = array();
        $fields = array(
            'sub_cost_id',
            'sub_cost_code',
            'sub_cost_name',
            'description',
//            'coa_class.class_type_id',
//            'alamat',
        );

        $this->db->select($fields);
//        $this->db->join('coa_class_type', 'coa_class_type.class_type_id=coa_class.class_type_id', 'left');

        $this->db->where('sub_cost_id', $id);
        $query = $this->db->get('tour_mst_sub_cost');
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $data = array(
                'sub_cost_id' => $row->sub_cost_id,
                'sub_cost_code' => $row->sub_cost_code,
                'sub_cost_name' => $row->sub_cost_name,
                'description' => $row->description,
//                'class_type_id' => $row->class_type_id,
//                'alamat' => $row->alamat,
            );
        }
        return $data;
     
    }

    function save($params) {
        $log = $this->session->all_userdata();
        $this->load->model('logUpdate');
        $valid = false;

        $fields = array(
            'sub_cost_id' => $params->sub_cost_id,
            'sub_cost_code' => $params->sub_cost_code,
            'sub_cost_name' => $params->sub_cost_name,
            'description' => $params->description,
            'add_date' => date('Y-m-d H:i:s'),
            'add_user' => $log['user_id'],
        );

        if (!empty($params->sub_cost_id)) {
            $this->db->where("sub_cost_id", $params->sub_cost_id);
            $fields_update = array(
                'sub_cost_code' => $params->sub_cost_code,
                'sub_cost_name' => $params->sub_cost_name,
                'description' => $params->description,
                'modified_date' => date('Y-m-d H:i:s'),
                'modified_user' => $log['user_id'],
            );
            $valid = $this->db->update("tour_mst_sub_cost", $fields_update);
            $valid = $this->logUpdate->addLog("update", "tour_mst_sub_cost", $params);
        } else {
            $valid = $this->db->insert('tour_mst_sub_cost', $fields);
            $valid = $this->logUpdate->addLog("insert", "tour_mst_sub_cost", $params);
        }
        return true;
    }


    function delete($id) {
        $log = $this->session->all_userdata();
        $this->load->model('logUpdate');
        $valid = false;
        $valid = $this->logUpdate->addLog("delete", "tour_mst_sub_cost", array("sub_cost_id" => $id));

        if ($valid) {
            $this->db->where('sub_cost_id', $id);
            $valid = $this->db->delete('tour_mst_sub_cost');
        }

        return $valid;
    }

}
