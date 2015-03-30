<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_mdl extends CI_Model {
        
    function __construct() {
        parent::__construct();
    }
    
    function checklogin($username, $password)
    {
        $data['valid'] = false;
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));        
        $query = $this->db->get('setting_mst_user');
        if ($query->num_rows()==1){
            $row = $query->row();
            $data = array(
                'valid'          => true,
                'username'       => $row->username,
                'full_name'      => $row->full_name,
                'user_group_id'  => $row->group_id,
                'user_id'        => $row->user_id,
            );
            $iduser = $row->user_id;
            // update last login
            $this->db->set('last_login', date('Y-m-d H:i:s'));
            $this->db->where('user_id', $iduser);
            $this->db->update('setting_mst_user');
        }
        return $data;
    }

    function getrecord_group_typehead($params)
    {
        $this->db->where('group_name LIKE', '%'.$params.'%');
        $query = $this->db->get('sys_user_group');
        foreach ($query->result() as $row):
            $data[] = $row->group_name;
        endforeach;
        return $data;
    }

    function getrecordcount_group()
    {
        $this->db->from('sys_user_group');
        $data = $this->db->count_all_results();
        return $data;
    }

    function getdatalist_group()
    {
        $this->db->order_by('group_name asc');
        $query = $this->db->get('sys_user_group');
        $nomor = 1;
        $data = array();
        foreach($query->result() as $row):
            $data[] = array(
                'user_group_id' => $row->user_group_id,
                'nomor'     => $nomor,
                'group_name' => $row->group_name,
            );
            $nomor++;
        endforeach;
        return $data;
    }

    function getrecord_group_by_id($params)
    {
        $this->db->where('user_group_id', $params);
        $query = $this->db->get('sys_user_group');
        foreach ($query->result() as $row):
            $data[] = $row->group_name;
        endforeach;
        return $data;
    }
}    