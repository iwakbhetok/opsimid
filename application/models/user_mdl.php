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
        $query = $this->db->get('mst_user');
        if ($query->num_rows()==1){
            $row = $query->row();
            $data = array(
                'valid'             => true,
                'username'          => $row->username,
                'nama_lengkap'      => $row->nama_lengkap,
                'user_group_id'     => $row->id_group,                
            );
            $iduser = $row->id_user;
            // update last login
            $this->db->set('last_login', date('Y-m-d H:i:s'));
            $this->db->where('id_user', $iduser);
            $this->db->update('mst_user');
        }
        return $data;
    }        
}    