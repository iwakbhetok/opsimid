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
            'user_id',
            'full_name',
            'group_name',
        );

        $this->db->select($fields);

        $this->db->where('id_vendor', $id);
        $query = $this->db->get('setting_mst_user');
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $data = array(
                'user_id' => $row->user_id,
                'username' => $row->username,
                'full_name' => $row->full_name,
            );
        }
        return $data;
    }

    function save($params) {
        return true;
    }

    function update($params, $id) {
        return true;
    }

    function delete($id) {
        return true;
    }

}
