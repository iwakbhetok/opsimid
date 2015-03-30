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
            'smu.user_id',
            'smu.username',
            'smu.full_name',
            'sug.group_name',
            'smu.last_login',
        );

        $this->db->join('sys_user_group sug', 'sug.user_group_id=smu.group_id');
        $this->db->where('status', '1');
        $query = $this->db->get('setting_mst_user smu');
        $result = $query->result();

        $nomor = 1;
        foreach ($result as $row):
            $data[] = array(
                'user_id' => $row->user_id,
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
            'smu.user_id',
            'smu.username',
            'smu.full_name',
            'smu.password',
            'sug.group_name',
            'sug.user_group_id',
        );

        $this->db->select($fields);
        $this->db->join('sys_user_group sug', 'sug.user_group_id=smu.group_id');
        $this->db->where('user_id', $id);
        $query = $this->db->get('setting_mst_user smu');
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $data = array(
                'user_id' => $row->user_id,
                'username' => $row->username,
                'full_name' => $row->full_name,
                'group_name' => $row->group_name,
                'password' => $row->password,
                'group_name_id' => $row->user_group_id,
            );
        }
        return $data;
    }

    function save($params) {
       $log = $this->session->all_userdata();
        $this->load->model('logUpdate');
        $valid = false;

                $fields = array(
                    'username'         => $params->username,
                    'full_name'       => $params->full_name,
                    'password'       => md5($params->password),
                    'group_id'       => $params->group_name_id,
                    'level'          => 1,
                    'status'          => 1,
                    'add_date'          => date('Y-m-d H:i:s'),
                    'add_user'          => $log['user_id'],
                );
        
        if (!empty($params->user_id)) {
            // CHECK OLD PASSWORD
            $this->db->select('password');
            $this->db->where('user_id', $params->user_id);
            $query = $this->db->get('setting_mst_user');
            $row = $query->row();
            $old_password = $row->password;
            if ($old_password == $params->password) {
                $fields_update = array(
                    'username'         => $params->username,
                    'full_name'       => $params->full_name,
                    'group_id'       => $params->group_name_id,
                    'level'          => 1,
                    'status'          => 1,
                    'modified_date'     => date('Y-m-d H:i:s'),
                    'modified_user'     => $log['user_id'],
                );
            }
            else{
                $fields_update = array(
                    'username'         => $params->username,
                    'full_name'       => $params->full_name,
                    'password'       => md5($params->password),
                    'group_id'       => $params->group_name_id,
                    'level'          => 1,
                    'status'          => 1,
                    'modified_date'     => date('Y-m-d H:i:s'),
                    'modified_user'     => $log['user_id'],
                );
            }

            
            $this->db->where("user_id", $params->user_id);
            $valid = $this->db->update("setting_mst_user", $fields_update);
                        
            $valid = $this->logUpdate->addLog("update", "setting_mst_user", $params);
        }
        else {
            $valid = $this->db->insert('setting_mst_user', $fields);
            $valid = $this->logUpdate->addLog("insert", "setting_mst_user", $params);
                        
        }
        return true;
    }

    function delete($id) {
        $log = $this->session->all_userdata();
        $this->load->model('logUpdate');
        $valid = false;
        if (!empty($id)) {
                $fields_update = array(
                    'status'         => '0',
                    'modified_date'     => date('Y-m-d H:i:s'),
                    'modified_user'     => $log['user_id'],
                );
            
            $this->db->where("user_id", $id);
            $valid = $this->db->update("setting_mst_user", $fields_update);
                        
            $valid = $this->logUpdate->addLog("delete", "setting_mst_user", array('user_id'=> $id));
        }
        return true;
    }

}
