<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class user_account_mdl extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getrecordcount() {
        $data = $this->db->count_all_results('setting_mst_user');
        return $data;
    }

    function getdatalist() {
        $data = array();
        $fields = array(
            'smu.username',
            'smu.full_name',
            'sug.group_name',
            'smu.last_login',
        );

        $this->db->join('sys_user_group sug', 'sug.user_group_id=smu.group_id');
        $query = $this->db->get('setting_mst_user smu');
        $result = $query->result();

        $nomor = 1;
        foreach ($result as $row):
            $data[] = array(
                'username' => $row->username,
                'full_name' => $row->full_name,
                'group_name' => $row->group_name,
                'last_login' => convert_datetime_to_indonesia_format($row->last_login),
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
