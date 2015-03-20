<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class main_cost_mdl extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getrecordcount() {
        $data = $this->db->count_all_results('tour_mst_cost');
        return $data;
    }

    function getdatalist() {
        $data = array();
        $fields = array(
            'cost_id',
            'cost_name',
            'description',
        );

        $this->db->select($fields);
        $query = $this->db->get('tour_mst_cost');
        $nomor = 1;
        foreach ($query->result() as $row):
            $data[] = array(
                'nomor' => $nomor,
                'cost_id' => $row->cost_id,
                'cost_name' => $row->cost_name,
                'description' => $row->description,
            );
            $nomor++;
        endforeach;
        return $data;
    }

    function getdataid($id) {
        $data = array();
        $fields = array(
            'cost_id',
            'cost_name',
            'description',
        );

        $this->db->select($fields);

        $this->db->where('cost_id', $id);
        $query = $this->db->get('tour_mst_cost');
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $data = array(
                'cost_id' => $row->cost_id,
                'cost_name' => $row->cost_name,
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
            'cost_name' => $params->cost_name,
            'description' => $params->description,
            'add_date' => date('Y-m-d H:i:s'),
            'add_user' => $log['user_id'],
        );

        if (!empty($params->cost_id)) {
            $this->db->where("cost_id", $params->cost_id);
            $fields_update = array(
                'cost_name' => $params->cost_name,
                'description' => $params->description,
                'modified_date' => date('Y-m-d H:i:s'),
                'modified_user' => $log['user_id'],
            );
            $valid = $this->db->update("tour_mst_cost", $fields_update);
            $valid = $this->logUpdate->addLog("update", "tour_mst_cost", $params);
        } else {
            $valid = $this->db->insert('tour_mst_cost', $fields);
            $valid = $this->logUpdate->addLog("insert", "tour_mst_cost", $params);
        }
        return true;
    }

    function delete($id) {
        $log = $this->session->all_userdata();
        $this->load->model('logUpdate');
        $valid = false;
        $valid = $this->logUpdate->addLog("delete", "tour_mst_cost", array("cost_id" => $id));

        if ($valid) {
            $this->db->where('cost_id', $id);
            $valid = $this->db->delete('tour_mst_cost');
        }

        return $valid;
    }

}
