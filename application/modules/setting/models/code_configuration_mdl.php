<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class code_configuration_mdl extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getrecordcount() {
        $data = $this->db->count_all_results('setting_mst_code_configuration');
        return $data;
    }

    function getdatalist() {
        $data = array();
        $fields = array(
            'code_id',
            'code_name',
            'description',
        );
        
        $query = $this->db->get('setting_mst_code_configuration');
        $result = $query->result();

        $nomor = 1;
        foreach ($result as $row):
            $data[] = array(
                'nomor' => $nomor,
                'code_id' => $row->code_id,
                'code_name' => $row->code_name,
                'description' => $row->description,
            );
            $nomor++;
        endforeach;
        return $data;
    }

    function getdataid($id) {
        $data = array();
        $fields = array(
            'code_id',
            'code_name',
            'description',
        );

        $this->db->select($fields);

        $this->db->where('code_id', $id);
        $query = $this->db->get('setting_mst_code_configuration');
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $data = array(
                'code_id' => $row->code_id,
                'code_name' => $row->code_name,
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
                    'code_name'       => $params->code_name,
                    'description'          => $params->description,
                    'add_date'          => date('Y-m-d H:i:s'),
                    'add_user'          => $log['user_id'],
                );
        
        if (!empty($params->code_id)) {
            $fields_update = array(
                    'code_name'       => $params->code_name,
                    'description'       => $params->description,
                    'modified_date'     => date('Y-m-d H:i:s'),
                    'modified_user'     => $log['user_id'],
                );
            $this->db->where("code_id", $params->code_id);
            $valid = $this->db->update("setting_mst_code_configuration", $fields_update);
                        
            $valid = $this->logUpdate->addLog("update", "setting_mst_code_configuration", $params);
        }
        else {
            $valid = $this->db->insert('setting_mst_code_configuration', $fields);
            $valid = $this->logUpdate->addLog("insert", "setting_mst_code_configuration", $params);
                        
        }
        return true;
    }

    function update($params, $id) {
        return true;
    }

    function delete($id) {
        return true;
    }

}
