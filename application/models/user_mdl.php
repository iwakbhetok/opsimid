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
}    